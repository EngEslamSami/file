<style type="text/css">
    .btn-group > .btn, .btn-group > .btn + .btn, .btn-group > .btn:first-child, .fc .fc-button-group > * {
        height: 34px !important;
        border-radius: 4px !important;
        margin: 0 !important;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: 92% !important;
    }

    .btn-label {
        left: 12px;
    }


    .list::-webkit-calendar-picker-indicator {
        display: none;
    }

    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }

    input[type=date]::-webkit-clear-button {
        display: none;
        -webkit-appearance: none;
    }


    .fa-plus.sspan {
        background-color: #5b69bc;
        padding: 3px 6px;
        color: #fff;
        border-radius: 5px;
    }


    td .fa-trash {
        border-radius: 7px !important;
    }

    .fa-plus.sspan {

        border-radius: 7px !important;
        font-size: 15px !important;
    }


    .radio label, .checkbox label {

        font-size: 17px !important;
        font-weight: bold !important;

    }


    .bootstrap-select > .btn {
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


    .btn-group .dropdown-menu > li > a {
        color: #0f0f0f;
        font-weight: 600;
        padding: 5px 5px;
    }

    .btn-group .dropdown-menu {
        left: 0;
        right: auto;
    }


    td input[type=radio] {
        height: 20px;
        width: 20px;
    }


</style>

<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($result) && !empty($result)) {

                $rkm = $result->process_rkm;
                $process_date_ar = $result->process_date_ar;
                $geha_name = $result->geha_name;
                $emp_name = $result->emp_name;
                $emp_card_num = $result->emp_card_num;


                $button1 = 'display:none';
                $button2 = '';


                $form_action = 'finance_accounting/box/forms/transformation_accounts/Transformation_accounts/update/' . $result->process_rkm;
            } else {

                $rkm = $last_id;
                $process_date_ar = date('Y-m-d');
                $geha_name = '';
                $emp_name = '';
                $emp_card_num = '';


                $button2 = 'display:none';
                $button1 = '';

                $form_action = 'finance_accounting/box/forms/transformation_accounts/Transformation_accounts/insert';


            }
            ?>
            <?php
            echo form_open_multipart($form_action, array('id' => 'myform'));

            ?>

            <div class="col-sm-12 form-group">
                <div class="col-sm-1  col-md-2 padding-4 ">
                    <label class="label   ">طريقة التحويل </label>
                    <select name="method_type" id="method_type" onchange="check_Btn()"
                            class="selectpicker no-padding form-control  form-control "
                            data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="">اختر</option>
                        <?php

                        $method_arr = array(1 => 'عن طريق المصرف/ البنك', 2 => 'عن طريق الأونلاين');

                        foreach ($method_arr as $key => $value) { ?>
                            <option value="<?= $key ?>"
                                <?php
                                if (!empty($result->method_type)) {
                                    if ($result->method_type == $key) {
                                        echo 'selected';
                                    }
                                }

                                ?>
                            > <?= $value ?> </option>
                        <?php }
                        ?>
                    </select>
                </div>


                <div class="col-sm-3  col-md-1 padding-4 ">
                    <label class="label   ">رقم العملية</label>
                    <input type="text" name="process_rkm" readonly id="process_rkm" value="<?php echo $rkm ?>"
                           class="form-control  " data-validation-has-keyup-event="true">
                </div>

                <div class="col-sm-3  col-md-2 padding-4 ">
                    <label class="label   ">التاريخ </label>
                    <input type="date" name="process_date_ar" data-validation="required"
                           id="process_date_ar" value="<?php echo $process_date_ar ?>"
                           pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:30))|(?:(?:0[13578]|1[02])-31))"
                           class="form-control " data-validation-has-keyup-event="true">
                </div>


                <div class="col-sm-1  col-md-2 padding-4 ">
                    <label class="label   ">اللقب </label>
                    <select name="start_laqb" id="start_laqb"
                            class="selectpicker no-padding form-control  form-control "
                            data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="">اختر</option>
                        <?php if (!empty($titles)) {
                            foreach ($titles as $title) { ?>
                                <option data-title="<?= $title->title_setting ?>" value="<?= $title->id_setting ?>"
                                    <?php
                                    if (!empty($result->start_laqb)) {
                                        if ($result->start_laqb == $title->id_setting) {
                                            echo 'selected';
                                        }
                                    }

                                    ?>
                                > <?= $title->title_setting ?> </option>
                            <?php }
                        } ?>
                    </select>
                </div>


                <div class="col-sm-3  col-md-3 padding-4 ">
                    <label class="label   ">الجهة </label>
                    <input type="text" name="geha_name" id="geha_name" readonly value="<?php echo $geha_name; ?>"
                           class="form-control " style="width: 86%;float: right" onchange="check_Btn()">
                    <button type="button" data-toggle="modal"
                            data-target="#myModalInfo" class="btn btn-success btn-next"
                            style="float: left;">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="col-sm-1  col-md-2 padding-4 ">
                    <label class="label   ">نهاية اللقب </label>
                    <select name="end_laqb" id="end_laqb"
                            class="selectpicker no-padding form-control  form-control "
                            data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="">اختر</option>
                        <?php if (!empty($greetings)) {
                            foreach ($greetings as $greeting) { ?>
                                <option data-title="<?= $greeting->title_setting ?>"
                                        value="<?= $greeting->id_setting ?>"

                                    <?php if (!empty($result->end_laqb)) {
                                        if ($result->end_laqb == $greeting->id_setting) {
                                            echo 'selected';
                                        }
                                    } ?>

                                > <?= $greeting->title_setting ?> </option>
                            <?php }
                        } ?>
                    </select>
                </div>


                <div class="col-sm-3  col-md-3 padding-4 ">
                    <label class="label   ">إسم الموظف</label>
                    <input type="text" class="form-control " name="emp_name"
                           id="emp_name" style="width: 86%;float: right" readonly
                           value="<?php if (!empty($result->emp_name)) {
                               echo $result->emp_name;
                           } ?>" onchange="check_Btn()">
                    <button type="button" data-toggle="modal"
                            data-target="#myModalInfo_family"
                            onclick="get_emps()"
                            class="btn btn-success btn-next"
                            style="/*float: left;*/">
                        <i class="fa fa-plus"></i></button>
                </div>


                <div class="col-sm-2  col-md-2 padding-4 ">
                    <label class="label   ">رقم الهوية</label>
                    <input type="text" name="emp_card_num" readonly id="emp_card_num"
                           value="<?php echo $emp_card_num ?>"
                           class="form-control " data-validation-has-keyup-event="true">
                    <input type="hidden" name="emp_code" id="emp_code" value="<?php if (!empty($result->emp_code)) {
                        echo $result->emp_code;
                    } ?>">
                    <input type="hidden" name="edara_id_fk" id="edara_id_fk"
                           value="<?php if (!empty($result->edara_id_fk)) {
                               echo $result->edara_id_fk;
                           } ?>">
                    <input type="hidden" name="qsm_id_fk" id="qsm_id_fk" value="<?php if (!empty($result->qsm_id_fk)) {
                        echo $result->qsm_id_fk;
                    } ?>">

                </div>


                <?php //echo"<pre>"; print_r($result); echo"</pre>"; die; ?>


                <div class="col-sm-2  col-md-2 padding-4 ">
                    <label class="label   ">المصرف </label>
                    <select name="bank_id" id="bank_id" onchange="check_Btn();Get_one_bank($(this).val());"
                            class="selectpicker no-padding form-control  from_bank_id_fk"
                            data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="0">اختر</option>
                        <?php if (!empty($all_banks)) {
                            foreach ($all_banks as $bank) { ?>
                                <option value="<?php echo $bank->bank_id_fk; ?>"

                                    <?php if (!empty($result->bank_id)) {
                                        if ($result->bank_id == $bank->bank_id_fk) {
                                            echo 'selected';
                                        }
                                    } ?>
                                ><?php echo $bank->title ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>


                <div class="col-sm-2  col-md-3 padding-4 ">
                    <label class="label   ">الغرض من التحويل</label>
                    <input type="text" name="reason" onchange="check_Btn()" value="<?php if (!empty($result->reason)) {
                        echo $result->reason;
                    } ?>"
                           class="form-control  reason" data-validation-has-keyup-event="true">


                </div>

            </div>
            </br> </br></br>

            <!--------------------------------

            <div class="col-md-12 no-padding">
                <div class="col_md_25 col-sm-6 padding-4">

                        <h6 class=" ">رقم العملية</h6>


                        <input type="text" name="process_rkm" readonly id="process_rkm" value="<?php echo $rkm ?>"
                               class="form-control  " data-validation-has-keyup-event="true">

                </div>


                <div class="col_md_25 col-sm-6 padding-4">

                        <h6 class="">التاريخ </h6>


                        <input type="date" name="process_date_ar" data-validation="required"
                               id="process_date_ar" value="<?php echo $process_date_ar ?>"
                               pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:30))|(?:(?:0[13578]|1[02])-31))"
                               class="form-control " data-validation-has-keyup-event="true">

                </div>

                <div class="col_md_25 col-sm-6 padding-4">

                        <h6 class="">إسم الجهة </h6>



                        <input type="text" name="geha_name" data-validation="required"
                               id="geha_name" value="<?php echo $geha_name ?>"
                               class="form-control  " data-validation-has-keyup-event="true">

                </div>

                <div class="col_md_25 col-sm-6 padding-4">

                        <h6 class=" ">الإدارة </h6>


                        <select class="form-control  selectpicker " name="edara_id_fk" id="edara_id_fk"
                                data-validation="required" aria-required="true" data-show-subtext="true"
                                data-live-search="true"  onchange="getEmp()" >
                            <option value="">إختر</option>
                            <?php if (!empty($main_departments)) {
                foreach ($main_departments as $row) { ?>
                                <option value="<?php echo $row->id; ?>"
                                <?php if (!empty($result->edara_id_fk)) {

                    if ($result->edara_id_fk == $row->id) {
                        echo 'selected';
                    }
                } ?>
                                ><?php echo $row->name; ?></option>
                            <?php }
            } ?>
                        </select>

                </div>


            </div>
            <div class="col-md-12 no-padding">
                <div class="col_md_25 col-sm-6 padding-4">

                        <h6 class=" ">إسم الموظف</h6>


                        <select class="form-control   " name="emp_code" id="emp_code"
                                data-validation="required" aria-required="true"
                                onchange="
                                $('#emp_card_num').val($('option:selected',this).attr('data-card'));
                               $('#qsm_id_fk').val($('option:selected',this).attr('data-qsm'));
                               $('#emp_name').val($('option:selected',this).text());"   >
                            <option value="">إختر</option>

                            <?php if (!empty($employes)) {
                foreach ($employes as $row) { ?>
                                <option value="<?php echo $row->emp_code; ?>"
                                <?php if (!empty($result->emp_code)) {
                    if ($result->emp_code == $row->emp_code) {
                        echo 'selected';
                    }

                } ?>
                                ><?php echo $row->employee; ?></option>
                            <?php }
            } ?>
                        </select>

                </div>


                <div class="col_md_25 col-sm-6 padding-4">

                        <h6 class=" ">رقم الهوية</h6>


                        <input type="text" name="emp_card_num" readonly id="emp_card_num" value="<?php echo $emp_card_num ?>"
                               class="form-control " data-validation-has-keyup-event="true">
                        <input type="hidden" name="qsm_id_fk" id="qsm_id_fk" value="<?php if (!empty($result->qsm_id_fk)) {
                echo $result->qsm_id_fk;
            } ?>" >
                        <input type="hidden" name="emp_name" id="emp_name" value="<?php if (!empty($result->emp_name)) {
                echo $result->emp_name;
            } ?>" >

                </div>
            </div>
