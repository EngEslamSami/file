<?php
if(!empty($_POST['admin_num'])):?>




                <option value="0">إختر</option>
                <?php if(!empty($admin)):
                    foreach ($departs[$_POST['admin_num']] as $record):?>
                        <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
                    <?php  endforeach; endif;?>

<? endif;?>
