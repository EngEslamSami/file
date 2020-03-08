<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">



	<style type="text/css">
	
	
		.border-box {
			padding: 5px 20px;
			border: 4px double #999;
			border-radius: 29px;
		}
		.border-box-h{
			padding: 10px 20px;
			border: 2px solid #222;
			border-radius: 29px;
		}
	
		.bond-body {
		/*	padding: 24px 10px 0;
		
			display: inline-block;
			width: 100%;*/
            
            padding: 24px 10px 0;
		
			display: inline-block;
			width: 100%;
            background-image: url('<?php echo base_url() ?>asisst/admin_asset/img/pills/back2.png');
            
           background-position: center;
            background-size: 50% 60%;
            background-repeat: no-repeat;
		
		}

       

        @media print {
          
            #esal_body{
                height: 275mm;
                }
                
                 .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {
                    border: 1px solid #000 !important;
                    background: #ffffff;
                    border-radius: 0px !important;
                    font-size: 17px !important;
                    color: black;
                }
                
        }
		.bond-body h5 {
    font-size: 16px;
    margin: 5px 0;
    font-weight: bold;
}
#esal_body{
 /*  background-image: url('<?php echo base_url() ?>asisst/admin_asset/img/esals/esal.jpg');
*/
    background-position: 100%;
    background-size: 100% 100%;
    background-repeat: no-repeat;
     height: 275mm;
   
}
@page{
    size: a4;
    margin: 20px;
}

#esal_body .table>thead>tr>th,#esal_body  .table>tbody>tr>th, 
#esal_body .table>tfoot>tr>th,#esal_body  .table>thead>tr>td, 
#esal_body .table>tbody>tr>td,#esal_body  .table>tfoot>tr>td {

    border-top: 0;
}
#esal_body .table>thead>tr>th,#esal_body  .table>tbody>tr>th,#esal_body  .table>tfoot>tr>th, 
#esal_body .table>thead>tr>td,#esal_body  .table>tbody>tr>td,#esal_body  .table>tfoot>tr>td {
    padding: 0px;

	</style>



</head>
<body>




<div id="printdiv"  >


<section id="esal_body">

<div style="height: 100px;"></div>

	<div class="bond-body" style="height: 440px;">


		            <div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
                        <div class="col-xs-1">
                       
                        </div>
                        <div class="col-xs-6">
                            <h6 style="font-weight: bold;"> نوع الإيصال : <span id="tawred_type_span">
                                    <?php if(!empty($result->esal_type_title)){ echo$result->esal_type_title; } ?>
                                </span></h6>
                        </div>

                        <div class="col-xs-5  no-padding">
                            <h6 style="font-weight: bold;"> طريقة التوريد : <span id="pay_method_span">
											<?php
						//		$pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');
                              $pay_method_arr = array('إختر', 1 => ' عيني ');
											if(!empty($result->pay_method)){ echo$pay_method_arr[$result->pay_method]; } ?>
                                </span>
                                     <span style="float: left; margin-left: 30px;">
                               (    <?php 
                        $unixtime = $result->date_s;
                 echo $time = date(" h:i A",$unixtime);
                        
                        ?> )</span>
                                </h6>
                                
                        </div>
                      
                    </div>

		<div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
			<div class="col-xs-5">
				<h5 style="margin-right: 90px; "><?php if(!empty($result->value)){
                                        echo $result->value; }else{ echo 0;}?></h5>
			</div>
			<div class="col-xs-4">
				<h5 style="margin-right: 90px;  "><?=$result->esal_num?></h5>
			</div>
			<div class="col-xs-3">
				<h5 style="float:right;  ">
                <?=$result->esal_date?> م </h5>
			</div>
		</div>






