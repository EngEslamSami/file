<?php
if(isset($departments) && !empty($departments)){ ?>
    <option value="">- أختر -</option>
    <?php  foreach ($departments as $row){
        ?>
        <option value="<?php echo $row->id;?> "><?php echo $row->name;?></option>

    <?php }} else { ?>
    <option value="">لايوجد اقسام تابعة</option>
<?php } ?>