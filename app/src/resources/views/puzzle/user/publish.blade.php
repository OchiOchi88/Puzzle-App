<h1>ステージ公開/非公開</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('publish')}}">
    @csrf
    <p>ステージID</p>
    <input type="number" name="id"/>
    <input type="submit" value="公開/非公開"/>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('user-stage-form').submit();">
    ユーザーステージ表示に戻る
</a>
<form id="user-stage-form" method="get" action="{{ url('user-stages') }}" style="display:none;">
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
