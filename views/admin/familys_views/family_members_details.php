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
    .help-block.form-error{
        color: #a94442  !important;
        font-size: 15px !important;
        position: absolute !important;
        bottom: -23px !important ;
        right: 50% !important ;
    }


    .small{
        position: absolute;
        bottom: -7px;
        right: 50%;
        font-size: 10px;
    }
</style>

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



    $member_disease_id_fk =$result[0]->member_disease_id_fk;
    $member_disability_id_fk =$result[0]->member_disability_id_fk;
    $member_dis_date_ar =$result[0]->member_dis_date_ar;
    $member_dis_response_status=$result[0]->member_dis_response_status;
    $member_dis_status=$result[0]->member_dis_status;
    $member_dis_reason =$result[0]->member_dis_reason;
//var_dump($member_activity_type); die;

    if($member_activity_type == 0){
echo'<script>
            document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
             document.getElementById("activity_type_other").setAttribute("data-validation", "required");

</script>';



    }else{
        echo'<script>
        document.getElementById("activity_type_other").setAttribute("disabled", "disabled");

</script>';



    }


    $member_activity_type_other =$result[0]->member_activity_type_other;
    $member_nationality =$result[0]->member_nationality;
    if($member_nationality == 0){
        echo'<script>
         document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
             document.getElementById("nationality_other").setAttribute("data-validation", "required");

</script>';



    }else{
        echo'<script>
     document.getElementById("nationality_other").setAttribute("disabled", "disabled");
</script>';



    }


    $nationality_other =$result[0]->nationality_other;
    $member_health_type =$result[0]->member_health_type;

    if($member_health_type == 0){
        echo'<script>
  document.getElementById("health_other").removeAttribute("disabled", "disabled");
               document.getElementById("health_other").setAttribute("data-validation", "required");

</script>';



    }else{
        echo'<script>
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
    /**************ahmed******/

}else{
    $member_house_check ='';
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

    $member_disease_id_fk ='';
    $member_disability_id_fk ='';
    $member_dis_date_ar ='';
    $member_dis_response_status='';
    $member_dis_status='';
    $member_dis_reason ='';

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
    /**************ahmed******/

}
?>
<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $header_title; ?></h3>
        </div>

        <div class="panel-body">
            <?php $yes_no =array('','نعم','لا'); ?>

            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> رقم السجل المدني للأم <strong class="astric">*</strong> </label>
                    <input type="number" class="form-control half input-style" value="<?php if(!empty($mothers_data[0]->mother_national_num_fk)){ echo$mothers_data[0]->mother_national_num_fk;}?>" readonly="readonly" />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> إسم الأم <strong class="astric">*</strong> </label>
                    <input type="text" class="form-control half input-style" value="<?php  if(!empty($mothers_data[0]->full_name)){echo $mothers_data[0]->full_name;} ?>" readonly="readonly" />
                </div>
              <!--  <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الصلة<strong class="astric">*</strong><strong></strong> </label>
                    <select name="member_relationship" id="member_relationship" class="form-control half" data-validation="required"  aria-required="true" >
                        <option value="">إختر</option>
                        <?php if(!empty($relationships)){ foreach ($relationships as  $key=>$record){
                            $select=''; if($member_relationship==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div> -->
                 <div class="form-group col-sm-4">
                    <label class="label label-green  half">الصورة الشخصية </label>
                    <input type="file" name="member_photo" class="form-control half" disabled />
                    <small class="small" style="bottom:-13px;">
                        <?php if (!empty($member_photo)){?>

                            <a href="<?php echo base_url()?>uploads/images/<?php echo $member_photo;?>" download> <i class="fa fa-download"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#myModal-member_photo-<?php echo $id;?>"> <i class="fa fa-eye"></i> </a>
                        <?php } ?>
                        برجاء إرفاق صورة
                    </small>
                </div>
                <div class="modal fade" id="myModal-member_photo-<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">الصورة الشخصية</h4>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo base_url()?>uploads/images/<?php echo $member_photo;?>" width="100%">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>


            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الاسم  <strong class="astric">*</strong> </label>
                    <input type="text" class=" some_class_2 form-control half input-style" name="member_full_name" disabled data-validation="required" value="<?php echo $member_full_name;?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> إسم الأب  <strong class="astric">*</strong> </label>

                    <input type="text" name="father_name" disabled class="form-control half input-style" value="       <?php if(isset($father_table[0]->full_name) && $father_table[0]->full_name != null){
                        echo$father_table[0]->full_name;}  ?>" readonly="readonly" />
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">طبيعة الفرد<strong class="astric">*</strong><strong></strong> </label>
                    <select  name="member_person_type" class="selectpicker no-padding form-control choose-date form-control half" disabled  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        foreach ($person_type as $row2):
                            $selected = '';
                            if ($row2->id_setting == $member_person_type) {
                                $selected = 'selected';
                            } ?>
                            <option
                                value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                        <?php endforeach
                        ;?>
                    </select>
                </div>
            </div>

            <div class="col-md-12">

                <div class="form-group col-sm-4 col-xs-12">
                    <?php if(!empty($member_birth_date)){ $gregorian_date=explode('/',$member_birth_date);} ?>
                    <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
                    <input class="textbox form-control" type="text" disabled name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))"  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; }?>"/>
                    <input class="textbox form-control" type="text" disabled name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))"   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1];}?>"/>
                    <input class="textbox4 form-control" type="text" disabled name="CYear"  id="CYear" pattern="\d*"  onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"    placeholder="year"  id="CYear" size="20" maxlength="4" style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2];}?>"/>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <?php if(!empty($member_birth_date_hijri)){ $hijri_date=explode('/',$member_birth_date_hijri);} ?>
                    <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
                    <input class="textbox form-control" type="text" disabled name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" value="<?php if(!empty($hijri_date[0])){echo $hijri_date[0];}?>"  placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                    <input class="textbox form-control" type="text" disabled name="HMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))" value="<?php if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                    <input class="textbox4 form-control" type="text" disabled name="HYear" pattern="\d*"
                    onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form);getAge();" value="<?php if(!empty($hijri_date[2])){echo $hijri_date[2];}?>"  placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong> </label>
                    <input class="textbox2 form-control half " type="text" disabled name="age" id="myage" size="60" id="wd" readonly  value="<?php  if(!empty($member_birth_date)){ echo (date('d-m-Y')-$member_birth_date); }?>"/>
                    <input class="textbox2 form-control half hidden" type="number" disabled name="wd" size="60" id="wd" readonly />
                    <input class="textbox2 hidden" type="text" name="JD" disabled size="60" id="JD" readonly />
                </div>

                </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> نوع الهوية<strong class="astric">*</strong> </label>
                    <select name="member_card_type" class="form-control half selectpicker " disabled data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true">

                        <option value="">اختر</option>
                        <?php foreach ($national_num_type as $one){  if(!empty($member_card_type)){$select=''; if($one->id_setting== $member_card_type){$select='selected';} }?>
                            <option value="<?php echo $one->id_setting; ?>" <?php echo$select; ?>><?php echo $one->title_setting; ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="member_card_num" disabled  id="member_card_num" data-validation="required" onkeyup="chek_length('member_card_num')" value="<?php echo $member_card_num?>" onkeypress="validate_number(event)" class="form-control half input-style" />
                    <span  id="member_card_num_span" class="span-validation"> </span>
                </div>



                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
                    <select  name="member_card_source" id="member_card_source" disabled class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">

                        <option value="">إختر</option>
                        <?php if(!empty($id_source)){ foreach ($id_source as $record){
                            $select=''; if($member_card_source==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>
            </div>


            <div class="col-md-12">

                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> الجنس  <strong class="astric">*</strong> </label>
                    <select name="member_gender" class="form-control half selectpicker "  disabled data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true">
                        <?php $gender_arr=array('','ذكر','أنثى');?>
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($gender_arr);$a++){ $select=''; if($a== $member_gender){$select='selected';}?>
                            <option value="<?php echo$a; ?>" <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12"  >
                    <label class="label label-green  half">ملتحق بالدار<strong class="astric">*</strong><strong></strong> </label>
                    <select  name="member_house_check" id="eldar" disabled class=" no-padding form-control choose-date form-control half " data-validation="required" aria-required="true"  >
                        <option value="">اختر</option>
                        <?php
                        $arr_yes_no=array('','نعم','لا');
                        for($r=1;$r<sizeof($arr_yes_no);$r++){
                            $selected='';if($r==$member_house_check){$selected='selected';}
                            ?>
                            <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">اسم الدار <strong class="astric">*</strong><strong></strong> </label>
                    <select class=" form-control half" name="member_house_id_fk"  id="member_house_id_fk"  <?php if($member_house_id_fk==""){?> disabled=""<?php }?> aria-disabled="true">
                        <option value="">اختر</option>
                        <?php
                        foreach ($women_houses as $row4):
                            $selected='';if($row4->id_setting==$member_house_id_fk){$selected='selected';}	?>
                            <option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
           <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الحالة الدراسية<strong class="astric">*</strong><strong></strong> </label>
                    <select name="member_study_case" id="member_study_case" onchange="get_out_age(this.value);" class="form-control half" disabled data-validation="required"  aria-required="true" >
                        <option value="">إختر</option>
                        <option value="0" <?php if($member_study_case == 0){echo 'selected'; }?>>(  دون سن الدراسة )</option>
                        <?php if(!empty($stude_case)){ foreach ($stude_case as $record){
                            $select=''; if($member_study_case==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">المستوي التعليمي<strong class="astric">*</strong><strong></strong> </label>
                    <select name="member_education_level" id="member_education_level" class="form-control half" disabled  data-validation="required"  aria-required="true" <?php if($member_study_case == 0){echo 'disabled=""'; }?> >
                        <option value="">إختر</option>
                        <?php if(!empty($education_level)){ foreach ($education_level as $record){
                            $select=''; if($member_education_level==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>
               
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نوع التعليم <strong class="astric">*</strong></label>
                    <select name="education_type" id="education_type" class="form-control half selectpicker " disabled  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" <?php if($member_study_case == 0){echo 'disabled=""'; }?>>

                        <option value="">اختر</option>
                        <?php foreach($education_type as $row_ed){  $select=''; if(!empty($education_type_result)){ if($row_ed->id_setting == $education_type_result){$select='selected';} }?>
                            <option value="<?php echo $row_ed->id_setting;?>" <?php echo $select;?>><?php echo $row_ed->title_setting;?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">المرحلة <strong class="astric">*</strong></label>
                    <select  name="stage_id_fk" id="stage_id_fk"  onchange="get_stage_class($('#stage_id_fk').val());" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"  disabled data-validation="required" aria-required="true" <?php if($member_study_case == 0){echo 'disabled=""'; }?>>
                        <option value="">إختر المرحلة </option>
                        <?php foreach ($all_stages as $stage){

                            $select=''; if(!empty($stage_id_fk)){ if($stage->id == $stage_id_fk){$select='selected';} }
                            ?>
                            <option value="<?php echo $stage->id?>" <?php echo$select;?>><?php echo $stage->name?> </option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الصف<strong class="astric">*</strong></label>
                    <select name="class_id_fk"  id="class_id_fk"class="form-control half  " disabled data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" <?php if($member_study_case == 0){echo 'disabled=""'; }?>>
                        <?php if(isset($all_classroom) && !empty($all_classroom) && $all_classroom !=null ){  ?>
                            <option value="">إختر الصف </option>
                            <?php  foreach ($all_classroom as $one_class){
                                $select=''; if(!empty($class_id_fk)){ if( $one_class->id == $class_id_fk){$select='selected';} }
                                ?>
                                <option value="<?php echo $one_class->id?>" <?php echo $select;?>><?php echo $one_class->name?> </option>
                            <?php }
                        }else{?>
                            <option>لا يوجد صفوف للمرحلة</option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> المدرسة <strong class="astric">*</strong></label>
                    <select name="school_id_fk" id="school_id_fk" class="form-control half selectpicker " disabled  data-show-subtext="true" data-live-search="true" <?php if($member_study_case == 0){echo 'disabled=""'; }?> >
                        <option value="">إختر</option>
                        <?php foreach ($schools as $row){
                            $select=''; if(!empty($school_id_fk)){ if($row->id_setting == $school_id_fk){$select='selected';} }
                            ?>
                            <option value="<?php echo $row->id_setting; ?>" <?php echo $select?>><?php echo $row->title_setting; ?></option>

                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مستوى التحصيل الدراسي<strong class="astric">*</strong><strong></strong> </label>
                    <select name="member_academic_achievement_level" id="member_academic_achievement_level" class="form-control half" disabled <?php if($member_study_case == 0){echo 'disabled=""'; }?>>
                        <option value="">إختر</option>
                        <?php if(!empty($academic_achievement_level)){ foreach ($academic_achievement_level as $record){
                            $select=''; if($member_academic_achievement_level==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تكاليف الدراسة   <strong class="astric">*</strong></label>
                    <input type="text" name="school_cost"  id="school_cost"  onkeypress="validate_number(event);" disabled class="form-control half input-style" placeholder="تكاليف الدراسة"  data-validation="required"   value="<?php echo$school_cost; ?>"  <?php if($member_study_case == 0){echo 'disabled=""'; }?>/>
                </div>
            </div>



            <div class="col-md-12">

                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الحالة الإجتماعية <strong class="astric">*</strong> </label>
                    <select  name="member_status" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" disabled >
                        <option value="">اختر</option>
                        <?php ?>
                        <?php foreach($scocial as $row_sco): $select=''; if(!empty($member_status)){ if($member_status ==$row_sco->id_setting){ $select ='selected';}}?>
                            <option value="<?php echo $row_sco->id_setting?>" <?php echo $select;?>><?php echo $row_sco->title_setting;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">المهارة <strong class="astric">*</strong></label>
                    <input type="text" name="member_skill" class="form-control half input-style"  data-validation="required" value="<?php echo $member_skill; ?>" disabled/>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم الجوال  <strong class="astric">*</strong></label>
                    <input type="text" name="member_mob"  id="member_mob"   onkeyup="chek_length('member_mob');"  onkeypress="validate_number(event);" class="form-control half input-style" placeholder="رقم الجوال "  data-validation="required" value="<?php echo$member_mob; ?>" disabled />
                    <span  id="member_mob_span" class="span-validation"> </span>
                </div>




            </div>


            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">البريد الإلكترونى <strong class="astric">*</strong></label>
                    <input type="email" name="member_email" class="form-control half input-style" placeholder="البريد الإلكترونى" disabled data-validation="required" value="<?php echo$member_email; ?>" />
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">هل يصرف على أمه <strong class="astric">*</strong></label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"  disabled name="member_distracted_mother"    data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($yes_no);$a++){

                            $select=''; if(!empty($member_distracted_mother)){ if($a == $member_distracted_mother){$select='selected';} }
                            ?>
                            <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $yes_no[$a];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">أداة فريضة الحج  <strong class="astric">*</strong></label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"  disabled name="member_hij"    data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($yes_no);$a++){
                            $select=''; if(!empty($member_hij)){ if($a == $member_hij){$select='selected';} }
                            ?>
                            <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $yes_no[$a];?></option>
                        <?php } ?>
                    </select>
                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> أداء فريضة العمرة<strong class="astric">*</strong> </label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_omra"  disabled data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($yes_no);$a++){   $select=''; if(!empty($member_omra)){ if($a == $member_omra){$select='selected';} }?>
                            <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $yes_no[$a];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">السكن <strong class="astric">*</strong></label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_home_type"  disabled  data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php

                        foreach ($member_home_type_arr as $a){  $select=''; if(!empty($member_home_type)){ if($a->id_setting == $member_home_type){$select='selected';} }?>
                            <option value="<?php echo $a->id_setting;?>" <?php echo $select;?>><?php echo $a->title_setting;?></option>
                        <?php } ?>
                    </select>
                </div>
               <div class="form-group col-sm-4">
                    <label class="label label-green  half"> المهنة<strong class="astric">*</strong> </label>
                    <select class="form-control half selectpicker" onchange="not_work($(this).val());"  data-show-subtext="true" data-live-search="true"    name="member_job" disabled  id="work"  data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <option value="0"  <?php if($member_job == 0){ echo 'selected';}?> >لا يعمل </option>
                        <?php foreach ($job as $one_row){ $select=''; if(!empty($member_job)){ if($one_row->id_setting == $member_job){$select='selected';} }?>
                            <option value="<?php echo $one_row->id_setting; ?>"  <?php echo $select;?>><?php echo $one_row->title_setting; ?></option>
                        <?php }?>
                    </select>
                </div>

            </div>

            <div class="col-md-12">

  <div class="form-group col-sm-4">
                    <label class="label label-green  half">الدخل الشهرى  <strong class="astric">*</strong></label>
                    <input type="text" name="member_month_money" id="member_month_money" class="form-control half" onkeypress="validate_number(event);"  id="profession"  disabled data-validation="required" value="<?php echo$member_month_money;?>"
                     <?php if($member_job == 0){ echo 'disabled=""';}?>  />
                </div>
               
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> مكان العمل<strong class="astric">*</strong> </label>
                    <input type="text" name="member_job_place"  id="member_job_place" class="form-control half" placeholder="مكان العمل" id="member_job_place" data-validation="required" value="<?php echo$member_job_place;?>"  <?php if($member_job == 0){ echo 'disabled=""';}?>  disabled/>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> النشاط<strong class="astric">*</strong> </label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_activity_type"  id="activity_type"  <?php if($member_job == 0){ echo 'disabled=""';}?>    data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php foreach ($member_activity_type_arr as $row){
                            $select=''; if(!empty($member_activity_type)){ if($row->id_setting == $member_activity_type){$select='selected';} }
                            ?>
                            <option value="<?php echo $row->id_setting; ?>" <?php echo $select?>><?php echo $row->title_setting; ?></option>

                        <?php }?>
                        <?php  if($member_activity_type_arr !='' && !empty($member_activity_type_arr)){if($member_activity_type ==0){?>
                            <option value="0" selected>نشاط أخر</option>

                        <?php }else{?>
                            <option value="0" >نشاط أخر</option>

                        <?php } }?>

                    </select>
                </div>

            </div>

            <div class="col-md-12">



                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نشاط أخر<strong class="astric">*</strong> </label>
                    <input type="text" name="member_activity_type_other"  class="form-control half" placeholder="أخري" id="activity_type_other"  <?php if($member_job == 0){ echo 'disabled=""';}?> value="<?php echo $member_activity_type_other;?>"/>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الجنسية <strong class="astric">*</strong></label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" disabled data-live-search="true"   name="member_nationality"  id="member_nationality"         data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php if(isset($nationalities) && $nationalities!=null):
                            foreach($nationalities as $one_nationality):

                                $select=''; if(!empty($member_nationality)){ if($one_nationality->id_setting == $member_nationality){$select='selected';} }
                                ?>
                                <option value="<?php echo $one_nationality->id_setting; ?>" <?php echo $select;?>><?php echo $one_nationality->title_setting; ?> </option>


                            <?php endforeach;endif ; ?>
                        <?php if($member_nationality !='' && !empty($member_nationality)){ if($member_nationality ==0){?>
                            <option value="0" selected>أخري</option>

                        <?php }else{?>
                            <option value="0" >أخري</option>

                        <?php }}?>

                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">  جنسيةأخري<strong class="astric">*</strong> </label>
                    <input type="text" name="nationality_other"  class="form-control half" placeholder="أخري" disabled id="nationality_other"  value="<?php echo $nationality_other;?>"/>
                </div>

            </div>
            <div class="col-md-12">

                <!--------------------------------------------------------ahmed-->
<div class="form-group col-sm-4">
    <label class="label label-green  half">الحالة الصحية<strong class="astric">*</strong><strong></strong> </label>
    <select  name="member_health_type" id="health_state" onchange="check()"  disabled
     data-validation="required" class=" no-padding form-control choose-date form-control half"    aria-required="true" الحالة الصحية>
        <option value="">اختر</option>
        <option value="disease" <?php if($member_health_type =='disease'){?>selected <?php } ?> > مريض </option>
        <option value="disability" <?php if($member_health_type =='disability'){?>selected <?php } ?>>معاق</option>
         <option value="good" <?php if($member_health_type =='good'){?>selected <?php } ?> >(سليم)</option>
        <?php
        foreach ($health_status_array as $row3): 
            $selected='';if($row3->id_setting==$member_health_type){$selected='selected';}	?>
            <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
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
                    <label class="label label-green  half">نوع المرض<strong class="astric">*</strong><strong></strong> </label>
                    <select  name="member_disease_id_fk" id="member_disease_id_fk" disabled
                      class=" no-padding form-control choose-date form-control half"    
                         aria-required="true"  <?php if($member_health_type !='disease'){ echo 'disabled=""'; } ?> >
                        <option value="">اختر</option>
                        <?php
                        foreach ($diseases as $row3):
                            $selected='';if($row3->id_setting==$member_disease_id_fk){$selected='selected';}	?>
                            <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  >
                                 <?php  echo $row3->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">نوع الإعاقة<strong class="astric">*</strong><strong></strong> </label>
                    <select  name="member_disability_id_fk" id="member_disability_id_fk" disabled class=" no-padding form-control choose-date form-control half"     aria-required="true"
                     <?php if($member_health_type !='disability'){ echo 'disabled="disabled"'; } ?>  >
                        <option value="">اختر</option>
                        <?php
                        foreach ($diseases as $row3):
                            $selected='';if($row3->id_setting==$member_disability_id_fk){$selected='selected';}	?>
                            <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12"> 
                    <label class="label label-green  half">تاريخ المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="member_dis_date_ar" id="member_dis_date_ar" 
                     value="<?php echo $member_dis_date_ar?>" class="form-control half input-style docs-date" disabled
                      data-validation="required"  <?php if($member_health_type =='good'){ echo 'disabled="disabled"'; } ?>  />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">سبب المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="member_dis_reason" id="member_dis_reason"  disabled
                     value="<?php echo $member_dis_reason?>" class="form-control half input-style "
                     
                      data-validation="required" <?php if($member_health_type =='good'){ echo 'disabled="disabled"'; } ?> />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">جهة المتابعة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                    <select  name="member_dis_response_status" id="member_dis_response_status" disabled
                      class=" no-padding form-control choose-date form-control half"  
                         data-validation="required" aria-required="true" 
                         <?php if($member_health_type =='good'){ echo 'disabled="disabled"'; } ?>>
                        <option value="">اختر</option>
                        <?php
                        foreach ($responses as $row3):
                            $selected='';if($row3->id_setting==$member_dis_response_status){$selected='selected';}	?>
                            <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  >
                            <?php  echo $row3->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">وضع الحالة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                    <select  name="member_dis_status" id="member_dis_status" class=" no-padding form-control choose-date form-control half"  
                        data-validation="required" aria-required="true" disabled
                        <?php if($member_health_type =='good'){ echo 'disabled="disabled"'; } ?>
                        > 
                        <option value="">اختر</option>
                        <?php
                        foreach ($diseases_status as $row3):
                            $selected='';if($row3->id_setting==$member_dis_status){$selected='selected';}	?>
                            <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
                <!--------------------------------------------------------ahmed-->




                <div class="form-group col-sm-4">
                    <label class="label label-green  half">شهادة الميلاد<strong class="astric">*</strong> </label>
                    <input type="file" name="member_birth_card_img" class="form-control half"  disabled/>
                    <small class="small" style="bottom:-13px;">
                        <?php if (!empty($member_birth_card_img)){?>

                            <a href="<?php echo base_url()?>uploads/images/<?php echo $member_birth_card_img;?>" download> <i class="fa fa-download"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#myModal-view<?php echo $id;?>"> <i class="fa fa-eye"></i> </a>
                        <?php } ?>
                        برجاء إرفاق صورة
                    </small>
                </div>
                <div class="modal fade" id="myModal-view<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">شهادة الميلاد</h4>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo base_url()?>uploads/images/<?php echo $member_birth_card_img;?>" width="100%">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">




                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تعريف المدرسة <strong class="astric">*</strong></label>
                    <input type="file" name="member_sechool_img" class="form-control half"  disabled/>
                    <small class="small" style="bottom:-13px;">
                        <?php if (!empty($member_sechool_img)){?>

                            <a href="<?php echo base_url()?>uploads/images/<?php echo $member_sechool_img;?>" download> <i class="fa fa-download"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#myModal-view2<?php echo $id;?>"> <i class="fa fa-eye"></i> </a>
                        <?php } ?>
                        برجاء إرفاق صورة
                    </small>
                </div>
                <div class="modal fade" id="myModal-view2<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">شهادة الميلاد</h4>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo base_url()?>uploads/images/<?php echo $member_sechool_img;?>" width="100%">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
             <?php

                if( $person_account_check ==0  &&  $agent_bank_account_check ==0 &&   $mother_last_account ==0 &&  $last_account == 0  ){?>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
                    <select name="member_account" id="member_account"  onchange="checkMember_account();" class="form-control half" disabled>
                        <?php $yes_no=array('لا','نعم');?>
                        <option value="">إختر</option>
                        <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $member_account==$s){$select='selected'; }?>
                            <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم الحساب<strong class="astric">*</strong><strong></strong> </label>
                    <select name="member_account_id" id="member_account_id" class="form-control half   "  disabled>
                        <?php $yes_no=array('لا','نعم');?>
                        <option value="">إختر</option>
                        <?php  if(!empty($banks)){
                            foreach ($banks as $bank){  $select=''; if(  $member_account_id == $bank->id){$select='selected'; }?>
                                <option value="<?php echo $bank->id;?>" <?php echo $select;?>><?php echo $bank->bank_name;?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <?php }elseif($member_account ==1  ){ ?>


                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
                        <select name="member_account" id="member_account"  onchange="checkMember_account();" class="form-control half" disabled>
                            <?php $yes_no=array('لا','نعم');?>
                            <option value="">إختر</option>
                            <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $member_account==$s){$select='selected'; }?>
                                <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">إسم الحساب<strong class="astric">*</strong><strong></strong> </label>
                        <select name="member_account_id" id="member_account_id" class="form-control half   "  disabled>
                            <?php $yes_no=array('لا','نعم');?>
                            <option value="">إختر</option>
                            <?php  if(!empty($banks)){
                                foreach ($banks as $bank){  $select=''; if( $member_account_id == $bank->id){$select='selected'; }?>
                                    <option value="<?php echo $bank->id;?>" <?php echo $select;?>><?php echo $bank->bank_name;?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>



                <?php } ?>



            </div>




            <?php echo form_close()?>

        </div>
    </div>
</div>


