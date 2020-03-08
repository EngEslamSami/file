<?php
/*
echo '<pre>';
print_r($result);
echo '<pre>';

 */
?>



<?php
if(isset($result) && $result !=null)
{
   ?>
     <div class="col-xs-12" style="padding-top: 29px;"> 
                        <div class="panel-body">

                            <div class="fade in active">
                               
<table  id="examples" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <th>م</th>
  

    <th style="text-align: center" >إسم الأم  </th>
    <th style="text-align: center" >هوية الأم  </th>
    
     <th style="text-align: center" > عدد الأبناء   </th>
    
    
    </thead>
    <?php   $i=0; 
    $all_member_num = 0;
    foreach ($result as $val){
        
        $all_member_num += $val->member_num;
        
        ?>
    <tbody>
    <tr >
        <td style="text-align: center"><?=++$i;?></td>
        <td style="text-align: center"><?=$val->mother_name?></td>
        <td style="text-align: center"><?=$val->mother_national_num?></td>

        <td style="text-align: center"><?php echo (  $val->member_num ); ?></td>
    </tr>
    <?   }?>
   
 
    <tr>
    <td colspan="3"></td>
    <td><?php echo $all_member_num; ?></td>
    </tr>

    </tbody>
</table>
</div>
</div>
</div>
  <?}else{
     echo '<div class="alert alert-danger col-xs-12" >
             عفوا لا يوجد بيانات 
    </div>';
  }?>