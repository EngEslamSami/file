<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php 
$id = $this->uri->segment(4);
if($id == '') {
	echo form_open_multipart('Cars/Violation');
}
else {
	echo form_open_multipart('Cars/Violation/edit/'.$id.'');
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
			      					<h4 class="r-h4"> رقم الإيصال</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="receipt_code" placeholder="رقم الإيصال" id="receipt_code" value="<?php if(isset($violation)) echo $violation['receipt_code'] ?>"" class="form-control" data-validation="required" >
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> تاريخ المخالفة </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-group">
	                            			<input type="text" id="date" name="date" placeholder="تاريخ المخالفة" value="<?php if(isset($violation)) {echo date("Y-m-d",$violation['date']);} ?>" class="form-control docs-date" data-validation="required" >
	                            		</div>
	                            	</div>
								</div>
							</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> رقم السيارة</h4>
			      				</div>
			      				<div class="col-xs-6 r-input">
							    	<select class="form-control selectpicker" data-live-search="true" name="car_id_fk" id="car_id_fk" data-validation="required" aria-required="true">
										<option value="">إختر</option>
										<?php
										if(isset($cars) && $cars != null){
											foreach ($cars as $car) {
												$select = '';
												if((isset($violation) && $violation['car_id_fk'] == $car->id)) {
													$select = 'selected';
												}
										?>
										<option value="<?=$car->id?>" <?=$select?> ><?=$car->car_code?></option>
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
			      					<h4 class="r-h4"> السائق</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<select class="form-control selectpicker" data-live-search="true" name="driver_id_fk" id="driver_id_fk" data-validation="required" aria-required="true">
										<option value="">إختر</option>
										<?php
										if(isset($drivers) && $drivers != null){
											foreach ($drivers as $driver) {
												$select = '';
												if((isset($violation) && $violation['driver_id_fk'] == $driver->id)) {
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
			      					<h4 class="r-h4"> ملاحظات</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							    	<textarea name="note" class="r-textarea" placeholder="ملاحظات" data-validation="required"><?php if(isset($violation)) echo $violation['note'] ?></textarea>
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
<?php if(isset($violations) && $violations != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>تاريخ المخالفة</th>
							<th>إسم السائق</th>
							<th>رقم السيارة</th>
							<th>رقم الإيصال</th>
							<th>ملاحظات</th>
							<th>الإجراء</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($violations as $violation) { 
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=date("Y-m-d",$violation->date)?></td>
							<td><?=$violation->driver_name?></td>
							<td><?=$violation->car_code?></td>
							<td><?=$violation->receipt_code?></td>
							<td><?=$violation->note?></td>
							<td>
								<a href="<?php echo base_url('Cars/Violation/edit').'/'.$violation->id ?>"><i class="fa fa-pencil"></i> </a>

				                <a onclick="$('#adele').attr('href', '<?=base_url()."Cars/Violation/delete/".$violation->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
							</td>
						</tr>
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