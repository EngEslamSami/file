
<?php if(isset($all) &&!empty($all)){
    $title ='';
    $name ='';
    if ($type==1){
        $title = 'الاسم';
        $name = 'employee';
    } else if ($type==2){
        $title = 'القسم';
        $name = 'name';
    }

    ?>

    <br><br>

    <table id="motbaa" class=" table  table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
            <th width="2%">#</th>
            <th class="text-center"><?= $title?></th>

        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($all as $row) {
            $row_n = $row->$name;
            ?>
            <tr>

                <td><input style="width: 90px;height: 20px;" type="radio" name="radio"   data-id="<?= $row->id ?>"
                           id="t<?= $row->id ?>" ondblclick="GetmotbaaName(<?= $row->id ?>,'<?= $row_n?>')"></td>

                <td><?= $row_n ?></td>

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

    $('#motbaa').DataTable( {
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
