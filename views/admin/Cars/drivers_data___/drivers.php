<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php 
$id = $this->uri->segment(4);
if($id == '') {
	echo form_open_multipart('Cars/Drivers');
}
else {
	echo form_open_multipart('Cars/Drivers/edit/'.$id.'');
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
                    		<div class="col-md-6 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> إسم السائق</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="text" name="driver_name" placeholder="إسم السائق" id="driver_name" value="<?php if(isset($driver)) echo $driver['driver_name'] ?>"" class="form-control" data-validation="required" >
							    </div>
			    			</div>

			    			<div class="col-md-6 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> رقم البطاقة</h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
							      	<input type="number" name="driver_card" placeholder="رقم البطاقة" id="driver_card" value="<?php if(isset($driver)) echo $driver['driver_card'] ?>"" class="form-control" data-validation="required" >
							    </div>
							</div>
						</div>

						<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
							<div class="col-md-6 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> العنوان</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="text" name="driver_address" placeholder="العنوان" id="driver_address" value="<?php if(isset($driver)) echo $driver['driver_address'] ?>"" class="form-control" data-validation="required" >
							    </div>
			    			</div>

			    			<div class="col-md-6 padd">
								<div class="col-xs-6">
	                            	<h4 class="r-h4"> رقم الرخصة</h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
							      	<input type="number" name="driver_license_code" placeholder="رقم الرخصة" id="driver_license_code" value="<?php if(isset($driver)) echo $driver['driver_license_code'] ?>"" class="form-control" data-validation="required" >
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
<?php if(isset($drivers) && $drivers != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>إسم السائق</th>
							<th>رقم البطاقة</th>
							<th>العنوان</th>
							<th>رقم الرخصة</th>
							<th>الإجراء</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($drivers as $driver) { 
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=$driver->driver_name?></td>
							<td><?=$driver->driver_card?></td>
							<td><?=$driver->driver_address?></td>
							<td><?=$driver->driver_license_code?></td>
							<td>
								<a href="<?php echo base_url('Cars/Drivers/edit').'/'.$driver->id ?>"><i class="fa fa-pencil"></i> </a>

				                <a onclick="$('#adele').attr('href', '<?=base_url()."Cars/Drivers/delete/".$driver->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
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