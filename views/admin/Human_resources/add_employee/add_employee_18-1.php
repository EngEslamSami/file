<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">
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
        /*border:1px solid #73b300;*/
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
        color: #fff;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
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

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }

    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }

    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3,
    .under-line .col-xs-4,
    .under-line .col-xs-6,
    .under-line .col-xs-8 {
        border-left: 1px solid #abc572;
    }


    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
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

    .top-label {
        font-size: 14px;
        font-weight: 500;
        position: relative;

    }

    input[type=file].changeImg {
        right: 10%;
    }

    input[type="file"].changeImg::before {
        content: 'تغيير الصورة';
    }
    .table-bordered.table-details tbody > tr > td {
        font-size: 13px !important;
        white-space: pre-line;
    }

</style>


<?php
if (isset($emp) && !empty($emp)) {
    $name = $emp->employee;
    $emp_code = $emp->emp_code;
    $card_num = $emp->card_num;
    $gender = $emp->gender;
    $bank = $emp->bank;
    $bank_num = $emp->bank_num;
    $status = $emp->status;
    $phone = $emp->phone;
    $personal_photo = $emp->personal_photo;
    $birth_date = $emp->birth_date;
    $birth_date_m = $emp->birth_date_m;
    $birth_date_h = $emp->birth_date_h;
    $type_card_row = $emp->type_card;
    $dest_card_row = $emp->dest_card;
    $esdar_date = $emp->esdar_date;
    $esdar_date_m = $emp->esdar_date_m;
    $esdar_date_h = $emp->esdar_date_h;
    $end_date = $emp->end_date;
    $end_date_m = $emp->end_date_m;
    $end_date_h = $emp->end_date_h;
    $adress = $emp->adress;
    $adress_other = $emp->adress_other;
    $email = $emp->email;
    $nationality_row = $emp->nationality;
    $deyana_row = $emp->deyana;
    $city_id_fk = $emp->city_id_fk;
    $hai_id_fk = $emp->hai_id_fk;
    $street = $emp->street_name;

    //  $age= date("Y-m-d") - $birth_date;
//echo date("Y-m-d");
    /*
    $date=$birth_date;
    $birth_year = date('Y',strtotime($date));
    $age =   date('Y') - $birth_year; */
    $array_date = explode("/", $birth_date_h);
    if (isset($array_date[2])) {
        $age = $current_hijry_year - $array_date[2];
    } else {
        $age = "";
    }
    $another_phone = $emp->another_phone;
    $tahwela_rkm = $emp->tahwela_rkm;
    $snap_chat = $emp->snap_chat;
    $twiter = $emp->twiter;
    $out['form'] = 'human_resources/Human_resources/edit_emp/' . $this->uri->segment(4);
} else {
    $name = "";
    if (!empty($last_emp_code)) {
        $emp_code = $last_emp_code + 1;
    } else {
        $emp_code = 0;
    }
    $card_num = "";
    $gender = "";
    $bank = "";
    $bank_num = "";
    $status = "";
    $phone = "";
    $personal_photo = "";
    $birth_date = "";
    $birth_date_m = "";
    $birth_date_h = "";
    $type_card_row = "";
    $dest_card_row = "";
    $esdar_date = "";
    $esdar_date_m = "";
    $esdar_date_h = "";
    $end_date = "";
    $end_date_m = "";
    $end_date_h = "";
    $adress = "";
    $adress_other = "";
    $email = "";
    $nationality_row = "";
    $deyana_row = "";
    $age = '';
    $city_id_fk = '';
    $hai_id_fk = '';
    $street = '';
    $city_name = '';
    $hai_name = '';
    $nationality_name='';
    $dest_card_name='';
    $another_phone = "";
    $tahwela_rkm = "";
    $snap_chat = "";
    $twiter = "";
    $status_name="";
    $out['form'] = 'human_resources/Human_resources/add_personal_data';
}
?>
<?php
?>
<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <!--<h3 class="panel-title"><?php echo $title; ?></h3>-->
            <div class="pull-left">
                <?php if (isset($personal_data) && !empty($personal_data)) {
                    $data_load["emp_code"] = $personal_data[0]->emp_code;
                    $data_load["id"] = $emp->id;
                    $this->load->view('admin/Human_resources/drop_down_menu', $data_load);
                } ?>
            </div>
            <!-- <div class="pull-left">
                <?php $data_load["emp_code"] = $personal_data[0]->emp_code;
            $data_load["id"] = $this->uri->segment(4);
            $this->load->view('admin/Human_resources/drop_down_menu', $data_load); ?>
            </div> -->
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart($out['form']) ?>
            <div class="col-md-10 padding-4">
                <div class="form-group col-md-1 col-sm-6 padding-4">
                    <label class="label">الرقم الوظيفي</label>
                    <input type="text" name="emp_code" id="emp_code" value="<?php echo $emp_code; ?>"
                           class="form-control "
                        <?php if (!empty($emp_code)) {
                            echo 'readonly';
                        } else {
                            echo 'data-validation="required"';
                        } ?>
                           data-validation-has-keyup-event="true">
                </div>
                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label text-center">إسم الموظف</label>
                    <input type="text" name="name" id="name3" value="<?php echo $name; ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true">
                </div>
                <div class="form-group col-md-1 col-sm-6 padding-4">
                    <label class="label ">النوع </label>
                    <select name="gender" id="gender_id3"
                            data-validation="required" class="form-control "
                            aria-required="true">
                        <?php
                        if (isset($gender_data) && !empty($gender_data)) {
                            foreach ($gender_data as $row) {
                                ?>
                                <option value="<?php echo $row->id_setting; ?>"<?php if ($row->id_setting == $gender) {
                                    echo 'selected';
                                } ?>> <?php echo $row->title_setting; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <!-- <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label">الجنسيه</label>
                    <select id="nationality" data-validation="required" class="form-control "
                            name="nationality">
                        <option value="">إختر</option>
                        <?php
                        foreach ($nationality as $row) {
                            ?>
                            <option value="<?php echo $row->id_setting; ?>" <?php if ($row->id_setting == $nationality_row) {
                                echo 'selected';
                            } ?>> <?php echo $row->title_setting; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div> -->
                <!-- yara -->
                <div class="form-group col-md-2 col-sm-6 padding-4" 
                     >
                    <label class="label  ">الجنسيه</label>
                    <input type="text" name="nationality_fk" id="nationality_fk"  
                           class="form-control testButton inputclass" 

                          
                           value="<?php echo $nationality_name; ?>"
                           style="cursor:pointer; width:75%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_family').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="nationality" id="nationality" 
                            class="form-control "  value="<?php echo $nationality_row; ?>"
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_family" 
                    onclick="get_details_nationality()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>
                <!-- yara -->
                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label">الديانه</label>
                    <select id="deyana" class="form-control "
                            name="deyana" data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        if (isset($deyana) && !empty($deyana)) {
                            foreach ($deyana as $row) {
                                ?>
                                <option value="<?php echo $row->id_setting; ?>"<?php if ($row->id_setting == $deyana_row) {
                                    echo 'selected';
                                } ?>> <?php echo $row->title_setting; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>


                <!-- <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label">الحاله الاجتماعيه </label>
                    <select name="status"
                            class="form-control bottom-input" id="status3" data-validation="required">
                        <option value="">اختر</option>
                        <?php
                        if (isset($social_status) && !empty($social_status)) {
                            foreach ($social_status as $row) {
                                ?>
                                <option value="<?php echo $row->id_setting; ?>"<?php if ($row->id_setting == $status) {
                                    echo 'selected';
                                } ?>> <?php echo $row->title_setting; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div> -->
                <!-- yara -->
                <div class="form-group col-md-3 col-sm-6 padding-4" 
                     >
                    <label class="label  ">الحاله الاجتماعيه</label>
                    <input type="text" name="status_name" id="status_name"  value="<?php echo $status_name ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:79%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_mo2hl').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="status" id="status" 
                           value="<?php echo $status ?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_mo2hl"
                    onclick="get_details_status()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>
                <!-- yara -->
                <!-- date -->


                <div class="form-group col-md-3  col-sm-6 padding-4">

                    <label class="label text-center">
                        <img style="width: 18px;float: right;"
                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                        تاريخ الميلاد
                        <img style="width: 18px;float: left;"
                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                    </label>

                    <div id="cal-2" style="width: 50%;float: right;">
                        <input id="date-Hijri" name="birth_date_h" class="form-control bottom-input "
                               data-validation="required"
                               type="text" onfocus="showCal2();" value="<?php echo $birth_date_h; ?>"
                               onchange="getAge($(this).val());"
                               style=" width: 100%;float: right"/>

                    </div>


                    <div id="cal-1" style="width: 50%;float: left;">
                        <input id="date-Miladi" name="birth_date_m" class="form-control bottom-input  "
                               value="<?php echo $birth_date_m; ?>" data-validation="required"
                               type="text" onfocus="showCal1();" style=" width: 100%;float: right"/>

                    </div>
                </div>

                <!--  date-->
                <div class="form-group col-md-1 col-sm-6 padding-4">
                    <label class="label">العمر</label>
                    <input type="text" name="age" id="age" value="<?php echo $age; ?>"
                           class="form-control "
                           data-validation-has-keyup-event="true" readonly>
                </div>


                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> رقم الجوال <span class="span-allow"> (10ارقام) </span></label>
                    <input type="text" name="phone" maxlength="10" onkeyup="get_length($(this).val(),'tel');"
                           data-validation="required" id="phone3" value="<?php echo $phone; ?>"
                           class="form-control "
                           data-validation-has-keyup-event="true" onkeypress="validate_number(event);">
                    <small id="tel" class="myspan" style="color: red;"></small>
                </div>


                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label">رقم جوال أخر </label>
                    <input type="text" maxlength="10" name="another_phone" onkeypress="validate_number(event)"
                           onkeyup="get_length($(this).val(),'tel_another');" value="<?php echo $another_phone; ?>"
                           class="form-control " data-validation-has-keyup-event="true">
                    <small id="tel_another" class="myspan" style="color: red;"></small>
                </div>


                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label">رقم التحويلة </label>
                    <input type="text" maxlength="10" name="tahwela_rkm" onkeypress="validate_number(event)"
                            value="<?php echo $tahwela_rkm; ?>"
                           class="form-control " data-validation-has-keyup-event="true">
                </div>


                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label">نوع الهوية </label>
                    <select id="type_card" class="form-control " data-validation="required"
                            name="type_card">
                        <option value="">إختر</option>
                        <?php
                        if (isset($type_card) && !empty($type_card)) {
                            foreach ($type_card as $row) {
                                ?>
                                <option value="<?php echo $row->id_setting; ?>"<?php if ($row->id_setting == $type_card_row) {
                                    echo 'selected';
                                } ?>> <?php echo $row->title_setting; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> رقم الهويه <span class="span-allow"> (10ارقام) </span></label>
                    <input type="text" name="card_num" id="card_num" onkeyup="get_length($(this).val(),'hint');"
                           maxlength="10" data-validation="required" value="<?php echo $card_num; ?>"
                           class="form-control "
                           data-validation-has-keyup-event="true" onkeypress="validate_number(event);">
                    <!--  <div id="hint" style="color: red;"></div>-->
                    <small id="hint" class="myspan" style="color: red;"></small>
                </div>
                <!-- <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">جهه الاصدار </label>
                    <select id="dest_card" name="dest_card" class="form-control " data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        if (isset($dest_card) && !empty($dest_card)) {
                            foreach ($dest_card as $row) {
                                ?>
                                <option value="<?php echo $row->id_setting; ?>"<?php if ($row->id_setting == $dest_card_row) {
                                    echo 'selected';
                                } ?>> <?php echo $row->title_setting; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div> -->
                  <div class="form-group col-md-2 col-sm-6 padding-4" 
                     >
                    <label class="label  ">جهه الاصدار</label>
                    <input type="text" name="geha_esdar_name" id="geha_esdar_name" value="<?php echo $dest_card_name;?> "
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:75%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_esdar').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="dest_card" id="dest_card"  value="<?php echo $dest_card_row;?> "
                           value=" " class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_esdar" 
                    onclick="get_details_esdar()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="form-group col-md-3  col-sm-6 padding-4">

                    <label class="label text-center">
                        <img style="width: 18px;float: right;"
                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                        تاريخ الاصدار
                        <img style="width: 18px;float: left;"
                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                    </label>

                    <div id="cal-4" style="width: 50%;float: right;">
                        <input id="date-Hijri1" name="esdar_date_h" class="form-control bottom-input "
                               data-validation="required"
                               type="text" onfocus="showCal4();" value="<?php echo $esdar_date_h; ?>"
                               style=" width: 100%;float: right"/>

                    </div>


                    <div id="cal-3" style="width: 50%;float: left;">
                        <input id="date-Miladi1" name="esdar_date_m" class="form-control bottom-input  "
                               data-validation="required" value="<?php echo $esdar_date_m; ?>"
                               type="text" onfocus="showCal3();" style=" width: 100%;float: right"/>

                    </div>
                </div>
                <div class="form-group col-md-3  col-sm-6 padding-4">

                    <label class="label text-center">
                        <img style="width: 18px;float: right;"
                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                        تاريخ الانتهاء
                        <img style="width: 18px;float: left;"
                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                    </label>

                    <div id="cal-6" style="width: 50%;float: right;">
                        <input id="date-Hijri2" name="end_date_h" class="form-control bottom-input "
                               data-validation="required"
                               type="text" onfocus="showCal6();" value="<?php echo $end_date_h; ?>"
                               style=" width: 100%;float: right"/>

                    </div>


                    <div id="cal-5" style="width: 50%;float: left;">
                        <input id="date-Miladi2" name="end_date_m" class="form-control bottom-input  "
                               value="<?php echo $end_date_m; ?>"
                               type="text" onfocus="showCal5();" style=" width: 100%;float: right"/>

                    </div>
                </div>
                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> المدينه</label>
                    <input type="text" id="city_name" data-validation="required" value="<?php echo $city_name ?>"
                           class="form-control " data-validation-has-keyup-event="true" style="width: 77%;float: right;"
                           readonly>
                    <input type="hidden" name="city_id_fk" id="city_id_fk" data-validation="required"
                           value="<?php echo $city_id_fk ?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>
                    <button type="button" data-toggle="modal" data-target="#myModalInfo"
                            class="btn btn-success btn-next" style="float: right;" onclick="GetDiv('myDiv')">
                        <i class="fa fa-plus"></i></button>
                </div>

                <input type="hidden" name="motbr3_id_fk" id="motbr3_id_fk">
                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> الحي</label>
                    <input type="text" id="hai_name" data-validation="required" value="<?php echo $hai_name ?>"
                           class="form-control " data-validation-has-keyup-event="true" readonly>
                    <input type="hidden" name="hai_id_fk" id="hai_id_fk" data-validation="required"
                           value="<?php echo $hai_id_fk ?>" class="form-control " data-validation-has-keyup-event="true"
                           readonly>
                </div>


                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">اسم الشارع</label>
                    <input type="text" name="street_name" data-validation="required" value="<?php echo $street; ?>"
                           class="form-control " data-validation-has-keyup-event="true">
                </div>
                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">العنوان الوطني</label>
                    <input type="text" name="adress" id="adress" onkeypress="validate_number(event);"
                           data-validation="required" value=" <?php echo $adress; ?>" class="form-control ">
                </div>


                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">العنوان في بلد المقيم</label>
                    <!--
                    <textarea name="adress_other" id="adress_other"  data-validation="required" class="form-control bottom-input">  <?php echo $adress_other; ?>     </textarea>
               -->
                    <input type="text" name="adress_other" id="adress_other" data-validation="required"
                           value=" <?php echo $adress_other; ?>" class="form-control ">
                </div>
                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">البريد الإلكتروني</label>
                    <input type="email" name="email" id="email" data-validation="email" value="<?php echo $email; ?>"
                           class="form-control "
                           data-validation-has-keyup-event="true">
                </div>
                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> سناب شات </label>
                    <input type="text" name="snap_chat" id="email" value="<?php echo $snap_chat; ?>"
                           class="form-control "/>
                </div>


                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> تويتر </label>
                    <input type="text" name="twiter" value="<?php echo $twiter; ?>"
                           class="form-control "/>
                </div>


                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label" style="width: 100%">الصوره الشخصيه </label>
                    <input id="person_img" onchange="readURL(this);" name="img" style="padding: 0;"
                           class="form-control " type="file">
                </div>


                <div class="col-xs-12 text-center">
                    <button type="submit" id="save" name="add" value="save"
                            onclick="insertData();" class="btn btn-labeled btn-success "
                            style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                    </button>


                </div>
                <?php echo form_close() ?>

            </div>


            <?php
          
            if (isset($personal_data) && !empty($personal_data)) {
                $data_load["personal_data"] = $personal_data;

                $this->load->view('admin/Human_resources/add_employee/sidebar_person_data', $data_load);
            } else {
                
               
                $data_load["personal_data"] = '';

                $this->load->view('admin/Human_resources/add_employee/sidebar_person_data');
                
                
                  } ?>


        </div>
    </div>


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

<!------------------------------------------------------------------>

<!------ table -------->
<?php
if(isset($customer_js)&&!empty($customer_js))
{ ?> 
    
    <div class="col-xs-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات الموظفين</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12 no-padding">

                <table id="js_table_customer" 
   
   class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
                        <thead>
                        <tr class="info">
                            <th class="text-center">م</th>
                            <th>كود الموظف</th>
                            <th class="text-center">إسم الموظف</th>
                            <th>رقم الجول</th>
                            <th>رقم الهوية</th>
                            <th>الجنسية</th>
                            <th>الحالة</th>

                            <th class="text-center">الاجراءات</th>
                        </tr>
                        </thead>
                        <?php

   
echo $customer_js;
 
    
?>       
                    </table>

                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!----- end table ------>
<!-- yara -->
<div class="modal fade" id="Modal_family" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> اضافه جنسيه اخري </h4>
            </div>
            <div class="modal-body">


                <div id="geha_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة 
                                     جنسيه
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">الجنسيه </label>
                                    <input type="text" name="nationality_name" id="nationality_name" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add" style="display: block;">
                                    <button type="button" onclick="add_geha($('#nationality_name').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha"><br><br>
                  
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<!-- yara -->
<div class="modal fade" id="Modal_esdar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">  جهه الاصدار </h4>
            </div>
            <div class="modal-body">


                <div id="esdar_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input11').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة 
                                    جهه الاصدار
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input11" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">جهه الاصدار </label>
                                    <input type="text" name="esdar" id="esdar" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_esdar" style="display: block;">
                                    <button type="button" onclick="add_esdar($('#esdar').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_esdar" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_esdar">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha11"><br><br>
                   
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<!-- yara -->
<div class="modal fade" id="Modal_mo2hl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">   الحاله الاجتماعيه </h4>
            </div>
            <div class="modal-body">


                <div id="mo2hl_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input1').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة 
                                     حاله اجتماعيه
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input1" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">الحاله الاجتماعيه </label>
                                    <input type="text" name="status_fk" id="status_fk" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_mo2hl" style="display: block;">
                                    <button type="button" onclick="add_status($('#status_fk').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_mo2hl" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_mo2hl">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha1"><br><br>
                   
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- yara -->
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
    var loadFile = function (event) {
        var output = document.getElementById('profile-img-tag');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>


<script type="text/javascript">
    jQuery(function ($) {
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>
<script>
    function getAge(birth) {
        var birth_date = birth;
        var res = birth_date.split("/");
        var year_birth = res[2];
        var current_year = '<?php echo $current_hijry_year?>';
        var ageYear = parseFloat(current_year) - parseFloat(year_birth);
        console.log('ffff' + ageYear);
        $('#age').val(ageYear + 'سنه');
        /*  ageMS = Date.parse(Date()) - Date.parse(birth);
         age = new Date();
         age.setTime(ageMS);
         ageYear = age.getFullYear() - 1970;
         $('#age').val(ageYear+'سنه'); */
        //  return ageYear;
    }
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
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    function length_hesab_om(length) {
        var len = length.length;
        if (len < 24) {
            alert(" رقم الحساب لابد الايقل عن 24 حرف او رقم");
        }
        if (len > 24) {
            alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
        }
        if (len == 24) {
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
    function get_banck_code(valu) {
        var valu = valu.split("-");
        $('#bank_code').val(valu[1]);
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
<!--
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
                        document.getElementById("hai_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("hai_id_fk").setAttribute("data-validation", "required");
                        $('#hai_id_fk').html(html);
                    }
                });
            }else if(city_id == '' ) {
                $("#hai_id_fk").val('');
                document.getElementById("hai_id_fk").setAttribute("disabled", "disabled");
                document.getElementById("hai_id_fk").removeAttribute("data-validation", "required");
            }
        }
    </script>
    -->
<script>
    function getAhai(city_id) {
        if (city_id != '') {
            var dataString = 'city_id=' + city_id;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getAhai',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#hai_id_fk').addClass("selectpicker");
                    document.getElementById("hai_id_fk").removeAttribute("disabled", "disabled");
                    document.getElementById("hai_id_fk").setAttribute("data-validation", "required");
                    document.getElementById("hai_id_fk").setAttribute("data-show-subtext", "true");
                    document.getElementById("hai_id_fk").setAttribute("data-live-search", "true");
                    $('#hai_id_fk').html(html);
                    $('#hai_id_fk').selectpicker("refresh");
                }
            });
        } else if (city_id == '') {

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
<!--  -->
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>

    var loop1 = 0;
    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    date1.setAttribute("value", cal1.getDate().getDateString());
    date2.setAttribute("value", cal2.getDate().getDateString());

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    setDateFields1();


    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal2.setTime(cal1.getTime());
        setDateFields1();
    };

    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal1.setTime(cal2.getTime());
        setDateFields1();
    };


    cal1.onHide = function () {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function () {
        cal2.show(); // prevent the widget from being closed
    };

    function setDateFields1() {
        if (loop1 === 0) {
            <?php if (isset($birth_date_m) && !empty($birth_date_m)) {  ?>
            loop1++;
            date1.value = '<?=$birth_date_m?>';
            date2.value = '<?=$birth_date_h?>';
            <?php }else{ ?>
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
            getAge(date2.value);
            <?php  } ?>
        } else {
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
            getAge(date2.value);
        }
        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
    }


    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }

    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();
    }


</script>
<script>

    var loop2 = 0;
    var cal3 = new Calendar(),
        cal4 = new Calendar(true, 0, true, true),
        date3 = document.getElementById('date-Miladi1'),
        date4 = document.getElementById('date-Hijri1'),
        cal3Mode = cal3.isHijriMode(),
        cal4Mode = cal4.isHijriMode();


    date3.setAttribute("value", cal3.getDate().getDateString());
    date4.setAttribute("value", cal4.getDate().getDateString());

    document.getElementById('cal-3').appendChild(cal3.getElement());
    document.getElementById('cal-4').appendChild(cal4.getElement());


    cal3.show();
    cal4.show();
    setDateFields2();


    cal3.callback = function () {
        if (cal3Mode !== cal1.isHijriMode()) {
            cal4.disableCallback(true);
            cal4.changeDateMode();
            cal4.disableCallback(false);
            cal3Mode = cal3.isHijriMode();
            cal4Mode = cal4.isHijriMode();
        } else

            cal4.setTime(cal3.getTime());
        setDateFields2();
    };

    cal4.callback = function () {
        if (cal4Mode !== cal4.isHijriMode()) {
            cal3.disableCallback(true);
            cal3.changeDateMode();
            cal3.disableCallback(false);
            cal3Mode = cal3.isHijriMode();
            cal4Mode = cal4.isHijriMode();
        } else

            cal3.setTime(cal4.getTime());
        setDateFields2();
    };


    cal3.onHide = function () {
        cal3.show(); // prevent the widget from being closed
    };

    cal4.onHide = function () {
        cal4.show(); // prevent the widget from being closed
    };

    function setDateFields2() {
        if (loop2 === 0) {
            <?php if (isset($esdar_date_m) && !empty($esdar_date_m)) {  ?>
            loop2++;
            date3.value = '<?=$esdar_date_m?>';
            date4.value = '<?=$esdar_date_h?>';
            <?php }else{ ?>
            date3.value = cal3.getDate().getDateString();
            date4.value = cal4.getDate().getDateString();
            <?php  } ?>
        } else {
            date3.value = cal3.getDate().getDateString();
            date4.value = cal4.getDate().getDateString();
        }
        date3.setAttribute("value", cal3.getDate().getDateString());
        date4.setAttribute("value", cal4.getDate().getDateString());
    }


    function showCal3() {
        if (cal3.isHidden())
            cal3.show();
        else
            cal3.hide();
    }

    function showCal4() {
        if (cal4.isHidden())
            cal4.show();
        else
            cal4.hide();
    }


</script>
<script>

    var loop3 = 0;
    var cal5 = new Calendar(),
        cal6 = new Calendar(true, 0, true, true),
        date5 = document.getElementById('date-Miladi2'),
        date6 = document.getElementById('date-Hijri2'),
        cal5Mode = cal5.isHijriMode(),
        cal6Mode = cal6.isHijriMode();


    date5.setAttribute("value", cal5.getDate().getDateString());
    date6.setAttribute("value", cal6.getDate().getDateString());

    document.getElementById('cal-5').appendChild(cal5.getElement());
    document.getElementById('cal-6').appendChild(cal6.getElement());


    cal5.show();
    cal6.show();
    setDateFields3();


    cal5.callback = function () {
        if (cal5Mode !== cal5.isHijriMode()) {
            cal6.disableCallback(true);
            cal6.changeDateMode();
            cal6.disableCallback(false);
            cal5Mode = cal5.isHijriMode();
            cal6Mode = cal6.isHijriMode();
        } else

            cal6.setTime(cal5.getTime());
        setDateFields3();
    };

    cal6.callback = function () {
        if (cal6Mode !== cal6.isHijriMode()) {
            cal5.disableCallback(true);
            cal5.changeDateMode();
            cal5.disableCallback(false);
            cal5Mode = cal5.isHijriMode();
            cal6Mode = cal6.isHijriMode();
        } else

            cal5.setTime(cal6.getTime());
        setDateFields3();
    };


    cal5.onHide = function () {
        cal5.show(); // prevent the widget from being closed
    };

    cal6.onHide = function () {
        cal6.show(); // prevent the widget from being closed
    };

    function setDateFields3() {
        if (loop3 === 0) {
            <?php if (isset($end_date_m) && !empty($end_date_m)) {  ?>
            loop3++;
            date5.value = '<?=$end_date_m?>';
            date6.value = '<?=$end_date_h?>';
            <?php }else{ ?>
            date5.value = cal5.getDate().getDateString();
            date6.value = cal6.getDate().getDateString();
            <?php  } ?>
        } else {
            date5.value = cal5.getDate().getDateString();
            date6.value = cal6.getDate().getDateString();
        }
        date5.setAttribute("value", cal5.getDate().getDateString());
        date6.setAttribute("value", cal6.getDate().getDateString());
    }


    function showCal5() {
        if (cal5.isHidden())
            cal5.show();
        else
            cal5.hide();
    }

    function showCal6() {
        if (cal6.isHidden())
            cal6.show();
        else
            cal6.hide();
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
<!-- yara_nationality -->
<script>
    function get_details_nationality() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/Human_resources/load_nationality",
            
            // beforeSend: function () {
            //     $('#myDiv_geha').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha').html(d);

            }

        });
    }
</script>
<script>
    function getTitle(value,id) {


        $('#nationality').val(id);
        $('#nationality_fk').val(value);

        $('#Modal_family').modal('hide');
    }
</script>
<script>
  
    function add_geha(value) {

        $('#div_update').hide();
        $('#div_add').show();
        //  alert(value);

       
        if (value != 0 && value != '' ) {
            var dataString = 'nationality=' + value ;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/add_nationality',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {

                  //  $('#reason').val(' ');
                  $('#nationality_name').val('');
                //  $('#Modal_family').modal('hide');
                    swal({
                        title: "تم الحفظ بنجاح!",
  
  
        }
        );
        get_details_nationality();
                }
            });
        }

    }


</script>
<script>
    function update_nationality(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add').hide();
        $('#div_update').show();


        $.ajax({
            url: "<?php echo base_url() ?>human_resources/Human_resources/getById",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               // console.log(obj.title_setting);

                $('#nationality_name').val(obj.title_setting);


            }

        });

        $('#update').on('click', function () {
            var nationality = $('#nationality_name').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>human_resources/Human_resources/update_nationality",
                type: "Post",
                dataType: "html",
                data: {nationality: nationality,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#nationality_name').val('');
                    $('#div_update').hide();
                    $('#div_add').show();
                   // $('#Modal_family').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_nationality();
                    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_nationality(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/delete_nationality',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#nationality_name').val('');
                   // $('#Modal_family').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_nationality();

                }
            });
        }

    }
</script>
<!-- esdar -->
<script>
    function get_details_esdar() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/load_esdar",
            
            // beforeSend: function () {
            //     $('#myDiv_geha11').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha11').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_esdar(value,id) {


        $('#dest_card').val(id);
        $('#geha_esdar_name').val(value);

        $('#Modal_esdar').modal('hide');
    }
