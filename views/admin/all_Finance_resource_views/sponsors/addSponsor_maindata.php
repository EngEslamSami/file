<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
-->
<style type="text/css">
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: !block !important;
        font-weight: 500 !important;
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

    .print_forma {
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-!block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-!block;
        float: right;
        width: 100%;
    }

    .piece-body {
        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-!block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }





    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    /***/

    .btn-close-model,
    .btn-close-model:hover,
    .btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }

    .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {
        top: 100% !important;
        bottom: auto !important;
        margin-bottom: 1px !important;
    }

    /**********************************************************/

    @media (min-width: 992px){
        .col_md_10{
            width: 10%;
            float:right;
        }
        .col_md_15{
            width: 15%;
            float:right;
        }
        .col_md_20{
            width: 20%;
            float:right;
        }
        .col_md_25{
            width: 25%;
            float:right;
        }
        .col_md_30{
            width: 30%;
            float:right;
        }
        .col_md_35{
            width: 35%;
            float:right;
        }
        .col_md_40{
            width: 40%;
            float:right;
        }
        .col_md_45{
            width: 45%;
            float:right;
        }
        .col_md_50{
            width: 50%;
            float:right;
        }
        .col_md_55{
            width: 55%;
            float:right;
        }


        .col_md_60{
            width: 60%;
            float:right;
        }

        .col_md_70{
            width: 70%;
            float:right;
        }

        .col_md_75{
            width: 75%;
            float:right;
        }

        .col_md_80{
            width: 80%;
            float:right;
        }

        .col_md_85{
            width: 85%;
            float:right;
        }
        .col_md_90{
            width: 90%;
            float:right;
        }
        .col_md_95{
            width: 95%;
            float:right;
        }
        .col_md_100{
            width: 100%;
            float:right;
        }

    }

    .label_title_2 {
         width: 100%;
        color: white;
        background-color: #09704e;
        border: 2px solid #09704e;
        height: 34px;
        margin: 0;
        line-height: 34px;
        padding-right: 6px;
        font-size: 14px;
        margin-bottom: 5px;
        border-radius: 6px;
    }

    .input_style_2 {
        border-radius: 0px;
        border-right: transparent;
        width: 100%;
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

    $out['form']='all_Finance_resource/sponsors/Sponsor/updateSponsor_maindata/'.$this->uri->segment(5);
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

    $out['form']='all_Finance_resource/sponsors/Sponsor/addSponsor_maindata';
}


?>
<?php

//echo $fe2a_type;
if($fe2a_type ==1 ||  $fe2a_type == 3)
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
          display: none ;
      }
      .member {
          display: none ;
      }
      </style>
<?php }elseif($fe2a_type==1 || $fe2a_type==3){
    
    $ddisplay = 'block';
    ?>

    <style>
        .company {
            display: block ;
        }
        .member {
            display: none ;
        }
    </style>
    
 <?php }  elseif($fe2a_type==4 || $fe2a_type==5 || $fe2a_type==6|| $fe2a_type==7){
     $ddisplay = 'none';
    
    ?>

    <style>
        .company {
            display: none ;
        }
        .member {
            display: block ;
        }
    </style>

<?php }   ?>


