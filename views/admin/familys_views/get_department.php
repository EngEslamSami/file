
<?php if(isset($departments)&&!empty($departments)) { ?>
    <option value="">اختر</option>
    <?php  foreach ($departments as $row_departments) {?>
        <option value="<?=$row_departments->id?>"> <?=$row_departments->name?></option>
    <?php }
     }else {
            if (isset($admin_id)) {
             echo '<option value="">لا يوجد أقسام مضافة </option>';
            }
      }?>

<?php if(isset($select_user)&&!empty($select_user)) {?>
    <option value="">اختر</option>
    <?php foreach ($select_user as $row_user) {
            $out_name=  $row_user->user_name ;
        if($row_user->role_id_fk == 3){
            $out_name=  $row_user->employee ;
        }?>
        <option value="<?=$row_user->user_id."-".$row_user->role_id_fk."-".$row_user->system_structure_id_fk?>"
        
               data-img="<?=$row_user->personal_photo?>"
                data-job="<?=$row_user->emp_job_title?>"
        >
            <?=$out_name?></option>
    <?php }
     }else{
             if (isset($depart_id)) {
                 echo '<option value="">لا يوجد مستخدمين   </option>';
             }
}
?>













