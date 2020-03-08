 <?php if (!empty($relations)) { ?>
                    <table id="example889" class=" example table table-bordered table-striped" role="table">
                        <thead>
                        <tr class="greentd">
                        <th class="text-center"> م</th>
                            <th class="text-center">رقم المعامله</th>
                            <th class="text-center">نوع المعامله</th>
                         
                            <th class="text-center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($relations as $value) {
                            ?>
                            <tr>
                              
                                <td><?= $x ?></td>
                                <td><?= $value->mo3mla_rkm ?></td>
                                <td><?php if($value->type==1){echo 'وارد';} elseif($value->type==2){echo 'صادر';} ?></td>
                              

                              
                                <td>
                                  
                                  <a href="#" onclick="delete_relation(<?= $value->id ?>,<?= $value->wared_id_fk ?>);"> <i class="fa fa-trash"> </i></a>

                                <a href="#" onclick="update_relation(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                


                                </td>
                            </tr>
                            <?php
                      $x++;  }
                        
                        ?>
                        </tbody>
                    </table>


                <?php } ?>
                <script>




$('#example889').DataTable( {
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