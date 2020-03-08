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
</style>

<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
        
            <?php 
                 /** Social Array ***/
            $scoial_status = array('متزوج','أعزب','أرمل');
            
            	 ?> 
            
            <?php if(isset($result)){ ?>
            
             <?php  echo form_open_multipart('disability_managers/Disability_manage/update_person/'.$result['id'])?>
             
                          <div class="col-sm-12">
                <h6 class="text-center inner-heading"> البيانات الشخصية </h6>
            </div>

            <!------------------------------------>
            <div class="col-sm-12">
               <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> رقم المستفيد</label>
                    <input type="number" name="p_num" value="<?=$result['p_num']?>" class="form-control half input-style"  placeholder="أدخل البيانات" readonly="readonly">   
                </div>
            
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الاسم </label>
                    <input type="text" name="p_name" value="<?=$result['p_name']?>" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تاريخ الميلاد  </label>
                  <input type="text" id="p_date_birth" value="<?=$result['p_date_birth']?>" name="p_date_birth" placeholder="تاريخ الميلاد "  class="form-control docs-date input-style half" data-validation="required">
                                  
                </div>
            </div>
            
            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">العنوان </label>
                    <input type="text" name="p_address" value="<?=$result['p_address']?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الهاتف </label>
                    <input type="number" name="p_mob"  value="<?=$result['p_mob']?>" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <div id="optionearea1"></div> 
                    <label class="label label-green  half">رقم السجل المدني </label>
                    
                    <input type="number" name="p_national_num" value="<?=$result['p_national_num']?>" id="p_national_num" class="form-control half input-style" placeholder="أدخل البيانات"  onkeyup="return lood_edit($('#p_national_num').val());" >
                   
                </div>
            </div>
            
             <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                <label class="label label-green  half">الجنسية </label>
                    
                 <select name="p_natonality_id_fk" id="p_natonality_id_fk" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                 <option value=""> - اختر - </option>
                  <?php if(!empty($nationality_settings)):
                  foreach ($nationality_settings as $nationality):
                  $selx ='';
                 if($result['p_natonality_id_fk'] == $nationality->id){
                   $selx ='selected="selected"';
                  }
                  ?>
                 <option value="<?php echo $nationality->id; ?>" <?=$selx?>><?php echo $nationality->title;?></option>
                  <?php endforeach; endif;?>
                 </select>  
                
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الحالة الإجتماعية </label>
                    
                   <select name="p_scoial_status_id_fk" id="p_scoial_status_id_fk" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
               <option value=""> - اختر - </option>
                <?php 
                for($x=0 ; $x < sizeof($scoial_status) ;$x++){
                     $selxd ='';
                if($result['p_scoial_status_id_fk'] == $x){
                   $selxd ='selected="selected"';
                }
                    ?>
               <option value="<?php echo $x; ?>" <?=$selxd?> ><?php echo $scoial_status[$x];?></option>
               <?php } ?>
               </select>
                </div>
                
                
                
            </div>
            
               <div class="col-sm-12">
                <h6 class="text-center inner-heading">  بيانات الاعاقة </h6>
            </div>
            
              <div class="col-sm-12">
               <div class="form-group col-sm-4 col-xs-12">
         <label class="label label-green  half"> إختر نوع الإعاقة</label>          
         <select name="disability_type_id_fk" id="disability_type_id_fk" class="selectpicker no-padding form-control choose-date form-control half" onchange="return apperanc($('#disability_type_id_fk').val());" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
         <option value=""> - اختر - </option>
          <?php if(!empty($types)):
                foreach ($types as $record):
                $sel ='';
                if($result['disability_type_id_fk'] == $record->id){
                   $sel ='selected="selected"';
                }
                ?>
               <option  value="<?php echo $record->id; ?>" <?=$sel?> ><?php echo $record->title;?></option>
               <?php endforeach; endif;?>
               </select>   
                </div>
            </div>
            <?php 
            if($result['disability_type_id_fk'] == 1){ ?>
                
            <div id="tawahod" >
             <div class="col-sm-12" >
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إثبات حالة </label>
                    <input type="text" name="proof_status" value="<?=$result['proof_status']?>" class="form-control half input-style" placeholder="أدخل البيانات"  >
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إحالة للمستشفي </label>
                    <input type="text" name="referral_to_hospital" value="<?=$result['referral_to_hospital']?>"   class="form-control half input-style" placeholder="أدخل البيانات"  >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    
                    <label class="label label-green  half">إحالة للمركز </label>
                    <input type="text" name="referral_to_center" value="<?=$result['referral_to_center']?>" class="form-control half input-style" placeholder="أدخل البيانات"  >
                </div>  
            </div>
              <div class="col-sm-12" >
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تقرير طبي </label>
                    <input type="file"  name="medical_report" class="form-control half input-style" accept="application/pdf,application/vnd.ms-excel"  placeholder="أدخل البيانات"  />
                <a href="<?php echo base_url('disability_managers/Disability_manage/download/'.$result['medical_report']) ?>"><i class="fa fa-download" aria-hidden="true"></i></a> /
                <a href="<?php echo base_url('disability_managers/Disability_manage/read_file/'.$result['medical_report']); ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        
                </div>
            </div>
            </div>
            
             <div id="not_tawahod" style="display:none;" >
             <div class="col-sm-12" >
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">درجة الإعاقة </label>
                    <input type="text" name="disability_degree" class="form-control half input-style" placeholder="أدخل البيانات"  >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هل تستخدم أجهزة مساعدة</label>
                     <input type="radio" name="use_devices" value="1" onclick="check(this.value)" > نعم<br>
                     <input type="radio" name="use_devices" value="2" onclick="check(this.value)"> لا<br>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    
                    <label class="label label-green  half">إذا كان الجواب بنعم أذكرها </label>
                    <input type="text" name="use_devices_details" id="use_devices_details" class="form-control half input-style" placeholder="أدخل البيانات"  readonly="readonly" >
                </div>  
            </div>
            <div class="col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هل أنت مسجل لدي جمعية اخري</label>
                     <input type="radio" name="be_in_another_society" value="1" onclick="checks(this.value)" > نعم<br>
                     <input type="radio" name="be_in_another_society" value="2" onclick="checks(this.value)"> لا<br>
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                   
                    <label class="label label-green  half">إذا كان الجواب بنعم أذكرها </label>
                    <input type="text" name="society_name" id="society_name" class="form-control half input-style" placeholder="أدخل البيانات"  readonly="readonly" >
                </div>
            </div>
            </div>
                
          <?php   }else{ ?>
          
             <div id="tawahod" style="display:none;">
             <div class="col-sm-12" >
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إثبات حالة </label>
                    <input type="text" name="proof_status" class="form-control half input-style" placeholder="أدخل البيانات"  >
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إحالة للمستشفي </label>
                    <input type="text" name="referral_to_hospital" class="form-control half input-style" placeholder="أدخل البيانات"  >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    
                    <label class="label label-green  half">إحالة للمركز </label>
                    <input type="text" name="referral_to_center"  class="form-control half input-style" placeholder="أدخل البيانات"  >
                </div>  
            </div>
              <div class="col-sm-12" >
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تقرير طبي </label>
                    <input type="file"  name="medical_report" class="form-control half input-style" accept="application/pdf,application/vnd.ms-excel"  placeholder="أدخل البيانات"  >
                </div>
            </div>
            </div>
          
          
          
                  <div id="not_tawahod">
             <div class="col-sm-12" >
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">درجة الإعاقة </label>
                    <input type="text" name="disability_degree" value="<?=$result['disability_degree']?>" class="form-control half input-style" placeholder="أدخل البيانات"  >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هل تستخدم أجهزة مساعدة</label>
                     <?php
                     $check='';
                     if($result['use_devices'] == 1){
                        $check='checked="checked"';
                     }
                      $check2='';
                     if($result['use_devices'] == 2){
                        $check2='checked="checked"';
                     }
                     
                      ?>
                     <input type="radio" <?=$check?> name="use_devices" value="1" onclick="check(this.value)" > نعم<br>
                     <input type="radio" <?=$check2?> name="use_devices" value="2" onclick="check(this.value)"> لا<br>
                </div>
                <?php if($result['use_devices'] == 1){
                  ?>
                 <div class="form-group col-sm-4 col-xs-12">
                    
                    <label class="label label-green  half">إذا كان الجواب بنعم أذكرها </label>
                    <input type="text" name="use_devices_details" value="<?=$result['use_devices_details']?>" id="use_devices_details" class="form-control half input-style" placeholder="أدخل البيانات"   >
                </div>    
               <?php  }else{ ?>
               
                <div class="form-group col-sm-4 col-xs-12">
                    
                    <label class="label label-green  half">إذا كان الجواب بنعم أذكرها </label>
                    <input type="text" name="use_devices_details"  id="use_devices_details" class="form-control half input-style" placeholder="أدخل البيانات"  readonly="readonly" >
                </div> 
               <?php 
               }
                    ?>
                 
            </div>
            <div class="col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هل أنت مسجل لدي جمعية اخري</label>
                     <?php
                     $check3='';
                     if($result['be_in_another_society'] == 1){
                        $check3='checked="checked"';
                     }
                      $check4='';
                     if($result['be_in_another_society'] == 2){
                        $check4='checked="checked"';
                     }
                     
                      ?>
                     <input type="radio" <?=$check3?> name="be_in_another_society" value="1" onclick="checks(this.value)" > نعم<br>
                     <input type="radio" <?=$check4?> name="be_in_another_society" value="2" onclick="checks(this.value)"> لا<br>
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                   
                    <label class="label label-green  half">إذا كان الجواب بنعم أذكرها </label>
                   <?php if($result['be_in_another_society'] == 1){
                  ?>
                       <input type="text" name="society_name" value="<?=$result['society_name']?>" id="society_name" class="form-control half input-style" placeholder="أدخل البيانات"  >
                
                  <?php }else{ ?>
                         <input type="text" name="society_name" id="society_name" class="form-control half input-style" placeholder="أدخل البيانات"  readonly="readonly" >
                
                    
                <?php  } ?>
               </div>
            </div>
            </div>
                
          <?php  }
            
             ?>
             
               <div class="col-sm-12">
                <h6 class="text-center inner-heading"> وسيلة الاتصال </h6>
            </div>
            
             <div class="col-sm-12" >
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">جوال</label>
                    <input type="number" name="contact_mob" value="<?=$result['contact_mob']?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هاتف</label>
                    <input type="number" name="contact_phone" value="<?=$result['contact_phone']?>"  class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
                </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">جوال ولي الامر</label>
                    <input type="number" name="contact_father_mob" value="<?=$result['contact_father_mob']?>" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
                </div>
                </div>
                <div class="col-sm-12" >
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم ولي الأمر</label>
                    <input type="text" name="contact_father_name" value="<?=$result['contact_father_name']?>" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
                </div>
                
                 <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">بريد الكتروني</label>
                    <input type="email" name="contact_email" value="<?=$result['contact_email']?>" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
                </div>
                 
            </div>
             
             
             <div class="col-sm-12" >
            <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد من المرفقات</label>
                      <input type="number" class="form-control half input-style" id="photo_num"  name="photo_num" min="1" max="10" onkeyup="return lood($('#photo_num').val());"  placeholder="عدد من المرفقات" >
                </div>
            </div>
            <div id="optionearea2"></div>
               <?php
                   // $photo=unserialize($result['image']);
                    if($records_images){
                        echo '<table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
                      <thead>
                      <tr class="">
                                <th style="color:#0c72ca; ">المرفق</th>
                                <th style="color:#0c72ca; ">تحميل / مشاهدة</th>
                                <th style="color:#0c72ca; ">الإجراء </th>
                            </tr>
                      ';
                        for($x = 0 ; $x < sizeof($records_images) ; $x++){
                            if(sizeof($records_images) > 1)
                            {
                                $td = '<td style="padding-top: 10%;">
                               <a  href="'.base_url().'disability_managers/Disability_manage/delete_photo_/'.$result['id'].'/'.$records_images[$x]->id.'"  class="btn btn-danger btn-xs col-lg-12">
                                حذف <i class="fa fa-trash"></i></a>
                               </td>';
                            }
                            else
                                $td = '';
                            $img = base_url('uploads/files').'/'.$records_images[$x]->file;
                            echo '<tr class="">
                            <td>'.$records_images[$x]->file.'</td>
                          <td class="text-center"> '; ?>
                          <a href="<?php echo base_url('disability_managers/Disability_manage/download/'.$records_images[$x]->file) ?>"><i class="fa fa-download" aria-hidden="true"></i></a> /
                          <a href="<?php echo base_url('disability_managers/Disability_manage/read_file/'.$records_images[$x]->file); ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                         <?php echo'</td>
                          '.$td.'
                          </tr>';
                        }
                        echo '</thead></table>';
                    }
                    ?>
                            <div class="col-xs-12">
               <button type="submit" class="btn btn-purple w-md m-b-5" name="update" value="update">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> تعديل</button>
            
            </div>
             
             <?php  echo form_close()?>
             <?php }else{ ?>     
           
            <?php echo form_open_multipart("disability_managers/Disability_manage/add_disabilities_persons")?>
             <div class="col-sm-12">
                <h6 class="text-center inner-heading"> البيانات الشخصية </h6>
            </div>

            <!------------------------------------>
            <div class="col-sm-12">
               <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> رقم المستفيد</label>
                    <input type="number" name="p_num" class="form-control half input-style" value="<?php echo ($student_code+1)?>" placeholder="أدخل البيانات" readonly="readonly">   
                </div>
            
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الاسم </label>
                    <input type="text" name="p_name" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تاريخ الميلاد  </label>
                  <input type="text" id="p_date_birth" name="p_date_birth" placeholder="تاريخ الميلاد "  class="form-control docs-date input-style half" data-validation="required">
                                  
                </div>
            </div>
            <!------------------------------------>
            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">العنوان </label>
                    <input type="text" name="p_address" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الهاتف </label>
                    <input type="number" name="p_mob" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <div id="optionearea1"></div> 
                    <label class="label label-green  half">رقم السجل المدني </label>
                    
                    <input type="number" name="p_national_num" id="p_national_num" class="form-control half input-style" placeholder="أدخل البيانات"  onkeyup="return lood_edit($('#p_national_num').val());" >
                    <input type="hidden" id="p_national_num_load"  name="p_national_num_load" data-validation="required" />
                
                </div>
                
            </div>
            
            
            
            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                <label class="label label-green  half">الجنسية </label>
                    
                 <select name="p_natonality_id_fk" id="p_natonality_id_fk" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
                 <option value=""> - اختر - </option>
                  <?php if(!empty($nationality_settings)):
                  foreach ($nationality_settings as $nationality):?>
                 <option value="<?php echo $nationality->id; ?>"><?php echo $nationality->title;?></option>
                  <?php endforeach; endif;?>
                 </select>  
                
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الحالة الإجتماعية </label>
                    
                   <select name="p_scoial_status_id_fk" id="p_scoial_status_id_fk" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
               <option value=""> - اختر - </option>
                <?php 
                for($x=0 ; $x < sizeof($scoial_status) ;$x++){?>
               <option value="<?php echo $x; ?>"><?php echo $scoial_status[$x];?></option>
               <?php } ?>
               </select>
                </div>
                
                
                
            </div>
            <!------------------------------------>
            <div class="col-sm-12">
                <h6 class="text-center inner-heading">  بيانات الاعاقة </h6>
            </div>
            
              <div class="col-sm-12">
               <div class="form-group col-sm-4 col-xs-12">
         <label class="label label-green  half"> إختر نوع الإعاقة</label>          
         <select name="disability_type_id_fk" id="disability_type_id_fk" class="selectpicker no-padding form-control choose-date form-control half" onchange="return apperanc($('#disability_type_id_fk').val());" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
         <option value=""> - اختر - </option>
          <?php if(!empty($types)):
                foreach ($types as $record):?>
               <option value="<?php echo $record->id; ?>"><?php echo $record->title;?></option>
               <?php endforeach; endif;?>
               </select>   
                </div>
            </div>
            
            <div id="not_tawahod">
             <div class="col-sm-12" >
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">درجة الإعاقة </label>
                    <input type="text" name="disability_degree" class="form-control half input-style" placeholder="أدخل البيانات"  >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هل تستخدم أجهزة مساعدة</label>
                     <input type="radio" name="use_devices" value="1" onclick="check(this.value)" > نعم<br>
                     <input type="radio" name="use_devices" value="2" onclick="check(this.value)"> لا<br>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    
                    <label class="label label-green  half">إذا كان الجواب بنعم أذكرها </label>
                    <input type="text" name="use_devices_details" id="use_devices_details" class="form-control half input-style" placeholder="أدخل البيانات"  readonly="readonly" >
                </div>  
            </div>
            <div class="col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هل أنت مسجل لدي جمعية اخري</label>
                     <input type="radio" name="be_in_another_society" value="1" onclick="checks(this.value)" > نعم<br>
                     <input type="radio" name="be_in_another_society" value="2" onclick="checks(this.value)"> لا<br>
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                   
                    <label class="label label-green  half">إذا كان الجواب بنعم أذكرها </label>
                    <input type="text" name="society_name" id="society_name" class="form-control half input-style" placeholder="أدخل البيانات"  readonly="readonly" >
                </div>
            </div>
            </div>
            
            <div id="tawahod" style="display:none;">
             <div class="col-sm-12" >
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إثبات حالة </label>
                    <input type="text" name="proof_status" class="form-control half input-style" placeholder="أدخل البيانات"  >
                </div>
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إحالة للمستشفي </label>
                    <input type="text" name="referral_to_hospital" class="form-control half input-style" placeholder="أدخل البيانات"  >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    
                    <label class="label label-green  half">إحالة للمركز </label>
                    <input type="text" name="referral_to_center"  class="form-control half input-style" placeholder="أدخل البيانات"  >
                </div>  
            </div>
              <div class="col-sm-12" >
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تقرير طبي </label>
                    <input type="file"  name="medical_report" class="form-control half input-style" accept="application/pdf,application/vnd.ms-excel"  placeholder="أدخل البيانات"  >
                </div>
            </div>
            </div>
            
            <div class="col-sm-12">
                <h6 class="text-center inner-heading"> وسيلة الاتصال </h6>
            </div>
            
             <div class="col-sm-12" >
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">جوال</label>
                    <input type="number" name="contact_mob" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هاتف</label>
                    <input type="number" name="contact_phone" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
                </div>
                  <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">جوال ولي الامر</label>
                    <input type="number" name="contact_father_mob" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
                </div>
                </div>
                <div class="col-sm-12" >
                
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم ولي الأمر</label>
                    <input type="text" name="contact_father_name" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
                </div>
                
                 <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">بريد الكتروني</label>
                    <input type="email" name="contact_email" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
                </div>
                 
            </div>
            
             <div class="col-sm-12">
                <h6 class="text-center inner-heading"> المرفقات </h6>
            </div>
           <div class="col-sm-12" >
            <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد من المرفقات</label>
                      <input type="number" class="form-control half input-style" id="photo_num"  name="photo_num" min="1" max="10" onkeyup="return lood($('#photo_num').val());"  placeholder="عدد من المرفقات" >
                </div>
            </div>
            <div id="optionearea2" class="col-sm-12" ></div>
            
            <!------------------------------------>
        <div class="col-xs-12">
               <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
               <input type="hidden"  name="insert_type" value="insert_admin"/>
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
            
            </div>
            <?php  echo form_close()?>
        <br/>
        <br/>
        <?php  } ?> 

            <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">رقم المستفيد</th>
                                            <th class="text-center">إسم المستفيد</th>
                                            <th class="text-center">نوع الاعاقة</th>
                                            <th class="text-center">تفاصيل</th>
                                            <th class="text-center">إجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $a=1;
                                    $x=1;
                                    foreach ($records as $record ):?>
                                        <tr>
