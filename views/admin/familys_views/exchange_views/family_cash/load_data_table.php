<?php if(isset($data_table) && !empty($data_table) && $data_table!=null){?>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">رقم الملف </th>
            <th class="text-center">إسم العائلة </th>
            <th class="text-center">عدد الأفراد </th>
            <th class="text-center">أرملة </th>
            <th class="text-center">يتيم </th>
            <th class="text-center">مستفيد </th>
            <th class="text-center">إجمالى </th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php $total=0; $x=1; foreach ($data_table as $row){?>
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
                <td> 
                 
                    <?php if(isset($opriun_id)){
                             if($opriun_id == 3){
                                echo $cashing  ;
                                $add_value = $cashing ;
                             }elseif($opriun_id == 4){ 
                                 echo ($armal * $row->armal)+ ($yatem * $row->yatem )+($mostafed * $row->mostafed);
                                  $add_value = ($armal * $row->armal)+ ($yatem * $row->yatem )+($mostafed * $row->mostafed);
                             }
                    }else{
                        echo $row->value;
                        $add_value = $row->value;
                    }?>
                   <input name="one_value[]" type="hidden" value="<?=$add_value?>" />
                </td>
            </tr>
        <?php  $total+= $add_value;}?>
             <tr>
             <td colspan="7"> الاجمالى</td>
              <td >   <input type="hidden" id="total_count" value="<?=$total?>" />
               <?=$total?> </td>
             </tr>
        </tbody>
        </table>

<?php }?>