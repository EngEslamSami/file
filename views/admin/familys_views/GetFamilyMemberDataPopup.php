<?php $yes_no =array('','نعم','لا'); ?>

<div class="col-sm-12 col-xs-12">
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> رقم السجل المدني للأم <strong class="astric">*</strong> </label>
        <input type="number" class="form-control half input-style" value="<?php if(!empty($mothers_data[0]->mother_national_num_fk)){ echo$mothers_data[0]->mother_national_num_fk;}else{ echo'غيرمحدد';}?>" readonly="readonly" />
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> إسم الأم <strong class="astric">*</strong> </label>
        <input type="text" class="form-control half input-style" value="<?php  if(!empty($mothers_data[0]->full_name)){echo $mothers_data[0]->full_name;}else{ echo'غيرمحدد';} ?>" readonly="readonly" />
    </div>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">الصورة الشخصية </label>
        <input type="file" name="member_photo" class="form-control half"  disabled />
        <small class="small" style="bottom:-13px;">
            <?php if (!empty($result[0]->member_photo)){?>

                <a href="<?php echo base_url()?>uploads/images/<?php echo $result[0]->member_photo;?>" download> <i class="fa fa-download"></i> </a>
                <a href="#" data-toggle="modal" data-target="#myModal-member_photo-<?php echo $result[0]->id;?>"> <i class="fa fa-eye"></i> </a>
            <?php } ?>
            برجاء إرفاق صورة
        </small>
    </div>
    <div class="modal fade" id="myModal-member_photo-<?php echo $result[0]->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">الصورة الشخصية</h4>
                </div>
                <div class="modal-body">
                    <img src="<?php echo base_url()?>uploads/images/<?php echo $result[0]->member_photo;?>" width="100%">
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
        <input type="text" class=" some_class_2 form-control half input-style" name="member_full_name"  disabled value="<?php echo $result[0]->member_full_name;?>" >
    </div>
    <div class="form-group col-sm-4">
        <label class="label label-green  half"> إسم الأب  <strong class="astric">*</strong> </label>

        <input type="text" name="father_name" class="form-control half input-style" value="       <?php if(isset($father_table[0]->full_name) && $father_table[0]->full_name != null){
            echo $father_table[0]->full_name;}  ?>" readonly="readonly" />
    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">طبيعة الفرد<strong class="astric">*</strong><strong></strong> </label>
        <select  name="member_person_type" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  disabled  aria-required="true">
            <option value="">اختر</option>
            <?php
            foreach ($person_type as $row2):
                $selected = '';
                if ($row2->id_setting == $result[0]->member_person_type) {
                    $selected = 'selected';
                } ?>
                <option
                    value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
            <?php endforeach
            ;?>
        </select>
    </div>




    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">الصلة<strong class="astric">*</strong><strong></strong> </label>
        <select name="member_relationship" id="member_relationship"  disabled aria-required="true" class="selectpicker no-padding form-control choose-date form-control half"

        >
            <option value="">إختر</option>
            <?php if(!empty($relationships)){ foreach ($relationships as $record){
                $select=''; if($result[0]->member_relationship == $record->id_setting){
                    $select='selected'; }
                ?>
                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
            <?php  } } ?>
        </select>
    </div>



    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">التصنيف<strong class="astric">*</strong><strong></strong> </label>
        <select  name="categoriey_member" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  disabled  aria-required="true">
            <?php $categories=array(1=>'ارمله',2=>'يتيم',3=>'مستفيد');?>
            <option value="">إختر</option>
            <?php foreach($categories as $key=>$value){  $select=''; if($result[0]->categoriey_member==$key){$select='selected'; }?>
                <option value="<?php echo $key;?>" <?php echo $select;?>><?php echo $value ;?></option>
            <?php } ?>
        </select>
    </div>




    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">حاله المستفيد<strong class="astric">*</strong><strong></strong> </label>
        <select name="halt_elmostafid_member " disabled="disabled" id="halt_elmostafid_member"   class="form-control half">
            <option value=""> اختر </option>

            <?php if(isset($member_family_status)&&!empty($member_family_status)) {
                foreach ($member_family_status as $record) {?>

                    <option value="<?php echo $record->id ;?>" <?php if($result[0]->halt_elmostafid_member==$record->id){?> selected="selected"<?php } ?>> <?php echo $record->title;?></option>





                <?php }

            }?>
        </select>

    </div>





