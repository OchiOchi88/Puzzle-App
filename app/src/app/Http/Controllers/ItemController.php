<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use PDO;

class ItemController extends Controller
{
    public function item(Request $request)
    {

        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  アイテムテーブルのカラム名を取得するSQL
        $sql = 'show columns from items';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $columns = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  アイテムテーブルのすべてのレコードを取得
        $accounts = Item::All();
        return view('subject/list/infoIndex',
            ['page' => $request["page"], 'columns' => $columns, 'accounts' => $accounts]);
    }

}
