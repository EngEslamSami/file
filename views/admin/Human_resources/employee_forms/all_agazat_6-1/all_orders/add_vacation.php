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

    .table-bordered.table-details tbody > tr > td {
        font-size: 13px !important;
        white-space: pre-line;
    }
    .check-style input[type=checkbox] + label{
        line-height: 20px;
    }

</style>
<?php if ($_SESSION['role_id_fk'] == 1 || $_SESSION['role_id_fk'] == 3) { ?>
    <div class="col-sm-12 no-padding ">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
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
                $emp_badel_code_fk = $item->emp_badel_code_fk;
                $emp_badel_n = $item->emp_badel_n;                $mobashret_amal_date_m = $item->mobashret_amal_date_m;
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
                $hospital_report = $item->hospital_report;

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
                $emp_badel_code_fk = '';
                $emp_badel_n = '';
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
                $hospital_report = '';
            }
            ?>


            <div class="panel-body">
             <?php
        if (!isset($_POST['from_profile'])) {
        ?>

            <div class="col-sm-10 no-padding">
            <?php }else {
            ?>
            <div class="col-sm-12 no-padding ">

                <?php
                } ?>
                    <?php
                    if (isset($item) && !empty($item)){
                      $url= base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/edit_vacation/' . $item->id;
                      } else{
                          $url=base_url()."human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation";
                           } ?>
                           <?php echo form_open_multipart($url,array('id' =>'form1')) ?>
                           <!-- <form action=
                                 method="post" id="form1"> -->
                            <?php if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
                                <input type="hidden" name="from_profile" value="1"/>
                            <?php } ?>
                                <input type="hidden" name="add" value="add">

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


                            <!--<pre>
                      <?php //print_r($vacations); ?>
                        </pre>-->
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
                                    <input name="emp_name" id="emp_name" class="form-control" style="width:84%; float: right;"
                                           readonly
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
                                           oninput="checkValidateVacationDayes()"
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
                                <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                                    <label class="label "> القسم</label>
                                    <input name="qsm_n" id="qsm_n" class="form-control"
                                           value="<?php if (!empty($emp_data->departments_name)) {
                                               echo $emp_data->departments_name;
                                           } else {
                                               echo $qsm_n;
                                           } ?>" readonly>
                                </div>

                                <div class="form-group col-md-2  col-sm-6 padding-4">
                                    <label class="label ">الجوال
                                        <small style="color: red;">رقم الجوال 10 ارقام فقط</small>
                                    </label>
                                    <input type="text" maxlength="10"
                                           onkeyup="get_length($(this).val());" <?php if ($no3_agaza == 0) { ?>  disabled="disabled"<?php } ?>
                                           name="emp_jwal" id="mob"
                                           value="<?php if (!empty($emp_data->id)) echo $emp_data->phone; else echo $emp_jwal; ?>"
                                           class="form-control "
                                           data-validation="required"
                                           data-validation-has-keyup-event="true">

                                </div>


                                <div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document" style="width: 80%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" onclick="$('#myModal_emps').modal('hide')"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel"></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div id="myDiv_emp"></div>
                                            </div>
                                            <div class="modal-footer" style="display: inline-block;width: 100%">
                                                <button type="button" class="btn btn-danger"
                                                        style="float: left;" onclick="$('#myModal_emps').modal('hide')">إغلاق
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
                                               style=" width: 100%;float: right" onchange="//get_date();"/>
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

                                    <div id="cal-end-4" >
                                        <label class="label ">عدد الأيام</label>
                                        <input type="text" readonly="readonly" name="num_days" id="num_days"
                                               value="<?php echo $num_days; ?>"
                                               class="form-control bottom-input"
                                               data-validation="required" onkeypress="validate_number(event);"
                                               data-validation-has-keyup-event="true">
                                    </div>

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
                                        <input class="form-control "
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
                                           class="form-control"
                                           style="margin: 0" value="<?php echo $address_since_agaza; ?>">
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
                                    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                                        <label class="label ">تقرير المستشفى </label>
                                        <input type="file" name="hospital_report"
                                               id="hospital_report" class="form-control" style="width:80%;float: right;">

                                               <?php if (!empty($hospital_report)) {
                                               $display_report= 'block';
                                               $type = pathinfo($hospital_report)['extension'];
                                               $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                               $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                               if (in_array($type, $arry_images)) {
                                               $type_doc=1;
                                               } elseif (in_array(strtoupper($type), $arr_doc)) {
                                               $type_doc=2;
                                             }
                                               }else {
                                               $display_report='none';
                                               }?>
                                               <a class="btn btn-success btn-next"  style="float: right; display: <?=$display_report ?>"
                                                 href="<?php echo base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/read_file/' . $hospital_report .'/'.$type_doc.'/'.$type?>"
                                               target="_blank">
                                               <i class=" fa fa-eye"></i></a>
                                             </div>

                                </div>
                                <?php if (!empty($daraget_waffa)) $display = 'block'; else $display = 'none'; ?>
                                <div class="col-md-12 no-padding" id="daraget_waffa_div"
                                     style="display: <?= $display ?>">
                                    <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                                        <label class="label "> درجة الوفاة </label>
                                        <input type="text" style="width:85%; float: right;" name="daraget_waffa"
                                               id="marad_name" class="form-control " value="<?= $daraget_waffa ?>">
                                    </div>


                                </div>

            <?php if (!empty($emp_badel_id_fk)) {
                $display_emp_badel = 'block';
                $valid='data-validation="required"';
                } else{ 
                    $display_emp_badel = 'none';
                    $valid='';
                    } ?>

                                <div class="col-md-12 no-padding" id="mowazf_badel_div" style="display: <?= $display_emp_badel ?>">

                                    <div class="bond panel-default">
                                        <div class="bond-heading">
                                            <h5 class="bond-title">إقرار الموظف البديل</h5>
                                        </div>
                                        <div class="bond-body">
                                            <div class="form-group col-md-8 col-sm-8 col-xs-12 padding-4">

                                                <div class="check-style" style="margin-top: 20px;">
                                                    <input type="checkbox" name="pledge" id="pledge" value="1" <?= $valid ?>
                                                    <?php if (!empty($emp_badel_id_fk)) {echo "checked";} ?>>
                                                    <label for="pledge"> اتعهد بتسليم
                                                    كل
                                                    مهامي للموظف البديل والعودة من الأجازات فى الموعد المحدد .</label>
                                                </div>

                                            </div>

                                            <div class="form-group col-md-4 col-sm-4 col-xs-6 padding-4">
                                                <label class="label ">الموظف البديل</label>
                                                <input type="text" style="width:85%; float: right;" name="emp_badel_n" <?= $valid ?>
                                                       id="mowazf_badel" class="form-control " readonly value="<?=$emp_badel_n ?>">
                                                <button type="button"
                                                        class="btn btn-success btn-next" style="float: right;"
                                                        onclick="GetDiv('myDiv')">
                                                    <i class="fa fa-plus"></i></button>
                                                <input type="hidden" name="emp_badel_id_fk" id="mowazf_badel_id" value="<?= $emp_badel_id_fk ?>">
                                                <input type="hidden" name="emp_badel_code_fk" id="mowazf_badel_code" value="<?= $emp_badel_code_fk ?>">
                                            </div>

                                        </div>
                                    </div>


                                </div>


                            </div>
                                       <div class="col-xs-12 text-center" style="margin-top: 15px">
                                <button type="button" onclick="return check_befor_save();"
                                        class="btn btn-labeled btn-success " id="reg" name="add" value="حفظ"
                                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                                <span class="label label-danger" id="span_id_check" style="display:none"> لا يمكنك عمل طلب اجازة لان هنالك اجازة جارية </span>


                            </div>

                        </form>
                </div>


                <div class="col-sm-2 padding-4">
          
          
          
          
          
          
          <?php
            if (!isset($_POST['from_profile'])) {
                ?>
          
          <div id="sidebar_emp"></div>
            <?php } ?>



                </div>

            </div>
        </div>

    </div>

    <?php
    /*
    echo '<pre>';
    print_r($items);*/
    if (isset($items) && !empty($items)) {
        ?>
        <div class="col-sm-12 no-padding ">

            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $title; ?></h3>
                </div>
                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th>رقم الطلب</th>
                        <th>نوع الاجازه</th>
                        <th>بدايه الاجازه</th>
                        <th>نهايه الاجازه</th>
                        <th>عدد الايام المطلوبه</th>

                        <th> الاجراء</th>
                        <th> الطلب الان عند </th>
                        <th>حاله الطلب</th>

                    </tr>

                    </thead>
                    <tbody>

                    <?php

                    if (isset($items) && !empty($items)) {
                        $x = 1;

                        foreach ($items as $row) {

                             if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                                            $link_update = 'edite_agaza(' .$row->id . ')';
                                            $link_delete = 1;
                                        } else {
                                            $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/edit_vacation/' . $row->id . '";';
                                            $link_delete = 0;

                                        } 

                    if($row->suspend == 0){
                    $halet_eltalab = 'جاري متابعة الطلب ';
                    $halet_eltalab_class = 'warning';
                    }elseif($row->suspend == 1){
                     $halet_eltalab = 'تم قبول الطلب من '.$row->talab_in_title;
                    $halet_eltalab_class = 'success';
                    }elseif($row->suspend == 2){
                        $halet_eltalab = 'تم رفض الطلب من '.$row->talab_in_title ;
                        $halet_eltalab_class = 'danger';
                    }elseif($row->suspend == 4){
                       $halet_eltalab = 'تم اعتماد الطلب بالموافقة من '.$row->talab_in_title;
                       $halet_eltalab_class = 'success';
                    }elseif($row->suspend == 5){
                       $halet_eltalab = 'تم اعتماد الطلب بالرفض من '.$row->talab_in_title;
                       $halet_eltalab_class = 'danger';
                    }else{
                         $halet_eltalab = 'غير محدد ';
                       $halet_eltalab_class = 'danger';


                    }
                     ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                 <td><?php echo $row->agaza_rkm; ?></td>

                                <td><?php echo $row->name->name; ?></td>
                                <td><?php echo  explode('/', $row->agaza_from_date_m)[2] . '/' . explode('/', $row->agaza_from_date_m)[0] . '/' . explode('/', $row->agaza_from_date_m)[1]; ?></td>
                                <td><?php echo explode('/', $row->agaza_to_date_m)[2] . '/' . explode('/', $row->agaza_to_date_m)[0] . '/' . explode('/', $row->agaza_to_date_m)[1]; ?></td>
                                <td><?php echo $row->num_days; ?></td>
                                <td>
                                    <!-- <a type="button" class="btn btn-primary btn-xs" data-toggle="modal" style="padding: 1px 6px;"
                                            data-target="#myModal<?php echo $row->id; ?>"><i class="fa fa-list"></i>
                                    </a> -->
                                      <a type="button" class="btn btn-info btn-xs" style="padding: 1px 6px;"
                                       data-toggle="modal" title="التفاصيل"
                                       onclick="get_details_agaza(<?= $row->id ?>,'<?php echo $row->employee; ?>');"
                                       data-target="#myModal"> <i class="fa fa-list"></i>
                                    </a>
                                    <a title="طباعة الطلب" style="padding:1px 5px;" onclick="print_(<?= $row->agaza_rkm ?>)"><i class="fa fa-print "></i>
                                    </a>

                                <?php
                         if (in_array($row->no3_agaza,  array(3,4))) {
                         ?>
                          <a title="عرض المرفق" onclick="load_add_morfaq(<?= $row->agaza_rkm ?>);$('#esal_id_morfaq').val(<?= $row->agaza_rkm ?>)" data-toggle="modal" data-target="#modal-add_morfaq">
                      <i class="fa fa-cloud-upload" aria-hidden="true"></i> </a>

                      <?php } ?>
                    <?php
                    if($row->suspend == 0){ ?>
                     <a onclick='swal({
                                                title: "هل انت متأكد من التعديل ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-warning",
                                                confirmButtonText: "تعديل",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: true
                                                },
                                                function(){
                                        <?= $link_update ?>
                                                });'><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                        <a onclick='swal({
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
                                                window.location="<?= base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/delete_vacation/' . $row->id . '/' . $link_delete ?>";
                                                });'><i
                                                    class="fa fa-trash"
                                                    aria-hidden="true"></i>
                                        </a>
                    
                    <?php }else{ ?>
                           <span class="label label-danger">
                                                   عذرا لا يمكنك التعديل والحذف
                                                     </span>

                     <?php } ?>
                      </td>
                      <td><?php echo $row->current_to_user_name; ?></td>
                                <td>
                                <span class="label label-<?php echo $halet_eltalab_class ?>" style="min-width: 140px;">
                                <?php echo $halet_eltalab;  ?>
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
        <div class="modal-dialog " style="width: 90%" role="document">
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

    <?php /*
    if (isset($items) && !empty($items)) {
        $x = 1;

        foreach ($items as $row) { ?>


            <div class="modal fade" id="myModal<?php echo $row->id; ?>" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel">
                <div class="modal-dialog " style="width: 80%" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" onclick="$('#myModal<?php echo $row->id; ?>').modal('hide')" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><?php echo $row->employee; ?></h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered" style="table-layout: fixed">
                                <thead>
                                <tr class="info">
                                    <th colspan="4" class="bordered-bottom">تفاصيل الاجازه</th>
                                </tr>
                                </thead>
                                <tbody>
                          <?php
                            // $row->agaza_from_date_m = explode('/', $row->agaza_from_date_m)[2] . '/' . explode('/', $row->agaza_from_date_m)[0] . '/' . explode('/', $row->agaza_from_date_m)[1];
                            // $row->agaza_to_date_m = explode('/', $row->agaza_to_date_m)[2] . '/' . explode('/', $row->agaza_to_date_m)[0] . '/' . explode('/', $row->agaza_to_date_m)[1];
                           ?>
                                <tr>
                                    <th class="gray-background">نوع الاجازه:</th>
                                    <td width="15%"><?php echo $row->name->name; ?></td>
                                    <th class="gray-background">تاريخ بدايه الاجازه:</th>
                                    <th width="20%"><?php echo explode('/', $row->agaza_from_date_m)[2] . '/' . explode('/', $row->agaza_from_date_m)[0] . '/' . explode('/', $row->agaza_from_date_m)[1]; ?></th>
                                    <!-- <th width="20%"><?php echo $row->agaza_from_date_m; ?></th> -->

                                </tr>
                                <tr>
                                    <th class="gray-background">تاريخ نهايه الاجازه:</th>
                                    <td><?php echo explode('/', $row->agaza_to_date_m)[2] . '/' . explode('/', $row->agaza_to_date_m)[0] . '/' . explode('/', $row->agaza_to_date_m)[1]; ?></td>
                                    <th class="gray-background">عددايام الاجازه:</th>
                                    <td><?php echo $row->num_days; ?></td>

                                </tr>

                                <tr>
                                    <th class="gray-background">تاريخ مباشره العمل:</th>
                                    <td><?php echo explode('/', $row->mobashret_amal_date_m)[2] . '/' . explode('/', $row->mobashret_amal_date_m)[0] . '/' . explode('/', $row->mobashret_amal_date_m)[1]; ?></td>
                                    <!-- <td><?php echo $row->mobashret_amal_date_m; ?></td> -->
                                  <!--  <th class="gray-background">الموظف البديل:</th>
                                    <td><?= ($row->badl_emp != null) ? $row->badl_emp->employee : 'لم يحدد'; ?></td>-->


                                </tr>
                                <tr>
                                    <th class="gray-background">العنوان اثناء الاجازه:</th>
                                    <td><?php echo $row->address_since_agaza; ?></td>
                                    <th class="gray-background">الجوال اثناء الاجازه:</th>
                                    <td><?php echo $row->emp_jwal; ?></td>
                                </tr>
                                <?php if (!empty($row->marad_name)) {?>
                                  <tr>
                                    <th class="gray-background"> اسم المرض:</th>
                                    <td><?php echo $row->marad_name; ?></td>
                                    <th class="gray-background">اسم المستشفى:</th>
                                    <td><?php echo $row->hospital_name; ?></td>

                                  </tr>
                                  <tr>
                                    <th class="gray-background">بداية التقرير الطبي :</th>
                                    <td><?php echo $row->taqrer_form_date_m; ?></td>
                                    <th class="gray-background">نهاية التقرير الطبي :</th>
                                    <td><?php echo $row->taqrer_to_date_m; ?></td>
                                  </tr>
                                <tr>
                                  <?php if (!empty($row->hospital_report)) {
                                  $type = pathinfo($row->hospital_report)['extension'];
                                  $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                  $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                  if (in_array($type, $arry_images)) {
                                  $type_doc=1;
                                  } elseif (in_array(strtoupper($type), $arr_doc)) {
                                  $type_doc=2;
                                  }
                                  ?>
                                  <th class="gray-background">تقرير المستشفى:</th>
                                  <td>
                                  <a  href="<?php echo base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/read_file/' . $row->hospital_report .'/'.$type_doc.'/'.$type?>"
                                  target="_blank">
                                  <i class=" fa fa-eye"></i></a>
                                  </td>
                                  <?php } ?>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" style="float: left" onclick="$('#myModal<?php echo $row->id; ?>').modal('hide')">
                                إغلاق
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        <?php }
    }*/ ?>


    <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 70%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="$('#myModalInfo').modal('hide')" aria-label="Close"><span
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

