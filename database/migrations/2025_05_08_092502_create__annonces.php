<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnonces extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->string('type_bien'); // appartement, maison, studio, etc.
            $table->integer('surface')->nullable();
            $table->integer('nombre_pieces')->nullable();
            $table->string('ville');
            $table->decimal('prix', 10, 2);
            

            // Clés étrangères
           $table->unsignedBigInteger('user_id'); // pour désigner le créateur de l’annonce, quel que soit le profil

           

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }


}
