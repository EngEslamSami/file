<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php 
unset($_SESSION["purchses_add".$_SESSION['user_id']]);
$id = $this->uri->segment(4);
$paid_type = array('1'=>'نقدي','2'=>'آجل');
if($id == '') {
	echo form_open_multipart('Storage/Purchases',array('id'=>'formPurchases'));
	$disabled = '';
}
else {
	echo form_open_multipart('Storage/Purchases/editPurchases/'.$id.'',array('id'=>'formPurchases'));
	$disabled = 'disabled';
}
?>
<div class="col-sm-12 col-md-12 col-xs-12">
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
			      					<h4 class="r-h4"> قارئ الباركود</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<input type="text" name="barcodePurchases" placeholder="قم بسحب الباركود هنا" id="barcodePurchases" class="form-control" autofocus>
							    </div>
			    			</div>
			    		</div>

			    		<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> كود الفاتورة</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							    	<input type="number" id="fatora_code" name="fatora_code" placeholder="كود الفاتورة" class="form-control" value="<?php if(isset($fatora)) {echo $fatora[0]->id;} else {if($id != null) echo ($id+1); else echo 1;} ?>" readonly>
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> تاريخ الفاتورة</h4>
			      				</div>
			    				<div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-group">
	                            			<input type="text" id="fatora_date" name="fatora_date" placeholder="تاريخ الفاتورة" value="<?php if(isset($fatora)) echo date('Y-m-d',$fatora[0]->fatora_date); ?>" class="form-control docs-date condimentForm" <?=$disabled?>>
	                            		</div>
	                            	</div>
								</div>
							</div>

							<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4">إسم المورد</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<select name="supplier_code" id="supplier_code" class="form-control selectpicker condimentForm" data-live-search="true" <?=$disabled?>>
										<option value="">إختر</option>
										<?php
										if(isset($suppliers) && $suppliers != null){
											foreach ($suppliers as $supplier) {
												$select = '';
												if(isset($fatora) && $fatora[0]->supplier_code == $supplier->id) {
													$select = 'selected';
												}
										?>
												<option value="<?=$supplier->id?>" <?=$select?>><?=$supplier->name?></option>
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
			      					<h4 class="r-h4"> رقم فاتورة المورد</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							    	<input type="number" name="marge3_num" id="marge3_num" class="form-control condimentForm" placeholder="رقم فاتورة المورد" />
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4">طريقة الدفع</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<select name="paid_type" id="paid_type" class="form-control condimentForm" data-live-search="true" onchange="boxName($(this).val());" <?=$disabled?>>
										<option value="">إختر</option>
										<?php 
										foreach ($paid_type as $key => $value) { 
											$select = '';
											if(isset($fatora) && $fatora[0]->paid_type == $key) {
												$select = 'selected';
											}
										?>
											<option value="<?=$key?>" <?=$select?>><?=$value?></option>
										<?php } ?>
									</select>
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4">إسم الصندوق</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<select name="box_name" id="box_name" class="form-control" disabled>
										<option value="">إختر</option>
										<?php 
										if(isset($safes) && $safes != null){
											foreach ($safes as $safe) {
	                                        	$select = '';
	                                        	if(isset($fatora) && $fatora[0]->box_name == $safe->id){
	                                    			$select = 'selected';
	                                    		}
	                    				?>
	                    				<option value="<?=$safe->id?>" <?=$select?>><?=$safe->name?></option>
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
			      					<h4 class="r-h4">الأصناف</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							      	<select name="product_code" id="product_code" class="form-control condimentForm selectpicker" data-live-search="true" >
										<option value="">إختر</option>
										<?php 
										if(isset($items) && $items != null){
											foreach ($items as $item) {
	                    				?>
	                    				<option unitid="<?=$item->unit_id_fk?>" unitname="<?=$item->unit_name?>" value="<?=$item->id?>"><?=$item->name?></option>
										<?php 
											} 
										}
										?>
									</select>
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> الوحدة</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							    	<input type="text" name="unit_name" id="unit_name" class="form-control" placeholder="الوحدة" readonly />
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> تكلفة الشراء الكلية</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							    	<input type="number" name="all_cost_buy" id="all_cost_buy" step="any" class="form-control condimentForm pricePurchases" placeholder="تكلفة الشراء الكلية"  />
							    </div>
			    			</div>
			    		</div>

			    		<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4">العدد الكلي</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							    	<input type="number" name="amount_buy" id="amount_buy" step="any" class="form-control condimentForm pricePurchases" placeholder="العدد الكلي" />
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> تكلفة شراء الوحدة</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							    	<input type="number" name="one_buy_cost" id="one_buy_cost" step="any" class="form-control condimentForm pricePurchases" placeholder="تكلفة شراء الوحدة" readonly/>
							    </div>
			    			</div>

			    			<div class="col-md-4 padd">
								<div class="col-xs-6">
			      					<h4 class="r-h4"> سعر بيع الوحدة</h4>
			      				</div>
							    <div class="col-xs-6 r-input">
							    	<input type="number" name="one_price_sell" id="one_price_sell" step="any" class="form-control condimentForm" placeholder="سعر بيع الوحدة" />
							    </div>
			    			</div>
			    		</div>

			    		<div class="form-group col-sm-12 col-xs-12">
			    			<input type="hidden" name="product_name" id="product_name">
			    			<input type="hidden" name="unit_id_fk" id="unit_id_fk">
			    			<?php if (isset($fatora)) { ?>
								<input type="hidden" name="byan" value="<?=$fatora[0]->byan?>">
								<input type="hidden" name="remain" value="<?=$fatora[0]->remain?>">
								<input type="hidden" name="paid" value="<?=$fatora[0]->paid?>">
								<input type="hidden" name="discount" value="<?=$fatora[0]->discount?>">
								<input type="hidden" name="fatora_cost_after_discount" value="<?=$fatora[0]->fatora_cost_after_discount?>">
								<input type="hidden" name="fatora_cost_before_discount" value="<?=$fatora[0]->fatora_cost_before_discount?>">
							<? } ?>
				            <button type="button" name="add" value="حفظ" onclick="return check_validation();" class="btn btn-success w-md m-b-5"><span><i class="fa fa-plus" aria-hidden="true"></i></span> إضافة صنف </button>
						</div>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</div>		    

<div id="result">
<?php 
if(isset($fatora) && $fatora != null) { 
	$session_id = $_SESSION['user_id'];
	foreach ($fatora[0]->sub as $one_row) {
        $new_product['fatora_date']       = date('Y-m-d',$fatora[0]->fatora_date);
		$new_product['supplier_code']     = $fatora[0]->supplier_code;
		$new_product['paid_type']         = $fatora[0]->paid_type;
		if($fatora[0]->paid_type == 1){
		    $new_product['box_name']      = $fatora[0]->box_name;
		}
		$new_product['product_code']      = $one_row->product_code;
		$new_product['unit_id_fk']        = $one_row->unit_id_fk;
		$new_product['amount_buy']        = $one_row->amount_buy;
		$new_product['all_cost_buy']      = $one_row->all_cost_buy;
		$new_product['one_buy_cost']      = $one_row->all_cost_buy/$one_row->amount_buy;
		$new_product['one_price_sell']    = $one_row->one_price_sell;
		$new_product['product_name']      = $one_row->item_name;

		$new_product['byan']  			  		   = $fatora[0]->byan;
		$new_product['remain']  		  		   = $fatora[0]->remain;
		$new_product['paid']  		  	  		   = $fatora[0]->paid;
		$new_product['discount']  		  	  	   = $fatora[0]->discount;
		$new_product['fatora_cost_after_discount'] = $fatora[0]->fatora_cost_after_discount;
		$new_product['fatora_cost_before_discount']= $fatora[0]->fatora_cost_before_discount;

        if(isset($_SESSION["purchses_add".$session_id])){  //if session var already exist
            if(isset($_SESSION["purchses_add".$session_id][$new_product['product_code']])) //check item exist in products array{
                unset($_SESSION["purchses_add".$session_id][$new_product['product_code']]); //unset old item
        }    
        
        $_SESSION["purchses_add".$session_id][$new_product['product_code']] = $new_product;  //update products with new item ar/ray
    }
    $this->load->view('admin/Storage/purchases/PurchasesSession');
}
?>
</div>			
<?php echo form_close(); ?>

<script type="text/javascript">
	function boxName(argument) {
		$('#box_name').attr("disabled", true);
		$('#box_name').val('');
		$('#box_name').removeClass("condimentForm");
		if(argument == 1) {
			$('#box_name').removeAttr('disabled');
			$('#box_name').addClass("condimentForm");
		}
	}
</script>

<script type="text/javascript">
    function cla(){
        var total = parseFloat($("#fatora_cost_before_discount").val()) - parseFloat($("#discount").val()) ;
        if(Number.isInteger(total) == true) {
            $('#fatora_cost_after_discount').val(total);
            var remain = parseFloat(total) - parseFloat($("#paid").val());
            $('#remain').val(remain);
        }
        else {
            $('#fatora_cost_after_discount').val($("#fatora_cost_before_discount").val());
            $('#remain').val($("#fatora_cost_before_discount").val());
        }
    }
</script>