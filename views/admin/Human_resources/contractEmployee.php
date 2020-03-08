<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>

<style type="text/css">
/*
.top-label {
    color: white;
    background-color: #428bcb;
    border: 2px solid #428bcb;
    border-radius: 0;
    margin-bottom: 0;
    width: 100%;
    display: block;
    padding: 2px 4px;
}
.bottom-input{
  width: 100%;
  border-radius: 0;
}
*/

 label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
    .top-label {
        font-size: 14px;
        font-weight: 500;
        position: relative;

    }
        .modal-open .modal {
        margin-top: 40px !important;
    }
    .modal-title{
        color: white !important;
    }


</style>
<?php 
if(empty($check_finance_data) &&   $check_finance_data == null){
    $disabled='disabled="disabled"';
    $head ='<h5 class="alert alert-danger">عفوا عليك تسجيل بيانات الموظف المالية اولا ... !!</h5>';
}else{
    $disabled='';
    $head='';
}

?>

<?php if(isset($all_links['contract_employe']) && $all_links['contract_employe']!=null){

    foreach($all_links['contract_employe'] as  $key=>$value){
        $result[$key]=$all_links['contract_employe'][$key];
    }
}else{
     foreach($all_field as $keys=>$value){
        $result[$all_field[$keys]]='';
     }
   
    }
