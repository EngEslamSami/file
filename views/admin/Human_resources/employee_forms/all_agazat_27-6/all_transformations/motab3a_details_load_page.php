<?php
if (!empty($allhistory)) {


    ?>

    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr class="info">
            <th>م</th>
            <th>رقم الأجازة</th>
            <th>مرسل من</th>
            <th>مرسل إلي</th>
            <th>الطلب عند</th>
            <th>حالة الطلب</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($allhistory as $row) {
            ?>
            <tr>
                <td><?php echo $x; ?></td>
                <td><?php echo $row->agaza_rkm_fk; ?></td>
                <td><?php echo $row->from_user_n; ?></td>
                <td><?php echo $row->to_user_n; ?></td>
                <td><?php echo $row->talab_in_title; ?></td>
                <td><?php echo $row->talab_msg; ?></td>
            </tr>

            <?php $x++;
        } ?>

        </tbody>
    </table>


    <?php

} else {


    echo '<div class="alert alert-danger">لا توجد متابعات !!</div>';

}