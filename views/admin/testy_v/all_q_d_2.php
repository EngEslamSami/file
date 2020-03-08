<?php
/*
    echo '<pre>';
    print_r($all_pills_inbox);*/
?>



    <?php

if(!empty($all_pills_inbox)){ ?>
<table id="" class="table table-striped table-bordered dt-responsive nowrap example">
<thead>
<tr class="greentd">
    <th style="text-align: center !important;">م</th>
    <th style="text-align: center !important;">رقم الإيصال</th>
    <th style="text-align: center !important;">طريقة التوريد</th>
     <th style="text-align: center !important;">ترحيل السند</th>
     <th style="text-align: center !important;">رقم القيد</th>
     <th style="text-align: center !important;">رقم القيد بالايصالات</th>
 <th style="text-align: center !important;">حالة القيد</th>
 <th style="text-align: center !important;">حالة القيد</th>

</tr>
</thead>
<tbody>
                                <?php
$pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

$x=0;
foreach($all_pills_inbox as $row){
$x++;
if($row->deport_sand_qabd == 0){
   $deport_sand_qabd  = 'لم يرحل';
}elseif($row->deport_sand_qabd == 1){
   $deport_sand_qabd  = 'تم الترحيل'; 
}



if($row->halet_qued == 0){
   $halet_qued  = 'لم يرحل';
}elseif($row->halet_qued == 1){
   $halet_qued  = ' تم الترحيل'; 
}


?>
<tr>
    <td><?=$x?></td>
    <td><?=$row->pill_num?></td>
    <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
   <td><?=$deport_sand_qabd ?></td>
   
   <td><?=$row->rkm_qued?></td>
      <td><?=$row->qued_num?></td>
   
     <td><?=$row->halet_qued?></td>
    <td><?=$halet_qued?></td>



</tr>
<?php   } ?>
</tbody>
</table>
<?php  }  else { ?>
<div style="color: red; font-size: large;" class="col-sm-12">لم يتم  إضافة إيصالات !!</div>

<?php } ?>

