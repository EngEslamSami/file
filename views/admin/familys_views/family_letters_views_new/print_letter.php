
    <link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/style.css">




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
            background-color: #eee;

        }
        table.th-no-border th،
        table.th-no-border td
        {
            border-top: 0 !important;
        }
    </style>




<div id="printdiv">
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

</div>


    
    <script >
        var divElements = document . getElementById("printdiv") . innerHTML;
        var oldPage = document . body . innerHTML;
        document . body . innerHTML =
            "<html><head><title></title></head><body><div id='printdiv'>" +
            divElements + "</div></body>";
        window .print();
        setTimeout(function () {
            window.location.href ="<?php echo base_url();?>family_controllers/Family_letter/<?php echo $func;?>/<?php echo $this->uri->segment(4);?> ";
        }, 1000);
    </script >


