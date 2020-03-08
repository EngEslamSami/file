<style>
    button.add_lgna {
        width: auto;
        background-color: #4a59b4;
        border-color: #4c59a7;
        color: #fff;
        padding: 5px 25px;
        border-radius: 0;
    }

    button.add_lgna:hover {
        color: #fff;
        -webkit-transition-duration: .3s;
        transition-duration: .3s;
    }

    .top {
        background-color: #f5f5f5 !important;
        padding: 10px !important;
    }

    .top2 {
        background-color: #d9edf7 !important;
        padding: 10px !important;
    }

    .th-back {
        background-color: #6096b3 !important;
        color: #fff;
    }

</style>
<div class="col-sm-12 no-padding ">
    <div class="col-sm-9 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart('family_controllers/LagnaMembers/add_lagna_member', array('id' => 'myform')); ?>

                <div class="col-xs-12 col-sm-12 ">
                    <div class="form-group col-md-4">
                        <label class="label ">اسم اللجنه:</label>
                        <input type="hidden" name="lagna_name" id="lgna_name" value="لجنة الأسر">


                        <select name="lagna_num_show" id="lagna_num_show" data-validation="required"
                                onchange="get_name();GetMyMembers(this.value)" class="selectpicker form-control "
                                aria-required="true" data-show-subtext="true"
                                data-live-search="true">
                            <option value="">إختر</option>
                            <?php foreach ($all_legan as $row) { ?>
                                <option value="<?= $row->id_lagna . '-' . $row->lagna_name ?>"
                                    <?php if (isset($result_id)) {
                                        if ($row->id_lagna == $result_id->lagna_id_fk) {
                                            echo "selected";
                                        }
                                    } ?>><?= $row->lagna_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label class="label ">رقم اللجنه:</label>
                        <input type="text" name="lgna_num" readonly="" id="lgna_num" value=""
                               class="form-control ">
                    </div>
                </div>
                <?php $f2a_arr = array(1 => 'أعضاء مجلس الإدارة', 2 => 'الجمعية العمومية', 3 => 'موظفين الجمعية', 4 => 'أعضاء اخرى'); ?>
                <div class="col-xs-12 col-sm-12 ">
                    <label class="label   ">الفئة</label>
                    <?php for ($s = 1; $s <= sizeof($f2a_arr); $s++) { ?>
                        <input tabindex="11" type="radio" id="square-radio-1" name="f2a" class="mycheck"
                               onclick="GetMyF2a(<?php echo $s; ?>)" style="margin-right: 10px"
                               value="<?php echo $s; ?>">
                        <label for="square-radio-1" style="margin-left: 10px;"><?php echo $f2a_arr[$s]; ?></label>
                    <?php } ?>
                </div>

                <div class="col-xs-12 col-sm-12 ">
                    <div class="col-xs-12">


                        <div id="f2a1" class="f2a" style="display: none">

                            <?php
                            if (isset($all_member['magls_member']) && !empty($all_member['magls_member'])) { ?>
                                <div class="col-xs-12">
                                    <table class="table table-striped table-bordered dt-responsive nowrap"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr class="green">
                                            <th class="text-center" width="15%">اختر</th>
                                            <th class="text-center" width="50%"> الاسم</th>
                                            <th>المنصب</th>

                                        </tr>
                                        </thead>
                                        <tbody class="FilterTable">
                                        <?php

                                        foreach ($all_member['magls_member'] as $row) {
                                            ?>
                                            <tr>
                                                <input type="hidden" name="type[<?php echo $row->id; ?>]" value="1">
                                                <td class="text-center">
                                                    <input type="checkbox" name="members_id[]" class="tmcheckbox"
                                                           onclick="check_input_box(this,<?php echo $row->id; ?>,'magls_member','submagls_member','member_table')"
                                                           value="<?php echo $row->id; ?>"/></td>
                                                <td class="heading text-center"><?php echo $row->mem_name; ?></td>
                                                <td>
                                                    <input type="radio" name="members_job[<?php echo $row->id; ?>]"
                                                           disabled
                                                           id="magls_member<?php echo $row->id; ?>" class="mains"
                                                           onclick="checkMyStateMain(this.value,'magls_member<?php echo $row->id; ?>')
                                                                   ;checkMyStateMainTable(this,$('#lagna_num_show').val())"
                                                           value="رئيس اللجنة">
                                                    <label for="square-radio-1" style="margin-left: 10px;">رئيس
                                                        اللجنة</label>
                                                    <input type="radio" name="members_job[<?php echo $row->id; ?>]"
                                                           disabled
                                                           id="submagls_member<?php echo $row->id; ?>"
                                                           onclick="checkMyStateSub(this.value,'submagls_member<?php echo $row->id; ?>')
                                                                   ;checkMyStateSubTable(this,$('#lagna_num_show').val())"
                                                           class="subs" value="نائب">
                                                    <label for="square-radio-1" style="margin-left: 10px;">نائب</label>
                                                    <input type="radio" name="members_job[<?php echo $row->id; ?>]"
                                                           disabled
                                                           class="type_job" value="عضو "
                                                           id="member_table<?php echo $row->id; ?>">
                                                    <label for="square-radio-1" style="margin-left: 10px;">عضو</label>
                                                </td>

                                            </tr>
                                            <?php
                                        }

                                        ?>


                                        </tbody>
                                    </table>

                                </div>
                            <?php } else { ?>
                                <div class="btn btn-danger col-sm-12"> لايوجد أعضاء مجلس الإدارة</div>
                            <?php } ?>

                        </div>

                        <div id="f2a2" class="f2a" style="display: none">

                            <?php
                            if (isset($all_member['assembly_member']) && !empty($all_member['assembly_member'])) { ?>
                                <div class="col-xs-12">
                                    <table class="table table-striped table-bordered dt-responsive nowrap table1"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th class="text-center" width="15%">اختر</th>
                                            <th class="text-center" width="50%">الاسم</th>
                                            <th>المنصب</th>

                                        </tr>
                                        </thead>
                                        <tbody class="FilterTable">
                                        <?php
                                        foreach ($all_member['assembly_member'] as $row2) { ?>
                                            <input type="hidden" name="type[<?php echo $row2->id; ?>]" value="2">
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" name="members_id[]" class="tmcheckbox"
                                                           onclick="check_input_box(this,<?php echo $row->id; ?>,'assembly_member','subassembly_member','member_assembly_table')"

                                                           value="<?php echo $row2->id; ?>"/></td>
                                                <td class="heading text-center"><?php echo $row2->name; ?></td>
                                                <td><input type="radio" name="members_job[<?php echo $row2->id; ?>]"
                                                           id="assembly_member<?php echo $row2->id; ?>"
                                                           class="mains" disabled
                                                           onclick="checkMyStateMain(this.value,'assembly_member<?php echo $row2->id; ?>')
                                                                   ,checkMyStateMainTable(this,$('#lagna_num_show').val())"
                                                           value=" رئيس اللجنة">
                                                    <label for="square-radio-1" style="margin-left: 10px;">رئيس
                                                        اللجنة</label>
                                                    <input type="radio" name="members_job[<?php echo $row2->id; ?>]"
                                                           id="subassembly_member<?php echo $row2->id; ?>" disabled
                                                           onclick="checkMyStateSub(this.value,'subassembly_member<?php echo $row2->id; ?>')
                                                                   ,checkMyStateSubTable(this,$('#lagna_num_show').val())"
                                                           class="subs" value="  نائب ">
                                                    <label for="square-radio-1" style="margin-left: 10px;">نائب</label>
                                                    <input type="radio" name="members_job[<?php echo $row2->id; ?>]"
                                                           disabled
                                                           value=" عضو "
                                                           id="member_assembly_table<?php echo $row2->id; ?>">
                                                    <label for="square-radio-1" style="margin-left: 10px;">عضو</label>
                                                </td>


                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>

                                </div>
                            <?php } else { ?>
                                <div class="btn btn-danger col-sm-12"> لايوجد أعضاء الجمعية العمومية</div>
                            <?php } ?>
                        </div>

                        <div id="f2a3" class="f2a" style="display: none">
                            <div class="form-group col-md-4">
                                <label class="label ">الإدارات:</label>
                                <select name="department" id="department"
                                        onchange="getDepartmentEmp(this.value);" class="selectpicker form-control "
                                        aria-required="true" data-show-subtext="true"
                                        data-live-search="true">
                                    <option value="">إختر الإدارة</option>
                                    <?php if (!empty($department_jobs)) {
                                        foreach ($department_jobs as $row) { ?>
                                            <option value="<?= $row->id ?>"><?= $row->name ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>

                        </div>

                        <div id="f2a4" class="f2a" style="display: none">
                            <div class="form-group col-xs-12">
                                <button type="button" value="" id="" onclick="add_row()"
                                        class="btn btn-success btn-next"/>
                                <i class="fa fa-plus"></i> إضافة </button><br>
                                <div class="col-xs-10">
                                    <table class="table table-striped table-bordered" style="display: none"
                                           id="mytable">
                                        <thead>
                                        <tr class="info">
                                            <th>م</th>
                                            <th>الإسم</th>
                                            <th> الوظيفه</th>
                                        </tr>
                                        </thead>
                                        <tbody id="load_form">

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 text-center"><br>
                    <input type="hidden" name="add_lgna" value="add_lgna"/>

                    <button type="button" onclick="check_to_save()" class="btn btn-labeled btn-success ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>

                </div>

            </div>
            <?php echo form_close() ?>
        </div>
    </div>

    <div class="col-sm-3 no-padding">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h6 class="panel-title">الأعضاء الذين تم اختيارهم</h6>
            </div>
            <div class="panel-body">
                <ol id="results">
                    <div class="btn btn-danger col-xs-12" id="mydiv"> لا يوجد أعضاء !!</div>
                </ol>
            </div>
        </div>

    </div>

</div>
<!--<pre>
                <?php /*print_r($records) */ ?>
            </pre>-->
<div class="col-xs-12 col-sm-12 ">
    <?php if (isset($records) && !empty($records)) {
        ?>
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th class="text-center th-back">م</th>
                <th class="text-center th-back">اسم اللجنه</th>
                <th class="th-back">رقم اللجنه</th>
                <th class="th-back">حذف اللجنه</th>
                <th class="th-back">اسماء اعضاء اللجنه</th>
                <th class="th-back">وظيفه العضو</th>
                <th class="th-back">حالة العضو</th>
                <th class="th-back">حذف العضو</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x = 1;
            $suspend_arr = array('غير نشط', 'نشط ');
            $button_arr = array('btn-danger', 'btn-success ');
            foreach ($records as $record) {
                $count = sizeof($record->members); ?>
                <tr>
                <td style="border-bottom: 3px solid #ddd !important"
                    rowspan="<?php echo $count; ?>"><?php echo $x; ?></td>
                <td style="border-bottom: 3px solid #ddd !important"
                    rowspan="<?php echo $count; ?>"><?php echo $record->lagna_name; ?> </td>
                <td style="border-bottom: 3px solid #ddd !important"
                    rowspan="<?php echo $count; ?>"><?php echo $record->lagna_num; ?></td>
                <td style="border-bottom: 3px solid #ddd !important"
                    rowspan="<?php echo $count; ?>">
                    <a href="<?php echo base_url(); ?>family_controllers/LagnaMembers/delete_lgna/<?php echo $record->lagna_num; ?>"
                       onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                     aria-hidden="true"></i></a>
                    </br>
                    <small style="color: red;">تنبيه هام جدا! عند الضغط ع هذا الزر</br> يتم حذف اللجنه بالكامل</small>
                </td>
                <?php
                if (isset($record->members) && !empty($record->members)) {

                    foreach ($record->members as $member) {
                        $z = 1;
                        ?>
                        <td <?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                            <?php echo $member->member_num; ?>
                        </td>
                        <td<?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                            <?php echo $member->member_job; ?>
                        </td>
                        <td<?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                            <button class="btn <?php echo $button_arr[$member->suspend]; ?>"
                                 onclick="change_suspend(<?php echo $member->id; ?>,<?php echo $member->suspend; ?>)">
                                <?php echo $suspend_arr[$member->suspend]; ?></button>
                        </td>
                        <td <?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                            <a href="<?php echo base_url(); ?>family_controllers/LagnaMembers/delete_member/<?php echo $member->id; ?>"
                               onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                             aria-hidden="true"></i></a>
                        </td>
                        </tr>
                        <?php
                        $z++;
                    }
                } ?>


                <?php
                $x++;
            }

            ?>


            </tbody>
        </table>

    <?php } else {
        ?>
        <div class=" alert  alert-danger " style=" font-size: large"> لم يتم اضافه أعضاء لجان</div>

    <?php } ?>

</div>


<!------------------------------------scripts------------------------------------>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>

    function check_to_save() {

        var radiof2aValue = $("input[name='f2a']:checked").val();
        if (radiof2aValue && (radiof2aValue != 4)) {
            // $("#myForm input[type=radio]:checked").each(function() {
            var my_radios = [];
            $("#f2a" + radiof2aValue + " input[type=radio]:checked").each(function () {
                my_radios.push($(this).val());
            });
            var my_check_boxs = [];
            $("#f2a" + radiof2aValue + " input[type=checkbox]:checked").each(function () {
                my_check_boxs.push($(this).val());
            });

            console.log(" my_radios :" + my_radios.length + "\t my_check_boxs : " + my_check_boxs.length);

            if ((my_check_boxs.length <= 0)) {
                swal({
                    title: 'من فضلك راجع اختيار الاعضاء.  ',
                    type: 'warning',
                    confirmButtonText: 'تم'
                });
            } else {
                if ((my_radios.length != my_check_boxs.length)) {
                    swal({
                        title: 'من فضلك راجع اختيار مناصب الاعضاء.  ',
                        type: 'warning',
                        confirmButtonText: 'تم'
                    });
                } else {
                    $('#myform').submit();

                }
            }


        } else if (radiof2aValue && (radiof2aValue == 4)) {
            var my_radios = [];
            $("#f2a" + radiof2aValue + " input[type=radio]:checked").each(function () {
                my_radios.push($(this).val());
            });
            var rowCount = $('#mytable tr').length - 1;
            console.log(" my_radios :" + my_radios.length + "\t rowCount : " + rowCount);

            if (my_radios.length != rowCount) {
                swal({
                    title: 'من فضلك راجع اختيار مناصب الاعضاء.  ',
                    type: 'warning',
                    confirmButtonText: 'تم'
                });
            } else {
                $('#myform').submit();

            }
        }


    }
</script>


<script>
    function check_input_box(obj, id, input1, input2, input3) {

        if (obj.checked) {
            $('#' + input1 + id).removeAttr('disabled');
            $('#' + input2 + id).removeAttr('disabled');
            $('#' + input3 + id).removeAttr('disabled');


        } else {
            $('#' + input1 + id).attr('disabled', 'disabled');
            $('#' + input1 + id).removeAttr('checked');
            $('#' + input2 + id).attr('disabled', 'disabled');
            $('#' + input2 + id).removeAttr('checked');
            $('#' + input3 + id).attr('disabled', 'disabled');
            $('#' + input3 + id).removeAttr('checked');


        }
    }
</script>
<script>
    function change_suspend(id,suspend) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/LagnaMembers/change_suspend",
            data: {id: id,suspend:suspend},
            success: function (d) {
            window.reload();
        }


        });
    }

</script>

<script>
    // $("div.tab-pane").each(function(){
    $(".tmcheckbox").change(function () {
        $('#mydiv').hide();
        var value = $(this).val(),
            //$list = $(this).closest(".tab-pane").find(".results");
            $list = $('.results');

        if (this.checked) {
            var allData = $(this).closest('tr').find('.heading').text();

            $list.append("<li data-value='" + value + "'>" + allData + "</li>");
        } else {
            $list.find('li[data-value="' + value + '"]').slideUp("fast", function () {
                $(this).remove();
            });
        }
    });
    // });
</script>
<script>
    // $("div.tab-pane").each(function(){
    $(".tmcheckbox2").change(function () {

        var value = $(this).val(),
            // $list = $(this).closest(".tab-pane").find(".results");
            $list = $('.results');

        if (this.checked) {
            var allData = $(this).closest('tr').find('.heading').text();

            $list.append("<li data-value='" + value + "'>" + allData + "</li>");
        } else {
            $list.find('li[data-value="' + value + '"]').slideUp("fast", function () {
                $(this).remove();
            });
        }
    });
    // });
</script>
<script>
    // $("div.tab-pane").each(function(){
    $(".tmcheckbox3").change(function () {

        var value = $(this).val();


        $list = $('.results');


        if (this.checked) {
            var allData = $(this).closest('tr').find('.heading').text();

            $list.append("<li data-value='" + value + "'>" + allData + "</li>");
        } else {
            $list.find('li[data-value="' + value + '"]').slideUp("fast", function () {
                $(this).remove();
            });
        }
    });
    // });
</script>


<script>
    function get_name() {
        var totalData = $('#lagna_num_show').val();
        var res = totalData.split("-");
        $('#lgna_num').val(res[0]);
        $('#lgna_name').val(res[1]);
    }
</script>


<script>


    function GetMyMembers(valu) {
        var res = valu.split("-");
        var lgna_id = res[0];
        if (lgna_id != '') {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/LagnaMembers/GetMyMembers",
                data: {lgna_id: lgna_id},
                success: function (d) {
                    $('#results').html(d);
                }


            });
        }


    }

