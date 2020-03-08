<?php if(isset($all_data) &&!empty($all_data)){

    ?>

    <br><br>

    <table id="s_example" class=" table table-bordered table-striped" role="table">
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
                           id="f<?= $row->id ?>" ondblclick="GetName(<?= $row->id ?>,'<?= $row->title?>')"></td>

                <td><?= $row->title ?></td>-->
                <td><?=$z++;?></td>
                <td style="cursor: pointer" id="f<?= $row->id ?>" data-id="<?= $row->id ?>" onclick="GetName(<?= $row->id ?>,'<?= $row->title?>')">

                    <?=$row->title?>
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

    $('#s_example').DataTable( {
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
