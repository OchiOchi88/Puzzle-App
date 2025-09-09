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

<h1>■パレット一覧■</h1>

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


<a href="#" onclick="event.preventDefault(); document.getElementById('store-form').submit();">
    パレット登録
</a>

<form id="store-form" method="post" action="{{ url('palettes/store') }}" style="display:none;">
    @csrf
    <input type="hidden" name="first_access" value="1">
    <input type="hidden" name="csrf" value="{{ $request }}">
</form>
<br>

<a href="#" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
    パレット削除
</a>

<form id="delete-form" method="post" action="{{ url('palettes/delete') }}" style="display:none;">
    @csrf
    <input type="hidden" name="first_access" value="1">
    <input type="hidden" name="csrf" value="{{ $request }}">
</form>
<br>
<a href="#" onclick="event.preventDefault(); document.getElementById('home-form').submit();">
    ホームに戻る
</a>
<form id="home-form" method="post" action="{{ url('home') }}" style="display:none;">
    @csrf
    <input type="hidden" name="csrf" value="{{ $request }}">
</form>
</body>
</html>
