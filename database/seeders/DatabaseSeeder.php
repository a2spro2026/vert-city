<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(['email' => 'admin@vertcity.local'], [
            'name' => 'Gérant Vertcity',
            'login' => 'vertcity',
            'password' => env('ADMIN_PASSWORD', '0661755048'),
            'status' => 'active',
            'role' => 'manager',
        ]);
    }
}
