<?php if(isset($records) && $records!=null && !empty($records)){?>
    <div class="form-group col-sm-6">
        <label class="label label-green  half">المعاملة الفرعية</label>
        <select name="organization_sub_from_id_fk" class=" selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true" >
            <option value=""> - اختر - </option>

            <?php foreach ($records as $record): ?>
                <option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>

<?php } ?>

<script>
    $('.selectpicker').selectpicker('refresh');
</script>

