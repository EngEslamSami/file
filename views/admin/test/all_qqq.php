   
    <div class="col-xs-12">
        <table id="examplse" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
         <thead>
        <tr>
            <th width="2%">م</th>
            <th  class="text-center">رقم الايصال </th>
             <th  class="text-center">الاسم </th>
              <th  class="text-center">تفاصيل </th>
              <th  class="text-center">بيان الايصال</th> 
          
             
           
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

            /*  if($record->no3_qued == 2){
               //   $bbbyan =  $record->byan .'/'.$record->pill_about   ;
               
               
                 $bbbyan = ' إيصال '.$ppil_num .' '.$record->person_name.'/'.$record->pill_about;   
              }else{
                $bbbyan =  $record->byan  ;
              }*/
              
              
             
                 

        
        ?>
            <tr>
             <td ><?php echo $i; ?> </td>
                <td ><?php echo  $record->pill_num?></td>
               <td ><?php echo  $record->person_name?></td>
               <td ><?php echo  $record->about?></td>
                
               <td><?php echo' ايصال '.$record->pill_num .' '.$record->person_name.'/'.$record->about;   ?></td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
</div>