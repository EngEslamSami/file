



    <title>طباعة التحويلات</title>
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
		    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/stylecrm.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">

    <style type="text/css">
		@import url(<?php echo base_url() ?>asisst/admin_asset/fonts/ht/HacenTunisia.css);
		@import url(<?php echo base_url() ?>asisst/admin_asset/fonts/hl/HacenLinerScreen.css);
		@import url(<?php echo base_url() ?>asisst/admin_asset/fonts/ge/ge.css);

		body {
			font-family: 'hl';

		}
		h5{
			margin-top: 5px;
			margin-bottom: 5px;
			font-size: 16px;

		}
		.main-body {
/*
			background-image: url(<?php echo base_url() ?>asisst/admin_asset/img/pills/paper-bg.png);
background-image: url(img/paper-bg.png);
background-position: 100% 100%;
background-size: 100% 100%;
background-repeat: no-repeat;*/
-webkit-print-color-adjust: exact !important;


}
.print_forma {
	padding:  0;
	/*border:1px solid #73b300;*/

}
.piece-box {
	margin-bottom: 0px;
	/*border: 1px solid #000;*/
	display: inline-block;
	width: 100%;
}
.piece-heading {
	background-color: #eee;
	display: inline-block;
	float: right;
	width: 100%;
	padding: 3px;
	color: #000;
}
.piece-body {

	width: 100%;
	float: right;
}
.bordered-bottom{
	border-bottom: 1px solid #000;
}
.piece-footer{
	display: inline-block;
	float: right;
	width: 100%;
	border-top: 1px solid #000;
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
	font-size: 17px;
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
	height: 120px;
	width: 100%
}
.main-title {
	display: table;
	text-align: center;
	position: relative;
	height: 120px;
	width: 100%;
}
.main-title h4 {
	display: table-cell;
	vertical-align: bottom;
	text-align: center;
	width: 100%;
}

.print_forma hr{
	border-top: 1px solid #000;
	margin-top: 7px;
	margin-bottom: 7px;
}

.no-border{
	border:0 !important;
}

.gray_background{
	background-color: #eee;

}
.graytd th,.graytd td{
	background-color: #eee;
}
@media print{
	.footer {
		position: fixed;
		bottom: 0;
		width: 100%;
	}
}
.footer img{
	width: 100%;
	height: 120px;
}


.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
.table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
.table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
	border: 1px solid #000;
	font-size: 17px;
}
.under-line{
	border-top: 1px solid #000;
	padding-left: 0;
	padding-right: 0;
}
span.valu {
	padding-right: 10px;
	font-weight: 600;
	font-family: sans-serif;
}

.under-line .col-xs-3 ,
.under-line .col-xs-4,
.under-line .col-xs-5 ,
.under-line .col-xs-6 ,
.under-line .col-xs-8
{
	border-left: 1px solid #000;
}

.green-border span {
	border: 6px double #000;
	padding: 0px 25px;
	border-radius: 10px;
	box-shadow: 2px 2px 5px 2px #000;
}
label.radio-inline{
	font-size: 17px;
}

.footer-info {
	position: absolute;
	width: 100%;
	bottom: 65px;
}


@media print {

	.table-bordered  th, .table-bordered  td {
		border: 1px solid #000 !important

	}

}


