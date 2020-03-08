<?php if(isset($records) && $records!=null && !empty($records)){?>
    <div class="col-xs-6">
        <h4 class="r-h4"> المعامة الفرعية   </h4>
    </div>
    <div class="col-xs-6 r-input" >
        <select name="organization_sub_to_id_fk" id="" class="selectpicker form-control" data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true" >
            <option value=""> - اختر - </option>

            <?php foreach ($records as $record): ?>
                <option value="<?php echo $record->id ?>"><?php echo $record->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>

<?php } ?>
