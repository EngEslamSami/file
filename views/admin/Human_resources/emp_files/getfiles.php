<?php
$array = array(1 => 'نعم', 2 => 'لا');
$in = $inc;
for ($i = 0; $i < 1; $i++) {
    ?>
    <tr>
        <td>
            <div class="col-sm-12">
                <!--
                <input type="text" class="form-control bottom-input" name="title[<?= $in ?>]" id="title<?= $in ?>"  data-validation="required"/>
                -->
                <select name="title[<?= $in ?>]" id="title<?= $in ?>" class="form-control">
                    <?php if (isset($files_names) && !empty($files_names)) {
                        foreach ($files_names as $row) {
                            echo '<option value="' . $row->id_setting . '">' . $row->title_setting . '</option>';
                        }
                    } else {
                        echo '<option value=""> لا يوجد أسماء مرفقات مضافة </option>';
                    } ?>
                </select>

            </div>
        </td>

        <td>
            <div class="col-sm-12">
                <input type="file" class="form-control bottom-input" name="emp_file<?= $in ?>" id="emp_file<?= $in ?>"
                       data-validation="required"/>
            </div>
        </td>
        <td>
            <div class="col-sm-12">
                <select name="commited[<?= $in ?>]" class="form-control bottom-input"
                        onchange="dateEnabled($(this).val(),<?= $in ?>)" data-validation="required">
                    <option value="">إختر</option>
                    <?php
                    foreach ($array as $key => $value) {
                        $select = '';

                        ?>
                        <option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
                    <?php } ?>
                </select>
            </div>
        </td>
        <td>
            <div class="form-group  col-md-12  col-sm-12 " >
                <label class="label " style="text-align: center;">
                    <img style="width: 19px;float: right;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                    من تاريخ
                    <img style="width: 19px;float: left;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                </label>

                <div id="cal-end-2<?= $in ?>" style="width: 50%;float: right;">
                    <input id="from_date_h<?= $in ?>" name="from_date_h[<?= $in ?>]"
                           class="form-control date_as_mask bottom-input date<?= $in ?>" type="text"
                           onfocus="showCalEnd2();" value=""
                           style=" width: 100%;float: right"/>
                </div>
                <div id="cal-end-1<?= $in ?>" style="width: 50%;float: left;">
                    <input id="from_date_m<?= $in ?>" name="date_from[<?= $in ?>]"
                           class="form-control date_as_mask bottom-input date<?= $in ?> "
                           type="text" onfocus="showCalEnd1();"
                           value=""
                           style=" width: 100%;float: right" />
                </div>
            </div>
          <!--  <div class="col-sm-12">
                <input type="date" class="form-control date_as_mask bottom-input date<?= $in ?>"
                       name="date_from[<?= $in ?>]" <?php if (isset($allData) && isset($allData->badlat[$record->id]) && $allData->badlat[$record->id]->date_from > 0) echo 'data-validation="required" value="' . date("Y-m-d", $allData->badlat[$record->id]->date_from) . '"'; else echo 'disabled' ?>/>
            </div> -->
        </td>
        <td>
            <div class="form-group col-md-12  " >
                <label class="label "style="text-align: center;" >
                    <img style="width: 19px;float: right;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                    إلي تاريخ
                    <img style="width: 19px;float: left;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                </label>

                <div id="cal-2<?= $in ?>" style="width: 50%;float: right;">
                    <input id="to_date_h<?= $in ?>" name="to_date_h[<?= $in ?>]"
                           class="form-control date_as_mask bottom-input date<?= $in ?>  " type="text"
                           onfocus="showCal2();" value=""
                           style=" width: 100%;float: right"/>
                </div>
                <div id="cal-1<?= $in ?>" style="width: 50%;float: left;">
                    <input id="to_date_m<?= $in ?>" name="date_to[<?= $in ?>]"
                           class="form-control date_as_mask bottom-input date<?= $in ?>  "
                           type="text" onfocus="showCal1();"
                           value=""
                           style=" width: 100%;float: right" />
                </div>
            </div>
          <!--  <div class="col-sm-12">
                <input type="date" class="form-control date_as_mask bottom-input date<?= $in ?>"
                       name="date_to[<?= $in ?>]" <?php if (isset($allData) && isset($allData->badlat[$record->id]) && $allData->badlat[$record->id]->date_to > 0) echo 'data-validation="required" value="' . date("Y-m-d", $allData->badlat[$record->id]->date_to) . '"'; else echo 'disabled' ?> />
            </div> -->
        </td>
        <td> <a  onclick=" $(this).closest('tr').remove();"><i
                        class="fa fa-trash"></i></a>
        </td>


    </tr>
<?php } ?>






