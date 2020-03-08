
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
<link href="<?php echo base_url()?>asisst/layout/bootstrap-arabic.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>asisst/layout/layout.css" rel="stylesheet" type="text/css">

<style>
	body {
		font-family: 'Cairo', sans-serif;
	}

	.no-padding {
		padding: 0;
	}

	.r-head {
		border: 1px solid #333;
		padding: 10px 0;
		margin-bottom: 2px;
		background-color: #eee;
	}

	.r-table {
		margin-bottom: 15px;
	}

	.r-table th {
		background-color: #eee;
		border: 1px solid #333;
		padding: 7px 4px;
		font-size: 13px;
		text-align: center;
	}

	.r-table td {
		border: 1px solid #333;
		padding: 7px 0;
	}

	.r-back-color td {
		background-color: #eee;
	}

</style>
<div id="printdiv"   >
	<header class=" col-xs-12" style="margin-top: 15px;">
		<div class="col-xs-12 r-head">
			<div class="col-xs-4" style="padding: 0;width: 35%;    display: inline-block;">
				<h5 class="text-center"> جمعية بناء</h5>
			
			</div>
			<div class="col-xs-4"  style="width: 30% ; display: inline-block;">
				<h5 class="text-center"> مسير رواتب الموظفات</h5>

			</div>
			<div class="col-xs-4" style="width: 30%;  display: inline-block;">
				<h5 class="text-right" style="margin-top: 20px;"> 25 / 5 / 2018 م</h5>
			</div>
		</div>
	</header>

	<div class="col-xs-12 rr-content">
		<div class="col-xs-12 no-padding">
			<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
				<thead>
				<tr>
					<th class="text-center">م</th>
					<th class="text-center">إسم الموظف</th>
					<th class="text-center">الراتب الأساسي</th>
					<?php if(isset($all_emp_allowances) && $all_emp_allowances != null){ foreach( $all_emp_allowances as $record){?>
						<th class="text-center"><?php echo $record->defined_title;?></th>
					<?php }  } ?>
					<th class="text-center">إجمالى الدخل</th>
					<th class="text-center">سلف</th>

					<?php if(isset($all_emp_deduction) && $all_emp_deduction != null){ foreach( $all_emp_deduction as $record){?>
						<th class="text-center"><?php echo $record->defined_title;?></th>
					<?php }  } ?>

					<!--sa-->
					<?php if(isset($penalty_names) && $penalty_names != null){ foreach( $penalty_names as $record){?>
						<th class="text-center"><?php echo $record->title;?></th>
					<?php }  } ?>
					<!--sa-->
					<th class="text-center">المكافأت</th>
					<th class="text-center">صافي</th>
				</tr>
				</thead>
				<tbody class="text-center">
				<?php
				$ALL_salary= 0;
				$ALL_emp_rewards= 0;
				$ALL_safy= 0;
				$ALL_income= 0;

				$ALL_=array();
				foreach ($all_emp_allowances as $vv){
					$ALL_[$vv->defined_id]= 0;
				}


				$ALL_emp_deduction=array();
				foreach ($all_emp_deduction as $cc){
					$ALL_emp_deduction[$cc->defined_id]= 0;
				}



				$ALL_penalty=array();
				foreach ($arr as $bb){
					$ALL_penalty[$bb]= 0;
				}



				$a=1;
				foreach ($all_employee as $record ):
					$arr_penalty =array();
					if (!empty($record->penalty)){

						if(isset($arr) && $arr != null){
							foreach ($arr as $k=>$v){
								$arr_penalty[$v]=$record->penalty[$v];
							} }
					}

					$allowances =unserialize($record->emp_allowances);
					$deduction =unserialize($record->emp_deduction);
					$salary=$record->salary;

					$ALL_salary +=$salary;
					$all_rewards=$record->all_rewards;?>
					<tr>
						<td><?php echo $a ?></td>
						<td><?echo $record->employee; ?></td>
						<td><?echo $record->salary; ?></td>
						<?php $val=0;  $ALL_bdl= 0; if(isset($all_emp_allowances) && $all_emp_allowances != null){ foreach( $all_emp_allowances as $record){?>
							<td><?php if( !empty($allowances[$record->defined_id]) && $allowances[$record->defined_id] !='' && $allowances[$record->defined_id] !=null){ echo $allowances[$record->defined_id];  $ALL_[$record->defined_id] += $allowances[$record->defined_id]; }else{ echo 0;} ?></td>
							<?php if( !empty($allowances[$record->defined_id]) && $allowances[$record->defined_id] !='' && $allowances[$record->defined_id] !=null){ $val +=$allowances[$record->defined_id]; }
						}  }
						$income =    $val +   $salary;        $ALL_income += $income;  ?>
						<td><?php echo$income; ?></td>
						<td>--</td>

						<?php $punishment=0; if(isset($all_emp_deduction) && $all_emp_deduction != null){ foreach( $all_emp_deduction as $record){?>
							<td><?php if( !empty($deduction[$record->defined_id]) && $deduction[$record->defined_id] !='' && $deduction[$record->defined_id] !=null){ echo $deduction[$record->defined_id];   $ALL_emp_deduction[$record->defined_id]+=$deduction[$record->defined_id]; }else{ echo 0;} ?></td>
							<?php  if( !empty($deduction[$record->defined_id]) && $deduction[$record->defined_id] !='' && $deduction[$record->defined_id] !=null){ $punishment +=$deduction[$record->defined_id];
							}              }  } ?>
						<!--sa-->
						<?php
						$penalty_values =0;
						if(isset($arr_penalty) && $arr_penalty != null){
							foreach ($arr_penalty as  $keys=>$value){
								$penalty_values +=$value;   $ALL_penalty[$keys]  +=$value; ?>

								<td><?php echo $value;?> </td>
							<?php     }
						} ?>
						<!--sa-->
						<td><?php echo$all_rewards;  $ALL_emp_rewards+=$all_rewards;?></td>
						<td><?php echo(($income+$all_rewards) -($penalty_values +$punishment));  $ALL_safy +=(($income+$all_rewards) -($penalty_values +$punishment));?></td>
					</tr>
					<?php  $a++;endforeach;?>

				<tr>
					<td colspan="2">الإجمالي</td>
					<td><?php echo $ALL_salary;?></td>
					<?php
					if(!empty($ALL_)){
						foreach ($ALL_ as $value){?>
							<td><?php echo $value;?></td>
						<?php   } } ?>
					<td><?php echo $ALL_income;?></td>
					<td>--</td>
					<?php
					if(!empty($ALL_emp_deduction)){
						foreach ($ALL_emp_deduction as $value2){?>
							<td><?php echo $value2;?></td>
						<?php   } } ?>

					<?php
					if(!empty($ALL_penalty)){
						foreach ($ALL_penalty as $value3){?>
							<td><?php echo $value3;?></td>
						<?php   } } ?>
					<td><?php echo $ALL_emp_rewards;?></td>
					<td><?php echo $ALL_safy;?></td>

				</tr>
				</tbody>
			</table>

			<div class="col-xs-12">
				<div class="col-xs-3" style="width: 24%; display: inline-block;">
					<h5 class="text-center"> <b>المحاسبة</b></h5>
					<h5 class="text-center"> عنود عايد عيد الشمري</h5>
				</div>
				<div class="col-xs-3" style="width: 24%; display: inline-block;">
					<h5 class="text-center"> <b>المراجع</b></h5>
					<h5 class="text-center"> محمد رمضان شقير</h5>
				</div>
				<div class="col-xs-3" style="width: 24%; display: inline-block;">
					<h5 class="text-center"> <b>المدير المالي والاداري</b></h5>
					<h5 class="text-center"> عثمان بن عمر المشعلي</h5>
				</div>
				<div class="col-xs-3" style="width: 24%; display: inline-block;">
					<h5 class="text-center"> <b>المدير التنفيذي</b></h5>
					<h5 class="text-center"> وليد بن محمد البكر </h5>
				</div>
			</div>
		</div>
	</div>

</div>

<script>
	var divElements = document.getElementById("printdiv").innerHTML;
	var oldPage = document.body.innerHTML;
	document.body.innerHTML =
		"<html><head><title></title></head><body><div id='printdiv'>" +
		divElements + "</div></body>";
	window.print();
	setTimeout(function () {location.replace("<?php echo base_url('All_reports/All_employee_report')?>");}, 0);
</script>
