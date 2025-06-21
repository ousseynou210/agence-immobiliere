<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->decimal('loyer', 10, 2);
            $table->string('adresse');
            $table->string('ville');
            $table->boolean('disponible')->default(true);

            // Clés étrangères
            $table->foreignId('agence_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('bailleur_id')->nullable()->constrained('users')->onDelete('cascade');

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
