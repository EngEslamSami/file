<?php 
$house_device_status=array(1=>'جيد',2=>'متوسط',3=>'غير جيد',4=>'يحتاج');
$in = $inc;
for ($i=0; $i < 1; $i++){ 
    ?>
	<tr>
    <td>
    <div class="col-sm-12">
    <select name="custody_id_fk[<?=$in?>]" class="selectpicker no-padding form-control bottom-input" data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"  >
    <option value="">إختر</option>
    <?php 
    foreach ($custody as $row) { 
    $select = '';
    ?>
    <option value="<?=$row->id?>" <?=$select?>><?=$row->name?></option>
    <?php } ?>
    </select>
    </div>
    </td>
     <td>
    <div class="col-sm-12">
    <input type="text" class="form-control bottom-input" name="custody_title[<?=$in?>]" id="custody_title<?=$in?>"  data-validation="required"/>
    </div>
    </td>
    <td>
    <div class="col-sm-12">
    <input type="number"  class="form-control bottom-input" name="num[<?=$in?>]"   id="num<?=$in?>" data-validation="required" />
    </div>
    </td>
    <td>
    <div class="col-sm-12">
    <select name="status[<?=$in?>]" class="selectpicker no-padding form-control bottom-input" data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
    <option value="">إختر</option>
    <?php 
    foreach ($house_device_status as $key => $value) { 
    $select = '';
    ?>
    <option value="<?=$key?>"<?=$select?>><?=$value?></option>
    <?php } ?>
    </select>
    </div>
    </td>
    <td>
    <div class="col-sm-12">
    <input type="date" class="form-control bottom-input date<?=$in?>"  name="date_recived[<?=$in?>]" data-validation="required" />
    </div>
    </td>               
	</tr>
<?php } ?>
<script>
 $('.selectpicker').selectpicker('refresh');
</script>
<style>
.bootstrap-select.btn-group .dropdown-menu{
    top: 0!important;
}
</style>