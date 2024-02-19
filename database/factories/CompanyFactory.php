<?php

namespace Database\Factories;

use App\Enums\Language;
use App\Models\Company;
use App\Models\CompanyAddress;
use App\Models\CompanyContact;
use App\Models\CompanySocial;
use App\Models\CompanyStatistic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CompanyFactory>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company,
            'slug' => $this->faker->slug,
            'languages' => $this->faker->randomElements(Language::values()),
            'logo' => $this->faker->imageUrl(),
            'company_social_id' => CompanySocial::factory(),
            'company_contact_id' => CompanyContact::factory(),
            'company_address_id' => CompanyAddress::factory(),
            'company_statistic_id' => CompanyStatistic::factory(),
        ];
    }
}
