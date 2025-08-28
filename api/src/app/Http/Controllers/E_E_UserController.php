<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;

use App\Models\E_E_user;
use Illuminate\Support\Facades\Validator;
use PDO;

class E_E_UserController extends Controller
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
        $accounts = E_E_user::All();
        return view('subject/list/user',
            [
                'page' => $request["page"],
                'columns' => $columns,
                'accounts' => $accounts,
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

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
                'name' => ['required', 'string'],
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // ユーザー登録
        $user = E_E_user::create([
            'name' => $request->name,
            'stage' => $request->stage,
            'achievement' => $request->achievement
        ]);

        //  APIトークンを発行する
        $token = $user->createToken($request->name)->plainTextToken;

        $user->save();

        //ユーザーIDとAPIトークンを返す
        return response()->json(['id' => $user->id, 'token' => $token]);

    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => ['required', 'string'],
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = E_E_user::findOrFail($request->user()->id);
        $user->fill([
            'name' => $request->name,
            'stage' => $request->stage,
            'achievement' => $request->achievement
        ]);
        //  APIトークンを発行する
        $token = $user->createToken($request->name)->plainTextToken;

        $user->save();

        //ユーザーIDとAPIトークンを返す
        return response()->json(['token' => $token]);
    }
}
