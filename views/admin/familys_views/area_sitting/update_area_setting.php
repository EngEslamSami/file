<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?=$title?></h4>
        </div>
    </div>
    <div class="panel-body">
        <?php echo form_open('family_controllers/Setting/UpdateAreaSetting/'.$result["id"])?>
        <div class="form-group col-sm-12">
            <br>
            <div class="col-sm-6">
                <label class="label label-green  ">فئة الإضافة </label>
                <input tabindex="11" type="radio" id="square-radio-1" name="type"  <?php if($result["type"]==1){ echo "checked";}?>   data-validation="required"  value="1" onclick="get_form('1');">
                <label for="square-radio-1">منطقة </label>
                <input tabindex="11" type="radio" id="square-radio-1" name="type" <?php if($result["type"]==2){ echo "checked";}?>   data-validation="required" value="2" onclick="get_form('2');">
                <label for="square-radio-1">محافظة </label>
                <input tabindex="11" type="radio" id="square-radio-1" name="type" <?php if($result["type"]==3){ echo "checked";}?>   data-validation="required" value="3" onclick="get_form('3');">
                <label for="square-radio-1">مركز</label>
                <input tabindex="11" type="radio" id="square-radio-1" name="type"  <?php if($result["type"]==4){ echo "checked";}?>  data-validation="required" value="4" onclick="get_form('4');">
                <label for="square-radio-1">الحي</label>
            </div>
        </div>

        <div id="optiont">
            <?php      if($result["type"] == 1){?>
                <div class="form-group col-sm-12">

                    <div class="col-sm-6">
                        <label class="label label-green  half">إسم المنطقة</label>
                        <input type="hidden" name="from_id" value="0" >
                        <input type="text" name="title"   value="<?=$result["title"]?>"  class="form-control half input-style" placeholder="أدخل البيانات"  data-validation="required" >
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
            <?php }elseif($result["type"] == 2){?>
                <div class="form-group col-sm-12">
                    <div class="col-sm-6">
                        <label class="label label-green  half">إسم المنطقة</label>
                        <select name="from_id" id="area"   class="choose-date selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                            <option value="">إختر </option>
                            <?php if(isset($area) && !empty($area) && $area!=null){
                                foreach ($area as $row_area){
                                    $selected="";if($result["from_id"] ){  $selected="selected";}
                                    echo '<option value="'.$row_area->id.'"    '.$selected.' >'.$row_area->title.'</option>';
                                }   ?>
                            <?php }else {
                                echo '<option value="">لا توجد مناصق مضافة </option>';
                            }?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="label label-green  half">إسم المحافظة</label>
                        <input type="text" name="title"   value="<?=$result["title"]?>" class="form-control half input-style" placeholder="أدخل البيانات">
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
            <?php }elseif($result["type"] == 3){?>
                <div class="form-group col-sm-12">
                    <div class="col-sm-6">
                        <label class="label label-green  half">إسم المنطقة</label>
                        <select id="area" onchange="plases('area','city');"  class="choose-date selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                            <option value="">إختر </option>
                            <?php if(isset($area) && !empty($area) && $area!=null){
                                foreach ($area as $row_area){
                                    $selected="";if($result["main_from"] ){  $selected="selected";}
                                    echo '<option value="'.$row_area->id.'"  '.$selected.'>'.$row_area->title.'</option>';
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
                                    $selected="";if($result["from_id"] ){  $selected="selected";}
                                    echo '<option value="'.$row_city->id.'" '.$selected.'>'.$row_city->title.'</option>';
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
                        <input type="text" name="title"   value="<?=$result["title"]?>" class="form-control half input-style"  data-validation="required" placeholder="أدخل البيانات" >
                    </div>
                    <div class="col-sm-6">
                        <label class="label label-green  half">إسم الحي</label>
                        <input type="text" class="form-control half input-style" placeholder="أدخل البيانات" readonly="readonly">
                    </div>
                </div>
            <?php }elseif($result["type"] == 4){?>
                <div class="form-group col-sm-12">
                    <div class="col-sm-6">
                        <label class="label label-green  half">إسم المحافظة</label>
                        <select id="city" onchange="plases('city','centers');"  class="choose-date selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                            <option value="">إختر </option>
                            <?php if(isset($city) && !empty($city) && $city!=null){
                                foreach ($city as $row_city){
                                    $selected="";if($result["main_from"] ){  $selected="selected";}
                                    echo '<option value="'.$row_city->id.'" '.$selected.'>'.$row_city->title.'</option>';
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
                                    $selected="";if($result["from_id"] ){  $selected="selected";}
                                    echo '<option value="'.$row_centers->id.'" '.$selected.'>'.$row_centers->title.'</option>';
                                }   ?>
                            <?php }else {
                                echo '<option value="">لا توجد محافظة مضافة </option>';
                            }?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="label label-green  half">إسم الحي</label>
                        <input type="text" name="title"   value="<?=$result["title"]?>" class="form-control half input-style"  data-validation="required"  placeholder="أدخل البيانات" >
                    </div>
                </div>
            <?php }?>

        </div>
        <div class="col-md-12">
            <button type="submit" name="UPDATE" class="btn btn-blue btn-next" value="UPDATE">حفظ </button>
        </div>

        <?php echo form_close()?>
        
    </div>
</div>


<script>
    function get_form(type) {

        if(type >0 && type  != '') {
            var dataString = 'form_tupe=' + type ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Setting/AreaSetting',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optiont").html(html);
                }
            });
            return false;
        }
    }
</script>

<!--------------------------------------->
<script>
    function plases(id_main,is_sub) {
        var value_id=$("#"+id_main).val();
        if(value_id) {
            var dataString = 'value_id=' + value_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Setting/AreaSetting',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#'+is_sub).html(html);
                }
            });
            return false;
        }
    }
</script>