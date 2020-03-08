<style type="text/css">
/*
.top-label {
    color: white;
    background-color: #428bcb;
    border: 2px solid #428bcb;
    border-radius: 0;
    margin-bottom: 0;
    width: 100%;
    display: block;
    padding: 2px 4px;
}
.bottom-input{
  width: 100%;
  border-radius: 0;
}
*/
</style>
<?php
if(isset($employee_data) && $employee_data != null){
    $disabled='';
    $head='';
}else{

    $disabled='disabled="disabled"';
    $head ='<h5 class="alert alert-danger">⁄›Ê« ⁄·Ìﬂ  ”ÃÌ· »Ì«‰«  «·„ÊŸ› «·„«·Ì… «Ê·« ... !!</h5>';
}

?>

<?php if(isset($all_links['contract_employe']) && $all_links['contract_employe']!=null){

    foreach($all_links['contract_employe'] as  $key=>$value){
        $result[$key]=$all_links['contract_employe'][$key];
    }
}else{
     foreach($all_field as $keys=>$value){
        $result[$all_field[$keys]]='';
     }
   
    }
$work_types=array("1"=>"› —…","2"=>"› — Ì‰");
$yes_no=array("1"=>"‰⁄„","2"=>"·«");
$paid_type=array("1"=>"‰ﬁœÌ","2"=>"‘Ìﬂ","3"=>" ÕÊÌ· »‰ﬂÌ");
?>
<div class="col-xs-12 " >

             
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
        <?=$head?>
        
			<?php echo form_open_multipart('human_resources/Human_resources/contractEmployee/'.$this->uri->segment(4).'');?>
			<div class="col-sm-12 col-xs-12">
				<div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">ﬂÊœ «·„ÊŸ›</label>
					<input type="text" name="emp_code"  readonly=""  value="<?php if($employee_data != null){ echo $employee_data['id'];  }else{}?>" class="form-control bottom-input"  />
				</div>
                   
                <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">≈”„ «·„ÊŸ›</label>
					<input type="text" name="emp_name"  readonly=""  value="<?php if($employee_data != null){ echo $employee_data['employee'];  }else{}?>" class="form-control  bottom-input"  />
				
                </div>
                <input type="hidden" name="emp_salary"  id="emp_salary"   value="<?php if($employee_data != null){ echo $employee_data['salary'];  }else{}?>" class="form-control  bottom-input"  />
                
            </div>
            <div class="col-sm-12 col-xs-12">
				<div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">≈Ì«„ «·⁄„· Œ·«· «·‘Â—<strong class="astric">*</strong> </label>
					<input type="number" name="num_days_in_month" id="num_days_in_month"  <?=$disabled?> value="<?php echo $result['num_days_in_month']?>" onkeyup="return load_price();" class="form-control bottom-input"  data-validation="required" />
				</div>
                   
                <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">”«⁄«  «·⁄„· <strong class="astric">*</strong></label>
					<input type="number" name="hours_work" id="hours_work"  <?=$disabled?> value="<?php echo $result['hours_work']?>" onkeyup="return load_price();" class="form-control  bottom-input" data-validation="required"  />
				
                </div>
                <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">√Ã— «·”«⁄… </label>
					<input type="number" name="hour_value" id="hour_value" readonly="readonly"  <?=$disabled?> value="<?php echo $result['hour_value']?>" class="form-control  bottom-input"  />
				
                </div>
               	<div class="form-group col-sm-3 col-xs-12">
				    <label class="label top-label">› —«  «·⁄„·<strong class="astric">*</strong> </label>
                    <select name="work_period_id_fk" <?=$disabled?> class="selectpicker no-padding form-control bottom-input" data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
                    <option value="">≈Œ — › —… «·⁄„· </option>
                    <?php
                    foreach($work_types as $key=>$value){
                    $selected = '';
				    if ($key == $result['work_period_id_fk']) {
				         $selected = 'selected';
							} ?>
                    <option value="<?=$key?>"<?=$selected?>><?=$value?></option>
                    <?php }
                    ?>
                    </select> 
               </div>
                
            </div>
           	<div class="col-sm-12 col-xs-12">
		    	<div class="form-group col-sm-3 col-xs-12">
				    <label class="label top-label">ÿ—Ìﬁ… œ›⁄ «·—« »<strong class="astric">*</strong> </label>
                    <select name="pay_method_id_fk" id="pay_method_id_fk"   <?=$disabled?> onchange="get_all($(this).val())" class="selectpicker no-padding form-control bottom-input" data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
                    <option value="">≈Œ — ÿ—Ìﬁ… «·œ›⁄ </option>
                    <?php
                    foreach($paid_type as $key=>$value){
                    $selected2 = '';
				    if ($key == $result['pay_method_id_fk']) {
				         $selected2 = 'selected';
							} ?>
                    <option value="<?=$key?>"<?=$selected2?>><?=$value?></option>
                    <?php } ?>
                    </select> 
               </div>
               <?php
                  if($result['pay_method_id_fk'] && $result['pay_method_id_fk'] == 1){
                        $disabl='disabled="disabled"';
                         $read ='readonly="readonly"';
                    }elseif($result['pay_method_id_fk'] == 2 || $result['pay_method_id_fk'] == 3){
                      $disabl =''; 
                      $read =''; 
                    }else{
                    $disabl='disabled="disabled"'; 
                    $read ='readonly="readonly"';    
                    }
                    ?>
               <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">≈”„ «·»‰ﬂ</label>
                    
                    <select name="bank_id_fk" id="bank_id_fk" <?=$disabl?> onchange="get_banck_code($(this).val())"  class="selectpicker no-padding form-control bottom-input" data-live-search="true"  >
                    <option value="">≈Œ — «·»‰ﬂ </option>
                    <?php
                    foreach($banks_data as $row){
                    $selected3 = '';
				    if ($row->id == $result['bank_id_fk']){
                        $selected3 = 'selected';
							} ?>
                    <option value="<?=$row->id.'-'.$row->bank_code?>"<?=$selected3?>><?=$row->ar_name?></option>
                    <?php } ?>
                    </select> 
                </div>
                
                <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">—„“ «·»‰ﬂ</label>
					<input  name="" id="bank_code"  readonly="readonly"   value="<?php  if($result['bank_id_fk'] != 0){ echo $banks_data[$result['bank_id_fk']]->bank_code;}?>" class="form-control  bottom-input"  />
				
                </div>
                
                <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">—ﬁ„ «·Õ”«»</label>
					<input type="number" name="bank_account_num" <?=$read?>  id="bank_account_num" maxlength="24" minlength="24"  value="<?php echo $result['bank_account_num'];?>" onfocusout="length_hesab_wakeel($(this).val());" class="form-control  bottom-input"  />
			     	 <small style="color: red;;">—ﬁ„ «·Õ”«» ·«»œ √‰ ÌﬂÊ‰ 24 —ﬁ„</small>
                </div>
                
            </div>
            <div class="col-sm-12 col-xs-12">
		    	<div class="form-group col-sm-3 col-xs-12">
				    <label class="label top-label">«·√Ã«“… «·”‰ÊÌ…<strong class="astric">*</strong> </label>
                   <input type="number" name="year_vacation_num"  id="year_vacation_num" value="<?php echo $result['year_vacation_num'];?>"   class="form-control  bottom-input"  data-validation="required"  />
               </div>
               <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">«·„œ… «·„” Õﬁ… ⁄‰Â«</label>
                    <input type="number" name="year_vacation_period" id="year_vacation_period" value="<?php echo $result['year_vacation_period'];?>"    class=" form-control bottom-input" data-validation="required"   >
                   
                </div>
                
                <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">«·√Ã«“… «·«÷ÿ—«—Ì…</label>
					<input type="number" name="casual_vacation_num" id="casual_vacation_num" value="<?php echo $result['casual_vacation_num'];?>"   class="form-control  bottom-input" data-validation="required"   />
				
                </div>
                <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label"> –«ﬂ— ”›—</label>
					<select name="travel_ticket" id="travel_ticket" <?=$disabled?> onchange="get_all_ticket($(this).val())" class="selectpicker no-padding form-control bottom-input" data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
                    <option value="">≈Œ — </option>
                    <?php
                    foreach($yes_no as $key=>$value){
                    $selected4 = '';
				    if ($key == $result['travel_ticket']) {
				         $selected4 = 'selected';
							} ?>
                    <option value="<?=$key?>"<?=$selected4?>><?=$value?></option>
                    <?php } ?>
                    </select>
                </div>
 
            </div> 
             <?php
                  if($result['travel_ticket'] && $result['travel_ticket'] == 2){
                        $disabl2='disabled="disabled"';
                         $read2 ='readonly="readonly"';
                    }elseif($result['travel_ticket'] == 1){
                      $disabl2 =''; 
                      $read2 =''; 
                    }else{
                    $disabl2='disabled="disabled"'; 
                    $read2 ='readonly="readonly"';    
                    }
                    ?>
       
       
       <div class="col-sm-12 col-xs-12">
		    	<div class="form-group col-sm-3 col-xs-12">
				    <label class="label top-label">‰Ê⁄ «· –ﬂ—…<strong class="astric">*</strong> </label>
                  <select name="travel_type_fk" id="travel_type_fk" <?=$disabl2?>  class="selectpicker no-padding form-control bottom-input" data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
                    <option value="">≈Œ — </option>
                    <?php
                    foreach($tickets as $row2){
                    $selected5 = '';
				    if ($row2->id_setting == $result['travel_type_fk']) {
				         $selected5 = 'selected';
							} ?>
                    <option value="<?=$row2->id_setting?>"<?=$selected5?>><?=$row2->title_setting?></option>
                    <?php } ?>
                    </select>
               </div>
               <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label"> ÕœÌœ «·„œ… </label>
                    <input type="number" name="travel_period" <?=$read2?> id="travel_period" value="<?php echo $result['travel_period'];?>"    class=" form-control bottom-input"  >
                   
                </div>
                
                <div class="form-group col-sm-3 col-xs-12">
					<label class="label top-label">„ﬂ«›√… ‰Â«Ì… «·Œœ„…</label>
					<select name="reward_end_work" id="reward_end_work" <?=$disabled?> class="selectpicker no-padding form-control bottom-input" data-show-subtext="true" data-live-search="true" data-validation="required"  >
                    <option value="">≈Œ — </option>
                    <?php
                    foreach($yes_no as $key=>$value){
                    $selected6 = '';
				    if ($key == $result['reward_end_work']) {
				         $selected6 = 'selected';
							} ?>
                    <option value="<?=$key?>"<?=$selected6?>><?=$value?></option>
                    <?php } ?>
                    </select>
                </div>
                
               
            </div> 
       
        <div class="col-xs-12">
          <input type="submit" name="add" id="buttons"  class="btn btn-blue btn-close" value="Õ›Ÿ"/>
			</div>
            <?php  echo form_close()?>
        <br/>
        <br/>
            
            
       </div>
       
       
        
   </div> 