<!--	<div class="col-xs-12 no-padding">
			<div class="col-xs-4">
				<h5>نوع التبرع:<span><?php  if(!empty($result->erad_title)){
                                        echo$result->erad_title; }else{ echo'غير محدد';}?></span></h5>
			</div>
			<div class="col-xs-3">
				<h5>الفئة :<span><?php  if(!empty($result->fe2a_type_title)){
                                        echo$result->fe2a_type_title; }else{ echo'غير محدد';}?></span></h5>
			</div>
			<div class="col-xs-5">
				<h5>البند :<span ><?php  if(!empty($result->band_title)){
                                        echo$result->band_title; }else{ echo'غير محدد';}?></span></h5>
			</div>
		</div>-->

		<div class="col-xs-12" style="height: 40px; line-height: 40px;">
        <div class="col-xs-8 no-padding">
			<h5  style="margin-right: 120px; " >
            <?php  if(!empty($titles[$result->laqab])){
                                        echo$titles[$result->laqab]->title_setting;  echo'/';} ?>
                                        <?php  if(!empty($result->person_name)){
                                        echo$result->person_name; }else{ echo'غير محدد';}?> 
                                        <?php  if(!empty($greetings[$result->tahia])){
                                            echo' - ';
                                        echo $greetings[$result->tahia]->title_setting; } ?>
            </h5>
            </div>
            <?php  if(!empty($result->person_mob)){ ?>
    <div class="col-xs-4">
        <h5> جوال : <span>
<?php echo $result->person_mob; ?>
</span></h5>
    </div>
<?php } ?>
            
             <!--<div class="col-xs-4 text-center">
            <h5> جوال : <span>
            <?php  if(!empty($result->person_mob)){
					   echo$result->person_mob; }else{ echo'غير محدد';}
                       ?>
            </span></h5>
            	</div>-->
		</div>


		<div class="col-xs-12" style="height: 40px; line-height: 40px;">
			<h5 style="margin-right: 120px;">     <?php if(!empty($ArabicNum)){
                            echo$ArabicNum; } ?></h5>
		</div>