<div class="modal fade" id="modal-add_morfaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="width:90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#modal-add_morfaq').modal('hide')" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">اضافة مرفقات</h4>
            </div>
            <div class="modal-body" id="my_morfaq_add">
            </div>
            <div class="modal-footer" style="display:inline-block; width:100%">
                <button type="button" class="btn btn-default" onclick="$('#modal-add_morfaq').modal('hide')">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script> -->
<script>
   function check_vacation(emp_id) {

     $.ajax({
         type: 'post',
         url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/check_vacation",
         data: {
           emp_id:emp_id
         },
         success: function (msg) {
           if (msg == 0) {
            console.warn("msg :: " + msg);
            swal({
                title: " لا يمكنك عمل طلب اجازة ",
                text:"هنالك طلب اجارة جاري ",
                type: 'warning',
                confirmButtonText: "تم",
            }, function(is_confirm) {
                if (is_confirm) {
                  $('#reg').attr('disabled','disabled');
                  $('#span_id_check').show();
                }
            });
          }else if (msg == 1)  {
              console.warn("msg :: " + msg);
              $('#reg').removeAttr('disabled');
              $('#span_id_check').hide();

          }else{
              console.warn("msg :: " + msg);
              var obj = JSON.parse(msg);
              $('#vacation_start').val(obj.agaza_from_date_m);
              $('#vacation_end').val(obj.agaza_to_date_m);
              $('#reg').removeAttr('disabled');
            }
         }
     });


   }
