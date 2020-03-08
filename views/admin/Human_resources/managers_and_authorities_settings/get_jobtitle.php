
<tr>
    <td >
        <select class="form-control "  name="job_title_id_fk[]" data-validation="required" aria-required="true">
            <option value="">إختر</option>
            <?php
            if(!empty($jobtitles)){
            foreach ($jobtitles as $value){ ?>
                <option value="<?php echo $value->defined_id; ?>" ><?php echo  $value->defined_title;?> </option>
            <?php } } n?>
        </select> </td>
    <td>
        <select class="form-control selectpicker "  data-show-subtext="true" data-live-search="true"  name="emp_id_fk[]" data-validation="required" aria-required="true"      >
            <option value="">إختر</option>
            <?php
            if(!empty($employees)){
            foreach ($employees as $value){?>
                <option value="<?php echo $value->id; ?>" ><?php echo  $value->employee;?> </option>
            <?php } } ?>
        </select> </td>
    <td><input type="file" name="sign_img[]" id="sign_img[]"></td>
</tr>




<script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
</script>


