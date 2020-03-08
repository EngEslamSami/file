
    <title>إخلاء طرف</title>
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
            margin: 20px 10px 0 10px;
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


    <div id="printdiv"  >

        <div class="header col-xs-12 no-padding">
            <div class="col-xs-4 text-center">
                    <h5>الجمعية الخيرية لرعاية الأيتام ببريدة (أبـناء)</h5>
                    <p>مسجلة بوزارة العمل والتنمية الإجتماعية<br> تصريح رقم 463</p>

            </div>
            <div class="col-xs-4  no-padding">
                <div class="col-xs-6 col-xs-offset-3">
                    <img src="<?php echo base_url()?>asisst/admin_asset/img/logo-atheer.png"  >
                </div>
            </div>
            <div class="col-xs-4 ">
                <h6>الرقم :<?=$this->uri->segment(5);?></h6>
                <h6>التاريخ : <?=date("Y-m-d");?></h6>
                <h6>المرفقات : ...............</h6>
                <h6>الموضوع : ............</h6>
            </div>
        </div>



        <section class="main-body">

                <div class="print_forma  col-xs-12 no-padding">
                    <h4 class="text-center">إخلاء طرف</h4>
                    <div class="piece-box" style="margin-top: 20px;">

                        <div class="piece-body">
                            <div class="col-xs-12 no-padding">
                                <div class="col-xs-12 no-padding under-line border-bottom">
                                    <div class="col-xs-4">
                                        <h6>الإسم: <span class="valu">
                                              <?php if(!empty($personal_data)){  echo $personal_data[0]->employee;}?>
                                            </span></h6>
                                    </div>
                                    <div class="col-xs-4">
                                        <h6>الإدارة: <span class="valu"><?php if(!empty($personal_data)){ echo  $personal_data[0]->admin_name;}?></span></h6>
                                    </div>
                                    <div class="col-xs-4">
                                        <h6>القسم: <span class="valu"><?php if(!empty($personal_data)){ echo $personal_data[0]->depart_name;}?></span></h6>
                                    </div>
                                </div>
                                <div class="col-xs-12 no-padding under-line open_green">
                                    <div class="col-xs-4">
                                        <h6>المسمى الوظيفي<span class="valu"> <?php if(!empty($personal_data)){ echo  $personal_data[0]->degree_name;}?></span></h6>
                                    </div>
                                    <div class="col-xs-4">
                                        <h6>الرقم الوظيفي<span class="valu"><?php if(!empty($personal_data)){ echo  $personal_data[0]->emp_code;}?></span></h6>
                                    </div>
                                    <div class="col-xs-4">
                                        <h6>.......<span class="valu"></span></h6>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="piece-box no-border">
                        <div class="piece-body">
                            <div class="col-xs-12 no-padding">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="closed_green">
                                        <th>م</th>
                                        <th>الإدارة</th>
                                        <th>الموظف المسئول</th>
                                        <th>توقيعه</th>
                                        <th>ملاحظات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $a=0;

                                    foreach ($departments as $key=>$record) {
                                        if($key== 3){
                                            continue;
                                        }
                                        $a++;
                                        ?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><?php echo $record[1] ?>

                                            </td>

                                            <td>



<?php
if (isset($record[0]) && !empty($record[0])) {
foreach ($record[0] as $row) {
$select = '';
if (isset($disclaimer[$key]['responsible_emp_id'])) {
if ($disclaimer[$key]['responsible_emp_id'] == $row->id) {
echo $row->employee;
}
}
}
}
else {
echo 'لا يوجد موظف مسئول';
}
?>

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                               <?php if(isset($disclaimer[$key]['notes'])) { echo $disclaimer[$key]['notes'];} ?>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                    <?php foreach ($departments as $key=>$record) {
                                        if($key != 3){
                                            continue;
                                        }
                                        ?>
                                            <tr>
                                                <td rowspan="4"><?= ++$a ?>.</td>
                                                <td rowspan="4">إدارة الموارد البشرية الشؤون الإدارية<br>
                                                    -	شؤون الموظفين<br>
                                                    -	الخدمات المساندة</td>
                                                <td>
                                                    <?php
                                                    if (isset($record[0]) && !empty($record[0])) {
                                                        foreach ($record[0] as $row) {
                                                            $select = '';
                                                            if (isset($disclaimer[$key]['responsible_emp_id'])) {
                                                                if ($disclaimer[$key]['responsible_emp_id'] == $row->id) {
                                                                    echo $row->employee;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    else {
                                                        echo 'لا يوجد موظف مسئول';
                                                    }
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td rowspan="4">
                                                    <ul>
                                                        <li>
                                                            <h6><i class="fa fa-<?php if(isset($disclaimer[$key][0]->resignation) && $disclaimer[$key][0]->resignation ==1) { echo 'check-'; } ?>square-o" aria-hidden="true"></i> الاستقالة / طي القيد .</h6>
                                                        </li>
                                                        <li>
                                                            <h6><i class="fa fa-<?php if(isset($disclaimer[$key][0]->resignation) && $disclaimer[$key][0]->employee_card ==1) { echo 'check-'; } ?>square-o " aria-hidden="true"></i> استرداد بطاقة الموظف .</h6>
                                                        </li>
                                                        <li>
                                                            <h6><i class="fa fa-<?php if(isset($disclaimer[$key][0]->resignation) && $disclaimer[$key][0]->medical_card ==1) { echo 'check-'; } ?>square-o " aria-hidden="true"></i> استرداد بطاقة التأمين الطبي .</h6>
                                                        </li>
                                                        <li>
                                                            <h6><i class="fa fa-<?php if(isset($disclaimer[$key][0]->resignation) && $disclaimer[$key][0]->social_insurance ==1) { echo 'check-'; } ?>square-o " aria-hidden="true"></i> إيقاف التأمينات الاجتماعية .</h6>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>

                                    <?php } ?>


                                    </tbody>
                                </table>

                                <br>
                                <h5>	- يرجى الحصول على كافة ما بحوزة الموظف المذكور أعلاه من عهد ومستندات وأدوات تخص الجمعية ، وتوقيع الموظف المسئول يفيد باستلامه للعهدة من الموظف المذكور .</h5><br><br><br>

                                <h4 class="text-center">مدير عام الجمعية</h4>


                            </div>
                        </div>



                    </div>

        </section>


</div>







    <?php  ?>
    <script>
        //Get the HTML of div
        var divElements = document.getElementById("printdiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body><div id='printdiv'>" +
            divElements + "</div></body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        // document.body.innerHTML = oldPage;
        setTimeout(function () {location.replace("<?php echo base_url('human_resources/employee_forms/Disclaimer/addDisclaimer')?>");}, 1000);
    </script>







