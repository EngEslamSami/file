<?php
if (isset($relations) && !empty($relations)){
    $x=1;
    ?>
    <table id="all_relations" class="table  table-bordered table-striped table-hover">
        <thead>
        <tr class="greentd">
            <th>م</th>

            <th> رقم المعاملة </th>
            <th>نوع المعاملة</th>
            <th>الاجراء</th>

        </tr>
        </thead>
        <tbody >
        <?php
        foreach ($relations as $row){
            ?>
            <tr>
                <td><?= $x++?></td>
                <td>
                    <?php if (!empty($row->mo3mla_rkm)){
                        echo $row->mo3mla_rkm;
                    }
                    else{
                        echo 'غير محدد';
                    }
                    ?>
                </td>
                <td>
                    <?php if ($row->type==1){
                        echo 'وارد';
                    }
                    else if ($row->type==2){
                        echo ' صادر';
                    } else{
                        echo 'غير محدد';
                    }
                    ?>
                </td>
                <td>
                    <i class="fa fa-trash" style="cursor: pointer"
                       onclick="delete_relation(<?= $row->id ?>,<?= $row->sader_id_fk ?>)"></i>
                    <i class="fa fa-pencil" style="cursor: pointer"
                       onclick="get_relation(<?= $row->id ?>,<?= $row->mo3mla_rkm ?>,<?= $row->type ?>)"></i>
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

    $('#all_relations').DataTable( {
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

