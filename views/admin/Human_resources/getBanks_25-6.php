
<tr>
	<td>

		<select name="bank_id_fk[]" class="form-control " data-validation="required" onchange="$('#bank_code<?=$number?>').val($(this).find('option:selected').attr('bank_code'))" >
			<option value="">إختر</option>
			<?php 
			if (isset($banks) && $banks != null) {
				foreach ($banks as $value) {
					?>
					<option bank_code='<?=$value->bank_code?>' value="<?=$value->id?>"><?=$value->ar_name?></option>
					<?php
				}
			}
			?>
		</select>

	</td>
	<td>

		<input type="text" class="form-control " name="bank_code[]" data-validation="required" id="bank_code<?=$number?>" readonly/>
	</td>
	<td>
		<input type="text" maxlength="24" minlength="24" class="form-control " name="bank_account_num[]" id="bank_account_num<?=$number?>" data-validation="required" onfocusout="checkLength($(this).val());" />
	</td>
    <td>
		<input type="file" maxlength="24" minlength="24" class="form-control" name="userfile[]"    />
	</td>
    
    
	<td>
		<button class="btn-info"> لم يتم تحديد الحاله</button>
	</td>
</tr>
