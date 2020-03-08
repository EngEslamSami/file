<tr>


    <td><input type="text" name="dawra[]" data-validation="required" class="form-control"> </td>



    <td><input type="text" name="place[]" data-validation="required"  id=""  data-validation="required" value=""
               class="form-control date_as_mask"
               data-validation-has-keyup-event="true">

       </td>
    <td> <input type="date" name="date_from[]" data-validation="required"  id=""  data-validation="required" value="<?= date('Y-m-d');?>"
                class="form-control "
                data-validation-has-keyup-event="true">
        الي <input type="date" data-validation="required" name="date_to[]"  id=""  data-validation="required" value="<?= date('Y-m-d');?>"
                       class="form-control bottom-input "
                       data-validation-has-keyup-event="true">
        </td>
    <td><input type="text" data-validation="required" name="specialized[]"  class="form-control"> </td>
    <td><input type="file" data-validation="required" name="userfile[]"  class="form-control"> </td>
    <td><a id="1" onclick=" $(this).closest('tr').remove(); "><i class="fa fa-trash"></i></a></td>


</tr>