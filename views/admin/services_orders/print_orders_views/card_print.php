<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">




    <style type="text/css">
        .print_forma{
            border:1px solid ;
            padding: 15px;
        }
        .print_forma table th{
            text-align: right;
        }
        .print_forma table tr th{
            vertical-align: middle;
        }
        .body_forma{
            margin-top: 40px;
        }
        .no-padding{
            padding: 0;
        }
        .heading{
            font-weight: bold;
            text-decoration: underline;
        }
        .print_forma hr{
            border-top: 1px solid #000;
            margin-top: 7px;
            margin-bottom: 7px;
        }

        .myinput.large{
            height:22px;
            width: 22px;
        }

        .myinput.large[type="checkbox"]:before{
            width: 20px;
            height: 20px;
        }
        .myinput.large[type="checkbox"]:after{
            top: -20px;
            width: 16px;
            height: 16px;
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
            width: 50%;
            min-height: 20px
        }
        .gray_background{
            background-color: #eee;

        }
        table.th-no-border th,
        table.th-no-border td
        {
            border-top: 0 !important;
        }
    </style>


</head>
<body>
<div id="printdiv<?php echo $row[0]->id;?>">
<div class="header col-xs-12 no-padding">
    <div class="col-xs-4 text-center">
        <p>المملكة العربية السعودية</p>
        <p>الجمعية الخيرية لرعاية الأيتام ببريدة (أبناء)</p>
        <p>مسجلة بوزارة العمل والتنمية الإجتماعية تصريح رقم 463</p>
        <p>تحت إشراف وزارة الشئون الإجتماعية </p>
    </div>
    <div class="col-xs-4 text-center">
        <img src="<?php echo base_url()?>asisst/admin_asset/img/logo.png">
    </div>
    <div class="col-xs-4 text-center">
        <p>المملكة العربية السعودية</p>
        <p>الجمعية الخيرية لرعاية الأيتام ببريدة (أبناء)</p>
        <p>مسجلة بوزارة العمل والتنمية الإجتماعية تصريح رقم 463</p>
        <p>تحت إشراف وزارة الشئون الإجتماعية </p>
    </div>
</div>
<div class="col-xs-12 Title">
    <h5 class="text-center"><br><br> <strong>نموذج طلب خدمة لمستفيد</strong></h5><br>
</div>
<?php
$type = array(1 => 'تالف', 2 => 'مفقود', 3 => 'تجديد', 4 => 'تغيير رقم سري', 5 => 'إصدار');
?>
<section class="main-body">
    <div class="container">
        <div class="print_forma no-border col-xs-12 no-padding">
            <div class="personality">

                <div class="col-xs-12">
                    <table class="table th-no-border">
                        <tbody>
                        <tr>
                            <th>إسم المستفيد :</th>
                            <td><?php echo $row[0]->name;?></td>
                            <th>رقم الهوية :</th>
                            <td><?php echo $row[0]->num;?></td>
                        </tr>
                        <tr>
                            <th>فئة الخدمة :</th>
                            <td>معالجه البطاقه الالكترونيه</td>
                            <th>رقم الجوال :</th>
                            <td><?php echo $row[0]->mob;?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table class="table table-bordered table-devices">
                        <tbody>
                        <tr>
                            <th class="gray_background" style="width: 25%;" >رقم الاسره</th>
                            <td><?php echo $row[0]->mother_national_id_fk;?></td>
                        </tr>
                        <tr>
                            <th class="gray_background" style="width: 25%;"> فئه الخدمه</th>
                            <td>معالجه البطاقه الالكترونيه</td>
                        </tr>

                        <tr>
                            <th class="gray_background" style="width: 25%;"> رقم الهويه</th>
                            <td><?php echo $row[0]->national_id;?></td>
                        </tr>
                        <tr>
                            <th class="gray_background" style="width: 25%;">نوع خدمه البطاقه </th>
                            <td><?=$type[$row[0]->card_service_type]?></td>
                        </tr>


                        </tbody>
                    </table>

                    <br><br>
                    <p>السادة المحترمين / إلى من يهمه الأمر  </p>
                    <p>السلام عليكم ورحمة الله وبركاته ,,, <br><br></p>

                    <p>نفيدكم بأن الموضحة بياناتها أعلاه هى أحد موظفات الجمعية على رأس العمل حتى تاريخه , وق أعطة هذا التعريف بناء على طلبه دون أدنى مسئولية .</p>

                </div>



            </div>





            <div class="special col-xs-12 ">
                <br><br>

                <div class="col-xs-4 text-center">
                    <label> الختم </label><br><br>
                </div>
                <div class="col-xs-4 text-center">

                </div>
                <div class="col-xs-4 text-center">

                    <label>المدير المالى </label><br><br>
                    <p>عثمان بن عمر المشعلى</p><br>
                </div>
                <br><br>

            </div>






        </div>
    </div>
</section>


</div>








<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>

</body>
</html>
<script>
    var divElements = document.getElementById("printdiv<?php echo $row[0]->id;?>").innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window.print();
    setTimeout(function () {location.replace("<?php echo base_url('services_orders/Services_orders')?>");}, 500);
</script>