<td><?php echo $x++ ?></td>
<td><?php echo $record->p_num; ?></td>
<td><?php echo $record->p_name; ?></td>
<td>
 <?php if(!empty($types)):
                foreach ($types as $recordeee):
                if($recordeee->id == $record->disability_type_id_fk):
                ?>
              <?php echo $recordeee->title;?>
               <?php endif; endforeach; endif;?>
</td>
<td>
<button type="button" class="btn  btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > <i class="fa fa-list"></i>التفاصيل</button>

<div class="modal" id="myModal<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
					            	<div class="modal-header">
					                	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                	<h4 class="modal-title"> التفاصيل  </h4>
					             	</div>
                                    <div class="modal-body">
                                    <div class="row">
                                    <div class="col-md-12">
                                     <div class="col-md-12">
                            <h5 class="text-center pop-title-text">بيانات الشخصية</h5>
                            </div>
                                    <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>رقم المستفيد:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->p_num?></h6>
                                      </div>
                                   </div>
                                   
                                   <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>إسم المستفيد:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->p_name?></h6>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>تاريخ الميلاد:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->p_date_birth?></h6>
                                      </div>
                                   </div>
                             
                             <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>العنوان :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->p_address?></h6>
                                      </div>
                                   </div>
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>الهاتف :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->p_mob?></h6>
                                      </div>
                                   </div>
                             <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>السجل المدني :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->p_national_num?></h6>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>الجنسية  :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?php if(!empty($nationality_settings)){
                            foreach ($nationality_settings as $nationality){
                            
                            if($record->p_natonality_id_fk == $nationality->id){ ?>
                            <?=$nationality->title?>
                            <?php  }
                            }
                            }?> </h6>
                                      </div>
                                   </div>
                                   
                             <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>الحالة الإجتماعية :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?php 
                for($x=0 ; $x < sizeof($scoial_status) ;$x++){
                if($record->p_scoial_status_id_fk== $x){ ?>
                  <?=$scoial_status[$x]?>
                <?php }
                }
                ?></h6>
                                      </div>
                                   </div>
                            <div class="col-md-12">
                            <h5 class="text-center pop-title-text">بيانات الاعاقة</h5>
                            </div>
                            
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>نوع الإعاقة :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?php if(!empty($types)):
                            foreach ($types as $recordeee):
                            if($recordeee->id == $record->disability_type_id_fk):
                            ?>
                            <?php echo $recordeee->title;?>
                            <?php endif; endforeach; endif;?></h6>
                                      </div>
                                   </div>
                           <?php if($record->disability_type_id_fk == 1){ ?>
                           
                           <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>إثبات حالة :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->proof_status?></h6>
                                      </div>
                                   </div>
                                    <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>إحالة للمستشفي:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->referral_to_hospital?></h6>
                                      </div>
                                   </div>
                                    <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>إحالة للمركز:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->referral_to_center?></h6>
                                      </div>
                                   </div>
       
                              <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>تقرير طبي:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->medical_report?><a style="position: absolute; left: 15px;" href="<?php echo base_url('disability_managers/Disability_manage/download/'.$record->medical_report) ?>"><i class="fa fa-download" aria-hidden="true"></i></a></h6>
                                      </div>
                                   </div>

                            
                            <?php }else{  ?>
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>درجة الإعاقة :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->disability_degree?></h6>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>هل تستخدم أجهزة مساعدة:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?
                              if($record->use_devices == 1){
                                echo 'نعم ';
                              }else{
                               echo 'لا ';  
                              }
                              ?></h6>
                                      </div>
                                   </div>
                                   
                                   
                            
                            
                            
                            <?php 
                            
                            if($record->use_devices == 1){ ?>
                             <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>إذا كان الجواب بنعم أذكرها:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->use_devices_details?></h6>
                                      </div>
                                   </div>
                                  
                            <?php  }else{ ?>
                             
                            <?php  } ?>
                            
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>هل أنت مسجل لدي جمعية اخري:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?
                              if($record->be_in_another_society == 1){
                                echo 'نعم ';
                              }else{
                               echo 'لا ';  
                              }
                              ?></h6>
                                      </div>
                                   </div>
                               
                            
                            <?php 
                            
                            if($record->be_in_another_society == 1){ ?>
                            
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>:إذا كان الجواب بنعم أذكرها</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->society_name?></h6>
                                      </div>
                                   </div>
                                   
                            <?php  }else{ ?>
                             
                            <?php  } ?>
                            
                          <?php  }
                             ?>
                             
                              <div class="col-md-12">
                            <h5 class="text-center pop-title-text">بيانات الاتصال</h5>
                            </div>
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>جوال:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->contact_mob?></h6>
                                      </div>
                                   </div>
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>هاتف:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->contact_phone?></h6>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>جوال ولي الامر:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->contact_father_mob?></h6>
                                      </div>
                                   </div>
                             <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>إسم ولي الأمر:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->contact_father_name?></h6>
                                      </div>
                                   </div>
                               <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>بريد الكتروني:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->contact_email?></h6>
                                      </div>
                                   </div>
                            
                             
                             <div class="col-md-12">
                            <h5 class="text-center pop-title-text">المرفقات </h5>
                            </div>
                            
                                  <div class="col-xs-12">
                                  <table class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%;">
                            <thead>
                            <tr>
                                <th style="color: #ffffff; background-color: #009688;">م</th>
                                <th style="color: #ffffff; background-color: #009688;">المرفق</th>
                                <th style="color: #ffffff; background-color: #009688; ">تحميل </th>
                            </tr>
                            </thead>
                            <tbody>
                         <?php if(!empty($record->photos)):
                             $a=1;
                             foreach ($record->photos as $row):
                            ?>
                         <tr>  
                        <td><?php  echo $a ;?></td>
                        <td> <?php echo $row->file?></td>
                        <td>
                      
                        <a href="<?php echo base_url('disability_managers/Disability_manage/download/'.$row->file) ?>"><i class="fa fa-download" aria-hidden="true"></i></a>
                              </td>
                       </tr>
                        <?php  $a++;  endforeach; endif;?>
                        </tbody>
                        </table>  
