
<?php if(isset($all) &&!empty($all)){
    $title ='';
    $geha ='';
    $rkm ='';
    $subject ='';
    $date ='';
    $morsel_name ='';
    if ($type==1){
        $title = 'الوارد';
        $geha= 'المرسلة';
        $rkm = 'rkm';
        $subject = 'title';
        $date = 'wared_date';
        $morsel_name = 'morsel_name';

    } else if ($type==2){
        $title = 'الصادر';
        $geha= 'المرسل اليها';
        $rkm = 'sader_rkm';
        $subject = 'mawdo3_name';
        $date = 'tasgel_date';
        $morsel_name = 'geha_morsel_n';
    }

    ?>

    <br><br>

    <table id="realtion" class=" table  table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
            <th width="2%">#</th>
            <th class="text-center "><?= 'رقم' .' '.$title?></th>
            <th>الموضوع</th>
            <th><?= 'تاريخ' .' '.$title?></th>
            <th><?= 'اسم الجهة' .' '.$geha?> </th>
            <th>نوع الخطاب</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($all as $row) {

            ?>
            <tr>

                <td><input style="width: 90px;height: 20px;" type="radio" name="radio"   data-id="<?= $row->id ?>"
                           id="r<?= $row->$rkm ?>" ondblclick="GetrealtionName(<?= $row->$rkm ?>)"></td>

                <td><?php
                    if (!empty($row->$rkm)){
                        echo $row->$rkm;
                    } else{
                        echo 'غير محدد';
                    }
                    ?></td>
                <td><?php
                    if (!empty($row->$subject)){
                        echo $row->$subject;
                    } else{
                        echo 'غير محدد';
                    }
                    ?></td>
                <td><?php
                    if (!empty($row->$date)){
                        echo $row->$date;
                    } else{
                        echo 'غير محدد';
                    }
                    ?></td>
                <td><?php
                    if (!empty($row->$morsel_name)){
                        echo $row->$morsel_name;
                    } else{
                        echo 'غير محدد';
                    }
                    ?></td>
                <td><?php
                    if (!empty($row->no3_khtab_n)){
                        echo $row->no3_khtab_n;
                    } else{
                        echo 'غير محدد';
                    }
                    ?></td>

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

    $('#realtion').DataTable( {
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
