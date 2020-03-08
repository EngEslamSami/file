<style type="text/css">
    .pdd{
        margin: 0;padding: 0
        }

    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 140px;
        height: 140px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }



    input[type=radio] {
        height: 20px;
        width: 20px;
    }

label.label-green {
    display: inline-block;
    width: 100%;
}
label.label-green {
    height: auto;
    line-height: unset;
    font-size: 16px !important;
    font-weight: 600 !important;
    text-align: right !important;
    margin-bottom: 0;
    background-color: transparent;
    color: #002542;
    border: none;
    padding-bottom: 0;
    font-weight: bold;
}
.half {
    width: 100% !important;
    float: right !important;
}
</style>

<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?> </h3>
        </div>
        <div class="panel-body">
            <!-------------------------------------------------------------------------------------->
            <?php if(isset($sarf_data)){
                  echo form_open_multipart("family_controllers/FamilyCashing/UpdateFamilyCashing/".$sarf_data["sarf_num"]);
                  $out["deisabled"]="disabled";
                    if($sarf_data["method_type"] == 3){
                        $out["deisabled_bank"]="disabled=''";
                        $out["readonly_bank"]="readonly=''";
                    }else{
                        $out["deisabled_bank"]="";
                        $out["readonly_bank"]="";
                    }
                  $out['input']='UPDATE';
                  $out['input_title']='تعديل ';
            }else{
                  echo form_open_multipart("family_controllers/FamilyCashing");
                  $out["deisabled"]="";
                  $out["deisabled_bank"]="disabled=''";
                  $out["readonly_bank"]="readonly=''";
                  $out['input']='ADD';
                  $out['input_title']='حفظ ';
            }?>

              <input type="hidden"  name="sarf_num" id="sarf_num" value="<?php if(isset($sarf_data)){echo $sarf_data["sarf_num"];}else{ echo $last_sarf+1;}?>" class="form-control " placeholder="ادخل البيانات " readonly="">
              <input type="hidden"  name="sarf_date" value="<?php if(isset($sarf_data)){echo $sarf_data["sarf_date_ar"];}else{ echo date("Y-m-d",time());}?>"  class="form-control  " data-validation="required" >
        <!--    <div class="col-xs-12">
                <div class="form-group col-sm-4">
                    <label class="label ">رقم الصرف  </label>
                    <input type="text"  name="sarf_num" id="sarf_num" value="<?php if(isset($sarf_data)){echo $sarf_data["sarf_num"];}else{ echo $last_sarf+1;}?>" class="form-control " placeholder="ادخل البيانات " readonly="">
                </div>
                <div class="form-group col-sm-4">
                    <label class="label ">تاريخ الصرف </label>
                    <input type="date"  name="sarf_date" value="<?php if(isset($sarf_data)){echo $sarf_data["sarf_date_ar"];}else{ echo date("Y-m-d",time());}?>"  class="form-control  " data-validation="required" >
                </div>
                <div class="form-group col-sm-4">
                    <label class="label ">طريقة الصرف </label>
                    <select name="method_type" id="method_type" onchange="get_method_type(this.value);set_member_type(this.value);get_sarf_types();" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                        <?php // $method_type=array("1"=>"بنكى","2"=>"شيك","3"=>"نقدى","4"=>"تحويله بنكية")?>
                        <?php $method_type=array("2"=>"شيك","4"=>"تحويل")?>
                        <option value="">إختر</option>
                        <?php $x=1; foreach ($method_type as $key=>$value){
                            $selected="";
                            if(isset($sarf_data)){
                                if($key== $sarf_data["method_type"] ){$selected="selected";}
                            }?>
                            <option value="<?=$key?>" <?=$selected?> ><?=$value?></option>
                            <?php } ?>
                    </select>
                </div>
            </div>
            -->
           <div class="col-xs-12 no-padding">
           
           <div class="form-group col-sm-3 padding-4">
                  
                    <label class="label ">اختر </label>
                    
                    <div class="radio-content">
                         <input type="radio" id="money-radio" />
                         <label class="radio-label" for="money-radio">مساعدات مالية</label>
                    </div>
                    <div class="radio-content">
                         <input type="radio" id="ainia-radio" />
                         <label class="radio-label" for="ainia-radio">مساعدات عينية</label>
                    </div>
                   
                </div>
                
                
                <div class="form-group col-sm-2 padding-4">
                  
                    <label class="label ">بند المساعدة </label>
                    
                    <select name="bnod_help_id_fk" class="form-control " data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                        <option value="">إختر</option>
                        <?php $x=1; foreach ($bnod_help as $row){
                              $selected="";
                                if(isset($sarf_data)){
                                    if($row->id== $sarf_data["bnod_help_fk"] ){$selected="selected";}
                                }?>
                            <option value="<?=$row->id?>" <?=$selected?>><?=$row->title?></option>
                            <?php $x++;} ?>
                    </select>
                   
                </div>
    
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                      <label class="label  " style="">عبارة عن </label>
                       <input type="text" style=""   id="about"  name="about" class=" no-padding form-control form-control " />
              
                </div>   
            </div>
          <div class="col-xs-12 no-padding">
           <div class="form-group col-sm-4 col-xs-12 padding-4">
                   
                    <label class="label label-green "> مساعدة إلي </label>
                  <div class="radio-content">
                    <input  type="radio"  tabindex="11"   id="member_type1" name="member_type"  <?=$out["deisabled"]?>
                        <?php if(isset($sarf_data)){  if($sarf_data["type_family"]== 1){echo "checked";} }?>
                            onclick="get_sarf_types();" class="member_types"  value="1"    >
                    <label for="member_type1" class="radio-label">أسرة</label>
                  </div>
                  <div class="radio-content">
                    <input  type="radio" tabindex="11"  id="member_type2"  name="member_type"  <?=$out["deisabled"]?>
                        <?php if(isset($sarf_data)){  if($sarf_data["type_family"]== 2){echo "checked";} }?>
                            onclick="get_sarf_types();" class="member_types" value="2"   >
                    <label for="member_type2" class="radio-label">بعض الأسر </label>
                  </div>
                  <div class="radio-content">
                    <input  type="radio" tabindex="11"  id="member_type3"  name="member_type"  <?=$out["deisabled"]?>
                        <?php if(isset($sarf_data)){  if($sarf_data["type_family"]== 3){echo "checked";} }?>
                            onclick="get_sarf_types();" class="member_types"  value="3"   >
                    <label for="member_type3" class="radio-label">كل الأسر </label>
                  </div>
                    
                    
                    
                    
                   
                </div>
                <div class="form-group col-sm-7  padding-4">
              
                    <label class="label label-green " >نوع المساعدة </label>
                <div class="radio-content">
                   <input  type="radio"  id="type_sarf1" name="sarf_type"  <?=$out["deisabled"]?>
                        <?php  if(isset($sarf_data)){ if($sarf_data["type_sarf"] == 1){echo "checked";} }?>
                            onclick="get_sarf_types();"   class="sarf_types"  value="1" >
                    <label for="type_sarf1" class="radio-label">مقطوع لأسرة</label>
                </div>
                <div class="radio-content">
                 <input  type="radio" id="type_sarf2" name="sarf_type"  <?=$out["deisabled"]?>
                        <?php  if(isset($sarf_data)){ if($sarf_data["type_sarf"]== 2){echo "checked";} }?>
                            onclick="get_sarf_types();" class="sarf_types" value="2" >
                    <label for="type_sarf2" class="radio-label">مقطوع لفرد داخل الأسرة  </label>
                </div>
                <div class="radio-content">
                    <input  type="radio" id="type_sarf3" name="sarf_type"    <?=$out["deisabled"]?>
                        <?php  if(isset($sarf_data)){ if($sarf_data["type_sarf"]== 3){echo "checked";} }?>
                            onclick="get_sarf_types();" class="sarf_types"  value="3"  >
                    <label for="type_sarf3" class="radio-label">مخصص لكل فرد</label>
                </div>
                <div class="radio-content">
                 <input  type="radio" id="type_sarf4" name="sarf_type"    <?=$out["deisabled"]?>
                        <?php  if(isset($sarf_data)){ if($sarf_data["type_sarf"]== 4){echo "checked";} }?>
                            onclick="get_sarf_types();" class="sarf_types"  value="4"  >
                    <label for="type_sarf4" class="radio-label">بحسب</label>
                </div>
                

                    <input type="hidden" id="count_family" value="1" />


                </div>





