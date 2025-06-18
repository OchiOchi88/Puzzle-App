<body>
<h1>■アイテム削除■</h1>
@if($page== 0)
    <p>{{$name['name']}}を削除しますか？</p>
    <form method="get" action="{{url('delete')}}">
        @csrf
        <input type="submit" value="削除"/>
        <input type="hidden" name="id" value="{{$name['id']}}"/>
    </form>
    <form method="get" action="{{url('item')}}">
        @csrf
        <input type="submit" value="アイテム一覧へ"/>
        <input type="hidden" name="page" value="2"/>
    </form>
    <form method="post" action="{{url('login')}}">
        @csrf
        <input type="submit" value="ホームに戻る"/>
        <input type="hidden" name="name" value="jobi"/>
        <input type="hidden" name="pass" value="jobi"/>
    </form>
@else
    <p>{{$name['name']}}を削除しました</p>
    <form method="get" action="{{url('item')}}">
        @csrf
        <input type="submit" value="アイテム一覧へ"/>
        <input type="hidden" name="page" value="2"/>
    </form>
    <form method="post" action="{{url('login')}}">
        @csrf
        <input type="submit" value="ホームに戻る"/>
        <input type="hidden" name="name" value="jobi"/>
        <input type="hidden" name="pass" value="jobi"/>
    </form>
@endif
</body>
