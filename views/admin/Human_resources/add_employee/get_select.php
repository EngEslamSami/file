<option value="0">اختر</option>
<?php
foreach($employees as $row) {
    ?>
<option value="<?php echo $row->emp_code;?>"><?php echo $row->name;?> </option>


    <?php
}
?>