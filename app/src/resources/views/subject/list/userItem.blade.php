<html lang="ja">
<style>

    div.ma {
        display: flex;
        flex-direction: column;
    }

    div.ul {
        display: flex;
        flex-direction: column;
        width: auto;
        margin: 1%;
        border-collapse: collapse;
        vertical-align: top;
    }

    div.li {
        background-color: #7777FF;
        border: solid 1px #000000;
    }

    div.th {
        display: flex;
        flex-direction: column;
        background-color: #BDBDFF;
        border: solid 1px #000000;
        max-height: 10000px;
        min-width: 100px;
    }

    .li > .li {
        flex: 1;
    }

    form.dummy {
        display: flex;
        flex-direction: row;
    }
</style>

<body>
<h1>■所持アイテム一覧■</h1>
<div class="ma">
    <div class="ul">
        @foreach($users as $user)
            <div class="li">
                {{$user['id']}}
                @foreach($user->items as $item)
                    <div class="th">
                        {{$user->id}}
                    </div>
                    <div class="th">
                        {{$user->name}}
                    </div>
                    <div class="th">
                        {{$item->name}}
                    </div>
                    <div class="th">
                        {{$item->pivot->amount}}
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
<form class="dummy">
    <input type="text" placeholder="検索したい単語を入力"/>
    <input type="button" value="検索"/>
</form>
<form method="get" action="{{url('create')}}">
    @csrf
    <input type="submit" value="アイテム作成へ"/>
    <input type="hidden" name="page" value="1"/>
</form>
<form method="post" action="{{url('logined')}}">
    @csrf
    <input type="submit" value="ホームに戻る"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
</form>
</body>
</html>
