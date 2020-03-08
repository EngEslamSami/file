


                   <?php 
                   
                   echo base_url() . $path->folder_path .'/'. $imgs[0]->file;
                   if(!empty($imgs[0]->file) ){?>
<img id="img_view"
                     src="<?php echo base_url() . $path->folder_path .'/'. $imgs[0]->file ?>"
                   style="width:100%;"   />

                   <?php } ?>
                   