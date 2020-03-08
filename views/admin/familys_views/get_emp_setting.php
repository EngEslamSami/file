<option value="">اختر</option>
<?php
if (isset($emps)&& !empty($emps)){
    foreach ($emps as $emp){
    ?>
        <option value="<?=$emp->person_id."-".$emp->emp_data->role_id_fk."-".$emp->emp_data->system_structure_id_fk?>"
                data-img="<?=$emp->person_img?>"
                data-job="<?=$emp->job_title_n?>"><?= $emp->person_name?></option>
<?php
}
}else{
    ?>
    <option value="">لا يوجد موظفين   </option>
<?php
}
?>