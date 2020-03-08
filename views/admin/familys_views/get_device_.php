
          <option value="">اختر</option>
                <?php $array_levels=array('','-','--','---','----','----','-----','------'); ?>
                <?php foreach ($all as $record=>$value){ ?>
                    <option  value="<?php echo $all[$record]->id?>" <?php if(!empty($disabls['dis'.$record])){echo  $disabls['dis'.$record];}?>>
                        <?php echo $array_levels[ $all[$record]->level].$all[$record]->name ?></option>
                <?php } ?>
