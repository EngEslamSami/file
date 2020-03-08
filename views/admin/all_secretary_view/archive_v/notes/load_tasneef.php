<?php
                                if (isset($tasnef) && !empty($tasnef)){
                                    $x=1;
                                    ?>
                                    <table id="tasnef_datatable" class="table table-bordered table-striped table-hover">
                                        <thead>
                                        <tr class="greentd">
                                            <th>#</th>
                                            <th>  التصنيف</th>
                                            <th>  الاجراء</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($tasnef as $row ){
                                            ?>
                                            <tr>
                                            <td><?=$x;?> </td>
                                            <td style="cursor: pointer" data-title="<?=  $row->id  ?>" onclick="GetTasnefName(<?= $row->id ?>,'<?= $row->title?>')"  >
                                                <?= $row->title?>
                                            </td>
                                            <td>
                                            <a href="#" onclick="delete_tasnef(<?= $row->id  ?>);"> <i class="fa fa-trash"> </i></a>

                                            <a href="#" onclick="update_tasnef(<?=  $row->id  ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            </td>
                                               

                                            </tr>
                                            <?php
                                       $x++; }
                                        ?>
                                        </tbody>

                                    </table>

                                    <?php
                                } else{
                                    ?>

                                    <?php
                                }
                                ?>


<script>
$('#tasnef_datatable').DataTable( {
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