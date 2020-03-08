<?php

    
    if (!empty($hesabs)) { ?>
        <table id="example88" class=" example table table-bordered table-striped" role="table">
            <thead>
            <tr class="greentd">
            <th class="text-center"> م</th>
                <th class="text-center"> مركز التكلفه</th>
                <th class="text-center"> رقم الحساب</th>
                <th class="text-center"> اسم الحساب</th>
                <th class="text-center">الإجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x = 1;
            foreach ($hesabs as $value) {
                ?>
                <tr>
                  
                    <td><?= $x ?></td>
                    <td  style="background-color:<?php if(isset($value->markez)&&!empty($value->markez)){ echo $value->markez->color;} ?>"><?php if(isset($value->markez)&&!empty($value->markez)){ echo $value->markez->name;}	 ?></td>
                    <td><?= $value->rkm_hesab	 ?></td>
                    <td><?= $value->hesab_name	 ?></td>

                  
                    <td>
                 
                      <a href="#" onclick="delete_hesab(<?= $value->id ?>);"> <i class="fa fa-trash"> </i></a>

                    <a href="#" onclick="update_hesab(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

         
                    


                    </td>
                </tr>
                <?php
           $x++; }
            ?>
            </tbody>
        </table>


    <?php } ?>
                <script>




$('#example88').DataTable( {
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