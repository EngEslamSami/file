<style>
    .lobipanel-noaction {
        margin-bottom: 25px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    }

    .list-group-item {
        padding: 10px 8px;
    }

    .table-pro th {
        width: 117px;
    }
</style>
<style type="text/css">
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
<style type="text/css">
    . {
        font-size: 14px;
        font-weight: 500;
        position: relative;

    }

    .right-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        right: 10px;
        top: 1px;
    }

    .left-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        left: 10px;
        top: 1px;
    }

    button[type=submit] {

        background-color: #3c990b;
        border: 1px solid transparent;
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border-radius: 4px;
        padding-top: 0;
        padding-bottom: 0;
    }

</style>
<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body" style="min-height: 371px;">
            <div class="col-sm-10">
                <?php
                $membership_jobtitle_arr = array(1 => 'رئيس مجلس الإدارة', 2 => 'نائب رئيس مجلس الإدارة', 3 => 'أمين الصندوق', 4 => 'عضو مجلس إدارة');
                $status_arr = array(1 => 'سارية', 2 => 'منتهية');
                if ((isset($one_data)) && (!empty($one_data))) {
                    echo form_open_multipart(base_url() . 'md/all_magls_edara_members/All_magls_edara_members/update/' . base64_encode($one_data->id));
                    $mgls_id = $one_data->mgls_id_fk;
                    $mgls_code = $one_data->mgls_code;
                    $rkm_odwia = $one_data->rkm_odwia;
                    $rkm_odwia_full = $one_data->rkm_odwia_full;
                    $mem_id = $one_data->mem_id_fk;
                    $mem_name = $one_data->mem_name;
                    $no3_odwia = $one_data->no3_odwia_fk;
                    $no3_odwia_title = $one_data->no3_odwia_title;
                    $mansp_id = $one_data->mansp_fk;
                    $mansp_title = $one_data->mansp_title;
                    $birth_date_m = $one_data->birth_date_m;
                    $birth_date_h = $one_data->birth_date_h;
                    $age = $one_data->age;
                    $card_num = $one_data->card_num;
                    $jwal = $one_data->jwal;
//7-3-om
//                    $ta3en_date_m = $one_data->ta3en_date_m;
//                    $ta3en_date_h = $one_data->ta3en_date_h;
//                    $end_date_m = $one_data->end_date_m;
//                    $end_date_h = $one_data->end_date_h;


             $private_name = $one_data->private_name ;

                    $status = $one_data->status;
                    $status_title = $one_data->status_title;
                    $reason = $one_data->reason;
                    $esteqala = $one_data->estqala_status;
                    $estqala_title = $one_data->estqala_title;
                    $estqala_reason = $one_data->estqala_reason;

                    if ($status == 2) {
                        $reason_display = 'block';
                        $date_display = 'block';
                    } else {
                        $reason_display = 'none';
                        $date_display = 'none';
                    }
//7-3-om
                    $option = '<option value="' . $mem_id . '">' . $mem_name . '</option>';


                } else {
                    echo form_open_multipart(base_url() . 'md/all_magls_edara_members/All_magls_edara_members');
                    $mgls_id = $mgls_code = $rkm_odwia = $rkm_odwia_full = $mem_id = $mem_name = $no3_odwia = $no3_odwia_title = $mansp_id = $mansp_title = $birth_date_m = $birth_date_h = '';
                    $age = '';
                    $card_num = '';
                    $jwal = '';
//                    7-3-om
                    $ta3en_date_m = '';
                    $ta3en_date_h = '';
                    $end_date_m = '';
                    $end_date_h = '';
                    $status = '';
                    $status_title = '';
                    $reason = '';
                        $private_name = '';
                    $esteqala = 0;
                    $estqala_title = 'غير مستقيل';
                    $estqala_reason = '';
                    $reason_display = 'none';
                    $date_display = 'none';

//                    7-3-om
                    $option = '<option value="">-اختر-</option>';

                }
                ?>

                <div class="form-group col-sm-2 col-xs-12 padding-4" style="">
                    <label class="label "> كود المجلس </label>
                    <select name="mgls_code" class="form-control  " id="mgls_code"
                            onchange=" get_data(this); "
                            data-validation="required" aria-required="true">
                        <option value="">-اختر-</option>
                        <?php
                        if (isset($active_magles) && !empty($active_magles)) {
                            foreach ($active_magles as $mag) {
                                ?>
                                <option data-members="<?php echo $mag->count_member ?>"
                                        data-ta3en_date_m="<?php echo $mag->ta3en_date_m ?>"
                                        data-ta3en_date_h="<?php echo $mag->ta3en_date_h ?>"
                                        data-end_date_m="<?php echo $mag->end_date_m ?>"
                                        data-end_date_h="<?php echo $mag->end_date_h ?>"
                                        data-mgls_id="<?php echo $mag->id ?>"
                                        value="<?php echo $mag->mg_code ?>" <?php if ($mag->id == $mgls_id) echo 'selected'; ?> ><?php echo $mag->mg_code ?> </option>
                            <?php }
                        } ?>
                    </select>
                    <!--                        7-3-om -->
                    <input type="hidden" id="mgls_id" name="mgls_id_fk" value="<?= $mgls_id ?>">
                </div>

                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label  "> رقم العضوية <strong></strong> </label>
                    <input type="text" readonly class="form-control   "
                           value="<?= $rkm_odwia ?>" name="rkm_odwia" id="rkm_odwia"/>
                    <input type="hidden" value="<?= $rkm_odwia_full ?>" name="rkm_odwia_full" id="rkm_odwia_full">

                </div>


                <div class="form-group col-sm-5 col-xs-12">
                    <label class="label  ">إسم العضو </label>
                    <input style="width:86%; float: right;" type="text" name="mem_name" id="mem_name"
                           readonly="readonly"
                           class="form-control input_style_2 list "
                           value="<?= $mem_name ?>" data-validation-has-keyup-event="true"/>
                    <button type="button" data-toggle="modal" data-target="#myModalInfo"
                            class="btn btn-success btn-next" style="float: left;">
                        <i class="fa fa-plus"></i></button>
                    <input type="hidden" name="mem_id_fk" id="mem_id" value="<?= $mem_id ?>">

                </div>

                <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="width: 70%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">تفاصيل العضو</h4>
                            </div>
                            <div class="modal-body">
                                <table id="example" class="table table-striped table-bordered ">
                                    <thead>
                                    <tr class="info">
                                        <th>#</th>
                                        <th>م</th>
                                        <th>رقم العضوية</th>
                                        <th>إسم العضو</th>
                                        <th>الجوال</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (isset($all_members) && !empty($all_members)) {
                                        $s = 1;
                                        foreach ($all_members as $member) { ?>
                                            <tr>
                                                <td><input type="radio" name="choosed"
                                                           id="choosed<?php echo $member->id; ?>"
                                                           data-name="<?php echo $member->name ?>"
                                                           data-odwia="<?php echo $member->no3_odwia_title ?>"
                                                           data-card-num="<?php echo $member->card_num ?>"
                                                           data-birth-date-m="<?php echo $member->birth_date_m ?>"
                                                           data-birth-date-h="<?php echo $member->birth_date_h ?>"
                                                           data-jwal="<?php echo $member->jwal ?>"
                                                           data-age="<?php echo $member->age ?>"
                                                           data-rkm_odwia_full="<?php echo $member->rkm_odwia_full ?>"
                                                           data-rkm_odwia="<?php echo $member->rkm_odwia ?>"
                                                           data-no3_odwia_fk="<?php echo $member->no3_odwia_fk ?>"
                                                           ondblclick=" get_data_emp2(<?php echo $member->id; ?>);"/>
                                                </td>
                                                <td><?php echo $s ?></td>
                                                <td><?php echo $member->rkm_odwia_full ?></td>
                                                <td><?php echo $member->name ?></td>
                                                <td><?php echo $member->jwal ?></td>
                                            </tr>
                                            <?php $s++;
                                        }
                                    }; ?>


                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer" style="display: inline-block;width: 100%">
                                <button type="button" class="btn btn-danger"
                                        style="float: left;" data-dismiss="modal">إغلاق
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label"> نوع العضوية </label>
                    <input name="no3_odwia_title" id="no3_odwia_title" class=" form-control"
                           value="<?= $no3_odwia_title ?>" readonly>
                    <!--                        <input type="hidden" value="-->
                    <? //=$rkm_odwia?><!--" name="rkm_odwia" id="rkm_odwia">-->
                    <input type="hidden" value="" name="no3_odwia_fk" id="no3_odwia_fk" vocab="<?= $no3_odwia ?>">
                </div>
                <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label    ">منصب العضو</label>
                    <select name="mansp_fk" id="job_title_id_fk" class="form-control"
                            onchange="check_mansep('job_title_id_fk','mgls_code'); $('#mansep_title').val($('option:selected', this).text());"
                            data-show-subtext="true" data-live-search="true" data-validation="required"
                            aria-required="true">
                        <option value=""> - اختر -</option>
                        <?php foreach ($membership_jobtitle_arr as $key => $value): ?>
                            <option value="<?php echo $key ?>" <?php if ($key == $mansp_id) echo 'selected'; ?> ><?php echo $value ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="mansp_title" id="mansep_title" value="<?= $mansp_title ?>">
                </div>

                <div class="form-group col-md-3 col-xs-12 padding-4">
                    <label class="label" style="text-align: center !important;">
                        <img style="width: 18px;float: right;"
                             src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon3.png">
                        تاريخ التعيين
                        <img style="width: 18px;float: left;"
                             src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon6.png">
                    </label>
                    <div id="cal-start-2" style="width: 50%;float: right;">
                        <input id="ta3en_date_h" name="ta3en_date_h" class="form-control  "
                               type="text" onfocus="showCalstart2();" value=""/>

                    </div>

                    <div id="cal-start-1" style="width: 50%;float: right;">
                        <input id="ta3en_date_m" name="ta3en_date_m" class="form-control   "
                               type="text" value="" onfocus="showCalstart1();"/>
                    </div>

                </div>

                <div class="form-group col-md-3 col-xs-12 padding-4">
                    <label class="label" style="text-align: center !important;">
                        <img style="width: 18px;float: right;"
                             src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon3.png">
                        تاريخ الإنتهاء
                        <img style="width: 18px;float: left;"
                             src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon6.png">
                    </label>

                    <div id="cal-start-3" style="width: 50%;float: right;">
                        <input id="end_date_h" name="end_date_h" class="form-control   "
                               type="text" onfocus="showCalend2();" value=""/>
                    </div>


                    <div id="cal-start-4" style="width: 50%;float: right;">
                        <input id="end_date_m" name="end_date_m" class="form-control   "
                               type="text" value="" onfocus="showCalend1();"
                        />
                    </div>
                </div>


                <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label    ">حالة العضوية بالمجلس</label>
                    <select name="status" id="status_id" class="form-control"
                            onchange="get_status(this)"
                            data-show-subtext="true" data-live-search="true" data-validation="required"
                            aria-required="true">
                        <option value=""> - اختر -</option>
                        <?php foreach ($status_arr as $key => $value): ?>
                            <option value="<?php echo $key ?>" <?php if ($key == $status) echo 'selected'; ?> ><?php echo $value ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="status_title" id="status_title" value="<?= $status_title ?>">
                </div>

                <!--<div class="form-group col-sm-5 col-xs-12 padding-4" id="reason"
                     style="text-align: center !important; display: <?= $reason_display ?>">
                    <label class="label "> السبب انهاء العضوية <strong></strong> </label>
                    <input type="text" class="form-control" value="<?= $reason ?>"
                           name="reason"/>
                </div>-->
                <div class="form-group col-md-4 col-sm-6 padding-4" id="reason_div"
                     style="display: <?= $reason_display ?>">
                    <label class="label  ">سبب انهاء العضوية</label>
                    <input type="text" name="odwia_status_reason" id="odwia_status_reason" value="<?= $reason ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:79%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_family').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_family"
                    onclick="get_details_reason()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>

                <div class="form-group col-md-3 col-xs-12 padding-4" id="end_date_div"
                     style="display: <?= $date_display ?>">
                    <label class="label" style="text-align: center !important;">
                        <img style="width: 18px;float: right;"
                             src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon3.png">
                        تاريخ الإنتهاء عضوية
                        <img style="width: 18px;float: left;"
                             src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon6.png">
                    </label>
                    <div id="cal-start-5" style="width: 50%;float: right;">
                        <input id="end_date_mem_h" name="end_date_mem_h" class="form-control  "
                               type="text" onfocus="showCalend4();"
                               value=""/>
                    </div>
                    <div id="cal-start-6" style="width: 50%;float: right;">
                        <input id="end_date_mem_m" name="end_date_mem_m" class="form-control  "
                               type="text" value="" onfocus="showCalend3();"
                        />
                    </div>
                </div>

                <div class="form-group col-sm-4 col-xs-12 padding-4" id="reason_morfaq"
                     style="text-align: center !important; display: <?= $reason_display ?>">
                    <label class="label "> مرفق انهاء العضوية <strong></strong> </label>
                    <input type="file" class="form-control" name="morfaq_end"/>
                </div>
                
 
  
  
      <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label    ">الاسم مختصر </label>
                 <input id="private_name" name="private_name" class="form-control  "
                               type="text"   value="<?php echo $private_name; ?>"/>
                 
                </div>
              
                
                
                
                
                
                
                
                <div class="col-sm-12 text-center">

                    <button type="submit" class="btn-success btn-labeled btn" id="btun_submit" name="btn" value="1">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                    <span class="label-danger" id="submit_btn" style="display: none"></span>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="col-sm-2 no-padding">
                <div class="text-center" id="sidebar_data">

                </div>

            </div>

        </div>
    </div>

