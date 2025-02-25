<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->count(40)
            ->create();

        User::factory([
            'email' => 'admin@alphomega.org',
            'name' => 'admin',
            'is_admin' => true,
            'partner_id' => null
        ])->create();
    }
}
