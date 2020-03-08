<!--load_filter_page-->

<table class="table table-striped table-bordered dt-responsive nowrap" id="example">
    <thead>
    <tr class="greentd">
        <th style="text-align: center !important;">م</th>
        <th style="text-align: center !important;">رقم الإيصال</th>
        <th style="text-align: center !important;">تاريخ الايصال</th>
        <th style="text-align: center !important;">المحصل</th>
        <th style="text-align: center !important;">اسم المتبرع</th>
        <th style="text-align: center !important;">البند</th>

        <th style="text-align: center !important;">طريقة التوريد</th>
        <th style="text-align: center !important;">المبلغ</th>


        <th style="text-align: center !important;"><input class="check_all_not" id="check_all_not"
                                                          type="checkbox"
                                                          onclick="check_all();"><label class="checktitle">
                تحديدالكل</th>


    </tr>
    </thead>
    <tbody >
    <?php
    $pay_method_arr = array('إختر', 1 => 'نقدي', 2 => 'شيك', 3 => 'شبكة', 4 => 'إيداع نقدي', 5 => 'إيداع شيك', 6 => 'تحويل', 7 => 'أمر مستديم');
    ?>
    <?php
    if (isset($all_pills_inbox) && !empty($all_pills_inbox)) {
        $x = 0;
        foreach ($all_pills_inbox as $row) {

            if ($row->person_type == 1) {
                if ($row->person_type == 1) {
                    $name = $row->MemberDetails['k_name'];
                } elseif ($row->person_type == 2) {
                    $name = $row->MemberDetails['d_name'];
                } elseif ($row->person_type == 3) {
                    $name = $row->MemberDetails['name'];
                }

            } elseif ($row->person_type == 0) {
                $name = $row->person_name;
            }
            ?>
            <tr>
                <td><?= $x + 1 ?></td>
                <td><?= $row->pill_num ?></td>
                <td><?= $row->pill_date ?></td>
                <td><?= $row->publisher_name ?></td>
                <td><?= $row->person_name ?></td>
                <td><?= $row->band_title1 ?><?php if (!empty($row->band_title2)) {
                        echo '/' . $row->band_title2;
                    } ?></td>

                <td><?php if (!empty($pay_method_arr[$row->pay_method])) {
                        echo $pay_method_arr[$row->pay_method];
                    } ?></td>
                <td><?= $row->value ?></td>


                <td><input class="check_large2 check_large checkbox_esal" value="<?= $row->pill_num ?>"
                           type="checkbox">
                </td>

            </tr>
            <?php $x++;
        }
    } ?>

    </tbody>
</table>


<script>

    $('#example').DataTable( {
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
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    } );



</script>
