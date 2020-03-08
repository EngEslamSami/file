<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script>




<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<style>

    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }

    .form-group {
        margin-bottom: 0px !important;
    }

    .modal-header {
        padding: 5px 15px;
    }

    table .form-control {
        padding: 0px 0px;
        /* height: 26px; */
        font-size: 14px;
    }


    .bootstrap-select.btn-group:not(.input-group-btn), .bootstrap-select.btn-group[class*=col-] {
        width: 100%;
    }


    #check_all_not {
        display: inline-block;
        width: 20px;
        height: 20px;
    }

    .check_all_not {
        display: inline-block;
        width: 20px;
        height: 20px;
    }


    .check_large2 {
        width: 18px;
        height: 18px;
    }

    .check_large {
        width: 18px;
        height: 18px;
    }

    label.checktitle {
        margin-top: -24px;
        display: block;
        margin-right: 24px;
    }


    .table-pd,
    .table-pd > tbody > tr > td,
    .table-pd > tbody > tr > th,
    .table-pd > tfoot > tr > td,
    .table-pd > tfoot > tr > th,
    .table-pd > thead > tr > td,
    .table-pd > thead > tr > th {
        border: 1px solid #ddd;
        padding: 2px 8px;

    }

    .table > thead > tr > th,
    .table > tfoot > tr > th,
    .table > thead > tr > td,
    .table > tfoot > tr > td {
        font-size: 18px;
        font-weight: bold;
    }

    .table > tbody > tr > th,
    .table > tbody > tr > td {

        font-size: 16px;

    }


    @media (min-width: 768px) {
        .modal-dialog {

            margin: 10% auto;
        }

        .col_md_15 {
            width: 15%;
            float: right;
        }

        .col_md_20 {
            width: 20%;
            float: right;
        }

        .col_md_25 {
            width: 25%;
            float: right;
        }

        .col_md_30 {
            width: 30%;
            float: right;
        }

        .col_md_32 {
            width: 32%;
            float: right;
        }

        .col_md_35 {
            width: 35%;
            float: right;
        }

        .col_md_40 {
            width: 40%;
            float: right;
        }

        .col_md_45 {
            width: 45%;
            float: right;
        }

        .col_md_50 {
            width: 50%;
            float: right;
        }

        .col_md_55 {
            width: 55%;
            float: right;
        }

        .col_md_60 {
            width: 60%;
            float: right;
        }

        .col_md_65 {
            width: 65%;
            float: right;
        }

        .col_md_68 {
            width: 68%;
            float: right;
        }

        .col_md_70 {
            width: 70%;
            float: right;
        }

        .col_md_75 {
            width: 75%;
            float: right;
        }

        .col_md_80 {
            width: 80%;
            float: right;
        }

        .col_md_85 {
            width: 85%;
            float: right;
        }

        .col_md_90 {
            width: 90%;
            float: right;
        }

        .col_md_95 {
            width: 95%;
            float: right;
        }

        .col_md_100 {
            width: 100%;
            float: right;
        }
    }

    .modal-body {
        position: relative;
        padding: 5px 15px;
    }

    .modal-footer {
        padding: 5px 15px;
    }

    .fixed-table {
        table-layout: fixed;
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
        float: right;
        display: block;
        width: 100%;
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

    .bootstrap-select > .btn {
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

    /*	.form-control{
            font-size: 15px;
            color: #000;
            border-radius: 4px;
            border: 2px solid #b6d089 !important;
        }*/
    .form-control {
        font-size: 14px;
    }

    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .has-success .form-control {
        border: 2px solid #b6d089;

        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    }

    .has-success .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .tab-content {
       /* margin-top: 15px; */
    }

    .btn-group .dropdown-menu > li > a {
        color: #0f0f0f;
        font-weight: 600;
        padding: 5px 5px;
    }

    .btn-group .dropdown-menu {
        left: 0;
        right: auto;
    }


</style>
<style>
/*************/

</style>



<div class="col-md-12 no-padding">
<div class="col-md-1 col-sm-1 col-xs-2 no-padding aside-tabs">
	<!-- Nav tabs -->
	<div class="speed-links">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#screen-tab1" aria-controls="screen-tab1" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> <p style="float: left;"> إضافة طلب تسجيل</p></a></li>
			<li role="presentation"><a href="#screen-tab2" aria-controls="screen-tab2" role="tab" data-toggle="tab"><i class="fa fa-list"></i> <p style="float: left;"> طلبات الأسر الجديدة </p></a></li>
		
		</ul>
	</div>
</div>
<div class="col-md-11 col-sm-11 no-padding data-screen">
<!-- Tab panes -->
<div class="tab-content">
	<div role="tabpanel" class="tab-pane fade in active" id="screen-tab1">

        <div class="roundedBox">
            <div class="col-xs-12 no-padding">
                <div class="stepwizard itab-2">
        
                    <div class="stepwizard-row setup-panel" data-active="1">
                        <div class="tab tab-1 active stepwizard-step col-xs-4 no-padding ">
                            <a href="#step-1" type="button" class="btn btn-warning obj-tablink"> <span><i
                                            class="fa fa-home"></i> البيانات الأولية <b class="badge">1</b></span></a>
        
                        </div>
                        <div class="tab tab-2 stepwizard-step col-xs-4 no-padding">
                            <a href="#step-2" type="button" class="btn btn-default obj-tablink"> <span><i
                                            class="fa fa-male"></i> بيانات أفراد الأسرة <b class="badge">2</b></span></a>
        
                        </div>
                        <div class="tab tab-3 stepwizard-step col-xs-4 no-padding">
                            <a href="#step-3" type="button" class="btn btn-default obj-tablink"> <span><i
                                            class="fa fa-paperclip"></i> بيانات المرفقات <b class="badge">3</b></span></a>
        
                        </div>
        
        
                    </div>
                </div>
        
                <div class="setup-container">
        
        
                    <div class="setup-content" id="step-1">
                    <br />
                        <?php
        
        
                        if (isset($result) && $result != null) {
                            $button = 'تعديل ';
                            $required = '';
                            $validation = '';
                            $out['input'] = 'UPDTATE';
                            $out['input_title'] = 'تعديل ';
                            $readonly = 'readonly';
                            $f_card_source_name = $f_card_source;
                            $form = form_open_multipart("family_controllers/Family/UpdateNewRegister/" . $result["mother_national_num"], array('id' => 'myform'));
                        } else {
                            $button = 'حفظ';
                            $validation = '';
                            $required = 'required="required"';
                            $readonly = '';
                            $f_card_source_name = '';
                            $out['input'] = 'ADD';
                            $out['input_title'] = 'حفظ ';
                            $form = form_open_multipart("family_controllers/Family/InsertNewRegister", array('id' => 'myform'));
                        } ?>
                        <?php echo $form ?>
        
                        <div class="setup-head col-md-12 no-padding">
                            <div class="col-sm-12  no-padding">
                                <div class="col-sm-6  col-md-3 padding-4  form-group">
                                    <label class="label label-green  ">إسم الأب رباعي </label>
                                    <input type="text" name="full_name" class="form-control  input-style"
                                           placeholder="أدخل البيانات"
                                           value="<?php if (isset($result)) {
                                               echo $result["father_name"];
                                           } ?>" required="required">
                                </div>
        
        
                                <div class="col-sm-6 col-md-2 padding-4 form-group">
                                    <label class="label label-green  ">رقم السجل المدنى للأب </label>
                                    <input type="text" name="father_national_num" maxlength="10"
                                           onkeypress="validate_number(event);check_length_num(this,10,'father_span_num');"
                                           value="<?php if (isset($result)) {
                                               echo $result["father_national_num"];
                                           } ?>"
                                           class="form-control  input-style" placeholder="أدخل البيانات"
                                           required="required">
                                    <span id="father_span_num" style="color: red;"></span>
                                </div>
                                <?php
                                // echo  $f_card_source;
                                //echo '<pre/>'; print_r ($id_source) ;
                                ?>
                                <div class="form-group col-md-1  col-sm-4 col-xs-12 padding-4">
                                    <label class="label label-green  half">مصدر الهوية
        
                                        <strong class="astric">*</strong><strong></strong>
                                    </label>
                                    <select name="f_card_source" id="f_card_source"
                                            class="selectpicker no-padding form-control choose-date form-control half"
                                            data-show-subtext="true" data-live-search="true" required="required"
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
        
                                <div class="col-sm-6 col-md-2 padding-4 form-group">
                                    <label class="label label-green  ">نوع هوية الأم </label>
                                    <select name="national_id_type"
                                            class="selectpicker no-padding form-control choose-date form-control "
                                            data-show-subtext="true" data-live-search="true" required="required"
                                            onchange="GetNationalidType(this.value)"
                                            aria-required="true">
                                        <option value="">اختر</option>
                                        <?php
                                        foreach ($national_id_array as $row2):
                                            $selected = '';
                                            if ($row2->id_setting == $result['national_id_type_mother']) {
                                                $selected = 'selected';
                                            } ?>
                                            <option
                                                    value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> >
                                                <?php echo $row2->title_setting; ?></option>
                                        <?php endforeach; ?>
                                        <option value="0"<?php if (!empty($result)) {
                                            if ($result['national_id_type'] == 0) {
                                                echo 'selected';
                                            }
                                        } ?> >أخري
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-2 padding-4 form-group">
                                    <label class="label label-green  ">رقم هوية الأم</label>
                                    <input type="text" name="mother_national_num" id="mother_national_num" maxlength="10"
                                           onkeypress="validate_number(event);"
                                           value="<?php if (isset($result)) {
                                               echo $result["mother_national_num"];
                                           } ?>"
                                        <?php echo $readonly; ?> disabled="disabled"
                                           id="mother_national_num" onkeyup=""
                                           class="form-control  input-style" placeholder="أدخل البيانات"
                                           required="required">
                                    <span id="result_span_num" style="color: red;"></span>
                                </div>
        
                                <div class="col-sm-6 col-md-2 padding-4 form-group">
                                    <label class="label label-green  ">الحالة الإجتماعية</label>
                                    <select name="marital_status_id_fk" required="required"
                                            class="selectpicker no-padding form-control choose-date form-control "
                                            data-show-subtext="true" data-live-search="true" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php foreach ($marital_status_array as $row6):
                                            $selected = '';
                                            if ($row6->id_setting == $result['marital_status_id_fk_mother']) {
                                                $selected = 'selected';
                                            } ?>
                                            <option value="<?php echo $row6->id_setting; ?>" <?php echo $selected ?> ><?php echo $row6->title_setting; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
        
                            </div>
                            <div class="col-sm-12  no-padding">
        
                                <div class=" col-sm-6  col-md-2 padding-4 form-group">
                                    <label class="label label-green  ">مقر التسجيل ( الفرع )</label>
                                    <select name="register_place"
                                            class="selectpicker no-padding form-control choose-date form-control "
                                            required="required" data-show-subtext="true" data-live-search="true"
                                            aria-required="true">
                                        <option value=""> اختر</option>
                                        <?php
                                        foreach ($socity_branch as $row2):
                                            $selected = '';
                                            if (isset($result)) {
                                                if ($row2->id == $result["register_place"]) {
                                                    $selected = 'selected';
                                                }
                                            } ?>
                                            <option value="<?php echo $row2->id; ?>" <?php echo $selected ?> ><?php echo $row2->title; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class=" col-sm-6  col-md-3 padding-4 form-group">
                                    <label class="label label-green  ">إسم مقدم الطلب رباعى </label>
                                    <input type="text" name="full_name_order" id="full_name_order"
                                           value="<?php if (isset($result)) {
                                               echo $result["full_name_order"];
                                           } ?>"
                                           class="form-control  input-style" placeholder="أدخل البيانات"
                                           required="required">
                                </div>
                                <div class=" col-sm-6  col-md-1 padding-4 form-group">
                                    <label class="label label-green  ">الصلة</label>
                                    <select name="person_relationship" id="person_relationship" required="required"
                                            aria-required="true" data-show-subtext="true" data-live-search="true"
                                            onchange="get_num_fk(this.value);"
                                            class="selectpicker no-padding form-control choose-date form-control">
                                        <option value="">إختر</option>
                                        <option value="41" <?php if (isset($result)) {
                                            if ($result['person_relationship'] == "41") {
                                                echo 'selected';
                                            }
                                        } ?> >(أم)
                                        </option>
                                        <?php if (!empty($relationships)) {
                                            foreach ($relationships as $record) {
                                                $select = '';
                                                if (isset($result)) {
                                                    if ($result['person_relationship'] == $record->id_setting) {
                                                        $select = 'selected';
                                                    }
                                                } ?>
                                                <option value="<?php echo $record->id_setting; ?>" <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
        
        
                                <div class=" col-sm-6  col-md-2 padding-4 form-group">
                                    <label class="label label-green  ">رقم هوية مقدم الطلب </label>
                                    <input type="text" maxlength="10" name="person_national_card" id="person_national_card"
                                           value="<?php if (isset($result)) {
                                               echo $result["person_national_card"];
                                           } ?>"
                                           onkeypress="validate_number(event);"
                                           onkeyup="check_length_num(this,10,'span_card');"
                                           class="form-control  input-style" placeholder="أدخل البيانات"
                                           required="required">
                                    <span id="span_card" style="color: red;"></span>
                                </div>
                                <div class=" col-sm-6  col-md-2 padding-4 form-group">
                                    <label class="label label-green  "> جوال التواصل ( الرسائل) </label>
                                    <input type="text" maxlength="10" name="contact_mob" value="<?php if (isset($result)) {
                                        echo $result["contact_mob"];
                                    } ?>"
                                           onkeypress="validate_number(event);"
                                           onkeyup="check_length_num(this,10,'span_phone');"
                                           class="form-control  input-style" placeholder="أدخل البيانات"
                                           required="required">
                                    <span id="span_phone" style="color: red;"></span>
                                </div>
                                <div class=" col-sm-6  col-md-2 padding-4 form-group">
                                    <label class="label label-green  "> المدينة </label>
                                    <!-- <input type="text" name="full_name_order"  value="<?php // if(isset($result)){ echo $result["full_name_order"];} ?>" class="form-control two_three input-style" placeholder="أدخل البيانات" required="required">
                        --> <select class="form-control  selectpicker" name="center_id_fk" data-show-subtext="true"
                                    data-live-search="true"
                                    required="required" aria-required="true"
                                    onchange="get_sub_select(this.value,'center_option');">
                                        <option value="">اختر</option>
                                        <?php if (isset($all_city) && !empty($all_city)) {
                                            foreach ($all_city as $row_city):
                                                $selected = '';
                                                if (isset($result)) {
                                                    if ($row_city->id == $result['center_id_fk']) {
                                                        $selected = 'selected';
                                                    }
                                                } ?>
                                                <option
                                                        value="<?php echo $row_city->id ?>" <?php echo $selected ?> >
                                                    <?php echo $row_city->title ?></option>
                                            <?php endforeach;
                                        } ?>
                                    </select>
                                </div>
        
                            </div>
                            <div class="col-sm-12  no-padding">
        
                                <div class=" col-sm-6  col-md-2 padding-4 form-group">
                                    <label class="label label-green  "> الحي </label>
                                    <!--  <input type="text" name="full_name_order"  value="<?php // if(isset($result)){ echo $result["full_name_order"];} ?>" class="form-control two_three input-style" placeholder="أدخل البيانات" required="required">
                       -->
                                    <select name="district_id_fk" class="form-control  " id="center_option" name=""
                                            data-show-subtext="true" data-live-search="true"
                                            required="required" aria-required="true">
                                        <option value="">اختر</option>
                                        <?php if (isset($all_district) && !empty($all_district)) {
                                            foreach ($all_district as $row_city):
                                                $selected = '';
                                                if (isset($result)) {
                                                    if ($row_city->id == $result['district_id_fk']) {
                                                        $selected = 'selected';
                                                    }
                                                } ?>
                                                <option value="<?php echo $row_city->id ?>" <?php echo $selected ?> >
                                                    <?php echo $row_city->title ?></option>
                                            <?php endforeach;
                                        } ?>
                                    </select>
                                </div>
                                <!-- yara -->
        
                                <!-- yara -->
                                <div class=" col-sm-6  col-md-1 padding-4 form-group">
                                    <label class="label label-green  ">عدد الذكور
                                    </label>
                                    <input type="text" name="male_number" id="male_number"
                                           onkeypress="validate_number(event)"
                                           required="required" onkeyup="getFamilyNumber();"
                                           value="<?php if (isset($result)) {
                                               echo $result["male_number"];
                                           } ?>" class="form-control  input-style"/>
                                </div>
                                <div class=" col-sm-6  col-md-1 padding-4 form-group">
                                    <label class="label label-green  ">عدد الإناث
                                    </label>
                                    <input type="text" name="female_number" id="female_number"
                                           onkeypress="validate_number(event)"
                                           required="required" onkeyup="getFamilyNumber();"
                                           value="<?php if (isset($result)) {
                                               echo $result["female_number"];
                                           } ?>" class="form-control  input-style"/>
                                </div>
        
                                <div class=" col-sm-2  col-md-1 padding-4 form-group">
                                    <label class="label label-green  ">اجمالي الأفراد
                                    </label>
                                    <input type="text" name="family_members_number" id="family_members_number"
                                           onkeypress="validate_number(event)" required="required" readonly
                                           value="<?php if (isset($result)) {
                                               echo $result["family_members_number"];
                                           } ?>" class="form-control  input-style"/>
                                </div>
        
                                <div class="form-group col-sm-3 padding-4 form-group">
                                    <label class="label label-green  ">مصادر الدخل الشهري </label>
                                    <input class="textbox form-control" type="text" name="retirement"
                                           value="<?php if (isset($result)) {
                                               echo $result["retirement"];
                                           } ?>" placeholder="تقاعد" style="width: 33.33%;float: right;">
                                    <input class="textbox form-control" type="text" name="insurance"
                                           value="<?php if (isset($result)) {
                                               echo $result["insurance"];
                                           } ?>" placeholder="تأمينات" style="width: 33.33%;float: right;">
                                    <input class="textbox4 form-control" type="text" name="guarantee"
                                           value="<?php if (isset($result)) {
                                               echo $result["guarantee"];
                                           } ?>" placeholder="ضمان" style="width: 33.33%;float: right;">
                                </div>
        
        
                                <div class=" col-sm-6  col-md-2 padding-4 form-group">
                                    <label class="label label-green  ">ملكية السكن </label>
                                    <select class="form-control " id="building_type" name="h_house_owner_id_fk"
                                            required="required" aria-required="true" onchange="getRent();">
                                        <option value="">اختر</option>
                                        <option value="rent" <?php if (isset($result)) {
                                            if ($result['h_house_owner_id_fk'] === 'rent') { ?> selected <?php }
                                        } ?>>(إيجار)
                                        </option>
                                        <?php
                                        foreach ($house_own as $a):
                                            $selected = '';
                                            if (isset($result)) {
                                                if ($a->id_setting == $result['h_house_owner_id_fk']) {
                                                    $selected = 'selected';
                                                }
                                            } ?>
                                            <option
                                                    value="<?php echo $a->id_setting ?>" <?php echo $selected ?> ><?php echo $a->title_setting ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
        
                                <div class=" col-sm-6  col-md-2 padding-4 form-group">
                                    <label class="label label-green  ">مقدار الإيجار السنوى </label>
                                    <input placeholder="إدخل البيانات " id="h_rent_amount" type="text"
                                           onkeypress="validate_number(event);" class="  form-control  "
                                           required="required"
                                           name="h_rent_amount" value="<?php if (isset($result)) {
                                        echo $result['h_rent_amount'];
                                    } ?>" <?php if (isset($result)) {
                                        if ($result['h_house_owner_id_fk'] != 'rent') { ?>  disabled<?php }
                                    } ?> >
                                </div>
        
                            </div>
        
                            <div class="col-sm-12  no-padding">
        
                                <!-- <div class=" col_md_30  col-sm-6  col-md-3 padding-4">
                                        <label class="label label-green  col_md_35">الوقت المناسب للتواصل</label>
                                        <input placeholder="إدخل البيانات " id="h_rent_amount" type="time"
                                               class="form-control  input-style" required="required"
                                               name="right_time_from" value="<?php if (isset($result)) {
                                    echo $result['right_time_from'];
                                } else {
                                    echo date("H:i:s");
                                } ?>" style="width: 28%;float: right;">
                                        <input placeholder="إدخل البيانات " id="h_rent_amount" class="form-control  input-style"
                                               type="time" required="required"
                                               name="right_time_to" value="<?php if (isset($result)) {
                                    echo $result['right_time_to'];
                                } else {
                                    echo date("H:i:s");
                                } ?>" style="width: 28%;">
                                    </div> -->
                                <div class=" col-md-3  col-sm-6  col-md-6 padding-4 form-group">
                                    <label class="label label-green  "> الوقت المناسب للتواصل</label>
        
                                    <input placeholder="من" id="m13h" class="form-control  input-style " type="text"
                                           required="required" name="right_time_from"
                                           value="<?php if (isset($result)) {
                                               echo $result['right_time_from'];
                                           } else {
                                               echo "من";
                                           } ?>"
        
                                           style="width: 45%; float: right;margin-left: 10px;    text-align: center;">
                                    <input placeholder="إلى" id="m12h" type="text"
                                           class="form-control  input-style  " required="required"
                                           name="right_time_to"
                                           value="<?php if (isset($result)) {
                                               echo $result['right_time_to'];
                                           } else {
                                               echo "الي";
                                           } ?>"
                                           style="width: 45%; float: right;    text-align: center;">
                                </div>
        <!--
                                <div class=" col-sm-6  col-md-3 padding-4 form-group">
                                    <label class="label label-green  ">إسم المستخدم </label>
                                    <input type="text" name="user_name" class="form-control  input-style"
                                           placeholder="أدخل البيانات"
                                           value="<?php if (isset($result)) {
                                               echo $result["user_name"];
                                           } ?>" required="required">
                                </div>
                                <div class=" col-sm-6  col-md-2 padding-4 form-group">
                                    <label class="label label-green  ">كلمة المرور </label>
                                    <input type="password" name="user_password" onkeyup="valid_pass_length();"
                                           id="user_password" class="form-control  input-style" <?php echo $required ?> />
                                    <span id="validate_length" class="span-validation"> </span>
                                </div>
                                <div class=" col-sm-6  col-md-2 padding-4 form-group">
                                    <label class="label label-green  ">تاكيد كلمة المرور <strong></strong> </label>
                                    <input type="password" id="user_password_copy" onkeyup="return valid_pass_copy();"
                                           class="form-control  input-style" <?php echo $required ?> />
                                    <span id="validate_copy" class="span-validation"> </span>
                                </div>
        -->
        
        
        
         
                            </div>
        
                            <div class="col-sm-12  no-padding">
                           
                           <br />
                                <div class="form-group col-sm-4 padding-4">
                                    <label class="label "></label>
                                    <!-- <input tabindex="11" type="radio" id="square-radio-1"
                            <?php if (isset($result) && $result != null) {
                                        echo "checked";
                                    } else {
                                        echo '';
                                    } ?> style="    width: 24px;height: 24px;" > -->
                                    <div class="skin-square">
                                        <div class="i-check">
                                            <input tabindex="11" type="radio" id="square-radio-1"
                                                   name="square-radio" <?php if (isset($result) && $result != null) {
                                                echo "checked";
                                            } else {
                                                echo '';
                                            } ?>>
                                            <label for="square-radio-1">اوافق على الاقرار</label>
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                             
                        </div>
        
                        <div class="setup-foot col-md-12 no-padding text-center">
                            <input type="hidden" name="<?php echo $out['input'] ?>"
                                   value="<?php echo $out['input'] ?>"/>
                            <button type="button" id="button" class="btn btn-labeled btn-success save-btn"
                            >
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span><?php echo $out['input_title'] ?>
                            </button>
                            <button style="direction: ltr;" class="btn btn-success nextBtn  btn-labeled" type="button"> <span
                                        class="btn-label" style="right: auto;left: -14px;"> <i class="fa fa-backward"
                                                                                               aria-hidden="true"></i>
                                     </span> التالي
                            </button>
                        </div>
                        <?php echo form_close() ?>
        
                    </div>
        
                    <div class="setup-content" id="step-2">
                        <!-------------------------------F_members----------------------------------------->
                        <?php
                        /* echo '<pre>';
                         print_r($all);
                        echo '</pre>';*/
                        if (isset($result) && $result != null) {
                            $button = 'تعديل ';
                            $required = '';
                            $validation = '';
                            $out['input'] = 'UPDTATE';
                            $out['input_title'] = 'إضافة فرد  ';
                            $readonly = 'readonly';
                            $span = '';
                            $disabled = '';
                            $f_card_source_name = $f_card_source;
                            //  $birth_date_m = $birth_date_m;
                            // $birth_date_h = $birth_date_h;
                            $form = form_open_multipart("family_controllers/Family/Update_mem/" . $result["mother_national_num"]);
                        } else {
                            $button = 'حفظ';
                            $validation = '';
                            $required = 'required="required"';
                            $readonly = '';
                            $f_card_source_name = '';
                            $birth_date_m = '';
                            $birth_date_h = '';
                            $out['input'] = 'ADD';
                            $out['input_title'] = 'إضافة فرد ';
                            $span = '<span  class="label-danger"> عذرا...  لا يمكنك إضافة بيانات افراد الاسره  بدون تسجيل بيانات الاسره الاساسيه </span>';
                            $disabled = 'disabled';
                            $form = form_open_multipart("family_controllers/Family/Insert_mem");
        
                        }
        
                        ?>
                        <?php //echo $form ?>
                        
                        <div class="setup-head col-md-12 no-padding">
        <br />
                            <div class="col-sm-12 no-padding">
                                <?php
        
                                if (isset($all) && $all->person_relationship == 41 && empty($mother_added)) {
        
                                    ?>
                                    <div class="col-sm-6  col-md-3 padding-4 form-group">
                                        <label class="label label-green  ">الإسم </label>
                                        <input type="text" class="form-control" name="member_full_name[]" id="member_full_name"
                                               required="required" value="<?php echo $all->full_name_order; ?>">
                                    </div>
                                    <div class="col-sm-6 col-md-1 padding-4 form-group">
                                        <label class="label label-green  ">الصلة </label>
                                        <select name="member_relationship[]" id="member_relationship1"
                                                required="required" class=" form-control" onchange="gender_select(1)">
        
        
                                            <option value="<?php echo $all->person_relationship; ?>"
                                            ><?php if ($all->person_relationship == 41) {
                                                    echo 'ام';
                                                } ?></option>
        
                                        </select>
                                    </div>
                                    <div class="col-sm-6  col-md-1 padding-4  form-group">
                                        <label class="label label-green  ">الجنس </label>
                                        <select name="member_gender[]" id="member_gender1" required="required"
                                                class=" form-control">
        
        
                                            <option value="<?= $all->person_relationship ?>"><?php if ($all->person_relationship == 41) {
                                                    echo 'انثي';
                                                } ?></option>
        
        
                                        </select>
                                    </div>
                                    <div class="col-sm-6  col-md-2 padding-4  form-group">
                                        <label class="label label-green  ">الهوية </label>
                                        <input type="text" name="member_card_num[]" id="member_card_num"
                                               required="required" value="<?php echo $all->mother_national_num; ?>"
                                               onkeyup="check_length_num(this,'10','member_card_num_span')" maxlength="10"
                                               onkeypress="validate_number(event)"
                                               class="form-control "/>
                                    </div>
        
                                <?php } else { ?>
                                    <div class="col-sm-6  col-md-3 padding-4  form-group">
                                        <label class="label label-green  ">الإسم </label>
                                        <input type="text" class="form-control" name="member_full_name[]"
                                               id="member_full_name" required="required">
                                    </div>
        
        
                                    <div class="col-sm-6 col-md-1 padding-4 form-group">
                                        <label class="label label-green  ">الصلة </label>
                                        <?php
                                        $members = array(
                                            '42' => 'ابن',
                                            '43' => 'ابنه'
                                        );
                                        ?>
                                        <select name="member_relationship[]" id="member_relationship1"
                                                required="required" class=" form-control"
                                                onchange="gender_select(1)">
        
        
                                            <option value="">إختر</option>
                                            <?php
                                            foreach ($members as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"
                                                ><?php echo $value; ?></option>
                                            <?php } ?>
        
                                        </select>
        
                                    </div>
                                    <div class="col-sm-6  col-md-1 padding-4  form-group">
                                        <label class="label label-green  ">الجنس </label>
                                        <?php $member_gender = array(
                                            '1' => 'ذكر',
                                            '2' => 'انثي'
        
                                        );
                                        ?>
        
                                        <select name="member_gender[]" id="member_gender1" required="required"
                                                class=" form-control">
                                            <option value="">إختر</option>
                                            <?php
                                            foreach ($member_gender as $key => $value) {
                                                ?>
                                                <option value="<?= $key ?>"><?= $value ?></option>
                                            <?php } ?>
        
        
                                        </select>
        
                                    </div>
                                    <div class="col-sm-6  col-md-2 padding-4  form-group">
                                        <label class="label label-green  ">الهوية </label>
                                        <input type="text" name="member_card_num[]" id="member_card_num"
                                               required="required"
                                               onkeyup="check_length_num(this,'10','member_card_num_span')" maxlength="10"
                                               onkeypress="validate_number(event)"
                                               class="form-control "/>
                                    </div>
                                <?php } ?>
        
                                <div class="col-sm-6  col-md-2 padding-4  form-group">
                                    <label class="label label-green  ">مصدر الهويه </label>
                                    <select name="member_card_source[]" id="m_card_source" required="required"
                                            class=" form-control " value="<?php echo $all->agent_card_source; ?>">
                                        <option value="">إختر</option>
                                        <?php if (!empty($id_source)) {
                                            foreach ($id_source as $record) {
                                                $select = '';
                                                ?>
                                                <option value="<?php echo $record->id_setting; ?>" <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
        
                                <!-- yara -->
                                <div class="form-group col-md-3  col-sm-6 padding-4">
        
                                    <label class="label text-center">
                                        <img style="width: 18px;float: right;"
                                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                        تاريخ الميلاد
                                        <img style="width: 18px;float: left;"
                                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                    </label>
        
                                    <div id="cal-2" style="width: 50%;float: right;">
                                        <input id="date-Hijri" name="birth_date_h[]" class="form-control bottom-input "
                                               required="required"
                                               type="text" onfocus="showCal2();"
                                               onchange="GetAge($(this).val(),1);"
                                               style=" width: 100%;float: right"/>
        
                                    </div>
        
        
                                    <div id="cal-1" style="width: 50%;float: left;">
                                        <input id="date-Miladi" name="birth_date_m[]" class="form-control bottom-input  "
                                               required="required" onchange="GetAge($(this).val(),1);"
                                               type="text" onfocus="showCal1();" style=" width: 100%;float: right"/>
        
                                    </div>
                                </div>
                                <input type="hidden" name="categoriey_member[]" id="categoriey_member1"
                                       class=" form-control  "/>
                                <input class=" form-control  " type="hidden" name="age[]" id="myage1" readonly/>
        
                                <!-- yara -->
                                <!--<div class="col-sm-6  col-md-3 padding-4  form-group">
                                    <label class="label label-green  "> العمر </label>
                                    <input  class=" form-control  " type="hidden" name="age[]" id="myage1" readonly/>
                                </div>
                                <div class="col-sm-6  col-md-3 padding-4  form-group">
                                    <label class="label label-green  "> التصنيف </label>
                                    <div id="categoriey_member_div1"></div>
                                    <input type="hidden" name="categoriey_member[]" id="categoriey_member1"
                                           class=" form-control  "/>
                                </div>-->
        
        
                            </div>
                            <div id="member_data">
                                <div class="padding-4 col-md-12">
                                    <br>
                                    <table class="table table-striped table-bordered fixed-table " <?php if (empty($family_members) && empty($mother_data)) { ?>
                                        style="table-layout: fixed; "  <?php } ?> id="mytable">
                                        <thead>
                                        <tr class="info">
                                            <th style="width: 50px" class="text-center">م</th>
                                            <th style="width: 25%;" class="text-center"> الإسم</th>
                                            <th style="width: 80px" class="text-center">الصلة</th>
                                            <th style="width: 50px"  class="text-center"> الجنس</th>
                                            <th style="width: 115px" class="text-center"> رقم الهوية</th>
                                            <th class="text-center" style="width: 120px"> مصدر الهوية</th>
                                            <th class="text-center" style="width: 100px"> تاريخ الميلاد</th>
                                            <th style="width: 65px"  class="text-center"> العمر</th>
                                            <th class="text-center"> التصنيف</th>
                                            <th class="text-center"> الإجراء</th>
                                        </tr>
                                        </thead>
                                        <tbody id="resultTable">
        
        
                                        <?php
                                        $s = 1;
                                        /*****************************************************************/
                                        if (isset($mother_data) && !empty($mother_data)) {
                                            ?>
                                            <tr id="<?= $s ?>">
                                                <td style="text-align: center !important;"><?= $s ?></td>
                                                <td style="width:15%; text-align: center !important;">
        
        
                                                    <?= $mother_data->full_name ?></td>
        
                                                <td style=" width:15%; text-align: center !important;">
                                                    <?php
                                                    $members = array(
                                                        41 => 'أم',
                                                        42 => 'ابن',
                                                        43 => 'ابنه'
                                                    );
        
                                                    ?>
                                                    <?php
        
                                                    foreach ($members as $key => $value) {
                                                        if ($mother_data->m_relationship == $key) {
                                                            echo $value;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td style="width:15%; text-align: center !important;">
        
                                                    <?php $gender_arr = array('', 'ذكر', 'أنثى');
                                                    for ($a = 1; $a < sizeof($gender_arr); $a++) {
                                                        $select = '';
                                                        if ($a == $mother_data->m_gender) {
                                                            echo $gender_arr[$a];
                                                        }
                                                    } ?>
                                                    </select>
                                                </td>
        
                                                <td style="width:15%; text-align: center !important;">
                                                    <?= $mother_data->mother_national_num_fk ?>
                                                </td>
                                                <td style="width:15%;">
        
                                                    <?php if (!empty($id_source)) {
                                                        foreach ($id_source as $record_source) {
                                                            $select = '';
                                                            if ($record_source->id_setting == $mother_data->m_card_source) {
                                                                echo $record_source->title_setting;
                                                            }
                                                        }
                                                    } ?>
                                                </td>
        
        
                                                <td style="width:15%; text-align: center !important;">
                                                    <?= $mother_data->m_birth_date_hijri ?>
                                                </td>
                                                <td style="width:10%; text-align: center !important;">
                                                    <?php if (!empty($mother_data->m_birth_date_hijri)) {
                                                        $hijri_date = explode('/', $mother_data->m_birth_date_hijri);
                                                        $age = $current_year - $hijri_date[2];
                                                    } else {
                                                        $age = '';
                                                    } ?>
                                                    <?php echo($age); ?></td>
                                                <td style="width:15%; text-align: center !important;">
                                                    أرملة
        
                                                </td>
        
                                                <td style="">
                                                    <a type="button" class="" data-toggle="modal"
                                                       data-target="#editMotherModal">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    </a>
        
                                                    <a onclick=' swal({
                                                            title: "هل انت متأكد من الحذف ؟",
                                                            text: "",
                                                            type: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonClass: "btn-danger",
                                                            confirmButtonText: "حذف",
                                                            cancelButtonText: "إلغاء",
                                                            closeOnConfirm: true
                                                            },
                                                            function(){
                                                            swal("تم الحذف!", "", "success");
                                                            setTimeout(function(){window.location="<?php echo base_url() . 'family_controllers/Family/DeleteMember/' . $mother_data->id . "/" . $result["mother_national_num"] ?>/mother";}, 500);
                                                            });'>
                                                        <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a></td>
                                            </tr>
        
                                            <?php $s++;
                                        }
                                        if (!empty($family_members)) {
        
        
                                            /********************************************************************/
                                            foreach ($family_members as $row) { ?>
        
                                                <tr id="<?= $s ?>">
                                                    <td style="text-align: center!important;"><?= $s ?></td>
                                                    <td style="width:15%;text-align: center!important;">
                                                        <?= $row->member_full_name ?></td>
                                                    <td style=" width:15%;text-align: center!important;">
                                                        <?php
                                                        $members = array(
                                                            41 => 'أم',
                                                            42 => 'ابن',
                                                            43 => 'ابنه'
                                                        );
        
                                                        ?>
        
                                                        <?php
        
                                                        foreach ($members as $key => $value) {
                                                            if ($row->member_relationship == $key) {
                                                                echo $value;
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="width:15%;text-align: center!important;">
        
                                                        <?php $gender_arr = array('', 'ذكر', 'أنثى');
                                                        for ($a = 1; $a < sizeof($gender_arr); $a++) {
                                                            $select = '';
                                                            if ($a == $row->member_gender) {
                                                                echo $gender_arr[$a];
                                                            }
                                                        } ?>
                                                        </select>
                                                    </td>
                                                    </td>
                                                    <td style="width:15%;text-align: center!important;">
                                                        <?= $row->member_card_num ?>
        
                                                    </td>
        
                                                    <td>
        
                                                        <?php if (!empty($id_source)) {
                                                            foreach ($id_source as $record_source) {
                                                                $select = '';
                                                                if ($record_source->id_setting == $row->member_card_source) {
                                                                    echo $record_source->title_setting;
                                                                }
                                                            }
                                                        } ?>
                                                        </select>
                                                    </td>
        
                                                    <td style="width:15%;text-align: center!important;">
        
                                                        <?= $row->member_birth_date_hijri ?></td>
                                                    <td style="width:15%;text-align: center!important;">
                                                        <?php if (isset($row->age)) {
                                                            echo $row->age;
                                                        } ?></td>
                                                    <td style="width:15%;text-align: center!important;"
                                                        id="categoriey_member_div<?= $s ?>">
                                                        <?php if (!empty($row->tasnef['tasnef_title'])) {
                                                            echo $row->tasnef['tasnef_title'];
                                                        } else {
                                                            echo 'غير محدد';
                                                        } ?>
        
                                                    </td>
        
                                                    <td style="">
                                                        <a type="button" class="" data-toggle="modal"
                                                           data-target="#editMemberModal<?= $row->id ?>">
                                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        </a>
        
                                                        <a onclick=' swal({
                                                                title: "هل انت متأكد من الحذف ؟",
                                                                text: "",
                                                                type: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonClass: "btn-danger",
                                                                confirmButtonText: "حذف",
                                                                cancelButtonText: "إلغاء",
                                                                closeOnConfirm: true
                                                                },
                                                                function(){
                                                                swal("تم الحذف!", "", "success");
                                                                setTimeout(function(){window.location="<?php echo base_url() . 'family_controllers/Family/DeleteMember/' . $row->id . "/" . $result["mother_national_num"] ?>/f_members";}, 500);
                                                                });'>
                                                            <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a></td>
                                                </tr>
        
                                                <?php $s++;
                                            }
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
        
                                <!-- 1-8-om -->
        
        
                                <!-- 1-8-om -->
                                <?php if (!empty($family_members)) {
                                    $s = 1;
                                    foreach ($family_members as $member) { ?>
                                        <div class="modal fade" id="editMemberModal<?= $member->id ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document" style="width: 90%">
                                                <div class="modal-content">
                                                    <?php echo form_open_multipart('family_controllers/Family/UpdateNewMember/' . $member->mother_national_num_fk . "/" . $member->id); ?>
        
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                                style="position: absolute;left: 10px; top: 14px;">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
        
                                                    <div class="modal-body">
        
                                                        <table class="table table-bordered">
                                                            <thead class="green_background">
                                                            <tr class="info">
                                                                <th class="text-center"> الإسم</th>
                                                                <th class="text-center">الصلة</th>
                                                                <th class="text-center"> الجنس</th>
                                                                <th class="text-center"> الهوية</th>
                                                                <th class="text-center"> مصدر الهويه</th>
                                                                <th class="text-center"> تاريخ الميلاد</th>
                                                                <th class="text-center"> العمر</th>
                                                                <th class="text-center"> التصنيف</th>
        
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $Classification = array(1 => 'أرمل', 2 => 'يتيم', 3 => 'مستفيد بالغ'); ?>
                                                            <tr id="">
        
                                                                <td style="width:18%;text-align: center!important;">
                                                                    <input type="text" class="form-control"
                                                                           value="<?= $member->member_full_name ?>"
                                                                           name="member_full_name"
                                                                           onload="this.attr('id', 'member_full_name'+getId(this));"
                                                                           data-validation="required"></td>
        
                                                                <td style=" width:8%;text-align: center!important;">
                                                                    <?php
                                                                    $members = array(
                                                                        '41' => 'أم',
                                                                        '42' => 'ابن',
                                                                        '43' => 'ابنه'
                                                                    );
                                                                    ?>
                                                                    <select name="member_relationship"
                                                                            id="member_relationship<?= $member->id ?>"
                                                                            data-validation="required" class=" form-control"
                                                                            onchange="gender_select(<?php echo $member->id; ?>)">
                                                                        <option value="">إختر</option>
                                                                        <?php
                                                                        foreach ($members as $key => $value) {
                                                                            $select = '';
                                                                            if ($key == $member->member_relationship) {
                                                                                $select = 'selected';
                                                                            }
                                                                            ?>
                                                                            <option <?php echo $select; ?>
                                                                                    value="<?php echo $key; ?>"
                                                                            ><?php echo $value; ?></option>
                                                                        <?php } ?>
                                                                    </select></td>
                                                                <td style="width:15%;text-align: center!important;">
                                                                    <?php $member_gender = array(
                                                                        '1' => 'ذكر',
                                                                        '2' => 'انثي'
                                                                    );
                                                                    ?>
        
        
                                                                    <select name="member_gender"
                                                                            id="member_gender<?= $member->id ?>"
                                                                            data-validation="required" class=" form-control">
                                                                        <option value="">إختر</option>
                                                                        <?php
                                                                        foreach ($member_gender as $key => $value) {
                                                                            $select = '';
                                                                            if ($key == $member->member_gender) {
                                                                                $select = 'selected';
                                                                            }
                                                                            ?>
                                                                            <option <?php echo $select; ?>
                                                                                    value="<?= $key ?>"><?= $value ?></option>
                                                                        <?php } ?>
        
        
                                                                    </select>
                                                                </td>
                                                                <td style="width:15%;text-align: center!important;">
                                                                    <input type="text" name="member_card_num"
                                                                           value="<?= $member->member_card_num ?>"
                                                                           id="member_card_num<?= $member->id ?>"
                                                                           data-validation="required"
                                                                           onkeyup="check_length_num(this,'10','member_card_num_span')"
                                                                           maxlength="10"
                                                                           onkeypress="validate_number(event)"
                                                                           class="form-control "/>
                                                                    <small id="member_card_num_span"
                                                                           class="span-validation"></small>
                                                                </td>
                                                                <td style="width:10%;text-align: center!important;">
                                                                    <select name="member_card_source" id="m_card_source"
                                                                            data-validation="required" class=" form-control "
                                                                            style="wi">
                                                                        <option value="">إختر</option>
                                                                        <?php if (!empty($id_source)) {
                                                                            foreach ($id_source as $record_source) {
                                                                                $select = '';
                                                                                if ($record_source->id_setting == $member->member_card_source) {
                                                                                    $select = 'selected';
                                                                                }
                                                                                ?>
                                                                                <option value="<?php echo $record_source->id_setting; ?>" <?php echo $select; ?>><?php echo $record_source->title_setting; ?></option>
                                                                            <?php }
                                                                        } ?>
                                                                    </select>
                                                                </td>
        
                                                                <td style="width:25%;text-align: center!important;">
                                                                    <div class="form-group ">
        
                                                                        <label class="label text-center">
                                                                            <img style="width: 18px;float: right;"
                                                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                                                            تاريخ الميلاد
                                                                            <img style="width: 18px;float: left;"
                                                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                                                        </label>
        
                                                                        <div id="cal-2<?= $member->id ?>"
                                                                             style="width: 50%;float: right;">
                                                                            <input id="date-Hijri<?= $member->id ?>"
                                                                                   name="birth_date_h"
                                                                                   class="form-control bottom-input "
                                                                                   data-validation="required"
                                                                                   type="text"
                                                                                   onfocus="showCal2<?= $member->id ?>();"
                                                                                   onchange="GetAge($(this).val(),<?= $member->id ?>);"
                                                                                   style=" width: 100%;float: right"/>
        
                                                                        </div>
        
        
                                                                        <div id="cal-1<?= $member->id ?>"
                                                                             style="width: 50%;float: left;">
                                                                            <input id="date-Miladi<?= $member->id ?>"
                                                                                   name="birth_date_m"
                                                                                   class="form-control bottom-input  "
                                                                                   data-validation="required"
                                                                                   onchange="GetAge($(this).val(),<?= $member->id ?>);"
                                                                                   type="text"
                                                                                   onfocus="showCal1<?= $member->id ?>();"
                                                                                   style=" width: 100%;float: right"/>
        
                                                                        </div>
                                                                    </div>
                                                                </td>
        
                                                                <td style="width:5%;text-align: center!important;">
                                                                    <input class=" form-control  "
                                                                           value="<?php if (isset($member->age)) {
                                                                               echo $member->age;
                                                                           } ?>" type="text" name="age"
                                                                           id="myage<?php echo $member->id; ?>" size="60" readonly/>
                                                                </td>
                                                                <td style="width:15%;text-align: center!important;">
                                                                    <div id="categoriey_member_div<?= $member->id ?>"> <?php if (isset($Classification[$member->categoriey_member]) && !empty($Classification[$member->categoriey_member])) {
                                                                            echo $Classification[$member->categoriey_member];
                                                                        } ?> </div>
        
                                                                    <input type="hidden" name="categoriey_member"
                                                                           value="<?= $member->categoriey_member ?>"
                                                                           id="categoriey_member<?php echo $member->id; ?>"/>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" name="UPDTATE_member" class="btn btn-blue btn-close"
                                                               value="حفظ">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق
                                                        </button>
        
                                                    </div>
                                                    <?php echo form_close(); ?>
                                                </div>
                                            </div>
                                        </div>
        
                                        <script>
        
                                            var loop1<?= $member->id ?> = 0;
                                            var cal1<?= $member->id ?> = new Calendar(),
                                                cal2<?= $member->id ?> = new Calendar(true, 0, true, true),
                                                date1<?= $member->id ?> = document.getElementById('date-Miladi<?= $member->id ?>'),
                                                date2<?= $member->id ?> = document.getElementById('date-Hijri<?= $member->id ?>'),
                                                cal1Mode<?= $member->id ?> = cal1<?= $member->id ?>.isHijriMode(),
                                                cal2Mode<?= $member->id ?> = cal2<?= $member->id ?>.isHijriMode();
        
        
                                            date1<?= $member->id ?>.setAttribute("value", cal1<?= $member->id ?>.getDate().getDateString());
                                            date2<?= $member->id ?>.setAttribute("value", cal2<?= $member->id ?>.getDate().getDateString());
        
                                            document.getElementById('cal-1<?= $member->id ?>').appendChild(cal1<?= $member->id ?>.getElement());
                                            document.getElementById('cal-2<?= $member->id ?>').appendChild(cal2<?= $member->id ?>.getElement());
        
        
                                            cal1<?= $member->id ?>.show();
                                            cal2<?= $member->id ?>.show();
                                            setDateFields1<?= $member->id ?>();
        
        
                                            cal1<?= $member->id ?>.callback = function () {
                                                if (cal1Mode<?= $member->id ?> !== cal1<?= $member->id ?>.isHijriMode()) {
                                                    cal2<?= $member->id ?>.disableCallback(true);
                                                    cal2<?= $member->id ?>.changeDateMode();
                                                    cal2<?= $member->id ?>.disableCallback(false);
                                                    cal1Mode<?= $member->id ?> = cal1<?= $member->id ?>.isHijriMode();
                                                    cal2Mode<?= $member->id ?> = cal2<?= $member->id ?>.isHijriMode();
                                                } else
        
                                                    cal2<?= $member->id ?>.setTime(cal1<?= $member->id ?>.getTime());
                                                setDateFields1<?= $member->id ?>();
                                            };
        
                                            cal2<?= $member->id ?>.callback = function () {
                                                if (cal2Mode<?= $member->id ?> !== cal2<?= $member->id ?>.isHijriMode()) {
                                                    cal1<?= $member->id ?>.disableCallback(true);
                                                    cal1<?= $member->id ?>.changeDateMode();
                                                    cal1<?= $member->id ?>.disableCallback(false);
                                                    cal1Mode<?= $member->id ?> = cal1<?= $member->id ?>.isHijriMode();
                                                    cal2Mode<?= $member->id ?> = cal2<?= $member->id ?>.isHijriMode();
                                                } else
        
                                                    cal1<?= $member->id ?>.setTime(cal2<?= $member->id ?>.getTime());
                                                setDateFields1<?= $member->id ?>();
                                            };
        
        
                                            cal1<?= $member->id ?>.onHide = function () {
                                                cal1<?= $member->id ?>.show(); // prevent the widget from being closed
                                            };
        
                                            cal2<?= $member->id ?>.onHide = function () {
                                                cal2<?= $member->id ?>.show(); // prevent the widget from being closed
                                            };
        
                                            function setDateFields1<?= $member->id ?>() {
                                                if (loop1<?= $member->id ?> === 0) {
                                                    <?php if (isset($member->member_birth_date_hijri) && !empty($member->member_birth_date_hijri)) {  ?>
                                                    loop1<?= $member->id ?>++;
                                                    date1<?= $member->id ?>.value = '<?=$member->member_birth_date?>';
                                                    date2<?= $member->id ?>.value = '<?=$member->member_birth_date_hijri?>';
        
                                                    <?php }else{ ?>
                                                    date1<?= $member->id ?>.value = cal1<?= $member->id ?>.getDate().getDateString();
                                                    date2<?= $member->id ?>.value = cal2<?= $member->id ?>.getDate().getDateString();
                                                    // GetAge(date2.value,1);
                                                    <?php  } ?>
                                                } else {
                                                    date1<?= $member->id ?>.value = cal1<?= $member->id ?>.getDate().getDateString();
                                                    date2<?= $member->id ?>.value = cal2<?= $member->id ?>.getDate().getDateString();
                                                    //    GetAge(date2.value,1);
                                                }
                                                date1<?= $member->id ?>.setAttribute("value", cal1<?= $member->id ?>.getDate().getDateString());
                                                date2<?= $member->id ?>.setAttribute("value", cal2<?= $member->id ?>.getDate().getDateString());
                                                GetAge(date2<?= $member->id ?>.value, <?= $member->id ?>);
        
                                            }
        
        
                                            function showCal1<?= $member->id ?>() {
                                                if (cal1<?= $member->id ?>.isHidden())
                                                    cal1<?= $member->id ?>.show();
                                                else
                                                    cal1<?= $member->id ?>.hide();
                                            }
        
                                            function showCal2<?= $member->id ?>() {
                                                if (cal2<?= $member->id ?>.isHidden())
                                                    cal2<?= $member->id ?>.show();
                                                else
                                                    cal2<?= $member->id ?>.hide();
                                            }
        
        
                                        </script>
        
                                        <?php $s++;
                                    }
                                } ?>
        
        
        
        
                                <?php if (isset($mother_data) && !empty($mother_data)) { ?>
                                    <div class="modal fade" id="editMotherModal" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document" style="width: 90%">
                                            <div class="modal-content">
                                                <?php echo form_open_multipart('family_controllers/Family/UpdateNewMember/' . $mother_data->mother_national_num_fk . "/" . $mother_data->id); ?>
        
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                                            style="position: absolute;left: 10px; top: 14px;">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
        
                                                <div class="modal-body">
        
                                                    <table class="table table-bordered">
                                                        <thead class="green_background">
                                                        <tr class="info">
                                                            <th class="text-center"> الإسم</th>
                                                            <th class="text-center">الصلة</th>
                                                            <th class="text-center"> الجنس</th>
                                                            <th class="text-center"> الهوية</th>
                                                            <th class="text-center"> مصدر الهويه</th>
                                                            <th class="text-center"> تاريخ الميلاد</th>
                                                            <th class="text-center"> العمر</th>
                                                            <th class="text-center"> التصنيف</th>
        
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $Classification = array(1 => 'أرمل', 2 => 'يتيم', 3 => 'مستفيد بالغ'); ?>
                                                        <tr id="">
        
                                                            <td style="width:18%;text-align: center!important;">
                                                                <input type="text" class="form-control"
                                                                       value="<?= $mother_data->full_name ?>" name="full_name"
                                                                       onload="this.attr('id', 'member_full_name'+getId(this));"
                                                                       data-validation="required"></td>
        
                                                            <td style=" width:8%;text-align: center!important;">
                                                                <?php
                                                                $members = array(
                                                                    '41' => 'أم',
                                                                    '42' => 'ابن',
                                                                    '43' => 'ابنه'
                                                                );
                                                                ?>
                                                                <select name="member_relationship"
                                                                        id="member_relationship<?= $mother_data->id ?>-mother"
                                                                        data-validation="required" class=" form-control nonactive"
                                                                        onchange="gender_select(<?php echo $mother_data->id . '-mother'; ?>)">
                                                                    <option value="">إختر</option>
                                                                    <?php
                                                                    foreach ($members as $key => $value) {
                                                                        $select = '';
                                                                        if ($key == 41) {
                                                                            $select = 'selected';
                                                                        }
                                                                        ?>
                                                                        <option <?php echo $select; ?> value="<?php echo $key; ?>"
                                                                        ><?php echo $value; ?></option>
                                                                    <?php } ?>
                                                                </select></td>
                                                            <td style="width:10%;text-align: center!important;">
                                                                <?php $member_gender = array(
                                                                    '1' => 'ذكر',
                                                                    '2' => 'انثي'
                                                                );
                                                                ?>
        
        
                                                                <select name="member_gender"
                                                                        id="member_gender<?= $mother_data->id ?>"
                                                                        data-validation="required" class=" form-control nonactive">
                                                                    <option value="">إختر</option>
                                                                    <?php
                                                                    foreach ($member_gender as $key => $value) {
                                                                        $select = '';
                                                                        if ($key == $mother_data->m_gender) {
                                                                            $select = 'selected';
                                                                        }
                                                                        ?>
                                                                        <option <?php echo $select; ?>
                                                                                value="<?= $key ?>"><?= $value ?></option>
                                                                    <?php } ?>
        
        
                                                                </select>
                                                            </td>
        
                                                            <td style="width:15%;text-align: center!important;">
                                                                <input type="text" name="member_card_num"
                                                                       value="<?= $mother_data->mother_national_num_fk ?>"
                                                                       id="member_card_num<?= $mother_data->id ?>"
                                                                       data-validation="required"
                                                                       onkeyup="check_length_num(this,'10','member_card_num_span')"
                                                                       maxlength="10"
                                                                       onkeypress="validate_number(event)"
                                                                       class="form-control "/>
                                                                <small id="member_card_num_span" class="span-validation"></small>
                                                            </td>
        
                                                            <td style="width:10%;text-align: center!important;">
                                                                <select name="member_card_source" id="m_card_source"
                                                                        data-validation="required" class=" form-control ">
                                                                    <option value="">إختر</option>
                                                                    <?php if (!empty($id_source)) {
                                                                        foreach ($id_source as $record_source) {
                                                                            $select = '';
                                                                            if ($record_source->id_setting == $mother_data->m_card_source) {
                                                                                $select = 'selected';
                                                                            }
                                                                            ?>
                                                                            <option value="<?php echo $record_source->id_setting; ?>" <?php echo $select; ?>><?php echo $record_source->title_setting; ?></option>
                                                                        <?php }
                                                                    } ?>
                                                                </select>
                                                            </td>
                                                            <td style="width:25%;text-align: center!important;">
        
                                                                <div class="form-group ">
        
                                                                    <label class="label text-center">
                                                                        <img style="width: 18px;float: right;"
                                                                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                                                        تاريخ الميلاد
                                                                        <img style="width: 18px;float: left;"
                                                                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                                                    </label>
        
                                                                    <div id="cal-2_mother"
                                                                         style="width: 50%;float: right;">
                                                                        <input id="date-Hijri_mother"
                                                                               name="birth_date_h"
                                                                               class="form-control bottom-input "
                                                                               data-validation="required"
                                                                               type="text"
                                                                               onfocus="showCal2_mother();"
                                                                               onchange="GetAge($(this).val());"
                                                                               style=" width: 100%;float: right"/>
        
                                                                    </div>
        
        
                                                                    <div id="cal-1_mother"
                                                                         style="width: 50%;float: left;">
                                                                        <input id="date-Miladi_mother"
                                                                               name="birth_date_m"
                                                                               class="form-control bottom-input  "
                                                                               data-validation="required"
                                                                               onchange="GetAge($(this).val());"
                                                                               type="text"
                                                                               onfocus="showCal1_mother();"
                                                                               style=" width: 100%;float: right"/>
        
                                                                    </div>
                                                                </div>
        
        
                                                            <td style="width:5%;text-align: center!important;">
                                                                <?php if (!empty($mother_data->m_birth_date_hijri)) {
                                                                    $hijri_date = explode('/', $mother_data->m_birth_date_hijri);
                                                                    $age = $current_year - $hijri_date[2];
                                                                } else {
                                                                    $age = '';
                                                                } ?>
                                                                <input class=" form-control  " value="<?php echo($age) ?>"
                                                                       type="text" name="age"
                                                                       id="myage<?php echo $mother_data->id; ?>" size="60"
                                                                       readonly/></td>
                                                            <td style="width:15%;text-align: center!important;">
                                                                <div id="categoriey_member_div_<?= $mother_data->id ?>"> ارملة</div>
        
                                                                <input type="hidden" name="categoriey_m" value="1"
                                                                       id="categoriey_member_<?php echo $mother_data->id; ?>"/>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" name="UPDTATE_member" class="btn btn-blue btn-close"
                                                           value="حفظ">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق
                                                    </button>
        
                                                </div>
                                                <?php echo form_close(); ?>
                                            </div>
                                        </div>
                                    </div>
        
        
        <script>

    var loop1_mother = 0;
    var cal1_mother = new Calendar(),
        cal2_mother = new Calendar(true, 0, true, true),
        date1_mother = document.getElementById('date-Miladi_mother'),
        date2_mother = document.getElementById('date-Hijri_mother'),
        cal1Mode_mother = cal1_mother.isHijriMode(),
        cal2Mode_mother = cal2_mother.isHijriMode();


    date1_mother.setAttribute("value", cal1_mother.getDate().getDateString());
    date2_mother.setAttribute("value", cal2_mother.getDate().getDateString());

    document.getElementById('cal-1_mother').appendChild(cal1_mother.getElement());
    document.getElementById('cal-2_mother').appendChild(cal2_mother.getElement());


    cal1_mother.show();
    cal2_mother.show();
    setDateFields1_mother();


    cal1_mother.callback = function () {
        if (cal1Mode_mother !== cal1_mother.isHijriMode()) {
            cal2_mother.disableCallback(true);
            cal2_mother.changeDateMode();
            cal2_mother.disableCallback(false);
            cal1Mode_mother = cal1_mother.isHijriMode();
            cal2Mode_mother = cal2_mother.isHijriMode();
        } else

            cal2_mother.setTime(cal1_mother.getTime());
        setDateFields1_mother();
    };

    cal2_mother.callback = function () {
        if (cal2Mode_mother !== cal2_mother.isHijriMode()) {
            cal1_mother.disableCallback(true);
            cal1_mother.changeDateMode();
            cal1_mother.disableCallback(false);
            cal1Mode_mother = cal1_mother.isHijriMode();
            cal2Mode_mother = cal2_mother.isHijriMode();
        } else

            cal1_mother.setTime(cal2_mother.getTime());
        setDateFields1_mother();
    };


    cal1_mother.onHide = function () {
        cal1_mother.show(); // prevent the widget from being closed
    };

    cal2_mother.onHide = function () {
        cal2_mother.show(); // prevent the widget from being closed
    };

    function setDateFields1_mother() {
        if (loop1_mother === 0) {
            <?php if (isset($mother_data->m_birth_date) && !empty($mother_data->m_birth_date_hijri)) {  ?>
            loop1_mother++;
            date1_mother.value = '<?=$mother_data->m_birth_date?>';
            date2_mother.value = '<?=$mother_data->m_birth_date_hijri?>';

            <?php }else{ ?>
            date1_mother.value = cal1_mother.getDate().getDateString();
            date2_mother.value = cal2_mother.getDate().getDateString();
            // GetAge(date2.value,1);
            <?php  } ?>
        } else {
            date1_mother.value = cal1_mother.getDate().getDateString();
            date2_mother.value = cal2_mother.getDate().getDateString();
            //    GetAge(date2.value,1);
        }
        date1_mother.setAttribute("value", cal1_mother.getDate().getDateString());
        date2_mother.setAttribute("value", cal2_mother.getDate().getDateString());
        GetAge(date2_mother.value, <?php echo $mother_data->id; ?>);

    }


    function showCal1_mother() {
        if (cal1_mother.isHidden())
            cal1_mother.show();
        else
            cal1_mother.hide();
    }

    function showCal2_mother() {
        if (cal2_mother.isHidden())
            cal2_mother.show();
        else
            cal2_mother.hide();
    }


</script>

        
                                <?php } ?>
        
                            </div>
                             <div class=" col-md-12 no-padding text-center">
                                 <?= $span ?>
                           
                             </div>
                        </div>
                        <!-----------------------------------F_members------------------------------------->
        
                       
                        <div class="setup-foot col-md-12 no-padding text-center">
                            <button type="button" id="button_mem_data"
                                    class="btn btn-labeled btn-success  save-btn" <?= $disabled ?>
                                    name="<?php echo $out['input'] ?>" value="<?php echo $out['input'] ?>">
                                        <span class="btn-label"><i
                                                    class="glyphicon glyphicon-plus"></i></span><?php echo $out['input_title'] ?>
                            </button>
        
                            <button class="btn btn-danger previousBtn  btn-labeled" type="button"> <span class="btn-label"> <i
                                            class="fa fa-forward" aria-hidden="true"></i>
                            </span> السابق
                            </button>
                            <button style="direction: ltr;" class="btn btn-success nextBtn btn-labeled" type="button"> <span
                                        class="btn-label" style="right: auto;left: -14px;"> <i class="fa fa-backward"
                                                                                               aria-hidden="true"></i>
                            </span> التالي
                            </button>
        
        
                        </div>
        
                        <?php //echo form_close() ?>
        
                    </div>
        
        
        
                    <div class="setup-content" id="step-3">
        
        <br />
                        <!-----------------------------------attachs------------------------------------->
        
                        <div class="setup-head col-md-12 no-padding">
                            <?php
                            if (isset($result) && $result != null) {
        
                                $button = 'حفظ المرفق';
                                $validation = '';
                                $required = 'required="required"';
                                $readonly = '';
                                $f_card_source_name = '';
                                $out['input'] = 'ADD1';
                                $out['input_title'] = 'حفظ المرفق ';
                                $span = '';
                                $disabled = '';
                                $form = form_open_multipart("family_controllers/Family/InsertNewRegister_morfq/" . $result["mother_national_num"]);
                            } else {
                                $span = '<span  class="label-danger"> عذرا...  لا يمكنك إضافة مرفقات  الاسره  بدون تسجيل بيانات الاسره الاساسيه</span>';
                                $disabled = 'disabled';
                            }
        
        
                            ?>
                            <?php echo $form ?>
        
                            <table class="table table-bordered table-striped" style="" id="table_attach_files">
                                <thead>
                                <tr class="info">
                                    <th>م</th>
                                    <th style="text-align: center">اسم المرفق</th>
                                    <th style="text-align: center">المرفق</th>
                                    <th style="text-align: center">الإجراء</th>
                                </tr>
                                </thead>
        
        
                                <tbody id="result_Table">
                                <tr>
                                    <td>#</td>
                                    <td>
        
                                        <div class="form-group">
                                            <select name="attach_files_ids[]" class="form-control attached_files needed"
                                                    required="required">
                                                <option value="">إختر</option>
                                                <?php if (isset($type_attach_file) && !empty($type_attach_file)) {
                                                    foreach ($type_attach_file as $row) { ?>
                                                        <option value="<?php echo $row->id_setting ?>"><?php echo $row->title_setting ?></option>
                                                    <?php } ?>
                                                <?php } else {
                                                    echo '<option value=""> لا يوجد تصنيفات </option>';
                                                } ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="file" required="required" name="attach_files[]"
                                                   class="form-control "/>
                                     
                                        </div>
                                    </td>
                                    <td>
                                        <input type="hidden" name="<?php echo $out['input'] ?>"
                                               value="<?php echo $out['input'] ?>"/>
                                        <button type="button" id="button"
                                                class="btn btn-labeled btn-success  save-btn" <?= $disabled ?>
                                                name="<?php echo $out['input'] ?>" value="<?php echo $out['input'] ?>">
                                                    <span class="btn-label"><i
                                                                class="glyphicon glyphicon-floppy-disk"></i></span><?php echo $out['input_title'] ?>
                                        </button>
        
                                    </td>
        
                                </tr>
                                </tbody>
        
        
                                <?php if (isset($data_table_attached) && !empty($data_table_attached)) { ?>
                                    <tbody id="result_Table">
                                    <?php
                                    $x = 1;
                                    foreach ($data_table_attached as $row) { ?>
                                        <tr>
                                        <td rowspan="<?php echo sizeof($row->sub); ?>"><?php echo $x++ ?></td>
                                        <td rowspan="<?php echo sizeof($row->sub); ?>"><?php echo $row->title_setting; ?> </td>
                                        <?php if (!empty($row->sub)) {
                                            foreach ($row->sub as $row_sub) { ?>
                                                <td>
                                                    <input type="hidden" class="attached_files"
                                                           value="<?= $row->file_attach_id_fk ?>">
        
                                                    <a href="<?php echo base_url() . 'family_controllers/Family/downloads_new/' . $row_sub->file_attach_name ?>"
                                                       download>
                                                        <i class="fa fa-download" title="تحميل"></i> </a>
                                                    <a data-toggle="modal"
                                                       data-target="#myModal-view-<?= $row_sub->id ?>">
                                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                                                </td>
                                                <td>
                                                    <a onclick=' swal({
                                                            title: "هل انت متأكد من الحذف ؟",
                                                            text: "",
                                                            type: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonClass: "btn-danger",
                                                            confirmButtonText: "حذف",
                                                            cancelButtonText: "إلغاء",
                                                            closeOnConfirm: true
                                                            },
                                                            function(){
                                                            swal("تم الحذف!", "", "success");
                                                            setTimeout(function(){window.location="<?php echo base_url() . 'family_controllers/Family/DeleteMainFileAttach/' . $row_sub->id . "/" . $row_sub->mother_national_num_fk . "/" . $result["id"] ?>";}, 500);
                                                            });'>
                                                        <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                                </td>
                                                </tr>
        
                                                <div class="modal fade" id="myModal-view-<?= $row_sub->id ?>"
                                                     tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close"><span
                                                                            aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title"
                                                                    id="myModalLabel"><?= $row->title_setting; ?></h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="<?= base_url() . "uploads/family_attached/" . $row_sub->file_attach_name ?>"
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
                                <?php } else { ?>
                                    <tbody id="result_Table">
                                    <tr id="frist_one">
                                        <td colspan="4" style="text-align: center;color: red"> لا يوجد مرفقات</td>
                                    </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                            <?php echo form_close() ?>
                            <div class="col-md-12 no-padding text-center">
                            <?= $span ?>
                        </div>
                        </div>
        
        
                        
                        <div class="setup-foot col-md-12 no-padding text-center">
        
                            <button class="btn btn-danger previousBtn  btn-labeled" type="button"> <span class="btn-label"> <i
                                            class="fa fa-forward" aria-hidden="true"></i>
                            </span> السابق
                            </button>
                            <!--<button type="submit" id="button" class="btn btn-labeled btn-success " name="<?php echo $out['input'] ?>" value="<?php echo $out['input'] ?>">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span><?php echo $out['input_title'] ?>
                            </button>-->
        
        
                        </div>
        
        
                    </div>
        
        
                    <!------------------------------------------------------------->
                </div>
            </div>
        </div>

       </div>
       <div role="tabpanel" class="tab-pane fade" id="screen-tab2">
             
            <?php
            if (isset($records) && $records != null):?>

                <div class="col-xs-12 no-padding">
                    <table id="example"
                           class="table table-striped table-bordered dt-responsive nowrap"
                           cellspacing="0" width="100%">
                        <thead>
                        <tr class="greentd">
                            <th class="text-center">م</th>
                            <th class="text-center">رقم الطلب</th>
                            <th class="text-center">إسم رب الأسرة</th>
                            <th class="text-center">رقم الهوية</th>
                            <th class="text-center"> مقدم الطلب</th>
                            <!--   <th class="text-center">إسم مقدم الطلب </th>-->
                            <!--   <th class="text-center">هوية مقدم الطلب</th> -->
                            <!--     <th class="text-center">الصلة</th>-->

                            <th class="text-center">الاجراء</th>
                            <th class="text-center">المستندات المطلوبة</th>
                            <th class="text-center">استكمال البيانات</th>

                            <!--   <th class="text-center">طباعه</th> -->

                            <th class="text-center">تحويل الطلب</th>
                            <th class="text-center">مستقبل الطلب</th>
                            <th class="text-center"> من خلال</th>


                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php $x = 1;
                        foreach ($records as $record):
                            if ($record->mother_name != '') {
                                $mother_name = $record->mother_name;
                                // $mother_name = '<h6 style="color: red;" > إستكمل البيانات</h6';
                            } elseif ($record->mother_name == '') {
                                $mother_name = $record->full_name_order;
                                //  $mother_name = '<h6 style="color: red;" > إستكمل البيانات</h6';
                            } else {
                                $mother_name = '<h6 style="color: red;" > إستكمل البيانات</h6>';
                            }
                            ?>
                            <tr>
                                <td><?php echo $x++ ?></td>
                                <td><?php echo $record->id; ?></td>
                                <td><?php echo $record->father_name; ?></td>
                                <td><?php echo $record->father_national; ?></td>
                                <td>
                                    <!--
        <button  title="تفاصيل بيانات مقدم الطلب" class="btn btn-sm btn-add"><i class="fa fa-list btn-info"></i>
            </button>
            -->

                                    <button title="تفاصيل بيانات مقدم الطلب"
                                            class="btn btn-sm btn-add"
                                            data-toggle="modal" data-target="#exampleModal"
                                            onclick="order_details(<?php echo $record->id; ?>)"
                                            style="padding: 0 4px;"><i
                                                class="fa fa-list btn-info"></i>
                                    </button>


                                </td>
                                <!--   <td><?php echo $mother_name; ?></td>-->
                                <!-- <td><?php //echo $record->person_national_card;
                                ?></td> -->
                                <!--    <td><?php echo $record->sela_name; ?></td>-->
                                <!--<td><?php echo $record->mother_mob; ?></td> -->
                                <td>

                                    <a title="طباعة الإقرار"
                                       href="<?php echo base_url('family_controllers/Family_details/printEqrar') . '/' . $record->mother_national_num ?>"
                                       target="_blank"> <i class="fa fa-print"
                                                           aria-hidden="true"></i> </a>

                                    <a href="<?php echo base_url('family_controllers/Family/UpdateNewRegister') . '/' . $record->mother_national_num ?>">
                                        <i class="fa fa-pencil " aria-hidden="true"></i> </a>

                                    <?php if ($_SESSION['role_id_fk'] == 1) { ?>
                                        <a href="<?php echo base_url('family_controllers/Family/DeleteNewRegister') . '/' . $record->mother_national_num ?>"
                                           onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                            <i class="fa fa-trash" aria-hidden="true"></i></a>


                                    <?php } ?>


                                </td>

                                <td>

                                    <button type="button" class="btn btn-sm btn-add"
                                            data-toggle="modal"
                                            data-target="#modal-files-<?php echo $record->mother_national_num; ?>"
                                            style="padding: 0 4px;">المستندات
                                    </button>
                                    <?php if (isset($record->required_files) and !empty($record->required_files)) {
                                        if (sizeof($record->required_files) > 0) { ?>

                                            <a title="طباعة المستندات "
                                               href="<?php echo base_url('family_controllers/Family/printRequiredFiles') . '/' . $record->mother_national_num ?>"
                                               target="_blank">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                            </a>
                                        <?php }
                                    } ?>


                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-success"
                                                style="padding: 0 4px;">خطابات
                                        </button>
                                        <button type="button"
                                                class="btn btn-sm btn-success dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family_letter/Civil_Status/<?php echo $record->mother_national_num; ?>/<?php echo $record->file_num; ?>">خطاب
                                                    الاحوال المدنيه </a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family_letter/Passports/<?php echo $record->mother_national_num; ?>/<?php echo $record->file_num; ?>">خطاب
                                                    الجوازات </a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family_letter/Insurance_letter_father/<?php echo $record->mother_national_num; ?>/<?php echo $record->file_num; ?>">خطاب
                                                    تأمينات ( الأب ) </a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family_letter/Insurance_letter/<?php echo $record->mother_national_num; ?>/<?php echo $record->file_num; ?>">خطاب
                                                    تأمينات ( الأم ) </a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family_letter/Retirement_letter/<?php echo $record->mother_national_num; ?>/<?php echo $record->file_num; ?>">خطاب
                                                    التقاعد </a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family_letter/daman_letter/<?php echo $record->mother_national_num; ?>/<?php echo $record->file_num; ?>">خطاب
                                                    الضمان</a></li>
                                        </ul>
                                    </div>


                                </td>


                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger"
                                                style="padding: 0 4px;">اضافه
                                        </button>
                                        <button type="button"
                                                class="btn btn-danger dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family/father/<?php echo $record->mother_national_num; ?>">بيانات
                                                    الأب </a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family/mother/<?php echo $record->mother_national_num; ?>">بيانات
                                                    الأم </a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family/add_wakel/<?php echo $record->mother_national_num; ?>">بيانات
                                                    الوكيل </a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family/family_members/<?php echo $record->mother_national_num; ?>/<?php echo $record->person_account; ?>/<?php echo $record->agent_bank_account; ?>">بيانات
                                                    أفراد الأسرة</a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family/house/<?php echo $record->mother_national_num; ?>">بيانات
                                                    السكن</a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family/devices/<?php echo $record->mother_national_num; ?>">محتويات
                                                    السكن </a></li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family/home_needs/<?php echo $record->mother_national_num; ?>">
                                                    إحتياجات الأسرة </a></li>
                                            <li>
                                                <a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family/money/<?php echo $record->mother_national_num; ?>">مصادر
                                                    الدخل والإلتزامات </a>
                                            </li>
                                            <li>
                                                <a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family/add_responsible_account/<?php echo $record->mother_national_num; ?>">بيانات
                                                    الحساب البنكي</a>
                                            </li>
                                            <li><a target="_blank"
                                                   href="<?php echo base_url(); ?>family_controllers/Family/attach_files/<?php echo $record->mother_national_num; ?>">رفع
                                                    الوثائق </a></li>
                                        </ul>
                                    </div>
                                </td>
                                <!--
<td>
    <a target="_blank" href="<?php echo base_url(); ?>family_controllers/Family_details/details/<?php echo $record->mother_national_num; ?>">إجراءات</a>
</td>
<td>
    <a target="_blank" href="<?php echo base_url(); ?>family_controllers/Family/SocialResearcher/<?php echo $record->mother_national_num; ?>">إضافة رأي الباحث</a>
</td>
<td style="color: black;"><?php echo $record->process_title; ?></td>
<td> <button data-toggle="modal"
             data-target="#modal-info<?php echo $record->id; ?>"
             class="btn btn-sm btn-info"><i
            class="fa fa-list btn-info"></i>حاله الملف
    </button>
</td>
<td style="color: black;">
    <button data-toggle="modal" <?php if ($record->suspend != 4) { ?> disabled="disabled"  <?php } ?>
            data-target="#modal-update<?php echo $record->id; ?>"
            class="btn btn-sm btn-info"><i
            class="fa fa-list btn-info"></i>تحديث حاله الملف
    </button>
</td>-->

                                <!--<td>


</td>
-->

                                <!--
<td style="color: black;">
        <button data-toggle="modal" data-target="#modal-link-family-<?php echo $record->id; ?>"
           class="btn btn-sm btn-success"><i
                class="fa fa-list btn-success"></i> ربط الأسرة بباحث
        </button>
   </td>
   -->
                                <td style="color: black;">
                                    <button data-toggle="modal"
                                            data-target="#modal-process-procedure-<?php echo $record->id; ?>"
                                            class="btn btn-sm btn-info" style="padding: 0 4px;">
                                        <i
                                                class="fa fa-list btn-info"></i> تحويل الطلب
                                    </button>
                                </td>

                                <td> <?= $record->transfotmedEmp ?> </td>

                                <td>
                                    <?php
                                    if ($record->web_admin == 1) {
                                        echo "موقع";

                                    } else {
                                        echo "برنامج";
                                    }
                                    ?>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


                <?php $all_adminastration = "";
                if (isset($adminastration) && !empty($adminastration)) {
                    foreach ($adminastration as $row_adminastration) {
                        $all_adminastration .= '<option value="' . $row_adminastration->id . '">' . $row_adminastration->name . '</option>'; ?>
                    <?php }
                } ?>

                <?php $x = 1;
                foreach ($records as $record): ?>
                    <!-- start  -->
                    <div class="modal fade" id="modal-update<?php echo $record->id; ?>"
                         tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document"
                             style="width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"> تحديث
                                        حاله ملف الأسره </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post"
                                          action="<?php echo base_url(); ?>family_controllers/Family/update_file_status">
                                        <div class="col-md-12">
                                            <input type="hidden" name="mother_national"
                                                   value="<?php echo $record->id; ?>">
                                            <?php
                                            $file_num
                                            ?>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> رقم
                                                    الملف <strong class="astric">*</strong>
                                                </label>
                                                <input type="text" readonly="readonly"
                                                       class="form-control half input-style"
                                                       name="file_num"
                                                       value=" <?php if ($record->file_num != 0) {
                                                           echo $record->file_num;
                                                       } else {
                                                           echo($file_num + 1);
                                                       } ?>"
                                                       id="file_num" <?= $validation ?> />
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> تاريخ
                                                    اعتماد الملف <strong
                                                            class="astric">*</strong> </label>
                                                <input type="date"
                                                       class="form-control half input-style "
                                                       name="date_suspend"
                                                       value="<?= $record->date_suspend ?>"
                                                       id="date_suspend"
                                                       name="date_suspend" <?= $validation ?> />
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> فتره
                                                    التحديث <strong class="astric">*</strong>
                                                </label>
                                                <select id="peroid_update" name="peroid_update"
                                                        class="form-control half input-style"
                                                        onchange="get_peroid($(this).val(),<?php echo $record->id; ?>);">
                                                    <option value="0">اختر</option>
                                                    <?php
                                                    if (isset($all_options) && !empty($all_options)) {
                                                        foreach ($all_options as $row) {
                                                            ?>
                                                            <option value="<?php echo $row->num_of_day; ?>" <?php if (isset($record->peroid_update) && !empty($record->peroid_update) && $record->peroid_update == $row->num_of_day) { ?> selected="selected"<?php } ?>> <?php echo $row->title; ?> </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> تاريخ
                                                    التحديث<strong class="astric">*</strong>
                                                </label>
                                                <input type="date"
                                                       class="form-control half input-style"
                                                       name="update_date"
                                                       value="<?= $record->file_update_date ?>"
                                                       readonly="readonly"
                                                       id="update_date<?php echo $record->id; ?>" <?= $validation ?> />
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit"
                                                        class="btn btn-purple w-md m-b-5"
                                                        name="register" id="register"
                                                        value="register">
                                                                            <span><i class="fa fa-floppy-o"
                                                                                     aria-hidden="true"></i></span> <?= $button ?>
                                                </button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end  -->
                    <div class="modal fade" id="modal-info<?php echo $record->id; ?>"
                         tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div style="color:red;"><?php echo $record->process_title; ?> </div>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <label class="label label-green  half">من فضلك اذكر
                                            السبب</label>
                                        <textarea
                                                class="form-control half  reason<?php echo $record->mother_national_num; ?>"
                                                style="width: 100%;" rows="4"
                                                required="required">
                        </textarea>
                                    </div>
                                    <div class="col-md-12"
                                         style="padding-top: 20px !important;">
                                        <?php if (isset($file_status) && !empty($file_status)) {
                                            foreach ($file_status as $row) {
                                                ?>
                                                <div class="col-md-3">
                                                    <button value="<?php echo $row->id; ?>"
                                                            onclick="change_status($(this).val(),$(this).attr('title'),$(this).attr('mom'));"
                                                            style="background-color:<?php echo $row->color; ?>;"
                                                            title="<?php echo $row->title; ?>"
                                                            mom="<?php echo $record->mother_national_num; ?>"
                                                            class="btn btn-sm btn-info status">
                                                        </i> <?php echo $row->title; ?>
                                                    </button>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade"
                         id="modal-process-procedure-<?php echo $record->id; ?>" tabindex="-1"
                         role="dialog" aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-success"
                             role="document" style="width: 50%">
                            <div class="modal-content">
                                <?php echo form_open_multipart("TransformationProcess/TransformationOfRegesterNew/3/" . $record->mother_national_num); ?>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div style="">تحويل الطلب</div>
                                    </h5>
                                </div>
                                <div class="modal-body ">

                                    <div class="col-sm-7">
                                        <div class="col-sm-12">
                                            <label style="float: right; width: 25%!important;"
                                                   class="label label-green  "> الإدارة </label>
                                            <select name="" class="form-control  selectpicker"
                                                    onchange="get_emp(this.value,<?php echo $record->id; ?>);"
                                                    required="required"
                                                    aria-required="true"
                                                    data-show-subtext="true"
                                                    data-live-search="true">
                                                <option value="">اختر</option>
                                                <?php if (isset($adminastration) && !empty($adminastration)) {
                                                    foreach ($adminastration as $row_adminastration) {
                                                        $selected = "";
                                                        if ($row_adminastration->id == $edara_id) {
                                                            $selected = 'selected=""';
                                                        } ?>
                                                        <option value="<?= $row_adminastration->id ?>" <?= $selected ?> >
                                                            <?= $row_adminastration->name ?></option>
                                                    <?php }
                                                } ?>
                                            </select>

                                        </div>
                                        <div class="col-sm-12">

                                            <label style="float: right; width: 25%!important;"
                                                   class="label label-green  "> الموظف </label>
                                            <!--
    <select name="user_to" id="user_to-7"
            onchange="pass_emp_date(this,7);"
            class="form-control  selectpicker"
            required="required" aria-required="true" data-show-subtext="true"
            data-live-search="true">
        <?php if (isset($select_user_edara) && !empty($select_user_edara)) { ?>
            <option value="" >اختر</option>
            <?php foreach ($select_user_edara as $row_user) {
                                                $out_name = $row_user->user_name;
                                                if ($row_user->role_id_fk == 3) {
                                                    $out_name = $row_user->employee;
                                                } ?>
                <option data-img="<?= $row_user->personal_photo ?>" data-job="<?= $row_user->emp_job_title ?>"
                        value="<?= $row_user->user_id . "-" . $row_user->role_id_fk . "-" . $row_user->system_structure_id_fk ?>">
                    <?= $out_name ?></option>
            <?php }
                                            } else {
                                                if (isset($depart_id)) {
                                                    echo '<option value="">لا يوجد مستخدمين   </option>';
                                                }
                                            }
                                            ?>
    </select>-->

                                            <select name="user_to"
                                                    id="user_to-7<?= $record->id ?>"
                                                    onchange="pass_emp_date(this,7,<?= $record->id ?>);"
                                                    class="form-control  selectpicker"
                                                    required="required"
                                                    aria-required="true"
                                                    data-show-subtext="true"
                                                    data-live-search="true">
                                                <?php if (isset($select_user_edara) && !empty($select_user_edara)) { ?>
                                                    <option value="">اختر</option>
                                                    <?php foreach ($select_user_edara as $row_user) {
                                                        $out_name = $row_user->user_name;
                                                        if ($row_user->role_id_fk == 3) {
                                                            $out_name = $row_user->employee;
                                                        } ?>
                                                        <option data-img="<?= $row_user->personal_photo ?>"
                                                                data-job="<?= $row_user->emp_job_title ?>"
                                                                value="<?= $row_user->user_id . "-" . $row_user->role_id_fk . "-" . $row_user->system_structure_id_fk ?>">
                                                            <?= $out_name ?></option>
                                                    <?php }
                                                } else {
                                                    if (isset($depart_id)) {
                                                        echo '<option value="">لا يوجد مستخدمين   </option>';
                                                    }
                                                }
                                                ?>
                                            </select>


                                        </div>
                                        <div class="col-sm-12">
                                            <label style="float: right; width: 25%!important;"
                                                   class="label label-green "> الاجراء </label>
                                            <select class="form-control selectpicker "
                                                    name="process_procedure_id_fk"
                                                    required="required"
                                                    aria-required="true">
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
                                            <label style="float: right; width: 25%!important;"
                                                   class="label label-green  ">ملاحظات: </label>
                                            <!--<textarea  style="float: right; width: 75%!important;"  class="form-control half input-style" rows="3" name="reason"
></textarea> -->
                                            <input type="text"
                                                   class="form-control half input-style"
                                                   name="reason"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 no-padding">

                                        <!--  <table class="table table-bordered" style="">
                <thead>
                <tr>
                    <td colspan="2">
                        <img src="<?= base_url() . "asisst/fav/apple-icon-120x120.png" ?>"
                             id="person_photo-7" class=" center-block img-responsive"
                             onerror="this.src='<?= base_url() . "asisst/fav/apple-icon-120x120.png" ?>'"
                             width="150" height="150" /></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td  style="background-color: #eee;width: 25%; ">الاسم </td>
                    <td id="name-emp-7"></td>
                </tr>
                <tr>
                    <td  style="background-color: #eee;width: 25%;">الوظيفة </td>
                    <td id="jon-title-7"></td>
                </tr>
                </tbody>
            </table>
-->

                                        <table class="table table-bordered" style="">
                                            <thead>
                                            <tr>
                                                <td colspan="2">
                                                    <img src="<?= base_url() . "asisst/fav/apple-icon-120x120.png" ?>"
                                                         id="person_photo-7<?= $record->id ?>"
                                                         class=" center-block img-responsive"
                                                         onerror="this.src='<?= base_url() . "asisst/fav/apple-icon-120x120.png" ?>'"
                                                         width="150" height="150"/></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td style="background-color: #eee;width: 25%; ">
                                                    الاسم
                                                </td>
                                                <td id="name-emp-7<?= $record->id ?>"></td>
                                            </tr>
                                            <tr>
                                                <td style="background-color: #eee;width: 25%;">
                                                    الوظيفة
                                                </td>
                                                <td id="jon-title-7<?= $record->id ?>"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                                <div class="modal-footer"
                                     style="display: inline-block; width: 100%;">


                                    <button type="button" class="btn btn-labeled btn-danger "
                                            data-dismiss="modal">
                                                                <span class="btn-label"><i
                                                                            class="glyphicon glyphicon-remove"></i></span>إغلاق
                                    </button>


                                    <button type="submit" id="button"
                                            class="btn btn-labeled btn-success " name="go"
                                            value="<?php echo $record->id; ?>"
                                            style="float: right;">
                                                                <span class="btn-label"><i
                                                                            class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>


                                </div>

                                <?php echo form_close() ?>

                            </div>
                        </div>
                    </div>
                    <!--------------------------------------------------------------------->
                    <div class="modal fade" id="modal-link-family-<?php echo $record->id; ?>"
                         tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <?php echo form_open_multipart("family_controllers/Family/AddRelations/$record->mother_national_num"); ?>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div style="color:red;">ربط الاسرة</div>
                                    </h5>
                                </div>
                                <div class="modal-body row">
                                    <div class="col-sm-12">
                                        <?php
                                        // print_r($employees_data);
                                        ?>
                                        <label class="label label-green  half"> اختار
                                            الموظف </label>
                                        <input type="hidden" name="data[mother_national_id_fk]"
                                               value="<?= $record->mother_national_num; ?>"/>
                                        <select name="data[emp_id_fk]"
                                                class="form-control half  selectpicker"
                                                required="required" aria-required="true"
                                                data-show-subtext="true"
                                                data-live-search="true">
                                            <option value="">اختر</option>
                                            <?php if (isset($employees_data) && !empty($employees_data)) {
                                                foreach ($employees_data as $row_user) {
                                                    $selected = '';
                                                    if ($row_user->id == $record->researcher_id) {
                                                        $selected = 'selected';
                                                    }
                                                    ?>
                                                    <option value="<?= $row_user->id ?>" <?= $selected ?>>
                                                        <?= $row_user->employee ?></option>
                                                <?php }
                                            } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default"
                                            data-dismiss="modal">إغلاق
                                    </button>
                                    <button type="submit" name="go"
                                            value="<?php echo $record->id; ?>"
                                            class="btn btn-warning">حفظ
                                    </button>
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <!---------------------------->


            <?php
            if (isset($records) && $records != null) {
                foreach ($records as $record) { ?>


                    <div class="modal fade"
                         id="modal-files-<?php echo $record->mother_national_num; ?>"
                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-success" role="document"
                             style="width: 80%">
                            <form method="post"
                                  action="<?php echo base_url(); ?>family_controllers/Family/add_required_files/<?php echo $record->mother_national_num; ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">الملفات
                                            المطلوبة</h5>

                                    </div>
                                    <div class="modal-body">
                                        <div class="piece-box no-border ">
                                            <!--<div class="piece-heading">
                                            <div class="col-xs-4">
                                                <h5 class="no-margin">رقم الطلب : <?php echo $record->id; ?></h5>
                                            </div>
                                            <div class="col-xs-5 ">

                                            </div>
                                            <div class="col-xs-3">
                                                <h5 class="no-margin">التاريخ : <?= date('Y-m-d') ?></h5>
                                            </div>
                                        </div>
                                    </div>-->


                                            <table id=""
                                                   class="table table-striped table-bordered no-margin">
                                                <thead>
                                                <tr>
                                                    <th class="piece-heading">بيانات الاسرة</th>
                                                    <th>رقم الطلب
                                                        : <?php echo $record->id; ?></th>
                                                    <th colspan="2">التاريخ
                                                        : <?= date('Y-m-d') ?></th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    <td>اسم الاسرة
                                                        / <?php echo $record->father_name; ?></td>
                                                    <td>السجل المدني
                                                        / <?php echo $record->mother_national_num; ?></td>

                                                    <td> المدينة
                                                        / <?php echo $record->madina; ?> </td>

                                                    <td> الحي / <?php echo $record->hai; ?></td>
                                                </tr>


                                                </tbody>
                                            </table>


                                            <?php if (isset($main_attach_files) && !empty($main_attach_files)) { ?>
                                                <table id=""
                                                       class="table table-striped table-bordered dt-responsive nowrap table-pd"
                                                       cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <td><input class="check_all_not"
                                                                   id="check_all_not<?php echo $record->mother_national_num; ?>"
                                                                   type="checkbox"
                                                                   onclick="check_all(<?php echo $record->mother_national_num; ?>);"><label
                                                                    class="checktitle">
                                                                تحديدالكل </label>

                                                        </td>
                                                        <td>نوع الطلب</td>
                                                        <td>حالة الطلب</td>
                                                        <td>ملاحظات</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $status = array('غير محدد', 'تحت الطلب', 'تم التسلم');
                                                    $y = 1;

                                                    foreach ($main_attach_files as $file_row) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input class="check_large2 check_large<?php echo $record->mother_national_num; ?> check_large2"
                                                                       type="checkbox"
                                                                    <?php
                                                                    if (isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])) {
                                                                        if ($record->required_files[$file_row->id_setting]->doc_id_fk == $file_row->id_setting) {
                                                                            echo 'checked';
                                                                        }
                                                                    }
                                                                    ?>
                                                                       name="doc_id_fk[]"
                                                                       value="<?= $file_row->id_setting ?>"/>
                                                            </td>
                                                            <td><?= $file_row->title_setting ?></td>
                                                            <td>

                                                                <select name="doc_status_fk[]"
                                                                        class=" no-padding form-control"
                                                                        aria-required="true">
                                                                    <option value="">اختر
                                                                    </option>
                                                                    <?php foreach ($status as $key => $value) { ?>
                                                                        <option value="<?= $key ?>"
                                                                            <?php
                                                                            if (isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])) {
                                                                                if ($record->required_files[$file_row->id_setting]->doc_status_fk == $key) {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        ><?= $value ?></option>
                                                                    <?php } ?>
                                                                </select>

                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?php
                                                                if (isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])) {

                                                                    echo $record->required_files[$file_row->id_setting]->doc_notes;
                                                                }
                                                                ?>" name="doc_notes[]"
                                                                       class="form-control half"/>

                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="background-color: #428bca; color: white;text-align: center;">
                                                            جوال التواصل ( الجمعية)
                                                        </td>
                                                        <td colspan="2">
 

                                                            <input type="text" maxlength="10"
                                                                   name="society_mob"
                                                                   value="<?php if ($record->society_mob) {
                                                                       echo $record->society_mob;
                                                                   } ?>"
                                                                   onkeypress="validate_number(event);"
                                                                   onkeyup="check_length_num(this,10,'span_society_mob');"
                                                                   class="form-control half"
                                                                   placeholder="أدخل البيانات"
                                                                   required="required">
                                                            <span id="span_society_mob"
                                                                  style="color: red;"></span>

                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>


                                            <?php } ?>
                                        </div>
                                        <div class="modal-footer">
        <button
        type="button" onclick="print_prime_houe(<?=$record->mother_national_num?>);"
        class="btn btn-labeled btn-purple pull-left ">
        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة كروكي المنزل
        </button>    
        <button type="submit" name="go_submit"value="go_submit" class="btn btn-labeled btn-warning">
        <span class="btn-label"><i class="glyphicon glyphicon-floppy-saved"></i></span>
         حفظ</button>
        <button type="button" class="btn btn-labeled btn-danger" data-dismiss="modal">
          <span class="btn-label"><i class="glyphicon glyphicon-floppy-remove"></i></span>
      	

        إغلاق التفاصيل</button>                                          
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php }
            } ?>
            
            
       </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-success" role="document"
         style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <div style="">تفاصيل مقدم الطلب</div>
                </h5>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>

                    <tr>
                        <th>اسم مقدم الطلب</th>
                        <td id="order_name_pop"></td>
                    </tr>
                    <tr>
                        <th>صلة مقدم الطلب</th>
                        <td id="order_relathion_pop"></td>
                    </tr>
                    <tr>
                        <th>رقم هوية مقدم الطلب</th>
                        <td id="order_num_pop"></td>
                    </tr>
                    </thead>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>


<!------------------------>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/analogue-time-picker.js"></script>


<script>
    timePickerInput({
        inputElement: document.getElementById("m12h"),
        mode: 12,
        // time: new Date()
    });
</script>

<script>
    timePickerInput({
        inputElement: document.getElementById("m13h"),
        mode: 12,
        // time: new Date()
    });
</script>


<!-------------------------------------------------->

<script>
    $(document).ready(function () {
        var x = document.getElementById('resultTable');
        var len = x.rows.length;

        if (len == "1") {
            var x = document.getElementById("person_relationship").value;

            if (x == "41") {
                $("#member_full_name" + len).val($("#full_name_order").val());
                //  $("#member_relationship"+len).val(option_name);
                $("#member_card_num" + len).val($("#mother_national_num").val());
                $("#member_relationship" + len).val($("#person_relationship").val());
                var x = document.getElementById("member_gender" + len).children[2];
                x.setAttribute("selected", "selected");
            }
        }

    })
</script>

<script>
    function gender_select(len) {
        var member = document.getElementById("member_relationship" + len).value;
        if (member == "41" || member == "43") {
            $("#member_gender" + len).html('<option value="2">أنثي</option>');
        } else if (member == "42") {
            $("#member_gender" + len).html('<option value="1">ذكر</option>');
        }

    }
</script>


<script>
    <?php $tab_show = $this->uri->segment(5, 0);
    if ($tab_show == 2) {
    ?>
    $(document).ready(function () {
        $('a[href="#step-2"]').tab('show');

        var $target = $('#step-2'),
            $item = $('a[href="#step-2"]');

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-warning').addClass('btn-default');
            $item.addClass('btn-warning');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    <?php } ?>
</script>


<script>
    function check_num() {
        var national_id_type = $('#national_id_type').val();
        var dataString = "chek_mother_national_num=" + $("#mother_national_num").val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/CheckNationalNum',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                if (html == "1") {
                    $("#mother_national_num").css("border-color", "red");
                    $("#result_span_num").html("رقم السجل مسجل من قبل ");
                    $('button[type="submit"]').attr("disabled", "disabled");
                } else {
                    //---------------
                    if ($("#mother_national_num").val().length != 10) {
                        $("#mother_national_num").css("border-color", "red");
                        if (national_id_type != 0) {
                            $("#result_span_num").html("الرقم مكون من" + 10 + "أرقام");
                        }
                        // $('button[type="submit"]').attr("disabled","disabled");
                    } else {
                        $("#mother_national_num").css("border-color", "green");
                        $("#result_span_num").html("");
                        //  $('button[type="submit"]').removeAttr("disabled");
                    }
                    //---------------
                }
            }
        });
    }
