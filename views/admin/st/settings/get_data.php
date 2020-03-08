<?php
if (isset($levels) && $levels != null) {
    foreach ($levels as $level) {
        $value = ($level->level) + 1;
        echo "
    <input type='hidden' id='level'  name='level' value='$value'>";
    }
}
?>
    
