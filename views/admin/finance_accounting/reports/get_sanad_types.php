<?php
/*
echo '<pre>';
print_r($data_table);
echo '<pre>';*/
?>

<div class="col-xs-12 fadeInUp " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php //echo $title?> </h3>
        </div>
        <div class="panel-body">
<span id="message">
<?php
$array_paid_typy=array('','نقدي','تحويل بنكي','شيك');?>
 </span><br>
            <?php   if(isset($data_table)&&$data_table!=null):?>

                <table  class="table table-striped table-bordered" style="width:100%">
                    <tr class="info">
                        <th class="text-center">المسلسل </th>
                        <th class="text-center">رقم السند</th>
                        <th class="text-center">تاريخ تسجيل السند</th>
                        <th class="text-center">طريقة الدفع</th>
                         <th class="text-center">نوع السند</th>
                        <th class="text-center">الإجمالي</th>
                     
      
                    </tr>
                    <?php $x=1; 
                    $total_vlue = 0;
                    foreach($data_table as $row ):
                     if($row->type == 1)
                     {
                        $type_name = 'صرف';
                         $type_class = 'success';
                     }elseif($row->type == 2){
                         $type_name = 'سند قبض';
                         $type_class = 'primary';
                     }
                    
                    ?>
                        <tr class="">
                            <td><?php echo $x++;?></td>
                            <td><?php echo $row->vouch_num; ?> </td>
                            <td><?php echo date("Y-m-d",$row->date); ?> </td>
                            <td><?php echo $array_paid_typy[$row->vouch_type] ?> </td>
                            <td><span class="label label-pill label-<?php echo $type_class; ?> m-r-15"> <?php echo $type_name; ?></span></td>
                            <td><?php echo $row->sum?> </td>

                        </tr>
 <?php
 $total_vlue +=  $row->sum;
 
 ?>


                    <?php endforeach;?>
                    <tr>
                    <td colspan="5">الإجمالي</td>
                     <td><?php echo $total_vlue; ?></td>
                    </tr>
                    
                </table>
            <?php else:?>
                <div class="alert alert-danger" role="alert">
                    <strong>عذرا...!</strong> لا توجد هناك سندات
                </div>
            <?php endif; ?>

           </div>
       </div>
 </div>




 

              
              
              

  