<div class="profile-charity">
    <div class="container-fluid no-padding-right">
        <div class="grouped-side">
            <div class="aside-sidebar hidden-xs ">
                <?php
                $data['person_data'] = $person_data;
                $data['odwia_data'] = $odwia_data;

                $this->load->view('gam3ia_omomia/require/side_bar', $data); ?>
            </div>
            <div class="aside-tabs">
                <!-- Nav tabs -->
                <div class="speed-links">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#profile-tab1" aria-controls="profile-tab1"
                                                                  role="tab" data-toggle="tab">الملف الشخصي</a></li>
                        <li role="presentation"><a href="#profile-tab2" aria-controls="profile-tab2" role="tab"
                                                   data-toggle="tab"> الجمعية العمومية</a></li>
                        <li role="presentation"><a href="#profile-tab3" aria-controls="profile-tab3" role="tab"
                                                   data-toggle="tab">الموارد البشرية </a></li>
                        <li role="presentation"><a href="#profile-tab4" aria-controls="profile-tab4" role="tab"
                                                   data-toggle="tab">الرعاية الإجتماعية </a></li>
                        <li role="presentation"><a href="#profile-tab5" aria-controls="profile-tab5" role="tab"
                                                   data-toggle="tab">الموارد المالية</a></li>
                        <li role="presentation"><a href="#profile-tab6" aria-controls="profile-tab6" role="tab"
                                                   data-toggle="tab"> الإيرادات والمصروفات </a></li>
                        <li role="presentation" style="display:none;"><a href="#profile-tab7"
                                                                         aria-controls="profile-tab7" role="tab"
                                                                         data-toggle="tab"> </a></li>

                        <li role="presentation" style="display: none;" class="profile-tab8"><a href="#profile-tab8"
                                                                                               aria-controls="profile-tab8"
                                                                                               role="tab"
                                                                                               data-toggle="tab"> عرض
                                المحضر </a></li>

                    </ul>
                </div>
            </div>

        </div>


        <div class="left-warrper">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="profile-tab1">
                    <div style="margin-top: 10px">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                                      data-toggle="tab">بيانات الاساسية</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                                       data-toggle="tab">بيانات العضوية</a></li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="col-xs-12 padding-4">
                                    <!-- yara -->
                                    <h5 class="title-style"><i class="fa fa-pencil"></i> تعديل بيانات حسابى</h5>
                                </div>
                                <?php
                             //   echo '<pre>'; print_r($result);
                                if (isset($result) && !empty($result)) {
                                    $name = $result->name;
                                    $memb_id = $result->id;
                                    $card_num = $result->card_num;
                                    $gns = $result->gns;
                                    $laqb_fk = $result->laqb_fk;
                                    $gnsia_fk = $result->gnsia_fk;
                                    $hala_egtma3ia_fk = $result->hala_egtma3ia_fk;
                                    $geha_esdar_fk = $result->geha_esdar_fk;
                                    $birth_date_m = $result->birth_date_m;
                                    $jwal = $result->jwal;
                                    $jwal_another = $result->jwal_another;
                                    $madina_fk = $result->madina_fk;
                                    $hai_fk = $result->hai_fk;
                                    $street_name = $result->street_name;
                                    $enwan_watni = $result->enwan_watni;
                                    $email = $result->email;
                                    $daraga_3elmia_fk = $result->daraga_3elmia_fk;
                                    $moahel_3elmi_fk = $result->moahel_3elmi_fk;
                                    $hya_3elmia_fk = $result->hya_3elmia_fk;
                                    $mehna_fk = $result->mehna_fk;
                                    $geha_amal = $result->geha_amal;
                                    $enwan_amal = $result->enwan_amal;
                                    $hatf_amal = $result->hatf_amal;
                                    $map_google_lng = $result->map_google_lng;
                                    $map_google_lat = $result->map_google_lat;
                                    $mem_img = $result->mem_img;
                                    $esdar_date_h = $result->esdar_date_h;
                                    $birth_date_h = $result->birth_date_h;
                                    $note = $result->note;
                                    // yara
                                    $user_name=$result->memb_user_name;
                                    $user_password=$result->memb_password;

                                    $array_date = explode("/", $birth_date_h);
                                    if (isset($array_date[2])) {
                                        $age = $current_hijry_year - $array_date[2] . " سنة ";
                                    } else {
                                        $age = "0 سنة";
                                    }

                                    $out['form'] = 'gam3ia_omomia/Gam3ia_omomia/update_gam3ia_member/' . $result->id;
                                    $card_img = $result->card_img;
                                    $morfaqs = array($result->morfaq1, $result->morfaq2, $result->morfaq3, $result->morfaq4);


                                } else {

                                    $name = '';
                                    $memb_id = '';
                                    $card_num = '';
                                    $gns = '';
                                    $laqb_fk = '';
                                    $gnsia_fk = '';
                                    $hala_egtma3ia_fk = '';
                                    $geha_esdar_fk = '';
                                    $birth_date_m = '';
                                    $jwal = '';
                                    $jwal_another = '';
                                    $madina_fk = '';
                                    $hai_fk = '';
                                    $street_name = '';
                                    $enwan_watni = '';
                                    $email = '';
                                    $daraga_3elmia_fk = '';
                                    $moahel_3elmi_fk = '';
                                    $hya_3elmia_fk = '';
                                    $mehna_fk = '';
                                    $geha_amal = '';
                                    $enwan_amal = '';
                                    $hatf_amal = '';
                                    $map_google_lng = '';
                                    $map_google_lat = '';
                                    $mem_img = '';
                                    $esdar_date_h = '';
                                    $birth_date_h = '';
                                    $age = '';
                                    $note = '';
                                    // yara
                                    $user_name='';
                                    $user_password='';
                                    $out['form'] = 'gam3ia_omomia/Gam3ia_omomia/update_gam3ia_member';
                                }
                                ?>
                                <?php echo form_open_multipart($out['form']) ?>

                                <div class="col-md-12">
                                    <div class="form-group col-md-5 col-sm-6 padding-4">
                                        <label class="label">إسم العضو</label>
                                        <input type="text" name="name" id="name" value="<?php echo $name; ?>"
                                               class="form-control "
                                               data-validation="required"
                                               data-validation-has-keyup-event="true">
                                        <input type="hidden" id="memb_id" name="memb_id"
                                               value="<?php
                                               echo $memb_id;
                                               ?> ">
                                    </div>
                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label ">الجنس </label>
                                        <select name="gns" id="gender_id_fk"
                                                class="form-control "
                                                aria-required="true">
                                            <option value="">إختر</option>
                                            <?php
                                            if (isset($gender_data) && !empty($gender_data)) {
                                                foreach ($gender_data as $row) {
                                                    ?>

                                                    <option value="<?php echo $row->id_setting; ?>"
                                                        <?php if (!empty($gns)) {
                                                            if ($row->id_setting == $gns) {
                                                                echo 'selected';
                                                            }
                                                        } ?>> <?php echo $row->title_setting; ?></option>

                                                    <?php

                                                }
                                            }
                                            ?>
                                        </select>


                                    </div>

                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label ">الجنسيه</label>
                                        <select id="nationality_id_fk" class="form-control "
                                                name="gnsia_fk">
                                            <option value="">إختر</option>
                                            <?php
                                            foreach ($nationality as $row) {
                                                ?>
                                                <option value="<?php echo $row->id_setting; ?>"
                                                    <?php if (!empty($gnsia_fk)) {
                                                        if ($row->id_setting == $gnsia_fk) {
                                                            echo 'selected';
                                                        }
                                                    } ?>> <?php echo $row->title_setting; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">اللقب</label>
                                        <select name="laqb_fk" class="form-control " id="surname">
                                            <option value="">اختر</option>
                                            <?php
                                            if (isset($surname_arr) && !empty($surname_arr)) {
                                                foreach ($surname_arr as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id_setting; ?>"
                                                        <?php if (!empty($hala_egtma3ia_fk)) {
                                                            if ($row->id_setting == $laqb_fk) {
                                                                echo 'selected';
                                                            }
                                                        } ?>> <?php echo $row->title_setting; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label ">الحاله الاجتماعيه </label>
                                        <select name="hala_egtma3ia_fk" class="form-control " id="social_status_id_fk">
                                            <option value="">اختر</option>
                                            <?php
                                            if (isset($social_status) && !empty($social_status)) {
                                                foreach ($social_status as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id_setting; ?>/<?= $row->title_setting ?>"
                                                        <?php if (!empty($hala_egtma3ia_fk)) {
                                                            if ($row->id_setting == $hala_egtma3ia_fk) {
                                                                echo 'selected';
                                                            }
                                                        } ?>> <?php echo $row->title_setting; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label "> رقم الهويه <span
                                                    class="span-allow"> (10ارقام) </span></label>
                                        <input type="text" name="card_num" id="card_num"
                                               onkeyup="get_length($(this).val(),'hint');"
                                               maxlength="10" data-validation="required"
                                               value="<?php echo $card_num; ?>"
                                               class="form-control"
                                               data-validation-has-keyup-event="true"
                                               onkeypress="validate_number(event);">
                                        <small id="hint" class="myspan" style="color: red;"></small>
                                    </div>
                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label ">جهه الاصدار </label>
                                        <select id="esdar_card_fk" name="geha_esdar_fk" class="form-control ">
                                            <option value="">إختر</option>
                                            <?php
                                            if (isset($dest_card) && !empty($dest_card)) {
                                                foreach ($dest_card as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id_setting; ?>/<?php echo $row->title_setting; ?>"
                                                        <?php if (!empty($geha_esdar_fk)) {
                                                            if ($row->id_setting == $geha_esdar_fk) {
                                                                echo 'selected';
                                                            }
                                                        } ?>> <?php echo $row->title_setting; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label" style="text-align: center !important;">
                                            <img style="width: 18px;float: right;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                            تاريخ الاصدار
                                            <img style="width: 18px;float: left;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                        </label>
                                        <div id="cal-2" style="width: 50%;float: right;">
                                            <input id="date-Hijri" name="esdar_date_h" class="form-control "
                                                   type="text" onfocus="showCal2();"
                                                   value="<?php if (!empty($result->esdar_date_h)) {
                                                       echo $result->esdar_date_h;
                                                   } ?>"
                                                   style=" width: 100%;float: right"/>
                                        </div>
                                        <div id="cal-1" style="width: 50%;float: left;">
                                            <input id="date-Miladi" name="esdar_date_m" class="form-control  "
                                                   value="<?php if (!empty($result->esdar_date_m)) {
                                                       echo $result->esdar_date_m;
                                                   } ?>"
                                                   type="text" onfocus="showCal1();" style=" width: 100%;float: right"/>
                                        </div>

                                    </div>


                                    <div class="form-group col-md-3 col-sm-6 padding-4">

                                        <label class="label " style="text-align: center !important;">
                                            <img style="width: 18px;float: right;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                            تاريخ الميلاد
                                            <img style="width: 18px;float: left;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                        </label>

                                        <div id="cal-end-2" style="width: 50%;float: right;">
                                            <input id="date-Hijri-end" name="birth_date_h" class="form-control "
                                                   type="text"
                                                   onfocus="showCalEnd2();"
                                                   value="<?php if (!empty($result->birth_date_h)) {
                                                       echo $result->birth_date_h;
                                                   } ?>" onblur="getAge($(this).val());"
                                                   style=" width: 100%;float: right"/>
                                        </div>
                                        <div id="cal-end-1" style="width: 50%;float: left;">
                                            <input id="date-Miladi-end" name="birth_date_m"
                                                   value="<?php if (!empty($result->birth_date_m)) {
                                                       echo $result->birth_date_m;
                                                   } ?>" class="form-control  birth_date"
                                                   type="text" onfocus="showCalEnd1();"
                                                   style=" width: 100%;float: right"/>
                                        </div>

                                    </div>


                                    <div class="form-group col-md-1 col-sm-6 padding-4">
                                        <label class="label ">العمر</label>
                                        <input type="text" name="age" id="age" value="<?php echo $age; ?>"
                                               class="form-control "
                                               data-validation-has-keyup-event="true" readonly>
                                    </div>


                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label ""> الجوال <span
                                                class="span-allow"> (10ارقام) </span></label>
                                        <input type="text" name="jwal" maxlength="10"
                                               onkeyup="get_length($(this).val(),'tel');"
                                               data-validation="required" id="phone3" value="<?php echo $jwal; ?>"
                                               class="form-control "
                                               data-validation-has-keyup-event="true"
                                               onkeypress="validate_number(event);">
                                        <small id="tel" class="myspan" style="color: red;"></small>
                                    </div>


                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label "> جوال أخر </label>
                                        <input type="text" maxlength="10" name="jwal_another"
                                               onkeypress="validate_number(event)"
                                               onkeyup="get_length($(this).val(),'tel_another');"
                                               value="<?php echo $jwal_another; ?>"
                                               class="form-control " data-validation-has-keyup-event="true">
                                        <small id="tel_another" class="myspan" style="color: red;"></small>
                                    </div>

                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label " title="برجاء الضغط مرتين لتعديل الحي">المدينة</label>
                                        <select id="city_id_fk" name="madina_fk" onchange="getAhai($(this).val());"
                                                ondblclick="getAhai($(this).val());" class="form-control">
                                            <option value="">إختر</option>
                                            <?php
                                            if (isset($cities) && !empty($cities)) {
                                                foreach ($cities as $key => $value) {
                                                    ?>
                                                    <option value="<?php echo $key; ?>/<?php echo $value; ?>"
                                                        <?php if ($key == $madina_fk) {
                                                            echo 'selected';
                                                        } ?>> <?php echo $value; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <?php if (isset($cities) && !empty($cities)) { ?>
                                            <small id="" class="" style="color: red;display: none;">برجاء الضغط مرتين
                                                لتعديل الحي
                                            </small>
                                        <?php }
                                        ?>
                                    </div>

                                    <div class="form-group col-md-2 col-sm-6 padding-4 ">
                                        <label class="label ">الحي</label>
                                        <select id="hai_id_fk" name="hai_fk" class="form-control  nonactive">
                                            <option value="">إختر</option>
                                            <?php if (isset($hai_fk) && !empty($hai_fk)) {
                                                foreach ($ahais as $hay) {
                                                    $select = '';
                                                    if ($hay->id == $hai_fk) {
                                                        $select = 'selected';
                                                    } ?>
                                                    <option <?= $select ?>
                                                            value="<?= $hay->id ?>"> <?= $hay->name ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">اسم الشارع</label>
                                        <input type="text" name="street_name" value="<?php echo $street_name; ?>"
                                               class="form-control "
                                               data-validation-has-keyup-event="true">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">العنوان الوطني</label>
                                        <input type="text" name="enwan_watni" id="national_address"
                                               onkeypress="validate_number(event);"
                                               value=" <?php echo $enwan_watni; ?>" class="form-control ">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">البريد الإلكتروني</label>
                                        <input type="email" name="email" id="email" value="<?php echo $email; ?>"
                                               class="form-control "
                                               data-validation-has-keyup-event="true">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">الدرجة العلمية </label>
                                        <select id="scientific_degree_fk" name="daraga_3elmia_fk"
                                                class="form-control ">
                                            <option value="">إختر</option>
                                            <?php
                                            if (isset($Degree) && !empty($Degree)) {
                                                foreach ($Degree as $value) {
                                                    $select = '';
                                                    if ($value->id_setting == $daraga_3elmia_fk) {
                                                        $select = 'selected';
                                                    } ?>
                                                    ?>
                                                    <option value="<?php echo $value->id_setting; ?>/<?php echo $value->title_setting; ?>" <?= $select ?>>
                                                        <?php echo $value->title_setting; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">المؤهلات العلمية </label>
                                        <select id="qualification_fk" name="moahel_3elmi_fk"
                                                class="form-control ">
                                            <option value="">إختر</option>
                                            <?php
                                            if (isset($science_qualification) && !empty($science_qualification)) {
                                                foreach ($science_qualification as $value) {
                                                    $select = '';
                                                    if ($value->id_setting == $moahel_3elmi_fk) {
                                                        $select = 'selected';
                                                    } ?>
                                                    ?>
                                                    <option value="<?php echo $value->id_setting; ?>/<?php echo $value->title_setting; ?>" <?= $select ?>>
                                                        <?php echo $value->title_setting; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">

                                    <?php $arr = array(1 => 'نعم', 0 => 'لا'); ?>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">الحياة العملية</label>
                                        <select id="working_life" name="hya_3elmia_fk" onchange="GetType(this.value)"
                                                class="form-control">
                                            <option value="">إختر</option>
                                            <?php
                                            foreach ($arr as $key => $value) {
                                                $select = '';
                                                if ($hya_3elmia_fk != '') {
                                                    if ($key == $hya_3elmia_fk) {
                                                        $select = 'selected';
                                                    }
                                                } ?>
                                                <option
                                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">المهنة </label>
                                        <select name="mehna_fk" id="job_name_fk" class="form-control "
                                                <?php if ($hya_3elmia_fk != 1){ ?>disabled="disabled" <?php } ?>
                                                aria-required="true">
                                            <option value="">إختر</option>
                                            <?php foreach ($job_role as $one_job_role) {
                                                $select = '';
                                                if (!empty($mehna_fk)) {
                                                    if ($one_job_role->id_setting == $mehna_fk) {
                                                        $select = 'selected';
                                                    }
                                                } ?>

                                                ?>
                                                <option value="<?php echo $one_job_role->id_setting; ?>/<?php echo $one_job_role->title_setting; ?>" <?= $select ?>
                                                ><?php echo $one_job_role->title_setting; ?></option>';
                                            <?php } ?>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">جهة العمل </label>

                                        <input name="geha_amal" id="job_place_name" style="padding: 0;"
                                               <?php if ($hya_3elmia_fk != 1){ ?>disabled="disabled"
                                               <?php } ?>value="<?= $geha_amal ?>"
                                               class=" form-control " type="text">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label " style="width: 100%"> عنوان العمل</label>
                                        <input id="job_address" name="enwan_amal" style="padding: 0;"
                                               <?php if ($hya_3elmia_fk != 1){ ?>disabled="disabled" <?php } ?>
                                               value="<?= $enwan_amal ?>"
                                               class=" form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label " style="width: 100%"> هاتف العمل</label>
                                        <input id="job_mob" name="hatf_amal" maxlength="10"
                                               onkeyup="get_length($(this).val(),'work_mobile_span');"
                                            <?php if ($hya_3elmia_fk != 1) { ?> disabled="disabled"
                                               <?php } ?>value="<?= $hatf_amal ?>"
                                               class="  form-control " type="text"
                                               onkeypress="validate_number(event)">
                                        <small id="work_mobile_span" class="myspan" style="color: red;"></small>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label " style="width: 100%">الصوره الشخصيه </label>
                                        <input id="member_img" onchange="readURL(this);" name="mem_img"
                                               style="padding: 0;"
                                               class=" form-control" type="file">
                                        <?php if (!empty($mem_img)) { ?>
                                            <a data-toggle="modal" data-target="#myModal-view" type="button"
                                               style="cursor: pointer"
                                               onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/md/gam3ia_omomia_members/<?php echo $mem_img; ?>');">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label " style="width: 100%">صورة الهوية </label>
                                        <input id="card_img" onchange="readURL(this);" name="card_img"
                                               style="padding: 0;"
                                               class=" form-control" type="file">
                                        <?php if (!empty($card_img)) { ?>
                                            <a data-toggle="modal" data-target="#myModal-view" type="button"
                                               style="cursor: pointer"
                                               onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/md/gam3ia_omomia_members/<?php echo $card_img; ?>');">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-sm-6  col-md-3 padding-4">
                    <label class="label   ">إسم المستخدم </label>
                    <input type="text" name="user_name" class="form-control  " placeholder="أدخل البيانات" value="<?= $user_name;?>" >
                </div>
                                    </div>

                        <!-- yara -->
                        <div class="col-md-12 ">
                      
                <div class="form-group col-sm-6  col-md-3 col-sm-6 padding-4">
                    <label class="label   ">كلمة المرور  </label>
                    <input type="password" name="user_password" onkeyup="valid_pass_length();" id="user_password" class="form-control  " value="<?= $user_password;?>" >
                    <span id="validate_length" class="span-validation"> </span>
                </div>
                <div class="form-group col-sm-6  col-md-3 col-sm-6 padding-4">
                    <label class="label   ">تاكيد كلمة المرور <strong></strong> </label>
                    <input type="password" id="user_password_copy" onkeyup="return valid_pass_copy();" class="form-control  " >
                    <span id="validate_copy" class="span-validation"> </span>
                </div>

                                        </div>          


                                <div class="col-md-12 text-center">


                                    <button type="submit"
                                            class="btn btn-labeled btn-success" id="save" name="save" value="save"><span
                                                class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>

                                </div>
                                <?php echo form_close() ?>

                                <div class="modal fade" id="myModal-view" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="" id="my_image" width="100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    إغلاق
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="col-xs-12 padding-4">
                                    <h5 class="title-style"><i class="fa fa-pencil"></i> بيانات العضوية</h5>
                                </div>
                                <div class="col-xs-12 padding-4">

                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>نوع العضوية:</td>
                                            <td><?= $result->odwiat->no3_odwia_title ?></td>

                                            <td>رقم العضوية :</td>
                                            <td><?= $result->odwiat->rkm_odwia_full ?></td>

                                            <td>رقم القرار :</td>
                                            <td><?= $result->odwiat->qrar_rkm ?></td>
                                        </tr>

                                        <tr>
                                            <td>مبلغ الإشتراك السنوي:</td>
                                            <td><?= $result->odwiat->subs_value ?></td>

                                            <td>تاريخ بداية الإشتراك :</td>
                                            <td><?= $result->odwiat->subs_from_date_m ?></td>

                                            <td>تاريخ نهاية الإشتراك :</td>
                                            <td><?= $result->odwiat->subs_to_date_m ?></td>
                                        </tr>
                                        <tr>
                                            <td>طريقة السداد :</td>
                                            <td><?= $result->odwiat->pay_method_title ?></td>

                                            <td>إسم البنك :</td>
                                            <td><?= $result->odwiat->bank_title ?></td>

                                            <td>رقم الحساب :</td>
                                            <td><?= $result->odwiat->rkm_hesab ?></td>
                                        </tr>
                                        </tbody>

                                    </table>


                                </div>
                                <div class="col-md-12">
                                    <?php echo form_open_multipart($out['form']) ?>
                                    <div class="form-group col-md-5 col-sm-6 padding-4">
                                        <label class="label">ملاحظات</label>
                                        <textarea type="text" name="note" id="note"
                                                  class="form-control "
                                        ><?php echo $note; ?></textarea>

                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit"
                                                class="btn btn-labeled btn-success" id="save" name="note_save"
                                                value="save"><span
                                                    class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>إرسال
                                        </button>
                                    </div>
                                    <?php echo form_close() ?>

                                </div>

                            </div>

                        </div>

                    </div>


                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile-tab2">
                    <div class="col-xs-12 padding-4">
                        <h5 class="title-style"><i class="fa fa-users"></i> أعضاء الجمعية العمومية </h5>
                    </div>
                    <div class="cicleat-sec col-xs-12 no-padding ">
                        <div class="col-md-3 col-sm-4 col-xs-12 padding-4">
                            <div class="circle-arrow trquaz-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عدد الأعضاء <strong
                                                class="badge"><?= $gam3ia_omomia ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow green-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عضو نشط <strong
                                                class="badge"><?= $gam3ia_omomia_active ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow red-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عضو غير نشط <strong
                                                class="badge"><?= $gam3ia_omomia_not_active ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow yellow-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عضو عامل <strong
                                                class="badge"><?= $gam3ia_omomia_1 ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow trquaz-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عضو شرف <strong
                                                class="badge">1</strong></span></h5>
                            </div>

                            <div class="circle-arrow labni-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عضو منتسب <strong
                                                class="badge"><?= $gam3ia_omomia_2 ?></strong></span></h5>
                            </div>
                            <div class="circle-arrow labni-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عضو فخري <strong
                                                class="badge"><?= $gam3ia_omomia_3 ?></strong></span></h5>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12 padding-4">
                            <div class="charity-structure">
                                <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/structure.jpg">
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12 no-padding">
                        <div class="panel panel-default ">
                            <div class="panel-heading">
                                <h3 class="panel-title">الملف الشخصي</h3>
                            </div>
                            <div class="panel-body">


                                <table id="" class="table table-striped table-bordered dt-responsive nowrap example"
                                       cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr class="info">
                                        <th class="text-center">م</th>
                                        <th class="text-center">رقم العضوية</th>
                                        <th class="text-center">إسم العضو</th>
                                        <th>رقم الهوية</th>
                                        <th>رقم الجول</th>
                                        <th>نوع العضوية</th>
                                        <th>حالة العضوية</th>

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

                                                <td>
                                                    <?php
                                                    if (isset($record->odwiat->rkm_odwia_full) && ($record->odwiat->rkm_odwia_full) != NULL) {
                                                        echo $record->odwiat->rkm_odwia_full;
                                                    } else {
                                                        echo "غير محدد";
                                                    }


                                                    ?>
                                                </td>
                                                <td><?php echo $record->laqb_title . '/' . $record->name; ?></td>
                                                <td><?php echo $record->card_num; ?></td>
                                                <td><?php echo $record->jwal; ?></td>

                                                <td>
                                                    <?php
                                                    if (isset($record->odwiat->no3_odwia_title) && !empty($record->odwiat->no3_odwia_title)) {
                                                        echo $record->odwiat->no3_odwia_title;
                                                    } else {
                                                        echo "غير محدد";
                                                    }

                                                    ?>
                                                </td>

                                                <td>
                                                    <?php


                                                    if (isset($record->odwiat->odwia_status_title) && !empty($record->odwiat->odwia_status_title)) {
                                                        echo $record->odwiat->odwia_status_title;
                                                    } else {
                                                        echo "غير محدد";
                                                    }

                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $a++;

                                        }
                                    } else { ?>
                                        <td colspan="6">
                                            <div style="color: red; font-size: large;">لم يتم اضافه أعضاء الي الان</div>
                                        </td>
                                    <?php }
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile-tab3">
                    <div class="col-xs-12 padding-4">
                        <h5 class="title-style"><i class="fa fa-users"></i> الموارد البشرية </h5>
                    </div>
                    <div class="cicleat-sec col-xs-12 no-padding ">
                        <div class="col-md-3 col-sm-4 col-xs-12 padding-4">
                            <div class="circle-arrow trquaz-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عدد الموظفين <strong
                                                class="badge"><?= $emp_count ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow green-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عدد الإدارات <strong
                                                class="badge"><?= $edara_count ?></strong></span></h5>
                            </div>

                            <div class="circle-arrow red-circle">
                                <h5><i class="fa fa-users"></i> <span class="name"> عدد الأقسام <strong
                                                class="badge"><?= $qsm_count ?></strong></span></h5>
                            </div>

                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12 padding-4">
                            <div class="charity-structure">
                                <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/hr.jpg">
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12 no-padding">
                        <div class="panel panel-default ">
                            <div class="panel-heading">
                                <h3 class="panel-title">الموظفين</h3>
                            </div>
                            <div class="panel-body">
                                <?php
                                if (isset($all_emp) && !empty($all_emp)) {
                                    $x = 1;
                                    ?>

                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap example"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr class="info">
                                            <th class="text-center">م</th>
                                            <th class="text-center"> كود الموظف</th>
                                            <th class="text-center">إسم الموظف</th>
                                            <th> المسمي الوظيفي</th>
                                            <th> الادارة</th>
                                            <th> القسم</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php
                                        foreach ($all_emp as $emp) {
                                            ?>
                                            <tr>
                                                <td><?= $x++ ?></td>
                                                <td><?= $emp->emp_code ?></td>
                                                <td><?= $emp->employee ?></td>
                                                <td><?= $emp->job_title ?></td>
                                                <td><?php if (!empty($emp->edara_name)) {
                                                        echo $emp->edara_name;
                                                    } else {
                                                        echo 'غير محدد';
                                                    } ?></td>
                                                <td><?php if (!empty($emp->qsm_name)) {
                                                        echo $emp->qsm_name;
                                                    } else {
                                                        echo 'غير محدد';
                                                    } ?></td>
                                            </tr>
                                            <?php

                                        }
                                        ?>


                                        </tbody>
                                    </table>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile-tab4">
                    <div class="col-xs-12 padding-4">
                        <h5 class="title-style"><i class="fa fa-pencil"></i> إحصائيات إدارة الرعاية الإجتماعية</h5>
                    </div>
                    <div class="boxat-sec col-xs-12 no-padding">
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5>عدد الأسر</h5>
                                <span class="badge"><?php echo $all_files; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5>الأسر النشطة</h5>
                                <span class="badge badge-success"><?php echo $all_files_active; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5> الأسر الموقوفة</h5>
                                <span class="badge badge-danger"><?php echo $all_files_non_active; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5>عدد الطلبات</h5>
                                <span class="badge badge-warning"><?php echo $all_talabat; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5>عدد الأيتام</h5>
                                <span class="badge"><?php echo $all_yatem; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5>عدد الأرامل</h5>
                                <span class="badge"><?php echo $all_mother_num; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5>عدد المستفيدين</h5>
                                <span class="badge"><?php echo $all_mostafed; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-8 col-xs-12 no-padding">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>إحصائية بإجمالى المساعدات المالية خلال العام الحالى 2019</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <canvas id="barChart" height="200"></canvas>

                            </div>
                        </div>
                    </div>


                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile-tab5">
                    <div class="col-xs-12 padding-4">
                        <h5 class="title-style"><i class="fa fa-star"></i> إحصائيات الكفالات </h5>
                    </div>
                    <div class="col-xs-12 no-padding medaliat">
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <div class="counter pink">
                                <div class="counter-inner">
                                    <div class="counter-value">
                                        <span class="value">3456</span>
                                    </div>
                                    <h3>كفالة أيتام</h3>
                                </div>
                                <div class="counter-icon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <div class="counter green">
                                <div class="counter-inner">
                                    <div class="counter-value">
                                        <span class="value">1673</span>
                                    </div>
                                    <h3>كفالة الزكاة</h3>
                                </div>
                                <div class="counter-icon">
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <div class="counter labni">
                                <div class="counter-inner">
                                    <div class="counter-value">
                                        <span class="value">3456</span>
                                    </div>
                                    <h3>كفالة أوقاف</h3>
                                </div>
                                <div class="counter-icon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <div class="counter yellow">
                                <div class="counter-inner">
                                    <div class="counter-value">
                                        <span class="value"><?= $sponsor_count ?></span>
                                    </div>
                                    <h3>عدد الكفلاء</h3>
                                </div>
                                <div class="counter-icon">
                                    <i class="fa fa-bell"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <div class="counter">
                                <div class="counter-inner">
                                    <div class="counter-value">
                                        <span class="value"><?= $donor_count ?></span>
                                    </div>
                                    <h3>عدد المتبرعين</h3>
                                </div>
                                <div class="counter-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 no-padding esalat-stc">
                        <h5 class="title-style"><i class="fa fa-star"></i>إحصائيةالإيرادات والتبرعات</h5>
                        <div class="col-md-7 padding-4">
                            <canvas id="barChart-esalat" height="200"></canvas>
                        </div>
                        <div class="col-md-5 cicleat-sec">
                            <div class="bottom-hr">
                                <h5 class="text-center">عدد الأيتام : <?php if (!empty($GetAll['aytam'])) {
                                        echo $GetAll['aytam']['num'];
                                    } ?></h5>
                                <div class="col-xs-6 padding-4">
                                    <div class="circle-arrow green-circle">
                                        <h5><i class="fa fa-users"></i> <span class="name"> المكفول <strong
                                                        class="badge"><?php if (!empty($GetAll['aytam'])) {
                                                        echo $GetAll['aytam']['guaranteed'];
                                                    } ?></strong></span></h5>
                                    </div>
                                </div>
                                <div class="col-xs-6 padding-4">
                                    <div class="circle-arrow red-circle">
                                        <h5><i class="fa fa-users"></i> <span class="name"> غير مكفول <strong
                                                        class="badge"><?php if (!empty($GetAll['aytam'])) {
                                                        echo $GetAll['aytam']['not_guaranteed'];
                                                    } ?></strong></span></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-hr">

                                <h5 class="text-center">عدد الأرامل : <?php if (!empty($GetAll['armal'])) {
                                        echo $GetAll['armal']['num'];
                                    } ?></h5>
                                <div class="col-xs-6 padding-4">
                                    <div class="circle-arrow green-circle">
                                        <h5><i class="fa fa-users"></i> <span class="name"> المكفول <strong
                                                        class="badge"><?php if (!empty($GetAll['armal'])) {
                                                        echo $GetAll['armal']['guaranteed'];
                                                    } ?></strong></span></h5>
                                    </div>
                                </div>
                                <div class="col-xs-6 padding-4">
                                    <div class="circle-arrow red-circle">
                                        <h5><i class="fa fa-users"></i> <span class="name"> غير مكفول <strong
                                                        class="badge"><?php if (!empty($GetAll['armal'])) {
                                                        echo $GetAll['armal']['not_guaranteed'];
                                                    } ?></strong></span></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-hr">
                                <h5 class="text-center">عدد المستفيدين : <?php if (!empty($GetAll['mostafed'])) {
                                        echo $GetAll['mostafed']['num'];
                                    } ?></h5>
                                <div class="col-xs-6 padding-4">
                                    <div class="circle-arrow green-circle">
                                        <h5><i class="fa fa-users"></i> <span class="name"> المكفول <strong
                                                        class="badge"><?php if (!empty($GetAll['mostafed'])) {
                                                        echo $GetAll['mostafed']['guaranteed'];
                                                    } ?></strong></span></h5>
                                    </div>
                                </div>
                                <div class="col-xs-6 padding-4">
                                    <div class="circle-arrow red-circle">
                                        <h5><i class="fa fa-users"></i> <span class="name"> غير مكفول <strong
                                                        class="badge"><?php if (!empty($GetAll['mostafed'])) {
                                                        echo $GetAll['mostafed']['not_guaranteed'];
                                                    } ?></strong></span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile-tab6">

                    <div class="col-sm-12 col-md-9 col-xs-12 no-padding">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>إحصائية بإجمالى الإيرادات والمصروفات خلال العام الحالى 2019</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <canvas id="barChart-income" height="200"></canvas>

                            </div>
                        </div>
                    </div>

                </div>

                <div role="tabpanel" class="tab-pane fade" id="profile-tab7">
                </div>

                <div role="tabpanel" class="tab-pane fade" id="profile-tab8">
                </div>
            </div>


        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal modal-startup fade" id="dawa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">دعوة لحضور إجتماع الجمعية العمومية</h4>
            </div>
            <div class="modal-body">
                <div class="dawa-img containerBox">
                    <div class="text-box">
                        <!-- yara -->
                   <?php //echo '<pre>'; print_r($person_data);?>
                        <h4><?php if (isset($person_data->name) && !empty($person_data->name)) {
                               echo $person_data->laqb_title  ."/".
                                $person_data->name;
                            } ?>    </h4>
                    </div>
                    <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/dawa.png">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="dawa_reply" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="width: 85%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>

            <div class="modal-body" id="replay_data">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>

        </div>
    </div>
</div>


<script>

    function show_tab(id) {
        $('a[href="#' + id + '"]').tab('show');
    }

    function get_all_da3wat() {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/get_all_da3wat",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#profile-tab7').html('<div class="text-center" style="margin-top: 40%"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#profile-tab7').html(d);
                //$('#profile-tab7').html('<div class="text-center"><img src="<?php //echo base_url()?>//asisst/admin_asset/img/loader.png" alt=""></div>');

            }
        });
    }

</script>
<script>

    function show_mofawad(elem, reply) {
        console.log(elem.checked);

        if (reply == 3) {
            if (elem.checked) {
                $('#mofawad_div').show('slow');
                $('#mofawad_name').attr('data-validation', 'required');

            } else {
                $('#mofawad_div').hide('slow');
                $('#mofawad_name').removeAttr('data-validation');

            }
        } else {
            $('#mofawad_div').hide('slow');
            $('#mofawad_name').removeAttr('data-validation');

        }

    }
</script>

<script>
    function reply_dawa(value) {

        if (value != 0 && value != '') {
            var dataString = 'id=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/da3wat_gam3ia_omomia/Da3wat_gam3ia_omomia/reply_dawa',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#replay_data").html(html);
                }
            });
        }

    }
</script>


<script>

    function active_li() {
        $('li').removeClass('active');
        $('.profile-tab8').addClass('active');

    }
</script>


<script>

    function get_mahdr(val_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/show_mahdr",
            data: {
                val_id: val_id

            },
            success: function (d) {

                //alert(d);
                $('#profile-tab8').html(d);
            }

        });
    }
</script>
<script>
    function valid_pass_length()
    {
        if($("#user_password").val().length < 4){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور اكثر من اربع حروف';
           // $('button[type="submit"]').attr("disabled","disabled");
        }else if($("#user_password").val().length > 4 &&  $("#user_password").val().length < 10){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور ضعيفة';
           // $('button[type="submit"]').attr("disabled","disabled");
        }else if($("#user_password").val().length > 10){
            document.getElementById('validate_length').style.color = '#00FF00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور قوية';
           // $('button[type="submit"]').removeAttr("disabled");
        }
    }
    function valid_pass_copy()
    {
        if($("#user_password").val() == $("#user_password_copy").val()){
            document.getElementById('validate_copy').style.color = '#00FF00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور متطابقة';
           // $('button[type="submit"]').removeAttr("disabled");
        }else{
            document.getElementById('validate_copy').style.color = '#F00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور غير متطابقة';
            //$('button[type="submit"]').attr("disabled","disabled");
        }
    }
</script>