<style>
    .l {

        font-size: 13px;
    }

    . {
        font-size: 14px;
        font-weight: 500;

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

    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;

    }


</style>


<div class="col-sm-12 col-md-12 col-xs-12 no-padding">
  
    <div class="top-line"></div>
    <div class="col-md-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?= $title ?></h4>
                </div>
            </div>

            <div class="panel-body">

                <?php
                if (isset($record) && !empty($record) && $record != null) {
                    echo form_open_multipart('human_resources/Always_setting/update_always/' . $record->id);
//                    echo "<pre>";
//
//                    print_r($record);
//                    echo "</pre>";
                    $name = $record->name;
                    $attend_time = $record->attend_time;
                    $leave_time = $record->leave_time;
                    $color = $record->color;
                    $late_min = $record->late_min;
                    $leave_early_min = $record->leave_early_min;
                    $start_enter = $record->start_enter;
                    $end_enter = $record->end_enter;
                    $start_out = $record->start_out;
                    $end_out = $record->end_out;

                    $account_day_work = $record->account_day_work;
                    $account_time_work = $record->account_time_work;
                    $season_name_num = $record->season_num;//2-2-om

                } else {
                    echo form_open_multipart('human_resources/Always_setting/always_setting');
                    $name = '';
                    $attend_time = '';
                    $leave_time = '';
                    $color = '';
                    $late_min = '';
                    $leave_early_min = '';
                    $start_enter = '';
                    $end_enter = '';
                    $start_out = '';
                    $end_out = '';
                    $account_day_work = '';
                    $account_time_work = '';
                    $season_name_num = '';//2-2-om


                }
                ?>
                <div class="col-md-12">
                    <!--                    2-2-om                  -->
                
                    <!--                    2-2-om                  -->


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label l">اسم الدوام</label>
                        <input type="text" name="name" id="name" value="<?php echo $name; ?>"
                               data-validation="required" class="form-control "

                               data-validation-has-keyup-event="true">
                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label l">وقت الحضور</label>
                        <input type="time" name="attend_time" id="attend_time" value="<?php echo $attend_time; ?>"
                               data-validation="required" class="form-control "

                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label l">وقت الانصراف</label>
                        <input type="time" name="leave_time" id="leave_time" value="<?php echo $leave_time; ?>"
                               data-validation="required" class="form-control "

                               data-validation-has-keyup-event="true">
                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label l">التأخير بالدقائق</label>
                        <input type="text" name="late_min" onkeypress="validate_number(event);" id="late_min"
                               value="<?php echo $late_min; ?>"
                               data-validation="required" class="form-control "

                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label l">الانصراف المبكر بالدقائق</label>
                        <input type="text" name="leave_early_min" id="leave_early_min"
                               onkeypress="validate_number(event);" value="<?php echo $leave_early_min; ?>"
                               data-validation="required" class="form-control "

                               data-validation-has-keyup-event="true">
                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label l"> بدايه تسجيل الدخول </label>
                        <input type="time" name="start_enter" id="start_enter" value="<?php echo $start_enter; ?>"
                               data-validation="required" class="form-control "

                               data-validation-has-keyup-event="true">
                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label l"> نهاية تسجيل الدخول </label>
                        <input type="time" name="end_enter" id="end_enter" value="<?php echo $end_enter; ?>"
                               data-validation="required" class="form-control "

                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label l"> بدايه تسجيل الخروج </label>
                        <input type="time" name="start_out" id="start_out" value="<?php echo $start_out; ?>"
                               data-validation="required" class="form-control "

                               data-validation-has-keyup-event="true">
                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">

                        <label class="label l"> نهايه تسجيل الخروج </label>
                        <input type="time" name="end_out" id="end_out" value="<?php echo $end_out; ?>"
                               data-validation="required" class="form-control "

                               data-validation-has-keyup-event="true">
                    </div>


                    <?php

                    $yes_no = array(1 => 'نعم', '2' => 'لا');

                    ?>

                    <div class="form-group col-md-2 col-sm-6 padding-4">

                        <label class="label l"> يحسب كيوم عمل </label>

                        <input type="number" step="any" name="account_day_work" id="account_day_work"
                               class="form-control "
                               value="<?php echo $account_day_work; ?>"/>
                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">

                        <label class="label l"> يحسب كوقت عمل </label>


                        <input type="number" step="any" name="account_time_work" id="account_time_work"
                               class="form-control "
                               value="<?php echo $account_time_work; ?>"/>
                    </div>

    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label l">فرق التوقيت</label>
                        <select name="season_name" id="season_name" value="<?php echo $name; ?>"
                                data-validation="required" class="form-control "
                                data-validation-has-keyup-event="true">
                            <?php foreach ($times as $row) {
                                ?>
                                <option value="<?= $row->id ?>" <?php if (($row->id == $season_name_num) && ($season_name_num != '')) {
                                    echo 'selected';
                                } ?> ><?= $row->season_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label l">لون العرض<span class="span-allow" style="color:rebeccapurple"> (اضغط لاختيار اللون) </span></label>
                        <input type="color" name="color" id="color" value="<?php echo $color; ?>"
                               data-validation="required" class="form-control "

                               data-validation-has-keyup-event="true">
                    </div>


                </div>

                 <div class="col-md-12 text-center" style="margin-bottom:10px ;">
                     <button type="submit" name="add" value="حفظ" class="btn btn-success btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                </div>

                </form>
                <?php if (isset($records) && $records != null) { ?>


                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="greentd visible-md visible-lg">
                            <th>م</th>
                            <th>إسم التوقيت</th>

                            <th>إسم الدوام</th>
                            <th>وقت الحضور</th>
                            <th>وقت الانصراف</th>

                            <th>التاخير بالدقائق</th>
                            <th>الانصراف المبكر بالدقائق</th>
                            <th>بدايه تسجيل الدخول</th>
                            <th>نهايه تسجيل الدخول</th>
                            <th>بدايه تسجيل الخروج</th>
                            <th>نهايه تسجيل الخروج</th>
                            <th> يحسب كيوم عمل</th>
                            <th> يحسب كوقت عمل</th>
                            <th>لون العرض</th>
                            <th>حالة التوقيت</th>

                            <th>الاجراء</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $x = 1;
                        $status_array = array('غير نشط', 'نشط');//2-2-om

                        foreach ($records as $row) {
                            ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $row->season_name; ?></td>

                                <td><?php echo $row->name; ?></td>


                                <td><?php echo date('A H:i', strtotime($row->attend_time)); ?></td>
                                <td><?php echo date('A H:i', strtotime($row->leave_time)); ?></td>


                                <td><?php echo $row->late_min; ?></td>
                                <td><?php echo $row->leave_early_min; ?></td>
                                <td><?php echo date('A H:i', strtotime($row->start_enter)); ?></td>
                                <td><?php echo date('A H:i', strtotime($row->end_enter)); ?></td>
                                <td><?php echo date('A H:i', strtotime($row->start_out)); ?></td>
                                <td><?php echo date('A H:i', strtotime($row->end_out)); ?></td>

                                <td><?php echo $row->account_day_work; ?></td>
                                <td><?php echo $row->account_time_work; ?></td>


                                <td bgcolor="<?= $row->color ?>"></td>
                                <td><?php echo $row->season_status ?></td>

                                <td>


                                    <a href="<?php echo base_url(); ?>human_resources/Always_setting/update_always/<?php echo $row->id; ?>"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                    <a href="<?php echo base_url(); ?>human_resources/Always_setting/delete_always/<?php echo $row->id; ?>"
                                       onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                                     aria-hidden="true"></i>
                                    </a>


                                </td>


                            </tr>
                            <?php
                            $x++;
                        }
                        ?>
                        </tbody>
                    </table>


                <?php } ?>
            </div>
        </div>
    </div>
</div>