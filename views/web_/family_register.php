<div class="sidebar-quick-links-fixed hidden-xs">
    <a href="javascript:void(0);" class="side-btn">تسجيل الدخول</a>
    <ul>
        <li>
            <a href="#">
                <i class="fa fa-home"></i>
                <span>دخول الموظفين</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-users"></i>
                <span>دخول مستفيدين</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-leaf"></i>
                <span>دخول متعفف </span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-money"></i>
                <span>دخول  متبرع</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-leaf"></i>
                <span>دخول  كفيل</span>
            </a>
        </li>

    </ul>
</div>
<!-- Sidebar Quick Links -->


<div class="social-sidebar hidden-xs" dir="ltr">
    <ul>
        <li class="facebook">
            <a href="#" target="_blank">
                <i class="fa fa-facebook"></i>
                <span>تابعنا على فيسبوك</span>
            </a>
        </li>
        <li class="twitter">
            <a href="#" target="_blank">
                <i class="fa fa-twitter"></i>
                <span>تابعنا على تويتر</span>
            </a>
        </li>
        <li class="instagram">
            <a href="#" target="_blank">
                <i class="fa fa-instagram"></i>
                <span>تابعنا على انستجرام</span>
            </a>
        </li>
        <li class="youtube">
            <a href="#" target="_blank">
                <i class="fa fa-youtube-play"></i>
                <span>تابعنا على يوتيوب</span>
            </a>
        </li>
        <li class="snapchat">
            <a href="#" target="_blank">
                <i class="fa fa-snapchat-ghost"></i>
                <span>تابعنا على سناب شات</span>
            </a>
        </li>
    </ul>
</div>

<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/profile-bg.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>web">الرئيسية</a></li>
            <li><a href="<?php echo base_url(); ?>web/family_register">خدمات أسرة</a></li>
            <li><a href="<?php echo base_url(); ?>web/family_register">تسجيل أسرة</a></li>
        </ol>
    </div>
</section>

