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
  .table-result.table>thead>tr>td.info,.table-result.table>tbody>tr>td.info,
  .table-result.table>tfoot>tr>td.info,.table-result.table>thead>tr>th.info,
  .table-result.table>tbody>tr>th.info,.table-result.table>tfoot>tr>th.info,
  .table-result.table>thead>tr.info>td,.table-result.table>tbody>tr.info>td,
  .table-result.table>tfoot>tr.info>td,.table-result.table>thead>tr.info>th,
  .table-result.table>tbody>tr.info>th,.table-result.table>tfoot>tr.info>th {
        background-color: #4f7b00;
        color: #fff;
    }
    .table-striped>tbody>tr:nth-child(odd)>td,
    .table-striped>tbody>tr:nth-child(odd)>th {
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

</style>
<div class="col-sm-12 no-padding ">
    <div class="col-sm-12 ">
        <div class="panel panel-bd lobidisable lobipanel  lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?></h3>
            </div>
            <div class="panel-body">
                <?php if(!empty($last_galsa)){ ?>
                <?php

                    echo form_open_multipart(base_url() . 'md/all_mehwr/All_mehwr');

                ?>
                <div class="col-sm-12">
                    <div class="form-group col-sm-3">
                        <label class="label">كود المجلس </label>
                        <input type="text" class="form-control " value="<?=$last_galsa->mgls_code?>" readonly/>
                    </div>


                    <div class="form-group col-sm-3">
                        <label class="label">رقم الجلسة </label>
                        <input type="text" class="form-control "  readonly name="qrar_rkm" value="<?=$last_galsa->glsa_rkm?>"/>
                    </div>

                    <div class="form-group col-md-3 ">
                        <label class="label">تاريخ الجلسة</label>
                            <input  name="end_date_m" class="form-control"
                                   type="text"  readonly value="<?=$last_galsa->glsa_date_m?>"/>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button type="button" value="" id="" onclick="add_row()" class="btn btn-success btn-next"/>
                    <i class="fa fa-plus"></i> إضافة محور جديد </button><br><br>

                    <table class="table table-striped table-bordered table-result" style="display: none"  id="mytable">
                        <thead>
                        <tr class="info">
                            <th>رقم المحور</th>
                            <th>عبارة عن</th>
                        </tr>
                        </thead>
                        <tbody id="resultTable">

                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn-success btn-labeled btn" name="btn" value="1">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                </div>
                <?php echo form_close() ?>
                <?php } else {
                    echo'<div class="alert alert-danger"> لا توجد جلسات !!</div>';

                } ?>
            </div>
        </div>
    </div>
</div>
<?php if (isset($all_data) && $all_data != null) { ?>
    <div class="col-sm-12  ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات محاور الجلسات</h3>
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
                                    <th class="text-center">رقم الجلسة</th>
                                    <th class="text-center">تاريخ الجلسة</th>
                                    <th class="text-center">عدد المحاور</th>
                                    <th class="text-center">أعضاء الجلسة</th>
                                    <th class="text-center">الاجراء</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php $a = 1;
                                foreach ($all_data as  $row) {
                                   ?>
                                    <tr>
                                        <td><?php echo $a ?> </td>
                                        <td><?php echo $row->glsa_rkm;?></td>
                                        <td><?php echo $row->glsa_date_m;?></td>
                                        <td><?php echo $row->mehwr_num;?></td>
                                        <td>
                                            <i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal"
                                               data-target="#firstModal<?php echo $row->id ?>"></i>
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
                                                    window.location="<?= base_url() . 'md/all_mehwr/All_mehwr/update/' . $row->glsa_rkm ?>";
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
                                                    setTimeout(function(){window.location="<?= base_url() . 'md/all_mehwr/All_mehwr/delete/' . $row->glsa_rkm ?>";}, 500);
                                                    });'>
                                                <i class="fa fa-trash"> </i></a>
                                            <button type="button" class="btn btn-success btn-xs"> إرسال المحاور لرئيس المجلس</button>


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


<script>
    function add_row(){
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>md/all_mehwr/All_mehwr/get_table',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#resultTable").append(html);
            }
        });

    }

</script>