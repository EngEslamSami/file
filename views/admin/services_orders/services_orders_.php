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
if($id == '') {
    echo form_open_multipart('services_orders/Services_orders'); 
}
else {
    echo form_open_multipart('services_orders/Services_orders/editServicesOrders/'.$mainServices.'/'.$id); 
    $disabled = 'disabled';
    $readonly = 'readonly ';
    if($mainServices >= 2 && $mainServices <=4) {
    }
    else {
        $mainServices = 1;
        $service_id_fk = $this->uri->segment(4);
    }
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
			<div class="form-group col-sm-9 col-xs-12 no-padding">
			    <div class="form-group col-sm-4 col-xs-12 padd">
			      	<label class="label label-green half"> رقم الأسرة</label>
			      	<input type="text" id="mother_national_id_fk" name="mother_national_id_fk" placeholder="رقم الأسرة" class="form-control half input-style" data-validation="required" value="<?php if(isset($record)) echo $record['mother_national_id_fk'] ?>" onkeypress="return isNumberKey(event)" <?=$readonly?>>
			    </div>

			    <div class="form-group col-sm-4 col-xs-12 padd">
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

			    <div class="form-group col-sm-4 col-xs-12 padd">
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

    			<div class="col-md-12 padd">
    				<button type="button" name="report" class="btn btn-warning col-md-12" onclick="return ajaxSearch();" <?=$disabled?>><i class="fa fa-search"></i> بحث</button>
    			</div>

    			<div class="col-md-12 padd"><hr style="margin-bottom: 7px;"></div>

    			<div id="page" class="no-padding no-margin">
                <?php
                if($mainServices == 2) {
                    $this->load->view('admin/services_orders/marriage/marriageHelp');
                }
                if($mainServices == 3) {
                    $this->load->view('admin/services_orders/medical/medicalCenter');
                }
                if($mainServices == 4) {
                    $this->load->view('admin/services_orders/electronic_card/electronicId');
                }
                if($service_id_fk == 16) {
                    $this->load->view('admin/services_orders/health_care/health_care');
                }
                if($service_id_fk == 17) {
                    $this->load->view('admin/services_orders/insurance_orders/insurance_orders');
                }
                ?>         
                </div>
    		</div>

	    	<div class="form-group col-sm-3 col-xs-12 no-padding">
    			<div class="col-md-12 padd" style="height: 116px !important">
	                <img id="blah" src="<?=base_url('asisst/admin_asset/img/logo.png')?>" class="img-rounded" style="width: 100%; height: 100%">
    			</div>

    			<div class="form-group col-sm-12 col-xs-12 padd">
                   	<label class="label label-green half"> الإسم</label>
                    <input type="text" id="name" name="name" class="form-control half input-style" placeholder="الإسم" value="<?php if(isset($record)) echo $record['m_first_name'].' '.$record['m_father_name'].' '.$record['m_family_name'] ?>" readonly />
                </div>

                <div class="form-group col-sm-12 col-xs-12 padd">
                    <label class="label label-green half">تاريخ الميلاد</label>
                    <input type="text" id="m_birth_date_hijri" name="m_birth_date_hijri" class="form-control half input-style" placeholder="تاريخ الميلاد" value="<?php if(isset($record)) echo $record['m_birth_date_hijri'] ?>" readonly />
                </div>

    			<div class="form-group col-sm-12 col-xs-12 padd">
                    <label class="label label-green half">رقم الجوال </label>
                    <input type="text" id="m_mob" name="m_mob" class="form-control half input-style" value="<?php if(isset($record)) echo $record['m_mob'] ?>" placeholder="رقم الجوال" readonly />
                </div>
    		</div>
		</div>
	</div>
</div>

<div id="table"></div>

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
        $('#page').html('');
        $('#table').html('');
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
    		var dataString = 'mother_national_id_fk=' + mother;
	        $.ajax({
	            type:'post',
	            url: '<?php echo base_url() ?>services_orders/Services_orders/getMotherData',
	            data:dataString,
	            cache:false,
	            success: function(result){
	            	var obj = JSON.parse(result);
	            	$('#m_mob').val(obj.m_mob);
	            	$('#m_birth_date_hijri').val(obj.m_birth_date_hijri);
	            	$('#name').val(obj.m_first_name+' '+obj.m_father_name+' '+obj.m_family_name);
	            }
	        });
	        $('#page').load("<?php echo base_url() ?>services_orders/Services_orders/loadView/"+mainServices+'/'+mother+'/'+service_id_fk);
	        $('#table').load("<?php echo base_url() ?>services_orders/Services_orders/loadTable/"+mainServices+'/'+mother+'/'+service_id_fk);
    	}
    }

    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>