<!--
            <?php $months = array("1" => "يناير","2" => "فبراير","3" => "مارس","4" => "أبريل","5" => "مايو",
                "6" => "يونيو","7" => "يوليو","8" => "أغسطس","9" => "سبتمبر","10" => "أكتوبر",
                "11" => "نوفمبر","12" => "ديسمبر"); ?>
            <div class="form-group col-sm-4 col-xs-12">
                <label class="label ">خلال شهر</label>
                <select  name="mon_melady"  class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true"    data-validation="required" aria-required="true">
                    <option value="">اختر</option>
                    <?php foreach($months as $key =>$value){
                        $selected="";
                            if(isset($sarf_data)){
                                if($key== $sarf_data["mon_melady"] ){$selected="selected";}
                            }?>
                        <option value="<?php echo $key;?>" <?=$selected?> ><?php  echo $value; ?></option>
                    <?php  }  ?>
                </select>
            </div>
            -->
        </div>
            <!--
            <div class="col-xs-12">
                <div class="form-group col-sm-6">
                    <label class="label ">إسم البنك  </label>
                    <select name="bank_id_fk" id="bank_id_fk" <?=$out["deisabled_bank"]?> class="form-control half "  aria-required="true" tabindex="-1" aria-hidden="true" >
                        <option value="">إختر</option>
                        <?php /* foreach ($all_banks as $row_bank){
                        if(isset($sarf_data)) {
                            $selected = "";
                            if ($row_bank->id == $sarf_data["bank_id_fk"]) { $selected = "selected"; }
                        }    ?>
                            <option value="<?=$row_bank->id?>" <?=$selected?> ><?=$row_bank->title?></option>
                            <?php } */?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label class="label ">رقم الحساب  </label>
                    <input type="text"  name="bank_account_num" <?php // echo $out["readonly_bank"]?>  maxlength="24" value="<?php /*if(isset($sarf_data)){echo $sarf_data["bank_account_num"];}*/?>" onkeypress="validate_number(event);" onkeyup="check_length_account_num();" id="bank_account_num" class="form-control " placeholder="ادخل البيانات " >
                    <span id="validate_length"></span>
                </div>
            </div>
            -->
            <div class="col-xs-12">

            </div>
            <div class="col-xs-12 no-padding" id="option"></div>
            <div class="col-xs-12 no-padding" id="option_table">
                <?php if(isset($sarf_data)){
                    $type_sarf = $sarf_data["type_sarf"]; ?>
                         <?php if($type_sarf == 1){?>
                        <div class="form-group col-sm-6">
                            <label class="label ">المستحق للأسرة  </label>
                            <input type="number"  id="update_family_value" class="form-control "  value="<?=$sarf_details[0]->value?>" readonly="">
                        </div>
                    <?php }elseif($type_sarf == 2){?>
                        <div class="form-group col-sm-6">
                            <label class="label ">المستحق الفرد  </label>
                            <input type="number" id="update_person_value" class="form-control "  value="<?=$sarf_details[0]->value/$sarf_details[0]->all_num?>" readonly="">
                        </div>
                    <?php }elseif($type_sarf == 3){ ?>
                        <div class="form-group col-sm-4">
                            <label class="label ">المستحق  للأرمل </label>
                            <input type="number"  id="update_mother_value"  class="form-control " value="<?=$person_values["mother_value"]?>" readonly="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label ">المستحق  اليتيم </label>
                            <input type="number"  id="update_young_value"  class="form-control "  value="<?=$person_values["young_value"]?>" readonly="">
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="label ">المستحق  المستفيد  </label>
                            <input type="number"  id="update_adult_value"  class="form-control " value="<?=$person_values["adult_value"]?>" readonly="">
                        </div>
                    <?php }?>
                    <div class="form-group col-sm-4">
                        <div class="col-xs-4 no-padding">
                        <label class="label label-green ">رقم ملف الاسرة  </label>
                        </div>
                         <div class="col-xs-8 no-padding">
                            <input type="number" id="update_national_num" onkeyup="check_faminly(this.value);" class="form-control " />
                            <span id="span_file" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <button type="button" class="btn btn-info " onclick="update_date('<?=$type_sarf?>');">
                            <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span> إضافة أسرة</button>
                    </div>
                <?php }?>
                <?php  if(isset($sarf_details) && !empty($sarf_details)){?>
                <div class="col-sm-12 no-padding">
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="greentd">
                            <th class="text-center">م</th>
                            <th class="text-center">رقم ملف الاسرة</th>
                            <th class="text-center">رقم السجل المدنى </th>
                            <th class="text-center">الأسرة </th>
                            <th class="text-center">عدد الأفراد </th>
                            <th class="text-center">أرملة </th>
                            <th class="text-center">يتيم </th>
                            <th class="text-center">مستفيد </th>
                            <th class="text-center">إجمالى </th>
                            <th class="text-center">الإجراء </th>
                        </tr>
                        </thead>
                        <tbody class="text-center" id="tbody_update">
                        <?php  $x=1; foreach ($sarf_details as $row){?>
                            <tr>
                                <td><?=$x++;?></td>
                                <td><?=$row->file_num?></td>
                                <td><?=$row->mother_national_num_fk?></td>
                                <td><?=$row->mother_name?></td>
                                <td><?=$row->all_num?></td>
                                <td><?=$row->mother_num?></td>
                                <td><?=$row->young_num?></td>
                                <td><?=$row->adult_num?></td>
                                <td><?=$row->value?></td>
                                <td> <a onclick="delete_row(this,'<?=$row->id?>');">
                                        <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php  }?>
                        </tbody>
                    </table>
                </div>
                <?php } ?>
            </div>
            <!---------------------------------------->
            <div class="col-xs-12 text-center" style="margin-bottom: 10px;">
                <button  type="submit" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"  class="btn btn-success  btn-labeled" id="submit_but" disabled="">
                    <span class="btn-label"><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title']?></button>
              
            </div>
            <!---------------------------------------->
            <?php  echo form_close()?>
            <?php  if(isset($all_data) && !empty($all_data)){ ?>
                <?php $type_family=array("1"=>"أسرة","2"=>"بعض الأسر","3"=>"كل الأسر");?>
                <?php $type_sarf=array("1"=>"مقطوع لأسرة","2"=>"مقطوع لفرد ","3"=>"مخصص لكل فرد");?>
                <table id="example" class=" display table table-bordered  table-striped responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="greentd">
                        <th class="text-center">م</th>
                      <!--  <th class="text-center">رقم الصرف</th> -->
                        <th class="text-center">اسم بند المساعدة </th>
                          <th class="text-center">عبارة عن  </th>
                        <th class="text-center">تاريخ الإضافة </th>

                       <!-- <th class="text-center">طريقة الصرف </th>


                        <th class="text-center">خلال شهر</th>-->
                        <th class="text-center">اجمالي المبلغ</th>
                      <!--  <th class="text-center">التفاصيل </th> -->


                     <!--   <th class="text-center">المرفقات </th> -->
                        <th class="text-center">الاجراء</th>


                        <!-- <th class="text-center">حالة الصرف </th>
                        -->
                    </tr>
                    </thead>
                    <tbody>
                <?php $x=1; foreach($all_data as $record){ ?>
                <tr class="">
                <td><?php echo $x++ ?></td>
                <td><?php echo $record->band_name; ?></td>
                <td><?php echo $record->about; ?></td>
                <td><?php echo $record->sarf_date_ar; ?></td>
                
                <td><?php echo $record->total_value; ?></td>
                
                <td>
<a data-toggle="modal" data-target="#modal-sm-data" onclick="get_details('<?=$record->sarf_num?>');"
class="btn btn-xs btn-primary" title="التفاصيل" style="padding: 1px 6px;"> <i class="fa fa-list"></i>  </a>
                 


<!--
<button data-toggle="modal" data-target="#modal-manager<?=$record->sarf_num?>" onclick="get_details('<?=$record->sarf_num?>');"
        class="btn btn-xs btn-add">
  توجيه المدير العام                                 </button>
  -->
<!--
<a target="_blank" href="<?=base_url()."family_controllers/FamilyCashing/PrintSarfType/".$record->sarf_num."/".$record->method_type?>" > <li class="fa fa-print"></li></a>
-->


   

<a  href="<?=base_url()."family_controllers/FamilyCashing/UpdateFamilyCashing/".$record->sarf_num?>">
<i class="fa fa-pencil " aria-hidden="true"></i> </a>

<!--
<a target="_blank" href="<?=base_url()."family_controllers/FamilyCashing/PrintSarfType/".$record->sarf_num."/".$record->method_type?>" >
<i class="fa fa-print" aria-hidden="true"></i></a>
-->
<a title="طباعة الطلب " target="_blank" href="<?=base_url()."family_controllers/FamilyCashing/PrintSarfLetter/".$record->sarf_num?>" >
<i class="fa fa-print" aria-hidden="true"></i></a>

<a href="<?=base_url()."family_controllers/FamilyCashing/DeleteFamilyCashing/".$record->sarf_num?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
<i class="fa fa-trash" aria-hidden="true"></i></a>
<a title="عرض المرفق"  href="#" data-toggle="modal" data-target="#myModal_attach2<?php echo$record->sarf_num;?>"  > <i class="fa fa-cloud-upload" aria-hidden="true"></i> </a>


<?php echo form_open_multipart("family_controllers/FamilyCashing/UpdateFamilyCashing_file/".$record->sarf_num); ?>
<div class="modal fade" id="myModal_attach2<?php echo$record->sarf_num;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <table   class="table table-striped table-bordered fixed-table mytable "
                       >
                        <thead>
                        <tr class="info">
                            <th   > إسم المرفق</th>
                            <th  >المرفق</th>
                        </tr>
                        </thead>
                        <tbody class="attachTable">
                       
                        <?php if(empty($record->file)){ ?>
                            
                                <tr >
                               
                                    <td><input type="input"  data-validation="required" name="file_title"  id="file_title"  class="form-control  " ></td>
                                    <td><input type="file"   data-validation="required" name="file"  id="file"  class="form-control  " ></td>
                                </tr>
                                <?php   }else{  ?>
                                    <tr >
                                    <td><?=$record->file_title; ?></td>
                                    <td>
                                    <?php
                                  $type = pathinfo($record->file)['extension'];
                                  $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                  $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                  if (in_array($type, $arry_images)) {
                                  $type_doc=1;
                                  } elseif (in_array(strtoupper($type), $arr_doc)) {
                                  $type_doc=2;
                                  }
                                 
                                 
                                     ?>
                                    
<?php if($type_doc == 1){ ?>
 <a data-toggle="modal" data-target="#myModal-view_photo-<?= $record->sarf_num ?>">
<i class="fa fa-eye" title=" قراءة"></i> </a>   
<?php }elseif($type_doc == 2){ ?>
    <a target="_blank" href="<?=base_url()."family_controllers/LagnaSetting/my_read_file_sarf/".$record->file?>">
<i class="fa fa-eye" title=" قراءة"></i> </a>
<?php  }else{
    
}  ?>





  
    
                                    </td>
                                </tr>
                                <?php }?>
                           
                      
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
            <?php if(empty($record->file)){ ?>
            <button type="submit" class="btn btn-success" style="display: inline-block;padding: 6px 12px;" 
                        id="UPDATE_file" name="UPDATE_file"  value="UPDATE_file" >حفظ</button>
            <?php }?>

                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق</button>
                       

            </div>
        </div>
    </div>
</div>
</form>

<div class="modal fade" id="myModal-view_photo-<?= $record->sarf_num ?>" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">الصوره</h4>
                </div>
                <div class="modal-body">
               
               
                <img src="<?= base_url().'uploads/family_sarf' .'/'. $record->file?>"
                                  alt="">
               
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>



<?php 
if($record->transfer_to_lagna == 1){ ?>
   
   <span style="font-size: 12px !important;" class="label label-success">   تم التحويل إلي اللجنة </span>

   
<?php }else{?>
    <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-sm-5<?= $record->id?>">
            تحويل إلي اللجنة
        </button>

<?php } ?>




<?php 
if($record->send_amr_sarf == 1){ ?>
   
   <span style="font-size: 12px !important;" class="label label-success">   تم إرسال أمر الصرف </span>

   
<?php }else{?>
<button data-toggle="modal" data-target="#modal-manager" onclick="send_value('<?=$record->sarf_num?>');"
        class="btn btn-xs btn-warning">
    إرسال لإعداد أمر الصرف
    </button>

<?php } ?>






</td>


                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            <?php } ?>
            <!-------------------------------------------------------------------------------------->
        </div>
    </div>
</div>
<!----------------------------------------------------------------->

<?php
if(!empty($all_data)&&isset($all_data)){
foreach($all_data as $record){ ?>

<div class="modal fade " id="modal-manager<?php echo $record->sarf_num;?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-success modal-sm " role="document" style="width:30%;">
        <div class="modal-content ">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">توجيه المدير العام</h3>
            </div>
            <div class="modal-body ">
                <?php echo form_open_multipart("family_controllers/FamilyCashing/manager_check/".$record->sarf_num);?>

                <input type="radio" id=""
                       name="manger_check_name" <?php if($record->manger_check_name==1) {  echo 'checked';} ?> value="1">لامانع</br>
                <input type="radio" id=""
                       name="manger_check_name" <?php if($record->manger_check_name==2) {  echo 'checked';} ?> value="2">
                <input type="text" name="manager_text" class="form-controls"
                 placeholder="اكتب هنا" value="<?php if($record->manger_check_name!=2 ||$record->manger_check_name!=1)
                                      { echo $record->manger_check_name ;} ?>">

                <div class=" col-md-12">
                    <label class="">اذكر السبب</label>

                    <textarea  name="manager_reason" class="form-control"> <?php echo $record->manager_reason;?></textarea>

                </div>
            </div>
            <div class="modal-footer " style="display: inline-block; width: 100%;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-success pull-lift" data-dismiss="">حفظ</button>
                <?php echo form_close();?>
            </div>
        </div>

    </div>

</div>
<?php } } ?>

<!---------------------------------------------->



<?php  if(isset($all_data) && !empty($all_data)){ ?>
         <div class="modal fade " id="modal-sm-data" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-success modal-lg " role="document" style="width:95%;">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.9;">
                             <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">تفاصيل المحور </h3>
                    </div>
                    <div class="modal-body ">
                     <div id="option_details">

                     </div>
                    </div>
                    <div class="modal-footer " style="display: inline-block; width: 100%;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>

            </div>

        </div>
         <div class="modal fade " id="modal-attach-data" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-success modal-lg " role="document" >
            <div class="modal-content ">
                <div class="modal-header ">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>-->
                    <h1 class="modal-title">المرفقات </h1>
                </div>
                <div class="modal-body ">
                    <div id="option_attach">

                    </div>
                </div>
                <div class="modal-footer " style="display: inline-block; width: 100%;">

                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
         <?php foreach ($all_data as $record){ ?>
         <div class="modal fade " id="modal-sm-data-<?=$record->sarf_num?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-success modal-lg " role="document">
                <div class="modal-content ">
                    <div class="modal-header ">

                        <h1 class="modal-title">رقم المحضر </h1>
                    </div>
                    <div class="modal-body ">

                   <!--
                    <?php echo form_open_multipart("family_controllers/FamilyCashing/UpdatePresence/".$record->sarf_num);?>
                       <div class="form-group col-sm-6 ">
                            <div class="form-group col-sm-12 pdd">
                                <div class="form-group col-sm-6 pdd">
                                    <label class="label label-green half">رقم المحضر </label>
                                    <input type="text" value="<?=$record->presence_number?>" name="presence_number"  class="form-control " placeholder="رقم الجلسة" data-validation="required"/>
                                </div>
                                <div class="form-group col-sm-6 pdd">
                                    <label class="label label-green half">عام</label>
                                    <input type="text" name="presence_year" value="<?=$record->presence_year?>" class="form-control " placeholder="عام" data-validation="required"/>
                                </div>
                            </div>
                        </div>
                        -->


                    <?php echo form_open_multipart("family_controllers/FamilyCashing/UpdatePresence/".$record->sarf_num);?>
                       <div class="form-group col-sm-6 ">
                            <div class="form-group col-sm-12 pdd">
                                <div class="form-group col-sm-6 pdd">
                                    <label class="label label-green half">رقم المحضر </label>
                                    <input type="text" id="presence_number<?=$record->sarf_num?>" value="<?=$record->presence_number?>" name="presence_number"  class="form-control " placeholder="رقم الجلسة" data-validation="required"/>
                                </div>
                                <div class="form-group col-sm-6 pdd">
                                    <label class="label label-green half">عام</label>
                                    <input type="text"  name="presence_year" id="presence_year<?=$record->sarf_num?>" value="<?=$record->presence_year?>" class="form-control " placeholder="عام" data-validation="required"/>
                                </div>
                            </div>
                        </div>
                        <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                 <tr class="info">
                                    <th class="">#</th>
                                    <th class="">رقم الجلسة</th>
                                    <th class="">حالة الجلسة	 </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($minutesNumbers)&& !empty($minutesNumbers)){
                            foreach ($minutesNumbers as $numbers){
                                $suspend = "غير نشط ";
                                $btn = 'label label-danger';
                                if($numbers->suspend == 1){
                                    $suspend = "نشط";
                                    $btn = 'label label-success';
                                }
                                ?>
                                <tr>
                                    <td>
                                        <input class=" " <?php if($numbers->session_number ==$record->presence_number) {echo "checked";} ?>  onchange="get_session_number_data($(this).val(),<?=$numbers->year?>,<?=$record->sarf_num?>)" type="radio" name="exampleRadios" id="exampleRadios<?=$numbers->session_number?>" value="<?=$numbers->session_number?>" >
                                    </td>
                                    <td>
                                        <label class="form-check-label" for="exampleRadios<?=$numbers->session_number?>">
                                           <?=$numbers->year?>/<?=$numbers->session_number?>
                                        </label>
                                    </td>
                                    <td>
                                        <?php if($numbers->finished == 1){?>
                                            <label class="label label-danger"> تم إنهاء الجلسة </label>
                                        <?php  }else{?>
                                            <label   class="<?=$btn?>"><?=$suspend?></label>
                                        <?php  }?>
                                    </td>
                                </tr>
                            <?php } } ?>
                            </tbody>
                            </table>



                    </div>

                    <div class="modal-footer " style="display: inline-block; width: 100%;">
                        <button type="submit" name="ADD" value="ADD" class="btn btn-success" >حفظ </button>
                     <?php  echo form_close()?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>

                    </div>
                </div>

            </div>

        </div>
        <?php } ?>








<?php } ?>
<!--------------------------------------------------------------------------->
<!-- التحويل اللي اللجنة-->
<?php  if(isset($all_data) && !empty($all_data)){ ?>
    <?php  $x=1; foreach ($all_data as $row_sarf){?>
        <div class="modal fade" id="modal-sm-5<?=$row_sarf->id?>" tabindex="-1" role="dialog">


            <div class="modal-dialog modal-success " role="document" style="width: 50%; top: 93px !important;">
                <div class="modal-content ">
                    <!--------------------------------------->
                    <?php echo form_open_multipart('TransformationProcess/TransformationOfDetailsSarf/5/'.$row_sarf->id.'/'.$row_sarf->sarf_num.'/'.$row_sarf->bnod_help_fk); ?>
                    <div style="background-color: #4e4e4e !important; " class="modal-header ">
                <h6 class="modal-title">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
               تحويل إلي اللجنة  </h6>
            </div>
                    <div class="modal-body ">
                        <div class="col-sm-3 padding-4">
                            <label class="label "> الى اللجنة </label>
                            <select class="form-control  " name="add_to_lagna_id_fk">
                                <!--  <option>اختر</option> -->
                                <?php if (isset($all_lagna_to) && $all_lagna_to != null && !empty($all_lagna_to)):
                                    foreach ($all_lagna_to as $one_lagna): ?>
                                        <option
                                            value="<?php echo $one_lagna->id_lagna; ?>"><?php echo $one_lagna->lagna_name; ?></option>
                                    <?php endforeach; endif; ?>
                            </select>
                        </div>
                        <div class="col-sm-3 padding-4">
                            <label class="label "> طبيعة التحويل </label>
                            <select class="form-control " name="transfer_type_id_fk" id="transfer_type_id_fk" data-validation="required"
                                    aria-required="true" onchange="GetTransferType($(this).val(),<?=$row_sarf->id?>)">
                                <option value="">اختر</option>
                                <?php $transfer_type_arr =array(1=>'الأسر',2=>'الأفراد');
                                for($a=1;$a<=sizeof($transfer_type_arr);$a++){?>
                                    <option value="<?=$a?>"><?=$transfer_type_arr[$a]?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-6  padding-4">
                            <label class="label "> التوصية </label>
                            <select class="form-control half " name="procedure_id_fk"  id="procedure_id_fk<?=$row_sarf->id?>" data-validation="required"
                                    aria-required="true">
                                <option value="">اختر</option>
                            </select>
                        </div>
                        <div class="col-sm-12" id="option_transfer_type"></div>
                    </div>
                    <br> <br> <br> <br>
                    <div class="modal-footer " style="display: inline-block; width: 100%;">
                        
                        <button type="submit" name="operation" value="operation" 
                        style="background-color:#3c990b !important; "
                                class="btn ">
                                  <i class="fa fa-send-o"></i>
                                تحويل إلي اللجنة</button>
                                
                                
                                <a type="button" class="btn btn-danger" data-dismiss="modal" href="#lost">
                        <i class="fa fa-times" aria-hidden="true"></i>
                        ليس الأن 
                        </a>
                    </div>
                    <?php echo form_close() ?>
                    <!--------------------------------------->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php  }?>
<?php } ?>


<!-------------------------------osama----------------------->


<div class="modal fade " id="modal-manager" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-success modal-sm " role="document" style="width:45%; top: 93px !important;">
        <div class="modal-content ">
            <div style="background-color: #4e4e4e !important; " class="modal-header ">
                <h6 class="modal-title">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                إرسال أمر الصرف إلي المساعدات </h6>
            </div>
            <div class="modal-body">
               <!-- <div class="alert alert-dangerس">هل انت متأكد من إرسال الصرف للمساعدات ؟ </div>-->
               <div style="color: black !important;
    background-color: #ffffff !important;
    border-color: #868686 !important;"  class="alert alert-success_">
        <strong style="color: red;">الرجاء الإنتباه!</strong> هل أنت متأكد من <strong style="color: red;">إرسال</strong> 
        أمر الصرف إلي المساعدات ؟
                </div>
            </div>
            <div class="modal-footer " style="display: inline-block; width: 100%;">
               
                <a href="" id="ref"><button type="button" class="btn btn-success pull-lift" data-dismiss="">
                <i class="fa fa-send-o"></i>
                إرسال أمر الصرف </button>
                </a>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">
                <i class="fa fa-times" aria-hidden="true"></i>
                ليس الأن </button>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
<!--
<div class="modal fade " id="modal-manager" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-success modal-sm " role="document" style="width:30%;">
        <div class="modal-content ">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">ارسال الصرف </h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">هل انت متأكد من إرسال الصرف للمساعدات ؟ </div>
            </div>
            <div class="modal-footer " style="display: inline-block; width: 100%;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                <a href="" id="ref"><button type="button" class="btn btn-success pull-lift" data-dismiss="">ارسال</button>
                </a>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
-->

<script>

    function send_value(valu)
    {
        var link='<?= base_url()?>FamilyCashing/add_new_sarf/'+valu;
        $('#ref').attr('href', link);
    }



</script>



<script>

    function GetTransferType(valu,id) {

        //procedure_id_fk
        var data = "type=" + valu;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family_details/GetProcedure',
            data:data,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
                console.log(JSONObject);
                var  html='<option>إختر </option>';
                for(i=0; i<JSONObject.length ; i++){
                    html +='<option value=" ' + JSONObject[i].id + '-' + JSONObject[i].title + '"> ' + JSONObject[i].title + '</option>';
                }
                $("#procedure_id_fk"+id).html(html);

            }
        });

        if (valu == 2) {
            var dataString = "mother_num="+mother_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_details/GetTransferType',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#option_transfer_type").html(html);
                }
            });
        }
    }
