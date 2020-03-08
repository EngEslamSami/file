
<tr>
    <td><?php echo $_POST['length'];?></td>
    <td><select name="employee_job[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
            <option value="">اختر المهنة</option>
            <?php if(!empty($employment_jobs)){
                foreach ($employment_jobs as $job){?>

                    <option value="<?php echo $job->id_setting;?>"><?php echo $job->title_setting;?></option>

            <?php } } ?>

        </select></td>
    <td><input type="text"  onkeypress="validate_number(event)" name="employee_salary[]" data-validation="required" class="form-control half"></td>
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