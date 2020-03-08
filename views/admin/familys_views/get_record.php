<tr>

    <td><input type="date" data-validation="required"  class="form-control" name="visit_date[]"></td>

    <td><select name="note[]"  data-validation="required" class="form-control">

            <option value=""> اختر</option>
            <?php if(isset($procedures_visit) &&!empty($procedures_visit)){
                    foreach($procedures_visit as $row){?>

                        <option value="<?php echo $row->id_setting;?>"><?php echo $row->title_setting;?></option>


               <?php
                    }
            }?>


            </select>

    </td>
    <td><input type="text" id="researcher_note<?php echo $count;?>"  class="form-control"
               onkeyup="get_length($(this).val(),<?php echo $count;?> );"  name="researcher_note[]"></td>


    <td><select data-validation="required"  id="visit_status<?php echo $count;?>"  class="form-control" name="visit_status[]">

              <option value="">اختر</option>
            <option value = 1> جاري الانتهاء</option>
            <option value=2> تم الانتهاء </option>
            <option value=3> لم ينم الانتهاء </option>
        </select></td>



</tr>