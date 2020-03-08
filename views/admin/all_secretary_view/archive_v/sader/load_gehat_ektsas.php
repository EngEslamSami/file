
            <?php 
            
            if(isset($result)&&!empty($result)){?>
            
            <table id="geha_ektss" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>م</th>
                    <th>اسم جهه الاختصاص </th>
                    <th>الاجراء</th>
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($result as $row){?>
                    <tr>
                        <td><?php echo $x; ?></td>
                        <td style="cursor: pointer" id="gehat<?= $row->id ?>"
                            onclick="GetgehaektsasName(<?= $row->id ?>,'<?= $row->name?>')">
                            <?= $row->name ?>
                        </td>
                       
                        <td>
                            <a onclick="update_geha_ektsas(<?php echo $row->id;?>,<?php echo $row->geha_id_fk;?>)" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                            <a  onclick="delete_geha_ektsas(<?php echo $row->id;?>,<?php echo $row->geha_id_fk;?>)"   ><i class="fa fa-trash" aria-hidden="true"></i> </a>

                        </td>
                        
                        
                    </tr>
                    <?php
                    $x++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }
            ?>

<script>
$('#geha_ektss').DataTable( {
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

