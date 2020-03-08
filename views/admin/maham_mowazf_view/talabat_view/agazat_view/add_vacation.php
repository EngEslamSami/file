<style type="text/css">
   

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

    . {
        font-size: 14px;
        font-weight: 500;
        position: relative;

    }

    .right-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        right: 10px;
        top: 1px;
    }

    .left-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        left: 10px;
        top: 1px;
    }

    .personel-img {
        position: relative;
        overflow: hidden;
        height: 200px;
    }

    .personel-img .front {
        border: 2px solid #eee;
        border-radius: 5px;
    }

    .personel-img .front img {
        width: 100%;
        height: 200px;
    }

    .personel-img .back {
        position: absolute;
        bottom: -200px;
        opacity: 0;
        background: rgba(0, 0, 0, 0.7);
        width: 100%;
        height: 100%;
        transition: 0.3s all ease-in;
        -webkit-transition: 0.3s all ease-in;
        border: 2px solid #fcb632;
    }

    .personel-img:hover .back {
        opacity: 1;
        bottom: 0;
    }

    .personel-img .back i {
        background-color: #fcb632;
        color: #fff;
        padding: 7px;
        font-size: 34px;
        border-radius: 50%;
        margin: 47% 35%;
    }

    .personel-img .show-da {
        position: relative;
    }

    .bond-heading {
        background-color: #00713e;
        color: #fff;
        padding: 10px;
        border-radius: 3px;
    }

    .bond-heading .bond-title {
        margin: 0;
    }

    .bond-body {
        padding: 10px;
        border: 2px solid #ccc;
        display: inline-block;
        width: 100%;

    }

    td input[type=radio] {
        height: 18px;
        width: 18px;
    }

    .table-bordered.table-details tbody > tr > td {
        font-size: 13px !important;
        white-space: pre-line;
    }