</div>

<?php 


if (isset($all_data) && $all_data != null) { ?>
    <div class="col-sm-12  no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات أعضاء المجالس</h3>
            </div>
            <div class="panel-body">

                <div class="col-xs-12">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="" class=" example table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr class="greentd">
                                    <th class="text-center">م</th>
                                    <th class="text-center">كود المجلس</th>
                                    <th class="text-center">رقم العضو</th>
                                    <th class="text-center">اسم العضو</th>
                                    <th class="text-center">منصب العضو</th>
                                    <th class="text-center">تاريخ التعيين</th>
                                    <th class="text-center">تاريخ الانتهاء</th>
                                    <th class="text-center">حالة العضوية بالمجلس</th>
                                    <th class="text-center">التفاصيل</th>
                                    <th class="text-center">الاجراء</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php $a = 1;
                                foreach ($all_data as $record) {
                                    ?>
                                    <tr>
                                        <td><?php echo $a ?> </td>
                                        <td><?php echo $record->mgls_code ?> </td>
                                        <td><?php echo $record->rkm_odwia_full ?> </td>
                                        <td><?php echo $record->mem_name ?> </td>
                                        <td><?php echo $record->mansp_title ?> </td>
                                        <!--<td><?= $record->ta3en_date_h . ' هـ ' .
                                        ' <i class="fa fa-arrows-h" aria-hidden="true"></i> '
                                        . $record->ta3en_date_m . ' م ' ?></td>

                                        <td><?= $record->end_date_h . ' هـ ' .
                                        ' <i class="fa fa-arrows-h" aria-hidden="true"></i> '
                                        . $record->end_date_m . ' م ' ?></td>
                                            -->
    <!--<td onclick=" var arr_time=['<?= $record->ta3en_date_m ?>','<?= $record->ta3en_date_h ?>'];
            change_time(this, arr_time)"><?= ' م ' . $record->ta3en_date_m ?></td>
    <td onclick=" var arr_time=['<?= $record->end_date_m ?>','<?= $record->end_date_h ?>'];
            change_time(this, arr_time)"><?= ' م ' . $record->end_date_m ?></td>
            -->
            
<?php 
/*
$record->ta3en_date_m = explode('/', $record->ta3en_date_m)[2] . '/' . explode('/', $record->ta3en_date_m)[1] . '/' . explode('/', $record->ta3en_date_m)[0];
$record->ta3en_date_h = explode('/', $record->ta3en_date_h)[2] . '/' . explode('/', $record->ta3en_date_h)[1] . '/' . explode('/', $record->ta3en_date_h)[0];
$record->end_date_m = explode('/', $record->end_date_m)[2] . '/' . explode('/', $record->end_date_m)[1] . '/' . explode('/', $record->end_date_m)[0];
$record->end_date_h = explode('/', $record->end_date_h)[2] . '/' . explode('/', $record->end_date_h)[1] . '/' . explode('/', $record->end_date_h)[0];
*/
 ?>
 <?php $record->ta3en_date_m = explode('/', $record->ta3en_date_m)[2] . '/' . explode('/', $record->ta3en_date_m)[0] . '/' . explode('/', $record->ta3en_date_m)[1];
$record->ta3en_date_h = explode('/', $record->ta3en_date_h)[2] . '/' . explode('/', $record->ta3en_date_h)[1] . '/' . explode('/', $record->ta3en_date_h)[0];
$record->end_date_m = explode('/', $record->end_date_m)[2] . '/' . explode('/', $record->end_date_m)[0] . '/' . explode('/', $record->end_date_m)[1];
$record->end_date_h = explode('/', $record->end_date_h)[2] . '/' . explode('/', $record->end_date_h)[1] . '/' . explode('/', $record->end_date_h)[0];
 ?>


 
 

                                        <td onclick=" var arr_time=['<?= $record->ta3en_date_h ?>','<?= $record->ta3en_date_m ?>'];
                                                change_time(this, arr_time)"><?= $record->ta3en_date_m . ' م ' ?></td>
                                        <td onclick=" var arr_time=['<?= $record->end_date_h ?>','<?= $record->end_date_m ?>'];
                                                change_time(this, arr_time)"><?= $record->end_date_m . ' م ' ?></td>
            
            

                                        <td><?= $record->status_title ?></td>
                                        <td>
                                            <i onclick="get_details(<?= $record->id ?>)"
                                               class="fa fa-search-plus" aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal"></i>
                                        </td>
                                        <td class="text-center">
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
                                                    window.location="<?= base_url() . 'md/all_magls_edara_members/All_magls_edara_members/update/' . base64_encode($record->id) ?>";
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
                                                    setTimeout(function(){window.location="<?= base_url() . 'md/all_magls_edara_members/All_magls_edara_members/delete/' . base64_encode($record->id) ?>";}, 500);
                                                    });'>
                                                <i class="fa fa-trash"> </i></a>
                                        </td>
                                    </tr>
                                    <?php $a++;
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
<!-- yara -->
<div class="modal fade" id="Modal_family" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> الاسباب </h4>
            </div>
            <div class="modal-body">


                <div id="geha_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة سبب
                                    ايقاف العضويه
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">السبب </label>
                                    <input type="text" name="reason" id="reason" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add" style="display: block;">
                                    <button type="button" onclick="add_geha($('#reason').val())"
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
                   <!--
                        <?php
                        //  echo '<pre>'; print_r($reasons_settings);

                        if (!empty($reasons_settings)) { ?>
                            <table id="" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <th width="2%">#</th>
                                    <th class="text-center">السبب</th>

                                    <th class="text-center">الإجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($reasons_settings as $value) {
                                    ?>
                                    <tr>
                                        <td><input type="radio" name="radio" data-title="<?= $value->id ?>"
                                                   id="radio"
                                                   ondblclick="getTitle('<?php echo $value->reason; ?>')">
                                        </td>
                                        <td><?= $value->reason ?></td>

                                        <td>

                                            <a href="#" onclick="delte_geha(<?= $value->id ?>);"> <i
                                                        class="fa fa-trash"> </i></a>

                                            <a href="#" onclick="update_reason(<?= $value->id ?>);"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>


                        <?php } else { ?>

                            <div class="alert alert-danger">لاتوجد بيانات !!</div>
                        <?php } ?>
-->
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- ensd -->
<!-- yara_start -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> جميع التفاصيل المتعلقة باعضاء مجلس الاداره:
                    <span id="pop_rkm"></span>
                </h4>
            </div>

            <div class="modal-body">
                <div id="magles_details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- tara_end -->

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>
    function get_sidebar_data() {
        var memb_id = $('#mem_id').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/get_sidebar_data",
            data: {id: memb_id},
            beforeSend: function () {
                $('#sidebar_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {

                $('#sidebar_data').html(d);


            }


        });

    }

    $(document).ready(function () {
        console.log('document ready');
        get_sidebar_data();
        console.log('document ready');

    });
