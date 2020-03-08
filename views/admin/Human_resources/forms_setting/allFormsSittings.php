

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
                                    
                                    
                                    
        <li class="<?php if(isset($typee) && !empty($typee)&& $typee === "tab_main_evaluation") {echo  'active'; }  ?>"  role="presentation" style="float: right; width: 50%;">
        <a <?php if( isset($disabled)){}else{echo 'href="#tab_main_evaluation"';} ?>  aria-controls="tab_main_evaluation" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>التقيم الرئيسي</a>
        </li>
        <li class="<?php if(isset($typee) && !empty($typee)&& $typee === "tab_sub_evaluation") {echo  'active'; }  ?>" role="presentation" style="float: right; width: 50%;">
        <a <?php if( isset($disabled)){}else{echo 'href="#tab_sub_evaluation"';} ?>  aria-controls="tab_sub_evaluation" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>التقيم الفرعي</a>
        </li>

                                    
                                    
                                    

                        </ul>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content col-sm-8  padding-4">
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
                                                echo form_open_multipart('human_resources/Forms_settings/UpdateSitting/'.$id.'/'. $key);
                                            }
                                            else{
                                                echo form_open_multipart('human_resources/Forms_settings/AddSitting/'. $key);
                                            }
                                            ?>
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group col-sm-8 col-xs-12">
                                                    <label class="label "> الإسم</label>
                                                    <input type="text" name="title_setting"
                                                           value="<?php if(isset($record)) echo $record['title_setting'] ?>"
                                                           class="form-control " autofocus data-validation="required">

                                                    <input type="hidden" name="type_name" value=""/>
                                                </div>
                                                <div class="form-group col-sm-2 col-xs-12">
                                                    <label class="label "> الترتيب</label>
                                                    <input type="text" name="in_order"
                                                           value="<?php if(isset($record)) echo $record['in_order'] ?>" onkeypress="validate_number(event);"
                                                           class="form-control " autofocus data-validation="required">
                                                </div>
                                                
                                                
                                                
                                                <?php if($key==8){?>
                                                <div class="form-group col-sm-2 col-xs-12">
                                                <label class="label "> الدرجه العظمي</label>
                                                <input type="text" name="max_degree"
                                                value="<?php if(isset($record)) echo $record['max_degree'] ?>"
                                                class="form-control " autofocus data-validation="required">
                                                
                                                
                                                </div>
                                                <?php } ?>
                                                
                                                
                                                
                                                
                                            </div>
                                            <div class="form-group col-sm-12 col-xs-12 text-center">
                                                <button type="submit" name="add" value="حفظ" class="btn btn-success btn-labeled"><span class="btn-label">
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                            </div>
                                            </form>
                                            <?php if (isset($all) && !empty($all) && $all !=null){ ?>
                                                <table class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                    <tr class="info">
                                                        <th>م</th>
                                                        <th > الترتيب </th>
                                                        <th>الإسم</th>
                                                        			 <?php if($key==8){?>
                                                        <th>الدرجه</th>
                                                 <?php } ?>
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
                                                                
                                                                					 
												  <?php if($key==8){?>
                                                                <td><?=$value->max_degree?></td>
                                                                <?php } ?>
                                                                
                                                                <td>
                                                                    <a href="<?php echo base_url().'human_resources/Forms_settings/UpdateSitting/'.$value->id_setting."/".$key  ?>" title="تعديل">
                                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                                    <span> </span>
                                                                    <a href="<?=base_url()."human_resources/Forms_settings/DeleteSitting/".$value->id_setting."/".$key?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>

                                <?php  $x++; } } ?>


