<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
<?php if(isset($results) && $results !=null){ ?>
    <div class="col-sm-11 col-xs-12">
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('Donors/Donors_t/edit_donors/'.$results[0]->id)?>
                        <div class="col-xs-12 col-sm-12 col-xs-12 inner-side r-data ">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اختر مؤسسة / فرد </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select id="r-moasasa"  name="donor_type" class="form-control selectpicker"  data-live-search="true"  data-validation="required" aria-required="true" onchange=" return show_hidden($('#r-moasasa').val())" >
                                        <? $arr=array('إختر','فردي','مؤسسة');
                                        for($s=0;$s<sizeof($arr);$s++):
                                            $select='';
                                            if($results[0]->donor_type ==$s){
                                                $select='selected';
                                            }
                                            ?>
                                            <option value="<? echo $s; ?>" <? echo $select;?>><? echo$arr[$s]; ?></option>
                                        <? endfor;?>
                                    </select>
                                </div>
                            </div>
                            
                          <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الاسم  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " value="<?php echo $results[0]->user_name; ?>"  name="person_name"  data-validation="required" aria-required="true" />
                                </div>
                            </div>


                             <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   طريقه السداد   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select  id="style_resourss"  name="person_pay_method_id_fk"  onchange=" return go2($('#style_resourss').val())"  class="form-control selectpicker"  data-live-search="true"  data-validation="required" aria-required="true">
                                        <?  $pay = array('نقدي','شيك','حوالة بنكية','استقطاع','بنك','شبكة');

                                        for($a=0;$a<sizeof($pay);$a++):
                                            $sec='';
                                            if($a == $results[0]->pay_method_id_fk){
                                                $sec='selected';
                                            }?>
                                            <option value="<?echo $a;?>" <? echo $sec;?>><?echo $pay[$a];?></option>
                                        <?endfor?>

                                    </select>
                                </div>
                            </div>

                            <?php if($results[0]->pay_method_id_fk== 0){ ?>
                        
                            <?php }elseif($results[0]->pay_method_id_fk== 5){
                                
                            }else{ ?>
                                   <div class="col-xs-12 " id="style_resours" >
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اسم البنك </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <!--input type="text" class="r-inner-h4 " name="bank_code_fk" /-->
                        <select  class="form-control selectpicker"  data-live-search="true"  data-validation="required" aria-required="true" name="bank_code_fk"  id="bank_code_fk" >
                        <option value=""> إختر البنك</option>
                        <?php if($banks){ 
                        foreach ($banks as $banks_data){
                      if( $results[0]->bank_code_fk == $banks_data->id){
                        $select_bank='selected="selected"';
                      }else{
                        $select_bank='';
                      }
                        ?>
                        <option  <?php echo $select_bank ;?> value="<?php echo $banks_data->id;?>"  >
                        <?php echo $banks_data->bank_name;?></option>
                        <?php } 
                        }?>
                      </select>
                                </div>
                            </div>

                             <div class="col-xs-12 " id="style_resoursx" >
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الحساب</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4 " value="<?php echo $results[0]->bank_account_number ;?>" name="bank_account_number"   data-validation="required" aria-required="true" />
                                </div>
                            </div>
                            <?php } ?>
                                
                                
                                 <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  النوع   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="gender_id_fk" class="form-control selectpicker"  data-live-search="true"  data-validation="required" aria-required="true">
                                        <option value="">إختر </option>
                                         <?php  $type= array('ذكر','انثي');
                                          for($f=0;$f<sizeof($type);$f++):
                                          $secx='';
                                            if($f == $results[0]->gender_id_fk){
                                                $secx='selected';
                                            }
                                          
                                          ?>
                                            <option value="<?echo $f;?>" <?php echo $secx; ?> ><?echo $type[$f];?></option>
                                        <?endfor?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الجنسية </h4>
                                </div>
                                <div class="col-xs-6 r-input" >
                                    <select name="nationality_id_fk" class="form-control selectpicker"  data-live-search="true"  data-validation="required" aria-required="true">
                                        <option value=""> - اختر - </option>
                                        <?php  foreach ($nationality as $record):
                                        $select='';
                                            if($results[0]->nationality_id_fk==$record->id){
                                                $select='selected';
                                            }
                                        ?>
                                            <option value="<?php  echo $record->id;?>" <?php echo $select; ?> ><?php  echo $record->title;?></option>
                                        <?php  endforeach;?>
                                    </select>
                                </div>
                            </div>
                            
                            <?php if($results[0]->donor_type == 1){ ?>
                            <div class="col-xs-12" id="guaranty_job">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> المهنة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="guaranty_job" class="form-control selectpicker"  data-live-search="true"   >
                                     <option value="">إختر </option>
                                     <?php  $job= array('موظف حكومي','موظف قطاع خاص','اعمال حرة','لا يعمل');
                                          for($o=0;$o<sizeof($job);$o++):
                                           $sect='';
                                            if($results[0]->guaranty_job == $o){
                                                $sect='selected';
                                            } ?>
                                            <option value="<?echo $o;?>"  <?php echo  $sect;?> ><?echo $job[$o];?></option>
                                        <?endfor?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12" id="activity" style="display: none" >
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نشاط المؤسسة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                <textarea name="activity"></textarea>
                                </div>
                            </div>
                            
                            <?php }else{ ?>
                                
                                <div class="col-xs-12" id="guaranty_job" style="display: none">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> المهنة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="guaranty_job" class="form-control selectpicker"  data-live-search="true" >
                                     <option value="">إختر </option>
                                     <?php  $job= array('موظف حكومي','موظف قطاع خاص','اعمال حرة','لا يعمل');
                                          for($o=0;$o<sizeof($job);$o++):?>
                                            <option value="<?echo $o;?>"><?echo $job[$o];?></option>
                                        <?endfor?>
                                    </select>
                                </div>
                            </div>
                                <div class="col-xs-12" id="activity" >
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نشاط المؤسسة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                <textarea name="activity"><?php echo $results[0]->activity; ?></textarea>
                                </div>
                            </div> 
                          <?php } ?>
                            
                               
                            
                                <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  جهه العمل   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " value="<?php echo $results[0]->guaranty_job_place ;?>" name="guaranty_job_place"   data-validation="required" aria-required="true" />
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> ملاحظات </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <textarea class="r-textarea" name="guaranty_note"   data-validation="required" aria-required="true">
                                   <?php echo $results[0]->guaranty_note ;?>
                                    </textarea>
                                </div>
                            </div>
                            </div>
                            
                            
                              <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                        
                          <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اسم المستخدم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " value="<? echo $results[0]->user_name; ?>" name="person_name"   data-validation="required" aria-required="true" />
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  كلمة المرور  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="password" class="r-inner-h4 " id="person_password" name="person_password" data-validation="required" aria-required="true" />
                                </div>
                            </div>
                           <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  نوع الهوية   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                  
                                    <select name="national_type_id_fk" class="form-control selectpicker"  data-live-search="true"  data-validation="required" aria-required="true">
                                         <option value="">إختر </option>
                                        <?php
                                        $national_id_array =array('الهوية الوطنية','إقامة','وثيقة','جواز سفر');
                                        foreach ($national_id_array as $k=>$v):
                                            $secee='';
                                            if($k == $results[0]->national_type_id_fk){
                                                $secee='selected';
                                            }
                                            
                                            ?>
                                            <option value="<?php  echo $k;?>" <?php echo $secee;?> ><?php  echo $v;?></option>
                                        <?php  endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الهوية </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" name="national_id_fk" value="<? echo $results[0]->national_id_fk;?>"  data-validation="required" aria-required="true"/>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الجوال </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4 " value="<? echo $results[0]->guaranty_mob;?>" name="person_guaranty_mob"  data-validation="required" aria-required="true" />
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   البريد الالكتروني </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="email" class="r-inner-h4 "  id="user_email" name="guaranty_email" value="<? echo $results[0]->guaranty_email;?>"  data-validation="required" aria-required="true"  />
                                </div>
                            </div>
                            </div>
                            
                            <div class="col-xs-12 r-inner-details">
                        <table style="width:100%">
                            <tr>
                                <th>م </th>
                                <th>اسم الملف </th>
                                <th> ارفاق</th>
                                <th>فتح الملف</th>

                            </tr>
                            <tr>
                                <td>1</td>
                                <td>صور الهوية الوطنية </td>
                                <td style="width: 35%;">
                                    <div class="field">

                                        <input type="text"   class="erfa2 file_input_replacement"  placeholder="ارفاق" />
                                        <input type="file" name="national_id_img" class="file_input_with_replacement" />
                                    </div>
                                </td>
                                <td><?php if(empty($results[0]->national_id_img)){?>
                                    <p>لا يوجد ارفاق</p>
                                <?php }else{?>
                                    <img src="<?php echo base_url('uploads/images/'.$results[0]->national_id_img.''); ?>" height="100px" width="100px">
                                <?php } ?> </td>  

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>بطاقة المصرف</td>
                                <td style="width: 35%;">
                                    <div class="field">

                                        <input type="text"  class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                        <input type="file" name="bank_card_img" class="file_input_with_replacement"  />
                                    </div>
                                </td>
                                  <td><?php if(empty($results[0]->bank_card_img)){?>
                                    <p>لا يوجد ارفاق</p>
                                <?php }else{?>
                                    <img src="<?php echo base_url('uploads/images/'.$results[0]->bank_card_img.''); ?>" height="100px" width="100px">
                                <?php } ?>  </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>وصل إستقطاع البنك </td>
                                <td style="width: 35%;">
                                    <div class="field">

                                        <input type="text"   class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                        <input type="file" name="bank_deduction_voucher_img" class="file_input_with_replacement" />
                                    </div>
                                </td>
                                <td><?php if(empty($results[0]->bank_deduction_voucher_img)){?>
                                    <p>لا يوجد ارفاق</p>
                                <?php }else{?>
                                    <img src="<?php echo base_url('uploads/images/'.$results[0]->bank_deduction_voucher_img.''); ?>" height="100px" width="100px">
                                <?php } ?> </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>أخري</td>
                                <td style="width: 35%;">
                                    <div class="field">

                                        <input type="text"  class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                        <input type="file" name="other_img" class="file_input_with_replacement"  />
                                    </div>
                                </td>

                                <td><?php if(empty($results[0]->other_img)){?>
                                    <p>لا يوجد ارفاق</p>
                                <?php }else{?>
                                <img src="<?php echo base_url('uploads/images/'.$results[0]->other_img.''); ?>" height="100px" width="100px">
                                <?php } ?>
                            </td>  
                            </tr>
                        </table>
                        <div class="col-xs-12 r-xs">
                            <h5 class="text-center">تفاصيل</h5>
                            <div class="col-xs-12 r-del">
                                <div class="col-xs-5">
                                    <h4> م : </h4>
                                    <h4> اسم الملف : </h4>
                                    <h4> ارفاق : </h4>
                                    <h4> فتح الملف : </h4>
                                </div>
                                <div class="col-xs-7">
                                    <h4>1 </h4>
                                    <h4> موظف استقبال</h4>
                                    <h4> موظف استقبال </h4>
                                    <h4>   </h4>
                                </div>
                            </div>
                            <div class="col-xs-12 r-del">
                                <div class="col-xs-5">
                                    <h4> م : </h4>
                                    <h4> اسم الملف : </h4>
                                    <h4> ارفاق : </h4>
                                    <h4> فتح الملف : </h4>
                                </div>
                                <div class="col-xs-7">
                                    <h4>2 </h4>
                                    <h4> موظف استقبال</h4>
                                    <h4> موظف استقبال </h4>
                                    <h4>   </h4>
                                </div>
                            </div>

                            <div class="col-xs-12 r-del">
                                <div class="col-xs-5">
                                    <h4> م : </h4>
                                    <h4> اسم الملف : </h4>
                                    <h4> ارفاق : </h4>
                                    <h4> فتح الملف : </h4>
                                </div>
                                <div class="col-xs-7">
                                    <h4>3</h4>
                                    <h4> موظف استقبال</h4>
                                    <h4> موظف استقبال </h4>
                                    <h4>   </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                            <div class="col-xs-12 r-inner-btn">
                        <div class="col-xs-3">
                        </div>
                        <div class="col-xs-3">
                            <input type="submit"  name="save" value="تعديل" class="btn pull-right"/>

                        </div>
                        
                        <div class="col-xs-2">
                            <button class="btn pull-left" > عودة </button>
                        </div>
                        
                    </div> 
                            
                            </div>
                             <?php echo form_close()?>
                              </div>
                            </div>
                             </div>
                           
    
    
<?php }else{?>
        <div class="col-sm-11 col-xs-12">
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('Donors/Donors_t/add_donors')?>
                    
                    <div class="col-xs-12 col-sm-12 col-xs-12 inner-side r-data ">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                           
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اختر مؤسسة / فرد </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select id="r-moasasa"  name="donor_type" class="form-control selectpicker"  data-live-search="true"  data-validation="required" aria-required="true" onchange=" return show_hidden($('#r-moasasa').val())" >
                                        <option value="">إختر </option>
                                        <option value="1">فرد</option>
                                        <option value="2"> مؤسسة</option>
                                    </select>
                                </div>
                            </div>
                       
                           
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الاسم  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 "  name="person_name"  data-validation="required" aria-required="true" />
                                </div>
                            </div>


                        <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   طريقه السداد   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select  name="person_pay_method_id_fk" id="style_resourss" class="form-control selectpicker"  data-live-search="true"  data-validation="required" aria-required="true" onchange=" return go2($('#style_resourss').val())" >
                                         <option value="">إختر </option>
                                        <?  $pay = array('نقدي','شيك','حوالة بنكية','استقطاع','بنك','شبكة');

                                        for($a=0;$a<sizeof($pay);$a++):?>
                                            <option value="<?echo $a;?>"><?echo $pay[$a];?></option>
                                        <?endfor?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 " id="style_resours" style="display: none">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اسم البنك </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                        <select name="bank_code_fk"  id="bank_code_fk" class="form-control selectpicker"  data-live-search="true" >
                        <option value=""> إختر البنك</option>
                        <?php if($banks){ 
                        foreach ($banks as $banks_data){
                        ?>
                        <option value="<?php echo $banks_data->id;?>"  >
                        <?php echo $banks_data->bank_name;?></option>
                        <?php } 
                        }?>
                      </select>
                      </div>
                      </div>

                             <div class="col-xs-12 " id="style_resoursx" style="display: none">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الحساب</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4 " name="bank_account_number"    />
                                </div>
                            </div>
		                   <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  النوع   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="gender_id_fk" class="form-control selectpicker"  data-live-search="true"  data-validation="required" aria-required="true">
                                        <option value="">إختر </option>
                                         <?php  $type= array('ذكر','انثي');
                                          for($f=0;$f<sizeof($type);$f++):?>
                                            <option value="<?echo $f;?>"><?echo $type[$f];?></option>
                                        <?endfor?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الجنسية </h4>
                                </div>
                                <div class="col-xs-6 r-input" >
                                    <select name="nationality_id_fk" class="form-control selectpicker"  data-live-search="true"  data-validation="required" aria-required="true">
                                        <option value=""> - اختر - </option>
                                        <?php  foreach ($nationality as $record):?>
                                            <option value="<?php  echo $record->id;?>"><?php  echo $record->title;?></option>
                                        <?php  endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12" id="guaranty_job">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> المهنة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="guaranty_job" class="form-control selectpicker"  data-live-search="true"  data-validation="required" aria-required="true" >
                                     <option value="">إختر </option>
                                     <?php  $job= array('موظف حكومي','موظف قطاع خاص','اعمال حرة','لا يعمل');
                                          for($o=0;$o<sizeof($job);$o++):?>
                                            <option value="<?echo $o;?>"><?echo $job[$o];?></option>
                                        <?endfor?>
                                    </select>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-xs-12" id="activity" style="display: none" >
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نشاط المؤسسة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                <textarea name="activity"></textarea>
                                </div>
                            </div>
                            
                            
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  جهه العمل   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="guaranty_job_place"   data-validation="required" aria-required="true" />
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> ملاحظات </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <textarea class="r-textarea" name="guaranty_note"   data-validation="required" aria-required="true"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                        
                          <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اسم المستخدم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="person_name"   data-validation="required" aria-required="true" />
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  كلمة المرور  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="password" class="r-inner-h4 " id="person_password" name="person_password" data-validation="required" aria-required="true" />
                                </div>
                            </div>
                           <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  نوع الهوية   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                  
                                    <select name="national_type_id_fk" class="form-control selectpicker"  data-live-search="true"  data-validation="required" aria-required="true">
                                         <option value="">إختر </option>
                                        <?php
                                        $national_id_array =array('الهوية الوطنية','إقامة','وثيقة','جواز سفر');
                                        foreach ($national_id_array as $k=>$v):
                                            ?>
                                            <option value="<?php  echo $k;?>"><?php  echo $v;?></option>
                                        <?php  endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الهوية </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" name="national_id_fk"   data-validation="required" aria-required="true"/>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الجوال </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4 " name="person_guaranty_mob"  data-validation="required" aria-required="true" />
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   البريد الالكتروني </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="email" class="r-inner-h4 "  id="user_email" name="guaranty_email"  data-validation="required" aria-required="true"  />
                                </div>
                            </div>


                    </div>

                    <div class="col-xs-12 r-inner-details">
                        <table style="width:100%">
                            <tr>
                                <th>م </th>
                                <th>اسم الملف </th>
                                <th> ارفاق</th>
                                <th>فتح الملف</th>

                            </tr>
                            <tr>
                                <td>1</td>
                                <td>صور الهوية الوطنية </td>
                                <td style="width: 35%;">
                                    <div class="field">

                                        <input type="text"   class="erfa2 file_input_replacement"  placeholder="ارفاق" />
                                        <input type="file" name="national_id_img" class="file_input_with_replacement"  data-validation="required" aria-required="true" />
                                    </div>
                                </td>
                                <td></td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>بطاقة المصرف</td>
                                <td style="width: 35%;">
                                    <div class="field">

                                        <input type="text"  class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                        <input type="file" name="bank_card_img" class="file_input_with_replacement" data-validation="required" aria-required="true" />
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>وصل إستقطاع البنك </td>
                                <td style="width: 35%;">
                                    <div class="field">

                                        <input type="text"   class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                        <input type="file" name="bank_deduction_voucher_img" class="file_input_with_replacement" data-validation="required" aria-required="true" />
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>أخري</td>
                                <td style="width: 35%;">
                                    <div class="field">

                                        <input type="text"  class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                        <input type="file" name="other_img" class="file_input_with_replacement" data-validation="required" aria-required="true" />
                                    </div>
                                </td>

                                <td></td>
                            </tr>
                        </table>
                        <div class="col-xs-12 r-xs">
                            <h5 class="text-center">تفاصيل</h5>
                            <div class="col-xs-12 r-del">
                                <div class="col-xs-5">
                                    <h4> م : </h4>
                                    <h4> اسم الملف : </h4>
                                    <h4> ارفاق : </h4>
                                    <h4> فتح الملف : </h4>
                                </div>
                                <div class="col-xs-7">
                                    <h4>1 </h4>
                                    <h4> موظف استقبال</h4>
                                    <h4> موظف استقبال </h4>
                                    <h4>   </h4>
                                </div>
                            </div>
                            <div class="col-xs-12 r-del">
                                <div class="col-xs-5">
                                    <h4> م : </h4>
                                    <h4> اسم الملف : </h4>
                                    <h4> ارفاق : </h4>
                                    <h4> فتح الملف : </h4>
                                </div>
                                <div class="col-xs-7">
                                    <h4>2 </h4>
                                    <h4> موظف استقبال</h4>
                                    <h4> موظف استقبال </h4>
                                    <h4>   </h4>
                                </div>
                            </div>

                            <div class="col-xs-12 r-del">
                                <div class="col-xs-5">
                                    <h4> م : </h4>
                                    <h4> اسم الملف : </h4>
                                    <h4> ارفاق : </h4>
                                    <h4> فتح الملف : </h4>
                                </div>
                                <div class="col-xs-7">
                                    <h4>3</h4>
                                    <h4> موظف استقبال</h4>
                                    <h4> موظف استقبال </h4>
                                    <h4>   </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 r-inner-btn">
                        <div class="col-xs-3">
                        </div>
                        <div class="col-xs-3">
                            <input type="submit"  name="save" value="حفظ" class="btn pull-right"/>

                        </div>
                        
                        <div class="col-xs-2">
                            <button class="btn pull-left" > عودة </button>
                        </div>
                        
                    </div>
                </div>
                <?php echo form_close()?>
            </div>
         </div>
</div> 
<?php } ?>
  
