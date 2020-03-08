<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>


        <div class="panel-body">


            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab"> ضوابط الدعم</a></li>
                <li><a href="#tab2" id="a_tab1" onclick="set_tab(1)" data-toggle="tab">ضوابط الإستحقاق</a></li>
                <li><a href="#tab2" id="a_tab3" onclick="set_tab(3)" data-toggle="tab">المستندات المطلوبة</a></li>
                <li><a href="#tab2" id="a_tab2" onclick="set_tab(2)" data-toggle="tab">ألية إسترداد القرض / السلف</a>
                </li>


            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">

                    <?php
                    $checked = array('', 'checked');
                    if (isset($solaf_main_setting) && !empty($solaf_main_setting)) {
                        $form = $solaf_main_setting->id;
                        $da3m_value = $solaf_main_setting->da3m_value;
                        $aqsa_moda_sadad = $solaf_main_setting->aqsa_moda_sadad;
                        $had_adna = $solaf_main_setting->had_adna;
                        $bnod = array(9 => $solaf_main_setting->rateb_asasy, 11 => $solaf_main_setting->bdl_sakn
                        , 12 => $solaf_main_setting->bdl_mowaslat, 15 => $solaf_main_setting->bdl_jwal
                        , 10 => $solaf_main_setting->rateb_mokto3, 16 => $solaf_main_setting->bdl_ma3esha
                        , 13 => $solaf_main_setting->bdl_amal, 14 => $solaf_main_setting->bdl_taklef);


                    } else {
                        $form = 0;
                        $da3m_value = '';
                        $aqsa_moda_sadad = '';
                        $had_adna = '';
                        $bnod = array(9 => 0, 11 => 0, 12 => 0, 15 => 0
                        , 10 => 0, 16 => 0, 13 => 0, 14 => 0);

                    }
                    ?>
                    <?php echo form_open_multipart(base_url() . 'human_resources/employee_forms/solaf/Solaf_setting/add_setting') ?>

                    <div class="col-sm-12 padding-4"  style="margin-top: 10px">
                        <input type="hidden" name="form_type" value="<?= $form ?>"/>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-2 col-form-label">المبلغ المرصود للدعم</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" min="0" name="da3m_value" id="input1"
                                       data-validation="required" value="<?= $da3m_value ?>" placeholder="">
                            </div>
                            <label class="col-sm-2 col-form-label">ريال</label>

                        </div>
                        <div class="form-group row">
                            <label for="input2" class="col-sm-2 col-form-label">أقصي مدة سداد</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" value="<?= $aqsa_moda_sadad ?>" min="0"
                                       name="aqsa_moda_sadad"
                                       data-validation="required" id="input2">
                            </div>
                            <label class="col-sm-2 col-form-label"> شهر </label>

                        </div>
                        <div class="form-group row">
                            <label for="input3" class="col-sm-2 col-form-label">الحد الأدنى للإستقطاع</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" value="<?= $had_adna ?>" min="0"
                                       name="had_adna"
                                       data-validation="required" id="input3">
                            </div>
                            <label class="col-sm-2 col-form-label">% </label>

                        </div>

                        <?php if (isset($badlat) && (!empty($badlat))) { ?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">بنود الإستقطاع</label>
                                <div class="col-sm-10">


                                        <?php foreach ($badlat as $key => $value) {
                                            ?>
                                    <div class="check-style" style="display: inline-block;margin-left: 10px">

                                            <input class="check_large " type="checkbox" name="bnod[]"
                                                   value="<?= $value->id ?>"
                                                   id="gridCheck<?= $value->id ?>" <?php if (key_exists($value->id, $bnod)) {
                                                echo $checked[$bnod[$value->id]];
                                            } ?> >
                                            <label class="form-check-label" for="gridCheck<?= $value->id ?>">
                                                <?= $value->title ?>
                                            </label>
                                    </div>
                                        <?php } ?>


                                </div>
                            </div>

                        <?php } ?>
                    </div>
                    <div class="col-xs-12 text-center">
                        <input type="hidden" name="add" value="add">
                        <button type="submit" class="btn btn-labeled btn-success " id="reg" name="add" value="حفظ"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>


                    </div>
                    <?php echo form_close() ?>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <?php
                    if (isset($one_solaf_dawabt) && !empty($one_solaf_dawabt)) {
                        $type = $one_solaf_dawabt->type;
                        $title = $one_solaf_dawabt->title;
                        $type_n = $one_solaf_dawabt->type_n;
                        $id = $one_solaf_dawabt->id;
                    } else {
                        $type = '';
                        $title = '';
                        $type_n = '';
                        $id = 0;

                    }
                    ?>
                    <?php echo form_open_multipart(base_url() . 'human_resources/employee_forms/solaf/Solaf_setting/add_dwabt_setting') ?>

                    <div class="col-sm-12 padding-4" style="margin: 10px 0">
                        <input type="hidden" name="id" id="setting_id" value="<?= $id ?>"/>
                        <input type="hidden" name="type" id="setting_type" value="<?= $type ?>"/>
                        <div class="col-md-6">
                            <label for="title" class="col-sm-4 col-form-label" id="lable_input">  <?= $type_n ?>
                                : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" id="title"
                                       data-validation="required" value="<?= $title ?>" placeholder="">
                            </div>

                        </div>
                        <div class="col-md-4 text-center">
                            <input type="hidden" name="add" value="add">
                            <button type="submit" class="btn btn-labeled btn-success " id="reg" name="add" value="حفظ">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>

                        </div>
                    </div>

                    <?php echo form_close() ?>


                    <div class="col-md-12 no-padding" id="solaf_dawabt">

                    </div>
                </div>
                <div class="tab-pane fade" id="tab3">

                </div>
                <div class="tab-pane fade" id="tab4">

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>


<script>
    <?php $tab_show = $this->uri->segment(6, 0);
    if (isset($tab)) {
        $tab_show = $tab;
    }
    if($tab_show != 0){
    ?>
    $(document).ready(function () {
        $('a[id="a_tab<?=$tab_show?>"]').tab('show');

        <?php if (!isset($tab) && ($tab_show != 0)) {
        echo "set_tab($tab_show);";
        }?>
    });
    <?php }?>

</script>


<script>

    function set_tab(tab) {

        var tabs_lable = ['', 'ضبط الاستحقاق :', 'ألية استرداد القرض/السلفة :', 'اسم المستند :'];
        $('#lable_input').text(tabs_lable[tab]);
        $('#setting_type').val(tab);
        $('#title').val('');
        $('#setting_id').val(0);

        set_table(tab);

    }

    function set_table(type) {
        var request = $.ajax({
            url: "<?=base_url() . 'human_resources/employee_forms/solaf/Solaf_setting/get_solaf_dawabt'?>",
            type: "POST",
            data: {type: type},
            beforeSend: function () {
                $('#solaf_dawabt').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }
        });
        request.done(function (msg) {

            $('#solaf_dawabt').html(msg);


        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });


    }
</script>


<script>

    function delete_dwabt(type, id) {

        var request = $.ajax({
            url: "<?=base_url() . 'human_resources/employee_forms/solaf/Solaf_setting/delete_solaf_dawabt'?>",
            type: "POST",
            data: {type: type, id: id},
            beforeSend: function () {
                $('#solaf_dawabt').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }
        });
        request.done(function (msg) {

            $('#solaf_dawabt').html(msg);

            swal({
                title: "",
                text: "تم الحذف",
                type: "success",
                confirmButtonText: "تم",
            });
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });


    }
</script>