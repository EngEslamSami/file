


<div class="col-xs-12 no-padding">
           <table id="new" class="table table-bordered table-striped example">
             <thead>
               <tr class="greentd">
                  <th>م</th>
                  <th>نوع المعامله</th>
                  <th> المهمه</th>
                  <th>التاريخ</th>
                  <th>محوله من </th>
                  <th>التفاصيل</th>
                  <th> الاجراء</th>
                  <!-- <th>خيارات</th> -->
               </tr>
             </thead>
             <tbody>
       
             <?php if (isset($wared) &&isset($sader) )
{
  foreach($wared as $row)
  {
    $x=1;
  
  ?>

              <tr>
              <td><?= $x;?></td>
                <td>وارده</td>
                <td><?= $row->mohma_name;?></td>
                <td><?= $row->date_ar;?></td>
                <td> <?= $row->from_user_name;?></td>
                <td>
                
                                        <a onclick="get_details_wared(<?= $row->id ?>)"
                                                aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det"><i class="fa fa-search" aria-hidden="true"></i></a>
                
                </td>
                <td>
                <button    aria-hidden="true" class="btn btn-warning" onclick="resive_mo3mla(<?= $row->id?>,1)"
                                            ><i class="fa fa-archive"> </i> اضغط لاستلام المعامله</button>
                </td>
                <!-- <td><a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a></td> -->
              </tr>
              
             
<?php $x++; }?>
 <?php  foreach($sader as $row)
  {
    $x=1;
  
  ?>

              <tr>
              <td><?= $x;?></td>
                <td>صادره</td>
                <td><?= $row->mohema_n;?></td>
                <td><?= $row->date_ar;?></td>
                <td> <?= $row->from_user_n;?></td>
                <td>
              
                                        <a onclick="get_details_sader(<?= $row->id ?>)"
                                                aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det"><i class="fa fa-search" aria-hidden="true"></i></a>
                </td>
                <td>
                <button    aria-hidden="true" class="btn btn-warning" onclick="resive_mo3mla(<?= $row->id?>,2)"
                                            ><i class="fa fa-archive"> </i> اضغط لاستلام المعامله</button>
                
                </td>
                <!-- <td><a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a></td> -->
              </tr>
              
             
<?php $x++;}?>


<?php } ?>
 
              
             
 
             </tbody>
           </table>
          </div>
       
          <script>
$('#new').DataTable( {
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