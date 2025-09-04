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
    <p>x座標(空欄で変更なし)</p>
    <input type="number" name="x"/>
    <p>y座標(空欄で変更なし)</p>
    <input type="number" name="y"/>
    <p>方向(空欄で変更なし)</p>
    <p>1:上 2:右 3:下 4:左 0:ゴール</p>
    <input type="number" name="type"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
    <input type="submit" value="更新"/>
</form>
<form method="get" action="{{url('elements')}}">
    @csrf
    <input type="submit" value="元素表示に戻る"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
</form>
<form method="post" action="{{url('home')}}">
    @csrf
    <input type="submit" value="ホームに戻る"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
</form>
