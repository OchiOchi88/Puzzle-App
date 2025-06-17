<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use App\Models\Item;
use App\Models\UserItem;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;

class AccountController extends Controller
{

    public function index(Request $request)
    {
        if ($request['page'] == 1) {
            //  ユーザーテーブルのすべてのレコードを取得
            $accounts = User::All();
            return view('subject/list/infoIndex',
                ['page' => $request["page"], 'accounts' => $accounts]);
        } else {
            if ($request['page'] == 2) {
                //  アイテムテーブルのすべてのレコードを取得
                $accounts = Item::All();
                return view('subject/list/infoIndex',
                    ['page' => $request["page"], 'accounts' => $accounts]);
            } else {
                if ($request['page'] == 3) {
                    //  所持アイテムテーブルのすべてのレコードを取得
                    $accounts = UserItem::All();
                    return view('subject/list/infoIndex',
                        ['page' => $request["page"], 'accounts' => $accounts]);
                } else {
                    if ($request['page'] == 4) {
                        //  管理者情報テーブルのすべてのレコードを取得
                        $accounts = Account::All();
                        return view('subject/list/infoIndex',
                            ['page' => $request["page"], 'accounts' => $accounts]);
                    } else {
                        //  なぜかpageのデータを受け取れなかったらログイン画面に戻す
                        return view('/');
                    }
                }
            }
        }

    }

    public function login(Request $request)
    {
        return view('subject/login/index', ['error' => $request->error_id]);
    }
}