</script>
<script>
    function check_length_num(this_input, max_lenth, span_id) {
        if ($(this_input).val().length != max_lenth) {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            // $('button[type="submit"]').attr("disabled","disabled");
        } else {
            $(this_input).css("border-color", "green");
            $("#" + span_id).html("");
            //$('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>
<script>
    function valid_pass_length() {
        if ($("#user_password").val().length < 4) {
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور اكثر من اربع حروف';
            // $('button[type="submit"]').attr("disabled","disabled");
        } else if ($("#user_password").val().length > 4 && $("#user_password").val().length < 10) {
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور ضعيفة';
            //  $('button[type="submit"]').attr("disabled","disabled");
        } else if ($("#user_password").val().length > 10) {
            document.getElementById('validate_length').style.color = '#00FF00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور قوية';
            // $('button[type="submit"]').removeAttr("disabled");
        }
    }

    function valid_pass_copy() {
        if ($("#user_password").val() == $("#user_password_copy").val()) {
            document.getElementById('validate_copy').style.color = '#00FF00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور متطابقة';
            // $('button[type="submit"]').removeAttr("disabled");
        } else {
            document.getElementById('validate_copy').style.color = '#F00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور غير متطابقة';
            //$('button[type="submit"]').attr("disabled","disabled");
        }
    }
</script>
<script>
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
</script>
<script>
    function getRent() {
        var building_type = $("#building_type").val();
        if (building_type === 'rent') {
            document.getElementById("h_rent_amount").removeAttribute("disabled", "disabled");
            document.getElementById("h_rent_amount").setAttribute("required", "required");
        } else {
            document.getElementById("h_rent_amount").value = "";
            document.getElementById("h_rent_amount").setAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function get_sub_select(this_value, sub_id) {
        if (this_value != "" && this_value != 0) {
            var dataString = "get_sub_id=" + this_value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family/GetArea',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#" + sub_id).html(html);
                    $("#" + sub_id).selectpicker("refresh");
                }
            });
        }
    }
</script>
<script>
    function get_num_fk(pass_value) {
        var option_name = $("#person_relationship option:selected").text();
        if (pass_value == "41") {
            $("#person_national_card").val($("#mother_national_num").val());
        } else if (option_name == "أم") {
            $("#person_national_card").val($("#mother_national_num").val());
        } else {
            $("#person_national_card").val("");
        }
    }
</script>
<script>
    function GetNationalidType(national_type) {
        if (national_type != '') {
            document.getElementById("mother_national_num").removeAttribute("disabled", "disabled");
            if (national_type === '0') {
                document.getElementById("mother_national_num").removeAttribute("maxlength");
                document.getElementById("mother_national_num").setAttribute("onkeyup", "check_num();");
                document.getElementById("result_span_num").html("");
            } else {
                document.getElementById("mother_national_num").setAttribute("maxlength", "10");
                document.getElementById("mother_national_num").setAttribute("onkeyup", "check_num();check_length_num(this,10,'result_span_num');");
            }
        } else {
            document.getElementById("mother_national_num").setAttribute("disabled", "disabled");
        }
    }
</script>


<script>
    function get_emp(id_depart, id_pop) {
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
                    $("#user_to-7" + id_pop).html(html);
                    $("#user_to-7" + id_pop).selectpicker("refresh");
                }
            });
        }
    }
