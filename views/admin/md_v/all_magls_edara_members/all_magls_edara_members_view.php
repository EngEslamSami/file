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
    <div class="col-sm-8">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
            <div class="panel-body" style="min-height: 371px;">
                <?php
                $membership_jobtitle_arr = array(1 => 'رئيس مجلس الإدارة', 2 => 'نائب رئيس مجلس الإدارة', 3 => 'أمين الصندوق', 4 => 'عضو');
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

                    $status = $one_data->status;
                    $status_title = $one_data->status_title;
                    $reason = $one_data->reason;
                    $reason_display = 'block';
                    $date_display = 'block';
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
                    $reason_display = 'none';
                    $date_display = 'none';

//                    7-3-om
                    $option = '<option value="">-اختر-</option>';

                }
                ?>
                <div class="col-sm-12">
                    <div class="form-group col-sm-2 col-xs-12 padding-4" style="">
                        <label class="label "> كود المجلس </label>
                        <select name="mgls_code" class="form-control  "
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
                        <input type="hidden" id="mgls_id" name="mgls_id_fk" value="<?=$mgls_id?>">
                    </div>

                    <div class="form-group col-sm-2 col-xs-12 padding-4">
                        <label class="label  "> رقم العضوية <strong></strong> </label>
                        <input type="text" readonly class="form-control   "
                               value="<?= $rkm_odwia ?>" name="rkm_odwia" id="rkm_odwia"/>
                        <input type="hidden" value="<?= $rkm_odwia_full ?>" name="rkm_odwia_full" id="rkm_odwia_full">

                    </div>
                   
                   <!--
                    <div class="form-group col-sm-5 col-xs-12 padding-4">
                        <label class="label  ">إسم العضو </label>
                        <select name="mem_id_fk" class="form-control    selectpicker"
                                onchange=" get_data_emp(this);" data-show-subtext="true" data-live-search="true"
                                data-validation="required" aria-required="true">
                            <?php
                            echo $option;
                            if (isset($all_members) && !empty($all_members)) {
                                foreach ($all_members as $member) { ?>
                                    <option data-odwia="<?php echo $member->no3_odwia_title ?>"
                                            data-card-num="<?php echo $member->card_num ?>"
                                            data-birth-date-m="<?php echo $member->birth_date_m ?>"
                                            data-birth-date-h="<?php echo $member->birth_date_h ?>"
                                            data-jwal="<?php echo $member->jwal ?>"
                                            data-age="<?php echo $member->age ?>"
                                            data-rkm_odwia_full="<?php echo $member->rkm_odwia_full ?>"
                                            data-rkm_odwia="<?php echo $member->rkm_odwia ?>"
                                            data-no3_odwia_fk="<?php echo $member->no3_odwia_fk ?>"
                                            value="<?php echo $member->id ?>" <?php if ($member->id == $mem_id) echo 'selected'; ?>><?php echo $member->name ?> </option>
                                <?php }
                            }; ?>
                        </select>
                        <input type="hidden" name="mem_name" id="mem_name" value="<?= $mem_name ?>">
                    </div> -->
                    
<div class="form-group col-sm-5 col-xs-12">
                        <label class="label  ">إسم العضو </label>
                        <input    style="width:86%; float: right;" type="text" name="mem_name" id="mem_name" class="form-control input_style_2 list "
                                 value="<?= $mem_name ?>"     data-validation-has-keyup-event="true"   />
                        <button type="button"   data-toggle="modal" data-target="#myModalInfo" class="btn btn-success btn-next" style="float: left;">
                            <i class="fa fa-plus"></i>  </button>

                        <!--<input type="hidden" name="mem_name" id="mem_name" value="<?= $mem_name ?>">-->
                    </div>
			                    
 					<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل العضو</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered example"  >
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
                        $s=1;
                        foreach ($all_members as $member) { ?>
                            <td><input type="radio" name="choosed" id="choosed<?php echo $member->id; ?>"
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
                                       ondblclick=" get_data_emp2(<?php echo $member->id; ?>);"  /></td>
                            <td><?php echo $s ?></td>
                            <td><?php echo $member->rkm_odwia_full ?></td>
                            <td><?php echo $member->name ?></td>
                            <td><?php echo $member->jwal ?></td>
                        <?php $s++; }
                    }; ?>


                    </tbody>
                </table>
            </div>
            <div class="modal-footer"  style="display: inline-block;width: 100%" >
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق</button>
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
                    <div class="form-group col-sm-4 col-xs-12 padding-4">
                        <label class="label    ">منصب العضو</label>
                        <select name="mansp_fk" id="job_title_id_fk" class="form-control"
                                onchange=" $('#mansep_title').val($('option:selected', this).text());"
                                data-show-subtext="true" data-live-search="true" data-validation="required"
                                aria-required="true">
                            <option value=""> - اختر -</option>
                            <?php foreach ($membership_jobtitle_arr as $key => $value): ?>
                                <option value="<?php echo $key ?>" <?php if ($key == $mansp_id) echo 'selected'; ?> ><?php echo $value ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="mansp_title" id="mansep_title" value="<?= $mansp_title ?>">
                    </div>
