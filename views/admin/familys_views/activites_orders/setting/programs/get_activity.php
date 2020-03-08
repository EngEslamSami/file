

<?php  if(isset($actives) && !empty($actives) && $actives!=null){
    echo '<option value="" >اختر  </option>';
    foreach($actives as $activity){
        echo '<option value="'.$activity->id.'"  >'.$activity->name.'</option>';
    }
}else{
    echo '<option disabled value="" >لا يوحد بيانات مضافة </option>';
}?>