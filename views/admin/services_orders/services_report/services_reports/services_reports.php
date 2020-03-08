<style type="text/css">
	.padd {padding: 0 3px !important;}
	.no-padding {padding: 0;}
	.no-margin {margin: 0;}
	h4 {margin-top: 0;}
</style>
<?php
$script = '';
$id = $this->uri->segment(5);
$mainServices = $this->uri->segment(4);
$disabled = '';
$readonly = '';
$service_id_fk = '';
if(isset($categories) && $categories != null) {
    $script = 'onchange=\'return getSubCategories($(this).val(), '.json_encode($categories).')\'';
}

?>

<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?=$title?></h4>
            </div>
        </div>

        <div class="panel-body">
			<div class="form-group col-sm-12 col-xs-12 no-padding">
			    <div class="form-group col-sm-4 col-xs-12 padd">
			      	<label class="label label-green half"> رقم الأسرة</label>
			     <select class="form-control half" name="mother_national_id_fk" id="mother_national_id_fk"  data-validation="required" <?=$disabled?>>
			      		<option value="">إختر</option>
			      		<?php 
			      		if (isset($famils) && $famils != null) {
			      			foreach ($famils as $valued) {
                                
			      		?>
			      		<option value="<?=$valued->mother_national_num?>"><?=$valued->m_full_name?></option>
			      		<?
			      			}
			      		}
			      		?>
			      	</select>
                </div>

			    <div class="form-group col-sm-3 col-xs-12 padd">
			      	<label class="label label-green half"> فئة الخدمة</label>
			      	<select class="form-control half" name="mainServices" id="mainServices" <?=$script?> data-validation="required" <?=$disabled?>>
			      		<option value="">إختر</option>
			      		<?php 
			      		if (isset($categories) && $categories != null) {
			      			foreach ($categories as $value) {
                                $select = '';
                                if(isset($record) && $mainServices == $value->id) {
                                    $select = 'selected';
                                }
			      		?>
			      		<option value="<?=$value->id?>" <?=$select?>><?=$value->title?></option>
			      		<?
			      			}
			      		}
			      		?>
			      	</select>
			    </div>

			    <div class="form-group col-sm-3 col-xs-12 padd">
			      	<label class="label label-green half"> نوع الخدمة</label>
			      	<select name="service_id_fk" id="service_id_fk" class="form-control half" data-validation="required" <?=$disabled?>>
			      		<option value="">إختر</option>
                        <?php
                        if($id != '') {
                            if (isset($categories) && $categories != null) {
                                foreach ($categories as $value) {
                                    if($value->subCategories != null){
                                        foreach ($value->subCategories as $sub) {
                                            $select = '';
                                            if($sub->id == $service_id_fk) {
                                                $select = 'selected';
                                            }
                        ?>
                        <option value="<?=$sub->id?>" <?=$select?>><?=$sub->title?></option>
                        <?
                                            
                                        }
                                    }
                                }
                            }
                        }
                        ?>
			      	</select>
			    </div>

    			<div class="form-group col-sm-2  padd">
    				<button type="button" name="report" class="btn btn-warning" onclick="return ajaxSearch();" <?=$disabled?>><i class="fa fa-search"></i> بحث</button>
    			</div>

    			
<div id="table"></div>
    		
    		</div>

		</div>
	</div>
</div>



<?php echo form_close()?>

<script type="text/javascript">
    function getSubCategories(val,subcat) {
        var select = document.getElementById('service_id_fk');
        select.disabled = false;
        removeOptions(select);
        select.options[select.options.length] = new Option('إختر', '');
        for (var i = 0; i < subcat.length; i++) {
            var obj = subcat[i];
            if(obj.id == val){
                var subCategorie = obj.subCategories;
                for (var x = 0; x < subCategorie.length; x++) {
                    select.options[select.options.length] = new Option(subCategorie[x].title, subCategorie[x].id);
                }
                if(subCategorie.length == 0) {
                	select.disabled = true;
                }
            }
        }
    }

    function removeOptions(selectbox)
    {
        for(var i = selectbox.options.length - 1 ; i >= 0 ; i--) {
            selectbox.remove(i);
        }
    }

    function ajaxSearch() {
      
    	var mother = $('#mother_national_id_fk').val();
    	var mainServices = $('#mainServices').val();
    	var select = document.getElementById('service_id_fk');
    	if (select.disabled == true) {
    		var service_id_fk = 'null';
    	}
    	else {
    		var service_id_fk = select.value;
    	}
    	if (mother && mainServices && service_id_fk) {
    		var dataString = 'mother_national_id_fk=' + mother+'&mainServices='+mainServices+'&service_id_fk='+service_id_fk;
	        $.ajax({
	            type:'post',
	            url: '<?php echo base_url() ?>services_orders/reports/Services_reports',
	            data: dataString,
                dataType: 'html',
                cache:false,
	             success: function (html) {
                $('#table').html(html);
                }
	        });
	        
    	}else{
    	    $('#table').html('');
    	   alert('تأكد من الاختيارات المتاحة '); 
    	}
    }

  
</script>