</script>


<script>
    function pass_emp_date(this_value, table_id, id_re) {   //data-img
        var name = $('option:selected', this_value).text();
        var image = $('option:selected', this_value).attr("data-img");
        var job = $('option:selected', this_value).attr("data-job");
        var pass = "<?php echo base_url() . "uploads/images/"?>";

        $("#name-emp-" + table_id + id_re).text(name);
        $("#jon-title-" + table_id + id_re).text(job);
        $("#person_photo-" + table_id + id_re).attr("src", pass + image);

    }


</script>


<script>
    $(document).ready(function () {
        $("#mother_national_num").keyup(function () {
            var x = document.getElementById('resultTable');
            var len = x.rows.length;
            if (len == "1") {
                var x = document.getElementById("person_relationship").value;
                // console.log(x);
                if (x == "41") {
                    $("#member_card_num" + len).val($("#mother_national_num").val());

                }
            }
        });

        $("#full_name_order").keyup(function () {
            var x = document.getElementById('resultTable');
            var len = x.rows.length;
            if (len == "1") {
                var x = document.getElementById("person_relationship").value;
                if (x == "41") {
                    $("#member_full_name" + len).val($("#full_name_order").val());

                }
            }
        });


    });
</script>

<script>

    function check_all(id) {

        var inputs = document.querySelectorAll('.check_large' + id);
        var input = document.getElementById('check_all_not' + id).checked;

        for (var i = 0; i < inputs.length; i++) {
            inputs[i].checked = input;

        }


    }

