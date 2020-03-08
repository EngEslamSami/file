<?php if (isset($typies) && $typies != null && !empty($typies)){
       foreach ($typies as $row){ ?>
         <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                            <?php }
        } ?>