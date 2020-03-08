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

    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
    table  .headtr>td, table .headtr>th {
        /* background-color: #c1ccaf !important;
         color: #222 ;*/
        color: #d00303 !important;
        background-color: white !important;
    }
    table  .headtr2>td, table .headtr2>th {
        background-color: #ffa7a7 !important;
        color: #222 ;
    }
    table  tr>td, table tr>th {

        border: 2px double #000!important;
    }
    .table-mehwer tr>td textarea{
        /* background-color: #dbecbd;*/
        background-color: #ffffff;
        color: green;
    }

    .table>tbody>tr>th, .table>tfoot>tr>th,
    .table>thead>tr>td, .table>tbody>tr>td,
    .table>tfoot>tr>td {

        padding: 5px !important;
    }
    table .left-headtr>td,table .left-headtr>th{
        background-color: #f2a516;
    }
    .left-headtr label.label{
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
                <?php if(!empty($result)){ ?>
                    <?php

                    echo form_open_multipart(base_url() . 'md/all_mehwr/All_mehwr/update/'.$result->glsa_rkm);

                    ?>

                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="left-headtr">
                                <th class="text-center">كود المجلس</th>
                                <th class="text-center">رقم الجلسة</th>
                                <th class="text-center">تاريخ الجلسة</th>
                                <th class="text-center">أعضاء الجلسة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td><?=$result->mgls_code?></td>
                                <td><?=$result->glsa_rkm?></td>
                                <td><?php echo $result->glsa_date_m.' - '.$result->glsa_date_h?></td>
                                <td> <button type="button" class="btn btn-info "  data-toggle="modal"
                                             data-target="#myModal">أعضاء الجلسة</button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12">

                        <table class="table table-striped table-bordered table-result"  id="mytable">
                            <thead>
                            <tr class="info">
                                <th>رقم المحور</th>
                                <th>عبارة عن</th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody id="resultTable">
                            <?php if(!empty($result_details)){
                                $s=1;
                                foreach ($result_details as $row){ ?>

                                    <tr id="<?php echo$s;?>">
                                        <td style="width: 100px;"> <input type="text" name="mehwar_rkm[]" class="form-control text-center" value="<?php echo$row->mehwar_rkm;?>"></td>
                                        <td>
                                            <input type="text" name="mehwar_title[]" data-validation="required"  class="form-control text-center" value="<?php echo$row->mehwar_title;?>" >
                                        </td>
                                        <td>
                                            <?php if($s ==sizeof($result_details)) { ?>
                                                <a href="#" onclick="add_row();$(this).remove();"><i class="fa fa-plus sspan"></i></a>
                                            <?php } ?>
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
                                                    setTimeout(function(){window.location="<?= base_url() . 'md/all_mehwr/All_mehwr/delete_row/' . $row->id.'/'.$row->glsa_rkm ?>";}, 500);
                                                    });'>
                                                <i class="fa fa-trash"> </i></a></td>
                                    </tr>

                                    <?php $s++;} }?>

                            </tbody>
                            <tfoot>
                            <td colspan="3">
                                <button type="submit" style="float: left;margin-left: 60px" class="btn-success btn-labeled btn" name="btn" value="1">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </tfoot></td>

                        </table>
                        <div class="modal" id="myModal" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                            <div class="modal-dialog" role="document" style="width: 70%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close"
                                                data-dismiss="modal">&times;
                                        </button>
                                        <h4 class="modal-title"> أعضاء الجلسة</h4>
                                    </div>

                                    <div class="modal-body" style="padding: 20px">

                                        <?php if (!empty($glsa_members)){ ?>
                                            <table class="table table-striped table-bordered table-result" style="table-layout: fixed"   >
                                                <thead>
                                                <tr class="info">
                                                    <th style="width: 60Px">م</th>
                                                    <th style="width: 40%">إسم العضو</th>
                                                    <th>المنصب</th>
                                                    <!--<th>الحالة</th>-->
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $hala_type =array(0=>'جارى',1=>'تمت الموافقة',2=>'تم الرفض');

                                                $x =1;
                                                foreach ($glsa_members as $row){ ?>
                                                    <tr>
                                                        <td><?php echo $x; ?></td>
                                                        <td><?php echo $row->mem_name; ?></td>
                                                        <td><?php echo $row->mansp_title; ?></td>
                                                        <!--<td><?php if(!empty($hala_type[$row->hdoor_satus])) echo $hala_type[$row->hdoor_satus]; ?></td>-->
                                                    </tr>
                                                    <?php
                                                    $x++;}
                                                ?>
                                                </tbody>
                                            </table>


                                        <?php  } ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">إغلاق
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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