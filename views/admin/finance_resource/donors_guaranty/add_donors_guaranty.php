

<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php //$this->load->view('admin/finance_resource/main_tabs'); ?>

            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('finance_resource/add_donors_guaranty')?>
                    <div class="col-xs-12">

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اختر مؤسسة / فرد </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select id="r-moasasa"  name="donor_type">
                                        <option>إختر </option>
                                        <option value="1">فرد</option>
                                        <option value="2"> مؤسسة</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  اختر كفيل / متبرع  </h4>
                                </div>
                                <div class="col-xs-6 r-input "   >
                                    <select name="type" id="contract" onchange=" return go($('#contract').val())">
                                        <option value="0"> - اختر - </option>
                                        <option value="1">كفيل</option>
                                        <option value="2">متبرع</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الاسم  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="person_name" />
                                </div>
                            </div>


                        <!-------------------------->
                              <div class="col-xs-12 "  id="contract_id">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  تاريخ تسجيل الكفالة  </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="guaranty_date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        <!---------------------------->
                                                    <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   طريقه السداد   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select  name="person_pay_method_id_fk" id="style_resourss" onchange=" return go2($('#style_resourss').val())">
                                        <?  $pay = array('إختر','نقدي','شيك','حوالة بنكية','استقطاع','بنك','شبكة');

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
                                    <!--input type="text" class="r-inner-h4 " name="bank_code_fk" /-->
                        <select class=" form-control" name="bank_code_fk"  id="bank_code_fk" >
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
                                    <input type="number" class="r-inner-h4 " name="bank_account_number" />
                                </div>
                            </div>
							
							
                        
                        
                        
<!--
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   طريقه السداد   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select  name="person_pay_method_id_fk" id="style_resourss" onchange=" return go2($('#style_resourss').val())">
                                        <?  $pay = array('إختر','نقدي','شيك','حوالة بنكية','استقطاع','بنك');

                                        for($a=0;$a<sizeof($pay);$a++):?>
                                            <option value="<?echo $a;?>"><?echo $pay[$a];?></option>
                                        <?endfor?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 " id="style_resours" style="display: none">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اسم البنك      </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="bank_code_fk" />
                                </div>
                            </div>


-->









                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  النوع   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="gender_id_fk">
                                        <option value="0"> - اختر - </option>
                                        <option value="1"> ذكر</option>
                                        <option value="2"> انثي </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الجنسية </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="nationality_id_fk">
                                        <option value="0"> - اختر - </option>
                                        <?php  foreach ($nationality as $record):?>
                                            <option value="<?php  echo $record->id;?>"><?php  echo $record->title;?></option>
                                        <?php  endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> المهنة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="guaranty_job">
                                        <option value="0"> - اختر - </option>
                                        <option value="1">موظف حكومي</option>
                                        <option value="2"> موظف قطاع خاص</option>
                                        <option value="3"> اعمال حرة </option>
                                        <option value="4"> لا يعمل</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  جهه العمل   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="guaranty_job_place">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> ملاحظات </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <textarea class="r-textarea" name="guaranty_note"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                        
                          <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اسم المستخدم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="person_name" />
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  كلمة المرور  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="password" class="r-inner-h4 " id="person_password" name="person_password" />
                                </div>
                            </div>
                        
                        
                        
                        
                      

    <div class="col-xs-12 " id="contract_id_d">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 "> تاريخ بداية الكفالة </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="guaranty_start" placeholder="شهر / يوم / سنة "  >
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-12 " id="contract_id_f" >
                                <div   >
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ نهاية الكفالة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                        <div class="docs-datepicker">
                                            <div class="input-group">
                                                <input type="text" class="form-control docs-date" name="guaranty_end"    placeholder="شهر / يوم / سنة "  >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
       
       <div class="col-xs-12" id="contract_id_c">
    <div class="col-xs-6">
        <h4 class="r-h4"> عددالدفعات  </h4>
    </div>
    <div class="col-xs-6 r-input">
        <input type="number" class="r-inner-h4"  name="num_payments" required />
    </div>
</div>        
                
      <!--onkeypress="return isNumberKey(event)"-->                      
                            
                            
                            

<div class="col-xs-12" id="contract_id_qq">
<div class="col-xs-6">
<h4 class="r-h4"> عدد الايتام المكفولين  </h4>
</div>
<div class="col-xs-6 r-input">
<input type="text" name="num_of_aytam" class="r-inner-h4" required />
</div>
</div>


