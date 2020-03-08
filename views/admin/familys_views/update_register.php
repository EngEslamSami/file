
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
</style>
<?php 
/*
echo '<pre>';
print_r($result);
echo '<pre>';*/
if(isset($result) && $result!=null){
           $form= form_open_multipart("family_controllers/Family/update_register_2/".$result->id);
          $mother_national_num=$result->mother_national_num;
          $user_name=$result->user_name;
          $mother_mob=$result->mother_mob;
          $register_place = $result->register_place;
          $validation ='';
          $button ='تعديل ';
        $update_date = $result->file_update_date; 
        $peroid_update  = $result->peroid_update; 
          
              /***************zidan*/
    $bank_account_num=$result->bank_account_num;
    $file_num=$file_num+1;
    $date= $result->date_suspend;
    /***************zidan*/
      $bank_ramz = $result->bank_ramz;        
              /***************ahmed*/

    $person_response=$result->person_response;
    $person_account=$result->person_account;
    $agent_name=$result->agent_name;
    $agent_card=$result->agent_card;
    $agent_mob=$result->agent_mob;
    $agent_relationship=$result->agent_relationship;
    $agent_bank_account=$result->agent_bank_account;
    $bank_account_id=$result->bank_account_id;
    $agent_card_source=$result->agent_card_source;
    $disabl = 'disabled';
     $opption_select = ' <option value="0">اختر</option>';
    
    /***************ahmed*/
         
     }else{
          $form= form_open_multipart("family_controllers/Family/update_register_2");
          $mother_national_num="";
          $user_name='';
              /***************zidan*/
    $file_num="0";
    $date= '';
    /***************zidan*/
          $mother_mob='';
          $validation ='';//data-validation="required"
          $button ='حفظ';
     $disabl = '';     
              /***************ahmed*/
    $bank_account_num='';

    $person_response='';
    $person_account='';
    $agent_name='';
    $agent_card='';
    $agent_mob='';
    $agent_relationship='';
    $agent_bank_account='';
    $bank_account_id='';
    $agent_card_source='';
    /***************ahmed*/
   $register_place ='';   
   $bank_ramz = ''; 
     $update_date = '';    
    $peroid_update ='';      
       $opption_select ='';    
     }
?>


<div class="col-xs-12 fadeInUp wow" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php //echo $title?> </h3>
        </div>
        <div class="panel-body">




