<?php

namespace App\Http\Controllers;

use App\Models\Tile;
use Illuminate\Http\Request;

class tileController extends Controller
{
    public function get(Request $request)
    {
        $tiles = Tile::where('stage', '=', $request->stage_id)
            ->get(['x', 'y', 'type']);

        return response()->json($tiles);
    }
}
