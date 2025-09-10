<h1>パレット削除</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('palettes/delete')}}">
    @csrf
    <p>パレットID</p>
    <input type="number" name="id"/>
    <input type="submit" value="削除"/>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('palette-form').submit();">
    パレット表示に戻る
</a>
<form id="palette-form" method="get" action="{{ url('palettes') }}" style="display:none;">
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
