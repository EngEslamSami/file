

    <style>
    .panel-body {
        padding: 15px;
    }
    .tab-content .panel-body {
        background: #fff;
        border: 1px solid gray;
        border-radius: 2px;
        padding: 5px;
        position: relative;
    }
    .tabs-left>li.active>a, .tabs-left>li.active>a:hover, .tabs-left>li.active>a:focus {
        border-bottom-color: #09704e;
        border-right-color: #09704e;
        background-color: #09704e;
        color: #fff !important;
    }
    .nav>li>a:hover, .nav>li>a:focus {
        text-decoration: none;
        background-color: #eee;
        color: #0f0f0f;
    }
    .tabs-left>li.active>a, .tabs-left>li.active>a:hover, .tabs-left>li.active>a:focus {
        border-bottom-color: #09704e;
        border-right-color: #09704e;
        background-color: #09704e;
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
   .no-dt-buttons div.dt-buttons{
        display: none !important;
    }
     .no-dt-buttons .dataTables_filter {
        width: 100% !important;
        
        }
      .no-dt-buttons   .dataTables_paginate {
    
        width: 60%;
        
        }
        .no-dt-buttons  .dataTables_wrapper .dataTables_info{
           width: 40%; 
        }
</style>

<!--<link rel="stylesheet" href="--><?php //echo base_url()?><!--asisst/admin_asset/css/stylecrm.css" />-->

<!-- Main content -->


        <div class="col-sm-12 no-padding">
            
  <div class="col-sm-4 padding-4">
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

        <!------------Osama 8-9 ----------------->
        <li  role="presentation"style="float: right; width: 50%;">
            <a <?php if(isset($disabled)){}else{echo 'href="#tab_areas"';} ?> aria-controls="tab_areas" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>المدن</a>
        </li>
        <li  role="presentation" style="float: right; width: 50%;">
            <a <?php if(isset($disabled)){}else{echo 'href="#tab_residential"';} ?>  aria-controls="tab_residential" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>الأحياء</a>
        </li>

        <li  role="presentation" style="float: right; width: 50%;">
            <a <?php if(isset($disabled)){}else{echo 'href="#tab_allowances"';} ?>  aria-controls="tab_allowances" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>الإستحقاقات</a>
        </li>
        <li  role="presentation" style="float: right; width: 50%;">
            <a <?php if( isset($disabled)){}else{echo 'href="#tab_deduction"';} ?>  aria-controls="tab_residential" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>الإستقطاعات</a>
        </li>
        <li  role="presentation" style="float: right; width: 50%;">
            <a <?php if( isset($disabled)){}else{echo 'href="#tab_jobRole"';} ?>  aria-controls="tab_jobRole" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>المسميات الوظيفية</a>
        </li>

        <li  role="presentation" style="float: right; width: 50%;">
            <a <?php if( isset($disabled)){}else{echo 'href="#tab_main_department"';} ?>  aria-controls="tab_main_department" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>الإدارات</a>
        </li>
        <li  role="presentation" style="float: right; width: 50%;">
            <a <?php if( isset($disabled)){}else{echo 'href="#tab_sub_department"';} ?>  aria-controls="tab_sub_department" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>الأقسام</a>
        </li>

        <li  role="presentation" style="float: right; width: 50%;">
            <a <?php if( isset($disabled)){}else{echo 'href="#tab_categories"';} ?>  aria-controls="tab_categories" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>إعدادات فئات الإدارة</a>
        </li>



        <!-------------Osama 8-9---------------->
    </ul>
</div>
                    <!-- Tab panels -->
                    <div class="tab-content col-sm-8 padding-4">
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
    echo form_open_multipart('human_resources/Employee_settings/UpdateSitting/'.$id.'/'. $key);
}
else{
    echo form_open_multipart('human_resources/Employee_settings/AddSitting/'. $key);
}
?>
        <div class="col-sm-12 col-xs-12 no-padding">
            <div class="form-group col-sm-8 col-xs-12">
                <label class="label "> الإسم</label>
                <input type="text" name="title_setting"
                       value="<?php if(isset($record)) echo $record['title_setting'] ?>"
                       class="form-control " autofocus data-validation="required">

                <input type="hidden" name="type_name" value=""/>
            </div>
            <div class="form-group col-sm-4 col-xs-12">
                <label class="label "> الترتيب</label>
                <input type="text" name="in_order"
                       value="<?php if(isset($record)) echo $record['in_order'] ?>" onkeypress="validate_number(event);"
                       class="form-control " autofocus data-validation="required">
            </div>
        </div>
 <div class="form-group col-sm-12 col-xs-12 text-center">
    <button type="submit" name="add" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
