<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>framework</title>
    <link rel="stylesheet" href="css/admin/stylecrm.css">

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/admin/stylecrm.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">




    <style type="text/css">
        @import url(<?php echo base_url()?>asisst/admin_asset/fonts/ht/HacenTunisia.css);
        @import url(<?php echo base_url()?>asisst/admin_asset/fonts/hl/HacenLinerScreen.css);
        @import url(<?php echo base_url()?>asisst/admin_asset/fonts/ge/ge.css);

        body {
            font-family: 'hl';

        }

        .main-body {

            background-image: url(<?php echo base_url()?>asisst/admin_asset/img/paper-bg.png);
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
            background-color: #c3c3c3;
            display: inline-block;
            float: right;
            width: 100%;
        }

        .piece-heading h5 {
            color: #000;
            padding: 2px 0;
            font-family: 'hl';
            font-size: 20px;
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
            margin-bottom: 6px;
            font-size: 17px;
        }

        .piece-box table th,
        .piece-box table td {

            /*padding: 2px 8px !important;*/
        }

        .piece-box .table>thead>tr>th,
        .piece-box .table>tbody>tr>th,
        .piece-box .table>tfoot>tr>th,
        .piece-box .table>thead>tr>td,
        .piece-box .table>tbody>tr>td,
        .piece-box .table>tfoot>tr>td {
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

            .table-bordered.double>thead>tr>th,
            .table-bordered.double>tbody>tr>th,
            .table-bordered.double>tfoot>tr>th,
            .table-bordered.double>thead>tr>td,
            .table-bordered.double>tbody>tr>td,
            .table-bordered.double>tfoot>tr>td {
                border: 2px solid #000 !important;
            }



            .table-bordered.white-border th,
            .table-bordered.white-border td {
                border: 1px solid #fff !important
            }
        }



        @page {
            size: 210mm 297mm;
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

        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td,
        .table-bordered>tfoot>tr>td {
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

        .table-bordered>tbody>tr.rosasy-bg td {
            background-color: #eee !important;
            border: 1px solid #eee !important;
            padding: 4px 2px;
        }

        .hl {
            font-family: 'hl';
        }

        .footer-info {
            position: absolute;
            width: 100%;
            bottom: 70px;
        }

        .table-bordered>tbody>tr>td.white-bg {
            background-color: #fff !important;
            border: 1px solid #eee !important
        }

        .signatures h5 {
            margin: 2px 0;
        }
    </style>


</head>

<body id="printdiv">

    <!--<div class="bond-header">
		<div class="col-xs-4 pad-2">
			<div class="right-img">
				<img src="img/sympol1.png">
			</div>
		</div>
		<div class="col-xs-4 pad-2">
			<div class="main-bond-title">
				<h3 class="text-center"><span class="">إذن إضافة </span></h3>
			</div>
		</div>
		<div class="col-xs-4 pad-2">
			<div class="left-img">
				<img src="img/sympol2.png">
			</div>
		</div>
	</div>
	<div class="clearfix"></div><br>
-->



    <section class="main-body">
        <?php $row=$rows[0];  ?>

        <div class="print_forma  col-xs-12 ">
            <div class="col-xs-12 no-padding">
                <div class="col-xs-4 text-center">

                </div>
                <div class="col-xs-4 text-center">
                    <h4 class="green-border"><span>نموذج طلب سلفة</span></h4>
                </div>
                <div class="col-xs-4 text-center">

                </div>
            </div>

            <div class="piece-box" style="margin-top: 20px">
                <div class="piece-body">
                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 120px">رقم الطلب</td>
                                    <td class="white-bg"><?php echo $row->t_rkm; ?></td>

                                    <td style="width: 120px">تاريخ الطلب</td>
                                    <td class="white-bg"><?php echo $row->t_rkm_date_m; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 70px">الإسم </td>
                                    <td class="white-bg"><?php echo $row->emp_name; ?></td>
                                    <td style="width: 120px">الرقم الوظيفي</td>
                                    <td style="width: 100px" class="white-bg"><?php echo $row->emp_code_fk; ?></td>
                                    <td style="width: 90px">الوظيفة</td>
                                    <td class="white-bg"><?php echo $row->job_title; ?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 110px">مبلغ السلفة</td>
                                    <td class="white-bg"><?php echo $row->qemt_solaf; ?></td>
                                    <td style="width: 110px">طريقة السداد</td>
                                    <td class="white-bg"><?php if($row->sadad_solfa==1){echo 'دفع نقدا';}elseif($row->sadad_solfa==2){echo ' تخصم مره واحده علي الراتب';}
                                        elseif($row->sadad_solfa==3){echo 'تخصم شهريا علي الراتب';}
                                        ?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 100px">عدد الأقساط</td>
                                    <td style="width: 70px" class="white-bg"><?php echo $row->qst_num; ?></td>
                                    <td style="width: 90px">قيمة القسط</td>
                                    <td style="width: 70px" class="white-bg">
                                        <?php echo $row->qemt_qst ; ?></td>
                                    <td style="width: 120px">تاريخ أول قسط</td>
                                    <td class="white-bg"><?php echo $row->khsm_form_date_m; ?></td>
                                    <td style="width: 120px">تاريخ أخر قسط</td>
                                    <td class="white-bg"><?php echo $row->khsm_to_date_m; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 130px">الغرض من السلفة</td>
                                    <td class="white-bg"><?php echo $row->solaf_reason; ?></td>
                                    <td style="width: 120px">التوقيع</td>
                                    <td class="white-bg"><?php echo $row->emp_name; ?> </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>



                </div>

            </div>
            <?php  if ($row->level > 2 || $row->level > 3  || $row->suspend != 0 ) {   ?>
            <div class="piece-box" style="margin-top: 0px">
                <div class="col-xs-12 text-center">
                    <div class="piece-heading">

                        <h5>إفادة الموارد البشرية</h5>
                    </div>

                </div>
                <div class="piece-body">
                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 120px">الراتب الأساسي</td>
                                    <td class="white-bg"><?php if (isset($emp_data->finance_Data)&&!empty($emp_data->finance_Data)) {
                                    echo $emp_data->finance_Data['rateb_asasy']->value ;
                                    } ?></td>
                                    <td style="width: 120px">+ البدلات الثابتة</td>
                                    <td class="white-bg"><?php if (isset($emp_data->finance_Data)&&!empty($emp_data->finance_Data)) {
                                    echo $emp_data->finance_Data['get_having_value'] - $emp_data->finance_Data['rateb_asasy']->value ;
                                    } ?></td>
                                    <td style="width: 100px">= إجمالي</td>
                                    <td class="white-bg"><?php if (isset($emp_data->finance_Data)&&!empty($emp_data->finance_Data)) {
                                    echo $emp_data->finance_Data['get_having_value']  ;
                                    } ?></td>
                                    <td style="width: 100px">صافي المرتب</td>
                                    <td class="white-bg"> <?php if (isset($emp_data->finance_Data)&&!empty($emp_data->finance_Data)) {
                                    echo $emp_data->finance_Data['get_having_value'] - $emp_data->finance_Data['get_discut_value'] ;
                                    } ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 110px">حد السلفة </td>
                                    <td class="white-bg"><?php echo $row->hd_solfa; ?></td>
                                    <td style="width: 110px">تاريخ التعيين</td>
                                    <td class="white-bg"><?php if (isset($emp_data->start_work_date_m)&&!empty($emp_data->start_work_date_m)) {
                                    echo $emp_data->start_work_date_m  ;
                                    } ?></td>
                                    <td style="width: 160px">مستحقات نهاية الخدمة</td>
                                    <td class="white-bg"><?php if (isset($emp_data->reward_end_work)&&!empty($emp_data->reward_end_work)) {
                                        if ($emp_data->reward_end_work == 1) {
                                             echo  "نعم" ;
                                        }elseif ($row->reward_end_work ==2) {
                                             echo  "لا" ;

                                        }
                                    } ?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td>هل توجد على الموظف سلفة قائمة ؟</td>
                                    <td style="width: 110px" class="white-bg"><?php
                                    if ($row->solaf_qaema ==1) {
                                            echo  "نعم" ;
                                        }
                                    elseif ($row->solaf_qaema ==2) {
                                            echo  "لا" ;
                                        }
                                     ?>

                                    </td>
                                    <td>هل توجد على الموظف أية مطالبات ؟</td>
                                    <td style="width: 110px" class="white-bg"><?php
                                    if ($row->emp_motalbat ==1) {
                                            echo  "نعم" ;
                                        }
                                    elseif ($row->emp_motalbat ==2) {
                                            echo  "لا" ;
                                        }
                                     ?>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td>عدد مرات السلف السابقة</td>
                                    <td class="white-bg"><?php echo $row->num_previous_requests; ?></td>
                                    <td style="width: 150px">تاريخ أخر سلفة </td>
                                    <td class="white-bg"><?php if ($row->num_previous_requests == 0) {
                                      echo " ";
                                    }else {
                                      echo $row->previous_request_date_m;
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
                                    <td style="width: 130px">ملاحظات</td>
                                    <td class="white-bg"></td>


                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12 signatures">
                        <div class="col-xs-4 padding-4">
                            <h5>مدير الموارد البشرية</h5>

                        </div>
                        <div class="col-xs-4 padding-4">
                            <h5>التوقيع : <?php //echo $row->direct_manager_n; ?> </h5>

                        </div>
                        <div class="col-xs-4 padding-4">
                            <h5>التاريخ : </h5>

                        </div>

                    </div>



                </div>

            </div>
            <?php }?>
            <?php  if ($row->level > 4 || $row->level > 5 ||$row->suspend != 0 ) {   ?>

            <div class="piece-box" style="margin-top: 0px">
                <div class="col-xs-12 text-center">
                    <div class="piece-heading">

                        <h5>الشئون المالية والإدارية</h5>
                    </div>

                </div>
                <div class="piece-body">
                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 120px">حالة الرصيد</td>
                                    <td class="white-bg"><?php
                                    if ($row->rased_yasmah ==1) {
                                            echo  "نعم" ;
                                        }
                                    elseif ($row->rased_yasmah ==2) {
                                            echo  "لا" ;
                                        }
                                     ?></td>
                                    <td style="width: 150px">تاريخ توفر الرصيد:</td>
                                    <td class="white-bg"><?php echo $row->rased_motah; ?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12 signatures">
                        <div class="col-xs-6 padding-4">
                            <h5>المحاسب</h5>

                        </div>
                        <div class="col-xs-3 padding-4">
                            <h5>التوقيع : </h5>

                        </div>
                        <div class="col-xs-3 padding-4">
                            <h5>التاريخ : </h5>

                        </div>

                    </div>
                    <?php  if ($row->level > 5 ||$row->suspend != 0  ) {   ?>

                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <?php if (!empty($row->moder_mali_option)) {
                                                if ($row->moder_mali_option == 1) {
                                                    $check1='check-';
                                                    $check2='';
                                                    $check3='';
                                                }elseif ($row->moder_mali_option == 2) {
                                                    $check1='';
                                                    $check2='check-';
                                                    $check3='';  }
                                                elseif ($row->moder_mali_option == 3) {
                                                    $check1='';
                                                    $check2='';
                                                    $check3='check-';
                                                    }
                                            }else {
                                                    $check1='';
                                                    $check2='';
                                                    $check3='';
                                                } ?>
                                    <td>
                                        <i class="fa fa-<?=$check1?>square-o"></i> لا مانع من صرف
                                        السلفة</td>
                                    <td>
                                        <i class="fa fa-<?=$check2?>square-o"></i> يعتذر عن صرف السلفة
                                    </td>
                                    <td>
                                        <i class="fa fa-<?=$check3?>square-o"></i> يؤجل صرف السلفة</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12 signatures">
                        <div class="col-xs-6 padding-4">
                            <h5>مدير الشئون المالية والإدارية</h5>

                        </div>
                        <div class="col-xs-3 padding-4">
                            <h5>التوقيع : </h5>

                        </div>
                        <div class="col-xs-3 padding-4">
                            <h5>التاريخ : </h5>

                        </div>

                    </div>
                    <?php }?>

                </div>
            </div>
            <?php }?>


            <?php  if ($row->level > 6  ||$row->suspend != 0 ) {   ?>

            <div class="piece-box" style="margin-top: 0px">
                <div class="col-xs-12 text-center">
                    <div class="piece-heading">

                        <h5>إعتماد المدير العام</h5>
                    </div>

                </div>
                <div class="piece-body">
                    <div class="col-xs-12">
                        <?php if (!empty($row->action_moder_final)) {
                                        if ($row->action_moder_final == 4) {
                                            $check1='check-';
                                            $check2='';


                                        }elseif ($row->action_moder_final == 5) {
                                            $check1='';
                                            $check2='check-';
                                         }
                                } ?>
                        <h5><i class="fa fa-<?=$check1?>square-o"></i>&nbsp يعتمد &nbsp
                        </h5>
                        <h5><i class="fa fa-<?=$check2?>square-o"></i>&nbsp لا يعتمد &nbsp
                            ...................</h5>
                    </div>


                    <div class="col-xs-12">
                        <div class="col-xs-7 padding-4">


                        </div>
                        <div class="col-xs-5 padding-4 text-center">
                            <h4 style="font-weight: 600; font-size: 20px">مدير عام الجمعية
                            </h4>
                            <h4 style="font-weight: 600; font-size: 20px"> سلطان محمد سليمان
                                الجاسر </h4>

                        </div>


                    </div>

                </div>
            </div>
            <?php }?>

        </div>


        <div class="footer-info">

            <div class="col-xs-12 no-padding print-details-footer">
                <div class="col-xs-6">
                    <p class=" text-center" style="margin-bottom: 0;"> <small>(اسم الموظف القائم بالإدخال أو
                            الطباعة) /
                            <?php echo $UserName ?> </small></p>

                </div>
                <div class="col-xs-2">
                    <!--   <p class=" text-center" style="margin-bottom: 0;">��قم الصفحة</p> -->
                </div>
                <div class="col-xs-4">

                    <p class=" text-center" style="margin-bottom: 0;"> <small>تاريخ الطباعة :
                            <?= date('d-m-Y h:i a ') ?></small></p>
                </div>


            </div>

        </div>
    </section>


    <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>


</body>

</html>

<!-- <section class="main-body" id="printdiv">

    <div class="container-fluid">

        <div class="print_forma  col-xs-12">
            <div class="col-xs-12 no-padding" style="margin-top: 20px">
                <div class="col-xs-3 text-center">

                </div>
                <div class="col-xs-5 text-center">
                    <h4 class="green-border"><span>طلب سلفه </span></h4>
                </div>
                <div class="col-xs-4 text-center">

                </div>
            </div>


            <div class="piece-box" style="margin-top: 10px">


                <div class="col-xs-12 padding-4">
                    <?php
    if (isset($rows) && !empty($rows)) {
        $x = 1;

        foreach ($rows as $row) { ?>






                    <table class="table " style="table-layout: fixed">
                        <tbody>
                            <tr>
                                <td style="width: 105px;">
                                    <strong>رقم الطلب: </strong>
                                </td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php echo $row->t_rkm; ?></td>
                                <td style="width: 135px;"><strong> تاريخ الطلب</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php echo $row->t_rkm_date_m; ?></td>
                                <td style="width: 150px;"><strong>اسم الموظف</strong></td>
                                <td style="width: 10px;"><strong>:</strong></td>
                                <td><?php echo $row->emp_name; ?></td>
                            </tr>
                            <tr>
                                <td><strong>الرقم الوظيفي </strong></td>
                                <td><strong>:</strong></td>
                                <td><?php echo $row->emp_code_fk; ?></td>
                                <td><strong>المسمى الوظيفي </strong></td>
                                <td><strong>:</strong></td>
                                <td><?php echo $row->job_title; ?></td>
                                <td><strong>الأدارة </strong></td>
                                <td><strong>:</strong></td>
                                <td><?= $row->edara_n;?></td>

                            </tr>
                            <tr>
                                <td><strong> القسم </strong></td>
                                <td><strong>:</strong></td>
                                <td><?php echo $row->qsm_n; ?></td>
                                <td><strong>قيمه السلفه </strong></td>
                                <td><strong>:</strong></td>
                                <td><?php echo $row->qemt_solaf; ?></td>
                                <td><strong> تاريخ بدايه الخصم</strong></td>
                                <td><strong>:</strong></td>
                                <td><?php echo $row->khsm_form_date_m; ?></td>
                            </tr>
                            <tr>
                                <td><strong> طريقه سداد السلفه </strong></td>
                                <td><strong>:</strong></td>
                                <td><?php if($row->sadad_solfa==1){echo 'دفع نقدا';}elseif($row->sadad_solfa==2){echo ' تخصم مره واحده علي الراتب';}
                    elseif($row->sadad_solfa==3){echo 'تخصم شهريا علي الراتب';}
                    ?>


                                </td>
                                <td><strong> تاريخ اخر سلفه</strong></td>
                                <td><strong>:</strong></td>
                                <td><?php echo $row->previous_request_date_m; ?></td>
                                <td><strong>سبب السلفه</strong></td>
                                <td><strong>:</strong></td>
                                <td><?php echo $row->solaf_reason; ?></td>

                            </tr>
                        </tbody>
                    </table>
                    <?php }
    } ?>

                </div>

            </div>















        </div>
    </div>


    <div class="col-xs-12 no-padding print-details-footer">
        <div class="col-xs-6">
            <p class=" text-center" style="margin-bottom: 0;">
                <small> (بواسطة: <?php echo $rows[0]->emp_name;?> )</small>
            </p>

        </div>
        <div class="col-xs-2">
        </div>
        <div class="col-xs-4">

            <p class=" text-center" style="margin-bottom: 0;">

                <small>تاريخ الطباعة : <?php
                    $str=strtotime(date("Y-m-d"));
                    echo date("Y-m-d",$str);?></small>
            </p>
        </div>


    </div>


</section> -->



<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>

<script>
    var divElements = document.getElementById("printdiv").innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window.print();
</script>
