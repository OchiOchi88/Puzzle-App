<?php

namespace App\Http\Controllers;

use App\Models\Tile;
use Illuminate\Http\Request;
use PDO;

class TileController extends Controller
{
    public function index(Request $request)
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from tiles';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Tile::All();
        //dd($responses);
        return view('puzzle/tiles', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/store/tiles', ['request' => $request]);
        }
        //  ステージ登録処理
        if (empty($request['stage'])) {
            $error_id = "ステージは必須です！";
            return view('puzzle/store/tiles', ['error_id' => $error_id]);
        }
        if (empty($request['x'])) {
            $error_id = "x座標は必須です！";
            return view('puzzle/store/tiles', ['error_id' => $error_id]);
        }
        if (empty($request['y'])) {
            $error_id = "y座標は必須です！";
            return view('puzzle/store/tiles', ['error_id' => $error_id]);
        }
        $validations = Tile::Where('stage', '=', $request->stage)->get();
        if (!empty($validations)) {
            foreach ($validations as $validation) {
                if ($validation['x'] == $request['x'] &&
                    $validation['y'] == $request['y']) {
                    $error_id = "同じ座標に既にタイルが存在します！";
                    return view('puzzle/store/tiles', ['error_id' => $error_id]);
                }
            }
        }
        if (empty($request['type'])) {
            $error_id = "種類は必須です！";
            return view('puzzle/store/tiles', ['error_id' => $error_id]);
        }
        //$level = intval($request['level']);
        //dd($level);
        //  レコードを追加(insert)
        Tile::create([
            'stage' => $request['stage'],
            'x' => $request['x'],
            'y' => $request['y'],
            'type' => $request['type'],
        ]);
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from tiles';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Tile::All();
        return view('puzzle/tiles', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function update(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/update/tiles', ['request' => $request]);
        }
        if (empty($request['id'])) {
            $error_id = "IDは必須です！";
            return view('puzzle/store/tiles', ['error_id' => $error_id]);
        }
        $id = Tile::Where('id', '=', $request->id)->first();
        if (empty($id)) {
            $error_id = "そのIDは存在しません！";
            return view('puzzle/store/tiles', ['error_id' => $error_id]);
        }
        $validations = Tile::Where('stage', '=', $request->stage)->get();
        if (!empty($validations)) {
            foreach ($validations as $validation) {
                if ($validation['x'] == $request['x'] &&
                    $validation['y'] == $request['y']) {
                    $error_id = "変更先の座標に既にタイルが存在します！";
                    return view('puzzle/store/tiles', ['error_id' => $error_id]);
                }
            }
        }
        $assignment = Tile::Where('id', '=', $request->id)->first();
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

        //  レコードを追加(insert)
        Tile::where('id', $request->id)->update([
            'stage' => $request['stage'],
            'x' => $request['x'],
            'y' => $request['y'],
            'type' => $request['type']
        ]);
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from tiles';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Tile::All();
        return view('puzzle/tiles', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function delete(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/delete/tiles', ['request' => $request]);
        }
        if (empty($request['id'])) {
            $error_id = "IDは必須です！";
            return view('puzzle/delete/tiles', ['error_id' => $error_id]);
        }
        $id = Tile::Where('id', '=', $request->id)->first();
        if (empty($id)) {
            $error_id = "そのIDは存在しません！";
            return view('puzzle/delete/tiles', ['error_id' => $error_id]);
        }
        //dd($number);

        $id->delete();

        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");
        //  表示用のカラム名を取得するSQL
        $sql = 'show columns from tiles';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = Tile::All();
        return view('puzzle/tiles', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }
}