<div class="col-sm-12 no-padding " >
    <div class="col-sm-9 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $titles;  ?></h3>
                <div class="pull-left">
                    <?php if(isset($result) && !empty($result)){
                        $data_load['result'] =$result;
                        $data_load['k_status'] = $k_status;
                        $this->load->view('admin/all_Finance_resource_views/sponsors/drop_down_menu', $data_load);
                        }?>
                </div>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>



                <div class="col_md_20 col-sm-6 padding-4">
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">رقم الكافل</h6>
                    </div>
                    <div class="col-md-6 col-sm-6  no-padding">

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
                </div>





                <div class="col_md_25 col-sm-6 padding-4">
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">فئة الكافل</h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding">
                        <select id="fe2a_type" data-validation="required" class="form-control input_style_2"
                                name="fe2a_type" onchange="GetF2a(this)">

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
                </div>







                <div class="col_md_55 col-sm-6 padding-4">
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2 kafel">اسم الكافل </h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding">
                        <input type="text" name="k_name" id="k_name" value="<?php echo $k_name;?>"
                               class="form-control input_style_2"
                               data-validation="!!required"
                               data-validation-has-keyup-event="true">
                    </div>
                </div>

                <div class="col_md_20 col-sm-6 padding-4 company"  style="display:<?php echo $ddisplay; ?>;">
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">الجنس </h6>
                    </div>
                    <div class="col-md-6 col-sm-6  no-padding">
                        <select name="k_gender_fk" id="k_gender_fk" data-validation="!!required"
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
                </div>

                <div class="col_md_25 col-sm-6 padding-4  company"   style="display:<?php echo $ddisplay; ?>;">
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">الجنسيه</h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding">
                        <select id="k_nationality_fk" data-validation="!!required" class="form-control input_style_2"
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
                </div>



                <div class="col_md_25 col-sm-6 padding-4  company"   style="display:<?php echo $ddisplay; ?>;">
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">الحالة الاجتماعية </h6>
                    </div>
                    <div class="col-md-6 col-sm-6  no-padding">
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
                </div>




                <div class="col_md_30 col-sm-6 padding-4 company"  style="display:<?php echo $ddisplay; ?>;">
                    <div class="col-md-5 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">نوع الهوية </h6>
                    </div>
                    <div class="col-md-7 col-sm-6  no-padding">
                        <select id="k_national_type"  class="form-control input_style_2"
                                aria-!!required="true" name="k_national_type">
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

                </div>
                <div class="col_md_25 col-sm-6 padding-4 company"   style="display:<?php echo $ddisplay; ?>;">
                    <div class="col-md-5 col-sm-6  no-padding ">
                        <h6 class=" label_title_2"> رقم الهويه <span class="span-allow"> (10ارقام) </span></h6>
                    </div>
                    <div class="col-md-7 col-sm-6  no-padding">
                        <input type="text" name="k_national_num" id="k_national_num" onkeyup="get_length($(this).val(),'hint');"
                               maxlength="10"
                            <?php if($social_status_id_fk !=''){ if($social_status_id_fk == 0){ echo 'disabled="disabled"'; }}?>
                               value="<?php echo $k_national_num;?>"
                               class="form-control input_style_2"
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                        <small  id="hint" class="myspan"  style="color: red;"> </small>
                    </div>
                </div>

                <div class="col_md_25 col-sm-6 padding-4 company"   style="display:<?php echo $ddisplay; ?>;">
                    <div class="col-md-5 col-sm-6  no-padding  ">
                        <h6 class=" label_title_2">مصدر الهوية </h6>
                    </div>
                    <div class="col-md-7 col-sm-6  no-padding">
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
                </div>

                <div class="col_md_25 col-sm-6 padding-4 company"  style="display:<?php echo $ddisplay; ?>;">
                    <div class="col-md-5 col-sm-6  no-padding ">
                        <h6 class=" label_title_2"> جوال الكافل </h6>
                    </div>
                    <div class="col-md-7 col-sm-6  no-padding">
                        <input type="text"  maxlength="10" name="k_mob" id="k_mob" value="<?php echo $k_mob;?> "

                               data-validation="!!required" value=""
                               class="form-control input_style_2">
                    </div>
                </div>



                <div class="col_md_25 col-sm-6 padding-4 company"   style="display:<?php echo $ddisplay; ?>;">
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">هل يوجد وكاله</h6>
                    </div>
                    <div class="col-md-6 col-sm-6  no-padding">
                        <select id="wakala_type" name="wakala_type"
                                onchange="check_wakel_type($(this).val());"  class="form-control input_style_2" data-validation="!!required">
                            <option value="">إختر</option>
                            <option value="1" <?php if($wakala_type==1)echo 'selected';?> >نعم</option>
                            <option value="2" <?php if($wakala_type==2)echo 'selected';?>>لا</option>
                        </select>
                    </div>
                </div>





                <div class="col_md_30 col-sm-6 padding-4 " >
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2 w_name"> <?php echo $title; ?>  </h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding">
                        <input type="text" name="w_name" id="w_name"
                            <?php 
                          
                            if($wakala_type!=1){ //echo ' disabled="disabled"';
                             } ?>
                               data-validation="!!required" value="<?php echo $w_name;?>"
                               class="form-control input_style_2">
                    </div>
                </div>


                <div class="col_md_20 col-sm-6 padding-4 " >
                    <div class="col-md-3 col-sm-6  no-padding ">
                        <h6 class=" label_title_2 wakel_relationship"><?php echo $desc; ?></h6>
                    </div>
                    <div class="col-md-9 col-sm-6  no-padding">

                        <select name="wakel_relationship"  id="wakel_relationship"

                            <?php if($wakala_type !=1){
                                //echo ' disabled="disabled"';
                                } ?>

                                onchange="get_num_fk(this.value);" class=" form-control input_style_2">
                            <option value="">إختر</option>

                            <?php if(!empty($descriptions)){ 
                                   foreach ($descriptions as $record){
                                $select='';
                                if(isset($result)){
                                    if($wakel_relationship ==$record->id_setting){$select='selected'; }
                                }?>
                                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                </div>


                <div class="col_md_25 col-sm-6 padding-4 " >
                    <div class="col-md-5 col-sm-6  no-padding ">
                        <h6 class=" label_title_2  w_national_num">رقم الهوية    </h6>
                    </div>
                    <div class="col-md-7 col-sm-6  no-padding">
                        <input type="text" name="w_national_num" id="w_national_num"
                               onkeyup="get_length($(this).val(),'hint_num');" maxlength="10"
                               onkeypress="validate_number(event)"
                            <?php if($wakala_type !=1){
                                // echo ' disabled="disabled"';
                                 } ?>
                               data-validation="!!required" value="<?php echo $w_national_num;?>"
                               class="form-control input_style_2">
                        <small  id="hint_num" class="myspan"  style="color: red;"> </small>
                    </div>
                </div>


                <div class="col_md_25 col-sm-6 padding-4 " >
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2 w_mob "> <?php echo $gawal; ?>    </h6>
                    </div>
                    <div class="col-md-6 col-sm-6  no-padding">
                        <input type="text" name="w_mob" id="w_mob" onkeyup="get_length($(this).val(),'hint_mob');" maxlength="10"
                               onkeypress="validate_number(event)"
                            <?php if($wakala_type !=1){
                                //echo ' disabled="disabled"';
                                } ?>
                               data-validation="!!required" value="<?php echo $w_mob;?>"
                               class="form-control input_style_2">
                        <small  id="hint_mob" class="myspan"  style="color: red;"> </small>
                    </div>
                </div>





                <div class="col_md_20 col-sm-6 padding-4 " >
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">المدينة</h6>
                    </div>

                    <div class="col-md-6 col-sm-6  no-padding">
                        <select id="city_id_fk" name="k_city"
                                onchange="getAhai($(this).val());"  class="form-control input_style_2" data-validation="!!required">
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
                </div>






                <div class="col_md_20 col-sm-6 padding-4 " >
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">الحي</h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding">
                        <select id="hai_id_fk" name="k_hai" disabled="disabled"  class="form-control input_style_2">
                            <option value="">إختر</option>
                            <?php if(isset($k_hai) && !empty($k_hai)){
                                foreach ($ahais as $hay){
                                    $select ='';  if($hay->id == $k_hai){$select = 'selected';}?>
                                    <option <?= $select?> value="<?=$hay->id ?>"><?=$hay->name ?></option>
                                <?php } } ?>
                        </select>
                    </div>
                </div>



                <div class="col_md_25 col-sm-6 padding-4 " >
                    <div class="col-md-5 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">العنوان الوطني </h6>
                    </div>
                    <div class="col-md-7 col-sm-6  no-padding">
                        <input type="text" name="k_addres" id="k_addres"
                               data-validation="!!required" value=" <?php echo $k_addres;?>"
                               class="form-control input_style_2">
                    </div>
                </div>

                <div class="col_md_35 col-sm-6 padding-4 company"   style="display:<?php echo $ddisplay; ?>;">
                    <div class="col-md-3 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">التخصص </h6>
                    </div>
                    <div class="col-md-9 col-sm-6  no-padding">
                        <select name="k_specialize_fk" class="form-control input_style_2" id="k_specialize_fk" data-validation="!!required">
                            <option value="0">غير محدد </option>
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
                </div>


                <div class="col_md_20 col-sm-6 padding-4 company"   style="display:<?php echo $ddisplay; ?>;">
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">الحياة العملية  </h6>
                    </div>
                    <div class="col-md-6 col-sm-6  no-padding">
                        <select name="work_id_fk" class="form-control input_style_2" id="work_id_fk" onchange="change_work_status($(this).val())" data-validation="!!required">
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
                </div>





                <div class="col_md_30 col-sm-6 padding-4 company"   style="display:<?php echo $ddisplay; ?>;">
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">المهنة </h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding">
                        <select name="k_job_fk" id="k_job_fk"
                            <?php if($work_id_fk ==0){echo ' disabled="disabled"';} ?>
                                class="form-control input_style_2"
                                aria-!!required="true" >
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
                </div>








                <div class="col_md_50 col-sm-6 padding-4 company"   style="display:<?php echo $ddisplay; ?>;">
                    <div class="col-md-3 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">جهة العمل </h6>
                    </div>
                    <div class="col-md-9 col-sm-6  no-padding">
                        <input type="text" name="k_job_place"
                            <?php if($work_id_fk ==0){echo ' disabled="disabled"';} ?>
                               id="k_job_place" class="form-control input_style_2" onchange="change_halet_kafel($(this).val())"
                               value="<?php echo $k_job_place;?>"  data-validation-has-keyup-event="true" >

                    </div>
                </div>





                <div class="col_md_35 col-sm-6 padding-4 member"  style="">
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">نشاط المؤسسة   </h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding ">
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
                </div>

                <div class="clearfix"></div>
                <!---------------------------------------   -------------------------------------------------------------------------------------->

                <div class="col_md_20 col-sm-6 padding-4 member"  style="">
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">الجوال  </h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding">
                        <input type="text" name="company_gawal" id="company_gawal"  maxlength="10"  class="form-control input_style_2" onchange=""value="<?php echo $company_gawal ;?>"  data-validation-has-keyup-event="true" >
                    </div>
                </div>

                <div class="col_md_20 col-sm-6 padding-4 member"  style="">
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">الهاتف  </h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding">
                        <input type="text" name="company_phone" id="company_phone" maxlength="10"  class="form-control input_style_2" onchange=""value="<?php echo $company_phone ;?>"  data-validation-has-keyup-event="true" >
                    </div>
                </div>

                <div class="col_md_25 col-sm-6 padding-4 member"  style="">
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">الفاكس  </h6>
                    </div>

                    <div class="col-md-8 col-sm-6  no-padding">
                        <input type="text" name="company_fax" id="company_fax" maxlength="10"  class="form-control input_style_2" onchange=""value="<?php echo $company_fax ;?>"  data-validation-has-keyup-event="true" >
                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------->

                <div class="col_md_50 col-sm-6 padding-4 ">
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">الطريقة المناسبة للمراسلة</h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding">
                        <select id="k_message_method" name="k_message_method" onchange="change_method_kafel($(this).val())"
                                class="form-control input_style_2" data-validation="!!required">

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
                </div>



                <div class="col_md_30 col-sm-6 padding-4 ">
                    <div class="col-md-5 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">البريد الإلكتروني</h6>
                    </div>
                    <div class="col-md-7 col-sm-6  no-padding">
                        <input type="email" name="k_email" id="k_email" data-validation="email" value="<?php echo $k_email;?>"
                               class="form-control input_style_2"
                               data-validation-has-keyup-event="true">
                    </div>
                </div>





                <div class="col_md_20 col-sm-6 padding-4 ">
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">صندوق بريد</h6>
                    </div>
                    <div class="col-md-6 col-sm-6  no-padding">
                        <input type="text" name="k_barid_box"  id="k_barid_box" class="form-control input_style_2"
                               value="<?php echo $k_barid_box;?>"  data-validation-has-keyup-event="true" >
                    </div>
                </div>
                <div class="col_md_20 col-sm-6 padding-4 ">
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">رمز بريدي</h6>
                    </div>
                    <div class="col-md-6 col-sm-6  no-padding">
                        <input type="text" name="k_bardid_code"  id="k_bardid_code"   onkeypress="validate_number(event)" class="form-control input_style_2"
                               value="<?php echo $k_bardid_code;?>"
                               data-validation-has-keyup-event="true" >
                    </div>
                </div>


                <div class="col_md_30 col-sm-6 padding-4 ">
                    <div class="col-md-8 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">التواصل عن طريق رسائل الجوال </h6>
                    </div>
                    <div class="col-md-4 col-sm-6  no-padding">
                        <select id="k_message_mob" name="k_message_mob"
                                class="form-control input_style_2" data-validation="!!required">
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
                </div>


                <div class="col_md_30 col-sm-6 padding-4 ">
                    <div class="col-md-5 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">وقت التواصل </h6>
                    </div>
                    <div class="col-md-7 col-sm-6  no-padding">
                        <input placeholder="إدخل البيانات " id="m12h" type="text" class="form-control half"
                               data-validation="!!required"
                               name="right_time_from" value="<?php echo $right_time_from; ?>" >


                        <input placeholder="إدخل البيانات " id="m13h" class="form-control half input-style"
                               type="text" data-validation="!!required"
                               name="right_time_to" value="<?php echo $right_time_to;?>" >
                    </div>
                </div>



                <div class="col_md_20 col-sm-6 padding-4 ">
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">حالة الكافل</h6>
                    </div>
                    <div class="col-md-6 col-sm-6  no-padding">
                        <select id="halat_kafel_id"  class="form-control input_style_2" onchange="change_halet_kafel($(this).val())"
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
                <div class="col_md_30 col-sm-6 padding-4 ">
                    <div class="col-md-4 col-sm-6  no-padding ">

                        <h6 class=" label_title_2">السبب </h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding">
                        <select id="reasons_stop_id_fk"  class="form-control input_style_2"
                            <?php if($halat_kafel_id !=''){ if($halat_kafel_id != 8){ echo 'disabled="disabled"'; }}?>
                                aria-!!required="true" name="reasons_stop_id_fk">
                            <option value="">إختر</option>
                            <?php
                            if(isset($reasons_stop)&&!empty($reasons_stop)) {
                                foreach($reasons_stop as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"

                                        <?php if(!empty($reasons_stop_id_fk)){
                                            if($row->id_setting==$reasons_stop_id_fk){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>






                <div class="col_md_30 col-sm-6 padding-4 ">
                    <div class="col-md-3 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">الصورة</h6>
                    </div>
                    <div class="col-md-9 col-sm-6  no-padding">
                        <input type="file" name="person_img"  class="form-control input_style_2 valid" id="person_img">
                        <?php if(!empty($person_img)){?>
                            <a  data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                                onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/images/<?php echo $person_img;?>');">
                                <i class="fa fa-eye"></i>
                            </a>
                        <?php  } ?>
                    </div>
                </div>





                <div class="col_md_40 col-sm-6 padding-4 ">
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">ملاحظات</h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding">
                        <input type="text" name="k_notes" class="form-control input_style_2"  value="<?=$k_notes?>" />
                    </div>
                </div>










                <div class="form-group col-md-4 col-sm-6 padding-4"></div>

                <div class="form-group col-md-4 col-sm-6 padding-4">
                    <br /><br />
                    <button type="submit" id="save" name="add" value="add"
                            class="btn btn-add">
                        <span><i class="fa fa-floppy-o"></i></span> حفظ
                    </button>
                </div>
                <div class="form-group col-md-4 col-sm-6 padding-4"></div>



                <?php echo form_close()?>
            </div>
        </div>
    </div>





    <!------------------------------------------------------------------>
    <?php  $this->load->view('admin/all_Finance_resource_views/sponsors/sidebar_kafel_data');?>
    <!------ table -------->

</div>
<?php 
/*
echo '<pre>';
print_r($records);*/

 if(isset($records) &&!empty($records)) { ?>
    <div class="col-xs-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات الكافل</h3>
            </div>
            <div class="panel-body"><br>
                <div class="col-md-12 no-padding">

                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="info">
                            <th class="text-center">م</th>
                            <th>كود الكافل</th>
                            <th class="text-center">إسم الكافل</th>
                            <th class="text-center">رقم جوال الكافل</th>
                            <th>رقم الهوية</th>

                            <th>حالة الكافل</th>
                            <th>إستكمال البيانات</th>
                            <th>التفاصيل</th>
                            <th>المرفقات</th>
                            <th class="text-center">الاجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $a = 1;
                        if (isset($records) && !empty($records)) {
                            foreach ($records as $record) {

                                ?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><? echo $record->k_num; ?></td>
                                    <td><? echo $record->k_mob; ?></td>
                                    <td><? echo $record->k_name; ?></td>
                                    <td><? echo $record->k_national_num; ?></td>

                                    <td><?php  if (!empty($record->kafel_status)) {
                                            echo $record->kafel_status['title'];
                                        } else {
                                            echo 'غير محدد';
                                        } ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger">اضافه</button>
                                            <button type="button" class="btn btn-danger dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a target="_blank"
                                                       href="<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/addKfala_data/<?php echo $record->id; ?>">
                                                       بيانات
                                                        الكفالة </a></li>
                                            </ul>
                                        </div>


                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                style="padding: 6px 12px;"
                                                data-target="#myModal<?php echo $record->id; ?>">التفاصيل
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal"
                                                style="padding: 6px 12px;"
                                                data-target="#myModal_attach<?php echo $record->id; ?>">إضافة مرفق
                                        </button>
                                    </td>

                                    <td>
                                        <a href="<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/updateSponsor_maindata/<?php echo $record->id; ?>"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                        <a onclick="$('#adele').attr('href', '<?= base_url() . "all_Finance_resource/sponsors/Sponsor/delete_sponsor/" . $record->id ?>');"
                                           data-toggle="modal" data-target="#modal-delete"
                                           title="حذف"> <i class="fa fa-trash"
                                                           aria-hidden="true"></i> </a>

                                        <a href="<?php echo base_url('all_Finance_resource/sponsors/Sponsor/print_kafel_details') . '/' . $record->id ?>"
                                           target="_blank">
                                            <i class="fa fa-print" aria-hidden="true"></i> </a>

                                        <a href="<?php echo base_url('all_Finance_resource/sponsors/Sponsor/print_card') . '/' . $record->id ?>"
                                           target="_blank">
                                            <i style="background-color: #0a568c" class="fa fa-print"
                                               aria-hidden="true"></i> </a>


                                    </td>

                                </tr>
                                <?php
                                $a++;
                            }
                        } else { ?>
                            <td colspan="6">
                                <div style="color: red; font-size: large;">لم يتم اضافة كفلاء !!</div>
                            </td>
                        <?php }
                        ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>


    <?php
    $a = 1;


    foreach ($records as $record) { ?>
        <div class="modal fade" id="myModal<?php echo $record->id; ?>" role="dialog">
            <div class="modal-dialog" style="width: 96%">

                <div class="modal-content">
                    <div class="modal-body">
                        <div class="print_forma col-xs-12 no-padding">
                            <div class="col-sm-9">
                                <div class="piece-box" style="margin-bottom: 0;">

                                    <table class="table table-bordered" style="margin-top:35px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 15%"> حالة الكفالة</td>
                                            <td class="text-center" style="width: 20%"> رقم الكافل</td>
                                            <td class="text-center" style="width: 25%"> إسم الكافل</td>
                                            <td class="text-center" style="width: 15%"> الجنس</td>
                                            <td class="text-center" style="width: 20%"> فئة الكافل</td>

                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"><?php  if(!empty($fe2a_type_arr[$record->k_status])){
                                                    echo $fe2a_type_arr[$record->k_status]; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php   if(!empty($record->k_num)){
                                                    echo $record->k_num; }else{ echo'غيرمحدد'; } ?></td>
                                            <td class="text-center"><?php if(!empty($record->k_name)){
                                                    echo$record->k_name; }else{ echo'غيرمحدد'; } ?></td>
                                            <td class="text-center"><?php  if(!empty($gender_data[$record->k_gender_fk])){
                                                    echo $gender_data[$record->k_gender_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($f2a[$record->fe2a_type])){
                                                    echo$f2a[$record->fe2a_type]; }else{ echo'غيرمحدد';}?></td>

                                        </tr>
                                    </table>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">

                                            <td class="text-center" style="width: 20%"> الجنسية </td>
                                            <td class="text-center" style="width: 20%"> نوع الهوية</td>
                                            <td class="text-center" style="width: 20%">رقم الهوية(10اراقام)</td>
                                            <td class="text-center" style="width: 20%"> مصدر الهوية </td>
                                            <td class="text-center" style="width: 20%"> هل يوجد وكاله </td>
                                        </tr>
                                        <tr class="open_green">

                                            <td class="text-center"><?php  if(!empty($nationality[$record->k_nationality_fk])){
                                                    echo $nationality[$record->k_nationality_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"> <?php  if(!empty($type_card[$record->k_national_type])){
                                                    echo $type_card[$record->k_national_type]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->k_national_num)){
                                                    echo $record->k_national_num; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($dest_card[$record->k_national_place])){
                                                    echo $dest_card[$record->k_national_place]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php if($record->wakala_type==1)echo 'نعم';else echo 'لا'; ?>
                                                    </td>
                                        </tr>
                                    </table>



                                    <!---------------------------------------------------->
                                    <?php if($record->wakala_type==1){?>
                                        <?php
                                        if($record->fe2a_type==1)
                                        {
                                            $title="اسم الوكيل";
                                            $desc="صفته";
                                            $num="رقم هويه الوكيل";
                                            $gawal="جوال الوكيل";

                                        }else{
                                            $title="اسم المسئول";
                                            $desc="صفته";
                                            $num="رقم هويه المسئول";
                                            $gawal="جوال المسئول";
                                        }
?>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 15%"><?php echo $title;?></td>
                                            <td class="text-center" style="width: 20%"> <?php echo $desc;?> </td>
                                            <td class="text-center" style="width: 15%"><?php echo $num;?></td>
                                            <td class="text-center" style="width: 25%"><?php echo $gawal;?></td>

                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"><?php  if(!empty($record->w_name)){
                                                    echo $record->w_name; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->desc)){
                                                    echo $record->desc; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->w_national_num)){
                                                    echo $record->w_national_num; }else{ echo'غيرمحدد';}?></td>

                                            <td class="text-center"><?php  if(!empty($record->w_mob)){
                                                    echo $record->w_mob; }else{ echo'غيرمحدد';}?></td>
                                        </tr>
                                    </table>
            <?php } ?>



                                    <!------------------------------------------------->
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 20%"> المدينه</td>
                                            <td class="text-center" style="width: 20%"> العنوان </td>
                                            <td class="text-center" style="width: 20%"> المهنة </td>
                                            <td class="text-center" style="width: 20%"> جهة العمل </td>
                                            <td class="text-center" style="width: 20%"> التحصص </td>

                                        </tr>

                                        <tr class="open_green">
                                            <td class="text-center"><?php if(!empty($cities[$record->k_city])){
                                                    echo $cities[$record->k_city]; }else{ echo 'غير محدد';} ?></td>
                                            <td class="text-center"><?php  if(!empty($record->k_addres)){
                                                    echo $record->k_addres; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"> <?php  if(!empty($job_role[$record->k_job_fk])){
                                                    echo $job_role[$record->k_job_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->k_job_place)){
                                                    echo $record->k_job_place; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($specialize[$record->k_specialize_fk])){
                                                    echo $specialize[$record->k_specialize_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                        </tr>
                                    </table>
                                    <?php
                                    if($record->fe2a_type==2){?>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 15%">نشاط المؤسسة</td>

                                            <td class="text-center" style="width: 15%">رقم هاتف المؤسه </td>
                                            <td class="text-center" style="width: 15%">الجوال </td>
                                            <td class="text-center" style="width: 15%">فاكس المؤسسه </td>

                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"><?php  if(!empty($activity[$record->k_activity_fk])){
                                                    echo $activity[$record->k_activity_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>

                                            <td class="text-center"><?php  if(!empty($record->company_phone)){
                                                    echo $record->company_phone; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->company_gawal)){
                                                    echo $record->company_gawal; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->company_fax)){
                                                    echo $record->company_fax; }else{ echo'غيرمحدد';}?></td>

                                        </tr>
                                    </table>
                                        <?php } ?>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">


                                            <td class="text-center" style="width: 25%">صندوق بريد</td>
                                            <td class="text-center" style="width: 25%"> رمز بريدي</td>
                                            <td class="text-center" style="width: 20%">الفاكس</td>
                                        </tr>
                                        <tr class="open_green">


                                            <td class="text-center"><?php  if(!empty($record->k_barid_box)){
                                                    echo $record->k_barid_box; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->k_bardid_code)){
                                                    echo $record->k_bardid_code;
                                                }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($record->k_fax)){
                                                    echo $record->k_fax; }else{ echo'غيرمحدد';}?></td>
                                        </tr>
                                    </table>


                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 20%"> الجوال(10 أرقام)</td>
                                            <td class="text-center" style="width: 20%">البريد الالكتروني </td>
                                            <td class="text-center" style="width: 20%">الوقت المناسب للتواصل </td>
                                            <td class="text-center" style="width: 20%">حاله الكافل </td>
                                            <td class="text-center" style="width: 20%">السبب</td>

                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"><?php  if(!empty($record->k_mob)){
                                                    echo $record->k_mob;
                                                }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($record->k_email)){
                                                    echo $record->k_email; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->right_time_from)){
                                                    echo $record->right_time_from; }else{ echo'غيرمحدد';}?> : <?php  if(!empty($record->right_time_to)){
                                                    echo $record->right_time_to; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->halt)){
                                                    echo $record->halt; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->reason)){
                                                    echo $record->reason; }else{ echo'غيرمحدد';}?></td>

                                        </tr>
                                    </table>
                                    <!--
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 20%"> توريد الكفالة</td>
                                            <td class="text-center" style="width: 30%"> البنك </td>
                                            <td class="text-center" style="width: 20%"> رقم الحساب </td>
                                            <td class="text-center" style="width: 30%"> الفرع </td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"><?php  if(!empty($pay_method_arr[$record->pay_method])){
                                                    echo $pay_method_arr[$record->pay_method];
                                                }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($record->banks_settings_title)){
                                                    echo $record->banks_settings_title; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->bank_account_num)){
                                                    echo $record->bank_account_num;
                                                }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($record->bank_branch)){
                                                    echo $record->bank_branch; }else{ echo'غيرمحدد';}?></td>
                                        </tr>
                                    </table>-->
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 30%">الطريقه المناسبة للمراسلة</td>
                                            <td class="text-center" style="width: 45%">هل ترغب المراسلة عن طريق رسائل الجوال</td>
                                            <td class="text-center" style="width: 25%"> ملاحظات </td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"><?php  if(!empty($k_message_method_arr[$record->k_message_method])){
                                                    echo $k_message_method_arr[$record->k_message_method];
                                                }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($k_message_mob_arr[$record->k_message_mob])){
                                                    echo $k_message_mob_arr[$record->k_message_mob]; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->k_message_method)){
                                                    echo $record->k_message_method;
                                                }else{ echo'غيرمحدد'; }?></td>
                                        </tr>
                                    </table>
                                </div>


                            </div>
                            <div class="col-sm-3">
                                <div class="piece-box">
                                    <img src="<?php echo base_url();?>uploads/images/<?php echo$record-> person_img;?>" class="center-!block" alt="" style="width: 150px; padding: 10px">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td style="width: 50%">إسم الكافل</td>
                                            <td style="width: 50%"><?php if(!empty($record->k_name)){
                                                    echo$record->k_name; }else{ echo'غيرمحدد'; } ?></td>
                                        </tr>
                                        <tr>
                                            <td>رقم الكافل</td>
                                            <td><?php   if(!empty($record->k_num)){
                                                    echo $record->k_num; }else{ echo'غيرمحدد'; } ?></td>
                                        </tr>
                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer" style="border: 0;">
                        <button type="button" class="btn btn-default btn-close-model" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>

            </div>
        </div>









        <div class="modal fade" id="myModal_attach<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width: 50%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
                    </div>
                    <?php    echo form_open_multipart('all_Finance_resource/sponsors/Sponsor/add_attach');?>

                    <div class="modal-body">
                        <button type="button" value="" id="" onclick="add_row()"
                                class="btn btn-success btn-next"/><i class="fa fa-plus"></i> إضافة </button><br><br>
                        <table class="table table-striped table-bordered"   <?php if(empty($record->Images)){ ?> style="display: !block" <?php } ?> id="mytable">
                            <thead>
                            <tr class="info">
                                <th>م</th>
                                <th>إسم المرفق</th>
                                <th>الصورة</th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody id="resultTable">
                            <?php if(!empty($record->Images)){ $a=1;foreach ($record->Images as $one_img){ ?>
                                <tr id="<?php echo$one_img->id; ?>">
                                    <td><?php echo$a; ?></td>
                                    <td><?php echo$one_img->title_setting; ?></td>
                                    <td><img src="<?php echo base_url(); ?>uploads/images/<?php echo$one_img->img; ?>"  style="width: 150px" alt=""></td>
                                    <td><a  onclick="DeleteImage(<?php echo$one_img->id; ?>);"
                                        <i class="fa fa-trash" aria-hidden="true"></i> </a></td>
                                </tr>
                                <?php $a++;} } ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer" style="display: inline-!block;width: 100%">
                        <input type="hidden" name="person_id" value="<?php echo $record->id; ?>">
                        <button type="button" class="btn btn-danger"  style="float: left" data-dismiss="modal">إغلاق</button>
                        <button type="submit"   id="saves"  name="add" value="add" class="btn btn-success"
                                style="float: left;display: !block;padding: 6px 12px;" >حفظ</button>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>

    <?php  }}
