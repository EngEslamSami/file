<style type="text/css">
    . {
        font-size: 14px;
        font-weight: 500;
        position: relative;

    }

    .right-calendar-icon {
        width: 19px;
        float: right;
        position: absolute;
        right: 10px;
        top: 1px;
    }

    .left-calendar-icon {
        width: 19px;
        float: right;
        position: absolute;
        left: 10px;
        top: 1px;
    }

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
<div class="col-sm-12 col-md-12 col-xs-12 no-padding">

    <div class="top-line"></div>
    <div class="col-md-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?= $title ?></h4>
                </div>
            </div>

            <div class="panel-body">
                <?php
                $season_name_array = array('التوقيت الصيفي', 'التوقيت الشتوي');
                $status_array = array('غير نشط', 'نشط');
                if (isset($record) && !empty($record) && $record != null) {
                    echo form_open_multipart('human_resources/Always_setting/update_season_time/' . base64_encode($record->id));
                    $season_name_num = $record->season_num;
                    $melady_start_ar = $record->melady_start_ar;
                    $melady_end_ar = $record->melady_end_ar;
                    $hejry_start_ar = $record->hejry_start_ar;
                    $hejry_end_ar = $record->hejry_end_ar;
                    $status = $record->status;
                    $season_frq = $record->season_frq;
                    $option = '<option value="' .$season_name_num . '"> ' .$season_name_array[$season_name_num] . '</option>';

                } else {
                    echo form_open_multipart('human_resources/Always_setting/season_time');
                    $season_name_num = '';
                    $melady_start_ar = '';
                    $melady_end_ar = '';
                    $hejry_start_ar = '';
                    $hejry_end_ar = '';
                    $status = '';
                    $season_frq = '';
                    $option = '';

                } ?>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">اسم التوقيت </label>
                        <select name="season_num" class="form-control " data-validation="required">
                            <?= $option ?>

                            <?php foreach ($times as $key => $row) {
                                if (($key == $season_name_num) && ($season_name_num != '')) {
                                    $s = 'selected';
                                } ?>
                                <option value="<?= $key ?>" <?php if (($key == $season_name_num) && ($season_name_num != '')) {
                                    echo 'selected';
                                } ?> ><?= $row ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3  col-sm-6 padding-4">

                        <label class="label text-center">
                            <img style="width: 19px;float: right;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                            تاريخ بداية التوقيت
                            <img style="width: 19px;float: left;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                        </label>

                        <div id="cal-start-2" style="width: 50%;float: right;">
                            <input id="date-Hijri-start" name="hejry_start" class="form-control bottom-input "
                                   type="text"
                                   onfocus="showCalstart2();" value="<?= $hejry_start_ar ?>"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-start-1" style="width: 50%;float: left;">
                            <input id="date-Miladi-start" name="melady_start" class="form-control bottom-input "
                                   name="to_date" type="text" onfocus="showCalstart1();" value="<?= $melady_start_ar ?>"
                                   style=" width: 100%;float: right"/>
                        </div>


                    </div>
                    <div class="form-group col-md-3  col-sm-6 padding-4">

                        <label class="label text-center">
                            <img style="width: 19px;float: right;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                            تاريخ نهاية التوقيت
                            <img style="width: 19px;float: left;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>

                        </label>


                        <div id="cal-end-2" style="width: 50%;float: right;">
                            <input id="date-Hijri-end" name="hejry_end" class="form-control bottom-input " type="text"
                                   onfocus="showCalEnd2();" value="<?= $hejry_end_ar ?>"
                                   style=" width: 100%;float: right"/>

                        </div>
                        <div id="cal-end-1" style="width: 50%;float: left;">
                            <input id="date-Miladi-end" name="melady_end" class="form-control bottom-input "
                                   name="to_date" type="text" onfocus="showCalEnd1();" value="<?= $melady_end_ar ?>"
                                   style=" width: 100%;float: right"/>
                        </div>

                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">حالة التوقيت </label>
                        <select name="status" class="form-control " data-validation="required">
                            <?php foreach ($status_array as $key => $row) {
                                if (($key == $status) && ($status != '')) {
                                    $s = 'selected';
                                } ?>
                                <option value="<?= $key ?>" <?php if (($key == $status) && ($status != '')) {
                                    echo 'selected';
                                } ?> ><?= $row ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    
                     <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">فرق التوقيت </label>
                        <input type="number" name="frq" id="frq" class="form-control"
                       
                         value="<?= $season_frq ?>" 
                    
                        />
                    </div>
                    
                    
                </div>

                <div class="col-md-12 text-center">
                     <button type="submit" name="add" value="حفظ" class="btn btn-success btn-labeled"><span class="btn-label">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                </div>
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
    <?php if ((isset($records)) && (!empty($records))) { ?>
        <div class="col-md-12 no-padding ">
            <br>
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4><?= $title ?></h4>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="col-md-12 no-padding">

                        <table class="table-responsive table-bordered table">
                            <thead>
                            <tr class="greentd">
                                <th>الاسم التوقيت</th>
                                <th>بداية التوقيت</th>
                                <th>نهاية التوقيت</th>
                                <th>حالة التوقيت</th>
                                <th>فرق  التوقيت الحالي</th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $class_array=array('btn-danger','btn-success');
                            foreach ($records as $row) { ?>
                                <tr>
                                    <td><?= $row->season_name ?></td>
                                    <td><?= $row->melady_start_ar ?></td>
                                    <td><?= $row->melady_end_ar ?></td>
                                    <td class="text-center"> <button  id="statuse_btn<?=$row->id?>" type="button" value="<?=$row->status?>" class="  btn <?=$class_array[$row->status]?>" onclick="change_statu(this,'<?=$row->id?>')" style="min-width: width: 80px;;"> <?= $row->status_name ?></button>

                                    </td>
                                    <td><?= $row->season_frq ?></td>
                                    
                                    <td><a onclick="alert('هل انت متأكد من حذف ؟!!')"
                                           href="<?= base_url() . 'human_resources/Always_setting/delete_season_time/' . base64_encode($row->id) ?>">
                                            <i class="fa fa-trash"></i></a>
                                        <a href="<?= base_url() . 'human_resources/Always_setting/update_season_time/' . base64_encode($row->id) ?>">
                                            <i class="fa fa-pencil"></i></a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>


    var calstart1 = new Calendar(),
        calstart2 = new Calendar(true, 0, true, true),
        datestart1 = document.getElementById('date-Miladi-start'),
        datestart2 = document.getElementById('date-Hijri-start'),
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
        <?php  if (isset($record) && !empty($record) && $record != null) {
        ?>
        datestart1.value = '<?php echo $record->melady_start_ar ?>';
        datestart2.value = '<?php echo $record->hejry_start_ar?>';
        <?php
        }else{ ?>

        datestart1.value = calstart1.getDate().getDateString();
        datestart2.value = calstart2.getDate().getDateString();
        <?php  }  ?>
        datestart1.setAttribute("value", calstart1.getDate().getDateString());
        datestart2.setAttribute("value", calstart2.getDate().getDateString());
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


    var calEnd1 = new Calendar(),
        calEnd2 = new Calendar(true, 0, true, true),
        dateEnd1 = document.getElementById('date-Miladi-end'),
        dateEnd2 = document.getElementById('date-Hijri-end'),
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
        // dateEnd1.value = calEnd1.getDate().getDateString();
        // dateEnd2.value = calEnd2.getDate().getDateString();
        <?php  if (isset($record) && !empty($record) && $record != null) {
        ?>
        dateEnd1.value = '<?php echo $record->melady_end_ar ?>';
        dateEnd2.value = '<?php echo $record->hejry_end_ar?>';
        <?php
        }else{ ?>

        dateEnd1.value = calEnd1.getDate().getDateString();
        dateEnd2.value = calEnd2.getDate().getDateString();
        <?php } ?>
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
<script>
    function change_statu(obj,id) {
        var class_array=['btn-danger','btn-success'];

        console.log(' value '+obj.value+'id'+id);
        var status;
        if(obj.value == 0){
         status=1   ;
        }else {
            status=0;
        }
        console.log('new value  '+status);

         var request = $.ajax({
             url: "<?php echo base_url() . '/human_resources/Always_setting/update_status_season'?>",
            type: "POST",
            data: {status: status,id:id},
        });
        request.done(function (msg) {

            if (msg === 'false') {
                // console.log(" if json " );


            } else {
                // console.log(" else json " );
                obj.classList.remove(class_array[obj.value]);
                obj.classList.add(class_array[status]);
                var obj2 = JSON.parse(msg);
                for (var i = 0; i < obj2.length; i++) {
                    var row = obj2[i];
                    console.log('row[' + i + ']' + row.status_name);
                    document.getElementById('statuse_btn'+row.id).classList.remove(class_array[0]);
                    document.getElementById('statuse_btn'+row.id).classList.remove(class_array[1]);
                    document.getElementById('statuse_btn'+row.id).classList.add(class_array[row.status]);
                    document.getElementById('statuse_btn'+row.id).innerText=row.status_name;
                    document.getElementById('statuse_btn'+row.id).value=row.status;
                }




            }

        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }

</script>