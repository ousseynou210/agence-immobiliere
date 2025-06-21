<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TestUsersSeeder extends Seeder
{
    public function run()
    {
        // BAILLEUR
        User::create([
            'name' => 'Bailleur Test',
            'email' => 'bailleur@test.com',
            'password' => Hash::make('password'),
            'role' => 'bailleur',
        ]);

        // AGENCE
        User::create([
            'name' => 'Agence Test',
            'email' => 'agence@test.com',
            'password' => Hash::make('password'),
            'role' => 'agence',
        ]);

        // LOCATAIRE
        User::create([
            'name' => 'Locataire Test',
            'email' => 'locataire@test.com',
            'password' => Hash::make('password'),
            'role' => 'locataire',
        ]);
    }
}
