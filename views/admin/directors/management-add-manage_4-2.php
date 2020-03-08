<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style>
    .lobipanel-noaction {
        margin-bottom: 25px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    }
</style>


<div class="col-sm-12 no-padding ">
    <div class="col-sm-9 ">
        <div class="panel panel-bd lobidisable lobipanel  lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?></h3>
            </div>
            <div class="panel-body">
                <!---form------>
<span id="message">
<?php
if (isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>

                <?php if (isset($results)) { ?>
                    <?php echo form_open_multipart('Directors/Directors/update_council/' . $results['id'], array('class' => "", 'role' => "form")) ?>


                    <div class="col-md-12">
                        <div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label top-label"> كود المجلس</label>
                            <input type="text" value="<?php echo $this->uri->segment(4); ?>"
                                   class="form-control bottom-input"
                                   readonly="">
                        </div>
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label top-label">
                                <img style="width: 18px;float: right;" src="http://localhost/Final_Abnaa/asisst/admin_asset/img/f_date/icon3.png" />
                                تاريخ التعيين
                                <img style="width: 18px;float: left;" src="http://localhost/Final_Abnaa/asisst/admin_asset/img/f_date/icon6.png" />
                            </label>
                            <div id="cal-2" style="width: 50%;float: right;">
                                <input id="date-Hijri" name="appointment_date_h" class="form-control bottom-input "
                                       type="text"  onfocus="showCal2();" value="<?php echo $results['appointment_date_h'] ?>"
                                       style=" width: 100%;float: right"/>
                            </div>
                            <div id="cal-1" style="width: 50%;float: left;">
                                <input id="date-Miladi" name="appointment_date_m" class="form-control bottom-input  "
                                       value="<?php echo $results['appointment_date_m'] ?>"
                                       type="text" onfocus="showCal1();"  style=" width: 100%;float: right"  />
                            </div>

                        </div>

                        <div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label top-label">رقم قرار التعيين </label>
                            <input type="number" name="appointment_decison_number"
                                   value="<?php echo $results['appointment_decison_number'] ?>"
                                   class="form-control bottom-input" data-validation="required">
                        </div>


                    </div>

                    <div class="col-md-12">


                        <div class="form-group col-md-3 col-sm-6 padding-4">

                            <label class="label top-label">
                                <img style="width: 18px;float: right;" src="http://localhost/Final_Abnaa/asisst/admin_asset/img/f_date/icon3.png" />
                                تاريخ الانتهاء
                                <img style="width: 18px;float: left;" src="http://localhost/Final_Abnaa/asisst/admin_asset/img/f_date/icon6.png" />
                            </label>

                            <div id="cal-end-2"  style="width: 50%;float: right;">
                                <input id="date-Hijri-end"  name="expiration_date_h" class="form-control bottom-input " type="text"
                                       onfocus="showCalEnd2();" value="<?php echo $results['expiration_date_h'] ?>"   onblur="getAge($(this).val());"  style=" width: 100%;float: right"/>
                            </div>
                            <div id="cal-end-1" style="width: 50%;float: left;">
                                <input id="date-Miladi-end"  name="expiration_date_m"  value="<?php echo $results['expiration_date_m'] ?>" class="form-control bottom-input birth_date"
                                       type="text" onfocus="showCalEnd1();"
                                       style=" width: 100%;float: right" />
                            </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label top-label">صورة قرار المجلس </label>
                            <input type="file" name="decison_img" onchange="readURL(this);"
                                   class="form-control bottom-input">
                        </div>


                    </div>


                    <div class="col-xs-12 col-md-12">
                        <input type="submit" class="btn center-block" name="update" value="تعديل"/>
                    </div>


                <?php } else { ?>

                    <?php echo form_open_multipart('Directors/Directors/add_council', array('class' => "", 'role' => "form")) ?>

                    <div class="col-md-12">
                        <div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label top-label"> كود المجلس</label>
                            <input type="text" value="<?php echo(($last_id + 1)) ?>"
                                   class="form-control bottom-input"
                                   readonly="">
                        </div>
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label top-label">
                                <img style="width: 18px;float: right;" src="http://localhost/Final_Abnaa/asisst/admin_asset/img/f_date/icon3.png" />
                                تاريخ التعيين
                                <img style="width: 18px;float: left;" src="http://localhost/Final_Abnaa/asisst/admin_asset/img/f_date/icon6.png" />
                            </label>
                            <div id="cal-2" style="width: 50%;float: right;">
                                <input id="date-Hijri" name="appointment_date_h" class="form-control bottom-input "
                                       type="text"  onfocus="showCal2();" value=""
                                       style=" width: 100%;float: right"/>
                            </div>
                            <div id="cal-1" style="width: 50%;float: left;">
                                <input id="date-Miladi" name="appointment_date_m" class="form-control bottom-input  "
                                       value=""
                                       type="text" onfocus="showCal1();"  style=" width: 100%;float: right"  />
                            </div>

                        </div>





                        <div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label top-label">رقم قرار التعيين </label>
                            <input type="number" name="appointment_decison_number"
                                   class="form-control bottom-input" data-validation="required">
                        </div>


                    </div>
                    <div class="col-md-12">

                        <div class="form-group col-md-3 col-sm-6 padding-4">

                            <label class="label top-label">
                                <img style="width: 18px;float: right;" src="http://localhost/Final_Abnaa/asisst/admin_asset/img/f_date/icon3.png" />
                                تاريخ الانتهاء
                                <img style="width: 18px;float: left;" src="http://localhost/Final_Abnaa/asisst/admin_asset/img/f_date/icon6.png" />
                            </label>

                            <div id="cal-end-2"  style="width: 50%;float: right;">
                                <input id="date-Hijri-end"  name="expiration_date_h" class="form-control bottom-input " type="text"
                                       onfocus="showCalEnd2();" value=""   onblur="getAge($(this).val());"  style=" width: 100%;float: right"/>
                            </div>
                            <div id="cal-end-1" style="width: 50%;float: left;">
                                <input id="date-Miladi-end"  name="expiration_date_m"  value="" class="form-control bottom-input birth_date"
                                       type="text" onfocus="showCalEnd1();"
                                       style=" width: 100%;float: right" />
                            </div>
                        </div>


                        <div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label top-label">صورة قرار المجلس </label>
                            <input type="file" name="decison_img"
                                   onchange="readURL(this);"
                                   class="form-control bottom-input" data-validation="required">
                        </div>

                    </div>


                    <div class="col-xs-12 col-md-12">
                        <input type="submit" class="btn center-block" name="add" value="حفظ"/>
                    </div>

                    <?php echo form_close() ?>


                <?php } ?>
                <!---table------>

            </div>
        </div>
    </div>
    <div class="col-sm-3 ">
        <div class="panel panel-bd lobidisable lobipanel-noaction  lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">صورة قرار المجلس</h3>
            </div>
            <div class="panel-body">

                <div class="col-sm-12" style="width: 100%; height: 183px">
                    <?php if (isset($results)){ ?>
                        <img id="magles_image" class="media-object center-block"
                             data-toggle="modal"
                             data-target="#modal-img"
                             onclick="$('#my_image').attr('src','<?php echo base_url('uploads/images/') . $results['decison_img'] ?>');"
                             src="<?php echo base_url('uploads/images') . '/' . $results['decison_img'] ?>"
                             onerror="this.src='<?php echo base_url('asisst/fav/apple-icon-120x120.png') ?>'"
                             width="180px" height="182px"/>

                    <?php }else{ ?>
                    <div class="col-sm-12">
                        <img data-toggle="modal"
                             data-target="#modal-img"
                             onclick="$('#my_image').attr('src',$(this).attr('src'));"
                             id="magles_image" class="media-object center-block"
                             src="<?php echo base_url('asisst/fav/apple-icon-120x120.png') ?>"
                             width="182px" height="182px"/>


                        <?php } ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="col-sm-12  ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات المجالس</h3>
            </div>
            <div class="panel-body">
                <?php if (isset($records) && $records != null) { ?>
                    <div class="col-xs-12">
                        <div class="panel-body">
                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">كود المجلس</th>
                                        <th class="text-center">رقم التعيين</th>
                                        <th class="text-center">تاريخ التعيين</th>
                                        <th class="text-center">تاريخ الانتهاء</th>
                                        <th class="text-center">الاجراء</th>
                                        <th class="text-center">التفاصيل</th>
                                        <th class="text-center">حالة</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php $a = 1;
                                    foreach ($records as $record) {
                                        if ($record->status == 1) {
                                            $class = 'manage-run';
                                            $title = 'نشط';
                                            $bt_class = 'success';
                                            $set = 0;
                                        } elseif ($record->status == 0) {
                                            $class = 'manage-work';
                                            $title = 'غير نشط';
                                            $bt_class = 'danger';
                                            $set = 1;
                                        } ?>
                                        <tr>
                                            <td><?php echo $a ?> </td>
                                            <td><?php echo $a ?> </td>

                                            <td><?php echo $record->appointment_decison_number ?></td>
                                            <td><?php echo $record->appointment_date_m ?></td>
                                            <td><?php echo $record->expiration_date_m ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url() . 'Directors/Directors/update_council/' . $record->id ?>">
                                                    <i class="fa fa-pencil " aria-hidden="true">
                                                    </i>
                                                </a>
                                                <a href="<?php echo base_url() . 'Directors/Directors/delete_council/' . $record->id ?>"
                                                   onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                                    <i class="fa fa-trash" aria-hidden="true">
                                                    </i>
                                                </a>
                                                <!-- <a class="pop-manage" data-toggle="modal" data-target=".firstModal<?php echo $record->id ?>">
              <i class="fa fa-info" aria-hidden="true"></i></a>  -->
                                            </td>

                                            <td>
                                                <i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal"
                                                   data-target="#firstModal<?php echo $record->id ?>"></i>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'Directors/Directors/suspend_council/' . $record->id . '/' . $set ?>">
                                                    <button type="button"
                                                            class="btn btn-sm btn-<?php echo $bt_class ?>"><?php echo $title ?></button>
                                                </a></td>
                                        </tr>
                                        <!-------------------------------------------------------------------------------------------------------------->
                                        <!--div class=" modal fade firstModal<?php echo $record->id ?>" tabindex="-1" id="firstModal<?php echo $record->id ?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-manage">
            <h4 class="pop-manage-h4"> جميع التفاصيل المتعلقة بالمجلس رقم <span class="pop-manage-span"> <?php echo $record->appointment_decison_number ?> </span></h4>
            <h4 class="pop-manage-h4"> تاريخ أنشاء المجلس : <span class="pop-manage-span"> <?php echo date('Y-m-d', $record->appointment_date) ?> </span></h4>
            <h4 class="pop-manage-h4">تاريخ إنتهاء المجلس :<span class="pop-manage-span"><?php echo date('Y-m-d', $record->expiration_date) ?> </span></h4>
            <h4 class="pop-manage-h4">حالة المجلس الأن :<span class="pop-manage-span"><?php echo $title ?></span></h4>
           <?php if (isset($get_members[$record->id]) && $get_members[$record->id] != null) { ?>
            <h4 class="pop-manage-h4">عدد أعضاء المجلس :<span class="pop-manage-span">1</span> <button class="btn pop-member-manage"  data-toggle="modal" data-target=".inner-firstModal<?php echo $record->id ?>"> تفاصيل اللاعضاء</button></h4>
            <div class="modal fade inner-firstModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-manage next-manage-pop">
                    <h4 class="pop-next-manage-h4">الاعضاء المقيدون بالمجلس</h4>
                     <?php $a = 1;
                                            foreach ($get_members[$record->id] as $row): ?>
                    <h4 class="pop-next-manage-h4"> <?php echo $a++ ?>- <?php echo $jobs[$row->job_title_id_fk]->name ?> :
                                  <span class="pop-manage-span"><?php echo $row->member_name ?></span>
                    </h4>
                <?php endforeach; ?>
                </div>
            </div>
           <?php } ?>
            <div class="modal-footer ">
                <button type="button" class="btn manage-close-pop" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div-->


                                        <!-------------------------------------------------------------------------------------------------------------->


                                        <div class="modal" id="firstModal<?= $record->id ?>" tabindex="-1" role="dialog"
                                             aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"> جميع التفاصيل المتعلقة بالمجلس
                                                            رقم: <?= $record->appointment_decison_number ?></h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">


                                                            <div class="col-md-12 space">
                                                                <div class="col-md-5">
                                                                    <h5><b>تاريخ أنشاء المجلس:</b></h5>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <h6><?= $record->appointment_date_m ?></h6>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 space">
                                                                <div class="col-md-5">
                                                                    <h5><b>تاريخ إنتهاء المجلس :</b></h5>
                                                                </div>
                                                                <div class="col-md-7">
                                                                    <h6><?= $record->expiration_date_m ?></h6>
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
                <?php } ?>
            </div>
        </div>
    </div>


</div>
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

<script type="text/javascript">
    jQuery(function ($) {

        $(".date_as_mask").mask("99/99/9999");
    });
</script>


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#magles_image').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script src='http://localhost/Final_Abnaa/asisst/admin_asset/js/hijri-date.js'></script>
<script src='http://localhost/Final_Abnaa/asisst/admin_asset/js/calendar.js'></script>
<script>




    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();

    <?php
    if(!isset($results)&& empty($results))
    { ?>
    date1.setAttribute("value",cal1.getDate().getDateString());
    date2.setAttribute("value",cal2.getDate().getDateString());
    <?php }?>
    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());



    cal1.show();
    cal2.show();
    <?php
    if(!isset($results)&& empty($results))
    { ?>
    setDateFields1();


    <?php }?>

    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal2.setTime(cal1.getTime());
        setDateFields1();
    };

    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal1.setTime(cal2.getTime());
        setDateFields1();
    };


    cal1.onHide = function() {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function() {
        cal2.show(); // prevent the widget from being closed
    };
    function setDateFields1() {
        date1.value = cal1.getDate().getDateString();
        date2.value = cal2.getDate().getDateString();
        date1.setAttribute("value",cal1.getDate().getDateString());
        date2.setAttribute("value",cal2.getDate().getDateString());
    }

    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }

    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();
    }




