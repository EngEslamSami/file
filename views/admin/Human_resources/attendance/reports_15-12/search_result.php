
<style type="text/css">
    div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
    
    .greentd td, .greentd th {
    color: #fff !important;
    font-size: 14px !important;
    background-color: #0b4332 !important;
    border-radius: 3px !important;
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
        <th style="width: 90px;">    كود الموظف</th>
        <th style="width: 200px;">الاسم</th>
        <th style="width: 200px;">المسمي الوظيفي</th>
        <th style="width: 300px;">الادارة-القسم</th>
        <th  style="width: 80px;">التاريخ</th>
        <th  style="width: 50px;">اليوم</th>
        <th  style="width: 90px;">طبيعة اليوم</th>
        <th  style="width: 90px;">جدول المواعيد</th>
        <th  style="width: 90px;">تسجيل الدخول</th>
        <th  style="width: 90px;">تسجيل الخروج</th>
        <th  style="width: 120px;">وقت تسجيل الحضور</th>
        <th  style="width: 130px;">وقت تسجيل الانصراف</th>
        <th  style="width: 120px;">اجمالي الوقت الحضور</th>
        <th style="width: 90px;">التأخير بالدقائق</th>
        <th  style="width: 90px;">المغادرة مبكرا</th>
        <th  style="width: 90px;">حالة الغياب</th>



    </tr>
    </thead>
    <tbody>
     <?php
     foreach ($result as $key=>$row_date){
     foreach ($result[$key] as $row){
        ?>
         <tr>
             <td><?= $x++?></td>
             <td><?=$row->emp_code?></td>
             <td><?=$row->employee?></td>
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
                   if (!empty($row->edara)){
                       echo $row->edara;
                   }
                   if (!empty($row->qsm)){
                       echo ' '.'-'.' '.$row->qsm;
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
                 $ensraf_time = strtotime($row->ensraf_time);
                $hdoor_time = strtotime($row->hdoor_time);
                 $diff = $ensraf_time - $hdoor_time;
                 echo intval(gmdate('H:i', abs($diff)))  .' '.'ساعات';
                 
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
        "order": [[ 1, "asc" ]],

    } );

</script>
