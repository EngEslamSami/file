<?php
if(isset($mowzfen)&& !empty($mowzfen)){
$count=2;
foreach ($mowzfen as $row) {
    ?>
    <tr>

        <td>
            <?= $row->person_n ?>
        </td>
        <td>
            <?= $row->person_gns ?>

        </td>
        <td>
            <?= $row->person_national_num ?>
        </td>

        <td>

            <?= $row->person_job_n ?>

        </td>
        <td>
            <?= $row->geha_amal ?>
        </td>
        <td>
            <?= $row->salary ?>
        </td>
        <td>
            <i class="fa fa-pencil" style="cursor: pointer"
               onclick="get_mowzfen(<?= $row->id ?>,<?= $row->person_id_fk ?>,<?= $row->person_job_fk ?>,' <?= $row->person_n ?>','<?= $row->person_gns ?>',<?= $row->person_national_num ?>,'<?= $row->person_job_n ?>','<?= $row->geha_amal ?>',<?= $row->salary ?>)"></i>


            <i class="fa fa-trash" style="cursor: pointer"
               onclick="delete_members(<?= $row->id ?>,'mowzfen_result','add_mowzfen')"></i>

        </td>

    </tr>
    <?php $count++;
} }
?>
