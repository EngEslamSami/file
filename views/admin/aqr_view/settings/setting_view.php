<style>
    .panel-body {
        padding: 15px;
    }

    .tab-content .panel-body {
        background: #fff;
        border: 1px solid gray;
        border-radius: 2px;
        padding: 10px;
        position: relative;
    }

    .tabs-left > li.active > a, .tabs-left > li.active > a:hover, .tabs-left > li.active > a:focus {
        border-bottom-color: #009688;
        border-right-color: #009688;
        background-color: #009688;
        color: #fff;
    }

    .nav > li > a:hover, .nav > li > a:focus {
        text-decoration: none;
        background-color: #eee;
        color: #0f0f0f;
    }

    .tabs-left > li.active > a, .tabs-left > li.active > a:hover, .tabs-left > li.active > a:focus {
        border-bottom-color: #009688;
        border-right-color: #009688;
        background-color: #009688;
        color: #fff !important;
    }

    ul.nav-tabs.holiday-month {
        border: 1px solid gray;
        height: 590px;
        overflow: scroll;
    }

    .nav-tabs > li > a:hover {
        border-color: #eee #eee #ddd;
    }

    ul.nav-tabs.holiday-month > li > a {
        color: #222;
        font-weight: 600;
        padding: 5px 5px;
        font-size: 13px;
    }
</style>