--------------->

            </br> </br></br>
            <div class="col-md-12 no-padding">
                <?php
                if (empty($result_details)) { ?>
                    <table class="table table-striped table-bordered" style="table-layout: fixed;" id="mytable">
                        <thead>
                        <tr class="info">
                            <th style="width: 30px; text-align:center; background-color: #428bca;"></th>
                            <th style="width: 30px;text-align:center;background-color: #eeba21;">إسم البنك</th>
                            <th style="width: 30px;text-align:center;background-color: #eeba21;">إسم الحساب</th>
                            <th colspan="2" style="width: 80px;text-align:center; background-color: #8bbf02;">الحساب
                                المحول إليه
                            </th>
                            <th style="width: 23px;text-align:center; background-color: #428bca;"></th>
                        </tr>
                        <tr>
                            <th style="width: 30px; text-align:center;">المبلغ</th>
                            <th style="text-align:center; background-color: #eeba21;" colspan="2">إسم الحساب</th>
                            <th style="width: 30px;text-align:center;background-color: #8bbf02;">إسم البنك</th>
                            <th style="width: 30px;text-align:center;background-color: #8bbf02;">إسم الحساب</th>
                            <th style="width: 23px;text-align:center;">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="resultTable">


                        <!---------------------------------------------------------------------------------------------------->
                        <?php
                        $counter = 1;
                        if ($counter <= 1) { ?>

                            <tr id="<?php echo $counter ?>">
                                <td>
                                    <input type="text" onkeypress="return validate_number(event);"
                                          onchange="changeNumber($(this).val(),<?php echo $counter ?>);"
                                           id="value<?php echo $counter ?>"
                                           class="form-control " step="any" name="value[]"
                                           data-validation="required" aria-required="true">
                                </td>

                                <td>
                                    <select class="form-control from_bank_id_fk" name="from_bank_id_fk[]"
                                            id="from_bank_id_fk<?php echo $counter ?>"
                                            onchange="Get_general_hesab_id_fk($(this).val(),'from_general_hesab_id_fk<?php echo $counter ?>')"

                                            data-validation="required" aria-required="true"
                                    >
                                        <option value="">إختر</option>
                                        <?php if (!empty($all_banks)) {
                                            foreach ($all_banks as $bank) { ?>
                                                <option value="<?php echo $bank->bank_id_fk; ?>"

                                                    <?php if (!empty($bank_id_fk)) {
                                                        if ($bank_id_fk == $bank->bank_id_fk) {
                                                            echo 'selected';
                                                        }
                                                    } ?>
                                                ><?php echo $bank->title ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </td>

                                <td>
                                    <select class="form-control from_general_hesab_id_fk"
                                            name="from_general_hesab_id_fk[]" onchange="check_Btn();"
                                            id="from_general_hesab_id_fk<?php echo $counter ?>"
                                            data-validation="required" aria-required="true"
                                    >
                                        <option value="">إختر</option>
                                    </select>
                                </td>

                                <td>
                                    <select class="form-control " name="to_bank_id_fk[]"
                                            id="to_bank_id_fk<?php echo $counter ?>"
                                            onchange="Get_general_hesab_id_fk($(this).val(),'to_general_hesab_id_fk<?php echo $counter ?>')"

                                            data-validation="required" aria-required="true"
                                    >
                                        <option value="">إختر</option>
                                        <?php if (!empty($all_banks)) {
                                            foreach ($all_banks as $bank) { ?>
                                                <option value="<?php echo $bank->bank_id_fk; ?>"

                                                    <?php if (!empty($bank_id_fk)) {
                                                        if ($bank_id_fk == $bank->bank_id_fk) {
                                                            echo 'selected';
                                                        }
                                                    } ?>
                                                ><?php echo $bank->title ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control " name="to_general_hesab_id_fk[]" onchange="check_Btn()"
                                            id="to_general_hesab_id_fk<?php echo $counter ?>"

                                            data-validation="required" aria-required="true"
                                    >
                                        <option value="">إختر</option>
                                    </select>
                                </td>
                                <td id="TD<?php echo $counter + 1 ?>">
                                    <a href="#"
                                       onclick="addNewRow(); $(this).remove(); $('#deleteRow<?php echo $counter ?>').show();"><i
                                                class="fa fa-plus sspan"></i></a>
                                    <a class="" style="display: none;" id="deleteRow<?php echo $counter ?>" href="#"
                                       onclick="$('#<?php echo $counter ?>').remove(); "><i class="fa fa-trash"
                                                                                            aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>


                    </table>
                <?php } ?>

            </div>

            <div class="col-md-12 " id="AttachTableDiv"></div>
            <div class="col-md-12 " id="Details">
                <?php if (!empty($result)) { ?>
                    <div class="container">
                        <div class="print_forma  no-border    col-xs-12 allpad-12">
                            <div class="col-xs-12">
                                <div class="personality">
                                    <div class="col-xs-1"></div>
                                    <div class="col-xs-7 ahwal_style">
                                        <h4 class=""
                                            style="font-weight: bold !important;font-size: 20px !important;">سعادة/مدير
                                            عام الجمعية </h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4 class=""
                                            style="font-weight: bold !important;font-size: 20px !important;">حفظه
                                            الله</h4>
                                    </div>


                                    <div class="col-xs-12 no-padding">

                                        <div class="form-group col-sm-12 col-xs-12">

                                          <textarea class="editor1" id="editor1" name="salam"
                                                    rows="2"><?php echo $result->salam; ?></textarea>

                                        </div>
                                        <div class="col-md-12 no-padding">
                                            <?php $counter = 1;
                                            if (!empty($result_details)) { ?>
                                                <table class="table table-striped table-bordered"
                                                       style="table-layout: fixed;" id="mytable">
                                                    <thead>
                                                    <tr class="info">
                                                        <th style="width: 30px; text-align:center; background-color: #428bca;"></th>
                                                        <th colspan="2"
                                                            style="width: 72px;text-align:center; background-color: #eeba21;">
                                                            الحساب المحول منه
                                                        </th>
                                                        <th colspan="2"
                                                            style="width: 80px;text-align:center; background-color: #8bbf02;">
                                                            الحساب المحول إليه
                                                        </th>
                                                        <th style="width: 23px;text-align:center; background-color: #428bca;"></th>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 30px; text-align:center;">المبلغ</th>
                                                        <th style="width: 30px;text-align:center; background-color: #eeba21;">
                                                            إسم البنك
                                                        </th>
                                                        <th style="width: 30px;text-align:center;background-color: #eeba21;">
                                                            إسم الحساب
                                                        </th>
                                                        <th style="width: 30px;text-align:center;background-color: #8bbf02;">
                                                            إسم البنك
                                                        </th>
                                                        <th style="width: 30px;text-align:center;background-color: #8bbf02;">
                                                            إسم الحساب
                                                        </th>
                                                        <th style="width: 23px;text-align:center;">الإجراء</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="resultTable">

                                                    <?php
                                                    $counter = 1;
                                                    foreach ($result_details as $row_detail) {
                                                        ?>

                                                        <tr id="<?= $row_detail->id ?>">
                                                            <td>
                                                                <input type="text"
                                                                       onkeypress="return validate_number(event);"
                                                                       id="value<?php echo $row_detail->id ?>"
                                                                       class="form-control " step="any" name="value[]"
                                                                       value="<?php echo $row_detail->value; ?>"
                                                                       data-validation="required" aria-required="true">
                                                            </td>
                                                            <td>
                                                                <select class="form-control " name="from_bank_id_fk[]"
                                                                        id="from_bank_id_fk<?php echo $row_detail->id ?>"
                                                                        onchange="Get_general_hesab_id_fk($(this).val(),'from_general_hesab_id_fk<?php echo $row_detail->id ?>')"

                                                                        data-validation="required" aria-required="true">
                                                                    <option value="">إختر</option>
                                                                    <?php if (!empty($all_banks)) {
                                                                        foreach ($all_banks as $bank) { ?>
                                                                            <option value="<?php echo $bank->bank_id_fk; ?>"

                                                                                <?php if (!empty($row_detail->from_bank_id_fk)) {
                                                                                    if ($row_detail->from_bank_id_fk == $bank->bank_id_fk) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                } ?>
                                                                            ><?php echo $bank->title ?></option>
                                                                        <?php }
                                                                    } ?>
                                                                </select>
                                                            </td>

                                                            <td>
                                                                <select class="form-control "
                                                                        name="from_general_hesab_id_fk[]"
                                                                        id="from_general_hesab_id_fk<?php echo $row_detail->id ?>"
                                                                        data-validation="required" aria-required="true">
                                                                    <option value="">إختر</option>
                                                                    <?php if (!empty($row_detail->from_general_hesab_arr)) {
                                                                        foreach ($row_detail->from_general_hesab_arr as $record) { ?>
                                                                            <option value="<?php echo $record->account_id_fk; ?>"
                                                                                <?php if ($row_detail->from_general_hesab_id_fk == $record->account_id_fk) {
                                                                                    echo 'selected';
                                                                                } ?>
                                                                            ><?php echo $record->AccountName; ?></option>
                                                                        <?php }
                                                                    } ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control " name="to_bank_id_fk[]"
                                                                        id="to_bank_id_fk<?php echo $row_detail->id ?>"
                                                                        onchange="Get_general_hesab_id_fk($(this).val(),'to_general_hesab_id_fk<?php echo $row_detail->id ?>')"

                                                                        data-validation="required" aria-required="true"
                                                                >
                                                                    <option value="">إختر</option>
                                                                    <?php if (!empty($all_banks)) {
                                                                        foreach ($all_banks as $bank) { ?>
                                                                            <option value="<?php echo $bank->bank_id_fk; ?>"

                                                                                <?php if (!empty($row_detail->to_bank_id_fk)) {
                                                                                    if ($row_detail->to_bank_id_fk == $bank->bank_id_fk) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                } ?>
                                                                            ><?php echo $bank->title ?></option>
                                                                        <?php }
                                                                    } ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select class="form-control "
                                                                        name="to_general_hesab_id_fk[]"
                                                                        id="to_general_hesab_id_fk<?php echo $row_detail->id ?>"
                                                                        data-validation="required" aria-required="true">
                                                                    <option value="">إختر</option>
                                                                    <?php if (!empty($row_detail->to_general_hesab_arr)) {
                                                                        foreach ($row_detail->to_general_hesab_arr as $record) { ?>
                                                                            <option value="<?php echo $record->account_id_fk; ?>"
                                                                                <?php if ($row_detail->to_general_hesab_id_fk == $record->account_id_fk) {
                                                                                    echo 'selected';
                                                                                } ?>
                                                                            ><?php echo $record->AccountName; ?></option>
                                                                        <?php }
                                                                    } ?>
                                                                </select>
                                                            </td>
                                                            <td id="TD<?= $row_detail->id ?>">
                                                                <a href="#" <?php if ($counter < sizeof($result_details)) { ?> style="display: none;" <?php } ?>
                                                                   onclick="addNewRow(); $(this).remove(); $('#deleteRow<?= $row_detail->id ?>').show();"><i
                                                                            class="fa fa-plus sspan"></i></a>
                                                                <a class="pull-right"
                                                                   id="deleteRow<?= $row_detail->id ?>" href="#"
                                                                   onclick="$('#<?= $row_detail->id ?>').remove();"><i
                                                                            class="fa fa-trash" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        </tr>


                                                        <!-------------------------stop------------------------------->
                                                        <?php
                                                        $counter++;
                                                    } ?>


                                                    </tbody>


                                                </table>

                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-sm-12 col-xs-12">

                                          <textarea class="editor2" id="editor2"
                                                    name="debaga"><?php echo $result->debaga; ?></textarea>


                                        </div>


                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <div class="col-xs-12 text-center">
                <!--<input type="hidden" name="modalID" id="modalID">-->

                <button type="button" style="display:none" data-toggle="modal" data-target="#ModalView"
                        onclick="GetModalView()"
                        class="btn btn-labeled btn-primary Btn_view" name="action" value="action">
                    <span class="btn-label"><i class="fa fa-eye"></i></span>عرض
                </button>


                <button type="button" style="<?php echo $button1; ?>" onclick="save_me()"
                        class="btn btn-labeled btn-success myBtnInsert" name="action" value="action">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

                <button type="submit" style="<?php echo $button2; ?>" class="btn btn-labeled btn-warning myBtn"
                        style="color: ##FFB61E; !important;"
                        name="action" value="action">
                    <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>تعديل
                </button>


                <button type="button" class="btn btn-labeled btn-danger">
                    <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                </button>

                <button type="button" class="btn btn-labeled btn-purple">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>

                    <button type="button" class="btn btn-labeled btn-inverse " id="attach_button" data-toggle="modal"
                            data-target="#myModal_attach">
                        <span class="btn-label"><i class="glyphicon glyphicon-cloud-upload"></i></span>
                        اضافة مرفق
                    </button>
                <?php ?>


                <button type="button" class="btn btn-labeled btn-info" data-toggle="modal" data-target="#searchModal">
                    <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>البحث
                </button>
            </div>
            <?php echo form_close() ?>

        </div>


    </div>


</div>


<div class="col-sm-12 col-md-12 col-xs-12  " style="padding: 0;">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>شاشة النماذج والإجراءات</h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12">


                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab"> العمليات قيد التنفيذ</a></li>
                    <li><a href="#tab2" data-toggle="tab"> العمليات تم تنفيذها</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">
                        <div class="panel-body">
                            <?php

                            if (!empty($NotTransfered)) {
                                ?>
                                <table id="" class="table table-bordered example" role="table">
                                    <thead>
                                    <tr class="info">
                                        <th width="2%">م</th>
                                        <th class="text-left">رقم العملية</th>
                                        <th class="text-left">تاريخ العملية</th>
                                        <th class="text-left">إسم الجهة</th>
                                        <th class="text-left">إسم المصرف</th>
                                        <th class="text-left">إسم الموظف</th>
                                        <th class="text-left">رقم الهوية</th>
                                        <th class="text-left">الإجراءات</th>
                                        <th class="text-left">إجراءات التحويل</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    if (isset($NotTransfered) && $NotTransfered != null) {
                                        $x = 1;
                                        foreach ($NotTransfered as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $x++ ?></td>
                                                <td><?php echo $value->process_rkm ?></td>
                                                <td><?php echo $value->process_date_ar ?></td>
                                                <td><?php echo $value->geha_name ?></td>
                                                <td><?php echo $value->bank_name ?></td>
                                                <td><?php echo $value->emp_name ?></td>
                                                <td><?php echo $value->emp_card_num ?></td>

                                                <td>
                                                    <?php if ($value->level == 0 && $value->suspend == 0) { ?>
                                                        <a class="btn btn-info btn-xs"
                                                           onclick="getDetails(<?php echo $value->process_rkm ?>)"
                                                           data-toggle="modal" data-target="#detailsModal"
                                                           title="التفاصيل">
                                                            <i class="glyphicon glyphicon-list"></i>
                                                        </a>
                                                        <a href="<?php echo base_url() . "finance_accounting/box/forms/transformation_accounts/Transformation_accounts/update_transformation_accounts/" . $value->process_rkm ?>"
                                                           title="تعديل"><i class="fa fa-pencil"></i></a>

                                                        <a onclick="Delete_me(<?php echo $value->process_rkm; ?>)"
                                                           title="حذف"><i
                                                                    class="fa fa-trash"></i></a>

                                                        <a onclick="print_page(<?php echo $value->process_rkm; ?>)"
                                                           title="طباعه">
                                                            <i class="fa fa-print"></i></a>



                                                    <?php } else { ?>
                                                        <?php if($value->suspend ==4){ ?>
                                                            <a     onclick="print_bank(<?php echo $value->process_rkm;?>)"        title="طباعه البنك">
                                                                <i style="background-color: #0a568c" class="fa fa-print" aria-hidden="true"></i></a>

                                                        <?php }else{ ?>
                                                        <span class="label label-danger"> عذرا لا يمكنك التعديل والحذف</span>
                                                    <?php } ?>
                                                    <?php } ?>

                                                </td>
                                                <td>
                                                    <?php if ($value->level == 0 && $value->suspend == 0) { ?>
                                                        <a type="button" class="btn btn-success btn-xs" title="التحويل"
                                                           style="padding: 1px 6px;"
                                                           onclick="$('#transformLabel').html('<?php echo $value->talab_in_title; ?>');
                                                                   transformRequest(<?php echo $value->level; ?>,
                                                           <?php echo $value->process_rkm; ?>,<?php echo $value->emp_code ?>,'')"
                                                           data-toggle="modal" data-target="#transform"><i
                                                                    class="fa fa-list"></i>
                                                        </a>
                                                    <?php } else { ?>
                                                        <span class="label label-warning">
                                                                                               عذرا لا يمكن التحويل
                                                                                   </span><?php } ?>
                                                    <!--<button type="submit" class=" btn w-md m-b-5" style="background-color:#6fcbef; color: black;">
                                               <span><i class="fa fa-hand-o-right" aria-hidden="true"></i></span> تحويل العملية
                                           </button>


                                                   <button class="btn btn-success"
                                                           onclick='transfer(<?php echo $value->process_rkm; ?>)'>
                                                       تنفيذ العملية
                                                   </button>-->
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>


                            <?php } else { ?>
                                <div style="color: red; font-size: large;" class="col-sm-12">لا توجد عمليات قيد التنفيذ
                                    !!
                                </div>

                            <?php } ?>


                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        <div class="panel-body">


                            <?php if (!empty($Transfered)) { ?>
                                <table id="" class="table table-bordered example" role="table">
                                    <thead>
                                    <tr class="info">
                                        <th width="2%">م</th>
                                        <th class="text-left">رقم العملية</th>
                                        <th class="text-left">تاريخ العملية</th>
                                        <th class="text-left">إسم الجهة</th>
                                        <th class="text-left">إسم المصرف</th>
                                        <th class="text-left">إسم الموظف</th>
                                        <th class="text-left">رقم الهوية</th>
                                        <th class="text-left">الإجراءات</th>
                                        <th class="text-left">إجراءات التحويل</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    if (isset($Transfered) && $Transfered != null) {
                                        $x = 1;
                                        foreach ($Transfered as $value) {
                                            ?>
                                            <tr>
                                                <td><?php echo $x++ ?></td>
                                                <td><?php echo $value->process_rkm ?></td>
                                                <td><?php echo $value->process_date_ar ?></td>
                                                <td><?php echo $value->geha_name ?></td>
                                                <td><?php echo $value->bank_name ?></td>
                                                <td><?php echo $value->emp_name ?></td>
                                                <td><?php echo $value->emp_card_num ?></td>
                                                <td>
                                                    <a class="btn btn-info btn-xs"
                                                       onclick="getDetails(<?php echo $value->process_rkm ?>)"
                                                       data-toggle="modal" data-target="#detailsModal" title="التفاصيل">
                                                        <i class="glyphicon glyphicon-list"></i>
                                                    </a>
                                                    <a href="<?php echo base_url() . "finance_accounting/box/forms/transformation_accounts/Transformation_accounts/update_transformation_accounts/" . $value->process_rkm ?>"
                                                       title="تعديل"><i class="fa fa-pencil"></i></a>

                                                    <a onclick="Delete_me(<?php echo $value->process_rkm; ?>)"
                                                       title="حذف"><i class="fa fa-trash"></i></a>

                                                    <a href="#" target="_blank" title="طباعه"> <i
                                                                class="fa fa-print"></i></a>
                                                </td>
                                                <td></td>

                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>


                            <?php } else { ?>
                                <div style="color: red; font-size: large;" class="col-sm-12">لا توجد عمليات تم تنفيذها
                                    !!
                                </div>

                            <?php } ?>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!------ modals --------------------------------------------->


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تفاصيل طلب التحويل </h4>
            </div>
            <div class="modal-body " id="optionearea1">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
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
                <button type="button" onclick="add_row()" class="btn btn-success btn-next"/>
                <i class="fa fa-plus"></i> إضافة </button><br><br>
                <div class="AttachTable">


                    <?php
                    echo form_open_multipart('finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_morfaq/'.$rkm);
                    ?>
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <input type="hidden" name="hidden_rkm" id="hidden_rkm">
                    <table class="table table-striped table-bordered fixed-table mytable "
                    <thead>
                    <tr class="info">

                        <th class="text-center"> إسم المرفق</th>
                        <th class="text-center">المرفق</th>
                        <th class="text-center"> الإجراء</th>
                    </tr>
                    </thead>
                    <tbody class="attachTable tbody">
                    <?php if (!empty($attaches)) {
                        ;
                        $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                        $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                        ?>
                        <?php $x = 1;
                        foreach ($attaches as $row_img) {
                            $ext = pathinfo($row_img->file, PATHINFO_EXTENSION) ?>
                            <tr class="<?= $x ?>">

                                <td><?= $row_img->title ?> </td>
                                <td>
                                    <?php
                                    if (in_array($ext, $image)) {
                                        ?>

                                        <img id="img_view<?= $x ?>"
                                             src="<?php echo base_url() . 'uploads/family_attached/nmazg/nmazg_letter_attaches/' . $row_img->file ?>"
                                             width="150px" height="150px"/>

                                        <?php
                                    } else if (in_array($ext, $file)) {
                                        ?>
                                        <a target="_blank"
                                           href="<?= base_url() . "family_controllers/namazegs/Namazeg/read_file/" . $row_img->file ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>

                                    <a href="<?php echo base_url() . 'finance_accounting/box/forms/transformation_accounts/Transformation_accounts/Delete_attach/' . $row_img->id ?>">
                                        <i class="fa fa-trash"></i> </a></td>
                            </tr>
                            <?php $x++;
                        }
                    } ?>

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

                <?php
                echo form_close();
                ?>

            </div>
        </div>
    </div>
</div

        <!-------------------------------modals--------------------------->

<div class="modal modal-success fade" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل طلب التحويل</h4>
            </div>
            <?php
            echo form_open_multipart("finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts_modal");
            ?>
            <div class="modal-body" id="ModalViewDiv">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                <button type="submit" class="btn btn-labeled btn-success myBtnInsert" name="add" value="add">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>


<div class="modal fade" id="myModalInfo_family" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الموظفين</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12" id="emps_table_json">
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الجهة</h4>
            </div>
            <div class="modal-body">
                <div id="myDiv_geha">
                    <?php if (!empty($geha_table)) { ?>
                        <table id="example" class="  table table-bordered table-striped " role="table">
                            <thead>
                            <tr class="greentd">
                                <th width="2%">#</th>
                                <th class="text-center">الجهة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x = 1;
                            foreach ($geha_table as $value) {
                                ?>
                                <tr>
                                    <td><input type="radio" name="radio" data-title="<?= $value->title ?>"
                                               id="radio" ondblclick="getTitle($(this).attr('data-title'))"></td>
                                    <td><?= $value->title ?></td>

                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>


                    <?php } else { ?>

                        <div class="alert alert-danger">لاتوجد بيانات !!</div>
                    <?php } ?>

                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<!------------------------------27-7-2019---------------------------->
<div class="modal fade" id="myModal_hesab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الحساب</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12" id="hesab_div">

                </div>

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!------------------------------27-7-2019---------------------------->

<script>

    function GetModalView() {

        var dataString = $('#myform').serialize() +
            '&bank_name=' + $('option:selected', $('#bank_id')).text();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/GetModalView',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#ModalViewDiv").html(html);
            }
        });

    }

</script>


<script>
    function get_emps() {


        var html;
        html = '<div class="col-md-12 no-padding"><table id="js_table_memberss" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> الإدارة </th><th style="width: 50px;"> القسم </th><th style="width: 50px;" >كود الموظف</th><th style="width: 170px;" >إسم  الموظف</th>' +
            '</tr></thead><table></div>';

        $("#emps_table_json").html(html);
        var oTable_usergroup = $('#js_table_memberss').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_emps_json_data',


            aoColumns: [
                {"bSortable": true},
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
            colReorder: true
        });


    }
</script>
<script>
    function get_hesab(value) {
        /*if(parseInt(value) >0){
          var link_data ='<?php echo base_url(); ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_hesab_json_data/' + value;
 }else if(parseInt(value) === 0){
     var link_data ='<?php echo base_url(); ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_hesab_json_data/0';

 }*/
        $("#hesab_body").html('');
        var dataString = 'id=' + value;
        //alert(hesab_id);

        $('#hesab_div').html('<table id="json_hesab_table" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">' +
            ' <thead> <tr class="greentd"> <th>#</th> <th >البنك</th> <th > الحساب</th><th>رقم الحساب</th>' +
            ' </tr></thead><tbody id="hesab_body"></tbody>  </table>');

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_hesab_json_data',
            data: dataString,
            cache: false,
            success: function (json_data) {
                var JSONObject = JSON.parse(json_data);
                // console.log(JSONObject.length);
                for (var i = 0; i < JSONObject.length; i++) {

                    $("#hesab_body").append('<tr><td><input type="radio" name="choosed" id="member' + JSONObject[i].id + '" data-name="' + JSONObject[i].account_name + '" data-num="' + JSONObject[i].account_num + '" ondblclick="getHesabData(' + JSONObject[i].id + ')"/></td><td>' + JSONObject[i].bank_name + '</td><td>' + JSONObject[i].account_name + '</td><td>' + JSONObject[i].account_num + '</td></tr>');

                }

                /*var str;
                for (var i = 0; i < JSONObject.length; i++) {
                    str .= '<tr><td>'+JSONObject[i].account_name+'</td><td></td><td></td></tr>';
                }

                $('#hesab_body').html(str);*/
                /*

               document.getElementById("value").setAttribute("readonly","readonly");
               $('#value').val(JSONObject);*/


            }
        });


    }


</script>
<script>
    var oTable_usergroup = $('#json_hesab_table').DataTable({
        dom: 'Bfrtip',
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
        colReorder: true

    });
</script>
<script>

    function getHesabData(valu) {
        var name = $("#member" + valu).data('name');
        var num = $("#member" + valu).data('num');

        aler(valu);
        $("#myModal_hesab .close").click();

    }


</script>
<script>


    function GetMemberName(valu) {
        var id = valu;
        var name = $("#member" + valu).data('name');
        var emp_code = $("#member" + valu).data('emp_code');
        var edara_id_fk = $("#member" + valu).data('edara_id_fk');
        var qsm_id_fk = $("#member" + valu).data('qsm_id_fk');
        var card_num = $("#member" + valu).data('card_num');
        $('#emp_name').val(name);
        $('#emp_card_num').val(card_num);
        $('#emp_code').val(emp_code);
        $('#edara_id_fk').val(edara_id_fk);
        $('#qsm_id_fk').val(qsm_id_fk);
        $("#myModalInfo_family .close").click();
    }

</script>


<script>
    function add_geha(value) {
        $('#div_update').hide();
        $('#div_add').show();
        //  alert(value);

        var mob = $('#mob').val();
        var address = $('#address').val();
        if (value != 0 && value != '' && mob != ' ' && address != ' ') {
            var dataString = 'name=' + value + '&mob=' + mob + '&address=' + address;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/insert_geha_ajax',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#geha_title').val(' ');
                    $('#address').val(' ');
                    $('#mob').val(' ');
                    $("#myDiv_geha").html(html);
                }
            });
        }

    }


</script>


<script>
    function getTitle(value) {
        if (value != '') {
            $('#geha_name').val(value);
            $('#geha_name').removeAttr('readonly');
            $('#myModalInfo').modal('hide');
        }
    }
</script>

<script>
    function delte_geha(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/delete_geha',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $("#myDiv_geha").html(html);

                }
            });
        }

    }
