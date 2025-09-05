<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use PDO;

class AchievementController extends Controller
{
    public function index()
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from achievements';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Achievement::All();
        //dd($responses);
        return view('puzzle/achievements', [
            'responses' => $responses,
            'records' => $records,
            'request' => csrf_token()
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/store/achievements', ['request' => $request]);
        }
        if (empty($request['achieve_number'])) {
            $error_id = "実績番号が入力されていません！";
            return view('puzzle/store/achievements', ['error_id' => $error_id, 'request' => $request]);
        }
        $number = Achievement::where('achieve_number', '=', $request['achieve_number'])->first();
        if (isset($number)) {
            $error_id = "その実績番号はすでに存在します！";
            return view('puzzle/store/achievements', ['error_id' => $error_id, 'request' => $request]);
        }
        if (empty($request['name'])) {
            $error_id = "実績名が入力されていません！";
            return view('puzzle/store/achievements', ['error_id' => $error_id, 'request' => $request]);
        }
        $name = Achievement::where('name', '=', $request['name'])->first();
        if (isset($name)) {
            $error_id = "その実績はすでに存在します！";
            return view('puzzle/store/achievements', ['error_id' => $error_id, 'request' => $request]);
        }
        if (empty($request['detail'])) {
            $error_id = "実績説明が入力されていません！";
            return view('puzzle/store/achievements', ['error_id' => $error_id, 'request' => $request]);
        }
        if (empty($request['score'])) {
            $error_id = "スコアが入力されていません！";
            return view('puzzle/store/achievements', ['error_id' => $error_id, 'request' => $request]);
        }
        $score = intval($request['score']);
        if (empty($score)) {
            $error_id = "スコアには数字を入れてください！";
            return view('puzzle/store/achievements', ['error_id' => $error_id, 'request' => $request]);
        }
        //  レコードを追加(insert)
        Achievement::create([
            'achieve_number' => $request['achieve_number'],
            'name' => $request['name'],
            'detail' => $request['detail'],
            'score' => $request['score']
        ]);
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from achievements';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Achievement::All();
        return view('puzzle/achievements', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function update(Request $request)
    {
        $score = 0;
        if (isset($request['first_access'])) {
            return view('puzzle/update/achievements', ['request' => $request]);
        }
        $number = Achievement::where('achieve_number', '=', $request['achieve_number'])->first();
        if (empty($number)) {
            $error_id = "その実績番号は存在しません！";
            return view('puzzle/update/achievements', ['error_id' => $error_id, 'request' => $request]);
        }
        $name = Achievement::where('name', '=', $request['name'])->first();
        if (isset($name)) {
            $error_id = "その実績はすでに存在します！";
            return view('puzzle/update/achievements', ['error_id' => $error_id, 'request' => $request]);
        }
        $assignment = Achievement::where('achieve_number', '=', $request['achieve_number'])->first();
        if (empty($request['name'])) {
            $request['name'] = $assignment['name'];
        }
        if (empty($request['detail'])) {
            $request['detail'] = $assignment['detail'];
        }
        if (empty($request['score'])) {
            $request['score'] = $assignment['score'];
        } else {
            //dd($request['score']);
            $score = intval($request['score']);
            if (empty($score)) {
                $error_id = "スコアには数字を入れてください！";
                return view('puzzle/update/achievements', ['error_id' => $error_id, 'request' => $request]);
            }
        }
        //dd($request);
        Achievement::where('achieve_number', $request->achieve_number)->update([
            'name' => $request['name'],
            'detail' => $request['detail'],
            'score' => $request['score']
        ]);
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from achievements';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Achievement::All();
        return view('puzzle/achievements', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function delete(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/delete/achievements', ['request' => $request]);
        }
        if (empty($request['achieve_number'])) {
            $error_id = "実績番号が入力されていません！";
            return view('puzzle/delete/achievements', ['error_id' => $error_id, 'request' => $request]);
        }
        $number = Achievement::where('achieve_number', $request->achieve_number)->first();
        if (empty($number)) {
            $error_id = "その実績番号は存在しません！";
            return view('puzzle/delete/achievements', ['error_id' => $error_id, 'request' => $request]);
        }
        //dd($number);

        $number->delete();

        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");
        //  表示用のカラム名を取得するSQL
        $sql = 'show columns from achievements';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Achievement::All();
        return view('puzzle/achievements', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }
}
