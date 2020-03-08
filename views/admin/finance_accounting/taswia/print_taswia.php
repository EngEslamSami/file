




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


    <body onload="printDiv('printDiv')" id="printDiv">

<div class="bond-header">

    <div class="col-xs-12 pad-2">
        <div class="main-bond-title">
            <h3 class="text-center"><span class=""> مذكرة التسوية </span></h3>
        </div>
    </div>
    <div class="col-xs-4 pad-2">
        <div class="left-img">

        </div>
    </div>
</div>

        <section class="main-body">
    <div class="print_forma  col-xs-12 ">

        <?php
        if (isset($get_all) && !empty($get_all)){

        ?>

        <div class="col-xs-12 padding-4">


            <table class="table " style="table-layout: fixed">
                <tbody>
                <tr>
                    <td style="width: 105px;">
                        <strong>  رقم المذكرة </strong>
                    </td>
                    <td style="width: 10px;"><strong>:</strong></td>
                    <td><?= $get_all->rkm ?></td>
                    <td style="width: 135px;"><strong>اسم البنك</strong></td>
                    <td style="width: 10px;"><strong>:</strong></td>
                    <td>
                        <?php
                        if (!empty($get_all->bank_name)){
                            echo $get_all->bank_name;
                        } else{
                            echo "غير محدد" ;
                        }

                        ?>
                    </td>
                    <td style="width: 150px;"><strong>اسم الحساب </strong></td>
                    <td style="width: 10px;"><strong>:</strong></td>
                    <td>
                        <?php
                        if (!empty($get_all->hesab_name)){
                            echo $get_all->hesab_name;
                        } else{
                            echo "غير محدد" ;
                        }

                        ?>
                    </td>
                </tr>
                <tr>
                    <td><strong>  الفتره </strong></td>
                    <td><strong>:</strong></td>
                    <td>
                        <?php
                        if (!empty($get_all->taswia_date_ar)){
                            echo $get_all->taswia_date_ar;
                        } else{
                            echo "غير محدد" ;
                        }

                        ?>
                    </td>
                    <td><strong> رصيد الحساب </strong></td>
                    <td><strong>:</strong></td>
                    <td>
                        <?php
                        if (!empty($get_all->prog_total_rased)){
                            echo $get_all->prog_total_rased;
                        } else{
                            echo "غير محدد" ;
                        }

                        ?>
                    </td>

                </tr>


                </tbody>
            </table>

            <table id="" class="table double-border  table-bordered table-striped table-hover">
                <thead>
                <tr class="">

                    <th style="text-align: center !important;"> البيـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــان


                    </th>
                    <th colspan="6" style="text-align: center !important;"> هـ   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      ريال

                    </th>

                </tr>
                </thead>
                <tbody>
                <tr >
                    <td>
                        رصيد الجمعية حسب كشف  <?php
                        if ( !empty($get_all->bank_name)){
                            echo 'ب'. $get_all->bank_name;
                        }
                        if ( !empty($get_all->hesab_name)){
                            echo '-'.' '.$get_all->hesab_name ;
                        }
                        ?>

                    </td>
                    <td >

                        <?php
                        if (!empty($get_all->rased_gam3ia)){
                            echo $get_all->rased_gam3ia;
                        } else{
                            echo "غير محدد" ;
                        }

                        ?>

                    </td>


                </tr>
                <tr>
                    <td>يضاف شيكات مقاصة لحساب الجمعية ولم تظهر بكشف البنك حتى تاريخه
                    </td>
                    <td>
                        <?php
                        if (!empty($get_all->sheek_makasa)){
                            echo $get_all->sheek_makasa;
                        } else{
                            echo "غير محدد" ;
                        }

                        ?>
                    </td>
                </tr>
                <tr>
                    <td>يضاف فرق موازنة نقاط بيع لم تظهر بكشف حساب البنك
                    </td>
                    <td>

                        <?php
                        if (!empty($get_all->farq_mowazna)){
                            echo $get_all->farq_mowazna;
                        } else{
                            echo "غير محدد" ;
                        }

                        ?>
                    </td>
                </tr>
                <tr>
                    <td>يخصم شيكات سحبها الغير لصالح الجمعية واضافها البنك ولم تقيد
                    </td>
                    <td>

                        <?php
                        if (!empty($get_all->sheek_sahb)){
                            echo $get_all->sheek_sahb;
                        } else{
                            echo "غير محدد" ;
                        }

                        ?>
                    </td>
                </tr>
                <tr>
                    <td>يخصم شيكات سلمت ولم تصرف وسجلت بالجمعية
                    </td>
                    <td>

                        <?php
                        if (!empty($get_all->sheek_solmat)){
                            echo $get_all->sheek_solmat;
                        } else{
                            echo "غير محدد" ;
                        }

                        ?>

                    </td>

                </tr>
                <tr>
                    <td>الرصيد وهو مطابق لرصيد حساب البنك بدفاتر الجمعية
                    </td>
                    <td>
                        <?php
                        if (!empty($get_all->prog_total_rased)){
                            echo $get_all->prog_total_rased;
                        } else{
                            echo "غير محدد" ;
                        }

                        ?>
                    </td>
                </tr>


                </tbody>
            </table>



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





