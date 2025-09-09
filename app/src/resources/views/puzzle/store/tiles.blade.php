<h1>タイル登録</h1>
@if(isset($error_id))
    <p>{{$error_id}}</p>
@endif
<form method="post" action="{{url('tiles/store')}}">
    @csrf
    <p>ステージ</p>
    <input type="number" name="stage"/>
    <p>x座標</p>
    <input type="number" name="x"/>
    <p>y座標</p>
    <input type="number" name="y"/>
    <p>種類</p>
    <input type="number" name="type"/>
    <p>1:通常</p>
    <p>2~5:方向転換(上、右、下、左)</p>
    <p>6~11:地雷タイル(起動、１、２、３、４、５)</p>
    <p>12~14:特殊方向転換タイル(時計回り、反時計回り、反発)</p>
    <p>15~20:充電タイル(100%、80%、60%、40%、20%、0%)</p>
    <p>21:エンジニアタイル(エンジニアタイルは反発以外の方向転換系タイルを反転、地雷タイルを１回遅らせる)</p>
    <p>99:空タイル (プレイヤーに設置させる)</p>
    <input type="hidden" name="csrf" value="{{$request}}"/>
    <input type="submit" value="登録"/>
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('tile-form').submit();">
    タイル表示に戻る
</a>
<form id="tile-form" method="get" action="{{ url('tiles') }}" style="display:none;">
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
    <input type="hidden" name="first_access" value="1">
    <input type="hidden" name="csrf" value="{{ $request }}">
</form>
<br>
