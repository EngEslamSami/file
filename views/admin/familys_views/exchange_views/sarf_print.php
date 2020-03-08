

<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">

<style>


    .no-padding {
        padding: 0;
    }
    
    	@media print{
    	   body{
    	         border: double 8px ;
    	   }
          .border-bottom{
              border: double 6px ;
              padding-bottom: 10px !important;
          } 
          .warpeer{
            position: absolute;
            width: 100%;
            height: 100%;
              border: double 6px ;
              
               overflow: auto;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
       box-sizing: border-box;
            
          }

    	}
    
    
    	@page {
		size: landscape;
        margin: 30px 30px 30px 30px;
	}
    .border-bottom{
              border: double 6px ;
          }
          
          body > *:last-child {
    page-break-after: auto
}

h5 , h6{
    font-weight: 600 !important;
}

.box_input{
    border: 1px solid #333;
    padding: 5px;
    min-height: 31px;
    
}
.no_margin{
        margin: 0px;
}
.fs-16{
    font-size: 16px;
}
</style>


<div id = "printdiv" style="position: relative;" >
<!--<div class="warpeer"></div>-->


        <div class="col-xs-12  " style="margin-top: 25px; margin-bottom: 25px">
            <div class="col-xs-12" style="padding: 0; margin-bottom:25px;">
                <h4 style="font-weight: 600;" class="text-center"> <span style="border-bottom: 1px solid; padding-bottom: 5px;" > نموذج إرسال ملف
                 <?php if(isset($sarf_data->about)){ echo $sarf_data->about;}  ?></span>
                  </h4>
              
            </div>
            <div class="col-xs-12 no-padding">
                <h5 style="font-weight: 600;" class="pull-left">    اسم الجهة : <span> <strong>  </strong><?php if(isset($main_data->name)){ echo $main_data->name;}  ?></span></h5>
                <h5 style="font-weight: 600; padding-left: 120px;" class="pull-right"> التاريخ :
                       <span> <strong> <?php
                       if(isset($sarf_data->due_date) and $sarf_data->due_date != null)
                       {
                       echo date('Y/m/d',$sarf_data->due_date).'م';
                       }
                       
                       
                        ?>   </strong></span></h5>
            </div>
            <div class="col-xs-12 no-padding">
                <h5 style="padding: 0 ">طريقه الارسال : <span> <input type="checkbox" checked> نظام تبادل</span></h5>
                <div class="col-xs-2 no-padding ">
                    <h5>الكود بشركه الراجحي <br> المصرفية للاستثمار </h5>
                </div>
                <div class="col-xs-3 ">
                    <h5 class="text-center box_input"><strong>66-1195</strong></h5>
                </div>
                <div class="col-xs-1">
                   
                </div>
                <div class="col-xs-2 text-center no-padding">
                    <h5 style="margin-top: 16px;">رقم حساب الجهة</h5>
                </div>
                <div class="col-xs-4">
                    <h5 class="text-center box_input" ><strong>
                    <?php if(isset($main_data->mainBank)){ echo $main_data->mainBank;}  ?></strong></h5>
                </div>
            </div>
            <div class="col-xs-12 no-padding">
                <div class="col-xs-2  no-padding">
                    <h5 style="margin-top: 40px;"> إجمالي مبلغ الرواتب </h5>
                </div>
                <div class="col-xs-2">
                    <h6 class="text-center"> هللة</h6>
                    <h5 class="text-center box_input" ><strong></strong></h5>
                </div>
                <div class="col-xs-4">
                    <h6 class="text-center"> ريـــــــــــــــــــــــال</h6>
                    <h5 class="text-center box_input" ><strong><?php if(isset($sarf_data->total_value)){ echo $sarf_data->total_value;}  ?></strong></h5>
                </div>
            </div>

            <div class="col-xs-12 no-padding" style="margin-top: 10px;">
                <div class="col-xs-2 no-padding">
                    <h5>إجمالي عدد الأسر : </h5>
                </div>
                <div class="col-xs-3">
                    <h5 class="text-center box_input" ><strong><?php if(isset($sarf_data->count_sarf_member)){ echo $sarf_data->count_sarf_member;}  ?></strong></h5>
                </div>
                <div class="col-xs-2"></div>
                <div class="col-xs-1 no-padding">
                    <h5 style="margin-top: 16px;">تاريخ الدفع </h5>
                </div>
                <div class="col-xs-4">
                    <h5 class="text-center box_input"><strong>
                    <?php if(isset($sarf_data->cashing_date)  and $sarf_data->cashing_date != null){
                        echo date('Y/m/d',$sarf_data->cashing_date);}else{
                            echo 'غير محدد';}  ?> م</strong></h5>
                </div>
            </div>
            <div class="col-xs-12" style="border: 1px dashed #333;padding: 7px;margin-top: 15px">
                <p class="fs-16"> ملاحظه هامة</p>
                <ul class="no_margin fs-16">
                    <li>يجب إرسال الخطاب مع كل ملف رواتب - أو عمل اضافي - أو مكأفئات ( ويتم توضيح جميع البيانات المطلوبة ) </li>
                <!--    <li>يسلم مع دسك الرواتب يدويا بالنسبة للجهات التي داخل الرياض - او يرسل علي <br>
                     فاكس : 011-2798100 . تحويلة 6821 ( وذلك بالنسبة للجهات خارج الرياض )     </li> -->
                     
                                  <li>يسلم مع دسك الرواتب يدويا بالنسبة للجهات التي داخل الرياض - او يرسل علي <br>
                     فاكس : 2798100-011 . تحويلة 6821 ( وذلك بالنسبة للجهات خارج الرياض )     </li>

                </ul>

            </div>
            
            
            <div class="col-xs-12 no-padding" style="margin-top: 20px;">
                <div class="col-xs-2 no-padding">
                    <h5 class="text-center"> الختم الرسمي </h5> <br />
                    <h5 class="text-center"> </h5>
                </div>
                <!--<div class="col-xs-5">
                    <h5 class="text-center"> أمين الصندوق </h5><br />
                    <h5 class="text-center"> عبدالله عبدالعزيز ناصر الصبيحي </h5>
                </div>
                <div class="col-xs-5">
                    <h5 class="text-center"> رئيس مجلس الادارة </h5><br />
                    <h5 class="text-center"> عبدالرحمن محمد سليمان البليهي </h5>
                </div>
