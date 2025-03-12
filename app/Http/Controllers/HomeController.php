<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(Request $request){
        $isAdmin = true;
        //$dictionary = Dictionary::paginate(10);
        return view('home')->with(compact("isAdmin"));
    }

    public function filter(Request $request){
        $searchWord = $request->search;
        $actionSource = $request->action;
        if ($actionSource == 'button'){
            $dictionary = Dictionary::where('word', 'like', $searchWord.'%')->paginate(10);
        }else{
            $dictionary = Dictionary::where('word', 'like', $searchWord.'%')->paginate(10);
        }

        return response()->json([
            'data' => $dictionary
        ],200);
    }

    public function search(Request $request){
        $searchword = $request->search;
        $dictionary =  Dictionary::where('word', 'like', $searchword)->paginate(10);
        if ($dictionary->isEmpty()){
            //Need ayusin to, dapat every start ng word lang yung ichecheck.
            // Searched word has to either startswith whitespace or endswith whitespace
            $dictionary = Dictionary::where('definition1', 'like', '%'.$searchword.' %')
            ->orWhere('definition1', 'like', '% '.$searchword.'%')
            ->paginate(10);
        }
        return response()->json([
            'data' => $dictionary,
        ],200);
    }


}
