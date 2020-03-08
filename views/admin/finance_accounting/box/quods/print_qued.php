

<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">




<style type="text/css">
html {
 
    height: 100%;              /* for the page to take full window height */
    box-sizing: border-box;    /* to have the footer displayed at the bottom of the page without scrolling */
}

*,
*:before,
*:after {
    box-sizing: inherit;       /* enable the "border-box effect" everywhere */
}
body{
        font-family: initial !important; 
        font-weight: bold !important;
       
}

  @media print{
    
   /*     #img-foot{
            position: fixed;
            bottom: 0;
            
        }*/
        .report-container td, p {
            page-break-inside: avoid;
          }


    .table-bordered th,.table-bordered td{
      border:1px solid #000!important
    }



  }

  .bond-qabd{
  /*  float: right;
    padding-bottom: 60px;*/
    
  /* height: 290mm;*/

  }



  .bond-header{
   /*   height: 55px;*/
   margin-bottom: 15px;

 }
 .bond-header .right-img img{
   width: 100%;
   height: 90px;
 }
 .bond-header .left-img img{
  width: 100%;
  height: 90px;
}
.border-box {
  border: 1px solid #999;
  background-color: #fff;
  border-radius: 5px;
 /* font-size: 18px;*/
  font-size: 14px;
  padding: 2px 6px;
  display: inline-block;
  min-width: 70px;
  height: 29px;
  line-height: 27px;
  text-align: center;
}
.border-box-h{
  padding: 3px 20px;
  border: 2px solid #222;
  border-radius: 29px;
}
.main-bond-title{
  display: table;
  height: 55px;
  text-align: center;
  width: 100%;
}
.main-bond-title h3{
  display: table-cell;
  vertical-align: middle;
  font-size: 12px;
}


/*
.bond-body {
 position: relative;
 display: inline-block;
 width: 100%;
 margin-top: 5px;


}
*/


.bond-body h6 {
  font-size: 11px;
}
.pad-2{
  padding-left: 2px;
  padding-right: 2px;
}
.bond-footer{

}
.bond-footer h6{
  font-size: 11px;
}
.title-fe {
 display: inline-block;
 width: auto;
 position: relative;
  top: -26px; 
 right: -14px;
 border: 2px solid #555;
 background-color: #eee;
/* font-size: 19px !important;*/
 font-size: 14px !important;
 padding: 3px 34px;
 height: 37px;
 line-height: 32px;
 vertical-align: middle;
 box-shadow: 4px 3px;
}

.table-bordered>thead>tr>th,
 .table-bordered>tbody>tr>th, 
 .table-bordered>tfoot>tr>th,
  .table-bordered>thead>tr>td, 
  .table-bordered>tbody>tr>td, 
  .table-bordered>tfoot>tr>td
{
  border: 1px solid #000;
  text-align: center;
  vertical-align: middle;
 
   font-size: 14px;
  padding: 4px 2px;
  
  
  
  
  
    border: 1px solid #020202 !important;
    background: #ffffff !important;
    border-radius: 0px !important;
    font-size: 15px !important;
    color: black !important;
}








@page {
    size: 210mm 297mm;
  margin: 10px 10px 0px 10px;
}

.span_font{
  font-weight: bold;
 /* font-size: 18px;*/
 font-size: 18px;
  margin: 3px;
}
.gray-background{
  background-color: #eee;
  display: inline-block;
  width: 100%;
}



 table { page-break-after:auto }
  tr    { page-break-inside:avoid; page-break-after:auto }
  td    { page-break-inside:avoid; page-break-after:auto }
    
    
table.report-content {
  page-break-after:always;
}
thead.report-header {
  display:table-header-group;
}
tfoot.report-footer {
  display:table-footer-group;
} 


/*
.report-container:after {
    display: block;
    content: "";
    margin-bottom: 178mm; // must be larger than largest paper size you support 
  }*/


#img-foot{
  /*  position: relative;
    bottom: 0;*/
}



.header-info, .header-space{
  /*  height: 192px;*/
  height: 170px;
}
.footer-info, .footer-space {
  height: 70px;
}

.header-info {
  position: fixed;
  top: 0;
  width: 100%;
}
.footer-info {
  position: fixed;
  bottom: 0;
  width: 100%;
}



</style>








<div id="printdiv" data-spy="scroll" >
  
  <div class="first-part">
  <table class="report-container">
   <thead class="report-header">
     <tr>
      <th class="report-header-cell">
       <div class="header-space">&nbsp;</div>
    </th>
    </tr>
    </thead>

