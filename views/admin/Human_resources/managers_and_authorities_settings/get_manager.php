<tr>
    <td>
        <select class="form-control   selectchange " data-validation="required" aria-required="true"
                onchange="get_new_option($(this).val());"
                name="depart_id_fk[]">
            <option value="">إختر</option>
            <?php
            if (!empty($mainDepartments)) {
                foreach ($mainDepartments as $value) {

                    if ($value->sub > 0) {
                        continue;
                    }
                    ?>
                    <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?> </option>
                <?php }
            } ?>
        </select>


    </td>
    <td>
        <select class="form-control selectpicker " id="select<?= $_POST['lenth'] ?>"
                onchange="set_type($('#select<?= $_POST["lenth"] ?>'))" data-show-subtext="true"
                data-live-search="true" name="emp_id_fk[]"
                data-validation="required" aria-required="true">
            <option value="">إختر</option>
            <?php if (isset($magles_edara) && (!empty($magles_edara))) {
                if (sizeof($magles_edara) == 1) {
                    ?>

                    <option value="<?php echo $magles_edara->mem_id_fk; ?>" data-type="1">
                        <?php echo '"' . $magles_edara->mem_name . '"' ?>
                    </option>

                <?php } else {
                    foreach ($magles_edara as $mem_data) {
                        ?>
                        <option value="<?php echo $mem_data->mem_id_fk; ?>" data-type="1">
                            <?php echo '"' . $mem_data->mem_name . '"' ?>
                        </option>
                        <?php
                    }
                }
            } ?>
            <?php
            if (!empty($employees)) {
                foreach ($employees as $value) {
                    ?>
                    <option value="<?php echo $value->id; ?>" data-type="0">
                        <?php echo $value->employee; ?> </option>
                <?php }
            } ?>
        </select>
        <input type="hidden" name="emp_type[]" id="emp_type<?= $_POST['lenth'] ?>" value="0">
    </td>
    <td><input type="file" name="sign_img[]" id="sign_img[]"></td>
</tr>


<script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
</script>

<script>
    function set_type(elem) {
        console.log('elem.data' + $('option:selected', elem).data('type'));
        $('#emp_type<?=$_POST["lenth"]?>').val($('option:selected', elem).data('type'))
        //$('#emp_type<?//=$_POST["lenth"]?>//').val(0)
        // $("#select option:first").attr('selected','selected');
    }
</script>
