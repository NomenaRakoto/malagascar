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
        Schema::create('demande_devis_complaint', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('message');
            $table->unsignedBigInteger('demande_devis_id');
            $table->foreign('demande_devis_id')->references('id')->on('demande_devis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_devis_complaint');
    }
};
