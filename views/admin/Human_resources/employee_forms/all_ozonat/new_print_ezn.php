<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">

    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">


    <style type="text/css">
        @import url(<?php echo base_url() ?> asisst/admin_asset/fonts/ht/HacenTunisia.css);
        @import url(<?php echo base_url() ?> asisst/admin_asset/fonts/hl/HacenLinerScreen.css);
        @import url(<?php echo base_url() ?> asisst/admin_asset/fonts/ge/ge.css);

        body {
            font-family: 'hl';

        }

        .main-body {

            background-image: url(<?php echo base_url() ?>asisst/admin_asset/img/pills/paper-bg.png);
            background-image: url(<?php echo base_url() ?>asisst/admin_asset/img/paper-bg.png);
            background-position: 100% 100%;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            -webkit-print-color-adjust: exact !important;
            height: 295mm;

        }

        .print_forma {
            padding: 100px 0 50px 0;
            /*border:1px solid #73b300;*/

        }

        .piece-box {
            margin-bottom: 8px;
            border: 1px solid #000;
            display: inline-block;
            width: 100%;
        }

        .piece-heading {
            background-color: #eee;
            display: inline-block;
            float: right;
            width: 100%;
            padding: 3px;
            color: #000;
        }

        .piece-body {

            width: 100%;
            float: right;
        }

        .bordered-bottom {
            border-bottom: 1px solid #000;
        }

        .piece-footer {
            display: inline-block;
            float: right;
            width: 100%;
            border-top: 1px solid #000;
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
            font-size: 17px;
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
            border-top: 1px solid #000;
            margin-top: 7px;
            margin-bottom: 7px;
        }

        .no-border {
            border: 0 !important;
        }

        .gray_background {
            background-color: #eee;

        }

        .graytd th, .graytd td {
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

        .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border: 1px solid #000;
            font-size: 17px;
        }

        .under-line {
            border-top: 1px solid #000;
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
        .under-line .col-xs-5,
        .under-line .col-xs-6,
        .under-line .col-xs-8 {
            border-left: 1px solid #000;
        }

        .green-border span {
            border: 6px double #000;
            padding: 4px 25px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px 2px #000;
        }

        label.radio-inline {
            font-size: 17px;
        }

        .footer-info {
            position: absolute;
            width: 100%;
            bottom: 65px;
        }

        @media print {

            .table-bordered th, .table-bordered td {
                border: 1px solid #000 !important

            }

        }

        @page {
            size: 210mm 297mm  ;
            margin: 0;

        }


    </style>


</head>
<body onload="printDiv('printDiv')" id="printDiv">


<section class="main-body">

    <div class="container-fluid">

        <div class="print_forma  col-xs-12">
            <div class="col-xs-12 no-padding">
                <div class="col-xs-3 text-center">

                </div>
                <div class="col-xs-5 text-center">
                    <h4 class="green-border"><span>طلب إذن</span></h4>
                </div>
                <div class="col-xs-4 text-center">

                </div>
            </div>

            <div class="piece-box" style="margin-top: 20px">
                <div class="piece-heading">
                    <div class="col-xs-2">
                        <h5>نوع الإذن : </h5>
                    </div>
                    <div class="col-xs-3">
                        <?php if (isset($ezn_data) && (!empty($ezn_data))) {
                            if ($ezn_data->no3_ezn == 1) {
                                $class = 'fa-circle';
                                // $class2='fa-circle-o';
                                $text = 'استئذان شخصي';
                            } else {
                                $class = 'fa-circle';
                                // $class1='fa-circle-o';
                                $text = 'استئذان للعمل';
                            }
                        } ?>
                        <label class="radio-inline">
                            <?php echo $text; ?>
                        </label>
                    </div>
                  

                </div>
                <div class="piece-body">
                    <div class="col-xs-12 no-padding">
                        <div class="col-xs-12 no-padding under-line">
                            <div class="col-xs-4">
                                <h6>الرقم الوظيفي:<span
                                            class="valu"><?php if (isset($ezn_data) && (!empty($ezn_data))) {
                                            echo $ezn_data->emp_code_fk;
                                        } ?> </span></h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>اسم الموظف:<span class="valu"><?php if (isset($ezn_data) && (!empty($ezn_data))) {
                                            echo $ezn_data->emp_name;
                                        } ?></span></h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>المسمى الوظيفي:<span
                                            class="valu"><?php if (isset($ezn_data) && (!empty($ezn_data))) {
                                            echo $ezn_data->job_title;
                                        } ?></span></h6>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding under-line open_green">
                            <div class="col-xs-4">
                                <h6>الإدارة:<span class="valu"><?php if (isset($ezn_data) && (!empty($ezn_data))) {
                                            echo $ezn_data->edara_n;
                                        } ?></span></h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>تاريخ الإذن :<span class="valu"><?php if (isset($ezn_data) && (!empty($ezn_data))) {
                                            echo $ezn_data->ezn_date_ar;
                                        } ?></span></h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>الفترة :<span class="valu"><?php if (isset($ezn_data) && (!empty($ezn_data))) {
                                            echo $ezn_data->fatra_n;
                                        } ?></span></h6>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding under-line">
                            <div class="col-xs-4">
                                <h6>وقت البداية :<span class="valu"><?php if (isset($ezn_data) && (!empty($ezn_data))) {
                                            echo $ezn_data->from_hour;
                                        } ?></span></h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>وقت النهاية :<span class="valu"><?php if (isset($ezn_data) && (!empty($ezn_data))) {
                                            echo $ezn_data->to_hour;
                                        } ?></span></h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>المدة :<span class="valu"><?php if (isset($ezn_data) && (!empty($ezn_data))) {
                                            echo $ezn_data->total_hours;
                                        } ?></span></h6>
                            </div>
                        </div>

                        <div class="col-xs-12  under-line ">
                            <h6>&nbsp السبب :<span class="valu"><?php if (isset($ezn_data) && (!empty($ezn_data))) {
                                        echo $ezn_data->reason;
                                    } ?></span></h6>
                        </div>

                    </div>
                </div>

            </div>
            <?php if ($ezn_data->level >= 2 || (in_array($agaza_data->suspend,array(4,5)))) { ?>

                <div class="piece-box">
                    <div class="piece-heading">
                        <h6> المدير المباشر</h6>
                    </div>
                    <div class="piece-body">
                        <?php if ($ezn_data->action_direct_manager == 1) { ?>

                            <div class="col-xs-12 under-line">
                                <label class="radio-inline">
                                    نعم أوافق على استئذان الموظف المذكور أعلاه
                                </label>
                            </div>
                        <?php } else {
                            ?>
                            <div class="col-xs-12 under-line">

                                <label class="radio-inline">
                                    لا أوافق بسبب <?php echo $ezn_data->reason_action ?>
                                </label>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="piece-footer">
                        <div class="col-xs-4">
                            <h6>الإسم : <span class="valu"></span></h6>
                        </div>
                        <div class="col-xs-4">
                            <h6>التوقيع : <span class="valu"></span></h6>
                        </div>
                        <div class="col-xs-4">
                            <h6>التاريخ : <span class="valu"></span></h6>
                        </div>
                    </div>
                </div>

            <?php } ?>
            <?php if ($ezn_data->level >= 3 || (in_array($agaza_data->suspend,array(4,5)))) { ?>
                <?php
                $type_ezn1 = $total_ezn1 = $type_ezn2 = $total_ezn2 = 0;
                foreach ($ozonat as $key => $value) {
                    if ($value->no3_ezn == 1) {
                        $type_ezn1 = $value->type_ezn;
                        $total_ezn1 = $value->total;
                    } elseif ($value->no3_ezn == 2) {
                        $type_ezn2 = $value->type_ezn;
                        $total_ezn2 = $value->total;
                    }
                } ?>

                <div class="piece-box">
                    <div class="piece-heading">
                        <h6 class="text-center"> إفادة شؤون الموظفين</h6>
                    </div>
                    <div class="piece-body">
                        <div class="col-xs-12 under-line open_green">
                            <div class="col-xs-6">
                                <h6 class="text-center">بلغت الإستئذانات الشخصية للموظف </h6>
                            </div>
                            <div class="col-xs-6">
                                <h6 class="text-center">بلغت إستئذانات العمل للموظف </h6>
                            </div>

                        </div>
                        <div class="col-xs-12 under-line">
                            <div class="col-xs-6">
                                <h6 class="text-center">عدد ( <?= $type_ezn1 ?> ) المدة ( <?= $total_ezn1 ?> )</h6>
                            </div>
                            <div class="col-xs-6">
                                <h6 class="text-center">عدد ( <?= $type_ezn2 ?> ) المدة ( <?= $total_ezn2 ?> )</h6>
                            </div>

                        </div>
                        <?php if ($ezn_data->action_mowazf_moktas == 1) { ?>

                            <div class="col-xs-12 under-line open_green">
                                <div class="col-xs-4">
                                    <h6>الموظف المختص : <span class="valu"></span></h6>
                                </div>
                                <div class="col-xs-4">
                                    <h6>التوقيع : <span class="valu"></span></h6>
                                </div>
                                <div class="col-xs-4">
                                    <h6>التاريخ : <span class="valu"></span></h6>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($ezn_data->level >= 4) { ?>

                            <div class="col-xs-12 under-line">
                                <h6>&nbsp مدير الموارد البشرية والشؤون الإدارية</h6>
                            </div>
                            <div class="col-xs-12  open_green">
                                <?php if ($ezn_data->action_moder_hr == 1) { ?>

                                    <div class="col-xs-12 under-line">
                                        <label class="radio-inline">
                                            تم التأكد من جميع البيانات والتواقيع أعلاه ولا مانع من تمتع الموظف بالإجازة
                                        </label>
                                    </div>
                                <?php } else {
                                    ?>
                                    <div class="col-xs-12 under-line">

                                        <label class="radio-inline">
                                            لا أوافق بسبب <?php echo $ezn_data->reason_action ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-xs-12 under-line">
                                <div class="col-xs-4">
                                    <h6>الإسم : <span class="valu"></span></h6>
                                </div>
                                <div class="col-xs-4">
                                    <h6>التوقيع : <span class="valu"></span></h6>
                                </div>
                                <div class="col-xs-4">
                                    <h6>التاريخ : <span class="valu"></span></h6>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                    <div class="piece-footer">

                    </div>
                </div>
            <?php } ?>


            <?php if ($ezn_data->level >= 5 || (in_array($agaza_data->suspend,array(4,5)))) { ?>

                <div class="piece-box">
                    <div class="piece-heading">
                        <h6 class="text-center">توجيه المدير العام</h6>
                    </div>
                    <div class="piece-body">

                        <div class="col-xs-12 under-line ">
                            <?php if ($ezn_data->action_moder_final == 1) { ?>

                                <div class="col-xs-12">
                                    <label class="radio-inline">
                                        لا مانع
                                    </label>
                                </div>
                            <?php } else {
                                ?>
                                <div class="col-xs-12 under-line">

                                    <label class="radio-inline">
                                        لا أوافق بسبب <?php echo $ezn_data->reason_action ?>
                                    </label>
                                </div>
                            <?php } ?>


                        </div>
                    </div>
                </div>


                <br><br><br><br><h5 class="text-center"> إعتماد مدير عام الجمعية</h5>
            <?php } ?>
        </div>
    </div>

    <div class="footer-info">

        <div class="col-xs-12 no-padding print-details-footer">
            <div class="col-xs-6">
                <p class=" text-center" style="margin-bottom: 0;">
                    <small>(اسم الموظف القائم بالإدخال أو
                        الطباعة) /
                        <?php echo $UserName ?> </small>
                </p>

            </div>
            <div class="col-xs-2">
            </div>
            <div class="col-xs-4">

                <p class=" text-center" style="margin-bottom: 0;">
                    <small>تاريخ الطباعة :
                        <?= date('d-m-Y h:i a ') ?></small>
                </p>
            </div>


        </div>

    </div>
</section>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/custom.js"></script>


<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();
        window.close();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script>


</body>
</html>
