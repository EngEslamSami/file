<tr>


    <td><select name="degree_id_fk[]" id="employee_degree"
                class="form-control bottom-input"
                onchange=""
                data-validation="required" aria-required="true">
            <option value="">إختر</option>
            <?php
            if(isset($degree_qual)&&!empty($degree_qual)) {
                foreach($degree_qual as $row){
                    ?>
                    <option value="<?php echo $row->id_setting;?>"> <?php echo $row->title_setting;?></option >
                    <?php
                }
            }
            ?>
        </select> </td>



    <td><select name="qualification_id_fk[]" id="employee_qualification"
                class="form-control bottom-input"
                onchange=""
                data-validation="required" aria-required="true">
            <option value="">إختر</option>
            <?php
            if(isset($qualification)&&!empty($qualification)) {
                foreach($qualification as $row){
                    ?>
                    <option value="<?php echo $row->id_setting;?>"> <?php echo $row->title_setting;?></option >
                    <?php
                }
            }
            ?>
        </select></td>
    <td><input type="text" data-validation="required" name="school[]" class="form-control"></td>
    <td><input type="text" data-validation="required" name="specialied[]" class="form-control"></td>
    <td><input type="text" data-validation="required" name="year[]" class="form-control"> </td>
    <td><input type="text" data-validation="required" name="taqder[]" class="form-control"> </td>

    <td><input type="file"  data-validation="required" name="userfile[]" class="form-control"> </td>
    <td><a id="1" onclick=" $(this).closest('tr').remove(); "><i class="fa fa-trash"></i></a></td>

</tr>