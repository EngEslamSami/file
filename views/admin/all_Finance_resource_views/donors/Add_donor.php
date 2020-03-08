<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: none !important;
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
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
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
        display: inline-block;
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
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }

    .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {
        top: 100% !important;
        bottom: auto !important;
        margin-bottom: 1px !important;
    }
    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }


</style>

<?php
if(isset($result)&&!empty($result))
{

    $d_num=$result->d_num;
    $right_time_from=$result->right_time_from;
    $right_time_to=$result->right_time_to;
    $person_img=$result->person_img;
    $d_addres=$result->d_addres;
    $d_name=$result->d_name;
    $d_gender_fk=$result->d_gender_fk;
    $fe2a_type= $result->fe2a_type;
    $d_nationality_fk= $result->d_nationality_fk;
    $d_national_type= $result->d_national_type;
    $d_national_num= $result->d_national_num;
    $d_national_place= $result->d_national_place;
    $d_city= $result->d_city;
    $d_addres= $result->d_addres;
    $d_job_fk =$result->d_job_fk;
    $d_job_place =$result->d_job_place;
    $d_specialize_fk =$result->d_specialize_fk;
    $d_activity_fk =$result->d_activity_fk;
    $d_barid_box =$result->d_barid_box;
    $d_bardid_code =$result->d_bardid_code;
    $d_fax =$result->d_fax;
    $d_mob =$result->d_mob;
    $d_email =$result->d_email;
    $d_status=$result->d_status;

    $d_notes  =$result->d_notes ;
    $d_message_method  =$result->d_message_method ;
    $d_message_mob  =$result->d_message_mob  ;
    $social_status_id_fk =$result->social_status_id_fk ;
    $reasons_stop_id_fk = $result->reasons_stop_id_fk ;
    $halat_donor_id = $result->halat_donor_id ;
    $w_name =  $result->w_name;
    $w_national_num = $result->w_national_num;
    $w_mob =  $result->w_mob;
    $d_hai = $result->d_hai;
    $wakala_type = $result->wakala_type;
    $wakel_relationship = $result->wakel_relationship;
    $work_id_fk = $result->work_id_fk;

    $out['form']='all_Finance_resource/donors/Donor/updateDonor/'.$this->uri->segment(5);
}else{

    $d_num="";
    $right_time_from ="";
    $right_time_to ="";
    $person_img="";
    $d_addres="";
    $d_name="";
    $d_gender_fk="";
    $fe2a_type="";
    $d_nationality_fk="";
    $d_national_type="";
    $d_national_num="";
    $d_national_place="";
    $d_city="";
    $d_status="";
    $d_job_fk="";
    $d_job_fk ="";
    $d_job_place ="";
    $d_specialize_fk ="";
    $d_activity_fk ="";
    $d_barid_box   ="";
    $d_bardid_code   ="";
    $d_fax   ="";
    $d_mob   ="";
    $d_email   ="";
    $d_notes  ="";
    $d_message_method ="";
    $d_message_mob ="";
    $social_status_id_fk = '';
    $reasons_stop_id_fk = '';
    $halat_donor_id = '';
    $w_name = '';
    $w_national_num = '';
    $w_mob =  '';
    $d_hai = '';
    $wakel_relationship ='';
    $wakala_type ='';
    $work_id_fk = '';
    $city_name='';
    $hai_name='';
    $city_id_fk = '';
    $hai_id_fk = '';
    $out['form']='all_Finance_resource/donors/Donor/addDonor';
}



