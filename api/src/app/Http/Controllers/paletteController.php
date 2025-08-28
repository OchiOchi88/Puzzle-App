<?php

namespace App\Http\Controllers;

use App\Models\Palette;
use Illuminate\Http\Request;

class paletteController extends Controller
{
    public function get(Request $request)
    {


        $cells = Palette::where('stage', '=', $request->palette_id)->get();

        //dd($stage);

        return response()->json($cells);
    }
}
