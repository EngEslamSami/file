
<tr>
    <td><?php echo $_POST['length'];?></td>
    <td><select name="problem_id_fk[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
            <option value="">اختر </option>
            <?php if(!empty($education_problems)){
                foreach ($education_problems as $problem){?>

                    <option value="<?php echo $problem->id_setting;?>"><?php echo $problem->title_setting;?></option>

                <?php } } ?>

        </select></td>
    <td><button class="btn btn-warning" >موجود</button></td>
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