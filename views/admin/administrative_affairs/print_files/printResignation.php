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
            text-align: center;
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
    </style>
</head>
<body>



<div id="printdiv"   >
    <div class="header col-xs-12 no-padding">
        <div class="col-xs-6 text-center">
            <p>المملكة العربية السعودية</p>
            <p>جمعية بناء</p>
    
            <p>تحت إشراف وزارة الشئون الإجتماعية </p>
        </div>
        <div class="col-xs-6 text-center">
            <img src="<?php echo base_url()?>asisst/admin_asset/img/hedca.png">
        </div>
    </div>
    <div class="col-xs-12 Title">
        <h5 class="text-center"><br><br> <strong>طلب إستقالة</strong></h5><br>
    </div>

    <section class="main-body">
        <div class="container">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">
                    <div class="col-xs-6">
                        <p><strong>إسم الموظف :</strong> <?php echo$result[0]->emp_name['employee'];?> </p>
                    </div>
                    <div class="col-xs-6">
                        <p><strong>مسمى الوظيفة :</strong> ................</p>
                    </div>
                    <div class="col-xs-6">
                        <p><strong>رقم الهوية :</strong> <?php echo$result[0]->emp_name['id_num'];?> </p>
                    </div>
                    <div class="col-xs-6">
                        <p><strong>تاريخ الألحاق بالعمل  :    /   /   / 143هـ</strong> </p>
                    </div>
                    <div class="col-xs-12">
                        <br><br>
                        <p><strong>سعادة المحترم /</strong> <br> السلام عليكم ورحمة الله وبركاته ,,,  </p>
                        <hr>
                        <p>ألم الموافقة على استقالتى من وظيفتى , وذلك اعتباراَ من تاريخ : رقم الهوية :</strong> <?php echo date('Y/m/d',$result[0]->emp_name['date']);?>   <br>للأسباب التالية : </p>
                        <p><?php echo $result[0]->reason;?></p>
                    </div>
                    <div class="col-xs-6">
                        <p><strong>توقيع الموظف :</strong> <?php echo$result[0]->emp_name['employee'];?> </p>
                    </div>
                    <div class="col-xs-6">
                        <p><strong>التاريخ  : </strong>   <?php echo date('Y/m/d',$result[0]->emp_name['date']);?>  </p>
                    </div>
                    <div class="col-xs-12">
                        <h5><strong> لامانع لدينا من قبول استقالة الموظف </strong>  </h5>
                    </div>
                </div>
                <div class="special col-xs-12 ">
                    <br><br>
                    <div class="col-xs-4 text-center">
                    </div>
                    <div class="col-xs-4 text-center">
                    </div>
                    <div class="col-xs-4 text-center">
                        <label> المدير التنفيذى </label><br><br>
                        <p>-------------</p><br>
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
    setTimeout(function () {location.replace("<?php echo base_url('Administrative_affairs/addResignation')?>");}, 0);
</script>
