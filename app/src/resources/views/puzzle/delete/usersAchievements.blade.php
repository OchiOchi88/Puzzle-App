<h1>ユーザー実績削除</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('user-achievements/delete')}}">
    @csrf
    <p>ユーザー実績ID</p>
    <input type="number" name="id"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
    <input type="submit" value="削除"/>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('user-achievement-form').submit();">
    ユーザー実績表示に戻る
</a>
<form id="user-achievement-form" method="get" action="{{ url('user-achievements') }}" style="display:none;">
    @csrf
    <input type="hidden" name="csrf" value="{{ $request }}">
</form>
<br>

<a href="#" onclick="event.preventDefault(); document.getElementById('home-form').submit();">
    ホームに戻る
</a>
<form id="home-form" method="post" action="{{ url('home') }}" style="display:none;">
    @csrf
    <input type="hidden" name="csrf" value="{{ $request }}">
</form>
<br>
