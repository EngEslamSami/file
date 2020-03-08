<?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($tickets)) { ?>
                            <table id="example8" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <th width="2%">#</th>
                                    <th class="text-center">نوع التذكره</th>
                                  
                                    <th class="text-center">الإجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($tickets as $value) {
                                    ?>
                                    <tr>
                                        <td><input type="radio" name="radio" data-title="<?= $value->id_setting ?>"
                                                   id="radio"
                                                   ondblclick="getTitle_travel_type('<?php echo $value->title_setting; ?>','<?php echo $value->id_setting; ?>')">
                                        </td>
                                        <td><?= $value->title_setting ?></td>
                                      
                                        <td>
                                          
                                          <a href="#" onclick="delete_travel_type(<?= $value->id_setting ?>);"> <i class="fa fa-trash"> </i></a>

                                        <a href="#" onclick="update_travel_type(<?= $value->id_setting ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                        


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
                        <script>




    $('#example8').DataTable( {
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

