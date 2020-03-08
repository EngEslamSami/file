



<div class="col-xs-12 no-padding">
           <table  id="mostalam" class="table table-bordered table-striped example">
             <thead>
               <tr class="greentd">
                  <th>م</th>
                  <th>نوع المعامله</th>
                  <th> المهمه</th>
                  <th>التاريخ</th>
                  <th>محوله من </th>
                  <th>التفاصيل</th>
                  <th> وقت الاستلام</th>
                  <th> الاجراء</th>
                  <!-- <th>خيارات</th> -->
               </tr>
             </thead>
             <tbody>
       
             <?php if (isset($wared_mostalm) &&isset($sader_mostalm) )
{
  foreach($wared_mostalm as $row)
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
                
                                        <a onclick="get_details_wared_mostalam(<?= $row->id ?>)"
                                                aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det_mostlam"><i class="fa fa-search" aria-hidden="true"></i></a>
                
                </td>
                <td> <?= $row->readed_date_ar;?></td>
                <td>
                <button    aria-hidden="true" class="btn btn-danger" onclick="end_mo3mla(<?= $row->id?>,1)"
                                            ><i class="fa fa-archive"> </i> اضغط لانهاء المعامله</button>
                                            <div class="btn-group">
                  <button type="button" class="btn btn-warning" style="height: 33px;">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" style="height: 33px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a  href="<?php echo base_url();?>/all_secretary/archive/wared/Add_wared/compelete_details/<?php echo $row->wared_id_fk;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i> استكمال البيانات</a></li>
                   </ul>
                   </div>
                                            
                </td>
                <!-- <td><a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a></td> -->
              </tr>
              
             
<?php $x++; }?>
 <?php  foreach($sader_mostalm as $row)
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
              
                                        <a onclick="get_details_sader_mostalam(<?= $row->id ?>)"
                                                aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det_mostlam"><i class="fa fa-search" aria-hidden="true"></i></a>
                </td>
                <td> <?= $row->readed_date_ar;?></td>
                <td>
                <button    aria-hidden="true" class="btn btn-danger" onclick="end_mo3mla(<?= $row->id?>,2)"
                                            ><i class="fa fa-archive"> </i> اضغط لانهاء المعامله</button>
                                            <div class="btn-group">
                  <button type="button" class="btn btn-warning" style="height: 33px;">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" style="height: 33px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a  href="<?php echo base_url();?>/all_secretary/archive/sader/Add_sader/add_deal/<?php echo $row->sader_id_fk;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i> استكمال البيانات</a></li>
                </ul>
                </div>
                
                </td>
                <!-- <td><a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a></td> -->
              </tr>
              
             
<?php $x++;}?>


<?php } ?>
   
             </tbody>
           </table>
          </div>
         

          <script>
$('#mostalam').DataTable( {
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