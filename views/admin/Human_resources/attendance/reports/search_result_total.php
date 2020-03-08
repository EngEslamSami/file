<?php
// echo "<pre>";
// print_r($result);
if (isset($result) && !empty($result)){
    $x=1;

    ?>
    <table id="example" class="table  table-bordered table-striped table-hover">
    <thead>
    <tr class="greentd">
        <th>م</th>
        <!-- <th>الصورة</th> -->
        <th style="width: 90px;"> كود الموظف</th>
        <th style="width: 300px;">الاسم</th>
        <th style="width: 200px;">المسمي الوظيفي</th>
        <!-- <th>الادارة-القسم</th> -->
        <th style="width: 100px;">التأخير بالدقائق</th>
        <th style="width: 100px;">المغادرة مبكرا</th>
        <th style="width: 100px;" >اجمالي الغياب </th>
        <td style="width: 100px;">عدد التأخير</td>
        <td style="width: 100px;">عدد المغادرة مبكر</td>
        <th style="width: 100px;"> اضافي عادي </th>
        <th style="width: 100px;" > اضافي عطلة</th>
        <th style="width: 100px;" > اضافي عطل </th>
        <!-- <td></td> -->
    </tr>
    </thead>
    <tbody>
     <?php
     foreach ($result as $row){
        ?>
         <tr>
             <td><?= $x++?></td>
             <!-- <td>  <img class="img-circle" data-toggle="modal" data-target="#exampleModal" onclick="set_iamge(<?=$x?>)"
               src="<?=base_url().'uploads/human_resources/emp_photo/'.$row->personal_photo?>"
               onerror="this.src='<?=base_url()?>/asisst/fav/apple-icon-120x120.png'"
               style="width:50px;height: 50px;"
               >
               <input type="hidden" name="emp_image" id="emp_image_<?=$x?>" value="<?=$row->personal_photo?>">
             </td> -->
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
                 <?php echo $row->main_delay .' '.'دقيقة';?>
             </td>
             <td>
               <?php echo $row->ensraf_delay .' '.'دقيقة';?>

             </td>
             <td>
               <?php echo $row->days_abs .' '.'يوم';?>
             </td>
             <td>
               <?php echo $row->hdoor_dalay_num .' '.'مرة';?>
             </td>
             <td>
               <?php echo $row->ensraf_num .' '.'مرة';?>
             </td>
                <td></td>                   
                <td></td>                   
                <td></td>                   

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

    $('#example').DataTable( {
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
        scrollX: true,

        colReorder: true
    } );

</script>
