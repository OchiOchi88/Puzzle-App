<h1>元素登録</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('elements/store')}}">
    @csrf
    <p>ステージ</p>
    <input type="number" name="stage"/>
    <p>x座標</p>
    <input type="number" name="x"/>
    <p>y座標</p>
    <input type="number" name="y"/>
    <p>方向</p>
    <p>1:上 2:右 3:下 4:左 99:ゴール(表記は0)</p>
    <input type="number" name="type"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
    <input type="submit" value="登録"/>
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
