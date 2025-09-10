<h1>ステージ更新</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('stages/update')}}">
    @csrf
    <p>ステージレベル</p>
    <input type="number" name="level"/>
    <p>ステージ名</p>
    <input type="text" name="name"/>

    <input type="submit" value="更新"/>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('stage-form').submit();">
    ステージ表示に戻る
</a>
<form id="stage-form" method="get" action="{{ url('stages') }}" style="display:none;">
    @csrf
    <input type="hidden" name="first_access" value="1">
</form>
<br>

<a href="#" onclick="event.preventDefault(); document.getElementById('home-form').submit();">
    ホームに戻る
</a>
<form id="home-form" method="post" action="{{ url('home') }}" style="display:none;">
    @csrf
    <input type="hidden" name="first_access" value="1">
</form>
<br>
