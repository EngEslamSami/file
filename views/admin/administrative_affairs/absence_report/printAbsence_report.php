<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>framework</title>
	<link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/bootstrap-arabic-theme.min.css" />
	<link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/bootstrap-arabic.min.css" />
	<link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/style.css">

	<style type="text/css" >
	.print_forma{
		border:1px solid ;
		padding: 15px;
	}
	.print_forma table th{
		text-align: right;
		font-size: 12px;
	}
	.print_forma table tr th{
		vertical-align: middle;	
	}
	.body_forma{
		margin-top: 40px;
	}
	.no-padding{
		padding: 0;
	}
	.heading{
		font-weight: bold;
		text-decoration: underline;
	}
	.print_forma hr{
		border-top: 1px solid #000;
		margin-top: 7px;
		margin-bottom: 7px;
	}

	.myinput.large{
		height:22px;
		width: 22px;
	}

	.myinput.large[type="checkbox"]:before{
		width: 20px;
		height: 20px;
	}
	.myinput.large[type="checkbox"]:after{
		top: -20px;
		width: 16px;
		height: 16px;
	}
	.checkbox-statement span{
		margin-right: 3px;
		position: absolute;
		margin-top: 5px;
	}
	.header p{
		margin: 0;
	}
	.header img{
		height: 90px;
	}
	.no-border{
		border:0 !important;
	}
	.table-devices tr td{
		min-height: 20px
	}
	.gray_background{
		background-color: #eee;

	}
	.no-margin{
		margin: 0;
	}
	@media print {
		.gray_background{
			background-color: #eee;

		}
		body {
			-webkit-print-color-adjust: exact;
		}
		.print-format th {
			background-color: //your color
		}
	}
	</style>

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
	        window.location = "<?=base_url('Administrative_affairs/'.$url.'')?>";
	    }
	</script>
</head>
<body id="printdiv" onload="return printDiv('printdiv')">
	<div class="header col-xs-12 no-padding">
		<div class="col-xs-6 text-center">
			<p>المملكة العربية السعودية</p>
			<p>الجمعية الخيرية لرعاية المعاقين بحائل (هدكا)</p>
			<p>مسجلة برقم (605)</p>
			<p>تحت إشراف وزارة الشئون الإجتماعية </p>
		</div>
		<div class="col-xs-6 text-center">
			<img src="<?=base_url().'asisst/web_asset/'?>img/logo.png">
		</div>
	</div>
	<div class="col-xs-12 Title">
		<h5 class="text-center"><br> <strong>مساءلة غياب</strong></h5>
	</div>
