<?php
if(isset($relationships) &&!empty($relationships)){
    foreach ($relationships as $record){

?>
        <option value="<?php echo $record->id_setting;?>" ><?php echo $record->title_setting;?></option>

<?php } }  ?>
