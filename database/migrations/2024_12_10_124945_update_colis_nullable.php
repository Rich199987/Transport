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
    {Schema::table('colis', function (Blueprint $table) {
        $table->string('origine')->nullable()->change();
        $table->string('destination')->nullable()->change();
        $table->string('image')->nullable()->change();
    });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
