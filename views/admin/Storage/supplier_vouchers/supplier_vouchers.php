<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
<?php 
$id = $this->uri->segment(4);
if($id == '') {
	echo form_open_multipart('Storage/Supplier_vouchers');
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
                    	<div class="col-md-9 col-sm-12 col-xs-12 inner-side r-data no-padding">
							<div class="col-md-12 padd">
								<div class="col-xs-3" style="padding: 0; width: 24%">
			      					<h4 class="r-h4"> إسم المورد</h4>
			      				</div>
							    <div class="col-xs-9 r-input" style="padding: 0; width: 76%;">
							      	<select name="supplier_code" id="supplier_code" class="r-inner-h4 form-control selectpicker" data-live-search="true" onchange="return ajaxSearch($(this).val());" data-validation="required">
							      		<option value="">--قم بإختيار إسم المورد--</option>
			                            <?php 
			                            if (isset($suppliers) && $suppliers != null){
			                                foreach ($suppliers as $supp) {
			                            ?>
			                            <option value="<?=$supp->id?>"><?=$supp->name?></option>
			                            <?php      
			                                }
			                            }
			                            ?>
							      	</select>
							    </div>
			    			</div>

			    			<div class="col-md-12 padd"><hr></div>

			    			<div class="col-md-6 padd">
				    			<div class="col-xs-6">
	                            	<h4 class="r-h4"> تاريخ السند </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-group">
	                            			<input type="text" id="date" name="date" placeholder="تاريخ السند" value="<?=date("Y-m-d")?>" class="form-control docs-date" data-validation="required" >
	                            		</div>
	                            	</div>
								</div>
							</div>

							<div class="col-md-6 padd">
				    			<div class="col-xs-6">
	                            	<h4 class="r-h4"> إجمالي المديونية </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="text" id="total" name="total" class="r-inner-h4 dt" data-validation="required" placeholder="إجمالي المديونية" readonly />
								</div>
							</div>

							<div class="col-md-6 padd">
				    			<div class="col-xs-6">
	                            	<h4 class="r-h4"> إجمالي المدفوع </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="number" id="paid" name="paid" class="r-inner-h4 dt" data-validation="required" placeholder="إجمالي المدفوع" onkeyup="$('#remain').val(($('#total').val()-$(this).val()));" />
								</div>
							</div>

							<div class="col-md-6 padd">
				    			<div class="col-xs-6">
	                            	<h4 class="r-h4"> إجمالي المتبقي </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="number" id="remain" name="remain" class="r-inner-h4 dt" data-validation="required" placeholder="إجمالي المتبقي" readonly />
								</div>
							</div>
			    		</div>

			    		<div class="col-md-3 col-sm-12 col-xs-12 inner-side r-data no-padding">
			    			<div class="col-md-12 padd">
			    				<div id="post_img" class="imgContent" style="min-height: 83px;">
				                    <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded">
				                </div>
			    			</div>

			    			<div class="col-md-12 padd">
			                    <div class="col-xs-6">
	                            	<h4 class="r-h4"> الهاتف </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="text" id="supplier_phone" name="supplier_phone" class="r-inner-h4 dt" placeholder="الهاتف" readonly />
								</div>
			                </div>

			                <div class="col-md-12 padd">
			                    <div class="col-xs-6">
	                            	<h4 class="r-h4"> العنوان </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<input type="text" id="supplier_address" name="supplier_address" class="r-inner-h4 dt" placeholder="العنوان" readonly />
								</div>
			                </div>
			    		</div>

					    <div class="form-group col-sm-12 col-xs-12">
				            <button type="submit" name="add" id="add" value="حفظ" class="btn btn-purple w-md m-b-5" onclick="if($('#supplier_code').val() == '') {alert('برجاء قم بإختيار إسم المورد أولا'); return false;} if($('#remain').val() < 0){alert('لا يمكن أن يكون إجمالي المدفوع أكبر من إجمالي المديونية ..!'); return false;}" ><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo form_close(); ?>

<div id="area"></div>

<script type="text/javascript">
    function ajaxSearch(supplier_code)
    {
        var inputs = $('.dt');
        for (var i = inputs.length - 1; i >= 0; i--) {
            inputs[i].value = '';
        }
        $('#area').html('');
        document.getElementById('add').removeAttribute("disabled");
        if(supplier_code){
            var dataString = 'supplier_code=' + supplier_code;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Storage/Supplier_vouchers/supplier_total',
                data:dataString,
                cache:false,
                success: function(ajax_data){
                    var data = JSON.parse(ajax_data);
                    console.log(data);
                    $('#supplier_address').val(data.supplier_address);
                    $('#supplier_phone').val(data.supplier_phone);
                    var total = parseFloat(data.supplier_dayen) + parseFloat(data.remain) - parseFloat(data.paid);
                    $('#total').val(total);
                    $('#remain').val(total);
                    if(total <= 0){
                        document.getElementById('add').setAttribute("disabled","true");
                    }
                } 
            });
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Storage/Supplier_vouchers/Get_supplier_vouchers",
                data: dataString,
                dataType: 'html',
                cache:false,
                success: function (html) {
                    $('#area').html(html);
                }
            });
        }
    }
</script>