</div>
</div>
         
<div class="col-md-12  col-sm-12 col-xs-12">
<?php if(isset($records)&&$records!=null):?>
    <div class="col-xs-12">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
         <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-center">إسم المتبرع</th>
            <th  class="text-center">رقم الجوال</th>
            <th  class="text-center">التفاصيل</th>
            <th width="35%" class="text-center">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($records as $record):?>
            <tr>
                <td data-title="#" class="text-center"><span class="badge"><?php echo  $record->id?></span></td>
                <td data-title="" class="text-center"><?php echo $record->user_name?> </td>
                <td data-title="" class="text-center"><?php echo $record->guaranty_mob?> </td>
               <td>
               <button type="button" class="btn btn-info btn-xs col-lg-12" data-toggle="modal" data-target=".nineModal<?php echo $record->id;?>"><span><i class="fa fa-"></i></span> التفاصيل </button>
               </td>
               
               <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'Donors/Donors_t/edit_donors/'.$record->id?>">
                    <i class="fa fa-pencil " aria-hidden="true"></i></a>
                    <a href="<?php echo base_url().'Donors/Donors_t/delete_person/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>
              
               <div class=" modal fade nineModal<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-manage">
                                          <h5 style="padding: 10px 0; margin-bottom: 0;"> تفاصيل المتبرع</h5>
                                           <style>
                                            .inner-pop-table tr{
                                                margin-top: 15px;
                                            }
                                          .inner-pop-table tr th {
                                            background-color: #009688 !important;
                                            color: #fff;
                                           width: 25%;
                                            border-right: 1px solid #fff;
                                            padding: 10px 0 !important;
                                            }
                                            .inner-pop-table tr td{
                                                border: 1px solid #ddd;
                                                 padding: 10px 0 !important;
                                                  width: 25%;
                                            }
                                           </style>
                                           
                                            <table style="width:100%" class="inner-pop-table">
                                                
                                                <tr>
                                                    <td>فرد /مؤسسة</td>
                                                    
                                                    <td><?php 
                                                     
                                                    if($record->donor_type == '1'){
                                                       echo 'فرد';
                                                    }else{
                                                      echo 'مؤسسة';  
                                                    } ?></td>
                                                    <td>الاسم</td>
                                                    <td><?php echo $record->user_name; ?> </td>
                                                </tr>
                                                <tr>
                                                    <td>طريقه السداد</td>
                                                    <td><?php echo $pay[$record->pay_method_id_fk]; ?></td>
                                                    <?php if($pay[$record->pay_method_id_fk] == 1 || $pay[$record->pay_method_id_fk] ==6 ){
                                                      ?>
                                                    <td>النوع</td>
                                                    <td><?php echo $type[$record->gender_id_fk]; ?></td></tr>
                                                      <?php   
                                                    }else{ ?>
                                                     <td>اسم البنك</td>
                                                     <td>        
                       <?php if($banks){ 
                        foreach ($banks as $banks_data){
                       if($record->bank_code_fk == $banks_data->id){ ?>
                        
                       <?php 
                       echo $banks_data->bank_name;
                        }
                        ?>
                      
                        <?php } 
                        } ?>
                         </td>
                         </tr>     
                                                    <tr>
                                                    <td>رقم الحساب</td>
                                                    <td><?php echo $record->bank_account_number; ?></td>
                                                    <td>النوع</td>
                                                    <td><?php echo $type[$record->gender_id_fk]; ?></td></tr>
                                                    <?php }  ?>
                                               
                                                   
                                                    <tr>
                                                    <td>الجنسية</td>
                                                    <td>
                                                    <?php  foreach ($nationality as $nationalite):
                                                    if($record->nationality_id_fk ==$nationalite->id ){
                                                        echo $nationalite->title;
                                                    }
                                                    ?>
                                                 
                                                    <?php  endforeach;?>
                                                    </td>
                                                    <td>المهنة</td>
                                                    <td><?php echo $job[$record->guaranty_job]; ?></td>
                                                    </tr>
                                                    
                                                     <tr>
                                                    <td>جهه العمل</td>
                                                    <td>
                                                   <?php echo $record->guaranty_job_place; ?>
                                                    </td>
                                                    <td>نوع الهوية</td>
                                                    <td><?php echo $national_id_array[$record->national_type_id_fk]; ?></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>رقم الهوية</td>
                                                    <td>
                                                   <?php echo $record->national_id_fk; ?>
                                                    </td>
                                                    <td>رقم الجوال</td>
                                                    <td><?php echo $record->guaranty_mob; ?></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                    <td>البريد الالكتروني</td>
                                                    <td>
                                                   <?php echo $record->guaranty_email; ?>
                                                    </td>
                                                    <td>ملاحظات</td>
                                                    <td><?php echo $record->guaranty_note; ?></td>
                                                    </tr>
                                                    

                                                    
                                            </table>

                                            <div class="modal-footer ">
