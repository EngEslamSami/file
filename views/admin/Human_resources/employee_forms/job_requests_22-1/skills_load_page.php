<tr>
    <td><input type="text" data-validation="required"  name="name[]" class="form-control"></td>
    <td><input type="text" data-validation="required"  name="details[]" class="form-control"> </td>
    <td>
        <select name="efficiency_id_fk[]" id="efficiency_id_fk" data-validation="required"
                class="form-control bottom-input selectpicker" data-show-subtext="true" data-live-search="true"
                aria-required="true">
            <option value="">إختر</option>
            <?php
            if(isset($efficiency)&&!empty($efficiency)) {
                foreach($efficiency as $row){

                    ?>
                    <option value="<?php echo $row->id_setting;?>"> <?php echo $row->title_setting;?></option >
                    <?php
                }
            }
            ?>
        </select> </td>
    <td><a id="1" onclick=" $(this).closest('tr').remove(); "><i class="fa fa-trash"></i></a></td>


</tr>
