<h1>ログインしてください</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('login')}}">
    @csrf
    <p>ユーザー名</p>
    <input type="text" name="name"/>
    <p>パスワード</p>
    <input type="text" name="password"/>
    <input type="submit" value="ログイン"/>
</form>
