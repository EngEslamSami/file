<?php if(isset($records_row) && !empty($records_row) && $records_row!=null){
    echo '<option value="" >اختر  </option>';
    foreach($records_row as $record){
        echo '<option value="'.$record->id.'"  >'.$record->title.'</option>';
    }
}else{
    echo '<option value="" >لا يوحد بيانات مضافة </option>';
}?>