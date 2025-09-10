<h1>ユーザー削除</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('users/delete')}}">
    @csrf
    <p>ユーザーID</p>
    <input type="number" name="id"/>
    <input type="submit" value="削除"/>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('user-form').submit();">
    ユーザー表示に戻る
</a>
<form id="user-form" method="get" action="{{ url('users') }}" style="display:none;">
    @csrf
</form>
<br>

<a href="#" onclick="event.preventDefault(); document.getElementById('home-form').submit();">
    ホームに戻る
</a>
<form id="home-form" method="post" action="{{ url('home') }}" style="display:none;">
    @csrf
</form>
<br>
