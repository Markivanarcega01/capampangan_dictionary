<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dictionary;
use App\Models\User;

class DictionaryController extends Controller
{
    //
    public function index(Request $request){
        return view('dictionary');
    }

    public function store(Request $request){
        $dictionary = new Dictionary();
        $dictionary->word = "C";
        $dictionary->pronounciation = "A";
        $dictionary->part_of_speech = "Noun";
        $dictionary->origin = "Langkiwa";
        $dictionary->synonyms = "A";
        $dictionary->antonyms = "A";
        $dictionary->concept_image = "image.png";
        $dictionary->save();
        return response()->json([
            'data' => $dictionary
        ],200)  ;
    }

}
