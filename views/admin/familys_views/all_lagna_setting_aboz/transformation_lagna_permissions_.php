
<style>
    td .btn-danger i,td .btn-success i{ 
        color: #fff;
    }
    .modal-backdrop.in {
        filter: alpha(opacity=50);
        opacity: 0;
        display: none;
    }
</style>

<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
        <div class="col-xs-12 col-sm-12 col-md-12 m-b-20">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#coming" data-toggle="tab">البنود الواردة </a></li>
                <li><a href="#accepted" data-toggle="tab">البنود الموافق عليها للدخول للمناقشة </a></li>
                <li><a href="#refused" data-toggle="tab">البنود المرفوض إدراجها للمناقشة </a></li>
            </ul>
            <!-- Tab panels -->

            <div class="tab-content">
                <div class="tab-pane fade in active" id="coming">
                    <div class="panel-body">
                        <br>
                        <?php if(!empty($coming)){ ?>
                        <?php  $m=0; foreach($coming as $row) { if(empty($row->transformation_lagna)){ 
                            continue; }else{ $m++; } ?>
                       <?php } }
                        if($m ==0){?>
                            <div class="col-lg-12 alert alert-danger" > لا يوجد بنود واردة</div>

                        <?php   }else{ ?>

                        <?php if(!empty($coming)){ ?>
                            <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
                                <thead>
                                <tr>
                                    <th class="text-center"> م</th>
                                    <th class="text-center"> المحور</th>
                                    <th class="text-center">رقم الملف /الطلب</th>
                                    <th class="text-center">إسم الأب</th >
                                    <th class="text-center">رقم هوية الأب</th>
                                    <th class="text-center"> التفاصيل</th>
                                    <th class="text-center"> الإجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $m=1; foreach($coming as $row) { if(empty($row->transformation_lagna)){ continue; }?>
                                    <tr>
                                    <td class="text-center" rowspan="<?php if(!empty($row->transformation_lagna)){ echo sizeof($row->transformation_lagna); } ?>"><?php echo $m;?></td>
                                    <td class="text-center" rowspan="<?php if(!empty($row->transformation_lagna)){ echo sizeof($row->transformation_lagna); } ?>"><?php echo $row->title;?></td>
                                    <?php if(!empty($row->transformation_lagna)){ foreach ($row->transformation_lagna as $record){ ?>
                                        <td class="text-center"><?php echo $record->file_num;?></td>
                                        <td class="text-center"><?php  if(!empty($record->father)){ echo $record->father->full_name; }else{ echo'غير محدد'; } ?></td>
                                        <td class="text-center"><?php  if(!empty($record->father)){ echo $record->father->f_national_id; }else{ echo'غير محدد'; } ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" onclick="GetModalData(<?php echo$record->mother_national_num;?>)" data-target="#myModal">التفاصيل<i
                                                    class="fa fa-list btn-info"></i></button>
                                        </td>
                                        <td>

<!--
<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModalc<?php echo $record->id ;?>"><i class="fa fa-bell"></i>  الإجراء </button>
-->                                       
                                       
                                       

    <button type="button" class="btn btn-success  btn-xs "  title="إضافة إلي بنود اللجنة" onclick="getApproved(1,<?php echo $record->id;?>,<?php echo $record->open_sesssion_id;?>)"><i class="glyphicon glyphicon-ok"></i></button>
    <button type="button" class="btn btn-danger  btn-xs "  title="رفض من  بنود اللجنة"  onclick="getApproved(2,<?php echo $record->id;?>,<?php echo $record->open_sesssion_id;?>)"><i class="glyphicon glyphicon-remove"></i></button>
<!--     <button type="button" class="btn btn-warning  btn-xs "  title="حذف من  بنود اللجنة" onclick="getApproved('0',<?php echo $record->id;?>)"><i class="glyphicon glyphicon-repeat"></i></button>
-->
                                     
                                       
                                       
                                       
                                       
                                       
                                        </td>
                                        </tr>

                                        <!-----------------------------------------action_popup----------------------------------------->
                                        <div class="modal fade" id="myModalc<?php echo $record->id ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">الإجراء</h4>
                                                    </div>
                                                    <?php echo form_open_multipart('family_controllers/LagnaSetting/transformation_approved')?>
                                                    <div class="modal-body">
                                                        <div class="row" style="padding: 20px">
                                                            <div class="form-group">
                                                                <label class="control-label">أذكر السبب</label>
                                                                <textarea class="form-control" style="height: 100px" name="reason_lagna" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="id" id="id" value="<?php echo $record->id ;?>">
                                                    <input type="hidden" name="add_to_lagna_id_fk" id="add_to_lagna_id_fk" value="<?php echo $record->add_to_lagna_id_fk ;?>">

                                                    <div class="modal-footer">
                                                        <button type="submit" name="approved_lagna" value="1" class="btn btn-success">موافقة</button>

                                                        <button type="submit" name="approved_lagna" value="2" class="btn btn-danger">مرفوض</button>
                                                    </div>
                                                    <?php echo form_close();?>
                                                </div>
                                            </div>
                                        </div>


                                        <!-------------------------------------------action_popup--------------------------------------->

                                    <?php } }else{ ?>
                                        <td colspan="5"  style="text-align: center;color: red;" >لاتوجد بيانات</td>
                                        </tr>
                                    <?php } ?>
                                    <?php $m++;} ?>
                                </tbody>
                            </table>


                        <?php }else{?>
                            <div class="col-lg-12 alert alert-danger" > لا يوجد بنود واردة</div>
                        <?php } } ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="accepted">

                    <div class="panel-body">
                        <br>

                        <?php if(!empty($accepted)){ ?>
                            <?php  $m=0; foreach($accepted as $row) { if(empty($row->transformation_lagna)){ continue; }else{ $m++; } ?>
                            <?php } }
                        if($m ==0){?>
                            <div class="col-lg-12 alert alert-danger" > لا يوجد بنود موافق عليها</div>

                        <?php   }else{ ?>

                        <?php if(!empty($accepted)){?>
                        <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
                            <thead>
                            <tr>
                                <th class="text-center"> م</th>
                                <th class="text-center"> المحور</th>
                                <th class="text-center">رقم الملف /الطلب</th>
                                <th class="text-center">إسم الأب</th >
                                <th class="text-center">رقم هوية الأب</th>
                                <th class="text-center"> التفاصيل</th>
                                <th class="text-center"> الإجراء</th>
                            </tr>
                            </thead>

                            <?php  $m=1; foreach($accepted as $row) {  if(empty($row->transformation_lagna)){ continue; } ?>
                                <tr>
                                <td class="text-center" rowspan="<?php if(!empty($row->transformation_lagna)){ echo sizeof($row->transformation_lagna); } ?>"><?php echo $m;?></td>
                                <td class="text-center" rowspan="<?php if(!empty($row->transformation_lagna)){ echo sizeof($row->transformation_lagna); } ?>"><?php echo $row->title;?></td>
                                <?php if(!empty($row->transformation_lagna)){ 
                                    foreach ($row->transformation_lagna as $record){ ?>
                                    <td class="text-center"><?php echo $record->file_num;?></td>
                                    <td class="text-center"><?php  if(!empty($record->father)){ echo $record->father->full_name; }else{ echo'غير محدد'; } ?></td>
                                    <td class="text-center"><?php  if(!empty($record->father)){ echo $record->father->f_national_id; }else{ echo'غير محدد'; } ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" onclick="GetModalData(<?php echo$record->mother_national_num;?>)" data-target="#myModal">التفاصيل<i
                                                class="fa fa-list btn-info"></i></button>
                                    </td>
<td>
    <button type="button" class="btn btn-sm btn-warning"   data-toggle="modal" data-target="#myModalc_2<?php echo $record->id ;?>"><i class="fa fa-bell"></i>  الإجراء </button>
</td>
                                    </tr>
                                    
                                    
 
<div class="modal fade" id="myModalc_2<?php echo $record->id ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">الإجراء</h4>
            </div>
            <?php echo form_open_multipart('family_controllers/LagnaSetting/transformation_approved')?>
            <div class="modal-body">
                <div class="row" style="padding: 20px">
                    <div class="form-group">
                        <label class="control-label">أذكر السبب</label>
                        <textarea class="form-control" style="height: 100px" name="reason_lagna" required></textarea>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" id="id" value="<?php echo $record->id ;?>">
            <input type="hidden" name="add_to_lagna_id_fk" id="add_to_lagna_id_fk" value="<?php echo $record->add_to_lagna_id_fk ;?>">

            <div class="modal-footer">
                <button type="submit" name="approved_lagna" value="1" class="btn btn-success">موافقة</button>

                <button type="submit" name="approved_lagna" value="2" class="btn btn-danger">مرفوض</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>                                   
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                <?php } }else{ ?>
                                    <td colspan="5"  style="text-align: center;color: red;" >لاتوجد بيانات</td>
                                    </tr>



<!-----------------------------------------action_popup----------------------------------->



     <!-------------------------------------------action_popup--------------------------------------->

                                <?php } ?>
                                <?php $m++;} ?>
                            </tbody>
                        </table>
                        <?php  }else{?>
                            <div class="col-lg-12 alert alert-danger" > لا يوجد بنود موافق عليها</div>
                        <?php } } ?>
                    </div>
                </div>

                <div class="tab-pane fade" id="refused">
                    <div class="panel-body">
                        <br>

                        <?php if(!empty($refused)){ ?>
                            <?php  $m=0; foreach($refused as $row) { if(empty($row->transformation_lagna)){ continue; }else{ $m++; } ?>
                            <?php } }
                        if($m ==0){?>
                            <div class="col-lg-12 alert alert-danger" > لا يوجد بنود مرفوضة</div>

                        <?php   }else{ ?>

                        <?php if(!empty($refused)){?>
                            <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
                                <thead>
                                <tr>
                                    <th class="text-center"> م</th>
                                    <th class="text-center"> المحور</th>
                                    <th class="text-center">رقم الملف /الطلب</th>
                                    <th class="text-center">إسم الأب</th >
                                    <th class="text-center">رقم هوية الأب</th>
                                    <th class="text-center"> التفاصيل</th>
                                    <th class="text-center"> الإجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $m=1; foreach($refused as $row) {  if(empty($row->transformation_lagna)){ continue; }?>

                                    <tr>
                                    <td class="text-center" rowspan="<?php if(!empty($row->transformation_lagna)){ echo sizeof($row->transformation_lagna); } ?>"><?php echo $m;?></td>
                                    <td class="text-center" rowspan="<?php if(!empty($row->transformation_lagna)){ echo sizeof($row->transformation_lagna); } ?>"><?php echo $row->title;?></td>
                                    <?php if(!empty($row->transformation_lagna)){ foreach ($row->transformation_lagna as $record){ ?>
                                        <td class="text-center"><?php echo $record->file_num;?></td>
                                        <td class="text-center"><?php  if(!empty($record->father)){ echo $record->father->full_name; }else{ echo'غير محدد'; } ?></td>
                                        <td class="text-center"><?php  if(!empty($record->father)){ echo $record->father->f_national_id; }else{ echo'غير محدد'; } ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal"  onclick="GetModalData(<?php echo$record->mother_national_num;?>)"  data-target="#myModal">التفاصيل<i
                                                    class="fa fa-list btn-info"></i></button>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" disabled  data-toggle="modal" data-target="#myModalc<?php echo $record->id ;?>"><i class="fa fa-bell"></i>  الإجراء </button>
                                        </td>
                                        </tr>
                                    <?php } }else{ ?>
                                        <td colspan="5"  style="text-align: center;color: red;" >لاتوجد بيانات</td>
                                        </tr>



    <!-----------------------------------------action_popup------------------------------------>

                                        <div class="modal fade" id="myModalc<?php echo $record->id ;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">الإجراء</h4>
                                                    </div>
                                                    <?php echo form_open_multipart('family_controllers/LagnaSetting/transformation_approved')?>
                                                    <div class="modal-body">
                                                        <div class="row" style="padding: 20px">
                                                            <div class="form-group">
                                                                <label class="control-label">أذكر السبب</label>
                                                                <textarea class="form-control" style="height: 100px" name="reason_lagna" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="id" id="id" value="<?php echo $record->id ;?>">
                                                    <input type="hidden" name="add_to_lagna_id_fk" id="add_to_lagna_id_fk" value="<?php echo $record->add_to_lagna_id_fk ;?>">

                                                    <div class="modal-footer">
                                                        <button type="submit" name="approved_lagna" value="1" class="btn btn-success">موافقة</button>

                                                        <button type="submit" name="approved_lagna" value="2" class="btn btn-danger">مرفوض</button>
                                                    </div>
                                                    <?php echo form_close();?>
                                                </div>
                                            </div>
                                        </div>


                                        <!-------------------------------------------action_popup--------------------------------------->

                                    <?php } ?>
                                    <?php $m++;} ?>
                                </tbody>
                            </table>


                        <?php  }else{?>
                            <div class="col-lg-12 alert alert-danger" > لا يوجد بنود مرفوضة</div>
                        <?php } } ?>

                    </div>
                </div>

                <!---------------------------------------modal--------------------------------->

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog " style="width: 100%" role="document">
                    <div class="modal-content">
                           <div id="ModalDataDiv">

                            </div>
                            <div class="modal-footer" style="display: inline-block;width: 100%">
                                <button type="button" style="float:left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!--------------------------------------------modal---------------------------->

            </div>
        </div>
    </div>
</div>


<script>
    function getApproved(process,id ,open_session_id) {
        if (process &&  id ) {
            var dataString = 'process=' + process +'&id=' + id+'&open_session_id=' + open_session_id;
            $.ajax({
                type:'post',
                url:'<?php echo base_url() ?>family_controllers/LagnaSetting/transformation_lagna_approved',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);
                    if(JSONObject['process'] == 1){
                        alert(' تمت الإضافة إلي بنود اللجنة !!');
                    }
                    if(JSONObject['process'] == 2){
                        alert(' تم الرفض من بنود اللجنة !!');
                    }
                    if(JSONObject['process'] == 0){
                        alert(' تم الحذف من بنود اللجنة !!');
                    }

                    location.reload();
                }
            });
            return false;
        }

    }

</script>


<script>

    function GetModalData(mother_num) {
        if (mother_num >0 &&  mother_num !='' ) {
            var dataString ='mother_num=' + mother_num ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/LagnaSetting/AllDetailsLoadpage',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#ModalDataDiv").html(html);
                }
            });
        }
    }

</script>