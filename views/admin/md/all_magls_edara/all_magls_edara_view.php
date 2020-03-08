<style type="text/css">
    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>
<style type="text/css">
    .top-label {
        font-size: 14px;
        font-weight: 500;
        position: relative;

    }

    .right-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        right: 10px;
        top: 1px;
    }

    .left-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        left: 10px;
        top: 1px;
    }

    button[type=submit] {

        background-color: #3c990b;
        border: 1px solid transparent;
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border-radius: 4px;
        padding-top: 0;
        padding-bottom: 0;
    }

    td .btn-sm, .btn-group-sm > .btn {
        padding: 2px 5px;
        width: 55px;
    }

</style>
<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel  lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?></h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-9  no-padding">
                <?php
                if (isset($one_data) && (!empty($one_data))) {
                    echo form_open_multipart(base_url() . 'md/all_magls_edara/All_magls_edara/update/' . base64_encode($one_data->id));
                    $mg_code = $one_data->mg_code;
                    $qrar_rkm = $one_data->qrar_rkm;
                    $ta3en_date_m = $one_data->ta3en_date_m;
                    $ta3en_date_h = $one_data->ta3en_date_h;
                    $end_date_m = $one_data->end_date_m;
                    $end_date_h = $one_data->end_date_h;
                    $qrar_mgls_morfaq = $one_data->qrar_mgls_morfaq;
                    $suspend = $one_data->suspend;
                    $reason = $one_data->reason;


                } else {
                    echo form_open_multipart(base_url() . 'md/all_magls_edara/All_magls_edara');
                    $mg_code = '';
                    $qrar_rkm = '';
                    $ta3en_date_m = '';
                    $ta3en_date_h = '';
                    $end_date_m = '';
                    $end_date_h = '';
                    $qrar_mgls_morfaq = '';
                    $suspend = '';
                    $reason = '';

                } ?>
                <div class="col-sm-12">
                    <div class="form-group col-sm-2 padding-4">
                        <label class="label">كود المجلس </label>
                        <input type="text" class="form-control " value="<?= $mg_code ?>" readonly/>
                    </div>
                    <div class="form-group col-md-3 col-xs-12 padding-4">

                        <label class="label" style="text-align: center !important;">
                            <img style="width: 18px;float: right;"
                                 src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon3.png">
                            تاريخ التعيين
                            <img style="width: 18px;float: left;"
                                 src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon6.png">
                        </label>
                        <div id="cal-start-2">
                            <input id="start_data_h" name="ta3en_date_h" class="form-control  "
                                   type="text"
                                   onfocus="showCalstart2();" value=""
                                   style=" width: 50%;float: right"/>

                        </div>
                        <div id="cal-start-1">
                            <input id="start_data_m" name="ta3en_date_m" class="form-control   "
                                   type="text" onfocus="showCalstart1();" value=""
                                   style=" width: 50%;float: right"/>
                        </div>
                    </div>
                    <div class="form-group col-sm-3 padding-4">
                        <label class="label">رقم قرار التعيين </label>
                        <input type="text" class="form-control " name="qrar_rkm" value="<?= $qrar_rkm ?>"/>
                    </div>
                    <div class="form-group col-md-4 col-xs-12 padding-4">

                        <label class="label" style="text-align: center !important;">
                            <img style="width: 18px;float: right;"
                                 src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon3.png">
                            تاريخ الإنتهاء
                            <img style="width: 18px;float: left;"
                                 src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon6.png">
                        </label>
                        <div id="cal-start-3">
                            <input id="end_data_h" name="end_date_h" class="form-control   "
                                   type="text"
                                   onfocus="showCalend2();" value=""
                                   style=" width: 50%;float: right"/>

                        </div>


                        <div id="cal-start-4">
                            <input id="end_data_m" name="end_date_m" class="form-control   "
                                   type="text" onfocus="showCalend1();" value=""
                                   style=" width: 50%;float: right"/>
                        </div>
                    </div>
                    <div class="form-group col-sm-3 padding-4">
                        <label class="label">صورة قرار المجلس </label>
                        <input type="file" class="form-control " name="qrar_mgls_morfaq"
                               onchange="set_img_magles(this);" value="<?= $qrar_mgls_morfaq ?>">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">حالة المجلس</label>
                        <!--<select name="suspend" onchange="get_status()" id="magles_status_fk" class="form-control"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php $status_arr = array(0 => 'غير نشط', 1 => 'نشط');
                            foreach ($status_arr as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"
                                    <?php if ($key == $suspend) {
                                        echo 'selected';
                                    }
                                    ?> > <?php echo $value; ?></option>
                                <?php
                            } ?>
                        </select>-->
                         <select name="suspend" onchange="get_status()" id="magles_status_fk" class="form-control"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php $status_arr = array(1 => 'نشط', 0 => 'غير نشط');
                            foreach ($status_arr as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"
                                    <?php if (!empty($suspend)) {
                                        if ($key == $suspend) {
                                            echo 'selected';
                                        }
                                    }
                                    ?> > <?php echo $value; ?></option>
                                <?php
                            } ?>
                        </select>
                        
                        
                    </div>
                    <?php if (($suspend == 1)) {
                        $display = 'none';

                    } elseif ($suspend == 0) {
                        $display = 'block';

                    } else {
                        $display = 'none';

                    } ?>
                    <!--   <div class="form-group col-md-3 col-sm-6 padding-4" id="reason_div"
                         style="display: <?= $display ?>">
                        <label class="label ">السبب</label>
                        <textarea name="magles_status_reason" id="magles_status_reason" class="form-control reason"
                                  cols="30" rows="2"><?= $reason ?></textarea>
                    </div>-->

                    <div class="form-group col-md-4 col-sm-6 padding-4" id="reason_div"
                         style="display: <?= $display ?>">
                        <label class="label  ">السبب</label>
                        <input type="text" name="odwia_status_reason" id="odwia_status_reason" value="<?= $reason ?>"
                               class="form-control testButton inputclass"
                               style="cursor:pointer; width:79%;float: right;" autocomplete="off"
                               ondblclick="$(this).attr('readonly','readonly'); $('#Modal_family').modal('show');"
                               onblur="$(this).attr('readonly','readonly')"
                               onkeypress="return isNumberKey(event);"
                               readonly>

                        <button type="button" data-toggle="modal" data-target="#Modal_family"
                        onclick="get_details_reason()"
                                class="btn btn-success btn-next" style="float: right;">
                            <i class="fa fa-plus"></i></button>
                    </div>


                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn-success btn-labeled btn" name="btn" value="1">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                </div>
                <?php echo form_close() ?>
            </div>

            <div class="col-sm-3 ">

                <label class="label">صورة قرار المجلس</label>
                <?php
                if (!empty($qrar_mgls_morfaq)) {
                    $type = pathinfo($qrar_mgls_morfaq)['extension'];
                    $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                    $arr_doc = array('DOC', ' DOCX', 'HTML  ', 'HTM', 'ODT', 'PDF', 'XLS ', ' XLSX', 'ODS', 'PPT  ', 'PPTX', 'TXT');
                    if (in_array($type, $arry_images)) {
                        ?>
                        <img data-toggle="modal"
                             data-target="#myModal2"
                             onclick="$('#my_image').attr('src',$(this).attr('src'));"
                             id="magles_image" class="media-object center-block"
                             src="<?php if (!empty($qrar_mgls_morfaq)) {
                                 echo base_url() . 'uploads/md/magls_edara/' . $qrar_mgls_morfaq;
                             } else {
                                 echo base_url('asisst/fav/apple-icon-120x120.png');
                             } ?>"
                             style="width: 100px;height: auto;"/>
                        <?php
                    } elseif (in_array(strtoupper($type), $arr_doc)) {
                        ?>
                        <iframe src="https://docs.google.com/gview?url=<?= base_url() . 'uploads/md/magls_edara/' . $qrar_mgls_morfaq ?>&embedded=true"
                                frameborder="0" width="100%"></iframe>


                        <div class="col-sm-12">
                            <a target="_blank"
                               href="https://docs.google.com/gview?url=<?= base_url() . 'uploads/md/magls_edara/' . $qrar_mgls_morfaq ?>&embedded=true"><i
                                        class="col-sm-2 fa fa-eye"></i></a>
                            <div class="col-sm-8">

                            </div>
                            <a href="<?php echo base_url() . 'md/all_magls_edara/All_magls_edara/read_file/' . $qrar_mgls_morfaq ?>"
                               target="_blank">
                                <i class="col-sm-2 fa fa-download"></i></a>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <img data-toggle="modal"
                         data-target="#myModal2"
                         onclick="$('#my_image').attr('src',$(this).attr('src'));"
                         id="magles_image" class="media-object center-block"
                         src=""
                         style="width: 100px;height: auto;"/>
                <?php }
                ?>
            </div>

        </div>
    </div>

