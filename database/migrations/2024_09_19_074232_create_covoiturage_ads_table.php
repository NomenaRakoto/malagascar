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
        Schema::create('covoiturage_ads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('nb_place_offert');
            $table->unsignedInteger('nb_place_dispo');
            $table->string('color')->nullable();
            $table->string('marque_vehicule')->nullable();
            $table->string('type_ad')->comment('1-offre, 2-demande');
            $table->timestamp('date_heure_depart');
            $table->boolean('quotidienne')->default(false);
            $table->unsignedBigInteger('vehicule_id');
            $table->string('autre_vehicule')->nullable();
            $table->boolean('is_recuperation_dom')->default(false);
            $table->boolean('is_livraison_dom')->default(false);
            $table->float('price')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('covoiturage_ads');
    }
};
