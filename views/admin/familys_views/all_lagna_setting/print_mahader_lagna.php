


<link rel="stylesheet" href="<?php echo base_url();?>/asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>/asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>/asisst/admin_asset/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/asisst/admin_asset/css/style.css">




<style>


    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }

    .checkbox-statement span{
        margin-right: 3px;
        position: absolute;
        margin-top: 5px;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 90px;
    }
    .no-border{
        border:0 !important;
    }
    .table-devices tr td{
        width: 30%;
        min-height: 20px
    }
    .gray_background{
        /*background-color: #eee;*/
        background-color: #f7f7f7; 

    }
    table.th-no-border th,
    table.th-no-border td
    {
        border-top: 0 !important;
    }


    .piece-heading {
        background-color:#6faadc ;
        display: inline-block;
        float: right;
        font-weight: normal !important;
        color: white !important;
        width: 100%;
    }

    .main-header img{
        height: 100px;
    }
    @media print{
        #rightlogo{
            width: 450px;
        }
        .footer{
            position: absolute;
            bottom: 0;
            width: 100%;
        }


        .gray_background {
            /*background-color: #969696 !important;*/
            background-color: #f7f7f7 !important;
        }

    }
    @page{

        /*  margin: 130px 15px 20px 15px;*/
        margin: 155px 20px 200px 20px;
    }
    .gray_background {
       /* background-color: #969696 !important;*/
       background-color: #f7f7f7 !important;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #000 !important;
        padding: 2px 8px !important;
        font-weight: bold !important;
        font-size: 14px !important;
    }

    input[type=radio] {
        border: 0px;
        width: 30px;
        height: 30px;
    }
    table td h5{
        margin: 3px 0 !important;
        font-size: 16px !important;
    }
.table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td{
    background-color: white !important;
}
.table-bordered > tfoot > tr > th, .table-bordered > tfoot > tr > td{
    background: #f7f7f7  !important;
}


</style>