</div>

<div class="col-md-12">

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="member_card_num"   id="member_card_num" disabled onkeyup="chek_length('member_card_num')" value="<?php echo $result[0]->member_card_num?>" onkeypress="validate_number(event)" class="form-control half input-style" />
        <span  id="member_card_num_span" class="span-validation"> </span>
    </div>
    <div class="form-group col-sm-4">
        <label class="label label-green  half"> نوع الهوية<strong class="astric">*</strong> </label>
        <select name="member_card_type" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   disabled aria-required="true">

            <option value="">اختر</option>
            <?php foreach ($national_num_type as $one){  if(!empty($result[0]->member_card_type)){$select=''; if($one->id_setting== $result[0]->member_card_type){$select='selected';} }?>
                <option value="<?php echo $one->id_setting; ?>" <?php echo$select; ?>><?php echo $one->title_setting; ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
        <select  name="member_card_source" id="member_card_source" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  disabled  aria-required="true">

            <option value="">إختر</option>
            <?php if(!empty($id_source)){ foreach ($id_source as $record){
                $select=''; if($result[0]->member_card_source==$record->id_setting){$select='selected'; }
                ?>
                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
            <?php  } } ?>
        </select>
    </div>






    <div class="form-group col-sm-4 col-xs-12">
        <?php if(!empty($result[0]->member_birth_date_hijri)){ $hijri_date=explode('/',$result[0]->member_birth_date_hijri);} ?>
        <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
        <input  disabled class="textbox form-control" type="text" name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" value="<?php if(!empty($hijri_date[0])){echo $hijri_date[0];}?>"  placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
        <input disabled class="textbox form-control" type="text" name="HMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))" value="<?php if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
        <input disabled class="textbox4 form-control" type="text" name="HYear" pattern="\d*"
               onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form);getAge();" value="<?php if(!empty($hijri_date[2])){echo $hijri_date[2];}?>"  placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <?php if(!empty($result[0]->member_birth_date)){ $gregorian_date=explode('/',$result[0]->member_birth_date);} ?>
        <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
        <input disabled class="textbox form-control" type="text" name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))"  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; }?>"/>
        <input disabled class="textbox form-control" type="text" name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))"   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1];}?>"/>
        <input disabled class="textbox4 form-control" type="text" name="CYear"  id="CYear" pattern="\d*"  onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"    placeholder="year"  id="CYear" size="20" maxlength="4" style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2];}?>"/>
    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong> </label>
        <input class="textbox2 form-control half " type="text" name="age" id="myage" size="60" id="wd" readonly  value="<?php  if(!empty($result[0]->member_birth_date_year)){ echo (date('Y')-$result[0]->member_birth_date_year); }?>"/>
        <input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd" readonly />
        <input class="textbox2 hidden" type="text" name="JD"  size="60" id="JD" readonly />
    </div>

</div>



<div class="col-md-12">






