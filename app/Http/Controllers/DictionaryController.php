<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dictionary;
use App\Models\User;

class DictionaryController extends Controller
{
    //
    public function index(Request $request){
        $isAdmin = true;
        $dictionary = Dictionary::paginate(20);
        return view('dictionary')->with(compact("isAdmin"))->with(compact("dictionary"));
    }

    public function store(Request $request){
        $dictionary = new Dictionary();
        $dictionary->word = "C";
        $dictionary->pronunciation = "A";
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
