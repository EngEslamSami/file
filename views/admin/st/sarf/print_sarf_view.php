<head>


    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">

    <style type="text/css">
        .main-body {

            background-image: url(<?php echo base_url() ?>asisst/admin_asset/img/pills/paper-bg.png);
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
            /*margin-bottom: 12px;*/
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
            margin-bottom: 0;
            font-size: 17px;
        }

        .piece-box table th,
        .piece-box table td {

            /*padding: 2px 8px !important;*/
        }

        .piece-box .table > thead > tr > th, .piece-box .table > tbody > tr > th,
        .piece-box .table > tfoot > tr > th, .piece-box .table > thead > tr > td,
        .piece-box .table > tbody > tr > td, .piece-box .table > tfoot > tr > td {
            text-align: center;
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
            .table-bordered.double > thead > tr > th, .table-bordered.double > tbody > tr > th,
            .table-bordered.double > tfoot > tr > th, .table-bordered.double > thead > tr > td,
            .table-bordered.double > tbody > tr > td, .table-bordered.double > tfoot > tr > td {
                border: 2px solid #000 !important;
            }


            .table-bordered.white-border th, .table-bordered.white-border td {
                border: 1px solid #fff !important

            }

        }


        @page {
            size: 210mm 297mm  ;
            margin: 0;

        }

        .open_green {
            background-color: #e6eed5;
        }

        .closed_green {
            background-color: #cdddac;
        }

        .table-bordered.double {
            border: 5px double #000;
        }

        .table-bordered.white-border {
            margin-bottom: 3px;
        }

        .table-bordered.table-asnaf > thead > tr > th,
        .table-bordered.table-asnaf > thead > tr > td,
        .table-bordered.table-asnaf > tbody > tr > th,
        .table-bordered.table-asnaf > tbody > tr > td,
        .table-bordered.table-asnaf > tfoot > tr > th,
        .table-bordered.table-asnaf > tfoot > tr > td {
            border: 1px solid #000 !important;
            background: #fff !important;
            border-radius: 0px !important;
            font-size: 17px !important;
            color: black;
        }


        .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border: 2px solid #000;
        }

        .table-bordered.white-border > tbody > tr > th, .table-bordered.white-border > tbody > tr > td {
            border: 1px solid #eee !important;
            background: #fff;
            border-radius: 0px !important;
            font-size: 17px !important;
            color: black;
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

        .bond-header {
            height: 100px;
            margin-bottom: 30px;
        }

        .bond-header .right-img img,
        .bond-header .left-img img {
            width: 100%;
            height: 100px;
        }

        .main-bond-title {
            display: table;
            height: 100px;
            text-align: center;
            width: 100%;
        }

        .main-bond-title h3 {
            display: table-cell;
            vertical-align: bottom;
            color: #d89529;
        }

        .main-bond-title h3 span {
            border-bottom: 2px solid #006a3a;
        }

        .green-border span {
            border: 6px double #000;
            padding: 8px 25px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px 2px #000;
        }

        .table-bordered > tbody > tr td.rosasy-bg {
            background-color: #eee;
            border: 1px solid #fff;
        }

        .hl {
            font-family: 'hl';
        }

        .footer-info {
            position: absolute;
            width: 100%;
            bottom: 70px;
        }
    </style>


</head>
<body onload="printDiv('printDiv')" id="printDiv">
<!--<body>-->

<section class="main-body">

    <div class="print_forma  col-xs-12 ">
        <div class="col-xs-12 no-padding">
            <div class="col-xs-4 text-center">

            </div>
            <div class="col-xs-4 text-center">
                <h4 class="green-border"><span>إذن صرف </span></h4>
            </div>
            <div class="col-xs-4 text-center">

            </div>
        </div>

        <div class="piece-box" style="margin-top: 20px">
            <div class="piece-body">
                <div class="col-xs-12">
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr>
                            <td style="width: 100px" class="rosasy-bg">نوع الصرف</td>
                            <td> <?php echo "مساعدات عينية"; ?></td>
                            <td style="width: 80px" class="rosasy-bg">رقم الإذن</td>
                            <td style="width: 80px"><span class="badge"
                                                          style="font-size: 20px;"><?= $get_all->ezn_rkm ?></span></td>
                            <td style="width: 100px" class="rosasy-bg">تاريخ الصرف</td>
                            <td style="width: 120px"><?= $get_all->ezn_date_ar ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr>
                            <td style="width: 100px" class="rosasy-bg">المستودع</td>
                            <td><?= $get_all->storage_name ?></td>
                            <td style="width: 110px" class="rosasy-bg">أمين المستودع</td>
                            <td><?= $get_all->store_emp ?></td>

                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-xs-12">
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr>
                            <td style="width: 100px" class="rosasy-bg"><?php
                                if ($get_all->sarf_type == 1) {
                                    echo "الاسرة";
                                } else if ($get_all->sarf_type == 2) {
                                    echo "الجهة";

                                }
                                ?></td>
                            <td><?= $get_all->sarf_to_name ?></td>
                            <td style="width: 80px" class="rosasy-bg"><?php
                                if ($get_all->sarf_type == 1) {
                                    echo "رقم الملف";
                                } else if ($get_all->sarf_type == 2) {
                                    echo "رقم الجهة";
                                }
                                ?></td>
                            <td style="width: 80px"><?= $get_all->sarf_to_fk ?></td>
                            <?php if ($get_all->sarf_type == 1) { ?>
                                <td style="width: 80px" class="rosasy-bg">الفئة</td>
                                <td style="width: 80px"><?= $get_all->family_cat_name ?></td>
                            <?php } ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="piece-box no-border">
            <div class="piece-body">
                <?php
                if (isset($get_all->details) && !empty($get_all->details)) {
                    $x = 1;
                    $total = $total_amount = 0;
                    ?>
                    <div class="col-xs-12">
                        <table class="table table-bordered double table-asnaf" style="table-layout: fixed">
                            <thead>
                            <th style="width: 40px; font-size: 18px !important; font-weight: bold !important;">م</th>
                            <th style="width: 100px; font-size: 18px !important; font-weight: bold !important;">كود الصنف</th>
                            <th style="font-size: 18px !important; font-weight: bold !important;">اسم الصنف</th>
                            <th style="width: 80px; font-size: 18px !important; font-weight: bold !important;">الوحدة</th>
                            <th style="width: 80px; font-size: 18px !important; font-weight: bold !important;">الكمية</th>
                            <th style="width: 100px; font-size: 18px !important; font-weight: bold !important;">سعر الوحدة</th>
                            <th style="width: 100px; font-size: 18px !important; font-weight: bold !important;">الإجمالي</th>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($get_all->details as $item) {
                                $total += $item->all_egmali;
                                $total_amount += $item->sanf_amount;
                                ?>
                                <tr>
                                    <td><?= $x++ ?></td>
                                    <td><?= $item->sanf_code ?></td>
                                    <td><?= $item->sanf_name ?></td>
                                    <td><?= $item->sanf_whda ?></td>
                                    <td><?= $item->sanf_amount ?></td>
                                    <td><?= $item->sanf_one_price ?></td>
                                    <td><?= $item->all_egmali ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <th style="font-size: 18px !important; font-weight: bold !important;" colspan="4">الإجمـــــــــــــــــــــــــــــــــــــالي</th>
                            <th style="font-size: 18px !important; font-weight: bold !important;"><?= $total_amount ?></th>
                            <th style="font-size: 18px !important; font-weight: bold !important;" colspan="2"><?= number_format($total, 2, '.', '') ?></th>
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-xs-12 hl">
                        <h5>استلمت الأصناف الموضحة أعلاه وبحالة سليمة . </h5>
                        <div class="col-xs-4 padding-4">
                            <h6>المستلم :<?php echo $get_all->responsable_name ?> </h6>
                        </div>
                        <div class="col-xs-2 padding-4">
                            <h6>الجوال :<?php echo $get_all->jwal ?> </h6>
                        </div>
                        <div class="col-xs-3 padding-4">
                            <h6> التوقيع:   </h6>
                        </div>
                        <div class="col-xs-3 padding-4 text-left">
                            <h6>التاريخ :<?= date('d-m-Y') ?> </h6>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="col-xs-12 hl" style="margin-top: 30px;">
                    <div class="col-xs-4 text-center">
                        <h5 style="margin-bottom: 40px;">أمين المستودع </h5>
                        <h5><?= $get_all->store_emp ?></h5>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h5 style="margin-bottom: 40px;">الختم </h5>
                        <h5></h5>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h5 style="margin-bottom: 40px;">مدير الإدارة/القسم</h5>
                        <h5></h5>
                    </div>

                </div>
            </div>
        </div>


    </div>


    <div class="footer-info">

        <div class="col-xs-12 no-padding print-details-footer">
            <div class="col-xs-6">
                <p class=" text-center" style="margin-bottom: 0;">
                    <small> (بواسطة: <?php echo $UserName ?> )</small>
                </p>

            </div>
            <div class="col-xs-2">
                <!--   <p class=" text-center" style="margin-bottom: 0;">رقم الصفحة</p> -->
            </div>
            <div class="col-xs-4">

                <p class=" text-center" style="margin-bottom: 0;">
                    <small>تاريخ الطباعة : <?= date('d-m-Y h:i a ') ?></small>
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