<section class="main_content pbottom-30 ptop-30">
    <div class="container">
       <div class="family_register pbottom-30">
           <div class="col-md-4 col-sm-4 col-xs-6">
               <a href="#" class="md-trigger" data-modal="modal-1">
                   <div class="box-register">
                       <img src="<?=base_url().'asisst/web_asset/'?>img/tc-icon.png">
                       <h5>شروط تسجيل المستفيدين</h5>
                   </div>
               </a>
           </div>
           <div class="col-md-4 col-sm-4 col-xs-6">
               <a href="#" class="md-trigger" data-modal="modal-2">
                   <div class="box-register">
                       <img src="<?=base_url().'asisst/web_asset/'?>img/User-Files-icon.png">
                       <h5>المستندات المطلوبة عند تقديم الطلب</h5>
                   </div>
               </a>
           </div>
           <div class="col-md-4 col-sm-4 col-xs-6">
               <a href="#"  class="md-trigger" data-modal="modal-3">
                   <div class="box-register">
                       <img src="<?=base_url().'asisst/web_asset/'?>img/curriculum-support.png">
                       <h5>المستندات المطلوبة عند قبول الطلب للإعتماد </h5>
                   </div>
               </a>
           </div>
       </div>

       <div class="col-xs-12 text-center">
           <h5 class="orange-heading">
               <a  role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">تقديم طلب تسجيل أسرة         </a>
           </h5>
       </div>

       <div class="col-xs-12 no-padding">
        <div class="collapse " id="collapseExample">
            <?php
            echo form_open_multipart('Web/family_register');
            ?>
          <div class="well">
             <div class="col-sm-12 form-group no-padding">
                <div class="col-sm-6 col-md-2 padding-4">
                    <label class="label label-green  ">رقم السجل المدنى للأب </label>
                    <input type="text" name="father_national_num" maxlength="10"
                           onkeypress="validate_number(event);check_length_num(this,10,'father_span_num');"
                           value="<?php if(isset($result)){ echo $result["father_national_num"];} ?>"
                           class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="required">
                    <span id="father_span_num" style="color: red;"></span>
                </div>
                <div class="col-sm-6  col-md-4 padding-4 ">
                    <label class="label label-green  ">إسم الأب رباعي  </label>
                    <input  type="text" name="full_name" class="form-control  input-style" placeholder="أدخل البيانات"
                    value=""   data-validation="required">
                </div>
                <div class="col-sm-6 col-md-2 padding-4">
                    <label class="label label-green  ">نوع هوية الأم </label>
                    <select name="national_id_type"
                            class="selectpicker no-padding form-control choose-date form-control two_three"
                            data-show-subtext="true" data-live-search="true" data-validation="required" onchange="GetNationalidType(this.value)"
                            aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        foreach ($national_id_array as $row2):
                            $selected = '';
                            if ($row2->id_setting == $result['national_id_type_mother']) {
                                $selected = 'selected';
                            } ?>
                            <option
                                    value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> >
                                <?php echo $row2->title_setting; ?></option>
                        <?php endforeach;?>
                        <option value="0"<?php if(!empty($result)){
                            if($result['national_id_type'] ==0){
                                echo'selected';
                            }
                        }?> >أخري</option>
                    </select>
                    <!--
                    <select name="national_id_type" class="selectpicker no-padding form-control choose-date form-control "  data-show-subtext="true" data-live-search="true" data-validation="required"
                            onchange="GetNationalidType(this.value)" aria-required="true">
                        <option value="">اختر</option>
                    </select>
                    -->
                </div>
                <div class="col-sm-6 col-md-2 padding-4">
                    <label class="label label-green  ">رقم هوية الأم</label>
                    <input type="text"  name="mother_national_num"  id="mother_national_num"  maxlength="10" onkeypress="validate_number(event);"
                    value=""
                    disabled="disabled"
                    id="mother_national_num" onkeyup=""
                    class="form-control  input-style" placeholder="أدخل البيانات" data-validation="required">
                    <span id="result_span_num" style="color: red;"></span>
                </div>
                <div class="col-sm-6 col-md-2 padding-4">
                    <label class="label label-green  ">الحالة الإجتماعية</label>
                    <select  name="marital_status_id_fk"  data-validation="required" class="selectpicker no-padding form-control choose-date form-control two_three"
                             data-show-subtext="true" data-live-search="true"   aria-required="true" >
                        <option value="">اختر</option>
                        <?php foreach ($marital_status_array as $row6):
                            $selected='';if($row6->id_setting==$result['marital_status_id_fk_mother']){$selected='selected';}   ?>
                            <option value="<?php  echo $row6->id_setting;?>"  <?php echo $selected?>  ><?php  echo $row6->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 form-group no-padding">

                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  ">مقر التسجيل ( الفرع )</label>
                    <select name="register_place" class="selectpicker no-padding form-control choose-date form-control two_three"  data-validation="required"   data-show-subtext="true" data-live-search="true"   aria-required="true">
                        <option value=""> اختر</option>
                        <?php
                        foreach ($socity_branch as $row2):
                            $selected='';
                            if(isset($result)){
                                if($row2->id == $result["register_place"]){$selected='selected';}
                            }	?>
                            <option value="<?php  echo $row2->id;?>" <?php echo $selected?> ><?php  echo $row2->title;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>
                <div class=" col-sm-6  col-md-4 padding-4">
                    <label class="label label-green  col_md_32">إسم مقدم الطلب رباعى  </label>
                    <input type="text" name="full_name_order"  id="full_name_order" 
                    value=""
                    class="form-control col_md_68 input-style" placeholder="أدخل البيانات" data-validation="required">
                </div>
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  ">الصلة</label>
                    <select name="person_relationship" onchange="get_num_fk(this.value);"  id="person_relationship" data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true"
                            class="selectpicker no-padding form-control choose-date form-control ">
                        <option value="">إختر</option>
                        <option value="41" <?php  if(isset($result)){ if($result['person_relationship']=="41"){echo 'selected'; } }?> >(أم)</option>
                        <?php if(!empty($relationships)){ foreach ($relationships as $record){
                            $select='';
                            if(isset($result)){
                                if($result['person_relationship']==$record->id_setting){$select='selected'; }
                            }?>
                            <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  ">رقم هوية مقدم الطلب  </label>
                    <input type="text" maxlength="10"   name="person_national_card" id="person_national_card" value=""
                           onkeypress="validate_number(event);" onkeyup="check_length_num(this,10,'span_card');"
                           class="form-control  input-style" placeholder="أدخل البيانات" data-validation="required">
                    <span id="span_card" style="color: red;"></span>
                </div>
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  "> جوال التواصل ( الرسائل)    </label>
                    <input type="text" maxlength="10" name="contact_mob"  value=""
                    onkeypress="validate_number(event);" onkeyup="check_length_num(this,10,'span_phone');"
                    class="form-control  input-style" placeholder="أدخل البيانات" data-validation="required">
                    <span id="span_phone" style="color: red;"></span>
                </div>

            </div>
            <div class="col-sm-12 form-group  no-padding" >


                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  "> المدينة  </label>
                    <select class="form-control  selectpicker"  name="center_id_fk" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" onchange="get_sub_select(this.value,'center_option');">
                        <option value="">اختر</option>
                        <?php    if(isset($all_city) && !empty($all_city)){
                            foreach ($all_city as $row_city):
                                $selected = '';
                                if (isset($result)) {
                                    if ($row_city->id == $result['center_id_fk']) {
                                        $selected = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $row_city->id ?>" <?php echo $selected ?> >
                                    <?php echo $row_city->title ?></option>
                            <?php endforeach ;}?>
                    </select>
                </div>
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  "> الحي  </label>

                    <select name="district_id_fk" class="form-control  " id="center_option" name="" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                        <option value="">اختر</option>
                    </select>
                </div>
                <div class=" col-sm-6  col-md-1 padding-4">
                    <label class="label label-green  ">عدد الذكور
                    </label>
                    <input type="text" name="male_number" id="male_number" onkeypress="validate_number(event)"
                    data-validation="required" onkeyup="getFamilyNumber();" value=""
                           class="form-control  input-style"/>
                </div>
                <div class=" col-sm-6  col-md-1 padding-4">
                    <label class="label label-green  ">عدد الإناث
                    </label>
                    <input type="text" name="female_number" id="female_number" onkeypress="validate_number(event)"
                    data-validation="required" onkeyup="getFamilyNumber();" value="" class="form-control  input-style"/>
                </div>
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  ">اجمالي عدد الأفراد
                    </label>
                    <input type="text" name="family_members_number" id="family_members_number"
                    onkeypress="validate_number(event)" data-validation="required" readonly
                    value="" class="form-control  input-style"/>
                </div>
                <div class="form-group col-md-4 col-sm-3 padding-4">
                    <label class="label label-green  " >مصادر الدخل الشهري </label>
                    <input class="textbox form-control" type="text" name="retirement" value="" placeholder="تقاعد" style="width: 33.33%;float: right;" >
                    <input class="textbox form-control" type="text" name="insurance" value="" placeholder="تأمينات" style="width: 33.33%;float: right;" >
                    <input class="textbox4 form-control" type="text" name="guarantee" value="" placeholder="ضمان" style="width: 33.33%;float: right;" >
                </div>

            </div>


            <div class="col-sm-12 form-group  no-padding" >
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  ">ملكية السكن </label>
                    <select class="form-control " id="building_type" name="h_house_owner_id_fk" data-validation="required" aria-required="true" onchange="getRent();">
                        <option value="">اختر</option>
                        <option value="rent" <?php if (isset($result)) {
                            if ($result['h_house_owner_id_fk'] === 'rent') { ?> selected <?php }
                        } ?>>(إيجار)
                        </option>
                        <?php
                        foreach ($house_own as $a):
                            $selected = '';  if (isset($result)) {
                            if ($a->id_setting == $result['h_house_owner_id_fk']) {
                                $selected = 'selected';
                            }
                        } ?>
                            <option
                                    value="<?php echo $a->id_setting ?>" <?php echo $selected ?> ><?php echo $a->title_setting ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  ">الإيجار السنوى </label>
                    <input placeholder="القيمة " id="h_rent_amount" type="text"
                           onkeypress="validate_number(event);" class="  form-control  "
                           data-validation="required" name="h_rent_amount" value=""  >
                </div>


                <div class=" col-md-2  col-sm-6  col-md-6 padding-4">
                    <label class="label label-green  "> الوقت المناسب للتواصل</label>
                    <input placeholder="من " id="m12h" type="text" class="form-control  input-style  " data-validation="required" name="right_time_from" value="" style="float: right;width: 50%">
                    <input placeholder="إلى " id="m13h" class="form-control  input-style " type="text" data-validation="required" name="right_time_to" value=""  style="float: right;width: 50%">
                </div>

                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  ">إسم المستخدم </label>
                    <input type="text" name="user_name" class="form-control  input-style" placeholder="الخاص بدخول الأسرة للبوابة"  value=""   data-validation="required">
                </div>
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  ">كلمة المرور  </label>
                    <input type="password" name="user_password" onkeyup="valid_pass_length();"
                           id="user_password" class="form-control  input-style" data-validation="required" />
                    <span  id="validate_length" class="span-validation"> </span>
                </div>
                <div class=" col-sm-6  col-md-2 padding-4">
                    <label class="label label-green  ">تاكيد كلمة المرور <strong></strong> </label>
                    <input type="password"   id="user_password_copy" onkeyup="return valid_pass_copy();" class="form-control  input-style"    data-validation="required" />
                    <span  id="validate_copy" class="span-validation"> </span>
                </div>
            </div>


            <div class="col-sm-12 ">
                <button type="button" value="" id="" onclick="add_row_member()" class="btn btn-warning btn-next" style="width: 150px;margin-bottom: 5px ;font-size: 16px;"><i class="fa fa-plus"></i> إضافة أفراد الاسرة </button><br>
                <table   class="table table-striped table-bordered fixed-table " style="display: none; "    id="mytable" >
                    <thead>
                        <tr class="info">
                            <th style="width: 50px"  class="text-center" >م</th>
                            <th style="width: 30%;" class="text-center" > الإسم</th>
                            <th class="text-center" >الصلة</th>
                            <th class="text-center" > الجنس </th>
                            <th style="width: 140px" class="text-center" > الهوية </th>
                            <th class="text-center" > مصدر الهويه </th>
                            <th class="text-center" > تاريخ الميلاد </th>
                            <th class="text-center" > العمر </th>
                            <th class="text-center" > التصنيف </th>
                            <th class="text-center" > الإجراء</th>
                        </tr>
                    </thead>
                    <tbody id="resultTable">
                    </tbody>
                </table>
            </div>

            <div class="col-md-12">
                <input type="hidden" id="count_row" value="0" />


                <button type="button" class="btn btn-warning btn-next add_attchments"
                onclick="add_row_attach(<?php if(isset($all_attach_file) && !empty($all_attach_file)){
                    echo count($all_attach_file)+1;}else{echo 0;}?>);" style="width: 150px;font-size: 16px;"> <i class="fa fa-files-o" aria-hidden="true"></i> إضافة مرفقات  </button><br>


                <table class="table table-bordered"    style="display: none"   id="table_attach_files">
                    <thead >
                        <tr class="success">
                            <th>م</th>
                            <th style="text-align: center">اسم المرفق </th>
                            <th style="text-align: center">المرفق </th>
                            <th style="text-align: center">الإجراء</th>
                        </tr>
                    </thead>
                    <tbody  id="res_table">

                    </tbody>
                </table>
            </div>

            <div class="form-group col-sm-4">
                <h5>
                <input tabindex="11" type="radio" id="square-radio-1" class="large-radio">
                <label for="square-checkbox-1">أوافق على الاقرار</label>
                </h5>
            </div>
            <div class="col-xs-12 text-center">
                <button  type="submit" id="button" name="ADD" value="ADD"  class="btn btn-success " style="font-size: 16px;width: 150px;">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                </div>




            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div><!-- col-xs-12 -->

</div>
</section>




<!-- Modal newspaper effects -->
<div class="md-modal md-effect-4" id="modal-1" data-modal="modal-1">
 <div class="md-content">
     <h3>الشروط المطلوبة</h3>
     <div class="n-modal-body green" style="min-height: 300px">
       <h5 class="title-h5">شروط وإجراءات تسجيل المستفيدين:</h5>
         <?php
         if (isset($cond) && !empty($cond)){
             ?>
         <ol>
         <?php
             foreach ($cond as $cond ){
                 ?>
                 <li>
                     <?php

                        echo $cond->title;

                     ?>
                 </li>

             <?php

             }

         ?>

       </ol>
         <?php
         }
         ?>


   </div>
   <div class="modal-footer">
    <button class="btn btn-add btn-success ">طباعة</button>

    <button class="btn btn-add btn-danger md-close">أغلق!</button>
</div>
</div>
</div>

<!-- Modal newspaper effects -->
<div class="md-modal md-effect-4" id="modal-2" data-modal="modal-2">
 <div class="md-content">
     <h3>المستندات الأولية المطلوبة</h3>
     <div class="n-modal-body green" style="min-height: 300px">
       <h5 class="title-h5">المستندات الأولية عند تقديم الطلب</h5>
         <?php
         if (isset($file) && !empty($file)){
             ?>
             <ol>
                 <?php
                 foreach ($file as $file ){
                     ?>
                     <li>
                         <?php

                             echo $file->title;

                         ?>
                     </li>

                     <?php

                 }

                 ?>

             </ol>
             <?php
         }
         ?>
   </div>
   <div class="modal-footer">
    <button class="btn btn-add btn-success ">طباعة</button>

    <button class="btn btn-add btn-danger md-close">أغلق!</button>
</div>
</div>
</div>

<!-- Modal newspaper effects -->
<div class="md-modal md-effect-4" id="modal-3" data-modal="modal-3">
 <div class="md-content">
     <h3>المستندات التالية المطلوبة </h3>
     <div class="n-modal-body green" style="min-height: 300px">
       <h5 class="title-h5">عند قبول الطلب لإعتماد تسجيلها</h5>
         <?php
         if (isset($accept) && !empty($accept)){
             ?>
             <ol>
                 <?php
                 foreach ($accept as $accept ){
                     ?>
                     <li>
                         <?php

                         echo $accept->title;

                         ?>
                     </li>

                     <?php

                 }

                 ?>

             </ol>
             <?php
         }
         ?>

   </div>
   <div class="modal-footer">
    <button class="btn btn-add btn-success ">طباعة</button>

    <button class="btn btn-add btn-danger md-close">أغلق!</button>
</div>
</div>
</div>
<div class="md-overlay"></div>





<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script>


<script>
    timePickerInput({
        inputElement: document.getElementById("m12h"),
        mode: 12,
        // time: new Date()
    });
</script>

<script>
    timePickerInput({
        inputElement: document.getElementById("m13h"),
        mode: 12,
        // time: new Date()
    });
</script>


<script type="text/javascript">
    jQuery(function($){
        $(".date_as_mask").mask("99/99/9999");
    });
</script>



<script>
    function GetAge(valu,id) {
        var id = id;
        var mydate =valu.split("/");
        var myYear =mydate[2];
        var nowyear=<?php echo$current_year; ?>;
        var myAge = parseInt(nowyear)-parseInt(myYear);
        $('#myage' + id).val(myAge);
        GetClassification(myAge,$('#member_gender'+ id).val(),id);

    }



    function GetClassification(myage,mygender,id) {


        if(myage != '' && mygender != ''){

            var dataString   ='age=' + myage +'&gender=' +  mygender;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Web/GetClassification',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);
                    var member = document.getElementById("member_relationship"+id).value;
                    if (member =="41"){
                        $('#categoriey_member' + id).val(1);
                        $('#categoriey_member_div' + id).html('أرملة');
                    } else {
                        $('#categoriey_member' + id).val(JSONObject['tasnef']);
                        $('#categoriey_member_div' + id).html(JSONObject['title']);
                    }

                }
            });
        } else {
            alert('من فضلك إختر الجنس !!');
            $('#myage' + id).val("");
            $('#categoriey_member' + id).val("");
            $('#categoriey_member_div' + id).html("");
            $('#member_birth_date_hijri' + id).val("");
        }


    }
