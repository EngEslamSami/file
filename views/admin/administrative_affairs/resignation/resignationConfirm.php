<?php
$type = array(1=>'إستقالة',2=>'العدم الرغبة في التجديد',3=>'أسباب مرضيه',4=>'أخرى');
?>

<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            
            <div class="panel-body">
		    	<div class="panel with-nav-tabs panel-default">
		    		<div class="panel-heading">
		                <ul class="nav nav-tabs">
		                    <li class="active"><a href="#tab0default" data-toggle="tab">طلبات الإشعار الواردة</a></li>
		                    <li><a href="#tab1default" data-toggle="tab">طلبات الإشعار الموافق عليها</a></li>
		                    <li><a href="#tab2default" data-toggle="tab">طلبات الإشعار المرفوضة</a></li>
		                </ul>
		            </div>

		            <div class="panel-body">
		            	<div class="tab-content">
		            		<div class="tab-pane fade in active" id="tab0default">
		            			<?php if(isset($newResignations) && $newResignations != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>التاريخ الإشعار</th>
											<th>إسم الموظف</th>
											<th>الإدارة / القسم</th>
											<th>نوع الإشعار</th>
											<th>التفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($newResignations as $resignation) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=date("Y-m-d",$resignation->request_date)?></td>
											<td><?=$resignation->employee?></td>
											<td><?=$resignation->main.' / '.$resignation->sub?></td>
											<td><?=$type[$resignation->type]?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$resignation->id?>"><i class="fa fa-list"></i> التفاصيل</button>
											</td>
											<td>
											
<a href="<?=base_url().'Administrative_affairs/confirmResignation/1/'.$resignation->id.'/'.$resignation->emp_id_fk?>" class="btn btn-sm btn-success" title="موافقة"><i class="fa fa-check"></i> </a>

<a href="<?=base_url().'Administrative_affairs/confirmResignation/2/'.$resignation->id.'/'.$resignation->emp_id_fk?>" class="btn btn-sm btn-danger" title="رفض"><i class="fa fa-times"></i> </a>

                                        	</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد إشعارات واردة</div>
								<?php } ?>
		            		</div>

		            		<div class="tab-pane fade" id="tab1default">
		            			<?php if(isset($acceptResignations) && $acceptResignations != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>التاريخ الإشعار</th>
											<th>إسم الموظف</th>
											<th>الإدارة / القسم</th>
											<th>نوع الإشعار</th>
											<th>التفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($acceptResignations as $resignation) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=date("Y-m-d",$resignation->request_date)?></td>
											<td><?=$resignation->employee?></td>
											<td><?=$resignation->main.' / '.$resignation->sub?></td>
											<td><?=$type[$resignation->type]?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$resignation->id?>"><i class="fa fa-list"></i> التفاصيل</button>
											</td>
											<td>
												<?php if($resignation->approved_publisher == $_SESSION['user_id']){ ?>
												<a href="<?=base_url().'Administrative_affairs/confirmResignation/2/'.$resignation->id?>" class="btn btn-sm btn-danger" title="رفض"><i class="fa fa-times"></i> </a>
												<?php }else{ ?>
												<button class="btn btn-xs btn-primary"><i class="fa fa-info"></i> لا يمكنك تعديل الإعتماد حيث أنك لست منفذه</button>
												<?php } ?>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد إشعارات موافق عليها</div>
								<?php } ?>
		            		</div>

		            		<div class="tab-pane fade" id="tab2default">
		            			<?php if(isset($refuseResignations) && $refuseResignations != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>التاريخ الإشعار</th>
											<th>إسم الموظف</th>
											<th>الإدارة / القسم</th>
											<th>نوع الإشعار</th>
											<th>التفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($refuseResignations as $resignation) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=date("Y-m-d",$resignation->request_date)?></td>
											<td><?=$resignation->employee?></td>
											<td><?=$resignation->main.' / '.$resignation->sub?></td>
											<td><?=$type[$resignation->type]?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$resignation->id?>"><i class="fa fa-list"></i> التفاصيل</button>
											</td>
											<td>
												<?php if($resignation->approved_publisher == $_SESSION['user_id']){ ?>
												<a href="<?=base_url().'Administrative_affairs/confirmResignation/1/'.$resignation->id?>" class="btn btn-sm btn-success" title="موافقة"><i class="fa fa-check"></i> </a>
												<?php }else{ ?>
												<button class="btn btn-xs btn-primary"><i class="fa fa-info"></i> لا يمكنك تعديل الإعتماد حيث أنك لست منفذه</button>
												<?php } ?>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد إشعارات مرفوضة</div>
								<?php } ?>
		            		</div>
		            	</div>
		            </div>
		    	</div>
    		</div>
    	</div>
    </div>
</div>

<?php 
if(isset($resignations) && $resignations != null) {
	foreach ($resignations as $resignation) { 
?>
<div class="modal" id="myModalemp<?=$resignation->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
        	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal">&times;</button>
            	<h4 class="modal-title">تفاصيل طلب الإشعار</h4>
         	</div>

   			<div class="modal-body">
					<div class="row">
						<div class="col-md-12 space">
       					<div class="col-md-5">
               				<h5><b>تاريخ الطلب :</b></h5>
               			</div>
           				<div class="col-md-7">
           					<h6><?=date("Y-m-d",$resignation->request_date)?></h6>
           				</div>
       				</div>

       				<div class="col-md-12 space">
       					<div class="col-md-5">
               				<h5><b>إسم الموظف :</b></h5>
               			</div>
           				<div class="col-md-7">
           					<h6><?=$resignation->employee?></h6>
           				</div>
       				</div>

       				<div class="col-md-12 space">
       					<div class="col-md-5">
               				<h5><b>الإدارة / القسم:</b></h5>
               			</div>
           				<div class="col-md-7">
           					<h6><?=$resignation->main.' / '.$resignation->sub?></h6>
           				</div>
       				</div>

       				<div class="col-md-12 space">
       					<div class="col-md-5">
               				<h5><b>نوع الإشعار :</b></h5>
               			</div>
           				<div class="col-md-7">
           					<?php 
           					if($resignation->type != 4){
           						$val = $type[$resignation->type];
           					}
           					else {
           						$val = $resignation->other_type;
           					} 
           					?>
           					<h6><?=$val?></h6>
           				</div>
       				</div>

       				<div class="col-md-12 space">
       					<div class="col-md-5">
               				<h5><b>تنفيذ الإشعار إبتداًء من :</b></h5>
               			</div>
           				<div class="col-md-7">
           					<h6><?=date("Y-m-d",$resignation->date_resignation)?></h6>
           				</div>
       				</div>

       				<div class="col-md-12 space">
       					<div class="col-md-5">
               				<h5><b>السبب :</b></h5>
               			</div>
           				<div class="col-md-7">
           					<h6><?=$resignation->reason?></h6>
           				</div>
       				</div>
           		</div>
           	</div>
				<div class="modal-footer">
		      	<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
		    </div>
		</div>
	</div>
</div>
<?php
	}
}
?>