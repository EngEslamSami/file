<?php $arr_yes_no =array(1=>'نعم',2=>'لا');?>
<?php
if(isset($eaqa_mems)&& !empty($eaqa_mems)) {
    ?>



<?php foreach ($eaqa_mems as $row){?>

        <tr>

            <td>
                <?= $row->person_n?>
            </td>
            <td>
                <?= $row->person_gns?>
            </td>
            <td>
                <?= $row->person_national_num?>
            </td>

            <td>
                <?= $row->no3_eaqa_n?>

            </td>
            <td>

                <?php
                if($row->tahil_shamil_status==1){
                    echo 'نعم';
                } elseif ($row->tahil_shamil_status==2){
                    echo 'لا';
                }

                ?>
            </td>
            <td>
                <?php
                if (!empty($row->value)){
                    echo $row->value;
                } else{
                    echo 'غير محدد' ;
                }
                ?>
            </td>
            <td>
                <i class="fa fa-pencil" style="cursor: pointer"
                   onclick="get_eaqa(<?= $row->id ?>,<?= $row->person_id_fk ?>,<?= $row->no3_eaqa_fk ?>,' <?= $row->person_n ?>','<?= $row->person_gns ?>',<?= $row->person_national_num ?>,'<?= $row->no3_eaqa_n ?>',<?= $row->value ?>)"></i>


                <i class="fa fa-trash" style="cursor: pointer"  onclick="delete_members(<?= $row->id?>,'eaqa_result','add_member_eaqa')"></i>


            </td>

        </tr>
    <?php $count++;  }} ?>
