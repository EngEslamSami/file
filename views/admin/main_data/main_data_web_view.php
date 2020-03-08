<div class="col-xs-12 no-padding">
    <div class="panel-body panel panel-bd">
        <?php
        $checked = array('', 'checked');
        echo form_open_multipart(base_url() . 'main_data/Main_data_web/insert');

        if ((isset($data)) && (!empty($data))) {
               $h_logo=$checked[$data->h_logo];
               $h_soeial=$checked[$data->h_soeial];
               $h_date=$checked[$data->h_date];
               $h_mob=$checked[$data->h_mob];
               $h_email=$checked[$data->h_email];
               $f_logo=$checked[$data->f_logo];
               $f_address=$checked[$data->f_address];
               $f_map=$checked[$data->f_map];
               $f_mob=$checked[$data->f_mob];
               $f_email=$checked[$data->f_email];
        } else {
            $h_logo=$h_date=$h_email=$h_mob=$h_soeial=$f_logo=$f_address=$f_email=$f_map=$f_mob='';

        } ?>
        <div class="col-md-6 ">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $title_h ?> </h3>
                </div>

                <div class="panel-body">

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">

                        <input type="checkbox" name="h_logo" <?=$h_logo?> class="" value="1" placeholder=""
                              >
                        <label>لوجو </label>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">

                        <input type="checkbox" name="h_soeial" <?=$h_soeial?> class="" value="1" placeholder=""
                               >
                        <label>مواقع التواصل الاجتماعي</label>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">

                        <input type="checkbox" name="h_date" <?=$h_date?> class="" value="1" placeholder=""
                               >
                        <label>تاريخ والساعة</label>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">

                        <input type="checkbox" name="h_mob" <?=$h_mob?> class="" value="1" placeholder=""
                               >
                        <label>رقم الجوال</label>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">

                        <input type="checkbox" name="h_email" <?=$h_email?> class="" value="1" placeholder=""
                               >
                        <label>البريد الإلكتروني</label>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $title_f ?> </h3>
                </div>

                <div class="panel-body">

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">

                        <input type="checkbox" name="f_logo" <?=$f_logo?> class="" value="1" placeholder=""
                              >
                        <label>لوجو </label>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">

                        <input type="checkbox" name="f_address" <?=$f_address?> class="" value="1" placeholder=""
                               >
                        <label>العنوان</label>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">

                        <input type="checkbox" name="f_map" <?=$f_map?> class="" value="1" placeholder=""
                               >
                        <label>الخريطة</label>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">

                        <input type="checkbox" name="f_mob" <?=$f_mob?> class="" value="1" placeholder=""
                               >
                        <label>أرقام الجوال</label>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">

                        <input type="checkbox" name="f_email" <?=$f_email?> class="" value="1" placeholder=""
                               >
                        <label>البريد الإلكتروني</label>
                    </div>


                </div>
            </div>
        </div>
        <div class="form-group col-xs-12">
            <button class="btn btn-success mtop-10" name="btn" value="1"> حفظ</button>

        </div>
        <?php echo form_close() ?>
    </div>
</div>