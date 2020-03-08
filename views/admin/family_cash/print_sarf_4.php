

	<title>طباعة أمر الصرف</title>
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">

	


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

    .main-body{
        	position: relative;
    }
	.print_forma{
	position: relative;
		padding: 15px;
	}
	.piece-box {
		margin-bottom: 12px;
		border: 1px solid #73b300;
	
	}
	.piece-heading {
		background-color: #9bbb59;
	
		float: right;
		width: 100%;
	}
	.piece-body {
		
		width: 100%;
		float: right;
	}
	.bordered-bottom{
	/*	border-bottom: 4px solid #9bbb59 !important;*/
	}
	.piece-footer{
		display: inline-block;
		float: right;
		width: 100%;
	/*	border-top: 1px solid #73b300;*/
	}
	.piece-heading h5 {
		margin: 4px 0;
	}
	.piece-box table{
		margin-bottom: 0
	}
	.piece-box table th,
	.piece-box table td
	{
		padding: 0px 8px !important;
	}

	h6 {
		font-size: 16px;
		margin-bottom: 3px;
		margin-top: 3px;
	}
	.print_forma table th{
		text-align: right;
	}
	.print_forma table tr th{
		vertical-align: middle;	
	}
	.no-padding{
		padding: 0;
	}
	.header p{
		margin: 0;
	}
	.header img{
		height: 70px; 
		width: 80px;
		margin: auto;
	}
	.main-title {
	
		text-align: center;
	
		height: 120px;
		
	}
	.main-title h4 {

		text-align: center;
		width: 100%;
		margin: 0
	}

	.print_forma hr{
		border-top: 1px solid #999;
		margin-top: 7px;
		margin-bottom: 7px;
	}
	
	.no-border{
		border:0 !important;
	}
	
	.gray_background{
		background-color: #eee;

	}
    
    
	@media print{

	   a[href],a[is="action-link"]{
	       display: none !important;
	   }
       a:link:after,a:visited:after {  
          content: none !important;  
          
     } 
     
	   .table-bordered{
	       border-bottom: 0;
	   }
		 .table-bordered > tbody > tr > td,.table-bordered > tbody > tr > th{
		  background-color: #fff !important;
          border: 1px solid #777 !important;
          font-size:14px !important;
          
		}
        .table-bordered > thead > tr > th{
             background-color: #e8e8e8;
             font-size:16px;
        }
        table th , table td{
            font-size: 13px;
        }
        
        .piece-box table th, .piece-box table td {
            padding:3px 8px !important; 
           	border: 1px solid #222  !important;
      		text-align: right;
      		vertical-align: middle;
        }
            .no-mpxs{
            margin: 0;
        }
        .pprl{
            padding: 0 30px;
        }
        
        .report-container td, p {
            page-break-inside: avoid;
          }
          
          	.piece-box table th,
        	.piece-box table td
        	{
        		padding: 0px 2px !important;
        	}
          
      
            
	}
    
  
    
    
    
    
	@page {
	/*	size: A4;
    	margin: 150px 0 200px;
        border: none;
        */
         size: 210mm 297mm;
         /*margin: 10px 10px 44px 10px;*/
           margin: 2px 10px 40px 10px;
         
          
        
	}

	.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, 
	.table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, 
	.table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
		border: 2px solid #abc572;
		text-align: right;
		vertical-align: middle;
       
	}
    
    
    
    
    /*********************************************************/

	/*		table { page-break-inside:auto }
			tr    { page-break-inside:avoid; page-break-after:auto }
			thead { display:table-header-group }
			tfoot { display:table-footer-group }*/
	
    
    
    
    

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