</style>
<?php if ($_SESSION['role_id_fk'] == 1 || $_SESSION['role_id_fk'] == 3) { ?>
    <div class="col-sm-12 no-padding ">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">إضافة طلب إجازة</h3>
            </div>
            <?php
            if (isset($item) && !empty($item)) {
                $emp_id_fk = $item->emp_id_fk;
                $emp_name = $item->emp_name;
                $no3_agaza = $item->no3_agaza;
                $agaza_from_date_m = $item->agaza_from_date_m;
                $agaza_to_date_m = $item->agaza_to_date_m;
                $num_days = $item->num_days;
                $address_since_agaza = $item->address_since_agaza;
                $emp_jwal = $item->emp_jwal;

                $emp_badel_id_fk = $item->emp_badel_id_fk;
                $emp_badel_n = $item->emp_badel_n;
                $emp_badel_code_fk = $item->emp_badel_code_fk;
                $mobashret_amal_date_m = $item->mobashret_amal_date_m;
                $agaza_from_date_h = $item->agaza_from_date_h;
                $agaza_to_date_h = $item->agaza_to_date_h;
                $max_days = $item->max_days;
                $min_days = $item->min_days;
                $mobashret_amal_date_h = $item->mobashret_amal_date_h;
                $emp_id_fk = $item->emp_id_fk;
                $emp_code_fk = $item->emp_code_fk;
                $edara_id_fk = $item->edara_id_fk;
                $edara_n = $item->edara_n;
                $qsm_id_fk = $item->qsm_id_fk;
                $qsm_n = $item->qsm_n;
                $marad_name = $item->marad_name;
                $hospital_name = $item->hospital_name;
                $daraget_waffa = $item->daraget_waffa;

                $allDayes = $item->allDayes;


            } else {

                $emp_id_fk = '';
                $emp_name = '';
                $no3_agaza = '';
                $agaza_from_date_m = '';
                $agaza_to_date_m = date("m/d/Y", strtotime(date("m/d/Y") . ' + 1 days'));;
                $num_days = 1;
                $address_since_agaza = '';
                $emp_jwal = '';
                $promise = '';
                $emp_badel_id_fk = '';
                $emp_badel_n = '';
                $emp_badel_code_fk = '';
                $mobashret_amal_date_m = date("m/d/Y", strtotime(date("m/d/Y") . ' + 2 days'));
                $emp_badel_promise = '';
                $allDayes = '';
                $agaza_from_date_h = '';
                $agaza_to_date_h = '';
                $max_days = '';
                $min_days = '';
                $mobashret_amal_date_h = '';

                $emp_id_fk = '';
                $emp_code_fk = '';
                $edara_id_fk = '';
                $edara_n = '';
                $qsm_id_fk = '';
                $qsm_n = '';

                $marad_name = '';
                $hospital_name = '';
                $daraget_waffa = '';
            }
            ?>


            <div class="panel-body">
                <?php if (isset($side_data)) {
                    $class = 'col-sm-10';
                } else {
                    $class = 'col-sm-12';
                } ?>
                <div class="<?= $class ?> padding-4">
                    <?php
                    if (isset($item) && !empty($item)){
                    ?>
                    <form action="<?php echo base_url() . 'maham_mowazf/talabat/agazat/Vacation/edit_vacation/' . $item->id; ?>"
                          method="post" id="form1">

                        <?php } else{ ?>
                        <form action="<?php echo base_url(); ?>maham_mowazf/talabat/agazat/Vacation/add_vacation"
                              method="post" id="form1">

                            <?php } ?>

                            <input type="hidden" id="emp_id_fk" name="emp_id_fk"
                                   value="<?php if (!empty($emp_data->id)) {
                                       echo $emp_data->id;
                                   } else {
                                       echo $emp_id_fk;
                                   } ?> ">
                            <input type="hidden" id="edara_id_fk" name="edara_id_fk"
                                   value="<?php if (!empty($emp_data->administration)) {
                                       echo $emp_data->administration;
                                   } else {
                                       echo $edara_id_fk;
                                   } ?>  ">

                            <input type="hidden" id="qsm_id_fk" name="qsm_id_fk"
                                   value="<?php if (!empty($emp_data->department)) {
                                       echo $emp_data->department;
                                   } else {
                                       echo $qsm_id_fk;
                                   } ?>  ">


                            <?php $role = $_SESSION['role_id_fk']; ?>

                            <div class="col-md-12 no-padding">
                                <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                                    <label class="label ">نوع الاجازه</label>

                                    <select name="no3_agaza" id="no3_agaza" onchange="checkValidateVacationDayes();
                        $('#max_days').val($('option:selected', this).attr('data-max'));
                        $('#min_days').val($('option:selected', this).attr('data-min'));
                        get_option($(this).val()); "
                                            data-validation="required" class="form-control bottom-input">


                                        <option data-min="" data-max="" value=" " selected="">اختر</option>
                                        <?php
                                        foreach ($vacations as $row) {
                                            ?>
                                            <option data-min="<?= $row->min_days ?>"
                                                    data-max="<?= $row->max_days ?>"
                                                    data-type="<?= $row->agaza_ttype ?>"
                                                    data-mowazf_badel="<?= $row->mowazf_badel ?>"
                                                    value="<?php echo $row->id; ?>"
                                                <?php if ($row->id == $no3_agaza) {
                                                    echo 'selected';
                                                } ?>
                                            ><?php echo $row->name; ?></option>
                                        <?php } ?>
                                        <!--<option value="0" <?php if ($no3_agaza == 0) {
                                            echo 'selected';
                                        } ?>>اضطراريه
                                        </option> -->
                                    </select>

                                </div>

                                <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                                    <label class="label ">اسم الموظف</label>
                                    <input name="" id="emp_name" class="form-control" style="width:84%; float: right;"
                                           readonly
                                           onchange="checkValidateVacationDayes();"
                                           value="<?php if (!empty($emp_data->employee)) {
                                               echo $emp_data->employee;
                                           } else {
                                               echo $emp_name;
                                           } ?>">
                                    <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                            class="btn btn-success btn-next" style="float: right;"
                                            onclick="GetDiv_emps('myDiv_emp')" <?php if (!empty($emp_data->employee)) {
                                        echo 'disabled';
                                    } ?>>
                                        <i class="fa fa-plus"></i></button>

                                </div>
                                <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                                    <label class="label "> الرقم الوظيفي</label>
                                    <input name="emp_code_fk" id="emp_code" class="form-control"
                                           value="<?php if (!empty($emp_data->emp_code)) {
                                               echo $emp_data->emp_code;
                                           } else {
                                               echo $emp_code_fk;
                                           } ?>" readonly>
                                </div>
                                <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                                    <label class="label "> المسمى الوظيفي</label>
                                    <input name="job_title" id="job_title" class="form-control"
                                           value="<?php if (!empty($emp_data->job_title)) {
                                               echo $emp_data->job_title;
                                           } ?>" readonly>
                                </div>
                                <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                                    <label class="label "> الأدارة </label>
                                    <input name="edara_n" id="edara_n" class="form-control"
                                           value="<?php if (!empty($emp_data->administration_name)) {
                                               echo $emp_data->administration_name;
                                           } else {
                                               echo $edara_n;
                                           } ?>" readonly>
                                </div>
                                <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                                    <label class="label "> القسم</label>
                                    <input name="qsm_n" id="qsm_n" class="form-control"
                                           value="<?php if (!empty($emp_data->departments_name)) {
                                               echo $emp_data->departments_name;
                                           } else {
                                               echo $qsm_n;
                                           } ?>" readonly>
                                </div>

                                <div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document" style="width: 80%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        onclick="$('#myModal_emps').modal('hide')"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel"></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="myDiv_emp"></div>
                                            </div>
                                            <div class="modal-footer" style="display: inline-block;width: 100%">
                                                <button type="button" class="btn btn-danger"
                                                        style="float: left;" onclick="$('#myModal_emps').modal('hide')">
                                                    إغلاق
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
                                    <label class="label ">الرصيد المتاح</label>
                                    <input type="text" readonly="readonly" name="allDayes" id="allDayes"
                                           value="<?= $allDayes ?>"
                                           class="form-control bottom-input"
                                           onkeypress="validate_number(event);"
                                           data-validation-has-keyup-event="true">
                                </div>

                                <div class="form-group col-md-3  col-sm-6 padding-4">
                                    <label class="label text-center">
                                        <img style="width: 19px;float: right;"
                                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                        تاريخ بداية الإجازة
                                        <img style="width: 19px;float: left;"
                                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                    </label>

                                    <div id="cal-end-2" style="width: 50%;float: right;">
                                        <input id="date-Hijri-start" name="agaza_from_date_h"
                                               class="form-control bottom-input " type="text"
                                               onfocus="showCalEnd2();" value="<?= $agaza_from_date_h ?>"
                                               style=" width: 100%;float: right"/>
                                    </div>
                                    <div id="cal-end-1" style="width: 50%;float: left;">
                                        <input id="start_date" name="agaza_from_date_m"
                                               class="form-control bottom-input "
                                               type="text" onfocus="showCalEnd1();"
                                               value="<?php echo $agaza_from_date_m; ?>"
                                               style=" width: 100%;float: right" onchange="get_date();"/>
                                    </div>
                                </div>


                                <div class="form-group col-md-3  col-sm-6 padding-4">
                                    <label class="label text-center">
                                        <img style="width: 19px;float: right;"
                                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                        تاريخ نهاية الإجازة
                                        <img style="width: 19px;float: left;"
                                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                    </label>

                                    <div id="cal-end-4" style="width: 50%;float: right;">
                                        <input id="agaza_to_date_h" name="agaza_to_date_h"
                                               class="form-control bottom-input " type="text"
                                               onfocus="showCalEnd4();" value="<?= $agaza_to_date_h ?>"
                                               style=" width: 100%;float: right"/>
                                    </div>
                                    <div id="cal-end-3" style="width: 50%;float: left;">
                                        <input id="end_date" name="agaza_to_date_m" class="form-control bottom-input "
                                               type="text" onfocus="showCalEnd3();"
                                               value="<?php echo $agaza_to_date_m; ?>"
                                               style=" width: 100%;float: right"/>
                                    </div>
                                </div>

                                <div class="form-group col-md-1  col-sm-6 padding-4">


                                    <label class="label ">عدد الأيام</label>
                                    <input type="text" readonly="readonly" name="num_days" id="num_days"
                                           value="<?php echo $num_days; ?>"
                                           class="form-control bottom-input"
                                           data-validation="required" onkeypress="validate_number(event);"
                                           data-validation-has-keyup-event="true">


                                    <!--                                    <div id="cal-end-4" style="width: 33%;float: right;     padding-right: 3px;">-->
                                    <!--                                        <label class="label ">أقصى عدد </label>-->
                                    <input type="hidden" name="max_days" id="max_days"
                                           value="<?= $max_days ?>">
                                    <!--                                    </div>-->

                                    <!--                                    <div id="cal-end-4" style="width: 33%;float: right;     padding-right: 3px;">-->
                                    <!--                                        <label class="label ">أقل عدد </label>-->
                                    <input type="hidden" name="min_days" id="min_days"
                                           value="<?= $min_days ?>">
                                    <!--                                    </div>-->
                                </div>

                                <div class="form-group col-md-3  col-sm-6 padding-4">
                                    <label class="label text-center">
                                        <img style="width: 19px;float: right;"
                                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                        تاريخ مباشره العمل
                                        <img style="width: 19px;float: left;"
                                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                    </label>

                                    <div id="cal-end-6" style="width: 50%;float: right;">
                                        <input
                                                name="mobashret_amal_date_h" id="mobashret_amal_date_h" value=""
                                                readonly=""
                                                class="form-control bottom-input " type="text"
                                                onfocus="showCalEnd6();" value=""
                                                style=" width: 100%;float: right"/>
                                    </div>
                                    <div id="cal-end-5" style="width: 50%;float: left;">
                                        <input class="form-control bottom-input "
                                               name="mobashret_amal_date_m" id="back_work" readonly=""
                                               type="text" onfocus="showCalEnd5();"
                                               value="<?php echo $mobashret_amal_date_m; ?>"
                                               style=" width: 100%;float: right"/>
                                    </div>
                                </div>


                                <div class="form-group col-md-3  col-sm-6 padding-4">
                                    <label class="label ">العنوان اثناء الاجازه</label>
                                    <input id="adress" <?php if ($no3_agaza == 0) { ?><?php } ?>
                                           data-validation="" name="address_since_agaza"
                                           class="form-control bottom-input"
                                           style="margin: 0" value="<?php echo $address_since_agaza; ?>">
                                </div>


                                <div class="form-group col-md-2  col-sm-6 padding-4">
                                    <label class="label ">الجوال
                                        <small style="color: red;">رقم الجوال 10 ارقام فقط</small>
                                    </label>
                                    <input type="text" maxlength="10"
                                           onkeyup="get_length($(this).val());" <?php if ($no3_agaza == 0) { ?>  disabled="disabled"<?php } ?>
                                           name="emp_jwal" id="mob"
                                           value="<?php if (!empty($emp_data->id)) echo $emp_data->phone; else echo $emp_jwal; ?>"
                                           class="form-controاسم الموظف
