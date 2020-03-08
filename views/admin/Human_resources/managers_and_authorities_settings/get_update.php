<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function () {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>
<?php echo form_open_multipart('human_resources/Managers_and_authorities_settings/Update_departments_managers'); ?>
<table class="table table-striped table-bordered">
    <thead>
    <tr class="info">
        <th>الإدارة</th>
        <th>المدير المباشر</th>
        <th>الإجراء</th>
    </tr>
    </thead>
    <tr>
        <td>
            <select class="form-control   " name="depart_id_fk" data-validation="required" aria-required="true">
                <option value="">إختر</option>
                <?php foreach ($mainDepartments as $value) {

                    $select = '';
                    if ($result['depart_id_fk'] == $value->id) {

                        $select = 'selected';
                    }
                    ?>
                    <option value="<?php echo $value->id; ?>" <?php echo $select; ?>><?php echo $value->name; ?> </option>
                <?php } ?>
            </select></td>
        <td>
            <select class="form-control   " name="emp_id_fk" data-validation="required"
                    onchange="$('#emp_type').val($('option:selected', this).data('type'))"
                    aria-required="true">
                <option value="">إختر</option>
                <?php if (isset($magles_edara) && (!empty($magles_edara))) {
                    if (sizeof($magles_edara) == 1) {
                        ?>

                        <option value="<?php echo $magles_edara->mem_id_fk; ?>" data-type="1"
                            <?php
                            $select = '';
                            if ($result['emp_id_fk'] == $magles_edara->mem_id_fk && ($result['emp_type'] == 1)) {
                                echo 'selected';
                            }
                            ?>
                        >
                            <?php echo '"' . $magles_edara->mem_name . '"' ?>
                        </option>
                    <?php } else {
                        foreach ($magles_edara as $mem_data) {
                            $select = '';
                            if ($result['emp_id_fk'] == $mem_data->mem_id_fk && ($result['emp_type'] == 1)) {
                                $select = 'selected';
                            }
                            ?>
                            <option value="<?php echo $mem_data->mem_id_fk; ?>" data-type="1" <?php echo $select; ?>>
                                <?php echo '"' . $mem_data->mem_name . '"' ?>
                            </option>
                            <?php
                        }
                    }
                } ?>



                <?php foreach ($employees as $value) {

                    $select = '';
                    if ($result['emp_id_fk'] == $value->id && ($result['emp_type'] == 0)) {

                        $select = 'selected';
                    }
                    ?>
                    <option value="<?php echo $value->id; ?>" <?php echo $select; ?>
                            data-type="0"><?php echo $value->employee; ?> </option>
                <?php } ?>
            </select>
            <input type="hidden" name="emp_type" id="emp_type" value="0">

        </td>
        <td><input type="file" name="sign_img" id="sign_img"></td>
    </tr>
    </tbody></table>


<div class="col-sm-12">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <input type="hidden" name="id_update" value="<?php echo $result['id']; ?>">
        <input type="submit" name="update" id="" class="btn btn-blue btn-close" value="حفظ"/>
    </div>
    <div class="col-sm-4"></div>
</div>
<?php echo form_close() ?>


<script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
</script>
