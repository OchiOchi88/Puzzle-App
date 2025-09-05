<h1>実績追加</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('achievements/delete')}}">
    @csrf
    <p>実績番号</p>
    <input type="number" name="achieve_number"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
    <input type="submit" value="削除"/>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('achieve-form').submit();">
    実績表示に戻る
</a>
<form id="achieve-form" method="get" action="{{ url('achievements') }}" style="display:none;">
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