?>
<?php
?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="pull-left">
                    <?php if(isset($result) && !empty($result)){
                        $data_load['result'] =$result;
                        $data_load['d_status'] = $d_status;
                        $this->load->view('admin/all_Finance_resource_views/donors/drop_down_menu', $data_load);
                    }?>
                </div>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>

                <div class="col-md-12">

                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label">رقم المتبرع</label>
                        <input type="text" name="d_num" id="d_num"
                            <?php
                            if(!empty($d_num)){?>
                                value="<?=$d_num?>" readonly
                            <?php }else{
                                if(empty($last_id)){ ?>
                                    data-validation="required"
                                <?php }elseif($last_id !='' && $last_id>0){?>
                                    value="<?=$last_id?>" readonly
                                <?php } }?>
                               value="<?php echo $d_num;?>"
                               class="form-control"
                               data-validation-has-keyup-event="true">
                    </div>

  
             <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">فئة المتبرع</label>
                        <select id="fe2a_type" data-validation="required" class="form-control bottom-input"
                                name="fe2a_type" onchange="GetF2a(this)">
                            <option value="">إختر</option>
                            <?php
                            //  $f2a =array(1=>'فرد',2=>'مؤسسة',3=>'جهات مانحة',4=>'مؤسسات حكومية');
                            if(!empty($f2a) && isset($f2a)){
                                foreach($f2a as $value){
                                    ?>
                                    <option value="<?php echo $value->id;?>" data-specialize="<?php echo $value->id;?>"
                                        <?php
                                        if(!empty($fe2a_type)){
                                            if($value->id ==$fe2a_type){
                                                echo 'selected'; }}  ?>> <?php echo $value->title;?></option >
                                    <?php
                                }}
                            ?>
                        </select>
                    </div>
					

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label ">إسم المتبرع</label>
                        <input type="text" name="d_name" id="d_name" value="<?php echo $d_name;?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label">الجنس </label>
                        <select name="d_gender_fk" id="d_gender_fk" data-validation="required"
                                class="form-control" aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($gender_data)&&!empty($gender_data)) {
                                foreach($gender_data as $row){?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($d_gender_fk)){
                                            if($row->id_setting==$d_gender_fk){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">الجنسيه</label>
                        <select id="d_nationality_fk"  class="form-control "
                                name="d_nationality_fk">
                            <option value="">إختر</option>
                            <?php
                            foreach($nationality as $row){
                                ?>
                                <option value="<?php echo $row->id_setting;?>"
                                    <?php if(!empty($d_nationality_fk)){
                                        if($row->id_setting==$d_nationality_fk){ echo 'selected'; }
                                    } ?>> <?php echo $row->title_setting;?></option >
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label">الحالة الاجتماعية </label>
                        <select id="social_status_id_fk"  class="form-control " onchange="change_status($(this).val())"
                                aria-required="true" name="social_status_id_fk">
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


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">نوع الهوية </label>
                        <select id="d_national_type"  class="form-control "
                                aria-required="true" name="d_national_type">
                            <option value="">إختر</option>
                            <?php
                            if(isset($type_card)&&!empty($type_card)) {
                                foreach($type_card as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"

                                        <?php if(!empty($d_national_type)){
                                            if($row->id_setting==$d_national_type){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label "> رقم الهويه <span class="span-allow"> (10ارقام) </span></label>
                        <input type="text" name="d_national_num" id="d_national_num" onkeyup="get_length($(this).val(),'hint');"
                               maxlength="10"
                            <?php if($social_status_id_fk !=''){ if($social_status_id_fk == 0){ echo 'disabled="disabled"'; }}?>
                               value="<?php echo $d_national_num;?>"
                               class="form-control "
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                        <small  id="hint" class="myspan"  style="color: red;"> </small>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">مصدر الهوية </label>
                        <select id="d_national_place" name="d_national_place"
                                class="form-control "  aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($dest_card)&&!empty($dest_card)) {
                                foreach($dest_card as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($d_national_place)){
                                            if($row->id_setting==$d_national_place){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label "> جوال المتبرع <span class="span-allow"> (10ارقام) </span></label>
                        <input type="text" name="d_mob" maxlength="10" onkeyup="get_length($(this).val(),'tel');"
                            <?php if($social_status_id_fk !=''){ if($social_status_id_fk == 0){ echo 'disabled="disabled"'; }}?>
                               data-validation="required" id="d_mob" value="<?php echo $d_mob;?>"
                               class="form-control "
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                        <small  id="tel" class="myspan"  style="color: red;"> </small>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">هل يوجد وكاله </label>
                        <select id="wakala_type" name="wakala_type" onchange="check_wakel_type($(this).val())"
                                class="form-control "  aria-required="true">
                            <option value="1" <?php if($wakala_type ==1){echo 'selected';} ?>  >نعم </option>
                            <option value="2" <?php if($wakala_type ==2){echo 'selected';} ?> >لا </option>

                        </select>
                    </div>


                </div>
                <div class="col-md-12">





                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label ">إسم الوكيل   </label>
                        <input type="text" name="w_name" id="w_name"
                            <?php if($wakala_type ==2){echo ' disabled="disabled"';} ?>
                               value="<?php echo $w_name;?>"
                               class="form-control ">
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">صفته</label>
                        <select name="wakel_relationship"  id="wakel_relationship"  aria-required="true" data-show-subtext="true"
                            <?php if($wakala_type ==2){echo ' disabled="disabled"';} ?>
                                data-live-search="true"
                                onchange="get_num_fk(this.value);" class="selectpicker no-padding form-control choose-date form-control two_three">
                            <option value="">إختر</option>

                            <?php if(!empty($relationships)){ foreach ($relationships as $record){
                                $select='';
                                if(isset($result)){
                                    if($wakel_relationship ==$record->id_setting){$select='selected'; }
                                }?>
                                <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                            <?php  } } ?>
                        </select>
                    </div>







                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">رقم هويته    </label>
                        <input type="text" name="w_national_num" id="w_national_num"
                               onkeyup="get_length($(this).val(),'w_num_span');"
                               onkeypress="validate_number(event);" maxlength="10"
                            <?php if($wakala_type ==2){echo ' disabled="disabled"';} ?>
                             value="<?php echo $w_national_num;?>"
                               class="form-control ">
                        <small  id="w_num_span" class="myspan"  style="color: red;"> </small>
                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label "> جوال الوكيل    </label>
                        <input type="text" name="w_mob" id="w_mob"
                               onkeyup="get_length($(this).val(),'w_mob_span');"
                               onkeypress="validate_number(event);" maxlength="10"
                            <?php if($wakala_type ==2){echo ' disabled="disabled"';} ?>
                              value="<?php echo $w_mob;?>"
                               class="form-control">
                        <small  id="w_mob_span" class="myspan"  style="color: red;"> </small>
                    </div>





<!--

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">رقم هويته    </label>
                        <input type="text" name="w_national_num" id="w_national_num"
                            <?php if($wakala_type ==2){echo ' disabled="disabled"';} ?>
                               data-validation="required" value="<?php echo $w_national_num;?>"
                               class="form-control bottom-input">
                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label"> جوال الوكيل    </label>
                        <input type="text" name="w_mob" id="w_mob"
                            <?php if($wakala_type ==2){echo ' disabled="disabled"';} ?>
                               data-validation="required" value="<?php echo $w_mob;?>"
                               class="form-control bottom-input">
                    </div>
-->

                    <!-- <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">المدينة</label>
                        <select id="d_city" name="d_city"
                                onchange="getAhai($(this).val());"  class="form-control" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if(isset($cities)&&!empty($cities)) {
                                foreach($cities as $key=>$value){
                                    // $d_city= $result->d_city;
                                    ?>
                                    <option value="<?php echo$key;?>"<?php if($key==$d_city){ echo 'selected'; } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }

                            ?>
                        </select>
                    </div> -->
<!-- new -->
<div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label"> المدينه</label>
                        <input type="text"  id="city_name"    value="<?php echo $city_name?>"  class="form-control " data-validation-has-keyup-event="true" style="width: 84%;float: right;" readonly>
                        <input type="hidden" name="city_id_fk" id="city_id_fk"      value="<?php echo $d_city ?>"  class="form-control " data-validation-has-keyup-event="true" readonly>
                        <button type="button" data-toggle="modal" data-target="#myModalInfo"
                                        class="btn btn-success btn-next" style="float: right;" onclick="GetDiv('myDiv')">
                                    <i class="fa fa-plus"></i></button>
                    </div>
                    
        <input type="hidden" name="motbr3_id_fk" id="motbr3_id_fk" >
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label"> الحي</label>
                        <input type="text"  id="hai_name"    value="<?php echo $hai_name?>"  class="form-control " data-validation-has-keyup-event="true" readonly>
                        <input type="hidden" name="hai_id_fk" id="hai_id_fk"    value="<?php echo $d_hai ?>" class="form-control " data-validation-has-keyup-event="true" readonly>
                    </div>

                    <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> المدينه- الحي </h4>
            </div>
            <div class="modal-body">
                <div id="myDiv"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- new -->





                    <!-- <div class="form-group col-md-2 col-sm-6 padding-4 ">
                        <label class="label ">الحي</label>
                        <select id="hai_id_fk" name="d_hai" disabled="disabled"  class="form-control">
                            <option value="">إختر</option>
                            <?php if(isset($d_hai) && !empty($d_hai)){
                                foreach ($ahais as $hay){
                                    $select ='';  if($hay->id == $d_hai){$select = 'selected';}?>
                                    <option <?= $select?> value="<?=$hay->id ?>"><?=$hay->name ?></option>
                                <?php } } ?>
                        </select>
                    </div> -->



                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">العنوان الوطني </label>
                        <input type="text" name="d_addres" id="d_addres"
                              value=" <?php echo $d_addres;?>"
                               class="form-control ">
                    </div>
                    
               
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">التخصص </label>
                        <select name="d_specialize_fk" class="form-control " id="d_specialize_fk" >
                            <option value="">اختر</option>
                            <?php
                            if(isset($specialize)&&!empty($specialize)) {
                                foreach($specialize as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($d_specialize_fk)){
                                            if($row->id_setting==$d_specialize_fk){ echo 'selected'; }
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
                        <label class="label ">الحياة العملية  </label>
                        <select name="work_id_fk" class="form-control " id="work_id_fk" onchange="change_word_status($(this).val())" >
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





                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">المهنة </label>
                        <select name="d_job_fk" id="d_job_fk"
                            <?php if($work_id_fk ==0){echo ' disabled="disabled"';} ?>
                                class="form-control "
                                aria-required="true" >
                            <option value="">إختر</option>
                            <?php
                            if(isset($job_role)&&!empty($job_role)) {
                                foreach($job_role as $row){?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($d_job_fk)){
                                            if($row->id_setting==$d_job_fk){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>





              


                    <div class="form-group col-md-3 col-sm-6  padding-4">
                        <label class="label ">جهة العمل </label>
                        <input type="text" name="d_job_place"
                            <?php if($work_id_fk ==0){echo ' disabled="disabled"';} ?>
                               id="d_job_place" class="form-control " onchange="change_halet_donor($(this).val())"
                               value="<?php echo $d_job_place;?>"  data-validation-has-keyup-event="true" >

                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">نشاط المؤسسة   </label>
                        <select name="d_activity_fk" class="form-control " id="d_activity_fk"
                               >
                            <option value="">اختر</option>
                            <?php
                            if(isset($activity)&&!empty($activity)) {
                                foreach($activity as $row){?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($d_activity_fk)){
                                            if($row->id_setting==$d_activity_fk){ echo 'selected'; }
                                        } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">الطريقة المناسبة للمراسلة</label>
                        <select id="d_message_method" name="d_message_method" onchange="change_method_donor($(this).val())"
                                class="form-control " data-validation="required">

                            <?php
                            $d_message_method_arr =array('إختر','ارغب في استلام البريدعن طريق البريد الالكتروني ','ارغب في استلام البريد عن طريق صندوق البريد ','لا ارغب في استلام البريد');
                            if(isset($d_message_method_arr)&&!empty($d_message_method_arr)) {
                                foreach($d_message_method_arr as $key=>$value){
                                    ?>
                                    <option value="<?php echo$key;?>"
                                        <?php if(!empty($d_message_method)){
                                            if($key == $d_message_method){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    </div>
                <div class="col-md-12">


  <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">البريد الإلكتروني</label>
                        <input type="email" name="d_email" id="d_email" data-validation="email" value="<?php echo $d_email;?>"
                        <?php if($d_message_method !=1){echo ' disabled="disabled"';} ?>
                               class="form-control "
                               data-validation-has-keyup-event="true">
                    </div>


           
                    <!--
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">الفاكس</label>
                        <input type="text" name="d_fax"  id="d_fax"   onkeypress="validate_number(event)" class="form-control bottom-input" value="<?php echo $d_fax;?>"
                               data-validation-has-keyup-event="true" >
                    </div> -->





         <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">صندوق بريد</label>
                        <input type="text" name="d_barid_box"  id="d_barid_box" class="form-control "
                        <?php if($d_message_method !=2){echo ' disabled="disabled"';} ?>
                               value="<?php echo $d_barid_box;?>"  data-validation-has-keyup-event="true" >
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">رمز بريدي</label>
                        <input type="text" name="d_bardid_code"  id="d_bardid_code"   onkeypress="validate_number(event)" class="form-control "
                        <?php if($d_message_method !=3){echo ' disabled="disabled"';} ?>
                               value="<?php echo $d_bardid_code;?>"
                               data-validation-has-keyup-event="true" >
                    </div>
                  



                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">التواصل عن طريق رسائل الجوال</label>
                        <select id="d_message_mob" name="d_message_mob"
                                class="form-control " data-validation="required">
                            <?php
                            $d_message_mob_arr =array('إختر','نعم','لا');
                            if(isset($d_message_mob_arr)&&!empty($d_message_mob_arr)) {
                                foreach($d_message_mob_arr as $key=>$value){
                                    ?>
                                    <option value="<?php echo$key;?>"
                                        <?php if(!empty($d_message_mob)){
                                            if($key == $d_message_mob){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>



                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">الوقت المناسب للتواصل </label>
                        <input placeholder="إدخل البيانات " id="right_time_from" type="time" class="form-control half"
                
                               name="right_time_from" value="<?php echo $right_time_from; ?>" >


                        <input placeholder="إدخل البيانات " id="right_time_to" class="form-control half input-style"
                    
                               type="time" 
                               name="right_time_to" value="<?php echo $right_time_to;?>" >
                    </div>

                    </div>

<div class="col-md-12">


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">الصورة</label>
                        <input type="file" name="person_img"  class="form-control  valid" id="person_img">
                        <?php if(!empty($person_img)){?>
                            <a  data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                                onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/images/<?php echo $person_img;?>');">
                                <i class="fa fa-eye"></i>
                            </a>
                        <?php  } ?>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">حالة المتبرع</label>
                        <select id="halat_donor_id"  class="form-control " data-validation="required" onchange="change_halet_donor($(this).val())"
                                aria-required="true" name="halat_donor_id">
                            <option value="">إختر</option>

                            <?php
                            if(isset($halat_donor)&&!empty($halat_donor)) {
                                foreach($halat_donor as $row){
                                    ?>
                                    <option value="<?php echo $row->id;?>"

                                        <?php if(!empty($halat_donor_id)){
                                            if($row->id==$halat_donor_id){ echo 'selected'; }
                                        } ?>> <?php echo $row->title;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">

                        <label class="label ">السبب </label>
                        <select id="reasons_stop_id_fk"  class="form-control "
                            <?php if($halat_donor_id !=''){ if($halat_donor_id != 8){ echo 'disabled="disabled"'; }}?>
                                aria-required="true" name="reasons_stop_id_fk">
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


                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label ">ملاحظات</label>
                        <input type="text" name="d_notes" class="form-control "  value="<?=$d_notes?>" />
                    </div>



                </div>







                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <br /><br />
                        <!-- <button type="submit" id="save" name="add" value="add"
                                class="btn btn-add">
                            <span><i class="fa fa-floppy-o"></i></span> حفظ
                        </button> -->
                        <button type="submit" id="save" name="add" value="add"
                               class="btn btn-labeled btn-success "  style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px;     margin-right: 50%;
    margin-top: -49px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                        </button>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
    </div>





    <!------------------------------------------------------------------>
    <!-- <?php  $this->load->view('admin/all_Finance_resource_views/donors/sidebar_donor_data');?> -->
    <!------ table -------->

</div>
<?php  if(isset($records) &&!empty($records)) { ?>
    <div class="col-xs-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات المتبرع</h3>
            </div>
            <div class="panel-body"><br>
                <div class="col-md-12 no-padding">

                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="info">
                            <th class="text-center">م</th>
                            <th>كود المتبرع</th>
                            <th class="text-center">إسم المتبرع</th>
                            <th>رقم الهوية</th>
                            <th>رقم الجوال</th>
                            <th>حالة المتبرع</th>
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
                                    <td><?php echo $record->d_num; ?></td>
                                    <td><?php echo $record->d_name; ?></td>
                                    <td><?php echo $record->d_national_num; ?></td>
                                    <td><?php echo $record->d_mob; ?></td>
                                    <td><?php  if (!empty($record->donor_status)) {
                                            echo $record->donor_status['title'];
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
                                                <li>
                                               
                                                
                                                <a target="_blank"
                                                       href="<?php echo base_url(); ?>all_Finance_resource/donors/Donor/complete_donner_data/<?php echo $record->id; ?>">
                                                        بيانات
                                                        التبرع </a></li>
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
                                        <a href="<?php echo base_url(); ?>all_Finance_resource/donors/Donor/updateDonor/<?php echo $record->id; ?>"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                        <a onclick="$('#adele').attr('href', '<?= base_url() . "all_Finance_resource/donors/Donor/delete_donor/" . $record->id ?>');"
                                           data-toggle="modal" data-target="#modal-delete"
                                           title="حذف"> <i class="fa fa-trash"
                                                           aria-hidden="true"></i> </a>

                                        <a href="<?php echo base_url('all_Finance_resource/donors/Donor/print_donor_details') . '/' . $record->id ?>"
                                           target="_blank">
                                            <i class="fa fa-print" aria-hidden="true"></i> </a>

                                        <a href="<?php echo base_url('all_Finance_resource/donors/Donor/print_card') . '/' . $record->id ?>"
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
                                            <td class="text-center" style="width: 15%"> حالة التبرع</td>
                                            <td class="text-center" style="width: 20%"> رقم المتبرع</td>
                                            <td class="text-center" style="width: 25%"> إسم المتبرع</td>
                                            <td class="text-center" style="width: 15%"> الجنس</td>
                                            <td class="text-center" style="width: 20%"> تاريخ تسجيل التبرع</td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"><?php  if(!empty($fe2a_type_arr[$record->d_status])){
                                                    echo $fe2a_type_arr[$record->d_status]; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php   if(!empty($record->d_num)){
                                                    echo $record->d_num; }else{ echo'غيرمحدد'; } ?></td>
                                            <td class="text-center"><?php if(!empty($record->d_name)){
                                                    echo$record->d_name; }else{ echo'غيرمحدد'; } ?></td>
                                            <td class="text-center"><?php  if(!empty($gender_data[$record->d_gender_fk])){
                                                    echo $gender_data[$record->d_gender_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->start_kfala_date)){
                                                    echo $record->start_kfala_date;
                                                }else{ echo'غيرمحدد'; }?></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 15%"> فئة المتبرع</td>
                                            <td class="text-center" style="width: 20%"> الجنسية </td>
                                            <td class="text-center" style="width: 15%"> نوع الهوية</td>
                                            <td class="text-center" style="width: 25%">رقم الهوية(10اراقام)</td>
                                            <td class="text-center" style="width: 20%"> مصدر الهوية </td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"><?php
                                           /* echo $record->fe2a_type;
                                            echo('<pre>');
                                            print_r($f2a);*/
                                            
                                              if(!empty($f2a[$record->fe2a_type])){
                                                    echo$f2a[$record->fe2a_type]; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($nationality[$record->d_nationality_fk])){
                                                    echo $nationality[$record->d_nationality_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"> <?php  if(!empty($type_card[$record->d_national_type])){
                                                    echo $type_card[$record->d_national_type]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->d_national_num)){
                                                    echo $record->d_national_num; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($dest_card[$record->d_national_place])){
                                                    echo $dest_card[$record->d_national_place]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 20%"> المدينه</td>
                                            <td class="text-center" style="width: 30%"> العنوان </td>
                                            <td class="text-center" style="width: 25%"> المهنة </td>
                                            <td class="text-center" style="width: 25%"> جهة العمل </td>
                                        </tr>
                                        <tr class="open_green">
                                        
                                        <?php 
                                       // echo $cities[$record->d_city];
                                        /*echo '<pre>';
                                        print_r($cities);*/
                                        ?>
                                            <td class="text-center"><?php if(!empty($cities[$record->d_city])){
                                                    echo $cities[$record->d_city]; }else{ echo 'غير محدد';} ?></td>
                                            <td class="text-center"><?php  if(!empty($record->d_addres)){
                                                    echo $record->d_addres; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"> <?php  if(!empty($job_role[$record->d_job_fk])){
                                                    echo $job_role[$record->d_job_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->d_job_place)){
                                                    echo $record->d_job_place; }else{ echo'غيرمحدد';}?></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 15%">نشاط المؤسسة</td>
                                            <td class="text-center" style="width: 15%">التخصص </td>
                                            <td class="text-center" style="width: 25%">صندوق بريد</td>
                                            <td class="text-center" style="width: 25%"> رمز بريدي</td>
                                            <td class="text-center" style="width: 20%">الفاكس</td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"><?php  if(!empty($activity[$record->d_activity_fk])){
                                                    echo $activity[$record->d_activity_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($specialize[$record->d_specialize_fk])){
                                                    echo $specialize[$record->d_specialize_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->d_barid_box)){
                                                    echo $record->d_barid_box; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->d_bardid_code)){
                                                    echo $record->d_bardid_code;
                                                }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($record->d_fax)){
                                                    echo $record->d_fax; }else{ echo'غيرمحدد';}?></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 25%"> الجوال(10 أرقام)</td>
                                            <td class="text-center" style="width: 25%">البريد الالكتروني </td>
                                            <td class="text-center" style="width: 20%">تنبية الانتهاء</td>
                                            <td class="text-center" style="width: 15%">العدد </td>
                                            <td class="text-center" style="width: 15%">عدد الايام</td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"><?php  if(!empty($record->d_mob)){
                                                    echo $record->d_mob;
                                                }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($record->d_email)){
                                                    echo $record->d_email; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($alert_type_arr[$record->alert_type])){
                                                    echo $alert_type_arr[$record->alert_type];
                                                }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($record->num)){
                                                    echo $record->num; }else{ echo 0;}?></td>
                                            <td class="text-center"><?php  if(!empty($record->num_days)){
                                                    echo $record->num_days; }else{ echo 0;}?></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 20%"> توريد التبرع</td>
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
                                            <td class="text-center"><?php  if(!empty($record->band_account_num)){
                                                    echo $record->band_account_num;
                                                }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($record->band_branch)){
                                                    echo $record->band_branch; }else{ echo'غيرمحدد';}?></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 30%">الطريقه المناسبة للمراسلة</td>
                                            <td class="text-center" style="width: 45%">هل ترغب المراسلة عن طريق رسائل الجوال</td>
                                            <td class="text-center" style="width: 25%"> ملاحظات </td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"><?php  if(!empty($d_message_method_arr[$record->d_message_method])){
                                                    echo $d_message_method_arr[$record->d_message_method];
                                                }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($d_message_mob_arr[$record->d_message_mob])){
                                                    echo $d_message_mob_arr[$record->d_message_mob]; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->d_message_method)){
                                                    echo $record->d_message_method;
                                                }else{ echo'غيرمحدد'; }?></td>
                                        </tr>
                                    </table>
                                </div>


                            </div>
                            <div class="col-sm-3">
                                <div class="piece-box">
                                    <img src="img/logo-atheer.png" class="center-block" alt="" style="width: 116px; padding: 10px">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td style="width: 50%">إسم المتبرع</td>
                                            <td style="width: 50%"><?php if(!empty($record->d_name)){
                                                    echo$record->d_name; }else{ echo'غيرمحدد'; } ?></td>
                                        </tr>
                                        <tr>
                                            <td>رقم المتبرع</td>
                                            <td><?php   if(!empty($record->d_num)){
                                                    echo $record->d_num; }else{ echo'غيرمحدد'; } ?></td>
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
                    <?php    echo form_open_multipart('all_Finance_resource/donors/Donor/add_attach');?>

                    <div class="modal-body">
                        <button type="button" value="" id="" onclick="add_row()"
                                class="btn btn-success btn-next"/><i class="fa fa-plus"></i> إضافة </button><br><br>
                        <table class="table table-striped table-bordered"   <?php if(empty($record->Images)){ ?> style="display: none" <?php } ?> id="mytable">
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
                    <div class="modal-footer" style="display: inline-block;width: 100%">
                        <input type="hidden" name="person_id" value="<?php echo $record->id; ?>">
                        <button type="button" class="btn btn-danger"  style="float: left" data-dismiss="modal">إغلاق</button>
                        <button type="submit"   id="saves"  name="add" value="add" class="btn btn-success"
                                style="float: left;display: none;padding: 6px 12px;" >حفظ</button>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
                    document.getElementById("hai_id_fk").setAttribute("data-validation", "required");
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
            document.getElementById("hai_id_fk").removeAttribute("data-validation", "required");
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
            document.getElementById("w_name").setAttribute("data-validation", "required");
            document.getElementById("wakel_relationship").removeAttribute("disabled", "disabled");
            document.getElementById("wakel_relationship").setAttribute("data-validation", "required");
            document.getElementById("w_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("w_national_num").setAttribute("data-validation", "required");
            document.getElementById("w_mob").removeAttribute("disabled", "disabled");
            document.getElementById("w_mob").setAttribute("data-validation", "required");

            $('#wakel_relationship').selectpicker("refresh");
        } else {

            document.getElementById("w_name").setAttribute("disabled", "disabled");
            document.getElementById("w_name").value='';
            document.getElementById("wakel_relationship").setAttribute("disabled", "disabled");
            document.getElementById("wakel_relationship").value='';
            document.getElementById("w_national_num").setAttribute("disabled", "disabled");
            document.getElementById("w_national_num").value='';
            document.getElementById("w_mob").setAttribute("disabled", "disabled");
            document.getElementById("w_mob").value='';

            $('#wakel_relationship').selectpicker("refresh");
        }
    }
</script>






<script>
/*
    function GetF2a(f2a_type) {

        if( f2a_type ==1 ){

            document.getElementById("d_national_type").removeAttribute("disabled", "disabled");
            document.getElementById("d_national_type").setAttribute("data-validation", "required");
            document.getElementById("d_national_place").removeAttribute("disabled", "disabled");
            document.getElementById("d_national_place").setAttribute("data-validation", "required");
            document.getElementById("d_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("d_national_num").setAttribute("data-validation", "required");
            document.getElementById("d_job_fk").removeAttribute("disabled", "disabled");
            document.getElementById("d_job_fk").setAttribute("data-validation", "required");
            document.getElementById("d_job_place").removeAttribute("disabled", "disabled");
            document.getElementById("d_job_place").setAttribute("data-validation", "required");
            document.getElementById("d_activity_fk").setAttribute("disabled", "disabled");

        } else {

            document.getElementById("d_national_type").setAttribute("disabled", "disabled");
            document.getElementById("d_national_type").value='';
            document.getElementById("d_national_place").setAttribute("disabled", "disabled");
            document.getElementById("d_national_place").value='';
            document.getElementById("d_national_num").setAttribute("disabled", "disabled");
            document.getElementById("d_national_num").value='';
            document.getElementById("d_job_fk").setAttribute("disabled", "disabled");
            document.getElementById("d_job_fk").value='';
            document.getElementById("d_job_place").setAttribute("disabled", "disabled");
            document.getElementById("d_job_place").value='';
            document.getElementById("d_activity_fk").removeAttribute("disabled", "disabled");
            document.getElementById("d_activity_fk").setAttribute("data-validation", "required");

        }

    }
*/


    function GetF2a(f2a_type) {

        var f2a = $('option:selected',f2a_type).attr("data-specialize");


        if( f2a ==1 ){

            document.getElementById("d_gender_fk").removeAttribute("disabled", "disabled");
            document.getElementById("d_gender_fk").setAttribute("data-validation", "required");
            document.getElementById("d_nationality_fk").removeAttribute("disabled", "disabled");
            document.getElementById("d_nationality_fk").setAttribute("data-validation", "required");
            document.getElementById("social_status_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("social_status_id_fk").setAttribute("data-validation", "required");
            document.getElementById("d_national_type").removeAttribute("disabled", "disabled");
            document.getElementById("d_national_type").setAttribute("data-validation", "required");
            document.getElementById("d_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("d_national_num").setAttribute("data-validation", "required");
            document.getElementById("d_national_place").removeAttribute("disabled", "disabled");
            document.getElementById("d_national_place").setAttribute("data-validation", "required");
            document.getElementById("work_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("work_id_fk").setAttribute("data-validation", "required");
            document.getElementById("d_activity_fk").setAttribute("disabled", "disabled");
            document.getElementById("d_activity_fk").removeAttribute("data-validation", "required");
            document.getElementById("d_activity_fk").value='';
        } else if( f2a ==2 )  {
            document.getElementById("d_gender_fk").setAttribute("disabled", "disabled");
            document.getElementById("d_gender_fk").removeAttribute("data-validation", "required");
            document.getElementById("d_gender_fk").value='';
            document.getElementById("d_nationality_fk").setAttribute("disabled", "disabled");
            document.getElementById("d_nationality_fk").removeAttribute("data-validation", "required");
            document.getElementById("d_nationality_fk").value='';
            document.getElementById("social_status_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("social_status_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("social_status_id_fk").value='';
            document.getElementById("d_national_type").setAttribute("disabled", "disabled");
            document.getElementById("d_national_type").removeAttribute("data-validation", "required");
            document.getElementById("d_national_type").value='';
            document.getElementById("d_national_num").setAttribute("disabled", "disabled");
            document.getElementById("d_national_num").removeAttribute("data-validation", "required");
            document.getElementById("d_national_num").value='';
            document.getElementById("d_national_place").setAttribute("disabled", "disabled");
            document.getElementById("d_national_place").removeAttribute("data-validation", "required");
            document.getElementById("d_national_place").value='';
            document.getElementById("work_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("work_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("work_id_fk").value='';
            document.getElementById("d_activity_fk").removeAttribute("disabled", "disabled");
            document.getElementById("d_activity_fk").setAttribute("data-validation", "required");
        }

    }



</script>


<script>

    function change_status(value) {
        if(value !=0){
            document.getElementById("d_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("d_mob").removeAttribute("disabled", "disabled");
        }else{
            document.getElementById("d_national_num").setAttribute("disabled", "disabled");
            document.getElementById("d_mob").setAttribute("disabled", "disabled");
            document.getElementById("d_national_num").value='';
            document.getElementById("d_mob").value='';
        }

    }




    function change_halet_donor(value) {
        if(value !=8){
            document.getElementById("reasons_stop_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("reasons_stop_id_fk").value='';
        }else{
            document.getElementById("reasons_stop_id_fk").removeAttribute("disabled", "disabled");
        }

    }

/*
    function change_method_donor(value) {
        if(value ==1 || value == 3){
            document.getElementById("d_barid_box").setAttribute("disabled", "disabled");
            document.getElementById("d_barid_box").value='';
            document.getElementById("d_bardid_code").setAttribute("disabled", "disabled");
            document.getElementById("d_bardid_code").value='';
            document.getElementById("d_email").removeAttribute("disabled", "disabled");

        }  else if(value ==2){
            document.getElementById("d_barid_box").removeAttribute("disabled", "disabled");
            document.getElementById("d_barid_box").value='';
            document.getElementById("d_bardid_code").removeAttribute("disabled", "disabled");
            document.getElementById("d_bardid_code").value='';
            document.getElementById("d_email").setAttribute("disabled", "disabled");
            document.getElementById("d_email").value='';
        }else{
            document.getElementById("reasons_stop_id_fk").removeAttribute("disabled", "disabled");
        }

    }
*/


    function change_word_status(value) {
        if(value ==0){
            document.getElementById("d_job_fk").setAttribute("disabled", "disabled");
            document.getElementById("d_job_fk").value='';
            document.getElementById("d_job_place").setAttribute("disabled", "disabled");
            document.getElementById("d_job_place").value='';
        }else{
            document.getElementById("d_job_fk").removeAttribute("disabled", "disabled");
            document.getElementById("d_job_place").removeAttribute("disabled", "disabled");
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
            url: '<?php echo base_url() ?>all_Finance_resource/donors/Donor/delete_attach/' + valu ,
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
			  
			  function change_method_donor(value) {
				if(value ==1 ){
					document.getElementById("d_barid_box").setAttribute("disabled", "disabled");
					document.getElementById("d_barid_box").removeAttribute("data-validation", "required");
					document.getElementById("d_barid_box").value='';
					document.getElementById("d_bardid_code").setAttribute("disabled", "disabled");
					document.getElementById("d_bardid_code").removeAttribute("data-validation", "required");
					document.getElementById("d_bardid_code").value='';
					document.getElementById("d_email").removeAttribute("disabled", "disabled");
					document.getElementById("d_email").setAttribute("data-validation", "email");
					document.getElementById("d_email").value='';
				}  else if(value ==2){
					document.getElementById("d_barid_box").removeAttribute("disabled", "disabled");
					document.getElementById("d_barid_box").value='';
					document.getElementById("d_bardid_code").removeAttribute("disabled", "disabled");
					document.getElementById("d_bardid_code").value='';
					document.getElementById("d_email").setAttribute("disabled", "disabled");
					document.getElementById("d_email").removeAttribute("data-validation", "email");
					document.getElementById("d_email").value='';
				}else {
					document.getElementById("d_barid_box").setAttribute("disabled", "disabled");
					document.getElementById("d_barid_box").value='';
					document.getElementById("d_bardid_code").setAttribute("disabled", "disabled");
					document.getElementById("d_bardid_code").value='';
					document.getElementById("d_email").setAttribute("disabled", "disabled");
					document.getElementById("d_email").removeAttribute("data-validation", "email");
					document.getElementById("d_email").value='';
				}

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
$("#myModalInfo .close").click();

}

    function GetDiv(div) {

        html = '<div class="col-md-12 no-padding"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> المدينه </th><th style="width: 170px;" >الحي </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members').show();
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/Human_resources/getConnection',

            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
               
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
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });
    }


</script>