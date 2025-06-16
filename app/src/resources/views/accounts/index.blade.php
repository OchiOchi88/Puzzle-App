<?php
$tabs = ['id', 'name', 'password'];
?>
<html lang="ja">
<style>
    div.ul {
        display: flex;
        flex-direction: row;
        width: auto;
        margin: 1%;
    }

    div.li {
        display: flex;
        flex-direction: column;
        background-color: #BDBDFF;
        border: solid 1px #000000;
    }

    div.th {
        background-color: #8888FF;
        border: solid 1px #000000;
    }
</style>
<body>
<h1>■ユーザー一覧■</h1>
<div class="ul">
    @foreach($tabs as $tabName)
        <div class="li">
            <div class="th">
                {{$tabName}}
            </div>
            @foreach($accounts as $account)
                <div class="li">{{$account[$tabName]}}</div>
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
