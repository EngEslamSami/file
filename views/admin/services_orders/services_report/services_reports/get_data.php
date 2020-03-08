<?php
if(isset($results) && $results !=null)
{
   ?>
     <div class="col-xs-12" style="padding-top: 29px;">
                        <div class="panel-body">

                            <div class="fade in active">
                               
<table  id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <th>م</th>
    <th style="text-align: center">فئة الخدمة</th>
    <th style="text-align: center">نوع الخدمة</th>
    <th style="text-align: center">التاريخ</th>
    <th style="text-align: center">أسم الام </th>
    <th style="text-align: center" >رقم هوية الأم </th>
    <th style="text-align: center">حالة الطلب</th>
    </thead>
    <?php   $i=0; foreach ($results as $val){?>
    <tbody>
    <tr >
        <td style="text-align: center"><?=++$i;?></td>

       
        <td style="text-align: center"><?=$fa2a_service?></td>
        <td style="text-align: center"><?=$type_service?></td>
        <td style="text-align: center"><?=date('Y-m-d',$val->date)?></td>
        <td style="text-align: center"><?=$val->m_full_name?></td>
        <td style="text-align: center"><?=$val->mother_national_id_fk?></td>
        <?php
        
        if($val->approved == 0){
         $status= 'جاري';   
        }elseif($val->approved == 1){
         $status= 'مقبول';     
        }elseif($val->approved == 2){
         $status= 'مرفوض';     
        }else{
            
        }
        
         ?>
        <td style="text-align: center"><?=$status?></td>
    </tr>
   
    <?   }?>
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