</div>
   
      				                </div>
                                    </div>
                                    </div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
</div>
</div>
</div>
</div>
<!----------------------------------------------------------------->
</td>
<td> <a href="<?php echo base_url('disability_managers/Disability_manage/update_person').'/'.$record->id?>"> 
<i class="fa fa-pencil " aria-hidden="true"></i> </a> 
<a href="<?php echo  base_url('disability_managers/Disability_manage/delete_person').'/'.$record->id ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
<i class="fa fa-trash" aria-hidden="true"></i></a>
<a href="<?php echo  base_url('disability_managers/Disability_manage/print_person').'/'.$record->id ?>">
<i class="fa fa-print" aria-hidden="true"></i></a>



    <a href="<?php echo base_url()?>disability_managers/Reasercher/Add_researcher_opinion/<?=$row->id?>" > 
    <button class="btn btn-success  btn-xs" style="">إضافة راي الباحث</button></a>
    <a href="<?php echo base_url()?>disability_managers/Reasercher/print_me/<?=$row->id?>" > 
    <button class="btn btn-info  btn-xs" style=""> طباعة راي الباحث</button></a>

<button type="button" class="btn  btn-xs  btn-warning " data-toggle="modal" data-target="#myModal_<?php echo $record->id  ?>" > تأكيد أهلية المتقدم</button>
 
 
 
                                     <div class="modal" id="myModal_<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" style="text-align: right; font-size: 16px;">تأكيد الاهلية  </h4>
                                    </div>
                                    <div class="modal-body">
                                    <div class="row">
                                    <div class="col-xs-12">
                                    
                                      <?php echo form_open_multipart("disability_managers/Disability_manage/update_person_state/".$record->id)?>
                    <div class="form-group col-sm-12 col-xs-12">
                    
                     <?php
                     $checkk3='';
                     if($record->scientific_qualitication == 1){
                        $checkk3='checked="checked"';
                     }
                      $checkk4='';
                     if($record->scientific_qualitication == 2){
                        $checkk4='checked="checked"';
                     }
                     
                      ?>
                     
                  
                        <div class="col-md-12">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>تأكيد أهلية المتقدم</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                         <div class="col-xs-6" style="margin-top:7px;">
                         <input type="radio" <?=$checkk3?> name="sc_id" value="1" data-validation="required" > مؤهل
                     
                          <input style="margin-right: 25px;" type="radio" <?=$checkk4?> name="sc_id" value="2" data-validation="required"> غير مؤهل
                      </div>
                                      </div>
                                   </div>
                     </div>
                      
                     
                                    
                                    </div>                          
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add" style="background-color: #009688; border: 0;">
                    <span><i  style="color: #fff;" class="fa fa-floppy-o" aria-hidden="true"></i></span> تاكيد الأهلية</button>
                                  <?php  echo form_close()?>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    </div>
                                    </div>
                                    </div>
