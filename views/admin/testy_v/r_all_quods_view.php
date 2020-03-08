<?php
/*echo '<pre>';
print_r($all_quods);
*/
 ?>
 
 
 <?php
  if (isset($all_quods) && (!empty($all_quods))) { ?>
    <table id="" class="table table-striped table-bordered dt-responsive nowrap example" cellspacing="0"
           width="100%">
        <thead>
        <tr class="info">
            <th class="text-center tttha">م</th>
            <th class="text-center tttha">رقم القيد</th>
             <th class="text-center tttha">تاريخ القيد</th>
            
            
            <th class="text-center tttha">قيمة القيد</th>
            <th class="text-center tttha">مجموع المدين</th>
            <th class="text-center tttha">مجموع الدائن</th>
            <th class="text-center tttha">حالة  القيد</th>
            
              <th class="text-center tttha">مدخل  القيد</th>
              <th class="text-center tttha">إتزان القيد</th>
               
              
              
              
        </tr>
        </thead>
        <tbody class="text-center">
        <?php
        $a = 1;

        if (isset($all_quods) && !empty($all_quods)) {
            foreach ($all_quods as $record) {
   
                  $farq = round($record->Total_maden,2) - round($record->Total_dayen,2);
                  if($farq != 0 ){
                                $etzan_qued = 'غير متزن';
                    $etzan_qued_class = 'danger';
                  }elseif($farq == 0){
     
                    $etzan_qued = 'متزن';
                    $etzan_qued_class = 'success';
                  }
                  ?>
                
                <tr>
                    <td><?php echo $a; ?></td>

                    <td><?php echo $record->rkm; ?></td>
                      <td><?php echo $record->qued_date_ar; ?></td>
                    
                    
  <td><?php echo $record->total_value; ?></td>


                    <td><?php echo $record->Total_maden;?></td>
                    <td><?php echo $record->Total_dayen; ?></td>
                    
         
                  <td><?php echo $record->halet_qued_name; ?></td>  
                    <td><?php echo $record->publisher_name; ?></td>  
                    
                  <td>
               
                  <span class="label label-<?php echo $etzan_qued_class; ?>"><?php echo $etzan_qued; ?></span>
                  </td>  
                    
                    
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

 