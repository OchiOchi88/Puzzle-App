<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateItemController extends Controller
{
    public function create(Request $request)
    {
        //return redirect()->route('item.index', ['']);
        return view('CreateItem', ['error_id' => $request['error_id']]);
    }
}