<div id="printdiv">

    <div class="col-xs-12 Title">
        <h5 class="text-center"><br><br>
            <span style="border-bottom: 2px solid #999; padding-bottom: 3px;">
     <strong>محضر اجتماع لجنة الرعاية والبرامج التنموية رقم (<?php echo  $row->glsa_rkm_full; ?>) </strong>
     </span>
        </h5><br>
    </div>

    <section class="main-body">
        <div class="container-fluid">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">

                    <h4>
                        <b style="border-bottom:1px solid; font-size: 16px;
                        font-family: sans-serif !important;
                         ">
                            الحمد لله وحده والصلاه والسلام علي من لانبي بعده وبعد :
                        </b>
                    </h4>
                    <p>


                        <?php
                        $date = date('d-m-Y',$row->date);
                        $dayOfWeek = date("l", strtotime($date));
                        ?>
                    <h4 style=" font-size: 16px; font-weight: bold; font-family: sans-serif !important; "><?php  switch ($dayOfWeek) {
                            case "Saturday":
                                echo  ' في هذا اليوم الموافق السبت' .'('.$date.")";
                                break;
                            case "Sunday":
                                echo  ' في هذا اليوم الموافق الاحد' .'('.$date.")";
                                break;
                            case "Monday":
                                echo  ' في هذا اليوم الموافق الاثنين' .'('.$date.")";
                                break;
                            case "Tuesday":
                                echo  ' في هذا اليوم الموافق الثلاثاء' .'('.$date.")";
                                break;
                            case "Wednesday":
                                echo  ' في هذا اليوم الموافق الاربعاء' .'('.$date.")";
                                break;
                            case "Thursday":
                                echo  ' في هذا اليوم الموافق الخميس' .'('.$date.")";
                                break;
                            case "Thursday":
                                echo  ' في هذا اليوم الموافق الخميس' .'('.$date.")";
                                break;
                            default:
                                echo  ' في هذا اليوم الموافق الخميس' .'('.$date.")";
                        }



                        //  echo date("Y-m-d",$row->date);

                        ?>


                        م عقدت لجنة الرعاية والبرامج التنموية إجتماعها رقم (<?php echo $row->glsa_rkm_full;?>)

                        لمناقشة التالي : -
                    </p>
                    <?php


                    $indexs=array(1=>'المحور الأول',
                        2=>'المحور الثاني',
                        3=>'المحور الثالث',
                        4=>'المحور الرابع',
                        5=>'المحور الخامس',
                        6=>'المحور السادس',
                        7=>'المحور السابع',
                    );

                    $reasons = array(0 => 'قبول', 1 => 'رفض');


                   ?>


                    <?php
                    
                    /*echo '<pre>';
                    print_r($records);
                    */
                    
                     if (isset($records) && !empty($records)) {
                        $x = 1;
                        foreach ($records as $session) {

                            ?>
                            <p><?php echo $x; ?>- <?php echo $session->mehwar_title; ?> .</p>


                            <?php $x++;
                        }
                    } ?>

                    <?php if(isset($records)&&!empty($records)) {
                        $x = 1;
                        foreach ($records as $session) {  ?>

                            <div class="col-xs-12 no-padding">
                                <h6><strong><?php echo $indexs[$x];?> :</strong><?php echo $session->mehwar_title; ?></h6>

                                <!------------------------------------------------------->

                                <?php
                                $array =array(2,4,12,14);

                                if(in_array($session->mehwar_id_fk,$array)){

                                    //continue;  ?>

                                    <table id="examples"
                                           class="table table-striped table-bordered dt-responsive nowrap res<?php echo $session->mehwar_id_fk; ?>"
                                           cellspacing="0" width="100%">

                                        <thead>
                                        <tr>
                                            <th class="gray_background">م</th>
                                            <th class="gray_background">رقم الملف</th>
                                            <th colspan="2" class="gray_background">إسم رب الاسرة</th>
                                            <th class="gray_background">أرملة</th>
                                            <th class="gray_background">يتيم</th>
                                            <th class="gray_background">مستفيد</th>
                                             <th class="gray_background">الفئة</th>
                                            <th class="gray_background">سبب الإجراء</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        if (isset($session->mahder_details) && !empty($session->mahder_details)) {
                                            $z = 0;
                                            foreach ($session->mahder_details as $row) {


                                                $z++;
                                                $members = $row->members;

                                                    if ($z % 2 == 0) {
                                                        $ccolor = '#f1f1f1';
                                                    } else {
                                                        $ccolor = 'white';
                                                    }


                                                    ?>

                                                    <tr>
                                                        <td style="background-color: <?php echo $ccolor; ?>; "
                                                            rowspan="<?php if (!empty($members)) {
                                                                echo sizeof($members) + 1;
                                                            } ?>"><?php echo $z; ?></td>
                                                        <td style="background-color: <?php echo $ccolor; ?>;"
                                                            rowspan="<?php if (!empty($members)) {
                                                                echo sizeof($members) + 1;
                                                            } ?>"><?php echo $row->file_num; ?></td>
                                                        <td style="background-color: <?php echo $ccolor; ?>;"
                                                            colspan="2" width="30%"><?php echo $row->father; ?></td>
                                                        <td style="background-color: <?php echo $ccolor; ?>; color: <?php echo $ccolor; ?>;"
                                                            class="countable2<?php echo $session->mehwar_id_fk; ?>">0
                                                        </td>
                                                        <td style="background-color: <?php echo $ccolor; ?>;color: <?php echo $ccolor; ?>;"
                                                            class="countable3<?php echo$session->mehwar_id_fk; ?>">0
                                                        </td>
                                                        <td style="background-color: <?php echo $ccolor; ?>;color: <?php echo $ccolor; ?>;"
                                                            class="countable4<?php echo $session->mehwar_id_fk; ?>">0
                                                        </td>

                                                        <td style="background-color: <?php echo $ccolor; ?>;color: <?php echo $ccolor; ?>;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: <?php echo $ccolor; ?>;"
                                                            rowspan="<?php if (!empty($members)) {
                                                                echo sizeof($members);
                                                            } ?>">الأفراد
                                                        </td>
                                                        <td style="background-color: <?php echo $ccolor; ?>;"><?= $members[0]->person_name ?></td>
                                                        <td style="background-color: <?php echo $ccolor; ?>; "
                                                            class="countable2<?php echo $session->mehwar_id_fk; ?>"><?= $members[0]->total_armal ?></td>
                                                        <td style="background-color: <?php echo $ccolor; ?>;"
                                                            class="countable3<?php echo $session->mehwar_id_fk; ?>"><?= $members[0]->total_yatem ?></td>
                                                        <td style="background-color: <?php echo $ccolor; ?>;"
                                                            class="countable4<?php echo$session->mehwar_id_fk; ?>"><?= $members[0]->total_mostafed ?></td>
                                                            
                                                            
                                                            
                                                             <td></td>
                                                            
                                                        <td style="background-color: <?php echo $ccolor; ?>;"> <?= $members[0]->lagna_reason_title ?>

                                                        </td>
                                                    </tr>


                                                    <?php
                                                    if (!empty($members)) {
                                                        if (sizeof($members) > 1) {
                                                            for ($a = 1; $a < sizeof($members); $a++) {
                                                                ?>


                                                                <tr>
                                                                    <td style="background-color: <?php echo $ccolor; ?>;"><?= $members[$a]->person_name ?></td>
                                                                    <td style="background-color: <?php echo $ccolor; ?>;"
                                                                        class="countable2<?php echo $session->mehwar_id_fk; ?>"><?= $members[$a]->total_armal ?></td>
                                                                    <td style="background-color: <?php echo $ccolor; ?>;"
                                                                        class="countable3<?php echo $session->mehwar_id_fk; ?>"><?= $members[$a]->total_yatem ?></td>
                                                                    <td style="background-color: <?php echo $ccolor; ?>;"
                                                                        class="countable4<?php echo $session->mehwar_id_fk; ?>"><?= $members[$a]->total_mostafed ?></td>
                                                                    <td style="background-color: <?php echo $ccolor; ?>;">
                                                                        <?= $members[$a]->lagna_reason_title ?>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                        }
                                                    }


                                                    ?>
                                                    <?php

                                            }
                                        }
                                        ?>


                                        </tbody>
                                        <tfoot>
                                        <th class="gray_background" colspan="4">المجموع</th>
                                        <th class="result2<?php echo $session->mehwar_id_fk; ?>"></th>
                                        <th class="result3<?php echo $session->mehwar_id_fk; ?>"></th>
                                        <th class="result4<?php echo $session->mehwar_id_fk; ?>"></th>
                                        <th class="gray_background"></th>


                                        </tfoot>
                                    </table>
                                <?php }else{ ?>

                                    <!------------------------------------------------------->

                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                        <thead>
                                        <tr>
                                            <th class="gray_background">م</th>
                                            <th class="gray_background">رقم الملف</th>
                                            <th class="gray_background"  >إسم رب الاسرة</th>
                                            <th class="gray_background">عدد الأفراد</th>
                                            <th class="gray_background">أرملة</th>
                                            <th class="gray_background">يتيم</th>
                                            <th class="gray_background">مستفيد</th>
                                           <th class="gray_background">الفئة</th>
                                            <th class="gray_background">سبب الإجراء</th>
                                        </tr>
                                        </thead>
                                        <tbody>



                                        <?php
                                        if (isset($session->mahder_details) && !empty($session->mahder_details)) {
                                            $z = 0;
                                            $all_member=0;
                                            $armal=0;
                                            $yatem=0;
                                            $mostafed=0;
                                            $Tall_member = 0;
                                            $Tyatem= 0;
                                            $Tarmal= 0;
                                            $Tmostafed= 0;

                                            foreach ($session->mahder_details as $row) {
                                                $z ++;
                                                $armal=$armal+$row->total_armal;
                                                $yatem=$yatem+$row->total_yatem;
                                                $mostafed = $mostafed+$row->total_mostafed;
                                                $Tall_member += $row->total_armal + $row->total_yatem + $row->total_mostafed;
                                                $Tarmal += $row->total_armal;
                                                $Tyatem +=$row->total_yatem;
                                                $Tmostafed += $row->total_mostafed;

                                                ?>

                                                <tr>
                                                    <td><?php echo $z; ?></td>
                                                    <td><?php echo $row->file_num; ?></td>
                                                    <td width="30%"><?php echo $row->person_name;?></td>
                                                    <td><?php echo $row->total_afrad; ?></td>
                                                    <td> <?php echo $row->total_armal; ?></td>
                                                    <td><?php echo $row->total_yatem; ?></td>
                                                    <td> <?php echo $row->total_mostafed; ?></td>
                                                    <td><?php echo $row->family_cat_name ?></td>
                                                    <td> <?php echo $row->lagna_reason_title; ?></td>
                                                </tr>
                                                <?php
                                                }
                                        }
                                        ?>

                                        </tbody>
                                        <tfoot>
                                        <th class="gray_background" colspan="3">المجموع</th>
                                        <th><?php echo  $Tall_member ;?></th>
                                        <th><?php echo  $Tarmal ;?></th>
                                        <th><?php echo  $Tyatem ;?></th>
                                        <th><?php echo  $Tmostafed ;?></th>
                                        <th class="gray_background"></th>
                                        </tfoot>
                                    </table>

                                <?php } ?>

                            </div>
                            <?php


                            $x++; }
                    } ?>

                    <br />
                    <?php       if (isset($member_galsa) && !empty($member_galsa)){  ?>
                        <div class="col-xs-12 no-padding text-center">
                            <!--<h6><strong></strong></h6>-->
                            <span style="border-bottom: 1px solid; padding-bottom: 3px; font-weight: bold;">أعضاء اللجنة</span>


                            <br />      <br />
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"
                                   style="table-layout: fixed;"
                            >

                                <thead>
                                <tr>
                                    <th style="width: 60px;" class="gray_background">م</th>
                                    <th class="gray_background">الاســم</th>
                                    <th style="width: 200px;" class="gray_background">الصفة</th>
                                    <th  class="gray_background">التوقيع</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php       $x=1;  foreach ($member_galsa as $member) {  ?>
                                    <tr>
                                        <td> <?=$x++?>  </td>
                                        <td> <?=$member->member_name?>  </td>
                                        <td> <?=$member->galsa_member_job?>  </td>
                                        <td>         </td>

                                    </tr>
                                <?php  } ?>

                                </tbody>
                            </table>
                        </div>
                    <?php  } ?>
                    <!------------------------------------------------------->

                    <div class="col-xs-12">
                        <h5 class="text-center">
                            <span style="border-bottom: 1px solid; padding-bottom: 3px; 
                                     font-weight: bold;
                                         font-family: sans-serif !important;">توجيه المدير العام</span>

                        </h5>
                    </div>

                    <div class="col-xs-12">
                        <div class="col-xs-4">
                            <h5 style="position: relative;" >
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <span style="position: absolute; top: 8px;margin-right: 8px; font-weight: bold; 
                                font-family: sans-serif !important;
                                "> لا مانع </span>
                            </h5>
                            <h5 style="position: relative;" >
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <span style="position: absolute; top: 8px;margin-right: 8px;"> ..............</span>
                            </h5>
                        </div>
                        <div class="col-xs-8">
                            <br />
                            <h5>.............................................</h5>
                            <h5>.............................................</h5>
                        </div>
                    </div>


                    <div class="header col-xs-12 no-padding">
                        <div class="col-xs-4 text-center">

                        </div>
                        <div class="col-xs-3 text-center">

                        </div>
                        <div class="col-xs-5  text-center">
                            <h5 style="margin-right: 0px; font-weight: bold; font-weight: bold !important; font-size: 20px !important;">مدير عام الجمعية</h6>
                                <br />
                                <h5 style="margin-right: 0px; font-weight: bold; font-weight: bold !important; font-size: 20px !important;">سلطان بن محمد الجاسر</h6>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </section>