</script>




<!-------------------------------------------------->

<script>
    $(document).ready(function () {
        var x = document.getElementById('resultTable');
        var len = x.rows.length ;
        // return  alert(len);

        if(len=="1"){
            var x= document.getElementById("person_relationship").value;

            //  var option_name=$("#person_relationship option:selected").text();
            if(x =="41"){
                $("#member_full_name"+len).val($("#full_name_order").val());
                //  $("#member_relationship"+len).val(option_name);
                $("#member_card_num"+len).val($("#mother_national_num").val());
                $("#member_relationship"+len).val($("#person_relationship").val());
                var x = document.getElementById("member_gender"+len).children[2];
                x.setAttribute("selected", "selected");




            }
        }

    })
</script>

<script>
    function gender_select(len) {
        //  var x = document.getElementById("member_gender"+len).children[3];


        var member = document.getElementById("member_relationship"+len).value;
        if (member =="41" || member =="43"){
            $("#member_gender"+len).html('<option value="2">أنثي</option>');
        } else if(member =="42"){
            $("#member_gender"+len).html('<option value="1">ذكر</option>');
        }

    }
</script>
<!-- display mother data -->





<script>
    function check_num(){
        var national_id_type =$('#national_id_type').val();
        var dataString =  "chek_mother_national_num=" + $("#mother_national_num").val();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Web/CheckNationalNum',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                if(html == "1"){
                    $("#mother_national_num").css("border-color" , "red");
                    $("#result_span_num").html("رقم السجل مسجل من قبل ");
                    $('button[type="submit"]').attr("disabled","disabled");
                }else {
                    //---------------
                    if($("#mother_national_num").val().length != 10   ){
                        $("#mother_national_num").css("border-color" , "red");
                        if(national_id_type !=0){
                            $("#result_span_num").html("الرقم مكون من"  +10+"أرقام" );
                        }
                        $('button[type="submit"]').attr("disabled","disabled");
                    }else{
                        $("#mother_national_num").css("border-color" , "green");
                        $("#result_span_num").html("");
                        $('button[type="submit"]').removeAttr("disabled");
                    }
                    //---------------
                }
            }
        });
    }
