<?php if (isset($galsa_member) && !empty($galsa_member)) {
    ?>
    <div class="container col-md-12">
        <table id="examplexx" class=" display table table-bordered   responsive nowrap"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th scope="col">م</th>

                <th scope="col">رقم العضوية</th>
                <th scope="col">إسم العضو</th>
                <th scope="col">رقم هويته</th>
                <th scope="col">رقم جوال</th>
                <th scope="col">بداية الاشتراك</th>
                <th scope="col">نهاية الاشتراك</th>
                <th scope="col">حالة العضوية</th>
               <!-- <th scope="col">مدة</th> -->


            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($galsa_member as $row) {
                if (isset($row->odwiat_data) && (!empty($row->odwiat_data))) {
                    $rkm_odwia_full = $row->odwiat_data->rkm_odwia_full;
                    $odwia_status_title = $row->odwiat_data->odwia_status_title;
                    if (!empty($row->odwiat_data->subs_from_date_m)) {
                        $subs_from_date_m = explode('/', $row->odwiat_data->subs_from_date_m)[2] . '/' . explode('/', $row->odwiat_data->subs_from_date_m)[0] . '/' . explode('/', $row->odwiat_data->subs_from_date_m)[1];
                    } else {
                        $subs_from_date_m = 'غير محدد';
                    }
                    if (!empty($row->odwiat_data->subs_to_date_m)) {
                        $subs_to_date_m = explode('/', $row->odwiat_data->subs_to_date_m)[2] . '/' . explode('/', $row->odwiat_data->subs_to_date_m)[0] . '/' . explode('/', $row->odwiat_data->subs_to_date_m)[1];
                    } else {
                        $subs_to_date_m = 'غير محدد';
                    }

                    $bday = new DateTime(date('d-m-Y', $row->odwiat_data->from_date)); // Your date of birth
                    if ($row->odwiat_data->to_date <= strtotime(date('d-m-Y'))) {
                        $today = new Datetime(date('d-m-Y', $row->odwiat_data->to_date));
                    } else {
                        $today = new Datetime(date('d-m-Y'));
                    }
                    $diff = $today->diff($bday);
                    $diff = $diff->y . " سنة  " . $diff->m . " شهر " . $diff->d . " يوم ";

                } else {
                    $rkm_odwia_full = 'غير محدد';
                    $odwia_status_title = 'غير محدد';
                    $subs_from_date_m = 'غير محدد';
                    $subs_to_date_m = 'غير محدد';
                    $diff = 'غير محدد';
                }

                ?>
                <tr>
                    <td><?php echo $x++; ?></td>
                    <td><?php echo $rkm_odwia_full; ?></td>
                    <td><?php echo $row->member_data->laqb_title . '/' . $row->member_data->name; ?></td>
                    <td><?php echo $row->member_data->card_num; ?></td>
                    <td><?php echo $row->member_data->jwal; ?></td>
                    <td><?php echo $subs_from_date_m; ?></td>
                    <td><?php echo $subs_to_date_m; ?></td>
                    <td><?php echo $odwia_status_title; ?></td>
                   <!-- <td><?php echo $diff; ?></td> -->

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <?php
} else {
    ?>

    <div class="alert alert-danger col-lg-12"> لاتوجد اعضاء باللجنة</div>
    <?php
}
?>
<script>


    $('#examplexx').DataTable({
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
                exportOptions: {columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    });


</script>
