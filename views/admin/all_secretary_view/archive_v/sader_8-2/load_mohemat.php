<?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($mohemat)) { ?>
                            <table id="examplemohema" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <!--<th width="2%">#</th>-->
                                    <th class="text-center">  نوع الخطاب</th>
                                    <th class="text-center">  الاجراء</th>
                     
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($mohemat as $value) {
                                    ?>
                                    <tr>
                                        <!--<td><input type="radio" name="radio" data-title="<?= $value->id ?>"
                                                   id="radio"
                                                   onclick="getTitle_mohema('<?php echo $value->title; ?>','<?php echo $value->id; ?>')">
                                        </td>-->
                                        <td style="cursor: pointer" data-title="<?= $value->id ?>" onclick="getTitle_mohema('<?php echo $value->title; ?>','<?php echo $value->id; ?>')" >
                                            <?= $value->title ?>
                                        </td>
                                        <td>
                                        <a href="#" onclick="delete_mohema(<?= $value->id ?>);"> <i class="fa fa-trash"> </i></a>

                                        <a href="#" onclick="update_mohema(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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




    $('#examplemohema').DataTable( {
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

