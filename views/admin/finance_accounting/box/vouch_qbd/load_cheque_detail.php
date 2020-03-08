<tr>
    <td><input type="text" name="sheek_num[]" value="" class="form-control input_style_2 bank" data-validation="" data-validation-has-keyup-event="true">
    </td>
    <td><input type="date"  name="sheek_date[]" data-validation="" id="day_date" value=""  pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:30))|(?:(?:0[13578]|1[02])-31))" class="form-control input_style_2 bank" data-validation-has-keyup-event="true">
    </td>
    <td><select id="pill_type"  name="bank_id_fk[]" class="form-control input_style_2 bank"
                onchange="$('#bank_name_hidden').val($('option:selected',this).text());" data-validation="" aria-required="true">
            <option value="">إختر</option>
            <?php if(isset($banks) && !empty($banks)){
                foreach ($banks as $bank){?>

                    <option  value="<?=$bank->id?>"><?=$bank->title?></option>
                <?php }} ?>
        </select> </td>
    <td><input readonly type="button" id="delPOIbutton" value="حذف" onclick="deleteRow(this)" /></td>

</tr>