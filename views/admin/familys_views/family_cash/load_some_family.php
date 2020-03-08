
<?php if(isset($data_table) && !empty($data_table) && $data_table!=null){
    
    $x = $len+1;
    
    ?>

   <?php if($count_family == 1){?>
        <script>
            $('#count_family').val("2");
        </script>
 
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="greentd">
            <th class="text-center">م</th>
            <th class="text-center">رقم الملف</th>

            <th class="text-center">إسم العائلة </th>
            <th class="text-center">إسم مسئول الحساب البنكي </th>
            <th class="text-center">رقم الهوية </th>

            <th class="text-center">عدد الأفراد </th>
            <th class="text-center">أرملة </th>
            <th class="text-center">يتيم </th>
            <th class="text-center">مستفيد </th>
            <th class="text-center">إجمالى </th>
        </tr>
        </thead>
        <tbody class="text-center" id="id_example">

        <?php 
        //$x=1; 
        
        foreach ($data_table as $row){?>
            <tr class="info2" >
                <td class="text-center"><?=$x?></td>
                <td class="text-center"><?=$row->file_num?> </td>
                <td class="text-center"><?=$row->father_full_name?> </td>

                <td class="text-center">
                    <?php if(!empty($row->bank_details)){
                        echo(isset($row->bank_details->person_name))? $row->bank_details->person_name:'غير مضاف'; }else{ echo "لا يوجد حساب لهذه الأسرة";
                    }  ?>
                </td>

                <td class="text-center">
                    <?php echo (!empty($row->bank_details))? $row->bank_details->person_card : "لا يوجد حساب لهذه الأسرة"; ?>
                    <!--    <input type="hidden" name="mother_national_num_fk[]" value="<?=$row->mother_national_num_fk?>" />
                    <input type="hidden" name="file_num[]"    value="<?=$row->file_num?>" />
                -->
                </td>
                <td class="text-center"><?=($row->down_child+$row->up_child +$row->mother_num_in)?>
                   <!-- <input type="hidden" name="all_num[]" class="c_all_num"  value="<?=($row->down_child+$row->up_child +$row->mother_num_in)?>" />
                -->
                </td>
                <td class="text-center"><?=$row->mother_num_in?>
                <!--    <input type="hidden" name="mother_num[]" class="c_mother_num"  value="<?=$row->mother_num_in?>" />
                -->
                </td>
                <td class="text-center"><?=$row->down_child?>
                    <input type="hidden" name="young_num[]"  class="c_young_num" value="<?=$row->down_child?>" />
                </td>
                <td class="text-center"><?=$row->up_child?>
                <!--    <input type="hidden" name="adult_num[]" class="c_adult_num"  value="<?=$row->up_child?>" />
                -->
                </td>
                <?php if($sarf_type == 1){?>
                    <td class="text-center"><?=$due_to_family?>
                        <input type="hidden" name="value[<?=$row->mother_national_num_fk?>]" class="c_value"  value="<?=$due_to_family?>" />
                    </td>
                <?php }elseif($sarf_type == 2){?>
                    <td class="text-center"><?=($row->down_child+$row->up_child +$row->mother_num_in)*$due_to_member?>
                        <input type="hidden" name="value[<?=$row->mother_national_num_fk?>]" class="c_value"  value="<?=($row->down_child+$row->up_child +$row->mother_num_in)*$due_to_member?>" />
                    </td>
                <?php }elseif($sarf_type == 3){?>
                    <td class="text-center"><?=($due_to_widow * $row->mother_num_in)+($row->down_child*$due_to_orphan)+($row->up_child * $due_to_beneficiary)?>
                        <input type="hidden" name="value[<?=$row->mother_national_num_fk?>]"  class="c_value" value="<?=($due_to_widow * $row->mother_num_in)+($row->down_child*$due_to_orphan)+($row->up_child * $due_to_beneficiary)?>" />
                <!--    <input type="hidden" name="mother_value[]" value="<?=$due_to_widow * $row->mother_num_in?>" />
                        <input type="hidden" name="young_value[]" value="<?=$row->down_child*$due_to_orphan?>" />
                        <input type="hidden" name="adult_value[]" value="<?=$row->up_child * $due_to_beneficiary?>" />
                      -->
                    </td>
                <?php }?>
            </tr>
        <?php }?>
        </tbody>
            <tbody>
            <tr>
                <td class="text-center" colspan="5">الإجمالى
                    <input type="hidden" name="total_value" id="total_sarf"  />
                </td>
                <td class="text-center" id="total_family_nums"></td>
                <td class="text-center" id="total_mother"></td>
                <td class="text-center" id="total_young"></td>
                <td class="text-center" id="total_adult"></td>
                <td class="text-center" id="total_sarf_td"></td>
            </tr>
            </tbody>
    </table>
    <?php }else{?>
        <!---------------------------- one row ------------------------------------>
        <?php 
        // $x=1;
         foreach ($data_table as $row){?>
              <tr class="info2" >
                <td class="text-center"><?=$x?></td>
                <td class="text-center"><?=$row->file_num?> </td>
                  <td class="text-center"><?=$row->father_full_name?> </td>

                  <td class="text-center">
                      <?php if(!empty($row->bank_details)){
                          echo(isset($row->bank_details->person_name))? $row->bank_details->person_name:'غير مضاف'; }else{ echo "لا يوجد حساب لهذه الأسرة";
                      }  ?>
                  </td>

                  <td class="text-center">
                      <?php echo (!empty($row->bank_details))? $row->bank_details->person_card : "لا يوجد حساب لهذه الأسرة"; ?>
                      <!--    <input type="hidden" name="mother_national_num_fk[]" value="<?=$row->mother_national_num_fk?>" />
                    <input type="hidden" name="file_num[]"    value="<?=$row->file_num?>" />
                -->
                  </td>
                <td class="text-center"><?=($row->down_child+$row->up_child +$row->mother_num_in)?>
                   <!-- <input type="hidden" name="all_num[]" class="c_all_num"  value="<?=($row->down_child+$row->up_child +$row->mother_num_in)?>" />
                -->
                </td>
                <td class="text-center"><?=$row->mother_num_in?>
                <!--    <input type="hidden" name="mother_num[]" class="c_mother_num"  value="<?=$row->mother_num_in?>" />
                -->
                </td>
                <td class="text-center"><?=$row->down_child?>
                    <input type="hidden" name="young_num[]"  class="c_young_num" value="<?=$row->down_child?>" />
                </td>
                <td class="text-center"><?=$row->up_child?>
                <!--    <input type="hidden" name="adult_num[]" class="c_adult_num"  value="<?=$row->up_child?>" />
                -->
                </td>
                <?php if($sarf_type == 1){?>
                    <td class="text-center"><?=$due_to_family?>
                        <input type="hidden" name="value[<?=$row->mother_national_num_fk?>]" class="c_value"  value="<?=$due_to_family?>" />
                    </td>
                <?php }elseif($sarf_type == 2){?>
                    <td class="text-center"><?=($row->down_child+$row->up_child +$row->mother_num_in)*$due_to_member?>
                        <input type="hidden" name="value[<?=$row->mother_national_num_fk?>]" class="c_value"  value="<?=($row->down_child+$row->up_child +$row->mother_num_in)*$due_to_member?>" />
                    </td>
                <?php }elseif($sarf_type == 3){?>
                    <td class="text-center"><?=($due_to_widow * $row->mother_num_in)+($row->down_child*$due_to_orphan)+($row->up_child * $due_to_beneficiary)?>
                        <input type="hidden" name="value[<?=$row->mother_national_num_fk?>]"  class="c_value" value="<?=($due_to_widow * $row->mother_num_in)+($row->down_child*$due_to_orphan)+($row->up_child * $due_to_beneficiary)?>" />
                <!--    <input type="hidden" name="mother_value[]" value="<?=$due_to_widow * $row->mother_num_in?>" />
                        <input type="hidden" name="young_value[]" value="<?=$row->down_child*$due_to_orphan?>" />
                        <input type="hidden" name="adult_value[]" value="<?=$row->up_child * $due_to_beneficiary?>" />
                      -->
                    </td>
                <?php }?>
            </tr>
        <?php }?>
        <!---------------------------- one row ------------------------------------>
    <?php }?>
    <script>
        $('#mother_id').val("");
         $('#due_to_family').val("");
        $('#due_to_family').attr('readonlyssssss', true);
    </script>
<?php }?>




