<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
-->
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
        font-size: 15px !important;
        position: absolute !important;
        bottom: -23px !important;
        right: 50% !important;
    }

    .dl-horizontal dt {
        text-align: right;
        border-bottom: 1px dotted;
        padding: 3px 0;
        white-space: initial;
    }

    .dl-horizontal dd {
        margin-right: 180px;
        border-bottom: 1px dotted;
    }
       th {
        background-color: #ecffca;
        color: #333;
    }

    .title-top {
       padding: 8px;
    background-color: #5f9007;
    color: #fff;
    border-radius: 0;
    font-size: 18px;
    }
    .specific_style{

        background-color: #658e1a !important;
        color: white;
    }

    .specific_style_2{
        width: 280px;
        background-color: white;
        color: red;
        border: 1px solid #658e1a;
    }
</style>
<?php
if (isset($main_family_data[0]->suspend) && !empty($main_family_data[0]->suspend)) {
    if ($main_family_data[0]->suspend == 4) { ?>
        <div class="col-xs-12 ">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-12 ">
                        <?php
                        /*
                       echo '<pre>';
                    print_r($main_family_data);
                      echo '<pre>';
                      */
                        /*
                          [not_mostafeed_num_mother] => 0
                          [not_mostafeed_num_f_member] => 1
                        */
                        ?>
                        <div class="review-block">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="review-block-img">
                                        <img src="<?php echo base_url(); ?>asisst/fav/ms-icon-70x70.png"
                                             class="img-rounded" alt="">
                                    </div>
                                    <div class="review-block-name"><a href="#">
                                            <?php if (!empty($father) && $father != null) {
                                                echo $father->full_name;
                                            } else {
                                                echo $main_family_data[0]->mother_name;
                                            } ?>
                                        </a></div>
                                    <div class="review-block-name">
                                        <?php if (!empty($father) && $father != null) {
                                            echo $father->f_national_id;
                                        } else {
                                            echo $main_family_data[0]->mother_national_num;
                                        } ?>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="review-block-rate  col-sm-4">
                                        <dl class="dl-horizontal review-block-name">
                                            <dt>رقم الملف</dt>
                                            <dd>  <?php echo $main_family_data[0]->file_num ?></dd>
                                        </dl>
                                    </div>
                                    <div class="review-block-rate  col-sm-4">
                                        <dl class="dl-horizontal review-block-name">
                                            <dt>حالة الملف</dt>
                                            <dd><?php echo $main_family_data[0]->files_status_title ?></dd>
                                        </dl>
                                    </div>
                                    <div class="review-block-rate  col-sm-4">
                                        <dl class="dl-horizontal review-block-name">
                                            <dt>تاريخ تحديث الملف</dt>
                                            <dd style="width: 30%;">  <?php echo $main_family_data[0]->file_update_date ?></dd>
                                        </dl>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>إجمالي المستفيدين</th>
                                            <th>عدد الأرامل</th>
                                            <th>عدد الأيتام</th>
                                            <th>عدد المستفيدين</th>
                                            <th>إجمالي عدد الغير المستفيدين</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><?php echo($main_family_data[0]->armal_num_in_mother +
                                                    $main_family_data[0]->armal_num_in_f_member +
                                                    $main_family_data[0]->yteem_num +
                                                    $main_family_data[0]->mostafeed_num
                                                ) ?></td>
                                            <td><?php echo($main_family_data[0]->armal_num_in_mother + $main_family_data[0]->armal_num_in_f_member) ?></td>
                                            <td><?php echo($main_family_data[0]->yteem_num) ?></td>
                                            <td><?php echo($main_family_data[0]->mostafeed_num) ?></td>
                                            <td><?php echo($main_family_data[0]->not_mostafeed_num_mother + $main_family_data[0]->not_mostafeed_num_f_member) ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else { ?>
    <?php }
} ?>
<!------------------------------------------------------------->
<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?>
                <?php if (isset($main_family_data[0]->suspend) && !empty($main_family_data[0]->suspend)) { ?>
                    <button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
                        <span class="">رقم ملف الأسرة</span>
                    </button>
                    <button class="btn btn-success  btn-sm progress-button ">
 <span class="">
 <?php if ($main_family_data[0]->suspend == 4) {
     echo $main_family_data[0]->file_num;
 } else {
 } ?>
 </span>
                    </button>
                <?php } ?>
            </h3>
        </div>

        <div class="panel-body">
            <?php

            $this->CI->details_family_files($mother_num);
            ?>


            <?php if (isset($button_roles) && !empty($button_roles) && $button_roles != null) { ?>
                <div class="col-sm-12 text-center">


                    <?php  for($a=0;$a<sizeof($button_roles);$a++) {
                        if($basic[0]->final_suspend ==4){ if($a<4){continue; }
                        }elseif($basic[0]->suspend < 4){  if($a>3){continue; }
                        } ?>


                        
                        
                        <button type="submit"  class="btn btn-labeled  " name="ADD" value="ADD" style="background-color:<?= $button_roles[$a]->color ?>; color: #fff;"
                         data-toggle="modal" data-target="#modal-sm-<?=  $button_roles[$a]->id ?>">
                        <span class="btn-label"><i class="fa fa-<?=  $button_roles[$a]->icon ?>"
         aria-hidden="true"></i></span><?= $button_roles[$a]->title ?>       </button>


                    <?php } ?>

                </div>
            <?php } ?>



        </div>


        <?php /* ?>

        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 ">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#father" data-toggle="tab">بيانات الاب</a></li>
                    <li><a href="#mother" data-toggle="tab">بيانات الام </a></li>

                       <li><a href="#wakeel" data-toggle="tab">بيانات الوكيل </a></li>
                    <li><a href="#sons" data-toggle="tab">بيانات أفراد الأسرة </a></li>
                    <li><a href="#house" data-toggle="tab">بيانات السكن</a></li>
                    <li><a href="#devices" data-toggle="tab">محتويات السكن </a></li>
                    <li><a href="#home_needs" data-toggle="tab">إحتياجات الأسرة</a></li>
                    <li><a href="#attach_files" data-toggle="tab">رفع الوثائق</a></li>
                    <li><a href="#money" data-toggle="tab">مصادر الدخل والإلتزامات</a></li>
                    <!-------------------- 774 ----------------------------------->
                    <li><a href="#research" data-toggle="tab">رأى الباحث </a></li>
                    <!-------------------- 774 ----------------------------------->
                </ul>
                <!-- Tab panels -->
                <div class="tab-content">
                    <!------------------------------------------------------------------------------------------------>
                    <!------------------------------------------------------------------------------------------------>
                    <div class="tab-pane fade in active" id="father">
                        <div class="panel-body"><br>
                            <?php
                            if (!empty($father) && $father != null) {
                                $full_name = $father->full_name;
                                $f_national_id = $father->f_national_id;
                                $f_national_id_type = $father->f_national_id_type;//
                                $f_birth_date = $father->f_birth_date;
                                $f_job = $father->f_job;//
                                $f_death_id_fk = $father->f_death_id_fk;//
                                $f_child_num = $father->f_child_num;
                                $f_nationality_id_fk = $father->f_nationality_id_fk;//
                                $nationality_other = $father->nationality_other;
                                $f_death_date = $father->f_death_date;
                                $f_job_place = $father->f_job_place;
                                $f_death_reason_fk = $father->f_death_reason_fk;
                                $f_wive_count = $father->f_wive_count;//
                                $f_birth_date = $father->f_birth_date;
                                $f_birth_date_hijri = $father->f_birth_date_hijri;
                                $f_birth_date_year = $father->f_birth_date_year;
                                $f_birth_date_hijri_year = $father->f_birth_date_hijri_year;
                                $family_members_number = $father->family_members_number;
                                $f_card_source = $father->f_card_source;
                            } else {
                                $fullname = "";
                                $disable = "";
                                $f_national_id_type = '';//
                                $f_national_id = '';
                                $f_birth_date = '';
                                $f_job = "";//
                                $f_death_id_fk = '';//
                                $f_child_num = '';
                                $f_nationality_id_fk = '';//
                                $nationality_other = '';
                                $f_death_date = '';
                                $f_job_place = '';
                                $f_death_reason_fk = '';
                                $f_wive_count = '';//

                                $f_birth_date = '';
                                $f_birth_date_hijri = '';
                                $f_birth_date_year = '';
                                $f_birth_date_hijri_year = '';
                                $family_members_number = '';
                                $f_card_source = '';

                            }
                            ?>
                            <?php
                            if ($father == '' && $father == null) {
                                ?>
                                <div class="col-lg-12 alert alert-danger">لا توجد بيانات للاب</div>
                            <?php } else {
                                ?>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> رقم هوية الأب <strong
                                                class="astric">*</strong> </label>
                                        <input type="text" name="mother_national" data-validation="required"
                                               disabled class="form-control half input-style"
                                               value="<?php echo $f_national_id; ?>"/>
                                    </div>
                                    <div class="form-group col-sm-5 col-xs-12">
                                        <label class="label label-green  half"> الاسم رباعي <strong
                                                class="astric">*</strong> </label>
                                        <input type="text" name="full_name" data-validation="required"
                                               class="form-control half input-style" value="<?php echo $full_name; ?>"
                                               disabled/>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم الهوية<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="f_national_id" data-validation="number"
                                               onkeypress="validate_number(event)" value="<?= $f_national_id; ?>"
                                               id="f_national_id" disabled onkeyup="return valid();"
                                               class="form-control half input-style"/>
                                        <span id="validate1" style="font-size: 11px;"
                                              class="help-block col-xs-6"> </span>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">نوع الهوية<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="f_national_id_type"
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="true" data-live-search="true" disabled
                                                data-validation="required" aria-required="true">
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
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">مصدر الهوية<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="f_card_source" id="f_card_source"
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                disabled data-show-subtext="true" data-live-search="true"
                                                data-validation="required" aria-required="true">
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
                                </div>
                                <!--ahmed-->
                                <!--ahmed-->
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <?php if (!empty($f_birth_date_hijri)) {
                                            $hijri_date = explode('/', $f_birth_date_hijri);
                                        } ?>
                                        <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong>
                                        </label>
                                        <input class="textbox form-control" type="text" name="HDay" pattern="\d*"
                                               onkeypress="return isNumberKey(event)"
                                               onkeyup="moveOnMax(this,document.getElementById('Hmonth'))" disabled
                                               value="<?php if (!empty($hijri_date[0])) {
                                                   echo $hijri_date[0];
                                               } ?>" placeholder="day" id="HDay" size="20" maxlength="2"
                                               style="width: 16.6%;float: right;"/>
                                        <input class="textbox form-control" type="text" name="HMonth" pattern="\d*"
                                               onkeypress="return isNumberKey(event)"
                                               onkeyup="moveOnMax(this,document.getElementById('HYear'))" disabled
                                               value="<?php if (!empty($hijri_date[1])) {
                                                   echo $hijri_date[1];
                                               } ?>" placeholder="month" id="Hmonth" size="20" maxlength="2"
                                               style="width: 16.6%;float: right;"/>
                                        <input class="textbox4 form-control" type="text" name="HYear" pattern="\d*"
                                               onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form)"
                                               disabled value="<?php if (!empty($hijri_date[2])) {
                                            echo $hijri_date[2];
                                        } ?>" placeholder="year" id="HYear" size="20" maxlength="4"
                                               style="width: 16.6%;float: right;"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        if (!empty($f_birth_date)) {
                                            $gregorian_date = explode('/', $f_birth_date);
                                        } ?>
                                        <label class="label label-green  half">تاريخ الميلاد<strong
                                                class="astric">*</strong> </label>
                                        <input class="textbox form-control" type="text" name="CDay" pattern="\d*"
                                               onkeypress="return isNumberKey(event)"
                                               onkeyup="moveOnMax(this,document.getElementById('CMonth'))" disabled
                                               placeholder="day" id="CDay" size="20" maxlength="2" autofocus
                                               style="width: 16.6%;float: right;"
                                               value="<?php if (!empty($gregorian_date[0])) {
                                                   echo $gregorian_date[0];
                                               } ?>"/>
                                        <input class="textbox form-control" type="text" name="CMonth" pattern="\d*"
                                               onkeypress="return isNumberKey(event)"
                                               onkeyup="moveOnMax(this,document.getElementById('CYear'))" disabled
                                               placeholder="month" id="CMonth" size="20" maxlength="2"
                                               style="width: 16.6%;float: right;"
                                               value="<?php if (!empty($gregorian_date[1])) {
                                                   echo $gregorian_date[1];
                                               } ?>"/>
                                        <input class="textbox4 form-control" type="text" name="CYear" id="CYear"
                                               pattern="\d*" onkeypress="return isNumberKey(event)"
                                               onkeyup="chrToIsl(this.form);getAge();" disabled placeholder="year"
                                               id="CYear" size="20" maxlength="4" style="width: 16.6%;float: right;"
                                               value="<?php if (!empty($gregorian_date[2])) {
                                                   echo $gregorian_date[2];
                                               } ?>"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">العمر<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input class="textbox2 form-control half " type="text" name="age" id="myage"
                                               id="wd" value="<?php if (isset($hijri_date[2])) {
                                            echo($currnt_higry_year - $hijri_date[2]);
                                        } ?>" readonly/>
                                        <input class="textbox2 form-control half hidden" type="number" name="wd"
                                               size="60" id="wd" readonly/>
                                        <input class="textbox2 hidden" type="text" name="JD" size="60" id="JD"
                                               readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">عدد الذكور<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="male_number" id="male_number"
                                               onkeypress="validate_number(event)" data-validation="required" disabled
                                               onkeyup="getFamilyNumber();"
                                               value="<?php echo $family_members_number; ?>"
                                               class="form-control half input-style"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">عدد الإناث<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="female_number" id="female_number"
                                               onkeypress="validate_number(event)" data-validation="required" disabled
                                               onkeyup="getFamilyNumber();"
                                               value="<?php echo $family_members_number; ?>"
                                               class="form-control half input-style"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">عدد أفراد الاسرة<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="family_members_number" id="family_members_number"
                                               onkeypress="validate_number(event)" data-validation="required" disabled
                                               readonly value="<?php echo $family_members_number; ?>"
                                               class="form-control half input-style"/>
                                    </div>
                                </div>
                                <!--ahmed-->
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الجنسية<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="f_nationality_id_fk" id="f_nationality_id_fk" disabled
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="true" data-live-search="true"
                                                data-validation="required" aria-required="true">
                                            <?php if (isset($nationality) && $nationality != null && !empty($nationality)) { ?>
                                                <option value=" " style="display: none;" selected="selected">اختر
                                                </option>
                                                <?php if (isset($nationality) && $nationality != null && !empty($nationality)):
                                                    foreach ($nationality as $one_nationality):
                                                        $selected = '';
                                                        if ($one_nationality->id_setting == $f_nationality_id_fk) {
                                                            $selected = "selected";
                                                        } ?>
                                                        <option
                                                            value="<?php echo $one_nationality->id_setting ?>" <?php echo $selected ?> ><?php echo $one_nationality->title_setting; ?></option>
                                                    <?php endforeach;endif; ?>
                                                <option
                                                    value="0"<?php if ($f_nationality_id_fk == 0) echo "selected"; ?> >
                                                    اخري
                                                </option>
                                            <?php } else { ?>
                                                <option value=" " selected="selected">اختر</option>
                                                <option
                                                    value="0"<?php if ($f_nationality_id_fk == 0) echo "selected"; ?> >
                                                    اخري
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">اضافه جنسيه اخري<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="nationality_other" id="nationality_other" disabled
                                               data-validation="required" value="<?php echo $nationality_other ?>"
                                               class="form-control half input-style"
                                               data-validation=""<?php if ($nationality_other == "") { ?> disabled=""<?php } ?> />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">المهنة<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select id="f_job" name="f_job"
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                disabled data-show-subtext="true" data-live-search="true"
                                                data-validation="required" aria-required="true">
                                            <?php //$arr_gob=array('اختر','موظف حكومي','موظف قطاع خاص','اعمال حره','لا يعمل');
                                            ?>
                                            <?php foreach ($job_titles as $row) {
                                                $selected = "";
                                                if ($row->id_setting == $f_job) {
                                                    $selected = "selected";
                                                } ?>
                                                <option value="">اختر</option>
                                                <option
                                                    value="<?php echo $row->id_setting; ?>" <?php echo $selected ?> ><?php echo $row->title_setting; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12 red box" style="display: none">
                                        <label class="label label-green  half ">مكان العمل<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" class="form-control half input-style"
                                               value="<?php echo $f_job_place ?>" disabled name="f_job_place"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">سبب الوفاة<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select onchange="admSelectCheck(this);" name="f_death_id_fk" disabled
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="" data-live-search="true" data-validation=""
                                                aria-required="true">
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
                                                <option value="0"<?php if ($f_death_id_fk == 0) echo "selected"; ?> >
                                                    اخري
                                                </option>
                                                <?php
                                            } else { ?>
                                                <option value="" selected> اختر</option>
                                                <option value="0"<?php if ($f_death_id_fk == 0) echo "selected"; ?> >
                                                    اخري
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12" id="admDivCheck" style="display:block;">
                                        <label class="label label-green  half">السبب<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" class="form-control half input-style" disabled
                                               value="<?php echo $f_death_reason_fk ?>" name="f_death_reason_fk"
                                               id="f_death_reason_fk" <?php if ($f_death_reason_fk == "") { ?> disabled=""<?php } ?>
                                               data-validation="required"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">تاريخ الوفاة<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="f_death_date" disabled
                                               class="form-control half input-style docs-date"
                                               value="<?php echo $f_death_date ?>" data-validation="required"/>
                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">عدد الزوجات<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="number" data-validation="required" disabled id="wife"
                                               class="form-control half input-style" value="<?php echo $f_wive_count ?>"
                                               name="f_wive_count"/>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="tab-pane fade  " id="mother">
                        <div class="panel-body"><br>
                            <?php
                            if ($result['m_want_work'] == 1) {
                                $val = "نعم";
                            } else {
                                $val = "لا";
                            }
                            if ($result['m_hijri'] == 1) {
                                $val = "نعم";
                            } else {
                                $val = "لا";
                            }
                            if ($result['m_ommra'] == 1) {
                                $val = "نعم";
                            } else {
                                $val = "لا";
                            }
                            $arr_yes_no = array('', 'نعم', 'لا');
                            ?>
                            <?php if ($result == '' && $result == null) {
                                ?>
                                <div class="col-lg-12 alert alert-danger">لا توجد بيانات للام</div>
                            <?php } else { ?>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم السجل المدني للأم<strong
                                                class="astric">*</strong> </label>
                                        <input type="text" name="" readonly=""
                                               value="<?php echo $this->uri->segment(4); ?>"
                                               class="form-control half input-style"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> الاسم الرباعي <strong
                                                class="astric">*</strong> </label>
                                        <input type="text" name="fullname" value="<?php echo $result['full_name'] ?>"
                                               class="form-control half input-style" data-validation="required"
                                               disabled/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">طبيعة الفرد<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="person_type"
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="true" data-live-search="true" disabled
                                                data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($person_type as $row2):
                                                $selected = '';
                                                if ($row2->id_setting == $result['person_type']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الصلة<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_relationship" disabled="disabled" id="m_relationship"
                                                data-validation="required" aria-required="true"
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                        >
                                            <option value="">إختر</option>
                                            <?php if (!empty($relationships)) {
                                                foreach ($relationships as $record) {
                                                    $select = '';
                                                    if ($result['m_relationship'] == $record->id_setting) {
                                                        $select = 'selected';
                                                    }
                                                    ?>
                                                    <option
                                                        value="<?php echo $record->id_setting; ?>" <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">التصنيف<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="categoriey_m" disabled="disabled"
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="true" data-live-search="true"
                                                data-validation="required" aria-required="true">
                                            <?php $categories = array(1 => 'ارمله', 2 => 'يتيم', 3 => 'مستفيد'); ?>
                                            <option value="">إختر</option>
                                            <?php foreach ($categories as $key => $value) {
                                                $select = '';
                                                if ($result['categoriey_m'] == $key) {
                                                    $select = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $key; ?>" <?php echo $select; ?>><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">حاله المستفيد<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="halt_elmostafid_m" disabled="disabled" id="halt_elmostafid_m"
                                                class="form-control half">
                                            <option value=""> اختر</option>
                                            <?php if (isset($member_status) && !empty($member_status)) {
                                                foreach ($member_status as $record) { ?>
                                                    <option
                                                        value="<?php echo $record->id; ?>" <?php if ($result['halt_elmostafid_m'] == $record->id) {
                                                        ?> selected="selected"<?php } ?>> <?php echo $record->title; ?>
                                                    </option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4">
                                        <label class="label label-green  half"> الجنس <strong class="astric">*</strong>
                                        </label>
                                        <select name="gender" disabled="disabled"
                                                class="form-control half selectpicker " data-show-subtext="true"
                                                data-live-search="true" data-validation="required" aria-required="true">
                                            <?php $gender_arr = array('', 'ذكر', 'أنثى'); ?>
                                            <option value="">اختر</option>
                                            <?php for ($a = 1; $a < sizeof($gender_arr); $a++) {
                                                $select = '';
                                                if ($a == $result['m_gender']) {
                                                    $select = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $a; ?>" <?php echo $select; ?>><?php echo $gender_arr[$a]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">نوع الهوية<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_national_id_type"
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="true" data-live-search="true" disabled
                                                data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($national_id_array as $row2):
                                                $selected = '';
                                                if ($row2->id_setting == $result['m_national_id_type']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">مصدر الهوية<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_card_source" id="m_card_source" disabled
                                                data-validation="required"
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="true" data-live-search="true" aria-required="true">
                                            <option value="">إختر</option>
                                            <?php if (!empty($id_source)) {
                                                foreach ($id_source as $record) {
                                                    $select = '';
                                                    if ($result['m_card_source'] == $record->id_setting) {
                                                        $select = 'selected';
                                                    }
                                                    ?>
                                                    <option
                                                        value="<?php echo $record->id_setting; ?>" <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <?php $hijri_date = explode('/', $result['m_birth_date_hijri']); ?>
                                        <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong>
                                        </label>
                                        <input class="textbox form-control" type="text" name="HDay" disabled
                                               pattern="\d*" onkeypress="return isNumberKey(event)"
                                               onkeyup="moveOnMax(this,document.getElementById('Hmonth'))"
                                               value="<?php if (!empty($hijri_date[0])) {
                                                   echo $hijri_date[0];
                                               } ?>" placeholder="day" id="HDay" size="20" maxlength="2"
                                               style="width: 16.6%;float: right;"/>
                                        <input class="textbox form-control" type="text" name="HMonth" disabled
                                               pattern="\d*" onkeypress="return isNumberKey(event)"
                                               onkeyup="moveOnMax(this,document.getElementById('HYear'))"
                                               value="<?php if (!empty($hijri_date[1])) {
                                                   echo $hijri_date[1];
                                               } ?>" placeholder="month" id="Hmonth" size="20" maxlength="2"
                                               style="width: 16.6%;float: right;"/>
                                        <input class="textbox4 form-control" type="text" name="HYear" disabled
                                               pattern="\d*" onkeypress="return isNumberKey(event)"
                                               onkeyup="islToChr(this.form)" value="<?php if (!empty($hijri_date[2])) {
                                            echo $hijri_date[2];
                                        } ?>" placeholder="year" id="HYear" size="20" maxlength="4"
                                               style="width: 16.6%;float: right;"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        $gregorian_date = explode('/', $result['m_birth_date']); ?>
                                        <label class="label label-green  half">تاريخ الميلاد<strong
                                                class="astric">*</strong> </label>
                                        <input class="textbox form-control" data-validation="required" type="text"
                                               disabled name="CDay" pattern="\d*" onkeypress="return isNumberKey(event)"
                                               onkeyup="moveOnMax(this,document.getElementById('CMonth'))"
                                               placeholder="day" id="CDay" size="20" maxlength="2" autofocus
                                               style="width: 16.6%;float: right;"
                                               value="<?php if (!empty($gregorian_date[0])) {
                                                   echo $gregorian_date[0];
                                               } ?>"/>
                                        <input class="textbox form-control" data-validation="required" type="text"
                                               disabled name="CMonth" pattern="\d*"
                                               onkeypress="return isNumberKey(event)"
                                               onkeyup="moveOnMax(this,document.getElementById('CYear'))"
                                               placeholder="month" id="CMonth" size="20" maxlength="2"
                                               style="width: 16.6%;float: right;"
                                               value="<?php if (!empty($gregorian_date[1])) {
                                                   echo $gregorian_date[1];
                                               } ?>"/>
                                        <input class="textbox4 form-control" data-validation="required" type="text"
                                               disabled name="CYear" id="CYear" pattern="\d*"
                                               onkeypress="return isNumberKey(event)"
                                               onkeyup="chrToIsl(this.form);getAge();" placeholder="year" id="CYear"
                                               size="20" maxlength="4" style="width: 16.6%;float: right;"
                                               value="<?php if (!empty($gregorian_date[2])) {
                                                   echo $gregorian_date[2];
                                               } ?>"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">العمر<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input class="textbox2 form-control half " type="text" name="age" id="myage"
                                               readonly value="<?php if (isset($hijri_date[2])) {
                                            echo($currnt_higry_year - $gregorian_date[2]);
                                        } ?>"/>
                                        <input class="textbox2 form-control half hidden" type="number" name="wd"
                                               size="60" id="wd" readonly/>
                                        <input class="textbox2 hidden" type="text" name="JD" size="60" id="JD"
                                               readonly/>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الجنسية<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_nationality" id="m_nationality" data-validation="required"
                                                disabled
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="true" data-live-search="true" aria-required="true">
                                            <?php if (isset($nationality) && $nationality != null && !empty($nationality)) { ?>
                                                <option value="">اختر</option>
                                                <?php foreach ($nationality as $record):
                                                    $selected = '';
                                                    if ($record->id_setting == $result['m_nationality']) {
                                                        $selected = 'selected';
                                                    } ?>
                                                    <option
                                                        value="<?php echo $record->id_setting; ?>" <?php echo $selected ?> ><?php echo $record->title_setting; ?></option>
                                                <?php endforeach; ?>
                                                <option
                                                    value="0"<?php if ($result['m_nationality'] == 0) echo "selected"; ?> >
                                                    اخري
                                                </option>
                                            <?php } else {
                                                ?>
                                                <option value="" selected>اختر</option>
                                                <option
                                                    value="0"<?php if ($result['m_nationality'] == 0) echo "selected"; ?> >
                                                    اخري
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">اضافه جنسيه اخري<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="nationality_other" id="nationality_other" disabled
                                               value="<?php echo $result['nationality_other'] ?>"
                                               class="form-control half input-style" <?php if ($result['nationality_other'] == "") { ?> disabled=""<?php } ?>/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الحالة الإجتماعية<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_marital_status_id_fk" data-validation="required" disabled
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="true" data-live-search="true" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php foreach ($marital_status_array as $row6):
                                                $selected = '';
                                                if ($row6->id_setting == $result['m_marital_status_id_fk']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $row6->id_setting; ?>" <?php echo $selected ?> ><?php echo $row6->title_setting; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">السكن<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_living_place_id_fk" id="living_place_id"
                                                data-validation="required" disabled
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="" data-live-search="" aria-required="true">
                                            <?php if (isset($living_place_array) && $living_place_array != null && !empty($living_place_array)) { ?>
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
                                                <option
                                                    value="0"<?php if ($result['m_living_place_id_fk'] == 0) echo "selected"; ?> >
                                                    اخري
                                                </option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="" selected>اختر</option>
                                                <option
                                                    value="0"<?php if ($result['m_living_place_id_fk'] == 0) echo "selected"; ?> >
                                                    اخري
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">اضافه محل سكن<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="m_living_place" id="m_living_place" disabled
                                               value="<?php echo $result['m_living_place'] ?>"
                                               class="form-control half input-style" <?php if ($result['m_living_place'] == "") { ?> disabled=""<?php } ?> />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الحالة الدراسية <strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_education_status_id_fk" disabled data-validation="required"
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="true" aria-required="true" data-live-search="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($arr_ed_state as $row5) {
                                                $selected = '';
                                                if ($row5->id_setting == $result['m_education_status_id_fk']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $row5->id_setting; ?>" <?php echo $selected ?> ><?php echo $row5->title_setting; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">المستوى التعليمى <strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_education_level_id_fk" disabled id="educate"
                                                data-validation="required"
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="true" data-live-search="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($education_level_array as $row4):
                                                $selected = '';
                                                if ($row4->id_setting == $result['m_education_level_id_fk']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $row4->id_setting; ?>" <?php echo $selected ?> ><?php echo $row4->title_setting; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">التخصص <strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="m_specialization" disabled data-validation="required"
                                               value="<?php echo $result['m_specialization'] ?>" id="special"
                                               class="form-control half input-style"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">ملتحقة بدار نسائية<strong class="astric">*</strong><strong></strong>
                                        </label>
                                        <select name="m_female_house_check" id="eldar" disabled
                                                class=" no-padding form-control choose-date form-control half "
                                                data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                                                $selected = '';
                                                if ($r == $result['m_female_house_check']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option
                                                    value="<?php echo $r; ?>" <?php echo $selected ?> ><?php echo $arr_yes_no[$r]; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">اسم الدار <strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select class=" no-padding form-control choose-date form-control half" disabled
                                                name="m_female_house_id_fk"
                                                id="m_female_house_id_fk" <?php if ($result['m_female_house_id_fk'] == "") { ?> disabled=""<?php } ?>>
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($women_houses as $row4):
                                                $selected = '';
                                                if ($row4->id_setting == $result['m_female_house_id_fk']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $row4->id_setting; ?>" <?php echo $selected ?> ><?php echo $row4->title_setting; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!--ahmed-->
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الحالة الصحية<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_health_status_id_fk" disabled id="m_health_status_id_fk"
                                                onchange="check()" data-validation="required"
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                                data-show-subtext="true" data-live-search="true" aria-required="true">
                                            <option value="">اختر</option>
                                            <option value="disease"
                                                    <?php if ($result['m_health_status_id_fk'] === 'disease'){ ?>selected <?php } ?>>
                                                مريض
                                            </option>
                                            <option value="disability"
                                                    <?php if ($result['m_health_status_id_fk'] === 'disability'){ ?>selected <?php } ?>>
                                                معاق
                                            </option>
                                            <?php
                                            foreach ($health_status_array as $row3):
                                                $selected = '';
                                                if ($row3->id_setting == $result['m_health_status_id_fk']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $row3->id_setting; ?>" <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">نوع المرض<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="disease_id_fk" id="disease_id_fk" disabled
                                                class=" no-padding form-control choose-date form-control half"
                                                aria-required="true" disabled="disabled">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($diseases as $row3):
                                                $selected = '';
                                                if ($row3->id_setting == $result['disease_id_fk']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option value="<?php echo $row3->id_setting; ?>"
                                                        disabled <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">نوع الإعاقة<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="disability_id_fk" id="disability_id_fk" disabled
                                                class=" no-padding form-control choose-date form-control half"
                                                aria-required="true" disabled="disabled">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($diseases as $row3):
                                                $selected = '';
                                                if ($row3->id_setting == $result['disability_id_fk']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option value="<?php echo $row3->id_setting; ?>"
                                                        disabled <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!--
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">تاريخ المرض/الإعاقة <strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="dis_date_ar" id="dis_date_ar" disabled   value="<?php echo $result['dis_date_ar'] ?>" class="form-control half input-style docs-date"  data-validation="required" />
                                    </div>
                                    -->
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">سبب المرض/الإعاقة <strong class="astric">*</strong><strong></strong>
                                        </label>
                                        <input type="text" name="dis_reason" id="dis_reason" disabled
                                               value="<?php echo $result['dis_reason'] ?>"
                                               class="form-control half input-style " data-validation="required"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">تاريخ المرض/الإعاقة <strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" disabled="disabled" name="date_death_disease"
                                               id="date_reason"
                                               value="<?php if (isset($result['date_death_disease'])) {
                                                   echo $result['date_death_disease'];
                                               } ?>" class="form-control half input-style docs-date"
                                               data-validation="required" <?php if ($result['m_health_status_id_fk'] == 'good') {
                                            echo 'disabled="disabled"';
                                        } ?> />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">جهة المتابعة المرض/الإعاقة <strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="dis_response_status" id="dis_response_status" disabled
                                                class=" no-padding form-control choose-date form-control half"
                                                data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($responses as $row3):
                                                $selected = '';
                                                if ($row3->id_setting == $result['dis_response_status']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $row3->id_setting; ?>" <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">وضع الحالة المرض/الإعاقة <strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="dis_status" id="dis_status" disabled
                                                class=" no-padding form-control choose-date form-control half"
                                                data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($diseases_status as $row3):
                                                $selected = '';
                                                if ($row3->id_setting == $result['dis_status']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $row3->id_setting; ?>" <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!--ahmed-->
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">أداء فريضة الحج<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_hijri" disabled="disabled"
                                                class="selectpicker no-padding  disabled form-control choose-date form-control half"
                                                data-show-subtext="true" data-live-search="true"
                                                data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                                                $selected = '';
                                                if ($r == $result['m_hijri']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option
                                                    value="<?php echo $r; ?>" <?php echo $selected ?> ><?php echo $arr_yes_no[$r]; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">أداء فريضة العمرة<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_ommra" disabled="disabled"
                                                class="selectpicker no-padding   form-control choose-date form-control half"
                                                data-show-subtext="true" data-live-search="true"
                                                data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                                                $selected = '';
                                                if ($r == $result['m_ommra']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option
                                                    value="<?php echo $r; ?>" <?php echo $selected ?> ><?php echo $arr_yes_no[$r]; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم الجوال <strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" onkeypress="validate_number(event)" disabled name="m_mob"
                                               value="<?php echo $result['m_mob'] ?>" id="m_mob"
                                               onkeyup="chek_length('m_mob')" class="form-control half input-style"
                                               data-validation="required"/>
                                        <span id="m_mob_span" class="span-validation"> </span>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم جوال أخر <strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" onkeypress="validate_number(event)" disabled
                                               name="m_another_mob" id="m_another_mob"
                                               onkeyup="chek_length('m_another_mob')"
                                               value="<?php echo $result['m_another_mob'] ?>"
                                               class="form-control half input-style" data-validation="required"/>
                                        <span id="m_another_mob_span" class="span-validation"> </span>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">البريد الإلكترونى <strong class="astric">*</strong><strong></strong>
                                        </label>
                                        <input type="email" name="m_email" disabled
                                               value="<?php echo $result['m_email'] ?>"
                                               class="form-control half input-style" data-validation="required"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">المهارة<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="m_skill_name" disabled
                                               value="<?php echo $result['m_skill_name'] ?>"
                                               class="form-control half input-style" data-validation="required"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الحياة العملية <strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_want_work" id="m_want_work" disabled onchange="getWork();"
                                                class=" no-padding form-control choose-date form-control half"
                                                data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php
                                            $arr_work = array('', 'لا يعمل', 'يعمل');
                                            for ($r = 1; $r < sizeof($arr_work); $r++) {
                                                $selected = '';
                                                if ($r == $result['m_want_work']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option
                                                    value="<?php echo $r; ?>" <?php echo $selected ?> ><?php echo $arr_work[$r]; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">المهنة<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="m_job_id_fk" id="m_job_id_fk"
                                                class=" disabled  no-padding form-control choose-date form-control half "
                                                aria-required="true" <?php if ($result['m_want_work'] == 1) { ?> disabled="disabled" <?php } ?> >
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($job_titles as $job):
                                                $selected = '';
                                                if ($job->id_setting == $result['m_job_id_fk']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $job->id_setting; ?>" <?php echo $selected ?> ><?php echo $job->title_setting; ?></option>
                                            <?php endforeach; ?>
                                            <option value="0">أخري</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الدخل الشهرى<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" step="any" name="m_monthly_income" disabled
                                               onkeypress="validate_number(event)" data-validation=""
                                               value="<?php echo $result['m_monthly_income']; ?>" id="mo-income"
                                               class="form-control half input-style" <?php if ($result['m_want_work'] == 1) { ?>  disabled="disabled" <?php } ?>/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">مكان العمل<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="m_place_work" id="m_place_work" disabled
                                               data-validation="" value="<?php echo $result['m_place_work']; ?>"
                                               class="form-control half input-style" <?php if ($result['m_want_work'] == 1) { ?>  disabled="disabled"  <?php } ?>/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">هاتف العمل<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <input type="text" step="any" name="m_place_mob" disabled id="m_place_mob"
                                               onkeyup="chek_length('m_place_mob')" onkeypress="validate_number(event)"
                                               data-validation="" value="<?php echo $result['m_place_mob']; ?>"
                                               class="form-control half input-style" <?php if ($result['m_want_work'] == 1) { ?>  disabled="disabled"  <?php } ?>/>
                                        <span id="m_place_mob_span" class="span-validation"> </span>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">القدرة علي العمل<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="ability_work" id="ability_work"
                                                class="no-padding form-control choose-date form-control half"
                                                data-validation="" onchange="get_work($(this).val())"
                                                disabled="disabled"
                                                aria-required="true" <?php if (isset($result['m_want_work'])) {
                                            if ($result['m_want_work'] == 2) { ?>  disabled="disabled"  <?php }
                                        } ?> >
                                            <?php $yes_no = array('لا', 'نعم'); ?>
                                            <option value="">إختر</option>
                                            <?php for ($w = 0; $w < sizeof($yes_no); $w++) {
                                                $select = '';
                                                if (isset($result['ability_work'])) {
                                                    if ($result['ability_work'] == $w) {
                                                        $select = 'selected';
                                                    }
                                                } ?>
                                                <option
                                                    value="<?php echo $w; ?>" <?php echo $select; ?>><?php echo $yes_no[$w]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> نوع العمل<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="work_type_id_fk" id="work_type_id_fk"
                                                class=" no-padding form-control choose-date form-control half "
                                                disabled="disabled" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($works_type as $work):
                                                $selected = '';
                                                if ($work->id_setting == $result['work_type_id_fk']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $work->id_setting; ?>" <?php echo $selected ?> ><?php echo $work->title_setting; ?></option>
                                            <?php endforeach; ?>
                                            <option value="0">أخري</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">طبيعة الشخصية<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="personal_character_id_fk" id="personal_character_id_fk"
                                                class=" no-padding form-control choose-date form-control half "
                                                aria-required="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($personal_characters as $character):
                                                $selected = '';
                                                if ($character->id_setting == $result['personal_character_id_fk']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $character->id_setting; ?>" <?php echo $selected ?> ><?php echo $character->title_setting; ?></option>
                                            <?php endforeach; ?>
                                            <option value="0">أخري</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">العلاقة بالأسرة<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="relation_with_family" id="relation_with_family"
                                                class=" no-padding form-control choose-date form-control half "
                                                aria-required="true">
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($relations_with_family as $relation):
                                                $selected = '';
                                                if ($relation->id_setting == $result['relation_with_family']) {
                                                    $selected = 'selected';
                                                } ?>
                                                <option
                                                    value="<?php echo $relation->id_setting; ?>" <?php echo $selected ?> ><?php echo $relation->title_setting; ?></option>
                                            <?php endforeach; ?>
                                            <option value="0">أخري</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">مكفول<strong
                                                class="astric">*</strong><strong></strong> </label>
                                        <select name="guaranteed_m" disabled="disabled"
                                                class="selectpicker no-padding form-control choose-date form-control half"
                                        " data-validation="required" aria-required="true">
                                        <?php $yes_no = array('لا', 'نعم'); ?>
                                        <option value="">إختر</option>
                                        <?php for ($s = 0; $s < sizeof($yes_no); $s++) {
                                            $select = '';
                                            if ($result['guaranteed_m'] == $s) {
                                                $select = 'selected';
                                            } ?>
                                            <option
                                                value="<?php echo $s; ?>" <?php echo $select; ?>><?php echo $yes_no[$s]; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

<!------------------ بيانات الوكيل ------------------------------------->

                    <!------------------------------------------------------------------------------------------------>
                    <!------------------------------------------------------------------------------------------------>
                    <div class="tab-pane fade  " id="wakeel">
                        <div class="panel-body"><br>
                            <?php
                            if(isset($wakeel) && $wakeel!=null){
                                $w_name= $wakeel[0]->w_name;
                                $relationship_id_fk=  $wakeel[0]->relationship_id_fk;
                                $w_mob=  $wakeel[0]->w_mob;
                                $w_national_id_type=  $wakeel[0]->w_national_id_type;
                                $w_card_source=  $wakeel[0]->w_card_source;
                                $w_national_id=  $wakeel[0]->w_national_id;
                                $w_birth_date=  $wakeel[0]->w_birth_date;
                                $w_birth_date_hijri=  $wakeel[0]->w_birth_date_hijri;
                                $w_birth_date_hijri_year=  $wakeel[0]->w_birth_date_hijri_year;
                                $w_birth_date_year=  $wakeel[0]->w_birth_date_year;
                                $w_want_work =  $wakeel[0]->w_want_work;
                                $w_job_id_fk =$wakeel[0]->w_job_id_fk;
                                $job_place=  $wakeel[0]->job_place;
                                $employer=$wakeel[0]->employer;
                                $job_mob=  $wakeel[0]->job_mob;
                                $salary=   $wakeel[0]->salary;
                                $guaranted=  $wakeel[0]->guaranted;
                                $persons_num=  $wakeel[0]->persons_num;
                                $w_national_img=  $wakeel[0]->w_national_img;
                                $id = $wakeel[0]->id;
                                $w_marital_status_id_fk = $wakeel[0]->w_marital_status_id_fk;
                            }else{

                                $w_name="";
                                $relationship_id_fk="";
                                $w_mob="";
                                $w_national_id_type="";
                                $w_card_source="";
                                $w_national_id="";
                                $w_birth_date="";
                                $w_birth_date_hijri="";
                                $w_birth_date_hijri_year="";
                                $w_birth_date_year="";
                                $w_want_work = '';
                                $w_job_id_fk="";
                                $job_place="";
                                $employer="";
                                $job_mob="";
                                $salary="";
                                $guaranted="";
                                $persons_num="";
                                $w_national_img ='';
                                $w_marital_status_id_fk='';
                                $id = '';
                            }
                            ?>
                            <?php if ($wakeel == '' && $wakeel == null) {
                                ?>
                                <div class="col-lg-12 alert alert-danger">لا توجد بيانات للوكيل</div>
                            <?php } else { ?>

                                <div class="col-sm-12 col-xs-12">

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> رقم السجل المدني للاب  </label>
                                        <input type="text"
                                               disabled class="form-control half input-style"
                                               value="<?php if(!empty($father->f_national_id)){ echo $father->f_national_id; }  ?>" />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> اسم الاب الرباعي  </label>
                                        <input type="text"
                                               disabled class="form-control half input-style"
                                               value="<?php if(!empty($father->full_name)){ echo $father->full_name; }  ?>" />
                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> إسم الوكيل رباعي  <strong class="astric">*</strong><strong></strong></label>
                                        <input type="text" name="w_name"
                                               data-validation="required"   disabled
                                               class="form-control half input-style" value="<?php echo $w_name;?>" />
                                    </div>


                                </div>





                                <div class="col-sm-12 col-xs-12">

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" name="w_national_id" maxlength="10" disabled
                                               id="w_national_id" data-validation="required"
                                               onkeyup="check_length_num(this,10,'w_national_id_span');"
                                               value="<?php echo $w_national_id; ?>" onkeypress="validate_number(event)"
                                               class="form-control half input-style" />
                                        <span  id="w_national_id_span" class="span-validation"> </span>
                                    </div>


                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">نوع الهوية<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="w_national_id_type" disabled class="selectpicker no-padding form-control choose-date form-control half"
                                                 data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                                            <?php if(isset($national_id_array) && $national_id_array!=null &&!empty($national_id_array)){?>
                                                <option value="">اختر</option>
                                                <?php

                                                foreach ($national_id_array as $row2):
                                                    $selected='';if($row2->id_setting==$w_national_id_type){$selected='selected';}	?>
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


                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
                                        <select  name="w_card_source" id="w_card_source" disabled
                                                 class="selectpicker no-padding form-control choose-date form-control half"
                                                 data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                                            <option value="">إختر</option>
                                            <?php if(!empty($id_source)){ foreach ($id_source as $record){
                                                $select=''; if($w_card_source==$record->id_setting){$select='selected'; }
                                                ?>
                                                <option value="<?php echo $record->id_setting;?>"
                                                    <?php echo $select;?>><?php echo $record->title_setting;?></option>
                                            <?php  } } ?>
                                        </select>
                                    </div>


                                </div>
                                <div class="col-sm-12 col-xs-12">

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <?php      if(!empty($w_birth_date_hijri)){
                                            $hijri_date=explode('/',$w_birth_date_hijri); }?>
                                        <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
                                        <input class="textbox form-control" type="text" disabled name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)"
                                               onkeyup="moveOnMax(this,document.getElementById('Hmonth'))"
                                               value="<?php if(!empty($hijri_date[0])){ echo $hijri_date[0];}?>"
                                               placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                                        <input class="textbox form-control" type="text" disabled name="HMonth" pattern="\d*"
                                               onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))"
                                               value="<?php  if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"
                                               id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                                        <input class="textbox4 form-control" type="text" disabled name="HYear" pattern="\d*"
                                               onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form);getAge();"
                                               value="<?php if(!empty($hijri_date[2])){ echo $hijri_date[2];}?>"  placeholder="year"
                                               id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <?php
                                        if(!empty($w_birth_date)){
                                            $gregorian_date=explode('/',$w_birth_date); }  ?>
                                        <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
                                        <input class="textbox form-control" type="text" disabled name="CDay"pattern="\d*"
                                               onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))"
                                               placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"
                                               value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; } ?>"/>
                                        <input class="textbox form-control" type="text" disabled name="CMonth" pattern="\d*"
                                               onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))"
                                               placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;"
                                               value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1]; }?>"/>
                                        <input class="textbox4 form-control" type="text" disabled name="CYear"  id="CYear" pattern="\d*"
                                               onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"
                                               placeholder="year"  id="CYear" size="20" maxlength="4" style="width: 16.6%;float: right;"
                                               value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2]; }?>"/>
                                    </div>


                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong> </label>
                                        <input class="textbox2 form-control half " type="text" disabled name="age" id="myage" id="wd"
                                               value="<?php
                                               if(!empty($current_year) && !empty($w_birth_date_hijri_year)){
                                                   echo $current_year  - $w_birth_date_hijri_year;

                                               } ?>" readonly />
                                        <input class="textbox2 form-control half hidden" type="number" name="wd" size="60"
                                               id="wd" readonly />
                                        <input class="textbox2 hidden" type="text" name="JD"  size="60" id="JD" readonly />
                                    </div>

                                </div>


                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الصلة<strong class="astric">*</strong><strong></strong> </label>
                                        <select name="relationship_id_fk" disabled id="relationship_id_fk"  data-validation="required" aria-required="true"
                                                class="selectpicker no-padding form-control choose-date form-control half">
                                            <option value="">إختر</option>
                                            <?php if(!empty($relationships)){ foreach ($relationships as $record){
                                                $select=''; if($relationship_id_fk ==$record->id_setting){$select='selected'; }
                                                ?>
                                                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                                            <?php  } } ?>
                                        </select>
                                    </div>


                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الحالة الإجتماعية<strong class="astric">*</strong><strong></strong> </label>
                                        <select name="w_marital_status_id_fk" disabled id="w_marital_status_id_fk"  data-validation="required" aria-required="true"
                                                onchange="getGuaranted(this.value)"    class="selectpicker no-padding form-control choose-date form-control half">
                                            <option value="">إختر</option>
                                            <?php foreach ($marital_status_array as $row6):
                                                $selected='';if($row6->id_setting==$w_marital_status_id_fk){$selected='selected';}   ?>
                                                <option value="<?php  echo $row6->id_setting;?>"  <?php echo $selected?>  ><?php  echo $row6->title_setting;?></option>
                                            <?php  endforeach;?>
                                        </select>
                                    </div>


                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">رقم الجوال <strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" disabled  onkeypress="validate_number(event)" maxlength="10" name="w_mob"
                                               value="<?php echo $w_mob;?>"   id="w_mob"
                                               class="form-control half input-style" data-validation="required"
                                               onkeyup="check_length_num(this,10,'w_mob_span');"  />
                                        <span  id="w_mob_span" class="span-validation"> </span>
                                    </div>




                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">الحياة العملية<strong class="astric">*</strong><strong></strong> </label>
                                        <select id="w_want_work" disabled name="w_want_work" class=" no-padding form-control choose-date form-control half"
                                                onchange="checkJob(this.value)"
                                                data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >
                                            <?php $arr_job=array(1=>'يعمل',0=>'لا يعمل'); ?>
                                            <option value="">اختر</option>
                                            <?php for($a=0;$a<sizeof($arr_job);$a++){
                                                $selected="";
                                                if($w_want_work !=''){
                                                    if($a == $w_want_work){$selected="selected";} } ?>
                                                <option value="<?php echo $a ; ?>" <?php echo $selected?> ><?php echo$arr_job[$a];?></option>
                                            <?php }?>
                                        </select>
                                    </div>


                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> المهنة  <strong class="astric">*</strong><strong></strong></label>
                                        <select  name="w_job_id_fk" disabled id="w_job_id_fk"
                                                 class=" no-padding form-control choose-date form-control half "
                                                 aria-required="true"  <?php if($w_want_work !=1){?> disabled="disabled" <?php }?> >
                                            <option value="">اختر</option>
                                            <?php
                                            foreach ($job_titles as $value):
                                                $selected='';
                                                if(!empty($w_job_id_fk)){
                                                    if($value->id_setting== $w_job_id_fk){$selected='selected';} }	?>
                                                <option value="<?php  echo $value->id_setting; ?>"  <?php echo $selected?> ><?php  echo $value->title_setting;?></option>
                                            <?php  endforeach;?>
                                            <option value="0">أخري</option>
                                        </select>
                                    </div>


                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> إسم جهة العمل  <strong class="astric">*</strong><strong></strong></label>
                                        <input type="text" disabled name="employer" <?php if($w_want_work!=1){echo 'disabled';}?> id="employer"
                                               class="form-control half input-style" value="<?php echo $employer;?>" />
                                    </div>




                                </div>

                                <div class="col-sm-12 col-xs-12">

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> مكان العمل  <strong class="astric">*</strong><strong></strong></label>
                                        <input type="text" disabled name="job_place" <?php if($w_want_work!=1){echo 'disabled';}?> id="job_place"
                                               class="form-control half input-style" value="<?php echo $job_place;?>" />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> هاتف العمل  <strong class="astric">*</strong><strong></strong></label>
                                        <input type="text" disabled name="job_mob"  id="job_mob" <?php if($w_want_work!=1){echo 'disabled';}?> onkeypress="validate_number(event)"
                                               onkeyup="check_length_num(this,10,'job_mob_span');" maxlength="10"
                                               class="form-control half input-style" value="<?php echo $job_mob;?>" />
                                        <span  id="job_mob_span" class="span-validation"> </span>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> الدخل الشهري   <strong class="astric">*</strong><strong></strong></label>
                                        <input type="text" disabled name="salary"  id="salary" <?php if($w_want_work !=1){echo 'disabled';}?> onkeypress="validate_number(event)"
                                               class="form-control half input-style"  value="<?php echo $salary;?>" />
                                    </div>



                                </div>

                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">هل يعول<strong class="astric">*</strong><strong></strong> </label>
                                        <select id="guaranted" disabled name="guaranted" class=" no-padding form-control choose-date form-control half"
                                                onchange="checkGuaranted(this.value)"
                                                data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >
                                            <?php $arr_guaranted=array(1=>'نعم',0=>'لا'); ?>
                                            <option value="">اختر</option>
                                            <?php for($a=0;$a<sizeof($arr_guaranted);$a++){
                                                $selected="";
                                                if($guaranted !=''){
                                                    if($a == $guaranted){$selected="selected";} } ?>
                                                <option value="<?php echo $a ; ?>" <?php echo $selected?> ><?php echo$arr_guaranted[$a];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">عدد الأفراد<strong class="astric">*</strong><strong></strong> </label>
                                        <input type="text" disabled name="persons_num" id="persons_num"  onkeypress="validate_number(event)"
                                            <?php if($guaranted!=1){echo 'disabled';}?> value="<?php echo $persons_num;?>"  class="form-control half input-style" />
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half">صورة الهوية </label>
                                        <input type="file" disabled name="w_national_img" class="form-control half"/>
                                            <?php if (!empty($w_national_img)){?>
                                                <table class="table table-bordered " width="10px">
                                                    <tr >
                                                        <td style="width: 30px;">
                                                            <img src="<?php echo base_url()?>uploads/images/<?php echo $w_national_img;?>"
                                                                 width="100%"></td>
                                                        <td style="width: 30px; text-align: center" >           <a href="<?php echo base_url()?>uploads/images/<?php echo $w_national_img;?>" download> <i
                                                                    class="fa fa-download"></i> </a></td>
                                                        <td style="width: 30px; text-align: center">           <a href="#" data-toggle="modal" data-target="#myModal-view<?php echo $id;?>"> <i
                                                                    class="fa fa-eye"></i> </a></td>
                                                    </tr>

                                                </table>

                                            <?php }else{ ?>
                                        <small class="small" style="bottom:-13px;"> لاتوجد صورة مرفقة </small>
                                            <?php } ?>
                                    </div>


                                    <div class="modal fade" id="myModal-view<?php echo $id;?>" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">صورة الهوية</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?php echo base_url()?>uploads/images/<?php echo $w_national_img;?>"
                                                         width="100%">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>


                            <?php } ?>
                        </div>
                    </div>
                    <!------------------------------------------------------------------------------------------------>
                    <!------------------------------------------------------------------------------------------------>












                    <!------------------------------------------------------------------------------------------------>
                    <!------------------------------------------------------------------------------------------------>
                    <!------------------------------------------------------------------------------------------------>
                    <!------------------------------------------------------------------------------------------------>
                    <div class="tab-pane fade" id="sons">
                        <div class="panel-body"><br>
                            <?php if (isset($member_data) && $member_data != null) { ?>
                                <table class="table table-bordered" style="width:100%">
                                    <header>
                                        <tr>
                                            <th>م</th>
                                            <th>الإسم</th>
                                            <th>رقم الهوية</th>
                                            <th>الصلة</th>
                                            <th>الجنس</th>
                                            <th>تاريخ الميلاد هجري</th>
                                            <th>العمر</th>
                                            <th>التصنيف</th>
                                            <th>حالة الفرد</th>
                                            <th> السبب</th>
                                        </tr>
                                    </header>
                                    <tbody>
                                    <?php
                                    $x = 2;
                                    foreach ($member_data as $row) { ?>
                                        <tr>
                                            <td><?php echo $x; ?></td>
                                            <td><?php echo $row->member_full_name; ?></td>
                                            <td><?php echo $row->member_card_num; ?></td>
                                            <td><?php echo $row->relation_name; ?></td>
                                            <!--
                            <td><?php if (isset($mothers_data[0]->full_name)) {
                                                echo $mothers_data[0]->full_name;
                                            } ?></td>
                           -->
                                            <td><?php if ($row->member_gender == 1) {
                                                    echo 'ذكر';
                                                } else {
                                                    echo 'انثى';
                                                } ?></td>
                                            <td><?php echo $row->member_birth_date_hijri; ?></td>
                                            <td>
                                                <?php $age = '';
                                                $hijr_uear = explode("/", $row->member_birth_date_hijri);
                                                if (isset($hijr_uear[2])) {
                                                    $age = $currnt_higry_year - $hijr_uear[2];
                                                }
                                                echo $age . " عام";
                                                ?>
                                            </td>
                                            <td><?php //echo $row->halet_member_name;
                                                if ($row->categoriey_member == 1) {
                                                    $categoriey_member = 'أرمل ';
                                                } elseif ($row->categoriey_member == 2) {
                                                    $categoriey_member = 'يتيم ';
                                                } elseif ($row->categoriey_member == 3) {
                                                    $categoriey_member = 'مستفيد ';
                                                } else {
                                                    $categoriey_member = 'غير محدد  ';
                                                }
                                                echo $categoriey_member;
                                                ?>
                                            </td>
                                            <td> <?php echo $row->halet_member_name; ?>
                                            </td>
                                            <td><?php
                                                echo $row->persons_process_reason;
                                                ?> </td>
                                        </tr>
                                        <?php $x++;
                                    } ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <div class="col-lg-12 alert alert-danger"> لا يوجد أبناء للأسرة</div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="house">
                        <div class="panel-body">
                            <?php if (isset($check_data) && $check_data != null && !empty($check_data)) {
                                $result = $check_data;
                            } else {
                                foreach ($all_field as $keys => $value) {
                                    $result[$all_field[$keys]] = '';
                                }
                                $result['h_rent_amount'] = 0;
                            }
                            $arr_yes_no = array('', 'نعم', 'لا');
                            ?>
                            <div class="col-md-12">
                                <div class="form-group col-sm-6">
                                    <label class="label label-green  half">إسم الام <strong class="astric">*</strong>
                                    </label>
                                    <input type="text" value="<?php echo $mother_data['full_name'] ?>" readonly=""
                                           class="form-control half input-style">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="label label-green  half">رقم السجل المدنى <strong
                                            class="astric">*</strong> </label>
                                    <input type="text" value="<?php echo $mother_national_num ?>" readonly=""
                                           class="form-control half input-style" data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">رقم حساب فاتورة الكهرباء <strong
                                            class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " type="text" disabled
                                           onkeypress="validate_number(event)" class="form-control half input-style"
                                           data-validation="required" name="h_electricity_account"
                                           value="<?php echo $result['h_electricity_account'] ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">رقم حساب عداد المياه <strong
                                            class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " type="text" disabled
                                           onkeypress="validate_number(event)" class="form-control half input-style"
                                           data-validation="required" name="h_water_account"
                                           value="<?php echo $result['h_water_account'] ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">الرقم الصحى <strong class="astric">*</strong>
                                    </label>
                                    <input type="text" name="h_health_number" disabled
                                           onkeypress="validate_number(event)"
                                           value="<?php echo $result['h_health_number'] ?>"
                                           class="form-control half input-style" data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">المنطقة <strong class="astric">*</strong>
                                    </label>
                                    <select class="form-control half " disabled
                                            onchange="plases('h_area_id_fk','h_city_id_fk');" name="h_area_id_fk"
                                            id="h_area_id_fk" data-validation="required" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php
                                        foreach ($area as $record) {
                                            $selected = '';
                                            if ($record->id == $result['h_area_id_fk']) {
                                                $selected = 'selected';
                                            }
                                            echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> المحافظة <strong class="astric">*</strong>
                                    </label>
                                    <select class="form-control half " disabled
                                            onchange="plases('h_city_id_fk','h_center_id_fk');" name="h_city_id_fk"
                                            id="h_city_id_fk" data-validation="required" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php if (isset($city) && !empty($city) && $city != null) {
                                            foreach ($city as $record) {
                                                $selected = '';
                                                if ($record->id == $result['h_city_id_fk']) {
                                                    $selected = 'selected';
                                                }
                                                echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                                            }
                                        } else {
                                            echo '<option value="" >لا يوحد بيانات مضافة </option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> المركز <strong class="astric">*</strong>
                                    </label>
                                    <select class="form-control half " disabled
                                            onchange="plases('h_center_id_fk','h_village_id_fk');" name="h_center_id_fk"
                                            id="h_center_id_fk" data-validation="required" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php if (isset($centers) && !empty($centers) && $centers != null) {
                                            foreach ($centers as $record) {
                                                $selected = '';
                                                if ($record->id == $result['h_center_id_fk']) {
                                                    $selected = 'selected';
                                                }
                                                echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                                            }
                                        } else {
                                            echo '<option value="" >لا يوحد بيانات مضافة </option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> الحي <strong class="astric">*</strong>
                                    </label>
                                    <select class="form-control half " disabled name="h_village_id_fk"
                                            id="h_village_id_fk" data-validation="required" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php if (isset($village) && !empty($village) && $village != null) {
                                            foreach ($village as $record) {
                                                $selected = '';
                                                if ($record->id == $result['h_village_id_fk']) {
                                                    $selected = 'selected';
                                                }
                                                echo '<option value="' . $record->id . '" ' . $selected . ' >' . $record->title . '</option>';
                                            }
                                        } else {
                                            echo '<option value="" >لا يوحد بيانات مضافة </option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> الحى <strong class="astric">*</strong>
                                    </label>
                                    <input placeholder="إدخل البيانات " type="text" disabled
                                           class=" some_class form-control half input-style" data-validation="required"
                                           name="hai_name" value="<?php echo $result['hai_name'] ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">الشارع <strong class="astric">*</strong>
                                    </label>
                                    <input placeholder="إدخل البيانات " type="text" disabled
                                           class=" some_class form-control half input-style" data-validation="required"
                                           name="h_street" value="<?php echo $result['h_street'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">أقرب مدرسة <strong class="astric">*</strong>
                                    </label>
                                    <input placeholder="إدخل البيانات " type="text" disabled
                                           class=" some_class form-control half input-style" data-validation="required"
                                           name="h_nearest_school" value="<?php echo $result['h_nearest_school'] ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> أقرب معلم <strong class="astric">*</strong>
                                    </label>
                                    <input placeholder="إدخل البيانات " disabled type="text"
                                           class=" some_class form-control half input-style" data-validation="required"
                                           name="h_nearest_teacher" value="<?php echo $result['h_nearest_teacher'] ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">أقرب مسجد <strong class="astric">*</strong>
                                    </label>
                                    <input placeholder="إدخل البيانات " disabled type="text"
                                           class=" some_class form-control half input-style" data-validation="required"
                                           name="h_mosque" value="<?php echo $result['h_mosque'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> نوع السكن <strong class="astric">*</strong>
                                    </label>
                                    <select class="form-control half" disabled name="h_house_type_id_fk"
                                            data-validation="required" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php foreach ($arr_type_house as $x):
                                            $selected = '';
                                            if ($x->id_setting == $result['h_house_type_id_fk']) {
                                                $selected = 'selected';
                                            } ?>
                                            <option
                                                value="<?php echo $x->id_setting ?>" <?php echo $selected ?> ><?php echo $x->title_setting ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">لون المنزل <strong class="astric">*</strong>
                                    </label>
                                    <input placeholder="إدخل البيانات " disabled type="text"
                                           class=" some_class form-control half input-style" data-validation="required"
                                           name="h_house_color" value="<?php echo $result['h_house_color'] ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">اتجاه المنزل <strong
                                            class="astric">*</strong> </label>
                                    <select class="form-control half" disabled name="h_house_direction"
                                            data-validation="required" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php foreach ($arr_direct as $y):
                                            $selected = '';
                                            if ($y->id_setting == $result['h_house_direction']) {
                                                $selected = 'selected';
                                            } ?>
                                            <option
                                                value="<?php echo $y->id_setting ?>" <?php echo $selected ?> ><?php echo $y->title_setting ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">الحالة <strong class="astric">*</strong>
                                    </label>
                                    <select class="form-control half" disabled name="h_house_status_id_fk"
                                            data-validation="required" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php foreach ($house_state as $z):
                                            $selected = '';
                                            if ($z->id_setting == $result['h_house_status_id_fk']) {
                                                $selected = 'selected';
                                            } ?>
                                            <option
                                                value="<?php echo $z->id_setting ?>" <?php echo $selected ?> ><?php echo $z->title_setting ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">عدد الغرف <strong class="astric">*</strong>
                                    </label>
                                    <input placeholder="إدخل البيانات " disabled type="text"
                                           onkeypress="validate_number(event);"
                                           class=" some_class form-control half input-style" data-validation="required"
                                           name="h_rooms_account" value="<?php echo $result['h_rooms_account'] ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">مساحة البناء <strong
                                            class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " disabled type="text"
                                           onkeypress="validate_number(event);"
                                           class=" some_class form-control half input-style" data-validation="required"
                                           name="h_house_size" value="<?php echo $result['h_house_size'] ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">ملكية السكن <strong class="astric">*</strong>
                                    </label>
                                    <select class="form-control half" disabled id="building_type"
                                            name="h_house_owner_id_fk" data-validation="required" aria-required="true"
                                            onchange="getRent();">
                                        <option value="">اختر</option>
                                        <option
                                            value="rent" <?php if ($result['h_house_owner_id_fk'] === 'rent') { ?> selected <?php } ?>>
                                            إيجار
                                        </option>
                                        <?php
                                        foreach ($house_own as $a):
                                            $selected = '';
                                            if ($a->id_setting == $result['h_house_owner_id_fk']) {
                                                $selected = 'selected';
                                            } ?>
                                            <option
                                                value="<?php echo $a->id_setting ?>" <?php echo $selected ?> ><?php echo $a->title_setting ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">إسم المؤجر <strong class="astric">*</strong>
                                    </label>
                                    <input placeholder="إدخل البيانات " disabled type="text"
                                           class=" some_class form-control half input-style" name="h_renter_name"
                                           id="h_renter_name"
                                           value="<?php echo $result['h_renter_name'] ?>" <?php if ($result['h_house_owner_id_fk'] != 'rent') { ?>  disabled<?php } ?> >
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">رقم الجوال <strong
                                            class="astric">*</strong><strong></strong> </label>
                                    <input type="text" name="h_renter_mob" disabled id="h_renter_mob"
                                           onkeyup="chek_length('h_renter_mob');" placeholder="إدخل البيانات "
                                           onkeyup="chek_length('h_renter_mob')" onkeypress="validate_number(event)"
                                           class="form-control half input-style "
                                           value="<?php echo $result['h_renter_mob']; ?>" <?php if ($result['h_house_owner_id_fk'] !== 'rent') { ?>  disabled<?php } ?>/>
                                    <span id="h_renter_mob_span" class="span-validation"> </span>
                                </div>
                                <!--
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">رقم الجوال<strong class="astric">*</strong><strong></strong> </label>
                                    <input type="text" name="h_renter_mob" disabled  id="h_renter_mob" onkeyup="chek_length('h_renter_mob');" placeholder="إدخل البيانات "  onkeypress="validate_number(event)"  class="form-control half input-style "  value="<?php echo $result['h_renter_mob']; ?>"  <?php if ($result['h_house_owner_id_fk'] !== 'rent') { ?>  disabled<?php } ?>/>
                                    <span  id="lenth_mob" class="span-validation"> </span>
                                </div>
                                -->
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">تاريخ بداية العقد<strong
                                            class="astric">*</strong><strong></strong> </label>
                                    <input type="text" name="contract_start_date" disabled id="contract_start_date"
                                           placeholder="إدخل البيانات " class="form-control half input-style docs-date"
                                           value="<?php echo $result['contract_start_date']; ?>" <?php if ($result['h_house_owner_id_fk'] !== 'rent') { ?>  disabled<?php } ?>/>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label label-green  half">تاريخ نهاية العقد<strong
                                            class="astric">*</strong><strong></strong> </label>
                                    <input type="text" name="contract_end_date" disabled id="contract_end_date"
                                           placeholder="إدخل البيانات " class="form-control half input-style docs-date"
                                           value="<?php echo $result['contract_end_date']; ?>" <?php if ($result['h_house_owner_id_fk'] != 'rent') { ?>  disabled<?php } ?>/>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">مقدار الإيجار السنوى <strong
                                            class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " disabled type="text"
                                           onkeypress="validate_number(event);"
                                           class=" some_class form-control half input-style" data-validation="required"
                                           name="h_rent_amount" value="<?php echo $result['h_rent_amount'] ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half"> عدد دورات المياه <strong
                                            class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " type="text" disabled
                                           onkeypress="validate_number(event);"
                                           class=" some_class form-control half input-style" data-validation="required"
                                           name="h_bath_rooms_account"
                                           value="<?php echo $result['h_bath_rooms_account'] ?>">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class=" label label-green  col-xs-6 no-padding">مقترض من البنك العقارى
                                        <strong class="astric">*</strong> </label>
                                    <select class="form-control half col-xs-6 no-padding " disabled
                                            name="h_borrow_from_bank" id="bank" style="border: 1px solid #ccc;"
                                            data-validation="required" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                                            $selected = '';
                                            if ($r == $result['h_borrow_from_bank']) {
                                                $selected = 'selected';
                                            }
                                            ?>
                                            <option
                                                value="<?php echo $r; ?>" <?php echo $selected ?> ><?php echo $arr_yes_no[$r]; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php $dis = "disabled";
                                if ($result['h_borrow_from_bank'] == 1) {
                                    $dis = "";
                                } ?>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">القيمة المتبقية للقرض <strong class="astric">*</strong>
                                    </label>
                                    <input type="text" <?= $dis ?> name="h_borrow_remain" disabled
                                           onkeypress="validate_number(event);"
                                           value="<?php echo $result['h_borrow_remain'] ?>"
                                           class="some_class form-control half input-style"
                                           placeholder="القيمة المتبقية" style="width: 25%;" id="bank-cost">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group col-sm-4">
                                    <label class="label label-green col-xs-6 no-padding">قرض ترميم من بنك التسليف
                                        <strong class="astric">*</strong> </label>
                                    <select class="col-xs-6 no-padding form-control half " disabled="disabled"
                                            name="h_loan_restoration" id="fix" style="border: 1px solid #ccc;"
                                            data-validation="required" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                                            $selected = '';
                                            if ($r == $result['h_loan_restoration']) {
                                                $selected = 'selected';
                                            }
                                            ?>
                                            <option
                                                value="<?php echo $r; ?>" <?php echo $selected ?> ><?php echo $arr_yes_no[$r]; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php $dis = "disabled";
                                if ($result['h_loan_restoration'] == 1) {
                                    $dis = "";
                                } ?>
                                <div class="form-group col-sm-4">
                                    <label class="label label-green  half">القيمة المتبقية <strong
                                            class="astric">*</strong> </label>
                                    <input placeholder="إدخل البيانات " type="text"
                                           onkeypress="validate_number(event);" <?= $dis ?>
                                           name="h_loan_restoration_remain"
                                           value="<?php echo $result['h_loan_restoration_remain'] ?>"
                                           class="some_class form-control half input-style"
                                           placeholder="القيمة المتبقية" style="width: 25%;" id="fix-cost">
                                </div>
                            </div>
                            <!-----------------map--------------->
                            <!--
                            <h4 class=" sub-title col-xs-12">خريطة المنزل</h4>
                            <label class="right main-label col-xs-6 no-padding">تضمين الخريطة  ( قم بتضمين خريطة جوجل هنا  ) <strong class="astric">*</strong> </label>
                            <div class="col-sm-12">
                                <input type="text" name="map" value='<?php echo $result['map'] ?>'
                                       class="form-control col-xs-6 no-padding"/>
                                <?php if ($result['map'] == '') {
                                echo ' <div class="clearfix"></div>
                        <div class="alert alert-danger">    لا يوجد خريطة محفوظة  </div>';
                            } else {
                                echo $result['map'];
                            } ?>
                            </div>
-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">الموقع على الخريطة </label>
                                    <input type="hidden" name="house_google_lng" id="lng"
                                           value="<?php if (isset($result)) echo $result['house_google_lng'] ?>"/>
                                    <input type="hidden" name="house_google_lat" id="lat"
                                           value="<?php if (isset($result)) echo $result['house_google_lat'] ?>"/>
                                    <?php echo $maps['html']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="devices">
                        <div class="panel-body"><br>
                            <?php if (isset($devices) && $devices != null): ?>
                                <table class="table table-bordered" id="tab_logic">
                                    <thead>
                                    <tr class="info">
                                        <th>م</th>
                                        <th style="text-align: center">النوع</th>
                                        <th style="text-align: center">الوصف</th>
                                        <th style="text-align: center">العدد</th>
                                        <th style="text-align: center">الحالة</th>
                                        <th style="text-align: center">ملاحظات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $house_device_status = array('إختر', 'جيد', 'متوسط', 'غير جيد', 'يحتاج');
                                    $a = 1;
                                    foreach ($devices as $row): ?>
                                        <tr>
                                            <td><?php echo $a; ?></td>
                                            <!-- <td><?php echo $row->title_setting; ?> </td>-->
                                            <td><?php echo $row->main_name; ?> </td>
                                            <td><?php echo $row->name; ?> </td>
                                            <td><?php echo $row->d_count ?></td>
                                            <td><?php echo $house_device_status[$row->d_house_device_status_id_fk] ?></td>
                                            <td><?php echo $row->d_note ?></td>
                                        </tr>
                                        <?php $a++; endforeach ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="col-lg-12 alert alert-danger"> لاتوجد أجهزة</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="home_needs">
                        <div class="panel-body"><br>
                            <?php if (isset($home_needs) && $home_needs != null): ?>
                                <table class="table table-bordered" id="tab_logic">
                                    <thead>
                                    <tr class="info">
                                        <th>م</th>
                                        <th style="text-align: center">النوع</th>
                                        <th style="text-align: center">الوصف</th>
                                        <th style="text-align: center">العدد</th>
                                        <th style="text-align: center">ملاحظات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $a = 1;
                                    foreach ($home_needs as $row): ?>
                                        <tr>
                                            <td><?php echo $a; ?></td>
                                            <td><?php echo $row->main_name; ?> </td>
                                            <td><?php echo $row->name; ?> </td>
                                            <td><?php echo $row->h_count ?></td>
                                            <td><?php echo $row->h_note ?></td>
                                        </tr>
                                        <?php $a++; endforeach ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="col-lg-12 alert alert-danger"> لاتوجد إحتياجات للأسرة</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="attach_files">
                        <div class="panel-body"><br>
                            <?php if (isset($attach_files) && !empty($attach_files)) { ?>
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> رقم السجل المدني للأم <strong
                                                class="astric">*</strong> </label>
                                        <input type="number" class="form-control half input-style"
                                               value="<?php if (!empty($mothers_data[0]->mother_national_num_fk)) {
                                                   echo $mothers_data[0]->mother_national_num_fk;
                                               } ?>" readonly="readonly"/>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> إسم الأم <strong
                                                class="astric">*</strong> </label>
                                        <input type="text" class="form-control half input-style"
                                               value="<?php if (!empty($mothers_data[0]->full_name)) {
                                                   echo $mothers_data[0]->full_name;
                                               } ?>" readonly="readonly"/>
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                    <th>م</th>
                                    <th style="text-align: center">تصنيف</th>
                                    <th style="text-align: center">المرفق</th>
                                    </thead>
                                    <tbody id="result_Table">

                                    <?php $x = 1;
                                    foreach ($attach_files as $row) { ?>
                                        <tr>
                                        <td rowspan="<?php echo sizeof($row->sub); ?>"><?php echo $x++ ?></td>
                                        <td rowspan="<?php echo sizeof($row->sub); ?>"><?php echo $row->title_setting; ?> </td>
                                        <?php if (!empty($row->sub)) {
                                            foreach ($row->sub as $row_sub) { ?>
                                                <td>
                                                    <a href="<?php echo base_url() . 'family_controllers/Family/downloads/' . $row_sub->file_attach_name ?>"
                                                       download>
                                                        <i class="fa fa-download" title="تحميل"></i> </a>
                                                    <a data-toggle="modal"
                                                       data-target="#myModal-view-<?= $row_sub->id ?>">
                                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                                                </td>
                                                </tr>
                                                <div class="modal fade" id="myModal-view-<?= $row_sub->id ?>"
                                                     tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img
                                                                    src="<?= base_url() . "uploads/family_attached/" . $row_sub->file_attach_name ?>"
                                                                    width="100%">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">إغلاق
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } // end sub foreach
                                        } else { ?>
                                            <td>--</td>
                                            <td>--</td></tr>

                                        <?php } // end else
                                    } // end main  foreach  ?>
                                    </tbody>
                                </table>
                            <?php } else { // end main if ?>
                                <div class="alert alert-danger">
                                    <strong>لا يوجد ملفات مرفقة !</strong> .
                                </div>
                            <?php } // end main if ?>
                        </div>
                    </div>
                    <!------------- بيانات ماليه -------------->
                    <div class="tab-pane fade" id="money">
                        <div class="panel-body">
                            <?php if (isset($money) && !empty($money)) { ?>
                                <div class="panel-body"><br>
                                    <?php $arr_yes_no = array('', 'نعم', 'لا'); ?>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green  half">رقم السجل المدني للأم<strong
                                                    class="astric">*</strong> </label>
                                            <input type="text" name="mother_national_num_fk" readonly=""
                                                   data-validation="required"
                                                   value="<?php echo $this->uri->segment(4); ?>"
                                                   class="form-control half input-style"/>
                                        </div>
                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label label-green  half">إسم الأم بالكامل<strong
                                                    class="astric">*</strong>
                                            </label>
                                            <input type="text" name="m_first_name" readonly=""
                                                   data-validation="required"
                                                   value="<?php echo $mother_full_name; ?>"
                                                   class="form-control half input-style"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="col-sm-6 col-xs-12">
                                            <h5 class="title-top"> مصادر الدخل</h5>
                                            <?php
                                            $affect_arr = array('لا تؤثر', 'تؤثر');
                                            if (!empty($income_sources)) {
                                                for ($a = 0; $a < sizeof($income_sources); $a++) { ?>
                                                    <div class="col-xs-12" style="margin-bottom: 15px; padding: 0">
                                                        <label class="label label-green "
                                                               style="padding: 3px 35px;"><?php echo $income_sources[$a]->title_setting ?></label>
                                                        <input type="hidden"
                                                               name="finance_income_type_id_income<?php echo $a; ?>"
                                                               value="<?php echo $income_sources[$a]->id_setting; ?>">
                                                        <input type="text" name="value_income<?php echo $a; ?>" disabled
                                                               data-validation="required" value="<?php
                                                        if (!empty($money[$income_sources[$a]->id_setting])) {
                                                            echo $money[$income_sources[$a]->id_setting]->value;
                                                        }
                                                        ?>" onkeypress="validate_number(event);" class="form-control"
                                                               style="  width: 28%;display: inline-block;">
                                                        <?php for ($d = 0; $d < sizeof($affect_arr); $d++) {
                                                            $check = '';
                                                            if (isset($money[$income_sources[$a]->id_setting]) && $money[$income_sources[$a]->id_setting] != '') {
                                                                if ($d == $money[$income_sources[$a]->id_setting]->affect) {
                                                                    $check = 'checked';
                                                                }
                                                            }
                                                            ?>
                                                            <input type="radio" name="affect_income<?php echo $a; ?>"
                                                                   disabled
                                                                   data-validation="required" <?php echo $check; ?>
                                                                   value="<?php echo $d; ?>"
                                                                   style="margin-right: 20px;">
                                                            <label for=""><?php echo $affect_arr[$d]; ?></label>
                                                        <?php } ?>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                        <div class="col-sm-6 col-xs-12">
                                            <h5 class="title-top"> الالتزامات الشهرية</h5>
                                            <?php
                                            if (!empty($monthly_duties)) {
                                                for ($s = 0; $s < sizeof($monthly_duties); $s++) { ?>
                                                    <div class="col-xs-12" style="margin-bottom: 15px; padding: 0">
                                                        <label class="label label-green "
                                                               style="padding: 3px 35px;"><?php echo $monthly_duties[$s]->title_setting ?></label>
                                                        <input type="hidden"
                                                               name="finance_income_type_id_duty<?php echo $s; ?>"
                                                               value="<?php echo $monthly_duties[$s]->id_setting; ?>">
                                                        <input type="text" name="value_duty<?php echo $s; ?>" disabled
                                                               data-validation="required" value="<?php
                                                        if (!empty($money[$monthly_duties[$s]->id_setting])) {
                                                            echo $money[$monthly_duties[$s]->id_setting]->value;
                                                        }
                                                        ?>" onkeypress="validate_number(event);" class="form-control"
                                                               style="  width: 28%;display: inline-block;">
                                                        <?php for ($d = 0; $d < sizeof($affect_arr); $d++) {
                                                            $check = '';
                                                            if (isset($money[$monthly_duties[$s]->id_setting]) && $money[$monthly_duties[$s]->id_setting] != '') {
                                                                if ($d == $money[$monthly_duties[$s]->id_setting]->affect) {
                                                                    $check = 'checked';
                                                                }
                                                            }
                                                            ?>
                                                            <input type="radio" name="affect_duty<?php echo $s; ?>"
                                                                   disabled
                                                                   data-validation="required" <?php echo $check; ?>
                                                                   value="<?php echo $d; ?>"
                                                                   style="margin-right: 20px;">
                                                            <label for=""><?php echo $affect_arr[$d]; ?></label>
                                                        <?php } ?>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } else { ?>
                                <div class="col-lg-12 alert alert-danger">لا توجد بيانات ماليه</div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!---------------- نهاية البيانات المالية ---------->
                    <!-------------------- راي الباحث ----------------------------------->
                    <div class="tab-pane fade" id="research">
                        <div class="panel-body">
                            <br>
                            <div class="col-md-12">
                                <div class="form-group col-sm-6">
                                    <label class="label label-green  half">إسم الام <strong class="astric">*</strong>
                                    </label>
                                    <input type="text" value="<?php echo $mother_data['full_name'] ?>" readonly=""
                                           class="form-control half input-style">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="label label-green  half">رقم السجل المدنى <strong
                                            class="astric">*</strong> </label>
                                    <input type="text" value="<?php echo $mother_national_num ?>" readonly=""
                                           class="form-control half input-style">
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="col-sm-6">
                                    <label class="label label-green  half">هل الام متواجدة</label>
                                    <select disabled="" name="is_mother_present" class="form-control half"
                                            aria-required="true" tabindex="-1" aria-hidden="true">
                                        <option value="">إختر</option>
                                        <?php if (isset($arr_in) && !empty($arr_in) && $arr_in != null) {
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
                                        } else {
                                            echo '<option value="">لا يوجد بيانات مضافة  </option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label label-green  half">إنطباع الام عن الزيارة</label>
                                    <select disabled="" name="mother_impression_visit" class="form-control half"
                                            data-validation="required" aria-required="true" tabindex="-1"
                                            aria-hidden="true">
                                        <option value="">إختر</option>
                                        <?php if (isset($arr_op) && !empty($arr_op) && $arr_op != null) {
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
                                        } else {
                                            echo '<option value="">لا يوجد بيانات مضافة  </option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="col-sm-6">
                                    <label class="label label-green  half">الاهتمام بنظافة المنزل</label>
                                    <select disabled="" name="home_cleaning" class="form-control half"
                                            aria-required="true" tabindex="-1" aria-hidden="true">
                                        <option value="">إختر</option>
                                        <?php for ($x = 1; $x < sizeof($arr_yes_no); $x++):
                                            $selected = '';
                                            if (isset($result_opinion)) {
                                                if ($x == $result_opinion['home_cleaning']) {
                                                    $selected = 'selected';
                                                }
                                            } ?>
                                            <option
                                                value="<?php echo $x ?>" <?php echo $selected; ?> ><?php echo $arr_yes_no[$x]; ?> </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <?php $arr_yes_no = array('', 'نعم', 'لا', 'الي حد ما'); ?>
                                <div class="col-sm-6">
                                    <label class="label label-green  half">الاهتمام بنظافة الابناء</label>
                                    <select disabled="" name="child_cleanliness" class="form-control half"
                                            data-validation="required" aria-required="true" tabindex="-1"
                                            aria-hidden="true">
                                        <option value="">إختر</option>
                                        <?php for ($x = 1; $x < sizeof($arr_yes_no); $x++):
                                            $selected = '';
                                            if (isset($result_opinion)) {
                                                if ($x == $result_opinion['child_cleanliness']) {
                                                    $selected = 'selected';
                                                }
                                            } ?>
                                            <option
                                                value="<?php echo $x ?>" <?php echo $selected; ?> ><?php echo $arr_yes_no[$x]; ?> </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <!-- <div class="col-sm-6">
                                    <label class="label label-green  half">فئة الاسرة</label>
                                    <select   disabled="" name="family_type" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                                        <option value="">إختر </option>
                                        <?php if (isset($arr_type) && !empty($arr_type) && $arr_type != null) {
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
                                } else {
                                    echo '<option value="">لا يوجد بيانات مضافة  </option>';
                                } ?>
                                    </select>
                                </div>
                                -->
                                <div class="col-sm-6">
                                    <label class="label label-green  half">فئة الاسرة</label>
                                    <select name="family_type" class="form-control half" disabled aria-required="true"
                                            tabindex="-1" aria-hidden="true">
                                        <option value="">إختر</option>
                                        <?php if (isset($all_cat) && !empty($all_cat) && $all_cat != null) {
                                            foreach ($all_cat as $z):
                                                $selected = '';
                                                $disabled = 'disabled';
                                                if (isset($all_cat)) {
                                                    if ($z->id == $family_new_cat[0]->category->id) {
                                                        $selected = 'selected';
                                                        $disabled = "";
                                                    }
                                                } ?>
                                                <option
                                                    value="<?php echo $z->id ?>" <?php echo $selected; ?><?php echo $disabled; ?> >
                                                    <?php echo $z->title; ?> </option>
                                            <?php endforeach;
                                        } else {
                                            echo '<option value="">لا يوجد بيانات مضافة  </option>';
                                        } ?>
                                    </select>
                                </div>
                                <?php
                                $one_have = 0;
                                $one_have = (($family_new_cat[0]->all_mother_income - $family_new_cat[0]->all_mother_masrof) / ($family_new_cat[0]->member_num + 1));

                                ?>
                                <div class="form-group col-sm-6">
                                    <label class="label label-green  half">نصيب الفرد </label>
                                    <input type="text" value="<?php echo $one_have ?>"
                                           readonly="" class="form-control half input-style">
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="col-sm-6">
                                    <label class="label label-green  half">مرئيات الباحث</label>
                        <textarea disabled="" name="videos_researcher" class="form-control half" rows="5"
                                  data-validation="required">
                      <?php if (isset($result_opinion['videos_researcher']) && $result_opinion['videos_researcher'] != null) {
                          echo $result_opinion['videos_researcher'];
                      } ?>
                        </textarea>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label label-green  half">مرئيات رئيس قسم شؤون الاسر</label>
                        <textarea disabled="" name="video_family_leader" class="form-control half" rows="5"
                                  data-validation="required">
                              <?php if (isset($result_opinion['video_family_leader']) && $result_opinion['video_family_leader'] != null) {
                                  echo $result_opinion['video_family_leader'];
                              } ?>
                        </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <br/>
                <br/>



            </div>

        </div>


<?php */ ?>






    </div>
</div>

<!----------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------->



<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">الإجراءات المتخذة </h3>
        </div>
        <div class="panel-body">


            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1default" data-toggle="tab">عمليات علي
                        <?php if( $basic[0]->final_suspend == 4){
                            echo 'الملف' ;
                        }else{  echo 'الطلب' ; }  ?>
                    </a></li>
                <li><a href="#tab2default" data-toggle="tab"> تتبع الملف  </a></li>
                <li><a href="#tab3default" data-toggle="tab">قرارات اللجنة </a></li>
                <li><a href="#tab4default" data-toggle="tab"> بيانات صرف الأسر </a></li>
            </ul>

            <div class="panel-body">
                <div class="tab-content">



                    <!----------------------------------------------------------------------------------------->
                    <div class="tab-pane fade in active" id="tab1default">
                        <?php if (isset($all_actions_in_family) && $all_actions_in_family != null){ ?>
                            <div class="col-xs-12 ">
                                <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

                                    <div class="panel-body">
                                        <table class=" display table table-bordered table-striped table-hover">
                                            <tr class="info">
                                                <th>م</th>
                                                <th style="width: 10%;">التاريخ </th>
                                                <th style="width: 15%;">الإجراء المتخذ</th>
                                                <th>القائم بـه</th>
                                                <th style="width: 10%;">التوقيت </th>
                                                <th> الأسباب- الملاحظات</th>


                                            </tr>
                                            <?php
                                            /*
                                            echo '<pre>';
                                            print_r($all_actions_in_family);
                                            echo '<pre>';*/
                                            ?>

                                            <?php

                                            $nnn = 0;
                                            foreach ($all_actions_in_family as $family_act){
                                                $nnn++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $nnn; ?></td>
                                                    <td><?php echo $family_act->date_ar; ?></td>
                                                    <td style="background-color:<?php echo $family_act->process_color;  ?>;"><?php echo $family_act->process_title; ?></td>
                                                    <td><?php echo $family_act->publisher; ?></td>
                                                    <td><?php echo date(" h:i:s A ",$family_act->date_s); ?></td>
                                                    <td><?php echo $family_act->reason; ?></td>


                                                </tr>
                                            <?php } ?>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>


                    <!------------------------------------------------------------------------------------------>










                    <div class="tab-pane fade" id="tab2default">
                        <!-- تحويلات الطلب  ------------------------------->

                        <!---------------- family operations -------------------->
                        <?php if (isset($all_operation) && $all_operation != null){ ?>
                            <div class="col-xs-12 ">
                                <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

                                    <div class="panel-body">
                                        <!--------------------------------------------------------------------------------------------------------->
                                        <table class=" display table table-bordered table-striped table-hover">
                                            <tr class="info">
                                                <th>م</th>
                                                <th>من</th>
                                                <th> الي</th>
                                                <th>التاريخ</th>
                                                <th>الوقت</th>
                                                <th>الاجراءات</th>
                                                <th> ملاحظات</th>
                                            </tr>
                                            <?php $count = 1;
                                            foreach ($all_operation as $row){ ?>
                                                <tr>
                                                    <td><?php echo $count++ ?></td>
                                                    <td> <?php if ($row->role_id_fk_from == 3) {
                                                            echo $row->from_employee;
                                                        } else {
                                                            echo $row->from_user_name;
                                                        } ?>
                                                    </td>
                                                    <td><?php if ($row->role_id_fk_to == 3) {
                                                            echo $row->to_employee;
                                                        } else {
                                                            echo $row->to_user_name;
                                                        } ?></td>
                                                    <td> <?php echo date("Y-m-d", $row->date); ?></td>
                                                    <td> <?php echo date(" H:i:s", $row->date_s) ?></td>
                                                    <td><?php if ($row->transformation_type == 1) {
                                                            echo ' قبول الطلب';
                                                        } elseif ($row->transformation_type == 2) {
                                                            echo 'رفض الطلب';
                                                        } elseif ($row->transformation_type == 3) {
                                                            echo 'تحويل الطلب';
                                                        } elseif ($row->transformation_type == 4) {
                                                            echo 'تفعيل الطلب';
                                                        }elseif ($row->transformation_type == 5) {
                                                            echo 'تحويل إلي اللجنة';
                                                        }elseif ($row->transformation_type == 6) {
                                                            echo 'إعتماد الملف';
                                                        }elseif ($row->transformation_type == 7) {
                                                            echo 'تحويل الملف إلي الباحث';
                                                        } ?>
                                                    </td>
                                                    <td><?php echo $row->transformation_note ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                        <!--------------------------------------------------------------------------------------------------------->

                                    </div>
                                </div>
                            </div>
                        <?php } ?>



                        <!---- نهاية تحويلات الطلب ----------------------->
                    </div>






                    <div class="tab-pane fade" id="tab3default">

                        <div class="col-xs-12 ">
                            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

                                <div class="panel-body">
                                    <?php if(isset($family_lagna_desision) && !empty($family_lagna_desision) ){?>
                                        <table class=" display table table-bordered table-striped table-hover">
                                            <tr class="info">
                                                <th>م</th>
                                                <th>رقم المحضر</th>
                                                <th> التاريخ</th>
                                                <th>عنوان الإجراء</th>
                                                <th>الإجراء الذي تم إتخاذه</th>
                                            </tr>
                                            <?php $x=1; foreach($family_lagna_desision as $row_lagna_desision ){?>
                                                <tr>
                                                    <td><?=$x++;?></td>
                                                    <td><?=$row_lagna_desision->session_num_fk."/".$row_lagna_desision->year?></td>
                                                    <td><?=date("Y-m-d",$row_lagna_desision->date)?></td>
                                                    <td><?=$row_lagna_desision->procedures_option_lagna_title?></td>
                                                    <td><?=$row_lagna_desision->reason_title?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>





 <div class="tab-pane fade" id="tab4default">

                        <div class="col-xs-12 ">
                            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

                                <div class="panel-body">
                                    <?php if(isset($family_sarf) && !empty($family_sarf) ){?>
                                        <table class=" example display table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="greentd">
                                                <th>م</th>
                                                <th>رقم الصرف</th>
                                                <th>اسم بند المساعدة</th>
                                                <th>بتاريخ</th>
                                                <th>قيمة المساعدة</th>
                                                <th>خلال شهر </th>



                                            </tr>

                                            </thead>
                                            <tbody>
                                            <?php
                                            $x=1 ;
                                            $total = 0;
                                             foreach($family_sarf as $row ){
                                                 $total += $row->value;
                                                 ?>
                                                <tr>
                                                    <td><?=$x++;?></td>
                                                    <td><?= $row->sarf_num_fk?></td>
                                                    <td><?php
                                                        if (!empty($row->band_name->title)){
                                                            echo $row->band_name->title;
                                                        } else{
                                                            echo 'غير محدد' ;
                                                        }
                                                        ?></td>
                                                    <td><?php if (!empty($row->sarf->sarf_date_ar)){
                                                            echo $row->sarf->sarf_date_ar;
                                                        } else{
                                                            echo 'غير محدد' ;
                                                        }?></td>
                                                    <td><?php
                                                        if (!empty($row->value)){
                                                            echo $row->value;
                                                        } else{
                                                            echo 'غير محدد' ;
                                                        }?>

                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (!empty($row->sarf_month)){
                                                            echo $row->sarf_month;
                                                        } else{
                                                            echo 'غير محدد' ;
                                                        }
                                                        ?>
                                                    </td>

                                                </tr>
                                            <?php } ?>

                                            </tbody>
                                            <tfoot>
                                              <th colspan="4" style="text-align: center">الاجمالي</th>
                                              <th colspan="2"style="text-align: center" ><?= $total?></th>
                                            </tfoot>



                                        </table>
                                    <?php } else{
                                        ?>
                                        <div class="alert alert-danger">عفوا... لا يوجد بيانات !</div>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>


    </div> </div>




<!----------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------->
<!----------------------------------------------------------------------------------------->
<?php if (isset($button_roles) && !empty($button_roles) && $button_roles != null) { ?>
    <?php
    foreach ($button_roles as $row => $value) {

        ?>

        <div class="modal fade" id="modal-sm-<?= $value->id ?>" tabindex="-1" role="dialog">

            <div class="modal-dialog modal-success " role="document" style="width: 90%">
                <div class="modal-content ">
                    <!--------------------------------------->
                    <div class="modal-header ">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>-->
                        <h1 class="modal-title"><?= $value->title ?></h1>
                    </div>
                    <div class="modal-body ">
                        <?php echo form_open_multipart('TransformationProcess/TransformationOfDetails/' . $value->id . "/" . $file_id); ?>
<?php if ($value->id == 5) { ?>



    <input  type="hidden" name="file_num"  value="<?php echo $basic[0]->file_num;?>"  />
    <input  type="hidden" name="mother_num"  value="<?php echo $file_id;?>"  />
    <input  type="hidden" name="father_name"  value="<?php echo $father->full_name;?>"  />
    <input  type="hidden" name="father_national_id"  value="<?php echo $father->f_national_id;?>"  />


<div class="col-sm-6">
<label class="label label-green  half"> الى اللجنة </label>
<select class="form-control half " name="add_to_lagna_id_fk">
  <!--  <option>اختر</option> -->
    <?php if (isset($all_lagna_to) && $all_lagna_to != null && !empty($all_lagna_to)):
        foreach ($all_lagna_to as $one_lagna): ?>
            <option
                value="<?php echo $one_lagna->id_lagna; ?>"><?php echo $one_lagna->lagna_name; ?></option>
        <?php endforeach; endif; ?>
</select>
</div>
<div class="col-sm-6">
<label class="label label-green  half"> طبيعة التحويل </label>
<select class="form-control half " name="transfer_type_id_fk" id="transfer_type_id_fk" data-validation="required"
        aria-required="true" onchange="GetTransferType($(this).val(),<?php echo $this->uri->segment(4);?>)">
    <option value="">اختر</option>
    <?php $transfer_type_arr =array(1=>'الأسر',2=>'الأفراد');
    for($a=1;$a<=sizeof($transfer_type_arr);$a++){?>
    <option value="<?=$a?>"><?=$transfer_type_arr[$a]?></option>
        <?php } ?>

</select>
</div>
<div class="col-sm-6">
    <label class="label label-green  half"> التوصية </label>
    <select class="form-control half " name="procedure_id_fk"  id="procedure_id_fk" data-validation="required"
            onchange="check_opening_session(<?php echo $value->id;?>)" aria-required="true">
        <option value="">اختر</option>

    </select>
</div>
    <div class="col-sm-12" id="option_transfer_type"></div>
<!--
<div class="col-sm-6">
<label class="label label-green  half"> التوصية </label>
<select class="form-control half " name="procedure_id_fk" data-validation="required"
        aria-required="true">
    <option value="">اختر</option>
    <?php if (isset($procedures_option_lagna) && $procedures_option_lagna != null):
        foreach ($procedures_option_lagna as $one): ?>
            <option
                value="<?php echo $one->id; ?>-<?php echo $one->title; ?>"><?php echo $one->title; ?></option>
        <?php endforeach; endif; ?>
</select>
</div>

<div class="col-sm-6">
<label class="label label-green  half">ملاحظات: </label>
<textarea class="form-control half input-style" rows="3" name="reason"
data-validation="required"></textarea>
</div>
-->


<?php } elseif($value->id == 4 ) { ?>
                            <div class="col-sm-6">
                                <label class="label label-green  half"> رقم الملف </label>
                                <input  type="text" name="filenum" class="form-control half "  value="
                              <?php if($value->id == 4){ echo $myfile_num;
                                }elseif($value->id == 6){
                                    echo $basic[0]->file_num;  } ?>"  readonly/>
                            </div>
                            <div class="col-sm-6">
                                <label class="label label-green  half">الأسباب: </label>
                               <textarea class="form-control half input-style" rows="3"
                                  name="reason"></textarea>
                            </div>
  <?php }elseif($value->id == 6 ){ ?>

                              <div class="col-sm-6">
                                <label class="label label-green  half"> رقم الملف </label>
                                <input  type="text" name="filenum" class="form-control half "  value="
            <?php if($value->id == 4){ echo $myfile_num;
                                }elseif($value->id == 6){
                                    echo $basic[0]->file_num;  } ?>"  readonly/>
                            </div>


    <div class="col-sm-6">
        <label class=" label label-green  half">طبيعة المحور </label>
        <select class="form-control half" data-validation="required"
                aria-required="true" tabindex="-1" aria-hidden="true" name="main_type_id_fk" id="main_type_id"
                onchange="get_sub_typies(this.value);">
            <option value="" >اختر </option>
            <?php
            $arr=array(1=>' الأسر',2=>' الأفراد');
            foreach($arr as $key=>$values){?>
                <option value="<?php echo $key;?>"><?php echo $values;?></option>
            <?php } ?>

        </select>
    </div>
    <div class="col-sm-6">
        <label class="label label-green  half">الحالة: </label>
        <select class="form-control half " name="condition" data-validation="required" aria-required="true" >
            <option value="0">اختر</option>
            <?php if (isset($file_status) && $file_status != null && !empty($file_status)){
                foreach ($file_status as $row){ ?>
                    <option
                        value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                <?php }
            } ?>
        </select>
    </div>

                                   <div class="col-sm-6">
                                        <?php if(!empty($notes)){ $a=0; foreach ($notes as $note){ ?>
                                            <input tabindex="11" value="<?php echo $note->reason;?>" type="radio" id="square-radio-1" name="radio"
                                                   onclick="$('#reason').val($(this).val());">
                                            <label for="square-radio-1"><?php echo $note->reason;?></label><br>
                                            <?php  $a++;} } ?>
                                     </div>

                                     <!--------------------------------------->

                <div class="col-sm-6">
                    <label class="label label-green  half">قرارات اللجنة </label>
                    <select class="form-control half txt2" name="lagna_descision_id_fk" id="option_lagna_desiton">
                        <option value="">إختر طبيعة المحور أولا</option>
                    </select>
                </div>





   <!--------------------------------- ahmed----------------------------------->
<?php if(!empty($last_lagna_desision->transfer_type_id_fk)) {   ?>

    <?php if($last_lagna_desision->transfer_type_id_fk ==1){ ?>


        <table class="table table-bordered" style="width:100%">
            <thead>
            <tr class="info">
                <th style="text-align: center!important;">طبيعة المحور</th>
                <th style="text-align: center!important;">الإجراء</th>
                <th style="text-align: center!important;">حالة الملف</th>
                <th style="text-align: center!important;">سبب الإجراء</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="text-align: center!important;">الملفات(الأسر)</td>
                <td style="text-align: center!important;"><?php echo $last_lagna_desision->procedures_option_lagna_title;?></td>

                <td style="text-align: center!important;background-color: <?=$last_lagna_desision->reason_lagna_data->color?>">
                    <?php echo $last_lagna_desision->reason_lagna_data->title;?></td>
                <td style="text-align: center!important;"><?php echo $last_lagna_desision->title;?></td>

            </tr>
            </tbody>
        </table>

    <?php } elseif($last_lagna_desision->transfer_type_id_fk  ==2){
        $members = $last_lagna_desision->lagna_members;

        $arr = json_decode($last_lagna_desision->person_details, true);

        ?>


        <?php if(isset($members) && $members!=null){ ?>
            <table class="table table-bordered" style="width:100%">
                <thead>
                <tr class="info">
                    <th style="text-align: center!important;">طبيعة المحور</th>
                    <th style="text-align: center!important;">الإجراء</th>
                    <th style="text-align: center!important;">الأفراد</th>
                    <th style="text-align: center!important;">حالة الملف</th>
                    <th style="text-align: center!important;">سبب الإجراء</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td rowspan="<?=sizeof($members)?>" style="text-align: center!important;">الأفراد</td>
                    <td rowspan="<?=sizeof($members)?>" style="text-align: center!important;"><?=$last_lagna_desision->title?></td>
                    <?php
                    $x=0; foreach($members as $record){
                    ?>
                    <td style="text-align: center!important;"><?php  echo$record->member_name;  ?></td>
                    <td style="text-align: center!important;background-color: <?=$record->reason_lagna_data->color?>"><?php  echo$record->reason_lagna_data->title;  ?></td>
                    <td style="text-align: center!important;"><?php  echo$record->procedures_option_lagna_title;  ?></td>
                </tr>
                <?php $x++; } ?>
                </tbody>
            </table>


        <?php } ?>


    <?php } ?>
    <?php  } ?>

     <!------------------------------------ahmed-------------------------------->

  <!--
                            <div class="col-sm-6">
                                <label class="label label-green  half"> رقم الملف </label>
                                <input  type="text" name="filenum" class="form-control half "  value="
            <?php if($value->id == 4){ echo $myfile_num;
                                }elseif($value->id == 6){
                                    echo $basic[0]->file_num;  } ?>"  readonly/>
                            </div>
                            <div class="col-sm-6">
                                <label class="label label-green  half">الأسباب: </label>
        <textarea class="form-control half input-style" rows="3"
                  name="reason" data-validation="required"></textarea>
                            </div>
    <div class="col-sm-6">
        <label class="label label-green  half">الحالة: </label>
        <select class="form-control half " name="condition" data-validation="required" aria-required="true" >
            <option value="0">اختر</option>
            <?php if (isset($file_status) && $file_status != null && !empty($file_status)){
                foreach ($file_status as $row){ ?>
                    <option
                        value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                <?php }
            } ?>
        </select>
    </div>

                                   <div class="col-sm-6">
                                        <?php if(!empty($notes)){ $a=0; foreach ($notes as $note){ ?>
                                            <input tabindex="11" value="<?php echo $note->reason;?>" type="radio" id="square-radio-1" name="radio"
                                                   onclick="$('#reason').val($(this).val());">
                                            <label for="square-radio-1"><?php echo $note->reason;?></label><br>
                                            <?php  $a++;} } ?>
                                     </div>


                <div class="col-sm-6">
                <label class=" label label-green  half">طبيعة المحور </label>
                    <select class="form-control half" data-validation="required"
                    aria-required="true" tabindex="-1" aria-hidden="true" name="main_type_id_fk" id="main_type_id"
                    onchange="get_sub_typies(this.value);">
                    <option value="" >اختر </option>
                    <?php
                    $arr=array(1=>' الأسر',2=>' الأفراد');
                    foreach($arr as $key=>$values){?>
                    <option value="<?php echo $key;?>"><?php echo $values;?></option>
                    <?php } ?>

                    </select>
                </div>
                <div class="col-sm-6">
                    <label class="label label-green  half">قرارات اللجنة </label>
                    <select class="form-control half txt2" name="lagna_descision_id_fk" id="option_lagna_desiton">
                        <option value="">إختر طبيعة المحور أولا</option>
                    </select>
                </div>

    -->


     <!--------------------------------------->

<?php  }elseif($value->id == 3  || $value->id == 7) { ?>
  <div class="col-sm-9">
                            <div class="col-md-4">
                                    <label style="float: right; width: 25%!important;"  class="label " > المسمي الوظيفي </label>
                                    <select name="" class="form-control  selectpicker"
                                            onchange="get_emp_setting(this.value,'<?=$value->id?>');" data-validation="required"
                                            aria-required="true" data-show-subtext="true" data-live-search="true">
                                        <option value="">اختر</option>
                                        <?php if (isset($egraat) && !empty($egraat)) {
                                            foreach ($egraat as $row) {
                                                $selected = "";if($row->id == $edara_id){$selected = 'selected=""';}?>
                                                <option value="<?= $row->id ?>" <?=$selected?> >
                                                    <?= $row->title ?></option>
                                            <?php }
                                        } ?>
                                    </select>

                                </div>
                            <div class="col-md-4">

                                    <label style="float: right; width: 25%!important;"  class="label " > الموظف </label>
                                    <select name="user_to" id="user_to-<?=$value->id?>"
                                         onchange="pass_emp_date(this,'<?=$value->id?>');"
                                         class="form-control  selectpicker"
                                         data-validation="required" aria-required="true" data-show-subtext="true"
                                         data-live-search="true">
                                     <?php if(isset($select_user_edara)&&!empty($select_user_edara)) {?>
                                         <option value="" >اختر</option>
                                         <?php foreach ($select_user_edara as $row_user) {
                                             $out_name=  $row_user->user_name ;
                                             if($row_user->role_id_fk == 3){
                                                 $out_name=  $row_user->employee ;
                                             }?>
                                             <option data-img="<?=$row_user->personal_photo?>" data-job="<?=$row_user->emp_job_title?>"
                                                     value="<?=$row_user->user_id."-".$row_user->role_id_fk."-".$row_user->system_structure_id_fk?>">
                                                 <?=$out_name?></option>
                                         <?php }
                                     }else{
                                         if (isset($depart_id)) {
                                             echo '<option value="">لا يوجد مستخدمين   </option>';
                                         }
                                     }
                                     ?>
                                 </select>


                                </div>
                            <div class="col-md-4">
                                <label style="float: right; width: 25%!important;"  class="label   " > الاجراء </label>
                                <select class="form-control  " name="process_procedure_id_fk"
                                        data-validation="required" aria-required="true">
                                    <option value="">اختر</option>
                                    <?php if (isset($select_process_procedures) && !empty($select_process_procedures)) {
                                        foreach ($select_process_procedures as $row_process_procedures) { ?>
                                            <option
                                                value="<?= $row_process_procedures->id ?>"><?= $row_process_procedures->title ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label style="float: right; width: 25%!important;"  class="label   " >ملاحظات: </label>
        <textarea class="form-control " rows="3" name="reason" data-validation="required"
             ></textarea>
                            </div>
                          </div>
<!--
                          <div class="col-sm-9">
                            <div class="col-sm-12">
                                    <label style="float: right; width: 25%!important;"  class="label label-green " > الإدارة </label>
                                    <select name="" class="form-control half selectpicker"
                                            onchange="get_emp(this.value,'<?=$value->id?>');" data-validation="required"
                                            aria-required="true" data-show-subtext="true" data-live-search="true">
                                        <option value="">اختر</option>
                                        <?php if (isset($adminastration) && !empty($adminastration)) {
                                            foreach ($adminastration as $row_adminastration) {
                                                $selected = "";if($row_adminastration->id == $edara_id){$selected = 'selected=""';}?>
                                                <option value="<?= $row_adminastration->id ?>" <?=$selected?> >
                                                    <?= $row_adminastration->name ?></option>
                                            <?php }
                                        } ?>
                                    </select>

                                </div>
                            <div class="col-sm-12">

                                    <label style="float: right; width: 25%!important;"  class="label label-green " > الموظف </label>
                                    <select name="user_to" id="user_to-<?=$value->id?>"
                                         onchange="pass_emp_date(this,'<?=$value->id?>');"
                                         class="form-control half selectpicker"
                                         data-validation="required" aria-required="true" data-show-subtext="true"
                                         data-live-search="true">
                                     <?php if(isset($select_user_edara)&&!empty($select_user_edara)) {?>
                                         <option value="" >اختر</option>
                                         <?php foreach ($select_user_edara as $row_user) {
                                             $out_name=  $row_user->user_name ;
                                             if($row_user->role_id_fk == 3){
                                                 $out_name=  $row_user->employee ;
                                             }?>
                                             <option data-img="<?=$row_user->personal_photo?>" data-job="<?=$row_user->emp_job_title?>"
                                                     value="<?=$row_user->user_id."-".$row_user->role_id_fk."-".$row_user->system_structure_id_fk?>">
                                                 <?=$out_name?></option>
                                         <?php }
                                     }else{
                                         if (isset($depart_id)) {
                                             echo '<option value="">لا يوجد مستخدمين   </option>';
                                         }
                                     }
                                     ?>
                                 </select>


                                </div>
                            <div class="col-sm-12">
                                <label style="float: right; width: 25%!important;"  class="label label-green  " > الاجراء </label>
                                <select class="form-control half " name="process_procedure_id_fk"
                                        data-validation="required" aria-required="true">
                                    <option value="">اختر</option>
                                    <?php if (isset($select_process_procedures) && !empty($select_process_procedures)) {
                                        foreach ($select_process_procedures as $row_process_procedures) { ?>
                                            <option
                                                value="<?= $row_process_procedures->id ?>"><?= $row_process_procedures->title ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label style="float: right; width: 25%!important;"  class="label label-green  " >ملاحظات: </label>
        <textarea class="form-control half input-style" rows="3" name="reason"
             ></textarea>
                            </div>
                          </div>
                          
  -->                        
                          
                          
                          
                          <div class="col-sm-3">

                                <table class="table table-bordered" style="">
                                    <thead>
                                    <tr>
                                        <td colspan="2">
                                            <img src="<?=base_url()."asisst/fav/apple-icon-120x120.png"?>"
                                                 id="person_photo-<?=$value->id?>" class=" center-block img-responsive"
                                                 onerror="this.src='<?=base_url()."asisst/fav/apple-icon-120x120.png"?>'"
                                                 width="150" height="150" /></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td  style="background-color: #eee;width: 25%; ">الاسم </td>
                                        <td id="name-emp-<?=$value->id?>"></td>
                                    </tr>
                                    <tr>
                                        <td  style="background-color: #eee;width: 25%;">الوظيفة </td>
                                        <td id="jon-title-<?=$value->id?>"></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        <?php  }elseif($value->id == 1  || $value->id == 2) { ?>
                            <div class="col-sm-6">
                                <label class="label label-green  half">ملاحظات: </label>
                                    <textarea class="form-control half input-style" rows="3" name="reason"
                                         data-validation="required"></textarea>
                            </div>
                        <?php } ?>
                        
                                                <!------------------------------------------------------->
                        <?php if($value->id == 1 || $value->id == 2 || $value->id == 4){
                            $arr_names =array(1=>'قبول',2=>'رفض',4=>'تفعيل');
                            if($value->id == 1 ){
                              $reasons = $accept_reasons;
                            }elseif($value->id == 2 ){
                                $reasons= $refuse_reasons;
                            }elseif($value->id == 4){
                                $reasons = $Activate_reasons;
                            }


                            ?>
                            <div class="col-sm-6">
                                <label class="label label-green  half">أسباب <?php echo $arr_names[$value->id];?> الطلب: </label>
                                <select class="form-control half " name="reason_id_fk"
                                        data-validation="required" aria-required="true">
                                    <option value="">اختر</option>
                                    <?php if (isset($reasons) && !empty($reasons)) {
                                        foreach ($reasons as $row) { ?>
                                            <option
                                                value="<?= $row->id_setting ?>-<?= $row->title_setting?>"><?= $row->title_setting ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>

                        <?php  } ?>
                        <!------------------------------------------------------->


                        
                    </div>
                    <br>
                    <div class="modal-footer " style="display: inline-block; width: 100%;">
                        <a type="button" class="btn btn-default" data-dismiss="modal" href="#lost">إغلاق</a>
                        <button type="submit" name="operation" id="operation<?php echo $value->id;?>" value="operation" style="background-color:<?= $value->color ?>; color: black;"
                                class="btn "><?= $value->title ?></button>
                    </div>
                    <div class="col-sm-6">
                            <?php
                            
                            /*
                             if(!empty($notes)){ $a=0; foreach ($notes as $note){ ?>
                                <input tabindex="11" value="<?php echo $note->reason;?>" type="radio" id="square-radio-1" name="radio"
                                       onclick="$('#reason').val($(this).val());">
                                <label for="square-radio-1"><?php echo $note->reason;?></label><br>
                                <?php  $a++;} }
                                */
                                 ?>
                        </div>
                    <?php echo form_close() ?>
                    <!--------------------------------------->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>




    <?php } ?>
<?php } ?>
<!---------------------------------------------------------->
<script type="text/javascript">
    function getVisits(argument, allCount) {
        if (argument) {
            var dataString = 'numbers=' + argument + '&count=' + allCount;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_details/getVisits',
                data: dataString,
                cache: false,
                success: function (html) {
                    $('#resultTable').html(html);
                }
            });
        }
        else {
            $('#resultTable').html('');
        }
    }
</script>
<!--
<script>
    function add_row() {
        $('#disp').hide();
        $('#resultTable').append('<tr class="child"><td><input type="date" data-validation="required" name="visit_date[]"> </td> <td><input data-validation="required" type="text" name="note[]"></td> <td><select data-validation="required"  name="visit_status[]">' +
            '' +
            '<option>اختر</option> <option value = 1> جاري الانتهاء</optionvalue> <option value=2> تم الانتهاء </option> <option value=3> لم ينم الانتهاء </option></select></td> <td><input type="text" data-validation="required" name="researcher_note[]"></td> </tr>');
    }
</script>
-->



<script>
    function add_row() {



        var x = document.getElementById('myTable1');

        var count = x.rows.length;


        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/Family_details/add_record",
            data:{count:count},
            success:function(d){
                $('#disp').hide();
                $('#resultTable').append(d);

            }







        });

    }
</script>

<script>


    function get_length(valu,id)
    {
        var len=valu.length;
        if(len>0)
        {
            $('#visit_status'+id).val(2);

        }else{
            $('#visit_status'+id).val('');

        }
    }
</script>


<script>
    function get_department(id_admin,id_pop) {
        if (id_admin != 0 && id_admin != "") {
            var dataString = "get_depart=" + id_admin;

            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_details/GetDepart',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#departments-"+id_pop).html(html);
                    $("#departments-"+id_pop).selectpicker("refresh");

                }
            });
        }
    }
    //=============================================
    function get_emp(id_depart,id_pop) {
       // alert(id_depart);
        if (id_depart != 0 && id_depart != "") {
            var dataString = "get_emp=" + id_depart;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_details/GetDepart',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#user_to-"+id_pop).html(html);
                    $("#user_to-"+id_pop).selectpicker("refresh");
                }
            });
        }
    }
</script>


<script>
    function pass_emp_date(this_value,table_id) {   //data-img
      var name  = $('option:selected',this_value).text();
      var image = $('option:selected',this_value).attr("data-img");
      var job   = $('option:selected',this_value).attr("data-job");
     // var pass  = "<?php echo base_url()."uploads/images/"?>" ;
       var pass  = "<?php echo base_url()."uploads/human_resources/egraat_settings/"?>" ;
        $("#name-emp-"+table_id).text(name);
        $("#jon-title-"+table_id).text(job);
        $("#person_photo-"+table_id).attr("src",pass + image );

    }



</script>


<script>
    function get_sub_typies(main_type_id){
        var dataString = "main_type_id="+main_type_id;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/LagnaSetting/GetSubTypes',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#option_lagna_desiton").html(html);
            }
        });
        return false;
    }
