<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    public function index(Request $request)
    {
        //  モデル取得
        $stages = Stage::All();
        return view('stage/index', ['stages' => $stages]);
    }
}
