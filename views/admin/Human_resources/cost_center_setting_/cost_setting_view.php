<style type="text/css">
    /*  ul.nav-tabs {
          background-color: #fff;
          border-bottom: 1px solid #eee;
          box-shadow: -2px 2px 3px 2px #999;
          margin-bottom: 5px;
      }*/
    .plus-btn{
        padding:6px 5px 5px 5px;
        background-color:green;
        color: #fff;
        border-radius: 50%;
    }
    .plus-btn:hover{
        color: #fff;
        border-radius: 0;
    }
    .bootstrap-select>.btn {
        width: 100%;
        padding-right: 8px;
    }
    a.details{
        padding: 4px;
        background-color: blue;
        color: #fff;
        cursor: pointer;
    }
    .modal-header{
        padding: 6px 5px;
    }
    .modal-header h4{
        color: #00310d;
    }
    .modal-header p{
        color: #555;
        margin-bottom: 0
    }
    .modal-body p{
        color: #555;
        font-size: 16px
    }
    .modal-body p span{
        color: #00310d;
        font-weight: 600
    }

    .tb-table tbody th, .tb-table tbody td,
    .tb-table tfoot td, .tb-table tfoot th {
        padding: 0px !important;
        text-align: center;
    }

    td input[type=radio] {
        height: 20px;
        width: 20px;
    }

</style>

