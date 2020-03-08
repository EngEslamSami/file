<option value="">اختر</option>

<?php
if(isset($users)&&!empty($users)){
    $name = 'غير محدد';
    foreach ($users as $row){
        if($row->role_id_fk ==1){
            $name = $row->user_username;
        }elseif($row->role_id_fk ==2){
            $name = $row->member_name;
        }else if($row->role_id_fk ==3){
            $name = $row->emp_name;
        }elseif($row->role_id_fk ==4){
            $name = $row->member_public_name;
        }elseif($row->role_id_fk ==5){
            $name = $row->user_user;
        }
        ?>
        <option value="<?php echo $row->user_id;?>"><?php echo $name;?></option>


    <?php } } ?>