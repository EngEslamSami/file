<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">

        </div>
        <div class="panel-body" style="min-height: 300px;">

            <div role="tabpanel" class="tab-pane fade in active" id="ezonat_deport">
                <div class="panel-body">

                    <?php
                    if (isset($all_sarf) && !empty($all_sarf)) {
                        $x = 1;
                        ?>

                        <div class="col-xs-12 no-padding">
                            <div id="body_table_filter">
                                <table class="table-bordered table table-responsive " id="example">
                                    <thead>
                                    <tr class="greentd">
                                        <th>م</th>
                                        <th>رقم إذن الصرف</th>
                                        <th>تاريخ الصرف</th>
                                        <th>المستودع</th>
                                        <th>رقم الملف</th>
                                        <th>الإسم</th>
                                        <th>المستلم</th>
                                        <th>الإجراء</th>
                                        <th>القائم بالاضافة</th>
                                        <th>تحديد</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($all_sarf as $all) {
                                        ?>
                                        <tr>
                                            <td><?= $x++ ?></td>
                                            <td><?= $all->ezn_rkm ?></td>
                                            <td><?= $all->ezn_date_ar ?></td>
                                            <td><?= $all->storage_name ?></td>

                                            <td><?= $all->sarf_to_fk ?></td>
                                            <td><?= $all->sarf_to_name ?></td>
                                            <td><?= $all->responsable_name ?></td>
                                            <td>
                                                <a type="button" class="btn btn-primary btn-xs" title="التفاصيل"
                                                   data-toggle="modal" data-target="#detailsModal"
                                                   onclick="load_page(<?= $all->id ?>);"
                                                   style="padding: 1px 5px;"><i
                                                            class="fa fa-list"></i></a>


                                                <a href="#" title="طباعه"><i class="fa fa-print"></i></a>

                                            </td>

                                            <td>
    
    <span style="font-size: 12px; color: white !important; font-weight: normal;background-color: #c57400;    width: 150px;"
          class="badge badge-add"><?php echo $all->publisher_name; ?></span>

                                            </td>

                                            <td>
                                                <div class="skin-square">

                                                    <div class="i-check">
                                                        <input tabindex="9" type="checkbox"
                                                               id="square-checkbox-<?= $all->id ?>"
                                                               value="<?= $all->id ?>" class="checkbox_ezen">
                                                        <label for="square-checkbox-<?= $all->id ?>"></label>
                                                    </div>


                                                </div>
                                            </td>


                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12 no-padding">
                            <div class="form-group col-md-3 col-sm-6  padding-4">
                                <label> المستودع</label>
                                <select name="storage_fk" id="storage_fk" class="form-control "
                                        data-validation="required" onchange="filter_table()">
                                    <option value="" selected>اختر</option>
                                    <?php
                                    if (isset($storage) && !empty($storage)) {
                                        foreach ($storage as $row) {
                                            ?>
                                            <option value="<?php echo $row->id_setting; ?>"><?php echo $row->title_setting; ?></option>

                                        <?php }
                                    } ?>


                                </select>
                            </div>

                            <div class="form-group col-md-2 col-sm-6  padding-4">
                                <label> فئة الفلتر</label>
                                <select class="form-control" id="select_search" onchange="show_input(this)">
                                    <option value="0">- اختر -</option>
                                    <option value="1"> رقم ملف</option>
                                    <option value="2"> تاريخ الاذن</option>
                                </select>
                            </div>
                            <div id="input_search_disy" style="display: none">
                                <div class="form-group col-md-2 col-sm-6  padding-4">
                                    <label id="from_label"> من</label>
                                    <input type="text" name="from" id="from_search" class="form-control"
                                           oninput="filter_table()">
                                </div>
                                <div class="form-group col-md-2 col-sm-6  padding-4">
                                    <label id="to_label"> الى</label>
                                    <input type="text" name="to" id="to_search" class="form-control"
                                           oninput="filter_table()">
                                </div>
                            </div>

                            <?php
                            $arra = array('اختر', 1 => 'عمل قيد محاسبي', 2 => 'إضافة إلي قيد محاسبي');
                            ?>
                            <div class="form-group col-md-4 col-sm-6 padding-4 " >

                                <h5 class="label-green-h ">نوع القيد </h5>

                                <?php if (isset($arra) && !empty($arra) && $arra != null) {
                                    for ($a = 1; $a < sizeof($arra); $a++) { ?>

                                        <div class="radio-content">
                                            <input type="radio" onchange="get_val($(this).val())"
                                                   class="pay_method dep"
                                                   name="qued"
                                                   id="inlineRadios<?php echo $a ?>" value="<?php echo $a; ?>">
                                            <label for="inlineRadios<?php echo $a ?>"
                                                   class="radio-label"><?php echo $arra[$a]; ?></label>

                                        </div>
                                    <?php }
                                } ?>
                            </div>
                            <div class="form-group  col-md-2 col-sm-6 padding-4 qued_num" style="display: none;">

                                <h5 class="label-green-h ">رقم القيد </h5>

                                <input type="text" readonly ondblclick="get_qued();" style="" id="qued_num"
                                       class="form-control">


                            </div>
                            <div class="form-group col-md-2 col-sm-6  padding-4">

                                <button type="button" onclick="estlam();" data-toggle="modal"
                                        data-target="#myModalInfo2" class="btn btn-success btn-labeled btn-next"
                                        style="margin-top: 32px;">
                                    <span class="btn-label"><i class="fa fa-money"></i></span> استلام
                                </button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade " id="ezn_sarf">


            </div>


        </div>
    </div>
</div>

<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body">

                <div id="myDivs"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <!--
                <button type="submit" class="btn btn-success"
                        data-dismiss="modal">حفظ</button>-->

                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="qued" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">القيود</h4>
            </div>
            <div class="modal-body" style="height: 500px;overflow-y: scroll;">

                <div id="myDivs2"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <!--
                <button type="submit" class="btn btn-success"
                        data-dismiss="modal">حفظ</button>-->

                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<script>
    function get_row(valu) {
        var rkm = $('.rkm' + valu).text();
        $('#qued_num').val(rkm);
        $('#qued').modal('hide');
    }

</script>
<script>
    function get_val(valu) {
        if (valu == 2) {
            $('.qued_num').show();

        } else {
            $('.qued_num').hide();
            $('#qued_num').val('');
        }
    }

</script>

<script>
    function get_qued() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>finance_accounting/box/pills/Pill/get_all_qued",
            data: {},


            success: function (d) {

                $('#qued').modal('show');
                $('#myDivs2').html(d);
            }

        });
    }
