<!DOCTYPE HTML>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title> page</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">


</head>

<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;

        window.location = "<?php echo base_url('disability_managers/Disability_manage/add_disabilities_persons'); ?>";

    }
</script>


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
        padding-left: 45px;
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

<body onload="return printDiv('printdiv')" id="printdiv">
    <header class="col-xs-12">
        <div class="col-xs-4" style="padding: 0">
            <h6 class="text-center">المملكة العربية السعودية</h6>
            <h6 class="text-center"> (هتكا) الجمعية الخيرية لرعاية المعاقين بحائل</h6>
            <h6 class="text-center"> مسجل برقم <span> ( 605 ) </span></h6>
            <h6 class="text-center">تحت إشراف وزارة الشؤون الاجتماعية</h6>

        </div>
        <div class="col-xs-4"> </div>
        <div class="col-xs-4">
            <img src="<?php echo base_url()?>asisst/admin_asset/img/11-57.png" alt="" class="center-block" width="100%">
        </div>
    </header>

    <div class="col-xs-12 rr-content" style="margin-top: 15px;">
        <div class="container">
            <h4 class="text-center"> نموذج تسجيل مستفيد لدي الجمعية </h4>
            <h4 class="text-right"> نموذج رقم <span> ( <?=$result['p_num']?> )</span> </h4>
            <div class="col-xs-12 r-content-print">
                <div class="col-xs-12" style="padding: 0; margin-bottom: 15px;">
                    <h5 class="text-center"> البيانات الشخصية </h5>
                    <hr style="width: 15%; border-color: #000; margin-top: 0;">
                    <div class="col-xs-6 no-padding">
                        <h5> الاسم : <span> <?=$result['p_name']?> </span></h5>
                        <h5> العنوان : <span> <?=$result['p_address']?></span></h5>
                        <h5> السجل المدني : <span> <?=$result['p_national_num']?></span></h5>
                    </div>
                    <div class="col-xs-6 no-padding">
                        <h5> تاريخ الميلاد : <span><?=$result['p_date_birth']?></span></h5>
                        <h5> الهاتف أو الجوال : <span><?=$result['p_mob']?></span></h5>
                        <h5> رقم المستفيد : <span><?=$result['p_num']?> </span> ( الشؤون الاجتماعية )</h5>
                    </div>
                </div>
                <hr style="width: 100%; border-color: #000; margin-bottom: 5px; ">
                <div class="col-xs-12 no-padding">
                    <h5 class="text-center "> بيانات الاعاقة </h5>
                    <hr style="width: 15%; border-color: #000; margin-top: 0; ">
                    <ul style="list-style: none;">
                        
                        <?php if(!empty($types)):
                foreach ($types as $record):
                $sel ='';
                if($result['disability_type_id_fk'] == $record->id){
                   $sel ='checked="checked"';
                }
                ?>
              <li class="rr-list"> <input type="radio"  name="" value="" <?=$sel?> > <?php echo $record->title;?> </li>
               <?php endforeach; endif;?>
                    </ul>
                <?php 
            if($result['disability_type_id_fk'] == 1){ ?>
                <div class="col-xs-4 no-padding">
                        <h5>إثبات حالة : <span> <?=$result['proof_status']?> </span></h5>
                    </div>
                   <div class="col-xs-4 no-padding">
                        <h5> إحالة للمستشفي : <span> <?=$result['referral_to_hospital']?> </span></h5>
                    </div>
                     <div class="col-xs-4 no-padding">
                        <h5> إحالة للمركز : <span> <?=$result['referral_to_center']?></span></h5>
                    </div>
             <?php }else{ ?>
                
                 <div class="col-xs-4 no-padding">
                        <h5> درجه الاعاقة : <span> <?=$result['disability_degree']?> </span></h5>
                    </div>
                    <div class="col-xs-8 no-padding">
                        <h5> هل تستخدم اجهزه مساعدة : <span>  <ul style="list-style: none;  padding:0; display: inline-block">
                       
                              <?php
                     $check='';
                     if($result['use_devices'] == 1){
                        $check='checked="checked"';
                     }
                      $check2='';
                     if($result['use_devices'] == 2){
                        $check2='checked="checked"';
                     }
                     
                      ?>
                    
                     
                        <li class="rr-list"> <input type="radio" <?=$check?> name="" value=""> نعم </li>
                        <li class="rr-list"> <input type="radio" <?=$check2?> name="" value=""> لا </li>
                        </ul>
                    </span></h5>
                    </div>
                    <?php if($result['use_devices'] == 1){ ?>
                        <h5> إذا كان الجواب نعم أذكرها <span><?=$result['use_devices_details']?></span></h5>
                    <?php }else{ ?>
                        <h5> إذا كان الجواب نعم أذكرها <span> ................ </span></h5>
                 <?php   }
                  ?>
                    
                    <h5> هل انت مسجل لدي جمعية اخري : <span>  <ul style="list-style: none; padding:0; display: inline-block">
                       
                       <?php
                     $check3='';
                     if($result['be_in_another_society'] == 1){
                        $check3='checked="checked"';
                     }
                      $check4='';
                     if($result['be_in_another_society'] == 2){
                        $check4='checked="checked"';
                     }
                     
                      ?>
                        <li class="rr-list"> <input type="radio" <?=$check3?> name="" value=""> نعم </li>
                        <li class="rr-list"> <input type="radio" <?=$check4?> name="" value=""> لا </li>
                        </ul>
                    </span></h5>
                     <?php if($result['be_in_another_society'] == 1){ ?>
                             <h5> إذا كان الجواب نعم أذكرها <span> <?=$result['society_name']?></span></h5> 
                    <?php }else{?>
                             <h5> إذا كان الجواب نعم أذكرها <span> ................ </span></h5> 
                    <?php }?>
              
          <?php  } ?>    
                    
                   
                </div>
                <hr style="width: 100%; border-color: #000; margin-bottom: 5px; ">
                <div class="col-xs-12 no-padding">
                    <h5 class="text-center "> وسيلة الاتصال </h5>
                    <hr style="width: 15%; border-color: #000; margin-top: 0; ">
                    <table class="r-table" style="width:100%">
                        <tr>
                            <th class="text-center">جوال</th>
                            <th class="text-center">هاتف</th>
                            <th class="text-center">جوال ولي الامر</th>
                            <th class="text-center">إسم ولي الامر</th>
                            <th class="text-center">البريد الالكتروني </th>
                        </tr>
                        <tr>
                            <td class="text-center"><?=$result['contact_mob']?></td>
                            <td class="text-center"><?=$result['contact_phone']?></td>
                            <td class="text-center"><?=$result['contact_father_mob']?></td>
                            <td class="text-center"><?=$result['contact_father_name']?></td>
                            <td class="text-center"><?=$result['contact_email']?></td>
                        </tr>

                    </table>
                </div>
                <hr style="width: 100%; border-color: #000; margin-bottom: 5px; ">
                <div class="col-xs-12 no-padding">
                    <h5 class="text-center "> للاستعمال الرسمي </h5>
                    <hr style="width: 15%; border-color: #000; margin-top: 0; ">
                    <h5>تم التأكد من هوية المتقدم : <span>  <ul style="list-style: none;  padding:0; display: inline-block">
                      
                       <?php
                     $checkk3='';
                     if($result['scientific_qualitication'] == 1){
                        $checkk3='checked="checked"';
                     }
                      $checkk4='';
                     if($result['scientific_qualitication'] == 2){
                        $checkk4='checked="checked"';
                     }
                     
                      ?>
                        <li class="rr-list"> <input type="radio" <?=$checkk3?> name="" value=""> مؤهل </li>
                        <li class="rr-list"> <input type="radio" <?=$checkk4?> name="" value=""> غير مؤهل </li>
                        </ul>
                    </span></h5>
                    <h5> تم تسجيل المتقدم لدي الجمعية بالرقم : <span> ......................... </span></h5>
                    <h5> تاريخ تسجيل المستفيد : <span> ......................... </span></h5>
                    <div class="col-xs-12 no-padding" style="margin-top: 20px;">
                        <div class="col-xs-4">
                            <h5 class="text-center"><b> الاخصائي الاجتماعي </b></h5>
                            <h5 class="text-center">عبد الكريم بن عبد الرحمن الفايز</h5>
                        </div>
                        <div class="col-xs-4">
                            <h5 class="text-center"><b> معتمد صحة البيانات </b></h5>
                            <h5 class="text-center"> عثمان بن عمر المشعلي</h5>
                        </div>
                        <div class="col-xs-4">
                            <h5 class="text-center"><b> إعتماد المدير العام </b></h5>
                            <h5 class="text-center"> وليد بن محمد البكر</h5>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js "></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js "></script>

</body>

</html>
