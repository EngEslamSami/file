<?php
$status = array('لم يتم إتخاذ إجراء','تم الموافقة على طلب النقل','تم رفض طلب النقل');
?>
<div class="col-md-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>بيانات البحث</h4>
            </div>
        </div>
        <div class="panel-body">
        	<?php if($employee[0]->transforms != null){ ?>
        	<div class="row">
				<div class="col-md-8">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>التاريخ</th>
								<th>الإدارة / القسم المحول منه</th>
								<th>الإدارة / القسم المحول إليه</th>
								<th>الحالة</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$z = 1;
						foreach ($employee[0]->transforms as $value) { 
						?>
							<tr>
								<td><?=($z++)?></td>
								<td><?=date("Y-m-d",$value->date_transfer)?></td>
								<td><?=$value->current_main.' / '.$value->current_sub?></td>
								<td><?=$value->to_main.' / '.$value->to_sub?></td>
								<td><?=$status[$value->approved]?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>

				<div class="col-md-4">
					<div class="col-md-12 "></div>

	        		<div class="col-md-12 ">
       					<div class="col-md-4">
               				<h6><b>الإسم :</b></h6>
               			</div>
           				<div class="col-md-8">
           					<h6><?=$value->employee?></h6>
           				</div>
       				</div>

       				<div class="col-md-12 ">
       					<div class="col-md-4">
               				<h6><b>الإدارة :</b></h6>
               			</div>
           				<div class="col-md-8">
           					<h6><?=$value->main?></h6>
           				</div>
       				</div>

       				<div class="col-md-12 ">
       					<div class="col-md-4">
               				<h6><b>القسم :</b></h6>
               			</div>
           				<div class="col-md-8">
           					<h6><?=$value->subs?></h6>
           				</div>
       				</div>

       				<div class="col-md-12 ">
       					<div class="col-md-4">
               				<h6><b>التليفون :</b></h6>
               			</div>
           				<div class="col-md-8">
           					<h6><?=$value->phone_num?></h6>
           				</div>
       				</div>

       				<div class="col-md-12 ">
       					<div class="col-md-4">
               				<h6><b>العنوان :</b></h6>
               			</div>
           				<div class="col-md-8">
           					<h6><?=$value->address?></h6>
           				</div>
       				</div>
				</div>
			</div>
			<?php }else{ ?>
				<div class="alert alert-danger">لا توجد طلبات نقل سابقة لهذا الموظف</div>
			<? } ?>
		</div>
	</div>
</div>