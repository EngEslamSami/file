<?php
if(!empty($_POST['admin_num'])):?>
        <div class="col-xs-6">
            <h4 class="r-h4"> القسم </h4>
        </div>
        <div class="col-xs-6 r-input">
             <select  name="department" id="department" onchange="return check($('#department').val());" data-validation="required" aria-required="true">
                <option value="">إختر</option>
                <?php if(!empty($admin)):
                    foreach ($departs[$_POST['admin_num']] as $record):?>
                        <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
                    <?php  endforeach; endif;?>
            </select>
        </div>
<? endif;?>
