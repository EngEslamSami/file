<style type="text/css">

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


            <div class="col-md-12 no-padding">
                <div class="col-md-1 col-sm-1 col-xs-2 no-padding aside-tabs">
                    <!-- Nav tabs -->
                    <div class="speed-links">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#screen-tab1" aria-controls="screen-tab1" role="tab" data-toggle="tab"><i class="fa fa-plus"></i><p style="float: left;"> إضافة فاتورة جديدة </p></a></li>
                            <li role="presentation"><a href="#screen-tab2" aria-controls="screen-tab2" role="tab" data-toggle="tab"><i class="fa fa-list"></i><p style="float: left;"> قائمة الفواتير </p></a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-11 col-sm-11 no-padding data-screen">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="screen-tab1">
                            <div class="roundedBox">
                                <?php
                                if (isset($result) && !empty($result)) {
                                    $fatora_esdar_date =$result->fatora_esdar_date;
                                    $geha_name = $result->geha_name;
                                    $moshtrk_name = $result->moshtrk_name;
                                    $moshtrk_num = $result->moshtrk_num;
                                    $rkm_adad = $result->rkm_adad;
                                    
                                    $mrakz_tklfa_id_fk = $result->mrakz_tklfa_id_fk;
                                    $rkm_hesab = $result->rkm_hesab;
                                    $hesab_name = $result->hesab_name;
                                    $alert_time = $result->alert_time;
                                    $halet_eshtrak = $result->halet_eshtrak;
                                    $button1 = 'display:none';
                                    $button2 = '';
                                    $form_action = 'finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/update/'.$result->id;
                                } else {
                                    $fatora_esdar_date =date('Y-m-d');
                                    $geha_name = '';
                                    $moshtrk_name = '';
                                    $moshtrk_num = '';
                                    $rkm_adad= '';
                                    $mrakz_tklfa_id_fk = '';
                                    $rkm_hesab = '';
                                    $hesab_name = '';
                                    $alert_time = '';
                                    $halet_eshtrak = '';
                                    $button2 = 'display:none';
                                    $button1 = '';
                                    $form_action = 'finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/insert';
                                }
                                ?>
                                <?php
                                echo form_open_multipart($form_action, array('id' => 'myform'));

                                ?>
                                <div class="col-sm-12 no-padding">
                                    <div class="col-sm-3  col-md-3 padding-4  form-group">
                                        <label class="label ">الجهة </label>
                                        <input type="text" name="geha_name" id="geha_name" readonly value="<?php echo $geha_name; ?>"
                                               class="form-control " style="width: 87%;float: right">
                                        <button type="button" data-toggle="modal"
                                                data-target="#myModalInfo" class="btn btn-success btn-next"
                                                style="float: left;">
                                            <i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="col-sm-3  col-md-3 padding-4  form-group">
                                        <label class="label ">إسم المشترك </label>
                                        <input type="text" name="moshtrk_name" id="moshtrk_name" readonly value="<?php echo $moshtrk_name; ?>"
                                               class="form-control " style="width: 87%;float: right">
                                        <button type="button" data-toggle="modal"
                                                data-target="#myModalsubscription" class="btn btn-success btn-next"
                                                style="float: left;">
                                            <i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="col-sm-3  col-md-2 padding-4  form-group">
                                        <label class="label ">رقم المشترك/رقم الحساب </label>
                                        <input type="text" name="moshtrk_num" id="moshtrk_num"  onkeypress="validate_number(event)"  value="<?php echo $moshtrk_num; ?>"
                                               class="form-control " >

                                    </div>
                                    
                                     <div class="col-sm-3  col-md-2 padding-4  form-group">
                                        <label class="label ">رقم الخدمة/العداد </label>
                                        <input type="text" name="rkm_adad" id="rkm_adad"  onkeypress="validate_number(event)"  value="<?php echo $rkm_adad; ?>"
                                               class="form-control " >

                                    </div>
                                    <div class="col-sm-3  col-md-2 padding-4  form-group">
                                        <label class="label ">تاريخ إصدار الفاتورة </label>
                                        <input type="date" name="fatora_esdar_date" id="fatora_esdar_date"     value="<?php echo $fatora_esdar_date; ?>"
                                               class="form-control " >

                                    </div>
                                    
                               
                                </div>

                                <div class="col-sm-12 no-padding">
                                
                                     <div class="col-sm-3  col-md-2 padding-4  form-group">
                                        <label class="label ">موعد التنبيه</label>
                                        <?php $alert_arr =array(1=>'يوم',2=>'أسبوع',3=>'أسبوعين',4=>'شهر'); ?>
                                        <select class="form-control" name="alert_time" id="alert_time">
                                            <option value="">إختر</option>
                                            <?php  foreach ($alert_arr as $key=>$value){?>
                                                <option value="<?php echo$key;?>"
                                                    <?php if(!empty($alert_time)){ if($alert_time == $key){ echo'selected'; } }?>

                                                ><?php echo$value;?></option>
                                            <?php  }?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3  col-md-3 padding-4  form-group">
                                        <label class="label ">مركز التكلفة </label>

                                        <select class="form-control" name="mrakz_tklfa" id="mrakz_tklfa">
                                            <option value="">إختر</option>
                                            <?php if(!empty($mrakz_tklfa_arr)){  foreach ($mrakz_tklfa_arr as $row){?>
                                                <option value="<?php echo$row->id_setting;?>"
                                                    <?php if(!empty($mrakz_tklfa_id_fk)){ if($mrakz_tklfa_id_fk == $row->id_setting){ echo'selected'; } }?>
                                                ><?php echo$row->title_setting;?></option>
                                            <?php }  }?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3  col-md-2 padding-4  form-group">
                                        <label class="label ">رقم الحساب </label>
                                        <input type="text" class="form-control  " name="rkm_hesab"
                                               id="account_num" data-validation="required" aria-required="true"
                                               onclick="$(this).removeAttr('readonly');"
                                               ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');"
                                               style="cursor:pointer;" autocomplete="off"
                                               onkeypress="return isNumberKey(event);"
                                               onblur="$(this).attr('readonly','readonly')"
                                               onkeyup="getAccountName($(this).val());" value="<?php echo $rkm_hesab;?>">
                                    </div>
                                    <div class="col-sm-4  col-md-4 padding-4  form-group">
                                        <label class="label ">إسم الحساب </label>
                                        <input type="text" class="form-control " name="hesab_name"
                                               id="account" data-validation="required"
                                               aria-required="true" readonly="" value="<?php echo $hesab_name;?>"
                                               style="width: 100% !important;">
                                    </div>
                                    <div class="col-sm-3  col-md-1 padding-4  form-group">
                                        <label class="label ">حالة الإشتراك</label>
                                        <?php $sub_arr =array(1=>'مفعل',2=>'غير مفعل'); ?>
                                        <select class="form-control" name="halet_eshtrak" id="halet_eshtrak">
                                            <option value="">إختر</option>
                                            <?php  foreach ($sub_arr as $key=>$value){?>
                                                <option value="<?php echo$key;?>"
                                                    <?php if(!empty($halet_eshtrak)){ if($halet_eshtrak == $key){ echo'selected'; } }?>
                                                ><?php echo$value;?></option>
                                            <?php  }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <button type="submit" style="<?php echo $button1; ?>"
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


                                    <button type="button" class="btn btn-labeled btn-info" data-toggle="modal" data-target="#searchModal">
                                        <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>البحث
                                    </button>
                                </div>
                                <?php echo form_close() ?>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="screen-tab2">
                            <?php

                            if (!empty($records)) {
                                ?>
                                <table id="" class="table table-bordered example" role="table">
                                    <thead>
                                    <tr class="info">
                                        <th width="2%">م</th>
                                        <th class="text-left">إسم الجهة</th>
                                        <th class="text-left">إسم المشترك</th>
                                        <th class="text-left">رقم المشترك/رقم الحساب</th>
                                        <th class="text-left"> مركز التكلفة</th>
                                        <th class="text-left">رقم الحساب</th>
                                        <th class="text-left">إسم الحساب</th>
                                        <th class="text-left">تاريخ الفاتورة</th>
                                        <th class="text-left">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $x = 1;
                                    foreach ($records as $value) {

                                        ?>
                                        <tr>
                                            <td><?php echo $x++ ?></td>
                                            <td><?php echo $value->geha_name ?></td>
                                            <td><?php echo $value->moshtrk_name ?></td>
                                            <td><?php echo $value->moshtrk_num ?></td>
                                            <td><?php echo $value->mrakz_tklfa_title ?></td>
                                            <td><?php echo $value->rkm_hesab ?></td>
                                            <td><?php echo $value->hesab_name ?></td>
                                            <td><?php echo $value->date_ar ?></td>

                                            <td>
                                                <a title="إضافة المرفقات" data-toggle="modal"
                                                   data-target="#myModal_attach"
                                                   onclick="OpenAttach(<?php echo $value->id; ?>)">
                                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                                </a>

                                                <a href="<?php echo base_url() . "finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/update_fatora/" . $value->id ?>"
                                                   title="تعديل"><i class="fa fa-pencil"></i></a>

                                                <a onclick="Delete_me(<?php echo $value->id; ?>)"
                                                   title="حذف"><i
                                                            class="fa fa-trash"></i></a>

                                            </td>
                                        </tr>
                                        <?php
                                    }

                                    ?>
                                    </tbody>
                                </table>


                            <?php } else { ?>
                                <div style="color: red; font-size: large;" class="col-sm-12">لا توجد خدمات مساندة جديدة
                                    !!
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>





<!------ modals --------------------------------------------->

<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الجهة</h4>
            </div>
            <div class="modal-body">

                <div class="col-sm-12 form-group">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-3  col-md-3 padding-4 ">
                            <button type="button" class="btn btn-labeled btn-success " onclick="$('#geha_input').show(); show_add()"
                                    style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة جهة
                            </button>

                        </div>
                    </div>
                    <div class="col-sm-12 no-padding form-group">

                        <div id="geha_input" style="display: none">
                            <div class="col-sm-3  col-md-5 padding-2 ">
                                <label class="label label-green  ">إسم الجهة </label>
                                <input type="text" name="geha_title" id="geha_title"
                                       value=""
                                       class="form-control input-style">
                                <input type="hidden" class="form-control" id="s_id" value="">
                            </div>
                            <div class="col-sm-3  col-md-2 padding-4 ">
                                <label class="label label-green  ">رقم الجوال </label>
                                <input type="text" name="mob" id="mob" onkeypress="validate_number(event)"

                                       class="form-control input-style">
                            </div>
                            <div class="col-sm-3  col-md-3  ">
                                <label class="label label-green  ">العنوان </label>
                                <input type="text" name="address" id="address"
                                       value=""
                                       class="form-control input-style">
                            </div>


                            <div class="col-sm-3  col-md-2 padding-4" id="div_add" style="display: none;">
                                <button type="button" onclick="add_geha($('#geha_title').val())" style="    margin-top: 27px;"
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
                <br>  <br>  <br>
                <div id="myDiv_geha"><br><br>
                    <?php if (!empty($geha_table)) { ?>
                        <table id="" class=" example table table-bordered table-striped" role="table">
                            <thead>
                            <tr class="greentd">
                                <th width="2%">#</th>
                                <th class="text-center">الجهة</th>
                                <th class="text-center">رقم الجوال</th>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x = 1;
                            foreach ($geha_table as $value) {
                                ?>
                                <tr>
                                    <td><input type="radio" name="radio" data-title="<?= $value->name ?>"
                                               id="radio" ondblclick="getTitle($(this).attr('data-title'))"></td>
                                    <td><?= $value->name ?></td>
                                    <td><?= $value->mob ?></td>
                                    <td><?= $value->address ?></td>
                                    <td>
                                        <a href="#" onclick="delte_geha(<?= $value->id?>);"> <i class="fa fa-trash"> </i></a>
                                        <a href="#" onclick="update_geha(<?= $value->id?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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

                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalsubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">المشتركين</h4>
            </div>
            <div class="modal-body">

                <div class="col-sm-12 form-group">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-3  col-md-3 padding-4 ">
                            <button type="button" class="btn btn-labeled btn-success " onclick="$('#subscriber_input').show(); show_add_subscription()"
                                    style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة مشترك
                            </button>

                        </div>
                    </div>
                    <div class="col-sm-12 no-padding form-group">

                        <div id="subscriber_input" style="display: none">
                            <div class="col-sm-3  col-md-5 padding-2 ">
                                <label class="label label-green  ">إسم المشترك </label>
                                <input type="text" name="person_title" id="person_title"
                                       class="form-control input-style">
                                <input type="hidden" class="form-control" id="person_id" value="">
                            </div>
                            <div class="col-sm-3  col-md-2 padding-4 ">
                                <label class="label label-green  ">رقم الجوال </label>
                                <input type="text" name="person_mob" id="person_mob" onkeypress="validate_number(event)"

                                       class="form-control input-style">
                            </div>
                            <div class="col-sm-3  col-md-3  ">
                                <label class="label label-green  ">العنوان </label>
                                <input type="text" name="person_address" id="person_address"

                                       class="form-control input-style">
                            </div>


                            <div class="col-sm-3  col-md-2 padding-4" id="div_add_sub" style="display: none;">
                                <button type="button" onclick="add_finance_moshtrken( )" style="    margin-top: 27px;"
                                        class="btn btn-labeled btn-success" name="save" value="save">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </div>
                            <div class="col-sm-3  col-md-3 padding-4" id="div_update_sub" style="display: none;">
                                <button type="button"
                                        class="btn btn-labeled btn-success " name="save" value="save" id="update_sub">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <br>  <br>  <br>
                <div id="myDiv_sub"><br><br>
                    <?php if (!empty($finance_moshtrken)) { ?>
                        <table id="" class=" example table table-bordered table-striped" role="table">
                            <thead>
                            <tr class="greentd">
                                <th width="2%">#</th>
                                <th class="text-center">المشترك</th>
                                <th class="text-center">رقم الجوال</th>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x = 1;
                            foreach ($finance_moshtrken as $value) {
                                ?>
                                <tr>
                                    <td><input type="radio" name="radio" data-title="<?= $value->name ?>"
                                               id="radio" ondblclick="getTitle_sub($(this).attr('data-title'))"></td>
                                    <td><?= $value->name ?></td>
                                    <td><?= $value->mob ?></td>
                                    <td><?= $value->address ?></td>
                                    <td>
                                        <a href="#" onclick="delte_finance_moshtrken(<?= $value->id?>);"> <i class="fa fa-trash"> </i></a>
                                        <a href="#" onclick="update_finance_moshtrken(<?= $value->id?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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

                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">الدليل المحاسبي </h4>
            </div>
            <div class="modal-body">
                <?php //if(!empty($tree)) {

                ?>
                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th style="font-size: 15px; width:88px !important; ">م</th>
                        <th style="font-size: 15px;" class="text-left">رقم الحساب</th>
                        <th style="font-size: 15px;" class="text-left">إسم الحساب</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($tree) && $tree != null) {
                        buildTreeTable($tree);
                    }
                    function buildTreeTable($tree, $count = 1)
                    {
                        $types = array(1 => 'رئيسي', 2 => 'فرعي');
                        $nature = array('', 'مدين', 'دائن');
                        $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
                        //   $colorArray = array(1=>'#FFB61E', 2=>'#3c990b', 3=>'#5b69bc', 4=>'#E5343D', 5=>'#d9edf7');
                        $colorArray = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');


                        foreach ($tree as $record) {
                            $onclick = "alert('ليس حساب فرعي');";
                            if ($record->hesab_no3 == 2) {
                                $onclick = "$('#account_num').val(" . $record->code . "); $('#account').val('" . $record->name . "'); $('#myModal').modal('hide');";
                            }
                            ?>
                            <tr style="background-color: <?= $colorArray[$record->level] ?>; cursor: pointer;"
                                onclick="<?= $onclick ?>">
                                <td class="forTd"><?= $count++ ?></td>
                                <td class="forTd"><?= $record->code ?></td>
                                <td class="forTd"><?= $record->name ?></td>
                            </tr>
                            <?php
                            if (isset($record->subs)) {
                                $count = buildTreeTable($record->subs, $count++);
                            }
                        }
                        return $count;
                    }

                    ?>
                    </tbody>
                </table>
                <?php // } ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal_attach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
            </div>
            <div class="modal-body">
                <div class="AttachTable">
                    <?php
                    echo form_open_multipart('finance_accounting/add_fatora/Add_fatora/add_morfaq', array('id' => 'formAttach'));
                    ?>
                    <div class="col-sm-12 form-group">
                        <input type="hidden" name="id" id="id">
                        <div class="col-sm-4  col-md-4 padding-4 ">
                            <label class="label">إسم المرفق</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   data-validation="required">
                        </div>
                        <div class="col-sm-4  col-md-4 padding-4 ">
                            <label class="label">المرفق</label>
                            <input type="file" name="file" id="myfile" class="form-control"
                                   data-validation="required">
                        </div>
                        <div class="col-sm-4  col-md-2 ">
                            <button type="button" onclick="saveFile()" style="margin-top: 28px;"
                                    class="btn btn-labeled btn-success "><span class="btn-label"><i
                                            class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                            </button>


                        </div>



                    </div>

                    <?php
                    echo form_close();
                    ?>

                    <table class="table table-striped table-bordered fixed-table mytable " id="resultTable">
                        <thead>
                        <tr class="info">

                            <th class="text-center"> إسم المرفق</th>
                            <th class="text-center">نوع المرفق</th>
                            <th class="text-center">القائم بالإضافة</th>
                            <th class="text-center">تاريخ الإضافة</th>
                            <th class="text-center"> الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class=" tbody" id="attachTable">
                        <tr><td colspan="5" style="text-align: center;color: red"> لا توجد مرفقات !!</td></tr>
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">

                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>


            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">صورة الملف</h4>
            </div>
            <div class="modal-body">
                <img  id="my_image" src="" width="50%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

        <!-------------------------------modals--------------------------->
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
    function show_add() {
        $('#div_update').hide();
        $('#div_add').show();

    }
</script>

<script>
    function getTitle_sub(value) {
        if(value !=''){
            $('#moshtrk_name').val(value);
            $('#moshtrk_name'). removeAttr('readonly');
            $('#myModalsubscription').modal('hide');
        }
    }
</script>

<script>
    function getTitle(value) {
        if(value !=''){
            $('#geha_name').val(value);
            $('#geha_name'). removeAttr('readonly');
            $('#myModalInfo').modal('hide');
        }
    }
</script>

<script>
    function show_add_subscription() {
        $('#div_update_sub').hide();
        $('#div_add_sub').show();

    }

    function add_finance_moshtrken() {
        $('#div_update_sub').hide();
        $('#div_add_sub').show();
        //  alert(value);

        var mob = $('#person_mob').val();
        var title = $('#person_title').val();
        var address = $('#person_address').val();
        if (title != 0 && title != '' && mob != ' ' && address != ' ') {

            var dataString = 'name=' + title + '&mob=' + mob + '&address=' + address;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/insert_finance_moshtrken_ajax',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#person_title').val(' ');
                    $('#person_address').val(' ');
                    $('#person_mob').val(' ');
                    $("#myDiv_sub").html(html);
                }
            });
        }else {
            alert(' من فضلك أدخل بيانات المشترك !!');
        }

    }

    function delte_finance_moshtrken(id) {
        var r =  confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/delete_subscription_members',
                data:{ id:id},
                dataType: 'html',
                cache:false,
                success: function(html){
                    //   alert(html);
                    $("#myDiv_sub").html(html);

                }
            });
        }

    }


    function update_finance_moshtrken(id) {
        var id = id;
        $('#subscriber_input').show();
        $('#div_add_sub').hide();
        $('#div_update_sub').show();


        $.ajax({
            url :"<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/getById_finance_moshtrken",
            type : "Post",
            dataType : "html",
            data: {id:id},
            success: function (data) {

                var obj = JSON.parse(data);
                $('#person_title').val(obj.name);
                $('#person_mob').val(obj.mob);
                $('#person_address').val(obj.address);
                $('#person_id').val(obj.id);


            }

        });

        $('#update_sub').on('click',function() {
            var title = $('#person_title').val();
            var address = $('#person_address').val();
            var mob = $('#person_mob').val();
            var person_id = $('#person_id').val();

            $.ajax({
                url :"<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/update_finance_moshtrken",
                type : "Post",
                dataType : "html",
                data: {name:title,address:address,mob:mob,id:person_id},
                success: function (html) {
                    //  alert('hh');
                    $('#person_title').val(' ');
                    $('#person_address').val(' ');
                    $('#person_mob').val(' ');
                    $("#myDiv_sub").html(html);
                    $('#subscriber_input').hide();

                }

            });

        });

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
            var dataString = 'title=' + value + '&mob=' + mob + '&address=' + address;

            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/insert_geha_ajax',
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
        }else {
            alert(' من فضلك أدخل بيانات الجهة !!');
        }

    }

