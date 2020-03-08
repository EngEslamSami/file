
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">

<!--asisst/admin_asset/img/pills/img/-->



<style type="text/css">
    body{

    }
    @media print{
        .bond-qabd{
            display: inline-block;
            width: 100%;
         /*   height: 297mm ;*/
        
        }
        .table-bordered th,.table-bordered td{
            border:1px solid #000!important
        }
        
        .print-details-footer {
                bottom: 0px;
                 position: fixed;
                 width: 100%;
            }
            .bond-header{
              width: 100%;
               position: fixed;
            }
    
           
            .bond-body .main-table{
                margin-top: 22% !important;
            }
         /*   
           .table, .table td,.table th{
              
                overflow: hidden;
                word-wrap: break-word;
                page-break-inside: avoid;
              }*/

    }

    .bond-qabd{
      /* background: url(<?php echo base_url() ?>asisst/admin_asset/img/pills/back_esal.png);
        background-position: 100%;
        background-size: 100% 100%;
        background-repeat: no-repeat;
        -webkit-print-color-adjust: exact !important;*/
      /*  height: 297mm;*/
           page-break-after: avoid;
               float: right;
                  padding-bottom: 60px;

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
        font-size: 18px;
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
   /* .bond-body {
    
    display: inline-block;
    width: 100%;

    margin-top: 5px;
    

    }*/
    .bond-body h6 {
        font-size: 11px;
    }
    .pad-2{
        padding-left: 2px;
        padding-right: 2px;
    }
    .bond-footer{
      /*  margin-top: 15px;*/
    }
    .bond-footer h6{
        font-size: 11px;
    }
    .title-fe {
       display: inline-block;
    width: auto;
    position: relative;
    /* top: -26px; */
    right: -14px;
    border: 2px solid #555;
    background-color: #eee;
    font-size: 19px !important;
    padding: 3px 34px;
    height: 37px;
    line-height: 32px;
    vertical-align: middle;
}

    .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>th, .table>caption+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>td, .table>thead:first-child>tr:first-child>td {
        border-top: 1px solid #000;
    }
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td
    {
        border: 1px solid #000;
        text-align: center;
        vertical-align: middle;
        font-size: 16px;
     /*   padding: 4px 2px;*/
    }



    @page {
        /*size:  210mm 297mm  ;*/
        margin: 10px 10px 0 10px;
    }

    .span_font{
        font-weight: bold;
        font-size: 18px;
            margin: 3px;
    }
.gray-background{
    background-color: #eee;
    display: inline-block;
    width: 100%;
}



table  {
  page-break-after:always;
}
thead  {
  display:table-header-group;
}
tfoot  {
  display:table-footer-group;
} 


</style>







<div id="printdiv" data-spy="scroll" >


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
						<img src="<?php echo base_url() ?>asisst/admin_asset/img/pills//sympol2.png">
					</div>
				</div>
                
                
                
                
                 <div class="text-center">
                     <h4 class="title-fe span_font"> حــركة القيـود  </h4>
                 </div>
                     
                     

                <div class="col-xs-12" style="">
                <div class=" gray-background">

                    <div class="col-xs-4 no-padding">
                        <h5 class="span_font" style="margin-right: 20px; padding: 2px 0;">نـــوع القيد : <span class="border-box span_font"> <?php echo $result->no3_qued_name ;?></span></h5>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h5 class="span_font">رقـــم القيد : &nbsp&nbsp<span class="border-box span_font" style="font-size:20px"><?php echo $result->rkm ;?></span></h5>
                    </div>

                    <div class="col-xs-4 text-center">
                        <h5 class="span_font">تــاريخ القيد : &nbsp&nbsp<span class="border-box span_font"><?php echo date("Y-m-d",$result->qued_date)  ;?></span></h5>
                    </div>


                    </div>

                </div>
                
                
			</div>


    <div class="bond-qabd">
        <div class="container-fluid">

            <div class="bond-body">
           


                <div class="col-xs-12 no-padding" style="margin-top: 0px;" >
                
                    <table class="table table-bordered main-table" style="table-layout: fixed;margin-bottom: 0;">
                        <thead>
                      <tr style="    background-color: #eeeeee !important;">
                            <th style="width: 100px; font-size: bold;font-size: 18px; ">مدين</th>
                            <th style="width: 100px; font-weight: bold;font-size: 18px; ">دائن</th>
                            <th style="width: 100px; font-weight: bold; font-size: 18px;">رقم الحساب</th>
                            <th style="font-weight: bold; font-size: 18px;">إسم الحساب</th>
                            <th  style="width: 60px; font-weight: bold;font-size: 18px; ">المرجع</th>
                            <th style="font-weight: bold;font-size: 18px; ">البيان</th>
                            </tr>
                        </thead>
                        <tbody>

                          <?php
                          $counter =1; if(!empty($result->details)){
                          foreach ($result->details as $row_detail){
                          ?>
                          <tr id="<?=$row_detail->id?>">
                             
                              <td>
                              <strong> <?=$row_detail->maden?></strong> 

                              </td>
                              <td>
                                 <strong> <?=$row_detail->dayen?></strong> 
                              </td>

                              <td>
                                  <?=$row_detail->rkm_hesab?>
                              </td>
                              <td>

                              <?=$row_detail->hesab_name?>
                              </td>
                              <td>
                                  <?=$row_detail->marg3?>
                              </td>
                              <td>
                                 <small> <?=$row_detail->byan?></small>

                              </td>


                          </tr>
                        <?php $counter++ ; } } ?>
                        
                        
                          <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                         <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        <tr>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                          <td>ss</td>
                        </tr>
                        
                        
                        
                        <tr style="background-color: #eeeeee !important;">
                        <th style="font-weight: bold;    font-size: 18px;"> <strong> <?php echo $result->total_value  ;?> </strong> </th>
                 
                        <th style="font-weight: bold;    font-size: 18px;"> <strong> <?php echo $result->total_value  ;?>  </strong></th>

                        <th colspan="4" style="font-weight: bold; font-size: 18px;">الإجمــــالــــــي</th>
                        </tr>
                       
                        </tbody>
                       
                       
                    </table>




                </div>

               





            </div>

            <div class="bond-footer ">
                <div class="col-xs-12 no-padding text-center">

                    <div class="col-md-6 col-xs-6 pad-2 text-center">
                        <h5  style="margin-bottom: 35px;">المحاسب</h5>
                        <h5>ماجد محمد الركيان</h5>
                    </div>
                    <div class="col-md-6 col-xs-6 pad-2 text-center">
                        <h5  style="margin-bottom: 35px;">مدير الشئون المالية والإدارية </h5>
                        <h5>تركى علي التركى</h5>
                    </div>

                </div>
            </div> 
        </div>
        
        

    </div>





        
 <div class="col-xs-12 no-padding print-details-footer">
                    <div class="col-xs-4">
                    <p class=" text-center" style="margin-bottom: 0;"> <small>حالة القيد/ <?php echo $result->halet_qued_name ;?></small></p>
                    
                    </div>
                    <div class="col-xs-4">
                    <p class=" text-center" style="margin-bottom: 0;">رقم الصفحة</p>
                    </div>
                    <div class="col-xs-4">
                       
                        <p class=" text-center" style="margin-bottom: 0;"> <small>تاريخ الطباعة : <?php echo date("Y-m-d") ;?></small></p>
                    </div>
                    <div class="col-xs-12 no-padding">
                      <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/page-footer.jpg" width="100%">
                    </div>

</div>

</div>









 




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




<!--
<script>
    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url() ?>finance_accounting/box/vouch_qbd/Vouch_qbd";
    }, 1000);
</script>

-->