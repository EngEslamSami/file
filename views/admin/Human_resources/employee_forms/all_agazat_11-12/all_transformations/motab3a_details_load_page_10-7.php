<?php
if (!empty($allhistory)) {


    ?>

    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr class="info">
            <th>م</th>
            <th>رقم الأجازة</th>
            <th>مرسل من</th>
            <th>الصورة</th>
            <th>مرسل إلي</th>
            <th>الصورة</th>
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
                <td>
                  <img id="empImg_1" src="<?php echo base_url();?>uploads/images/<?php echo $row->from_user_photo?>"
          onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';"
                  class="center-block img-responsive" style="width: 150px; height: 120px">
                </td>
                <td><?php echo $row->to_user_n; ?>

                </td>
                <td>
                    <img id="empImg_1" src="<?php echo base_url();?>uploads/images/<?php echo $row->to_user_photo?>"
              onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png';"
                    class="center-block img-responsive" style="width: 150px; height: 120px">
                </td>
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
