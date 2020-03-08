 <tr>
     <td>#</td>
     <td> <select name="file_attach_id_fk[]" class="form-control" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
            <option value="">إختر </option>
           <?php if(isset($type_attach_file) && !empty($type_attach_file)){
                  foreach ($type_attach_file as $row){ ?> 
                    <option value="<?php echo $row->id_setting ?>"><?php echo $row->title_setting ?></option>
                 <?php } ?>
           <?php }else{ echo '<option value=""> لا يوجد تصنيفات </option>';} ?>
          </select>
     </td>
     <td>
            <input type="file" name="file_attach_name[]" class="form-control half"  />
				
     </td>
     <td>
          <a onclick="delete_row(this);" >
				<i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
     </td>
 </tr>                           