<!--
                    <div class="form-group col-sm-2 col-xs-12 padding-4">
                        <label class="label    "> رقم الهوية <strong></strong> </label>
                        <input type="text" readonly id="card_num" class="form-control" value="<?= $card_num ?>"
                               name="card_num"/>
                        <span id="num_span" class="span-validation" style="color: rgb(255, 0, 0);"></span>
                    </div>
                    -->
                    <!--
                    <div class="form-group col-sm-4 col-xs-12 padding-4">
                        <label class="label    ">العمر </label>
                        <input type="text" name="age" id="age" value="<?= $age ?>"
                               class="form-control " readonly>

                    </div>-->
                     <!--
                    <div class="form-group col-sm-2 col-xs-12 padding-4">
                        <label class="label    "> رقم الجوال <strong></strong> </label>
                        <input type="text" readonly id="jwal" class="form-control "
                               value="<?= $jwal ?>"
                               name="jwal"/>
                        <span id="mob_span" class="span-validation" style="color: rgb(255, 0, 0);"></span>
                    </div>
-->


<!--
                    <div class="form-group col-md-2 col-xs-12 padding-4">
                        <label class="label">تاريخ الميلاد هـ </label>
                        <div>
                            <input id="birth_date_h" name="birth_date_h" class="form-control   "
                                   type="text"
                                   value="<?= $birth_date_h ?>" readonly
                            />

                        </div>
                    </div>
                    <div class="form-group col-md-2 col-xs-12 padding-4">
                        <label class="label">تاريخ الميلاد م</label>
                        <div>
                            <input id="birth_date_m" name="birth_date_m" class="form-control   "
                                   type="text" value="<?= $birth_date_m ?>" readonly/>
                        </div>
                    </div>
