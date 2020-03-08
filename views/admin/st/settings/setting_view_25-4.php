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
        color: #fff;
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
                    <div class="col-sm-2">
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

                            <li role="presentation" style="float: right; width: 50%;">
                                <a href="#tab_pro" aria-controls="tab_pro" role="tab" data-toggle="tab"><i
                                            class="fa fa-cog" aria-hidden="true"></i>احتياجات الأسرة </a>
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
                                            if (isset($record) && !empty($record) && $record != null) {
                                                echo form_open_multipart('st/settings/Setting/UpdateSitting/' . $id . '/' . $key);
                                            } else {
                                                echo form_open_multipart('st/settings/Setting/AddSitting/' . $key . '/' . $key);
                                            }
                                            ?>
                                            <div class="form-group col-sm-9 col-xs-12">
                                                <label class="label label-green half"> الإسم</label>
                                                <input type="text" name="title_setting"
                                                       value="<?php if (isset($record)) echo $record['title_setting'] ?>"
                                                       class="form-control half input-style" autofocus
                                                       data-validation="required">
                                                <input type="hidden" name="type_name" value=""/>
                                            </div>
                                            <div class="form-group col-sm-12 col-xs-12">
                                                <button type="submit" name="add" value="حفظ"
                                                        class="btn btn-purple w-md m-b-5"><span>
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ
                                                </button>
                                            </div>
                                            </form>
                                            <?php if (isset($all) && !empty($all) && $all != null) { ?>
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
                                                    if (isset($all[$key]) && !empty($all[$key]) && $all[$key] != null) {
                                                        foreach ($all[$key] as $value) {
                                                            ?>
                                                            <tr>
                                                                <td><?= ($x++) ?></td>
                                                                <td><?= $value->title_setting ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url() . 'st/settings/Setting/UpdateSitting/' . $value->id_setting . "/" . $key ?>"
                                                                       title="تعديل">
                                                                        <i class="fa fa-pencil-square-o"
                                                                           aria-hidden="true"></i> </a>
                                                                    <span> </span>
                                                                    <a href="<?= base_url() . "st/settings/Setting/DeleteSitting/" . $value->id_setting . "/" . $key ?>"
                                                                       onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                                        <i class="fa fa-trash"
                                                                           aria-hidden="true"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                    } else {
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
                                <?php $x++;
                            }
                        } ?>
                        <!--  2-4-om -->
                        <div class="tab-pane fade in <?php if (isset($typee) && !empty($typee) && $typee === "products") {
                            echo 'active';
                        } ?>" id="tab_pro">
                            <div class="panel-body">
                                <?php

                                $dis1 = 'disabled';
                                $dis2 = 'disabled';
                                if (!empty($products)) {
                                    $type = $products['from_id'];
                                    if ($type == 0) {
                                        $dis1 = '';
                                        $dis2 = 'disabled';
                                    } elseif ($products > 0) {
                                        $dis2 = '';
                                        $dis1 = 'disabled';
                                    }
                                }
                                ?>
                                <div class=" col-xs-12 text-center top_radio">
                                    <label class="checkbox-inline">
                                        <input type="radio" name="section"
                                               onclick="showFunction(1);" <?php if (isset($type)) {
                                            if ($type == 0) { ?> checked  <?php }
                                        } ?> value="1"/> الفئة </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="section"
                                               onclick="showFunction(2);" <?php if (isset($type)) {
                                            if ($type > 0) { ?> checked  <?php }
                                        } ?> value="2"/> الوصف </label>
                                </div>


                                <div class=" col-xs-12">
                                    <fieldset class="col-sm-6 col-xs-12" id="main_section" <?php echo $dis1; ?>>
                                        <div>
                                            <?php
                                            if (!empty($products)) {
                                                echo form_open_multipart("st/settings/Setting/UpdateSitting/" . $products['id'].'/products');
                                            } else {

                                                echo form_open_multipart("st/settings/Setting/AddSitting");
                                            } ?>

                                            <h5 class="title-top"> الفئة</h5>
                                            <div class="form-group col-sm-14 col-xs-12">
                                                <label class="label label-green  half"> الفئة </label>
                                                <input type="text" name="title"
                                                       value="<?php if (!empty($products['name']) && $type == 0) {
                                                           echo $products['name'];
                                                       } ?>" class="form-control half input-style" placeholder="الفئة"
                                                       data-validation="required"
                                                       aria-required="true">
                                            </div>
                                            <input type="hidden" name="level"
                                                   value="<?php if (!empty($products['level']) && $type == 0) {
                                                       echo $products['level'];
                                                   } else {
                                                       echo 1;
                                                   } ?>">

                                            <div class="col-md-12">
                                                <button type="submit" name="add_main_product"
                                                        class="btn btn-blue btn-next"
                                                        value="add_main_device">
                                                    حفظ
                                                </button>
                                            </div>
                                            <?php echo form_close() ?>
                                        </div>
                                    </fieldset>
                                    <fieldset class="col-sm-6 col-xs-12" id="sub_section" <?php echo $dis2; ?>>
                                        <?php
                                        if (!empty($products)) {
                                            echo form_open_multipart("st/settings/Setting/UpdateSitting/" . $products['id'].'/products');
                                        } else {

                                            echo form_open_multipart("st/settings/Setting/AddSitting");
                                        } ?>
                                        <h5 class="title-top"> الوصف</h5>
                                        <div class="form-group col-sm-14 col-xs-12">
                                            <label class="label label-green  half">اختار الفئة</label>
                                            <select id="from_id" name="from_id" data-validation="required"
                                                    class="form-control half selectpicker " aria-required="true"
                                                    data-show-subtext="true" data-live-search="true"
                                                    onchange="results()">
                                                <option value="">قم بالإختيار</option>
                                                <?php
                                                if (!empty($main_products)) {
                                                    foreach ($main_products as $sub) {
                                                        $select = '';
                                                        if (!empty($products)) {
                                                            if ($products['from_id'] == $sub->id) {
                                                                $select = 'selected';
                                                            }
                                                        }

                                                        echo '<option value="' . $sub->id . '" ' . $select . '>' . $sub->name . '</option>';
                                                    }
                                                } else {
                                                    ?>
                                                    <option value="">لاتوجدتصنيفات رئيسية</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-14 col-xs-12">
                                            <label class="label label-green  half"> الوصف</label>
                                            <input type="text" name="title"
                                                   value="<?php if (!empty($products['name']) && $type > 0) {
                                                       echo $products['name'];
                                                   } ?>" class="form-control half input-style" placeholder="الوصف"
                                                   data-validation="required"
                                                   aria-required="true">
                                        </div>

                                        <div id="results"></div>
                                        <div class="col-md-12">
                                            <button type="submit" name="add_sub_product" class="btn btn-blue btn-next"
                                                    value="add_sub_device">حفظ
                                            </button>
                                        </div>
                                        <?php echo form_close() ?>


                                        <!---------------------table--------------------->


                                    </fieldset>
                                </div>


                                <?php if (!empty($main_result_products)) { ?>
                                    <div class="col-sm-6">
                                        <br><br>
                                        <table id="" class="table table-striped table-bordered dt-responsive nowrap"
                                               cellspacing="0"
                                               width="100%">
                                            <thead>
                                            <tr class="info">
                                                <th class="text-center">م</th>
                                                <th class="text-center">الفئة</th>
                                                <th class="text-center">الاجراء</th>
                                                <th class="text-center">ربط بالدليل</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <?php $x = 1;
                                                foreach ($main_result_products

                                                as $record){

                                                ?>
                                                <td class="text-center"><?php echo $x; ?></td>
                                                <td class="text-center"><?php echo $record->name; ?></td>

                                                <td class="text-center">
                                                    <?php if ($record->count == 0) { ?>
                                                        <a href="<?php echo base_url(); ?>st/settings/Setting/UpdateSitting/<?php echo $record->id; ?>/products"><i
                                                                    class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"></i> </a>

                                                        <a onclick="$('#adele').attr('href', '<?= base_url() . "st/settings/Setting/DeleteSitting/" . $record->id.'/products' ?>');"
                                                           data-toggle="modal" data-target="#modal-delete"
                                                           title="حذف"> <i class="fa fa-trash"
                                                                           aria-hidden="true"></i> </a>
                                                    <?php } else { ?>
                                                        <a href="<?php echo base_url(); ?>st/settings/Setting/UpdateSitting/<?php echo $record->id; ?>/products"><i
                                                                    class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"></i> </a>
                                                        <button class="btn btn-sm btn-danger">لا يمكن الحذف</button>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (empty($record->rkm_hesab)){
                                                        ?>
                                                        <input type="hidden" name="modalID" id="modalID">

                                                        <input type="hidden" class="form-control testButton inputclass" name="rkm_hesab"
                                                               id="rkm_hesab<?= $record->id?>"
                                                               readonly="readonly"
                                                               onclick="$('#modalID').val(<?=$record->id ?>); "
                                                               ondblclick="$('#myModal').modal('show');"
                                                               style="cursor:pointer;border: white;color: black"
                                                               value="">
                                                        <button class="btn btn-warning"
                                                                id="dalel<?= $record->id?>"
                                                                onclick="$('#modalID').val(<?=$record->id ?>); "
                                                                ondblclick="$('#myModal').modal('show');"

                                                        >اضغط للربط بالدليل</button>
                                                    <?php
                                                    } else{
                                                        ?>

                                                        <input type="text" class="form-control testButton inputclass" name="rkm_hesab"
                                                               id="rkm_hesab<?= $record->id?>"
                                                               readonly="readonly"
                                                               onclick="$('#modalID').val(<?=$record->id ?>); "
                                                               ondblclick="$('#myModal').modal('show');"
                                                               style="cursor:pointer;border: white;color: black"
                                                               value="<?= $record->rkm_hesab?>">

                                                    <?php
                                                    }
                                                    ?>

                                                </td>
                                            </tr>


                                            <?php $x++;
                                            } ?>
                                            </tbody>
                                        </table>


                                    </div>
                                <?php } ?>




                                <?php if (!empty($sub_products)) { ?>
                                    <div class="col-sm-6">
                                        <br><br>
                                        <table id="" class="table table-striped table-bordered dt-responsive nowrap"
                                               cellspacing="0"
                                               width="100%">
                                            <thead>
                                            <tr class="info">
                                                <th class="text-center">م</th>
                                                <th class="text-center">الوصف</th>
                                                <th class="text-center">الفئة</th>
                                                <th class="text-center">الاجراء</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <?php $x = 1;
                                                foreach ($sub_products

                                                as $record){

                                                ?>
                                                <td class="text-center"><?php echo $x; ?></td>
                                                <td class="text-center"><?php echo $record->name; ?></td>
                                                <td class="text-center"><?php echo $record->wasf; ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url(); ?>st/settings/Setting/UpdateSitting/<?php echo $record->id; ?>/products"><i
                                                                class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>

                                                    <a onclick="$('#adele').attr('href', '<?= base_url() . "st/settings/Setting/DeleteSitting/" . $record->id .'/products'?>');"
                                                       data-toggle="modal" data-target="#modal-delete"
                                                       title="حذف"> <i class="fa fa-trash"
                                                                       aria-hidden="true"></i> </a>

                                                </td>
                                            </tr>


                                            <?php $x++;
                                            } ?>
                                            </tbody>
                                        </table>

                                    </div>

                                <?php } ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Dalel Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">الدليل المحاسبي </h4>
            </div>
            <div class="modal-body">
                <?php //if(!empty($tree)) {

                ?>
                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th style="font-size: 15px; width:88px !important; ">م</th>
                        <th style="font-size: 15px;" class="text-left">رقم الحساب</th>
                        <th style="font-size: 15px;" class="text-left">إسم الحساب</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($tree) && $tree != null) {
                        buildTreeTable($tree);
                    }
                    function buildTreeTable($tree, $count = 1)
                    {
                        $types = array(1 => 'رئيسي', 2 => 'فرعي');
                        $nature = array('', 'مدين', 'دائن');
                        $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
                        $colorArray = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');

                        foreach ($tree as $record) {
                            if ($record->hesab_no3 == 2) {
                            }
                            ?>
                            <tr style="background-color: <?= $colorArray[$record->level] ?>; cursor: pointer;"
                                onclick="update_hesab(<?= $record->hesab_no3?>,<?= $record->code?>)">
                                <td class="forTd"><?= $count++ ?></td>
                                <td class="forTd"><?= $record->code ?></td>
                                <td class="forTd"><?= $record->name ?></td>
                            </tr>
                            <?php
                            if (isset($record->subs)) {
                                $count = buildTreeTable($record->subs, $count++);
                            }
                        }
                        return $count;
                    }

                    ?>
                    </tbody>
                </table>
                <?php // } ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!--2-4-om  -->
