<?php if(isset($imgs) && !empty($imgs)){
$x=1;
    foreach ($imgs as $row_img){?>

        <tr class="<?= $x ?>">
            <td> <?= $row_img->title ?> </td>
            <td><img id="img_view<?= $x ?>"
                     src="<?php echo base_url() . 'uploads/images/' . $row_img->file ?>"
                     width="150px" height="150px"/></td>

            <td>

                <a onclick="alert('هل انت متأكد من حذف ؟!!')"
                   href="<?php echo base_url() . 'finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/delete_attach/' . $row_img->id ?>">
                    <i class="fa fa-trash"></i></a>


                <!--              <a href="<?php /*echo  base_url().'finance_accounting/box/quods/Quods/deleteQuodImg/'.$row_img->id.'/'.$row_img->qued_rkm_fk*/ ?>"  onclick="DeleteRowImg('<? /*=$x*/ ?>')"> <i class="fa fa-trash" ></i> </a></td>-->
        </tr>

 <?php $x++ ;  }
}

?>