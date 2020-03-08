

<tr>
    <td><?php echo $_POST['length'];?></td>
    <td><select name="association_id_fk[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="" aria-required="true" >
            <option value="">اختر الجمعية</option>
            <?php if(!empty($associations)){
                foreach ($associations as $row){?>

                    <option value="<?php echo $row->id_setting;?>"><?php echo $row->title_setting;?></option>

                <?php } } ?>
        </select></td>
    <td><label><input type="checkbox" name="in_kind_assistance[]" value="1" > عينية</label></td>
    <td><label><input type="checkbox" name="material_assistance[]" value="1"> مادية</label></td>
</tr>



<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>