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
                    <h4>بيانات البحث</h4>
                </div>
            </div>
            
            <div class="panel-body">
            	<div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                    	<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data no-padding">
                    		<div class="col-md-4 padd">
	                            <div class="col-xs-6">
	                            	<h4 class="r-h4"> تاريخ من </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-groupp">
	                            			<input type="date" id="date_from" name="date_from" placeholder="تاريخ من" class="form-control " data-validation="required" >
	                            		</div>
	                            	</div>
								</div>
							</div>

							<div class="col-md-4 padd">
	                            <div class="col-xs-6">
	                            	<h4 class="r-h4"> تاريخ إلى </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<div class="docs-datepicker">
	                                    <div class="input-groupp">
	                            			<input type="date" id="date_to" name="date_to" placeholder="تاريخ إلى" class="form-control " data-validation="required" >
	                            		</div>
	                            	</div>
								</div>
							</div>

							<div class="col-md-4 padd">
	                            <div class="col-xs-6">
	                            	<h4 class="r-h4"> الموظف </h4>
	                            </div>
	                            <div class="col-xs-6 r-input">
	                            	<select class="form-control selectpicker" data-live-search="true" name="emp_code" id="emp_code" data-validation="required">
										<option value="">إختر الموظف</option>
										<option value="all">الكل</option>
										<?php
										foreach ($employees as $employee) {
										?>
										<option value="<?=$employee->emp_code?>"><?=$employee->employee?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<button type="submit" name="search" onclick="return search();" value="بحث" class="btn btn-purple w-md m-b-5" style="margin-top: 20px;"><i class="fa fa-search"></i> بحث</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="area"></div>

<script>
    function search(){
    	$('#area').html('');
    	if($('#date_from').val() > $('#date_to').val()){
    		alert("لا يمكن لتاريخ البداية أن يسبق تاريخ النهاية");
    	}
    	else{
	        if($('#date_from').val() && $('#date_to').val() && $('#emp_code').val())
	        {
	            var dataString = 'emp_code=' + $('#emp_code').val() + '&date_from=' + $('#date_from').val() + '&date_to=' + $('#date_to').val();
	            $.ajax({
	                type:'post',
	                url: '<?php echo base_url() ?>Administrative_affairs/load_permitPeriod',
	                data:dataString,
	                cache:false,
	                success: function(html){
	                	$('#area').html(html);
	                }
	            });
	            return false;
	        }
	    }
    }
</script>