<?php if( $result->pay_method == 1){ ?>
	<div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
		
	</div>



<?php  }elseif( $result->pay_method ==2){ ?>
	<div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
			<div class="col-xs-5">
				<h5 style="margin-right: 120px;"><?php  if(!empty($result->cheq_num)){
					   echo$result->cheq_num; }else{ echo'غير محدد';}?></h5>
			</div>
			<div class="col-xs-4">
				<h5 style="margin-right: 30px;"><?php  if(!empty($result->bank_title)){
					   echo$result->bank_title; }else{ echo'غير محدد';}?></h5>
			</div>
			<div class="col-xs-3">
				<h5><?php  if(!empty($result->date)){
					   echo$result->date; }else{ echo'غير محدد';}?></h5>
			</div>
		</div>
			  <?php }elseif( $result->pay_method ==3){ ?>
<!--	<div class="col-xs-12 no-padding">
			<div class="col-xs-5">
				<h5>رقم الجهاز: <span><?php  if(!empty($result->device_num)){
					   echo$result->device_num; }else{ echo'غير محدد';}?></span></h5>
			</div>
			<div class="col-xs-4">
				<h5>رقم (التفويض) : <span><?php  if(!empty($result->tafwed_num)){
					   echo$result->tafwed_num; }else{ echo'غير محدد';}?></span></h5>
			</div>
			<div class="col-xs-3">
				<h5 style="float:right;">تاريخ العملية : <span><?php  if(!empty($result->process_date)){
					   echo$result->process_date; }else{ echo'غير محدد';}?></span></h5>
			</div>
		</div>
-->
	<div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
			
            <div class="col-xs-4">
				<h5 style="margin-right: 120px; "><?php  if(!empty($result->tafwed_num)){
					   echo $result->tafwed_num; }else{ echo'غير محدد';}?></h5>
			</div>
            <div class="col-xs-4">
				<h5 style="margin-right: 120px; " style=""><?php  if(!empty($result->bank_title)){
					   echo$result->bank_title; }else{ echo'غير محدد';}?></h5>
			</div>
            	<div class="col-xs-3">
				<h5 style="margin-right: 60px; " style=""><?php  if(!empty($result->process_date)){
					   echo$result->process_date; }else{ echo'غير محدد';}?></h5>
			</div>
            <!--
			<div class="col-xs-4">
				<h5 style=" margin-top: 19px;"><?php  if(!empty($result->bank_account_title)){
					   echo$result->bank_account_title; }else{ echo'غير محدد';}?></h5>
			</div>-->
            <!--
			<div class="col-xs-4">
				<h5 style=" margin-top: 19px;"><?php  if(!empty($result->bank_account_num_title)){
					   echo$result->bank_account_num_title; }else{ echo'غير محدد';}?></h5>
			</div>-->
		</div>


				<?php }elseif( $result->pay_method ==4 || $result->pay_method ==5 || $result->pay_method ==6){ ?>

<!--
		<div class="col-xs-12 no-padding">
			<div class="col-xs-5">
				<h5>رقم المرجع : <span><?php  if(!empty($result->marg3_num)){
					   echo$result->marg3_num; }else{ echo'غير محدد';}?></span></h5>
			</div>
			<div class="col-xs-4">
				<h5 style="float:right;">تاريخ العملية : <span><?php  if(!empty($result->marg3_date)){
					   echo$result->marg3_date; }else{ echo'غير محدد';}?></span></h5>
			</div>
			<div class="col-xs-3">
				<h5>إسم البنك : <span><?php  if(!empty($result->bank_title)){
					   echo$result->bank_title; }else{ echo'غير محدد';}?></span></h5>
			</div>
		</div>
        -->
		<div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
			<div class="col-xs-4">
				<h5 style="margin-right: 120px;"><?php  if(!empty($result->marg3_num)){
					   echo$result->marg3_num; }else{ echo'غير محدد';}?></h5>
			</div>
			<div class="col-xs-4">
				<h5 style="margin-right: 120px;"><?php  if(!empty($result->bank_title)){
					   echo$result->bank_title; }else{ echo'غير محدد';}?></h5>
			</div>
				<div  class="col-xs-4">
				<h5 style="margin-right: 60px;"><?php  if(!empty($result->marg3_date)){
					   echo$result->marg3_date; }else{ echo'غير محدد';}?></h5>
			</div>
		</div>



				<?php }elseif( $result->pay_method ==7){ ?>
				<div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
			<div style="margin-right: 120px;" class="col-xs-4">
				<h5><?php  if(!empty($result->bank_title)){
					   echo$result->bank_title; }else{ echo'غير محدد';}?></h5>
			</div>
			<div style="margin-right: 120px;" class="col-xs-4">
				<h5><?php  if(!empty($result->bank_account_title)){
					   echo$result->bank_account_title; }else{ echo'غير محدد';}?></h5>
			</div>
			<div style="margin-right: 60px;" class="col-xs-4">
				<h5><?php  if(!empty($result->bank_account_num_title)){
					   echo$result->bank_account_num_title; }else{ echo'غير محدد';}?></h5>
			</div>
		</div>


				<?php  } ?>
				<div class="col-xs-10 col-xs-offset-2 no-padding" style="height: 100px;">
                        
                        <table class="table table_style table-bordered tab" style="width:97%; float:right;table-layout:fixed;
                        padding-top:20px;     border: 1px solid black !important;
                         
                        ">
                            <tbody>
                       
                               <?php   $show_style =''; 
                                if( empty($result->bnd_type2 )){
                                    $show_style ='display: none'; 
                                     } ?>

                                 <tr>
   <th style="width: 25%;   border: 1px solid black !important;     text-align: center;"   id="band_tbro3_td"><?php if(!empty($result->band_title)){ echo$result->band_title; } ?></th>
  
     <th  style="width: 60px; text-align: center;   border: 1px solid black !important; <?php echo$show_style;?>"    id="value1"><?php
       if(   !empty($result->bnd_type2 )){
           echo $result->value1;
       }
       ?>
       </th>
  
   <th style="width: 40%; vertical-align: middle; text-align: center;   border: 1px solid black !important;"

       <?php    if( !empty($result->bnd_type2 )){ ?>
           rowspan="2"
       <?php  } ?>
       class="about_td"><?php if(!empty($result->about)){ echo$result->about; } ?></th>
  
  </tr>
                                       
<tr id="secondFe2aType"   <?php    if( empty($result->bnd_type2 )){ ?> style="display: none" <?php  } ?>>
   <th  style="  border: 1px solid black !important;     text-align: center;" id="band_tbro3_td2"><?php if(!empty($result->band_title2)){ echo$result->band_title2; } ?></th>
   <th  style="text-align: center;  border: 1px solid black !important;" id="value2"><?php if(!empty($result->value2)){ echo$result->value2; } ?></th>
</tr>
                            
                            
                            
                            </tbody>
                        </table>


                    </div>

		<div class="col-xs-12 no-padding">
			
			<div class="col-xs-6">
            
				<h5  style="margin-top: 15px; margin-right: 30px;
      
                
                "> <?php if(!empty($result->publisher_name)){ echo$result->publisher_name; } ?></h5>
			</div>
			<div class="col-xs-3">

			</div>
			<div class="col-xs-3">

			</div>

		</div>
		<div class="clearfix"></div>


	</div>

<!----------------------------------------->

<div style="height: 115px;">