<?php if($person_response == 0 ) {  ?> 

<div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs">
                     <?php if($person_response == 0){ ?>
                     
                       <li class="active"><a href="#tab1" data-toggle="tab">مقدم الطلب عن طريق الأم </a></li>
                     <?php }elseif($person_response == 1){ ?>
                       <li class="active"><a href="#tab2" data-toggle="tab">طلب وكيل الأسرة</a></li>
                     <?php } ?>
                      
                      
                     </ul>
                     <!-- Tab panels -->
                     <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab1">
                           <div class="panel-body">
                         
                         
       <?php echo $form;?>
             <div class="col-sm-12">
                <h6 class="text-center inner-heading"> البيانات الاساسية </h6>
            </div>

            <div class="col-sm-12 col-xs-12">
           <!-- 
                <div class="form-group col-sm-4 col-xs-12">
                    <?php $arr_response =array('أم','وكيل');?>
                    <label class="label label-green  half">مقدم الطلب</label>
                    <?php  for ($d=0;$d<sizeof($arr_response);$d++){ $check=''; if($person_response ==$d){$check='checked';}?>
                    <input tabindex="11" type="radio" value="<?php echo $d;?>" <?php echo $disabl;  ?> name="person_response" style="margin-right: 10px" onclick="getPerson_response(<?php echo $d;?>);" <?php echo $check;?>>
                    <label for="square-radio-1"><?php echo $arr_response[$d];?></label>
                    <?php } ?>
                </div>
                   <div class="form-group col-sm-4 col-xs-12">
               <label class="label label-green  half"> رقم الملف  <strong class="astric">*</strong> </label>
                <input type="text" readonly="readonly" class="form-control half input-style"  name="file_num" value="<?php echo $file_num;?>"

                 id="file_num"   <?=$validation?> />

                </div>
                <div class="form-group col-sm-4 col-xs-12" <?php if($mother_national_num=='' &&empty($mother_national_num)){?> style="display: none;" <?php } ?>>
                    <label class="label label-green  half"> تاريخ اعتماد الملف  <strong class="astric">*</strong> </label>
                    <input type="date" class="form-control half input-style "  name="date_suspend" value="<?php echo $date;?>"   id="date_suspend"   name="date_suspend"  <?=$validation?> />

                </div>
                <div class="form-group col-sm-4 col-xs-12" <?php if($mother_national_num=='' &&empty($mother_national_num)){?> style="display: none;" <?php } ?> >
                    <label class="label label-green  half"> فتره التحديث <strong class="astric">*</strong> </label>
                  <select id="peroid_update" name="peroid_update" class="form-control half input-style" onchange="get_peroid($(this).val());">
                     
                     <?php echo $opption_select; ?>
                      
                        <?php
                          if(isset($all_options)&&!empty($all_options)) {
                        foreach ($all_options as $row2):
                        $selected='';if($row2->id == $peroid_update){$selected='selected';}	?>
                        <option value="<?php  echo $row2->num_of_day;?>" <?php echo $selected?> >
                           <?php  echo $row2->title;?></option>
                      
                   
                        <?php  endforeach; } ?>
                      
                      
                      <?php
                      /*
                      if(isset($all_options)&&!empty($all_options)) {
                          foreach ($all_options as $row) {
                              ?>
                              <option value="<?php echo $row->num_of_day;?>"> <?php echo $row->title;?> </option>

                              <?php
                          }
                      }*/
                      ?>


                  </select>

                </div>
                <div class="form-group col-sm-4 col-xs-12" <?php 
                   if($mother_national_num=='' &&empty($mother_national_num)){?> style="display: none;" <?php } ?>>
                    <label class="label label-green  half"> تاريخ التحديث<strong class="astric">*</strong> </label>
                    <input type="date" class="form-control half input-style"  name="update_date"
                     value="<?= $update_date?>" readonly="readonly"  
                       id="update_date"   <?=$validation?> />

                </div>
                -->
                
               <div class="form-group col-sm-4 col-xs-12">
               <label class="label label-green  half"> رقم السجل المدني  <strong class="astric">*</strong> </label>
                <input type="text" class="form-control half input-style"  name="mother_national_num"
                 value="<?= $mother_national_num?>"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?> 
                   id="mother_national_num" onkeyup="return pass_name();" onkeypress="validate_number(event)" <?=$validation?> />
                  <span  id="optia2"  > </span> 
                  <span  id="lenth" class="span-validation"> </span>
                </div>
                <!--             ahmed   -->
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم المستخدم <strong class="astric">*</strong> </label>
                    
               <input  type="text" id="user_name" value="<?=$user_name?>"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?> class="form-control half input-style" placeholder="إسم المستخدم" name="user_name" readonly="readonly"/>
                <span  id="lenth" class="span-validation"> </span> 
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">كلمة المرور <strong class="astric">*</strong> </label>
                  <input type="password" id="user_pass" class="form-control half input-style"  
                  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>  
                  name="user_password" onkeyup="return valid();"  <?=$validation?> />
                  <span  id="validate1" class="span-validation"> </span>               
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تاكيد كلمة المرور <strong class="astric">*</strong><strong></strong> </label>
                  <input type="password"   id="user_pass_validate" class="form-control half input-style"  name="" 
                  onkeyup="return valid2();"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>  <?=$validation?> />
                  <span  id="validate" class="span-validation"> </span>             
                </div>
                
                  <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الجوال <strong class="astric">*</strong> </label>
                  <input type="text"  name="mother_mob" maxlength="10" id="mother_mob" value="<?=$mother_mob?>"  onkeyup="chek_len_mother_mob($(this).val());" onkeypress="validate_number(event)"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>   class="form-control half input-style "  <?=$validation?>/>
                  <span  id="lenth_mob" class="span-validation"></span>
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مقر التسجيل ( الفرع )<strong class="astric">*</strong></label>
                  <select name="register_place" class="selectpicker no-padding form-control choose-date form-control half" 
                  
                   <?php if($mother_national_num==''){?> data-validation="required" <?php }?> 
                   
                    data-show-subtext="true" data-live-search="true"  <?=$validation?>  aria-required="true">
                   <option value=""> اختر</option>
                  <?php
                        foreach ($socity_branch as $row2):
                        $selected='';if($row2->id == $register_place){$selected='selected';}	?>
                        <option value="<?php  echo $row2->id;?>" <?php echo $selected?> ><?php  echo $row2->title;?></option>
                        <?php  endforeach;?>
                     </select>
                  </div>
                <!--  
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
                    <select name="person_account" id="person_account"  <?php if($mother_national_num==''){?>
                        data-validation="required" <?php }?>  onchange="checkPerson_account();" class="form-control half">
                        <?php $yes_no=array('لا','نعم');?>
                        <option value="">إختر</option>
                        <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if( $person_account==$s){$select='selected'; }?>
                            <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم البنك<strong class="astric">*</strong><strong></strong> </label>
                    <select name="bank_account_id" id="bank_account_id1"  disabled="disabled"
                       <?php if($mother_national_num==''){?> data-validation="required" <?php }?> 
                         class="form-control half   "  <?php if($person_account==0){?> <?php } ?> 
                           onchange="get_banck_code($(this).val())">
                      
                        <option value="">إختر</option>
                        <?php 
                         if(!empty($banks)){
                            foreach ($banks as $bank){  $select=''; if($agent_bank_account ==0 && 
                                 $bank_account_id == $bank->id){$select='selected'; }?>
                                <option value="<?php echo $bank->id;?>-<?php echo $bank->bank_code;?>"
                                 <?php echo $select;?>><?php echo $bank->ar_name;?></option>
                            <?php }
                        } 
                        
       
                        
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12" >
                    <label class="label label-green  half">رمز البنك<strong class="astric">*</strong> </label>
                    <input type="text" class="form-control half input-style" 
                     name="bank_ramz"   value="<?= $bank_ramz?>" readonly="readonly"   id="om_bank_code"    />

                </div>
<div class="form-group col-sm-4 col-xs-12" >
    <label class="label label-green  half">رقم الحساب<strong class="astric">*</strong> </label>
    <input type="text" class="form-control half input-style"maxlength="24" minlength="24" 
     <?php if($person_account==1){?>value="<?= $bank_account_num?>" <?php } ?>
      name="wakeel_bank_num"  id="om_bank_num" onfocusout="length_hesab_om($(this).val());" 

<?php if($person_account == 1 ){?>   <?php }else{ ?>  disabled="disabled" <?php } ?>

       />
<small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
</div>

-->
                <!--             ahmed   -->
              </div>


       <!--------------------ahmed---------------->
        <div class="col-xs-12">
               <button type="submit" class="btn btn-purple w-md m-b-5" name="register" id="register" value="register">
              
               <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$button?></button>
            
            </div>
            <?php  echo form_close()?>


                         
                         
                         
                         
                         
                         
                         
                         
                           </div>
                        </div>
                        <div class="tab-pane fade" id="tab2">
                           <div class="panel-body">
<!---------------------- الوكيل  -------------------->
<?php }elseif($person_response == 1 ) {  ?> 


  <ul class="nav nav-tabs">
                     <?php if($person_response == 0){ ?>
                     
                       <li class="active"><a href="#tab1" data-toggle="tab">مقدم الطلب عن طريق الأم </a></li>
                     <?php }elseif($person_response == 1){ ?>
                       <li class="active"><a href="#tab2" data-toggle="tab">طلب وكيل الأسرة</a></li>
                     <?php } ?>
                      
                      
                     </ul>
       <?php echo $form;?>
             <div class="col-sm-12">
                <h6 class="text-center inner-heading"> البيانات الاساسية </h6>
            </div>

            <div class="col-sm-12 col-xs-12">
         

            <div class="col-sm-12 col-xs-12">
            

                  <div class="form-group col-sm-4 col-xs-12">
               <label class="label label-green  half"> رقم السجل المدني  <strong class="astric">*</strong> </label>
                <input type="text" class="form-control half input-style" 
                 name="mother_national_num"    value="<?= $mother_national_num?>" 
                    <?php if($mother_national_num==''){?> data-validation="required" <?php }?>  
                         id="mother_national_num_2"  onkeypress="validate_number(event)" 
                             <?=$validation?> />
                  <span  id="optia2"  > </span> 
                  <span  id="lenth_2" class="span-validation"> </span>
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">كلمة المرور <strong class="astric">*</strong> </label>
                  <input type="password" id="user_pass_2" class="form-control half input-style" 
                   <?php if($mother_national_num==''){?> data-validation="required" <?php }?> 
                    name="user_password" onkeyup="return valid3();"  <?=$validation?> />
                  <span  id="validate2" class="span-validation"> </span>               
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تاكيد كلمة المرور <strong class="astric">*</strong><strong></strong> </label>
                  <input type="password"   id="user_pass_validate_2" class="form-control half input-style"  name="" 
                  onkeyup="return valid4();"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?>  <?=$validation?> />
                  <span  id="validate3" class="span-validation"> </span>             
                </div>
                

                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مقر التسجيل ( الفرع )<strong class="astric">*</strong></label>
                  <select name="register_place" class="selectpicker no-padding form-control choose-date form-control half" 
                  
                   <?php if($mother_national_num==''){?> data-validation="required" <?php }?> 
                   
                    data-show-subtext="true" data-live-search="true"  <?=$validation?>  aria-required="true">
                   <option value=""> اختر</option>
                  <?php
                        foreach ($socity_branch as $row2):
                        $selected='';if($row2->id == $register_place){$selected='selected';}	?>
                        <option value="<?php  echo $row2->id;?>" <?php echo $selected?> ><?php  echo $row2->title;?></option>
                        <?php  endforeach;?>
                     </select>
                  </div>            
            
            
            
            
            
            
            
            
            
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم الوكيل<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="agent_name"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?> 
                           id="agent_name" class="form-control half input-style "   
                              value="<?php echo $agent_name;?>" 
                              <?php if($person_response ==0){?> <?php }?>/>
                </div>

     <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="agent_card" id="agent_card"  maxlength="10"
                     minlength="10"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?> 
                           class="form-control half input-style "
                              onkeyup="chek_length('agent_card')"  
                                onkeypress="validate_number(event)"  
                                  value="<?php echo $agent_card;?>" <?php if($person_response ==0){?>      
                                  <?php }?> />
                   <span  id="agent_card_span" class="span-validation"> </span>
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
                    <select name="agent_card_source" id="agent_card_source"   
                     <?php if($mother_national_num==''){?> data-validation="required" <?php }?>  
                       class="form-control half"   <?php if($person_response ==0){?><?php }?>
                      
                       >
                        <option value="">إختر</option>
                        <?php if(!empty($id_source)){ 
                            foreach ($id_source as $record){
                            $select=''; if($agent_card_source==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>>
                            <?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">

                    <label class="label label-green  half">صلة القرابة<strong class="astric">*</strong><strong></strong> </label>
                    <select name="agent_relationship"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?> 
                    id="agent_relationship" class="form-control half"   <?php if($person_response ==0){?> <?php }?>>
                        <option value="">إختر</option>
                        <?php if(!empty($relationships)){ foreach ($relationships as $record){
                            $select=''; if($agent_relationship==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الجوال<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="agent_mob" maxlength="10" <?php if($mother_national_num==''){?> data-validation="required" <?php }?> 
                     id="agent_mob" onkeyup="chek_length('agent_mob'),checkNumbers(this.value)"  
                      onkeypress="validate_number(event)" <?php if($person_response ==0){?>  <?php }?>
                       class="form-control half input-style "  value="<?php echo $agent_mob;?>"/>
    <span  id="agent_mob_span" class="span-validation"> </span>
                </div>

<!--
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مسئول الحساب<strong class="astric">*</strong><strong></strong> </label>
                    <select name="agent_bank_account"  <?php if($mother_national_num==''){?> data-validation="required" <?php }?> 
                    id="agent_bank_account" class="form-control half " 
                      onchange="checkAgent_bank_account();" <?php if($person_response ==0){?> <?php }?>>
                        <?php $yes_no=array('لا','نعم');?>
                      
                        <?php for ($s=0;$s<sizeof($yes_no);$s++){  $select=''; if($agent_bank_account==$s){$select='selected'; }?>
                            <option value="<?php echo $s;?>" <?php echo $select;?>><?php echo $yes_no[$s];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم البنك<strong class="astric">*</strong><strong></strong> </label>
                    <select name="bank_account_id"    <?php if($mother_national_num==''){?> data-validation="required" <?php }?>
                      id="bank_account_id2" class="form-control half" <?php if($agent_bank_account == 0){?> <?php } ?> 
                      onchange="get_banck_code_wakeel($(this).val())">
                        <?php $yes_no=array('لا','نعم');?>
                       
                        <?php  if(!empty($banks)){
                            foreach ($banks as $bank){ 
                                $select=''; 
                                if(  $agent_bank_account == $bank->id){$select='selected'; }?>

<option value="<?php echo $bank->id;?>-<?php echo $bank->bank_code;?>" <?php echo $select;?>>
                                <?php echo $bank->ar_name;?></option>
                           
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12" >
                    <label class="label label-green  half">رمز البنك<strong class="astric">*</strong> </label>
                    <input type="text" class="form-control half input-style"  name="bank_ramz"
                        value="<?= $bank_ramz?>" readonly="readonly"   id="wakeel_bank_code"    />

                </div>
                <div class="form-group col-sm-4 col-xs-12" >
                    <label class="label label-green  half">رقم الحساب<strong class="astric">*</strong> </label>
                    <input type="text"  maxlength="24" minlength="24"  class="form-control half input-style" 
                     name="wakeel_bank_num" value="<?= $bank_account_num?>"  
                       id="wakeel_bank_num"   onfocusout="length_hesab_wakeel($(this).val());"  />
 <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                </div>
                -->
                
                
             </div>


       <!--------------------ahmed---------------->
        <div class="col-xs-12">
               <button type="submit" class="btn btn-purple w-md m-b-5" name="register" id="register" value="register_wakel">
              
               <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$button?></button>
            
            </div>
            <?php  echo form_close()?>



<!------------------------------------------------------>
                           </div>
                           <?php } ?>
                           
                           
                        </div>
                     </div>
                  </div>
                  
                  
                   </div> </div> 
                   
  
  
  

  
                   
                   
                   
                   <script>

function get_banck_code(valu)
{
    var valu=valu.split("-");

    $('#om_bank_code').val(valu[1]);
}

function get_banck_code_wakeel(valu2)
{
    var valu2=valu2.split("-");

    $('#wakeel_bank_code').val(valu2[1]);
}
</script>

  <script>
  /*
function chek_length(inp_id)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(inchek_id).val();  
        if(inchek.length > 10){
           document.getElementById('lenth_mob').style.color = '#F00';
           document.getElementById('lenth_mob').innerHTML = 'رقم الجوال مكون من عشر ارقام';
                       
           var inchek_out= inchek.substring(0,10);
          $(inchek_id).val(inchek_out);
        }
    }

*/
   function length_hesab_om(length) {

     var len=length.length;

  if(len<24){
     alert(" رقم الحساب لابد الايقل عن 24 حرف او رقم");

  }
       if(len>24){
           alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");

       }
       if(len==24){


       }

  }
   function length_hesab_wakeel(length) {
       var len=length.length;

       if(len<24){
           alert(" رقم الحساب  لابد الايقل عن 24 حرف او رقم");

       }
       if(len>24){
           alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
         //  document.getElementById('register').setAttribute("disabled", "disabled");
       }

       if(len==24){

           document.getElementById('register').removeAttribute("disabled", "disabled");
       }

  }
function chek_length(inp_id)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(inchek_id).val();
        if(inchek.length < 10){
           document.getElementById(""+ inp_id +"_span").style.color = '#F00';
           document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
          document.getElementById('register').setAttribute("disabled", "disabled");
           var inchek_out= inchek.substring(0,10);
          $(inchek_id).val(inchek_out);
        }

        if(inchek.length > 10){
          document.getElementById(""+ inp_id +"_span").style.color = '#F00';
          document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
          document.getElementById('register').setAttribute("disabled", "disabled");
          var inchek_out= inchek.substring(0,10);
         $(inchek_id).val(inchek_out);
        }

        if(inchek.length == 10){
        document.getElementById('register').removeAttribute("disabled", "disabled");
        }
       }
   function chek_len_mother_mob(valu)
   {
       if(valu.length < 10){
           document.getElementById("lenth_mob").style.color = '#F00';
           document.getElementById("lenth_mob").innerHTML = 'أقصي عدد 10 ارقام';
           document.getElementById('register').setAttribute("disabled", "disabled");

           var inchek_out= inchek.substring(0,10);
           $('#mother_mob').val(inchek_out);
       }

       if(valu.length > 10){
           document.getElementById("lenth_mob").style.color = '#F00';
           document.getElementById("lenth_mob").innerHTML = 'أقصي عدد 10 ارقام';

           var inchek_out= inchek.substring(0,10);
           $('#mother_mob').val(inchek_out);
       }

       if(valu.length == 10){
           document.getElementById('register').removeAttribute("disabled", "disabled");

       }
   }


    function valid()
    {
        if($("#user_pass").val().length < 4){
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور اكثر من اربع حروف';
        }else if($("#user_pass").val().length > 4 &&  $("#user_pass").val().length < 10){
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور ضعيفة';
        }else if($("#user_pass").val().length > 10){
            document.getElementById('validate1').style.color = '#00FF00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور قوية';
        }
        
        
    }
    
    
    
    
    function valid2()
    {
        if($("#user_pass").val() == $("#user_pass_validate").val()){
            document.getElementById('validate').style.color = '#00FF00';
            document.getElementById('validate').innerHTML = 'كلمة المرور متطابقة';
        }else{
            document.getElementById('validate').style.color = '#F00';
            document.getElementById('validate').innerHTML = 'كلمة المرور غير متطابقة';
        }
    }
    
        function valid3()
    {
        if($("#user_pass_2").val().length < 4){
            document.getElementById('validate2').style.color = '#F00';
            document.getElementById('validate2').innerHTML = 'كلمة المرور اكثر من اربع حروف';
        }else if($("#user_pass_2").val().length > 4 &&  $("#user_pass").val().length < 10){
            document.getElementById('validate2').style.color = '#F00';
            document.getElementById('validate2').innerHTML = 'كلمة المرور ضعيفة';
        }else if($("#user_pass_2").val().length > 10){
            document.getElementById('validate2').style.color = '#00FF00';
            document.getElementById('validate2').innerHTML = 'كلمة المرور قوية';
        }
        
        
    }
    
     function valid4()
    {
        if($("#user_pass_2").val() == $("#user_pass_validate_2").val()){
            document.getElementById('validate3').style.color = '#00FF00';
            document.getElementById('validate3').innerHTML = 'كلمة المرور متطابقة';
        }else{
            document.getElementById('validate3').style.color = '#F00';
            document.getElementById('validate3').innerHTML = 'كلمة المرور غير متطابقة';
        }
    } 
    
    
    function pass_name(){
     //-----------------------------------------------------   
            var num =$("#mother_national_num").val();
         $("#user_name").val(num); 
        if($("#mother_national_num").val().length < 10){   
         document.getElementById('lenth').style.color = '#F00';
         document.getElementById('lenth').innerHTML = 'إسم المستخدم مكون من عشر ارقام';
        }else if($("#mother_national_num").val().length > 10){
                var mother_new=num.substring(0,10);
         $("#mother_national_num").val(mother_new);
         $("#user_name").val(mother_new);  
         document.getElementById('lenth').innerHTML = '';      
        }          
    //-------------------------------------------------------
     var user_username=$('#mother_national_num').val();
     if(user_username != "" &&  user_username !=0 &&  user_username.length >= 10){
     var dataString ='mother_national_num_chik='+ user_username ;
        $.ajax({
          
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/Add_Register',
           data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
           $("#lenth").html(html);
          // $("#lenth_mob").css('display' , 'none');
            } 
        });
      }
    
    }// end function






</script>

 
<script>
    function pass_name_2(){
     //-----------------------------------------------------   
            var num_2 =$("#mother_national_num_2").val();
         $("#user_name_2").val(num_2); 
        if($("#mother_national_num_2").val().length < 10){   
         document.getElementById('lenth_2').style.color = '#F00';
         document.getElementById('lenth_2').innerHTML = 'إسم المستخدم مكون من عشر ارقام';
        }else if($("#mother_national_num_2").val().length > 10){
                var mother_new_2 =num_2.substring(0,10);
         $("#mother_national_num_2").val(mother_new_2);
         $("#user_name_2").val(mother_new_2);  
         document.getElementById('lenth_2').innerHTML = '';      
        }          
    //-------------------------------------------------------
     var user_username_2 =$('#mother_national_num_2').val();
     if(user_username_2 != "" &&  user_username_2 !=0 &&  user_username_2.length >= 10){
     var dataString_2 ='mother_national_num_chik ='+ user_username_2 ;
        $.ajax({
          
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/Add_Register',
           data:dataString_2,
            dataType: 'html',
            cache:false,
            success: function(html){
           $("#lenth_2").html(html);
          // $("#lenth_mob").css('display' , 'none');
            } 
        });
      }
    
    }// end function



</script>


<script>

    function getPerson_response(valu) {
        var response =valu;
        if(response ==0){
            document.getElementById("agent_name").value="";
            document.getElementById("agent_card").value="";
            document.getElementById("agent_relationship").value="";
            document.getElementById("agent_mob").value="";
            
            document.getElementById("agent_card_source").value="";
            
            document.getElementById("agent_bank_account").value="";
            document.getElementById("bank_account_id2").value="";
            document.getElementById("agent_name").setAttribute("disabled", "disabled");
            document.getElementById("agent_card").setAttribute("disabled", "disabled");

            document.getElementById("agent_relationship").setAttribute("disabled", "disabled");
            document.getElementById("agent_mob").setAttribute("disabled", "disabled");
            document.getElementById("agent_bank_account").setAttribute("disabled", "disabled");
            document.getElementById("agent_card_source").setAttribute("disabled", "disabled");
            
            

        }
        if(response ==1){
            document.getElementById("agent_name").removeAttribute("disabled", "disabled");
            document.getElementById("agent_card").removeAttribute("disabled", "disabled");
            document.getElementById("agent_relationship").removeAttribute("disabled", "disabled");
            document.getElementById("agent_mob").removeAttribute("disabled", "disabled");
            document.getElementById("agent_card_source").removeAttribute("disabled", "disabled");
            document.getElementById("agent_bank_account").removeAttribute("disabled", "disabled");
            document.getElementById("wakeel_bank_num").removeAttribute("disabled", "disabled");
            //=====
            document.getElementById("person_account").value="";

            document.getElementById("person_account").setAttribute("disabled", "disabled");
            document.getElementById("bank_account_id1").setAttribute("disabled", "disabled");
            document.getElementById("om_bank_code").setAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").setAttribute("disabled", "disabled");
            //========


        }
    }



</script>

<script>




    function checkPerson_account() {
        var person_account =$('#person_account').val();


        if(person_account ==0){
            document.getElementById("bank_account_id1").setAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").setAttribute("disabled", "disabled");
          //  document.getElementById("om_bank_num").value="";
        }else{

            document.getElementById("bank_account_id1").removeAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").removeAttribute("disabled", "disabled");

        }

    }




    function checkAgent_bank_account() {
        var agent_bank_account =$('#agent_bank_account').val();
        var person_account =$('#person_account').val();
        if(person_account == 1){
            document.getElementById("agent_bank_account").value="";
            document.getElementById("agent_bank_account").setAttribute("disabled", "disabled");
           
            
            

        }else{
            if (agent_bank_account == 0) {
                document.getElementById("bank_account_id2").setAttribute("disabled", "disabled");
               // document.getElementById("bank_account_id2").value="";
                   document.getElementById("wakeel_bank_num").setAttribute("disabled", "disabled");
            } else {

                document.getElementById("bank_account_id2").removeAttribute("disabled", "disabled");
                  document.getElementById("wakeel_bank_num").removeAttribute("disabled", "disabled");
            }
        }


    }



</script>


<script>
   function get_peroid(value)
   {

       $.ajax({
           type:'post',
           url:"<?php echo base_url();?>/family_controllers/Family/get_date",
           data:{value:value},
           success:function(d){

               $('#update_date').val(d);


           }

       });

   }

</script>
<script>
    function change_status(process_id,title,mom)
    {
var reason=$('.reason'+mom).val();

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/change_file_status",
            data:{process_id:process_id,title:title,mom:mom,reason:reason},
            success:function(d){

             alert("تم تغيير حاله الملف");
                location.reload();


            }

        });
    }


</script>

