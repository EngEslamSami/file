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
    $disabled='';
    $head='';
?>
<?php if(isset($all_links['printer_machin']) && $all_links['printer_machin']!=null){
    foreach($all_links['printer_machin'] as  $key=>$value){
        $result[$key]=$all_links['printer_machin'][$key];
    }
}else{
     foreach($all_field as $keys=>$value){
        $result[$all_field[$keys]]='';
     }
    }
$work_days=array("1"=>"السبت","2"=>"الأحد","3"=>"الأثنين","4"=>"الثلاثاء","5"=>"الأربعاء","6"=>"الخميس","7"=>"الجمعة");
?>
<div class="col-sm-9  col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
            <div class="pull-left">
                <?php $data_load["id"]=$this->uri->segment(4) ;
                      $data_load["emp_code"]= $personal_data[0]->emp_code;
                $this->load->view('admin/Human_resources/drop_down_menu', $data_load);?>
            </div>
        </div>
        <div class="panel-body">
        <?=$head?>
			<?php echo form_open_multipart('human_resources/Human_resources/printer_machin_Employee/'.$this->uri->segment(4).'');?>
			<div class="col-sm-12 col-xs-12">
				<div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">كود الموظف</label>
					<input type="text" name="emp_code"  readonly=""  value="<?php if($employee_data != null){ echo $employee_data['emp_code'];  }else{}?>" class="form-control bottom-input"  />
				</div>
                <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">إسم الموظف</label>
					<input type="text" name="emp_name"  readonly=""  value="<?php if($employee_data != null){ echo $employee_data['employee'];  }else{}?>" class="form-control  bottom-input"  />
                </div>
                  	<div class="form-group col-sm-3 col-xs-12">
				    <label class="label top-label">إسم جهاز البصمة</label>
                    <select name="device_id_fk" <?=$disabled?> class="selectpicker no-padding form-control bottom-input" data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
                    <option value="">إختر جهاز البصمة </option>
                    <?php
                    foreach($printer_machine as $machine){
                    $selected = '';
				    if ($machine->id_setting == $result['device_id_fk']) {
				         $selected = 'selected';
							} ?>
                    <option value="<?=$machine->id_setting?>"<?=$selected?>><?=$machine->title_setting?></option>
                    <?php }
                    ?>
                    </select> 
               </div>
               <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">رقم الموظف بجهاز البصمة </label>
					<input type="number"  name="num_in_device" id="num_in_device"   value="<?php  if($result['num_in_device'] != 0){ echo $result['num_in_device'];}?>" class="form-control  bottom-input" data-validation="required"  />
                </div>
            </div>
          
            
             <div class="col-xs-12">
          <input type="submit" name="add" id="buttons"  class="btn btn-blue btn-close" value="حفظ"/>
			</div>
            <?php  echo form_close()?>
            
            <!----------------------------------------------------------------------->
         <div class="col-sm-12 no-padding">
            <h6 class="text-center inner-heading-green">بيانات الدوام </h6>
        </div>
         
              <div class="col-sm-12 col-xs-12">
                	<div class="form-group col-sm-6 col-xs-12">
                      <input type="hidden" id="period_id_fk" value="<?=$last_period_id_fk?>" />
                      <input type="hidden" id="emp_id" value="<?=$this->uri->segment(4);?>" /> 
				    <label class="label top-label half">فترات الدوام </label>
                    <select name="always_id_fk" id="always_id_fk"  class="selectpicker no-padding form-control half" data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
                    <option value="">إختر فترات الدوام </option>
                    <?php
                    foreach($always_setting_data as $always){
                    $selected2 = '';
				    if ($always->id == $result['always_id_fk']) {
				         $selected2 = 'selected';
							} ?>
                    <option value="<?=$always->id?>"<?=$selected2?>><?=$always->name?></option>
                    <?php } ?>
                    </select> 
               </div>
                 
                <div class="form-group col-sm-4 col-xs-12">
                    <div class="form-group col-sm-4">
                        <input type="button" value="إضف فترة دوام " id="buttons" onclick="add_row()" class="btn btn-success btn-next"/>
                    </div>
                </div>

            </div>
            
                <div class="col-md-12 text-center check_group" >
                <?php $arr_time =array(1=>'الفترة الأولي',2=>'الفترة الثانية',3=>'الفترة الثالثة',4=>'الفترة الرابعة',5=>'الفترة الخامسة')?>
                <?php
                $days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
                $days_ar =array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");
                for ($a=0;$a<sizeof($days_ar);$a++){ ?>
               
                   <input type="checkbox" class="day" name="<?php echo $days_en[$a];?>" id="<?php echo $days_en[$a];?>" value="<?=$days_en[$a]?>" style="margin-right: 20px">
                   <label for="">  <?php echo $days_ar[$a];?></label>
                   
                <?php }  ?>

                
            
            <table class="table table-striped table-bordered" width="100%" id="">
                    <thead>
                    <tr class="success">
                        <th colspan="6">بيانات الدوام </th>
                      <!--  <td>وقت الحضور </td>
                        <th>وقت الإنصراف</th>
                        <th>بدايه تسجيل الدخول</th>
                        <th>نهايه تسجيل الدخول</th>
                        <th> بدايه تسجيل الخروج</th>
                        <th>نهايه تسجيل الخروج</th>
                        <th> من تاريخ</th>
                        <th>الى تاريخ</th>
                        <th>الإجراء</th> -->
                    </thead>
                    <tbody id="resultTable" >
                   <!-- <tr id="frist_row">
                        <td colspan="2" style="text-align: center;color: red"> لاتوجد بيانات</td>
                    </tr>-->
                    </tbody>
                </table>
               

            </div>
            <!--
            <div class="col-sm-12">
                <h6 class="text-center inner-heading">أيام العمل</h6>
            </div>
            <div class="col-sm-12 col-xs-12">
           </div>
     -->
       
        <br/>
        <br/>
       </div>
   </div>
    <!----------------------------------------------------------------------------------------------------------------->

    <?php if(!empty($my_always) && isset($my_always)){ ?>

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo "مواعيد العمل"?> </h3>
            </div>
            <div class="panel-body">

                <table   class="table table-striped table-bordered "   >
                    <thead>
                    <tr class="info">
                        <th class="text-center" >م </th>
                        <th class="text-center" > إسم الدوام</th>
                        <th class="text-center" >وقت الحضور </th>
                        <th class="text-center" > وقت الانصراف </th>
                        <th class="text-center" >من تاريخ </th>
                        <th class="text-center" > الى تاريخ </th>
                        <th class="text-center" > الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count=1; foreach($my_always as $record){ ?>
                        <tr>
                        <td style="text-align: center" rowspan="<?php echo sizeof($record->period_num); ?>"><?php echo $count++; ?></td>
                        <td style="text-align: center" rowspan="<?php echo sizeof($record->period_num); ?>"><?php echo $record->name; ?></td>
                        <?php if(!empty($record->period_num)){
                            $a=1; foreach ($record->period_num as $row){ ?>
                                <td style="text-align: center" ><?=$row->attend_time?></td>
                                <td style="text-align: center" ><?=$row->leave_time?></td>
                                <td style="text-align: center" ><?=$row->from_date_ar?></td>
                                <td style="text-align: center" ><?=$row->to_date_ar?></td>
                                <td style="text-align: center">
                                    <a href="#"  data-toggle="modal" data-target="#modal-update" onclick="getUpdateForm(<?php echo $row->id;?>)">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <!--   <a onclick="$('#adele').attr('href', '<?= base_url() . "human_resources/human_resources/DeleteTimes/" . $row->id ?>');"
                                       data-toggle="modal" data-target="#modal-delete"
                                       title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>-->
                                    <a href="<?php echo  base_url('').'human_resources/human_resources/DeleteEmpAlwaysTimes/'.$row->id."/".$row->emp_id ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                                </tr>
                                <?php  $a++;} } ?>
                    <?php } ?>
                    </tbody>
                </table>



                <!------------------------------------------------------------------------------------->


                <div class="modal" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                    <div class="modal-dialog" role="document" style="width: 100%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                            </div>
                            <div class="modal-body" id="myUpdateForm"></div>
                            <div class="modal-footer" style="display: inline-block;width: 100%">
                                <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق الشاشة</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!------------------------------------------------------------------------------------->


            </div>
        </div>

    <?php } ?>
    <!----------------------------------------------------------------------------------------------------------------->

