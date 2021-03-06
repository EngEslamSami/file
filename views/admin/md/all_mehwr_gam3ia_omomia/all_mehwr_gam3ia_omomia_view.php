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

    .table-result.table > thead > tr > td.info, .table-result.table > tbody > tr > td.info,
    .table-result.table > tfoot > tr > td.info, .table-result.table > thead > tr > th.info,
    .table-result.table > tbody > tr > th.info, .table-result.table > tfoot > tr > th.info,
    .table-result.table > thead > tr.info > td, .table-result.table > tbody > tr.info > td,
    .table-result.table > tfoot > tr.info > td, .table-result.table > thead > tr.info > th,
    .table-result.table > tbody > tr.info > th, .table-result.table > tfoot > tr.info > th {
        background-color: #4f7b00;
        color: #fff;
    }

    .table-striped > tbody > tr:nth-child(odd) > td,
    .table-striped > tbody > tr:nth-child(odd) > th {
        background-color: #edffce;
    }
</style>
<style type="text/css">
    .top-label {
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

    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }

    table .headtr > td, table .headtr > th {
        /* background-color: #c1ccaf !important;
         color: #222 ;*/
        color: #d00303 !important;
        background-color: white !important;
    }

    table .headtr2 > td, table .headtr2 > th {
        background-color: #ffa7a7 !important;
        color: #222;
    }

    table tr > td, table tr > th {

        border: 2px double #000 !important;
    }

    .table-mehwer tr > td textarea {
        /* background-color: #dbecbd;*/
        background-color: #ffffff;
        color: green;
    }

    .table > tbody > tr > th, .table > tfoot > tr > th,
    .table > thead > tr > td, .table > tbody > tr > td,
    .table > tfoot > tr > td {

        padding: 5px !important;
    }

    table .left-headtr > td, table .left-headtr > th {
        background-color: #f2a516;
    }

    .left-headtr label.label {
        text-align: center !important;
        color: #000 !important;
    }

    .fa-plus.sspan {
        background-color: #5b69bc;
        padding: 3px 6px;
        color: #fff;
        border-radius: 5px;
    }
</style>


<div class="col-sm-12 no-padding ">
    <div class="col-sm-12 ">
        <div class="panel panel-bd lobidisable lobipanel  lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?></h3>
            </div>
            <div class="panel-body">
                <?php if (!empty($last_galsa)) { ?>
                    <?php

                    echo form_open_multipart(base_url() . 'md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia', array('id' => 'myform'));

                    ?>
                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="left-headtr">

                                <th class="text-center">رقم الجلسة</th>
                                <th class="text-center">تاريخ الجلسة</th>
                                <th class="text-center">أعضاء الجلسة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">

                                <td><?= $last_galsa->glsa_rkm ?></td>
                                <?php
                                $last_galsa->glsa_date_h = explode('/', $last_galsa->glsa_date_h)[2] . '/' . explode('/', $last_galsa->glsa_date_h)[1] . '/' . explode('/', $last_galsa->glsa_date_h)[0];
                                $last_galsa->glsa_date_m = date('Y/m/d', strtotime($last_galsa->glsa_date_m))
                                ?>
                                <td onclick=" var arr_time=['<?= $last_galsa->glsa_date_h ?>','<?= $last_galsa->glsa_date_m ?>'];
                                        change_time(this, arr_time)"><?php echo $last_galsa->glsa_date_m . ' ' . 'م' ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info " data-toggle="modal"
                                            onclick="det_datiles(<?= $last_galsa->glsa_rkm ?>,'تفاصيل الأعضاء')"
                                            data-target="#myModal">أعضاء الجلسة
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12">

                        <table class="table table-striped table-bordered table-result" id="mytable">
                            <thead>
                            <tr class="info">
                                <th>رقم المحور</th>
                                <!--    25-7-om   -->
                                <th style="width: 60%;">عبارة عن</th>
                                <th> المرفق</th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody id="resultTable">
                            <?php
                            $counter = 1; ?>
                            <tr id="<?= $counter ?>">
                                <td style="width: 100px;"><input type="text" name="mehwar_rkm[]"
                                                                 data-validation="required"
                                                                 class="form-control text-center" value="1"></td>
                                <td>
                                    <input type="text" name="mehwar_title[]" data-validation="required"
                                           class="form-control text-center">
                                </td>
                                <td>
                                    <input type="file" name="mehwar_morfaq[]" class="form-control ">
                                </td>

                                <td>
                                    <a href="#" onclick="add_row();$(this).remove();"><i
                                                class="fa fa-plus sspan"></i></a>
                                    <a class="" id="deleteRow" href="#" onclick="$('#1').remove(); ">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                </td>
                            </tr>


                            </tbody>
                            <tfoot>
                            <td colspan="4">
                                <input type="hidden" name="btn" value="btn">
                                <button type="button" onclick="check_button()" style="float: left;margin-left: 60px"
                                        class="btn-success btn-labeled btn" name="btn" value="1">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </tfoot>
                            </td>

                        </table>
                        <!--                        25-7-om  -->
                    </div>
                    <?php echo form_close() ?>
                <?php } else {
                    echo '<div class="alert alert-danger"> لا توجد جلسات !!</div>';

                } ?>
            </div>
        </div>
    </div>
