
<?php
/*
echo '<pre>';
print_r($items);
die();*/
if (isset($items) && !empty($items)) {
    ?>
    <div class="col-sm-12 no-padding ">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
        <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th>رقم الطلب</th>
                    <th>نوع الاذن</th>
                    <th>تاريخ الاذن</th>
                    <th>بدايه الاذن</th>
                    <th>نهاية الاذن</th>
                    <th>مقدم الطلب </th>
                    <th>عدد الساعات</th>
                    <th> الاجراء</th>
                    <th>حاله الطلب</th>
                    <th>الطلب الان عند </th>

                </tr>

                </thead>
                <tbody>

                <?php
                if (isset($items) && !empty($items)) {
                    $x = 1;

                    foreach ($items as $row) {
                      if ($row->no3_ezn==1){
                          $no3_ezn = 'استئذان شخصي';
                      } elseif ($row->no3_ezn==2){
                          $no3_ezn ='استئذان للعمل' ;
                      }

            if($row->suspend == 0){
            $halet_eltalab = 'جاري ';
            $halet_eltalab_class = 'warning';
            }elseif($row->suspend == 1){
             $halet_eltalab = 'تم قبول الطلب من '.$row->current_from_user_name;
            $halet_eltalab_class = 'success';
            }elseif($row->suspend == 2){
                $halet_eltalab = 'تم رفض الطلب  من '.$row->current_from_user_name;
                $halet_eltalab_class = 'danger';
            }elseif($row->suspend == 4){
               $halet_eltalab = 'تم اعتماد الطلب بالموافقة  من '.$row->current_from_user_name;
               $halet_eltalab_class = 'success';
            }elseif($row->suspend == 5){
               $halet_eltalab = 'تم اعتماد الطلب بالرفض  من '.$row->current_from_user_name;
               $halet_eltalab_class = 'danger';
            }else{
                 $halet_eltalab = 'غير محدد ';
               $halet_eltalab_class = 'danger';
            }

              // $row->ezn_date_ar = explode('/', $row->ezn_date_ar)[2] . '/' . explode('/', $row->ezn_date_ar)[0] . '/' . explode('/', $row->ezn_date_ar)[1];
                        ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                             <td><?php echo $row->ezn_rkm; ?></td>
                            <td><?php echo $no3_ezn; ?></td>
                            <td><?php echo $row->ezn_date_ar; ?></td>
                            <td>
                            
                            
                            
                            <?php
                            $currentDateTime =$row->from_hour;
                            $newDateTime = date('h:i A', strtotime($currentDateTime));
                            
                            
                            echo  $newDateTime; ?></td>
                            <td><?php
                            
                            $DateTime =$row->to_hour;
                            $to_DateTime = date('h:i A', strtotime($DateTime));
                            
                            echo $to_DateTime; ?></td>
                            <td><?php echo $row->emp_name; ?></td>
                            <td><?php echo $row->total_hours; ?></td>
                            <td>
                              <a data-toggle="modal" data-target="#detailsModal" title="تفاصيل" class="btn btn-sm btn-info"
                               style="padding:1px 6px"  onclick="load_page(<?php echo $row->id ; ?>); load_profile_data(<?= $row->emp_id_fk?>); ">
                              <i class="fa fa-list "></i></a>
                              <a  title="طباعة" onclick="print_new_ezn(<?php echo $row->id ; ?>);">
                              <i class="fa fa-print "></i></a>
                                        <?php if ($_SESSION['role_id_fk'] == 1 && $row->suspend!=5 ) {
                                          if ($row->last_ezn == 1) {
                                            if ($row->ezn_date >= strtotime(date('Y-m-d'))) { ?>
                                              <a onclick="swal({ title: 'هل انت متأكد من التعديل ؟',
                                                                   text: '',
                                                                   type: 'warning',
                                                                   showCancelButton: true,
                                                                   confirmButtonClass: 'btn-warning',
                                                                   confirmButtonText: 'تعديل',
                                                                   cancelButtonText: 'إلغاء',
                                                                   closeOnConfirm: true
                                                                   },
                                                                   function(){
                                                                     window.location='<?php echo base_url() ?>human_resources/employee_forms/all_ozonat/Ezn_order/Upadte_ezn/<?php echo $row->id ?>/1';
                                                                   });">
                                                                   <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                      <?php  }
                                              }
                                            } ?>

                            </td>
                            <td>
                            <span class="label label-<?php echo $halet_eltalab_class ?>" style="min-width: 140px;">
                            <?php echo $halet_eltalab;  ?>
                             </span>
                            </td>
                            <td>
                            <span class="label label-info" style="min-width: 140px;">
                            <?php echo $row->current_to_user_name;;  ?>
                             </span>
                            </td>


                        </tr>
                        <?php
                        $x++;
                    }
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>

<?php } ?>


<!-- detailsModal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التفاصيل </h4>
            </div>
            <div class="modal-body" id="details_result"style="width: 75%;">

            </div>
       
         
<div class="modal-body"  id="profile_result" style="    width: 25%;
float: left;

margin-top: -272px;">


</div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <!-- <button
                        type="button" onclick="print_ezn(document.getElementById('row_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button> -->

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<!-- detailsModal -->
<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/load_details",
            data: {row_id:row_id},
            beforeSend: function () {
                $('#details_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>


<script>
    function load_profile_data(emp_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/load_profile_details",
            data: {emp_id:emp_id},
            beforeSend: function () {
                $('#profile_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#profile_result').html(d);

            }

        });

    }
</script>
<script>
function print_new_ezn(value) {
    var ezn_id = value;
    var request = $.ajax({
        // print_resrv -- print_contract
        url: "<?=base_url() . 'human_resources/employee_forms/all_ozonat/Ezn_order/print_new_ezn'?>",
        type: "POST",
        data: {
            ezn_id: ezn_id
        },
    });
    request.done(function(msg) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(msg);
        WinPrint.document.close();
        WinPrint.focus();
        /*  WinPrint.print();
          WinPrint.close();*/
    });
    request.fail(function(jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
    });
}

</script>
