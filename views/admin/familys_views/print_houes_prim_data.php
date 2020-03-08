



    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/stylecrm.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">


    <style type="text/css">
        @import url(<?php echo base_url() ?> asisst/admin_asset/fonts/ht/HacenTunisia.css);
        @import url(<?php echo base_url() ?> asisst/admin_asset/fonts/hl/HacenLinerScreen.css);
        @import url(<?php echo base_url() ?> asisst/admin_asset/fonts/ge/ge.css);

        body {
            font-family: 'hl';

        }

        .main-body {
            background-image: url(<?php echo base_url() ?>asisst/admin_asset/img/pills/sanad.png);
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
            margin-bottom: 2px;
            font-size: 17px;
        }

        .piece-box table th,
        .piece-box table td {

            /*padding: 2px 8px !important;*/
        }

        .piece-box .table > thead > tr > th, .piece-box .table > tbody > tr > th,
        .piece-box .table > tfoot > tr > th, .piece-box .table > thead > tr > td,
        .piece-box .table > tbody > tr > td, .piece-box .table > tfoot > tr > td {
            text-align: center;
        }

        h6 {
            font-size: 16px;
            margin-bottom: 3px;
            margin-top: 3px;
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
            .table-bordered.double > thead > tr > th, .table-bordered.double > tbody > tr > th,
            .table-bordered.double > tfoot > tr > th, .table-bordered.double > thead > tr > td,
            .table-bordered.double > tbody > tr > td, .table-bordered.double > tfoot > tr > td {
                border: 2px solid #000 !important;
            }


            .table-bordered.white-border th, .table-bordered.white-border td {
                border: 1px solid #fff !important

            }
        }


        @page {
            size: 210mm 297mm  ;
            margin: 0;

        }

        .open_green {
            background-color: #e6eed5;
        }

        .closed_green {
            background-color: #cdddac;
        }

        .table-bordered.double {
            border: 5px double #000;
        }

        .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border: 2px solid #000;
        }

        .under-line {
            border-top: 1px solid #abc572;
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
            border-left: 1px solid #abc572;
        }

        .bond-header {
            height: 100px;
            margin-bottom: 30px;
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
            border: 6px double #000;
            padding: 8px 25px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px 2px #000;
        }

        .table-bordered > tbody > tr.rosasy-bg td {
            background-color: #eee !important;
            border: 1px solid #eee !important;
        }

        .hl {
            font-family: 'hl';
        }

        .footer-info {
            position: absolute;
            width: 100%;
            bottom: 70px;
        }

        .table-bordered > tbody > tr > td.white-bg {
            background-color: #fff !important;
            border: 1px solid #eee !important
        }

        .kroky {
            border: 2px solid #555;
            height: 420px
        }
        .number-square {
            
            float: right;
            /* width: 30px; */
            height: 30px;
            padding: 0px 4px;
            line-height: 28px;
            border-radius: 3px;
            background: #fff;
            border: 2px solid #666;
            color: #666;
            text-align: center;
            font-size: 18px;
        }
    </style>


</head>
<body onload="printDiv('printDiv')" id="printDiv">

