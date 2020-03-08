<style>
    .label {
        font-size: 15px !important;
    }
</style>
<?php
/*
echo '<pre>';
print_r($members);
*/
?>
<div id="">
    <?php echo form_open_multipart('all_Finance_resource/sponsors/Sponsor/updateKfala_data',array('id'=>'form_updateKfala_data')); ?>

    <?php /*  ?>
    <div class="col-md-12">
        <div class="form-group col-md-2 col-sm-6 padding-4">
            <label class="label ">نوع الكفالة </label>
        </div>
        <?php
        if (isset($kfalat_types) && !empty($kfalat_types)) {
            foreach ($kfalat_types as $value) {
                ?>
                <input type="radio" name="kafala_type_fk" style="margin-right: 15px"
                       onclick="check_kafal(<?= $value->id ?>,<?php echo $result_Kfala_data['person_id_fk']; ?>)"
                       value="<?= $value->id ?>"
                    <?php if (!empty($result_Kfala_data)) {
                        if ($result_Kfala_data['kafala_type_fk'] == $value->id) {
                            echo 'checked';
                        }
                    } ?> disabled data-validation="required">
                <label
                    <?php if (!empty($result_Kfala_data)) {
                        if ($result_Kfala_data['kafala_type_fk'] == $value->id) {
                            echo 'checked'; ?>
                            style="color: red !important;"
                        <?php }
                    } ?>
                        for="square-radio-1"><?= $value->title ?></label>
                <?php
            }
        }
        ?>
    </div>
    <?php */ ?>
    <?php $date_from = '';
    $date_to = '';
    $value = '';
    $status = '';
    $reason = '';
    $suspension_arr = array(1 => 'الملف', 2 => 'الكافل');

    if (!empty($result_Kfala_data)) {
        if ($result_Kfala_data['person_type'] == 2) {
            if (empty($result_Kfala_data['second_date_from_ar']) &&
                empty($result_Kfala_data['second_date_to_ar'])
            ) {
                $date_from = $result_Kfala_data['first_date_from_ar'];
                $date_to = $result_Kfala_data['first_date_to_ar'];
                $value = $result_Kfala_data['first_value'];
                $status = $result_Kfala_data['first_status'];
                $reason = $result_Kfala_data['first_kafala_reason'];
                $suspension_type = $result_Kfala_data['first_suspension_type'];
            } else {
                $date_from = $result_Kfala_data['second_date_from_ar'];
                $date_to = $result_Kfala_data['second_date_to_ar'];
                $value = $result_Kfala_data['second_value'];
                $status = $result_Kfala_data['second_status'];
                $suspension_type = $result_Kfala_data['second_suspension_type'];
            }
        } else {
            $date_from = $result_Kfala_data['first_date_from_ar'];
            $date_to = $result_Kfala_data['first_date_to_ar'];
            $value = $result_Kfala_data['first_value'];
            $status = $result_Kfala_data['first_status'];
            $reason = $result_Kfala_data['first_kafala_reason'];
            $suspension_type = $result_Kfala_data['first_suspension_type'];
        }
        $date_from_h = $result_Kfala_data['from_date_h'];
        $date_to_h = $result_Kfala_data['to_date_h'];
        ?>
        <!--------------------------------------------------------------------->
        <div class="my_form">


            <div class="">
                <div class="col-md-12 no-padding">
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label style="text-align: center !important;" class="label ">
                            <img style="width: 17px;float: right; "
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                            تاريخ بداية الكفالة
                            <img style="width: 17px;float: left;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                        </label>
                        <div id="cal-1" style="width: 50%;float: left;">
                            <input id="date-Miladi" name="from_date" class="form-control bottom-input  "
                                   value="<?php echo $date_from; ?>" type="text" onfocus="showCal1();"
                                   style=" width: 100%;float: right"/>
                        </div>
                        <div id="cal-2" style="width: 50%;float: right;">
                            <input id="date-Hijri" name="from_date_h" class="form-control bottom-input "
                                   value="<?= $date_from_h ?>"
                                   type="text" onfocus="showCal2();" value="" style=" width: 100%;float: right"/>
                        </div>
                    </div>
                    <div class="form-group col-md-1  col-sm-6 padding-4">
                        <label class="label "> مده الكفاله </label>
                        <select id="kafala_period" class="form-control bottom-input " data-validation="required"
                                name="kafala_period" onchange="get_date()">
                            <option value="">إختر</option>
                            <?php
                            $kafala_period = array(
                                '1' => 'شهر', '2' => 'شهرين', '3' => '3 أشهر', '4' => '4 أشهر', '5' => '5 أشهر', '6' => '6 أشهر',
                                '7' => '7 أشهر', '8' => '8 أشهر', '9' => '9 أشهر', '10' => '10 أشهر', '11' => '11 أشهر', '12' => '12 أشهر',
                            );
                            if (isset($kafala_period) && !empty($kafala_period)) {
                                for ($a = 1; $a <= sizeof($kafala_period); $a++) {
                                    ?>
                                    <option value="<?php echo $a; ?>"
                                        <?php if (!empty($kafala_period)) {
                                            if ($a == $result_Kfala_data['kafala_period']) {
                                                echo 'selected';
                                            }
                                        } ?>> <?php echo $kafala_period[$a]; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label " style="text-align: center !important;">
                            <img style="width: 17px;float: right;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                            تاريخ نهاية الكفالة
                            <img style="width: 17px;float: left;"
                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                        </label>
                        <div id="cal-end-1" style="width: 50%;float: left;">
                            <input id="date-Miladi-end" name="to_date"
                                   class="form-control bottom-input " value="<?php echo $date_to; ?>"
                                   name="to_date" type="text" onfocus="showCalEnd1();"
                                   style=" width: 100%;float: right"/>
                            <!--  <button class="icon-button" onclick="showCalEnd1();" type="button" style="width: 25px;height: 34px">م</button>
                         -->
                        </div>
                        <div id="cal-end-2" style="width: 50%;float: right;">
                            <input id="date-Hijri-end" name="to_date_h" class="form-control bottom-input "
                                   type="text" value="<?= $date_to_h ?>"
                                   onfocus="showCalEnd2();" value="" style=" width: 100%;float: right"/>
                        </div>
                    </div>

                    <input type="hidden" name="kafala_type_fk" value="<?=$result_Kfala_data['kafala_type_fk']?>">
                    <input type="hidden" name="alert_type" value="<?=$result_Kfala_data['alert_type']?>">
                    <input type="hidden" name="k_value" value="<?=$value?>">
                    <input type="hidden" name="kafala_status" value="<?=$status?>">
                    <input type="hidden" name="suspension_type" value="<?=$suspension_type?>">
                    <input type="hidden" name="kafala_reason" value="<?=$reason?>">
                    <input type="hidden" name="pay_method" value="<?=$result_Kfala_data['pay_method']?>">
                    <input type="hidden" name="bank_id_fk" value="<?=$result_Kfala_data['bank_id_fk']?>">
                    <input type="hidden" name="bank_account_num" value="<?=$result_Kfala_data['bank_account_num']?>">
                    <input type="hidden" name="mostdem_from_date_h" value="<?=$result_Kfala_data['mostdem_from_date_h']?>">
                    <input type="hidden" name="mostdem_from_date_m" value="<?=$result_Kfala_data['mostdem_from_date_m']?>">
                    <input type="hidden" name="mostdem_to_date_h" value="<?=$result_Kfala_data['mostdem_to_date_h']?>">
                    <input type="hidden" name="mostdem_to_date_m" value="<?=$result_Kfala_data['mostdem_to_date_m']?>">
                    <input type="hidden" name="gamia_account" value="<?=$result_Kfala_data['gamia_account']?>">
                    <input type="hidden" name="gamia_bank_id_fk" value="<?=$result_Kfala_data['gamia_bank_id_fk']?>">
                    <input type="hidden" name="gamia_account_num" value="<?=$result_Kfala_data['gamia_account_num']?>">
                    <input type="hidden" name="mother_national_num_fk" value="<?= $result_Kfala_data['mother_national_num_fk'] ?>">
                    <input type="hidden" name="person_id_fk" value="<?= $result_Kfala_data['person_id_fk'] ?>">
                    <input type="hidden" name="kafel_id_fk" id="kafel_id_fk" value="<?= $result_Kfala_data['first_kafel_id'] ?>">
                    <input type="hidden" name="id" id="id" value="<?= $result_Kfala_data['id'] ?>">
                    <input type="hidden" name="person_type" id="person_type" value="<?= $result_Kfala_data['person_type'] ?>">
                    <input type="hidden" name="kafala_type_fk" id="kafala_type_fk" value="<?= $result_Kfala_data['kafala_type_fk'] ?>">
                    <input type="hidden" name="add" value="add">
                    
                      <input type="hidden" name="edite_date" value="edite_date">
                </div>

                <div class="col-md-12 no-padding">
<!--                    <div class="form-group col-md-3  col-sm-6 padding-4">-->
<!--                        <label class="label "> صورة الأمر المستديم </label>-->
<!--                        <input type="file" name="mostdem_img" id="mostdem_img"-->
<!--                               class="form-control bottom-input" --><?php //if ($result_Kfala_data['pay_method'] != 7) { ?><!--    disabled="disabled"  --><?php //} ?><!-- >-->
<!--                    </div>-->

                </div>

            </div>
        </div>

        <!--------------------------------------------------------------------->
    <?php } ?>
    <?php echo form_close(); ?>

</div>

<!------------------------------------------------------------------------>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>



<script type="text/javascript">
    function gmod(n, m) {
        return ((n % m) + m) % m;
    }
    function kuwaiticalendar(adjust) {
        var today = new Date(document.getElementById("date-Miladi-end").value);
        if (adjust) {
            adjustmili = 1000 * 60 * 60 * 24 * adjust;
            todaymili = today.getTime() + adjustmili;
            today = new Date(todaymili);
        }
        day = today.getDate();
        month = today.getMonth();
        year = today.getFullYear();
        m = month + 1;
        y = year;
        if (m < 3) {
            y -= 1;
            m += 12;
        }
        a = Math.floor(y / 100.);
        b = 2 - a + Math.floor(a / 4.);
        if (y < 1583) b = 0;
        if (y == 1582) {
            if (m > 10) b = -10;
            if (m == 10) {
                b = 0;
                if (day > 4) b = -10;
            }
        }
        jd = Math.floor(365.25 * (y + 4716)) + Math.floor(30.6001 * (m + 1)) + day + b - 1524;
        b = 0;
        if (jd > 2299160) {
            a = Math.floor((jd - 1867216.25) / 36524.25);
            b = 1 + a - Math.floor(a / 4.);
        }
        bb = jd + b + 1524;
        cc = Math.floor((bb - 122.1) / 365.25);
        dd = Math.floor(365.25 * cc);
        ee = Math.floor((bb - dd) / 30.6001);
        day = (bb - dd) - Math.floor(30.6001 * ee);
        month = ee - 1;
        if (ee > 13) {
            cc += 1;
            month = ee - 13;
        }
        year = cc - 4716;
        wd = gmod(jd + 1, 7) + 1;
        iyear = 10631. / 30.;
        epochastro = 1948084;
        epochcivil = 1948085;
        shift1 = 8.01 / 60.;
        z = jd - epochastro;
        cyc = Math.floor(z / 10631.);
        z = z - 10631 * cyc;
        j = Math.floor((z - shift1) / iyear);
        iy = 30 * cyc + j;
        z = z - Math.floor(j * iyear + shift1);
        im = Math.floor((z + 28.5001) / 29.5);
        if (im == 13) im = 12;
        id = z - Math.floor(29.5001 * im - 29);
        var myRes = new Array(8);
        myRes[0] = day; //calculated day (CE)
        myRes[1] = month; //calculated month (CE)
        myRes[2] = year; //calculated year (CE)
        myRes[3] = jd - 1; //julian day number
        myRes[4] = wd - 1; //weekday number
        myRes[5] = id; //islamic date
        myRes[6] = im; //islamic month
        myRes[7] = iy; //islamic year
        return myRes;
    }
    function writeIslamicDate(adjustment) {
        var wdNames = new Array("Ahad", "Ithnin", "Thulatha", "Arbaa", "Khams", "Jumuah", "Sabt");
        var iMonthNames = new Array("Muharram", "Safar", "Rabi'ul Awwal", "Rabi'ul Akhir",
            "Jumadal Ula", "Jumadal Akhira", "Rajab", "Sha'ban",
            "Ramadan", "Shawwal", "Dhul Qa'ada", "Dhul Hijja");
        var iDate = kuwaiticalendar(adjustment);
        var outputIslamicDate = (iDate[5]) + '/' + (iDate[6]) + '/' + iDate[7];
        return outputIslamicDate;
    }
</script>
<script>
    function get_date() {
        var kafala_period = parseInt($('#kafala_period').val());
        console.warn("kafala_period ::" + kafala_period);
        if (isNaN(kafala_period)) {
            kafala_period = 0;
        }
        var date = new Date(document.getElementById("date-Miladi").value);
        day = date.getDate();
        console.warn("day :: " + day);
        if (day > 15) {
            kafala_period += 1;
        }
        month = date.getMonth() + 1 + kafala_period;
        year = date.getFullYear();
        document.getElementById("date-Miladi-end").value = month + '/26' + '/' + year;
        document.getElementById("date-Hijri-end").value = writeIslamicDate();
        // document.getElementById("num_days").value = diffDays + 1;
        // return diffDays + 1;
    }
</script>
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
        get_date();
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
        get_date();
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