</script>

<script type="text/javascript">
  function check_befor_save() {
    var vacation_start=  $('#vacation_start').val();
    var vacation_end=$('#vacation_end').val();
    var start_date=$('#start_date').val();

      if (vacation_start !=' ' && vacation_end !=' ' && start_date !=' ') {


    var vacation_start_date = new Date(vacation_start);
    var vacation_end_date = new Date(vacation_end);

    var x = new Date(start_date);

    if ((x >= vacation_start_date) && (x <= vacation_end_date)) {

      swal({
          title: " لا يمكنك عمل طلب اجازة ",
          text:" هنالك أجازة جارية ",
          type: 'warning',
          confirmButtonText: "تم",
      }, function(is_confirm) {
          if (is_confirm) {
            // $('#reg').attr('disabled','disabled');
          }
        });
        }else {
      checkValidateMaxMin();
      }
      }else {
      checkValidateMaxMin();
  }
  }
</script>
<script>
    function load_add_morfaq(agaza_rkm) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_orders/Vacation/add_attach',
            data: {agaza_rkm: agaza_rkm 
            <?php
            if (isset($_POST['from_profile'])) {
                ?>
                ,from_profile:1
            <?php } ?>
                },
            dataType: 'html',
            cache: false,
            beforeSend: function () {
               $('#my_morfaq_add').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
           },

            success: function (html) {

                $("#my_morfaq_add").html(html);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

            }
        });

    }

