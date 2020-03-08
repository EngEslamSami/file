
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
				<h5 class="text-center"> جمعية بناء </h5>
		
			</div>
			<div class="col-xs-4"  style="width: 30% ; display: inline-block;">
				<h5 class="text-center"> مسير رواتب الموظفات</h5>
	
			</div>
			<div class="col-xs-4" style="width: 30%;  display: inline-block;">

			</div>
		</div>
	</header>

	<div class="col-xs-12 rr-content">
		<div class="col-xs-12 no-padding">
			<table class="r-table" style="width:100%">
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
					<th class="text-center">غياب</th>
					<?php if(isset($all_emp_deduction) && $all_emp_deduction != null){ foreach( $all_emp_deduction as $record){?>
						<th class="text-center"><?php echo $record->defined_title;?></th>
					<?php }  } ?>
					<th class="text-center">المكافأت</th>
					<th class="text-center">صافي</th>

				</tr>
				</thead>
				<tbody class="text-center">
				<?php
				$a=1;
				foreach ($all_employee as $record ):     $allowances =unserialize($record->emp_allowances);
					$deduction =unserialize($record->emp_deduction);
					$salary=$record->salary;
					$all_penalty=$record->all_penalty;
					$all_rewards=$record->all_rewards;?>
					<tr>
						<td class="text-center"><?php echo $a ?></td>
						<td class="text-center"><?echo $record->employee; ?></td>
						<td class="text-center"><?echo $record->salary; ?></td>
						<?php $val=0; if(isset($all_emp_allowances) && $all_emp_allowances != null){ foreach( $all_emp_allowances as $record){?>
							<td class="text-center"><?php if( !empty($allowances[$record->defined_id]) && $allowances[$record->defined_id] !='' && $allowances[$record->defined_id] !=null){ echo $allowances[$record->defined_id]; }else{ echo 0;} ?></td>
							<?php if( !empty($allowances[$record->defined_id]) && $allowances[$record->defined_id] !='' && $allowances[$record->defined_id] !=null){ $val +=$allowances[$record->defined_id];}
						}  }
						$income =    $val +   $salary;      ?>
						<td class="text-center"><?php echo$income;?></td>
						<td class="text-center">--</td>
						<td class="text-center"><?php echo $all_penalty;?></td>
						<?php $punishment=0; if(isset($all_emp_deduction) && $all_emp_deduction != null){ foreach( $all_emp_deduction as $record){?>
							<td class="text-center"><?php if( !empty($deduction[$record->defined_id]) && $deduction[$record->defined_id] !='' && $deduction[$record->defined_id] !=null){ echo $deduction[$record->defined_id]; }else{ echo 0;} ?></td>
							<?php  if( !empty($deduction[$record->defined_id]) && $deduction[$record->defined_id] !='' && $deduction[$record->defined_id] !=null){ $punishment +=$deduction[$record->defined_id];
							}              }  } ?>
						<td><?php echo$all_rewards; ?></td>
						<td class="text-center"><?php echo(($income+$all_rewards) -($all_penalty+$punishment)); ?></td>

					</tr>
					<?php  $a++;endforeach;?>
				</tbody>
			</table>
			<div class="col-xs-12">
				<div class="col-xs-3" style="width: 24%; display: inline-block;">
					<h5 class="text-center"> <b>المحاسبة</b></h5>
					<h5 class="text-center"> .................</h5>
				</div>
				<div class="col-xs-3" style="width: 24%; display: inline-block;">
					<h5 class="text-center"> <b>المراجع</b></h5>
					<h5 class="text-center">.................</h5>
				</div>
				<div class="col-xs-3" style="width: 24%; display: inline-block;">
					<h5 class="text-center"> <b>المدير المالي والاداري</b></h5>
					<h5 class="text-center">............</h5>
				</div>
				<div class="col-xs-3" style="width: 24%; display: inline-block;">
					<h5 class="text-center"> <b>المدير التنفيذي</b></h5>
					<h5 class="text-center">...............</h5>
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
