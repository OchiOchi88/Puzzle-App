<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserStage;
use PDO;

class UserStageController extends Controller
{
    public function index(Request $request)
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from user_stages';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = UserStage::All();
        //dd($responses);
        return view('puzzle/user/user-stages', [
            'responses' => $responses,
            'records' => $records
            //'request' => $request
        ]);
    }

    public function publish(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/user/publish', ['request' => $request]);
        }
        if (empty($request['id'])) {
            $error_id = "ステージIDが入力されていません！";
            return view('puzzle/user/publish', ['error_id' => $error_id, 'request' => $request]);
        }
        $stage = UserStage::where('id', $request->id)->first();
        if (empty($stage)) {
            $error_id = "そのIDのステージは存在しません！";
            return view('puzzle/user/publish', ['error_id' => $error_id, 'request' => $request]);
        }
        //dd($number);

        if ($stage['publish'] == true) {
            $stage['publish'] = false;
        } else {
            $stage['publish'] = true;
        }

        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");
        //  表示用のカラム名を取得するSQL
        $sql = 'show columns from user_stages';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = UserStage::All();
        return view('puzzle/user/user-stages', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }
}
