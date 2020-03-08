	<style type="text/css">
		.elbelad{
			/*display: inline-block;
			width: 100%;*/
			color: #a96a61;
			background: url(img/albelad-backs.jpg);
			background-position: 100% 20% !important;
			background-size: 100% 100% !important;
			background-repeat: no-repeat !important;
			border-bottom: 1px solid #a96a61;
		}
		.right-chick{
			border:1px solid #a96a61;
			z-index: 3;
		}
		.top-backs{
			padding: 0 ;
			
		}
		.pad-2{
			padding-left: 2px;
			padding-right: 2px;
		}
		.bond-header{
			height: 87px;
			padding: 0 45px;
			float: right;
			width: 100%;
		}
		.bond-header .logo {
			text-align: center;
		}
		.bond-header .logo img {
			height: 50px;
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
			width:45%;
		}
		.rightbond-header p{
			width: 100%;
			display: inline-block;
		}
		.line .left-lang{
			float: left;
		}
		.line .right-lang{
			float: right;
		}
		.line {
			border-bottom: 1px solid #a96a61;
			text-align: center;
			display: inline-block;
			width: 100%;
			min-height: 25px;
		}
		.leftbond-header  {
			width:45%;
			margin-top: 15px;
			float: left;
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
			padding: 25px 35px 0px 20px;
			display: inline-block;
			width: 100%;
			
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
			margin-top: 25px;
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

		/*************************/
		

		.label-blue{
			background-color: #5484be;
			color: #fff;
			box-shadow: 2px 2px 6px #001035 ;

		}
		.auto-width{
			width: auto;
		}
		.label-custom{
			width: 100%;
			font-size: 16px;
			height: 32px;
			float: right;
			border-radius: 0;
			line-height: 27px;
		}
		.label-custom2{
			width: 70%;
			font-size: 16px;
			height: 32px;
			float: right;
			border-radius: 0;
			line-height: 27px;
		}
		.form-group {
			display: inline-block;
			width: 100%;
			margin-bottom: 4px;
		}

		.custom-checkbox,.custom-radio {
			width: 25px;
			height: 25px;
		}
		.custom-checkbox2,.custom-radio2 {
			width: 25px;
			height: 25px;
			float: right;
			margin-left: 7px !important;
			margin-right: 0 !important;
		}
	</style>






<body onload="checkEdits()">

	<br>
	<div class="container-fluid">
		<div class="col-md-8 col-xs-12 no-padding">
			<div class="col-md-6">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">البنك</label>
					</div>
					<div class="col-xs-8">
						<select class="form-control">
							<option value="">اختر</option>
							<option value="1">البلاد</option>
							<option value="2">إنماء</option>
							<option value="3">الراجحى</option>
						</select>
					</div>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">حجم الشيك</label>
					</div>
					<div class="col-xs-8">
						<select class="form-control">
							<option value="">اختر</option>
							<option value="1">كبير</option>
							<option value="2">صغير</option>
						</select>
					</div>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">العرض</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control" value="" id="chick-width" onblur="">
					</div>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">الإرتفاع</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control" value="" id="chick-height">
					</div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-sm-4"></div>
						<div class="col-sm-4">
							<label class="label label-custom label-blue auto-width">الشيك</label>
						</div>
						<div class="col-sm-4"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox1" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">التاريخ</label>
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padR1">
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padT1">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox2" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">حرر فى</label>
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padR2">
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padT2">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox3" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">المستفيد</label>
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padR3">
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padT3">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox4" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">المبلغ</label>
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padR4">
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padT4">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox5" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">التفقيط</label>
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padR5">
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padT5">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox6" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">البيان</label>
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padR6">
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padT6">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox7" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width" style="font-size: 10px;">لايصرف إلا للمستفيد الأول</label>
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padR7">
						</div>
						<div class="col-xs-4">
							<input type="number" name="" class="form-control" value="" id="padT7">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-sm-4">
							<input type="checkbox" name="" id="checkbox-Kaab" class="custom-checkbox" checked>
						</div>
						<div class="col-sm-4">
							<label class="label label-custom2 label-blue auto-width">الكعب</label>
						</div>
						<div class="col-sm-4"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox8" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">رقم الشيك</label>
						</div>
						<div class="col-xs-2 pad-2">
							<input type="number" name="" class="form-control" value="100" id="wid8" placeholder="عرض"  min="1" max="100">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" name="" class="form-control" value="" id="padR8">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" name="" class="form-control" value="" id="padT8">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox9" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">التاريخ</label>
						</div>
						<div class="col-xs-2 pad-2">
							<input type="number" name="" class="form-control" value="100" id="wid9" placeholder="عرض"  min="1" max="100">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" name="" class="form-control" value="" id="padR9">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" name="" class="form-control" value="" id="padT9">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox10" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">إلى</label>
						</div>
						<div class="col-xs-2 pad-2">
							<input type="number" name="" class="form-control" value="100" id="wid10" placeholder="عرض"  min="1" max="100">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" name="" class="form-control" value="" id="padR10">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" name="" class="form-control" value="" id="padT10">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox11" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">المبلغ</label>
						</div>
						<div class="col-xs-2 pad-2">
							<input type="number" name="" class="form-control" value="100" id="wid11" placeholder="عرض"  min="1" max="100">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" name="" class="form-control" value="" id="padR11">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" name="" class="form-control" value="" id="padT11">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-5 no-padding">

							<label class="label label-custom2 label-blue auto-width">حرر فى مدينة</label>
						</div>
						<div class="col-xs-7">
							<input type="number" name="" class="form-control">
						</div>
						
					</div>

					<div class="form-group">
						<div class="col-xs-5 no-padding">
							<label class="label label-custom2 label-blue auto-width">التنصيص</label>
						</div>
						<div class="col-xs-7">
							<input type="number" name="" class="form-control">
						</div>
						
					</div>

					<div class="form-group">
						<div class="col-xs-5 no-padding">
							<label class="label label-custom2 label-blue auto-width" >الطابعة</label>
						</div>
						<div class="col-xs-7">
							<input type="number" name="" class="form-control">
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-xs-12 ">
			<br><br><br>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<label class="label label-custom label-blue auto-width">معاينة إعدادات الطباعة</label>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">التاريخ</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control">
					</div>

				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">المستفيد</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">المبلغ</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control">
					</div>

				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">التفقيط</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">البيان</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="col-xs-6">
					<div class="form-group ">
						<label class="label label-custom label-blue auto-width">اعدادت الخلفية</label>
					</div>
					<div class="form-group ">
						<label>اختر الخلفية</label>
						<input type="file" name="fileupload" value="fileupload" id="fileupload">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group ">
						<label class="label label-custom label-blue auto-width">اعدادت اللون</label>
					</div>

					<input class="jscolor" value="a96a61">
				</div>

			</div>
		</div>

		
	</div>



<!--

<div class="col-md-4">
			<div class="form-group ">
				<label class="label label-custom label-blue auto-width">اختر اللوجو</label>
				<input type="file" name="fileupload" value="fileupload" id="fileupload">

			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group ">
				<label>اختر الخلفية</label>
				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
					اختر الخلفية
				</button>


			</div>
		</div>
	-->
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Modal title</h4>
				</div>
				<div class="modal-body">
					<div class="col-xs-12">
						<div class="col-md-4">
							<img src="img/albelad-backs.png" onclick="changeImage(this)" width="100%"  style="height: 150px;" alt="king dread" />
						</div>
						<div class="col-md-4">
							<img src="img/nemaa-backs.png" onclick="changeImage(this)" width="100%"  style="height: 150px;" alt="king dread" />
						</div>
						<div class="col-md-4">
							<img src="img/raghi_back.png" onclick="changeImage(this)" width="100%" style="height: 150px;" alt="king dread" />
						</div>
					</div>

				</div>
				<div class="modal-footer" style="display: inline-block;width: 100%">
					<button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
				</div>
			</div>
		</div>
	</div>












	<div class="container-fluid">
		<div class="" id="cheque" data-src="path/to/image" data-caching-key="userImage">
			<div class="elbelad col-xs-9 no-padding" id="fisrtDiv"  data-src="path/to/image" data-caching-key="userImage">
				<div class="right-chick  ">
					<div class="top-backs">
						<div class="bond-header">
							<div class="col-xs-6 pad-2">
								<div  class="rightbond-header">				
									<p class="line" id="data-block1"><span class="right-lang">التاريخ: </span>            <span class="left-lang">: Date </span></p>
									<p class="line" id="data-block2"><span class="right-lang">حرر فى مدينة: </span>       <span class="left-lang">: Place of Issue </span></p>
								</div>

							</div>
							<div class="col-xs-6 pad-2">
								<div class="leftbond-header">	
									<p class="line"><span class="right-lang">رقم: </span>  <strong>00002950</strong>       <span class="left-lang">: .No </span></p>
								</div>
							</div>
						</div>


						<div class=" ui-widget-content  ">
							<div class="bond-body"  id="updateDiv">
								<div class="col-xs-12 pad-2">
									<div class="col-xs-4 pad-2">
										<div  style="color: #333;">
											<h5>فرع المركز الرئيسي</h5>
											<h5>الرياض 11411 ص ب 140</h5>
										</div>
									</div>
									<div class="col-xs-4 pad-2 text-center">
										<h5 id="data-block7">لايصرف الإ للمستفيد الأول</h5>
									</div>
									<div class="col-xs-4 pad-2">
										<div style="direction: ltr;color: #333;font-weight: bold;">
											<h5 style="margin-bottom: 0;font-weight: bold;">MAIN BRANCH CENTER</h5>
											<h5 style="margin-bottom: 0;font-weight: bold;">RIYADH 11411 P.O.BOX 140</h5>
										</div>
									</div>
								</div>

								<div class="col-xs-12 pad-2">
									<p class="line line-pay" id="data-block3"><span class="right-lang">إدفعوا بموجب هذا الشيك لأمر: </span>  <strong> </strong>       <span class="left-lang">Against this Cheque <br>pay to the Order of</span></p>
								</div>
								<div class="col-xs-12 pad-2">
									<div class="col-xs-3 pad-2">
										<div class="salary" id="data-block4">
											<span>
												ريال <br> S.R.
											</span>
											<p><strong>25620</strong></p>
										</div>
									</div>
									<div class="col-xs-9 no-padding">
										<p class="line" id="data-block5"><span class="right-lang">مبلغ وقدره: </span>  <strong> </strong>       <span class="left-lang">The amount of</span></p>
										<p class="line" id="data-block6"><span class="right-lang">  </span>  <strong> </strong>       <span class="left-lang"></span></p>

									</div>
								</div>

								<div class="col-xs-12 pad-2">
									<div class="col-xs-3 pad-2">
										<p class="line" style="min-height: 0;margin:33px 0 0;"><span class="right-lang">التوقيع: </span>  <strong> </strong>       <span class="left-lang">Signature</span></p>
									</div>
									<div class="col-xs-9 no-padding">
										<div class="name-charity" style="float: left;">
											<h5>الجمعية الخيرية لرعاية &nbsp الأيتام ببريدة</h5>
											<h5>999300003330007</h5>
											<h5>IBAN: SA79 1500 0999 3000 0333 0007</h5>
										</div>

										<p class="hint-bottom">لا تكـــــتب تحــــت هـــذا الخــــــط<br> Do not write below this line</p>
									</div>
								</div>

							</div>


							<div class="bond-footer">
								<h5 class="border-box-h text-center"  id="edit" contenteditable="true" onblur="saveEdits()">  0000 2950 -  0000 2950 - 0000 2950 - 0000 2950 </h5>
							</div>
						</div>

					</div>
				</div>

			</div>
			<div class="col-xs-3 no-padding" id="secondDiv">
				<div class="bond-sidebar">
					<div class="line-3" id="data-block8">
						<span class="right-line-3">رقم</span>
						<p class="text"></p>
						<span class="left-line-3">No</span>
					</div>
					<div class="line-3" id="data-block9">
						<span class="right-line-3">التاريخ</span>
						<p class="text"></p>
						<span class="left-line-3">Date</span>
					</div>
					<div class="line-3" id="data-block10">
						<span class="right-line-3">إلى</span>
						<p class="text"></p>
						<span class="left-line-3">To</span>
					</div>
					<div class="line-3" id="data-block11">
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
	</div>
    
   
    <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    	<script src="<?php echo base_url() ?>asisst/admin_asset/js/sheeks/jscolor.js"></script>
    
    
	<script type="text/javascript">
		var chickWidth =$("#chick-width").val();
		var chickHeight =$("#chick-height").val();


		$('#checkbox1').on('change', function() { 
			if (!this.checked) {

				$("#data-block1").css("visibility","hidden");
				$("#padR1").attr("disabled","disabled");
				$("#padT1").attr("disabled","disabled");
			}
			else{
				$("#data-block1").css("visibility","visible");
				$("#padR1").removeAttr("disabled");
				$("#padT1").removeAttr("disabled");
			}      
		});

		$('#checkbox2').on('change', function() { 
			if (!this.checked) {

				$("#data-block2").css("visibility","hidden");
				$("#padR2").attr("disabled","disabled");
				$("#padT2").attr("disabled","disabled");
			}
			else{
				$("#data-block2").css("visibility","visible");
				$("#padR2").removeAttr("disabled");
				$("#padT2").removeAttr("disabled");
			}      
		});
		$('#checkbox3').on('change', function() { 
			if (!this.checked) {

				$("#data-block3").css("visibility","hidden");
				$("#padR3").attr("disabled","disabled");
				$("#padT3").attr("disabled","disabled");
			}
			else{
				$("#data-block3").css("visibility","visible");
				$("#padR3").removeAttr("disabled");
				$("#padT3").removeAttr("disabled");
			}      
		});

		$('#checkbox4').on('change', function() { 
			if (!this.checked) {

				$("#data-block4").css("visibility","hidden");
				$("#padR4").attr("disabled","disabled");
				$("#padT4").attr("disabled","disabled");
			}
			else{
				$("#data-block4").css("visibility","visible");
				$("#padR4").removeAttr("disabled");
				$("#padT4").removeAttr("disabled");
			}      
		});
		$('#checkbox5').on('change', function() { 
			if (!this.checked) {

				$("#data-block5").css("visibility","hidden");
				$("#padR5").attr("disabled","disabled");
				$("#padT5").attr("disabled","disabled");
			}
			else{
				$("#data-block5").css("visibility","visible");
				$("#padR5").removeAttr("disabled");
				$("#padT5").removeAttr("disabled");
			}      
		});
		$('#checkbox6').on('change', function() { 
			if (!this.checked) {

				$("#data-block6").css("visibility","hidden");
				$("#padR6").attr("disabled","disabled");
				$("#padT6").attr("disabled","disabled");
			}
			else{
				$("#data-block6").css("visibility","visible");
				$("#padR6").removeAttr("disabled");
				$("#padT6").removeAttr("disabled");
			}      
		});
		$('#checkbox7').on('change', function() { 
			if (!this.checked) {

				$("#data-block7").css("visibility","hidden");
				$("#padR7").attr("disabled","disabled");
				$("#padT7").attr("disabled","disabled");
			}
			else{
				$("#data-block7").css("visibility","visible");
				$("#padR7").removeAttr("disabled");
				$("#padT7").removeAttr("disabled");
			}      
		});

		$('#checkbox-Kaab').on('change', function() { 
			if (!this.checked) {
				$("#secondDiv").css("display","none");
				$("#fisrtDiv").attr("class","elbelad col-xs-12 no-padding");

				$("#padR8").attr("disabled","disabled");
				$("#padT8").attr("disabled","disabled");
				$("#wid8").attr("disabled","disabled");
				$("#padR9").attr("disabled","disabled");
				$("#padT9").attr("disabled","disabled");
				$("#wid9").attr("disabled","disabled");
				$("#padR10").attr("disabled","disabled");
				$("#padT10").attr("disabled","disabled");
				$("#wid10").attr("disabled","disabled");
				$("#padR11").attr("disabled","disabled");
				$("#padT11").attr("disabled","disabled");
				$("#wid11").attr("disabled","disabled");

				
			}
			else{
				$("#secondDiv").css("display","block");
				$("#fisrtDiv").attr("class","elbelad col-xs-9 no-padding");
				$("#padR8").removeAttr("disabled");
				$("#padT8").removeAttr("disabled");
				$("#wid8").removeAttr("disabled");
				$("#padR9").removeAttr("disabled");
				$("#padT9").removeAttr("disabled");
				$("#wid9").removeAttr("disabled");
				$("#padR10").removeAttr("disabled");
				$("#padT10").removeAttr("disabled");
				$("#wid10").removeAttr("disabled");
				$("#padR11").removeAttr("disabled");
				$("#padT11").removeAttr("disabled");
				$("#wid11").removeAttr("disabled");
				


				
			}      
		});

		$('#checkbox8').on('change', function() { 
			if (!this.checked) {

				$("#data-block8").css("visibility","hidden");
				$("#padR8").attr("disabled","disabled");
				$("#padT8").attr("disabled","disabled");
				$("#wid8").attr("disabled","disabled");
			}
			else{
				$("#data-block8").css("visibility","visible");
				$("#padR8").removeAttr("disabled");
				$("#padT8").removeAttr("disabled");
				$("#wid8").removeAttr("disabled");
			}      
		});

		$('#checkbox9').on('change', function() { 
			if (!this.checked) {

				$("#data-block9").css("visibility","hidden");
				$("#padR9").attr("disabled","disabled");
				$("#padT9").attr("disabled","disabled");
				$("#wid9").attr("disabled","disabled");
			}
			else{
				$("#data-block9").css("visibility","visible");
				$("#padR9").removeAttr("disabled");
				$("#padT9").removeAttr("disabled");
				$("#wid9").removeAttr("disabled");
			}      
		});

		$('#checkbox10').on('change', function() { 
			if (!this.checked) {

				$("#data-block10").css("visibility","hidden");
				$("#padR10").attr("disabled","disabled");
				$("#padT10").attr("disabled","disabled");
				$("#wid10").attr("disabled","disabled");
			}
			else{
				$("#data-block10").css("visibility","visible");
				$("#padR10").removeAttr("disabled");
				$("#padT10").removeAttr("disabled");
				$("#wid10").removeAttr("disabled");
			}      
		});

		$('#checkbox11').on('change', function() { 
			if (!this.checked) {

				$("#data-block11").css("visibility","hidden");
				$("#padR11").attr("disabled","disabled");
				$("#padT11").attr("disabled","disabled");
				$("#wid11").attr("disabled","disabled");
			}
			else{
				$("#data-block11").css("visibility","visible");
				$("#padR11").removeAttr("disabled");
				$("#padT11").removeAttr("disabled");
				$("#wid11").removeAttr("disabled");
			}      
		});






      // change margins

      $("#padR1").keyup(function() {
      	var padR1=$(this).val();
      	$("#data-block1").css("marginRight",padR1+"px");
      });
      $("#padT1").keyup(function() {
      	var padT1=$(this).val();
      	$("#data-block1").css("marginTop",padT1+"px");
      });
        // change 2
        $("#padR2").keyup(function() {
        	var padR2=$(this).val();
        	$("#data-block2").css("marginRight",padR2+"px");
        });
        $("#padT2").keyup(function() {
        	var padT2=$(this).val();
        	$("#data-block2").css("marginTop",padT2+"px");
        });

        // change 3
        $("#padR3").keyup(function() {
        	var padR3=$(this).val();
        	$("#data-block3").css("marginRight",padR3+"px");
        });
        $("#padT3").keyup(function() {
        	var padT3=$(this).val();
        	$("#data-block3").css("marginTop",padT3+"px");
        });

      // change 4
      $("#padR4").keyup(function() {
      	var padR4=$(this).val();
      	$("#data-block4").css("marginRight",padR4+"px");
      });
      $("#padT4").keyup(function() {
      	var padT4=$(this).val();
      	$("#data-block4").css("marginTop",padT4+"px");
      });

      // change 5
      $("#padR5").keyup(function() {
      	var padR5=$(this).val();
      	$("#data-block5").css("marginRight",padR5+"px");
      });
      $("#padT5").keyup(function() {
      	var padT5=$(this).val();
      	$("#data-block5").css("marginTop",padT5+"px");
      });

      // change 6
      $("#padR6").keyup(function() {
      	var padR6=$(this).val();
      	$("#data-block6").css("marginRight",padR6+"px");
      });
      $("#padT6").keyup(function() {
      	var padT6=$(this).val();
      	$("#data-block6").css("marginTop",padT6+"px");
      });

      // change 7
      $("#padR7").keyup(function() {
      	var padR7=$(this).val();
      	$("#data-block7").css("marginRight",padR7+"px");
      });
      $("#padT7").keyup(function() {
      	var padT7=$(this).val();
      	$("#data-block7").css("marginTop",padT7+"px");
      });











      $("#wid8").keyup(function() {
      	if ($(this).val() > $(this).attr('max')*1) {
      		$(this).val($(this).attr('max'));
      	} 
      	else if ($(this).val() < $(this).attr('min')*1) {
      		$(this).val($(this).attr('min'));
      	} 

      	var wid8=$(this).val();
      	$("#data-block8").css("width",wid8+"%");
      });
      $("#padR8").keyup(function() {
      	var padR8=$(this).val();
      	$("#data-block8").css("marginRight",padR8+"px");
      });
      $("#padT8").keyup(function() {
      	var padT8=$(this).val();
      	$("#data-block8").css("marginTop",padT8+"px");
      });





      $("#wid9").keyup(function() {
      	if ($(this).val() > $(this).attr('max')*1) {
      		$(this).val($(this).attr('max'));
      	} 
      	else if ($(this).val() < $(this).attr('min')*1) {
      		$(this).val($(this).attr('min'));
      	} 

      	var wid9=$(this).val();
      	$("#data-block9").css("width",wid9+"%");
      });
      $("#padR9").keyup(function() {
      	var padR9=$(this).val();
      	$("#data-block9").css("marginRight",padR9+"px");
      });
      $("#padT9").keyup(function() {
      	var padT9=$(this).val();
      	$("#data-block9").css("marginTop",padT9+"px");
      });





      $("#wid10").keyup(function() {
      	if ($(this).val() > $(this).attr('max')*1) {
      		$(this).val($(this).attr('max'));
      	} 
      	else if ($(this).val() < $(this).attr('min')*1) {
      		$(this).val($(this).attr('min'));
      	} 

      	var wid10=$(this).val();
      	$("#data-block10").css("width",wid10+"%");
      });
      $("#padR10").keyup(function() {
      	var padR10=$(this).val();
      	$("#data-block10").css("marginRight",padR10+"px");
      });
      $("#padT10").keyup(function() {
      	var padT10=$(this).val();
      	$("#data-block10").css("marginTop",padT10+"px");
      });





      $("#wid11").keyup(function() {
      	if ($(this).val() > $(this).attr('max')*1) {
      		$(this).val($(this).attr('max'));
      	} 
      	else if ($(this).val() < $(this).attr('min')*1) {
      		$(this).val($(this).attr('min'));
      	} 

      	var wid11=$(this).val();
      	$("#data-block11").css("width",wid11+"%");
      });
      $("#padR11").keyup(function() {
      	var padR11=$(this).val();
      	$("#data-block11").css("marginRight",padR11+"px");
      });
      $("#padT9").keyup(function() {
      	var padT11=$(this).val();
      	$("#data-block11").css("marginTop",padT11+"px");
      });

      

      $(".jscolor").blur(function() {

      	var jscolor=$(this).val();

      	$(".elbelad").css("color", "#"+jscolor);
      	$(".elbelad").css("borderBottom","1px solid " + "#"+jscolor);

      	$(".right-chick").css("border","1px solid " + "#"+jscolor);
      	$(".line").css("borderBottom","1px solid " + "#"+jscolor);

      	
      });


      function makewidth(){
      	$("#cheque").css("width",chickWidth)
      }

  </script>



<!--
	<script>
		$( function() {
			$( ".draggable" ).draggable();
			$( ".resizable" ).resizable();

		} );
	</script>
-->


<script>
	function readURL(input) {

		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				//$('#blah').attr('src', e.target.result);
				$(".elbelad").css('background','url('+e.target.result+')');
				$(".elbelad").attr("data-src",e.target.result)
				imgData = e.target.result;
				localStorage.setItem("imgData", imgData);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#fileupload").change(function(){
		readURL(this);
	});

	function checkEdits(){
		var dataImage = localStorage.getItem('imgData');
		$(".elbelad").css('background','url('+dataImage+')');
//bannerImg.src = "data:image/png;base64," + dataImage;
}

</script>
 </body>