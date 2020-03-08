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
</style>

<div class="col-xs-12 ">
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

            } else {
                echo form_open_multipart('st/rasid_ayni/Rasid_ayni/add_rasid');
                $proc_type ='';
                $proc_date = date('Y-m-d');
                $storage_fk = '';
                if (isset($proc_rkm) && $proc_rkm != 0) {
                    $readonly = 'readonly';
                    $value = $proc_rkm + 1;
                } else {
                    $readonly = '';
                    $value = '';
                }

            }
            ?>

            <div class="col-x-12">
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

            <div class="col-md-12">
                <input type="hidden" id="count_row" value="0" />


                <?php //if(isset($get_rasid->details) && !empty($get_rasid->details)){ ?>
                    <table class="table table-bordered"   >
                        <thead >
                        <tr class="success">
                            <th>م</th>

                            <th style="text-align: center">كود الصنف </th>
                            <th style="text-align: center">الباركود </th>
                            <th style="text-align: center">اسم الصنف </th>
                            <th style="text-align: center">الوحدة </th>
                            <th style="text-align: center"> سعر الوحدة </th>
                            <th style="text-align: center">الرصيد المتاح </th>
                            <th style="text-align: center"> الكمية </th>

                            <th style="text-align: center">  القيمة الإجمالية </th>
                            <th style="text-align: center">   تاريخ الصلاحية </th>
                            <th style="text-align: center">  التشغيلة </th>
                            <th style="text-align: center">  الرصيد الحالي </th>
                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody  id="result">
                        <?php if(isset($get_rasid->details) && !empty($get_rasid->details)){ ?>

                        <?php
                        $x=1;
                        $j=0;
                        foreach ($get_rasid->details as $item){
                            $j++;?>
                            <tr>
                                <td><?= $x++?></td>

                                <td>
                                    <input type="hidden" name="modalID" id="modalID">
                                    <input type="text" class="form-control testButton inputclass" name="sanf_code[]"
                                           id="sanf_code<?= $j ?>"
                                           readonly=""
                                           onclick="$('#modalID').val(<?=  $j ?>); $(this).removeAttr('readonly');"
                                           ondblclick="$(this).attr('readonly','readonly'); $('#asnafModal').modal('show');"
                                           style="cursor:pointer;" autocomplete="off"
                                           onkeypress="return isNumberKey(event);"
                                           onblur="$(this).attr('readonly','readonly')"
                                           value="<?= $item->sanf_code ?>">

                                </td>
                                <td>
                                    <input type="text" class="form-control inputclass" name="sanf_coade_br[]"
                                           data-validation="required"
                                           aria-required="true" readonly=""
                                           id="sanf_coade_br<?= $j ?>"
                                           style="width: 100% !important;"
                                           value="<?= $item->sanf_coade_br ?>"
                                    >
                                </td>
                                <td>
                                    <input type="text" class="form-control inputclass" name="sanf_name[]"
                                           data-validation="required"
                                           aria-required="true" readonly=""
                                           id="sanf_name<?= $j ?>"
                                           style="width: 100% !important;"
                                           value="<?= $item->sanf_name ?>"
                                    >
                                </td>
                                <td>
                                    <input type="text" class="form-control inputclass" name="sanf_whda[]"
                                           data-validation="required"
                                           aria-required="true" readonly=""
                                           id="sanf_whda<?=  $j ?>"
                                           style="width: 100% !important;"
                                           value="<?= $item->sanf_whda ?>"
                                    >
                                </td>
                                <td>
                                    <input type="text" class="form-control inputclass" name="sanf_one_price[]"
                                           data-validation="required"
                                           aria-required="true" readonly=""
                                           id="sanf_one_price<?=  $j ?>""
                                           style="width: 100% !important;"
                                           value="<?= $item->sanf_one_price ?>"

                                    >
                                </td>
                                <td>
                                    <input type="text" name="sanf_rased[]"  value="<?= $item->sanf_rased ?>" id="sanf_rased<?=  $j?>""
                                           class="form-control "
                                    >
                                </td>
                                <td>
                                    <input type="text" name="sanf_amount[]" id="sanf_amount<?=  $j ?>"  value="<?= $item->sanf_amount ?>"
                                           class="form-control "
                                           onkeypress="validate_number(event);"
                                           onkeyup="update_egmali(<?= $j ?>)">

                                </td>
                                <td>
                                    <input type="text" name="all_egmali[]" id="all_egmali<?=  $j ?>"  value="<?= $item->all_egmali ?>"
                                           class="form-control calc"
                                           readonly>
                                </td>
                                <td>
                                    <input type="date" name="sanf_salahia_date[]" id="sanf_salahia_date<?=  $j ?>"  value="<?= $item->sanf_salahia_date_ar ?>"
                                           class="form-control "
                                        <?php
                                       if ($item->salhia==0){
                                           echo "disabled";
                                       }
                                        ?>   >
                                </td>

                                <td>
                                    <input type="text" name="lot[]" id="lot<?=  $j?>"  value="<?= $item->lot ?>"
                                           class="form-control "
                                    >
                                </td>

                                <td>
                                    <input type="text" name="rased_hali[]" id="rased_hali<?=  $j ?>"  value="<?= $item->rased_hali ?>"
                                           class="form-control "
                                           onkeypress="validate_number(event);"
                                    >
                                </td>
                                <td>
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
                                            window.location="<?= base_url()."st/rasid_ayni/Rasid_ayni/Delete_details/".$item->id ."/".$item->proc_rkm_fk?>";
                                            });'>
                                        <i class="fa fa-trash"> </i></a>




                                </td>


                            </tr>


                        <?php }
                        } else if (isset($get_rasid->details) && empty($get_rasid->details)){
                            ?>
                            <tr id="no_details">
                                <th colspan="13" style="text-align: center;color: red"> لا يوجد أصناف  </th>
                            </tr>
                        <?php
                        } else{
                            ?>
                            <tr id="1">
                                <td>1</td>

                                <td>
                                    <input type="hidden" name="modalID" id="modalID">
                                    <input type="text" class="form-control testButton inputclass" name="sanf_code[]"
                                           id="sanf_code1"
                                           readonly=""
                                           onclick="$('#modalID').val(<?= 1 ?>); $(this).removeAttr('readonly');"
                                           ondblclick="$(this).attr('readonly','readonly'); $('#asnafModal').modal('show');"
                                           style="cursor:pointer;" autocomplete="off"
                                           onkeypress="return isNumberKey(event);"
                                           onblur="$(this).attr('readonly','readonly')"
                                           value="">

                                </td>
                                <td>
                                    <input type="text" class="form-control inputclass" name="sanf_coade_br[]"
                                           data-validation="required"
                                           aria-required="true" readonly=""
                                           id="sanf_coade_br<?= 1 ?>"
                                           style="width: 100% !important;"
                                           value=""
                                    >
                                </td>
                                <td>
                                    <input type="text" class="form-control inputclass" name="sanf_name[]"
                                           data-validation="required"
                                           aria-required="true" readonly=""
                                           id="sanf_name<?= 1 ?>"
                                           style="width: 100% !important;"
                                           value=""
                                    >
                                </td>
                                <td>
                                    <input type="text" class="form-control inputclass" name="sanf_whda[]"
                                           data-validation="required"
                                           aria-required="true" readonly=""
                                           id="sanf_whda<?= 1 ?>"
                                           style="width: 100% !important;"
                                           value=""
                                    >
                                </td>
                                <td>
                                    <input type="text" class="form-control inputclass" name="sanf_one_price[]"
                                           data-validation="required"
                                           aria-required="true" readonly=""
                                           id="sanf_one_price<?= 1 ?>"
                                           style="width: 100% !important;"
                                           value=""

                                    >
                                </td>
                                <td>
                                    <input type="text" name="sanf_rased[]"  value="" id="sanf_rased<?= 1 ?>"
                                           class="form-control "
                                    >
                                </td>
                                <td>
                                    <input type="text" name="sanf_amount[]" id="sanf_amount1"  value=""
                                           class="form-control "
                                           onkeypress="validate_number(event);"
                                           onkeyup="get_egmali(<?= 1 ?>)">

                                </td>
                                <td>
                                    <input type="text" name="all_egmali[]" id="all_egmali1"  value=""
                                           class="form-control calc"
                                           readonly>
                                </td>
                                <td>
                                    <input type="date" name="sanf_salahia_date[]" id="sanf_salahia_date<?= 1 ?>"  value=""
                                           class="form-control "
                                           disabled>
                                </td>

                                <td>
                                    <input type="text" name="lot[]" id="lot<?= 1 ?>"  value=""
                                           class="form-control "
                                    >
                                </td>

                                <td>
                                    <input type="text" name="rased_hali[]" id="rased_hali<?= 1 ?>"  value=""
                                           class="form-control "
                                           onkeypress="validate_number(event);"
                                    >
                                </td>

                                <td>
                                    <a href="#" onclick="deleteRow(<?=1?>)">
                                        <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>


                                </td>
                            </tr>

                            <?php
                        } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="8" style="text-align: center;">الإجمالي</th>
                            <td colspan="4" id="total"><input type="text" name="total_all" value="<?php
                                if (isset($get_rasid->details) && !empty($get_rasid->details)){
                                    $tot=0;
                                 foreach ($get_rasid->details as $d){
                                     $tot +=$d->all_egmali;

                                 }
                                    echo $tot;
                                }?>" id="total_all" class="form-control calc" readonly ></td>
                            <td  colspan="1">
                                <button type="button" onclick="add_row()" class="btn-success btn"><i
                                            class="fa fa-plus"></i>
                                </button>
                            </td>
                        </tr>
                        </tfoot>

                    </table>
            </div>
            <div class="col-xs-12 text-center">

                <button type="submit"  class="btn btn-labeled btn-success " name="save" value="save"  style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
                <button type="button" class="btn btn-labeled btn-danger ">
                    <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                </button>

                <button type="button" class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <button type="button" class="btn btn-labeled btn-inverse "  id="attach_button" data-target="#myModal_search"  data-toggle="modal" >
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
    <div class="col-xs-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?> </h3>
            </div>
            <div class="panel-body">
                <div class="col-xs-12 " >
                    <table class="table example table-striped table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th>م</th>
                            <th>رقم العملية</th>
                            <th>تاريخ العملية</th>
                            <th>نوع العملية</th>
                            <th> اسم المستودع</th>
                            <th>التفاصيل</th>
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
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailsModal"  onclick="load_page(<?= $all->id?>)";>التفاصيل</button>

                                </td>
                                <td>
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

    </div>
    <?php
}
?>


<!-- Asnaf Modal -->
<div class="modal fade" id="asnafModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> الأصناف </h4>
            </div>
            <div class="modal-body">

                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
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
                <?php

                ?>
                <button
                        type="button" onclick="print_rasid(document.getElementById('rasid_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <?php
                //   }
                ?>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<!-- detailsModal -->

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
