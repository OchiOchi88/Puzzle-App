<h1>ステージ削除</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('stages/delete')}}">
    @csrf
    <p>レベル</p>
    <input type="number" name="level"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
    <input type="submit" value="削除"/>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('stage-form').submit();">
    ステージ表示に戻る
</a>
<form id="stage-form" method="get" action="{{ url('stages') }}" style="display:none;">
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
