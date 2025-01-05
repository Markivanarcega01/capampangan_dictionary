<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(Request $request){
        $isAdmin = true;
        return view('home')->with(compact("isAdmin"));
    }

    public function search(Request $request){
        $searchword = $request->search;
        $output =  Dictionary::where('word', $searchword)->get();
        return response()->json([
            'data' => $output
        ],200)  ;
    }
}
