<?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($title)) { ?>
                            <table id="example0" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <th width="2%">#</th>
                                    <th class="text-center"> عنوان الموضوع</th>
                                    <th class="text-center">  الاجراء</th>
                     
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($title as $value) {
                                    ?>
                                    <tr>
                                        <td><input type="radio" name="radio" data-title="<?= $value->id ?>"
                                                   id="radio"
                                                   ondblclick="getTitle('<?php echo $value->title; ?>','<?php echo $value->id; ?>')">
                                        </td>
                                        <td><?= $value->title ?></td>
                                        <td>
                                        <a href="#" onclick="delete_title(<?= $value->id ?>);"> <i class="fa fa-trash"> </i></a>

<a href="#" onclick="update_title(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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




    $('#example0').DataTable( {
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