</script>
<script>

    function update_geha(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add').hide();
        $('#div_update').show();


        $.ajax({
            url: "<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/getById",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                $('#geha_title').val(obj.name);
                $('#mob').val(obj.mob);
                $('#address').val(obj.address);
                $('#s_id').val(obj.id);


            }

        });

        $('#update').on('click', function () {
            var geha_title = $('#geha_title').val();
            var address = $('#address').val();
            var mob = $('#mob').val();
            var s_id = $('#s_id').val();

            $.ajax({
                url: "<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/update_geha",
                type: "Post",
                dataType: "html",
                data: {geha_title: geha_title, address: address, mob: mob, id: s_id},
                success: function (html) {
                    //  alert('hh');
                    $('#geha_title').val(' ');
                    $('#address').val(' ');
                    $('#mob').val(' ');
                    $("#myDiv_geha").html(html);

                    $('#geha_input').hide();

                }

            });

        });

    }

</script>


<!--------------------------------modals-------------------------->
<script>


    function addNewRow() {

        var bankId = $('#bank_id').val();

        var id = parseFloat($("#resultTable tr:last").attr('id')) + 1;
        var dataString = 'id=' + id;

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/load_banks',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#resultTable").append(html);
                Get_one_bank(bankId);
            }
        });


    }


    function addPlusButtonQuod(id) {
        if (parseFloat($("#resultTable tr:last").attr('id')) == id) {
            $('#' + id).remove();
            var last = $("#resultTable tr:last").attr('id');
            $('#TD' + $("#resultTable tr:last").attr('id')).append(`<a href="#" onclick="addNewRow(); $(this).remove(); $('#deleteRow` + last + `').show();"><i class="fa fa-plus sspan"></i></a>`);
        } else {
            $('#' + id).remove();
        }
    }


