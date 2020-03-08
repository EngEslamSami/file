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
    height: 590px;
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
                            <h4><?php echo $title; ?></h4>
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
                                    <li class="<?php  if(isset($typee) && !empty($typee) && $typee) {echo $active; }
                                    else {echo ($x == 0)? 'active':''; } ?>" style="float: right; width: 50%;">
                                    <a  <?php if(isset($record)){}else{echo 'href="#tab'.$key.'"';} ?> data-toggle="tab"  >
                                    <i class="fa fa-cog" aria-hidden="true"></i> 
                                     <?=$value?></a></li>
                                    <?php $x++; } } ?>
<!----------------------------->                                    
<li  role="presentation" style="float: right; width: 50%;">
<a  href="#tab_levels" aria-controls="tab_levels" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>المراحل التعليمية </a>
</li>
<li  role="presentation" style="float: right; width: 50%;">
<a  href="#tab_classes" aria-controls="tab_classes" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>الصفوف الدراسية </a>
</li>                                   
<!----------------------------->                                    
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
                                <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)) {echo $active; }else {echo ($x == 0)? 'active':''; }  ?>" id="tab<?= $key ?>">
                                    <div class="panel-body">
                                        <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        <?=$value?>
                                            </strong></a>
                                        <div class="table-responsive">
                                            <?php
                                            if(isset($record) && !empty($record) && $record!=null){
                                                echo form_open_multipart('family_controllers/Setting/UpdateSitting/'.$id.'/'. $key);
                                            }
                                            else{
                                                echo form_open_multipart('family_controllers/Setting/AddSitting/'. $key.'/'.$key);
                                            }
                                            ?>
            <div class="form-group col-sm-9 col-xs-12">
                <label class="label label-green half"> الإسم</label>
                <input type="text" name="title_setting" value="<?php if(isset($record)) echo $record['title_setting'] ?>" class="form-control half input-style" autofocus data-validation="required">
                <input type="hidden" name="type_name" value=""/>
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
                                                                <a href="<?php echo base_url().'family_controllers/Setting/UpdateSitting/'.$value->id_setting."/".$key  ?>" title="تعديل">
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                                <span> </span>
                                                                <a href="<?=base_url()."family_controllers/Setting/DeleteSitting/".$value->id_setting."/".$key?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } 
                                                    }else{
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
 <!----------------------------------------------->                               
                         <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_levels") {echo  'active'; }  ?>" id="tab_levels">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday"
                                 style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>المراحل التعليمية</strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($level) && !empty($level) && $level!=null){
                                        echo form_open_multipart('family_controllers/Setting/UpdateSittingD/'.$level['id'].'/tab_levels');
                                    }
                                    else{
                                        echo form_open_multipart('family_controllers/Setting/AddSitting/'.'tab_levels/'. 0);
                                    }
                                    ?>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half"> الاسم </label>
                                        <input type="text" name="name" value="<?php if(isset($level)) echo $level['name'] ?>" class="form-control half input-style" autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <button type="submit" name="add_level" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                </div>
                                    </form>
                                    <?php if (isset($levels) && !empty($levels) && $levels !=null){ ?>
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
                                            foreach ($levels as $key=>$value) {
                                                ?>
                                                <tr>
                                                    <td><?=($x++)?></td>
                                                    <td><?=$value?></td>
                                                    <td>
                                                        <a href="<?php echo base_url().'family_controllers/Setting/UpdateSittingD/'.$key.'/tab_levels' ?>" title="تعديل">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <span> </span>
                                                        <a href="<?=base_url()."family_controllers/Setting/DeleteSittingLevels/tab_levels/".$key?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_classes") {echo  'active'; }  ?>" id="tab_classes">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>الصفوف الدراسية </strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($level) && !empty($level) && $level!=null){
                                        echo form_open_multipart('family_controllers/Setting/UpdateSittingD/'.$level['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('family_controllers/Setting/AddSittingLevels/'. 0);
                                    }
                                    ?>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half"> المرحلة التعليمية</label>
                                        <select  name="from_id_fk" id="from_id_fk"   class="form-control half selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" >
                                            <option value="">إختر المرحلة </option>
                                            <?php foreach ($levels as $key=>$stage){
                                                $select=''; if(!empty($level)){ if($level['from_id_fk'] == $key){$select='selected';} }
                                                ?>
                                                <option value="<?php echo $key; ?>"<?= $select?> <?php ?>><?php echo $stage ;?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half"> الصف الدراسي</label>
                                        <input type="text" name="name" value="<?php if(isset($level)) echo $level['name'] ?>" class="form-control half input-style" autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <button type="submit" name="add_level" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($classes) && !empty($classes) && $classes !=null){ ?>
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
                                            foreach ($classes as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>
                                                    <td><?=$value->name?></td>
                                                    <td>  <a href="<?php echo base_url().'family_controllers/Setting/UpdateSittingD/'.$value->id."/tab_classes"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."family_controllers/Setting/DeleteSittingLevels/tab_classes/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>                               
<!-------------------------------------------------->                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->