</script>
<script>
  
  function add_esdar(value) {

      $('#div_update_esdar').hide();
      $('#div_add_esdar').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'esdar=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/add_esdar',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#esdar').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ بنجاح!",


      }
      );
      get_details_esdar();

              }
          });
      }

  }


</script>
<script>
    function update_esdar(id) {
        var id = id;
        $('#geha_input11').show();
        $('#div_add_esdar').hide();
        $('#div_update_esdar').show();


        $.ajax({
            url: "<?php echo base_url() ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/getById_esdar",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               // console.log(obj.title_setting);

                $('#esdar').val(obj.title_setting);


            }

        });

        $('#update_esdar').on('click', function () {
            var esdar = $('#esdar').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/update_esdar",
                type: "Post",
                dataType: "html",
                data: {esdar: esdar,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#esdar').val('');
                    $('#div_update_esdar').hide();
                    $('#div_add_esdar').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_esdar();    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_esdar(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
             var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/delete_esdar',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#esdar').val('');
                   // $('#Modal_esdar').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_esdar();

                }
            });
        }

    }
</script>
<!-- yara -->
<script>
    function get_details_status() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/Human_resources/load_status",
            
            // beforeSend: function () {
            //     $('#myDiv_geha1').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha1').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_status(value,id) {


        $('#status').val(id);

        $('#status_name').val(value);
        $('#Modal_mo2hl').modal('hide');
    }
