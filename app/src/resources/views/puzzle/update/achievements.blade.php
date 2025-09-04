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
    <input type="hidden" name="csrf" value="{{$request}}"/>
    <input type="submit" value="更新"/>
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
