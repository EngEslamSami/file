
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>
<?php echo form_open_multipart('human_resources/Managers_and_authorities_settings/Update_departments_managers'); ?>
<table class="table table-striped table-bordered" >
    <thead>
    <tr class="info">
        <th>الإدارة</th>
        <th>المدير المباشر</th>
        <th>الإجراء</th>
    </tr>
    </thead>
<tr>
     <td>
         <select class="form-control   "  name="depart_id_fk" data-validation="required" aria-required="true"     >
             <option value="">إختر</option>
             <?php foreach ($mainDepartments as $value){ 
                 
                  $select='';
                 if($result['depart_id_fk'] == $value->id){

                     $select='selected';
                 }
                 ?>
                 <option value="<?php echo $value->id; ?>"  <?php echo$select;?>><?php echo  $value->name;?> </option>
             <?php }?>
         </select> </td>
    <td>
        <select class="form-control   "  name="emp_id_fk"  data-validation="required" aria-required="true"    >
            <option value="">إختر</option>
            <?php foreach ($employees as $value){

                $select='';
                if($result['emp_id_fk'] == $value->id){

                    $select='selected';
                }
                ?>
                <option value="<?php echo $value->id; ?>" <?php echo$select;?> ><?php echo  $value->employee;?> </option>
            <?php }?>
        </select> </td>
    <td><input   type="file" name="sign_img" id="sign_img"></td>
</tr></tbody></table>




<div class="col-sm-12">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <input type="hidden" name="id_update" value="<?php echo $result['id'];?>">
        <input type="submit" name="update" id="" class="btn btn-blue btn-close" value="حفظ"/>
    </div>
    <div class="col-sm-4"></div>
</div>
<?php  echo form_close()?>



<script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
</script>
