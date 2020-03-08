<!DOCTYPE html>
<html lang="en">
<head>



    <title>طباعة</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">


    <style type="text/css">
        .print_forma {
            /*border:1px solid #73b300;*/
            padding: 15px;
        }

        .piece-box {
            /*margin-bottom: 12px;*/

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
            padding: 2px 8px !important;
        }

        h6 {
            font-size: 16px;
            margin-bottom: 6px;
            margin-top: 6px;
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
            .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
            .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
            .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
                border: 2px solid #000 !important;
            }

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

        .table-bordered {
            border: 5px double #000;
        }

        .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border: 2px solid #000;
        }

        .under-line {
            /*	border-top: 1px solid #abc572;*/
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
            /*border-left: 1px solid #abc572;*/
            padding-right: 5px;
            padding-left: 5px;

        }

        .bond-header {
            height: 100px;
            margin-bottom: 20px;
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
            border: 3px solid #cdddac;
            padding: 4px;
            border-radius: 10px;
            font-size: 16px;
        }

        @media all {
            .page-break {
                display: none;
            }
        }

        @media print {
            .page-break {
                display: block;
                page-break-before: always;
            }
        }

    </style>


</head>
<body onload="printDiv('printDiv')" id="printDiv">

<div class="bond-header">
    <?php $time = array('am' => 'ص', 'pm' => 'م');
    ?>

    <div class="col-xs-4 pad-2">
        <div class="main-bond-title">
            <h3 class="text-center"><span class="">  اذن اضافة</span></h3>
        </div>
    </div>

</div>

<section class="main-body">

    <div class="col-xs-12">
        <div class="col-xs-4">

        </div>
        <div class="col-xs-4 text-center">
            <h4 class="green-border"><span>رقم الإذن : <?= $one_data['tabr3']->ezn_rkm  ?></span></h4>
        </div>
    </div>

    <div class="print_forma  col-xs-12 ">
        <div class="piece-box no-border">
            <div class="piece-body">
                <div class="col-xs-12">
                    <table class="table " style="table-layout: fixed">
                        <tbody>
                        <tr>
                            <td class="" style="width: 20%;">نوع الإذن </td>
                            <td>
                                <strong>


                                 <?php
                             if ($one_data['tabr3']->type_ezn==1) {
                                 echo "تبرعات عينية";
                             }   ?>
                                </strong>
                            </td>

                        </tr>
                        <tr>
                            <td class="" style="width: 20%;">رقم الإذن </td>
                            <td><?= $one_data['tabr3']->ezn_rkm ?></td>
                            <td class="" style="width: 20%;">تاريخ الإذن</td>
                            <td><?= $one_data['tabr3']->ezn_date_ar ?></td>
                        </tr>
                        <tr>
                            <td class="" style="width: 20%;">المبلغ</td>
                            <td><?= $one_data['tabr3']->all_value ?></td>
                            <td class="" style="width: 20%;">المستودع</td>
                            <td><?= $one_data['tabr3']->storage_name ?></td>
                        </tr>

                        <tr>
                            <td class="" style="width: 20%;">اسم الحساب</td>
                            <td><?= $one_data['tabr3']->hesab_name ?></td>
                            <td class="" style="width: 20%;">كود الحساب</td>
                            <td><?= $one_data['tabr3']->rkm_hesab ?></td>
                        </tr>
                        <tr>
                            <td class="" style="width: 20%;">اسم المتبرع</td>
                            <td><?= $one_data['tabr3']->person_name ?></td>
                            <td class="" style="width: 20%;">رقم جوال</td>
                            <td><?= $one_data['tabr3']->person_jwal ?></td>
                        </tr>
                        <tr>
                            <td class="" style="width: 20%;">تاريخ اخر المتبرع</td>
                            <td><?= $one_data['tabr3']->last_tabro3_date_ar ?></td>
                            <td class="" style="width: 20%;">نوع التبرع</td>
                            <td><?= $one_data['no3_tabro3_title'] ?></td>
                        </tr>
                        <tr>
                            <td class="" style="width: 20%;">الفئة</td>
                            <td><?= $one_data['fe2a_title']?></td>
                            <td class=" " style="width: 20%;">البند</td>
                            <td ><?= $one_data['band_title'] ?></td>
                        </tr>
                        <tr>
                            <td class="" style="width: 20%;">رقم السند</td>
                            <td colspan="3"><?= $one_data['tabr3']->mostand_rkm ?></td>

                        </tr>
                        <tr>
                            <td class="" style="width: 20%;">اسم الجهة </td>
                            <td colspan="3"><?= $one_data['tabr3']->geha_name ?></td>
                        </tr>
                        <tr>
                            <td class="" style="width: 20%;">رقم جوال </td>
                            <td colspan="3"><?= $one_data['tabr3']->geha_jwal ?></td>
                        </tr>
                        <tr>
                            <td class="" style="width: 20%;">تاريخ المستند  </td>
                            <td colspan="3"><?= $one_data['tabr3']->mostand_date_ar ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <?php if ((isset($one_data['asnaf'])) && (!empty($one_data['asnaf'])) && ($one_data['asnaf'] != 0)) { ?>
                    <div class="col-xs-12 ">
                        <br><br>
                        <table class="table table-bordered">
                            <thead>
                            <tr class="closed_green">
                                <th>م</th>
                                <th>كود الصنف</th>
                                <th>باركود</th>
                                <th>اسم الصنف</th>
                                <th> الوحدة</th>
                                <th> الرصيد المتاح</th>
                                <th> الكمية</th>
                                <th> سعر الوحدة</th>
                                <th> القيمة الإجمالية</th>
                                <th> تاريخ الصلاحية</th>
                                <th> التشغيلة</th>
                                <th> الرصيد الحالي</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $total = 0;
                            $z = 1;
                            foreach ($one_data['asnaf'] as $sanfe) {
                                ?>
                                <tr id="row_<?= $z ?>">
                                    <td><?= $z ?></td>
                                    <td><?= $sanfe->sanf_code ?></td>
                                    <td><?= $sanfe->sanf_coade_br ?></td>
                                    <td><?= $sanfe->sanf_name ?></td>
                                    <td><?= $sanfe->sanf_whda ?></td>
                                    <td><?= $sanfe->sanf_amount ?></td>
                                    <td><?= $sanfe->sanf_amount ?></td>
                                    <td><?= $sanfe->sanf_one_price ?></td>
                                    <td><?= $sanfe->all_egmali ?></td>
                                    <td><?= $sanfe->sanf_salahia_date_ar ?></td>
                                    <td><?= $sanfe->lot ?></td>
                                    <td><?= $sanfe->rased_hali ?></td>
                                </tr>
                                <?php
                                $total = $total + $sanfe->all_egmali;
                                $z++;
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="8" class="text-center"><strong> الإجمالي </strong></th>
                                <th colspan="4" id="total"><?= $total ?></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</section>


<div class="page-break"></div>


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
