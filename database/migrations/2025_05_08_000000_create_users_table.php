<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
   public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');

        // 💡 Ajout du champ rôle sans AFTER
        $table->enum('role', ['agence', 'bailleur', 'locataire'])->nullable();

        $table->rememberToken();
        $table->timestamps();
    });
    }

};
