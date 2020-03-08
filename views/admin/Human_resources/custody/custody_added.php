<style type="text/css">


    .top-label {

        font-size: 13px;
    }

    .table-bordered.tb_table tbody td {
        padding: 0
    }

</style>
<?php
$house_device_status = array(1 => 'جيد', 2 => 'متوسط', 3 => 'غير جيد', 4 => 'يحتاج');
$disabled = '';
if (isset($allData) && $allData != null) {
    echo form_open_multipart('human_resources/Human_resources/update_custody/' . $this->uri->segment(4));
} else {
    echo form_open_multipart('human_resources/Human_resources/custody/' . $this->uri->segment(4));
}
?>
<div class="col-sm-12 col-md-12 col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
            <div class="pull-left">
                <?php $data_load["emp_code"] = $personal_data[0]->emp_code;
                $data_load["id"] = $this->uri->segment(4);
                $this->load->view('admin/Human_resources/drop_down_menu', $data_load); ?>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-2 col-xs-12">
                <label class="label ">كود الموظف</label>
                <input type="text" class="form-control " name="emp_code" value="<?= $employee['emp_code'] ?>" readonly/>
            </div>
            <div class="form-group col-sm-3 col-xs-12">
                <label class="label ">إسم الموظف</label>
                <input type="text" class="form-control" name="emp_name" value="<?= $employee['employee'] ?>" readonly/>
            </div>

            <div class="col-xs-12  no-padding">
                <?php if (isset($allData)) { ?>
                    <table class="display table table-bordered responsive nowrap tb_table" cellspacing="0" width="100%">

                        <thead>
                        <tr class="greentd">
                            <th class="text-center" colspan="6">العهد التي بحوزته</th>
                        </tr>
                        <tr class="info">
                            <th>تصنيف الأصل</th>
                            <th>إسم الأصل</th>
                            <th>العدد</th>
                            <th>الحالة</th>
                            <th>تاريخ الإستلام</th>
                            <?php if (isset($allData)) { ?>
                                <th>حذف</th>
                            <?php } ?>
                        </tr>
                        </thead>
                        <tbody id="result"></tbody>
                        <tbody>
                        <?php
                        if (isset($allData) && $allData != null) {

                            foreach ($allData as $key => $value) {

                                $class = 'class';
                                $disabled = 'disabled';
                                ?>
                                <tr>
                                    <td>

                                        <select name="status[<?= $key ?>]"
                                                class="form-control bottom-input <?= $class ?>" <?= $disabled ?>>
                                            <option value="">إختر</option>

                                            <?php foreach ($custody as $record => $row) {

                                                $last = $max_value - 1;
                                                if ($custody[$record]->level > $last || $custody[$record]->level < $last) {

                                                    continue;

                                                }
                                                $select = '';

                                                if ($custody[$record]->id == $value->custody_id_fk) {
                                                    $select = 'selected="selected"';
                                                }
                                                ?>


                                                <option value="<?php echo $custody[$record]->id; ?>" <?= $select ?>>
                                                    <?php echo $custody[$record]->title ?></option>
                                            <?php } ?>


                                        </select>

                                    </td>
                                    <td>

                                        <input type="text" class="form-control bottom-input"
                                               value="<?php if (!empty($names[$value->custody_title])) {
                                                   echo $names[$value->custody_title];
                                               } ?>" <?= $disabled ?>/>

                                    </td>
                                    <td>

                                        <input type="text" class="form-control bottom-input"
                                               value="<?= $value->num ?>" <?= $disabled ?>/>

                                    </td>
                                    <td>

                                        <select name="status[<?= $key ?>]"
                                                class="form-control bottom-input <?= $class ?>" <?= $disabled ?>>
                                            <option value="">إختر</option>
                                            <?php
                                            foreach ($house_device_status as $k => $v) {
                                                $selects = '';
                                                if ($k == $value->status) {
                                                    $selects = 'selected="selected"';
                                                }
                                                ?>
                                                <option value="<?= $k ?>" <?= $selects ?>><?= $v ?></option>
                                            <?php } ?>
                                        </select>

                                    </td>
                                    <td>

                                        <input type="date" class="form-control bottom-input  <?= $class ?>"
                                               name="date_recived[<?= $key ?>]" <?php if (isset($allData) && $value->date_recived > 0) echo 'data-validation="required" value="' . $value->date_recived . '"'; else echo 'disabled' ?> <?= $disabled ?> />

                                    </td>
                                    <td>
                                        <a onclick="$('#adele').attr('href', '<?= base_url() . "human_resources/Human_resources/delete_custody/" . $value->id . '/' . $this->uri->segment(4) ?>');"
                                           data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i
                                                    class="fa fa-trash"></i></a>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <th colspan="6">
                            <button type="button" class="btn btn-success btn-labeled" value="1"
                                    onclick="getBanks($(this).val(),<?php if (isset($allData) && $allData != null) echo count($allData); else echo 0; ?>);">
                                <span class="btn-label"><i class="fa fa-plus"></i></span> إضافة عهد جديد
                            </button>
                            <button type="button" value=" " class="btn-danger btn btn-labeled" style="    float: left;">
                                <span class="btn-label"><i class="fa fa-trash"></i> </span> حذف
                            </button>
                        </th>
                        </tfoot>
                    </table>
                <?php } ?>
                <div class="col-xs-12 text-center">
                    <input type="hidden" name="count"
                           value="<?php if (isset($allData) && $allData != null) echo count($allData); else echo 0; ?>">
                    <button type="submit" id="buttons" name="add" class="btn btn-success btn-labeled" value="حفظ" disabled="disabled"><span
                                class="btn-label"><i class="fa fa-plus"></i></span>حفظ
                    </button>
                </div>
            </div>


            <div class="col-xs-12 no-padding" style="margin-top: 10px;">
                <?php if (!empty($all_Data_tansfer)) { ?>
                    <table class="display table table-bordered responsive nowrap tb_table" cellspacing="0" width="100%">

                        <thead>
                        <tr class="greentd">
                            <th class="text-center" colspan="6">تحويل العهدة</th>
                        </tr>

                        <tr class="info">
                            <th>تصنيف الأصل</th>
                            <th>إسم الأصل</th>
                            <th>العدد</th>
                            <th>الحالة</th>
                            <th>تاريخ الإستلام</th>
                            <?php if (isset($all_Data_tansfer)) { ?>
                                <th>نقل إلي</th>
                            <?php } ?>
                        </tr>
                        </thead>
                        <tbody id="result"></tbody>
                        <tbody>
                        <?php
                        if (isset($all_Data_tansfer) && $all_Data_tansfer != null) {
                            foreach ($all_Data_tansfer as $key => $value) {
                                $class = 'class';
                                $disabled = 'disabled';
                                ?>
                                <tr>
                                    <td>

                                        <select name="status[<?= $key ?>]"
                                                class="form-control bottom-input <?= $class ?>" <?= $disabled ?>>
                                            <option value="">إختر</option>

                                            <?php foreach ($custody as $record => $row) {

                                                $last = $max_value - 1;
                                                if ($custody[$record]->level > $last || $custody[$record]->level < $last) {

                                                    continue;

                                                }
                                                $select = '';
                                                if ($custody[$record]->id == $value->custody_id_fk) {
                                                    $select = 'selected="selected"';
                                                }
                                                ?>
                                                <option value="<?php echo $custody[$record]->id; ?>" <?= $select ?>>
                                                    <?php echo $custody[$record]->title ?></option>
                                            <?php } ?>

                                        </select>

                                    </td>
                                    <td>

                                        <input type="text" class="form-control bottom-input"
                                               value="<?php if (!empty($names[$value->custody_title])) {
                                                   echo $names[$value->custody_title];
                                               } ?>" <?= $disabled ?>/>

                                    </td>
                                    <td>

                                        <input type="text" class="form-control bottom-input"
                                               value="<?= $value->num ?>" <?= $disabled ?>/>

                                    </td>
                                    <td>

                                        <select name="status[<?= $key ?>]"
                                                class="form-control bottom-input <?= $class ?>" <?= $disabled ?>>
                                            <option value="">إختر</option>
                                            <?php
                                            foreach ($house_device_status as $k => $v) {
                                                $selects = '';
                                                if ($k == $value->status) {
                                                    $selects = 'selected="selected"';
                                                }
                                                ?>
                                                <option value="<?= $k ?>" <?= $selects ?>><?= $v ?></option>
                                            <?php } ?>
                                        </select>

                                    </td>
                                    <td>

                                        <input type="date" class="form-control bottom-input  <?= $class ?>"
                                               name="date_recived[<?= $key ?>]" <?php if (isset($allData) && $value->date_recived > 0) echo 'data-validation="required" value="' . $value->date_recived . '"'; else echo 'disabled' ?> <?= $disabled ?> />

                                    </td>
                                    <td>
                                        <a data-toggle="modal"
                                           data-target="#myModalonlyaccept-<?= $value->id . "-" . $this->uri->segment(4) ?>"
                                           class="btn btn-xs btn-success" title="تحويل">
                                            <span class="fa fa-check-square-o"></span> </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } ?>
                        </tbody>
                    </table>
                <?php } else { ?><br>
                    <div class=" col-sm-12 alert alert-danger">لاتوجد عهد</div>
                <?php } ?>
            </div>
            <div class="col-xs-12 no-padding">
                <?php if (isset($all_Data_tansfered)) { ?>
                    <table class="display table table-bordered responsive nowrap tb_table" cellspacing="0" width="100%">

                        <thead>
                        <tr class="greentd">
                            <th class="text-center" colspan="6">تفاصيل العهد المحوله</th>
                        </tr>
                        <tr class="info">
                            <th>تصنيف العهدة</th>
                            <th>إسم العهدة</th>
                            <th>العدد</th>
                            <th>الحالة</th>
                            <th>تاريخ الإستلام</th>
                            <th>الموظف المحول اليه</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        if (isset($all_Data_tansfered) && $all_Data_tansfered != null) {
                            foreach ($all_Data_tansfered as $key => $value) {
                                $class = 'class';
                                $disabled = 'disabled';
                                ?>
                                <tr>
                                    <td>

                                        <select name="status[<?= $key ?>]"
                                                class="form-control bottom-input <?= $class ?>" <?= $disabled ?>>
                                            <option value="">إختر</option>


                                            <?php foreach ($custody as $record => $row) {

                                                $last = $max_value - 1;
                                                if ($custody[$record]->level > $last || $custody[$record]->level < $last) {

                                                    continue;

                                                }
                                                $select = '';

                                                if ($custody[$record]->id == $value->custody_id_fk) {
                                                    $select = 'selected="selected"';
                                                }
                                                ?>


                                                <option value="<?php echo $custody[$record]->id; ?>" <?= $select ?>>
                                                    <?php echo $custody[$record]->title ?></option>
                                            <?php } ?>


                                        </select>

                                    </td>
                                    <td>

                                        <input type="text" class="form-control bottom-input"
                                               value="<?php if (!empty($names[$value->custody_title])) {
                                                   echo $names[$value->custody_title];
                                               } ?>" <?= $disabled ?>/>

                                    </td>
                                    <td>

                                        <input type="text" class="form-control bottom-input"
                                               value="<?= $value->num ?>" <?= $disabled ?>/>

                                    </td>
                                    <td>

                                        <select name="status[<?= $key ?>]"
                                                class="form-control bottom-input <?= $class ?>" <?= $disabled ?>>
                                            <option value="">إختر</option>
                                            <?php
                                            foreach ($house_device_status as $k => $v) {
                                                $selects = '';
                                                if ($k == $value->status) {
                                                    $selects = 'selected="selected"';
                                                }
                                                ?>
                                                <option value="<?= $k ?>" <?= $selects ?>><?= $v ?></option>
                                            <?php } ?>
                                        </select>

                                    </td>
                                    <td>

                                        <input type="date" class="form-control bottom-input  <?= $class ?>"
                                               name="date_recived[<?= $key ?>]" <?php if (isset($allData) && $value->date_recived > 0) echo 'data-validation="required" value="' . $value->date_recived . '"'; else echo 'disabled' ?> <?= $disabled ?> />

                                    </td>
                                    <td><?= $value->employee ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>


        </div>
    </div>
</div>
<?php echo form_close(); ?>
<?php
if (isset($all_Data_tansfer) && $all_Data_tansfer != null) {
    foreach ($all_Data_tansfer as $key => $value) {
        ?>
        <div class="modal fade" id="myModalonlyaccept-<?= $value->id . "-" . $this->uri->segment(4) ?>" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">تحويل العهدة</h4>
                    </div>
                    <?php echo form_open_multipart("human_resources/Human_resources/transfer_operation/" . $value->id . "/" . $this->uri->segment(4) . "") ?>
                    <div class="modal-body">
                        <div class="row" style="padding: 20px">
                            <div class="form-group col-sm-12 col-xs-12">
                                <label class="label half top-label" style=" padding: 7px; font-size: 14px;">إختر الموظف
                                    المراد التحويل اليه</label>
                                <select name="to_emp_code" class="selectpicker no-padding form-control half"
                                        data-show-subtext="true" data-live-search="true" data-validation="required"
                                        aria-required="true">
                                    <option value="">إختر</option>
                                    <?php
                                    if (isset($all_employee) && $all_employee != null) {
                                        foreach ($all_employee as $row2) {
                                            $select = '';
                                            ?>
                                            <option value="<?= $row2->id ?>" <?= $select ?>><?= $row2->employee ?></option>
                                        <?php } ?>
                                    <?php } ?>

                                </select>
                                <input type="hidden" name="from_emp_code" value="<?= $this->uri->segment(4) ?>"/>
                                <input type="hidden" name="custody_id_fk" value="<?= $value->id ?>"/>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        <button type="submit" name="action" value="action" class="btn btn-success">حفظ</button>

                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
        <?php
    }
}
?>


<!--
<?php // $data_load["personal_data"]=$personal_data; $this->load->view('admin/Human_resources/sidebar_person_data',$data_load);?>
-->


<script type="text/javascript">
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

    function dateEnabled(val, id) {
        $('.date' + id).val('');
        $('.date' + id).removeAttr('data-validation');
        $('.date' + id).attr('disabled', true);
        if (val == 1) {
            $('.date' + id).removeAttr('disabled');
            $('.date' + id).attr('data-validation', 'required');
        }
    }

    var inc = 0;

    function getBanks(argument, allCount) {
        inc = inc;
        if (argument) {
            var dataString = 'numbers=' + argument + '&count=' + allCount + '&inc=' + inc;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/get_custody',
                data: dataString,
                cache: false,
                success: function (html) {
                    $('#result').append(html);
                    $('#buttons').removeAttr('disabled');

                }
            });
            inc = ++inc;
        } else {
            $('#result').html('');
        }
    }


</script>

<div id="custody_titlez">


</div>
<script>

    function GetMainName(valu, input_id) {

        //  var valu=valu.split("-");


        if (valu > 0 && valu != '') {


            var dataString = 'id=' + valu;
            // alert(dataString);

//$('#custody_title' + input_id).html('<option>اختر </option>');
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/GetMainName',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#custody_title' + input_id).html(html);
                }
            });
//'#custody_title' + input_id

            return false;

        }
        /*$('#bank_code').val(valu[1]);*/
    }
</script>




