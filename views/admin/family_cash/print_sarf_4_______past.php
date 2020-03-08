

	<title>طباعه أمر  الصرف</title>
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">

	


	<style type="text/css">
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
		padding: 2px 8px !important;
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
        
	}
	.footer img{
		width: 100%;
		height: 120px;
	}
	@page {
		size: A4;
        /*	margin: 180px 0 135px;*/
		margin: 135px 0 200px;
        border: none;
        
	}
    
	.open_green{
		background-color: #e6eed5;
	}
	.closed_green{
		background-color: #cdddac;
	}
	.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, 
	.table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, 
	.table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
		border: 2px solid #abc572;
		text-align: right;
		vertical-align: middle;
       
	}
    
    
    
    
    /*********************************************************/

			table { page-break-inside:auto }
			tr    { page-break-inside:avoid; page-break-after:auto }
			thead { display:table-header-group }
			tfoot { display:table-footer-group }
	
    
    
</style>


<body id = "printdiv" style="position: relative;">

	<div class="header col-xs-12 no-padding">
      <h4 align="center"><span style="font-weight: 600; border-bottom: 3px solid #999; padding-bottom: 3px;"> إذن صرف  </span> 
      </h4>
		<!--	<div class="col-xs-4 text-center">
  

		<h5>الجمعية الخيرية لرعاية الأيتام ببريدة (أبـناء)</h5>
			<p>مسجلة بوزارة العمل والتنمية الإجتماعية<br> تصريح رقم 463</p>

		</div>
		<div class="col-xs-4 text-center">
			<div class="main-title">
		<img src="<?php echo base_url()?>uploads/images/2d1820ca1e3d8939cef0023a91b0bc0a.png" > 
				<h4>أمر صرف</h4>
			</div>
		</div>
	<div class="col-xs-4 ">
			<h6>الإدارة /.............</h6>
			<h6>القسم / الرعاية الإجتماعية</h6>-->
		</div>

	<div class="clearfix"></div>
	<section class="main-body">
  <?php $months = array("1" => "يناير","2" => "فبراير","3" => "مارس","4" => "أبريل","5" => "مايو",
                "6" => "يونيو","7" => "يوليو","8" => "أغسطس","9" => "سبتمبر","10" => "أكتوبر",
                "11" => "نوفمبر","12" => "ديسمبر"); ?>
		<div class="container">
			<div class="col-xs-12">

<?php // print_r($sarf_data); ?>

<p class="no-mpxs ">
 &nbsp;  &nbsp;بناءً على قرار لجنة الرعاية والمساعدات رقم  (<?php  echo $sarf_data["presence_year"]."/".$sarf_data["presence_number"]  ?>)
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
					
					<table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">رقم الملف</th>
            <th class="text-center">إسم رب الأسرة  </th>
            <th class="text-center">مسؤول الحساب البنكي </th>
         <!--   <th class="text-center">هوية رقم  </th> -->
            <th class="text-center">عدد الأفراد </th>
            <th class="text-center">أرملة </th>
            <th class="text-center">يتيم </th>
            <th class="text-center">مستفيد </th>
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
            <td><?=$row->file_num?></td>
            <td><?=$row->father_full_name?></td>
            <td><?=$row->bank_responsible_name?></td>
            <td><?=($row->mother_num+$row->young_num+$row->adult_num)?></td>
            <td><?=$row->mother_num?></td>
            <td><?=$row->young_num?></td>
            <td><?=$row->adult_num?></td>
            <td><?=$row->value?></td>
            
            
            
            
        </tr>
        <?php  $x++; }?>
        <tr>
          <th style="text-align: center;" colspan="4"> الاجمالى</th>
          
        <th><?=$all_afrad?></th>
       <th><?=$all_aramel?></th>
       <th><?=$all_aytam?></th>
        <th><?=$all_ble3en?></th>
          
          <th><?=$total?></th>
        </tr>
        </tbody>
      
        </table>

				</div>
                
                
                
           


				

			</div>
		</div>
	</section>
    
    
    
         
                
                <div class="footer">
	
				<div class="col-xs-12">
                	<div class="col-xs-4">
						<h6 style="font-weight: 600;" class="text-center">مدخل البيانات </h6> <br />
						<h6 class="text-center">عبدالله صالح حمد المرزوق</h6>
					</div>
                	<div class="col-xs-4">
						<h6 style="font-weight: 600;" class="text-center">التوقيع</h6> <br />
						<h6 class="text-center">..............</h6>
					</div>
                	<div class="col-xs-4">
						<h6 style="font-weight: 600;" class="text-center">التاريخ</h6> <br />
						<h6 class="text-center"> <?php echo  date("Y/m/d ",
                        
                         $sarf_data["sarf_date"] 
                        );
                        
                        ?>
                        
 </h6>
					</div>
                
				
				
				</div>
                <div class="clearfix"></div>
                  <br />
				<div class="col-xs-12">
					<div class="col-xs-4">
						<h6 style="font-weight: 600;" class="text-center">مدير الرعاية الإجتماعية</h6> <br />
						<h6 class="text-center">محمد فهيد صالح القصير</h6>
					</div>
                    <div class="col-xs-4 text-center">
	
					</div>
					<div class="col-xs-4">
						<h6 style="font-weight: 600;" class="text-center">المحاسب</h6> <br />
						<h6 class="text-center">ماجد محمد صالح الركيان</h6>
					</div>
				<!--	<div class="col-xs-4 text-center">
						<h6 class="text-center">مدير الشؤون المالية </h6>
						<h6 class="text-center">سامي نايف عبدالمحسن الحربي</h6>
					</div> -->

				</div>
                  <div class="clearfix"></div>
                <br />
				<div class="col-xs-12">
					<div class="col-xs-4">
						<h6 style="font-weight: 600;" class="text-center">مدير عام الجمعية</h6> <br />
					<h6 class="text-center">سلطان بن محمد بن سليمان الجاسر	</h6>
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



<!--	<div class="footer">
		<p>بريدة - المملكة العربية السعودية</p>
		<p>الهاتف : 063851919 &nbsp فاكس : 063837737 &nbsp جوال : 0553851919 </p>
		<p>س-ب 821 - بريدة 51421 &nbsp&nbsp&nbsp abnaa.bu@gmail.com</p>
	</div>
-->






 



	<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
	<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
	<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
 
<?php  // $previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);?>

<!--
<script >
    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php //echo base_url('').$previos_path ?>";
    }, 10000);
</script >
-->

</body>

