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
        <th> كود الموظف</th>
        <th>الاسم</th>
        <th>المسمي الوظيفي</th>
        <th>الادارة-القسم</th>
        <th>التأخير بالدقائق</th>
        <th>المغادرة مبكرا</th>
        <th>اجمالي الغياب </th>
    </tr>
    </thead>
    <tbody>
     <?php
     foreach ($result as $row){
        ?>
         <tr>
             <td><?= $x++?></td>
             <td><?=$row->emp_code?></td>
             <td>
              <i class="fa fa-user-o" data-toggle="modal" data-target="#exampleModal" onclick="set_iamge(<?=$x?>)"></i>
               <input type="hidden" name="emp_image" id="emp_image_<?=$x?>" value="<?=$row->personal_photo?>">
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
                   if (!empty($row->edara)){
                       echo $row->edara;
                   }
                   if (!empty($row->qsm)){
                       echo ' '.'-'.' '.$row->qsm;
                   }
                 ?>
             </td>

             <td>
                 <?php echo $row->main_delay .' '.'دقيقة';?>
             </td>
             <td>
               <?php echo $row->ensraf_delay .' '.'دقيقة';?>

             </td>
             <td>
               <?php echo $row->days_abs .' '.'يوم';?>
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
function set_iamge(id){
    var image=$('#emp_image_'+id).val();
    var url="<?=base_url().'uploads/human_resources/emp_photo/'?>"+image;
    $('#popover_imag').attr('src',url);
       
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
        colReorder: true
    } );

</script>
