<option value="اختر">اختر</option>
<?php
if(isset($all_pills) && !empty($all_pills)){
    foreach($all_pills as $row) {
        ?>
<option value="<?php echo $row->pill_num ;?>"> <?php echo $row->pill_num ;?></option>

        <?php
    }
}
?>