<?php  if(isset($all_activite )  && !empty($all_activite) &&  $all_activite !=null){
        foreach ($all_activite as $row):?>
    <option value="<? echo $row->id;?>"><? echo $row->name;?></option>
    <?php endforeach;
      }else{
       echo '<option value=""> لا يوجد أنشطه مضافة</option>';
      }
?>