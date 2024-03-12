<?php

namespace Database\Factories;

use App\Models\AppPostLocale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AppPostLocale>
 */
class AppPostLocaleFactory extends Factory
{
    protected $model = AppPostLocale::class;

    public function definition(): array
    {
        return [
            'alt' => $this->faker->word,
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];
    }
}
