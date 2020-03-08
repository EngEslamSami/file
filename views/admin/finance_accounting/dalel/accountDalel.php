<style type="text/css">
    .padd {
        padding: 0 3px !important;
    }

    .no-padding {
        padding: 0;
    }

    .no-margin {
        margin: 0;
    }

    h4 {
        margin-top: 0;
    }

    .btn-group > .btn, .btn-group > .btn + .btn, .btn-group > .btn:first-child, .fc .fc-button-group > * {
        height: 34px !important;
        border-radius: 4px !important;
        margin: 0 !important;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: 92% !important;
    }

    .btn-label {
        left: 12px;
    }

    .tree ul {
        margin-right: 10px;
        position: relative;
        margin-left: 0;
    }

    .tree ul li {
        padding-left: 0;
    }

    .tree ul ul {
        margin-left: 0;
    }

    @media (min-width: 992px) {
        .col_md_10 {
            width: 10%;
            float: right;
        }

        .col_md_15 {
            width: 15%;
            float: right;
        }

        .col_md_20 {
            width: 20%;
            float: right;
        }

        .col_md_25 {
            width: 25%;
            float: right;
        }

        .col_md_30 {
            width: 30%;
            float: right;
        }

        .col_md_35 {
            width: 35%;
            float: right;
        }

        .col_md_40 {
            width: 40%;
            float: right;
        }

        .col_md_45 {
            width: 45%;
            float: right;
        }

        .col_md_50 {
            width: 50%;
            float: right;
        }

        .col_md_60 {
            width: 60%;
            float: right;
        }

        .col_md_70 {
            width: 70%;
            float: right;
        }

        .col_md_75 {
            width: 75%;
            float: right;
        }

        .col_md_80 {
            width: 80%;
            float: right;
        }

        .col_md_85 {
            width: 85%;
            float: right;
        }

        .col_md_90 {
            width: 90%;
            float: right;
        }

        .col_md_95 {
            width: 95%;
            float: right;
        }

        .col_md_100 {
            width: 100%;
            float: right;
        }
    }

    .label_title_2 {
        width: 100%;
        color: #000;
        height: auto;
        margin: 0;
        font-family: 'hl';
        padding-right: 0px;
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
        display: inline-block;
    }

    .input_style_2 {
        border-radius: 0px;
        width: 100%;
    }

    ul span {
        display: inline !important;
    }

    span.dalel-num {
        padding: 1px 4px;
        border-radius: 2px;

    }

    .scrol_width ::-webkit-scrollbar {
        width: 15px;
        height: 5px;
    }

    .tree li a {
        font-size: 16px;
    }

</style>

<style>
    fieldset {
        border: 1px solid #ddd !important;
        margin: 0;
        xmin-width: 0;
        padding: 10px;
        position: relative;
        border-radius: 4px;
        background-color: #f5f5f5;
        padding-left: 10px !important;
    }

    legend {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 0px;
        width: 35%;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px 5px 5px 10px;
        background-color: #ffffff;
    }
</style>