</div>

<!----------------------------------------->


	<div class="bond-body"  style="position: relative; height: 400px;">



		            <div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
                        <div class="col-xs-1">
                        </div>
                        <div class="col-xs-6">
                            <h6 style="font-weight: bold;"> نوع الإيصال : <span id="tawred_type_span">
                                    <?php if(!empty($result->esal_type_title)){ echo$result->esal_type_title; } ?>
                                </span></h6>
                        </div>

                        <div class="col-xs-5  no-padding">
                            <h6 style="font-weight: bold;"> طريقة التوريد : <span id="pay_method_span">
											<?php
								$pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

											if(!empty($result->pay_method)){ echo$pay_method_arr[$result->pay_method]; } ?>
                                </span>
                                
                                    <span style="float: left; margin-left: 30px;">
                               (    <?php 
                        $unixtime = $result->date_s;
                 echo $time = date(" h:i A",$unixtime);
                        
                        ?> )</span>
                                
                                </h6>
                        </div>
                    </div>


		<div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
			<div class="col-xs-5">
				<h5 style="margin-right: 90px; "><?php if(!empty($result->value)){
                                        echo $result->value; }else{ echo 0;}?></h5>
			</div>
			<div class="col-xs-4">
				<h5 style="margin-right: 90px; "><?=$result->esal_num?></h5>
			</div>
			<div class="col-xs-3">
				<h5 style="float:right; "><?=$result->esal_date?> م </h5>
			</div>
		</div>
		<!-- ahmed -->





