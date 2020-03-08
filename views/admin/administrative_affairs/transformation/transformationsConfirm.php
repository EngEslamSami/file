<?php
$status = array('لم يتم إتخاذ إجراء','تم الموافقة على طلب النقل','تم رفض طلب النقل');
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
		                    <li class="active"><a href="#tab0default" data-toggle="tab">طلبات النقل الواردة</a></li>
		                    <li><a href="#tab1default" data-toggle="tab">طلبات النقل الموافق عليها</a></li>
		                    <li><a href="#tab2default" data-toggle="tab">طلبات النقل المرفوضة</a></li>
		                </ul>
		            </div>

		            <div class="panel-body">
		            	<div class="tab-content">
		            		<div class="tab-pane fade in active" id="tab0default">
		            			<?php if(isset($newTransforms) && $newTransforms != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>التاريخ</th>
											<th>إسم الموظف</th>
											<th>الإدارة / القسم المحول منه</th>
											<th>الإدارة / القسم المحول إليه</th>
											<th>التفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($newTransforms as $transform) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=date("Y-m-d",$transform->date_transfer)?></td>
											<td><?=$transform->employee?></td>
											<td><?=$transform->current_main.' / '.$transform->current_sub?></td>
											<td><?=$transform->to_main.' / '.$transform->to_sub?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$transform->emp_id_fk?>"><i class="fa fa-list"></i> التفاصيل</button>
											</td>
											<td>
												<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModals<?=$transform->id?>"><i class="fa fa-bell"></i> إعتماد الطلب</button>
											</td>
										</tr>

										<div class="modal fade" id="myModals<?=$transform->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
									            	<div class="modal-header">
									                	<button type="button" class="close" data-dismiss="modal">&times;</button>
									                	<h4 class="modal-title">إجراء النقل للموظف: <?=$transform->employee?></h4>
									             	</div>
								       				<form action="transformConfirm" method="post">
									           			<div class="modal-body">
									       					<div class="row" style="padding: 20px">
									       						<div class="form-group">
																	<label class="control-label">أذكر السبب</label>
																	<textarea class="form-control" style="height: 100px" name="accept_refuse_reason" required></textarea>
																</div>
									       					</div>
										               	</div>

										               	<input type="hidden" name="id" id="id" value="<?=$transform->id?>">

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
								<div class="alert alert-danger">لا توجد طلبات نقل واردة</div>
								<?php } ?>
		            		</div>

		            		<div class="tab-pane fade" id="tab1default">
		            			<?php if(isset($acceptTransforms) && $acceptTransforms != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>التاريخ</th>
											<th>إسم الموظف</th>
											<th>الإدارة / القسم المحول منه</th>
											<th>الإدارة / القسم المحول إليه</th>
											<th>التفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($acceptTransforms as $transform) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=date("Y-m-d",$transform->date_transfer)?></td>
											<td><?=$transform->employee?></td>
											<td><?=$transform->current_main.' / '.$transform->current_sub?></td>
											<td><?=$transform->to_main.' / '.$transform->to_sub?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$transform->emp_id_fk?>"><i class="fa fa-list"></i> التفاصيل</button>
											</td>
											<td>
												<?php if($transform->approved_publisher == $_SESSION['user_id']){ ?>
												<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModalr<?=$transform->id?>"><i class="fa fa-bell"></i> إعتماد بالرفض</button>
												<?php }else{ ?>
												<button class="btn btn-xs btn-primary"><i class="fa fa-info"></i> لا يمكنك تعديل الإعتماد حيث أنك لست منفذه</button>
												<?php } ?>
											</td>
										</tr>

										<div class="modal fade" id="myModalr<?=$transform->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
									            	<div class="modal-header">
									                	<button type="button" class="close" data-dismiss="modal">&times;</button>
									                	<h4 class="modal-title">إجراء النقل للموظف: <?=$transform->employee?></h4>
									             	</div>
								       				<form action="transformConfirm" method="post">
									           			<div class="modal-body">
									       					<div class="row" style="padding: 20px">
									       						<div class="form-group">
																	<label class="control-label">أذكر السبب</label>
																	<textarea class="form-control" style="height: 100px" name="accept_refuse_reason" required><?=$transform->accept_refuse_reason?></textarea>
																</div>
									       					</div>
										               	</div>

										               	<input type="hidden" name="id" id="id" value="<?=$transform->id?>">

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
								<div class="alert alert-danger">لا توجد طلبات نقل موافق عليها</div>
								<?php } ?>
		            		</div>

		            		<div class="tab-pane fade" id="tab2default">
		            			<?php if(isset($refuseTransforms) && $refuseTransforms != null){ ?>
		            			<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>التاريخ</th>
											<th>إسم الموظف</th>
											<th>الإدارة / القسم المحول منه</th>
											<th>الإدارة / القسم المحول إليه</th>
											<th>التفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$x = 1;
										foreach ($refuseTransforms as $transform) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=date("Y-m-d",$transform->date_transfer)?></td>
											<td><?=$transform->employee?></td>
											<td><?=$transform->current_main.' / '.$transform->current_sub?></td>
											<td><?=$transform->to_main.' / '.$transform->to_sub?></td>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$transform->emp_id_fk?>"><i class="fa fa-list"></i> التفاصيل</button>
											</td>
											<td>
												<?php if($transform->approved_publisher == $_SESSION['user_id']){ ?>
												<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModala<?=$transform->id?>"><i class="fa fa-bell"></i> إعتماد بالموافقة</button>
												<?php }else{ ?>
												<button class="btn btn-xs btn-primary"><i class="fa fa-info"></i> لا يمكنك تعديل الإعتماد حيث أنك لست منفذه</button>
												<?php } ?>
											</td>
										</tr>

										<div class="modal fade" id="myModala<?=$transform->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
									            	<div class="modal-header">
									                	<button type="button" class="close" data-dismiss="modal">&times;</button>
									                	<h4 class="modal-title">إجراء النقل للموظف: <?=$transform->employee?></h4>
									             	</div>
								       				<form action="transformConfirm" method="post">
									           			<div class="modal-body">
									       					<div class="row" style="padding: 20px">
									       						<div class="form-group">
																	<label class="control-label">أذكر السبب</label>
																	<textarea class="form-control" style="height: 100px" name="accept_refuse_reason" required><?=$transform->accept_refuse_reason?></textarea>
																</div>
									       					</div>
										               	</div>

										               	<input type="hidden" name="id" id="id" value="<?=$transform->id?>">

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
								<div class="alert alert-danger">لا توجد طلبات نقل مرفوضة</div>
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
	foreach ($accepted as $transform) { 
?>
<div class="modal fade" id="myModalemp<?=$transform->emp_code?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document" style="width: 90%">
		<div class="modal-content">
        	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal">&times;</button>
            	<h4 class="modal-title">إنتقالات الموظف: <?=$transform->employee?></h4>
         	</div>
   			<div class="modal-body">
				<div class="row">
					<div class="col-md-8">
						<?php 
						if($transform->transforms != null){ ?>
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
							foreach ($transform->transforms as $value) { 
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
						<?php }else{ ?>
						<div class="alert alert-danger">لا توجد طلبات نقل سابقة لهذا الموظف</div>
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