
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
		color: #fff;
	}
	.piece-box table{
		margin-bottom: 0
	}
	.piece-box table th,
	.piece-box table td
	{
		padding: 2px 8px !important;
	}

	.piece-box h6 {
		font-size: 16px;
		margin-bottom: 5px;
		margin-top: 5px;
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
	.table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
		border: 1px solid #abc572;
		vertical-align: middle;
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

</style>

<div class=" col-xs-12 no-padding">
	<div class="piece-box">
		<div class="piece-heading">
			<div class="col-xs-12">
				<h5> </h5>
			</div>
		</div>
		<div class="piece-body">
			<div class="col-md-12 no-padding">
				<table class="table table-bordered" style="table-layout: fixed;">
					<tbody>

					<tr class="open_green">
						<td>حالة الكفالة</td>
						<td><select name="kafala_status" id="kafala_status" data-validation="required"
									class="form-control " aria-required="true">
								<option value="">إختر</option>
								<?php
								$fe2a_type_arr =array('إختر','مستمر','متقطع','منتظم','موقوف');
								if(isset($fe2a_type_arr)&&!empty($fe2a_type_arr)) {
									for($a=1;$a<sizeof($fe2a_type_arr);$a++){
										?>
										<option value="<?php echo $a;?>"
											<?php if(!empty($k_gender_fk)){
												if($a==$k_status){ echo 'selected'; }
											} ?>> <?php echo $fe2a_type_arr[$a];?></option >
										<?php
									}
								}
								?>
							</select>
						</td>
						<td>تاريخ بداية الكفالة</td>
						<td><input type="text" name="from_date" data-validation="required"
								   id="from_date" value=""
								   class="form-control  date_as_mask"
								   data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
								   onchange="checkYear($(this).val());">
						</td>
						<td>تاريخ نهاية الكفالة</td>
						<td><input type="text" name="to_date" data-validation="required"
								   id="to_date" value=""
								   class="form-control  date_as_mask"
								   data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
								   onchange="checkYear($(this).val());"></td>
					</tr>
					<tr>

						<td>تنبيه الإنتهاء </td>
						<td><select id="alert_type"  class="form-control "data-validation="required"
							name="alert_type"  onchange="GetDays($(this).val(),$('#num').val())">
								<option value="">إختر</option>
								<?php
								$alert_type_arr =array('إختر','يوم','أسبوع','شهر');
								if(isset($alert_type_arr)&&!empty($alert_type_arr)) {
								for($a=1;$a<sizeof($alert_type_arr);$a++){
										?>
										<option value="<?php echo $a;?>"
											<?php if(!empty($alert_type)){
												if($a == $alert_type){ echo 'selected'; }
											} ?>> <?php echo $alert_type_arr[$a];?></option >
										<?php
									}
								}
								?>
							</select>
						</td>
						<td>العدد</td>
						<td><input type="text" name="num" id="num" onkeyup="GetDays($('#alert_type').val(),$(this).val())"
								   data-validation="required" onkeypress="validate_number(event);"
								   class="form-control "></td>
						<td>عدد الايام</td>
						<td><input type="text" name="num_days" id="num_days"
								   onkeypress="validate_number(event);" readonly
								   value=" " class="form-control"></td>
					</tr>
					<tr class="open_green">

						<td>توريد الكفالة</td>
						<td> <select id="pay_method" name="pay_method"
						 class="form-control " data-validation="required">
								<option value="">إختر</option>
								<?php
						$pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
								if(isset($pay_method_arr)&&!empty($pay_method_arr)) {
										for($a=1;$a<sizeof($pay_method_arr);$a++){
										?>
										<option value="<?php echo$a;?>"
											<?php if(!empty($pay_method)){
												if($a == $pay_method){ echo 'selected'; }
											} ?>> <?php echo $pay_method_arr[$a];?></option >
										<?php
									}
								}
								?>
							</select>
						</td>
						<td>إسم البنك</td>
						<td> <select name="bank_id_fk" id="bank_id_fk" class="form-control"
									 aria-required="true" data-validation="required">
								<option value="">إختر</option>
								<?php if (!empty($banks)) {
									foreach ($banks as $bank) { ?>
										<option value="<?php echo $bank->id; ?>"
											<?php if(!empty($bank_id_fk)){
												if($bank->id == $bank_id_fk){ echo 'selected'; }
											} ?>><?php echo $bank->ar_name; ?></option>
									<?php }
								} ?>
							</select>
						</td>
						<td>رقم الحساب</td>
						<td><input type="text" name="bank_account_num" id="bank_account_num"
								   onkeyup="length_hesab_om($(this).val());"  data-validation="required"
								   class="form-control bottom-input " data-validation-has-keyup-event="true">
							<small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small></td>
					</tr>
					<tr>


						<td>الفرع </td>
						<td><input type="text" name="bank_branch"  data-validation="required"
							value="" class="form-control " data-validation-has-keyup-event="true">
						</td>
					</tr>
					</tbody>
				</table>
				<input type="hidden" name="person_type" value="<?=$result['halt_elmostafid_member']?>">
				<input type="hidden" name="mother_national_num_fk" value="<?=$result['mother_national_num_fk']?>">
				<input type="hidden" name="person_id_fk" value="<?=$result['id']?>">

			</div>

		</div>

	</div>
</div>

