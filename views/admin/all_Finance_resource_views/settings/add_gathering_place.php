<style type="text/css">
     .top-label {
    font-size: 13px;
 }
 
 .inner-heading-green{
    background-color: #5eab5e;
    padding: 10px;
    color: #fff;
}

</style>
<?php
if (isset($record) && !empty($record)) {
    
    
    $gathering_place_id_fk=$record->gathering_place_id_fk;
    $mqr_thseel=$record->mqr_thseel;
    $emp_id_fk=$record->emp_id_fk;
    $edara_id_fk=$record->edara_id_fk;
    $qsm_id_fk=$record->qsm_id_fk;
    $suspend=$record->suspend;

} else {
    $gathering_place_id_fk='';
    $mqr_thseel='';
    $emp_id_fk='';
    $edara_id_fk='';
    $qsm_id_fk='';
    $suspend='';

}
?>

<div class="col-sm-12  col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
        <?php
                    if (isset($record) && !empty($record)){
                    ?>
                    
                          <?php echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/update_gathering_place/'.$record->id);?>
                        <?php } else{ ?>
                            <?php echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/add_gathering_place');?>

                            <?php } ?>
		

                <div class="col-md-12 no-padding">
                    <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                        <label class="label">جهة التحصيل</label>
                        <select class="form-control "  name="gathering_place_id_fk" data-validation="required"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php if(!empty($gathering_place_arr)){ foreach ($gathering_place_arr as $row){?>
                               
                               
                            <?php
                            $select = '';
                          
                                if ($gathering_place_id_fk != '') {
                                    if ($row->id_setting == $gathering_place_id_fk) {
                                        $select = 'selected';
                                    }
                                } ?>
                               
                                <option 
                                
                                
                                value="<?=$row->id_setting?>" <?= $select ?>><?=$row->title_setting?></option>
                            <?php } } ?>
                        </select>
                    </div>
                   <!-- yara -->
                    <div  class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                        <label class="superlabel "> مقر التحصيل</label>
                        <select class="form-control "  name="mqr_thseel" data-validation="required"
                                aria-required="true">
                        <option value="">إختر</option>
                            <?php if(!empty($mqr_thseel_setting)){ foreach ($mqr_thseel_setting as $row){?>
                                <?php
                            $select = '';
                          
                           if ($mqr_thseel != '') {
                               if ($row->id_setting == $mqr_thseel) {
                                   $select = 'selected';
                               }
                           } ?>
                                <option value="<?=$row->id_setting?>" <?= $select ?>><?=$row->title_setting?></option>
                            <?php } } ?>
                          
                        </select>
            </div>
            <!--  -->
                    <div class="form-group col-md-4 col-sm-2 col-xs-12 padding-4">
                        <label class="label"> إسم الموظف</label>

                        <input type="text" class="form-control  testButton inputclass"
                               name="emp_n" id="emp_n"
                               readonly="readonly"
                               onclick="$('#empModal').modal('show');"

                               style="cursor:pointer;border: white;color: black;width:90%;float: right;"
                               data-validation="required"
                               value="<?php
                               
                               if(isset($employee_name)&&!empty($employee_name)){
                                   echo $employee_name;
                               }
                               ?>">
                        <input type="hidden" name="emp_id_fk" id="emp_id_fk" value="<?=$emp_id_fk ?>">
                        <input type="hidden" name="edara_id_fk" id="edara_id_fk" value="<?= $edara_id_fk ?>">
                        <input type="hidden" name="qsm_id_fk" id="qsm_id_fk" value="<?=$qsm_id_fk ?>">

                        <button type="button"
                                onclick="$('#empModal').modal('show');"
                                class="btn btn-success btn-next" style="float: right;">
                            <i class="fa fa-plus"></i></button>

                    </div>
                    <div class="form-group col-md-1 col-sm-2 col-xs-12 padding-4">
                        <label class="label"> الحالة</label>
                        <select class="form-control " id="suspend"  name="suspend" data-validation="required" aria-required="true"      >
                            <option value="">إختر</option>
                        

                            <?php
                            $arrxx = array(0 => 'غير نشط', 1 => 'نشط');
                            foreach ($arrxx as $key => $value) {
                                $select = '';
                                if ($suspend != '') {
                                    if ($key == $suspend) {
                                        $select = 'selected';
                                    }
                                } ?>
                                 <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                   

                    <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                        <button type="submit"  class="btn btn-labeled btn-success " style="margin-top: 28px;"  name="add" value="add" id="add" >
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>

                    </div>



                </div>








			</div>
            <?php  echo form_close()?>

  <br><br>
            <div class="col-sm-12 no-padding " >
                <?php if(!empty($records) && isset($records)){ ?>
                <table   class="table table-striped table-bordered "   >
                    <thead>
                    <tr class="info">
                        <th class="text-center" >م </th>
                        <th class="text-center">جهة التحصيل</th>
                        <th class="text-center">مقر التحصيل</th>
                        <th class="text-center">الموظف</th>
                        <th class="text-center">الادارة</th>
                        <th class="text-center">القسم</th>
                     
                        <th class="text-center">الحالة</th>
                        <th class="text-center" > الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=1; foreach($records as $record){ ?>
                        <tr>
                         <td style="text-align: center!important;" rowspan="<?php if(!empty($record->sub)){ echo sizeof($record->sub); } ?>"><?php echo $count; ?></td>
                        <td style="text-align: center!important;" rowspan="<?php if(!empty($record->sub)){ echo sizeof($record->sub); } ?>"><?php echo $record->gathering_place_title; ?></td>
                       
                            <?php if(!empty($record->sub)){ foreach ($record->sub as $row){?>
                                <td style="text-align: center!important;" >
                        
                        <?php
                          
                          foreach ($mqr_thseel_setting as $roww) {
                              $select = '';
                              if ($row->mqr_thseel != '') {
                                  if ($roww->id_setting == $row->mqr_thseel) {
                                      echo $roww->title_setting;
                                  }
                              }} ?>
                        
                        </td>
                        <td style="text-align: center!important;"><?php echo $row->empolyee_name; ?></td>
                        <td style="text-align: center!important;"><?php echo $row->edara_name; ?></td>
                        <td style="text-align: center!important;"><?php echo $row->depart_name; ?></td>
                       
                            <td>
                                <input type="hidden" id="status"  value="<?= $row->suspend?>">
                                <?php
                                if ($row->suspend == 1) {
                                    ?>
                                    <button id="unactive<?= $row->id ?>" class="btn btn-success"
                                            onclick="update_status(<?= $row->id ?>)">نشط
                                    </button>
                                    <?php
                                } elseif ($row->suspend == 0) {
                                    ?>
                                    <button id="unactive<?= $row->id ?>" class="btn btn-danger"
                                            onclick="update_status(<?= $row->id ?>)">غير نشط
                                    </button>
                                    <?php
                                }
                                ?>
                            </td>
                        <td style="text-align: center!important;">
                        <!--<a href="#"  data-toggle="modal" data-target="#modal-update<?php echo $row->id;?>"
                           onclick="getUpdateForm(<?php echo $row->id;?>)">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>-->
                        <a href=" <?php echo  base_url('').'all_Finance_resource/settings/Finance_resource_settings/Delete_gathering_place/'.$row->id."" ?>"
                           onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                            <i class="fa fa-trash" aria-hidden="true"></i></a>


                            <a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        window.location="<?= base_url() . 'all_Finance_resource/settings/Finance_resource_settings/update_gathering_place/' .$row->id  ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
                       </td>
                    </tr>
                     <?php }} ?>
                        <!------------------------------------------------------------------------------------->
             <!--           <div class="modal" id="modal-update<?php /*echo $record->id;*/?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                            <div class="modal-dialog" role="document" style="width: 70%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                                    </div>
                                    <div class="modal-body" id="myUpdateForm<?php /*echo $record->id;*/?>"></div>
                                    <div class="modal-footer" style="display: inline-block;width: 100%">
                                        <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق </button>
                                    </div>
                                </div>
                            </div>
                        </div>
-->
                        <!------------------------------------------------------------------------------------->
                    <?php $count++; } ?>

                    </tbody>
                </table>


                <?php } ?>
            </div>
            

       </div>
   </div>


</div>
<!-- empModal  -->

<div class="modal fade" id="empModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">الموظفيين</h4>
            </div>
            <div class="modal-body">

                <?php
                if (isset($emps) && !empty($emps)){
                    ?>

                    <table id="" class="table example  table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>#</th>
                            <th>كود الموظف</th>
                            <th>اسم الموظف</th>
                            <th> الادارة  </th>
                            <th> القسم  </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($emps as $emp){
                            ?>
                            <tr>
                                <td><input style="width: 90px;height: 20px;" type="radio" name="radio" id="emp<?= $emp->id ?>" ondblclick="GetName(<?= $emp->id ?>,'<?= $emp->employee?>',<?php if (!empty($emp->administration)){ echo $emp->administration;}else{ echo 0;}?>,<?php if (!empty($emp->department)){ echo $emp->department;}else{echo 0;}  ?>,<?= $emp->check_user ?>)">
                                </td>

                                <td><?= $emp->emp_code ?></td>
                                <td><?= $emp->employee?></td>
                                <td><?php if (!empty($emp->edara)){echo $emp->edara;}else{echo 'غير محدد';} ?></td>
                                <td><?php if (!empty($emp->qsm)){ echo $emp->qsm;}else{echo 'غير محدد';}?></td>

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



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- empModal  -->

<script>
function add_row(){
    $("#mytable").show();
    var x = document.getElementById('resultTable');
   var length = x.rows.length + 1;

         var dataString   ='length=' + length   ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/settings/Finance_resource_settings/get_data',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#resultTable").append(html);
                    $('#saves').show();
                  // get_new_option(2);
                }
            });

     }
   //-----------------------------------------------

