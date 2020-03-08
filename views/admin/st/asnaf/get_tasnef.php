<?php
if(isset($tasnefat) && !empty($tasnefat)){ ?>
    <option value="">- أختر -</option>
    <?php  foreach ($tasnefat as $row){
        ?>
        <option value="<?php echo $row->id;?> "
            <?php
//            if ($tasnef==$row->id){
//                echo 'selected';
//            }
            ?>
        ><?php echo $row->name;?></option>

    <?php }} else { ?>
    <option value="لايوجد تصنيفات تابعة">لايوجد تصنيفات تابعة</option>
<?php } ?>