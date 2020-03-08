<?php 

if(isset($record) && $record !=null){
       
          $device_id_fk=$record['device_id_fk'];
          $number=$record['number'];
          $notes=$record['notes'];
          $img=$record['img'];//
          $button_name ='edit_maintenance_electrical_device';
          $button_title='تعديل';
          $validation= '';
        
}else{
         
          $device_id_fk="";
          $number='';
          $notes='';//
          $img='';
          $button_name ='add_maintenance_electrical_device';
          $button_title='حفظ';
         $validation= 'data-validation="required"';
}
     ?>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
	<div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half"> نوع الجهاز</label>
		<select name="device_id_fk" id="device_id_fk" class="form-control half" data-validation="required">
			<option value="">إختر</option>
			<?php
			if(isset($devices_type) && $devices_type != null) {
				foreach ($devices_type as $value) {
				    $selected="";if($value->id_setting== $device_id_fk){$selected="selected";}  
			?>
			<option value="<?=$value->id_setting?>" <?php echo $selected;?>><?=$value->title_setting?></option>
			<?
				}
			}
			?>
		</select>
	</div>

	<div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">العدد</label>
		<input type="number" id="number" name="number" placeholder="العدد" value="<?php echo $number?>" class="form-control half input-style" onkeypress="return isNumberKey(event)" data-validation="required">
	</div>
	<div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">ملاحظات</label>
        <textarea name="notes" id="" class="form-control half"  data-validation="required" >
        <?php echo $notes?>
        </textarea>
		
	</div>
    
    <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">صوره الجهاز</label>
		<input type="file" id="img" name="img" class="form-control half input-style" <?=$validation?> >
        <small class="small">من فضلك أرفق ملف صورة</small>

    </div>
    <div class="form-group col-sm-6 col-xs-12 padd">
    	<?php
    if($img !=''){ ?>
        <a href="<?=base_url().'services_orders/Services_orders/download/'.$img?>">
         <img id="blah" src="<?=base_url('uploads/images/'.$img)?>" class="img-rounded" style="    width: 24%;margin-top: -1px;margin-right: 253px;">
       </a>
    <?php }else{
        
    }
     ?>
    </div>
    <div class="form-group col-sm-6 col-xs-12 padd">
 </div>
</div>

<div class="form-group col-sm-12 col-xs-12">
    <button type="submit" name="<?=$button_name?>" value="<?=$button_title?>" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$button_title?> </button>
</div>