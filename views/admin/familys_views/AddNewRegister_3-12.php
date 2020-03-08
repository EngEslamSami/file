
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script><script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script><script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script>
<style>
    .one_three{
        width: 43% !important;
        float: right;
    }
    .two_three{
        width: 57% !important;
        float: right;
    }
    .nonactive{
        pointer-events: none;
        cursor: not-allowed;
    }
    
    .form-group {
     margin-bottom: 0px !important; 
}
</style>
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php  echo $title?> </h3>
        </div>
        <div class="panel-body">
            <?php

/*echo '<pre>';
print_r($_SESSION);
*/

            if(isset($result) && $result!=null){
                $button ='تعديل ';
                $required ='';
                $validation ='';
                $out['input']='UPDTATE';
                $out['input_title']='تعديل ';
                $readonly = 'readonly';
                $form = form_open_multipart("family_controllers/Family/UpdateNewRegister/".$result["mother_national_num"]);
            }else{
                $button ='حفظ';
                $validation ='';
                $required ='data-validation="required"';
                $readonly = '';
                $out['input']='ADD';
                $out['input_title']='حفظ ';
                $form =form_open_multipart("family_controllers/Family/InsertNewRegister");
            }?>
            <?php echo $form ?>
            
            
            
            
            <div class="col-sm-12 form-group">
                <div class="col-sm-6 col-md-3 padding-4">
                    <label class="label label-green  one_three">رقم السجل المدنى للأب </label>
                    <input type="text" name="father_national_num" maxlength="10" 
                           onkeypress="validate_number(event);check_length_num(this,10,'father_span_num');"
                           value="<?php if(isset($result)){ echo $result["father_national_num"];} ?>"
                           class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="required">
                    <span id="father_span_num" style="color: red;"></span>
                </div>
                <div class="col-sm-6  col-md-3 padding-4 ">
                    <label class="label label-green  one_three">إسم الأب رباعي  </label>
                    <input  type="text" name="full_name" class="form-control two_three input-style" placeholder="أدخل البيانات"
                            value="<?php if(isset($result)){ echo $result["father_name"];} ?>"   data-validation="required">
                </div>
                <div class="col-sm-6 col-md-3 padding-4">
                    <label class="label label-green  one_three">نوع هوية الأم </label>
                    <select name="national_id_type"
                            class="selectpicker no-padding form-control choose-date form-control two_three"
                            data-show-subtext="true" data-live-search="true" data-validation="required" onchange="GetNationalidType(this.value)"
                            aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        foreach ($national_id_array as $row2):
                            $selected = '';
                            if ($row2->id_setting == $result['national_id_type_mother']) {
                                $selected = 'selected';
                            } ?>
                            <option
                                value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> >
                                <?php echo $row2->title_setting; ?></option>
                        <?php endforeach;?>
                        <option value="0"<?php if(!empty($result)){
                            if($result['national_id_type'] ==0){
                                echo'selected';
                            }
                        }?> >أخري</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-3 padding-4">
                    <label class="label label-green  one_three">رقم هوية الأم</label>
                    <input type="text"  name="mother_national_num"  id="mother_national_num"  maxlength="10" onkeypress="validate_number(event);"
                           value="<?php if(isset($result)){ echo $result["mother_national_num"];} ?>"
                        <?php echo $readonly; ?> disabled="disabled"
                           id="mother_national_num" onkeyup=""
                           class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="required">
                    <span id="result_span_num" style="color: red;"></span>
                </div>
            </div>
            <div class="col-sm-12 form-group">
                <div class="col-sm-6 col-md-3 padding-4">
                    <label class="label label-green  one_three">الحالة الإجتماعية</label>
                    <select  name="marital_status_id_fk"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control two_three"
                             data-show-subtext="true" data-live-search="true"   aria-required="true" >
                        <option value="">اختر</option>
                        <?php foreach ($marital_status_array as $row6):
                            $selected='';if($row6->id_setting==$result['marital_status_id_fk_mother']){$selected='selected';}   ?>
                            <option value="<?php  echo $row6->id_setting;?>"  <?php echo $selected?>  ><?php  echo $row6->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>

                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">مقر التسجيل ( الفرع )</label>
                    <select name="register_place" class="selectpicker no-padding form-control choose-date form-control two_three"  data-validation="required"   data-show-subtext="true" data-live-search="true"   aria-required="true">
                        <option value=""> اختر</option>
                        <?php
                        foreach ($socity_branch as $row2):
                            $selected='';
                            if(isset($result)){
                                if($row2->id == $result["register_place"]){$selected='selected';}
                            }	?>
                            <option value="<?php  echo $row2->id;?>" <?php echo $selected?> ><?php  echo $row2->title;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">إسم مقدم الطلب رباعى  </label>
                    <input type="text" name="full_name_order"  value="<?php if(isset($result)){ echo $result["full_name_order"];} ?>" class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">الصلة</label>
                    <select name="person_relationship"  id="person_relationship" data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true"
                            onchange="get_num_fk(this.value);" class="selectpicker no-padding form-control choose-date form-control two_three">
                        <option value="">إختر</option>
                        <option value="41" <?php  if(isset($result)){ if($result['person_relationship']=="41"){echo 'selected'; } }?> >(أم)</option>
                        <?php if(!empty($relationships)){ foreach ($relationships as $record){
                            $select='';
                            if(isset($result)){
                                if($result['person_relationship']==$record->id_setting){$select='selected'; }
                            }?>
                            <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>

            </div>
            <div class="col-sm-12 form-group" >

                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">رقم هوية مقدم الطلب  </label>
                    <input type="text" maxlength="10"   name="person_national_card" id="person_national_card"
                           value="<?php if(isset($result)){ echo $result["person_national_card"];} ?>"
                           onkeypress="validate_number(event);" onkeyup="check_length_num(this,10,'span_card');"
                           class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="required">
                    <span id="span_card" style="color: red;"></span>
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three"> جوال التواصل ( الرسائل)    </label>
                    <input type="text" maxlength="10" name="contact_mob"  value="<?php if(isset($result)){ echo $result["contact_mob"];} ?>"
                           onkeypress="validate_number(event);" onkeyup="check_length_num(this,10,'span_phone');"
                           class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="required">
                    <span id="span_phone" style="color: red;"></span>
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three"> المدينة  </label>
                    <!-- <input type="text" name="full_name_order"  value="<?php // if(isset($result)){ echo $result["full_name_order"];} ?>" class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="required">
                -->  <select class="form-control two_three selectpicker"  name="center_id_fk" data-show-subtext="true" data-live-search="true"
                             data-validation="required" aria-required="true" onchange="get_sub_select(this.value,'center_option');">
                        <option value="">اختر</option>
                        <?php    if(isset($all_city) && !empty($all_city)){
                            foreach ($all_city as $row_city):
                                $selected = '';
                                if (isset($result)) {
                                    if ($row_city->id == $result['center_id_fk']) {
                                        $selected = 'selected';
                                    }
                                } ?>
                                <option
                                    value="<?php echo $row_city->id ?>" <?php echo $selected ?> >
                                    <?php echo $row_city->title ?></option>
                            <?php endforeach ;}?>
                    </select>
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three"> الحي  </label>
                    <!--  <input type="text" name="full_name_order"  value="<?php // if(isset($result)){ echo $result["full_name_order"];} ?>" class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="required">
               -->
                    <select name="district_id_fk" class="form-control two_three " id="center_option" name="" data-show-subtext="true" data-live-search="true"
                            data-validation="required" aria-required="true">
                        <option value="">اختر</option>
                        <?php  if(isset($all_district) && !empty($all_district)){
                            foreach ($all_district as $row_city):
                                $selected = '';
                                if (isset($result)) {
                                    if ($row_city->id == $result['district_id_fk']) {
                                        $selected = 'selected';
                                    }
                                } ?>
                                <option value="<?php echo $row_city->id ?>" <?php echo $selected ?> >
                                    <?php echo $row_city->title ?></option>
                            <?php endforeach;
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 form-group" >
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">عدد الذكور
                    </label>
                    <input type="text" name="male_number" id="male_number" onkeypress="validate_number(event)"
                           data-validation="required" onkeyup="getFamilyNumber();" value="<?php if (isset($result)) {
                        echo $result["male_number"];
                    } ?>" class="form-control two_three input-style"/>
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">عدد الإناث
                    </label>
                    <input type="text" name="female_number" id="female_number" onkeypress="validate_number(event)"
                           data-validation="required" onkeyup="getFamilyNumber();" value="<?php if (isset($result)) {
                        echo $result["female_number"];
                    } ?>" class="form-control two_three input-style"/>
                </div>

                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">اجمالي عدد الأفراد
                    </label>
                    <input type="text" name="family_members_number" id="family_members_number"
                           onkeypress="validate_number(event)" data-validation="required" readonly
                           value="<?php if (isset($result)) {
                               echo $result["family_members_number"];
                           } ?>" class="form-control two_three input-style"/>
                </div>

                <div class="form-group col-sm-3">
                    <label class="label label-green  one_three" >مصادر الدخل الشهري </label>
                    <input class="textbox form-control" type="text" name="retirement" value="<?php if(isset($result)){ echo $result["retirement"];} ?>" placeholder="تقاعد" style="width: 18.5%;float: right;" >
                    <input class="textbox form-control" type="text" name="insurance" value="<?php if(isset($result)){ echo $result["insurance"];} ?>" placeholder="تأمينات" style="width: 19.5%;float: right;" >
                    <input class="textbox4 form-control" type="text" name="guarantee" value="<?php if(isset($result)){ echo $result["guarantee"];} ?>" placeholder="ضمان" style="width: 18.5%;float: right;" >
                </div>
            </div>

            <div class="col-sm-12 form-group" >

                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">ملكية السكن </label>
                    <select class="form-control two_three" id="building_type" name="h_house_owner_id_fk"
                            data-validation="required" aria-required="true" onchange="getRent();">
                        <option value="">اختر</option>
                        <option value="rent" <?php if (isset($result)) {
                            if ($result['h_house_owner_id_fk'] === 'rent') { ?> selected <?php }
                        } ?>>(إيجار)
                        </option>
                        <?php
                        foreach ($house_own as $a):
                            $selected = '';  if (isset($result)) {
                            if ($a->id_setting == $result['h_house_owner_id_fk']) {
                                $selected = 'selected';
                            }
                        } ?>
                            <option
                                value="<?php echo $a->id_setting ?>" <?php echo $selected ?> ><?php echo $a->title_setting ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">مقدار الإيجار السنوى </label>
                    <input placeholder="إدخل البيانات " id="h_rent_amount" type="text"
                           onkeypress="validate_number(event);" class="  form-control two_three " data-validation="required"
                           name="h_rent_amount" value="<?php if (isset($result)){
                        echo $result['h_rent_amount']; } ?>" <?php if (isset($result)){ if ($result['h_house_owner_id_fk'] != 'rent') { ?>  disabled<?php }
                    } ?> >
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">الوقت المناسب للتواصل</label>
                    <input placeholder="إدخل البيانات " id="h_rent_amount" type="time" class="form-control  input-style" data-validation="required"
                           name="right_time_from" value="<?php if (isset($result)){
                        echo $result['right_time_from']; } ?>" style="width: 28%;float: right;">
                    <input placeholder="إدخل البيانات " id="h_rent_amount" class="form-control  input-style" type="time" data-validation="required"
                           name="right_time_to" value="<?php if (isset($result)){
                        echo $result['right_time_to']; } ?>"  style="width: 28%;">
                </div>
                

