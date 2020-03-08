   
    <div class="col-xs-12">
        <table id="examplse" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
         <thead>
        <tr>
            <th width="2%">م</th>
            <th  class="text-center">رقم القيد</th>
             <th  class="text-center">نوع القيد</th>
              <th  class="text-center">إجمالي القيد</th>
             <th  class="text-center">مرجع</th> 
             <th  class="text-center">بيان قيد</th> 
             
              <th  class="text-center">نوع الايصال</th> 
              
                 <th  class="text-center">رقم الايصال</th> 
              <th  class="text-center">بيان الايصال</th> 
             <th>fff</th>   
             
           
        </tr>
        </thead>
        <tbody>
        <?php 
        /*
        echo '<pre/>';
        print_r($records);*/
        
        $i=0;
        foreach($records as $record):
        $i++;
         if($record->pill_pay_method == 1){
                    $pill_pay_method_name = 'نقدي';
                 }elseif($record->pill_pay_method == 2){
                      $pill_pay_method_name = 'شيك';
                 }elseif($record->pill_pay_method == 3){
                    $pill_pay_method_name = 'شبكة';  
                 }elseif($record->pill_pay_method == 4){
                      $pill_pay_method_name = 'إيداع نقدي';
                 }elseif($record->pill_pay_method == 5){
                   $pill_pay_method_name = 'إيداع شيك';   
                 }elseif($record->pill_pay_method == 6){
                      $pill_pay_method_name = 'تحويل';
                 }elseif($record->pill_pay_method == 7){
                      $pill_pay_method_name = 'أمر مستديم';
                 }else{
                    $pill_pay_method_name = 'غير محدد';
                 }
                 
                 
              if($record->no3_qued == 1){
                 $ppil_num = $record->marg3;
               
              } elseif($record->no3_qued == 2){
                  $ppil_num = $record->pill_pill_num;
             
              } elseif($record->no3_qued == 3){
                $ppil_num = $record->marg3;
              } elseif($record->no3_qued == 4){
                  $ppil_num = $record->marg3;
              } elseif($record->no3_qued == 5){
                $xx =  (explode(" ",$record->byan));

     
                  $ppil_num = $xx[0];
              } elseif($record->no3_qued == 6){
                 $ppil_num = $record->marg3;
              }  
                 
              
              
              if($record->no3_qued == 2){
               //   $bbbyan =  $record->byan .'/'.$record->pill_about   ;
               
               
                 $bbbyan = ' إيصال '.$ppil_num .' '.$record->person_name.'/'.$record->pill_about;   
              }else{
                $bbbyan =  $record->byan  ;
              }
              
              
             
                 
        
        
        ?>
            <tr>
             <td ><?php echo $i; ?> </td>
                <td ><?php echo  $record->qued_rkm_fk?></td>
               <td ><?php echo  $record->q_type?></td>
               <td ><?php echo  $record->total_value?></td>
                <td ><?php echo  $record->marg3?></td>
              
                
                 <td ><?php echo  $bbbyan .'<br/>';
                 
                // echo ' إيصال '.$ppil_num .' '.$record->person_name.'/'.$record->pill_about;   
                  ?></td> 
                <td ><?php echo  $record->pill_pay_method?></td>
               
                 <td ><?php echo  $pill_pay_method_name ?></td>
               
                <td ><?php echo  $record->pill_about?></td>
                  <td ><?php echo  $record->esal_rkm?></td>
               <td><?php echo $ppil_num; ?></td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
</div>