<script type="text/javascript">
    $('.selectpicker').selectpicker('refresh');

    function showFunction(type) {
        $(".btn-default").removeClass("disabled");
        if (type == 1) {
            document.getElementById("main_section").removeAttribute("disabled", "disabled");
            document.getElementById("sub_section").setAttribute("disabled", "disabled");
        } else if (type == 2) {
            $(".disabled").removeClass("disabled");
            document.getElementById("sub_section").removeAttribute("disabled", "disabled");
            document.getElementById("main_section").setAttribute("disabled", "disabled");
        }
    }
</script>

<script>
    function results() {
        $('#results').html('');
        var e = document.getElementById("from_id");
        var from_id_value = e.options[e.selectedIndex].value;
        if (from_id_value != '') {
            var dataString = 'from_id_value=' + from_id_value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/settings/Setting/AddSitting',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#results').html(html);
                }
            });

        }
    }
</script>
<script>
    function update_hesab(hesab_no3,rkm_hesab) {

        $('#rkm_hesab'+$('#modalID').val()).val(rkm_hesab);
        var id = $('#modalID').val();

        if (hesab_no3 ==2){

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/settings/Setting/update_rkm_hesab',
            data: {id:id,rkm_hesab:rkm_hesab},
            dataType: 'html',
            cache: false,
            success: function () {

                $('#myModal').modal('hide');
                $('#rkm_hesab'+$('#modalID').val()).attr('type', 'text');
                $('#dalel'+$('#modalID').val()).hide();
                swal({
                    title:" تم الربط بالدليل" ,
                    confirmButtonText: "تم"
                });
            }
        });
        } else{
            alert('ليس حساب فرعي');
        }

    }
</script>
