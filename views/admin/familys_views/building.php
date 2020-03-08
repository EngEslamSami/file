
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>




<style>
    /**************************/
    /* 27-1-2019 */
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }
    .half {
        width: 100% !important;
        float: right !important;
    }
    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }
    .form-group col-md-2 padding-4  {
        margin-bottom: 0px;
    }
    .bootstrap-select>.btn {
        width: 100%;
        padding-right: 5px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important; 
        left: 4px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }
 /*   .form-control{
        font-size: 15px;
        color: #000;
        border-radius: 4px;
        border: 2px solid #b6d089 !important;
    }*/
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    .has-success .form-control {
        border: 2px solid #b6d089;

        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    }
    .has-success  .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    .nav-tabs>li>a {
        color: #222;
        font-weight: 500;
        background-color: #e6e6e6;
        font-size: 15px;
    }
    .tab-content {
        margin-top: 15px;
    }
    /**************************/
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text{
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1{
        background-color:#eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text{
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation{
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric{
        color: red;
        font-size: 25px;
        position: absolute;
    }
    .help-block.form-error{
        color: #a94442  !important;
        font-size: 15px !important;
        position: absolute !important;
        bottom: -23px !important ;
        right: 50% !important ;
    }
</style>



<?php if(isset($check_data) && $check_data!=null && !empty($check_data)){
    $result=$check_data;

}else{
    foreach($all_field as $keys=>$value){
        $result[$all_field[$keys]]='';
    }
   if($basic_data_family['h_house_owner_id_fk'] == 'rent'){
    $result['h_rent_amount']=$basic_data_family['h_rent_amount'];
    $result['h_house_owner_id_fk'] = 'rent';
    }else{
    $result['h_rent_amount']=0;
    $result['h_house_owner_id_fk'] = $basic_data_family['h_house_owner_id_fk'];
    }
    
}
$arr_yes_no=array('','نعم','لا');
?>


 <?php
            $this->load->model("familys_models/Register");
            $data_load["basic_data_family"] = $basic_data_family;
            $data_load["mother_num"] = $this->uri->segment(4);
            $data_load["person_account"] = $basic_data_family["person_account"];
            $data_load['FamilyOperationsPermissions'] = $this->Register->getFamilyOperationsPermissions()[0];
            $data_load["agent_bank_account"] = $basic_data_family["agent_bank_account"];
            $data_load["file_num"] = $basic_data_family["file_num"];
            $data_load["employees"] = $employees;
            $this->load->view('admin/familys_views/drop_down_button', $data_load); ?>
<div class="col-sm-12  " >
	<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $header_title; ?>
            </h3>
          
		</div>
        <?php echo form_open('family_controllers/Family/house/'.$mother_national_num,array('id'=>'form'))?>
		<div class="panel-body"><br>
            
           <div class="col-md-9 no-padding">
            <div class="col-md-12">
             <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">رقم السجل المدنى للأب   </label>
                    <input  type="text" value="<?php echo $father_national_card ?>"  readonly="" 
                       class="form-control half input-style"  data-validation="required" >
                </div>
                
                <div class="form-group col-md-4 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half" >إسم الأب  </label>
                    <input type="text"  value="<?php echo $father_name?>"  readonly="" class="form-control half input-style"   >
                </div>
               
            </div>
            <div class="col-md-12">
			
               <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                   <label class="label label-green  half">المنطقة  </label>
                   <select class="form-control half " onchange="plases('h_area_id_fk','h_city_id_fk');" name="h_area_id_fk" id="h_area_id_fk"  data-validation="required"  aria-required="true">
                       <option  value="">اختر</option>
                       <?php
                       foreach($area as $record){
                           $selected='';
                           if($record->id == $result['h_area_id_fk']){$selected='selected';}
                           echo '<option value="'.$record->id.'" '.$selected.' >'.$record->title.'</option>';
                       }
                       ?>
                   </select>
               </div>
               <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                   <label class="label label-green  half"> المحافظة    </label>
                   <select class="form-control half " onchange="plases('h_city_id_fk','h_center_id_fk');" name="h_city_id_fk" id="h_city_id_fk"  data-validation="required"  aria-required="true">
                       <option  value="">اختر</option>
                       <?php if(isset($city) && !empty($city) && $city!=null) {
                           foreach ($city as $record) {
                               $selected = '';
                               if ($record->id == $result['h_city_id_fk']) {
                                   $selected = 'selected';
                               }
                               echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                           }
                       }else{
                           echo '<option value="" >لا يوحد بيانات مضافة </option>';
                       }
                       ?>
                   </select>
               </div>
          

                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half"> المركز    </label>
                    <select class="form-control half " onchange="plases('h_center_id_fk','h_village_id_fk');" name="h_center_id_fk" id="h_center_id_fk"  data-validation="required"  aria-required="true">
                        <option  value="">اختر</option>
                        <?php if(isset($centers) && !empty($centers) && $centers!=null) {
                            foreach ($centers as $record) {
                                $selected = '';
                                if ($record->id == $result['h_center_id_fk']) {
                                    $selected = 'selected';
                                }
                                echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                            }
                        }else{
                            echo '<option value="" >لا يوحد بيانات مضافة </option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half"> الحي     </label>
                    <select class="form-control half "  name="h_village_id_fk" id="h_village_id_fk"  data-validation="required"  aria-required="true">
                        <option  value="">اختر</option>
                        <?php if(isset($village) && !empty($village) && $village!=null) {
                            foreach ($village as $record) {
                                $selected = '';
                                if ($record->id == $result['h_village_id_fk']) {
                                    $selected = 'selected';
                                }
                                echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                            }
                        }else{
                            echo '<option value="" >لا يوحد بيانات مضافة </option>';
                        }
                        ?>
                    </select>
                </div>
                <!-- <div class="form-group col-sm-4">
                    <label class="label label-green  half"> كتابه الحي   </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" data-validation="required" name="hai_name" value="<?php echo  $result['hai_name']?>" >
                </div>-->
               <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">الشارع  </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" data-validation="required" name="h_street" value="<?php echo $result['h_street']?>">
                </div>
   
               <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">أقرب مدرسة  </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" data-validation="required" name="h_nearest_school" value="<?php echo $result['h_nearest_school']?>" >
                </div>
                
             </div>
            
            
            
			<div class="col-md-12">
            
            
               <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half"> أقرب معلم   </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" data-validation="required" name="h_nearest_teacher" value="<?php echo $result['h_nearest_teacher']?>"  >
                </div>
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">أقرب مسجد  </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" data-validation="required" name="h_mosque" value="<?php echo $result['h_mosque']?>">
                </div>
           
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half"> نوع السكن   </label>
                    <select class="form-control half" name="h_house_type_id_fk"  data-validation="required"  aria-required="true">
                        <option  value="">اختر</option>
                        <?php foreach($arr_type_house as $x):
                            $selected='';if($x->id_setting==$result['h_house_type_id_fk']){$selected='selected';}?>
                            <option value="<?php echo $x->id_setting ?>" <?php echo $selected?> ><?php echo $x->title_setting ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">لون المنزل  </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style" data-validation="required" name="h_house_color" value="<?php echo $result['h_house_color']?>" >
                </div>
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">اتجاه المنزل   </label>
                    <select class="form-control half"  name="h_house_direction"  data-validation="required"  aria-required="true">
                        <option  value="">اختر</option>
                        <?php foreach($arr_direct as $y):
                            $selected='';if($y->id_setting==$result['h_house_direction']){$selected='selected';}?>
                            <option value="<?php echo $y->id_setting ?>" <?php echo $selected?> ><?php echo $y->title_setting ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">الحالة  </label>
                    <select class="form-control half" name="h_house_status_id_fk"  data-validation="required"  aria-required="true">
                        <option  value="">اختر</option>
                        <?php foreach($house_state as $z):
                            $selected='';if($z->id_setting==$result['h_house_status_id_fk']){$selected='selected';}?>
                            <option value="<?php echo $z->id_setting ?>" <?php echo $selected?> ><?php echo $z->title_setting ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                
            </div>
            <div class="col-md-12">
            
            
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">عدد الغرف   </label>
                    <input placeholder="إدخل البيانات " type="text" onkeypress="validate_number(event);" class=" some_class form-control half input-style"data-validation="required"  name="h_rooms_account" value="<?php echo $result['h_rooms_account']?>" >
                </div>
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">مساحة البناء  </label>
                    <input placeholder="إدخل البيانات " type="text" onkeypress="validate_number(event);" class=" some_class form-control half input-style"data-validation="required" name="h_house_size"  value="<?php echo $result['h_house_size']?>" >
                </div>
            
            	<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
					<label class="label label-green  half">رقم حساب فاتورة الكهرباء  </label>
					<input  placeholder="إدخل البيانات " type="text" onkeypress="validate_number(event)" class="form-control half input-style"  data-validation="required" name="h_electricity_account" value="<?php echo $result['h_electricity_account']?>" >
				</div>
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">رقم حساب عداد المياه  </label>
                    <input  placeholder="إدخل البيانات " type="text"  onkeypress="validate_number(event)"class="form-control half input-style"  data-validation="required" name="h_water_account" value="<?php echo $result['h_water_account']?>" >
                </div>
				<div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
					<label class="label label-green  half">الرقم الصحى  </label>
                    <input type="text" name="h_health_number"   onkeypress="validate_number(event)"value="<?php echo $result['h_health_number']?>" class="form-control half input-style"  data-validation="required" >
				</div>
			
              <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
        		<label class="label label-green  half">رقم المنزل(العنوان الوطني)   </label>
        		<input  placeholder="إدخل البيانات " type="text" 
                onkeypress="validate_number(event)" class="form-control half input-style" 
                 data-validation="required" name="national_address" 
                        value="<?php echo $result['national_address']?>" >
        	   </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">ملكية السكن   </label>
                    <select class="form-control half"  id="building_type" name="h_house_owner_id_fk"   data-validation="required"  aria-required="true" onchange="getRent();">
                        <option  value="">اختر</option>
                        <option  value="rent" <?php if($result['h_house_owner_id_fk'] ==='rent' ){?> selected <?php }?>>(إيجار)</option>
                        <?php
                        foreach($house_own as $a):
                            $selected='';if($a->id_setting==$result['h_house_owner_id_fk']){$selected='selected';}?>
                            <option value="<?php echo $a->id_setting ?>" <?php echo $selected?> ><?php echo $a->title_setting ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">إسم المؤجر  </label>
                    <input placeholder="إدخل البيانات " type="text" class=" some_class form-control half input-style"  name="h_renter_name" id="h_renter_name" value="<?php echo $result['h_renter_name']?>"   <?php if($result['h_house_owner_id_fk'] !='rent'){?>  disabled<?php } ?>  >
                </div>

                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">رقم الجوال <strong></strong> </label>
                    <input type="text" name="h_renter_mob"  id="h_renter_mob" onkeyup="chek_length('h_renter_mob');" placeholder="إدخل البيانات "   onkeyup="chek_length('h_renter_mob')" onkeypress="validate_number(event)"  class="form-control half input-style "  value="<?php echo $result['h_renter_mob'];?>"  <?php if($result['h_house_owner_id_fk'] !=='rent'){?>  disabled<?php } ?>/>
                    <span  id="h_renter_mob_span" class="span-validation"> </span>
                </div>

               
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">تاريخ بداية العقد<strong></strong> </label>
                    <input type="text" name="contract_start_date"  id="contract_start_date"  
                           size="10" maxlength="10" style="width: 80px;"
                           class="form-control half input-style mark_date"  
                           value="<?php   echo $result['contract_start_date'];?>"  <?php if($result['h_house_owner_id_fk'] !=='rent'){?>  disabled<?php } ?>/>
              
                </div>
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">تاريخ نهاية العقد<strong></strong> </label>
                    <input type="text" name="contract_end_date"  id="contract_end_date" 
                           size="10" maxlength="10" style="width: 80px;" 
                             class="form-control half input-style mark_date" 
                           value="<?php echo $result['contract_end_date'];?>"  <?php if($result['h_house_owner_id_fk'] !='rent'){?>  disabled<?php } ?>/>
                </div>
                
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">مقدار الإيجار السنوى  </label>
                    <input placeholder="إدخل البيانات " id="h_rent_amount" type="text" onkeypress="validate_number(event);" class=" some_class form-control half input-style" data-validation="required" name="h_rent_amount" value="<?php echo $result['h_rent_amount']?>"  <?php if($result['h_house_owner_id_fk'] !='rent'){?>  disabled<?php } ?>  >
                </div>
                
            </div>
            <div class="col-md-12">
            
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half"> عدد دورات المياه   </label>
                    <input placeholder="إدخل البيانات " type="text"  onkeypress="validate_number(event);"class=" some_class form-control half input-style" data-validation="required" name="h_bath_rooms_account"  value="<?php echo $result['h_bath_rooms_account']?>" >
                </div>
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class=" label label-green  col-xs-6 no-padding">مقترض من البنك العقارى  </label>
                    <select class=" form-control half col-xs-6 no-padding "  name="h_borrow_from_bank" id="bank" style="border: 1px solid #ccc;"  data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                            $selected='';if($r==$result['h_borrow_from_bank']){$selected='selected';}
                            ?>
                            <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                        <?php }?>
                    </select>


                </div>
                <?php $dis="disabled";if($result['h_borrow_from_bank'] == 1){
                    $dis="";
                }?>
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half"> القيمة المتبقية للقرض  </label>
                    <input type="text" <?=$dis?> name="h_borrow_remain" onkeypress="validate_number(event);" value="<?php echo $result['h_borrow_remain']?>" class="some_class form-control half input-style" placeholder="القيمة المتبقية" style="width: 25%;" id="bank-cost" >
                </div>
           
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green col-xs-6 no-padding">قرض ترميم من بنك التسليف  </label>
                    <select class=" form-control half col-xs-6 no-padding " onchange="getquerd($(this).val());"  name="h_loan_restoration" id="fix" style="border: 1px solid #ccc;"  data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                            $selected='';if($r==$result['h_loan_restoration']){$selected='selected';}
                            ?>
                            <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                        <?php }?>
                    </select>
                </div>
                  <?php $dis="disabled";if($result['h_loan_restoration'] == 1){
                      $dis="";
                  }?>
                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">القيمة المتبقية  </label>
                    <input  placeholder="إدخل البيانات "  type="text"  onkeypress="validate_number(event);" <?=$dis?> name="h_loan_restoration_remain" value="<?php echo $result['h_loan_restoration_remain']?>" class="some_class form-control half input-style" placeholder="القيمة المتبقية" style="width: 25%;" id="fix-cost" >
                </div>

            </div>
               


           
            
            </div>
            <div class="col-md-3 col-xs-12 no-padding">
            <!-----------------map--------------->
                <div class="form-group">
                    <label class="control-label">الموقع على الخريطة </label>
                    <input type="hidden" name="house_google_lng" id="lng" value="<?php if(isset($result)) echo $result['house_google_lng'] ?>" />
                    <input type="hidden" name="house_google_lat" id="lat" value="<?php if(isset($result)) echo $result['house_google_lat'] ?>" />
                    <?php  echo $maps['html'];?>
                </div>
     
               <!-----------------map--------------->
            </div>
            
            
            
             <!--button-->
            <div class="col-md-12 col-xs-12 text-center ">
                <?php  if(isset($check_data) && $check_data!=null && !empty($check_data)){
                    $xnput_name1='update';$xnput_name2='update_save';
                }else{
                      $xnput_name1='add';$xnput_name2='add_save';
                } ?>

                
                     <button type="submit" id="buttons" class="btn btn-labeled btn-success " name="<?php echo $xnput_name1?>" value="حفظ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
      
              

            </div>
            
		</div>
        <?php echo form_close()?>
	</div>
</div>

<script type="text/javascript">
jQuery(function($){
	$(".mark_date").mask("99/99/9999");

});
</script>



<script>

    function getquerd(value) {

        if(value == 2){
            document.getElementById("fix-cost").setAttribute("disabled", "disabled");
        }else {
            document.getElementById("fix-cost").removeAttribute("disabled", "disabled");
        }
    }



    function chek_length(inp_id)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(inchek_id).val();
        if(inchek.length < 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById("buttons").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);

        }

        if(inchek.length > 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById("buttons").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);
        }

        if(inchek.length == 10){
            document.getElementById("buttons").removeAttribute("disabled", "disabled");

        }
    }

