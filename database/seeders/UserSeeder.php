<?php
// database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a supervisor
        User::create([
            'name' => 'Supervisor',
            'email' => 'supervisor@example.com',
            'password' => Hash::make('password'), // Make sure to hash the password
            'is_supervisor' => true,
        ]);

        // Create a volunteer
        User::create([
            'name' => 'Volunteer',
            'email' => 'volunteer@example.com',
            'password' => Hash::make('password'), // Make sure to hash the password
            'is_supervisor' => false,
        ]);
    }
}
