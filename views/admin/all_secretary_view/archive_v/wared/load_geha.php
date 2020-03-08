<?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($geha)) { ?>
                            <table id="example_gehat" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <th width="2%">#</th>
                                    <th class="text-center"> الجهه</th>
                                    <th class="text-center"> الاجراء</th>
                     
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                $z=1;
                                foreach ($geha as $value) {
                                    ?>
                                    <tr>
                                        
                                        <td><?php echo $z++;?></td>
                                        <td style="cursor: pointer" data-title="<?= $value->id ?>" onclick="getTitle_geha_type('<?php echo $value->name; ?>','<?php echo $value->id; ?>')" >
                                            <?= $value->name ?>
                                        </td>
                                        <td>
                                        <a href="#" onclick="delete_geha_type(<?= $value->id ?>);"> <i class="fa fa-trash"> </i></a>

<a href="#" onclick="update_geha_type(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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




    $('#example_gehat').DataTable( {
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

