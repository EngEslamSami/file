<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
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
    </style>




</head>
<body>



<div id="printdiv"  >
    <div class="header col-xs-12 no-padding">
        <div class="col-xs-6 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية المعاقين بحائل (هدكا)</p>
            <p>مسجلة برقم (605)</p>
            <p>تحت إشراف وزارة الشئون الإجتماعية </p>
        </div>
        <div class="col-xs-6 text-center">
         <img src="">
        </div>
    </div>
    <div class="col-xs-12 Title">
        <h5 class="text-center"><br><br> <strong>تعريف موظف</strong></h5><br>
    </div>

    <section class="main-body">
        <div class="container">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">


                    <div class="col-xs-12">
                        <table class="table table-bordered table-devices">
                            <tbody>
                            <tr>
                                <th class="gray_background" style="width: 25%;" >الإسم</th>
                                <td><?php echo $all_emp[$records['employees_id_fk']] ?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">الوظيفة</th>
                                <td> ) , تعمل في جمعية الملك عبدالعزيز الخيرية النسائية (عون) بالقصيم – بريدة , بوظيفة  <?php echo $department_jobs[$employees['department']]; ?>)</td>
                            </tr>

                            <tr>
                                <th class="gray_background" style="width: 25%;">رقم الوظيفة</th>
                                <td><?php echo $employees['id']; ?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">رقم السجل المدنى</th>
                                <td> <?php echo $employees['id_num']; ?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">إجمالى الراتب</th>
                                <td><?php echo $employees['salary']; ?> </td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">تاريخ بداية الخدمة</th>
                                <td> </td>
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

<script>
    var divElements = document.getElementById("printdiv").innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window.print();
    setTimeout(function () {location.replace("<?php echo base_url('Administrative_affairs/Definition_employee')?>");}, 100);
</script>
