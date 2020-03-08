<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
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
        font-size: 11px !important;
        position: absolute !important;
        bottom: -23px !important;
        right: 50% !important;
    }

    /**************************/
    /* 27-1-2019 */
    /**************************/
    /* 27-1-2019 */
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }
    .half {
        width: 100% !important;
        float: right !important;
    }
    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }
    .form-group {
        margin-bottom: 0px;
    }
    .bootstrap-select>.btn {
        width: 100%;
        padding-right: 5px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important; 
        left: 4px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }
  /*  .form-control{
        font-size: 15px;
        color: #000;
        border-radius: 4px;
        border: 2px solid #b6d089 !important;
    }*/
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    .has-success .form-control {
        border: 2px solid #b6d089;

        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    }
    .has-success  .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
   
    .tab-content {
        margin-top: 15px;
    }



</style>
<?php
$mother_num = $this->uri->segment(4);
/*
echo '<pre>';
print_r($all_links['father']);
echo '<pre>';*/
if (isset($all_links['father']) && $all_links['father'] != null) {
    $fullname = $all_links['father']['full_name'];
    $father_national_id = $all_links['father']['f_national_id'];
    $disable = "disable";
    $f_national_id = $all_links['father']['f_national_id'];
    $f_national_id_type = $all_links['father']['f_national_id_type'];//
    $f_job = $all_links['father']['f_job'];//
    $f_death_id_fk = $all_links['father']['f_death_id_fk'];//
    $f_nationality_id_fk = $all_links['father']['f_nationality_id_fk'];//
    $nationality_other = $all_links['father']['nationality_other'];
    $f_death_date = $all_links['father']['f_death_date'];
    $f_job_place = $all_links['father']['f_job_place'];
    $f_death_reason_fk = $all_links['father']['f_death_reason_fk'];
    $f_wive_count = $all_links['father']['f_wive_count'];//
    /*ahmed*/
    $f_birth_date = $all_links['father']['f_birth_date'];
    $f_birth_date_hijri = $all_links['father']['f_birth_date_hijri'];
    $f_birth_date_year = $all_links['father']['f_birth_date_year'];
    $f_birth_date_hijri_year = $all_links['father']['f_birth_date_hijri_year'];
    $f_card_source = $all_links['father']['f_card_source'];
    $f_child_num = $all_links['father']['f_child_num'];
    $f_female_num = $all_links['father']['f_female_num'];
    $family_members_number = $f_child_num + $f_female_num;
    /*ahmed*/
} else {
    $fullname = "";
    $father_national_id = "";
    $disable = "";
    $f_national_id_type = '';//
    $f_national_id = '';
    $f_birth_date = '';
    $f_job = "";//
    $f_death_id_fk = '';//
    if (isset($basic_data_family["male_number"])) {
        $f_child_num = $basic_data_family["male_number"];
    } else {
        $f_child_num = '';
    }   // $f_female_num ="";   $family_members_number='';
    if (isset($basic_data_family["female_number"])) {
        $f_female_num = $basic_data_family["female_number"];
    } else {
        $f_female_num = '';
    }
    if (isset($basic_data_family["family_members_number"])) {
        $family_members_number = $basic_data_family["family_members_number"];
    } else {
        $family_members_number = '';
    }
    $f_nationality_id_fk = '';//
    $nationality_other = '';
    $f_death_date = '';
    $f_job_place = '';
    $f_death_reason_fk = '';
    $f_wive_count = '';//
    /*ahmed*/
    $f_birth_date = '';
    $f_birth_date_hijri = '';
    $f_birth_date_year = '';
    $f_birth_date_hijri_year = '';
    $f_card_source = '';
    /*ahmed*/
}
?>
<div class="col-xs-12 ">
    <?php
    /*
    echo '<pre>';
    print_r($basic_data_family);
    echo '<pre>';*/
    ?>
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
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?>  </h3>
        </div>
        <?php echo form_open_multipart('family_controllers/Family/father/' . $this->uri->segment(4) . ''); ?>

        <div class="panel-body" style="height: 400px;">
        <div class="custom-tabs" >
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#main-detailsfa" aria-controls="main-detailsfa" role="tab" data-toggle="tab">البيانات الأساسية</a></li>
                <li role="presentation"><a href="#general-detailsfa" aria-controls="general-detailsfa" role="tab" data-toggle="tab">بيانات عامة</a></li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="main-detailsfa">

                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                            <label class="label label-green  half"> رقم السجل المدني للأب </label>
                            <input type="text" name="mother_national" data-validation="required"
                            disabled class="form-control half input-style"
                            value="<?php echo $father_national_id; //echo $this->uri->segment(4);  ?>"/>
                        </div>
                        <div class="form-group col-md-4 col-sm-5 col-xs-12 padding-4">
                            <label class="label label-green  half"> الاسم رباعي </label>
                            <input type="text" name="full_name"
                            data-validation="required" class="form-control half input-style"
                            value="<?php echo $fullname; ?>"/>
                        </div>



                        <div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">رقم الهوية
                            </label>
                            <input type="text" name="f_national_id" id="f_national_id" data-validation="required"
                            onkeyup="chek_length('f_national_id')" value="<?php echo $f_national_id ?>"
                            onkeypress="validate_number(event)" class="form-control half input-style"/>
                            <span id="f_national_id_span" class="span-validation"> </span>
                        </div>
                        <div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">نوع الهوية
                            </label>
                            <select name="f_national_id_type"
                            class="selectpicker no-padding form-control choose-date form-control half"
                            data-show-subtext="true" data-live-search="true" data-validation="required"
                            aria-required="true">
                            <?php if (isset($nationality) && $nationality != null && !empty($nationality)) { ?>
                            <option value="">اختر</option>
                            <?php
                            foreach ($national_id_array as $row2):
                                $selected = '';
                            if ($row2->id_setting == $f_national_id_type) {
                                $selected = 'selected';
                            } ?>
                            <option
                            value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                        <?php endforeach; ?>
                        <?php } else { ?>
                        <option value="" selected>اختر</option>
                        <option
                        value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <!--ahmed-->
            <div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
                <label class="label label-green  half">مصدر الهوية
                </label>
                <select name="f_card_source" id="f_card_source"
                class="selectpicker no-padding form-control choose-date form-control half"
                data-show-subtext="true" data-live-search="true" data-validation="required"
                aria-required="true">
                <option value="">إختر</option>
                <?php if (!empty($id_source)) {
                    foreach ($id_source as $record) {
                        $select = '';
                        if ($f_card_source == $record->id_setting) {
                            $select = 'selected';
                        }
                        ?>
                        <option
                        value="<?php echo $record->id_setting; ?>" <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                        <?php }
                    } ?>
                </select>
            </div>
            <!--ahmed-->
            <!--ahmed-->


        </div>
        <div class="col-sm-12 col-xs-12">


            <div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
                <?php if (!empty($f_birth_date_hijri)) {
                    $hijri_date = explode('/', $f_birth_date_hijri);
                } ?>
                <label class="label label-green  half">تاريخ الميلاد هجرى
                <input class="textbox form-control" type="text" name="HDay" pattern="\d*"
                onkeypress="return isNumberKey(event)"
                onkeyup="moveOnMax(this,document.getElementById('Hmonth'))"
                value="<?php if (!empty($hijri_date[0])) {
                 echo $hijri_date[0];
             } ?>" placeholder="day" id="HDay" size="20" maxlength="2"
             style="width: 33.33%;float: right;"/>
             <input class="textbox form-control" type="text" name="HMonth" pattern="\d*"
             onkeypress="return isNumberKey(event)"
             onkeyup="moveOnMax(this,document.getElementById('HYear'))"
             value="<?php if (!empty($hijri_date[1])) {
                 echo $hijri_date[1];
             } ?>" placeholder="month" id="Hmonth" size="20" maxlength="2"
             style="width: 33.33%;float: right;"/>
             <input class="textbox4 form-control" type="text" name="HYear" id="HYear" pattern="\d*"
             onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form);getAge();"
             value="<?php if (!empty($hijri_date[2])) {
                 echo $hijri_date[2];
             } ?>" placeholder="year" id="HYear" size="20" maxlength="4"
             style="width: 33.33%;float: right;"/>
         </div>
         <div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
            <?php
            if (!empty($f_birth_date)) {
                $gregorian_date = explode('/', $f_birth_date);
            } ?>
            <label class="label label-green  half">تاريخ الميلاد </label>
            <input class="textbox form-control" type="text" name="CDay" pattern="\d*"
            onkeypress="return isNumberKey(event)"
            onkeyup="moveOnMax(this,document.getElementById('CMonth'))" placeholder="day" id="CDay"
            size="20" maxlength="2" autofocus style="width: 33.33%;float: right;"
            value="<?php if (!empty($gregorian_date[0])) {
             echo $gregorian_date[0];
         } ?>"/>
         <input class="textbox form-control" type="text" name="CMonth" pattern="\d*"
         onkeypress="return isNumberKey(event)"
         onkeyup="moveOnMax(this,document.getElementById('CYear'))" placeholder="month" id="CMonth"
         size="20" maxlength="2" style="width: 33.33%;float: right;"
         value="<?php if (!empty($gregorian_date[1])) {
             echo $gregorian_date[1];
         } ?>"/>
         <input class="textbox4 form-control" type="text" name="CYear" id="CYear" pattern="\d*"
         onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"
         placeholder="year" id="CYear" size="20" maxlength="4" style="width: 33.33%;float: right;"
         value="<?php if (!empty($gregorian_date[2])) {
             echo $gregorian_date[2];
         } ?>"/>
     </div>
     <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
        <label class="label label-green  half">الجنسية
        </label>
        <select name="f_nationality_id_fk" id="f_nationality_id_fk"
        class="selectpicker no-padding form-control choose-date form-control half"
        data-show-subtext="true" data-live-search="true" data-validation="required"
        aria-required="true">
        <?php if (isset($nationality) && $nationality != null && !empty($nationality)) { ?>
        <option value=" " style="display: none;" selected="selected">اختر</option>
        <?php if (isset($nationality) && $nationality != null && !empty($nationality)):
        foreach ($nationality as $one_nationality):
            $selected = '';
        if ($one_nationality->id_setting == $f_nationality_id_fk) {
            $selected = "selected";
        } ?>
        <option
        value="<?php echo $one_nationality->id_setting ?>" <?php echo $selected ?> ><?php echo $one_nationality->title_setting; ?></option>
    <?php endforeach;endif; ?>
    <option value="0"<?php if ($f_nationality_id_fk == 0) echo "selected"; ?> >اخري</option>
    <?php } else { ?>
    <option value=" " selected="selected">اختر</option>
    <option value="0"<?php if ($f_nationality_id_fk == 0) echo "selected"; ?> >اخري</option>
    <?php
}
?>
</select>
</div>
<div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
    <label class="label label-green  half">اضافه جنسيه اخري</label>
        <input type="text" name="nationality_other" id="nationality_other" 
        value="<?php echo $nationality_other ?>" class="form-control half input-style"
        data-validation=""<?php if ($nationality_other == "") { ?> disabled=""<?php } ?> />
    </div>

    <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-4">
        <label class="label label-green  half">المهنة</label>
        <select id="f_job" name="f_job"
        class="selectpicker no-padding form-control choose-date form-control half"
        data-show-subtext="true" data-live-search="true" 
        aria-required="true">
        <?php //$arr_gob=array('اختر','موظف حكومي','موظف قطاع خاص','اعمال حره','لا يعمل'); ?>
        <option value="">اختر</option>
        <?php foreach ($job_titles as $row) {
            $selected = "";
            if ($row->id_setting == $f_job) {
                $selected = "selected";
            } ?>
            <option
            value="<?php echo $row->id_setting; ?>" <?php echo $selected ?> ><?php echo $row->title_setting; ?></option>
            <?php } ?>
        </select>
    </div>
    <!--ahmed-->
    <div class="form-group col-md-2 col-sm-4 col-xs-12 red box" style="display: none">
        <label class="label label-green  half ">مكان العمل
        </label>
        <input type="text" class="form-control half input-style" value="<?php echo $f_job_place ?>"
        name="f_job_place"/>
    </div>

    <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
        <label class="label label-green  half">تاريخ الوفاة هجري  </label>
                                    <!--
                 <input type="text" name="f_death_date"   class="form-control half input-style docs-date" value="<?php echo $f_death_date ?>" data-validation="required"   />
             -->
             <input id="date0" name="f_death_date" type="text" size="10" maxlength="10" style="width: 80px;"
             class="form-control half input-style"
             value="<?php echo $f_death_date ?>"
             
             />
         </div>

         <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
            <label class="label label-green  half">العمر عند الوفاة </label>
            <input class="textbox2 form-control half " type="text" name="age" id="myage" id="wd"
            value="<?php
            if (!empty($current_year) && !empty($f_birth_date_hijri_year)) {
             echo $current_year - $f_birth_date_hijri_year;
         }
                           // if(!empty($gregorian_date[2])){ echo (date('Y-m-d')-$gregorian_date[2]); }
         ?>" readonly/>
         <input class="textbox2 form-control half hidden" type="number" name="wd" size="60"
         id="wd" readonly/>
         <input class="textbox2 hidden" type="text" name="JD" size="60" id="JD" readonly/>
     </div>
     <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
        <label class="label label-green  half">سبب الوفاة</label>
        <select onchange="admSelectCheck(this);" name="f_death_id_fk"
        class="selectpicker no-padding form-control choose-date form-control half"
        data-show-subtext="" data-live-search="true" >
        <?php if (isset($arr_deth) && !empty($arr_deth)) { ?>
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
        } else { ?>
        <option value="" selected> اختر</option>
        <option value="0"<?php if ($f_death_id_fk == 0) echo "selected"; ?> >اخري</option>
        <?php
    }
    ?>
