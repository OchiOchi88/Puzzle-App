<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;

class AccountController extends Controller
{

    public function index(Request $request)
    {
        if ($request['page'] == 1) {
            return view('subject/list/infoIndex',
                ['page' => $request["page"]]);
        } else {
            if ($request['page'] == 2) {
                return view('subject/list/infoIndex',
                    ['page' => $request["page"]]);
            } else {
                if ($request['page'] == 3) {
                    //  テーブルのすべてのレコードを取得
                    $accounts = Account::All();
                    //$account = Account::where('name','=','jobi')->get();
                    return view('accounts/index', ['accounts' => $accounts]);
                } else {
                    return view('/');
                }
            }
        }

    }

    public function login(Request $request)
    {
        return view('subject/login/index', ['error' => $request->error_id]);
    }
}
