

<style type="text/css">
  .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text {
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1 {
        background-color: #eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text {
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric {
        color: red;
        font-size: 25px;
        position: absolute;
    }
    .help-block.form-error {
        color: #a94442 !important;
        font-size: 11px !important;
        position: absolute !important;
        bottom: -23px !important;
        right: 50% !important;
    }

    /**************************/
    /* 27-1-2019 */
    /**************************/
    /* 27-1-2019 */
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
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
    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }
    .form-group {
        margin-bottom: 0px;
    }
    .bootstrap-select>.btn {
        width: 100%;
        padding-right: 5px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important; 
        left: 4px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }
    .form-control{
        font-size: 15px;
        color: #000;
        border-radius: 4px;
        border: 2px solid #b6d089 !important;
    }
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    .has-success .form-control {
        border: 2px solid #b6d089;

        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    }
    .has-success  .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    .nav-tabs>li>a {
        color: #222;
        font-weight: 500;
        background-color: #e6e6e6;
        font-size: 15px;
    }
    .tab-content {
        margin-top: 15px;
    }
    .label_title_2{
            color: #002542;
    }




</style>

<?php
if(isset($result)&&!empty($result))
{

    $k_num=$result->k_num;
    $right_time_from=$result->right_time_from;
    $right_time_to=$result->right_time_to;
    $person_img=$result->person_img;
    $k_addres=$result->k_addres;
    $k_name=$result->k_name;
    $k_gender_fk=$result->k_gender_fk;
    $fe2a_type= $result->fe2a_type;
    // $fe2a_type2= $result->fe2a_type2;
    $k_nationality_fk= $result->k_nationality_fk;
    $k_national_type= $result->k_national_type;
    $k_national_num= $result->k_national_num;
    $k_national_place= $result->k_national_place;
    $k_city= $result->k_city;
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
    $k_status=$result->kafel_status;

    $k_notes  =$result->k_notes ;
    $k_message_method  =$result->k_message_method ;
    $k_message_mob  =$result->k_message_mob  ;
    $social_status_id_fk =$result->social_status_id_fk ;
    $reasons_stop_id_fk = $result->reasons_stop_id_fk ;
    $halat_kafel_id = $result->halat_kafel_id ;
    $w_name =  $result->w_name;
    $w_national_num = $result->w_national_num;
    $w_mob =  $result->w_mob;
    $k_hai = $result->k_hai;
    $wakala_type = $result->wakala_type;
    $wakel_relationship = $result->wakel_relationship;
    $work_id_fk = $result->work_id_fk;
    $company_fax = $result->company_fax;
    $company_phone= $result->company_phone;
    $company_gawal= $result->company_gawal;

    $out['form']='Web/add_kafel/'.$this->uri->segment(5);
}else{

    $k_num="";
    $right_time_from ="";
    $right_time_to ="";
    $person_img="";
    $k_addres="";
    $k_name="";
    $k_gender_fk="";
    $fe2a_type="";
    // $fe2a_type2= "";
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
    $k_notes  ="";
    $k_message_method ="";
    $k_message_mob ="";
    $social_status_id_fk = '';
    $reasons_stop_id_fk = '';
    $halat_kafel_id = '';
    $w_name = '';
    $w_national_num = '';
    $w_mob =  '';
    $k_hai = '';
    $wakel_relationship ='';
    $wakala_type ='';
    $work_id_fk = '';
    $company_fax = '';
    $company_phone= '';
    $company_gawal= '';

    $out['form']='Web/add_kafel';


}

if($fe2a_type ==1 ||  $fe2a_type == 3 || $fe2a_type == '' )
{
    $title="اسم الوكيل";
    $desc="الصلة";
    $num="رقم هويه الوكيل";
    $gawal="جوال الوكيل";

}else{
    $title="اسم المسئول";
    $desc="الصفة";
    $num="رقم هويه المسئول";
    $gawal="جوال المسئول";
}
?>


<?php
if($fe2a_type=="")
{?>

    <style>
        .company {
            display: block ;
        }
        .member {
            display: none ;
        }
    </style>
<?php }elseif($fe2a_type ==1 ||  $fe2a_type == 3){?>

    <style>
        .company {
            display: block ;
        }
        .member {
            display: none ;
        }
    </style>

<?php }  elseif($fe2a_type==4 || $fe2a_type==5 || $fe2a_type==6|| $fe2a_type==7){?>

    <style>
        .company {
            display: none ;
        }
        .member {
            display: block ;
        }
    </style>

<?php } ?>


<div class="container">
<div class="well">

    <?php

                        if(($this->session->flashdata('success'))) {
                            ?>
                            <div class="col-md-12 alert alert-success alert-dismissable"> نجاح !...تمت اضافة البيانات بنجاح </div>

                            <?php
                        }
                        ?>
<div class="col-xs-12 no-padding">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading" style="background-color: #96c73e;">
                <h3 class="panel-title" style="font-size: 18px;"> تسجيل طلب كفالة </h3>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                <div class="col-lg-1 col-md-2 col-sm-6 padding-4">
                  
                        <h6 class=" label_title_2">رقم الطلب</h6>
                    
                        <input type="text" name="k_num" id="k_num"
                            <?php
                            if(!empty($k_num)){?>
                                value="<?=$k_num?>" readonly
                            <?php }else{
                                if(empty($last_id)){ ?>
                                    data-validation="!!required"
                                <?php }elseif($last_id !='' && $last_id>0){?>
                                    value="<?=$last_id?>" readonly
                                <?php } }?>
                               value="<?php echo $k_num;?>"
                               class="form-control input_style_2"
                               data-validation-has-keyup-event="true">
                 
                </div>





                <div class="col-md-2 col-sm-6 padding-4">
                    
                        <h6 class=" label_title_2">فئة الكافل</h6>
                  
                        <select id="fe2a_type" data-validation="required" class="form-control input_style_2"
                                name="fe2a_type" onchange="GetF2a(this)" >

                            <?php

                            if(!empty($f2a) && isset($f2a)){
                                foreach($f2a as $value){
                                    ?>
                                    <option value="<?php echo $value->id;?>" data-specialize="<?php echo $value->specialize_fk;?>"
                                        <?php
                                        if(!empty($fe2a_type)){
                                            if($value->id ==$fe2a_type){
                                                echo 'selected'; }}  ?>> <?php echo $value->title;?></option >
                                    <?php
                                }}
                            ?>
                        </select>
                   
                </div>


                <div class="col-md-3 col-sm-6 padding-4">
                    
                        <h6 class=" label_title_2 kafel">اسم الكافل </h6>
                    
                        <input type="text" name="k_name" id="k_name" value="<?php echo $k_name;?>"
                               class="form-control input_style_2"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                   
                </div>

                <div class="col-md-2 col-sm-6 padding-4 company"  style="display:block;">
                    
                        <h6 class=" label_title_2">الجنس </h6>
                   
                        <select name="k_gender_fk" id="k_gender_fk" data-validation="required"
                                class="form-control input_style_2" aria-!!required="true">
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

                <div class="col-md-2 col-sm-6 padding-4  company"  style="display:block;">
                    
                        <h6 class=" label_title_2">الجنسيه</h6>
                  
                        <select id="k_nationality_fk" data-validation="required" class="form-control input_style_2"
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



                <div class="col-md-2 col-sm-6 padding-4  company"  style="display:block;">
                    
                        <h6 class=" label_title_2">الحالة الاجتماعية </h6>
                  
                        <select id="social_status_id_fk"  class="form-control input_style_2" onchange="change_status($(this).val())"
                                aria-!!required="true" name="social_status_id_fk">
                            <option value="">إختر</option>
                            <option value="0">(متوفي)</option>
                            <?php
                            if(isset($social_status)&&!empty($social_status)) {
                                foreach($social_status as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"

                                        <?php if(!empty($social_status_id_fk)){
                                            if($row->id_setting==$social_status_id_fk){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    
                </div>

                <div class="col-md-2 col-sm-6 padding-4 company"  style="display:block;">
                   
                        <h6 class=" label_title_2">نوع الهوية </h6>
                    
                        <select id="k_national_type"  class="form-control input_style_2"
                                 name="k_national_type">
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
                <div class="col-md-2 col-sm-6 padding-4 company"  style="display:block;">
                  
                        <h6 class=" label_title_2"> رقم الهويه <span class="span-allow"> (10ارقام) </span></h6>
                   
                        <input type="text" name="k_national_num" id="k_national_num" onkeyup="get_length($(this).val(),'hint');check_nation_num(this,'hint');"
                               maxlength="10"
                            <?php if($social_status_id_fk !=''){ if($social_status_id_fk == 0){ echo 'disabled="disabled"'; }}?>
                               value="<?php echo $k_national_num;?>"
                               class="form-control input_style_2"
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">

                        <small  id="hint" class="myspan"  style="color: red;"> </small>
                  

                </div>

                <div class="col-md-2 col-sm-6 padding-4 company"  style="display:block;">
                    
                        <h6 class=" label_title_2">مصدر الهوية </h6>
                    
                        <select id="k_national_place" name="k_national_place"
                                class="form-control input_style_2"  aria-!!required="true">
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

                <div class="col-md-2 col-sm-6 padding-4 company"  style="display:block;">
                    
                        <h6 class=" label_title_2"> جوال الكافل </h6>
                  
                        <input type="text"  maxlength="10" data-validation="required" name="k_mob" id="k_mob" value="<?php echo $k_mob;?> "

                               data-validation="required" value=""
                               class="form-control input_style_2">
               
                </div>



                <div class="col-md-2 col-sm-6 padding-4 company"  style="display:block;">
                    
                        <h6 class=" label_title_2">هل يوجد وكاله</h6>
                  
                        <select id="wakala_type" name="wakala_type"
                                onchange="show_wakl_details();"  class="form-control input_style_2" data-validation="!!required">
                            <option value="">إختر</option>
                            <option value="1" <?php if($wakala_type==1)echo 'selected';?> >نعم</option>
                            <option value="2" <?php if($wakala_type==2)echo 'selected';?>>لا</option>
                        </select>
                  
                </div>

<!---->
                <div id="show_wakel" style="display: none;">

                <div class="col-md-2 col-sm-6 padding-4 " >
                   
                        <h6 class=" label_title_2 w_name"> <?php echo $title; ?>  </h6>
                    
                        <input type="text" name="w_name" id="w_name"
                            <?php
                            echo $wakala_type;
                            if($wakala_type != 1){
                                //echo ' disabled="disabled"';
                            } ?>
                                value="<?php echo $w_name;?>"
                               class="form-control input_style_2">
                  
                </div>


                <div class="col-md-2 col-sm-6 padding-4 " >
                    
                        <h6 class=" label_title_2 wakel_relationship" > <?php echo $desc; ?> </h6>
                   

                        <select name="wakel_relationship"  id="wakel_relationship"

                            <?php if($wakala_type !=1){
                                //  echo ' disabled="disabled"';
                            } ?>

                                onchange="get_num_fk(this.value);" class=" form-control input_style_2">
                            <option value="">إختر</option>

                            <?php if(!empty($relationships)){ foreach ($relationships as $record){
                                $select='';
                                if(isset($result)){
                                    if($wakel_relationship ==$record->id_setting){$select='selected'; }
                                }?>
                                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>>
                                    <?php echo $record->title_setting;?></option>
                            <?php  } } ?>
                        </select>
                    
                </div>


                <div class="col-md-2 col-sm-6 padding-4 " >
                    
                        <h6 class=" label_title_2  w_national_num">رقم الهوية    </h6>
                   
                        <input type="text" name="w_national_num" id="w_national_num"
                               onkeyup="get_length($(this).val(),'hint_num');" maxlength="10"
                               onkeypress="validate_number(event)"

                            <?php if($wakala_type !=1){
                                // echo ' disabled="disabled"';
                            } ?>
                               value=""
                               class="form-control input_style_2">
                        <small  id="hint_num" class="myspan"  style="color: red;"> </small>
                  
                </div>


                <div class="col-md-2 col-sm-6 padding-4 " >
                   
                        <h6 class=" label_title_2 w_mob "> <?php echo $gawal; ?>   </h6>
                  
                        <input type="text" name="w_mob" id="w_mob" onkeyup="get_length($(this).val(),'hint_mob');" maxlength="10"
                               onkeypress="validate_number(event)"
                            <?php if($wakala_type !=1){
                                //  echo ' disabled="disabled"';
                            } ?>
                               value=" " class="form-control input_style_2">
                        <small  id="hint_mob" class="myspan"  style="color: red;"> </small>
                 
                </div>
                </div>

                <!---->

                <div class="col-md-2 col-sm-6 padding-4 " >
                   
                        <h6 class=" label_title_2">المدينة</h6>
                 
                        <select id="city_id_fk" name="k_city"
                                onchange="getAhai($(this).val());"  class="form-control input_style_2" >
                            <option value="">إختر</option>
                            <?php
                            if(isset($cities)&&!empty($cities)) {
                                foreach($cities as $key=>$value){
                                    ?>
                                    <option value="<?php echo$key;?>"<?php if($key==$k_city){ echo 'selected'; } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }

                            ?>
                        </select>
                   
                </div>


                <div class="col-md-2 col-sm-6 padding-4 " >
                  
                        <h6 class=" label_title_2">الحي</h6>
                   
                        <select id="hai_id_fk" name="k_hai" disabled="disabled"  class="form-control input_style_2">
                            <option value="">إختر</option>
                            <?php if(isset($k_hai) && !empty($k_hai)){
                                foreach ($ahais as $hay){
                                    $select ='';  if($hay->id == $k_hai){$select = 'selected';}?>
                                    <option <?= $select?> value="<?=$hay->id ?>"><?=$hay->name ?></option>
                                <?php } } ?>
                        </select>
                
                </div>



                <div class="col-md-2 col-sm-6 padding-4 " >
                    
                        <h6 class=" label_title_2">العنوان الوطني </h6>
                   
                        <input type="text" name="k_addres" id="k_addres"
                              value=" <?php echo $k_addres;?>"
                               class="form-control input_style_2">
                  
                </div>

                <div class="col-md-3 col-sm-6 padding-4 company"  style="display:block;">
                    
                        <h6 class=" label_title_2">التخصص </h6>
                   
                        <select name="k_specialize_fk" class="form-control input_style_2" id="k_specialize_fk" >
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


                <div class="col-md-2 col-sm-6 padding-4 company"  style="display:block;">
                    
                        <h6 class=" label_title_2">الحياة العملية  </h6>
                   
                        <select name="work_id_fk" class="form-control input_style_2" id="work_id_fk" onchange="change_work_status($(this).val())" >
                            <option value="">اختر</option>
                            <?php
                            $works = array('لا', 'نعم');
                            foreach($works as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>"
                                    <?php if(!empty($work_id_fk)){
                                        if($key==$work_id_fk){ echo 'selected'; }
                                    } ?>> <?php echo $value;?></option >
                                <?php
                            }
                            ?>
                        </select>

                
                </div>

                <div class="col-md-4 col-sm-6 padding-4 company"  style="display:block;">
                   
                        <h6 class=" label_title_2">المهنة </h6>
                  
                        <select name="k_job_fk" id="k_job_fk"
                            <?php if($work_id_fk ==0){echo ' disabled="disabled"';} ?>
                                class="form-control input_style_2"
                                >
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


                <div class="col-md-3 col-sm-6 padding-4 company"  style="display:block;">
                   
                        <h6 class=" label_title_2">جهة العمل </h6>
                    
                        <input type="text" name="k_job_place"
                            <?php if($work_id_fk ==0){echo ' disabled="disabled"';} ?>
                               id="k_job_place" class="form-control input_style_2" onchange="change_halet_kafel($(this).val())"
                               value="<?php echo $k_job_place;?>"  data-validation-has-keyup-event="true" >

                   
                </div>


                <div class="col-md-2 col-sm-6 padding-4 member"  style="">
                    
                        <h6 class=" label_title_2">نشاط المؤسسة   </h6>
                   
                        <select name="k_activity_fk" class="form-control input_style_2" id="k_activity_fk"
                        >
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

                <div class="clearfix"></div>
                <!---------------------------------------   -------------------------------------------------------------------------------------->

                <div class="col-md-2 col-sm-6 padding-4 member" >
                 
                        <h6 class=" label_title_2">الجوال  </h6>
                    
                        <input type="text" name="company_gawal" id="company_gawal"  maxlength="10"  class="form-control input_style_2" onchange=""value="<?php echo $company_gawal ;?>"  data-validation-has-keyup-event="true" >
                  
                </div>

                <div class="col-md-20 col-sm-6 padding-4 member"  >
                    
                        <h6 class=" label_title_2">الهاتف  </h6>
                    
                        <input type="text" name="company_phone" id="company_phone" maxlength="10"  class="form-control input_style_2" onchange=""value="<?php echo $company_phone ;?>"  data-validation-has-keyup-event="true" >
                  
                </div>

                <div class="col-md-25 col-sm-6 padding-4 member"  >
                    
                        <h6 class=" label_title_2">الفاكس  </h6>
                   
                        <input type="text" name="company_fax" id="company_fax" maxlength="10"  class="form-control input_style_2" onchange=""value="<?php echo $company_fax ;?>"  data-validation-has-keyup-event="true" >
                    
                </div>
                <!------------------------------------------------------------------------------------------------->

                <div class="col-md-4 col-sm-6 padding-4 ">
                
                        <h6 class=" label_title_2">الطريقة المناسبة للمراسلة</h6>
                   
                        <select id="k_message_method" name="k_message_method" onchange="show_message_method();"
                                class="form-control input_style_2" >

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

                <div class="col-md-3 col-sm-6 padding-4 " id="show_k_email" style="display: none">
                   
                        <h6 class=" label_title_2">البريد الإلكتروني</h6>
                   
                        <input type="email" name="k_email" id="k_email" data-validation="email" value="<?php echo $k_email;?>"
                               class="form-control input_style_2"
                               data-validation-has-keyup-event="true">
                   
                </div>

                <div class="col-lg-1 col-md-2 col-sm-6 padding-4 " id="show_k_barid_box" style="display: none;">
                    
                        <h6 class=" label_title_2">صندوق بريد</h6>
                  
                        <input type="text" name="k_barid_box"  id="k_barid_box" class="form-control input_style_2"
                               value="<?php echo $k_barid_box;?>"  data-validation-has-keyup-event="true">
                    
                </div>
                <div class="col-lg-1 col-md-2 col-sm-6 padding-4 " id="show_k_bardid_code" style="display: none;">
                   
                        <h6 class=" label_title_2">رمز بريدي</h6>
                  
                        <input type="text" name="k_bardid_code"  id="k_bardid_code"   onkeypress="validate_number(event)" class="form-control input_style_2"
                               value="<?php echo $k_bardid_code;?>"
                               data-validation-has-keyup-event="true"  >
                
                </div>


                <div class="col-md-3 col-sm-6 padding-4 ">
                 
                        <h6 class=" label_title_2">التواصل عن طريق رسائل الجوال </h6>
                    
                        <select id="k_message_mob" name="k_message_mob"
                                class="form-control input_style_2">
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


                <div class="col-md-3 col-sm-6 padding-4 ">
                   
                        <h6 class=" label_title_2">وقت التواصل </h6>
                   
                    <div class="col-xs-6 padding-4 ">
                        <input placeholder="إدخل البيانات " id="m12h" type="text" class="form-control half"

                               name="right_time_from" value="<?php echo $right_time_from; ?>" >
                    </div>
                     <div class="col-xs-6 padding-4 ">

                        <input placeholder="إدخل البيانات " id="m13h" class="form-control half input-style"
                               type="text"
                               name="right_time_to" value="<?php echo $right_time_to;?>" >
                  </div>
                </div>



                <!--<div class="col-md-20 col-sm-6 padding-4 ">
                        <div class="col-md-6 col-sm-6  no-padding ">
                            <h6 class=" label_title_2">حالة الكافل</h6>
                        </div>
                        <div class="col-md-6 col-sm-6  no-padding">
                            <select id="halat_kafel_id"  class="form-control input_style_2"
                            onchange="change_halet_kafel($(this).val())"  data-validation="required"
                                    aria-!!required="true" name="halat_kafel_id">
                                <option value="">إختر</option>

                                <?php
                if(isset($halat_kafel)&&!empty($halat_kafel)) {
                    foreach($halat_kafel as $row){
                        ?>
                                        <option value="<?php echo $row->id;?>"

                                            <?php if(!empty($halat_kafel_id)){
                            if($row->id==$halat_kafel_id){ echo 'selected'; }
                        } ?>> <?php echo $row->title;?></option >
                                        <?php
                    }
                }
                ?>
                            </select>
                        </div>
                    </div>
                    -->

               <!-- <div class="col-md-20 col-sm-6 padding-4 ">
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">حالة الكافل</h6>
                    </div>
                    <div class="col-md-6 col-sm-6  no-padding">
                        <select id="halat_kafel_id"  class="form-control input_style_2"
                                onchange="change_halet_kafel($(this).val())"  data-validation="required"
                                aria-!!required="true" name="halat_kafel_id">
                            <option value="">إختر</option>
                            <?php
                            if(isset($halat_kafel)&&!empty($halat_kafel)) {
                                foreach($halat_kafel as $row){
                                    if($row->id !=9){
                                        continue;
                                    }
                                    ?>
                                    <option value="<?php echo $row->id;?>"

                                        <?php if(!empty($halat_kafel_id)){
                                            if($row->id==$halat_kafel_id){ echo 'selected'; }
                                        } ?>> <?php echo $row->title;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col_md_100 col-sm-6 padding-4 ">
                    <div class="col-md-2 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">ملاحظات</h6>
                    </div>
                    <div class="col-md-10 col-sm-6  no-padding">
                        <input type="text" name="k_notes" class="form-control input_style_2"  data-validation="required" />
                    </div>
                </div>-->

                <div class="col-md-2 col-sm-6 padding-4 ">
                    
                        <h6 class=" label_title_2">اسم المستخدم</h6>
                  
                        <input type="text" name="user_name" class="form-control input_style_2" data-validation="required" >
                  
                </div>

                <div class=" col-sm-6  col-md-2 padding-4">
                 <h6 class=" label_title_2">كلمة المرور </h6>
                   
                    <input type="password" name="password" onkeyup="valid_pass_length();"
                           id="user_password" class="form-control  input-style" data-validation="required" />
                    <span  id="validate_length" class="span-validation"> </span>
                </div>

                <div class=" col-sm-6  col-md-2 padding-4">
                 <h6 class=" label_title_2">تاكيد كلمة المرور</h6>
                
                    <input type="password"   id="user_password_copy" onkeyup="return valid_pass_copy();" class="form-control  input-style"    data-validation="required" />
                    <span  id="validate_copy" class="span-validation"> </span>
                </div>

                <div class="col-md-12" >
                <br />
                    <button type="button" value="" id="" onclick="add_kafala_row()" class="btn btn-success btn-next"/>
                    <i class="fa fa-plus"> </i>  إضافة تفاصيل الكفالة </button><br><br>
                    <table   class="table table-striped table-bordered fixed-table "    <?php if(empty($result->details)){ ?>
                        style="display: none; "  <?php } ?>  id="kafala_table" >
                        <thead>
                        <tr class="info">
                            <th style="width: 12%"  class="text-center" >نوع الكفالة</th>
                            <th style="width: 12%"  class="text-center" >عدد الافراد</th>
                            <th style="width: 20%;" class="text-center" > مدة الكفاله</th>
                            <th class="text-center" >المبلغ</th>
                            <th class="text-center" > الاجمالي </th>
                            <th style="width: 140px" class="text-center" > طريقة السداد </th>

                            <th class="text-center" > الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="kafala_table_rows">
                        <?php if(!empty($result->details)){
                            foreach ($result->details as $row_detail){
                                ?>
                                <tr >
                                    <td style=" width:12%;text-align: center!important;">


                                        <select name="" id="" data-validation="required" class=" form-control" disabled="disabled" >
                                            <option value="">إختر</option>
                                            <?php
                                            if(!empty($kfalat_types) && isset($kfalat_types)) {
                                                foreach ($kfalat_types as $kfala){
                                                    $select = '';
                                                    if($row_detail->kafala_type == $kfala->id){
                                                        $select = 'selected';
                                                    }?>
                                                    <option <?=$select?> value="<?php echo $kfala->id;?>"
                                                    ><?php echo $kfala->title;?></option>
                                                <?php   } } ?>
                                        </select></td>
                                    <td style="width:7%;text-align: center!important;">
                                        <input type="text" value="<?=$row_detail->member_num?>" class="form-control" data-validation="required" disabled="disabled" >
                                    </td>
                                    <td style="width:7%;text-align: center!important;">
                                        <?php  $kafala_period = array(
                                            '1' => 'شهر', '2' => 'شهرين', '3' => '3 أشهر', '4' => '4 أشهر', '5' => '5 أشهر','6' => '6 أشهر',
                                            '7' => '7 أشهر', '8' => '8 أشهر','9' => '9 أشهر','10' => '10 أشهر','11' => '11 أشهر','12' => 'سنة',

                                        );
                                        ?>
                                        <select   data-validation="required" class=" form-control" disabled="disabled" >
                                            <option value="">إختر</option>
                                            <?php
                                            foreach ($kafala_period as $key=>$value){
                                                $select = '';
                                                if($row_detail->kafala_period == $key){
                                                    $select = 'selected';
                                                }
                                                ?>
                                                <option <?=$select?> value="<?= $key?>"><?= $value?></option>
                                            <?php }?>


                                        </select>
                                    </td>

                                    <td style="width:10%;text-align: center!important;">
                                        <input type="text" value="<?=$row_detail->kafala_value?>" class="form-control" disabled="disabled"   data-validation="required" >
                                    </td>

                                    <td style="width:21%;text-align: center!important;">
                                        <input type="text" value="<?=$row_detail->all_kafala_value?>" readonly="readonly" class="form-control"   data-validation="required" >

                                    </td>
                                    <td style=" width:15%;text-align: center!important;">

                                        <select   data-validation="required" disabled="disabled" class=" form-control" >
                                            <option value="">إختر</option>
                                            <?php $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
                                            if(isset($pay_method_arr)&&!empty($pay_method_arr)) {
                                                for($a=1;$a<sizeof($pay_method_arr);$a++){
                                                    ?>
                                                    <option value="<?php echo$a;?>"
                                                        <?php if(!empty($pay_method_arr)){
                                                            if($a == $row_detail->pay_method ){ echo 'selected'; }
                                                        } ?>> <?php echo $pay_method_arr[$a];?></option >
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td style="text-align: center!important;">
                                        <?php   $link ='onclick="modalLlink('.$row_detail->id.','.$result->id.');"';  ?>
                                        <a data-toggle="modal" <?= $link ?> data-target="#modal-delete"
                                           title="حذف"> <i class="fa fa-trash"
                                                           aria-hidden="true"></i> </a>

                                        <a type="button" class="" data-toggle="modal" data-target="#myModal<?=$row_detail->id?>">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>


                                </tr>

                            <?php } } ?>

                        </tbody>

                    </table>
                </div>

                <div class="col-md-12" ><br>
                    <div class="form-group col-md-3 col-sm-6 padding-4"></div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">

                        <button type="submit" id="save" name="add" value="addSponsor_maindata"
                                class="btn btn-success">
                            <span><i class="fa fa-floppy-o"></i></span> حفظ الطلب
                        </button>
                    </div>
                    <!-- <div class="form-group col-md-5 col-sm-6 padding-4">
                         <button type="submit" id="save" name="add" value="xyz"
                            class="btn btn-info">
                             <span><i class="fa fa-undo"></i></span> حفظ وذهاب إلي الكفلاء
                         </button>
                     </div> -->
                </div>

                <?php echo form_close()?>



            </div>
        </div>
 


    <?php // $this->load->view('admin/all_Finance_resource_views/sponsors/sidebar_kafel_data');?>

</div>
</div>
</div>
<?php
if(isset($result->details)&&!empty($result->details)) {

    foreach ($result->details as $row2) {
        ?>
        <div class="modal fade" id="myModal<?=$row2->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="width: 90%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  style="position: absolute;left: 10px; top: 14px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php echo form_open_multipart('Web/updateSponsorOrdersDetails/'.$row2->id); ?>
                    <div class="modal-body">
                        <table   class="table table-striped table-bordered fixed-table "   >
                            <thead>
                            <tr class="info">
                                <th style="width: 12%"  class="text-center" >نوع الكفالة</th>
                                <th style="width: 12%"  class="text-center" >عدد الافراد</th>
                                <th style="width: 20%;" class="text-center" > مدة الكفاله</th>
                                <th class="text-center" >المبلغ</th>
                                <th class="text-center" > الاجمالي </th>
                                <th style="width: 140px" class="text-center" > طريقة السداد </th>


                            </tr>
                            </thead>
                            <tbody >

                            <tr id="">
                                <!-- <td style="text-align: center!important;">--><?//=$row2->id?><!--</td>-->

                                <td style=" width:12%;text-align: center!important;">


                                    <select name="kafala_type" id="kafala_type<?=$row2->id?>" data-validation="required" class=" form-control" >
                                        <option value="">إختر</option>
                                        <?php
                                        if(!empty($kfalat_types) && isset($kfalat_types)) {
                                            foreach ($kfalat_types as $kfala){
                                                $select = '';
                                                if($row2->kafala_type == $kfala->id){
                                                    $select = 'selected';
                                                }?>
                                                <option <?=$select?> value="<?php echo $kfala->id;?>"
                                                ><?php echo $kfala->title;?></option>
                                            <?php   } } ?>
                                    </select></td>
                                <td style="width:7%;text-align: center!important;">
                                    <input type="text" value="<?=$row2->member_num?>" class="form-control" name="member_num" onkeyup="make_total(<?=$row2->id?>)" id="member_num<?=$row2->id?>" data-validation="required" >
                                </td>
                                <td style="width:7%;text-align: center!important;">
                                    <?php  $kafala_period = array(
                                        '1' => 'شهر', '2' => 'شهرين', '3' => '3 أشهر', '4' => '4 أشهر', '5' => '5 أشهر','6' => '6 أشهر',
                                        '7' => '7 أشهر', '8' => '8 أشهر','9' => '9 أشهر','10' => '10 أشهر','11' => '11 أشهر','12' => 'سنة',

                                    );
                                    ?>
                                    <select name="kafala_period" id="kafala_period<?=$row2->id?>" data-validation="required" class=" form-control" >
                                        <option value="">إختر</option>
                                        <?php
                                        foreach ($kafala_period as $key=>$value){
                                            $select = '';
                                            if($row2->kafala_period == $key){
                                                $select = 'selected';
                                            }
                                            ?>
                                            <option <?=$select?> value="<?= $key?>"><?= $value?></option>
                                        <?php }?>


                                    </select>
                                </td>

                                <td style="width:10%;text-align: center!important;">
                                    <input type="text" class="form-control" value="<?=$row2->kafala_value?> " name="kafala_value" onkeyup="make_total(<?=$row2->id?>)" id="kafala_value<?=$row2->id?>" data-validation="required" >
                                </td>

                                <td style="width:21%;text-align: center!important;">
                                    <input   type="text" readonly="readonly" value="<?=$row2->all_kafala_value ?>" class="form-control" name="all_kafala_value" id="all_kafala_value<?=$row2->id?>" data-validation="required" >

                                </td>
                                <td style=" width:15%;text-align: center!important;">

                                    <select name="pay_method" id="pay_method<?=$row2->id?>" data-validation="required" class=" form-control" onchange="gender_select(<?=$row2->id?>)" >
                                        <option value="">إختر</option>
                                        <?php $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
                                        if(isset($pay_method_arr)&&!empty($pay_method_arr)) {
                                            for($a=1;$a<sizeof($pay_method_arr);$a++){
                                                ?>
                                                <option value="<?php echo$a;?>"
                                                    <?php if(!empty($pay_method_arr)){
                                                        if($a == $row2->pay_method){ echo 'selected'; }
                                                    } ?>> <?php echo $pay_method_arr[$a];?></option >
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id="submit_p"   name="update_detail" class="btn btn-blue btn-close" value="حفظ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                    </div>
                    <?php echo form_close() ; ?>
                </div>
            </div>
        </div>


    <?php  } }  ?>


<script>

    function send_value(valu)
    {
        var link='<?= base_url()?>Web/addSponsorOrdersTransform/'+valu;
        $('#ref').attr('href', link);
    }



</script>
<script type="text/javascript">
    function make_total(id)
    {
        // Capture the entered values of two input boxes
        var member_num = document.getElementById('member_num'+id).value;
        var kafala_value = document.getElementById('kafala_value'+id).value;

        // Add them together and display
        var sum = parseInt(member_num) * parseInt(kafala_value);
        if(member_num != '' && kafala_value != ''){
            $('#all_kafala_value'+id).val(sum);
        }else {
            $('#all_kafala_value'+id).val('هناك حقل فارغ');
        }

    }
</script>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script>


<script>

    function deleteRow(id){
        $("#" + id).remove();
    }


</script>

<script>


    function modal_link(id)
    {
        var link='<?= base_url()?>Web/delete_sponsor_orders/'+id;
        $('#adele').attr('href', link);
    }

    function modalLlink(id,kafel_id)
    {
        var link='<?= base_url()?>Web/deleteOrdersDetails/'+id+'/'+kafel_id;
        $('#adele').attr('href', link);
    }

</script>


<script>

    function add_kafala_row() {

//            var x=document.getElementById('sdds').cloneNode(true);  //get the table
//         $("#resultTable").append(x);

        $("#kafala_table").show();
        var x = document.getElementById('kafala_table_rows');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Web/getkafalaRow',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#kafala_table_rows").append(html);
            }
        });

    }
</script>

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

<script>
    function getAhai(city_id){
        if(city_id != ''){
            var dataString='city_id='+city_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Web/getAhai',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#hai_id_fk').addClass("selectpicker");
                    document.getElementById("hai_id_fk").removeAttribute("disabled", "disabled");
                    document.getElementById("hai_id_fk").setAttribute("data-validation", "!!required");
                    document.getElementById("hai_id_fk").setAttribute("data-show-subtext", "true");
                    document.getElementById("hai_id_fk").setAttribute("data-live-search", "true");
                    $('#hai_id_fk').html(html);
                    //  $('#hai_id_fk').selectpicker("refresh");
                }
            });
        }else if(city_id == '' ) {

            $('#hai_id_fk').removeClass("selectpicker");

            $("#hai_id_fk").val('');
            document.getElementById("hai_id_fk").removeAttribute("data-show-subtext", "true");
            document.getElementById("hai_id_fk").removeAttribute("data-live-search", "true");
            document.getElementById("hai_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("hai_id_fk").removeAttribute("data-validation", "!!required");
            //  $('#hai_id_fk').selectpicker("refresh");
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
    function check_wakel_type(type) {
        if( type ==1 ){

            document.getElementById("w_name").removeAttribute("disabled", "disabled");
            document.getElementById("w_name").setAttribute("data-validation", "!!required");
            document.getElementById("wakel_relationship").removeAttribute("disabled", "disabled");
            document.getElementById("wakel_relationship").setAttribute("data-validation", "required");
            document.getElementById("w_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("w_national_num").setAttribute("data-validation", "required");
            document.getElementById("w_mob").removeAttribute("disabled", "disabled");
            document.getElementById("w_mob").setAttribute("data-validation", "required");

            //  $('#wakel_relationship').selectpicker("refresh");
        } else {

            document.getElementById("w_name").setAttribute("disabled", "disabled");
            document.getElementById("w_name").value='';
            document.getElementById("wakel_relationship").setAttribute("disabled", "disabled");
            document.getElementById("wakel_relationship").value='';
            document.getElementById("w_national_num").setAttribute("disabled", "disabled");
            document.getElementById("w_national_num").value='';
            document.getElementById("w_mob").setAttribute("disabled", "disabled");
            document.getElementById("w_mob").value='';

            //  $('#wakel_relationship').selectpicker("refresh");
        }
    }
</script>






<script>

    function GetF2a(f2a_type) {
        var f2a = $('option:selected',f2a_type).attr("data-specialize");


        if( f2a ==1 ){
            //  alert("ddddddddd");
            $('.kafel').text('اسم الكافل ');
            $('#relation_title').text('الصلة');

            $('.w_name').text('اسم الوكيل');
            $('.wakel_relationship').text('الصلة');
            $('.w_national_num').text('رقم هويته');
            $('.w_mob').text('جوال الوكيل');
            document.getElementById("k_specialize_fk").removeAttribute("disabled", "disabled");


            document.getElementById("k_mob").removeAttribute("disabled", "disabled");

            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>Web/fill_select",
                data:{f2a:f2a},
                success:function(d){
                    $('#wakel_relationship').html(d);
                }

            });




            document.getElementById("k_gender_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_gender_fk").setAttribute("data-validation", "!!required");
            document.getElementById("k_nationality_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_nationality_fk").setAttribute("data-validation", "!!required");
            document.getElementById("social_status_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("social_status_id_fk").setAttribute("data-validation", "!!required");
            document.getElementById("k_national_type").removeAttribute("disabled", "disabled");
            document.getElementById("k_national_type").setAttribute("data-validation", "!!required");
            document.getElementById("k_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("k_national_num").setAttribute("data-validation", "!!required");
            document.getElementById("k_national_place").removeAttribute("disabled", "disabled");
            document.getElementById("k_national_place").setAttribute("data-validation", "!!required");
            document.getElementById("work_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("work_id_fk").setAttribute("data-validation", "!!required");
            document.getElementById("k_activity_fk").setAttribute("disabled", "disabled");
            document.getElementById("k_activity_fk").removeAttribute("data-validation", "!!required");

            document.getElementById("company_phone").setAttribute("disabled", "disabled");
            document.getElementById("company_gawal").setAttribute("disabled", "disabled");
            document.getElementById("company_fax").setAttribute("disabled", "disabled");

            $(".company").css("display", "block");
            $('.member').hide();
            document.getElementById("k_activity_fk").value='';
        } else if( f2a ==2 )  {
            $('#relation_title').text('صفته');
            $('.kafel').text('اسم الكافل (الجهه)');
            document.getElementById("k_specialize_fk").setAttribute("disabled", "disabled");
            $('#k_specialize_fk').val('');



            document.getElementById("k_mob").setAttribute("disabled", "disabled");

            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>Web/fill_select",
                data:{f2a:f2a},
                success:function(d){
                    $('#wakel_relationship').html(d);
                }

            });



            document.getElementById("w_name").removeAttribute("disabled", "disabled");
            document.getElementById("wakel_relationship").removeAttribute("disabled", "disabled");
            document.getElementById("w_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("w_mob").removeAttribute("disabled", "disabled");

            document.getElementById("k_gender_fk").setAttribute("disabled", "disabled");
            document.getElementById("k_gender_fk").removeAttribute("data-validation", "!!required");
            document.getElementById("k_gender_fk").value='';
            document.getElementById("k_nationality_fk").setAttribute("disabled", "disabled");
            document.getElementById("k_nationality_fk").removeAttribute("data-validation", "!!required");
            document.getElementById("k_nationality_fk").value='';
            document.getElementById("social_status_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("social_status_id_fk").removeAttribute("data-validation", "!!required");
            document.getElementById("social_status_id_fk").value='';
            document.getElementById("k_national_type").setAttribute("disabled", "disabled");
            document.getElementById("k_national_type").removeAttribute("data-validation", "!!required");
            document.getElementById("k_national_type").value='';
            document.getElementById("k_national_num").setAttribute("disabled", "disabled");
            document.getElementById("k_national_num").removeAttribute("data-validation", "!!required");
            document.getElementById("k_national_num").value='';
            document.getElementById("k_national_place").setAttribute("disabled", "disabled");
            document.getElementById("k_national_place").removeAttribute("data-validation", "!!required");
            document.getElementById("k_national_place").value='';
            document.getElementById("work_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("work_id_fk").removeAttribute("data-validation", "!!required");
            document.getElementById("work_id_fk").value='';
            document.getElementById("k_activity_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_activity_fk").setAttribute("data-validation", "!!required");

            document.getElementById("company_phone").removeAttribute("disabled", "disabled");
            document.getElementById("company_gawal").removeAttribute("disabled", "disabled");
            document.getElementById("company_fax").removeAttribute("disabled", "disabled");
            $('.w_name').text('اسم المسئول');
            $('.wakel_relationship').text('صفته ');
            $('.w_national_num').text('رقم هويته');
            $('.w_mob').text('جوال المسئول');


            $('.company').hide();
            $('.member').show();
        }

    }

</script>
<script>

    function change_status(value) {
        if(value !=0){
            document.getElementById("k_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("k_mob").removeAttribute("disabled", "disabled");
        }else{
            document.getElementById("k_national_num").setAttribute("disabled", "disabled");
            document.getElementById("k_mob").setAttribute("disabled", "disabled");
            document.getElementById("k_national_num").value='';
            document.getElementById("k_mob").value='';
        }

    }




    function change_halet_kafel(value) {
        if(value !=8){
            document.getElementById("reasons_stop_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("reasons_stop_id_fk").value='';
        }else{
            document.getElementById("reasons_stop_id_fk").removeAttribute("disabled", "disabled");
        }

    }



    function change_work_status(value) {
        if(value ==0){
            document.getElementById("k_job_fk").setAttribute("disabled", "disabled");
            document.getElementById("k_job_fk").value='';
            document.getElementById("k_job_place").setAttribute("disabled", "disabled");
            document.getElementById("k_job_place").value='';
        }else{
            document.getElementById("k_job_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_job_place").removeAttribute("disabled", "disabled");
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



<script>

    function add_row(){
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var len = x.rows.length+1;
        var mydiv ='<tr id="' + len +'"><td>' + len +'</td>' +
            '<td style="width: 243px;"><select  name="attach_id_fk[]" id="myselect' + len +'"  class="form-control "  ' +
            '><option value="">إختر</option></select></td>' +
            '<td><input type="file" name="img[]"></td>' +
            '<td>#</td></tr>';
        $("#resultTable").append(mydiv);
        GetOptions(len);
        $('#saves').show();
    }

</script>
<script>

    function GetOptions(len) {
        var myarr = <?php echo $attach_arr;?>;
        var html = '<option>إختر </option>';
        for (i = 0; i < myarr.length; i++) {
            html += '<option value="' + myarr[i].id_setting + '"> ' + myarr[i].title_setting + '</option>';
        }
        $("#myselect" + len).html(html);
    }
</script>


<script>

    function DeleteImage(valu) {
        $('#' + valu).remove();
        var x = document.getElementById('resultTable');
        var myLenth = x.rows.length;
        var dataString = 'id=' + valu ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Web/delete_attach/' + valu ,
            data:dataString,
            cache:false,
            success: function(json_data){
                if(myLenth == 0){
                    $("#mytable").hide();
                }
                var JSONObject = JSON.parse(json_data);
                //console.log(myLenth);
                alert(' تم حذف  المرفق بنجاح');

            }
        });

    }

</script>


<script>
    function change_method_kafel(value) {
        if(value ==1 ){
            document.getElementById("k_barid_box").setAttribute("disabled", "disabled");
            document.getElementById("k_barid_box").removeAttribute("data-validation", "!!required");
            document.getElementById("k_barid_box").value='';
            document.getElementById("k_bardid_code").setAttribute("disabled", "disabled");
            document.getElementById("k_bardid_code").removeAttribute("data-validation", "!!required");
            document.getElementById("k_bardid_code").value='';
            document.getElementById("k_email").removeAttribute("disabled", "disabled");
            document.getElementById("k_email").setAttribute("data-validation", "email");
            document.getElementById("k_email").value='';
        }  else if(value ==2){
            document.getElementById("k_barid_box").removeAttribute("disabled", "disabled");
            document.getElementById("k_barid_box").value='';
            document.getElementById("k_bardid_code").removeAttribute("disabled", "disabled");
            document.getElementById("k_bardid_code").value='';
            document.getElementById("k_email").setAttribute("disabled", "disabled");
            document.getElementById("k_email").removeAttribute("data-validation", "email");
            document.getElementById("k_email").value='';
        }else {
            document.getElementById("k_barid_box").setAttribute("disabled", "disabled");
            document.getElementById("k_barid_box").value='';
            document.getElementById("k_bardid_code").setAttribute("disabled", "disabled");
            document.getElementById("k_bardid_code").value='';
            document.getElementById("k_email").setAttribute("disabled", "disabled");
            document.getElementById("k_email").removeAttribute("data-validation", "email");
            document.getElementById("k_email").value='';
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
    function show_wakl_details() {
        var wakala_type = $('#wakala_type').val();
        if(wakala_type == 1){
            $('#show_wakel').show();
        }
        else{
            $('#show_wakel').hide();
        }

    }
</script>
<script>
    function show_message_method() {
        var k_message_method = $('#k_message_method').val();
        if (k_message_method==1){

            $('#show_k_email').show();
            $('#show_k_barid_box').hide();
            $('#show_k_bardid_code').hide();

        } else if(k_message_method==2){
            $('#show_k_email').hide();

            $('#show_k_barid_box').show();
            $('#show_k_bardid_code').show();
        }
        else if (k_message_method==3){
            $('#show_k_email').hide();
            $('#show_k_barid_box').hide();
            $('#show_k_bardid_code').hide();
        }

    }
</script>

<script type="text/javascript" src="<?= base_url() . 'asisst/web_asset/' ?>js/jquery-1.10.1.min.js"></script>

<script>
function check_nation_num(elem,span_id) {
    var num=elem.value;
    $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Web/check_nation_num' ,
            data:{num:num},
            cache:false,
            success: function(res){
                if(res >= 1){
                  $('#'+span_id).text('رقم الهوية موجود مسبقاً');
           
                    elem.value='';
                    swal({
                        title: "رقم الهوية موجود مسبقاً",
                        text: "",
                        type: "warning",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "تم"
                        });
                }
               
            }
        });
}
</script>