</script>

<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>
    var loop = 0;
    var calstart1 = new Calendar(),
        calstart2 = new Calendar(true, 0, true, true),
        datestart1 = document.getElementById('ta3en_date_m'),
        datestart2 = document.getElementById('ta3en_date_h'),
        calstart1Mode = calstart1.isHijriMode(),
        calstart2Mode = calstart2.isHijriMode();
    datestart1.setAttribute("value", calstart1.getDate().getDateString());
    datestart2.setAttribute("value", calstart2.getDate().getDateString());
    document.getElementById('cal-start-1').appendChild(calstart1.getElement());
    document.getElementById('cal-start-2').appendChild(calstart2.getElement());
    calstart1.show();
    calstart2.show();
    setDateFieldsstart1();
    calstart1.callback = function () {
        if (calstart1Mode !== calstart1.isHijriMode()) {
            calstart2.disableCallback(true);
            calstart2.changeDateMode();
            calstart2.disableCallback(false);
            calstart1Mode = calstart1.isHijriMode();
            calstart2Mode = calstart2.isHijriMode();
        } else
            calstart2.setTime(calstart1.getTime());
        setDateFieldsstart1();
    };
    calstart2.callback = function () {
        if (calstart2Mode !== calstart2.isHijriMode()) {
            calstart1.disableCallback(true);
            calstart1.changeDateMode();
            calstart1.disableCallback(false);
            calstart1Mode = calstart1.isHijriMode();
            calstart2Mode = calstart2.isHijriMode();
        } else
            calstart1.setTime(calstart2.getTime());
        setDateFieldsstart1();
    };
    calstart1.onHide = function () {
        calstart1.show(); // prevent the widget from being closed
    };
    calstart2.onHide = function () {
        calstart2.show(); // prevent the widget from being closed
    };

    function setDateFieldsstart1() {
        // datestart1.value = calstart1.getDate().getDateString();
        // datestart2.value = calstart2.getDate().getDateString();
        if (loop == 0) {
            <?php  if (isset($one_data) && !empty($one_data) && $one_data != null) {
            ?>
            ++loop;
            datestart1.value = '<?php echo $one_data->mgls_ta3en_m ?>';
            datestart2.value = '<?php echo $one_data->mgls_ta3en_h?>';
            <?php
            }else{ ?>
            datestart1.value = calstart1.getDate().getDateString();
            datestart2.value = calstart2.getDate().getDateString();
            <?php  }  ?>
        } else {
            datestart1.value = calstart1.getDate().getDateString();
            datestart2.value = calstart2.getDate().getDateString();
        }
    }

    function showCalstart1() {
        if (calstart1.isHidden())
            calstart1.show();
        else
            calstart1.hide();
    }

    function showCalstart2() {
        if (calstart2.isHidden())
            calstart2.show();
        else
            calstart2.hide();
    }

    //# sourceURL=pen.js
