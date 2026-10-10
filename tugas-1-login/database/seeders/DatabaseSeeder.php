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
        // User::factory(10)->create();

        User::create([
        'username' => 'zidan',
        'nama_lengkap' => 'Sahizidan Lukman',
        'password' => 'zidan12345',
        ]);

        User::create([
            'username' => 'rayhan',
            'nama_lengkap' => 'Muhammad Rayhan',
            'password' => 'rayhan12345',
        ]);
    }
}