</script>


<script>
    function order_details(id) {

        var dataString = "id=" + id;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/get_order_details',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (res) {
                obj = JSON.parse(res);
                $('#order_name_pop').text(obj.full_name_order);
                $('#order_relathion_pop').text(obj.person_relationship);
                $('#order_num_pop').text(obj.person_national_card);
            }
        });


    }
</script>

<script type="text/javascript" src=<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url(); ?>/asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {

        /*********/

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn'),
            allPreviousBtn = $('.previousBtn'),
            SaveBtn = $('.save-btn');

        allWells.hide();


        <?php $tab_show = $this->uri->segment(5, 0);
        if ($tab_show == 2) {
        ?>
        // $('a[href="#step-2"]').tab('show');

        var $target = $('#step-2'),
            $item = $('a[href="#step-2"]');

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-warning').addClass('btn-default');
            $item.addClass('btn-warning');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
            $('.stepwizard-row ').attr('data-active', 2);

        }

        <?php }elseif ($tab_show == 3) {
        ?>
        var $target = $('#step-3'),
            $item = $('a[href="#step-3"]');

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-warning').addClass('btn-default');
            $item.addClass('btn-warning');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
            $('.stepwizard-row ').attr('data-active', 3);

        }<?php }elseif ($tab_show == 1) {
        ?>
        var $target = $('#step-1'),
            $item = $('a[href="#step-1"]');

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-warning').addClass('btn-default');
            $item.addClass('btn-warning');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
            $('.stepwizard-row ').attr('data-active', 1);

        }
        <?php }?>






        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-warning').addClass('btn-default');
                $item.addClass('btn-warning');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url'],select,input[type='number'],input[type='password']"),
                isValid = true;
            var datactive = $('.stepwizard-row ').attr('data-active');

            /*$(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }

            }*/

            if (isValid) {
                nextStepWizard.removeAttr('disabled').trigger('click');

                if (datactive < 3) {
                    datactive++;
                    $('.stepwizard-row ').attr('data-active', datactive);
                } else {
                    $('.stepwizard-row ').attr('data-active', 1);
                }

            }


            //$(".stepwizard-row").append($moving_div);
        });

        SaveBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                curInputs = curStep.find("input[type='text'],input[type='url'],select,input[type='number'],input[type='password'],input[type='file']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");

                }

            }

            if (isValid) {
                if (curStepBtn == 'step-2') {
                    console.log('curStepBtn::' + curStepBtn);
                    $.ajax({
                        type: 'post',
                        url: "<?php echo base_url();?>family_controllers/Family/UpdateNewRegister_ajex/<?=$this->uri->segment(4)?>/",
                        data: {
                            member_full_name: $('#member_full_name').val(),
                            member_relationship: $('#member_relationship1').val(),
                            member_gender: $('#member_gender1').val(),
                            member_card_num: $('#member_card_num').val(),
                            member_card_source: $('#m_card_source').val(),
                            birth_date_h: $('#date-Hijri').val(),
                            birth_date_m: $('#date-Miladi').val(),
                            categoriey_member: $('#categoriey_member1').val(),
                            age: $('#myage1').val(),
                            UPDTATE: 'UPDTATE'

                        },
                        beforeSend: function () {
                            $('#member_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                        },

                        success: function (d) {
                            $('#member_data').html(d);
                            swal({
                                type: "success",
                                title: "تم اضافة بيانات الفرد بنجاح",
                                confirmButtonText: "تم"
                            });
                            var member_relationship1 = parseInt($('#member_relationship1').val());
                            if (member_relationship1 == 41) {

                                var option = '<option value="">إختر</option>' +
                                    ' <option value = "42" > ابن </option> ' +
                                    '<option value = "43" > ابنه </option>';

                                $('#member_relationship1').html(option);
                            }
                            $('#member_full_name').val('');
                            $('#member_gender1').val('');
                            $('#member_card_num').val('');
                            $('#m_card_source').val('');
                            $('#date-Hijri').val('');
                            $('#date-Miladi').val('');

                            $('#categoriey_member1').val('');
                            $('#myage1').val('');
                        }

                    });

                } else {
                    $(this).closest(".setup-content").find("form").submit();

                }

            }

        });
        /*SaveBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                curInputs = curStep.find("input[type='text'],input[type='url'],select,input[type='number'],input[type='password'],input[type='file']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");

                }

            }

            if (isValid) {
                if (curStepBtn == 'step-2') {
                    console.log('curStepBtn::' + curStepBtn);
                    $.ajax({
                        type: 'post',
                        url: "<?php echo base_url();?>family_controllers/Family/UpdateNewRegister_ajex/<?=$this->uri->segment(4)?>/",
                        data: {
                            member_full_name: $('#member_full_name').val(),
                            member_relationship: $('#member_relationship1').val(),
                            member_gender: $('#member_gender1').val(),
                            member_card_num: $('#member_card_num').val(),
                            member_card_source: $('#m_card_source').val(),
                            birth_date_h: $('#date-Hijri').val(),
                            birth_date_m: $('#date-Miladi').val(),
                            categoriey_member: $('#categoriey_member1').val(),
                            age: $('#myage1').val(),
                            UPDTATE: 'UPDTATE'

                        },
                        beforeSend: function () {
                            $('#member_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                        },

                        success: function (d) {
                            $('#member_data').html(d);
                             swal({
                                    type: "success",
                                    title: "تم اضافة بيانات الفرد بنجاح",
                                    confirmButtonText: "تم"
                                });

                            $('#member_full_name').val('');
                            $('#member_relationship1').val('');
                            $('#member_gender1').val('');
                            $('#member_card_num').val('');
                            $('#m_card_source').val('');
                            // $('#date-Hijri').val(cal1.getDate().getDateString());
                            // $('#date-Miladi').val(cal2.getDate().getDateString());
                            $('#date-Hijri').val('');
                            $('#date-Miladi').val('');

                            $('#categoriey_member1').val('');
                            $('#myage1').val('');
                        }

                    });

                } else {
                    $(this).closest(".setup-content").find("form").submit();

                }

            }


            //$(".stepwizard-row").append($moving_div);
        });*/


        allPreviousBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                previousStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
                isValid = true;
            var datactive = $('.stepwizard-row ').attr('data-active');

            if (isValid) {
                previousStepWizard.removeAttr('disabled').trigger('click');

                if (datactive <= 3) {
                    datactive--;
                    $('.stepwizard-row ').attr('data-active', datactive);
                } else {
                    $('.stepwizard-row ').attr('data-active', 1);
                }

            }

        });


        $(".setup-content input,.setup-content select").bind("keyup change", function (e) {

            var curStep = $(this).closest(".setup-content"),
                curInputs = curStep.find("input,input[type='text'],input[type='url'],select,input[type='number'],input[type='password']");

            if ($(this).val() != '') {
                $(this).parent().removeClass("has-error");
            } else {
                $(this).parent().addClass("has-error");
            }
        });


        $('div.setup-panel div a.btn-warning').trigger('click');
    });

