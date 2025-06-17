<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('auth/index', ['error' => $request->error_id]);
    }

    public function login(Request $request)
    {
        //  条件を指定して取得
        $password = $request['pass'];
        $account = Account::where('name', '=', $request['name'])->first();
        if (empty($request['name'])) {
            $error_id = "お名前は必須です！";
            return view('auth/index', ['error_id' => $error_id]);
        }
        if (empty($request['pass'])) {
            $error_id = "パスワードは必須です！";
            return view('auth/index', ['error_id' => $error_id]);
        } else {
            if (Hash::check($password, $account->password)) {
                return view('subject/list/index');
            } else {
                $error_id = "入力された情報が違います！";
                return view('auth/index', ['error_id' => $error_id]);
            }
        }
    }

    public function logout(Request $request)
    {
        return view('/');
    }
}
