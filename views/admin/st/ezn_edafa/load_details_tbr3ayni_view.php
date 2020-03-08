<div class="col-xs-12 ">
    <div class="col-xs-12">
<!--<pre>
    <?php /*print_r($one_data) */?>
</pre>-->
        <p><strong>نوع الإذن :</strong><span id="type_ezn"> <?php
                if ($one_data['tabr3']->type_ezn == 1) {
                    echo "تبرعات عينية";
                } ?> </span></p>
    </div>

    <div class="col-xs-3">
        <p><strong>رقم الإذن :</strong><span id="ezn_rkm_pop"> <?= $one_data['tabr3']->ezn_rkm ?></span></p>
    </div>
    <div class="col-xs-3">
        <p><strong> تاريخ الإذن :</strong><span id="ezn_date_ar_pop">  <?= $one_data['tabr3']->ezn_date_ar ?></span></p>
    </div>
    <div class="col-xs-3">
        <p><strong> المبلغ : </strong><span id="all_value_pop"> <?= $one_data['tabr3']->all_value ?> </span></p>
    </div>


    <div class="col-xs-3">
        <p><strong>المستودع : </strong><span id="storage_name_pop"> <?= $one_data['tabr3']->storage_name ?></span></p>
    </div>
</div>
<div class="col-xs-12">
    <div class="col-xs-3">
        <p><strong>اسم الحساب : </strong> <span id="hesab_name_pop"><?= $one_data['tabr3']->hesab_name ?> </span></p>
    </div>
    <div class="col-xs-3">
        <p><strong> كود الحساب :</strong><span id="rkm_hesab_pop"> <?= $one_data['tabr3']->rkm_hesab ?> </span></p>
    </div>
    <div class="col-xs-3">
        <p><strong> اسم المتبرع :</strong><span id="motbr3_name_pop"> <?= $one_data['tabr3']->person_name ?> </span></p>
    </div>
    <div class="col-xs-3  ">
        <p><strong> رقم جوال :</strong><span id="motbr3_jwal_pop"> <?= $one_data['tabr3']->person_jwal ?>  </span></p>
    </div>

    <div class="col-xs-3">
        <p><strong> تاريخ اخر المتبرع :</strong><span
                    id="last_tabro3_date_ar_pop"><?= $one_data['tabr3']->last_tabro3_date_ar ?>  </span></p>
    </div>

</div>

<div id="bnods_pop">
    <?php if (!empty($one_data['fe2a_title'])) { ?>

        <div class="col-xs-3">
            <p><strong>نوع التبرع : </strong><span id="no3_tabro3_pop"> <?= $one_data['no3_tabro3_title'] ?> </span></p>
        </div>
        <div class="col-xs-3  ">
            <p><strong>الفئة : </strong><span id="fe2a_pop"> <?= $one_data['fe2a_title'] ?>  </span></p>
        </div>
        <div class="col-xs-3">
            <p><strong> البند : </strong><span id="band_pop"> <?= $one_data['band_title'] ?> </span></p>
        </div>
        <div class="col-xs-3">
            <p><strong> القيمة : </strong><span id="band_pop"> <?= $one_data['tabr3']->value1 ?> </span></p>
        </div>
    <?php } ?> <?php if (!empty($one_data['tabr3']->fe2a_type2)) { ?>

        <div class="col-xs-3">
            <p><strong>نوع التبرع : </strong><span id="no3_tabro3_pop"> <?= $one_data['no3_tabro3_title'] ?> </span></p>
        </div>
        <div class="col-xs-3  ">
            <p><strong>الفئة : </strong><span id="fe2a_pop"> <?= $one_data['fe2a_title2'] ?>  </span></p>
        </div>
        <div class="col-xs-3">
            <p><strong> البند : </strong><span id="band_pop"> <?= $one_data['band_title2'] ?> </span></p>
        </div>
        <div class="col-xs-3">
            <p><strong> القيمة : </strong><span id="band_pop"> <?= $one_data['tabr3']->value2 ?> </span></p>
        </div>
    <?php } ?> <?php if (!empty($one_data['tabr3']->fe2a_type3)) { ?>

        <div class="col-xs-3">
            <p><strong>نوع التبرع : </strong><span id="no3_tabro3_pop"> <?= $one_data['no3_tabro3_title'] ?> </span></p>
        </div>
        <div class="col-xs-3  ">
            <p><strong>الفئة : </strong><span id="fe2a_pop"> <?= $one_data['fe2a_title3'] ?>  </span></p>
        </div>
        <div class="col-xs-3">
            <p><strong> البند : </strong><span id="band_pop"> <?= $one_data['band_title3'] ?> </span></p>
        </div>
        <div class="col-xs-3">
            <p><strong> القيمة : </strong><span id="band_pop"> <?= $one_data['tabr3']->value3 ?> </span></p>
        </div>
    <?php } ?> <?php if (!empty($one_data['tabr3']->fe2a_type4)) { ?>

        <div class="col-xs-3">
            <p><strong>نوع التبرع : </strong><span id="no3_tabro3_pop"> <?= $one_data['no3_tabro3_title'] ?> </span></p>
        </div>
        <div class="col-xs-3  ">
            <p><strong>الفئة : </strong><span id="fe2a_pop"> <?= $one_data['fe2a_title4'] ?>  </span></p>
        </div>
        <div class="col-xs-3">
            <p><strong> البند : </strong><span id="band_pop"> <?= $one_data['band_title4'] ?> </span></p>
        </div>
        <div class="col-xs-3">
            <p><strong> القيمة : </strong><span id="band_pop"> <?= $one_data['tabr3']->value4 ?> </span></p>
        </div>
    <?php } ?>
