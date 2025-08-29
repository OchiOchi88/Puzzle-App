<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
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
                'stage' => ['required', 'integer']
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // ユーザー登録
        $user = User::create([
            'name' => $request->name,
            'stage' => $request->stage
        ]);

        //  APIトークンを発行する
        $token = $user->createToken($request->name)->plainTextToken;

        $user->save();

        //ユーザーIDとAPIトークンを返す
        return response()->json(['name' => $user->name, 'token' => $token], 201);

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
        $user = User::findOrFail($request->user()->id);
        $user->fill([
            'name' => $request->name,
            'stage' => $request->stage,
            'achievement' => $request->achievement
        ]);
        $user->save();

        return response()->json();
    }

    public function index(Request $request)
    {

        $response = User::findOrFail($request->user()->id);

        return response()->json([
            'stage' => $response->stage,
            'achievement' => $response->achievement,
            'name' => $response->name
        ]);
    }
}
