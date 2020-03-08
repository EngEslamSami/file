
          <option value="">اختر</option>

                <?php foreach ($all as $record=>$value){
                    $last =$max_value - 1;
                    if( $all[$record]->level  > $last || $all[$record]->level < $last){

                        continue;

                    }?>
                    <option  value="<?php echo $all[$record]->id?>" >
                        <?php echo $all[$record]->name ?></option>
                <?php } ?>