</script>
<script>
    function reload() {
        location.reload();
    }
</script>


<!------------------------------------------myScripts---------------------------------------->
<script>

    function GetMyF2a(valux) {
        if ($('#lagna_num_show').val() == '') {
            $('.mycheck').removeAttr('checked');
            swal({
                title: 'رجاء إختار اللجنة  ',
                type: 'warning',
                confirmButtonColor: '#eea236',
                confirmButtonText: 'تم'
            });
            // alert('رجاء إختار اللجنة !!');
        } else {
            if (valux != '') {
                $('.f2a').hide();
                $('#f2a' + valux).show();
            }
        }

    }

</script>


<script>

    function getDepartmentEmp(valux) {
        var lagna_id = $('#lagna_num_show').val();
        var res = lagna_id.split("-");
        if (valux != '') {
            var dataString = 'depart=' + valux + '& lagna_id=' + res[0];
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/LagnaMembers/get_emp",
                data: dataString,
                success: function (d) {
                    $('#f2a3').html(d);
                }


            });
        }
    }

</script>

<script>
    var a = 1;

    function add_row() {
        $("#mytable").show();

        //  var x = document.getElementById('resultTable');
        var len = a++;
        //  var lenth = x.rows.length;
        var dataString = 'lenth=' + len;
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/LagnaMembers/make_form",
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#load_form").append(html);
                $("#mytableButton").show();
            }
        });

    }

    //-----------------------------------------------

