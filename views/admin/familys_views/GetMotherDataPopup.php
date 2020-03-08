


<div class="col-sm-12 col-xs-12">
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">رقم السجل المدني للأم - الوكيل</label>
        <input type="text" name=""  readonly=""  value="<?php echo $result->mother_national_num_fk;?>" class="form-control half input-style"  />
    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half"> الاسم الرباعي <strong class="astric">*</strong> </label>
        <input type="text" name="fullname"   value="<?php echo $result->full_name?>" class="form-control half input-style" disabled />
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">طبيعة الفرد<strong class="astric">*</strong><strong></strong> </label>
        <select  name="person_type" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" disabled  aria-required="true">
            <option value="">اختر</option>
            <?php
            foreach ($person_type as $row2):
                $selected = '';
                if ($row2->id_setting == $result->person_type) {
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
        <select name="m_relationship" id="m_relationship" disabled aria-required="true" class="selectpicker no-padding form-control choose-date form-control half"

        >
            <option value="">إختر</option>
            <?php if(!empty($relationships)){ foreach ($relationships as $record){
                $select=''; if($result->m_relationship == $record->id_setting ){$select='selected'; }
                ?>
                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
            <?php  } } ?>
        </select>
    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">التصنيف<strong class="astric">*</strong><strong></strong> </label>
        <select  name="categoriey_m" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" disabled  aria-required="true">
            <?php $categories=array(1=>'ارمله',2=>'يتيم',3=>'مستفيد');?>
            <option value="">إختر</option>
            <?php foreach($categories as $key=>$value){  $select=''; if( $result->categoriey_m == $key){$select='selected'; }?>
                <option value="<?php echo $key;?>" <?php echo $select;?>><?php echo $value;?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">حاله المستفيد<strong class="astric">*</strong><strong></strong> </label>
        <select name="halt_elmostafid_m" disabled="disabled" id="halt_elmostafid_m"   class="form-control half">
            <option value=""> اختر </option>
            <?php if(isset($member_status)&&!empty($member_status)) {
                foreach ($member_status as $record) {?>

                    <option value="<?php echo $record->id ;?>" <?php if($result->halt_elmostafid_m == $record->id ){
                        ?> selected="selected"<?php } ?>> <?php echo $record->title;?>
                    </option>




                <?php }

            }?>
        </select>

    </div>

    <div class="form-group col-sm-4">
        <label class="label label-green  half"> الجنس  <strong class="astric">*</strong> </label>
        <select name="gender" class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"  disabled aria-required="true">
            <?php $gender_arr=array('','ذكر','أنثى');?>
            <option value="">اختر</option>
            <?php for ($a=1;$a<sizeof($gender_arr);$a++){
                $select='';
                if($a== $result->m_gender ){$select='selected';}?>
                <option value="<?php echo$a; ?>" <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
            <?php }?>
        </select>
    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">نوع الهوية<strong class="astric">*</strong><strong></strong> </label>
        <select  name="m_national_id_type" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   disabled aria-required="true">
            <option value="">اختر</option>
            <?php
            foreach ($national_id_array as $row2):
                $selected = '';
                if ($row2->id_setting == $result->m_national_id_type) {
                    $selected = 'selected';
                } ?>
                <option
                    value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
            <?php endforeach
            ;?>
        </select>
    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
        <select  name="m_card_source" id="m_card_source" disabled class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true">

            <option value="">إختر</option>
            <?php if(!empty($id_source)){ foreach ($id_source as $record){
                $select=''; if($result->m_card_source==$record->id_setting){$select='selected'; }
                ?>
                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
            <?php  } } ?>
        </select>
    </div>
    
</div>



<div class="col-md-12">

    <div class="form-group col-sm-4 col-xs-12">
        <?php  $hijri_date=explode('/',$result->m_birth_date_hijri); ?>
        <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
        <input class="textbox form-control"  disabled="disabled"  type="text" name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)"
               onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" value="<?php if(!empty($hijri_date[0])){echo $hijri_date[0];}?>"  placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
        <input class="textbox form-control" type="text" name="HMonth" pattern="\d*"
               onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))" value="<?php if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
        <input class="textbox4 form-control" type="text" name="HYear" pattern="\d*"
               onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form);getAge();" value="<?php if(!empty($hijri_date[2])){echo $hijri_date[2];}?>"  placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
    </div>


    <div class="form-group col-sm-4 col-xs-12">
        <?php
        $gregorian_date=explode('/',$result->m_birth_date); 	 ?>

        <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
        <input class="textbox form-control"disabled type="text" name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))"  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; }?>"/>
        <input class="textbox form-control"disabled type="text" name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))"   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1];}?>"/>
        <input class="textbox4 form-control"disabled type="text" name="CYear"  id="CYear" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"   placeholder="year"  id="CYear" size="20" maxlength="4"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2];}?>"/>

    </div>




    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong> </label>
        <input class="textbox2 form-control half " type="text" name="age" id="myage"  readonly  value="<?php  if(!empty($gregorian_date[2])){ echo (date('Y-m-d')-$gregorian_date[2]); }?>"  />
        <input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd" readonly />
        <input class="textbox2 hidden" type="text" name="JD"  size="60" id="JD" readonly />
    </div>


