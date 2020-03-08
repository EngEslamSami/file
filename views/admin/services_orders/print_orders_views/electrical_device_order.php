
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css" >
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/style.css" >


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






<div id = "printdiv" >
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
        <h5 class="text-center"><br><br> <strong>تفاصيل الخدمة</strong></h5><br>
    </div>

    <section class="main-body">
        <div class="container">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">
                    <div class="col-xs-12">
                        <table class="table th-no-border">
                            <tbody>
                            <tr>
                                <th>إسم المستفيد :</th>
                                <td><?=$table[0]->member_name['full_name']?></td>
                                <th>رقم الهوية :</th>
                                <td><?=$table[0]->member_name['mother_national_num_fk']?></td>
                            </tr>
                            <tr>
                                <th>فئة الخدمة :</th>
                                <td>الأجهزة الكهربائية</td>
                                <th>رقم الجوال :</th>
                                <td><?=$table[0]->member_name['m_mob']?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <?php
                        if ($table != '' && $table != null && !empty($table)) {
                       ?>
                        <table class="table table-bordered table-devices">
                            <tbody>
                            <tr>
                                <th class="gray_background" style="width: 25%;" >رقم الأسرة</th>
                                <td><?php echo $table[0]->mother_national_id_fk;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">فئة الخدمة</th>
                                <td>خدمات عامة</td>
                            </tr>

                            <tr>
                                <th class="gray_background" style="width: 25%;"> نوع الخدمة</th>
                                <td>الأجهزة الكهربائية</td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">نوع الجهاز</th>
                                <td><?=$table[0]->device_name?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">العدد</th>
                                <td><?=$table[0]->number?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">ملاحظات</th>
                                <td><?=$table[0]->notes?> </td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">صورة الجهاز</th>
                                <td><img id="blah" src="<?=base_url('uploads/images/'.$table[0]->img)?>" class="img-rounded" style="width: 17%;"></td>
                            </tr>
                            </tbody>
                        </table>
                        <?php   }?>
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







</div >

    <script >
        var divElements = document . getElementById("printdiv") . innerHTML;
        var oldPage = document . body . innerHTML;
        document . body . innerHTML =
            "<html><head><title></title></head><body><div id='printdiv'>" +
            divElements + "</div></body>";
        window .print();
        setTimeout(function () {
            window . location . href = "<?php echo base_url('services_orders/Services_orders') ?>";
        }, 500);
    </script >


