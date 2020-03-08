

<tr>
    <td><?php echo $_POST['length'];?></td>
    <td><input type="text" name="employees_son_name[]" class="form-control half"></td>
    <td><select name="employees_son_gender[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
            <?php $gender_arr=array('','ذكر','أنثى');?>
            <option value="">اختر الجنس</option>
            <?php for ($a=1;$a<sizeof($gender_arr);$a++){ $select='';
                if($a== $member_gender){$select='selected';}?>
                <option value="<?php echo$a; ?>"
                    <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
            <?php }?>

        </select></td>
    <td><input type="text"  onkeypress="validate_number(event)" name="employees_son_id_number[]" class="form-control half"></td>
    <td><select name="employees_son_job[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
            <option value="">اختر المهنه</option>
            <?php if(!empty($jobs)){ foreach ($jobs as $record){ ?>
            <option value="<?php echo $record->id_setting;?>"><?php echo $record->title_setting;?></option>
            <?php  } }  ?>
        </select></td>
    <td><input type="text" name="employees_son_geha[]" class="form-control half"></td>
    <td><input type="text"  onkeypress="validate_number(event)" name="employees_son_salary[]" data-validation="required" class="form-control half"></td>
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