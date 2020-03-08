<div class="col-sm-12 no-padding">
   <?php if(!isset($panel)){ ?>
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <!--<div class="panel-body">
            <div class="col-sm-12">

            </div>
       </div>-->
        <div class="panel-body">
        <?php } ?>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#mine_1" aria-controls="mine_1" role="tab"
                                                          data-toggle="tab"><span>طلباتي</span></a></li>
                <li role="presentation" class=""><a href="#follow_1" aria-controls="follow_1" role="tab"
                                                    data-toggle="tab"><span>متابعة طلباتي</span></a></li>
                <li role="presentation" class=""><a href="#comming_1" aria-controls="comming_1" role="tab"
                                                    data-toggle="tab"><span>الوارد</span></a></li>
            </ul>

            <div class="tab-content" id="tab-content1">
                <br>
                <div role="tabpanel" class="tab-pane fade active in" id="mine_1">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr class="info">
                            <th>م</th>
                            <th>رقم الطلب</th>
                            <th>نوع الإجازة</th>
                            <th>بداية الإجازة</th>
                            <th>نهاية الإجازة</th>
                           <!-- <th>عدد الأيام المطلوبة</th> -->
                              <th>الطلب الأن عند</th>
                                <th>الإسم</th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($user_orders)) {
                            

                            
                            
                            
                            $x = 1;
                            foreach ($user_orders as $row) {
                                $days = (strtotime($row->agaza_to_date_m) - strtotime($row->agaza_from_date_m)) / (60 * 60 * 24);



if($row->suspend == 1){
  $halet_talab = 'تم الموافقةعلي الطلب'; 
  $halet_label = 'label-success';  
}elseif($row->suspend == 2){
   $halet_talab = 'تم رفض الطلب';
   $halet_label = 'label-danger';    
}elseif($row->suspend == 4){
   $halet_talab = 'تم إعتماد الطلب';
   $halet_label = 'label-custom';    
}else{
    $halet_talab = 'غير محدد';
    $halet_label = 'label-danger'; 
}

                                ?>
                                <tr>
                                    <td><?php echo $x; ?></td>
                                    <td><?php echo $row->agaza_rkm; ?></td>
                                    
                                    <td><?php echo $row->no3_title; ?></td>
                                    <td><?php 
                                    $arr = explode('/', $row->agaza_from_date_m);
                                echo $newDate = $arr[2].'-'.$arr[0].'-'.$arr[1];
                                    
                                    ?></td>
                                    <td><?php 
                                    $arr = explode('/', $row->agaza_to_date_m);
echo $newDate = $arr[2].'-'.$arr[0].'-'.$arr[1];
                                  //  echo $row->agaza_to_date_m; 
                                    ?></td>
                                 <!--   <td><?= $days ?></td> -->
                                    
                                  <td><?php echo $row->talab_in_title; ?></td>   
    <td><?php echo $row->current_to_user_name; ?></td>    
    
    <td>
                                    
<!------------------------------>                                    



<?php   
 /* if($row->suspend == 0 ){?>
   <span class="label label-warning">
لم تتم إجراءات علي الطلب 
 </span>  <?php }else
 */if($row->suspend == 4 ){ ?> 
    <span class="label label-success">
تم اعتماد الطلب بالموافقة 
 </span>
     <?php }elseif($row->suspend == 5 ){?> 
         <span class="label label-danger">
تم اعتماد الطلب بالرفض 
 </span>
   <?php  }else{ 
    ?>
         <a type="button" class="btn btn-primary btn-xs" style="padding: 1px 6px;"
                                                data-toggle="modal" data-target="#transform_details"
                                                onclick="transformDetails(<?php echo $row->agaza_rkm; ?>)"><i class="fa fa-list"></i>
                                        </a>
                                   
    <?php } ?>                                   
                                    
<!-------------------------------->                                    

<a  title="طباعة الطلب" style="padding:1px 5px;" onclick="print_(<?=$row->agaza_rkm?>)"><i class="fa fa-print "></i>

</a>


                                    </td>
                                    
                                    
                                </tr>

                                <?php $x++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="7" style="text-align: center;color: red">لا توجد طلبات !</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="follow_1">

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr class="info">
                            <th>م</th>
                            <th>رقم الطلب</th>
                            <th>نوع الإجازة</th>
                            <th>بداية الإجازة</th>
                            <th>نهاية الإجازة</th>
                          <!--  <th>عدد الأيام المطلوبة</th> -->
                              <th>الطلب الأن عند</th>
                               <th>إسم</th>
                            <th>متابعة الطلب</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($user_orders)) {
                            $x = 1;
                            foreach ($user_orders as $row) {
                                $days = (strtotime($row->agaza_to_date_m) - strtotime($row->agaza_from_date_m)) / (60 * 60 * 24);


if($row->suspend == 1){
  $halet_talab = 'تم الموافقةعلي الطلب'; 
  $halet_label = 'label-success';  
}elseif($row->suspend == 2){
   $halet_talab = 'تم رفض الطلب';
   $halet_label = 'label-danger';     
}elseif($row->suspend == 4){
   $halet_talab = 'تم إعتماد الطلب'; 
   $halet_label = 'label-custom';   
}else{
    $halet_talab = 'غير محدد';
    $halet_label = 'label-danger'; 
}
                                ?>
                                <tr>
                                    <td><?php echo $x; ?></td>
                                    <td><?php echo $row->agaza_rkm; ?></td>
                                    <td><?php echo $row->no3_title; ?></td>
                                    <td><?php 
                                    $arr = explode('/', $row->agaza_from_date_m);
                                echo $newDate = $arr[2].'-'.$arr[0].'-'.$arr[1];
                                    
                                    ?></td>
                                    <td><?php 
                                    $arr = explode('/', $row->agaza_to_date_m);
echo $newDate = $arr[2].'-'.$arr[0].'-'.$arr[1];
                                  //  echo $row->agaza_to_date_m; 
                                    ?></td>
                                  <!--  <td><?= $days ?></td> -->
                                    <td><?php echo $row->talab_in_title; ?></td>   
    <td><?php echo $row->current_to_user_name; ?></td>    

                                    
                                   
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" style="font-size: 16px;"
                                                data-toggle="modal" data-target="#motab3a_details"
                                                onclick="motab3a_details(<?php echo $row->agaza_rkm; ?>)">الإطلاع علي تحويلات الطلب
                                        </button>
                                    </td>
                                </tr>

                                <?php $x++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="7" style="text-align: center;color: red">لا توجد طلبات !</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="comming_1">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr class="info">
                            <th>م</th>
                            <th>رقم الطلب</th>
                             <th>تاريخ تقديم الطلب</th>
                            <th>نوع الإجازة</th>
                              <th>الموظف  مقدم الطلب</th>
                            <th>بداية الإجازة</th>
                            <th>نهاية الإجازة</th>
                             <th>مدة الأجازة</th>
                              <th>حالة الأجازة</th>
                            <th>الإجراءات</th>
                            
                        </tr>
                        </thead>
                        <tbody>


                        <?php if (!empty($coming_records)) {
                            $x = 1;
                            foreach ($coming_records as $row) {
                                $days = (strtotime($row->agaza_to_date_m) - strtotime($row->agaza_from_date_m)) / (60 * 60 * 24);
if($row->suspend == 0){
$halet_eltalab = 'جاري ';
$halet_eltalab_class = 'warning';     
}elseif($row->suspend == 1){
 $halet_eltalab = 'تم قبول الطلب ';
$halet_eltalab_class = 'success';    
}elseif($row->suspend == 2){
    $halet_eltalab = 'تم رفض الطلب '; 
    $halet_eltalab_class = 'danger';     
}elseif($row->suspend == 4){
   $halet_eltalab = 'تم اعتماد الطلب بالموافقة ';
   $halet_eltalab_class = 'success';       
}elseif($row->suspend == 5){
   $halet_eltalab = 'تم اعتماد الطلب بالرفض '; 
   $halet_eltalab_class = 'danger';      
}else{
     $halet_eltalab = 'غير محدد '; 
   $halet_eltalab_class = 'danger';  
}
                                ?>
                                <tr>
                                    <td><?php echo $x; ?></td>
                                    <td><?php echo $row->agaza_rkm; ?></td>
                                    <td><?php echo date('Y-m-d',$row->agaza_date); ?></td>
                                    <td><?php echo $row->no3_title; ?></td>
                                    <td><?php echo $row->employee; ?></td>
                                    <td><?php 
                                    $arr = explode('/', $row->agaza_from_date_m);
                                echo $newDate = $arr[2].'-'.$arr[0].'-'.$arr[1];
                                    
                                    ?></td>
                                    <td><?php 
                                    $arr = explode('/', $row->agaza_to_date_m);
echo $newDate = $arr[2].'-'.$arr[0].'-'.$arr[1];
                                    ?></td>
                                    <td><?= $days ?></td>
                            
                                      <td>
                                    <span class="label label-<?php echo $halet_eltalab_class ?>">
                                    <?php echo $halet_eltalab;  ?>
                                     </span>
                                    </td>
   
                          
                                    
                       <td>   
                                  <!------------------ التفاصيل---------->
                                           <a type="button" class="btn btn-primary btn-xs" style="padding: 1px 6px;"
                                                data-toggle="modal" data-target="#transform_details"
                                                onclick="transformDetails(<?php echo $row->agaza_rkm; ?>)"><i class="fa fa-list"></i>
                                        </a>
                                    
                       
                                   <!-----------------التفاصيل----------->
                                   
                                   <!-----------------الإجراء----------->
                                   <a type="button" class="btn btn-success btn-xs" title="التفاصيل" style="padding: 1px 6px;"
                                                onclick="$('#transformLabel').html('<?php echo $row->talab_in_title; ?>');
                                                        transformRequest(<?php echo $row->level; ?>,
                                                <?php echo $row->agaza_rkm; ?>,<?php echo $row->current_from_user_id; ?>,<?php echo $row->current_to_user_id; ?>)"
                                                data-toggle="modal" data-target="#transform"><i class="fa fa-list"></i>
                                        </a>
                                     <!------------------الإجراء---------->
                                   
                                   
                                    </td>
                        


 
                                </tr>

                                <?php $x++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="7" style="text-align: center;color: red">لا توجد طلبات واردة !</td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
   <?php if(!isset($panel)){?>      
    </div>

</div>
<?php } ?>

<!-------------------------------modals--------------------------->

<div class="modal  modal-success  fade" id="transform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="transformLabel"></h4>
            </div>
            <div id="transformRequest"></div>
        </div>
    </div>
</div>


<div class="modal  modal-success  fade" id="transform_details" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">التفاصيل</h4>
            </div>
            <div class="modal-body " id="transform_details_div">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                   <button type="button" class="btn btn-danger btn-labeled" data-dismiss="modal"><span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span> إغلاق</button>

            </div>

        </div>
    </div>
</div>


<div class="modal  modal-success  fade" id="motab3a_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">التفاصيل</h4>
            </div>
            <div class="modal-body " id="motab3a_details_div">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger btn-labeled" data-dismiss="modal"><span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span> إغلاق</button>

            </div>

        </div>
    </div>
</div>



<!-- detailsModal -->



<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;" >الطباعة</h4>
            </div>
            <div  class="modal-body" style="padding: 10px 0" id="result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button
                        type="button" onclick="print_()"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- detailsModal -->
<script>


    /*function print_hidden(value) {

        $('#result').html('<input  type="hidden" name="agaza_rkm" id="agaza_rkm" value="'+value+'">');

    }*/
    function print_(value) {
        var agaza_rkm =value;
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url().'human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/print_transformation/'?>",
            type: "POST",
            data: {agaza_rkm:agaza_rkm },
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
              WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>


<script type="text/javascript">
    function transformRequest(level, agaza_rkm, fromUser, toUser) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/Get_load_page',
            data: {level: level, agaza_rkm: agaza_rkm, fromUser: fromUser, toUser: toUser},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#transformRequest").html(html);
            }
        });

    }

</script>


<script type="text/javascript">
    function transformDetails(value) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/Get_transformDetails',
            data: {agaza_rkm: value},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#transform_details_div").html(html);
            }
        });

    }

</script>


<script type="text/javascript">
    function motab3a_details(value) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/motab3a_details',
            data: {agaza_rkm: value},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#motab3a_details_div").html(html);
            }
        });

    }

</script>












