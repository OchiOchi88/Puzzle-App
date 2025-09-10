<h1>実績更新</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('achievements/update')}}">
    @csrf
    <p>実績番号</p>
    <input type="number" name="achieve_number"/>
    <p>実績名(空欄で変更なし)</p>
    <input type="text" name="name"/>
    <p>実績説明(空欄で変更なし)</p>
    <input type="text" name="detail"/>
    <p>スコア(空欄で変更なし)</p>
    <input type="number" name="score"/>
    <input type="submit" value="更新"/>
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
