<?php if(!empty($one_data)){
    ;
    $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
    $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
    ?>
    <?php $x=1;foreach ($one_data as $row_img){
        $ext = pathinfo($row_img->file, PATHINFO_EXTENSION)?>
        <tr class="<?=$x?>">

            <td><?=$row_img->title?> </td>
            <td>
                <?php
                if (in_array($ext,$image)){
                    ?>

                     <img id="img_view<?=$x?>" src="<?php  echo base_url().'uploads/family_attached/nmazg/nmazg_letter_attaches/'.$row_img->file?>"  width="150px" height="150px" /> 

                

                    <?php
                } else if (in_array($ext,$file)){
                    ?>
                    <a target="_blank" href="<?=base_url()."family_controllers/namazegs/Namazeg/read_file/".$row_img->file?>">
                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                    <?php
                }
                ?>
            </td>
            <td>

                <a href="<?php echo  base_url().'family_controllers/namazegs/Namazeg/Delete_attach/'.$row_img->id?>" > <i class="fa fa-trash" ></i> </a></td>
        </tr>
        <?php  $x++; } }
    ?>