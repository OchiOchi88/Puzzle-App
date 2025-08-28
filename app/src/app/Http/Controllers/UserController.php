<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;

use App\Models\Clan;
use App\Models\User;
use PDO;

class UserController extends Controller
{
    public function user(Request $request)
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from users';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $columns = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  ユーザーテーブルのすべてのレコードを取得
        $accounts = User::All();
        return view('users',
            [
                'id' => $accounts["id"],
                'stage' => $accounts["stage"],
                'achievement' => $accounts["achievement"],
                'name' => $accounts["name"],
                'request' => csrf_token()
            ]);

    }

    public function userDetail(Request $request)
    {
        //  DB接続
        //$pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        $columns = UserDetail::All();
        return view('subject/list/userDetail',
            [
                'page' => $request["page"],
                'users' => $columns,
                'request' => csrf_token()
            ]);
    }

    public function index(Request $request)
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from users';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = User::All();
        //dd($responses);
        return view('puzzle/users', [
            'responses' => $responses,
            'records' => $records,
            'request' => csrf_token()
        ]);
    }
}