l bottom-input"
                                           data-validation="required"
                                           data-validation-has-keyup-event="true">

                                </div>


                                <?php if (!empty($marad_name)) $display = 'block'; else $display = 'none'; ?>
                                <div class="col-md-12 no-padding" id="agaza_mardia_div"
                                     style="display: <?= $display ?>">
                                    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                                        <label class="label "> اسم المرض </label>
                                        <input type="text" name="marad_name"
                                               id="marad_name" class="form-control " value="<?= $marad_name ?>">
                                    </div>

                                    <div class="form-group col-md-3  col-sm-6 padding-4">
                                        <label class="label ">
                                            <img style="width: 19px;float: right;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                            بداية التقرير الطبي
                                            <img style="width: 19px;float: left;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                        </label>

                                        <div id="cal-end-8" style="width: 50%;float: right;">
                                            <input
                                                    name="taqrer_form_date_h" id="taqrer_form_date_h"
                                                    class="form-control bottom-input " type="text"
                                                    onfocus="showCalEnd8();"
                                                    style=" width: 100%;float: right"/>
                                        </div>
                                        <div id="cal-end-7" style="width: 50%;float: left;">
                                            <input class="form-control bottom-input "
                                                   name="taqrer_form_date_m" id="taqrer_form_date_m"
                                                   type="text" onfocus="showCalEnd7();"
                                                   style=" width: 100%;float: right"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3  col-sm-6 padding-4">
                                        <label class="label ">
                                            <img style="width: 19px;float: right;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                            نهاية التقرير الطبي
                                            <img style="width: 19px;float: left;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                        </label>

                                        <div id="cal-end-10" style="width: 50%;float: right;">
                                            <input
                                                    name="taqrer_to_date_h" id="taqrer_to_date_h"
                                                    class="form-control bottom-input " type="text"
                                                    onfocus="showCalEnd10();"
                                                    style=" width: 100%;float: right"/>
                                        </div>
                                        <div id="cal-end-9" style="width: 50%;float: left;">
                                            <input class="form-control bottom-input "
                                                   name="taqrer_to_date_m" id="taqrer_to_date_m"
                                                   type="text" onfocus="showCalEnd9();"
                                                   style=" width: 100%;float: right"/>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                                        <label class="label "> اسم المستشفى </label>
                                        <input type="text" name="hospital_name"
                                               id="hospital_name" class="form-control " value="<?= $hospital_name ?>">
                                    </div>

                                </div>
                                <?php if (!empty($daraget_waffa)) {
                                    $display = 'block';
                                } else {
                                    $display = 'none';
                                } ?>
                                <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4" id="daraget_waffa_div"
                                     style="display: <?= $display ?>">

                                    <label class="label "> درجة الوفاة </label>
                                    <input type="text" name="daraget_waffa"
                                           id="marad_name" class="form-control " value="<?= $daraget_waffa ?>">


                                </div>

                                <?php if (!empty($emp_badel_id_fk)) {
                                    $display = 'block';
                                } else {
                                    $display = 'none';
                                } ?>

                                <div class="col-md-12 no-padding" id="mowazf_badel_div"
                                     style="display: <?= $display ?>">

                                    <div class="bond panel-default">
                                        <div class="bond-heading">
                                            <h5 class="bond-title">إقرار الموظف البديل</h5>
                                        </div>
                                        <div class="bond-body">
                                            <div class="form-group col-md-8 col-sm-8 col-xs-12 padding-4">
                                                <div class="check-style" style=" margin-top: 20px;">
                                                <input type="checkbox" name="pledge" id="pledge"  value="1"    data-validation="required"
                                                        <?php if (!empty($emp_badel_id_fk)) {
                                                            echo 'checked';
                                                        } ?> />
                                              <label for="pledge">       اتعهد بتسليم كل مهامي للموظف البديل والعودة من الأجازات فى الموعد
                                                    المحدد .
                                                </label>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-4">
                                                <label class="label ">الموظف البديل</label>
                                                <input type="text" style="width:85%; float: right;" name="emp_badel_n"
                                                       data-validation="required" value="<?= $emp_badel_n ?>"
                                                       id="mowazf_badel" class="form-control " readonly>
                                                <button type="button"
                                                        class="btn btn-success btn-next" style="float: right;"
                                                        onclick="GetDiv('myDiv')">
                                                    <i class="fa fa-plus"></i></button>
                                                <input type="hidden" name="emp_badel_id_fk" id="mowazf_badel_id"
                                                       value="<?= $emp_badel_id_fk ?>">
                                                <input type="hidden" name="emp_badel_code_fk" id="mowazf_badel_code"
                                                       value="<?= $emp_badel_code_fk ?>">
                                            </div>

                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="col-xs-12 text-center" style="margin-top: 15px">
                                <input type="hidden" name="add" value="add">
                                <button type="button" onclick="return checkValidateMaxMin();"
                                        class="btn btn-labeled btn-success " id="reg" name="add" value="حفظ"
                                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                                <button type="button" class="btn btn-labeled btn-danger ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                                </button>

                                <button type="button" class="btn btn-labeled btn-purple ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                                </button>


                                <button type="button" class="btn btn-labeled btn-inverse " id="attach_button"
                                        data-target="#myModal_search" data-toggle="modal">
                                    <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                                </button>


                            </div>

                        </form>
                </div>

            </div>
        </div>

    </div>

    <?php
    if (isset($items) && !empty($items)) {
        ?>
        <div class="col-sm-12 no-padding ">

            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title">طلبات الإجازة</h3>
                </div>
                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr class="visible-md visible-lg greentd">
                        <th>م</th>
                        <th>نوع الاجازه</th>
                        <th>بدايه الاجازه</th>
                        <th>نهايه الاجازه</th>
                        <th>عدد الايام المطلوبه</th>
                        <th>التفاصيل</th>
                        <th> الاجراء</th>
                        <th>حاله الطلب</th>


                    </tr>

                    </thead>
                    <tbody>

                    <?php
                    if (isset($items) && !empty($items)) {
                        $x = 1;

                        foreach ($items as $row) {
                            if ($row->suspend == 0) {
                                $halet_eltalab = 'جاري ';
                                $halet_eltalab_class = 'warning';
                            } elseif ($row->suspend == 1) {
                                $halet_eltalab = 'تم قبول الطلب ';
                                $halet_eltalab_class = 'success';
                            } elseif ($row->suspend == 2) {
                                $halet_eltalab = 'تم رفض الطلب ';
                                $halet_eltalab_class = 'danger';
                            } elseif ($row->suspend == 4) {
                                $halet_eltalab = 'تم اعتماد الطلب بالموافقة ';
                                $halet_eltalab_class = 'success';
                            } elseif ($row->suspend == 5) {
                                $halet_eltalab = 'تم اعتماد الطلب بالرفض ';
                                $halet_eltalab_class = 'danger';
                            } else {
                                $halet_eltalab = 'غير محدد ';
                                $halet_eltalab_class = 'danger';
                            }

                            ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->agaza_from_date_m; ?></td>
                                <td><?php echo $row->agaza_to_date_m; ?></td>
                                <td><?php echo $row->num_days; ?></td>
                                <td>
                                    <a type="button" class="btn btn-info btn-xs" style="padding: 1px 6px;"
                                       data-toggle="modal" title="التفاصيل"
                                       onclick="get_details_agaza(<?= $row->id ?>,'<?php echo $row->employee; ?>');"
                                       data-target="#myModal"> <i class="fa fa-list"></i>
                                    </a>
                                </td>
                                <td>
                                    <?php
                                    if ($row->suspend == 0) { ?>
                                        <a onclick='swal({
                                                title: "هل انت متأكد من التعديل ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-warning",
                                                confirmButtonText: "تعديل",
                                                cancelButtonText: "إلغاء"
                                                },
                                                function(){
                                                edite_agaza(<?php echo $row->id; ?>);});'><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                        <a onclick='swal({
                                                title: "هل انت متأكد من الحذف ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-danger",
                                                confirmButtonText: "حذف",
                                                cancelButtonText: "إلغاء"
                                                },
                                                function(){
                                                swal("تم الحذف!", "", "success");
                                                window.location="<?php echo base_url(); ?>maham_mowazf/talabat/agazat/Vacation/delete_vacation/<?php echo $row->id; ?>";
                                                });'><i
                                                    class="fa fa-trash"
                                                    aria-hidden="true"></i>
                                        </a>
                                    <?php } else { ?>
                                        <span class="label label-danger">
                               عذرا لا يمكنك التعديل والحذف
                                 </span>

                                    <?php } ?>

                                </td>
                                <td>
                                <span class="label label-<?php echo $halet_eltalab_class ?>">
                                <?php echo $halet_eltalab; ?>
                                 </span>
                                </td>
                            </tr>
                            <?php
                            $x++;
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>

    <?php } ?>
    <!--------------------------------------------------------modal------------------------------------>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog " style="width: 80%" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="$('#myModal').modal('hide')" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel_h"></h4>
                </div>
                <div class="modal-body" id="details_agaza">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="float: left"
                            onclick="$('#myModal').modal('hide')">
                        إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="$('#myModalInfo').modal('hide')"
                            aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> الموظف البديل </h4>
                </div>
                <div class="modal-body">
                    <div id="myDiv"></div>
                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%">
                    <button type="button" class="btn btn-danger"
                            style="float: left;" onclick="$('#myModalInfo').modal('hide')">إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!--------------------------------------------------------------->


