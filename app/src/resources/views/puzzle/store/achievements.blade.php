<h1>実績追加</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('achievements/store')}}">
    @csrf
    <p>実績番号</p>
    <input type="number" name="achieve_number"/>
    <p>実績名</p>
    <input type="text" name="name"/>
    <p>実績説明</p>
    <input type="text" name="detail"/>
    <p>スコア</p>
    <input type="number" name="score"/>
    <input type="submit" value="登録"/>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('achieve-form').submit();">
    実績表示に戻る
</a>
<form id="achieve-form" method="get" action="{{ url('achievements') }}" style="display:none;">
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