$work_types=array("1"=>"فترة","2"=>"فترتين");
$yes_no=array("1"=>"نعم","2"=>"لا");
$paid_type=array("2"=>"شيك","3"=>"تحويل بنكي");
?>
<div class="col-sm-12 col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
            <div class="pull-left">
                <?php $data_load["emp_code"]= $personal_data[0]->emp_code;
                      $data_load["id"]=$this->uri->segment(4) ;
                       $this->load->view('admin/Human_resources/drop_down_menu', $data_load);?>
            </div>
        </div>
        <div class="panel-body">
        <?=$head?>
        
			<?php echo form_open_multipart('human_resources/Human_resources/contractEmployee/'.$this->uri->segment(4).'');?>
			<div class="col-sm-12 col-xs-12 no-padding">
                <div class="form-group col-sm-1 col-xs-12 padding-4">
                	<label class="label">كود الموظف</label>
                	<input type="text" name="emp_code"  readonly=""  value="<?php if($employee_data != null){ echo $employee_data['emp_code'];  }else{}?>" class="form-control"  />
                </div>
                   
                <div class="form-group col-sm-3 col-xs-12 padding-4">
                	<label class="label">إسم الموظف</label>
                	<input type="text" name="emp_name"  readonly=""  value="<?php if($employee_data != null){ echo $employee_data['employee'];  }else{}?>" class="form-control"  />
                
                </div>
              <!--  <input type="hidden" name="emp_salary"  id="emp_salary"   value="<?php if($employee_data != null){ echo $employee_data['salary'];  }else{}?>" class="form-control  bottom-input"  />
                -->
               
                <div class="form-group col-sm-2 col-xs-12 padding-4">
				   <label class="label">طبيعة العقد</label>
                    <select name="contract_nature"  class=" no-padding form-control "   data-validation="required"  aria-required="true"   >
                        <option value=""> إختر  </option>
                        <?php
                        foreach($contract_nature as $row_contract_nature){
                        $selected = '';
    				    if ($row_contract_nature->id_setting == $result['contract_nature']) {
    				         $selected = 'selected';
    							} ?> 
                        <option value="<?=$row_contract_nature->id_setting?>"<?=$selected?>><?=$row_contract_nature->title_setting?></option>
                        <?php }
                        ?>
                    </select> 
               </div>
               
               <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label">طبيعة العمل</label>
                    <select name="job_type"  class=" no-padding form-control "   data-validation="required"  aria-required="true"   >
                        <option value=""> إختر  </option>
                        <?php
                        foreach($job_types as $job){
                            $selected = '';
                            if ($job->id_setting == $result['job_type']) {
                                $selected = 'selected';
                            } ?>
                            <option value="<?=$job->id_setting?>"<?=$selected?>><?=$job->title_setting?></option>
                        <?php }
                        ?>
                    </select>
                </div>
               
          
				<div class="form-group col-sm-2 col-xs-12 padding-4">
					<label class="label">أيام العمل خلال الشهر </label>
					<input type="number" name="num_days_in_month" id="num_days_in_month"  
                    onkeyup="getHourSalary()"
                    <?=$disabled?> value="<?php echo $result['num_days_in_month']?>" onkeyup="return load_price();" class="form-control "  data-validation="required" />
				</div>
                   
                <div class="form-group col-sm-1 col-xs-12 padding-4">
					<label class="label">ساعات العمل </label>
					<input type="number" name="hours_work" id="hours_work"
                    onkeyup="getHourSalary()"
                      <?=$disabled?> value="<?php echo $result['hours_work']?>" onkeyup="return load_price();" class="form-control  " data-validation="required"  />
				
                </div>
                <div class="form-group col-sm-1 col-xs-12 padding-4">
					<label class="label">أجر الساعة </label>
					<input type="number" name="hour_value" id="hour_value" readonly="readonly"  <?=$disabled?> value="<?php echo $result['hour_value']?>" class="form-control "  />
				
                </div>
               	<div class="form-group col-sm-2 col-xs-12 padding-4">
				    <label class="label">فترات العمل</label>
                    <select name="work_period_id_fk" <?=$disabled?> class="selectpicker no-padding form-control " data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
                    <option value="">إختر فترة العمل </option>
                    <?php
                    foreach($work_types as $key=>$value){
                    $selected = '';
				    if ($key == $result['work_period_id_fk']) {
				         $selected = 'selected';
							} ?>
                    <option value="<?=$key?>"<?=$selected?>><?=$value?></option>
                    <?php }
                    ?>
                    </select> 
               </div>
         
         
		    
               
              <?php if($result['pay_method_id_fk'] && $result['pay_method_id_fk'] == 1){
                         $disabl='disabled="disabled"';
                         $read ='readonly="readonly"';
                    }elseif($result['pay_method_id_fk'] == 2 || $result['pay_method_id_fk'] == 3){
                         $disabl =''; 
                         $read =''; 
                    }else{
                         $disabl='disabled="disabled"'; 
                         $read ='readonly="readonly"';    
                    } 
                    ?>
             <!--  <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">إسم البنك</label>
                    
                    <select name="bank_id_fk" id="bank_id_fk" <?//=$disabl?> onchange="get_banck_code($(this).val())"  class="selectpicker no-padding form-control bottom-input" data-live-search="true"  >
                    <option value="">إختر البنك </option>
                    <?php
                   /* foreach($banks_data as $row){
                    $selected3 = '';
				    if ($row->id == $result['bank_id_fk']){
                        $selected3 = 'selected';
							}*/ ?>
                    <option value="<?//=$row->id.'-'.$row->bank_code?>"<?//=$selected3?>><?//=$row->ar_name?></option>
                    <?php // } ?>
                    </select> 
                </div>
                
                <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">رمز البنك</label>
					<input  name="" id="bank_code"  readonly="readonly"   value="<?php //  if($result['bank_id_fk'] != 0){ echo $banks_data[$result['bank_id_fk']]->bank_code;}?>" class="form-control  bottom-input"  />
				
                </div>  
                
                <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">رقم الحساب</label>
					<input type="number" name="bank_account_num" <?//=$read?>  id="bank_account_num" maxlength="24" minlength="24"  value="<?php // echo $result['bank_account_num'];?>" onfocusout="length_hesab_wakeel($(this).val());" class="form-control  bottom-input"  />
			     	 <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                </div> --->
                
            
		    	<div class="form-group col-sm-2 col-xs-12 padding-4">
				    <label class="label">الأجازة السنوية </label>
                   <input type="number" name="year_vacation_num"  id="year_vacation_num" value="<?php echo $result['year_vacation_num'];?>"   class="form-control"  data-validation="required"  />
               </div>
               <!--
               <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">المدة المستحقة عنها</label>
                    <input type="number" name="year_vacation_period" id="year_vacation_period" value="<?php echo $result['year_vacation_period'];?>"    class=" form-control bottom-input" data-validation="required"   >
                   
                </div>
                -->
                <div class="form-group col-sm-2 col-xs-12 padding-4">
					<label class="label">المدة المستحقة عنها</label>
                   <select name="year_vacation_period" id="year_vacation_period"  class="form-control "   data-validation="required"  aria-required="true"   >
                       <option value="">أختر</option>
                   <?php
                   $due_period = array('360'=>'سنة','720'=>'سنتين');
                   foreach($due_period as $key=>$value){
                       $selected5 = '';
                       if ($key == $result['year_vacation_period']) {
                           $selected5 = 'selected';
                       } ?>
                       <option value="<?=$key?>"<?=$selected5?>><?=$value?></option>
                   <?php } ?>
                   </select>
                </div>
                
                 <div class="form-group col-sm-2 col-xs-12 padding-4">
					<label class="label">رصيد الاجازة السنوية السابقة </label>
                    <input type="number" name="vacation_previous_balance" value="<?php echo $result['vacation_previous_balance'];?>"    class=" form-control " data-validation="required"   >   
                </div>