<script>
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                exportOptions: {columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    });
</script>


<script>
    function get_details_agaza(id, name) {
        $('#myModalLabel_h').text(name);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/talabat/agazat/Vacation/get_details_agaza",
            data: {id: id},
            success: function (d) {

                $('#details_agaza').html(d);
            }
        });
    }

</script>

<script>

    function GetDiv_emps(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> أسم الموظف  </th>' +
            '<th style="width: 170px;" >الأدارة   </th>' +
            '<th style="width: 170px;" >القسم</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>maham_mowazf/talabat/agazat/Vacation/getConnection_emp/',

            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });
    }

    //8-6-om
    function Get_emp_Name(obj) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var emp_code = obj.dataset.emp_code;
        var edara_id = obj.dataset.edara_id;
        var edara_n = obj.dataset.edara_n;
        var job_title = obj.dataset.job_title;
        var qsm_id = obj.dataset.qsm_id;
        var qsm_n = obj.dataset.qsm_n;
        var adress = obj.dataset.adress;
        var emp_phone = obj.dataset.phone;

        document.getElementById('emp_name').value = name;
        document.getElementById('emp_id_fk').value = obj.value;
        document.getElementById('emp_code').value = emp_code;
        document.getElementById('edara_n').value = edara_n;
        document.getElementById('edara_id_fk').value = edara_id;
        document.getElementById('job_title').value = job_title;
        document.getElementById('qsm_n').value = qsm_n;
        document.getElementById('qsm_id_fk').value = qsm_id;
        document.getElementById('adress').value = adress;
        document.getElementById('mob').value = emp_phone;

        checkValidateVacationDayes();

        $("#myModal_emps ").modal('hide');

    }

</script>

<script>

    function save_me() {

        swal({
            title: "هل تريد حفظ طلب الأجازة!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالحفظ!",
        }, function () {
            $('#form1').submit();

        });

    }
