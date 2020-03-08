<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>بيانات البحث</h4>
                </div>
            </div>
            
            <div class="panel-body">
		    	<?php if(isset($permits) && $permits != null){ ?>
		    	<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>إسم الموظف</th>
							<th>الفرع</th>
							<th>التاريخ</th>
							<th>الحالة</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						$status = array('لم يتم إتخاذ إجراء','تم الموافقة على الإذن','تم رفض الإذن');
						foreach ($permits as $permit) { 
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=$permit->employee?></td>
							<td><?=$permit->main.' -- '.$permit->sub?></td>
							<td><?=date("Y-m-d",$permit->permit_date)?></td>
							<td><?=$status[$permit->status]?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<?php }else{ ?>
				<div class="alert alert-danger">لا توجد أذونات خلال تلك الفترة</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>