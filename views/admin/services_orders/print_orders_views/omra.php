
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


    <?php
    echo "<pre>";
    print_r($table);
    echo "</pre>";
    ?>



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
                                <td>خدمات العمرة</td>
                                <th>رقم الجوال :</th>
                                <td><?=$table[0]->member_name['m_mob']?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <?php
                        if ($table != '' && $table != null && !empty($table)) {?>
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
                                <td> خدمات العمرة</td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">إسم المستفيدين</th>
                                <td><?php if(!empty($table[0]->sub))
                                        $i=1;
                                        foreach ($table[0]->sub as $names){
                                            echo $i."-". $names->member_full_name."</br>";
                                            $i++;
                                        } ?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">العلاقة</th>
                                <td><?=$table[0]->relation?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">اسم المحرم</th>
                                <td><?=$table[0]->name?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">تاريخ الميلاد</th>
                                <td><?=$table[0]->birth_date?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" style="width: 25%;">العمرة لاول مرة</th>
                                <td><?php if($table[0]->frist_haj_omra == 1){
                                        echo "نعم ";
                                    }elseif($table[0]->frist_haj_omra == 2){
                                        echo "لا";
                                    }?></td>
                            </tr>
                            </tbody>
                        </table>
                        <?php  }?>
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


