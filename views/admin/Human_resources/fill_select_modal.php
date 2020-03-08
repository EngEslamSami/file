








<?php
if(isset($options_modal)&&!empty($options_modal)){
    foreach ($options_modal as $row){
        ?>
        <option value="<?php echo $row->id;?>" <?php if($row->id==$selected_val){ echo 'selected';} ?> ><?php echo $row->title;?></option>


    <?php } } ?>

