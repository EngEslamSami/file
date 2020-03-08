<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>


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

    . {
        font-size: 13px;
    }
</style>

<?php
$array = array(1 => 'نعم', 2 => 'لا');
$disabled = '';
if (isset($allData) && $allData != null) {
    echo form_open_multipart('human_resources/Human_resources/delete_employee_files/' . $this->uri->segment(4));
} else {
    echo form_open_multipart('human_resources/Human_resources/employee_files/' . $this->uri->segment(4));
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
                <input type="text" class="form-control " name="emp_code"
                       value="<?= $employee['emp_code'] ?>" readonly/>
            </div>

            <div class="form-group col-sm-3 col-xs-12">
                <label class="label ">إسم الموظف</label>
                <input type="text" class="form-control " name="emp_name"
                       value="<?= $employee['employee'] ?>" readonly/>
            </div>
            <!--
                        <div class="col-sm-12">
                            <h6 class="text-center inner-heading">بيانات المستندات والبطاقات والمهارات</h6>
                        </div>
            -->

            <?php if (isset($allData) && (empty($allData))) {
                $display = 'style="display: none"'; ?>
            <?php } else {
                $display = '';
            } ?>
            <!-- <div class="form-group col-sm-4 col-xs-12">
                <button type="button" class="btn btn-purple w-md m-b-5" value="1"
                        onclick="getBanks($(this).val(),<?php if (isset($allData) && $allData != null) echo count($allData); else echo 0; ?>);">
                    <i class="fa fa-plus"></i> إضافة مرفق جديد
                </button>
            </div>-->
            <table id="emp_files" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th class="text-center">إسم المرفق</th>
                    <th class="text-center">إرفاق - تحميل قراءة المستند</th>
                    <th class="text-center">هل يوجد تاريخ</th>
                    <th class="text-center">من تاريخ</th>
                    <th class="text-center">إلي تاريخ</th>
                    <th class="text-center"> حذف</th>

                </tr>
                </thead>

                <tbody id="result"></tbody>
                <tbody>
                <?php
                if (isset($allData) && (!empty($allData))) {
                    foreach ($allData as $key => $value) {

                        $class = 'class';

                        $disabled = 'disabled';

                        ?>

                        <tr>
                            <td>
                                <div class="col-sm-12">

                                    <select class="form-control " <?= $disabled ?> >
                                        <?php if (isset($files_names) && !empty($files_names)) {
                                            foreach ($files_names as $row) {
                                                $selected = '';
                                                if ($row->id_setting == $value->title) {
                                                    $selected = 'selected';
                                                }
                                                echo '<option value="' . $row->id_setting . '" ' . $selected . '>' . $row->title_setting . '</option>';
                                            }
                                        } else {
                                            echo '<option value=""> لا يوجد أسماء مرفقات مضافة </option>';
                                        } ?>
                                    </select>
                                </div>
                            </td>


                            <td>

                                <?php

                                if (isset($allData)) {
                                    ?>
                                    <div class="col-sm-12">
                                        <a href="<?php echo base_url() . 'uploads/human_resources/employee_files/' . $value->emp_file ?>"
                                           download> <i class="fa fa-download" title="تحميل"></i> </a>
                                        <a data-toggle="modal" data-target="#myModal-view-<?= $value->id ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                                    </div>
                                    <?php
                                } else { ?>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control " name="emp_file<?= $key ?>"
                                               id="emp_file<?= $key ?>"
                                               value="<?= $value->emp_file ?>" <?= $disabled ?>/>
                                    </div>
                                <?php }
                                ?>
                            </td>

                            <td>
                                <div class="col-sm-12">
                                    <select name="commited[<?= $key ?>]"
                                            class="form-control  <?= $class ?>" <?= $disabled ?>>
                                        <option value="">إختر</option>
                                        <?php
                                        foreach ($array as $k => $va) {
                                            $select = '';
                                            if (isset($allData) && $k == $value->have_date) {
                                                $select = 'selected';
                                            }

                                            ?>
                                            <option value="<?= $k ?>" <?= $select ?>><?= $va ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control   <?= $class ?>"
                                           name="date_from[<?= $key ?>]" <?php if (isset($allData) && $value->from_date > 0) echo 'data-validation="required" value="' . $value->from_date . '"'; else echo 'disabled' ?> <?= $disabled ?> />
                                </div>
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control  <?= $class ?>"
                                           name="date_to[<?= $key ?>]" <?php if (isset($allData) && $value->to_date > 0) echo 'data-validation="required" value="' . $value->to_date . '"'; else echo 'disabled' ?> <?= $disabled ?> />
                                </div>
                            </td>
                            <td>
                                <a
                                        onclick=' swal({
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
                                                setTimeout(function(){window.location="<?= base_url() . "human_resources/Human_resources/deletefilesEmp/" . $value->id . '/' . $this->uri->segment(4) ?>";}, 500);
                                                });'

                                <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    $array = array(1 => 'نعم', 2 => 'لا');

                    ?>
                    <tr>
                        <td>
                            <div class="col-sm-12">

                                <select name="title[0]" id="title0" class="form-control">
                                    <?php if (isset($files_names) && !empty($files_names)) {
                                        foreach ($files_names as $row) {
                                            echo '<option value="' . $row->id_setting . '">' . $row->title_setting . '</option>';
                                        }
                                    } else {
                                        echo '<option value=""> لا يوجد أسماء مرفقات مضافة </option>';
                                    } ?>
                                </select>

                            </div>
                        </td>

                        <td>
                            <div class="col-sm-12">
                                <input type="file" class="form-control bottom-input" name="emp_file0" id="emp_file0"
                                       data-validation="required"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-12">
                                <select name="commited[0]" class="form-control bottom-input"
                                        onchange="dateEnabled($(this).val(),0)" data-validation="required">
                                    <option value="">إختر</option>
                                    <?php
                                    foreach ($array as $key => $value) {
                                        $select = '';

                                        ?>
                                        <option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-12">
                                <input type="date" class="form-control date_as_mask bottom-input date0"
                                       name="date_from[0]" data-validation="required"/>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-12">
                                <input type="date" class="form-control date_as_mask bottom-input date0"
                                       name="date_to[0]" data-validation="required"/>
                            </div>
                        </td>
                        <td><a onclick=" $(this).closest('tr').remove();"><i
                                        class="fa fa-trash"></i></a>
                        </td>


                    </tr>

                    <?php
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
               ```` <th>
                        <button type="button" value="1"
                                onclick="getBanks($(this).val(),<?php if (isset($allData) && $allData != null) echo count($allData); else echo 0; ?>);"
                                class="btn-success btn btn-labeled">
                           <span class="btn-label"><i class="fa fa-plus"></i> </span> إضافة
                        </button>
                    </th>
                    <th colspan="3" class="text-center"></th>
                    <th colspan="2">
                      <button type="button" value=" " class="btn-danger btn btn-labeled" style="    float: left;">
                           <span class="btn-label"><i class="fa fa-trash"></i> </span> حذف
                        </button>
                    </th>
                    
                </tr>
                </tfoot>

            </table>

            <div class="col-xs-12 text-center">


                <input type="hidden" name="count"
                       value="<?php if (isset($allData) && $allData != null) echo count($allData); else echo 0; ?>">
                <!--                <input type="submit" id="buttons" name="add" class="btn btn-blue btn-close" value="حفظ">-->
                <button type="submit" id="buttons" name="add" value="حفظ"
                        onclick="insertData();" class="btn btn-labeled btn-success "
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                </button>
            </div>
        </div>
    </div>
</div>


<?php echo form_close(); ?>

<?php if (isset($allData) && $allData != null) {
    foreach ($allData as $key => $value) { ?>
        <div class="modal fade" id="myModal-view-<?= $value->id ?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> عرض المستند </h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        if (!empty($value->emp_file)) {
                            $type = pathinfo($value->emp_file)['extension'];
//                            echo($type);
                            $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                            $arr_doc = array('DOC', ' DOCX', 'HTML  ', 'HTM', 'ODT', 'pdf', 'XLS ', ' XLSX', 'ODS', 'PPT  ', 'PPTX', 'TXT');
                            if (in_array($type, $arry_images)) {
                                ?>
                                <img src="<?php echo base_url() . 'uploads/human_resources/employee_files/' . $value->emp_file ?>"
                                     onerror="this.src='<?php echo base_url('asisst/fav/apple-icon-120x120.png') ?>'"
                                     width="100%">

                                <?php
                            } elseif (in_array($type, $arr_doc)) {
                                ?>
                                <iframe src="https://docs.google.com/gview?url=<?= base_url() . 'uploads/human_resources/employee_files/' . $value->emp_file ?>&embedded=true"
                                        frameborder="0" width="100%"></iframe>

                                <?php
                            }
                        }
                        ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>

    <?php }
}
?>


<!--
<?php // $data_load["personal_data"] = $personal_data;
// $this->load->view('admin/Human_resources/sidebar_person_data', $data_load); ?>
-->


<script type="text/javascript">
    jQuery(function ($) {
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>


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

    var inc = 1;

    function getBanks(argument, allCount) {
        inc = inc;
        if (argument) {
            var dataString = 'numbers=' + argument + '&count=' + allCount + '&inc=' + inc;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getfiles',
                data: dataString,
                cache: false,
                success: function (html) {
                    $('#emp_files').show();
                    $('#result').append(html);
                }
            });
            inc = ++inc;
        } else {
            $('#result').html('');
        }
    }


</script>