<div class=" col-sm-6  col-md-3 padding-4">
<label class="label label-green  one_three"> جوال التواصل ( الجمعية)    </label>
<input type="text" maxlength="10" name="society_mob"  value="<?php if(isset($result)){ echo $result["society_mob"];} ?>"
       onkeypress="validate_number(event);" onkeyup="check_length_num(this,10,'span_society_mob');"
       class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="required">
<span id="span_society_mob" style="color: red;"></span>
</div>
                
                
                
                
                
            </div>
            <div class="col-sm-12 form-group" >
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">إسم المستخدم </label>
                    <input type="text" name="user_name" class="form-control two_three input-style" placeholder="أدخل البيانات"
                           value="<?php if(isset($result)){ echo $result["user_name"];} ?>"   data-validation="required">
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">كلمة المرور  </label>
                    <input type="password" name="user_password" onkeyup="valid_pass_length();" id="user_password" class="form-control two_three input-style" <?php echo $required?> />
                    <span  id="validate_length" class="span-validation"> </span>
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">تاكيد كلمة المرور <strong></strong> </label>
                    <input type="password"   id="user_password_copy" onkeyup="return valid_pass_copy();" class="form-control two_three input-style"    <?php echo $required?> />
                    <span  id="validate_copy" class="span-validation"> </span>
                </div>

                <!--
                     <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  half"> الطلب عن طريق
                      </label>
                    <select name="order_method" class="form-control half  "
                           data-validation="required" >
                        <?php $order_method_arr=array('','الجمعية','الموقع');
                ?>
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($order_method_arr);$a++){ $select='';
                    if(isset($result["order_method"])){
                        if($a== $result["order_method"]){$select='selected';} ?>
                        <?php } ?>
                        <option value="<?php echo$a; ?>"
                        <?php echo $select;?>><?php echo $order_method_arr[$a]; ?></option>
                        <?php }?>
                    </select>
                </div>
                -->
            </div>
            <!-------------------------------F_members----------------------------------------->
            <div class="col-sm-12 ">
                <button type="button" value="" id="" onclick="add_row_member()" class="btn btn-success btn-next"/>
                <i class="fa fa-plus"></i> إضافة الأبناء </button><br><br>
                <table   class="table table-striped table-bordered "   <?php if(empty($family_members)){ ?>  style="display: none"  <?php } ?>  id="mytable" >
                    <thead>
                    <tr class="info">
                        <th class="text-center" >م</th>
                        <th class="text-center" > الإسم</th>
                        <th class="text-center" >الصلة</th>
                        <th class="text-center" > الجنس </th>
                        <th class="text-center" > الهوية </th>
                        <th class="text-center" > تاريخ الميلاد </th>
                        <th class="text-center" > العمر </th>
                        <th class="text-center" > التصنيف </th>
                        <th class="text-center" > الإجراء</th>
                    </tr>
                    </thead>
                    <tbody id="resultTable">
                    <?php if(!empty($family_members)){
                        $s=1; foreach($family_members as $row){ ?>

                        <tr id="<?=$s?>">
                            <td style="text-align: center!important;"><?=$s?></td>
                            <td style="width:15%;text-align: center!important;">
                                <input type="text" class="form-control" name="member_full_name[]"  value="<?=$row->member_full_name?>" readonly ></td>
                            <td style=" width:15%;text-align: center!important;">
                                <select name="member_relationship[]" id="member_relationship"  disabled  class=" form-control" >
                                    <option value="">إختر</option>
                                    <?php if(!empty($relationships)){
                                        foreach ($relationships as $record){ ?>
                                            <option value="<?php echo $record->id_setting;?>"
                                            <?php if($row->member_relationship ==  $record->id_setting ){ echo'selected'; }?>
                                            ><?php echo $record->title_setting;?></option>
                                        <?php  } } ?>
                                </select>
                                <input type="hidden" name="member_relationship[]" value="<?=$row->member_relationship?>"></td>
                            <td style="width:15%;text-align: center!important;">
                                <select name="member_gender[]" id="member_gender<?=$s?>"  disabled class=" form-control" >
                                    <option value="">إختر</option>
                                    <?php $gender_arr=array('','ذكر','أنثى');?>
                                    <?php for ($a=1;$a<sizeof($gender_arr);$a++){ $select='';
                                        if($a== $row->member_gender){$select='selected';}?>
                                        <option value="<?php echo$a; ?>"
                                            <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="member_gender[]" value="<?=$row->member_gender?>"></td></td>
                            <td style="width:15%;text-align: center!important;">
                                <input type="text" name="member_card_num[]" id="member_card_num"  readonly
                                       onkeyup="check_length_num(this,'10','member_card_num_span')" maxlength="10"
                                       onkeypress="validate_number(event)"  value="<?=$row->member_card_num?>"
                                       class="form-control "/>
                                <small id="member_card_num_span" class="span-validation"></small>
                            </td>
                            <td style="width:15%;text-align: center!important;">

                                <input type="text"  onkeyup="GetAge(this.value,<?echo$s;?>)" class="form-control date_as_mask"
                                       value="<?=$row->member_birth_date_hijri?>" readonly
                                       id="member_birth_date_hijri<?=$s?>" name="member_birth_date_hijri[]"  ></td>
                            <td style="width:15%;text-align: center!important;">
                                <input class=" form-control  " type="text" name="age[]" id="myage<?echo$s;?>"  value="<?=$row->age?>"  size="60"readonly/></td>
                            <td style="width:15%;text-align: center!important;" id="categoriey_member_div<?=$s?>">
                                <?php if(!empty($row->tasnef['tasnef_title'])){
                                    echo $row->tasnef['tasnef_title'];
                                }else {
                                    echo 'غير محدد';
                                }?>
                                <input type="hidden" name="categoriey_member[]" value="<?=$row->tasnef['tasnef_id']?>">
                            </td>
                            <td style="text-align: center!important;"><a href="#"  onclick="deleteRow(<?=$s?>)"><i class="fa fa-trash" ></i></a></td>
                        </tr>

                    <?php $s++; } } ?>
                    </tbody>
                </table>
            </div>
            <!-----------------------------------F_members------------------------------------->
            <!-----------------------------------attachs------------------------------------->

            <div class="col-md-12">
                <input type="hidden" id="count_row" value="0" />


                    <button type="button" class="btn btn-success btn-next add_attchments"
                            onclick="add_row_attach(<?php if(isset($all_attach_file) && !empty($all_attach_file)){ 
                                      echo count($all_attach_file)+1;}else{echo 0;}?>);"
                    >   إضافة مرفقات   <i class="fa fa-files-o" aria-hidden="true"></i></button><br><br>


                <table class="table table-bordered"  <?php if(!isset($data_table_attached) && empty($data_table_attached)){ ?>  style="display: none"  <?php } ?> id="table_attach_files">
                    <thead >
                    <tr class="success">
                        <th>م</th>
                        <th style="text-align: center">اسم المرفق </th>
                        <th style="text-align: center">المرفق </th>
                        <th style="text-align: center">الإجراء</th>
                    </tr>
                    </thead>
                    <?php if(isset($data_table_attached) && !empty($data_table_attached)){ ?>
                        <tbody  id="result_Table">
                        <?php
                        $x=1;     foreach ($data_table_attached as $row){ ?>
                            <tr>
                            <td rowspan="<?php echo sizeof($row->sub);?>"><?php echo $x++?></td>
                            <td rowspan="<?php echo sizeof($row->sub);?>"><?php echo $row->title_setting;?> </td>
                            <?php if(!empty($row->sub)){
                                foreach ($row->sub as $row_sub){ ?>
                                    <td>
                                        <input type="hidden" class="attached_files" value="<?=$row->file_attach_id_fk?>" >

                                        <a href="<?php echo base_url() . 'family_controllers/Family/downloads_new/'.$row_sub->file_attach_name ?>" download>
                                            <i class="fa fa-download" title="تحميل"></i> </a>
                                        <a  data-toggle="modal" data-target="#myModal-view-<?=$row_sub->id?>" >
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url().'family_controllers/Family/DeleteMainFileAttach/'.$row_sub->id."/".$row_sub->mother_national_num_fk."/".$result["id"]?>" >
                                            <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                    </td>
                                    </tr>

                                    <div class="modal fade" id="myModal-view-<?=$row_sub->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"><?=$row->title_setting;?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?=base_url()."uploads/family_attached/".$row_sub->file_attach_name?>" width="100%">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <?php  } // end sub foreach
                            }else{ ?>
                                <td>--</td>
                                <td>--</td></tr>

                            <?php } // end else
                        } // end main  foreach  ?>

                        </tbody>
                    <?php }else { ?>
                        <tbody  id="result_Table">
                        <tr id="frist_one">
                            <td colspan="4" style="text-align: center;color: red"> لا يوجد مرفقات  </td>
                        </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>

                <!-----------------------------------attachs------------------------------------->

            <div class="form-group col-sm-4">
                <label class="label label-green  half"></label>
                <input tabindex="11" type="radio" id="square-radio-1"
                    <?php if(isset($result) && $result!=null){ echo "checked";}
                    else {echo  '';} ?>  >
                <label for="square-checkbox-1">اوافق على الاقرار</label>
            </div>
            <div class="col-xs-12">
                <button  type="submit" id="button" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"  class="btn btn-success ">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title']?></button>
            </div>
            <?php  echo form_close()?>
            <!------------------------------------------------------------->
            <?php
            if(isset($records)&& $records!=null):?>
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">رقم الطلب</th>
                            <th class="text-center">إسم رب الأسرة</th>
                            <th class="text-center">رقم الهوية</th>
                            <th class="text-center">إسم مقدم الطلب </th>
                            <th class="text-center">هوية مقدم الطلب</th>
                            <th class="text-center">الصلة</th>
                         <!--   <th class="text-center">إسم الأم- الوكيل</th>
                            <th class="text-center">هوية الأم - الوكيل</th>-->
                            <!--  <th class="text-center">رقم الجوال</th> -->
                            <th class="text-center">الاجراء</th>
                            <th class="text-center">استكمال البيانات</th>
                            <!-- <th class="text-center">إجراءات علي الملف</th>
                                  <th class="text-center">رأي الباحث</th>
                                  <th class="text-center"> حاله الملف </th>
                                  <th class="text-center">إجراءات حالات الملف</th>
                                  <th class="text-center">تحديث الملف </th> -->
                            <th class="text-center">طباعه</th>
                            <!--  <th class="text-center">ربط الاسرة بالباحثين</th> -->
                            <th class="text-center">تحويل الطلب </th>
                            <th class="text-center">المستندات المطلوبة</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php  $x=1; foreach ($records as $record ):
                            if ($record->mother_name != '') {
                                $mother_name   = $record->mother_name;
                                // $mother_name = '<h6 style="color: red;" > إستكمل البيانات</h6';
                            }elseif($record->mother_name == ''){
                                $mother_name   = $record->full_name_order;
                                //  $mother_name = '<h6 style="color: red;" > إستكمل البيانات</h6';
                            }else{
                                $mother_name = '<h6 style="color: red;" > إستكمل البيانات</h6>';
                            }
                            ?>
                            <tr>
                                <td><?php echo $x++ ?></td>
                                <td><?php echo $record->id; ?></td>
                                <td><?php echo $record->father_name; ?></td>
                                <td><?php echo $record->father_national; ?></td>
                                <td><?php
                                    echo $mother_name;
                                    /*if($record->mother_name != ''){
                                       echo $record->mother_name; }else{
                                           echo '<button type="button" class="btn btn-warning w-md m-b-5"> إستكمل البيانات</button>'; }
                                           */
                                    ?>
                                </td>
                                <td><?php echo $record->person_national_card; ?></td>
                                 <td><?php echo $record->sela_name; ?></td>
                                <!--<td><?php echo $record->mother_mob; ?></td> -->
                                <td> <a href="<?php echo base_url('family_controllers/Family/UpdateNewRegister').'/'.$record->mother_national_num?>">
                                        <i class="fa fa-pencil " aria-hidden="true"></i> </a>
                                    <a href="<?php echo  base_url('family_controllers/Family/DeleteNewRegister').'/'.$record->mother_national_num ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger">اضافه</button>
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/father/<?php echo $record->mother_national_num;?>">بيانات الأب  </a></li>
                                            <li><a target="_blank"  href="<?php echo base_url();?>family_controllers/Family/mother/<?php echo $record->mother_national_num;?>">بيانات الأم  </a></li>
                                            <li><a target="_blank"  href="<?php echo base_url();?>family_controllers/Family/add_wakel/<?php echo $record->mother_national_num;?>">بيانات الوكيل  </a></li>
                                            <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/family_members/<?php echo $record->mother_national_num;?>/<?php echo $record->person_account;?>/<?php echo $record->agent_bank_account;?>">بيانات أفراد الأسرة</a></li>
                                            <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/house/<?php echo $record->mother_national_num;?>">بيانات السكن</a></li>
                                            <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/devices/<?php echo $record->mother_national_num;?>">محتويات السكن </a></li>
                                            <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/home_needs/<?php echo $record->mother_national_num;?>"> إحتياجات الأسرة </a></li>
                                            <li>
                                                <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/money/<?php echo $record->mother_national_num;?>">مصادر الدخل والإلتزامات </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/add_responsible_account/<?php echo $record->mother_national_num;?>">بيانات الحساب البنكي</a>
                                            </li>
                                            <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/attach_files/<?php echo $record->mother_national_num;?>">رفع الوثائق  </a></li>
                                        </ul>
                                    </div>
                                </td>
                                <!--
<td>
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family_details/details/<?php echo $record->mother_national_num;?>">إجراءات</a>
</td>
<td>
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/SocialResearcher/<?php echo $record->mother_national_num;?>">إضافة رأي الباحث</a>
</td>
<td style="color: black;"><?php echo $record->process_title;?></td>
<td> <button data-toggle="modal"
             data-target="#modal-info<?php echo $record->id;?>"
             class="btn btn-sm btn-info"><i
            class="fa fa-list btn-info"></i>حاله الملف
    </button>
</td>
<td style="color: black;">
    <button data-toggle="modal" <?php if($record->suspend!=4){?> disabled="disabled"  <?php } ?>
            data-target="#modal-update<?php echo $record->id;?>"
            class="btn btn-sm btn-info"><i
            class="fa fa-list btn-info"></i>تحديث حاله الملف
    </button>
</td>-->
<td>
<!--
<a href = "<?php echo base_url('family_controllers/Family_details/print_family').'/'.$record->mother_national_num ?>" target = "_blank" >
        <i class="fa fa-print" aria-hidden = "true" ></i >
         </a>
         -->
    <a href = "<?php echo base_url('family_controllers/Family_details/printEqrar').'/'.$record->mother_national_num ?>" target = "_blank" > <i class="fa fa-print" aria-hidden = "true" ></i > </a>
</td>
                                <!--
<td style="color: black;">
        <button data-toggle="modal" data-target="#modal-link-family-<?php echo $record->id;?>"
           class="btn btn-sm btn-success"><i
                class="fa fa-list btn-success"></i> ربط الأسرة بباحث
        </button>
   </td>
   -->
                                <td style="color: black;">
                                    <button data-toggle="modal" data-target="#modal-process-procedure-<?php echo $record->id;?>" class="btn btn-sm btn-info"><i
                                            class="fa fa-list btn-info"></i>   تحويل الطلب
                                    </button>
                                </td>

                                <td>

                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-files-<?php echo $record->mother_national_num;?>">الملفات</button>
                                    <?php if(isset($record->required_files) and  !empty($record->required_files)){ if(sizeof($record->required_files) >0){ ?>    <a href="<?php echo base_url('family_controllers/Family/printRequiredFiles').'/'.$record->mother_national_num ?>" target="_blank">
                                        <i class="fa fa-print" aria-hidden="true"></i> </a>
                                    <?php  }} ?>
                                </td>

                            </tr>
                        <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
                <?php $all_adminastration="";  if (isset($adminastration) && !empty($adminastration)) {
                    foreach ($adminastration as $row_adminastration) {
                        $all_adminastration.='<option value="'.$row_adminastration->id.'">'.$row_adminastration->name.'</option>';   ?>
                    <?php }  } ?>

                <?php  $x=1; foreach ($records as $record ):?>
                    <!-- start  -->
                    <div class="modal fade" id="modal-update<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"> تحديث حاله ملف  الأسره </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  method="post" action="<?php echo base_url();?>family_controllers/Family/update_file_status">
                                        <div class="col-md-12">
                                            <input type="hidden" name="mother_national" value="<?php echo $record->id;?>">
                                            <?php
                                            $file_num
                                            ?>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> رقم الملف  <strong class="astric">*</strong> </label>
                                                <input type="text" readonly="readonly" class="form-control half input-style"  name="file_num"
                                                       value=" <?php  if($record->file_num!=0){ echo  $record->file_num; }
                                                       else {  echo  ($file_num + 1) ;}?>"
                                                       id="file_num"   <?=$validation?> />
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12" >
                                                <label class="label label-green  half"> تاريخ اعتماد الملف  <strong class="astric">*</strong> </label>
                                                <input type="date" class="form-control half input-style "  name="date_suspend" value="<?=$record->date_suspend?>"   id="date_suspend"   name="date_suspend"  <?=$validation?> />
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> فتره التحديث <strong class="astric">*</strong> </label>
                                                <select id="peroid_update" name="peroid_update" class="form-control half input-style"
                                                        onchange="get_peroid($(this).val(),<?php echo $record->id;?>);">
                                                    <option value="0">اختر</option>
                                                    <?php
                                                    if(isset($all_options)&&!empty($all_options)) {
                                                        foreach ($all_options as $row) {
                                                            ?>
                                                            <option value="<?php echo $row->num_of_day;?>" <?php if(isset($record->peroid_update )&&!empty($record->peroid_update)&&$record->peroid_update==$row->num_of_day ){?> selected="selected"<?php } ?>> <?php echo $row->title;?> </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12" >
                                                <label class="label label-green  half"> تاريخ التحديث<strong class="astric">*</strong> </label>
                                                <input type="date" class="form-control half input-style"  name="update_date" value="<?=$record->file_update_date?>" readonly="readonly"   id="update_date<?php echo $record->id;?>"   <?=$validation?> />
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-purple w-md m-b-5" name="register" id="register" value="register">
                                                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$button?></button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end  -->
                    <div class="modal fade" id="modal-info<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><div style="color:red;" ><?php echo $record->process_title;?> </div></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <label class="label label-green  half">من فضلك اذكر السبب</label>
                            <textarea   class="form-control half  reason<?php echo $record->mother_national_num;?>" style="width: 100%;" rows="4" data-validation="required" >
                        </textarea>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 20px !important;">
                                        <?php if(isset($file_status)&&!empty($file_status)) {
                                            foreach ($file_status as $row) {
                                                ?>
                                                <div class="col-md-3">
                                                    <button value="<?php echo $row->id;?>" onclick="change_status($(this).val(),$(this).attr('title'),$(this).attr('mom'));" style="background-color:<?php echo $row->color;?>;"
                                                            title="<?php echo $row->title;?>"
                                                            mom="<?php echo $record->mother_national_num;?>"
                                                            class="btn btn-sm btn-info status">
                                                        </i> <?php echo $row->title;?>
                                                    </button>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-process-procedure-<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-success" role="document"  style="width: 80%">
                            <div class="modal-content">
                                <?php echo  form_open_multipart("TransformationProcess/TransformationOfRegester/3/".$record->mother_national_num);?>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div style="" >احالة الملف  </div>
                                    </h5>
                                </div>
                                <div class="modal-body ">
                                    <div class="col-sm-12">
                                        <input type="hidden" name="family_file" value="<?=$record->mother_national_num;?>" />
                                        <div class="col-sm-6">
                                            <label class="label label-green  half"> الإدارة </label>
                                            <select name="" class="form-control half selectpicker"
                                                    onchange="get_emp(this.value,'<?php echo $record->id;?>');" data-validation="required"
                                                    aria-required="true" data-show-subtext="true" data-live-search="true">
                                                <option value="">اختر</option>
                                                <?php echo $all_adminastration;?>
                                            </select>
                                        </div>
                                        <!--  <div class="col-sm-4">
                                            <label class="label label-green  half"> القسم </label>
                                            <select name="" id="departments-<?php //  echo $record->id;?>" onchange="get_emp(this.value ,'<?php echo $record->id;?>' );"
                                                    class="form-control half selectpicker" data-validation="required"
                                                    aria-required="true" data-show-subtext="true" data-live-search="true">
                                                <option value="">إختر الإدارة أولا</option>
                                            </select>
                                        </div> -->
                                        <div class="col-sm-6">
                                            <label class="label label-green  half"> الموضف </label>
                                            <select name="user_to" id="user_to-<?php echo $record->id;?>" class="form-control half selectpicker"
                                                    data-validation="required" aria-required="true" data-show-subtext="true"
                                                    data-live-search="true">
                                                <option value="">إختر الإدارة أولا</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label label-green  half">  الاجراء  </label>
                                        <select class="form-control half " name="process_procedure_id_fk" data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php if(isset($select_process_procedures)&&!empty($select_process_procedures)) {
                                                foreach ($select_process_procedures as $row_process_procedures) {?>
                                                    <option value="<?=$row_process_procedures->id?>"><?=$row_process_procedures->title?></option>
                                                <?php }
                                            }?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label label-green  half" >ملاحظات: </label>
                                        <textarea class="form-control half input-style"  rows="3" name="reason"  data-validation="required"  ></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer" style="display: inline-block; width: 100%;">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" name="go" value="<?php echo $record->id;?>" class="btn btn-warning">حفظ </button>
                                </div>
                                <?php  echo form_close()?>
                            </div>
                        </div>
                    </div>
                    <!--------------------------------------------------------------------->
                    <div class="modal fade" id="modal-link-family-<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <?php echo  form_open_multipart("family_controllers/Family/AddRelations/$record->mother_national_num");?>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div style="color:red;" >ربط الاسرة</div>
                                    </h5>
                                </div>
                                <div class="modal-body row">
                                    <div class="col-sm-12">
                                        <?php
                                        // print_r($employees_data);
                                        ?>
                                        <label class="label label-green  half">  اختار الموظف  </label>
                                        <input type="hidden" name="data[mother_national_id_fk]" value="<?=$record->mother_national_num;?>" />
                                        <select name="data[emp_id_fk]" class="form-control half  selectpicker"
                                                data-validation="required" aria-required="true" data-show-subtext="true"
                                                data-live-search="true">
                                            <option value="">اختر</option>
                                            <?php if(isset($employees_data)&& !empty($employees_data)) {
                                                foreach ($employees_data as $row_user) {
                                                    $selected= '' ;
                                                    if($row_user->id == $record->researcher_id){
                                                        $selected=  'selected' ;
                                                    }
                                                    ?>
                                                    <option value="<?=$row_user->id ?>" <?=$selected?>>
                                                        <?= $row_user->employee ?></option>
                                                <?php }
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" name="go" value="<?php echo $record->id;?>" class="btn btn-warning">حفظ </button>
                                </div>
                                <?php  echo form_close()?>
                            </div>
                        </div>
                    </div>
                <?php endforeach;  ?>
            <?php endif; ?>
            <!---------------------------->



            <?php
            if(isset($records)&& $records!=null){ foreach ($records as $record){ ?>


                <div class="modal fade" id="modal-files-<?php echo $record->mother_national_num;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-success" role="document" style="width: 80%">
                        <form  method="post" action="<?php echo base_url();?>family_controllers/Family/add_required_files/<?php echo $record->mother_national_num;?>">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">الملفات المطلوبة</h5>

                                </div>
                                <div class="modal-body">
                                    <div class="piece-box no-border ">
                                        <div class="piece-heading">
                                            <div class="col-xs-4">
                                                <h5>رقم الطلب : <?php echo $record->id; ?></h5>
                                            </div>
                                            <div class="col-xs-5 ">

                                            </div>
                                            <div class="col-xs-3">
                                                <h5>التاريخ : <?=date('Y-m-d')?></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix">

                                    </div><br>

                                    <table id="" class="table table-striped table-bordered" >
                                        <thead>
                                        <tr>
                                            <th class="piece-heading">بيانات الاسرة</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>اسم الاسرة / <?php echo $record->father_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td>السجل المدني /   <?php echo $record->mother_national_num; ?></td>
                                        </tr>


                                        </tbody>
                                    </table>
                                    <br>
                                    <br>
                                    <?php if(isset($main_attach_files) && !empty($main_attach_files) ){?>
                                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <td>م</td>
                                                <td>نوع الطلب</td>
                                                <td>حالة الطلب</td>
                                                <td>ملاحظات</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $status = array('غير نشط','نشط'); $y=1;
                                            //                                    echo "<pre>";
                                            //                                    print_r($record->required_files[$file_row->id_setting]);
                                            //                                    echo "</pre>";
                                            foreach ($main_attach_files  as $file_row){?>
                                                <tr>
                                                    <td><input type="checkbox"
                                                            <?php
                                                            if(isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])){
                                                                if( $record->required_files[$file_row->id_setting]->doc_id_fk ==$file_row->id_setting){
                                                                    echo 'checked';
                                                                }}
                                                            ?>
                                                               name="doc_id_fk[]" value="<?=$file_row->id_setting?>" class="form-control half"  /></td>
                                                    <td><?=$file_row->title_setting?></td>
                                                    <td>

                                                        <select name="doc_status_fk[]"
                                                                class=" no-padding form-control"
                                                                aria-required="true">
                                                            <option value="">اختر</option>
                                                            <?php foreach ($status as $key=>$value){ ?>
                                                                <option value="<?=$key?>"
                                                                    <?php
                                                                    if(isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])){
                                                                        if( $record->required_files[$file_row->id_setting]->doc_status_fk ==$key){
                                                                            echo 'selected';
                                                                        }}
                                                                    ?>
                                                                ><?=$value?></option>
                                                            <?php } ?>
                                                        </select>

                                                    </td>
                                                    <td>
                                                        <input type="text" value="<?php
                                                        if(isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])){

                                                            echo $record->required_files[$file_row->id_setting]->doc_notes;
                                                        }
                                                        ?>" name="doc_notes[]" class="form-control half"  />

                                                    </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    <?php }?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                    <button type="submit" name="go_submit" value="go_submit" class="btn btn-warning">حفظ </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <?php }} ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(function($){
        $(".date_as_mask").mask("99/99/9999");
    });
</script>
<script>
    function check_num(){
        var national_id_type =$('#national_id_type').val();
        var dataString =  "chek_mother_national_num=" + $("#mother_national_num").val();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/CheckNationalNum',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                if(html == "1"){
                    $("#mother_national_num").css("border-color" , "red");
                    $("#result_span_num").html("رقم السجل مسجل من قبل ");
                    $('button[type="submit"]').attr("disabled","disabled");
                }else {
                    //---------------
                    if($("#mother_national_num").val().length != 10   ){
                        $("#mother_national_num").css("border-color" , "red");
                        if(national_id_type !=0){
                            $("#result_span_num").html("الرقم مكون من"  +10+"أرقام" );
                        }
                        $('button[type="submit"]').attr("disabled","disabled");
                    }else{
                        $("#mother_national_num").css("border-color" , "green");
                        $("#result_span_num").html("");
                        $('button[type="submit"]').removeAttr("disabled");
                    }
                    //---------------
                }
            }
        });
    }
