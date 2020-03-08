


<?php
/*
echo '<pre>';
print_r($all_quods_details);*/
 ?>


 <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="info">
            <th class="text-center">م</th>  
             <th> رقم القيد</th>
         
                  
                <th> نوع القيد</th>
                 <th> حالة القيد</th>   
                              <th>المرجع </th>    
                  <th>ايصال رقم </th> 
                  
                  
        </tr>
        </thead>
        <tbody class="text-center">
        <?php
        $a=1;

        if(isset($all_quods_details)&&!empty($all_quods_details)) {
            foreach ($all_quods_details as $record) {
                

                
               ?>
                <tr>
                    <td><?php echo $a;?></td>
                    
                    <td><?php echo $record->qued_rkm_fk;?></td>
           


  <td><?php echo $record->no3_qued_name;?></td>
  <td><?php echo $record->halet_qued_name;?></td>   
         <td><?php echo $record->marg3;?></td>
                      <td><?php echo $record->esal_rkm;?></td>
                </tr>
                <?php
                $a++;
            }
        }
        ?>
        </tbody>
    </table>