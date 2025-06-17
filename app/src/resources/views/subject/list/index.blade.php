<div>
    <form method="get" action="{{url('index')}}">
        @csrf
        <input type="submit" value="ユーザー一覧へ"/>
        <input type="hidden" name="page" value="1"/>
    </form>
    <form method="get" action="{{url('index')}}">
        @csrf
        <input type="submit" value="アイテム一覧へ"/>
        <input type="hidden" name="page" value="2"/>
    </form>
    <form method="get" action="{{url('index')}}">
        @csrf
        <input type="submit" value="所持アイテム一覧へ"/>
        <input type="hidden" name="page" value="3"/>
    </form>
    <form method="get" action="{{url('index')}}">
        @csrf
        <input type="submit" value="管理ユーザー一覧へ"/>
        <input type="hidden" name="page" value="4"/>
    </form>
    <form method="get" action="{{url('/')}}">
        @csrf
        <input type="submit" value="ログアウト"/>
    </form>
</div>
