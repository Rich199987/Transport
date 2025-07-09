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
        Schema::table('etapes', function (Blueprint $table) {
             $table->foreign('colis_id')->references('id')->on('colis')->onDelete('cascade');//
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('etapes', function (Blueprint $table) {
            //
        });
    }
};
