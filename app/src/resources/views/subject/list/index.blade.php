<div>
    <form method="get" action="{{url('userIndex')}}">
        @csrf
        <input type="submit" value="ユーザー一覧へ"/>
        <input type="hidden" name="page" value="1"/>
    </form>
    <form method="get" action="{{url('scoreIndex')}}">
        @csrf
        <input type="submit" value="スコア一覧へ"/>
        <input type="hidden" name="page" value="2"/>
    </form>
    <form method="get" action="{{url('/')}}">
        @csrf
        <input type="submit" value="ログアウト"/>
    </form>
</div>
