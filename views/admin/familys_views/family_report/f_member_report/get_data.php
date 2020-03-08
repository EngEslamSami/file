<?php
if(isset($result) && $result !=null)
{
   ?>
     <div class="col-xs-12" style="padding-top: 29px;">
                        <div class="panel-body">

                            <div class="fade in active">
                               
<table  id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <th>م</th>
    <th style="text-align: center"> إسم الأبن/ الأبنة</th>
    <th style="text-align: center">إسم الأم</th>
    <th style="text-align: center">رقم هوية الأم</th>
    <th style="text-align: center" >العمر </th>
    <th style="text-align: center">الحالة الدراسية</th>
    </thead>
    <?php   $i=0; foreach ($result as $val){?>
    <tbody>
    <tr >
        <td style="text-align: center"><?=++$i;?></td>

       
        <td style="text-align: center"><?=$val->member_full_name?></td>
        <td style="text-align: center"><?=$val->full_name?></td>
        <td style="text-align: center"><?=$val->mother_id?></td>
        <td style="text-align: center"><?=$val->ages_id?></td>
        <td style="text-align: center"><?=$val->stage_name?></td>
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