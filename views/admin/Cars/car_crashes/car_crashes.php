<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php 
$type = array(1=>'عادي',2=>'حادثة');
$status = array(1=>'لم يتم التصليح',2=>'جاري التصليح',3=>'تم التصليح');
$id = $this->uri->segment(4);
if($id == '') {
	echo form_open_multipart('Cars/Crashes');
}
else {
	echo form_open_multipart('Cars/Crashes/edit/'.$id.'');
}
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
            	<div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                    	<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                    		<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> تاريخ العطل </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-group">
	                            			<input type="text" id="date" name="date" placeholder="تاريخ العطل" value="<?php if(isset($crash)) {echo date("Y-m-d",$crash['date']);} ?>" class="form-control docs-date" data-validation="required" >
	                            		</div>
	                            	</div>
								</div>
							</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> رقم السيارة</h4>
			      				</div>
			      				<div class="col-xs-6 r-input">
							    	<select class="form-control selectpicker" data-live-search="true" onchange="$('#type_name').val($(this).find('option:selected').attr('carname'))" name="car_id_fk" id="car_id_fk" data-validation="required" aria-required="true">
										<option value="">إختر</option>
										<?php
										if(isset($cars) && $cars != null){
											foreach ($cars as $car) {
												$select = '';
												if((isset($crash) && $crash['car_id_fk'] == $car->id)) {
													$select = 'selected';
												}
										?>
										<option carname="<?=$car->name?>" value="<?=$car->id?>" <?=$select?> ><?=$car->car_code?></option>
										<?php 
											} 
										}
										?>
									</select>
								</div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> نوع السيارة</h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
							      	<input type="text" name="type_name" placeholder="نوع السيارة" id="type_name" value="<?php if(isset($crash)) echo $crash['type_name'] ?>" class="form-control" data-validation="required" readonly>
							    </div>
							</div>
						</div>

						<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
							<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> مسئول الإصلاح</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<select class="form-control selectpicker" data-live-search="true" name="driver_id_fk" id="driver_id_fk" data-validation="required" aria-required="true">
										<option value="">إختر</option>
										<?php
										if(isset($drivers) && $drivers != null){
											foreach ($drivers as $driver) {
												$select = '';
												if((isset($crash) && $crash['driver_id_fk'] == $driver->id)) {
													$select = 'selected';
												}
										?>
										<option value="<?=$driver->id?>" <?=$select?> ><?=$driver->driver_name?></option>
										<?php 
											} 
										}
										?>
									</select>
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> إسم العطل</h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
							      	<input type="text" name="crash_name" placeholder="إسم العطل" id="crash_name" value="<?php if(isset($crash)) echo $crash['crash_name'] ?>" class="form-control" data-validation="required">
							    </div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> نوع العطل</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<select class="form-control" name="crash_type" id="crash_type" data-validation="required" aria-required="true">
										<option value="">إختر</option>
										<?php
										foreach ($type as $key => $value) {
											$select = '';
											if((isset($crash) && $crash['crash_type'] == $key)) {
												$select = 'selected';
											}
										?>
										<option value="<?=$key?>" <?=$select?> ><?=$value?></option>
										<?php } ?>
									</select>
							    </div>
			    			</div>
			    		</div>

			    		<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> حالة العطل</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<select class="form-control" name="crash_status" id="crash_status" data-validation="required" aria-required="true">
										<option value="">إختر</option>
										<?php
										foreach ($status as $key => $value) {
											$select = '';
											if((isset($crash) && $crash['crash_status'] == $key)) {
												$select = 'selected';
											}
										?>
										<option value="<?=$key?>" <?=$select?> ><?=$value?></option>
										<?php } ?>
									</select>
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> ملاحظات</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							    	<textarea name="notes" class="r-textarea" placeholder="ملاحظات" data-validation="required"><?php if(isset($crash)) echo $crash['notes'] ?></textarea>
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
<?php if(isset($crashs) && $crashs != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>تاريخ العطل</th>
							<th>رقم السيارة</th>
							<th>مسئول الإصلاح</th>
							<th>إسم العطل</th>
							<th>حالة العطل</th>
							<th>التفاصيل</th>
							<th>الإجراء</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($crashs as $crash) { 
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=date("Y-m-d",$crash->date)?></td>
							<td><?=$crash->car_code?></td>
							<td><?=$crash->driver_name?></td>
							<td><?=$crash->crash_name?></td>
							<td><?=$status[$crash->crash_status]?></td>
							<td>
								<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$crash->id?>"><i class="fa fa-list btn-info"></i> التفاصيل</button>
							</td>
							<td>
								<a href="<?php echo base_url('Cars/Crashes/edit').'/'.$crash->id ?>"><i class="fa fa-pencil"></i> </a>

				                <a onclick="$('#adele').attr('href', '<?=base_url()."Cars/Crashes/delete/".$crash->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
							</td>
						</tr>

						<div class="modal" id="myModal<?=$crash->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
					            	<div class="modal-header">
					                	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                	<h4 class="modal-title">تفاصيل عطل سيارة برقم لوحة (<?=$crash->car_code?>)</h4>
					             	</div>
				       
				           			<div class="modal-body">
				       					<div class="row">
				       						<div class="col-md-12 space">
				               					<div class="col-md-3">
						               				<h5><b>تاريخ العطل :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=date("Y-m-d",$crash->date)?></h6>
					               				</div>

				               					<div class="col-md-3">
						               				<h5><b>إسم العطل :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=$crash->crash_name?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-3">
						               				<h5><b>نوع العطل:</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=$type[$crash->crash_type]?></h6>
					               				</div>

				               					<div class="col-md-3">
						               				<h5><b>حالة العطل :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=$status[$crash->crash_status]?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-3">
						               				<h5><b>ملاحظات :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=$crash->notes?></h6>
					               				</div>

				               					<div class="col-md-3">
						               				<h5><b>مسئول الإصلاح :</b></h5>
						               			</div>
					               				<div class="col-md-3">
					               					<h6><?=$crash->driver_name?></h6>
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