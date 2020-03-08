<?php

    if (!empty($marakez)) { ?>
        <table id="example8" class=" table table-bordered table-striped" role="table">
            <thead>
            <tr class="greentd">
            <th class="text-center"> م</th>
                <th class="text-center"> مركز التكلفه</th>
             
             
                <th class="text-center">الإجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x = 1;
            foreach ($marakez as $value) {
                ?>
                <tr>
                  
                    <td><?= $x ?></td>
                    <td style="background-color:<?= $value->color ?>"><?= $value->name ?></td>
                   
                  

                  
                    <td>
                 
                      <a href="#" onclick="delete_markz(<?= $value->id ?>);"> <i class="fa fa-trash"> </i></a>

                    <a href="#" onclick="update_markz(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

         
                    


                    </td>
                </tr>
                <?php
           $x++; }
            ?>
            </tbody>
        </table>


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