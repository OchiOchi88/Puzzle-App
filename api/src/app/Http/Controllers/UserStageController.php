<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserStage;
use App\Models\UserTile;
use App\Models\UserElement;
use App\Models\UserPalette;
use PDO;
use Illuminate\Support\Facades\Validator;

class UserStageController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
                'name' => ['required', 'string']
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // ユーザー登録
        $user = UserStage::create([
            'name' => $request->name,
            'publish' => true,
            'token' => "0"
        ]);

        //  APIトークンを発行する
        $token = $user->createToken($request->name)->plainTextToken;

        UserStage::where('name', '=', $request->name)->update([
            'token' => $token
        ]);

        $user->save();

        //ユーザーIDとAPIトークンを返す
        return response()->json(['name' => $user->name, 'token' => $token], 201);

    }
}
