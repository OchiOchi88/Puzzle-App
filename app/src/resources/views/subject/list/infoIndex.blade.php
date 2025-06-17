<html lang="ja">
<style>

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
@if($page ==1)
    <h1>■ユーザー一覧■</h1>
@elseif($page == 2)
    <h1>■アイテム一覧■</h1>
@elseif($page == 3)
    <h1>■所持アイテム一覧■</h1>
@elseif($page == 4)
    <h1>■管理者アカウント一覧■</h1>
@else
    <h1>■エラー■</h1>
@endif
<div class="ul">
    @foreach($columns as $column)
        @if($column == "created_at" || $column == "updated_at")
                <?php continue ?>
        @endif
        <div class="li">
            <div class="th">
                @if($page == 1)
                    @if($column == "clan")
                        所属
                    @else
                        {{$column}}
                    @endif
                @elseif($page == 3)
                    @if($column == "user_id")
                        ユーザー名
                    @elseif($column == "item_id")
                        アイテム名
                    @else
                        {{$column}}
                    @endif
                @else
                    {{$column}}
                @endif
            </div>
            @foreach($accounts as $account)
                <div class="li">
                    @if($page == 1)
                        @if($column == "clan")
                                <?php $output = $account[$column] - 1; ?>
                            @if($output == -1)
                                無所属
                            @else
                                {{$clans[$output]["name"]}}
                            @endif
                        @else
                            {{$account[$column]}}
                        @endif
                    @elseif($page == 2)
                        @if($column == "type")
                            @if($account[$column] == 1)
                                消耗品
                            @else
                                装備品
                            @endif
                        @else
                            {{$account[$column]}}
                        @endif
                    @elseif($page == 3)
                        @if($column == "user_id")
                                <?php $output = $account[$column] - 1; ?>
                            {{$user[$output]["name"]}}
                        @elseif($column == "item_id")
                                <?php $output = $account[$column] - 1; ?>
                            {{$item[$output]["name"]}}
                        @else
                            {{$account[$column]}}
                        @endif
                    @else
                        {{$account[$column]}}
                    @endif

                </div>
            @endforeach
        </div>
    @endforeach
</div>
<form class="dummy">
    <input type="text" placeholder="検索したい単語を入力"/>
    <input type="button" value="検索"/>
</form>
<form method="post" action="{{url('login')}}">
    @csrf
    <input type="submit" value="ホームに戻る"/>
    <input type="hidden" name="name" value="jobi"/>
    <input type="hidden" name="pass" value="jobi"/>
</form>
</body>
</html>