<!-- Nagwa 20-6 -->
              <div class="form-group col-sm-2 col-xs-12 padding-4" >
                    <label class="label "style="text-align: center;" >
                        <img style="width: 19px;float: right;"
                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                        بداية حساب الاجازة
                        <img style="width: 19px;float: left;"
                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                    </label>

                    <div id="cal-2" style="width: 50%;float: right;">
                        <input id="vacation_start_h" name="vacation_start_h"
                               class="form-control  " type="text"
                               onfocus="showCal2();" value="<?php // echo $result['vacation_start_h']?>"
                               style=" width: 100%;float: right"/>
                    </div>
                    <div id="cal-1" style="width: 50%;float: left;">
                        <input id="vacation_start_m" name="vacation_start_m"
                               class="form-control  "
                               type="text" onfocus="showCal1();"
                               value="<?php // echo $result['vacation_start_m']?>"
                               style=" width: 100%;float: right" />
                    </div>
                </div>
                <!-- Nagwa 20-6 -->

                <!-- <div class="form-group col-sm-2 col-xs-12 padding-4">
					<label class="label">بداية حساب الاجازة</label>
                    <input type="text" name="vacation_start" value="<?php // echo $result['vacation_start_ar'];?>"    class="date_as_mask form-control " data-validation="required"   >
                </div> -->
                
                <div class="form-group col-sm-2 col-xs-12 padding-4">
					<label class="label">الأجازة الاضطرارية</label>
					<input type="number" name="casual_vacation_num" id="casual_vacation_num" value="<?php echo $result['casual_vacation_num'];?>"   class="form-control  " data-validation="required"   />
				
                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4">
					<label class="label">تذاكر سفر</label>
					<select name="travel_ticket" id="travel_ticket" <?=$disabled?> onchange="get_all_ticket($(this).val())" class=" form-control" data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
                    <option value="">إختر </option>
                    <?php
                    foreach($yes_no as $key=>$value){
                    $selected4 = '';
				    if ($key == $result['travel_ticket']) {
				         $selected4 = 'selected';
							} ?>
                    <option value="<?=$key?>"<?=$selected4?>><?=$value?></option>
                    <?php } ?>
                    </select>
                </div>
                 <?php
                  if($result['travel_ticket'] && $result['travel_ticket'] == 2){
                            $disabl2='disabled="disabled"';
                             $read2 ='readonly="readonly"';
                        }elseif($result['travel_ticket'] == 1){
                          $disabl2 =''; 
                          $read2 =''; 
                        }else{
                        $disabl2='disabled="disabled"'; 
                        $read2 ='readonly="readonly"';    
                        }
                    ?>
         	<!-- <div class="form-group col-sm-2 col-xs-12 padding-4">
				    <label class="label">نوع التذكرة</label>
                  <select name="travel_type_fk" id="travel_type_fk" <?=$disabl2?>  class=" form-control " data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
                    <option value="">إختر </option>
                    <?php
                    foreach($tickets as $row2){
                    $selected5 = '';
				    if ($row2->id_setting == $result['travel_type_fk']) {
				         $selected5 = 'selected';
							} ?>
                    <option value="<?=$row2->id_setting?>"<?=$selected5?>><?=$row2->title_setting?></option>
                    <?php } ?>
                    </select>
               </div> -->
               
                        <div class="form-group col-md-3 col-sm-6 padding-4" 
                     >
                    <label class="label  ">نوع التذكرة </label>
                    <input type="text" name="travel_type_name" id="travel_type_name" value="<?php echo $result['travel_type_name'];?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:79%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_travel_type').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           readonly>
                           <input type="hidden" name="travel_type_fk" id="travel_type_fk" 
                           value="<?php echo $result['travel_type_fk'];?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_travel_type" 
                    onclick="get_details_travel_type()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>
               <!--<div class="form-group col-md-3 col-sm-6 padding-4" 
                     >
                    <label class="label  ">نوع التذكرة </label>
                    <input type="text" name="travel_type_name" id="travel_type_name" value="<?php echo $travel_type_name ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:79%;float: right;" autocomplete="off" <?=$disabl2?>
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_travel_type').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="travel_type_fk" id="travel_type_fk" 
                           value="<?php echo $result['travel_type_fk'];?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_travel_type" 
                    onclick="get_details_travel_type()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>-->
               <!--
               <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">تحديد المدة </label>
                    <input type="number" name="travel_period" <?=$read2?> id="travel_period" value="<?php echo $result['travel_period'];?>"    class=" form-control bottom-input"  >
                   
                </div>
                -->
                
               <div class="form-group col-sm-2 col-xs-12 padding-4">

					<label class="label">تحديد المدة </label>
                   <select name="travel_period" id="travel_period" <?=$disabl2?> class="form-control "    aria-required="true"   >
                       <option value="">أختر</option>
                       <?php
                       $full_due_period = array('180'=>'6 أشهر','360'=>'سنة','720'=>'سنتين');
                       foreach($full_due_period as $key=>$value){
                           $selected6 = '';
                           if ($key == $result['travel_period']) {
                               $selected6 = 'selected';
                           } ?>
                           <option value="<?=$key?>"<?=$selected6?>><?=$value?></option>
                       <?php } ?>
                   </select>
                </div>
				
 
             
		    	<div class="form-group col-sm-2 col-xs-12 padding-4">
				    <label class="label">طريقة دفع الراتب </label>
                    <select name="pay_method_id_fk" id="pay_method_id_fk"   <?=$disabled?> onchange="get_all($(this).val())" class="form-control " data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
                    <option value="">إختر طريقة الدفع </option>
                    <?php
                    foreach($paid_type as $key=>$value){
                    $selected2 = '';
				    if ($key == $result['pay_method_id_fk']) {
				         $selected2 = 'selected';
							} ?>
                    <option value="<?=$key?>"<?=$selected2?>><?=$value?></option>
                    <?php } ?>
                    </select> 
               </div>
            
          
                <div class="form-group col-sm-2 col-xs-12 padding-4">
					<label class="label">مكافأة نهاية الخدمة</label>
					<select name="reward_end_work" id="reward_end_work" <?=$disabled?> class="form-control " data-show-subtext="true" data-live-search="true" data-validation="required"  >
                    <option value="">إختر </option>
                    <?php
                    foreach($yes_no as $key=>$value){
                    $selected6 = '';
				    if ($key == $result['reward_end_work']) {
				         $selected6 = 'selected';
							} ?>
                    <option value="<?=$key?>"<?=$selected6?>><?=$value?></option>
                    <?php } ?>
                    </select>
                </div>
                
               
            </div> 
      <!-- <input type="hidden" id="employeee_salary" value="<?= $employee_data['having_all_value'] ?>"> -->
       <input type="hidden" id="employeee_salary" value="<?=$emp_salary?>">


        <div class="col-xs-12 text-center">
          <!-- <input type="submit" name="add" id="buttons"  class="btn btn-blue btn-close" value="حفظ"/> -->
          <button type="submit" id="buttons" name="add" value="حفظ"
                                class="btn btn-labeled btn-success "  style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                        </button>
			</div>
            <?php  echo form_close()?>
        <br/>
        <br/>
            
            
       </div>
       
       
        
   </div> 
