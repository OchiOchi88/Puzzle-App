<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserElement;
use PDO;

class UserElementController extends Controller
{
    public function index()
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from user_elements';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = UserElement::All();
        //dd($responses);
        return view('puzzle/user/user-elements', [
            'responses' => $responses,
            'records' => $records,
            'request' => csrf_token()
        ]);
    }
}
