<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(Request $request){
        $isAdmin = true;
        return view('home')->with(compact("isAdmin"));
    }

    public function search(Request $request){
        $inputData = $request->all();
        return response()->json([
            'data' => $inputData
        ],200)  ;
    }
}
