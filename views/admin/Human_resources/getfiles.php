<?php 
$array = array(1=>'نعم',2=>'لا');
for ($i=0; $i < $number; $i++) { 
    ?>
	<tr>
                <td>
                <div class="col-sm-12">
                <input type="text" class="form-control bottom-input" name="title[<?=$i?>]" id="title<?=$i?>"  data-validation="required"/>
                </div>
                </td>
                
                <td>
                <div class="col-sm-12">
                <input type="file" accept="application/pdf,application/vnd.ms-excel" class="form-control bottom-input" name="emp_file<?=$i?>" id="emp_file<?=$i?>" data-validation="required" />
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <select name="commited[<?=$i?>]" class="form-control bottom-input"  onchange="dateEnabled($(this).val(),<?=$i?>)" data-validation="required" >
                <option value="">إختر</option>
                <?php 
                foreach ($array as $key => $value) { 
                $select = '';
                
                ?>
                <option value="<?=$key?>" <?=$select?>><?=$value?></option>
                <?php } ?>
                </select>
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <input type="date" class="form-control bottom-input date<?=$i?>"  name="date_from[<?=$i?>]" <?php if(isset($allData) && isset($allData->badlat[$record->id]) && $allData->badlat[$record->id]->date_from > 0) echo 'data-validation="required" value="'.date("Y-m-d",$allData->badlat[$record->id]->date_from).'"'; else echo 'disabled' ?>/>
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <input type="date" class="form-control bottom-input date<?=$i?>" name="date_to[<?=$i?>]" <?php if(isset($allData) && isset($allData->badlat[$record->id]) && $allData->badlat[$record->id]->date_to > 0) echo 'data-validation="required" value="'.date("Y-m-d",$allData->badlat[$record->id]->date_to).'"'; else echo 'disabled' ?>  />
                </div>
                </td>
                    
	</tr>
<?php } ?>