</script>


<script>

    function checkMyStateMain(valuxz, myid) {

        var main_ids = [];
        $(".mains:radio:checked").each(function () {
            main_ids.push($(this).val());
        });

        if (valuxz != '') {

            if (main_ids.length > 1) {
                swal({
                    title: ' تم إختيار رئيس اللجنة من قبل . ',
                    type: 'warning',
                    confirmButtonColor: '#eea236',
                    confirmButtonText: 'تم'
                });
                // alert('تم إختيار رئيس اللجنة');
                $('#' + myid).removeAttr('checked');
            }


        }
    }


    function checkMyStateMainTable(valuxz, myid) {

        if (valuxz.value != '') {
            var res = myid.split("-");
            var lgna_id = res[0];
            var dataString = 'type=' + valuxz.value + '&lgna_id=' + lgna_id;
            // alert(dataString);
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/LagnaMembers/GetFromTable",
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);
                    if (JSONObject > 0) {
                        swal({
                            title: 'يوجد بالفعل رئيس لهذه اللجنة . ',
                            type: 'warning',
                            confirmButtonColor: '#eea236',
                            confirmButtonText: 'تم'
                        });
                        $('.mains').removeAttr('checked');
                        $(valuxz).attr('disabled', 'disabled');
                    }
                }
            });


        }

    }