</script>
<script>

    function checkValidateMaxMin() {
        if ($('#no3_agaza').val() != ' ') {
            if (parseFloat($('#num_days').val()) <= parseFloat($('#max_days').val())) {
                if (parseFloat($('#num_days').val()) <= parseFloat($('#allDayes').val())) {
                    save_me();
                } else {
                    swal({
                        title: 'المدة المحددة لا يجب أن تتخطى الرصيد المتاح   ',
                        text: ' الرصيد المتاح :' + $('#allDayes').val() + '  ',
                        type: 'warning',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'تم'
                    });
                    return false;
                }
            } else {
                swal({
                    title: 'المدة المحددة لا يجب أن تتخطى أقصى عدد من الأيام  ',
                    text: ' اقصى عدد :' + $('#max_days').val() + '  ',
                    type: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'تم'
                });
                return false;
            }
        } else {
            swal({
                title: 'يجب إختيار نوع الاجازة  ',
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'تم'
            });
            return false;
        }

    }

</script>
<script>

    function GetMemberName(obj) {
        console.log(' obj :' + obj.dataset.name);
        var name = obj.dataset.name;
        var id = obj.dataset.id;
        var code = obj.dataset.code;
        document.getElementById('mowazf_badel').value = name;
        document.getElementById('mowazf_badel_id').value = id;
        document.getElementById('mowazf_badel_code').value = code;
        $("#myModalInfo ").modal('hide');

    }

</script>

<script>

    function GetDiv(div) {
        var emp_id = $('#emp_id_fk').val();

        console.log('emp_id:' + emp_id);
        if (emp_id == ' ') {
            swal({
                title: 'من فضلك اختر الموظف اولاً',
                text: "",
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'تم'
            });
        } else {
            $('#myModalInfo').modal('toggle');
            $('#myModalInfo').modal('show');

            html = '<div class="col-md-12 no-padding"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الموظف </th><th style="width: 50px;"> الإسم </th><th style="width: 170px;" >الجوال </th>' +
                '</tr></thead><table><div id="dataMember"></div></div>';
            $("#" + div).html(html);
            $('#js_table_members').show();
            var oTable_usergroup = $('#js_table_members').DataTable({
                "ordering": true,
                dom: 'Bfrtip',
                "ajax": '<?php echo base_url(); ?>maham_mowazf/talabat/agazat/Vacation/GetReplacementEmployee/' + emp_id + '/',

                aoColumns: [
                    {"bSortable": false},
                    {"bSortable": false},
                    {"bSortable": false},
                    {"bSortable": false}
                ],

                buttons: [
                    'pageLength',
                    'copy',
                    'excelHtml5',
                    {
                        extend: "pdfHtml5",
                        orientation: 'landscape'
                    },
                    {
                        extend: 'print',
                        exportOptions: {columns: ':visible'},
                        orientation: 'landscape'
                    },
                    'colvis'
                ],

                colReorder: true,
                destroy: true

            });
        }
    }


</script>

<script type="text/javascript">

    function checkValidateVacationDayes() {

        var vacations = $('#no3_agaza').val();
        var emp = $('#emp_code').val();
        if (emp != '' && vacations != '') {
            console.log('vacations :' + vacations + "\n emp : " + emp);
            var request = $.ajax({
                url: "<?php echo base_url() . 'maham_mowazf/talabat/agazat/Vacation/get_avalibal_days'?>",
                type: "POST",
                data: {emp_id: emp, vac_id: vacations},
            });
            request.done(function (msg) {

                if (msg === 'false') {
                    // console.log(" if json " );
                } else {
                    // console.log(" else json " );
                    var obj = JSON.parse(msg);
                    $('#allDayes').val(obj.ava_days);
                    $('#vDays').val(obj.vDays);
                    if (vacations == 0) {
                        $('#max_days').val(obj.casual_vacation_num);
                        $('#min_days').val(1);
                    }
                    // var num_days= $('#num_days').val();
                    // $('#after_days').val(obj.ava_days - num_days );
                }
            });
            request.fail(function (jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);
            });
        }

    }

</script>


<script type="text/javascript">
    function gmod(n, m) {
        return ((n % m) + m) % m;
    }

    function kuwaiticalendar(adjust) {
        var today = new Date(document.getElementById("back_work").value);

        if (adjust) {
            adjustmili = 1000 * 60 * 60 * 24 * adjust;
            todaymili = today.getTime() + adjustmili;
            today = new Date(todaymili);
        }
        day = today.getDate();
        month = today.getMonth();
        year = today.getFullYear();
        m = month + 1;
        y = year;
        if (m < 3) {
            y -= 1;
            m += 12;
        }

        a = Math.floor(y / 100.);
        b = 2 - a + Math.floor(a / 4.);
        if (y < 1583) b = 0;
        if (y == 1582) {
            if (m > 10) b = -10;
            if (m == 10) {
                b = 0;
                if (day > 4) b = -10;
            }
        }

        jd = Math.floor(365.25 * (y + 4716)) + Math.floor(30.6001 * (m + 1)) + day + b - 1524;

        b = 0;
        if (jd > 2299160) {
            a = Math.floor((jd - 1867216.25) / 36524.25);
            b = 1 + a - Math.floor(a / 4.);
        }
        bb = jd + b + 1524;
        cc = Math.floor((bb - 122.1) / 365.25);
        dd = Math.floor(365.25 * cc);
        ee = Math.floor((bb - dd) / 30.6001);
        day = (bb - dd) - Math.floor(30.6001 * ee);
        month = ee - 1;
        if (ee > 13) {
            cc += 1;
            month = ee - 13;
        }
        year = cc - 4716;


        wd = gmod(jd + 1, 7) + 1;

        iyear = 10631. / 30.;
        epochastro = 1948084;
        epochcivil = 1948085;

        shift1 = 8.01 / 60.;

        z = jd - epochastro;
        cyc = Math.floor(z / 10631.);
        z = z - 10631 * cyc;
        j = Math.floor((z - shift1) / iyear);
        iy = 30 * cyc + j;
        z = z - Math.floor(j * iyear + shift1);
        im = Math.floor((z + 28.5001) / 29.5);
        if (im == 13) im = 12;
        id = z - Math.floor(29.5001 * im - 29);

        var myRes = new Array(8);

        myRes[0] = day; //calculated day (CE)
        myRes[1] = month; //calculated month (CE)
        myRes[2] = year; //calculated year (CE)
        myRes[3] = jd - 1; //julian day number
        myRes[4] = wd - 1; //weekday number
        myRes[5] = id; //islamic date
        myRes[6] = im; //islamic month
        myRes[7] = iy; //islamic year

        return myRes;
    }

    function writeIslamicDate(adjustment) {
        var wdNames = new Array("Ahad", "Ithnin", "Thulatha", "Arbaa", "Khams", "Jumuah", "Sabt");
        var iMonthNames = new Array("Muharram", "Safar", "Rabi'ul Awwal", "Rabi'ul Akhir",
            "Jumadal Ula", "Jumadal Akhira", "Rajab", "Sha'ban",
            "Ramadan", "Shawwal", "Dhul Qa'ada", "Dhul Hijja");
        var iDate = kuwaiticalendar(adjustment);
        var outputIslamicDate = (iDate[5]) + '/' + (iDate[6]) + '/' + iDate[7];
        return outputIslamicDate;
    }
