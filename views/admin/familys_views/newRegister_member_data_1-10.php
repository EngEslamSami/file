<div class="padding-4 col-md-12">
    <br>
    <table class="table table-striped table-bordered fixed-table " <?php if (empty($family_members) && empty($mother_data)) { ?>
        style="display:none; "  <?php } ?> id="mytable">
        <thead>
        <tr class="info">
            <th style="width: 50px" class="text-center">م</th>
            <th style="width: 30%;" class="text-center"> الإسم</th>
            <th class="text-center">الصلة</th>
            <th class="text-center"> الجنس</th>
            <th style="width: 140px" class="text-center"> الهوية</th>
            <th class="text-center" style="width: 140px"> مصدر الهويه</th>
            <th class="text-center" style="width: 140px"> تاريخ الميلاد</th>
            <th class="text-center"> العمر</th>
            <th class="text-center"> التصنيف</th>
            <th class="text-center"> الإجراء</th>
        </tr>
        </thead>
        <tbody id="resultTable">


        <?php
        $s = 1;
        /*****************************************************************/
        if (isset($mother_data) && !empty($mother_data)) {
            ?>
            <tr id="<?= $s ?>">
                <td style="text-align: center!important;"><?= $s ?></td>
                <td style="width:15%;text-align: center!important;">


                    <?= $mother_data->full_name ?></td>

                <td style=" width:15%;text-align: center!important;">
                    <?php
                    $members = array(
                        41 => 'أم',
                        42 => 'ابن',
                        43 => 'ابنه'
                    );

                    ?>
                    <?php

                    foreach ($members as $key => $value) {
                        if ($mother_data->m_relationship == $key) {
                            echo $value;
                        }
                    }
                    ?>
                </td>
                <td style="width:15%;text-align: center!important;">

                    <?php $gender_arr = array('', 'ذكر', 'أنثى');
                    for ($a = 1; $a < sizeof($gender_arr); $a++) {
                        $select = '';
                        if ($a == $mother_data->m_gender) {
                            echo $gender_arr[$a];
                        }
                    } ?>
                    </select>
                </td>

                <td style="width:15%;text-align: center!important;">
                    <?= $mother_data->mother_national_num_fk ?>
                </td>
                <td style="width:15%;text-align: center!important;">

                    <?php if (!empty($id_source)) {
                        foreach ($id_source as $record_source) {
                            $select = '';
                            if ($record_source->id_setting == $mother_data->m_card_source) {
                                echo $record_source->title_setting;
                            }
                        }
                    } ?>
                    </select>
                </td>


                <td style="width:15%;text-align: center!important;">
                    <?= $mother_data->m_birth_date_hijri ?>
                </td>
                <td style="width:10%;text-align: center!important;">
                    <?php if (!empty($mother_data->m_birth_date_hijri)) {
                        $hijri_date = explode('/', $mother_data->m_birth_date_hijri);
                        $age = $current_year - $hijri_date[2];
                    } else {
                        $age = '';
                    } ?>
                    <?php echo($age); ?></td>
                <td style="width:15%;text-align: center!important;">
                    أرملة

                </td>

                <td style="text-align: center!important;">
                    <a type="button" class="" data-toggle="modal"
                       data-target="#editMotherModal">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>

                    <a onclick=' swal({
                            title: "هل انت متأكد من الحذف ؟",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "حذف",
                            cancelButtonText: "إلغاء",
                            closeOnConfirm: true
                            },
                            function(){
                            swal("تم الحذف!", "", "success");
                            setTimeout(function(){window.location="<?php echo base_url() . 'family_controllers/Family/DeleteMember/' . $mother_data->id . "/" . $mother_num ?>/mother";}, 500);
                            });'>
                        <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a></td>
            </tr>

            <?php $s++;
        }
        if (!empty($family_members)) {


            /********************************************************************/
            foreach ($family_members as $row) { ?>

                <tr id="<?= $s ?>">
                    <td style="text-align: center!important;"><?= $s ?></td>
                    <td style="width:15%;text-align: center!important;">
                        <?= $row->member_full_name ?></td>
                    <td style=" width:15%;text-align: center!important;">
                        <?php
                        $members = array(
                            41 => 'أم',
                            42 => 'ابن',
                            43 => 'ابنه'
                        );

                        ?>

                        <?php

                        foreach ($members as $key => $value) {
                            if ($row->member_relationship == $key) {
                                echo $value;
                            }
                        }
                        ?>
                    </td>
                    <td style="width:15%;text-align: center!important;">

                        <?php $gender_arr = array('', 'ذكر', 'أنثى');
                        for ($a = 1; $a < sizeof($gender_arr); $a++) {
                            $select = '';
                            if ($a == $row->member_gender) {
                                echo $gender_arr[$a];
                            }
                        } ?>
                        </select>
                    </td>
                    </td>
                    <td style="width:15%;text-align: center!important;">
                        <?= $row->member_card_num ?>

                    </td>

                    <td>

                        <?php if (!empty($id_source)) {
                            foreach ($id_source as $record_source) {
                                $select = '';
                                if ($record_source->id_setting == $row->member_card_source) {
                                    echo $record_source->title_setting;
                                }
                            }
                        } ?>
                        </select>
                    </td>

                    <td style="width:15%;text-align: center!important;">

                        <?= $row->member_birth_date_hijri ?></td>
                    <td style="width:15%;text-align: center!important;">
                        <?php if (isset($row->age)) {
                            echo $row->age;
                        } ?></td>
                    <td style="width:15%;text-align: center!important;"
                        id="categoriey_member_div<?= $s ?>">
                        <?php if (!empty($row->tasnef['tasnef_title'])) {
                            echo $row->tasnef['tasnef_title'];
                        } else {
                            echo 'غير محدد';
                        } ?>

                    </td>

                    <td style="text-align: center!important;">
                        <a type="button" class="" data-toggle="modal"
                           data-target="#editMemberModal<?= $row->id ?>">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>

                        <a onclick=' swal({
                                title: "هل انت متأكد من الحذف ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "حذف",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: true
                                },
                                function(){
                                swal("تم الحذف!", "", "success");
                                setTimeout(function(){window.location="<?php echo base_url() . 'family_controllers/Family/DeleteMember/' . $row->id . "/" . $mother_num ?>/f_members";}, 500);
                                });'>
                            <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a></td>
                </tr>

                <?php $s++;
            }
        } ?>
        </tbody>
    </table>
