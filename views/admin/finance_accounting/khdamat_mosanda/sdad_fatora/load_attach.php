<?php if($imgs[0]->file=="") {
     //echo '<pre>'; print_r($imgs);

?>

    <tr>
 
    <input type="hidden" id="row" name="row" value="<?= $imgs[0]->id; ?>">
        <td><input type="input" name="title[]" id="title_rrr"  class="form-control  " value="" data-validation="reuqired"></td>
        <td><input type="file" name="file[]" id="file"  class="form-control " data-validation="reuqired"></td>
      <td>  <button type="button" class="btn btn-success save"  style="padding: 6px 12px;"
                            onclick="upload_img(<?= $imgs[0]->id; ?>)"
                             >حفظ
                    </button></td>
    </tr>


<?php } ?>
<?php if(!empty($imgs[0]->file) ){?>
<img id="img_view"
                     src="<?php echo base_url() . 'uploads/images/' . $imgs[0]->file ?>"
                   style="width:100%;"   />

                   <?php } ?>


                   