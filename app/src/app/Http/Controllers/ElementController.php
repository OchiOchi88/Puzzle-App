<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;
use PDO;

class ElementController extends Controller
{
    public function index()
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
            'request' => csrf_token()
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
        if (!empty($request['type'])) {
            if ($request['type'] < 1 ||
                $request['type'] > 4) {
                if ($request['type'] != 99) {
                    $error_id = "元素の方向が範囲外です！";
                    return view('puzzle/update/elements', ['error_id' => $error_id, 'request' => $request]);
                }
            }
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
        if ($request['x'] == 99) {
            $request['x'] = 0;
        }
        if ($request['y'] == 99) {
            $request['y'] = 0;
        }
        if ($request['type'] == 99) {
            $request['type'] = 0;
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
        if (isset($request['first_access'])) {
            return view('puzzle/update/elements', ['request' => $request]);
        }
        $assignment = Element::where('id', '=', $request['id'])->first();
        if (empty($assignment)) {
            $error_id = "そのIDの元素は存在しません！";
            return view('puzzle/update/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        if (!empty($request['type'])) {
            if ($request['type'] < 1 ||
                $request['type'] > 4) {
                if ($request['type'] != 99) {
                    $error_id = "元素の方向が範囲外です！";
                    return view('puzzle/update/elements', ['error_id' => $error_id, 'request' => $request]);
                }
            }
        }
        $validates = Element::All();
        foreach ($validates as $validate) {
            if ($validate['stage'] == $request['stage'] &&
                $validate['x'] == $request['x'] &&
                $validate['y'] == $request['y']) {
                $error_id = "変更先の座標に既に元素が存在します！";
                return view('puzzle/update/elements', ['error_id' => $error_id, 'request' => $request]);
            }
        }
        if (empty($request['stage'])) {
            $request['stage'] = $assignment['stage'];
        }
        if (empty($request['x'])) {
            $request['x'] = $assignment['x'];
        }
        if (empty($request['y'])) {
            $request['y'] = $assignment['y'];
        }
        if (empty($request['type'])) {
            $request['type'] = $assignment['type'];
        }
        if ($request['x'] == 99) {
            $request['x'] = 0;
        }
        if ($request['y'] == 99) {
            $request['y'] = 0;
        }
        if ($request['type'] == 99) {
            $request['type'] = 0;
        }
        //dd($request);
        Element::where('id', $request->id)->update([
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

    public function delete(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/delete/elements', ['request' => $request]);
        }
        if (empty($request['id'])) {
            $error_id = "元素IDが入力されていません！";
            return view('puzzle/delete/elements', ['error_id' => $error_id, 'request' => $request]);
        }
        $number = Element::where('id', $request->id)->first();
        if (empty($number)) {
            $error_id = "そのIDの元素は存在しません！";
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
