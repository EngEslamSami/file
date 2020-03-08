<?php

$x= $len+1;
if($member_type == 1 ){    //        member_type == 1    ?>

    <?php if(isset($data_table) && !empty($data_table) && $data_table!=null){?>
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
            <th class="text-center">الحذف </th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php  $total_sarf =0;  $total_family_nums=0;$total_mother=0 ;$total_young=0;$total_adult= 0;
        foreach ($data_table as $row){
            $total_mother += $row->mother_num_in;
            $total_young  +=$row->down_child;
            $total_adult  +=$row->up_child;
            $total_family_nums +=($row->mother_num_in +$row->down_child +$row->up_child );
            $total_sarf= $total_family_nums * $money_according_to;?>
            <tr class="info2 tr<?php echo $x ;?>">
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
                <!--    <input type="hidden" name="all_num[]" value="<?=($row->down_child+$row->up_child +$row->mother_num_in)?>" />
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
                <!--    <input type="hidden" name="adult_num[]" value="<?=$row->up_child?>" />
                -->
                </td>
                <td class="text-center"><?=$total_family_nums * $money_according_to?>
                    <input type="hidden" name="value[<?=$row->mother_national_num_fk?>]" value="<?=$total_family_nums * $money_according_to?>" />
                </td>
                <td> <a type="button" class=" " onclick="del_row(<?php echo $x ;?>);"><i class="fa fa-trash"></i> </a></td>
            </tr>
        <?php }?>
        <tr>
            <td colspan="5">الإجمالى</td>
            <td><?=$total_family_nums?></td>
            <td><?=$total_mother?></td>
            <td><?=$total_young?></td>
            <td><?=$total_adult?></td>
            <td><input type="hidden" name="total_value" value="<?=$total_sarf?>" />
                <?=$total_sarf?></td>
        </tr>
        </tbody>
    </table>
    <?php }else{
        echo '<div class="alert alert-danger">
               <strong> لايوجد نتائج مطابقة للبحث!</strong> .
             </div>';
      }?>

<?php }elseif($member_type == 3){?>
    <?php if(isset($data_table) && !empty($data_table) && $data_table!=null){?>
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
            <th class="text-center">الحذف </th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php  $total_sarf =0;  $total_family_nums=0;$total_mother=0 ;$total_young=0;$total_adult= 0;
     foreach ($data_table as $row){
            if(($row->down_child + $row->up_child + $row->mother_num_in) == 0){continue;}
            $total_mother += $row->mother_num_in;
            $total_young  +=$row->down_child;
            $total_adult  +=$row->up_child;
            $total_family_nums +=($row->mother_num_in +$row->down_child +$row->up_child );
            $total_sarf+= ($row->down_child+$row->up_child +$row->mother_num_in) * $money_according_to;?>
         <tr class="info2 tr<?php echo $x ;?>">
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
                <!--    <input type="hidden" name="all_num[]" value="<?=($row->down_child+$row->up_child +$row->mother_num_in)?>" />
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
                <!--    <input type="hidden" name="adult_num[]" value="<?=$row->up_child?>" />
                -->
                </td>
                <td class="text-center"><?=($row->down_child+$row->up_child +$row->mother_num_in) * $money_according_to?>
                    <input type="hidden" name="value[<?=$row->mother_national_num_fk?>]" value="<?=($row->down_child+$row->up_child +$row->mother_num_in) * $money_according_to?>" />
                </td>
             <td> <a class=" "   type="button" onclick="del_row(<?php echo $x ;?>);"><i class="fa fa-trash"></i> </a></td>
            </tr>
        <?php }?>
        <tr>
            <td colspan="5">الإجمالى</td>
            <td><?=$total_family_nums?></td>
            <td><?=$total_mother?></td>
            <td><?=$total_young?></td>
            <td><?=$total_adult?></td>
            <td><input type="hidden" name="total_value" value="<?=$total_sarf?>" />
                <?=$total_sarf?></td>
        </tr>
        </tbody>
    </table>
    <?php }else{
        echo '<div class="alert alert-danger">
               <strong> لايوجد نتائج مطابقة للبحث!</strong> .
             </div>';
    }?>
<?php }elseif($member_type == 2){?>

    <?php if(isset($data_table) && !empty($data_table) && $data_table!=null){?>

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
                    <th class="text-center">الحذف </th>
                </tr>
                </thead>
                <tbody class="text-center" id="id_example">

                <?php  foreach ($data_table as $row){?>
                    <tr class="info2 tr<?php echo $x ;?>">
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
                        <!--    <input type="hidden" name="all_num[]" class="c_all_num"  value="<?=($row->down_child+$row->up_child +$row->mother_num_in)?>" />
                        -->
                        </td>
                        <td class="text-center"><?=$row->mother_num_in?>
                           <!-- <input type="hidden" name="mother_num[]" class="c_mother_num"  value="<?=$row->mother_num_in?>" />
                          -->
                        </td>
                        <td class="text-center"><?=$row->down_child?>
                        <!--    <input type="hidden" name="young_num[]"  class="c_young_num" value="<?=$row->down_child?>" />
                        -->
                        </td>
                        <td class="text-center"><?=$row->up_child?>
                        <!--    <input type="hidden" name="adult_num[]" class="c_adult_num"  value="<?=$row->up_child?>" />
                        -->
                        </td>
                        <!--
                        <td class="text-center"><?=($row->down_child+$row->up_child +$row->mother_num_in) * $money_according_to?>
                            <input type="hidden" name="value[<?=$row->mother_national_num_fk?>]" class="c_value"  value="<?=($row->down_child+$row->up_child +$row->mother_num_in) * $money_according_to?>" />
                        </td>-->
                         <td class="text-center"><?= $money_according_to ?>
                            <input type="hidden" name="value[<?= $row->mother_national_num_fk ?>]" class="c_value"
                                   value="<?=  $money_according_to ?>"/>
                        </td>
                        
                        <td> <a class=" "   type="button" onclick="del_row(<?php echo $x ;?>);"><i class="fa fa-trash"></i> </a></td>
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
            <?php  foreach ($data_table as $row){?>
                <tr class="info2 tr<?php echo $x ;?>">
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
                    <!--    <input type="hidden" name="all_num[]" class="c_all_num"  value="<?=($row->down_child+$row->up_child +$row->mother_num_in)?>" />
                    -->
                    </td>
                    <td class="text-center"><?=$row->mother_num_in?>
                    <!--    <input type="hidden" name="mother_num[]" class="c_mother_num"  value="<?=$row->mother_num_in?>" />
                    -->
                    </td>
                    <td class="text-center"><?=$row->down_child?>
                    <!--    <input type="hidden" name="young_num[]"  class="c_young_num" value="<?=$row->down_child?>" />
                    -->
                    </td>
                    <td class="text-center"><?=$row->up_child?>
                   <!--     <input type="hidden" name="adult_num[]" class="c_adult_num"  value="<?=$row->up_child?>" />
                    -->
                    </td>
<!--
                        <td class="text-center"><?=($row->down_child+$row->up_child +$row->mother_num_in) * $money_according_to?>
                            <input type="hidden" name="value[<?=$row->mother_national_num_fk?>]" class="c_value"  value="<?=($row->down_child+$row->up_child +$row->mother_num_in) * $money_according_to?>" />
                        </td>-->
                        
                          <td class="text-center"><?=  $money_according_to ?>
                        <input type="hidden" name="value[<?= $row->mother_national_num_fk ?>]" class="c_value"
                               value="<?=  $money_according_to ?>"/>
                    </td>
                    <td> <a class=""   type="button"onclick="del_row(<?php echo $x ;?>);"><i class="fa fa-trash"></i> </a></td>
                </tr>
            <?php }?>
            <!---------------------------- one row ------------------------------------>
        <?php }?>
        <script>
          //  $('#mother_id').val("");
           // $('#money_according_to').attr('readonly', true);
             $('#mother_id').val("");
            $('#money_according_to').val('');
        </script>
    <?php }?>

<?php }?>

