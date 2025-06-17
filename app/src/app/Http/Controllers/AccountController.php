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
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        if ($request['page'] == 1) {
            $sql = 'show columns from users';
            $sth = $pdo->query($sql);
            $columns = $sth->fetchAll(PDO::FETCH_COLUMN);

            //  ユーザーテーブルのすべてのレコードを取得
            $accounts = User::All();
            $clans = Clan::All();
            return view('subject/list/infoIndex',
                ['page' => $request["page"], 'columns' => $columns, 'accounts' => $accounts, 'clans' => $clans]);
        } else {
            if ($request['page'] == 2) {
                $sql = 'show columns from items';
                $sth = $pdo->query($sql);
                $columns = $sth->fetchAll(PDO::FETCH_COLUMN);

                //  アイテムテーブルのすべてのレコードを取得
                $accounts = Item::All();
                return view('subject/list/infoIndex',
                    ['page' => $request["page"], 'columns' => $columns, 'accounts' => $accounts]);
            } else {
                if ($request['page'] == 3) {
                    $sql = 'show columns from user_items';
                    $sth = $pdo->query($sql);
                    $columns = $sth->fetchAll(PDO::FETCH_COLUMN);

                    //  所持アイテムテーブルのすべてのレコードを取得
                    $accounts = UserItem::All();
                    $user = User::All();
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
                } else {
                    if ($request['page'] == 4) {
                        $sql = 'show columns from accounts';
                        $sth = $pdo->query($sql);
                        $columns = $sth->fetchAll(PDO::FETCH_COLUMN);

                        //  管理者情報テーブルのすべてのレコードを取得
                        $accounts = Account::All();
                        return view('subject/list/infoIndex',
                            ['page' => $request["page"], 'columns' => $columns, 'accounts' => $accounts]);
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
