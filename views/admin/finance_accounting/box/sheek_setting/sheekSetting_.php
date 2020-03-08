<style type="text/css">
	#cheque{
		color: #a96a61;
		background: url(img/files/raghi.jpg);
		background-position: 100% 20% !important;
		background-size: 100% 100% !important;
		background-repeat: no-repeat !important;
		height: 9cm;
		width: 27cm;
		margin: 0 auto;
	}
	.elbelad{
		display: inline-block;
		width: 20.6cm;
		float: right;
	}
	@media print{
		html, body {
			width: 27cm;
			height: 9cm;
		}
	}
	.kaab{
		display: inline-block;
		width: 6.4cm;
		float: right;
	}
	.divider1{
		height: 0.5cm;
	}
	.right-chick{
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
		height: 2cm;
		/*padding: 0 45px;
		float: right;*/
		width: 100%;
		overflow: hidden;
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
		/*width:45%;*/
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
		/* border-bottom: 1px solid #a96a61; */
		text-align: right;
		display: inline-block;
		width: 100%;
		min-height: 0.7cm;
		margin-bottom: 0;
		vertical-align: middle;
		line-height: 0.5cm;
		position: relative;
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
	.line-pay {
		line-height: 0.3cm !important;
		min-height: 0.6cm !important;
	}
	.name-charity h5 {
		text-align: left;
		color: #000;
		margin: 2px 0;
		font-weight: 600;
	}
	.salary {
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
		display: inline-block;
		width: 100%;
		height: 5cm;
		
	}
	@page{
		size: a4;
		margin: 0
	}
	page[size="A4"] {  
		width: 21cm;
		height: 29.7cm; 
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
	.btn{
		border-radius: 4px;
		width: auto;
		padding: 9px 11px;
		font-size: 14px;
	}
	#quant{
		border: 1px solid #999;
		padding: 4px;
	}
</style>

<body id="page-top" data-spy="scroll" onload="checkEdits()">
	<br>
	<div class="container-fluid">
		<?php
		$id = $this->uri->segment(6);
		$size = array(1=>'كبير', 2=>'صغير');
		if ($id == '') {
			echo form_open_multipart('finance_accounting/box/sheek_setting/Sheek_setting/add');
			$bank_id			 = '';
			$size_sheek 		 = '';
			$full_width			 = '27';
			$full_height		 = '9';
			$sheek_date_right	 = '1.2';
			$sheek_date_top		 = '0';
			$sheek_horer_right	 = '1';
			$sheek_horer_top	 = '0';
			$sheek_benifit_right = '3.7';
			$sheek_benifit_top   = '0.3';
			$sheek_value_right   = '1.1';
			$sheek_value_top     = '0.9';
			$sheek_text_right 	 = '1.5';
			$sheek_text_top 	 = '0.6';
			$sheek_byan_right 	 = '1';
			$sheek_byan_top 	 = '1';
			$sheek_sarf_right	 = '1.1';
			$sheek_sarf_top		 = '2.3';
			$ka3b_num_right		 = '1';
			$ka3b_num_top		 = '0';
			$ka3b_date_right	 = '1';
			$ka3b_date_top		 = '0';
			$ka3b_to_right		 = '1';
			$ka3b_to_top 		 = '0';
			$ka3b_value_right	 = '1';
			$ka3b_value_top		 = '0';
			$horer_in			 = '1';
			$quotation			 = '0';
			$type				 = 1;
		}
		else {
			echo form_open_multipart('finance_accounting/box/sheek_setting/Sheek_setting/update/'.$id);
			$bank_id			 = $record['bank_id'];
			$size_sheek 		 = $record['size'];
			$full_width			 = $record['full_width'];
			$full_height		 = $record['full_height'];
			$sheek_date_right	 = $record['sheek_date_right'];
			$sheek_date_top		 = $record['sheek_date_top'];
			$sheek_horer_right	 = $record['sheek_horer_right'];
			$sheek_horer_top	 = $record['sheek_horer_top'];
			$sheek_benifit_right = $record['sheek_benifit_right'];
			$sheek_benifit_top   = $record['sheek_benifit_top'];
			$sheek_value_right   = $record['sheek_value_right'];
			$sheek_value_top     = $record['sheek_value_top'];
			$sheek_text_right 	 = $record['sheek_text_right'];
			$sheek_text_top 	 = $record['sheek_text_right'];
			$sheek_byan_right 	 = $record['sheek_byan_right'];
			$sheek_byan_top 	 = $record['sheek_byan_top'];
			$sheek_sarf_right	 = $record['sheek_sarf_right'];
			$sheek_sarf_top		 = $record['sheek_sarf_top'];
			$ka3b_num_right		 = $record['ka3b_num_right'];
			$ka3b_num_top		 = $record['ka3b_num_top'];
			$ka3b_date_right	 = $record['ka3b_date_right'];
			$ka3b_date_top		 = $record['ka3b_date_top'];
			$ka3b_to_right		 = $record['ka3b_to_right'];
			$ka3b_to_top 		 = $record['ka3b_to_top'];
			$ka3b_value_right	 = $record['ka3b_value_right'];
			$ka3b_value_top		 = $record['ka3b_value_top'];
			$horer_in			 = $record['horer_in'];
			$quotation			 = $record['quotation'];
			$type				 = $record['type'];
		}
		?>
		<div class="col-md-8 col-xs-12 no-padding">
			<div class="col-md-6">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">البنك</label>
					</div>
					<div class="col-xs-8">
						<select name="bank_id" class="form-control" data-validation="required" id="chooseBank" onchange="chooseBank(this);">
							<option value="">اختر</option>
							<?php
							if (isset($banks) && $banks != null) {
								foreach ($banks as $value) {
									$selected = '';
									if ($bank_id == $value->id) {
										$selected = 'selected';
									}
							?>
							<option value="<?=$value->id?>" <?=$selected?>><?=$value->title?></option>
							<?php
								}
							}
							?>
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
						<select name="size" class="form-control" data-validation="required">
							<option value="">اختر</option>
							<?php
							foreach ($size as $key => $value) {
								$selected = '';
								if ($size_sheek == $key) {
									$selected = 'selected';
								}
							?>
							<option value="<?=$key?>" <?=$selected?>><?=$value?></option>
							<?php
							}
							?>
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
						<input type="number" step="0.1" name="full_width" class="form-control" value="<?=$full_width?>" id="chick-width" onblur="" data-validation="required" onblur="changeWidth(this.value)">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">الإرتفاع</label>
					</div>
					<div class="col-xs-8">
						<input type="number" step="0.1" name="full_height" class="form-control" value="<?=$full_height?>" id="chick-height" data-validation="required" nblur="changeHeight(this.value)">
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
							<input type="number" step="0.1" name="sheek_date_right" class="form-control" value="<?=$sheek_date_right?>" id="padR1" data-validation="required">
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_date_top" class="form-control" value="<?=$sheek_date_top?>" id="padT1" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox2" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">حرر فى</label>
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_horer_right" class="form-control" value="<?=$sheek_horer_right?>" id="padR2" data-validation="required">
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_horer_top" class="form-control" value="<?=$sheek_horer_top?>" id="padT2" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox3" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">المستفيد</label>
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_benifit_right" class="form-control" value="<?=$sheek_benifit_right?>" id="padR3" data-validation="required">
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_benifit_top" class="form-control" value="<?=$sheek_benifit_top?>" id="padT3" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox4" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">المبلغ</label>
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_value_right" class="form-control" value="<?=$sheek_value_right?>" id="padR4" data-validation="required">
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_value_top" class="form-control" value="<?=$sheek_value_top?>" id="padT4" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox5" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">التفقيط</label>
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_text_right" class="form-control" value="<?=$sheek_text_right?>" id="padR5" data-validation="required">
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_text_top" class="form-control" value="<?=$sheek_text_top?>" id="padT5" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox6" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width">البيان</label>
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_byan_right" class="form-control" value="<?=$sheek_byan_right?>" id="padR6" data-validation="required">
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_byan_top" class="form-control" value="<?=$sheek_byan_top?>" id="padT6" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox7" class="custom-checkbox2" checked>
							<label class="label label-custom2 label-blue auto-width" style="font-size: 10px;">لايصرف إلا للمستفيد الأول</label>
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_sarf_right" class="form-control" value="<?=$sheek_sarf_right?>" id="padR7" data-validation="required">
						</div>
						<div class="col-xs-4">
							<input type="number" step="0.1" name="sheek_sarf_top" class="form-control" value="<?=$sheek_sarf_top?>" id="padT7" data-validation="required">
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
							<input type="checkbox" name="" id="checkbox8" class="custom-checkbox2 cc" checked>
							<label class="label label-custom2 label-blue auto-width">رقم الشيك</label>
						</div>
						<div class="col-xs-2 pad-2">
							<input type="number" step="0.1" name="" class="form-control" value="100" id="wid8" placeholder="عرض"  min="1" max="100" data-validation="required">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" step="0.1" name="ka3b_num_right" class="form-control" value="<?=$ka3b_num_right?>" id="padR8" data-validation="required">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" step="0.1" name="ka3b_num_top" class="form-control" value="<?=$ka3b_num_top?>" id="padT8" data-validation="required">
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox9" class="custom-checkbox2 cc" checked>
							<label class="label label-custom2 label-blue auto-width">التاريخ</label>
						</div>
						<div class="col-xs-2 pad-2">
							<input type="number" step="0.1" name="" class="form-control" value="100" id="wid9" placeholder="عرض"  min="1" max="100" data-validation="required">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" step="0.1" name="ka3b_date_right" class="form-control" value="<?=$ka3b_date_right?>" id="padR9" data-validation="required">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" step="0.1" name="ka3b_date_top" class="form-control" value="<?=$ka3b_date_top?>" id="padT9" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox10" class="custom-checkbox2 cc" checked>
							<label class="label label-custom2 label-blue auto-width">إلى</label>
						</div>
						<div class="col-xs-2 pad-2">
							<input type="number" step="0.1" name="" class="form-control" value="100" id="wid10" placeholder="عرض"  min="1" max="100" data-validation="required">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" step="0.1" name="ka3b_to_right" class="form-control" value="<?=$ka3b_to_right?>" id="padR10" data-validation="required">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" step="0.1" name="ka3b_to_top" class="form-control" value="<?=$ka3b_to_top?>" id="padT10" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 no-padding">
							<input type="checkbox" name="" id="checkbox11" class="custom-checkbox2 cc" checked>
							<label class="label label-custom2 label-blue auto-width">المبلغ</label>
						</div>
						<div class="col-xs-2 pad-2">
							<input type="number" step="0.1" name="" class="form-control" value="100" id="wid11" placeholder="عرض"  min="1" max="100" data-validation="required">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" step="0.1" name="ka3b_value_right" class="form-control" value="<?=$ka3b_value_right?>" id="padR11" data-validation="required">
						</div>
						<div class="col-xs-3 pad-2">
							<input type="number" step="0.1" name="ka3b_value_top" class="form-control" value="<?=$ka3b_value_top?>" id="padT11" data-validation="required">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-5 no-padding">
							<label class="label label-custom2 label-blue auto-width">حرر فى مدينة</label>
						</div>
						<div class="col-xs-7">
							<input type="number" step="0.1" name="horer_in" class="form-control" value="<?=$horer_in?>" data-validation="required">
						</div>
						
					</div>
					<div class="form-group">
						<div class="col-xs-5 no-padding">
							<label class="label label-custom2 label-blue auto-width">التنصيص</label>
						</div>
						<div class="col-xs-7">
							<input type="number" step="0.1" value="<?=$quotation?>" name="quotation" class="form-control" data-validation="required">
						</div>
					</div>
					<!--div class="form-group">
						<div class="col-xs-5 no-padding">
							<label class="label label-custom2 label-blue auto-width" >الطابعة</label>
						</div>
						<div class="col-xs-7">
							<input type="number" name="" class="form-control">
						</div>
					</div-->
				</div>
			</div>

			<div class="col-xs-12">
	            <input type="hidden" name="type" id="type" value="<?=$type?>">

	            <button type="" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn">
	                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
	            </button>
	        </div>
		</div>
		<?php echo form_close(); ?>
		<div class="col-md-4 col-xs-12 ">
			<br>
			<button class="btn btn-success" onclick="printDiv('cheque')">طباعـــــة</button>
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
						<input type="number" step="0.1" name="" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">المستفيد</label>
					</div>
					<div class="col-xs-8">
						<input type="number" step="0.1" name="" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">المبلغ</label>
					</div>
					<div class="col-xs-8">
						<input type="number" step="0.1" name="" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">التفقيط</label>
					</div>
					<div class="col-xs-8">
						<input type="number" step="0.1" name="" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">البيان</label>
					</div>
					<div class="col-xs-8">
						<input type="number" step="0.1" name="" class="form-control">
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
				<div class="col-xs-6">
					<div class="form-group ">
						<label class="label label-custom label-blue auto-width">اعدادت الخط</label>
					</div>

					<button class="btn btn-success fzincrease">+</button>
					<span id="quant" >14px</span>
					<button class="btn btn-danger fzdecrease">-</button>
				</div>
			</div>
		</div>
	</div>
	<table id="example" class="table table-bordered" role="table">
        <thead>
            <tr class="info">
                <th width="2%">م</th>
                <th class="text-left">إسم البنك</th>
                <th class="text-left">حجم الشيك</th>
                <th class="text-left">العرض</th>
                <th class="text-left">الإرتفاع</th>
                <th class="text-left">الإجراء</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (isset($records) && $records != null) {
            $x = 1;
            foreach ($records as $value) {
        ?>
            <tr>
                <td><?=$x++?></td>
                <td><?=$value->title?></td>
                <td><?=$size[$value->size]?></td>
                <td><?=$value->full_width?></td>
                <td><?=$value->full_height?></td>
                <td>
                    <a href="<?=base_url()."finance_accounting/box/sheek_setting/Sheek_setting/edit/".$value->id?>" title="تعديل"><i class="fa fa-pencil"></i></a>

                    <a onclick="$('#adele').attr('href', '<?=base_url()."finance_accounting/box/sheek_setting/Sheek_setting/delete/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>
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
	<page size="A4">
		<div class="container-fluid">
			<div class="" id="cheque" data-src="path/to/image" data-caching-key="userImage">
				<div class="elbelad no-padding" id="fisrtDiv"  data-src="path/to/image" data-caching-key="userImage">
					<div class="right-chick  ">
						<div class="top-backs">
							<div class="bond-header">
								<div class="col-xs-6 pad-2">
									<div  class="rightbond-header">	
										<p style="margin-right: <?=$sheek_date_right?>px; margin-top: <?=$sheek_date_top?>px;" class="line" id="data-block1">20/12/2019</p>
										<p style="margin-right: <?=$sheek_horer_right?>px; margin-top: <?=$sheek_horer_top?>px;" class="line" id="data-block2">مدينة بريدة</p>
									</div>
								</div>
								<div class="col-xs-6 pad-2">
									<div class="leftbond-header">	
										<p style="margin-right: <?=$ka3b_num_right?>px; margin-top: <?=$ka3b_num_top?>px;" class="line"><span class="right-lang"><strong></strong></p>
									</div>
								</div>
							</div>
							<div class="divider1"></div>
							<div class="bond-body"  id="updateDiv">
								<div class="col-xs-12 pad-2">
									<p style="margin-right: <?=$sheek_benifit_right?>px; margin-top: <?=$sheek_benifit_top?>px;" class="line line-pay" id="data-block3">أحمد على طه يحيي</p>
								</div>
								<div class="col-xs-12 pad-2">
									<div class="col-xs-3 pad-2">
										<p style="margin-right: <?=$sheek_value_right?>px; margin-top: <?=$sheek_value_top?>px;" class="line" id="data-block4">
											2000 ريال 
										</p>
									</div>
									<div class="col-xs-9 no-padding">
										<p style="margin-right: <?=$sheek_text_right?>px; margin-top: <?=$sheek_text_top?>px;" class="line" id="data-block5">خمسون ألف ريال سعودى فقط لا لا غير</p>
										<p class="line" id="data-block6">البيان</p>

									</div>
								</div>
								<div class="col-xs-12 pad-2">
									<div class="col-xs-3 pad-2">
										<p style="margin-right: <?=$sheek_byan_right?>px; margin-top: <?=$sheek_byan_top?>px;" class="line" id="data-block7">محمد احمد</p>
									</div>
									<div class="col-xs-9 no-padding">
										<div class="name-charity" style="float: left;">
										</div>
										<p style="margin-right: <?=$sheek_sarf_right?>px; margin-top: <?=$sheek_sarf_top?>px;" class="hint-bottom"></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="kaab no-padding" id="secondDiv">
					<div class="bond-sidebar">
						<p style="margin-right: <?=$ka3b_num_right?>px; margin-top: <?=$ka3b_num_top?>px;" class="line line-pay" id="data-block8">2012365</p>
						<p style="margin-right: <?=$ka3b_date_right?>px; margin-top: <?=$ka3b_date_top?>px;" class="line line-pay" id="data-block9">20/2/2019</p>
						<p style="margin-right: <?=$ka3b_to_right?>px; margin-top: <?=$ka3b_date_top?>px;" class="line line-pay" id="data-block10">محمد سعيد </p>
						<p style="margin-right: <?=$ka3b_value_right?>px; margin-top: <?=$ka3b_value_top?>px;" class="line line-pay" id="data-block11">محمد سعيد </p>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</page>
</body>