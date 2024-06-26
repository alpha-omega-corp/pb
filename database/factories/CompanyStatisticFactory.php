<?php

namespace Database\Factories;

use App\Models\CompanyStatistic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CompanyStatistic>
 */
class CompanyStatisticFactory extends Factory
{
    protected $model = CompanyStatistic::class;

    public function definition(): array
    {
        return [
            'clicks' => $this->views(),
            'email' => $this->views(),
            'phone' => $this->views(),
            'website' => $this->views(),
            'instagram' => $this->views(),
            'facebook' => $this->views(),
            'youtube' => $this->views(),
            'twitter' => $this->views(),
            'linkedin' => $this->views(),
        ];
    }

    private function views(): int
    {
        return $this->faker->numberBetween(0, 1000);
    }
}
