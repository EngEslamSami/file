<style type="text/css">
	.piece-box h5 {
		margin-top: 5px;
		margin-bottom: 5px;
		font-size: 18px;
		font-family: 'hl';

	}
</style>

<input type="hidden" name="method_type" value="<?=$_POST['method_type']?>">
<input type="hidden" name="bank_name" value="<?=$_POST['bank_name']?>">
<input type="hidden" name="bank_id" value="<?=$_POST['bank_id']?>">
<input type="hidden" name="reason" value="<?=$_POST['reason']?>">
<input type="hidden" name="emp_name" value="<?=$_POST['emp_name']?>">
<input type="hidden" name="emp_card_num" value="<?=$_POST['emp_card_num']?>">
<input type="hidden" name="process_date_ar" value="<?=$_POST['process_date_ar']?>">
<input type="hidden" name="start_laqb" value="<?=$_POST['start_laqb']?>">
<input type="hidden" name="end_laqb" value="<?=$_POST['end_laqb']?>">
<input type="hidden" name="geha_name" value="<?=$_POST['geha_name']?>">
<input type="hidden" name="emp_code" value="<?=$_POST['emp_code']?>">
<input type="hidden" name="edara_id_fk" id="edara_id_fk" value="<?=$_POST['edara_id_fk']?>">
<input type="hidden" name="qsm_id_fk" id="qsm_id_fk" value="<?=$_POST['qsm_id_fk']?>">
<!--edara_name-->
<!--qsm_name-->

<section class="main-body">



		<div class="print_forma  col-xs-12 no-padding">


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
					<h5 style="margin-top: 6px;">سعادة/مدير عام الجمعية <span style="float: left;">حفظه الله</span> </h5>
				</div>
				<div class="col-xs-12 form-group">
					<input name="salam" style="width:100%" value="السلام عليكم ورحمة الله وبركاته ،،وبعد،،،" />
				</div>
				<div class="col-xs-12 form-group">
					<input name="debaga" style="width:100%" value=" نرجوا من سعادتكم الموافقة على التحويل من الحسابات الفرعيةب/<?=$_POST['bank_name']?> إلى الحساب الرئيسي وفقا للجدول التالي :-   " />
					<h5> </h5>
				</div>
				<div class="col-xs-12">
					<table class="table table-bordered">
						<thead>
							<tr class="greentd">
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
							<input type="hidden" name="process_rkm" value="<?=$_POST['process_rkm']?>">
							<?php
                   if(!empty($result_details)) {
									foreach ($result_details as $key => $value) { ?>



							<input type="hidden" name="from_bank_id_fk[]" value="<?=$value['from_bank_id_fk']?>">
							<input type="hidden" name="from_bank_name[]" value="<?=$value['from_bank_name']?>">
							<input type="hidden" name="value[]" value="<?=$value['value']?>">
							<input type="hidden" name="from_general_hesab_id_fk[]" value="<?=$value['from_general_hesab_id_fk']?>">
							<input type="hidden" name="from_general_hesab_name[]" value="<?=$value['from_general_hesab_name']?>">
							<input type="hidden" name="from_ayban_rkm_full[]" value="<?=$value['from_ayban_rkm_full']?>">
							<input type="hidden" name="from_rkm_hesab[]" value="<?=$value['from_rkm_hesab']?>">
							<input type="hidden" name="from_rkm_hesab_name[]" value="<?=$value['from_rkm_hesab_name']?>">
							<input type="hidden" name="to_bank_id_fk[]" value="<?=$value['to_bank_id_fk']?>">
							<input type="hidden" name="to_bank_name[]" value="<?=$value['to_bank_name']?>">
							<input type="hidden" name="to_general_hesab_id_fk[]" value="<?=$value['to_general_hesab_id_fk']?>">
							<input type="hidden" name="to_general_hesab_name[]" value="<?=$value['to_general_hesab_name']?>">
							<input type="hidden" name="to_ayban_rkm_full[]" value="<?=$value['to_ayban_rkm_full']?>">
							<input type="hidden" name="to_rkm_hesab[]" value="<?=$value['to_rkm_hesab']?>">
							<input type="hidden" name="to_rkm_hesab_name[]" value="<?=$value['to_rkm_hesab_name']?>">


							<tr>
								<td><?php echo $value['value'].''.convertNumber($value['value']).' ريال فقط لا غير ' ;?></td>
								<td><?php echo $value['from_rkm_hesab'].'-'.$value['from_general_hesab_name'];?></td>
								<td><?php echo $value['to_rkm_hesab'].'-'.$value['to_general_hesab_name'];?></td>

							</tr>
							<?php } } ?>



						</tbody>
						<tfoot>
							<th class="">الغرض من التحويل</th>
							<th style="text-align: right;"><?php if(!empty($_POST['reason'])){ echo $_POST['reason']; }?></th>
						</tfoot>
					</table>
				</div>
				<div class="col-xs-12">
					<?php  if(!empty($_POST['process_date_ar'])){  $date =strtotime($_POST['process_date_ar']); }  ?>
					<h5> المندوب المفوض/ <?php if(!empty($_POST['emp_name'])){ echo $_POST['emp_name'];}?> رقم الهوية / <?php if(!empty($_POST['emp_card_num'])){ echo $_POST['emp_card_num'];}?> التوقيع/-------- التاريخ /
						<?php if(!empty($_POST['process_date_ar'])){   echo date('d-m-Y',$date); } ?> م</h5>


				</div>
			</div>








		</div>





</section>
