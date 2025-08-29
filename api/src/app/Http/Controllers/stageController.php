<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Tile;
use App\Models\Element;
use App\Models\Palette;
use PDO;

class stageController extends Controller
{
    public function index(Request $request)
    {
        /*
        $response = Stage::Where("stage", "=", $request->stage_id);

        return response()->json($response);*/
    }

    /*
        public function get($id)
        {
            $stage = Stage::with('cells')->findOrFail($id);

            return response()->json([
                'id' => $stage->id,
                'x' => $stage->x,
                'y' => $stage->y,
                'type' => $stage->type
            ]);
        }
    */
    public function get(Request $request)
    {


        $stages = Stage::where('level', '=', $request->stage_id)->get();
        $tiles = Tile::Where('stage', '=', $request->stage_id)->get();
        $elements = Element::Where('stage', '=', $request->stage_id)->get();
        $palettes = Palette::Where('stage', '=', $request->stage_id)->get();
        //dd($cells, $tiles, $elements, $palettes);

        return response()->json([
            $stages,
            $tiles,
            $elements,
            $palettes
        ]);
    }
}