</script>
<script>
    function check_length_num(this_input,max_lenth,span_id) {
        if($(this_input).val().length != max_lenth   ){
            $(this_input).css("border-color" , "red");
            $("#"+span_id).html("الرقم مكون من"  +max_lenth+"أرقام" );
            $('button[type="submit"]').attr("disabled","disabled");
        }else{
            $(this_input).css("border-color" , "green");
            $("#"+span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>
<script>
    function valid_pass_length()
    {
        if($("#user_password").val().length < 4){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور اكثر من اربع حروف';
            $('button[type="submit"]').attr("disabled","disabled");
        }else if($("#user_password").val().length > 4 &&  $("#user_password").val().length < 10){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور ضعيفة';
            $('button[type="submit"]').attr("disabled","disabled");
        }else if($("#user_password").val().length > 10){
            document.getElementById('validate_length').style.color = '#00FF00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور قوية';
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
    function valid_pass_copy()
    {
        if($("#user_password").val() == $("#user_password_copy").val()){
            document.getElementById('validate_copy').style.color = '#00FF00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور متطابقة';
            $('button[type="submit"]').removeAttr("disabled");
        }else{
            document.getElementById('validate_copy').style.color = '#F00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور غير متطابقة';
            $('button[type="submit"]').attr("disabled","disabled");
        }
    }
</script>
<script>
    function get_department(id_admin,id_pop) {
        if (id_admin != 0 && id_admin != "") {
            var dataString = "get_depart=" + id_admin;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>Web/GetDepart',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#departments-"+id_pop).html(html);
                    $("#departments-"+id_pop).selectpicker("refresh");
                }
            });
        }
    }
    //=============================================
    function get_emp(id_depart,id_pop) {
        if (id_depart != 0 && id_depart != "") {
            var dataString = "get_emp=" + id_depart;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>Web/GetDepart',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#user_to-"+id_pop).html(html);
                    $("#user_to-"+id_pop).selectpicker("refresh");
                }
            });
        }
    }
