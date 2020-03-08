<div class="col-sm-12 col-md-12 col-xs-12">
	<br>
    <div class="top-line"></div>
	<div class="col-md-12 fadeInUp wow">
	    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
		    <div class="panel-heading">
	            <div class="panel-title">
	              	<h4>البيانات</h4>
	            </div>
	        </div>

	        <div class="panel-body">
	        	<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">عدد المستهدفين</th>
							<th class="text-center">عدد المستفيدين</th>
							<th class="text-center">من الفترة</th>
							<th class="text-center">إلى الفترة</th>
							<th class="text-center">المكان</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($records as $value) { 
						?>
							<tr>
								<td><?=($x++)?></td>
								<td><?=$value->num?></td>
								<td><?=$value->orders_num?></td>
								<td><?=$value->from_date?></td>
								<td><?=$value->to_date?></td>
								<td><?=$value->title?></td>
							</tr>
						<? } ?>
					</tbody>
				</table>
	        </div>
	    </div>
	</div>
</div>