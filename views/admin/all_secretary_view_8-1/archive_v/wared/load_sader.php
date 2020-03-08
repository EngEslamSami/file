<?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($sader)) { ?>
                            <table id="example89" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <th width="2%">#</th>
                                    <th class="text-center"> رقم الصادر</th>
                                    <th class="text-center">الموضوع</th>
                                    <th class="text-center"> تاريخ الصادر</th>
                                    <th class="text-center"> اسم الجهه المرسله</th>
                                    <th class="text-center">   نوع الخطاب</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($sader as $value) {
                                    ?>
                                    <tr>
                                        <td><input type="radio" name="radio" data-title="<?= $value->id ?>"
                                                   id="radio"
                                                   ondblclick="getTitle_relation('<?php echo $value->id; ?>','<?php echo $type ?>')">
                                        </td>
                                        <td><?= $value->id ?></td>
                                        <td><?= $value->mawdo3_name ?></td>
                                        <td><?= $value->tasgel_date ?></td>
                                        <td><?= $value->geha_morsel_n ?></td>
                                        <td><?= $value->no3_khtab_n ?></td>
                           
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




$('#example89').DataTable( {
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