</select>
</div>
<div class="form-group col-md-3 col-sm-4 col-xs-12 padding-4" id="admDivCheck" style="display:block;">
    <label class="label label-green  half">السبب</label>
    <input type="text" class="form-control half input-style"
    value="<?php echo $f_death_reason_fk ?>" name="f_death_reason_fk"
    id="f_death_reason_fk" <?php if ($f_death_reason_fk == "") { ?> disabled=""<?php } ?>
    />
</div>
            <!--
<div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
    <label class="label label-green  half"> جوال التواصل ( الرسائل ) </label>
    <input type="text" name="mob"
     readonly="readonly" class="form-control half input-style"
    value="<?php echo $basic_data_family["contact_mob"]; ?> خاص بـ <?php echo $basic_data_family["title_setting"]; ?> "/>
</div>
-->
            <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                <label class="label label-green  half"> جوال التواصل ( الرسائل ) </label>
                <input type="text" name="contact_mob"
                       class="form-control half input-style"
                       value="<?php echo $basic_data_family["contact_mob"]; ?>"/>
            </div>
            <div class="form-group col-md-1 padding-4 col-sm-4 col-xs-12">
                <label class="label label-green  half">الصلة<strong></strong> </label>
                <select name="contact_mob_relationship" id="contact_mob_relationship"  data-validation="required" aria-required="true" class="selectpicker no-padding form-control choose-date form-control half">
                    <option value="">إختر</option>
                    <?php if(!empty($relationships)){ foreach ($relationships as $record){
                        $select='';
                        if($basic_data_family["contact_mob_relationship"]==$record->id_setting)
                        {
                            $select='selected';
                        }
                        ?>
                        <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                    <?php  } } ?>
                </select>
            </div>







