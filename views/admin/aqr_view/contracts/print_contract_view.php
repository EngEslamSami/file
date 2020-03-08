

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

    </style>


    <body onload="printDiv('printDiv')" id="printDiv">

<?php $days = array('', 'الأثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت', 'الأحد');
$time = array('am' => 'ص', 'pm' => 'م');


?>

<div class="bond-header">
    <div class="col-xs-4 pad-2">
        <div class="right-img">
            <img src="<?php echo base_url() ?>asisst/admin_asset/img/logo-rectangle1.png">
        </div>
    </div>
    <div class="col-xs-4 pad-2">
        <div class="main-bond-title">
            <h3 class="text-center"><span class="">  عقد ايجار</span></h3>
        </div>
    </div>
    <div class="col-xs-4 pad-2">
        <div class="left-img">
            <br>
            <p>توثيق عقد بتاريخ</p>
            <p><?= date("Y-m-d").date(" g:i ") . $time[date('a')]; ?></p>
        </div>
    </div>
</div>
<section class="main-body">

    <div class="print_forma  col-xs-12 ">

        <div class="piece-box no-border">
            <div class="col-xs-12 no-padding under-line">
                <div class="col-xs-6">
                    <h6>الطرف الأول: <span class="valu"><?= $main_data->name ?></span></h6>
                </div>
                <div class="col-xs-6">
                    <h6>عنوان الشركة: <span class="valu"><?= $main_data->address ?></span></h6>
                </div>
                <div class="col-xs-6">
                    <h6>رقم الهاتف : <span class="valu"><?= $main_data->tele_info[0] ?></span></h6>
                </div>

            </div>
            <div class="col-xs-12 no-padding under-line ">
                <div class="col-xs-6">
                    <h6>الطرف الثانى: <span
                                class="valu"><?php if (isset($get_all->mostager->aname)&& !empty($get_all->mostager->aname)){echo $get_all->mostager->aname;}else{echo 'غير محدد';}  ?></span></h6>
                </div>
                <div class="col-xs-6">
                    <h6>رقم هوية المستأجر: <span
                                class="valu"><?php if (isset($get_all->mostager->national_card)&& !empty($get_all->mostager->national_card)){echo $get_all->mostager->national_card;}else{echo 'غير محدد';}  ?></span>
                    </h6>
                </div>
                <div class="col-xs-6">
                    <h6>جوال  المستأجر: <span
                                class="valu"><?php if (isset($get_all->mostager->jwal)&& !empty($get_all->mostager->jwal)){echo $get_all->mostager->jwal;}else{echo 'غير محدد';}  ?></span>
                    </h6>
                </div>

            </div>
            <div class="col-xs-12 no-padding under-line ">
                <br> <br>
                <p class="text-center" style="font-size: 16px;">
                    وافق الطرفان على
                    العقد
                    وذالك يوم
                    <?php   echo $days[date('N', strtotime($get_all->date_ar))] ?>
                    الموافق <?=  $get_all->date_ar .' ' ."م"   ?>
                    بمبلغ اجمالي قدره <?= $get_all->egar_value  ?>
                     ريال فقط لا غير </p>

            </div>
        </div>


        <div class="piece-box no-border">
            <div class="piece-body">
                <div class="col-xs-12">
                    <?php
                    if (isset($get_all) && !empty($get_all)){
                        ?>


                  <table class="table table-bordered" style="table-layout: fixed">
                        <tbody>
                        <tr>
                            <td class="open_green" style="width: 25%;"> رقم العقد </td>
                            <td><?php if (isset($get_all->contract_rkm)&& !empty($get_all->contract_rkm)){echo  $get_all->contract_rkm;}else{echo 'غير محدد';}  ?></td>
                            <td class="open_green" style="width: 25%;">إسم العقار</td>
                            <td><?php if (isset($get_all->aqr_n)&& !empty($get_all->aqr_n)){echo  $get_all->aqr_n;}else{echo 'غير محدد';}  ?></td>

                        </tr>
                        <tr>
                            <td class="open_green" style="width: 25%;"> نوع الوحدة </td>
                            <td><?php if (isset($get_all->whda_type_n)&& !empty($get_all->whda_type_n)){echo  $get_all->whda_type_n;}else{echo 'غير محدد';}  ?></td>
                            <td class="open_green" style="width: 25%;"> قيمة الايجار</td>
                            <td><?php if (isset($get_all->egar_value)&& !empty($get_all->egar_value)){echo  $get_all->egar_value . ' ' .'ريال';}else{echo 'غير محدد';}  ?></td>

                        </tr>
                        <tr>
                            <td class="open_green" style="width: 25%;">   بداية الايجار </td>
                            <td>
                                <?php
                                if (!empty($get_all->egar_start_date_m ) && !empty($get_all->egar_start_date_h)){
                                    $egar_start_date_m = explode('/', $get_all->egar_start_date_m)[2] . '/' . explode('/', $get_all->egar_start_date_m)[0] . '/' . explode('/', $get_all->egar_start_date_m)[1];
                                    $egar_start_date_h= explode('/', $get_all->egar_start_date_h)[2] . '/' . explode('/', $get_all->egar_start_date_h)[1] . '/' . explode('/', $get_all->egar_start_date_h)[0];
                                    echo $egar_start_date_m .' '.'م'.' '.'↔'.' '.$egar_start_date_h .' '.'هـ' ;
                                }
                                else{ echo 'غير محدد';}
                                ?>
                            </td>
                            <td class="open_green" style="width: 25%;">  نهاية الايجار</td>
                            <td>
                                <?php
                                if (!empty($get_all->egar_end_date_m ) && !empty($get_all->egar_end_date_h)){
                                    $egar_end_date_m = explode('/', $get_all->egar_end_date_m)[2] . '/' . explode('/', $get_all->egar_end_date_m)[0] . '/' . explode('/', $get_all->egar_end_date_m)[1];
                                    $egar_end_date_h= explode('/', $get_all->egar_end_date_h)[2] . '/' . explode('/', $get_all->egar_end_date_h)[1] . '/' . explode('/', $get_all->egar_end_date_h)[0];
                                    echo $egar_end_date_m .' '.'م'.' '.'↔'.' '.$egar_end_date_h .' '.'هـ' ;
                                }
                                else{ echo 'غير محدد';}
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="open_green" style="width: 25%;"> المدة </td>
                            <td><?php if (isset($get_all->period)&& !empty($get_all->period)){echo  $get_all->period . ' ' .'شهر';;}else{echo 'غير محدد';}  ?></td>
                            <td class="open_green" style="width: 25%;">  عدد الأقساط</td>
                            <td><?php if (isset($get_all->aqsat_num)&& !empty($get_all->aqsat_num)){echo  $get_all->aqsat_num;}else{echo 'غير محدد';}  ?></td>

                        </tr>
                        <tr>
                            <td class="open_green" style="width: 25%;"> قيمة القسط </td>
                            <td><?php if (isset($get_all->qst_value)&& !empty($get_all->qst_value)){echo  $get_all->qst_value . ' ' .'ريال';}else{echo 'غير محدد';}  ?></td>

                            <td class="open_green" style="width: 25%;">   التأمين  </td>
                            <td><?php if (isset($get_all->tamen)&& !empty($get_all->tamen)){echo  $get_all->tamen . ' ' .'ريال';}else{echo 'غير محدد';}  ?></td>

                        </tr>
                        <tr>
                            <td class="open_green" style="width: 25%;">  التذكير قبل  </td>
                            <td><?php if (isset($get_all->tzker)&& !empty($get_all->tzker)){echo  $get_all->tzker . ' ' .'شهر';}else{echo 'غير محدد';}  ?></td>

                           <td></td>
                           <td></td>
                        </tr>


                        </tbody>
                    </table>
                        <?php
                    }
                    ?>
                </div>

                <div class="page-break"></div>
                <?php if ((isset($get_all->qst_details)) && (!empty($get_all->qst_details))) { $x=1;?>
                    <div class="col-xs-12 ">
                        <br>
                        <h5 class="text-center"> الأقســــاط</h5>
                        <table class="table table-bordered">
                            <thead>
                            <tr class="closed_green">
                                <th>م</th>
                                <th> رقم القسط</th>
                                <th> قيمة القسط  </th>
                                <th>  تسديد  </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($get_all->qst_details as $qst) {

                                ?>
                                <tr>
                                    <td><?= $x++?></td>
                                    <td><?= $qst->qst_rkm?></td>
                                    <td><?= $qst->qst_value . ' ' .'ريال'?></td>
                                    <td>
                                        <?php
                                        if ($qst->paid==1){
                                            echo 'تم التسديد';
                                            } elseif ($qst->paid==0){
                                            echo " لم يتم التسديد";
                                        }
                                        ?>

                                    </td>

                                </tr>
                                <?php ;
                            } ?>
                            </tbody>

                        </table>

                    </div>


                <?php } ?>


                <div class="col-xs-12 ">
                    <br>
                    <h5 class="text-center">الأحكــــــام والشــــروط</h5>
                    <?php if ((isset($contract)) && !empty($contract)) {
                        echo $contract->content;
                    } ?>

                </div>
            </div>
        </div>

        <div class="piece-box no-border">
            <div class="piece-body">
                <div class="col-xs-12">

                    <hr>

                    <div class="col-xs-4 text-center">
                        <h5>توقيــــع الطرف الأول</h5>
                        <h5><?= $main_data->name ?></h5>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h5>توقيــــع الطرف الثانى</h5>
                        <h5><?php if (isset($get_all->mostager->aname)&& !empty($get_all->mostager->aname)){echo $get_all->mostager->aname;}else{echo 'غير محدد';}  ?></h5>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h5>الختــــــــــم</h5>
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

