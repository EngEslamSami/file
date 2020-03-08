<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            
            <div class="panel-body">
<?php if(isset($records) && $records != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>إسم السائق</th>
							<th>رقم السايرة</th>
							<th>الحالة</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($records as $record) { 
							if($record->status == 0) {
								if($record->type == 1) {
									$driver = $record->name;
									$car = '-';
								}
								else {
									$driver = '-';
									$car = $record->name;
								}
								$status = 'متاح';
							}
							else {
								$car = $record->name;
								$driver = $record->type;
								$status = 'غير متاح';
							}
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=$driver?></td>
							<td><?=$car?></td>
							<td><?=$status?></td>
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