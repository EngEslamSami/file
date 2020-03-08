<tr>
    <td>#</td>
 <td><select class="form-control" data-validation="required" name="morfaq_id_fk[]">
         <option value="">اختر</option>
         <?php if(isset($files)&&!empty($files)){
             foreach ($files as $row){?>
                 <option value="<?php echo $row->id_setting;?>"><?php echo $row->title_setting;?></option>
         <?php } } ?>



     </select>  </td>
    <td><input type="file" data-validation="required" class="form-control" name="file[]">  </td>
    <td><input type="date"  data-validation="required" class="form-control" name="end_date[]">  </td>
    <td><select class="form-control" name="alert_type[]" data-validation="required">
            <option value="">اختر</option>
            <option value="1">يوم</option>
            <option value="7">أسبوع</option>
            <option value="14">أسبوعين</option>
            <option value="30">شهر</option>

        </select>  </td>
   <!-- <td><input type="text" class="form-control" name="num[]" data-validation="required">  </td>-->
    <td>  </td>
</tr>