</div>      

<script>
function load_price(){
   var salary = $('#emp_salary').val();
   var num_days_in_month = $('#num_days_in_month').val(); 
   var hours_work = $('#hours_work').val(); 
   if(salary !='' && num_days_in_month !='' && hours_work!=''){
    var hour_value = ((parseFloat(salary)/parseFloat(num_days_in_month))/parseFloat(hours_work));
   var hour_value_f = parseFloat(hour_value).toFixed(2);
    $('#hour_value').val(hour_value_f); 
   }
}

</script>



<script>
function get_all(valu){    
if(valu == 1){
$("#bank_id_fk").attr('disabled', 'disabled');

 $("#bank_id_fk option:selected").each(function () {
               $(this).removeAttr('selected'); 
               });
               
 $("#bank_id_fk").selectpicker('refresh'); 
$("#bank_account_num").prop("readonly", true);
$("#bank_id_fk").removeAttr('data-validation');
$("#bank_account_num").removeAttr('data-validation');  
$("#bank_account_num").val('');  
$("#bank_code").val('');    
}else{
$("#bank_id_fk").attr({'data-validation':"required"});
$("#bank_account_num").attr({'data-validation':"required"});        
$("#bank_id_fk").removeAttr('disabled');
$("#bank_id_fk").selectpicker('refresh'); 
$("#bank_account_num").prop("readonly", false);      
}
}
</script>



