<style>
    .quart-label{
        width: 35%!important;
    }
    .quart-input{
        width: 65%!important;
    }
</style>

<?php
$this->load->model("familys_models/Register");
$data_load["basic_data_family"] = $basic_data_family;
$data_load["mother_num"] = $this->uri->segment(4);
$data_load["person_account"] = $basic_data_family["person_account"];
$data_load['FamilyOperationsPermissions'] = $this->Register->getFamilyOperationsPermissions()[0];
$data_load["agent_bank_account"] = $basic_data_family["agent_bank_account"];
$data_load["file_num"] = $basic_data_family["file_num"];
$this->load->view('admin/familys_views/drop_down_button', $data_load); ?>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $header_title ?>
        </h3>
    </div>
    <div class="panel-body">
        <?php if (empty($records)) { ?>
            <?php echo form_open_multipart('family_controllers/Family/add_responsible_account/' . $this->uri->segment(4) . ''); ?>
            <div class="col-md-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> رقم السجل المدني للأب <strong class="astric">*</strong>
                    </label>
                    <input type="number" class="form-control half input-style"
                           value="<?php if (!empty($father_national_card)) {
                               echo $father_national_card;
                           } ?>" readonly="readonly"/>
                </div>
                <div class="form-group col-sm-5 col-xs-12">
                    <label class="label label-green  half"> إسم الأب <strong class="astric">*</strong> </label>
                    <input type="text" class="form-control half input-style"
                           value="<?php if (!empty($father_name)) {
                               echo $father_name;
                           } ?>
                    " readonly="readonly"/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مسئول الحساب<strong
                            class="astric">*</strong><strong></strong>
                    </label>
                    <select name="person_id_fk" id="person_id_fk" data-validation="required" aria-required="true"
                            onchange="get_responsible($(this).val());" class="form-control half">
                        <option value=""> اختر</option>
                        <?php if (isset($name) && !empty($name)) { ?>
                            <option value="<?php echo $name->id . '-1'; ?>"
                                    style="color: red;"> <?php echo $name->full_name . '(الام)'; ?></option>
                        <?php } ?>
                        <?php
                        if (isset($f_members) && !empty($f_members)) {
                            $gender = array('1' => '(الابن)', '2' => '(الابنة)');
                            foreach ($f_members as $row) {
                                if (isset($gender[$row->member_gender])) {
                                    $gender_type = $gender[$row->member_gender];
                                } else {
                                    $gender_type = " ( غير محدد )";
                                } ?>
                                <option
                                    value="<?php echo $row->id . '-2'; ?>"> <?php echo $row->member_full_name . $gender_type ?></option>
                            <?php }
                        }
                        ?>
                        <option value="0">شخص اخر</option>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">اسم المسئول</label>
                    <input type="text" name="person_name" disabled="disabled" id="person_name"
                           data-validation="required"
                           value="" class="form-control half input-style"/>
                </div>
                <div class="form-group col-sm-4 col-xs-12 ">
                    <label class="label label-green  half">الصلة<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select name="person_relationship" id="person_relationship" data-validation="required"
                            aria-required="true" class=" no-padding form-control choose-date form-control half">
                        <option value="">إختر</option>
                        <?php if (!empty($relationships)) {
                            foreach ($relationships as $record) {
                                ?>
                                <option
                                    value="<?php echo $record->id_setting; ?>"><?php echo $record->title_setting; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">  <span class="pull-right" style="    background-color: #fff;
color: #008996;
padding: 0 6px;
border-radius: 7px;"> 10 ارقام فقط</span>رقم الهويه</label>
                    <input type="text" name="person_national_card" maxlength="10" onkeyup="check_len($(this).val());"
                           onkeypress="validate_number(event)" id="card_num" value="" data-validation="required"
                           class="form-control half input-style"/>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> <span class="pull-right" style="    background-color: #fff;
color: #008996;
padding: 0 6px;
border-radius: 7px;"> 10 ارقام فقط</span> رقم الجوال</label>
                    <input type="text" name="person_mob" maxlength="10" onkeypress="validate_number(event)"
                           onkeyup="check_len($(this).val());" id="mob" value="" data-validation="required"
                           class="form-control half input-style"/>
                </div>
                <div class="form-group col-sm-4 col-xs-12 ">
                    <label class="label label-green  half">إسم البنك<strong class="astric">*</strong><strong></strong>
                    </label>
                    <select name="bank_id_fk" id="m_account_id" class="form-control half " data-validation="required"
                            onchange="get_code2()" ;>
                        <?php $yes_no = array('لا', 'نعم'); ?>
                        <option value="">إختر</option>
                        <?php if (!empty($banks)) {
                            foreach ($banks as $bank) {
                                $select = '';
                                /* if($result['m_account_id']>0 &&  $result['m_account_id'] == $bank->id.'-'.$bank->bank_code){$select='selected';
                                 } */ ?>
                                <option value="<?php echo $bank->id; ?>-<?php echo $bank->bank_code; ?>"
                                    <?php echo $select; ?>><?php echo $bank->ar_name; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-12 ">
                <div class="form-group col-sm-4 col-xs-12 ">
                    <label class="label label-green  half">رمز البنك<strong class="astric">*</strong> </label>
                    <input type="text" class="form-control half input-style"
                           name="bank_code" readonly="readonly" id="ramz_code"/>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الحساب <strong class="astric">*</strong> </label>
                    <input type="text" class="form-control half input-style" maxlength="24" minlength="24"
                           value=""
                           name="bank_account_num" data-validation="required" id="hesab_bank_2"
                           onkeyup="length_hesab_om($(this).val());"
                    />
                    <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                </div>
                <div class="col-md-4">
                    <label class="label label-green  half">صوره الحساب<strong class="astric">*</strong> </label>
                    <input type="file" id="bank_image" data-validation="required" name="bank_image"
                           class="form-control half input-style" onchange="readURL(this);">
                </div>
                <div id="post_img" class="imgContent" style="min-height: 150px; padding: 15px;  ">
                    <img id="blah" style="width: 150px; float: left" src="">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <input type="submit" id="buttons" name="add" class="btn btn-blue btn-close" value="حفظ"/>
                </div>
            </div>
            <?php echo form_close() ?>
        <?php } else { ?>
            <div class="col-sm-12 btn btn-danger "> !! يسمح بإضافة حساب بنكي واحد نشط</div><br>
        <?php } ?>
        <?php
        if (isset($records) && !empty($records)) {
            ?>
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>م</th>
                    <th>اسم المسئول الحساب البنكي</th>
                    <th>رقم الهويه</th>
                    <th> رقم الجوال</th>
                    <th>اسم البنك</th>
                    <th>رمز البنك</th>
                    <th>رقم الحساب</th>
                    <th>صورة الحساب</th>
                    <th>حاله الحساب</th>
                    <th>الاجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $x = 1;
                if (isset($records) && !empty($records)) {
                    foreach ($records as $row) {
                        ?>
                        <?php if ($row->active == 0) {
                            $stat = "btn-danger";
                        } else {
                            $stat = "btn-success";
                        } ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $row->person; ?></td>
                            <td><?php echo $row->person_national_card; ?></td>
                            <td><?php echo $row->person_mob; ?></td>
                            <td><?php echo $row->bank_name; ?></td>
                            <td><?php echo $row->bank_code; ?></td>
                            <td> <?php echo $row->bank_account_num; ?> </td>
                            <?php if (!empty($row->bank_image)) {
                                $img_url = "uploads/images/" . $row->bank_image;
                            } else {
                                $img_url = "asisst/web_asset/img/logo.png";
                            } ?>
                            <td><a data-toggle="modal" type="button" style="cursor: pointer"
                                   data-target="#modal-img"
                                   onclick="$('#my_image').attr('src','<?php echo base_url() . $img_url ?>');">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <button class=" btn btn-success btn-sm " value="<?php echo $row->active; ?>">نشط</button>

                            </td>
                            <td>
                                <?php // if ($row->edit_status == 0) {
                                if ($row->edit_status == 1 || $row->edit_status == 2) {
                                    ?>
                                    <button data-toggle="modal"
                                            data-target="#modal-info<?= $row->id ?>"
                                            class="btn btn-sm btn-info"><i
                                            class="fa fa-list btn-info"></i>تعديل رقم الحساب
                                    </button>
                                    <button data-toggle="modal"
                                            data-target="#modal-transfer<?= $row->id ?>"
                                            class="btn btn-sm btn-success"><i
                                            class="fa fa-list btn-success"></i>تغيير الحساب البنكي
                                    </button>
                                <?php } else { ?>
                                <button type="button" class="btn btn-danger btn-sm">لايمكن التعديل علي رقم الحساب</button>
                                <?php } ?>
                                <?php if ($row->delete_status == 0) { ?>
                                    <a href="<?php echo base_url(); ?>family_controllers/Family/delete_from_table/<?php echo $row->id; ?>/<?php echo $row->family_national_num_fk; ?>"
                                       onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                <?php } else { ?>
                                    <button type="button" class="btn btn-danger btn-sm">لايمكن الحذف</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php
                        $x++;
                    }
                    /**************************************responsible_operations***********************************/
                    if (!empty($row->responsible_operations)) {
                        foreach ($row->responsible_operations as $record) {
                            ?>
                            <tr>
                                <td><?php echo $x++; ?></td>
                                <td><?php echo $record->person; ?></td>
                                <td><?php echo $record->past_bank_national_card; ?></td>
                                <td><?php echo $record->past_bank_mob; ?></td>
                                <td><?php echo $record->bank_name; ?></td>
                                <td><?php echo $record->bank_code; ?></td>
                                <td> <?php echo $record->past_bank_code; ?> </td>
                                <?php if (!empty($record->past_bank_image)) {
                                    $img = "uploads/images/" . $record->past_bank_image;
                                } else {
                                    $img = "asisst/web_asset/img/logo.png";
                                }
                                ?>
                                <td><a data-toggle="modal" type="button" style="cursor: pointer"
                                       data-target="#modal-img"
                                       onclick="$('#my_image').attr('src','<?php echo base_url() . $img ?>');">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                </td>
                                <td> <button type="button" class="btn btn-danger btn-sm">غير نشط </button> </td>
                                <td> <a href="<?php echo base_url('family_controllers/Family/print_eqrar') . '/' . $record->operation_id ?>"
                                        target="_blank">
                                        <i class="fa fa-print" aria-hidden="true"></i> </a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    /*****************************************responsible_operations********************************/
                }
                ?>
                </tbody>
            </table>
            <?php
        }
        ?>
    </div>
</div>
<!---------------------------------------------------modal-img--------------------------------------------->
<div class="modal fade" id="modal-img" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <img id="my_image" src="" width="100%" height="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" style="float: left"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($records) && !empty($records)) {
    foreach ($records as $row) {
        ?>
        <!--------------------------modal-transfer-------------------------------------------->
        <div class="modal" id="modal-transfer<?= $row->id ?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel"
             data-wow-duration="0.5s">
            <div class="modal-dialog" role="document" style="width: 90%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">بيانات مسئول الحساب البنكي الحالى</h4>
                    </div>
                    <?php echo form_open_multipart('family_controllers/Family/change_responsible_account/' . $this->uri->segment(4) . ''); ?>
                    <div class="modal-body ">
                        <div class="col-md-12">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label">مسئول الحساب<strong
                                        class="astric">*</strong><strong></strong> </label>
                                <select name="past_bank_id_fk" id="past_bank_id_fk"
                                        disabled aria-required="true"
                                        onchange="get_responsible_name_past($(this).val());"
                                        class="form-control half quart-input">
                                    <?php if (isset($name) && !empty($name)) { ?>
                                        <option
                                            value="<?php echo $name->id . '-1'; ?>"
                                            <?php if ($name->id == $row->person_id_fk && $row->type == 1) { ?> selected="" <?php } ?>
                                            style="color: red;"> <?php echo $name->full_name . '(الام)'; ?></option>
                                    <?php } ?>
                                    <?php if (isset($f_members) && !empty($f_members)) {
                                        foreach ($f_members as $row2) { ?>
                                            <option
                                                value="<?php echo $row2->id . '-2'; ?>" <?php if ($row2->id == $row->person_id_fk && $row->type == 2) { ?> selected="" <?php } ?> >
                                                <?php $mem_type = "";
                                                if ($row2->member_gender == 1) {
                                                    $mem_type = "(الابن)";
                                                } elseif ($row2->member_gender == 2) {
                                                    $mem_type = "(الابنه)";
                                                }
                                                echo $row2->member_full_name . $mem_type;
                                                ?></option>
                                        <?php }
                                    } ?>
                                    <option value="0-0" <?php if ($row->person_id_fk == 0) { ?> selected="" <?php } ?> >
                                        شخص اخر
                                    </option>
                                </select>
                                <input type="hidden" name="past_bank_id_fk"
                                       value="<?= $row->person_id_fk . '-' . $row->type; ?>">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label">اسم المسئول</label>
                                <input type="text" name="past_bank_name"
                                       id="past_bank_name" <?php if ($row->person_id_fk != 0) { ?> disabled="" <?php } ?>
                                       readonly value="<?php echo $row->person_name; ?>"
                                       class="form-control half input-style quart-input"/>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12 ">
                                <label class="label label-green  half quart-label">الصلة<strong
                                        class="astric">*</strong><strong></strong> </label>
                                <select name="past_bank_relationship" id="past_bank_relationship"
                                        disabled aria-required="true"
                                        class=" no-padding form-control choose-date form-control half quart-input">
                                    <option value="">إختر</option>
                                    <?php if (!empty($relationships)) {
                                        foreach ($relationships as $record) {
                                            ?>
                                            <option
                                                value="<?php echo $record->id_setting; ?>"
                                                <?php if ($record->id_setting == $row->person_relationship) { ?>
                                                    selected="" <?php } ?> ><?php echo $record->title_setting; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                                <input type="hidden" name="past_bank_relationship"
                                       value="<?= $row->person_relationship ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label">  رقم الهويه</label>
                                <input type="text" name="past_bank_national_card" maxlength="10"
                                       onkeyup="check_len_modal($(this).val(),<?php echo $row->id; ?>);"
                                       onkeypress="validate_number(event)"
                                       id="past_bank_national_card<?php echo $row->id; ?>"
                                       value="<?php echo $row->person_national_card; ?>" readonly
                                       class="form-control half input-style quart-input"/>
                                <small style="color: red;;">10 ارقام فقط</small>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label">  رقم الجوال</label>
                                <input type="text" name="past_bank_mob" maxlength="10"
                                       onkeypress="validate_number(event)"
                                       onkeyup="check_len_modal($(this).val(),<?php echo $row->id; ?>);"
                                       id="past_bank_mob<?php echo $row->id; ?>" value="<?php echo $row->person_mob; ?>"
                                       readonly class="form-control half input-style quart-input"/>
                                <small style="color: red;;">10 ارقام فقط</small>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12 ">
                                <label class="label label-green  half quart-label">إسم البنك<strong
                                        class="astric">*</strong> </label>
                                <select name="past_bank_id" id="past_bank_id<?php echo $row->id; ?>"
                                        class="form-control half quart-input" disabled
                                        onchange="get_code_bank(<?php echo $row->id; ?>)" ;>
                                    <?php $yes_no = array('لا', 'نعم'); ?>
                                    <option value="">إختر</option>
                                    <?php if (!empty($banks)) {
                                        foreach ($banks as $bank) {
                                            $select = '';
                                            if ($row->bank_id_fk == $bank->id) {
                                                $select = 'selected';
                                            } ?>
                                            <option
                                                value="<?php echo $bank->id; ?>-<?php echo $bank->bank_code; ?>" <?php echo $select; ?>><?php echo $bank->ar_name; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                                <input type="hidden" name="past_bank_id" value="<?= $row->bank_id_fk ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-4 col-xs-12 ">
                                <label class="label label-green  half quart-label">رمز البنك<strong
                                        class="astric">*</strong> </label>
                                <input type="text" value="<?php echo $row->bank_code; ?>"
                                       class="form-control half input-style quart-input"
                                       name="ramz_code" readonly="readonly"
                                       id="ramz_code<?php echo $row->id; ?>"/>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label">رقم الحساب <strong
                                        class="astric">*</strong> </label>
                                <input type="text" class="form-control half input-style quart-input" maxlength="24"
                                       minlength="24"
                                       value="<?php echo $row->bank_account_num; ?>"
                                       name="past_bank_code" readonly
                                       id="past_bank_code<?php echo $row->id; ?>"
                                       onkeyup="limit_length(<?php echo $row->id; ?>,$(this).val());"
                                />
                                <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12 ">
                                <?php if (!empty($row->bank_image)) {
                                    $img_url = "uploads/images/" . $row->bank_image;
                                } else {
                                    $img_url = "asisst/web_asset/img/logo.png";
                                } ?>
                                <label class="label label-green  half quart-label">صوره الحساب<strong class="astric">*</strong>
                                </label>
                                <?php if (!empty($row->bank_image)) { ?>
                                    <input type="hidden" name="past_bank_image"
                                           value="<?php echo $row->bank_image; ?>">
                                <?php } ?>
                                <div class="form-group">
                                    <div id="post_img" class="imgContent" style="min-height: 150px;  ">
                                        <img id="blah<?php echo $row->id; ?>" style="width: 150px;"
                                             src="<?php echo base_url() . $img_url; ?> ">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="family_national_num_fk"
                                   value="<?php echo $row->family_national_num_fk; ?>">
                        </div>
                        <div class="col-md-4 col-md-offset-4  btn btn-info  " style="margin-bottom: 15px;">
                            بيانات مسئول الحساب البنكي التالى
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label">مسئول الحساب<strong
                                        class="astric">*</strong><strong></strong> </label>
                                <select name="current_bank_id_fk" id="current_bank_id_fk<?php echo $row->id; ?>"
                                        data-validation="required" aria-required="true"
                                        onchange="get_responsible_name_current($(this).val());"
                                        class="form-control half quart-input">
                                    <option value="">إختر</option>
                                    <?php if (isset($name) && !empty($name)) {
                                        ?>
                                        <option
                                            value="<?php echo $name->id . '-1'; ?>"
                                            style="color: red;"> <?php echo $name->full_name . '(الام)'; ?></option>
                                    <?php } ?>
                                    <?php if (isset($f_members) && !empty($f_members)) {
                                        foreach ($f_members as $row2) {
                                            ?>
                                            <option
                                                value="<?php echo $row2->id . '-2'; ?>">
                                                <?php if ($row2->member_gender == 1) {
                                                    $mem_type = "(الابن)";
                                                } elseif ($row2->member_gender == 2) {
                                                    $mem_type = "(الابنه)";
                                                }
                                                echo $row2->member_full_name . $mem_type; ?></option>
                                        <?php }
                                    } ?>
                                    <option value="0"> شخص اخر</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label">اسم المسئول</label>
                                <input type="text" name="current_bank_name"
                                       id="current_bank_name" disabled
                                       class="form-control half input-style quart-input"/>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12 ">
                                <label class="label label-green  half quart-label">الصلة<strong
                                        class="astric">*</strong><strong></strong> </label>
                                <select name="current_bank_relationship" id="current_bank_relationship"
                                        data-validation="required" aria-required="true"
                                        class=" no-padding form-control quart-input form-control half">
                                    <option value="">إختر</option>
                                    <?php if (!empty($relationships)) {
                                        foreach ($relationships as $record) {
                                            ?>
                                            <option
                                                value="<?php echo $record->id_setting; ?>" <?php /*if ($record->id_setting == $row->person_relationship) {*/ ?>  <?php /* } */ ?> ><?php echo $record->title_setting; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label">  رقم الهويه</label>
                                <input type="text" name="current_bank_national_card" maxlength="10"
                                       onkeyup="check_len_modal($(this).val(),<?php echo $row->id; ?>);"
                                       onkeypress="validate_number(event)" id="current_bank_national_card"
                                       value="" data-validation="required"
                                       class="form-control half input-style quart-input"/>
                                <small style="color: red;;">10 ارقام فقط</small>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label">  رقم الجوال</label>
                                <input type="text" name="current_bank_mob" maxlength="10"
                                       onkeypress="validate_number(event)"
                                       onkeyup="check_len_modal($(this).val(),<?php echo $row->id; ?>);"
                                       id="current_bank_mob" value=""
                                       data-validation="required" class="form-control half input-style quart-input"/>
                                <small style="color: red;;">10 ارقام فقط </small>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12 ">
                                <label class="label label-green  half quart-label">إسم البنك<strong
                                        class="astric">*</strong> </label>
                                <select name="current_bank_id" id="current_bank_id"
                                        class="form-control half quart-input" data-validation="required"
                                        onchange="get_current_code_bank(<?php echo $row->id; ?>)" ;>
                                    <?php $yes_no = array('لا', 'نعم'); ?>
                                    <option value="">إختر</option>
                                    <?php if (!empty($banks)) {
                                        foreach ($banks as $bank) {
                                            $select = '';
                                            /*if ($row->bank_id_fk == $bank->id) {
                                                $select = 'selected';
                                            }*/ ?>
                                            <option
                                                value="<?php echo $bank->id; ?>-<?php echo $bank->bank_code; ?>" <?php echo $select; ?>><?php echo $bank->ar_name; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-4 col-xs-12 ">
                                <label class="label label-green  half quart-label">رمز البنك<strong
                                        class="astric">*</strong> </label>
                                <input type="text" value=""
                                       class="form-control half input-style quart-input"
                                       name="ramz_code" readonly="readonly"
                                       id="current_ramz_code"/>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label">رقم الحساب <strong
                                        class="astric">*</strong> </label>
                                <input type="text" class="form-control half input-style quart-input" maxlength="24"
                                       minlength="24"
                                       value=""
                                       name="current_bank_code" data-validation="required"
                                       id="current_bank_code"
                                       onkeyup="limit_current_length($(this).val());"/>
                                <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12 ">
                                <?php if ($row->bank_image != 0) {
                                    $img_url = "asisst/web_asset/img/logo.png";
                                } else {
                                    $img_url = "asisst/web_asset/img/logo.png";
                                } ?>
                                <label class="label label-green  half quart-label">صوره الحساب<strong class="astric">*</strong>
                                </label>
                                <input type="file" id="current_bank_image" name="current_bank_image"
                                       class="form-control half input-style quart-input"
                                       onchange="readURL_modal_current(this);">
                                <div class="form-group">
                                    <div id="post_img" class="imgContent" style="min-height: 150px;  ">
                                        <img id="image_current" style="width: 150px;"
                                             src="<?php echo base_url() . $img_url; ?> ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="display: inline-block; width: 100%;">
                        <button type="submit" name="save" id="save" value="save" class="btn btn-success">حفظ</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!--------------------------modal-transfer-------------------------------------------->
        <?php echo form_open_multipart('family_controllers/Family/edit_account/' . $this->uri->segment(4) . ''); ?>
        <div class="modal" id="modal-info<?= $row->id ?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel"
             data-wow-duration="0.5s">
            <div class="modal-dialog" role="document" style="width: 90%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> تعديل رقم الحساب</h4>
                    </div>
                    <div class="modal-body ">
                        <div class="col-md-12">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label" >مسئول الحساب<strong
                                        class="astric">*</strong><strong></strong> </label>
                                <select name="edit_person_id_fk" id="person_id_fk<?php echo $row->id; ?>"
                                        data-validation="required" aria-required="true"
                                        onchange="get_responsible_modal($(this).val(),<?php echo $row->id; ?>);"
                                        class="form-control half quart-input">
                                    <?php if (isset($name) && !empty($name)) { ?>
                                        <option
                                            value="<?php echo $name->id . '-1'; ?>" <?php if ($name->id == $row->person_id_fk && $row->type == 1) { ?> selected="" <?php } ?>
                                            style="color: red;"> <?php echo $name->full_name . '(الام)'; ?></option>
                                    <?php } ?>
                                    <?php if (isset($f_members) && !empty($f_members)) {
                                        foreach ($f_members as $row2) {
                                            ?>
                                            <option
                                                value="<?php echo $row2->id . '-2'; ?>" <?php
                                            if ($row2->id == $row->person_id_fk && $row->type == 2) { ?> selected="" <?php } ?> >
                                                <?php
                                                if ($row2->member_gender == 1) {
                                                    $mem_type = "(الابن)";
                                                } elseif ($row2->member_gender == 2) {
                                                    $mem_type = "(الابنه)";
                                                }
                                                echo $row2->member_full_name . $mem_type; ?></option>
                                        <?php }
                                    }
                                    ?>
                                    <option value="0" <?php if ($row->person_id_fk == 0) { ?> selected="" <?php } ?> >
                                        شخص اخر
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label">اسم المسئول</label>
                                <input type="text" name="edit_person_name"
                                       id="person_name<?php echo $row->id; ?>" <?php if ($row->person_id_fk != 0) { ?> disabled="" <?php } ?>
                                       data-validation="required" value="<?php echo $row->person_name; ?>"
                                       class="form-control half input-style quart-input"/>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12 ">
                                <label class="label label-green  half quart-label">الصلة<strong
                                        class="astric">*</strong><strong></strong> </label>
                                <select name="edit_person_relationship" id="person_relationship<?php echo $row->id; ?>"
                                        data-validation="required" aria-required="true"
                                        class=" no-padding form-control quart-input form-control half">
                                    <option value="">إختر</option>
                                    <?php if (!empty($relationships)) {
                                        foreach ($relationships as $record) {
                                            ?>
                                            <option
                                                value="<?php echo $record->id_setting; ?>" <?php if ($record->id_setting == $row->person_relationship) { ?>  selected="" <?php } ?> ><?php echo $record->title_setting; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label"> رقم الهويه</label>
                                <input type="text" name="edit_person_national_card" maxlength="10"
                                       onkeyup="check_len_modal($(this).val(),<?php echo $row->id; ?>);"
                                       onkeypress="validate_number(event)" id="card_num<?php echo $row->id; ?>"
                                       value="<?php echo $row->person_national_card; ?>" data-validation="required"
                                       class="form-control half input-style quart-input"/>
                                <small style="color: red;;">10 ارقام فقط</small>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label" >  رقم الجوال</label>
                                <input type="text" name="edit_person_mob" maxlength="10"
                                       onkeypress="validate_number(event)"
                                       onkeyup="check_len_modal($(this).val(),<?php echo $row->id; ?>);"
                                       id="mob<?php echo $row->id; ?>" value="<?php echo $row->person_mob; ?>"
                                       data-validation="required" class="form-control half input-style quart-input"/>
                                <small style="color: red;;">10 ارقام فقط</small>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12 ">
                                <label class="label label-green  half quart-label">إسم البنك<strong
                                        class="astric">*</strong> </label>
                                <select name="edit_bank_id_fk" id="bank_name<?php echo $row->id; ?>"
                                        class="form-control half  quart-input" data-validation="required"
                                        onchange="get_code_bank(<?php echo $row->id; ?>)" ;>
                                    <?php $yes_no = array('لا', 'نعم'); ?>
                                    <option value="">إختر</option>
                                    <?php if (!empty($banks)) {
                                        foreach ($banks as $bank) {
                                            $select = '';
                                            if ($row->bank_id_fk == $bank->id) {
                                                $select = 'selected';
                                            } ?>
                                            <option
                                                value="<?php echo $bank->id; ?>-<?php echo $bank->bank_code; ?>" <?php echo $select; ?>><?php echo $bank->ar_name; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-sm-4 col-xs-12 ">
                                <label class="label label-green  half quart-label">رمز البنك<strong
                                        class="astric">*</strong> </label>
                                <input type="text" value="<?php echo $row->bank_code; ?>"
                                       class="form-control half input-style quart-input"
                                       name="edit_bank_code" readonly="readonly"
                                       id="ramz_code<?php echo $row->id; ?>"/>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green  half quart-label">رقم الحساب <strong
                                        class="astric">*</strong> </label>
                                <input type="text" class="form-control half input-style quart-input" maxlength="24"
                                       minlength="24"
                                       value="<?php echo $row->bank_account_num; ?>"
                                       name="edit_bank_account_num" data-validation="required"
                                       id="hesab_bank_<?php echo $row->id; ?>"
                                       onkeyup="limit_length(<?php echo $row->id; ?>,$(this).val());"
                                />
                                <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12 ">
                                <?php if ($row->bank_image != 0) {
                                    $img_url = "uploads/images/" . $row->bank_image;
                                } else {
                                    $img_url = "asisst/web_asset/img/logo.png";
                                } ?>
                                <label class="label label-green  half quart-label">صوره الحساب<strong class="astric">*</strong>
                                </label>
                                <input type="file" id="bank_image" name="edit_bank_image"
                                       class="form-control half input-style quart-input"
                                       onchange="readURL_modal(this,<?php echo $row->id; ?>);">
                                <div class="form-group">
                                    <div id="post_img" class="imgContent" style="min-height: 150px;  ">
                                        <img id="blah<?php echo $row->id; ?>" style="width: 150px;"
                                             src="<?php echo base_url() . $img_url; ?> ">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="person_id" value="<?php echo $row->id; ?>">
                            <input type="hidden" name="mother_num"
                                   value="<?php echo $row->family_national_num_fk; ?>">
                        </div>

                    </div>
                    <div class="modal-footer" style="display: inline-block; width: 100%;">
                        <input type="submit" id="buttons<?php echo $row->id; ?>" name="edit"
                               class="btn btn-blue btn-close" value="تعديل"/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
        <?php
    }
}
?>
<script>
    function remove_dis(valu, id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/Family/edit_account",
            data: {valu: valu, id: id},
            success: function (d) {
                alert(d);
            }
        });
    }
</script>
<script>
    function get_code2() {
        var valu = $('#m_account_id').val();
        var valu = valu.split("-");
        $('#ramz_code').val(valu[1]);
    }
</script>
<script>
    function length_hesab_om(length) {
        var len = length.length;
        if (len < 24) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if (len > 24) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if (len == 24) {
            document.getElementById("buttons").removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function get_responsible(valu) {
        $('#person_relationship').val('');
        $('#mob').val('');
        $('#card_num').val('');
        if (valu == 0) {
            document.getElementById("person_name").removeAttribute("disabled", "disabled");
        } else {
            document.getElementById("person_name").setAttribute("disabled", "disabled");
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/Family/get_person_data",
                data: {valu: valu},
                success: function (d) {
                    var json = d;
                    obj = JSON.parse(json);
                    var type = valu;
                    var type_person = valu.split("-")[1];
                    if (type_person == 1) {
                        $('#person_relationship').val(obj.m_relationship);
                        $('#mob').val(obj.m_mob);
                        $('#card_num').val(obj.mother_national_num_fk);
                    } else if (type_person == 2) {
                        $('#person_relationship').val(obj.member_relationship);
                        $('#mob').val(obj.member_mob);
                        $('#card_num').val(obj.member_card_num);
                    }
                }
            });
        }
    }
</script>
<script>
    function get_code_bank(id) {
        var valu = $('#bank_name' + id).val();
        var valu = valu.split("-");
        $('#ramz_code' + id).val(valu[1]);
    }
</script>
<script>
    function limit_length(id, length) {
        var len = length.length;
        if (len < 24) {
            document.getElementById("buttons" + id).setAttribute("disabled", "disabled");
        }
        if (len > 24) {
            document.getElementById("buttons" + id).setAttribute("disabled", "disabled");
        }
        if (len == 24) {
            document.getElementById("buttons" + id).removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function check_len(length) {
        var len = length.length;
        if (len < 10) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if (len > 10) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if (len == 10) {
            document.getElementById("buttons").removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function check_len_modal(length, id) {
        var len = length.length;
        if (len < 10) {
            document.getElementById("buttons" + id).setAttribute("disabled", "disabled");
        }
        if (len > 10) {
            document.getElementById("buttons" + id).setAttribute("disabled", "disabled");
        }
        if (len == 10) {
            document.getElementById("buttons" + id).removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function change_status(valu, id, mother_num, bank_id_fk, bank_account_num) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/Family/make_active",
            data: {
                valu: valu,
                id: id,
                mother_num: mother_num,
                bank_id_fk: bank_id_fk,
                bank_account_num: bank_account_num
            },
            success: function (d) {
                alert(d);
                location.reload();
            }
        });
    }
</script>
<script>
    function get_responsible_modal_transfer(valu, id) {
        $('#person_relationship' + id).val('');
        $('#mob' + id).val('');
        $('#card_num' + id).val('');
        if (valu == 0) {
            document.getElementById("person_name_transfer" + id).removeAttribute("disabled", "disabled");
        } else {
            document.getElementById("person_name_transfer" + id).setAttribute("disabled", "disabled");
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/Family/get_person_data",
                data: {valu: valu},
                success: function (d) {
                    var json = d;
                    obj = JSON.parse(json);
                    var type = valu;
                    var type_person = valu.split("-")[1];
                    if (type_person == 1) {
                        $('#person_relationship' + id).val(obj.m_relationship);
                        $('#mob' + id).val(obj.m_mob);
                        $('#card_num' + id).val(obj.mother_national_num_fk);
                    } else if (type_person == 2) {
                        $('#person_relationship' + id).val(obj.member_relationship);
                        $('#mob' + id).val(obj.member_mob);
                        $('#card_num' + id).val(obj.member_card_num);
                    }
                }
            });
        }
    }
</script>
<script>
    function get_responsible_modal(valu, id) {
        $('#person_relationship' + id).val('');
        $('#mob' + id).val('');
        $('#card_num' + id).val('');
        if (valu == 0) {
            document.getElementById("person_name" + id).removeAttribute("disabled", "disabled");
        } else {
            document.getElementById("person_name" + id).setAttribute("disabled", "disabled");
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/Family/get_person_data",
                data: {valu: valu},
                success: function (d) {
                    var json = d;
                    obj = JSON.parse(json);
                    var type = valu;
                    var type_person = valu.split("-")[1];
                    if (type_person == 1) {
                        $('#person_relationship' + id).val(obj.m_relationship);
                        $('#mob' + id).val(obj.m_mob);
                        $('#card_num' + id).val(obj.mother_national_num_fk);
                    } else if (type_person == 2) {
                        $('#person_relationship' + id).val(obj.member_relationship);
                        $('#mob' + id).val(obj.member_mob);
                        $('#card_num' + id).val(obj.member_card_num);
                    }
                }
            });
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
<script type="text/javascript">
    function readURL_modal(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah' + id).attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script type="text/javascript">
    function readURL_modal_current(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_current').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    function get_responsible_name_current(valu) {
        $('#current_bank_relationship').val('');
        $('#current_bank_mob').val('');
        $('#current_bank_national_card').val('');
        if (valu == 0) {
            document.getElementById("current_bank_name").removeAttribute("disabled", "disabled");
        } else {
            document.getElementById("current_bank_name").setAttribute("disabled", "disabled");
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/Family/get_person_data",
                data: {valu: valu},
                success: function (d) {
                    var json = d;
                    obj = JSON.parse(json);
                    var type = valu;
                    var type_person = valu.split("-")[1];
                    if (type_person == 1) {
                        $('#current_bank_relationship').val(obj.m_relationship);
                        $('#current_bank_mob').val(obj.m_mob);
                        $('#current_bank_national_card').val(obj.mother_national_num_fk);
                    } else if (type_person == 2) {
                        $('#current_bank_relationship').val(obj.member_relationship);
                        $('#current_bank_mob').val(obj.member_mob);
                        $('#current_bank_national_card').val(obj.member_card_num);
                    }
                }
            });
        }
    }
</script>
<script>
    function get_current_code_bank() {
        var valu = $('#current_bank_id').val();
        var codee = valu.split("-");
        $('#current_ramz_code').val(codee[1]);
    }
</script>
<script>
    function limit_current_length(length) {
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