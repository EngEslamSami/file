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
     right: auto; !important; 
    left: 4px;
}
.bootstrap-select.btn-group .dropdown-toggle .filter-option {
    font-size: 15px;
}
.form-control{
    font-size: 15px;
    color: #000;
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
        <div class="panel-body">
            <?php echo form_open_multipart('family_controllers/Family/father/' . $this->uri->segment(4) . ''); ?>
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
                    <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong>
                    </label>
                    <input type="text" name="f_national_id" id="f_national_id" data-validation="required"
                           onkeyup="chek_length('f_national_id')" value="<?php echo $f_national_id ?>"
                           onkeypress="validate_number(event)" class="form-control half input-style"/>
                    <span id="f_national_id_span" class="span-validation"> </span>
                </div>
                <div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">نوع الهوية<strong class="astric">*</strong><strong></strong>
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
                    <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong>
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
                    <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
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
                    <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
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
                    <label class="label label-green  half">الجنسية<strong class="astric">*</strong><strong></strong>
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
                    <label class="label label-green  half">اضافه جنسيه اخري<strong
                            class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="nationality_other" id="nationality_other" data-validation="required"
                           value="<?php echo $nationality_other ?>" class="form-control half input-style"
                           data-validation=""<?php if ($nationality_other == "") { ?> disabled=""<?php } ?> />
                </div>

            <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">المهنة<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select id="f_job" name="f_job"
                            class="selectpicker no-padding form-control choose-date form-control half"
                            data-show-subtext="true" data-live-search="true" data-validation="required"
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
                    <label class="label label-green  half ">مكان العمل<strong class="astric">*</strong><strong></strong>
                    </label>
                    <input type="text" class="form-control half input-style" value="<?php echo $f_job_place ?>"
                           name="f_job_place"/>
                </div>

                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                <label class="label label-green  half">تاريخ الوفاة هجري <strong class="astric">*</strong><strong></strong> </label>
                                    <!--
                 <input type="text" name="f_death_date"   class="form-control half input-style docs-date" value="<?php echo $f_death_date ?>" data-validation="required"   />
                -->
                    <input id="date0" name="f_death_date" type="text" size="10" maxlength="10" style="width: 80px;"
                           class="form-control half input-style"
                           value="<?php echo $f_death_date ?>"
                           data-validation="required"
                    />
                </div>
                  
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">العمر عند الوفاة<strong></strong>
                    </label>
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
                    <label class="label label-green  half">سبب الوفاة<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select onchange="admSelectCheck(this);" name="f_death_id_fk"
                            class="selectpicker no-padding form-control choose-date form-control half"
                            data-show-subtext="" data-live-search="true" data-validation="" aria-required="true">
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
                <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-4" id="admDivCheck" style="display:block;">
                    <label class="label label-green  half">السبب<strong class="astric">*</strong><strong></strong>
                    </label>
                    <input type="text" class="form-control half input-style"
                           value="<?php echo $f_death_reason_fk ?>" name="f_death_reason_fk"
                           id="f_death_reason_fk" <?php if ($f_death_reason_fk == "") { ?> disabled=""<?php } ?>
                           data-validation="required"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half"> جوال التواصل ( الرسائل ) </label>
                    <input type="text" name="mob"
                           data-validation="required" readonly="readonly" class="form-control half input-style"
                           value="<?php echo $basic_data_family["contact_mob"]; ?> خاص بـ <?php echo $basic_data_family["title_setting"]; ?> "/>
                </div>




                
               
               
            </div>
            <div class="col-sm-12 col-xs-12">
            <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">عدد الزوجات<strong class="astric">*</strong><strong></strong>
                    </label>
                    <!--                       <select  name="f_wive_count"class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >-->
                    <!--                           <option value="">اختر</option>-->
                    <!--                           --><?php //for($i=1;$i<5;$i++):
                    //                               $selected="";if($i== $f_wive_count){$selected="selected";} ?>
                    <!--                               <option value="--><?php //echo $i?><!--" -->
                    <?php //echo $selected?><!-- >--><?php //echo $i;?><!--</option>-->
                    <!--                           --><?php //endfor;?>
                    <!--                       </select>-->
                    <input type="number" data-validation="required" id="wife" class="form-control half input-style"
                           value="<?php echo $f_wive_count ?>" name="f_wive_count"/>
                </div>
            <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">عدد الذكور<strong class="astric">*</strong><strong></strong>
                    </label>
                    <input type="text" name="male_number" id="male_number"
                           onkeypress="validate_number(event)" data-validation="required"
                           onkeyup="getFamilyNumber();"
                           value="<?php echo $f_child_num; ?>" class="form-control half input-style"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">عدد الإناث<strong class="astric">*</strong><strong></strong>
                    </label>
                    <input type="text" name="female_number" id="female_number"
                           onkeypress="validate_number(event)" data-validation="required"
                           onkeyup="getFamilyNumber();"
                           value="<?php echo $f_female_num; ?>" class="form-control half input-style"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">عدد أفراد الاسرة<strong
                            class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="family_members_number" id="family_members_number"
                           onkeypress="validate_number(event)"
                           data-validation="required" readonly value="<?php echo $family_members_number; ?>"
                           class="form-control half input-style"/>
                </div>
                <!--ahmed-->
               
               
                
                <!-- <div class="form-group col-sm-4 col-xs-12">
     <label class="label label-green  half">عدد الأبناء<strong class="astric">*</strong><strong></strong> </label>
	<input type="number"  name="f_child_num"   data-validation="number" value="<?php echo $f_child_num ?>" class="form-control half input-style" />
</div> -->
                
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
                <input type="submit" id="buttons" class="btn btn-success btn-close" name="add" value="حفظ  " style="font-size: 18px;width: 120px;border-radius: 20px;" />
            </div>
            <?php echo form_close() ?>
            <br/>
            <br/>
        </div>
    </div>
</div>
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



