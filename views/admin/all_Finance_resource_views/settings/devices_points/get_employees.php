<?php
if(isset($employees) && !empty($employees)){ ?>
    <option value="">- أختر -</option>
    <?php  foreach ($employees as $row){
        ?>
        <option value="<?php echo $row->id;?>"><?php echo $row->employee;?></option>

    <?php }} else { ?>
    <option value="">لايوجد موظفين تابعة</option>
<?php } ?>