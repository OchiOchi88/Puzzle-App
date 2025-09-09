<h1>ユーザー更新</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('users/update')}}">
    @csrf
    <p>ユーザーID</p>
    <input type="number" name="id"/>
    <p>ユーザー名(空欄で変更なし)</p>
    <input type="text" name="name"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
    <input type="submit" value="更新"/>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('user-form').submit();">
    実績表示に戻る
</a>
<form id="user-form" method="get" action="{{ url('users') }}" style="display:none;">
    @csrf
    <input type="hidden" name="first_access" value="1">
    <input type="hidden" name="csrf" value="{{ $request }}">
</form>
<br>

<a href="#" onclick="event.preventDefault(); document.getElementById('home-form').submit();">
    ホームに戻る
</a>
<form id="home-form" method="post" action="{{ url('home') }}" style="display:none;">
    @csrf
    <input type="hidden" name="first_access" value="1">
    <input type="hidden" name="csrf" value="{{ $request }}">
</form>
<br>
