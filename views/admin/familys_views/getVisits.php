<?php 
$visit_status = array(1=>'تم',2=>'لم تتم');
for ($i=$_POST['count']; $i < $number; $i++) { 
?>
	<tr>
		<td>
			<div class="col-sm-12">
				<input type="date" name="visit_date[<?=$i?>]" class="form-control bottom-input" data-validation="required">
			</div>
		</td>
		<td>
			<div class="col-sm-12">
				<input type="text" class="form-control bottom-input" name="note[<?=$i?>]" data-validation="required" />
			</div>
		</td>
		<td>
			<div class="col-sm-12">
				<select name="visit_status[<?=$i?>]" class="form-control bottom-input" data-validation="required" >
			        <option value="">إختر</option>
			        <?php foreach ($visit_status as $key => $value) { ?>
			        <option value="<?=$key?>"><?=$value?></option>
			        <?php } ?>
		    	</select>
			</div> 
		</td>
		<td>
			<div class="col-sm-12">
				<input type="text" class="form-control bottom-input" name="researcher_note[<?=$i?>]" data-validation="" />
			</div>
		</td>
	</tr>
<?php } ?>