</div>
<!----------------------------------------------------------------------------------------------------------------->
<?php $data_load["personal_data"]=$personal_data; $this->load->view('admin/Human_resources/sidebar_person_data',$data_load);?>
<!----------------------------------------------------------------------------------------------------------------->

<script>
function add_row(){
     var period_id_fk =  $("#period_id_fk").val();
     var always_id_fk =  $("#always_id_fk").val();
     var x = document.getElementById('resultTable');
     var len = x.rows.length;
     if(always_id_fk != ""){ 
         var dataString   =  "period_id_fk=" + period_id_fk +"&len="+len +"&always_id_fk="+always_id_fk;   
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/get_machin_employee_row',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#frist_row").remove();
                    $("#resultTable").append(html);
                    //$("#period_id_fk option[value='"+option_value+"']").remove();
                    //$('.selectpicker').selectpicker("refresh");
                }
            });
        }else {
            alert('إختر نوع الدوام  ');
        }      
     }
   //-----------------------------------------------
   function SendForm(len){
       var days=[];
        $(".day:checkbox:checked").each(function () {
            days.push($(this).val());
        });
       var emp_id= $("#emp_id").val();
       var form_validate= 0;
       var cbs = document.getElementsByClassName(".class-row-"+len);
         for (var i = 0; i < cbs.length; i++) {
             if(cbs[i].value == ""){
                form_validate =1;
                break;
             }
         }
       if(days !='' && emp_id!="" && form_validate == 0){
          var dataString = $(".class-row-"+len).serialize() +'&days='+ days +"&emp_id="+emp_id;
            $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>human_resources/Human_resources/AddEmpAlwaysTimes',
                    data:dataString,
                    cache:false,
                    success: function(json_data){
                        alert('تمت الإضافة بنجاح');
                        $(".day").prop("checked", false);
                         location.reload();
                    }
                });
       }else {
            alert('تأكد من إدخال البيانات !!');
        } 
       
   }
