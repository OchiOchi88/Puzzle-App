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
        @foreach($cells as $cell)
            <tr>
                <td>{{$cell->x}}</td>
                <td>{{$cell->y}}</td>
                <td>{{$cell->object_id}}</td>
                <td>{{$cell->object_type}}</td>
            </tr>
        @endforeach
    </table>
</div>