</div>


<?php if (!empty($family_members)) {
    $s = 1;
    foreach ($family_members as $member) { ?>
        <div class="modal fade" id="editMemberModal<?= $member->id ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="width: 90%">
                <div class="modal-content">
                    <?php echo form_open_multipart('family_controllers/Family/UpdateNewMember/' . $member->mother_national_num_fk . "/" . $member->id); ?>

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                style="position: absolute;left: 10px; top: 14px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <table class="table table-bordered">
                            <thead class="green_background">
                            <tr class="info">
                                <th class="text-center"> الإسم</th>
                                <th class="text-center">الصلة</th>
                                <th class="text-center"> الجنس</th>
                                <th class="text-center"> الهوية</th>
                                <th class="text-center"> مصدر الهويه</th>
                                <th class="text-center"> تاريخ الميلاد</th>
                                <th class="text-center"> العمر</th>
                                <th class="text-center"> التصنيف</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $Classification = array(1 => 'أرمل', 2 => 'يتيم', 3 => 'مستفيد بالغ'); ?>
                            <tr id="">

                                <td style="width:18%;text-align: center!important;">
                                    <input type="text" class="form-control"
                                           value="<?= $member->member_full_name ?>"
                                           name="member_full_name"
                                           onload="this.attr('id', 'member_full_name'+getId(this));"
                                           data-validation="required"></td>

                                <td style=" width:8%;text-align: center!important;">
                                    <?php
                                    $members = array(
                                        '41' => 'أم',
                                        '42' => 'ابن',
                                        '43' => 'ابنه'
                                    );
                                    ?>
                                    <select name="member_relationship"
                                            id="member_relationship<?= $member->id ?>"
                                            data-validation="required" class=" form-control"
                                            onchange="gender_select(<?php echo $member->id; ?>)">
                                        <option value="">إختر</option>
                                        <?php
                                        foreach ($members as $key => $value) {
                                            $select = '';
                                            if ($key == $member->member_relationship) {
                                                $select = 'selected';
                                            }
                                            ?>
                                            <option <?php echo $select; ?>
                                                    value="<?php echo $key; ?>"
                                            ><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select></td>
                                <td style="width:15%;text-align: center!important;">
                                    <?php $member_gender = array(
                                        '1' => 'ذكر',
                                        '2' => 'انثي'
                                    );
                                    ?>


                                    <select name="member_gender"
                                            id="member_gender<?= $member->id ?>"
                                            data-validation="required" class=" form-control">
                                        <option value="">إختر</option>
                                        <?php
                                        foreach ($member_gender as $key => $value) {
                                            $select = '';
                                            if ($key == $member->member_gender) {
                                                $select = 'selected';
                                            }
                                            ?>
                                            <option <?php echo $select; ?>
                                                    value="<?= $key ?>"><?= $value ?></option>
                                        <?php } ?>


                                    </select>
                                </td>
                                <td style="width:15%;text-align: center!important;">
                                    <input type="text" name="member_card_num"
                                           value="<?= $member->member_card_num ?>"
                                           id="member_card_num<?= $member->id ?>"
                                           data-validation="required"
                                           onkeyup="check_length_num(this,'10','member_card_num_span')"
                                           maxlength="10"
                                           onkeypress="validate_number(event)"
                                           class="form-control "/>
                                    <small id="member_card_num_span"
                                           class="span-validation"></small>
                                </td>
                                <td style="width:10%;text-align: center!important;">
                                    <select name="member_card_source" id="m_card_source"
                                            data-validation="required" class=" form-control "
                                            style="wi">
                                        <option value="">إختر</option>
                                        <?php if (!empty($id_source)) {
                                            foreach ($id_source as $record_source) {
                                                $select = '';
                                                if ($record_source->id_setting == $member->member_card_source) {
                                                    $select = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $record_source->id_setting; ?>" <?php echo $select; ?>><?php echo $record_source->title_setting; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </td>

                                <td style="width:25%;text-align: center!important;">
                                    <div class="form-group ">

                                        <label class="label text-center">
                                            <img style="width: 18px;float: right;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                            تاريخ الميلاد
                                            <img style="width: 18px;float: left;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                        </label>

                                        <div id="cal-2<?= $member->id ?>"
                                             style="width: 50%;float: right;">
                                            <input id="date-Hijri<?= $member->id ?>"
                                                   name="birth_date_h"
                                                   class="form-control bottom-input "
                                                   data-validation="required"
                                                   type="text"
                                                   onfocus="showCal2<?= $member->id ?>();"
                                                   onchange="GetAge($(this).val(),<?= $member->id ?>);"
                                                   style=" width: 100%;float: right"/>

                                        </div>


                                        <div id="cal-1<?= $member->id ?>"
                                             style="width: 50%;float: left;">
                                            <input id="date-Miladi<?= $member->id ?>"
                                                   name="birth_date_m"
                                                   class="form-control bottom-input  "
                                                   data-validation="required"
                                                   onchange="GetAge($(this).val(),<?= $member->id ?>);"
                                                   type="text"
                                                   onfocus="showCal1<?= $member->id ?>();"
                                                   style=" width: 100%;float: right"/>

                                        </div>
                                    </div>
                                </td>

                                <td style="width:5%;text-align: center!important;">
                                    <input class=" form-control  "
                                           value="<?php if (isset($member->age)) {
                                               echo $member->age;
                                           } ?>" type="text" name="age"
                                           id="myage<?php echo $member->id; ?>" size="60" readonly/>
                                </td>
                                <td style="width:15%;text-align: center!important;">
                                    <div id="categoriey_member_div<?= $member->id ?>"> <?php if (isset($Classification[$member->categoriey_member]) && !empty($Classification[$member->categoriey_member])) {
                                            echo $Classification[$member->categoriey_member];
                                        } ?> </div>

                                    <input type="hidden" name="categoriey_member"
                                           value="<?= $member->categoriey_member ?>"
                                           id="categoriey_member<?php echo $member->id; ?>"/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="UPDTATE_member" class="btn btn-blue btn-close"
                               value="حفظ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق
                        </button>

                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

        <script>

            var loop1<?= $member->id ?> = 0;
            var cal1<?= $member->id ?> = new Calendar(),
                cal2<?= $member->id ?> = new Calendar(true, 0, true, true),
                date1<?= $member->id ?> = document.getElementById('date-Miladi<?= $member->id ?>'),
                date2<?= $member->id ?> = document.getElementById('date-Hijri<?= $member->id ?>'),
                cal1Mode<?= $member->id ?> = cal1<?= $member->id ?>.isHijriMode(),
                cal2Mode<?= $member->id ?> = cal2<?= $member->id ?>.isHijriMode();


            date1<?= $member->id ?>.setAttribute("value", cal1<?= $member->id ?>.getDate().getDateString());
            date2<?= $member->id ?>.setAttribute("value", cal2<?= $member->id ?>.getDate().getDateString());

            document.getElementById('cal-1<?= $member->id ?>').appendChild(cal1<?= $member->id ?>.getElement());
            document.getElementById('cal-2<?= $member->id ?>').appendChild(cal2<?= $member->id ?>.getElement());


            cal1<?= $member->id ?>.show();
            cal2<?= $member->id ?>.show();
            setDateFields1<?= $member->id ?>();


            cal1<?= $member->id ?>.callback = function () {
                if (cal1Mode<?= $member->id ?> !== cal1<?= $member->id ?>.isHijriMode()) {
                    cal2<?= $member->id ?>.disableCallback(true);
                    cal2<?= $member->id ?>.changeDateMode();
                    cal2<?= $member->id ?>.disableCallback(false);
                    cal1Mode<?= $member->id ?> = cal1<?= $member->id ?>.isHijriMode();
                    cal2Mode<?= $member->id ?> = cal2<?= $member->id ?>.isHijriMode();
                } else

                    cal2<?= $member->id ?>.setTime(cal1<?= $member->id ?>.getTime());
                setDateFields1<?= $member->id ?>();
            };

            cal2<?= $member->id ?>.callback = function () {
                if (cal2Mode<?= $member->id ?> !== cal2<?= $member->id ?>.isHijriMode()) {
                    cal1<?= $member->id ?>.disableCallback(true);
                    cal1<?= $member->id ?>.changeDateMode();
                    cal1<?= $member->id ?>.disableCallback(false);
                    cal1Mode<?= $member->id ?> = cal1<?= $member->id ?>.isHijriMode();
                    cal2Mode<?= $member->id ?> = cal2<?= $member->id ?>.isHijriMode();
                } else

                    cal1<?= $member->id ?>.setTime(cal2<?= $member->id ?>.getTime());
                setDateFields1<?= $member->id ?>();
            };


            cal1<?= $member->id ?>.onHide = function () {
                cal1<?= $member->id ?>.show(); // prevent the widget from being closed
            };

            cal2<?= $member->id ?>.onHide = function () {
                cal2<?= $member->id ?>.show(); // prevent the widget from being closed
            };

            function setDateFields1<?= $member->id ?>() {
                if (loop1<?= $member->id ?> === 0) {
                    <?php if (isset($member->member_birth_date_hijri) && !empty($member->member_birth_date_hijri)) {  ?>
                    loop1<?= $member->id ?>++;
                    date1<?= $member->id ?>.value = '<?=$member->member_birth_date?>';
                    date2<?= $member->id ?>.value = '<?=$member->member_birth_date_hijri?>';

                    <?php }else{ ?>
                    date1<?= $member->id ?>.value = cal1<?= $member->id ?>.getDate().getDateString();
                    date2<?= $member->id ?>.value = cal2<?= $member->id ?>.getDate().getDateString();
                    // GetAge(date2.value,1);
                    <?php  } ?>
                } else {
                    date1<?= $member->id ?>.value = cal1<?= $member->id ?>.getDate().getDateString();
                    date2<?= $member->id ?>.value = cal2<?= $member->id ?>.getDate().getDateString();
                    //    GetAge(date2.value,1);
                }
                date1<?= $member->id ?>.setAttribute("value", cal1<?= $member->id ?>.getDate().getDateString());
                date2<?= $member->id ?>.setAttribute("value", cal2<?= $member->id ?>.getDate().getDateString());
                GetAge(date2<?= $member->id ?>.value, <?= $member->id ?>);

            }


            function showCal1<?= $member->id ?>() {
                if (cal1<?= $member->id ?>.isHidden())
                    cal1<?= $member->id ?>.show();
                else
                    cal1<?= $member->id ?>.hide();
            }

            function showCal2<?= $member->id ?>() {
                if (cal2<?= $member->id ?>.isHidden())
                    cal2<?= $member->id ?>.show();
                else
                    cal2<?= $member->id ?>.hide();
            }


        </script>

        <?php $s++;
    }
} ?>




<?php if (isset($mother_data) && !empty($mother_data)) { ?>
    <div class="modal fade" id="editMotherModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="width: 90%">
            <div class="modal-content">
                <?php echo form_open_multipart('family_controllers/Family/UpdateNewMember/' . $mother_data->mother_national_num_fk . "/" . $mother_data->id); ?>

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                            style="position: absolute;left: 10px; top: 14px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <table class="table table-bordered">
                        <thead class="green_background">
                        <tr class="info">
                            <th class="text-center"> الإسم</th>
                            <th class="text-center">الصلة</th>
                            <th class="text-center"> الجنس</th>
                            <th class="text-center"> الهوية</th>
                            <th class="text-center"> مصدر الهويه</th>
                            <th class="text-center"> تاريخ الميلاد</th>
                            <th class="text-center"> العمر</th>
                            <th class="text-center"> التصنيف</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $Classification = array(1 => 'أرمل', 2 => 'يتيم', 3 => 'مستفيد بالغ'); ?>
                        <tr id="">

                            <td style="width:18%;text-align: center!important;">
                                <input type="text" class="form-control"
                                       value="<?= $mother_data->full_name ?>" name="full_name"
                                       onload="this.attr('id', 'member_full_name'+getId(this));"
                                       required="required"></td>

                            <td style=" width:8%;text-align: center!important;">
                                <?php
                                $members = array(
                                    '41' => 'أم',
                                    '42' => 'ابن',
                                    '43' => 'ابنه'
                                );
                                ?>
                                <select name="member_relationship"
                                        id="member_relationship<?= $mother_data->id ?>-mother"
                                        required="required" class=" form-control nonactive"
                                        onchange="gender_select(<?php echo $mother_data->id . '-mother'; ?>)">
                                    <option value="">إختر</option>
                                    <?php
                                    foreach ($members as $key => $value) {
                                        $select = '';
                                        if ($key == 41) {
                                            $select = 'selected';
                                        }
                                        ?>
                                        <option <?php echo $select; ?> value="<?php echo $key; ?>"
                                        ><?php echo $value; ?></option>
                                    <?php } ?>
                                </select></td>
                            <td style="width:10%;text-align: center!important;">
                                <?php $member_gender = array(
                                    '1' => 'ذكر',
                                    '2' => 'انثي'
                                );
                                ?>


                                <select name="member_gender"
                                        id="member_gender<?= $mother_data->id ?>"
                                        required="required" class=" form-control nonactive">
                                    <option value="">إختر</option>
                                    <?php
                                    foreach ($member_gender as $key => $value) {
                                        $select = '';
                                        if ($key == $mother_data->m_gender) {
                                            $select = 'selected';
                                        }
                                        ?>
                                        <option <?php echo $select; ?>
                                                value="<?= $key ?>"><?= $value ?></option>
                                    <?php } ?>


                                </select>
                            </td>

                            <td style="width:15%;text-align: center!important;">
                                <input type="text" name="member_card_num"
                                       value="<?= $mother_data->mother_national_num_fk ?>"
                                       id="member_card_num<?= $mother_data->id ?>"
                                       required="required"
                                       onkeyup="check_length_num(this,'10','member_card_num_span')"
                                       maxlength="10"
                                       onkeypress="validate_number(event)"
                                       class="form-control "/>
                                <small id="member_card_num_span" class="span-validation"></small>
                            </td>

                            <td style="width:10%;text-align: center!important;">
                                <select name="member_card_source" id="m_card_source"
                                        required="required" class=" form-control ">
                                    <option value="">إختر</option>
                                    <?php if (!empty($id_source)) {
                                        foreach ($id_source as $record_source) {
                                            $select = '';
                                            if ($record_source->id_setting == $mother_data->m_card_source) {
                                                $select = 'selected';
                                            }
                                            ?>
                                            <option value="<?php echo $record_source->id_setting; ?>" <?php echo $select; ?>><?php echo $record_source->title_setting; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </td>
                            <td style="width:25%;text-align: center!important;">

                                <div class="form-group ">

                                    <label class="label text-center">
                                        <img style="width: 18px;float: right;"
                                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                        تاريخ الميلاد
                                        <img style="width: 18px;float: left;"
                                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                    </label>

                                    <div id="cal-2_mother"
                                         style="width: 50%;float: right;">
                                        <input id="date-Hijri_mother"
                                               name="birth_date_h"
                                               class="form-control bottom-input "
                                               required="required"
                                               type="text"
                                               onfocus="showCal2_mother();"
                                               onchange="GetAge($(this).val());"
                                               style=" width: 100%;float: right"/>

                                    </div>


                                    <div id="cal-1_mother"
                                         style="width: 50%;float: left;">
                                        <input id="date-Miladi_mother"
                                               name="birth_date_m"
                                               class="form-control bottom-input  "
                                               required="required"
                                               onchange="GetAge($(this).val());"
                                               type="text"
                                               onfocus="showCal1_mother();"
                                               style=" width: 100%;float: right"/>

                                    </div>
                                </div>


                            <td style="width:5%;text-align: center!important;">
                                <?php if (!empty($mother_data->m_birth_date_hijri)) {
                                    $hijri_date = explode('/', $mother_data->m_birth_date_hijri);
                                    $age = $current_year - $hijri_date[2];
                                } else {
                                    $age = '';
                                } ?>
                                <input class=" form-control  " value="<?php echo($age) ?>"
                                       type="text" name="age"
                                       id="myage<?php echo $mother_data->id; ?>" size="60"
                                       readonly/></td>
                            <td style="width:15%;text-align: center!important;">
                                <div id="categoriey_member_div_<?= $mother_data->id ?>"> ارملة</div>

                                <input type="hidden" name="categoriey_m" value="1"
                                       id="categoriey_member_<?php echo $mother_data->id; ?>"/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="UPDTATE_member" class="btn btn-blue btn-close"
                           value="حفظ">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق
                    </button>

                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <script>

        var loop1_mother = 0;
        var cal1_mother = new Calendar(),
            cal2_mother = new Calendar(true, 0, true, true),
            date1_mother = document.getElementById('date-Miladi_mother'),
            date2_mother = document.getElementById('date-Hijri_mother'),
            cal1Mode_mother = cal1_mother.isHijriMode(),
            cal2Mode_mother = cal2_mother.isHijriMode();


        date1_mother.setAttribute("value", cal1_mother.getDate().getDateString());
        date2_mother.setAttribute("value", cal2_mother.getDate().getDateString());

        document.getElementById('cal-1_mother').appendChild(cal1_mother.getElement());
        document.getElementById('cal-2_mother').appendChild(cal2_mother.getElement());


        cal1_mother.show();
        cal2_mother.show();
        setDateFields1_mother();


        cal1_mother.callback = function () {
            if (cal1Mode_mother !== cal1_mother.isHijriMode()) {
                cal2_mother.disableCallback(true);
                cal2_mother.changeDateMode();
                cal2_mother.disableCallback(false);
                cal1Mode_mother = cal1_mother.isHijriMode();
                cal2Mode_mother = cal2_mother.isHijriMode();
            } else

                cal2_mother.setTime(cal1_mother.getTime());
            setDateFields1_mother();
        };

        cal2_mother.callback = function () {
            if (cal2Mode_mother !== cal2_mother.isHijriMode()) {
                cal1_mother.disableCallback(true);
                cal1_mother.changeDateMode();
                cal1_mother.disableCallback(false);
                cal1Mode_mother = cal1_mother.isHijriMode();
                cal2Mode_mother = cal2_mother.isHijriMode();
            } else

                cal1_mother.setTime(cal2_mother.getTime());
            setDateFields1_mother();
        };


        cal1_mother.onHide = function () {
            cal1_mother.show(); // prevent the widget from being closed
        };

        cal2_mother.onHide = function () {
            cal2_mother.show(); // prevent the widget from being closed
        };
        docu

        function setDateFields1_mother() {
            if (loop1_mother === 0) {
                <?php if (isset($mother_data->m_birth_date) && !empty($mother_data->m_birth_date_hijri)) {  ?>
                loop1_mother++;
                date1_mother.value = '<?=$mother_data->m_birth_date?>';
                date2_mother.value = '<?=$mother_data->m_birth_date_hijri?>';

                <?php }else{ ?>
                date1_mother.value = cal1_mother.getDate().getDateString();
                date2_mother.value = cal2_mother.getDate().getDateString();
                // GetAge(date2.value,1);
                <?php  } ?>
            } else {
                date1_mother.value = cal1_mother.getDate().getDateString();
                date2_mother.value = cal2_mother.getDate().getDateString();
                //    GetAge(date2.value,1);
            }
            date1_mother.setAttribute("value", cal1_mother.getDate().getDateString());
            date2_mother.setAttribute("value", cal2_mother.getDate().getDateString());
            GetAge(date2_mother.value, <?php echo $mother_data->id; ?>);

        }


        function showCal1_mother() {
            if (cal1_mother.isHidden())
                cal1_mother.show();
            else
                cal1_mother.hide();
        }

        function showCal2_mother() {
            if (cal2_mother.isHidden())
                cal2_mother.show();
            else
                cal2_mother.hide();
        }


    </script>

<?php } ?>

