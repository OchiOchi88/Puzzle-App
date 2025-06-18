<html lang="ja">
<style>
    .main {
        align-content: center;
    }

    form {
        display: flex;
        flex-direction: column;
        align-content: center;
        height: 50%;
    }

    input {
        width: 25%;
        margin: 5px;
    }

    .info {
        width: 25%;
        margin: 5px;
        height: 70%;
    }

    .radio {
        display: flex;
        flex-direction: row;
        width: 20%;
        height: 15%;
    }

    .rInput {
        margin: 5px;
    }
</style>
<body>
<h1>■アイテム作成■</h1>
@if(empty($page))
    @if(isset($error_id))
        <p>{{$error_id}}</p>
    @endif
    <div class="main">
        <form method="post" action="{{url('store')}}">
            @csrf
            <input type="text" placeholder="アイテム名" name="name"/>
            <div class="radio">
                <p>消耗品</p><input class="rInput" type="radio" placeholder="消耗品" name="type" value="1"/>
                <p>装備品</p><input class="rInput" type="radio" placeholder="装備品" name="type" value="2"/>
            </div>
            <input type="number" placeholder="濃度を入力" name="value"/>
            <textarea class="info" placeholder="アイテム説明を入力" name="text"></textarea>
            <input type="submit" value="作成"/>
        </form>
    </div>
@elseif($page == 1)
    <p>「{{$name}}」を作成しました</p>
    <form method="get" action="{{url('item')}}">
        @csrf
        <input type="submit" value="アイテム一覧へ"/>
        <input type="hidden" name="page" value="2"/>
    </form>
@endif
<form method="post" action="{{url('login')}}">
    @csrf
    <input type="submit" value="ホームに戻る"/>
    <input type="hidden" name="name" value="jobi"/>
    <input type="hidden" name="pass" value="jobi"/>
</form>

</body>
</html>
