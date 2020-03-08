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
    <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12" >
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





    <div class="col-xs-12 no-padding">
        <!-------------------------end------------------>

        <div class="col-xs-4" id="employment" style="

        <?php if(!empty($all_links['father']['f_employment_check'])){
            if($all_links['father']['f_employment_check'] ==2){echo'display: none'; }
        }else{ echo'display: none'; }?>">
            <fieldset id="employment_fieldset">
            <label class="label label-green  half">اضافة العمالة<strong class="astric">*</strong><strong></strong> </label>
            <button type="button"  style="margin-bottom: 10px;" onclick="add_row_employment()" class="btn btn-success btn-next"/><i class="fa fa-plus"></i> اضافة العمالة </button><br>
            <table id="employment_table" class="table table-bordered" style="<?php if(empty($father_employment_result)){?>display: none <?php } ?>">
                <thead>
                    <tr class="info">
                        <th>م</th>
                        <th>مهنة العامل</th>
                        <th>الراتب الشهرى</th>
                    </tr>
                </thead>
                <tbody id="resultEmployment">
                <?php if(!empty($father_employment_result)){ $count=1; foreach ($father_employment_result as $row){?>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><select name="employee_job[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                            <option value="">اختر المهنة</option>
                                <?php if(!empty($employment_jobs)){
                                    foreach ($employment_jobs as $job){?>

                                        <option value="<?php echo$job->id_setting;?>"
                                        <?php if($job->id_setting  == $row->job_id_fk){ echo'selected'; } ?>

                                        ><?php echo$job->title_setting;?></option>
                              <?php
                                    }
                                }?>

                        </select></td>
                        <td><input type="text"  onkeypress="validate_number(event)" name="employee_salary[]" class="form-control half"
                                   data-validation="required"  value="<?php echo$row->salary;?>"></td>
                    </tr>
                <?php $count++; } } ?>
                </tbody>
            </table>
        </fieldset>
        </div>



        <div class="col-xs-8" id="employees_sons" style="
        <?php if(!empty($all_links['father']['f_employees_sons_check'])){
            if($all_links['father']['f_employees_sons_check'] ==2){echo'display: none'; }
        }else{ echo'display: none'; } ?>">
            <fieldset id="employees_sons_fieldset">
            <label class="label label-green  half">اضافة الأبناء الموظفين<strong class="astric">*</strong><strong></strong> </label>
            <div class="clearfix"></div>
            <button type="button"  style="margin-bottom: 10px;" onclick="add_row_employees_sons()" class="btn btn-success btn-next"/><i class="fa fa-plus"></i> اضافة أبناء الموظفين </button><br>
            <?php $gender_arr=array('','ذكر','أنثى');?>
            <table  id="employees_sons_table" class="table table-bordered" style="<?php if(empty($father_employees_sons_result)){?>display: none <?php } ?>">
                <thead>
                <tr class="info">
                    <th>م</th>
                    <th>إسم الإبن</th>
                    <th>الجنس</th>
                    <th>رقم الهوية</th>
                    <th>المهنة</th>
                    <th>الجهه</th>
                    <th>الراتب</th>
                </tr>
                </thead>
                <tbody id="resultُEmployees_sons">
                <?php if(!empty($father_employees_sons_result)){ $count=1; foreach ($father_employees_sons_result as $row){?>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><input type="text" name="employees_son_name[]" value="<?php echo$row->employees_son_name; ?>" data-validation="required" class="form-control half"></td>
                        <td><select name="employees_son_gender[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                                <?php $gender_arr=array('','ذكر','أنثى');?>
                                <option value="">اختر الجنس</option>
                                <?php for ($a=1;$a<sizeof($gender_arr);$a++){ $select='';
                                    if($a== $row->employees_son_gender){$select='selected';}?>
                                    <option value="<?php echo$a; ?>"
                                        <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
                                <?php }?>

                            </select></td>
                        <td><input type="text"  onkeypress="validate_number(event)" name="employees_son_id_number[]" value="<?php echo$row->employees_son_id_number; ?>" class="form-control half"></td>
                        <td><select name="employees_son_job[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                                <option value="">اختر المهنه</option>
                                <?php if(!empty($jobs)){ foreach ($jobs as $record){ ?>
                                    <option value="<?php echo $record->id_setting;?>"
                                        <?php if($record->id_setting  == $row->employees_son_job){ echo'selected'; } ?>
                                    ><?php echo $record->title_setting;?></option>
                                <?php  } }  ?>
                            </select></td>
                        <td><input type="text"  data-validation="required" name="employees_son_geha[]" value="<?php echo$row->employees_son_geha; ?>" class="form-control half"></td>
                        <td><input type="text"  onkeypress="validate_number(event)" name="employees_son_salary[]"  value="<?php echo$row->employees_son_salary; ?>" data-validation="required" class="form-control half"></td>
                    </tr>
                    <?php $count++; } } ?>

                </tbody>
            </table>
            </fieldset>
        </div>


