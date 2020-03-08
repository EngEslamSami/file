


	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">




	<style type="text/css">

		.print_forma{
		/*border:1px solid #73b300;*/
		padding: 15px;
	}
	.piece-box {
		margin-bottom: 12px;
		border: 1px solid #73b300;
		display: inline-block;
		width: 100%;
	}
	.piece-heading {
		background-color: #9bbb59;
		display: inline-block;
		float: right;
		width: 100%;
	}
	.piece-body {

		width: 100%;
		float: right;
	}
	.bordered-bottom{
		border-bottom: 4px solid #9bbb59 !important;
	}
	.piece-footer{
		display: inline-block;
		float: right;
		width: 100%;
		border-top: 1px solid #73b300;
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
		/* display: table; */
		text-align: center;
		/* position: relative; */
		height: 120px;
		/* width: 40%; */
	}
	.main-title h4 {
		/* display: table-cell; */
		/* vertical-align: bottom; */
		text-align: center;
		width: 100%;
		margin: 0
	}

	.print_forma hr{
		border-top: 1px solid #73b300;
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
		.footer {
			position: fixed;
			bottom: 0;
			width: 100%;
		}
		tr {
			border-color: greenyellow;
		}
	}
	.footer img{
		width: 100%;
		height: 120px;
	}
	@page {
		size: A4;
		margin: 20px 0 0;
	}
	.open_green{
		background-color: #e6eed5;
	}
	.closed_green{
		background-color: #cdddac;
	}
	.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
	.table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
	.table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td,
	.table-bordered tr td,
	.table-bordered tr th
	{
		border: 1px solid #cdddac !important;
	}

</style>


</head>
<body id = "printdiv">

	<div class="header col-xs-12 no-padding">
		<div class="col-xs-4 text-center">
			<h5>الجمعية الخيرية لرعاية الأيتام ببريدة (أبـناء)</h5>
			<p>مسجلة بوزارة العمل والتنمية الإجتماعية<br> تصريح رقم 463</p>

		</div>
		<div class="col-xs-4 text-center">
			<div class="main-title">
				<img src="<?php echo base_url()?>uploads/images/2d1820ca1e3d8939cef0023a91b0bc0a.png" >
				<h4>إذن صرف</h4>
			</div>
		</div>
		<div class="col-xs-4 ">
			<h6>الرقم : ..............</h6>
			<h6>التاريخ : ..............</h6>
			<h6>المرفقات : ..............</h6>
			<h6>الموضوع : ..............</h6>
		</div>
	</div>
	<div class="clearfix"></div>	<br>
	<section class="main-body">

		<div class="container">
			<div class="col-xs-8 ">
				<h5>سعادة مدير عام الجمعية         <strong style="float: left;" >سلمه الله</strong></h5>
			</div>
			<div class="col-xs-12">
				<h5 class="text-center">السلام عليكم ورحمة الله وبركاته ...</h5>
			</div>
			<div class="col-xs-8 col-xs-offset-2">
				<h6>أرجو من سعادتكم التكرم بالتوجيه إلى من يلزم بصرف التالى :-</h6>
			</div>
			<div class="print_forma  col-xs-12 no-padding ">
				<div class="piece-box no-border">
					<br>
					<table class="table table-bordered" style="table-layout: fixed; ">
						<tbody>
							<tr  class="bordered-bottom">
								<td width="30%">مبلغ وقدره  </td>
								<td><?=$sarf_data["total_value"]?></td>
							</tr>
							<tr class=" open_green">
								<td width="30%">اسم الجهه / المستفيد</td>
								<td><?=$sarf_details[0]->mother_name?></td>
							</tr>
							<tr>
								<td width="30%">عبارة عن </td>
								<td><?=$sarf_data["about"]?></td>
							</tr>
						</tbody>
					</table>
					<br>
					<table class="table table-bordered" style="table-layout: fixed">
						<tbody>
						<tr  class=" open_green">
							<td width="30%">المسئول  :         </td>
							<td> </td>
						</tr>
						<tr  class=" closed_green">
							<td width="30%">مدير الإدارة  :   </td>
							<td></td>
						</tr>
						</tbody>
					</table>
					<br>
					<table class="table table-bordered" style="table-layout: fixed">
						<tbody>
						<tr  class=" open_green bordered-bottom">
							<th  colspan="2" style="text-align: center">إفادة الشئؤون المالية        </th>
						</tr>
						<tr  class=" open_green">
							<td width="30%" >اسم البند(الحساب)   </td>
							<td></td>
						</tr>
						<tr>
							<td width="30%">ملاحظات  </td>
							<td></td>
						</tr>
						<tr  class=" open_green">
							<td  style="text-align: center">المحاسب  </td>
							<td  style="text-align: center"> مدير الشؤون المالية</td>
						</tr>
						<tr>
							<td  >   الأسم ،التوقيع</td>
							<td > الأسم ،التوقيع </td>
						</tr>
						</tbody>
					</table>
					<br>
					<table class="table table-bordered" style="table-layout: fixed">
						<tbody>
						<tr  class=" open_green bordered-bottom">
							<th   style="text-align: center">توجيه المدير العام      </th>
						</tr>
						<tr  class=" open_green">
							<td>
								<div class="col-xs-3">
									<h6><i class="fa fa-square" aria-hidden="true"></i> لا مانع من الصرف :</h6>
								</div>
								<div class="col-xs-3">
									<h6><i class="fa fa-square" aria-hidden="true"></i> نقداَ</h6>
								</div>
								<div class="col-xs-3">
									<h6><i class="fa fa-square-o" aria-hidden="true"></i> إصدار شيك</h6>
								</div>
								<div class="col-xs-3">
									<h6><i class="fa fa-square-o" aria-hidden="true"></i> تحويل </h6>
								</div>

							</td>
						</tr>

						</tbody>
					</table>

				</div>
				<div class="col-xs-4 col-xs-offset-8">
					<h5 class="text-center">مدير عام الجمعية</h5>
					<h5 class="text-center">سلطان بن محمد الجاسر</h5>
				</div>

				<div class="col-xs-12">
				<hr style="color: lawngreen">
					<h6  class="text-center" >إعتماد أمين الصندوق</h6>

				</div>
				<div class="col-xs-4 col-xs-offset-8">
					<h5 class="text-center">أمين الصندوق - عضو مجلس الإدارة</h5>
					<h5 class="text-center">عبدالله بن عبد العزيز الصبيحي</h5>
				</div>


				<div class="clearfix"></div>

			</div>
		</div>
	</section>

	<div class="footer">
	<!--	<p>بريدة - المملكة العربية السعودية</p>
		<p>الهاتف : 063851919 &nbsp فاكس : 063837737 &nbsp جوال : 0553851919 </p>
		<p>س-ب 821 - بريدة 51421 &nbsp&nbsp&nbsp abnaa.bu@gmail.com</p>-->
	</div>











	<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
	<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
	<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>

<?php  $previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);?>
<script >
    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url('').$previos_path ?>";
    }, 10000);
</script >

</body>
</html>