</script>
<script>
    var loop1 = 0;
    var calend1 = new Calendar(),
        calend2 = new Calendar(true, 0, true, true),
        dateend1 = document.getElementById('end_date_m'),
        dateend2 = document.getElementById('end_date_h'),
        calend1Mode = calend1.isHijriMode(),
        calend2Mode = calend2.isHijriMode();
    dateend1.setAttribute("value", calend1.getDate().getDateString());
    dateend2.setAttribute("value", calend2.getDate().getDateString());
    document.getElementById('cal-start-4').appendChild(calend1.getElement());
    document.getElementById('cal-start-3').appendChild(calend2.getElement());
    calend1.show();
    calend2.show();
    setDateFieldsend1();
    calend1.callback = function () {
        if (calend1Mode !== calend1.isHijriMode()) {
            calend2.disableCallback(true);
            calend2.changeDateMode();
            calend2.disableCallback(false);
            calend1Mode = calend1.isHijriMode();
            calend2Mode = calend2.isHijriMode();
        } else
            calend2.setTime(calend1.getTime());
        setDateFieldsend1();
    };
    calend2.callback = function () {
        if (calend2Mode !== calend2.isHijriMode()) {
            calend1.disableCallback(true);
            calend1.changeDateMode();
            calend1.disableCallback(false);
            calend1Mode = calend1.isHijriMode();
            calend2Mode = calend2.isHijriMode();
        } else
            calend1.setTime(calend2.getTime());
        setDateFieldsend1();
    };
    calend1.onHide = function () {
        calend1.show(); // prevent the widget from being closed
    };
    calend2.onHide = function () {
        calend2.show(); // prevent the widget from being closed
    };

    function setDateFieldsend1() {
        // datestart1.value = calstart1.getDate().getDateString();
        // datestart2.value = calstart2.getDate().getDateString();
        if (loop1 == 0) {
            <?php  if (isset($one_data) && !empty($one_data) && $one_data != null) {
            ?>
            ++loop1;
            dateend1.value = '<?php echo $one_data->mgls_end_m ?>';
            dateend2.value = '<?php echo $one_data->mgls_end_h?>';
            <?php
            }else{ ?>
            dateend1.value = calend1.getDate().getDateString();
            dateend2.value = calend2.getDate().getDateString();
            <?php  }  ?>
        } else {
            dateend1.value = calend1.getDate().getDateString();
            dateend2.value = calend2.getDate().getDateString();
        }
    }

    function showCalend1() {
        if (calend1.isHidden())
            calend1.show();
        else
            calend1.hide();
    }

    function showCalend2() {
        if (calend2.isHidden())
            calend2.show();
        else
            calend2.hide();
    }

    //# sourceURL=pen.js
