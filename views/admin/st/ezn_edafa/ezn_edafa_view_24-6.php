<style type="text/css">

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }


    .tb-table tbody th, .tb-table tbody td,
    .tb-table tfoot td, .tb-table tfoot th {
        padding: 0px !important;
        text-align: center;
    }

    td input[type=radio] {
        height: 20px;
        width: 20px;
    }
</style>
<div class="col-xs-12  no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">
            <?php
            //echo '<pre>' ;print_r($one_data);
            if ((isset($one_data)) && (!empty($one_data))) {
                echo form_open_multipart(base_url() . 'st/ezn_edafa/Ezn_edafa/update/' . base64_encode($one_data['tabr3']->id), array('id' => 'myform'));
                $submitSave = 'button';
                $submitEdit = 'submit';
                $disabled = 'disabled';
                //=====================
                $type_ezn = $one_data['tabr3']->type_ezn;
                $pay_method = $one_data['tabr3']->pay_method;
                $supplier_name = $one_data['tabr3']->person_name;
                $supplier_jwal = $one_data['tabr3']->person_jwal;
                //=================
                $rkm_ezen = $one_data['tabr3']->ezn_rkm;
                $ezn_date = $one_data['tabr3']->ezn_date_ar;
                $storage_fk = $one_data['tabr3']->storage_fk;
                $storage_name = $one_data['tabr3']->storage_name;
                $rkm_hesab = $one_data['tabr3']->rkm_hesab;
                $hesab_name = $one_data['tabr3']->hesab_name;
                $all_value = $one_data['tabr3']->all_value;
                $motbr3_id_fk = $one_data['tabr3']->person_id_fk;
                $motbr3_name = $one_data['tabr3']->person_name;
                $motbr3_jwal = $one_data['tabr3']->person_jwal;
                $last_tabro3_date = $one_data['tabr3']->last_tabro3_date_ar;
                $no3_tabro3 = $one_data['tabr3']->no3_tabro3;
                $no3_tabro3_title = $one_data['no3_tabro3_title'];
                $fe2a = $one_data['tabr3']->fe2a;
                $fe2a_title = $one_data['fe2a_title'];
                $band = $one_data['tabr3']->band;
                $band_title = $one_data['band_title'];
                $mostand_rkm = $one_data['tabr3']->mostand_rkm;
                $tsaeer = $one_data['tabr3']->tsaeer;
                $geha_name = $one_data['tabr3']->geha_name;
                $geha_jwal = $one_data['tabr3']->geha_jwal;
                $mostand_date = $one_data['tabr3']->mostand_date_ar;
                $id = $one_data['tabr3']->id;
                $esal_num = '';
            } elseif ((isset($result)) && (!empty($result))) {
                echo form_open_multipart(base_url() . 'st/ezn_edafa/Ezn_edafa', array('id' => 'myform'));
                $submitSave = 'submit';
                $submitEdit = 'button';
                $disabled = 'disabled';
                $type_ezn = 1;
                $ezn_date = $result->esal_date;
                $storage_fk = $result->storge->storage_fk;
                $storage_name = '';
                $rkm_hesab = $result->storge->rkm_hesab;
                $hesab_name = $result->storge->hesab_name;
                $all_value = $result->value;
                $motbr3_id_fk = $result->person_id_fk;
                $motbr3_name = $result->person_name;
                $motbr3_jwal = $result->person_mob;
                $tsaeer = 0;
                $last_tabro3_date = date('Y-m-d');
                $no3_tabro3 = '';
                $fe2a = '';
                $band = '';
                $mostand_rkm = '';
                $geha_name = '';
                $geha_jwal = '';
                $pay_method = '';
                $supplier_name = '';
                $supplier_jwal = '';
                $mostand_date = date('Y-m-d');

                $esal_num = $result->esal_num;
            } else {
                echo form_open_multipart(base_url() . 'st/ezn_edafa/Ezn_edafa', array('id' => 'myform'));
                $submitSave = 'submit';
                $submitEdit = 'button';
                $disabled = '';
                $ezn_date = date('Y-m-d');
                $storage_fk = '';
                $storage_name = '';
                $rkm_hesab = '';
                $hesab_name = '';
                $all_value = '';
                $motbr3_id_fk = '';
                $motbr3_name = '';
                $motbr3_jwal = '';
                $last_tabro3_date = date('Y-m-d');
                $no3_tabro3 = '';
                $fe2a = '';
                $band = '';
                $mostand_rkm = '';
                $geha_name = '';
                $geha_jwal = '';
                $type_ezn = '';
                $pay_method = '';
                $supplier_name = '';
                $supplier_jwal = '';
                $id = '';
                $mostand_date = date('Y-m-d');
                $esal_num = '';
                $tsaeer = 0;
            }

            ?>
            <div class="col-md-12 no-padding">

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> اختر </label> 
                    <div class="radio-content">
                        <input type="radio"
                               data-validation="required" <?php if ($type_ezn == 1) echo 'checked'; ?> <?php if ($type_ezn == 2) echo 'disabled'; ?>
                               onchange="get_form($(this).val());" value="1" name="type_ezn" id="tbroaat1">
                        <label class="radio-label" for="tbroaat1"> تبرعات عينيه</label>

                    </div>
                    <?php if ((isset($result)) && (!empty($result))) {
                        $diplay = 'none';
                    } else {
                        $diplay = 'inline-block';
                    } ?>
                    <div class="radio-content" style="display: <?php echo $diplay ?>">
                        <input type="radio"
                               data-validation="required" <?php if ($type_ezn == 2) echo 'checked'; ?>  <?php if ($type_ezn == 1) echo 'disabled'; ?>
                               onchange="get_form($(this).val());" value="2" name="type_ezn" id="tbroaat2">
                        <label class="radio-label" for="tbroaat2">مشتريات عينيه</label>
                    </div>

                </div>


                <div class="form-group col-md-1 col-sm-6 padding-4">
                    <label class="label"> رقم الإذن </label>
                    <input type="number" name="ezn_rkm" id="ezn_rkm" value="<?= $rkm_ezen ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true" readonly>
                    <input type="hidden" name="esal_num" value="<?= $esal_num ?>">
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> تاريخ الإذن </label>
                    <input type="date" name="ezn_date" id="ezn_date" value="<?= $ezn_date ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true">
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> المستودع </label>
                    <?php if (isset($result)) { ?>
                        <input type="hidden" name="storage_fk" value="<?= $storage_fk ?>">
                    <?php } ?>
                    <select class="form-control "
                            id="storage_fk" <?php if (!isset($result)) echo "name=\"storage_fk\""; ?>
                            class="form-control"
                            data-validation="required"
                            onchange="getCode(this.value);" <?php if (isset($result)) echo "disabled"; ?>>

                        <option value="">اختر</option>

                        <?php
                        if (isset($storage) && !empty($storage)) {
                            foreach ($storage as $row) {
                                ?>
                                <option value="<?php echo $row->id_setting; ?>"

                                    <?php if ($row->id_setting == $storage_fk) {
                                        echo 'selected';
                                    } ?> ><?php echo $row->title_setting; ?></option>

                            <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-group col-md-1 col-sm-6 padding-4">
                    <label class="label"> كود الحساب </label>
                    <input type="text" name="rkm_hesab" id="rkm_ezn_edafa" value="<?= $rkm_hesab ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true" readonly>
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> اسم الحساب </label>
                    <input type="text" name="hesab_name" id="ezn_edafa_name" value="<?= $hesab_name ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true" readonly>
                </div>
                <!---------------------------------------------->
                <div id="tabro3" <?php if ($type_ezn == 2) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label"> طريقة الشراء</label>

                        <select class="form-control " id="pay_method" name="pay_method" class="form-control"
                        >

                            <option value="">اختر</option>

                            <?php
                            $process = array(1 => 'نقدي', 2 => 'آجل');

                            foreach ($process as $key => $value) {
                                ?>
                                <option value="<?= $key; ?>"

                                    <?php if ($pay_method == $key) echo 'selected'; ?> ><?= $value; ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label"> جهة التوريد</label>

                        <input type="text" class="form-control testButton " name="supplier_name"
                               id="name"
                               readonly=""

                               ondblclick="$(this).attr('readonly','readonly'); $('#myModal2').modal('show');"
                               style="cursor:pointer; width: 85%;float: right;" autocomplete="off"
                               onkeypress="return isNumberKey(event);"
                               onblur="$(this).attr('readonly','readonly')"
                               value="<?php echo $supplier_name; ?> ">
                        <button type="button" data-toggle="modal" data-target="#myModal2"
                                class="btn btn-success btn-next" style="float: right;">
                            <i class="fa fa-plus"></i></button>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label"> رقم الجوال</label>

                        <input type="text" class="form-control " name="jwal"
                               onkeypress="validate_number(event)"
                               aria-required="true" readonly=""
                               id="jwal"
                               style="width: 100% !important;"
                               value="<?php echo $supplier_jwal; ?>"
                        >
                        <input type="hidden" name="supplier_fk" id="supplier_fk" value="">
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label"> رقم الفاتورة</label>
                        <input type="text" name="mostand_rkm_m" value="<?php echo $mostand_rkm; ?>"
                               class="form-control "
                               onkeypress="validate_number(event);">

                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label"> تاريخ الفاتورة</label>
                        <input type="date" name="mostand_date" id="mostand_date" value="<?= $ezn_date ?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">

                    </div>


                </div>
                <!--------------------------------------------->
                <div id="moshtrat" <?php if ($type_ezn != 2) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>

                    <div class="form-group col-md-1 col-sm-6 padding-4">
                        <label class="label"> المبلغ </label>
                        <input type="number" name="all_value" id="all_value"
                               value="<?= $all_value ?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label"> اسم المتبرع </label>
                        <input type="text" name="motbr3_name" id="motbr3_name" value="<?= $motbr3_name ?>"
                               style="width:87%; float: right;"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                        <button type="button" data-toggle="modal" data-target="#myModalInfo"
                                class="btn btn-success btn-next" style="float: right;" onclick="GetDiv('myDiv')">
                            <i class="fa fa-plus"></i></button>
                        <input type="hidden" name="motbr3_id_fk" id="motbr3_id_fk" value="<?= $motbr3_id_fk ?>">
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label"> رقم الجوال </label>
                        <input type="text" name="motbr3_jwal" id="motbr3_jwal" value="<?= $motbr3_jwal ?>"
                               class="form-control "
                               onkeypress="validate_number(event)"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label"> تاريخ آخر تبرع </label>
                        <input type="date" name="last_tabro3_date" id="last_tabro3_date"
                               value="<?= $last_tabro3_date ?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>


                    <?php if (!isset($result)) { ?>
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label"> نوع التبرع </label>
                            <select name="no3_tabro3" id="no3_tabro3"
                                    onchange="GEtF2a($('option:selected', this).attr('data-from_id'),'fe2a');"
                                    class="form-control "
                                    data-validation="required"
                            >
                                <option> - إختر -</option>

                                <?php if (isset($erad_tabro3) && (!empty($erad_tabro3))) {
                                    foreach ($erad_tabro3 as $value) {
                                        ?>
                                        <option value="<?= $value->id ?>"
                                                data-from_id="<?= $value->from_id ?>"
                                            <?php if ($no3_tabro3 == $value->id) echo 'selected' ?>> <?= $value->title ?></option>

                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label"> الفئة </label>
                            <select name="fe2a_type[]" id="fe2a"
                                    onchange="GEtF2a($('option:selected', this).attr('data-from_id'),'band')"
                                    class="form-control "
                                    data-validation="required"

                            >

                                <?php if (!empty($fe2a_type_arr)) {
                                    foreach ($fe2a_type_arr as $row) { ?>
                                        <option value="<?= $row->id ?>"
                                            <?php if (!empty($one_data['tabr3']->fe2a)) {
                                                if ($one_data['tabr3']->fe2a == $row->id) {
                                                    echo 'selected';
                                                }
                                            } ?>

                                        > <?= $row->title ?>  </option>
                                    <?php }
                                } ?>
                                <!--                                --><?php //if (isset($fe2a_title)) { ?>
                                <!--                                    <option value="--><? //= $fe2a ?><!--">-->
                                <? //= $fe2a_title ?><!--</option>-->
                                <!--                                --><?php //} ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label"> البند </label>
                            <select name="bnd_type[]" id="band"
                                    class="form-control "
                                    data-validation="required"
                            >

                                <?php if (!empty($bnd_type_arr)) {
                                    foreach ($bnd_type_arr as $row) { ?>
                                        <option value="<?= $row->id ?>"
                                            <?php if (!empty($one_data['tabr3']->band)) {
                                                if ($one_data['tabr3']->band == $row->id) {
                                                    echo 'selected';
                                                }
                                            } ?>

                                        > <?= $row->title ?>  </option>
                                    <?php }
                                } ?>
                                <?php if (isset($band_title)) { ?>
                                    <option value="<?= $band ?>"><?= $band_title ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-1 col-sm-6 padding-4">

                            <div id="first_value" style="margin-top: 27px">
                                <?php if (!empty($one_data['tabr3']->value2)) {

                                    $value_input = $one_data['tabr3']->value1;
                                } else {
                                    $value_input = '';
                                } ?>

                                <input style="font-weight: 600 !important;" type="text" step="any"
                                       data-validation="required" name="value[]" id="value1" value="<?= $value_input ?>"
                                       class="form-control    value band1_value">

                            </div>


                        </div>

                        <div class="form-group col-md-1 col-sm-6 padding-4">
                            <div style="margin-top: 27px">
                                <button type="button" id="myId"
                                        data-click-state=" <?php if (isset($one_data['tabr3']->fe2a_type4) && ($one_data['tabr3']->fe2a_type4 > 0)) {
                                            echo 4;
                                        } else if (isset($one_data['tabr3']->fe2a_type3) && ($one_data['tabr3']->fe2a_type3 > 0)) {
                                            echo 3;
                                        } else if (isset($one_data['tabr3']->fe2a_type2) && ($one_data['tabr3']->fe2a_type2 > 0)) {
                                            echo 2;
                                        } else {
                                            echo 1;
                                        } ?>"
                                        class="btn btn-success btn-next" style="float: right;"
                                        onclick="GetValues(); $('#myId_munis').attr('data-click-state',$(this).attr('data-click-state')); ">
                                    <i id="plus_button" class="fa fa-plus"></i>
                                </button>
                                <button type="button" id="myId_munis"
                                        data-click-state=" <?php if (isset($one_data['tabr3']->fe2a_type4) && ($one_data['tabr3']->fe2a_type4 > 0)) {
                                            echo 4;
                                        } else if (isset($one_data['tabr3']->fe2a_type3) && ($one_data['tabr3']->fe2a_type3 > 0)) {
                                            echo 3;
                                        } else if (isset($one_data['tabr3']->fe2a_type2) && ($one_data['tabr3']->fe2a_type2 > 0)) {
                                            echo 2;
                                        } else {
                                            echo 1;
                                        } ?>"
                                        class="btn btn-danger btn-next" style="float: right;"
                                        onclick="minus_div();"><i id="plus_button" class="fa fa-minus"></i>
                                </button>

                            </div>
                        </div>


                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label"> طريقة التسعير </label>
                            <div class="radio-content">
                                <input type="radio"
                                       onclick="console.log('checked');document.getElementById('fatora_data_form').style.display='block'; "
                                       data-validation="required" value="1" name="tsaeer"
                                       id="tsaeer1" <?php if (($tsaeer == 1)) {
                                    echo ' checked ';
                                } ?>>
                                <label class="radio-label" for="tsaeer1"> فاتورة</label>

                            </div>
                            <div class="radio-content">
                                <input type="radio" onclick="console.log(' unechecked');
                                            document.getElementById('fatora_data_form').style.display='none'; "
                                       data-validation="required"
                                       onchange="" value="2" name="tsaeer" id="tsaeer2" <?php if (($tsaeer == 2)) {
                                    echo ' checked ';
                                } ?> >
                                <label class="radio-label" for="tsaeer2">تقييم</label>
                            </div>

                        </div>


                        <div class="col-xs-12 no-padding">
                            <div id="ValuesDiv2">


                                <?php if (!empty($one_data['tabr3']->fe2a_type2) && !empty($one_data['tabr3']->bnd_type2)) { ?>

                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label"> الفئة </label>
                                        <select data-validation="required" onchange="GetBandType2(this.value,'2')"
                                                class="form-control  " id="fe2a_type2"
                                                name="fe2a_type[]"
                                                data-validation="required"

                                        >
                                            <option value="">إختر</option>
                                            <?php if (!empty($fe2a_type_arr)) {
                                                foreach ($fe2a_type_arr as $row) { ?>
                                                    <option value="<?= $row->id ?>"
                                                        <?php if (!empty($one_data['tabr3']->fe2a_type2)) {
                                                            if ($one_data['tabr3']->fe2a_type2 == $row->id) {
                                                                echo 'selected';
                                                            }
                                                        } ?>

                                                    > <?= $row->title ?>  </option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label"> البند </label>
                                        <select data-validation="required"
                                                class="form-control  "
                                                onchange="
                         $('#band_tbro3_td2').html($('#bnd_type2 option:selected').text());     "
                                                id="bnd_type2" name="bnd_type[]">
                                            <option value="">إختر</option>
                                            <?php if (!empty($bnd_type_arr2)) {
                                                foreach ($bnd_type_arr2 as $row) { ?>
                                                    <option value="<?= $row->id ?>"
                                                        <?php if (!empty($one_data['tabr3']->bnd_type2)) {
                                                            if ($one_data['tabr3']->bnd_type2 == $row->id) {
                                                                echo 'selected';
                                                            }
                                                        } ?>

                                                    > <?= $row->title ?>  </option>
                                                <?php }
                                            } ?>
                                        </select></div>


                                    <div class="form-group col-md-1 col-sm-6 padding-4">
                                        <input style="font-weight: 600 !important;" data-validation="required"
                                               type="text" step="any" name="value[]" id="value2"
                                               class="form-control value band2_value"
                                               value="<?= $one_data['tabr3']->value2 ?>"
                                        >
                                    </div>

                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-xs-12 no-padding">
                            <div id="ValuesDiv3">

                                <?php if (!empty($one_data['tabr3']->fe2a_type3) && !empty($one_data['tabr3']->bnd_type3)) { ?>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label"> الفئة </label>
                                        <select data-validation="required" onchange="GetBandType2(this.value,'3')"
                                                class="form-control  " id="fe2a_type3"
                                                name="fe2a_type[]"
                                        >
                                            <option value="">إختر</option>
                                            <?php if (!empty($fe2a_type_arr)) {
                                                foreach ($fe2a_type_arr as $row) { ?>
                                                    <option value="<?= $row->id ?>"
                                                        <?php if (!empty($one_data['tabr3']->fe2a_type3)) {
                                                            if ($one_data['tabr3']->fe2a_type3 == $row->id) {
                                                                echo 'selected';
                                                            }
                                                        } ?>

                                                    > <?= $row->title ?>  </option>
                                                <?php }
                                            } ?>
                                        </select></div>


                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label"> البند </label>
                                        <select data-validation="required"
                                                class="form-control   "
                                                onchange="
                         $('#band_tbro3_td2').html($('#bnd_type2 option:selected').text());     "
                                                id="bnd_type3" name="bnd_type[]">
                                            <option value="">إختر</option>
                                            <?php if (!empty($bnd_type_arr3)) {
                                                foreach ($bnd_type_arr3 as $row) { ?>
                                                    <option value="<?= $row->id ?>"
                                                        <?php if (!empty($one_data['tabr3']->bnd_type3)) {
                                                            if ($one_data['tabr3']->bnd_type3 == $row->id) {
                                                                echo 'selected';
                                                            }
                                                        } ?>

                                                    > <?= $row->title ?>  </option>
                                                <?php }
                                            } ?>
                                        </select></div>


                                    <div class="form-group col-md-1 col-sm-6 padding-4">
                                        <input style="font-weight: 600 !important;" data-validation="required"
                                               type="text" step="any"
                                               name="value[]" id="value2" class="form-control value band2_value "
                                               value="<?= $one_data['tabr3']->value3 ?>"
                                        >
                                    </div>

                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-xs-12 no-padding">

                            <div id="ValuesDiv4">

                                <?php if (!empty($one_data['tabr3']->fe2a_type4) && !empty($one_data['tabr3']->bnd_type4)) { ?>

                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label"> الفئة </label>
                                        <select data-validation="required" onchange="GetBandType2(this.value,'4')"
                                                class="form-control   " id="fe2a_type4"
                                                name="fe2a_type[]"
                                        >
                                            <option value="">إختر</option>
                                            <?php if (!empty($fe2a_type_arr)) {
                                                foreach ($fe2a_type_arr as $row) { ?>
                                                    <option value="<?= $row->id ?>"
                                                        <?php if (!empty($one_data['tabr3']->fe2a_type4)) {
                                                            if ($one_data['tabr3']->fe2a_type4 == $row->id) {
                                                                echo 'selected';
                                                            }
                                                        } ?>

                                                    > <?= $row->title ?>  </option>
                                                <?php }
                                            } ?>
                                        </select></div>


                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label"> البند </label>
                                        <select data-validation="required"
                                                class="form-control    "
                                                onchange="
                         $('#band_tbro3_td2').html($('#bnd_type2 option:selected').text());     "
                                                id="bnd_type4" name="bnd_type[]">
                                            <option value="">إختر</option>
                                            <?php if (!empty($bnd_type_arr4)) {
                                                foreach ($bnd_type_arr4 as $row) { ?>
                                                    <option value="<?= $row->id ?>"
                                                        <?php if (!empty($one_data['tabr3']->bnd_type4)) {
                                                            if ($one_data['tabr3']->bnd_type4 == $row->id) {
                                                                echo 'selected';
                                                            }
                                                        } ?>

                                                    > <?= $row->title ?>  </option>
                                                <?php }
                                            } ?>
                                        </select></div>


                                    <div class="form-group col-md-1 col-sm-6 padding-4">
                                        <input style="font-weight: 600 !important;"
                                               data-validation="required" type="text"
                                               step="any"
                                               name="value[]" id="value2" class="form-control
                     value band2_value " value="<?= $one_data['tabr3']->value4 ?>"
                                        >
                                    </div>

                                <?php } ?>
                            </div>
                        </div>

                    <?php } ?>

                    <?php if ((isset($result)) && (!empty($result))) { ?>

                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label"> نوع التبرع </label>
                            <select name="no3_tabro3" id="no3_tabro3"
                                    onchange="GEtF2a($('option:selected', this).attr('data-from_id'),'fe2a');"
                                    class="form-control "
                                    data-validation="required">
                                <option> - إختر -</option>

                                <?php if (isset($erad_tabro3) && (!empty($erad_tabro3))) {
                                    foreach ($erad_tabro3 as $value) {
                                        ?>
                                        <option value="<?= $value->id ?>"
                                                data-from_id="<?= $value->from_id ?>"
                                            <?php if ($result->no3_tabro3_id == $value->id) echo 'selected' ?>> <?= $value->title ?></option>

                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label"> الفئة </label>
                            <select name="fe2a_type[]" id="fe2a"
                                    onchange="GEtF2a($('option:selected', this).attr('data-from_id'),'band')"
                                    class="form-control "
                                    data-validation="required"
                            >

                                <?php if (!empty($fe2a_type_arr)) {
                                    foreach ($fe2a_type_arr as $row) { ?>
                                        <option value="<?= $row->id ?>"
                                            <?php if (!empty($one_data['tabr3']->fe2a)) {
                                                if ($result->fe2a_id == $row->id) {
                                                    echo 'selected';
                                                }
                                            } ?>

                                        > <?= $row->title ?>  </option>
                                    <?php }
                                } ?>

                            </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label"> البند </label>
                            <select name="bnd_type[]" id="band"
                                    class="form-control "
                                    data-validation="required"
                            >

                                <?php if (!empty($bnd_type_arr)) {
                                    foreach ($bnd_type_arr as $row) { ?>
                                        <option value="<?= $row->id ?>"
                                            <?php if (!empty($result->band_id)) {
                                                if ($result->band_id == $row->id) {
                                                    echo 'selected';
                                                }
                                            } ?>

                                        > <?= $row->title ?>  </option>
                                    <?php }
                                } ?>
                                <?php if (isset($band_title)) { ?>
                                    <option value="<?= $band ?>"><?= $band_title ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-1 col-sm-6 padding-4">

                            <div id="first_value" style="margin-top: 27px">
                                <?php if (!empty($result->value2)) {

                                    $value_input = $result->value1;
                                } else {
                                    $value_input = '';
                                } ?>

                                <input style="font-weight: 600 !important;" type="text" step="any"
                                       data-validation="required" name="value[]" id="value1" value="<?= $value_input ?>"
                                       class="form-control    value band1_value"
                                >

                            </div>


                        </div>

                        <div class="form-group col-md-1 col-sm-6 padding-4">
                            <div style="margin-top: 27px">
                                <button type="button" id="myId"
                                        data-click-state=" <?php if (isset($result->fe2a_type4) && ($result->fe2a_type4 > 0)) {
                                            echo 4;
                                        } else if (isset($result->fe2a_type3) && ($result->fe2a_type3 > 0)) {
                                            echo 3;
                                        } else if (isset($result->fe2a_type2) && ($result->fe2a_type2 > 0)) {
                                            echo 2;
                                        } else {
                                            echo 1;
                                        } ?>"
                                        class=" btn btn-success btn-next" style="float: right;"
                                        onclick="GetValues(); $('#myId_munis').attr('data-click-state',$(this).attr('data-click-state')); ">
                                    <i id="plus_button" class="fa fa-plus"></i>
                                </button>
                                <button type="button" id="myId_munis"
                                        data-click-state=" <?php if (isset($result->fe2a_type4) && ($result->fe2a_type4 > 0)) {
                                            echo 4;
                                        } else if (isset($result->fe2a_type3) && ($result->fe2a_type3 > 0)) {
                                            echo 3;
                                        } else if (isset($result->fe2a_type2) && ($result->fe2a_type2 > 0)) {
                                            echo 2;
                                        } else {
                                            echo 1;
                                        } ?>"
                                        class="  btn btn-danger btn-next" style="float: right;"
                                        onclick="minus_div();"><i id="plus_button" class="fa fa-minus"></i>
                                </button>

                            </div>
                        </div>

                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label"> طريقة التسعير </label>
                            <div class="radio-content">
                                <input type="radio"
                                       onclick="console.log('checked');document.getElementById('fatora_data_form').style.display='block'; "
                                       data-validation="required" value="1" name="tsaeer"
                                       id="tsaeer1" <?php if (($tsaeer == 1)) {
                                    echo ' checked ';
                                } ?>>
                                <label class="radio-label" for="tsaeer1"> فاتورة</label>

                            </div>
                            <div class="radio-content">
                                <input type="radio" onclick="console.log(' unechecked');
                                            document.getElementById('fatora_data_form').style.display='none'; "
                                       data-validation="required"
                                       onchange="" value="2" name="tsaeer" id="tsaeer2" <?php if (($tsaeer == 2)) {
                                    echo ' checked ';
                                } ?> >
                                <label class="radio-label" for="tsaeer2">تقييم</label>
                            </div>

                        </div>

                        <div class="col-xs-12 no-padding">
                            <div id="ValuesDiv2">


                                <?php if (!empty($result->fe2a_type2) && !empty($result->bnd_type2)) { ?>

                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label"> الفئة </label>
                                        <select data-validation="required" onchange="GetBandType2(this.value,'2')"
                                                class="form-control  " id="fe2a_type2"
                                                name="fe2a_type[]"
                                        >
                                            <option value="">إختر</option>
                                            <?php if (!empty($fe2a_type_arr)) {
                                                foreach ($fe2a_type_arr as $row) { ?>
                                                    <option value="<?= $row->id ?>"
                                                        <?php if (!empty($result->fe2a_id2)) {
                                                            if ($result->fe2a_id2 == $row->id) {
                                                                echo 'selected';
                                                            }
                                                        } ?>

                                                    > <?= $row->title ?>  </option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>


                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label"> البند </label>
                                        <select data-validation="required"
                                                class="form-control  "
                                                onchange="
                         $('#band_tbro3_td2').html($('#bnd_type2 option:selected').text());     "
                                                id="bnd_type2" name="bnd_type[]">
                                            <option value="">إختر</option>
                                            <?php if (!empty($bnd_type_arr2)) {
                                                foreach ($bnd_type_arr2 as $row) { ?>
                                                    <option value="<?= $row->id ?>"
                                                        <?php if (!empty($result->band_id2)) {
                                                            if ($result->band_id2 == $row->id) {
                                                                echo 'selected';
                                                            }
                                                        } ?>

                                                    > <?= $row->title ?>  </option>
                                                <?php }
                                            } ?>
                                        </select></div>


                                    <div class="form-group col-md-1 col-sm-6 padding-4">
                                        <input style="font-weight: 600 !important;" data-validation="required"
                                               type="text" step="any" name="value[]" id="value2"
                                               class="form-control value band2_value"
                                               value="<?= $result->value2 ?>"
                                        >
                                    </div>

                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-xs-12 no-padding">
                            <div id="ValuesDiv3">

                                <?php if (!empty($result->fe2a_type3) && !empty($result->bnd_type3)) { ?>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label"> الفئة </label>
                                        <select data-validation="required" onchange="GetBandType2(this.value,'3')"
                                                class="form-control  " id="fe2a_type3"
                                                name="fe2a_type[]"
                                        >
                                            <option value="">إختر</option>
                                            <?php if (!empty($fe2a_type_arr)) {
                                                foreach ($fe2a_type_arr as $row) { ?>
                                                    <option value="<?= $row->id ?>"
                                                        <?php if (!empty($result->fe2a_type3)) {
                                                            if ($result->fe2a_type3 == $row->id) {
                                                                echo 'selected';
                                                            }
                                                        } ?>

                                                    > <?= $row->title ?>  </option>
                                                <?php }
                                            } ?>
                                        </select></div>


                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label"> البند </label>
                                        <select data-validation="required"
                                                class="form-control   "
                                                onchange="
                         $('#band_tbro3_td2').html($('#bnd_type2 option:selected').text());     "
                                                id="bnd_type3" name="bnd_type[]">
                                            <option value="">إختر</option>
                                            <?php if (!empty($bnd_type_arr3)) {
                                                foreach ($bnd_type_arr3 as $row) { ?>
                                                    <option value="<?= $row->id ?>"
                                                        <?php if (!empty($result->band_id3)) {
                                                            if ($result->band_id3 == $row->id) {
                                                                echo 'selected';
                                                            }
                                                        } ?>

                                                    > <?= $row->title ?>  </option>
                                                <?php }
                                            } ?>
                                        </select></div>


                                    <div class="form-group col-md-1 col-sm-6 padding-4">
                                        <input style="font-weight: 600 !important;" data-validation="required"
                                               type="text" step="any"
                                               name="value[]" id="value2" class="form-control value band2_value "
                                               value="<?= $result->value3 ?>"
                                        >
                                    </div>

                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-xs-12 no-padding">

                            <div id="ValuesDiv4">

                                <?php if (!empty($result->fe2a_type4) && !empty($result->bnd_type4)) { ?>

                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label"> الفئة </label>
                                        <select data-validation="required" onchange="GetBandType2(this.value,'4')"
                                                class="form-control   " id="fe2a_type4"
                                                name="fe2a_type[]"
                                        >
                                            <option value="">إختر</option>
                                            <?php if (!empty($fe2a_type_arr)) {
                                                foreach ($fe2a_type_arr as $row) { ?>
                                                    <option value="<?= $row->id ?>"
                                                        <?php if (!empty($result->fe2a_type4)) {
                                                            if ($result->fe2a_type4 == $row->id) {
                                                                echo 'selected';
                                                            }
                                                        } ?>

                                                    > <?= $row->title ?>  </option>
                                                <?php }
                                            } ?>
                                        </select></div>


                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label"> البند </label>
                                        <select data-validation="required"
                                                class="form-control    "
                                                onchange="
                         $('#band_tbro3_td2').html($('#bnd_type2 option:selected').text());     "
                                                id="bnd_type4" name="bnd_type[]">
                                            <option value="">إختر</option>
                                            <?php if (!empty($bnd_type_arr4)) {
                                                foreach ($bnd_type_arr4 as $row) { ?>
                                                    <option value="<?= $row->id ?>"
                                                        <?php if (!empty($result->band_id4)) {
                                                            if ($result->band_id4 == $row->id) {
                                                                echo 'selected';
                                                            }
                                                        } ?>

                                                    > <?= $row->title ?>  </option>
                                                <?php }
                                            } ?>
                                        </select></div>


                                    <div class="form-group col-md-1 col-sm-6 padding-4">
                                        <input style="font-weight: 600 !important;"
                                               data-validation="required" type="text" step="any"
                                               name="value[]" id="value2" class="form-control
                     value band2_value " value="<?= $result->value4 ?>"
                                        >
                                    </div>

                                <?php } ?>
                            </div>
                        </div>

                    <?php } ?>


                    <?php


                    ?>
                    <div id="fatora_data_form" <?php if ($tsaeer != 1) { ?> style="display:none;"<?php } ?>>
                        <div class="form-group col-md-1 col-sm-6 padding-4">
                            <label class="label"> رقم الفاتورة </label>
                            <input type="text" name="mostand_rkm" id="mostand_rkm" value="<?= $mostand_rkm ?>"
                                   class="form-control " data-validation="required"
                                   data-validation-has-keyup-event="true">
                        </div>

                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label"> اسم جهه التوريد </label>
                            <input type="text" name="geha_name" id="geha_name" value="<?= $geha_name ?>"
                                   class="form-control " data-validation="required"
                                   data-validation-has-keyup-event="true">
                        </div>

                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label"> رقم الجوال </label>
                            <input type="text" name="geha_jwal" id="geha_jwal" value="<?= $geha_jwal ?>"
                                   class="form-control "
                                   onkeypress="validate_number(event)"
                                   data-validation-has-keyup-event="true">
                        </div>

                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label"> تاريخ الفاتورة </label>
                            <input type="date" name="mostand_date" id="mostand_date" value="<?= $mostand_date ?>"
                                   class="form-control "
                                   data-validation-has-keyup-event="true">
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-12 no-padding">

                <table id="table_anf" class="table-bordered table table-responsive tb-table">
                    <thead>
                    <tr class="greentd">
                        <th style="width:30px">م</th>
                        <th style="width:100px">كود الصنف</th>
                        <!-- <th>باركود</th>-->
                        <th>اسم الصنف</th>
                        <th style="width:70px"> الوحدة</th>
                        <th style="width:100px"> الرصيد المتاح</th>
                        <th style="width:100px"> الكمية</th>
                        <th style="width:100px"> سعر الوحدة</th>
                        <th style="width:110px"> القيمة الإجمالية</th>
                        <th style="width:120px"> تاريخ الصلاحية</th>
                        <th style="width:100px"> التشغيلة</th>
                        <th style="width:100px"> الرصيد الحالي</th>
                        <th style="width: 30px;"></th>
                    </tr>
                    </thead>
                    <tbody id="asnafe_table">
                    <?php
                    $total = 0;
                    if ((isset($one_data['asnaf'])) && (!empty($one_data['asnaf'])) && ($one_data['asnaf'] != 0)) {
                        $z = 1;
                        foreach ($one_data['asnaf'] as $sanfe) {
                            ?>
                            <tr id="row_<?= $z ?>">
                                <td><?= $z ?></td>
                                <td><input type="text" name="sanf_code[]" class="form-control testButton "
                                           id="sanf_code<?= $z ?>"
                                           value="<?= $sanfe->sanf_code ?>"
                                           ondblclick=" GetDiv_sanfe('myDiv_sanfe',<?= $z ?>)"
                                           readonly/></td>
                                <!-- <td><input type="text" name="sanf_coade_br[]" class="form-control testButton "
                                           id="sanf_coade_br<?= $z ?>"
                                           value="<?= $sanfe->sanf_coade_br ?>" readonly/></td> -->
                                <td><input type="text" name="sanf_name[]" class="form-control testButton "
                                           id="sanf_name<?= $z ?>"
                                           value="<?= $sanfe->sanf_name ?>" readonly/></td>
                                <td><input type="text" name="sanf_whda[]" class="form-control testButton "
                                           id="sanf_whda<?= $z ?>"
                                           value="<?= $sanfe->sanf_whda ?>" readonly/></td>
                                <td><input type="text" name="sanf_rased[]" class="form-control testButton "
                                           id="sanf_rased<?= $z ?>"
                                           value="<?= $sanfe->sanf_amount ?>" readonly/></td>
                                <td><input type="text" onkeyup="get_diff_money()" name="sanf_amount[]"
                                           oninput="get_total(this,<?= $z ?>)"
                                           class="form-control testButton "
                                           id="sanf_amount<?= $z ?>"
                                           value="<?= $sanfe->sanf_amount ?>"/></td>
                                <td><input type="text" name="sanf_one_price[]"
                                           class="form-control testButton " id="sanf_one_price<?= $z ?>"
                                           value="<?= $sanfe->sanf_one_price ?>" readonly/></td>
                                <td><input type="text" name="all_egmali[]" readonly
                                           class="form-control testButton "
                                           id="all_egmali<?= $z ?>"
                                           value="<?= $sanfe->all_egmali ?>"/></td>
                                <td><?php if (!empty($sanfe->sanf_salahia_date_ar)) {
                                        $type = 'date';
                                        $read = '';

                                    } else {
                                        $type = 'text';
                                        $read = 'readonly';
                                    } ?>
                                    <input type="<?= $type ?>" name="sanf_salahia_date[]"
                                           class="form-control testButton " id="sanf_salahia_date<?= $z ?>"
                                           value="<?= $sanfe->sanf_salahia_date_ar ?>" <?= $read ?>/></td>
                                <td><input type="text" name="lot[]" id="lot<?= $z ?>" value="<?= $sanfe->lot ?>"/></td>
                                <td><input readonly type="text" name="rased_hali[]"
                                           class="form-control testButton "
                                           id="rased_hali<?= $z ?>"
                                           value="<?= $sanfe->rased_hali ?>"/></td>

                                <td><a id="1" onclick=" $(this).closest('tr').remove();set_sum();"><i
                                                class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            $total = $total + $sanfe->all_egmali;
                            $z++;
                        }
                    } else { ?>
                        <tr id="row_1">
                            <td>1</td>
                            <td><input type="text" name="sanf_code[]" class="form-control testButton "
                                       id="sanf_code1" value=""
                                       data-validation="required"
                                       ondblclick=" GetDiv_sanfe('myDiv_sanfe',1)"
                                       readonly/></td>
                            <!--<td><input type="text" name="sanf_coade_br[]" class="form-control testButton "
                                       id="sanf_coade_br1" value="" readonly/></td> -->
                            <td><input type="text" data-validation="required" name="sanf_name[]"
                                       class="form-control testButton "
                                       id="sanf_name1" value="" readonly/></td>
                            <td><input type="text" data-validation="required" name="sanf_whda[]"
                                       class="form-control testButton "
                                       id="sanf_whda1" value="" readonly/></td>
                            <td><input type="text" data-validation="required" name="sanf_rased[]"
                                       class="form-control testButton "
                                       id="sanf_rased1" value="" readonly/></td>
                            <td><input type="text" data-validation="required" name="sanf_amount[]"
                                       oninput="get_total(this,1)"
                                       class="form-control testButton "
                                       id="sanf_amount1" value=""/></td>
                            <td><input type="text" data-validation="required" name="sanf_one_price[]"
                                       class="form-control testButton "
                                       id="sanf_one_price1" value="" readonly/></td>
                            <td><input type="text" name="all_egmali[]" readonly
                                       class="form-control testButton "
                                       id="all_egmali1" value=""/></td>
                            <td><input type="text" name="sanf_salahia_date[]" class="form-control testButton "
                                       id="sanf_salahia_date1" value=""/></td>
                            <td><input type="text" data-validation="required" name="lot[]"
                                       class="form-control testButton " id="lot1"
                                       value=""/></td>
                            <td><input readonly type="text" name="rased_hali[]"
                                       class="form-control testButton "
                                       id="rased_hali1" value=""/></td>

                            <td><a id="1" onclick=" $(this).closest('tr').remove();set_sum();"><i
                                            class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>


                    <tr>
                        <th colspan="2" class="text-center" style="background-color: #fff;">
                            <button type="button" onclick="add_row_sanfe()" class="btn-success btn"
                                    style="font-size: 16px;"><i class="fa fa-plus"></i> إضافة صنف
                            </button>
                        </th>
                        <th colspan="5" class="text-center" style="background-color: #fcb632;"><strong>
                                الإجمالي </strong></th>
                        <th id="total" style="
                        background-color: #fcb632;"><?= $total ?></th>
                        <th colspan="2" style="background-color: #fff;"></th>
                        <th colspan="2" class="text-center" style="background-color: #fff;">
                            <button type="button" onclick="" class="btn-danger btn" style="font-size: 16px;"><i
                                        class="fa fa-trash"></i> حذف صنف
                            </button>
                        </th>
                    </tr>

                    </tfoot>
                </table>
            </div>

            <div class="col-xs-12 text-center">
                <input type="hidden" name="save" value="save"/>
                <button type="button" class="btn btn-labeled btn-success"
                        id="myBtn" onclick="CheckValue();">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

                <!--                <button type="--><? //= $submitEdit ?><!--" class="btn btn-labeled btn-warning"-->
                <!--                        style="background-color: #FFB61E;border-color:#FFB61E"-->
                <!--                        onclick="CheckValue();"-->
                <!--                        name="edit" value="edit" id="edit">-->
                <!--                    <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>تعديل-->
                <!--                </button>-->
                <?php if (!empty($id)) { ?>

                <a onclick=' swal({
                        title: "هل انت متأكد من الحذف ؟",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "حذف",
                        cancelButtonText: "إلغاء",
                        closeOnConfirm: false
                        },
                        function(){
                        swal("تم الحذف!", "", "success");
                        setTimeout(function(){window.location="<?= base_url() . 'st/ezn_edafa/Ezn_edafa/delete/' . base64_encode($id) . '/' . base64_encode($rkm_ezen) ?>";}, 500);
                        });'>
                        <button type="button" class="btn btn-labeled btn-danger">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                        </button></a><?php } else { ?>
                    <button type="button" class="btn btn-labeled btn-danger">
                        <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                    </button>

                <?php } ?>


                <button type="button"
                        class="btn btn-labeled btn-inverse " id="attach_button" <?php
                if (isset($one_data['tabr3'])) {
                    ?>
                    onclick="checkInputs()"
                    <?php
                }
                ?>
                        data-toggle="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-cloud-upload"></i></span>
                    <?php if (empty($sanfe->attaches)) {
                        echo 'اضافة مرفق';
                    } else {
                        echo 'عرض المرفقات ';
                    } ?>

                </button>
                <?php if (!empty($id)) {

                    ?>
                    <?php if ($type_ezn == 2) { ?>

                    <button
                            type="button" onclick="print_moshtriat(<?= $id ?>)"
                            class="btn btn-labeled btn-purple ">
                            <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                        </button><?php } else { ?>
                        <button
                                type="button" onclick="print_rescrv(<?= $id ?>)"
                                class="btn btn-labeled btn-purple ">
                            <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                        </button>
                    <?php } ?>
                <?php } else { ?>
                    <button
                            type="button"
                            class="btn btn-labeled btn-purple ">
                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                    </button>
                <?php } ?>


                <button type="button" class="btn btn-labeled btn-inverse " id="search_button" data-target="#searchModal"
                        data-toggle="modal">
                    <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                </button>


            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-------------------------------------- modal-------------------------->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> الموردين </h4>
            </div>
            <div class="modal-body">

                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th style="font-size: 15px; width:88px !important; ">#</th>
                        <th style="font-size: 15px;" class="text-left"> كود المورد</th>
                        <th style="font-size: 15px;" class="text-left">إسم المورد</th>
                        <th style="font-size: 15px;" class="text-left"> رقم الجوال</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($suppliers) && !empty($suppliers)) {
                        $x = 1;
                        foreach ($suppliers as $supplier) {
                            //  $onclick = "$('#name').val(" .$supplier->name. "); $('#myModal').modal('hide');";


                            ?>
                            <tr ondblclick="get_supplier('<?= $supplier->name ?>',<?= $supplier->resp_jwal ?>,<?= $supplier->id ?>);">
                                <td ondblclick="get_supplier('<?= $supplier->name ?>',<?= $supplier->resp_jwal ?>,<?= $supplier->id ?>);">
                                    <input type="radio" name="supplier">
                                </td>
                                <td><?= $supplier->code ?></td>
                                <td><?= $supplier->name ?></td>
                                <td><?= $supplier->resp_jwal ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التفاصيل </h4>
            </div>
            <div class="modal-body" id="details_result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <?php

                ?>
                <button
                        type="button" onclick="print_moshtriat(document.getElementById('moshtriat_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <?php
                //   }
                ?>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>

<!------------------------------------------>
<?php if ((isset($all_data)) && (!empty($all_data))) { ?>

    <div class="col-xs-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">عرض أذونات الإضافة</h3>
            </div>
            <div class="panel-body">
                <table class="table-bordered table  example">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th>رقم الإذن</th>
                        <th>نوع الإذن</th>
                        <th>تاريخ الإذن</th>
                        <th>المستودع</th>
                        <th>الاسم</th>
                        <th> الجوال</th>

                        <th> الإجراءات</th>
                        <th> القائم بالاضافة</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $x = 1;
                    foreach ($all_data as $datum) { ?>
                        <tr>
                            <td><?= $x ?></td>
                            <td><?= $datum->ezn_rkm ?></td>
                            <td>
                                <?php if ($datum->type_ezn == 1) {
                                    echo 'تبرعات عينيه';
                                } else {
                                    echo 'مشتريات عينيه';
                                }
                                ?>
                            </td>
                            <td><?= $datum->ezn_date_ar ?></td>
                            <td><?= $datum->storage_name ?></td>
                            <td>
                                <?= $datum->person_name ?>
                            </td>
                            <td> <?= $datum->person_jwal ?></td>

                            <td>
                                <?php if ($datum->type_ezn == 1) { ?>
                                    <a type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                       style="padding: 1px 5px;"
                                       data-target="#myModalInfo_asnafe"
                                       onclick="get_details_sanf('<?= $datum->id ?>')"></i> <i class="fa fa-list"></i>
                                    </a>

                                <?php } else { ?>

                                    <a type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                       style="padding: 1px 5px;"
                                       data-target="#detailsModal" onclick="load_page(<?= $datum->id ?>);"><i
                                                class="fa fa-list"></i>
                                    </a>


                                <?php } ?>


                                <a onclick="print_ezn_edafa(<?= $datum->id ?>)" title="طباعه"><i
                                            class="fa fa-print"></i></a>

                                <!-- <button type="button" class="btn  btn-labeled btn-inverse " id="attach_button" onclick="$('#set').val(<?php echo $datum->id; ?>)" data-toggle="modal" data-target="#myModal_attach">
    <span class="btn-label" style="padding: 1px 6px;"><i class="glyphicon glyphicon-cloud-upload"></i></span>
    اضافة مرفق
</button>-->
                                <a title="عرض المرفق"
                                   onclick=" load_add_morfaq(<?php echo $datum->id; ?>);$('#set').val(<?php echo $datum->id; ?>)"
                                   data-toggle="modal"
                                   data-target="#modal-add_morfaq"> <i class="fa fa-cloud-upload"
                                                                       aria-hidden="true"></i> </a>


                                <a onclick='swal({
                                        title: "هل انت متأكد من التعديل ؟",
                                        text: "",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-warning",
                                        confirmButtonText: "تعديل",
                                        cancelButtonText: "إلغاء",
                                        closeOnConfirm: false
                                        },
                                        function(){
                                        window.location="<?= base_url() . 'st/ezn_edafa/Ezn_edafa/update/' . base64_encode($datum->id) ?>";
                                        });'>
                                    <i class="fa fa-pencil"> </i></a>
                                <a onclick=' swal({
                                        title: "هل انت متأكد من الحذف ؟",
                                        text: "",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-danger",
                                        confirmButtonText: "حذف",
                                        cancelButtonText: "إلغاء",
                                        closeOnConfirm: false
                                        },
                                        function(){
                                        swal("تم الحذف!", "", "success");
                                        setTimeout(function(){window.location="<?= base_url() . 'st/ezn_edafa/Ezn_edafa/delete/' . base64_encode($datum->id) . '/' . base64_encode($datum->ezn_rkm) ?>";}, 500);
                                        });'>
                                    <i class="fa fa-trash"> </i></a>


                              <!--  <button type="button"

                                        onclick=' swal({
                                                title: "هل تريد التحويل الي الشؤون الماليه؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-success",
                                                confirmButtonText: "نعم",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: false
                                                },
                                                function(){
                                                swal("تم التحويل الي الشؤون الماليه !", "", "success");
                                                change_status(<?php echo $datum->id; ?>,this);
                                                setTimeout(function () { location.reload();}, 500);

                                                }),remove(<?= $x ?>);'

                                        name="select5" id="select5" class=" btn  btn-warning btn-labeled"><span
                                            class="btn-label" style="padding: 1px 6px;"><i
                                                class="fa fa-share"></i></span>التحويل للشؤون
                                    الماليه
                                </button>-->
       <button type="button"

                                        onclick=' swal({
                                                title: "هل تريد التحويل الي الشؤون الماليه؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-success",
                                                confirmButtonText: "نعم",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: false
                                                },
                                                function(){
                                                swal("تم التحويل الي الشؤون الماليه !", "", "success");
                                                change_status(<?php echo $datum->id; ?>,$("#select<?php echo $datum->id; ?>"));
                          // setTimeout(function () { location.reload();}, 500);

                                                });'

                                        name="select5" id="select<?php echo $datum->id; ?>" class=" btn  btn-warning btn-labeled"><span
                                            class="btn-label" style="padding: 1px 6px;"><i
                                                class="fa fa-share"></i></span>التحويل للشؤون
                                    الماليه
                                </button>


                            </td>
                            <td>
  <span style="font-size: 12px; color: white !important; font-weight: normal;background-color: #c57400;    width: 150px;"
        class="badge badge-add"><?php echo $datum->publisher_name; ?></span></td>

                        </tr>
                        <?php $x++;
                    } ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
<?php }
?>

<div class="modal fade" id="modal-add_morfaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">اضافة مرفقات</h4>
            </div>
            <div class="modal-body" id="my_morfaq_add">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- sora -->
<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    الصورة</h4>
            </div>
            <div class="modal-body">
                <img src="" id="img_morfaq"
                     width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> المتبرعين </h4>
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

<div class="modal fade" id="myModalInfo_asnafe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> التفاصيل </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="details_body">


            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <!--                print_pop -->
                <input type="hidden" id="ezn_id_pop_h" value="">

                <button onclick="print_rescrv(document.getElementById('ezn_id_pop_h').value)"
                        type="button"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> الأصناف </h4>
            </div>
            <div class="modal-body">
                <div id="myDiv_sanfe"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal_attach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
            </div>


            <div class="modal-body">


                <?php echo form_open_multipart(base_url() . 'st/ezn_edafa/Ezn_edafa/add_attach') ?>
                <input type="hidden" name="set" id="set" value=''/>
                <button type="button" onclick="add_row()" class="btn btn-success btn-next"/>
                <i class="fa fa-plus"></i> إضافة </button><br><br>
                <div class="AttachTable">
                    <table class="table table-striped table-bordered fixed-table mytable "
                    >
                        <thead>
                        <tr class="info">

                            <th class="text-center"> إسم المرفق</th>
                            <th class="text-center">المرفق</th>
                            <th class="text-center"> الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="attachTable">
                        <tr id="row_1">
                            <td><input type="input" name="title[]" id="title" class="form-control"
                                       data-validation="reuqired"></td>
                            <td><input type="file" name="file[]"
                                       class="form-control testButton inputclass"
                                       id="file" value=""

                                /></td>


                            <td><a id="1" onclick=" $(this).closest('tr').remove();"><i
                                            class="fa fa-trash"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <!--<input type="hidden" name="id" id="id" >-->
                <button type="submit" class="btn btn-success" style="display: inline-block;padding: 6px 12px;"
                        onclick="GetAttachTable()"
                        name="add_attach" id="saves" data-dismiss="modal">حفظ
                </button>
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
                </form>


            </div>

        </div>
    </div>
</div>

<!-- attach Modal-->


<!--Search Modal -->


<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">بحث</h4>
            </div>
            <div class="modal-body" id="div_search">

                <div class="col-md-12">

                    <div class="col-md-1">
                        <h6 class="label_title_2 label-blue ">بحث ب </h6>
                    </div>
                    <div class="col-md-3  no-padding">
                        <?php
                        $array_search = array(
                            'ezn_rkm' => ' رقم الإذن ',
                            'type_ezn' => ' نوع الإذن ',
                            'ezn_date_ar' => ' تاريخ الإذن ',
                            'storage_fk' => '  المستودع ',
                            'person_name' => ' الاسم ',
                            'person_jwal' => ' رقم الجوال ',
                            'pay_method' => ' طريقة الشراء ',
                            'no3_tabro3' => '  نوع التبرع ',
                            'geha_name' => '  اسم الجهة ',
                            'mostand_rkm' => ' رقم المستند '
                        );
                        ?>

                        <select id="array_search_id" class="form-control   "
                                aria-required="true" onchange="check_val($(this).val())">
                            <option value="">إختر</option>

                            <?php foreach ($array_search as $key => $row_search) { ?>
                                <option value="<?= $key ?>"><?= $row_search ?> </option>
                            <?php } ?>
                        </select>


                    </div>


                    <div class="col-md-3  no-padding input_search_id" style="display:none; margin-left: 0;">


                        <input id="input_search_id" name="name" value="" class="form-control   "
                               aria-required="true">


                    </div>

                    <div class="col-md-4  no-padding input_search_id3" style="display:none; margin-left: 0;">

                        <select id="select_search_id1" class="form-control   "
                                aria-required="true">
                            <option value=""> اختر</option>
                        </select>

                    </div>


                    <div class="col-md-3  padding-4 input_search_id4" style="display:none; margin-left: 0;">

                        <select id="select_search_id2" class="form-control   "
                                aria-required="true">
                            <option value=""> اختر</option>
                            <?php
                            $process = array(1 => 'نقدي', 2 => 'آجل');

                            foreach ($process as $key => $value) {
                                ?>
                                <option value="<?= $key; ?>"

                                ><?= $value; ?></option>

                            <?php } ?>
                        </select>

                    </div>

                    <div class="col-md-3  padding-4 input_search_id5" style="display:none; margin-left: 0;">

                        <select id="select_search_id5" class="form-control   "
                                aria-required="true">
                            <option value=""> اختر</option>
                            <?php
                            $type = array(1 => 'تبرعات عينيه', 2 => 'مشتريات عينيه');

                            foreach ($type as $key => $value) {
                                ?>
                                <option value="<?= $key; ?>"

                                ><?= $value; ?></option>

                            <?php } ?>
                        </select>

                    </div>
                    <button type="button" onclick="searchResults()" class="btn btn-success btn-next"/>
                    <i class="fa fa-search-plus"></i> بحث </button><br><br>

                </div>


                <table id="table" class="table example table-striped table-bordered" style="display: none;">

                    <thead>
                    <tr class="info myTable">
                        <th class="text-center myclass"> #</th>

                        <th>رقم الإذن</th>
                        <th>نوع الإذن</th>
                        <th>تاريخ الإذن</th>
                        <th>المستودع</th>
                        <th>الاسم</th>
                        <th> الجوال</th>

                    </tr>
                    </thead>
                    <tbody class="result_search_modal">

                    </tbody>
                </table>


            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">

                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<!--Search Modal -->

<script>

    function GetDiv(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> الإسم </th><th style="width: 170px;" >الهوية </th><th style="width: 170px;" >الجوال</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members').show();
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/ezn_edafa/Ezn_edafa/getConnection',

            aoColumns: [
                {"bSortable": true},
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
<script>
    function GetDiv_sanfe(div, row_id) {
        var storage_fk = $('#storage_fk').val();

        // var store_id = $('#storage_fk').val();
        //alert(store_id);

        if (storage_fk === '') {
            swal({
                title: "من فضلك اختر المستودع اولا ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });

        } else {
            $('#myModal').modal('show');
            console.log('storage_fk :' + storage_fk);
            html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الصنف </th><th style="width: 170px;" >أسم الصنف  </th><th style="width: 170px;" >الوحدة</th>' +
                '</tr></thead><table><div id="dataMember"></div></div>';
            $("#" + div).html(html);
            $('#js_table_members2').show();
            var oTable_usergroup = $('#js_table_members2').DataTable({
                dom: 'Bfrtip',
                "ajax": '<?php echo base_url(); ?>st/ezn_edafa/Ezn_edafa/getConnection2/' + row_id + '/' + storage_fk,

                aoColumns: [
                    {"bSortable": true},
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
    }
</script>
<script>

    function GetMemberName(obj) {

        console.log(' obj :' + obj.dataset.name);
        var name = obj.dataset.name;
        var mob = obj.dataset.mob;
        var id = obj.dataset.id;
        document.getElementById('motbr3_name').value = name;
        document.getElementById('motbr3_jwal').value = mob;
        document.getElementById('motbr3_id_fk').value = id;

        $("#myModalInfo .close").click();

    }

    function Get_sanfe_Name(obj, id) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var code = obj.dataset.code;
        var code_br = obj.dataset.code_br;
        var whda = obj.dataset.whda;
        var price = obj.dataset.price;
        var slahia = obj.dataset.slahia;
        var sanf_rased = parseFloat(obj.dataset.all_rased);
        if (parseInt(slahia) == 1) {
            document.getElementById('sanf_salahia_date' + id).type = 'date';
            document.getElementById('sanf_salahia_date' + id).value = '<?=date('Y-m-d')?>';
        } else {
            document.getElementById('sanf_salahia_date' + id).type = 'text';
            $('#sanf_salahia_date' + id).attr('readonly', 'readonly');
            $('#sanf_salahia_date' + id).val('');

        }
        document.getElementById('sanf_name' + id).value = name;
        document.getElementById('sanf_code' + id).value = code;
        // document.getElementById('sanf_coade_br' + id).value = code_br;
        document.getElementById('sanf_whda' + id).value = whda;
        document.getElementById('sanf_one_price' + id).value = price;
        document.getElementById('sanf_rased' + id).value = sanf_rased;

        $("#myModal .close").click();

    }

    function add_row_sanfe() {
        var table = document.getElementById('asnafe_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;

        var row = ' <tr id="row_1" >\n' +
            '                        <td>' + (len + 1) + '</td>\n' +
            '                        <td> <input type="text"  data-validation="required" class="form-control testButton " name="sanf_code[]" id="sanf_code' + (len + 1) + '" value=""  ondblclick=" GetDiv_sanfe(\'myDiv_sanfe\',' + (len + 1) + ')" readonly/></td>\n' +
            //'                        <td> <input type="text" class="form-control testButton " name="sanf_coade_br[]" id="sanf_coade_br' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text"  data-validation="required" class="form-control testButton " name="sanf_name[]" id="sanf_name' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text"  data-validation="required" class="form-control testButton " name="sanf_whda[]" id="sanf_whda' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text"  data-validation="required" class="form-control testButton " name="sanf_rased[]" id="sanf_rased' + (len + 1) + '" value="" readonly /></td>\n' +
            '                        <td> <input type="text"  data-validation="required" class="form-control testButton " name="sanf_amount[]"  oninput="get_total(this,' + (len + 1) + ')" id="sanf_amount' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" data-validation="required"  class="form-control testButton " name="sanf_one_price[]" id="sanf_one_price' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton " name="all_egmali[]" id="all_egmali' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton " name="sanf_salahia_date[]" id="sanf_salahia_date' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" data-validation="required" class="form-control testButton " name="lot[]" id="lot' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" readonly class="form-control testButton " name="rased_hali[]" id="rased_hali' + (len + 1) + '" value="" /></td>\n' +
            '\n' +
            '                        <td><a id="1" onclick=" $(this).closest(\'tr\').remove(); set_sum();"><i class="fa fa-trash"></i></a></td>\n' +
            '                    </tr>';

        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);

        // 
    }

    function get_details_sanf(id) {
        document.getElementById('ezn_id_pop_h').value = id;
        var request = $.ajax({
            url: "<?=base_url() . 'st/ezn_edafa/Ezn_edafa/get_detailes'?>",
            type: "POST",
            data: {id: id}
        });
        request.done(function (msg) {
            //   alert(msg);

            $('#details_body').html(msg);

        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }

    function delete_table() {
        var table = document.getElementById('orders_details_body');
        var len = table.rows.length;
        console.log('lenthg  table : ' + len);
        $("#orders_details_body").find("tr").remove();


    }
</script>

<script>

    function GEtF2a(value, type) {
        if (value != 0 && value > 0 && value != 0) {

            var dataString = 'id=' + value + '&type=' + type;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/GetData',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    //   console.log(JSONObject);
                    if (type === 'fe2a') {
                        //  if(JSONObject.length > 1) {
                        var html = '<option value="">إختر </option>';
                        //}
                        for (i = 0; i < JSONObject.length; i++) {
                            html += '<option value="' + JSONObject[i].id + '" data-from_id="' + JSONObject[i].from_id + '"> ' + JSONObject[i].title + '</option>';
                        }
                        $("#fe2a").html(html);

                    } else if (type === 'band') {
                        if (JSONObject.length > 1) {
                            var html = '<option value="">إختر </option>';
                        }
                        for (i = 0; i < JSONObject.length; i++) {
                            html += '<option value="' + JSONObject[i].id + '" data-from_id="' + JSONObject[i].from_id + '"> ' + JSONObject[i].title + '</option>';
                        }
                        $("#band").html(html);

                    }
                }
            });
        }

    }

    function get_total(amount, id) {
        console.log('amount :' + amount.value + " all_egmali: " + parseFloat($('#sanf_one_price' + id).val()));
        var sanf_rased = (parseInt($('#sanf_rased' + id).val()));
        //  if (amount.value <= sanf_rased) {
        $('#all_egmali' + id).val((amount.value * parseFloat($('#sanf_one_price' + id).val())));
        $('#rased_hali' + id).val(parseFloat(sanf_rased) + parseFloat(amount.value));
        set_sum();
        //   }else {
        //        amount.value=0;
        //        $('#all_egmali' + id).val(0);
        //        $('#rased_hali' + id).val(0);
        //        set_sum();

        //  }
        // 
    }

    function set_sum() {
        var all_egmali = document.getElementsByName('all_egmali[]');
        var sum = 0;
        for (var i = 0; i < all_egmali.length; i++) {
            sum = sum + parseFloat(all_egmali[i].value);
        }
        console.log('sum :' + sum);

        $('#total').text(sum);
    }

    function print_rescrv(id) {
        console.log('id :' + id);
        var request = $.ajax({
            url: "<?=base_url() . 'st/ezn_edafa/Ezn_edafa/print_pop/'?>",
            type: "POST",
            data: {id: id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();

        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>

<script>
    function get_form(valu) {
        if (valu == 2) {
            $('#tabro3').fadeIn(2000);
            $('#moshtrat').fadeOut(2000);
        } else {
            $('#tabro3').fadeOut(2000);
            $('#moshtrat').fadeIn(2000);

        }
    }
</script>


<script>
    function getCode(id) {
        var type = $("input[name='type_ezn']:checked").val();
        var dataString = 'id=' + id;

        if (type == 2) {

            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/get_code',
                data: dataString,
                dataType: 'html',

                cache: false,
                success: function (html) {
                    //   alert(html);
                    if (html == 0) {
                        swal({
                            title: "من فضلك راجع بيانات المستودع",
                            type: "warning",
                            confirmButtonClass: "btn-warning",
                            closeOnConfirm: false
                        });
                    } else {
                        arr = JSON.parse(html);
                        $('#rkm_ezn_edafa').val(arr.rkm_hesab_moshtriat);
                        $('#ezn_edafa_name').val(arr.hesab_moshtriat_name);
                    }


                }
            });
        } else {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/get_code',
                data: dataString,
                dataType: 'html',

                cache: false,
                success: function (html) {
                    //   alert(html);

                    if (html == 0) {
                        swal({
                            title: "من فضلك راجع بيانات المستودع",
                            type: "warning",
                            confirmButtonClass: "btn-warning",
                            closeOnConfirm: false
                        });
                    } else {
                        arr = JSON.parse(html);
                        $('#rkm_ezn_edafa').val(arr.rkm_hesab);
                        $('#ezn_edafa_name').val(arr.hesab_name);

                    }

                }
            });

        }

    }
</script>

<script>
    function get_supplier(name2, jwal, id) {

        $('#name').val(name2);
        $('#jwal').val(jwal);
        $('#supplier_fk').val(id);
        $('#myModal2').modal('hide');

    }


</script>
<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>st/ezn_edafa/Ezn_edafa/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>

<script>
    function print_moshtriat(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'st/ezn_edafa/Ezn_edafa/Print_moshtriat'?>",
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

    function checkInputs() {

        var inputsNotEmprty = [];
        $(".").each(function () {
            if ($(this).val() != '') {
                inputsNotEmprty.push($(this).val());
            }
        });

        $("#attach_button").attr('data-target', '#myModal_attach');


    }
</script>


<script>

    function GetAttachTable() {
        $('#AttachTableDiv').html('');
        $(".AttachTable").clone().appendTo('#AttachTableDiv');
        $("#myModal_attach .close").click();
    }
</script>
<script>

    function add_row() {
        var table = document.getElementById('morfq_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;

        var row = ' <tr id="row_1" >\n' +

            '                        <td> <input type="file"  class="form-control testButton inputclass" name="file[]" id="file' + (len + 1) + '" value=""   /></td>\n' +
            '                        <td><a id="1" onclick=" $(this).closest(\'tr\').remove(); "><i class="fa fa-trash"></i></a></td>\n' +
            '                    </tr>';

        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);


    }


    function DeleteRowImg(valu) {
        $('.' + valu).remove();
        // var x = document.getElementById('resultTable');
        var len = $(".attachTable").length;
        if (len == 0) {
            $(".mytable").hide();
        }
    }
</script>


<!--------------------------------------------------------------->

<script>

    function check_val(valu) {

        $("th").remove(".myRow");
        $('.result_search_modal').html('   <tr >\n' +
            '                        <th colspan="6" class="myalert"><div style="color: red;"> لا توجد نتائج للبحث !!</div></th>\n' +
            '\n' +
            '                    </tr>');
        if (valu === 'ezn_rkm' || valu === 'person_name' || valu === 'person_jwal' || valu === 'geha_name' || valu === 'geha_name') {
            $('.input_search_id').show();
            $('#input_search_id').attr('type', 'text');
            $('#input_search_id').val('');
            $('.input_search_id4').hide();
            $('.input_search_id5').hide();
            $('.input_search_id3').hide();

        } else if (valu === 'ezn_date_ar') {
            $('.input_search_id').show();
            $('#input_search_id').attr('type', 'date');
            $('#input_search_id').val('');
            $('.input_search_id4').hide();
            $('.input_search_id5').hide();
            $('.input_search_id3').hide();

        } else if (valu == 'no3_tabro3') {
            $('#select_search_id1').length = 0;
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>st/ezn_edafa/Ezn_edafa/get_tabr3",

                success: function (d) {
                    jeson_data = JSON.parse(d);
                    $('#select_search_id1').html('');
                    $('#select_search_id1').append('<option value="">اختر </option>');

                    for (var i = 0; i < jeson_data.length; i++) {

                        $('#select_search_id1').append('<option value="' + jeson_data[i].code + '"> ' + jeson_data[i].title + ' </option>');
                    }
                }

            });

            $('.input_search_id3').show();
            $('.input_search_id2').hide();
            $('.input_search_id').hide();
            $('.input_search_id4').hide();
            $('.input_search_id5').hide();


        } else if (valu == 'storage_fk') {

            $('#select_search_id1').length = 0;
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>st/ezn_edafa/Ezn_edafa/get_storage",

                success: function (d) {
                    // alert(d);
                    //return;
                    jeson_data = JSON.parse(d);
                    $('#select_search_id1').html('');
                    $('#select_search_id1').append('<option value="">اختر </option>');

                    for (var i = 0; i < jeson_data.length; i++) {

                        $('#select_search_id1').append('<option value="' + jeson_data[i].id_setting + '"> ' + jeson_data[i].title_setting + ' </option>');
                    }
                }

            });

            $('.input_search_id3').show();
            $('.input_search_id2').hide();
            $('.input_search_id').hide();
            $('.input_search_id4').hide();
            $('.input_search_id5').hide();
        } else if (valu == 'pay_method') {
            //  $('#select_search_id1').length=0;

            $('.input_search_id4').show();
            $('.input_search_id2').hide();
            $('.input_search_id').hide();
            $('.input_search_id3').hide();


        } else if (valu == 'type_ezn') {
            $('.input_search_id5').show();
            $('.input_search_id4').hide();
            $('.input_search_id2').hide();
            $('.input_search_id').hide();
            $('.input_search_id3').hide();

        }


    }
</script>

<script>

    function searchResults() {
        $('.example').show();
        var select_search_id1 = $('#select_search_id1').val();
        var select_search_id2 = $('#select_search_id2').val();
        var select_search_id5 = $('#select_search_id5').val();
        var array_search_id = $('#array_search_id').val();
        var input_search_id = $('#input_search_id').val();
        //input_search_id  select_search_id
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>st/ezn_edafa/Ezn_edafa/get_search_result",
            data: {
                select_search_id1: select_search_id1,
                select_search_id2: select_search_id2,
                select_search_id5: select_search_id5,
                array_search_id: array_search_id,
                input_search_id: input_search_id
            },

            success: function (d) {
                //  alert(d);
                //     return;

                $('.result_search_modal').html(d);

            }

        });
    }
</script>


<script>
    /*function change_status(id, element) {
        $('#' + id).remove();


        $.ajax({
            url: "<?php echo base_url();?>st/ezn_edafa/Ezn_edafa/change_status",
            type: 'POST',
            data: {select5: id},
            dataType: 'JSON',
            success: function (data) {
                console.log('data :' + data);
                // $(id).closest('#select5').remove();
                // $('#'+id).remove();


            }
        });
    }*/
    
        function change_status(id, element) {
       // $('#' + id).remove();
        
      // $(elem).closest("tr").remove();
        $(element).closest('tr').remove();

        $.ajax({
            url: "<?php echo base_url();?>st/ezn_edafa/Ezn_edafa/change_status",
            type: 'POST',
            data: {select5: id},
            dataType: 'JSON',
            success: function (html) {
            }
        });
    }
</script>

<!----------------------    28-5-om  ----------------------------------------->
<script>


    function GetValues() {

        var click_state = parseInt($('#myId').attr('data-click-state'));
        console.log(' click_state : ' + click_state);

        if ($('#myId').attr('data-click-state') < 4) {
            click_state += 1;
            $('#myId').attr('data-click-state', click_state);
            console.log('new  click_state : ' + click_state);

            var no3_tabro3 = $('option:selected', $('#no3_tabro3')).data('from_id');
            var fe2a = $('option:selected', $('#fe2a')).data('from_id');
            var band = $('option:selected', $('#band')).data('from_id');

            var dataString = 'erad_tbro3=' + no3_tabro3 + '&fe2a=' + fe2a + '&band=' + band;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/GetData2',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    var html = '<option>إختر </option>';
                    for (i = 0; i < JSONObject.fe2a_type2_arr.length; i++) {
                        html += '<option value="' + JSONObject.fe2a_type2_arr[i].id + '" data-from_id="' + JSONObject.fe2a_type2_arr[i].from_id + '">' + JSONObject.fe2a_type2_arr[i].title + '</option>';
                    }
                    $("#fe2a_type" + click_state).html(html);
                }
            });

            $("#first_value").html('<input style="font-weight: 600 !important;" type="text" step="any" data-validation="required" ' +
                'name="value[]" class="form-control  value band1_value"  ' +
                ' " >');

            $("#ValuesDiv" + click_state).append(' <div class="form-group col-md-3 col-sm-6 padding-4">' +
                //  ' <label class="label"> الفئة </label>' +
                '<select data-validation="required"   onchange="GetBandType2($(\'option:selected\', this).data(\'from_id\'),' + click_state + ');" class="form-control  "' +
                ' id="fe2a_type' + click_state + '" name="fe2a_type[]"   >' +
                '<option value="">إختر  </option></select></div></div>');

            $("#ValuesDiv" + click_state).append('<div class="form-group col-md-3 col-sm-6 padding-4">' +
                //'<label class="label"> البند </label>' +
                '<select data-validation="required"   class="form-control "  ' +
                '  id="bnd_type' + click_state + '" name="bnd_type[]"  >' +
                '<option value="0">إختر  </option></select></div></div>');

            $("#ValuesDiv" + click_state).append('<div  class=" form-group col-md-1  padding-4" >' +
                '<input style="font-weight: 600 !important;" data-validation="required" type="text" step="any"' +
                ' name="value[]" class="form-control  value band_value' + click_state + '" ' +
                ' " ></div>');


            $('#secondFe2aType').show();
            $('.about_td').attr('rowspan', '2');
            $('#value1').show();
        }


    }

    function minus_div() {
        var click_state = parseInt($('#myId_munis').attr('data-click-state'));
        console.log(' munis click_state : ' + click_state);
        if (click_state >= 2) {
            $('#secondFe2aType').hide();
            $('.about_td').attr('rowspan', '0');
            $('#value1').hide();
            $('#first_value' + click_state).html('');
            $('#ValuesDiv' + click_state).html('');
            click_state -= 1;
            $('#myId_munis').attr('data-click-state', click_state);
            $('#myId').attr('data-click-state', click_state);

        }
    }

    function GetBandType2(value, row_id) {

        var bands = [];
        $('select[name^=bnd_type]').each(function () {
            bands.push($(this).data('from_id'));
        });
        console.log(' bands : ' + bands[0]);
        bands = JSON.stringify(bands);
        var dataString = 'id=' + value + '&FirstBandValue=' + bands;

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/GetBandType2',
            data: dataString,
            cache: false,
            success: function (json_data) {
                var JSONObject = JSON.parse(json_data);
                if (JSONObject.length > 1) {
                    var html = '<option>إختر </option>';
                }
                for (i = 0; i < JSONObject.length; i++) {
                    html += '<option value="' + JSONObject[i].id + '" data-from_id="' + JSONObject[i].from_id + '"> ' + JSONObject[i].title + '</option>';
                }
                $("#bnd_type" + row_id).html(html);
            }
        });


    }
</script>
<script>
    function print_ezn_edafa(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'st/ezn_edafa/Ezn_edafa/print_ezn_edafa'?>",
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
    function CheckValue() {
        var all_value = $('#all_value').val();

        var total = $('#total').text();
        var sum = 0;
        $(".value").each(function () {
            sum += +$(this).val();
        });

        var all_value = parseInt(all_value);
        var total = parseInt(total);


        console.log(' all_value : ' + all_value + 'total : ' + total + 'sum : ' + sum);

        var radioValue = $("input[name='tsaeer']:checked").val();
        if (radioValue) {
            if ((sum + total) > all_value) {
                swal({
                    title: "انتبه ! ... الاجمالي اكبر من المبلغ المدفوع",
                    confirmButtonText: "تم"
                });
                // alert("انتبه ! ... الاجمالي اكبر من المبلغ المدفوع");
                // $('#myBtn').attr('disabled', 'disabled');
            } else if ((sum + total) < all_value) {
                swal({
                    title: "انتبه ! ... الاجمالي اصغر من المبلغ المدفوع",
                    confirmButtonText: "تم"
                });
                // alert("انتبه ! ... الاجمالي اصغر من المبلغ المدفوع");
                // $('#myBtn').attr('disabled', 'disabled');
            } else {
                // $('#myBtn').removeAttr("disabled");
                $('#myform').submit();

            }

        } else {
            swal({
                title: "من فضلك اختر طريقة التسعير....",
                confirmButtonText: "تم"
            });
        }
    }


</script>

<script>
    function load_add_morfaq(ezn_rkm) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/add_attach',
            data: {set: ezn_rkm},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#my_morfaq_add").html(html);

            }
        });

    }

    function delete_my_morfaq(elem, attach) {
        $(elem).closest("tr").remove();

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/delete_attach',
            data: {attach: attach},
            dataType: 'html',
            cache: false,
            success: function (html) {

            }
        });

    }

</script>
