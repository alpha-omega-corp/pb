<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            CategorySeeder::class,
            InformationSeeder::class,
            CommentSeeder::class,
            ContactSeeder::class,
            ContentSeeder::class,
            AboutSeeder::class,
            UspSeeder::class,
            FaqSeeder::class,
            PlanSeeder::class,
            PostSeeder::class,
            FormSeeder::class,
            UserSeeder::class,
        ]);
    }
}
