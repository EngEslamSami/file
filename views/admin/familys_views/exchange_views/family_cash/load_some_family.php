
<?php if(isset($data_table) && !empty($data_table) && $data_table!=null){?>

   <?php if($count_family == 1){?>
    

        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">رقم الملف </th>
            <th class="text-center">اسم العائلة </th>
            <th class="text-center">عدد الأفراد </th>
            <th class="text-center">أرملة </th>
            <th class="text-center">يتيم </th>
            <th class="text-center">مستفيد </th>
            <th class="text-center">إجمالى </th>
            <th class="text-center">حذف </th>
        </tr>
        </thead>
        <tbody class="text-center" id="id_example"">

             <?php $x=1; foreach ($data_table as $row){?>
            <tr id="first_row">
                <td class="text-center"><?=$x++?></td>
                <td class="text-center"><?=$row->file_num?>
                    <input type="hidden" name="file_num[]" value="<?=$row->file_num?>" />
                </td>
                <td class="text-center"><?=$row->name?> </td>
                <td class="text-center"><?=($row->family_member_num)?>
                  <!--  <input type="hidden" name="all_num[]" value="<?=($row->family_member_num)?>" /> -->
                </td>
                <td class="text-center"><?=$row->armal?> 
                   <!--  <input type="hidden" name="mother_num[]" value="<?=$row->armal?>" /> -->
                </td>
                <td class="text-center"><?=$row->yatem?>
                   <!--  <input type="hidden" name="young_num[]" value="<?=$row->yatem?>" />  -->
                </td>
                <td class="text-center"><?=$row->mostafed?>
                  <!--   <input type="hidden" name="adult_num[]" value="<?=$row->mostafed?>" />  -->
                </td> 
                <td>  <input type="hidden" class="one_count" name="one_value[]" value="<?php echo $cashing;?>" />
                <?php echo $cashing;?></td>
                <td>
                     <a onclick="remove_row(this);" >
                     <i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        <?php }?>
        <tfoot>
            <tr>
               <td colspan="7"> الاجمالى</td>
               <td id="total_values"> </td>
               <td > </td>
             </tr>  
         </tfoot>

        </tbody>
    </table>
    <?php }else{?>
        <!---------------------------- one row ------------------------------------>
               <?php $x=1; foreach ($data_table as $row){?>
            <tr>
                <td class="text-center"><?=$x++?></td>
                <td class="text-center"><?=$row->file_num?>
                    <input type="hidden" name="file_num[]" value="<?=$row->file_num?>" />
                </td>
                <td class="text-center"><?=$row->name?> </td>
                <td class="text-center"><?=($row->family_member_num)?>
                  <!--  <input type="hidden" name="all_num[]" value="<?=($row->family_member_num)?>" /> -->
                </td>
                <td class="text-center"><?=$row->armal?> 
                   <!--  <input type="hidden" name="mother_num[]" value="<?=$row->armal?>" /> -->
                </td>
                <td class="text-center"><?=$row->yatem?>
                   <!--  <input type="hidden" name="young_num[]" value="<?=$row->yatem?>" />  -->
                </td>
                <td class="text-center"><?=$row->mostafed?>
                  <!--   <input type="hidden" name="adult_num[]" value="<?=$row->mostafed?>" />  -->
                </td> 
                <td>   <input type="hidden" class="one_count" name="one_value[]" value="<?php echo $cashing;?>" />
                <?php echo $cashing;?></td>
                 <td>
                     <a onclick="remove_row(this);" >
                     <i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
        <?php }?>
        <!---------------------------- one row ------------------------------------>
    <?php }?>
    
<?php }?>




