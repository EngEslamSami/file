<style type="text/css">
	.small{
	    position: absolute;
	    bottom: -7px;
	    right: 50%;
	    font-size: 10px;
	}
</style>

<?php  
$answer = array(1=>'نعم',2=>'لا');
$type = array(1=>'هوية وطنية',2=>'إقامة',3=>'وثيقة',4=>'جواز سفر');
$files = array('بطاقة العائلة	'=>'family_card','عقد النكاح	'=>'identity_img','صورة الهوية	'=>'marriage_contract','الصورة الشخصية	'=>'personal_picture','عقد القاعة	'=>'hall_contract','تعريف بالراتب	'=>'salary_definition','تزكية الامام	'=>'imam_recommendation');
?>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> الاسم</label>
		<select name="child_id_fk" id="child_id_fk" class="form-control half" data-validation="required">
			<option value="">إختر</option>
			<?php
			if (isset($children) && $children != null) {
				foreach ($children as $value) {
					$select = '';
					if(isset($record) && $record['child_id_fk'] == $value->id) {
						$select = 'selected';
					}
			?>
			<option value="<?=$value->id?>" <?=$select?>><?=$value->member_full_name?></option>
			<?
				}
			}
			?>
		</select>
	</div>

	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> المدينة</label>
		<select name="city_id_fk" id="city_id_fk" class="form-control half" data-validation="required">
			<option value="">إختر</option>
			<?php
			if (isset($areas) && $areas != null) {
				foreach ($areas as $value) {
					$select = '';
					if(isset($record) && $record['city_id_fk'] == $value->id_setting) {
						$select = 'selected';
					}
			?>
			<option value="<?=$value->id_setting?>" <?=$select?>><?=$value->title_setting?></option>
			<?
				}
			}
			?>
		</select>
	</div>

	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> مكان الزواج</label>
		<input type="text" id="place" name="place" placeholder="مكان الزواج" class="form-control half input-style" value="<?php if(isset($record)) echo $record['place'] ?>" data-validation="required">
	</div>
</div>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> تاريخ الزواج</label>
		<input type="text" id="marriage_date" name="marriage_date" placeholder="تاريخ الزواج" class="form-control half input-style docs-date" data-validation="required" value="<?php if(isset($record)) echo $record['marriage_date'] ?>" autocomplete="off">
	</div>

	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> رقم العقد</label>
		<input type="text" id="contract_number" name="contract_number" placeholder="رقم العقد" class="form-control half input-style" value="<?php if(isset($record)) echo $record['contract_number'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	</div>

	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> تاريخ العقد</label>
		<input type="text" id="contract_date" name="contract_date" placeholder="تاريخ العقد" class="form-control half input-style docs-date" data-validation="required" value="<?php if(isset($record)) echo $record['contract_date'] ?>" autocomplete="off">
	</div>
</div>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> جهة اصدار العقد</label>
		<input type="text" id="contract_source" name="contract_source" placeholder="جهة اصدار العقد" class="form-control half input-style" value="<?php if(isset($record)) echo $record['contract_source'] ?>" data-validation="required">
	</div>

	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> قيمة المهر</label>
		<input type="text" id="dowry_cost" name="dowry_cost" placeholder="قيمة المهر" class="form-control half input-style" value="<?php if(isset($record)) echo $record['dowry_cost'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	</div>

	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> جنسية الزوجة</label>
		<select name="nationality_id_fk" id="nationality_id_fk" class="form-control half" data-validation="required">
			<option value="">إختر</option>
			<?php
			if (isset($nationality) && $nationality != null) {
				foreach ($nationality as $value) {
					$select = '';
					if(isset($record) && $record['nationality_id_fk'] == $value->id_setting) {
						$select = 'selected';
					}
			?>
			<option value="<?=$value->id_setting?>" <?=$select?>><?=$value->title_setting?></option>
			<?
				}
			}
			?>
		</select>
	</div>
</div>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> رقم هوية الزوجة</label>
		<input type="text" id="national_id" name="national_id" placeholder="رقم هوية الزوجة" class="form-control half input-style" value="<?php if(isset($record)) echo $record['national_id'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	</div>

<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> نوع هوية الزوجة</label>
		<select name="national_type" id="national_type" class="form-control half" data-validation="required">
			<option value="">إختر</option>
			<?php
			if(isset($national_type) && $national_type != null) {
				foreach ($national_type as $value) {
					$select = '';
					if(isset($record) && $record['national_type'] == $value->id_setting) {
						$select = 'selected';
					}
			?>
			<option value="<?=$value->id_setting?>" <?=$select?>><?=$value->title_setting?></option>
			<?
				}
			}
			?>
		</select>
	</div>

	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> الزواج لاول مرة</label>
		<?php
		foreach ($answer as $key => $value) {
			$select = '';
			if(isset($record) && $record['first_marriage'] == $key) {
				$select = 'checked';
			}
		?>
		<input type="radio" name="first_marriage" value="<?=$key?>" data-validation="required" <?=$select?>> <?=$value?>&nbsp;&nbsp;&nbsp;
		<?
		}
		?>
	</div>
</div>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> رقم الجوال </label>
		<input type="text" id="mobile" name="mobile" placeholder="رقم الجوال " class="form-control half input-style" value="<?php if(isset($record)) echo $record['mobile'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	</div>
</div>

<table id="" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>#</th>
			<th>إسم الملف</th>
			<th>إرفاق الملف</th>
			<th>الصورة</th>
		</tr>
	</thead>
	</tr>
	<tbody>
		<?php 
		$x = 1;
		foreach ($files as $key => $value) {
		?>
			<tr>
				<td><?=($x++)?></td>
				<td><?=$key?></td>
				<td>
					<input type="file" name="<?=$value?>" accept="image/*" onchange="readURL(this, '<?=$value?>');">
					<samll>من فضلك أدخل ملف صورة</samll>
				</td>
				<td>
					<?php if(isset($record) && $record[$value] != null) { ?>
					<a href="<?=base_url().'services_orders/Services_orders/download/'.$record[$value]?>">
						<img id="blah<?=$value?>" src="<?=base_url().'uploads/images/'.$record[$value]?>" style="width: 50px; height: 50px">
					</a>
					<?php
					}
					else{
					?>
					<img id="blah<?=$value?>">
					<? } ?>
				</td>
			</tr>
		<? } ?>
	</tbody>
</table>

<div class="form-group col-sm-12 col-xs-12">
    <button type="submit" name="add_help" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
</div>

<script type="text/javascript">
	$('.docs-date').datetimepicker({
        locale: {calender: 'ummalqura', lang: 'ar'},
        format: 'DD/MM/YYYY'
    });

    $(function() {
        $.validate({
            validateHiddenInputs: true 
        });
    });

    function readURL(input, val) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah'+ val)
                    .attr('src', e.target.result)
                    .width(50)
                    .height(50);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>