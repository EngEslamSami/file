



<?php 
$array = array(1=>'نعم',2=>'لا');
$in = $inc;
for ($i=0; $i < 1; $i++){ 
    ?>
	<tr>
                <td>
                <div class="col-sm-12">
               <!--
                <input type="text" class="form-control bottom-input" name="title[<?=$in?>]" id="title<?=$in?>"  data-validation="required"/>
                -->
                <select name="title[<?=$in?>]" id="title<?=$in?>" class="form-control" >
                <?php if(isset($files_names) && !empty($files_names)){
                    foreach($files_names as $row){
                      echo '<option value="'.$row->id_setting.'">'.$row->title_setting.'</option>';
                    }
                }else {
                    echo '<option value=""> لا يوجد أسماء مرفقات مضافة </option>';
                }?>
                </select>
                
                </div>
                </td>
                
                <td>
                <div class="col-sm-12">
                <input type="file" accept="application/pdf,application/vnd.ms-excel" class="form-control bottom-input" name="emp_file<?=$in?>" id="emp_file<?=$in?>" data-validation="required" />
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <select name="commited[<?=$in?>]" class="form-control bottom-input"  onchange="dateEnabled($(this).val(),<?=$in?>)" data-validation="required" >
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
                <input type="date" class="form-control date_as_mask bottom-input date<?=$in?>"  name="date_from[<?=$in?>]" <?php if(isset($allData) && isset($allData->badlat[$record->id]) && $allData->badlat[$record->id]->date_from > 0) echo 'data-validation="required" value="'.date("Y-m-d",$allData->badlat[$record->id]->date_from).'"'; else echo 'disabled' ?>/>
                </div>
                </td>
                <td>
                <div class="col-sm-12">
                <input type="date" class="form-control date_as_mask bottom-input date<?=$in?>" name="date_to[<?=$in?>]" <?php if(isset($allData) && isset($allData->badlat[$record->id]) && $allData->badlat[$record->id]->date_to > 0) echo 'data-validation="required" value="'.date("Y-m-d",$allData->badlat[$record->id]->date_to).'"'; else echo 'disabled' ?>  />
                </div>
                </td>
                <td>-</td>
              
                  
	</tr>
<?php } ?>