</script>
<script>
    function get_data_emp(obj) {


        $('#no3_odwia_title').val($('option:selected', obj).attr('data-odwia'));
        $('#card_num').val($('option:selected', obj).attr('data-card-num'));
        $('#age').val($('option:selected', obj).attr('data-age'));
        $('#jwal').val($('option:selected', obj).attr('data-jwal'));
        $('#birth_date_m').val($('option:selected', obj).attr('data-birth-date-m'));
        $('#birth_date_h').val($('option:selected', obj).attr('data-birth-date-h'));
        $('#rkm_odwia_full').val($('option:selected', obj).attr('data-rkm_odwia_full'));
        $('#rkm_odwia').val($('option:selected', obj).attr('data-rkm_odwia'));
        $('#card_num_slide').text($('option:selected', obj).attr('data-card-num'));
        $('#num_odwia').text($('option:selected', obj).attr('data-rkm_odwia'));
        $('#mob').text($('option:selected', obj).attr('data-jwal'));
        $('#no3_odwia_fk').val($('option:selected', obj).attr('data-no3_odwia_fk'));
        $('#mem_name').val($('option:selected', obj).text());
        $('#mem_name_slid').text($('option:selected', obj).text());


    }

    function get_data(obj) {
        $('#ta3en_date_m').val($('option:selected', obj).attr('data-ta3en_date_m'));
        $('#ta3en_date_h').val($('option:selected', obj).attr('data-ta3en_date_h'));
        $('#end_date_m').val($('option:selected', obj).attr('data-end_date_m'));
        $('#end_date_h').val($('option:selected', obj).attr('data-end_date_h'));
        $('#mgls_id').val($('option:selected', obj).attr('data-mgls_id'));
        if ($('option:selected', obj).attr('data-members') >= 9) {

            $('#submit_btn').text('لقد تجاوز عدد اعضاء المجلس 9 اعضاء');
            $('#submit_btn').show('slow');
            $('#btun_submit').prop('disabled', true);
        }
    }
