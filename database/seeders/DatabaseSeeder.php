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
        // Exemple : Créer 10 utilisateurs fictifs
        // User::factory(10)->create();

        // Créer un utilisateur spécifique
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Appeler d'autres seeders
        $this->call(TestUsersSeeder::class);
    }
}