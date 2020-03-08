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
		<label class="label label-green half"> نوع المرض</label>
		<input type="text" id="disease_type" name="disease_type" placeholder="نوع المرض" class="form-control half input-style" value="<?php if(isset($record)) echo $record['disease_type'] ?>" data-validation="required">
	</div>
</div>

<div class="form-group col-sm-12 col-xs-12">
    <button type="submit" name="add_medical" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
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
</script>