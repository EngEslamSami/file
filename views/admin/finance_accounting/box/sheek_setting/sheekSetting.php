<style type="text/css">
	#cheque{
		color: #a96a61;
	/*	background: url(<?php echo base_url(); ?>asisst/admin_asset/img/sheek_imgs/elraghy.png);*/
		background-position: 100% 100% !important;
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
        #cheque{
		color: #a96a61;
	/*	background: url(<?php echo base_url(); ?>asisst/admin_asset/img/sheek_imgs/elraghy.png);*/
		background-position: 100% 100% !important;
		background-size: 100% 100% !important;
		background-repeat: no-repeat !important;
		height: 9cm;
		width: 27cm;
		margin: 0 auto;
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
		width:100%;
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
		size: 27cm 9cm;
		margin: 0
	}
	page[size="A4"] {  
		width: 27cm;
		height:9cm ; 
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
    .boldWeight{
        font-weight: bold;
    }
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
    input[type=date]::-webkit-clear-button{
        display: none; 
        -webkit-appearance: none; 
    }
    .ft_12{
            font-size: 12px !important;
    }
</style>
<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title">عرض الشيك</h3>
        </div>
        <div class="panel-body">
			<body id="page-top" data-spy="scroll" onload="checkEdits()">
				<?php
				$id = $this->uri->segment(6);
				$size = array(1=>'كبير', 2=>'صغير');
				if ($id == '') {
					echo form_open_multipart('finance_accounting/box/sheek_setting/Sheek_setting/add');
					$bank_id			 = '';
					$code_account_id	 = '';
					$size_sheek 		 = '';
					$full_width			 = '27';
					$full_height		 = '9';
					$sheek_date_right	 = '1.2';
					$sheek_date_top		 = '0';
					$sheek_horer_right	 = '1';
					$sheek_horer_top	 = '0';
					$sheek_benifit_right = '3.7';
					$sheek_benifit_top   = '0.2';
					$sheek_value_right   = '1.4';
					$sheek_value_top     = '0.6';
					$sheek_text_right 	 = '1.5';
					$sheek_text_top 	 = '0.5';
					$sheek_byan_right 	 = '1.5';
					$sheek_byan_top 	 = '0.8';
					$sheek_sarf_right	 = '8.9';
					$sheek_sarf_top		 = '0';
					$ka3b_num_right		 = '1';
					$ka3b_num_top		 = '0';
					$ka3b_date_right	 = '1';
					$ka3b_date_top		 = '0';
					$ka3b_to_right		 = '1';
					$ka3b_to_top 		 = '0';
					$ka3b_value_right	 = '1';
					$ka3b_value_top		 = '0';
					$horer_in			 = '';
					$quotation			 = '';
					$sheek_date			 = '';
					$benefit_name		 = '';
					$value_num 			 = '';
					$value_text			 = '';
					$byan   			 = '';
					$type				 = 1;
					$img				 = '';
					$bold				 = 0;
					$color 				 = 'a96a61';
					$font 				 = '14px';
					$required			 = 'required';
					$condition_text		 = '';
				}
				else {
					echo form_open_multipart('finance_accounting/box/sheek_setting/Sheek_setting/update/'.$id);
					$bank_id			 = $recordSheek['bank_id'];
					$code_account_id	 = $recordSheek['code_account_id'];
					$size_sheek 		 = $recordSheek['size'];
					$full_width			 = $recordSheek['full_width'];
					$full_height		 = $recordSheek['full_height'];
					$sheek_date_right	 = $recordSheek['sheek_date_right'];
					$sheek_date_top		 = $recordSheek['sheek_date_top'];
					$sheek_horer_right	 = $recordSheek['sheek_horer_right'];
					$sheek_horer_top	 = $recordSheek['sheek_horer_top'];
					$sheek_benifit_right = $recordSheek['sheek_benifit_right'];
					$sheek_benifit_top   = $recordSheek['sheek_benifit_top'];
					$sheek_value_right   = $recordSheek['sheek_value_right'];
					$sheek_value_top     = $recordSheek['sheek_value_top'];
					$sheek_text_right 	 = $recordSheek['sheek_text_right'];
					$sheek_text_top 	 = $recordSheek['sheek_text_top'];
					$sheek_byan_right 	 = $recordSheek['sheek_byan_right'];
					$sheek_byan_top 	 = $recordSheek['sheek_byan_top'];
					$sheek_sarf_right	 = $recordSheek['sheek_sarf_right'];
					$sheek_sarf_top		 = $recordSheek['sheek_sarf_top'];
					$ka3b_num_right		 = $recordSheek['ka3b_num_right'];
					$ka3b_num_top		 = $recordSheek['ka3b_num_top'];
					$ka3b_date_right	 = $recordSheek['ka3b_date_right'];
					$ka3b_date_top		 = $recordSheek['ka3b_date_top'];
					$ka3b_to_right		 = $recordSheek['ka3b_to_right'];
					$ka3b_to_top 		 = $recordSheek['ka3b_to_top'];
					$ka3b_value_right	 = $recordSheek['ka3b_value_right'];
					$ka3b_value_top		 = $recordSheek['ka3b_value_top'];
					$horer_in			 = $recordSheek['horer_in'];
					$quotation			 = $recordSheek['quotation'];
					$sheek_date			 = $recordSheek['sheek_date'];
					$benefit_name		 = $recordSheek['benefit_name'];
					$value_num 			 = $recordSheek['value'];
					$value_text			 = $recordSheek['value_text'];
					$byan   			 = $recordSheek['byan'];
					$type				 = $recordSheek['type'];
					$img				 = $recordSheek['img'];
					$bold				 = $recordSheek['bold'];
					$color				 = $recordSheek['color'];
					$font				 = $recordSheek['font'];
					$condition_text		 = $recordSheek['condition_text'];
					$required			 = '';
				}
				?>
				<div class="container-fluid no-padding">
					<div class="col-md-8 col-xs-12 no-padding">
						<div class="col-md-4">
							<div class="form-group ">
								<div class="col-xs-4 no-padding">
									<label class="label label-custom label-blue auto-width">البنك</label>
								</div>
								<div class="col-xs-8 no-padding">
									<select name="bank_id" class="form-control" data-validation="required" id="chooseBank" onchange='getAccounts(<?=json_encode($banks)?>, $(this).val()); chooseBank(this);'>
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
						<div class="col-md-4">
							<div class="form-group ">
								<div class="col-xs-4 no-padding">
									<label class="label label-custom label-blue auto-width">الحساب</label>
								</div>
								<div class="col-xs-8 no-padding">
									<select name="code_account_id" id="code_account_id" class="form-control" data-validation="required">
										<option value="">اختر</option>
										<?php
										if (isset($banks) && $banks != null) {
											foreach ($banks as $value) {
												if ($value->id == $bank_id) {
													foreach ($value->accounts as $account) {
														$selected = '';
														if ($account->rqm_hesab == $code_account_id) {
																$selected = 'selected';
														}
										?>
										<option value="<?=$account->rqm_hesab?>" <?=$selected?>><?=$account->title?></option>
										<?php
													}
													break;
												}
											}
										}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group ">
								<div class="col-xs-4 no-padding">
									<label class="label label-custom label-blue auto-width">الحجم</label>
								</div>
								<div class="col-xs-8 no-padding">
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
						<div class="col-md-4">
							<div class="form-group ">
								<div class="col-xs-4 no-padding">
									<label class="label label-custom label-blue auto-width">العرض</label>
								</div>
								<div class="col-xs-8 no-padding">
									<input type="number" step="0.1" name="full_width" class="form-control" value="<?=$full_width?>" id="chick-width" onblur="" data-validation="required" onblur="changeWidth(this.value)">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group ">
								<div class="col-xs-4 no-padding">
									<label class="label label-custom label-blue auto-width">الإرتفاع</label>
								</div>
								<div class="col-xs-8 no-padding">
									<input type="number" step="0.1" name="full_height" class="form-control" value="<?=$full_height?>" id="chick-height" data-validation="required" nblur="changeHeight(this.value)">
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-md-6 no-padding">
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
							<div class="col-md-6 no-padding">
								<div class="form-group">
									<div class="col-sm-4 no-padding">
										<input type="checkbox" name="" id="checkbox-Kaab" class="custom-checkbox" checked>
									</div>
									<div class="col-sm-4">
										<label class="label label-custom2 label-blue auto-width">الكعب</label>
									</div>
									<div class="col-sm-4"></div>
								</div>
							<!--	<div class="form-group">
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
								</div>-->

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
									<div class="col-xs-4 no-padding">
										<label class="label label-custom label-blue auto-width">اعدادت الخلفية</label>
									</div>
									<div class="col-xs-8 pad-2">
										<input type="file" name="fileupload" value="fileupload" id="fileupload" style="height: 34px;" data-validation="<?=$required?>">
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-4 no-padding">
										<label class="label label-custom label-blue auto-width">اعدادت اللون</label>
									</div>
									<div class="col-xs-8 pad-2 text-center">
										<input class="jscolor" name="color" value="<?=$color?>" style="height: 34px; width: 100%">
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-4 no-padding">
										<label class="label label-custom label-blue auto-width">اعدادت الخط</label>
									</div>
									<div class="col-xs-8 pad-2 text-center">
										<button type="button" class="btn btn-success fzincrease">+</button>
										<span id="quant" ><?=$font?></span>
										<button type="button" class="btn btn-danger fzdecrease">-</button>
										<button type="button" class="btn btn-warning fzbold"><b>Bold</b></button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-12 no-padding">
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
									<input type="date" name="sheek_date" value="<?=$sheek_date?>" class="form-control text-left" data-validation="required" onchange="$('#data-block1').html($(this).val()); $('#data-block9').html($(this).val())">
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xs-12 no-padding">
							<div class="form-group ">
								<div class="col-xs-4 no-padding">
									<label class="label label-custom label-blue auto-width">المستفيد</label>
								</div>
								<div class="col-xs-8">
									<input type="text" name="benefit_name" value="<?=$benefit_name?>" class="form-control" data-validation="required" onkeyup="$('#data-block3').html($(this).val()); $('#data-block10').html($(this).val())">
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xs-12 no-padding">
							<div class="form-group ">
								<div class="col-xs-4 no-padding">
									<label class="label label-custom label-blue auto-width">المبلغ</label>
								</div>
								<div class="col-xs-8">
									<input type="text" onkeypress="return validate_number(event)" name="value" id="value" value="<?=$value_num?>" class="form-control" data-validation="required" onkeyup="var value = $('#quotation').val();$('#data-block4').html(value+$(this).val()+value);$('#data-block11').html($(this).val())">
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xs-12 no-padding">
							<div class="form-group ">
								<div class="col-xs-4 no-padding">
									<label class="label label-custom label-blue auto-width">التفقيط</label>
								</div>
								<div class="col-xs-8">
									<input type="text" name="value_text" value="<?=$value_text?>" class="form-control" data-validation="required" onkeyup="$('#data-block5').html($(this).val());">
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xs-12 no-padding">
							<div class="form-group ">
								<div class="col-xs-4 no-padding">
									<label class="label label-custom label-blue auto-width">البيان</label>
								</div>
								<div class="col-xs-8">
									<input type="text" name="byan" value="<?=$byan?>" class="form-control" data-validation="required" onkeyup="$('#data-block6').html($(this).val());">
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xs-12 no-padding">
							<div class="form-group">
								<div class="col-xs-4 no-padding">
									<label class="label label-custom label-blue auto-width">حرر فى مدينة</label>
								</div>
								<div class="col-xs-8">
									<input type="text" name="horer_in" class="form-control" value="<?=$horer_in?>" data-validation="required" onkeyup="$('#data-block2').html($(this).val());">
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xs-12 no-padding">
							<div class="form-group">
								<div class="col-xs-4 no-padding">
									<label class="label label-custom label-blue auto-width">التنصيص</label>
								</div>
								<div class="col-xs-8">
									<input type="text" value="<?=$quotation?>" name="quotation" id="quotation" class="form-control" data-validation="required" onkeyup="var value = $('#value').val();$('#data-block4').html($(this).val()+value+$(this).val());">
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xs-12 no-padding">
							<div class="form-group">
								<div class="col-xs-4 no-padding">
									<label class="label label-custom label-blue auto-width">حالة الصرف</label>
								</div>
								<div class="col-xs-8">
									<input type="text" value="<?=$condition_text?>" name="condition_text" id="condition_text" class="form-control" data-validation="required" onkeyup="$('#data-block7').html($(this).val());">
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xs-12 no-padding">
				            <input type="hidden" name="type" id="type" value="<?=$type?>">
				            <input type="hidden" name="bold" id="bold" value="<?=$bold?>">
				            <input type="hidden" name="font" id="font" value="<?=$font?>">
				            <button type="submit" class="btn btn-sm btn-labeled btn-success " name="save" value="save" style="background-color: #50ab20; border-color: #50ab20; padding: 0px 13px;     border-radius: 4px;">
			                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
			                </button>
			                <button type="button" class="btn btn-labeled btn-purple print-link" style="background-color: #5b69bc; border-color: #5b69bc; padding: 0px 13px;">
			                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
			                </button>
				        </div>
					</div>
				</div>
				<?php echo form_close(); ?>
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
					<p style="right: <?=$sheek_date_right?>cm; top: <?=$sheek_date_top?>cm;" class="line" id="data-block1"><?=$sheek_date?></p>
					<p style="right: <?=$sheek_horer_right?>cm; top: <?=$sheek_horer_top?>cm;" class="line" id="data-block2"><?=$horer_in?></p>
				</div>
			</div>
			<div class="col-xs-6 pad-2">
				<div class="leftbond-header">
					<p style="right: <?=$ka3b_num_right?>cm; top: <?=$ka3b_num_top?>cm;" class="line"><span class="right-lang"><strong></strong></p>
                    	<p style="right: <?=$sheek_sarf_right?>cm; top: <?=$sheek_sarf_top?>cm;" class="line" id="data-block7"><?=$condition_text?></p>
				</div>
			</div>
		</div>
		<div class="divider1">
			
		</div>
		<div class="bond-body" id="updateDiv">
			<div class="col-xs-12 pad-2">
				<p style="right: <?=$sheek_benifit_right?>cm; top: <?=$sheek_benifit_top?>cm;" class="line line-pay" id="data-block3"><?=$benefit_name?></p>
			</div>
			<div class="col-xs-12 pad-2">
				<div class="col-xs-3 pad-2">
					<p style="right: <?=$sheek_value_right?>cm;top: <?=$sheek_value_top?>cm;" class="line" id="data-block4">
						<?=$quotation.$value_num.$quotation?> 
					</p>
				</div>
				<div class="col-xs-9 no-padding">
					<p style="right: <?=$sheek_text_right?>cm; top: <?=$sheek_text_top?>cm;" class="line" id="data-block5"><?=$value_text?></p>
					<p style="right: <?=$sheek_byan_right?>cm;top: <?=$sheek_byan_top?>cm;" class="line" id="data-block6"><?=$byan?></p>

				</div>
			</div>
			<div class="col-xs-12 pad-2">
				<div class="col-xs-9 no-padding">
					<div class="name-charity" style="float: left;">
					</div>
					<p style="right: <?=$sheek_sarf_right?>cm; top: <?=$sheek_sarf_top?>cm;" class="hint-bottom"></p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="kaab no-padding" id="secondDiv">
<div class="bond-sidebar">
	<p style="right: <?=$ka3b_num_right?>cm;top: <?=$ka3b_num_top?>cm;" class="line line-pay" id="data-block8"></p>
	<p style="right: <?=$ka3b_date_right?>cm; top: <?=$ka3b_date_top?>cm;" class="line line-pay" id="data-block9"><?=$sheek_date?></p>
	<p style="right: <?=$ka3b_to_right?>cm;top: <?=$ka3b_date_top?>cm;" class="line line-pay ft_12" id="data-block10"><?=$benefit_name?></p>
	<p style="right: <?=$ka3b_value_right?>cm; top: <?=$ka3b_value_top?>cm;" class="line line-pay" id="data-block11"><?=$value_num?></p>
	<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</page>





			</body>
		</div>
	</div>
</div>
<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title">جدول البيانات</h3>
        </div>
        <div class="panel-body">
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
		               
                       
<a target="_blank" href="<?=base_url()."finance_accounting/box/sheek_setting/Sheek_setting/print_sheek/".$value->id?>" title="طباعه"><i class="fa fa-print"></i></a>                       
                       
                        </td>
		            </tr>
		        <?php
		            }
		        }
		        ?>
		        </tbody>
		    </table>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?=base_url().'asisst/admin_asset/'?>js/jQuery.print.js"></script>
<script src="<?=base_url().'asisst/admin_asset/'?>js/cheque.js"></script>
<script >
    $(function() {
        $('.print-link').on('click', function() {
            //Print ele4 with custom options
            $("page").print({
                //Use Global styles
                globalStyles : true,
                //Add link with attrbute media=print
                mediaPrint : true,
       
                timeout: 750
                //Don't print this
               
            });
        });
    });
</script>






<script type="text/javascript">
	function getAccounts(banks,id) {
		var select = document.getElementById('code_account_id');
        removeOptions(select);
        select.options[select.options.length] = new Option('إختر', '');
        for (var x = 0; x < banks.length; x++) {
        	var opt = document.createElement('option');
            if(banks[x].id == id){  
            	var accounts = banks[x].accounts;
            	for (var z = 0; z < accounts.length; z++) {
		        	$("#code_account_id").append($("<option></option>")
				                    .attr("value",accounts[z].rqm_hesab)
				                    .text(accounts[z].title)); 
		        }
		        break;
            }
        }
	}

	function removeOptions(selectbox) {
        for(var i = selectbox.options.length - 1 ; i >= 0 ; i--) {
            selectbox.remove(i);
        }
    }
</script>