
 <div class="col-sm-12 col-md-12 col-xs-12">
       
        <div class="top-line"></div><!--message of delete will be showen here-->
        <div class="panel panel-bd lobidrag">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>ميزان مراجعه</h4>
            </div>
          </div>
          <div class="panel-body">
<?php if(isset($records)&&$records!=null){
?>





    <table class="example table table-bordered" role="table">
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-right">كود الحساب</th>
            <th  class="text-right">إسم الحساب</th>

            <th  class="text-right">مدين حركة</th>
            <th  class="text-right">دائن حركة</th>
            <th  class="text-right">مجموع مدين</th>
            <th  class="text-right">مجموع دائن</th>
             <th  class="text-right">الرصيد</th>
        </tr>

        </thead>
        <tbody>
        
        <?php
     /*   echo '<pre>';
        print_r($data);
       */ 
        $count1 = 1;
   
        function drows($data, $count, $class, $sum_madeen=0, $sum_dayen=0){
            $total_madeen = 0;
            $total_dayen = 0;
            $count1 = $count;
            for($z = 0 ; $z < count($data) ; $z++){
                
                if(isset($data[$z]['children'])){
                    $class = '';
                    
                    $count = drows($data[$z]['children'], $count1, 'btn-infooo',$sum_madeen,$sum_dayen);
                    $sum_madeen = $data[$z]['madeen']+$count[1];
                    $sum_dayen = $data[$z]['dayen']+$count[2];
                    $count1 = $count[0];
                }   
                else{
                    $sum_madeen = $data[$z]['madeen'];
                    $sum_dayen = $data[$z]['dayen'];
                }
            
            
            if($data[$z]['hesab_tabe3a'] == 1){
              
              $rased =   ($data[$z]['all_madeen']) - ($data[$z]['all_dayen']);
            }elseif($data[$z]['hesab_tabe3a'] == 2){
               $rased =   ($data[$z]['all_dayen']) - ($data[$z]['all_madeen']);  
            }
            
            
            
                
                echo '<tr class="'.$class.'">
                      <td>'.($count1++).'</td>
                      <td>'.$data[$z]['code'].'</td>
                      <td>'.$data[$z]['name'].'</td>

                      <td>'.sprintf("%.2f",$data[$z]['all_madeen']).'</td>
                      <td>'.sprintf("%.2f",$data[$z]['all_dayen']).'</td>
                      <td>'.sprintf("%.2f",($data[$z]['all_madeen'])).'</td>
                      <td>'.sprintf("%.2f",($data[$z]['all_dayen'])).'</td>
                         <td>'.$rased.'</td>
                      </tr>';
                $total_madeen += $sum_madeen;
                $total_dayen += $sum_dayen;
            }
            return array($count1,$total_madeen,$total_dayen);
        }

        for($x = 0 ; $x < count($records) ; $x++){
            if(isset($records[$x]['children'])){
                $count = drows($records[$x]['children'], $count1, 'btn-successss');
                $sum_madeen = $count[1];
                $sum_dayen = $count[2];
                $count1 = $count[0];
            }
            else{
                $sum_madeen = $records[$x]['maden'];
                $sum_dayen = $records[$x]['dayen'];
            }
            
              if($records[$x]['hesab_tabe3a'] == 1){
              
              $rased =   ($records[$x]['all_madeen']) - ($records[$x]['all_dayen']);
            }elseif($records[$x]['hesab_tabe3a'] == 2){
               $rased =   ($records[$x]['all_dayen']) - ($records[$x]['all_madeen']);  
            }
            
            
            echo '<tr class="">
                  <td>'.($count1++).'</td>
                  <td>'.$records[$x]['code'].'</td>
                  <td>'.$records[$x]['name'].'</td>
                  <td>'.sprintf("%.2f",$records[$x]['all_madeen']).'</td>
                  <td>'.sprintf("%.2f",$records[$x]['all_dayen']).'</td>
                  <td>'.sprintf("%.2f",($records[$x]['all_madeen'])).'</td>
                  <td>'.sprintf("%.2f",($records[$x]['all_dayen'])).'</td>
                   <td>'.$rased.'</td>
                  </tr>';
        }
        ?>
        
        </tbody>

    </table>

<?php 
 }
else
echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا توجد حسابات
</div>';

?>

            </div>   </div>
            
