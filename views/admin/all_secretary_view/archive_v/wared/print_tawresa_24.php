<!DOCTYPE html>
<html lang="en">
<head>


    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">
    <style type="text/css" media="print">
        body {
            background-image: url('<?php echo base_url() ?>asisst/admin_asset/img/pills/larose-back.jpg');
            background-repeat: repeat-y;
            background-position: right top;
            background-attachment: fixed;
            background-size: 100%;
        }


    </style>

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

        .vat_view {
        <?php if (isset($this->statuse_vat) && ($this->statuse_vat == 0) ){?> display: none;
        <?php } else{
       ?> display: block;

        <?php
       } ?>
        }

    </style>

    <style>
        .header-info, .header-space {
            /*  height: 192px;*/
            height: 100px;
        }

        .footer-info, .footer-space {
            height: 80px;
        }

        .header-info {
            position: fixed;
            top: 0;
            width: 100%;
        }

        .footer-info {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @page {
            size: 210mm 297mm;
            margin: 10px 10px 0px 10px;
        }

        table {
            page-break-after: auto
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto
        }

        td {
            page-break-inside: avoid;
            page-break-after: auto
        }

        table.report-content {
            page-break-after: always;
        }

        thead.report-header {
            display: table-header-group;
        }

        tfoot.report-footer {
            display: table-footer-group;
        }

    </style>
<body onload="printDiv('printDiv')" id="printDiv">
<div class="col-xs-3 text-center print_head" style="font-weight: 600;padding-left: 0; ">
    <p class="fhelvetic no-margin"> <?= $get_all->rkm ?></p>
    <p class="fhelvetic no-margin">
        <?php if (!empty($get_all->tsgeel_date)) {
            echo  $get_all->tsgeel_date;
        } else{
            echo 'غير محدد' ;
        }
        ?>
        م
    </p>
    <p class="fhelvetic no-margin ">0</p>
    <p style="margin-top: 8px;" class="fhelvetic no-margin" >(<?php echo ''?>)</p>
</div>
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
        var title = '<?php echo $title?>';

        document.body.innerHTML =
            "<html><head><title>'+title+'</title></head><body >" +
            divElements + "</body>";

        //Print Page
       /* document.print();
        window.print();
        document.print();
        document.close();*/
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
        window.close();

    }
</script>

</body>
</html>
