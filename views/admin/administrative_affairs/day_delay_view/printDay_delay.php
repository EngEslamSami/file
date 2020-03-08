<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .no-padding {
            padding: 0;
        }

        .rr-content {
            min-height: 700px;
        }

        .rr-content h4 {
            font-weight: bold;
        }

        .r-content-print {
            padding-top: 35px;
            padding-bottom: 15px;
        }

        .r-table {
            margin-top: 25px;
            margin-bottom: 15px;
            border: 1px solid #333;
        }

        .r-table th {
            width: 20%;
            background-color: #eee;
            color: #000;
            border: 1px solid #333;
            padding: 7px 0;
            font-size: 13px;
        }

        .r-table td {
            border-left: 1px solid #333;
            padding: 25px 0;
        }

    </style>

</head>
<body>



<div id="printdiv"   >
    <header class="col-xs-12">
        <div class="col-xs-4" style="padding: 0">
            <h6 class="text-center">المملكة العربية السعودية</h6>
            <h6 class="text-center"> الجمعية الخيرية لرعاية المعاقين بحائل (هتكا)</h6>
            <h6 class="text-center"> مسجل برقم <span> ( 605 ) </span></h6>
            <h6 class="text-center"> وزاره العدل والتنمية الاجتماعية</h6>
        </div>
        <div class="col-xs-4"> </div>
        <div class="col-xs-4">
            <span class="logo-mini">
           <img src="<?php echo base_url()?>asisst/fav/logo.png" alt="">
       </span>
     
        </div>
    </header>
    <hr style="width: 90%; border-color: #000; margin-top: 0; ">

    <div class="col-xs-12 rr-content" style="margin-top: 15px;">
        <div class="container">
            <h4 class="text-center"> (( مسألة تأخير )) </h4>
            <div class="col-xs-12 r-content-print">
                <div class="container">
                    <div class="col-xs-12">
                        <h6 class="pull-left"><b> الاستاذ-ة / <?php if ($emp_data['employee'] != '' && $emp_data['employee'] != null && !empty($emp_data['employee'])) {
                                echo $emp_data['employee']; }?></b></h6>
                        <h6 class="pull-right"><b>المحترم ,, </b></h6>
                    </div>
                    <div class="col-xs-12">
                        <h6 class="pull-left"><b>السلام عليكم ورحمة الله وبركاته </b></h6>
                        <h6 class="pull-right" style="padding-left: 20px;"><b> وبعد </b></h6>
                    </div>
                    <div class="col-xs-12" style="margin-top: 25px;">
                        <p>تأخرتم عن الحضور في الايام التالية نأمل منكم افادتنا عن أسباب تأخيركم</p>
                        <?php if ($result != '' && $result != null && !empty($result)) {?>
                        <table class="r-table" style="width:100%">
                            <tr>

                                <th class="text-center">التاريخ</th>
                                <th class="text-center">وقت الحضور</th>
                                <th class="text-center">سبب التاخير</th>
                            </tr>
                            <?php
                            $reasons =array();
                            foreach ($result as $record){ $reasons[]=$record->reason;?>
                            <tr>
                                <td class="text-center"><?php echo$record->day; ?> </td>
                                <td class="text-center"><?php echo$record->time; ?> </td>
                                <td class="text-center"><?php echo$record->reason; ?> </td>
                            </tr>
                            <?php } ?>
                        </table>
                        <?php } ?>
                    </div>
                    <div class="col-xs-12">
                        <h4>أفيدكم عن أسباب التاخير : </h4>
                        <h6>
                            <?php
                                if(!empty($reasons)){
                                    echo implode("<br>",$reasons);
                                }?></h6>
                        <h6 style="margin-top: 35px; line-height: 25px;"> <b>تم الاطلاع ونأمل منكم الالتزام بأوقات العمل الرسمية وعدم  تكرار ذلك حتي لا يتم تطبيق العقوبة حسب أنظمة لائحة الجزاءات </b></h6>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-9"></div>
                        <div class="col-xs-3">
                            <h6><b> مدير الشؤون الادارية </b></h6>
                            <h6><b> توقيع : </b></h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>





</div>

<script>
    var divElements = document.getElementById("printdiv").innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window.print();
    setTimeout(function () {location.replace("<?php echo base_url('Administrative_affairs/addDay_delay')?>");}, 5000);
</script>
