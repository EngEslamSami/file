<div class="r-program">
	<div class="container">
    	<div class="col-sm-11 col-xs-12">
    		<?php
    		$data['R_payment_period'] = 'active';  
		    //$this->load->view('admin/finance_resource/main_tabs',$data); 
		    ?>
		    <div class="details-resorce">
		      	<div class="col-xs-12 r-inner-details">
		        	<div class="col-xs-12">

		        		<div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
			        		<div class="col-xs-12 ">
	                            <div class="col-xs-6">
	                                <h4 class="r-h4 ">  الفترة من: </h4>
	                            </div>
	                            <div class="col-xs-6 r-input ">
	                                <div class="docs-datepicker">
	                                    <div class="input-group">
	                                        <input type="text" class="form-control docs-date" id="date_from" placeholder="شهر / يوم / سنة "  >
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>

                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
	                        <div class="col-xs-12 ">
	                            <div class="col-xs-6">
	                                <h4 class="r-h4 ">  الفترة إلى: </h4>
	                            </div>
	                            <div class="col-xs-6 r-input ">
	                                <div class="docs-datepicker">
	                                    <div class="input-group">
	                                        <input type="text" class="form-control docs-date" id="date_to" placeholder="شهر / يوم / سنة "  >
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>

                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> إختر الكفيل </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select id="donor">
                                        <option value="">إختر </option>
                                        <?php
                                        if(isset($donors) && $donors != null){
                                        	echo '<option value="all">الكل </option>';
                                        	foreach ($donors as $donor)
                                        		echo '<option value="'.$donor->id.'">'.$donor->user_name.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 r-inner-btn" style="padding-top: 20px;">
                            <input type="button" role="button" name="add" value=" بحث " onclick="return lood();" class="btn pull-right" />
                        </div>

                    </div>
                </div>
                <div id="optionearea1"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function lood(){
    	$("#optionearea1").html('');
	    var date_from = $('#date_from').val();
	    var date_to = $('#date_to').val();
	    var donor = $('#donor').val();
	  	if(date_from != '' && date_to != '' && donor != ''){
	  		if(date_to > date_from){
		  		var dataString = 'date_from=' + date_from + '&date_to=' + date_to + '&donor=' + donor;
			    $.ajax({
			        type:'post',
			        url: '<?php echo base_url() ?>Finance_resource/R_payment_period',
			        data:dataString,
			        dataType: 'html',
			        cache:false,
			        success: function(html){
			            $("#optionearea1").html(html);
			        }
			    });
		      	return false;
	      	}
	      	else
	      		alert("يجب أن يكون تاريخ الفترة إلى بعد تاريخ الفترة من");
	  	}
    }
</script>