</script>

<!----------------------------------------------------------------------------->
<script>
    function get_session_number_data(session_number , year,id) {
        $('#presence_number'+id).val(session_number);
        $('#presence_year'+id).val(year);
    }
</script>
<!---------------------------------------------------------->
<script>
    function get_details(sarf_num_fk){



        var dataString =  "sarf_num_fk=" +sarf_num_fk;
         $("#option_details").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/FamilyCashing/LoadPage',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#option_details").html(html);
            }
        });
    }
    //---------------------------------------------------
    function get_attach(sarf_num_fk) {
        var dataString =  "sarf_num_fk_attach=" +sarf_num_fk;
        $("#option_details").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/FamilyCashing/LoadPage',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#option_attach").html(html);
            }
        });
    }
</script>

<script>
    function get_data() {
        var sarf_type = 0;
        var member_type = 0;
        var len2= $('.info2').length;




        //----------------------------------------------- 1500
        var cbs = document.getElementsByClassName("sarf_types");
        for (var i = 0; i < cbs.length; i++) {
            if (cbs[i].type == 'radio') {
                if (cbs[i].checked == true) {
                    sarf_type = cbs[i].value;
                }
            }// end if check
        } // end for
        //-----------------------------------------------
        var cbs_member = document.getElementsByClassName("member_types");
        for (var i = 0; i < cbs_member.length; i++) {
            if (cbs_member[i].type == 'radio') {
                if (cbs_member[i].checked == true) {
                    member_type = cbs_member[i].value;
                }
            }// end if check
        } // end for
        //-----------------------------------------------
        var mother_id = $('#mother_id').val();
        var count_family = $('#count_family').val();
        var method_type = $('#method_type').val();
        var about = $('#about').val();
        var basicdataString = 'sarf_type=' + sarf_type + "&member_type=" + member_type + "&method_type=" + method_type +
            "&mother_id=" + mother_id + "&count_family=" + count_family + "&about=" + about;
        if (method_type != "" && method_type !="0" && about !="" && about !="0"){
        if (sarf_type == 1) {
            var due_to_family = $('#due_to_family').val();
            if (due_to_family != "" && member_type != 0) {
                var dataString = basicdataString + "&due_to_family=" + due_to_family+"&len=" + len2;
                if (count_family == 1) {
                    send_ajax_data(dataString);
                } else {
                    send_ajax_table(dataString);
                }
            }
        } else if (sarf_type == 2) {
            var due_to_member = $('#due_to_member').val();
            if (due_to_member != "" && member_type != 0) {

                var dataString = basicdataString + "&due_to_member=" + due_to_member+"&len=" + len2;
                if (count_family == 1) {
                    send_ajax_data(dataString);
                } else {
                    send_ajax_table(dataString);
                }
            }
        } else if (sarf_type == 3) {
            var due_to_widow = $('#due_to_widow').val();
            var due_to_orphan = $('#due_to_orphan').val();
            var due_to_beneficiary = $('#due_to_beneficiary').val();
            if (due_to_widow != "" && member_type != 0 && due_to_orphan != "" && due_to_beneficiary != "") {

                var dataString = basicdataString + "&due_to_widow=" + due_to_widow + "&due_to_beneficiary=" + due_to_beneficiary + "&due_to_orphan=" + due_to_orphan + "&len=" + len2;
                if (count_family == 1) {
                    send_ajax_data(dataString);
                } else {
                    send_ajax_table(dataString);
                }
            }
        } else if (sarf_type == 4) {
            var dataString_add = $(".class_according_to").serialize();
            if (member_type != 0) {
                var dataString = basicdataString + "&" + dataString_add +"&len=" + len2;
                if (count_family == 1) {
                    send_ajax_data(dataString);
                } else {
                    send_ajax_table(dataString);
                }
            }
        } else {
            $("#option_table").html("");
        }

        }else{
          alert("تأكد من إدخال جميع البيانات ");
         }
    }
    //========================================
    function send_ajax_data(dataString) {
        // alert(dataString);
        $("#option_table").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/FamilyCashing/LoadPage',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){

                $("#option_table").html(html);
                $('#submit_but').removeAttr("disabled"); //submit_but
                all_calcolator();
                //  alert(html);
            }
        });
        return false;
    }
    //========================================
    function send_ajax_table(dataString) {
        // alert(dataString);
       //  $("#option_table").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/FamilyCashing/LoadPage',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#id_example").append(html);
                all_calcolator();
                //  alert(html);
            }
        });
        return false;
    }
