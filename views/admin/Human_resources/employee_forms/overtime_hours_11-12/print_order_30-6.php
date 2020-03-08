




    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">

    <style type="text/css">
        @import url(<?php echo base_url()?>asisst/admin_asset/fonts/ht/HacenTunisia.css);
        @import url(<?php echo base_url()?>asisst/admin_asset/fonts/hl/HacenLinerScreen.css);
        @import url(<?php echo base_url()?>asisst/admin_asset/fonts/ge/ge.css);

        body {
            font-family: 'hl';

        }
        .main-body {

            background-image: url(<?php echo base_url()?>asisst/admin_asset/img/pills/paper-bg.png);

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
            margin-bottom: 12px;
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
        .bordered-bottom{
            border-bottom: 1px solid #000;
        }
        .piece-footer{
            display: inline-block;
            float: right;
            width: 100%;
            border-top: 1px solid #000;
        }
        .piece-heading h5 {
            margin: 4px 0;
        }
        .piece-box table{
            margin-bottom: 0
        }
        .piece-box table th,
        .piece-box table td
        {
            padding: 2px 8px !important;
        }

        h6 {
            font-size: 17px;
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
            border-top: 1px solid #000;
            margin-top: 7px;
            margin-bottom: 7px;
        }

        .no-border{
            border:0 !important;
        }

        .gray_background{
            background-color: #eee;

        }
        .graytd th,.graytd td{
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

        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
            border: 1px solid #000;
            font-size: 17px;
        }
        .under-line{
            border-top: 1px solid #000;
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
        .under-line .col-xs-5 ,
        .under-line .col-xs-6 ,
        .under-line .col-xs-8
        {
            border-left: 1px solid #000;
        }

        .green-border span {
            border: 6px double #000;
            padding: 4px 25px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px 2px #000;
        }
        label.radio-inline{
            font-size: 17px;
        }

        .footer-info {
            position: absolute;
            width: 100%;
            bottom: 70px;
        }


        @media print {

            .table-bordered  th, .table-bordered  td {
                border: 1px solid #000 !important

            }

        }


        @page {
            size: 210mm 297mm  ;
            margin: 0;

        }

    </style>


    <body onload="printDiv('printDiv')" id="printDiv">

<div class="bond-header">

    <div class="col-xs-12 pad-2">
        <div class="main-bond-title">
            <h3 class="text-center"></h3>
        </div>
    </div>
    <div class="col-xs-4 pad-2">
        <div class="left-img">

        </div>
    </div>
</div>

<section class="main-body">

    <div class="container-fluid">

        <div class="print_forma  col-xs-12 ">

            <div class="col-xs-12 no-padding">
                <div class="col-xs-3 text-center">

                </div>
                <div class="col-xs-5 text-center">
                    <h4 class="green-border"><span>تكليف إضافي</span></h4>
                </div>
                <div class="col-xs-4 text-center">

                </div>
            </div>


            <div class="piece-box" style="margin-top: 20px">
                <div class="piece-body">
                    <div class="col-xs-12 no-padding">

                        <div class="col-xs-12 no-padding under-line ">
                            <div class="col-xs-4 padding-4">
                                <h6>الرقم الوظيفي<span class="valu"><?= $result->emp_code_fk?></span></h6>
                            </div>
                            <div class="col-xs-4 padding-4">
                                <h6>اسم الموظف:<span class="valu"> <?= $result->emp_name?></span></h6>
                            </div>
                            <div class="col-xs-4 padding-4">
                                <h6>المسمى الوظيفي<span class="valu"><?php echo $result->mosama_wazefy ;?></span></h6>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding under-line ">
                            <div class="col-xs-4 padding-4">
                                <h6>الإدارة<span class="valu"><?php echo $result->edara_n ;?></span></h6>
                            </div>
                            <div class="col-xs-4 padding-4">
                                <h6>القسم<span class="valu"><?php echo $result->qsm_n ;?></span></h6>
                            </div>
                            <div class="col-xs-4 padding-4">
                                <h6>التاريخ<span class="valu"><?php echo $result->order_date ;?></span></h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="piece-box">
                <div class="piece-heading">
                    <h6>&nbsp  المدير المباشر</h6>
                </div>
                <div class="piece-body" >
                    <div class="col-xs-12 under-line ">
                        <h5 class="text-center">الأستاذ / <?=$result->direct_manger_n?>  المحترم</h5>

                        <h5>  &nbsp &nbsp&nbsp&nbsp مسمى الوظيفة :  <?=$result->direct_manger_mosama_wazefy?></h5>

                        <h6>  &nbsp &nbsp&nbsp&nbsp نظراً لـ <?=$result->nazran_to?> فقد تم تكليفكم بإنجاز العمل التالي :</h6><br>

                        <h6>&nbsp &nbsp&nbsp&nbsp  -	<?= nl2br($result->work_assigned_details)?></h6>

                        <h6 class="text-center">&nbsp   على أن يتم ذلك خلال اليوم/الأيام والأوقات المحددة أدناه </h6>
                        <h6 class="text-center">وألا تتجاوز عدد الساعات (  <?=$result->total_hours?>    ) ساعة / ساعات .     وجزاكم الله خيراً ،،،</h6><br>


                    </div>
                    <div class="col-xs-12 no-padding">
                        <?php if(!empty($result->details)){ ?>
                        <table class="table table-bordered" style="table-layout: fixed;">
                            <thead>
                            <tr class="graytd">
                                <th style="width: 110px;">التاريخ</th>
                                <th style="width: 110px;">من الساعة</th>
                                <th style="width: 110px;">إلى الساعة</th>
                                <th style="width: 80px;">المدة</th>
                                <th style="width: 110px;">البدل الأضافي</th>
                                <th>العمل المكلف بإنجازه</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            foreach ($result->details as $record){
                                ?>
                                <tr class="">
                                    <td><?=$record->date_ar ?></td>
                                    <td><?=$record->from_hour?></td>
                                    <td><?=$record->to_hour?></td>
                                    <td><?=$record->num_hours?></td>
                                    <td>   <?php if($record->bdal_type_fk ==1){ echo 'بدل أيام الراحة';}elseif($record->bdal_type_fk ==0){ echo'بدل نقدي';}?></td>
                                    <td><?=$record->work_assigned?></td>
                                </tr>

                            <?php } ?>

                            </tbody>
                        </table>
                        <?php } ?>
                    </div>

                </div>
                <div class="piece-footer">
                    <div class="col-xs-4 padding-4">
                        <h6>الإسم : <span class="valu"></span></h6>
                    </div>
                    <div class="col-xs-4 padding-4">
                        <h6>التوقيع : <span class="valu"></span></h6>
                    </div>
                    <div class="col-xs-4 padding-4">
                        <h6>التاريخ : <span class="valu"></span></h6>
                    </div>
                </div>
            </div>



            <div class="piece-box" >
                <div class="piece-heading">
                    <h6 class="text-center"> إفادة شؤون الموظفين</h6>
                </div>
                <div class="piece-body" >


                    <div class="col-xs-12 under-line ">
                        <div class="col-xs-4 padding-4">
                            <h6>الموظف المختص : <span class="valu"></span></h6>
                        </div>
                        <div class="col-xs-4 padding-4">
                            <h6>التوقيع : <span class="valu"></span></h6>
                        </div>
                        <div class="col-xs-4 padding-4">
                            <h6>التاريخ : <span class="valu"></span></h6>
                        </div>
                    </div>
                    <div class="col-xs-12 under-line  padding-4">
                        <h6> مدير الموارد البشرية والشؤون الإدارية</h6>
                    </div>
                    <div class="col-xs-12   padding-4">
                        <div class="col-xs-12 under-line">
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions1" id="inlineRadio7" value="option1"> تم التأكد من جميع البيانات والتواقيع أعلاه
                            </label>
                        </div>
                        <div class="col-xs-12 under-line">

                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions1" id="inlineRadio7" value="option1"> .....................................................................
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 under-line">
                        <div class="col-xs-4 padding-4">
                            <h6>الإسم : <span class="valu"></span></h6>
                        </div>
                        <div class="col-xs-4 padding-4">
                            <h6>التوقيع : <span class="valu"></span></h6>
                        </div>
                        <div class="col-xs-4 padding-4">
                            <h6>التاريخ : <span class="valu"></span></h6>
                        </div>
                    </div>



                </div>
                <div class="piece-footer">

                </div>
            </div>




            <div class="piece-box">
                <div class="piece-heading">
                    <h6 class="text-center"> توجيه المدير العام</h6>
                </div>
                <div class="piece-body">
                    <div class="col-xs-12 under-line ">
                        <h6>&nbsp<label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio7" value="option1"> يعتمد صرف البدل نقدي
                            </label></h6>
                        <h6>&nbsp<label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio7" value="option1"> يعتمد صرف البدل أيام راحه
                            </label></h6>
                        <h6>&nbsp<label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio7" value="option1"> أخرى
                            </label></h6>
                    </div>


                </div>

            </div>

            <div class="col-xs-12">
                <div class="col-xs-7">

                </div>
                <div class="col-xs-5 no-padding text-center">
                    <h4 style="    margin-bottom: 30px;" >إعتماد مدير عام الجمعية</h4>
                    <h4 >سلطان بن محمد الجاسر</h4>
                </div>
            </div>



        </div>
    </div>



    <div class="footer-info">

        <div class="col-xs-12 no-padding print-details-footer">
            <div class="col-xs-6">
                <p class=" text-center" style="margin-bottom: 0;">
                    <small> (بواسطة: نايف الحربي )</small>
                </p>

            </div>
            <div class="col-xs-2">
            </div>
            <div class="col-xs-4">

                <p class=" text-center" style="margin-bottom: 0;">
                    <small>تاريخ الطباعة : 20/5/2019</small>
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





