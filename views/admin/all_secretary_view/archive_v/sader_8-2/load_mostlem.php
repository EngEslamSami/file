<?php if( isset($all_data) &&!empty($all_data)){

    ?>

    <br><br>

    <table id="example" class="  table table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
            <th width="2%">#</th>
            <th class="text-center">الاسم</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        $z=1;
        foreach ($all_data as $row) {
            ?>
            <tr>

                <!--<td><input style="width: 90px;height: 20px;" type="radio" name="radio"   data-id="<?= $row->id ?>"
                           id="g<?= $row->id ?>" ondblclick="Getmostlem('<?= $row->name?>')"></td>

                <td><?= $row->name ?></td>-->
                <td><?=$z++;?></td>
                <td style="cursor: pointer" id="g<?= $row->id ?>" data-id="<?= $row->id ?>" onclick="Getmostlem('<?= $row->name?>')">

                    <?=$row->name?>
                </td>

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>


<?php } else{
    ?>
    <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>

    <?php
}
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