</div>
<?php if (isset($all_data) && $all_data != null) { ?>
    <div class="col-sm-12 no-padding ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات المجالس</h3>
            </div>
            <div class="panel-body">

                <div class="col-xs-12  no-padding">

                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                           cellspacing="0" width="100%">
                        <thead>
                        <tr class="greentd">
                            <th class="text-center">م</th>
                            <th class="text-center" style="width:80px;">كود المجلس</th>
                            <th class="text-center" style="width:80px;">رقم التعيين</th>
                            <th class="text-center">تاريخ التعيين</th>
                            <th class="text-center">تاريخ الانتهاء</th>
                            <th class="text-center">حالة المجلس</th>
                            <th class="text-center">التفاصيل</th>
                               <th>صوره القرار</th>
                            <th class="text-center">الإجراءات</th>


                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php $a = 1;
                        foreach ($all_data as $key => $record) {
                            if ($record->suspend == 1) {
                                $class = 'manage-run';
                                $title = 'نشط';
                                $bt_class = 'success';
                                $set = 0;
                            } elseif ($record->suspend == 0) {
                                $class = 'manage-work';
                                $title = 'غير نشط';
                                $bt_class = 'danger';
                                $set = 1;
                            } ?>
                            <tr>
                                <td><?php echo ++$key ?> </td>
                                <td><?php echo $record->mg_code ?> </td>

                                <td><?php echo $record->qrar_rkm ?></td>
<?php
/* $record->ta3en_date_m = explode('/', $record->ta3en_date_m)[2] . '/' . explode('/', $record->ta3en_date_m)[1] . '/' . explode('/', $record->ta3en_date_m)[0];
$record->ta3en_date_h = explode('/', $record->ta3en_date_h)[2] . '/' . explode('/', $record->ta3en_date_h)[1] . '/' . explode('/', $record->ta3en_date_h)[0];
$record->end_date_m = explode('/', $record->end_date_m)[2] . '/' . explode('/', $record->end_date_m)[1] . '/' . explode('/', $record->end_date_m)[0];
$record->end_date_h = explode('/', $record->end_date_h)[2] . '/' . explode('/', $record->end_date_h)[1] . '/' . explode('/', $record->end_date_h)[0]; 
*/
?>

<?php 
$record->ta3en_date_m = explode('/', $record->ta3en_date_m)[2] . '/' . explode('/', $record->ta3en_date_m)[0] . '/' . explode('/', $record->ta3en_date_m)[1];
$record->ta3en_date_h = explode('/', $record->ta3en_date_h)[2] . '/' . explode('/', $record->ta3en_date_h)[1] . '/' . explode('/', $record->ta3en_date_h)[0];
$record->end_date_m = explode('/', $record->end_date_m)[2] . '/' . explode('/', $record->end_date_m)[0] . '/' . explode('/', $record->end_date_m)[1];
$record->end_date_h = explode('/', $record->end_date_h)[2] . '/' . explode('/', $record->end_date_h)[1] . '/' . explode('/', $record->end_date_h)[0]; ?>




                              
                                <td onclick=" var arr_time=['<?= $record->ta3en_date_h ?>','<?= $record->ta3en_date_m ?>'];
                                        change_time(this, arr_time)"><?= $record->ta3en_date_m . ' م ' ?></td>
                                <td onclick=" var arr_time=['<?= $record->end_date_h ?>','<?= $record->end_date_m ?>'];
                                        change_time(this, arr_time)"><?= $record->end_date_m . ' م ' ?></td>


                                <td>
                                    <a>
                                        <button type="button"
                                                class="btn btn-sm btn-<?php echo $bt_class ?>"><?php echo $title ?></button>
                                    </a></td>

                                <td>
                                    <i onclick="get_details(<?= $record->id ?>,<?= $record->qrar_rkm ?>)"
                                       class="fa fa-search-plus" aria-hidden="true"
                                       data-toggle="modal"
                                       data-target="#myModal"></i>
                                </td>
                                 <td>
                                <i onclick="get_image(<?= $record->id ?>,<?= $record->qrar_rkm ?>)"
                                       class="fa fa-eye" aria-hidden="true"
                                       data-toggle="modal"
                                       data-target="#myModal3"></i>
                                </td>
                                
                                
                                
                                <?php if ($record->suspend == 1) { ?>
                                    <td class="text-center">
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
                                                window.location="<?= base_url() . 'md/all_magls_edara/All_magls_edara/update/' . base64_encode($record->id) ?>";
                                                });'>
                                            <i class="fa fa-pencil"> </i></a>

                                        <?php if ($record->count_member <= 0) { ?>
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
                                                    setTimeout(function(){window.location="<?= base_url() . 'md/all_magls_edara/All_magls_edara/delete/' . base64_encode($record->id) ?>";}, 500);
                                                    });'>
                                                <i class="fa fa-trash"> </i></a>
                                        <?php } ?>


                                    </td>
                                <?php } else { ?>
                                    <td class="text-center">
                                        <span class="label label-danger text-center">عذرا لا يمكنك التعديل والحذف </span>
                                    </td>
                                <?php } ?>
                            </tr>

                            <?php $a++;
                        } ?>


                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>
