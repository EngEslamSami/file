






<tr id="<?php echo $_POST['id'];?>">
    <td>
        <input type="text"   onkeypress="return validate_number(event);" class="form-control " id="value<?php echo $_POST['id'];?>" step="any" name="value[]" data-validation="required" aria-required="true">
    </td>
    <td>
        <select class="form-control  "  id="from_bank_id_fk<?php echo $_POST['id'];?>"  name="from_bank_id_fk[]" data-validation="required" aria-required="true"
                onchange="Get_general_hesab_id_fk($(this).val(),'from_general_hesab_id_fk<?= $_POST['id'] ?>')"
        >

            <option value="">إختر</option>
            <?php if(!empty($all_banks)){
                foreach($all_banks as $bank){ ?>
                <option value="<?php echo$bank->bank_id_fk; ?>"
                ><?=$bank->title?></option>
            <?php } } ?></select>
    </td>

    <td>
        <select class="form-control "  id="from_general_hesab_id_fk<?php echo $_POST['id'];?>"  name="from_general_hesab_id_fk[]" data-validation="required" aria-required="true"> <option value="">إختر</option></select>
    </td>
    <td>
        <select class="form-control  "  id="to_bank_id_fk<?php echo $_POST['id'];?>"  name="to_bank_id_fk[]" data-validation="required" aria-required="true"
                onchange="Get_general_hesab_id_fk($(this).val(),'to_general_hesab_id_fk<?= $_POST['id'] ?>')"
        >

            <option value="">إختر</option>
            <?php if(!empty($all_banks)){  foreach($all_banks as $bank){ ?>
                <option value="<?php echo$bank->bank_id_fk; ?>"
                ><?=$bank->title?></option>
            <?php } } ?></select>
    </td>
    <td>
        <select class="form-control "  id="to_general_hesab_id_fk<?php echo $_POST['id'];?>"  name="to_general_hesab_id_fk[]" data-validation="required" aria-required="true"> <option value="">إختر</option></select>
    </td>
    <td id="TD<?php echo $_POST['id'];?>">
        <a href="#" onclick="addNewRow(); $(this).remove(); $('#deleteRow<?php echo $_POST['id'];?>').show();"><i class="fa fa-plus sspan"></i></a>
        <a class="" id="deleteRow<?php echo $_POST['id'];?>" href="#" onclick="addPlusButtonQuod(<?php echo $_POST['id'];?>); "> <i class="fa fa-trash" aria-hidden="true"></i>
        </a>
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
