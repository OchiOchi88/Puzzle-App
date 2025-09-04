<div>
    <form method="get" action="{{url('users')}}">
        @csrf
        <input type="submit" value="ユーザー一覧へ"/>
        <input type="hidden" name="page" value="1"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('stages')}}">
        @csrf
        <input type="submit" value="ステージ一覧へ"/>
        <input type="hidden" name="page" value="2"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('tiles')}}">
        @csrf
        <input type="submit" value="タイル一覧へ"/>
        <input type="hidden" name="page" value="3"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('elements')}}">
        @csrf
        <input type="submit" value="元素一覧へ"/>
        <input type="hidden" name="page" value="4"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('palettes')}}">
        @csrf
        <input type="submit" value="パレット一覧へ"/>
        <input type="hidden" name="page" value="5"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('achievements')}}">
        @csrf
        <input type="submit" value="実績一覧へ"/>
        <input type="hidden" name="page" value="6"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
    <form method="get" action="{{url('user-achievements')}}">
        @csrf
        <input type="submit" value="ユーザー実績一覧へ"/>
        <input type="hidden" name="page" value="7"/>
        <input type="hidden" name="csrf" value="{{$request}}"/>
    </form>
</div>