</script>


<script>

    function GetDiv_emps(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="info"><th style="width: 50px;">#</th><th style="width: 50px;"> أسم الموظف  </th>' +
            '<th style="width: 170px;" >الأدارة   </th>' +
            '<th style="width: 170px;" >القسم</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/all_agazat/all_orders/Vacation/getConnection_emp/',

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
        checkValidateVacationDayes();
        //6-7-om
        $('#emp_id_fk').val(obj.value);
 <?php
            if (!isset($_POST['from_profile'])) {
                ?>
        get_emp_sidebar();

            <?php } ?>
                    check_vacation(obj.value);

        document.getElementById('edara_n').value = edara_n;
        document.getElementById('edara_id_fk').value = edara_id;
        document.getElementById('job_title').value = job_title;
        document.getElementById('qsm_n').value = qsm_n;
        document.getElementById('qsm_id_fk').value = qsm_id;
        document.getElementById('adress').value = adress;
        document.getElementById('mob').value = emp_phone;

        // $("#myModal_emps")modal.('hide');
        $("#myModal_emps .close").click();

        

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
            cancelButtonText: "لا, الغاء الأمر!",
            confirmButtonText: "نعم, قم بالحفظ!",
        },function() {
                $('#form1').submit();
        });

    }
</script>
<script>
   function checkValidateMaxMin() {
      var no3_agaza=$("#no3_agaza").val();
      if (no3_agaza != 52) {
        if (parseFloat($('#num_days').val()) <= parseFloat($('#max_days').val())) {
            if (parseFloat($('#num_days').val()) <= parseFloat($('#allDayes').val())) {
                save_me();
            } else {
                swal({
                    title: 'المدة المحددة لا يجب أن تتخطى الرصيد المتاح   ',
                    text: ' الرصيد المتاح :' + $('#allDayes').val(),
                    type: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'تم'
                });
                return false;
          }
        } else {
            swal({
                title: 'المدة المحددة لا يجب أن تتخطى أقصى عدد من الأيام  ',
                text: ' اقصى عدد :' + $('#max_days').val() ,
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'تم'
            });
            return false;
        }
      }else {
        // console.warn('no3_agaza :: checkValidateMaxMin :: '+no3_agaza);
        check_agaza_without_salary();
      }

    }
    /*function checkValidateMaxMin() {
        if (parseFloat($('#num_days').val()) <= parseFloat($('#max_days').val())) {
            if (parseFloat($('#num_days').val()) <= parseFloat($('#allDayes').val())) {
                save_me();
            } else {
                swal({
                    title: 'المدة المحددة لا يجب أن تتخطى الرصيد المتاح   ',
                    text: ' الرصيد المتاح :' + $('#allDayes').val(),
                    type: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'تم'
                });

                return false;
            }
            // save_me();
        } else {
            swal({
                title: 'المدة المحددة لا يجب أن تتخطى أقصى عدد من الأيام  ',
                text: ' الرصيد المتاح :' + $('#allDayes').val(),
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'تم'
            });
            return false;
        }


    }*/
