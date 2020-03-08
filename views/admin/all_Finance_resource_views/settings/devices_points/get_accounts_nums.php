<?php
if(isset($accounts) && !empty($accounts)){ ?>
    <option value="">- أختر -</option>
    <?php  foreach ($accounts as $row){
        ?>
        <option value="<?php echo $row->id;?>"><?php echo $row->account_num;?></option>

    <?php }} else { ?>
    <option value="">لايوجد  ارقام حسابات مضافة</option>
<?php } ?>