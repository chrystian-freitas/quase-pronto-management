<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'uuid' => '12345678-1234-1234-1234-123456789012',
            'name' => 'Chrystian',
            'email' => 'chrystian@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'cpf' => '12345678901'
        ]);
    }
}