<?php } ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> جميع التفاصيل المتعلقة بالمجلس رقم:
                    <span id="pop_rkm"></span>
                </h4>
            </div>

            <div class="modal-body">
                <div id="magles_details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <img id="my_image" src="" width="100%" height="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" style="float: left"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="Modal_family" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> الاسباب </h4>
            </div>
            <div class="modal-body">


                <div id="geha_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة سبب
                                    ايقاف العضويه
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">السبب </label>
                                    <input type="text" name="reason" id="reason" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add" style="display: block;">
                                    <button type="button" onclick="add_geha($('#reason').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha"><br><br>
                      
                      <!--
                        <?php
                        //  echo '<pre>'; print_r($reasons_settings);

                        if (!empty($reasons_settings)) { ?>
                            <table id="" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <th width="2%">#</th>
                                    <th class="text-center">السبب</th>

                                    <th class="text-center">الإجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($reasons_settings as $value) {
                                    ?>
                                    <tr>
                                        <td><input type="radio" name="radio" data-title="<?= $value->id ?>"
                                                   id="radio"
                                                   ondblclick="getTitle('<?php echo $value->reason; ?>')">
                                        </td>
                                        <td><?= $value->reason ?></td>

                                        <td>

                                            <a href="#" onclick="delte_geha(<?= $value->id ?>);"> <i
                                                        class="fa fa-trash"> </i></a>

                                            <a href="#" onclick="update_reason(<?= $value->id ?>);"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>


                        <?php } else { ?>

                            <div class="alert alert-danger">لاتوجد بيانات !!</div>
                        <?php } ?>
-->
                    </div>
                    
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>



                                
<!-- yara -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
            <div id="magles_images"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" style="float: left"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>
    var loop = 0;

    var calstart1 = new Calendar(),
        calstart2 = new Calendar(true, 0, true, true),
        datestart1 = document.getElementById('start_data_m'),
        datestart2 = document.getElementById('start_data_h'),
        calstart1Mode = calstart1.isHijriMode(),
        calstart2Mode = calstart2.isHijriMode();


    datestart1.setAttribute("value", calstart1.getDate().getDateString());
    datestart2.setAttribute("value", calstart2.getDate().getDateString());

    document.getElementById('cal-start-1').appendChild(calstart1.getElement());
    document.getElementById('cal-start-2').appendChild(calstart2.getElement());


    calstart1.show();
    calstart2.show();
    setDateFieldsstart1();


    calstart1.callback = function () {
        if (calstart1Mode !== calstart1.isHijriMode()) {
            calstart2.disableCallback(true);
            calstart2.changeDateMode();
            calstart2.disableCallback(false);
            calstart1Mode = calstart1.isHijriMode();
            calstart2Mode = calstart2.isHijriMode();
        } else

            calstart2.setTime(calstart1.getTime());
        setDateFieldsstart1();
    };

    calstart2.callback = function () {
        if (calstart2Mode !== calstart2.isHijriMode()) {
            calstart1.disableCallback(true);
            calstart1.changeDateMode();
            calstart1.disableCallback(false);
            calstart1Mode = calstart1.isHijriMode();
            calstart2Mode = calstart2.isHijriMode();
        } else

            calstart1.setTime(calstart2.getTime());
        setDateFieldsstart1();
    };


    calstart1.onHide = function () {
        calstart1.show(); // prevent the widget from being closed
    };

    calstart2.onHide = function () {
        calstart2.show(); // prevent the widget from being closed
    };


    function setDateFieldsstart1() {
        // datestart1.value = calstart1.getDate().getDateString();
        // datestart2.value = calstart2.getDate().getDateString();
        if (loop == 0) {
            <?php  if (isset($one_data) && !empty($one_data) && $one_data != null) {
            ?>
            ++loop;
            datestart1.value = '<?php echo $one_data->ta3en_date_m ?>';
            datestart2.value = '<?php echo $one_data->ta3en_date_h?>';
            <?php
            }else{ ?>

            datestart1.value = calstart1.getDate().getDateString();
            datestart2.value = calstart2.getDate().getDateString();
            <?php  }  ?>
        } else {
            datestart1.value = calstart1.getDate().getDateString();
            datestart2.value = calstart2.getDate().getDateString();
        }
    }


    function showCalstart1() {
        if (calstart1.isHidden())
            calstart1.show();
        else
            calstart1.hide();
    }

    function showCalstart2() {
        if (calstart2.isHidden())
            calstart2.show();
        else
            calstart2.hide();
    }


    //# sourceURL=pen.js

</script>
<script>
    var loop1 = 0;

    var calend1 = new Calendar(),
        calend2 = new Calendar(true, 0, true, true),
        dateend1 = document.getElementById('end_data_m'),
        dateend2 = document.getElementById('end_data_h'),
        calend1Mode = calend1.isHijriMode(),
        calend2Mode = calend2.isHijriMode();


    dateend1.setAttribute("value", calend1.getDate().getDateString());
    dateend2.setAttribute("value", calend2.getDate().getDateString());

    document.getElementById('cal-start-4').appendChild(calend1.getElement());
    document.getElementById('cal-start-3').appendChild(calend2.getElement());


    calend1.show();
    calend2.show();
    setDateFieldsend1();


    calend1.callback = function () {
        if (calend1Mode !== calend1.isHijriMode()) {
            calend2.disableCallback(true);
            calend2.changeDateMode();
            calend2.disableCallback(false);
            calend1Mode = calend1.isHijriMode();
            calend2Mode = calend2.isHijriMode();
        } else

            calend2.setTime(calend1.getTime());
        setDateFieldsend1();
    };

    calend2.callback = function () {
        if (calend2Mode !== calend2.isHijriMode()) {
            calend1.disableCallback(true);
            calend1.changeDateMode();
            calend1.disableCallback(false);
            calend1Mode = calend1.isHijriMode();
            calend2Mode = calend2.isHijriMode();
        } else

            calend1.setTime(calend2.getTime());
        setDateFieldsend1();
    };


    calend1.onHide = function () {
        calend1.show(); // prevent the widget from being closed
    };

    calend2.onHide = function () {
        calend2.show(); // prevent the widget from being closed
    };


    function setDateFieldsend1() {
        // datestart1.value = calstart1.getDate().getDateString();
        // datestart2.value = calstart2.getDate().getDateString();
        if (loop1 == 0) {
            <?php  if (isset($one_data) && !empty($one_data) && $one_data != null) {
            ?>
            ++loop1;
            dateend1.value = '<?php echo $one_data->end_date_m ?>';
            dateend2.value = '<?php echo $one_data->end_date_h?>';
            <?php
            }else{ ?>

            dateend1.value = calend1.getDate().getDateString();
            dateend2.value = calend2.getDate().getDateString();
            <?php  }  ?>
        } else {
            dateend1.value = calend1.getDate().getDateString();
            dateend2.value = calend2.getDate().getDateString();
        }
    }


    function showCalend1() {
        if (calend1.isHidden())
            calend1.show();
        else
            calend1.hide();
    }

    function showCalend2() {
        if (calend2.isHidden())
            calend2.show();
        else
            calend2.hide();
    }


    //# sourceURL=pen.js

</script>

<script>

    function set_img_magles(input) {
        if (!input.type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#magles_image').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }

        
    }
</script>

<script>
    var start_time = 1;

    function change_time(td_el, arr) {
        var time_s = ['هـ', ' م '];

        $(td_el).fadeOut(500, function () {
            $(this).text(arr[start_time] + time_s[start_time]).fadeIn(500);
        });
        start_time = 1 - start_time;
    }
</script>
<script>
    function get_status() {

        var magles_status_fk = $('#magles_status_fk').val();
        if (magles_status_fk == 0) {
            $('#reason_div').show('slow');

        } else {
            $('#magles_status_reason').val('');
            $('#reason_div').hide('slow');

        }
    }
</script>

<script>
    function get_details(row_id, rkm) {
        $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_magls_edara/All_magls_edara/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#magles_details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#magles_details').html(d);

            }

        });
    }