<tbody class="report-content">
  <tr>
   <td class="report-content-cell">
    <div class="main">


      <div class="bond-qabd">
        <div class="container-fluid">

          <div class="bond-body">



          <!--  <div class="col-xs-12 no-padding" style="margin-top: 10px;" > -->
          <div class="col-xs-12 no-padding" style="margin-top: 0px;" > 
              <table class="table table-bordered main-table" style="table-layout: fixed;margin-bottom: 0;">
                <thead>
                  <tr style="background-color: #eeeeee !important;">
                    <th style="width: 100px; font-size: bold;font-size: 16px; background-color: #eeeeee !important; ">مدين</th>
                    <th style="width: 100px; font-weight: bold;font-size: 16px; background-color: #eeeeee !important; ">دائن</th>
                    <th style="width: 100px; font-weight: bold; font-size: 16px; background-color: #eeeeee !important;">رقم الحسـاب</th>
                    <th  style=" width: 180px; font-weight: bold; font-size: 16px; background-color: #eeeeee !important;">إسم الحســــاب</th>
                 <!--   <th  style="width: 60px; font-weight: bold;font-size: 14px; ">المرجع</th> -->
                    <th style="font-weight: bold;font-size: 16px; background-color: #eeeeee !important; ">البيــــــان</th>
                  </tr>
                </thead>
                <tbody>


<?php if($total_value_elqeed == 0){ ?>



      <?php
      $x =1; if(!empty($elqeed_zero_details)){
      foreach ($elqeed_zero_details as $row_qued){
      ?>
      <tr id="<?=$row_qued->id?>">
          <td>
          <strong> <?php 
        echo number_format($row_qued->maden,2);
          ?></strong> 
          </td>
          
          <td>
             <strong> <?php 
            echo number_format($row_qued->dayen,2); 
             ?></strong> 
          </td>
          <td>
               <small style="font-size:100%; font-weight: bold;"><?=$row_qued->rkm_hesab?></small>
          </td> 
          <td style="text-align: right !important;">
          <small style="font-size:100%; font-weight: bold;"><?=$row_qued->hesab_name?></small>
          </td>
         <!-- 
          <td>
              <?=$row_qued->marg3?>
          </td>
          -->
          <td style="text-align: right !important;">
             <small style="font-size:95%; font-weight: bold;"> <?=$row_qued->byan?></small>
          </td>
      </tr>
    <?php $x++ ; } } ?>




<?php }else{ ?>
    

                
  <?php 
  $counter =1; if(!empty($result->details)){
  foreach ($result->details as $row_detail){
  ?>
  <tr id="<?=$row_detail->id?>">
      <td>
      <strong> <?php 
      if($row_detail->maden == 0){
      }else{
      //echo  $row_detail->maden;
      echo number_format($row_detail->maden,2);
      }
      ?></strong> 
      </td>
      <td>
         <strong> <?php 
          if($row_detail->dayen == 0){
      }else{
    //  echo  $row_detail->dayen;
      echo number_format($row_detail->dayen,2);
      }  
         ?></strong> 
      </td>
      <td>
           <small style="font-size:100%; font-weight: bold;"><?=$row_detail->rkm_hesab?></small>
      </td> 
      <td style="text-align: right !important;">
      <small style="font-size:100%; font-weight: bold;"><?=$row_detail->hesab_name?></small>
      </td>
      <td style="text-align: right !important;">
         <small style="font-size:95%; font-weight: bold;"> <?=$row_detail->byan?></small>
      </td>
  </tr>
<?php $counter++ ; } } ?>


<?php } ?>





              </tbody>
            </table>

          </div>



        </div>

        <div class="bond-footer ">
      <table class="table table-bordered" style="table-layout: fixed;box-shadow: 4px 3px #999;">
        <tfoot>
    <tr style="background-color: #eeeeee !important;">
      <th style="font-weight: bold;    font-size: 16px; width: 100px; background-color: #eeeeee !important;"> 
             <strong> <?php echo number_format($result->total_value,2); 
                 /* $result->total_value  */
                  ;?> </strong> 
             
             </th>

      <th style="font-weight: bold;    font-size: 16px; width: 100px; background-color: #eeeeee !important;"> <strong> <?php
       echo number_format($result->total_value,2); 
      // echo $result->total_value  ;
       ?>  </strong></th>

      <th colspan="4" style="font-weight: bold; font-size: 16px; background-color: #eeeeee !important;">الإجمــــالــــــي</th>
    </tr>
              </tfoot>
      </table>
            
          <div class="col-xs-12 no-padding text-center">

            <div class="col-md-6 col-xs-6 pad-2 text-center">
              <h6  style="margin-bottom: 25px;font-weight: bold; font-size: 16px; ">المحاسب</h6>
              <h6 style="font-weight: bold; font-size: 16px;">
              
              <?php
              if($result->rkm <= 811){
                echo 'ماجد محمد الركيان	';
              }elseif($result->rkm <= 1133 and $result->rkm >811){
                echo 'مهند بن سليمان الدرع';
              }else{
                echo 'محمد عبدالله الربدي';
              }
              
               /*if(isset($mohaseb_name) and $mohaseb_name !=null){
                echo $mohaseb_name;
              }else{
                
              }*/ ?>
              </h6>
            </div>
            <div class="col-md-6 col-xs-6 pad-2 text-center">
              <h6  style="margin-bottom: 25px; font-weight: bold; font-size: 16px;">مدير الشئون المالية والإدارية </h6>
              <h6 style="font-weight: bold; font-size: 16px;">
              <?php if(isset($modeer_mali) and $modeer_mali !=null){
                echo $modeer_mali;
              }else{
                
              } ?>
              
              </h6>
            </div>

          </div>
        </div>
      </div>



    </div>



  </div>
