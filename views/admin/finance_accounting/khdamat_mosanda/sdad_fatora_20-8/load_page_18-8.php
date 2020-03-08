<style type="text/css">
	.piece-box h5 {
		margin-top: 5px;
		margin-bottom: 5px;
		font-size: 18px;
		font-family: 'hl';

	}
</style>

<input type="hidden" name="t_rkm" value="<?=$_POST['t_rkm']?>">
<input type="hidden" name="t_date" value="<?=$_POST['t_date']?>">
<input type="hidden" name="start_laqb" value="<?=$_POST['start_laqb']?>">
<input type="hidden" name="to_geha_id_fk" value="<?=$_POST['to_geha_id_fk']?>">
<input type="hidden" name="end_laqb" value="<?=$_POST['end_laqb']?>">
<input type="hidden" name="mawdo3" value="<?=$_POST['mawdo3']?>">
<input type="hidden" name="start_laqb_name" value="<?=$_POST['start_laqb_name']?>">
<input type="hidden" name="to_geha_name" value="<?=$_POST['to_geha_name']?>">
<input type="hidden" name="end_laqb_name" value="<?=$_POST['end_laqb_name']?>">
<input type="hidden" name="total_value" value="<?=$_POST['total_value']?>">
<section class="main-body">



	<div class="print_forma  col-xs-12 no-padding">


		<div class="piece-box" style="margin-top: 10px">

			<div class="col-xs-11 col-xs-offset-1">
				<h5 style="margin-top: 6px;"><?=$_POST['start_laqb_name']?>/<?=$_POST['to_geha_name2']?> <span style="float: left;"><?=$_POST['end_laqb_name']?></span> </h5>
			</div>
			<div class="col-xs-12 form-group">
				<input name="salam" style="width:100%" value="السلام عليكم ورحمة الله وبركاته ،،وبعد،،،" />
			</div>
			<div class="col-xs-12 form-group">
				<input name="debaga" style="width:100%" value="نرفع لسعادتكم الفواتير والمطالبات المستحقة الموضحة بالجدول أدناه و بيانها كالتالي :- " />
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
							التاريخ
						</th>
						<th class="text-center" style="text-align: center;">
						الجهه

						</th>
						<th class="text-center" style="text-align: center;">
							رقم الفاتوره

						</th>
						<th class="text-center" style="text-align: center;">
						البيان

						</th>
						<th class="text-center" style="text-align: center;">
							مرك التكلفه

						</th>
					</tr>
					</thead>
					<tbody>
					<?php

					if(isset($_POST['f_value']) && !empty($_POST['f_value'])){
					$count=count($_POST['f_value']);
						for($i=0 ; $i<$count ; $i++){?>
							<input type="hidden" name="f_value[]" value="<?=$_POST['f_value'][$i]?>">
							<input type="hidden" name="date[]" value="<?=$_POST['date'][$i]?>">
							<input type="hidden" name="f_geha_id_fk[]" value="<?=$_POST['f_geha_id_fk'][$i]?>">
							<input type="hidden" name="f_geha_name[]" value="<?=$_POST['f_geha_name'][$i]?>">
							<input type="hidden" name="f_markz_taklfa_id_fk[]" value="<?=$_POST['f_markz_taklfa_id_fk'][$i]?>">

							<input type="hidden" name="rkm_fatora[]" value="<?=$_POST['rkm_fatora'][$i]?>">
							<input type="hidden" name="byan[]" value="<?=$_POST['byan'][$i]?>">


							<tr>
								<td><?=$_POST['f_value'][$i]?></td>
								<td><?=$_POST['date'][$i]?></td>
								<td><?=$_POST['f_geha_name'][$i]?></td>
								<td><?=$_POST['rkm_fatora'][$i]?></td>
								<td><?=$_POST['byan'][$i]?></td>
								<td><?=$_POST['f_markz_taklfa_name'][$i]?></td>



							</tr>


         <?php } } ?>

					</tbody>
					<tfoot>
					<td class=""><?=$_POST['total_value']?></td>
					<td style="text-align: right;" colspan="5"><?php if(!empty($_POST['total_value_arabic'])){ echo $_POST['total_value_arabic']; }?></td>
					</tfoot>
				</table>
			</div>

		</div>








	</div>



	<div class="col-md-6 ">
		<button type="submit" name="insert"  class="btn btn-labeled btn-success "> <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>
	</div>

</section>