</script>

<script>


    var calEnd1 = new Calendar(),
        calEnd2 = new Calendar(true, 0, true, true),
        dateEnd1 = document.getElementById('date-Miladi-end'),
        dateEnd2 = document.getElementById('date-Hijri-end'),
        calEnd1Mode = calEnd1.isHijriMode(),
        calEnd2Mode = calEnd2.isHijriMode();
    <?php
    if(!isset($results)&& empty($results))
    { ?>
    dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
    dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());
    <?php }?>
    document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
    document.getElementById('cal-end-2').appendChild(calEnd2.getElement());



    calEnd1.show();
    calEnd2.show();
    <?php
    if(!isset($results)&& empty($results))
    { ?>
    setDateFieldsEnd1();


    <?php }?>

    calEnd1.callback = function () {
        if (calEnd1Mode !== calEnd1.isHijriMode()) {
            calEnd2.disableCallback(true);
            calEnd2.changeDateMode();
            calEnd2.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd2.setTime(calEnd1.getTime());
        setDateFieldsEnd1();
    };

    calEnd2.callback = function () {
        if (calEnd2Mode !== calEnd2.isHijriMode()) {
            calEnd1.disableCallback(true);
            calEnd1.changeDateMode();
            calEnd1.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd1.setTime(calEnd2.getTime());
        setDateFieldsEnd1();
    };





    calEnd1.onHide = function() {
        calEnd1.show(); // prevent the widget from being closed
    };

    calEnd2.onHide = function() {
        calEnd2.show(); // prevent the widget from being closed
    };





    function setDateFieldsEnd1() {
        dateEnd1.value = calEnd1.getDate().getDateString();
        dateEnd2.value = calEnd2.getDate().getDateString();
        dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());



        var birth_date =calEnd2.getDate().getDateString();
        var res = birth_date.split("/");
        var year_birth=res[2];

        var current_year = '1440';
        var ageYear = parseFloat(current_year)  -parseFloat(year_birth);
        // alert(ageYear);
        $('#age').val(ageYear+'سنه');
    }




    function showCalEnd1() {
        if (calEnd1.isHidden())
            calEnd1.show();
        else
            calEnd1.hide();
    }

    function showCalEnd2() {

        if (calEnd2.isHidden())
            calEnd2.show();

        else
            calEnd2.hide();
        //var = $('.birth_date').val();
        //alert(x);
        // getAge(dd);






    }


    //# sourceURL=pen.js

</script>




