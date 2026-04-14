<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user for Filament
        User::updateOrCreate(
            ['email' => 'david@hoopless.ai'],
            ['name' => 'David Erichsen', 'password' => bcrypt('password')]
        );

        $this->call(ContentSeeder::class);
    }
}
