

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

                          

                            <!-------------Osama 8-9---------------->
                        </ul>
                    </div>
                    <!-- Tab panels -->
                    <div class="tab-content col-sm-8">
                        <!----------- بداية الاعدادات الاساسية ------------------------->
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
                                                echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$id.'/'. $key);
                                            }
                                            else{
                                                echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/AddSitting/'. $key);
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
                                                                    <a href="<?php echo base_url().'all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$value->id_setting."/".$key  ?>" title="تعديل">
                                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                                    <span> </span>
                                                                    <a href="<?=base_url()."all_Finance_resource/settings/Finance_resource_settings/DeleteSitting/".$value->id_setting."/".$key?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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

                        <!----------- نهاية الاعدادات الاساسية ------------------------->








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



