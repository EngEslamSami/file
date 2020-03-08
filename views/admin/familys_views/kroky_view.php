
	<style type="text/css">
		@import url(fonts/ht/HacenTunisia.css);
		@import url(fonts/hl/HacenLinerScreen.css);
		@import url(fonts/ge/ge.css);

		body {
			font-family: 'hl';

		}
		.main-body{
			
			background-image: url(img/paper-bg.png);
			background-position: 100% 100%;
			background-size: 100% 100%;
			background-repeat: no-repeat;
			-webkit-print-color-adjust: exact !important;
			height: 295mm;

		}

		.print_forma{
			padding: 100px 0 50px 0;
			/*border:1px solid #73b300;*/
			
		}
		.piece-box {
			/*margin-bottom: 12px;*/
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
			border-bottom: 4px solid #9bbb59;
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
			margin-bottom: 6px;
			font-size: 17px;
		}
		.piece-box table th,
		.piece-box table td
		{
			
			/*padding: 2px 8px !important;*/
		}
		.piece-box  .table>thead>tr>th,.piece-box  .table>tbody>tr>th, 
		.piece-box .table>tfoot>tr>th,.piece-box  .table>thead>tr>td, 
		.piece-box .table>tbody>tr>td,.piece-box  .table>tfoot>tr>td{
			text-align: center;
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
			.table-bordered.double>thead>tr>th, .table-bordered.double>tbody>tr>th, 
			.table-bordered.double>tfoot>tr>th, .table-bordered.double>thead>tr>td, 
			.table-bordered.double>tbody>tr>td, .table-bordered.double>tfoot>tr>td {
				border: 2px solid #000 !important;
			}



			.table-bordered.white-border th,.table-bordered.white-border td{
				border:1px solid #fff!important

			}
		}



		@page {
			size:  210mm 297mm  ;
			margin: 0;

		}
		.open_green{
			background-color: #e6eed5;
		}
		.closed_green{
			background-color: #cdddac;
		}
		.table-bordered.double {
			border: 5px double #000;
		}
		.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, 
		.table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, 
		.table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
			border: 2px solid #000;
		}
		.under-line{
			border-top: 1px solid #abc572;
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
		.under-line .col-xs-6 ,
		.under-line .col-xs-8 
		{
			border-left: 1px solid #abc572;
		}

		.bond-header{
			height: 100px;
			margin-bottom: 30px;
		}
		.bond-header .right-img img,
		.bond-header .left-img img{
			width: 100%;
			height: 100px;
		}
		.main-bond-title{
			display: table;
			height: 100px;
			text-align: center;
			width: 100%;
		}
		.main-bond-title h3{
			display: table-cell;
			vertical-align: bottom;
			color: #d89529;
		}
		.main-bond-title h3 span{
			border-bottom: 2px solid #006a3a;
		}
		.green-border span {
			border: 6px double #000;
			padding: 8px 25px;
			border-radius: 10px;
			box-shadow: 2px 2px 5px 2px #000;
		}
		.table-bordered>tbody> tr.rosasy-bg td{
			background-color: #eee !important;
			border: 1px solid #eee  !important;
		}
		.hl{
			font-family: 'hl';
		}

		.footer-info {
			position: absolute;
			width: 100%;
			bottom: 70px;
		}
		.table-bordered > tbody > tr > td.white-bg{
			background-color: #fff !important;
			border: 1px solid #eee !important
		}
		.kroky{
			border: 2px solid #555;
			height: 420px
		}
	</style>


</head>
<body>

	<!--<div class="bond-header">
		<div class="col-xs-4 pad-2">
			<div class="right-img">
				<img src="img/sympol1.png">
			</div>
		</div>
		<div class="col-xs-4 pad-2">
			<div class="main-bond-title">
				<h3 class="text-center"><span class="">إذن إضافة </span></h3>
			</div>
		</div>
		<div class="col-xs-4 pad-2">
			<div class="left-img">
				<img src="img/sympol2.png">
			</div>
		</div>
	</div>
	<div class="clearfix"></div><br>
-->



<section class="main-body">


	<div class="print_forma  col-xs-12 ">
		<div class="col-xs-12 no-padding">
			<div class="col-xs-4 text-center">

			</div>
			<div class="col-xs-4 text-center">
				<h4 class="green-border"><span>نموذج كروكي لمنزل</span></h4>
			</div>
			<div class="col-xs-4 text-center">

			</div>
		</div>

		<div class="piece-box" style="margin-top: 20px">
			<div class="piece-body">
				<div class="col-xs-12">
					<table class="table table-bordered hl white-border" style="table-layout: fixed;">
						<tbody>
							<tr class="rosasy-bg">
								<td style="width: 120px">رقم الطلب</td>
								<td class="white-bg"></td>

								<td style="width: 120px">تاريخ الطلب</td>
								<td class="white-bg"></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-xs-12">
					<table class="table table-bordered hl white-border" style="table-layout: fixed;">
						<tbody>
							<tr class="rosasy-bg">
								<td style="width: 120px">إسم الأسرة</td>
								<td class="white-bg"></td>
								<td style="width: 120px">رقم الهوية</td>
								<td class="white-bg"></td>

							</tr>
						</tbody>
					</table>
				</div>

				<div class="col-xs-12">
					<table class="table table-bordered hl white-border" style="table-layout: fixed;">
						<tbody>
							<tr class="rosasy-bg">
								<td style="width: 120px">المنطقة</td>
								<td class="white-bg"></td>
								<td style="width: 120px">المدينة</td>
								<td class="white-bg"></td>
								<td style="width: 120px">الحي</td>
								<td class="white-bg"></td>
							</tr>
						</tbody>
					</table>
				</div>	

				<div class="col-xs-12">
					<table class="table table-bordered hl white-border" style="table-layout: fixed;">
						<tbody>
							<tr class="rosasy-bg">
								<td style="width: 120px">إسم الشارع</td>
								<td class="white-bg"></td>
								<td style="width: 120px">رقم المبنى</td>
								<td class="white-bg"></td>
								<td style="width: 120px">الرمز البريدي</td>
								<td class="white-bg"></td>
							</tr>
						</tbody>
					</table>
				</div>	

				<div class="col-xs-12">
					<table class="table table-bordered hl white-border" style="table-layout: fixed;">
						<tbody>
							<tr class="rosasy-bg">
								<td style="width: 120px">رقم الهاتف</td>
								<td class="white-bg"></td>
								<td style="width: 120px">رقم الجوال</td>
								<td class="white-bg"></td>

							</tr>
						</tbody>
					</table>
				</div>



			</div>

		</div>

		<div class="col-xs-12">
			<div class="kroky">

			</div>
		</div>

		<div class="piece-box" style="margin-top: 10px">
			<div class="piece-body">
				<div class="col-xs-12">
					<table class="table table-bordered hl white-border" >
						<thead>
							<tr class="rosasy-bg">
								<th colspan="4" style="text-align: right;">الوصف التفصيلي للمنزل</th>
							</tr>
						</thead>
						<tbody>
							<tr class="rosasy-bg">
								<td style="width: 120px">أقرب مدرسة</td>
								<td class="white-bg"></td>
								
								<td style="width: 120px">أقرب معلم</td>
								<td class="white-bg"></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-xs-12">
					<table class="table table-bordered hl white-border" >
						<tbody>
							<tr class="rosasy-bg">
								<td style="width: 120px">أقرب مسجد</td>
								<td class="white-bg"></td>
								
								<td style="width: 120px">اتجاه المنزل</td>
								<td class="white-bg"></td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
		










	</div>


	<!--<div class="footer-info" >

		<div class="col-xs-12 no-padding print-details-footer">
			<div class="col-xs-6">
				<p class=" text-center" style="margin-bottom: 0;"> <small>(اسم الموظف القائم بالإدخال أو الطباعة) / أحمد محمد إسماعيل بن عبد الله </small></p>

			</div>
			<div class="col-xs-2">
			
			</div>
			<div class="col-xs-4">

				<p class=" text-center" style="margin-bottom: 0;"> <small>تاريخ الطباعة :   2019-06-13 12:01:01</small></p>
			</div>


		</div>

	</div>-->
</section>













</div>


