<!DOCTYPE HTML>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>طلب عضويه</title>
     <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">


</head>

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
        border: 1px solid #000;
        padding-bottom: 15px;
    }
    
    .rr-list {
        display: inline-block;
        padding-left: 25px;
        padding-right: 20px;
    }
    
    .r-table {
        margin-bottom: 15px;
    }
    
    .r-table th {
        width: 20%;
        background-color: #333;
        color: #fff;
        border: 1px solid #333;
        padding: 7px 0;
        font-size: 13px;
    }
    
    .r-table td {
        border: 1px solid #333;
        padding: 7px 0;
    }

</style>
<?php
$type = array(1=>'عامل',2=>'منتسب');
?>
<body>
<div id="printdiv">
    <header class="col-xs-12">
        <div class="col-xs-4" style="padding: 0">
            <h6 class="text-center">المملكة العربية السعودية</h6>
            <h6 class="text-center"> (هتكا) الجمعية الخيرية لرعاية المعاقين بحائل</h6>
            <h6 class="text-center"> مسجل برقم <span> ( 605 ) </span></h6>
            <h6 class="text-center">تحت إشراف وزارة الشؤون الاجتماعية</h6>

        </div>
        <div class="col-xs-4"> </div>
        <div class="col-xs-4">
            <img src="img/11-57.png" alt="" class="center-block" width="100%">
        </div>
    </header>

    <div class="col-xs-12 rr-content" style="margin-top: 15px;">
        <div class="container">
            <h4 class="text-center"> نموذج طلب عضوية </h4>
            <h4 class="text-right"> نموذج رقم <span> ( 003 )</span> </h4>
            <div class="col-xs-12 r-content-print">
                <div class="col-xs-12" style="padding: 0; margin-bottom: 15px;">
                    <h5 class="text-center"><b> البيانات الشخصية </b></h5>
                    <hr style="width: 15%; border-color: #000; margin-top: 0;">
                    <div class="col-xs-6 no-padding">
                        <h5> الاسم : <span> <?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['name']; } ?> </span></h5>
                        <h5> العنوان : <span> <?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['adress']; } ?></span></h5>
                        <h5> الهاتف أو الجوال : <span> <?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['mob']; } ?></span></h5>
                    </div>
                    <div class="col-xs-6 no-padding">
                        <h5> تاريخ الميلاد : <span><?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['date_birth'] ; } ?> </span></h5>
                        <h5> المهنة : <span> <?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['job'] ; } ?>  </span></h5>
                        <h5> البريد الالكتروني : <span> <?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['email'] ; } ?>  </span></h5>
                    </div>
                </div>
                <hr style="width: 100%; border-color: #000; margin-bottom: 5px; ">
                <div class="col-xs-12 no-padding">
                    <h5 class="text-center "><b> المؤهلات العلمية </b></h5>
                    <hr style="width: 15%; border-color: #000; margin-top: 0; ">
                    <ul style="list-style: none;">
                        <!--<li class="rr-list"> <input type="radio" name="" value=""> ثانوي </li>
                        <li class="rr-list"> <input type="radio" name="" value=""> دبلوم </li>
                        <li class="rr-list"> <input type="radio" name="" value=""> بكالوريوس </li>
                        <li class="rr-list"> <input type="radio" name="" value=""> ماجستير </li>
                        <li class="rr-list"> <input type="radio" name="" value=""> دكتوراه </li>
                        -->
                        <?php 
            foreach ($degrees as  $x) { 
                $check = '';
                if(isset($sponsor) && $sponsor['scientific_qualification_id_fk'] == $x->id){
                    $check = 'checked';
                }
            ?>
                &nbsp;&nbsp;&nbsp;
                <input type="radio" name="degree" data-validation="required" onclick="getRadioType($(this).val())" value="<?=$x->id?>" <?=$check?>> <?=$x->title?>
                
            <?php } ?>
                    </ul>
                    <div class="col-xs-6 no-padding">
                        <h5> التخصص : <span><?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['specialist'] ; } ?></span></h5>
                        <h5> جهه العمل : <span><?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['work_place'] ; } ?></span></h5>
                        <h5> هاتف العمل : <span> <?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['work_mob'] ; } ?></span></h5>
                    </div>
                    <div class="col-xs-6 no-padding">
                        <h5> عنوان العمل : <span> <?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['work_adress'] ; } ?> </span></h5>
                        <h5> صندوق البريد : <span> <?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['mail_box'] ; } ?> </span></h5>
                    </div>
                </div>
                <hr style="width: 100%; border-color: #000; margin-bottom: 5px; ">
                <div class="col-xs-12 no-padding" style="padding-top: 15px; padding-bottom: 15px;">
                    <p>أتعهد في حالة قبولي عضوا بدفع رسوم الاشتراك والتقيد بكافة أحكام النظام الاساسي للجمعية وأن أساهم بشكل أيجابي ف أنشطه الجمعية</p>
                    <div class="col-xs-6">
                        <h5> حرر في : <span> ..... / ...... / ...... </span></h5>
                    </div>
                    <div class="col-xs-6">
                        <h5> التوقيع : <span> ................. </span></h5>
                    </div>
                </div>
                <hr style="width: 100%; border-color: #000; margin-bottom: 5px; ">
                <div class="col-xs-12 no-padding">
                    <h5 class="text-center "><b> للاستعمال الرسمي </b></h5>
                    <hr style="width: 15%; border-color: #000; margin-top: 0; ">
                    <h5>قررت إداره جمعية رعايه المعاقين - هتكا</h5>
                    <h5>1- قبول المتقدم عضوا : <span>  <ul style="list-style: none;  padding:0; display: inline-block">
                       <!-- <li class="rr-list"> <input type="radio" name="" value=""> عاملا </li>
                        <li class="rr-list"> <input type="radio" name="" value=""> منتسا  </li>-->
                        <?php 
            foreach ($type as  $key=>$value) { 
                $check = '';
                if(isset($sponsor) && $sponsor['membership_type'] == $key){
                    $check = 'checked';
                }
            ?>
                &nbsp;&nbsp;&nbsp;
                <input type="radio" name="type" data-validation="required" onclick="getRadioType($(this).val())" value="<?=$key?>" <?=$check?>> <?=$value?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
                        </ul>
                    </span></h5>
                    <h5>2- الموافقة علي تسجيل المتقدم بالجمعية تحت عضوية برقم : <span> <?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['membership_num'] ; } ?> </span></h5>
                    <h5>3- تبدا العضوية بتاريخ : <span> <?php if(isset($sponsor)&&!empty($sponsor)){ echo $sponsor['membership_date'] ; } ?></span>
                        <span>  <ul style="list-style: none;  padding:0; display: block">
                        <li class="rr-list" style="display: block"> <input type="radio" name="" value=""<?php if(isset($sponsor['img'])&&!empty($sponsor['img'])){?> checked="" <?php } ?>> تم إرفاق صوره من بطاقة الهوية الوطنية </li>
                        
                        </span>
                    </h5>
                    <div class="col-xs-12 no-padding" style="margin-top: 20px;">
                        <div class="col-xs-4">
                            <h5 class="text-center"><b>  الامين العام </b></h5>
                            <h5 class="text-center"> وليد بن محمد بكر</h5>
                        </div>
                        <div class="col-xs-4">

                        </div>
                        <div class="col-xs-4">
                            <h5 class="text-center"><b>  رئيس مجلس الادارة  </b></h5>
                            <h5 class="text-center"> خالد بن علي السيف</h5>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    </div>

</body>

</html>


<script>
    var divElements = document.getElementById("printdiv").innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window.print();
    setTimeout(function () {location.replace("<?php echo base_url('assembley_members/member')?>");}, 500);
</script>

