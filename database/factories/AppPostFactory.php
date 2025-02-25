<?php

namespace Database\Factories;

use App\Enums\Language;
use App\Models\AppPost;
use App\Models\AppPostLocale;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends Factory<AppPost>
 */
class AppPostFactory extends Factory
{
    protected $model = AppPost::class;

    public function definition(): array
    {
        return [
            'image' => 'storage/placeholder.jpg',
            'status' => rand(true, false),
        ];
    }

    public function configure(): AppPostFactory
    {
        return $this->afterCreating(function (AppPost $post) {
            AppPostLocale::factory()
                ->for($post, 'post')
                ->count(2)
                ->sequence(fn(Sequence $sequence) => [
                    'lang' => $sequence->index == 0
                        ? Language::FR->value
                        : Language::EN->value
                ])
                ->create();
        });
    }
}
