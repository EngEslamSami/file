<style type="text/css">
    /*  ul.nav-tabs {
          background-color: #fff;
          border-bottom: 1px solid #eee;
          box-shadow: -2px 2px 3px 2px #999;
          margin-bottom: 5px;
      }*/
    .plus-btn {
        padding: 6px 5px 5px 5px;
        background-color: green;
        color: #fff;
        border-radius: 50%;
    }

    .plus-btn:hover {
        color: #fff;
        border-radius: 0;
    }

    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 8px;
    }

    a.details {
        padding: 4px;
        background-color: blue;
        color: #fff;
        cursor: pointer;
    }

    .modal-header {
        padding: 6px 5px;
    }

    .modal-header h4 {
        color: #00310d;
    }

    .modal-header p {
        color: #555;
        margin-bottom: 0
    }

    .modal-body p {
        color: #555;
        font-size: 16px
    }

    .modal-body p span {
        color: #00310d;
        font-weight: 600
    }

    .tb-table tbody th, .tb-table tbody td,
    .tb-table tfoot td, .tb-table tfoot th {
        padding: 0px !important;
        text-align: center;
    }

    td input[type=radio] {
        height: 20px;
        width: 20px;
    }

</style>


<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body" style="min-height: 300px;">
            <!-- Nav tabs -->

            <?php
            if (isset($get_sarf) && !empty($get_sarf)) {
                $form = form_open_multipart("st/sarf/Sarf_order/Update_sarf/" . $get_sarf->id);
                $value = $get_sarf->ezn_rkm;
                $readonly = 'readonly';
                $submitEdit = 'edit';
                $submitAdd = 'edit';
                $ezn_date = $get_sarf->ezn_date_ar;
                // NEW __________

                $storage_fk = $get_sarf->storage_fk;
                $rkm_hesab = $get_sarf->rkm_hesab;
                $hesab_name = $get_sarf->hesab_name;
                $all_value = $get_sarf->all_value;
                $sarf_type = $get_sarf->sarf_type;
                $sarf_to_fk = $get_sarf->sarf_to_fk;
                $sarf_to_name = $get_sarf->sarf_to_name;
                $mostand_rkm = $get_sarf->mostand_rkm;
                $sarf_to_name = $get_sarf->sarf_to_name;
                $class = 'in active';
                $responsable_name = $get_sarf->responsable_name;


            } else {

                $form = form_open_multipart("st/sarf/Sarf_order/add_sarf");

                $submitEdit = 'save';
                $submitAdd = 'save';

                if (isset($ezn_rkm)) {
                    $readonly = 'readonly';
                    $value = $ezn_rkm + 1;
                }
                $ezn_date = date('Y-m-d');
                $storage_fk = '';
                $rkm_hesab = '';
                $hesab_name = '';
                $all_value = '';
                $sarf_type = '';
                $sarf_to_fk = '';
                $sarf_to_name = '';
                $mostand_rkm = '';
                $sarf_to_name = '';
                $responsable_name = '';
                if (isset($active)) {
                    $class = $active;
                } else {
                    $class = '';
                }


            }


            ?>
            <?php echo $form; ?>

            <!-- Tab panes -->
            <div class="">

                <div class="col-x-12">

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label  "> رقم إذن الصرف </label>
                        <input type="number" name="ezn_rkm" id="ezn_rkm" value="<?= $value ?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true" <?= $readonly ?>>
                        <!-- Nagwa 15-6 -->
                        <input type="hidden" name="sarf_type" id="sarf_type" value="">
                    </div>
                    <div class="form-group col-md-2 col-sm-6  padding-4">
                        <label class="label  "> تاريخ الصرف </label>
                        <input type="date" name="ezn_date" id="ezn_date" value="<?= $ezn_date ?>"
                               class="form-control "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-3 col-sm-6  padding-4">
                        <label class="label  "> المستودع</label>
                        <select name="storage_fk" id="storage_fk" class="form-control " data-validation="required"
                                onchange="getCode(this.value)">
                            <option value="" selected>اختر</option>
                            <?php
                            if (isset($storage) && !empty($storage)) {
                                foreach ($storage as $row) {
                                    ?>
                                    <option value="<?php echo $row->id_setting; ?>"
                                        <?php
                                        if ($storage_fk == $row->id_setting) {
                                            echo 'selected';
                                        }
                                        ?>
                                    ><?php echo $row->title_setting; ?></option>

                                <?php }
                            } ?>


                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6  padding-4">
                        <label class="label  "> رقم الحساب </label>
                        <input type="number" name="rkm_hesab" id="rkm_hesab" value="<?= $rkm_hesab ?>"
                               class="form-control "
                               data-validation="required"
                               readonly>
                    </div>
                    <div class="form-group col-md-3 col-sm-6  padding-4">
                        <label class="label  "> اسم الحساب </label>
                        <input type="text" name="hesab_name" id="hesab_name" value="<?= $hesab_name ?>"
                               class="form-control "
                               data-validation="required"
                               readonly>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label  "> رقم ملف الأسرة/الجهة </label>
                        <input type="number" name="sarf_to_fk" id="sarf_to_fk" value="<?= $sarf_to_fk ?>"
                               class="form-control testButton inputclass"
                               style="cursor:pointer; width:79%;float: right;" autocomplete="off"
                               ondblclick="$(this).attr('readonly','readonly'); $('#Modal_family').modal('show');"
                               onblur="$(this).attr('readonly','readonly')"
                               onkeypress="return isNumberKey(event);"
                               data-validation="required"
                               readonly>

                        <button type="button" data-toggle="modal" data-target="#Modal_family"
                                class="btn btn-success btn-next" style="float: right;">
                            <i class="fa fa-plus"></i></button>
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label  "> الإسم </label>

                        <input type="text" class="form-control inputclass" name="sarf_to_name"
                               onkeypress="validate_number(event)"
                               aria-required="true" readonly=""
                               id="sarf_to_name"
                               style="width: 100% !important;"
                               value="<?= $sarf_to_name ?>"
                               data-validation="required"
                        />

                    </div>


                    <div class="form-group col-md-3 col-sm-6  padding-4 ">
                        <label class="label  ">اسم المستلم </label>
                        <input type="text" class="form-control " name="responsable_name"
                               id="responsable_name" style="width: 86%;float: right"
                               value="<?= $responsable_name ?>" data-validation="required">
                        <button type="button" data-toggle="modal"
                                data-target="#myModalInfo_family"
                                onclick="get_family_mumber($('#sarf_to_fk').val())"
                                class="btn btn-success btn-next"

                                style="/*float: left;*/">
                            <i class="fa fa-plus"></i></button>
                    </div>


                    <div class="form-group col-md-2 col-sm-6  padding-4">
                        <label class="label  "> رقم طلب الخدمة </label>
                        <input type="text" name="mostand_rkm" id="mostand_rkm" value="<?= $mostand_rkm ?>"
                               class="form-control "
                               onkeypress="validate_number(event)"/>
                    </div>

                </div>

                <div class="col-md-12 no-padding">

                    <table id="table_anf" class="table-bordered table table-responsive tb-table">
                        <thead>

                        <tr class="greentd">
                            <th style="width:30px">م</th>
                            <th style="width:100px">كود الصنف</th>
                            <th>اسم الصنف</th>
                            <th style="width:70px"> الوحدة</th>
                            <th style="width:100px"> الرصيد المتاح</th>
                            <th style="width:100px"> الكمية</th>
                            <th style="width:100px"> سعر الوحدة</th>
                            <th style="width:110px"> القيمة الإجمالية</th>
                            <th style="width:120px"> تاريخ الصلاحية</th>
                            <th style="width:100px"> التشغيلة</th>
                            <th style="width:100px"> الرصيد الحالي</th>
                            <th style="width: 100px;">الإجراء</th>
                        </tr>

                        </thead>
                        <tbody id="asnafe_table">
                        <?php
                        $total = 0;
                        if ((isset($get_sarf->details)) && (!empty($get_sarf->details)) && ($get_sarf->details != 0)) {
                            $z = 1;
                            foreach ($get_sarf->details as $sanfe) {
                                ?>
                                <tr id="row_<?= $z ?>">
                                    <td><?= $z ?></td>
                                    <td><input type="text" name="sanf_code[]" class="form-control testButton inputclass"
                                               id="sanf_code<?= $z ?>"
                                               value="<?= $sanfe->sanf_code ?>"
                                               ondblclick="GetDiv_sanfe('myDiv_sanfe',<?= $z ?>)"
                                               readonly/></td>
                                    <td><input type="text" name="sanf_name[]" class="form-control testButton inputclass"
                                               id="sanf_name<?= $z ?>"
                                               value="<?= $sanfe->sanf_name ?>" readonly/></td>
                                    <td><input type="text" name="sanf_whda[]" class="form-control testButton inputclass"
                                               id="sanf_whda<?= $z ?>"
                                               value="<?= $sanfe->sanf_whda ?>" readonly/></td>
                                    <td><input type="text" name="sanf_rased[]"
                                               class="form-control testButton inputclass"
                                               id="sanf_rased<?= $z ?>"
                                               value="<?= $sanfe->sanf_rased ?>" readonly/></td>
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
                                    <td><?php if (!empty($sanfe->sanf_salahia_date_ar)) {
                                            $sanf_salahia_date = $sanfe->sanf_salahia_date_ar;
                                            if ($sanfe->salhia == 0) {
                                                $readonly = 'readonly';
                                            } else {
                                                $readonly = '';
                                            }
                                        } else {
                                            $sanf_salahia_date = '';
                                        } ?>
                                        <input type="date" name="sanf_salahia_date[]"
                                               class="form-control testButton inputclass"
                                               id="sanf_salahia_date<?= $z ?>"
                                               value="<?= $sanf_salahia_date ?>" <?= $readonly ?>/></td>
                                    <td><input type="text" name="lot[]" id="lot<?= $z ?>" value="<?= $sanfe->lot ?>"/>
                                    </td>
                                    <td><input readonly type="text" name="rased_hali[]"
                                               class="form-control testButton inputclass"
                                               id="rased_hali<?= $z ?>"
                                               value="<?= $sanfe->rased_hali ?>"/></td>

                                    <td><a id="1" onclick=" $(this).closest('tr').remove();set_sum();"><i
                                                    class="fa fa-trash"></i></a>
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
                                           id="sanf_code1" value="" data-validation="required"
                                           ondblclick="GetDiv_sanfe('myDiv_sanfe',1)"
                                           readonly/></td>

                                <td><input type="text" name="sanf_name[]" class="form-control testButton inputclass"
                                           id="sanf_name1" data-validation="required" value="" readonly/></td>
                                <td><input type="text" data-validation="required" name="sanf_whda[]"
                                           class="form-control testButton inputclass"
                                           id="sanf_whda1" value="" readonly/></td>
                                <td><input type="text" data-validation="required" name="sanf_rased[]"
                                           class="form-control testButton inputclass"
                                           id="sanf_rased1" value="" readonly/></td>
                                <td><input type="text" data-validation="required" name="sanf_amount[]"
                                           oninput="get_total(this,1)"
                                           class="form-control testButton inputclass"
                                           id="sanf_amount1" value=""/></td>
                                <td><input type="text" data-validation="required" name="sanf_one_price[]"
                                           class="form-control testButton inputclass"
                                           id="sanf_one_price1" value="" readonly/></td>
                                <td><input type="text" name="all_egmali[]" readonly
                                           class="form-control testButton inputclass"
                                           id="all_egmali1" value=""/></td>
                                <td><input readonly type="date" name="sanf_salahia_date[]"
                                           class="form-control testButton inputclass"
                                           id="sanf_salahia_date1" value=""/></td>
                                <td><input type="text" name="lot[]"
                                           class="form-control testButton inputclass" id="lot1"
                                           value=""/></td>
                                <td><input readonly type="text" name="rased_hali[]"
                                           class="form-control testButton inputclass"
                                           id="rased_hali1" value=""/></td>

                                <td><a id="1" onclick=" $(this).closest('tr').remove();set_sum();"><i
                                                class="fa fa-trash"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                        <tfoot>

                        <tr>
                            <th colspan="2" class="text-center" style="background-color: #fff;">
                                <button type="button" onclick="add_row_sanfe()" class="btn-success btn"
                                        style="font-size: 16px;"><i class="fa fa-plus"></i> إضافة صنف
                                </button>
                            </th>
                            <th colspan="5" class="text-center" style="background-color: #fcb632;"><strong>
                                    الإجمالي </strong></th>
                            <th id="total" style="background-color: #fcb632;"><?= $total ?>
                            <input name="all_value" id="all_value" value="0"/>
                            </th>
                            <th colspan="3" style="background-color: #fff;"></th>
                            <th colspan="2" class="text-center" style="background-color: #fff;">
                                <button type="button" onclick="" class="btn-danger btn" style="font-size: 16px;"><i
                                            class="fa fa-trash"></i> حذف صنف
                                </button>
                            </th>
                        </tr>

                        </tfoot>
                    </table>
                </div>


                <div class="col-xs-12 text-center" style="margin-bottom: 15px;">

                    <button type="submit" class="btn btn-labeled btn-success " name="<?= $submitAdd ?>"
                            value="<?= $submitAdd ?>"
                            style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>

                    <button type="button" class="btn btn-labeled btn-danger ">
                        <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                    </button>


                    <button type="button" class="btn btn-labeled btn-purple"
                        <?php
                        if (isset($get_sarf) && !empty($get_sarf)) {
                            ?>
                            onclick="print_sarf(<?= $get_sarf->id ?>)"
                            <?php
                        }
                        ?>
                    >
                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                    </button>


                    <button type="button" class="btn btn-labeled btn-inverse " id="attach_button"
                            data-target="#searchModal" data-toggle="modal">
                        <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                    </button>


                </div>
                <div class="clearfix"></div>


                <?php
                if (isset($all_sarf) && !empty($all_sarf)) {
                    $x = 1;
                    ?>

                    <div class="col-xs-12 no-padding">

                        <table class="table-bordered table table-responsive example">
                            <thead>
                            <tr class="greentd">
                                <th>م</th>
                                <th>رقم إذن الصرف</th>
                                <th>تاريخ الصرف</th>
                                <th>المستودع</th>
                                <th>رقم الملف</th>
                                <th>الإسم</th>
                                <th>المستلم</th>
                                <th>الإجراء</th>
                                <th>القائم بالاضافة</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($all_sarf as $all) {
                                ?>
                                <tr>
                                    <td><?= $x++ ?></td>
                                    <td><?= $all->ezn_rkm ?></td>
                                    <td><?= $all->ezn_date_ar ?></td>
                                    <td><?= $all->storage_name ?></td>

                                    <td><?= $all->sarf_to_fk ?> </td>

                                    <td><?= $all->sarf_to_name ?></td>
                                    <td><?= $all->responsable_name ?></td>
                                    <td>
                                        <a type="button" class="btn btn-primary btn-xs" title="التفاصيل"
                                           data-toggle="modal" data-target="#detailsModal"
                                           onclick="load_page(<?= $all->id ?>);" style="padding: 1px 5px;"><i
                                                    class="fa fa-list"></i></a>


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

                                                window.location="<?php echo base_url(); ?>st/sarf/Sarf_order/Update_sarf/<?php echo $all->id; ?>";
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
                                                window.location="<?= base_url() . "st/sarf/Sarf_order/Delete_sarf/" . $all->id . '/' . $all->ezn_rkm ?>";
                                                });'>
                                            <i class="fa fa-trash"> </i></a>
                                        <a onclick="print_sarf2(<?= $all->id ?>)" title="طباعه"><i
                                                    class="fa fa-print"></i></a>


                                        <a title="عرض المرفق"
                                           onclick=" load_add_morfaq(<?php echo $all->ezn_rkm; ?>);$('#set').val(<?php echo $all->ezn_rkm; ?>)"
                                           data-toggle="modal"
                                           data-target="#modal-add_morfaq"> <i class="fa fa-cloud-upload"
                                                                               aria-hidden="true"></i> </a>
                                        <!--   <button type="button"

                                                onclick=' swal({
                                                        title: "هل تريد التحويل الي الشؤون الماليه؟",
                                                        text: "",
                                                        type: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonClass: "btn-success",
                                                        confirmButtonText: "نعم",
                                                        cancelButtonText: "إلغاء",
                                                        closeOnConfirm: false
                                                        },
                                                        function(){
                                                        swal("تم التحويل الي الشؤون الماليه !", "", "success");
                                                        change_status(<?php echo $all->id; ?>,$("#select<?php echo $all->id; ?>"));


                                                        });'

                                                name="select5" id="select<?php echo $all->id; ?>"
                                                class=" btn  btn-warning btn-labeled"><span
                                                    class="btn-label" style="padding: 1px 6px;"><i
                                                        class="fa fa-share"></i></span>التحويل للشؤون
                                            الماليه
                                        </button>
