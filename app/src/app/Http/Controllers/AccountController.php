<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        return view('subject/login/index', ['error' => $request->error_id]);
    }

    public function doLogin(Request $request)
    {
        if ($request["name"] == "jobi" && $request["pass"] == "jobi") {
            //dd($request);
            return view('subject/list/index');
        } else {
            $error_id = "入力された情報が違います！ユーザー名とパスワードはjobiのみ有効です！";
            return view('subject/login/index', ['error_id' => $error_id]);
        }
    }

    public function userIndex(Request $request)
    {
        return view('subject/list/infoIndex',
            ['page' => $request["page"]]);
    }

    public function scoreIndex(Request $request)
    {
        return view('subject/list/infoIndex',
            ['page' => $request["page"]]);
    }
}
