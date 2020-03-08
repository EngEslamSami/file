<?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($geha)) { ?>
                            <table id="exampleee" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <th width="2%">#</th>
                                    <th class="text-center">  مسؤول الجهه</th>
                                  
                     
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                $z=1;
                                foreach ($geha as $value) {
                                    ?>
                                    <tr>
                                        <!--<td><input type="radio" name="radio" data-title="<?= $value->id ?>"
                                                   id="radio"
                                                   ondblclick="getTitle_geha_morsel('<?php echo $value->id; ?>','<?php echo $value->name; ?>')">
                                        </td>
                                        <td><?= $value->name ?></td>-->

                                        <td><?php echo $z++;?></td>
                                        <td style="cursor: pointer"  data-title="<?= $value->id ?>"  onclick="getTitle_geha_morsel('<?php echo $value->id; ?>','<?php echo $value->name; ?>')">
                                            <?= $value->name ?>
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




    $('#exampleee').DataTable( {
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

