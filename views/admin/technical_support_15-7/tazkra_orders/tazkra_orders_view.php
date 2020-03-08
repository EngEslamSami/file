<style type="text/css">
    .top-label {
        font-size: 14px;
        font-weight: 500;

    }

    .print_forma {
        /*border:1px solid #73b300;*/
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {

        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
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
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }

    td input[type=radio] {
        height: 20px;
        width: 20px;
    }

    .tb-table tbody th, .tb-table tbody td {
        padding: 0px !important;
    }

</style>


<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($get_tazkra) && !empty($get_tazkra)) {
                echo form_open_multipart('technical_support/tazkra_orders/Tazkra_orders/update_order/' . $get_tazkra->id);
                $qsm_id_fk = $get_tazkra->qsm_id_fk;
                $tazkra_mawdo3 = $get_tazkra->tazkra_mawdo3;
                $tazkra_no3 = $get_tazkra->tazkra_no3;
                $importance_type = $get_tazkra->importance_type;
                $tazkra_content = $get_tazkra->tazkra_content;


            } else {
                echo form_open_multipart('technical_support/tazkra_orders/Tazkra_orders/add_order');

                $qsm_id_fk = '';
                $tazkra_mawdo3 = '';
                $tazkra_no3 = '';
                $importance_type = '';
                $tazkra_content = '';



            }
            ?>
            <div class="col-xs-10">
                <div class="form-group col-md-3 col-sm-6 padding-4">

                    <label class="label"> القسم</label>
                    <select class="form-control " id="qsm_id_fk" name="qsm_id_fk" class="form-control"
                            data-validation="required" >

                        <option value="">اختر</option>
                        <?php
                        if (isset($deparments) && !empty($deparments)) {
                            foreach ($deparments as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>"
                                    <?php
                                    if ($qsm_id_fk == $row->id) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $row->name; ?></option>

                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> موضوع التذكره</label>
                    <input type="text" name="tazkra_mawdo3" id="tazkra_mawdo3" value="<?= $tazkra_mawdo3 ?>"
                           class="form-control "
                           data-validation="required"
                        >

                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> نوع التذكره</label>
                    <select class="form-control " id="tazkra_no3" name="tazkra_no3" class="form-control"
                            data-validation="required" >

                        <option value="">اختر</option>

                        <?php
                        if (isset($tazkra_type) && !empty($tazkra_type)) {
                            foreach ($tazkra_type as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>"
                                    <?php
                                    if ($tazkra_no3 == $row->id) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $row->title; ?></option>

                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">  الأولوية</label>
                    <select class="form-control " id="importance_type" name="importance_type" class="form-control"
                            data-validation="required" >

                        <option value="">اختر</option>

                        <?php
                        if (isset($importance) && !empty($importance)) {
                            foreach ($importance as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>"
                                    <?php
                                    if ($importance_type == $row->id) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $row->title; ?></option>

                            <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-group col-md-6 col-sm-6 padding-4">
                    <label class="label"> تفاصيل التذكره</label>
                    <textarea name="tazkra_content" id="tazkra_content"
                           class="form-control "
                           data-validation="required"
                    ><?= $tazkra_content?></textarea>

                </div>

            </div>
            <div class="col-sm-2 no-padding">


                <?php  $this->load->view('admin/technical_support/tazkra_orders/sidebar_data');?>
            </div>
            <div class="col-xs-12 text-center">

                <button type="submit" class="btn btn-labeled btn-success " name="add" value="add"
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>ارسال التذكرة
                </button>
            </div>
            <?php
            echo form_close();
            ?>
            </div>

    </div>
    </div>
<?php
if (isset($all_tzaker) && !empty($all_tzaker)){
    $x=1;
    ?>
    <div class="col-xs-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title">التذاكر </h3>
    </div>
    <div class="panel-body">
        <table class="table example table-striped table-bordered dt-responsive nowrap">
            <thead>
            <tr class="greentd">
                <th>م</th>
                <th>رقم التذكرة</th>
                <th>التاريخ </th>
                <th> الوقت</th>
                <th> القسم</th>
                <th>الموضوع</th>
                <th>نوع التذكرة</th>
                <th>الأولويه</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($all_tzaker as $record){
                $full_date_arr = $record->date_ar;
                $full_date = explode(' ',$full_date_arr);
                $date = $full_date[0];
                $time = $full_date[1];
                ?>
                <tr>
                    <td><?= $x++?></td>
                    <td><?= $record->tazkra_num?></td>
                    <td><?= $date?></td>
                    <td><?= $time?></td>
                    <td><?= $record->qsm_n?></td>
                    <td><?= $record->tazkra_mawdo3?></td>
                    <td><?= $record->tazkra_no3_n?></td>
                    <td><?= $record->importance_n?></td>
                    <td><?php
                        echo 'جاري' ;
                        ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">اضافة</button>
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">الردود التي تمت عليها</a></li>
                                <li><a href="#">اضافة رد </a></li>
                                <li><a href="#">انهاء التذكره</a></li>
                                <li><a href="#"> التقييم</a></li>
                                <li><a href="#" onclick="print_order(<?= $record->id?>)"> طباعه</a></li>

                            </ul>
                        </div>
                        <a type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                           data-target="#detailsModal" style="padding: 1px 5px;"
                           onclick="load_page(<?= $record->id ?>)" ;><i class="fa fa-list"></i></a>
                        <a
                            href="<?= base_url().'technical_support/tazkra_orders/Tazkra_orders/add_attach/'.$record->id?>"

                           style="padding: 1px 5px;"
                          ><i class="fa fa-paperclip"></i></a>


                        <a href="#" onclick='swal({
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

                            window.location="<?php echo base_url(); ?>technical_support/tazkra_orders/Tazkra_orders/update_order/<?php echo $record->id; ?>";
                            });'>
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                        <a href="#" onclick='swal({
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
                            window.location="<?= base_url() . "technical_support/tazkra_orders/Tazkra_orders/delete_order/" . $record->id ?>";
                            });'>
                            <i class="fa fa-trash"> </i></a>


                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
<?php
}
?>

<!-- detailsModal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 82%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التفاصيل </h4>
            </div>
            <div class="modal-body" id="details_result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button
                    type="button" onclick="print_order(document.getElementById('order_id').value)"
                    class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<!-- detailsModal -->


<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>technical_support/tazkra_orders/Tazkra_orders/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>

<script>
    function print_order(row_id) {
        var request = $.ajax({
      // print_resrv -- print_contract
            url: "<?=base_url() . 'technical_support/tazkra_orders/Tazkra_orders/Print_order'?>",
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
