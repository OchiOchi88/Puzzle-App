<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;

class elementController extends Controller
{
    public function get(Request $request)
    {


        $cells = Element::where('stage', '=', $request->element_id)->get();

        //dd($stage);

        return response()->json($cells);
    }
}
