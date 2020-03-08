<?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($reason)) { ?>
                            <table id="exampleeee8" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <th width="2%">#</th>
                                    <th class="text-center">  اسباب انهاء المعامله</th>
                                    <th class="text-center">  الاجراء</th>
                     
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($reason as $value) {
                                    ?>
                                    <tr>
                                        <td><input type="radio" name="radio_end" data-title="<?= $value->id ?>"
                                                   id="radio_end"
                                                   onclick="getTitle_reason('<?php echo $value->id; ?>','<?php echo $value->title; ?>')">
                                                 
                                        </td>
                                        <td><?= $value->title ?></td>
                                        <td>
                                        <a href="#" onclick="delete_reason_setting(<?= $value->id ?>);"> <i class="fa fa-trash"> </i></a>

<a href="#" onclick="update_reason_setting(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
</td>
                           
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>


                        <?php } else { ?>

                            <div class="alert alert-danger">لاتوجد بيانات !!</div>
                        <?php } ?>
                        </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
           
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
            <script>




$('#exampleeee8').DataTable( {
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