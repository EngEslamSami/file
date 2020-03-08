<?php
if (isset($all_families) && !empty($all_families)){
    $x=1;
    ?>
<table id="example" class="table  table-bordered table-striped table-responsive table-hover">
    <thead>
    <tr class="greentd">
        <th>م</th>
        <th>رقم ملف الأسرة</th>
        <th>اسم رب الأسرة</th>
        <?php
          if ($value==1){
              ?>
              <th>الجمعيات المستفاد منها</th>
        <?php
          }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
     foreach ($all_families as $row){
         ?>

         <tr>
             <td><?= $x++?></td>
             <td><?= $row->file_num ?></td>
             <td><?= $row->father_name ?></td>
             <?php
             if ($value==1 && !empty($row->gm3iat)){
                 ?>
                 <td>
                     <?php echo count($row->gm3iat).' '.'('.' ';
                     foreach ($row->gm3iat as $item){
                           $text = $item->gam3ia_n;
                           echo $text.',';
                         //   $text += ' '.','.' '.$item->gam3ia_n;
                     }
                     echo ')';

                     ?>
                 </td>
                 <?php
             }
             ?>


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
