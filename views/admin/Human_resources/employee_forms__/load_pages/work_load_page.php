
<tr>




    <td><input type="text"  data-validation="required"  class="form-control" name="company_name[]"> </td>




    <td><input type="text" name="date_from[]" id=""  data-validation="required" value=""
               class="form-control bottom-input date_as_mask"
               data-validation-has-keyup-event="true">
        </div>الي<input type="text" name="date_to[]" id=""  data-validation="required" value=""
                      class="form-control bottom-input date_as_mask"
                      data-validation-has-keyup-event="true">
        </div></td>
    <td><select name="job_id_title_fk[]" id="job_title_id_fk"
                data-validation="required"   class="form-control "
                data-show-subtext="true" data-live-search="true"
                aria-required="true">
            <option value="">إختر</option>
            <?php
            if(isset($jobtitles)&&!empty($jobtitles)) {
                foreach($jobtitles as $row){
                    $select='';
                    if(!empty($result[0]->job_title_id_fk == $row->defined_id)){
                        $select='selected';
                    }
                    ?>
                    <option value="<?php echo $row->defined_id;?>" <?php echo $select;?>> <?php echo $row->defined_title;?></option >
                    <?php
                }
            }
            ?>
        </select></td>
    <td><input type="text" class="form-control" data-validation="required"  name="job_mission[]"> </td>
    <td><input type="text" class="form-control" data-validation="required"  name="salary[]" > </td>
    <td><input type="text" class="form-control" data-validation="required"  name="leave_work_reason[]"> </td>
</tr>


<script type="text/javascript">
    jQuery(function($){
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>