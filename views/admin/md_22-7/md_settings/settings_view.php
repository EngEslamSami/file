

<style>
    .panel-body {
        padding: 15px;
    }
    .tab-content .panel-body {
        background: #fff;
        border: 1px solid gray;
        border-radius: 2px;
        padding: 20px;
        position: relative;
    }
    .tabs-left>li.active>a, .tabs-left>li.active>a:hover, .tabs-left>li.active>a:focus {
        border-bottom-color: #009688;
        border-right-color: #009688;
        background-color: #009688;
        color: #fff;
    }
    .nav>li>a:hover, .nav>li>a:focus {
        text-decoration: none;
        background-color: #eee;
        color: #0f0f0f;
    }
    .tabs-left>li.active>a, .tabs-left>li.active>a:hover, .tabs-left>li.active>a:focus {
        border-bottom-color: #009688;
        border-right-color: #009688;
        background-color: #009688;
        color: #fff;
    }
    ul.nav-tabs.holiday-month {
        border: 1px solid gray;
        height: 400px;
        overflow: scroll;
    }
    .nav-tabs>li>a:hover {
        border-color: #eee #eee #ddd;
    }
    ul.nav-tabs.holiday-month>li>a {
        color: #222;
        font-weight: 600;
        padding: 5px 5px;
        font-size: 13px;
    }
</style>

<!--<link rel="stylesheet" href="--><?php //echo base_url()?><!--asisst/admin_asset/css/stylecrm.css" />-->

<!-- Main content -->

<section>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                <div class="panel-heading">
                    <div class="btn-group" id="buttonexport">
                        <a href="#">
                            <h4>التعريفات</h4>

                        </a>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="col-sm-4">
                        <ul class="nav nav-tabs tabs-left holiday-month" style="    border: 1px solid gray;">
                            <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray !=null){
                                $x = 0;
                                foreach ($this->myarray as $key=>$value){

                                    ?>

                                    <?php if(isset($typee) && !empty($typee) && $typee) {
                                        $active ="";
                                        if($typee == $key ){
                                            $active = 'active';
                                            $value = $value;
                                        }
                                    }?>
                                    <li class="<?php  if(isset($typee) && !empty($typee) && $typee)
                                    {echo $active; }else {echo ($x == 0)? 'active':''; } ?>"
                                        style="float: right; width: 50%;">
                                        <a  <?php if(isset($disabled)){}else{echo 'href="#tab'.$key.'"';} ?>
                                            data-toggle="tab"  > <i class="fa fa-cog" aria-hidden="true"></i>  <?=$value['title']?>
                                        </a></li>



                                    <?php $x++; } } ?>



                            <li  role="presentation"style="float: right; width: 50%;">
                                <a <?php if(isset($disabled)){}else{echo 'href="#tab_areas"';} ?> aria-controls="tab_areas" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>المدن</a>
                            </li>
                            <li  role="presentation" style="float: right; width: 50%;">
                                <a <?php if(isset($disabled)){}else{echo 'href="#tab_residential"';} ?>  aria-controls="tab_residential" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>الأحياء</a>
                            </li>




                        </ul>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content col-sm-8">
                        <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray !=null){
                            $x = 0;
                            foreach ($this->myarray as $key=>$value){?>
                                <?php if(isset($typee) && !empty($typee) && $typee) {
                                    $active ="";
                                    if($typee == $key ){
                                        $active = 'active';
                                        $value = $value;
                                    }
                                }?>
                                <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee))
                                {echo $active; }else {echo ($x == 0)? 'active':''; }  ?>" id="tab<?= $key ?>">
                                    <div class="panel-body">



                                        <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday"
                                           style="margin-bottom: 6px;"> <strong><i class="fa fa-cog"
                                                                                   aria-hidden="true"></i> <?=$value['title']?></strong></a>

                                        <div class="table-responsive">



                                            <?php
                                            if(isset($record) && !empty($record) && $record!=null){
                                                echo form_open_multipart('md/md_settings/Settings/UpdateSitting/'.$id.'/'. $key);
                                            }
                                            else{
                                                echo form_open_multipart('md/md_settings/Settings/AddSitting/'. $key);
                                            }
                                            ?>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group col-sm-8 col-xs-12">
                                                    <label class="label label-green half"> الإسم</label>
                                                    <input type="text" name="title_setting"
                                                           value="<?php if(isset($record)) echo $record['title_setting'] ?>"
                                                           class="form-control half input-style" autofocus data-validation="required">

                                                    <input type="hidden" name="type_name" value=""/>
                                                </div>

                                            </div>
                                            <div class="form-group col-sm-12 col-xs-12">
                                                <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
