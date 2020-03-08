<?php  $total_sarf =0;  $total_family_nums=0;$total_mother=0 ;$total_young=0;$total_adult= 0;
   if(isset($data_table) && !empty($data_table) && $data_table!=null){?>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">رقم الملف</th>
            <th class="text-center">رقم الهوية </th>
            <th class="text-center">إسم العائلة </th>
            <th class="text-center">عدد الأفراد </th>
            <th class="text-center">أرملة </th>
            <th class="text-center">يتيم </th>
            <th class="text-center">مستفيد </th>
            <th class="text-center">إجمالى </th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php  $total_sarf =0;  $total_family_nums=0;$total_mother=0 ;$total_young=0;$total_adult= 0;
        $x=1; foreach ($data_table as $row){
            $total_mother += 1;
            $total_young  +=$row->down_child;
            $total_adult  +=$row->up_child;
            $total_family_nums +=(1 +$row->down_child +$row->up_child )?>
            <tr>
                <td class="text-center"><?=$x++?></td>
                <td class="text-center"><?=$row->file_num?> </td>
                <td class="text-center"><?=$row->mother_national_num_fk?>
                 <!--  <input type="hidden" name="mother_national_num_fk[<?=$row->mother_national_num_fk ?>]" value="<?=$row->file_num?>" />-->
                 <!--   <input type="hidden" name="file_num[]"    value="<?=$row->file_num?>" /> -->
                </td>
            
                <td class="text-center"><?=$row->full_name?> </td>
                <td class="text-center"><?=($row->down_child+$row->up_child +$row->mother_num_in)?>
                  <!--  <input type="hidden" name="all_num[]" value="<?=($row->down_child+$row->up_child +$row->mother_num_in)?>" />
               -->
                </td>
                <td class="text-center"><?=$row->mother_num_in?>
                <!--    <input type="hidden" name="mother_num[]" value="<?=$row->mother_num_in?>" />
                -->
                </td>
                <td class="text-center"><?=$row->down_child?>
                <!--    <input type="hidden" name="young_num[]" value="<?=$row->down_child?>" />
                 -->
                </td>
                <td class="text-center"><?=$row->up_child?>
               <!--     <input type="hidden" name="adult_num[]" value="<?=$row->up_child?>" />
                -->
                </td>
                <?php if($sarf_type == 1){
                    $total_sarf +=$due_to_family;?>
                    <td class="text-center"><?=$due_to_family?>
                     <input type="hidden" name="value[<?=$row->mother_national_num_fk ?>]" value="<?=$due_to_family?>" /> 
                    </td>
                <?php }elseif($sarf_type == 2){
                    $total_sarf +=($row->down_child+$row->up_child +$row->mother_num_in)*$due_to_member;?>
                    <td class="text-center"><?=($row->down_child+$row->up_child +$row->mother_num_in)*$due_to_member?>
                        <input type="hidden" name="value[<?=$row->mother_national_num_fk ?>]" value="<?=($row->down_child+$row->up_child +$row->mother_num_in)*$due_to_member?>" />
                    </td>
                <?php }elseif($sarf_type == 3){
                    $total_sarf +=($row->mother_num_in*$due_to_widow)+($row->down_child*$due_to_orphan)+($row->up_child * $due_to_beneficiary)?>
                    <td class="text-center"><?=($row->mother_num_in*$due_to_widow)+($row->down_child*$due_to_orphan)+($row->up_child * $due_to_beneficiary)?>
                     
                        <input type="hidden" name="value[<?=$row->mother_national_num_fk ?>]" value="<?=($row->mother_num_in*$due_to_widow)+($row->down_child*$due_to_orphan)+($row->up_child * $due_to_beneficiary)?>" />
                  <!--  <input type="hidden" name="mother_value[]" value="<?=$row->mother_num_in*$due_to_widow?>" />
                        <input type="hidden" name="young_value[]" value="<?=$row->down_child*$due_to_orphan?>" />
                        <input type="hidden" name="adult_value[]" value="<?=$row->up_child * $due_to_beneficiary?>" />
                   -->
                    </td>
                <?php }?>
            </tr>

        <?php }?>
        <tr>
            <td colspan="4">الإجمالى</td>
            <td><?=$total_family_nums?></td>
            <td><?=$total_mother?></td>
            <td><?=$total_young?></td>
            <td><?=$total_adult?></td>
            <td><input type="hidden" name="total_value" value="<?=$total_sarf?>" />
                <?=$total_sarf?></td>
        </tr>
        </tbody>
        </table>

<?php }?>