</script>
<script>
    function getFamilyNumber() {
        if ($('#male_number').val() > 0) {
            var males = parseInt($('#male_number').val());
        } else {
            var males = 0;
        }
        if ($('#female_number').val() > 0) {
            var females = parseInt($('#female_number').val());
        } else {
            var females = 0;
        }
        var all = males + females;
        $('#family_members_number').val(all);
    }
</script>
<script>
    function getRent() {
        var building_type = $("#building_type").val();
        if (building_type === 'rent') {
            document.getElementById("h_rent_amount").removeAttribute("disabled", "disabled");
            document.getElementById("h_rent_amount").setAttribute("data-validation", "required");
        } else {
            document.getElementById("h_rent_amount").value = "";
            document.getElementById("h_rent_amount").setAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function get_sub_select(this_value,sub_id){
        if(this_value !="" && this_value!=0){
            var dataString =  "get_sub_id=" + this_value;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Web/GetArea',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#"+sub_id).html(html);
                    $("#"+sub_id).selectpicker("refresh");
                }
            });
        }
    }
</script>
<script>
    function get_num_fk(pass_value){
        var option_name=$("#person_relationship option:selected").text();
        if(pass_value =="41"){
            $("#person_national_card").val($("#mother_national_num").val());
        }else if(option_name == "أم"){
            $("#person_national_card").val($("#mother_national_num").val());
        }else{
            $("#person_national_card").val("");
        }
    }
