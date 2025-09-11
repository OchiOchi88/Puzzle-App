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

<h1>■ユーザー元素一覧■</h1>

<div class="ma">
    <div class="ul">
        @foreach($responses as $response)
            @if($response == "created_at" || $response == "updated_at")
                    <?php continue ?>
            @endif
            <div class="li">
                <div class="th">
                    {{$response}}
                </div>
                @foreach($records as $record)
                    <div class="li">
                        {{$record[$response]}}
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>

<a href="#" onclick="event.preventDefault(); document.getElementById('home-form').submit();">
    ホームに戻る
</a>
<form id="home-form" method="post" action="{{ url('home') }}" style="display:none;">
    @csrf
</form>
</body>
</html>
