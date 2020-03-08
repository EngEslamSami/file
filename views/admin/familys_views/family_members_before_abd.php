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
$member_birth_date =$result[0]->member_birth_date_hijri;
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
    $id =$result[0]->id;
    $member_sechool_img =$result[0]->member_sechool_img;
    echo form_open_multipart('family_controllers/Family/update_family_members/'.$mother_national_num.'/'.$id);

    $button='update';

}else{
$member_full_name ='';
$member_status ='';
$member_birth_date ='';
    $member_card_num ='';
    $member_card_type ='';
    $school_id_fk='';
    $member_skill='';
    $education_type_result='';
    $member_email='';
    $stage_id_fk='';
    $class_id_fk='';
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

    echo form_open_multipart('family_controllers/Family/family_members/'.$mother_national_num);

    $button='add';



}
?>
<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">البيانات الأساسية</h3>
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

            </div>

            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الاسم رباعي <strong class="astric">*</strong> </label>
                    <input type="text" class=" some_class_2 form-control half input-style" name="member_full_name"  data-validation="required" value="<?php echo $member_full_name;?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> إسم الأب  <strong class="astric">*</strong> </label>

                    <input type="text" class="form-control half input-style" value="       <?php if(isset($father_table[0]->full_name) && $father_table[0]->full_name != null){
                        echo$father_table[0]->full_name;}  ?>" readonly="readonly" />

                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الحالة الإجتماعية <strong class="astric">*</strong> </label>
                    <select  name="member_status" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" >
                        <option value="">اختر</option>
                        <?php ?>
                        <?php foreach($scocial as $row_sco): $select=''; if(!empty($member_status)){ if($member_status ==$row_sco->id_setting){ $select ='selected';}}?>
                            <option value="<?php echo $row_sco->id_setting?>" <?php echo $select;?>><?php echo $row_sco->title_setting;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تاريخ الميلاد <strong class="astric">*</strong> </label>
                    <input type="text" class=" docs-date form-control half input-style" name="member_birth_date"  data-validation="required" value="<?php echo $member_birth_date;?>" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> الجنس  <strong class="astric">*</strong> </label>
                    <select name="member_gender" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true">
                        <?php $gender_arr=array('','ذكر','أنثى');?>
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($gender_arr);$a++){ $select=''; if($a== $member_gender){$select='selected';}?>
                            <option value="<?php echo$a; ?>" <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong> </label>
                    <input type="number" class=" form-control half input-style" name="member_card_num"  data-validation="required" value="<?php echo $member_card_num;?>" >
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> نوع الهوية<strong class="astric">*</strong> </label>
                    <select name="member_card_type" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true">

                        <option value="">اختر</option>
                        <?php foreach ($national_num_type as $one){  if(!empty($member_card_type)){$select=''; if($one->id_setting== $member_card_type){$select='selected';} }?>
                            <option value="<?php echo $one->id_setting; ?>" <?php echo$select; ?>><?php echo $one->title_setting; ?></option>
                        <?php }?>
                    </select>
                </div>


                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> المدرسة <strong class="astric">*</strong></label>
                    <select name="school_id_fk" id="school_id_fk" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"  >
                        <option value="">إختر</option>
                    <?php foreach ($schools as $row){
                        $select=''; if(!empty($school_id_fk)){ if($row->id_setting == $school_id_fk){$select='selected';} }
                        ?>
                        <option value="<?php echo $row->id_setting; ?>" <?php echo $select?>><?php echo $row->title_setting; ?></option>

                    <?php }?>
                    </select>

                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">المهارة <strong class="astric">*</strong></label>
                    <input type="text" name="member_skill" class="form-control half input-style"  data-validation="required" value="<?php echo $member_skill; ?>"/>
                </div>
            </div>



            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نوع التعليم <strong class="astric">*</strong></label>
                    <select name="education_type" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true">

                        <option value="">اختر</option>
                        <?php foreach($education_type as $row_ed){  $select=''; if(!empty($education_type_result)){ if($row_ed->id_setting == $education_type_result){$select='selected';} }?>
                            <option value="<?php echo $row_ed->id_setting;?>" <?php echo $select;?>><?php echo $row_ed->title_setting;?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">البريد الإلكترونى <strong class="astric">*</strong></label>
                    <input type="email" name="member_email" class="form-control half input-style" placeholder="البريد الإلكترونى"  data-validation="required" value="<?php echo$member_email; ?>" />
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">المرحلة <strong class="astric">*</strong></label>
                    <select  name="stage_id_fk" id="stage_id_fk"  onchange="get_stage_class($('#stage_id_fk').val());" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true">
                        <option value="">إختر المرحلة </option>
                        <?php foreach ($all_stages as $stage){

                            $select=''; if(!empty($stage_id_fk)){ if($stage->id == $stage_id_fk){$select='selected';} }
                            ?>
                            <option value="<?php echo $stage->id?>" <?php echo$select;?>><?php echo $stage->name?> </option>
                        <?php }?>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الصف<strong class="astric">*</strong></label>
                    <select name="class_id_fk"  id="class_id_fk"class="form-control half  "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" >
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
                    <label class="label label-green  half">تكاليف الدراسة   <strong class="astric">*</strong></label>
                    <input type="number" name="school_cost"  id="school_cost"  class="form-control half input-style" placeholder="تكاليف الدراسة"  data-validation="required"   value="<?php echo$school_cost; ?>" />
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">رقم الجوال  <strong class="astric">*</strong></label>
                    <input type="number" name="member_mob"  id="member_mob"  class="form-control half input-style" placeholder="رقم الجوال "  data-validation="required" value="<?php echo$member_mob; ?>"/>
                </div>

            </div>

            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">هل يصرف على أمه <strong class="astric">*</strong></label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_distracted_mother"    data-validation="required"  aria-required="true">
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
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_hij"    data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($yes_no);$a++){
                            $select=''; if(!empty($member_hij)){ if($a == $member_hij){$select='selected';} }
                            ?>
                            <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $yes_no[$a];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> أداء فريضة العمرة<strong class="astric">*</strong> </label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_omra"   data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($yes_no);$a++){   $select=''; if(!empty($member_omra)){ if($a == $member_omra){$select='selected';} }?>
                            <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $yes_no[$a];?></option>
                        <?php } ?>
                    </select>
                </div>

            </div>

            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">السكن <strong class="astric">*</strong></label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_home_type"    data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php

                        foreach ($member_home_type_arr as $a){  $select=''; if(!empty($member_home_type)){ if($a->id_setting == $member_home_type){$select='selected';} }?>
                            <option value="<?php echo $a->id_setting;?>" <?php echo $select;?>><?php echo $a->title_setting;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الدخل الشهرى  <strong class="astric">*</strong></label>
                    <input type="number" name="member_month_money" class="form-control half"  id="profession"   data-validation="required" value="<?php echo$member_month_money;?>"
                    />
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> المهنة<strong class="astric">*</strong> </label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"    name="member_job"   id="work"  data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php foreach ($job as $one_row){ $select=''; if(!empty($member_job)){ if($one_row->id_setting == $member_job){$select='selected';} }?>
                            <option value="<?php echo $one_row->id_setting; ?>"  <?php echo $select;?>><?php echo $one_row->title_setting; ?></option>
                        <?php }?>
                    </select>
                </div>


            </div>

            <div class="col-md-12">


                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> مكان العمل<strong class="astric">*</strong> </label>
                    <input type="text" name="member_job_place"  class="form-control half" placeholder="مكان العمل" id="member_job_place" data-validation="required" value="<?php echo$member_job_place;?>"  />
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> النشاط<strong class="astric">*</strong> </label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_activity_type"  id="activity_type"     data-validation="required"  aria-required="true">
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
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">نشاط أخر<strong class="astric">*</strong> </label>
                    <input type="text" name="member_activity_type_other"  class="form-control half" placeholder="أخري" id="activity_type_other"  value="<?php echo $member_activity_type_other;?>"/>
                </div>

            </div>
            <div class="col-md-12">

                <div class="form-group col-sm-4">
                    <label class="label label-green  half">الجنسية <strong class="astric">*</strong></label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_nationality"  id="member_nationality"         data-validation="required"  aria-required="true">
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
                    <input type="text" name="nationality_other"  class="form-control half" placeholder="أخري" id="nationality_other"  value="<?php echo $nationality_other;?>"/>
                </div>
                <div class="form-group col-sm-4">
                    <label class="label label-green  half"> الحالة الصحية<strong class="astric">*</strong> </label>
                    <select class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   name="member_health_type"  id="health_state"     data-validation="required"  aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        foreach ($health_status_array as $k):
                            $select=''; if(!empty($member_health_type)){ if($k->id_setting == $member_health_type){$select='selected';} }
                            ?>
                            <option value="<?php  echo $k->id_setting;?>" <?php echo $select;?>><?php  echo $k->title_setting;?></option>
                        <?php  endforeach;?>

                        <?php if($health_status_array !='' && !empty($health_status_array)){ if($member_health_type ==0){?>
                            <option value="0" selected>أخري</option>

                        <?php }else{?>
                            <option value="0" >أخري</option>

                        <?php } }?>

                    </select>
                </div>
            </div>
            

            <div class="col-md-12">
                <div class="form-group col-sm-4">
                    <label class="label label-green  half">  حالة  صحيةأخري<strong class="astric">*</strong> </label>
                    <input type="text" name="member_health_type_other"  class="form-control half" placeholder="أخري" id="health_other" value="<?php echo$member_health_type_other; ?>" />
                </div>


                <div class="form-group col-sm-4">
                    <label class="label label-green  half">شهادة الميلاد<strong class="astric">*</strong> </label>
                    <input type="file" name="member_birth_card_img" class="form-control half"  />
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


                <div class="form-group col-sm-4">
                    <label class="label label-green  half">تعريف المدرسة <strong class="astric">*</strong></label>
                    <input type="file" name="member_sechool_img" class="form-control half" />
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



            </div>


            <div class="col-md-12">
                <input type="hidden" name="max" id="max" />
                <div class="form-group col-sm-4">
                    <button type="submit" name="<?php echo $button;?>" value="<?php echo $button;?>"  class="btn btn-blue btn-previous">حفظ </button>
                </div>
            </div>

            <?php echo form_close()?>
            <!----------------------- table----------->

            <?php if(isset($member_data) && $member_data!=null): ?>
                <table class="table table-bordered" style="width:100%">
                    <header>
                        <tr>
                            <th>م </th>
                            <th>الإسم</th>
                            <th> إسم الام</th>
                            <th>رقم الهوية</th>
                            <th>الجنس </th>
                            <th>العمر</th>
                            <th>المهنة </th>
                            <th>المرحلة</th>
                            <th>الصف</th>
                            <th> حذف </th>
                        </tr>
                    </header>
                    <tbody>
                    <?php  $x=1; foreach($member_data as $row):?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo $row->member_full_name;  ?></td>
                            <td><?php echo $mothers_data[0]->full_name; ?></td>
                            <td><?php echo $row->member_card_num; ?></td>
                            <td><?php if($row->member_gender ==1){echo 'ذكر';}else{echo 'انثى'; } ?></td>
                            <td>
                                <?php $age='';
                                if($row->member_birth_date_year !='' && $row->member_birth_date_year !=0){$age=$cuttent_higry_year-$row->member_birth_date_year;}
                                $age=$cuttent_higry_year-$row->member_birth_date_year;
                                echo $age." عام";
                                ?>
                            </td>
                            <td>
                                <?php
                                      if(!empty($job)){
                                $job_titles_arr =array();
                                foreach ($job as $record){
                                    $job_titles_arr[$record->id_setting] = $record->title_setting;
                                }

                                echo $job_titles_arr[$row->member_job];  }?>
                            </td>
                            <td><?php if(!empty($row->stage_name)){echo $row->stage_name;}  ?></td>
                            <td><?php if(!empty($row->class_name)){echo $row->class_name; } ?></td>
                            <td>
                                <a href="<?php echo base_url().'family_controllers/Family/update_family_members/'.$mother_national_num.'/'.$row->id?>">
                                    <i class="fa fa-pencil " aria-hidden="true"></i></a>
                                <a href="<?php echo base_url().'family_controllers/Family/delete_member/'.$row->id?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>

                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            <?php endif;  ?>


            <!------------------------table---------->
        </div>
    </div>
</div>


<script>
    function get_stage_class(num){

        if(num>0 && num != ''){
            var id = num;
            var dataString ='main_stage=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Family/family_members/'.$mother_national_num,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#class_id_fk").html(html);
                }
            });
            return false;
        }
    }



</script>



<script>
    document.getElementById("member_nationality").onchange = function () {
        if (this.value == 0){
            document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
             document.getElementById("nationality_other").setAttribute("data-validation", "required");
        }else{
            document.getElementById("nationality_other").setAttribute("disabled", "disabled");
            $("#nationality_other").val("");
        }
    };


    document.getElementById("health_state").onchange = function () {
        if (this.value == '0'){
            document.getElementById("health_other").removeAttribute("disabled", "disabled");

        }else{
            document.getElementById("health_other").setAttribute("disabled", "disabled");
            document.getElementById("health_other").setAttribute("data-validation", "required");
        }
    };

    document.getElementById("activity_type").onchange = function () {

        if (this.value == '0'){
            document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
             document.getElementById("activity_type_other").setAttribute("data-validation", "required");
        }else{
            document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
        }
    };
</script>













