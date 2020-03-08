<?php
$permit_type = array('1'=>'صباحي', '2'=>'مسائي');
$status = array('لم يتم إتخاذ إجراء','تم الموافقة على الإذن','تم رفض الإذن');
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
		                    <li class="active"><a href="#tab0default" data-toggle="tab">الأذونات الواردة</a></li>
		                    <li><a href="#tab1default" data-toggle="tab">الأذونات الموافق عليها</a></li>
		                    <li><a href="#tab2default" data-toggle="tab">الأذونات المرفوضة</a></li>
		                </ul>
		            </div>

		            <div class="panel-body">
		            	<div class="tab-content">
		            		<div class="tab-pane fade in active" id="tab0default">
		            			<?php if(isset($newPermits) && $newPermits != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>إسم الموظف	</th>
											<th>نوع الإذن</th>
											<th>التاريخ</th>
											<th>وقت الخروج</th>
											<th>وقت العودة</th>
											<th>التفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($newPermits as $permit) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=$permit->employee?></td>
											<td><?=$permit_type[$permit->permit_type]?></td>
											<td><?=date("Y-m-d",$permit->permit_date)?></td>
											<td><?=$permit->time_out?></td>
											<td><?=$permit->time_return?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$permit->emp_code?>"><i class="fa fa-list"></i> التفاصيل</button>
											</td>
											<td>
												<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModals<?=$permit->id?>"><i class="fa fa-bell"></i> إعتماد الإذن</button>
											</td>
										</tr>

										<div class="modal fade" id="myModals<?=$permit->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
									            	<div class="modal-header">
									                	<button type="button" class="close" data-dismiss="modal">&times;</button>
									                	<h4 class="modal-title">إجراء الإذن رقم: <?=$permit->id?></h4>
									             	</div>
								       				<form action="permitionsConfirm" method="post">
									           			<div class="modal-body">
									       					<div class="row" style="padding: 20px">
									       						<div class="form-group">
																	<label class="control-label">أذكر السبب</label>
																	<textarea class="form-control" style="height: 100px" name="accept_refuse_reason" required></textarea>
																</div>
									       					</div>
										               	</div>

										               	<input type="hidden" name="id" id="id" value="<?=$permit->id?>">

									 					<div class="modal-footer">
													      	<button type="submit" name="accept" value="1" class="btn btn-success">موافقة</button>

													      	<button type="submit" name="refuse" value="2" class="btn btn-danger">مرفوض</button>
													    </div>
													</form>
												</div>
											</div>
										</div>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد أذونات واردة</div>
								<?php } ?>
		            		</div>

		            		<div class="tab-pane fade" id="tab1default">
		            			<?php if(isset($acceptPermits) && $acceptPermits != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>إسم الموظف	</th>
											<th>نوع الإذن</th>
											<th>التاريخ</th>
											<th>وقت الخروج</th>
											<th>وقت العودة</th>
											<th>التفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($acceptPermits as $permit) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=$permit->employee?></td>
											<td><?=$permit_type[$permit->permit_type]?></td>
											<td><?=date("Y-m-d",$permit->permit_date)?></td>
											<td><?=$permit->time_out?></td>
											<td><?=$permit->time_return?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$permit->emp_code?>"><i class="fa fa-list"></i> التفاصيل</button>
											</td>
											<td>
												<?php if($permit->accept_refuse_publisher == $_SESSION['user_id']){ ?>
												<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModalr<?=$permit->id?>"><i class="fa fa-bell"></i> إعتماد بالرفض</button>
												<?php }else{ ?>
												<button class="btn btn-xs btn-primary"><i class="fa fa-info"></i> لا يمكنك تعديل الإعتماد حيث أنك لست منفذه</button>
												<?php } ?>
											</td>
										</tr>

										<div class="modal fade" id="myModalr<?=$permit->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
									            	<div class="modal-header">
									                	<button type="button" class="close" data-dismiss="modal">&times;</button>
									                	<h4 class="modal-title">إجراء الإذن رقم: <?=$permit->id?></h4>
									             	</div>
								       				<form action="permitionsConfirm" method="post">
									           			<div class="modal-body">
									       					<div class="row" style="padding: 20px">
									       						<div class="form-group">
																	<label class="control-label">أذكر السبب</label>
																	<textarea class="form-control" style="height: 100px" name="accept_refuse_reason" required><?=$permit->accept_refuse_reason?></textarea>
																</div>
									       					</div>
										               	</div>

										               	<input type="hidden" name="id" id="id" value="<?=$permit->id?>">

									 					<div class="modal-footer">
													      	<button type="submit" name="refuse" value="2" class="btn btn-danger">مرفوض</button>
													    </div>
													</form>
												</div>
											</div>
										</div>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد أذونات موافق عليها</div>
								<?php } ?>
		            		</div>

		            		<div class="tab-pane fade" id="tab2default">
		            			<?php if(isset($refusePermits) && $refusePermits != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>إسم الموظف	</th>
											<th>نوع الإذن</th>
											<th>التاريخ</th>
											<th>وقت الخروج</th>
											<th>وقت العودة</th>
											<th>التفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($refusePermits as $permit) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=$permit->employee?></td>
											<td><?=$permit_type[$permit->permit_type]?></td>
											<td><?=date("Y-m-d",$permit->permit_date)?></td>
											<td><?=$permit->time_out?></td>
											<td><?=$permit->time_return?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$permit->emp_code?>"><i class="fa fa-list"></i> التفاصيل</button>
											</td>
											<td>
												<?php if($permit->accept_refuse_publisher == $_SESSION['user_id']){ ?>
												<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModala<?=$permit->id?>"><i class="fa fa-bell"></i> إعتماد بالموافقة</button>
												<?php }else{ ?>
												<button class="btn btn-xs btn-primary"><i class="fa fa-info"></i> لا يمكنك تعديل الإعتماد حيث أنك لست منفذه</button>
												<?php } ?>
											</td>
										</tr>

										<div class="modal fade" id="myModala<?=$permit->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
									            	<div class="modal-header">
									                	<button type="button" class="close" data-dismiss="modal">&times;</button>
									                	<h4 class="modal-title">إجراء الإذن رقم: <?=$permit->id?></h4>
									             	</div>
								       				<form action="permitionsConfirm" method="post">
									           			<div class="modal-body">
									       					<div class="row" style="padding: 20px">
									       						<div class="form-group">
																	<label class="control-label">أذكر السبب</label>
																	<textarea class="form-control" style="height: 100px" name="accept_refuse_reason" required><?=$permit->accept_refuse_reason?></textarea>
																</div>
									       					</div>
										               	</div>

										               	<input type="hidden" name="id" id="id" value="<?=$permit->id?>">

									 					<div class="modal-footer">
													      	<button type="submit" name="accept" value="1" class="btn btn-success">موافقة</button>
													    </div>
													</form>
												</div>
											</div>
										</div>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد أذونات مرفوضة</div>
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
if(isset($accepted) && $accepted != null) {
	foreach ($accepted as $permit) { 
?>
<div class="modal fade" id="myModalemp<?=$permit->emp_code?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="width: 90%">
		<div class="modal-content">
        	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal">&times;</button>
            	<h4 class="modal-title">أذونات الموظف: <?=$permit->employee?></h4>
         	</div>
   			<div class="modal-body">
				<div class="row">
					<div class="col-md-8">
						<?php 
						if($permit->permits != null){ ?>
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>التاريخ</th>
									<th>نوع الإذن</th>
									<th>وقت الخروج</th>
									<th>وقت العودة</th>
									<th>الحالة</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$z = 1;
							foreach ($permit->permits as $value) { 
							?>
								<tr>
									<td><?=($z++)?></td>
									<td><?=date("Y-m-d",$value->permit_date)?></td>
									<td><?=$permit_type[$value->permit_type]?></td>
									<td><?=$value->time_out?></td>
									<td><?=$value->time_return?></td>
									<td><?=$status[$value->status]?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
						<?php }else{ ?>
						<div class="alert alert-danger">لا توجد أذونات سابقة لهذا الموظف</div>
						<?php }?>
					</div>

					<div class="col-md-4">
						<div class="col-md-12 ">

		        		</div>

		        		<div class="col-md-12 ">
           					<div class="col-md-4">
	               				<h6><b>الإسم :</b></h6>
	               			</div>
               				<div class="col-md-8">
               					<h6><?=$permit->employee?></h6>
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
               					<h6><?=$value->sub?></h6>
               				</div>
           				</div>

           				<div class="col-md-12 ">
           					<div class="col-md-4">
	               				<h6><b>التليفون :</b></h6>
	               			</div>
               				<div class="col-md-8">
               					<h6><?=$permit->phone_num?></h6>
               				</div>
           				</div>

           				<div class="col-md-12 ">
           					<div class="col-md-4">
	               				<h6><b>العنوان :</b></h6>
	               			</div>
               				<div class="col-md-8">
               					<h6><?=$permit->address?></h6>
               				</div>
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