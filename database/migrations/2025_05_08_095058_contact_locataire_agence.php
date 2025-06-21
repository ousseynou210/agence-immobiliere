<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactLocataireAgence extends Migration
{
    public function up(): void
    {
        Schema::create('contact_locataire_agence', function (Blueprint $table) {
            $table->id();

            $table->foreignId('locataire_id')->constrained('users')->onDelete('cascade'); // locataire
            $table->foreignId('agence_id')->constrained('users')->onDelete('cascade');

            $table->text('message')->nullable(); // message facultatif
            $table->timestamp('contacte_le')->useCurrent(); // date de contact

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_locataire_agence');
    }
}