</td>
</tr>
</tbody>


<tfoot class="report-footer">
  <tr>
   <td class="report-footer-cell">
       <div class="footer-space">&nbsp;</div>
     
  </td>
</tr>
</tfoot>
</table>
</div>


<!--
<div class="second-part">
 <div class="col-xs-12 no-padding" id="img-foot">
  <div class="col-xs-12 no-padding">
        <div class="col-xs-4">
          <p class=" text-center" style="margin-bottom: 0;"> <small>حالة القيد/ غير مرحل</small></p>

        </div>
        <div class="col-xs-4">
          <p class=" text-center" style="margin-bottom: 0;">رقم الصفحة</p>
        </div>
        <div class="col-xs-4">

          <p class=" text-center" style="margin-bottom: 0;"> <small>تاريخ الطباعة : 2019-02-11</small></p>
        </div>
        
     <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/page-footer.jpg" width="100%">
  </div>
  </div>
</div>-->








<div class="header-info">
         <div class="bond-header">
          <div class="col-xs-4 pad-2">
           <div class="right-img">
            <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol1.png">
          </div>
        </div>
        <div class="col-xs-3 pad-2">

        </div>
        <div class="col-xs-5 pad-2">
         <div class="left-img">
          <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol2.png">
        </div>
      </div>




      <div class="text-center">
       <h1 style="font-size: 18px !important;" class="title-fe span_font"> حــركة القيـود  </h1>
     </div>



    <!-- <div class="col-xs-12" style="margin-top: 5px;"> -->
    <div class="col-xs-12" style="margin-top: -16px;"> 
      <div class=" gray-background">

        <div class="col-xs-4 no-padding">
          <h5 class="span_font" style="margin-right: 20px; padding: 2px 0;">نـــوع القيد : <span class="border-box span_font"><?php echo $result->no3_qued_name ;?></span></h5>
        </div>
        <div class="col-xs-4 text-center">
          <h5 class="span_font">رقـــم القيد : &nbsp&nbsp<span class="border-box span_font" style="font-size:18px"><?php echo $result->rkm ;?></span></h5>
        </div>

        <div class="col-xs-4 text-center">
          <h5 class="span_font">تــاريخ القيد : &nbsp&nbsp<span class="border-box span_font"><?php echo date("Y-m-d",$result->qued_date)  ;?></span></h5>
        </div>


      </div>

    </div>


  </div>

</div>




<div class="footer-info" >

         <div class="col-xs-12 no-padding print-details-footer">
        <div class="col-xs-6">
          <p class=" text-center" style="margin-bottom: 0;"> <small>حالة القيد/  <?php
          if(isset($qued_data) and $qued_data != null){
            $halet_qued_name = $qued_data->halet_qued_name;
           }
          if($qued_data->deport == 0){
            echo $halet_qued_name;
          }elseif($qued_data->deport == 1){
           echo $halet_qued_name . '( بواسطة '.$qued_data->deport_publisher_name .' )';
          }
           
          ?>	</small></p>

        </div>
        <div class="col-xs-2">
       <!--   <p class=" text-center" style="margin-bottom: 0;">رقم الصفحة</p> -->
        </div>
        <div class="col-xs-4">

          <p class=" text-center" style="margin-bottom: 0;"> <small>تاريخ الطباعة :   <?php echo  date('Y-m-d h:i:s');  ?></small></p>
        </div>
     <div class="col-xs-12 no-padding">
             <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/page-footer.jpg" width="100%" style="">
       </div>

      </div>

    </div>








</div>








<?php 
//echo die;
?>





<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.datetimepicker.full.js"></script>


<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.easing.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/custom.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/wow.min.js"></script>
<script>
  new WOW().init();
  $('.some_class').datetimepicker();
</script>





<script>

   var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    window.close();
   /* setTimeout(function () {
        window.location.href ="<?php echo base_url(); ?>/finance_accounting/box/quods/Quods/add_quods";
    }, 1000);*/
</script>