</script>


<script>
    $(".itab-2").on("click mouseover mouseout", ".tab a", function (e) {
        switch (e.type) {
            case "mouseover": // -----------
                $(this).parent().addClass("hover");
                break;

            case "mouseout": // -----------
                $(this).parent().removeClass("hover");
                break;

            case "click": // -----------
                $(this).parent().addClass("active")
                    .siblings().removeClass("active");

                $(this).parent().parent().attr(
                    "data-active",
                    $(this).parent().index() + 1
                );
                break;

            default: // -----------
                break;
        }

    });


</script>
<script>

    $('.skin-square .i-check input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });

</script>
<!-- new -->

<script>
    $(document).ready(function () {
        var x = document.getElementById('resultTable');
        var len = x.rows.length;
        // return  alert(len);

        if (len == "1") {
            var x = document.getElementById("person_relationship").value;

            //  var option_name=$("#person_relationship option:selected").text();
            if (x == "41") {
                $("#member_full_name" + len).val($("#full_name_order").val());
                //  $("#member_relationship"+len).val(option_name);
                $("#member_card_num" + len).val($("#mother_national_num").val());
                $("#member_relationship" + len).val($("#person_relationship").val());


                var x = document.getElementById("member_gender" + len).children[2];
                x.setAttribute("selected", "selected");
                //}

                // $("#member_gender"+len).val($("#person_relationship").val());


            }
        }

    })
</script>

<script>
    function gender_select(len) {


        var member = document.getElementById("member_relationship" + len).value;
        if (member == "41" || member == "43") {
            $("#member_gender" + len).html('<option value="2">أنثي</option>');
        } else if (member == "42") {
            $("#member_gender" + len).html('<option value="1">ذكر</option>');
        }

    }
</script>
<!-- display mother data -->


<script type="text/javascript">
    jQuery(function ($) {
        $(".date_as_mask").mask("99/99/9999");
    });
</script>


<script>

    function deleteRow(id) {
        $("#" + id).remove();
    }


    function GetAge(valu, id) {
        // console.log('GetAge' + valu);
        var id = id;
        var mydate = valu.split("/");
        var myYear = mydate[2];
        var nowyear =<?php echo $current_year; ?>;
        var myAge = parseInt(nowyear) - parseInt(myYear);
        $('#myage' + id).val(myAge);
        // console.log(myAge);
        // console.log(id);
        GetClassification(myAge, $('#member_gender' + id).val(), id);

    }


    function GetClassification(myage, mygender, id) {
        // console.log(mygender);

        if (myage != '' && mygender != '') {

            var dataString = 'age=' + myage + '&gender=' + mygender;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family/GetClassification',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    // console.log(JSONObject);
                    var member = document.getElementById("member_relationship1").value;
                    // console.log(member);
                    if (member == "41") {
                        $('#categoriey_member1').val(1);
                        $('#categoriey_member_div' + id).html('أرملة');
                    } else {
                        $('#categoriey_member' + id).val(JSONObject['tasnef']);
                        $('#categoriey_member_div' + id).html(JSONObject['title']);
                    }


                }
            });
        } else {
            // alert('من فضلك إختر عام  !!');
            $('#myage' + id).val("");
            $('#categoriey_member' + id).val("");
            $('#categoriey_member_div' + id).html("");
            $('#birth_date_h' + id).val("");
        }


    }