</script>
<script type="text/javascript">
  function get_last_agaza_without_salary() {

    var no3_agaza = $('#no3_agaza').val();
    var emp = $('#emp_code').val();
    var start_date = $('#start_date').val();

    if (emp != '' && no3_agaza != '') {

      $.ajax({
          type: 'post',
          url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/check_agaza_without_salary",
          data: {
            emp:emp,
            no3_agaza:no3_agaza,
            start_date:start_date
          },
          success: function (msg) {

            if (msg == 0) {
              swal({
                  title: 'لا يمكنك اخذ اجازة بدون راتب .',
                  text: 'لا هنالك اجازة سابقة بالحد الاقصى وبجب عمل يوم حضور على اقل بين الاجازاتين '  ,
                  type: 'warning',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'تم'
              });

            } else {
              save_me();
            }
          }
      });
    }else {

    }

  }
</script>
<script >
  function check_agaza_without_salary() {
    console.warn('no3_agaza :: check_agaza_without_salary :: ');

    if (parseFloat($('#num_days').val()) <= parseFloat($('#max_days').val())) {
        if (parseFloat($('#num_days').val()) <= parseFloat($('#allDayes').val())) {
            get_last_agaza_without_salary();
        } else {
          swal({
              title: 'المدة المحددة لا يجب أن تتخطى الرصيد المتاح   ',
              text: ' الرصيد المتاح :' + $('#allDayes').val(),
              type: 'warning',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'تم'
          });

            return false;
      }
    } else {
      swal({
          title: 'المدة المحددة لا يجب أن تتخطى أقصى عدد من الأيام  ',
          text: ' اقصى عدد :' + $('#max_days').val() ,
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
        $("#myModalInfo .close").click();

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

            html = '<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> كود الموظف </th><th style="width: 50px;"> الإسم </th><th style="width: 170px;" >الجوال </th>' +
                '</tr></thead><table><div id="dataMember"></div></div>';
            $("#" + div).html(html);
            $('#js_table_members').show();
            var oTable_usergroup = $('#js_table_members').DataTable({
                "ordering": true,
                dom: 'Bfrtip',
                "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/all_agazat/all_orders/Vacation/GetReplacementEmployee/' + emp_id + '/',

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


            // document.getElementById("emp_badel_promise").setAttribute("disabled", "disabled");
            // document.getElementById("promise").setAttribute("disabled", "disabled");

            document.getElementById("mob").setAttribute("disabled", "disabled");


            document.getElementById("num_days").setAttribute("disabled", "disabled");

            document.getElementById("back_work").setAttribute("disabled", "disabled");
            // document.getElementById("end_day").setAttribute("disabled", "disabled");
            // document.getElementById("start_day").setAttribute("disabled", "disabled");


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
            // alert(mowazf_badel);
            if (mowazf_badel == 1) {
                $('#mowazf_badel_div').show();
                document.getElementById("pledge").setAttribute("data-validation", "required");
                document.getElementById("mowazf_badel").setAttribute("data-validation", "required");
            } else {
                document.getElementById("pledge").removeAttribute("data-validation", "required");
                document.getElementById("mowazf_badel").removeAttribute("data-validation", "required");
                $('#mowazf_badel_div').hide();
            }

            //  $('#emp').show();
            //document.getElementById("adress").removeAttribute("disabled", "disabled");
            document.getElementById("mob").removeAttribute("disabled", "disabled");

            // document.getElementById("emp_badel_promise").removeAttribute("disabled", "disabled");
            // document.getElementById("promise").removeAttribute("disabled", "disabled")
            document.getElementById("num_days").removeAttribute("disabled", "disabled");
            //document.getElementById("end_date").removeAttribute("disabled", "disabled");
            //document.getElementById("agaza_to_date_h").removeAttribute("disabled", "disabled");
            document.getElementById("back_work").removeAttribute("disabled", "disabled")
            // document.getElementById("end_day").removeAttribute("disabled", "disabled");
            // document.getElementById("start_day").removeAttribute("disabled", "disabled");


            //  document.getElementById("mowazf_badel_div").style.display = "none";

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
<script>
    function get_details_agaza(id, name) {
        $('#myModalLabel_h').text(name);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/get_details_agaza",
            data: {id: id},
            success: function (d) {

                $('#details_agaza').html(d);
            }
        });
    }

</script>

<script>
   

    function get_emp_data(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/get_emp_data",
            data: {valu: valu},

            success: function (d) {


                var obj = JSON.parse(d);


                $('#job_title_id_fk').val(obj.degree_id);
                $('#administration3').val(obj.administration);
                $('#department3').val(obj.department);
                $('#emp_id').val(obj.id);
                $('#administration').val(obj.administration);
                $('#department').val(obj.department);
                $('#manger').val(obj.manger);

            }


        });


       
    }


</script>

<script type="text/javascript">
   function checkValidateVacationDayes() {

        var vacations = $('#no3_agaza').val();
        var emp = $('#emp_code').val();
        if (emp != '' && vacations != '') {
          if (vacations !=52) {
            console.log('vacations :' + vacations + "\n emp : " + emp);
            var request = $.ajax({
                url: "<?php echo base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/get_avalibal_days'?>",
                type: "POST",
                data: {emp_id: emp, vac_id: vacations},
            });
            request.done(function (msg) {
                if (msg === 'false') {
                } else {
                    var obj = JSON.parse(msg);
                    $('#allDayes').val(obj.ava_days);
                    $('#vDays').val(obj.vDays);
                    if (vacations == 0) {
                        $('#max_days').val(obj.casual_vacation_num);
                        $('#min_days').val(1);
                    }

                }
            });
            request.fail(function (jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);
            });

          }else {
            check_vacation_year(emp,vacations);
          }
          }

    }
   /* function checkValidateVacationDayes() {

        var vacations = $('#no3_agaza').val();
        var emp = $('#emp_code').val();
        if (emp != '' && vacations != '') {
            console.log('vacations :' + vacations + "\n emp : " + emp);
            var request = $.ajax({
                url: "<?php echo base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/get_avalibal_days'?>",
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

                }
            });
            request.fail(function (jqXHR, textStatus) {
                console.log("Request failed: " + textStatus);
            });
        }

    }*/

</script>
<script>
  function check_vacation_year(emp,no3_agaza) {
    if (no3_agaza == 52) {
      $.ajax({
          type: 'post',
          url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/check_vacation_year",
          data: {emp:emp,no3_agaza:no3_agaza},
          success: function (msg) {
            if (msg === 'false') {

            } else {
                var obj = JSON.parse(msg);
                if (obj.ava_days != 0) {
                  swal({
                      title: 'لا يمكنك اخذ اجازة بدون راتب .',
                      text: 'لأن هنالك رصيد اجازة سنوي  :' + obj.ava_days ,
                      type: 'warning',
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'تم'
                  });
                  $('#allDayes').val('');
                  $('#no3_agaza').val('');
                }else {
                    $('#allDayes').val($('#max_days').val());
                }



            }
          }
      });

    }
  }
</script>
<script type="text/javascript">
  function get_last_agaza_without_salary() {

    var no3_agaza = $('#no3_agaza').val();
    var emp = $('#emp_code').val();
    var start_date = $('#start_date').val();

    if (emp != '' && no3_agaza != '') {

      $.ajax({
          type: 'post',
          url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/check_agaza_without_salary",
          data: {
            emp:emp,
            no3_agaza:no3_agaza,
            start_date:start_date
          },
          success: function (msg) {

            if (msg == 0) {
              swal({
                  title: 'لا يمكنك اخذ اجازة بدون راتب .',
                  text: 'لا هنالك اجازة سابقة بالحد الاقصى وبجب عمل يوم حضور على اقل بين الاجازاتين '  ,
                  type: 'warning',
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'تم'
              });

            } else {
              save_me();
            }
          }
      });
    }else {

    }

  }
</script>
<script >
  function check_agaza_without_salary() {
    console.warn('no3_agaza :: check_agaza_without_salary :: ');

    if (parseFloat($('#num_days').val()) <= parseFloat($('#max_days').val())) {
        if (parseFloat($('#num_days').val()) <= parseFloat($('#allDayes').val())) {
            get_last_agaza_without_salary();
        } else {
          swal({
              title: 'المدة المحددة لا يجب أن تتخطى الرصيد المتاح   ',
              text: ' الرصيد المتاح :' + $('#allDayes').val(),
              type: 'warning',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'تم'
          });

            return false;
      }
    } else {
      swal({
          title: 'المدة المحددة لا يجب أن تتخطى أقصى عدد من الأيام  ',
          text: ' اقصى عدد :' + $('#max_days').val() ,
          type: 'warning',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'تم'
      });
        return false;
  }
}
</script>
<script>

    function get_emp_sidebar() {
        var emp_id = $('#emp_id_fk').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/get_emp_data",
            data: {emp_id: emp_id},
            beforeSend: function () {
                $('#sidebar_emp').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#sidebar_emp').html(d);
            }


        });
    }
 <?php
    if (!isset($_POST['from_profile'])) {
        ?>
     $(document).ready(function () {
        console.log('document ready');
        get_emp_sidebar();
        console.log('document ready');
        check_vacation($('#emp_id_fk').val());

    });

<?php } ?>

</script>
<script>
function print_(value) {
    var agaza_rkm = value;
    var request = $.ajax({
        // print_resrv -- print_contract
        url: "<?=base_url() . 'human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/print_transformation/'?>",
        type: "POST",
        data: {
            agaza_rkm: agaza_rkm
        },
    });
    request.done(function(msg) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(msg);
        WinPrint.document.close();
        WinPrint.focus();
        /*  WinPrint.print();
          WinPrint.close();*/
    });
    request.fail(function(jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
    });
}

</script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>

    var loop1 = loop2 = loop3 = loop4 = loop5 = 0;
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


    //# sourceURL=pen.js

    /////////////////////////////////////


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
       <?php
            if (!isset($_POST['from_profile'])) {
                ?>
<script>

    /////////////////////////////////////


    var calEnd5 = new Calendar(),
        calEnd6 = new Calendar(true, 0, true, true),
        dateEnd5 = document.getElementById('back_work'),
        dateEnd6 = document.getElementById('mobashret_amal_date_h'),
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

    /////////////////////////////////////////////

</script>
<?php } ?>
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
    </script>
    <script>
    /////////////////////////////////////////////

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





<!--6-7-om-->