</script>

<script type="text/javascript">
    Date.prototype.addDays = function (days) {
        var date = new Date(this.valueOf());

        time1 = Math.abs(date.getTime());

        time2 = 1000 * 3600 * 24 * days;

        total = time1 + time2;

        date = new Date(total);

        return date;
    }
</script>

<script>

    function get_date(end_date, start_date) {
        if (end_date == '' || start_date == '') {
            return 1;
        }
        var a = new Date(end_date);
        var x = new Date(start_date);

        diffDays = '';
        if (a >= x) {
            var timeDiff = Math.abs(a.getTime() - x.getTime());
            diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

            var date = new Date(document.getElementById("end_date").value);
            day = date.addDays(1).getDate();
            month = date.addDays(1).getMonth() + 1;
            year = date.addDays(1).getFullYear();
            document.getElementById("back_work").value = month + '/' + day + '/' + year;

            document.getElementById("mobashret_amal_date_h").value = writeIslamicDate();

            document.getElementById("num_days").value = diffDays + 1;
            return diffDays + 1;
        } else {

            swal({
                title: 'لا يجب أن يسبق تاريخ نهاية الإجازة تاريخ بدايته!',
                type: 'warning',
                confirmButtonText: 'تم'
            });
            document.getElementById("end_date").value = '';
            document.getElementById("agaza_to_date_h").value = '';
            document.getElementById("num_days").value = '';
            document.getElementById("mobashret_amal_date_h").value = '';
            document.getElementById("back_work").value = '';
            return diffDays;

        }
    }
</script>
<script>

    function get_option(valu) {

        if (valu == 0) {
            $('#mowazf_badel_div').hide();

            document.getElementById("mob").setAttribute("disabled", "disabled");
            document.getElementById("num_days").setAttribute("disabled", "disabled");
            document.getElementById("back_work").setAttribute("disabled", "disabled");

        } else {
            var mowazf_badel = $("select#no3_agaza").find("option:selected").attr('data-mowazf_badel');

            if (valu == 3 || valu == 4) {
                $('#agaza_mardia_div').show();
                $('#daraget_waffa_div').hide();

            } else if (valu == 5) {
                $('#daraget_waffa_div').show();
                $('#agaza_mardia_div').hide();
            } else {
                $('#daraget_waffa_div').hide();
                $('#agaza_mardia_div').hide();
            }
            if (mowazf_badel == 1) {
                $('#mowazf_badel_div').show();
                document.getElementById("pledge").setAttribute("data-validation", "required");
                document.getElementById("mowazf_badel").setAttribute("data-validation", "required");
            } else {
                document.getElementById("pledge").removeAttribute("data-validation", "required");
                document.getElementById("mowazf_badel").removeAttribute("data-validation", "required");
                $('#mowazf_badel_div').hide();
            }

            document.getElementById("mob").removeAttribute("disabled", "disabled");
            document.getElementById("num_days").removeAttribute("disabled", "disabled");
            document.getElementById("back_work").removeAttribute("disabled", "disabled")

        }
    }

</script>

<script>

    function get_length(valu) {

        if (valu.length > 10) {
            document.getElementById("reg").setAttribute("disabled", "disabled");

        }
        if (valu.length < 10) {
            document.getElementById("reg").setAttribute("disabled", "disabled");

        }
        if (valu.length == 10) {
            document.getElementById("reg").removeAttribute("disabled", "disabled");

        }
    }

</script>


<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>

    var loop1 = loop2 = loop3 = loop4 = loop5 = loop6 = 0;
    var calEnd1 = new Calendar(),
        calEnd2 = new Calendar(true, 0, true, true),
        dateEnd1 = document.getElementById('start_date'),
        dateEnd2 = document.getElementById('date-Hijri-start'),
        calEnd1Mode = calEnd1.isHijriMode(),
        calEnd2Mode = calEnd2.isHijriMode();


    dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
    dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());

    document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
    document.getElementById('cal-end-2').appendChild(calEnd2.getElement());


    calEnd1.show();
    calEnd2.show();
    setDateFieldsEnd1();


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
        if (loop1 == 0) {
            <?php if (isset($item) && $item != null) { ?>
            loop1++;
            dateEnd1.value = '<?=$agaza_from_date_m?>';
            dateEnd2.value = '<?=$agaza_from_date_h?>';
            <?php } else { ?>
            dateEnd1.value = calEnd1.getDate().getDateString();
            dateEnd2.value = calEnd2.getDate().getDateString();
            <?php } ?>
        } else {
            dateEnd1.value = calEnd1.getDate().getDateString();
            dateEnd2.value = calEnd2.getDate().getDateString();
        }
        var diffDays = get_date(document.getElementById("end_date").value, dateEnd1.value);
        document.getElementById("num_days").value = diffDays;

        dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());
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

