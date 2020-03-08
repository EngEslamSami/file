
<style type="text/css">
    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
</style>

<?php



function sign($number)
{
    return ($number > 0) ? '+' : (($number < 0) ? '-' : '');
}


// echo "<pre>";
// print_r($result);
if (isset($result) && !empty($result)){
    $x=1;

    ?>
    <table id="" class="table scrol_table  table-bordered table-striped table-responsive table-hover">
    <thead>
    <tr class="greentd">
        <th>م</th>
        <!-- <th>الصورة</th> -->
        <th style="width: 90px;">    كود الموظف</th>
        <th style="width: 300px;">الاسم</th>
        <th style="width: 200px;">المسمي الوظيفي</th>
        <!-- <th style="width: 300px;">الادارة-القسم</th> -->
        <th  style="width: 80px;">التاريخ</th>
        <th  style="width: 50px;">اليوم</th>
        <th  style="width: 90px;">طبيعة اليوم</th>
        <th  style="width: 90px;">جدول المواعيد</th>
        <th  style="width: 90px;"> جدول الوقت</th>
        <th  style="width: 90px;">تسجيل الدخول</th>
        <th  style="width: 90px;">تسجيل الخروج</th>
        <th  style="width: 130px;">اجمالي الوقت </th>
        <th  style="width: 130px;">وقت تسجيل الحضور</th>
        <th  style="width: 130px;">وقت تسجيل االانصراف</th>
        <th  style="width: 130px;">اجمالي الوقت الحضور</th>
        <th style="width: 90px;">التأخير بالدقائق</th>
        <th  style="width: 90px;">المغادرة مبكرا</th>
        <th  style="width: 90px;">حالة الغياب</th>
        <th  style="width: 90px;"> الاستثناء</th>
        <th  style="width: 90px;"> اضافي عادي </th>
        <th  style="width: 90px;"> اضافي عطلة</th>
        <th  style="width: 90px;"> اضافي عطل </th>



    </tr>
    </thead>
    <tbody>
     <?php
     foreach ($result as $key=>$row_date){
     foreach ($result[$key] as $row){
        ?>
         <tr>
             <td><?= $x++?></td>
            
             <td>  <a style="color: black;cursor: pointer;" data-toggle="modal" data-target="#exampleModal" onclick="set_iamge(<?=$x?>)" >
             <?=$row->emp_code?>
              </a> 
             <input type="hidden" name="emp_image" id="emp_image_<?=$x?>" value="<?=$row->personal_photo?>">
             <input type="hidden" name="emp_image" id="emp_name_<?=$x?>" value="<?=$row->employee?>">
             <input type="hidden" name="emp_image" id="emp_code_<?=$x?>" value="<?=$row->emp_code?>">
               <input type="hidden" name="emp_job" id="emp_job_<?=$x?>" value="<?php
                 if (!empty($row->job)){
                     echo $row->job;
                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>">
               <input type="hidden" name="emp_edara" id="emp_edara_<?=$x?>" value="<?php if (!empty($row->edara)){
                       echo $row->edara;
                   }else{
                     echo 'غير محدد' ;
                 }?>">
               <input type="hidden" name="emp_edara" id="emp_qsm_<?=$x?>" value="<?php if (!empty($row->qsm)){
                       echo $row->qsm;
                   }else{
                     echo 'غير محدد' ;
                 }?>">
             </td>
             <td> 
          
                <?=$row->employee?></td>
             <td>
                 <?php
                 if (!empty($row->job)){
                     echo $row->job;
                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
            
             <td>
                 <?php
                 if (!empty($row->date_ar)){
                   // echo $row->date_ar ;
                   // print_r(explode('/', $row->date_ar));
                    //  $row->date_ar = explode('/', $row->date_ar)[2] . '/' . explode('/', $row->date_ar)[0] . '/' . explode('/', $row->date_ar)[1];
                     echo  $row->date_ar;

                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
             <td>
                 <?php
                  echo $row->day_name;
                 ?>
             </td>
             <td>
                 <?php
                 if (!empty($row->day_type)){
                     echo $row->day_type ;
                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
             <td>
                 <?php

                 if (!empty($row->period)) {
                   if ($row->period->work_period_id_fk ==1){
                       echo 'فترة' ;
                   }
                   elseif ($row->period->work_period_id_fk ==2){
                       echo 'فترتين' ;
                   }
                   else{
                       echo 'غير محدد' ;
                   }
                         }else{
                             echo 'غير محدد' ;
                         }


                 ?>

             </td>
             <td>
                 <?php
                 if (!empty($row->dawam_title)){
                     echo $row->dawam_title ;
                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td> 
             <td>
                 <?php
                 if (!empty($row->dawam_time_setting)){
                     echo $row->dawam_time_setting ;
                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
             <td>
                 <?php
                 if (!empty($row->ensraf_time_setting)){
                     echo $row->ensraf_time_setting ;
                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
               <td>
                 <?php
                if (!empty($row->dawam_time_setting)&&(!empty($row->ensraf_time_setting))){

                 $ensraf_time_setting = strtotime($row->ensraf_time_setting);
                $dawam_time_setting = strtotime($row->dawam_time_setting);
                 $diff = $ensraf_time_setting - $dawam_time_setting;
                 echo intval( abs($diff)/60) .' '.'دقيقة';
                 }else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
             <td>
                 <?php
                 if (!empty($row->hdoor_time)){
                     echo $row->hdoor_time ;
                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
             <td>
                 <?php
                 if (!empty($row->ensraf_time)){
                     echo $row->ensraf_time ;
                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
             <td>
                 <?php
                if (!empty($row->hdoor_time)&&(!empty($row->ensraf_time))){

                 $ensraf_time = strtotime($row->ensraf_time);
                $hdoor_time = strtotime($row->hdoor_time);
                 $diff = $ensraf_time - $hdoor_time;
                 echo intval( abs($diff)/60) .' '.'دقيقة';
                 }else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
             <td>
                 <?php
                if (!empty($row->hdoor_time)){

                  $dawam_time_setting = strtotime($row->dawam_time_setting);
                 $hdoor_time = strtotime($row->hdoor_time);
                  $diff_mint =$dawam_time_setting-  $hdoor_time ;
                 echo sign($diff_mint).( abs($diff_mint)/60) .' '.'دقيقة';
                }else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
             <td>
                 <?php
                if (!empty($row->ensraf_time)){

                 $ensraf_time_setting = strtotime($row->ensraf_time_setting);
                 $ensraf_time = strtotime($row->ensraf_time);
                 $diff_mint =  $ensraf_time_setting - $ensraf_time;
                //  echo sign($diff_mint). (gmdate('i', abs($diff_mint))) .' '.'دقيقة';
                 echo sign($diff_mint). ( abs($diff_mint)/60) .' '.'دقيقة';
                }else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
             <td style="background-color: <?php if (!empty($row->day_color)){ echo $row->day_color; }?>">
                 <?php
                  if (!empty($row->attend)){
                      echo $row->attend;
                  }
                  else{
                      echo 'غير محدد' ;
                  }
                 ?>
             </td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
         </tr>
         <?php
     }}
     ?>
    </tbody>
    </table>
<?php
} else{
    ?>
    <div class="alert alert-danger">عفوا... لا يوجد بيانات !</div>
<?php
}
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document"  >
    <div class="modal-content">
  
      <div class="modal-body">
      
                <div class="col-md-12">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"  
                    style="font-size: 30px;">
                    <span aria-hidden="true">&times;</span>
                </div>
             <div class="container-fluid">
             

                <div class="col-md-8">

                <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <strong><span id="emp_name"></span></strong> </li>
                        <li class="list-group-item"> <strong>كود الموظف :</strong> <span id="emp_code"></span></li>
                        <li class="list-group-item"> <strong> الوظيفة:</strong> <span id="emp_job"></span></li>
                        <li class="list-group-item"><strong> الادارة :</strong> <span id="emp_edara"></span></li>
                        <li class="list-group-item"> <strong> القسم : </strong><span id="emp_qsm"></span></li>
                    </ul>
                </div>
                <div class="col-md-4">
                  <img class="img-thumbnail" id="popover_imag" src="" style="width: 110%;"
             onerror="this.src='<?=base_url()?>/asisst/fav/apple-icon-120x120.png'" >
                </div>

              </div>
      </div>
    </div>
  </div>
</div>
<script>
function set_iamge(id){
    var image=$('#emp_image_'+id).val();
    var name=$('#emp_name_'+id).val();
    var code=$('#emp_code_'+id).val();
    var edara=$('#emp_edara_'+id).val();
    var qsm=$('#emp_qsm_'+id).val();
    var job=$('#emp_job_'+id).val();
    console.warn("job :: "+job);
    
    var url="<?=base_url().'uploads/human_resources/emp_photo/'?>"+image;
    $('#popover_imag').attr('src',url);
                                    
    $('#emp_edara').text(edara);
    $('#emp_qsm').text(qsm);
    $('#emp_name').text(name);
    $('#emp_code').text(code);
    $('#emp_job').text(job);
       
}
</script>

<script>

    $('.scrol_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true,
        scrollX: true,
        "order": [[ 1, "asc" ],[ 0, "asc" ]],

    } );

</script>

