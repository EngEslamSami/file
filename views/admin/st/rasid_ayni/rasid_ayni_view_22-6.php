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
            if (isset($get_rasid) && !empty($get_rasid)) {
                echo form_open_multipart('st/rasid_ayni/Rasid_ayni/Update/'.$get_rasid->id);
                $value = $get_rasid->proc_rkm;
                $readonly = 'readonly';
                $proc_type = $get_rasid->proc_type;
                $proc_date = $get_rasid->proc_date_ar;
                $storage_fk = $get_rasid->storage_fk;
                $submitEdit = 'submit';
                $submitAdd = 'button';

            } else {
                echo form_open_multipart('st/rasid_ayni/Rasid_ayni/add_rasid');
                $proc_type ='';
                $proc_date = date('Y-m-d');
                $storage_fk = '';
                $submitEdit = 'button';
                $submitAdd = 'submit';
                if (isset($proc_rkm) && $proc_rkm != 0) {
                    $readonly = 'readonly';
                    $value = $proc_rkm + 1;
                } else {
                    $readonly = '';
                    $value = '';
                }

            }
            ?>

            <div class="col-xs-12">
                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">رقم العملية</label>
                    <input type="number" name="proc_rkm" id="proc_rkm" value="<?= $value ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true" <?= $readonly ?>>
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">  نوع العملية</label>

                    <select class="form-control " id="proc_type" name="proc_type" class="form-control"
                            data-validation="required">

                        <option value="">اختر</option>

                        <?php
                        $process = array(1 => 'رصيد أول المدة', 2 => 'فروقات أرصدة');

                        foreach ($process as $key => $value) {
                            ?>
                            <option value="<?= $key; ?>"
                                <?php
                                if ($proc_type==$key){
                                    echo 'selected';
                                }
                                ?>

                            ><?= $value; ?></option>

                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> تاريخ العملية </label>
                    <input type="date" name="proc_date" id="proc_date" value="<?= $proc_date ?>"
                           class="form-control "
                           data-validation="required"
                           data-validation-has-keyup-event="true" >
                </div>

                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> المستودع</label>
                    <select class="form-control " id="storage_fk" name="storage_fk" class="form-control"
                            data-validation="required" onchange="getCode(this.value);">

                        <option value="">اختر</option>

                        <?php
                        if (isset($storage) && !empty($storage)) {
                            foreach ($storage as $row) {
                                ?>
                                <option value="<?php echo $row->id_setting; ?>"
                                    <?php
                                    if ($storage_fk==$row->id_setting){
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $row->title_setting; ?></option>

                            <?php }
                        } ?>
                    </select>
                </div>

            </div>

            <div class="col-md-12 no-padding">

                <table id="table_anf" class="table-bordered table table-responsive tb-table" style="table-layout: fixed;">
                    <thead>
                    <tr class="greentd">
                        <th style="width:30px">م</th>
                        <th style="width:100px">كود الصنف</th>
                      <!--  <th>باركود</th> -->
                        <th>اسم الصنف</th>
                        <th style="width:70px"> الوحدة</th>
                        <th style="width:100px"> الرصيد المتاح</th>
                        <th style="width:100px"> الكمية</th>
                        <th style="width:100px"> سعر الوحدة</th>
                        <th style="width:110px"> القيمة الإجمالية</th>
                        <th style="width:120px"> تاريخ الصلاحية</th>
                        <th style="width:100px"> التشغيلة</th>
                        <th style="width:100px"> الرصيد الحالي</th>
                        <th style="width:26px;"> </th>
                    </tr>
                    </thead>
                    <tbody id="asnafe_table">
                    <?php
                    $total = 0;
                    if ((isset($get_rasid->details)) && (!empty($get_rasid->details)) && ($get_rasid->details != 0)) {
                        $z = 1;
                        foreach ($get_rasid->details as $sanfe) {
                            ?>
                            <tr id="row_<?= $z ?>">
                                <td><?= $z ?></td>
                                <td><input type="text" name="sanf_code[]" class="form-control testButton inputclass"
                                           id="sanf_code<?= $z ?>"
                                           value="<?= $sanfe->sanf_code ?>"
                                           ondblclick="$('#myModal').modal('show'); GetDiv_sanfe('myDiv_sanfe',<?= $z ?>)"
                                           readonly/></td>
                              <!--  <td><input type="text" name="sanf_coade_br[]" class="form-control testButton inputclass"
                                           id="sanf_coade_br<?= $z ?>"
                                           value="<?= $sanfe->sanf_coade_br ?>" readonly/></td>-->
                                <td><input type="text" name="sanf_name[]" class="form-control testButton inputclass"
                                           id="sanf_name<?= $z ?>"
                                           value="<?= $sanfe->sanf_name ?>" readonly/></td>
                                <td><input type="text" name="sanf_whda[]" class="form-control testButton inputclass"
                                           id="sanf_whda<?= $z ?>"
                                           value="<?= $sanfe->sanf_whda ?>" readonly/></td>
                                <td><input type="text" name="sanf_rased[]" class="form-control testButton inputclass"
                                           id="sanf_rased<?= $z ?>"
                                           value="<?= $sanfe->sanf_amount ?>" readonly/></td>
                                <td><input type="text" name="sanf_amount[]" oninput="get_total(this,<?= $z ?>)"
                                           class="form-control testButton inputclass"
                                           id="sanf_amount<?= $z ?>"
                                           value="<?= $sanfe->sanf_amount ?>"/></td>
                                <td><input type="text" name="sanf_one_price[]"
                                           class="form-control testButton inputclass" id="sanf_one_price<?= $z ?>"
                                           value="<?= $sanfe->sanf_one_price ?>" readonly/></td>
                                <td><input type="text" name="all_egmali[]" readonly
                                           class="form-control testButton inputclass"
                                           id="all_egmali<?= $z ?>"
                                           value="<?= $sanfe->all_egmali ?>"/></td>
                                <td><?php if(!empty($sanfe->sanf_salahia_date_ar)){
                                        $type='date';
                                        $read='';

                                    }else{
                                        $type='text';
                                        $read='readonly';
                                    }  ?>
                                    <input type="<?=$type?>" name="sanf_salahia_date[]"
                                           class="form-control testButton inputclass" id="sanf_salahia_date<?= $z ?>"
                                           value="<?= $sanfe->sanf_salahia_date_ar ?>" <?=$read?>/></td>
                                <td><input type="text" name="lot[]" id="lot<?= $z ?>" value="<?= $sanfe->lot ?>"/></td>
                                <td><input readonly type="text" name="rased_hali[]" class="form-control testButton inputclass"
                                           id="rased_hali<?= $z ?>"
                                           value="<?= $sanfe->rased_hali ?>"/></td>

                                <td style="padding: 8px 0;"><a id="1" onclick=" $(this).closest('tr').remove();set_sum();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            $total = $total + $sanfe->all_egmali;
                            $z++;
                        }
                    } else { ?>
                        <tr id="row_1">
                            <td>1</td>
                            <td><input type="text" name="sanf_code[]" class="form-control testButton inputclass"
                                       id="sanf_code1" value=""
                                       ondblclick="$('#myModal').modal('show'); GetDiv_sanfe('myDiv_sanfe',1)"
                                       readonly/></td>
                           <!-- <td><input type="text" name="sanf_coade_br[]" class="form-control testButton inputclass"
                                       id="sanf_coade_br1" value="" readonly/></td>-->
                            <td><input type="text" name="sanf_name[]" class="form-control testButton inputclass"
                                       id="sanf_name1" value="" readonly/></td>
                            <td><input type="text" name="sanf_whda[]" class="form-control testButton inputclass"
                                       id="sanf_whda1" value="" readonly/></td>
                            <td><input type="text" name="sanf_rased[]" class="form-control testButton inputclass"
                                       id="sanf_rased1" value="" readonly/></td>
                            <td><input type="text" name="sanf_amount[]" oninput="get_total(this,1)"
                                       class="form-control testButton inputclass"
                                       id="sanf_amount1" value=""/></td>
                            <td><input type="text" name="sanf_one_price[]" class="form-control testButton inputclass"
                                       id="sanf_one_price1" value="" readonly/></td>
                            <td><input type="text" name="all_egmali[]" readonly
                                       class="form-control testButton inputclass"
                                       id="all_egmali1" value=""/></td>
                            <td><input type="text" name="sanf_salahia_date[]" class="form-control testButton inputclass"
                                       id="sanf_salahia_date1" value=""/></td>
                            <td><input type="text" name="lot[]" class="form-control testButton inputclass" id="lot1"
                                       value=""/></td>
                            <td><input readonly type="text" name="rased_hali[]" class="form-control testButton inputclass"
                                       id="rased_hali1" value=""/></td>

                            <td style="padding: 8px 0;"><a id="1" onclick=" $(this).closest('tr').remove();set_sum();"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                    <th colspan="2" class="text-center"> <button type="button" onclick="add_row_sanfe()" class="btn-success btn" style="font-size: 16px;"><i
                                        class="fa fa-plus"></i> إضافة صنف
                            </button></th>
                        <th colspan="5" class="text-center"> <strong> الإجمالي </strong></th>
                        <th  id="total"><?= $total ?></th>
                        <th colspan="2"></th>
                        <th colspan="2" class="text-center">
                           <button type="button" onclick="" class="btn-danger btn" style="font-size: 16px;"><i
                                        class="fa fa-trash"></i> حذف صنف
                            </button>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-xs-12 text-center">

                <button type="<?= $submitAdd?>"  class="btn btn-labeled btn-success " name="save" value="save"   style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

                <button type="<?= $submitEdit ?>"  class="btn btn-labeled btn-warning" style="background-color: #FFB61E;border-color:#FFB61E"
                        name="edit" value="edit">
                    <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>تعديل
                </button>
                <?php if (isset($get_rasid) &&!empty($get_rasid)){
                    ?>
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
                            window.location="<?= base_url()."st/rasid_ayni/Rasid_ayni/Delete/".$get_rasid->id ?>";
                            });'>
                        <button type="button" class="btn btn-labeled btn-danger ">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                        </button>
                    </a>
                <?php
                } else{
                    ?>
                    <button type="button" class="btn btn-labeled btn-danger ">
                        <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                    </button>
                <?php
                }?>

                <?php
                if (isset($get_rasid)&& !empty($get_rasid)){
                    ?>
                    <button
                            type="button" onclick="print_rasid(<?= $get_rasid->id?>)"
                            class="btn btn-labeled btn-purple ">
                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                    </button>
                <?php
                } else{
                    ?>
                    <button type="button" class="btn btn-labeled btn-purple">
                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                    </button>
                <?php
                }
                ?>

                <button type="button" class="btn btn-labeled btn-inverse "  id="attach_button" data-target="#searchModal"  data-toggle="modal" >
                    <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                </button>


            </div>
            <?php
            echo form_close();
            ?>

        </div>
    </div>
</div>


<?php
if (isset($all_rasid)&& !empty($all_rasid)){
    $x=1;
    ?>
    <div class="col-xs-12 no-padding ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?> </h3>
            </div>
            <div class="panel-body">
             
                    <table class="table example table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th>رقم العملية</th>
                            <th>تاريخ العملية</th>
                            <th>نوع العملية</th>
                            <th> اسم المستودع</th>
                   
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($all_rasid as $all){
                            ?>
                            <tr>
                                <td><?= $x++?></td>
                                <td><?= $all->proc_rkm?></td>
                                <td><?= $all->proc_date_ar?></td>
                                <td><?= $all->proc_type_n?></td>
                                <td><?= $all->storage_name?></td>
                                <td>
                                    <a type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#detailsModal" style="padding: 1px 5px;" onclick="load_page(<?= $all->id?>)";><i class="fa fa-list"></i></a>

                                
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

                                        window.location="<?php echo base_url(); ?>st/rasid_ayni/Rasid_ayni/Update/<?php echo $all->id; ?>";
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
                                        window.location="<?= base_url()."st/rasid_ayni/Rasid_ayni/Delete/".$all->id ?>";
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


<!-- Asnaf Modal -->
<div class="modal fade" id="asnafModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> الأصناف </h4>
            </div>
            <div class="modal-body">

                <table id="" class="table table-bordered example" role="table">
                    <thead>
                        <tr class="greentd">
                            <th style="font-size: 15px; width:88px !important; ">#</th>
                            <th style="font-size: 15px;" class="text-left"> كود الصنف</th>
                            <th style="font-size: 15px;" class="text-left">إسم الصنف</th>
                            <th style="font-size: 15px;" class="text-left">  الوحدة</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($asnaf) && !empty($asnaf)) {
                        $x = 1;
                        foreach ($asnaf as $asnaf) {
                            //  $onclick = "$('#name').val(" .$supplier->name. "); $('#myModal').modal('hide');";


                            ?>
                            <tr ondblclick="get_asnaf(<?= $asnaf->code ?>,<?= $asnaf->code_br ?>,'<?= $asnaf->name ?>','<?= $asnaf->wehda_name ?>',<?= $asnaf->price ?>,<?= $asnaf->slahia ?>);">
                                <td>
                                    <input type="radio" name="r" ondblclick="get_asnaf(<?= $asnaf->code ?>,<?= $asnaf->code_br ?>,'<?= $asnaf->name ?>','<?= $asnaf->wehda_name ?>',<?= $asnaf->price ?>,<?= $asnaf->slahia ?>);">
                                </td>
                                <td><?= $asnaf->code ?></td>
                                <td><?= $asnaf->name ?></td>
                                <td><?= $asnaf->wehda_name ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- Asnaf Modal -->

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
                        type="button" onclick="print_rasid(document.getElementById('rasid_id').value)"
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> الأصناف </h4>
            </div>
            <div class="modal-body">
                <div id="myDiv_sanfe"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<!--Search Modal -->


<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">بحث</h4>
            </div>
            <div class="modal-body" id="div_search">

                <div class="col-md-12">

                    <div class="col-md-1">
                        <h6 class="label_title_2 label-blue ">بحث ب </h6>
                    </div>
                    <div class="col-md-3  no-padding">
                        <?php
                        $array_search = array(
                            'proc_rkm'=>' رقم العملية ',
                            'proc_type'=>' نوع العملية ',
                            'proc_date_ar'=>' تاريخ العملية ',
                            'storage_fk'=>'المستودع '

                        );
                        ?>

                        <select  id="array_search_id" class="form-control  input_style_2 "
                                 aria-required="true" onchange="check_val($(this).val())"  >
                            <option value="">إختر</option>

                            <?php foreach ($array_search as $key=>$row_search){ ?>
                                <option value="<?=$key?>" ><?=$row_search?> </option>
                            <?php } ?>
                        </select>

                    </div>


                    <div class="col-md-3  no-padding input_search_id" style="display:none; margin-left: 0;">


                        <input  id="input_search_id" name="name" value="" class="form-control  input_style_2 " aria-required="true"  >



                    </div>

                    <div class="col-md-4 no-padding input_search_id2" style="display:none; margin-left: 0;">

                        <select id="select_search_id2" class="form-control  input_style_2 "
                                aria-required="true">
                            <option value=""> اختر</option>
                        </select>

                    </div>


                    <div class="col-md-3  padding-4 input_search_id3" style="display:none; margin-left: 0;">

                        <select id="select_search_id3" class="form-control  input_style_2 "
                                aria-required="true">
                            <option value=""> اختر</option>
                            <?php
                            $process = array(1 => 'رصيد أول المدة', 2 => 'فروقات أرصدة');

                            foreach ($process as $key => $value) {
                                ?>
                                <option value="<?= $key; ?>"

                                ><?= $value; ?></option>

                            <?php } ?>
                        </select>

                    </div>

                    <button type="button"  onclick="searchResults()" class="btn btn-success btn-next"/><i class="fa fa-search-plus"></i> بحث </button><br><br>

                </div>


                <table  id="table"  class="table example table-striped table-bordered" style="display: none;">

                    <thead>
                    <tr class="info myTable">
                        <th  class="text-center myclass" > # </th>

                        <th>رقم العملية</th>
                        <th>نوع العملية</th>
                        <th>تاريخ العملية</th>
                        <th>المستودع</th>

                    </tr>
                    </thead>
                    <tbody class="result_search_modal">

                    </tbody>
                </table>


            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">

                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق</button>

            </div>
        </div>
    </div>
</div>
<!--Search Modal -->

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
    function add_row(){
   //     $("#details_table").show();
        $("#no_details").remove();
        var x = document.getElementById('result');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>st/rasid_ayni/Rasid_ayni/get_asnaf',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){

                $("#result").append(html);

            }
        });
    }
    //--------
    //-----------------------------------------------
</script>
<script>
    function get_asnaf(code,br_code,name,we7da,price,salhia) {

        var modalID = $('#modalID').val();
        $('#sanf_code'+modalID).val(code);
        $('#sanf_coade_br'+modalID).val(br_code);
        $('#sanf_name'+modalID).val(name);
        $('#sanf_whda'+modalID).val(we7da);
        $('#sanf_one_price'+modalID).val(price);
        //  sanf_salahia_date
        if (salhia==0){
            $('#sanf_salahia_date'+modalID).attr('disabled','disabled');
        } else if(salhia==1){
            $('#sanf_salahia_date'+modalID).removeAttr('disabled');
        }

        $('#sanf_rased'+modalID).val('');
        $('#sanf_amount'+modalID).val('');
        $('#all_egmali'+modalID).val('');
        $('#sanf_salahia_date'+modalID).val('');
        $('#lot'+modalID).val('');
        $('#rased_hali'+modalID).val('');
        $('#asnafModal').modal('hide');



    }
</script>

<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>st/rasid_ayni/Rasid_ayni/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>
<script>
    function update_egmali(id) {

        var price =  $('#sanf_one_price'+id).val();
        var amount = $('#sanf_amount'+id).val();
        var all = price * amount ;
        //   alert(all);
        $('#all_egmali'+id).val(all);

    }
</script>

<script>
    function get_egmali(id) {


        var price =  $('#sanf_one_price'+id).val();
        var amount = $('#sanf_amount'+id).val();
        var all = price * amount ;

        $('#all_egmali'+id).val(all);

        var inputs = document.getElementsByClassName('calc'),

            result = document.getElementById('total_all'),
            sum = 0;
        for(var i=0; i<inputs.length-1; i++) {
            var ip = inputs[i];
            sum += parseFloat(ip.value) || 0;
            // alert($(inputs[i]).val());

        }
        //alert(sum);
        $('#total_all').val(sum);




    }
</script>
<script>
function print_rasid(row_id) {
var request = $.ajax({
// print_resrv -- print_contract
url: "<?=base_url().'st/rasid_ayni/Rasid_ayni/Print_rasid'?>",
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
<script>

    function GetMemberName(obj) {

        console.log(' obj :' + obj.dataset.name);
        var name = obj.dataset.name;
        var mob = obj.dataset.mob;
        var id = obj.dataset.id;
        document.getElementById('motbr3_name').value = name;
        document.getElementById('motbr3_jwal').value = mob;
        document.getElementById('motbr3_id_fk').value = id;

        $("#myModalInfo .close").click();

    }

    function Get_sanfe_Name(obj, id) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var code = obj.dataset.code;
        var code_br = obj.dataset.code_br;
        var whda = obj.dataset.whda;
        var price = obj.dataset.price;
        var slahia = obj.dataset.slahia;
        var sanf_rased = parseFloat(obj.dataset.all_rased);
        if (parseInt(slahia) == 1) {
            document.getElementById('sanf_salahia_date' + id).type = 'date';
        } else {
            document.getElementById('sanf_salahia_date' + id).type = 'text';
            $('#sanf_salahia_date' + id).attr('readonly','readonly');
            $('#sanf_salahia_date' + id).val('');

        }
        document.getElementById('sanf_name' + id).value = name;
        document.getElementById('sanf_code' + id).value = code;
        document.getElementById('sanf_coade_br' + id).value = code_br;
        document.getElementById('sanf_whda' + id).value = whda;
        document.getElementById('sanf_one_price' + id).value = price;
        document.getElementById('sanf_rased' + id).value = sanf_rased;

        $("#myModal .close").click();

    }

    function add_row_sanfe() {
        var table = document.getElementById('asnafe_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;

        var row = ' <tr id="row_1" >\n' +
            '                        <td>' + (len + 1) + '</td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_code[]" id="sanf_code' + (len + 1) + '" value=""  ondblclick="$(\'#myModal\').modal(\'show\'); GetDiv_sanfe(\'myDiv_sanfe\',' + (len + 1) + ')" readonly/></td>\n' +
            //'                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_coade_br[]" id="sanf_coade_br' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_name[]" id="sanf_name' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_whda[]" id="sanf_whda' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_rased[]" id="sanf_rased' + (len + 1) + '" value="" readonly /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_amount[]" oninput="get_total(this,' + (len + 1) + ')" id="sanf_amount' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_one_price[]" id="sanf_one_price' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="all_egmali[]" id="all_egmali' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_salahia_date[]" id="sanf_salahia_date' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="lot[]" id="lot' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input readonly type="text" class="form-control testButton inputclass" name="rased_hali[]" id="rased_hali' + (len + 1) + '" value="" /></td>\n' +
            '\n' +
            '                        <td style="padding: 8px 0;"><a id="1" onclick=" $(this).closest(\'tr\').remove(); set_sum();"><i class="fa fa-trash"></i></a></td>\n' +
            '                    </tr>';

        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);


    }

    function get_details_sanf(id) {
        var request = $.ajax({
            url: "<?=base_url() . 'st/ezn_edafa/Ezn_edafa/get_detailes'?>",
            type: "POST",
            data: {id: id}
        });
        request.done(function (msg) {
            //   alert(msg);
            var obj = JSON.parse(msg);
            if ( obj.tabr3.type_ezn==1) {
                var type="تبرعات عينية";

            }

            document.getElementById('ezn_rkm_pop').innerText = obj.tabr3.ezn_rkm;
            document.getElementById('type_ezn').innerHTML ='<strong>' + type + '</strong>';
            document.getElementById('ezn_rkm_pop_h').value = obj.tabr3.ezn_rkm;
            document.getElementById('ezn_date_ar_pop').innerText = obj.tabr3.ezn_date_ar;
            document.getElementById('all_value_pop').innerText = obj.tabr3.all_value;
            document.getElementById('ezn_date_ar_pop').innerText = obj.tabr3.ezn_date_ar;
            document.getElementById('fe2a_pop').innerText = obj.fe2a_title;
            document.getElementById('geha_jwal_pop').innerText = obj.tabr3.geha_jwal;
            document.getElementById('geha_name_pop').innerText = obj.tabr3.geha_name;
            document.getElementById('hesab_name_pop').innerText = obj.tabr3.hesab_name;
            document.getElementById('last_tabro3_date_ar_pop').innerText = obj.tabr3.last_tabro3_date_ar;
            document.getElementById('mostand_date_ar_pop').innerText = obj.tabr3.mostand_date_ar;
            document.getElementById('mostand_rkm_pop').innerText = obj.tabr3.mostand_rkm;
            document.getElementById('motbr3_jwal_pop').innerText = obj.tabr3.person_jwal;
            document.getElementById('motbr3_name_pop').innerText = obj.tabr3.person_name;
            document.getElementById('no3_tabro3_pop').innerText = obj.no3_tabro3_title;
            document.getElementById('band_pop').innerText = obj.band_title;
            document.getElementById('rkm_hesab_pop').innerText = obj.tabr3.rkm_hesab;
            document.getElementById('storage_name_pop').innerText = obj.tabr3.storage_name;

            if (obj.asnaf === 0) {
                document.getElementById('orders_details').style.display = 'none';
            } else {

                delete_table();
                document.getElementById('orders_details').style.display = 'inline-table';
                var total_pop = 0;
                for (var i = 0; i < obj.asnaf.length; i++) {
                    console.log('sanf_amount : ' + parseInt(obj.asnaf[i].sanf_amount));
                    total_pop = total_pop + parseFloat(obj.asnaf[i].all_egmali);
                    var row_html = ' <tr>\n' +
                        '                            <td >' + (i + 1) + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_code + ' </td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_coade_br + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_name + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_whda + '</td>\n' +
                        '                            <td >' + (obj.asnaf[i].sanf_rased) + '</td>\n' +
                        '                            <td >' + (obj.asnaf[i].sanf_amount) + ' </td>\n' +
                        '                            <td >' + (obj.asnaf[i].sanf_one_price) + '</td>\n' +
                        '                            <td >' + (obj.asnaf[i].all_egmali) + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].sanf_salahia_date_ar + '</td>\n' +
                        '                            <td >' + obj.asnaf[i].lot + '</td>\n' +
                        '                            <td >' + parseInt(obj.asnaf[i].rased_hali) + '</td>\n' +
                        '                        </tr>';
                    $('#orders_details_body').append(row_html);

                }

                $('#total_pop').text(total_pop);

            }


        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }

    function delete_table() {
        var table = document.getElementById('orders_details_body');
        var len = table.rows.length;
        console.log('lenthg  table : ' + len);
        $("#orders_details_body").find("tr").remove();


    }
</script>


<script>

    function GetDiv_sanfe(div, row_id) {
        html = '<div class="col-md-12"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الصنف </th><th style="width: 170px;" >أسم الصنف  </th><th style="width: 170px;" >الوحدة</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/rasid_ayni/Rasid_ayni/getConnection2/' + row_id,

            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
            ],

            buttons: [
                'pageLength',
                'copy',
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

            colReorder: true,
            destroy: true

        });
    }

</script>

<script>
    function get_total(amount, id) {
        console.log('amount :' + amount.value + " all_egmali: " + parseFloat($('#sanf_one_price' + id).val()));
        var sanf_rased = (parseInt($('#sanf_rased' + id).val()));
       // if (amount.value <= sanf_rased) {
            $('#all_egmali' + id).val((amount.value * parseFloat($('#sanf_one_price' + id).val())));
            $('#rased_hali' + id).val(parseFloat(sanf_rased) + parseFloat(amount.value));
            set_sum();
      //  }else {
      //       amount.value=0;
      //       $('#all_egmali' + id).val(0);
      //       $('#rased_hali' + id).val(0);
      //       set_sum();

      //  }
    }

    function set_sum() {
        var all_egmali = document.getElementsByName('all_egmali[]');
        var sum = 0;
        for (var i = 0; i < all_egmali.length; i++) {
            sum = sum + parseFloat(all_egmali[i].value);
        }
        console.log('sum :' + sum);

        $('#total').text(sum);
    }
</script>




<script>

    function check_val(valu)
    {

        $("th").remove(".myRow");
        $('.result_search_modal').html('   <tr >\n' +
            '                        <th colspan="6" class="myalert"><div style="color: red;"> لا توجد نتائج للبحث !!</div></th>\n' +
            '\n' +
            '                    </tr>');
        if(valu ==='proc_rkm')
        {
            $('.input_search_id').show();
            $('#input_search_id').attr('type','text');
            $('#input_search_id').val('');
            $('.input_search_id2').hide();
            $('.input_search_id3').hide();
           // $('.input_search_id3').hide();

        } else if(valu ==='proc_date_ar'){
            $('.input_search_id').show();
            $('#input_search_id').attr('type','date');
            $('#input_search_id').val('');
            $('.input_search_id2').hide();
         //   $('.input_search_id5').hide();
            $('.input_search_id3').hide();

        }
        else if (valu == 'storage_fk') {
            $('#select_search_id2').length=0;
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>st/rasid_ayni/Rasid_ayni/get_storage",

                success: function (d) {
                    jeson_data=JSON.parse(d);
                    $('#select_search_id2').html('');
                    $('#select_search_id2').append('<option value="">اختر </option>');

                    for (var i = 0; i < jeson_data.length ; i++) {

                        $('#select_search_id2').append('<option value="'+jeson_data[i].id_setting+'"> '+ jeson_data[i].title_setting+' </option>');
                    }
                }

            });

            $('.input_search_id2').show();
          //  $('.input_search_id2').hide();
            $('.input_search_id').hide();
            $('.input_search_id3').hide();
       //     $('.input_search_id5').hide();


        }
        else if (valu == 'proc_type') {
            //  $('#select_search_id1').length=0;

            $('.input_search_id3').show();
            $('.input_search_id2').hide();
            $('.input_search_id').hide();
        //    $('.input_search_id3').hide();


        }

    }
</script>

<script>

    function searchResults()
    {
        $('.example').show();
     //   var select_search_id1=$('#select_search_id1').val();
        var select_search_id2=$('#select_search_id2').val();
        var select_search_id3=$('#select_search_id3').val();
        var array_search_id=$('#array_search_id').val();
        var input_search_id=$('#input_search_id').val();
        //input_search_id  select_search_id
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>st/rasid_ayni/Rasid_ayni/get_search_result",
            data: {select_search_id2:select_search_id2,select_search_id3:select_search_id3,array_search_id:array_search_id,input_search_id:input_search_id },

            success: function (d) {
                //  alert(d);
                //     return;

                $('.result_search_modal').html(d);

            }

        });
    }
</script>
