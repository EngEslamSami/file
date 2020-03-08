<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>

<style type="text/css">

    .top-label {
        font-size: 13px;
        background-color: #5f9007 !important;
        border: 2px solid #5f9007 !important;
        text-shadow: none !important;
        font-weight: 500 !important;
    }

    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }

    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    .print_forma {
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {
        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
    }

    /***/

    .btn-close-model,
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }


    .my_style {

        color: #222;
        font-size: 15px;
        font-weight: 500;

    }


</style>
<style type="text/css">
    .top-label {
        font-size: 14px;
        font-weight: 500;

    }

    .print_forma {
        /*border:1px solid #73b300;*/
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {

        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
        color: #fff;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;

    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }

    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }

    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3,
    .under-line .col-xs-4,
    .under-line .col-xs-6,
    .under-line .col-xs-8 {
        border-left: 1px solid #abc572;
    }


    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }


    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }

    .btn-group .dropdown-menu {
        min-width: 106px;
    }

    .btn-group .dropdown-menu > li > a {
        padding: 5px 2px 5px 0;
    }

</style>


<?php
if (isset($result) && !empty($result)) {
    $name = $result->name;
    $memb_id = $result->id;
    $card_num = $result->card_num;
    $gns = $result->gns;
    $laqb_fk = $result->laqb_fk;
    $gnsia_fk = $result->gnsia_fk;
    $hala_egtma3ia_fk = $result->hala_egtma3ia_fk;
    $geha_esdar_fk = $result->geha_esdar_fk;
    $birth_date_m = $result->birth_date_m;
    $jwal = $result->jwal;
    $jwal_another = $result->jwal_another;
    $madina_fk = $result->madina_fk;
    $hai_fk = $result->hai_fk;
    $street_name = $result->street_name;
    $enwan_watni = $result->enwan_watni;
    $email = $result->email;
    $daraga_3elmia_fk = $result->daraga_3elmia_fk;
    $moahel_3elmi_fk = $result->moahel_3elmi_fk;
    $hya_3elmia_fk = $result->hya_3elmia_fk;
    $mehna_fk = $result->mehna_fk;
    $geha_amal = $result->geha_amal;
    $enwan_amal = $result->enwan_amal;
    $hatf_amal = $result->hatf_amal;
    $map_google_lng = $result->map_google_lng;
    $map_google_lat = $result->map_google_lat;
    $mem_img = $result->mem_img;
    $esdar_date_h = $result->esdar_date_h;
    $birth_date_h = $result->birth_date_h;

    $array_date = explode("/", $birth_date_h);
    if (isset($array_date[2])) {
        $age = $current_hijry_year - $array_date[2] . " سنة ";
    } else {
        $age = "0 سنة";
    }

    $out['form'] = 'md/all_gam3ia_omomia_members/Gam3ia_omomia_members/update_gam3ia_member/' . $result->id;
    $card_img = $result->card_img;
    $morfaqs = array($result->morfaq1, $result->morfaq2, $result->morfaq3, $result->morfaq4);


} else {

    $name = '';
    $memb_id = '';
    $card_num = '';
    $gns = '';
    $laqb_fk = '';
    $gnsia_fk = '';
    $hala_egtma3ia_fk = '';
    $geha_esdar_fk = '';
    $birth_date_m = '';
    $jwal = '';
    $jwal_another = '';
    $madina_fk = '';
    $hai_fk = '';
    $street_name = '';
    $enwan_watni = '';
    $email = '';
    $daraga_3elmia_fk = '';
    $moahel_3elmi_fk = '';
    $hya_3elmia_fk = '';
    $mehna_fk = '';
    $geha_amal = '';
    $enwan_amal = '';
    $hatf_amal = '';
    $map_google_lng = '';
    $map_google_lat = '';
    $mem_img = '';
    $esdar_date_h = '';
    $birth_date_h = '';
    $age = '';

    $out['form'] = 'md/all_gam3ia_omomia_members/Gam3ia_omomia_members/add_gam3ia_member';
}
?>
<?php
?>
<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
            <div class="pull-left">
                <?php if (isset($result) && !empty($result)) {

                    $data_load["id"] = $result->id;
                    $this->load->view('admin/md/all_gam3ia_omomia_members/drop_down_menu', $data_load);

                } ?>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-sm-10 padding-4">
                <?php echo form_open_multipart($out['form']) ?>
                <div class="col-md-12">
                    <div class="form-group col-md-5 col-sm-6 padding-4">
                        <label class="label">إسم العضو</label>
                        <input type="text" name="name" id="name" value="<?php echo $name; ?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                        <input type="hidden" id="memb_id" name="memb_id"
                               value="<?php
                               echo $memb_id;
                               ?> ">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">الجنس </label>
                        <select name="gns" id="gender_id_fk"
                                class="form-control "
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if (isset($gender_data) && !empty($gender_data)) {
                                foreach ($gender_data as $row) {
                                    ?>

                                    <option value="<?php echo $row->id_setting; ?>"
                                        <?php if (!empty($gns)) {
                                            if ($row->id_setting == $gns) {
                                                echo 'selected';
                                            }
                                        } ?>> <?php echo $row->title_setting; ?></option>

                                    <?php

                                }
                            }
                            ?>
                        </select>


                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">الجنسيه</label>
                        <select id="nationality_id_fk" class="form-control "
                                name="gnsia_fk">
                            <option value="">إختر</option>
                            <?php
                            foreach ($nationality as $row) {
                                ?>
                                <option value="<?php echo $row->id_setting; ?>"
                                    <?php if (!empty($gnsia_fk)) {
                                        if ($row->id_setting == $gnsia_fk) {
                                            echo 'selected';
                                        }
                                    } ?>> <?php echo $row->title_setting; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">اللقب</label>
                        <select name="laqb_fk" class="form-control " id="surname">
                            <option value="">اختر</option>
                            <?php
                            if (isset($surname_arr) && !empty($surname_arr)) {
                                foreach ($surname_arr as $row) {
                                    ?>
                                    <option value="<?php echo $row->id_setting; ?>"
                                        <?php if (!empty($hala_egtma3ia_fk)) {
                                            if ($row->id_setting == $laqb_fk) {
                                                echo 'selected';
                                            }
                                        } ?>> <?php echo $row->title_setting; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">الحاله الاجتماعيه </label>
                        <select name="hala_egtma3ia_fk" class="form-control " id="social_status_id_fk">
                            <option value="">اختر</option>
                            <?php
                            if (isset($social_status) && !empty($social_status)) {
                                foreach ($social_status as $row) {
                                    ?>
                                    <option value="<?php echo $row->id_setting; ?>/<?= $row->title_setting ?>"
                                        <?php if (!empty($hala_egtma3ia_fk)) {
                                            if ($row->id_setting == $hala_egtma3ia_fk) {
                                                echo 'selected';
                                            }
                                        } ?>> <?php echo $row->title_setting; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label "> رقم الهويه <span class="span-allow"> (10ارقام) </span></label>
                        <input type="text" name="card_num" id="card_num" onkeyup="get_length($(this).val(),'hint');"
                               maxlength="10" data-validation="required" value="<?php echo $card_num; ?>"
                               class="form-control"
                               data-validation-has-keyup-event="true" onkeypress="validate_number(event);">
                        <small id="hint" class="myspan" style="color: red;"></small>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">جهه الاصدار </label>
                        <select id="esdar_card_fk" name="geha_esdar_fk" class="form-control ">
                            <option value="">إختر</option>
                            <?php
                            if (isset($dest_card) && !empty($dest_card)) {
                                foreach ($dest_card as $row) {
                                    ?>
                                    <option value="<?php echo $row->id_setting; ?>/<?php echo $row->title_setting; ?>"
                                        <?php if (!empty($geha_esdar_fk)) {
                                            if ($row->id_setting == $geha_esdar_fk) {
                                                echo 'selected';
                                            }
                                        } ?>> <?php echo $row->title_setting; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label" style="text-align: center !important;">
                            <img style="width: 18px;float: right;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                            تاريخ الاصدار
                            <img style="width: 18px;float: left;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                        </label>
                        <div id="cal-2" style="width: 50%;float: right;">
                            <input id="date-Hijri" name="esdar_date_h" class="form-control "
                                   type="text" onfocus="showCal2();" value="<?php if (!empty($result->esdar_date_h)) {
                                echo $result->esdar_date_h;
                            } ?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-1" style="width: 50%;float: left;">
                            <input id="date-Miladi" name="esdar_date_m" class="form-control  "
                                   value="<?php if (!empty($result->esdar_date_m)) {
                                       echo $result->esdar_date_m;
                                   } ?>"
                                   type="text" onfocus="showCal1();" style=" width: 100%;float: right"/>
                        </div>

                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">

                        <label class="label " style="text-align: center !important;">
                            <img style="width: 18px;float: right;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                            تاريخ الميلاد
                            <img style="width: 18px;float: left;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                        </label>

                        <div id="cal-end-2" style="width: 50%;float: right;">
                            <input id="date-Hijri-end" name="birth_date_h" class="form-control " type="text"
                                   onfocus="showCalEnd2();" value="<?php if (!empty($result->birth_date_h)) {
                                echo $result->birth_date_h;
                            } ?>" onblur="getAge($(this).val());" style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-end-1" style="width: 50%;float: left;">
                            <input id="date-Miladi-end" name="birth_date_m"
                                   value="<?php if (!empty($result->birth_date_m)) {
                                       echo $result->birth_date_m;
                                   } ?>" class="form-control  birth_date"
                                   type="text" onfocus="showCalEnd1();"
                                   style=" width: 100%;float: right"/>
                        </div>

                    </div>


                    <div class="form-group col-md-1 col-sm-6 padding-4">
                        <label class="label ">العمر</label>
                        <input type="text" name="age" id="age" value="<?php echo $age; ?>"
                               class="form-control "
                               data-validation-has-keyup-event="true" readonly>
                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ""> الجوال <span class="span-allow"> (10ارقام) </span></label>
                        <input type="text" name="jwal" maxlength="10" onkeyup="get_length($(this).val(),'tel');"
                               data-validation="required" id="phone3" value="<?php echo $jwal; ?>"
                               class="form-control "
                               data-validation-has-keyup-event="true" onkeypress="validate_number(event);">
                        <small id="tel" class="myspan" style="color: red;"></small>
                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label "> جوال أخر </label>
                        <input type="text" maxlength="10" name="jwal_another" onkeypress="validate_number(event)"
                               onkeyup="get_length($(this).val(),'tel_another');" value="<?php echo $jwal_another; ?>"
                               class="form-control " data-validation-has-keyup-event="true">
                        <small id="tel_another" class="myspan" style="color: red;"></small>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label " title="برجاء الضغط مرتين لتعديل الحي">المدينة</label>
                        <select id="city_id_fk" name="madina_fk" onchange="getAhai($(this).val());"
                                ondblclick="getAhai($(this).val());" class="form-control">
                            <option value="">إختر</option>
                            <?php
                            if (isset($cities) && !empty($cities)) {
                                foreach ($cities as $key => $value) {
                                    ?>
                                    <option value="<?php echo $key; ?>/<?php echo $value; ?>"
                                        <?php if ($key == $madina_fk) {
                                            echo 'selected';
                                        } ?>> <?php echo $value; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <?php if (isset($cities) && !empty($cities)) { ?>
                            <small id="" class="" style="color: red;display: none;">برجاء الضغط مرتين لتعديل الحي
                            </small>
                        <?php }
                        ?>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4 ">
                        <label class="label ">الحي</label>
                        <select id="hai_id_fk" name="hai_fk" class="form-control  nonactive">
                            <option value="">إختر</option>
                            <?php if (isset($hai_fk) && !empty($hai_fk)) {
                                foreach ($ahais as $hay) {
                                    $select = '';
                                    if ($hay->id == $hai_fk) {
                                        $select = 'selected';
                                    } ?>
                                    <option <?= $select ?> value="<?= $hay->id ?>"> <?= $hay->name ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">اسم الشارع</label>
                        <input type="text" name="street_name" value="<?php echo $street_name; ?>" class="form-control "
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">العنوان الوطني</label>
                        <input type="text" name="enwan_watni" id="national_address" onkeypress="validate_number(event);"
                               value=" <?php echo $enwan_watni; ?>" class="form-control ">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">البريد الإلكتروني</label>
                        <input type="email" name="email" id="email" value="<?php echo $email; ?>"
                               class="form-control "
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">الدرجة العلمية </label>
                        <select id="scientific_degree_fk" name="daraga_3elmia_fk"
                                class="form-control ">
                            <option value="">إختر</option>
                            <?php
                            if (isset($Degree) && !empty($Degree)) {
                                foreach ($Degree as $value) {
                                    $select = '';
                                    if ($value->id_setting == $daraga_3elmia_fk) {
                                        $select = 'selected';
                                    } ?>
                                    ?>
                                    <option value="<?php echo $value->id_setting; ?>/<?php echo $value->title_setting; ?>" <?= $select ?>>
                                        <?php echo $value->title_setting; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">المؤهلات العلمية </label>
                        <select id="qualification_fk" name="moahel_3elmi_fk"
                                class="form-control ">
                            <option value="">إختر</option>
                            <?php
                            if (isset($science_qualification) && !empty($science_qualification)) {
                                foreach ($science_qualification as $value) {
                                    $select = '';
                                    if ($value->id_setting == $moahel_3elmi_fk) {
                                        $select = 'selected';
                                    } ?>
                                    ?>
                                    <option value="<?php echo $value->id_setting; ?>/<?php echo $value->title_setting; ?>" <?= $select ?>>
                                        <?php echo $value->title_setting; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">

                    <?php $arr = array(1 => 'نعم', 0 => 'لا'); ?>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">الحياة العملية</label>
                        <select id="working_life" name="hya_3elmia_fk" onchange="GetType(this.value)"
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            foreach ($arr as $key => $value) {
                                $select = '';
                                if ($hya_3elmia_fk != '') {
                                    if ($key == $hya_3elmia_fk) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">المهنة </label>
                        <select name="mehna_fk" id="job_name_fk" class="form-control "
                                <?php if ($hya_3elmia_fk != 1){ ?>disabled="disabled" <?php } ?>
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php foreach ($job_role as $one_job_role) {
                                $select = '';
                                if (!empty($mehna_fk)) {
                                    if ($one_job_role->id_setting == $mehna_fk) {
                                        $select = 'selected';
                                    }
                                } ?>

                                ?>
                                <option value="<?php echo $one_job_role->id_setting; ?>/<?php echo $one_job_role->title_setting; ?>" <?= $select ?>
                                ><?php echo $one_job_role->title_setting; ?></option>';
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">جهة العمل </label>

                        <input name="geha_amal" id="job_place_name" style="padding: 0;"
                               <?php if ($hya_3elmia_fk != 1){ ?>disabled="disabled" <?php } ?>value="<?= $geha_amal ?>"
                               class=" form-control " type="text">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label " style="width: 100%"> عنوان العمل</label>
                        <input id="job_address" name="enwan_amal" style="padding: 0;"
                               <?php if ($hya_3elmia_fk != 1){ ?>disabled="disabled" <?php } ?>
                               value="<?= $enwan_amal ?>"
                               class=" form-control" type="text">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label " style="width: 100%"> هاتف العمل</label>
                        <input id="job_mob" name="hatf_amal" maxlength="10"
                               onkeyup="get_length($(this).val(),'work_mobile_span');"
                            <?php if ($hya_3elmia_fk != 1) { ?> disabled="disabled" <?php } ?>value="<?= $hatf_amal ?>"
                               class="  form-control " type="text"
                               onkeypress="validate_number(event)">
                        <small id="work_mobile_span" class="myspan" style="color: red;"></small>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label " style="width: 100%">الصوره الشخصيه </label>
                        <input id="member_img" onchange="readURL(this);" name="mem_img" style="padding: 0;"
                               class=" form-control" type="file">
                        <?php if (!empty($mem_img)) { ?>
                            <a data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                               onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/md/gam3ia_omomia_members/<?php echo $mem_img; ?>');">
                                <i class="fa fa-eye"></i>
                            </a>
                        <?php } ?>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label " style="width: 100%">صورة الهوية </label>
                        <input id="card_img" onchange="readURL(this);" name="card_img" style="padding: 0;"
                               class=" form-control" type="file">
                        <?php if (!empty($card_img)) { ?>
                            <a data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                               onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/md/gam3ia_omomia_members/<?php echo $card_img; ?>');">
                                <i class="fa fa-eye"></i>
                            </a>
                        <?php } ?>
                    </div>


                    <!--<div class="form-group col-md-3 col-sm-6 padding-4">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr class="info">
                                <th> مرفق</th>
                                <th><a onclick="apen('morfaq_option','morfaq','file',4);">
                                        <i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
                                </th>

                            </tr>
                            </thead>

                            <tbody id="morfaq_option">
                            <?php
                    if (isset($morfaqs) && !empty($morfaqs)) {
                        foreach ($morfaqs as $key => $item1) {
                            if (!empty($item1)) { ?>
                                        <tr>
                                            <td><input class="form-control" type="file" name="morfaq[]"
                                                       onchange="console.log('file'+this.value);get_value(this);">
                                                <input type="hidden" id="morfaq_name<?= ++$key ?>" name="morfaq_name[]"
                                                       value="<?= $item1 ?>">
                                            </td>
                                            <td><a href="#" onclick="remove(this)"><i class="fa fa-trash"
                                                                                      aria-hidden="true"></i></a>
                                                <br>

                                                <a target="_blank"
                                                   href="https://docs.google.com/gview?url=<?= base_url() . 'uploads/md/gam3ia_omomia_members/' . $item1 ?>&embedded=true"><i
                                                            class="fa fa-eye"></i></a>
                                            </td>

                                        </tr>
                                    <?php }
                        }
                    }
                    ?>
                            </tbody>
                        </table>
                    </div>-->


                </div>

                <div class="col-md-12">

                    <button class="btn btn-labeled btn-warning" role="button" data-toggle="collapse"
                            href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                            style="color: #000;">
                        <span class="btn-label"><i class=" glyphicon glyphicon-map-marker"></i></span> الموقع على
                        الخريطة
                    </button>


                    <div class="collapse" id="collapseExample">
                        <input type="hidden" name="map_google_lng" id="lng" value="<?php echo $map_google_lng; ?>"/>
                        <input type="hidden" name="map_google_lat" id="lat" value="<?php echo $map_google_lat; ?>"/>
                        <?php echo $maps['html']; ?>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">

                        <button type="submit"
                                class="btn btn-labeled btn-success " id="save" name="save" value="save"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>

                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                </div>
                <?php echo form_close() ?>
            </div>


            <div class="col-sm-2 no-padding">
                <div class="text-center" id="sidebar_data">

                </div>


            </div>
        </div>


    </div>
</div>

    <!------------------------------------------------------------------>

    <!------ table -------->
    <?php
    if (isset($records) && !empty($records)){
    ?>
    <div class="col-xs-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">البيانات الأساسية</h3>
            </div>
            <div class="panel-body"><br>
                <div class="col-md-12 no-padding">

                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="info">
                            <th class="text-center">م</th>
                            <th class="text-center">رقم العضوية</th>
                            <th class="text-center">إسم العضو</th>
                            <th>رقم الهوية</th>
                            <th>رقم الجول</th>
                            <th>نوع العضوية</th>
                            <th>حالة العضوية</th>
                            <th>اضافة عضوية</th>

                            <th class="text-center">الاجراءات</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $a = 1;

                        if (isset($records) && !empty($records)) {

                            foreach ($records as $record) {
                                ?>
                                <tr>
                                    <td><?php echo $a ?></td>

                                    <td>
                                        <?php
                                        if (isset($record->odwiat->rkm_odwia_full) && ($record->odwiat->rkm_odwia_full)!= NULL ) {
                                            echo $record->odwiat->rkm_odwia_full;
                                        } else {
                                            echo "غير محدد";
                                        }


                                        ?>
                                    </td>
                                    <td><?php echo $record->laqb_title.'/'. $record->name; ?></td>
                                    <td><?php echo  $record->card_num; ?></td>
                                    <td><?php echo $record->jwal; ?></td>

                                    <td>
                                        <?php
                                        if (isset($record->odwiat->no3_odwia_title) && !empty($record->odwiat->no3_odwia_title)) {
                                            echo $record->odwiat->no3_odwia_title;
                                        } else {
                                            echo "غير محدد";
                                        }

                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        
                                        
                                        
                                        if (isset($record->odwiat->odwia_status_title) && !empty($record->odwiat->odwia_status_title)) {
                                            echo $record->odwiat->odwia_status_title;
                                        } else {
                                            echo "غير محدد";
                                        }

                                        ?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger">اضافه</button>
                                            <button type="button" class="btn btn-danger dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a target="_blank"
                                                       href=" <?php echo base_url(); ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/update_gam3ia_member/<?php echo $record->id; ?>">البيانات
                                                        الأساسية</a></li>


                                                <li><a target="_blank"
                                                       href="<?php echo base_url(); ?>md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_odwiat_data/<?php echo $record->id; ?>">بيانات
                                                        العضوية</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>


                                        <a onclick='swal({
                                                title: "هل انت متأكد من التعديل ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-warning",
                                                confirmButtonText: "تعديل",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: false
                                                },
                                                function(){

                                                window.location="<?php echo base_url(); ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/update_gam3ia_member/<?php echo $record->id; ?>";
                                                });'>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                        <a onclick='swal({
                                                title: "هل انت متأكد من الحذف ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-danger",
                                                confirmButtonText: "حذف",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: false
                                                },
                                                function(){
                                                swal("تم الحذف!", "", "success");
                                                window.location="<?= base_url() . "md/all_gam3ia_omomia_members/Gam3ia_omomia_members/delete_gam3ia_member/" . $record->id ?>";
                                                });'>
                                            <i class="fa fa-trash"> </i></a>

                                        <a onclick="get_morfaq(<?= $record->id ?>)"
                                           class="btn btm-sm btn-labeled btn-inverse "
                                           data-toggle="modal" data-target="#myModal_attach">
                                            <i class="glyphicon glyphicon-cloud-upload"></i>
                                        </a>
                                        <a onclick="print_card(<?= $record->id ?>,'print_member_details')">
                                            <i class="fa fa-print" aria-hidden="true"></i> </a>

                                        <a onclick="print_card(<?= $record->id ?>,'print_card')">
                                            <i style="background-color: #0a568c" class="fa fa-print"
                                               aria-hidden="true"></i> </a>


                                    </td>

                                </tr>
                                <?php
                                $a++;

                            }
                        } else { ?>
                            <td colspan="6">
                                <div style="color: red; font-size: large;">لم يتم اضافه أعضاء الي الان</div>
                            </td>
                        <?php }
                        ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!----- end table ------>

<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
            </div>
            <div class="modal-body">
                <img src="" id="my_image" width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_attach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">اضافة المرفقات</h4>
            </div>
            <?php echo form_open_multipart(base_url() . 'md/all_gam3ia_omomia_members/Gam3ia_omomia_members/upload_morfaqs') ?>
            <div class="modal-body">
                <div id="get_morfaq"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-labeled" style="display: inline-block;float: right;"
                        name="add_attach"><span class="btn-label"><i
                                class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
                <button type="button" class="btn btn-danger btn-labeled"
                        data-dismiss="modal"><span class="btn-label"><i class="glyphicon glyphicon-remove"></i> </span>إغلاق
                </button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>


<script>
    function get_sidebar_data() {
        var memb_id = $('#memb_id').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/get_sidebar_data",
            data: {id: memb_id},
            beforeSend: function () {
                $('#sidebar_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {

                $('#sidebar_data').html(d);


            }


        });

    }

    $(document).ready(function () {
        console.log('document ready');
        get_sidebar_data();
        console.log('document ready');

    });
</script>

<script>
    function get_morfaq(id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/get_morfaq",
            data: {id: id},
            beforeSend: function () {
                $('#get_morfaq').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {

                $('#get_morfaq').html(d);


            }


        });
    }
</script>
<script>
    function print_card(id, method) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'md/all_gam3ia_omomia_members/Gam3ia_omomia_members/'?>" + method + '/' + id,
            type: "POST",
        });
        request.done(function (msg) {
            //this code for print
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>
<script>
    function apen(id, name_input, type, max_len) {
        var current_len = document.getElementById('morfaq_option').rows.length + 1;
        if (parseInt(current_len) <= parseInt(max_len)) {
            var html = '<tr>' + '<td> <input class="form-control" type="' + type + '" name="' + name_input + '[]" ' +
                '  onchange="get_value(this,\'morfaq_name' + current_len + '\');">\n' +
                '  <input type="hidden" id="morfaq_name' + current_len + '" name="morfaq_name[]" data-validation="required"  value="">' +
                '</td>' +
                ' <td><a  onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td>' +
                '</tr>';
            $('#' + id).append(html);
        }
    }

    function remove(name) {
        $(name).parents('tr').remove();
    }

    function get_value(obj, id) {
        var val = obj.value.split("\\");
        console.log('file name ' + val[val.length - 1]);
        document.getElementById(id).value = val[val.length - 1];
    }
</script>

<script>
    /*
        function apen(id, name_input, type, max_len) {
            var current_len = document.getElementById('morfaq_option').rows.length + 1;
            if (parseInt(current_len) <= parseInt(max_len)) {
                var html = '<tr>' + '<td> <input class="form-control" type="' + type + '" name="' + name_input + '[]"  ></td>' +
                    ' <td><a  onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td>' +
                    '</tr>';
                $('#' + id).append(html);
            }
        }

        function remove(name) {
            $(name).parents('tr').remove();
        }
        */
</script>

<script>
    function getAge(birth) {
        1 / 13 / 2019
        var birth_date = birth;
        var res = birth_date.split("/");
        var year_birth = res[2];
        var current_year = '<?php echo $current_hijry_year?>';
        var ageYear = parseFloat(current_year) - parseFloat(year_birth);
        $('#age').val(ageYear + 'سنه');

    }
</script>
<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    function length_hesab_om(length) {
        var len = length.length;
        if (len < 24) {
            alert(" رقم الحساب لابد الايقل عن 24 حرف او رقم");
        }
        if (len > 24) {
            alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
        }
        if (len == 24) {
        }
    }
</script>
<script>
    function get_length(len, span_id) {
        if (len.length < 10) {
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById("" + span_id).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if (len.length > 10) {
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById("" + span_id).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if (len.length == 10) {
            document.getElementById("save").removeAttribute("disabled", "disabled");
            document.getElementById("" + span_id).innerHTML = '';
        }
    }
</script>
<script>
    function get_banck_code(valu) {
        var valu = valu.split("-");
        $('#bank_code').val(valu[1]);
    }
</script>
<script>
    function chek_length(inp_id, len) {
        var inchek_id = "#" + inp_id;
        var inchek = $('' + inchek_id).val();
        if (inchek.length < len) {
            document.getElementById("" + inp_id + "_span").style.color = '#F00';
            document.getElementById("" + inp_id + "_span").innerHTML = 'أقصي عدد ' + len + ' ارقام';
            document.getElementById("save").setAttribute("disabled", "disabled");
            var inchek_out = inchek.substring(0, len);
            $(inchek_id).val(inchek_out);
        }
        if (inchek.length > len) {
            document.getElementById("" + inp_id + "_span").style.color = '#F00';
            document.getElementById("" + inp_id + "_span").innerHTML = 'أقصي عدد ' + len + ' ارقام';
            document.getElementById("save").setAttribute("disabled", "disabled");
            var inchek_out = inchek.substring(0, len);
            $(inchek_id).val(inchek_out);
        }
        if (inchek.length == len) {
            document.getElementById("" + inp_id + "_span").innerHTML = '';
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function getAhai(city_id) {
        if (city_id != '') {
            var dataString = 'city_id=' + city_id;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getAhai',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#hai_id_fk').removeClass("nonactive");

                    $('#hai_id_fk').addClass("selectpicker");
                    document.getElementById("hai_id_fk").removeAttribute("disabled", "disabled");
                    document.getElementById("hai_id_fk").setAttribute("data-validation", "required");
                    document.getElementById("hai_id_fk").setAttribute("data-show-subtext", "true");
                    document.getElementById("hai_id_fk").setAttribute("data-live-search", "true");
                    $('#hai_id_fk').html(html);
                    $('#hai_id_fk').selectpicker("refresh");
                }
            });
        } else if (city_id == '') {

            $('#hai_id_fk').removeClass("selectpicker");

            $("#hai_id_fk").val('');
            document.getElementById("hai_id_fk").removeAttribute("data-show-subtext", "true");
            document.getElementById("hai_id_fk").removeAttribute("data-live-search", "true");
            document.getElementById("hai_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("hai_id_fk").removeAttribute("data-validation", "required");
            $('#hai_id_fk').selectpicker("refresh");
        }
    }
</script>
<!---------------------------------------------------------------------------------------->


<script>
    function GetType(valu) {
        if (valu == 1) {
            document.getElementById("job_name_fk").removeAttribute("disabled", "disabled");
            document.getElementById("job_place_name").removeAttribute("disabled", "disabled");
            document.getElementById("job_address").removeAttribute("disabled", "disabled");
            document.getElementById("job_mob").removeAttribute("disabled", "disabled");
            document.getElementById("job_title").setAttribute("data-validation", "required");
            document.getElementById("employer").setAttribute("data-validation", "required");
            document.getElementById("work_address").setAttribute("data-validation", "required");
            document.getElementById("job_mob").setAttribute("data-validation", "required");

        } else {
            document.getElementById("job_name_fk").value = '';
            document.getElementById("job_place_name").value = '';
            document.getElementById("job_address").value = '';
            document.getElementById("job_mob").value = '';

            document.getElementById("job_name_fk").setAttribute("disabled", "disabled");
            document.getElementById("job_place_name").setAttribute("disabled", "disabled");
            document.getElementById("job_address").setAttribute("disabled", "disabled");
            document.getElementById("job_mob").setAttribute("disabled", "disabled");
            document.getElementById("job_name_fk").removeAttribute("data-validation", "required");
            document.getElementById("job_place_name").removeAttribute("data-validation", "required");
            document.getElementById("job_address").removeAttribute("data-validation", "required");
            document.getElementById("job_mob").removeAttribute("data-validation", "required");

        }


    }

</script>

<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>

    /***************************************/


    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    /*
      var today = cal1.getDate();
 var dd = today.getDate();

 var mm = today.getMonth()+1;
 var yyyy = today.getFullYear();
 if(dd<10)
 {
     dd='0'+dd;
 }

 if(mm<10)
 {
     mm='0'+mm;
 }

 melady_date = dd+'/'+mm+'/'+yyyy;
  alert(melady_date);
 /***********************/




    <?php
    if(!isset($result) && empty($result))
    { ?>
    date1.setAttribute("value", cal1.getDate().getDateString());

    date2.setAttribute("value", cal2.getDate().getDateString());
    <?php }?>
    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    <?php
    if(!isset($result) && empty($result))
    { ?>
    setDateFields1();
    <?php }?>

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
        date1.value = cal1.getDate().getDateString();
        date2.value = cal2.getDate().getDateString();
        <?php
        if(!isset($result) && empty($result))
        { ?>
        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
        <?php }?>
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

<script>


    var calEnd1 = new Calendar(),
        calEnd2 = new Calendar(true, 0, true, true),
        dateEnd1 = document.getElementById('date-Miladi-end'),
        dateEnd2 = document.getElementById('date-Hijri-end'),
        calEnd1Mode = calEnd1.isHijriMode(),
        calEnd2Mode = calEnd2.isHijriMode();

    <?php
    if(!isset($result) && empty($result))
    { ?>
    dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
    dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());
    <?php }?>
    document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
    document.getElementById('cal-end-2').appendChild(calEnd2.getElement());


    calEnd1.show();
    calEnd2.show();
    <?php
    if(!isset($result) && empty($result))
    { ?>
    setDateFieldsEnd1();


    <?php }?>


    calEnd1.callback = function () {
        if (calEnd1Mode !== calEnd1.isHijriMode()) {
            calEnd2.disableCallback(true);
            calEnd2.changeDateMode();
            calEnd2.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd2.setTime(calEnd1.getTime());
        setDateFieldsEnd1();
    };

    calEnd2.callback = function () {
        if (calEnd2Mode !== calEnd2.isHijriMode()) {
            calEnd1.disableCallback(true);
            calEnd1.changeDateMode();
            calEnd1.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd1.setTime(calEnd2.getTime());
        setDateFieldsEnd1();
    };


    calEnd1.onHide = function () {
        calEnd1.show(); // prevent the widget from being closed
    };

    calEnd2.onHide = function () {
        calEnd2.show(); // prevent the widget from being closed
    };


    function setDateFieldsEnd1() {
        dateEnd1.value = calEnd1.getDate().getDateString();
        dateEnd2.value = calEnd2.getDate().getDateString();
        <?php
        if(!isset($result) && empty($result))
        { ?>
        dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());

        <?php }?>


        var birth_date = calEnd2.getDate().getDateString();
        var res = birth_date.split("/");
        var year_birth = res[2];

        var current_year = '<?php echo $current_hijry_year?>';
        var ageYear = parseFloat(current_year) - parseFloat(year_birth);
        // alert(ageYear);
        $('#age').val(ageYear + 'سنه');
    }


    function showCalEnd1() {
        if (calEnd1.isHidden())
            calEnd1.show();
        else
            calEnd1.hide();
    }

    function showCalEnd2() {

        if (calEnd2.isHidden())
            calEnd2.show();

        else
            calEnd2.hide();


    }


    //# sourceURL=pen.js

</script>

<