</div>

<!-------
<?php // $data_load["personal_data"]=$personal_data; $this->load->view('admin/Human_resources/sidebar_person_data',$data_load);?>
---------------->
<!-- yara -->
<div class="modal fade" id="Modal_travel_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">
                <i class="fa fa-plus-square" aria-hidden="true"></i>

                 نوع التذكرة</h4>
            </div>
            <div class="modal-body">

      <div id="travel_type_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input1111').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة 
                                    نوع التذكرة 
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input1111" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">نوع التذكرة  </label>
                                    <input type="text" name="travel_type" id="travel_type" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_travel_type" style="display: block;">
                                    <button type="button" onclick="add_travel_type($('#travel_type').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_travel_type" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_travel_type">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>

                        <br>
                        <br>
                    </div>
                    <!--                Nagwa 17-9 -->

                    <div id="myDiv_geha1111"><br><br>
                        <div class="col-md-12">
                            <?php
                            if (isset($tickets)&& !empty($tickets)){
                                ?>
                                <table id="" class=" example display table table-bordered  table-striped  responsive nowrap" cellspacing="0" width="100%">
                                    <thead class="greentd">
                                    <tr class="greentd">
                                        <th width="2%">#</th>
                                        <th class="text-center">نوع التذكره</th>

                                        <th class="text-center">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($tickets as $value){
                                        ?>
                                        <tr>
                                            <td><input type="radio" name="radio" data-title="<?= $value->id_setting ?>"
                                                       id="radio"
                                                       ondblclick="getTitle_travel_type('<?php echo $value->title_setting; ?>','<?php echo $value->id_setting; ?>')">
                                            </td>
                                            <td><?= $value->title_setting ?></td>

                                            <td>

                                                <a href="#" onclick="delete_travel_type(<?= $value->id_setting ?>);"> <i class="fa fa-trash"> </i></a>

                                                <a href="#" onclick="update_travel_type(<?= $value->id_setting ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>





                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>

                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>

                <!--<div id="travel_type_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input1111').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة 
                                    نوع التذكرة 
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input1111" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">نوع التذكرة  </label>
                                    <input type="text" name="travel_type" id="travel_type" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_travel_type" style="display: block;">
                                    <button type="button" onclick="add_travel_type($('#travel_type').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_travel_type" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_travel_type">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha1111"><br><br>
                   
                    </div>
                </div>-->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(function($){
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

<script>
function load_price(){
   var salary = $('#emp_salary').val();
   var num_days_in_month = $('#num_days_in_month').val(); 
   var hours_work = $('#hours_work').val(); 
   if(salary !='' && num_days_in_month !='' && hours_work!=''){
    var hour_value = ((parseFloat(salary)/parseFloat(num_days_in_month))/parseFloat(hours_work));
   var hour_value_f = parseFloat(hour_value).toFixed(2);
    $('#hour_value').val(hour_value_f); 
   }
}

</script>



<script>
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
}
</script>


<script>
	function get_all_ticket(valu){    
			if(valu == 2){
				$("#travel_type_fk").attr('disabled', 'disabled');
				$("#travel_type_fk option:selected").each(function () {
					$(this).removeAttr('selected'); 
					   });
				$("#travel_type_fk").selectpicker('refresh'); 
			
				document.getElementById("travel_period").setAttribute("disabled", "disabled");
				$("#travel_period").removeAttr('data-validation');
				$("#travel_type_fk").removeAttr('data-validation'); 
				$("#travel_type_fk").val(''); 
				$("#travel_period").val(''); 
			
			
			}else if(valu != 2){
			
				document.getElementById("travel_period").removeAttribute("disabled", "disabled");
				$("#travel_period").attr({'data-validation':"required"});
				$("#travel_type_fk").attr({'data-validation':"required"});    
				$("#travel_type_fk").removeAttr('disabled');
				$("#travel_type_fk").selectpicker('refresh');
		   
			}
	}
</script>
<!--
<script>
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
}
</script>
-->

<script>
    function get_banck_code(valu)
    {
        var valu=valu.split("-");
        $('#bank_code').val(valu[1]);
    }
</script>
<script>

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
    }

</script>

<script>
    function getHourSalary() {

        var num_days_in_month = $('#num_days_in_month').val();
        var employeee_salary = $('#employeee_salary').val();
        var hours_work = $('#hours_work').val();

        if(num_days_in_month !="" && hours_work !="" && num_days_in_month != 0 && hours_work !=0 ){
          //  var hour_value = parseInt(employeee_salary) / ( parseInt(num_days_in_month) * parseInt(hours_work));
           // $("#hour_value").val(parseInt(hour_value));
            var hour_value = parseFloat(employeee_salary) / ( parseFloat(num_days_in_month) * parseFloat(hours_work));
           $("#hour_value").val(Math.round(parseFloat(hour_value)));
        }

    }
</script>

<!-- Nagwa 20-6 -->
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>



    var loop1 = loop2 = loop3 = loop4 = loop5 = 0;
    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('vacation_start_m'),
        date2 = document.getElementById('vacation_start_h'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    date1.setAttribute("value",cal1.getDate().getDateString());
    date2.setAttribute("value",cal2.getDate().getDateString());

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    setDateFields1();


    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal2.setTime(cal1.getTime());
        setDateFields1();
    };

    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal1.setTime(cal2.getTime());
        setDateFields1();
    };


    cal1.onHide = function() {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function() {
        cal2.show(); // prevent the widget from being closed
    };
    function setDateFields1() {

        if (loop1 == 0) {
            <?php if (isset($result) && $result != null) { ?>
            loop1++;
            date1.value = '<?=$result['vacation_start_m']?>';
            date2.value = '<?=$result['vacation_start_h']?>';
            <?php } else { ?>
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
            <?php } ?>
        }
       else {
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
        }


        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
    }

    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }

    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();
    }



