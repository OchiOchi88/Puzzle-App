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

<h1>■アイテム一覧■</h1>
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

                        @if($column == "type")
                            @if($account[$column] == 1)
                                消耗品
                            @else
                                装備品
                            @endif
                        @else
                            {{$account[$column]}}
                        @endif

                    </div>
                @endforeach
            </div>
        @endforeach
        <div class="th">
            <p>操作</p>
            @foreach($accounts as $account)
                <div class="li">
                        <?php
                        $ids[$account['id']] = $account['id'];
                        ?>
                    <form method="get" action="{{url('destroy')}}">
                        @csrf
                        <input type="submit" value="削除"/>
                        <input type="hidden" name="id" value="{{$ids[$account["id"]]}}"/>
                    </form>
                </div>
            @endforeach
        </div>
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
