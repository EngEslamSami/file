<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">
    .top-label {
        font-size: 13px;
    }
    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
</style>
<?php
if(isset($result)&&!empty($result))
{
    $k_yatem_full=$result->k_yatem_full;
    $k_yatem_half=$result->k_yatem_half;
    $k_armal=$result->k_armal;
    $k_mostafed=$result->k_mostafed;
    $k_num=$result->k_num;
    $k_name=$result->k_name;
    $k_gender_fk=$result->k_gender_fk;
    $start_kfala_date=$result->start_kfala_date;
    $fe2a_type= $result->fe2a_type;
    $k_nationality_fk= $result->k_nationality_fk;
    $k_national_type= $result->k_national_type;
    $k_national_num= $result->k_national_num;
    $k_national_place= $result->k_national_place;
    $k_city= $result->k_city;
    $k_status= $result->k_status;
    $k_addres= $result->k_addres;
    $k_job_fk =$result->k_job_fk;
    $k_job_place =$result->k_job_place;
    $k_specialize_fk =$result->k_specialize_fk;
    $k_activity_fk =$result->k_activity_fk;
    $k_barid_box =$result->k_barid_box;
    $k_bardid_code =$result->k_bardid_code;
    $k_fax =$result->k_fax;
    $k_mob =$result->k_mob;
    $k_email =$result->k_email;
    $num_days =$result->num_days ;
    $alert_type   =$result->alert_type ;
    $pay_method  =$result->pay_method ;
    $bank_id_fk   =$result->bank_id_fk ;
    $bank_account_num   =$result->bank_account_num ;
    $bank_branch  =$result->bank_branch ;
    $k_notes  =$result->k_notes ;
    $k_message_method  =$result->k_message_method ;
    $k_message_mob  =$result->k_message_mob  ;


    $out['form']='all_Finance_resource/sponsors/Sponsor/updateSponsor/'.$this->uri->segment(5);
}else{
    $k_addres='';
    $k_yatem_full    ="";
    $k_yatem_half    ="";
    $k_armal    ="";
    $k_mostafed    ="";
    $k_num="";
    $k_name="";
    $k_gender_fk="";
    $start_kfala_date="";
    $fe2a_type="";
    $k_nationality_fk="";
    $k_national_type="";
    $k_national_num="";
    $k_national_place="";
    $k_city="";
    $k_status="";
    $k_job_fk="";
    $k_job_fk ="";
    $k_job_place ="";
    $k_specialize_fk ="";
    $k_activity_fk ="";
    $k_barid_box   ="";
    $k_bardid_code   ="";
    $k_fax   ="";
    $k_mob   ="";
    $k_email   ="";
    $alert_type   ="";
    $num_days   ="";
    $pay_method   ="";
    $bank_id_fk   ="";
    $bank_account_num   ="";
    $bank_branch  ="";
    $k_notes  ="";
    $k_message_method ="";
    $k_message_mob ="";




    $out['form']='all_Finance_resource/sponsors/Sponsor/addSponsor';
}
?>
<?php
?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-9 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                  <div class="pull-left">
          <!--      --><?php /*if(isset($result) && !empty($result)){
                        $this->load->view('admin/all_Finance_resource_views/sponsors/drop_down_menu', $data_load);
                        }*/?>
            </div>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">نوع الكفالة </label>
                    </div>
                    <?php
                    $k_type_arr =array('k_yatem_full'=>'كفالة شاملة','k_yatem_half'=>'نصف كفالة','k_mostafed'=>'كفالة مستفيد','k_armal'=>'كفالة أرملة');
                    if(isset($k_type_arr)&&!empty($k_type_arr)) {
                        foreach($k_type_arr as $key=>$value){
                            ?>
                            <input  type="checkbox" name="<?=$key?>" style="margin-right: 15px" value="1"

                                <?php if(!empty($$key)){
                                    if($$key ==1){?> checked <?php }} ?>>
                            <label for="square-radio-1"><?=$value?></label>
                            <?php
                        }
                    }
                    ?>
                    </div>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">حالة الكفالة </label>
                        <select name="k_status" id="k_status" data-validation="required"   class="form-control bottom-input"
                                aria-required="true">
                            <?php
                            $fe2a_type_arr =array('إختر','مستمر','متقطع','منتظم','موقوف');
                            if(isset($fe2a_type_arr)&&!empty($fe2a_type_arr)) {
                                foreach($fe2a_type_arr as $key => $value){
                                    ?>
                                    <option value="<?php echo $key;?>"
                                        <?php if(!empty($k_gender_fk)){
                                            if($key==$k_status){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">رقم الكافل</label>
                        <input type="text" name="k_num" id="k_num"
                                <?php
                                if(!empty($k_num)){?>
                                    value="<?=$k_num?>" readonly
                            <?php }else{
                                if($last_id ==0){ ?>
                               data-validation="required"
                               <?php }elseif($last_id !='' && $last_id>0){?>
                                    value="<?=$last_id?>" readonly
                                <?php } }?>
                               value="<?php echo $k_num;?>"
                                class="form-control bottom-input"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">إسم الكافل</label>
                        <input type="text" name="k_name" id="k_name" value="<?php echo $k_name;?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الجنس </label>
                        <select name="k_gender_fk" id="k_gender_fk" data-validation="required"
                                class="form-control bottom-input" aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($gender_data)&&!empty($gender_data)) {
                                foreach($gender_data as $row){?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($k_gender_fk)){
                                            if($row->id_setting==$k_gender_fk){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ تسجيل الكفالة</label>
                        <input type="text" name="start_kfala_date" data-validation="required"
                               id="start_kfala_date" value="<?php echo $start_kfala_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
                               onchange="checkYear($(this).val());">
                    </div>
                  </div>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">فئة الكافل</label>
                        <select id="fe2a_type" data-validation="required" class="form-control bottom-input"
                                name="fe2a_type" onchange="GetF2a(this.value)">
                            <option value="">إختر</option>
                            <?php
                            $f2a =array(1=>'فرد',2=>'مؤسسة',3=>'جهات مانحة',4=>'مؤسسات حكومية');
                            foreach($f2a as  $key => $value){
                                ?>
                                <option value="<?php echo $key;?>"

                                <?php if(!empty($fe2a_type)){
                                    if($key==$fe2a_type){ echo 'selected'; }
                                }else{  if($key ==1){echo'selected';}   }  ?>> <?php echo $value;?></option >
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الجنسيه</label>
                        <select id="k_nationality_fk" data-validation="required" class="form-control bottom-input"
                                name="k_nationality_fk">
                            <option value="">إختر</option>
                            <?php
                            foreach($nationality as $row){
                                ?>
                                <option value="<?php echo $row->id_setting;?>"
                                    <?php if(!empty($k_nationality_fk)){
                                        if($row->id_setting==$k_nationality_fk){ echo 'selected'; }
                                    } ?>> <?php echo $row->title_setting;?></option >
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">نوع الهوية </label>
                        <select id="k_national_type"  class="form-control bottom-input"
                                aria-required="true" name="k_national_type">
                            <option value="">إختر</option>
                            <?php
                            if(isset($type_card)&&!empty($type_card)) {
                                foreach($type_card as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"

                                        <?php if(!empty($k_national_type)){
                                            if($row->id_setting==$k_national_type){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label"> رقم الهويه <span class="span-allow"> (10ارقام) </span></label>
                        <input type="text" name="k_national_num" id="k_national_num" onkeyup="get_length($(this).val(),'hint');"
                               maxlength="10"
                             value="<?php echo $k_national_num;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                        <small  id="hint" class="myspan"  style="color: red;"> </small>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">مصدر الهوية </label>
                        <select id="k_national_place" name="k_national_place"
                                class="form-control bottom-input"  aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($dest_card)&&!empty($dest_card)) {
                                foreach($dest_card as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($k_national_place)){
                                            if($row->id_setting==$k_national_place){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">المدينة</label>
                        <select id="k_city" name="k_city"   class="form-control bottom-input"
                                data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if(isset($cities)&&!empty($cities)) {
                                foreach($cities as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($k_city)){
                                            if($row->id_setting==$k_city){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">العنوان </label>
                        <input type="text" name="k_addres" id="k_addres"
                               data-validation="required" value=" <?php echo $k_addres;?>"
                               class="form-control bottom-input">
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                        <label class="label top-label">المهنة </label>
                        <select name="k_job_fk" id="k_job_fk" class="form-control bottom-input"
                                 aria-required="true" >
                            <option value="">إختر</option>
                            <?php
                            if(isset($job_role)&&!empty($job_role)) {
                                foreach($job_role as $row){?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($k_job_fk)){
                                            if($row->id_setting==$k_job_fk){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                        <label class="label top-label">جهة العمل </label>
                        <select name="k_job_place" id="k_job_place" class="form-control bottom-input"
                               aria-required="true">
                            <option value="">إختر</option>
                            <?php if(!empty($employer)){ foreach($employer as $value){?>
                                <option value="<?php echo $value->id_setting ; ?>"
                                    <?php if(!empty($k_job_place)){
                                        if($value->id_setting==$k_job_place){ echo 'selected'; }
                                    } ?> ><?php echo $value->title_setting ; ?></option>';
                            <?php } }?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">نشاط المؤسسة   </label>
                        <select name="k_activity_fk" class="form-control bottom-input" id="k_activity_fk"
                                disabled="disabled">
                            <option value="">اختر</option>
                            <?php
                            if(isset($activity)&&!empty($activity)) {
                                foreach($activity as $row){?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($k_activity_fk)){
                                        if($row->id_setting==$k_activity_fk){ echo 'selected'; }
                                    } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">التخصص </label>
                        <select name="k_specialize_fk" class="form-control bottom-input" id="k_specialize_fk" data-validation="required">
                            <option value="">اختر</option>
                            <?php
                            if(isset($specialize)&&!empty($specialize)) {
                                foreach($specialize as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($k_specialize_fk)){
                                            if($row->id_setting==$k_specialize_fk){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">صندوق بريد</label>
                        <input type="text" name="k_barid_box"  id="k_barid_box" class="form-control bottom-input"
                               value="<?php echo $k_barid_box;?>"  data-validation-has-keyup-event="true" >
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">رمز بريدي</label>
                        <input type="text" name="k_bardid_code"  id="k_bardid_code"   onkeypress="validate_number(event)" class="form-control bottom-input"
                               value="<?php echo $k_bardid_code;?>"
                               data-validation-has-keyup-event="true" >
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الفاكس</label>
                        <input type="text" name="k_fax"  id="k_fax"   onkeypress="validate_number(event)" class="form-control bottom-input" value="<?php echo $k_fax;?>"
                               data-validation-has-keyup-event="true" >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label""> الجوال <span class="span-allow"> (10ارقام) </span></label>
                        <input type="text" name="k_mob" maxlength="10" onkeyup="get_length($(this).val(),'tel');"  data-validation="required" id="k_mob" value="<?php echo $k_mob;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                        <small  id="tel" class="myspan"  style="color: red;"> </small>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">البريد الإلكتروني</label>
                        <input type="email" name="k_email" id="k_email" data-validation="email" value="<?php echo $k_email;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">تنبيه الإنتهاء </label>
                        <select id="alert_type"  class="form-control bottom-input"data-validation="required"
                                name="alert_type"  onchange="GetDays($(this).val(),$('#num').val())">
                            <?php
                            $alert_type_arr =array('إختر','يوم','أسبوع','شهر');
                            if(isset($alert_type_arr)&&!empty($alert_type_arr)) {
                                foreach($alert_type_arr as $key=>$value){
                                    ?>
                                    <option value="<?php echo $key;?>"
                                        <?php if(!empty($alert_type)){
                                            if($key == $alert_type){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">العدد</label>
                        <input type="text" name="num" id="num" onkeyup="GetDays($('#alert_type').val(),$(this).val())"
                               onkeypress="validate_number(event);"
                             class="form-control bottom-input">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">عدد الايام</label>
                        <input type="text" name="num_days" id="num_days"
                               onkeypress="validate_number(event);" readonly
                               value=" <?php echo $num_days;?>" class="form-control bottom-input">
                    </div>
                
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">توريد الكفالة</label>
                        <select id="pay_method" name="pay_method"
                                class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل');
                            if(isset($pay_method_arr)&&!empty($pay_method_arr)) {
                                foreach($pay_method_arr as $key=>$value){
                                    ?>
                                    <option value="<?php echo$key;?>"
                                        <?php if(!empty($pay_method)){
                                            if($key == $pay_method){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label"> البنك</label>
                        <select name="bank_id_fk" id="bank_id_fk" class="form-control bottom-input"
                             aria-required="true">
                            <option value="">إختر</option>
                            <?php if (!empty($banks)) {
                                foreach ($banks as $bank) { ?>
                                    <option value="<?php echo $bank->id; ?>"
                                        <?php if(!empty($bank_id_fk)){
                                            if($bank->id == $bank_id_fk){ echo 'selected'; }
                                        } ?>><?php echo $bank->ar_name; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>

                    <div class="form-group col-sm-3 col-xs-12">
                        <label class="label top-label">رقم الحساب</label>
                        <input type="text" name="bank_account_num" id="bank_account_num"
                               onkeyup="length_hesab_om($(this).val());"
                               value="<?=$bank_account_num?>"
                               class="form-control bottom-input "
                               data-validation-has-keyup-event="true">

                        <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">الفرع</label>
                        <input type="text" name="bank_branch"  data-validation="required"
                               value="<?php echo $bank_branch;?>" class="form-control bottom-input" data-validation-has-keyup-event="true">
                    </div>


                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-5 col-sm-6 padding-4">
                        <label class="label top-label">الطريقة المناسبة للمراسلة</label>
                        <select id="k_message_method" name="k_message_method"
                                class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            $k_message_method_arr =array('إختر','ارغب في استلام البريدعن طريق البريد الالكتروني ','ارغب في استلام البريد عن طريق صندوق البريد ','لا ارغب في استلام البريد');
                            if(isset($k_message_method_arr)&&!empty($k_message_method_arr)) {
                                foreach($k_message_method_arr as $key=>$value){
                                    ?>
                                    <option value="<?php echo$key;?>"
                                        <?php if(!empty($k_message_method)){
                                            if($key == $k_message_method){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">هل ترغي المراسلة عن طريق رسائل الجوال</label>
                        <select id="k_message_mob" name="k_message_mob"
                                class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            $k_message_mob_arr =array('إختر','نعم','لا');
                            if(isset($k_message_mob_arr)&&!empty($k_message_mob_arr)) {
                                foreach($k_message_mob_arr as $key=>$value){
                                    ?>
                                    <option value="<?php echo$key;?>"
                                        <?php if(!empty($k_message_mob)){
                                            if($key == $k_message_mob){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">ملاحظات</label>
                        <textarea name="k_notes" class="form-control" style="width: 100%" data-validation="required"><?=$k_notes?></textarea>
                    </div>

                </div>


                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <br /><br />
                        <button type="submit" id="save" name="add" value="add"
                                class="btn btn-add">
                            <span><i class="fa fa-floppy-o"></i></span> حفظ
                        </button>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------>
    <?php  $this->load->view('admin/all_Finance_resource_views/sponsors/sidebar_kafel_data');?>
    <!------ table -------->
    <?php  if(isset($records) &&!empty($records)){?>
   </div>
    <div class="col-xs-12 no-padding">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات الكافل</h3>
            </div>
            <div class="panel-body"><br>
                <div class="col-md-12 no-padding">

                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr class="info">
                                <th class="text-center">م</th>
                                <th>كود الكافل</th>
                                <th class="text-center">إسم الكافل</th>
                                <th>رقم الهوية</th>
                                <th>رقم الجوال</th>
                                <th>حالة الكافل</th>
                                <th>التفاصيل</th>
                                <th class="text-center">الاجراء</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            $a=1;
                            if(isset($records)&&!empty($records)) {
                                foreach ($records as $record) {
                                    ?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <td><? echo $record->k_num; ?></td>
                                        <td><? echo $record->k_name; ?></td>
                                        <td><? echo $record->k_national_num; ?></td>
                                        <td><? echo $record->k_mob; ?></td>
                                        <td><?php if(!empty($fe2a_type_arr[$record->k_status])){
                                                echo $fe2a_type_arr[$record->k_status]; }else{ echo'غير محدد';} ?></td>
                                        <td></td>

                                        <td>

                                            <a href="<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/updateSponsor/<?php echo $record->id; ?>"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                            <a onclick="$('#adele').attr('href', '<?= base_url() . "all_Finance_resource/sponsors/Sponsor/delete_sponsor/" . $record->id ?>');"
                                               data-toggle="modal" data-target="#modal-delete"
                                               title="حذف"> <i class="fa fa-trash"
                                                aria-hidden="true"></i> </a>

                                     <a href = "<?php echo base_url('all_Finance_resource/sponsors/Sponsor/print_employee_details').'/'.$record->id ?>" target = "_blank" >
                                                <i class="fa fa-print" aria-hidden = "true" ></i > </a>

                                            <a  href = "<?php echo base_url('all_Finance_resource/sponsors/Sponsor/print_card').'/'.$record->id ?>" target = "_blank" >
                                                <i   style="background-color: #0a568c" class="fa fa-print" aria-hidden = "true" ></i > </a>



                                       </td>

                                    </tr>
                                    <?php
                                    $a++;
                                }
                            } else {?>
                                <td colspan="6"><div style="color: red; font-size: large;">لم يتم اضافة كفلاء !!</div></td>
                            <?php  }
                            ?>
                            </tbody>
                        </table>




                </div>
            </div>
        </div>
    </div>
      <?php } ?>
    <!----- end table ------>
    <script type="text/javascript">
        jQuery(function($){
            $(".date_as_mask").mask("99/99/9999");
        });
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>


    $(document).ready(function(){
           var d = new Date();
            var weekDays = d.getDay()
            var MonthDays = new Date(d.getFullYear(), d.getMonth()+1, 0).getDate();
             var  num_days = <?php echo$num_days;?>;
            var  alert_type = <?php echo$alert_type;?>;
          if(num_days !='' && alert_type !=''){
          if(alert_type ==1 ){
                $('#num').val(num_days);
            } else if(alert_type ==2){

                $('#num').val(num_days / weekDays);

            } else if (alert_type ==3){

                $('#num').val(num_days / MonthDays);

            }
           }
    });

</script>


    <script>
        function validate_number(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode( key );
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>

    <script>
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
    </script>
    <script>
        function get_length(len,span_id)
        {
            if(len.length < 10){
                document.getElementById("save").setAttribute("disabled", "disabled");
                document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
            }
            if(len.length >10){
                document.getElementById("save").setAttribute("disabled", "disabled");
                document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
            }
            if(len.length ==10){
                document.getElementById("save").removeAttribute("disabled", "disabled");
                document.getElementById(""+ span_id ).innerHTML = '';
            }
        }
    </script>

    <script>
        function chek_length(inp_id,len)
        {
            var inchek_id="#"+inp_id;
            var inchek =$(''+inchek_id).val();
            if(inchek.length < len){
                document.getElementById(""+ inp_id +"_span").style.color = '#F00';
                document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
                document.getElementById("save").setAttribute("disabled", "disabled");
                var inchek_out= inchek.substring(0,len);
                $(inchek_id).val(inchek_out);
            }
            if(inchek.length > len){
                document.getElementById(""+ inp_id +"_span").style.color = '#F00';
                document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
                document.getElementById("save").setAttribute("disabled", "disabled");
                var inchek_out= inchek.substring(0,len);
                $(inchek_id).val(inchek_out);
            }
            if(inchek.length == len){
                document.getElementById(""+ inp_id +"_span").innerHTML ='';
                document.getElementById("save").removeAttribute("disabled", "disabled");
            }
        }
    </script>



<script>

    function checkYear(valu) {
        nowyear = <?php echo$current_hijry_year;?>;
        var myDate =valu.split("/");
        if(parseInt(myDate[2]) > parseInt(nowyear) ){
           alert( " السنة الهجرية الحالية "  + nowyear);
        $('#start_kfala_date').val('');
        }
    }

</script>


<script>

    function GetF2a(f2a_type) {

         if( f2a_type ==1 ){

             document.getElementById("k_national_type").removeAttribute("disabled", "disabled");
             document.getElementById("k_national_type").setAttribute("data-validation", "required");
             document.getElementById("k_national_place").removeAttribute("disabled", "disabled");
             document.getElementById("k_national_place").setAttribute("data-validation", "required");
             document.getElementById("k_national_num").removeAttribute("disabled", "disabled");
             document.getElementById("k_national_num").setAttribute("data-validation", "required");
             document.getElementById("k_job_fk").removeAttribute("disabled", "disabled");
             document.getElementById("k_job_fk").setAttribute("data-validation", "required");
             document.getElementById("k_job_place").removeAttribute("disabled", "disabled");
             document.getElementById("k_job_place").setAttribute("data-validation", "required");
             document.getElementById("k_activity_fk").setAttribute("disabled", "disabled");

         } else {

             document.getElementById("k_national_type").setAttribute("disabled", "disabled");
             document.getElementById("k_national_type").value='';
             document.getElementById("k_national_place").setAttribute("disabled", "disabled");
             document.getElementById("k_national_place").value='';
             document.getElementById("k_national_num").setAttribute("disabled", "disabled");
             document.getElementById("k_national_num").value='';
             document.getElementById("k_job_fk").setAttribute("disabled", "disabled");
             document.getElementById("k_job_fk").value='';
             document.getElementById("k_job_place").setAttribute("disabled", "disabled");
             document.getElementById("k_job_place").value='';
             document.getElementById("k_activity_fk").removeAttribute("disabled", "disabled");
             document.getElementById("k_activity_fk").setAttribute("data-validation", "required");

         }

    }

</script>


<script>
    
    function GetDays(alert_type,num_days) {
        var d = new Date();
        var weekDays = d.getDay()
        var MonthDays = new Date(d.getFullYear(), d.getMonth()+1, 0).getDate();
        if(alert_type ==1 ){

         $('#num_days').val(num_days);
        } else if(alert_type ==2){

            $('#num_days').val(num_days * weekDays);

        } else if (alert_type ==3){

            $('#num_days').val(num_days * MonthDays);

        }

    }
    
</script>

<script>
    function length_hesab_om(length) {
        var len = length.length;

        if (len < 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        if (len > 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        if (len == 24) {
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
</script>