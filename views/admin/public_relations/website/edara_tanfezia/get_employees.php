<?php
if(isset($employees) && !empty($employees)){ ?>
    <option value="">- أختر -</option>
    <?php  foreach ($employees as $row){
        ?>
        <option value="<?php echo $row->id;?>"
            <?php
            if (isset($get_emp) && $get_emp->emp_id_fk == $row->id){
                echo 'selected';
            }
            ?>
        ><?php echo $row->employee;?></option>
    <?php }} else { ?>
    <option value="">لايوجد موظفين تابعة</option>
<?php } ?>