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
       
          $owner_name=$record['owner_name'];
          $namee=$record['p_name'];
          $problem=$record['problem'];
          $car_form_num=$record['car_form_num'];
          $repair_law_file=$record['repair_law_file'];//
          $img_form=$record['img_form'];
          $button_name ='edit_cars_repairs';
          $button_title='تعديل';
          $validation= '';
        
}else{
         
          $owner_name="";
          $namee="";
          $problem='';
          $car_form_num='';
          $repair_law_file='';
          $img_form='';
          $button_name ='add_cars_repairs';
          $button_title='حفظ';
         $validation= 'data-validation="required"';
}
     ?>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">

 <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">اسم القريب</label>
		<input type="text" id="p_name" name="p_name" placeholder="اسم القريب" value="<?php echo $namee?>" class="form-control half input-style"  data-validation="required">
	</div>
    <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">اسم صاحب السيارة</label>
		<input type="text" id="owner_name" name="owner_name" placeholder="اسم صاحب السيارة" value="<?php echo $owner_name?>" class="form-control half input-style"  data-validation="required">
	</div>
    
    <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">وصف المشكلة</label>
		<input type="text" id="problem" name="problem" placeholder="وصف المشكلة" value="<?php echo $problem?>" class="form-control half input-style"  data-validation="required">
	</div>
    
 <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">رقم استمارة السيارة</label>
		<input type="number" id="car_form_num" name="car_form_num" placeholder="رقم استمارة السيارة" value="<?php echo $car_form_num?>" class="form-control half input-style" onkeypress="return isNumberKey(event)" data-validation="required">
	</div>
    
    <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">قانون الاصلاح</label>
		<input type="file" id="repair_law_file" name="repair_law_file" accept="application/pdf,application/vnd.ms-excel" class="form-control half input-style" <?=$validation?> >
	<?php
    if($repair_law_file !=''){ ?>
    <a href="<?php echo base_url('services_orders/Services_orders/download_file/'.$repair_law_file) ?>"><i class="fa fa-download" aria-hidden="true"></i></a> /
    <a href="<?php echo base_url('services_orders/Services_orders/read_file/'.$repair_law_file); ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                 
    
    <?php }else{
        
    }
     ?>
    </div>
      <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">صورة استمارة السيارة</label>
		<input type="file" id="img_form" name="img_form" class="form-control half input-style" <?=$validation?> >
	<?php
    if($img_form !=''){ ?>
         <img id="blah" src="<?=base_url('uploads/files/'.$img_form)?>" class="img-rounded" style="    width: 24%;margin-top: -1px;margin-right: 253px;">
    <?php }else{
        
    }
     ?>
    </div>

</div>

<div class="form-group col-sm-12 col-xs-12">
    <button type="submit" name="<?=$button_name?>" value="<?=$button_title?>" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$button_title?> </button>
</div>