<?php  $this->load->view('web/profile/mother_data')  ; ?>
<div class="tab-content col-md-10">
    <?php if(isset($father) && $father!=null){

        $fullname=$father->full_name;
        $disable="disable";

        $f_national_id=$father->f_national_id;
        $f_national_id_type=$father->f_national_id_type;//

        $f_job=$father->f_job;//
        $f_death_id_fk=$father->f_death_id_fk;//
        $f_child_num=$father->f_child_num;
        $f_female_num=$father->f_female_num;

        $f_nationality_id_fk=$father->f_nationality_id_fk;//
        $nationality_other =$father->nationality_other;



        $f_death_date=$father->f_death_date;
        $f_job_place=$father->f_job_place;
        $f_death_reason_fk=$father->f_death_reason_fk;
        $f_wive_count=$father->f_wive_count;//

        /*ahmed*/

        $f_birth_date= $father->f_birth_date;
        $f_birth_date_hijri= $father->f_birth_date_hijri;
        $f_birth_date_year=$father->f_birth_date_year;
        $f_birth_date_hijri_year=$father->f_birth_date_hijri_year;
        $family_members_number=$father->family_members_number;
        $f_card_source=$father->f_card_source;
        /*ahmed*/
    }else{

        $fullname="";
        $disable="";

        $f_national_id_type='';//
        $f_national_id='';
        $f_birth_date='';
        $f_job="";//
        $f_death_id_fk='';//
        $f_child_num='';
        $f_female_num='';


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


    <?php if(isset($father)&&!empty($father)){ ?>

        <div class="text-center father_form">

            <table width="50%">
                <tr>
                    <td> <h5> لتعديل بيانات الاب</h5></td>
                    <td class="text-center">  <button class="btn" id="link_mother" onclick="hide_father_form();" style="color: #11525d;background-color: #a5dcec;">اضغط هنا  </button>
                    </td>
                </tr>
            </table>
        </div>



    <?php } ?>


<div class="panel_body">
    <div id="father_form"  <?php if(isset($father)&&!empty($father)){?> style="display: none;" <?php } ?>>
<form id="" method="post" action="<?php echo base_url();?>Mother_data/father/<?php echo $this->uri->segment(3);?>">

<div class="col-md-12">
    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label label-green main-label  half"> رقم السجل المدني للأم <strong class="astric">*</strong> </label>
        <input type="text" name="mother_national"  data-validation="required"  disabled class="form-control half input-style" value="<?php echo $this->uri->segment(3);?>" />
    </div>
    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label label-green main-label  half"> الاسم رباعي <strong class="astric">*</strong> </label>
        <input type="text" name="full_name"  data-validation="required" class="form-control half input-style" value="<?php echo $fullname;?>" />
    </div>
    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label label-green main-label  half">نوع الهوية<strong class="astric">*</strong><strong></strong> </label>
        <select  name="f_national_id_type" class="form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
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
    </div>
    <div class="col-md-12">
    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label label-green main-label  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
        <select  name="f_card_source" id="f_card_source" class="form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
            <option value="">إختر</option>
            <?php if(!empty($id_source)){ foreach ($id_source as $record){
                $select=''; if($f_card_source==$record->id_setting){$select='selected'; }
                ?>
                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
            <?php  } } ?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <?php
        if(!empty($f_birth_date)){
            $gregorian_date=explode('/',$f_birth_date); }  ?>
        <label class="label label-green main-label  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
        <input class="textbox form-control" type="text"  data-validtion="required" name="CDay"pattern="\d*" onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))"  placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"  value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; } ?>"/>
        <input class="textbox form-control" type="text" data-validtion="required" name="CMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))"   placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1]; }?>"/>
        <input class="textbox4 form-control" type="text"  data-validtion="required" name="CYear"  id="CYear" pattern="\d*"  onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"    placeholder="year"  id="CYear" size="20" maxlength="4" style="width: 16.6%;float: right;" value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2]; }?>"/>
    </div>
    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <?php      if(!empty($f_birth_date_hijri)){
            $hijri_date=explode('/',$f_birth_date_hijri); }?>
        <label class="label label-green main-label  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
        <input class="textbox form-control" type="text"  data-validtion="required" name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" value="<?php if(!empty($hijri_date[0])){ echo $hijri_date[0];}?>"  placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
        <input class="textbox form-control" type="text"   data-validtion="required" name="HMonth" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))" value="<?php  if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"  id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
        <input class="textbox4 form-control" type="text"  data-validtion="required" name="HYear" pattern="\d*" onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form)" value="<?php if(!empty($hijri_date[2])){ echo $hijri_date[2];}?>"  placeholder="year"  id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
    </div>
        </div>
    <div class="col-md-12">

    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label label-green main-label  half">العمر<strong class="astric">*</strong><strong></strong> </label>
        <input class="textbox2 form-control half " data-validtion="required" type="text" name="age" id="myage" id="wd"  value="<?php  if(!empty($gregorian_date[2])){ echo (date('Y-m-d')-$gregorian_date[2]); }?>" readonly />
        <input class="textbox2 form-control half hidden"  data-validtion="required" type="number" name="wd" size="60" id="wd" readonly />
        <input class="textbox2 hidden" type="text" name="JD"  data-validtion="required"  size="60" id="JD" readonly />
    </div>

    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label label-green main-label  half">عدد الذكور<strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="male_number" id="male_number"  onkeypress="validate_number(event)" data-validation="required"  onkeyup="getFamilyNumber();"   value="<?php echo $f_child_num;?>"  class="form-control half input-style" />
    </div>
    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label label-green main-label  half">عدد الإناث<strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="female_number" id="female_number"  onkeypress="validate_number(event)" data-validation="required"  onkeyup="getFamilyNumber();"   value="<?php echo  $f_female_num;;?>"  class="form-control half input-style" />
    </div>
        </div>
    <div class="col-md-12">

    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label label-green main-label  half">عدد أفراد الاسرة<strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="family_members_number" id="family_members_number"  onkeypress="validate_number(event)" data-validation="required"   readonly value="<?php echo $family_members_number;?>"  class="form-control half input-style" />
    </div>
    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label label-green main-label  half">الجنسية<strong class="astric">*</strong><strong></strong> </label>

        <select  name="f_nationality_id_fk" id="f_nationality_id_fk" class="form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" onchange="change_option($(this).val());">
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
    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label label-green main-label  half">اضافه جنسيه اخري<strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="nationality_other" id="nationality_other" <?php if($f_nationality_id_fk!=0){?> disabled="disabled" <?php }  ?> data-validation="required"   value="<?php echo $nationality_other ?>" class="form-control half input-style" data-validation="" />
    </div>
        </div>
    <div class="col-md-12">
    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label label-green main-label  half">المهنة<strong class="astric">*</strong><strong></strong> </label>
        <select id="f_job" name="f_job" class="form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >

            <?php //$arr_gob=array('اختر','موظف حكومي','موظف قطاع خاص','اعمال حره','لا يعمل'); ?>
            <option value="">اختر</option>
            <?php foreach($job_titles as $row){
                $selected="";if($row->id_setting== $f_job){$selected="selected";} ?>

                <option value="<?php echo $row->id_setting ; ?>" <?php echo $selected?> ><?php echo $row->title_setting;?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12 padding-4" style="display: none">
        <label class=label label-green main-label  half">مكان العمل<strong class="astric">*</strong><strong></strong> </label>
        <input type="text" class="form-control half input-style" value="<?php echo $f_job_place ?>" name="f_job_place" />

    </div>
    <div class="form-group col-sm-4 col-xs-12 padding-4" >
        <label class="label label-green main-label  half">سبب الوفاة<strong class="astric">*</strong><strong></strong> </label>
        <select  onchange="admSelectCheck(this);" name="f_death_id_fk" class="form-control half"
                 data-show-subtext="" data-live-search="true"   data-validtion="required"  aria-required="true"   >
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
        </div>
    <div class="col-md-12">
    <div class="form-group col-sm-4 col-xs-12 padding-4"  id="admDivCheck" style="display:block;">

        <label class="label label-green main-label  half">السبب<strong class="astric">*</strong><strong></strong> </label>
        <input type="text"  class="form-control half input-style"
               value="<?php echo $f_death_reason_fk?>" name="f_death_reason_fk"
               id="f_death_reason_fk" <?php if($f_death_reason_fk==""){?> disabled=""<?php }?>
               data-validation="required" />

    </div>
    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label label-green main-label  half">تاريخ الوفاة<strong class="astric">*</strong><strong></strong> </label>
        <input type="text" name="f_death_date"   class="form-control half input-style docs-date" value="<?php echo $f_death_date ?>" data-validation="required"   />
    </div>
    <div class="form-group col-xs-12">
        <button type="submit" class="btn btn-default btn-sm btn-save mt-10" name="register_data_father" id="register_data_father" value="add">حفظ الأن</button>
    </div>
        </div>


    </form>
    </div>
</div>


</div>
</section>
<script>
    function hide_father_form() {

        $('.father_form').hide();
        $('#father_form').show();



    }




</script>

<script>

 function change_option(valu)
 {

     if(valu==0){
         document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
     }else{
         document.getElementById("nationality_other").setAttribute("disabled", "disabled");
     }
 }


</script>