-->

                                    </td>
                                    <td>
    
    <span style="font-size: 12px; color: white !important; font-weight: normal;background-color: #c57400;    width: 150px;"
          class="badge badge-add"><?php echo $all->publisher_name; ?></span>

                                    </td>


                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>
                        </table>


                    </div>


                    <?php
                }
                ?>


            </div>


        </div>
    </div>
</div>


<div class="modal fade" id="myModal_attach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
            </div>


            <div class="modal-body">

                <?php echo form_open_multipart(base_url() . 'st/sarf/Sarf_order/add_attach') ?>
                <!-- <form method="post" action="<?php echo base_url() . 'st/sarf/Sarf_order/add_attach' ?>"> -->
                <input type="hidden" name="set" id="set" value=''/>
                <button type="button" onclick="add_row()" class="btn btn-success btn-next"/>
                <i class="fa fa-plus"></i> إضافة </button><br><br>
                <div class="AttachTable">
                    <table class="table table-striped table-bordered fixed-table mytable "
                    >
                        <thead>
                        <tr class="info">

                            <th class="text-center"> إسم المرفق</th>
                            <th class="text-center">المرفق</th>
                            <th class="text-center"> الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="attachTable">
                        <tr id="row_1">
                            <td><input type="input" name="title[]" id="title" class="form-control"
                                       data-validation="reuqired"></td>
                            <td><input type="file" name="file1[]"
                                       class="form-control testButton inputclass"
                                       id="file1" value=""

                                /></td>


                            <td><a id="1" onclick=" $(this).closest('tr').remove();"><i
                                            class="fa fa-trash"></i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <!--<input type="hidden" name="id" id="id" >-->
                <button type="submit" class="btn btn-success" style="display: inline-block;padding: 6px 12px;"
                        onclick="GetAttachTable()"
                        name="add_attach" id="saves" data-dismiss="modal">حفظ
                </button>
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
                </form>


            </div>

        </div>
    </div>