</div>
<div class="col-sm-12 col-xs-12">
    <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
        <label class="label label-green  half">عدد الزوجات
        </label>
        <!--                       <select  name="f_wive_count"class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >-->
        <!--                           <option value="">اختر</option>-->
                    <!--                           --><?php //for($i=1;$i<5;$i++):
                    //                               $selected="";if($i== $f_wive_count){$selected="selected";} ?>
                    <!--                               <option value="--><?php //echo $i?><!--" -->
                    <?php //echo $selected?><!-- >--><?php //echo $i;?><!--</option>-->
                    <!--                           --><?php //endfor;?>
                    <!--                       </select>-->
                    <input type="number"  id="wife" class="form-control half input-style"
                    value="<?php echo $f_wive_count ?>" name="f_wive_count"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">عدد الذكور
                    </label>
                    <input type="text" name="male_number" id="male_number"
                    onkeypress="validate_number(event)" 
                    onkeyup="getFamilyNumber();"
                    value="<?php echo $f_child_num; ?>" class="form-control half input-style"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">عدد الإناث
                    </label>
                    <input type="text" name="female_number" id="female_number"
                    onkeypress="validate_number(event)" 
                    onkeyup="getFamilyNumber();"
                    value="<?php echo $f_female_num; ?>" class="form-control half input-style"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">عدد أفراد الاسرة </label>
                        <input type="text" name="family_members_number" id="family_members_number"
                        onkeypress="validate_number(event)"
                         readonly value="<?php echo $family_members_number; ?>"
                        class="form-control half input-style"/>
                    </div>
                    <!--ahmed-->



                <!-- <div class="form-group col-sm-4 col-xs-12">
     <label class="label label-green  half">عدد الأبناء<strong class="astric">*</strong><strong></strong> </label>
    <input type="number"  name="f_child_num"   data-validation="number" value="<?php echo $f_child_num ?>" class="form-control half input-style" />
</div> -->

</div>

</div>

                <?php $arr_yes_no =array(1=>'نعم',2=>'لا');?>
