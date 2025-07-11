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
        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('service');
            $table->string('commentaire');
            $table->string('date_envoi');
            $table->string('email')->unique();
            $table->string('identifiant');
            $table->string('code_secret');
            $table->rememberToken();
            $table->timestamps();
        //
         });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colis');
        Schema::dropIfExists('sessions');
        //
    }
};
