@extends('layouts.app')
@section('title','ログイン画面')
@section('body')

    <div>
        @if(isset($error_id))
            <p>{{$error_id}}</p>
        @endif
        <form method="post" action="{{url('login')}}">
            @csrf
            <input name="name" placeholder="お名前" type="text"/>
            <input name="pass" placeholder="パスワード" type="password"/>
            <input name="submit" type="submit" value="ログイン"/>
            @if(isset($request))
                <input type="hidden" name="csrf" value="{{$request}}"/>
            @else
                <input type="hidden" name="csrf" value=""/>
            @endif
        </form>
    </div>

@endsection