<div role="tabpanel" class="tab-pane fade" id="general-detailsfa">
  <!--  <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12" >
        <label class="label label-green  half">هل يوجد عمالة</label>
        <select name="f_employment_check" class=" no-padding form-control  form-control half"  data-show-subtext="true" data-live-search="true"
                onchange="Employment_check_function($(this).val())" >
            <option value="">اختر</option>
            <?php foreach ($arr_yes_no as $key =>$value){ ?>
                <option value="<?php echo$key; ?>"

                <?php if(!empty($all_links['father']['f_employment_check'])){
                    if($all_links['father']['f_employment_check'] == $key){ echo'selected'; }
                }?>


                ><?php echo$value; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12" >
        <label class="label label-green  half">هل يوجد أبناء موظفين </label>
        <select name="f_employees_sons_check" class=" no-padding form-control  form-control half"  data-show-subtext="true" data-live-search="true"
                 onchange="Employees_sons_check_function($(this).val())" >
            <option value="">اختر</option>
            <?php foreach ($arr_yes_no as $key =>$value){ ?>
                <option value="<?php echo$key; ?>"
                    <?php if(!empty($all_links['father']['f_employees_sons_check'])){
                        if($all_links['father']['f_employees_sons_check'] == $key){ echo'selected'; }
                    }?>><?php echo$value; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12" >
        <label class="label label-green  half">هل يوجد أبناء ذوى احتياجات خاصة </label>
        <select name="f_special_needs_sons_check" class=" no-padding form-control  form-control half"
                onchange="Special_needs_sons_check_function($(this).val())"
                 >
            <option value="">اختر</option>
            <?php foreach ($arr_yes_no as $key =>$value){ ?>
                <option value="<?php echo$key; ?>"
                    <?php if(!empty($all_links['father']['f_special_needs_sons_check'])){
                        if($all_links['father']['f_special_needs_sons_check'] == $key){ echo'selected'; }
                    }?>
                ><?php echo$value; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12" >
        <label class="label label-green  half">هل الأسرة تستفيد من جمعيات آخرى </label>
        <select name="f_other_associations_check" class=" no-padding form-control  form-control half"
                  onchange="Other_associations_check_function($(this).val())">
            <option value="">اختر</option>
            <?php foreach ($arr_yes_no as $key =>$value){ ?>
                <option value="<?php echo$key; ?>"

                    <?php if(!empty($all_links['father']['f_other_associations_check'])){
                        if($all_links['father']['f_other_associations_check'] == $key){ echo'selected'; }
                    }?>
                ><?php echo$value; ?></option>
            <?php } ?>
        </select>
    </div>

-->




        <!-------------------------end------------------>
    <div class="clearfix"></div><br>
    <div class="col-xs-12 no-padding text-center" style="margin-bottom: 5px;">
      <!--  <ul class="" role="tablist" style="list-style: none;">
            <li role="presentation" class="active"><a href="#"  onclick="">
                    <div class="box-register">
                        <img src="https://abnaa-sa.org//asisst/admin_asset/img/icons/846-8467960_regulation-rules-and-regulation-icon.png">
                        <h5> العمالة</h5>
                    </div>
                </a></li>
            <li role="presentation" ><a href="#"  onclick="">
                    <div class="box-register">
                        <img src="https://abnaa-sa.org//asisst/admin_asset/img/icons/846-8467960_regulation-rules-and-regulation-icon.png">
                        <h5> العمالة</h5>
                    </div>
                </a></li>
            <li role="presentation" ><a href="#"  onclick="">
                    <div class="box-register">
                        <img src="https://abnaa-sa.org//asisst/admin_asset/img/icons/846-8467960_regulation-rules-and-regulation-icon.png">
                        <h5> العمالة</h5>
                    </div>
                </a></li>
            <li role="presentation" ><a href="#"  onclick="">
                    <div class="box-register">
                        <img src="https://abnaa-sa.org//asisst/admin_asset/img/icons/846-8467960_regulation-rules-and-regulation-icon.png">
                        <h5> العمالة</h5>
                    </div>
                </a></li>
        </ul> -->
       <a href="#" onclick="load_page('employment','sons_mowzfen','sons_special','gm3iat')">
            <div class="box-register">
                <img src="https://abnaa-sa.org//asisst/admin_asset/img/icons/846-8467960_regulation-rules-and-regulation-icon.png">
                <h5> العمالة</h5>
            </div>
        </a>
        <a href="#"  onclick="load_page('sons_mowzfen','employment','sons_special','gm3iat')">
            <div class="box-register">
                <img src="https://abnaa-sa.org//asisst/admin_asset/img/icons/completed-projects-10-days.png">
                <h5> الأبناء الموظفين</h5>
            </div>
        </a>
        <a href="#"  onclick="load_page('sons_special','sons_mowzfen','employment','gm3iat')">
            <div class="box-register" style="min-width: 220px;">
                <img src="https://abnaa-sa.org//asisst/admin_asset/img/icons/doc.png">
                <h5>الأبناء ذوى الإحتياجات الخاصة</h5>
            </div>
        </a>
        <a href="#"  onclick="load_page('gm3iat','sons_mowzfen','sons_special','employment')">
            <div class="box-register">
                <img src="https://abnaa-sa.org//asisst/admin_asset/img/icons/Advanced-payment-bonds.png">
                <h5>الجمعيات المستفاد منه</h5>
            </div>
        </a>
    </div>


    <div class="clearfix"></div><br>
    <div class="col-xs-12" id="employment" >


        <div class="panel panel-default " style="    border: 1px solid #ddd">
        <div class="panel-heading">
          <!--  <h5> العمالة</h5> -->
        </div>
        <div class="panel-body">

                            <div class="form-group col-md-4 col-sm-5 col-xs-12 padding-4">
                                <label class="label"> مهنة العامل </label>


                                <input type="text" class="form-control  testButton inputclass"
                                       name="job_title_n" id="job_title_n1"
                                       readonly="readonly"
                                       onclick="$('#emalaModal').modal('show');$('#emala_id').val(1)"
                                       style="width: 80%;float: right;"

                                       value="">
                                <input type="hidden" name="job_title_fk" id="job_title_fk1" value="">
                                <input type="hidden" name="emala_id" id="emala_id" value="1">
                                <input type="hidden"  id="row_id" value="0">



                                <button type="button" onclick="$('#emalaModal').modal('show');$('#emala_id').val(1)"
                                        class="btn btn-success ">
                                    <i class="fa fa-plus"></i></button>
                            </div>
                            <div class="form-group col-md-4 col-sm-5 col-xs-12 padding-4">
                                <label class="label">  الراتب الشهرى </label>



                                <input type="text" onkeypress="validate_number(event)" name="salary" id="salary_e1"
                                       class="form-control half">
                            </div>
                            <div class="col-md-4">
                                <button style=" margin-top: 26px;" type="button" onclick="update_emala(1)" id="add_emala" class="btn btn-labeled btn-success ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>

                            </div>
            <div class="clearfix"></div><br>



                        <?php if(!empty($emala)) {
                            $count = 2;
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                <tr class="greentd">
                                    <th>مهنة العامل</th>
                                    <th>الراتب الشهرى</th>
                                    <th>الاجراء</th>
                                </tr>
                                </thead>
                                <tbody id="emala_result">
                                <?php
                                foreach ($emala as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $row->job_title_n?>

                                        </td>
                                        <td>  <?= $row->salary?></td>

                                        <td>
                                          <!--  <button type="button" onclick="update_emala(<?= $row->id ?>,<?= $count ?>)"
                                                    id="add_emala" class="btn btn-labeled btn-warning ">
                                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                            </button> -->
                                            <?php
                                         //   $arr = array('job_title_n','salary');
                                            ?>
                                            <i class="fa fa-pencil" style="cursor: pointer"
                                               onclick="get_emala(<?= $row->id ?>,<?= $row->job_title_fk ?>,'<?= $row->job_title_n ?>',<?= $row->salary ?>)"></i>

                                            <i class="fa fa-trash" style="cursor: pointer"
                                               onclick="delete_members(<?= $row->id ?>,'emala_result','add_emala')"></i>


                                        </td>

                                    </tr>
                                    <?php
                               $count++; }
                                ?>

                                </tbody>
                            </table>
                            <?php
                        }
            ?>




        </div>
        <div class="panel-footer text-center">

        </div>

    </div>
    </div>




    <div class="col-xs-12" id="sons_mowzfen" style="display: none">
        <div class="col-xs-12"  >
            <div class="panel panel-default" style="    border: 1px solid #ddd">
                <div class="panel-heading">
                    <h5>  الأبناء الموظفين</h5>
                </div>
                <div class="panel-body">
                    <div class="form-group col-md-4 col-xs-12 padding-4">
                        <label class="label"> إسم الإبن</label>
                        <input type="text" class="form-control  testButton inputclass"
                               name="person_n" id="person_n11"
                               readonly="readonly"
                               onclick="$('#membersModal').modal('show'); load_modal(<?= $mother_num?>,1)"
                               style="width: 80%;float: right;"

                               value="">
                        <input type="hidden" name="person_id_fk" id="person_id_fk11" value="">
                        <input type="hidden" name="m_id" id="m_id" value="1">
                        <input type="hidden" id="mem_id" value="0">

                        <input type="hidden" name="mother_national_num_fk" id="mother_national_num_fk11" value="">
                        <input type="hidden" name="type" id="type" value="1">

                        <button type="button"  onclick="$('#membersModal').modal('show'); load_modal(<?= $mother_num?>,1)"
                                class="btn btn-success " >
                            <i class="fa fa-plus"></i></button>
                    </div>
                    <div class="form-group col-md-4 col-xs-12 padding-4">
                        <label class="label">  الجنس</label>
                        <input type="text" name="person_gns"  class="form-control" id="person_gns11"  value="" readonly>





                    </div>
                    <div class="form-group col-md-4 col-xs-12 padding-4">
                        <label class="label">  رقم الهوية</label>

                        <input type="text" readonly   name="person_national_num" id="person_national_num11" class="form-control half">


                    </div>
                    <div class="form-group col-md-4 col-xs-12 padding-4">
                        <label class="label">   المهنة</label>

                        <input type="text" class="form-control  testButton inputclass"
                               name="person_job_n" id="person_job_n1"
                               readonly="readonly"
                               onclick="$('#jobModal').modal('show');$('#j_id').val(1)"
                               style="width: 80%;float: right;"

                               value="">
                        <input type="hidden" name="person_job_fk" id="person_job_fk1" value="">
                        <input type="hidden" name="j_id" id="j_id" value="1">


                        <button type="button"  onclick="$('#jobModal').modal('show');$('#j_id').val(1)"
                                class="btn btn-success " >
                            <i class="fa fa-plus"></i></button>

                    </div>

                    <div class="form-group col-md-4 col-xs-12 padding-4">
                        <label class="label">   الجهه</label>

                        <input type="text" name="geha_amal" id="geha_amal1" class="form-control half">

                    </div>
                    <div class="form-group col-md-4 col-xs-12 padding-4">
                        <label class="label">   الراتب</label>


                        <input type="text"  onkeypress="validate_number(event)" name="salary" id="salary1"  class="form-control half">
                    </div>
                    <div class="clearfix"></div><br>
                    <div class="col-md-12 text-center">
                        <button type="button" onclick="update_mowzfen(1,1)" id="add_mowzf" class="btn btn-labeled btn-success "   >
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>

                    </div>
                    <div class="clearfix"></div><br>

                    <?php $gender_arr=array('','ذكر','أنثى');
                    if(isset($mowzfen)&& !empty($mowzfen)){
                        $count=2;
                    ?>

                    <table   class="table table-bordered" >
                        <thead>
                        <tr class="greentd">

                            <th>إسم الإبن</th>
                            <th>الجنس</th>
                            <th>رقم الهوية</th>
                            <th>المهنة</th>
                            <th>الجهه</th>
                            <th>الراتب</th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody id="mowzfen_result" >


                        <?php
                        foreach ($mowzfen as $row) {
                            ?>
                            <tr>

                                <td>
                                    <?= $row->person_n ?>
                                </td>
                                <td>
                                    <?= $row->person_gns ?>

                                </td>
                                <td>
                                    <?= $row->person_national_num ?>
                                </td>

                                <td>

                                    <?= $row->person_job_n ?>

                                </td>
                                <td>
                                    <?= $row->geha_amal ?>
                                </td>
                                <td>
                                    <?= $row->salary ?>
                                </td>
                                <td>
                                    <i class="fa fa-pencil" style="cursor: pointer"
                                       onclick="get_mowzfen(<?= $row->id ?>,<?= $row->person_id_fk ?>,<?= $row->person_job_fk ?>,' <?= $row->person_n ?>','<?= $row->person_gns ?>',<?= $row->person_national_num ?>,'<?= $row->person_job_n ?>','<?= $row->geha_amal ?>',<?= $row->salary ?>)"></i>


                                    <i class="fa fa-trash" style="cursor: pointer"
                                       onclick="delete_members(<?= $row->id ?>,'mowzfen_result','add_mowzfen')"></i>

                                </td>

                            </tr>
                            <?php $count++;
                        } ?>

                        </tbody>
                    </table>
                <?php
                }
                    ?>



                </div>
                <div class="panel-footer text-center">

                </div>

            </div>

        </div>
    </div>


    <div class="col-xs-12" id="sons_special" style="display: none">
        <div class="col-xs-12" >
            <div class="panel panel-default" style="    border: 1px solid #ddd">
                <div class="panel-heading">
                    <h5>   الأبناء ذوى الإحتياجات الخاصة</h5>
                </div>
                <div class="panel-body">
                    <?php $arr_yes_no =array(1=>'نعم',2=>'لا');?>
                    <div class="form-group col-md-4  col-xs-12 padding-4">
                        <label class="label"> إسم الإبن</label>
                        <input type="text" class="form-control  testButton inputclass"
                               name="person_n" id="person_n12"
                               readonly="readonly"
                               onclick="$('#membersModal').modal('show'); load_eaqa_modal(<?= $mother_num ?>,1)"
                               style="width: 78%;float: right;"

                               value="">
                        <input type="hidden" name="person_id_fk" id="person_id_fk12" value="">


                        <button type="button"
                                onclick="$('#membersModal').modal('show'); load_eaqa_modal(<?= $mother_num ?>,1)"
                                class="btn btn-success">
                            <i class="fa fa-plus"></i></button>
                    </div>
                    <div class="form-group col-md-4  col-xs-12 padding-4">
                        <label class="label">  الجنس</label>
                        <input type="text" class="form-control" name="person_gns" id="person_gns12" value="" readonly>
                    </div>


                    <div class="form-group col-md-4  col-xs-12 padding-4">
                        <label class="label">  رقم الهوية</label>
                        <input type="text" readonly name="person_national_num" id="person_national_num12"
                               class="form-control half">
                    </div>

                    <div class="form-group col-md-4  col-xs-12 padding-4">
                        <label class="label">   نوع الإعاقة</label>
                        <input type="text" class="form-control  testButton inputclass"
                               name="no3_eaqa_n" id="no3_eaqa_n1"
                               readonly="readonly"
                               onclick="$('#eaqaModal').modal('show');$('#q_id').val(1) "
                               style="width: 78%;float: right;"

                               value="">
                        <input type="hidden" name="no3_eaqa_fk" id="no3_eaqa_fk1" value="">
                        <input type="hidden" name="q_id" id="q_id" value="1">
                        <input type="hidden" id="eqa_row" value="0">

                        <button type="button" onclick="$('#eaqaModal').modal('show');$('#q_id').val(1)"
                                class="btn btn-success">
                            <i class="fa fa-plus"></i></button>

                    </div>
                    <div class="form-group col-md-4  col-xs-12 padding-4">
                        <label class="label">    هل مستفيد من التأهيل الشامل</label>

                        <select name=tahil_shamil_status" id="tahil_shamil_status1"
                                class=" no-padding form-control  form-control half" data-show-subtext="true"
                                data-live-search="true"

                                onchange="check_tahil_status($(this).val(),1)">
                            <option value="">اختر</option>
                            <?php foreach ($arr_yes_no as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4  col-xs-12 padding-4">
                        <label class="label">   المبلغ</label>


                        <input type="text" disabled onkeypress="validate_number(event)" name="value1" id="value1"
                               class="form-control half">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="form-group col-md-12  text-center">
                        <button type="button" class="btn btn-labeled btn-success "
                                onclick="update_eaqa(1,2)" value="حفظ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                    </div>
                    <div class="clearfix"></div><br>

                    <?php if( isset($eaqa_mems) && !empty($eaqa_mems)){ $count=2;
                    ?>
                    <table class="table table-bordered"  >
                        <thead>
                        <tr class="greentd">

                            <th>إسم الإبن</th>
                            <th>الجنس</th>
                            <th>رقم الهوية</th>
                            <th>نوع الإعاقة</th>
                            <th>هل مستفيد من التأهيل الشامل</th>
                            <th>المبلغ</th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody id="eaqa_result" >
                        <?php foreach ($eaqa_mems as $row){?>

                            <tr>

                                <td>
                                    <?= $row->person_n?>
                                </td>
                                <td>
                                    <?= $row->person_gns?>
                                </td>
                                <td>
                                    <?= $row->person_national_num?>
                                </td>

                                <td>
                                    <?= $row->no3_eaqa_n?>

                                </td>
                                <td>

                                   <?php
                                   if($row->tahil_shamil_status==1){
                                       echo 'نعم';
                                   } elseif ($row->tahil_shamil_status==2){
                                       echo 'لا';
                                   }

                                   ?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($row->value)){
                                            echo $row->value;
                                    } else{
                                        echo 'غير محدد' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <i class="fa fa-pencil" style="cursor: pointer"
                                       onclick="get_eaqa(<?= $row->id ?>,<?= $row->person_id_fk ?>,<?= $row->no3_eaqa_fk ?>,' <?= $row->person_n ?>','<?= $row->person_gns ?>',<?= $row->person_national_num ?>,'<?= $row->no3_eaqa_n ?>',<?= $row->value ?>,<?= $row->tahil_shamil_status?>)"></i>


                                    <i class="fa fa-trash" style="cursor: pointer"  onclick="delete_members(<?= $row->id?>,'eaqa_result','add_member_eaqa')"></i>


                                </td>

                            </tr>
                            <?php $count++;  } ?>

                        </tbody>
                    </table>
                    <?php
                    }
                    ?>


                </div>
                <div class="panel-footer text-center">

                </div>

            </div>



        </div>


    </div>




    <div class="col-xs-12" id="gm3iat" style="display: none">

    <div class="col-xs-12"  >

        <div class="panel panel-default" style="    border: 1px solid #ddd">
            <div class="panel-heading">
                <h5>   الجمعيات المستفاد منه</h5>
            </div>
            <div class="panel-body">

                        <div class="form-group col-md-4 col-sm-6 col-xs-12 padding-4">
                            <label class="label"> إسم الجمعية</label>
                            <input type="text" class="form-control  testButton inputclass"
                                   name="gam3ia_n" id="gam3ia_n1"
                                   readonly="readonly"
                                   onclick="$('#qm3iaModal').modal('show');$('#qm3ia_id').val(1)"
                                   style="width: 80%;float: right;"

                                   value="">
                            <input type="hidden" name="gam3ia_id_fk" id="gam3ia_id_fk1" value="">
                            <input type="hidden" name="qm3ia_id" id="qm3ia_id" value="1">
                            <input type="hidden"  id="qm3ia_row" value="0">


                            <button type="button" onclick="$('#qm3iaModal').modal('show');$('#qm3ia_id').val(1)"
                                    class="btn btn-success ">
                                <i class="fa fa-plus"></i></button>
                        </div>

                        <div class="form-group col-md-4 col-sm-6 col-xs-12 padding-4">
                            <label class="label">  نوع المساعدة</label>
                            <div class="radio-content">
                                <input type="radio" id="3ini1"  name="no3_mos3da_fk1"  onchange="change_mos3da(1)" class="sarf_types" value="2">
                                <label for="3ini1" class="radio-label"> عينية</label>
                            </div>
                            <div class="radio-content">
                                <input type="radio" id="madi1" name="no3_mos3da_fk1" onchange="change_mos3da(1)"  class="sarf_types" value="1">
                                <label for="madi1" class="radio-label"> مادية</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-6 col-xs-12 padding-4">
                            <label class="label">   المبلغ</label>
                            <input type="text" class="form-control" onkeypress="validate_number(event)" name="mos3da_value" id="mos3da_value1" value="" disabled>

                        </div>
                        <div class="clearfix"></div><br>
                        <div class="form-group col-md-12 text-center">
                            <button type="button" onclick="update_qm3ia(1)" id="add_gam3ia" class="btn btn-labeled btn-success ">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>

                        </div>


                    <?php if( isset($qm3iat) && !empty($qm3iat)){
                    $count = 2;
                    ?>
                        <div class="clearfix"></div><br>
                        <table class="table table-bordered" >
                            <thead>
                            <tr class="greentd">

                                <th>إسم الجمعية</th>
                                <th >نوع المساعدة</th>
                                <th>المبلغ</th>

                                <th>الاجراء</th>
                            </tr>
                            </thead>
                            <tbody id="qm3ia_result" >
                        <?php
                        foreach ($qm3iat as $row) {
                            ?>

                            <tr>
                                <td>
                                    <?= $row->gam3ia_n ?>

                                </td>


                                <td>
                                    <?php
                                    if ($row->no3_mos3da_fk == 2) {
                                        echo 'عينية';
                                    } else if ($row->no3_mos3da_fk == 1) {
                                        echo 'مادية';
                                    }
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    if (!empty( $row->mos3da_value ) && $row->mos3da_value !=0){
                                        echo $row->mos3da_value;
                                    } else{
                                        echo 'غير محدد' ;
                                    }
                                    ?>
                                </td>

                                <td>
                                    <i class="fa fa-pencil" style="cursor: pointer"
                                       onclick="get_gm3iat(<?= $row->id?>,<?= $row->gam3ia_id_fk?>,'<?= $row->gam3ia_n?>',<?= $row->no3_mos3da_fk?>,<?= $row->mos3da_value?>)"></i>

                                    <i class="fa fa-trash" style="cursor: pointer"
                                       onclick="delete_members(<?= $row->id ?>,'qm3ia_result','add_qm3ia')"></i>


                                </td>

                            </tr>

                            <?php $count++;
                        } ?>

                    </tbody>
                </table>
                <?php
                }
                ?>


            </div>
            <div class="panel-footer text-center">

            </div>

        </div>



        </div>

    </div>
        <!-------------------------end------------------>




</div>
</div>
</div>

<!------------------------------------>
<div class="col-xs-12 text-center">
    <?php if (isset($all_links['father']) && $all_links['father'] != null) {
        $input_name1 = 'update';
        $input_name2 = 'update_save';
    } else {
        $input_name1 = 'add';
        $input_name2 = 'add_save';
    }
    ?>
    <br>
 <!--   <input type="submit" id="buttons" class="btn btn-success btn-close" name="add" value="حفظ  " style="font-size: 18px;width: 120px;border-radius: 20px;" />-->
</div>

<br/>
<br/>
</div>

<div class="panel-footer">
    <div class="text-center">
    	<button class="btnPrevious btn btn-labeled btn-warning" style="font-size: 16px;"><span class="btn-label"><i class="fa fa-chevron-right"></i></span>السابق  </button>
	<button class="btnNext  btn btn-labeled btn-warning" style="font-size: 16px;">التالى <span class="btn-label" style="right: auto;left: -14px;"><i class="fa fa-chevron-left"></i></span> </button>
    
       <button type="submit" id="buttons" class="btn btn-labeled btn-success " name="add" value="حفظ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
      </button>
      
    </div>
</div>
 <?php echo form_close() ?>                               
                                
</div>
</div>

<!-- membersModal  -->

<div class="modal fade" id="membersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> الأبناء </h4>
            </div>
            <div class="modal-body" id="members">




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- membersModal Modal -->

<!-- jobModal  -->

<div class="modal fade" id="jobModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> المهنة </h4>
            </div>
            <div class="modal-body">
                <?php
                if (isset($jobs) && !empty($jobs)){
                    ?>
                    <table class="table example table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>#</th>
                            <th>    المهنة</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($jobs as $job){
                            ?>
                            <tr>

                                <td><input style="width: 90px;height: 20px;" type="radio" name="radio"
                                           id="j<?=  $job->id_setting ?>" ondblclick="GetJobName(<?=  $job->id_setting ?>,'<?=  $job->title_setting?>')">
                                </td>


                                <td><?= $job->title_setting?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- jobModal Modal -->



<!-- eaqaModal  -->

<div class="modal fade" id="eaqaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> نوع الاعاقة </h4>
            </div>
            <div class="modal-body">
                <?php
                if (isset($diseases) && !empty($diseases)){
                    ?>
                    <table class="table example table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>#</th>
                            <th>    نوع الاعاقة</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($diseases as $disease){
                            ?>
                            <tr>

                                <td><input style="width: 90px;height: 20px;" type="radio" name="radio"
                                           id="q<?=  $disease->id_setting ?>" ondblclick="GeteaqaName(<?=  $disease->id_setting ?>,'<?=  $disease->title_setting?>')">
                                </td>


                                <td><?= $disease->title_setting?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- eaqaModal Modal -->
<!-- emalaModal  -->

<div class="modal fade" id="emalaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> مهنة العامل </h4>
            </div>
            <div class="modal-body">
                <?php
                if (isset($employment_jobs) && !empty($employment_jobs)){
                    ?>
                    <table class="table example table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>#</th>
                            <th>    المهنة</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($employment_jobs as $job){
                            ?>
                            <tr>

                                <td><input style="width: 90px;height: 20px;" type="radio" name="radio"
                                           id="j<?=  $job->id_setting ?>" ondblclick="GetEmalaName(<?=  $job->id_setting ?>,'<?=  $job->title_setting?>')">
                                </td>


                                <td><?= $job->title_setting?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- emalaModal Modal -->
<!-- qm3iaModal  -->

<div class="modal fade" id="qm3iaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  اسم الجمعية </h4>
            </div>
            <div class="modal-body">
                <?php
                if (isset($associations) && !empty($associations)){
                    ?>
                    <table class="table example table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>#</th>
                            <th>    الاسم</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($associations as $ass){
                            ?>
                            <tr>

                                <td><input style="width: 90px;height: 20px;" type="radio" name="radio"
                                           id="j<?=  $ass->id_setting ?>" ondblclick="GetQm3iaName(<?=  $ass->id_setting ?>,'<?=  $ass->title_setting?>')">
                                </td>


                                <td><?= $ass->title_setting?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- qm3iaModal Modal -->
<script>
    function GetName(id, name,member_card_num,member_gender,mother_national_num_fk) {
        var type = $('#type').val();
      //  alert(type);
        var r_id = $('#m_id').val();

        $('#person_id_fk'+r_id+type).val(id);
        $('#person_n'+r_id+type).val(name);
        $('#person_national_num'+r_id+type).val(member_card_num);
        $('#mother_national_num_fk'+r_id+type).val(mother_national_num_fk);
        var gender = '';
        if (member_gender==1){
            gender='ذكر';

        } else if(member_gender==2){
            gender='أنثي' ;
        } else{
            gender ='غير محدد' ;
        }
        $('#person_gns'+r_id+type).val(gender);

        $('#membersModal').modal('hide');

    }
</script>
<script>
    function load_modal(mother_num,m_id) {
        $('#m_id').val(m_id);
        $('#type').val(1);
     //   alert(mother_num);
        var table= 'f_member_mowazfen';
        var type =  $('#type').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>family_controllers/Family/load_members',
            data: {mother_num:mother_num,table:table},
            dataType: 'html',
            cache: false,
            success: function (html) {
              //  alert(html);
                $('#members').html(html);

            }
        });


    }
</script>
<script>
    function load_eaqa_modal(mother_num,e_id) {
        $('#e_id').val(e_id);
        $('#type').val(2);
        var table= 'f_member_special_needs';

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>family_controllers/Family/load_members',
            data: {mother_num:mother_num,table:table},
            dataType: 'html',
            cache: false,
            success: function (html) {
                //alert(html);
                $('#members').html(html);

            }
        });


    }
</script>
<script>
    function GetJobName(id, name) {
        var j_id = $('#j_id').val();

        $('#person_job_fk'+j_id).val(id);
        $('#person_job_n'+j_id).val(name);
        $('#jobModal').modal('hide');

    }
</script>
<script>
    function GeteaqaName(id, name) {
        var q_id = $('#q_id').val();
        $('#no3_eaqa_fk'+q_id).val(id);
        $('#no3_eaqa_n'+q_id).val(name);


        $('#eaqaModal').modal('hide');

    }
</script>
<script>
    function GetEmalaName(id, name) {
        var emala_id = $('#emala_id').val();

        $('#job_title_fk'+emala_id).val(id);
        $('#job_title_n'+emala_id).val(name);
        $('#emalaModal').modal('hide');

    }
</script>

<script>
    function GetQm3iaName(id, name) {
        var qm3ia_id = $('#qm3ia_id').val();

        $('#gam3ia_id_fk'+qm3ia_id).val(id);
        $('#gam3ia_n'+qm3ia_id).val(name);
        $('#qm3iaModal').modal('hide');

    }
</script>

<script>
    function update_mowzfen(id,type) {
        var  mother_national_num  = '<?= $this->uri->segment(4)?>';
        var  person_id_fk  = $('#person_id_fk'+id+type).val();
        var  person_national_num  = $('#person_national_num'+id+type).val();
        var  person_n  = $('#person_n'+id+type).val();
        var  person_gns  = $('#person_gns'+id+type).val();
        var  person_job_fk  = $('#person_job_fk'+id).val();
        var  person_job_n  = $('#person_job_n'+id).val();
        var  geha_amal  = $('#geha_amal'+id).val();
        var  salary  = $('#salary'+id).val();
        var row_id = $('#mem_id').val();


        if (person_n !='' && person_job_n!='' && geha_amal !='' && salary !='' ) {


            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>family_controllers/Family/add_mowzfen',
                data: {row_id:row_id,mother_national_num:mother_national_num,person_id_fk:person_id_fk,person_national_num:person_national_num,person_n:person_n,person_gns:person_gns,person_job_fk:person_job_fk,person_job_n:person_job_n,geha_amal:geha_amal,salary:salary},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    if (row_id !='' && row_id !=0) {
                        swal({
                                title: " تم التعديل بنجاح",
                            }
                        );

                    } else{
                        swal({
                                title: " تم الاضافة بنجاح",
                            }
                        );
                    }
                    $('#mowzfen_result').html(html);
                $('#person_id_fk'+id+type).val('');
                 $('#person_national_num'+id+type).val('');
                 $('#person_n'+id+type).val('');
                  $('#person_gns'+id+type).val('');
                  $('#person_job_fk'+id).val('');
                 $('#person_job_n'+id).val('');
                  $('#geha_amal'+id).val('');
                   $('#salary'+id).val('');
                   $('#mem_id').val('');


                }
            });
        } else{

            alert('من فضلك تأكد من الحقول الناقصه !');
        }
    }
</script>

<script>
    function update_emala(id) {
        //  var type = $('#type').val();
        var  mother_national_num  = '<?= $this->uri->segment(4)?>';
        var  job_title_fk  = $('#job_title_fk'+id).val();
        var  job_title_n  = $('#job_title_n'+id).val();
        var  salary  = $('#salary_e'+id).val();
        var row_id = $('#row_id').val();
      //  alert(job_title_n);

        if (job_title_fk !='' && job_title_n!='' && salary !='' ) {

            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>family_controllers/Family/add_emala',
                data: {row_id:row_id,mother_national_num:mother_national_num,job_title_fk:job_title_fk,job_title_n:job_title_n,salary:salary},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    if (row_id !='' && row_id !=0) {
                        swal({
                                title: " تم التعديل بنجاح",
                            }
                        );

                    } else{
                        swal({
                                title: " تم الاضافة بنجاح",
                            }
                        );
                    }


                    $('#emala_result').html(html);
                  $('#job_title_fk'+id).val('');
                     $('#job_title_n'+id).val('');
                    $('#salary_e'+id).val('');
                    $('#row_id').val('');




                }
            });
        } else{

            alert('من فضلك تأكد من الحقول الناقصه !');
        }
    }
</script>
<script>
    function update_qm3ia(id) {

        var  mother_national_num  = '<?= $this->uri->segment(4)?>';
        var  gam3ia_id_fk  = $('#gam3ia_id_fk'+id).val();
        var  gam3ia_n  = $('#gam3ia_n'+id).val();
        var  mos3da_value  = $('#mos3da_value'+id).val();
       var  no3_mos3da_fk  =  $(' input[type=radio]:checked').val();
        var row_id = $('#qm3ia_row').val();

        if (gam3ia_n !='' && no3_mos3da_fk!=''  ) {


            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>family_controllers/Family/add_qm3ia',
                data: {row_id:row_id,mother_national_num:mother_national_num,gam3ia_id_fk:gam3ia_id_fk,gam3ia_n:gam3ia_n,no3_mos3da_fk:no3_mos3da_fk,mos3da_value:mos3da_value},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    if (row_id !='' && row_id !=0) {
                        swal({
                                title: " تم التعديل بنجاح",
                            }
                        );

                    } else{
                        swal({
                                title: " تم الاضافة بنجاح",
                            }
                        );
                    }
                    $('#qm3ia_result').html(html);
                   $('#gam3ia_id_fk'+id).val('');
                 $('#gam3ia_n'+id).val('');
                 $('#mos3da_value'+id).val('');
                    $('#qm3ia_row').val('');
                    $(' input[type=radio]:checked').val('');
                    $(' input[type=radio]:checked').removeAttr('checked');

                }
            });
        } else{

            alert('من فضلك تأكد من الحقول الناقصه !');
        }
    }
