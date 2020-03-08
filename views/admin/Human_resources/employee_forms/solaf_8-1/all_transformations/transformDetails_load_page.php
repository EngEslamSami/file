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

<div class="col-sm-12 padding-4">
    <div class="col-sm-9 padding-4">
        <div class="col-xs-12 text-center">
            <div class="piece-heading">

                <h5>بيانات الموظف</h5>
            </div>

        </div>
        <div class="piece-box" style="margin-top: 20px">
            <div class="piece-body">
                <!-- <div class="col-xs-12"> -->
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                            <tr class="rosasy-bg">
                                <td style="width: 120px">رقم الطلب</td>
                                <td class="white-bg"><?php echo $solaf_data->t_rkm; ?></td>

                                <td style="width: 120px">تاريخ الطلب</td>
                                <td class="white-bg"><?php echo $solaf_data->t_rkm_date_m; ?></td>
                            </tr>
                        </tbody>
                    </table>
                <!-- </div> -->
                <!-- <div class="col-xs-12"> -->
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                            <tr class="rosasy-bg">
                                <td style="width: 70px">الإسم </td>
                                <td class="white-bg"><?php echo $solaf_data->emp_name; ?></td>
                                <td style="width: 120px">الرقم الوظيفي</td>
                                <td style="width: 100px" class="white-bg"><?php echo $solaf_data->emp_code_fk; ?></td>
                                <td style="width: 90px">الوظيفة</td>
                                <td class="white-bg"><?php echo $solaf_data->job_title; ?></td>

                            </tr>
                        </tbody>
                    </table>
                <!-- </div> -->

                <!-- <div class="col-xs-12"> -->
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                            <tr class="rosasy-bg">
                                <td style="width: 110px">مبلغ السلفة</td>
                                <td class="white-bg"><?php echo $solaf_data->qemt_solaf; ?></td>
                                <td style="width: 110px">طريقة السداد</td>
                                <td class="white-bg"><?php if($solaf_data->sadad_solfa==1){echo 'دفع نقدا';}elseif($solaf_data->sadad_solfa==2){echo ' تخصم مره واحده علي الراتب';}
                                    elseif($solaf_data->sadad_solfa==3){echo 'تخصم شهريا علي الراتب';}
                                    ?></td>

                            </tr>
                        </tbody>
                    </table>
                <!-- </div> -->

                <!-- <div class="col-xs-12"> -->
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                            <tr class="rosasy-bg">
                                <td style="width: 100px">عدد الأقساط</td>
                                <td style="width: 70px" class="white-bg"><?php echo $solaf_data->qst_num; ?></td>
                                <td style="width: 90px">قيمة القسط</td>
                                <td style="width: 70px" class="white-bg">
                                    <?php echo $solaf_data->qemt_qst ; ?></td>
                                <td style="width: 120px">تاريخ أول قسط</td>
                                <td class="white-bg"><?php echo $solaf_data->khsm_form_date_m; ?></td>
                                <td style="width: 120px">تاريخ أخر قسط</td>
                                <td class="white-bg"><?php echo $solaf_data->khsm_to_date_m; ?></td>
                            </tr>
                        </tbody>
                    </table>
                <!-- </div> -->

                <!-- <div class="col-xs-12"> -->
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                            <tr class="rosasy-bg">
                                <td style="width: 130px">الغرض من السلفة</td>
                                <td class="white-bg"><?php echo $solaf_data->solaf_reason; ?></td>

                            </tr>
                        </tbody>
                    </table>
                <!-- </div> -->



            </div>

        </div>


    </div>
    <div class="col-sm-3">
        <table class="table table-bordered" style="">
            <thead>
                <tr>
                    <td colspan="2">
                        <img id="empImg_1" src="<?php echo base_url()?>uploads/human_resources/emp_photo/thumbs/<?php echo $solaf_data->personal_photo?>" onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';" class="center-block img-responsive" style="width: 180px; height: 150px">
                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <!-- <?php if ($solaf_level >2) {
          ?>
    <div class="col-sm-3">
        <table class="table table-bordered" style="">
            <thead>
                <tr>
                    <td colspan="2">
                        <img id="empImg_1" src="<?php echo base_url()?>uploads/human_resources/emp_photo/thumbs/<?php echo $level_data->from_user_photo?>" onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';" class="center-block img-responsive" style="width: 180px; height: 150px">
                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <?php
      } ?> -->
