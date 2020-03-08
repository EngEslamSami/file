<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
</style>
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
                    		<div class="col-md-9 padd">
								<div class="col-xs-3" style="padding: 0; width: 24%">
			      					<h4 class="r-h4"> إسم العميل</h4>
			      				</div>
							    <div class="col-xs-9 r-input" style="padding: 0; width: 76%;">
							      	<select name="client_code" id="client_code" class="r-inner-h4 form-control selectpicker" data-live-search="true" onchange="return ajaxSearch($(this).val());" data-validation="required">
							      		<option value="">--قم بإختيار إسم العميل--</option>
			                            <?php 
			                            if (isset($clients) && $clients != null){
			                                foreach ($clients as $clien) {
			                            ?>
			                            <option value="<?=$clien->id?>"><?=$clien->name?></option>
			                            <?php      
			                                }
			                            }
			                            ?>
							      	</select>
							    </div>
			    			</div>

			    			<div class="col-md-3 padd">
			    				<button type="button" name="add" id="add" value="حفظ" class="btn btn-success w-md m-b-5" onclick="return check($('#client_code').val());" ><span><i class="fa fa-search" aria-hidden="true"></i></span> عرض </button>
			    			</div>
			    		</div>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</div>

<div id="results"></div>

<script type="text/javascript">
	function check(client_code) {
        $('#results').html('');
		if(client_code){
			var dataString='client_code='+ client_code;
			$.ajax({
        		type:'post',
     			url:'<?php echo base_url() ?>Storage/Client_vouchers/Get_ClientsCounting',
        		data:dataString,
        		cache:false,
        		success: function(html){
         			$('#results').html(html);   
        		}
        
    		});
		}
        return false;
	}
</script>