</script>



<script>
    function update_eaqa(id,type) {
     //   var type = $('#type').val();
        var  mother_national_num  = '<?= $this->uri->segment(4)?>';
        var  person_id_fk  = $('#person_id_fk'+id+type).val();
        var  person_national_num  = $('#person_national_num'+id+type).val();
        var  person_n  = $('#person_n'+id+type).val();
        var  person_gns  = $('#person_gns'+id+type).val();

        var  no3_eaqa_fk  = $('#no3_eaqa_fk'+id).val();
        var  no3_eaqa_n  = $('#no3_eaqa_n'+id).val();
        var  tahil_shamil_status  = $('#tahil_shamil_status'+id).val();
        var  value  = $('#value'+id).val();
        var row_id = $('#eqa_row').val();
        if (person_n !='' && no3_eaqa_n!='' && tahil_shamil_status !=''  ) {

            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>family_controllers/Family/add_member_eaqa',
                data: {row_id:row_id,mother_national_num:mother_national_num,person_id_fk:person_id_fk,person_national_num:person_national_num,person_n:person_n,person_gns:person_gns,no3_eaqa_fk:no3_eaqa_fk,no3_eaqa_n:no3_eaqa_n,tahil_shamil_status:tahil_shamil_status,value:value},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    if (row_id !='' && row_id !=0) {
                        swal({
                                title: " تم التعديل بنجاح",
                            }
                        );

                    } else{
                        swal({
                                title: " تم الاضافة بنجاح",
                            }
                        );
                    }
                    $('#eaqa_result').html(html);
                  $('#person_id_fk'+id+type).val('');
                    $('#person_national_num'+id+type).val('');
                $('#person_n'+id+type).val('');
                   $('#person_gns'+id+type).val('');

                  $('#no3_eaqa_fk'+id).val('');
                    $('#no3_eaqa_n'+id).val('');
                   $('#tahil_shamil_status'+id).val('');
                     $('#value'+id).val('');
                     $('#eqa_row').val('');


                }
            });
        } else{


            alert('من فضلك تأكد من الحقول الناقصه !');
        }
    }
