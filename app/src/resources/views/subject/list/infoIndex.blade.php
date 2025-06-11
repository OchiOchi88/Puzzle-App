@if($page==1)
        <?php
        $tabs = ['ID', '名前', 'パスワード'];
        ?>
@elseif($page==2)
        <?php
        $tabs = ['ID', '名前', 'スコア'];
        ?>
@endif
<?php

$data = [
    [
        'ID' => 1,
        '名前' => 'nico',
        'パスワード' => '1212029',
        'スコア' => 500
    ],
    [
        'ID' => 2,
        '名前' => 'karla',
        'パスワード' => '373606',
        'スコア' => 470
    ],
    [
        'ID' => 3,
        '名前' => 'marie',
        'パスワード' => '44278',
        'スコア' => 900
    ],
    [
        'ID' => 4,
        '名前' => 'fellya',
        'パスワード' => '09298959',
        'スコア' => 580
    ]
];
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
        border: solid 1px #000000;
    }

    div.th {
        background-color: #7777FF;
        border: solid 1px #000000;
    }

    div.li {
        background-color: #BDBDFF;
        border: solid 1px #000000;
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
    <h1>■スコア一覧■</h1>
@else
    <h1>■エラー■</h1>
@endif
<div class="ul">
    @foreach($tabs as $tabName)
        <div class="li">
            <div class="th">
                {{$tabName}}
            </div>
            @foreach($data as $account)
                <div class="li">{{$account[$tabName]}}</div>
            @endforeach
        </div>
    @endforeach
</div>
<form class="dummy">
    <input type="text" placeholder="検索したい単語を入力"/>
    <input type="submit" value="検索"/>
</form>
<form method="post" action="{{url('doLogin')}}">
    @csrf
    <input type="submit" value="ホームに戻る"/>
    <input type="hidden" name="name" value="jobi"/>
    <input type="hidden" name="pass" value="jobi"/>
</form>
</body>
</html>
