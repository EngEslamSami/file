<style type="text/css">
	.padd {padding: 0 15px !important;}
	.no-padding {padding: 0;}
	.no-margin {margin: 0;}
</style>

<?php 
$dayes = array('السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة');
$period = array('الصباح','المساء');
$answer = array(1=>'نعم',2=>'لا');
$required1 = '';
$readonly1 = 'readonly';
$required2 = '';
$readonly2 = 'readonly';
$disabled = 'disabled';
if($this->uri->segment(4) == ""){
	echo form_open_multipart('Volunteers/Volunteers/new_volunteer'); 
}
else{
	echo form_open_multipart('Volunteers/Volunteers/edit_volunteer/'.$this->uri->segment(4)); 
	$disabled = '';
	if($volunteer['another_charity'] == 1) {
		$required1 = 'required';
		$readonly1 = '';
	}
	if($volunteer['having_disability'] == 1) {
		$required2 = 'required';
		$readonly2 = '';
	}
}
?>
<div class="col-sm-12 col-md-12 col-xs-12">
	<div class="col-sm-2 col-md-2 col-xs-2">
		<button type="button" class="btn btn-success w-md m-b-5 " onclick="window.location.href = '<?=base_url()?>Volunteers/Volunteers';"><i class="fa fa-reply"></i> رجوع  </button>
	</div>