</script>
<script>
    function change_mos3da(id) {

        var type =  $(' input[type=radio]:checked').val();
     // console.log(type);
      if(type==2){
      $('#mos3da_value'+id).attr('disabled', 'disabled');

      } else if(type==1){
          $('#mos3da_value'+id).removeAttr("disabled");

      }
      $('#mos3da_value1').val('');

    }
</script>
<script>
    function delete_members(row_id,output,url) {
        var deelete = 'delete';
        var  mother_national_num  = '<?= $this->uri->segment(4)?>';
        if(confirm('هل أنت متأكد من الحذف ؟ ')){

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>family_controllers/Family/'+url,
            data: {row_id:row_id,deelete:deelete,mother_national_num:mother_national_num},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal({
                        title: " تم الحذف بنجاح",
                    }
                  );


                $('#'+output).html(html);

            }
        });
        }

    }
</script>
<script>

    function check_tahil_status(value,id) {

        if(value ==1){
            document.getElementById("value" + id).removeAttribute("disabled", "disabled");
            document.getElementById("value" + id).setAttribute("data-validation", "required");

        } else {
            document.getElementById("value" + id).setAttribute("disabled", "disabled");
            document.getElementById("value" + id).removeAttribute("data-validation", "required");
            $('#value' + id).val('');
        }
    }