</div>







<?php
/*
$previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);  */?>

<script type="text/javascript" src="<?php echo base_url();?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url();?>/asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url();?>/asisst/admin_asset/js/custom.js"></script>
<!--
    <script >
        var divElements = document . getElementById("printdiv") . innerHTML;
        var oldPage = document . body . innerHTML;
        document . body . innerHTML =
            "<html><head><title></title></head><body><div id='printdiv'>" +
            divElements + "</div></body>";
        window .print();
        setTimeout(function () {
            window.location.href ="<?php echo base_url($previos_path) ?>";
        }, 1000);
    </script >
-->

<script>


    var arr =[2,4,12,14];

    for (var n = 0; n < arr.length; n++){
        var type=arr[n];

        var cls1 = $(".res"+type).find("td.countable1"+type);
        var cls2 = $(".res"+type).find("td.countable2"+type);
        var cls3 = $(".res"+type).find("td.countable3"+type);
        var cls4 = $(".res"+type).find("td.countable4"+type);


        var sum1 = 0;
        var sum2 = 0;
        var sum3 = 0;
        var sum4 = 0;

        for (var i = 0; i < cls1.length; i++){
            if(cls1[i].className == "countable1"+type){
                sum1 += isNaN(cls1[i].innerHTML) ? 0 : parseInt(cls1[i].innerHTML);
            }

        }

        for (var i = 0; i < cls2.length; i++){
            if(cls2[i].className == "countable2"+type){
                sum2 += isNaN(cls2[i].innerHTML) ? 0 : parseInt(cls2[i].innerHTML);
            }
        }
        for (var i = 0; i < cls3.length; i++){
            if(cls3[i].className == "countable3"+type){
                sum3 += isNaN(cls3[i].innerHTML) ? 0 : parseInt(cls3[i].innerHTML);
            }
        }
        for (var i = 0; i < cls4.length; i++){
            if(cls4[i].className == "countable4"+type){
                sum4 += isNaN(cls4[i].innerHTML) ? 0 : parseInt(cls4[i].innerHTML);
            }
        }


        $(".result1"+type).text(sum1);
        $(".result2"+type).text(sum2);
        $(".result3"+type).text(sum3);
        $(".result4"+type).text(sum4);
    }







</script>