<?php
$member_gender = array(0=>'الأم', 1=>'إبن', 2=>'إبنة');
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
		if(isset($childrens) && $childrens != null) {
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
		<? 		
			}
		} 
		?>
	</tbody>
</table>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> تاريخ السفر</label>
		<input type="text" id="travel_date" name="travel_date" placeholder="تاريخ السفر" class="form-control half input-style docs-date" data-validation="required" value="<?php if(isset($record)) echo $record['travel_date'] ?>" autocomplete="off">
	</div>

	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> عدد الايام</label>
		<input type="text" id="days_num" name="days_num" placeholder="عدد الايام" class="form-control half input-style" value="<?php if(isset($record)) echo $record['days_num'] ?>" data-validation="required" onkeypress="return isNumberKey(event)">
	</div>

	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> جهة العلاج</label>
		<input type="text" id="place" name="place" placeholder="جهة العلاج" class="form-control half input-style" value="<?php if(isset($record)) echo $record['place'] ?>" data-validation="required">
	</div>
</div>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> ارفاق اثبات الموعد</label>
		<input type="file" class="form-control half input-style" accept="image/*" name="img" onchange="readURL(this);">
		<small>من فضلك إرفق ملف صورة</small>
		<input type="hidden" id="img" name="img" value="<?php if(isset($record)) echo $record['img'] ?>">
	</div>

	<div class="form-group col-sm-4 col-xs-12 padd">
		<label class="label label-green half"> صورة الملف</label>
		<?php if(isset($record) && $record['img'] != null) { ?>
		<a href="<?=base_url().'services_orders/Services_orders/download/'.$record['img']?>">
			<img id="blah" src="<?=base_url().'uploads/images/'.$record['img']?>" style="width: 140px; height: 140px">
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
    <button type="submit" name="add_helthCare" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
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
</script>