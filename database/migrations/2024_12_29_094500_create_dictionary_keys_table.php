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
        // Schema::create('dictionary_keys', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('word');
        //     $table->string('pronunciation');
        //     $table->string("origin");
        //     $table->string("part_of_speech");
        //     $table->string("synonyms");
        //     $table->string("antonyms");
        //     $table->string("concept_image");
        //     $table->timestamps();
        // });
        Schema::create('dictionary_keys', function (Blueprint $table) {
            $table->id();
            $table->string('Word');
            $table->string('Pronounciation');
            $table->string("Origin");
            $table->string("PartofSpeech");
            $table->longText("Definition1");
            $table->longText("Definition2");
            $table->longText("Definition3");
            $table->longText("Definition4");
            $table->longText("Definition5");
            $table->longText("Definition6");
            $table->longText("Definition7");
            $table->longText("Definition8");
            $table->longText("Definition9");
            $table->longText("Definition10");
            $table->longText("Definition11");
            $table->longText("Definition12");
            $table->longText("Definition13");
            $table->longText("Definition14");
            $table->longText("Definition15");
            $table->longText("Definition16");
            $table->longText("Definition17");
            $table->longText("Synonyms");
            $table->longText("Antonyms");
            $table->longText("SeeAlso");
            $table->timestamps();
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
