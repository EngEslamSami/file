




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
    <!--
    <div class="col-xs-4 pad-2">
        <div class="right-img" >
            <img src="<?php echo base_url() ?>asisst/admin_asset/img/logo-rectangle1.png">
        </div>
    </div> -->
    <div class="col-xs-12 pad-2">
        <div class="main-bond-title">
            <!--  <h3 class="text-center"><span class="">  كارتة الصنف :<?=$get_all->name ?> </span></h3>-->
        </div>
    </div>
    <div class="col-xs-4 pad-2">
        <div class="left-img">

        </div>
    </div>
</div>

<section class="main-body">
    <div>
        <!--eslam-->
        <?php if(!empty($agaza_data)){ ?>
            <label>الموظف البديل</label>
            <table border="1"  cellpadding="3" cellspacing="0"  style="width:100%">
                <tbody>
                <tr>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td colspan="2">إسم الموظف/<?= $personal_data->employee ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y') ?></td>
                </tr>
                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300" >
                        <input type="radio"name="action1"  disabled <?php if($agaza_data->action_emp_badel ==1){  echo 'checked '; }?> value="1">أتعهد
                        بأن أقوم بإستلام جميع الأعمال الموكلة للموظف المذكور أعلاه قبل موعد أجازته وتنفيذها في
                        مواعيدها<br>
                        <input type="radio" name="action1" disabled <?php if($agaza_data->action_emp_badel ==2){  echo 'checked '; }?>
                               value="2"><input size="60" type="text" name="reason_action" disabled
                                                value="<?php if($agaza_data->action_emp_badel ==2){
                                                    echo$agaza_data->reason_action; }?>"
                                                style="border: none; background-color: rgba(0, 0, 0, 0);"></td>
                </tr>

                </tbody>
            </table>

            <br>

            <label>المدير المباشر</label>
            <table border="1" cellpadding="3" cellspacing="0" style="width:100%">
                <tbody>
                <tr>
                    <td colspan="4"></td>
                </tr>

                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <input type="radio" name="action2"  disabled
                            <?php if($agaza_data->action_direct_manager ==1){  echo 'checked '; }?>

                               value="1">أوافق على أجازة الموظف المذكور أعلاه وسيتم تسليم أعماله
                        للموظف البديل<br>
                        <input type="radio" name="action2" disabled

                            <?php if($agaza_data->action_direct_manager ==2){  echo 'checked '; }?>
                               value="2"> لا أوافق بسبب
                        <input size="60" type="text" name="reason_action" disabled value="

                             <?php if($agaza_data->action_direct_manager ==2){
                            echo$agaza_data->reason_action; }else{ ?>
                      ................... <?php } ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">الإسم/<?= $agaza_data->direct_manager_n; ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?= date('d-m-Y') ?></td>
                </tr>
                </tbody>
            </table>
            <br> <br>




            <label>إفادة شئون الموظفين</label>
            <table border="1" cellpadding="3" cellspacing="0" style="width:100%">

                <thead>
                <tr class="info">
                    <th>سبق له التمتع ب</th>
                    <th>عدد أيام الأجازة المستحقة</th>
                    <th>عدد أيام الأجازة المطلوبة</th>
                    <th>الرصيد المتبقي من الأجازة</th>
                </tr>
                </thead>
                <tbody>


                <tr>
                    <td> ()أيام/يوما</td>
                    <td>()أيام/يوما</td>
                    <td>()أيام/يوما</td>
                    <td>()أيام/يوما</td>
                </tr>
                <tr>
                    <td colspan="2">الموظف المختص/<?php  if(!empty($level_2data->to_user_n)){ echo$level_2data->to_user_n;} ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?php  if(!empty($level_2data->date)){  echo date('d-m-Y',$level_2data->date); } ?></td>
                </tr>
                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <input type="radio" name="action3"  disabled
                            <?php if($agaza_data->action_mowazf_moktas ==1){  echo 'checked '; }?>
                               value="1">أوافق<br>
                        <input type="radio" name="action3" disabled
                            <?php if($agaza_data->action_mowazf_moktas ==2){  echo 'checked '; }?>
                               value="2"> لا أوافق بسبب
                        <input size="60" type="text" name="reason_action" disabled value="
                       <?php if($agaza_data->action_mowazf_moktas ==2){  echo $agaza_data->reason_action; }else{ ?>
                      ................... <?php } ?> "></td>
                </tr>
                </tbody>
            </table>
            <br> <br>



            <label>مدير الموارد البشرية والشئون الإدارية</label>
            <table border="1" cellpadding="3" cellspacing="0" style="width:100%">
                <tbody>
                <tr>
                    <td colspan="4"></td>
                </tr>

                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <input type="radio" name="action4" disabled

                            <?php if($agaza_data->action_moder_hr ==1){  echo 'checked '; }?>
                               value="1">تم التأكد من جميع البيانات والتواقيع أعلاه ولا
                        مانع من تمتع الموظف بالأجازة<br>
                        <input type="radio" name="action4" disabled

                            <?php if($agaza_data->action_moder_hr ==2){  echo 'checked '; }?>
                               value="2"> لا أوافق بسبب
                        <input size="60" type="text" name="reason_action" disabled value="
                        <?php if($agaza_data->action_moder_hr ==2){  echo $agaza_data->reason_action; }else{ ?>
                      ................... <?php } ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">الإسم/<?php  if(!empty($level_3data->to_user_n)){ echo$level_3data->to_user_n;} ?></td>

                    <td>التوقيع/</td>
                    <td>التاريخ/<?php  if(!empty($level_3data->date)){  echo date('d-m-Y',$level_3data->date); } ?></td>
                </tr>
                </tbody>
            </table>
            <br> <br>





            <label>مدير عام الجمعية</label>
            <table border="1" cellpadding="3" cellspacing="0" style="width:100%">
                <tbody>
                <tr>
                    <td colspan="4"></td>
                </tr>

                <tr>
                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                        <input type="radio" name="action5" disabled
                            <?php  if( $agaza_data->action_moder_final ==1 ){ echo 'checked'; } ?>
                               value="1">أوافق<br>
                        <input type="radio" name="action5" disabled
                            <?php if($agaza_data->action_moder_final ==2){
                                echo 'checked '; }?> value="2"> لا أوافق بسبب
                        <input size="60" type="text" name="reason_action" disabled value="
   <?php if($agaza_data->action_moder_final ==2){
                            echo $agaza_data->reason_action; }else{ ?>
   ................... <?php } ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">الإسم/<?php  if(!empty($level_4data->to_user_n)){ echo$level_4data->to_user_n;} ?></td>
                    <td>التوقيع/</td>
                    <td>التاريخ/<?php  if(!empty($level_4data->date)){  echo date('d-m-Y',$level_4data->date); } ?></td>
                </tr>
                </tbody>
            </table>

        <?php } ?>
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





