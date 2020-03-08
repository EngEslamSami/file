

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


                            <li  role="presentation"style="float: right; width: 50%;" class="<?php  if(isset($typee) && !empty($typee) && $typee==='kafalat_type')
                            {echo 'active'; }?>">
                                <a <?php if(isset($disabled)){}else{echo 'href="#kafalat_type"';} ?> aria-controls="tab_areas" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>انواع الكفالات</a>
                            </li>
                            <li  role="presentation" style="float: right; width: 50%;"class="<?php  if(isset($typee) && !empty($typee) && $typee==='kafel_status_1')
                            {echo 'active'; }?>">
                                <a <?php if(isset($disabled)){}else{echo 'href="#kafel_status_1"';} ?>  aria-controls="kafel_status_1" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>حالات الكفالات</a>
                            </li>

                           <li  role="presentation" style="float: right; width: 50%;" class="<?php  if(isset($typee) && !empty($typee) && $typee==='kafel_status_2')
                           {echo 'active'; }?>">
                                <a <?php if(isset($disabled)){}else{echo 'href="#kafel_status_2"';} ?>  aria-controls="kafel_status_2" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>حالات الكافل</a>
                            </li>


     <li  role="presentation" style="float: right; width: 50%;" class="<?php  if(isset($typee) && !empty($typee) && $typee ==='fr_sponser_donor')
        {echo 'active'; }?>">
            <a <?php if(isset($disabled)){}else{echo 'href="#fr_sponser_donor"';} ?>  aria-controls="fr_sponser_donor" role="tab" data-toggle="tab"  >
            <i class="fa fa-cog" aria-hidden="true"></i>انواع الكفالات والتبرعات</a>
        </li>



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

                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "kafalat_type") {echo  'active'; }  ?>" id="kafalat_type">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>انواع الكفالات </strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($kafala) && !empty($kafala) && $kafala!=null){
                                        echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$kafala['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/AddSitting/kafalat_type');
                                    }
                                    ?>

                                    <div class="form-group col-sm-5 col-xs-12">
                                        <label class="label label-green half">اسم الكفالة</label>
                                        <input type="text" name="title" value="<?php if(isset($kafala)) echo $kafala['title'] ?>" class="form-control half input-style" autofocus data-validation="required">
                                    </div>
                                    <?php
                                    $tasnfat = array(
                                        'yatem'=>'يتيم',
                                        'mostafed'=>'مستفيد',
                                        'armal'=>'أرملة',
                                    );
                                    ?>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half" style="width: 50px !important;margin-left: 6px;"> الفئة</label>

                                        <?php foreach($tasnfat as $row=> $value){ ?>
                                        <input type="checkbox" name="tasnef[]" style="margin: 9px 0 0px;" value="<?=$row?>" <?php if(isset($kafala[$row])){ if($kafala[$row] == 1){ echo 'checked';} } ?>  class=" " autofocus >&nbsp <?=$value?>   &nbsp &nbsp
                                         <?php }?>
                                    </div>
                                    <div class="form-group col-sm-3 col-xs-12">
                                        <label class="label label-green half">اللون المميز</label>
                                        <input type="color" name="color" value="<?php if(isset($kafala)) echo $kafala['color'] ?>" class="form-control half input-style" autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <button type="submit" name="kafalat_type" value="kafalat_type" class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($kafalat_types) && !empty($kafalat_types) && $kafalat_types !=null){ ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                                <th>اسم الكفالة</th>
                                                <th>يتيم</th>
                                                <th>مستفيد</th>
                                                <th>أرملة</th>
                                                <th>اللون المميز</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($kafalat_types as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>

                                                    <td><?=$value->title?></td>
                                                    <?php foreach ($tasnfat as $key=>$value1) {
                                                        $halaTure = 'check';
                                                        $halafalse = 'times';
                                                        $true = '';
                                                        $color = '';
                                                        ?>
                                                    <td>
                                                        <?php if($value->$key == 1){
                                                            $true = $halaTure;
                                                            $color = 'green';
                                                        } else {
                                                            $true = $halafalse;
                                                            $color = 'red';
                                                        } ?>
                                                        <i style="color:<?=$color?>" class="fa fa-<?=$true?>" aria-hidden="true"></i>
                                                    </td>
                                                    <? } ?>

                                                    <td>
                                                        <label class="label  " style="background-color:<?=$value->color?>;padding: 5px 28px;"> </label>

                                                    </td>
                                                    <td>  <a href="<?php echo base_url().'all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$value->id."/kafalat_type"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."all_Finance_resource/settings/Finance_resource_settings/DeleteSittingKafala/kafalat_type/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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


                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "kafel_status_1") {echo  'active'; }  ?>" id="kafel_status_1">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>حالات الكفالات </strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($hakafala) && !empty($hakafala) && $hakafala!=null){
                                        echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$hakafala['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/AddSitting/kafel_status_1');
                                    }
                                    ?>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half">الاسم </label>
                                        <input type="text" name="title" value="<?php if(isset($hakafala)) echo $hakafala['title'] ?>" class="form-control half input-style" autofocus data-validation="required">
                                        <input type="hidden" name="type_k" value="1">
                                    </div>

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half">اللون المميز</label>
                                        <input type="color" name="color" value="<?php if(isset($hakafala)) echo $hakafala['color'] ?>" class="form-control half input-style" autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <button type="submit" name="kafel_status_1" value="kafel_status_1" class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($halatkafala) && !empty($halatkafala) && $halatkafala !=null){ ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>

                                                <th>حالة الكفالة</th>
                                                <th>اللون المميز</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($halatkafala as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>

                                                    <td><?=$value->title?></td>
                                                    <td>
                                                        <label class="label  " style="background-color:<?=$value->color?>;padding: 5px 28px;"> </label>

                                                    </td>

                                                    <td>  <a href="<?php echo base_url().'all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$value->id."/kafel_status_1"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."all_Finance_resource/settings/Finance_resource_settings/DeleteSittingKafala/kafel_status_1/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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

                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "kafel_status_2") {echo  'active'; }  ?>" id="kafel_status_2">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>حالات الكافل </strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($hakafalel) && !empty($hakafalel) && $hakafalel!=null){
                                        echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$hakafalel['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/AddSitting/kafel_status_2');
                                    }

                                    ?>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half">الاسم </label>
                                        <input type="text" name="title" value="<?php if(isset($hakafalel)) echo $hakafalel['title'] ?>" class="form-control half input-style" autofocus data-validation="required">
                                        <input type="hidden" name="type_k" value="2">
                                    </div>

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half">اللون المميز</label>
                                        <input type="color" name="color" value="<?php if(isset($hakafalel)) echo $hakafalel['color'] ?>" class="form-control half input-style" autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <button type="submit" name="kafel_status_2" value="kafel_status_2" class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($halatkafalel) && !empty($halatkafalel) && $halatkafalel !=null){ ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                                <th> حالة الكافل</th>
                                                <th>اللون المميز</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            foreach ($halatkafalel as $value) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?=($x++)?>
                                                    </td>

                                                    <td><?=$value->title?></td>
                                                    <td>
                                                        <label class="label  " style="background-color:<?=$value->color?>;padding: 5px 28px;"> </label>

                                                    </td>

                                                    <td>  <a href="<?php echo base_url().'all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$value->id."/kafel_status_1"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."all_Finance_resource/settings/Finance_resource_settings/DeleteSittingKafala/kafel_status_1/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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


<?php /* ?>

                        <!-- -------    - -انواع الكفالات والتبرعات----->
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "fr_sponser_donor") {echo  'active'; }  ?>" id="fr_sponser_donor">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>انواع الكفالات و التبرعات </strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($kafala_types) && !empty($kafala_types) && $kafala_types!=null){
                                        echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$kafala_types['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/AddSitting/fr_sponser_donor');
                                    }

                                    ?>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half">نوع الكافل_المتبرع </label>
                                        <input type="text" name="title"  class="form-control half input-style"  value="<?php if(isset($kafala_types)) echo $kafala_types['title'] ?>" autofocus data-validation="required">
                                     <!--   <input type="hidden" name="type_k" value="2"> -->
                                    </div>

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half">فئة</label>
                                       <select name ="type" class="form-control half input-style">
                                           <option>--اختر--</option>
                                           <option value="1" <?php if(isset($kafala_types) && !empty( $kafala_types['type'])&&  $kafala_types['type']==1){ echo 'selected' ;}?>>الكفلاء</option>
                                           <option value="2" <?php if(isset($kafala_types) && !empty( $kafala_types['type'])&&  $kafala_types['type']==2){ echo 'selected' ;}?>>المتبرعين</option>

                                       </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half">تخص</label>
                                        <select name ="specialize_fk" class="form-control half input-style">
                                            <option>--اختر--</option>
                                            <option value="1" <?php if(isset($kafala_types) && !empty( $kafala_types['specialize_fk'])&&  $kafala_types['specialize_fk']==1){ echo 'selected' ;}?>>الأفراد</option>
                                            <option value="2" <?php if(isset($kafala_types) && !empty( $kafala_types['specialize_fk'])&&  $kafala_types['specialize_fk']==2){ echo 'selected' ;}?>>الجهات و المؤسسات</option>

                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half">اللون المميز</label>
                                        <input type="color" name="color" value="<?php if(isset($kafala_types)) echo $kafala_types['color'] ?>" class="form-control half input-style" autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <button type="submit" name="fr_sponser_donor" value="fr_sponser_donor" class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($kafala_type) && !empty($kafala_type) && $kafala_type !=null){ ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                                <th> الفئة</th>
                                                <th>تخص</th>
                                                <th>نوع الكافل_المتبرع</th>
                                                <th>اللون المميز</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           <!-- <?php
                                            $x = 0;
                                            foreach($kafala_type as $record){$x++;

                                                ?>
                                                <tr>
                                                <td <?php if(count($record->data_kafel) !=0){ ?>rowspan="<?php echo count($record->data_kafel) ;?>" <? } ?>><?php echo $x?></td>
                                                <td <?php if(count($record->data_kafel) !=0){ ?>rowspan="<?php echo count($record->data_kafel) ;?>" <? } ?> ><?php echo$record->type_name;?> </td>
                                                <?php if(!empty($record->data_kafel)){ foreach ($record->data_kafel as $row){ ?>
                                                    <td rowspan="<?php echo sizeof($row->data_member); ?>"><?php echo $row->specialize_name; ?></td>

                                                    <?php  if(!empty($row->data_member)){ foreach ($row->data_member as $row2){ ?>
                                                        <td><?php echo $row2->title; ?></td>
                                                        <td> <label class="label  " style="background-color:<?=$row2->color?>;padding: 5px 28px;"> </label></td>
                                                        <td>  <a href="<?php echo base_url().'all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$record->id."/fr_sponser_donor"  ?>" title="تعديل" >
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                            <a href="<?=base_url()."all_Finance_resource/settings/Finance_resource_settings/DeleteKafalaTypes/".$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                                <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </td>

                                                        </tr>

                                                        <?php
                                                    }

                                                    }else{
                                                        ?>

                                                        <td>--</td>
                                                        <td>--</td>
                                                        <td>--</td>
                                                        <td>--</td>
                                                        <td>--</td>
                                                        <td>--</td></tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                }
                                                }else{ ?>
                                                    <td >==</td>
                                                    <td >==</td>
                                                    <td >==</td>
                                                    <td >==</td>
                                                    <td >==</td>
                                                    <td >==</td></tr>
                                                <?php }
                                            } ?> -->


                                                <?php
                                            $x = 1;
                                            $kafel=null;
                                            $member= null;
                                            foreach ($kafala_type as $value) {
                                                if($value->type == 0){
                                                  //  $max = sizeof($record->sub_storages);
                                                }else{
                                                  //  $max =$record->max ;
                                                }
                                                if ($value->type==1){
                                                    $kafel = "الكفلاء";

                                                }
                                                elseif($value->type==2){
                                                    $kafel ="المتبرعين" ;

                                                }
                                                if ($value->specialize_fk==1){
                                                    $member = "الأفراد";

                                                }
                                                elseif($value->specialize_fk==2){
                                                    $member ="الجهات و المؤسسات" ;

                                                }
                                            ?>
                                                <tr>
                                                    <td><?= $x++?></td>
                                                    <td><?=$kafel?></td>
                                                    <td><?=$member?></td>
                                                    <td><?=$value->title?></td>
                                                    <td> <label class="label  " style="background-color:<?=$value->color?>;padding: 5px 28px;"> </label></td>
                                                    <td>  <a href="<?php echo base_url().'all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$value->id."/fr_sponser_donor"  ?>" title="تعديل" >
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                        <a href="<?=base_url()."all_Finance_resource/settings/Finance_resource_settings/DeleteKafalaTypes/".$value->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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

<?php */ ?>
                        <!-- -------    - -انواع الكفالات والتبرعات----->

	   
	   <!-- -------    - -انواع الكفالات والتبرعات----->
                        <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "fr_sponser_donor") {echo  'active'; }  ?>" id="fr_sponser_donor">
                            <div class="panel-body">
                                <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                        <i class="fa fa-cog" aria-hidden="true"></i>انواع الكفالات و التبرعات </strong></a>
                                <div class="table-responsive">
                                    <?php
                                    if(isset($kafala_types) && !empty($kafala_types) && $kafala_types!=null){
                                        echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$kafala_types['id'].'/'. $typee);
                                    }
                                    else{
                                        echo form_open_multipart('all_Finance_resource/settings/Finance_resource_settings/AddSitting/fr_sponser_donor');
                                    }

                                    ?>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half">نوع الكافل_المتبرع </label>
                                        <input type="text" name="title"  class="form-control half input-style"  value="<?php if(isset($kafala_types)) echo $kafala_types['title'] ?>" autofocus data-validation="required">
                                     <!--   <input type="hidden" name="type_k" value="2"> -->
                                    </div>

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half">فئة</label>
                                       <select name ="type" class="form-control half input-style">
                                           <option>--اختر--</option>
                                           <option value="1" <?php if(isset($kafala_types) && !empty( $kafala_types['type'])&&  $kafala_types['type']==1){ echo 'selected' ;}?>>الكفلاء</option>
                                           <option value="2" <?php if(isset($kafala_types) && !empty( $kafala_types['type'])&&  $kafala_types['type']==2){ echo 'selected' ;}?>>المتبرعين</option>

                                       </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half">تخص</label>
                                        <select name ="specialize_fk" class="form-control half input-style">
                                            <option>--اختر--</option>
                                            <option value="1" <?php if(isset($kafala_types) && !empty( $kafala_types['specialize_fk'])&&  $kafala_types['specialize_fk']==1){ echo 'selected' ;}?>>الأفراد</option>
                                            <option value="2" <?php if(isset($kafala_types) && !empty( $kafala_types['specialize_fk'])&&  $kafala_types['specialize_fk']==2){ echo 'selected' ;}?>>الجهات و المؤسسات</option>

                                        </select>
                                    </div>

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label class="label label-green half">اللون المميز</label>
                                        <input type="color" name="color" value="<?php if(isset($kafala_types)) echo $kafala_types['color'] ?>" class="form-control half input-style" autofocus data-validation="required">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <button type="submit" name="fr_sponser_donor" value="fr_sponser_donor" class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                    </div>
                                    </form>
                                    <?php if (isset($kafala_type) && !empty($kafala_type) && $kafala_type !=null){ ?>
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                            <tr class="info">
                                                <th>م</th>
                                                <th> الفئة</th>
                                                <th>تخص</th>
                                                <th>نوع الكافل_المتبرع</th>
                                                <th>اللون المميز</th>
                                                <th>الإجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           <?php
                                            $x = 0;
                                            foreach($kafala_type as $record){$x++;

                                                ?>
                                                <tr>
                                                <td <?php if($record->count >1){ ?>rowspan="<?php echo $record->count ;?>" <? } ?>><?php echo $x?></td>
                                                <td <?php if($record->count >1){ ?>rowspan="<?php echo $record->count ;?>" <? } ?> ><?php echo$record->type_name;?> </td>
                                                <?php if(!empty($record->data_kafel)){ foreach ($record->data_kafel as $row){ ?>
                                                    <td <?php if(count($row->data_member) >1){ ?>rowspan="<?php echo count($row->data_member) ;?>" <? } ?> ><?php echo $row->specialize_name; ?></td>

                                                    <?php  if(!empty($row->data_member)){ foreach ($row->data_member as $row2){ ?>
                                                        <td><?php echo $row2->title; ?></td>
                                                        <td> <label class="label  " style="background-color:<?=$row2->color?>;padding: 5px 28px;"> </label></td>
                                                        <td>  <a href="<?php echo base_url().'all_Finance_resource/settings/Finance_resource_settings/UpdateSitting/'.$row2->id."/fr_sponser_donor"  ?>" title="تعديل" >
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                            <a href="<?=base_url()."all_Finance_resource/settings/Finance_resource_settings/DeleteKafalaTypes/".$row2->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                                <i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </td>

                                                        </tr>

                                                        <?php
                                                    }

                                                    }
                                                    ?>
                                                    <?php
                                                }
                                                } ?>

                                                <?php 
                                            } ?>


                                        

                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>


                        <!-- -------    - -انواع الكفالات والتبرعات----->



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



