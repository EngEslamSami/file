<?php 
if(isset($record) && $record !=null){
       
          $restore_id_fk=$record['restore_id_fk'];
          $place=$record['place'];
          $img=$record['img'];//
          $button_name ='edit_restore_repair';
          $button_title='تعديل';
          $validation= '';
        
}else{
         
          $restore_id_fk="";
          $place='';
          $img='';
          $button_name ='add_restore_repair';
          $button_title='حفظ';
          $validation= 'data-validation="required"';
}
     ?>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
		<div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">مكان الترميم</label>
		<input type="text" id="place" name="place" placeholder="مكان الترميم" value="<?php echo $place?>" class="form-control half input-style"  data-validation="required">
    	</div>
    <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">نوع الترميم</label>
		<select name="restore_id_fk" id="restore_id_fk" class="form-control half" data-validation="required">
			<option value="">إختر</option>
			<?php
			if(isset($repair_type) && $repair_type != null) {
				foreach ($repair_type as $value) {
				    $selected="";if($value->id_setting== $restore_id_fk){$selected="selected";}  
			?>
			<option value="<?=$value->id_setting?>" <?php echo $selected;?>><?=$value->title_setting?></option>
			<?
				}
			}
			?>
		</select>
	</div> 
    <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">صورة مكان الترميم</label>
		<input type="file" id="img" name="img" class="form-control half input-style" <?=$validation?> >
        <small class="small">من فضلك أرفق ملف صورة</small>

    </div>
       <div class="form-group col-sm-6 col-xs-12 padd">
    	<?php
    if($img !=''){ ?>
         <a href="<?=base_url().'services_orders/Services_orders/download/'.$img?>">
         <img id="blah" src="<?=base_url('uploads/images/'.$img)?>" class="img-rounded" style="width: 24%;">
        </a>
    <?php }else{
    
    }
     ?>
</div>
</div>

<div class="form-group col-sm-12 col-xs-12">
    <button type="submit" name="<?=$button_name?>" value="<?=$button_title?>" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$button_title?> </button>
</div>
