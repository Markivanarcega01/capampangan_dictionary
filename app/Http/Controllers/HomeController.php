<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(Request $request){
        return view('welcome');
    }

    public function search(Request $request){
        $inputData = $request->all();
        return response()->json([
            'data' => $inputData
        ],200)  ;
    }
}
