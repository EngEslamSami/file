<style>
.inner-heading {
    background-color: #9ed6f3;
    padding: 10px;
}
.pop-text{
    background-color: #009688;
    color: #fff;
    padding: 7px;
    font-size: 14px;
    margin-bottom: 3px;
    margin-top: 3px;
}
.pop-text1{
    background-color:#eee;
     padding: 7px;
      font-size: 14px;
      margin-bottom: 3px;
       margin-top: 3px;
}
.pop-title-text{
    margin-top: 4px;
    margin-bottom: 4px;
    padding: 6px;
    background-color: #9ed6f3;
}
</style>

<?php 
$scoial_status = array('متزوج','أعزب','أرمل'); 
$type = $this->uri->segment(4);
?>
<div class="col-sm-12 col-md-12 col-xs-12">
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
							<li class="active"><a href="#tab0default" data-toggle="tab">طلبات الصرف الواردة</a></li>
							<li><a href="#tab1default" data-toggle="tab">طلبات الصرف الموافق عليها</a></li>
							<li><a href="#tab2default" data-toggle="tab">طلبات الصرف المرفوضة</a></li>
							<li><a href="#tab3default" data-toggle="tab">طباعة  الطلبات</a></li>
						</ul>
					</div>

					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab0default">
								<?php if(isset($newOrders) && $newOrders != null){ ?>
								<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>م</th>
											<th>رقم الطلب</th>
											<th>إسم المستفيد</th>
											<th>إسم الجهاز</th>
											<th>الكمية</th>
											<?php if($type == 2) { ?>
											<th>إسم المؤسسة</th>
											<? } ?>
											<th>تفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$x = 1;
									foreach ($newOrders as $value) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=$value->order_num?></td>
											<td><?=$value->p_name?></td>
											<td><?=$value->device?></td>
											<td><?=$value->amount_device?></td>
											<?php if($type == 2) { ?>
											<td><?=$value->company?></td>
											<? } ?>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$value->order_id?>"><span class="fa fa-list"></span> التفاصيل</button>
											</td>
											<td>
												<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModals<?=$value->order_id?>"><i class="fa fa-bell"></i> إعتماد الطلب</button>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد طلبات صرف واردة</div>
								<?php } ?>
							</div>

							<div class="tab-pane fade" id="tab1default">
								<?php if(isset($acceptedOrders) && $acceptedOrders != null){ ?>
								<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>م</th>
											<th>رقم الطلب</th>
											<th>إسم المستفيد</th>
											<th>إسم الجهاز</th>
											<th>الكمية</th>
											<?php if($type == 2) { ?>
											<th>إسم المؤسسة</th>
											<? } ?>
											<th>تفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$x = 1;
									foreach ($acceptedOrders as $value) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=$value->order_num?></td>
											<td><?=$value->p_name?></td>
											<td><?=$value->device?></td>
											<td><?=$value->amount_device?></td>
											<?php if($type == 2) { ?>
											<td><?=$value->company?></td>
											<? } ?>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$value->order_id?>"><span class="fa fa-list"></span> التفاصيل</button>
											</td>
											<td>
												<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModals<?=$value->order_id?>"><i class="fa fa-bell"></i> تعديل إعتماد</button>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد طلبات صرف موافق عليها</div>
								<?php } ?>
							</div>

							<div class="tab-pane fade" id="tab2default">
								<?php if(isset($refusedOrders) && $refusedOrders != null){ ?>
								<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>م</th>
											<th>رقم الطلب</th>
											<th>إسم المستفيد</th>
											<th>إسم الجهاز</th>
											<th>الكمية</th>
											<?php if($type == 2) { ?>
											<th>إسم المؤسسة</th>
											<? } ?>
											<th>تفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$x = 1;
									foreach ($refusedOrders as $value) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=$value->order_num?></td>
											<td><?=$value->p_name?></td>
											<td><?=$value->device?></td>
											<td><?=$value->amount_device?></td>
											<?php if($type == 2) { ?>
											<td><?=$value->company?></td>
											<? } ?>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$value->order_id?>"><span class="fa fa-list"></span> التفاصيل</button>
											</td>
											<td>
												<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModals<?=$value->order_id?>"><i class="fa fa-bell"></i> تعديل إعتماد</button>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد طلبات صرف مرفوضة</div>
								<?php } ?>
							</div>

							<div class="tab-pane fade" id="tab3default">
								<?php if(isset($print) && $print != null){ ?>
								<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>م</th>
											<th>رقم الطلب</th>
											<th>إسم المستفيد</th>
											<?php if($type == 2) { ?>
											<th>إسم المؤسسة</th>
											<? } ?>
											<th>تفاصيل</th>
											<th>الإجراء</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$x = 1;
									foreach ($print as $value) { 
										?>
										<tr>
											<td><?=($x++)?></td>
											<td><?=$value->order_num?></td>
											<td><?=$value->p_name?></td>
											<?php if($type == 2) { ?>
											<td><?=$value->company?></td>
											<? } ?>
											<td>
												<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModalemp<?=$value->order_id?>"><span class="fa fa-list"></span> التفاصيل</button>
											</td>
											<td>
												<a href="<?=base_url().'disability_managers/Disabilty_confirm/print_order/'.$this->uri->segment(4).'/'.$value->order_num?>"><i class="fa fa-print"></i></a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								<?php }else{ ?>
								<div class="alert alert-danger">لا توجد طلبات للتعميد</div>
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
if(isset($allOrders) && $allOrders != null) {
foreach ($allOrders as $value) { 
?>
<div class="modal" id="myModalemp<?=$value->order_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
<div class="modal-dialog" role="document" style="width: 90%">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">تفاصيل المستفيد(<?=$value->p_name?>)</h4>
		</div>

		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-12">
						<h5 class="text-center pop-title-text">بيانات الشخصية</h5>
					</div>
					<div class="col-md-6">
						<div class="col-md-6" style="padding: 0;">			
							<h6 class="text-left pop-text"><b>رقم المستفيد:</b></h6>
						</div>
						<div class="col-md-6" style="padding: 0;">	
							<h6 class="text-left pop-text1"><?=$value->p_num?></h6>
						</div>
					</div>

					<div class="col-md-6">
						<div class="col-md-6" style="padding: 0;">			
							<h6 class="text-left pop-text"><b>تاريخ الميلاد:</b></h6>
						</div>
						<div class="col-md-6" style="padding: 0;">	
							<h6 class="text-left pop-text1"><?=$value->p_date_birth?></h6>
						</div>
					</div>

					<div class="col-md-6">
						<div class="col-md-6" style="padding: 0;">			
							<h6 class="text-left pop-text"><b>العنوان :</b></h6>
						</div>
						<div class="col-md-6" style="padding: 0;">	
							<h6 class="text-left pop-text1"><?=$value->p_address?></h6>
						</div>
					</div>
					<div class="col-md-6">
						<div class="col-md-6" style="padding: 0;">			
							<h6 class="text-left pop-text"><b>الهاتف :</b></h6>
						</div>
						<div class="col-md-6" style="padding: 0;">	
							<h6 class="text-left pop-text1"><?=$value->p_mob?></h6>
						</div>
					</div>
					<div class="col-md-6">
						<div class="col-md-6" style="padding: 0;">			
							<h6 class="text-left pop-text"><b>السجل المدني :</b></h6>
						</div>
						<div class="col-md-6" style="padding: 0;">	
							<h6 class="text-left pop-text1"><?=$value->p_national_num?></h6>
						</div>
					</div>
					<div class="col-md-6">
						<div class="col-md-6" style="padding: 0;">			
							<h6 class="text-left pop-text"><b>الجنسية  :</b></h6>
						</div>
						<div class="col-md-6" style="padding: 0;">	
							<h6 class="text-left pop-text1"><?=$value->nationality?></h6>
						</div>
					</div>

					<div class="col-md-6">
						<div class="col-md-6" style="padding: 0;">			
							<h6 class="text-left pop-text"><b>الحالة الإجتماعية :</b></h6>
						</div>
						<div class="col-md-6" style="padding: 0;">	
							<h6 class="text-left pop-text1"><?php 
							for($x=0 ; $x < sizeof($scoial_status) ;$x++){
								if($value->p_scoial_status_id_fk== $x){ ?>
								<?=$scoial_status[$x]?>
								<?php }
							}
							?></h6>
						</div>
					</div>
					<div class="col-md-12">
						<h5 class="text-center pop-title-text">بيانات الاعاقة</h5>
					</div>

					<div class="col-md-6">
						<div class="col-md-6" style="padding: 0;">			
							<h6 class="text-left pop-text"><b>نوع الإعاقة :</b></h6>
						</div>
						<div class="col-md-6" style="padding: 0;">	
							<h6 class="text-left pop-text1"><?=$value->type?></h6>
							</div>
						</div>
						<?php if($value->disability_type_id_fk == 1){ ?>

						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>إثبات حالة :</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?=$value->proof_status?></h6>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>إحالة للمستشفي:</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?=$value->referral_to_hospital?></h6>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>إحالة للمركز:</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?=$value->referral_to_center?></h6>
							</div>
						</div>

						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>تقرير طبي:</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?=$value->medical_report?><a style="position: absolute; left: 15px;" href="<?php echo base_url('disability_managers/Disability_manage/download/'.$value->medical_report) ?>"><i class="fa fa-download" aria-hidden="true"></i></a></h6>
							</div>
						</div>


						<?php }else{  ?>
						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>درجة الإعاقة :</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?=$value->disability_degree?></h6>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>هل تستخدم أجهزة مساعدة:</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?
								if($value->use_devices == 1){
									echo 'نعم ';
								}else{
									echo 'لا ';  
								}
								?></h6>
							</div>
						</div>
						<?php 
						if($value->use_devices == 1){ ?>
						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>إذا كان الجواب بنعم أذكرها:</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?=$value->use_devices_details?></h6>
							</div>
						</div>

						<?php  }else{ ?>

						<?php  } ?>

						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>هل أنت مسجل لدي جمعية اخري:</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?
								if($value->be_in_another_society == 1){
									echo 'نعم ';
								}else{
									echo 'لا ';  
								}
								?></h6>
							</div>
						</div>
						<?php 
						if($value->be_in_another_society == 1){ ?>
						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>:إذا كان الجواب بنعم أذكرها</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?=$value->society_name?></h6>
							</div>
						</div>
						<?php  }else{ ?>
						<?php  } ?>
						<?php  }
						?>
						<div class="col-md-12">
							<h5 class="text-center pop-title-text">بيانات الاتصال</h5>
						</div>
						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>جوال:</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?=$value->contact_mob?></h6>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>هاتف:</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?=$value->contact_phone?></h6>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>جوال ولي الامر:</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?=$value->contact_father_mob?></h6>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>إسم ولي الأمر:</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?=$value->contact_father_name?></h6>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-6" style="padding: 0;">			
								<h6 class="text-left pop-text"><b>بريد الكتروني:</b></h6>
							</div>
							<div class="col-md-6" style="padding: 0;">	
								<h6 class="text-left pop-text1"><?=$value->contact_email?></h6>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

		<div class="modal fade" id="myModals<?=$value->order_id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">إجراء طلب صرف برقم (<?=$value->order_num?>) للمستفيد: <?=$value->p_name?></h4>
					</div>
					<form action="<?=base_url().'disability_managers/Disabilty_confirm/confirm/'.$type?>" method="post">
						<div class="modal-body">
							<div class="row" style="padding: 20px">
								<div class="form-group">
									<label class="control-label">أذكر السبب</label>
									<textarea class="form-control" style="height: 100px" name="confirm_reason" data-validation="required"><?=$value->confirm_reason?></textarea>
								</div>
							</div>
						</div>

						<input type="hidden" name="id" id="id" value="<?=$value->order_id?>">

						<div class="modal-footer">
							<button type="submit" name="accept" value="1" class="btn btn-success">موافقة</button>

							<button type="submit" name="refuse" value="2" class="btn btn-danger">مرفوض</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
	}
}
?>