</script>
<script>
    function check_length_num(this_input,max_lenth,span_id) {
        if($(this_input).val().length != max_lenth   ){
            $(this_input).css("border-color" , "red");
            $("#"+span_id).html("الرقم مكون من"  +max_lenth+"أرقام" );
            $('button[type="submit"]').attr("disabled","disabled");
        }else{
            $(this_input).css("border-color" , "green");
            $("#"+span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>
<script>
    function valid_pass_length()
    {
        if($("#user_password").val().length < 4){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور اكثر من اربع حروف';
            $('button[type="submit"]').attr("disabled","disabled");
        }else if($("#user_password").val().length > 4 &&  $("#user_password").val().length < 10){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور ضعيفة';
            $('button[type="submit"]').attr("disabled","disabled");
        }else if($("#user_password").val().length > 10){
            document.getElementById('validate_length').style.color = '#00FF00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور قوية';
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
    function valid_pass_copy()
    {
        if($("#user_password").val() == $("#user_password_copy").val()){
            document.getElementById('validate_copy').style.color = '#00FF00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور متطابقة';
            $('button[type="submit"]').removeAttr("disabled");
        }else{
            document.getElementById('validate_copy').style.color = '#F00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور غير متطابقة';
            $('button[type="submit"]').attr("disabled","disabled");
        }
    }
</script>
<script>
    function get_department(id_admin,id_pop) {
        if (id_admin != 0 && id_admin != "") {
            var dataString = "get_depart=" + id_admin;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_details/GetDepart',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#departments-"+id_pop).html(html);
                    $("#departments-"+id_pop).selectpicker("refresh");
                }
            });
        }
    }
    //=============================================
    function get_emp(id_depart,id_pop) {
        if (id_depart != 0 && id_depart != "") {
            var dataString = "get_emp=" + id_depart;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_details/GetDepart',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#user_to-"+id_pop).html(html);
                    $("#user_to-"+id_pop).selectpicker("refresh");
                }
            });
        }
    }
