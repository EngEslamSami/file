


<?php

if (isset($result) && !empty($result)){
    $x=1;

    ?>
    <table id="" class="table scrol_table  table-bordered table-striped table-responsive table-hover">
    <thead>
    <tr class="greentd">
        <th>م</th>
        <th >    كود الموظف</th>
        <th >الاسم</th>
        <th >المسمي الوظيفي</th>
        <th >الادارة-القسم</th>
        <th  >التاريخ</th>
        <th  >الوقت</th>
        <th  >الحالة</th>
    </tr>
    </thead>
    <tbody>
     <?php
     foreach ($result as $key=>$row){
    //  foreach ($result[$key] as $row){
        ?>
         <tr>
             <td><?= $x++?></td>
             <td><?=$row->emp_code?></td>
             <td>
               <i class="fa fa-user-o" data-toggle="modal" data-target="#exampleModal" onclick="set_iamge(<?=$x?>)"></i>
               <input type="hidden" name="emp_image" id="emp_image_<?=$x?>" value="<?=$row->emp_data->personal_photo?>">
            
             <?=$row->emp_data->employee?></td>
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
                 if (!empty($row->time_hdoor_absence)){
                    echo  $row->time_hdoor_absence;

                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td> 
             <td>
                 <?php
                 if (!empty($row->type)){
                     switch ($row->type ) {
                         case 1:
                             echo " تسجيل الدخول ";
                             break;
                         case 2:
                             echo " تسجيل الخروج ";
                             break;
                         
                         default:
                             echo 'غير محدد' ;
                             break;
                     }
                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
             <!-- <td>
                 <?php
                  echo $row->day_name;
                 ?>
             </td> -->

         </tr>
         <?php
     }
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
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-body">
             <img id="popover_imag" src="" style="width:100%"
             onerror="this.src='<?=base_url()?>/asisst/fav/apple-icon-120x120.png'" >
      </div>
    </div>
  </div>
</div>
<script>
function set_iamge(id){
    var image=$('#emp_image_'+id).val();
    var url="<?=base_url().'uploads/human_resources/emp_photo/'?>"+image;
    $('#popover_imag').attr('src',url);
       
}
</script>
<script>

    $('.scrol_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true,
    } );

</script>
