<?php
/*
echo '<pre>';
print_r($all_quods_byan);
*/
 ?>
 
 <?php
  if (isset($all_quods_byan) && (!empty($all_quods_byan))) { ?>
    <table id="" class="table table-striped table-bordered dt-responsive nowrap example" cellspacing="0"
           width="100%">
        <thead>
        <tr class="info">
            <th class="text-center tttha">id</th>
            <th class="text-center tttha">رقم القيد</th>
            <th class="text-center tttha">البيان</th>
            <th class="text-center tttha">البيان</th>
            <th class="text-center tttha">المرجع</th>
            <th class="text-center tttha">ايصال رقم</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php
        $a = 1;

        if (isset($all_quods_byan) && !empty($all_quods_byan)) {
            foreach ($all_quods_byan as $record) {

                ?>
                <tr>
                    <td><?php echo $a; ?></td>

                    <td><?php echo $record->qued_rkm_fk; ?></td>
                    <td><?php
                    // echo $record->byan;
                   // echo word_limiter($record->byan, 1);
                  // echo character_limiter($record->byan, 10);
                   
                   $byan = substr($record->byan,10);
            echo word_limiter($byan, 1);
                   
                   
                   
                     ?></td>
                    <td><?php  echo character_limiter($record->byan, 10);?></td> 
                    
                    <td><?php echo $record->marg3;?></td>
                     <td><?php echo $record->esal_rkm; ?></td>
                </tr>
                <?php
                $a++;
            }
        }
        ?>
        </tbody>
    </table>
<?php } else {
    ?>
  
   <br /> 
<div class="alert alert-danger alert-dismissible" role="alert">

<strong>عذرا! ..... </strong> لا يوجد داتا مسجلة 
</div>
    
    
    
    <?php
} ?>


<script>

    $('.example').DataTable( {
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

 