</script>
<script>


    var calEnd3 = new Calendar(),
        calEnd4 = new Calendar(true, 0, true, true),
        dateEnd3 = document.getElementById('end_date'),
        dateEnd4 = document.getElementById('agaza_to_date_h'),
        calEnd3Mode = calEnd3.isHijriMode(),
        calEnd4Mode = calEnd4.isHijriMode();


    // var date1 = new Date(document.getElementById("start_date").value);
    // dateEnd3 = date1.addDays(1);

    dateEnd3.setAttribute("value", calEnd3.getDate().getDateString());
    dateEnd4.setAttribute("value", calEnd4.getDate().getDateString());

    document.getElementById('cal-end-3').appendChild(calEnd3.getElement());
    document.getElementById('cal-end-4').appendChild(calEnd4.getElement());


    calEnd3.show();
    calEnd4.show();
    setDateFieldsEnd2();


    calEnd3.callback = function () {
        if (calEnd3Mode !== calEnd3.isHijriMode()) {
            calEnd4.disableCallback(true);
            calEnd4.changeDateMode();
            calEnd4.disableCallback(false);
            calEnd3Mode = calEnd3.isHijriMode();
            calEnd4Mode = calEnd4.isHijriMode();
        } else

            calEnd4.setTime(calEnd3.getTime());
        setDateFieldsEnd2();
    };

    calEnd4.callback = function () {
        if (calEnd4Mode !== calEnd4.isHijriMode()) {
            calEnd3.disableCallback(true);
            calEnd3.changeDateMode();
            calEnd3.disableCallback(false);
            calEnd3Mode = calEnd3.isHijriMode();
            calEnd4Mode = calEnd4.isHijriMode();
        } else

            calEnd3.setTime(calEnd4.getTime());
        setDateFieldsEnd2();
    };


    calEnd3.onHide = function () {
        calEnd3.show(); // prevent the widget from being closed

    };

    calEnd4.onHide = function () {
        calEnd4.show(); // prevent the widget from being closed

    };


    function setDateFieldsEnd2() {
        if (loop2 == 0) {
            <?php if (isset($item) && $item != null) { ?>
            loop2++;
            dateEnd3.value = '<?=$agaza_to_date_m?>';
            dateEnd4.value = '<?=$agaza_to_date_h?>';
            <?php } else { ?>
            dateEnd3.value = calEnd3.getDate().getDateString();
            dateEnd4.value = calEnd4.getDate().getDateString();
            <?php } ?>
        } else {
            dateEnd3.value = calEnd3.getDate().getDateString();
            dateEnd4.value = calEnd4.getDate().getDateString();
        }
        var diffDays = get_date(dateEnd3.value, dateEnd1.value);

        dateEnd3.setAttribute("value", calEnd3.getDate().getDateString());
        dateEnd4.setAttribute("value", calEnd4.getDate().getDateString());
    }


    function showCalEnd3() {
        if (calEnd3.isHidden())
            calEnd3.show();
        else
            calEnd3.hide();

    }

    function showCalEnd4() {
        if (calEnd4.isHidden())
            calEnd4.show();
        else
            calEnd4.hide();
    }

    /////////////////////////////////////////////


</script>
<script>

    /*  var calEnd5 = new Calendar(),
          calEnd6 = new Calendar(true, 0, true, true),
          dateEnd5 = document.getElementById(''),
          dateEnd6 = document.getElementById(''),
          calEnd5Mode = calEnd5.isHijriMode(),
          calEnd6Mode = calEnd6.isHijriMode();

      var date = new Date(document.getElementById("end_date").value);
      dateEnd5 = date.addDays(1);

      dateEnd5.setAttribute("value", calEnd5.getDate().getDateString());
      dateEnd6.setAttribute("value", calEnd6.getDate().getDateString());


      document.getElementById('cal-end-5').appendChild(calEnd5.getElement());
      document.getElementById('cal-end-6').appendChild(calEnd6.getElement());


      calEnd5.show();
      calEnd6.show();
      setDateFieldsEnd5();


      calEnd5.callback = function () {
          if (calEnd5Mode !== calEnd5.isHijriMode()) {
              calEnd6.disableCallback(true);
              calEnd6.changeDateMode();
              calEnd6.disableCallback(false);
              calEnd5Mode = calEnd5.isHijriMode();
              calEnd6Mode = calEnd6.isHijriMode();
          } else

              calEnd6.setTime(calEnd5.getTime());
          setDateFieldsEnd5();
      };

      calEnd6.callback = function () {
          if (calEnd6Mode !== calEnd6.isHijriMode()) {
              calEnd5.disableCallback(true);
              calEnd5.changeDateMode();
              calEnd5.disableCallback(false);
              calEnd5Mode = calEnd5.isHijriMode();
              calEnd6Mode = calEnd6.isHijriMode();
          } else

              calEnd5.setTime(calEnd6.getTime());
          setDateFieldsEnd5();
      };


      calEnd5.onHide = function () {
          calEnd5.show(); // prevent the widget from being closed

      };

      calEnd6.onHide = function () {
          calEnd6.show(); // prevent the widget from being closed

      };


      function setDateFieldsEnd5() {
          dateEnd5.value = calEnd5.getDate().getDateString();
          dateEnd6.value = calEnd6.getDate().getDateString();

          console.log(document.getElementById("end_date").value);

          dateEnd5.setAttribute("value", calEnd5.getDate().getDateString());
          dateEnd6.setAttribute("value", calEnd6.getDate().getDateString());

      }


      function showCalEnd5() {
          if (calEnd5.isHidden())
              calEnd5.show();
          else
              calEnd5.hide();

      }

      function showCalEnd6() {
          if (calEnd6.isHidden())
              calEnd6.show();
          else
              calEnd6.hide();
      }
  */
    /////////////////////////////////////////////

</script>
<script>

    var calEnd5 = new Calendar(),
        calEnd6 = new Calendar(true, 0, true, true),
        dateEnd5 = document.getElementById('back_work'),
        dateEnd6 = document.getElementById('mobashret_amal_date_h'),
        calEnd5Mode = calEnd5.isHijriMode(),
        calEnd6Mode = calEnd6.isHijriMode();


    dateEnd5.setAttribute("value", calEnd5.getDate().getDateString());
    dateEnd6.setAttribute("value", calEnd6.getDate().getDateString());


    document.getElementById('cal-end-5').appendChild(calEnd5.getElement());
    document.getElementById('cal-end-6').appendChild(calEnd6.getElement());


    calEnd5.show();
    calEnd6.show();
    setDateFieldsEnd5();


    calEnd5.callback = function () {
        if (calEnd5Mode !== calEnd5.isHijriMode()) {
            calEnd6.disableCallback(true);
            calEnd6.changeDateMode();
            calEnd6.disableCallback(false);
            calEnd5Mode = calEnd5.isHijriMode();
            calEnd6Mode = calEnd6.isHijriMode();
        } else

            calEnd6.setTime(calEnd5.getTime());
        setDateFieldsEnd5();
    };

    calEnd6.callback = function () {
        if (calEnd6Mode !== calEnd6.isHijriMode()) {
            calEnd5.disableCallback(true);
            calEnd5.changeDateMode();
            calEnd5.disableCallback(false);
            calEnd5Mode = calEnd5.isHijriMode();
            calEnd6Mode = calEnd6.isHijriMode();
        } else

            calEnd5.setTime(calEnd6.getTime());
        setDateFieldsEnd5();
    };


    calEnd5.onHide = function () {
        calEnd5.show(); // prevent the widget from being closed

    };

    calEnd6.onHide = function () {
        calEnd6.show(); // prevent the widget from being closed

    };


    function setDateFieldsEnd5() {
        if (loop6 == 0) {
            <?php if (isset($item) && $item != null) { ?>
            loop6++;
            dateEnd5.value = '<?=$item->mobashret_amal_date_m?>';
            dateEnd6.value = '<?=$item->mobashret_amal_date_h?>';
            <?php } else { ?>
            dateEnd5.value = calEnd5.getDate().getDateString();
            dateEnd6.value = calEnd6.getDate().getDateString();

            <?php } ?>
        } else {
            dateEnd5.value = calEnd5.getDate().getDateString();
            dateEnd6.value = calEnd6.getDate().getDateString();

        }

        dateEnd5.setAttribute("value", calEnd5.getDate().getDateString());
        dateEnd6.setAttribute("value", calEnd6.getDate().getDateString());

    }


    function showCalEnd5() {
        if (calEnd5.isHidden())
            calEnd5.show();
        else
            calEnd5.hide();

    }

    function showCalEnd6() {
        if (calEnd6.isHidden())
            calEnd6.show();
        else
            calEnd6.hide();
    }

    /////////////////////////////////////////////