</script>
<script>
    function get_sarf_types() {
        var sarf_type=0;
        var member_type=0;
        //-----------------------------------------------
        var cbs = document.getElementsByClassName("sarf_types");
        for(var i=0; i < cbs.length; i++) {
            if(cbs[i].type == 'radio') {
                if(cbs[i].checked == true){
                    sarf_type =cbs[i].value;
                }
            }// end if check
        } // end for
        //-----------------------------------------------
        var cbs_member = document.getElementsByClassName("member_types");
        for(var i=0; i < cbs_member.length; i++) {
            if(cbs_member[i].type == 'radio') {
                if(cbs_member[i].checked == true){
                    member_type =cbs_member[i].value;
                }
            }// end if check
        } // end for
        //-----------------------------------------------
        if(sarf_type != 0 && member_type != 0  ) {
            var dataString = 'sarf_type=' + sarf_type + "&member_type="+member_type;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/FamilyCashing/AccordingTo',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#option").html(html);
                    $("#option_table").html("");
                    $("#count_family").val("1");
                    $('#submit_but').attr("disabled","disabled"); //submit_but
                }
            });
            return false;
        }else{
            $("#option_table").html(""); //option_table
        }
    }
</script>
<script>
    function get_method_type(method_type){
/*        if (method_type == 1 || method_type == 2 || method_type == 4) {
            document.getElementById("bank_id_fk").removeAttribute ("disabled");
            document.getElementById("bank_id_fk").setAttribute("data-validation", "required");
            document.getElementById("bank_account_num").readOnly = false;
            document.getElementById("bank_account_num").setAttribute("data-validation", "required");
        }else if(method_type == 3) {
            document.getElementById("bank_id_fk").setAttribute ("disabled", "disabled");
            document.getElementById("bank_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("bank_account_num").readOnly = true;
            document.getElementById("bank_account_num").removeAttribute("data-validation", "required");
        } else {
            document.getElementById("bank_id_fk").setAttribute ("disabled", "disabled");
            document.getElementById("bank_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("bank_account_num").readOnly = true;
            document.getElementById("bank_account_num").removeAttribute("data-validation", "required");
        }*/
    }
