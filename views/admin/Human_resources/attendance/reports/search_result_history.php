

<?php

if (isset($result) && !empty($result)){
    $x=1;

    ?>
    <table id="" class="table scrol_table  table-bordered table-striped table-responsive table-hover">
    <thead>
    <tr class="greentd">
        <th>م</th>
        <!-- <th>الصورة</th> -->
        <th >    كود الموظف</th>
        <th >الاسم</th>
        <th >المسمي الوظيفي</th>
        <!-- <th >الادارة-القسم</th> -->
        <th  >التاريخ</th>
        <th  >الوقت</th>
        <th  >الحالة</th>
    </tr>
    </thead>
    <tbody>
     <?php
     foreach ($result as $key=>$row){
        ?>
         <tr>
             <td><?= $x++?></td>
            
             <td>  <a style="color: black;cursor: pointer;" data-toggle="modal" data-target="#exampleModal" onclick="set_iamge(<?=$x?>)" >
             <?=$row->emp_code?></a> 
             <input type="hidden" name="emp_image" id="emp_image_<?=$x?>" value="<?=$row->emp_data->personal_photo?>">
             <input type="hidden" name="emp_image" id="emp_name_<?=$x?>" value="<?=$row->emp_data->employee?>">
             <input type="hidden" name="emp_image" id="emp_code_<?=$x?>" value="<?=$row->emp_data->emp_code?>">
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
             <!-- <td>
                 <?php
                   if (!empty($row->edara)){
                       echo $row->edara;
                   }
                   if (!empty($row->qsm)){
                       echo ' '.'-'.' '.$row->qsm;
                   }
                 ?>
             </td> -->
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
