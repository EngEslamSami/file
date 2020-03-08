
<style>
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content, #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)}
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)}
        to {transform:scale(1)}
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
    }
</style>
<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php  //$this->load->view('admin/finance_resource/main_tabs'); ?>

            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php  echo form_open_multipart('finance_resource/edit_donors_guaranty/'.$results[0]->id)?>
                    <?/* echo'<pre>';
					var_dump($results[0]->id);
					echo'</pre>';
					die  ;*/
                    ?>
                    <div class="col-xs-12 ">

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اختر مؤسسة / فرد </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select id="r-moasasa"  name="donor_type" <? echo $disabled;?>>
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
                        </div>
                        <input type="hidden" name="types"  id="types" value="<? echo $results[0]->donor_type ;?>"/>
                    </div>


                    <?if($results[0]->donor_type ==1){
                        $stylez= 'display: none;';
                        $style= '';
                    }elseif($results[0]->donor_type ==2){
                        $style= 'display: none;';
                        $stylez= '';
                    }?>

                    <!--section1111-->
                    <div class="col-xs-12 mo_types" style="<? echo $style;?>" >
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الاسم  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="person_name" value="<? echo $results[0]->user_name; ?>" <? echo $readonly;?> <? echo $readonly;?>>
                                </div>
                            </div>
                            <?php if($results[0]->type==2){?>
                                <div class="col-xs-12 " id="contract_id_d" style="display: none">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  بداية الكفالة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                        <div class="docs-datepicker">
                                            <div class="input-group">
                                                <input type="text" class="form-control docs-date" name="guaranty_start" value="<?php  if(!empty($results[0]->guaranty_start)){  echo date('d/m/Y',$results[0]->guaranty_start);} ?>" placeholder="شهر / يوم / سنة " >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }else{?>
                            <div class="col-xs-12 " id="contract_id_d">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  بداية الكفالة </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="guaranty_start" value="<?php   if(!empty($results[0]->guaranty_start)){echo date('d/m/Y',$results[0]->guaranty_start);} ?>" placeholder="شهر / يوم / سنة " >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>


						
							
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   طريقه السداد   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select  id="style_resourss"  name="person_pay_method_id_fk"  onchange=" return go2($('#style_resourss').val())" <? echo $disabled;?>
                                          >
                                        <?  $pay = array('إختر','نقدي','شيك','حوالة بنكية','استقطاع','بنك','شبكة');

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

                            <?php if($results[0]->pay_method_id_fk== 1){ ?>
                        
                            <?php }elseif($results[0]->pay_method_id_fk== 6){
                                
                            }else{ ?>
                                   <div class="col-xs-12 " id="style_resours" >
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اسم البنك </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <!--input type="text" class="r-inner-h4 " name="bank_code_fk" /-->
                        <select class=" form-control" name="bank_code_fk"  id="bank_code_fk" >
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
                                    <input type="number" class="r-inner-h4 " value="<?php echo $results[0]->bank_account_number ;?>" name="bank_account_number" />
                                </div>
                            </div>
<?php } ?>
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
                <select  id="style_resourss"  name="person_pay_method_id_fk"  onchange=" return go2($('#style_resourss').val())" <? echo $disabled;?>
                      >
                    <?  //$pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');
                    $pay = array('إختر','نقدي','شيك','حوالة بنكية','استقطاع','بنك','شبكة');

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

                            <?php if($results[0]->pay_method_id_fk==1){ ?>
                            <div class="col-xs-12 " id="style_resours" style="display: none">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> اسم البنك      </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="bank_code_fk" value="<?php echo $results[0]->bank_code_fk ?>" />

                                </div>
                            </div>
                            <?php }else{ ?>
                                <div class="col-xs-12 " id="style_resours" >
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> اسم البنك      </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="bank_code_fk" value="<?php echo $results[0]->bank_code_fk ?>" />

                                    </div>
                                </div>
<?php } ?>
-->                          
                          
                          
                          
                          
                          
                          
                          
                          
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  النوع   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="gender_id_fk"  <? echo $disabled;?>>
                                        <?  $gender_arr= array('إختر','ذكر','أنثي');
                                        for ($n=0;$n<sizeof($gender_arr);$n++):
                                            $sec='';
                                            if($n == $results[0]->gender_id_fk){
                                                $sec='selected';
                                            }?>
                                            <option value="<? echo $n;?>" <? echo $sec;?> > <? echo $gender_arr[$n]?></option>
                                        <? endfor;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الجنسية </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="nationality_id_fk" <? echo $disabled;?>>
                                        <option value="0"> - اختر - </option>
                                        <?php  foreach ($nationality as $record):
                                            $select='';
                                            if($results[0]->nationality_id_fk==$record->id){
                                                $select='selected';
                                            }?>
                                            <option value="<?php  echo $record->id;?>" <? echo $select;?>><?php  echo $record->title;?></option>
                                        <?php  endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> المهنة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="guaranty_job" <? echo $disabled;?>>
                                        <? $job_arr =array('إختر','موظف حكومي','موظف قطاع خاص','اعمال حرة','لا يعمل');
                                        for($d=0;$d<sizeof($job_arr);$d++):
                                            $sec='';
                                            if($results[0]->guaranty_job == $d){
                                                $sec='selected';
                                            }
                                            ?>

                                            <option value="<? echo $d;?>" <? echo $sec;?>><? echo $job_arr[$d];?></option>
                                        <? endfor;?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  جهه العمل   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 "  <? echo $readonly;?> name="guaranty_job_place" value="<? echo$results[0]->guaranty_job_place;?>">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> ملاحظات </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <textarea class="r-textarea" name="guaranty_note"  <? echo $readonly;?>><? echo $results[0]->guaranty_note ;?></textarea>
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
                                            <?php if($results[0]->type==1){ ?>
                                            <option value="0"> - اختر - </option>
                                            <option value="1" selected> كفيل</option>
                                            <option value="2">متبرع</option>
                                            <?php }else{?>
                                            <option value="0"> - اختر - </option>
                                            <option value="1" > كفيل</option>
                                            <option value="2"selected>متبرع</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>




<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4"> اسم المستخدم </h4>
</div>
<div class="col-xs-6 r-input">
<input type="text" class="r-inner-h4 " name="person_name" value="<? echo $results[0]->user_name; ?>" <? echo $readonly;?> <? echo $readonly;?>>
</div>
</div>
<div class="col-xs-12">
<div class="col-xs-6">
<h4 class="r-h4">  كلمة المرور  </h4>
</div>
<div class="col-xs-6 r-input">
<input type="password" class="r-inner-h4 "  id="person_password" name="person_password"   />
</div>
</div>


                            <?php if($results[0]->type==2){?>
                                <div class="col-xs-12 "   id="contract_id" style="display: none">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ تسجيل الكفالة</h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                        <div class="docs-datepicker">
                                            <div class="input-group">
                                                <input type="text" class="form-control docs-date" name="guaranty_date" value="<?php if(!empty($results[0]->guaranty_date)){echo date('d/m/Y',$results[0]->guaranty_date);} ?>"   placeholder="شهر / يوم / سنة " >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 " id="contract_id_f" style="display: none">
                                    <div id="guaranty_end">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4 "> تاريخ نهاية الكفالة </h4>
                                        </div>
                                        <div class="col-xs-6 r-input ">
                                            <div class="docs-datepicker">
                                                <div class="input-group">
                                                    <input type="text" class="form-control docs-date" name="guaranty_end" value="<?php if(!empty($results[0]->guaranty_end)){echo date('d/m/Y',$results[0]->guaranty_end);}  ?>"   placeholder="شهر / يوم / سنة " >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
<div class="col-xs-12" id="contract_id_c " style="display: none">
        <div class="col-xs-6">
            <h4 class="r-h4"> عدد الدفعات  </h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="number" class="r-inner-h4"  value="<?php if(!empty($results[0]->num_payments)){echo $results[0]->num_payments;}  ?>" name="num_payments" required />
        </div>
    </div>
                                
  

    <div class="col-xs-12" id="contract_id_qq">
<div class="col-xs-6">
<h4 class="r-h4"> عدد الايتام المكفولين  </h4>
</div>
<div class="col-xs-6 r-input">
<input type="text" name="num_of_aytam" value="<?php if(!empty($results[0]->num_of_aytam)){echo $results[0]->num_of_aytam;}  ?>" class="r-inner-h4" required />
</div>
</div>


<div class="col-xs-12" id="contract_id_qqq">
<div class="col-xs-6">
<h4 class="r-h4"> ما تريد دفعه   </h4>
</div>
<div class="col-xs-6 r-input">
<input type="text" name="need_paid" value="<?php if(!empty($results[0]->need_paid)){echo $results[0]->need_paid;}  ?>" class="r-inner-h4" required />
</div>
</div>
  
  
                                
                                
                                
                                
                                
                            <?php }else{?>

                            <div class="col-xs-12 "   id="contract_id">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  تاريخ تسجيل الكفالة  </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" name="guaranty_date" value="<?php if(!empty($results[0]->guaranty_date)){ echo date('d/m/Y',$results[0]->guaranty_date);} ?>"   placeholder="شهر / يوم / سنة " >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 " id="contract_id_f">
                                <div id="guaranty_end">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 "> تاريخ نهاية الكفالة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                        <div class="docs-datepicker">
                                            <div class="input-group">
                                                <input type="text" class="form-control docs-date" name="guaranty_end" value="<?php if(!empty($results[0]->guaranty_end)){ echo date('d/m/Y',$results[0]->guaranty_end);} ?>"   placeholder="شهر / يوم / سنة " >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
<div class="col-xs-12" id="contract_id_c">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> عدد الدفعات  </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="number" class="r-inner-h4"  value="<?php if(!empty($results[0]->num_payments)){echo $results[0]->num_payments;}  ?>" name="num_payments" required />
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
                            
    <div class="col-xs-12" id="contract_id_qq">
<div class="col-xs-6">
<h4 class="r-h4"> عدد الايتام المكفولين  </h4>
</div>
<div class="col-xs-6 r-input">
<input type="text" name="num_of_aytam" value="<?php if(!empty($results[0]->num_of_aytam)){echo $results[0]->num_of_aytam;}  ?>" class="r-inner-h4" required />
</div>
</div>


<div class="col-xs-12" id="contract_id_qqq">
<div class="col-xs-6">
<h4 class="r-h4"> مبلغ الكفالة    </h4>
</div>
<div class="col-xs-6 r-input">
<input type="text" name="need_paid" value="<?php if(!empty($results[0]->need_paid)){echo $results[0]->need_paid;}  ?>" class="r-inner-h4" required />
</div>
</div>                          
                            
                            
                            
                            
<?php } ?>
                            <?php if($results[0]->type==2){?>

                                <div class="col-xs-12" id="contract_id_t" style="display: none">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> نوع الكفالة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="guaranty_type" id="guaranty_type"  >
                                            <option   value=""> إختر</option>
                                            <?php if(!empty($guaranty_types)):

                                                foreach ($guaranty_types as $record):
                                                    if($record->id ==  $results[0]->guaranty_type){

                                                        $selected='selected';
                                                    }else{
                                                        $selected='';
                                                    }


                                                    ?>
                                                    <option value="<? echo $record->id;?>" <?php echo $selected ?>><? echo $record->title;?></option>
                                                <?php  endforeach;endif;?>
                                        </select>
                                    </div>


                                </div>
                            <?php }else{ ?>
                                <div class="col-xs-12" id="contract_id_t" >
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> نوع الكفالة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="guaranty_type" id="guaranty_type"  >
                                            <option   value=""> إختر</option>
                                            <?php if(!empty($guaranty_types)):

                                                foreach ($guaranty_types as $record):
                                                    if($record->id ==  $results[0]->guaranty_type){

                                                        $selected='selected';
                                                    }else{
                                                        $selected='';
                                                    }


                                                    ?>
                                                    <option value="<? echo $record->id;?>" <?php echo $selected ?>><? echo $record->title;?></option>
                                                <?php  endforeach;endif;?>
                                        </select>
                                    </div>


                                </div>
                            <?php } ?>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  نوع الهوية   </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="national_type_id_fk"  <? echo $disabled;?>>
                                        <?php
                                        $national_id_array =array('- اختر -','الهوية الوطنية','إقامة','وثيقة','جواز سفر');
                                        foreach ($national_id_array as $k=>$v):

                                            $sec='';
                                            if($k == $results[0]->national_type_id_fk){
                                                $sec='selected';
                                            }?>
                                            <option value="<?php  echo $k;?>" <? echo $sec;?>><?php  echo $v;?></option>
                                        <?php  endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الهوية </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" <? echo $readonly;?> name="national_id_fk" value="<? echo $results[0]->national_id_fk;?>">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الجوال </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4 " <? echo $readonly;?> name="person_guaranty_mob" value="<? echo $results[0]->guaranty_mob;?>">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   البريد الالكتروني </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="email" class="r-inner-h4 "    <? echo $readonly;?> id="user_email" name="guaranty_email" value="<? echo $results[0]->guaranty_email;?>" />
                                </div>
                            </div>

                            <input type="hidden" name="id"  id="id" value="<? echo $results[0]->pay_method_id_fk;?>"/>
                            <? if($results[0]->pay_method_id_fk >1):?>



                            <? endif;?>
                        </div>
                    </div>
                    <!--section1111-->

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
                            <td>صور الهوية الوطنية</td>
                            <td style="width: 35%;">
                                <div class="field">

                                    <input type="text"  value="" size="40" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                    <input type="file" name="national_id_img" class="file_input_with_replacement">
                                </div>
                            </td>
                            <td><?php if(empty($results[0]->national_id_img)){?>
                                    <p>لا يوجد ارفاق</p>
                                <?php }else{?>
                                    <img src="<?php echo base_url('uploads/images/'.$results[0]->national_id_img.''); ?>" height="100px" width="100px">
                                <?php } ?> </td>                        </tr>
                        <tr>
                            <td>2</td>
                            <td>بطاقة المصرف</td>
                            <td style="width: 35%;">
                                <div class="field">

                                    <input type="text"  value="" size="40" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                    <input type="file" name="bank_card_img" class="file_input_with_replacement">
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

                                    <input type="text"  value="" size="40" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                    <input type="file" name="bank_deduction_voucher_img" class="file_input_with_replacement">
                                </div>
                            </td>
                            <td><?php if(empty($results[0]->bank_deduction_voucher_img)){?>
                                    <p>لا يوجد ارفاق</p>
                                <?php }else{?>
                                    <img src="<?php echo base_url('uploads/images/'.$results[0]->bank_deduction_voucher_img.''); ?>" height="100px" width="100px">
                                <?php } ?> </td>                        </tr>
                        <tr>
                            <td>4</td>
                            <td>أخري</td>
                            <td style="width: 35%;">
                                <div class="field">

                                    <input type="text"  value="" size="40" class="erfa2 file_input_replacement"  placeholder="ارفاق"/>
                                    <input type="file" name="other_img" class="file_input_with_replacement">
                                </div>
                            </td>

                            <td><?php if(empty($results[0]->other_img)){?>
                                    <p>لا يوجد ارفاق</p>
                                <?php }else{?>
                                <img src="<?php echo base_url('uploads/images/'.$results[0]->other_img.''); ?>" height="100px" width="100px">
                                <?php } ?>
                            </td>                        </tr>
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
                    <?php  if($this->uri->segment(4) !='view'):?>
                        <div class="col-xs-3">
                            <input type="submit" role="button" name="save" value="حفظ" class="btn pull-right">
                        </div>
                    <? endif;?>
                    <?php echo form_close()?>
                    <div class="col-xs-2">
                        <a href="<?php echo base_url()."Finance_resource/all_guaranty"?>"> <button class="btn pull-left" > عودة </button></a>
                    </div>
                    <div class="col-xs-7">
                    </div>

                </div>
            </div>
        </div>
    </div>





    <script>
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
        {alert($("#user_email_validate").val());
            if($("#user_email").val() == $("#user_email_validate").val()){
                document.getElementById('validate_E').style.color = '#00FF00';
                document.getElementById('validate_E').innerHTML = 'الايميل متطابق';
            }else{
                document.getElementById('validate_E').style.color = '#F00';
                document.getElementById('validate_E').innerHTML = 'الايميل غير متطابق';
            }
        }



        function as(selc){

            if (selc == 1) {
                $(".r-farde").show();
                $(".r-moasasa").hide();

            } else if (selc == 2) {
                $(".r-farde").hide();
                $(".r-moasasa").show();
            } else {
                $(".r-farde").show();
                $(".r-moasasa").hide();
            }
        }


    </script>


    <script>
        function go(valu) {
            var dods = $("#id").val();
            if (dods == 4) {
                $(".r-resoursez").show();
                $(".r-resoursez1").show();
            } else if (dods != 4) {
                $(".r-resoursez1").hide();
            }
            if (valu == 1) {
                $(".r-resoursez").hide();
                $(".r-resoursez1").hide();
            } else if (valu == 2 || valu == 3 || valu == 5) {
                $(".r-resoursez").show();
                $(".r-resoursez1").hide();
            } else if (valu == 4 ) {
                $(".r-resoursez").show();
                $(".r-resoursez1").show();
            } else {
                $(".r-resoursez").hide();
                $(".r-resoursez1").hide();
            }

        }
    </script>
    <script>
        function go_(valu) {
            var dods = $("#ids").val();
            if (dods == 4) {
                $(".r-resoursezm").show();
                $(".r-resoursezm1").show();
            } else if (dods != 4) {
                $(".r-resoursezm1").hide();
            }
            if (valu == 1) {
                $(".r-resoursezm").hide();
                $(".r-resoursezm1").hide();
            } else if (valu == 2 || valu == 3 || valu == 5) {
                $(".r-resoursezm").show();
                $(".r-resoursezm1").hide();
            } else if (valu == 4 ) {
                $(".r-resoursezm").show();
                $(".r-resoursezm1").show();
            } else {
                $(".r-resoursezm").hide();
                $(".r-resoursezm1").hide();
            }

        }
    </script>


    <script>

        function change(datas){
            var doda = $("#types").val();
            if (doda ==1) {
                $(".mo_types").show();
                $(".mo_type").hide();
            } else if (doda ==2) {
                $(".mo_type").show();
                $(".mo_types").hide();
            }

            if (datas == 1) {
                $(".mo_types").show();
                $(".mo_type").hide();

            } else if (datas == 2) {
                $(".mo_type").show();
                $(".mo_types").hide();
            }

        }


    </script>



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

        function go2(valu) {
            if(valu === '1'){
                $('#style_resours').hide();


            }else{

                $('#style_resours').show();

            }

        }
    </script>
