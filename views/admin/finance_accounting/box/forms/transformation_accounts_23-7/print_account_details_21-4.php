



    <title>طباعة التحويلات</title>
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">





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
            height: 100px;
            width: auto;
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
.helvetica{
    font-size: 22px;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
}


    </style>



    <div id = "printdiv" >

        <body>


        <div class="header col-xs-12 no-padding">
    <div class="col-xs-5 text-center">
        <div class="col-xs-8 no-padding">
            <h5>الجمعية الخيرية لرعاية الأيتام ببريدة (أبـناء)</h5>
            <p>مسجلة بوزارة العمل والتنمية الإجتماعية تصريح رقم 463</p>
        </div>
        <div  class="col-xs-4 no-padding">
            <img src="<?php echo base_url()?>asisst/admin_asset/img/logo.png" >
        </div>
    </div>
    <div class="col-xs-2 text-center">

    </div>
    <div class="col-xs-5 ">
        <h6>الرقم :.............</h6>
        <h6>التاريخ : ...............</h6>
        <h6>المرفقات : ...............</h6>
        <h6>الموضوع : ............</h6>
    </div>
</div>
<div class="clearfix"></div>	<br>
<section class="main-body">

    <div class="container">
        <?php
        if (isset($result) && !empty($result)){
        ?>


        <div class="print_forma  col-xs-12 no-padding">
            <div class="piece-box no-border" style="margin-top: 20px;">
                <div class="piece-body">
                    <div class="col-xs-12 no-padding">
                        <div class="col-xs-1"></div>
                        <div class="col-xs-7">
                    <h4 style="font-weight: bold">المكرم / <?= $result->geha_name ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                       </h4><br>
                    </div>
                        <div class="col-xs-4 text-center">
                      <h4 style="font-weight: bold">  المحترم  </h4>
                        </div>
                    </div>
                    <div class="col-xs-12 no-padding">

                        <h5 class="text-center helvetica" style="margin-bottom: 10px;">السلام عليكم ورحمه الله وبركاته وبعد :</h5>
                        <h5 class="text-center helvetica">نرجو من سعادتكم إجراء التحويلات التالية</h5><br>
                    </div>

                    <div class="col-xs-12 no-padding">
                        <?php
                        if (isset($result_details) && !empty($result_details)) {
                        $x=1;


                        ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr class="closed_green">
                                <th>م</th>
                                <th>المبلغ</th>
                                <th>الحساب المحول منه</th>
                                <th>الحساب المحول إليه</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            foreach ($result_details as $row) {
                                $rkm_from = substr($row->from_ayban_rkm_full, -12);
                                $rkm_to = substr($row->to_ayban_rkm_full, -12);


                            ?>
                            <tr>
                                <td><?= $x++?></td>
                                <td><?php echo $row->arabic_value['value'] .'-'. $row->arabic_value['title']?></td>
                                <td><?php echo$rkm_from.'-'.$row->from_general_hesab_name;?></td>
                                <td><?php echo$rkm_to.'-'.$row->to_general_hesab_name;?></td>
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

                    <div class="col-xs-12 no-padding">
                        <div class="col-xs-1 no-padding"></div>
                        <div class="col-xs-10 no-padding">
                        <br>
                        <h5 class="text-center helvetica">يفوض مندوب الجمعية الموظف / <?= $result->emp_name?> رقم (<?= $result->emp_card_num?>) لإجراء عملية التحويل .	</h5><br>
                        <h5 class="text-center helvetica">شاكرين تعاونكم والله يحفظكم ويرعاكم ,,,</h5>
                        </div>
                        <div class="col-xs-1 no-padding"></div>

                    </div>


                </div>

            </div>
<br><br><br><br><br><br><br><br><br><br>
            <div class="piece-box no-border">
                <div class="piece-body">
                    <div class="col-xs-6 text-center">
                        <h5 style="font-weight: bold">أمين الصندوق</h5><br>
                        <h5>عبدالله بن عبدالعزيز الصبيحي</h5>
                    </div>

                    <div class="col-xs-6 text-center">
                        <h5 style="font-weight: bold">رئيس مجلس الإدارة</h5><br>
                        <h5> عبد الرحمن بن محمد البليهي</h5>
                    </div>
                </div>
            </div>
        </div>
            <?php
        }
        ?>
    </div>
</section>

<div class="footer">
   <!-- <img src="<?php echo base_url()?>asisst/web_asset/img/footer-bg.jpg" > -->
</div>


</div>








<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>


    <script >
        var divElements = document . getElementById("printdiv") . innerHTML;
        var oldPage = document . body . innerHTML;
        document . body . innerHTML =
            "<html><head><title></title></head><body><div id='printdiv'>" +
            divElements + "</div></body>";
        window .print();
        setTimeout(function () {
            window.location.href ="<?php echo base_url('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts') ?>";
        }, 1000);
    </script >




