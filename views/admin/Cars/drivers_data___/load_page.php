<option value="">اختر</option>
<?php
if(isset($emps)&&!empty($emps)){
    foreach ($emps as $row){?>
        <option value="<?php echo $row->id;?>"><?php echo $row->employee;?> </option>

<?php }  } ?>