<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php 
$id = $this->uri->segment(4);
$item_type = array(1=>'خامات تصنيع',2=>'منتجات مصنعة',3=>'منتجات جاهزة للبيع');
$required = '';
$readonly = 'readonly';
$first_balance_period = array(1=>'نعم',2=>'لا');
if($id == '') {
	echo form_open_multipart('Storage/Sub_items');
}
else {
	echo form_open_multipart('Storage/Sub_items/editSub_item/'.$id.'');
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
			      					<h4 class="r-h4"> الصنف الرئيسي</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<select name="id_from" id="id_from" class="r-inner-h4" data-validation="required">
							      		<option value="">إختر</option>
							      		<?php
							      		if(isset($sub_items) && $sub_items != null){
							      			foreach ($sub_items as $value) {
							      				$select = '';
							      				if(isset($sub_item) && $sub_item['id_from'] == $value->id) {
							      					$select = 'selected';
							      				}
							      		?>
							      				<option value="<?=$value->id?>" <?=$select?>><?=$value->name?></option>
							      		<?php
							      			}
							      		}
							      		?>
							      	</select>
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> الصنف الفرعي</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="text" name="name" placeholder="الصنف الفرعي" id="name" value="<?php if(isset($sub_item)) echo $sub_item['name'] ?>" class="form-control" data-validation="required">
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4">نوع الصنف</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<select name="item_type" id="item_type" class="r-inner-h4" data-validation="required">
							      		<option value="">إختر</option>
							      		<?php
						      			foreach ($item_type as $key => $value) {
						      				$select = '';
						      				if(isset($sub_item) && $sub_item['item_type'] == $key) {
						      					$select = 'selected';
						      				}
							      		?>
							      			<option value="<?=$key?>" <?=$select?>><?=$value?></option>
							      		<?php
							      		}
							      		?>
							      	</select>
							    </div>
			    			</div>
			    		</div>

			    		<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> الوحدة</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<select name="unit_id_fk" id="unit_id_fk" class="r-inner-h4" data-validation="required">
							      		<option value="">إختر</option>
							      		<?php
							      		if(isset($units) && $units != null){
							      			foreach ($units as $value) {
							      				$select = '';
							      				if(isset($sub_item) && $sub_item['unit_id_fk'] == $value->id) {
							      					$select = 'selected';
							      				}
							      		?>
							      				<option value="<?=$value->id?>" <?=$select?>><?=$value->name?></option>
							      		<?php
							      			}
							      		}
							      		?>
							      	</select>
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> سعر الشراء الكلي</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="all_buy_cost" placeholder="سعر الشراء الكلي" id="all_buy_cost" value="<?php if(isset($sub_item)) echo $sub_item['all_buy_cost'] ?>" class="form-control" onkeyup="return calculate();" data-validation="required">
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> العدد الكلي</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="all_amount" placeholder="العدد الكلي" id="all_amount" value="<?php if(isset($sub_item)) echo $sub_item['all_amount'] ?>" class="form-control" onkeyup="return calculate();" data-validation="required">
							    </div>
			    			</div>
			    		</div>

			    		<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> سعر شراء الوحدة</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="one_buy_cost" placeholder="سعر شراء الوحدة" id="one_buy_cost" value="<?php if(isset($sub_item)) echo $sub_item['one_buy_cost'] ?>" class="form-control" data-validation="required" readonly>
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> سعر البيع</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="customer_price_sale" placeholder="سعر البيع" id="customer_price_sale" value="<?php if(isset($sub_item)) echo $sub_item['customer_price_sale'] ?>" class="form-control" data-validation="required">
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> رصيد أول مدة</h4>
			      				</div>
							    <div class="col-xs-6 r-input" style="padding-top: 5px">
							      	<?php 
							      	foreach ($first_balance_period as $key => $value) {
							      		$check = '';
	                            		if(isset($sub_item) && $sub_item['first_balance_period'] == $key){
	                            			$check = 'checked';
	                            		}
	                            		if(isset($sub_item) && $sub_item['first_balance_period'] == 1) {
	                            			$required = 'required';
	                            			$readonly = '';
	                            		}
							      	?>
							      		&nbsp;&nbsp;
							      		<input type="radio" name="first_balance_period" value="<?=$key?>" class="first_balance_period" onclick="return check($(this).val())" data-validation="required" <?=$check?>> <?=$value?>
							      		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							      	<?php } ?>
							    </div>
			    			</div>
			    		</div>

			    		<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> الكمية</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="past_amount" placeholder="الكمية" id="past_amount" value="<?php if(isset($sub_item)) echo $sub_item['past_amount'] ?>" class="form-control" data-validation="<?=$required?>" <?=$readonly?>>
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> التكلفة</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="number" name="cost_past_amount" placeholder="التكلفة" id="cost_past_amount" value="<?php if(isset($sub_item)) echo $sub_item['cost_past_amount'] ?>" class="form-control" data-validation="<?=$required?>" <?=$readonly?>>
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
<?php if(isset($sub_items) && $sub_items != null) { ?>
				<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>#</th>
							<th>إسم الصنف الرئيسي</th>
							<th>إسم الصنف الفرعي</th>
							<th>الإجراء</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$x = 1;
						foreach ($sub_items as $sub_item) { 
							$count = '';
							if($sub_item->sub_items != null){
								$count = count($sub_item->sub_items);
							}
						?>
						<tr>
							<td rowspan="<?=$count?>"><?=($x++)?></td>
							<td rowspan="<?=$count?>"><?=$sub_item->name?></td>
							<?php 
							if($sub_item->sub_items != null){
								foreach ($sub_item->sub_items as $value) { 
							?>
								<td><?=$value->name?></td>
								<td>
									<a href="<?php echo base_url('Storage/Sub_items/editSub_item').'/'.$value->id ?>"><i class="fa fa-pencil"></i> </a>

					                <a onclick="$('#adele').attr('href', '<?=base_url()."Storage/Sub_items/deleteSub_items/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
								</td>
							</tr>
						<?
								}
							}
							else{
								echo '<td colspan="2"><div class="alert-danger">لا توجد أصناف فرعية</div></td></tr>';
							}
						} 
						?>
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

<script type="text/javascript">
	function calculate() {
		var cost = parseFloat($("#all_buy_cost").val()) /  parseFloat($("#all_amount").val());
	    $('#one_buy_cost').val(cost);
	}
</script>

<script type="text/javascript">
    function check(argument) 
    {
        if (argument == 1) {
            $('#past_amount').attr('readonly',false);
	      	$('#past_amount').attr('data-validation','required');

	      	$('#cost_past_amount').attr('readonly',false);
	      	$('#cost_past_amount').attr('data-validation','required');
        } 
        else{
            $('#past_amount').val('');
	    	$('#past_amount').attr('readonly',true);
	      	$('#past_amount').attr('data-validation','');

	      	$('#cost_past_amount').val('');
	    	$('#cost_past_amount').attr('readonly',true);
	      	$('#cost_past_amount').attr('data-validation','');
        }
    }
</script>