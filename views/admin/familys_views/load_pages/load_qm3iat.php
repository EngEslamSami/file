<?php if( isset($qm3iat) && !empty($qm3iat)) {
    $count = 2;
    foreach ($qm3iat as $row) {
        ?>

        <tr>
            <td>
                <?= $row->gam3ia_n ?>

            </td>


            <td>
                <?php
                if ($row->no3_mos3da_fk == 2) {
                    echo 'عينية';
                } else if ($row->no3_mos3da_fk == 1) {
                    echo 'مادية';
                }
                ?>

            </td>
            <td>
                <?php
                if (!empty( $row->mos3da_value ) && $row->mos3da_value !=0){
                    echo $row->mos3da_value;
                } else{
                    echo 'غير محدد' ;
                }
                ?>
            </td>

            <td>
                <i class="fa fa-pencil" style="cursor: pointer"
                   onclick="get_gm3iat(<?= $row->id?>,<?= $row->gam3ia_id_fk?>,'<?= $row->gam3ia_n?>',<?= $row->no3_mos3da_fk?>,<?= $row->mos3da_value?>)"></i>

                <i class="fa fa-trash" style="cursor: pointer"
                   onclick="delete_members(<?= $row->id ?>,'qm3ia_result','add_qm3ia')"></i>


            </td>

        </tr>

        <?php $count++;
    } ?>


    <?php
}
?>