</div>
 
 
  </td>
    </tr>
    <?php
    $a++;
endforeach;  ?>
<?php endif; ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
   <script>
            function lood_edit(num){
              
                if(num>0 && num != '')
                {
                    
                    var dataString = 'num='+ num;
                    $.ajax({
                        type:'post',
                        url: '<?php echo base_url() ?>/disability_managers/Disability_manage/add_disabilities_persons',
                        data:dataString,
                        dataType: 'html',
                        cache:false,
                        success: function(html){
                            $("#optionearea1").html(html);
                        }
                    });
                    return false;
                }
                else
                {
                    
                    $("#optionearea1").html('');
                }
            }
        </script>
        <script>
        
     function check(browser) {

   if(browser == 1){
     $("#use_devices_details").prop("readonly",false);
    $("#use_devices_details").val('');
   }else{
    $("#use_devices_details").prop("readonly",true);
    $("#use_devices_details").val('');
   }
}
        </script>
        
            <script>
        
     function checks(browser) {

   if(browser == 1){
     $("#society_name").prop("readonly",false);
    $("#society_name").val('');
   }else{
    $("#society_name").prop("readonly",true);
    $("#society_name").val('');
   }
}
        </script>
            <script>
        
     function apperanc(browser) {
   if(browser == 1){

      $("#not_tawahod").hide();
      $("#tawahod").show();
    
   }else{
   $("#not_tawahod").show();
   $("#tawahod").hide();
   }
}
        </script>
            <script>
 function lood(num){
    if(num>0 && num != '')
    {
        var id = num;
        var dataString = 'num_photo=' + id ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/disability_managers/Disability_manage/add_disabilities_persons',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
             $("#optionearea2").html(html);
            } 
        });
        return false; 
        }
        else
        {
            $("#photo_num").val('');
            $("#optionearea2").html('');
        } 
 }
</script>