</script>
<!-- yara -->
<script>
    function get_details_travel_type() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/Human_resources/load_travel_type",
            
            // beforeSend: function () {
            //     $('#myDiv_geha11').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha1111').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_travel_type(value,id) {


        $('#travel_type_fk').val(id);
        $('#travel_type_name').val(value);

        $('#Modal_travel_type').modal('hide');
    }
</script>
<script>
  
  function add_travel_type(value) {

      $('#div_update_travel_type').hide();
      $('#div_add_travel_type').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'travel_type=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>human_resources/Human_resources/add_travel_type',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#travel_type').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ بنجاح!",


      }
      );
      get_details_travel_type();

              }
          });
      }

  }


</script>
<script>
    function update_travel_type(id) {
        var id = id;
        $('#geha_input1111').show();
        $('#div_add_travel_type').hide();
        $('#div_update_travel_type').show();


        $.ajax({
            url: "<?php echo base_url() ?>human_resources/Human_resources/getById_travel_type",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title_setting);

                $('#travel_type').val(obj.title_setting);


            }

        });

        $('#update_travel_type').on('click', function () {
            var travel_type = $('#travel_type').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>human_resources/Human_resources/update_travel_type",
                type: "Post",
                dataType: "html",
                data: {travel_type: travel_type,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#travel_type').val('');
                    $('#div_update_travel_type').hide();
                    $('#div_add_travel_type').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_travel_type();    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_travel_type(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
             var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/delete_travel_type',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#travel_type').val('');
                   // $('#Modal_esdar').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_travel_type();

                }
            });
        }

    }
</script>