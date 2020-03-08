<option value="0">اختر</option>

<?php
if(isset($records)&&!empty($records)){
    foreach ($records as $row){
        ?>
        <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>


    <?php } } ?>