.header-info, .header-space{
   /* height: 192px;*/
   height: 192px;
}
.footer-info, .footer-space {
  /*height: 170px;*/
 height: 170px;
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
  .header-info h4{
    margin-top: 150px;
  }
  
  /*
.header-info h4 span {
    display: inline-block;
    width: auto;
    border: 2px solid #555;
    background-color: #eee;
   
    font-size: 14px !important;
    padding: 3px 34px;
    height: 37px;
    line-height: 32px;
    vertical-align: middle;
    box-shadow: 4px 3px;
}
*/




    
    
    
</style>



<body id = "printdiv" style="position: relative;">

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
   

             
            	<section class="main-body">
              <?php $months = array("1" => "يناير","2" => "فبراير","3" => "مارس","4" => "أبريل","5" => "مايو",
                            "6" => "يونيو","7" => "يوليو","8" => "أغسطس","9" => "سبتمبر","10" => "أكتوبر",
                            "11" => "نوفمبر","12" => "ديسمبر"); ?>
            		<div class="container-fluid">
                    <h4 align="center"><span style="font-weight: 600; border-bottom: 3px solid #999; padding-bottom: 3px;"> إذن صرف  </span> </h4>
            			<div class="col-xs-12">
            
            <?php 
            
            
            
            
             ?>
            
            <p class="no-mpxs ">
             &nbsp;  &nbsp;بناءً على قرار لجنة الرعاية والبرامج التنموية رقم  (<?php  echo $sarf_data["presence_year"]."/".$sarf_data["presence_number_galsa"]  ?>)
             برجاء الموافقة على 
                   
                تغذية    بطاقات الأسر البنكية لـ  
                <?=$sarf_data["about"]?>
                <!--
                خلال شهر 
                   <?php if (isset( $months[ $sarf_data["mon_melady"]])){ echo $months[ $sarf_data["mon_melady"]];}?>
                   -->
                     للأسماء الموضحة بياناتها  بالكشف وهى كالتالى :- 
            
            </p>
            			</div>
            
            
            			<div class="print_forma  col-xs-12 no-padding">
            				<div class="piece-box no-border">
            				
                    <?php if($sarf_data['bnod_help_fk'] == 4 ){ ?>
                                   
                            	
            	<table id="" class="table table-striped table-bordered allResult" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الملف</th>
                        <th class="text-center">إسم رب الأسرة  </th>
                        <th class="text-center">مسؤول الحساب البنكي </th>
                 
                        <th class="text-center">عدد الأفراد </th> 
            
                    <th class="text-center">الفئة </th> 
                        
                        <th class="text-center">قيمة الإيجار </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">   
                      
                           
                    <?php
                    /*echo '<pre>'; 
                    print_r($sarf_details2);
                    
                    die;*/
                     $total =0;
                          $all_afrad=0;
                          $all_aramel=0;
                          $all_aytam=0;
                          $all_ble3en=0;
                          $x=1; 
                          foreach ($sarf_details2 as $row){
                           
                          $total += $row->value;
                         
                         
                         $all_afrad += ($row->mother_num+$row->young_num+$row->adult_num);
                         $all_aramel  += $row->mother_num;
                          $all_aytam  +=$row->young_num;
                         $all_ble3en  +=$row->adult_num;
                         
                         
                         ?>
                    <tr>
            
                        
                        <td><?php echo $x;?></td>
                        <td><?=$row->file_num?></td>
                        <td><?=$row->father_full_name?></td>
                        <td><?=$row->bank_responsible_name?></td>
                      <td><?=($row->mother_num+$row->young_num+$row->adult_num)?></td> 
                      <!---------------------------------------------------------------------------->
            
                      <!---------------------------------------------------------------------------->
                      <!--  <td><?=$row->mother_num?></td>
                        <td><?=$row->young_num?></td>
                        <td><?=$row->adult_num?></td>
                      -->
                      
                      
                       <td><?=$row->fe2a_title?></td>
                      
                      
                        <td><?=$row->value?></td>
                        
                        
                        
                        
                    </tr>
                    <?php  $x++; }?>
                    <tr>
                 
                    
                      <th style="text-align: center; font-size: 17px !important;" colspan="6"> الإجمــــــــــــــــــــــــــــــالــي</th>
                      <!--  <th><?=$all_afrad?></th>
                      <th></th>-->
                  
                   <!---------------------------------------------------------->
                   
            
                      
            
                      <th  style="font-size: 17px !important;"><?=$total?></th>
                    </tr>
                      
                      </tbody>
                      </table>
                        
                        
               <?php     }else{ ?>
                        
                        
                     
                            
                            
                            	
        <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center" style="width: 80px;">رقم الملف</th>
                        <th class="text-center">إسم رب الأسرة  </th>
                        <th class="text-center">مسؤول الحساب البنكي </th>
                 
                      <!--  <th class="text-center">عدد الأفراد </th> -->
              <?php
              
              // value_mostafed  value_yatem  value_armal
               if($sarf_data['value_yatem'] != 0 and $sarf_data['value_armal'] ==0 and $sarf_data['value_mostafed'] ==0){
               
                ?>
                <th class="text-center">يتيم </th>
             <?php }elseif($sarf_data['value_yatem'] == 0 and $sarf_data['value_armal'] != 0 and $sarf_data['value_mostafed'] ==0){ 
               
                ?>
                <th class="text-center">أرملة </th>
               <?php }elseif($sarf_data['value_yatem'] == 0 and $sarf_data['value_armal'] == 0 and $sarf_data['value_mostafed'] !=0){
               
                ?>
                <th class="text-center" style="width: 80px;">مستفيد </th>
                  <?php }elseif($sarf_data['value_yatem'] != 0 and $sarf_data['value_armal'] != 0 and $sarf_data['value_mostafed'] ==0){ 
                    
                    ?> 
                        <th class="text-center">أرملة </th>
                        <th class="text-center">يتيم </th>
                  <?php }elseif($sarf_data['value_yatem'] != 0 and $sarf_data['value_armal'] == 0 and $sarf_data['value_mostafed'] !=0){
                   
                    ?>
                          <th class="text-center">يتيم </th>
                        <th class="text-center">مستفيد </th>
                        
                     <?php }elseif($sarf_data['value_yatem'] == 0 and $sarf_data['value_armal'] != 0 and $sarf_data['value_mostafed'] !=0){
                        
                        ?>   
                      <th class="text-center">أرملة </th>
                        <th class="text-center">مستفيد </th>
                     <?php }elseif($sarf_data['value_yatem'] != 0 and $sarf_data['value_armal'] != 0 and $sarf_data['value_mostafed'] !=0){ 
                        
                        ?>
                      <th class="text-center">أرملة </th>
                        <th class="text-center">يتيم </th>
                        <th class="text-center">مستفيد </th>
                     
                     <?php } ?>
                      <!--  <th class="text-center">أرملة </th>
                        <th class="text-center">يتيم </th>
                        <th class="text-center">مستفيد </th>
                        -->
                        
                        <th class="text-center">إجمالى </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                 /*   echo '<pre>';
                    print_r($sarf_details);
                    echo '<pre>';*/
                    ?>
            
                    
                    <?php  $total =0;
                          $all_afrad=0;
                          $all_aramel=0;
                          $all_aytam=0;
                          $all_ble3en=0;
                          $x=1; 
                          foreach ($sarf_details as $row){
                           
                          $total += $row->value;
                         
                         
                         $all_afrad += ($row->mother_num+$row->young_num+$row->adult_num);
                         $all_aramel  += $row->mother_num;
                          $all_aytam  +=$row->young_num;
                         $all_ble3en  +=$row->adult_num;
                         
                         
                         ?>
                    <tr>
            
                        
                        <td><?php echo $x;?></td>
                        <td class="text-center"><?=$row->file_num?></td>
                        <td><?=$row->father_full_name?></td>
                        <td><?=$row->bank_responsible_name?></td>
                      <!--  <td><?=($row->mother_num+$row->young_num+$row->adult_num)?></td> -->
                      <!---------------------------------------------------------------------------->
                     <?php 
                if($sarf_data['value_yatem'] != 0 and $sarf_data['value_armal'] ==0 and $sarf_data['value_mostafed'] ==0){ ?>
               <td class="text-center"><?=$row->young_num?></td>
             <?php }elseif($sarf_data['value_yatem'] == 0 and $sarf_data['value_armal'] != 0 and $sarf_data['value_mostafed'] ==0){ ?>
               <td class="text-center"><?=$row->mother_num?></td>
               <?php }elseif($sarf_data['value_yatem'] == 0 and $sarf_data['value_armal'] == 0 and $sarf_data['value_mostafed'] !=0){ ?>
                 <td class="text-center"><?=$row->adult_num?></td>
                  <?php }elseif($sarf_data['value_yatem'] != 0 and $sarf_data['value_armal'] != 0 and $sarf_data['value_mostafed'] ==0){  ?> 
                       <td class="text-center"><?=$row->mother_num?></td>
                        <td class="text-center"><?=$row->young_num?></td>
                  <?php }elseif($sarf_data['value_yatem'] != 0 and $sarf_data['value_armal'] == 0 and $sarf_data['value_mostafed'] !=0){  ?>
                          <td class="text-center"><?=$row->young_num?></td>
                         <td class="text-center"><?=$row->adult_num?></td>
                        
                     <?php }elseif($sarf_data['value_yatem'] == 0 and $sarf_data['value_armal'] != 0 and $sarf_data['value_mostafed'] !=0){?>   
                        <td class="text-center"><?=$row->mother_num?></td>
                         <td class="text-center"><?=$row->adult_num?></td>
                     <?php }elseif($sarf_data['value_yatem'] != 0 and $sarf_data['value_armal'] != 0 and $sarf_data['value_mostafed'] !=0){?>   
                        <td class="text-center"><?=$row->mother_num?></td>
                         <td class="text-center"><?=$row->young_num?></td>
                         <td class="text-center"><?=$row->adult_num?></td>
                     <?php } ?>
                      
                      
                      
                      <!---------------------------------------------------------------------------->
                      <!--  <td><?=$row->mother_num?></td>
                        <td><?=$row->young_num?></td>
                        <td><?=$row->adult_num?></td>
                      -->
                      
                      
                      
                      
                      
                        <td class="text-center"><?=$row->value?></td>
                        
                        
                        
                        
                    </tr>
                    <?php  $x++; }?>
                    <tr>
                      <th style="text-align: center; font-size: 17px !important;" colspan="4"> الاجمالى</th>
                      
                   <!-- <th><?=$all_afrad?></th>-->
                   <!---------------------------------------------------------->
                   
                            <?php 
                if($sarf_data['value_yatem'] != 0 and $sarf_data['value_armal'] ==0 and $sarf_data['value_mostafed'] ==0){ ?>
              <th  class="text-center" style="font-size: 17px !important;"><?=$all_aytam?></th>
             <?php }elseif($sarf_data['value_yatem'] == 0 and $sarf_data['value_armal'] != 0 and $sarf_data['value_mostafed'] ==0){ ?>
               <th  class="text-center" style="font-size: 17px !important;"><?=$all_aramel?></th>
               <?php }elseif($sarf_data['value_yatem'] == 0 and $sarf_data['value_armal'] == 0 and $sarf_data['value_mostafed'] !=0){ ?>
                  <th  class="text-center" style="font-size: 17px !important;"><?=$all_ble3en?></th>
                  <?php }elseif($sarf_data['value_yatem'] != 0 and $sarf_data['value_armal'] != 0 and $sarf_data['value_mostafed'] ==0){  ?> 
                        <th  class="text-center" style="font-size: 17px !important;"><?=$all_aramel?></th>
                       <th  class="text-center" style="font-size: 17px !important;"><?=$all_aytam?></th>
                  <?php }elseif($sarf_data['value_yatem'] != 0 and $sarf_data['value_armal'] == 0 and $sarf_data['value_mostafed'] !=0){  ?>
                         <th  class="text-center" style="font-size: 17px !important;"><?=$all_aytam?></th>
                           <th  class="text-center" style="font-size: 17px !important;"><?=$all_ble3en?></th>
                        
                     <?php }elseif($sarf_data['value_yatem'] == 0 and $sarf_data['value_armal'] != 0 and $sarf_data['value_mostafed'] !=0){?>   
                       <th  class="text-center" style="font-size: 17px !important;"><?=$all_aramel?></th>
                         <th  class="text-center" style="font-size: 17px !important;"><?=$all_ble3en?></th>
                     <?php }elseif($sarf_data['value_yatem'] != 0 and $sarf_data['value_armal'] != 0 and $sarf_data['value_mostafed'] !=0){?>   
                       <th  class="text-center" style="font-size: 17px !important;"><?=$all_aramel?></th>
                        <th  class="text-center" style="font-size: 17px !important;"><?=$all_aytam?></th>
                         <th  class="text-center" style="font-size: 17px !important;"><?=$all_ble3en?></th>
                     <?php } ?>
                      
            
                      <th  class="text-center" style="font-size: 17px !important;"><?=$total?></th>
                    </tr>
                    </tbody>
                  
                    </table>
                    
                    
                     <?php   } ?>    
                    
                    
                    
                    
                    
                    
            
            				</div>
                            
                            
                            
                       
            
            
            				
            
            			</div>
                        
                        
                       	<div class="col-xs-12">
                        	<div class="col-xs-6">
        						<p style="font-weight: 600;" class="text-center">مسؤول خدمات المستفيدين / 
                                         <!-- عبدالله براهيم عبدالله الضبيعي -->
                                         <!-- عبدالله صالح حمد المرزوق -->
                                <?php echo $Publisher_name; ?>
                                </p> 
        					
        					</div>
                        	<div class="col-xs-2">
        					<!--	<h6 style="font-weight: 600;" class="text-center">التوقيع</h6> 
        					-->
        					</div>
                        	<div class="col-xs-3">
        						<p style="font-weight: 600;" class="text-center">التاريخ : 
                                <?php echo  date("Y/m/d ",
                                
                                 $sarf_data["sarf_date"] 
                                );
                                
                             // echo  $sarf_data["sarf_date_ar"] ;
                                                
                                                ?>
                                                </p> 
                        
                        	</div>
                                      	
                       	</div>
                
                
            		</div>
            	</section>
    
    
    
         
                
                <div class="footer">
	
			
                <div class="clearfix"></div>
                  <br />
				<div class="col-xs-12">
					<div class="col-xs-4">
						<h6 style="font-weight: 600;" class="text-center">مدير الرعاية والبرامج التنموية</h6> <br />
						<h6 class="text-center">
                                         <?php 
                    
                    if(isset($modeer_family) and $modeer_family !=null){
                        echo $modeer_family;
                    }else{
                        
                    }
                    ?>
                        
                         </h6>
					</div>
                    <!--<div class="col-xs-4 text-center">
	
					</div>-->
					<div class="col-xs-4">
						<h6 style="font-weight: 600;" class="text-center">المحاسب</h6> <br />
						<h6 class="text-center">
                                 <?php 
                    
                    if(isset($mohaseb) and $mohaseb !=null){
                        echo $mohaseb;
                    }else{
                        
                    }
                    ?>
                         </h6>
					</div>
				<div class="col-xs-4 text-center">
						<h6 style="font-weight: 600;" class="text-center">مدير الشؤون المالية والإدارية</h6><br />
						<h6 class="text-center">
                          <?php 
                    
                    if(isset($modeer_mali) and $modeer_mali !=null){
                        echo $modeer_mali;
                    }else{
                        
                    }
                    ?>
                        </h6>
					</div> 

				</div>
                  <div class="clearfix"></div>
                <br />
				<div class="col-xs-12">
					<div class="col-xs-4">
						<h6 style="font-weight: 600;" class="text-center">مدير عام الجمعية </h6> <br />
					<h6 class="text-center">
                    <?php 
                    
                    if(isset($modeer_3am) and $modeer_3am !=null){
                        echo $modeer_3am;
                    }else{
                        
                    }
                    ?>
                    
                    	</h6>
					</div>
					<div class="col-xs-4"> 
						<h6 style="font-weight: 600;" class="text-center">أمين الصندوق - عضو مجلس الإدارة </h6> <br />
					<h6 class="text-center">عبدالله بن عبد العزيز الصبيحي</h6>
					</div>
					<div class="col-xs-4 text-center">
						<h6 style="font-weight: 600;" class="text-center">رئيس مجلس الإدارة</h6> <br />
						<h6 class="text-center">عبد الرحمن محمد سليمان البليهي</h6>
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






<div class="header-info" style="background-color: #fff;">
 <!-- <h4 align="center"><span style="font-weight: 600; border-bottom: 3px solid #999; padding-bottom: 3px;"> إذن صرف  </span> 
      </h4>-->
</div>


<div class="footer-info"  >

    

</div>







	<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
	<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
	<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
 
<?php  $previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);?>


<script >


  /*      
var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
        
       
          window .print();
        
    
    setTimeout(function () {
        window.location.href ="<?php //echo base_url('').$previos_path ?>";
    }, 10000);*/
</script >


</body>