</script>
<script>
    function check_length_account_num() {
        if($("#bank_account_num").val().length != 24   ){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'رقم الحساب مكون من 24 رقم';
            $('button[type="submit"]').attr("disabled","disabled");
        }else{
            document.getElementById('validate_length').innerHTML = '';
            $('button[type="submit"]').removeAttr("disabled"); //submit_but
        }
    }
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
    function all_calcolator() {
        var total_family_nums =one_clacolate("c_all_num");
        var total_mother=one_clacolate("c_mother_num");
        var total_young=one_clacolate("c_young_num");
        var total_adult=one_clacolate("c_adult_num");
        var total_sarf=one_clacolate("c_value");
        $("#total_family_nums").text(total_family_nums);
        $("#total_mother").text(total_mother);
        $("#total_young").text(total_young);
        $("#total_adult").text(total_adult);
        $("#total_sarf").val(total_sarf);
        $("#total_sarf_td").text(total_sarf);

    }
    function one_clacolate(name_class) {
        //-----------------------------------------------
        var cbs = document.getElementsByClassName(name_class);
        var t_value =0 ;
        for(var i=0; i < cbs.length; i++) {
            t_value += parseFloat (cbs[i].value) ;
        } // end for
        //-----------------------------------------------
        return t_value;
    }
