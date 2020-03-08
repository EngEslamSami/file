<style>
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
</style>
<?php
if(isset($result) && $result!=null){
    $form= form_open_multipart("family_controllers/Family/update_basic/".$result->id);
    $mother_national_num=$result->mother_national_num;
    $user_name=$result->user_name;
    $mother_mob=$result->mother_mob;
    $register_place = $result->register_place;
    $validation ='';
    $button ='تعديل ';
    $update_date = $result->file_update_date;
    $peroid_update  = $result->peroid_update;
    /***************zidan*/
    $bank_account_num=$result->bank_account_num;
    //  $file_num=$file_num+1;
    $date= $result->date_suspend;
    /***************zidan*/
    $bank_ramz = $result->bank_ramz;
    /***************ahmed*/
    $person_response=$result->person_response;
    $person_account=$result->person_account;
    $agent_name=$result->agent_name;
    $agent_card=$result->agent_card;
    $agent_mob=$result->agent_mob;
    $agent_relationship=$result->agent_relationship;
    $agent_bank_account=$result->agent_bank_account;
    $bank_account_id=$result->bank_account_id;
    $agent_card_source=$result->agent_card_source;
    $disabl = 'disabled';
    $opption_select = ' <option value="0">اختر</option>';
    /***************ahmed*/
}else{
    $form= form_open_multipart("family_controllers/Family/Add_Register_2");
    $mother_national_num="";
    $user_name='';
    /***************zidan*/
    //  $file_num="0";
    $date= '';
    /***************zidan*/
    $mother_mob='';
    $validation ='';//data-validation="required"
    $button ='حفظ';
    $disabl = '';
    /***************ahmed*/
    $bank_account_num='';
    $person_response='';
    $person_account='';
    $agent_name='';
    $agent_card='';
    $agent_mob='';
    $agent_relationship='';
    $agent_bank_account='';
    $bank_account_id='';
    $agent_card_source='';
    /***************ahmed*/
    $register_place ='';
    $bank_ramz = '';
    $update_date = '';
    $peroid_update ='';
    $opption_select ='';
} 

