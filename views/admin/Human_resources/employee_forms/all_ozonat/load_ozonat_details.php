<?php
if (isset($all_ozonat) && !empty($all_ozonat)) {
    $x = 0;
    $personal_ezn = 0;
    $work_ezn = 0;
    $personal_hours = 0;
    $work_hours = 0;
    foreach ($all_ozonat as $row) {
        $x++;
        if ($row->no3_ezn == 1) {
            $personal_ezn += 1;
            $personal_hours += $row->total_hours;
        } elseif ($row->no3_ezn == 2) {
            $work_ezn += 1;
            $work_hours += $row->total_hours;

        }

    }
    ?>

    <table class="table table-bordered" style="table-layout: fixed">
        <thead>
        <tr class="info">
            <input type="hidden" id="emp_id" value="<?= $all_ozonat[0]->emp_id_fk ?>">
            <th colspan="4" class="bordered-bottom" style="text-align: center;"> أذونات الموظف
                : <?= $all_ozonat[0]->emp_name ?></th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <th class="gray-background"> عدد الاذونات الشخصيه:</th>
            <td width="15%">
                <?php
                echo $personal_ezn;
                ?>
            </td>
            <th class="gray-background"> عدد الساعات:</th>
            <th width="20%"><?php echo $personal_hours; ?></th>

        </tr>
        <tr>
            <th class="gray-background">عدد أذونات العمل :</th>
            <td><?php echo $work_ezn; ?></td>
            <th class="gray-background"> عدد الساعات:</th>
            <td><?php echo $work_hours; ?></td>

        </tr>


        </tbody>
    </table>

    <?php
} else {
    ?>
    <div class="col-12 alert-danger">
        <h4>لا توجد بيانات ....</h4>
    </div>
    <?php
}
?>
