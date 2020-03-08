<head>
    <link rel="stylesheet" type="text/css" href="<?=base_url().'asisst/admin_asset/'?>css/bootstrap-arabic.min.css">
    <link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url().'asisst/admin_asset/'?>css/style.css">
<head>

<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        /*
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

        window.location = "<?=base_url('family_controllers/Family/AddNewRegister'); ?>";
*/
    }
</script>

<body onload="return printDiv('printdiv')" id="printdiv">

    <div class="col-xs-12" style="padding: 0">
        <div class="container">
         <!--   <h4 class="text-center" style="margin-top: 10px;"> بسم الله الرحمن الرحيم</h4> -->
            <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 20px">
                <div class="col-xs-5 text-left">
                  <!--  <h5>المملكة العربية السعودية</h5>
                    <h5>القصيم - بريدة  </h5>
                    <h5><b>الجميعة الخيرية لرعاية الأيتام - أبناء  </b></h5>
                  -->
                </div>
                <div class="col-xs-2">
               <!--  
                    <img src="<?=base_url().'asisst/admin_asset/img/logo.png'?>" alt="" width="180px" class=" center-block">
               -->
                </div>
                <div class="col-xs-5" style=" margin-top: 30px;">
                    <h5 class="text-right">التاريــــــخ : <?=date('Y-m-d')?>م</h5>
                </div>
            </div>
        </div>
    </div>


<?php
//echo $family->father_name;
//echo $family['father_name'];
/*
echo'<pre>';
print_r($family);
*/
 ?>


    <!--<hr width="90%" style="border-color: #333"> -->
    <div class="col-xs-12">
        <div class="container" style="margin-bottom: 100px">
            <div class="col-xs-12">
                <h3 class="text-center">إقـــــــــرار</h3>
                <hr width="15%" style="border-color: #333">
                <h5 style="line-height: 40px;">
                <span style="margin-right: 45px;">نتقدم</span>
                 نحن أسرة /
                 <span style="font-weight:bold"> <?php if(isset($family->father_name) and $family->father_name != null ){
                    echo $family->father_name;
                } ?> </span> . هوية رقم /
                <span style="font-weight:bold">  
                       (<?=$family->father_national_num?>) </span>
                        بطلب التسجيل في
                        <span style="font-weight:bold"> الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء</span>
                                للإستفادة من خدمات البرامج والأنشطة التي تقدمها الجمعية فقط
                       دون الإستفادة من المساعدات المالية . وفي حال تقدمنا بطلب الإستفادة من المساعدات المالية فإنه يتوجب علينا إستكمال الوثائق والمستندات المطلوبة ويكون القبول وفق لائحة خدمات المستفيدين للجمعية .
                       
                
               </h5> 
          
                <h5 class="text-center"> وعلي ذلك جري التوقيع</h5>
                 <br />
            </div>
            <div class="col-xs-6" style="margin-top: 40px">
            </div>
            <div class="col-xs-6">
                <h5>إسم الأسرة / <span> <?php  echo $family->father_name; ?>  </span></h5>
                <h5> المقر بما فيه / <span>  <?php  echo $family->full_name_order; ?></span></h5>
                 <h5> صفته / <span> <?php  echo $family->title_setting; ?></span></h5>
                <h5> التوقيع / <span>  .................. </span></h5>
                <h5>التاريخ / <span>  .................. </span></h5>
            </div>
        </div>
    </div>
   <!--
    <div class="col-xs-12" style="padding: 0">
        <div class="container" style="  border: 1px solid #333; border-radius: 10px;padding: 0">
            <div class="col-xs-12">
                <p class="text-center" style=" margin-top: 10px;">  المملكة العربية السعودية - القصيم - بريدة - جمعية أبناء </p>
            </div>
            <div class="col-xs-12">
                <p class="text-center">
                
                </p>
            </div>
        </div>
    </div>
-->
    <script src="<?=base_url().'asisst/admin_asset/'?>js/jquery-3.1.1.min.js "></script>
    <script src="<?=base_url().'asisst/admin_asset/'?>js/bootstrap.min.js "></script>
</body>