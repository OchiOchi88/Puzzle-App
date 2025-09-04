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
    <input type="hidden" name="csrf" value="{{$request}}"/>
    <input type="submit" value="登録"/>
</form>
<form method="get" action="{{url('achievements')}}">
    @csrf
    <input type="submit" value="実績表示に戻る"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
</form>
<form method="post" action="{{url('home')}}">
    @csrf
    <input type="submit" value="ホームに戻る"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
</form>