</script>
<script>
    function delete_row(this_part,this_part_id) {
        $(this_part).parents('tr').remove();
        //---------------------------------------------------
        var dataString = "id_details="+this_part_id;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/FamilyCashing/DeleteCashingDetials',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#result").html(html);
            }
        });
        return false;
    }
    function delete_row_only(this_part) {
        $(this_part).parents('tr').remove();
    }
</script>
<script>
    function update_date(type_sarf) {
        var dataString="";
         if(type_sarf == 1){
            dataString = "update_national_num="+$("#update_national_num").val()+
                              "&type_sarf="+type_sarf+
                              "&update_family_value="+$("#update_family_value").val();
        }
        if(type_sarf == 2){
           dataString = "update_national_num="+$("#update_national_num").val()+
                             "&type_sarf="+type_sarf+
                             "&update_person_value="+$("#update_person_value").val();
        }
        if(type_sarf == 3){
            dataString = "update_national_num="+$("#update_national_num").val()+
                          "&type_sarf="+type_sarf+
                          "&update_mother_value="+$("#update_mother_value").val()+
                          "&update_young_value="+$("#update_young_value").val()+
                          "&update_adult_value="+$("#update_adult_value").val();
        }

        if($("#update_national_num").val() !=""){
            //-----------------------------
          $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/FamilyCashing/LoadPage',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                    $("#tbody_update").append(html);
            }
          });
        //-----------------------------
        }
    }
