<?php

if(isset($files)&&!empty($files)) {?>


<tr>

     <td>#</td>
    <td><select class="form-control" data-validation="required" name="attach_id_fk[]">
            <option value="">اختر</option>
            <?php
    foreach ($files as $record) {?>
        <option value="<?php echo $record->id_setting;?>"><?php echo $record->title_setting;?></option>
         <?php }   ?>

        </select></td>
    <td><input type="file" data-validation="required" name="file[]"> </td>
</tr>
<?php } ?>