<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>


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

    . {
        font-size: 13px;
    }
</style>

<?php
$array = array(1 => 'نعم', 2 => 'لا');
$disabled = '';
if (isset($allData) && $allData != null) {
    echo form_open_multipart('human_resources/Human_resources/delete_employee_files/' . $this->uri->segment(4));
} else {
    echo form_open_multipart('human_resources/Human_resources/employee_files/' . $this->uri->segment(4));
}
?>

<div class="col-sm-12 col-md-12 col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
            <div class="pull-left">
                <?php $data_load["emp_code"] = $personal_data[0]->emp_code;
                $data_load["id"] = $this->uri->segment(4);
                $this->load->view('admin/Human_resources/drop_down_menu', $data_load); ?>
            </div>
        </div>

        <div class="panel-body">
            <div class="form-group col-sm-2 col-xs-12">
                <label class="label ">كود الموظف</label>
                <input type="text" class="form-control " name="emp_code"
                       value="<?= $employee['emp_code'] ?>" readonly/>
            </div>

            <div class="form-group col-sm-3 col-xs-12">
                <label class="label ">إسم الموظف</label>
                <input type="text" class="form-control " name="emp_name"
                       value="<?= $employee['employee'] ?>" readonly/>
            </div>
            <div class="form-group col-sm-3 col-xs-12">
                <label class="label "> إسم المرفق</label>
                <select name="title" id="title" class="form-control">
                    <?php if (isset($files_names) && !empty($files_names)) {
                        foreach ($files_names as $row) {
                            echo '<option value="' . $row->id_setting . '">' . $row->title_setting . '</option>';
                        }
                    } else {
                        echo '<option value=""> لا يوجد أسماء مرفقات مضافة </option>';
                    } ?>
                </select>
            </div>
            <div class="form-group col-sm-3 col-xs-12">
                <label class="label "> إرفاق - تحميل قراءة المستند</label>
                <input type="file" class="form-control bottom-input" name="emp_file" id="emp_file"
                                                                                 data-validation="required"/>
            </div>
            <div class="col-sm-3">
                <label class="label "> هل يوجد تاريخ</label>

                <select name="commited" class="form-control bottom-input"
                        onchange="get_date(this.value)" data-validation="required">
                    <option value="">إختر</option>
                    <?php
                    foreach ($array as $key => $value) {
                        $select = '';

                        ?>
                        <option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group  col-md-3  col-sm-12 " >
                <label class="label " style="text-align: center;">
                    <img style="width: 19px;float: right;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                    من تاريخ
                    <img style="width: 19px;float: left;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                </label>

                <div id="cal-end-2" style="width: 50%;float: right;">
                    <input id="from_date_h" name="from_date_h"
                           class="form-control " type="text"
                           onfocus="showCalEnd2();" value=""
                           style=" width: 100%;float: right"/>
                </div>
                <div id="cal-end-1" style="width: 50%;float: left;">
                    <input id="from_date_m" name="date_from"
                           class="form-control  "
                           type="text" onfocus="showCalEnd1();"
                           value=""
                           style=" width: 100%;float: right" />
                </div>
            </div>

            <div class="form-group col-md-3 " >
                <label class="label "style="text-align: center;" >
                    <img style="width: 19px;float: right;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                    إلي تاريخ
                    <img style="width: 19px;float: left;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                </label>

                <div id="cal-2" style="width: 50%;float: right;">
                    <input id="to_date_h" name="to_date_h"
                           class="form-control   " type="text"
                           onfocus="showCal2();" value=""
                           style=" width: 100%;float: right"/>
                </div>
                <div id="cal-1" style="width: 50%;float: left;">
                    <input id="to_date_m" name="date_to"
                           class="form-control   "
                           type="text" onfocus="showCal1();"
                           value=""
                           style=" width: 100%;float: right" />
                </div>
            </div>


            <!--
                        <div class="col-sm-12">
                            <h6 class="text-center inner-heading">بيانات المستندات والبطاقات والمهارات</h6>
                        </div>
            -->

            <?php if (isset($allData) && (empty($allData))) {
                $display = 'style="display: none"'; ?>
            <?php } else {
                $display = '';
            } ?>
            <!-- <div class="form-group col-sm-4 col-xs-12">
                <button type="button" class="btn btn-purple w-md m-b-5" value="1"
                        onclick="getBanks($(this).val(),<?php if (isset($allData) && $allData != null) echo count($allData); else echo 0; ?>);">
                    <i class="fa fa-plus"></i> إضافة مرفق جديد
                </button>
            </div>-->

            <div class="col-xs-12 text-center">


                <input type="hidden" name="count"
                       value="<?php if (isset($allData) && $allData != null) echo count($allData); else echo 0; ?>">
                <!--                <input type="submit" id="buttons" name="add" class="btn btn-blue btn-close" value="حفظ">-->
                <button type="submit" id="buttons" name="add" value="حفظ"
                        onclick="insertData();" class="btn btn-labeled btn-success "
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                </button>
            </div>
            <div class="clearfix"></div><br>

            <?php
            if (isset($allData) && !empty($allData)){
                $x = 1;
                ?>
            <table class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th class="text-center"> م</th>
                    <th class="text-center">إسم المرفق</th>
                    <th class="text-center">  المستند</th>
                    <th class="text-center">هل يوجد تاريخ</th>
                    <th class="text-center">من تاريخ</th>
                    <th class="text-center">إلي تاريخ</th>


                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($allData as $data){
                    ?>
                    <tr>
                        <td><?= $x++?></td>
                        <td><?= $data->title_name?></td>
                        <td>
                            <?php
                            $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                            $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                            $ext = pathinfo($data->emp_file, PATHINFO_EXTENSION);
                            if (in_array($ext,$image)){
                                ?>
                                <a data-toggle="modal" data-target="#myModal-view-<?= $data->id ?>">
                                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                            <?php

                            }elseif (in_array($ext,$file)){
                                ?>
                                <a target="_blank" href="<?=base_url()."human_resources/Human_resources/read_emp_file/".$value->emp_file?>">
                                    <i class="fa fa-eye" title=" قراءة"></i> </a>

                                <?php
                            }
                            ?>

                        </td>
                        <td>
                            <?php
                            if ($data->have_date==1){
                                echo "نعم";
                            } elseif ($data->have_date==2){
                                echo "لا";
                            }

                            ?>
                        </td>
                        <td>
                            <?= $data->from_date?>
                        </td>
                        <td>
                            <?= $data->to_date?>
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


<?php echo form_close(); ?>

<?php if (isset($allData) && $allData != null) {
    foreach ($allData as $key => $value) { ?>
        <div class="modal fade" id="myModal-view-<?= $value->id ?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> عرض المستند </h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        if (!empty($value->emp_file)) {
                            $type = pathinfo($value->emp_file)['extension'];
//                            echo($type);
                            $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                            $arr_doc = array('DOC', ' DOCX', 'HTML  ', 'HTM', 'ODT', 'pdf', 'XLS ', ' XLSX', 'ODS', 'PPT  ', 'PPTX', 'TXT');
                            if (in_array($type, $arry_images)) {
                                ?>
                                <img src="<?php echo base_url() . 'uploads/human_resource/emp_mostnad_files/' . $value->emp_file ?>"
                                     onerror="this.src='<?php echo base_url('asisst/fav/apple-icon-120x120.png') ?>'"
                                     width="100%">

                                <?php
                            } elseif (in_array($type, $arr_doc)) {
                                ?>
                                <iframe src="https://docs.google.com/gview?url=<?= base_url() . 'uploads/human_resource/emp_mostnad_files/' . $value->emp_file ?>&embedded=true"
                                        frameborder="0" width="100%"></iframe>

                                <?php
                            }
                        }
                        ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>

    <?php }
}
?>


<!--
<?php // $data_load["personal_data"] = $personal_data;
// $this->load->view('admin/Human_resources/sidebar_person_data', $data_load); ?>
-->


<script type="text/javascript">
    jQuery(function ($) {
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>


<script type="text/javascript">
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }

    function dateEnabled(val, id) {
        $('.date' + id).val('');
        $('.date' + id).removeAttr('data-validation');
        $('.date' + id).attr('disabled', true);
        if (val == 1) {
            $('.date' + id).removeAttr('disabled');
            $('.date' + id).attr('data-validation', 'required');
        }
    }

    var inc = 1;

    function getBanks(argument, allCount) {
        inc = inc;
        if (argument) {
            var dataString = 'numbers=' + argument + '&count=' + allCount + '&inc=' + inc;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getfiles',
                data: dataString,
                cache: false,
                success: function (html) {
                    $('#emp_files').show();
                    $('#result').append(html);
                }
            });
            inc = ++inc;
        } else {
            $('#result').html('');
        }
    }


</script>

<!--  Nagwa 20-6 -->
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>

    var loop1 = loop2 = loop3 = loop4 = loop5 = 0;
    var calEnd1 = new Calendar(),
        calEnd2 = new Calendar(true, 0, true, true),
        dateEnd1 = document.getElementById('from_date_m'),
        dateEnd2 = document.getElementById('from_date_h'),
        calEnd1Mode = calEnd1.isHijriMode(),
        calEnd2Mode = calEnd2.isHijriMode();


    dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
    dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());

    document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
    document.getElementById('cal-end-2').appendChild(calEnd2.getElement());


    calEnd1.show();
    calEnd2.show();
    setDateFieldsEnd1();


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
        if (loop1 == 0) {
            <?php if (isset($get_fatrat) && $get_fatrat != null) { ?>
            loop1++;
            dateEnd1.value = '<?=$from_date_m?>';
            dateEnd2.value = '<?=$from_date_h?>';
            <?php } else { ?>
            dateEnd1.value = calEnd1.getDate().getDateString();
            dateEnd2.value = calEnd2.getDate().getDateString();
            <?php } ?>
        } else {
            dateEnd1.value = calEnd1.getDate().getDateString();
            dateEnd2.value = calEnd2.getDate().getDateString();
        }
        //  var diffDays = get_date(document.getElementById("end_date").value, dateEnd1.value);
        // document.getElementById("num_days").value = diffDays;

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

    /////////////////////////////////////

</script>
<script>



    var loop1 = loop2 = loop3 = loop4 = loop5 = 0;
    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('to_date_m'),
        date2 = document.getElementById('to_date_h'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    date1.setAttribute("value",cal1.getDate().getDateString());
    date2.setAttribute("value",cal2.getDate().getDateString());

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    setDateFields1();


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

        if (loop1 == 0) {
            <?php if (isset($get_fatrat) && $get_fatrat != null) { ?>
            loop1++;
            date1.value = '<?=$to_date_m?>';
            date2.value = '<?=$to_date_h?>';
            <?php } else { ?>
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
            <?php } ?>
        } else {
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
        }


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
    function get_date(id) {


        if (id == 2){
            $('#from_date_h').prop('disabled', true);
            $('#from_date_m').prop('disabled', true);
            $('#to_date_m').prop('disabled', true);
            $('#to_date_h').prop('disabled', true);
        } else if(id == 1){
            $('#to_date_m').removeAttr("disabled");
           $('#to_date_h').removeAttr("disabled");
            $('#from_date_m').removeAttr("disabled");
           $('#from_date_h').removeAttr("disabled");
        }

    }
</script>


