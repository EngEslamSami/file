<?php
if (isset($tahwelat) && !empty($tahwelat)){
    $x=1;
    ?>
    <table id="example_tahwel" class="table  table-bordered table-striped table-hover">
        <thead>
        <tr class="greentd">

            <th> رقم المعاملة </th>
            <th>الموضوع</th>
            <th>نوع الاجراء</th>
            <th>تاريخ التحويل</th>
            <th>محول من</th>
            <th>محول الي</th>
            <th>الاجراء</th>

        </tr>
        </thead>
        <tbody id="">
        <?php
        foreach ($tahwelat as $row){
            ?>

            <tr>
                <td><?= $x++?></td>

                <td>
                    <?php if (!empty($row->subject)){
                        echo $row->subject;
                    }
                    else{
                        echo 'غير محدد';
                    }
                    ?>
                </td>
                <td>
                    <?php if (!empty($row->mohema_n)){
                        echo $row->mohema_n;
                    }
                    else{
                        echo 'غير محدد';
                    }
                    ?>
                </td>
                <td>
                    <?php if (!empty($row->date_ar)){
                        echo $row->date_ar;
                    }
                    else{
                        echo 'غير محدد';
                    }
                    ?>
                </td>
                <td>
                    <?php if (!empty($row->from_user_n)){
                        echo $row->from_user_n;
                    }
                    else{
                        echo 'غير محدد';
                    }
                    ?>
                </td>
                <td>
                    <?php if (!empty($row->to_user_n)){
                        echo $row->to_user_n;
                    }
                    else{
                        echo 'غير محدد';
                    }
                    ?>
                </td>
                <td>

                    <i class="fa fa-trash" style="cursor: pointer"
                       onclick="delete_tahwel(<?= $row->id ?>,<?= $row->sader_id_fk ?>)"></i>
                    <i class="fa fa-pencil" style="cursor: pointer"
                       onclick="get_tahwel(<?= $row->id ?>)"></i>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}
?>
<script>

    $('#example_tahwel').DataTable( {
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
