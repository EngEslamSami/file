<?php
$gender  = array(
    '1'=>'ذكر',
    '2'=>'انثي',

);

?>

<option value="">إختر</option>
<?php
foreach ($gender as $key=>$row){


    if(isset($male) && !empty($male) && $key ==1){
        continue;
    }
    if(isset($female) && !empty($female) && $key == 2){
        continue;
    }
    ?>
    <option  value="<?=$key ?>"><?=$row ?></option>
<?php  } ?>