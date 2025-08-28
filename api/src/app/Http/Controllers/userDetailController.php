<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserDetailResource;
use App\Models\UserDetail;
use App\Models\UserItem;

//use Dotenv\Validator;
use http\Env\Response;

use Illuminate\Support\Facades\Validator;

class userDetailController extends Controller
{

    public function detailShow(Request $request)
    {
        $user = UserDetail::findOrFail($request->user_id);
        return response()->json($user);
        //(UserResource::collection($user));
    }


    public function userDetails(Request $request)
    {
        $user = UserDetail::all();
        return response()->json(
            UserDetailResource::collection($user)
        );
    }

    public function detailIndex(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => ['required', 'string'],
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = UserDetail::where('name', '=', "{$request}")->get();
        return response()->json(
            UserDetailResource::collection($user)
        );
    }

    public function detailStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
                'name' => ['required', 'string'],
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = UserDetail::create([
            'name' => $request->name,
        ]);
        return response()->json(['user_id' => $user->id]);
    }

    public function detailUpdate(Request $request)
    {

        $validator = Validator::make($request->all(), [
                'name' => ['required', 'string'],
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = UserDetail::findOrFail($request->user_id);

        $user->name = $request->name;

        $user->save();

        return response()->json();
    }

    public function itemStore(Request $request)
    {

        $validator = Validator::make($request->all(), [
                'name' => ['required', 'string'],
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = UserItem::create([
            'user_id' => $request->user_id,
            'item_id' => $request->item_id,
        ]);
        return response()->json();
    }
}