</script>
<script>
    function check_faminly(file_num){
        dataString = "file_num_check="+file_num;
        if(file_num !=0){
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/FamilyCashing/LoadPage',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    if (html == "not_found") {
                        $("#span_file").html("رقم الملف غير مسجل");
                        $("#searcher_but").attr("disabled","disabled");
                    } else if (html == 4 ) {
                        $("#span_file").html("");
                        $("#searcher_but").removeAttr("disabled");
                        get_value();
                    }else  {
                        $("#span_file").html("الملف غير معتمد ");
                        $("#searcher_but").attr("disabled","disabled");
                    }

                }
            });
            return false;
        }
    }
</script>
<script>

    function set_member_type(this_value) {
        var cbs_member = document.getElementsByClassName("member_types");
       if(this_value == 2){
            //-----------------------------------------------
            for(var i=0; i < cbs_member.length; i++) {
                if(cbs_member[i].value == 1) {
                    cbs_member[i].checked = true;
                }else{
                    cbs_member[i].disabled = true;
                }
            } // end for
            //-----------------------------------------------
        }else {
           //-----------------------------------------------
           for(var i=0; i < cbs_member.length; i++) {
                   cbs_member[i].checked = false;
                   cbs_member[i].disabled = false;
           } // end for
           //-----------------------------------------------
       }
    }