<i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                            </div>
                                            </form>
                                            <?php if (isset($all) && !empty($all) && $all !=null){ ?>
                                                <table class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                    <tr class="info">
                                                        <th>م</th>
                                                        <th>الإسم</th>
                                                        <th>الإجراء</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $x = 1;
                                                    if (isset($all[$key]) && !empty($all[$key]) && $all[$key] !=null){
                                                        foreach ($all[$key] as $value) {
                                                            ?>
                                                            <tr>
                                                                <td><?=($x++)?></td>

                                                                <td><?=$value->title_setting?></td>
                                                                <td>
                                                                  <!--  <a href="<?php echo base_url().'md/md_settings/Settings/UpdateSitting/'.$value->id_setting."/".$key  ?>" title="تعديل">
                                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                                    <span> </span>
                                                                    <a href="<?=base_url()."md/md_settings/Settings/DeleteSitting/".$value->id_setting."/".$key?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i></a> -->

                                                                    <a onclick='swal({
                                                                        title: "هل انت متأكد من التعديل ؟",
                                                                        text: "",
                                                                        type: "warning",
                                                                        showCancelButton: true,
                                                                        confirmButtonClass: "btn-warning",
                                                                        confirmButtonText: "تعديل",
                                                                        cancelButtonText: "إلغاء",
                                                                        closeOnConfirm: false
                                                                        },
                                                                        function(){
                                                                        window.location="<?php echo base_url().'md/md_settings/Settings/UpdateSitting/'.$value->id_setting."/".$key  ?>";
                                                                        });'>
                                                                        <i class="fa fa-pencil"> </i></a>
                                                                    <a onclick=' swal({
                                                                        title: "هل انت متأكد من الحذف ؟",
                                                                        text: "",
                                                                        type: "warning",
                                                                        showCancelButton: true,
                                                                        confirmButtonClass: "btn-danger",
                                                                        confirmButtonText: "حذف",
                                                                        cancelButtonText: "إلغاء",
                                                                        closeOnConfirm: false
                                                                        },
                                                                        function(){
                                                                        swal("تم الحذف!", "", "success");
                                                                        setTimeout(function(){window.location="<?=base_url()."md/md_settings/Settings/DeleteSitting/".$value->id_setting."/".$key?>";}, 500);
                                                                        });'>
                                                                        <i class="fa fa-trash"> </i></a>

                                                                </td>
                                                            </tr>
                                                        <?php } }else{
                                                        echo '<tr>
                                                    <td colspan="3"> لايوجد بيانات </td>
                                                    </tr>';
                                                    } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>

                                <?php  $x++; } } ?>




                        <!----------------------------------------------------------------------->

                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_areas") {echo  'active'; }  ?>" id="tab_areas">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>المدن</strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($area) && !empty($area) && $area!=null){
                                        echo form_open_multipart('md/md_settings/Settings/UpdateSittingAreas/'.$area['id'].'/tab_areas');
                                    }
                                    else{
                                        echo form_open_multipart('md/md_settings/Settings/AddSittingAreas/'.'tab_areas/'. 0);
                                    }
                                    ?>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half"> الاسم </label>
                                        <input type="text" name="name" value="<?php if(isset($area)) echo $area['name'] ?>" class="form-control half input-style" autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half"> الترتيب</label>
                                        <input type="text" name="in_order"
                                               value="<?php if(isset($area)) echo $area['in_order'] ?>" onkeypress="validate_number(event);"
                                               class="form-control half input-style" autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <button type="submit" name="add_area" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($areas) && !empty($areas) && $areas !=null){ ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                                <th>الإسم</th>
                                                <th>الترتيب</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($areas as $key=>$value) {
                                                ?>
                                                <tr>
                                                    <td><?=($x++)?></td>
                                                    <td><?=$value->name?></td>
                                                    <td><?=$value->in_order?></td>
                                                    <td>
                                                      <!--  <a href="<?php echo base_url().'md/md_settings/Settings/UpdateSittingAreas/'.$key.'/tab_areas' ?>" title="تعديل">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <span> </span>
                                                        <a href="<?=base_url()."md/md_settings/Settings/DeleteSittingAreas/tab_areas/".$key?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a> -->
                                                        <a onclick='swal({
                                                            title: "هل انت متأكد من التعديل ؟",
                                                            text: "",
                                                            type: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonClass: "btn-warning",
                                                            confirmButtonText: "تعديل",
                                                            cancelButtonText: "إلغاء",
                                                            closeOnConfirm: false
                                                            },
                                                            function(){
                                                            window.location="<?php echo base_url().'md/md_settings/Settings/UpdateSittingAreas/'.$key.'/tab_areas' ?>";
                                                            });'>
                                                            <i class="fa fa-pencil"> </i></a>
                                                        <a onclick=' swal({
                                                            title: "هل انت متأكد من الحذف ؟",
                                                            text: "",
                                                            type: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonClass: "btn-danger",
                                                            confirmButtonText: "حذف",
                                                            cancelButtonText: "إلغاء",
                                                            closeOnConfirm: false
                                                            },
                                                            function(){
                                                            swal("تم الحذف!", "", "success");
                                                            setTimeout(function(){window.location="<?=base_url()."md/md_settings/Settings/DeleteSittingAreas/tab_areas/".$key?>";}, 500);
                                                            });'>
                                                            <i class="fa fa-trash"> </i></a>

                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_residential") {echo  'active'; }  ?>" id="tab_residential">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>الأحياء </strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($area) && !empty($area) && $area!=null){
                                        echo form_open_multipart('md/md_settings/Settings/UpdateSittingAreas/'.$area['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('md/md_settings/Settings/AddSittingAreas/'.'tab_residential/'. 0);
                                    }
                                    ?>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">المدينة</label>
                                        <select  name="from_id_fk" id="from_id_fk"   class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" >
                                            <option value="">إختر المدينة </option>
                                            <?php foreach ($areas as $key=>$stage){
                                                $select=''; if(!empty($area)){ if($area['from_id_fk'] == $key){$select='selected';} }
                                                ?>
                                                <option value="<?php echo $key; ?>"<?= $select?> <?php ?>><?php echo $stage ;?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">الحي</label>
                                        <input type="text" name="name" value="<?php if(isset($area)) echo $area['name'] ?>" class="form-control half input-style" autofocus data-validation="required">
                                    </div>
<!--                                    25-4-om  -->
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half"> الترتيب</label>
                                        <input type="text" name="in_order"
                                               value="<?php if(isset($area)) echo $area['in_order'] ?>" onkeypress="validate_number(event);"
                                               class="form-control half input-style" autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <button type="submit" name="add_area" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($residentials) && !empty($residentials) && $residentials !=null){ ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                                <th > الترتيب </th>
                                                <th>الإسم</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($residentials as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>
                                                    <td><?php echo $value->in_order; ?></td>
                                                    <td><?=$value->name?></td>
                                                    <td>
                                                        <!--<a href="<?php echo base_url().'md/md_settings/Settings/UpdateSittingAreas/'.$value->id."/tab_residential"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."md/md_settings/Settings/DeleteSittingAreas/tab_residential/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a> -->

                                                        <a onclick='swal({
                                                            title: "هل انت متأكد من التعديل ؟",
                                                            text: "",
                                                            type: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonClass: "btn-warning",
                                                            confirmButtonText: "تعديل",
                                                            cancelButtonText: "إلغاء",
                                                            closeOnConfirm: false
                                                            },
                                                            function(){
                                                            window.location="<?php echo base_url().'md/md_settings/Settings/UpdateSittingAreas/'.$value->id."/tab_residential"  ?>";
                                                            });'>
                                                            <i class="fa fa-pencil"> </i></a>
                                                        <a onclick=' swal({
                                                            title: "هل انت متأكد من الحذف ؟",
                                                            text: "",
                                                            type: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonClass: "btn-danger",
                                                            confirmButtonText: "حذف",
                                                            cancelButtonText: "إلغاء",
                                                            closeOnConfirm: false
                                                            },
                                                            function(){
                                                            swal("تم الحذف!", "", "success");
                                                            setTimeout(function(){window.location="<?=base_url()."md/md_settings/Settings/DeleteSittingAreas/tab_residential/".$value->id?>";}, 500);
                                                            });'>
                                                            <i class="fa fa-trash"> </i></a>

                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>



                        <!------------------------------------------------------------------------>



                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->



<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>

