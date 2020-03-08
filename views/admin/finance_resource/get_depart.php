<?php

if(!empty($_POST['admin_num'])):?>

    <div class="col-xs-12" id="optionearea1">
        <div class="col-xs-6">
            <h4 class="r-h4"> البرنامج </h4>
        </div>
        <div class="col-xs-6 r-input">
           <!-- <select  name="program_id_fk">-->
             <select  name="program_id_fk" id="program_id_fk" onchange="return check($('#program_id_fk').val());" required>
                <option value="">إختر</option>
                <?php if(!empty($account_settings)):
                    foreach ($program_settings[$_POST['admin_num']] as $record):?>
                        <option value="<? echo $record->id;?>"><? echo $record->program_name;?></option>
                    <?php  endforeach; endif;?>
            </select>
        </div>
    </div>


<? endif;?>