<!--display: block-------------------->

        <div class="col-xs-12" id="special_needs_sons" style="
<?php if(!empty($all_links['father']['f_special_needs_sons_check'])){
            if($all_links['father']['f_special_needs_sons_check'] ==2){echo'display: none'; }
        }else{ echo'display: none'; } ?>">
            <fieldset  id="special_needs_sons_fieldset">
            <div class="form-group col-md-6 padding-4 col-sm-4 col-xs-12" >
                <label class="label label-green  half">اضافة الأبناء ذوى الإحتياجات الخاصة<strong class="astric">*</strong><strong></strong> </label>
            </div>
            <div class="clearfix"></div>
            <button type="button"  style="margin-bottom: 10px;"
                    onclick="add_row_special_needs_sons()" class="btn btn-success btn-next"/><i class="fa fa-plus"></i> اضافة الأبناء ذوى الإحتياجات الخاصة </button><br>
            <table class="table table-bordered"  id="special_needs_sons_table" style="<?php if(empty($father_special_needs_sons_result)){?>display: none <?php } ?>">
                <thead>
                <tr class="info">
                    <th>م</th>
                    <th>إسم الإبن</th>
                    <th>الجنس</th>
                    <th>رقم الهوية</th>
                    <th>نوع الإعاقة</th>
                    <th>هل مستفيد من التأهيل الشامل</th>
                    <th>المبلغ</th>
                </tr>
                </thead>
                <tbody id="resultSpecial_needs_sons">
                <?php if(!empty($father_special_needs_sons_result)){ $count=1; foreach ($father_special_needs_sons_result as $row){?>

                <tr>
                    <td><?php echo$count;?></td>
                    <td><input type="text" name="name[]"  value="<?php echo $row->name;?>" class="form-control half"></td>
                    <td><select name="gender[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                            <?php $gender_arr=array('','ذكر','أنثى');?>
                            <option value="">اختر الجنس</option>
                            <?php for ($a=1;$a<sizeof($gender_arr);$a++){ $select='';
                                if($a== $row->gender){$select='selected';}?>
                                <option value="<?php echo$a; ?>"
                                    <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
                            <?php }?>

                        </select></td>
                    <td><input type="text"  onkeypress="validate_number(event)" name="id_number[]" value="<?php echo $row->id_number;?>" class="form-control half"></td>
                    <td><select name="disability_id_fk[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                            <option value="">اختر </option>
                            <?php if(!empty($diseases)){ foreach ($diseases as $record){ ?>
                                <option value="<?php  echo $record->id_setting;?>"

                                    <?php if($record->id_setting  == $row->disability_id_fk){ echo'selected'; } ?>

                                >
                                    <?php  echo $record->title_setting;?></option>

                            <?php  } }  ?>
                        </select></td>
                    <td>

                        <select name=comprehensive_rehabilitation[]" class=" no-padding form-control  form-control half"  data-show-subtext="true" data-live-search="true"
                                data-validation="required" aria-required="true" onchange="check_comprehensive_rehabilitation($(this).val(),<?php echo $count;?>)" >
                            <option value="">اختر</option>
                            <?php foreach ($arr_yes_no as $key =>$value){ ?>
                                <option value="<?php echo$key; ?>"

                                    <?php if($key == $row->comprehensive_rehabilitation){ echo'selected'; } ?>

                                ><?php echo$value; ?></option>
                            <?php } ?>
                        </select></td>
                    <td><input type="text"  <?php if(!empty($row->comprehensive_rehabilitation)){ if($row->comprehensive_rehabilitation ==1){ }else{ echo'disabled="disabled"'; } } else{ echo'disabled="disabled"'; }?>  onkeypress="validate_number(event)" name="comprehensive_rehabilitation_value[]" value="<?php echo $row->comprehensive_rehabilitation_value;?>" id="comprehensive_rehabilitation_value<?php echo $count;?>"  class="form-control half"></td>


                </tr>
                    <?php $count++; } } ?>






                </tbody>
            </table>
            </fieldset>
        </div>

        <!--display: block-------------------->


        <div class="col-xs-6"  id="other_associations" style="
        <?php if(!empty($all_links['father']['f_other_associations_check'])){
            if($all_links['father']['f_other_associations_check'] ==2){echo'display: none'; }
        }else{ echo'display: none'; }?>
        ">
            <fieldset id="other_associations_fieldset">

            <div class="form-group col-md-6 padding-4 col-sm-4 col-xs-12" >
                <label class="label label-green  half">اضافة الجمعيات المستفاد منها <strong class="astric">*</strong><strong></strong> </label>
            </div>

             <div class="clearfix"></div>
            <button type="button"  style="margin-bottom: 10px;" onclick="add_row_other_associations()" class="btn btn-success btn-next"><i class="fa fa-plus"></i>إضافة جمعية  مستفاد منها </button>

            <table class="table table-bordered" id="other_associations_table" style="<?php if(empty($father_other_associations_result)){?>display: none <?php } ?>">
                <thead>
                <tr class="info">
                    <th>م</th>
                    <th>إسم الجمعية</th>
                    <th colspan="2">نوع المساعدة</th>
                </tr>
                </thead>
                <tbody id="resultOther_associations">
                <?php if(!empty($father_other_associations_result)){ $count=1; foreach ($father_other_associations_result as $row){?>

                 <tr>
                     <td><?php echo $count;?></td>
                     <td><select name="association_id_fk[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="" aria-required="true" >
                             <option value="">اختر الجمعية</option>
                             <?php if(!empty($associations)){
                                 foreach ($associations as $record){?>

                                     <option value="<?php echo $record->id_setting;?>"

                                     <?php if( $record->id_setting == $row->association_id_fk){  echo'selected';} ?>

                                     ><?php echo $record->title_setting;?></option>

                                 <?php } } ?>
                         </select></td>
                     <td><label><input type="checkbox" name="in_kind_assistance[]" <?php if($row->in_kind_assistance ==1){ echo'checked';}?> value="1" > عينية</label></td>
                     <td><label><input type="checkbox" name="material_assistance[]" <?php if($row->material_assistance ==1){ echo'checked';}?> value="1"> مادية</label></td>
                 </tr>
                    <?php $count++; } } ?>
                </tbody>
            </table>
            </fieldset>
        </div>


        <!-------------------------end------------------>


    </div>

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


    function check_comprehensive_rehabilitation(value,id) {

        if(value ==1){
            document.getElementById("comprehensive_rehabilitation_value" + id).removeAttribute("disabled", "disabled");
            document.getElementById("comprehensive_rehabilitation_value" + id).setAttribute("data-validation", "required");


        } else {

            document.getElementById("comprehensive_rehabilitation_value" + id).setAttribute("disabled", "disabled");
            document.getElementById("comprehensive_rehabilitation_value" + id).removeAttribute("data-validation", "required");
            $('#comprehensive_rehabilitation_value' + id).val('');


        }



    }

</script>