</script>


<script>
    function getDetails(valu) {
        if (valu != 0 && valu != '') {
            var dataString = 'id=' + valu;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/getDetails',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#optionearea1").html(html);
                }
            });

        }

    }

</script>


<!---24-2-2019------------------------------------------------------------------------------------------------->


<script>


    function getEmp() {
        var edara_id_fk = $('#edara_id_fk').val();

        if (edara_id_fk != 0 && edara_id_fk != '') {
            var dataString = 'edara_id_fk=' + edara_id_fk;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/getEmp',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    //console.log(JSONObject);

                    var html = '<option value="">إختر </option>';

                    for (i = 0; i < JSONObject.length; i++) {

                        html += '<option  data-card="' + JSONObject[i].card_num + '"  data-qsm="' + JSONObject[i].department + '" value="' + JSONObject[i].emp_code + '"> ' + JSONObject[i].employee + '</option>';

                    }
                    $("#emp_code").html(html);

                }
            });
            return false;


        }


    }

</script>




<script>


    function Get_general_hesab_id_fk(value, myid) {

        var myid = myid;

        var dataString = 'id=' + value;


        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/GetByArray',
            data: dataString,
            cache: false,
            success: function (json_data) {
                var JSONObject = JSON.parse(json_data);
                // console.log(JSONObject);
                var html = '<option>إختر </option>';

                for (i = 0; i < JSONObject.length; i++) {
                    html += '<option value="' + JSONObject[i].account_id_fk + '"> ' + JSONObject[i].AccountName + '</option>';
                }
                $("#" + myid).html(html);

            }
        });


    }

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<script>


    function check_Btn() {

        var method_type = $('#method_type').val();
        //alert(method_type);
        var geha_name = $('#geha_name').val();
        var emp_name = $('#emp_name').val();
        var emp_card_num = $('#emp_card_num').val();
        var from_general_hesab_id_fk1 = $('#from_general_hesab_id_fk1').val();
        var to_general_hesab_id_fk1 = $('#to_general_hesab_id_fk1').val();
        var reason = $('.reason').val();
        //alert(reason);

        if (method_type != '' && geha_name != '' && emp_name != '' && emp_card_num != ''
            && from_general_hesab_id_fk1 != '' && to_general_hesab_id_fk1 != '' && reason != '') {


            $('.Btn_view').show();


        } else {
            $('.Btn_view').hide();
        }
    }