<!--
	<div class="col-xs-12 no-padding">
			<div class="col-xs-4">
				<h5>نوع التبرع:<span><?php  if(!empty($result->erad_title)){
                                        echo$result->erad_title; }else{ echo'غير محدد';}?></span></h5>
			</div> 
			<div class="col-xs-3">
				<h5>الفئة :<span><?php  if(!empty($result->fe2a_type_title)){
                                        echo$result->fe2a_type_title; }else{ echo'غير محدد';}?></span></h5>
			</div>
			<div class="col-xs-5">
				<h5>البند :<span ><?php  if(!empty($result->band_title)){
                                        echo$result->band_title; }else{ echo'غير محدد';}?></span></h5>
			</div>
		</div>-->


		<!-- ahmed -->


		<div class="col-xs-12" style="height: 40px; line-height: 40px;">
         <div class="col-xs-8 no-padding">
			<h5 style="margin-right: 120px; ">
            <?php  if(!empty($titles[$result->laqab])){
                                        echo$titles[$result->laqab]->title_setting;  echo'/';} ?>
                                        <?php  if(!empty($result->person_name)){
                                        echo$result->person_name; }else{ echo'غير محدد';}?>
                                        <?php  if(!empty($greetings[$result->tahia])){
                                            echo' - ';
                                        echo$greetings[$result->tahia]->title_setting; } ?>
          </h5>
          </div>
  
   
   
               <?php  if(!empty($result->person_mob)){ ?>
    <div class="col-xs-4">
        <h5> جوال : <span>
<?php echo $result->person_mob; ?>
</span></h5>
    </div>
<?php } ?>
   
          
          
		</div>


		<div class="col-xs-12" style="height: 40px; line-height: 40px;">
			<h5 style="margin-right: 120px; ">     <?php if(!empty($ArabicNum)){
                            echo$ArabicNum; } ?></h5>
		</div>
        
 <?php if( $result->pay_method == 1){ ?>
	<div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
		
	</div>       
                 
<?php }elseif( $result->pay_method ==2){ ?>
	<div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
			<div class="col-xs-5">
				<h5 style="margin-right: 120px;"><?php  if(!empty($result->cheq_num)){
					   echo$result->cheq_num; }else{ echo'غير محدد';}?></h5>
			</div>
			<div class="col-xs-4">
				<h5 style="margin-right: 30px;"><?php  if(!empty($result->bank_title)){
					   echo$result->bank_title; }else{ echo'غير محدد';}?></h5>
			</div>
			<div class="col-xs-3">
				<h5 style="float:right;"><?php  if(!empty($result->date)){
					   echo$result->date; }else{ echo'غير محدد';}?></h5>
			</div>
		</div>



			  <?php }elseif( $result->pay_method ==3){ ?>


<!--
	<div class="col-xs-12 no-padding">
			<div class="col-xs-5">
				<h5>رقم الجهاز: <span><?php  if(!empty($result->device_num)){
					   echo$result->device_num; }else{ echo'غير محدد';}?></span></h5>
			</div>
			<div class="col-xs-4">
				<h5>رقم (التفويض) : <span><?php  if(!empty($result->tafwed_num)){
					   echo$result->tafwed_num; }else{ echo'غير محدد';}?></span></h5>
			</div>
			<div class="col-xs-3">
				<h5 style="float:right;">تاريخ العملية : <span><?php  if(!empty($result->process_date)){
					   echo$result->process_date; }else{ echo'غير محدد';}?></span></h5>
			</div>
		</div> -->

	<div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
			<div class="col-xs-4">
				<h5 style="margin-right: 120px;"><?php  if(!empty($result->tafwed_num)){
					   echo$result->tafwed_num; }else{ echo'غير محدد';}?></h5>
			</div>
			<div class="col-xs-4">
				<h5 style="margin-right: 120px; " ><?php  if(!empty($result->bank_title)){
					   echo$result->bank_title; }else{ echo'غير محدد';}?></h5>
			</div>
			<div class="col-xs-4">
				<h5 style="margin-right: 60px; " ><?php  if(!empty($result->process_date)){
					   echo$result->process_date; }else{ echo'غير محدد';}?></h5>
			</div>
		</div>


				<?php }elseif( $result->pay_method ==4 || $result->pay_method ==5 || $result->pay_method ==6){ ?>


		<!--	<div class="col-xs-12 no-padding">
		<div class="col-xs-5">
				<h5>رقم المرجع : <span><?php  if(!empty($result->marg3_num)){
					   echo$result->marg3_num; }else{ echo'غير محدد';}?></span></h5>
			</div>
			<div class="col-xs-4">
				<h5 style="float:right;">تاريخ العملية : <span><?php  if(!empty($result->marg3_date)){
					   echo$result->marg3_date; }else{ echo'غير محدد';}?></span></h5>
			</div>
			<div class="col-xs-3">
				<h5>إسم البنك : <span><?php  if(!empty($result->bank_title)){
					   echo$result->bank_title; }else{ echo'غير محدد';}?></span></h5>
			</div>
		</div>-->
	
        	<div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
			<div class="col-xs-4">
				<h5 style="margin-right: 120px;"><?php  if(!empty($result->marg3_num)){
					   echo$result->marg3_num; }else{ echo'غير محدد';}?></h5>
			</div>
			<div class="col-xs-4">
				<h5 style="margin-right: 120px;"><?php  if(!empty($result->bank_title)){
					   echo$result->bank_title; }else{ echo'غير محدد';}?></h5>
			</div>
				<div  class="col-xs-4">
				<h5 style="margin-right: 60px;"><?php  if(!empty($result->marg3_date)){
					   echo$result->marg3_date; }else{ echo'غير محدد';}?></h5>
			</div>
		</div>
        
        
        



				<?php }elseif( $result->pay_method ==7){ ?>
				<div class="col-xs-12 no-padding" style="height: 40px; line-height: 40px;">
			<div class="col-xs-5">
				<h5 style="margin-right: 120px;"><?php  if(!empty($result->bank_title)){
					   echo$result->bank_title; }else{ echo'غير محدد';}?></h5>
			</div>
			<div class="col-xs-4">
				<h5 style="margin-right: 120px;"><?php  if(!empty($result->bank_account_title)){
					   echo$result->bank_account_title; }else{ echo'غير محدد';}?></h5>
			</div>
			<div class="col-xs-3">
				<h5 style="margin-right: 60px;"><?php  if(!empty($result->bank_account_num_title)){
					   echo$result->bank_account_num_title; }else{ echo'غير محدد';}?></h5>
			</div>
		</div>


				<?php  } ?>
				<div class="col-xs-10 col-xs-offset-2 no-padding" style="height: 100px;">
                        
                       <table class="table table_style  table-bordered " style="width:97%; float:right;table-layout:fixed;
                         padding-top:20px;
                        ">
                            <tbody>
                           <!-- <tr>
                                <td  style="width:50%; font-weight: bold;" id="erad_tbro3_td"><?php if(!empty($result->erad_title)){ echo$result->erad_title; } ?></td>
                                <td  style="width:50%; font-weight: bold;" class="arabic_number2"><?php if(!empty($result->value)){ echo$result->value; } ?></td>
                                <td style="width:50%; font-weight: bold;"  id="about_td"><?php if(!empty($result->about)){ echo$result->about; } ?></td>
                            </tr>-->
                                <?php   $show_style ='';  if( empty($result->bnd_type2 )){  $show_style ='display: none';  } ?>
