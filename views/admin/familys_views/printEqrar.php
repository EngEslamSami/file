<head>
    <link rel="stylesheet" type="text/css" href="<?=base_url().'asisst/admin_asset/'?>css/bootstrap-arabic.min.css">
    <link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url().'asisst/admin_asset/'?>css/style.css">
<head>

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

        window.location = "<?=base_url('family_controllers/Family/AddNewRegister'); ?>";

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

    <!--<hr width="90%" style="border-color: #333"> -->
    <div class="col-xs-12">
        <div class="container" style="margin-bottom: 100px">
            <div class="col-xs-12">
                <h3 class="text-center">إقـــــــــرار</h3>
                <hr width="15%" style="border-color: #333">
                <h5> أقر أنا / <span><?=$family['full_name_order']?></span> هوية رقم / <span>  <?=$family['person_national_card']?> </span></h5>
                <h5> بأن جميع البيانات والمستندات الخاصه  <span></span>
                
                بأسرة / <span><?=$family['father_name']?></span> هوية رقم / <span>  
                       <?=$family['father_national_num']?> </span>
                
                </h5>
                <!--
                <h5> إسم الاسره / <span><?=$family['father_name']?></span> هوية رقم / <span>  
                       <?=$family['father_national_num']?> </span></h5> -->
                <h5 class="text-center">صحيحه وسليمة</h5>
                <br />
                <h5 class="text-center"> وعلي ذلك جري التوقيع</h5>
                 <br />
            </div>
            <div class="col-xs-8" style="margin-top: 40px">
            </div>
            <div class="col-xs-4">
                <h5>المقر بما فيه / <span>  .................. </span></h5>
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