<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">

        </div>
        <div class="panel-body" style="min-height: 300px;">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="<?php  if (isset($get_cost) && !empty($get_cost)){echo "active";} elseif (isset($active) && !empty($active)){ echo "active";}?>"><a href="#add_cost" aria-controls="reservation_orders" role="tab" data-toggle="tab">اضافة مراكز التكلفة</a></li>
                <li role="presentation" class="<?php  if (isset($get_markz) && !empty($get_markz)){ echo "active";} // elseif (isset($active) && !empty($active)){ echo "active";}?>"><a href="#tab_mrakz" aria-controls="tab_mrakz" role="tab" data-toggle="tab"> مراكز التكلفة </a></li>
            </ul>


            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade  <?php  if (isset($get_cost) && !empty($get_cost)){ echo "in active";}elseif (isset($active) && !empty($active)){ echo "in active";} ?>" id="add_cost">
                    <?php
                    if (isset($get_cost) && !empty($get_cost)){
                        echo form_open_multipart('human_resources/cost_center_setting/Setting/UpdateSetting/'.$get_cost->id_setting);
                        $title_setting = $get_cost->title_setting;
                        $in_order = $get_cost->in_order;

                    }else{
                        echo form_open_multipart('human_resources/cost_center_setting/Setting');
                        $title_setting = '';
                        $in_order = '';
                    }

                    ?>
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class=""> الإسم</label>
                            <input type="text" name="title_setting"
                                   value="<?= $title_setting ?>"
                                   class="form-control  input-style"  data-validation="required">

                            <input type="hidden" name="type_name" value=""/>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class=""> الترتيب</label>
                            <input type="text" name="in_order"
                                   value="<?= $in_order ?>" onkeypress="validate_number(event);"
                                   class="form-control  input-style"  data-validation="required">
                        </div>
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="col-cs-12 text-center">
                        <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add"   style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>

                    </div>
                    <?php
                    echo form_close();
                    ?>
                    <div  class="clearfix "></div><br>
                    <?php
                    if (isset($records) && !empty($records)){
                        $x = 1;
                        ?>
                        <table class="table example table-bordered table-striped table-hover">
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
                            foreach ($records as $record){
                                ?>
                                <tr>
                                    <td><?=($x++)?></td>
                                    <td><?php echo $record->in_order; ?></td>
                                    <td><?=$record->title_setting?></td>
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

                                            window.location="<?php echo base_url(); ?>human_resources/cost_center_setting/Setting/UpdateSetting/<?php echo $record->id_setting; ?>";
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
                                            window.location="<?php echo base_url(); ?>human_resources/cost_center_setting/Setting/DeleteSetting/<?php echo $record->id_setting; ?>";
                                            });'>
                                            <i class="fa fa-trash"> </i></a>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>

                </div>
                <div role="tabpanel" class="tab-pane fade <?php  if (isset($get_markz) && !empty($get_markz)){ echo "in active";}?> " id="tab_mrakz">

                    <?php
                    if (isset($get_markz) && !empty($get_markz)){
                        echo form_open_multipart('human_resources/cost_center_setting/Setting/Update_markz/'.$get_markz->id);
                        $markz_id_fk = $get_markz->markz_id_fk;
                        $band_id_fk = $get_markz->band_id_fk;
                        $rkm_hesab = $get_markz->rkm_hesab;
                        $hesab_name = $get_markz->hesab_name;

                    }else{
                        echo form_open_multipart('human_resources/cost_center_setting/Setting');
                        $markz_id_fk = '';
                        $band_id_fk = '';
                        $rkm_hesab = '';
                        $hesab_name = '';
                    }

                    ?>
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group col-sm-3 ">
                            <label class="">  مراكز التكلفة </label>
                            <select class="form-control " name="markz_id_fk"  data-validation="required" >
                                <option value="">اختر</option>
                                <?php
                                if (isset($records) && !empty($records)){
                                    foreach ($records as $row){
                                        ?>
                                        <option value="<?= $row->id_setting?>" <?php if ($markz_id_fk==$row->id_setting){ echo 'selected';}?>><?= $row->title_setting?></option>
                                <?php
                                    }
                                }
                                ?>

                            </select>

                        </div>
                        <div class="form-group col-sm-3 ">
                            <label class=""> اسم الاستحقاق / الاستقطاع </label>
                            <select class="form-control " name="band_id_fk"  data-validation="required" >
                                <option value="">اختر</option>
                                <?php
                                if (isset($bdlat) && !empty($bdlat)){
                                    foreach ($bdlat as $bdl){

                                        ?>


                                        <option value="<?= $bdl->id?>" <?php if ($band_id_fk==$bdl->id){ echo 'selected';}?>><?= $bdl->title?></option>
                                        <?php
                                    }
                                }

                                        if (isset($get_markz->band_id_fk) && !empty($get_markz->band_id_fk)){
                                            ?>
                                <option value="<?= $get_markz->band_id_fk?>" selected><?= $get_markz->band_name?></option>
                                <?php
                                }
                                ?>

                            </select>

                        </div>
                        <div class="form-group col-sm-3 ">
                            <label class=""> كود الحساب </label>
                            <input type="hidden" name="modalID" id="modalID">

                            <input type="text" class="form-control  testButton inputclass" name="rkm_hesab"
                             data-validation="required" 
                                   id="rkm_hesab"
                                   readonly="readonly"
                                   onclick="$('#modalID').val(); "
                                   ondblclick="$('#myModal').modal('show');"
                                   style="cursor:pointer;border: white;color: black;width: 225px;float: right;"
                                   value="<?= $rkm_hesab?>">
                            <button type="button"  onclick="$('#myModal').modal('show');" class="btn btn-success btn-next" style="float: right;">
                                <i class="fa fa-plus"></i></button>
                        </div>
                        <div class="form-group col-sm-3 ">
                            <label class=""> اسم الحساب </label>
                            <input type="text" class="form-control  testButton inputclass" name="hesab_name"
                             data-validation="required" 
                                   id="hesab_name"
                                   readonly="readonly"
                                   style="cursor:pointer;border: white;color: black"
                                   value="<?= $hesab_name?>">
                        </div>


                    </div>
                    <div class="clearfix"></div><br>

                    <div class="col-cs-12 text-center">
                        <button type="submit"  class="btn btn-labeled btn-success " name="save" value="save"   style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>

                    </div>
                    <?php
                    echo form_close();
                    ?>
                    <div  class="clearfix "></div><br>
                    <?php
                    if (isset($all_mrakz) && !empty($all_mrakz)){
                        $x = 1;
                        ?>
                        <table class="table example table-bordered table-striped table-hover">
                            <thead>
                            <tr class="info">
                                <th>م</th>
                                <th > مركز التكلفة </th>
                                <th > اسم الاستحقاق / الاستقطاع </th>
                                <th > كود الحساب </th>
                                <th > اسم  الحساب </th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($all_mrakz as $all){
                                ?>
                                <tr>
                                    <td><?=$x++?></td>
                                    <td><?php echo $all->markz_name; ?></td>
                                    <td><?=$all->band_name?></td>
                                    <td><?=$all->rkm_hesab?></td>
                                    <td><?=$all->hesab_name?></td>
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

                                            window.location="<?php echo base_url(); ?>human_resources/cost_center_setting/Setting/Update_markz/<?php echo $all->id; ?>";
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
                                            window.location="<?php echo base_url(); ?>human_resources/cost_center_setting/Setting/DeleteMarkzSetting/<?php echo $all->id; ?>";
                                            });'>
                                            <i class="fa fa-trash"> </i></a>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>



                </div>
                </div>
        </div>
    </div>
</div>

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
                                onclick="update_rkm_hesab(<?= $record->hesab_no3?>,<?= $record->code?>,'<?= $record->name?>')">
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

<script>
    function update_rkm_hesab(hesab_no3,rkm_hesab,hesab_name) {

        if (hesab_no3 ==2){

        $('#rkm_hesab').val(rkm_hesab);
        $('#hesab_name').val(hesab_name);
        $('#myModal').modal('hide');
    } else{
        alert('ليس حساب فرعي');
    }


    }
</script>