?>
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php  echo $title?> </h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">مقدم الطلب عن طريق الأم </a></li>
                    <li class=""><a href="#tab2" data-toggle="tab">طلب وكيل الأسرة</a></li>
                </ul>
                <!-- Tab panels -->
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tab1">
                        <div class="panel-body">
                            <?php echo $form;?>
                            <div class="col-sm-12">
                                <h6 class="text-center inner-heading"> البيانات الاساسية </h6>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <!--
                <div class="form-group col-sm-4 col-xs-12">
                    <?php $arr_response =array('أم','وكيل');?>
                    <label class="label label-green  half">مقدم الطلب</label>
                    <?php  for ($d=0;$d<sizeof($arr_response);$d++){ $check=''; if($person_response ==$d){$check='checked';}?>
                    <input tabindex="11" type="radio" value="<?php echo $d;?>" <?php echo $disabl;  ?> name="person_response" style="margin-right: 10px" onclick="getPerson_response(<?php echo $d;?>);" <?php echo $check;?>>
                    <label for="square-radio-1"><?php echo $arr_response[$d];?></label>
                    <?php } ?>
                </div>
                   <div class="form-group col-sm-4 col-xs-12">
               <label class="label label-green  half"> رقم الملف  <strong class="astric">*</strong> </label>
                <input type="text" readonly="readonly" class="form-control half input-style"  name="file_num" value="<?php echo $file_num;?>"
                 id="file_num"   <?=$validation?> />
                </div>
                <div class="form-group col-sm-4 col-xs-12" <?php if($mother_national_num=='' &&empty($mother_national_num)){?> style="display: none;" <?php } ?>>
                    <label class="label label-green  half"> تاريخ اعتماد الملف  <strong class="astric">*</strong> </label>
                    <input type="date" class="form-control half input-style "  name="date_suspend" value="<?php echo $date;?>"   id="date_suspend"   name="date_suspend"  <?=$validation?> />
                </div>
                <div class="form-group col-sm-4 col-xs-12" <?php if($mother_national_num=='' &&empty($mother_national_num)){?> style="display: none;" <?php } ?> >
                    <label class="label label-green  half"> فتره التحديث <strong class="astric">*</strong> </label>
                  <select id="peroid_update" name="peroid_update" class="form-control half input-style" onchange="get_peroid($(this).val());">
                     <?php echo $opption_select; ?>
                        <?php
                                if(isset($all_options)&&!empty($all_options)) {
                                    foreach ($all_options as $row2):
                                        $selected='';if($row2->id == $peroid_update){$selected='selected';}	?>
                        <option value="<?php  echo $row2->num_of_day;?>" <?php echo $selected?> >
                           <?php  echo $row2->title;?></option>
                        <?php  endforeach; } ?>
                      <?php
                                /*
                                if(isset($all_options)&&!empty($all_options)) {
                                    foreach ($all_options as $row) {
                                        ?>
                                        <option value="<?php echo $row->num_of_day;?>"> <?php echo $row->title;?> </option>
                                        <?php
                                    }
                                }*/
                                ?>
                  </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12" <?php
                                if($mother_national_num=='' &&empty($mother_national_num)){?> style="display: none;" <?php } ?>>
                    <label class="label label-green  half"> تاريخ التحديث<strong class="astric">*</strong> </label>
                    <input type="date" class="form-control half input-style"  name="update_date"
                     value="<?= $update_date?>" readonly="readonly"
                       id="update_date"   <?=$validation?> />
                </div>
                -->
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half"> رقم السجل المدني  <strong class="astric">*</strong> </label>
                                    <input type="text" class="form-control half input-style"  name="mother_national_num"
                                           value="<?= $mother_national_num?>"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                           id="mother_national_num" onkeyup="return pass_name();" onkeypress="validate_number(event)" <?=$validation?> />
                                    <span  id="optia2"  > </span>
                                    <span  id="lenth" class="span-validation"> </span>
                                </div>
                                <!-- 
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">إسم المستخدم <strong class="astric">*</strong> </label>
                                    <input  type="text" id="user_name" value="<?=$user_name?>"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?> class="form-control half input-style" placeholder="إسم المستخدم" name="user_name" readonly="readonly"/>
                                    <span  id="lenth" class="span-validation"> </span>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">كلمة المرور <strong class="astric">*</strong> </label>
                                    <input type="password" id="user_pass" class="form-control half input-style"
                                        <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                           name="user_password" onkeyup="return valid();"  <?=$validation?> />
                                    <span  id="validate1" class="span-validation"> </span>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">تاكيد كلمة المرور <strong class="astric">*</strong><strong></strong> </label>
                                    <input type="password"   id="user_pass_validate" class="form-control half input-style"  name=""
                                           onkeyup="return valid2();"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>  <?=$validation?> />
                                    <span  id="validate" class="span-validation"> </span>
                                </div>
                                -->
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">رقم الجوال <strong class="astric">*</strong> </label>
                                    <input type="text"  name="mother_mob" maxlength="10" id="mother_mob" value="<?=$mother_mob?>"  onkeyup="chek_len_mother_mob($(this).val());" onkeypress="validate_number(event)"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>   class="form-control half input-style "  <?=$validation?>/>
                                    <span  id="lenth_mob" class="span-validation"></span>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">مقر التسجيل ( الفرع )<strong class="astric">*</strong></label>
                                    <select name="register_place" class="selectpicker no-padding form-control choose-date form-control half"
                                        <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                            data-show-subtext="true" data-live-search="true"  <?=$validation?>  aria-required="true">
                                        <option value=""> اختر</option>
                                        <?php
                                        foreach ($socity_branch as $row2):
                                            $selected='';if($row2->id == $register_place){$selected='selected';}	?>
                                            <option value="<?php  echo $row2->id;?>" <?php echo $selected?> ><?php  echo $row2->title;?></option>
                                        <?php  endforeach;?>
                                    </select>
                                </div>
                             <!--
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
                                    <select name="person_account" id="person_account"  <?php if($mother_national_num==''){?>
                                        data-validation="required" <?php }?>  onchange="checkPerson_account();" class="form-control half">
                                        <?php $yes_no=array('لا','نعم');?>
                                        <option value="">إختر</option>
                                        <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $person_account==$s){$select='selected'; }?>
                                            <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">إسم البنك<strong class="astric">*</strong><strong></strong> </label>
                                    <select name="bank_account_id" id="bank_account_id1" disabled="disabled"
                                        <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                            class="form-control half   "  <?php if($person_account==0){?> <?php } ?>
                                            onchange="get_banck_code($(this).val())">
                                        <option value="">إختر</option>
                                        <?php
                                        if(!empty($banks)){
                                            foreach ($banks as $bank){  $select=''; if($agent_bank_account ==0 &&
                                                $bank_account_id == $bank->id){$select='selected'; }?>
                                                <option value="<?php echo $bank->id;?>-<?php echo $bank->bank_code;?>"
                                                    <?php echo $select;?>><?php echo $bank->ar_name;?></option>
                                            <?php }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12" >
                                    <label class="label label-green  half">رمز البنك<strong class="astric">*</strong> </label>
                                    <input type="text" class="form-control half input-style"
                                           name="bank_ramz" readonly="readonly"   id="om_bank_code"    />
                                </div>
                                <div class="form-group col-sm-4 col-xs-12" >
                                    <label class="label label-green  half">رقم الحساب<strong class="astric">*</strong> </label>
                                    <input type="text" class="form-control half input-style"maxlength="24" minlength="24"
                                           <?php if($person_account==1){?>value="<?= $bank_account_num?>" <?php } ?>
                                           name="wakeel_bank_num"  id="om_bank_num" onfocusout="length_hesab_om($(this).val());"
                                        <?php if($person_account == 1 ){?>   <?php }else{ ?>  disabled="disabled" <?php } ?>
                                    />
                                    <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                                </div>
                                
                                -->
                                <!--             ahmed   -->
                            </div>
                            <!--------------------ahmed---------------->
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-purple w-md m-b-5" name="register" id="register" value="register">
                                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$button?></button>
                            </div>
                            <?php  echo form_close()?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        <div class="panel-body">
                            <!---------------------- الوكيل  -------------------->
                            <?php echo $form;?>
                            <div class="col-sm-12">
                                <h6 class="text-center inner-heading"> البيانات الاساسية </h6>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> رقم السجل المدني  <strong class="astric">*</strong> </label>
                                        <input type="text" class="form-control half input-style"
                                               name="mother_national_num"    value="<?= $mother_national_num?>"
                                            <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                               id="mother_national_num_2"  onkeypress="validate_number(event)"
                                            <?=$validation?> />
                                        <span  id="optia2"  > </span>
                                        <span  id="lenth_2" class="span-validation"> </span>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">كلمة المرور <strong class="astric">*</strong> </label>
                                        <input type="password" id="user_pass_2" class="form-control half input-style"
                                            <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                               name="user_password" onkeyup="return valid3();"  <?=$validation?> />
                                        <span  id="validate2" class="span-validation"> </span>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">تاكيد كلمة المرور <strong class="astric">*</strong><strong></strong> </label>
                                        <input type="password"   id="user_pass_validate_2" class="form-control half input-style"  name=""
                                               onkeyup="return valid4();"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>  <?=$validation?> />
                                        <span  id="validate3" class="span-validation"> </span>
                                    </div>
                                    <!--
                  <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الجوال <strong class="astric">*</strong> </label>
                  <input type="text"  name="mother_mob" maxlength="10" id="mother_mob_2" value="<?=$mother_mob?>"  onkeyup="chek_len_mother_mob($(this).val());" onkeypress="validate_number(event)"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>   class="form-control half input-style "  <?=$validation?>/>
                  <span  id="lenth_mob" class="span-validation"></span>
                </div>
                -->
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">مقر التسجيل ( الفرع )<strong class="astric">*</strong></label>
                                        <select name="register_place" class="selectpicker no-padding form-control choose-date form-control half"
                                            <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                                data-show-subtext="true" data-live-search="true"  <?=$validation?>  aria-required="true">
                                            <option value=""> اختر</option>
                                            <?php
                                            foreach ($socity_branch as $row2):
                                                $selected='';if($row2->id == $register_place){$selected='selected';}	?>
                                                <option value="<?php  echo $row2->id;?>" <?php echo $selected?> ><?php  echo $row2->title;?></option>
                                            <?php  endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">إسم الوكيل<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="agent_name"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                               id="agent_name" class="form-control half input-style "
                                               value="<?php echo $agent_name;?>"
                                            <?php if($person_response ==0){?> <?php }?>/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="agent_card" id="agent_card"  maxlength="10"
                                               minlength="10"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                               class="form-control half input-style "
                                               onkeyup="chek_length('agent_card')"
                                               onkeypress="validate_number(event)"
                                               value="<?php echo $agent_card;?>" <?php if($person_response ==0){?>
                                        <?php }?> />
                                        <span  id="agent_card_span" class="span-validation"> </span>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
                                        <select name="agent_card_source" id="agent_card_source"
                                            <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                                class="form-control half"   <?php if($person_response ==0){?><?php }?>
                                        >
                                            <option value="">إختر</option>
                                            <?php if(!empty($id_source)){
                                                foreach ($id_source as $record){
                                                    $select=''; if($agent_card_source==$record->id_setting){$select='selected'; }
                                                    ?>
                                                    <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>>
                                                        <?php echo $record->title_setting;?></option>
                                                <?php  } } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">صلة القرابة<strong class="astric">*</strong><strong></strong> </label>
                                        <select name="agent_relationship"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                                id="agent_relationship" class="form-control half"   <?php if($person_response ==0){?> <?php }?>>
                                            <option value="">إختر</option>
                                            <?php if(!empty($relationships)){ foreach ($relationships as $record){
                                                $select=''; if($agent_relationship==$record->id_setting){$select='selected'; }
                                                ?>
                                                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                                            <?php  } } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم الجوال<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="agent_mob" maxlength="10" <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                               id="agent_mob" onkeyup="chek_length('agent_mob'),checkNumbers(this.value)"
                                               onkeypress="validate_number(event)" <?php if($person_response ==0){?>  <?php }?> class="form-control half input-style "  value="<?php echo $agent_mob;?>"/>
                                        <span  id="agent_mob_span" class="span-validation"> </span>
                                    </div>
                                    
                                    <!--
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
                                        <select name="agent_bank_account"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                                id="agent_bank_account" class="form-control half "
                                                onchange="checkAgent_bank_account();" <?php if($person_response ==0){?> <?php }?>>
                                            <?php $yes_no=array('لا','نعم');?>
                                            <option value="">إختر</option>
                                            <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if($agent_bank_account==$s){$select='selected'; }?>
                                                <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">إسم البنك<strong class="astric">*</strong><strong></strong> </label>
                                        <select name="bank_account_id"  disabled="disabled"    <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                                                id="bank_account_id2" class="form-control half" <?php if($agent_bank_account == 0){?> <?php } ?> onchange="get_banck_code_wakeel($(this).val())">
                                            <?php $yes_no=array('لا','نعم');?>
                                            <option value="">إختر</option>
                                            <?php  if(!empty($banks)){
                                                foreach ($banks as $bank){ $select=''; if($person_account == 0 &&  $bank_account_id == $bank->id){$select='selected'; }?>
                                                    <option value="<?php echo $bank->id;?>-<?php echo $bank->bank_code;?>" <?php echo $select;?>>
                                                        <?php echo $bank->ar_name;?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12" >
                                        <label class="label label-green  half">رمز البنك<strong class="astric">*</strong> </label>
                                        <input type="text" class="form-control half input-style"  name="bank_ramz"
                                               value="<?= $mother_national_num?>" readonly="readonly"   id="wakeel_bank_code"    />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12" >
                                        <label class="label label-green  half">رقم الحساب<strong class="astric">*</strong> </label>
                                        <input type="text"  maxlength="24" minlength="24"  disabled="disabled"  class="form-control half input-style"
                                               name="wakeel_bank_num"<?php if($person_account==0){?>value="<?= $bank_account_num?>" <?php } ?>
                                               id="wakeel_bank_num"   onfocusout="length_hesab_wakeel($(this).val());"  />
                                        <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                                    </div>
                                    -->
                                </div>
                                <!--------------------ahmed---------------->
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-purple w-md m-b-5" name="register" id="register" value="register_wakel">
                                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$button?></button>
                                </div>
                                <?php  echo form_close()?>
                                <!------------------------------------------------------>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        
                                      <th class="text-center">إسم الأم- الوكيل</th>
                                      <th class="text-center">هوية الأم - الوكيل</th>
                                  
                                  <!--  <th class="text-center">رقم الجوال</th> -->
                                    <th class="text-center">الاجراء</th>
                                    <th class="text-center">استكمال البيانات</th>
                              <!-- <th class="text-center">إجراءات علي الملف</th> 
                                    <th class="text-center">رأي الباحث</th>
                                    <th class="text-center"> حاله الملف </th>
                                    <th class="text-center">إجراءات حالات الملف</th>
                                    <th class="text-center">تحديث الملف </th> -->
                                    <th class="text-center">طباعه الملف</th>
                                  <!--  <th class="text-center">ربط الاسرة بالباحثين</th> -->
                                    <th class="text-center">تحويل الملف </th> 
                                </tr>
                                </thead>
                          <tbody class="text-center">
                                <?php  $x=1; foreach ($records as $record ):?>
                                    <tr>
                                        <td><?php echo $x++ ?></td>
                                          <td><?php echo $record->id; ?></td>
                                           <td><?php echo $record->father_name; ?></td>
                                            <td><?php echo $record->father_national; ?></td> 
                                        
                                        <td><?php if($record->mother_name != ''){ echo $record->mother_name; }else{
                                                echo '<button type="button" class="btn btn-warning w-md m-b-5"> إستكمل البيانات</button>'; }   ?> </td>
                                     <td><?php echo $record->mother_national_num; ?></td>        
                                        <!--<td><?php echo $record->mother_mob; ?></td> -->
                                        <td> <a href="<?php echo base_url('family_controllers/Family/update_register_2').'/'.$record->id?>">
                                                <i class="fa fa-pencil " aria-hidden="true"></i> </a>
                                            <a href="<?php echo  base_url('family_controllers/Family/delete_basic').'/'.$record->mother_national_num ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
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
<li><a target="_blank"  href="<?php echo base_url();?>family_controllers/Family/mother/<?php echo $record->mother_national_num;?>">بيانات الأم - الوكيل  </a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/father/<?php echo $record->mother_national_num;?>">بيانات الأب  </a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/family_members/<?php echo $record->mother_national_num;?>/<?php echo $record->person_account;?>/<?php echo $record->agent_bank_account;?>">بيانات أفراد الأسرة</a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/house/<?php echo $record->mother_national_num;?>">بيانات السكن</a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/devices/<?php echo $record->mother_national_num;?>">محتويات السكن </a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/home_needs/<?php echo $record->mother_national_num;?>"> إحتياجات الأسرة </a></li>

<li>
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/money/<?php echo $record->mother_national_num;?>">مصادر الدخل والإلتزامات </a>
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
<td><a href = "<?php echo base_url('family_controllers/Family_details/print_family').'/'.$record->mother_national_num ?>" target = "_blank" >
        <i class="fa fa-print" aria-hidden = "true" ></i > </a>
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
            class="fa fa-list btn-info"></i>   تحويل الملف
    </button>
</td>
   

                                            
                                    </tr>
                                  <?php endforeach;  ?>
                          </tbody>
                </table>
            </div>
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
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <?php echo  form_open_multipart("TransformationProcess/TransformationOfRegester/3/".$record->mother_national_num);?>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div style="color:red;" >احالة الملف  </div>
                                    </h5>

                                </div>
                                <div class="modal-body row">
                                    <div class="col-sm-12">
                                        <label class="label label-green  half">  الى  </label>
                                        <input type="hidden" name="family_file" value="<?=$record->mother_national_num;?>" />
                                      
                                        <select name="user_to" class="form-control half selectpicker" data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                                            <option value="">اختر</option>
                                            <?php if(isset($select_user)&&!empty($select_user)) {
                                            foreach ($select_user as $row_user) {
                                                   $out_name=  $row_user->user_name ;
                                                  if($row_user->role_id_fk == 3){
                                                  $out_name=  $row_user->employee ;
                                                  }
                                                  ?>
                                            <option value="<?=$row_user->user_id."-".$row_user->role_id_fk."-".$row_user->system_structure_id_fk?>">
                                            <?=$out_name?></option>
                                            <?php }
                                                  }?>
                                          </select>
                                    </div>
                                    <div class="col-sm-12">
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
                            <div class="col-sm-12">
                            <label class="label label-green  half" >ملاحظات: </label>
                            <textarea class="form-control half input-style"  rows="3" name="reason"  data-validation="required"  ></textarea>
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
        </div>
    </div>
</div>
<script>
    function get_banck_code(valu)
    {
        var valu=valu.split("-");
        $('#om_bank_code').val(valu[1]);
    }
    function get_banck_code_wakeel(valu2)
    {
        var valu2=valu2.split("-");
        $('#wakeel_bank_code').val(valu2[1]);
    }
</script>
<script>
    /*
     function chek_length(inp_id)
     {
     var inchek_id="#"+inp_id;
     var inchek =$(inchek_id).val();
     if(inchek.length > 10){
     document.getElementById('lenth_mob').style.color = '#F00';
     document.getElementById('lenth_mob').innerHTML = 'رقم الجوال مكون من عشر ارقام';
     var inchek_out= inchek.substring(0,10);
     $(inchek_id).val(inchek_out);
     }
     }
     */
    function length_hesab_om(length) {
        var len=length.length;
        if(len<24){
            alert(" رقم الحساب لابد الايقل عن 24 حرف او رقم");
        }
        if(len>24){
            alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
        }
        if(len==24){
        }
    }
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
    function chek_length(inp_id)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(inchek_id).val();
        if(inchek.length < 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);
        }
        if(inchek.length > 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);
        }
        if(inchek.length == 10){
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
    }
    function chek_len_mother_mob(valu)
    {
        if(valu.length < 10){
            document.getElementById("lenth_mob").style.color = '#F00';
            document.getElementById("lenth_mob").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $('#mother_mob').val(inchek_out);
        }
        if(valu.length > 10){
            document.getElementById("lenth_mob").style.color = '#F00';
            document.getElementById("lenth_mob").innerHTML = 'أقصي عدد 10 ارقام';
            var inchek_out= inchek.substring(0,10);
            $('#mother_mob').val(inchek_out);
        }
        if(valu.length == 10){
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
    }
    function valid()
    {
        if($("#user_pass").val().length < 4){
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور اكثر من اربع حروف';
        }else if($("#user_pass").val().length > 4 &&  $("#user_pass").val().length < 10){
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور ضعيفة';
        }else if($("#user_pass").val().length > 10){
            document.getElementById('validate1').style.color = '#00FF00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور قوية';
        }
    }
    function valid2()
    {
        if($("#user_pass").val() == $("#user_pass_validate").val()){
            document.getElementById('validate').style.color = '#00FF00';
            document.getElementById('validate').innerHTML = 'كلمة المرور متطابقة';
        }else{
            document.getElementById('validate').style.color = '#F00';
            document.getElementById('validate').innerHTML = 'كلمة المرور غير متطابقة';
        }
    }
    function valid3()
    {
        if($("#user_pass_2").val().length < 4){
            document.getElementById('validate2').style.color = '#F00';
            document.getElementById('validate2').innerHTML = 'كلمة المرور اكثر من اربع حروف';
        }else if($("#user_pass_2").val().length > 4 &&  $("#user_pass").val().length < 10){
            document.getElementById('validate2').style.color = '#F00';
            document.getElementById('validate2').innerHTML = 'كلمة المرور ضعيفة';
        }else if($("#user_pass_2").val().length > 10){
            document.getElementById('validate2').style.color = '#00FF00';
            document.getElementById('validate2').innerHTML = 'كلمة المرور قوية';
        }
    }
    function valid4()
    {
        if($("#user_pass_2").val() == $("#user_pass_validate_2").val()){
            document.getElementById('validate3').style.color = '#00FF00';
            document.getElementById('validate3').innerHTML = 'كلمة المرور متطابقة';
        }else{
            document.getElementById('validate3').style.color = '#F00';
            document.getElementById('validate3').innerHTML = 'كلمة المرور غير متطابقة';
        }
    }
    function pass_name(){
        //-----------------------------------------------------
        var num =$("#mother_national_num").val();
        $("#user_name").val(num);
        if($("#mother_national_num").val().length < 10){
            document.getElementById('lenth').style.color = '#F00';
            document.getElementById('lenth').innerHTML = 'إسم المستخدم مكون من عشر ارقام';
        }else if($("#mother_national_num").val().length > 10){
            var mother_new=num.substring(0,10);
            $("#mother_national_num").val(mother_new);
            $("#user_name").val(mother_new);
            document.getElementById('lenth').innerHTML = '';
        }
        //-------------------------------------------------------
        var user_username=$('#mother_national_num').val();
        if(user_username != "" &&  user_username !=0 &&  user_username.length >= 10){
            var dataString ='mother_national_num_chik='+ user_username ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Family/Add_Register',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#lenth").html(html);
                    // $("#lenth_mob").css('display' , 'none');
                }
            });
        }
    }// end function
