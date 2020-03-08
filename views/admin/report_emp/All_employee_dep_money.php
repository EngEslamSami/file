<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
	.no-margin {margin: 0;}
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
							<div class="col-md-12 padd">
						    	<div class="col-xs-6">
						      		<label class="label label-green half"> القسم</label>
							      	<select name="dep" id="dep" class="form-control half selectpicker" data-live-search="true" data-validation="required">
							      		<option value="">--قم بإختيار القسم--</option>
							      		<?php
							      		if (isset($departments) && $departments != null) {
							      			foreach ($departments as $value) {
							      		?>
							      		<option value="<?=$value->id?>"><?=$value->name?></option>
							      		<?php
							      			}
							      		}
							      		?>
							      	</select>
							    </div>

<div class="col-xs-2">
<button type="button" name="add" value="حفظ" class="btn btn-success" onclick="return loadData($('#dep').val())">
       <span><i class="fa fa-search"></i></span> بحث</button>
</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="result"></div>

<script type="text/javascript">
	function loadData(dep){
    	$('#result').val('');
        if(dep)
        {
            var dataString = 'dep=' + dep ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>All_reports/Get_All_employee_dep_money',
                data:dataString,
                cache:false,
                dataType: 'html',
                success: function(html){
                	$('#result').html(html);
                }
            });
            return false;
        }
    }
</script>