</script>
<script>


    function save_me() {
        var process_rkm = $('#process_rkm').val();
        var method_type = $('#method_type').val();
        var geha_name = $('#geha_name').val();
        var emp_name = $('#emp_name').val();
        var emp_card_num = $('#emp_card_num').val();
        var from_general_hesab_id_fk1 = $('#from_general_hesab_id_fk1').val();
        var to_general_hesab_id_fk1 = $('#to_general_hesab_id_fk1').val();
        var reason = $('.reason').val();
//alert(reason);

        if (method_type != '' && geha_name != '' && emp_name != '' && emp_card_num != ''
            && from_general_hesab_id_fk1 != '' && to_general_hesab_id_fk1 != '' && reason != '') {
            var dataString = $('#myform').serialize();
            //console.log(vv); return;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/insert_ajax',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    //  console.log(process_rkm);


                }
            });
            Swal.fire({
                title: "هل تريد  طباعة النموذج",
                text: "",
                type: 'warning',

                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: "لا, إلغاء الأمر!",
                confirmButtonText: "نعم, قم بالطباعة",
            }).then((result) => {
                if (result.value) {
                    // $('#myform').submit();
                    //alert(process_rkm);
                    print_page(process_rkm);
                    window.location.href = "<?php echo base_url();?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts";

                } else {
                    window.location.href = "<?php echo base_url();?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_transformation_accounts";

                }
            });

        } else {
            alert('من فضلك أكمل إدخال البيانات!!');
        }
    }


