<?php

namespace App\Http\Controllers;

use App\Models\Tile;
use Illuminate\Http\Request;
use PDO;

class TileController extends Controller
{
    public function index(Request $request)
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from tiles';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Tile::All();
        //dd($responses);
        return view('puzzle/tiles', [
            'responses' => $responses,
            'records' => $records,
            'request' => csrf_token()
        ]);
    }
}
