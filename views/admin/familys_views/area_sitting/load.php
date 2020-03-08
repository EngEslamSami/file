<?php      if($form_type == 1){?>
    <div class="form-group col-sm-12">

        <div class="col-sm-6">
            <label class="label label-green  half">إسم المنطقة</label>
            <input type="hidden" name="from_id" value="0" >
            <input type="text" name="title" class="form-control half input-style" placeholder="أدخل البيانات"  data-validation="required" >
        </div>
        <div class="col-sm-6">
            <label class="label label-green  half">إسم المحافظة</label>
            <input type="text" class="form-control half input-style" placeholder="أدخل البيانات" readonly="readonly">
        </div>

    </div>
    <div class="form-group col-sm-12">

        <div class="col-sm-6">
            <label class="label label-green  half">إسم المركز</label>
            <input type="text" class="form-control half input-style" placeholder="أدخل البيانات" readonly="readonly">
        </div>
        <div class="col-sm-6">
            <label class="label label-green  half">إسم الحي</label>
            <input type="text" class="form-control half input-style" placeholder="أدخل البيانات" readonly="readonly">
        </div>

    </div>
<?php }elseif($form_type == 2){?>
    <div class="form-group col-sm-12">
        <div class="col-sm-6">
            <label class="label label-green  half">إسم المنطقة</label>
            <select name="from_id" id="area"   class="choose-date selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                <option value="">إختر </option>
               <?php if(isset($area) && !empty($area) && $area!=null){
                   foreach ($area as $row_area){
                       echo '<option value="'.$row_area->id.'">'.$row_area->title.'</option>';
                   }   ?>
                <?php }else {
                   echo '<option value="">لا توجد مناصق مضافة </option>';
               }?>
            </select>
         </div>
        <div class="col-sm-6">
            <label class="label label-green  half">إسم المحافظة</label>
            <input type="text" name="title" class="form-control half input-style" placeholder="أدخل البيانات">
        </div>
    </div>
    <div class="form-group col-sm-12">
        <div class="col-sm-6">
            <label class="label label-green  half">إسم المركز</label>
            <input type="text" class="form-control half input-style" placeholder="أدخل البيانات" readonly="readonly">
        </div>
        <div class="col-sm-6">
            <label class="label label-green  half">إسم الحي</label>
            <input type="text" class="form-control half input-style" placeholder="أدخل البيانات" readonly="readonly">
        </div>
    </div>
<?php }elseif($form_type == 3){?>
    <div class="form-group col-sm-12">
        <div class="col-sm-6">
            <label class="label label-green  half">إسم المنطقة</label>
            <select id="area" onchange="plases('area','city');"  class="choose-date selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                <option value="">إختر </option>
                <?php if(isset($area) && !empty($area) && $area!=null){
                    foreach ($area as $row_area){
                        echo '<option value="'.$row_area->id.'">'.$row_area->title.'</option>';
                    }   ?>
                <?php }else {
                    echo '<option value="">لا توجد مناصق مضافة </option>';
                }?>
            </select>
        </div>
        <div class="col-sm-6">
            <label class="label label-green  half">إسم المحافظة</label>
            <select name="from_id"  id="city" class="choose-date selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                <option value="">إختر </option>
                <?php if(isset($city) && !empty($city) && $city!=null){
                    foreach ($city as $row_city){
                        echo '<option value="'.$row_city->id.'">'.$row_city->title.'</option>';
                    }   ?>
                <?php }else {
                    echo '<option value="">لا توجد محافظة مضافة </option>';
                }?>
            </select>
        </div>
    </div>
    <div class="form-group col-sm-12">
        <div class="col-sm-6">
            <label class="label label-green  half">إسم المركز</label>
            <input type="text" name="title" class="form-control half input-style"  data-validation="required" placeholder="أدخل البيانات" >
        </div>
        <div class="col-sm-6">
            <label class="label label-green  half">إسم الحي</label>
            <input type="text" class="form-control half input-style" placeholder="أدخل البيانات" readonly="readonly">
        </div>
    </div>
<?php }elseif($form_type == 4){?>
    <div class="form-group col-sm-12">
        <div class="col-sm-6">
            <label class="label label-green  half">إسم المنطقة</label>
            <select id="area" onchange="plases('area','city');"  class="choose-date selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                <option value="">إختر </option>
                <?php if(isset($area) && !empty($area) && $area!=null){
                    foreach ($area as $row_area){
                        echo '<option value="'.$row_area->id.'">'.$row_area->title.'</option>';
                    }   ?>
                <?php }else {
                    echo '<option value="">لا توجد مناصق مضافة </option>';
                }?>
            </select>
        </div>
        <div class="col-sm-6">
            <label class="label label-green  half">إسم المحافظة</label>
            <select id="city" onchange="plases('city','centers');"  class="choose-date selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                <option value="">إختر </option>
                <?php if(isset($city) && !empty($city) && $city!=null){
                    foreach ($city as $row_city){
                        echo '<option value="'.$row_city->id.'">'.$row_city->title.'</option>';
                    }   ?>
                <?php }else {
                    echo '<option value="">لا توجد محافظة مضافة </option>';
                }?>
            </select>
        </div>
    </div>
    <div class="form-group col-sm-12">
        <div class="col-sm-6">
            <label class="label label-green  half">إسم المركز</label>
            <select  name="from_id" id="centers" class="choose-date selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                <option value="">إختر </option>
                <?php if(isset($centers) && !empty($centers) && $centers!=null){
                    foreach ($centers as $row_centers){
                        echo '<option value="'.$row_centers->id.'">'.$row_centers->title.'</option>';
                    }   ?>
                <?php }else {
                    echo '<option value="">لا توجد محافظة مضافة </option>';
                }?>
            </select>
              </div>
        <div class="col-sm-6">
            <label class="label label-green  half">إسم الحي</label>
            <input type="text" name="title" class="form-control half input-style"  data-validation="required"  placeholder="أدخل البيانات" >
        </div>
    </div>
<?php }?>