</script>
<script>
  
  function add_status(value) {

      $('#div_update_mo2hl').hide();
      $('#div_add_mo2hl').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'status_fk=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>human_resources/Human_resources/add_status',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#status_fk').val('');
              //  $('#Modal_mo2hl').modal('hide');
                  swal({
                      title: "تم الحفظ بنجاح!",


      }
      );
      get_details_status();
              }
          });
      }

  }


</script>
<script>
    function update_status(id) {
        var id = id;
        $('#geha_input1').show();
        $('#div_add_mo2hl').hide();
        $('#div_update_mo2hl').show();


        $.ajax({
            url: "<?php echo base_url() ?>human_resources/Human_resources/getById_status",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               // console.log(obj.title_setting);

                $('#status_fk').val(obj.title_setting);


            }

        });

        $('#update_mo2hl').on('click', function () {
            var status_fk = $('#status_fk').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>human_resources/Human_resources/update_status",
                type: "Post",
                dataType: "html",
                data: {status_fk: status_fk,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#status_fk').val('');
                    $('#div_update_mo2hl').hide();
                    $('#div_add_mo2hl').show();
                   // $('#Modal_mo2hl').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_status();     

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_status(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
             var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/delete_status',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#status_fk').val('');
                    //$('#Modal_mo2hl').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_status();

                }
            });
        }

    }
</script>
<script>
    function print_employee_details(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/Human_resources/print_employee_details'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }


</script> 

<script>
    function print_card(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/Human_resources/print_card'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }


</script> 