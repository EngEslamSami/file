<tr>
    <td>#</td>
    <td>
        <select name="attach_files_ids[]" class="form-control attached_files needed" data-validation="required"  >
            <option value="">إختر </option>
            <?php if(isset($type_attach_file) && !empty($type_attach_file)){
                foreach ($type_attach_file as $row){ ?>
                    <option value="<?php echo $row->id_setting ?>"><?php echo $row->title_setting ?></option>
                <?php } ?>
            <?php }else{ echo '<option value=""> لا يوجد تصنيفات </option>';} ?>
        </select>
    </td>
    <td>
        <input type="file" data-validation="required" name="attach_files[]" class="form-control half needed"  />
        <small class="" style="bottom:10px; color: red">
            برجاء إرفاق صورة
        </small>
    </td>
    <td>
        <a onclick="delete_row(this);" >
            <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
    </td>
</tr>


