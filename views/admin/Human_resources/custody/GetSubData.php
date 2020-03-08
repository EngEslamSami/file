<option value=""> إختر</option>
<?php
if(!empty($records)){
    
    
    
    foreach ($records as $record){
        
        
        
     echo'<option value="'.$record->id.'"> '.$record->title.'</option>';

    }
    
}