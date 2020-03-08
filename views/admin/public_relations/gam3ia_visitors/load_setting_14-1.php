<?php if(!empty($result)){

    ?>

    <br><br>

    <table id="examplee" class=" table table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
            <th width="2%">#</th>
            <th class="text-center title"><?php if (isset($type_name)){ echo $type_name;}?></th>

        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($result as $row) {
            ?>
            <tr>

                <td><input style="width: 90px;height: 20px;" type="radio" name="radio"   data-id="<?= $row->id ?>"
                           id="f<?= $row->id ?>" ondblclick="GetName(<?= $row->id ?>,'<?= $row->title?>')"></td>
                <td><?= $row->title ?></td>


            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>


<?php }
?>

<script>

    $('#examplee').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    } );

</script>