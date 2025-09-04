<h1>元素登録</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('elements/delete')}}">
    @csrf
    <p>元素ID</p>
    <input type="number" name="id"/>
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
