<html lang="ja">
<style>

    div.ma {
        display: flex;
        flex-direction: column;
    }

    div.ul {
        display: flex;
        flex-direction: row;
        width: auto;
        margin: 1%;
        border-collapse: collapse;
        vertical-align: top;
    }

    div.th {
        background-color: #7777FF;
        border: solid 1px #000000;
    }

    div.li {
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
<h1>■管理者アカウント一覧■</h1>
<div class="ma">
    <div class="ul">
        @foreach($columns as $column)
            @if($column == "created_at" || $column == "updated_at")
                    <?php continue ?>
            @endif
            <div class="li">
                <div class="th">
                    {{$column}}
                </div>
                @foreach($accounts as $account)
                    <div class="li">
                        {{$account[$column]}}
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
<form method="post" action="{{url('logined')}}">
    @csrf
    <input type="submit" value="ホームに戻る"/>
    <input type="hidden" name="csrf" value="{{$request}}"/>
</form>
</body>
</html>
