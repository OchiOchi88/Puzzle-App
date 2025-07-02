<style>
    table {
        border: solid #000000 1px;
        background-color: #7777FF;
    }

    tr {
        border: solid #000000 1px;
        background-color: #7777FF;
    }

    td {
        border: solid #000000 1px;
        background-color: #99FFFF;
    }
</style>
<div>
    <table>
        id
        name
        cellCount
        @foreach($stages as $stage)
            <tr>
                <td>{{$stage->id}}</td>
                <td>{{$stage->name}}</td>
                <td>{{$stage->cells->count()}}</td>
            </tr>
        @endforeach
    </table>
</div>
