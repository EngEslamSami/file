<?php
if(isset($sub_branch) &&!empty($sub_branch))
foreach ($sub_branch as $row) {
    {

        ?>

        <option value="<?php echo $row->id;?>" ><?php echo $row->name;?></option>
        <?php
    }
}else { ?>

    <option >لاتوجد تصنيفات فرعيه تابعه</option>
<?php } ?>
