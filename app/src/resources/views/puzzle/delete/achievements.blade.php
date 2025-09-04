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