</div>




















 <!-- <div class="col-sm-12 padding-4">
    <?php if ($solaf_level >=2) {
          ?>
    <div class="col-sm-9 padding-4">

        <label> المدير المباشر</label>
        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
            <tbody>
                <?php if ($solaf_data->action_direct_manager ==1) {
                ?>
                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <div class="radio-content">
                            <input type="radio" id="accept-1" checked ata-validation="required" name="action2" value="1">


                            <label class="radio-label" for="accept-1"> أوافق على سلفه الموظف المذكور أعلاه
                            </label>

                        </div>
                    </td>
                </tr>


                <?php
            } elseif ($solaf_data->action_direct_manager ==2) {
                ?>
                <tr>
                    <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

                        <div class="radio-content">
                            <input type="radio" name="action2" data-validation="required" checked id="accept-2" value="2">

                            <label class="radio-label" for="accept-2"> لا أوافق بسبب </label>
                        </div>


                        <?php echo$solaf_data->reason_action; ?>



                    </td>
                </tr>
                <?php
            } ?>


                <tr>
                    <td colspan="2">الإسم/<?= $solaf_data->direct_manager_n; ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y') ?></td>
                </tr>
            </tbody>
        </table>
        <br> <br>

    </div>
    <div class="col-sm-3">
        <table class="table table-bordered" style="">
            <thead>
                <tr>
                    <td colspan="2">
                        <img id="empImg_1" src="<?php echo base_url()?>uploads/human_resources/emp_photo/thumbs/<?php echo $level_1data->from_user_photo?>" onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';" class="center-block img-responsive" style="width: 180px; height: 150px">
                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <?php
      } ?>
</div>  -->