</script>


<script>

    var loop1 = 0;
    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    date1.setAttribute("value", cal1.getDate().getDateString());
    date2.setAttribute("value", cal2.getDate().getDateString());

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    setDateFields1();


    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal2.setTime(cal1.getTime());
        setDateFields1();
    };

    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal1.setTime(cal2.getTime());
        setDateFields1();
    };


    cal1.onHide = function () {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function () {
        cal2.show(); // prevent the widget from being closed
    };

    function setDateFields1() {
        if (loop1 === 0) {
            <?php if (isset($birth_date_m) && !empty($birth_date_m)) {  ?>
            loop1++;
            date1.value = '<?=$birth_date_m?>';
            date2.value = '<?=$birth_date_h?>';

            <?php }else{ ?>
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
            // GetAge(date2.value,1);
            <?php  } ?>
        } else {
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
            //    GetAge(date2.value,1);
        }
        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
        // console.log(date1.value);
        GetAge(date2.value, 1);

    }


    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }

    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();
    }


</script>
<!-- new -->



<script>
    function gender_select(len) {


        var member = document.getElementById("member_relationship" + len).value;
        if (member == "41" || member == "43") {
            $("#member_gender" + len).html('<option value="2">أنثي</option>');
        } else if (member == "42") {
            $("#member_gender" + len).html('<option value="1">ذكر</option>');
        }

    }