-->

<?php if ((isset($sarf_data))&& $sarf_data != null  ){
    if (!empty($sarf_data->naeb_name)) {
        $text = " نائب رئيس مجلس الإدارة";
        $value = $sarf_data->naeb_name;
    }elseif (!empty($sarf_data->manager_name)){
        $text = " رئيس مجلس الادارة";
        $value = $sarf_data->manager_name;
    }else{
          $text = "";
        $value = ""; 
    }
    ?>

    <div class="col-xs-5">
        <h5 class="text-center"> أمين الصندوق </h5><br />
        <h5 class="text-center"><?=$sarf_data->amin_name?> </h5>
    </div>

    <div class="col-xs-5">
        <h5 class="text-center"><?=$text?> </h5><br />
        <h5 class="text-center"><?=$value?> </h5>
    </div>
<?php   }   ?>
            </div> 
        </div>
        
       

</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>

<?php  $previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);?>

<script >
    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML = divElements ;
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url('').$previos_path ?>";
    }, 10000);
</script >

<!--
<script >

  function autoResizeDiv()
  {
      document.getElementById('printdiv').style.height = window.innerHeight + 95 +'px';
      
  }
  function autoResizeDivMobile()
  {
 

  }
  
 var mq = window.matchMedia( "(min-width: 767px)" );

if(mq.matches) {
    // the width of browser is more then 767px
    
  window.onresize = autoResizeDiv;
  autoResizeDiv();
} else {
    // the width of browser is less then 767px
    
  window.onresize = autoResizeDivMobile;
  autoResizeDivMobile();
}
  
  
</script>-->
