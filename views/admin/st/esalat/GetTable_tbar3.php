<!--<pre>-->
<!--    --><?php //print_r($result) ?>
<!--</pre>-->
<?php
if ((isset($result)) && (!empty($result))) {
    $submitSave = 'submit';
    $submitEdit = 'button';
    $ezn_date = $result->esal_date;
    $storage_fk = '';
    $storage_name = '';
    $rkm_hesab = '';
    $hesab_name = '';
    $all_value = $result->value;
    $motbr3_id_fk = $result->person_id_fk;
    $motbr3_name = $result->person_name;
    $motbr3_jwal = $result->person_mob;
    $last_tabro3_date = date('Y-m-d');
    $no3_tabro3 = '';
    $fe2a = '';
    $band = '';
    $mostand_rkm = '';
    $geha_name = '';
    $geha_jwal = '';
    $type_ezn = '';
    $pay_method = '';
    $supplier_name = '';
    $supplier_jwal = '';
    $mostand_date = date('Y-m-d');
} else {
//    echo form_open_multipart(base_url() . 'st/tabr3_ayni/Tabr3_ayni');
    $submitSave = 'submit';
    $submitEdit = 'button';
    $ezn_date = date('Y-m-d');
    $storage_fk = '';
    $storage_name = '';
    $rkm_hesab = '';
    $hesab_name = '';
    $all_value = '';
    $motbr3_id_fk = '';
    $motbr3_name = '';
    $motbr3_jwal = '';
    $last_tabro3_date = date('Y-m-d');
    $no3_tabro3 = '';
    $fe2a = '';
    $band = '';
    $mostand_rkm = '';
    $geha_name = '';
    $geha_jwal = '';
    $type_ezn = '';
    $pay_method = '';
    $supplier_name = '';
    $supplier_jwal = '';
    $mostand_date = date('Y-m-d');
}
?>
<div class="col-md-12">
    <div class="form-group col-md-1 col-sm-6 padding-4">
        <label class="label"> رقم الإذن </label>
        <input type="number" name="ezn_rkm" id="ezn_rkm" value="<?= $rkm_ezen ?>"
               class="form-control "
               data-validation="required"
               data-validation-has-keyup-event="true" readonly>

        <input type="hidden" name="esal_num" value="<?=$result->esal_num ?>">
    </div>

    <div class="form-group col-md-2 col-sm-6 padding-4">
        <label class="label"> تاريخ الإذن </label>
        <input type="date" name="ezn_date" id="ezn_date" value="<?= $ezn_date ?>"
               class="form-control "
               data-validation="required"
               data-validation-has-keyup-event="true">
    </div>

    <div class="form-group col-md-2 col-sm-6 padding-4">
        <label class="label"> المستودع </label>
        <select class="form-control " id="storage_fk" name="storage_fk" class="form-control"
                data-validation="required" onchange="getCode(this.value);">
            <option value="">اختر</option>
            <?php
            if (isset($storage) && !empty($storage)) {
                foreach ($storage as $row) {
                    ?>
                    <option value="<?php echo $row->id_setting; ?>"

                        <?php if ($row->id_setting == $storage_fk) {
                            echo 'selected';
                        } ?> ><?php echo $row->title_setting; ?></option>
                <?php }
            } ?>
        </select>
        <input type="hidden" name="storage_name" id="storage_name" value="<?= $storage_name ?>">
    </div>

    <div class="form-group col-md-2 col-sm-6 padding-4">
        <label class="label"> كود الحساب </label>
        <input type="text" name="rkm_hesab" id="rkm_ezn_edafa" value="<?= $rkm_hesab ?>"
               class="form-control "
               data-validation="required"
               data-validation-has-keyup-event="true" readonly>
    </div>

    <div class="form-group col-md-3 col-sm-6 padding-4">
        <label class="label"> اسم الحساب </label>
        <input type="text" name="hesab_name" id="ezn_edafa_name" value="<?= $hesab_name ?>"
               class="form-control "
               data-validation="required"
               data-validation-has-keyup-event="true" readonly>
    </div>
    <!--------------------------------------------->
    <div id="moshtrat">
        <div class="form-group col-md-1 col-sm-6 padding-4">
            <label class="label"> المبلغ </label>
            <input type="number" name="all_value" id="all_value" value="<?= $all_value ?>"
                   class="form-control "

                   data-validation-has-keyup-event="true" readonly>
        </div>

        <div class="form-group col-md-4 col-sm-6 padding-4">
            <label class="label"> اسم المتبرع </label>
            <input type="text" name="motbr3_name" id="motbr3_name" value="<?= $motbr3_name ?>"
                   style="width:90%; float: right;"
                   class="form-control "

                   data-validation-has-keyup-event="true">
            <button type="button" data-toggle="modal" data-target="#myModalInfo"
                    class="btn btn-success btn-next" style="float: right;" onclick="GetDiv('myDiv')">
                <i class="fa fa-plus"></i></button>
            <input type="hidden" name="motbr3_id_fk" id="motbr3_id_fk" value="<?= $motbr3_id_fk ?>">
        </div>

        <div class="form-group col-md-2 col-sm-6 padding-4">
            <label class="label"> رقم الجوال </label>
            <input type="number" name="motbr3_jwal" id="motbr3_jwal" value="<?= $motbr3_jwal ?>"
                   class="form-control "

                   data-validation-has-keyup-event="true">
        </div>

        <div class="form-group col-md-2 col-sm-6 padding-4">
            <label class="label"> تاريخ آخر تبرع </label>
            <input type="date" name="last_tabro3_date" id="last_tabro3_date" value="<?= $last_tabro3_date ?>"
                   class="form-control "
                   data-validation="required"
                   data-validation-has-keyup-event="true">
        </div>
        <div class="form-group col-md-1 col-sm-6 padding-4">
            <label class="label"> رقم السند </label>
            <input type="text" name="mostand_rkm" id="mostand_rkm" value="<?= $mostand_rkm ?>"
                   class="form-control "

                   data-validation-has-keyup-event="true">
        </div>

        <div class="form-group col-md-3 col-sm-6 padding-4">
            <label class="label"> اسم الجهة </label>
            <input type="text" name="geha_name" id="geha_name" value="<?= $geha_name ?>"
                   class="form-control "

                   data-validation-has-keyup-event="true">
        </div>

        <div class="form-group col-md-2 col-sm-6 padding-4">
            <label class="label"> رقم الجوال </label>
            <input type="number" name="geha_jwal" id="geha_jwal" value="<?= $geha_jwal ?>"
                   class="form-control "

                   data-validation-has-keyup-event="true">
        </div>

        <div class="form-group col-md-2 col-sm-6 padding-4">
            <label class="label"> تاريخ المستند </label>
            <input type="date" name="mostand_date" id="mostand_date" value="<?= $mostand_date ?>"
                   class="form-control "

                   data-validation-has-keyup-event="true">
        </div>
        <div class="form-group col-md-8 col-sm-6 padding-4">

            <table class="table table-striped  responsive nowrap">
                <thead>
                <tr>
                    <th> نوع التبرع</th>
                    <th> الفئة</th>
                    <th> البند</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                    <input type="hidden" name="fe2a[]" value="<?= $result->fe2a_type1 ?>">
                    <input type="hidden" name="band[]" value="<?= $result->bnd_type1 ?>">
                    <input type="hidden" name="no3_tabro3" value="<?= $result->erad_type ?>">
                    <td> <?= $result->erad_title ?>   </td>
                    <td> <?= $result->fe2a_type_title ?>   </td>
                    <td> <?= $result->band_title ?>   </td>
                </tr>
                <?php if (!empty($result->fe2a_type2)) { ?>
                    <tr>
                        <input type="hidden" name="fe2a[]" value="<?= $result->fe2a_type2 ?>">
                        <input type="hidden" name="band[]" value="<?= $result->bnd_type2 ?>">
                        <td> <?= $result->erad_title ?>   </td>
                        <td> <?= $result->fe2a_type_title2 ?>   </td>
                        <td> <?= $result->band_title2 ?>   </td>
                    </tr>
                <?php } ?>

                <?php if (!empty($result->fe2a_type3)) { ?>
                    <tr>
                        <input type="hidden" name="fe2a[]" value="<?= $result->fe2a_type3 ?>">
                        <input type="hidden" name="band[]" value="<?= $result->bnd_type3 ?>">
                        <td> <?= $result->erad_title ?>   </td>
                        <td> <?= $result->fe2a_type_title3 ?>   </td>
                        <td> <?= $result->band_title3 ?>   </td>
                    </tr>
                <?php } ?>

                <?php if (!empty($result->fe2a_type4)) { ?>
                    <tr>
                        <input type="hidden" name="fe2a[]" value="<?= $result->fe2a_type4 ?>">
                        <input type="hidden" name="band[]" value="<?= $result->bnd_type4 ?>">
                        <td> <?= $result->erad_title ?>   </td>
                        <td> <?= $result->fe2a_type_title4 ?>   </td>
                        <td> <?= $result->band_title4 ?>   </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <!--   <div class="form-group col-md-2 col-sm-6 padding-4">
                <label class="label"> نوع التبرع </label>
                <select name="no3_tabro3" id="no3_tabro3" disabled
                        class="form-control " data-validation-has-keyup-event="true">
                    <option> - إختر -</option>
                    <?php if (isset($erad_tabro3) && (!empty($erad_tabro3))) {
                foreach ($erad_tabro3 as $value) {
                    ?>
                            <option value="<?= $value->code ?>"
                                    data-from_id="<?= $value->from_id ?>"
                                <?php if ($result->erad_type == $value->from_id) echo 'selected' ?>> <?= $value->title ?></option>

                            <?php
                }
            }
            ?>
                </select>
            </div>-->
            <!--
        <div class="form-group col-md-2 col-sm-6 padding-4">
            <label class="label"> الفئة </label>
            <select name="fe2a" id="fe2a"
                    onchange="GEtF2a($('option:selected', this).attr('data-from_id'),'band')"
                    class="form-control "

                    data-validation-has-keyup-event="true">
                <?php if (isset($fe2a_title)) { ?>
                    <option value="<?= $fe2a ?>"><?= $fe2a_title ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-md-2 col-sm-6 padding-4">
            <label class="label"> البند </label>
            <select name="band" id="band"
                    class="form-control "

                    data-validation-has-keyup-event="true">
                <?php if (isset($band_title)) { ?>
                    <option value="<?= $band ?>"><?= $band_title ?></option>
                <?php } ?>
            </select>
        </div>-->
        </div>
    </div>

</div>
<div class="col-md-12">

    <table id="table_anf" class="table-bordered table table-responsive">
        <thead>
        <tr class="success">
            <th>م</th>
            <th>كود الصنف</th>
            <th>باركود</th>
            <th>اسم الصنف</th>
            <th> الوحدة</th>
            <th> الرصيد المتاح</th>
            <th> الكمية</th>
            <th> سعر الوحدة</th>
            <th> القيمة الإجمالية</th>
            <th> تاريخ الصلاحية</th>
            <th> التشغيلة</th>
            <th> الرصيد الحالي</th>
            <th> الإجراء</th>
        </tr>
        </thead>
        <tbody id="asnafe_table">

        <tr id="row_1">
            <td>1</td>
            <td><input type="text" name="sanf_code[]" class="form-control testButton inputclass"
                       id="sanf_code1" value=""
                       ondblclick="$('#myModal_asnaf').modal('show'); GetDiv_sanfe('myDiv_sanfe',1)"
                       readonly data-validation="required"/></td>
            <td><input type="text" name="sanf_coade_br[]" class="form-control testButton inputclass"
                       id="sanf_coade_br1" value="" readonly/></td>
            <td><input type="text" name="sanf_name[]" class="form-control testButton inputclass"
                       id="sanf_name1" value="" readonly/></td>
            <td><input type="text" name="sanf_whda[]" class="form-control testButton inputclass"
                       id="sanf_whda1" value="" readonly/></td>
            <td><input type="text" name="sanf_rased[]" class="form-control testButton inputclass"
                       id="sanf_rased1" value="" readonly/></td>
            <td><input type="text" name="sanf_amount[]" oninput="get_total(this,1)"
                       class="form-control testButton inputclass"
                       id="sanf_amount1" value="" data-validation-has-keyup-event="true" data-validation="required"/></td>
            <td><input type="text" name="sanf_one_price[]" class="form-control testButton inputclass"
                       id="sanf_one_price1" value="" readonly/></td>
            <td><input type="text" name="all_egmali[]" readonly
                       class="form-control testButton inputclass"
                       id="all_egmali1" value=""/></td>
            <td><input type="text" name="sanf_salahia_date[]" class="form-control testButton inputclass"
                       id="sanf_salahia_date1" value=""/></td>
            <td><input type="text" name="lot[]" class="form-control testButton inputclass" id="lot1"
                       value=""/></td>
            <td><input type="text" name="rased_hali[]" class="form-control testButton inputclass"
                       id="rased_hali1" value=""/></td>

            <td><a id="1" onclick=" $(this).closest('tr').remove();set_sum();"><i class="fa fa-trash"></i></a></td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <th colspan="8" class="text-center"><strong> الإجمالي </strong></th>
            <th colspan="4" id="total"></th>
            <th>
                <button type="button" onclick="add_row_sanfe()" class="btn-success btn"><i
                            class="fa fa-plus"></i>
                </button>
            </th>
        </tr>
        </tfoot>
    </table>
</div>