</script>

<script>
    function getUpdateForm(update_id) {
        if( update_id !='' ){
            var dataString = 'update_id=' + update_id ;
            alert(dataString);
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/settings/Finance_resource_settings/UpdateForm',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#myUpdateForm" + update_id).html(html);
                }
            });
        }
    }

</script>

<script>


    function getSubDepartment(valu) {

        if( valu !='' &&  valu !=0){
            var dataString = 'id=' + valu ;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/settings/Finance_resource_settings/getSubDepartment',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);

                    if (JSONObject == false){
                        var html= '<option>لا يوجد اقسام تابعه  </option>';

                    } else {
                        var  html='<option>إختر </option>';

                        for(i=0; i<JSONObject.length ; i++){
                            html +='<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].name + '</option>';

                        }
                    }

                    $("#qsm_id_fk").html(html);
                }
            });

        }

    }

</script>
<script>


    function getEmp(valu) {

        if( valu !='' &&  valu !=0){
            var dataString = 'id=' + valu ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/settings/Finance_resource_settings/getEmp',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                    //console.log(JSONObject);
                    if (JSONObject == false){
                        var html= '<option>لا يوجد موظفيين  </option>';

                    }
                    else{
                        var  html='<option>إختر </option>';

                        for(i=0; i<JSONObject.length ; i++){

                            html +='<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].employee + '</option>';

                        }
                    }



                    $("#emp_id_fk").html(html);
                }
            });

        }

    }

</script>
<script>
    function GetName(id,name, edara_id_fk,qsm_id_fk,check_user) {
        $('#emp_id_fk').val(id);
        $('#emp_n').val(name);
        $('#edara_id_fk').val(edara_id_fk);
        $('#qsm_id_fk').val(qsm_id_fk);
        $('#empModal').modal('hide');
        if (check_user == 0){
            $('#add').attr("disabled","disabled");
        } else{
            $('#add').removeAttr("disabled");
        }

    }
</script>

<script>
    function update_status(id) {
        //  location.reload();
        var status =   $('#status').val();
        var value = 1- status;
       // alert(id+','+value);

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/settings/Finance_resource_settings/update_status',
            data: {id:id,value:value},
            dataType: 'html',
            cache: false,
            success: function () {
                $('#status').val(value);
              //  alert('sucess');
                if (value==1){
                    // btn-danger
                    $('#unactive'+id).removeClass('btn-danger');
                    $('#unactive'+id).addClass('btn-success');
                    $('#unactive'+id).text('نشط');

                }  else if(value==0){
                    $('#unactive'+id).removeClass('btn-success');
                    $('#unactive'+id).addClass('btn-danger');
                    $('#unactive'+id).text(' غير نشط');
                }

            }
        });

    }
</script>