</script>
<script>

    function show_input(valu) {

        console.log('showw  : ' + $('option:selected', valu).text());
        if ($(valu).val() != 0) {
            document.getElementById('input_search_disy').style.display = 'block';
        } else {
            document.getElementById('input_search_disy').style.display = 'none';
        }
        var type = ['', 'number', 'date'];
        console.log('showw  : ' + $('input_search_disy'));
        console.log('from_label  : ' + document.getElementById('from_label').innerText);
        document.getElementById('from_label').innerText = 'من' + $('option:selected', valu).text();
        document.getElementById('to_label').innerText = 'الى' + $('option:selected', valu).text();
        document.getElementById('to_search').type = type[$(valu).val()];
        document.getElementById('from_search').type = type[$(valu).val()];

    }

    function filter_table() {
        var store_id = $('#storage_fk').val();
        var to = $('#to_search').val();
        var from = $('#from_search').val();
        var select = $('#select_search').val();

        console.log(" post :" + store_id + "  * " + to + "  * " + from + "  * " + select);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>st/sarf/Sarf_order/filter",
            data: {
                store_id: store_id,
                to: to,
                from: from,
                select: select
            },
            beforeSend: function () {
                $('#body_table_filter').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {

                $('#body_table_filter').html(d);

            }

        });
    }

    function estlam() {
        var store_id = $('#storage_fk').val();
        var to = $('#to_search').val();
        var from = $('#from_search').val();
        var select = $('#select_search').val();
        var qued_num = $('#qued_num').val();

        console.log(" post :" + store_id + "  * " + to + "  * " + from + "  * " + select);


        var checkbox_value = [];

        var oTable = $('#example').dataTable();
        var rowcollection = oTable.$(".checkbox_ezen:checked", {"page": "all"});
        rowcollection.each(function (index, elem) {
            // var checkbox_value = $(elem).val();
            checkbox_value.push($(elem).val());
        });
        console.log("checkbox_value : " + checkbox_value);

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>st/sarf/Sarf_order/estlam",
            data: {
                store_id: store_id,
                to: to,
                from: from,
                select: select,
                qued_num: qued_num,
                checkbox_value: checkbox_value
            },
            success: function (d) {

                if (d == 0) {
                    $('#myModalInfo').modal('hide');
                    alert("لايوجد ايصالات في هذه الفتره");
                } else {
                    $('#myModalInfo').modal('show');
                    $('#myDivs').html(d);
                }
                // $('#myDivs').html(d);

            }

        });
    }


</script>