-->

                    <div class="form-group col-md-2 col-xs-12 padding-4">
                        <label class="label">تاريخ التعيين هجري </label>
                        <div id="cal-start-2">
                            <input id="ta3en_date_h" name="ta3en_date_h" class="form-control  "
                                   type="text" onfocus="showCalstart2();"
                                   value=""/>

                        </div>
                    </div>
                    <div class="form-group col-md-2 col-xs-12 padding-4">
                        <label class="label">تاريخ تعيين ميلادي</label>
                        <div id="cal-start-1">
                            <input id="ta3en_date_m" name="ta3en_date_m" class="form-control   "
                                   type="text" value="" onfocus="showCalstart1();"
                            />
                        </div>

                    </div>

                    <div class="form-group col-md-2 col-xs-12 padding-4">
                        <label class="label">تاريخ انتهاء هجري </label>
                        <div id="cal-start-3">
                            <input id="end_date_h" name="end_date_h" class="form-control   "
                                   type="text" onfocus="showCalend2();"
                                   value=""/>
                        </div>
                    </div>
                    <div class="form-group col-md-2 col-xs-12 padding-4">
                        <label class="label">تاريخ انتهاء ميلادى</label>
                        <div id="cal-start-4">
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

                    <div class="form-group col-sm-5 col-xs-12 padding-4" id="reason" style="display: <?=$reason_display?>">
                        <label class="label    "> السبب <strong></strong> </label>
                        <input type="text"   class="form-control" value="<?= $reason ?>"
                               name="reason"/>
                    </div>

                    <div class="form-group col-md-2 col-xs-12 padding-4" id="end_date_div_h" style="display: <?=$date_display?>">
                        <label class="label">تاريخ انتهاء عضوية هـ </label>
                        <div id="cal-start-5">
                            <input id="end_date_mem_h" name="end_date_mem_h" class="form-control  "
                                   type="text" onfocus="showCalend3();"
                                   value=""/>
                        </div>
                    </div>
                    <div class="form-group col-md-2 col-xs-12 padding-4" id="end_date_div_m" style="display: <?=$date_display?>">
                        <label class="label">تاريخ انتهاء عضوية م</label>
                        <div id="cal-start-6">
                            <input id="end_date_mem_m" name="end_date_mem_m" class="form-control  "
                                   type="text" value="" onfocus="showCalend4();"
                            />
                        </div>
                    </div>


                </div>
                <div class="col-sm-12 text-center">
                <br /><br />  
                    <button type="submit" class="btn-success btn-labeled btn" name="btn" value="1">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <div class="col-sm-4 no-padding">
        <div class=" panel panel-bd lobipanel-noaction  ">
            <div class="panel-heading">
                <h3 class="panel-title">البيانات الأساسية</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12 no-padding">
                    <div class="user-widget list-group">
                        <div class="list-group-item heading">
                            <?php
                            $user_img = "";
                            if (isset($result->img) && !empty($result->img)) {
                                $user_img = $result->img;
                            } ?>
                            <img style="width: 100px;" id="blah" class="media-object center-block"
                                 src="<?= base_url() ?>/uploads/images/<?php echo $user_img ?>"
                                 onerror="this.src='<?php echo base_url() ?>/asisst/fav/apple-icon-120x120.png'"
                                 alt="لا يوجد صورة">
                            <div class="clearfix"></div>
                        </div>
                        <table class="table-bordered table table-pro" style="table-layout: fixed;">
                            <tbody>
                            <tr>
                                <th><strong class="text-danger "> إسم العضو </strong></th>
                                <td id="mem_name_slid"><?= $mem_name ?></td>
                            </tr>


                            <tr>
                                <th><strong class="text-danger ">رقم العضوية </strong></th>
                                <td id="num_odwia"><?= $rkm_odwia ?></td>
                            </tr>

                            <tr>
                                <th><strong class="text-danger ">رقم الجوال</strong></th>
                                <td id="mob"> <?= $jwal ?></td>
                            </tr>

                            <tr>
                                <th><strong class="text-danger ">رقم الهوية</strong></th>
                                <td id="card_num_slide"><?= $card_num ?> </td>
                            </tr>

                            <tr>
                                <th><strong class="text-danger ">رقم قرار المجلس</strong></th>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (isset($all_data) && $all_data != null) { ?>
    <div class="col-sm-12  ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات أعضاء المجالس</h3>
            </div>
            <div class="panel-body">

                <div class="col-xs-12">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center">كود المجلس</th>
                                    <th class="text-center">رقم العضو</th>
                                    <th class="text-center">اسم العضو</th>
                                    <th class="text-center">منصب العضو</th>
                                     
                                    
                                     <th class="text-center">تاريخ التعيين</th>
                                      <th class="text-center">تاريخ الانتهاء</th>
                                       <th class="text-center">حالة العضوية بالمجلس </th>
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
                                        <td><?php echo $record->rkm_odwia ?> </td>
                                        <td><?php echo $record->mem_name ?> </td>
                                        <td><?php echo $record->mansp_title ?> </td>
                                      
                                              <td><?=  $record->ta3en_date_h .' هـ '.
                                                  ' <i class="fa fa-arrows-h" aria-hidden="true"></i> '
                                                 .$record->ta3en_date_m .' م ' ?></td>
                                        
                                       <td><?=  $record->end_date_h .' هـ '.
                                                  ' <i class="fa fa-arrows-h" aria-hidden="true"></i> '
                                                 .$record->end_date_m .' م ' ?></td>
                                                   <td>سارية</td>
                                                 
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
            $('#reason').show('slow');
            $('#end_date_div_h').show('slow');
            $('#end_date_div_m').show('slow');
        }else {
            $('#reason').hide('slow');
            $('#end_date_div_h').hide('slow');
            $('#end_date_div_m').hide('slow');

        }
    }
</script>



<script>


    function get_data_emp2(obj) {

        $('#no3_odwia_title').val($('#choosed' + obj).attr('data-odwia'));
        $('#card_num').val($('#choosed' + obj).attr('data-card-num'));
        $('#age').val($('#choosed' + obj).attr('data-age'));
        $('#jwal').val($('#choosed' + obj).attr('data-jwal'));
        $('#birth_date_m').val($('#choosed' + obj).attr('data-birth-date-m'));
        $('#birth_date_h').val($('#choosed' + obj).attr('data-birth-date-h'));
        $('#rkm_odwia_full').val($('#choosed' + obj).attr('data-rkm_odwia_full'));
        $('#rkm_odwia').val($('#choosed' +obj).attr('data-rkm_odwia'));
        $('#card_num_slide').text($('#choosed' +obj).attr('data-card-num'));
        $('#num_odwia').text($('#choosed' + obj).attr('data-rkm_odwia'));
        $('#mob').text($('#choosed' + obj).attr('data-jwal'));
        $('#no3_odwia_fk').val($('#choosed' +obj).attr('data-no3_odwia_fk'));
        $('#mem_name').val($('#choosed' + obj).attr('data-name'));
        $('#mem_name_slid').text($('#choosed' + obj).attr('data-name'));
        $("#myModalInfo .close").click();
    }



</script>