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
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
            $table->integer('age');
            $table->boolean('aime_music_tout_long')->default(1);
            $table->boolean('aime_discuter')->default(1);
            $table->string('fb_link', length: 3000)->nullable();
            $table->string('whatsapp', length: 20)->nullable();
            $table->string('full_whatsapp', length: 20)->nullable();
            $table->string('pdp', length: 3000);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