</script>


<!-- new -->
<script>
   /* function add_geha(value) {

        $('#div_update').hide();
        $('#div_add').show();
        //  alert(value);


        if (value != 0 && value != '') {
            var dataString = 'reason=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/all_magls_edara/All_magls_edara/add_reason',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {

                    //  $('#reason').val(' ');
                    $('#odwia_status_reason').val(value);
                    $('#Modal_family').modal('hide');
                }
            });
        }

    }

*/

    function add_geha(value) {

        $('#div_update').hide();
        $('#div_add').show();
        //  alert(value);

       
        if (value != 0 && value != '' ) {
            var dataString = 'reason=' + value ;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/all_magls_edara/All_magls_edara/add_reason',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {

                  //  $('#reason').val(' ');
                  $('#reason').val('');
                    $('#Modal_family').modal('hide');
                    swal({
                        title: "تم الاضافه بنجاح!",
  
  
        }
        );
                }
            });
        }

    }
</script>

<script>
    function getTitle(value) {


        $('#odwia_status_reason').val(value);


        $('#Modal_family').modal('hide');
    }
</script>


<script>

 /*   function update_reason(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add').hide();
        $('#div_update').show();


        $.ajax({
            url: "<?php echo base_url() ?>md/all_magls_edara/All_magls_edara/getById",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                $('#reason').val(obj.reason);
                console.log(obj.reason);


            }

        });

        $('#update').on('click', function () {
            var reason = $('#reason').val();


            $.ajax({
                url: "<?php echo base_url() ?>md/all_magls_edara/All_magls_edara/update_reason",
                type: "Post",
                dataType: "html",
                data: {reason: reason, id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#reason').val(' ');


                    $('#Modal_family').modal('hide');

                }

            });

        });

    }
*/

    function update_reason(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add').hide();
        $('#div_update').show();


        $.ajax({
            url: "<?php echo base_url() ?>md/all_magls_edara/All_magls_edara/getById",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                $('#reason').val(obj.reason);
               console.log(obj.reason);


            }

        });

        $('#update').on('click', function () {
            var reason = $('#reason').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>md/all_magls_edara/All_magls_edara/update_reason",
                type: "Post",
                dataType: "html",
                data: {reason: reason,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#reason').val('');
                   
                  
                    $('#Modal_family').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );

                }

            });

        });

    }
</script>
<script>
   /* function delte_geha(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/all_magls_edara/All_magls_edara/delete_reason',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#Modal_family').modal('hide');

                }
            });
        }

    }*/
    
        function delte_geha(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/all_magls_edara/All_magls_edara/delete_reason',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#reason').val('');
                    $('#Modal_family').modal('hide');
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );

                }
            });
        }

    }
</script>


<script>
    function get_details_reason() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_magls_edara_members/All_magls_edara_members/load_reason",
            
            beforeSend: function () {
                $('#myDiv_geha').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_geha').html(d);

            }

        });
    }
</script>

<script>
    function get_image(row_id, rkm) {
        $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_magls_edara/All_magls_edara/load_image",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#magles_images').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#magles_images').html(d);

            }

        });
    }
</script>