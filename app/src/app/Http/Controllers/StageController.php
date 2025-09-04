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
            'records' => $records,
            'request' => $request
        ]);
    }

    public function store(Request $request)
    {

        //  ステージ登録処理
        if (empty($request['level'])) {
            $error_id = "ステージのレベルは必須です！";
            return view('Stage', ['error_id' => $error_id]);
        }
        $validateLvl = Stage::Where('level', '=', $request->level)->get();
        if (!empty($validateLvl)) {
            $error_id = "既にそのレベルのステージが存在します！";
            return view('Stage', ['error_id' => $error_id]);
        }
        if (empty($request['name'])) {
            $error_id = "ステージ名は必須です！";
            return view('CreateItem', ['error_id' => $error_id]);
        }
        //  レコードを追加(insert)
        Stage::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'value' => $request['value'],
            'text' => $request['text']
        ]);
        //return redirect()->route('items.store', ['page' => 1, 'name' => $request['name']]);
        return view('CreateItem', ['page' => 1, 'name' => $request['name']]);
    }

    public function update(Request $request)
    {
        //  モデル取得
        $responses = Stage::All();
        return view('stage/index', ['stages' => $responses]);
    }

    public function delete(Request $request)
    {
        //  モデル取得
        $responses = Stage::All();
        return view('stage/index', ['stages' => $responses]);
    }
}
