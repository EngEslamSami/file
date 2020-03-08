
    <link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/style.css">




   <!-- <style type="text/css">
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

            min-height: 20px
        }
        .gray_background{
            background-color: #eee;

        }
        table.th-no-border th،
        table.th-no-border td
        {
            border-top: 0 !important;
        }
    </style>-->
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

            min-height: 20px
        }
        .gray_background{
            background-color: #000;
            color: #fff;

        }
        table.th-no-border th,
        table.th-no-border td
        {
            border-top: 0 !important;
        }
        .allpad-12{
            padding: 20px 0 20px 0;
        }
        .fhelvetic{
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        }
    </style>





    <div id="printdiv">
        <!--
<section class="main-body">
    <div class="container">
        <div class="print_forma no-border col-xs-12 no-padding">
            <div class="personality">
                <h5>سعادة / مدير المؤسسة العامة للتأمينات الإجتماعية بمنطقة القصيم   &nbsp  &nbsp  &nbsp سلمه الله </h5>
                <h6>السلام عليكم ورحمة الله وبركاتة ، وبعد :  </h6>

                <div class="col-xs-12 no-padding">
                    <table class="table table-bordered table-devices">
                        <thead>
                        <tr>
                            <th class="gray_background">الإسم</th>
                            <th class="gray_background">رقم السجل المدنى</th>
                            <th class="gray_background">رقم الحفيظة</th>
                            <th class="gray_background">مكان الإصدار</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if(isset($records)&&!empty($records)){

                        foreach ($records as $row){?>


                        <tr >
                            <td ><?php if(isset($row->full_name[0]->full_name)){ echo  $row->full_name[0]->full_name; } else{ echo  $row->full_name[0]->member_full_name;   }?></td>
                        <td> <?php echo $this->uri->segment(4); ?></td>
                        <td> <?php echo $row->person_national_num; ?></td>
                        <td> <?php echo $row->full_name[0]->dest_card;?></td>


                        </tr>
                        <?php
                        }
                        }
                        ?>
                        </tbody>
                    </table>
                    <br>

                    <h6>تقدمت لنا الموضحة بياناتها أعلاه وذلك للإستفادة من خدمات الجمعية ، وحيث أنه من الضرورى معرفة مصادر الدخل المختلفة للأسرة ، لذا نأمل منكم التكرم بالإفادة عن البيانات  المسجلة لديكم عن طريق تعبئة الخانات المدونة أسفل الصفحة . </h6>
                    <br>

                    <h6 class="text-center">ولكم منا جزيل الشكر والامتنان ،،، <br> والسلام عليكم ورحمة الله وبركاته ،،،</h6>



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

                    <label>مدير عام الجمعية </label><br>
                    <p>سلطان بن محمد الجاسر</p><br>
                </div>
                <br><br>

            </div>
            <div class="print_forma  col-xs-12 ">
                <div class="personality">
                    <h5>سعادة / مدير الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  &nbsp  &nbsp  &nbsp سلمه الله </h5>
                    <h6>السلام عليكم ورحمة الله وبركاتة ، وبعد :  </h6>

                    <div class="col-xs-12 no-padding">
                        <h6>بناء على ما ورد لنا بشأن الإستفسار عن مصادر الدخل  للموضح اسمها أعلاه ، وبعد الرجوع لسجلات التأمينات نفيدكم بأنها : </h6>
                        <br>

                        <ul class="list-unstyled">
                            <?php  /*
                            if(isset($option_letter)&&!empty($option_letter)){

                                foreach ($option_letter as $row){


                                    ?>
                                    <li class="checkbox">
                                        <label>
                                            <input type="checkbox"  value="<?php echo $row->id;?>" <?php if($row->id==$option){ ?> checked="checked" <?php } ?> >
                                            <?php echo $row->title; ?> <?php if($option==$row->id &&$option==8){ ?> وقدره ()<?php }?>
                                        </label>
                                    </li>
                                <?php }

                            } */?>




                        </ul>
                        <br>


                        <h6 class="text-center">تقبلوا بالغ تحياتنا ،،، <br> والسلام عليكم ورحمة الله وبركاته ،،،<br></h6>



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

                        <label>مدير مكتب المؤسسة العامة للتأمينات الإجتماعية بالقصيم </label><br>
                        <p></p><br>
                    </div>
                    <br><br>

                </div>

            </div>
        </div>


    </div>