<script>
function get_all_ticket(valu){    
if(valu == 2){
 $("#travel_type_fk").attr('disabled', 'disabled');
 $("#travel_type_fk option:selected").each(function () {
               $(this).removeAttr('selected'); 
               });
$("#travel_type_fk").selectpicker('refresh'); 
$("#travel_period").prop("readonly", true); 
  $("#travel_period").removeAttr('data-validation');
$("#travel_type_fk").removeAttr('data-validation'); 
$("#travel_type_fk").val(''); 
$("#travel_period").val(''); 
 
  
}else{
    
$("#travel_period").attr({'data-validation':"required"});
$("#travel_type_fk").attr({'data-validation':"required"});    
$("#travel_type_fk").removeAttr('disabled');
$("#travel_type_fk").selectpicker('refresh'); 
$("#travel_period").prop("readonly", false);      
}
}
</script>
<script>
    function get_banck_code(valu)
    {
        var valu=valu.split("-");
        $('#bank_code').val(valu[1]);
    }
</script>
<script>

  function length_hesab_wakeel(length) {
        var len=length.length;
        if(len<24){
            alert(" —ﬁ„ «·Õ”«»  ·«»œ «·«Ìﬁ· ⁄‰ 24 Õ—› «Ê —ﬁ„");
        }
        if(len>24){
            alert(" —ﬁ„ «·Õ”«» ·«»œ √·« Ì“Ìœ ⁄‰ 24 Õ—› «Ê —ﬁ„");
            //  document.getElementById('register').setAttribute("disabled", "disabled");
        }
        if(len==24){
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
    }

</script>