</script>

<script>


    function Delete_me(valu) {

        Swal.fire({
            title: "هل تريد  حذف النموذج!",
            text: "",
            type: 'warning',

            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالحذف !",
        }).then((result) => {
            if (result.value) {

                window.location.href = "<?php echo base_url();?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/Delete/" + valu;

            }
        });
    }
</script>
<script>
    function print_page(process_rkm) {


        //window.location.href ="<?php echo base_url();?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/print_account_details/" + process_rkm;
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?php echo base_url();?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/print_account_details/",
            type: "POST",
            data: {process_rkm: process_rkm},
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
    function print_bank(process_rkm) {




        //window.location.href ="<?php echo base_url();?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/print_account_details/" + process_rkm;
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?php echo base_url();?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/print_bank/",
            type: "POST",
            data: {process_rkm: process_rkm},
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
    function add_row() {
        $(".mytable").show();
        //var x = document.getElementById('resultTable');
        var len = $(".attachTable").length + 1;
        // alert(len);

        $(".attachTable").append('<tr class="' + len + '">'

            + '</td><td><input type="input" name="title[]" id="title"  class="form-control" data-validation="reuqired"></td><td><input type="file" name="file[]" id="file"  class="form-control " data-validation="reuqired"></td><td><a href="#"  onclick="DeleteRowImg(' + len + ')"> <i class="fa fa-trash" ></i> </a></td></tr>');
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

<script>
    function put_value(id, rkm) {
        $('#hidden_id').val(id);
        $('#hidden_rkm').val(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/namazegs/Namazeg/get_attaches",
            data: {rkm: rkm},


            success: function (d) {
                $('.tbody').html(d);
                // alert(d);

            }

        });
    }
</script>

<script>

    function GetAttachTable() {
        $('#AttachTableDiv').html('');
        $(".AttachTable").clone().appendTo('#AttachTableDiv');
        $("#myModal_attach .close").click();
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<script>
    function transfer(value) {
        Swal.fire({
            title: "هل انت متأكد الترحيل ؟",
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ليس الان',
            confirmButtonText: "نعم, قم بالترحيل",
        }).then((result) => {
            if (result.value) {
                window.location.href = "<?php echo base_url();?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/transformation_accounts_transfer/" + value + "";
            }
        });

    }

</script>


<!-----------------------new js--------------------->
<div class="modal  modal-success  fade" id="transform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="transformLabel"></h4>
            </div>
            <div id="transformRequest"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function transformRequest(level, process_rkm, fromUser, toUser) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/Get_load_page',
            data: {level: level, process_rkm: process_rkm, fromUser: fromUser, toUser: toUser},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#transformRequest").html(html);
            }
        });

    }

