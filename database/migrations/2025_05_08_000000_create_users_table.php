<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            // Définir le rôle de l'utilisateur : bailleur, agence ou locataire
            $table->enum('role', ['bailleur', 'agence', 'locataire']);

            // Champs optionnels communs ou utiles selon le rôle
            $table->string('phone')->nullable();
            $table->text('description')->nullable(); // ex : description agence, ou profil bailleur
            $table->string('adresse')->nullable(); // localisation éventuelle
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}; 
