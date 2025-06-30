<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use PDO;

class ItemController extends Controller
{
    public function item(Request $request)
    {

        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  アイテムテーブルのカラム名を取得するSQL
        $sql = 'show columns from items';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $columns = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  アイテムテーブルのすべてのレコードを取得
        $accounts = Item::All();
        return view('subject/list/item',
            ['page' => $request["page"], 'columns' => $columns, 'accounts' => $accounts, 'request' => csrf_token()]);
    }

    public function store(Request $request)
    {
        //  アイテム登録処理
        if (empty($request['name'])) {
            $error_id = "アイテム名は必須です！";
            return view('CreateItem', ['error_id' => $error_id]);
        }
        if (empty($request['type'])) {
            $error_id = "アイテムのタイプは必須です！";
            return view('CreateItem', ['error_id' => $error_id]);
        }
        if (empty($request['value'])) {
            $error_id = "効果濃度は必須です！";
            return view('CreateItem', ['error_id' => $error_id]);
        }
        if (empty($request['text'])) {
            $request['text'] = '起源が一切不明な代物。怪しい雰囲気を感じるが。この世界には起源が不明なものこそ少ないものの、怪しい代物など、既にありふれている。';
        }
        //  レコードを追加(insert)
        Item::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'value' => $request['value'],
            'text' => $request['text']
        ]);
        //return redirect()->route('items.store', ['page' => 1, 'name' => $request['name']]);
        return view('CreateItem', ['page' => 1, 'name' => $request['name']]);
    }

    public function destroy(Request $request)
    {
        $name = Item::where('id', '=', $request['id'])->first();
        return view('DeleteItem', ['page' => 0, 'name' => $name]);
    }

    public function delete(Request $request)
    {
        // idで検索後にレコードを削除 (delete)
        //dd($request);
        $item = Item::findOrFail($request->id);
        //dd($item);
        $item->delete();
        return view('DeleteItem', ['page' => 1, 'name' => $item]);
    }
}