<section class="main-body">


    <div class="print_forma  col-xs-12 ">
        <div class="col-xs-12 no-padding">
            <div class="col-xs-4 text-center">

            </div>
            <div class="col-xs-4 text-center">
                <h4 class="green-border"><span>نموذج كروكي لمنزل</span></h4>
            </div>
            <div class="col-xs-4 text-center">

            </div>
        </div>

        <div class="piece-box" style="margin-top: 20px">
            <div class="piece-body">
                <div class="col-xs-12" style="margin-bottom: 15px;">
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr class="rosasy-bg">
                            <td style="width: 120px">رقم الطلب</td>
                            <td class="white-bg"> <?php if (isset($result) && (!empty($result))) {
                                    echo $result['id'];
                                } ?></td>

                            <td style="width: 120px">تاريخ الطلب</td>
                            <td class="white-bg" style="width: 180px">
                              <?php if (isset($result) && (!empty($result))) {
                                    echo date('Y-m-d',$result['date']) ;
                                } ?>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr class="rosasy-bg">
                            <td style="width: 120px">إسم الأسرة</td>
                            <td class="white-bg">
                                <?php if (isset($result) && (!empty($result))) {
                                    echo $result['father_name'];
                                } ?>
                            </td>
                            <td style="width: 120px">رقم الهوية</td>
                            <td class="white-bg" style="width: 235px">
                                <span class="number-square">1</span>
                                <span class="number-square">2</span>
                                <span class="number-square">0</span>
                                <span class="number-square">3</span>
                                <span class="number-square">4</span>
                                <span class="number-square">5</span>
                                <span class="number-square">6</span>
                                <span class="number-square">7</span>
                                <span class="number-square">8</span>
                                <span class="number-square">9</span>
                                <?php if (isset($result) && (!empty($result))) {
                                    echo $result['mother_national_num'];
                                } ?>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-xs-12">
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr class="rosasy-bg">
                            <td style="width: 120px">المنطقة</td>
                            <td class="white-bg">
                                <?php if (isset($area) && (!empty($area))) {
                                    echo $area->title;
                                } ?>
                            </td>
                            <td style="width: 120px">المدينة</td>
                            <td class="white-bg">
                                <?php if (isset($city) && (!empty($city))) {
                                    echo $city->title;
                                } ?>
                            </td>
                            <td style="width: 120px">الحي</td>
                            <td class="white-bg">

                                <?php if (isset($village) && (!empty($village))) {
                                    echo $village->title;
                                } ?>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-xs-12">
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr class="rosasy-bg">
                            <td style="width: 120px">إسم الشارع</td>
                            <td class="white-bg">
                                <?php if (isset($house_data) && (!empty($house_data))) {
                                    echo $house_data['h_street'];
                                } ?>
                            </td>
                            <td style="width: 100px">رقم المبنى</td>
                            <td class="white-bg" style="width: 100px">
                                <?php if (isset($house_data) && (!empty($house_data))) {
                                    echo $house_data['national_address'];
                                } ?>
                            </td>
                            <td style="width: 100px">الرمز البريدي</td>
                            <td class="white-bg" style="width: 100px"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-xs-12" style="margin-bottom: 15px;">
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr class="rosasy-bg">
                            <td style="width: 150px">رقم الهاتف</td>
                            <td class="white-bg">
                                <?php if (isset($result) && (!empty($result))) {
                                    echo $result['contact_mob'];
                                } ?>
                            </td>
                            <td style="width: 120px">رقم الجوال</td>
                            <td class="white-bg"></td>

                        </tr>
                        </tbody>
                    </table>
                </div>


            </div>

        </div>

        <div class="col-xs-12">
            <div class="kroky">

            </div>
        </div>

        <div class="piece-box" style="margin-top: 10px">
            <div class="piece-body">
                <div class="col-xs-12">
                    <table class="table table-bordered hl white-border">
                        <thead>
                        <tr class="rosasy-bg">
                            <th colspan="4" style="text-align: right;">الوصف التفصيلي للمنزل</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="rosasy-bg">
                            <td style="width: 120px">أقرب مدرسة</td>
                            <td class="white-bg">
                                <?php if (isset($house_data) && (!empty($house_data))) {
                                    echo $house_data['h_nearest_school'];
                                } ?>
                            </td>

                            <td style="width: 120px">أقرب معلم</td>
                            <td class="white-bg">
                                <?php if (isset($house_data) && (!empty($house_data))) {
                                    echo $house_data['h_nearest_teacher'];
                                } ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-bordered hl white-border">
                        <tbody>
                        <tr class="rosasy-bg">
                            <td style="width: 120px">أقرب مسجد</td>
                            <td class="white-bg">
                                <?php if (isset($house_data) && (!empty($house_data))) {
                                    echo $house_data['h_mosque'];
                                } ?>
                            </td>

                            <td style="width: 120px">اتجاه المنزل</td>
                            <td class="white-bg">
                                <?php if (isset($house_direction) && (!empty($house_direction))) {
                                    echo $house_direction->title_setting;
                                } ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    </div>


    <div class="footer-info">

        <div class="col-xs-12 no-padding print-details-footer">
            <div class="col-xs-6">
                <p class=" text-center" style="margin-bottom: 0;">
                    <small> (اسم الموظف القائم بالإدخال أو الطباعة) / <?= $_SESSION['user_name'] ?> </small>
                </p>

            </div>
            <div class="col-xs-2">
                <!--   <p class=" text-center" style="margin-bottom: 0;">رقم الصفحة</p> -->
            </div>
            <div class="col-xs-4">

                <p class=" text-center" style="margin-bottom: 0;">
                    <small> تاريخ الطباعة : <?= date('Y-m-d H:i:s') ?></small>
                </p>
            </div>


        </div>

    </div>
</section>

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
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();
        window.close();


    }
</script>

</body>
</html>
