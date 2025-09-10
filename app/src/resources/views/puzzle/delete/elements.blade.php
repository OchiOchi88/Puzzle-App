<h1>元素削除</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('elements/delete')}}">
    @csrf
    <p>元素ID</p>
    <input type="number" name="id"/>
    <input type="submit" value="登録"/>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('elements-form').submit();">
    元素表示に戻る
</a>
<form id="elements-form" method="get" action="{{ url('elements') }}" style="display:none;">
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
