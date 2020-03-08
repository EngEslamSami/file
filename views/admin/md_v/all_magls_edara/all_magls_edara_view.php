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

</style>
<div class="col-sm-12 no-padding ">
    <div class="col-sm-9 ">
        <div class="panel panel-bd lobidisable lobipanel  lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?></h3>
            </div>
            <div class="panel-body">
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

                } else {
                    echo form_open_multipart(base_url() . 'md/all_magls_edara/All_magls_edara');
                    $mg_code = '';
                    $qrar_rkm ='';
                    $ta3en_date_m = '';
                    $ta3en_date_h = '';
                    $end_date_m = '';
                    $end_date_h = '';
                    $qrar_mgls_morfaq = '';
                } ?>
                <div class="col-sm-12">
                    <div class="form-group col-sm-3">
                        <label class="label">كود المجلس </label>
                        <input type="text" class="form-control " value="<?=$mg_code?>" readonly/>
                    </div>
                    <div class="form-group col-md-3 col-xs-12">
                        <label class="label">تاريخ التعيين هجري </label>
                        <div id="cal-start-2">
                            <input id="start_data_h" name="ta3en_date_h" class="form-control  "
                                   type="text"
                                   onfocus="showCalstart2();" value=""
                                   style=" width: 100%;float: right"/>

                        </div>
                    </div>
                    <div class="form-group col-md-3 col-xs-12">
                        <label class="label">تاريخ تعيين ميلادي</label>

                        <div id="cal-start-1">
                            <input id="start_data_m" name="ta3en_date_m" class="form-control   "
                                   type="text" onfocus="showCalstart1();" value=""
                                   style=" width: 100%;float: right"/>
                        </div>

                    </div>
                    <div class="form-group col-sm-3">
                        <label class="label">رقم قرار التعيين </label>
                        <input type="text" class="form-control "  name="qrar_rkm" value="<?=$qrar_rkm?>"/>
                    </div>
                    <div class="form-group col-md-3 col-xs-12">
                        <label class="label">تاريخ انتهاء هجري </label>
                        <div id="cal-start-3">
                            <input id="end_data_h" name="end_date_h" class="form-control   "
                                   type="text"
                                   onfocus="showCalend2();" value=""
                                   style=" width: 100%;float: right"/>

                        </div>
                    </div>
                    <div class="form-group col-md-3 col-xs-12">
                        <label class="label">تاريخ انتهاء ميلادى</label>
                        <div id="cal-start-4">
                            <input id="end_data_m" name="end_date_m" class="form-control   "
                                   type="text" onfocus="showCalend1();" value=""
                                   style=" width: 100%;float: right"/>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label class="label">صورة قرار المجلس </label>
                        <input type="file" class="form-control " name="qrar_mgls_morfaq"
                               onchange="set_img_magles(this);" value="<?=$qrar_mgls_morfaq?>">
                    </div>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn-success btn-labeled btn" name="btn" value="1">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <div class="col-sm-3 ">
        <div class="panel panel-bd lobidisable lobipanel-noaction  lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">صورة قرار المجلس</h3>
            </div>
            <div class="panel-body">

                <div class="col-sm-12" style="width: 100%; height: 163px">
                    <div class="col-sm-12">
                        <img data-toggle="modal"
                             data-target="#modal-img"
                             onclick="$('#my_image').attr('src',$(this).attr('src'));"
                             id="magles_image" class="media-object center-block"
                             src="<?php if(!empty($qrar_mgls_morfaq)){echo base_url().'uploads/images/'.$qrar_mgls_morfaq; }else{ echo base_url('asisst/fav/apple-icon-120x120.png');} ?>"
                             style="width: 100px;height: auto;"/>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<?php if (isset($all_data) && $all_data != null) { ?>
    <div class="col-sm-12  ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات المجالس</h3>
            </div>
            <div class="panel-body">

                <div class="col-xs-12">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center" style="width:80px;">كود المجلس</th>
                                    <th class="text-center" style="width:80px;">رقم التعيين</th>
                                    <th class="text-center">تاريخ التعيين</th>
                                    <th class="text-center">تاريخ الانتهاء</th>
                                      <th class="text-center">حالة المجلس </th>
                                      <th class="text-center">التفاصيل</th>
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
                                        <td><?=  $record->ta3en_date_h .' هـ '.
                                                  ' <i class="fa fa-arrows-h" aria-hidden="true"></i> '
                                                 .$record->ta3en_date_m .' م ' ?></td>
                                                 
                                                 
                                                  <td><?=  $record->end_date_h .' هـ '.
                                                  ' <i class="fa fa-arrows-h" aria-hidden="true"></i> '
                                                 .$record->end_date_m .' م ' ?></td>
                                        
                                        
                                        
                                                <td>
                                            <a href="#">
                                                <button type="button"
                                                        class="btn btn-sm btn-<?php echo $bt_class ?>"><?php echo $title ?></button>
                                            </a></td>
                                            
                                       <td>
                                            <i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal"
                                               data-target="#firstModal<?php echo $record->id ?>"></i>
                                        </td> 
                                            
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


                                        </td>

                                     
                                       
                                    </tr>


                                    <div class="modal" id="firstModal<?= $record->id ?>" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            data-dismiss="modal">&times;
                                                    </button>
                                                    <h4 class="modal-title"> جميع التفاصيل المتعلقة بالمجلس
                                                        رقم: <?= $record->qrar_rkm ?></h4>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="row">


                                                        <div class="col-md-12 space">
                                                            <div class="col-md-5">
                                                                <h5><b>تاريخ أنشاء المجلس:</b></h5>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <h6><?= 'م/' . $record->ta3en_date_m . '  <br> هـ/' . $record->ta3en_date_h ?></h6>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 space">
                                                            <div class="col-md-5">
                                                                <h5><b>تاريخ إنتهاء المجلس :</b></h5>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <h6><?= 'م/' . $record->end_date_m . '  <br> هـ/' . $record->end_date_h ?></h6>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 space">
                                                            <div class="col-md-5">
                                                                <h5><b>حالة المجلس الأن :</b></h5>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <h6><?= $title ?></h6>
                                                            </div>
                                                        </div>
                                                        <?php if (isset($get_members[$record->id]) && $get_members[$record->id] != null) { ?>

                                                            <div class="col-md-12 space">
                                                                <div class="col-md-5">
                                                                    <h5><b>عدد أعضاء المجلس :</b></h5>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <h6><?= sizeof($get_members[$record->id]); ?></h6>
                                                                </div>
                                                            </div>

                                                            <!--div class="col-md-12 space">
	        <div class="col-md-5">
			<h5><b>تفاصيل اللاعضاء:</b></h5>
			</div>
			<div class="col-md-7">
			 <?php $a = 1;
                                                            foreach ($get_members[$record->id] as $row) { ?>
              <h4 class="pop-next-manage-h4"> <?php echo $a++ ?>- <?php echo $jobs[$row->job_title_id_fk]->name ?> :
              <span class="pop-manage-span"><?php echo $row->member_name ?></span>
              </h4>
             <?php } ?>
			</div>
			</div -->

                                                            <div class="col-xs-12 space">
                                                                <button type="button" class="btn btn-info"
                                                                        data-toggle="collapse" data-target="#demo"
                                                                        style="position: absolute;
    top: -34px;left: 22%;">تفاصيل الاعضاء
                                                                </button>
                                                                <div id="demo" class="collapse">
                                                                    <div class="col-md-12"
                                                                         style="background-color: #eee; margin-top: 15px;">
                                                                        <?php $a = 1;
                                                                        foreach ($get_members[$record->id] as $row) { ?>
                                                                            <h4 class="pop-next-manage-h4"
                                                                                style="padding: 6px;"> <?php echo $a++ ?>
                                                                                - <?php echo $jobs[$row->job_title_id_fk]->name ?>
                                                                                :
                                                                                <span
                                                                                        class="pop-manage-span"><?php echo $row->member_name ?></span>
                                                                            </h4>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php } ?>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php $a++;
                                } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>

<div class="modal fade" id="modal-img" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
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
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#magles_image').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
