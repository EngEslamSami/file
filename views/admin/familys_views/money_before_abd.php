<style>
.inner-heading {
    background-color: #9ed6f3;
    padding: 10px;
}
.pop-text{
    background-color: #009688;
    color: #fff;
    padding: 7px;
    font-size: 14px;
    margin-bottom: 3px;
    margin-top: 3px;
}
.pop-text1{
    background-color:#eee;
     padding: 7px;
      font-size: 14px;
      margin-bottom: 3px;
       margin-top: 3px;
}
.pop-title-text{
    margin-top: 4px;
    margin-bottom: 4px;
    padding: 6px;
    background-color: #9ed6f3;
}
.span-validation{
    color: rgb(255, 0, 0);
    font-size: 12px;
    position: absolute;
    bottom: -10px;
    right: 50%;
}
.astric{
    color: red;
    font-size: 25px;
    position: absolute;
}
.help-block.form-error{
    color: #a94442  !important;
    font-size: 11px !important;
    position: absolute !important;
    bottom: -23px !important ;
    right: 50% !important ;
}
</style>
<?php if(isset($all_links['financial']) && $all_links['financial']!=null){
 
    foreach($all_links['financial'] as  $key=>$value){
        $result[$key]=$all_links['financial'][$key];
    }
   
}else{
     foreach($all_field as $keys=>$value){
        $result[$all_field[$keys]]='';     
     }   
    }
    $arr_yes_no=array('','نعم','لا');
?>
<div class="col-xs-12 fadeInUp wow" >

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
       <?php echo form_open_multipart("family_controllers/Family/money/".$this->uri->segment(4))?>
                <div class="col-sm-12 col-xs-12">
				<div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">رقم السجل المدني للأم<strong class="astric">*</strong> </label>
					<input type="text" name="mother_national_num_fk"  readonly="" data-validation="required"  value="<?php echo $this->uri->segment(4);?>" class="form-control half input-style"  />
				</div>
                
                <div class="form-group col-sm-4 col-xs-12">
					<label class="label label-green  half">إسم الأم  بالكامل<strong class="astric">*</strong> </label>
					<input type="text" name="m_first_name"  readonly="" data-validation="required"  value="<?php echo $mother_full_name;?>" class="form-control half input-style"  />
				</div>
				</div>  
              <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                <label class="label label-green  half"> مبلغ التقاعد <strong class="astric">*</strong> </label>
                <input type="number" name="f_pension_amount" data-validation="number" value="<?php echo $result['f_pension_amount']?>"  class="form-control half input-style"/>
                </div>
            
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مبلغ الضمان<strong class="astric">*</strong> </label>
                    <input type="number" name="f_warranty_amount" data-validation="number" value="<?php echo $result['f_warranty_amount']?>"  class="form-control half input-style" /> 
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مقدار العادة السنوية<strong class="astric">*</strong> </label>            
                     <input type="number" name="f_annual_amount" value="<?php echo $result['f_annual_amount']?>"  class="form-control half input-style" /> 
                </div>
               
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مبلغ التأمينات<strong class="astric">*</strong><strong></strong> </label>
                     <input type="number" name="f_insurance_amount" data-validation="number" value="<?php echo $result['f_insurance_amount']?>"  class="form-control half input-style" />
                </div>
                 
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عمالة<strong class="astric">*</strong><strong></strong> </label>
                    <select  id="loan" name="f_workers_id_fk" class="selectpicker form-control half no-padding"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                    		<option value="">اختر</option>
						<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
						  $selected='';if($r==$result['f_workers_id_fk']){$selected='selected';}
						?>
                        <option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
						<?php }?>
		           </select>
	          	
               </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد العمال<strong class="astric">*</strong><strong></strong> </label>
                    <?php
                    
                    if($result['f_workers_num'] == ''){
                       $disabled='disabled=""';
                    }else{
                        $disabled='';
                    } 
                     ?>
                    <input type="number" name="f_workers_num" value="<?php echo $result['f_workers_num']?>" class="form-control half no-padding" placeholder="عدد العمال" style="width: 25%;" id="loan-cost" <?=$disabled?>  />
               </div>
               
               
               <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مبالغ أخرى<strong class="astric">*</strong><strong></strong> </label>
                    <input type="number" name="f_other_amount" value="<?php echo $result['f_other_amount']?>"  class="form-control half input-style" />
               </div>
               
                <div class="form-group col-sm-4 col-xs-12">
                <label class="label label-green  half">إسم البنك<strong class="astric">*</strong><strong></strong> </label>         
               <select  name="f_bank_id_fk" class="selectpicker form-group no-padding form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
            	<option value="">--اختر إسم البنك--</option>
                            <?php foreach($all_banks as $record):
                            $selected='';if($record->id == $result['f_bank_id_fk']){$selected='selected';}?>
                            	<option value="<?php echo $record->id ?>" <?php echo $selected?>  ><?php echo $record->title ?></option>
                                <?php endforeach;?>
							</select>
                 </div>
                
 <div class="form-group col-sm-4 col-xs-12" >
 <label class="label label-green  half ">الإسم المعتمد للحساب <strong class="astric">*</strong><strong></strong> </label>         
 <input type="text" name="f_official_account_name" value="<?php echo $result['f_official_account_name']?>" class="form-control half input-style" data-validation="required"  aria-required="true" />	
 </div>
 
<div class="form-group col-sm-4 col-xs-12" >
<label class="label label-green  half">نشاط تجارى<strong class="astric">*</strong><strong></strong> </label>         
<select  name="f_commerical_activity_id_fk" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
<option value="">اختر</option>
<?php for($r=1;$r<sizeof($arr_yes_no);$r++){
$selected='';if($r==$result['f_commerical_activity_id_fk']){$selected='selected';}
?>
<option value="<?php echo $r ;?>"  <?php echo $selected?>  ><?php echo $arr_yes_no[$r];?> </option>
<?php }?>
</select>
</div>

<div class="form-group col-sm-4 col-xs-12" >
<label class="label label-green  half ">رقم الحساب <strong class="astric">*</strong><strong></strong> </label>	
<input type="text" name="f_bank_account_num" data-validation="required" value="<?php echo $result['f_bank_account_num']?>"  class="form-control half input-style" />
</div>
                  
</div>
  <!------------------------------------>
     <div class="col-xs-12">
     
     <?php  if(isset($all_links['financial']) && $all_links['financial']!=null):
                $input_name1='update';
                else:  $input_name1='add'; endif; ?>    
     
    	<input type="submit" name="<?php echo $input_name1?>" class="btn btn-blue btn-next"  value="حفظ " />
 	</div>
    <?php  echo form_close()?>
    <br/>
    <br/>      
</div>
</div>
</div>
	<script>
		document.getElementById("loan").onchange = function () {

			if (this.value == '1')
				document.getElementById("loan-cost").removeAttribute("disabled", "disabled");
			else{
				document.getElementById("loan-cost").setAttribute("disabled", "disabled");
                $("#loan-cost").val("")
			}
		};
	
	</script>