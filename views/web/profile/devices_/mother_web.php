<?php  $this->load->view('web/profile/mother_data')  ; ?>
<div class="tab-content col-md-10">



    <div class="panel-pody">
        <?php
        if(isset($mother)&&!empty($mother)){





            $full_name=$mother->full_name;
            $person_type2=$mother->person_type;
            $m_national_id_type=$mother->m_national_id_type;
            $m_card_source=$mother->m_card_source;
            $m_birth_date= $mother->m_birth_date;
            $m_birth_date_hijri=$mother->m_birth_date_hijri;
            $m_nationality=$mother->m_nationality;
            $nationality_other=$mother->nationality_other;
            $m_marital_status_id_fk=$mother->m_marital_status_id_fk;
            $m_living_place_id_fk=$mother->m_living_place_id_fk;
            $m_living_place=$mother->m_living_place;
            $m_education_status_id_fk=$mother->m_education_status_id_fk;
            $m_education_level_id_fk=$mother->m_education_level_id_fk;
            $m_specialization=$mother->m_specialization;
            //===========
            $m_health_status_id_fk=$mother->m_health_status_id_fk;
            $disease_id_fk=$mother->disease_id_fk;
            $disability_id_fk=$mother->disability_id_fk;
            $dis_date_ar=$mother->dis_date_ar;
            $dis_reason=$mother->dis_reason;
            $dis_response_status=$mother->dis_response_status;
            $dis_status=$mother->dis_status;
            $m_hijri=$mother->m_hijri;
            $m_ommra=$mother->m_ommra;
            $m_mob=$mother->m_mob;
            $m_another_mob=$mother->m_another_mob;
            $m_email=$mother->m_email;
            $m_skill_name=$mother->m_skill_name;
            $m_want_work=$mother->m_want_work;
            $m_job_id_fk=$mother->m_job_id_fk;
            $m_monthly_income=$mother->m_monthly_income;
            $m_place_mob=$mother->m_place_mob;
            $m_place_work=$mother->m_place_work;
            $m_account=$mother->m_account;
            $m_account_id=$mother->m_account_id;
            $m_female_house_check=$mother->m_female_house_check;
            $m_female_house_id_fk=$mother->m_female_house_id_fk;



        }else{
            $full_name="";
            $person_type2="";
            $m_national_id_type="";
            $m_card_source="";
            $m_birth_date="";
            $m_birth_date_hijri="";
            $m_nationality="";
            $nationality_other="";
            $m_marital_status_id_fk="";
            $m_living_place_id_fk="";
            $m_living_place="";
            $m_education_status_id_fk="";
            $m_education_level_id_fk="";
            $m_specialization="";
            //=====================
            $m_female_house_id_fk="";

            $m_health_status_id_fk="";
            $disease_id_fk="";
            $disability_id_fk="";
            $dis_date_ar="";
            $dis_reason="";
            $dis_response_status="";
            $dis_status="";
            $m_hijri="";
            $m_ommra="";
            $m_mob="";
            $m_another_mob="";
            $m_email="";
            $m_skill_name="";
            $m_want_work="";
            $m_job_id_fk="";
            $m_monthly_income="";

            $m_place_mob="";
            $m_place_work="";
            $m_account="";
            $m_account_id="";
            $m_female_house_check="";


        }







        ?>
        <?php if(isset($mother)&&!empty($mother)){ ?>

            <div class="text-center  mother_form">

            <table width="50%">
                <tr>
                    <td> <h5> لتعديل بيانات الام</h5></td>
                    <td class="text-center">  <button class="btn" id="link_mother" onclick="hide_mother_form();" style="color: #11525d;background-color: #a5dcec;">اضغط هنا  </button>
                    </td>
                </tr>
            </table>
            </div>



        <?php } ?>



        <form  id="mother_form" action="<?php echo base_url();?>Mother_data/mother/<?php echo $this->uri->segment(3);?>" method="post"<?php if(isset($mother)&&!empty($mother)){ ?> style="display: none;" <?php } ?>>
            <?php
            $arr_yes_no=array('','نعم','لا');
            ?>
            <div class="col-md-12">
            <div class="form-group col-sm-4 col-xs-12 padding-4">

                <label class="label label-green main-label  half">رقم السجل المدني للأم<strong class="astric">*</strong> </label>
                <input type="text" name=""  readonly=""  value="<?php echo $this->uri->segment(3);?>" class="form-control half input-style"  />

            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">

                <label class="label label-green main-label  half"> الاسم الرباعي <strong class="astric">*</strong> </label>
                <input type="text" name="fullname"   value="<?php echo $full_name;?>" class="form-control half input-style"  data-validation="required" />

            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">طبيعة الفرد<strong class="astric">*</strong><strong></strong> </label>
                <select  name="person_type" class="form-control  half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                    <option value="">اختر</option>
                    <?php
                    foreach ($person_type as $row2):
                        $selected = '';
                        if ($row2->id_setting == $person_type2) {
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
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">نوع الهوية<strong class="astric">*</strong><strong></strong> </label>
                <select  name="m_national_id_type" class="form-control  half"  data-show-subtext="true" data-live-search="true"    data-validation="required" aria-required="true">
                    <option value="">اختر</option>
                    <?php
                    foreach ($national_id_array as $row2):
                        $selected = '';
                        if ($row2->id_setting == $m_national_id_type) {
                            $selected = 'selected';
                        } ?>
                        <option
                            value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                    <?php endforeach
                    ;?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
                <select  name="m_card_source" id="m_card_source"  data-validation="required" class="form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true">

                    <option value="">إختر</option>
                    <?php if(!empty($id_source)){ foreach ($id_source as $record){
                        $select=''; if($m_card_source==$record->id_setting){$select='selected'; }
                        ?>
                        <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                    <?php  } } ?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <?php
                $gregorian_date=explode('/',$m_birth_date); 	 ?>

                <label class="label label-green main-label  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
                <input class="textbox form-control" data-validation="required" type="text" name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))"  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; }?>"/>
                <input class="textbox form-control" data-validation="required" type="text" name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))"   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1]; }?>"/>
                <input class="textbox4 form-control" data-validation="required" type="text" name="CYear"  id="CYear" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"   placeholder="year"  id="CYear" size="20" maxlength="4"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2]; }?>"/>

            </div>
                </div>
            <div class="col-md-12">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <?php  $hijri_date=explode('/',$m_birth_date_hijri); ?>
                <label class="label label-green main-label  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
                <input class="textbox form-control" type="text" name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('Hmonth'))"   placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"value="<?php if(!empty($hijri_date[0])){echo $hijri_date[0];}?>" />
                <input class="textbox form-control" type="text" name="HMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))"   placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"value="<?php if(!empty($hijri_date[1])){echo $hijri_date[1];}?>"/>
                <input class="textbox4 form-control" type="text" name="HYear" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form)"   placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"value="<?php if(!empty($hijri_date[2])){echo $hijri_date[2];}?>"/>
            </div>


            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">العمر<strong class="astric">*</strong><strong></strong> </label>
                <input class="textbox2 form-control half " type="text" name="age" id="myage" readonly="readonly"    value="<?php  if(!empty($gregorian_date[2])){ echo (date('Y-m-d')-$gregorian_date[2]); }?>"  />
                <input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd" readonly />
                <input class="textbox2 hidden" type="text" name="JD"  size="60" id="JD" readonly />
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الجنسية<strong class="astric">*</strong><strong></strong> </label>

                <select  name="m_nationality" id="m_nationality" data-validation="required" class="form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true" onchange="make_nantion_dis($(this).val())" >
                    <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)){?>
                        <option value="">اختر</option>

                        <?php  foreach ($nationality as $record):

                            $selected='';if($record->id_setting==$m_nationality){$selected='selected';}?>
                            <option value="<?php  echo $record->id_setting;?>" <?php echo $selected?>  ><?php  echo $record->title_setting;?></option>
                        <?php  endforeach;?>
                        <option value="0"<?php if($m_nationality==0) echo "selected";?> >اخري</option>
                    <?php }else {
                        ?>
                        <option value="" selected>اختر</option>
                        <option value="0"<?php if($m_nationality==0) echo "selected";?> >اخري</option>
                        <?php
                    }
                    ?>
                </select>



            </div>
                </div>
            <div class="col-md-12">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">اضافه جنسيه اخري<strong class="astric">*</strong><strong></strong> </label>
                <input type="text" name="nationality_other" id="nationality_other"   value="<?= $nationality_other ?>"  class="form-control half input-style" <?php if(!isset($nationality_other)&&$m_nationality!=0){?> disabled="disabled"<?php }?>/>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الحالة الإجتماعية<strong class="astric">*</strong><strong></strong> </label>
                <select  name="m_marital_status_id_fk"  data-validation="required" class="form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true" >
                    <option value="">اختر</option>
                    <?php foreach ($marital_status_array as $row6):
                        $selected='';if($row6->id_setting==$m_marital_status_id_fk){$selected='selected';}   ?>
                        <option value="<?php  echo $row6->id_setting;?>"  <?php echo $selected?>  ><?php  echo $row6->title_setting;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">السكن<strong class="astric">*</strong><strong></strong> </label>
                <select name="m_living_place_id_fk" id="living_place_id" data-validation="required"  class="form-control half"  data-show-subtext="" data-live-search="" onchange="make_dis($(this).val());"   aria-required="true" >
                    <?php if(isset($living_place_array) && $living_place_array!=null &&!empty($living_place_array)) { ?>
                        <option value="">اختر</option>
                        <?php
                        foreach ($living_place_array as $row):
                            $selectedx = '';
                            if ($row->id_setting == $m_living_place_id_fk) {
                                $selectedx = 'selected';
                            } ?>
                            <option
                                value="<?php echo $row->id_setting; ?>"<?php echo $selectedx ?> ><?php echo $row->title_setting; ?></option>
                        <?php endforeach; ?>
                        <option value="0"<?php if ($m_living_place_id_fk == 0) echo "selected"; ?> >اخري</option>
                        <?php
                    }else {
                        ?>
                        <option value="" selected>اختر</option>
                        <option value="0"<?php if ($m_living_place_id_fk == 0) echo "selected"; ?> >اخري</option>
                        <?php
                    }
                    ?>
                </select>
            </div>
                </div>
            <div class="col-md-12">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">اضافه محل سكن<strong class="astric">*</strong><strong></strong> </label>
                <input type="text" name="m_living_place"  id="m_living_place"  value="<?php echo $m_living_place;?>"  class="form-control half input-style"  disabled="" />
            </div>

            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">الحالة الدراسية <strong class="astric">*</strong><strong></strong> </label>
                <select name="m_education_status_id_fk"  data-validation="required" class="form-control half"  data-show-subtext="true" aria-required="true"  data-live-search="true" >
                    <option value="">اختر</option>
                    <?php
                    foreach($arr_ed_state as $row5){
                        $selected='';
                        if($row5->id_setting==$m_education_status_id_fk){$selected='selected';}	?>
                        <option value="<?php  echo $row5->id_setting;?>"  <?php echo $selected?> ><?php  echo $row5->title_setting;?></option>

                    <?php  }?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">المستوى التعليمى <strong class="astric">*</strong><strong></strong> </label>
                <select name="m_education_level_id_fk" id="educate"  data-validation="required" class="form-control half"  data-show-subtext="true"  data-live-search="true" value="<?php echo $m_education_level_id_fk;?>" >
                    <option value="">اختر</option>
                    <?php
                    foreach ($education_level_array as $row4):
                        $selected='';if($row4->id_setting==$m_education_level_id_fk){$selected='selected';}	?>
                        <option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
                </div>
            <div class="col-md-12">
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">التخصص <strong class="astric">*</strong><strong></strong> </label>

                <select  name="m_specialization" id="special" class="form-control half "   >
                    <option value="">اختر</option>
                    <?php foreach ($specialties as $specialty){
                        $selected='';if($specialty->id_setting == $m_specialization){$selected='selected';}
                        ?>
                        <option value="<?php echo $specialty->id_setting;?>"  <?php echo $selected?>  ><?php echo $specialty->title_setting;?> </option>
                    <?php }?>
                </select>
            </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4" >
                    <label class="label label-green main-label  half">ملتحقة بدار نسائية<strong class="astric">*</strong><strong></strong> </label>
                    <select  name="m_female_house_check" id="eldar" data-validation="required"  onchange="change_dar($(this).val());" class=" no-padding form-control choose-date form-control half " data-validation="required" aria-required="true"  >
                        <option value="">اختر</option>
                        <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                            $selected='';if($r==$m_female_house_check){$selected='selected';}
                            ?>
                            <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                        <?php }?>
                    </select>
                </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">اسم الدار <strong class="astric">*</strong><strong></strong> </label>
                <select class="form-control half" data-validation="required" <?php if($m_female_house_check!=1){?>disabled="disabled" <?php } ?> name="m_female_house_id_fk"  id="m_female_house_id_fk">
                    <option value="">اختر</option>
                    <?php
                    foreach ($women_houses as $row4):
                        $selected='';if($row4->id_setting==$m_female_house_id_fk){$selected='selected';}	?>
                        <option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting ;?></option>
                    <?php  endforeach;?>
                </select>
            </div>

                </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4 col-xs-12 padding-4" >
                    <label class="label label-green main-label  half">الحالة الصحية<strong class="astric">*</strong><strong></strong> </label>
                    <select  name="m_health_status_id_fk" id="m_health_status_id_fk" onchange="check()"  data-validation="required" class="form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true">
                        <option value="">اختر</option>
                        <option value="disease" <?php if($m_health_status_id_fk==='disease'){?>selected <?php } ?> >مريض</option>
                        <option value="disability" <?php if($m_health_status_id_fk==='disability'){?>selected <?php } ?> >معاق</option>
                        <option value="salem"  <?php if($m_health_status_id_fk==='salem'){?>selected <?php } ?>> (سليم) </option>

                        <?php
                        foreach ($health_status_array as $row3):
                            $selected='';if($row3->id_setting==$m_health_status_id_fk){$selected='selected';}	?>
                            <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">نوع المرض<strong class="astric">*</strong><strong></strong> </label>
                <select  name="disease_id_fk" id="disease_id_fk" class="form-control half"aria-required="true" <?php if($m_health_status_id_fk=="disease"){?>  <?php }else{ ?> disabled="disabled" <?php } ?>>
                    <option value="">اختر</option>
                    <?php
                    foreach ($diseases as $row3):
                        $selected='';if($row3->id_setting==$disease_id_fk){$selected='selected';}	?>
                        <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">نوع الإعاقة<strong class="astric">*</strong><strong></strong> </label>
                <select  name="disability_id_fk" id="disability_id_fk" class="form-control half"     aria-required="true" <?php if($m_health_status_id_fk=="disability"){?>  <?php }else{ ?> disabled="disabled" <?php } ?>>
                    <option value="">اختر</option>
                    <?php
                    foreach ($diseases as $row3):
                        $selected='';if($row3->id_setting==$disability_id_fk){$selected='selected';}	?>
                        <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                    <?php  endforeach;?>
                </select>
            </div>

                </div>
            <div class="col-md-12">
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">سبب المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                <input type="text" name="dis_reason" id="dis_reason" <?php if($m_health_status_id_fk=="salem"){?> disabled="disabled"  <?php }?>  value="<?php echo $dis_reason ;?>" class="form-control half input-style " data-validation="required" />
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">جهة المتابعة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                <select  name="dis_response_status" id="dis_response_status" <?php if($m_health_status_id_fk=="salem"){?> disabled="disabled"  <?php }?>  class="form-control half"     data-validation="required" aria-required="true">
                    <option value="">اختر</option>
                    <?php
                    foreach ($responses as $row3):
                        $selected='';if($row3->id_setting==$dis_response_status){$selected='selected';}	?>
                        <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">وضع الحالة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                <select  name="dis_status" id="dis_status" <?php if($m_health_status_id_fk=="salem"){?> disabled="disabled"  <?php }?>  class="form-control half"   data-validation="required" aria-required="true">
                    <option value="">اختر</option>
                    <?php
                    foreach ($diseases_status as $row3):
                        $selected='';if($row3->id_setting==$dis_status){$selected='selected';}	?>
                        <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                    <?php  endforeach;?>
                </select>
            </div>
                </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4 col-xs-12 padding-4" >
                    <label class="label label-green main-label  half">تاريخ المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" value="<?php echo $dis_date_ar ;?>"  <?php if($m_health_status_id_fk=="salem"){?> disabled="disabled"  <?php }?>  name="dis_date_ar" id="dis_date_ar"  value="" class="form-control half input-style docs-date"  data-validation="required" />
                </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">أداء فريضة الحج<strong class="astric">*</strong><strong></strong> </label>
                <select name="m_hijri" class=" form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                    <option value="">اختر</option>
                    <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                        $selected='';if($r==$m_hijri){$selected='selected';}
                        ?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">أداء فريضة العمرة<strong class="astric">*</strong><strong></strong> </label>
                <select name="m_ommra" class="form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                    <option value="">اختر</option>
                    <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                        $selected='';if($r==$m_ommra){$selected='selected';}
                        ?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                    <?php }?>
                </select>
            </div>

                </div>
            <div class="col-md-12">
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half" style="padding-left: 0;">رقم الجوال   <span class="pull-right" style="    background-color: #fff;
    color: #008996;
    padding: 0 6px;
    border-radius: 7px;"> 10 ارقام فقط</span></label>
                <input type="text" onkeypress="validate_number(event)" maxlength="10" minlength="10" name="m_another_mob" id="m_another_mob"   onkeyup="check_len($(this).val(),'m_another_mob_span');"  value="<?php  echo $m_another_mob;?>"  class="form-control half input-style" data-validation="required" />
                <span  id="m_another_mob_span" class="span-validation"> </span>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">البريد الإلكترونى <strong class="astric">*</strong><strong></strong> </label>
                <input type="email" name="m_email" value="<?php echo $m_email;?>"  class="form-control half input-style" data-validation="required" />
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">المهارة<strong class="astric">*</strong><strong></strong> </label>
                <input type="text" name="m_skill_name"  value="<?php echo $m_skill_name;?>"  class="form-control half input-style" data-validation="required"/>
            </div>
                </div>
            <div class="col-md-12">
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">الحياة العملية <strong class="astric">*</strong><strong></strong> </label>
                <select name="m_want_work"    id="m_want_work"   onchange="getWork();" class=" no-padding form-control choose-date form-control half"  data-validation="required" aria-required="true" >
                    <option value="">اختر</option>
                    <?php
                    $arr_work =array('','لا يعمل','يعمل');
                    for($r=1;$r<sizeof($arr_work);$r++){
                        $selected=''; if($r==$m_want_work){$selected='selected';}
                        ?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_work[$r];?> </option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">المهنة<strong class="astric">*</strong><strong></strong> </label>
                <select  name="m_job_id_fk" id="m_job_id_fk" class=" no-padding form-control choose-date form-control half "<?php if($m_want_work!=2){?> disabled="disabled" <?php } ?>   aria-required="true"   >
                    <option value="">اختر</option>
                    <?php
                    foreach ($job_titles as $job):
                        $selected='';if($job->id_setting==$m_job_id_fk){$selected='selected';}	?>
                        <option value="<?php  echo $job->id_setting; ?>"  <?php echo $selected?> ><?php  echo $job->title_setting;?></option>
                    <?php  endforeach;?>
                    <option value="0">أخري</option>
                </select>

            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">الدخل الشهرى<strong class="astric">*</strong><strong></strong> </label>
                <input type="text" step="any" name="m_monthly_income" onkeypress="validate_number(event)"  data-validation="" value="<?php echo  $m_monthly_income;?>"  id="mo-income" class="form-control half input-style"  <?php if($m_want_work!=2){?> disabled="disabled" <?php } ?>/>
            </div>
                </div>
            <div class="col-md-12">

            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half">مكان العمل<strong class="astric">*</strong><strong></strong> </label>
                <input type="text"  name="m_place_work" id="m_place_work"<?php if($m_want_work!=2){?> disabled="disabled" <?php } ?>  data-validation="" value="<?php echo  $m_place_work;?>"  class="form-control half input-style"/>
            </div>

            <div class="form-group col-sm-4 col-xs-12 padding-4" >
                <label class="label label-green main-label  half" style="padding-left: 0;">هاتف العمل <span class="pull-right" style="    background-color: #fff;
    color: #008996;
    padding: 0 6px;
    border-radius: 7px;"> 10 ارقام فقط</span> </label>
                <input type="text" step="any" name="m_place_mob" maxlength="10"<?php if($m_want_work!=2){?> disabled="disabled" <?php } ?> minlength="10"  id="m_place_mob" onkeyup="check_len($(this).val(),'m_another_mob_span_work');"onkeypress="validate_number(event)" data-validation="" value="<?php echo  $m_place_mob;?>"  class="form-control half input-style"/>
                <span  id="m_another_mob_span_work" class="span-validation"> </span>
            </div>
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
                <select name="m_account" id="m_account"  onchange="checkMember_account();" class="form-control half">
                    <?php $yes_no=array('لا','نعم');?>
                    <option value=""selected="selected">إختر</option>
                    <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $m_account==$s){$select='selected'; }?>
                        <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                    <?php } ?>
                </select>
            </div>
                </div>
                <div class="col-md-12">
            <div class="form-group col-sm-4 col-xs-12 padding-4">
                <label class="label label-green main-label  half">إسم الحساب<strong class="astric">*</strong><strong></strong> </label>
                <select name="m_account_id" id="m_account_id"  class="form-control half"  data-validation="required" <?php if($m_account!=1){?> disabled="disabled" <?php } ?>>
                    <?php $yes_no=array('لا','نعم');?>
                    <option value="">إختر</option>
                    <?php  if(!empty($banks)){
                        foreach ($banks as $bank){  $select=''; if($m_account_id>0 &&  $m_account_id == $bank->id){$select='selected'; }?>
                            <option value="<?php echo $bank->id;?>" <?php echo $select;?>><?php echo $bank->bank_name;?></option>
                        <?php }
                    } ?>
                </select>
            </div>

