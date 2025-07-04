<div>
    <form method="get" action="{{url('user')}}">
        @csrf
        <input type="submit" value="ユーザー一覧へ"/>
        <input type="hidden" name="page" value="1"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('item')}}">
        @csrf
        <input type="submit" value="アイテム一覧へ"/>
        <input type="hidden" name="page" value="2"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('userItem')}}">
        @csrf
        <input type="submit" value="所持アイテム一覧へ"/>
        <input type="hidden" name="page" value="3"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('index')}}">
        @csrf
        <input type="submit" value="管理ユーザー一覧へ"/>
        <input type="hidden" name="page" value="4"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('create')}}">
        @csrf
        <input type="submit" value="アイテム作成へ"/>
        <input type="hidden" name="page" value="1"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('detail')}}">
        @csrf
        <input type="submit" value="ユーザー情報一覧へ"/>
        <input type="hidden" name="page" value="1"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('stage')}}">
        @csrf
        <input type="submit" value="ステージ情報を表示する"/>
        <input type="hidden" name="page" value="1"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('/')}}">
        @csrf
        <input type="submit" value="ログアウト"/>
    </form>
</div>