</script>

<script>
    document.getElementById("bank").onchange = function () {

        if (this.value == 1)
            document.getElementById("bank-cost").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("bank-cost").setAttribute("disabled", "disabled");
            $("#bank-cost").val('');
        }
    };
    document.getElementById("buliding").onchange = function () {

        if (this.value == 2)
            document.getElementById("buliding-cost").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("buliding-cost").setAttribute("disabled", "disabled");
            $("#buliding-cost").val('');
        }
    };
    document.getElementById("fix").onchange = function () {

        if (this.value == 1)
            document.getElementById("fix-cost").removeAttribute("disabled", "disabled");
        else{
            document.getElementById("fix-cost").setAttribute("disabled", "disabled");
            $("#fix-cost").val('');
        }
    };




</script>
<!--------------------------------------->
<script>
    function plases(id_main,is_sub) {
        var value_id=$("#"+id_main).val();
      //  alert(value_id);
        if(value_id) {
            var dataString = 'value_id=' + value_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Family/house/<?=$mother_national_num?>',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                  //  alert(html);
                    $('#'+is_sub).html(html);
                }
            });
            return false;
        }
    }
</script>


<!----------------ahmed-->
<script>

    function getRent() {
        var building_type=$("#building_type").val();
        if(building_type === 'rent'){
            
             document.getElementById("h_rent_amount").removeAttribute("disabled", "disabled");
             document.getElementById("h_rent_amount").setAttribute("data-validation", "required");
           
            document.getElementById("h_renter_name").removeAttribute("disabled", "disabled");
            document.getElementById("h_renter_mob").removeAttribute("disabled", "disabled");
            document.getElementById("contract_start_date").removeAttribute("disabled", "disabled");
            document.getElementById("contract_end_date").removeAttribute("disabled", "disabled");
            document.getElementById("h_renter_name").setAttribute("data-validation", "required");
            document.getElementById("h_renter_mob").setAttribute("data-validation", "required");
            document.getElementById("contract_start_date").setAttribute("data-validation", "required");
            document.getElementById("contract_end_date").setAttribute("data-validation", "required");

        }else{
           
              document.getElementById("h_rent_amount").value="";
          
           
            document.getElementById("h_renter_name").value="";
            document.getElementById("h_renter_mob").value="";
            document.getElementById("contract_start_date").value="";
            document.getElementById("contract_end_date").value="";
            
            document.getElementById("h_renter_name").setAttribute("disabled", "disabled");
            document.getElementById("h_rent_amount").setAttribute("disabled", "disabled");
            document.getElementById("h_renter_mob").setAttribute("disabled", "disabled");
            document.getElementById("contract_start_date").setAttribute("disabled", "disabled");
            document.getElementById("contract_end_date").setAttribute("disabled", "disabled");


        }
    }




</script>
<!----------------ahmed-->
