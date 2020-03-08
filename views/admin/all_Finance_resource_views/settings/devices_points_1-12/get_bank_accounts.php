<?php
if(isset($accounts) && !empty($accounts)){ ?>
    <option value="">- أختر -</option>
    <?php  foreach ($accounts as $row){
        ?>
        <option value="<?php echo $row->account_id_fk;?>"><?php echo $row->account_name;?></option>

    <?php }} else { ?>
    <option value="">لايوجد حسابات مضافة</option>
<?php } ?>