</div>


<!-- Details Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 85%;">
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
                        type="button"
                        onclick="print_sarf(document.getElementById('sarf_id').value)"
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

<?php
form_close();
?>
<!--  Modal_Family -->

<!--Asnaf Modal -->

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

<!--------------------------------------------------------------------------->
<div class="modal fade" id="Modal_family" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> رقم ملف الأسرة/الجهة </h4>
            </div>
            <div class="modal-body">
                <!--              <div >

                                    <input type="radio" id="radio_one" name="s_type" style="margin-right: 15px" value="1" onclick="radio_check()">
                                    <label for="radio_one"> أسر </label>

                                    <input type="radio" id="radio_two" name="s_type" style="margin-right: 15px" value="2" onclick="radio_check()">
                                    <label for="radio_two"> جهات </label>
                                </div>-->

                <div class="radio-content">


                    <input type="radio" id="radio_one" name="s_type" <?php if ($sarf_type == 1) { ?> checked
                    <?php } ?> value="1" onclick="radio_check()"/>
                    <label for="radio_one" class="radio-label"> أسر </label>
                </div>
                <div class="radio-content">

                    <input type="radio" id="radio_two" name="s_type" value="2" <?php if ($sarf_type == 2) { ?> checked
                    <?php } ?> onclick="radio_check()"/>
                    <label for="radio_two" class="radio-label"> جهات </label>

                </div>

                <div id="family_show" style="display: none;">
                    <table id="" class="table table-bordered example" role="table">
                        <thead>
                        <tr class="info">
                            <th style="font-size: 15px; width:88px !important; ">#</th>
                            <th style="font-size: 15px;" class="text-left">رقم الملف</th>
                            <th style="font-size: 15px;" class="text-left">إسم رب الأسرة</th>
                            <th style="font-size: 15px;" class="text-left"> عدد المستفيدين</th>
                            <th style="font-size: 15px;" class="text-left"> الفئة</th>
                            <th style="font-size: 15px;" class="text-left"> تاريخ آخر مساعدة</th>
                            <th style="font-size: 15px;" class="text-left"> رقم طلب الخدمة</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($family) && !empty($family)) {

                            foreach ($family as $row) {
                                ?>
                                <tr ondblclick="get_geha(<?= $row->file_num ?>,'<?= $row->father_full_name ?>')">
                                    <td ondblclick="get_geha(<?= $row->file_num ?>,'<?= $row->father_full_name ?>')">
                                        <input name="f_rkm" type="radio" value="">
                                    </td>
                                    <td><?= $row->file_num ?></td>
                                    <td><?= $row->father_full_name ?></td>
                                    <td><?= $row->mosatfed_num ?></td>
                                    <td>
                                        <?php
                                        if (!empty($row->nasebElfard)) {
                                            $color = '';
                                            if (!empty($row->nasebElfard['f2a']->color)) {
                                                $color = $row->nasebElfard['f2a']->color;
                                            }

                                            $title = '';
                                            if (!empty($row->nasebElfard['f2a']->title)) {
                                                $title = $row->nasebElfard['f2a']->title;
                                            }
                                            ?>
                                            <span title="نصيب الفرد = <?= round($row->nasebElfard['naseb']) ?>"
                                                  class="label label-pill"
                                                  style="color:black ;border-radius: 4px;vertical-align: middle;padding-top: 5px;font-size: 14px;background-color: <?= $color ?>">
                                        <?= $title ?>
                                    </span>
                                            <?php

                                        } else {
                                            ?>
                                            <span title="ريال 0" class="label label-pill" style="color:black ;
                    border-radius: 4px;vertical-align: middle;padding-top: 5px; font-size: 14px;
                    background-color:#62bd0f">
                                           أ
                                        </span>
                                            <?php
                                        }
                                        ?>

                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                        </tbody>
                    </table>

                </div>

                <div id="geha_show" style="display: none;">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input').show(); show_add()"
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
                                    <input type="text" name="mob" id="mob"
                                           value=""
                                           class="form-control input-style">
                                </div>
                                <div class="col-sm-3  col-md-3  ">
                                    <label class="label label-green  ">العنوان </label>
                                    <input type="text" name="address" id="address"
                                           value=""
                                           class="form-control input-style">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add" style="display: block;">
                                    <button type="button" onclick="add_geha($('#geha_title').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظs
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
                                        <td><input type="radio" name="radio" data-title="<?= $value->id ?>"
                                                   id="radio"
                                                   ondblclick="getTitle($(this).attr('data-title'),'<?php echo $value->name; ?>')">
                                        </td>
                                        <td><?= $value->name ?></td>
                                        <td><?= $value->mob ?></td>
                                        <td><?= $value->address ?></td>
                                        <td>
                                            <!--
                                          <a href="#" onclick="delte_geha(<?= $value->id ?>);"> <i class="fa fa-trash"> </i></a>

                                        <a href="#" onclick="update_geha(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
-->
                                            <a href="#" onclick="delte_geha(<?= $value->id ?>);"> <i
                                                        class="fa fa-trash"> </i></a>
                                            <a href="#" onclick="update_geha(<?= $value->id ?>);"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


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


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------------------------------->

<div class="modal fade" id="myModalInfo_family" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">افراد الاسرة</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <table class="table ">
                        <tbody id="family_member_body">

                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- new -->
<div class="modal fade" id="modal-add_morfaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">اضافة مرفقات</h4>
            </div>
            <div class="modal-body" id="my_morfaq_add">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- sora -->
<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    الصورة</h4>
            </div>
            <div class="modal-body">
                <img src="" id="img_morfaq"
                     width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>


<!--Asnaf Modal -->

<script>
    function radio_check() {
        $('input[name="s_type"]').change(function () {
            var value = $("input[name='s_type']:checked").val();
            //  alert(value);
            $('#sarf_type').val(value);
            if ($('#radio_one').prop('checked')) {
                $('#geha_show').hide();
                $('#family_show').show();

            } else if ($('#radio_two').prop('checked')) {
                $('#family_show').hide();
                $('#geha_show').show();
            }
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

    //24-6-om
    function Get_sanfe_Name(obj, id) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var code = obj.dataset.code;
        var code_br = obj.dataset.code_br;
        var whda = obj.dataset.whda;
        var price = obj.dataset.price;
        var slahia = obj.dataset.slahia;
        var sanf_rased = parseFloat(obj.dataset.all_rased);
        if (parseInt(slahia) == 0) {
            $('#sanf_salahia_date' + id).attr('readonly', 'readonly');
            //    $('#sanf_salahia_date' + id).val('');

        } else {
            $('#sanf_salahia_date' + id).removeAttr('readonly');
        }
        document.getElementById('sanf_name' + id).value = name;
        document.getElementById('sanf_code' + id).value = code;
        document.getElementById('sanf_whda' + id).value = whda;
        document.getElementById('sanf_one_price' + id).value = price;
        document.getElementById('sanf_rased' + id).value = sanf_rased;
        // document.getElementById('sanf_amount' + id).value = sanf_amount;
        $('#sanf_amount' + id).val('');
        // 22_5 __________

        $('#lot' + id).val('');
        $('#rased_hali' + id).val('');

        // 22_5 __________

        $("#myModal .close").click();


    }

    function add_row_sanfe() {
        var table = document.getElementById('asnafe_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;

        var row = ' <tr id="row_1" >\n' +
            '                        <td>' + (len + 1) + '</td>\n' +
            '                        <td> <input type="text"     data-validation="required" class="form-control testButton inputclass" name="sanf_code[]" id="sanf_code' + (len + 1) + '" value=""  ondblclick="GetDiv_sanfe(\'myDiv_sanfe\',' + (len + 1) + ')" readonly/></td>\n' +
            '                        <td> <input type="text"   data-validation="required" class="form-control testButton inputclass" name="sanf_name[]" id="sanf_name' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text"   data-validation="required" class="form-control testButton inputclass" name="sanf_whda[]" id="sanf_whda' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text"   data-validation="required" class="form-control testButton inputclass" name="sanf_rased[]" id="sanf_rased' + (len + 1) + '" value="" readonly /></td>\n' +
            '                        <td> <input type="text"   data-validation="required" class="form-control testButton inputclass" name="sanf_amount[]" oninput="get_total(this,' + (len + 1) + ')" id="sanf_amount' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text"   data-validation="required" class="form-control testButton inputclass" name="sanf_one_price[]" id="sanf_one_price' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text"    class="form-control testButton inputclass" name="all_egmali[]" id="all_egmali' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input readonly type="date" class="form-control testButton inputclass" name="sanf_salahia_date[]" id="sanf_salahia_date' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text"    class="form-control testButton inputclass" name="lot[]" id="lot' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input readonly type="text" class="form-control testButton inputclass" name="rased_hali[]" id="rased_hali' + (len + 1) + '" value="" /></td>\n' +
            '\n' +
            '                        <td><a id="1" onclick=" $(this).closest(\'tr\').remove(); set_sum();"><i class="fa fa-trash"></i></a></td>\n' +
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
            if (obj.tabr3.type_ezn == 1) {
                var type = "تبرعات عينية";

            }

            document.getElementById('ezn_rkm_pop').innerText = obj.tabr3.ezn_rkm;
            document.getElementById('type_ezn').innerHTML = '<strong>' + type + '</strong>';
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
        var store_id = $('#storage_fk').val();
        //alert(store_id);

        if (store_id === '') {
            swal({
                title: "من فضلك اختر المستودع اولا ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });

        } else {
            $('#myModal').modal('show');

            html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الصنف </th><th style="width: 170px;" >أسم الصنف  </th><th style="width: 170px;" >الوحدة</th><th style="width: 50px;">  الرصيد المتاح </th>' +
                '</tr></thead><table><div id="dataMember"></div></div>';
            $("#" + div).html(html);
            $('#js_table_members2').show();
            var oTable_usergroup = $('#js_table_members2').DataTable({
                dom: 'Bfrtip',
                "ajax": '<?php echo base_url(); ?>st/sarf/Sarf_order/getConnection2/' + row_id + '/' + store_id,

                aoColumns: [
                    {"bSortable": true},
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

    }

</script>

<script>
    function get_total(amount, id) {
        console.log('amount :' + amount.value + " all_egmali: " + parseFloat($('#sanf_one_price' + id).val()));
        var sanf_rased = (parseFloat($('#sanf_rased' + id).val()));
        if (amount.value > sanf_rased) {
            amount.value = ' ';
        }
        $('#all_egmali' + id).val((amount.value * parseFloat($('#sanf_one_price' + id).val())));
        var rasid_hali = parseFloat(sanf_rased) - parseFloat(amount.value);
        if (isNaN(rasid_hali)) {
            rasid_hali = 0;
        }

        $('#rased_hali' + id).val(rasid_hali);

        set_sum();
    }

    function set_sum() {
        var all_egmali = document.getElementsByName('all_egmali[]');
        var sum = 0;
        for (var i = 0; i < all_egmali.length; i++) {
            sum = sum + parseFloat(all_egmali[i].value);
        }
        console.log('sum :' + sum);
        if (isNaN(sum)) {

        } else {
            $('#total').html(sum);
            $('#all_value').val(sum);
        }
        //  alert(sum);

    }
</script>

<script>
    function getCode(id) {
        var dataString = 'id=' + id;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/sarf/Sarf_order/get_code',
            data: dataString,
            dataType: 'html',

            cache: false,
            success: function (html) {
                //  alert(html);
                if (html == 0) {
                    swal({
                        title: "من فضلك راجع بيانات المستودع",
                        type: "warning",
                        confirmButtonClass: "btn-warning",
                        closeOnConfirm: false
                    });
                    //__________22_5_________________

                    $('#rkm_hesab').val(' ');
                    $('#hesab_name').val(' ');
                    //__________22_5_________________

                } else {
                    arr = JSON.parse(html);

                    $('#rkm_hesab').val(arr.rkm_hesab);
                    $('#hesab_name').val(arr.hesab_name);
                }


            }
        });

    }
</script>

<script>
    function get_geha(sarf_to_fk, sarf_to_name) {

        $('#sarf_to_name').val(sarf_to_name);
        $('#sarf_to_fk').val(sarf_to_fk);
        $('#Modal_family').modal('hide');

    }


</script>

<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>st/sarf/Sarf_order/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>


<script>
    function print_sarf(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'st/sarf/Sarf_order/Print_sarf'?>",
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
<!------------------------------------------------------------------------------->
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
                url: '<?php echo base_url() ?>st/sarf/sarf_order/insert_geha_ajax',
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
        }

    }


</script>


<script>
    function getTitle(value, name2) {


        $('#sarf_to_fk').val(value);
        $('#sarf_to_name').val(name2);

        $('#Modal_family').modal('hide');
    }
</script>

<script>

    function update_geha(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add').hide();
        $('#div_update').show();


        $.ajax({
            url: "<?php echo base_url() ?>st/sarf/sarf_order/getById",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                $('#geha_title').val(obj.name);
                $('#mob').val(obj.mob);
                $('#address').val(obj.address);
                $('#s_id').val(obj.id);


            }

        });

        $('#update').on('click', function () {
            var geha_title = $('#geha_title').val();
            var address = $('#address').val();
            var mob = $('#mob').val();
            var s_id = $('#s_id').val();

            $.ajax({
                url: "<?php echo base_url() ?>st/sarf/sarf_order/update_geha",
                type: "Post",
                dataType: "html",
                data: {geha_title: geha_title, address: address, mob: mob, id: s_id},
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
<!-------------------------------------------->
<script>
    function delte_geha(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/sarf/sarf_order/delete_geha',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $("#myDiv_geha").html(html);

                }
            });
        }

    }
</script>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script src="<?php echo base_url(); ?>asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>

<script>
    $('.skin-minimal .i-check input').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
        increaseArea: '20%'
    });

    $('.skin-square .i-check input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });


    $('.skin-flat .i-check input').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
    });

    $('.skin-line .i-check input').each(function () {
        var self = $(this),
            label = self.next(),
            label_text = label.text();

        label.remove();
        self.iCheck({
            checkboxClass: 'icheckbox_line-blue',
            radioClass: 'iradio_line-blue',
            insert: '<div class="icheck_line-icon"></div>' + label_text
        });
    });

</script>


<script>

    function GetAttachTable() {
        $('#AttachTableDiv').html('');
        $(".AttachTable").clone().appendTo('#AttachTableDiv');
        $("#myModal_attach .close").click();
    }
</script>
<script>
    function add_row() {
        var table = document.getElementById('morfq_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;

        var row = ' <tr id="row_1" >\n' +

            '                        <td> <input type="file"  class="form-control testButton inputclass" name="file[]" id="file' + (len + 1) + '" value=""   /></td>\n' +
            '                        <td><a id="1" onclick=" $(this).closest(\'tr\').remove(); "><i class="fa fa-trash"></i></a></td>\n' +
            '                    </tr>';

        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);


    }

    function DeleteRowImg(valu) {
        $('.' + valu).remove();
        // var x = document.getElementById('resultTable');
        var len = $(".attachTable").length;
        if (len == 0) {
            $(".mytable").hide();
        }
    }

</script>
<script>
    function checkInputs() {

        var inputsNotEmprty = [];
        $(".").each(function () {
            if ($(this).val() != '') {
                inputsNotEmprty.push($(this).val());
            }
        });

        $("#attach_button").attr('data-target', '#myModal_attach');


    }
</script>


<script>

    function get_family_mumber(file_num) {
        var sarf_type = $('input[name="s_type"]:checked').val();
        console.log('sarf_type : ' + $('input[name="s_type"]:checked').val());
        if (sarf_type == 1) {
            console.log('file_num : ' + file_num + isNaN(parseInt(file_num)));
            if (!isNaN(parseInt(file_num))) {
                $("#family_member_body").html('');
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>st/sarf/Sarf_order/family_member',
                    data: {file_num: file_num},
                    cache: false,
                    beforeSend: function () {
                        $('#family_member_body').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                    },
                    success: function (res) {
                        if (res != 0) {
                            var data = JSON.parse(res);
                            var html = '<tr>\n' +
                                '                            <td><input type="radio" name="member" ondblclick="$(\'#responsable_name\').val(\'' + data.full_name + '\' ); $(\'#myModalInfo_family\').modal(\'hide\');"></td>\n' +
                                '                            <td>' + data.full_name + '</td>\n' +
                                '                            <td>أم</td>\n' +
                                '                        </tr>';

                            for (var i = 0; i < data.sons.length; i++) {
                                html += '<tr>' +
                                    '                            <td><input type="radio" name="member" ondblclick="$(\'#responsable_name\').val(\'' + data.sons[i].member_full_name + '\'); $(\'#myModalInfo_family\').modal(\'hide\');"></td>\n' +
                                    '                            <td>' + data.sons[i].member_full_name + '</td>\n' +
                                    '                            <td>أبناء</td>\n' +
                                    '                        </tr>';
                            }
                            $("#family_member_body").html(html);
                        }
                    }
                });
            } else {

                swal({
                    title: 'من فضلك اختر رقم ملف الاسرة   ',
                    type: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'تم'
                });
            }
        }

    }

    function print_sarf2(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'st/sarf/Sarf_order/Print_sarf2'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            //   WinPrint.print();
            // WinPrint.close();
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }

</script>
<script>
    function change_status(id, element) {


        $(element).closest('tr').remove();
        $.ajax({
            url: "<?php echo base_url();?>st/sarf/Sarf_order/change_status",
            type: 'POST',
            data: {select5: id},
            dataType: 'JSON',
            success: function (html) {

            }
        });
    }
</script>


<script>
    function load_add_morfaq(ezn_rkm) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/sarf/Sarf_order/add_attach',
            data: {set: ezn_rkm},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#my_morfaq_add").html(html);

            }
        });

    }

    function delete_my_morfaq(elem, attach) {
        $(elem).closest("tr").remove();

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/sarf/Sarf_order/delete_attach',
            data: {attach: attach},
            dataType: 'html',
            cache: false,
            success: function (html) {

            }
        });

    }

</script>