</script>
<script>
    function getFamilyNumber() {
        if ($('#male_number').val() > 0) {
            var males = parseInt($('#male_number').val());
        } else {
            var males = 0;
        }
        if ($('#female_number').val() > 0) {
            var females = parseInt($('#female_number').val());
        } else {
            var females = 0;
        }
        var all = males + females;
        $('#family_members_number').val(all);
    }
</script>
<script>
    function getRent() {
        var building_type = $("#building_type").val();
        if (building_type === 'rent') {
            document.getElementById("h_rent_amount").removeAttribute("disabled", "disabled");
            document.getElementById("h_rent_amount").setAttribute("data-validation", "required");
        } else {
            document.getElementById("h_rent_amount").value = "";
            document.getElementById("h_rent_amount").setAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function get_sub_select(this_value,sub_id){
        if(this_value !="" && this_value!=0){
            var dataString =  "get_sub_id=" + this_value;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Family/GetArea',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#"+sub_id).html(html);
                    $("#"+sub_id).selectpicker("refresh");
                }
            });
        }
    }
</script>
<script>
    function get_num_fk(pass_value){
        var option_name=$("#person_relationship option:selected").text();
        if(pass_value =="41"){
            $("#person_national_card").val($("#mother_national_num").val());
        }else if(option_name == "أم"){
            $("#person_national_card").val($("#mother_national_num").val());
        }else{
            $("#person_national_card").val("");
        }
    }
