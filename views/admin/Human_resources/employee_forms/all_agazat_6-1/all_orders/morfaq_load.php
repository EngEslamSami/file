<?php if (isset($result)&&(!empty($result))) {
  if (in_array($result->no3_agaza,  array(3,4))) {
    ?>
    <?php echo form_open_multipart(base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/add_attach') ?>

    <input type="hidden" name="agaza_rkm" value="<?php echo $result->agaza_rkm; ?>">
    <?php
            if (isset($_POST['from_profile'])) {
                ?>
        <input type="hidden" name="from_profile" value="1">

            <?php } ?>

    <div class="col-md-12 no-padding"  >
        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
            <label class="label "> اسم المرض </label>
            <input type="text" name="marad_name" data-validation="required"
                   id="marad_name" class="form-control " value="<?= $result->marad_name ?>">
        </div>

<div class="form-group col-md-2  col-sm-6 padding-4">
    <label class="label ">
        <img style="width: 19px;float: right;display:none"
             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
        بداية التقرير الطبي
        <img style="width: 19px;float: left;"
             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
    </label>

    <div id="cal-end-18" style="width: 50%;float: right;display:none">
        <input
                name="taqrer_form_date_h" id="taqrer_form_date_h1"
                class="form-control bottom-input " type="text"
                onfocus="showCalEnd18();" data-validation="required"
                style=" width: 100%;float: right"/>
    </div>
    <div id="cal-end-17" >
        <input class="form-control bottom-input "
               name="taqrer_form_date_m" id="taqrer_form_date_m1"
               type="text" onfocus="showCalEnd17();" data-validation="required"
               style=" width: 100%;float: right"/>
    </div>
</div>
<div class="form-group col-md-2  col-sm-6 padding-4">
    <label class="label ">
        <img style="width: 19px;float: right;display:none"
             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
        نهاية التقرير الطبي
        <img style="width: 19px;float: left;"
             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
    </label>

    <div id="cal-end-110" style="width: 50%;float: right;display:none">
        <input
                name="taqrer_to_date_h" id="taqrer_to_date_h1"
                class="form-control bottom-input " type="text"
                onfocus="showCalEnd110();" data-validation="required"
                style=" width: 100%;float: right"/>
    </div>
    <div id="cal-end-19" >
        <input class="form-control bottom-input "
               name="taqrer_to_date_m" id="taqrer_to_date_m1"
               type="text" onfocus="showCalEnd19();" data-validation="required"
               style=" width: 100%;float: right"/>
    </div>
</div>




        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
            <label class="label "> اسم المستشفى </label>
            <input type="text" name="hospital_name" data-validation="required"
                   id="hospital_name" class="form-control " value="<?= $result->hospital_name ?>">
        </div>
        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
            <label class="label ">تقرير المستشفى </label>
            <input type="file" name="hospital_report" data-validation="required"
                   id="hospital_report" class="form-control" style="width:80%;float: right;">

                   <?php if (!empty($result->hospital_report)) {
                   $display_report= 'block';
                   $type = pathinfo($result->hospital_report)['extension'];
                   $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                   $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                   if (in_array($type, $arry_images)) {
                   $type_doc=1;
                   } elseif (in_array(strtoupper($type), $arr_doc)) {
                   $type_doc=2;
                 }
                   }else {
                   $display_report='none';
                   }?>
                   <a class="btn btn-success btn-next"  style="float: right; display: <?=$display_report ?>"
                     href="<?php echo base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/read_file/' . $result->hospital_report .'/'.$type_doc.'/'.$type?>"
                   target="_blank">
                   <i class=" fa fa-eye"></i></a>
                 </div>

    </div>
    
             <br>
             <br>
             <div class="col-md-12 text-center">
               <button type="submit" class="btn btn-labeled btn-success " name="save" value="save">
                   <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
               </button>

             </div>
             <br>
             <br>
             <?php echo form_close() ?>

    <?php

  }
} ?>



<script>

    var calEnd17 = new Calendar(),
        calEnd18 = new Calendar(true, 0, true, true),
        dateEnd17 = document.getElementById('taqrer_form_date_m1'),
        dateEnd18 = document.getElementById('taqrer_form_date_h1'),
        calEnd17Mode = calEnd17.isHijriMode(),
        calEnd18Mode = calEnd18.isHijriMode();


    dateEnd17.setAttribute("value", calEnd17.getDate().getDateString());
    dateEnd18.setAttribute("value", calEnd18.getDate().getDateString());


    document.getElementById('cal-end-17').appendChild(calEnd17.getElement());
    document.getElementById('cal-end-18').appendChild(calEnd18.getElement());


    calEnd17.show();
    calEnd18.show();
    setDateFieldsEnd17();


    calEnd17.callback = function () {
        if (calEnd17Mode !== calEnd17.isHijriMode()) {
            calEnd18.disableCallback(true);
            calEnd18.changeDateMode();
            calEnd18.disableCallback(false);
            calEnd17Mode = calEnd17.isHijriMode();
            calEnd18Mode = calEnd18.isHijriMode();
        } else

            calEnd18.setTime(calEnd17.getTime());
        setDateFieldsEnd17();
    };

    calEnd18.callback = function () {
        if (calEnd18Mode !== calEnd18.isHijriMode()) {
            calEnd17.disableCallback(true);
            calEnd17.changeDateMode();
            calEnd17.disableCallback(false);
            calEnd17Mode = calEnd17.isHijriMode();
            calEnd18Mode = calEnd18.isHijriMode();
        } else

            calEnd17.setTime(calEnd18.getTime());
        setDateFieldsEnd17();
    };


    calEnd17.onHide = function () {
        calEnd17.show(); // prevent the widget from being closed

    };

    calEnd18.onHide = function () {
        calEnd18.show(); // prevent the widget from being closed

    };


    function setDateFieldsEnd17() {
        if (loop4 == 0) {
            <?php if (isset($result) && $result != null) { ?>
            loop4++;
            dateEnd17.value = '<?=$result->taqrer_form_date_m?>';
            dateEnd18.value = '<?=$result->taqrer_form_date_h?>';
            <?php } else { ?>
            dateEnd17.value = calEnd17.getDate().getDateString();
            dateEnd18.value = calEnd18.getDate().getDateString();

            <?php } ?>
        } else {
            dateEnd17.value = calEnd17.getDate().getDateString();
            dateEnd18.value = calEnd18.getDate().getDateString();

        }

        dateEnd17.setAttribute("value", calEnd17.getDate().getDateString());
        dateEnd18.setAttribute("value", calEnd18.getDate().getDateString());

    }


    function showCalEnd17() {
        if (calEnd17.isHidden())
            calEnd17.show();
        else
            calEnd17.hide();

    }

    function showCalEnd18() {
        if (calEnd18.isHidden())
            calEnd18.show();
        else
            calEnd18.hide();
    }

    /////////////////////////////////////////////

    var calEnd19 = new Calendar(),
        calEnd110 = new Calendar(true, 0, true, true),
        dateEnd19 = document.getElementById('taqrer_to_date_m1'),
        dateEnd110 = document.getElementById('taqrer_to_date_h1'),
        calEnd19Mode = calEnd19.isHijriMode(),
        calEnd110Mode = calEnd110.isHijriMode();


    dateEnd19.setAttribute("value", calEnd19.getDate().getDateString());
    dateEnd110.setAttribute("value", calEnd110.getDate().getDateString());


    document.getElementById('cal-end-19').appendChild(calEnd19.getElement());
    document.getElementById('cal-end-110').appendChild(calEnd110.getElement());


    calEnd19.show();
    calEnd110.show();
    setDateFieldsEnd19();


    calEnd19.callback = function () {
        if (calEnd19Mode !== calEnd19.isHijriMode()) {
            calEnd110.disableCallback(true);
            calEnd110.changeDateMode();
            calEnd110.disableCallback(false);
            calEnd19Mode = calEnd19.isHijriMode();
            calEnd110Mode = calEnd110.isHijriMode();
        } else

            calEnd110.setTime(calEnd19.getTime());
        setDateFieldsEnd19();
    };

    calEnd110.callback = function () {
        if (calEnd110Mode !== calEnd110.isHijriMode()) {
            calEnd19.disableCallback(true);
            calEnd19.changeDateMode();
            calEnd19.disableCallback(false);
            calEnd19Mode = calEnd19.isHijriMode();
            calEnd110Mode = calEnd110.isHijriMode();
        } else

            calEnd19.setTime(calEnd110.getTime());
        setDateFieldsEnd19();
    };


    calEnd19.onHide = function () {
        calEnd19.show(); // prevent the widget from being closed

    };

    calEnd110.onHide = function () {
        calEnd110.show(); // prevent the widget from being closed

    };


    function setDateFieldsEnd19() {


        if (loop5 == 0) {
            <?php if (isset($result) && $result != null) { ?>
            loop5++;
            dateEnd19.value = '<?=$result->taqrer_to_date_m?>';
            dateEnd110.value = '<?=$result->taqrer_to_date_h?>';
            <?php } else { ?>
            dateEnd19.value = calEnd19.getDate().getDateString();
            dateEnd110.value = calEnd110.getDate().getDateString();
            <?php } ?>
        } else {
            dateEnd19.value = calEnd19.getDate().getDateString();
            dateEnd110.value = calEnd110.getDate().getDateString();
        }


        dateEnd19.setAttribute("value", calEnd19.getDate().getDateString());
        dateEnd110.setAttribute("value", calEnd110.getDate().getDateString());

    }


    function showCalEnd19() {
        if (calEnd19.isHidden())
            calEnd19.show();
        else
            calEnd19.hide();

    }

    function showCalEnd110() {
        if (calEnd110.isHidden())
            calEnd110.show();
        else
            calEnd110.hide();
    }

    /////////////////////////////////////////////
</script>