</div>


<div class="col-sm-12 col-xs-12">

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">الجنسية<strong class="astric">*</strong><strong></strong> </label>

        <select  name="m_nationality" id="m_nationality"disabled class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true" >
            <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)){?>
                <option value="">اختر</option>

                <?php  foreach ($nationality as $record):

                    $selected='';if($record->id_setting==$result->m_nationality){$selected='selected';}?>
                    <option value="<?php  echo $record->id_setting;?>" <?php echo $selected?>  ><?php  echo $record->title_setting;?></option>
                <?php  endforeach;?>
                <option value="0"<?php if($result->m_nationality==0) echo "selected";?> >اخري</option>
            <?php }else {
                ?>
                <option value="" selected>اختر</option>
                <option value="0"<?php if($result->m_nationality==0) echo "selected";?> >اخري</option>
                <?php
            }
            ?>
        </select>



    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">اضافه جنسيه اخري<strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="nationality_other" id="nationality_other"   value="<?php echo $result->nationality_other?>"  class="form-control half input-style" <?php if($result->nationality_other==""){?> disabled=""<?php }?>/>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">الحالة الإجتماعية<strong class="astric">*</strong><strong></strong> </label>
        <select  name="m_marital_status_id_fk" disabled class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true" >
            <option value="">اختر</option>
            <?php foreach ($marital_status_array as $row6):
                $selected='';if($row6->id_setting==$result->m_marital_status_id_fk){$selected='selected';}   ?>
                <option value="<?php  echo $row6->id_setting;?>"  <?php echo $selected?>  ><?php  echo $row6->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">السكن<strong class="astric">*</strong><strong></strong> </label>
        <select name="m_living_place_id_fk" id="living_place_id"disabled  class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="" data-live-search=""   aria-required="true" >
            <?php if(isset($living_place_array) && $living_place_array!=null &&!empty($living_place_array)) { ?>
                <option value="">اختر</option>
                <?php
                foreach ($living_place_array as $row):
                    $selectedx = '';
                    if ($row->id_setting == $result->m_living_place_id_fk) {
                        $selectedx = 'selected';
                    } ?>
                    <option
                        value="<?php echo $row->id_setting; ?>"<?php echo $selectedx ?> ><?php echo $row->title_setting; ?></option>
                <?php endforeach; ?>
                <option value="0"<?php if ($result->m_living_place_id_fk == 0) echo "selected"; ?> >اخري</option>
                <?php
            }else {
                ?>
                <option value="" selected>اختر</option>
                <option value="0"<?php if ($result->m_living_place_id_fk == 0) echo "selected"; ?> >اخري</option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">اضافه محل سكن<strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="m_living_place"  id="m_living_place"  value="<?php echo $result->m_living_place?>"  class="form-control half input-style" <?php if($result->m_living_place==""){?> disabled=""<?php }?> />
    </div>
    <div class="form-group col-sm-4 col-xs-12" >
        <label class="label label-green  half">الحالة الدراسية <strong class="astric">*</strong><strong></strong> </label>
        <select name="m_education_status_id_fk" disabled class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" aria-required="true"  data-live-search="true" >
            <option value="">اختر</option>
            <?php
            foreach($arr_ed_state as $row5){
                $selected='';
                if($row5->id_setting==$result->m_education_status_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $row5->id_setting;?>"  <?php echo $selected?> ><?php  echo $row5->title_setting;?></option>

            <?php  }?>
        </select>
    </div>
</div>


<div class="col-sm-12 col-xs-12">

    <div class="form-group col-sm-4 col-xs-12" >
        <label class="label label-green  half">المستوى التعليمى <strong class="astric">*</strong><strong></strong> </label>
        <select name="m_education_level_id_fk" id="educate" disabled class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true"  data-live-search="true" >
            <option value="">اختر</option>
            <?php
            foreach ($education_level_array as $row4):
                $selected='';if($row4->id_setting == $result->m_education_level_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">التخصص  </label>
        <select  name="m_specialization"  disabled="disabled"  id="special" class="no-padding form-control half">
            <option value="">اختر</option>
            <?php foreach ($specialties as $specialty){
                $selected='';if($specialty->id_setting == $result->m_specialization){$selected='selected';}
                ?>
                <option value="<?php echo $specialty->id_setting;?>"  <?php echo $selected?>  ><?php echo $specialty->title_setting;?> </option>
            <?php }?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12"  >
        <label class="label label-green  half">ملتحقة بدار نسائية<strong class="astric">*</strong><strong></strong> </label>
        <select  name="m_female_house_check" id="eldar" class=" no-padding form-control choose-date form-control half "disabled aria-required="true"  >
            <option value="">اختر</option>
            <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                $selected='';if($r == $result->m_female_house_check){$selected='selected';}
                ?>
                <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
            <?php }?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">اسم الدار <strong class="astric">*</strong><strong></strong> </label>
        <select class=" no-padding form-control choose-date form-control half" name="m_female_house_id_fk"  id="m_female_house_id_fk" <?php if($result->m_female_house_id_fk==""){?> disabled=""<?php }?>>
            <option value="">اختر</option>
            <?php
            foreach ($women_houses as $row4):
                $selected='';if($row4->id_setting == $result->m_female_house_id_fk) {$selected='selected';}	?>
                <option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">الحالة الصحية<strong class="astric">*</strong><strong></strong> </label>
        <select  name="m_health_status_id_fk" id="health_state" onchange="check()"
                disabled class=" no-padding form-control choose-date form-control half"    aria-required="true">
            <option value="">اختر</option>
            <option value="disease" <?php if($result->m_health_status_id_fk =='disease'){?>selected <?php } ?> > مريض </option>
            <option value="disability" <?php if($result->m_health_status_id_fk =='disability'){?>selected <?php } ?>>معاق</option>
            <option value="good" <?php if($result->m_health_status_id_fk =='good'){?>selected <?php } ?> >(سليم)</option>
            <?php
            foreach ($health_status_array as $row3):
                $selected='';if($row3->id_setting==$result->m_health_status_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">نوع المرض<strong class="astric">*</strong><strong></strong> </label>
        <select  name="disease_id_fk" id="disease_id_fk"
                 class=" no-padding form-control choose-date form-control half"
                 aria-required="true"  <?php if($result->m_health_status_id_fk !='disease'){ echo 'disabled=""'; } ?> >
            <option value="">اختر</option>
            <?php
            foreach ($diseases as $row3):
                $selected='';if($row3->id_setting==$result->disease_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  >
                    <?php  echo $row3->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">نوع الإعاقة<strong class="astric">*</strong><strong></strong> </label>
        <select  name="disability_id_fk" id="disability_id_fk" class=" no-padding form-control choose-date form-control half"     aria-required="true"
            <?php if($result->m_health_status_id_fk !='disability'){ echo 'disabled="disabled"'; } ?>  >
            <option value="">اختر</option>
            <?php
            foreach ($diseases as $row3):
                $selected='';if($row3->id_setting==$result->disability_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>





    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">سبب المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="dis_reason" id="dis_reason"
               value="<?php echo $result->dis_reason?>" class="form-control half input-style "

              disabled <?php if($result->m_health_status_id_fk =='good'){ echo 'disabled="disabled"'; } ?> />
    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">تاريخ المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="date_death_disease" id="date_reason"
               value="<?php  if(isset($result->date_death_disease)){ echo $result->date_death_disease ; } ?>" class="form-control half input-style docs-date"

              disabled <?php if($result->m_health_status_id_fk =='good'){ echo 'disabled="disabled"'; } ?> />
    </div>


    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">جهة المتابعة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
        <select  name="dis_response_status" id="dis_response_status"
                 class=" no-padding form-control choose-date form-control half"
                disabled aria-required="true"
            <?php if($result->m_health_status_id_fk =='good'){ echo 'disabled="disabled"'; } ?>>
            <option value="">اختر</option>
            <?php
            foreach ($responses as $row3):
                $selected='';if($row3->id_setting==$result->dis_response_status){$selected='selected';}	?>
                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  >
                    <?php  echo $row3->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>



    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">وضع الحالة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
        <select  name="dis_status" id="dis_status" class=" no-padding form-control choose-date form-control half"
                disabled aria-required="true"
            <?php if($result->m_health_status_id_fk =='good'){ echo 'disabled="disabled"'; } ?>
        >
            <option value="">اختر</option>
            <?php
            foreach ($diseases_status as $row3):
                $selected='';if($row3->id_setting==$result->dis_status){$selected='selected';}	?>
                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
            <?php  endforeach;?>
        </select>
    </div>

    <div class="form-group col-sm-4 col-xs-12" >
        <label class="label label-green  half">أداء فريضة الحج<strong class="astric">*</strong><strong></strong> </label>
        <select name="m_hijri" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"disabled aria-required="true" >
            <option value="">اختر</option>
            <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                $selected='';if($r==$result->m_hijri){$selected='selected';}
                ?>
                <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
            <?php }?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12" >
        <label class="label label-green  half">أداء فريضة العمرة<strong class="astric">*</strong><strong></strong> </label>
        <select name="m_ommra" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"disabled aria-required="true" >
            <option value="">اختر</option>
            <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                $selected='';if($r==$result->m_ommra){$selected='selected';}
                ?>
                <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
            <?php }?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">رقم الجوال <strong class="astric">*</strong><strong></strong> </label>
        <input type="text"  onkeypress="validate_number(event)" name="m_mob" value="<?php echo $result->m_mob?>"   id="m_mob"  onkeyup="chek_length('m_mob')"  class="form-control half input-style"disabled  />
        <span  id="m_mob_span" class="span-validation"> </span>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">رقم جوال أخر <strong class="astric">*</strong><strong></strong> </label>
        <input type="text" onkeypress="validate_number(event)" name="m_another_mob" id="m_another_mob"  onkeyup="chek_length('m_another_mob')" value="<?php echo $result->m_another_mob?>"  class="form-control half input-style"disabled />
        <span  id="m_another_mob_span" class="span-validation"> </span>
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">البريد الإلكترونى <strong class="astric">*</strong><strong></strong> </label>
        <input type="email" name="m_email" value="<?php echo $result->m_email?>"  class="form-control half input-style"disabled />
    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">المهارة<strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="m_skill_name"  value="<?php echo $result->m_skill_name?>"  class="form-control half input-style"disabled/>
    </div>
    <div class="form-group col-sm-4 col-xs-12" >
        <label class="label label-green  half">الحياة العملية <strong class="astric">*</strong><strong></strong> </label>
        <select name="m_want_work"    id="m_want_work"   onchange="getWork();" class=" no-padding form-control choose-date form-control half" disabled aria-required="true" >
            <option value="">اختر</option>
            <?php
            $arr_work =array('','لا يعمل','يعمل');
            for($r=1;$r<sizeof($arr_work);$r++){
                $selected=''; if($r==$result->m_want_work){$selected='selected';}
                ?>
                <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_work[$r];?> </option>
            <?php }?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12"  >
        <label class="label label-green  half">المهنة<strong class="astric">*</strong><strong></strong> </label>
        <select  name="m_job_id_fk" id="m_job_id_fk" class=" no-padding form-control choose-date form-control half "   aria-required="true"  <?php if($result->m_want_work ==1){?> disabled="disabled" <?php }?> >
            <option value="">اختر</option>
            <?php
            foreach ($job_titles as $job):
                $selected='';if($job->id_setting==$result->m_job_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $job->id_setting; ?>"  <?php echo $selected?> ><?php  echo $job->title_setting;?></option>
            <?php  endforeach;?>
            <option value="0">أخري</option>
        </select>

    </div>
    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">الدخل الشهرى<strong class="astric">*</strong><strong></strong> </label>
        <input type="text" step="any" name="m_monthly_income" onkeypress="validate_number(event)"  data-validation="" value="<?php echo $result->m_monthly_income;?>"  id="mo-income" class="form-control half input-style" <?php if($result->m_want_work ==1){?>  disabled="disabled" <?php }?>/>
    </div>


    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">مكان العمل<strong class="astric">*</strong><strong></strong> </label>
        <input type="text"  name="m_place_work" id="m_place_work"  data-validation="" value="<?php echo $result->m_place_work;?>"  class="form-control half input-style"  <?php if($result->m_want_work ==1){?>  disabled="disabled"  <?php }?>/>
    </div>

    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">هاتف العمل<strong class="astric">*</strong><strong></strong> </label>
        <input type="text" step="any" name="m_place_mob"  id="m_place_mob" onkeyup="chek_length('m_place_mob')" onkeypress="validate_number(event)" data-validation="" value="<?php echo $result->m_place_mob;?>"  class="form-control half input-style"  <?php if($result->m_want_work ==1){?>  disabled="disabled"  <?php }?>/>
        <span  id="m_place_mob_span" class="span-validation"> </span>
    </div>


    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">القدرة علي العمل<strong class="astric">*</strong><strong></strong> </label>
        <select  name="ability_work" id="ability_work" class="no-padding form-control choose-date form-control half" data-validation="" onchange="get_work($(this).val())"  disabled="disabled" aria-required="true" <?php if(isset($result->m_want_work)){ if($result->m_want_work ==2){?>  disabled="disabled"  <?php }}?> >
            <?php $yes_no=array('لا','نعم');?>
            <option value="">إختر</option>
            <?php for ($w=0;$w<sizeof($yes_no);$w++){  $select='';if(isset($result->ability_work)){ if( $result->ability_work==$w){$select='selected'; }}?>
                <option value="<?php echo $w;?>" <?php echo $select;?>><?php echo $yes_no[$w];?></option>
            <?php } ?>
        </select>
    </div>



    <div class="form-group col-sm-4 col-xs-12"  >
        <label class="label label-green  half"> نوع العمل<strong class="astric">*</strong><strong></strong> </label>
        <select  name="work_type_id_fk" id="work_type_id_fk" class=" no-padding form-control choose-date form-control half " disabled="disabled"  aria-required="true"  >
            <option value="">اختر</option>
            <?php
            foreach ($works_type as $work):
                $selected='';if($work->id_setting==$result->work_type_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $work->id_setting; ?>"  <?php echo $selected?> ><?php  echo $work->title_setting;?></option>
            <?php  endforeach;?>
            <option value="0">أخري</option>
        </select>

    </div>



    <div class="form-group col-sm-4 col-xs-12">
        <label class="label label-green  half">مكفول<strong class="astric">*</strong><strong></strong> </label>
        <select  name="guaranteed_m" class="selectpicker no-padding form-control choose-date form-control half"disabled  aria-required="true">
        <?php $yes_no=array('لا','نعم');?>
        <option value="">إختر</option>
        <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $result->guaranteed_m==$s){$select='selected'; }?>
            <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
        <?php } ?>
        </select>
    </div>
 <div class="form-group col-sm-4 col-xs-12"  >
        <label class="label label-green  half">طبيعة الشخصية<strong class="astric">*</strong><strong></strong> </label>
        <select  name="personal_character_id_fk" id="personal_character_id_fk" class=" no-padding form-control choose-date form-control half "  disabled  >
            <option value="">اختر</option>
            <?php
            foreach ($personal_characters as $character):
                $selected='';if($character->id_setting==$result->personal_character_id_fk){$selected='selected';}	?>
                <option value="<?php  echo $character->id_setting; ?>"  <?php echo $selected?> ><?php  echo $character->title_setting;?></option>
            <?php  endforeach;?>
            <option value="0">أخري</option>
        </select>

    </div>

    <div class="form-group col-sm-4 col-xs-12"  >
        <label class="label label-green  half">العلاقة بالأسرة<strong class="astric">*</strong><strong></strong> </label>
        <select  name="relation_with_family" id="relation_with_family" class=" no-padding form-control choose-date form-control half "   disabled >
            <option value="">اختر</option>
            <?php
            foreach ($relations_with_family as $relation):
                $selected='';if($relation->id_setting==$result->relation_with_family){$selected='selected';}	?>
                <option value="<?php  echo $relation->id_setting; ?>"  <?php echo $selected?> ><?php  echo $relation->title_setting;?></option>
            <?php  endforeach;?>
            <option value="0">أخري</option>
        </select>

    </div>





</div>