@page {
	size: 210mm 297mm;
	margin: 150px 10px 180px 10px;

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

.header-info, .header-space{
	height: 192px;
}
.footer-info, .footer-space {
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
</style>

<body  onload="printDiv('printDiv')" id="printDiv">
 <?php //echo"<pre>"; print_r($result); echo"</pre>"; //die; ?>

 <section class="main-body">

			 <div class="container-fluid">

				 <div class="print_forma  col-xs-12">
					 <div class="col-xs-12 no-padding" style="margin-top: 5px">
						 <div class="col-xs-3 text-center">

						 </div>
						 <div class="col-xs-5 text-center">
							 <h4 class="green-border"><span>نموذج طلب تحويل</span></h4>
						 </div>
						 <div class="col-xs-4 text-center">

						 </div>
					 </div>


					 <div class="piece-box" style="margin-top: 10px">
						 <div class="col-xs-12">
							 <?php
		 					if(!empty($_POST['method_type'])){
		 									 if( $_POST['method_type']  ==1){ ?>
		 					<h5 class="text-center" style="text-align: center;">
		 						عن طريق المصرف /البنك
		 					</h5>
		 					<?php }elseif($_POST['method_type'] ==2){ ?>
		 					<h5 class="text-center" style="text-align: center;">
		 						عن طريق الأونلاين

		 					</h5>
		 					<?php }  } ?>
						 </div>
						 <div class="col-xs-11 col-xs-offset-1">
							 <h3 style="font-weight: bold;margin-top: 6px;margin-bottom: 0">سعادة/مدير عام الجمعية <span style="float: left;">حفظه الله</span> </h3>
						 </div>
						 <div class="col-xs-12">

							 <h5> 	 <?php if(!empty($_POST['salam'])){  echo $_POST['salam']; } ?></h5>
							<h5> 	 <?php if(!empty($_POST['debaga'])){  echo $_POST['debaga']; } ?></h5>

<!--
							<h5> السلام عليكم ورحمة الله وبركاته ،،وبعد،،،</h5>
				 		<h5> نرجوا من سعادتكم الموافقة على التحويل من الحسابات الفرعيةب/<?=$result->bank_name?> إلى الحساب الرئيسي وفقا للجدول التالي :-    </h5>
-->
						 </div>
						 <div class="col-xs-12">
							 <table class="table table-bordered">
								 <thead >
									 <tr class="graytd">
										 <th class="text-center" style="text-align: center;">
											 المبلغ
										 </th>
										 <th class="text-center" style="text-align: center;">
											 الحساب المحول منه

										 </th>
										 <th class="text-center" style="text-align: center;">
											 الحساب المحول إليه

										 </th>
									 </tr>
								 </thead>
								 <tbody>
									 <?php if(!empty($result_details)){
										 foreach ($result_details as   $value) {

									 ?>
									 <tr>
										 <td><?php echo number_format($value->value,2).' '.convertNumber($value->value).'  ريال فقط لا غير' ;?></td>
										 <td><?php echo $value->from_ayban_rkm_full.'-'.$value->from_general_hesab_name;?></td>
										 <td><?php echo $value->to_ayban_rkm_full.'-'.$value->to_general_hesab_name;?></td>
									 </tr>
								 <?php }  } ?>
									 <!--<tr>
										 <td>800,000,00 ثمانمائة ألف ريال فقط لا غير</td>
										 <td>212608010511008 - الزكاة</td>
										 <td>212608010510000 - العام</td>
									 </tr>
									 <tr>
										 <td>500,000,00 خمسمائة ألف ريال فقط لا غير</td>
										 <td>212608010515157 - الوقف</td>
										 <td>212608010510000 - العام</td>
									 </tr>
									 <tr>
										 <td>800,000,00 ثمانمائة ألف ريال فقط لا غير</td>
										 <td>212608010511008 - الزكاة</td>
										 <td>212608010510000 - العام</td>
									 </tr>
									 <tr>
										 <td>500,000,00 خمسمائة ألف ريال فقط لا غير</td>
										 <td>212608010515157 - الوقف</td>
										 <td>212608010510000 - العام</td>
									 </tr>
									 <tr>
										 <td>800,000,00 ثمانمائة ألف ريال فقط لا غير</td>
										 <td>212608010511008 - الزكاة</td>
										 <td>212608010510000 - العام</td>
									 </tr>
-->
								 </tbody>
								 <tfoot>
									 <th >الغرض من التحويل</th>
									 <th style="text-align: right;" colspan="2"><?php if(!empty( $result->reason)){ echo $result->reason;}?></th>
								 </tfoot>
							 </table>
						 </div>
						 <div class="col-xs-12">

							 <h5>   المندوب المفوض/<?php if(!empty($result->emp_name)){ echo $result->emp_name;}?> رقم الهوية/ <?php if(!empty($result->emp_card_num)){ echo $result->emp_card_num;}?> التوقيع/-------- التاريخ/<?php if(!empty($result->process_date)){ echo date('d-m-Y',$result->process_date);}?> م</h5>
						 </div>
					 </div>
                     <?php if(!empty($level_2data)){ ?>
					 <div class="piece-box" style="margin-top: 0px">

						 <div class="col-xs-12 ">
							 <div class="col-xs-12 no-padding gray_background " >
								 <div class="col-xs-6">
									 <h5>	إفادة الشؤون المالية والإدارية  </h5>
								 </div>
								 <div class="col-xs-6 text-center">
									 <h5 >	(تمت المراجعة و التأكد من صحة البيانات )  </h5>
								 </div>

							 </div>
						 </div>

						 <div class="col-xs-12">
							 <div class="col-xs-6 text-center">
								 <h5>المحاسب </h5>
								 	<h5><?php if(!empty($level_2data)){ echo $level_2data->from_user_n;} ?></h5>
							 </div>
							 <div class="col-xs-6 text-center">
								 <h5>مدير الشئون المالية والإدارية </h5>
									<h5><?php if(!empty($level_2data)){ echo $level_2data->to_user_n;} ?></h5>
							 </div>
						 </div>


						 <!--<div class="col-xs-12 ">
							 <div class="col-xs-12 no-padding gray_background text-center " >
								 <h5>	توجيه المدير العام </h5>

							 </div>


						 </div>
						 <div class="col-xs-12">
							 <table class="table table-bordered">
								 <thead >
									 <tr class="">
										 <th class="text-center" style="text-align: center;">
											 <i class="fa fa-circle"></i> لا مانع
										 </th>
										 <th class="text-center" style="text-align: center;">
											 <i class="fa fa-circle-o"></i> أخرى ..........................

										 </th>
									 </tr>
								 </thead>
							 </table>
						 </div>

						 <div class="col-xs-12">
							 <div class="col-xs-7 text-center">

							 </div>
							 <div class="col-xs-5 text-center">
								 <h5> مدير عام الجمعية </h5>
									<h5><?php if(!empty($level_3data)){ echo $level_3data->to_user_n;} ?></h5>
							 </div>
						 </div>-->

						 <?php 	if(!empty($result->method_type)){ if($result->method_type  ==2){ ?>


						 <div class="col-xs-12 text-center">
							 <h5 style="    margin: 0;"><span class=" gray_background text-center " style="    padding: 5px 20px;">
								 المفوضين بالتوقيع

							 </span></h5>


						 </div>

						 <div class="col-xs-12">
							 <div class="col-xs-6 text-center">
								 <h5>أمين الصندوق </h5>
								 <h5>-----------</h5>
							 </div>
							 <div class="col-xs-6 text-center">
								 <h5>رئيس مجلس الإدارة</h5>
								 <h5>-----------</h5>
							 </div>
						 </div>

          <?php }  }?>


					 </div>
                     <?php } ?>




				 </div>
			 </div>


			 <div class="col-xs-12 no-padding print-details-footer">
				 <div class="col-xs-6">
					 <p class=" text-center" style="margin-bottom: 0;">
						 <small> (بواسطة: <?php if(!empty($result->publisher_name)){ echo $result->publisher_name; } ?>)</small>
					 </p>

				 </div>
				 <div class="col-xs-2">
				 </div>
				 <div class="col-xs-4">

					 <p class=" text-center" style="margin-bottom: 0;">
						 <small>تاريخ الطباعة : <?php echo date('d-m-Y');?></small>
					 </p>
				 </div>


			 </div>


		 </section>



</body>







<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/custom.js"></script>

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
        window.close();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script>
