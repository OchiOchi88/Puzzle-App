<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('auth/index', ['error' => $request->error_id]);
    }

    public function login(Request $request)
    {
        //$validated = $request->validate([
        //    'name' => ['required', 'min:4', 'max:20'],
        //    'password' => ['required']
        //]);
        if ($request["name"] == "jobi" && $request["pass"] == "jobi") {
            return view('subject/list/index');
        } else {
            $error_id = "入力された情報が違います！ユーザー名とパスワードはjobiのみ有効です！";
            return view('auth/index', ['error_id' => $error_id]);
        }
    }

    public function logout(Request $request)
    {
        return view('/');
    }
}
