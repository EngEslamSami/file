<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php 
$id = $this->uri->segment(4);
if($id == '') {
	echo form_open_multipart('Storage/Clients');
}
else {
	echo form_open_multipart('Storage/Clients/editClients/'.$id.'');
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
			      					<h4 class="r-h4"> إسم العميل</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="text" name="name" placeholder="إسم العميل" id="name" value="<?php if(isset($client)) echo $client['name'] ?>" class="form-control" data-validation="required">
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> عنوان العميل</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="text" name="client_address" placeholder="عنوان العميل" id="client_address" value="<?php if(isset($client)) echo $client['client_address'] ?>" class="form-control" data-validation="required">
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4">تليفون العميل</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="client_phone" placeholder="تليفون العميل" id="client_phone" value="<?php if(isset($client)) echo $client['client_phone'] ?>" class="form-control" data-validation="required">
							    </div>
			    			</div>
			    		</div>

			    		<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4">رقم الفاكس</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="client_fax" placeholder="رقم الفاكس" id="client_fax" value="<?php if(isset($client)) echo $client['client_fax'] ?>" class="form-control" data-validation="required">
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> إسم المحاسب المختص</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="text" name="accountant_name" placeholder="إسم المحاسب المختص" id="accountant_name" value="<?php if(isset($client)) echo $client['accountant_name'] ?>" class="form-control" data-validation="required">
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> رقم تليفون المحاسب</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="accountant_telephone" placeholder="رقم تليفون المحاسب" id="accountant_telephone" value="<?php if(isset($client)) echo $client['accountant_telephone'] ?>" class="form-control" data-validation="required">
							    </div>
			    			</div>
			    		</div>

			    		<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> إجمالى الدائن</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="client_dayen" placeholder="إجمالى الدائن" id="client_dayen" value="<?php if(isset($client)) echo $client['client_dayen'] ?>" class="form-control" data-validation="required">
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
<?php if(isset($clients) && $clients != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>إسم المورد</th>
							<th>تليفون المورد</th>
							<th>رصيد أول</th>
							<th>الإجراء</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($clients as $client) { 
						?>
						<tr>
							<td><?=($x++)?></td>
							<td><?=$client->name?></td>
							<td><?=$client->client_phone?></td>
							<td><?=$client->client_dayen?></td>
							<td>
								<a href="<?php echo base_url('Storage/Clients/editClients').'/'.$client->id ?>"><i class="fa fa-pencil"></i> </a>

				                <a onclick="$('#adele').attr('href', '<?=base_url()."Storage/Clients/deleteClients/".$client->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<? } ?>
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