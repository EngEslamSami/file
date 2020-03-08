


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
            /*margin-bottom: 12px;*/
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
            .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
            .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
            .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
                border: 2px solid #000 !important;
            }

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
        .table-bordered {
            border: 5px double #000;
        }
        .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
            border: 2px solid #000;
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

        .bond-header{
            height: 100px;
            margin-bottom: 30px;
        }
        .bond-header .right-img img,
        .bond-header .left-img img{
            width: 100%;
            height: 100px;
        }
        .main-bond-title{
            display: table;
            height: 100px;
            text-align: center;
            width: 100%;
        }
        .main-bond-title h3{
            display: table-cell;
            vertical-align: bottom;
            color: #d89529;
        }
        .main-bond-title h3 span{
            border-bottom: 2px solid #006a3a;
        }
        .green-border span{
            border: 3px solid #6abb46;
            padding: 10px;
            border-radius: 10px;
        }
    </style>




<div class="bond-header">
    <div class="col-xs-4 pad-2">
        <div class="right-img">
            <img src="<?php echo base_url()?>asisst/admin_asset/img/sympol1.png">
        </div>
    </div>
    <div class="col-xs-4 pad-2">
        <div class="main-bond-title">
            <h3 class="text-center"><span class="">إذن صرف</span></h3>
        </div>
    </div>
    <div class="col-xs-4 pad-2">
        <div class="left-img">
            <img src="<?php echo base_url()?>asisst/admin_asset/img/sympol2.png">
        </div>
    </div>
</div>


<div class="clearfix"></div><br>


    <div class="col-xs-12">
        <div class="col-xs-4 text-center">
            <h4 class="green-border"><span>إدارة الشئون المالية</span></h4>
        </div>
        <div class="col-xs-4">

        </div>
        <div class="col-xs-4 text-center">
            <h4 class="green-border"><span>رقم الإذن : <?php echo $result->ezn_rqm;?></span></h4>
        </div>
    </div>
    <div class="print_forma  col-xs-12 ">

        <div class="piece-box" >
            <div class="piece-body">
                <div class="col-xs-12 no-padding">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10 no-padding">
                        <h3>سعادة مدير عام الجمعية        <span style="float: left;">سلمه الله</span></h3>
                    </div>
                    <div class="col-xs-1"></div>
                </div>
                <div class="col-xs-12">
                    <h5 class="text-center">السلام عليكم ورحمة الله وبركاته ،،،</h5>
                </div>

                <div class="col-xs-10 " style="margin-right: 2%">
                    <h5>أرجو من سعادتكم التكرم بالتوجيه إلى من يلزم بصرف التالي:-</h5>
                </div>
            </div>

        </div>

        <div class="piece-box no-border">
            <div class="piece-body">
                <div class="col-xs-12">
                    <table class="table table-bordered" style="table-layout: fixed">
                        <tbody>
                        <tr>
                            <td style="width: 25%;">مبلغ وقدره (<?php echo $result->value;?>) </td>
                            <td><?php echo $number_title;?> .</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;">اسم الجهه / المستفيد</td>
                            <td><?php echo $result->person_name;?></td>
                        </tr>
                        <tr>
                            <td style="width: 25%;">عبارة عن </td>
                            <td><?php echo $result->about;?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-4 text-center">
                        <h5> <span style="border-bottom:1px solid #000 ">الموظف المسئول</span></h5>
                        <h5>   </h5>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h5><span style="border-bottom:1px solid #000 ">مدير الإدارة</span></h5>
                        <h5>  </h5>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h5><span style="border-bottom:1px solid #000 ">التاريخ </span></h5>
                        <h5></h5>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                </div>
            </div>
        </div>


        <div class="piece-box no-border">
            <div class="piece-body">
                <div class="col-xs-12">
                    <h4 class="text-center"><span style="border-bottom:1px solid #000 ">إفادة الشئؤون المالية</span></h4>
                    <table class="table table-bordered" style="table-layout: fixed">
                        <tbody>
                        <tr>
                            <td style="width: 25%;">اسم البند(الحساب) </td>
                            <td colspan="3"> <span style="background-color:#222;color: #fff">  </span><?php echo $result->band_code;?> &nbsp <?php echo $result->band_name;?></td>
                        </tr>
                        <tr>
                            <td style="width: 25%;">ملاحظات</td>
                            <td colspan="3"><?php echo $result->notes;?></td>
                        </tr>
                        <tr>
                            <td colspan="2">المحاسب/مسعد السيد عبدالعزيز       </td>
                            <td>توقيع: </td>
                            <td>التاريخ:  </td>
                        </tr>
                        <tr>
                            <td style="width: 25%;">طريقة الصرف </td>
                            <td colspan="3">
                                <h5 class="text-center" style="margin: 4px">
                                    <span> <i class="fa fa-circle-o "></i> نقداً </span>&nbsp&nbsp&nbsp
                                    <span> <i class="fa fa-circle "></i> إصدار شيك  </span>&nbsp&nbsp&nbsp
                                    <span> <i class="fa fa-circle-o "></i>  تحويل </span>
                                </h5>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">مدير الشئون المالية/مسعد السيد عبدالعزيز       </td>
                            <td>توقيع: </td>
                            <td>التاريخ:  </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-12">
                    <h4 class="text-center"><span style="border-bottom:1px solid #000 ">توجيه المدير العام</span></h4>
                    <div class="col-xs-4 ">
                        <?php if($result->twgeh_moder_3am==1){?>
                        <h5><i class="fa fa-circle "></i>  لا مانع من الصرف </h5>
                        <?php } ?>
                        <?php if($result->twgeh_moder_3am==2){?>
                            <h5><i class="fa fa-circle "></i>  غير موافق </h5>
                            <h3> <?php echo $result->twgeh_moder_3am_text;?></h3>
                        <?php } ?>
                    </div>
                    <div class="col-xs-8 "></div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-8 "></div>
                    <div class="col-xs-4 text-center">
                        <h5>مدير عام الجمعية</h5>
                        <h5>سلطان بن محمد الجاسر</h5>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <h4 class="text-center"><span style="border-bottom:1px solid #000 ">إعتماد أمين الصندوق-عضو مجلس الإدارة</span></h4>
                    <div class="col-xs-8 "></div>
                    <div class="col-xs-4 text-center">
                        <h5>أمـــــــــــــــين <br> الصنـــــــــــــــــــدوق</h5>
                        <h5>عبدالله بن عبدالعزيز الصبيحي</h5>
                    </div>


                </div>
            </div>
        </div>








    </div>
     <!--


    <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
->














