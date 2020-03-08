




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
            <h3 class="text-center"><span class="">  طلب إذن </span></h3>
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

                <?php
                if (isset($get_ezn) && !empty($get_ezn)){
                    ?>

                    <table class="table " style="table-layout: fixed">

                        <tbody>

                        <tr>
                           <td>
                                <strong>   نوع الاذن </strong>
                            </td>
                            <td style="width: 10px;"><strong>:</strong></td>
                            <td> <?php
                                if (!empty($get_ezn->no3_ezn)){
                                    if ($get_ezn->no3_ezn==1){
                                        echo " استئذان شخصي";
                                    } elseif ($get_ezn->no3_ezn==2){
                                        echo " استئذان للعمل";
                                    }
                                }
                                ?></td>
                            <td
                                <strong>   تاريخ الاذن </strong>
                            </td>
                            <td style="width: 10px;"><strong>:</strong></td>
                            <td><?php echo $get_ezn->ezn_date_ar;?></td>

                        </tr>

                        <tr>
                            <td>
                            <strong>   بدايه الاذن </strong>
                            </td>
                            <td style="width: 10px;"><strong>:</strong></td>
                            <td> <?php echo $get_ezn->from_hour;?></td>
                            <td>

                                <strong>   نهايه الاذن </strong>
                            </td>
                            <td style="width: 10px;"><strong>:</strong></td>
                            <td><?php echo $get_ezn->to_hour;?></td>

                        </tr>
                        <tr>
                            <td>
                            <strong>    المدة </strong>
                            </td>
                            <td style="width: 10px;"><strong>:</strong></td>
                            <td><?php echo $get_ezn->total_hours;?></td>
                            <td>

                                <strong>    الفترة </strong>
                            </td>
                            <td style="width: 10px;"><strong>:</strong></td>
                            <td><?php echo $get_ezn->fatra_n;?></td>

                        </tr>


                        <?php
                        if (!empty($get_ezn->reason)){
                            ?>
                            <tr>
                                <td>
                                <strong>    السبب </strong>
                                </td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?= $get_ezn->reason?></td>

                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>

                    <?php
                }
                ?>
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





