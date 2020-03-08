<?php
$member_gender = array(0=>'الأم', 1=>'إبن', 2=>'إبنة');
$type = array(1=>'دواء', 2=>'أجهزة طبية');
$script = 'onclick=\'return getMedDevice($(this).val(), '.json_encode($meds).', '.json_encode($devices).')\'';
?>
<table id="" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>#</th>
			<th>الإسم</th>
			<th>التفاصيل</th>
		</tr>
	</thead>
	</tr>
	<tbody>
		<?php 
		foreach ($childrens as $value) {
			$checked = '';
			$idVal = $value->memberID;
			if($value->type == 2) {
				$idVal = 0;
			}
			if(isset($acceptedChildren) && $acceptedChildren != null) {
				foreach ($acceptedChildren as $accepted) {
					if($idVal == $accepted->child_id_fk){
						$checked = 'checked';
					}
				}
			}
		?>
			<tr>
				<td>
					<input type="checkbox" name="child_id_fk[]" value="<?=$idVal?>" class="Radiotype" data-validation="validate_checkbox_group" data-validation-qty="1-<?=sizeof($childrens)?>" <?=$checked?>>
				</td>
				<td><?=$value->memberName?></td>
				<td><?=$member_gender[$value->gender]?></td>
			</tr>
		<? } ?>
	</tbody>
</table>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> دواء / أجهزة طبية</label>
		<?php
		foreach ($type as $key => $value) {
			$checked = '';
			if(isset($record) && $record['type'] == $key) {
				$checked = 'checked';
			}
		?>
		<input type="radio" name="type" value="<?=$key?>" <?=$checked?> <?=$script?>> <?=$value?> 
		&nbsp;&nbsp;&nbsp;
		<? } ?>
	</div>

	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> إسم الدواء أو الجهاز</label>
		<select class="form-control half" name="device_medical_id_fk" id="device_medical_id_fk" data-validation="required">
			<option value="">--إختر--</option>
			<?php
			if(isset($record) && $record['type'] == 1){
				foreach ($meds as $value) {
					$selected = '';
					if($record['device_medical_id_fk'] == $value->id_setting) {
						$selected = 'selected';
					}
			?>
			<option value="<?=$value->id_setting?>" <?=$selected?>><?=$value->title_setting?></option>
			<?		
				}
			}
			?>
		</select>
	</div>

	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> ارفاق ملف</label>
		<input type="file" class="form-control half input-style" accept="image/*" name="file" onchange="readURL(this);">
		<input type="hidden" name="file" value="<?php if(isset($record)) echo $record['file'] ?>">
	</div>
</div>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> صورة الملف</label>
		<?php if(isset($record) && $record['file'] != null) { ?>
		<a href="<?=base_url().'services_orders/Services_orders/download/'.$record['file']?>">
			<img id="blah" src="<?=base_url().'uploads/images/'.$record['file']?>" style="width: 140px; height: 140px">
		</a>
		<?php
		}
		else{
		?>
		<img id="blah" class="img-rounded">
		<? } ?>
	</div>
</div>

<div class="form-group col-sm-12 col-xs-12">
	<input type="hidden" name="order_num" value="<?php if(isset($record)) echo $record['order_num'] ?>">
    <button type="submit" name="add_insurance" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
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

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(140)
                    .height(140);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function getMedDevice(val,meds,devices) {
        var select = document.getElementById('device_medical_id_fk');
        removeOptions(select);
        select.options[select.options.length] = new Option('إختر', '');
        if (val == 1) {
        	for (var i = 0; i < meds.length; i++) {
        		select.options[select.options.length] = new Option(meds[i].title_setting, meds[i].id_setting);
        	}
        }
        else {
        	for (var i = 0; i < devices.length; i++) {
        		select.options[select.options.length] = new Option(devices[i].title_setting, devices[i].id_setting);
        	}
        }
    }
</script>