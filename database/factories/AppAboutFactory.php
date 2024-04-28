<?php

namespace Database\Factories;

use App\Enums\AppAboutType;
use App\Enums\Language;
use App\Models\AppAbout;
use App\Models\AppAboutItem;
use App\Models\AppAboutLocale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends Factory<AppAbout>
 */
class AppAboutFactory extends Factory
{
    protected $model = AppAbout::class;

    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl
        ];
    }

    public function configure(): AppAboutFactory
    {
        return $this->afterCreating(function (AppAbout $about) {
            AppAboutLocale::factory()
                ->for($about, 'about')
                ->count(2)
                ->sequence(fn(Sequence $sequence) => [
                    'lang' => $sequence->index == 0
                        ? Language::EN->value
                        : Language::FR->value
                ])
                ->create();

            AppAboutItem::factory()
                ->for($about, 'about')
                ->count(5)
                ->create();
        });
    }

    public function about(): AppAboutFactory
    {
        return $this->state(function () {
            return [
                'type' => AppAboutType::ABOUT->name,
            ];
        });
    }

    public function benefits(): AppAboutFactory
    {
        return $this->state(function () {
            return [
                'type' => AppAboutType::BENEFITS->name,
            ];
        });
    }

}
