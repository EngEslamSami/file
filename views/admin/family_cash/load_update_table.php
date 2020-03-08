<!---------------------------- one row ------------------------------------>
<?php $x=1; foreach ($data_table as $row){?>
    <tr >
        <td class="text-center"><?=$x++?></td>
        <td class="text-center"><?=$row->file_num?> </td>
        <td class="text-center"><?=$row->mother_national_num_fk?>
            <input type="hidden" name="mother_national_num_fk[]"    value="<?=$row->mother_national_num_fk?>" />
            <input type="hidden" name="file_num[]"    value="<?=$row->file_num?>" />
        </td>
        <td class="text-center"><?=$row->full_name?> </td>
        <td class="text-center"><?=($row->down_child+$row->up_child +1)?>
            <input type="hidden" name="all_num[]" class="c_all_num"  value="<?=($row->down_child+$row->up_child +1)?>" />
        </td>
        <td class="text-center">1
            <input type="hidden" name="mother_num[]" class="c_mother_num"  value="1" />
        </td>
        <td class="text-center"><?=$row->down_child?>
            <input type="hidden" name="young_num[]"  class="c_young_num" value="<?=$row->down_child?>" />
        </td>
        <td class="text-center"><?=$row->up_child?>
            <input type="hidden" name="adult_num[]" class="c_adult_num"  value="<?=$row->up_child?>" />
        </td>
        <?php if($type_sarf == 1){?>
            <td class="text-center"><?=$update_family_value?>
                <input type="hidden" name="value[]" class="c_value"  value="<?=$update_family_value?>" />
            </td>
        <?php }elseif($type_sarf == 2){?>
            <td class="text-center"><?=($row->down_child+$row->up_child +1)*$update_person_value?>
                <input type="hidden" name="value[]" class="c_value"  value="<?=($row->down_child+$row->up_child +1)*$update_person_value?>" />
            </td>
        <?php }elseif($type_sarf == 3){?>
            <td class="text-center"><?=$update_mother_value+($row->down_child*$update_young_value)+($row->up_child * $update_adult_value)?>
                <input type="hidden" name="value[]"  class="c_value" value="<?=$update_mother_value+($row->down_child*$update_young_value)+($row->up_child * $update_adult_value)?>" />
                <input type="hidden" name="mother_value[]" value="<?=$update_mother_value?>" />
                <input type="hidden" name="young_value[]" value="<?=$row->down_child*$update_young_value?>" />
                <input type="hidden" name="adult_value[]" value="<?=$row->up_child * $update_adult_value?>" />
            </td>
        <?php }?>
        <td> <a onclick="delete_row_only(this);">
                <i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>
<?php }?>
<!---------------------------- one row ------------------------------------>