</script>

<!-- 7-3-om -->
<script>
    var loop1_mem = 0;
    var calend_mem1 = new Calendar(),
        calend_mem2 = new Calendar(true, 0, true, true),
        dateend_mem1 = document.getElementById('end_date_mem_m'),
        dateend_mem2 = document.getElementById('end_date_mem_h'),
        calend_mem1Mode = calend_mem1.isHijriMode(),
        calend_mem2Mode = calend_mem2.isHijriMode();
    dateend_mem1.setAttribute("value", calend_mem1.getDate().getDateString());
    dateend_mem2.setAttribute("value", calend_mem2.getDate().getDateString());
    document.getElementById('cal-start-4').appendChild(calend_mem1.getElement());
    document.getElementById('cal-start-5').appendChild(calend_mem2.getElement());
    calend_mem1.show();
    calend_mem2.show();
    setDateFieldsend1();
    calend_mem1.callback = function () {
        if (calend1Mode !== calend_mem1.isHijriMode()) {
            calend_mem2.disableCallback(true);
            calend_mem2.changeDateMode();
            calend_mem2.disableCallback(false);
            calend_mem1Mode = calend_mem1.isHijriMode();
            calend_mem2Mode = calend_mem2.isHijriMode();
        } else
            calend_mem2.setTime(calend_mem1.getTime());
        setDateFieldsend_mem1();
    };
    calend_mem2.callback = function () {
        if (calend_mem2Mode !== calend_mem2.isHijriMode()) {
            calend_mem1.disableCallback(true);
            calend_mem1.changeDateMode();
            calend_mem1.disableCallback(false);
            calend_mem1Mode = calend_mem1.isHijriMode();
            calend_mem2Mode = calend_mem2.isHijriMode();
        } else
            calend_mem1.setTime(calend_mem2.getTime());
        setDateFieldsend_mem1();
    };
    calend_mem1.onHide = function () {
        calend_mem1.show(); // prevent the widget from being closed
    };
    calend_mem2.onHide = function () {
        calend_mem2.show(); // prevent the widget from being closed
    };

    function setDateFieldsend_mem1() {
        // datestart1.value = calstart1.getDate().getDateString();
        // datestart2.value = calstart2.getDate().getDateString();
        if (loop1_mem == 0) {
            <?php  if (isset($one_data) && !empty($one_data) && $one_data != null) {
            ?>
            ++loop1_mem;
            dateend_mem1.value = '<?php echo $one_data->end_date_m ?>';
            dateend_mem2.value = '<?php echo $one_data->end_date_h?>';
            <?php
            }else{ ?>
            dateend_mem1.value = calend_mem1.getDate().getDateString();
            dateend_mem2.value = calend_mem2.getDate().getDateString();
            <?php  }  ?>
        } else {
            dateend_mem1.value = calend_mem1.getDate().getDateString();
            dateend_mem2.value = calend_mem2.getDate().getDateString();
        }
        /* dateend_mem1.value = calend_mem1.getDate().getDateString();
         dateend_mem2.value = calend_mem2.getDate().getDateString();
         */
    }

    function showCalend3() {
        if (calend_mem1.isHidden())
            calend_mem1.show();
        else
            calend_mem1.hide();
    }

    function showCalend4() {
        if (calend_mem2.isHidden())
            calend_mem2.show();
        else
            calend_mem2.hide();
    }