</div>
<?php if ($one_data['tabr3']->tsaeer == 1) { ?>

    <div class="col-xs-12" id="fatora_data_pop">
        <div class="col-xs-3">
            <p><strong> رقم السند : </strong><span id="mostand_rkm_pop"> <?= $one_data['tabr3']->mostand_rkm ?> </span>
            </p>
        </div>
        <div class="col-xs-3  ">
            <p><strong> اسم الجهة : </strong><span id="geha_name_pop">  <?= $one_data['tabr3']->geha_name ?> </span></p>
        </div>
        <div class="col-xs-3">
            <p><strong> رقم جوال : </strong><span id="geha_jwal_pop"> <?= $one_data['tabr3']->geha_jwal ?> </span></p>
        </div>
        <div class="col-xs-3">
            <p><strong> تاريخ المستند : </strong><span
                        id="mostand_date_ar_pop"> <?= $one_data['tabr3']->mostand_date_ar ?> </span></p>
        </div>
    </div>
<?php } ?>

<div class="col-md-12">
    <div class="col-xs-3">
        <p><strong>القائم بالاضافة : </strong><span
                    id="mostand_date_ar_pop"> <?= $one_data['tabr3']->publisher_name ?> </span></p>
    </div>
</div>

<?php if ((isset($one_data['asnaf'])) && (!empty($one_data['asnaf'])) && ($one_data['asnaf'] != 0)) { ?>

    <div class="col-xs-12 ">

        <table class="table table-striped table-bordered dt-responsive nowrap" id="orders_details">
            <thead>
            <tr class="success info">
                <th>م</th>
                <th>كود الصنف</th>
                <th>اسم الصنف</th>
                <th> الوحدة</th>
                <th> الرصيد المتاح</th>
                <th> الكمية</th>
                <th> سعر الوحدة</th>
                <th> القيمة الإجمالية</th>
                <th> تاريخ الصلاحية</th>
                <th> التشغيلة</th>
                <th> الرصيد الحالي</th>
            </tr>
            </thead>
            <tbody id="orders_details_body">
            <?php
            $total = 0;
            $z = 1;
            foreach ($one_data['asnaf'] as $sanfe) {
                ?>
                <tr id="row_<?= $z ?>">
                    <td><?= $z ?></td>
                    <td><?= $sanfe->sanf_code ?></td>
                    <td><?= $sanfe->sanf_name ?></td>
                    <td><?= $sanfe->sanf_whda ?></td>
                    <td><?= $sanfe->sanf_amount ?></td>
                    <td><?= $sanfe->sanf_amount ?></td>
                    <td><?= $sanfe->sanf_one_price ?></td>
                    <td><?= $sanfe->all_egmali ?></td>
                    <td><?= $sanfe->sanf_salahia_date_ar ?></td>
                    <td><?= $sanfe->lot ?></td>
                    <td><?= $sanfe->rased_hali ?></td>
                </tr>
                <?php
                $total = $total + $sanfe->all_egmali;
                $z++;
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="text-center"><strong> الإجمالي </strong></th>
                <th colspan="4" id="total"><?= number_format($total, 2, '.', '') ?></th>
            </tr>
            </tfoot>
        </table>

    </div>

<?php } ?>


