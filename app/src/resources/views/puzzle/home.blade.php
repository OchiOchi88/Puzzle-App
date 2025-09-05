<div>
    <a href="#" onclick="event.preventDefault(); document.getElementById('users-form').submit();">
        ユーザー一覧へ
    </a>
    <form id="users-form" method="get" action="{{ url('users') }}" style="display:none;">
        @csrf
        <input type="hidden" name="page" value="1"/>
        <input type="hidden" name="csrf" value="{{ $request }}">
    </form>
    <br>
    <a href="#" onclick="event.preventDefault(); document.getElementById('stages-form').submit();">
        ステージ一覧へ
    </a>
    <form id="stages-form" method="get" action="{{ url('stages') }}" style="display:none;">
        @csrf
        <input type="hidden" name="page" value="2"/>
        <input type="hidden" name="csrf" value="{{ $request }}">
    </form>
    <br>
    <a href="#" onclick="event.preventDefault(); document.getElementById('tiles-form').submit();">
        タイル一覧へ
    </a>
    <form id="tiles-form" method="get" action="{{ url('tiles') }}" style="display:none;">
        @csrf
        <input type="hidden" name="page" value="3"/>
        <input type="hidden" name="csrf" value="{{ $request }}">
    </form>
    <br>
    <a href="#" onclick="event.preventDefault(); document.getElementById('elements-form').submit();">
        元素一覧へ
    </a>
    <form id="elements-form" method="get" action="{{ url('elements') }}" style="display:none;">
        @csrf
        <input type="hidden" name="page" value="4"/>
        <input type="hidden" name="csrf" value="{{ $request }}">
    </form>
    <br>
    <a href="#" onclick="event.preventDefault(); document.getElementById('palettes-form').submit();">
        パレット一覧へ
    </a>
    <form id="palettes-form" method="get" action="{{ url('palettes') }}" style="display:none;">
        @csrf
        <input type="hidden" name="page" value="5"/>
        <input type="hidden" name="csrf" value="{{ $request }}">
    </form>
    <br>
    <a href="#" onclick="event.preventDefault(); document.getElementById('achievements-form').submit();">
        実績一覧へ
    </a>
    <form id="achievements-form" method="get" action="{{ url('achievements') }}" style="display:none;">
        @csrf
        <input type="hidden" name="page" value="6"/>
        <input type="hidden" name="csrf" value="{{ $request }}">
    </form>
    <br>
    <a href="#" onclick="event.preventDefault(); document.getElementById('user-achievements-form').submit();">
        ユーザー実績一覧へ
    </a>
    <form id="user-achievements-form" method="get" action="{{ url('user-achievements') }}" style="display:none;">
        @csrf
        <input type="hidden" name="page" value="7"/>
        <input type="hidden" name="csrf" value="{{ $request }}">
    </form>
    <br>
</div>