<div class="col-xs-12" id="contract_id_qqq">
<div class="col-xs-6">
<h4 class="r-h4"> مبلغ الكفالة   </h4>
</div>
<div class="col-xs-6 r-input">
<input type="text" name="need_paid" class="r-inner-h4" required />
</div>
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
                            
                            
                            
                            
                            <div class="col-xs-12" id="contract_id_t">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع الكفالة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="guaranty_type" id="guaranty_type" >
                                        <option   value=""> إختر</option>
                                        <?php if(!empty($guaranty_types)):
                                            foreach ($guaranty_types as $record):?>
                                                <option value="<? echo $record->id;?>"><? echo $record->title;?></option>
                                            <?php  endforeach;endif;?>
                                    </select>
                                </div>


                            </div>


                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  نوع الهوية   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="national_type_id_fk">
                                        <?php
                                        $national_id_array =array('- اختر -','الهوية الوطنية','إقامة','وثيقة','جواز سفر');
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
                                    <input type="number" class="r-inner-h4" name="national_id_fk">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الجوال </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4 " name="person_guaranty_mob">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   البريد الالكتروني </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="email" class="r-inner-h4 "  id="user_email" name="guaranty_email" />
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

                                        <input type="text"  value="" size="40" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                        <input type="file" name="national_id_img" class="file_input_with_replacement">
                                    </div>
                                </td>
                                <td></td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>بطاقة المصرف</td>
                                <td style="width: 35%;">
                                    <div class="field">

                                        <input type="text"  value="" size="40" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                        <input type="file" name="bank_card_img" class="file_input_with_replacement">
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>وصل إستقطاع البنك </td>
                                <td style="width: 35%;">
                                    <div class="field">

                                        <input type="text"  value="" size="40" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                        <input type="file" name="bank_deduction_voucher_img" class="file_input_with_replacement">
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>أخري</td>
                                <td style="width: 35%;">
                                    <div class="field">

                                        <input type="text"  value="" size="40" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                        <input type="file" name="other_img" class="file_input_with_replacement">
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
                            <input type="submit" role="button" name="save" value="حفظ" class="btn pull-right">

                        </div>
                        <?php echo form_close()?>
                        <div class="col-xs-2">
                            <button class="btn pull-left" > عودة </button>
                        </div>
                        <div class="col-xs-4"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>





<!--    <script>
        function valid_chik_one()
        {
            if($("#person_password").val() == $("#user_pass_validate").val()){
                document.getElementById('validate_one').style.color = '#00FF00';
                document.getElementById('validate_one').innerHTML = 'كلمة المرور متطابقة';
            }else{
                document.getElementById('validate_one').style.color = '#F00';
                document.getElementById('validate_one').innerHTML = 'كلمة المرور غير متطابقة';
            }
        }

        function valid_chik_org()
        {
            if($("#corporation_password").val() == $("#corporation_password_validate").val()){
                document.getElementById('validate_org').style.color = '#00FF00';
                document.getElementById('validate_org').innerHTML = 'كلمة المرور متطابقة';
            }else{
                document.getElementById('validate_org').style.color = '#F00';
                document.getElementById('validate_org').innerHTML = 'كلمة المرور غير متطابقة';
            }
        }


        function validate_e()
        {  //alert($("#user_email_validate").val());
            if($("#user_email").val() == $("#user_email_validate").val()){
                document.getElementById('validate_E').style.color = '#00FF00';
                document.getElementById('validate_E').innerHTML = 'الايميل متطابق';
            }else{
                document.getElementById('validate_E').style.color = '#F00';
                document.getElementById('validate_E').innerHTML = 'الايميل غير متطابق';
            }
        }




    </script>
-->

        <script>
            $(document).ready(function () {
                $('#contract_id').hide();
            });

            function go(valu) {
                if(valu === '1'){
                    $('#contract_id').show();
                    $('#contract_id_d').show();
                    $('#contract_id_f').show();
                    $('#contract_id_t').show();
                    $('#contract_id_c').show();
                    $('#contract_id_qq').show();
                     $('#contract_id_qqq').show();

                }else{
                    $('#contract_id_d').hide();
                    $('#contract_id_f').hide();
                    $('#contract_id_t').hide();

                    $('#contract_id').hide();
                     $('#contract_id_c').hide();
                     
                    $('#contract_id_qq').hide();
                     $('#contract_id_qqq').hide();
                 
                }

            }
        </script>


        <script>
            $(document).ready(function () {

                $('#style_resours').hide();

            });

       /*     function go2(valu) {
                if(valu === '1'){
                    $('#style_resours').hide();


                }else{

                    $('#style_resours').show();

                }

            }*/
            
            
            
            
            
                     function go2(valu) {
                if(valu === '1' ){
                 $('#style_resours').hide();
                   $('#style_resoursx').hide();
                }else{
                    if(valu === '6'){
                       $('#style_resours').hide();
                   $('#style_resoursx').hide();
   
                    }else{
                      $('#style_resours').show();
                     $('#style_resoursx').show();   
                    }
                    
                }

            }
        </script>
