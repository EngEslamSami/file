
	<style type="text/css">
		.nemaa{
		/*	color: #7f6c5d;*/
        		    color: #a96a61;
    background-color: white;
    display: inline-block;
    width: 100%;
		}
		.right-chick{
			border-left:1px solid #7f6c5d;
		}
		.top-backs{
			padding: 0 ;
			
		}
		.pad-2{
			padding-left: 2px;
			padding-right: 2px;
		}
		.bond-header{
			height: auto;
		}
		.bond-header .logo {
			text-align: center;
		}
		.bond-header .logo img {
			height: 40px;
			width: 180px;
		}
		.bond-header .logo h3 {
			margin: 2px  0;
			font-size: 12px;
			text-align: center;
		}
		.rightbond-header {
			padding-top: 10px;
			vertical-align: middle;
			width:100%;
		}
		.rightbond-header p{
			width: 85%;
			display: inline-block;
		}
		.line .left-lang{
			float: left;
		}
		.line .right-lang{
			float: right;
		}
		.line {
			border-bottom: 1px solid #7f6c5d;
			text-align: center;
			display: inline-block;
			width: 100%;
			min-height: 25px;
		}
		.leftbond-header  {
			margin-top: 15px;
		}
		.leftbond-header .line{
			border-bottom: 0;
		}
		.line strong {
			font-weight: bold;
			font-size: 18px;
			color: #333;
		}
		p strong {
			font-weight: bold;
			font-size: 18px;
			color: #333;
		}

		.line-pay .right-lang{
			margin-top: 20px;
		}
		.name-charity h5 {
			text-align: left;
			color: #000;
			margin: 2px 0;
			font-weight: 600;
		}
		.salary {
			border: 1px solid #7f6c5d;
			display: inline-block;
			width: 100%;
		}
		.salary span {
			float: left;
			width: 38px;
			text-align: center;
			border-right: 1px solid;
		}
		.salary p {
			line-height: 40px;
			margin-left: 38px;
			margin-bottom: 0;
		}


		.border-box {
			padding: 5px 20px;
			border: 4px double #999;
			border-radius: 29px;
		}
		.border-box-h{
			padding: 10px 20px;
			color: #333;
			    margin: 0;
		}
		
		.bond-body {
			padding: 0;
			display: inline-block;
			width: 100%;
			background: url(<?php echo base_url(); ?>asisst/admin_asset/img/sheek_imgs/nemaa-backs.png);
			background-position: center;
			background-size:  cover;
			background-repeat: no-repeat;
			border-bottom: 1px solid #000;
			
		}
		@page{
			size: landscape;
		}

		@media print{
			.bond-header .logo img {
				height: 40px;
				width: 180px;
			}
			.bond-header .logo h3 {
				margin: 2px  0;
				font-size: 12px;

			}
			.bond-body {
				padding-top: 10px;

			}
			.rightbond-header .line{
				margin-bottom: 0
			}
		}
		.bond-sidebar{
			padding: 7px 15px 7px 5px;
		}
		.line-3 .right-line-3 {
			float: right;
			margin-top: 7px;
			width: 13%;
		}
		.line-3 .left-line-3 {
			float: left;
			margin-top: 7px;
			width: 10%;
			direction: ltr;
		}
		.line-3  .text{
			border-bottom: 1px solid #999;
			text-align: center;
			display: inline-block;
			min-height: 15px;
			width: 77%;
		}
		p.hint-bottom {
			margin-bottom: 0;
			margin-right: 15%;
			margin-top: 8px;
		}
		.bond-sidebar .table-bordered>thead>tr>th, 
		.bond-sidebar .table-bordered>tbody>tr>th, 
		.bond-sidebar .table-bordered>tfoot>tr>th, 
		.bond-sidebar .table-bordered>thead>tr>td, 
		.bond-sidebar .table-bordered>tbody>tr>td, 
		.bond-sidebar .table-bordered>tfoot>tr>td {
			border: 1px solid #7f6c5d;
			padding: 3px 8px;
		}
	</style>




