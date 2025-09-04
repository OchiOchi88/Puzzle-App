<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;
use PDO;

class ElementController extends Controller
{
    public function index(Request $request)
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from elements';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Element::All();
        //dd($responses);
        return view('puzzle/elements', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/store/elements', ['request' => $request]);
        }
        if (empty($request['stage'])) {
            $error_id = "ステージが入力されていません！";
            return view('puzzle/store/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        $score = intval($request['stage']);
        if (empty($score)) {
            $error_id = "ステージには数字を入れてください！";
            return view('puzzle/store/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        if (empty($request['x'])) {
            $error_id = "x座標が入力されていません！";
            return view('puzzle/store/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        $x = intval($request['x']);
        if (empty($x)) {
            $error_id = "x座標には数字を入れてください！";
            return view('puzzle/store/elements', ['error_id' => $error_id, 'request' => $request]);
        }

        if (empty($request['y'])) {
            $error_id = "y座標が入力されていません！";
            return view('puzzle/store/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        $y = intval($request['y']);
        if (empty($y)) {
            $error_id = "y座標には数字を入れてください！";
            return view('puzzle/store/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        if (empty($request['type'])) {
            $error_id = "方向が入力されていません！";
            return view('puzzle/store/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        $type = intval($request['type']);
        if (empty($type)) {
            $error_id = "方向には数字を入れてください！";
            return view('puzzle/store/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        $validate = Element::All();
        foreach ($validate as $validateData) {
            if ($request['stage'] === $validateData['stage'] &&
                $request['x'] === $validateData['x'] &&
                $request['y'] === $validateData['y']) {
                $error_id = "そのステージのまったく同じ座標に元素が既に存在します！";
                return view('puzzle/store/elements', ['error_id' => $error_id, 'request' => $request]);
            }
        }
        //  レコードを追加(insert)
        Element::create([
            'stage' => $request['stage'],
            'x' => $request['x'],
            'y' => $request['y'],
            'type' => $request['type']
        ]);
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from elements';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Element::All();
        return view('puzzle/elements', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function update(Request $request)
    {
        $score = 0;
        if (isset($request['first_access'])) {
            return view('puzzle/update/elements', ['request' => $request]);
        }
        $number = Element::where('achieve_number', '=', $request['achieve_number'])->first();
        if (empty($number)) {
            $error_id = "その実績番号は存在しません！";
            return view('puzzle/update/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        $name = Element::where('name', '=', $request['name'])->first();
        if (isset($name)) {
            $error_id = "その実績はすでに存在します！";
            return view('puzzle/update/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        $assignment = Element::where('achieve_number', '=', $request['achieve_number'])->first();
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
                return view('puzzle/update/elements', ['error_id' => $error_id, 'request' => $request]);
            }
        }
        //dd($request);
        Element::where('achieve_number', $request->achieve_number)->update([
            'name' => $request['name'],
            'detail' => $request['detail'],
            'score' => $request['score']
        ]);
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from elements';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Element::All();
        return view('puzzle/elements', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function delete(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/delete/elements', ['request' => $request]);
        }
        if (empty($request['achieve_number'])) {
            $error_id = "実績番号が入力されていません！";
            return view('puzzle/delete/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        $number = Element::where('achieve_number', $request->achieve_number)->first();
        if (empty($number)) {
            $error_id = "その実績番号は存在しません！";
            return view('puzzle/delete/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        //dd($number);

        $number->delete();

        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");
        //  表示用のカラム名を取得するSQL
        $sql = 'show columns from elements';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Element::All();
        return view('puzzle/elements', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }
}