</script>


<script>

    var calEnd7 = new Calendar(),
        calEnd8 = new Calendar(true, 0, true, true),
        dateEnd7 = document.getElementById('taqrer_form_date_m'),
        dateEnd8 = document.getElementById('taqrer_form_date_h'),
        calEnd7Mode = calEnd7.isHijriMode(),
        calEnd8Mode = calEnd8.isHijriMode();


    dateEnd7.setAttribute("value", calEnd7.getDate().getDateString());
    dateEnd8.setAttribute("value", calEnd8.getDate().getDateString());


    document.getElementById('cal-end-7').appendChild(calEnd7.getElement());
    document.getElementById('cal-end-8').appendChild(calEnd8.getElement());


    calEnd7.show();
    calEnd8.show();
    setDateFieldsEnd7();


    calEnd7.callback = function () {
        if (calEnd7Mode !== calEnd7.isHijriMode()) {
            calEnd8.disableCallback(true);
            calEnd8.changeDateMode();
            calEnd8.disableCallback(false);
            calEnd7Mode = calEnd7.isHijriMode();
            calEnd8Mode = calEnd8.isHijriMode();
        } else

            calEnd8.setTime(calEnd7.getTime());
        setDateFieldsEnd7();
    };

    calEnd8.callback = function () {
        if (calEnd8Mode !== calEnd8.isHijriMode()) {
            calEnd7.disableCallback(true);
            calEnd7.changeDateMode();
            calEnd7.disableCallback(false);
            calEnd7Mode = calEnd7.isHijriMode();
            calEnd8Mode = calEnd8.isHijriMode();
        } else

            calEnd7.setTime(calEnd8.getTime());
        setDateFieldsEnd7();
    };


    calEnd7.onHide = function () {
        calEnd7.show(); // prevent the widget from being closed

    };

    calEnd8.onHide = function () {
        calEnd8.show(); // prevent the widget from being closed

    };


    function setDateFieldsEnd7() {
        if (loop4 == 0) {
            <?php if (isset($item) && $item != null) { ?>
            loop4++;
            dateEnd7.value = '<?=$item->taqrer_form_date_m?>';
            dateEnd8.value = '<?=$item->taqrer_form_date_h?>';
            <?php } else { ?>
            dateEnd7.value = calEnd7.getDate().getDateString();
            dateEnd8.value = calEnd8.getDate().getDateString();

            <?php } ?>
        } else {
            dateEnd7.value = calEnd7.getDate().getDateString();
            dateEnd8.value = calEnd8.getDate().getDateString();

        }

        dateEnd7.setAttribute("value", calEnd7.getDate().getDateString());
        dateEnd8.setAttribute("value", calEnd8.getDate().getDateString());

    }


    function showCalEnd7() {
        if (calEnd7.isHidden())
            calEnd7.show();
        else
            calEnd7.hide();

    }

    function showCalEnd8() {
        if (calEnd8.isHidden())
            calEnd8.show();
        else
            calEnd8.hide();
    }

    /////////////////////////////////////////////
</script>
<script>
    var calEnd9 = new Calendar(),
        calEnd10 = new Calendar(true, 0, true, true),
        dateEnd9 = document.getElementById('taqrer_to_date_m'),
        dateEnd10 = document.getElementById('taqrer_to_date_h'),
        calEnd9Mode = calEnd9.isHijriMode(),
        calEnd10Mode = calEnd10.isHijriMode();


    dateEnd9.setAttribute("value", calEnd9.getDate().getDateString());
    dateEnd10.setAttribute("value", calEnd10.getDate().getDateString());


    document.getElementById('cal-end-9').appendChild(calEnd9.getElement());
    document.getElementById('cal-end-10').appendChild(calEnd10.getElement());


    calEnd9.show();
    calEnd10.show();
    setDateFieldsEnd9();


    calEnd9.callback = function () {
        if (calEnd9Mode !== calEnd9.isHijriMode()) {
            calEnd10.disableCallback(true);
            calEnd10.changeDateMode();
            calEnd10.disableCallback(false);
            calEnd9Mode = calEnd9.isHijriMode();
            calEnd10Mode = calEnd10.isHijriMode();
        } else

            calEnd10.setTime(calEnd9.getTime());
        setDateFieldsEnd9();
    };

    calEnd10.callback = function () {
        if (calEnd10Mode !== calEnd10.isHijriMode()) {
            calEnd9.disableCallback(true);
            calEnd9.changeDateMode();
            calEnd9.disableCallback(false);
            calEnd9Mode = calEnd9.isHijriMode();
            calEnd10Mode = calEnd10.isHijriMode();
        } else

            calEnd9.setTime(calEnd10.getTime());
        setDateFieldsEnd9();
    };


    calEnd9.onHide = function () {
        calEnd9.show(); // prevent the widget from being closed

    };

    calEnd10.onHide = function () {
        calEnd10.show(); // prevent the widget from being closed

    };


    function setDateFieldsEnd9() {


        if (loop5 == 0) {
            <?php if (isset($item) && $item != null) { ?>
            loop5++;
            dateEnd9.value = '<?=$item->taqrer_to_date_m?>';
            dateEnd10.value = '<?=$item->taqrer_to_date_h?>';
            <?php } else { ?>
            dateEnd9.value = calEnd9.getDate().getDateString();
            dateEnd10.value = calEnd10.getDate().getDateString();
            <?php } ?>
        } else {
            dateEnd9.value = calEnd9.getDate().getDateString();
            dateEnd10.value = calEnd10.getDate().getDateString();
        }


        dateEnd9.setAttribute("value", calEnd9.getDate().getDateString());
        dateEnd10.setAttribute("value", calEnd10.getDate().getDateString());

    }


    function showCalEnd9() {
        if (calEnd9.isHidden())
            calEnd9.show();
        else
            calEnd9.hide();

    }

    function showCalEnd10() {
        if (calEnd10.isHidden())
            calEnd10.show();
        else
            calEnd10.hide();
    }

    /////////////////////////////////////////////
</script>



