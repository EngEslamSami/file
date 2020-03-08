<style>
    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>
<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title; ?> </h3>
        </div>

        <div class="panel-body">
            <?php
            if (isset($galsa_member)){
            ?>
            <form action="<?php echo base_url(); ?>md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/update_galsa/<?php echo $this->uri->segment(5); ?>/
<?php echo $this->uri->segment(6); ?>" method="post" id="form1">


                <?php } else{ ?>
                <form action="<?php echo base_url(); ?>md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia"
                      method="post" id="form1">

                    <?php } ?>
                    <div class="col-sm-12">
                        <!-- <div class="form-group col-sm-3">
                    <label class="label">كود المجلس</label>
                    <input type="text" class="form-control" data-validation="required" readonly name="mgls_code" value="
                    <?php if (isset($last_magls)) {
                            echo $last_magls->mg_code;
                        } else {
                            echo $last_magls_update->mgls_code;
                        } ?>"
                           class="form-control fe2a" id="">
                    <input type="hidden" readonly name="mgls_id_fk" value="<?php if (isset($last_magls)) {
                            echo $last_magls->id;
                        } else {
                            echo $last_magls_update->mgls_id_fk;
                        } ?>" class="form-control fe2a">
                </div> -->
                        <div class="form-group col-sm-3">
                            <label class="label">رقم الجلسه</label>
                            <input type="text" class="form-control" data-validation="required" id="glsa_rkm_full"
                                   name="glsa_rkm_full"
                                   readonly value="<?php echo date("Y"); ?>/<?php echo $last_galsa; ?>"/>
                            <input type="hidden" name="glsa_rkm" id="glsa_rkm" readonly
                                   value="<?php echo $last_galsa; ?>"/>


                        </div>

                        <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                            <label class="label" style="text-align: center !important;">
                                <img style="width: 18px;float: right;"
                                     src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon3.png">
                                تاريخ فتح الجلسه
                                <img style="width: 18px;float: left;"
                                     src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon6.png">
                            </label>
                            <div id="cal-1" style="    width: 50%;">

                                <input id="date-Miladi" class="form-control" data-validation="required"
                                       name="glsa_date_m" class="form-control"
                                       value="<?php if (isset($last_magls_update)) echo $last_magls_update->glsa_date_m; ?> "
                                       type="text" onfocus="showCal1();" style=" width: 100%;float: right"/>
                            </div>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                            <div id="cal-2" style="    width: 50%;     margin-top: 18px;
  
    margin-right: -104px;">

                                <input id="date-Hijri" class="form-control" data-validation="required"
                                       name="glsa_date_h" class="form-control"
                                       value="<?php if (isset($last_magls_update)) echo $last_magls_update->glsa_date_h; ?>"
                                       type="text" onfocus="showCal2();" value="" style=" width: 100%;float: right"/>
                            </div>
                        </div>

                        <?php if (isset($members) && !empty($members)) {
                            if (isset($galsa_member) && !empty($galsa_member)) {
                                $title_collapse = "تعديل اختيارات الاعضاء  المرسل لهم الدعوات";
                            } else {
                                $title_collapse = "اختيار الاعضاء لإرسال الدعوات";

                            }
                            ?>
                            <div class="container col-md-12">
                                <button type="button" class="btn btn-info" data-toggle="collapse"
                                        data-target="#demo"><?= $title_collapse ?></button>
                                <div id="demo" class="collapse">
                                    <table id="" class="example display table table-bordered   responsive nowrap"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th scope="col">#
                                                <input type="checkbox"  class="checkbox" onclick="$('input:checkbox').not(this).prop('checked', this.checked);"/>
                                            </th>

                                            <th scope="col">رقم العضوية</th>
                                            <th scope="col">إسم العضو</th>
                                            <th scope="col">رقم هويته</th>
                                            <th scope="col">رقم جوال</th>
                                            <th scope="col">بداية الاشتراك</th>
                                            <th scope="col">نهاية الاشتراك</th>
                                            <th scope="col">حالة العضوية</th>
                                            <th scope="col">مدة</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($members as $row) {
                                            if (isset($row->odwiat) && (!empty($row->odwiat))) {
                                                $rkm_odwia_full = $row->odwiat->rkm_odwia_full;
                                                $odwia_status_title = $row->odwiat->odwia_status_title;
                                                if (!empty($row->odwiat->subs_from_date_m)) {
                                                    $subs_from_date_m = explode('/', $row->odwiat->subs_from_date_m)[2] . '/' . explode('/', $row->odwiat->subs_from_date_m)[0] . '/' . explode('/', $row->odwiat->subs_from_date_m)[1];
                                                } else {
                                                    $subs_from_date_m = 'غير محدد';
                                                }
                                                if (!empty($row->odwiat->subs_to_date_m)) {
                                                    $subs_to_date_m = explode('/', $row->odwiat->subs_to_date_m)[2] . '/' . explode('/', $row->odwiat->subs_to_date_m)[0] . '/' . explode('/', $row->odwiat->subs_to_date_m)[1];
                                                } else {
                                                    $subs_to_date_m = 'غير محدد';
                                                }

                                                $bday = new DateTime(date('d-m-Y', $row->odwiat->from_date)); // Your date of birth
                                                if ($row->odwiat->to_date <= strtotime(date('d-m-Y'))) {
                                                    $today = new Datetime(date('d-m-Y', $row->odwiat->to_date));
                                                } else {
                                                    $today = new Datetime(date('d-m-Y'));
                                                }
                                                $diff = $today->diff($bday);
                                                $diff = $diff->y . " سنة  " . $diff->m . " شهر " . $diff->d . " يوم ";

                                            } else {
                                                $rkm_odwia_full = 'غير محدد';
                                                $odwia_status_title = 'غير محدد';
                                                $subs_from_date_m = 'غير محدد';
                                                $subs_to_date_m = 'غير محدد';
                                                $diff = 'غير محدد';
                                            }

                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="member_id[]" value="<?= $row->id ?>"
                                                        <?php
                                                        if (isset($galsa_member) && !empty($galsa_member) && in_array($row->id, $galsa_member)) {
                                                            echo 'checked';
                                                        }
                                                        ?>
                                                           class="checkbox  member_id"/>
                                                </td>

                                                <td><?php echo $rkm_odwia_full; ?></td>
                                                <td><?php echo $row->laqb_title . '/' . $row->name; ?></td>
                                                <td><?php echo $row->card_num; ?></td>
                                                <td><?php echo $row->jwal; ?></td>
                                                <td><?php echo $subs_from_date_m; ?></td>
                                                <td><?php echo $subs_to_date_m; ?></td>
                                                <td><?php echo $odwia_status_title; ?></td>
                                                <td><?php echo $diff; ?></td>

                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="col-md-12">
                                        <!--<button type="submit"
                                                class="btn btn-labeled btn-success " name="add" value="ADD" style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                        </button>-->
                                        <?php if ((isset($open_galesa)) && (!empty($open_galesa)) && ($open_galesa > 0)) {

                                            $span = '<span  class="label-danger"> عذرا...  لا يمكنك إضافة جلسة جديدة لوجود جلسة نشطة بالمجلس </span>';
                                            $disabled = 'disabled';
                                        } else {
                                            $span = '';
                                            $disabled = '';
                                        } ?>

                                        <button type="button" <?= $disabled ?>
                                                class="btn btn-labeled btn-success " onclick="save_galsa()" name="add"
                                                value="ADD"
                                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                        </button>
                                        <input type="hidden" name="add" value="ADD"/>
                                        <?= $span ?>

                                    </div>
                                </div>
                            </div>

                            <?php
                        } else {
                            ?>

                            <div class="alert alert-danger col-lg-12"> لاتوجد اعضاء باللجنة</div>
                            <?php
                        }
                        ?>


                    </div>
                </form>


        </div>
    </div>

    <?php if (isset($records) && !empty($records)){ ?>
    <div class="col-xs-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> <?php echo $title_t; ?> </h3>
            </div>

            <div class="panel-body">


                <div class="col-md-12">

                    <table id="" class=" example display table table-bordered   responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="info">
                            <th>مسلسل</th>
                            <th>رقم الجلسة</th>
                            <th>تاريخ الجلسة</th>
                            <th>حالة الجلسة</th>
                            <th>الأعضاء</th>
                            <th>الاجراء</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x = 0;
                        foreach ($records as $row) {
                            $x++;

                            if ($row->glsa_finshed == 0) {
                                $Halet_galsa = 'جلسة نشطة';
                                $Halet_galsa_color = '#98c73e';
                            } elseif ($row->glsa_finshed == 1) {
                                $Halet_galsa = 'جلسة إنتهت ';
                                $Halet_galsa_color = '#e65656';
                            }
                            ?>
                            <tr>
                                <td><?= $x ?></td>
                                <td><?= $row->glsa_rkm_full ?></td>

                                <?php $row->glsa_date_m = explode('/', $row->glsa_date_m)[2] . '/' . explode('/', $row->glsa_date_m)[0] . '/' . explode('/', $row->glsa_date_m)[1];
                                $row->glsa_date_h = explode('/', $row->glsa_date_h)[2] . '/' . explode('/', $row->glsa_date_h)[1] . '/' . explode('/', $row->glsa_date_h)[0];
                                ?>
                                <td onclick=" var arr_time=['<?= $row->glsa_date_h ?>','<?= $row->glsa_date_m ?>'];
                                        change_time(this, arr_time)"><?php echo  $row->glsa_date_m . ' م ' ?></td>


                                <td style="background-color:<?php echo $Halet_galsa_color; ?>;">
                                    <?php echo $Halet_galsa; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-add" data-toggle="modal"
                                            onclick="det_datiles(<?= $row->glsa_rkm ?>)"
                                            data-target="#myModal"><span class="fa fa-list"></span>
                                        التفاصيل
                                    </button>
                                </td>
                                <td>

                                    <?php
                                    if ($row->glsa_finshed == 0) { ?>
                                        <!-- <a href="<?php echo base_url('md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/update_galsa') . '/' . $row->glsa_rkm ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a> -->
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
                                                window.location="<?= base_url() . 'md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/update_galsa' . '/' . $row->glsa_rkm ?>";
                                                });'>
                                            <i class="fa fa-pencil"> </i></a>
                                        <!--<a onclick="$('#adele').attr('href', '<?= base_url() . "md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/" . $row->glsa_rkm ?>');" data-toggle="modal"
data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
-->
                                        <!-- <a  href="<?php echo base_url() . 'md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/delete_galsa/' . $row->id . '/' . $row->glsa_rkm ?>"
    onclick="return confirm('هل انت متأكد من هذا الإجراء ');" class="btn btn-danger btn-sm ">
    حذف </a> -->
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
                                                setTimeout(function(){window.location="<?= base_url() . 'md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/delete_galsa/' . $row->id . '/' . $row->glsa_rkm ?>";}, 500);
                                                });'>
                                            <i class="fa fa-trash"> </i></a>

                                    <?php } elseif ($row->glsa_finshed == 1) { ?>
                                        <span style="font-weight: normal !important;"
                                              class="label-danger label label-default">لايمكن التعديل والحذف</span>
                                    <?php } ?>


                                </td>


                            </tr>
                            <!----------------------------------------------------------------->
                            <!----------------------------------------------------->
                        <?php } ?>


                        </tbody>
                    </table>
                    <!--25-7-om-->

                    <?php
                    } ?>


                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">تفاصيل الأعضاء</h4>
            </div>
            <br>
            <div class="modal-body form-group col-sm-12 col-xs-12">
                <div id="members_data"></div>
            </div>
            <div class="modal-footer" style="border-top: 0;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>


