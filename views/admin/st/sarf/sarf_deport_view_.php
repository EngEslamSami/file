<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">

        </div>
        <div class="panel-body" style="min-height: 300px;">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class=" active"><a href="#ezonat_deport" aria-controls="reservation_orders"
                                                           role="tab" data-toggle="tab"> أذونات صرف مرحلة </a></li>
                <li role="presentation" class=""><a href="#ezn_sarf" aria-controls="outdoor_orders" role="tab"
                                                    data-toggle="tab"> </a></li>
            </ul>


            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="ezonat_deport">
                    <div class="panel-body">

                        <?php
                        if (isset($all_sarf) && !empty($all_sarf)) {
                            $x = 1;
                            ?>

                            <div class="col-xs-12 no-padding">
                                <div id="body_table_filter">
                                    <table class="table-bordered table table-responsive example">
                                        <thead>
                                        <tr class="greentd">
                                            <th>م</th>
                                            <th>رقم إذن الصرف</th>
                                            <th>تاريخ الصرف</th>
                                            <th>المستودع</th>
                                            <th>رقم الملف</th>
                                            <th>الإسم</th>

                                            <th>الإجراء</th>
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
                                                <td>
                                                    <a type="button" class="btn btn-primary btn-xs" title="التفاصيل"
                                                       data-toggle="modal" data-target="#detailsModal"
                                                       onclick="load_page(<?= $all->id ?>);"
                                                       style="padding: 1px 5px;"><i
                                                                class="fa fa-list"></i></a>


                                                    <a href="#" onclick='swal({
                                                            title: "هل انت متأكد من التعديل ؟",
                                                            text: "",
                                                            type: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonClass: "btn-warning",
                                                            confirmButtonText: "تعديل",
                                                            cancelButtonText: "إلغاء",
                                                            closeOnConfirm: false
                                                            },
                                                            function(){

                                                            window.location="<?php echo base_url(); ?>st/sarf/Sarf_order/Update_sarf/<?php echo $all->id; ?>";
                                                            });'>
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                                    <a href="#" onclick='swal({
                                                            title: "هل انت متأكد من الحذف ؟",
                                                            text: "",
                                                            type: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonClass: "btn-danger",
                                                            confirmButtonText: "حذف",
                                                            cancelButtonText: "إلغاء",
                                                            closeOnConfirm: false
                                                            },
                                                            function(){
                                                            swal("تم الحذف!", "", "success");
                                                            window.location="<?= base_url() . "st/sarf/Sarf_order/Delete_sarf/" . $all->id ?>";
                                                            });'>
                                                        <i class="fa fa-trash"> </i></a>
                                                    <a href="#" title="طباعه"><i class="fa fa-print"></i></a>

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

                                <div class="form-group col-md-2 col-sm-6  padding-4">

                                    <button type="button" onclick="estlam();" data-toggle="modal"
                                            data-target="#myModalInfo2" class="btn btn-success btn-labeled btn-next"
                                            style="margin-top: 32px;">
                                        <span class="btn-label"><i class="fa fa-money"></i></span> استلام
                                    </button>
                                </div>
                            </div>

                            <!--                            <div class="col-md-12" style="margin-top: 25px;">-->
                            <!--                                <button type="button" class="btn btn-warning btn-labeled" onclick="get_esalt()"-->
                            <!--                                        style="float: left;    font-family: 'hl';">-->
                            <!--                                    <span class="btn-label"><i class="fa fa-share"></i></span> تحويل الأذونات إلى الشئون-->
                            <!--                                    المالية-->
                            <!--                                </button>-->
                            <!--                            </div>-->


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
            success: function (d) {

                $('#body_table_filter').html(d);

            }

        });
    }

</script>