<?php if (isset($marakz_taklefa) && (!empty($marakz_taklefa))) {
    if (sizeof($marakz_taklefa) == 1) {
        $row=$marakz_taklefa[0];
        ?>
        <input type="text" class="form-control" step="any" name="markz_name[]"
                value="<?= $row->name ?>" readonly>
        <input type="hidden" name="markz_id[]" value="<?= $row->id ?>" >
        <?php
    } elseif (sizeof($marakz_taklefa) > 1) { ?>
        <select class="form-control" data-validation="required" step="any" onchange="($('#markz_name<?=$counter?>').val($('option:selected',this).text()))"
                name="markz_id[]">
            <option> اختر </option>
            <?php foreach ($marakz_taklefa as $row) { ?>
                <option value="<?= $row->id ?>"><?= $row->name ?></option>
            <?php } ?>


        </select>
        <input type="hidden" id="markz_name<?=$counter?>" name="markz_name[]" value="" >

        <?php
    }
}else{ ?>

    <input type="text" class="form-control" step="any" name="markz_name[]"
           value="" readonly>
    <input type="hidden" name="markz_id[]" value="" >
<?php } ?>