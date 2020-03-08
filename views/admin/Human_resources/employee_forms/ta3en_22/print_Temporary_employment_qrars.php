
<!DOCTYPE html >
<html lang = "en" >
<head >
    <meta charset = "utf-8" >
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css" >
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/style.css" >


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

    </style>




</head >
<body >



<body onload="printDiv('printDiv')" id="printDiv">

    <div class="header col-xs-12 no-padding">
        <div class="col-xs-4 text-center">
            <div class="col-xs-8 no-padding">
                <h5>الجمعية الخيرية لرعاية الأيتام ببريدة (أبـناء)</h5>
                <p>مسجلة بوزارة العمل والتنمية الإجتماعية<br> تصريح رقم 463</p>
            </div>
            <div  class="col-xs-4 no-padding">
                <img src="<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png" >
            </div>
        </div>
        <div class="col-xs-4 text-center">
            <div class="main-title">
                <h4>قرار تعيين مؤقت</h4>
            </div>
        </div>
        <div class="col-xs-4 ">
            <h6>الرقم :.............</h6>
            <h6>التاريخ : ...............</h6>
            <h6>المرفقات : ...............</h6>
            <h6>الموضوع : ............</h6>
        </div>
    </div>
    <div class="clearfix"></div>	<br>
    <section class="main-body">

        <div class="container">

            <div class="print_forma  col-xs-12 no-padding">
                <div class="col-xs-12 ">
                    <h5>    فإن المدير العام للجمعية الخيرية لرعاية الأيتام ببريدة-أبناء و بناءاً  على صلاحياته، وبناءاً  عن حاجة الجمعية لتعيين السيد /<?php if (isset($records->emp_name)){ echo $records->emp_name ;} ?> ، فإنه تقرر ما يلي:</h5>

                   <!-- <h5>  تعيين السيد/<?=$records->emp_name?></h5> -->
                </div>

                <div class="piece-box no-border">
                    <div class="piece-body">
                        <div class="col-xs-12 no-padding">
                            <table class="table table-bordered">
                                <thead>
                                <tr class="">
                                    <th>الإدارة</th>
                                    <th><?php if (isset($records->edara_n)){ echo $records->edara_n ;} ?></th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr class="open_green">
                                    <td>القسم</td>
                                    <td><?php if (isset($records->qsm_n)){ echo $records->qsm_n ;}?></td>

                                </tr>
                                <tr>
                                    <td>المسمى الوظيفي</td>
                                    <td><?php if (isset($records->job_title_n)){ echo $records->job_title_n ;}?></td>
                                </tr>
                                <tr class="open_green">
                                    <td>الرئيس المباشر</td>
                                    <td><?php if (isset($records->direct_manager_n)){ echo $records->direct_manager_n ;}?></td>
                                </tr>
                                <tr>
                                    <td>الراتب الإساسي</td>
                                    <td><?php if (isset($records->salary)){ echo $records->salary ;} ?></td>
                                </tr>
                                <tr class="open_green">
                                    <td>بدل السكن</td>
                                    <td><?php if (isset($records->bdal_skan)){ echo $records->bdal_skan ;} ?></td>
                                </tr>
                                <tr>
                                    <td>بدل المواصلات</td>
                                    <td><?php if (isset($records->bdal_mowaslat)){ echo $records->bdal_mowaslat ;}?></td>
                                </tr>
                                <tr class="open_green">
                                    <td>بدلات أخرى</td>
                                    <td><?php if (isset($records->bdal_other)){ echo $records->bdal_other ;} ?></td>
                                </tr>
                                <tr>
                                    <td>إجمالي الراتب</td>
                                    <td><?php if (isset($records->total_salary)){ echo $records->total_salary ;}?></td>
                                </tr>
                                <tr class="open_green">
                                    <td>تاريخ مباشرة العمل</td>
                                    <td><?php if (isset($records->work_date_m)){ echo date('Y/m/d', strtotime($records->work_date_m)) ;}?></td>
                                </tr>
                                <tr>
                                    <td>مدة الفترة التجريبية</td>
                                    <td> من <?php if (isset($records->date_from_m)){ echo date('Y/m/d',strtotime($records->date_from_m));}?>  حتي <?php if (isset($records->date_to_m)){ echo date('Y/m/d', strtotime($records->date_to_m)) ;}?></td>
                                </tr>


                                </tbody>
                            </table>

                            <br>
                            <h5>	- يكون عمله وفقاً للوصف الوظيفي المعتمد من إدارة الجمعية.</h5><br>

                            <h5>	- على جميع الإدارات العمل بموجبه وإنفاذه.</h5><br>

                            <h4 class="text-center">والله ولي التوفيق</h4><br><br>
                            <div class="col-xs-4 col-xs-offset-8">
                                <h5>مدير عام الجمعية</h5>
                                <h5>   سلطان بن محمد الجاسر</h5>
                            </div>


                        </div>
                    </div>



                </div>
            </div>



    </section>




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

