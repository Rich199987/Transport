<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('etapes', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->foreignId('colis_id')->constrained('colis')->onDelete('cascade'); // Référence au colis
            $table->text('description'); // Description de l'étape
            $table->string('lieu'); // Lieu
            $table->date('date'); // Date
            $table->time('heure'); // Heure
            $table->string('statut'); // Statut
            $table->timestamps(); // Champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etapes');
    }
};
