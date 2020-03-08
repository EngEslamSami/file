<?php if(!empty($files_names)){

    ?>

    <br><br>
    <table id="example" class=" table table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
            <th width="2%">#</th>
            <th class="text-center"> اسم المرفق</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($files_names as $value) {
            ?>
            <tr>
                <td><input type="radio" name="radio" data-title="<?= $value->id_setting ?>"
                           id="radio"
                           ondblclick="GetName(<?php echo $value->id_setting; ?>,'<?php echo $value->title_setting; ?>')">
                </td>
                <td><?= $value->title_setting ?></td>


            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>


<?php }
?>

<script>

    $('#example').DataTable( {
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