</div>



            <div class="form-group col-xs-12">
                <button type="submit" class="btn btn-default btn-sm btn-save mt-10 register_data_mother" name="register_data_mother" id="register_data_mother" value="add">حفظ الأن</button>
            </div>
            <form>

    </div>



</div>

</div><!-- close container -->


</section><!-- close section in sidebar -->


<script>
   function make_dis(valu)
    {
if(valu==0)


{

    document.getElementById("m_living_place").removeAttribute("disabled", "disabled");
}else{
    document.getElementById("m_living_place").setAttribute("disabled", "disabled");
}


    }



</script>



<script>
    function make_nantion_dis(valu)
    {
        if(valu==0)
        {

            document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
        }else{
            document.getElementById("nationality_other").setAttribute("disabled", "disabled");
        }


    }



</script>

<script>

   function check_len(valu,span_id2)
   {



       if(valu.length>10) {
           document.getElementById("register_data_mother").setAttribute("disabled", "disabled");

           document.getElementById(span_id2).style.color = '#F00';
           document.getElementById(span_id2).innerHTML = 'رقم الجوال لا يزيد عن 10 ارقام';


       }
       if(valu.length<10) {
           document.getElementById("register_data_mother").setAttribute("disabled", "disabled");
           document.getElementById(span_id2).style.color = '#F00';
           document.getElementById(span_id2).innerHTML = 'رقم الجوال لا يقل عن 10 ارقام';

       }
       if(valu.length==10) {
           document.getElementById(span_id2).style.color = '#11d63b';

           document.getElementById("register_data_mother").removeAttribute("disabled", "disabled");
           document.getElementById(span_id2).innerHTML = 'رقم الجوال متاح';

       }

   }



</script>

<script>

    function change_dar(valu)
    {
       if(valu==1)
       {
           document.getElementById("m_female_house_id_fk").removeAttribute("disabled", "disabled");
       }else{
           document.getElementById("m_female_house_id_fk").setAttribute("disabled", "disabled");
       }
    }


</script>