<div class="col-sm-12 padding-4">
    <?php if ($solaf_level >=3 ||$solaf_data->suspend == 4 ) {
          ?>
    <div class="col-sm-9 padding-4">

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
                                <td class="white-bg"><?php echo $solaf_data->hd_solfa; ?></td>
                                <td style="width: 110px">تاريخ التعيين</td>
                                <td class="white-bg"><?php if (isset($emp_data->start_work_date_m)&&!empty($emp_data->start_work_date_m)) {
                                echo $emp_data->start_work_date_m  ;
                                } ?></td>
                                <td style="width: 160px">مستحقات نهاية الخدمة</td>
                                <td class="white-bg"><?php if (isset($emp_data->reward_end_work)&&!empty($emp_data->reward_end_work)) {
                                    if ($emp_data->reward_end_work == 1) {
                                         echo  "نعم" ;
                                    }elseif ($solaf_data->reward_end_work ==2) {
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
                                if ($solaf_data->solaf_qaema ==1) {
                                        echo  "نعم" ;
                                    }
                                elseif ($solaf_data->solaf_qaema ==2) {
                                        echo  "لا" ;
                                    }
                                 ?>

                                </td>
                                <td>هل توجد على الموظف أية مطالبات ؟</td>
                                <td style="width: 110px" class="white-bg"><?php
                                if ($solaf_data->emp_motalbat ==1) {
                                        echo  "نعم" ;
                                    }
                                elseif ($solaf_data->emp_motalbat ==2) {
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
                                <td class="white-bg"><?php echo $solaf_data->num_previous_requests; ?></td>
                                <td style="width: 150px">تاريخ أخر سلفة </td>
                                <td class="white-bg"><?php if ($solaf_data->num_previous_requests == 0) {
                                  echo " ";
                                }else {
                                  echo $solaf_data->previous_request_date_m;
                                } ?></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <!-- <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">

            <thead>
                <tr class="info">
                    <th>سبق له التمتع ب </th>
                    <th>حد السلفه</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>


                <tr>
                    <td> (<?php echo $solaf_data->num_previous_requests;?>)سلفه</td>
                    <td>(<?php echo   $solaf_data->hd_solfa;?>)</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">الموظف المختص/<?= $level_3data->to_user_n ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y', $level_2data->date) ?></td>
                </tr>


                <?php if ($solaf_data->action_mowazf_moktas ==1) {
                ?>

                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <div class="radio-content">
                            <input type="radio" id="accept-1" checked data-validation="required" name="action3" value="1">


                            <label class="radio-label" for="accept-1">أوافق</label>

                        </div>
                    </td>
                </tr>


                <?php
            } elseif ($solaf_data->action_mowazf_moktas ==2) {
                ?>
                <tr>
                    <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

                        <div class="radio-content">
                            <input type="radio" name="action3" data-validation="required" id="accept-2" checked value="2">

                            <label class="radio-label" for="accept-2" onclick="change_photo_DirectMange2r(1);
                          $('#reason_action3').removeAttr('disabled');"> لا أوافق بسبب </label>
                        </div>

                        <?php echo$solaf_data->reason_action; ?>

                    </td>
                </tr>
                <?php
            } ?>


            </tbody>
        </table>
        <br> <br> -->



    </div>
    <div class="col-sm-3">
        <table class="table table-bordered" style="">
            <thead>
                <tr>
                    <td colspan="2">
                        <img id="empImg_1" src="<?php echo base_url()?>uploads/human_resources/emp_photo/thumbs/<?php echo $level_2data->from_user_photo?>" onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';" class="center-block img-responsive" style="width: 180px; height: 150px">

                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <?php if ($solaf_data->suspend == 4 ) {
          ?>
    <div class="col-sm-3">
        <table class="table table-bordered" style="">
            <thead>
                <tr>
                    <td colspan="2">
                        <img id="empImg_1" src="<?php echo base_url()?>uploads/human_resources/emp_photo/thumbs/<?php echo $level_3data->from_user_photo?>" onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';" class="center-block img-responsive" style="width: 180px; height: 150px">
                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <?php
      }} ?>
</div>












<div class="col-sm-12 padding-4">
    <?php if ($solaf_level > 4 ||$solaf_data->suspend == 4) {
          ?>
    <div class="col-sm-9 padding-4">

        <!-- <label> الشؤون المالية</label> -->
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
                                if ($solaf_data->rased_yasmah ==1) {
                                        echo  "نعم" ;
                                    }
                                elseif ($solaf_data->rased_yasmah ==2) {
                                        echo  "لا" ;
                                    }
                                 ?></td>
                                <td style="width: 150px">تاريخ توفر الرصيد:</td>
                                <td class="white-bg"><?php echo $solaf_data->rased_motah; ?></td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <?php  if ($solaf_data->level > 5 ||$solaf_data->suspend == 4 ) {   ?>

                <div class="col-xs-12">
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                            <tr class="rosasy-bg">
                                <?php if (!empty($solaf_data->moder_mali_option)) {
                                            if ($solaf_data->moder_mali_option == 1) {
                                                $check1='check-';
                                                $check2='';
                                                $check3='';
                                            }elseif ($solaf_data->moder_mali_option == 2) {
                                                $check1='';
                                                $check2='check-';
                                                $check3='';  }
                                            elseif ($solaf_data->moder_mali_option == 3) {
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
                <?php }?>

            </div>
        </div>

        <!-- <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
            <tbody>
                <tr>
                    <td colspan="4"></td>
                </tr>








                <?php if ($solaf_data->action_moder_hr ==1) {
                ?>

                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <div class="radio-content">
                            <input type="radio" id="accept-1" data-validation="required" name="action" checked onclick="change_photo_DirectMange3r(1)
                      $('#reason_action4').val('...........');
                       $('#reason_action4').attr('disabled',true);" value="1">


                            <label class="radio-label" for="accept-1">تم التأكد من جميع البيانات والتواقيع أعلاه ولا
                                مانع من تمتع الموظف بالأجازة</label>

                        </div>
                    </td>
                </tr>


                <?php
            } elseif ($solaf_data->action_moder_hr ==2) {
                ?>
                <tr>
                    <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

                        <div class="radio-content">
                            <input type="radio" name="action" data-validation="required" id="accept-2" checked onclick="change_photo_DirectMange3r(2)$('#reason_action4').removeAttr('disabled'); " value="2">

                            <label class="radio-label" for="accept-2" onclick="change_photo_DirectMange3r(1);
          $('#reason_action4').removeAttr('disabled');"> لا أوافق بسبب </label>
                        </div>

                        <?php echo$solaf_data->reason_action; ?>

                    </td>
                </tr>
                <?php
            } ?>


                <tr>
                    <td colspan="2">الإسم/<?= $level_4data->to_user_n ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y', $level_3data->date) ?></td>
                </tr>
            </tbody>
        </table>
        <br> <br> -->


    </div>
    <div class="col-sm-3">
        <table class="table table-bordered" style="">
            <thead>
                <tr>
                    <td colspan="2">
                        <img id="empImg_1" src="<?php echo base_url()?>uploads/human_resources/emp_photo/thumbs/<?php echo $level_5data->from_user_photo?>" onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';" class="center-block img-responsive" style="width: 180px; height: 150px">
                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <?php
      } ?>

</div>

















<div class="col-sm-12 padding-4">
    <?php if ($solaf_level >6 ||$solaf_data->suspend == 4) {
            ?>
    <div class="col-sm-9 padding-4">


      <div class="piece-box" style="margin-top: 0px">
          <div class="col-xs-12 text-center">
              <div class="piece-heading">

                  <h5>إعتماد المدير العام</h5>
              </div>

          </div>
          <div class="piece-body">
              <div class="col-xs-12">
                  <?php if (!empty($solaf_data->action_moder_final)) {
                                  if ($solaf_data->action_moder_final == 4) {
                                      $check1='check-';
                                      $check2='';


                                  }elseif ($solaf_data->action_moder_final == 5) {
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
                

              </div>

          </div>
      </div>
<!--
        <label>مدير عام الجمعية</label>
        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">
            <tbody>
                <tr>
                    <td colspan="4"></td>
                </tr>





                <?php if ($solaf_data->action_moder_final ==1) {
                ?>

                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <div class="radio-content">
                            <input type="radio" id="accept-1" data-validation="required" name="action" checked onclick="$('#reason_action5').val('...........'); $('#approved').val(1);
                           $('#reason_action5').attr('disabled',true);" value="1">
                            <label class="radio-label" for="accept-1">أوافق</label>

                        </div>
                    </td>
                </tr>


                <?php
            } elseif ($solaf_data->action_moder_final ==2) {
                ?>

                <tr>
                    <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">

                        <div class="radio-content">
                            <input type="radio" name="action" data-validation="required" id="accept-2" checked onclick="$('#reason_action5').removeAttr('disabled');  $('#approved').val(2);" value="2">

                            <label class="radio-label" for="accept-2" onclick="$('#reason_action5').removeAttr('disabled');"> لا أوافق بسبب </label>
                        </div>

                        <?php echo$solaf_data->reason_action; ?>

                    </td>
                </tr>
                <?php
            } ?>


                <tr>
                    <td colspan="2">الإسم/<?= $level_4data->to_user_n ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y', $level_4data->date) ?></td>
                </tr>
            </tbody>
        </table> -->



    </div>
    <div class="col-sm-3">
        <table class="table table-bordered" style="">
            <thead>
                <tr>
                    <td colspan="2">
                        <img id="empImg_1" src="http://demo.abnaa-sa.org/asisst/fav/apple-icon-120x120.png" onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';" class="center-block img-responsive" style="width: 180px; height: 150px">
                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <?php
        } ?>
</div>
