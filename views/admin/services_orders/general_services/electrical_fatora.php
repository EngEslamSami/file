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
       
          $fatora_num=$record['fatora_num'];
          $value=$record['value'];
          $fatora_date=$record['fatora_date'];
          $sanad_date=$record['sanad_date'];
          $img=$record['img'];//
          $button_name ='edit_electrical_fatora';
          $button_title='تعديل';
          $validation= '';
        
}else{
         
          $fatora_num="";
          $value='';
          $fatora_date='';//
          $sanad_date='';
          $img='';
          $button_name ='add_electrical_fatora';
          $button_title='حفظ';
         $validation= 'data-validation="required"';
}
     ?>

<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">

	<div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">رقم الفاتورة</label>
		<input type="number" id="fatora_num" name="fatora_num" placeholder="رقم الفاتورة" value="<?php echo $fatora_num?>" class="form-control half input-style" onkeypress="return isNumberKey(event)" data-validation="required">
	</div>
    
    <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">مبلغ الفاتورة</label>
		<input type="number" id="value" name="value" placeholder="مبلغ الفاتورة" value="<?php echo $value?>" class="form-control half input-style" onkeypress="return isNumberKey(event)" data-validation="required">
	</div>
    <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">تاريخ الفاتورة</label>
		<input type="text" id="fatora_date" name="fatora_date" value="<?php echo $fatora_date?>" placeholder="تاريخ الفاتورة" class="form-control half input-style docs-date" data-validation="required" autocomplete="off">
	</div>
   <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">تاريخ سند الدفع</label>
		<input type="text" id="sanad_date" name="sanad_date" value="<?php echo $sanad_date?>" placeholder="تاريخ الفاتورة" class="form-control half input-style docs-date" data-validation="required" autocomplete="off">
	</div>
    
    <div class="form-group col-sm-6 col-xs-12 padd">
		<label class="label label-green half">صورة الفاتورة</label>
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