</script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/ckeditor.js"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>

<script>
    initSample();

    CKEDITOR.replaceClass = 'ckeditor';


</script>

<script type="text/javascript">
    CKEDITOR.replace('editor1');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Styles', 'Format', 'Font', 'FontSize'],
        '/',

        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];

</script>

<script type="text/javascript">
    CKEDITOR.replace('editor2');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Styles', 'Format', 'Font', 'FontSize'],
        '/',

        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];

</script>
<script>


    function Get_one_bank(value) {

        var myid = myid;

        $('.from_bank_id_fk').val(value);

        var dataString = 'id=' + value;

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/GetByArray',
            data: dataString,
            cache: false,
            success: function (json_data) {
                var JSONObject = JSON.parse(json_data);
                // console.log(JSONObject);
                var html = '<option>إختر </option>';

                for (i = 0; i < JSONObject.length; i++) {
                    html += '<option value="' + JSONObject[i].account_id_fk + '"> ' + JSONObject[i].AccountName + '</option>';
                }
                $(".from_general_hesab_id_fk").html(html);

            }
        });


    }

</script>
<script>


    function formatMoney(n, c, d, t) {
        var c = isNaN(c = Math.abs(c)) ? 2 : c,
            d = d == undefined ? "." : d,
            t = t == undefined ? "," : t,
            s = n < 0 ? "-" : "",
            i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
            j = (j = i.length) > 3 ? j % 3 : 0;

        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    }


</script>

<script>
    function changeNumber(value,Num) {
    // alert(formatMoney(value));
       $('#value'+Num).val(formatMoney(value));
    }
</script>
<!-----------------------new js--------------------->


