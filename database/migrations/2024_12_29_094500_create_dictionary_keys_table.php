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
        Schema::create('dictionary_keys', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('word');
            $table->string('pronounciation');
            $table->string("part_of_speech");
            $table->string("origin");
            $table->string("synonyms");
            $table->string("antonyms");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dictionary_keys');
    }
};
