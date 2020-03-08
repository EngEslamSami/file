



<div class="col-xs-12 no-padding">
           <table class="table table-bordered table-striped example">
             <thead>
               <tr class="greentd">
                  <th>م</th>
                  <th>نوع المعامله</th>
                  <th> المهمه</th>
                  <th>التاريخ</th>
                  <th>محوله من </th>
                  <th>التفاصيل</th>
                  
                  <!-- <th>خيارات</th> -->
               </tr>
             </thead>
             <tbody>
       
             <?php if ($_SESSION['role_id_fk'] == 1 )
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
                
                                        <a onclick="get_details_wared_end(<?= $row->id ?>)"
                                                aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det_end"><i class="fa fa-search" aria-hidden="true"></i></a>
                
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
              
                                        <a onclick="get_details_sader_end(<?= $row->id ?>)"
                                                aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det_end"><i class="fa fa-search" aria-hidden="true"></i></a>
                </td>
               
                <!-- <td><a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a></td> -->
              </tr>
              
             
<?php $x++;}?>


<?php }else{ ?>
  <?php 
  foreach($wared as $row)
  {
  
  $x=1;
if ($_SESSION['role_id_fk'] == 3&& $row->to_user_id==$_SESSION['emp_code']) {?>
             <tr>
              <td><?= $x;?></td>
                <td>وارده</td>
                <td><?= $row->mohma_name;?></td>
                <td><?= $row->date_ar;?></td>
                <td> <?= $row->from_user_name;?></td>
                <td>
              
                                        <a onclick="get_details_wared_end(<?= $row->id ?>)"
                                                aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det_end"><i class="fa fa-search" aria-hidden="true"></i></a>
                
                </td>
                
                <!-- <td><a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a></td> -->
              </tr>
              
             
<?php  $x++;} }?>
 <?php  foreach($sader as $row)
  {
    $x=1;
    if ($_SESSION['role_id_fk'] == 3&& $row->to_user_id==$_SESSION['emp_code']) {?>
  
  

               <tr>
              <td><?= $x;?></td>
                <td>صادره</td>
                <td><?= $row->mohema_n;?></td>
                <td><?= $row->date_ar;?></td>
                <td> <?= $row->from_user_n;?></td>
                <td>
               
                                        <a onclick="get_details_sader_end(<?= $row->id ?>)"
                                                aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det_end"><i class="fa fa-search" aria-hidden="true"></i></a>
                
                </td>
               
                <!-- <td><a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a></td> -->
              </tr>
              
             

<?php $x++;  }} }?>   
             </tbody>
           </table>
          </div>
        

          <div class="modal fade" id="myModal_det_end" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> التفاصيل :
                    <span id="pop_rkm"></span>
                </h4>
            </div>

            <div class="modal-body">
                <div id="details_end"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>


<script>
    function get_details_sader_end(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_details_sader",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details_end').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details_end').html(d);

            }

        });
    }
</script>
<script>
    function get_details_wared_end(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_details_wared",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details_end').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details_end').html(d);

            }

        });
    }
</script>


