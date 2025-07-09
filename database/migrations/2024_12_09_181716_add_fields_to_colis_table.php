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
        Schema::table('colis', function (Blueprint $table) {

        $table->string('nom_beneficiaire')->after('id'); // Ajout du nom du bénéficiaire
        $table->string('origine')->after('nom_beneficiaire'); // Ajout de l'origine
        $table->string('destination')->after('origine'); // Ajout de la destination
        $table->string('image')->nullable()->after('destination'); // Ajout de l'image (peut être nul)
        //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('colis', function (Blueprint $table) {
            $table->dropColumn(['nom_beneficiaire', 'origine', 'destination', 'image']);//
        });
    }
};
