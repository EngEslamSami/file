
                <option value="">إختر</option>
                <?php if(!empty($ahai)){
                    foreach ($ahai as $hai){   ?>
                        <option value="<?php echo $hai->id;?>" ><?php echo $hai->name;?></option>
                    <?php }
                }?>
