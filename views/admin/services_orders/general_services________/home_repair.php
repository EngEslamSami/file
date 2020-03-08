<style>
.help-block.form-error{
    color: #a94442  !important;
    font-size: 15px !important;
    position: absolute !important;
    bottom: -23px !important ;
    right: 50% !important ;
}
</style>
<?php 

if(isset($record) && $record !=null){
       
          $repair_id_fk=$record['repair_id_fk'];
          $place=$record['place'];
          $img=$record['img'];//
          $button_name ='edit_home_repair';
          $button_title='تعديل';
          $validation= '';
        
}else{
         
          $repair_id_fk="";
          $place='';
          $img='';
          $button_name ='add_home_repair';
          $button_title='حفظ';
         $validation= 'data-validation="required"';
}
     ?>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
		<div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">مكان الصيانة</label>
		<input type="text" id="place" name="place" placeholder="مكان الصيانة" value="<?php echo $place?>" class="form-control half input-style"  data-validation="required">
    	</div>
    <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half"> نوع الإصلاح</label>
		<select name="repair_id_fk" id="repair_id_fk" class="form-control half" data-validation="required">
			<option value="">إختر</option>
			<?php
			if(isset($repair_type) && $repair_type != null) {
				foreach ($repair_type as $value) {
				    $selected="";if($value->id_setting== $repair_id_fk){$selected="selected";}  
			?>
			<option value="<?=$value->id_setting?>" <?php echo $selected;?>><?=$value->title_setting?></option>
			<?
				}
			}
			?>
		</select>
	</div> 
    <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">صورة مكان الصيانة</label>
		<input type="file" id="img" name="img" class="form-control half input-style" <?=$validation?> >
	<?php
    if($img !=''){ ?>
         <img id="blah" src="<?=base_url('uploads/images/'.$img)?>" class="img-rounded" style="width: 24%;margin-top: -50px;margin-right: 528px;">
    <?php }else{
        
    }
     ?>
    </div>

</div>

<div class="form-group col-sm-12 col-xs-12">
    <button type="submit" name="<?=$button_name?>" value="<?=$button_title?>" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$button_title?> </button>
</div>
