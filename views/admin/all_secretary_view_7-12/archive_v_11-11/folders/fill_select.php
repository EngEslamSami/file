<?php if(isset($folders)&&!empty($folders)){
    $x=0;
    foreach ($folders as $row){
        $x++;
        $from_id_fk='';
        ?>
        <option value="<?php echo $row->id ; ?>" <?php if($row->id==$from_id_fk){echo 'selected';}?> ><?php echo  $row->en_title;?></option>
        <?php  get_array2($row->sub,'&nbsp &nbsp',$from_id_fk);?>
    <?php } } ?>



<?php


        function get_array2($arr,$l,$from_id_fk)
        {
            foreach ($arr as $key => $value) {?>

                <option value="<?php echo $value->id;?>" <?php if($value->id==$from_id_fk) echo 'selected' ; ?>><?php echo '&nbsp &nbsp &nbsp &nbsp'. $value->en_title;?></option>
                <?php
                get_array2($value->sub,'&nbsp &nbsp &nbsp &nbsp');
            }

        }

?>
