


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
    .nav-tabs>li>a:hover {
        border-color: #eee #eee #ddd;
    }

    .nav-tabs>li>a {
        color: #222;
        font-weight: 600;
    }
</style>
<!--<link rel="stylesheet" href="--><?php //echo base_url()?><!--asisst/admin_asset/css/stylecrm.css" />-->

<!-- Main content -->

<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                <div class="panel-heading">
                    <div class="btn-group" id="buttonexport">
                        <a href="#">
                            <h4>اٍعدادات عامة </h4>

                        </a>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="col-sm-3" >
                    <fieldset disabled>
                        <ul class="nav nav-tabs tabs-left holiday-month" style="    border: 1px solid gray;">
                            <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray !=null){
                                $x = 0;
                            foreach ($this->myarray as $key=>$value){
  
                                ?>

                                <?php if(isset($typee) && !empty($typee) && $typee) {
                                    $active ="";
                                     $tabs = "";
                                     $disabl = "";
                                    if($typee == $key ){
                                        $active = 'active';
                                        $value = $value;
                                    }
                                }?>
                                
                                <?php
                             $link =  $this->uri->segment(3);
                                
                                if( $link == 'UpdateSitting' ){
                                  $tabs = '';  
                                  $disabl = 'disabled';  
                                  ?>
                                       <li  class=" <?php echo $disabl; ?> <?php  if(isset($typee) && !empty($typee) && $typee) {
                                    echo $active; }else {echo ($x == 0)? 'active':''; } ?>
                                    " style="float: none">
                                       <a>  <?=$value?> 
                                    <i class="fa fa-calendar-o" aria-hidden="true">
                                    </i>
                                       </a>
                                    </li>
                                  
                                  
                                <?php }elseif( $link == 'Settings'){
                                    
                                $tabs = 'tab';  
                                  $disabl = '';   
                                ?>
                                        <li  class=" <?php echo $disabl; ?> <?php  if(isset($typee) && !empty($typee) && $typee) {
                                    echo $active; }else {echo ($x == 0)? 'active':''; } ?>
                                    " style="float: none">
                                       <a href="#tab<?= $key ?>" 
                                    data-toggle="<?php echo $tabs; ?>">  <?=$value?> 
                                    <i class="fa fa-calendar-o" aria-hidden="true">
                                    </i>
                                       </a>
                                    </li>
                                
                                <?php }
                                
                                ?>
                                
                           



                            <?php $x++; } } ?>
                        </ul>
                        </fieldset>
                    </div>
                    
                    <!-- Tab panels -->
                    <div class="tab-content col-sm-9">
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



                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong><?=$value?><i class="fa fa-calendar-o" aria-hidden="true"></i></strong></a>

                                <div class="table-responsive">



                                    <?php
                                    if(isset($record) && !empty($record) && $record!=null){
                                        echo form_open_multipart('family_controllers/Settings/UpdateSitting/'.$id.'/'. $key);
                                    }
                                    else{
                                        echo form_open_multipart('family_controllers/Settings/AddSitting/'. $key);
                                    }
                                    ?>
                                        <div class="form-group col-sm-8 col-xs-12">
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
                                        foreach ($all[$key] as $value) {
                                            ?>
                                            <tr>
                                                <td><?=($x++)?></td>
                                                <td><?=$value->title_setting?></td>
                                                <td>
                                                    <a href="<?php echo base_url().'family_controllers/Settings/UpdateSitting/'.$value->id_setting."/".$key  ?>" title="تعديل">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                    <span> </span>
                                                    <a href="<?=base_url()."family_controllers/Settings/DeleteSitting/".$value->id_setting."/".$key?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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

                        <?php  $x++; } } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->