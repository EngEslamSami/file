 








<?php

        $table_head="";
        $table_footer="";
 if($count_table == 1){
    $table_head='<table  class="table table-bordered table-devices">
                    <thead>
                    <tr class="greentd">
                       
                        <th class="gray_background">الإسم</th>
                        <th class="gray_background"> رقم السجل المدني للأسرة</th>
                        <th class="gray_background">رقم الحفيظة</th>
                        <th class="gray_background">مكان الإصدار</th>
                         <th class="gray_background">حذف</th>

                    </tr>
                    </thead>
                    <tbody id="body_row">';
    $table_footer='     </tbody>
                </table>';  ?>
<?php }
       
        ?>     
        
        
        
        <?php if($member_type == 1){?>
     <?php echo $table_head;?>
      <tr class="tr<?php echo $mother->mother_national_card_new;?>" accesskey="">
        <td><input type="hidden"  name="option_select[]" value="<?php echo $mother->mother_national_card_new;?>-1"> 
         <?php echo $mother->full_name;?> (الأم)</td>
        <td> <?php echo $mother->mother_national_card_new;?></td>
        <td> <?php echo $mother->mother_national_card_new;?></td>
        <td> <?php echo $mother->dest_card;?></td>
        <td> <button type="button" class="" onclick="del(<?php echo $mother->mother_national_card_new;?>);"><i class="fa fa-trash"></i> </button></td>
     </tr>
     <?php echo $table_footer;?>
<?php }elseif($member_type == 2){?>
  <?php echo $table_head;?>
      <tr class="tr<?php echo $father->f_national_id;?>">
        <td><input type="hidden"  name="option_select[]"  value="<?php echo $father->f_national_id;?>-2"/> 
       <?php echo $father->full_name;?>(الأب)</td>
        <td> <?php echo $father->f_national_id;?></td>
        <td> <?php echo $father->f_national_id;?></td>
        <td> <?php echo $father->dest_card;?></td>
        <td> <button type="button"  class="" onclick="del(<?php echo $father->f_national_id;?>);"><i class="fa fa-trash"></i> </button></td>
     </tr>
      <?php echo $table_footer;?>
<?php }elseif($member_type == 3){?>
<?php echo $table_head;?>
 <tr class="tr<?php echo $members->member_card_num;?>" >
        <td><input type="hidden"   name="option_select[]"  value="<?php echo $members->member_card_num;?>-3"> 
       <?php echo $members->member_full_name;?> (الأبناء)</td>
        <td> <?php echo $members->member_card_num;?></td>
        <td> <?php echo $members->member_card_num;?></td>
        <td> <?php echo $members->dest_card;?></td>
        <td> <button type="button"  class="" onclick="del(<?php echo $members->member_card_num ;?>);"><i class="fa fa-trash"></i> </button></td>


 </tr>
  <?php echo $table_footer;?>
<?php }?>           