</head>


	<div class="nemaa">
		<div class="col-xs-9 no-padding">
			<div class="right-chick">
				<div class="top-backs">
					<div class="bond-header">
						<div class="col-xs-3 pad-2">
							<div class="rightbond-header">				
								<p class="line"><span class="right-lang">التاريخ: </span>            <span class="left-lang">: Date </span></p>
								<p class="line"><span class="right-lang">حرر فى: </span>       <span class="left-lang">: Place of Issue </span></p>
							</div>

						</div>
						<div class="col-xs-1"></div>
						<div class="col-xs-4 pad-2">
							<div class="logo">
								<img src="<?php echo base_url(); ?>asisst/admin_asset/img/sheek_imgs/nemaa.png">
								<h3 >فرع بريدة</h3>
								<h3 style="font-weight: bold;"> BURAIDAH BRANCH</h3>
							</div>
						</div>
						<div class="col-xs-2"></div>
						<div class="col-xs-2 pad-2">
							<div class="leftbond-header">	
								<p class="line"><span class="right-lang">رقم: </span>  <strong>00002950</strong>       <span class="left-lang">: .No </span></p>
							</div>
						</div>
					</div>

					<div class="bond-body">

						<div class="col-xs-12 pad-2">
							<p class="line line-pay"><span class="right-lang">إدفعوا بموجب هذا الشيك لأمر: </span>  <strong> </strong>       <span class="left-lang">Against this Cheque <br>pay to the Order of</span></p>
						</div>
						<div class="col-xs-12 pad-2">
							<div class="col-xs-3 pad-2">
								<div class="salary">
									<span>
										ريال <br> S.R.
									</span>
									<p><strong>25620</strong></p>
								</div>
							</div>
							<div class="col-xs-9 no-padding">
								<p class="line"><span class="right-lang">مبلغ وقدره: </span>  <strong> </strong>       <span class="left-lang">The amount of</span></p>
								<p class="line"><span class="right-lang">  </span>  <strong> </strong>       <span class="left-lang"></span></p>
								<div class="name-charity">
									<h5>الجمعية الخيرية لرعاية &nbsp الأيتام ببريدة</h5>
									<h5>BUR</h5>
									<h5>IBAN: SA10 0500 0068 2333 3300 0000</h5>
								</div>
							</div>
						</div>

						<div class="col-xs-12 pad-2">
							<div class="col-xs-3 pad-2">
								<p class="line" style="min-height: 0;margin-bottom: 0"><span class="right-lang">التوقيع: </span>  <strong> </strong>       <span class="left-lang">The amount of</span></p>
							</div>
							<div class="col-xs-9 no-padding">
								<p class="hint-bottom">لا تكتب تحت هذا الخط Do not write below this line</p>
							</div>
						</div>

					</div>
				</div>

				<div class="bond-footer">
					<h5 class="border-box-h text-center"> " 0000 2950 -  0000 2950 - 0000 2950 - 0000 2950 </h5>
				</div>
			</div>
		</div>
		<div class="col-xs-3 no-padding">
			<div class="bond-sidebar">
				<div class="line-3">
					<span class="right-line-3">رقم</span>
					<p class="text"></p>
					<span class="left-line-3">No</span>
				</div>
				<div class="line-3">
					<span class="right-line-3">التاريخ</span>
					<p class="text"></p>
					<span class="left-line-3">Date</span>
				</div>
				<div class="line-3">
					<span class="right-line-3">إلى</span>
					<p class="text"></p>
					<span class="left-line-3">To</span>
				</div>
				<div class="line-3">
					<span class="right-line-3" style="width: 7%">ريال</span>
					<p class="text" style="width: 67%"></p>
					<span class="left-line-3" style="width: 26%">for S.A.R.</span>
				</div>
				<div class="clearfix"></div>
				<table class="table table-bordered" style="table-layout: fixed;margin-bottom: 0">
					<tbody>
						<tr>
							<td></td>
							<td class="text-center" style="width: 38%">
								<p style="margin-bottom: 0">الرصيد السابق</p>
								<p style="margin-bottom: 0">Previous <br> Balance</p>
							</td>
						</tr>
						<tr>
							<td></td>
							<td class="text-center" style="width: 38%">
								<p style="margin-bottom: 0">إيداع</p>
								<p style="margin-bottom: 0">Deposits</p>
							</td>
						</tr>
						<tr>
							<td></td>
							<td class="text-center" style="width: 38%">
								<p style="margin-bottom: 0">المجموع</p>
								<p style="margin-bottom: 0">Total</p>
							</td>
						</tr>
						<tr>
							<td></td>
							<td class="text-center" style="width: 38%">
								<p style="margin-bottom: 0">Amount of</p>
								<p style="margin-bottom: 0">Cheque</p>
							</td>
						</tr>
						<tr>
							<td></td>
							<td class="text-center" style="width: 38%">
								<p style="margin-bottom: 0">الرصيد</p>
								<p style="margin-bottom: 0">Balance</p>
							</td>
						</tr>
					</tbody>
				</table>
				<p>000079</p>
			</div>
		</div>
	</div>