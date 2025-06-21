<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactBailleurAgence extends Migration
{
    public function up(): void
    {
        Schema::create('contact_bailleur_agence', function (Blueprint $table) {
            $table->id();

            $table->foreignId('bailleur_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('agence_id')->constrained('users')->onDelete('cascade');

            $table->text('message')->nullable(); // optionnel : message du bailleur
            $table->timestamp('contacte_le')->useCurrent(); // date de contact automatique

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_bailleur_agence');
    }
}