<?php
$id_num = str_split($record['id_num']);
?>
	<section class="main-body">
		<div class="container-fluid">
			<div class="print_forma no-border col-xs-12 no-padding">
				<div class="personality">
					<div class="col-xs-12">
						<table class="table table-bordered table-devices no-margin">
							<tbody>
								<tr>
									<th   class="gray_background" style="width: 10%">الجمعية</th>
									<td >جمعية هدكا بحائل </td>
									<th  class="gray_background" style="width: 20%">رقم السجل المدنى</th>
									<td><?=$id_num[9]?></td>
									<td><?=$id_num[8]?></td>
									<td><?=$id_num[7]?></td>
									<td><?=$id_num[6]?></td>
									<td><?=$id_num[5]?></td>
									<td><?=$id_num[4]?></td>
									<td><?=$id_num[3]?></td>
									<td><?=$id_num[2]?></td>
									<td><?=$id_num[1]?></td>
									<td><?=$id_num[0]?></td>
								</tr>
								<tr>
									<th  colspan="2" class="gray_background" style="width: 25%">الإسم رباعى</th>
									<th colspan="2" class="gray_background" style="width: 25%"> مقر العمل </th>
									<th colspan="4" class="gray_background" style="width: 25%"> طبيعة العمل </th>
									<th colspan="5" class="gray_background" style="width: 25%"> عدد أيام الغياب</th>
								</tr>
								<tr>
									<td colspan="2"><?=$record['employee']?></td>
									<td colspan="4">الجمعية الخيرية لرعاية المعاقين بحائل (هدكا)</td>
									<td colspan="4"><?=$record['defined_title']?></td>
									<td colspan="3"><?=$record['absence_days_num']?></td>
								</tr>
							</tbody>
						</table>

						<table class="table table-bordered table-devices">
							<tbody>
								<tr>
									<th class="gray_background" style=" width: 25%;">قد تغيبت عن العمل فى الفترة</th>
									<th  class="gray_background" style=" width: 10%;" >في يوم</th>
									<td  ><?=$record['date_from_day']?></td>
									<th  class="gray_background" style=" width: 7%;"  >الموافق</th>
									<td  ><?=date("Y-m-d",$record['date_from'])?></td>

									<th  class="gray_background" style=" width: 10%;"  >في يوم</th>
									<td ><?=$record['date_to_day']?></td>
									<th  class="gray_background" style=" width: 7%;"  >الموافق</th>
									<td ><?=date("Y-m-d",$record['date_to'])?></td>
								</tr>
							</tbody>
						</table>

						<table class="table table-bordered table-devices">
							<tbody>
								<tr>
									<th class="gray_background" style=" width: 15%;">(1) طلب الإفادة</th>
									<th  colspan="5" class="gray_background" style=" width: 80%;" ></th>
								</tr>
								<tr>
									<th class="gray_background" style=" width: 15%;">المكرم</th>
									<td colspan="4"><?=$record['employee']?></td>
									<th  colspan="1" class="gray_background" style=" width: 15%;" >وقفة الله</th>
								</tr>
								<tr>
									<td colspan="6" class="text-center">السلام عليكم ورحمة الله وبركاته , وبعد <br> من خلال متابعة سجل الدوام تبين غيابكم خلال الفترة الموضحة بعاليه امل الإفادة عن أسباب ذلك وعليكم تقديم ما يؤيد عذركم خلال أسبوع من تاريخه , علماَ بأنه فى حاله عدم الإلتزام سيتم اتخاذ اللازم حسب التعليمات</td>
								</tr>
								<tr>
									<th class="gray_background" style=" width: 15%;">إسم الرئيس المباشر</th>
									<td><?=$record['direct_boss']?></td>
									<th  colspan="1" class="gray_background" style=" width: 15%;" > التوقيع</th>
									<td></td>
									<th  colspan="1" class="gray_background" style=" width: 15%;" > التاريخ</th>
									<td><?=date("Y-m-d",$record['statement1_date'])?></td>
								</tr>
							</tbody>
						</table>

						<table class="table table-bordered table-devices">
							<tbody>
								<tr>
									<th class="gray_background" style=" width: 15%;">(2)  الإفادة</th>
									<th  colspan="5" class="gray_background" style=" width: 80%;" ></th>
								</tr>
								<tr>
									<th class="gray_background" style=" width: 15%;">المكرم</th>
									<td colspan="4"> الرئيس المباشر </td>
									<th  colspan="1" class="gray_background" style=" width: 15%;" >وقفة الله</th>
								</tr>
								<tr>
									<td colspan="6" class="text-center">السلام عليكم ورحمة الله وبركاته , وبعد <br> أفيدكم أن غيابى كان للأسباب التالية :  <br> <?=$record['statement2']?>  <br> وأقوم بتقديم مايثبت ذلك</td>
								</tr>
								<tr>
									<th class="gray_background" style=" width: 15%;">إسم الغائب</th>
									<td><?=$record['employee']?></td>
									<th  colspan="1" class="gray_background" style=" width: 15%;" > التوقيع</th>
									<td></td>
									<th  colspan="1" class="gray_background" style=" width: 15%;" > التاريخ</th>
									<td><?=date("Y-m-d",$record['statement2_date'])?></td>
								</tr>
							</tbody>
						</table>

						<table class="table table-bordered table-devices">
							<tbody>
								<tr>
									<th class="gray_background" style=" width: 20%;"> (3) رأى شؤون الموظفين </th>
									<th  colspan="5" class="gray_background" style=" width: 80%;" ></th>

								</tr>
								<?php
								$span1 = $span2 = $span3 = '';
								if($record['openion'] == 1){
									$span1 = '<span class="fa fa-check"></span>';
								}
								if($record['openion'] == 2){
									$span2 = '<span class="fa fa-check"></span>';
								}
								if($record['openion'] == 3){
									$span3 = '<span class="fa fa-check"></span>';
								}
								?>
								<tr>
									<td style=" width: 15%;"><?=$span1?></td>
									<td  colspan="2">  نحتسب له أيام الغياب من الإجازة السنوية </td>
									<td  colspan="1"><?=$span2?></td>
									<td  colspan="2">  نحتسب له إجازة مرضية بعد التأكد من نظامية التقرير </td>
								</tr>
								<tr>
									<td style=" width: 15%;"><?=$span3?></td>
									<td  colspan="2"> يحسم عليه لعدم قبول عذره </td>
									<td  colspan="1">   </td>
									<td  colspan="2"></td>
								</tr>
								<tr>
									<th class="gray_background" style=" width: 15%;">إسم الرئيس المباشر</th>
									<td  colspan="1" ><?=$record['openion_name']?></td>
									<th  colspan="1" class="gray_background" style=" width: 10%;" > التوقيع</th>
									<td  style=" width: 15%;" ></td>
									<th  colspan="1" class="gray_background" style=" width: 10%;" > التاريخ</th>
									<td><?=date("Y-m-d",$record['openion_date'])?></td>
								</tr>
								<tr>
									<td style=" width: 15%;">  ملاحظات هامة </td>
									<td  colspan="5"> يرفق الموظف عذره من تقرير طبى وغيره </td>
								</tr>
							</tbody>
						</table>

						<table class="table table-bordered table-devices">
							<tbody>
								<tr>
									<th class="gray_background" style=" width: 25%;"> (4) قرار مدير الشئون الإدارية </th>
									<th  colspan="5" class="gray_background" style=" width: 80%;" ></th>

								</tr>
								<?php
								$span1 = $span2 = $span3 = $span4 = '';
								if($record['manager_decision'] == 1){
									$span1 = '<span class="fa fa-check"></span>';
								}
								if($record['manager_decision'] == 2){
									$span2 = '<span class="fa fa-check"></span>';
								}
								if($record['manager_decision'] == 3){
									$span3 = '<span class="fa fa-check"></span>';
								}
								if($record['manager_decision'] == 4){
									$span4 = '<span class="fa fa-check"></span>';
								}
								?>
								<tr>
									<td style=" width: 15%;"><?=$span1?></td>
									<td  colspan="2">  نحتسب له أيام الغياب من الإجازة السنوية </td>
									<td  colspan="1"><?=$span2?></td>
									<td  colspan="2">  نحتسب له إجازة مرضية بعد التأكد من نظامية التقرير </td>

								</tr>
								<tr>
									<td style=" width: 15%;"><?=$span3?></td>
									<td  colspan="2"> يحتسب غيابه من رصيده للإجازات الاضطرارية</td>
									<td  colspan="1"><?=$span4?></td>
									<td  colspan="2">  يحسم عليه لعدم قبول عذره </td>

								</tr>
								<tr>
									<th class="gray_background" style=" width: 15%;">إسم مدير الشؤون الإدارية</th>
									<td  colspan="1" ><?=$record['manager_name']?></td>
									<th  colspan="1" class="gray_background" style=" width: 10%;" > التوقيع</th>
									<td  style=" width: 15%;" ></td>
									<th  colspan="1" class="gray_background" style=" width: 10%;" > التاريخ</th>
									<td><?=date("Y-m-d",$record['manager_date'])?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript" src="<?=base_url().'asisst/admin_asset/'?>js/jquery-1.10.1.min.js"></script>
	<script src="<?=base_url().'asisst/admin_asset/'?>js/bootstrap-arabic.min.js"></script>
	<script src="<?=base_url().'asisst/admin_asset/'?>js/custom.js"></script>
</body>