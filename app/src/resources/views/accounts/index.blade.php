<html lang="ja">
<style>
    ul {
        background-color: #2565FF;
        border: solid 2px #000000;
        display: flex;
        flex-direction: row;
    }

    div.li {
        display: flex;
        flex-direction: column;
    }

    div.th {
        background-color: #8888FF;
        border: solid 1px #000000;
    }

    li {
        background-color: #BDBDFF;
        border: solid 1px #000000;
    }
</style>
<body>
<h1>■{{$title}}■</h1>
<ul>
    @foreach($tabs as $tabName)
        <div class="li">
            <div class="th">
                {{$tabName}}
            </div>
            @foreach($accounts as $account)
                <li>{{$account[$tabName]}}</li>
            @endforeach
        </div>
    @endforeach
</ul>
</body>
</html>
