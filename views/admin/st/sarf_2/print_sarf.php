


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
    <div class="col-xs-4 pad-2">
        <div class="main-bond-title">
            <h3 class="text-center"><span class="">  اذن الصرف</span></h3>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-4">

        </div>
        <div class="col-xs-4 text-center">
            <h4 class="green-border"><span> رقم إذن الصرف : <?= $get_all->ezn_rkm  ?></span></h4>
        </div>
    </div>

    <div class="col-xs-4 pad-2">
        <div class="left-img">

        </div>
    </div>
</div>

        <section class="main-body">
    <div class="print_forma  col-xs-12 ">

        <div class="piece-box no-border">

            <div class="col-xs-12 no-padding under-line">

                <table class="table " style="table-layout: fixed">
                    <tbody>

                    <tr>

                        <td class="" style="width: 20%;">رقم الإذن </td>
                        <td><?= $get_all->ezn_rkm ?></td>
                        <td class="" style="width: 20%;">تاريخ الإذن</td>
                        <td><?= $get_all->ezn_date_ar ?></td>
                    </tr>
                    <tr>
                        <td class="" style="width: 20%;"> المستودع </td>
                        <td><?= $get_all->storage_name ?></td>
                        <td class="" style="width: 20%;"> كود الحساب</td>
                        <td><?= $get_all->rkm_hesab ?></td>
                    </tr>

                    <tr>
                        <td class="" style="width: 20%;"> اسم الحساب </td>
                        <td><?= $get_all->hesab_name ?></td>
                        <td class="" style="width: 20%;">رقم المستند </td>
                        <td><?=$get_all->mostand_rkm ?></td>

                    </tr>
                    <tr>
                        <td class="" style="width: 20%;">  نوع الصرف </td>
                        <td>
                            <?php
                            if ($get_all->sarf_type==1){
                                echo "أسر" ;
                            } else if ($get_all->sarf_type==2){
                                echo "جهات" ;

                            } else{
                                echo "لا يوجد" ;
                            }
                            ?>
                        </td>
                        <td class="" style="width: 20%;">  رقم ملف الأسرة/الجهة </td>
                        <td><?= $get_all->sarf_to_fk?></td>
                    </tr>
                    <tr>
                        <td class="" style="width: 20%;">  الإسم </td>
                        <td><?= $get_all->sarf_to_name?></td>

                    </tr>

                    </tbody>
                </table>

            </div>



        </div>

        <?php
        if (isset($get_all->details)&& !empty($get_all->details)) {
            $x = 1;
            $total = 0;
            ?>
            <div class="clearfix"></div>
            <br>
            <br>

            <div class="piece-box no-border">
                <div class="piece-body">
                    <div class="col-xs-12">
                        <h1>الأصناف</h1>
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr class="open_green">
                                <th style="text-align: center"> م </th>
                                <th style="text-align: center">كود الصنف </th>
                                <th style="text-align: center">الباركود </th>
                                <th style="text-align: center">اسم الصنف </th>
                                <th style="text-align: center">الوحدة </th>
                                <th style="text-align: center"> سعر الوحدة </th>
                                <th style="text-align: center">الرصيد المتاح </th>
                                <th style="text-align: center"> الكمية </th>
                                <th style="text-align: center">  القيمة الإجمالية </th>
                                <th style="text-align: center">   تاريخ الصلاحية </th>
                                <th style="text-align: center">  التشغيلة </th>
                                <th style="text-align: center">  الرصيد الحالي </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($get_all->details as $item){
                                $total += $item->all_egmali;
                                ?>
                                <tr >
                                    <td><?= $x++?></td>
                                    <td><?= $item->sanf_code?></td>
                                    <td><?= $item->sanf_coade_br?></td>
                                    <td><?= $item->sanf_name?></td>
                                    <td><?= $item->sanf_whda?></td>
                                    <td><?= $item->sanf_one_price?></td>
                                    <td><?= $item->sanf_rased?></td>
                                    <td><?= $item->sanf_amount?></td>
                                    <td><?= $item->all_egmali?></td>
                                    <td>
                                        <?php
                                        if ($item->sanf_salahia_date_ar != null){
                                            echo $item->sanf_salahia_date_ar;
                                        } else{
                                            echo "لا يوجد" ;
                                        }
                                        ?>
                                    </td>
                                    <td><?= $item->lot?></td>
                                    <td><?= $item->rased_hali?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr class="open_green">
                                <th colspan="8" style="text-align: center;">الإجمالي </th>
                                <th colspan="1"  style="text-align: center;"><?= $total?></th>
                                <th colspan="3"  style="text-align: center;"></th>
                            </tr>
                            </tfoot>


                        </table>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>


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




