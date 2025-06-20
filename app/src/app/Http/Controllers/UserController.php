<?php

namespace App\Http\Controllers;

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
        //  所属テーブルのすべてのレコードを取得
        $clans = Clan::All();
        return view('subject/list/infoIndex',
            ['page' => $request["page"], 'columns' => $columns, 'accounts' => $accounts, 'clans' => $clans]);

    }
}