</script>
<script>
    function delte_geha(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r =  confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/delete_geha',
                data:{ id:id},
                dataType: 'html',
                cache:false,
                success: function(html){
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
            url :"<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/getById",
            type : "Post",
            dataType : "html",
            data: {id:id},
            success: function (data) {

                var obj = JSON.parse(data);
                $('#geha_title').val(obj.name);
                $('#mob').val(obj.mob);
                $('#address').val(obj.address);
                $('#s_id').val(obj.id);


            }

        });

        $('#update').on('click',function() {
            var geha_title = $('#geha_title').val();
            var address = $('#address').val();
            var mob = $('#mob').val();
            var s_id = $('#s_id').val();

            $.ajax({
                url :"<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/update_geha",
                type : "Post",
                dataType : "html",
                data: {geha_title:geha_title,address:address,mob:mob,id:s_id},
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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>


    function Delete_me(valu) {

        Swal.fire({
            title: "هل تريد  حذف الخدمة!",
            text: "",
            type: 'warning',

            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "لا, إلغاء الأمر!",
            confirmButtonText: "نعم, قم بالحذف !",
        }).then((result) => {
            if (result.value) {

                window.location.href = "<?php echo base_url();?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/Delete/" + valu;

            }
        });
    }
</script>


<script>

    function OpenAttach(id) {

        if (id != 0 && id != '') {
            var dataString = 'id=' + id;


            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/loadFiles',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#attachTable").html(html);
                }
            });




            $('#id').val(id);
            // $('#formAttach').attr('action','finance_accounting/box/forms/transformation_accounts/Transformation_accounts/add_morfaq/'+ ProcessRkm);

        }
    }



</script>


<script>


    function saveFile() {
        var file_data = $('#myfile').prop('files')[0];
        var title = $('#title').val();
        if(title !='' && file_data !=''){



            var id = $('#id').val();
            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('title', title);
            form_data.append('id', id);
//alert(form_data);

            $.ajax({
                url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/saveFile',
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',

                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);
                    $('#title').val(' ');
                    $('#myfile').val(null);


                    var dataString3 = 'id=' + id;

                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/loadFiles',
                        data: dataString3,
                        dataType: 'html',
                        cache: false,
                        success: function (html) {
                            $("#attachTable").html(html);
                        }
                    });





                }
            });

        }else{
            alert('من فضلك تأكد من إدخال إسم المرفق والمرفق!!');
        }



    }

</script>