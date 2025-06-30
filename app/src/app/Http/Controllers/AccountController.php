<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Clan;
use App\Models\User;
use App\Models\Item;
use App\Models\UserItem;
use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use PDO;

class AccountController extends Controller
{

    public function index(Request $request)
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  管理アカウントテーブルのカラム名を取得するSQL
        $sql = 'show columns from accounts';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $columns = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  管理者情報テーブルのすべてのレコードを取得
        $accounts = Account::All();
        //$accounts = Account::simplePaginate(10);
        return view('subject/list/infoIndex',
            ['page' => $request["page"], 'columns' => $columns, 'accounts' => $accounts, 'request' => csrf_token()]);

    }

    public function login(Request $request)
    {
        return view('subject/login/index', ['error' => $request->error_id]);
    }
}