</script>
<script>
    function GetNationalidType(national_type) {
        if( national_type !=''){
            document.getElementById("mother_national_num").removeAttribute("disabled","disabled");
            if( national_type === '0'){
                document.getElementById("mother_national_num").removeAttribute("maxlength");
                document.getElementById("mother_national_num").setAttribute("onkeyup", "check_num();");
                document.getElementById("result_span_num").html("");
            } else {
                document.getElementById("mother_national_num").setAttribute("maxlength", "10");
                document.getElementById("mother_national_num").setAttribute("onkeyup", "check_num();check_length_num(this,10,'result_span_num');");
            }
        } else {
            document.getElementById("mother_national_num").setAttribute("disabled","disabled");
        }
    }
</script>

<script>
    function add_row_member(){
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Web/getFamilyMembers',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#resultTable").append(html);
            }
        });
    }
    //--------
    //-----------------------------------------------
</script>
<script>
    function check_length_num(this_input, max_lenth) {
        if ($("member_card_num_span").val().length != max_lenth) {
            $("member_card_num_span").css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            $('button[type="submit"]').attr("disabled", "disabled");
        } else {
            $("member_card_num_span").css("border-color", "green");
            $("#" + span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
    function deleteRow(id){
        $("#" + id).remove();
        var x = document.getElementById('resultTable');
        len = x.rows.length;
        if(len == 0){
            $("#resultTable").html('<tr><td colspan="9" style="text-align: center;color: red"> لا يوجد أبناء  </td> </tr>');
        }

    }




</script>




<script>
    function add_row_attach(number_attach){
        $("#table_attach_files").show();

        var count_value = $("#count_row").val();
        $("#frist_one").remove();
        var x = document.getElementById('table_attach_files');
        var len_tab1 = x.rows.length;
        len=len_tab1;

        if(len_tab1>=number_attach)
        {
            alert("عفوا تمت اضافه جميع المرفقات");
            return;
        }



        var valu=[];
        $(".attached_files").each(function () {
            if($(this).val()!='')
            {

                //  $('.needed').addClass('nonactive');
                valu.push($(this).val());

            }
        })



        var dataString  = 'add_row=1&valu='+valu ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Web/family_register',
            data:dataString,
            cache:false,
            success: function(html){
               // alert(dataString);

                var inputs = document.getElementsByClassName( 'needed' ),
                    names  = [].map.call(inputs, function( input ) {
                        return input.value;
                    });

                var i;
                var foll= [];
                for (i = 0; i < names.length; i++) {
                    if(names[i] != '')
                    {
                        foll[i]=1;
                    }else if(names[i] == '') {

                        $('.needed').validate();
                        return false;
                    }

                }


                if(names.length ==  foll.length)
                {
                    $(".attached_files").each(function () {
                        $('.needed').addClass('nonactive');

                    });
                }





            $("#res_table").append(html);
              //   alert(html);
                count_value = parseFloat(count_value) + 1;
                $("#count_row").val(count_value);
                //------------------------------

                if (parseFloat($("#count_row").val()) != 0) {
                    $('input[type="submit"]').removeAttr("disabled");
                } else {
                    $('input[type="submit"]').attr("disabled", "disabled");
                }


            }
        });
        return false;
    }
    //==========================
    function delete_row(this_part){
        var count_value = $("#count_row").val();
        count_value = parseFloat(count_value) - 1 ;
        $("#count_row").val(count_value);
        $(this_part).parents('tr').remove();
        //------------------------------
        if(parseFloat( $("#count_row").val() )  > 0){
            $('input[type="submit"]').removeAttr("disabled");
        }else {
            $('input[type="submit"]').attr("disabled","disabled");
        }
        //------------------------------
    }
</script>

<script>
    function get_emp(id_depart,id_pop) {
        // alert(id_depart);
        if (id_depart != 0 && id_depart != "") {
            var dataString = "get_emp=" + id_depart;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>Web/GetDepart',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#user_to-"+id_pop).html(html);
                    $("#user_to-"+id_pop).selectpicker("refresh");
                }
            });
        }
    }