</script>

<script>

    function checkMyStateSub(valuxz, myid) {


        var sub_ids = [];
        $(".subs:radio:checked").each(function () {
            sub_ids.push($(this).val());
        });

        if (valuxz != '') {
            if (sub_ids.length > 1) {
                swal({
                    title: 'تم إختيار  نائب رئيس اللجنة.',
                    type: 'warning',
                    confirmButtonColor: '#eea236',
                    confirmButtonText: 'تم'
                });
                // alert('تم إختيار  نائب رئيس اللجنة');
                $('#' + myid).removeAttr('checked');
            }


        }
    }


</script>
<script>
    function checkMyStateSubTable(valuxz, LagnaId) {

        if (valuxz.value != '') {
            var res = LagnaId.split("-");
            var lgna_id = res[0];
            var dataString = 'type=' + valuxz.value + '& lgna_id=' + lgna_id;
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/LagnaMembers/GetFromTable",
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);
                    if (JSONObject > 0) {
                        swal({
                            title: 'يوجد بالفعل نائب رئيس لهذه اللجنة . ',
                            type: 'warning',
                            confirmButtonColor: '#eea236',
                            confirmButtonText: 'تم'
                        });
                        // alert('تم إختيار نائب رئيس اللجنة');
                        $('.subs').removeAttr('checked');
                        $(valuxz).attr('disabled', 'disabled');
                    }
                }
            });
        }

    }
</script>
<!------------------------------------------myScripts---------------------------------------->


