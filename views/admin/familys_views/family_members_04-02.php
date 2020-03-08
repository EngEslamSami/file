<style>
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text {
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1 {
        background-color: #eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text {
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric {
        color: red;
        font-size: 25px;
        position: absolute;
    }
    .help-block.form-error {
        color: #a94442 !important;
        font-size: 15px !important;
        position: absolute !important;
        bottom: -23px !important;
        right: 50% !important;
    }
    .small {
        position: absolute;
        bottom: -7px;
        right: 50%;
        font-size: 10px;
    }
    .modal-backdrop.in {
        filter: alpha(opacity=50);
        opacity: 0;
        display: none;
    }
    .top_radio {
        margin-bottom: 15px;
    }
    .top_radio input[type=radio] {
        height: 30px;
        width: 30px;
        line-height: 0px;
        vertical-align: middle;
        margin-right: -36px;
        top: -5px;
    }
    .top_radio .radio, .top_radio .radio {
        vertical-align: middle;
        font-size: 20px;
        padding: 10px;
        border-bottom: 2px solid #eee;
        border-radius: 8px;
        text-align: right;
    }
    /*
    .radio label::before{
        left: auto;
        right: 0;
    }*/
    .radio input[type="radio"] {
        opacity: 1;
    }
    table .form-control {
        padding: 13px !important;
    }
</style>

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

<?php
if (isset($result) && !empty($result)) {
    $member_full_name =$result[0]->member_full_name;
    $member_status =$result[0]->member_status;
    $member_birth_date =$result[0]->member_birth_date;
    $member_birth_date_hijri =$result[0]->member_birth_date_hijri;
    $member_gender =$result[0]->member_gender;
    $member_card_num =$result[0]->member_card_num;
    $member_card_type =$result[0]->member_card_type;
    $school_id_fk=$result[0]->school_id_fk;
    $member_skill =$result[0]->member_skill;
    $education_type_result =$result[0]->education_type;
    $member_email =$result[0]->member_email;
    $stage_id_fk =$result[0]->stage_id_fk;
    $class_id_fk =$result[0]->class_id_fk;
    $school_cost =$result[0]->school_cost;
    $member_mob =$result[0]->member_mob;
    $member_distracted_mother =$result[0]->member_distracted_mother;
    $member_hij =$result[0]->member_hij;
    $member_omra =$result[0]->member_omra;
    $member_home_type =$result[0]->member_home_type;
    $member_month_money =$result[0]->member_month_money;
    $member_job =$result[0]->member_job;
    $member_job_place =$result[0]->member_job_place;
    $member_activity_type =$result[0]->member_activity_type;
    $member_account =$result[0]->member_account;
    $member_account_id =$result[0]->member_account_id;
    $education_problems=$result[0]->education_problems;
    $courses_details=$result[0]->courses_details;
    $personal_character_id_fk=$result[0]->personal_character_id_fk;
    $relation_with_family=$result[0]->relation_with_family;
    $bank_account_num=$result[0]->bank_account_num ;
    $member_disease_id_fk =$result[0]->member_disease_id_fk;
    $member_disability_id_fk =$result[0]->member_disability_id_fk;
    $member_dis_date_ar =$result[0]->member_dis_date_ar;
    $member_dis_response_status=$result[0]->member_dis_response_status;
    $member_dis_status=$result[0]->member_dis_status;
    $member_dis_reason =$result[0]->member_dis_reason;
    $member_specialization =$result[0]->member_specialization;
    $school_title =$result[0]->school_title;
//var_dump($member_activity_type); die;
    if($member_activity_type == 0){
        echo'
<script>
    document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
    document.getElementById("activity_type_other").setAttribute("data-validation", "required");
</script>';
    }else{
        echo'
<script>
    document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
</script>';
    }
    $member_activity_type_other =$result[0]->member_activity_type_other;
    $member_nationality =$result[0]->member_nationality;
    if($member_nationality == 0){
        echo'
<script>
    document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
    document.getElementById("nationality_other").setAttribute("data-validation", "required");
</script>';
    }else{
        echo'
<script>
    document.getElementById("nationality_other").setAttribute("disabled", "disabled");
</script>';
    }
    $nationality_other =$result[0]->nationality_other;
    $member_health_type =$result[0]->member_health_type;
    if($member_health_type == 0){
        echo'
<script>
    document.getElementById("health_other").removeAttribute("disabled", "disabled");
    document.getElementById("health_other").setAttribute("data-validation", "required");
</script>';
    }else{
        echo'
<script>
    document.getElementById("health_other").setAttribute("disabled", "disabled");</script>';
    }
    $member_health_type_other =$result[0]->member_health_type_other;
    $member_birth_card_img =$result[0]->member_birth_card_img;
    $member_photo=$result[0]->member_photo;
    $id =$result[0]->id;
    $member_sechool_img =$result[0]->member_sechool_img;
    echo form_open_multipart('family_controllers/Family/update_family_members/'.$mother_national_num.'/'.$id);
    $button='update';
    /**************ahmed******/
    $member_birth_date_hijri_year=$result[0]->member_birth_date_hijri_year;
    $member_relationship =$result[0]->member_relationship;
    $member_card_source =$result[0]->member_card_source;
    $member_study_case =$result[0]->member_study_case;
    $member_academic_achievement_level =$result[0]->member_academic_achievement_level;
    $member_person_type =$result[0]->member_person_type ;
    $member_education_level =$result[0]->member_education_level ;
    $member_house_check =$result[0]->member_house_check ;
    $member_house_id_fk =$result[0]->member_house_id_fk ;
//======================
    $categoriey_member=$result[0]->categoriey_member;
    $guaranteed_member=$result[0]->guaranteed_member;
    $member_dar_markz_check =$result[0]->member_dar_markz_check;
    $member_dar_markz_id_fk=$result[0]->member_dar_markz_id_fk;
    $halt_elmostafid_member=$result[0]->persons_status;
    $member_gender=$result[0]->member_gender;
    /**************ahmed******/
}else{
    $member_house_check ='';
    $member_gender="";
    $member_house_id_fk ='';
    $member_full_name ='';
    $member_status ='';
    $member_birth_date ='';
    $member_birth_date_hijri ='';
    $member_card_num ='';
    $member_card_type ='';
    $school_id_fk='';
    $member_skill='';
    $education_type_result='';
    $member_email='';
    $stage_id_fk='';
    $class_id_fk='';
    $member_job ="" ;
    $school_cost='';
    $member_mob='';
    $member_distracted_mother='';
    $member_hij='';
    $member_omra='';
    $member_home_type='';
    $member_month_money=0;
    $member_job_place='';
    $member_activity_type='';
    $member_activity_type_other='';
    $member_nationality='';
    $nationality_other='';
    $member_health_type='';
    $member_health_type_other='';
    $member_birth_card_img='';
    $id='';
    $member_sechool_img='';
    $member_account ='';
    $member_account_id ='';
    $member_photo="";
    $bank_account_num='' ;
    $member_disease_id_fk ='';
    $member_disability_id_fk ='';
    $member_dis_date_ar ='';
    $member_dis_response_status='';
    $member_dis_status='';
    $member_dis_reason ='';
    $halt_elmostafid_member ='';
    $education_problems='';
    $courses_details='';
    $personal_character_id_fk="";
    $relation_with_family="";
    echo form_open_multipart('family_controllers/Family/family_members/'.$mother_national_num);
    $button='add';
    /**************ahmed******/
    $member_birth_date_hijri_year='';
    $member_relationship ='';
    $member_card_source ='';
    $member_study_case ='';
    $member_academic_achievement_level ='';
    $member_person_type ='';
    $member_education_level ='';
//=================
    $categoriey_member='';
    $guaranteed_member='';
    $member_dar_markz_check ='';
    $member_dar_markz_id_fk='';
    $member_specialization="";
    $school_title ="";
    /**************ahmed******/
}
?>
<div class="col-sm-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $header_title;  ?>
            </h3>

        </div>
        <div class="panel-body">
            <?php $yes_no =array('','نعم','لا'); ?>
            <?php
            ?>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> رقم السجل المدني للأب <strong class="astric">*</strong>
                    </label>
                    <input type="number" class="form-control half input-style"
                           value="<?php if(!empty($father_national_card)){
                               echo $father_national_card;}?>" readonly="readonly"/>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> إسم الأب <strong class="astric">*</strong> </label>
                    <input type="text" name="father_name" class="form-control half input-style" value="       <?php if(isset($father_table[0]->full_name) && $father_table[0]->full_name != null){
                        echo $father_table[0]->full_name;}  ?>" readonly="readonly"/>
                </div>
                <!--  <div class="form-group col-sm-4 col-xs-12">
                      <label class="label label-green  half"> إسم الأم <strong class="astric">*</strong> </label>
                      <input type="text" class="form-control half input-style"
                       value="<?php // if(!empty($mothers_data[0]->full_name)){echo $mothers_data[0]->full_name;} ?>"
                       readonly="readonly" />
                  </div> -->
                <!--  <div class="form-group col-sm-4 col-xs-12">
                      <label class="label label-green  half">الصلة<strong class="astric">*</strong><strong></strong> </label>
                      <select name="member_relationship" id="member_relationship" class="form-control half" data-validation="required"  aria-required="true" >
                          <option value="">إختر</option>
                          <?php if(!empty($relationships)){
                    foreach ($relationships as  $key=>$record){
                        $select=''; if($member_relationship==$record->id_setting){
                            $select='selected'; }
                        ?>
                              <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                          <?php  } } ?>
                      </select>
                  </div> -->
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الاسم <strong class="astric">*</strong> </label>
                    <input type="text" class=" some_class_2 form-control half input-style" name="member_full_name"
                           data-validation="required" value="<?php echo $member_full_name;?>">
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الصلة<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select name="member_relationship" id="member_relationship" data-validation="required"
                            aria-required="true"
                            class="selectpicker no-padding form-control choose-date form-control half"
                    >
                        <option value="">إختر</option>
                        <?php if(!empty($relationships)){ foreach ($relationships as $record){
                            $select=''; if($member_relationship== $record->id_setting){
                                $select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>"
                                <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الحالة الإجتماعية <strong class="astric">*</strong> </label>
                    <select name="member_status" class="form-control half selectpicker " data-show-subtext="true"
                            data-live-search="true" >
                        <option value="">اختر</option>
                        <?php ?>
                        <?php foreach($scocial as $row_sco): $select=''; if(!empty($member_status)){ if($member_status ==$row_sco->
                            id_setting){ $select ='selected';}}?>
                            <option value="<?php echo $row_sco->id_setting?>"
                                <?php echo $select;?>><?php echo $row_sco->title_setting;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">طبيعة الفرد<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select name="member_person_type"
                            class="selectpicker no-padding form-control choose-date form-control half"
                            data-show-subtext="true" data-live-search="true" data-validation="required"
                            aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        foreach ($person_type as $row2):
                            $selected = '';
                            if ($row2->id_setting == $member_person_type) {
                                $selected = 'selected';
                            } ?>
                            <option
                                value="<?php echo $row2->id_setting; ?>"
                                <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                        <?php endforeach
                        ;?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">حاله المستفيد<strong
                            class="astric">*</strong><strong></strong> </label>
                    <select name="persons_status" id="halt_elmostafid_member" class="form-control half">
                        <option value=""> اختر</option>
                        <?php if(isset($member_family_status)&&!empty($member_family_status)) {
                            foreach ($member_family_status as $record) {?>
                                <option value="<?php echo $record->id ;?>"
                                    <?php if($halt_elmostafid_member==$record->id){?> selected="selected"<?php } ?>
                                > <?php echo $record->title;?></option>
                            <?php }
                        }?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">التصنيف<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select name="categoriey_member"
                            class="selectpicker no-padding form-control choose-date form-control half"
                            data-show-subtext="true" data-live-search="true" data-validation="required"
                            aria-required="true">
                        <?php $categories=array(2=>'يتيم',3=>'مستفيد بالغ ',4=>"إخرى");?>
                        <option value="">إختر</option>
                        <?php foreach($categories as $key=>$value){ $select='';
                            if($categoriey_member==$key){$select='selected'; }?>
                            <option value="<?php echo $key;?>"
                                <?php echo $select;?>><?php echo $value ;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong>
                    </label>
                    <input type="text" name="member_card_num" id="member_card_num" data-validation="required"
                           onkeyup="check_length_num(this,'10','member_card_num_span')" maxlength="10"
                           value="<?php echo $member_card_num?>" onkeypress="validate_number(event)"
                           class="form-control half input-style"/>
                    <span id="member_card_num_span" class="span-validation"> </span>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> نوع الهوية<strong class="astric">*</strong> </label>
                    <select name="member_card_type" class="form-control half selectpicker " data-show-subtext="true"
                            data-live-search="true" >
                        <option value="">اختر</option>
                        <?php foreach ($national_num_type as $one){  if(!empty($member_card_type)){$select=''; if($one->
                            id_setting== $member_card_type){$select='selected';} }?>
                            <option value="<?php echo $one->id_setting; ?>"
                                <?php echo$select; ?>><?php echo $one->title_setting; ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select name="member_card_source" id="member_card_source"
                            class="selectpicker no-padding form-control choose-date form-control half"
                            data-show-subtext="true" data-live-search="true" data-validation="required"
                            aria-required="true">
                        <option value="">إختر</option>
                        <?php if(!empty($id_source)){ foreach ($id_source as $record){
                            $select=''; if($member_card_source==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>"
                                <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <?php if(!empty($member_birth_date_hijri)){ $hijri_date=explode('/',$member_birth_date_hijri);} ?>
                    <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
                    <input class="textbox form-control" type="text" name="HDay" pattern="\d*"
                           onkeypress="return isNumberKey(event)"
                           onkeyup="moveOnMax(this,document.getElementById('Hmonth'))"
                           value="<?php if(!empty($hijri_date[0])){echo $hijri_date[0];}?>" placeholder="day" id="HDay"
                           size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                    <input class="textbox form-control" type="text" name="HMonth" pattern="\d*"
                           onkeypress="return isNumberKey(event)"
                           onkeyup="moveOnMax(this,document.getElementById('HYear'))"
                           value="<?php if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>" placeholder="month"
                           id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                    <input class="textbox4 form-control" type="text" name="HYear" pattern="\d*"
                           onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form);getAge();"
                           value="<?php if(!empty($hijri_date[2])){echo $hijri_date[2];}?>" placeholder="year"
                           id="HYear" size="20" maxlength="4" style="width: 16.6%;float: right;"/>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <?php if(!empty($member_birth_date)){ $gregorian_date=explode('/',$member_birth_date);} ?>
                    <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
                    <input class="textbox form-control" type="text" name="CDay" pattern="\d*"
                           onkeypress="return isNumberKey(event)"
                           onkeyup="moveOnMax(this,document.getElementById('CMonth'))" placeholder="day" id="CDay"
                           size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"
                           value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; }?>"/>
                    <input class="textbox form-control" type="text" name="CMonth" pattern="\d*"
                           onkeypress="return isNumberKey(event)"
                           onkeyup="moveOnMax(this,document.getElementById('CYear'))" placeholder="month" id="CMonth"
                           size="20" maxlength="2" style="width: 16.6%;float: right;"
                           value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1];}?>"/>
                    <input class="textbox4 form-control" type="text" name="CYear" id="CYear" pattern="\d*"
                           onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"
                           placeholder="year" id="CYear" size="20" maxlength="4" style="width: 16.6%;float: right;"
                           value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2];}?>"/>
                </div>
              <!--  <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong>
                    </label>
                    <input class="textbox2 form-control half " type="text" name="age"
                           id="myage" size="60" id="wd" readonly
                           value="<?php  if(!empty($member_birth_date)){ echo ($my_current_hjri_year - $hijri_date[2]); }?>"/>
                    <input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd"
                           readonly/>
                    <input class="textbox2 hidden" type="text" name="JD" size="60" id="JD" readonly/>
                </div>-->
                 <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong>
                    </label>
                    <input class="textbox2 form-control half " type="text" name="age"
                           id="myage" size="60" id="wd" readonly
                           value="<?php  if(!empty($hijri_date)){ echo ($my_current_hjri_year - $hijri_date[2]); }?>"/>
                    <input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd"
                           readonly/>
                    <input class="textbox2 hidden" type="text" name="JD" size="60" id="JD" readonly/>
                </div>
                
                
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> الجنس <strong class="astric">*</strong> </label>
                    <select name="member_gender" class="form-control half selectpicker " data-show-subtext="true"
                            data-live-search="true" data-validation="required" aria-required="true">
                        <?php $gender_arr=array('','ذكر','أنثى');?>
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($gender_arr);$a++){ $select='';
                            if($a== $member_gender){$select='selected';}?>
                            <option value="<?php echo$a; ?>"
                                <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">ملتحق بدار أو مراكز الجمعيه <strong class="astric">*</strong><strong></strong>
                    </label>
                    <select name="member_dar_markz_check" onchange="get_dar($(this).val());" id="member_dar_markz_check"
                            class=" no-padding form-control choose-date form-control half ">
                        <option value="">اختر</option>
                        <?php
                        $arr_yes_no=array('','نعم','لا');
                        for($r=1;$r<sizeof($arr_yes_no);$r++){
                            $selected='';if($r==$member_dar_markz_check){$selected='selected';}
                            ?>
                            <option value="<?php echo $r ;?>"
                                <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">اسم الدار - مركز الجمعيه<strong
                            class="astric">*</strong><strong></strong> </label>
                    <select class=" form-control half" name="member_dar_markz_id_fk"
                            id="member_dar_markz_id_fk" <?php if($member_dar_markz_id_fk==1 ||$member_dar_markz_id_fk==''){?>
                        disabled=""<?php }?>>
                        <option value="">اختر</option>
                        <?php
                        foreach ($data_door_mrakz as $row7):
                            $selected='';if($row7->id_setting==$member_dar_markz_id_fk){$selected='selected';} ?>
                            <option value="<?php  echo $row7->id_setting;?>"
                                <?php echo $selected?> ><?php  echo $row7->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">ملتحق بدار تابعه لجهات اخري<strong
                            class="astric">*</strong><strong></strong> </label>
                    <select name="member_house_check" id="eldar"
                            class=" no-padding form-control choose-date form-control half " >
                        <option value="">اختر</option>
                        <?php
                        $arr_yes_no=array('','نعم','لا');
                        for($r=1;$r<sizeof($arr_yes_no);$r++){
                            $selected='';if($r==$member_house_check){$selected='selected';}
                            ?>
                            <option value="<?php echo $r ;?>"
                                <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">اسم الدار - المركز<strong
                            class="astric">*</strong><strong></strong> </label>
                    <select class=" form-control half" name="member_house_id_fk"
                            id="member_house_id_fk" <?php if($member_house_id_fk==""){?> disabled=""<?php }?>>
                        <option value="">اختر</option>
                        <?php
                        foreach ($women_houses as $row4):
                            $selected='';if($row4->id_setting==$member_house_id_fk){$selected='selected';} ?>
                            <option value="<?php  echo $row4->id_setting;?>"
                                <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الحالة الدراسية<strong
                            class="astric">*</strong><strong></strong> </label>
                    <select name="member_study_case" id="member_study_case" onchange="get_out_age(this.value);"
                            class="form-control half" >
                        <option value="">إختر</option>
                        <option value="0"
                            <?php if($member_study_case == "0"){echo 'selected'; }?>>( دون سن الدراسة )</option>
                        <option value="unlettered"
                            <?php if($member_study_case == "unlettered"){echo 'selected'; }?>>( امى )</option>
                        <option value="graduate"
                            <?php if($member_study_case ==   "graduate"){echo 'selected'; }?>>( متخرج )</option>
                        <option value="read_write" <?php if($member_study_case ==   "read_write"){echo 'selected'; }?>>
                            ( يقرأو يكتب )</option>
                        <?php if(!empty($stude_case)){ foreach ($stude_case as $record){
                            $select=''; if($member_study_case==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>"
                                <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">المستوي التعليمي<strong
                            class="astric">*</strong><strong></strong> </label>
                    <select name="member_education_level" id="member_education_level" class="form-control half"
                             <?php if($member_study_case == 0){echo 'disabled=""'; }?> >
                        <option value="">إختر</option>
                        <?php if(!empty($education_level)){ foreach ($education_level as $record){
                            $select=''; if($member_education_level==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>"
                                <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نوع التعليم <strong class="astric">*</strong></label>
                    <select name="education_type" id="education_type" class="form-control half selectpicker "
                            data-show-subtext="true" data-live-search="true"  <?php if($member_study_case == 0){echo 'disabled=""'; }?>>
                        <option value="">اختر</option>
                        <?php foreach($education_type as $row_ed){  $select=''; if(!empty($education_type_result)){ if($row_ed->
                            id_setting == $education_type_result){$select='selected';} }?>
                            <option value="<?php echo $row_ed->id_setting;?>"
                                <?php echo $select;?>><?php echo $row_ed->title_setting;?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">المرحلة <strong class="astric">*</strong></label>
                    <select name="stage_id_fk" id="stage_id_fk" onchange="get_stage_class($('#stage_id_fk').val());"
                            class="form-control half selectpicker " data-show-subtext="true" data-live-search="true"
                             <?php if($member_study_case == 0){echo 'disabled=""'; }?>>
                        <option value="">إختر المرحلة</option>
                        <?php foreach ($all_stages as $stage){
                            $select=''; if(!empty($stage_id_fk)){ if($stage->id == $stage_id_fk){$select='selected';} }
                            ?>
                            <option value="<?php echo $stage->id?>"
                                <?php echo$select;?>><?php echo $stage->name?> </option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الصف<strong class="astric">*</strong></label>
                    <select name="class_id_fk" id="class_id_fk" class="form-control half  " data-show-subtext="true"
                            data-live-search="true"  <?php if($member_study_case == 0){echo 'disabled=""'; }?>>
                        <?php if(isset($all_classroom) && !empty($all_classroom) && $all_classroom !=null ){  ?>
                            <option value="">إختر الصف</option>
                            <?php  foreach ($all_classroom as $one_class){
                                $select=''; if(!empty($class_id_fk)){ if( $one_class->id ==
                                    $class_id_fk){$select='selected';} }
                                ?>
                                <option value="<?php echo $one_class->id?>"
                                    <?php echo $select;?>><?php echo $one_class->name?> </option>
                            <?php }
                        }else{?>
                            <option>لا يوجد صفوف للمرحلة</option>
                        <?php }?>
                    </select>
                </div>
                <!--    <div class="form-group col-sm-4" id="options_school">
                    <label class="label label-green  half"> المدرسة - الكلية <strong class="astric">*</strong></label>
                   <?php if (isset($result) && !empty($result)) {?>
                       <input type="hidden" name="school_id_fk" value="<?=$school_id_fk?>" />
                   <?php }?>
                    <input type="text" class="form-control half input-style" name="school_id_fk_bt" id="school_id_fk" onclick="get_school();" <?=$school_title?> />
                      <select name="school_id_fk" id="school_id_fk" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true" <?php if($member_study_case == 0){echo 'disabled=""'; }?> >
                        <option value="">إختر</option>
                        <?php /* foreach ($schools as $row){
                            $select=''; if(!empty($school_id_fk)){ if($row->id_setting == $school_id_fk){$select='selected';} }
                            ?>
                            <option value="<?php echo $row->id_setting; ?>" <?php echo $select?>><?php echo $row->title_setting; ?></option>
                        <?php }*/?>
                    </select> 
                </div>-->
                <div class="form-group col-sm-4" id="options_school">
                    <label class="label label-green  half"> المدرسة - الكلية <strong class="astric">*</strong></label>
                    <select name="school_id_fk" id="school_id_fk" class="form-control half selectpicker "
                            data-show-subtext="true"
                            data-live-search="true" <?php if($member_study_case == "0"){echo 'disabled=""'; }?> >
                        <option value="">إختر</option>
                        <?php  foreach ($schools as $row){
                            $select=''; if(!empty($school_id_fk)){ if($row->id_setting ==
                                $school_id_fk){$select='selected';} }
                            ?>
                            <option value="<?php echo $row->id_setting; ?>"
                                <?php echo $select?>><?php echo $row->title_setting; ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مستوى التحصيل الدراسي<strong
                            class="astric">*</strong><strong></strong> </label>
                    <select name="member_academic_achievement_level" id="member_academic_achievement_level"
                            class="form-control half" <?php if($member_study_case == 0){echo 'disabled=""'; }?>>
                        <option value="">إختر</option>
                        <?php if(!empty($academic_achievement_level)){ foreach ($academic_achievement_level as $record){
                            $select=''; if($member_academic_achievement_level==$record->id_setting){$select='selected';
                            }
                            ?>
                            <option value="<?php echo $record->id_setting;?>"
                                <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تكاليف الدراسة <strong class="astric">*</strong></label>
                    <input type="text" name="school_cost" id="school_cost" onkeypress="validate_number(event);"
                           class="form-control half input-style" placeholder="تكاليف الدراسة" data-validation="required"
                           value="<?php echo$school_cost; ?>"  <?php if($member_study_case == 0){echo 'disabled=""'; }?>
                    />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">التخصص </label>
                    <select name="member_specialization" id="special" class="no-padding form-control half">
                        <option value="">اختر</option>
                        <?php foreach ($specialties as $specialty){
                            $selected='';if($specialty->id_setting == $member_specialization){$selected='selected';}
                            ?>
                            <option value="<?php echo $specialty->id_setting;?>"
                                <?php echo $selected?>  ><?php echo $specialty->title_setting;?> </option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">المهارة</label>
                    <input type="text" name="member_skill" class="form-control half input-style" value="<?php echo $member_skill; ?>"/>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">البريد الإلكترونى </label>
                    <input type="email" name="member_email" class="form-control half input-style"
                           placeholder="البريد الإلكترونى"
                           value="<?php echo$member_email; ?>"/>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">هل يصرف على أمه <strong class="astric">*</strong></label>
                    <select class="form-control half selectpicker " data-show-subtext="true" data-live-search="true"
                            name="member_distracted_mother" >
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($yes_no);$a++){
                            $select=''; if(!empty($member_distracted_mother)){ if($a == $member_distracted_mother){$select='selected';} }
                            ?>
                            <option value="<?php echo $a;?>"
                                <?php echo $select;?>><?php echo $yes_no[$a];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">أداة فريضة الحج <strong class="astric">*</strong></label>
                    <select class="form-control half selectpicker " data-show-subtext="true" data-live-search="true"
                            name="member_hij" >
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($yes_no);$a++){
                            $select=''; if(!empty($member_hij)){ if($a == $member_hij){$select='selected';} }
                            ?>
                            <option value="<?php echo $a;?>"
                                <?php echo $select;?>><?php echo $yes_no[$a];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> أداء فريضة العمرة<strong class="astric">*</strong> </label>
                    <select class="form-control half selectpicker " data-show-subtext="true" data-live-search="true"
                            name="member_omra" >
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($yes_no);$a++){   $select=''; if(!empty($member_omra)){ if($a == $member_omra){$select='selected';} }?>
                            <option value="<?php echo $a;?>"
                                <?php echo $select;?>><?php echo $yes_no[$a];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">السكن <strong class="astric">*</strong></label>
                    <select class="form-control half selectpicker " data-show-subtext="true" data-live-search="true"
                            name="member_home_type" >
                        <option value="">اختر</option>
                        <?php
                        foreach ($member_home_type_arr as $a){  $select=''; if(!empty($member_home_type)){ if($a->
                            id_setting == $member_home_type){$select='selected';} }?>
                            <option value="<?php echo $a->id_setting;?>"
                                <?php echo $select;?>><?php echo $a->title_setting;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> المهنة<strong class="astric">*</strong> </label>
                    <select class="form-control half selectpicker" onchange="not_work($(this).val());"
                            data-show-subtext="true" data-live-search="true" name="member_job" id="work"
                            data-validation="required" aria-required="true">
                        <option value="">اختر</option>
                        <option value="0"
                            <?php if($member_job == 0){ echo 'selected';}?> >لا يعمل </option>
                        <?php foreach ($job as $one_row){ $select=''; if(!empty($member_job)){ if($one_row->id_setting
                            == $member_job){$select='selected';} }?>
                            <option value="<?php echo $one_row->id_setting; ?>"
                                <?php echo $select;?>><?php echo $one_row->title_setting; ?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الدخل الشهرى <strong class="astric">*</strong></label>
                    <input type="text" name="member_month_money" id="member_month_money" class="form-control half"
                           onkeypress="validate_number(event);" id="profession" data-validation="required"
                           value="<?php echo$member_month_money;?>"
                        <?php if($member_job == 0){ echo 'disabled=""';}?>  />
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> مكان العمل<strong class="astric">*</strong> </label>
                    <input type="text" name="member_job_place" id="member_job_place" class="form-control half"
                           placeholder="مكان العمل" id="member_job_place" data-validation="required"
                           value="<?php echo$member_job_place;?>"  <?php if($member_job == 0){ echo 'disabled=""';}?> />
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> النشاط<strong class="astric">*</strong> </label>
                    <select class="form-control half selectpicker " data-show-subtext="true" data-live-search="true"
                            name="member_activity_type"
                            id="activity_type"  <?php if($member_job == 0){ echo 'disabled=""';}?>
                            data-validation="required" aria-required="true">
                        <option value="">اختر</option>
                        <?php foreach ($member_activity_type_arr as $row){
                            $select=''; if(!empty($member_activity_type)){ if($row->id_setting ==
                                $member_activity_type){$select='selected';} }
                            ?>
                            <option value="<?php echo $row->id_setting; ?>"
                                <?php echo $select?>><?php echo $row->title_setting; ?></option>
                        <?php }?>
                        <?php  if($member_activity_type_arr !='' && !empty($member_activity_type_arr)){if($member_activity_type ==0){?>
                            <option value="0" selected>نشاط أخر</option>
                        <?php }else{?>
                            <option value="0">نشاط أخر</option>
                        <?php } }?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نشاط أخر<strong class="astric">*</strong> </label>
                    <input type="text" name="member_activity_type_other" class="form-control half" placeholder="أخري"
                           id="activity_type_other"  <?php if($member_job == 0){ echo 'disabled=""';}?>
                           value="<?php echo $member_activity_type_other;?>"/>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الجنسية <strong class="astric">*</strong></label>
                    <select class="form-control half selectpicker " data-show-subtext="true" data-live-search="true"
                            name="member_nationality" id="member_nationality" >
                        <option value="">اختر</option>
                        <?php if(isset($nationalities) && $nationalities!=null):
                            foreach($nationalities as $one_nationality):
                                $select=''; if(!empty($member_nationality)){ if($one_nationality->id_setting ==
                                $member_nationality){$select='selected';} }
                                ?>
                                <option value="<?php echo $one_nationality->id_setting; ?>"
                                    <?php echo $select;?>><?php echo $one_nationality->title_setting; ?> </option>
                            <?php endforeach;endif ; ?>
                        <?php if($member_nationality !='' && !empty($member_nationality)){ if($member_nationality ==0){?>
                            <option value="0" selected>أخري</option>
                        <?php }else{?>
                            <option value="0">أخري</option>
                        <?php }}?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> جنسيةأخري<strong class="astric">*</strong> </label>
                    <input type="text" name="nationality_other" class="form-control half" placeholder="أخري"
                           id="nationality_other" value="<?php echo $nationality_other;?>"/>
                </div>
            </div>
            <div class="col-md-12">
                <!--------------------------------------------------------ahmed-->
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الحالة الصحية<strong
                            class="astric">*</strong><strong></strong> </label>
                    <select name="member_health_type" id="health_state" onchange="check()"
                           class=" no-padding form-control choose-date form-control half">
                        <option value="">اختر</option>
                        <option value="disease"
                                <?php if($member_health_type =='disease'){?>selected <?php } ?> > مريض </option>
                        <option value="disability"
                                <?php if($member_health_type =='disability'){?>selected <?php } ?>>معاق</option>
                        <option value="good"
                                <?php if($member_health_type =='good'){?>selected <?php } ?> >(سليم)</option>
                        <?php
                        foreach ($health_status_array as $row3):
                            $selected='';if($row3->id_setting==$member_health_type){$selected='selected';} ?>
                            <option value="<?php  echo $row3->id_setting;?>"
                                <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                        <?php  endforeach;?>
                        <!--  <option value="0" >أخري</option> -->
                    </select>
                </div>
                <!--
<div class="form-group col-sm-4">
    <label class="label label-green  half">  حالة  صحيةأخري<strong class="astric">*</strong> </label>
    <input type="text" name="member_health_type_other"  class="form-control half" placeholder="أخري" id="health_other" value="<?php echo$member_health_type_other; ?>" />
</div>
-->
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">نوع المرض<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select name="member_disease_id_fk" id="member_disease_id_fk"
                            class=" no-padding form-control choose-date form-control half"
                            aria-required="true"  <?php if($member_health_type !='disease'){ echo 'disabled=""'; } ?> >
                        <option value="">اختر</option>
                        <?php
                        foreach ($diseases as $row3):
                            $selected='';if($row3->id_setting==$member_disease_id_fk){$selected='selected';} ?>
                            <option value="<?php  echo $row3->id_setting;?>"
                                <?php echo $selected?>  >
                                <?php  echo $row3->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">نوع الإعاقة<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select name="member_disability_id_fk" id="member_disability_id_fk"
                            class=" no-padding form-control choose-date form-control half" aria-required="true"
                        <?php if($member_health_type !='disability'){ echo 'disabled="disabled"'; } ?>  >
                        <option value="">اختر</option>
                        <?php
                        foreach ($diseases as $row3):
                            $selected='';if($row3->id_setting==$member_disability_id_fk){$selected='selected';} ?>
                            <option value="<?php  echo $row3->id_setting;?>"
                                <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تاريخ المرض/الإعاقة <strong
                            class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="member_dis_date_ar" id="member_dis_date_ar"
                           value="<?php echo $member_dis_date_ar?>" class="form-control half input-style docs-date"
                           data-validation="required"  <?php if($member_health_type =='good'){ echo 'disabled="disabled"'; } ?>
                    />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">سبب المرض/الإعاقة <strong
                            class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="member_dis_reason" id="member_dis_reason"
                           value="<?php echo $member_dis_reason?>" class="form-control half input-style "
                           data-validation="required" <?php if($member_health_type =='good'){ echo 'disabled="disabled"'; } ?>
                    />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">جهة المتابعة المرض/الإعاقة <strong
                            class="astric">*</strong><strong></strong> </label>
                    <select name="member_dis_response_status" id="member_dis_response_status"
                            class=" no-padding form-control choose-date form-control half"
                        <?php if($member_health_type =='good'){ echo 'disabled="disabled"'; } ?>>
                        <option value="">اختر</option>
                        <?php
                        foreach ($responses as $row3):
                            $selected='';if($row3->id_setting==$member_dis_response_status){$selected='selected';} ?>
                            <option value="<?php  echo $row3->id_setting;?>"
                                <?php echo $selected?>  >
                                <?php  echo $row3->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">وضع الحالة المرض/الإعاقة <strong
                            class="astric">*</strong><strong></strong> </label>
                    <select name="member_dis_status" id="member_dis_status"
                            class=" no-padding form-control choose-date form-control half"

                        <?php if($member_health_type =='good'){ echo 'disabled="disabled"'; } ?>
                    >
                        <option value="">اختر</option>
                        <?php
                        foreach ($diseases_status as $row3):
                            $selected='';if($row3->id_setting==$member_dis_status){$selected='selected';} ?>
                            <option value="<?php  echo $row3->id_setting;?>"
                                <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم الجوال <strong class="astric">*</strong></label>
                    <input type="text" name="member_mob" id="member_mob" onkeyup="check_length_num(this,'10','member_mob_span')" maxlength="10"
                           onkeypress="validate_number(event);" class="form-control half input-style"
                           placeholder="رقم الجوال " data-validation="required" value="<?php echo$member_mob; ?>"/>
                    <span id="member_mob_span" class="span-validation"> </span>
                </div>
                <!--------------------------------------------------------ahmed-->
                <?php /* ?>
                <?php
                if( $person_account_check ==0  &&  $agent_bank_account_check ==0 &&   $mother_last_account ==0 &&  $last_account == 0  ){?>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مسئول الحساب<strong
                            class="astric">*</strong><strong></strong> </label>
                    <select name="member_account" id="m_account_d" onchange="checkaccount();" class="form-control half">
                        <?php $yes_no=array('لا','نعم');?>
                        <option value="">إختر</option>
                        <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $member_account==$s){$select='selected'; }?>
                        <option value="<?php echo $s;?>"
                        <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم الحساب<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select name="member_account_id" <?php if($member_account!=1){ echo 'disabled' ; } ?>
                    id="m_account_id" onchange="get_code2()"; class="form-control half " >
                    <?php $yes_no=array('لا','نعم');?>
                    <option value="">إختر</option>
                    <?php  if(!empty($banks)){
                            foreach ($banks as $bank){  $select='';  if($result[0]['member_account_id']>0 &&
                    $result[0]['member_account_id'] == $bank->id.'-'.$bank->bank_code){$select='selected'; }?>
                    <option value="<?php echo $bank->id;?>-<?php echo $bank->bank_code;?>"
                    <?php echo $select;?>><?php echo $bank->ar_name;?></option>
                    <?php }
                        } ?>
                    </select>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رمز البنك<strong class="astric">*</strong> </label>
                    <input type="text" class="form-control half input-style"
                           name="bank_ramz" readonly="readonly" id="ramz_code"/>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الحساب <strong class="astric">*</strong> </label>
                    <input type="text" <?php if($member_account!=1){ echo 'disabled' ; } ?> class="form-control half
                    input-style"maxlength="24" minlength="24"
                    value="<?php echo $bank_account_num;?>"
                    name="bank_num" id="hesab_bank_2" onkeyup="length_hesab_om($(this).val());"
                    />
                    <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                </div>
                <?php }elseif($member_account ==1  ){ ?>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مسئول الحساب<strong
                            class="astric">*</strong><strong></strong> </label>
                    <select name="member_account" id="member_account" onchange="checkMember_account();"
                            class="form-control half">
                        <?php $yes_no=array('لا','نعم');?>
                        <option value="">إختر</option>
                        <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $member_account==$s){$select='selected'; }?>
                        <option value="<?php echo $s;?>"
                        <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم الحساب<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select name="member_account_id" id="member_account_id" class="form-control half   ">
                        <?php $yes_no=array('لا','نعم');?>
                        <option value="">إختر</option>
                        <?php  if(!empty($banks)){
                                foreach ($banks as $bank){  $select=''; if( $member_account_id == $bank->
                        id){$select='selected'; }?>
                        <option value="<?php echo $bank->id;?>"
                        <?php echo $select;?>><?php echo $bank->bank_name;?></option>
                        <?php }
                            } ?>
                    </select>
                </div>
                <?php } ?>
                <?php */ ?>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">طبيعة الشخصية<strong
                            class="astric">*</strong><strong></strong> </label>
                    <select name="personal_character_id_fk" id="personal_character_id_fk"
                            class=" no-padding form-control choose-date form-control half " aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        foreach ($personal_characters as $character):
                            $selected='';if($character->id_setting== $personal_character_id_fk){$selected='selected';}
                            ?>
                            <option value="<?php  echo $character->id_setting; ?>"
                                <?php echo $selected?> ><?php  echo $character->title_setting;?></option>
                        <?php  endforeach;?>
                        <option value="0">أخري</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">العلاقة بالأسرة<strong
                            class="astric">*</strong><strong></strong> </label>
                    <select name="relation_with_family" id="relation_with_family"
                            class=" no-padding form-control choose-date form-control half " aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        foreach ($relations_with_family as $relation):
                            $selected='';if($relation->id_setting==
                            $relation_with_family){$selected='selected';} ?>
                            <option value="<?php  echo $relation->id_setting; ?>"
                                <?php echo $selected?> ><?php  echo $relation->title_setting;?></option>
                        <?php  endforeach;?>
                        <option value="0">أخري</option>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مكفول<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select name="guaranteed_member"
                            class="selectpicker no-padding form-control choose-date form-control half"
                            data-show-subtext="true" >
                        <?php $yes_no=array('لا','نعم');?>
                        <option value="">إختر</option>
                        <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if($guaranteed_member==$s){$select='selected'; }?>
                            <option value="<?php echo $s;?>"
                                <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">المشكلات التعليمة</label>
                    <textarea name="education_problems" class="form-control half "
                              style="width: 100%;"><?php echo $education_problems; ?></textarea>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الدورات التدريبية</label>
                    <textarea name="courses_details" class="form-control half "
                              style="width: 100%;"><?php echo $courses_details; ?></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الصورة الشخصية </label>
                    <input type="file" name="member_photo" class="form-control half"/>
                    <small class="small" style="bottom:-13px;">
                        <?php if (!empty($member_photo)){?>
                            <a href="<?php echo base_url()?>uploads/images/<?php echo $member_photo;?>" download> <i
                                    class="fa fa-download"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#myModal-member_photo-<?php echo $id;?>"> <i
                                    class="fa fa-eye"></i> </a>
                        <?php } ?>
                        برجاء إرفاق صورة
                    </small>
                </div>
                <div class="modal fade" id="myModal-member_photo-<?php echo $id;?>" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">الصورة الشخصية</h4>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo base_url()?>uploads/images/<?php echo $member_photo;?>"
                                     width="100%">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">شهادة الميلاد<strong class="astric">*</strong> </label>
                    <input type="file" name="member_birth_card_img" class="form-control half"/>
                    <small class="small" style="bottom:-13px;">
                        <?php if (!empty($member_birth_card_img)){?>
                            <a href="<?php echo base_url()?>uploads/images/<?php echo $member_birth_card_img;?>" download>
                                <i class="fa fa-download"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#myModal-view<?php echo $id;?>"> <i
                                    class="fa fa-eye"></i> </a>
                        <?php } ?>
                        برجاء إرفاق صورة
                    </small>
                </div>
                <div class="modal fade" id="myModal-view<?php echo $id;?>" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">شهادة الميلاد</h4>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo base_url()?>uploads/images/<?php echo $member_birth_card_img;?>"
                                     width="100%">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تعريف المدرسة <strong class="astric">*</strong></label>
                    <input type="file" name="member_sechool_img" class="form-control half"/>
                    <small class="small" style="bottom:-13px;">
                        <?php if (!empty($member_sechool_img)){?>
                            <a href="<?php echo base_url()?>uploads/images/<?php echo $member_sechool_img;?>" download> <i
                                    class="fa fa-download"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#myModal-view2<?php echo $id;?>"> <i
                                    class="fa fa-eye"></i> </a>
                        <?php } ?>
                        برجاء إرفاق صورة
                    </small>
                </div>
                <div class="modal fade" id="myModal-view2<?php echo $id;?>" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">شهادة الميلاد</h4>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo base_url()?>uploads/images/<?php echo $member_sechool_img;?>"
                                     width="100%">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <input type="hidden" name="max" id="max"/>
                <div class="form-group col-sm-4">
                    <button type="submit" name="<?php echo $button;?>" value="<?php echo $button;?>"
                            class="btn btn-blue btn-previous" id="buttons">حفظ
                    </button>
                </div>
            </div>
            <?php echo form_close()?>
            <!----------------------- table----------->
            <?php if(isset($member_data) && $member_data!=null){ ?>
                <table class="table table-bordered" style="width:100%">
                    <header>
                        <tr>
                            <th>م</th>
                            <th>الإسم</th>
                            <th>رقم الهوية</th>
                            <!--  <th> إسم الام</th> -->
                            <th>الصلة</th>
                            <th>الجنس</th>
                            <th>تاريخ الميلاد هجري</th>
                            <th>العمر</th>
                            <th>التصنيف</th>
                            <th>طبيعة الفرد</th>
                            <!--  <th>المهنة </th> -->
                            <!--    <th>المرحلة</th>-->
                            <!--   <th> الصف </th> -->
                            <!--     <th>الصلة</th>-->
                            <th>حالة الفرد</th>
                            <th> السبب</th>
                            <th> الإجراء</th>
                        </tr>
                    </header>
                    <tbody>
                    <?php
                    /*    echo '<pre>';
                      print_r($mothers_data);
                      echo '<pre>';*/
                    if(isset($mothers_data) && $mothers_data!=null){ ?>
                        <tr>
                            <td>1</td>
                            <!--  <td><?php echo $mothers_data[0]->full_name;   ?></td> -->
                            <td><a href="#" data-toggle="modal" data-target="#MotherDataModel"
                                   onclick="GetMotherData(<?php echo $mothers_data[0]->mother_national_num_fk; ?>)"><?php echo $mothers_data[0]->
                                    full_name;   ?></a></td>
                            <td><?php echo $mothers_data[0]->mother_national_num_fk; ?></td>
                            <td><?php echo $mothers_data[0]->relation_name; ?> </td>
                            <td><?php if($mothers_data[0]->m_gender ==1){echo 'ذكر';}else{echo 'انثى'; } ?></td>
                            <td><?php echo $mothers_data[0]->m_birth_date_hijri; ?> </td>
                         <!--   <td>
                                <?php $age='';
                                if(isset($mothers_data[0]->m_birth_date_year) && !empty($mothers_data[0]->m_birth_date_year)
                                    && isset($current_year) && !empty($current_year)){
                                    //   $age= date('Y-m-d') - $mothers_data[0]->m_birth_date_year;
                                    $age =  $current_year  -    $mothers_data[0]->m_birth_date_hijri_year;
                                }
                                echo $age." عام";
                                ?>
                            </td>-->
                            
                            <td>
                                <?php $age='';
                                if( isset($row->member_birth_date_hijri) && !empty($row->member_birth_date_hijri) &&
                                    isset($current_year) && !empty($current_year)   ){
                                    // $age=date('Y-m-d')-$row->member_birth_date_year;
                                    $age =  $current_year  -    $row->member_birth_date_hijri_year;
                                }
                                echo $age." عام";
                                ?>
                            </td>
							
							
                            <td>
                                <?php
                                if($mothers_data[0]->categoriey_m == 1){
                                    $categoriey_m_name =  'أرملة ';
                                }elseif($mothers_data[0]->categoriey_m == 2){
                                    $categoriey_m_name =  'يتيم ';
                                }elseif($mothers_data[0]->categoriey_m == 3){
                                    $categoriey_m_name =  'مستفيد بالغ  ';
                                }else{
                                    $categoriey_m_name =  'غير محدد  ';
                                }
                                echo $categoriey_m_name;
                                ?>
                            </td>
                            <!--  <td>
                              <?php
                            /* if(!empty($job)){
                                 $job_titles_arr =array();
                                 foreach ($job as $record){
                                     $job_titles_arr[$mothers_data[0]->m_job_id_fk] = $record->title_setting;
                                 }
                                 echo $job_titles_arr[$mothers_data[0]->m_job_id_fk];  }*/?>
                          </td>
                          -->
                            <td><?=$mothers_data[0]->person_type_name?></td>
                            <td>
                                <?php
                                if(isset($persons_status)&&!empty($persons_status)) {
                                    $button_class ="info";
                                    $button_title = "حالة الفرد " ;
                                    $button_style = " " ;
                                    foreach ($persons_status as $record) {
                                        if($record->id == $mothers_data[0]->halt_elmostafid_m){
                                            $button_title = $record->title ;
                                            $button_style = "background-color:".$record->color ;
                                        }
                                    }
                                }
                                ?>
                                <button style="<?php echo $button_style;?>; color: black;"
                                        data-toggle="modal" data-target="#modal-mother-<?php echo $mothers_data[0]->mother_national_num_fk;?>"
                                        title="<?php echo $button_title;?>" class="btn btn-sm btn-info status">
                                    </i> <?php echo $button_title;?>
                                </button>
                            </td>
                            <td>    <?=$mothers_data[0]->reason?> </td>
                            <td>
                            </td>
                        </tr>
                        <!---------------------------------- حالة الام ---------------------->
                        <div class="modal fade" id="modal-mother-<?php echo $mothers_data[0]->mother_national_num_fk;?>"
                             tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><div style="color:red;">
                                                حالة الام </div></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                style="    margin-top: -24px !important;"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body row">
                                        <!--   <div class="col-md-12 form-group">
                                            <label class="label label-green  half">من فضلك اذكر السبب</label>
                            <textarea   class="form-control half  reason-<?php // echo $mothers_data[0]->mother_national_num_fk;?>" style="width: 100%;" rows="4" ></textarea>
                                        </div> -->
                                        <div class=" col-xs-12 text-center top_radio">
                                            <?php
                                            if(isset($reasons_types)&&!empty($reasons_types)){
                                                foreach($reasons_types as $row2){ ?>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio"
                                                                   name="check<?php echo$mothers_data[0]->mother_national_num_fk;?>"
                                                                   class="check-<?php echo $mothers_data[0]->mother_national_num_fk;?>"
                                                                   value="<?php echo $row2->id;?>"
                                                                <?php if(isset($mothers_data[0]->persons_process_reason) && $mothers_data[0]->persons_process_reason==$row2->id){?> checked="checked"  <?php } ?>
                                                            >
                                                            <?php echo $row2->title;?>
                                                        </label>
                                                    </div>
                                                <?php } } ?>
                                        </div>
                                        <div class="col-md-12 form-group" style="">
                                            <?php if(isset($persons_status)&&!empty($persons_status)) {
                                                foreach ($persons_status as $record) {
                                                    ?>
                                                    <div class="col-md-2">
                                                        <button value="<?php echo $record->id;?>"
                                                                onclick="ChangeMotherStatus($(this).val(),$(this).attr('title'),$(this).attr('mother_num'));"
                                                                style="background-color:<?php echo $record->color;?>;"
                                                                title="<?php echo $record->title;?>"
                                                                mother_num="<?php echo $mothers_data[0]->mother_national_num_fk;?>"
                                                                class="btn btn-sm btn-info status">
                                                            </i> <?php echo $record->title;?>
                                                        </button>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-defualt" data-dismiss="modal"
                                                aria-label="Close">إغلاق </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------------------------------->
                    <?php }?>
                    <?php
                    /*
                   echo '<pre>';
                     print_r($member_data);
                       echo '<pre>';
                    */
                    $x=2; foreach($member_data as $row){ ?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <!-- <td><?php echo $row->member_full_name;  ?></td> -->
                            <td><a href="#" data-toggle="modal" data-target="#FamilyMemberDataModel"
                                   onclick="GetFamilyMemberData(<?php echo $row->id; ?> , <?php if(isset( $mothers_data[0]->mother_national_num_fk)){echo $mothers_data[0]->mother_national_num_fk;} ?>)"><?php echo $row->
                                    member_full_name;  ?></a></td>
                            <td><?php echo $row->member_card_num; ?></td>
                            <td><?php echo $row->relation_name;  ?></td>
                            <!--
                              <td><?php if(isset($mothers_data[0]->full_name)){ echo $mothers_data[0]->full_name ;} ?></td>
                             -->
                            <td><?php if($row->member_gender ==1){echo 'ذكر';}else{echo 'انثى'; } ?></td>
                            <td><?php echo $row->member_birth_date_hijri; ?></td>
                            <td>
                                <?php
                                /* $age='';
                                if( isset($row->member_birth_date_year) && !empty($row->member_birth_date_year) &&
                                    isset($current_year) && !empty($current_year)   ){
                                    // $age=date('Y-m-d')-$row->member_birth_date_year;
                                    $age =  $current_year  -    $row->member_birth_date_hijri_year;
                                }
                                echo $age." عام";*/
                                    $age='';
                                if( isset($row->member_birth_date_hijri) && !empty($row->member_birth_date_hijri) &&
                                    isset($current_year) && !empty($current_year)   ){
                                    // $age=date('Y-m-d')-$row->member_birth_date_year;
                                    $age =  $current_year  -    $row->member_birth_date_hijri_year;
                                }
                                echo $age." عام";
                                ?>
                                
                            </td>
                            <td><?php //echo $row->halet_member_name;
                                if($row->categoriey_member == 1){
                                    $categoriey_member =  'أرملة ';
                                }elseif($row->categoriey_member == 2){
                                    $categoriey_member =  'يتيم ';
                                }elseif($row->categoriey_member == 3){
                                    $categoriey_member =  'مستفيد بالغ ';
                                }else{
                                    $categoriey_member =  'غير محدد  ';
                                }
                                echo $categoriey_member;
                                ?>
                            </td>
                            <!-- <td>
                                 <?php
                            if(!empty($job)){
                                $job_titles_arr =array();
                                foreach ($job as $record){
                                    $job_titles_arr[$record->id_setting] = $record->title_setting;
                                }
                                if(isset($job_titles_arr[$row->member_job]))
                                { echo $job_titles_arr[$row->member_job];
                                }else{
                                    echo "لا يعمل ";
                                }
                            }?>
                             </td>
                             -->
                            <!--   <td><?php //if(!empty($row->stage_name)){echo $row->stage_name;}  ?></td>
                               <td><?php //if(!empty($row->class_name)){echo $row->class_name; } ?></td> -->
                            <!-- <td><?php //if (!empty($relationships_titles[$row->member_relationship])){echo $relationships_titles[$row->member_relationship];}?></td>
                            -->
                            <td> <?=$row->member_person_type_name?> </td>
                            <td>
                                <?php
                                if(isset($persons_status)&&!empty($persons_status)) {
                                    $button_class ="info";
                                    $button_title = "حالة الفرد " ;
                                    $button_style = " " ;
                                    foreach ($persons_status as $record) {
                                        if($record->id == $row->persons_status){
                                            $button_title = $record->title ;
                                            $button_style = "background-color:".$record->color ;
                                        }
                                    }
                                }
                                ?>
                                <button style="<?php echo$button_style; ?>;  color: black;" data-toggle="modal"
                                        data-target="#modal-persons<?php echo $row->id;?>"
                                        title="<?php echo $button_title;?>" class="btn btn-sm btn-info status">
                                    </i> <?php echo $button_title;?>
                                </button>
                            </td>
                            <td><?php
                                // echo $row->persons_process_reason;
                                echo  $row->reason ;
                                /* if($row->persons_process_reason == 0)
                                  {
                                  $persons_process_reason = 'غير محدد '; 
                                  }else{
                                   $persons_process_reason = $row->persons_process_reason
                                  }
                                  echo $persons_process_reason ; 
                                  */
                                ?> </td>
                            <td>
                                <a href="<?php echo base_url().'family_controllers/Family/update_family_members/'.$mother_national_num.'/'.$row->id?>">
                                    <i class="fa fa-pencil " aria-hidden="true"></i></a>
                                <a href="#" data-toggle="modal" data-target="#modal-delete<?php echo $row->id;?>"><i
                                        class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                            <div class="modal" id="modal-delete<?php echo$row->id;?>" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p id="text">هل أنت متأكد من الحذف؟</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success"
                                                    data-dismiss="modal">تراجع</button>
                                            <a href="<?php echo base_url().'family_controllers/Family/delete_member/'.$row->id.'/'.$mother_national_num."/". $this->uri->segment(5)."/". $this->uri->segment(6);?>"> <button
                                                    type="button" name="save" value="save" class="btn btn-danger remove"
                                                    id="Delete-Record">نعم</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <!----------------------------------حاله الفرد---------------------->
                        <div class="modal fade" id="modal-persons<?php echo $row->id;?>" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><div style="color:red;">
                                                <?php echo $row->persons_process_title;?> </div></h5>
                                        <button type="button" style="position: relative;
    top: -22px;" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body row">
                                        <!-- <div class="col-md-12">
                                            <?php
                                        if(isset($reasons_types)&&!empty($reasons_types)){
                                            foreach($reasons_types as $row2){ ?>
                                                    <input type="radio" name="check<?php echo$row->id;?>" class="check<?php echo $row->id;?>" value="<?php echo $row2->id;?>"
                                                        <?php if(isset($row->persons_process_reason)&&$row->persons_process_reason==$row2->id){?> checked="checked"  <?php } ?>>
                                                    <?php echo $row2->title;?></br>
                                                <?php } } ?>
                                        </div>
                                        -->
                                        <!------------------------------>
                                        <div class=" col-xs-12 text-center top_radio">
                                            <?php
                                            if(isset($reasons_types)&&!empty($reasons_types)){
                                                foreach($reasons_types as $row2){ ?>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="check<?php echo$row->id;?>" class="check<?php echo $row->id;?>"
                                                                   value="<?php echo $row2->id;?>"
                                                                <?php if(isset($row->
                                                                        persons_process_reason)&&$row->persons_process_reason==$row2->id){?> checked="checked"  <?php } ?>>
                                                            <?php echo $row2->title;?>
                                                        </label>
                                                    </div>
                                                <?php } } ?>
                                        </div>
                                        <!------------------------------->
                                        <div class="col-md-12" style="padding-top: 20px !important;">
                                            <?php if(isset($persons_status)&&!empty($persons_status)) {
                                                foreach ($persons_status as $record) {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <button value="<?php echo $record->id;?>"
                                                                onclick="ChangeFamilyMemberStatus($(this).val(),$(this).attr('title'),$(this).attr('member_id'));"
                                                                style="background-color:<?php echo $record->color;?>; color: black;"
                                                                title="<?php echo $record->title;?>"
                                                                member_id="<?php echo $row->id;?>"
                                                                class="btn btn-sm btn-info status">
                                                            </i> <?php echo $record->title;?>
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
                        <!--
                          <div class="modal fade" id="modal-persons<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"><div style="color:red;" >
                                                 حالة الفرد <?php //echo $row->persons_process_title;?> </div></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="    margin-top: -24px !important;"><span
                                                  aria-hidden="true">&times;</span></button>
                                      </div>
                                      <div class="modal-body row">
                                          <div class="col-md-12">
                                              <label class="label label-green  half">من فضلك اذكر السبب</label>
                              <textarea   class="form-control half  reason<?php echo $row->id;?>" style="width: 100%;" rows="4" ></textarea>
                                          </div>
                                          <div class="col-md-12" style="padding-top: 20px !important;">
                                              <?php if(isset($persons_status)&&!empty($persons_status)) {
                            foreach ($persons_status as $record) {
                                ?>
                                                      <div class="col-md-2">
                                                          <button value="<?php echo $record->id;?>" onclick="ChangeFamilyMemberStatus($(this).val(),$(this).attr('title'),$(this).attr('member_id'));" 
                                                          style="background-color:<?php echo $record->color;?>;"
                                                                  title="<?php echo $record->title;?>"
                                                                  member_id="<?php echo $row->id;?>"
                                                                  class="btn btn-sm btn-info status">
                                                              </i> <?php echo $record->title;?>
                                                         </button>
                                                      </div>
                                                      <?php
                            }
                        }
                        ?>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-defualt" data-dismiss="modal" aria-label="Close">إغلاق </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          -->
                        <!----------------------------------حاله الفرد---------------------->
                        <?php $x++; } ?>
                    </tbody>
                </table>
                <!-------------------------------------------------------------->
                <!--
                  <table class="table table-bordereds center-block "  style="width: 50%;">
                          <?php
                if(!empty($person_type)){
                    foreach ($person_type as $record){?>
                      <tr>
                          <td style="width: 280px;">
                           <?php echo $record->title_setting; ?>" 
                         </td>
                          <td style="width: 280px;">
                          <?php
                        if(isset($person_type_table[$record->id_setting]))
                        {  echo$person_type_table[$record->id_setting]; }?>
                             </td>
                      </tr>
                          <?php }  }?>
                  </table>
            -->
                <style>
                    .specific_style {
                        background-color: #658e1a !important;
                        color: white;
                    }
                </style>
                <?php
                /*********** كل المستفيدين ******************************************/
                $total_mostafden = $main_family_data[0]->all_mostafed_mother + $main_family_data[0]->all_mostafed_member;
                // كل المستفيدين ماليا النشط كلي
                $total_mostafden_finance = $main_family_data[0]->all_mostafed_mother_finance +
                    $main_family_data[0]->all_mostafed_member_finance;
                // كل الغير مستفيدين
                $total_not_mostafden = $main_family_data[0]->all_not_mostafed_mother +
                    $main_family_data[0]->all_not_mostafed_member;
                /*****************************************************/
                // الارامل النشط كلي
                $total_armal_full_active = $main_family_data[0]->armal_full_active;
                // الارامل النشط جزئيا
                $total_armal_sub_active = $main_family_data[0]->armal_sub_active;
                /**********************************************/
                // اليتيم النشط كلي
                $total_yatem_full_active = $main_family_data[0]->yatem_full_active;
                // اليتيم النشط جزئيا
                $total_yatem_sub_active = $main_family_data[0]->yatem_sub_active;
                /*************************************************/
                // البالغ النشط كلي
                $total_bale3_full_active = $main_family_data[0]->bale3_full_active;
                // البالغ النشط جزئيا
                $total_bale3_sub_active = $main_family_data[0]->bale3_sub_active;
                /**************************************************************************************/
                ?>
                <style>
                    .span-style {
                        padding: 10px;
                        background-color: #658e1a;
                        color: white;
                    }
                </style>
                <table class="table table-bordereds center-block " style="width: 50%;">
                    <thead>
                    <tr>
                        <th colspan="3">المـستفيــديـــن = <span style="margin-right: 13px;"
                                                                 class="span-style"> <?php echo $total_mostafden;  ?>  </span>
                        </th>
                        <th colspan="1">الغير مستفيدين = <span
                                class="span-style"> <?php echo $total_not_mostafden;  ?>  </span></th>
                    </tr>
                    <tr>
                        <th colspan="4">المستفيدين ماليا = 
    <span class="span-style">
    <?php echo $total_mostafden_finance;  ?>
   </span>
                        </th>
                    </tr>
                    <tr>
                        <th style="width: 15% !important;"></th>
                        <th>الأرامل</th>
                        <th>الأيتام</th>
                        <th>المستفيدين البالغين</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>النشط كليا</th>
                        <td><input type="text" disabled="disabled" value="<?php echo $total_armal_full_active;  ?>"
                                   class="specific_style form-control"/></td>
                        <td><input type="text" disabled="disabled" value="<?php echo $total_yatem_full_active;  ?>"
                                   class="specific_style form-control"/></td>
                        <td><input type="text" disabled="disabled" value="<?php echo $total_bale3_full_active;  ?>"
                                   class="specific_style form-control"/></td>
                    </tr>
                    <tr>
                        <th>النشط جزئيا</th>
                        <td><input type="text" disabled="disabled" value="<?php echo $total_armal_sub_active;  ?>"
                                   class="specific_style form-control"/></td>
                        <td><input type="text" disabled="disabled" value="<?php echo $total_yatem_sub_active;  ?>"
                                   class="specific_style form-control"/></td>
                        <td><input type="text" disabled="disabled" value="<?php echo $total_bale3_sub_active;  ?>"
                                   class="specific_style form-control"/></td>
                    </tr>
                    </tbody>
                </table>
                <?php
                /*
             $total_mostafeden = ( $main_family_data[0]->armal_num_in_mother +
                       $main_family_data[0]->armal_num_in_f_member +
                       $main_family_data[0]->yteem_num +
                       $main_family_data[0]->mostafeed_num
                       );
                       $total_aramel = ( $main_family_data[0]->armal_num_in_mother + $main_family_data[0]->armal_num_in_f_member );
                       $total_yteem_num = ( $main_family_data[0]->yteem_num );
                       $mostafeed_num = ($main_family_data[0]->mostafeed_num );
                       $total_not_mostafeden = ( $main_family_data[0]->not_mostafeed_num_mother +
                       $main_family_data[0]->not_mostafeed_num_f_member );
                       ?>
                       <style>
                           .specific_style {
                               background-color: #658e1a !important;
                               color: white;
                           }
                       </style>
                       <?php
            if(isset($main_family_data)&&!empty($main_family_data)) {
           ?>
                       <table class="table table-bordereds center-block " style="width: 50%;">
                           <tr>
                               <th colspan="3">المستفيدين = <?php echo $total_mostafeden;  ?> </th>
                               <th colspan="1">الغير مستفيدين =  <?php echo $total_not_mostafeden;  ?> </th>
                           </tr>
                           <tr>
                               <!--  <th>إجمالي المستفيدين	</th> -->
                               <th> عدد الأرامل</th>
                               <th> عدد الأيتام</th>
                               <th> عدد المستفيدين</th>
                               <th> الغير مستفيدين</th>
                           </tr>
                           <tr>
                               <!--  <td><input type="text" disabled="disabled" value="<?php echo $total_mostafeden;  ?>" class="specific_style form-control" /></td>-->
                               <td><input type="text" disabled="disabled" value="<?php echo $total_aramel;  ?>"
                                          class="specific_style form-control"/></td>
                               <td><input type="text" disabled="disabled" value="<?php echo $total_yteem_num;  ?>"
                                          class="specific_style form-control"/></td>
                               <td><input type="text" disabled="disabled" value="<?php echo $mostafeed_num;  ?>"
                                          class="specific_style form-control"/></td>
                               <td><input type="text" disabled="disabled" value="<?php echo $total_not_mostafeden;  ?>"
                                          class="specific_style form-control"/></td>
                           </tr>
                       </table>
                       <?php }else{ } 
           */
                ?>
                <!-------------------------------------------------------------->
                <!------------------------model---------->
                <div class="modal fade" id="MotherDataModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog " style="width: 100%" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"> تفاصيل الأم</h4>
                            </div>
                            <div class="modal-body row" id="MotherDataDiv">
                            </div>
                            <div class="modal-footer">
                                <button type="button" style="float:left" class="btn btn-danger" data-dismiss="modal">إغلاق
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="FamilyMemberDataModel" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog " style="width: 100%" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                            </div>
                            <div class="modal-body row" id="FamilyMemberDataDiv">
                            </div>
                            <div class="modal-footer">
                                <button type="button" style="float:left" class="btn btn-danger" data-dismiss="modal">إغلاق
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!------------------------table---------->
        </div>
    </div>
</div>
<script>
    function get_out_age(value_id) {
        //  education_type  stage_id_fk   
        // class_id_fk  school_id_fk member_academic_achievement_level
        //  school_cost stage_id_fk   member_education_level  special
        // unlettered    graduate 
        if (value_id == 0 || value_id == "unlettered" || value_id == "read_write") {
            document.getElementById("education_type").setAttribute("disabled", "disabled");
            document.getElementById("education_type").removeAttribute("data-validation", "required");
            document.getElementById("stage_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("stage_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("class_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("class_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("school_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("school_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("member_academic_achievement_level").setAttribute("disabled", "disabled");
            document.getElementById("member_academic_achievement_level").removeAttribute("data-validation", "required");
            document.getElementById("school_cost").setAttribute("disabled", "disabled");
            document.getElementById("school_cost").removeAttribute("data-validation", "required");
            document.getElementById("member_education_level").setAttribute("disabled", "disabled");
            document.getElementById("member_education_level").removeAttribute("data-validation", "required");
            document.getElementById("special").setAttribute("disabled", "disabled");
            document.getElementById("special").removeAttribute("data-validation", "required");
        } else if (value_id == "graduate") {
            document.getElementById("education_type").setAttribute("disabled", "disabled");
            document.getElementById("education_type").removeAttribute("data-validation", "required");
            document.getElementById("stage_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("stage_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("class_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("class_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("school_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("school_id_fk").setAttribute("data-validation", "required");
            document.getElementById("member_academic_achievement_level").setAttribute("disabled", "disabled");
            document.getElementById("member_academic_achievement_level").removeAttribute("data-validation", "required");
            document.getElementById("school_cost").setAttribute("disabled", "disabled");
            document.getElementById("school_cost").removeAttribute("data-validation", "required");
            document.getElementById("member_education_level").setAttribute("disabled", "disabled");
            document.getElementById("member_education_level").removeAttribute("data-validation", "required");
            $('#school_id_fk').selectpicker('refresh');
            document.getElementById("special").removeAttribute("disabled", "disabled");
            document.getElementById("special").setAttribute("data-validation", "required");
        } else {
            // education_type  stage_id_fk  school_id_fk
            document.getElementById("member_academic_achievement_level").removeAttribute("disabled", "disabled");
            document.getElementById("member_academic_achievement_level").setAttribute("data-validation", "required");
            document.getElementById("education_type").removeAttribute("disabled", "disabled");
            document.getElementById("education_type").setAttribute("data-validation", "required");
            document.getElementById("stage_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("stage_id_fk").setAttribute("data-validation", "required");
            document.getElementById("class_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("class_id_fk").setAttribute("data-validation", "required");
            document.getElementById("school_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("school_id_fk").setAttribute("data-validation", "required");
            document.getElementById("member_education_level").removeAttribute("disabled", "disabled");
            document.getElementById("member_education_level").setAttribute("data-validation", "required");
            document.getElementById("school_cost").removeAttribute("disabled", "disabled");
            document.getElementById("school_cost").setAttribute("data-validation", "required");
            $('#education_type').selectpicker('refresh');
            $('#stage_id_fk').selectpicker('refresh');
            $('#school_id_fk').selectpicker('refresh');
            document.getElementById("special").removeAttribute("disabled", "disabled");
            document.getElementById("special").setAttribute("data-validation", "required");
        }
    }
</script>
<script>
    function get_stage_class(num) {
        if (num > 0 && num != '') {
            var id = num;
            var dataString = 'main_stage=' + id;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family/family_members/<?php echo $mother_national_num;?>',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#class_id_fk").html(html);
                }
            });
        }
    }
</script>
<script>
    document.getElementById("member_nationality").onchange = function () {
        if (this.value == 0) {
            document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
            document.getElementById("nationality_other").setAttribute("data-validation", "required");
        } else {
            document.getElementById("nationality_other").setAttribute("disabled", "disabled");
            $("#nationality_other").val("");
        }
    };
    document.getElementById("activity_type").onchange = function () {
        if (this.value == '0') {
            document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
            document.getElementById("activity_type_other").setAttribute("data-validation", "required");
        } else {
            document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
        }
    };
</script>
<!--=----------------ahmed-->
<script>
    function chek_length(inp_id) {
        var inchek_id = "#" + inp_id;
        var inchek = $(inchek_id).val();
        if (inchek.length < 10) {
            document.getElementById("" + inp_id + "_span").style.color = '#F00';
            document.getElementById("" + inp_id + "_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById("buttons").setAttribute("disabled", "disabled");
            var inchek_out = inchek.substring(0, 10);
            $(inchek_id).val(inchek_out);
        }
        if (inchek.length > 10) {
            document.getElementById("" + inp_id + "_span").style.color = '#F00';
            document.getElementById("" + inp_id + "_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById("buttons").setAttribute("disabled", "disabled");
            var inchek_out = inchek.substring(0, 10);
            $(inchek_id).val(inchek_out);
        }
        if (inchek.length == 10) {
            document.getElementById("buttons").removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function getAge() {
        var nowYear = (new Date()).getFullYear();
        var myAge = ( nowYear - $('#CYear').val() );
        $('#myage').val(myAge)
    }
    document.getElementById("member_account_id").setAttribute("disabled", "disabled");
    function checkMember_account() {
        var member_account = $('#member_account').val();
        if (member_account == 0) {
            document.getElementById("member_account_id").setAttribute("disabled", "disabled");
            document.getElementById("member_account_id").value = "";
        } else {
            document.getElementById("member_account_id").removeAttribute("disabled", "disabled");
        }
    }
</script>
<!--=----------------ahmed-->
<script>
    document.getElementById('eldar').onchange = function () {
        var x = $(this).val();
        if (x == 1) {
            document.getElementById("member_house_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("member_house_id_fk").setAttribute("data-validation", "required");
        } else {
            document.getElementById("member_house_id_fk").value = '';
            document.getElementById("member_house_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_house_id_fk").removeAttribute("data-validation", "required");
            ;
        }
    }
    function not_work(value_id) {     // member_job_place  activity_type   activity_type_other member_month_money
        if (value_id == 0) {
            document.getElementById("member_month_money").setAttribute("disabled", "disabled");
            document.getElementById("member_month_money").removeAttribute("data-validation", "required");
            document.getElementById("member_job_place").setAttribute("disabled", "disabled");
            document.getElementById("member_job_place").removeAttribute("data-validation", "required");
            document.getElementById("activity_type").setAttribute("disabled", "disabled");
            document.getElementById("activity_type").removeAttribute("data-validation", "required");
            document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
            document.getElementById("activity_type_other").removeAttribute("data-validation", "required");
            //  $('.selectpicker').selectpicker('refresh');
        } else {
            document.getElementById("member_month_money").removeAttribute("disabled", "disabled");
            document.getElementById("member_month_money").setAttribute("data-validation", "required");
            document.getElementById("member_job_place").removeAttribute("disabled", "disabled");
            document.getElementById("member_job_place").setAttribute("data-validation", "required");
            document.getElementById("activity_type").removeAttribute("disabled", "disabled");
            document.getElementById("activity_type").setAttribute("data-validation", "required");
            document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
            document.getElementById("activity_type_other").setAttribute("data-validation", "required");
            //  $('.selectpicker').selectpicker('refresh');
        }
    }
</script>
<script>
    document.getElementById("health_other").setAttribute("disabled", "disabled");
    function check() {
        var type = $('#health_state').val();
        if (type === 'disease') {   //  removeAttribute      setAttribute
            document.getElementById("member_dis_date_ar").removeAttribute("disabled", "disabled");
            document.getElementById("member_dis_reason").removeAttribute("disabled", "disabled");
            document.getElementById("member_dis_response_status").removeAttribute("disabled", "disabled");
            document.getElementById("member_dis_status").removeAttribute("disabled", "disabled");
            document.getElementById("member_disease_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("member_disability_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_dis_date_ar").setAttribute("data-validation", "required");
            document.getElementById("member_dis_reason").setAttribute("data-validation", "required");
            document.getElementById("member_dis_response_status").setAttribute("data-validation", "required");
            document.getElementById("member_dis_status").setAttribute("data-validation", "required");
            document.getElementById("member_disease_id_fk").setAttribute("data-validation", "required");
            document.getElementById("member_disability_id_fk").removeAttribute("data-validation", "required");
        } else if (type === 'disability') { //  removeAttribute      setAttribute
            document.getElementById("member_dis_date_ar").removeAttribute("disabled", "disabled");
            document.getElementById("member_dis_reason").removeAttribute("disabled", "disabled");
            document.getElementById("member_dis_response_status").removeAttribute("disabled", "disabled");
            document.getElementById("member_dis_status").removeAttribute("disabled", "disabled");
            document.getElementById("member_disease_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_disability_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("member_dis_date_ar").setAttribute("data-validation", "required");
            document.getElementById("member_dis_reason").setAttribute("data-validation", "required");
            document.getElementById("member_dis_response_status").setAttribute("data-validation", "required");
            document.getElementById("member_dis_status").setAttribute("data-validation", "required");
            document.getElementById("member_disease_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("member_disability_id_fk").setAttribute("data-validation", "required");
        } else if (type === 'good') {
            document.getElementById("member_dis_date_ar").setAttribute("disabled", "disabled");
            document.getElementById("member_dis_reason").setAttribute("disabled", "disabled");
            document.getElementById("member_dis_response_status").setAttribute("disabled", "disabled");
            document.getElementById("member_dis_status").setAttribute("disabled", "disabled");
            document.getElementById("member_disease_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_disability_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_dis_date_ar").removeAttribute("data-validation", "required");
            document.getElementById("member_dis_reason").removeAttribute("data-validation", "required");
            document.getElementById("member_dis_response_status").removeAttribute("data-validation", "required");
            document.getElementById("member_dis_status").removeAttribute("data-validation", "required");
            document.getElementById("member_disease_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("member_disability_id_fk").removeAttribute("data-validation", "required");
        } else if (type == 0) {
            document.getElementById("health_other").removeAttribute("disabled", "disabled");
            document.getElementById("health_other").setAttribute("data-validation", "required");
        }
    }
</script>
<!----------------------------------------------------حالة الفرد---------------------------------->
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    function ChangeFamilyMemberStatus(process_id, title, mom) {
        var reason = $('.reason' + mom).val();
        alert(reason);
        if (reason) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>/family_controllers/Family/change_family_members_status",
                data: {process_id: process_id, title: title, member_id: mom, reason: reason},
                success: function (d) {
                    alert("تم تغيير حاله الفرد");
                    location.reload();
                }
            });
        } else {
            alert("يجب إدخال السبب ");
        }
    }
</script>
<script>
    function ChangeMotherStatus(process_id, title, mom) {
        var reason_ids = [];
        $(".check-" + mom + ':radio:checked').each(function () {
            reason_ids.push($(this).val());
        })
        if (reason_ids.length == 0) {
            alert("من فضلك اختر السبب اولا");
            return;
        }
        var reason = $(".check-" + mom + ':radio:checked').val();
        //  var reason=$('.reason-'+mom).val();
        //  alert(reason);
        if (reason) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>/family_controllers/Family/change_mother_status",
                data: {process_id: process_id, title: title, mother_num: mom, reason: reason},
                success: function (d) {
                    alert("تم تغير حالة الام ");
                    location.reload();
                }
            });
        } else {
            alert("يجب إدخال السبب ");
        }
    }
</script>
<!----------------------------------------------------حالة الفرد---------------------------------->
<script>
    function get_code() {
        var valu = $('#hesab_name').val();
        var valu = valu.split("-");
        $('#bank_code').val(valu[1]);
    }
</script>
<script>
    function get_code2() {
        var valu = $('#m_account_id').val();
        var valu = valu.split("-");
        $('#ramz_code').val(valu[1]);
    }
</script>
<script>
    function checkMember() {
        var valu = $('#m_account').val();
        if (valu == 0) {
            document.getElementById("om_bank_num").setAttribute("disabled", "disabled");
            document.getElementById("hesab_name").setAttribute("disabled", "disabled");
        }
        if (valu == 1) {
            document.getElementById("om_bank_num").removeAttribute("disabled", "disabled");
            document.getElementById("hesab_name").removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function checkaccount() {
        var valu = $('#m_account_d').val();
        if (valu == 0) {
            document.getElementById("m_account_id").setAttribute("disabled", "disabled");
            document.getElementById("hesab_bank_2").setAttribute("disabled", "disabled");
        }
        if (valu == 1) {
            document.getElementById("hesab_bank_2").removeAttribute("disabled", "disabled");
            document.getElementById("m_account_id").removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function length_hesab_om(length) {
        var len = length.length;
        if (len < 24) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if (len > 24) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if (len == 24) {
            document.getElementById("buttons").removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function get_dar(valu) {
        if (valu == 2) {
            document.getElementById("member_dar_markz_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_dar_markz_id_fk").setAttribute("disabled", "disabled");
            $('#member_dar_markz_id_fk').val('');
        }
        if (valu == 1) {
            document.getElementById("member_dar_markz_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("member_dar_markz_id_fk").removeAttribute("disabled", "disabled");
        }
        if (valu == '') {
            document.getElementById("member_dar_markz_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_dar_markz_id_fk").setAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function GetMotherData(mother_num) {
        if (mother_num > 0 && mother_num != '') {
            var dataString = 'mother_num=' + mother_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family/GetMotherDataPopup',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#MotherDataDiv").html(html);
                }
            });
        }
    }
</script>
<script>
    function GetFamilyMemberData(member_id, mother_num) {
        if (member_id > 0 && member_id != '' && mother_num > 0) {
            var dataString = 'member_id=' + member_id + '&mother_num=' + mother_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family/GetFamilyMemberDataPopup',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#FamilyMemberDataDiv").html(html);
                }
            });
        }
    }
</script>
<script>
    function MyModalFunction(mod1) {
        $('#' + mod1).modal().hide();
    }
</script>
<script>
    function get_school() {
        dataString = "get_school=1";
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/get_school',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                // alert("in");
                $("#options_school").html(html);
            }
        });
        return false;
    }
    //------------------------------
    function out_school(value_html) {
        var value_id = $(value_html).val();
        var option = $(value_html).find('option:selected').text();
        dataString = "out_school=1" + "&school_id_fk=" + value_id + "&school_id_fk_value=" + option;
        // alert(dataString);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/get_school',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                // alert("out");
                $("#options_school").html(html);
            }
        });
        return false;
    }
</script>
<script>
    function ChangeFamilyMemberStatus(process_id, title, mom) {
        var reason_ids = [];
        $(".check" + mom + ':radio:checked').each(function () {
            reason_ids.push($(this).val());
        })
        if (reason_ids.length == 0) {
            alert("من فضلك اختر السبب اولا");
            return;
        }
        var reason = $(".check" + mom + ':radio:checked').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>/family_controllers/Family/change_family_members_status",
            data: {process_id: process_id, title: title, member_id: mom, reason: reason},
            success: function (d) {
                alert("تم تغيير حاله الفرد");
                location.reload();
            }
        });
    }
</script>
<script>
    function check_length_num(this_input, max_lenth, span_id) {
        if ($(this_input).val().length != max_lenth) {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            $('button[type="submit"]').attr("disabled", "disabled");
        } else {
            $(this_input).css("border-color", "green");
            $("#" + span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>