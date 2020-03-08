<?php if ((isset($sarf)) && (!empty($sarf))) {
    $months = array("1" => "يناير", "2" => "فبراير", "3" => "مارس", "4" => "أبريل", "5" => "مايو",
        "6" => "يونيو", "7" => "يوليو", "8" => "أغسطس", "9" => "سبتمبر", "10" => "أكتوبر",
        "11" => "نوفمبر", "12" => "ديسمبر"); ?>
    <br>
    <table id="example" class=" display table table-bordered   responsive nowrap"
           cellspacing="0" width="100%">
        <thead>
        <tr class="info">
            <th class="text-center">م</th>
            <th class="text-center">رقم الصرف</th>
            <th class="text-center">اسم بند المساعدة</th>
            <th class="text-center">تاريخ الصرف</th>
            <th class="text-center">طريقة الصرف</th>
            <th class="text-center">عبارة عن</th>
            <th class="text-center">خلال شهر</th>
            <th class="text-center">اجمالي المبلغ</th>
            <th class="text-center">التفاصيل</th>
        </tr>
        </thead>
        <tbody id="table_sarf_body">
        <?php $x = 1;
        foreach ($sarf as $record) { ?>
            <tr class="">
                <td><?php echo $x++ ?></td>
                <td><?php echo $record->sarf_num_fk; ?></td>
                <td><?php echo $record->band_name; ?></td>
                <td><?php echo $record->sarf_date_ar; ?></td>
                <td><?php if ($record->method_type == 2) {
                        echo "شيك";
                    } elseif ($record->method_type == 4) {
                        echo "تحويل";
                    } ?>
                </td>

                <td><?php echo $record->about; ?></td>
                <td><?php if (isset($months[$record->mon_melady])) {
                        echo $months[$record->mon_melady];
                    } ?></td>
                <td><?php echo $record->value; ?></td>

                <td>
                    <button data-toggle="modal" data-target="#modal-sm-data"
                            onclick="get_details('<?= $record->sarf_num_fk ?>','<?= $record->mother_national_num_fk ?>');"
                            class="btn btn-xs btn-info">
                        التفاصيل
                    </button>
                </td>


            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } else{?>
    <div>
        <h3>لا توجد بيانات </h3>
    </div>

    <?php
} ?>