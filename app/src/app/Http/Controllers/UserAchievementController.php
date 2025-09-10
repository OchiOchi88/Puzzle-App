<?php

namespace App\Http\Controllers;

use App\Models\UserAchievement;
use App\Models\User;
use App\Models\Achievement;
use Illuminate\Http\Request;
use PDO;

class UserAchievementController extends Controller
{
    public function index(Request $request)
    {
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from user_achievements';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = UserAchievement::All();
        //dd($responses);
        return view('puzzle/userAchievements', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function store(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/store/user-achievements');
        }
        if (empty($request['user_id'])) {
            $error_id = "ユーザーIDが入力されていません！";
            return view('puzzle/store/user-achievements', ['error_id' => $error_id]);
        }
        if (empty($request['achievement_id'])) {
            $error_id = "実績IDが入力されていません！";
            return view('puzzle/store/user-achievements', ['error_id' => $error_id]);
        }
        $user = User::where('id', '=', $request->user_id)->first();
        if (empty($user)) {
            $error_id = "存在しないIDのユーザーの実績達成は出来ません！";
            return view('puzzle/store/user-achievements', ['error_id' => $error_id]);
        }
        $achieve = Achievement::where('id', '=', $request->achievement_id)->first();
        if (empty($achieve)) {
            $error_id = "存在しない実績の達成は出来ません！";
            return view('puzzle/store/user-achievements', ['error_id' => $error_id]);
        }
        $userAchieves = UserAchievement::where('user_id', '=', $request['user_id'])->get();
        if (isset($userAchieves)) {
            foreach ($userAchieves as $userAchieve) {
                if ($userAchieve['achievement_id'] == $request['achievement_id']) {
                    $error_id = "対象ユーザーは既にその実績を達成してます！";
                    return view('puzzle/store/user-achievements', ['error_id' => $error_id]);
                }
            }
        }
        //  レコードを追加(insert)
        UserAchievement::create([
            'user_id' => $request['user_id'],
            'achievement_id' => $request['achievement_id'],
        ]);
        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");

        //  ユーザーテーブルのカラム名を取得するSQL
        $sql = 'show columns from user_achievements';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = UserAchievement::All();
        return view('puzzle/user-achievements', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }

    public function delete(Request $request)
    {
        if (isset($request['first_access'])) {
            return view('puzzle/delete/user-achievements');
        }
        if (empty($request['id'])) {
            $error_id = "IDが入力されていません！";
            return view('puzzle/delete/user-achievements', ['error_id' => $error_id]);
        }
        $userAchieve = UserAchievement::where('id', $request->id)->first();
        if (empty($userAchieve)) {
            $error_id = "そのIDは存在しません！";
            return view('puzzle/delete/user-achievements', ['error_id' => $error_id]);
        }
        //dd($number);

        $userAchieve->delete();

        //  DB接続
        $pdo = new PDO("mysql:host=mysql;dbname=puzzle_db;", "jobi", "jobi");
        //  表示用のカラム名を取得するSQL
        $sql = 'show columns from user_achievements';
        //  $sthを使って$sqlのSQL文を実行する(第一段階)
        $sth = $pdo->query($sql);
        //  $columnsに$sthの実行結果を取得させる(第二段階)
        $responses = $sth->fetchAll(PDO::FETCH_COLUMN);

        //  モデル取得
        $records = UserAchievement::All();
        return view('puzzle/user-achievements', [
            'responses' => $responses,
            'records' => $records,
            'request' => $request
        ]);
    }
}
