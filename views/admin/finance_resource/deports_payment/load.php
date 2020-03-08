<?php echo  form_open_multipart('Finance_resource/DeportPayment') ?>
<div class="col-md-4">
    <div class="form-group">
        <label class="control-label">القيمة  </label>
        <input type="text"  name="value" value="<?php echo $value?>"class="form-control text-right" placeholder="القيمة" readonly="" />
        <input type="hidden" name="paid_type" value="<?php echo $method_type?>"  />
        <?php foreach ( $ids as $key=>$values) { ?>
        <input type="hidden" name="select-id[]" value="<?php echo $values?>"  />
     <?php }?>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label class="control-label">الحساب الدائن  </label>
        <select name="dayen" class="form-control selectpicker " data-show-subtext="true" data-live-search="true" >
            <option data-subtext="" value="nothing"> قم باختيار الحساب </option>
            <?php foreach($all  as $record=>$value):?>
                <?php $array_levels=array('','-','--','---','----','----','-----','------'); ?>
                <option data-subtext="" value="<?php echo $all[$record]->code?>">
                    <?php echo $array_levels[ $all[$record]->level].$all[$record]->name ?></option>
            <?php endforeach;?>
        </select>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label class="control-label">الحساب المدين </label>
        <select name="madeen"    class="form-control selectpicker " data-show-subtext="true" data-live-search="true" >
            <option data-subtext="" value="nothing"> قم باختيار الحساب </option>
            <?php foreach($all  as $record=>$value):?>
                <?php $array_levels=array('','-','--','---','----','----','-----','------'); ?>
                <option data-subtext="" value="<?php echo $all[$record]->code?>">
                    <?php echo $array_levels[ $all[$record]->level].$all[$record]->name ?></option>
            <?php endforeach;?>
        </select>
    </div>
</div>

<div class="col-md-11">
    <!-- <input type="hidden" name="DEPORT" value="DEPORT" /> -->
    <button type="submit"  name="DEPORT" value="DEPORT"  style="width:10% !important;" class="btn-primary"> ترحيل  </button>
</div>



<?php echo form_close();?>

<script type="text/javascript">
    $('.selectpicker').selectpicker({
    });
</script>