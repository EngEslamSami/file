<?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($dest_card)) { ?>
                            <table id="examplee" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="rmadytd">
                                    <th width="2%">#</th>
                                    <th class="text-center">المؤهل</th>
                                  
                                    <th class="text-center">الإجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($dest_card as $value) {
                                    ?>
                                    <tr>
                                        <td><input type="radio" name="radio" data-title="<?= $value->id_setting ?>"
                                                   id="radio"
                                                   ondblclick="getTitle_esdar('<?php echo $value->title_setting; ?>','<?php echo $value->id_setting; ?>')">
                                        </td>
                                        <td><?= $value->title_setting ?></td>
                                      
                                        <td>
                                          
                                          <a href="#" onclick="delete_esdar(<?= $value->id_setting ?>);"> <i class="fa fa-trash"> </i></a>

                                        <a href="#" onclick="update_esdar(<?= $value->id_setting ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                        


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




    $('#examplee').DataTable( {
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