<!--عناصر التقييم----------------------------------------------------------------------------------->
      
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_main_evaluation") {echo  'active'; }  ?>" id="tab_main_evaluation">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>التقيم الرئيسي</strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($mainEvaluation) && !empty($mainEvaluation) && $mainEvaluation!=null){
                                        echo form_open_multipart('human_resources/Forms_settings/UpdateEvaluation/'.$mainEvaluation['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/Forms_settings/AddEvaluation/tab_main_evaluation');
                                    }
                                    ?>
                                    <div class="form-group col-sm-8 col-xs-12">
                                        <label class="label ">عنصر التقيم الرئيسي</label>
                                        <input type="text" name="title" value="<?php if(isset($mainEvaluation)) echo $mainEvaluation['title'] ?>" class="form-control " autofocus data-validation="required">
                                    </div>

                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_main_evaluation" value="حفظ" class="btn btn-success btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($main_result_evaluations) && !empty($main_result_evaluations) && $main_result_evaluations !=null){ ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="greentd">
                                                <th>م</th>
                                                <th>التقيم</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($main_result_evaluations as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>
                                                    <td><?php echo $value->title; ?></td>

                                                    <td>
                                                        <a href="<?php echo base_url().'human_resources/Forms_settings/UpdateEvaluation/'.$value->id."/tab_main_evaluation"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <?php if($value->count>0 || ($value->id >=1 && $value->id <=4)){?>
                                                            <button class="btn btn-sm btn-danger"> لا يمكن الحذف </button>


                                                        <?php }else{?>

                                                            <a href="<?=base_url()."human_resources/Forms_settings/DeleteEvaluation/tab_main_evaluation/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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
                        </div>
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_sub_evaluation") {echo  'active'; }  ?>" id="tab_sub_evaluation">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>التقيم الفرعي</strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($subEvaluation) && !empty($subEvaluation) && $subEvaluation!=null){
                                        echo form_open_multipart('human_resources/Forms_settings/UpdateEvaluation/'.$subEvaluation['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('human_resources/Forms_settings/AddEvaluation/tab_sub_evaluation');
                                    }
                                    ?>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label "> اختار التقيم الرئيسي</label>
                                        <select  name="from_id" id="from_id"   class="form-control  selectpicker "  data-show-subtext="true" data-live-search="true"   data-validation="required" aria-required="true" >
                                            <option value="">إختر </option>
                                            <?php   if(!empty( $mainEvaluations)){
                                                foreach ($mainEvaluations as $value){
                                                    $select=''; if(!empty($mainEvaluations)){ if($subEvaluation['from_id'] == $value->id){$select='selected';} }
                                                    ?>
                                                    <option value="<?php echo $value->id; ?>"<?= $select?> <?php ?>><?php echo  $value->title;?> </option>
                                                <?php } }else{
                                                ?>
                                                <option value="">لاتوجد تقييمات رئيسية</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label ">عنصر التقيم الفرعي</label>
                                        <input type="text"   name="title" value="<?php  if(!empty($subEvaluation['title'])){echo$subEvaluation['title'];} ?>" class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label "> الدرجة القصوي</label>
                                        <input type="text" name="degree"
                                               value="<?php if(isset($subEvaluation)) echo $subEvaluation['degree'] ?>"
                                               class="form-control " autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12 text-center">
                                        <button type="submit" name="add_sub_evaluation" value="حفظ" class="btn btn-success btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if(isset($sub_evaluations) && $sub_evaluations!=null){?>

                                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                            <tr class="greentd">
                                                <th class="text-center"> م </th>
                                                <th class="text-center"> التقييم الرئيسي </th>
                                                <th class="text-center"> التقييم الفرعي </th>
                                                <th class="text-center"> الدرجة القصوي </th>
                                                <th class="text-center"> الاجراء </th>
                                            </tr>
                                            </thead>
                                            <tbody class="text-center">

                                            <?php
                                            $a=1;
                                            foreach ($sub_evaluations as $record ) {
                                                $max=1;
                                                if(!empty($record->count) > 0){
                                                    $max =$record->count;
                                                }
                                                ?>
                                                <tr>
                                                <td rowspan="<?php echo $max ?>"><?php echo $a++ ?></td>

                                                <td rowspan="<?php echo $max ?>"><?php echo $record->title; ?></td>
                                                <?php  if (!empty($record->sub)) {
                                                    foreach ($record->sub as $sub) { ?>

                                                        <td> <?php echo $sub->title; ?> </td>
                                                        <td> <?php echo $sub->degree; ?> </td>

                                                        <td data-title="التحكم" class="text-center">
                                                            <a href="<?php echo base_url('human_resources/Forms_settings/UpdateEvaluation') . '/' . $sub->id . '/tab_sub_evaluation' ?>"
                                                               title="تعديل"> <i class="fa fa-pencil-square-o"
                                                                                 aria-hidden="true"></i> </a>
                                                            <a href="<?=base_url()."human_resources/Forms_settings/DeleteEvaluation/tab_sub_evaluation/".$sub->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                                <i class="fa fa-trash" aria-hidden="true"></i></a>



                                                        </td>
                                                        </tr>
                                                    <?php }
                                                } else { ?>
                                                    <td colspan="2"> لايوجد تقييمات</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-danger">لا يوجد حذف أو تعديل
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
                        </div>









<!---------------------------------------------------------------------------------------->
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

