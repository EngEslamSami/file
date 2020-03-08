
<!DOCTYPE html >
<html lang = "en" >
<head >
    <meta charset = "utf-8" >
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css" >
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/style.css" >


    <style type="text/css">
        .print_forma{
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
        .bordered-bottom{
            border-bottom: 4px solid #9bbb59;
        }
        .piece-footer{
            display: inline-block;
            float: right;
            width: 100%;
            border-top: 1px solid #73b300;
        }
        .piece-heading h5 {
            margin: 4px 0;
        }
        .piece-box table{
            margin-bottom: 0;
            font-size: 17px;
        }
        .piece-box table th,
        .piece-box table td
        {
            padding: 2px 8px !important;
        }

        h6 {
            font-size: 16px;
            margin-bottom: 3px;
            margin-top: 3px;
        }
        .print_forma table th{
            text-align: right;
        }
        .print_forma table tr th{
            vertical-align: middle;
        }
        .no-padding{
            padding: 0;
        }
        .header p{
            margin: 0;
        }
        .header img{
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

        .print_forma hr{
            border-top: 1px solid #73b300;
            margin-top: 7px;
            margin-bottom: 7px;
        }

        .no-border{
            border:0 !important;
        }

        .gray_background{
            background-color: #eee;

        }
        @media print{
            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
            }
        }
        .footer img{
            width: 100%;
            height: 120px;
        }
        @page {
            size: A4;
            margin: 20px 0 0;
        }
        .open_green{
            background-color: #e6eed5;
        }
        .closed_green{
            background-color: #cdddac;
        }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
            border: 1px solid #abc572;
        }
        .under-line{
            border-top: 1px solid #abc572;
            padding-left: 0;
            padding-right: 0;
        }
        span.valu {
            padding-right: 10px;
            font-weight: 600;
            font-family: sans-serif;
        }

        .under-line .col-xs-3 ,
        .under-line .col-xs-4,
        .under-line .col-xs-6 ,
        .under-line .col-xs-8
        {
            border-left: 1px solid #abc572;
        }

    </style>




</head >
<body >



<body onload="printDiv('printDiv')" id="printDiv">

    <div class="header col-xs-12 no-padding">
        <div class="col-xs-4 text-center">
            <div class="col-xs-8 no-padding">
                <h5>الجمعية الخيرية لرعاية الأيتام ببريدة (أبـناء)</h5>
                <p>مسجلة بوزارة العمل والتنمية الإجتماعية<br> تصريح رقم 463</p>
            </div>
            <div  class="col-xs-4 no-padding">
                <img src="<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png" >
            </div>
        </div>
        <div class="col-xs-4 text-center">
            <div class="main-title">
                <h4>تقييم فتره التجربه</h4>
            </div>
        </div>
        <div class="col-xs-4 ">
            <h6>الرقم :.............</h6>
            <h6>التاريخ : ...............</h6>
            <h6>المرفقات : ...............</h6>
            <h6>الموضوع : ............</h6>
        </div>
    </div>
    <div class="clearfix"></div>	<br>
    <section class="main-body">

        <div class="container">

            <div class="print_forma  col-xs-12 no-padding">
          

                <div class="piece-box no-border">
                    <div class="piece-body">
                        <div class="col-xs-12 no-padding">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="">
                                    <th> إسم الموظف</th>
                                    <th><?php if (isset($records->emp_data->emp_name)){ echo $records->emp_data->emp_name ;}?></th>
                                </tr>
                                <tr class="">
                                    <th>الإدارة</th>
                                    <th><?php if (isset($records->emp_data->edara_n)){ echo $records->emp_data->edara_n ;}?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr class="open_green">
                                    <td>القسم</td>
                                    <td><?php if (isset($records->emp_data->qsm_n)){ echo $records->emp_data->qsm_n ;}?></td>

                                </tr>
                                <tr>
                                    <td>المسمى الوظيفي</td>
                                    <td><?php if (isset($records->emp_data->job_title_n)){ echo $records->emp_data->job_title_n ;}?></td>
                                </tr>
                                <tr class="open_green">
                                    <td> تاريخ بدايه التعيين</td>
                                    <td><?php if (isset($records->emp_data->date_from_m)){ echo date('Y/m/d', strtotime($records->emp_data->date_from_m) ) ;} ?></td>
                                </tr>
                                <tr>
                                    <td>تاريخ انتهاء فتره التجربه </td>
                                    <td><?php if (isset($records->emp_data->date_to_m)){ echo date('Y/m/d', strtotime($records->emp_data->date_to_m))  ;}?></td>
                                </tr>
                                <tr class="open_green">
                                    <td>التقييم</td>
                                    <td><?php
                                        $types=array(1=>"ممتاز",2=>"جيد جدا",3=>"جيد",4=>'مقبول',5=>'غير مرضي');
                                        foreach ($types as $key=>$value){
                                            if ($key == $records->taqdeer){
                                                echo $value;
                                            }

                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td> نتيجه التقييم</td>
                                    <td><?php

                                        if ($records->result_tagraba==1){
                                            echo " تثبيت الموظف";
                                        } elseif ($records->result_tagraba==2){
                                            echo "  ترقيه لوظيفه اعلي";
                                        }elseif ($records->result_tagraba==3){
                                            echo "    الاستغناء عن الموظف";
                                        }
                                        ?></td>
                                </tr>


                                </tbody>
                            </table>

                            <div class="clearfix"></div><br>
                            <?php
                            if (isset($records->positives) && !empty($records->positives)){
                                $x = 1;

                                ?>
                                <div class="col-xs-12">
                                    <table class="table table-bordered ">
                                        <thead>
                                        <tr class="">
                                            <th>م</th>
                                            <th>نقاط القوة (الإيجابيات)</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        foreach ($records->positives as $positive){
                                            ?>

                                            <tr>
                                                <td><?= $x++?></td>
                                                <td><?= $positive->title?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>

                                    </table>
                                </div>
                                <?php


                            }
                            ?>
                            <div class="clearfix"></div> <br>


                            <?php
                            if (isset($records->negatives) && !empty($records->negatives)){
                                $y = 1;

                                ?>
                                <div class="col-xs-12">


                                    <table class="table table-bordered ">
                                        <thead>
                                        <tr class="">
                                            <th>م</th>
                                            <th>نقاط الضعف(السلبيات)</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        foreach ($records->negatives as $negative){
                                            ?>

                                            <tr>
                                                <td><?= $y++?></td>
                                                <td><?= $negative->title?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>

                                    </table>
                                </div>
                                <?php


                            }
                            ?>




                            <div class="col-xs-4 col-xs-offset-8">
                                <h5>مدير عام الجمعية</h5>
                                <h5>   سلطان بن محمد الجاسر</h5>
                            </div>


                        </div>




                    </div>



                </div>
            </div>



    </section>




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