</script>

<script>
    function getUpdateForm(update_id) {
        if( update_id !='' ){
            var dataString = 'update_id=' + update_id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/UpdateEmpAlwaysTimes',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#myUpdateForm").html(html);
                }
            });
        }
    }
     //-----------------------------------------------
   function UpdateForm(class_name){
       var days=[];
        $(".day-update:checkbox:checked").each(function () {
            days.push($(this).val());
        });
       var update_id= $("#update_id").val();
       var form_validate= 0;
       var cbs = document.getElementsByClassName(class_name);
         for (var i = 0; i < cbs.length; i++) {
             if(cbs[i].value == ""){
                form_validate =1;
                break;
             }
         }
       if(days !='' && update_id!="" && form_validate == 0){
          var dataString = $("."+class_name).serialize() +'&days_update='+ days +"&id_update="+update_id;
            $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>human_resources/Human_resources/UpdateEmpAlwaysTimes',
                    data:dataString,
                    cache:false,
                    success: function(json_data){
                        alert('تم التعديل بنجاح');
                        //$(".day").prop("checked", false);
                         location.reload();
                    }
                });
       }else {
            alert('تأكد من إدخال البيانات !!');
        } 
       
   }
</script>



<script>
/*
function load_price(){
   var salary = $('#emp_salary').val();
   var num_days_in_month = $('#num_days_in_month').val(); 
   var hours_work = $('#hours_work').val(); 
   if(salary !='' && num_days_in_month !='' && hours_work!=''){
    var hour_value = ((parseFloat(salary)/parseFloat(num_days_in_month))/parseFloat(hours_work));
   var hour_value_f = parseFloat(hour_value).toFixed(2);
    $('#hour_value').val(hour_value_f); 
   }
} */
</script>
<script>
/*
function get_all(valu){    
        if(valu == 1){
            $("#bank_id_fk").attr('disabled', 'disabled');
             $("#bank_id_fk option:selected").each(function () {
                           $(this).removeAttr('selected'); 
                           });
             $("#bank_id_fk").selectpicker('refresh'); 
            $("#bank_account_num").prop("readonly", true);
            $("#bank_id_fk").removeAttr('data-validation');
            $("#bank_account_num").removeAttr('data-validation');  
            $("#bank_account_num").val('');  
            $("#bank_code").val('');    
        }else{
            $("#bank_id_fk").attr({'data-validation':"required"});
            $("#bank_account_num").attr({'data-validation':"required"});        
            $("#bank_id_fk").removeAttr('disabled');
            $("#bank_id_fk").selectpicker('refresh'); 
            $("#bank_account_num").prop("readonly", false);      
        }
}*/
</script>
<script>
/*
function get_all_ticket(valu){    
    if(valu == 2){
         $("#travel_type_fk").attr('disabled', 'disabled');
         $("#travel_type_fk option:selected").each(function () {
                       $(this).removeAttr('selected'); 
                       });
        $("#travel_type_fk").selectpicker('refresh'); 
        $("#travel_period").prop("readonly", true); 
        $("#travel_period").removeAttr('data-validation');
        $("#travel_type_fk").removeAttr('data-validation'); 
        $("#travel_type_fk").val(''); 
        $("#travel_period").val(''); 
    }else{
        $("#travel_period").attr({'data-validation':"required"});
        $("#travel_type_fk").attr({'data-validation':"required"});    
        $("#travel_type_fk").removeAttr('disabled');
        $("#travel_type_fk").selectpicker('refresh'); 
        $("#travel_period").prop("readonly", false);      
    }
} */
</script>
<script> +/*
    function get_banck_code(valu)
    {
        var valu=valu.split("-");
        $('#bank_code').val(valu[1]);
    } */
</script>
<script>
/*
  function length_hesab_wakeel(length) {
        var len=length.length;
        if(len<24){
            alert(" رقم الحساب  لابد الايقل عن 24 حرف او رقم");
        }
        if(len>24){
            alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
            //  document.getElementById('register').setAttribute("disabled", "disabled");
        }
        if(len==24){
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
    } */
</script>