<!--
                            <tr>
                                <th  style="" id="band_tbro3_td"><?php if(!empty($result->band_title)){ echo$result->band_title; } ?></th>
                                <th  style="width: 40%;"  class="about_td"><?php if(!empty($result->about)){ echo$result->about; } ?></th>
                                <th  style="<?php echo$show_style;?>"    id="value1"><?php
                                    if(   !empty($result->bnd_type2 )){
                                        echo $result->value1;
                                    }
                                    ?></th>
                            </tr>


                            <tr id="secondFe2aType"   <?php    if( empty($result->bnd_type2 )){ ?> style="display: none" <?php  } ?>>
                                <th  style="" id="band_tbro3_td2"><?php if(!empty($result->band_title2)){ echo$result->band_title2; } ?></th>
                                <th style=""  class="about_td"><?php if(!empty($result->about)){ echo$result->about; } ?></th>
                                <th  style="" id="value2"><?php if(!empty($result->value2)){ echo$result->value2; } ?></th>
                            </tr>
                            -->
                                 <tr>
   <th style="width: 25%; border: 1px solid black !important;     text-align: center;"  id="band_tbro3_td"><?php if(!empty($result->band_title)){ echo$result->band_title; } ?></th>
     <th  style="width:60px; text-align: center; border: 1px solid black !important; <?php echo$show_style;?>"    id="value1"><?php
       if(   !empty($result->bnd_type2 )){
           echo $result->value1;
       }
       ?></th>
  
   <th style="width: 40%; vertical-align: middle; text-align: center; border: 1px solid black !important;"

       <?php    if( !empty($result->bnd_type2 )){ ?>
           rowspan="2"
       <?php  } ?>
       class="about_td"><?php if(!empty($result->about)){ echo$result->about; } ?></th>

  </tr>
                                       
<tr id="secondFe2aType"   <?php    if( empty($result->bnd_type2 )){ ?> style="display: none" <?php  } ?>>
   <th  style="border: 1px solid black !important;     text-align: center;" id="band_tbro3_td2"><?php if(!empty($result->band_title2)){ echo$result->band_title2; } ?></th>
   <th  style="text-align: center;border: 1px solid black !important;" id="value2"><?php if(!empty($result->value2)){ echo$result->value2; } ?></th>
</tr>
                            
                                                                                                                
                            
                            </tbody>
                        </table>


                    </div>

		<div class="col-xs-12 no-padding">
			 
			<div class="col-xs-6">
				<h5 class=""  style="margin-top: 15px; margin-right: 30px;
               
                
                "> <?php if(!empty($result->publisher_name)){ echo$result->publisher_name; } ?></h5>
			</div>
			<div class="col-xs-3">

			</div>
			<div class="col-xs-3">

			</div>

		</div>


	</div>


</section>



</div>


<?php

$kafel='';
if($_GET['type']==='kafel'){
if($result->person_type ==1){
    $kafel =$result->person_id_fk;
}
}?>
<input type="hidden" name="kafel_id" id="kafel_id" value="<?=$kafel?>">



<?PHP 
//ECHO $kafel;
?>


    
       <script>
       var kafel_id = document . getElementById("kafel_id") . value;
       var divElements = document . getElementById("printdiv") . innerHTML;
        var oldPage = document . body . innerHTML;
        document . body . innerHTML =
            "<html><head><title></title></head><body><div id='printdiv'>" +
            divElements + "</div></body>";
        window .print();
       setTimeout(function () {
           if(kafel_id !=''){
               window.location.href ="<?php echo base_url(); ?>st/esalat/Esalat_estlam/addesal?#Modal&id="+kafel_id;
           }else{
               window.location.href ="<?php echo base_url('st/esalat/Esalat_estlam/addesal') ?>";
           }
       //window.location.href ="<?php echo base_url('st/esalat/Esalat_estlam/addesal') ?>";
           //window.location.href ="<?php echo base_url(); ?>st/esalat/Esalat_estlam/addesal?#myRedirectModal&id="+kafel_id;
         }, 500);

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
        window.location.href ="<?php echo base_url('st/esalat/Esalat_estlam/addesal') ?>";
         }, 500);

    </script>
-->