<i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
</div>
</form>
<?php if (isset($all) && !empty($all) && $all !=null){ ?>
<div class="no-dt-buttons">
<table class="table table-bordered table-striped table-hover example">
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
   if (isset($all[$key]) && !empty($all[$key]) && $all[$key] !=null){
    foreach ($all[$key] as $value) {
        ?>
        <tr>
            <td><?=($x++)?></td>
            <td><?php echo $value->in_order; ?></td>
            <td><?=$value->title_setting?></td>
            <td>
                <a href="<?php echo base_url().'human_resources/Employee_settings/UpdateSitting/'.$value->id_setting."/".$key  ?>" title="تعديل">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                <span> </span>
                <a href="<?=base_url()."human_resources/Employee_settings/DeleteSitting/".$value->id_setting."/".$key?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
        </tr>
    <?php } }else{
           echo '<tr>
                                                    <td colspan="3"> لايوجد بيانات </td>
                                                    </tr>';
       } ?>
    </tbody>
</table>
</div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>

                                <?php  $x++; } } ?>
                        <!---------------------Osama 8-9-------------------------->
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_areas") {echo  'active'; }  ?>" id="tab_areas">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>المدن</strong></a>
                              
                                    <?php
                                    if(isset($area) && !empty($area) && $area!=null){
                                        echo form_open_multipart('human_resources/Employee_settings/UpdateSittingAreas/'.$area['id'].'/tab_areas');
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/Employee_settings/AddSittingAreas/'.'tab_areas/'. 0);
                                    }
                                    ?>
                                    <div class="form-group col-sm-8 col-xs-12">
                                        <label class="label "> الاسم </label>
                                        <input type="text" name="name" value="<?php if(isset($area)) echo $area['name'] ?>" class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label "> الترتيب</label>
                                        <input type="text" name="in_order"
                                               value="<?php if(isset($record)) echo $record['in_order'] ?>" onkeypress="validate_number(event);"
                                               class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_area" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($areas) && !empty($areas) && $areas !=null){ ?>
                                    <div class="no-dt-buttons">
                                        <table class="table table-bordered table-striped table-hover example">
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
                                            foreach ($areas as $key=>$value) {
                                                ?>
                                                <tr>
                                                    <td><?=($x++)?></td>
                                                    <td><?=$value?></td>
                                                    <td>
                                                        <a href="<?php echo base_url().'human_resources/Employee_settings/UpdateSittingAreas/'.$key.'/tab_areas' ?>" title="تعديل">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <span> </span>
                                                        <a href="<?=base_url()."human_resources/Employee_settings/DeleteSittingAreas/tab_areas/".$key?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    <?php } ?>
                                
                            </div>
                        </div>
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_residential") {echo  'active'; }  ?>" id="tab_residential">
                            <div class="panel-body padding-4" >
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>الأحياء </strong></a>
                                
                                    <?php
                                    if(isset($area) && !empty($area) && $area!=null){
                                        echo form_open_multipart('human_resources/Employee_settings/UpdateSittingAreas/'.$area['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/Employee_settings/AddSittingAreas/'.'tab_residential/'. 0);
                                    }
                                    ?>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label ">المدينة</label>
                                        <select  name="from_id_fk" id="from_id_fk"   class="form-control  selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" >
                                            <option value="">إختر المدينة </option>
                                            <?php foreach ($areas as $key=>$stage){
                                                $select=''; if(!empty($area)){ if($area['from_id_fk'] == $key){$select='selected';} }
                                                ?>
                                                <option value="<?php echo $key; ?>"<?= $select?> <?php ?>><?php echo $stage ;?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label ">الحي</label>
                                        <input type="text" name="name" value="<?php if(isset($area)) echo $area['name'] ?>" class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label "> الترتيب</label>
                                        <input type="text" name="in_order"
                                               value="<?php if(isset($record)) echo $record['in_order'] ?>" onkeypress="validate_number(event);"
                                               class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_area" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($residentials) && !empty($residentials) && $residentials !=null){ ?>
                                    <div class="no-dt-buttons">
                                        <table class="table table-bordered table-striped table-hover example ">
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
                                                    <td>  <a href="<?php echo base_url().'human_resources/Employee_settings/UpdateSittingAreas/'.$value->id."/tab_residential"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."human_resources/Employee_settings/DeleteSittingAreas/tab_residential/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    <?php } ?>
                              
                            </div>
                        </div>
                        <!-------------------------Osama 8-9------------------------->
                        <!---------------------Osama 9-9-------------------------->
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_allowances") {echo  'active'; }  ?>" id="tab_allowances">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>الإستحقاقات</strong></a>
                               
                                    <?php
                                    if(isset($allowance) && !empty($allowance) && $allowance!=null){
                                        echo form_open_multipart('human_resources/Employee_settings/UpdateSittingAllowances/'.$allowance['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/Employee_settings/AddSittingAllowances/tab_allowances');
                                    }
                                    ?>
                                    <div class="form-group col-sm-8 col-xs-12">
                                        <label class="label ">نوع الإستحقاق</label>
                                        <input type="text" name="title" value="<?php if(isset($allowance)) echo $allowance['title'] ?>" class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label "> الترتيب</label>
                                        <input type="text" name="in_order"
                                               value="<?php if(isset($record)) echo $record['in_order'] ?>" onkeypress="validate_number(event);"
                                               class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_allowances" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($allowances) && !empty($allowances) && $allowances !=null){ ?>
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
                                            foreach ($allowances as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>
                                                    <td><?php echo $value->in_order; ?></td>
                                                    <td><?=$value->title?></td>
                                                    <td>  <a href="<?php echo base_url().'human_resources/Employee_settings/UpdateSittingAllowances/'.$value->id."/tab_allowances"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."human_resources/Employee_settings/DeleteSittingAllowances/tab_allowances/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                
                            </div>
                        </div>
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_deduction") {echo  'active'; }  ?>" id="tab_deduction">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>الإستقطاعات </strong></a>
                                
                                    <?php
                                    if(isset($deduction) && !empty($deduction) && $deduction!=null){
                                        echo form_open_multipart('human_resources/Employee_settings/UpdateDeductionSitting/'.$deduction['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/Employee_settings/AddDeductionSitting/tab_deduction');
                                    }
                                    ?>
                                    <div class="form-group col-sm-8 col-xs-12">
                                        <label class="label ">إسم الإستقطاع</label>
                                        <input type="text" name="title" value="<?php if(isset($deduction)) echo $deduction['title'] ?>" class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label "> الترتيب</label>
                                        <input type="text" name="in_order"
                                               value="<?php if(isset($deduction)) echo $deduction['in_order'] ?>" onkeypress="validate_number(event);"
                                               class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_deduction" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($deductions) && !empty($deductions) && $deductions !=null){ ?>
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
                                            foreach ($deductions as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>

                                                    <td><?php echo $value->in_order; ?></td>
                                                    <td><?=$value->title?></td>
                                                    <td>  <a href="<?php echo base_url().'human_resources/Employee_settings/UpdateDeductionSitting/'.$value->id."/tab_deduction"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."human_resources/Employee_settings/DeleteDeductionSitting/tab_deduction/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                
                            </div>
                        </div>
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_jobRole") {echo  'active'; }  ?>" id="tab_jobRole">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>المسمي الوظيفي</strong></a>
                                
                                    <?php
                                    if(isset($jobRole) && !empty($jobRole) && $jobRole!=null){
                                        echo form_open_multipart('human_resources/Employee_settings/UpdateJobRoleSitting/'.$jobRole['defined_id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/Employee_settings/AddJobRoleSitting/tab_jobRole');
                                    }
                                    ?>
                                    <div class="form-group col-sm-8 col-xs-12">
                                        <label class="label ">المسمي الوظيفي</label>
                                        <input type="text" name="title" value="<?php if(isset($jobRole)) echo $jobRole['defined_title'] ?>" class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label "> الترتيب</label>
                                        <input type="text" name="in_order"
                                               value="<?php if(isset($jobRole)) echo $jobRole['in_order'] ?>" onkeypress="validate_number(event);"
                                               class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_jobRole" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($jobRoles) && !empty($jobRoles) && $jobRoles !=null){ ?>
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
                                            foreach ($jobRoles as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>

                                                    <td><?php echo $value->in_order; ?></td>
                                                    <td><?=$value->defined_title?></td>
                                                    <td>  <a href="<?php echo base_url().'human_resources/Employee_settings/UpdateJobRoleSitting/'.$value->defined_id."/tab_jobRole"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."human_resources/Employee_settings/DeleteJobRoleSitting/tab_jobRole/".$value->defined_id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                
                            </div>
                        </div>
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_main_department") {echo  'active'; }  ?>" id="tab_main_department">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>الإدارات</strong></a>
                               
                                    <?php
                                    if(isset($mainDepartment) && !empty($mainDepartment) && $mainDepartment!=null){
                                        echo form_open_multipart('human_resources/Employee_settings/UpdateMainDepartmentSitting/'.$mainDepartment['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/Employee_settings/AddMainDepartmentSitting/tab_main_department');
                                    }
                                    ?>
                                    <div class="form-group col-sm-8 col-xs-12">
                                        <label class="label ">إسم الإدارة</label>
                                        <input type="text" name="name" value="<?php if(isset($mainDepartment)) echo $mainDepartment['name'] ?>" class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label "> الترتيب</label>
                                        <input type="text" name="in_order"
                                               value="<?php if(isset($mainDepartment)) echo $mainDepartment['in_order'] ?>" onkeypress="validate_number(event);"
                                               class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_main_department" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($mainDepartments) && !empty($mainDepartments) && $mainDepartments !=null){ ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                                <th > الترتيب </th>
                                                <th>الإدارة</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($mainDepartments as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>
                                                    <td><?php echo $value->in_order; ?></td>
                                                    <td><?=$value->name?></td>
            <td>
                <?php if($value->count>0 || ($value->id >=1 && $value->id <=4)){?>
                    <button class="btn btn-sm btn-danger"> لا يمكن الحذف </button>
                      <a href="<?php echo base_url().'human_resources/Employee_settings/UpdateMainDepartmentSitting/'.$value->id."/tab_main_department"  ?>" title="تعديل" >
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    
                <?php }else{?>
              
                <a href="<?=base_url()."human_resources/Employee_settings/DeleteMainDepartmenSitting/tab_main_department/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                    <i class="fa fa-trash" aria-hidden="true"></i></a>
                <? } ?>
            </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                
                            </div>
                        </div>
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_sub_department") {echo  'active'; }  ?>" id="tab_sub_department">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>الاقسام</strong></a>
                               
                                    <?php
                                    if(isset($subDepartment) && !empty($subDepartment) && $subDepartment!=null){
                                        echo form_open_multipart('human_resources/Employee_settings/UpdateSubDepartmentSitting/'.$subDepartment['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/Employee_settings/AddSubDepartmentSitting/tab_sub_department');
                                    }
                                    ?>
                                    <div class="form-group col-sm-5 col-xs-12">
                                        <label class="label ">الإادرة</label>
                                        <select  name="from_id_fk" id="from_id_fk"   class="form-control  selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" >
                                            <option value="">إختر </option>
                                            <?php foreach ($mainDepartments as $value){
                                                $select=''; if(!empty($subDepartment)){ if($subDepartment['from_id_fk'] == $value->id){$select='selected';} }
                                                ?>
                                                <option value="<?php echo $value->id; ?>"<?= $select?> <?php ?>><?php echo  $value->name;?> </option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-5 col-xs-12">
                                        <label class="label ">القسم</label>
                                        <input type="text" name="name" value="<?php if(isset($subDepartment)) echo $subDepartment['name'] ?>" class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-2 col-xs-12">
                                        <label class="label "> الترتيب</label>
                                        <input type="text" name="in_order"
                                               value="<?php if(isset($subDepartment)) echo $subDepartment['in_order'] ?>" onkeypress="validate_number(event);"
                                               class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_main_department" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if(isset($subDepartments) && $subDepartments!=null){?>

                                        <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr class="greentd">
                                                <th class="text-center"> م </th>
                                                <th class="text-center"> الإدارة </th>
                                                <th class="text-center"> القسم </th>
                                                <th class="text-center"> الاجراء </th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">

                                            <?php
                                            $a=1;
                                            foreach ($subDepartments as $record ) {
                                                $max=1;
                                                 if(!empty($record->sub_departments) > 0){
                                                    $max =sizeof($record->sub_departments);
                                                 }
                                                 ?>
                                                <tr>
                                                <td rowspan="<?php echo $max ?>"><?php echo $a++ ?></td>

                                                <td rowspan="<?php echo $max ?>"><?php echo $record->name; ?></td>
                                                <?php if (!empty($record->sub_departments)) {
                                                    foreach ($record->sub_departments as $sub) { ?>

                                                        <td> <?php echo $sub->name; ?> </td>

        <td data-title="التحكم" class="text-center">
            <a href="<?php echo base_url('human_resources/Employee_settings/UpdateSubDepartmentSitting') . '/' . $sub->id . '/tab_sub_department' ?>"
               title="تعديل"> <i class="fa fa-pencil-square-o"
                                 aria-hidden="true"></i> </a>
<a href="<?=base_url()."human_resources/Employee_settings/DeleteSubDepartmentSitting/tab_sub_department/".$sub->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
    <i class="fa fa-trash" aria-hidden="true"></i></a>
                                 
                                 
                                 
        </td>
                                                        </tr>
                                                    <?php }
                                                } else { ?>
                                                    <td> لايوجد أقسام</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-danger">لا يوجد الحذف والتعديل
                                                        </button>
                                                    </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php
                                                $a++;
                                            }  ?>
                                            </tbody>
                                        </table>
                                    <?php }
                                    ?>
                                
                            </div>
                        </div>
                        <!-------------------------Osama 9-9------------------------->
                        
                        
<!------------ اعدادت الفئات ------------------------------->                        
  <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_categories") {echo  'active'; }  ?>" id="tab_categories">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>إعدادات فئات الإدارة </strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($category) && !empty($category) && $category!=null){
                                        echo form_open_multipart('human_resources/Employee_settings/UpdateCategoriesSitting/'.$category->id.'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/Employee_settings/AddCategoriesSitting/tab_categories');
                                    }
                                    ?>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label ">اسم الفئة</label>
                                        <input type="text" name="name" value="<?php if(isset($category)) echo $category->name ?>" class="form-control " placeholder="اسم الفئة" autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-5 col-xs-12">
                                        <label class="label ">اقصي عدد من الدرجات</label>
                                        <input type="text" name="max_degree" value="<?php if(isset($category)) echo $category->max_degree ?>" onkeypress="validate_number(event)" onkeyup="getvalidNum($(this).val());" class="form-control " placeholder="اقصي عدد 15 درجة" autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-3 col-xs-12">
                                        <label class="label "> الترتيب</label>
                                        <input type="text" name="in_order"
                                               value="<?php if(isset($category)) echo $category->in_order ?>"
                                                onkeypress="validate_number(event);"
                                               class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" id="add_category" name="add_category" value="حفظ" class="btn btn-purple btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                        <span id="add_category_span" style="color: red;"></span>
                                    </div>
                                    </form>
                                    <?php if(isset($categories) && $categories!=null){?>

                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                                <th class="text-center"> الترتيب </th>
                                                <th>اسم الفئة</th>
                                                <th>اقصي عدد من الدرجات</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($categories as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>

                                                    <td><?php echo $value->in_order; ?></td>
                                                    <td><?=$value->name?></td>
                                                    <td><?=$value->max_degree?></td>
                                                    <td>  <a href="<?php echo base_url().'human_resources/Employee_settings/UpdateCategoriesSitting/'.$value->id."/tab_categories"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."human_resources/Employee_settings/DeleteCategoriesSitting/tab_categories/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                            <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                        
                        
<!----------- نهاية اعدادات الفئات ------------------------->                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
             
        </div>
   
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

<script>
   function getvalidNum(value) {
       if(value <= 15 ){
           document.getElementById("add_category").removeAttribute("disabled", "disabled");
           document.getElementById("add_category_span").innerHTML = '';
       }
      else if(value > 15){
           document.getElementById("add_category").setAttribute("disabled", "disabled");
           document.getElementById("add_category_span").innerHTML = 'أقصي عدد 15 درجة تواصل مع الدعم الفني';
       }
   }

</script>

