<tr id="<?php echo$_POST['length'];?>">
    <td style="width: 100px;"> <input type="text" name="mehwar_rkm[]" data-validation="required"  class="form-control text-center" value="<?php echo$_POST['length'];?>"></td>
    <td><textarea name="mehwar_title[]" data-validation="required" class="form-control"  cols="30" rows="2" style="width: 100%"></textarea></td>
    <td><a class=""  id="deleteRow" href="#" onclick="$('#<?=$_POST['length']?>').remove(); "><i class="fa fa-trash" aria-hidden="true"></i>

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