</script>

<script>
    function get_status(obj) {
        $('#status_title').val($('option:selected', obj).text());
        if (parseInt(obj.value) == 2) {
            $('#reason_div').show('slow');
            $('#end_date_div').show('slow');
            $('#reason_morfaq').show('slow');
        } else {
            $('#reason_div').hide('slow');
            $('#end_date_div').hide('slow');
            $('#reason_morfaq').hide('slow');

        }
    }
</script>


<script>


    function get_data_emp2(obj) {

        $('#mem_id').val(obj);
        $('#no3_odwia_title').val($('#choosed' + obj).attr('data-odwia'));
        $('#card_num').val($('#choosed' + obj).attr('data-card-num'));
        $('#age').val($('#choosed' + obj).attr('data-age'));
        $('#jwal').val($('#choosed' + obj).attr('data-jwal'));
        $('#birth_date_m').val($('#choosed' + obj).attr('data-birth-date-m'));
        $('#birth_date_h').val($('#choosed' + obj).attr('data-birth-date-h'));
        $('#rkm_odwia_full').val($('#choosed' + obj).attr('data-rkm_odwia_full'));
        $('#rkm_odwia').val($('#choosed' + obj).attr('data-rkm_odwia'));
        $('#card_num_slide').text($('#choosed' + obj).attr('data-card-num'));
        $('#num_odwia').text($('#choosed' + obj).attr('data-rkm_odwia'));
        $('#mob').text($('#choosed' + obj).attr('data-jwal'));
        $('#no3_odwia_fk').val($('#choosed' + obj).attr('data-no3_odwia_fk'));
        $('#mem_name').val($('#choosed' + obj).attr('data-name'));
        $('#mem_name_slid').text($('#choosed' + obj).attr('data-name'));
        get_sidebar_data();
        $("#myModalInfo .close").click();
    }


