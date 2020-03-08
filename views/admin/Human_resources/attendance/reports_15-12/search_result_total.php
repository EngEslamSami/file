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