<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <div class="panel-title">
            <h4>إضافة حساب</h4>
        </div>
    </div>
    <div class="panel-body">
        <?php if (isset($from_id) && ($from_id == 0)) { ?>

        <div class="col-md-7 col-sm-12 col-xs-12 padding-4">
            <?php }
            ?>


            <?php
            $id = $this->uri->segment(5);
            $readonly = '';
            $disabled = '';
            $required = 'required';
            $submitEdit = 'button';
            $submitSave = 'button';
            if ($id != "") {
                $submitEdit = '';
                echo form_open_multipart('finance_accounting/dalel/Dalel/update/' . $id, array('id' => 'MyFormDalil'));
                if (isset($details)) {
                    if ($details['hesab_no3'] != 1) {
                        $readonly = 'readonly';
                        $display_markz_tklfa = "block";

                    } else {
                        $display_markz_tklfa = "none";

                    }
                    if ($details['branch'] != null) {
                        $disabled = 'disabled';
                    } elseif ($details['level'] == 1) {
                        $disabled = '';
                        $required = '';
                    }

                    if ($details['markz_tklfa'] == 1) {
                        $disabled_markz_tklfa = '';

                    } else {
                        $disabled_markz_tklfa = 'disabled';

                    }
                }
            } else {
                $submitSave = '';
                $display_markz_tklfa = "none";
                $disabled_markz_tklfa = 'disabled';
                echo form_open_multipart('finance_accounting/dalel/Dalel/addAccount', array('id' => 'MyFormDalil'));
            }
            $mainAccount = array(1 => 'الأصول', 2 => 'الخصومات', 3 => 'الإيرادات', 4 => 'المصروفات');
            $types = array(1 => 'رئيسي', 2 => 'فرعي');
            //$nature = array('إختر', 'مدين', 'دائن');
            $nature = array( 1=>'مدين',2=> 'دائن');
            $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
            //14-1-om
            $markz_tklfa_arr = array(1 => 'نعم', 2 => 'لا');

            ?>
            <div class="form-group col-sm-12 col-xs-12 no-padding">
                <input type="hidden" name="" id="from_id" value="<?= $from_id ?>">

                <!--14-1-om-->
                <fieldset>
                    <legend> بيانات الحساب</legend>

                    <div class="col-md-5 col-sm-6 padding-4">


                        <h6 class="label_title_2 ">الحساب الرئيسي </h6>
                        <input class="form-control " id="parent_name<?= $from_id ?>" name="parent_name" readonly
                               data-validation="<?= $required ?>"
                               value="<?php if (isset($details)) echo $details['parent_code'] . '--' . $details['parent_name'] ?>"
                               onclick="$('#myModal<?= $from_id ?>').modal('show'); GetDiv_accounts('myDiv_account<?= $from_id ?>')"
                            <?= $disabled ?> >
                        <input type="hidden" id="parent<?= $from_id ?>" name="parent"
                               value="<?php if (isset($details)) echo $details['parent'] ?>">


                    </div>
                    <div class="modal fade" id="myModal<?= $from_id ?>" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">

                        <div class="modal-dialog" role="document" style="width: 90%">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <button type="button" class="close"
                                            onclick="$('#myModal<?= $from_id ?>').modal('hide')">&times;
                                    </button>

                                    <h4 class="modal-title">الدليل المحاسبي </h4>

                                </div>
                                <div class="modal-body">
                                    <div id="myDiv_account<?= $from_id ?>"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                            onclick="$('#myModal<?= $from_id ?>').modal('hide')">إغلاق
                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!--14-1-om-->

                    <div class="col-md-2 col-sm-6 padding-4">

                        <h6 class="label_title_2 ">رقم الحساب </h6>

                        <input type="text" id="code<?= $from_id ?>" name="code"
                               value="<?php if (isset($details)) echo $details['code'] ?>"
                               class="form-control input_style_2 input-style" placeholder="رقم الحساب"
                               data-validation="required" <?= $readonly ?> <?= $disabled ?>>

                    </div>

                    <div class="col-md-5 col-sm-6 padding-4">

                        <h6 class="label_title_2 ">إسم الحساب </h6>

                        <input type="text" id="name<?= $from_id ?>" name="name"
                               value="<?php if (isset($details)) echo $details['name'] ?>"
                               class="form-control input_style_2 input-style" placeholder="إسم الحساب"
                               data-validation="required">

                    </div>

                    <div class="col-md-4 col-sm-6 padding-4">

                        <h6 class="label_title_2 ">نوع الحساب </h6>

                        <?php
                        foreach ($types as $key => $value) {
                            $check = '';
                            if (isset($details) && $details['hesab_no3'] == $key) {
                                $check = 'checked';
                            }
                            ?>
                            <div class="radio-content">
                                <input type="radio" id="rsd<?= $key ?><?= $from_id ?>" name="hesab_no3"
                                       class='hesab_no3<?= $from_id ?>'
                                       class="input_style_2"
                                       onclick="show_markz(this)"
                                       value="<?= $key ?>" data-validation="required" <?= $check ?> <?= $disabled ?>>
                                <label class="radio-label" for="rsd<?= $key ?><?= $from_id ?>"><?= $value ?></label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="col-md-3 col-sm-6 padding-4">

                        <h6 class="label_title_2 ">طبيعة الحساب </h6>

                        <select name="hesab_tabe3a" id="hesab_tabe3a<?= $from_id ?>" class="form-control input_style_2"
                                data-validation="required" aria-required="true" tabindex="-1"
                                aria-hidden="true" <?= $disabled ?>>
                                 <option value="">إختر</option>
                            <?php
                            foreach ($nature as $key => $value) {
                                $select = '';
                                if (isset($details) && $details['hesab_tabe3a'] == $key) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col-md-5 col-sm-6 padding-4">

                        <h6 class="label_title_2 ">تبويب الحساب </h6>

                        <select name="hesab_report" id="hesab_report<?= $from_id ?>" class="form-control input_style_2"
                                data-validation="required" aria-required="true" tabindex="-1"
                                aria-hidden="true" <?= $disabled ?>>
                            <option value="">إختر</option>
                            <?php
                            foreach ($follow as $key => $value) {
                                $select = '';
                                if (isset($details) && $details['hesab_report'] == $key) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>
                    <?php
                    if (isset($details) && (!empty($details))) {
                        ?>
                        <div class="col-xs-12 text-center">

                            <div class="col-md-9 col-sm-6 padding-4">
                            </div>
    <div class="col-md-3 col-sm-6 padding-4">
        <br>
        <button type="button"
                class="btn btn-labeled btn-success " id="save_account_dalel"
                onclick="editAccounDalel_ajex(1)" name="add" value="حفظ">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            بيانات
            الحساب
        </button>
    </div>
                        </div>
                    <?php } ?>
                </fieldset>
                <!--14-1-om-->
                <fieldset id="markz_tklfa_div<?= $from_id ?>" style="margin-top: 20px; display: <?= $display_markz_tklfa ?>">
                    <legend> مراكز التكلفة</legend>

                    <div class="col-xs-12 ">

                        <div class="col-md-4 col-sm-6 padding-4">

                            <h6 class="label_title_2 ">مركز التكلفة </h6>

                            <?php
                            foreach ($markz_tklfa_arr as $key => $value) {
                                $check = '';
                                if (isset($details) && $details['markz_tklfa'] == $key) {
                                    $check = 'checked';
                                }
                                ?>
                                <div class="radio-content">
                                    <input type="radio" id="markz_tklfa<?= $key ?><?= $from_id ?>" name="markz_tklfa"
                                           class='markz_tklfa<?= $from_id ?>'
                                           onclick="check_markz_tklfa(this)"
                                           class="input_style_2"
                                           value="<?= $key ?>"
                                           data-validation="required" <?= $check ?> >
                                    <label class="radio-label"
                                           for="markz_tklfa<?= $key ?><?= $from_id ?>"><?= $value ?></label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                        <div class="col-md-4 col-sm-3 col-xs-6">
                            <label class="label "> مركز التكلفه</label>
                            <select id="markz_tklfa_fk<?= $from_id ?>" name="markz_tklfa_fk[]" multiple
                                    title="يمكنك إختيار أكثر من مركز"
                                    class="form-control selectpicker" <?= $disabled_markz_tklfa ?>
                                    data-show-subtext="true"
                                    data-live-search="true">
                                <option value="">إختر</option>
                                <?php
                                foreach ($marakez as $key) {

                                    $select = '';
                                    if (isset($details['marakez']) && (!empty($details['marakez']))) {
                                        if (in_array($key->id, $details['marakez'])) {
                                            $select = 'selected';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->name; ?></option>
                                <?php } ?>
                            </select>

                        </div>
                        <?php
                        if (isset($details) && (!empty($details))) {

                            ?>
                            <div class="col-xs-12 text-center">

                                <div class="col-md-9 col-sm-6 padding-4">
                                </div>
                                <div class="col-md-3 col-sm-6 padding-4">

                                    <button type="button"
                                            class="btn btn-labeled btn-success " id="save_account_dalel"
                                            onclick="editAccounDalel_ajex(2)" name="add" value="حفظ">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                        مراكز التكلفة
                                    </button>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <!--14-1-om-->
                </fieldset>

                <div class="col-xs-12 text-center">
                    <br/>
                    <input type="hidden" name="level" id="level<?= $from_id ?>"
                           value="<?php if (isset($details)) echo $details['level'] ?>"/>
                    <input type="hidden" name="id" id="id<?= $from_id ?>"
                           value="<?php if ($id != '') echo $id; else echo 0; ?>">
                    <input type="hidden" name="ttype" id="ttype<?= $from_id ?>"
                           value="<?php if ($id != '') echo $details['ttype']; ?>">
                    <input type="hidden" name="parent_code" id="parent_code<?= $from_id ?>"
                           value="<?php if ($id != '') echo $details['parent_code']; ?>">
                    <?php if (isset($from_id) && ($from_id == 0)) { ?>

    <button type="button" class="btn btn-labeled btn-success" name="save" value="save"
    onclick="save_account()"
            id="myBtn">
        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
    </button>

                        <button type="<?= $submitEdit ?>" class="btn btn-labeled btn-warning" style="color: #002342;"
                                name="edit" value="edit">
                            <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>تعديل
                        </button>

                        <button type="button" class="btn btn-labeled btn-danger">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                        </button>

                        <button type="button" class="btn btn-labeled btn-purple" data-toggle="modal"
                                data-target="#searchDalel"
                                data-ui-class="a-lightSpeed">
                            <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>بحث
                        </button>
                    <?php } ?>

                </div>
                <?php echo form_close() ?>
            </div>

        </div>

        <!---------------------------------------------------------------------------->
        <?php if (isset($from_id) && ($from_id == 0)) { ?>
            <div class=" col-md-5 col-sm-12 col-xs-12 padding-4" id="Div_tree">

            </div>
        <?php } ?>

    </div>
</div>

<!---------------------------------------------------------------------------->
<div class="modal fade" id="editAccounDalel" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog " style="width: 80%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel_header"></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                    <div class="  col-xs-12 no-padding" id="load_Accoun">


                    </div>
                </div>

            </div>
            <div class="modal-footer">

                <!-- <button type="button"
                         class="btn btn-labeled btn-success " id="save_account_dalel" onclick="editAccounDalel_ajex(0)"
                         name="add" value="حفظ">
                     <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                 </button>-->

                <span class=" label-danger" id="save_start_work_span" style="display: none;float: right">  </span>

                <button type="button"
                        class="btn btn-labeled btn-danger "  data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal animate " id="searchDalel" tabindex="-1" role="dialog" aria-labelledby="searchDalel"
     data-backdrop="true" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">جدول الدليل الحسابي</h4>
            </div>
            <div class="modal-body">
                <table class="example table table-bordered" role="table">
                    <thead>
                    <tr class="info">
                        <th class="text-left">رقم الحساب</th>
                        <th class="text-left">إسم الحساب</th>
                        <th class="text-left">نوع الحساب</th>
                        <th class="text-left">مستوى الحساب</th>
                        <th class="text-left">طبيعة الحساب</th>
                        <th class="text-left">التبويب</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($tree) && $tree != null) {
                        buildTreeTableModal($tree);
                    }
                    function buildTreeTableModal($tree)
                    {
                        $types = array(1 => 'رئيسي', 2 => 'فرعي');
                        $nature = array('', 'مدين', 'دائن');
                        $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
                        $color = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#145b5d', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');

                        foreach ($tree as $record) {
                            ?>
                            <tr style="background-color: <?= $color[$record->level] ?>; cursor: pointer;"
                                onclick="window.location.href = '<?= base_url() . 'finance_accounting/dalel/Dalel/editAccount/' . $record->id ?>';">
                                <td><?= $record->code ?></td>
                                <td><?= $record->name ?></td>
                                <td><?= $types[$record->hesab_no3] ?></td>
                                <td><?= 'المستوى' . $record->level ?></td>
                                <td><?= $nature[$record->hesab_tabe3a] ?></td>
                                <td><?= $follow[$record->hesab_report] ?></td>
                            </tr>
                            <?php
                            if (isset($record->subs)) {
                                $count = buildTreeTableModal($record->subs);
                            }
                        }
                    }

                    ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-labeled btn-danger" data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>


<?php if (isset($from_id) && ($from_id == 0)) { ?>

    <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

    <script>

        $(document).ready(function () {
           // GetDiv_tree('Div_tree');
        });
    </script>
<?php } ?>




<?php if (isset($from_id) && ($from_id != 0)) { ?>

    <script>
        $('.selectpicker').selectpicker("refresh");
        $("#from_id").val(<?=$from_id?>);
    </script>
<?php } ?>
<!--14-1-om-->
<?php if (isset($from_id) && ($from_id == 0)) { ?>


<script>

    function save_account() {
        console.warn('save_account');
        var from_id = $("#from_id").val();

        var all_inputs = $('[data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val() != '') {
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        var markz_tklfa_fk = $('#markz_tklfa_fk'+from_id).val();
        var hesab_no3 = $("input[name='hesab_no3']:checked").val();
        var markz_tklfa = $("input[name='markz_tklfa']:checked").val();
        console.warn("markz_tklfa_fk " + markz_tklfa_fk);
        console.warn("hesab_no3 " + "input[class='hesab_no3"+ from_id+"']:checked");
        console.warn("hesab_no3 " + hesab_no3);
        if (!hesab_no3) {
            valid = 0;
            text_valid += "- نوع الحساب ";
        } else if (hesab_no3 == 2) {
            if (!markz_tklfa) {
                valid = 0;
                text_valid += "- مركز التكلفة ";
            } else if (markz_tklfa == 1) {
                if (markz_tklfa_fk === null) {
                    console.warn("markz_tklfa_fk " + markz_tklfa_fk);
                    valid = 0;
                    text_valid += "- مركز التكلفة ";
                } else {
                }
            }
        }

        if (valid == 0) {
            swal({
                title: 'من فضلك ادخل كل الحقول ',
                text: text_valid,
                type: 'error',
                confirmButtonText: 'تم'
            });
            return;
        } else if (valid == 1) {
            swal({
                title: 'جاري اضافة حساب ',
                type: 'success',
                confirmButtonText: 'تم'
            });
            $("#MyFormDalil").submit();
        }


    }

</script>

    <script>

        function editAccounDalel(id) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/editAccount/' + id,
                data: {id: id},
                cache: false,
                beforeSend: function () {
                    $("#load_Accoun").html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {
                    $("#load_Accoun").html(html);

                }
            });
        }

        function editAccounDalel_ajex(method) {
            var from_id = $("#from_id").val();

            var id = $('#id' + from_id).val();
            var level = $('#level' + from_id).val();
            var ttype = $('#ttype' + from_id).val();
            var parent_code = $('#parent_code' + from_id).val();
            var parent_name = $('#parent_name' + from_id).val();
            var parent = $('#parent' + from_id).val();
            var code = $('#code' + from_id).val();
            var name = $('#name' + from_id).val();
            var hesab_tabe3a = $('#hesab_tabe3a' + from_id).val();
            var hesab_report = $('#hesab_report' + from_id).val();
            var markz_tklfa_fk = $('#markz_tklfa_fk' + from_id).val();
            var hesab_no3 = $("input[class='hesab_no3'+from_id]:checked").val();
            var markz_tklfa = $("input[class='markz_tklfa'+from_id]:checked").val();
            // console.warn('hesab_no3:'+hesab_no3);
            // console.warn('name:'+name);
            // console.warn('markz_tklfa_fk :'+markz_tklfa_fk);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/update/' + id,
                data: {
                    method: method,
                    id: id,
                    level: level,
                    ttype: ttype,
                    parent_code: parent_code,
                    parent_name: parent_name,
                    parent: parent,
                    code: code,
                    name: name,
                    hesab_tabe3a: hesab_tabe3a,
                    hesab_report: hesab_report,
                    markz_tklfa_fk: markz_tklfa_fk,
                    hesab_no3: hesab_no3,
                    markz_tklfa: markz_tklfa,
                    from_ajex: 1

                },
                cache: false,
                beforeSend: function () {
                    swal({
                        title: 'جاري التعديل ',
                        type: 'success',
                        confirmButtonText: 'تم'
                    });
                },
                success: function (html) {
                    swal({
                        title: 'تم التعديل بنجاح',
                        type: 'success',
                        confirmButtonText: 'تم'
                    });
                    $('#editAccounDalel').modal('hide');
                    $("#from_id").val(0);
                  //  GetDiv_tree('Div_tree');

                }
            });
        }


    </script>

    <script>

        function GetDiv_tree(div) {

            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/GetDiv_tree',
                cache: false,
                beforeSend: function () {
                    $("#" + div).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {
                    $("#" + div).html(html);
                    $('#tree3').treed({
                        openedClass: 'fa-minus',
                        closedClass: 'fa-plus'
                    });
                }
            });


        }
    </script>
    <script>

        function GetDiv_accounts(div) {

            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/getConnection_account',
                cache: false,
                beforeSend: function () {
                    $("#" + div).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {
                    $("#" + div).html(html);

                }
            });


        }

        function Get_account_Name(obj) {
            var from_id = $("#from_id").val();

            console.log(' obj :' + obj.dataset.name + ': ');
            var name = obj.dataset.name;
            var code = obj.dataset.code;
            var ttype = obj.dataset.ttype;
            var level = obj.dataset.level;
            var id = obj.dataset.id;

            document.getElementById('parent_name' + from_id).value = code + '--' + name;
            document.getElementById('parent' + from_id).value = id;

            $("#myModal"+ from_id+" .close").click();
           
            $('#parent_code' + from_id).val(code);
            $('#ttype' + from_id).val(ttype);
            $('#level' + from_id).val(level);
            getCode();
        }

    </script>
    <script>

        function show_markz(obj) {
            var from_id = $("#from_id").val();

            if (obj.value == 1) {
                $('#markz_tklfa_div' + from_id).hide();
            } else {
                $('#markz_tklfa_div' + from_id).show();
            }
        }

        function check_markz_tklfa(obj) {
            var from_id = $("#from_id").val();

            if (obj.value == 1) {
                $('#markz_tklfa_fk' + from_id).removeAttr("disabled");
                $('#markz_tklfa_fk' + from_id).attr("data-validation", 'required');
                $('.selectpicker').selectpicker("refresh");


            } else {
                $('#markz_tklfa_fk' + from_id).attr("disabled", 'disabled');
                $('#markz_tklfa_fk' + from_id).removeAttr("data-validation");
                $('.selectpicker').selectpicker("refresh");


            }

        }
    </script>
    <!--14-1-om-->

    <script>
        function getCode() {
            var from_id = $("#from_id").val();

           // var level = $('#level' + from_id).val() + 1;
               var level = parseFloat($('#level' + from_id).val()) + 1;
            // var level = parseFloat($('#parent').find('option:selected').attr('level')) + 1;
            $('#level' + from_id).val(level);

            if ($('#parent' + from_id).val()) {
                var dataString = 'id=' + $('#parent' + from_id).val();
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/getLastSubCode',
                    data: dataString,
                    cache: false,
                    success: function (result) {
                        if (result) {
                            code = parseFloat(result) + 1;
                        }
                        if (result == 0 && (level - 1) > 0) {
                             code = $('#parent_code' + from_id).val();
                          //  code = $('#code' + from_id).val();
                            // code = $('#parent').find('option:selected').attr('code');
                            for (i = 1; i < (level - 1) && i < 3; i++) {
                                code = code + 0;
                            }
                            code = code + 1;
                        }
                        $('#code' + from_id).val(code);
                    }
                });

                var dataString = 'id=' + $('#parent' + from_id).val();
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/getParentData',
                    data: dataString,
                    cache: false,
                    success: function (result) {
                        if (result) {
                            var obj = JSON.parse(result);
                            $('#hesab_tabe3a' + from_id).val(obj['hesab_tabe3a']);
                            $('#hesab_report' + from_id).val(obj['hesab_report']);
                        }
                    }
                });
            }
        }
    </script>

<?php } ?>