</script>
<!--Nagwa 12-9 -->

<script type="text/javascript">
	$('.btnNext').click(function(){
		$('.nav-tabs > .active').next('li').find('a').trigger('click');
	});

	$('.btnPrevious').click(function(){
		$('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});
</script>


<script type="text/javascript">
    jQuery(function ($) {
        $("#date0").mask("99/99/9999");
        $("#date1").mask("99/99/9999", {placeholder: 'dd/mm/yyyy'});
    });
</script>
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
    $(document).ready(function () {
        $("#f_job").change(function () {
            var color = $(this).val();
            if (color == "1") {
                $(".box").not(".1").hide();
                $(".red").show();
            } else if (color == "2") {
                $(".box").not(".2").hide();
                $(".red").show();
            } else {
                $(".box").hide();
            }
        });
    });
</script>
<script>
    function admSelectCheck(nameSelect) {
        //alert($(nameSelect).val());
        if ($(nameSelect).val() == 0) {
            document.getElementById("f_death_reason_fk").removeAttribute("disabled", "disabled");
        }
        else {
            document.getElementById("f_death_reason_fk").setAttribute("disabled", "disabled");
        }
    }
    document.getElementById("fww_nationality_id_fk").onchange = function () {
        if (this.value > 0)
            document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
        else {
            document.getElementById("nationality_other").setAttribute("disabled", "disabled");
            $("#nationality_other").val("");
        }
    };
</script>
<script>
    function valid() {
        if ($("#f_national_id").val().length > 10) {
            document.getElementById('validate1').style.color = '#00FF00';
            document.getElementById('validate1').innerHTML = '';
        } else {
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'رقم الهوية من عشر أرقام';
        }
    }
</script>
<script>
    document.getElementById('f_nationality_id_fk').onchange = function () {
        var x = $(this).val();
        if (x == 0) {
            document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
        } else {
            document.getElementById("nationality_other").setAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    document.getElementById('f_death_id_fk').onchange = function () {
        var x = $(this).val();
        if (x == 0) {
            document.getElementById("f_death_reason_fk").removeAttribute("disabled", "disabled");
        } else {
            document.getElementById("f_death_reason_fk").setAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    document.getElementById('wife').onkeyup = function () {
        var x = $(this).val();
        if (x < 1) {
            alert("الادخال خاطىء");
            $(this).val(" ");
        }
    }
</script>
<script>
    /*    document.getElementById('f_national_id').onkeyup=function() {
     var x = $(this).val();
     if(x.length>10){
     document.getElementById('validate1').style.color = '#F00';
     document.getElementById('validate1').innerHTML = 'رقم الهويةمكون  من عشر أرقام فقط ';
     $('#f_national_id').val("");
     }if(x.length==10){
     document.getElementById('validate1').style.color = '#F00';
     document.getElementById('validate1').innerHTML = 'رقم هويه صحيح';
     }
     if(x.length<10) {
     document.getElementById('validate1').style.color = '#F00';
     document.getElementById('validate1').innerHTML = 'رقم الهويه لابد ان يكون عشر ارقام';
     }
 }*/
 /**************ahemd*/
 function getAge() {
    var nowYear = (new Date()).getFullYear();
    var myAge = ( nowYear - $('#CYear').val() );
    $('#myage').val(myAge)
}
function getFamilyNumber() {
    if ($('#male_number').val() > 0) {
        var males = parseInt($('#male_number').val());
    } else {
        var males = 0;
    }
    if ($('#female_number').val() > 0) {
        var females = parseInt($('#female_number').val());
    } else {
        var females = 0;
    }
    var all = males + females;
    $('#family_members_number').val(all);
}
/**************ahemd*/
</script>



<script>


    setInterval(function(){



        var valu =$('#date0').val();

        var str = valu;
        var res = str.split("/");
        var HYear=$('#HYear').val();
        var cou=res[2]-HYear;
        $('#myage').val(cou);}, 1000);
    </script>
    <script>

     function get_date() {
         var valu =$('#date0').val();

         var str = valu;
         var res = str.split("/");
         var HYear=$('#HYear').val();
         var cou=res[2]-HYear;
         $('#myage').val(cou);


     }
 </script>


<script>
    
    
    function Employment_check_function(valu) {

        if(valu ==1){

            $('#employment').show();

            document.getElementById("employment_fieldset").removeAttribute("disabled", "disabled");

        }else {
            document.getElementById("employment_fieldset").setAttribute("disabled", "disabled");
            $('#employment').hide();

        }
        
    }



    function add_row_employment() {
        $("#employment_table").show();
        var x = document.getElementById('employment_table');
        var dataString   ='length=' + x.rows.length;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/get_employment_page',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#resultEmployment").append(html);
            }
        });


    }


    function Employees_sons_check_function(valu) {

        if(valu ==1){

            $('#employees_sons').show();


            document.getElementById("employees_sons_fieldset").removeAttribute("disabled", "disabled");

        }else {
            document.getElementById("employees_sons_fieldset").setAttribute("disabled", "disabled");

            $('#employees_sons').hide();

        }

    }



    function add_row_employees_sons() {
        $("#employees_sons_table").show();
        var x = document.getElementById('employees_sons_table');
        var dataString   ='length=' + x.rows.length;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/get_employees_sons_page',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#resultُEmployees_sons").append(html);
            }
        });


    }




    function Special_needs_sons_check_function(valu) {

        if(valu ==1){

            $('#special_needs_sons').show();

            document.getElementById("special_needs_sons_fieldset").removeAttribute("disabled", "disabled");

        }else {
            document.getElementById("special_needs_sons_fieldset").setAttribute("disabled", "disabled");

            $('#special_needs_sons').hide();

        }

    }



    function add_row_special_needs_sons() {
        $("#special_needs_sons_table").show();
        var x = document.getElementById('special_needs_sons_table');
        var dataString   ='length=' + x.rows.length;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/get_special_needs_sons_page',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#resultSpecial_needs_sons").append(html);
            }
        });


    }





    function Other_associations_check_function(valu) {

        if(valu ==1){

            $('#other_associations').show();

            document.getElementById("other_associations_fieldset").removeAttribute("disabled", "disabled");

        }else {
            document.getElementById("other_associations_fieldset").setAttribute("disabled", "disabled");

            $('#other_associations').hide();

        }

    }

    function add_row_other_associations() {
        $("#other_associations_table").show();
        var x = document.getElementById('other_associations_table');
        var dataString   ='length=' + x.rows.length;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/get_other_associations_page',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#resultOther_associations").append(html);
            }
        });


    }



