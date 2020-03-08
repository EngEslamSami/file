<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php 
$id = $this->uri->segment(4);
if($id == '') {
	echo form_open_multipart('Cars/Orders_car');
}
else {
	echo form_open_multipart('Cars/Orders_car/edit/'.$id.'');
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
			      					<h4 class="r-h4"> رقم السيارة</h4>
			      				</div>
			      				<div class="col-xs-6 r-input">
							    	<select class="form-control selectpicker" data-live-search="true" onchange="$('#type_name').val($(this).find('option:selected').attr('carname'))" name="car_id_fk" id="car_id_fk" data-validation="required" aria-required="true">
										<option value="">إختر</option>
										<?php
										if(isset($cars) && $cars != null){
											foreach ($cars as $car) {
												$select = '';
												if((isset($order) && $order['car_id_fk'] == $car->id)) {
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
							      	<input type="text" name="type_name" placeholder="نوع السيارة" id="type_name" value="<?php if(isset($order)) echo $order['type_name'] ?>" class="form-control" data-validation="required" readonly>
							    </div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> السائق</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<select class="form-control selectpicker" data-live-search="true" name="driver_id_fk" id="driver_id_fk" data-validation="required" aria-required="true">
										<option value="">إختر</option>
										<?php
										if(isset($drivers) && $drivers != null){
											foreach ($drivers as $driver) {
												$select = '';
												if((isset($order) && $order['driver_id_fk'] == $driver->id)) {
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
						</div>

						<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> رقم العداد</h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
							      	<input type="number" name="counter_number_go" placeholder="رقم العداد" id="counter_number_go" value="<?php if(isset($order)) echo $order['counter_number_go'] ?>" class="form-control" data-validation="required">
							    </div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> المأمورية من</h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
							      	<input type="text" name="place_from" placeholder="المأمورية من" id="place_from" value="<?php if(isset($order)) echo $order['place_from'] ?>" class="form-control" data-validation="required">
							    </div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> المأمورية إلى</h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
							      	<input type="text" name="place_to" placeholder="المأمورية إلى" id="place_to" value="<?php if(isset($order)) echo $order['place_to'] ?>" class="form-control" data-validation="required">
							    </div>
							</div>
						</div>

						<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> من تاريخ </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-group">
	                            			<input type="text" id="date_from" name="date_from" placeholder="من تاريخ" value="<?php if(isset($order)) {echo date("Y-m-d",$order['date_from']);} ?>" class="form-control docs-date" data-validation="required" >
	                            		</div>
	                            	</div>
								</div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> إلى تاريخ </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-group">
	                            			<input type="text" id="date_to" name="date_to" placeholder="إلى تاريخ" value="<?php if(isset($order)) {echo date("Y-m-d",$order['date_to']);} ?>" class="form-control docs-date" data-validation="required" >
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
<?php if(isset($orders) && $orders != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>رقم السايرة</th>
							<th>إسم السائق</th>
							<th>جهة من</th>
							<th>جهة إلى</th>
							<th>من تاريخ</th>
							<th>إلى تاريخ</th>
							<th>الإجراء</th>
							<th>إجراء العودة</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($orders as $order) { 
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=$order->car_code?></td>
							<td><?=$order->driver_name?></td>
							<td><?=$order->place_from?></td>
							<td><?=$order->place_to?></td>
							<td><?=date("Y-m-d",$order->date_from)?></td>
							<td><?=date("Y-m-d",$order->date_to)?></td>
							<td>
								<a href="<?php echo base_url('Cars/Orders_car/edit').'/'.$order->id ?>"><i class="fa fa-pencil"></i> </a>

				                <a onclick="$('#adele').attr('href', '<?=base_url()."Cars/Orders_car/delete/".$order->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
							</td>
							<td>
								<?php if($order->return_car == 0) { ?>
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModa<?=$order->id?>">تسجيل العودة</button>
								<?php
								}
								else{
									echo 'تم تسجيل العودة برقم عداد '.$order->counter_number_return;
								}
								?>
							</td>
						</tr>

						<div class="modal" id="myModa<?=$order->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
					        <div class="modal-dialog" role="document">
					            <div class="modal-content">
					                <div class="modal-header">
					                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					                    <h4 class="modal-title" id="myModalLabel"> تسجيل العودة لسيارة رقم (<?=$order->car_code?>)</h4>
					                </div>
					                <form action="Orders_car/car_return/<?=$order->id?>" method="post">
						                <div class="modal-body">
						                    <div class="form-group col-sm-12 col-xs-12">
										      	<label class="label label-green half"> رقم العداد</label>
										      	<input type="text" name="counter_number_return" id="counter_number_return" class="form-control half input-style" placeholder="رقم العداد" data-validation="required" required>
										    </div>
						                </div>
						                <div class="modal-footer">
						                    <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
						                </div>
					            	</form>
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