?>



<!----- end table ------>
<script type="text/javascript">
    jQuery(function($){
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
-->
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script>
<!--
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
-->

<script>
    function getAhai(city_id){
        if(city_id != ''){
            var dataString='city_id='+city_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getAhai',
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
                    $('#hai_id_fk').selectpicker("refresh");
                }
            });
        }else if(city_id == '' ) {

            $('#hai_id_fk').removeClass("selectpicker");

            $("#hai_id_fk").val('');
            document.getElementById("hai_id_fk").removeAttribute("data-show-subtext", "true");
            document.getElementById("hai_id_fk").removeAttribute("data-live-search", "true");
            document.getElementById("hai_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("hai_id_fk").removeAttribute("data-validation", "!!required");
            $('#hai_id_fk').selectpicker("refresh");
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
            document.getElementById("wakel_relationship").setAttribute("data-validation", "!!required");
            document.getElementById("w_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("w_national_num").setAttribute("data-validation", "!!required");
            document.getElementById("w_mob").removeAttribute("disabled", "disabled");
            document.getElementById("w_mob").setAttribute("data-validation", "!!required");

        //    $('#wakel_relationship').selectpicker("refresh");
        } else {

            document.getElementById("w_name").setAttribute("disabled", "disabled");
            document.getElementById("w_name").value='';
            document.getElementById("wakel_relationship").setAttribute("disabled", "disabled");
            document.getElementById("wakel_relationship").value='';
            document.getElementById("w_national_num").setAttribute("disabled", "disabled");
            document.getElementById("w_national_num").value='';
            document.getElementById("w_mob").setAttribute("disabled", "disabled");
            document.getElementById("w_mob").value='';

           // $('#wakel_relationship').selectpicker("refresh");
        }
    }
</script>






<script>

  function GetF2a(f2a_type) {
        var f2a = $('option:selected',f2a_type).attr("data-specialize");

//alert(f2a);
        if( f2a ==1 ){
         
            $('.kafel').text('اسم الكافل ');

            $('.w_name').text('اسم الوكيل');
            $('.wakel_relationship').text('صلته');
            $('.w_national_num').text('رقم هويته');
            $('.w_mob').text('جوال الوكيل');


        document.getElementById("k_mob").removeAttribute("disabled", "disabled");
        
                     $.ajax({
               type:'post',
        url:"<?php echo base_url();?>all_Finance_resource/sponsors/Sponsor/fill_select",
        data:{f2a:f2a},
        success:function(d){
        $('#wakel_relationship').html(d);
        }
        
});




 document.getElementById("k_specialize_fk").removeAttribute("disabled", "disabled");
									

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
            
            $('.kafel').text('اسم الكافل (الجهه)');


		   document.getElementById("k_specialize_fk").setAttribute("disabled", "disabled");

                                   $('#k_specialize_fk').val('');






        document.getElementById("k_mob").setAttribute("disabled", "disabled");
        
                     $.ajax({
               type:'post',
        url:"<?php echo base_url();?>all_Finance_resource/sponsors/Sponsor/fill_select",
        data:{f2a:f2a},
        success:function(d){
        $('#wakel_relationship').html(d);
        }
        
});





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

/*
    function change_method_kafel(value) {
        if(value ==1 || value == 3){
            document.getElementById("k_barid_box").setAttribute("disabled", "disabled");
            document.getElementById("k_barid_box").value='';
            document.getElementById("k_bardid_code").setAttribute("disabled", "disabled");
            document.getElementById("k_bardid_code").value='';
            document.getElementById("k_email").removeAttribute("disabled", "disabled");

        }  else if(value ==2){
            document.getElementById("k_barid_box").removeAttribute("disabled", "disabled");
            document.getElementById("k_barid_box").value='';
            document.getElementById("k_bardid_code").removeAttribute("disabled", "disabled");
            document.getElementById("k_bardid_code").value='';
            document.getElementById("k_email").setAttribute("disabled", "disabled");
            document.getElementById("k_email").value='';
        }else{
            document.getElementById("reasons_stop_id_fk").removeAttribute("disabled", "disabled");
        }

    }
*/


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
            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/delete_attach/' + valu ,
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