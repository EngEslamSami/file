




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

    <div class="container">

        <div class="print_forma  col-xs-12 ">

            <div class="col-xs-12 no-padding">
                <div class="col-xs-3 text-center">

                </div>
                <div class="col-xs-5 text-center">
                    <h4 class="green-border"><span>طلب إنتداب</span></h4>
                </div>
                <div class="col-xs-4 text-center">

                </div>
            </div>


            <div class="piece-box" style="margin-top: 20px">
                <div class="piece-body">
                    <div class="col-xs-12  under-line ">
                        <div class="col-xs-4 ">
                            <h6>رقم الطلب <span class="valu"><?= $result->id?></span></h6>

                        </div>
                        <div class="col-xs-4">
                            <h6>نوع الإنتداب<span class="valu"><?php if ($result->mandate_type_fk == 1){
                                        echo "انتداب عمل1";
                                    } elseif ($result->mandate_type_fk ==2){
                                        echo "انتداب عمل 2";
                                    }?></span></h6>
                        </div>
                        <div class="col-xs-4">
                            <h6>التاريخ<span class="valu"> <?= $result->date?></span></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="piece-box">
                <div class="piece-body">
                    <div class="piece-heading">
                        <h6>&nbsp بيانات الموظف</h6>
                    </div>
                    <div class="col-xs-12 no-padding">

                        <div class="col-xs-12 no-padding under-line ">
                            <div class="col-xs-4">
                                <h6>الرقم الوظيفي<span class="valu"><?= $result->emp_code?></span></h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>اسم الموظف:<span class="valu"> <?= $result->emp_name?></span></h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>المسمى الوظيفي<span class="valu"><?= $result->job_title?></span></h6>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding under-line ">
                            <div class="col-xs-4">
                                <h6>الإدارة<span class="valu"><?= $result->edara_name?></span></h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>القسم<span class="valu"></span><?= $result->qsm_name?></h6>
                            </div>
                            <div class="col-xs-4">
                                <h6>عدد مرات انتداب الموظف<span class="valu"></span></h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="piece-box">
                <div class="piece-body">
                    <div class="piece-heading ">
                        <h6>&nbsp بيانات الإنتداب</h6>
                    </div>
                    <div class="col-xs-12 no-padding">

                        <div class="col-xs-12 no-padding under-line  ">
                            <div class="col-xs-6">
                                <h6>جهة الإنتداب<span class="valu"> <?= $result->mandate_direction?></span></h6>
                            </div>
                            <div class="col-xs-6">
                                <h6>المسافة <span class="valu"><?= $result->mandate_distance?> </span></h6>
                            </div>

                        </div>
                        <div class="col-xs-12 no-padding under-line">
                            <div class="col-xs-12">
                                <h6>الغرض من الإنتداب</h6>
                                <p>- <?= $result->mandate_purpose?></p>


                            </div>
                        </div>
                        <div class="col-xs-12 no-padding under-line  ">
                            <div class="col-xs-6">
                                <h6>فترة الإنتداب من تاريخ : <span class="valu"> <?= $result->from_date?></span></h6>
                            </div>
                            <div class="col-xs-6">
                                <h6>مدة الإنتداب بالأيام <span class="valu"><?= $result->num_days?></span></h6>
                            </div>

                        </div>


                        <div class="col-xs-12 no-padding under-line  ">
                            <div class="col-xs-6">
                                <h6>جهة الإنتداب<span class="valu"><?= $result->mandate_direction?> </span></h6>
                            </div>
                            <div class="col-xs-6">
                                <h6>المسافة <span class="valu"> <?= $result->mandate_distance?></span></h6>
                            </div>

                        </div>

                        <div class="col-xs-12 no-padding under-line  ">

                            <div class="col-xs-3">
                                <h6>بدل الإنتداب<span class="valu">     <?php
                                        $arr_badl=array(1=>'بدل1',2=>'بدل2');
                                        foreach($arr_badl as $key=>$value){
                                            if(!empty($result->bdal_count_method == $key.'-'.$key*100)){
                                                echo $value;
                                            }
                                            ?>

                                            <?php
                                        }
                                        ?></span></h6>
                            </div>
                            <div class="col-xs-6">
                                <h6>إجمالي <span class="valu"> <?= $result->bdal_total?></span></h6>
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
                    <div class="col-xs-12 under-line">
                        <h6>&nbsp آمل الموافقة على انتداب الموظف للمدة المشار إليها أعلاه .</h6>
                        <h6 class="text-center">وتقبلوا خالص تحياتي؛؛؛؛</h6>
                    </div>

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


            <div class="piece-box">
                <div class="piece-heading">
                    <h6 class="text-center"> اعتماد صاحب الصلاحية</h6>
                </div>
                <div class="piece-body">
                    <div class="col-xs-12 under-line ">
                        <h6>&nbsp<label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio7" value="option1"> أوافق على منح الانتداب للموظف أعلاه خلال المدة المحددة.ا
                            </label></h6>
                        <h6>&nbsp<label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio7" value="option1"> لا أوافق بسبب
                            </label></h6>
                    </div>


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






            <div class="piece-box" >
                <div class="piece-heading">
                    <h6 class="text-center"> وثيقة أداء المهمة</h6>
                </div>
                <div class="piece-body" >
                    <div class="col-xs-12 under-line ">
                        <h6>&nbsp بناءً على موافقة صاحب الصلاحية أعلاه على انتداب المذكور فقد تم إنهاء المهمة اعتباراً    من تاريخ الى تاريخ    لمدة (    ) يوم</h6>
                    </div>
                    <div class="col-xs-12 under-line">
                        <div class="col-xs-6">
                            <h6 class="text-center">الموظف المنتدب</h6>
                        </div>
                        <div class="col-xs-6">
                            <h6 class="text-center">المدير المباشر</h6>
                        </div>

                    </div>

                    <div class="col-xs-12 under-line ">
                        <div class="col-xs-6">
                            <h6>الإسم <span class="valu"></span></h6>
                        </div>
                        <div class="col-xs-6">
                            <h6>الإسم : <span class="valu"></span></h6>
                        </div>
                    </div>

                    <div class="col-xs-12 under-line">
                        <div class="col-xs-6">
                            <h6>التوقيع : <span class="valu"></span></h6>
                        </div>
                        <div class="col-xs-6">
                            <h6>التوقيع : <span class="valu"></span></h6>
                        </div>

                    </div>

                    <div class="col-xs-12 under-line ">
                        <div class="col-xs-6">
                            <h6>التاريخ : <span class="valu"></span></h6>
                        </div>
                        <div class="col-xs-6">
                            <h6>التاريخ : <span class="valu"></span></h6>
                        </div>
                    </div>


                </div>
                <div class="piece-footer">

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





