<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stage;
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


        $cells = Stage::where('stage', '=', $request->stage_id)->get();

        //dd($stage);

        return response()->json($cells);
    }
}
