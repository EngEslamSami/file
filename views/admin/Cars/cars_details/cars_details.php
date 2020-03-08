<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php 
$id = $this->uri->segment(4);
if($id == '') {
	echo form_open_multipart('Cars/Cars_details');
}
else {
	echo form_open_multipart('Cars/Cars_details/edit/'.$id.'');
}
?>

<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            
            <div class="panel-body">
            	<div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                    	<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                    		<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> رقم اللوحة</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="text" name="car_code" placeholder="رقم اللوحة" id="car_code" value="<?php if(isset($detail)) echo $detail['car_code'] ?>"" class="form-control" data-validation="required" >
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> نوع السيارة</h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<select class="form-control selectpicker" data-live-search="true" name="car_type_id_fk" id="car_type_id_fk" data-validation="required" aria-required="true">
										<option value="">إختر</option>
										<?php
										if(isset($cars_types) && $cars_types != null){
											foreach ($cars_types as $car_type) {
												$select = '';
												if((isset($detail) && $detail['car_type_id_fk'] == $car_type->id)) {
													$select = 'selected';
												}
										?>
										<option value="<?=$car_type->id?>" <?=$select?> ><?=$car_type->name?></option>
										<?php 
											} 
										}
										?>
									</select>
								</div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> رقم المحرك</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="engine_code" placeholder="رقم المحرك" id="engine_code" value="<?php if(isset($detail)) echo $detail['engine_code'] ?>"" class="form-control" data-validation="required" >
							    </div>
			    			</div>
			    		</div>

			    		<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> شركة التأمين</h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<select class="form-control selectpicker" data-live-search="true" name="company_id_fk" id="company_id_fk" data-validation="required" aria-required="true">
										<option value="">إختر</option>
										<?php
										if(isset($companies) && $companies != null){
											foreach ($companies as $company) {
												$select = '';
												if((isset($detail) && $detail['company_id_fk'] == $company->id)) {
													$select = 'selected';
												}
										?>
										<option value="<?=$company->id?>" <?=$select?> ><?=$company->name?></option>
										<?php 
											} 
										}
										?>
									</select>
								</div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> مبلغ التأمين</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="insurance_cost" placeholder="" id="insurance_cost" value="<?php if(isset($detail)) echo $detail['insurance_cost'] ?>"" class="form-control" data-validation="required" >
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> تاريخ التأمين </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-group">
	                            			<input type="text" id="insurance_date" name="insurance_date" placeholder="تاريخ التأمين" value="<?php if(isset($detail)) {echo date("Y-m-d",$detail['insurance_date']);} ?>" class="form-control docs-date" data-validation="required" >
	                            		</div>
	                            	</div>
								</div>
							</div>
			    		</div>

			    		<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> نهاية الرخصة </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-group">
	                            			<input type="text" id="license_end_date" name="license_end_date" placeholder="نهاية الرخصة" value="<?php if(isset($detail)) {echo date("Y-m-d",$detail['license_end_date']);} ?>" class="form-control docs-date" data-validation="required" >
	                            		</div>
	                            	</div>
								</div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> بداية التأمين </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-group">
	                            			<input type="text" id="insurance_start_date" name="insurance_start_date" placeholder="بداية التأمين" value="<?php if(isset($detail)) {echo date("Y-m-d",$detail['insurance_start_date']);} ?>" class="form-control docs-date" data-validation="required" >
	                            		</div>
	                            	</div>
								</div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> نهاية التأمين </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-group">
	                            			<input type="text" id="insurance_end_date" name="insurance_end_date" placeholder="نهاية التأمين" value="<?php if(isset($detail)) {echo date("Y-m-d",$detail['insurance_end_date']);} ?>" class="form-control docs-date" data-validation="required" >
	                            		</div>
	                            	</div>
								</div>
							</div>
			    		</div>

						<div class="form-group col-sm-12 col-xs-12">
				            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
echo form_close();
if ($id == '') { 
?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>جدول البيانات</h4>
                </div>
            </div>
            
            <div class="panel-body">
<?php if(isset($details) && $details != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>رقم اللوحة</th>
							<th>نوع السيارة</th>
							<th>رقم المحرك</th>
							<th>التفاصيل</th>
							<th>الإجراء</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($details as $detail) { 
							$diff = $detail->insurance_end_date - $detail->insurance_start_date;
                            $diff = floor($diff / (60 * 60 * 24))+1;
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=$detail->car_code?></td>
							<td><?=$detail->type?></td>
							<td><?=$detail->engine_code?></td>
							<td>
								<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$detail->id?>"><i class="fa fa-list btn-info"></i> التفاصيل</button>
							</td>
							<td>
								<a href="<?php echo base_url('Cars/Cars_details/edit').'/'.$detail->id ?>"><i class="fa fa-pencil"></i> </a>

				                <a onclick="$('#adele').attr('href', '<?=base_url()."Cars/Cars_details/delete/".$detail->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
							</td>
						</tr>

						<div class="modal" id="myModal<?=$detail->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
					            	<div class="modal-header">
					                	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                	<h4 class="modal-title">تفاصيل سيارة برقم لوحة (<?=$detail->car_code?>)</h4>
					             	</div>
				       
				           			<div class="modal-body">
				       					<div class="row">
				       						<div class="col-md-12 space">
				               					<div class="col-md-3">
						               				<h5><b>نوع السيارة :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=$detail->type?></h6>
					               				</div>

				               					<div class="col-md-3">
						               				<h5><b>رقم المحرك :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=$detail->engine_code?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-3">
						               				<h5><b>شركة التأمين :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=$detail->company_name?></h6>
					               				</div>

				               					<div class="col-md-3">
						               				<h5><b>مبلغ التأمين :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=$detail->insurance_cost?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-3">
						               				<h5><b>تاريخ التأمين :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=date("Y-m-d",$detail->insurance_date)?></h6>
					               				</div>

				               					<div class="col-md-3">
						               				<h5><b>نهاية الرخصة :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=date("Y-m-d",$detail->license_end_date)?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-3">
						               				<h5><b>بداية التأمين :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=date("Y-m-d",$detail->insurance_start_date)?></h6>
					               				</div>

				               					<div class="col-md-3">
						               				<h5><b>نهاية التأمين :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=date("Y-m-d",$detail->insurance_end_date)?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-3">
						               				<h5><b>عدد أيام التأمين :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=$diff?></h6>
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
						<?php } ?>
					</tbody>
				</table>

				<div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
			        <div class="modal-dialog" role="document">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                    <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
			                </div>
			                <div class="modal-body">
			                    <p id="text">هل أنت متأكد من الحذف؟</p>
			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
			                    <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove">نعم</button></a>
			                </div>
			            </div>
			        </div>
			    </div>
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
<?php } ?>