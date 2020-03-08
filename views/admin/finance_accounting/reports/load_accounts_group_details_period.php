<div class="col-sm-12 col-xs-12">
<br><br>
<?php if(isset($records)&&$records!=null){
?>

<!--
<div style="float:left" >
<button onClick="window.print()" class="btn btn-sm  btn-success hidden-print" > <span class="glyphicon glyphicon-print"></span> طبـاعه </button>
</div> <br/> <br/>
-->

    <table id="no-more-tables" class="table table-bordered" role="table">

        <thead>

        <tr class="info">

            <th width="2%">#</th>

            <th  class="text-right">كود الحساب</th>

            <th  class="text-right">إسم الحساب</th>

            <th  class="text-right">مدين قبل</th>
            
            <th  class="text-right">دائن قبل</th>
            
            <th  class="text-right">مدين حركة</th>
            
            <th  class="text-right">دائن حركة</th>

            <th  class="text-right">مجموع مدين</th>
            
            <th  class="text-right">مجموع دائن</th>

        </tr>

        </thead>
        <tbody>
        
        <?php
        $count1 = 1;
        function drow($data, $count, $class, $sum_madeen=0, $sum_dayen=0){
            $total_madeen = 0;
            $total_dayen = 0;
            $count1 = $count;
            for($z = 0 ; $z < count($data) ; $z++){
                
                if(isset($data[$z]['children'])){
                    $class = 'btn-success';
                    $count = drow($data[$z]['children'], $count1, 'btn-info',$sum_madeen,$sum_dayen);
                    $sum_madeen = $data[$z]['madeen']+$count[1];
                    $sum_dayen = $data[$z]['dayen']+$count[2];
                    $count1 = $count[0];
                }   
                else{
                    $sum_madeen = $data[$z]['madeen'];
                    $sum_dayen = $data[$z]['dayen'];
                }
                echo '<tr class="'.$class.'">
                      <td>'.($count1++).'</td>
                      <td>'.$data[$z]['code'].'</td>
                      <td>'.$data[$z]['name'].'</td>
                      <td>'.sprintf("%.2f",$sum_madeen).'</td>
                      <td>'.sprintf("%.2f",$sum_dayen).'</td>
                      <td>'.sprintf("%.2f",$data[$z]['all_madeen']).'</td>
                      <td>'.sprintf("%.2f",$data[$z]['all_dayen']).'</td>
                      <td>'.sprintf("%.2f",($data[$z]['all_madeen']+$sum_madeen)).'</td>
                      <td>'.sprintf("%.2f",($data[$z]['all_dayen']+$sum_dayen)).'</td>
                      </tr>';
                $total_madeen += $sum_madeen;
                $total_dayen += $sum_dayen;
            }
            return array($count1,$total_madeen,$total_dayen);
        }

        for($x = 0 ; $x < count($records) ; $x++){
            if(isset($records[$x]['children'])){
                $count = drow($records[$x]['children'], $count1, 'btn-success');
                $sum_madeen = $count[1];
                $sum_dayen = $count[2];
                $count1 = $count[0];
            }
            else{
                $sum_madeen = $data[$x]['madeen'];
                $sum_dayen = $data[$x]['dayen'];
            }
            echo '<tr class="btn-warning">
                  <td>'.($count1++).'</td>
                  <td>'.$records[$x]['code'].'</td>
                  <td>'.$records[$x]['name'].'</td>
                  <td>'.sprintf("%.2f",$sum_madeen).'</td>
                  <td>'.sprintf("%.2f",$sum_dayen).'</td>
                  <td>'.sprintf("%.2f",$records[$x]['all_madeen']).'</td>
                  <td>'.sprintf("%.2f",$records[$x]['all_dayen']).'</td>
                  <td>'.sprintf("%.2f",($records[$x]['all_madeen']+$sum_madeen)).'</td>
                  <td>'.sprintf("%.2f",($records[$x]['all_dayen']+$sum_dayen)).'</td>
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

            </div>
            
            </fieldset>