</div>


<?php
/*
echo '<pre/>';
print_r($all_data);*/
if (isset($all_data) && $all_data != null) { ?>
    <div class="col-sm-12  ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات محاور الجلسات</h3>
            </div>
            <div class="panel-body">

                <div class="col-xs-12">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="" class=" example table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center">رقم الجلسة</th>
                                    <th class="text-center">تاريخ الجلسة</th>
                                    <th class="text-center"> المحاور</th>
                                    <th class="text-center">أعضاء الجلسة</th>
                                    <th class="text-center">الاجراء</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php $a = 1;
                                foreach ($all_data as $row) {
                                    $row->glsa_date_h = explode('/', $row->glsa_date_h)[2] . '/' . explode('/', $row->glsa_date_h)[1] . '/' . explode('/', $row->glsa_date_h)[0];
                                    $row->glsa_date_m = date('Y/m/d', strtotime($row->glsa_date_m));
                                    ?>
                                    <tr>
                                        <td><?php echo $a ?> </td>
                                        <td><?php echo $row->glsa_rkm; ?></td>
                                        <td onclick=" var arr_time=['<?= $row->glsa_date_h ?>','<?= $row->glsa_date_m ?>'];
                                                change_time(this, arr_time)"><?php echo $row->glsa_date_m . ' ' . 'م' ?>
                                        </td>

                                        <td data-toggle="modal" data-target="#myModal"
                                            onclick="get_table_mehwer(<?= $row->glsa_rkm ?>,'تفاصيل المحاور')"><i
                                                    class="fa fa-search-plus"></i></td>

                                        <td>
                                            <i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal"
                                               onclick="det_datiles(<?= $row->glsa_rkm ?>,'تفاصيل الأعضاء')"
                                               data-target="#myModal"></i>
                                        </td>

                                        <td class="text-center">


                                            <?php
                                            if ($row->galsa_finish == 0) { ?>


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
                                                        window.location="<?= base_url() . 'md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia/update/' . $row->glsa_rkm . '/' . $row->id ?>";
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
                                                        setTimeout(function(){window.location="<?= base_url() . 'md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia/delete/' . $row->glsa_rkm ?>";}, 500);
                                                        });'>
                                                    <i class="fa fa-trash"> </i></a>
                                                <!--  <button type="button" class="btn btn-success btn-xs"> إرسال المحاور لرئيس المجلس</button>
      -->


                                            <?php } elseif ($row->galsa_finish == 1) { ?>
                                                <span style="font-weight: normal !important;"
                                                      class="label-danger label label-default">لايمكن التعديل والحذف</span>
                                            <?php } ?>


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


<div class="modal " id="table_mehwer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> المحاور </h4>
            </div>

            <div class="modal-body" id="result_table_mehwer">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="pop_h"></h4>
            </div>
            <br>
            <div class="modal-body form-group col-sm-12 col-xs-12">
                <div id="members_data"></div>
            </div>
            <div class="modal-footer" style="border-top: 0;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>

    function det_datiles(glsa_rkm,text) {
        $('#pop_h').text(text);

        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/det_datiles'?>",
            data: {
                glsa_rkm: glsa_rkm
            }, beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (d) {

                $('#members_data').html(d);


            }
        });
    }
</script>

<script>
    function add_row() {
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var len = x.rows.length + 1;
        var dataString = 'length=' + len;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia/get_table',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#resultTable").append(html);
            }
        });

    }

</script>


<script>


    function check_button() {
        var x = document.getElementById('resultTable');
        if (x.rows.length > 0) {
            $('#myform').submit();
        } else {

            alert("من فضلك أضف محاور للجلسة !!");
        }
    }

</script>

<script>

    function get_table_mehwer(glsa_rkm,text) {
        // $("#table_mehwer").show();
        $('#pop_h').text(text);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia/get_table_mehwer',
            data: {glsa_rkm: glsa_rkm},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (html) {
                $("#members_data").html(html);
            }
        });

    }
</script>

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