</script>
<script>
    function GetNationalidType(national_type) {
        if( national_type !=''){
            document.getElementById("mother_national_num").removeAttribute("disabled","disabled");
            if( national_type === '0'){
                document.getElementById("mother_national_num").removeAttribute("maxlength");
                document.getElementById("mother_national_num").setAttribute("onkeyup", "check_num();");
                document.getElementById("result_span_num").html("");
            } else {
                document.getElementById("mother_national_num").setAttribute("maxlength", "10");
                document.getElementById("mother_national_num").setAttribute("onkeyup", "check_num();check_length_num(this,10,'result_span_num');");
            }
        } else {
            document.getElementById("mother_national_num").setAttribute("disabled","disabled");
        }
    }
</script>

<script>
    function add_row_member(){
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/getFamilyMembers',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#resultTable").append(html);
            }
        });
    }
    //--------
    //-----------------------------------------------
</script>
<script>
    function check_length_num(this_input, max_lenth) {
        if ($("member_card_num_span").val().length != max_lenth) {
            $("member_card_num_span").css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            $('button[type="submit"]').attr("disabled", "disabled");
        } else {
            $("member_card_num_span").css("border-color", "green");
            $("#" + span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
    function deleteRow(id){
        $("#" + id).remove();
        var x = document.getElementById('resultTable');
        alert(x.rows.length);
        $("#resultTable").html('<tr><td colspan="9" style="text-align: center;color: red"> لا يوجد أبناء  </td> </tr>');
    }




</script>


<!----------------------------------osama---------------------------->

<script>
    function add_row_attach(number_attach){
        $("#table_attach_files").show();
        var count_value = $("#count_row").val();
        $("#frist_one").remove();
        var x = document.getElementById('table_attach_files');
        var len_tab1 = x.rows.length;
        len=len_tab1;

        if(len_tab1>=number_attach)
        {
            alert("عفوا تمت اضافه جميع المرفقات");
            return;
        }



        var valu=[];
        $(".attached_files").each(function () {
            if($(this).val()!='')
            {

              //  $('.needed').addClass('nonactive');
                valu.push($(this).val());

            }
        })



        var dataString  = 'add_row=1&valu='+valu ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/AddNewRegister',
            data:dataString,
            cache:false,
            success: function(html){

                var inputs = document.getElementsByClassName( 'needed' ),
                    names  = [].map.call(inputs, function( input ) {
                        return input.value;
                    });


              /*  var i;

                for (i = 0; i < names.length; i++) {
                    if(names[i] == '')
                    {
                        $('.needed').validate();
                        return false;
                    }

                }
*/
    var i;
                    var foll= [];
                    for (i = 0; i < names.length; i++) {
                        if(names[i] != '')
                        {
                            foll[i]=1;
                        }else if(names[i] == '') {

                          $('.needed').validate();
                          return false;
                        }

                    }


                    if(names.length ==  foll.length)
                    {
                      $(".attached_files").each(function () {
                              $('.needed').addClass('nonactive');

                      });
                    }





                $("#result_Table").append(html);
                count_value = parseFloat(count_value) + 1;
                $("#count_row").val(count_value);
                //------------------------------

                if (parseFloat($("#count_row").val()) != 0) {
                    $('input[type="submit"]').removeAttr("disabled");
                } else {
                    $('input[type="submit"]').attr("disabled", "disabled");
                }


            }
        });
        return false;
    }
    //==========================
    function delete_row(this_part){
        var count_value = $("#count_row").val();
        count_value = parseFloat(count_value) - 1 ;
        $("#count_row").val(count_value);
        $(this_part).parents('tr').remove();
        //------------------------------
        if(parseFloat( $("#count_row").val() )  > 0){
            $('input[type="submit"]').removeAttr("disabled");
        }else {
            $('input[type="submit"]').attr("disabled","disabled");
        }
        //------------------------------
    }
</script>

