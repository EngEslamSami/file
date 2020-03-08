<?php
if (!isset($_POST['from_profile'])) {
    ?>

    <?php
    $this->load->view('admin/requires/header');
    $this->load->view('admin/requires/tob_menu');
}
?>

<style type="text/css">
    . {
        font-size: 14px;
        font-weight: 500;

    }

    .title {
        background-color: #;
        background-color: #00713e;
        color: #fff;
        text-align: center;
        padding: 5px;
    }

    .print_forma {
        /*border:1px solid #73b300;*/
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #09704e;
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #09704e;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {

        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #09704e;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #09704e;
    }

    .piece-heading h5 {
        margin: 4px 0;
        color: #fff;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;

    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }

    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }

    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3,
    .under-line .col-xs-4,
    .under-line .col-xs-6,
    .under-line .col-xs-8 {
        border-left: 1px solid #abc572;
    }


    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }


    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>


<div class="col-xs-12 no-padding">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>

        <div class="panel-body">
            <?php
            if (isset($get_requset) && !empty($get_requset)) {
                echo form_open_multipart('human_resources/employee_forms/job_requests/Job_request/Update_requset/' . $get_requset->id);
                $dept_name = $get_requset->dept_name;
                $job_title_id_fk = $get_requset->job_title_id_fk;
                $num_for_job = $get_requset->num_for_job;
                $job_typee = $get_requset->job_type;
                $job_natural = $get_requset->job_natural;


            } else {
                $dept_name = '';
                $job_title_id_fk = '';
                $num_for_job = '';
                $job_typee = '';
                $job_natural = '';
                echo form_open_multipart('human_resources/employee_forms/job_requests/Job_request');

            }
            ?>
            <div class="col-md-12 no-padding">
                <!-- <div class="form-group col-md-3   ">
                        <label>   الإدارة-القسم </label>
                        <input type="text" name="sub_dept" id="sub_dept" value="<?= $dept_name ?>"
                               class="form-control testButton inputclass"
                               style="cursor:pointer; width:245px;float: right;" autocomplete="off"
                               ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');"
                               onblur="$(this).attr('readonly','readonly')"

                               readonly>
                        <input type="hidden" name="dep_id_fk" id="dep_id_fk">
                        <input type="hidden" name="sub_dep_id_fk" id="sub_dep_id_fk">
                    </div>-->

                <?php
                if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
                    <input type="hidden" name="from_profile" value="1"/>
                <?php } ?>
                <div class="form-group col-md-3  padding-4 ">
                    <label class="label"> الإدارة-القسم </label>
                    <input type="text" name="sub_dept" id="sub_dept" value="<?= $dept_name ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:84%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"

                           readonly>
                    <input type="hidden" name="dep_id_fk" id="dep_id_fk">
                    <input type="hidden" name="sub_dep_id_fk" id="sub_dep_id_fk">
                    <button class="btn btn-success " type="button" data-toggle="modal" data-target="#myModal"
                            style="float: right;"><i class="fa fa-plus"></i></button>
                </div>

                <div class="form-group col-md-3 col-sm-6  padding-4  ">
                    <label class="label  ">مسمي الوظيفة</label>
                    <select name="job_title_id_fk" id="job_title_id_fk"
                            data-validation="required" class="form-control   selectpicker"
                            data-show-subtext="true" data-live-search="true"
                            aria-required="true">
                        <option value="">إختر</option>
                        <?php
                        if (isset($jobtitles) && !empty($jobtitles)) {
                            foreach ($jobtitles as $row) {
                                $select = '';
                                if ($job_title_id_fk == $row->defined_id) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?php echo $row->defined_id; ?>" <?php echo $select; ?>> <?php echo $row->defined_title; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-1 col-sm-6  padding-4  ">
                    <label class="label  ">العدد</label>
                    <input type="text" name="num_for_job" id="num_for_job" value="<?php echo $num_for_job; ?>"
                           class="form-control bottom-input"
                           data-validation="required" onkeypress="validate_number(event)"
                           data-validation-has-keyup-event="true">
                </div>


                <div class="form-group col-md-2  col-sm-6  padding-4  ">
                    <label class="label  ">نوع الوظيفة </label>
                    <select name="job_type" id="job_type"
                            data-validation="required" class="form-control   selectpicker"
                            data-show-subtext="true" data-live-search="true"
                            aria-required="true">
                        <option value="">إختر</option>
                        <?php
                        if (isset($job_type) && !empty($job_type)) {
                            foreach ($job_type as $row) {
                                $select = '';
                                if ($job_typee == $row->id_setting) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?php echo $row->id_setting; ?>" <?php echo $select; ?>> <?php echo $row->title_setting; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-6  padding-4  ">
                    <label class="label ">طبيعة العمل بالوظيفة</label>
                    <select id="job_natural" data-validation="required" class="form-control   selectpicker"
                            data-show-subtext="true" data-live-search="true"
                            name="job_natural">
                        <option value="">إختر</option>
                        <?php
                        if (isset($work_nature) && !empty($job_type)) {
                            foreach ($work_nature as $row) {
                                $select = '';
                                if ($job_natural == $row->id_setting) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?php echo $row->id_setting; ?>" <?php echo $select; ?>> <?php echo $row->title_setting; ?></option>
                                <?php
                            }
                        } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-12 no-padding">
                <div class="col-md-6 padding-4">
                    <!-- <h4 class="title"> أسباب ومبررات الإحتياج </h4>
                     <div class="col-sm-1 col-xs-12"></div> -->


                    <table class="table table-striped table-bordered" id="mytable_reasons">
                        <thead>
                        <tr class="info">
                            <th style="width: 50px;">م</th>
                            <th>أسباب ومبررات الإحتياج</th>
                            <th style="width: 50px;"> الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="reason_table">
                        <?php

                        if ((isset($get_requset->reasons)) && !empty($get_requset->reasons)) {
                            $z = 1;
                            foreach ($get_requset->reasons as $reson) {
                                ?>
                                <tr id="row_<?= $z ?>">
                                    <td><?= $z ?></td>
                                    <td><input type="text" name="details_reason[]"
                                               class="form-control testButton inputclass"
                                               id="details_reason<?= $z ?>"
                                               value="<?= $reson->details ?>"
                                        /></td>


                                    <td><a id="1" onclick=" $(this).closest('tr').remove();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $z++;
                            }
                        } else { ?>
                            <tr id="row_1">
                                <td>1</td>
                                <td><input type="text" name="details_reason[]" placeholder="الاسباب والمبررات"
                                           class="form-control testButton inputclass"
                                           id="details_reason1" value=""

                                    /></td>


                                <td><a id="1" onclick=" $(this).closest('tr').remove();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr class="">
                            <th colspan="3">
                                <button type="button" onclick="add_row()" class="btn-success btn btn-labeled"><span
                                            class="btn-label"><i
                                                class="fa fa-plus"></i> </span>إضافة
                                </button>
                                <!--    <button type="button" value=" " class="btn-danger btn btn-labeled" style="    float: left;">
                              <span class="btn-label"><i class="fa fa-trash"></i> </span> حذف
                           </button>-->
                            </th>

                        </tr>
                        </tfoot>

                    </table>

                </div>


                <div class="col-md-6 padding-4">
                    <!--  <h4 class="title">    متطلبات العمل بالوظيفة </h4>
                      <div class="col-sm-1 col-xs-12"></div> -->


                    <table class="table table-striped table-bordered" id="mytable_reasons">
                        <thead>
                        <tr class="info">
                            <th style="width: 50px;">م</th>
                            <th> متطلبات العمل بالوظيفة</th>
                            <th style="width: 50px;"> الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="needs_table">
                        <?php
                        $total = 0;
                        if ((isset($get_requset->requests)) && (!empty($get_requset->requests))) {
                            $z = 1;
                            foreach ($get_requset->requests as $request) {
                                ?>
                                <tr id="row_<?= $z ?>">
                                    <td><?= $z ?></td>
                                    <td><input type="text" name="details_need[]"
                                               class="form-control testButton inputclass"
                                               id="details_need<?= $z ?>"
                                               value="<?= $request->details ?>"
                                        /></td>


                                    <td><a id="1" onclick=" $(this).closest('tr').remove();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $z++;
                            }
                        } else { ?>
                            <tr id="row_1">
                                <td>1</td>
                                <td><input type="text" name="details_need[]" placeholder="المتطلبات"
                                           class="form-control testButton inputclass"
                                           id="details_need1" value=""

                                    /></td>


                                <td><a id="1" onclick=" $(this).closest('tr').remove();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr class="">

                            <th colspan="3">
                                <button type="button" onclick="add_row_need()" class="btn-success btn btn-labeled"><span
                                            class="btn-label"><i
                                                class="fa fa-plus"></i> </span>إضافة
                                </button>

                                <!-- <button type="button" value=" " class="btn-danger btn btn-labeled" style="    float: left;">
                                <span class="btn-label"><i class="fa fa-trash"></i> </span> حذف
                             </button>-->
                            </th>
                        </tr>
                        </tfoot>

                    </table>

                </div>
            </div>


            <div class="clearfix"></div>

            <div class="col-xs-12 text-center">
                <span style="color: red" id="span_id"></span>

                <button type="submit" class="btn btn-labeled btn-success " name="add" value="add" id="add"
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
                <button type="button" class="btn btn-labeled btn-danger ">
                    <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                </button>

                <button type="button" class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>


                <button type="button" class="btn btn-labeled btn-inverse " id="attach_button"
                        data-target="#myModal_search" data-toggle="modal">
                    <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                </button>


            </div>
            <?php
            echo form_close();
            ?>

        </div>
    </div>
</div>


<table id="js_table"
       style="table-layout: fixed;"
       class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
    <thead>
    <tr class="greentd">
        <th class="text-center">م</th>
        <th class="text-center">رقم الطلب</th>
        <th class="text-center">تاريخ الطلب</th>
        <th class="text-center">مسمي الوظيفة</th>

        <th class="text-center">الاجراء</th>

    </tr>
    </thead>
</table>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> الإدارة-القسم </h4>
            </div>
            <div class="modal-body">

                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th style="font-size: 15px; width:88px !important; ">#</th>
                        <th style="font-size: 15px;" class="text-left"> الإدارة</th>
                        <th style="font-size: 15px;" class="text-left">القسم</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($deparments) && !empty($deparments)) {
                        $x = 1;
                        foreach ($deparments as $deparment) {


                            ?>
                            <tr ondblclick="get_dept('<?= $deparment->name ?>',<?= $deparment->from_id_fk ?>,<?= $deparment->id ?>);">
                                <td ondblclick="get_dept('<?= $deparment->name ?>',<?= $deparment->from_id_fk ?>,<?= $deparment->id ?>);">
                                    <input type="radio" name="dept">
                                </td>

                                <td><?= $deparment->edara ?></td>
                                <td><?= $deparment->name ?></td>

                            </tr>
                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="$('#myModal').modal('hide')">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- detailsModal -->
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

                <button
                        type="button" onclick="print_request(document.getElementById('row_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>

                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#detailsModal').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<!-- detailsModal -->

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>

<?php
//echo $requets_js;
?>
<?php
if (!isset($_POST['from_profile'])) {
    echo $requets_js;

    ?>
    <?php $this->load->view('admin/requires/footer');
} ?>

<script>
    function get_dept(name, edara, sub_id) {
        // alert(name);
        $('#sub_dept').val(name);
        $('#dep_id_fk').val(edara);
        $('#sub_dep_id_fk').val(sub_id);
        $('#myModal').modal('hide');

    }
</script>
<script>
    function add_row() {
        var table = document.getElementById('reason_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;

        var row = ' <tr id="row_1" >\n' +
            '                        <td>' + (len + 1) + '</td>\n' +
            '                        <td> <input type="text" placeholder="الاسباب والمبررات" class="form-control testButton inputclass" name="details_reason[]" id="details_reason' + (len + 1) + '" value=""   /></td>\n' +


            '                        <td><a id="1" onclick=" $(this).closest(\'tr\').remove(); "><i class="fa fa-trash"></i></a></td>\n' +
            '                    </tr>';

        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);


    }
</script>

<script>
    function add_row_need() {
        var table = document.getElementById('needs_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;

        var row = ' <tr id="row_1" >\n' +
            '                        <td>' + (len + 1) + '</td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" placeholder="المتطلبات" name="details_need[]" id="details_need' + (len + 1) + '" value=""   /></td>\n' +


            '                        <td><a id="1" onclick=" $(this).closest(\'tr\').remove(); "><i class="fa fa-trash"></i></a></td>\n' +
            '                    </tr>';

        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);


    }
</script>

<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>


<script>
    function print_request(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/job_requests/Job_request/print_request'?>",
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
<?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
    <script>
        $('.example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                'copy',
                'csv',
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
<?php } ?>