<section>

    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">

                <h4 class="panel-title"><?php echo $title ; ?></h4>

            </div>
            <div class="panel-body">
                <div class="col-sm-2 padding-4">
                    <ul class="nav nav-tabs tabs-left holiday-month" style="    border: 1px solid gray;">
                        <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray != null) {
                            $x = 0;
                            foreach ($this->myarray as $key => $value) {
                                ?>
                                <?php if (isset($typee) && !empty($typee) && $typee) {
                                    $active = "";
                                    if ($typee == $key) {
                                        $active = 'active';
                                        $value = $value;
                                    }
                                } ?>
                                <li class="<?php if (isset($typee) && !empty($typee) && $typee) {
                                    echo $active;
                                } else {
                                    echo ($x == 0) ? 'active' : '';
                                } ?>">
                                    <a <?php if (isset($record)) {
                                    } else {
                                        echo 'href="#tab' . $key . '"';
                                    } ?> data-toggle="tab">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        <?= $value ?></a></li>
                                <?php $x++;
                            }
                        } ?>
                        <li   >
                            <a   href="#tab_contract"; aria-controls="tab_contract" role="tab" data-toggle="tab"  ><i class="fa fa-cog" aria-hidden="true"></i>   شروط وأحكام العقد </a>
                        </li>



                    </ul>
                </div>
                <!-- Tab panels -->
                <div class="tab-content col-sm-10">
                    <?php if (isset($this->myarray) && !empty($this->myarray) && $this->myarray != null) {
                        $x = 0;
                        foreach ($this->myarray as $key => $value) {
                            ?>
                            <?php if (isset($typee) && !empty($typee) && $typee) {
                                $active = "";
                                if ($typee == $key) {
                                    $active = 'active';
                                    $value = $value;
                                }
                            } ?>
                            <div class="tab-pane fade in <?php if (isset($typee) && !empty($typee)) {
                                echo $active;
                            } else {
                                echo ($x == 0) ? 'active' : '';
                            } ?>" id="tab<?= $key ?>">
                                <div class="panel-body">
                                    <a href="#" class="btn btn-add btndate" data-toggle="modal"
                                       data-target="#addholiday" style="margin-bottom: 6px;"> <strong>
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                            <?= $value ?>
                                        </strong></a>
                                    <div class="table-responsive">
                                        <?php
                                        if (isset($get_setting) && !empty($get_setting)) {
                                            $title_setting = $get_setting->title_setting;
                                            $color = $get_setting->color;
                                            echo form_open_multipart('aqr/settings/Setting/UpdateSitting/' . $id . '/' . $key);
                                        } else {
                                            $title_setting = '';
                                            $color = '';
                                            echo form_open_multipart('aqr/settings/Setting/AddSitting/' . $key . '/' . $key);
                                        }
                                        ?>
                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label "> <?php
                                                if ($key ==1){
                                                    echo 'اسم الوحدة';
                                                } elseif ($key==2){
                                                    echo 'اسم الحالة' ;
                                                }
                                                ?></label>
                                            <input type="text" name="title_setting"
                                                   value="<?= $title_setting?>"
                                                   class="form-control " autofocus
                                                   data-validation="required">
                                            <input type="hidden" name="type_name" value="<?=$value?>">

                                        </div>
                                        <div class="form-group col-sm-4 col-xs-12">
                                            <label class="label "> اللون المميز</label>
                                            <input type="color" name="color"
                                                   value="<?= $color?>"
                                                   class="form-control " autofocus
                                                   data-validation="required">

                                        </div>
                                        <div class="form-group col-sm-12 col-xs-12 text-center">
                                            <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add"  >
                                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                            </button>
                                        </div>
                                        </form>
                                        <?php if (isset($all) && !empty($all) && $all != null) { ?>
                                            <table class="table example table-bordered table-striped table-hover">
                                                <thead>
                                                <tr class="greentd">
                                                    <th>م</th>
                                                    <th><?php
                                                        if ($key ==1){
                                                            echo 'اسم الوحدة';
                                                        } elseif ($key==2){
                                                            echo 'اسم الحالة' ;
                                                        }
                                                        ?></th>
                                                    <th>اللون المميز</th>
                                                    <th>الإجراء</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $x = 1;
                                                if (isset($all[$key]) && !empty($all[$key]) && $all[$key] != null) {
                                                    foreach ($all[$key] as $value) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $x++ ?></td>
                                                            <td><?= $value->title_setting ?></td>
                                                            <td>
                                                                <i class="fa fa-square " aria-hidden="true" style="color: <?= $value->color?>"></i>
                                                            </td>
                                                            <td>
                                                                <a href="#" onclick='swal({
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

                                                                        window.location="<?php echo base_url().'aqr/settings/Setting/UpdateSitting/'.$value->id_setting . "/" . $key ?>";
                                                                        });'>
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                                                <a href="#" onclick='swal({
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
                                                                        window.location="<?= base_url()."aqr/settings/Setting/DeleteSitting/" . $value->id_setting . "/" . $key ?>";
                                                                        });'>
                                                                    <i class="fa fa-trash"> </i></a>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } else {
                                                    echo '<tr>
                                                    <td style="text-align: center;" colspan="4"> لا يوجد بيانات </td>
                                                    </tr>';
                                                } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php $x++;
                        }
                    } ?>
                    <!-- ----------------------Contracts----------------------- -->


                    <div class="tab-pane fade in <?php if(isset($typee) && !empty($typee)&& $typee === "tab_contract") {echo  'active'; }  ?>" id="tab_contract">
                        <div class="panel-body">
                            <a href="#" class="btn btn-add btndate" data-toggle="modal" data-target="#addholiday"
                               style="margin-bottom: 6px;"> <strong>
                                    <i class="fa fa-cog" aria-hidden="true"></i>  شروط وأحكام العقد</strong></a>
                            <div class="table-responsive">
                                <?php
                                if(isset($get_contract) && !empty($get_contract)){

                                    echo form_open_multipart('aqr/settings/Setting/Update_contract/'.$get_contract->id.'/tab_contract');
                                    $contract_name = $get_contract->contract_name;
                                    $contract_type_fk = $get_contract->contract_type_fk;
                                    $content = $get_contract->content;


                                }
                                else{

                                    echo form_open_multipart('aqr/settings/Setting/AddSitting/'.'tab_contract/'. 0);
                                    $contract_name = '';
                                    $contract_type_fk = '';
                                    $content = '';
                                }
                                ?>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label">  اسم العقد</label>
                                    <input type="text" name="contract_name" id="contract_name"
                                           class="form-control "
                                           data-validation="required"
                                           value="<?= $contract_name?>">

                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label"> نوع العقد</label>
                                    <select class="form-control selectpicker " name="contract_type_fk" data-show-subtext="true" data-live-search="true" data-validation="required">
                                        <option value="">اختر</option>

                                        <?php
                                      $types_arr=  array('1'=>' ايجار وقف');
                                        foreach ($types_arr as $key=>$value){
                                            ?>
                                            <option value="<?= $key?>"
                                                <?php
                                                if ($contract_type_fk==$key){
                                                    echo 'selected';
                                                }
                                                ?>
                                            ><?= $value?></option>
                                            <input type="hidden" name="contract_type_n" value="<?= $value?>">
                                        <?php
                                        }
                                        ?>

                                    </select>


                                </div>
                                <div class="form-group  col-xs-12">
                                    <label class="label"> المحتوي</label>
                                    <textarea id="editor" class="form-control" name="content"   data-validation="required" ><?= $content?></textarea>

                                </div>


                                <div class="form-group col-sm-12 col-xs-12 text-center">
                                    <button type="submit" name="add_contract" value="حفظ" class="btn btn-labeled btn-success"><span>
                                             <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>

                                </div>
                                <?php
                                echo form_close();
                                ?>
                                <?php if (isset($contracts) && !empty($contracts) && $contracts !=null){ ?>
                                    <table class="table table-bordered table-striped table-hover example">
                                        <thead>
                                        <tr class="info">
                                            <th>م</th>
                                            <th>اسم العقد</th>
                                            <th> النوع</th>
                                            <th>  المحتوي</th>
                                            <th>الاجراء</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        if (isset($contracts) && !empty($contracts) && $contracts !=null){
                                            $x = 1;
                                            foreach ($contracts as $row) {
                                                ?>
                                                <tr>
                                                    <td><?= $x++?></td>
                                                    <td><?= $row->contract_name?></td>
                                                    <td><?= $row->contract_type_n?></td>

                                                    <td>
                                                        <a data-toggle="modal" data-target="#detailsModal<?= $row->id?>" class="btn btn-xs btn-info" style="padding:1px 5px;" >
                                                            <i class="fa fa-list "></i></a>

                                                    </td>
                                                    <td>
                                                        <a href="#" onclick='swal({
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
                                                                window.location="<?php echo base_url().'aqr/settings/Setting/Update_contract/'.$row->id.'/tab_contract' ?>";
                                                                });'>
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a href="#" onclick='swal({
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
                                                                window.location="<?=base_url()."aqr/settings/Setting/Delete_contract/tab_contract/".$row->id?>";
                                                                });'>
                                                            <i class="fa fa-trash"> </i></a>

                                                    </td>
                                                </tr>
                                            <?php }
                                        }else{
                                            echo '<tr>
                                                    <td colspan="5" style="text-align: center;color: red;"> لايوجد بيانات </td>
                                                    </tr>';
                                        } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    if (isset($contracts) && !empty($contracts)){
                    foreach ($contracts as $contract){
                    ?>
                    <div class="modal fade" id="detailsModal<?= $contract->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document" style="width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" style="text-align: center;">المحتوي</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xs-12">

                                        <p style="display: inline-block"><?=nl2br($contract->content) ?> </p>
                                        <br>
                                    </div>

                                </div>
                                <div class="modal-footer" style="display: inline-block;width: 100%;">



                                    <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                                        <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>

                        <?php
                    }
                    }
                    ?>



                </div>
            </div>
        </div>
    </div>

</section>
