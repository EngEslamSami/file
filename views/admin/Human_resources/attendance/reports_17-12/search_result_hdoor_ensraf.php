
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
        <th style="width: 50px;">صورة </th>
        <th style="width: 90px;"> كود الموظف</th>
        <th style="width: 200px;">الاسم</th>
        <th style="width: 200px;">المسمي الوظيفي</th>
        <th style="width: 300px;">الادارة-القسم</th>
        <th  style="width: 80px;">التاريخ</th>
        <th  style="width: 90px;"> اول تسجيل الدخول </th>
        <th  style="width: 90px;"> اخر تسجيل الخروج</th>
        <th  style="width: 130px;">اجمالي  </th>

    </tr>
    </thead>
    <tbody>
     <?php
     foreach ($result as $key=>$row){
        ?>
         <tr>
             <td><?= $x++?></td>
             <td> <img class="img-circle" data-toggle="modal" data-target="#exampleModal" onclick="set_iamge(<?=$x?>)"
               src="<?=base_url().'uploads/human_resources/emp_photo/'.$row->emp_data->personal_photo?>"
               onerror="this.src='<?=base_url()?>/asisst/fav/apple-icon-120x120.png'"
               style="width:50px;height: 50px;">
               <input type="hidden" name="emp_image" id="emp_image_<?=$x?>" value="<?=$row->emp_data->personal_photo?>">
            </td>
             <td><?=$row->emp_code?></td>
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
                    echo  $row->date_ar;

                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
             <td>
                 <?php
                 if (!empty($row->frist_hdoor)){
                     echo $row->frist_hdoor ;
                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
             <td>
                 <?php
                 if (!empty($row->last_ensraf)){
                     echo $row->last_ensraf ;
                 } else{
                     echo 'غير محدد' ;
                 }
                 ?>
             </td>
               <td>
                 <?php
                 if ((!empty($row->last_ensraf))&&(!empty($row->frist_hdoor))) {
                    $ensraf_time = strtotime($row->last_ensraf);
                    $hdoor_time = strtotime($row->frist_hdoor);
                    $diff = $ensraf_time - $hdoor_time;
                    echo intval(abs($diff)/60) ;
                 }else{
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
             <img id="popover_imag" src="" style="width:100%"
             onerror="this.src='<?=base_url()?>/asisst/fav/apple-icon-120x120.png'" >
      </div>
    </div>
  </div>
</div>


  
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
        "order": [[ 2, "asc" ]],

    } );

</script>


<script>


function set_iamge(id){
    var image=$('#emp_image_'+id).val();
    var url="<?=base_url().'uploads/human_resources/emp_photo/'?>"+image;
    $('#popover_imag').attr('src',url);
       
}
</script>