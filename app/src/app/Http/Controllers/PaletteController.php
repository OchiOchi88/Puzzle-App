<?php

namespace App\Http\Controllers;

use App\Models\Palette;
use Illuminate\Http\Request;
use PDO;

class PaletteController extends Controller
{
    public function index(Request $request)
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from palettes';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Palette::All();
        //dd($responses);
        return view('puzzle/palettes', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/store/palettes', ['request' => $request]);
        }
        if (empty($request['stage'])) {
            $error_id = "ステージ情報が入力されていません！";
            return view('puzzle/store/palettes', ['error_id' => $error_id, 'request' => $request]);
        }
        $numbers = Palette::All();
        if (isset($numbers)) {
            foreach ($numbers as $number) {
                if ($number['type'] == $request['type'] &&
                    $number['stage'] == $request['stage']) {
                    $error_id = "追加先にその種類はすでに存在します！";
                    return view('puzzle/store/palettes', ['error_id' => $error_id, 'request' => $request]);
                }
            }
        }
        if (empty($request['type'])) {
            $error_id = "種類が入力されていません！";
            return view('puzzle/store/palettes', ['error_id' => $error_id, 'request' => $request]);
        }
        if (!empty($request['type'])) {
            if ($request['type'] < 1 ||
                $request['type'] > 21) {
                $error_id = "種類が範囲外です！";
                return view('puzzle/store/palettes', ['error_id' => $error_id, 'request' => $request]);
            }
        }
        $stage = intval($request['stage']);
        if (empty($stage)) {
            $error_id = "ステージには数字を入れてください！";
            return view('puzzle/store/palettes', ['error_id' => $error_id, 'request' => $request]);
        }
        $type = intval($request['type']);
        if (empty($type)) {
            $error_id = "種類には数字を入れてください！";
            return view('puzzle/store/palettes', ['error_id' => $error_id, 'request' => $request]);
        }
        //  レコードを追加(insert)
        Palette::create([
            'stage' => $request['stage'],
            'type' => $request['type'],
        ]);
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from palettes';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Palette::All();
        return view('puzzle/palettes', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }


    public function delete(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/delete/palettes', ['request' => $request]);
        }
        if (empty($request['id'])) {
            $error_id = "パレットIDが入力されていません！";
            return view('puzzle/delete/palettes', ['error_id' => $error_id, 'request' => $request]);
        }
        $number = Palette::where('id', $request->id)->first();
        if (empty($number)) {
            $error_id = "そのIDのパレットは存在しません！";
            return view('puzzle/delete/palettes', ['error_id' => $error_id, 'request' => $request]);
        }
        //dd($number);

        $number->delete();

        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");
        //  表示用のカラム名を取得するSQL
        $sql = 'show columns from palettes';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Palette::All();
        return view('puzzle/palettes', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }
}