</script>

<!--
<script>
    var start_time = 1;

    function change_time(td_el, arr) {
        var time_s = [' م ', ' هـ '];

        $(td_el).fadeOut(500, function () {
            $(this).text(time_s[start_time] + arr[start_time]).fadeIn(500);
        });
        start_time = 1 - start_time;
    }
</script>
-->


<script>

    var start_time = 1;

    function change_time(td_el, arr) {
        var time_s = ['هـ', ' م '];

        $(td_el).fadeOut(500, function () {
            $(this).text(arr[start_time] + time_s[start_time]).fadeIn(500);
        });
        start_time = 1 - start_time;
    }

</script>
<script>
    function check_mansep(select_id, input_id) {
        var mansep = $('#' + select_id).val();
        var magles_code = $('#' + input_id).val();
        if (magles_code != '') {
            if (mansep != 4) {
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>md/all_magls_edara_members/All_magls_edara_members/check_mansep',
                    data: {mansep: mansep, magles_code: magles_code},
                    cache: false,
                    success: function (json_data) {


                        var JSONObject = JSON.parse(json_data);
                        console.log(JSONObject);
                        if (JSONObject != 0) {
                            swal({
                                title: "تم إختيار هذا المنصب من قبل .",
                                text: "لا يسمح باكثر من واحد لهذا المنصب .",
                                type: "info",
                                confirmButtonText: "تم",
                                closeOnConfirm: true
                            });
                            // $('#' + select_id).val();
                            // $(".ct option[value='X']").remove();
                            $('option:selected', $('#' + select_id)).remove()
                        }
                    }
                });
            }
        } else {
            swal({
                title: "من فضلك اختر مجلس اولاً.",
                type: "warning",
                confirmButtonText: "تم",
                closeOnConfirm: true
            });
            $('#' + select_id).val('');


        }
    }
</script>

<!-- new -->
<script>
  /*  function add_geha(value) {

        $('#div_update').hide();
        $('#div_add').show();
        //  alert(value);


        if (value != 0 && value != '') {
            var dataString = 'reason=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_reason',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {

                    //  $('#reason').val(' ');
                    $('#odwia_status_reason').val(value);
                    $('#Modal_family').modal('hide');
                }
            });
        }

    }
*/
    function add_geha(value) {

        $('#div_update').hide();
        $('#div_add').show();
        //  alert(value);

       
        if (value != 0 && value != '' ) {
            var dataString = 'reason=' + value ;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_reason',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {

                  //  $('#reason').val(' ');
                  $('#reason').val('');
                  $('#Modal_family').modal('hide');
                    swal({
                        title: "تم الحفظ بنجاح!",
  
  
        }
        );
                }
            });
        }

    }


</script>

<script>
    function getTitle(value) {


        $('#odwia_status_reason').val(value);


        $('#Modal_family').modal('hide');
    }
</script>


<script>
    function update_reason(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add').hide();
        $('#div_update').show();


        $.ajax({
            url: "<?php echo base_url() ?>md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/getById",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                $('#reason').val(obj.reason);
               console.log(obj.reason);


            }

        });

        $('#update').on('click', function () {
            var reason = $('#reason').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/update_reason",
                type: "Post",
                dataType: "html",
                data: {reason: reason,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#reason').val('');
                    $('#Modal_family').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
                    

                }

            });

        });

    }

   /* function update_reason(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add').hide();
        $('#div_update').show();


        $.ajax({
            url: "<?php echo base_url() ?>md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/getById",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                $('#reason').val(obj.reason);
                console.log(obj.reason);


            }

        });

        $('#update').on('click', function () {
            var reason = $('#reason').val();


            $.ajax({
                url: "<?php echo base_url() ?>md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/update_reason",
                type: "Post",
                dataType: "html",
                data: {reason: reason, id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#reason').val(' ');


                    $('#Modal_family').modal('hide');

                }

            });

        });

    }
*/
</script>
<script>
   /* function delte_geha(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/delete_reason',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#Modal_family').modal('hide');

                }
            });
        }

    }*/
    
        function delte_geha(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/delete_reason',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#reason').val('');
                    $('#Modal_family').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );

                }
            });
        }

    }
</script>

<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_magls_edara_members/All_magls_edara_members/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#magles_details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#magles_details').html(d);

            }

        });
    }
</script>

<script>
    function get_details_reason() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_magls_edara_members/All_magls_edara_members/load_reason",
            
            beforeSend: function () {
                $('#myDiv_geha').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_geha').html(d);

            }

        });
    }
</script>