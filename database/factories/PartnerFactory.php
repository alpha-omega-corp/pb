<?php

namespace Database\Factories;

use App\Enums\PlanType;
use App\Models\Advert;
use App\Models\AppPlan;
use App\Models\Company;
use App\Models\CompanyLocale;
use App\Models\Partner;
use App\Models\PartnerPayment;
use App\Models\PartnerTop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Lottery;

/**
 * @extends Factory<Partner>
 */
class PartnerFactory extends Factory
{
    protected $model = Partner::class;

    public function definition(): array
    {
        $adverts = [
            Advert::factory()->event(),
            Advert::factory()->wine(),
            Advert::factory()->caterer(),
            Advert::factory()->entertainment(),
            Advert::factory()->equipment()
        ];

        $plans = AppPlan::all()
            ->collect()
            ->pluck('id')
            ->toArray();

        return [
            'partner_payment_id' => PartnerPayment::factory([
                'app_plan_id' => $this->faker->randomElement($plans)
            ]),
            'company_id' => function (array $attributes) use ($adverts) {
                $payment = PartnerPayment::find($attributes['partner_payment_id']);

                $company = Company::factory()
                    ->has(CompanyLocale::factory()->english(), 'locale')
                    ->has(CompanyLocale::factory()->french(), 'locale');

                return match (PlanType::from($payment->plan->code)) {
                    PlanType::STANDARD => $company
                        ->has($this->faker->randomElement($adverts)->asMain(), 'adverts'),
                    PlanType::PREMIUM => $company
                        ->has($this->faker->randomElement($adverts)->asMain(), 'adverts')
                        ->has($this->faker->randomElement($adverts), 'adverts'),
                    PlanType::EXCLUSIVE => $company
                        ->has($this->faker->randomElement($adverts)->asMain(), 'adverts')
                        ->has($this->faker->randomElement($adverts), 'adverts')
                        ->has($this->faker->randomElement($adverts), 'adverts'),
                    default => $company,
                };
            },
        ];
    }

    public function configure(): PartnerFactory
    {
        return $this->afterCreating(function (Partner $partner) {
            if (in_array($partner->payment->plan->code, [PlanType::PREMIUM->value, PlanType::EXCLUSIVE->value]))
                Lottery::odds(1, 2)
                    ->winner(function () use ($partner) {
                        PartnerTop::factory()->for($partner)->create();
                    })->choose();
        });
    }

}
