
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script><script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script><script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery.maskedinput.min.js"></script>
<style>
    .one_three{
        width: 43% !important;
        float: right;
    }
    .two_three{
        width: 57% !important;
        float: right;
    }
</style>
<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php  echo $title?> </h3>
        </div>
        <div class="panel-body">
            <?php if(isset($result) && $result!=null){
                $button ='تعديل ';
                $required ='';
                $validation ='';
                $out['input']='UPDTATE';
                $out['input_title']='تعديل ';
                $readonly = 'readonly';
                $form = form_open_multipart("family_controllers/Family/UpdateRegister/".$result["id"]);
            }else{
                $button ='حفظ';
                $validation ='';
                $required ='data-validation=""';
                $readonly = '';
                $out['input']='ADD';
                $out['input_title']='حفظ ';
                $form =form_open_multipart("family_controllers/Family/InsertNewRegister");
            }?>
            <?php echo $form ?>
            <div class="col-sm-12 form-group">
                <div class="col-sm-6 col-md-3 padding-4">
                    <label class="label label-green  one_three">رقم السجل المدنى للأب </label>
                    <input type="text" name="father_national_num" maxlength="10"
                           onkeypress="validate_number(event);check_length_num(this,10,'father_span_num');"
                           value="<?php if(isset($result)){ echo $result["father_national_num"];} ?>"
                           class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="">
                    <span id="father_span_num" style="color: red;"></span>
                </div>
                <div class="col-sm-6  col-md-3 padding-4 ">
                    <label class="label label-green  one_three">إسم الأب رباعي  </label>
                    <input  type="text" name="full_name" class="form-control two_three input-style" placeholder="أدخل البيانات"
                            value="<?php if(isset($result)){ echo $result["father_name"];} ?>"   data-validation="">
                </div>
                <div class="col-sm-6 col-md-3 padding-4">
                    <label class="label label-green  one_three">نوع هوية الأم </label>
                    <select name="national_id_type"
                            class="selectpicker no-padding form-control choose-date form-control two_three"
                            data-show-subtext="true" data-live-search="true" data-validation="" onchange="GetNationalidType(this.value)"
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
                </div>
                <div class="col-sm-6 col-md-3 padding-4">
                    <label class="label label-green  one_three">رقم هوية الأم</label>
                    <input type="text"  name="mother_national_num"  id="mother_national_num"  maxlength="10" onkeypress="validate_number(event);"
                           value="<?php if(isset($result)){ echo $result["mother_national_num"];} ?>"
                        <?php echo $readonly; ?> disabled="disabled"
                           id="mother_national_num" onkeyup=""
                           class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="">
                    <span id="result_span_num" style="color: red;"></span>
                </div>
            </div>
            <div class="col-sm-12 form-group">
                <div class="col-sm-6 col-md-3 padding-4">
                    <label class="label label-green  one_three">الحالة الإجتماعية</label>
                    <select  name="marital_status_id_fk"  data-validation="" class="selectpicker no-padding form-control choose-date form-control two_three"
                             data-show-subtext="true" data-live-search="true"   aria-required="true" >
                        <option value="">اختر</option>
                        <?php foreach ($marital_status_array as $row6):
                            $selected='';if($row6->id_setting==$result['marital_status_id_fk_mother']){$selected='selected';}   ?>
                            <option value="<?php  echo $row6->id_setting;?>"  <?php echo $selected?>  ><?php  echo $row6->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>

                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">مقر التسجيل ( الفرع )</label>
                    <select name="register_place" class="selectpicker no-padding form-control choose-date form-control two_three"  data-validation=""   data-show-subtext="true" data-live-search="true"   aria-required="true">
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
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">إسم مقدم الطلب رباعى  </label>
                    <input type="text" name="full_name_order"  value="<?php if(isset($result)){ echo $result["full_name_order"];} ?>" class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="">
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">الصلة</label>
                    <select name="person_relationship"  id="person_relationship" data-validation="" aria-required="true" data-show-subtext="true" data-live-search="true"
                            onchange="get_num_fk(this.value);" class="selectpicker no-padding form-control choose-date form-control two_three">
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

            </div>
            <div class="col-sm-12 form-group" >

                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">رقم هوية مقدم الطلب  </label>
                    <input type="text" maxlength="10"   name="person_national_card" id="person_national_card"
                           value="<?php if(isset($result)){ echo $result["person_national_card"];} ?>"
                           onkeypress="validate_number(event);" onkeyup="check_length_num(this,10,'span_card');"
                           class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="">
                    <span id="span_card" style="color: red;"></span>
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three"> جوال التواصل ( الرسائل)    </label>
                    <input type="text" maxlength="10" name="contact_mob"  value="<?php if(isset($result)){ echo $result["contact_mob"];} ?>"
                           onkeypress="validate_number(event);" onkeyup="check_length_num(this,10,'span_phone');"
                           class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="">
                    <span id="span_phone" style="color: red;"></span>
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three"> المدينة  </label>
                    <!-- <input type="text" name="full_name_order"  value="<?php // if(isset($result)){ echo $result["full_name_order"];} ?>" class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="">
                -->  <select class="form-control two_three selectpicker"  name="center_id_fk" data-show-subtext="true" data-live-search="true"
                             data-validation="" aria-required="true" onchange="get_sub_select(this.value,'center_option');">
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
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three"> الحي  </label>
                    <!--  <input type="text" name="full_name_order"  value="<?php // if(isset($result)){ echo $result["full_name_order"];} ?>" class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="">
               -->
                    <select name="district_id_fk" class="form-control two_three " id="center_option" name="" data-show-subtext="true" data-live-search="true"
                            data-validation="" aria-required="true">
                        <option value="">اختر</option>
                        <?php  if(isset($all_district) && !empty($all_district)){
                            foreach ($all_district as $row_city):
                                $selected = '';
                                if (isset($result)) {
                                    if ($row_city->id == $result['district_id_fk']) {
                                        $selected = 'selected';
                                    }
                                } ?>
                                <option value="<?php echo $row_city->id ?>" <?php echo $selected ?> >
                                    <?php echo $row_city->title ?></option>
                            <?php endforeach;
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 form-group" >
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">عدد الذكور
                    </label>
                    <input type="text" name="male_number" id="male_number" onkeypress="validate_number(event)"
                           data-validation="" onkeyup="getFamilyNumber();" value="<?php if (isset($result)) {
                        echo $result["male_number"];
                    } ?>" class="form-control two_three input-style"/>
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">عدد الإناث
                    </label>
                    <input type="text" name="female_number" id="female_number" onkeypress="validate_number(event)"
                           data-validation="" onkeyup="getFamilyNumber();" value="<?php if (isset($result)) {
                        echo $result["female_number"];
                    } ?>" class="form-control two_three input-style"/>
                </div>

                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">اجمالي عدد الأفراد
                    </label>
                    <input type="text" name="family_members_number" id="family_members_number"
                           onkeypress="validate_number(event)" data-validation="" readonly
                           value="<?php if (isset($result)) {
                               echo $result["family_members_number"];
                           } ?>" class="form-control two_three input-style"/>
                </div>

                <div class="form-group col-sm-3">
                    <label class="label label-green  one_three" >مصادر الدخل الشهري </label>
                    <input class="textbox form-control" type="text" name="retirement" value="<?php if(isset($result)){ echo $result["retirement"];} ?>" placeholder="تقاعد" style="width: 18.5%;float: right;" >
                    <input class="textbox form-control" type="text" name="insurance" value="<?php if(isset($result)){ echo $result["insurance"];} ?>" placeholder="تأمينات" style="width: 19.5%;float: right;" >
                    <input class="textbox4 form-control" type="text" name="guarantee" value="<?php if(isset($result)){ echo $result["guarantee"];} ?>" placeholder="ضمان" style="width: 18.5%;float: right;" >
                </div>
            </div>

            <div class="col-sm-12 form-group" >

                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">ملكية السكن </label>
                    <select class="form-control two_three" id="building_type" name="h_house_owner_id_fk"
                            data-validation="" aria-required="true" onchange="getRent();">
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
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">مقدار الإيجار السنوى </label>
                    <input placeholder="إدخل البيانات " id="h_rent_amount" type="text"
                           onkeypress="validate_number(event);" class="  form-control two_three " data-validation=""
                           name="h_rent_amount" value="<?php if (isset($result)){
                        echo $result['h_rent_amount']; } ?>" <?php if (isset($result)){ if ($result['h_house_owner_id_fk'] != 'rent') { ?>  disabled<?php }
                    } ?> >
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">الوقت المناسب للتواصل</label>
                    <input placeholder="إدخل البيانات " id="h_rent_amount" type="time" class="form-control  input-style" data-validation=""
                           name="right_time_from" value="<?php if (isset($result)){
                        echo $result['right_time_from']; } ?>" style="width: 28%;float: right;">
                    <input placeholder="إدخل البيانات " id="h_rent_amount" class="form-control  input-style" type="time" data-validation=""
                           name="right_time_to" value="<?php if (isset($result)){
                        echo $result['right_time_to']; } ?>"  style="width: 28%;">
                </div>
            </div>
            <!--  <div class="col-sm-12 form-group" >
         
               </div>
             -->
            <div class="col-sm-12 form-group" >
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">إسم المستخدم </label>
                    <input type="text" name="user_name" class="form-control two_three input-style" placeholder="أدخل البيانات"
                           value="<?php if(isset($result)){ echo $result["user_name"];} ?>"   data-validation="">
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">كلمة المرور  </label>
                    <input type="password" name="user_password" onkeyup="valid_pass_length();" id="user_password" class="form-control two_three input-style" <?php echo $required?> />
                    <span  id="validate_length" class="span-validation"> </span>
                </div>
                <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  one_three">تاكيد كلمة المرور <strong></strong> </label>
                    <input type="password"   id="user_password_copy" onkeyup="return valid_pass_copy();" class="form-control two_three input-style"    <?php echo $required?> />
                    <span  id="validate_copy" class="span-validation"> </span>
                </div>

                <!--
                     <div class=" col-sm-6  col-md-3 padding-4">
                    <label class="label label-green  half"> الطلب عن طريق 
                      </label>
                    <select name="order_method" class="form-control half  " 
                           data-validation="" >
                        <?php $order_method_arr=array('','الجمعية','الموقع');
                ?>
                        <option value="">اختر</option>
                        <?php for ($a=1;$a<sizeof($order_method_arr);$a++){ $select='';
                    if(isset($result["order_method"])){
                        if($a== $result["order_method"]){$select='selected';} ?>
                        <?php } ?>
                        <option value="<?php echo$a; ?>"
                        <?php echo $select;?>><?php echo $order_method_arr[$a]; ?></option>
                        <?php }?>
                    </select>
                </div> 
                -->
            </div>
            <?php /* ?>          
             
            
            <div class="col-sm-12 form-group" >
             
            
                
<!--
   <div class="col-sm-4">
                    <label class="label label-green  one_three">مسئول الجوال </label>
		<select name="contact_mob_relationship" id="contact_mob_relationship"  data-validation="" aria-required="true"
            class="selectpicker no-padding form-control choose-date form-control two_three"
					>
						<option value="">إختر</option>
						<?php if(!empty($relationships)){ foreach ($relationships as $record){
							$select=''; if($result['contact_mob_relationship']==$record->id_setting){$select='selected'; }
							?>
							<option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
						<?php  } } ?>
					</select>
                </div>               
             -->   
                
                <!--
                <div class="col-sm-4">
                    <label class="label label-green  one_three">الإيميل </label>
                    <input type="text"   name="contact_email"  value="<?php if(isset($result)){ echo $result["contact_email"];} ?>"
                           class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="email">
                </div>
                -->
            </div>
            
            
                        <div class="col-sm-12 ">
            

              <!--  <div class="col-sm-4  col-sm-4">
                    <label class="label label-green  one_three">الإيميل </label>
                    <input type="text" name="contact_email" value="<?php if (isset($result)) {
                        echo $result["contact_email"];
                    } ?>"
                           class="form-control two_three input-style" placeholder="أدخل البيانات" data-validation="email">
                </div>-->
            </div>
<?php */ ?>
            <!-------------------------------F_members----------------------------------------->
            <div class="col-sm-12 ">
                <button type="button" value="" id="" onclick="add_row()" class="btn btn-success btn-next"/>
                <i class="fa fa-plus"></i> إضافة الأبناء </button><br><br>
                <table   class="table table-striped table-bordered " style="display: none"   id="mytable" >
                    <thead>
                    <tr class="info">
                        <th class="text-center" >م</th>
                        <th class="text-center" > الإسم</th>
                        <th class="text-center" >الصلة</th>
                        <th class="text-center" > الجنس </th>
                        <th class="text-center" > الهوية </th>
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
            <!-----------------------------------F_members------------------------------------->
            <!--      <div class="col-sm-12 ">
                <?php /*if(isset($result) && $result!=null){ */?>
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <td>م</td>
                            <td>إسم المرفق</td>
                            <td>إرفاق</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*$y=1;
                        if(isset($files_attached) && $files_attached!=null){
                            foreach ($files_attached  as $file_row){ */?>
                            <tr>
                                <td><?/*=$y++;*/?></td>
                                <td><?/*=$file_row->title_setting*/?></td>
                                <?php /*if( isset($file_row->files_name["attach_file"]) &&  !empty($file_row->files_name["attach_file"]) ){*/?>
                                    <td>
                                        <a href="<?/*=base_url()."uploads/registers_files/".$file_row->files_name["attach_file"]*/?>" download>
                                        <i class="fa fa-download"></i> </a>
                                         <a  data-toggle="modal" data-target="#myModal-view-<?/*=$file_row->files_name["id"]*/?>" >
                                          <i class="fa fa-eye" title=" قراءة"></i> </a>
                                        <a href="<?php /*echo base_url().'family_controllers/Family/DeleteFileRegister/'.$file_row->files_name["id"].'/'.$result["id"] */?>" >
                                            <i class="fa fa-trash" aria-hidden="true" title="حذف"></i>
                                    </td>
                                <?php /*}else{*/?>
                                    <td>
                                        <input type="file" name="attach_files[]" class="form-control half"  />
                                        <input type="hidden" name="attach_files_ids[]" value="<?/*=$file_row->id_setting*/?>"  />
                                    </td>
                                <?php /*}*/?>
                            </tr>
                        <?php /*}*/?>
                        <?php /*} */?>
                        </tbody>
                    </table>
                <?php /*$y=1;
                     if(isset($files_attached) && $files_attached!=null){
                 foreach ($files_attached  as $file_row){ */?>
        <div class="modal fade" id="myModal-view-<?/*=$file_row->files_name["id"]*/?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                    </div>
                    <div class="modal-body">
                        <img src="<?/*=base_url()."uploads/registers_files/".$file_row->files_name["attach_file"]*/?>" width="100%">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>
                    <?php /*}*/?>
  <?php /*}*/?>
                <?php /*}else{*/?>
                
                    <?php /*if(isset($main_attach_files) && !empty($main_attach_files) ){*/?>
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <td>م</td>
                            <td>إسم المرفق</td>
                            <td>إرفاق</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php /*$y=1; foreach ($main_attach_files  as $file_row){*/?>
                            <tr>
                                <td><?/*=$y++;*/?></td>
                                <td><?/*=$file_row->title_setting*/?></td>
                                <td>
                                    <input type="file" name="attach_files[]" class="form-control half"  />
                                    <input type="hidden" name="attach_files_ids[]" value="<?/*=$file_row->id_setting*/?>"  />
                                </td>
                            </tr>
                        <?php /*}*/?>
                        </tbody>
                    </table>
                    <?php /*}*/?>
                <?php /*}*/?>
            </div>-->
            <div class="form-group col-sm-4">
                <label class="label label-green  half"></label>
                <input tabindex="11" type="radio" id="square-radio-1"
                    <?php if(isset($result) && $result!=null){ echo "checked";}
                    else {echo  '';} ?>  >
                <label for="square-checkbox-1">اوافق على الاقرار</label>
            </div>
            <div class="col-xs-12">
                <button  type="submit" id="button" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"  class="btn btn-success ">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title']?></button>
            </div>
            <?php  echo form_close()?>
            <!------------------------------------------------------------->
            <?php
            if(isset($records)&& $records!=null):?>
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">رقم الطلب</th>
                            <th class="text-center">إسم رب الأسرة</th>
                            <th class="text-center">رقم الهوية</th>
                            <th class="text-center">إسم الأم- الوكيل</th>
                            <th class="text-center">هوية الأم - الوكيل</th>
                            <!--  <th class="text-center">رقم الجوال</th> -->
                            <th class="text-center">الاجراء</th>
                            <th class="text-center">استكمال البيانات</th>
                            <!-- <th class="text-center">إجراءات علي الملف</th> 
                                  <th class="text-center">رأي الباحث</th>
                                  <th class="text-center"> حاله الملف </th>
                                  <th class="text-center">إجراءات حالات الملف</th>
                                  <th class="text-center">تحديث الملف </th> -->
                            <th class="text-center">طباعه الملف</th>
                            <!--  <th class="text-center">ربط الاسرة بالباحثين</th> -->
                            <th class="text-center">تحويل الملف </th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php  $x=1; foreach ($records as $record ):
                            if ($record->mother_name != '') {
                                $mother_name   = $record->mother_name;
                                // $mother_name = '<h6 style="color: red;" > إستكمل البيانات</h6';  
                            }elseif($record->mother_name == ''){
                                $mother_name   = $record->full_name_order;
                                //  $mother_name = '<h6 style="color: red;" > إستكمل البيانات</h6';  
                            }else{
                                $mother_name = '<h6 style="color: red;" > إستكمل البيانات</h6>';
                            }
                            ?>
                            <tr>
                                <td><?php echo $x++ ?></td>
                                <td><?php echo $record->id; ?></td>
                                <td><?php echo $record->father_name; ?></td>
                                <td><?php echo $record->father_national; ?></td>
                                <td><?php
                                    echo $mother_name;
                                    /*if($record->mother_name != ''){
                                       echo $record->mother_name; }else{
                                           echo '<button type="button" class="btn btn-warning w-md m-b-5"> إستكمل البيانات</button>'; }  
                                           */
                                    ?>
                                </td>
                                <td><?php echo $record->mother_national_num; ?></td>
                                <!--<td><?php echo $record->mother_mob; ?></td> -->
                                <td> <a href="<?php echo base_url('family_controllers/Family/UpdateRegister').'/'.$record->id?>">
                                        <i class="fa fa-pencil " aria-hidden="true"></i> </a>
                                    <a href="<?php echo  base_url('family_controllers/Family/delete_basic').'/'.$record->mother_national_num ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger">اضافه</button>
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/father/<?php echo $record->mother_national_num;?>">بيانات الأب  </a></li>
                                            <li><a target="_blank"  href="<?php echo base_url();?>family_controllers/Family/mother/<?php echo $record->mother_national_num;?>">بيانات الأم  </a></li>
                                            <li><a target="_blank"  href="<?php echo base_url();?>family_controllers/Family/add_wakel/<?php echo $record->mother_national_num;?>">بيانات الوكيل  </a></li>
                                            <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/family_members/<?php echo $record->mother_national_num;?>/<?php echo $record->person_account;?>/<?php echo $record->agent_bank_account;?>">بيانات أفراد الأسرة</a></li>
                                            <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/house/<?php echo $record->mother_national_num;?>">بيانات السكن</a></li>
                                            <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/devices/<?php echo $record->mother_national_num;?>">محتويات السكن </a></li>
                                            <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/home_needs/<?php echo $record->mother_national_num;?>"> إحتياجات الأسرة </a></li>
                                            <li>
                                                <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/money/<?php echo $record->mother_national_num;?>">مصادر الدخل والإلتزامات </a>
                                            </li>
                                            <li>
                                                <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/add_responsible_account/<?php echo $record->mother_national_num;?>">بيانات الحساب البنكي</a>
                                            </li>
                                            <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/attach_files/<?php echo $record->mother_national_num;?>">رفع الوثائق  </a></li>
                                        </ul>
                                    </div>
                                </td>
                                <!--
<td>
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family_details/details/<?php echo $record->mother_national_num;?>">إجراءات</a>
</td>
<td>
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/SocialResearcher/<?php echo $record->mother_national_num;?>">إضافة رأي الباحث</a>
</td>
<td style="color: black;"><?php echo $record->process_title;?></td>
<td> <button data-toggle="modal"
             data-target="#modal-info<?php echo $record->id;?>"
             class="btn btn-sm btn-info"><i
            class="fa fa-list btn-info"></i>حاله الملف
    </button>
</td>
<td style="color: black;">
    <button data-toggle="modal" <?php if($record->suspend!=4){?> disabled="disabled"  <?php } ?>
            data-target="#modal-update<?php echo $record->id;?>"
            class="btn btn-sm btn-info"><i
            class="fa fa-list btn-info"></i>تحديث حاله الملف
    </button>
</td>-->
                                <td><a href = "<?php echo base_url('family_controllers/Family_details/print_family').'/'.$record->mother_national_num ?>" target = "_blank" >
                                        <i class="fa fa-print" aria-hidden = "true" ></i > </a>
                                    <a href = "<?php echo base_url('family_controllers/Family_details/printEqrar').'/'.$record->mother_national_num ?>" target = "_blank" > <i class="fa fa-print" aria-hidden = "true" ></i > </a>
                                </td>
                                <!--
<td style="color: black;">
        <button data-toggle="modal" data-target="#modal-link-family-<?php echo $record->id;?>" 
           class="btn btn-sm btn-success"><i
                class="fa fa-list btn-success"></i> ربط الأسرة بباحث
        </button>
   </td>
   -->
                                <td style="color: black;">
                                    <button data-toggle="modal" data-target="#modal-process-procedure-<?php echo $record->id;?>" class="btn btn-sm btn-info"><i
                                            class="fa fa-list btn-info"></i>   تحويل الملف
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
                <?php $all_adminastration="";  if (isset($adminastration) && !empty($adminastration)) {
                    foreach ($adminastration as $row_adminastration) {
                        $all_adminastration.='<option value="'.$row_adminastration->id.'">'.$row_adminastration->name.'</option>';   ?>
                    <?php }  } ?>

                <?php  $x=1; foreach ($records as $record ):?>
                    <!-- start  -->
                    <div class="modal fade" id="modal-update<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"> تحديث حاله ملف  الأسره </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  method="post" action="<?php echo base_url();?>family_controllers/Family/update_file_status">
                                        <div class="col-md-12">
                                            <input type="hidden" name="mother_national" value="<?php echo $record->id;?>">
                                            <?php
                                            $file_num
                                            ?>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> رقم الملف  <strong class="astric">*</strong> </label>
                                                <input type="text" readonly="readonly" class="form-control half input-style"  name="file_num"
                                                       value=" <?php  if($record->file_num!=0){ echo  $record->file_num; }
                                                       else {  echo  ($file_num + 1) ;}?>"
                                                       id="file_num"   <?=$validation?> />
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12" >
                                                <label class="label label-green  half"> تاريخ اعتماد الملف  <strong class="astric">*</strong> </label>
                                                <input type="date" class="form-control half input-style "  name="date_suspend" value="<?=$record->date_suspend?>"   id="date_suspend"   name="date_suspend"  <?=$validation?> />
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> فتره التحديث <strong class="astric">*</strong> </label>
                                                <select id="peroid_update" name="peroid_update" class="form-control half input-style"
                                                        onchange="get_peroid($(this).val(),<?php echo $record->id;?>);">
                                                    <option value="0">اختر</option>
                                                    <?php
                                                    if(isset($all_options)&&!empty($all_options)) {
                                                        foreach ($all_options as $row) {
                                                            ?>
                                                            <option value="<?php echo $row->num_of_day;?>" <?php if(isset($record->peroid_update )&&!empty($record->peroid_update)&&$record->peroid_update==$row->num_of_day ){?> selected="selected"<?php } ?>> <?php echo $row->title;?> </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12" >
                                                <label class="label label-green  half"> تاريخ التحديث<strong class="astric">*</strong> </label>
                                                <input type="date" class="form-control half input-style"  name="update_date" value="<?=$record->file_update_date?>" readonly="readonly"   id="update_date<?php echo $record->id;?>"   <?=$validation?> />
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-purple w-md m-b-5" name="register" id="register" value="register">
                                                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?=$button?></button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end  -->
                    <div class="modal fade" id="modal-info<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><div style="color:red;" ><?php echo $record->process_title;?> </div></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <label class="label label-green  half">من فضلك اذكر السبب</label>
                            <textarea   class="form-control half  reason<?php echo $record->mother_national_num;?>" style="width: 100%;" rows="4" data-validation="" >
                        </textarea>
                                    </div>
                                    <div class="col-md-12" style="padding-top: 20px !important;">
                                        <?php if(isset($file_status)&&!empty($file_status)) {
                                            foreach ($file_status as $row) {
                                                ?>
                                                <div class="col-md-3">
                                                    <button value="<?php echo $row->id;?>" onclick="change_status($(this).val(),$(this).attr('title'),$(this).attr('mom'));" style="background-color:<?php echo $row->color;?>;"
                                                            title="<?php echo $row->title;?>"
                                                            mom="<?php echo $record->mother_national_num;?>"
                                                            class="btn btn-sm btn-info status">
                                                        </i> <?php echo $row->title;?>
                                                    </button>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-process-procedure-<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-success" role="document"  style="width: 80%">
                            <div class="modal-content">
                                <?php echo  form_open_multipart("TransformationProcess/TransformationOfRegester/3/".$record->mother_national_num);?>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div style="" >احالة الملف  </div>
                                    </h5>
                                </div>
                                <div class="modal-body ">
                                    <div class="col-sm-12">
                                        <input type="hidden" name="family_file" value="<?=$record->mother_national_num;?>" />
                                        <div class="col-sm-6">
                                            <label class="label label-green  half"> الإدارة </label>
                                            <select name="" class="form-control half selectpicker"
                                                    onchange="get_emp(this.value,'<?php echo $record->id;?>');" data-validation=""
                                                    aria-required="true" data-show-subtext="true" data-live-search="true">
                                                <option value="">اختر</option>
                                                <?php echo $all_adminastration;?>
                                            </select>
                                        </div>
                                        <!--  <div class="col-sm-4">
                                            <label class="label label-green  half"> القسم </label>
                                            <select name="" id="departments-<?php //  echo $record->id;?>" onchange="get_emp(this.value ,'<?php echo $record->id;?>' );"
                                                    class="form-control half selectpicker" data-validation=""
                                                    aria-required="true" data-show-subtext="true" data-live-search="true">
                                                <option value="">إختر الإدارة أولا</option>
                                            </select>
                                        </div> -->
                                        <div class="col-sm-6">
                                            <label class="label label-green  half"> الموضف </label>
                                            <select name="user_to" id="user_to-<?php echo $record->id;?>" class="form-control half selectpicker"
                                                    data-validation="" aria-required="true" data-show-subtext="true"
                                                    data-live-search="true">
                                                <option value="">إختر الإدارة أولا</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label label-green  half">  الاجراء  </label>
                                        <select class="form-control half " name="process_procedure_id_fk" data-validation="" aria-required="true">
                                            <option value="">اختر</option>
                                            <?php if(isset($select_process_procedures)&&!empty($select_process_procedures)) {
                                                foreach ($select_process_procedures as $row_process_procedures) {?>
                                                    <option value="<?=$row_process_procedures->id?>"><?=$row_process_procedures->title?></option>
                                                <?php }
                                            }?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="label label-green  half" >ملاحظات: </label>
                                        <textarea class="form-control half input-style"  rows="3" name="reason"  data-validation=""  ></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer" style="display: inline-block; width: 100%;">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" name="go" value="<?php echo $record->id;?>" class="btn btn-warning">حفظ </button>
                                </div>
                                <?php  echo form_close()?>
                            </div>
                        </div>
                    </div>
                    <!--------------------------------------------------------------------->
                    <div class="modal fade" id="modal-link-family-<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <?php echo  form_open_multipart("family_controllers/Family/AddRelations/$record->mother_national_num");?>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div style="color:red;" >ربط الاسرة</div>
                                    </h5>
                                </div>
                                <div class="modal-body row">
                                    <div class="col-sm-12">
                                        <?php
                                        // print_r($employees_data);
                                        ?>
                                        <label class="label label-green  half">  اختار الموظف  </label>
                                        <input type="hidden" name="data[mother_national_id_fk]" value="<?=$record->mother_national_num;?>" />
                                        <select name="data[emp_id_fk]" class="form-control half  selectpicker"
                                                data-validation="" aria-required="true" data-show-subtext="true"
                                                data-live-search="true">
                                            <option value="">اختر</option>
                                            <?php if(isset($employees_data)&& !empty($employees_data)) {
                                                foreach ($employees_data as $row_user) {
                                                    $selected= '' ;
                                                    if($row_user->id == $record->researcher_id){
                                                        $selected=  'selected' ;
                                                    }
                                                    ?>
                                                    <option value="<?=$row_user->id ?>" <?=$selected?>>
                                                        <?= $row_user->employee ?></option>
                                                <?php }
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" name="go" value="<?php echo $record->id;?>" class="btn btn-warning">حفظ </button>
                                </div>
                                <?php  echo form_close()?>
                            </div>
                        </div>
                    </div>
                <?php endforeach;  ?>
            <?php endif; ?>
            <!---------------------------->
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(function($){
        $(".date_as_mask").mask("99/99/9999");
    });
</script>
<script>
    function check_num(){
        var national_id_type =$('#national_id_type').val();
        var dataString =  "chek_mother_national_num=" + $("#mother_national_num").val();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/CheckNationalNum',
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
                url: '<?php echo base_url() ?>family_controllers/Family_details/GetDepart',
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
                url: '<?php echo base_url() ?>family_controllers/Family_details/GetDepart',
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
                url: '<?php echo base_url() ?>family_controllers/Family/GetArea',
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
    function add_row(){
        $("#mytable").show();
        var gender_arr =[ "", "ذكر", "أنثى" ];
        var relationships = JSON.parse( '<?php echo json_encode($relationships); ?>' );
        var x = document.getElementById('resultTable');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/getFamilyMembers',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#resultTable").append(html);
                // $('#saves').show();
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
</script>