</script>
<script>
    function load_page(show_id,hide_id1,hide_id2,hide_id3) {

        $('#'+show_id).show();
        $('#'+hide_id1).hide();
        $('#'+hide_id2).hide();
        $('#'+hide_id3).hide();

        //$.ajax({
        //    type:'post',
        //    url: '<?php //echo base_url() ?>//family_controllers/Family/get_load_page',
        //    data:dataString,
        //    dataType: 'html',
        //    cache:false,
        //    success: function(html){
        //        $("#employment").html(html);
        //    }
        //});

    }
</script>
<!--function get_by_id(filed1,valu1,filed2,value2,filed3,value3,filed4,value4,filed5,value5,filed6,value6) {-->
<!--$('#'+filed1).val(valu1);-->

<script>
    function get_emala(id,title_fk,name,salry) {
        $('#job_title_fk1').val(title_fk);
        $('#job_title_n1').val(name);
        $('#salary_e1').val(salry);
        $('#row_id').val(id);

    }
</script>

<script>
    function get_mowzfen(id,person_id_fk,person_job_fk,person_n,person_gns,person_national_num,person_job_n,geha_amal,salary) {
        $('#mem_id').val(id);
        $('#person_n11').val(person_n);
       $('#person_id_fk11').val(person_id_fk);
        $('#person_gns11').val(person_gns);
        $('#person_national_num11').val(person_national_num);
        $('#person_job_n1').val(person_job_n);
      $('#person_job_fk1').val(person_job_fk);
        $('#geha_amal1').val(geha_amal);
        $('#salary1').val(salary);
    }
</script>
<script>
    function get_eaqa(id,person_id_fk,person_job_fk,person_n,person_gns,person_national_num,person_job_n,salary,tahil_shamil_status) {
        $('#person_n12').val(person_n);
        $('#person_id_fk12').val(person_id_fk);
        $('#person_gns12').val(person_gns);
        $('#person_national_num12').val(person_national_num);
        $('#no3_eaqa_n1').val(person_job_n);
        $('#no3_eaqa_fk1').val(person_job_fk);
        $('#tahil_shamil_status1').val(tahil_shamil_status);
      //  $('#geha_amal1').val(geha_amal);
        $('#value1').val(salary);
        $('#value1').removeAttr("disabled");
        $('#eqa_row').val(id);

    //   $('#tahil_shamil_status1').html('<option value="">نعم</option><option></option> ')









    }
</script>
<script>
    function get_gm3iat(id,gam3ia_id_fk,gam3ia_n,no3_mos3da,value) {
        $('#gam3ia_n1').val(gam3ia_n);
        $('#gam3ia_id_fk1').val(gam3ia_id_fk);
       // 3ini1


        $('#mos3da_value1').val(value);

        $('#qm3ia_row').val(id);
        if(no3_mos3da ==2){


           // $('#3ini1').attr('checked', true);
            $("input[name='no3_mos3da_fk1']")[0].checked = true;
            $('#mos3da_value1').attr('disabled', 'disabled');

        } else if(no3_mos3da ==1){
            $("input[name='no3_mos3da_fk1']")[1].checked = true;

           // $('#madi1').attr('checked', true);
            $('#mos3da_value1').removeAttr("disabled");
        }









    }
</script>