</script>
<script>
    function pass_name_2(){
        //-----------------------------------------------------
        var num_2 =$("#mother_national_num_2").val();
        $("#user_name_2").val(num_2);
        if($("#mother_national_num_2").val().length < 10){
            document.getElementById('lenth_2').style.color = '#F00';
            document.getElementById('lenth_2').innerHTML = 'إسم المستخدم مكون من عشر ارقام';
        }else if($("#mother_national_num_2").val().length > 10){
            var mother_new_2 =num_2.substring(0,10);
            $("#mother_national_num_2").val(mother_new_2);
            $("#user_name_2").val(mother_new_2);
            document.getElementById('lenth_2').innerHTML = '';
        }
        //-------------------------------------------------------
        var user_username_2 =$('#mother_national_num_2').val();
        if(user_username_2 != "" &&  user_username_2 !=0 &&  user_username_2.length >= 10){
            var dataString_2 ='mother_national_num_chik ='+ user_username_2 ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Family/Add_Register',
                data:dataString_2,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#lenth_2").html(html);
                    // $("#lenth_mob").css('display' , 'none');
                }
            });
        }
    }// end function
</script>
<script>
    function getPerson_response(valu) {
        var response =valu;
        if(response ==0){
            document.getElementById("agent_name").value="";
            document.getElementById("agent_card").value="";
            document.getElementById("agent_relationship").value="";
            document.getElementById("agent_mob").value="";
            document.getElementById("agent_card_source").value="";
            document.getElementById("agent_bank_account").value="";
            document.getElementById("bank_account_id2").value="";
            document.getElementById("agent_name").setAttribute("disabled", "disabled");
            document.getElementById("agent_card").setAttribute("disabled", "disabled");
            document.getElementById("agent_relationship").setAttribute("disabled", "disabled");
            document.getElementById("agent_mob").setAttribute("disabled", "disabled");
            document.getElementById("agent_bank_account").setAttribute("disabled", "disabled");
            document.getElementById("agent_card_source").setAttribute("disabled", "disabled");
        }
        if(response ==1){
            document.getElementById("agent_name").removeAttribute("disabled", "disabled");
            document.getElementById("agent_card").removeAttribute("disabled", "disabled");
            document.getElementById("agent_relationship").removeAttribute("disabled", "disabled");
            document.getElementById("agent_mob").removeAttribute("disabled", "disabled");
            document.getElementById("agent_card_source").removeAttribute("disabled", "disabled");
            document.getElementById("agent_bank_account").removeAttribute("disabled", "disabled");
            document.getElementById("wakeel_bank_num").removeAttribute("disabled", "disabled");
            //=====
            document.getElementById("person_account").value="";
            document.getElementById("person_account").setAttribute("disabled", "disabled");
            document.getElementById("bank_account_id1").setAttribute("disabled", "disabled");
            document.getElementById("om_bank_code").setAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").setAttribute("disabled", "disabled");
            //========
        }
    }
