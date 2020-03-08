


	<style type="text/css">
		.print_forma{
			/*border:1px solid #73b300;*/
			padding: 15px;
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
			margin-bottom: 0;
			font-size: 17px;
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
			.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
			.table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
			.table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
				border: 2px solid #000 !important;
			}

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
		.table-bordered.bor  {
			border: 5px double #000;
		}
		.table-bordered.bor>thead>tr>th, .table-bordered>tbody>tr>th,
		.table-bordered.bor>tfoot>tr>th, .table-bordered>thead>tr>td,
		.table-bordered.bor>tbody>tr>td, .table-bordered>tfoot>tr>td {
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
		.green-border span{
			border: 3px solid #6abb46;
			padding: 10px;
			border-radius: 10px;
		}
		.btn-success {
    background-color: #3c990b !important;
    border-color: #12891b !important;
}
.btn-purple {
    background-color: #5b69bc !important;
    border-color: #4c59a7 !important;
}
	</style>

<?php 
if($eznInfo['level'] >= 0) {
	$disabled1 = '';
	if ($eznInfo['level'] == 2 && $_SESSION['emp_code'] != $eznInfo['current_to_id'] || $eznInfo['level'] > 2) {
		$disabled1 = 'disabled';
	}
 ?>
<input type="hidden" name="ezn_id_fk" value="<?=$_POST['id']?>">
<div class="bond-header">
	<div class="col-xs-4 pad-2">
		<div class="right-img">
			<img src="img/sympol1.png">
		</div>
	</div>
	<div class="col-xs-4 pad-2">
		<div class="main-bond-title">
			<h3 class="text-center"><span class="">إذن صرف</span></h3>
		</div>
	</div>
	<div class="col-xs-4 pad-2">
		<div class="left-img">
			<img src="img/sympol2.png">
		</div>
	</div>
</div>


<div class="clearfix"></div><br>
<section class="main-body">

	<div class="col-xs-12">
		<div class="col-xs-4 text-center">
			<h4 class="green-border"><span>إدارة الشئون المالية</span></h4>
		</div>
		<div class="col-xs-4">

		</div>
		<div class="col-xs-4 text-center">
			<h4 class="green-border"><span>رقم الإذن : <?=$eznInfo['ezn_rqm']?></span></h4>
		</div>
	</div>
	<div class="print_forma  col-xs-12 ">

		<div class="piece-box" >
			<div class="piece-body">
				<div class="col-xs-12 no-padding">
					<div class="col-xs-1"></div>
					<div class="col-xs-10 no-padding">
						<h3>سعادة مدير عام الجمعية        <span style="float: left;">سلمه الله</span></h3>
					</div>
					<div class="col-xs-1"></div>
				</div>
				<div class="col-xs-12">
					<h5 class="text-center">السلام عليكم ورحمة الله وبركاته ،،،</h5>
				</div>

				<div class="col-xs-10 " style="margin-right: 2%">
					<h5>أرجو من سعادتكم التكرم بالتوجيه إلى من يلزم بصرف التالي:-</h5>
				</div>
			</div>

		</div>

		<div class="piece-box no-border">
			<div class="piece-body">
				<div class="col-xs-12">
					<table class="table table-bordered bor" style="table-layout: fixed">
						<tbody>
						<tr>
							<td style="width: 25%;">مبلغ وقدره (<?=$eznInfo['value']?>) </td>
							<td><?=$ArabicNum?> ريال فقط لا غير .</td>
						</tr>
						<tr>
							<td style="width: 25%;">اسم الجهه / المستفيد</td>
							<td><?=$eznInfo['person_name']?></td>
						</tr>
						<tr>
							<td style="width: 25%;">عبارة عن </td>
							<td><?=$eznInfo['about']?></td>
						</tr>
						</tbody>
					</table>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4 text-center">
						<h5> <span style="border-bottom:1px solid #000 ">الموظف المسئول</span></h5>
						<h5>  <?=$eznInfo['empName']?> </h5>
					</div>
					<div class="col-xs-4 text-center">
						<h5><span style="border-bottom:1px solid #000 ">مدير الإدارة</span></h5>
						
						<?php if ($eznInfo['level'] == 0) { ?>
						<select class="form-control input_style_2" style="border: none; width: 100%; text-align-last: center;" name="current_to_id" id="current_to_id" onchange="$('#current_to_name').val($('#current_to_id :selected').text())" data-validation="required">
							<option value="">إختر</option>
							<?php
							if (isset($emps) && $emps != null && $eznInfo['publisher'] == $_SESSION['user_id']) {
								foreach ($emps as $value) {
							?>
							<option value="<?=$value->id?>"><?=$value->employee?></option>
							<?php
								}
							}
							?>
						</select>
						<input type="hidden" name="current_from_name" value="<?=$eznInfo['empName']?>">
						<input type="hidden" name="current_from_id" value="<?=$eznInfo['publisher']?>">
						<input type="hidden" id="current_to_name" name="current_to_name" value="">
						<?php }else { ?>
							<h5><?=$eznInfo['modeerEdaraName']?></h5>
						<?php } ?>
					</div>
					<div class="col-xs-4 text-center">
						<h5><span style="border-bottom:1px solid #000 ">التاريخ </span></h5>
						<h5><?=$eznInfo['date_ar'].'م'?></h5>
					</div>
					<div class="clearfix"></div>
					<hr>
				</div>
			</div>
		</div>

<?php 
}
if ($eznInfo['level'] == 1) {
?>
<div class="col-xs-12">
	<div class="col-xs-2">
		<h5> <span style="border-bottom:1px solid #000 ">إختر المحاسب</span></h5>
	</div>
	<div class="col-xs-4">
		<select class="form-control input_style_2" style="border: none; width: 100%;" name="current_to_id" id="current_to_id" onchange="$('#current_to_name').val($('#current_to_id :selected').text())" data-validation="required">
			<option value="">إختر</option>
			<?php
			if (isset($emps) && $emps != null && $_SESSION['emp_code'] == $eznInfo['current_to_id']) {
				foreach ($emps as $value) {
			?>
			<option value="<?=$value->id?>"><?=$value->employee?></option>
			<?php
				}
			}
			?>
		</select>
		<input type="hidden" id="current_to_name" name="current_to_name" value="">

		<input type="hidden" name="current_from_id" value="<?=$eznInfo['current_to_id']?>">
		<input type="hidden" name="current_from_name" value="<?=$eznInfo['current_to_name']?>">

		<input type="hidden" name="last_from_id" value="<?=$eznInfo['current_from_id']?>">
		<input type="hidden" name="last_from_name" value="<?=$eznInfo['current_from_name']?>">

		<input type="hidden" name="last_to_id" value="<?=$eznInfo['current_to_id']?>">
		<input type="hidden" name="last_to_name" value="<?=$eznInfo['current_to_name']?>">

		<input type="hidden" name="last_procedure_title" value="<?=$eznInfo['current_procedure_title']?>">
		<input type="hidden" name="last_procedure_action" value="<?=$eznInfo['current_procedure_action']?>">
	</div>
<?php
}
if ($eznInfo['level'] >= 2) {
?>

		<div class="piece-box no-border">
			<div class="piece-body">
				<div class="col-xs-12">
					<h4 class="text-center"><span style="border-bottom:1px solid #000 ">إفادة الشئؤون المالية</span></h4>

					<table class="table table-bordered bor" style="table-layout: fixed">
						<tbody>
						<tr>
							<td style="width: 25%;">اسم البند(الحساب) </td>
							<td colspan="3"> 
								<div class="col-md-12 col-sm-6  no-padding">
								<input type="text" name="account" onclick="$('#Accounts').modal('show');" id="account" style="border: none; width: 100%" data-validation="required" data-validation-has-keyup-event="true" readonly="" value="<?=$eznInfo['band_code'].' '.$eznInfo['band_name']?>" <?=$disabled1?>>	
							</div>
								<input type="hidden" name="band_name" id="band_name" value="<?=$eznInfo['band_name']?>" <?=$disabled1?>>
								<input type="hidden" name="band_code" id="band_code" value="<?=$eznInfo['band_code']?>" <?=$disabled1?>>
							</td>
						</tr>
						<tr>
							<td style="width: 25%;">ملاحظات</td>
							<td colspan="3">
								<div class="col-md-12 col-sm-6  no-padding">
								<input type="text" name="notes" style="border: none; width: 100%" data-validation="required" data-validation-has-keyup-event="true" value="<?=$eznInfo['notes']?>" <?=$disabled1?>>
							</div>
							</td>
						</tr>
						<tr>
							<td colspan="2">المحاسب/<?=$eznInfo['mohasebName']?>       </td>
							<td>توقيع: </td>
							<td>التاريخ: <?=($eznInfo['mohasebDate']==null)?date("d-m-Y").'م':date('d-m-Y',$eznInfo['mohasebDate']).'م';?> </td>
						</tr>
						<?php if ($eznInfo['level'] == 2) { ?>
						<tr>
							<td>إختر المدير المالي</td>
							<td colspan="3">
								<select class="form-control input_style_2" style="border: none; width: 100%;" name="current_to_id" id="current_to_id" onchange="$('#current_to_name').val($('#current_to_id :selected').text())" data-validation="required">
									<option value="">إختر</option>
									<?php
									if (isset($emps) && $emps != null && $_SESSION['emp_code'] == $eznInfo['current_to_id']) {
										foreach ($emps as $value) {
									?>
									<option value="<?=$value->id?>"><?=$value->employee?></option>
									<?php
										}
									}
									?>
								</select>
		<input type="hidden" id="current_to_name" name="current_to_name" value="">

		<input type="hidden" name="current_from_id" value="<?=$eznInfo['current_to_id']?>">
		<input type="hidden" name="current_from_name" value="<?=$eznInfo['current_to_name']?>">

		<input type="hidden" name="last_from_id" value="<?=$eznInfo['current_from_id']?>">
		<input type="hidden" name="last_from_name" value="<?=$eznInfo['current_from_name']?>">

		<input type="hidden" name="last_to_id" value="<?=$eznInfo['current_to_id']?>">
		<input type="hidden" name="last_to_name" value="<?=$eznInfo['current_to_name']?>">

		<input type="hidden" name="last_procedure_title" value="<?=$eznInfo['current_procedure_title']?>">
		<input type="hidden" name="last_procedure_action" value="<?=$eznInfo['current_procedure_action']?>">
							</td>
						</tr>
					<?php } ?>

<?php 
}
if ($eznInfo['level'] >= 3 ) {
 ?>
<!--- abdfar ----------------------------------------------------------------------->
	<tr>
		<td style="width: 25%;">طريقة الصرف </td>
		<?php $sarf_method =array(1=>'نقداً',2=>'إصدار شيك',3=>'تحويل');?>
		<td colspan="3">
			<h5 class="text-center" style="margin: 4px">
				<?php  foreach($sarf_method as $key =>$row){ ?>
					<input tabindex="11"   data-validation="required" <?php if($eznInfo['level'] ==4) { echo 'disabled'; }?> style="margin-right:10px"  <?php if($eznInfo['sarf_method'] == $key){ echo'checked'; } ?> type="radio" name="sarf_method" value="<?=$key?> " >
					<label for="square-radio-1"><?=$row?> </label>
				<?php   }  ?>
			</h5>
		</td>
	</tr>
	<tr>
		<td colspan="2">مدير الشئون المالية/<?=$eznInfo['modeerMalyName']?></td>
		<td>توقيع: </td>
		<td>التاريخ: <?=date("d-m-Y").'م'?> </td>
	</tr>
	<?php if($eznInfo['level'] ==3) {  ?>
		<tr>
			<td style="width: 25%;">تحويل الطلب</td>
			<td colspan="3">
				<select class="form-control" name="to_id" data-validation="required"> <option value=""> إختر</option>
					<?php if(!empty($employees) && $_SESSION['emp_code'] == $eznInfo['current_to_id']){ foreach ($employees as $row){?>
						<option value="<?=$row->id?>"> <?=$row->employee?></option>
					<?php } } ?>
				</select>

			</td>
		</tr>
	<?php } ?>

<!-------------------------------------------------------------------------->
<?php  } ?>
						</tbody>
					</table>
					
	                    
				</div>
				
<?php if ($eznInfo['level'] >= 4 ) { ?>
	<div class="col-xs-12">
					<h4 class="text-center"><span style="border-bottom:1px solid #000 ">توجيه المدير العام</span></h4>
					<div class="col-xs-4 ">

						<h5><input type="radio" name="twgeh_moder_3am"  <?php if(!empty($eznInfo['twgeh_moder_3am'])){  if($eznInfo['level'] ==5){ ?>
								checked disabled <?php  }   }?>
								   onclick="$('#reason').prop('disabled', true);"  data-validation="required" value="1">  لا مانع من الصرف </h5>
						<h5><input type="radio" name="twgeh_moder_3am" <?php if(!empty($eznInfo['twgeh_moder_3am'])){   if($eznInfo['level'] ==5){ ?>
								checked disabled <?php }  }?>
								   onclick="$('#reason').prop('disabled', false);"
								   data-validation="required" value="2"> <input type="text" name="twgeh_moder_3am_text" id="reason" disabled  value="<?php if(!empty($eznInfo['twgeh_moder_3am_text'])){
								echo $eznInfo['twgeh_moder_3am_text']; } ?>"> </h5>
					</div>
					<div class="col-xs-8 "></div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-8 "></div>
					<div class="col-xs-4 text-center">
						<h5>مدير عام الجمعية</h5>
						<h5><?=$eznInfo['modeer3am']?></h5>
					</div>
<?php 
} 
if ($eznInfo['level'] >= 5) {
?>
					<div class="clearfix"></div>
					<hr>
					<h4 class="text-center"><span style="border-bottom:1px solid #000 ">إعتماد أمين الصندوق-عضو مجلس الإدارة</span></h4>
					<div class="col-xs-8 "></div>
					<div class="col-xs-4 text-center">
						<h5>أمـــــــــــــــين <br> الصنـــــــــــــــــــدوق</h5>
						<h5>عبدالله بن عبدالعزيز الصبيحي</h5>
					</div>

<?php } ?>
				</div>
			</div>
		</div>








	</div>
</section>
