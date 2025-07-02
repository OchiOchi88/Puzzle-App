<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\StageCell;
use Illuminate\Http\Request;

class StageCellController extends Controller
{
    public function index(Request $request)
    {
        //  モデル取得
        $cells = Stage::All();
        return view('cell/index', ['cells' => $cells]);
    }
}
