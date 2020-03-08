<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="utf-8">
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

        .bordered-bottom {
            border-bottom: 4px solid #9bbb59 !important;
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
            margin-bottom: 0
        }

        .piece-box table th,
        .piece-box table td {
            padding: 2px 8px !important;
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

        @page {
            size: A4;
            margin: 100px 20px 0 20px;
        }

        .open_green {
            background-color: #e6eed5;
        }

        .closed_green {
            background-color: #cdddac;
        }

        .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border: 1px solid #abc572;
        }

        .inp-control {
            width: auto;
            height: 32px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;

        }
    </style>


</head>
<body>


<div id="printdiv">

    <section class="main-body">
        <div class="print_forma  col-xs-12 no-padding">
        <div class="col-xs-4 col-xs-offset-8 text-center">
        <br><br>
<p style="">التاريخ : <?php echo date("d-m-Y")  ?></p><br><br>
</div>
            <div class="piece-box no-border">
                
                <h5 class="text-center">إقرار</h5><br><br>

<?php
//echo 'asdsadsadsadasdsad';

?>
                <div class="col-xs-12 form-group no-padding">
                    <h6 style="line-height: 50px; text-align: center;"> أقر
                        أنا/<?php if (!empty($records->past_person)) {
                            echo $records->past_person;
                        } ?>
                       &nbsp; السجل المدني/ <?php if (!empty($records->past_bank_national_card)) {
                            echo $records->past_bank_national_card;
                        } ?>
                        &nbsp; بصفة/ <?php if (!empty($records->past_relationship)) {
                            echo $records->past_relationship;
                        } ?>
                        <br />
                        &nbsp; جوال رقم ( <?php if (!empty($records->past_bank_mob)) {
                            echo $records->past_bank_mob;
                        } ?> )
                          &nbsp;
                       بأنه ليس لدي مانع من تغيير بيانات مسئول الحساب البنكي الحالي لديكم
                       &nbsp;
                         <br />
                         التابع لملف الأسرة رقم
                       
                        (<?php if (!empty($records->file_num)) {
                            echo $records->file_num;
                        } ?> )
                           &nbsp;
                        من حساب
                        <?php
                        if (!empty($records->past_bank_name)) {
                            echo $records->past_bank_name;
                        } ?> رقم <?php if (!empty($records->past_bank_code)) {
                            echo $records->past_bank_code;
                        } ?>
                       &nbsp;
                         إلى/ <br>
                       <?php echo  $records->current_person_name; ?>
                          &nbsp;
                         
                        السجل المدني/ <?php
                        
                          echo  $records->current_person_card;
                         /*if (!empty($records->current_bank_national_card)) {
                            echo $records->current_bank_national_card;
                        }*/
                        
                         ?>
                        
                          &nbsp;
                          
                        بصفة/ <?php
                        
                          echo  $records->current_relation_name;
                         /*if (!empty($records->current_relationship)) {
                            echo $records->current_relationship;
                        } */?>
                        
                              
                       &nbsp;<br>
                        جوال رقم (<?php 
                        echo  $records->current_person_mob;
                        
                        
                        /*if (!empty($records->current_bank_mob)) {
                            echo $records->current_bank_mob;
                        }*/ ?> )

                          &nbsp;
                        
                        
                         علي حساب / 
                          <?php
                        if (!empty($records->current_bank_name)) {
                            echo $records->current_bank_name;
                        } ?> 
                         
                       &nbsp;   
                         رقم
                        <?php if (!empty($records->current_bank_num)) {
                            echo $records->current_bank_num;
                        } ?>
                        
                      
                        
                        
                  
                       
                    </h6>
                    <br><br>
                    <div class="col-xs-6 form-group text-center">
                        <h5>توقيع المحول منه </h5>
                    </div>
                    <div class="col-xs-6 form-group text-center">
                        <h5>توقيع المحول إليه </h5>
                    </div>
                </div>


            </div>

        </div>
    </section>


</div>

<script>
    var divElements = document.getElementById("printdiv").innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window.print();
    setTimeout(function () {
        window.location.href = "<?php echo base_url('family_controllers/Family/add_responsible_account/' . $records->family_national_num_fk) ?>";
    }, 100);
</script>

