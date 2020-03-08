

<?php if ((isset($result)) && (!empty($result))) { ?>
    <table id="example25" class="  table table-bordered my_table  responsive nowrap" cellspacing="0"
           width="100%">
        <thead>
        <th>م</th>
        <th>رقم الملف</th>
        <th>اسم</th>
        <th>السجل المدني</th>
        <th> الصلة</th>
        <th>جوال التواصل</th>
        <th>رقم  جوال</th>
        <th>حالة الملف</th>
        <th> فئة الاسرة</th>
        <th> حالة المستفيد</th>
        <th> العمر</th>
        <th> تاريخ الميلاد</th>
        <th> الجنس</th>
        <th> حالة الدراسية</th>
        <th> الحى </th>
        </thead>
        <tbody>
        <?php $i = 1;

        foreach ($result as $key => $value) {

            if ($value->file_status == 1) {
                $file_status = 'نشط كليا';
                // $file_colors = '#00ff00';
                $file_colors = '#15bf00';
            } elseif ($value->file_status == 2) {
                $file_status = 'نشط جزئيا';
                $file_colors = '#00d9d9';
            } elseif ($value->file_status == 3) {
                $file_status = 'موقوف مؤقتا';
                $file_colors = '#ffff00';
            } elseif ($value->file_status == 4) {
                $file_status = 'موقوف نهائيا';
                $file_colors = '#ff0000';
            } elseif ($value->file_status == 0) {
                $file_status = 'جـــــــــاري';
                $file_colors = '#62d0f1';
            }

            ?>
            <tr>

                <td></td>
                <td><?php echo $value->file_num; ?></td>
                <td><?php echo $value->name; ?></td>
                <td><?php echo $value->card_num; ?></td>
                <td><?php echo $value->cat; ?></td>
                <td><?php echo $value->contact_mob; ?></td>
                <td><?php echo $value->mob; ?></td>
                <td>
                    <button style="color:#fff ;width:80px; background-color:<?php echo $file_colors ?>"
                            class="btn btn-sm">
                        <?php echo $file_status ?></button>
                </td>

                <td><?php
                    if (!empty($value->family_cat_name)) {
                        echo $value->family_cat_name;
                    } else {
                        echo 'أ ';
                    }
                    ?></td>
                <td><?php
                    if (!empty($value->persons_status_title)) {
                        echo $value->persons_status_title;
                    } else {
                        echo 'غير محدد';
                    }
                    ?></td>
                <td><?php echo $value->age; ?></td>
                <td><?php echo $value->birth_date; ?></td>
                <td><?php echo $value->gender_title; ?></td>
                <td><?php echo $value->education_status_title; ?></td>
                <td><?php echo $value->h_village_title; ?></td>

            </tr>
            <?php $i++;
        } ?>
        </tbody>
    </table>

    <?php
} else {
    ?>
    <div class="col-12 alert-danger">
        <h5>لا توجد بيانات ..................</h5>
    </div>
    <?Php
} ?>

<script>

    $(document).ready(function () {
        var t = $('#example').DataTable({
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [[1, 'asc']]
        });

        t.on('order.dt search.dt', function () {
            t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });

</script>

<script>
    var t = $('#example25').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                autoPrint: true,
                // orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true,
        "order": [[1, "asc"]],
        "scrollX": true,


    });

    t.on('order.dt search.dt', function () {
        t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
</script>