</script>

<script>

    function GetTransferType(valu,mother_num) {

        //procedure_id_fk
        var data = "type=" + valu;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family_details/GetProcedure',
            data:data,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
                //console.log(JSONObject);
                var  html='<option>إختر </option>';
                for(i=0; i<JSONObject.length ; i++){
                    html +='<option value=" ' + JSONObject[i].id + '-' + JSONObject[i].title + '"> ' + JSONObject[i].title + '</option>';
                }
                $("#procedure_id_fk").html(html);

            }
        });

        if (valu == 2) {
        var dataString = "mother_num="+mother_num;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family_details/GetTransferType',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#option_transfer_type").html(html);
            }
        });
    }else{
            $("#option_transfer_type").html('');
        }
    }
</script>



<!--------------------------------------------------------------->
<script>
    
    
    function check_opening_session(value) {

        var tahweel_type =$('#transfer_type_id_fk').val();
        var twsia =$('#procedure_id_fk').val();
        var file_num =$("input[name=file_num]").val();
        var mother_num =$("input[name=mother_num]").val();

        if (tahweel_type !='' &&   twsia!='' && file_num!='' && mother_num!='') {

            var dataString = 'tahweel_type=' + tahweel_type +'&twsia=' + twsia +'&file_num=' + file_num +'&mother_num='+ mother_num;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/LagnaSetting/check_opening_session',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);


                    if(JSONObject == 1){

                        $("#operation" +value).attr('disabled',true);
                    } else {
                        $("#operation" +value).attr('disabled',false);


                    }

                }
            });
            return false;


        }

        
    }
    
</script>
<script>
    function get_emp_setting(id_depart,id_pop) {
        // alert(id_depart);
        if (id_depart != 0 && id_depart != "") {
          //  var dataString = "get_emp=" + id_depart;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_details/get_emp_setting',
                data: {id:id_depart},
                dataType: 'html',
                cache: false,
                success: function (html) {
                 //   alert(html);
                    console.log(html);
                  //  return;

                    $("#user_to-"+id_pop).html(html);
                    $("#user_to-"+id_pop).selectpicker("refresh");
                }
            });
        }
    }
</script>