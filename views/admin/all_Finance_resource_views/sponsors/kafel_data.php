<style type="text/css">
.top-label {
    font-size: 13px;
    background-color: #428bca !important;
    border: 2px solid #428bca !important;
    text-shadow:  !block !important;
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
    display: inline- !block;
    width: 100%;
}

.piece-heading {
    background-color: #9bbb59;
    display: inline- !block;
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
    display: inline- !block;
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

.dropup .dropdown-menu,
.navbar-fixed-bottom .dropdown .dropdown-menu {
    top: 100% !important;
    bottom: auto !important;
    margin-bottom: 1px !important;
}

/**********************************************************/

@media (min-width: 992px) {
    .col_md_10 {
        width: 10%;
        float: right;
    }

    .col_md_15 {
        width: 15%;
        float: right;
    }

    . {
        width: 20%;
        float: right;
    }

    . {
        width: 25%;
        float: right;
    }

    . {
        width: 30%;
        float: right;
    }

    . {
        width: 35%;
        float: right;
    }

    .col_md_40 {
        width: 40%;
        float: right;
    }

    .col_md_45 {
        width: 45%;
        float: right;
    }

    . {
        width: 50%;
        float: right;
    }

    . {
        width: 55%;
        float: right;
    }


    .col_md_60 {
        width: 60%;
        float: right;
    }

    .col_md_70 {
        width: 70%;
        float: right;
    }

    .col_md_75 {
        width: 75%;
        float: right;
    }

    .col_md_80 {
        width: 80%;
        float: right;
    }

    .col_md_85 {
        width: 85%;
        float: right;
    }

    .col_md_90 {
        width: 90%;
        float: right;
    }

    .col_md_95 {
        width: 95%;
        float: right;
    }

    .col_md_100 {
        width: 100%;
        float: right;
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

. {
    border-radius: 0px;
    border-right: transparent;
    width: 100%;
}




button[type=submit] {
    width: auto !important;

    border-color: transparent !important;
    border-radius: 0 !important;

    padding: 0px 12px !important;
}

.btn-success {
    background-color: #3c990b !important;
    border-color: #12891b !important;
}

.btn-warning {
    background-color: #FFB61E !important;
    border-color: #E1A21E !important;
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
    $k_nationality_name= $result->k_nationality_name;

    $k_national_type= $result->k_national_type;
    $k_national_num= $result->k_national_num;
    $k_national_place= $result->k_national_place;
    $k_national_place_name= $result->k_national_place_name;

    $k_city= $result->k_city;
    $city_name= $result->city_name;

    $k_addres= $result->k_addres;
    $k_job_fk =$result->k_job_fk;
    $k_job_name =$result->k_job_name;

    $k_job_place =$result->k_job_place;
    $k_specialize_fk =$result->k_specialize_fk;
    $k_specialize_name =$result->k_specialize_name;

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
    $social_status_name =$result->social_status_name ;

    $reasons_stop_id_fk = $result->reasons_stop_id_fk ;
    $reasons_stop_name = $result->reasons_stop_name ;

    $halat_kafel_id = $result->halat_kafel_id ;
    $w_name =  $result->w_name;
    $w_national_num = $result->w_national_num;
    $w_mob =  $result->w_mob;
    $k_hai = $result->k_hai;
    $hai_name = $result->hai_name;

    $wakala_type = $result->wakala_type;
    $wakel_relationship = $result->wakel_relationship;
    $wakel_relationship_name = $result->wakel_relationship_name;

    $work_id_fk = $result->work_id_fk;
    $company_fax = $result->company_fax;
    $company_phone= $result->company_phone;
    $company_gawal= $result->company_gawal;



    $out['form']='all_Finance_resource/sponsors/Sponsor/addSponsor_maindata/'.$this->uri->segment(5);
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

    $k_nationality_name=$social_status_name=$k_national_place_name=$wakel_relationship_name=$city_name=$hai_name=$k_specialize_name=$k_job_name=$reasons_stop_name='';

    $out['form']='all_Finance_resource/sponsors/Sponsor/addSponsor_maindata';
    

}

if($res_fe2a== 1 || $fe2a_type == '' )
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
/*
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
*/
?>
<!--

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

-->
<?php
 if($res_fe2a==""){
 $display_company='block';
 $display_member='none';

    ?>

<style>
.company {
    display: block;
}

.member {
    display: none;
}
</style>
<?php } elseif($res_fe2a ==1 ){
     $display_company='block';
     $display_member='none';
    ?>

<style>
.company {
    display: block;
}

.member {
    display: none;
}
</style>

<?php }  elseif($res_fe2a== 2){
     $display_company='none';
     $display_member='block';?>

<style>
.company {
    display: none;
}

.member {
    display: block;
}
</style>

<?php } ?>



<div class="col-sm-12 no-padding ">
   <!-- <div class="col-sm-10 "> -->
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?=$page_title?></h3>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>

                <input type="hidden" id="title_id">
                <input type="hidden" id="title_text">


                <div class="form-group  col-sm-1 padding-4">
                    <label class=" label">رقم الكافل</label>
                    <input type="text" name="k_num" id="k_num" <?php
                                if(!empty($k_num)){?> value="<?=$k_num?>" readonly <?php }else{
                                    if(empty($last_id)){ ?> 
                        <?php }elseif($last_id !='' && $last_id>0){?> value="<?=$last_id?>" readonly <?php } }?>
                        value="<?php echo $k_num;?>" class="form-control " data-validation-has-keyup-event="true">

                </div>

                <div class="form-group col-sm-2 padding-4">

                    <label class=" label">فئة الكافل</label>
                    <select id="fe2a_type" data-validation="required" class="form-control " name="fe2a_type"
                        onchange="GetF2a(this)">
                        <option value="">إختر</option>

                        <?php
                                if(!empty($f2a) && isset($f2a)){
                                    foreach($f2a as $value){
                                        ?>
                        <option value="<?php echo $value->id;?>" data-specialize="<?php echo $value->specialize_fk;?>" <?php
                                            if(!empty($fe2a_type)){
                                                if($value->id ==$fe2a_type){
                                                    echo 'selected'; }}  ?>> <?php echo $value->title;?></option>
                        <?php
                                    }}
                                ?>
                    </select>

                </div>


                <div class="form-group col-sm-4 padding-4">

                    <label class=" label">اسم الكافل </label>
                    <input type="text" name="k_name" id="k_name" value="<?php echo $k_name;?>" class="form-control "
                        data-validation="required" >

                </div>

                <div class="form-group col-sm-1 padding-4 company" style="display:<?=$display_company?>;">
                    <label class=" label"> الجنس</label>
                    <select name="k_gender_fk" id="k_gender_fk"  class="form-control " >
                        <option value="">إختر</option>
                        <?php
                                if(isset($gender_data)&&!empty($gender_data)) {
                                    foreach($gender_data as $row){?>
                        <option value="<?php echo $row->id_setting;?>" <?php if(!empty($k_gender_fk)){
                                                if($row->id_setting==$k_gender_fk){ echo 'selected'; }
                                            } ?>> <?php echo $row->title_setting;?></option>
                        <?php
                                    }
                                }
                                ?>
                    </select>

                </div>

                <div class=" form-group col-sm-2 padding-4  company" style="display:<?=$display_company?>;">

                    <label class=" label"> الجنسيه</label>
                 
                        <input type="text" class="form-control " id="k_nationality_name"
                            style="width: 81%;float: right;" readonly value="<?php echo $k_nationality_name ?>" />
                        <input type="hidden" id="k_nationality_fk" name="k_nationality_fk"
                            value="<?php echo $k_nationality_fk ?>">
                        <button type="button" class="btn btn-success" onclick="$('#geha_input').hide();  $('#input_name').val('');
                            $('#title_text').val('k_nationality_name');
                            $('#title_id').val('k_nationality_fk');
                            $('#my_load_pop').modal('show');
                            show_pop(1,2,0,'الجنسيه')">
                            <i class="fa fa-plus"></i></button>

            
                   
                </div>



                <div class="form-group col-sm-2 padding-4  company" style="display:<?=$display_company?> ;">

                    <label class=" label">الحالة الاجتماعية </label>
                  
                        <input type="text" class="form-control " id="social_status_name"
                            style="width: 81%;float: right;" readonly  value="<?php echo $social_status_name ?>"/>
                        <input type="hidden" name="social_status_id_fk" id="social_status_id_fk"
                            value="<?php echo $social_status_id_fk ?>">
                        <button type="button" class="btn btn-success" onclick="$('#geha_input').hide(); $('#input_name').val('');
                             $('#title_text').val('social_status_name');
                            $('#title_id').val('social_status_id_fk');
                            $('#my_load_pop').modal('show');show_pop(2,11,0,'الحالة الاجتماعية')"><i
                                class="fa fa-plus"></i></button>
                        
                  
                </div>

                <div class="form-group col-sm-2 padding-4 company" style="display:<?=$display_company?>;">

                    <label class=" label">نوع الهوية </label>
                    <select id="k_national_type" class="form-control "
                        <?php if($social_status_id_fk==0 ||$social_status_id_fk==''){echo 'disabled' ; } ?>
                        name="k_national_type">
                        <option value="">إختر</option>
                        <?php
                                if(isset($type_card)&&!empty($type_card)) {
                                    foreach($type_card as $row){
                                        ?>
                        <option value="<?php echo $row->id_setting;?>" <?php if(!empty($k_national_type)){
                                                if($row->id_setting==$k_national_type){ echo 'selected'; }
                                            } ?>> <?php echo $row->title_setting;?></option>
                        <?php
                                    }
                                }
                                ?>
                    </select>


                </div>
                <div class="form-group col-sm-2 padding-4 company" style="display:<?=$display_company?>;">

                    <label class=" label">رقم الهويه <span class="span-allow"> (10ارقام) </span></label>
                    <input type="text" name="k_national_num" id="k_national_num"
                        <?php if($social_status_id_fk==0 ||$social_status_id_fk==''){echo 'disabled' ; } ?>
                        onkeyup="get_length($(this).val(),'hint');" maxlength="10"
                        <?php if($social_status_id_fk !=''){ if($social_status_id_fk == 0){ echo 'disabled="disabled"'; }}?>
                        value="<?php echo $k_national_num;?>" class="form-control "
                        data-validation-has-keyup-event="true" onkeypress="validate_number(event);">
                    <small id="hint" class="myspan" style="color: red;"> </small>

                </div>

                <div class="form-group col-sm-2 padding-4 company" style="display:<?=$display_company?>;">

                    <label class=" label"> مصدر الهوية</label>
                    
                        <input type="text" class="form-control" id="k_national_place_name"
                            style="width: 81%;float: right;" readonly value="<?php echo $k_national_place_name ?>" />
                        <input type="hidden" name="k_national_place" id="k_national_place_input"
                            value="<?php echo $k_national_place ?>">
                        <button class="btn btn-success" type="button" id="k_national_place" onclick="$('#geha_input').hide(); $('#input_name').val('');
                             $('#title_text').val('k_national_place_name');
                            $('#title_id').val('k_national_place_input');
                            $('#my_load_pop').modal('show');show_pop(2,4,0,'مصدر الهوية')"
                            <?php if($social_status_id_fk==0 ||$social_status_id_fk==''){echo 'disabled' ; } ?>><i
                                class="fa fa-plus"></i></button>

                  
                </div>

                <div class="form-group col-sm-2 padding-4 company" style="display:<?=$display_company?>;">

                    <label class=" label"> جوال الكافل </label>
                    <input type="text" maxlength="10" name="k_mob" id="k_mob"
                        <?php if($social_status_id_fk==0 ||$social_status_id_fk==''){echo 'disabled' ; } ?>
                        value="<?php echo $k_mob;?> "  value="" class="form-control ">

                </div>



                <div class="form-group col-sm-1 padding-4 company" style="display:<?=$display_company?>;">
                    <label class=" label"> يوجد وكالة؟ </label>
                    <select id="wakala_type" name="wakala_type" onchange="check_wakel_type($(this).val());"
                        class="form-control " >
                        <option value="">إختر</option>
                        <option value="1" <?php if($wakala_type==1)echo 'selected';?>>نعم</option>
                        <option value="2" <?php if($wakala_type==2)echo 'selected';?>>لا</option>
                    </select>

                </div>



                <div class="form-group col-sm-3 padding-4 ">

                    <label class=" label"><?php echo $title; ?> </label>
                    <input type="text" name="w_name" id="w_name" <?php
                                echo $wakala_type;
                                if($wakala_type != 1){
                                    echo ' disabled="disabled"';
                                } ?>  value="<?php echo $w_name;?>" class="form-control ">

                </div>


                <div class="form-group col-sm-2 padding-4 ">

                    <label class=" label wakel_relationship"> <?php echo $desc; ?> </label>

                    <input type="text" id="wakel_relationship_name" class="form-control "
                        style="width: 81%;float: right;" readonly value="<?php echo $wakel_relationship_name ?>" />
                    <input type="hidden" id="wakel_relationship_input" name="wakel_relationship"
                        value="<?php echo $wakel_relationship ?>">
                    <button type="button" class="btn btn-success" id="wakel_relationship" onclick="$('#geha_input').hide(); $('#input_name').val('');
                         $('#title_text').val('wakel_relationship_name');
                            $('#title_id').val('wakel_relationship_input');
                        $('#my_load_pop').modal('show');show_pop(3,34,1,$('.wakel_relationship').text())">
                        <i class="fa fa-plus"></i></button>
</div>


                <div class="form-group col-sm-2 padding-4 ">
                    <label class=" label w_national_num">رقم الهوية </label>
                    <input type="text" name="w_national_num" id="w_national_num"
                        onkeyup="get_length($(this).val(),'hint_num');" maxlength="10"
                        onkeypress="validate_number(event)" <?php if($wakala_type !=1){
                                     echo ' disabled="disabled"';
                                } ?>  value="<?php echo $w_national_num;?>"
                        class="form-control ">
                    <small id="hint_num" class="myspan" style="color: red;"> </small>

                </div>


                <div class="form-group col-sm-2 padding-4 ">
                    <label class=" label w_mob "> <?php echo $gawal; ?> </label>
                    <input type="text" name="w_mob" id="w_mob" onkeyup="get_length($(this).val(),'hint_mob');"
                        maxlength="10" onkeypress="validate_number(event)" <?php if($wakala_type !=1){
                                      echo ' disabled="disabled"';
                                } ?>  value="<?php echo $w_mob;?>" class="form-control ">
                    <small id="hint_mob" class="myspan" style="color: red;"> </small>

                </div>


                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> المدينه</label>
                    <input type="text" id="city_name" value="<?php echo $city_name ?>"
                        class="form-control "  style="width: 78%;float: right;"readonly>
                    <input type="hidden" name="k_city" id="city_id_fk"  value="<?php echo $k_city ?>" >
                    <button type="button" data-toggle="modal" data-target="#myModalInfo_city"
                        class="btn btn-success btn-next" style="" onclick="GetDiv_city('myDiv_city')">
                        <i class="fa fa-plus"></i></button>
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> الحي</label>
                    <input type="text" id="hai_name"  value="<?php echo $hai_name ?>" class="form-control " readonly>
                    <input type="hidden" name="k_hai" id="hai_id_fk" value="<?php echo $k_hai ?>" >
                </div>


                <div class="form-group col-sm-2 padding-4 ">

                    <label class=" label"> العنوان الوطني</label>
                    <input type="text" name="k_addres" id="k_addres" 
                        value=" <?php echo $k_addres;?>" class="form-control ">

                </div>

                <div class="form-group col-sm-3 padding-4 company" style="display:<?=$display_company?>;">
                    <label class=" label">التخصص </label>
                 
                        <input type="text" id="k_specialize_name" class="form-control" style="width: 88%;float: right;" readonly value="<?php echo $k_specialize_name ?>" />


                        <input type="hidden" name="k_specialize_fk" id="k_specialize_fk_input"
                            value="<?php echo $k_specialize_fk ?>">
                        <button class="btn btn-success" type="button" id="k_specialize_fk" onclick="$('#geha_input').hide(); $('#input_name').val('');
                             $('#title_text').val('k_specialize_name');
                            $('#title_id').val('k_specialize_fk_input');
                            $('#my_load_pop').modal('show');show_pop(2,7,0,'التخصص ')"><i
                                class="fa fa-plus"></i></button>
                   
                </div>


                <div class="form-group col-sm-2 padding-4 company" style="display:<?=$display_company?>;">

                    <label class=" label"> الحياة العملية </label>
                    <select name="work_id_fk" class="form-control " id="work_id_fk"
                        onchange="change_work_status($(this).val())" >
                        <option value="">اختر</option>
                        <?php
                                $works = array('لا', 'نعم');
                                foreach($works as $key=>$value){
                                    ?>
                        <option value="<?php echo $key;?>" <?php if(!empty($work_id_fk)){
                                            if($key==$work_id_fk){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option>
                        <?php
                                }
                                ?>
                    </select>


                </div>

                <div class="form-group col-sm-2 padding-4 company" style="display:<?=$display_company?>;">

                    <label class=" label"> المهنة </label>
                
                        <input type="text" class="form-control " id="k_job_name" style="width: 81%;float: right;"
                            readonly value="<?php echo $k_job_name ?>" />
                        <input type="hidden" name="k_job_fk" id="k_job_fk_input" value="<?php echo $k_job_fk ?>">
                        <button class="btn btn-success" type="button" id="k_job_fk" onclick="$('#geha_input').hide(); $('#input_name').val('');
                             $('#title_text').val('k_job_name');
                            $('#title_id').val('k_job_fk_input');
                            $('#my_load_pop').modal('show');show_pop(2,2,0,'المهنة ')"
                            <?php if($work_id_fk ==0){echo ' disabled="disabled"';} ?>><i
                                class="fa fa-plus"></i></button>
                   
                </div>


                <div class="form-group col-sm-2 padding-4 company" style="display:<?=$display_company?>;">

                    <label class=" label"> جهة العمل </label>
                    <input type="text" name="k_job_place" <?php if($work_id_fk ==0){echo ' disabled="disabled"';} ?>
                        id="k_job_place" class="form-control " onchange="change_halet_kafel($(this).val())"
                        value="<?php echo $k_job_place;?>" data-validation-has-keyup-event="true">


                </div>

               
                <div class="form-group col-sm-2 padding-4 member" style="">
                    <label class=" label"> نشاط المؤسسة </label>
                    <select name="k_activity_fk" class="form-control " id="k_activity_fk">
                        <option value="">اختر</option>
                        <?php
                                if(isset($activity)&&!empty($activity)) {
                                    foreach($activity as $row){?>
                        <option value="<?php echo $row->id_setting;?>" <?php if(!empty($k_activity_fk)){
                                                if($row->id_setting==$k_activity_fk){ echo 'selected'; }
                                            } ?>> <?php echo $row->title_setting;?></option>
                        <?php
                                    }
                                }
                                ?>
                    </select>
                </div>

                <!---------------------------------------   -------------------------------------------------------------------------------------->

                <div class="form-group col-sm-2 padding-4 member">

                    <label class=" label"> الجوال </label>
                    <input type="text" name="company_gawal" id="company_gawal" maxlength="10" class="form-control "
                        onchange="" value="<?php echo $company_gawal ;?>" data-validation-has-keyup-event="true">

                </div>

                <div class="form-group col-sm-2 padding-4 member">

                    <label class=" label"> الهاتف </label>
                    <input type="text" name="company_phone" id="company_phone" maxlength="10" class="form-control "
                        onchange="" value="<?php echo $company_phone ;?>" data-validation-has-keyup-event="true">

                </div>

                <div class="form-group col-sm-2 padding-4 member">

                    <label class=" label"> الفاكس </label>
                    <input type="text" name="company_fax" id="company_fax" maxlength="10" class="form-control "
                        onchange="" value="<?php echo $company_fax ;?>" data-validation-has-keyup-event="true">

                </div>
                <!------------------------------------------------------------------------------------------------->

                <div class="form-group col-sm-3 padding-4 ">

                    <label class=" label"> الطريقة المناسبة للمراسلة </label>
                    <select id="k_message_method" name="k_message_method" onchange="change_method_kafel($(this).val())"
                        class="form-control " >

                        <?php
                                $k_message_method_arr =array('إختر','ارغب في استلام البريدعن طريق البريد الالكتروني ','ارغب في استلام البريد عن طريق صندوق البريد ','لا ارغب في استلام البريد');
                                if(isset($k_message_method_arr)&&!empty($k_message_method_arr)) {
                                    foreach($k_message_method_arr as $key=>$value){
                                        ?>
                        <option value="<?php echo$key;?>" <?php if(!empty($k_message_method)){
                                                if($key == $k_message_method){ echo 'selected'; }
                                            } ?>> <?php echo $value;?></option>
                        <?php
                                    }
                                }
                                ?>
                    </select>

                </div>

                <div class="form-group col-sm-2 padding-4 ">

                    <label class=" label">البريد الإلكتروني </label>
                    <input type="email" name="k_email" id="k_email" data-validation="email"
                        value="<?php echo $k_email;?>" class="form-control " <?php if($k_message_method !=1){  
                                          echo ' disabled="disabled"';
                                           } ?> data-validation-has-keyup-event="true">

                </div>

                <div class="form-group col-sm-1 padding-4 ">

                    <label class=" label"> صندوق بريد </label>
                    <input type="text" name="k_barid_box" id="k_barid_box" class="form-control " <?php if($k_message_method !=2){   
                                     echo ' disabled="disabled"';
                                      } ?> value="<?php echo $k_barid_box;?>" data-validation-has-keyup-event="true">

                </div>
                <div class="form-group col-sm-1 padding-4 ">
                    <label class=" label"> رمز بريدي </label>
                    <input type="text" name="k_bardid_code" id="k_bardid_code" onkeypress="validate_number(event)"
                        class="form-control " value="<?php echo $k_bardid_code;?>"
                        <?php if($k_message_method !=2){   echo ' disabled="disabled"';} ?>
                        data-validation-has-keyup-event="true">

                </div>


                <div class="form-group col-sm-2 padding-4 ">

                    <label class=" label"> التواصل عن طريق رسائل الجوال </label>
                    <select id="k_message_mob" name="k_message_mob" class="form-control " >
                        <?php
                                $k_message_mob_arr =array('إختر','نعم','لا');
                                if(isset($k_message_mob_arr)&&!empty($k_message_mob_arr)) {
                                    foreach($k_message_mob_arr as $key=>$value){
                                        ?>
                        <option value="<?php echo$key;?>" <?php if(!empty($k_message_mob)){
                                                if($key == $k_message_mob){ echo 'selected'; }
                                            } ?>> <?php echo $value;?></option>
                        <?php
                                    }
                                }
                                ?>
                    </select>

                </div>


                <div class="form-group col-md-2  padding-4 ">

                    <label class=" label"> وقت التواصل </label>
                    <input placeholder="من " id="m12h" type="text" class="form-control half"
                         name="right_time_from" value="<?php echo $right_time_from; ?>">
                    <input placeholder="إلى " id="m13h" class="form-control half input-style" type="text"
                         name="right_time_to" value="<?php echo $right_time_to;?>">

                </div>



                <div class="form-group col-sm-1 padding-4 ">

                    <label class=" label"> حالة الكافل </label>
                    <select id="halat_kafel_id" class="form-control " onchange="change_halet_kafel($(this).val())"
                        name="halat_kafel_id" data-validation="required" data-validation-has-keyup-event="true">
                        <option value="">إختر</option>

                        <?php
                                if(isset($halat_kafel)&&!empty($halat_kafel)) {
                                    foreach($halat_kafel as $row){
                                        ?>
                        <option value="<?php echo $row->id;?>" <?php if(!empty($halat_kafel_id)){
                                                if($row->id==$halat_kafel_id){ echo 'selected'; }
                                            } ?>> <?php echo $row->title;?></option>
                        <?php
                                    }
                                }
                                ?>
                    </select>

                </div>
                <div class="form-group col-sm-3 padding-4 ">

                    <label class=" label"> السبب </label>
                   
                        <input type="text" class="form-control " id="reasons_stop_name" style="width: 88%;float: right;"
                            readonly value="<?php echo $reasons_stop_name ?>" />
                        <input type="hidden" name="reasons_stop_id_fk" id="reasons_stop_id_fk_input"
                            value="<?php echo $reasons_stop_id_fk ?>">
                        <button class="btn btn-success" type="button" id="reasons_stop_id_fk" onclick=" $('#geha_input').hide(); $('#input_name').val('');
                             $('#title_text').val('reasons_stop_name');
                            $('#title_id').val('reasons_stop_id_fk_input');
                            $('#my_load_pop').modal('show');show_pop(2,12,0,'السبب ')" <?php if($halat_kafel_id !=''){ if($halat_kafel_id != 10 ){ 
                                    echo 'disabled="disabled"'; }}?>><i class="fa fa-plus"></i></button>
                    
                </div>

                <div class="col-xs-12 text-center">
                 
                    <button type="submit" class="btn btn-labeled btn-add" id="save" name="add" value="save_data">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>

                    <button type="submit" class="btn btn-labeled btn-success" id="save" name="add"
                        value="addSponsor_maindata">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ وإستمرار
                    </button>

                    <button type="submit" class="btn btn-labeled btn-warning" style="color: #002342;" id="save"
                        name="add" value="xyz">
                        <span class="btn-label"><i class="glyphicon  glyphicon-floppy-disk"></i></span>حفظ وذهاب إلي
                        الكفلاء
                    </button>

                    <button type="button" class="btn btn-labeled btn-inverse" data-toggle="modal"
                        onclick="GetDiv('myDiv',1)" data-target="#myModalInfo">
                        <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>البحث
                    </button>
                </div>

                <!--------------------------------------->


                <?php echo form_close()?>


                <div class="modal fade" id="myModalInfo_city" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="width: 80%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"> المدينه- الحي </h4>
                            </div>
                            <div class="modal-body">
                                <div id="myDiv_city"></div>
                            </div>
                            <div class="modal-footer" style="display: inline-block;width: 100%">
                                <button type="button" class="btn btn-danger" style="float: left;"
                                    data-dismiss="modal">إغلاق
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <!------------------------------------------------------------->
                <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="width: 70%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">قائمة الكفلاء</h4>
                            </div>
                            <div class="modal-body">

                                <div id="myDiv"></div>
                            </div>
                            <div class="modal-footer" style="display: inline-block;width: 100%">
                                <button type="button" class="btn btn-danger" style="float: left;"
                                    data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!------------------------------------------------------------------------------------------------>
                <!------------------------------------------------------------->
                <div class="modal fade" id="my_load_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="width: 70%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="my_load_popLabel"></h4>
                            </div>
                            <div class="modal-body">

                                <div class="col-sm-12 form-group">
                                    <div class="col-sm-12 form-group">
                                        <div class="col-sm-3  col-md-3 padding-4 ">

                                            <button type="button" class="btn btn-labeled btn-success "
                                                onclick="$('#geha_input').show();"
                                                style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                                <span class="btn-label" id="span_id"><i
                                                        class="glyphicon glyphicon-plus"></i></span>

                                            </button>

                                        </div>
                                    </div>
                                    <div class="col-sm-12 no-padding form-group">

                                        <div id="geha_input" style="display: none">
                                            <div class="col-sm-3  col-md-5 padding-2 ">
                                                <label class="label" id="input_label"> </label>
                                                <input type="text" name="input_name" id="input_name"
                                                    data-validation="required" value="" class="form-control ">
                                                <input type="hidden" class="form-control" id="input_id" value="">
                                                <input type="hidden" class="form-control" id="input_num" value="">
                                                <input type="hidden" class="form-control" id="type" value="">


                                            </div>


                                            <div class="col-sm-3  col-md-2 padding-4" id="div_add">
                                                <button type="button" onclick="sumit_pop()" style=" margin-top: 27px;"
                                                    id="btn_pop" class="btn btn-labeled btn-success" name="save"
                                                    value="1">
                                                    <span class="btn-label">
                                                        <i class="glyphicon glyphicon-floppy-disk"></i>
                                                    </span>
                                                    <span id="btn_pop_span">حفظ</span>



                                                </button>
                                            </div>

                                        </div>

                                    </div>
                                    <br>
                                    <br>
                                </div>

                                <div id="my_load_table"></div>
                            </div>
                            <div class="modal-footer" style="display: inline-block;width: 100%">
                                <button type="button" class="btn btn-danger" style="float: left;"
                                    data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!------------------------------------------------------------------------------------------------>



            </div>
        </div>
    </div>
    <?php
      //  $this->load->view('admin/all_Finance_resource_views/sponsors/sidebar_kafel_data');?>

    <script>
    function set_data(id, title) {

        var text_id = $('#title_text').val();
        var id_id = $('#title_id').val();

        $('#' + text_id).val(title);
        $('#' + id_id).val(id);
        $('#my_load_pop').modal('hide');
    }
    </script>

    <script>
    function show_pop(input_num, type, on_chang, text) {
        $('#my_load_popLabel').text(text);
        $('#input_label').text(text);
        $('#span_id').text(' اضافة ' + text);
        $('#input_num').val(input_num);
        $('#type').val(type);
        console.log('text :' + text + 'type:' + type, 'input_num:' + input_num);
        var f2a = $('option:selected', $('#fe2a_type')).attr("data-specialize");
        console.log('f2a : ' + f2a);
        console.log('on_chang : ' + on_chang);


        switch (on_chang) {
            case 1:
                console.log('on_chang : ' + on_chang);

                if (f2a == 2) {
                    type = 15;
                    input_num = 2;
                    $('#input_num').val(input_num);
                    $('#type').val(type);
                } else if (f2a == 1) {
                    type = 34;
                    input_num = 3;
                    $('#input_num').val(input_num);
                    $('#type').val(type);
                }

                break;

            default:
                break;
        }



        console.log('f2a : ' + f2a);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/show_table',
            data: {
                input_num: input_num,
                type: type
            },
            beforeSend: function() {
                $('#my_load_table').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function(html) {
                $('#my_load_table').html(html);
            }
        });

    }
    </script>

    <script>
    function sumit_pop() {
        var btun_val = $("#btn_pop").val();
        console.log('btn_pop :' + btun_val);
        var input_num = $('#input_num').val();
        var input_name = $('#input_name').val();
        var input_id = $('#input_id').val();
        var type = $('#type').val();
        if (btun_val == '1') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/show_table',
                data: {
                    input_num: input_num,
                    input_name: input_name,
                    type: type,
                    add: 'add'
                },
                beforeSend: function() {
                    swal({
                        title: "جاري الحفظ ",
                        text: "",
                        imageUrl: "<?php echo base_url().'asisst/admin_asset/img/loader.gif' ?>",
                        confirmButtonText: "تم"

                    });
                    $('#my_load_table').html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function(html) {
                    swal({
                        title: "تم الحفظ ",
                        text: "",
                        type: "success",
                        confirmButtonText: "تم",

                    });
                    $('#input_name').val();
                    $('#input_id').val();
                    $("#btn_pop").val(1);
                    $("#btn_pop_span").text("حفظ");
                    $('#my_load_table').html(html);

                    // show_pop(input_num,type,$('#my_load_popLabel').text(text));
                }
            });
        } else {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/show_table',
                data: {
                    input_num: input_num,
                    type: type,
                    input_name: input_name,
                    input_id: input_id,
                    update: 'update'
                },
                beforeSend: function() {
                    swal({
                        title: "جاري الحفظ ",
                        text: "",
                        imageUrl: "<?php echo base_url().'asisst/admin_asset/img/loader.gif' ?>",
                        confirmButtonText: "تم"

                    });
                    $('#my_load_table').html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function(html) {
                    swal({
                        title: "تم الحفظ ",
                        text: "",
                        type: "success",
                        confirmButtonText: "تم",

                    });
                    $('#input_name').val();
                    $('#input_id').val();
                    $("#btn_pop").val(1);
                    $("#btn_pop_span").text("حفظ");
                    $('#my_load_table').html(html);

                    // show_pop(input_num,type,$('#my_load_popLabel').text(text));
                }
            });
        }

    }


    function delete_pop(id) {
        var input_num = $('#input_num').val();
        var type = $('#type').val();

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/show_table',
            data: {
                input_num: input_num,
                input_id: id,
                type: type,
                delete: 'delete'
            },
            beforeSend: function() {
                swal({
                    title: "جاري الحذف ",
                    text: "",
                    imageUrl: "<?php echo base_url().'asisst/admin_asset/img/loader.gif' ?>",
                    confirmButtonText: "تم"

                });
                $('#my_load_table').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function(html) {
                swal({
                    title: "تم الحذف ",
                    text: "",
                    type: "success",
                    confirmButtonText: "تم",

                });
                $('#input_name').val();
                $('#input_id').val();
                $("#btn_pop").val(1);
                $("#btn_pop_span").text("حفظ");
                $('#my_load_table').html(html);

                // show_pop(input_num,type,$('#my_load_popLabel').text(text));
            }
        });
    }
    </script>

    <script>
    function GetMemberName(obj) {

        console.log(' obj :' + obj.dataset.name);
        var hai_name = obj.dataset.hai_name;
        var hai_id = obj.dataset.hai_id;
        var city_name = obj.dataset.city_name;
        var city_id = obj.dataset.city_id;

        document.getElementById('city_id_fk').value = city_id;
        document.getElementById('city_name').value = city_name;
        document.getElementById('hai_id_fk').value = hai_id;
        document.getElementById('hai_name').value = hai_name;
        $("#myModalInfo_city .close").click();

    }

    function GetDiv_city(div) {

        html =
            '<div class="col-md-12 no-padding"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> المدينه </th><th style="width: 170px;" >الحي </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members').show();
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/Human_resources/getConnection',

            aoColumns: [{
                    "bSortable": true
                },
                {
                    "bSortable": true
                },
                {
                    "bSortable": true
                }

            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    },
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });
    }
    </script>

    <script>
    function GetDiv(div, valu) {


        $("#" + div).html(
            '<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;" >كود الكافل </th><th style="width: 170px;"> الإسم </th><th style="width: 100px;" >الجوال</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>');

        $('#person_type').val(valu);
        $('#js_table_members').show();
        var F2aType = valu;
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>/all_Finance_resource/sponsors/Sponsor/getConnection2/' + F2aType,

            aoColumns: [{
                    "bSortable": true
                },
                {
                    "bSortable": true
                },
                {
                    "bSortable": true
                },
                {
                    "bSortable": true
                }
            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    },
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });

    }
    </script>
    <script>
    function info(valu) {
        window.location.href = "<?php echo base_url();?>all_Finance_resource/sponsors/Sponsor/addSponsor_maindata/" +
            valu;
    }
    </script>







    <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script>

    <script>
    timePickerInput({
        inputElement: document.getElementById("m12h"),
        mode: 12,
        // time: new Date()
    });

    timePickerInput({
        inputElement: document.getElementById("m13h"),
        mode: 12,
        // time: new Date()
    });
    </script>

    <script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
    </script>


    <script>
    function get_length(len, span_id) {
        if (len.length < 10) {
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById("" + span_id).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if (len.length > 10) {
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById("" + span_id).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if (len.length == 10) {
            document.getElementById("save").removeAttribute("disabled", "disabled");
            document.getElementById("" + span_id).innerHTML = '';
        }
    }
    </script>

    <script>
    function chek_length(inp_id, len) {
        var inchek_id = "#" + inp_id;
        var inchek = $('' + inchek_id).val();
        if (inchek.length < len) {
            document.getElementById("" + inp_id + "_span").style.color = '#F00';
            document.getElementById("" + inp_id + "_span").innerHTML = 'أقصي عدد ' + len + ' ارقام';
            document.getElementById("save").setAttribute("disabled", "disabled");
            var inchek_out = inchek.substring(0, len);
            $(inchek_id).val(inchek_out);
        }
        if (inchek.length > len) {
            document.getElementById("" + inp_id + "_span").style.color = '#F00';
            document.getElementById("" + inp_id + "_span").innerHTML = 'أقصي عدد ' + len + ' ارقام';
            document.getElementById("save").setAttribute("disabled", "disabled");
            var inchek_out = inchek.substring(0, len);
            $(inchek_id).val(inchek_out);
        }
        if (inchek.length == len) {
            document.getElementById("" + inp_id + "_span").innerHTML = '';
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
    </script>


    <script>
    function check_wakel_type(type) {
        if (type == 1) {

            document.getElementById("w_name").removeAttribute("disabled", "disabled");
            document.getElementById("w_name").setAttribute("data-validation", "required");
            document.getElementById("wakel_relationship").removeAttribute("disabled", "disabled");
            document.getElementById("wakel_relationship_name").setAttribute("data-validation", "required");
            document.getElementById("w_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("w_national_num").setAttribute("data-validation", "required");
            document.getElementById("w_mob").removeAttribute("disabled", "disabled");
            document.getElementById("w_mob").setAttribute("data-validation", "required");

        } else {

            document.getElementById("w_name").setAttribute("disabled", "disabled");
            document.getElementById("w_name").value = '';
            document.getElementById("wakel_relationship").setAttribute("disabled", "disabled");
            document.getElementById("wakel_relationship_name").value = '';
            document.getElementById("w_national_num").setAttribute("disabled", "disabled");
            document.getElementById("w_national_num").value = '';
            document.getElementById("w_mob").setAttribute("disabled", "disabled");
            document.getElementById("w_mob").value = '';

        }
    }
    </script>






    <script>
    function GetF2a(f2a_type) {
        var f2a = $('option:selected', f2a_type).attr("data-specialize");


        if (f2a == 1) {
            //  alert("ddddddddd");
            $('.kafel').text('اسم الكافل ');
            $('#relation_title').text('الصلة');

            $('.w_name').text('اسم الوكيل');
            $('.wakel_relationship').text('الصلة');
            $('.w_national_num').text('رقم هويته');
            $('.w_mob').text('جوال الوكيل');
            document.getElementById("k_specialize_fk").removeAttribute("disabled", "disabled");


            document.getElementById("k_mob").removeAttribute("disabled", "disabled");

           



            document.getElementById("k_gender_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_nationality_fk").removeAttribute("disabled", "disabled");
            document.getElementById("social_status_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_national_type").removeAttribute("disabled", "disabled");
            document.getElementById("k_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("k_national_place").removeAttribute("disabled", "disabled");
            document.getElementById("work_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_activity_fk").setAttribute("disabled", "disabled");
            document.getElementById("company_phone").setAttribute("disabled", "disabled");
            document.getElementById("company_gawal").setAttribute("disabled", "disabled");
            document.getElementById("company_fax").setAttribute("disabled", "disabled");

            $(".company").css("display", "block");
            $('.member').hide();
            document.getElementById("k_activity_fk").value = '';
        } else if (f2a == 2) {
            $('#relation_title').text('صفته');
            $('.kafel').text('اسم الكافل (الجهه)');
            document.getElementById("k_specialize_fk").setAttribute("disabled", "disabled");
            $('#k_specialize_fk').val('');



            document.getElementById("k_mob").setAttribute("disabled", "disabled");

           
            document.getElementById("w_name").removeAttribute("disabled", "disabled");
            document.getElementById("wakel_relationship").removeAttribute("disabled", "disabled");
            document.getElementById("w_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("w_mob").removeAttribute("disabled", "disabled");
            document.getElementById("k_gender_fk").setAttribute("disabled", "disabled");
            document.getElementById("k_gender_fk").value = '';
            document.getElementById("k_nationality_fk").setAttribute("disabled", "disabled");
            document.getElementById("k_nationality_fk").value = '';
            document.getElementById("social_status_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("social_status_id_fk").value = '';
            document.getElementById("k_national_type").setAttribute("disabled", "disabled");
            document.getElementById("k_national_type").value = '';
            document.getElementById("k_national_num").setAttribute("disabled", "disabled");
            document.getElementById("k_national_num").value = '';
            document.getElementById("k_national_place").setAttribute("disabled", "disabled");
            document.getElementById("k_national_place").value = '';
            document.getElementById("work_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("work_id_fk").value = '';
            document.getElementById("k_activity_fk").removeAttribute("disabled", "disabled");
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
        if (value != 0) {
            document.getElementById("k_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("k_mob").removeAttribute("disabled", "disabled");
            document.getElementById("k_national_type").removeAttribute("disabled", "disabled");
            document.getElementById("k_national_place").removeAttribute("disabled", "disabled");
        } 
    }




    function change_halet_kafel(value) {
        if (value != 10) {
            document.getElementById("reasons_stop_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("reasons_stop_id_fk_input").value = '';
            
            document.getElementById("reasons_stop_name").value = '';

        } else {
            document.getElementById("reasons_stop_id_fk").removeAttribute("disabled", "disabled");
        }

    }



    function change_work_status(value) {
        if (value == 0) {
            document.getElementById("k_job_fk").setAttribute("disabled", "disabled");
            document.getElementById("k_job_fk_input").value = '';
            document.getElementById("k_job_name").value = '';

            document.getElementById("k_job_place").setAttribute("disabled", "disabled");
            document.getElementById("k_job_place").value = '';
        } else {
            document.getElementById("k_job_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_job_place").removeAttribute("disabled", "disabled");
        }

    }
    </script>





   



   


    <script>
    function DeleteImage(valu) {
        $('#' + valu).remove();
        var x = document.getElementById('resultTable');
        var myLenth = x.rows.length;
        var dataString = 'id=' + valu;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/delete_attach/' + valu,
            data: dataString,
            cache: false,
            success: function(json_data) {
                if (myLenth == 0) {
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
        if (value == 1) {
            document.getElementById("k_barid_box").setAttribute("disabled", "disabled");
            document.getElementById("k_barid_box").removeAttribute("data-validation", "required");
            document.getElementById("k_barid_box").value = '';
            document.getElementById("k_bardid_code").setAttribute("disabled", "disabled");
            document.getElementById("k_bardid_code").removeAttribute("data-validation", "required");
            document.getElementById("k_bardid_code").value = '';
            document.getElementById("k_email").removeAttribute("disabled", "disabled");
            document.getElementById("k_email").setAttribute("data-validation", "email");
            document.getElementById("k_email").value = '';
        } else if (value == 2) {
            document.getElementById("k_barid_box").removeAttribute("disabled", "disabled");
            document.getElementById("k_barid_box").value = '';
            document.getElementById("k_bardid_code").removeAttribute("disabled", "disabled");
            document.getElementById("k_bardid_code").value = '';
            document.getElementById("k_email").setAttribute("disabled", "disabled");
            document.getElementById("k_email").removeAttribute("data-validation", "email");
            document.getElementById("k_email").value = '';
        } else {
            document.getElementById("k_barid_box").setAttribute("disabled", "disabled");
            document.getElementById("k_barid_box").value = '';
            document.getElementById("k_bardid_code").setAttribute("disabled", "disabled");
            document.getElementById("k_bardid_code").value = '';
            document.getElementById("k_email").setAttribute("disabled", "disabled");
            document.getElementById("k_email").removeAttribute("data-validation", "email");
            document.getElementById("k_email").value = '';
        }

    }
    </script>