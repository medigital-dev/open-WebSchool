<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<style>
    thead {
        display: none;
    }
</style>
<button id="addRow">Add new row</button>
<table id="example" class=" " style="width:100%">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
            <th>Column 3</th>
            <th>Column 4</th>
            <th>Column 5</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        var t = $('#example').DataTable({
            paging: false,
            select: true,
            searching: false,
            lengthChange: false
        });
        var counter = 1;

        $('#addRow').on('click', function() {
            t.row.add([
                counter + '.1',
                counter + '.2',
                counter + '.3',
                counter + '.4',
                counter + '.5'
            ]).draw(false);

            counter++;
        });

        // Automatically add a first row of data
        $('#addRow').click();
    });
</script>