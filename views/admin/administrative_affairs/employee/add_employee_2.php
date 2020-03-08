<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;
            $social_status = array(1=>'أعزب',2=>'متزوج',3=>'أرمل',4=>'مطلق');
            ?> </h3>
        </div>
        <div class="panel-body">
            <?php if(isset($result)) { ?>
            <?php echo form_open_multipart('Administrative_affairs/edit_employee/'.$result[0]->id)?>
            <div class="col-xs-12 r-inner-details">
                <div class="col-xs-12 ">
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">كود الموظف </h4>
                            </div>
                            <?php  
                            if(!empty($count)){
                                $value=($count[0]->id)+1;
                            }else{
                                $value =1;
                            }
                            ?>
                            <div class="col-xs-6 r-input">
                                <input type="text" readonly class="r-inner-h4" name="emp_code" value="<? echo $result[0]->id;?>">
                            </div>
                        </div>
                        
                    <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> النوع  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="gender_id" id=""    data-validation="required" aria-required="true">
                                    <?php 
                                   $array_type=array("اختر ","ذكر","أنثى");
                                        foreach ($array_type as $key=>$value):
                                            $sect='';
                                            if( $result[0]->gender_id ==$key ){
                                                $sect ='selected';
                                            }
                                            ?>
                                            <option value="<? echo $key;?>" <? echo $sect;?>><? echo $value;?></option>
                                            <?php  
                                        endforeach; 
                                   
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> الإدارة </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="administration" id="administration"   onchange="return lood(this.value);" data-validation="required" aria-required="true">
                                    <?php 
                                    if(!empty($admin)):
                                        foreach ($admin as $record):
                                            $sect='';
                                            if( $result[0]->administration ==$record->id ){
                                                $sect ='selected';
                                            }
                                            ?>
                                            <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->name;?></option>
                                            <?php  
                                        endforeach; 
                                    endif;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> نوع العقد </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="contract"  id="contract" data-validation="required" aria-required="true">
                                    <option value="">إختر</option>
                                    <?php if(isset($contracts) && $contracts != null) {
                                        foreach ($contracts as $value) {
                                            $select = '';
                                            if($value->id == $result[0]->contract) {
                                                $select = 'selected';
                                            }?>
                                            <option value="<?=$value->id?>" <?=$select?> ><?=$value->title?></option>
                                            <?  } 
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم التأمين </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text"  onkeypress="validate_number(event)" id="insurance_num" name="insurance_num" class="form-control text-left" value="<?=$result[0]->insurance_num?>" placeholder="رقم التأمين" data-validation="required"   /> 
                                </div>
                            </div>

                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  تاريخ الميلاد </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                            <input type="text" class="form-control form-control " id="datetimepicker1" name="birth_date" value="<? echo date('d/m/Y',$result[0]->birth_date); ?>"  placeholder="شهر / يوم / سنة " data-validation="required" >
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">رقم الهاتف </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text"  onkeypress="validate_number(event)" class="r-inner-h4" name="phone_num" value="<?echo $result[0]->phone_num;?>" placeholder="رقم الهاتف" data-validation="required"  >
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">رقم الجوال </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text"  onkeypress="validate_number(event)" class="r-inner-h4" placeholder="رقم الجوال" data-validation="required"  name="mobile" value="<?echo $result[0]->mobile;?>" >
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الدرجة الوظيفية </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="degree_id" class="form-control" data-validation="required"  aria-required="true" >
                                        <option value="">إختر الدرجة الوظيفية</option>
                                           <?php foreach($job_role as $one_job_role){
                                            $select=""; if($result[0]->degree_id == $one_job_role->defined_id){ $select="selected";}
                                             echo '<option value="'.$one_job_role->defined_id.'" '.$select.'>'.$one_job_role->defined_title.'</option>';
                                           } ?>
                                        </select>
                                </div>
                            </div>   

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> مرفق عقد</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="file" id="img" name="img" style="height: auto;" class="text-right" accept="application/pdf" />  
                                    <span style="color: red">المسموح به ملفات PDF</span>   
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> مرفق الدورات التدريبية</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="file" id="training" name="training" style="height: auto;" class="text-right" accept="application/pdf" /> 
                                    <span style="color: red">المسموح به ملفات PDF</span>    
                                </div>
                            </div>
                                <div class="col-xs-12">
                                            <div class="col-xs-6">
                                                <h4 class="r-h4">راتب اساسي</h4>
                                            </div>
                                            <div class="col-xs-6 r-input">
                                                <input type="text"  onkeypress="validate_number(event)" step="any" id="salary" name="salary" class=r-inner-h4"  value="<?php echo $result[0]->salary;?>"  />
                                            </div>
                                 </div>
                        </div>

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> إسم الموظف </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" name="employee" value="<?echo $result[0]->employee;?>" data-validation="required"  placeholder="إسم الموظف ">
                                </div>
                            </div>

                            <div class="col-xs-12" id="optionearea1">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> القسم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select  name="department" data-validation="required" aria-required="true">
                                        <option value="">إختر</option>
                                        <?php 
                                        if(!empty($admin)):
                                            foreach ($departs[$result[0]->administration] as $record):
                                                $select='';
                                                if($record->id == $result[0]->department ){
                                                    $select='selected';    
                                                }
                                                ?>
                                                <option value="<? echo $record->id;?>" <? echo $select;?>><? echo $record->name;?></option>
                                                <?php  
                                            endforeach; 
                                        endif;
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الهوية </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text"  onkeypress="validate_number(event)" class="r-inner-h4" name="id_num" value="<?echo $result[0]->id_num;?>" data-validation="required"  placeholder="رقم الهوية" >
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">العنوان الوطني</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" placeholder="العنوان الوطني" name="address" data-validation="required"  value="<?echo $result[0]->address;?>">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">إسم البنك</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select class="form-control" name="bank_id_fk" >
                                        <option value="">إختر</option>
                                        <?php
                                        if(isset($banks) && $banks != null) {
                                            foreach ($banks as $value) {
                                                $select = '';
                                                if($result[0]->bank_id_fk == $value->id) {
                                                    $select = 'selected';
                                                }
                                                ?>
                                                <option value="<?=$value->id?>" <?=$select?> ><?=$value->title?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الحساب البنكي</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" placeholder=" رقم الحساب البنكي" name="bank_account" value="<?echo $result[0]->bank_account;?>">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">البريد الإلكتروني </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="email" class="r-inner-h4" name="email" placeholder="البريد الإلكتروني" value="<?echo $result[0]->email;?>" >
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الحالة الاجتماعية </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="social_status"  id="social_status" data-validation="required" aria-required="true">
                                        <option value="">إختر</option>
                                        <?php foreach ($social_status as $key => $value) {
                                            $select = '';
                                            if($key == $result[0]->social_status) {
                                                $select = 'selected';
                                            }
                                            ?>
                                            <option value="<?=$key?>" <?=$select?>><?=$value?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> المسمي الوظيفي </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="job_id_fk"  id="job_id_fk" data-validation="required" aria-required="true">
                                        <option value="" >اختر</option>
                                        <?php foreach ($job_titles as $record) {
                                            $select = '';
                                            if($result[0]->job_id_fk == $record->id) {
                                                $select = 'selected';
                                            }
                                            ?>
                                            <option value="<?=$record->id?>" <?php echo $select;?>><?=$record->title?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>

                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> المؤهل العلمي </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input name="scientific_qualification" placeholder="المؤهل العلمي " value="<?php echo $result[0]->scientific_qualification;  ?>" class="r-inner-h4" data-validation="required"   />
                                    </div>
                                </div>                           

                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> الدورات التدريبية </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <textarea class="r-textarea"  name="all_courses"><? echo  $result[0]->all_courses;?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!------------------------------------------------------------------------------------>
        <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-6 r-inner-details">
                        <div class="col-xs-12">
                            <h4 class="r-h4"> إعدادات الأجازات والأذونات </h4>
                        </div>
                        <div class="col-xs-12 ">
                            <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> إعدادات الأجازات والأذونات </h4>
                                        </div><div class="col-xs-6 r-input">
                                            <select name="group_affairs_id_fk" id="group_affairs_id_fk" data-validation="required" aria-required="true">
                                                <option value="">إختر</option>
                                                <?php if(!empty($affairs_settings_options_FK)):
                                                foreach ($affairs_settings_options_FK as $record):
                                                    $sect='';
                                                    if( $result[0]->group_affairs_id_fk ==$record->id ){
                                                        $sect ='selected';
                                                    }
                                                    ?>
                                                    <option value="<? echo $record->id;?>" <? echo $sect;?>><? echo $record->set_name;?></option>
                                                <?php  endforeach; endif;?>
                                            </select>
                                        </div>                           
                                    </div> 

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> رصيد أجازات سابق </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text" class="r-inner-h4" name="past_days"  value="<?php echo $result[0]->past_days;?>" placeholder="رصيد أجازات سابق" data-validation="required"  />
                                        </div>                           
                                    </div> 
                                </div>
                            </div> 
                        </div>
                    </div>
       </div>              
<!------------------------------------------------------------------------------------>
                  <div class="col-xs-12 r-inner-details">          
                       

                        
                   <div class="col-xs-6 r-inner-details">
                        <div class="col-xs-12">
                            <h4 class="r-h4"> إعدادات أنواع البدالات </h4>
                        </div>

                       <div class="col-xs-12 ">
                           <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                               <?php foreach($allowances as $one_allowances){

                                   $title='';
                                   if($one_allowances->id ==1){
                                       $title='b_sakn';
                                   }elseif($one_allowances->id ==2){
                                       $title='b_mosalat';
                                   }elseif($one_allowances->id ==3){
                                       $title='b_amal';
                                   }elseif($one_allowances->id ==4){
                                       $title='b_maesha';
                                   }elseif($one_allowances->id ==5){
                                       $title='b_other';
                                   }
                                   ?>


                                   <div class="col-xs-12">
                                       <div class="col-xs-6">
                                           <h4 class="r-h4"><?=$one_allowances->title?></h4>
                                       </div>
                                       <div class="col-xs-6 r-input">
                                           <input type="text"  onkeypress="validate_number(event)" name="<?=$title?>"  id="<?=$one_allowances->id?>" class="r-inner-h4 badl"   value="<?php echo$result[0]->$title;?>"  readonly placeholder="<?=$one_allowances->title?>" data-validation="required" >
                                           <input type="hidden" id="percent<?=$one_allowances->id?>" value="<?=$one_allowances->percent?>">
                                           <input type="hidden" id="mininum<?=$one_allowances->id?>" value="<?=$one_allowances->mininum?>">
                                       </div>
                                   </div>
                               <?php }?>
                           </div>
                       </div>
                   </div>
                           <div class="col-xs-6 r-inner-details">
                            <div class="col-xs-12">
                                <h4 class="r-h4"> إعدادات أنواع الخصومات </h4>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">تأمينات</h4>
                                            
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text"  onkeypress="validate_number(event)" name="k_tamen"  id="k_tamen" class="r-inner-h4"  placeholder="تأمينات" data-validation="required"  value="<?php echo $result[0]->k_tamen;?>">
                                        </div>
                                    </div>

                                </div>
                            </div> 
                        </div>
                </div>  
<!------------------------------------------------------------------------------------>
                    <div class="col-xs-12">
                        <button type="submit" name="edit" value="حفظ" class="btn btn-purple w-md m-b-5">
                            <span><i class="fa fa-floppy-o" ></i></span> حفظ </button>
                        </div>
                        <?php echo form_close()?>

                        <?php }else{ ?>

                        <?php  echo form_open_multipart('Administrative_affairs/add_employee')?>
                       
                        <div class="col-xs-12 r-inner-details">
                            <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> كود الموظف </h4>
                                    </div>
                                    <?php  
                                    if(!empty($count)){
                                        $value=($count[0]->id)+1;
                                    }else{
                                        $value =1;
                                    }
                                    ?>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4" readonly name="emp_code" value="<? echo $value;?>">
                                    </div>
                                </div>
                     <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> النوع  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="gender_id" id=""    data-validation="required" aria-required="true">
                                    <?php 
                                   $array_type=array("اختر ","ذكر","أنثى");
                                        foreach ($array_type as $key=>$value):
                                           
                                           
                                            ?>
                                            <option value="<? echo $key;?>" ><? echo $value;?></option>
                                            <?php  
                                        endforeach; 
                                   
                                    ?>
                                </select>
                            </div>
                        </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> الإدارة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="administration" id="administration" onchange="return lood(this.value);" data-validation="required" aria-required="true">
                                            <option value="">إختر</option>
                                            <?php 
                                            if(!empty($admin)):
                                                foreach ($admin as $record):
                                                    ?>
                                                    <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
                                                    <?php
                                                endforeach; 
                                            endif;
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> نوع العقد </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="contract" id="contract" data-validation="required" aria-required="true" >
                                            <option value="">إختر</option>
                                            <?php if(isset($contracts) && $contracts != null){ 
                                                foreach ($contracts as $contract) { ?>
                                                <option value="<?=$contract->id?>"><?=$contract->title?></option>
                                                <?php } }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> رقم التأمين </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text"  onkeypress="validate_number(event)" id="insurance_num" name="insurance_num" class="form-control text-left" placeholder="رقم التأمين" data-validation="required"  /> 
                                        </div>
                                    </div>

                                    <div class="col-xs-12 ">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4 ">  تاريخ الميلاد </h4>
                                        </div>
                                        <div class="col-xs-6 r-input ">
                                           
                                               
                                                    <input type="text" class="form-control " id="datetimepicker1" name="birth_date" placeholder="شهر / يوم / سنة " data-validation="required" >
                                               
                                           
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">رقم الهاتف </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text"  onkeypress="validate_number(event)" class="r-inner-h4" placeholder="رقم الهاتف" name="phone_num" data-validation="required" >
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">رقم الجوال </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text"  onkeypress="validate_number(event)" class="r-inner-h4" placeholder="رقم الجوال" name="mobile" data-validation="required" >
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> الدرجة الوظيفية </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                        <select name="degree_id" class="form-control" data-validation="required"  aria-required="true" >
                                            <option value=""> إختر  الدرجة الوظيفية</option>
                                           <?php foreach($job_role as $one_job_role){
                                             echo '<option value="'.$one_job_role->defined_id.'">'.$one_job_role->defined_title.'</option>';
                                           } ?>
                                        </select>
                                        
                                        </div>
                                    </div>
                                <!----------------------ahmed-->
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> عدد الذكور </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" name="male_number" id="male_number"  onkeypress="validate_number(event)" data-validation="required"  onkeyup="getFamilyNumber();"   value=""  class="r-inner-h4" />
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> عدد أفراد الاسرة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" name="family_members_number" id="family_members_number"  onkeypress="validate_number(event)" data-validation="required"   readonly value=""  class="r-inner-h4" />
                                    </div>
                                </div>
                                <!----------------------ahmed-->

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> مرفق عقد</h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="file" id="img" name="img" style="height: auto;" class="text-right" accept="application/pdf" />  
                                            <span style="color: red">المسموح به ملفات PDF</span>   
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> مرفق الدورات التدريبية</h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="file" id="training" name="training" style="height: auto;" class="text-right" accept="application/pdf" /> 
                                            <span style="color: red">المسموح به ملفات PDF</span>    
                                        </div>
                                    </div>

                                    
                                                <div class="col-xs-12">
                                                            <div class="col-xs-6">
                                                                    <h4 class="r-h4">راتب اساسي</h4>
                                                            </div>
                                                            <div class="col-xs-6 r-input">
                                                                <input type="text"  onkeypress="validate_number(event)"   step="any" id="salary" name="salary" class=r-inner-h4"  data-validation="required"  />
                                                   </div>
                                             </div>


                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> إسم الموظف </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text" class="r-inner-h4" name="employee" placeholder="إسم الموظف" data-validation="required" >
                                        </div>
                                    </div>

                                    <div class="col-xs-12" id="optionearea1">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> القسم </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <select name="department" data-validation="required" aria-required="true">
                                                <option value="">إختر</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> رقم الهوية </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text"  onkeypress="validate_number(event)" class="r-inner-h4" name="id_num" placeholder="رقم الهوية" data-validation="required" >
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">العنوان الوطني</h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text" class="r-inner-h4" placeholder="العنوان الوطني" name="address" data-validation="required" >
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">إسم البنك</h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <select class="form-control" name="bank_id_fk">
                                                <option value="">إختر</option>
                                                <?php
                                                if(isset($banks) && $banks != null) {
                                                    foreach ($banks as $value) {
                                                        ?>
                                                        <option value="<?=$value->id?>"><?=$value->title?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4"> رقم الحساب البنكي</h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" class="r-inner-h4" placeholder=" رقم الحساب البنكي" name="bank_account">
        </div>
    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">البريد الإلكتروني </h4>
                                        </div>

                                        <div class="col-xs-6 r-input">
                                            <input type="email" class="r-inner-h4" name="email" placeholder="البريد الإلكتروني" >
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> الحالة الاجتماعية </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <select name="social_status"  id="social_status" data-validation="required" aria-required="true">
                                                <option value="" >اختر</option>
                                                <?php foreach ($social_status as $key => $value) { ?>
                                                <option value="<?=$key?>" ><?=$value?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> المسمي الوظيفي </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <select name="job_id_fk"  id="job_id_fk" data-validation="required" aria-required="true">
                                                <option value="" >اختر</option>
                                                <?php foreach ($job_titles as $record) { ?>
                                                    <option value="<?=$record->id?>" ><?=$record->title?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> عدد الإناث </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text" name="female_number" id="female_number"  onkeypress="validate_number(event)" data-validation="required"  onkeyup="getFamilyNumber();"   value=""  class="r-inner-h4" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> المؤهل العلمي </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input name="scientific_qualification" class="r-inner-h4" data-validation="required"  placeholder="المؤهل العلمي" />
                                        </div>
                                    </div>                           



                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> الدورات التدريبية </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <textarea class="r-textarea" name="all_courses"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>


                
                <!------------------------------------------------------------------->
                   <div class="col-xs-12 r-inner-details">
                            <div class="col-xs-6 r-inner-details">
                                <div class="col-xs-12">
                                    <h4 class="r-h4"> إعدادات الأجازات والأذونات </h4>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                                        <div class="col-xs-12">
                                            <div class="col-xs-6">
                                                <h4 class="r-h4"> إعدادات الأجازات والأذونات </h4>
                                            </div>
                                            <div class="col-xs-6 r-input">
                                                <select name="group_affairs_id_fk" id="group_affairs_id_fk" data-validation="required" aria-required="true">
                                                    <option value="">إختر</option>
                                                    <?php if(!empty($affairs_settings_options)):
                                                    foreach ($affairs_settings_options as $record):?>
                                                    <option value="<? echo $record->id;?>"><? echo $record->set_name;?></option>
                                                <?php  endforeach; endif;?>
                                            </select>   
                                        </div>                           
                                    </div>  

                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> رصيد أجازات سابق </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text" class="r-inner-h4" placeholder="رصيد أجازات سابق" name="past_days" data-validation="required" >
                                        </div>                           
                                    </div> 
                                </div>
                            </div>
                        </div>
                     </div>
                        
                       <!------------------------------------------------------------------->
              <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-6 r-inner-details">
                            <div class="col-xs-12">
                                <h4 class="r-h4"> إعدادات أنواع البدالات </h4>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                                   <?php foreach($allowances as $one_allowances){

                                       $title='';
                                       if($one_allowances->id ==1){
                                           $title='b_sakn';
                                       }elseif($one_allowances->id ==2){
                                           $title='b_mosalat';
                                       }elseif($one_allowances->id ==3){
                                           $title='b_amal';
                                       }elseif($one_allowances->id ==4){
                                           $title='b_maesha';
                                       }elseif($one_allowances->id ==5){
                                           $title='b_other';
                                       }
                                       ?>
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"><?=$one_allowances->title?></h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text"  onkeypress="validate_number(event)" onkeyup="getMinimum(),getTamen()" name="<?php echo $title;?>"  id="<?=$one_allowances->id?>" class="r-inner-h4 badl"   value="0"   placeholder="<?=$one_allowances->title?>" data-validation="required" >
                                            <input type="hidden" id="percent<?=$one_allowances->id?>" value="<?=$one_allowances->percent?>">
                                            <input type="hidden" id="mininum<?=$one_allowances->id?>" value="<?=$one_allowances->mininum?>">
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div> 
                        </div>
                        <div class="col-xs-6 r-inner-details">
                            <div class="col-xs-12">
                                <h4 class="r-h4"> إعدادات أنواع الخصومات </h4>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">تأمينات</h4>
                                             
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text"  onkeypress="validate_number(event)"  name="k_tamen"  id="k_tamen"  readonly class="r-inner-h4"  placeholder="تأمينات" data-validation="required" >
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        
                </div>         
                       <!------------------------------------------------------------------->
                        <div class="col-xs-12">
                            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5">
                                <span><i class="fa fa-floppy-o" ></i></span> حفظ </button>
                        </div>
                      <!------------------------------------------------------------------->
                            <?php echo form_close(); }?>
                        </div>
                    </div>
                </div>

                <?php if(isset($records)&&$records!=null){ ?>
                <div class="col-xs-12" >
                    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                        <div class="panel-heading">
                            <h3 class="panel-title"></h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12 r-inner-details">
                                <div class="panel-body">
                                    <div class="fade in active">
                                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">م</th>
                                                    <th class="text-center">إسم الموظف</th>
                                                    <th>الإدارة</th>
                                                    <th>القسم</th>
                                                    <th>التفاصيل</th>
                                                    <th class="text-center">الاجراء</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php
                                                $a=1;
                                                foreach ($records as $record ):?>
                                                <tr>
                                                    <td><?php echo $a ?></td>
                                                    <td><? echo $record->employee;?></td>
                                                    <td><?=$record->admin_name?></td>
                                                    <td><?=$record->dep_name?></td>
                                                    <td>
                                                        <button data-toggle="modal" data-target="#modal-info<?=$record->id?>" class="btn btn-sm btn-info"><i class="fa fa-list btn-info"></i>  تفاصيل الموظف </button>
                                                    </td>
                                                    <td><a href="<?php echo base_url('Administrative_affairs/edit_employee').'/'.$record->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                    <span> </span>
                                                    <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/delete_employee/".$record->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a> </td>
                                                </tr>
                                                <?php
                                                $a++;
                                                endforeach;  ?>
                                            </tbody>
                                        </table>
                                    <?php foreach ($records as $record) { ?>
    <div class="modal" id="modal-info<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> بيانات الموظف (<?=$record->employee?>)</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>الإدارة</th><td><?=$record->admin_name?></td>
                                <th>القسم</th><td><?=$record->dep_name?></td>
                            </tr>
                            <tr>
                                <th>الرقم التأميني</th><td><?=$record->insurance_num?></td>
                                <th>نوع العقد</th><td><?=$record->title?></td>
                            </tr>
                            <tr>
                                <th>رقم الهوية</th><td><?=$record->id_num?></td>
                                <th>العنوان الوطني</th><td><?=$record->address?></td>
                            </tr>
                            <tr>
                                <th>رقم الجوال</th><td><?=$record->mobile?></td>
                                <th>رقم الهاتف</th><td><?=$record->phone_num?></td>
                            </tr>
                            <tr>
                                <th>الدرجة الوظيفية</th><td><?=$record->degree_id?></td>
                                <th>المؤهل العلمي</th><td><?=$record->scientific_qualification?></td>
                            </tr>
                                <tr>
                                <th>بدل سكن</th><td><?=$record->b_sakn?></td>
                                <th>بدل مواصلات</th><td><?=$record->b_mosalat?></td>
                            </tr>
                            <tr>
                                <th>بدل طبيعة عمل</th><td><?=$record->b_amal?></td>
                                <th>بدل غلاء معيشة</th><td><?=$record->b_maesha?></td>
                            </tr>


                            <tr>
                                <th>مرفق عقد</th><td>
                                    <?php if($record->img != "0"){ ?>
                                    <a href="<?=base_url().'Administrative_affairs/downloads/'.$record->img?>"><i class="fa fa-download"></i></a>
                                    <?php }else{
                                        echo'لا يوجد ملف';
                                    } ?></td>
                                <th>مرفق الدورات التدريبية</th><td>
                                    <?php if($record->training != "0"){ ?>
                                    <a href="<?=base_url().'Administrative_affairs/downloads/'.$record->training?>"><i class="fa fa-download"></i></a>
                                    <?php }else{
                                        echo'لا يوجد ملف';
                                    } ?></td>
                            </tr>

                            <tr>
                                <th>تأمينات</th><td><?=$record->k_tamen?></td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <? } ?>

<div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                </div>
                <div class="modal-body">
                    <p id="text">هل أنت متأكد من الحذف؟</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                    <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove" id="Delete-Record">نعم</button></a>
                </div>
            </div>
        </div>
    </div>


                <script>
                    function lood(num){
                        
                        if(num>0 && num != '')
                        {
                          
                            var id = num;
                            var dataString = 'admin_num=' + id ;
                            $.ajax({
                                type:'post',
                                url: '<?php echo base_url() ?>Administrative_affairs/add_employee',
                                data:dataString,
                                dataType: 'html',
                                cache:false,
                                success: function(html){
                                 
                                    $("#optionearea1").html(html);
                                }
                            });
                            return false;
                        }
                
                    }
                </script>
                
                
                <script>


                    function getFamilyNumber() {
                        var males = parseInt($('#male_number').val());
                        if($('#female_number').val()){
                            var females = parseInt($('#female_number').val());
                        }else{
                            var females = 0;
                        }
                        var all =  males + females;
                        $('#family_members_number').val(all);
                    }



                    document.getElementById("salary").onkeyup = function () {
                        var i;
                        for (i = 1; i <= 5; i++) {
                            var percent = $('#percent' + i).val();
                            var mininum = $('#mininum' + i).val();
                            document.getElementById(i).value =(this.value * percent /100);
                            if( document.getElementById(i).value  < mininum){
                                document.getElementById(i).value =   mininum
                            }
                        }
                        var tamen =(this.value * 10 /100 )
                        var bdl_sakn = document.getElementById(1).value;
                        document.getElementById("k_tamen").value =( parseInt(tamen) + parseInt(bdl_sakn) );
                    };




                    function getMinimum() {
                        var i;
                        for (i = 1; i <= 5; i++) {
                            var mininum = $('#mininum' + i).val();

                            if( document.getElementById(i).value  < mininum){
                                document.getElementById(i).value =   mininum
                            }
                        }

                    }

                    function getTamen(){
                        var salary=$('#salary').val()
                        var tamen =(salary * 10 /100 )
                        var bdl_sakn = document.getElementById(1).value;
                        document.getElementById("k_tamen").value =( parseInt(tamen) + parseInt(bdl_sakn) );


                    }

</script>



