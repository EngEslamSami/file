<?php if($according_to == 1){?>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">فئة الأسرة </label>
        <select  name="family_type_according_to" class="form-control half class_according_to"  aria-required="true" tabindex="-1" aria-hidden="true">
            <option value="">إختر</option>
            <?php $x=1; foreach ($family_types as $key=>$value){  ?>
                <option value="<?=$value->id_setting?>" ><?=$value->title_setting?></option>
            <?php } ?>
        </select>
    </div>
<?php }elseif($according_to == 2){?>
    <div class="form-group col-sm-4">
        <label class="label label-green  half"> الحالة الدراسية</label>
        <select  name="education_according_to" class="form-control half class_according_to"  aria-required="true" tabindex="-1" aria-hidden="true">
            <option value="">إختر</option>
            <option value="0">(  دون سن الدراسة )</option>
            <option value="unlettered">(  امى )</option>
            <option value="graduate">(  متخرج )</option>
            <?php $x=1; foreach ($education_types as $key=>$value){  ?>
                <option value="<?=$value->id_setting?>" ><?=$value->title_setting?></option>
            <?php } ?>
        </select>
    </div>
<?php }elseif($according_to == 3){ ?>
    <div class="form-group col-sm-4">
        <label class="label label-green  half"> من عمر   </label>
        <input type="number"   id="from_age_according_to"  name="from_age_according_to"  class="form-control half input-style class_according_to" placeholder="ادخل البيانات " >

    </div>
    <div class="form-group col-sm-4">
        <label class="label label-green  half">الى عمر   </label>
        <input type="number"  id="to_age_according_to" name="to_age_according_to"  class="form-control half input-style class_according_to" placeholder="ادخل البيانات " >
      
    </div>
<?php }?>
