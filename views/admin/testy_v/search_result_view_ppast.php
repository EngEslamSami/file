<?php if (isset($all_main_kafalat) && (!empty($all_main_kafalat))) { ?>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
           width="100%">
        <thead>
        <tr class="info">
            <th class="text-center">م</th>
            <th> رقم الملف</th>
            <th>إسم المستفيد</th>
            <th>العمر</th>
            <th>حالة المستفيد</th>
            <th>التصنيف</th>
            <th> حالة الملف</th>
            <th> فئة الاسرة</th>


            <th>نوع الكفالة</th>
            <th>كود الكافل</th>
            <th> إسم الكافل</th>
            <th> حالة الكافل</th>

            <th> بداية الكفالة</th>
            <th> نهاية الكفالة</th>
            <th> متبقي علي الكفالة</th>
            <th> حالة الكفالة</th>


        </tr>
        </thead>
        <tbody class="text-center">
        <?php
        $a = 1;

        if (isset($all_main_kafalat) && !empty($all_main_kafalat)) {
            foreach ($all_main_kafalat as $record) {

                if ($record->kafala_type_fk == 1) {
                    $kafala_name = 'كفالة شاملة';
                } elseif ($record->kafala_type_fk == 2) {
                    $kafala_name = 'نصف كفالة';
                } elseif ($record->kafala_type_fk == 3) {
                    $kafala_name = 'كفالة مستفيد';
                } elseif ($record->kafala_type_fk == 4) {
                    $kafala_name = 'كفالة أرامل';
                } else {
                    $kafala_name = 'غير محدد ';
                }

                if ($record->person_type == 1) {
                    $person_type = ' أم';
                } elseif ($record->person_type == 2) {
                    $person_type = ' أبناء';
                }


                if ($record->kafel_status == 7) {
                    $kafel_status_name = 'نشـط';
                } elseif ($record->kafala_type_fk == 9) {
                    $kafel_status_name = 'إنتظار';
                } elseif ($record->kafala_type_fk == 10) {
                    $kafel_status_name = 'موقوف';
                } else {
                    $kafel_status_name = 'غير محدد';
                }


                if ($record->person_hala == 1) {
                    $person_hala_name = ' نشط كليا ';
                } elseif ($record->person_hala == 2) {
                    $person_hala_name = ' نشط جزئيا';
                } elseif ($record->person_hala == 3) {
                    $person_hala_name = ' موقوف مؤقتا';
                } elseif ($record->person_hala == 4) {
                    $person_hala_name = ' موقوف نهائيا';
                } elseif ($record->person_hala == 0) {
                    $person_hala_name = ' جاري';
                } else {
                    $person_hala_name = 'غير محدد';
                }


                if ($record->person_cat == 1) {
                    $person_cat_name = ' أرملة ';
                } elseif ($record->person_cat == 2) {
                    $person_cat_name = ' يتيم';
                } elseif ($record->person_cat == 3) {
                    $person_cat_name = ' مستفيد بالغ';
                } elseif ($record->person_cat == 4) {
                    $person_cat_name = ' أخري';
                } else {
                    $person_cat_name = 'غير محدد';
                }


                if ($record->first_status == 1) {
                    $first_status_name = ' منتطم ';
                } elseif ($record->first_status == 2) {
                    $first_status_name = ' موقوف';
                } else {
                    $first_status_name = 'غير محدد';
                }


                ?>
                <tr>
                    <td><?php echo $a; ?></td>

                    <td><?php echo $record->file_num; ?></td>
                    <td><?php echo $record->person_name; ?></td>
                    <td><?php echo $record->person_age; ?></td>
                    <td><?php echo $person_hala_name; ?></td>
                    <td><?php echo $person_cat_name; ?></td>
                    <td>
                     <span style="background-color:  <?php echo $record->files_status_color; ?>;">
                     
                        <?php echo $record->files_status_title; ?></span>
                    </td>
                    <td><?php echo $record->family_cat_name; ?></td>

                    <td><?php echo $kafala_name; ?></td>

                    <td><?php echo $record->kafel_rkm; ?></td>
                    <td><?php echo $record->kafel_name; ?></td>
                    <td><?php echo $kafel_status_name; ?></td>
                    <td><?php echo $record->first_date_from_ar; ?></td>
                    <td><?php echo $record->first_date_to_ar; ?></td>

                    <td><?php echo $record->dddddd; ?></td>
                    <td><?php echo $first_status_name; ?></td>

                </tr>
                <?php
                $a++;
            }
        }
        ?>
        </tbody>
    </table>
<?php } else {
    ?>
    <div class="alert-danger"> لا توجد بيانات ......</div>
    <?php
} ?>