</div>
<div class="col-md-12">




    <div class="form-group col-sm-4">
        <label class="label label-green  half"> الجنس  <strong class="astric">*</strong> </label>
        <select name="member_gender" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   disabled aria-required="true">
            <?php $gender_arr=array('','ذكر','أنثى');?>
            <option value="">اختر</option>
            <?php for ($a=1;$a<sizeof($gender_arr);$a++){ $select=''; if($a== $result[0]->member_gender){$select='selected';}?>
                <option value="<?php echo$a; ?>" <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">ملتحق بدار أو مراكز الجمعيه   <strong class="astric">*</strong><strong></strong> </label>
        <select  name="member_dar_markz_check" onchange="get_dar($(this).val());" id="member_dar_markz_check" class=" no-padding form-control choose-date form-control half " disabled=""  >
            <option value="">اختر</option>
            <?php
            $arr_yes_no=array('','نعم','لا');
            for($r=1;$r<sizeof($arr_yes_no);$r++){
                $selected='';if($r==$result[0]->member_dar_markz_check){$selected='selected';}
                ?>
                <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
            <?php }?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">اسم الدار - مركز الجمعيه<strong class="astric">*</strong><strong></strong> </label>
        <select class=" form-control half" name="member_dar_markz_id_fk"  id="member_dar_markz_id_fk"  disabled="">
            <option value="">اختر</option>
            <?php
            foreach ($data_door_mrakz as $row7):
                $selected='';if($row7->id_setting==$result[0]->member_dar_markz_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $row7->id_setting;?>"  <?php echo $selected?> ><?php  echo $row7->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>





</div>



<div class="col-md-12">

    <div class="form-group col-sm-4 col-xs-12"  >
        <label class="label label-green  half">ملتحق بدار تابعه لجهات اخري<strong class="astric">*</strong><strong></strong> </label>
        <select  name="member_house_check" id="eldar" class=" no-padding form-control choose-date form-control half " disabled=""  >
            <option value="">اختر</option>
            <?php
            $arr_yes_no=array('','نعم','لا');
            for($r=1;$r<sizeof($arr_yes_no);$r++){
                $selected='';if($r==$result[0]->member_house_check){$selected='selected';}
                ?>
                <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
            <?php }?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">اسم الدار - المركز<strong class="astric">*</strong><strong></strong> </label>
        <select class=" form-control half" name="member_house_id_fk"  id="member_house_id_fk" <?php if($result[0]->member_house_id_fk==""){?> disabled=""<?php }?>>
            <option value="">اختر</option>
            <?php
            foreach ($women_houses as $row4):
                $selected='';if($row4->id_setting==$result[0]->member_house_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">الحالة الدراسية<strong class="astric">*</strong><strong></strong> </label>
        <select name="member_study_case" id="member_study_case"  class="form-control half" disabled="">
            <option value="">إختر</option>
            <option value="0" <?php if($result[0]->member_study_case == 0){echo 'selected'; }?>>(  دون سن الدراسة )</option>
            <?php if(!empty($stude_case)){ foreach ($stude_case as $record){
                $select=''; if($result[0]->member_study_case==$record->id_setting){$select='selected'; }
                ?>
                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
            <?php  } } ?>
        </select>
    </div>
    </div>
<div class="col-md-12">
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">المستوي التعليمي<strong class="astric">*</strong><strong></strong> </label>
        <select name="member_education_level" id="member_education_level" class="form-control half"  disabled="" >
            <option value="">إختر</option>
            <?php if(!empty($education_level)){ foreach ($education_level as $record){
                $select=''; if($result[0]->member_education_level==$record->id_setting){$select='selected'; }
                ?>
                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
            <?php  } } ?>
        </select>
    </div>

    <div class="form-group col-sm-4">
        <label class="label label-green  half">نوع التعليم <strong class="astric">*</strong></label>
        <select name="education_type" id="education_type" class="form-control half selectpicker "    disabled="" >

            <option value="">اختر</option>
            <?php foreach($education_type as $row_ed){  $select=''; if(!empty($result[0]->education_type_result)){ if($row_ed->id_setting == $result[0]->education_type_result){$select='selected';} }?>
                <option value="<?php echo $row_ed->id_setting;?>" <?php echo $select;?>><?php echo $row_ed->title_setting;?></option>
            <?php  } ?>
        </select>
    </div>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">المرحلة <strong class="astric">*</strong></label>
        <select  name="stage_id_fk" id="stage_id_fk"   class="form-control half  "  disabled="">
            <option value="">إختر المرحلة </option>
            <?php foreach ($all_stages as $stage){

                $select=''; if(!empty($result[0]->stage_id_fk)){ if($stage->id == $result[0]->stage_id_fk){$select='selected';} }
                ?>
                <option value="<?php echo $stage->id?>" <?php echo$select;?>><?php echo $stage->name?> </option>
            <?php }?>
        </select>
    </div>
    </div>
<div class="col-md-12">
    <div class="form-group col-sm-4">
        <label class="label label-green  half">الصف<strong class="astric">*</strong></label>
        <select name="class_id_fk"  id="class_id_fk"class="form-control half  "  data-show-subtext="true" data-live-search="true"   disabled="" >
            <?php if(isset($all_classroom) && !empty($all_classroom) && $all_classroom !=null ){  ?>
                <option value="">إختر الصف </option>
                <?php  foreach ($all_classroom as $one_class){
                    $select=''; if(!empty($result[0]->class_id_fk)){ if( $one_class->id == $result[0]->class_id_fk){$select='selected';} }
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
        <select name="school_id_fk" id="school_id_fk" class="form-control half  "  disabled="" >
            <option value="">إختر</option>
            <?php foreach ($schools as $row){
                $select=''; if(!empty($result[0]->school_id_fk)){ if($row->id_setting == $result[0]->school_id_fk){$select='selected';} }
                ?>
                <option value="<?php echo $row->id_setting; ?>" <?php echo $select?>><?php echo $row->title_setting; ?></option>

            <?php }?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">مستوى التحصيل الدراسي<strong class="astric">*</strong><strong></strong> </label>
        <select name="member_academic_achievement_level" id="member_academic_achievement_level" class="form-control half" disabled="">
            <option value="">إختر</option>
            <?php if(!empty($academic_achievement_level)){ foreach ($academic_achievement_level as $record){
                $select=''; if($result[0]->member_academic_achievement_level==$record->id_setting){$select='selected'; }
                ?>
                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
            <?php  } } ?>
        </select>
    </div>
    </div>
<div class="col-md-12">
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">تكاليف الدراسة   <strong class="astric">*</strong></label>
        <input type="text" name="school_cost"  id="school_cost"  onkeypress="validate_number(event);" class="form-control half input-style" placeholder="تكاليف الدراسة"  disabled   value="<?php echo$result[0]->school_cost; ?>"  <?php if($result[0]->member_study_case == 0){echo 'disabled=""'; }?>/>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">الحالة الإجتماعية <strong class="astric">*</strong> </label>
        <select  name="member_status" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   disabled aria-required="true" >
            <option value="">اختر</option>
            <?php ?>
            <?php foreach($scocial as $row_sco): $select=''; if(!empty($result[0]->member_status)){ if($result[0]->member_status ==$row_sco->id_setting){ $select ='selected';}}?>
                <option value="<?php echo $row_sco->id_setting?>" <?php echo $select;?>><?php echo $row_sco->title_setting;?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">المهارة <strong class="astric">*</strong></label>
        <input type="text" name="member_skill" class="form-control half input-style"  disabled value="<?php echo $result[0]->member_skill; ?>"/>
    </div>
</div>






<div class="col-md-12">
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">البريد الإلكترونى <strong class="astric">*</strong></label>
        <input type="email" name="member_email" class="form-control half input-style" placeholder="البريد الإلكترونى"  disabled value="<?php echo$result[0]->member_email; ?>" />
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">هل يصرف على أمه <strong class="astric">*</strong></label>
        <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_distracted_mother"    disabled  aria-required="true">
            <option value="">اختر</option>
            <?php for ($a=1;$a<sizeof($yes_no);$a++){

                $select=''; if(!empty($result[0]->member_distracted_mother)){ if($a == $result[0]->member_distracted_mother){$select='selected';} }
                ?>
                <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $yes_no[$a];?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">أداة فريضة الحج  <strong class="astric">*</strong></label>
        <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_hij"    disabled  aria-required="true">
            <option value="">اختر</option>
            <?php for ($a=1;$a<sizeof($yes_no);$a++){
                $select=''; if(!empty($result[0]->member_hij)){ if($a == $result[0]->member_hij){$select='selected';} }
                ?>
                <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $yes_no[$a];?></option>
            <?php } ?>
        </select>
    </div>

</div>
<div class="col-md-12">

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> أداء فريضة العمرة<strong class="astric">*</strong> </label>
        <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_omra"   disabled  aria-required="true">
            <option value="">اختر</option>
            <?php for ($a=1;$a<sizeof($yes_no);$a++){   $select=''; if(!empty($result[0]->member_omra)){ if($a == $result[0]->member_omra){$select='selected';} }?>
                <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $yes_no[$a];?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">السكن <strong class="astric">*</strong></label>
        <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_home_type"    disabled  aria-required="true">
            <option value="">اختر</option>
            <?php

            foreach ($member_home_type_arr as $a){  $select=''; if(!empty($result[0]->member_home_type)){ if($a->id_setting == $result[0]->member_home_type){$select='selected';} }?>
                <option value="<?php echo $a->id_setting;?>" <?php echo $select;?>><?php echo $a->title_setting;?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> المهنة<strong class="astric">*</strong> </label>
        <select class="form-control half selectpicker" onchange="not_work($(this).val());"  data-show-subtext="true" data-live-search="true"    name="member_job"   id="work"  disabled  aria-required="true">
            <option value="">اختر</option>
            <option value="0"  <?php if($result[0]->member_job == 0){ echo 'selected';}?> >لا يعمل </option>
            <?php foreach ($job as $one_row){ $select=''; if(!empty($result[0]->member_job)){ if($one_row->id_setting == $result[0]->member_job){$select='selected';} }?>
                <option value="<?php echo $one_row->id_setting; ?>"  <?php echo $select;?>><?php echo $one_row->title_setting; ?></option>
            <?php }?>
        </select>
    </div>

</div>

<div class="col-md-12">

    <div class="form-group col-sm-4">
        <label class="label label-green  half">الدخل الشهرى  <strong class="astric">*</strong></label>
        <input type="text" name="member_month_money" id="member_month_money" class="form-control half" onkeypress="validate_number(event);"  id="profession"   disabled value="<?php echo$result[0]->member_month_money;?>"
            <?php if($result[0]->member_job == 0){ echo 'disabled=""';}?>  />
    </div>

    <div class="form-group col-sm-4">
        <label class="label label-green  half"> مكان العمل<strong class="astric">*</strong> </label>
        <input type="text" name="member_job_place"  id="member_job_place" class="form-control half" placeholder="مكان العمل" id="member_job_place" disabled value="<?php echo$result[0]->member_job_place;?>"  <?php if($result[0]->member_job == 0){ echo 'disabled=""';}?> />
    </div>
    <div class="form-group col-sm-4">
        <label class="label label-green  half"> النشاط<strong class="astric">*</strong> </label>
        <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_activity_type"  id="activity_type"  <?php if($result[0]->member_job == 0){ echo 'disabled=""';}?>    disabled  aria-required="true">
            <option value="">اختر</option>
            <?php foreach ($member_activity_type_arr as $row){
                $select=''; if(!empty($result[0]->member_activity_type)){ if($row->id_setting == $result[0]->member_activity_type){$select='selected';} }
                ?>
                <option value="<?php echo $row->id_setting; ?>" <?php echo $select?>><?php echo $row->title_setting; ?></option>

            <?php }?>
            <?php  if($result[0]->member_activity_type_arr !='' && !empty($result[0]->member_activity_type_arr)){if($result[0]->member_activity_type ==0){?>
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
        <input type="text" name="member_activity_type_other"  class="form-control half" placeholder="أخري" id="activity_type_other"  <?php if($result[0]->member_job == 0){ echo 'disabled=""';}?> value="<?php echo $result[0]->member_activity_type_other;?>"/>
    </div>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">الجنسية <strong class="astric">*</strong></label>
        <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_nationality"  id="member_nationality"         disabled  aria-required="true">
            <option value="">اختر</option>
            <?php if(isset($nationalities) && $nationalities!=null):
                foreach($nationalities as $one_nationality):

                    $select=''; if(!empty($result[0]->member_nationality)){ if($one_nationality->id_setting == $result[0]->member_nationality){$select='selected';} }
                    ?>
                    <option value="<?php echo $one_nationality->id_setting; ?>" <?php echo $select;?>><?php echo $one_nationality->title_setting; ?> </option>


                <?php endforeach;endif ; ?>
            <?php if($result[0]->member_nationality !='' && !empty($result[0]->member_nationality)){ if($result[0]->member_nationality ==0){?>
                <option value="0" selected>أخري</option>

            <?php }else{?>
                <option value="0" >أخري</option>

            <?php }}?>

        </select>
    </div>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">  جنسيةأخري<strong class="astric">*</strong> </label>
        <input type="text" disabled="disabled"  name="nationality_other"  class="form-control half" placeholder="أخري" id="nationality_other"  value="<?php echo $result[0]->nationality_other;?>"/>
    </div>

</div>
<div class="col-md-12">

    <!--------------------------------------------------------ahmed-->
    <div class="form-group col-sm-4">
        <label class="label label-green  half">الحالة الصحية<strong class="astric">*</strong><strong></strong> </label>
        <select  name="member_health_type" id="health_state" onchange="check()"
                 disabled class=" no-padding form-control choose-date form-control half"    aria-required="true">
            <option value="">اختر</option>
            <option value="disease" <?php if($result[0]->member_health_type =='disease'){?>selected <?php } ?> > مريض </option>
            <option value="disability" <?php if($result[0]->member_health_type =='disability'){?>selected <?php } ?>>معاق</option>
            <option value="good" <?php if($result[0]->member_health_type =='good'){?>selected <?php } ?> >(سليم)</option>
            <?php
            foreach ($health_status_array as $row3):
                $selected='';if($row3->id_setting==$result[0]->member_health_type){$selected='selected';}	?>
                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
            <?php  endforeach;?>
            <!--  <option value="0" >أخري</option> -->
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">نوع المرض<strong class="astric">*</strong><strong></strong> </label>
        <select  name="member_disease_id_fk" id="member_disease_id_fk"
                 class=" no-padding form-control choose-date form-control half"
                 aria-required="true"  <?php if($result[0]->member_health_type !='disease'){ echo 'disabled=""'; } ?> >
            <option value="">اختر</option>
            <?php
            foreach ($diseases as $row3):
                $selected='';if($row3->id_setting==$result[0]->member_disease_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  >
                    <?php  echo $row3->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">نوع الإعاقة<strong class="astric">*</strong><strong></strong> </label>
        <select  name="member_disability_id_fk" id="member_disability_id_fk" class=" no-padding form-control choose-date form-control half"     aria-required="true"
            <?php if($result[0]->member_health_type !='disability'){ echo 'disabled="disabled"'; } ?>  >
            <option value="">اختر</option>
            <?php
            foreach ($diseases as $row3):
                $selected='';if($row3->id_setting==$result[0]->member_disability_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">تاريخ المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="member_dis_date_ar" id="member_dis_date_ar"
               value="<?php echo $result[0]->member_dis_date_ar?>" class="form-control half input-style docs-date"
               disabled  <?php if($result[0]->member_health_type =='good'){ echo 'disabled="disabled"'; } ?>  />
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">سبب المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="member_dis_reason" id="member_dis_reason"
               value="<?php echo $result[0]->member_dis_reason?>" class="form-control half input-style "

               disabled <?php if($result[0]->member_health_type =='good'){ echo 'disabled="disabled"'; } ?> />
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">جهة المتابعة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
        <select  name="member_dis_response_status" id="member_dis_response_status"
                 class=" no-padding form-control choose-date form-control half"
                 disabled aria-required="true"
            <?php if($result[0]->member_health_type =='good'){ echo 'disabled="disabled"'; } ?>>
            <option value="">اختر</option>
            <?php
            foreach ($responses as $row3):
                $selected='';if($row3->id_setting==$result[0]->member_dis_response_status){$selected='selected';}	?>
                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  >
                    <?php  echo $row3->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">وضع الحالة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
        <select  name="member_dis_status" id="member_dis_status" class=" no-padding form-control choose-date form-control half"
                 disabled aria-required="true"
            <?php if($result[0]->member_health_type =='good'){ echo 'disabled="disabled"'; } ?>
        >
            <option value="">اختر</option>
            <?php
            foreach ($diseases_status as $row3):
                $selected='';if($row3->id_setting==$result[0]->member_dis_status){$selected='selected';}	?>
                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>



    <div class="form-group col-sm-4">
        <label class="label label-green  half">رقم الجوال  <strong class="astric">*</strong></label>
        <input type="text" name="member_mob"  id="member_mob"   onkeyup="chek_length('member_mob');"  onkeypress="validate_number(event);" class="form-control half input-style" placeholder="رقم الجوال "  disabled value="<?php echo$result[0]->member_mob; ?>"/>
        <span  id="member_mob_span" class="span-validation"> </span>
    </div>





    <!--------------------------------------------------------ahmed-->




    <div class="form-group col-sm-4">
        <label class="label label-green  half">شهادة الميلاد<strong class="astric">*</strong> </label>
        <input type="file" name="member_birth_card_img" class="form-control half" disabled  />
        <small class="small" style="bottom:-13px;">
            <?php if (!empty($result[0]->member_birth_card_img)){?>

                <a href="<?php echo base_url()?>uploads/images/<?php echo $result[0]->member_birth_card_img;?>" download> <i class="fa fa-download"></i> </a>
                <a href="#" data-toggle="modal" data-target="#myModal-view<?php echo $result[0]->id;?>"> <i class="fa fa-eye"></i> </a>
            <?php } ?>
            برجاء إرفاق صورة
        </small>
    </div>
    <div class="modal fade" id="myModal-view<?php echo $result[0]->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">شهادة الميلاد</h4>
                </div>
                <div class="modal-body">
                    <img src="<?php echo base_url()?>uploads/images/<?php echo $result[0]->member_birth_card_img;?>" width="100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="MyModalFunction('myModal-view<?php echo $result[0]->id;?>')" >إغلاق</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-md-12">




    <div class="form-group col-sm-4">
        <label class="label label-green  half">تعريف المدرسة <strong class="astric">*</strong></label>
        <input type="file" name="member_sechool_img" class="form-control half" disabled />
        <small class="small" style="bottom:-13px;">
            <?php if (!empty($result[0]->member_sechool_img)){?>

                <a href="<?php echo base_url()?>uploads/images/<?php echo $result[0]->member_sechool_img;?>" download> <i class="fa fa-download"></i> </a>
                <a href="#" data-toggle="modal" data-target="#myModal-view2<?php echo $result[0]->id;?>"> <i class="fa fa-eye"></i> </a>
            <?php } ?>
            برجاء إرفاق صورة
        </small>
    </div>
    <div class="modal fade" id="myModal-view2<?php echo $result[0]->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">تعريف المدرسة </h4>
                </div>
                <div class="modal-body">
                    <img src="<?php echo base_url()?>uploads/images/<?php echo $result[0]->member_sechool_img;?>" width="100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="MyModalFunction('myModal-view2<?php echo $result[0]->id;?>')" >إغلاق</button>

                </div>
            </div>
        </div>
    </div>



    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">مكفول<strong class="astric">*</strong><strong></strong>
        </label>
        <select  name="guaranteed_member"
                 class="selectpicker no-padding form-control choose-date form-control half"
                 data-show-subtext="true"  disabled
                 aria-required="true">
            <?php $yes_no=array('لا','نعم');?>
            <option value="">إختر</option>
            <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if($result[0]->guaranteed_member==$s){$select='selected'; }?>
                <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
            <?php } ?>
        </select>
    </div>


<div class="col-md-12">
    <div class="form-group col-sm-4 col-xs-12"  >
        <label class="label label-green  half">طبيعة الشخصية<strong class="astric">*</strong><strong></strong> </label>
        <select  name="personal_character_id_fk" disabled id="personal_character_id_fk" class=" no-padding form-control choose-date form-control half "   aria-required="true"  >
            <option value="">اختر</option>
            <?php
            foreach ($personal_characters as $character):
                $selected='';if($character->id_setting== $result[0]->personal_character_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $character->id_setting; ?>"  <?php echo $selected?> ><?php  echo $character->title_setting;?></option>
            <?php  endforeach;?>
            <option value="0">أخري</option>
        </select>

    </div>



</div>

<div class="col-md-12">

    <div class="form-group col-sm-4 col-xs-12"  >
        <label class="label label-green  half">العلاقة بالأسرة<strong class="astric">*</strong><strong></strong> </label>
        <select  name="relation_with_family" id="relation_with_family" disabled class=" no-padding form-control choose-date form-control half "   aria-required="true"  >
            <option value="">اختر</option>
            <?php
            foreach ($relations_with_family as $relation):
                $selected='';if($relation->id_setting== $result[0]->relation_with_family){$selected='selected';}	?>
                <option value="<?php  echo $relation->id_setting; ?>"  <?php echo $selected?> ><?php  echo $relation->title_setting;?></option>
            <?php  endforeach;?>
            <option value="0">أخري</option>
        </select>

    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">المشكلات التعليمة</label>
        <textarea  name="education_problems" class="form-control half " style="width: 100%;" disabled ><?php echo $result[0]->education_problems; ?></textarea>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">الدورات التدريبية</label>
        <textarea name="courses_details" class="form-control half " style="width: 100%;" disabled ><?php echo $result[0]->courses_details; ?></textarea>
    </div>
 </div>




</div>

