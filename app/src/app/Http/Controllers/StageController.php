<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;
use PDO;

class StageController extends Controller
{
    public function index(Request $request)
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from stages';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Stage::All();
        //dd($responses);
        return view('puzzle/stages', [
            'responses' => $responses,
            'records' => $records
            //'request' => $request
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/store/stages', ['request' => $request]);
        }
        //  ステージ登録処理
        if (empty($request['level'])) {
            $error_id = "ステージのレベルは必須です！";
            return view('puzzle/store/stages', ['error_id' => $error_id]);
        }
        $validateLvl = Stage::Where('level', '=', $request->level)->first();
        if (!empty($validateLvl)) {
            $error_id = "既にそのレベルのステージが存在します！";
            return view('puzzle/store/stages', ['error_id' => $error_id]);
        }
        if (empty($request['name'])) {
            $error_id = "ステージ名は必須です！";
            return view('puzzle/store/stages', ['error_id' => $error_id]);
        }
        //$level = intval($request['level']);
        //dd($level);
        //  レコードを追加(insert)
        Stage::create([
            'level' => $request['level'],
            'name' => $request['name'],
        ]);
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from stages';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Stage::All();
        return view('puzzle/stages', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function update(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/update/stages', ['request' => $request]);
        }
        $assignment = Stage::where('level', '=', $request['level'])->first();
        if (empty($assignment)) {
            $error_id = "そのレベルのステージは存在しません！";
            return view('puzzle/update/stages', ['error_id' => $error_id, 'request' => $request]);
        }
        if (empty($request['name'])) {
            $error_id = "ステージ名は必須です！";
            return view('puzzle/update/stages', ['error_id' => $error_id]);
        }
        //  レコードを追加(insert)
        Stage::where('level', $request->level)->update([
            'name' => $request['name']
        ]);
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from stages';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Stage::All();
        return view('puzzle/stages', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function delete(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/delete/stages', ['request' => $request]);
        }
        if (empty($request['level'])) {
            $error_id = "ステージレベルが入力されていません！";
            return view('puzzle/delete/stages', ['error_id' => $error_id, 'request' => $request]);
        }
        $number = Stage::where('level', $request->level)->first();
        if (empty($number)) {
            $error_id = "そのレベルのステージは存在しません！";
            return view('puzzle/delete/stages', ['error_id' => $error_id, 'request' => $request]);
        }
        //dd($number);

        $number->delete();

        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");
        //  表示用のカラム名を取得するSQL
        $sql = 'show columns from stages';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Stage::All();
        return view('puzzle/stages', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }
}
