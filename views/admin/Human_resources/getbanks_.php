<?php for ($i=$_POST['count']; $i < $number; $i++) { ?>
	<tr>
		<td>
			<div class="col-sm-12">
				<select name="bank_id_fk[<?=$i?>]" class="form-control bottom-input" data-validation="required" onchange="$('#bank_code<?=$i?>').val($(this).find('option:selected').attr('bank_code'))" >
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
		</div>
		</td>
		<td>
			<div class="col-sm-12">
				<input type="text" class="form-control bottom-input" name="bank_code[<?=$i?>]" data-validation="required" id="bank_code<?=$i?>" readonly/>
			</div>
		</td>
		<td>
			<div class="col-sm-12">
				<input type="text" maxlength="24" minlength="24" class="form-control bottom-input" name="bank_account_num[<?=$i?>]" id="bank_account_num<?=$i?>" data-validation="required" onfocusout="checkLength($(this).val());" />
			</div>
		</td>
		<td>
			<div class="col-sm-12">
				<input type="radio" name="approved_for_sarf" data-validation="required" value="<?=$i?>" />
			</div>
		</td>
	</tr>
<?php } ?>