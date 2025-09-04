<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AuthUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function home(Request $request)
    {
        return view('puzzle/home', ['request' => $request->csrf_token]);
    }

    public function index(Request $request)
    {
        return view('auth/index', ['error' => $request->error_id]);
    }

    public function login(Request $request)
    {
        //  条件を指定して取得
        //dd($request);
        $password = $request['password'];
        if (empty($request['name'])) {
            $error_id = "ユーザー名が入力されていません！";
            return view('puzzle/login', ['error_id' => $error_id]);
        }
        $account = AuthUsers::where('name', '=', $request['name'])->first();
        if (empty($account)) {
            $error_id = "存在しないユーザー名です！";
            return view('puzzle/login', ['error_id' => $error_id]);
        }
        if (empty($request['password'])) {
            $error_id = "パスワードが入力されていません！";
            return view('puzzle/login', ['error_id' => $error_id]);
        } else {
            //dd($request['name'], $request['password'], AuthUsers::all());
            if ($password == $account->password) {
                return view('puzzle/home', ['request' => csrf_token()]);
            } else {
                $error_id = "パスワードまたはユーザー名が違います！";
                return view('puzzle/login', ['error_id' => $error_id]);
            }
        }
    }

    public function toLogin()
    {
        return view('puzzle/login');
    }

    public function logout(Request $request)
    {
        return view('/');
    }

    public function logined(Request $request)
    {
        return view('subject/list/index', ['request' => csrf_token()]);
    }
}
