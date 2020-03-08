


    <option value="">إختر</option>
<?php

if(!empty($departments)){
    foreach ($departments as $row ){

        echo '<option value="'.$row->id.'">'.$row->name.'</opion>';

    }
}

?>

