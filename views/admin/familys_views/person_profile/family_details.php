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
</style>
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 ">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#mother" data-toggle="tab">بيانات الام  </a></li>
                    <li><a href="#father" data-toggle="tab">بيانات الاب</a></li>
                    <li><a href="#sons" data-toggle="tab">بيانات الابناء</a></li>
                    <li><a href="#house" data-toggle="tab">بيانات السكن</a></li>
                    <li><a href="#devices" data-toggle="tab">أجهزة المنزل</a></li>
                    <li><a href="#home_needs" data-toggle="tab">إحتياجات المنزل</a></li>
                    <li><a href="#attach_files" data-toggle="tab">ارفاق الملفات</a></li>
                    <li><a href="#money" data-toggle="tab">البيانات الماليه</a></li>
                    <!-------------------- 774 ----------------------------------->
                    <li><a href="#research" data-toggle="tab">رأى الباحث </a></li>
                    <!-------------------- 774 ----------------------------------->
                </ul>
                <!-- Tab panels -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="mother">
                        <div class="panel-body"> <br>
                            <?php
                            if($result['m_want_work']==1  ){
                                $val="نعم";
                            }else{
                                $val="لا";
                            }
                            if($result['m_hijri']==1  ){
                                $val="نعم";
                            }else{
                                $val="لا";
                            }
                            if($result['m_ommra']==1  ){
                                $val="نعم";
                            }else{
                                $val="لا";
                            }
                            $arr_yes_no=array('','نعم','لا');
                            ?>
                            <?php if($result =='' && $result ==null ){
                                ?>
                                <div class="col-lg-12 alert alert-danger" >لا توجد بيانات للام</div>
                            <?php  }else{ ?>
                                <div class="col-sm-12 col-xs-12 pull-right" style="margin-bottom: 5px;">
                                    <a target="_blank" href="<?=base_url()."family_controllers/Family/mother/".$this->uri->segment(4)?>">
                                        <button class="btn btn-sm btn-success"><i class="fa fa-pencil "></i>إضغط لتعديل بيانات الأم
                                        </button>
                                    </a>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم السجل المدني للأم<strong class="astric">*</strong> </label>
                                        <input type="text" name=""  readonly=""  value="<?php echo $this->uri->segment(4);?>" class="form-control half input-style"  />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> الاسم الرباعي <strong class="astric">*</strong> </label>
                                        <input type="text" name="fullname"   value="<?php echo $result['full_name']?>" class="form-control half input-style"  data-validation="required"  disabled />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">طبيعة الفرد<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="person_type" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  disabled  data-validation="required"  aria-required="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($person_type as $row2):
                                                $selected = '';
                                                if ($row2->id_setting == $result['person_type']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                                            <?php endforeach
                                            ;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">نوع الهوية<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="m_national_id_type" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  disabled    data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($national_id_array as $row2):
                                                $selected = '';
                                                if ($row2->id_setting == $result['m_national_id_type']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                                            <?php endforeach
                                            ;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="m_national_id"   id="m_national_id" data-validation="required" onkeyup="chek_length('m_national_id')" disabled  value="<?php echo $result['m_national_id']?>" onkeypress="validate_number(event)" class="form-control half input-style" />
                                        <span  id="m_national_id_span" class="span-validation"> </span>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="m_card_source" id="m_card_source" disabled   data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true">
                                            <option value="">إختر</option>
                                            <?php if(!empty($id_source)){ foreach ($id_source as $record){
                                                $select=''; if($result['m_card_source']==$record->id_setting){$select='selected'; }
                                                ?>
                                                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                                            <?php  } } ?>
                                        </select>
                                    </div>
                                    <!--end here-->
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        $gregorian_date=explode('/',$result['m_birth_date']); 	 ?>
                                        <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
                                        <input class="textbox form-control" data-validation="required" type="text" disabled  name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))"  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; }?>"/>
                                        <input class="textbox form-control" data-validation="required" type="text"  disabled name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))"   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1];}?>"/>
                                        <input class="textbox4 form-control" data-validation="required" type="text" disabled  name="CYear"  id="CYear" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"   placeholder="year"  id="CYear" size="20" maxlength="4"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2];}?>"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <?php  $hijri_date=explode('/',$result['m_birth_date_hijri']); ?>
                                        <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
                                        <input class="textbox form-control" type="text" name="HDay"  disabled pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" value="<?php if(!empty($hijri_date[0])){echo $hijri_date[0];}?>"  placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                                        <input class="textbox form-control" type="text" name="HMonth" disabled  pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))" value="<?php if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                                        <input class="textbox4 form-control" type="text" name="HYear" disabled  pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form)" value="<?php if(!empty($hijri_date[2])){echo $hijri_date[2];}?>"  placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong> </label>
                                        <input class="textbox2 form-control half " type="text" name="age" id="myage"  readonly  value="<?php  if(!empty($gregorian_date[2])){ echo (date('Y-m-d')-$gregorian_date[2]); }?>"  />
                                        <input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd" readonly />
                                        <input class="textbox2 hidden" type="text" name="JD"  size="60" id="JD" readonly />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الجنسية<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="m_nationality" id="m_nationality" data-validation="required" disabled  class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true" >
                                            <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)){?>
                                                <option value="">اختر</option>
                                                <?php  foreach ($nationality as $record):
                                                    $selected='';if($record->id_setting==$result['m_nationality']){$selected='selected';}?>
                                                    <option value="<?php  echo $record->id_setting;?>" <?php echo $selected?>  ><?php  echo $record->title_setting;?></option>
                                                <?php  endforeach;?>
                                                <option value="0"<?php if($result['m_nationality']==0) echo "selected";?> >اخري</option>
                                            <?php }else {
                                                ?>
                                                <option value="" selected>اختر</option>
                                                <option value="0"<?php if($result['m_nationality']==0) echo "selected";?> >اخري</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">اضافه جنسيه اخري<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="nationality_other" id="nationality_other"  disabled   value="<?php echo $result['nationality_other']?>"  class="form-control half input-style" <?php if($result['nationality_other']==""){?> disabled=""<?php }?>/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الحالة الإجتماعية<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="m_marital_status_id_fk"  data-validation="required" disabled  class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true" >
                                            <option value="">اختر</option>
                                            <?php foreach ($marital_status_array as $row6):
                                                $selected='';if($row6->id_setting==$result['m_marital_status_id_fk']){$selected='selected';}   ?>
                                                <option value="<?php  echo $row6->id_setting;?>"  <?php echo $selected?>  ><?php  echo $row6->title_setting;?></option>
                                            <?php  endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">السكن<strong class="astric">*</strong><strong></strong> </label>
                                        <select name="m_living_place_id_fk" id="living_place_id" data-validation="required" disabled   class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="" data-live-search=""   aria-required="true" >
                                            <?php if(isset($living_place_array) && $living_place_array!=null &&!empty($living_place_array)) { ?>
                                                <option value="">اختر</option>
                                                <?php
                                                foreach ($living_place_array as $row):
                                                    $selectedx = '';
                                                    if ($row->id_setting == $result['m_living_place_id_fk']) {
                                                        $selectedx = 'selected';
                                                    } ?>
                                                    <option
                                                        value="<?php echo $row->id_setting; ?>"<?php echo $selectedx ?> ><?php echo $row->title_setting; ?></option>
                                                <?php endforeach; ?>
                                                <option value="0"<?php if ($result['m_living_place_id_fk'] == 0) echo "selected"; ?> >اخري</option>
                                                <?php
                                            }else {
                                                ?>
                                                <option value="" selected>اختر</option>
                                                <option value="0"<?php if ($result['m_living_place_id_fk'] == 0) echo "selected"; ?> >اخري</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">اضافه محل سكن<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="m_living_place"  id="m_living_place"  disabled  value="<?php echo $result['m_living_place']?>"  class="form-control half input-style" <?php if($result['m_living_place']==""){?> disabled=""<?php }?> />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">صلة القرابة<strong class="astric">*</strong><strong></strong> </label>
                                        <select name="m_relationship" id="m_relationship"  disabled  data-validation="required" aria-required="true" class="form-control half" disabled="disabled" >
                                            <option value="">إختر</option>
                                            <?php if(!empty($relationships)){ foreach ($relationships as $record){
                                                $select=''; if($result['m_relationship']==$record->id_setting){$select='selected'; }
                                                ?>
                                                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                                            <?php  } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12" >
                                        <label class="label label-green  half">الحالة الدراسية <strong class="astric">*</strong><strong></strong> </label>
                                        <select name="m_education_status_id_fk"  disabled  data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" aria-required="true"  data-live-search="true" >
                                            <option value="">اختر</option>
                                            <?php
                                            foreach($arr_ed_state as $row5){
                                                $selected='';
                                                if($row5->id_setting==$result['m_education_status_id_fk']){$selected='selected';}	?>
                                                <option value="<?php  echo $row5->id_setting;?>"  <?php echo $selected?> ><?php  echo $row5->title_setting;?></option>
                                            <?php  }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12" >
                                        <label class="label label-green  half">المستوى التعليمى <strong class="astric">*</strong><strong></strong> </label>
                                        <select name="m_education_level_id_fk" disabled  id="educate"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true"  data-live-search="true" >
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($education_level_array as $row4):
                                                $selected='';if($row4->id_setting==$result['m_education_level_id_fk']){$selected='selected';}	?>
                                                <option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
                                            <?php  endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">التخصص <strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="m_specialization"  disabled  data-validation="required" value="<?php echo $result['m_specialization']?>"  id="special" class="form-control half input-style"  />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12"  >
                                        <label class="label label-green  half">ملتحقة بدار نسائية<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="m_female_house_check" id="eldar"  disabled class=" no-padding form-control choose-date form-control half " data-validation="required" aria-required="true"  >
                                            <option value="">اختر</option>
                                            <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                                                $selected='';if($r==$result['m_female_house_check']){$selected='selected';}
                                                ?>
                                                <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">اسم الدار <strong class="astric">*</strong><strong></strong> </label>
                                        <select class=" no-padding form-control choose-date form-control half" disabled  name="m_female_house_id_fk"  id="m_female_house_id_fk" <?php if($result['m_female_house_id_fk']==""){?> disabled=""<?php }?>>
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($women_houses as $row4):
                                                $selected='';if($row4->id_setting==$result['m_female_house_id_fk']){$selected='selected';}	?>
                                                <option value="<?php  echo $row4->id_setting;?>"  <?php echo $selected?> ><?php  echo $row4->title_setting;?></option>
                                            <?php  endforeach;?>
                                        </select>
                                    </div>
                                    <!--ahmed-->
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الحالة الصحية<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="m_health_status_id_fk" disabled  id="m_health_status_id_fk" onchange="check()"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"   aria-required="true">
                                            <option value="">اختر</option>
                                            <option value="disease" <?php if($result['m_health_status_id_fk'] ==='disease'){?>selected <?php } ?>>مريض</option>
                                            <option value="disability" <?php if($result['m_health_status_id_fk'] ==='disability'){?>selected <?php } ?>>معاق</option>
                                            <?php
                                            foreach ($health_status_array as $row3):
                                                $selected='';if($row3->id_setting==$result['m_health_status_id_fk']){$selected='selected';}	?>
                                                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                                            <?php  endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">نوع المرض<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="disease_id_fk" id="disease_id_fk" disabled   class=" no-padding form-control choose-date form-control half"     aria-required="true" disabled="disabled">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($diseases as $row3):
                                                $selected='';if($row3->id_setting==$result['disease_id_fk']){$selected='selected';}	?>
                                                <option value="<?php  echo $row3->id_setting;?>" disabled    <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                                            <?php  endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">نوع الإعاقة<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="disability_id_fk" id="disability_id_fk" disabled  class=" no-padding form-control choose-date form-control half"     aria-required="true" disabled="disabled">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($diseases as $row3):
                                                $selected='';if($row3->id_setting==$result['disability_id_fk']){$selected='selected';}	?>
                                                <option value="<?php  echo $row3->id_setting;?>"  disabled   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                                            <?php  endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">تاريخ المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="dis_date_ar" id="dis_date_ar" disabled   value="<?php echo $result['dis_date_ar']?>" class="form-control half input-style docs-date"  data-validation="required" />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">سبب المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="dis_reason" id="dis_reason" disabled   value="<?php echo $result['dis_reason']?>" class="form-control half input-style " data-validation="required" />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">جهة المتابعة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="dis_response_status" id="dis_response_status" disabled  class=" no-padding form-control choose-date form-control half"     data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($responses as $row3):
                                                $selected='';if($row3->id_setting==$result['dis_response_status']){$selected='selected';}	?>
                                                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                                            <?php  endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">وضع الحالة المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="dis_status" id="dis_status"  disabled class=" no-padding form-control choose-date form-control half"   data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($diseases_status as $row3):
                                                $selected='';if($row3->id_setting==$result['dis_status']){$selected='selected';}	?>
                                                <option value="<?php  echo $row3->id_setting;?>"   <?php echo $selected?>  ><?php  echo $row3->title_setting;?></option>
                                            <?php  endforeach;?>
                                        </select>
                                    </div>
                                    <!--ahmed-->
                                    <div class="form-group col-sm-4 col-xs-12" >
                                        <label class="label label-green  half">أداء فريضة الحج<strong class="astric">*</strong><strong></strong> </label>
                                        <select name="m_hijri" class="selectpicker no-padding  disabled form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                                            <option value="">اختر</option>
                                            <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                                                $selected='';if($r==$result['m_hijri']){$selected='selected';}
                                                ?>
                                                <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12" >
                                        <label class="label label-green  half">أداء فريضة العمرة<strong class="astric">*</strong><strong></strong> </label>
                                        <select name="m_ommra" class="selectpicker no-padding  disabled form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                                            <option value="">اختر</option>
                                            <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                                                $selected='';if($r==$result['m_ommra']){$selected='selected';}
                                                ?>
                                                <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم الجوال <strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text"  onkeypress="validate_number(event)"  disabled name="m_mob" value="<?php echo $result['m_mob']?>"   id="m_mob"  onkeyup="chek_length('m_mob')"  class="form-control half input-style" data-validation="required"  />
                                        <span  id="m_mob_span" class="span-validation"> </span>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم جوال أخر <strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" onkeypress="validate_number(event)"  disabled name="m_another_mob" id="m_another_mob"  onkeyup="chek_length('m_another_mob')" value="<?php echo $result['m_another_mob']?>"  class="form-control half input-style" data-validation="required" />
                                        <span  id="m_another_mob_span" class="span-validation"> </span>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">البريد الإلكترونى <strong class="astric">*</strong><strong></strong> </label>
                                        <input type="email" name="m_email" disabled  value="<?php echo $result['m_email']?>"  class="form-control half input-style" data-validation="required" />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">المهارة<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="m_skill_name"  disabled  value="<?php echo $result['m_skill_name']?>"  class="form-control half input-style" data-validation="required"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12" >
                                        <label class="label label-green  half">الحياة العملية <strong class="astric">*</strong><strong></strong> </label>
                                        <select name="m_want_work"    id="m_want_work"  disabled   onchange="getWork();" class=" no-padding form-control choose-date form-control half"  data-validation="required" aria-required="true" >
                                            <option value="">اختر</option>
                                            <?php
                                            $arr_work =array('','لا يعمل','يعمل');
                                            for($r=1;$r<sizeof($arr_work);$r++){
                                                $selected=''; if($r==$result['m_want_work']){$selected='selected';}
                                                ?>
                                                <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_work[$r];?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12"  >
                                        <label class="label label-green  half">المهنة<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="m_job_id_fk" id="m_job_id_fk" class=" disabled  no-padding form-control choose-date form-control half "   aria-required="true"  <?php if($result['m_want_work'] ==1){?> disabled="disabled" <?php }?> >
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($job_titles as $job):
                                                $selected='';if($job->id_setting==$result['m_job_id_fk']){$selected='selected';}	?>
                                                <option value="<?php  echo $job->id_setting; ?>"  <?php echo $selected?> ><?php  echo $job->title_setting;?></option>
                                            <?php  endforeach;?>
                                            <option value="0">أخري</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الدخل الشهرى<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" step="any" name="m_monthly_income" disabled  onkeypress="validate_number(event)"  data-validation="" value="<?php echo $result['m_monthly_income'];?>"  id="mo-income" class="form-control half input-style" <?php if($result['m_want_work'] ==1){?>  disabled="disabled" <?php }?>/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">مكان العمل<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text"  name="m_place_work" id="m_place_work" disabled   data-validation="" value="<?php echo $result['m_place_work'];?>"  class="form-control half input-style"  <?php if($result['m_want_work'] ==1){?>  disabled="disabled"  <?php }?>/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">هاتف العمل<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" step="any" name="m_place_mob"  disabled  id="m_place_mob" onkeyup="chek_length('m_place_mob')" onkeypress="validate_number(event)" data-validation="" value="<?php echo $result['m_place_mob'];?>"  class="form-control half input-style"  <?php if($result['m_want_work'] ==1){?>  disabled="disabled"  <?php }?>/>
                                        <span  id="m_place_mob_span" class="span-validation"> </span>
                                    </div>
                                    <?php
                                    if( $person_account ==0  &&  $agent_bank_account ==0 &&   $mother_last_account ==0  ){?>
                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
                                            <select name="m_account" id="m_account"  disabled  onchange="checkMember_account();" class="form-control half">
                                                <?php $yes_no=array('لا','نعم');?>
                                                <option value="">إختر</option>
                                                <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $result['m_account']==$s){$select='selected'; }?>
                                                    <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green  half">إسم الحساب<strong class="astric">*</strong><strong></strong> </label>
                                            <select name="m_account_id" id="m_account_id"  disabled class="form-control half   "  disabled="disabled" >
                                                <?php $yes_no=array('لا','نعم');?>
                                                <option value="">إختر</option>
                                                <?php  if(!empty($banks)){
                                                    foreach ($banks as $bank){  $select=''; if($result['m_account_id']>0 &&  $result['m_account_id'] == $bank->id){$select='selected'; }?>
                                                        <option value="<?php echo $bank->id;?>" <?php echo $select;?>><?php echo $bank->bank_name;?></option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    <?php }elseif($result['m_account'] ==1){ ?>
                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
                                            <select name="m_account" id="m_account"  disabled  onchange="checkMember_account();" class="form-control half">
                                                <?php $yes_no=array('لا','نعم');?>
                                                <option value="">إختر</option>
                                                <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $result['m_account']==$s){$select='selected'; }?>
                                                    <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green  half">إسم الحساب<strong class="astric">*</strong><strong></strong> </label>
                                            <select name="m_account_id" id="m_account_id" class="form-control half   "  disabled="disabled" >
                                                <?php $yes_no=array('لا','نعم');?>
                                                <option value="">إختر</option>
                                                <?php  if(!empty($banks)){
                                                    foreach ($banks as $bank){  $select=''; if(  $result['m_account_id'] == $bank->id){$select='selected'; }?>
                                                        <option value="<?php echo $bank->id;?>" <?php echo $select;?>><?php echo $bank->bank_name;?></option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    <?php } ?>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="father">
                        <div class="panel-body"><br>
                            <?php
                            if(!empty($father) && $father!=null){
                                $full_name =$father->full_name;
                                $f_national_id=$father->f_national_id;
                                $f_national_id_type=$father->f_national_id_type;//
                                $f_birth_date=$father->f_birth_date;
                                $f_job=$father->f_job;//
                                $f_death_id_fk=$father->f_death_id_fk;//
                                $f_child_num=$father->f_child_num;
                                $f_nationality_id_fk=$father->f_nationality_id_fk;//
                                $nationality_other =$father->nationality_other;
                                $f_death_date=$father->f_death_date;
                                $f_job_place=$father->f_job_place;
                                $f_death_reason_fk=$father->f_death_reason_fk;
                                $f_wive_count=$father->f_wive_count;//
                                $f_birth_date = $father->f_birth_date;
                                $f_birth_date_hijri = $father->f_birth_date_hijri;
                                $f_birth_date_year =$father->f_birth_date_year;
                                $f_birth_date_hijri_year =$father->f_birth_date_hijri_year;
                                $family_members_number =$father->family_members_number;
                                $f_card_source =$father->f_card_source;
                            }else{
                                $fullname ="";
                                $disable="";
                                $f_national_id_type='';//
                                $f_national_id='';
                                $f_birth_date='';
                                $f_job="";//
                                $f_death_id_fk='';//
                                $f_child_num='';
                                $f_nationality_id_fk='';//
                                $nationality_other='';
                                $f_death_date='';
                                $f_job_place='';
                                $f_death_reason_fk='';
                                $f_wive_count='';//
                                /*ahmed*/
                                $f_birth_date ='';
                                $f_birth_date_hijri ='';
                                $f_birth_date_year ='';
                                $f_birth_date_hijri_year ='';
                                $family_members_number='';
                                $f_card_source='';
                                /*ahmed*/
                            }
                            ?>
                            <?php if($father =='' && $father ==null){
                                ?>
                                <div class="col-lg-12 alert alert-danger" >لا توجد بيانات للاب</div>
                            <?php }else{?>
                                <div class="col-sm-12 col-xs-12 pull-right" style="margin-bottom: 5px;">
                                    <a target="_blank" href="<?=base_url()."family_controllers/Family/father/".$this->uri->segment(4)?>">
                                        <button class="btn btn-sm btn-success"><i class="fa fa-pencil "></i>إضغط لتعديل بيانات الأب
                                        </button>
                                    </a>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> رقم السجل المدني للأم <strong class="astric">*</strong> </label>
                                        <input type="text" name="mother_national"  data-validation="required"  disabled class="form-control half input-style" value="<?php echo $this->uri->segment(4);?>" />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> الاسم رباعي <strong class="astric">*</strong> </label>
                                        <input type="text" name="full_name"  data-validation="required" class="form-control half input-style" value="<?php echo$full_name;?>" disabled   />
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">نوع الهوية<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="f_national_id_type" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" disabled  data-validation="required"  aria-required="true">
                                            <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)){?>
                                                <option value="">اختر</option>
                                                <?php
                                                foreach ($national_id_array as $row2):
                                                    $selected='';if($row2->id_setting==$f_national_id_type){$selected='selected';}	?>
                                                    <option value="<?php  echo $row2->id_setting;?>" <?php echo $selected?>  ><?php  echo $row2->title_setting;?></option>
                                                <?php  endforeach;?>
                                            <?php }else { ?>
                                                <option value="" selected>اختر</option>
                                                <option value="<?php  echo $row2->id_setting;?>" <?php echo $selected?>  ><?php  echo $row2->title_setting;?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--ahmed-->
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="f_card_source" id="f_card_source" class="selectpicker no-padding form-control choose-date form-control half" disabled  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                                            <option value="">إختر</option>
                                            <?php if(!empty($id_source)){ foreach ($id_source as $record){
                                                $select=''; if($f_card_source==$record->id_setting){$select='selected'; }
                                                ?>
                                                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                                            <?php  } } ?>
                                        </select>               </div>
                                    <!--ahmed-->
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="f_national_id"  data-validation="number" onkeypress="validate_number(event)" value="<?= $f_national_id;?>" id="f_national_id" disabled onkeyup="return valid();" class="form-control half input-style" />
                                        <span  id="validate1"  style="font-size: 11px;" class="help-block col-xs-6"> </span>
                                    </div>
                                    <!--ahmed-->
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        if(!empty($f_birth_date)){
                                            $gregorian_date=explode('/',$f_birth_date); }  ?>
                                        <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
                                        <input class="textbox form-control" type="text" name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))" disabled  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; } ?>"/>
                                        <input class="textbox form-control" type="text" name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))" disabled   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1]; }?>"/>
                                        <input class="textbox4 form-control" type="text" name="CYear"  id="CYear" pattern="\d*"  onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();" disabled    placeholder="year"  id="CYear" size="20" maxlength="4" style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2]; }?>"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <?php      if(!empty($f_birth_date_hijri)){
                                            $hijri_date=explode('/',$f_birth_date_hijri); }?>
                                        <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
                                        <input class="textbox form-control" type="text" name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" disabled value="<?php if(!empty($hijri_date[0])){ echo $hijri_date[0];}?>"  placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                                        <input class="textbox form-control" type="text" name="HMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))" disabled value="<?php  if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                                        <input class="textbox4 form-control" type="text" name="HYear" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form)" disabled value="<?php if(!empty($hijri_date[2])){ echo $hijri_date[2];}?>"  placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong> </label>
                                        <input class="textbox2 form-control half " type="text" name="age" id="myage" id="wd"  value="<?php  if(!empty($gregorian_date[2])){ echo (date('Y-m-d')-$gregorian_date[2]); }?>" readonly />
                                        <input class="textbox2 form-control half hidden" type="number" name="wd" size="60" id="wd" readonly />
                                        <input class="textbox2 hidden" type="text" name="JD"  size="60" id="JD" readonly />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">عدد الذكور<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="male_number" id="male_number"  onkeypress="validate_number(event)" data-validation="required" disabled  onkeyup="getFamilyNumber();"   value="<?php echo $family_members_number;?>"  class="form-control half input-style" />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">عدد الإناث<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="female_number" id="female_number"  onkeypress="validate_number(event)" data-validation="required" disabled  onkeyup="getFamilyNumber();"   value="<?php echo $family_members_number;?>"  class="form-control half input-style" />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">عدد أفراد الاسرة<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="family_members_number" id="family_members_number"  onkeypress="validate_number(event)" data-validation="required" disabled   readonly value="<?php echo $family_members_number;?>"  class="form-control half input-style" />
                                    </div>
                                    <!--ahmed-->
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الجنسية<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="f_nationality_id_fk" id="f_nationality_id_fk" disabled class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                                            <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)){?>
                                                <option value=" " style="display: none;" selected="selected">اختر</option>
                                                <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)):
                                                    foreach($nationality as $one_nationality):
                                                        $selected=''; if($one_nationality->id_setting == $f_nationality_id_fk){ $selected="selected";} ?>
                                                        <option value="<?php echo $one_nationality->id_setting?>" <?php echo $selected?> ><?php echo $one_nationality->title_setting;?></option>
                                                    <?php endforeach;endif;?>
                                                <option value="0"<?php if($f_nationality_id_fk==0) echo "selected";?> >اخري</option>
                                            <?php } else { ?>
                                                <option value=" "  selected="selected">اختر</option>
                                                <option value="0"<?php if($f_nationality_id_fk==0) echo "selected";?> >اخري</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">اضافه جنسيه اخري<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="nationality_other" id="nationality_other" disabled  data-validation="required"   value="<?php echo $nationality_other ?>" class="form-control half input-style" data-validation=""<?php if($nationality_other==""){?> disabled=""<?php }?> />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">المهنة<strong class="astric">*</strong><strong></strong> </label>
                                        <select id="f_job" name="f_job" class="selectpicker no-padding form-control choose-date form-control half" disabled  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >
                                            <?php //$arr_gob=array('اختر','موظف حكومي','موظف قطاع خاص','اعمال حره','لا يعمل'); ?>
                                            <?php foreach($job_titles as $row){
                                                $selected="";if($row->id_setting== $f_job){$selected="selected";} ?>
                                                <option value="">اختر</option>
                                                <option value="<?php echo $row->id_setting ; ?>" <?php echo $selected?> ><?php echo $row->title_setting;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12 red box" style="display: none">
                                        <label class="label label-green  half ">مكان العمل<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" class="form-control half input-style" value="<?php echo $f_job_place ?>" disabled name="f_job_place" />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12" >
                                        <label class="label label-green  half">سبب الوفاة<strong class="astric">*</strong><strong></strong> </label>
                                        <select  onchange="admSelectCheck(this);" name="f_death_id_fk" disabled class="selectpicker no-padding form-control choose-date form-control half"
                                                 data-show-subtext="" data-live-search="true"  data-validation=""  aria-required="true"   >
                                            <?php if(isset($arr_deth) &&!empty($arr_deth)) { ?>
                                                <?php foreach ($arr_deth as $row) {
                                                    $selected = "";
                                                    if ($row->id_setting == $f_death_id_fk) {
                                                        $selected = "selected";
                                                    } ?>
                                                    <option
                                                        value="<?php echo $row->id_setting ?>" <?php echo $selected ?> ><?php echo $row->title_setting; ?></option>
                                                <?php }
                                            ; ?>
                                                <option value="0"<?php if ($f_death_id_fk == 0) echo "selected"; ?> >اخري</option>
                                                <?php
                                            }else{?>
                                                <option value="" selected> اختر</option>
                                                <option value="0"<?php if ($f_death_id_fk == 0) echo "selected"; ?> >اخري</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12"  id="admDivCheck" style="display:block;">
                                        <label class="label label-green  half">السبب<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text"  class="form-control half input-style" disabled
                                               value="<?php echo $f_death_reason_fk?>" name="f_death_reason_fk"
                                               id="f_death_reason_fk" <?php if($f_death_reason_fk==""){?> disabled=""<?php }?>
                                               data-validation="required" />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">تاريخ الوفاة<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="f_death_date" disabled   class="form-control half input-style docs-date" value="<?php echo $f_death_date ?>" data-validation="required"   />
                                    </div>
                                    <!--   <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">عدد الأبناء<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="number"  name="f_child_num" disabled   data-validation="number" value="<?php echo $f_child_num ?>" class="form-control half input-style" />
                                    </div> -->
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">عدد الزوجات<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="number" data-validation="required" disabled   id="wife" class="form-control half input-style" value="<?php echo $f_wive_count ?>" name="f_wive_count" />
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sons">
                        <div class="panel-body"><br>
                            <?php if(isset($member_data) && $member_data!=null): ?>
                                <div class="col-sm-12 col-xs-12 pull-right" style="margin-bottom: 5px;">
                                    <a target="_blank" href="<?php echo base_url()."family_controllers/Family/family_members/".$this->uri->segment(4)."/".$basic_data["person_account"]."/".$basic_data["agent_bank_account"]?>">
                                        <button class="btn btn-sm btn-success"><i class="fa fa-pencil "></i>إضغط لتعديل بيانات الأبناء
                                        </button>
                                    </a>
                                </div>
                                <table class="table table-bordered" style="width:100%">
                                    <header>
                                        <tr class="info">
                                            <th>م </th>
                                            <th>الإسم</th>
                                            <th> إسم الام</th>
                                            <th>رقم الهوية</th>
                                            <th>الجنس </th>
                                            <th>العمر</th>
                                            <th>المهنة </th>
                                            <th>المرحلة </th>
                                            <th>الصف </th>
                                        </tr>
                                    </header>
                                    <tbody>
                                    <?php  $x=1; foreach($member_data as $row):?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $row->member_full_name;  ?></td>
                                            <td><?php echo $mothers_data[0]->full_name;?></td>
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
                                                if(!empty($job_titles)){
                                                    $job_titles_arr =array();
                                                    foreach ($job_titles as $record){
                                                        $job_titles_arr[$record->id_setting] = $record->title_setting;
                                                    }
                                                    if(isset($job_titles_arr[$row->member_job])){
                                                        echo $job_titles_arr[$row->member_job];
                                                    }else{
                                                        echo  "لايعمل ";
                                                    }
                                                }?>
                                            </td>
                                            <td><?php if(!empty($row->stage_name)){echo $row->stage_name;}  ?></td>
                                            <td><?php if(!empty($row->class_name)){echo $row->class_name; } ?></td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            <?php else:?>
                                <div class="col-lg-12 alert alert-danger" > لا يوجد أبناء للأسرة</div>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="house">
                        <div class="panel-body">
                            <?php if(isset($check_data) && $check_data!=null && !empty($check_data)){
                                $result=$check_data;
                            }else{
                                foreach($all_field as $keys=>$value){
                                    $result[$all_field[$keys]]='';
                                }
                                $result['h_rent_amount']=0;
                            }
                            $arr_yes_no=array('','نعم','لا');
                            ?>
                            <div class="col-sm-12 col-xs-12 pull-right" style="margin-bottom: 5px;">
                                <a target="_blank" href="<?=base_url()."family_controllers/Family/house/".$this->uri->segment(4)?>">
                                    <button class="btn btn-sm btn-success"><i class="fa fa-pencil "></i>إضغط لتعديل بيانات السكن
                                    </button>
                                </a>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-6">
                                    <label class="label label-green  half">إسم الام <strong class="astric">*</strong> </label>
                                    <input type="text"  value="<?php echo $mother_data['full_name']?>"  readonly="" class="form-control half input-style"   >
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="label label-green  half">رقم السجل المدنى  <strong class="astric">*</strong> </label>
                                    <input  type="text" value="<?php echo $mother_national_num ?>"  readonly="" class="form-control half input-style"  data-validation="required" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">رقم حساب فاتورة الكهرباء <strong class="astric">*</strong> </label>
                                    <input  placeholder="إدخل البيانات " type="text" disabled onkeypress="validate_number(event)" class="form-control half input-style"  data-validation="required" name="h_electricity_account" value="<?php echo $result['h_electricity_account']?>" >
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">رقم حساب عداد المياه <strong class="astric">*</strong> </label>
                                    <input  placeholder="إدخل البيانات " type="text" disabled  onkeypress="validate_number(event)"class="form-control half input-style"  data-validation="required" name="h_water_account" value="<?php echo $result['h_water_account']?>" >
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">الرقم الصحى <strong class="astric">*</strong> </label>
                                    <input type="text" name="h_health_number" disabled   onkeypress="validate_number(event)"value="<?php echo $result['h_health_number']?>" class="form-control half input-style"  data-validation="required" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">المنطقة <strong class="astric">*</strong> </label>
                                    <select class="form-control half " disabled onchange="plases('h_area_id_fk','h_city_id_fk');" name="h_area_id_fk" id="h_area_id_fk"  data-validation="required"  aria-required="true">
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
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> المحافظة   <strong class="astric">*</strong> </label>
                                    <select class="form-control half " disabled onchange="plases('h_city_id_fk','h_center_id_fk');" name="h_city_id_fk" id="h_city_id_fk"  data-validation="required"  aria-required="true">
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
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> المركز   <strong class="astric">*</strong> </label>
                                    <select class="form-control half " disabled onchange="plases('h_center_id_fk','h_village_id_fk');" name="h_center_id_fk" id="h_center_id_fk"  data-validation="required"  aria-required="true">
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
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> القرية   <strong class="astric">*</strong> </label>
                                    <select class="form-control half " disabled  name="h_village_id_fk" id="h_village_id_fk"  data-validation="required"  aria-required="true">
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
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> الحى  <strong class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " type="text" disabled class=" some_class form-control half input-style" data-validation="required" name="hai_name" value="<?php echo  $result['hai_name']?>" >
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">الشارع <strong class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " type="text" disabled class=" some_class form-control half input-style" data-validation="required" name="h_street" value="<?php echo $result['h_street']?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">أقرب مدرسة <strong class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " type="text" disabled class=" some_class form-control half input-style" data-validation="required" name="h_nearest_school" value="<?php echo $result['h_nearest_school']?>" >
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> أقرب معلم  <strong class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " disabled type="text" class=" some_class form-control half input-style" data-validation="required" name="h_nearest_teacher" value="<?php echo $result['h_nearest_teacher']?>"  >
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">أقرب مسجد <strong class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " disabled type="text" class=" some_class form-control half input-style" data-validation="required" name="h_mosque" value="<?php echo $result['h_mosque']?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> نوع السكن  <strong class="astric">*</strong> </label>
                                    <select class="form-control half" disabled name="h_house_type_id_fk"  data-validation="required"  aria-required="true">
                                        <option  value="">اختر</option>
                                        <?php foreach($arr_type_house as $x):
                                            $selected='';if($x->id_setting==$result['h_house_type_id_fk']){$selected='selected';}?>
                                            <option value="<?php echo $x->id_setting ?>" <?php echo $selected?> ><?php echo $x->title_setting ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">لون المنزل <strong class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " disabled type="text" class=" some_class form-control half input-style" data-validation="required" name="h_house_color" value="<?php echo $result['h_house_color']?>" >
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">اتجاه المنزل  <strong class="astric">*</strong> </label>
                                    <select class="form-control half" disabled  name="h_house_direction"  data-validation="required"  aria-required="true">
                                        <option  value="">اختر</option>
                                        <?php foreach($arr_direct as $y):
                                            $selected='';if($y->id_setting==$result['h_house_direction']){$selected='selected';}?>
                                            <option value="<?php echo $y->id_setting ?>" <?php echo $selected?> ><?php echo $y->title_setting ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">الحالة <strong class="astric">*</strong> </label>
                                    <select class="form-control half" disabled name="h_house_status_id_fk"  data-validation="required"  aria-required="true">
                                        <option  value="">اختر</option>
                                        <?php foreach($house_state as $z):
                                            $selected='';if($z->id_setting==$result['h_house_status_id_fk']){$selected='selected';}?>
                                            <option value="<?php echo $z->id_setting ?>" <?php echo $selected?> ><?php echo $z->title_setting ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">عدد الغرف  <strong class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " disabled type="text" onkeypress="validate_number(event);" class=" some_class form-control half input-style"data-validation="required"  name="h_rooms_account" value="<?php echo $result['h_rooms_account']?>" >
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">مساحة البناء <strong class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " disabled type="text" onkeypress="validate_number(event);" class=" some_class form-control half input-style"data-validation="required" name="h_house_size"  value="<?php echo $result['h_house_size']?>" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">ملكية السكن  <strong class="astric">*</strong> </label>
                                    <select class="form-control half" disabled  id="building_type" name="h_house_owner_id_fk"   data-validation="required"  aria-required="true" onchange="getRent();">
                                        <option  value="">اختر</option>
                                        <option  value="rent" <?php if($result['h_house_owner_id_fk'] ==='rent' ){?> selected <?php }?>>إيجار</option>
                                        <?php
                                        foreach($house_own as $a):
                                            $selected='';if($a->id_setting==$result['h_house_owner_id_fk']){$selected='selected';}?>
                                            <option value="<?php echo $a->id_setting ?>" <?php echo $selected?> ><?php echo $a->title_setting ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">إسم المؤجر <strong class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " disabled type="text" class=" some_class form-control half input-style"  name="h_renter_name" id="h_renter_name" value="<?php echo $result['h_renter_name']?>"   <?php if($result['h_house_owner_id_fk'] !='rent'){?>  disabled<?php } ?>  >
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">رقم الجوال <strong class="astric">*</strong><strong></strong> </label>
                                    <input type="text" name="h_renter_mob" disabled  id="h_renter_mob" onkeyup="chek_length('h_renter_mob');" placeholder="إدخل البيانات "   onkeyup="chek_length('h_renter_mob')" onkeypress="validate_number(event)"  class="form-control half input-style "  value="<?php echo $result['h_renter_mob'];?>"  <?php if($result['h_house_owner_id_fk'] !=='rent'){?>  disabled<?php } ?>/>
                                    <span  id="h_renter_mob_span" class="span-validation"> </span>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">رقم الجوال<strong class="astric">*</strong><strong></strong> </label>
                                    <input type="text" name="h_renter_mob" disabled  id="h_renter_mob" onkeyup="chek_length('h_renter_mob');" placeholder="إدخل البيانات "  onkeypress="validate_number(event)"  class="form-control half input-style "  value="<?php echo $result['h_renter_mob'];?>"  <?php if($result['h_house_owner_id_fk'] !=='rent'){?>  disabled<?php } ?>/>
                                    <span  id="lenth_mob" class="span-validation"> </span>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">تاريخ بداية العقد<strong class="astric">*</strong><strong></strong> </label>
                                    <input type="text" name="contract_start_date" disabled  id="contract_start_date"   placeholder="إدخل البيانات " class="form-control half input-style docs-date"  value="<?php echo $result['contract_start_date'];?>"  <?php if($result['h_house_owner_id_fk'] !=='rent'){?>  disabled<?php } ?>/>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">تاريخ نهاية العقد<strong class="astric">*</strong><strong></strong> </label>
                                    <input type="text" name="contract_end_date" disabled  id="contract_end_date"   placeholder="إدخل البيانات "  class="form-control half input-style docs-date"  value="<?php echo $result['contract_end_date'];?>"  <?php if($result['h_house_owner_id_fk'] !='rent'){?>  disabled<?php } ?>/>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">مقدار الإيجار السنوى <strong class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " disabled type="text" onkeypress="validate_number(event);" class=" some_class form-control half input-style" data-validation="required" name="h_rent_amount" value="<?php echo $result['h_rent_amount']?>"    >
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> عدد دورات المياه  <strong class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " type="text" disabled  onkeypress="validate_number(event);"class=" some_class form-control half input-style" data-validation="required" name="h_bath_rooms_account"  value="<?php echo $result['h_bath_rooms_account']?>" >
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  col-xs-6 no-padding">مقترض من البنك العقارى <strong class="astric">*</strong> </label>
                                    <select class=" col-xs-6 no-padding " disabled  name="h_borrow_from_bank" id="bank" style="border: 1px solid #ccc;"  data-validation="required"  aria-required="true">
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
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">القيمة المتبقية <strong class="astric">*</strong> </label>
                                    <input type="text" <?=$dis?> name="h_borrow_remain" disabled onkeypress="validate_number(event);" value="<?php echo $result['h_borrow_remain']?>" class="some_class form-control half input-style" placeholder="القيمة المتبقية" style="width: 25%;" id="bank-cost" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green col-xs-6 no-padding">قرض ترميم من بنك التسليف <strong class="astric">*</strong> </label>
                                    <select class="col-xs-6 no-padding " name="h_loan_restoration" id="fix" style="border: 1px solid #ccc;"  data-validation="required"  aria-required="true">
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
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">القيمة المتبقية <strong class="astric">*</strong> </label>
                                    <input  placeholder="إدخل البيانات "  type="text"  onkeypress="validate_number(event);" <?=$dis?> name="h_loan_restoration_remain" value="<?php echo $result['h_loan_restoration_remain']?>" class="some_class form-control half input-style" placeholder="القيمة المتبقية" style="width: 25%;" id="fix-cost" >
                                </div>
                            </div>
                            <!-----------------map--------------->
                            <h4 class=" sub-title col-xs-12">خريطة المنزل</h4>
                            <label class="right main-label col-xs-6 no-padding">تضمين الخريطة  ( قم بتضمين خريطة جوجل هنا  ) <strong class="astric">*</strong> </label>
                            <div class="col-sm-12">
                                <input type="text" name="map" value='<?php echo $result['map']  ?>'
                                       class="form-control col-xs-6 no-padding"/>
                                <?php if($result['map'] == '' ) {
                                    echo ' <div class="clearfix"></div>
                        <div class="alert alert-danger">    لا يوجد خريطة محفوظة  </div>' ;
                                }else{
                                    echo $result['map'];
                                }?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="devices">
                        <div class="panel-body"><br>
                            <?php if(isset($devices) && $devices!=null):?>
                                <div class="col-sm-12 col-xs-12  pull-right" style="margin-bottom: 5px;">
                                    <a target="_blank" href="<?=base_url()."family_controllers/Family/devices/".$this->uri->segment(4)?>">
                                        <button class="btn btn-sm btn-success"><i class="fa fa-pencil "></i>إضغط لتعديل بيانات الأجهزة المنزلية
                                        </button>
                                    </a>
                                </div>
                                <table class="table table-bordered" id="tab_logic">
                                    <thead>
                                    <tr class="info">
                                        <th>م</th>
                                        <th style="text-align: center">نوع الجهاز</th>
                                        <th style="text-align: center">العدد</th>
                                        <th style="text-align: center">حالة الجهاز</th>
                                        <th style="text-align: center" >ملاحظات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;
                                    $a=1; foreach($devices as $row): ?>
                                        <tr>
                                            <td><?php echo $a;?></td>
                                            <td><?php echo $row->name; ?> </td>
                                            <td><?php echo $row->d_count?></td>
                                            <td><?php echo $house_device_status[$row->d_house_device_status_id_fk]?></td>
                                            <td><?php echo $row->d_note?></td>
                                        </tr>
                                        <?php $a++; endforeach ?>
                                    </tbody>
                                </table>
                            <?php else:?>
                                <div class="col-lg-12 alert alert-danger" > لاتوجد أجهزة</div>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="home_needs">
                        <div class="panel-body"><br>
                            <?php if(isset($home_needs) && $home_needs!=null):?>
                                <div class="col-sm-12 col-xs-12 pull-right" style="margin-bottom: 5px;">
                                    <a target="_blank" href="<?=base_url()."family_controllers/Family/home_needs/".$this->uri->segment(4)?>">
                                        <button class="btn btn-sm btn-success"><i class="fa fa-pencil "></i>إضغط لتعديل بيانات ما يحتاجه المنزل
                                        </button>
                                    </a>
                                </div>
                                <table class="table table-bordered" id="tab_logic">
                                    <thead>
                                    <tr class="info">
                                        <th>م</th>
                                        <th style="text-align: center">نوع إحتياج المنزل</th>
                                        <th style="text-align: center">العدد</th>
                                        <th style="text-align: center" >ملاحظات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $a=1; foreach($home_needs as $row): ?>
                                        <tr>
                                            <td><?php echo $a;?></td>
                                            <td><?php echo $row->name; ?> </td>
                                            <td><?php echo $row->h_count?></td>
                                            <td><?php echo $row->h_note?></td>
                                        </tr>
                                        <?php $a++; endforeach ?>
                                    </tbody>
                                </table>
                            <?php else:?>
                                <div class="col-lg-12 alert alert-danger" > لاتوجد إحتياجات للمنزل</div>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="attach_files">
                        <div class="panel-body"> <br>
                            <?php
                            if (isset($attach_files) && !empty($attach_files)) {
                                $death_certificate=$attach_files[0]->death_certificate;
                                $family_card=$attach_files[0]->family_card;
                                $plowing_inheritance=$attach_files[0]->plowing_inheritance;
                                $instrument_agency_with_orphans =$attach_files[0]->instrument_agency_with_orphans;
                                $birth_certificate =$attach_files[0]->birth_certificate;
                                $ownership_housing =$attach_files[0]->ownership_housing;
                                $definition_school =$attach_files[0]->definition_school;
                                $social_security_card =$attach_files[0]->social_security_card;
                                $bank_statement =$attach_files[0]->bank_statement;
                                $collected_files =$attach_files[0]->collected_files;
                            }else{
                                $death_certificate='';
                                $family_card='';
                                $plowing_inheritance='';
                                $instrument_agency_with_orphans ='';
                                $birth_certificate ='';
                                $ownership_housing ='';
                                $definition_school ='';
                                $social_security_card ='';
                                $bank_statement ='';
                                $collected_files ='';
                                $id='';
                            }?>
                            <div class="col-sm-12 col-xs-12 pull-right" style="margin-bottom: 5px;">
                                <a target="_blank" href="<?=base_url()."family_controllers/Family/attach_files/".$this->uri->segment(4)?>">
                                    <button class="btn btn-sm btn-success"><i class="fa fa-pencil "></i>إضغط لتعديل بيانات رفع الوثائق
                                    </button>
                                </a>
                            </div>
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
                            <table class="table table-bordered" >
                                <tr>
                                    <th>م </th>
                                    <th>إسم الملف </th>
                                    <th>عرض/تحميل الملف </th>
                                </tr>
                                <tr >
                                    <td> 1 </td>
                                    <td> شهادة الوفاة <strong class="astric">*</strong></td>
                                    <td>
                                        <?php if (!empty($death_certificate)){?>
                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$death_certificate ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$death_certificate ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>
                                    </td>
                                </tr>
                                <tr >
                                    <td>2  </td>
                                    <td> كارت العائلة  <strong class="astric">*</strong></td>
                                    <td>
                                        <?php if (!empty($family_card)){?>
                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$family_card ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$family_card ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>
                                    </td>
                                </tr>
                                <tr >
                                    <td>3  </td>
                                    <td> صك حرث الارث  <strong class="astric">*</strong></td>
                                    <td>
                                        <?php if (!empty($plowing_inheritance)){?>
                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$plowing_inheritance ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$plowing_inheritance ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>
                                    </td>
                                </tr>
                                <tr >
                                    <td> 4 </td>
                                    <td> صك الولاية <strong class="astric">*</strong></td>
                                    <td>
                                        <?php if (!empty($instrument_agency_with_orphans)){?>
                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$instrument_agency_with_orphans ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$instrument_agency_with_orphans ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>
                                    </td>
                                </tr>
                                <tr >
                                    <td> 5 </td>
                                    <td> شهادات الميلاد <strong class="astric">*</strong></td>
                                    <td>
                                        <?php if (!empty($birth_certificate)){?>
                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$birth_certificate ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$birth_certificate ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>
                                    </td>
                                </tr>
                                <tr >
                                    <td> 6 </td>
                                    <td> صك ملكية السكن أو عقد الايجار  <strong class="astric">*</strong></td>
                                    <td>
                                        <?php if (!empty($ownership_housing)){?>
                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$ownership_housing ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$ownership_housing ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>
                                    </td>
                                </tr>
                                <tr >
                                    <td> 7 </td>
                                    <td> تعريف من المدرسة بجميع الأبناء و البنات <strong class="astric">*</strong></td>
                                    <td>
                                        <?php if (!empty($definition_school)){?>
                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$definition_school ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$definition_school ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>
                                    </td>
                                </tr>
                                <tr >
                                    <td> 8 </td>
                                    <td>بطاقة الضمان  الاجتماعى  <strong class="astric">*</strong></td>
                                    <td>
                                        <?php if (!empty($social_security_card)){?>
                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$social_security_card ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$social_security_card ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>
                                    </td>
                                </tr>
                                <tr >
                                    <td> 9 </td>
                                    <td> الحساب البنكي ( رقم الأيبان ) <strong class="astric">*</strong></td>
                                    <td>
                                        <?php if (!empty($bank_statement)){?>
                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$bank_statement ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$bank_statement ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>
                                    </td>
                                </tr>
                                <tr >
                                    <td> 10 </td>
                                    <td>رفع جميع المستندات <strong class="astric">*</strong></td>
                                    <td>
                                        <?php if (!empty($collected_files)){?>
                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$collected_files ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$collected_files ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!------------- بيانات ماليه -------------->
                    <div class="tab-pane fade" id="money">
                        <?php if(isset($money)&&!empty($money)){?>
                            <div class="panel-body" > <br >
                                <?php  $arr_yes_no = array('', 'نعم', 'لا');?>
                                <div class="col-sm-12 col-xs-12 pull-right" style="margin-bottom: 5px;">
                                    <a target="_blank" href="<?=base_url()."family_controllers/Family/money/".$this->uri->segment(4)?>">
                                        <button class="btn btn-sm btn-success"><i class="fa fa-pencil "></i>إضغط لتعديل البيانات المالية
                                        </button>
                                    </a>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم السجل المدني للأم<strong
                                                class="astric">*</strong> </label>
                                        <input type="text" name="mother_national_num_fk" readonly="" data-validation="required"
                                               value="<?php echo $this->uri->segment(4); ?>"
                                               class="form-control half input-style"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">إسم الأم بالكامل<strong class="astric">*</strong>
                                        </label>
                                        <input type="text" name="m_first_name" readonly="" data-validation="required"
                                               value="<?php echo $mother_full_name; ?>" class="form-control half input-style"/>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="col-sm-6 col-xs-12">
                                        <h5 class="title-top"> مصادر الدخل</h5>
                                        <?php
                                        $affect_arr=array('لا تؤثر','تؤثر');
                                        if(!empty($income_sources)){   for($a=0; $a<sizeof($income_sources);$a++){?>
                                            <div class="col-xs-12"  style="margin-bottom: 15px; padding: 0">
                                                <label class="label label-green " style="padding: 3px 35px;"><?php echo$income_sources[$a]->title_setting?></label>
                                                <input type="hidden" name="finance_income_type_id_income<?php echo $a;?>" value="<?php echo$income_sources[$a]->id_setting; ?>">
                                                <input type="text" name="value_income<?php echo $a;?>" disabled  data-validation="required" value="<?php
                                                if(!empty($money[$income_sources[$a]->id_setting])){ echo $money[$income_sources[$a]->id_setting]->value;}
                                                ?>" onkeypress="validate_number(event);" class="form-control" style="  width: 28%;display: inline-block;" >
                                                <?php for ($d=0;$d<sizeof($affect_arr);$d++){
                                                    $check ='';
                                                    if(isset($money[$income_sources[$a]->id_setting])  && $money[$income_sources[$a]->id_setting]!=''){
                                                        if(  $d == $money[$income_sources[$a]->id_setting]->affect){
                                                            $check ='checked';
                                                        }
                                                    }
                                                    ?>
                                                    <input type="radio" name="affect_income<?php echo $a;?>" disabled   data-validation="required"  <?php echo $check;?> value="<?php echo $d;?>" style="margin-right: 20px;">
                                                    <label for=""><?php echo $affect_arr[$d];?></label>
                                                <?php } ?>
                                            </div>
                                        <?php } } ?>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <h5 class="title-top">  الالتزامات المستهدفة</h5>
                                        <?php
                                        if(!empty($monthly_duties)){   for($s=0; $s<sizeof($monthly_duties);$s++){?>
                                            <div class="col-xs-12"  style="margin-bottom: 15px; padding: 0">
                                                <label class="label label-green " style="padding: 3px 35px;"><?php echo $monthly_duties[$s]->title_setting?></label>
                                                <input type="hidden" name="finance_income_type_id_duty<?php echo $s;?>" value="<?php echo$monthly_duties[$s]->id_setting; ?>">
                                                <input type="text"  name="value_duty<?php echo $s;?>"  disabled  data-validation="required"  value="<?php
                                                if(!empty($money[$monthly_duties[$s]->id_setting])){ echo $money[$monthly_duties[$s]->id_setting]->value;}
                                                ?>" onkeypress="validate_number(event);" class="form-control" style="  width: 28%;display: inline-block;" >
                                                <?php for ($d=0;$d<sizeof($affect_arr);$d++){
                                                    $check ='';
                                                    if(isset($money[$monthly_duties[$s]->id_setting])  && $money[$monthly_duties[$s]->id_setting]!=''){
                                                        if(  $d == $money[$monthly_duties[$s]->id_setting]->affect){
                                                            $check ='checked';
                                                        }
                                                    }
                                                    ?>
                                                    <input type="radio" name="affect_duty<?php echo $s;?>" disabled   data-validation="required"   <?php echo $check;?> value="<?php echo $d;?>" style="margin-right: 20px;">
                                                    <label for=""><?php echo $affect_arr[$d];?></label>
                                                <?php } ?>
                                            </div>
                                        <?php } } ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }else { ?>
                            <div class="col-lg-12 alert alert-danger" >لا توجد بيانات ماليه</div>
                            <?php
                        }
                        ?>
                    </div>
                    <!---------------- نهاية البيانات المالية ---------->
                    <!-------------------- راي الباحث ----------------------------------->
                    <div class="tab-pane fade" id="research">
                        <br>
                        <div class="col-sm-12 col-xs-12 pull-right" style="margin-bottom: 5px;">

                            <a target="_blank" href="<?=base_url()."family_controllers/Family/SocialResearcher/".$this->uri->segment(4)?>">
                                <button class="btn btn-sm btn-success"><i class="fa fa-pencil "></i>  إضغط لتعديل رأي الباحث
                                </button>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">إسم الام <strong class="astric">*</strong> </label>
                                <input type="text"  value="<?php echo $mother_data['full_name']?>"  readonly="" class="form-control half input-style"   >
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="label label-green  half">رقم السجل المدنى  <strong class="astric">*</strong> </label>
                                <input  type="text" value="<?php echo $mother_national_num ?>"  readonly="" class="form-control half input-style"   >
                            </div>
                        </div>
                        <div class="form-group col-sm-12" >
                            <div class="col-sm-6">
                                <label class="label label-green  half">هل الام متواجدة</label>
                                <select  disabled="" name="is_mother_present" class="form-control half"  aria-required="true" tabindex="-1" aria-hidden="true">
                                    <option value="">إختر </option>
                                    <?php  if(isset($arr_in) && !empty($arr_in) && $arr_in!= null) {
                                        foreach ($arr_in as $x):
                                            $selected = '';
                                            if (isset($result_opinion)) {
                                                if ($x->id_setting == $result_opinion['is_mother_present']) {
                                                    $selected = 'selected';
                                                }
                                            } ?>
                                            <option value="<?php echo $x->id_setting ?>" <?php echo $selected; ?> >
                                                <?php echo $x->title_setting; ?> </option>
                                        <?php endforeach;
                                    }else{  echo '<option value="">لا يوجد بيانات مضافة  </option>';}
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="label label-green  half">إنطباع الام عن الزيارة</label>
                                <select disabled="" name="mother_impression_visit" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                                    <option value="">إختر </option>
                                    <?php  if(isset($arr_op) && !empty($arr_op) && $arr_op!= null) {
                                        foreach ($arr_op as $y):
                                            $selected = '';
                                            if (isset($result_opinion)) {
                                                if ($y->id_setting == $result_opinion['mother_impression_visit']) {
                                                    $selected = 'selected';
                                                }
                                            } ?>
                                            <option value="<?php echo $y->id_setting ?>" <?php echo $selected; ?> >
                                                <?php echo $y->title_setting; ?> </option>
                                        <?php endforeach;
                                    }else{  echo '<option value="">لا يوجد بيانات مضافة  </option>';}
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-12" >
                            <div class="col-sm-6">
                                <label class="label label-green  half">الاهتمام بنظافة المنزل</label>
                                <select disabled="" name="home_cleaning" class="form-control half"  aria-required="true" tabindex="-1" aria-hidden="true">
                                    <option value="">إختر </option>
                                    <?php for($x=1;$x<sizeof($arr_yes_no);$x++):
                                        $selected='';
                                        if(isset($result_opinion)){
                                            if($x==$result_opinion['home_cleaning']){$selected='selected';}
                                        }?>
                                        <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_yes_no[$x];?> </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="label label-green  half">الاهتمام بنظافة الابناء</label>
                                <select disabled="" name="child_cleanliness" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                                    <option value="">إختر </option>
                                    <?php for($x=1;$x<sizeof($arr_yes_no);$x++):
                                        $selected='';
                                        if(isset($result_opinion)){
                                            if($x==$result_opinion['child_cleanliness']){$selected='selected';}
                                        }?>
                                        <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_yes_no[$x];?> </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-12" >
                            <div class="col-sm-6">
                                <label class="label label-green  half">فئة الاسرة</label>
                                <select   disabled="" name="family_type" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                                    <option value="">إختر </option>
                                    <?php  if(isset($arr_type) && !empty($arr_type) && $arr_type!= null) {
                                        foreach ($arr_type as $z):
                                            $selected = '';
                                            if (isset($result_opinion)) {
                                                if ($z->id_setting == $result_opinion['family_type']) {
                                                    $selected = 'selected';
                                                }
                                            } ?>
                                            <option value="<?php echo $z->id_setting ?>" <?php echo $selected; ?> >
                                                <?php echo $z->title_setting; ?> </option>
                                        <?php endforeach;
                                    }else{  echo '<option value="">لا يوجد بيانات مضافة  </option>';}  ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-sm-12" >
                            <div class="col-sm-6">
                                <label class="label label-green  half">مرئيات الباحث</label>
                    <textarea disabled=""  name="videos_researcher" class="form-control half" rows="5" data-validation="required" >
                  <?php if(isset($result_opinion['videos_researcher'])&& $result_opinion['videos_researcher']!=null)
                  {echo $result_opinion['videos_researcher'];}?>
                    </textarea>
                            </div>
                            <div class="col-sm-6">
                                <label class="label label-green  half">مرئيات رئيس قسم شؤون الاسر</label>
                    <textarea  disabled="" name="video_family_leader" class="form-control half" rows="5" data-validation="required" >
                          <?php if(isset($result_opinion['video_family_leader'])&& $result_opinion['video_family_leader']!=null){
                              echo $result_opinion['video_family_leader'];}?>
                    </textarea>
                            </div>
                        </div>
                    </div>
                    <!-------------------- 774 ----------------------------------->
                </div>
            </div>
            <!------------------------------------>
            <br/>
            <br/>
            <!---------------- family operation ------------------->
            <!-- 
            <div class="col-sm-12">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-success w-md m-b-5" data-toggle="modal" data-target="#modal-process-procedure">
                        <span><i class="fa fa-paper-plane" aria-hidden="true"></i></span>احالة  الملف
                    </button>
                </div>
                <div class="col-sm-2"></div>
            </div>
           7 -->
            <!---------------- family operation ------------------->
  <!-- 777 -->
            <?php

           
            if(isset($buttun_roles) && !empty($buttun_roles) && $buttun_roles !=null){?>
                <div class="col-sm-12">
                    <?php $arr_prosess=array("1"=>" قبول الملف","2"=>" رفض الملف","3"=>" تحويل الملف","4"=>"إعتماد الملف","5"=>"تحويل الى لجنة")?>
                    <?php $arr_but_color=array("1"=>"success","2"=>"danger","3"=>"warning","4"=>"purple","4"=>"purple","5"=>"purple")?>
                    <?php $arr_but_icon=array("1"=>"check-square-o","2"=>"window-close","3"=>"paper-plane","4"=>"floppy-o","5"=>"floppy-o")?>
                    <div class="col-sm-2"></div>
                    <?php foreach ($buttun_roles as $row=>$value){?>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-<?=$arr_but_color[$value]?> w-md m-b-5" data-toggle="modal" data-target="#modal-sm-<?=$value?>">
                                <span><i class="fa fa-<?=$arr_but_icon[$value]?>" aria-hidden="true"></i></span><?=$arr_prosess[$value]?>
                            </button>
                        </div>
                    <?php }?>
                    <div class="col-sm-2"></div>
                </div>
            <?php }?>
            <!-- 7777 -->
<!----------------------------------------------------->
            <!----------------------------------------------------->
        </div>
    </div>
</div>
<!---------------- family operations -------------------->
<?php if(isset($all_operation_2) && $all_operation_2!=null):?>
    <div class="col-xs-12 " >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">الاجرائات المتخذة </h3>
            </div>
            <div class="panel-body">
                <!--------------------------------------------------------------------------------------------------------->
                <table class=" display table table-bordered table-striped table-hover">
                    <tr class="info">
                        <th>م </th>
                        <th>من</th>
                        <th> الي</th>
                        <th>الحالة </th> 
                        <th>التاريخ </th>
                        <th>الوقت</th>
                        <th>الاجراءات </th>
                        <th> ملاحظات </th>
                    </tr>  <!-- Y-m-d H:i:s -->
                    <?php
                    /* 
                    echo '<pre>';
                    print_r($all_operation_2);
                    echo '<pre>';*/
                    $count=1; foreach($all_operation_2 as $row):?>
                        <tr>
                            <td><?php echo $row->id?></td>
                            <td><?php //echo  $jobs_name[$row->family_file_from]->name 
                            echo  $row->user_name_from;
                            
                            ?></td>
                            <td><?php //echo  $jobs_name[$row->family_file_to]->name
                              echo  $row->user_name_to;
                            ?></td>
                            <td><?php if($row->process ==1){
                                    echo ' قبول الملف';
                                }elseif($row->process ==2){
                                    echo 'رفض الملف';
                                }elseif($row->process ==3){
                                  //  echo 'للإطلاع عند'.$jobs_name[$row->family_file_to]->name;
                                   echo 'تحويل الملف';
                                }elseif($row->process ==4){
                                    echo 'اعتماد الملف';
                                }?>
                            </td>
                            <td> <?php echo date("Y-m-d",$row->date);?></td>
                            <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                            <td><?php if($row->process ==1){
                                    echo 'قبول';
                                }elseif($row->process ==2){
                                    echo 'رفض';
                                }elseif($row->process ==3){
                                    echo 'تحويل';
                                }elseif($row->process ==4){
                                    echo 'اعتماد';
                                }?>
                            </td>
                            <td><?php echo $row->transformation_note ?></td>
                        </tr>
                    <?php endforeach;?>
                </table>
                <!--------------------------------------------------------------------------------------------------------->
            </div>
        </div>
    </div>
<?php endif?>
<?php if(isset($buttun_roles) && !empty($buttun_roles) && $buttun_roles !=null){?>
    <?php foreach ($buttun_roles as $row=>$value){?>
        <div class="modal fade" id="modal-sm-<?=$value?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-success " role="document">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>-->
                        <h1 class="modal-title"><?=$arr_prosess[$value]?></h1>
                    </div>
                    <div class="modal-body row">
                        <?php echo form_open_multipart('TransformationProcess/TransformationOfProfile/'.$value."/".$file_id."/".$this->uri->segment(5));?>
                       
                            <div class="col-sm-12">
                                <label class="label label-green  half">  الى  </label>
                                      <!--  <input type="hidden" name="family_file" value="<?=$record->mother_national_num;?>" />
                                      -->
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
                      <?if($value ==5){?>
                          <div class="col-sm-12">
                              <label class="label label-green  half">  التوصية  </label>
                              <select class="form-control half " name="procedure_id_fk"  data-validation="required" aria-required="true"  >
                                  <option value="">اختر</option>
                                  <?php if(isset($procedures_option_lagna) && $procedures_option_lagna!=null):
                                      foreach($procedures_option_lagna as $one): ?>
                                          <option value="<?php echo$one->id;?>-<?php echo $one->title; ?>"><?php echo $one->title; ?></option>
                                      <?php endforeach; endif;?>
                              </select>
                          </div>
                      <?}?>
                        <div class="col-sm-12">
                            <label class="label label-green  half" >ملاحظات: </label>
                            <textarea class="form-control half input-style"  rows="3" name="reason"  data-validation="required"  ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        <button type="submit" name="operation"  value="operation" class="btn btn-<?=$arr_but_color[$value]?>"><?=$arr_prosess[$value]?></button>
                    </div>
                    <?php echo form_close()?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php }?>
<?php }?>
<!---------------------------------------------------------->