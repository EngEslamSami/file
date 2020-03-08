<?php  $this->load->view('web/profile/mother_data')  ; ?>


<?php if(isset($member_data)&&!empty($member_data)){ ?>

    <div class="text-center  mother_form">

        <table width="50%">
            <tr>
                <td> <h5> لتعديل بيانات  الابناء واضافه ابناء  </h5></td>
                <td class="text-center">  <button class="btn" id="link_mother" onclick="hide_abna_form();" style="color: #11525d;background-color: #a5dcec;">اضغط هنا  </button>
                </td>
            </tr>
        </table>
    </div>



<?php } ?>

<?php
//var_dump($result);
?>
<div class="tab-content col-md-10 abna_form" <?php if(isset($member_data)&&!empty($member_data)){ ?>style="display: none; <?php } ?>">

    <?php
    if (isset($result) && !empty($result)) {
        $member_full_name =$result[0]->member_full_name;
        $member_status =$result[0]->member_status;
        $member_birth_date =$result[0]->member_birth_date;
        $member_birth_date_hijri =$result[0]->member_birth_date_hijri;
        $member_birth_date_hijri_year =$result[0]->member_birth_date_hijri_year;
        $member_birth_date_year =$result[0]->member_birth_date_year;
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

        /***********************************script*******************************/
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
        /***********************************script*******************************/
        $member_activity_type_other =$result[0]->member_activity_type_other;
        $member_nationality =$result[0]->member_nationality;
        /***********************************script*******************************/
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
        echo form_open_multipart('Mother_data/update_family_members/'.$this->uri->segment(3).'/'.$id);
        $button='update';
        $member_birth_date_hijri_year=$result[0]->member_birth_date_hijri_year;
        $member_relationship =$result[0]->member_relationship;
        $member_card_source =$result[0]->member_card_source;
        $member_study_case =$result[0]->member_study_case;
        $member_academic_achievement_level =$result[0]->member_academic_achievement_level;
        $member_person_type =$result[0]->member_person_type ;
        $member_education_level =$result[0]->member_education_level ;
        $member_house_check =$result[0]->member_house_check ;
        $member_house_id_fk =$result[0]->member_house_id_fk ;

    }else{
        $member_house_check ='';
        $member_house_id_fk ='';
        $member_full_name ='';
        $member_status ='';
        $member_birth_date ='';
        $member_birth_date_hijri ='';
        $member_birth_date_hijri_year ='';
        $member_birth_date_year ='';
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
        $member_account ='';
        $member_account_id ='';
        $member_photo="";
        $member_disease_id_fk ='';
        $member_disability_id_fk ='';
        $member_dis_date_ar ='';
        $member_dis_response_status='';
        $member_dis_status='';
        $member_dis_reason ='';
        echo form_open_multipart('Mother_data/family_members/'.$this->uri->segment(3));
        $button='add';
        $member_birth_date_hijri_year='';
        $member_relationship ='';
        $member_card_source ='';
        $member_study_case ='';
        $member_academic_achievement_level ='';
        $member_person_type ='';
        $member_education_level ='';
    } ?>
    <div class="panel-body">
        <?php $yes_no =array('','نعم','لا'); ?>

        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> رقم السجل المدني للأم  </label>
                <input type="number" class="form-control half input-style" value="<?php if(!empty($mothers_data[0]->mother_national_num_fk)){ echo$mothers_data[0]->mother_national_num_fk;}else{ echo $this->uri->segment(3); } ?>" readonly="readonly" />
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> إسم الأم  </label>
                <input type="text" class="form-control half input-style" value="<?php  if(!empty($mothers_data[0]->full_name)){echo $mothers_data[0]->full_name;} else { echo "لم يتم اضافته" ;  } ?>" readonly="readonly" />
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الصورة الشخصية </label>
                <input type="file" name="member_photo" class="form-control half"  />
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
                            <h4 class="modal-title" id="myModalLabel">شهادة الميلاد</h4>
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


            <div class="col-sm-12 ">
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green main-label  half">الاسم   </label>
                    <input type="text" class=" some_class_2 form-control half input-style" name="member_full_name"  data-validation="required" value="<?php echo $member_full_name;?>" >
                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green main-label  half"> إسم الأب   </label>

                    <input type="text" name="father_name" class="form-control half input-style" value="       <?php if(isset($father_table[0]->full_name) && $father_table[0]->full_name != null){
                        echo$father_table[0]->full_name;}  ?>" readonly="readonly" />
                </div>

                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green main-label  half">طبيعة الفرد </label>
                    <select  name="member_person_type" class="form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
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


        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <?php if(!empty($member_birth_date)){ $gregorian_date=explode('/',$member_birth_date);} ?>
                <label class="label label-green main-label  half">تاريخ الميلاد </label>
                <input class="textbox form-control" type="text" name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth')); checkMaxNum($(this).val(),31,'CDay');"  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; }?>"/>
                <input class="textbox form-control" type="text" name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear')); checkMaxNum($(this).val(),12,'CMonth');"   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1];}?>"/>
                <input class="textbox4 form-control" type="text" name="CYear"  id="CYear" pattern="\d*"  onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"    placeholder="year"  id="CYear" size="20" maxlength="4" style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2];}?>"/>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <?php if(!empty($member_birth_date_hijri)){ $hijri_date=explode('/',$member_birth_date_hijri);} ?>
                <label class="label label-green main-label  half">تاريخ الميلاد هجرى </label>
                <input class="textbox form-control" type="text" name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" value="<?php if(!empty($hijri_date[0])){echo $hijri_date[0];}?>"  placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                <input class="textbox form-control" type="text" name="HMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))" value="<?php if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                <input class="textbox4 form-control" type="text" name="HYear" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form)" value="<?php if(!empty($hijri_date[2])){echo $hijri_date[2];}?>"  placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">العمر </label>
                <input class="textbox2 form-control half " type="text" name="age" id="myage" size="60" id="wd" readonly  value="<?php  if(!empty($member_birth_date_year)){ echo ( date('Y-m-d')-$member_birth_date_year ); }?>"/>
                <input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd" readonly />
                <input class="textbox2 hidden" type="text" name="JD"  size="60" id="JD" readonly />
            </div>
        </div>

        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> نوع الهوية </label>
                <select name="member_card_type" class="form-control half"  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true">

                    <option value="">اختر</option>
                    <?php  if(!empty($national_num_type)){ foreach ($national_num_type as $one){  $select=''; if(!empty($member_card_type)){ if($one->id_setting== $member_card_type){$select='selected';} }?>
                        <option value="<?php echo $one->id_setting; ?>" <?php echo$select; ?>><?php echo $one->title_setting; ?></option>
                    <?php } } ?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"><span class="pull-right" style="    background-color: #fff;color: #008996;padding: 0 6px;border-radius: 7px;"> 10 ارقام فقط</span>رقم الهوية </label>
                <input type="text" name="member_card_num"  maxlength="10"  placeholder="رقم الهوية" id="member_card_num" data-validation="required" onkeyup="check_id_number(this.value,'member_card_num_span')" value="<?php echo $member_card_num?>" onkeypress="validate_number(event)" class="form-control half input-style" />
            <span id="member_card_num_span"></span>
            </div>


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">مصدر الهوية </label>
                <select  name="member_card_source" id="member_card_source" class="form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">

                    <option value="">إختر</option>
                    <?php if(!empty($id_source)){ foreach ($id_source as $record){
                        $select=''; if($member_card_source==$record->id_setting){$select='selected'; }
                        ?>
                        <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                    <?php  } } ?>
                </select>
            </div>
        </div>




        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> الجنس   </label>
                <select name="member_gender" class="form-control half  "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true">
                    <?php $gender_arr=array('','ذكر','أنثى');?>
                    <option value="">اختر</option>
                    <?php for ($a=1;$a<sizeof($gender_arr);$a++){ $select=''; if($a== $member_gender){$select='selected';}?>
                        <option value="<?php echo$a; ?>" <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4"  >
                <label class="label label-green main-label  half">ملتحق بالدار </label>
                <select  name="member_house_check" id="eldar" class="form-control half " data-validation="required" aria-required="true"  >
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
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">اسم الدار  </label>
                <select class=" form-control half" name="member_house_id_fk"  id="member_house_id_fk" <?php if($member_house_id_fk==""){?> disabled=""<?php }?>>
                    <option value="">اختر</option>
                    <?php
                    foreach ($women_houses as $row4):
                        $selected='';if($row4->id_setting==$member_house_id_fk){$selected='selected';}	?>
                        <option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
        </div>
        <div class="col-sm-12 ">

            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الحالة الدراسية </label>
                <select name="member_study_case" id="member_study_case" onchange="get_out_age($(this).val());" class="form-control half" data-validation="required"  aria-required="true" >
                    <option value="">إختر</option>
                    <option value="0" <?php if($member_study_case == 0){echo 'selected'; }?>>(  دون سن الدراسة )</option>
                    <?php if(!empty($stude_case)){ foreach ($stude_case as $record){
                        $select=''; if($member_study_case ==$record->id_setting){$select='selected'; }
                        ?>
                        <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                    <?php  } } ?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">المستوي التعليمي </label>
                <select name="member_education_level" id="member_education_level" class="form-control half"  data-validation="required"  aria-required="true" <?php if($member_study_case == 0){echo 'disabled="disabled"'; }?>>
                    <option value="">إختر</option>
                    <?php if(!empty($education_level)){ foreach ($education_level as $record){
                        $select=''; if($member_education_level==$record->id_setting){$select='selected'; }
                        ?>
                        <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                    <?php  } } ?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">نوع التعليم </label>
                <select name="education_type" id="education_type" class="form-control half"  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" <?php if($member_study_case == 0){echo 'disabled="disabled"'; }?> >

                    <option value="">اختر</option>
                    <?php foreach($education_type as $row_ed){  $select=''; if(!empty($education_type_result)){ if($row_ed->id_setting == $education_type_result){$select='selected';} }?>
                        <option value="<?php echo $row_ed->id_setting;?>" <?php echo $select;?>><?php echo $row_ed->title_setting;?></option>
                    <?php  } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">المرحلة </label>
                <select  name="stage_id_fk" id="stage_id_fk" <?php if($member_study_case == 0){echo 'disabled="disabled"'; }?>  onchange="get_stage_class($('#stage_id_fk').val());" class="form-control half"  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" <?php if($member_study_case == 0){echo 'disabled="disabled"'; }?>>
                    <option value="">إختر المرحلة </option>
                    <?php foreach ($all_stages as $stage){

                        $select=''; if(!empty($stage_id_fk)){ if($stage->id == $stage_id_fk){$select='selected';} }
                        ?>
                        <option value="<?php echo $stage->id?>" <?php echo$select;?>><?php echo $stage->name?> </option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الصف</label>
                <select name="class_id_fk"  id="class_id_fk"class="form-control half" <?php if($member_study_case == 0){echo 'disabled="disabled"'; }?>  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" >
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
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> المدرسة </label>
                <select name="school_id_fk" id="school_id_fk" class="form-control half"  data-show-subtext="true" data-live-search="true"  <?php if($member_study_case == 0){echo 'disabled="disabled"'; }?>>
                    <option value="">إختر</option>
                    <?php foreach ($schools as $row){
                        $select=''; if(!empty($school_id_fk)){ if($row->id_setting == $school_id_fk){$select='selected';} }
                        ?>
                        <option value="<?php echo $row->id_setting; ?>" <?php echo $select?>><?php echo $row->title_setting; ?></option>

                    <?php }?>
                </select>
            </div>
        </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">مستوى التحصيل الدراسي </label>
                <select name="member_academic_achievement_level" id="member_academic_achievement_level" class="form-control half" <?php if($member_study_case == 0){echo 'disabled="disabled"'; }?>>
                    <option value="">إختر</option>
                    <?php if(!empty($academic_achievement_level)){ foreach ($academic_achievement_level as $record){
                        $select=''; if($member_academic_achievement_level==$record->id_setting){$select='selected'; }
                        ?>
                        <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                    <?php  } } ?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">تكاليف الدراسة   </label>
                <input type="text" name="school_cost"  id="school_cost"  onkeypress="validate_number(event);" class="form-control half input-style" placeholder="تكاليف الدراسة"  data-validation="required"   value="<?php echo$school_cost; ?>" <?php if($member_study_case == 0){echo 'disabled="disabled"'; }?> />
            </div>



            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الحالة الإجتماعية  </label>
                <select  name="member_status" class="form-control half  "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" >
                    <option value="">اختر</option>
                    <?php ?>
                    <?php foreach($scocial as $row_sco): $select=''; if(!empty($member_status)){ if($member_status ==$row_sco->id_setting){ $select ='selected';}}?>
                        <option value="<?php echo $row_sco->id_setting?>" <?php echo $select;?>><?php echo $row_sco->title_setting;?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">المهارة </label>
                <input type="text" name="member_skill" class="form-control half input-style"  data-validation="required" value="<?php echo $member_skill; ?>"/>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"><span class="pull-right" style="    background-color: #fff;color: #008996;padding: 0 6px;border-radius: 7px;"> 10 ارقام فقط</span> رقم الجوال </label>
                <input type="text" name="member_mob"  id="member_mob"  maxlength="10"  onkeyup="check_len($(this).val(),'member_mob_span');"  onkeypress="validate_number(event);" class="form-control half input-style" placeholder="رقم الجوال "  data-validation="required" value="<?php echo$member_mob; ?>"/>
                <span id="member_mob_span"></span>
            </div>


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">البريد الإلكترونى </label>
                <input type="email" name="member_email" class="form-control half input-style" placeholder="البريد الإلكترونى"  data-validation="required" value="<?php echo$member_email; ?>" />
            </div>
        </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">هل يصرف على أمه </label>
                <select class="form-control half  "  data-show-subtext="true" data-live-search="true"   name="member_distracted_mother"    data-validation="required"  aria-required="true">
                    <option value="">اختر</option>
                    <?php for ($a=1;$a<sizeof($yes_no);$a++){

                        $select=''; if(!empty($member_distracted_mother)){ if($a == $member_distracted_mother){$select='selected';} }
                        ?>
                        <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $yes_no[$a];?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">أداة فريضة الحج  </label>
                <select class="form-control half  "  data-show-subtext="true" data-live-search="true"   name="member_hij"    data-validation="required"  aria-required="true">
                    <option value="">اختر</option>
                    <?php for ($a=1;$a<sizeof($yes_no);$a++){
                        $select=''; if(!empty($member_hij)){ if($a == $member_hij){$select='selected';} }
                        ?>
                        <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $yes_no[$a];?></option>
                    <?php } ?>
                </select>
            </div>




            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> أداء فريضة العمرة </label>
                <select class="form-control half  "  data-show-subtext="true" data-live-search="true"   name="member_omra"   data-validation="required"  aria-required="true">
                    <option value="">اختر</option>
                    <?php for ($a=1;$a<sizeof($yes_no);$a++){   $select=''; if(!empty($member_omra)){ if($a == $member_omra){$select='selected';} }?>
                        <option value="<?php echo $a;?>" <?php echo $select;?>><?php echo $yes_no[$a];?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">السكن </label>
                <select class="form-control half  "  data-show-subtext="true" data-live-search="true"   name="member_home_type"    data-validation="required"  aria-required="true">
                    <option value="">اختر</option>
                    <?php

                    foreach ($member_home_type_arr as $a){  $select=''; if(!empty($member_home_type)){ if($a->id_setting == $member_home_type){$select='selected';} }?>
                        <option value="<?php echo $a->id_setting;?>" <?php echo $select;?>><?php echo $a->title_setting;?></option>
                    <?php } ?>
                </select>
            </div>



            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> المهنة </label>
                <select class="form-control half  "  data-show-subtext="true" data-live-search="true"    name="member_job"   id="work"  data-validation="required"  aria-required="true" onchange="work_status($(this).val())">
                    <option value="0">لايعمل</option>
                    <?php foreach ($job as $one_row){ $select=''; if(!empty($member_job)){ if($one_row->id_setting == $member_job){$select='selected';} }?>
                        <option value="<?php echo $one_row->id_setting; ?>"  <?php echo $select;?>><?php echo $one_row->title_setting; ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الدخل الشهرى  </label>
                <input type="text" name="member_month_money" class="form-control half" onkeypress="validate_number(event);"  id="profession"   data-validation="required" value="<?php echo$member_month_money;?>"
                />
            </div>
        </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> مكان العمل </label>
                <input type="text" name="member_job_place"  class="form-control half" placeholder="مكان العمل" id="member_job_place" disabled="disabled" data-validation="required" value="<?php echo$member_job_place;?>"  />
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half"> النشاط </label>
                <select class="form-control half  "  data-show-subtext="true" data-live-search="true"   name="member_activity_type"  id="activity_type"  disabled="disabled"   data-validation="required"  aria-required="true">
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


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">نشاط أخر </label>
                <input type="text" name="member_activity_type_other"  class="form-control half" placeholder="أخري" id="activity_type_other" disabled="disabled" value="<?php echo $member_activity_type_other;?>"/>
            </div>
        </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الجنسية </label>
                <select class="form-control half"  data-show-subtext="true" data-live-search="true"   name="member_nationality"  id="member_nationality"         data-validation="required"  aria-required="true">
                    <option value="">اختر</option>
                    <?php if(isset($nationalities) && $nationalities!=null):
                        foreach($nationalities as $one_nationality):

                            $select=''; if(!empty($member_nationality)){ if($one_nationality->id_setting == $member_nationality){$select='selected';} }
                            ?>
                            <option value="<?php echo $one_nationality->id_setting; ?>" <?php echo $select;?>><?php echo $one_nationality->title_setting; ?> </option>


                        <?php endforeach;endif ; ?>
                    <?php if( !empty($member_nationality) && $member_nationality ==0){?>
                        <option value="0" selected>أخري</option>

                    <?php }else{?>
                        <option value="0" >أخري</option>

                    <?php }?>

                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">  جنسيةأخري </label>
                <input type="text" name="nationality_other"  class="form-control half" placeholder="أخري" id="nationality_other"  value="<?php echo $nationality_other;?>"/>
            </div>


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الحالة الصحية </label>
                <select  name="member_health_type" id="health_state" onchange="check()"  data-validation="required" class="form-control half"    aria-required="true">
                    <option value="">اختر</option>
                    <option value="disease" <?php if($member_health_type ==='disease'){?>selected <?php } ?> > مريض </option>
                    <option value="disability" <?php if($member_health_type ==='disability'){?>selected <?php } ?>>معاق</option>
                    <option value="good" <?php if($member_health_type ==='good'){?>selected <?php } ?> >(سليم)</option>
                    <?php
                    foreach ($health_status_array as $row3):
                        $selected='';if($row3->id_setting==$member_health_type){$selected='selected';}	?>
                        <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                    <?php  endforeach;?>
                    <option value="0" >أخري</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">  حالة  صحيةأخري </label>
                <input type="text" name="member_health_type_other"  class="form-control half" placeholder="أخري" id="health_other" value="<?php echo$member_health_type_other; ?>" />
            </div>


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">نوع المرض </label>
                <select  name="member_disease_id_fk" id="member_disease_id_fk"  class="form-control half"     aria-required="true"  <?php $disabled='disabled="disabled"';if($member_health_type ==='disease'){$disabled='';} echo $disabled ;?>>
                    <option value="">اختر</option>
                    <?php
                    foreach ($diseases as $row3):
                        $selected='';if($row3->id_setting==$member_disease_id_fk){$selected='selected';}	?>
                        <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">نوع الإعاقة </label>
                <select  name="member_disability_id_fk" id="member_disability_id_fk" class="form-control half"     aria-required="true" <?php $disabled1='disabled="disabled"';if($member_health_type ==='disability'){$disabled1='';} echo $disabled1 ;?>>
                    <option value="">اختر</option>
                    <?php
                    foreach ($diseases as $row3):
                        $selected='';if($row3->id_setting==$member_disability_id_fk){$selected='selected';}	?>
                        <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
        </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">تاريخ المرض/الإعاقة  </label>
                <input type="text" name="member_dis_date_ar" id="member_dis_date_ar"  value="<?php echo $member_dis_date_ar?>" class="form-control half input-style docs-date"  data-validation="required" <?php if($member_health_type ==='good'){?> disabled="disabled" <?php  } ?> />
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">سبب المرض/الإعاقة  </label>
                <input type="text" name="member_dis_reason" id="member_dis_reason"  value="<?php echo $member_dis_reason?>" class="form-control half input-style " data-validation="required" <?php if($member_health_type ==='good'){?> disabled="disabled" <?php  } ?>/>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">جهة المتابعة المرض/الإعاقة  </label>
                <select  name="member_dis_response_status" id="member_dis_response_status" class=" no-padding form-control choose-date form-control half"     data-validation="required" aria-required="true" <?php if($member_health_type ==='good'){?> disabled="disabled" <?php  } ?>>
                    <option value="">اختر</option>
                    <?php
                    foreach ($responses as $row3):
                        $selected='';if($row3->id_setting==$member_dis_response_status){$selected='selected';}	?>
                        <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
        </div>
        <div class="col-sm-12 ">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">وضع الحالة المرض/الإعاقة  </label>
                <select  name="member_dis_status" id="member_dis_status" class="form-control half"   data-validation="required" aria-required="true" <?php if($member_health_type ==='good'){?> disabled="disabled" <?php  } ?>>
                    <option value="">اختر</option>
                    <?php
                    foreach ($diseases_status as $row3):
                        $selected='';if($row3->id_setting==$member_dis_status){$selected='selected';}	?>
                        <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
            <!--------------------------------------------------------ahmed-->




            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">شهادة الميلاد </label>
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






            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">تعريف المدرسة </label>
                <input type="file" name="member_sechool_img" class="form-control half" />
                <small class="small" style="bottom:-13px;">
                    <?php if (!empty($member_sechool_img)){?>

                        <a href="<?php echo base_url()?>uploads/images/<?php echo $member_sechool_img;?>" download> <i class="fa fa-download"></i> </a>
                        <a href="#" data-toggle="modal" data-target="#myModal-view2<?php echo $id;?>"> <i class="fa fa-eye"></i> </a>
                    <?php } ?>
                    برجاء إرفاق صورة
                </small>
            </div>
        </div>
        <div class="col-sm-12 ">
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
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green main-label  half">مسئول الحساب </label>
                    <select name="member_account" id="member_account"  onchange="checkMember_account();" class="form-control half">
                        <?php $yes_no=array('لا','نعم');?>
                        <option value="">إختر</option>
                        <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $member_account==$s){$select='selected'; }?>
                            <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green main-label  half">إسم الحساب </label>
                    <select name="member_account_id" id="member_account_id" class="form-control half   "  >
                        <?php $yes_no=array('لا','نعم');?>
                        <option value="">إختر</option>
                        <?php  if(!empty($banks)){
                            foreach ($banks as $bank){  $select=''; if(  $member_account_id == $bank->id){$select='selected'; }?>
                                <option value="<?php echo $bank->id;?>" <?php echo $select;?>><?php echo $bank->bank_name;?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
            <?php  } if($member_account ==1  ){ ?>


                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green main-label  half">مسئول الحساب </label>
                    <select name="member_account" id="member_account"  onchange="checkMember_account();" class="form-control half">
                        <?php $yes_no=array('لا','نعم');?>
                        <option value="">إختر</option>
                        <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $member_account==$s){$select='selected'; }?>
                            <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green main-label  half">إسم الحساب </label>
                    <select name="member_account_id" id="member_account_id" class="form-control half   "  >
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

            <div class="form-group col-xs-12">
                <input type="hidden" name="max" id="max" />
                <button type="submit" class="btn btn-default btn-sm btn-save mt-10" name="<?php echo $button;?>" id="buttons" value="<?php echo $button;?>">حفظ الأن</button>
            </div>



            <?php echo form_close()?>
            <!-- --------------------- table--------- -->
            <?php if(isset($member_data) && $member_data!=null){ ?>

                <table class="table table-bordered" style="width:100%">
                    <header>
                        <tr class="info">
                            <th>م </th>
                            <th width="22%">الإسم</th>
                            <th> إسم الام</th>
                            <th>رقم الهوية</th>
                            <th>الجنس </th>
                            <th>العمر</th>
                            <th>المهنة </th>
                            <th>المرحلة</th>
                            <th>الصلة</th>
                            <th> حذف </th>
                        </tr>
                    </header>
                    <tbody>
                    <?php if(isset($mothers_data) && $mothers_data!=null){ ?>
                        <tr>
                            <td>1</td>
                            <td><?php echo $mothers_data[0]->full_name;   ?></td>
                            <td>----</td>
                            <td><?php echo $mothers_data[0]->mother_national_num_fk; ?></td>
                            <td>انثى</td>
                            <td>
                                <?php $age='';
                                if($mothers_data[0]->m_birth_date_year !='' && $mothers_data[0]->m_birth_date_year !=0){

                                    $age= date('Y-m-d') - $mothers_data[0]->m_birth_date_year;
                                }
                                echo $age." عام";
                                ?>
                            </td>
                            <td>
                                <?php
                                if(!empty($job)){
                                    $job_titles_arr =array();
                                    foreach ($job as $record){
                                        $job_titles_arr[$mothers_data[0]->m_job_id_fk] = $record->title_setting;
                                    }

                                    echo $job_titles_arr[$mothers_data[0]->m_job_id_fk];  }?>
                            </td>
                            <td>--</td>
                            <td>أم</td>
                            <td>
                            </td>

                        </tr>
                    <?php }?>
                    <?php  $x=2; foreach($member_data as $row):?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo $row->member_full_name;  ?></td>
                            <td><?php if(isset($mothers_data[0]->full_name)){ echo $mothers_data[0]->full_name ;} ?></td>
                            <td><?php echo $row->member_card_num; ?></td>
                            <td><?php if($row->member_gender ==1){echo 'ذكر';}else{echo 'انثى'; } ?></td>
                            <td>
                                <?php $age='';
                                if($row->member_birth_date_year !='' && $row->member_birth_date_year !=0){
                                    $age=date('Y-m-d')-$row->member_birth_date_year;
                                }

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

                                   if(isset($job_titles_arr[$row->member_job])) { echo $job_titles_arr[$row->member_job];
                                   }else{
                                    echo "لا يعمل "; 
                                   } }?>
                            </td>
                            <td><?php if(!empty($row->stage_name)){echo $row->stage_name;}  ?></td>
                            <td><?php if(!empty($row->class_name)){echo $row->class_name; } ?></td>
                            <!-- <td><?php if (!empty($relationships_titles[$row->member_relationship])){echo $relationships_titles[$row->member_relationship];}?></td>
                           --> <td>
                                <a href="<?php echo base_url().'Mother_data/update_family_members/'.$mother_national_num.'/'.$row->id?>">
                                    <i class="fa fa-pencil " aria-hidden="true"></i></a>
                                <a href="#" data-toggle="modal" data-target="#modal-delete<?php echo $row->id;?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                            <div class="modal" id="modal-delete<?php echo$row->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p id="text">هل أنت متأكد من الحذف؟</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                                            <a  href="<?php echo base_url().'Mother_data/delete_member/'.$row->id.'/'.$mother_national_num?>"> <button type="button" name="save" value="save" class="btn btn-danger remove" id="Delete-Record">نعم</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

            <?php }?>

            <!------------------------table---------->
        </div>
    </div>

</div><!-- end of container -->

</section>

<!--------------------------------------------------- members----------------------------------------->

<script>
    function get_out_age(value_id){   //  education_type  stage_id_fk    class_id_fk  school_id_fk member_academic_achievement_level

        if(value_id != 0){

            document.getElementById("member_education_level").removeAttribute("disabled", "disabled");
            document.getElementById("education_type").removeAttribute("disabled", "disabled");
            document.getElementById("stage_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("class_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("school_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("member_academic_achievement_level").removeAttribute("disabled", "disabled");
            document.getElementById("school_cost").removeAttribute("disabled", "disabled");

            document.getElementById("education_type").setAttribute("data-validation", "required");
            document.getElementById("stage_id_fk").setAttribute("data-validation", "required");
            document.getElementById("class_id_fk").setAttribute("data-validation", "required");
            document.getElementById("school_id_fk").setAttribute("data-validation", "required");
            document.getElementById("member_academic_achievement_level").setAttribute("data-validation", "required");
            document.getElementById("school_cost").setAttribute("data-validation", "required");
        } else if(value_id == 0){    //  school_cost stage_id_fk
            document.getElementById("member_education_level").setAttribute("disabled", "disabled");
            document.getElementById("education_type").setAttribute("disabled", "disabled");
            document.getElementById("stage_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("class_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("school_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_academic_achievement_level").setAttribute("disabled", "disabled");
            document.getElementById("school_cost").setAttribute("disabled", "disabled");

            document.getElementById("education_type").removeAttribute("data-validation", "required");
            document.getElementById("stage_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("class_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("school_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("member_academic_achievement_level").removeAttribute("data-validation", "required");
            document.getElementById("school_cost").removeAttribute("data-validation", "required");

        }
    }

</script>

<script>
    function get_stage_class(num){

        if(num>0 && num != ''){

            var id = num;
            var dataString ='main_stage=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Mother_data/family_members/<?php echo $this->uri->segment(3);?>',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#class_id_fk').html(html);
                }
            });

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




    document.getElementById("activity_type").onchange = function () {

        if (this.value == '0'){
            document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
            document.getElementById("activity_type_other").setAttribute("data-validation", "required");
        }else{
            document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
        }
    };
</script>

<script>

    /* function chek_length(inp_id)
     {
     var inchek_id="#"+inp_id;
     var inchek =$(inchek_id).val();
     if(inchek.length < 10){

     document.getElementById("buttons").setAttribute("disabled", "disabled");
     var inchek_out= inchek.substring(0,10);
     $(inchek_id).val(inchek_out);

     }

     if(inchek.length > 10){

     document.getElementById("buttons").setAttribute("disabled", "disabled");
     var inchek_out= inchek.substring(0,10);
     $(inchek_id).val(inchek_out);
     }

     if(inchek.length == 10){
     document.getElementById("buttons").removeAttribute("disabled", "disabled");

     }
     }*/

</script>

<script>




    function getAge() {
        var nowYear =(new Date()).getFullYear();
        var myAge = ( nowYear- $('#CYear').val() );
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

<script>
    document.getElementById('eldar').onchange=function() {
        var x = $(this).val();


        if (x == 1) {

            document.getElementById("member_house_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("member_house_id_fk").setAttribute("data-validation", "required");;

        }else{
            document.getElementById("member_house_id_fk").value='';
            document.getElementById("member_house_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_house_id_fk").removeAttribute("data-validation", "required");;
        }
    }
</script>

<script>
    document.getElementById("health_other").setAttribute("disabled", "disabled");

    function check() {

        var type =$('#health_state').val();

        if(type === 'disease') {   //  removeAttribute      setAttribute
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

        }else if(type === 'disability'){ //  removeAttribute      setAttribute
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


        }else if(type === 'good'){
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

        } else if(type == 0){
            document.getElementById("health_other").removeAttribute("disabled", "disabled");
            document.getElementById("health_other").setAttribute("data-validation", "required");

        }
    }



</script>



<script>
    function hide_abna_form() {

        $('.mother_form').hide();
        $('.abna_form').show();

    }
</script>
<script>
    function check_len(valu,span_id2)
    {
        if(valu.length>10) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");

            document.getElementById(span_id2).style.color = '#F00';
            document.getElementById(span_id2).innerHTML = ' الجوال لا يزيد عن 10 ارقام';


        }
        if(valu.length<10) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");
            document.getElementById(span_id2).style.color = '#F00';
            document.getElementById(span_id2).innerHTML = ' الجوال لا يقل عن 10 ارقام';

        }
        if(valu.length==10) {
            document.getElementById(span_id2).style.color = '#11d63b';

            document.getElementById("buttons").removeAttribute("disabled", "disabled");
            document.getElementById(span_id2).innerHTML = ' الجوال متاح';

        }

    }
</script>


<script>
    function check_id_number(valu,span_id2)
    {
        if(valu.length>10) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");

            document.getElementById(span_id2).style.color = '#F00';
            document.getElementById(span_id2).innerHTML = ' الهوية لا يزيد عن 10 ارقام';


        }
        if(valu.length<10) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");
            document.getElementById(span_id2).style.color = '#F00';
            document.getElementById(span_id2).innerHTML = ' الهوية لا يقل عن 10 ارقام';

        }
        if(valu.length==10) {
            document.getElementById(span_id2).style.color = '#11d63b';

            document.getElementById("buttons").removeAttribute("disabled", "disabled");
            document.getElementById(span_id2).innerHTML = ' الهوية متاح';

        }

    }
</script>

<script>
    function work_status(value) {
        if(value == 0){
            document.getElementById("profession").setAttribute("disabled", "disabled");
            document.getElementById("member_job_place").setAttribute("disabled", "disabled");
            document.getElementById("activity_type").setAttribute("disabled", "disabled");
            document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
            document.getElementById("profession").removeAttribute("data-validation", "required");
            document.getElementById("member_job_place").removeAttribute("data-validation", "required");
            document.getElementById("activity_type").removeAttribute("data-validation", "required");
            document.getElementById("activity_type_other").removeAttribute("data-validation", "required");


            $("#member_job_place").val('');
            $("#activity_type").val('');
            $("#activity_type_other").val('');
            $("#profession").val('');

        }else{
            document.getElementById("member_job_place").removeAttribute("disabled", "disabled");
            document.getElementById("activity_type").removeAttribute("disabled", "disabled");
            document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
            document.getElementById("profession").removeAttribute("disabled", "disabled");
            document.getElementById("member_job_place").setAttribute("data-validation", "required");
            document.getElementById("activity_type").setAttribute("data-validation", "required");
            document.getElementById("activity_type_other").setAttribute("data-validation", "required");
            document.getElementById("profession").setAttribute("data-validation", "required");

        }
    }
    function checkMaxNum(value, maxNum, div) {


        if(value > maxNum){

            $("#"+div).val(maxNum);
            alert("من فضلك ادخل قيمه اصغر من " +maxNum);


        }

    }



</script>
<!------------------------------------------------------members-------------------------------------->