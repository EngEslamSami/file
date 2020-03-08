<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>جدول البيانات</h4>
                </div>
            </div>
            
            <div class="panel-body">
<?php if(isset($violations) && $violations != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>تاريخ المخالفة</th>
							<th>إسم السائق</th>
							<th>رقم السيارة</th>
							<th>رقم الإيصال</th>
							<th>ملاحظات</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($violations as $violation) { 
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=date("Y-m-d",$violation->date)?></td>
							<td><?=$violation->driver_name?></td>
							<td><?=$violation->car_code?></td>
							<td><?=$violation->receipt_code?></td>
							<td><?=$violation->note?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
<?php 
	} 
	else {
		echo '<div class="alert alert-danger">لا توجد بيانات</div>';
	}
?>
			</div>
		</div>
	</div>
</div>