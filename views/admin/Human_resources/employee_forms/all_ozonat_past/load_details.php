
<?php
if (isset($get_ezn) && !empty($get_ezn)){
    ?>

<table class="table table-bordered" style="table-layout: fixed">
    <thead>
    <tr class="info">
        <th colspan="4" class="bordered-bottom">تفاصيل الإذن</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <th class="gray-background">نوع الاذن:</th>
        <td width="15%">
            <input type="hidden" id="row_id" value="<?= $get_ezn->id;?>">
            <?php
            if (!empty($get_ezn->no3_ezn)){
                if ($get_ezn->no3_ezn==1){
                    echo " استئذان شخصي";
                } elseif ($get_ezn->no3_ezn==2){
                    echo " استئذان للعمل";
                }
            }
            ?>
        </td>
        <th class="gray-background">تاريخ الاذن:</th>
        <th width="20%"><?php echo $get_ezn->ezn_date_ar;?></th>

    </tr>
    <tr>
        <th class="gray-background"> بدايه الاذن:</th>
        <td><?php echo $get_ezn->from_hour;?></td>
        <th class="gray-background">نهايه الاذن:</th>
        <td><?php echo $get_ezn->to_hour;?></td>

    </tr>
    <tr>
        <th class="gray-background"> المدة:</th>
        <td><?php echo $get_ezn->total_hours;?></td>
        <th class="gray-background"> الفترة :</th>
        <td><?php echo $get_ezn->fatra_n;?></td>

    </tr>

    <?php
    if (!empty($get_ezn->reason)){
        ?>
        <tr>
            <th class="gray-background">السبب : </th>
            <td colspan="3"><?= $get_ezn->reason?></td>
        </tr>
        <?php
    }
    ?>

    </tbody>
</table>

    <?php
}
?>