</div>

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
				<div class="form-group col-sm-12 col-xs-12">
					<h4 class="r-h4">البيانات الشخصية</h4>
				    <div class="form-group col-sm-4 col-xs-12">
				      	<label class="label label-green half"> الإسم</label>
				      	<input type="text" name="name" value="<?php if(isset($volunteer)) echo $volunteer['name'] ?>" placeholder="الإسم" class="form-control half input-style" data-validation="required">
				    </div>

				    <div class="form-group col-sm-4 col-xs-12">
				      	<label class="label label-green half"> رقم الهوية</label>
				      	<input type="number" name="id_card" value="<?php if(isset($volunteer)) echo $volunteer['id_card'] ?>" placeholder="رقم الهوية" class="form-control half input-style" data-validation="required" onkeyup="return checkUnique($(this).val())">
				      	<span id="checkUnique" style="color: #a94442"></span>
				    </div>

				    <div class="form-group col-sm-4 col-xs-12">
				      	<label class="label label-green half"> تاريخ الميلاد</label>
				      	<input type="text" name="birth_date" value="<?php if(isset($volunteer)) echo $volunteer['birth_date'] ?>" placeholder="تاريخ الميلاد" class="docs-date form-control half input-style" data-validation="required" autocomplete="off">
				    </div>
				</div>

				<div class="form-group col-sm-12 col-xs-12">
				    <div class="form-group col-sm-4 col-xs-12">
				      	<label class="label label-green half"> العنوان</label>
				      	<input type="text" name="address" value="<?php if(isset($volunteer)) echo $volunteer['address'] ?>" placeholder="العنوان" class="form-control half input-style" data-validation="required">
				    </div>

				    <div class="form-group col-sm-4 col-xs-12">
				      	<label class="label label-green half"> الهاتف أو الجوال</label>
				      	<input type="number" name="mobile" value="<?php if(isset($volunteer)) echo $volunteer['mobile'] ?>" placeholder="الهاتف أو الجوال" class="form-control half input-style" data-validation="required">
				    </div>

				    <div class="form-group col-sm-4 col-xs-12">
				      	<label class="label label-green half"> المهنة</label>
				      	<input type="text" name="job" value="<?php if(isset($volunteer)) echo $volunteer['job'] ?>" placeholder="المهنة" class="form-control half input-style" data-validation="required">
				    </div>
				</div>

				<div class="form-group col-sm-12 col-xs-12">
				    <div class="form-group col-sm-4 col-xs-12">
				      	<label class="label label-green half"> البريد الإلكتروني</label>
				      	<input type="email" name="email" value="<?php if(isset($volunteer)) echo $volunteer['email'] ?>" placeholder="البريد الإلكتروني" class="form-control half input-style" data-validation="required">
				    </div>
				</div>

			    <div class="form-group col-sm-12 col-xs-12">
			    	<h4 class="r-h4">المجالات والبرامج المطلوب التطوع بها</h4>
			    	<?php 
			    	$allFields = array();
			    	if(isset($volunteer)) {
			    		$allFields = unserialize($volunteer['fields']);
			    	}
			    	if(isset($fields) && $fields != null) { 
			    		foreach ($fields as $field) {
			    			$checked = '';
                            if(in_array($field->id,$allFields)) {
                                $checked = 'checked';
                            }
			    	?>
			    	<div class="col-xs-3">
			    		<input type="checkbox" name="fields[]" value="<?=$field->id?>" class="Radiotype" data-validation="validate_checkbox_group" data-validation-qty="1-<?=sizeof($fields)?>" <?=$checked?>> <label><h6><?=$field->title?></h6></label>
			    	</div>
			    	<? 
			    		} 
			    	}
			    	?>
			    </div>

			    <div class="form-group col-sm-12 col-xs-12">
			    	<h4 class="r-h4">ما هو سبب الرغبة بالتطوع لدى الجمعية</h4>
			    	<?php 
			    	$allReasons = array();
			    	if(isset($volunteer)) {
			    		$allReasons = unserialize($volunteer['reasons']);
			    	}
			    	if(isset($reasons) && $reasons != null) { 
			    		foreach ($reasons as $reason) {
			    			$checked = '';
                            if(in_array($reason->id,$allReasons)) {
                                $checked = 'checked';
                            }
			    	?>
			    	<div class="col-xs-3">
			    		<input type="checkbox" name="reasons[]" value="<?=$reason->id?>" class="Radiotype" data-validation="validate_checkbox_group" data-validation-qty="1-<?=sizeof($reasons)?>" <?=$checked?>> <label><h6><?=$reason->title?></h6></label>
			    	</div>
			    	<? 
			    		} 
			    	}
			    	?>
			    </div>

			    <div class="form-group col-sm-12 col-xs-12">
			    	<h4 class="r-h4">الأيام والفترات التي أستطيع أن أتطوع بها</h4>
			    </div>

			    <div class="col-md-12 padd">
					<div class="col-xs-2">
                    	<label class="label label-green half"> الأيام</label>
                    </div>
	                <div class="col-xs-9 r-input" style="padding-left: 0 !important">
				    	<?php 
				    	$allDayes = array();
				    	if(isset($volunteer)) {
				    		$allDayes = unserialize($volunteer['dayes']);
				    	}
				    	foreach ($dayes as $key => $value) { 
				    		$checked = '';
                            if(in_array($key,$allDayes)) {
                                $checked = 'checked';
                            }
				    	?>
				    	<input type="checkbox" name="dayes[]" value="<?=$key?>" class="Radiotype" data-validation="validate_checkbox_group" data-validation-qty="1-<?=sizeof($dayes)?>" <?=$checked?>> <label><h6><?=$value?></h6></label>
				    	&emsp;&emsp;
				    	<? } ?>
				    </div>
			    </div>

			    <div class="col-md-12 padd">
					<div class="col-xs-2">
                    	<label class="label label-green half"> الفترات</label>
                    </div>
	                <div class="col-xs-9 r-input" style="padding-left: 0 !important">
				    	<?php 
				    	$allPeriods = array();
				    	if(isset($volunteer)) {
				    		$allPeriods = unserialize($volunteer['period']);
				    	}
				    	foreach ($period as $key => $value) { 
				    		$checked = '';
                            if(in_array($key,$allPeriods)) {
                                $checked = 'checked';
                            }
				    	?>
				    	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
				    	<input type="checkbox" name="period[]" value="<?=$key?>" class="Radiotype" data-validation="validate_checkbox_group" data-validation-qty="1-<?=sizeof($period)?>" <?=$checked?>> <label><h6><?=$value?></h6></label>
				    	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
				    	<? } ?>
				    </div>
			    </div>

			    <div class="form-group col-sm-12 col-xs-12">
			    	<h4 class="r-h4"> </h4>
			    	<div class="form-group col-sm-6 col-xs-12">
				      	<label class="label label-green half"> هل سبق لك التطوع لدى جهة خيرية ؟</label>
				      	<?php 
				      	foreach ($answer as $key => $value) { 
				      		$checked = '';
                            if(isset($volunteer) && $volunteer['another_charity'] == $key) {
                                $checked = 'checked';
                            }
				      	?>
				      		&emsp;&emsp;&emsp;
				      		<input type="radio" name="another_charity" value="<?=$key?>" data-validation="required" onclick="changeReadonly($(this).val(),'charity')" style="margin-top: 10px" <?=$checked?>> <label><h6><?=$value?></h6></label>
				      		&emsp;&emsp;&emsp;&emsp;
				      	<? } ?>
				    </div>

				    <div class="form-group col-sm-6 col-xs-12">
				      	<label class="label label-green half"> إذا كانت الإجابة <strong>بنعم </strong>الرجاء تحديد الجهة</label>
				      	<input type="text" name="charity" id="charity" value="<?php if(isset($volunteer)) echo $volunteer['charity'] ?>" class="form-control half input-style" data-validation="<?=$required1?>" <?=$readonly1?>>
				    </div>
				</div>

				<div class="form-group col-sm-12 col-xs-12">
				    <div class="form-group col-sm-6 col-xs-12">
				      	<label class="label label-green half"> هل لديك إعاقة ؟</label>
				      	<?php 
				      	foreach ($answer as $key => $value) { 
				      		$checked = '';
                            if(isset($volunteer) && $volunteer['having_disability'] == $key) {
                                $checked = 'checked';
                            }
				      	?>
				      		&emsp;&emsp;&emsp;
				      		<input type="radio" name="having_disability" value="<?=$key?>" data-validation="required" onclick="changeReadonly($(this).val(),'disability')" style="margin-top: 10px" <?=$checked?>> <label><h6><?=$value?></h6></label>
				      		&emsp;&emsp;&emsp;&emsp;
				      	<? } ?>
				    </div>

				    <div class="form-group col-sm-6 col-xs-12">
				      	<label class="label label-green half">  إذا كانت الإجابة <strong>بنعم </strong>الرجاء تحديد نوع الإعاقة</label>
				      	<input type="text" name="disability" id="disability" value="<?php if(isset($volunteer)) echo $volunteer['disability'] ?>" class="form-control half input-style" data-validation="<?=$required2?>" <?=$readonly2?>>
				    </div>
			    </div>

			    <div class="form-group col-sm-12 col-xs-12">
		            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5" <?=$disabled?>><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function changeReadonly(val,id) {
		var obj =document.getElementById(id);
		if(val == 1) {
			obj.readOnly = false;
			obj.setAttribute('data-validation','required');
		}
		else {
			obj.readOnly = true;
			obj.removeAttribute('data-validation');
			obj.value = '';
		}
	}

	function checkUnique(argument) {
		var dataString = 'id_card=' + argument;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Volunteers/Volunteers/checkUnique',
            data:dataString,
            cache:false,
            success: function(result){
                var obj = JSON.parse(result);
                console.log(obj);
                if(obj === null) {
                	document.getElementById('checkUnique').innerHTML = 'رقم الهوية جديد';
                	$('.btn-purple').removeAttr('disabled');
                }
                else {
                	document.getElementById('checkUnique').innerHTML = 'تم إدخال رقم الهوية من قبل';
                	$('.btn-purple').attr('disabled','disabled');
                }
            }
        });
	}
</script>