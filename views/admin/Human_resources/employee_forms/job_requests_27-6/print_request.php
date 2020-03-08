




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
    .vat_view{
    <?php if (isset($this->statuse_vat) && ($this->statuse_vat == 0) ){?>

        display: none;
    <?php } else{
   ?>
        display: block;

    <?php
   } ?>
    }

</style>


<body onload="printDiv('printDiv')" id="printDiv">


<div class="bond-header">

    <div class="col-xs-12 pad-2">
        <div class="main-bond-title">
            <h3 class="text-center"><span class="">   طلب احتياج وظيفة </span></h3>
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
                <div class="print_forma  col-xs-12 no-padding">
                    <div class="piece-box">
                        <div class="piece-heading">

                            <div class="col-xs-5 ">
                                <input type="hidden" id="row_id" value="<?= $get_requset->id?>">
                                <h5> <?php echo $get_requset->job_title  ;?></h5>
                            </div>
                            <div class="col-xs-3">
                                <h5>العدد(<?php echo $get_requset->num_for_job ;?>)</h5>
                            </div>
                        </div>
                        <div class="piece-body">
                            <div class="col-xs-2">
                                <h6>نوع الوظيفة</h6>
                            </div>
                            <div class="col-xs-3">
                                <h6>
                                    <?= $get_requset->type_name?>

                                </h6>
                            </div>
                        </div>
                        <div class="piece-footer">
                            <div class="col-xs-3">
                                <h6>طبيعة العمل بالوظيفة</h6>
                            </div>

                            <div class="col-xs-5">
                                <h6>
                                    <?= $get_requset->nature_name?>
                                </h6>
                            </div>

                        </div>
                    </div>

                    <div class="piece-box" style="margin-bottom: 0">
                        <div class="piece-heading">
                            <div class="col-xs-12">
                                <h5>أسباب ومبررات الإحتياج</h5>
                            </div>
                        </div>
                        <div class="piece-body">
                            <div class="col-xs-12  ">
                                <?php if(!empty($get_requset->reasons)){
                                    $xx=1;
                                    foreach ($get_requset->reasons as $value){?>



                                        <h6><?php echo $xx;?>-<?php echo $value->details;?></h6>

                                        <?php $xx++; }
                                } else{?>
                                    <h6>لا توجد اسباب</h6>

                                <?php  }?>
                            </div>

                        </div>
                    </div>

                    <div class="piece-box" >
                        <div class="piece-heading">
                            <div class="col-xs-12">
                                <h5>متطلبات للعمل بالوظيفة</h5>

                            </div>
                        </div>
                        <div class="piece-body">
                            <div class="col-xs-12  ">
                                <?php if(!empty($get_requset->requests)){
                                    $xx=1;
                                    foreach ($get_requset->requests as $value){?>



                                        <h6><?php echo $xx;?>-<?php echo $value->details;?></h6>

                                        <?php $xx++; }
                                } else{?>
                                    <h6>لا توجد متطلبات وظيفه</h6>

                                <?php  }?>
                            </div>

                        </div>
                        <div class="piece-footer">

                        </div>
                    </div>

                </div>


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