<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>


    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    /*	date1.setAttribute("value",cal1.getDate().getDateString());
     date2.setAttribute("value",cal2.getDate().getDateString());*/

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    //	setDateFields1();


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


    cal1.onHide = function () {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function () {
        cal2.show(); // prevent the widget from being closed
    };

    function setDateFields1() {
        /*	date1.value = cal1.getDate().getDateString();
         date2.value = cal2.getDate().getDateString();*/

        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
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


    /*	dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
     dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());*/

    document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
    document.getElementById('cal-end-2').appendChild(calEnd2.getElement());


    calEnd1.show();
    calEnd2.show();
    //	setDateFieldsEnd1();


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


    calEnd1.onHide = function () {
        calEnd1.show(); // prevent the widget from being closed
    };

    calEnd2.onHide = function () {
        calEnd2.show(); // prevent the widget from being closed
    };


    function setDateFieldsEnd1() {
        /*	dateEnd1.value = calEnd1.getDate().getDateString();
         dateEnd2.value = calEnd2.getDate().getDateString();*/

        dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());
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
    }


    //# sourceURL=pen.js

</script>


<!------------------------------------------------------->
<!------------------------------------------------------>

<script>

    var cal11 = new Calendar(),
        cal22 = new Calendar(true, 0, true, true),
        date11 = document.getElementById('mostadem-date-Miladi'),
        date22 = document.getElementById('mostadem-date-Hijri'),
        cal11Mode = cal11.isHijriMode(),
        cal22Mode = cal22.isHijriMode();


    /*	date11.setAttribute("value",cal11.getDate().getDateString());
     date22.setAttribute("value",cal22.getDate().getDateString());*/

    document.getElementById('cal-11').appendChild(cal11.getElement());
    document.getElementById('cal-22').appendChild(cal22.getElement());


    cal11.show();
    cal22.show();
    //	setDateFields();


    cal11.callback = function () {
        if (cal11Mode !== cal11.isHijriMode()) {
            cal22.disableCallback(true);
            cal22.changeDateMode();
            cal22.disableCallback(false);
            cal11Mode = cal11.isHijriMode();
            cal22Mode = cal22.isHijriMode();
        } else

            cal22.setTime(cal11.getTime());
        setDateFields();
    };

    cal22.callback = function () {
        if (cal22Mode !== cal22.isHijriMode()) {
            cal11.disableCallback(true);
            cal11.changeDateMode();
            cal11.disableCallback(false);
            cal11Mode = cal11.isHijriMode();
            cal22Mode = cal22.isHijriMode();
        } else

            cal11.setTime(cal22.getTime());
        setDateFields();
    };


    cal11.onHide = function () {
        cal11.show(); // prevent the widget from being closed
    };

    cal22.onHide = function () {
        cal22.show(); // prevent the widget from being closed
    };

    function setDateFields() {
        /*	date11.value = cal11.getDate().getDateString();
         date22.value = cal22.getDate().getDateString();*/

        date11.setAttribute("value", cal11.getDate().getDateString());
        date22.setAttribute("value", cal22.getDate().getDateString());
    }

    function showCal11() {
        if (cal11.isHidden())
            cal11.show();
        else
            cal11.hide();
    }

    function showCal22() {
        if (cal22.isHidden())
            cal22.show();
        else
            cal22.hide();
    }


</script>


<script>


    var calEnd11 = new Calendar(),
        calEnd22 = new Calendar(true, 0, true, true),
        dateEnd11 = document.getElementById('mostadem-date-Miladi-end'),
        dateEnd22 = document.getElementById('mostadem-date-Hijri-end'),
        calEnd11Mode = calEnd11.isHijriMode(),
        calEnd22Mode = calEnd22.isHijriMode();


    /*	dateEnd11.setAttribute("value",calEnd11.getDate().getDateString());
     dateEnd22.setAttribute("value",calEnd22.getDate().getDateString());*/

    document.getElementById('cal-end-11').appendChild(calEnd11.getElement());
    document.getElementById('cal-end-22').appendChild(calEnd22.getElement());


    calEnd11.show();
    calEnd22.show();
    //	setDateFieldsEnd();


    calEnd11.callback = function () {
        if (calEnd11Mode !== calEnd11.isHijriMode()) {
            calEnd22.disableCallback(true);
            calEnd22.changeDateMode();
            calEnd22.disableCallback(false);
            calEnd11Mode = calEnd11.isHijriMode();
            calEnd22Mode = calEnd22.isHijriMode();
        } else

            calEnd22.setTime(calEnd11.getTime());
        setDateFieldsEnd();
    };

    calEnd22.callback = function () {
        if (calEnd22Mode !== calEnd22.isHijriMode()) {
            calEnd11.disableCallback(true);
            calEnd11.changeDateMode();
            calEnd11.disableCallback(false);
            calEnd11Mode = calEnd11.isHijriMode();
            calEnd22Mode = calEnd22.isHijriMode();
        } else

            calEnd11.setTime(calEnd22.getTime());
        setDateFieldsEnd();
    };


    calEnd11.onHide = function () {
        calEnd11.show(); // prevent the widget from being closed
    };

    calEnd22.onHide = function () {
        calEnd22.show(); // prevent the widget from being closed
    };


    function setDateFieldsEnd() {
        /*	dateEnd11.value = calEnd11.getDate().getDateString();
         dateEnd22.value = calEnd22.getDate().getDateString();*/

        dateEnd11.setAttribute("value", calEnd11.getDate().getDateString());
        dateEnd22.setAttribute("value", calEnd22.getDate().getDateString());
    }


    function showCalEnd11() {
        if (calEnd11.isHidden())
            calEnd11.show();
        else
            calEnd11.hide();
    }

    function showCalEnd22() {
        if (calEnd22.isHidden())
            calEnd22.show();
        else
            calEnd22.hide();
    }

</script>

<script>
    function save_galsa() {
        var members = [];
        var glsa_rkm = $('#glsa_rkm').val();
        var glsa_rkm_full = $('#glsa_rkm_full').val();
        var date_Miladi = $('#date-Miladi').val();
        var date_Hijri = $('#date-Hijri').val();
        var oTable = $('.example').dataTable();
        var rowcollection = oTable.$(".member_id:checked", {"page": "all"});
        rowcollection.each(function (index, elem) {
            members.push($(elem).val());
        });


        var members_num = document.getElementsByName('member_id[]').length;
        console.log('date_Miladi : ' + date_Miladi + '\n members_num : ' + members_num);
        if (date_Miladi != ' ') {
            $('#date-Hijri').removeAttr('style');
            $('#date-Miladi').removeAttr('style');

            if (members.length > 0) {

                // md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia
                // $('#form1').submit();

                <?php  if (isset($galsa_member)) {
                $url = base_url() . 'md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/update_galsa/' . $this->uri->segment(5) . '/' . $this->uri->segment(6);
            } else {
                $url = base_url() . 'md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia';
            } ?>

                $.ajax({
                    type: 'post',
                    url: "<?=$url?>",
                    data: {
                        member_id: members,
                        glsa_rkm: glsa_rkm,
                        glsa_rkm_full: glsa_rkm_full,
                        glsa_date_m: date_Miladi,
                        glsa_date_h: date_Hijri,
                        add: 'add'
                    }
                });

            } else {
                swal({
                    title: "من فضلك اختر اعضاء للجلسة ",
                    type: 'warning',
                    confirmButtonText: "تم"
                });

            }
        } else {
            $('#date-Miladi').css('border', '2px solid #ff0000 ');
            $('#date-Hijri').css('border', '2px solid #ff0000 ');
        }

    }

</script>

<script>

    function det_datiles(glsa_rkm) {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/det_datiles'?>",
            data: {
                glsa_rkm: glsa_rkm
            }, beforeSend: function () {
                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (d) {

                $('#members_data').html(d);


            }
        });
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

    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>