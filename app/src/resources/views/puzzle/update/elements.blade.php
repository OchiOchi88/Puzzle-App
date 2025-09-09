<h1>元素更新</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('elements/update')}}">
    @csrf
    <p>元素ID</p>
    <input type="number" name="id"/>
    <p>ステージ(空欄で変更なし)</p>
    <input type="number" name="stage"/>
    <p>x座標(空欄で変更なし)(99で座標0)</p>
    <input type="number" name="x"/>
    <p>y座標(空欄で変更なし)(99で座標0)</p>
    <input type="number" name="y"/>
    <p>方向(空欄で変更なし)</p>
    <p>1:上 2:右 3:下 4:左 99:ゴール(表記は0)</p>
    <input type="number" name="type"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
    <input type="submit" value="更新"/>
</form>
<a href="#" onclick="event.preventDefault(); document.getElementById('element-form').submit();">
    元素表示に戻る
</a>
<form id="element-form" method="get" action="{{ url('elements') }}" style="display:none;">
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
