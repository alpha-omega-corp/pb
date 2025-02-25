<?php

namespace Database\Factories;

use App\Models\AdvertImage;
use App\Models\AdvertLocale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class AdvertImageFactory extends Factory
{
    protected $model = AdvertImage::class;

    public function definition(): array
    {
        return [
            'is_thumbnail' => false,
            'path' => 'storage/placeholder.jpg',
        ];
    }

    public function configure(): AdvertImageFactory
    {
        return $this->afterCreating(function (AdvertImage $image) {
            AdvertLocale::factory([
                'translatable_id' => $image->id,
                'translatable_type' => AdvertImage::class,
            ])
                ->count(2)
                ->sequence(fn(Sequence $sequence) => [
                    'lang' => $sequence->index == 0 ? 'en' : 'fr'
                ])
                ->create();
        });
    }

}