</script>
<!-- display mother data -->


<script type="text/javascript">
    jQuery(function ($) {
        $(".date_as_mask").mask("99/99/9999");
    });
</script>


<script>
    function save() {


        var title = "هل انت متأكد من  الحفظ";
        var confirm = "نعم, قم بالحفظ";
        var text2 = "عند الضغط علي نعم سيتم   الحفظ";
        Swal.fire({
            title: "هل انت متأكد من  الحفظ",
            text: "عند الضغط علي نعم سيتم   الحفظ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ليس الان',
            confirmButtonText: نعم, قم بالحفظ
        }).then((result) => {


                Swal.fire({
                    title: 'هل تريد طباعة اضافه بيانات افراد الاسره ؟',
                    type: 'warning',

                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'لا',
                    confirmButtonText: 'نعم'
                }).then((result) => {
                    $.ajax({
                        type: 'post',
                        url: "<?php echo base_url();?>family_controllers/Family/AddNewRegister",

                        success: function (d) {
                            Swal.fire(
                                'نجاح!',
                                'تم  الحفظ .',
                            )
                        }
                    });
                    if (result.value) {
                        window.location.href = "<?php echo base_url();?>family_controllers/Family/AddNewRegister";
                    } else {
                        window.location.href = "<?php echo base_url();?>family_controllers/Family/AddNewRegister";
                    }
                });


            }
        )
    }
</script>

<script>
    function print_prime_houe(mother_num) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . '/family_controllers/Family/print_prime_houe'?>",
            type: "POST",
            data: {mother_num: mother_num},
        });
        request.done(function (msg) {
            //this code for print
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
           /* WinPrint.print();
            WinPrint.close();*/
            //    end code
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>
