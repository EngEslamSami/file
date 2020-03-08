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
                            <div class="col-md-6 padd">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> العملاء</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="client_code" id="client_code" class="form-control selectpicker" data-live-search="true">
                                        <option value="">--قم بإختيار إسم العميل--</option>
                                        <?php 
                                        if (isset($clients) && $clients != null){
                                            foreach ($clients as $client) {
                                        ?>
                                        <option value="<?=$client->id?>"><?=$client->name?></option>
                                        <?php      
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 padd">
                                <div class="form-group" style="margin-top: 3px">
                                    <button type="button" name="add" onclick="return check($('#client_code').val());" class="btn btn-success"><i class="fa fa-search"></i> عرض</button>
                                </div>
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
     			url:'<?php echo base_url() ?>Storage/Sales/Get_salesByClient',
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