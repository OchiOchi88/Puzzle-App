<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;

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
            'request' => $request
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/store/users', ['request' => $request]);
        }
        if (empty($request['stage'])) {
            $request['stage'] = 0;
        }
        $stage = intval($request['stage']);
        if ($stage < 0) {
            $error_id = "クリアステージ数を負の数にすることは出来ません！";
            return view('puzzle/store/users', ['error_id' => $error_id, 'request' => $request]);
        }
        if (empty($request['name'])) {
            $error_id = "名前が入力されていません！";
            return view('puzzle/store/users', ['error_id' => $error_id, 'request' => $request]);
        }
        // ユーザー登録
        $user = User::create([
            'name' => $request->name,
            'stage' => $request->stage,
            'token' => "0"
        ]);

        //  APIトークンを発行する
        $token = $user->createToken($request->name)->plainTextToken;

        User::where('name', '=', $request->name)->update([
            'token' => $token
        ]);

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
        return view('puzzle/users', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function update(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/update/users', ['request' => $request]);
        }
        $assignment = User::where('id', '=', $request['id'])->first();
        if (empty($assignment)) {
            $error_id = "存在しないユーザーIDです！";
            return view('puzzle/update/users', ['error_id' => $error_id, 'request' => $request]);
        }
        $stage = intval($request['stage']);
        if ($stage < -1) {
            $error_id = "クリアステージ数を負の数にすることは出来ません！";
            return view('puzzle/update/users', ['error_id' => $error_id, 'request' => $request]);
        }
        if (empty($request['stage'])) {
            $request['stage'] = $assignment['stage'];
        }
        if (empty($request['name'])) {
            $request['name'] = $assignment['name'];
        }
        if ($stage == -1) {
            $request['stage'] = 0;
        }
        //dd($request);
        User::where('id', '=', $request->id)->update([
            'stage' => $request['stage'],
            'name' => $request['name'],
        ]);
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
        return view('puzzle/users', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function delete(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/delete/users', ['request' => $request]);
        }
        if (empty($request['id'])) {
            $error_id = "ユーザーIDが入力されていません！";
            return view('puzzle/delete/users', ['error_id' => $error_id, 'request' => $request]);
        }
        $user = User::where('id', '=', $request->id)->first();
        if (empty($user)) {
            $error_id = "存在しないユーザーIDです！";
            return view('puzzle/delete/users', ['error_id' => $error_id, 'request' => $request]);
        }
        //dd($number);

        $user->delete();

        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");
        //  表示用のカラム名を取得するSQL
        $sql = 'show columns from users';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = User::All();
        return view('puzzle/users', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }
}
