<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Item;
use App\Models\UserItem;
use PDO;

class UserItemController extends Controller
{
    public function userItem(Request $request)
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  所持アイテムテーブルのカラム名を取得するSQL
        $sql = 'show columns from user_items';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $columns = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  所持アイテムテーブルのすべてのレコードを取得
        $accounts = UserItem::All();
        //  ユーザーテーブルのすべてのレコードを取得
        $user = User::All();
        //  アイテムテーブルのすべてのレコードを取得
        $item = Item::All();
        //dd($user, $item);
        return view('subject/list/infoIndex',
            [
                'page' => $request["page"],
                'columns' => $columns,
                'accounts' => $accounts,
                'user' => $user,
                'item' => $item
            ]);
    }
}