</section>
-->

        <section class="main-body">
            <div class="container">
                <div class="print_forma no-border col-xs-12 allpad-12">
                    <div class="personality">
                        <h4 class="fhelvetic">سعادة / مدير مكتب المؤسسة العامة للتقاعد ببريدة        &nbsp  &nbsp  &nbsp سلمه الله </h4>
                        <h5 class="fhelvetic">السلام عليكم ورحمة الله وبركاتة ، وبعد :  </h5>

                        <div class="col-xs-12 no-padding">
                            <table class="table table-bordered table-devices">
                                <thead>
                                <tr>
                                    <th class="gray_background">الإسم</th>
                                    <th class="gray_background">رقم السجل المدنى</th>
                                    <th class="gray_background">رقم الحفيظة</th>
                                    <th class="gray_background">مكان الإصدار</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                if(isset($records)&&!empty($records)){

                                    foreach ($records as $row){?>


                                        <tr >
                                            <td ><?php if(isset($row->full_name[0]->full_name)){ echo  $row->full_name[0]->full_name; } else{ echo  $row->full_name[0]->member_full_name;   }?></td>
                                            <td> <?php echo $this->uri->segment(4); ?></td>
                                            <td> <?php /*echo $row->person_national_num; */?></td>
                                            <td> <?php echo $row->full_name[0]->dest_card;?></td>


                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                            <br>
                            <?php if($letter_type ==1){ ?>

                                <h4 class="fhelvetic">حيث تقدم إلينا المذكورة بياناتها أعلاه للإستفادة من خدمات الجمعية لذا نأمل من سعادتكم توضيح أحوالها من حيث الزواج أو عدمه حسب البيانات المسجلة لديكم حتى تاريخه ، كما نأمل من سعادتكم التكرم بتزويدنا ببرنت كامل عن أحوالها . </h4>

                            <?php }elseif ($letter_type ==2 || $letter_type ==3){ ?>
                                <h4 class="fhelvetic">تقدمت لنا ورثة الموضحة بياناته أعلاه وذلك للإستفادة من خدمات الجمعية ، وحيث أنه من الضرورى معرفة مصادر الدخل المختلفة للأسرة ، لذا نأمل منكم التكرم بالإفادة عن بيانات المتوفى المسجلة لديكم عن طريق تعبئة الخانات المدونة أسفل الصفحة . </h4>

                            <?php }elseif ($letter_type ==4){ ?>

                                <h4 class="fhelvetic">تقدم لنا الموضحة بياناته أعلاه وذلك للاستفادة من خدمات الجمعية ، وحيث أنه من الضروري معرفة دخل الأسرة ، لذا نأمل منكم التكرم بالإفادة من بياناته المسجلة لديكم عن طريق تعبئة الخانات المدونة أسفل الصفحة . </h4>

                            <?php } ?>
                           
                            <br>

                            <h6 class="text-center">ولكم منا جزيل الشكر والامتنان ،،، <br> والسلام عليكم ورحمة الله وبركاته ،،،</h6>



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

                            <label>مدير عام الجمعية </label><br>
                            <h5>سلطان بن محمد الجاسر</h5><br>
                        </div>
                        <br><br>

                    </div>
                </div>
                <?php
                if($letter_type != 1  && $letter_type < 4){ ?>
                <div class="print_forma  col-xs-12 ">
                    <div class="personality">
                        <h4 class="fhelvetic" >سعادة / مدير الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  &nbsp  &nbsp  &nbsp سلمه الله </h4>
                        <h5 class="fhelvetic">السلام عليكم ورحمة الله وبركاتة ، وبعد :  </h5>

                        <div class="col-xs-12 no-padding">
                            <h4 class="fhelvetic">بناء على ما ورد لنا بشأن الاستفسار عن مصادر دخل ورثة المتوفى الموضح اسمه أعلاه ، وبعد الرجوع لسجلات المتقاعدين نفيدكم بأنه : </h4>
                            <br>

                            <!--<ul class="list-unstyled">
                                <li class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        خاضع لنظام التقاعد ، ويصرف للورثة وعددهم (&nbsp  &nbsp  ) راتب شهري وقدره ( &nbsp  &nbsp   ) ريال.   .
                                    </label>
                                </li>
                                <li class="checkbox">
                                    <label>
                                        <input type="checkbox" value="">
                                        غير مسجل بمؤسسة التقاعد  .
                                    </label>
                                </li>



                            </ul>
                            <br>-->


                            <h6 class="text-center">تقبلوا بالغ تحياتنا ،،، <br> والسلام عليكم ورحمة الله وبركاته ،،،<br></h6>



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

                            <label>مدير مكتب المؤسسة العامة للتقاعد ببريدة </label><br>
                            <p></p><br>
                        </div>
                        <br><br>

                    </div>

                </div>

                <?php } ?>

                <?php if($letter_type == 4){?>

                    <div class="print_forma no-border col-xs-12 no-padding ">
                        <div class="personality">
                            <h4 class="fhelvetic">سعادة / مدير الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  &nbsp  &nbsp  &nbsp سلمه الله </h4>
                            <h5 class="fhelvetic">السلام عليكم ورحمة الله وبركاتة ، وبعد :  </h5>

                            <div class="col-xs-12 no-padding">
                                <h4 class="fhelvetic">بناء على ما ورد لنا بشأن الاستفسار عن مصادر دخل الموضح اسمها أعلاه ، وبعد الرجوع لسجلات المستفيدين نفيدكم بالبيانات التالية : </h4>
                                <br>

                                <table class="table table-bordered table-devices">
                                    <thead>
                                    <tr>
                                        <th class="gray_background">م</th>
                                        <th class="gray_background">نوع الدعم</th>
                                        <th class="gray_background">المبلغ</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="gray_background">1</td>
                                        <td> بدل غلاء معيشة </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="gray_background">2</td>
                                        <td> دعم الغذاء </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="gray_background">3</td>
                                        <td>دعم الكهرباء </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="gray_background">4</td>
                                        <td>معاش الضمان لعدد (    &nbsp  &nbsp     ) أفراد شامل الاسم أعلاه </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="gray_background">5</td>
                                        <td>المجموع </td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <br>


                                <h6 class="text-center">ولكم من بالغ تحياتنا ،،،  <br> والسلام عليكم ورحمة الله وبركاته ،،،<br></h6>



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

                                <label>مدير الضمان الاجتماعي بمدينة بريدة </label><br>
                                <p></p><br>
                            </div>
                            <br><br>

                        </div>

                    </div>


                <?php } ?>
            </div>
        </section>


    </div>


    
    <script >
        var divElements = document . getElementById("printdiv") . innerHTML;
        var oldPage = document . body . innerHTML;
        document . body . innerHTML =
            "<html><head><title></title></head><body><div id='printdiv'>" +
            divElements + "</div></body>";
        window .print();
        setTimeout(function () {
            window.location.href ="<?php echo base_url();?>family_controllers/Family_letter/<?php echo $func;?>/<?php echo $this->uri->segment(4);?>/<?php echo $letter_type;?> ";
        }, 1000);
    </script >