</script>
<script>
    function get_according_to(this_value) {
        if(this_value != 0 && this_value != 0  ) {
            var dataString = 'according_to=' + this_value;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/FamilyCashing/AccordingTo',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#option_according_to").html(html);
                }
            });
            return false;
        }else{
            $("#option_according_to").html(""); //option_table
        }
    }
</script>
<script>
    function get_other_person(this_value) {
        if(this_value == "0" && this_value != ""){
            $("#other_person").attr('readonly', false); ;
        }else {
            $("#other_person").attr('readonly', true);;
            $("#other_person").val("") ;
        }
    }
    //====================================
    function pass_person_name(this_text) {
        $("#td_person_name").text(this_text);
    }
   //====================================
</script>
<script>
    function get_value() {

        var mother_id = $('#mother_id').val();
        var valu = $("input[name='radio_but']:checked").val();

        if (mother_id != '') {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/FamilyCashing/get_val",
                data: {mother_id: mother_id, valu: valu},
                success: function (d) {

                    var obj = JSON.parse(d);


                    $('#money_according_to').val(obj.value);
                    $('#view_according_to').show();
                    $('#house_rent').text(obj.house_rent);
                    $('#setting_rent').text(obj.main_val);


                }

            });
        }
    }
   /* function get_value()
    {

       var mother_id=$('#mother_id').val();
        var valu = $("input[name='radio_but']:checked").val();

       if(mother_id!='') {
           $.ajax({
               type: 'post',
               url: "<?php echo base_url();?>family_controllers/FamilyCashing/get_val",
               data: {mother_id: mother_id, valu: valu},
               success: function (d) {
                   if (valu == 1) {
                       $('#money_according_to').val(d);
                   } else {
                       $('#money_according_to').val(d);
                   }

               }

           });
       }
    }*/
</script>
<script>
function del_row(valu)
{
$('.tr'+valu).remove();

all_calcolator();

}

</script>