</script>


<script>
    function pass_emp_date(this_value,table_id,id_re) {   //data-img
        var name  = $('option:selected',this_value).text();
        var image = $('option:selected',this_value).attr("data-img");
        var job   = $('option:selected',this_value).attr("data-job");
        var pass  = "<?php echo base_url()."uploads/images/"?>" ;

        $("#name-emp-"+table_id+id_re).text(name);
        $("#jon-title-"+table_id+id_re).text(job);
        $("#person_photo-"+table_id+id_re).attr("src",pass + image );

    }



</script>



<script>
    $(document).ready(function(){
        $("#mother_national_num").keyup(function(){
            var x = document.getElementById('resultTable');
            var len = x.rows.length ;
            if(len=="1"){
                var x= document.getElementById("person_relationship").value;
                if(x =="41"){
                    $("#member_card_num"+len).val($("#mother_national_num").val());

                }
            }
        });

        $("#full_name_order").keyup(function(){
            var x = document.getElementById('resultTable');
            var len = x.rows.length ;
            if(len=="1"){
                var x= document.getElementById("person_relationship").value;
                if(x =="41"){
                    $("#member_full_name"+len).val($("#full_name_order").val());

                }
            }
        });



    });
</script>


<script>

    function check_all(id) {

        var inputs = document.querySelectorAll('.check_large'+id);
        var input = document.getElementById('check_all_not'+id).checked;

        for (var i = 0; i < inputs.length; i++) {
            inputs[i].checked = input;

        }


    }

</script>