<button type="button" class="btn manage-close-pop manage-close-pop-sanad" data-dismiss="modal" style="  background-color: #009688;
    color: #fff;
    padding: 3px 0;">اغلاق</button>
                                            </div>
                                        </div>
                                    </div></td>
           </tr>
       <?php endforeach ;?>
        </tbody>
    </table>
</div>
<?php endif;?>
</div>

       <script type="text/javascript">
                                function isNumberKey(evt) {
                                    var charCode = (evt.which) ? evt.which : event.keyCode;
                                    
                                    if (charCode != 46 && charCode > 31 && (charCode <= 48 || charCode > 57)) {
                                        return false;
                                    } else {
                                        return true;
                                    }     
                                }
       </script>  
           <script>
            function show_hidden(valu){
               
                if(valu === '1'){
                    $('#activity').hide();
                    $('#guaranty_job').show();
                }else{
                    if(valu == '2'){
                       $('#activity').show();
                    $('#guaranty_job').hide(); 
                    }else{
                        $('#activity').show();
                    $('#guaranty_job').show();
                    }
                    
                   
                 
                }

            }
            
         function go2(valu) {
            
                if(valu === '0' ){
                 $('#style_resours').hide();
                   $('#style_resoursx').hide();
                }else{
                    if(valu === '5'){
                       $('#style_resours').hide();
                   $('#style_resoursx').hide();
   
                    }else{
                      $('#style_resours').show();
                     $('#style_resoursx').show();   
                    }
                    
                }

            }
            
        </script>
