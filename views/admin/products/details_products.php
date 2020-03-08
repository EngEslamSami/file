
            <option data-subtext="" value=""> قم باختيار القسم</option>
            
            <?php foreach($all  as $record=>$value):?>
                <?php $array_levels=array('','-','--','---','----','----','-----','------','-------'); ?>
                <option data-subtext="" value="<?php echo $all[$record]->code ?>">
                    <?php echo $array_levels[ $all[$record]->level].$all[$record]->name ?></option>
            <?php endforeach;?>
        