<tr id="<?php echo$_POST['length'];?>">
    <td style="width: 100px;"> <input type="text" name="mehwar_rkm[]" data-validation="required"  class="form-control text-center" value="<?php echo$_POST['length'];?>"></td>
    <td>
        <input type="text" name="mehwar_title[]" data-validation="required"  class="form-control text-center" >
        </td>
    <td>
        <a href="#" onclick="add_row();$(this).remove();"><i class="fa fa-plus sspan"></i></a>
        <a class=""  id="deleteRow" href="#" onclick="$('#<?=$_POST['length']?>').remove(); ">
            <i class="fa fa-trash" aria-hidden="true"></i>

    </td>
</tr>

<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>