</script>
<script>
    function checkPerson_account() {
        var person_account =$('#person_account').val();
        if(person_account ==0){
            document.getElementById("bank_account_id1").setAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").setAttribute("disabled", "disabled");
            //  document.getElementById("om_bank_num").value="";
        }else{
            document.getElementById("bank_account_id1").removeAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").removeAttribute("disabled", "disabled");
        }
    }
    function checkAgent_bank_account() {
        var agent_bank_account =$('#agent_bank_account').val();
        var person_account =$('#person_account').val();
        if(person_account == 1){
            document.getElementById("agent_bank_account").value="";
            document.getElementById("agent_bank_account").setAttribute("disabled", "disabled");
        }else{
            if (agent_bank_account == 0) {
                document.getElementById("bank_account_id2").setAttribute("disabled", "disabled");
                // document.getElementById("bank_account_id2").value="";
                document.getElementById("wakeel_bank_num").setAttribute("disabled", "disabled");
            } else {
                document.getElementById("bank_account_id2").removeAttribute("disabled", "disabled");
                document.getElementById("wakeel_bank_num").removeAttribute("disabled", "disabled");
            }
        }
    }
</script>
<script>
    function get_peroid(value,id)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/get_date",
            data:{value:value},
            success:function(d){
                $('#update_date'+id).val(d);
            }
        });
    }
</script>
<!--
<script>
   function get_peroid(value)
   {
       $.ajax({
           type:'post',
           url:"<?php echo base_url();?>/family_controllers/Family/get_date",
           data:{value:value},
           success:function(d){
               $('#update_date').val(d);
           }
       });
   }
</script>
-->
<script>
    function change_status(process_id,title,mom)
    {
        var reason=$('.reason'+mom).val();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/change_file_status",
            data:{process_id:process_id,title:title,mom:mom,reason:reason},
            success:function(d){
                alert("تم تغيير حاله الملف");
                location.reload();
            }
        });
    }
</script>