<div class="col-sm-12 no-padding">
    <!-- <pre>
    <?php /*echo 'count ' . count($tab_id) */?>
    <?php /*print_r($tab_id) */?>
</pre>-->
    <?php if (isset($tab_id) && (count($tab_id) > 1)){ ?>

    <?php if (!isset($panel)){ ?>
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <!--<div class="panel-body">
            <div class="col-sm-12">

            </div>
       </div>-->
        <div class="panel-body">
            <?php } ?>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#mine_1" aria-controls="mine_1" role="tab"
                                                          data-toggle="tab"><span>طلباتي</span></a></li>
                <li role="presentation" class=""><a href="#follow_1" aria-controls="follow_1" role="tab"
                                                    data-toggle="tab"><span>متابعة طلباتي</span></a></li>
                <li role="presentation" class=""><a href="#comming_1" aria-controls="comming_1" role="tab"
                                                    data-toggle="tab"><span>الوارد</span></a></li>
            </ul>

            <div class="tab-content" id="tab-content1">
                <br>
                <?php } ?>
                <?php if ((isset($tab_id)) && (!empty($tab_id)) && (in_array('mine_1', $tab_id))) {
                    $class_active = 'active in';
                    ?>
                    <div role="tabpanel" class="tab-pane fade <?= $class_active ?>" id="mine_1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr class="info">
                                <th>م</th>
                                <th>رقم العملية</th>
                                <th>تاريخ العملية</th>
                                <th>إسم الجهة</th>
                                <th>إسم المصرف</th>
                                <th>الطلب الأن عند</th>
                                <th>الإسم</th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($user_orders)) {


                                $x = 1;
                                foreach ($user_orders as $row) {


                                    if ($row->suspend == 1) {
                                        $halet_talab = 'تم الموافقةعلي الطلب';
                                        $halet_label = 'label-success';
                                    } elseif ($row->suspend == 2) {
                                        $halet_talab = 'تم رفض الطلب';
                                        $halet_label = 'label-danger';
                                    } elseif ($row->suspend == 4) {
                                        $halet_talab = 'تم إعتماد الطلب';
                                        $halet_label = 'label-custom';
                                    } else {
                                        $halet_talab = 'غير محدد';
                                        $halet_label = 'label-danger';
                                    }

                                    ?>
                                    <tr>
                                        <td><?php echo $x; ?></td>
                                        <td><?php echo $row->process_rkm; ?></td>
                                        <td><?php echo date('d-m-Y', $row->process_date_s); ?></td>
                                        <td><?php echo $row->geha_name ?></td>
                                        <td><?php echo $row->bank_name ?></td>
                                        <td><?php echo $row->talab_in_title; ?></td>
                                            <td><?php echo $row->emp_name ?></td>

                                        <td>

                                            <!------------------------------>


                                            <?php
                                            /* if($row->suspend == 0 ){?>
                                              <span class="label label-warning">
                                           لم تتم إجراءات علي الطلب
                                            </span>  <?php }else
                                            */
                                            if ($row->suspend == 4) { ?>
                                                <span class="label label-success">
تم اعتماد الطلب بالموافقة
 </span>
                                            <?php } elseif ($row->suspend == 5) { ?>
                                                <span class="label label-danger">
تم اعتماد الطلب بالرفض
 </span>
                                            <?php } else {
                                                ?>


                                                <a type="button" class="btn btn-primary btn-xs" style="padding: 1px 6px;"
                                                   data-toggle="modal" data-target="#transform_details"
                                                   onclick="transformDetails(<?php echo $row->process_rkm; ?>)"><i
                                                            class="fa fa-list"></i>
                                                </a>
                                            <?php } ?>

                                            <!-------------------------------->

                                            <a title="طباعة الطلب" style="padding:1px 5px;"
                                               onclick="print_(<?= $row->process_rkm ?>)"><i class="fa fa-print "></i>

                                            </a>


                                        </td>


                                    </tr>

                                    <?php $x++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="7" style="text-align: center;color: red">لا توجد طلبات !</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
                <?php if ((isset($tab_id)) && (!empty($tab_id)) && (in_array('follow_1', $tab_id))) {
                    $class_active = 'active in';
                    if (count($tab_id)> 1) {
                        $class_active = '';
                    }
                    ?>

                    <div role="tabpanel" class="tab-pane fade <?= $class_active ?>" id="follow_1">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr class="info">
                                <th>م</th>
                                <th>رقم العملية</th>
                                <th>تاريخ العملية</th>
                                <th>إسم الجهة</th>
                                <th>إسم المصرف</th>
                                <th>الطلب الأن عند</th>
                                <th>الإسم</th>
                                <th>متابعة الطلب</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($user_orders)) {
                                $x = 1;
                                foreach ($user_orders as $row) {


                                    if ($row->suspend == 1) {
                                        $halet_talab = 'تم الموافقةعلي الطلب';
                                        $halet_label = 'label-success';
                                    } elseif ($row->suspend == 2) {
                                        $halet_talab = 'تم رفض الطلب';
                                        $halet_label = 'label-danger';
                                    } elseif ($row->suspend == 4) {
                                        $halet_talab = 'تم إعتماد الطلب';
                                        $halet_label = 'label-custom';
                                    } else {
                                        $halet_talab = 'غير محدد';
                                        $halet_label = 'label-danger';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $x; ?></td>
                                        <td><?php echo $row->process_rkm; ?></td>
                                        <td><?php echo date('d-m-Y', $row->process_date_s); ?></td>
                                        <td><?php echo $row->geha_name ?></td>
                                        <td><?php echo $row->bank_name ?></td>
                                        <td><?php echo $row->talab_in_title; ?></td>
                                        <td><?php echo $row->emp_name ?></td>


                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                    style="font-size: 16px;"
                                                    data-toggle="modal" data-target="#motab3a_details"
                                                    onclick="motab3a_details(<?php echo $row->process_rkm; ?>)">الإطلاع
                                                علي
                                                تحويلات الطلب
                                            </button>
                                        </td>
                                    </tr>

                                    <?php $x++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="7" style="text-align: center;color: red">لا توجد طلبات !</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>

                <?php if ((isset($tab_id)) && (!empty($tab_id)) && (in_array('comming_1', $tab_id))) {
                    $class_active = 'active in';
                    if (count($tab_id)> 1) {
                        $class_active = '';
                    }
                    ?>

                    <div role="tabpanel" class="tab-pane fade <?= $class_active ?>" id="comming_1">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr class="info">
                                <th>م</th>
                                <th>رقم العملية</th>
                                <th>تاريخ العملية</th>
                                <th>إسم الجهة</th>
                                <th>إسم المصرف</th>
                                <th>الموظف مقدم الطلب</th>
                                <th>حالة الطلب</th>
                                <th>الإجراءات</th>

                            </tr>
                            </thead>
                            <tbody>


                            <?php if (!empty($coming_records)) {
                                $x = 1;
                                foreach ($coming_records as $row) {

                                    if ($row->suspend == 0) {
                                        $halet_eltalab = 'جاري ';
                                        $halet_eltalab_class = 'warning';
                                    } elseif ($row->suspend == 1) {
                                        $halet_eltalab = 'تم قبول الطلب ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend == 2) {
                                        $halet_eltalab = 'تم رفض الطلب ';
                                        $halet_eltalab_class = 'danger';
                                    } elseif ($row->suspend == 4) {
                                        $halet_eltalab = 'تم اعتماد الطلب بالموافقة ';
                                        $halet_eltalab_class = 'success';
                                    } elseif ($row->suspend == 5) {
                                        $halet_eltalab = 'تم اعتماد الطلب بالرفض ';
                                        $halet_eltalab_class = 'danger';
                                    } else {
                                        $halet_eltalab = 'غير محدد ';
                                        $halet_eltalab_class = 'danger';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $x; ?></td>
                                        <td><?php echo $row->process_rkm; ?></td>
                                        <td><?php echo date('d-m-Y', $row->process_date_s); ?></td>
                                        <td><?php echo $row->geha_name ?></td>
                                        <td><?php echo $row->bank_name ?></td>
                                        <td><?php echo $row->emp_name ?></td>

                                        <td>
                                    <span class="label label-<?php echo $halet_eltalab_class ?>">
                                    <?php echo $halet_eltalab; ?>
                                     </span>
                                        </td>


                                        <td>
                                            <!------------------ التفاصيل---------->
                                            <a type="button" class="btn btn-primary btn-xs" style="padding: 1px 6px;"
                                               data-toggle="modal" data-target="#transform_details"
                                               onclick="transformDetails(<?php echo $row->process_rkm; ?>)"><i
                                                        class="fa fa-list"></i>
                                            </a>


                                            <!-----------------التفاصيل----------->

                                            <!-----------------الإجراء----------->
                                            <a type="button" class="btn btn-success btn-xs" title="التفاصيل"
                                               style="padding: 1px 6px;"
                                               onclick="$('#transformLabel').html('<?php echo $row->talab_in_title; ?>');
                                                       transformRequest(<?php echo $row->level; ?>,
                                               <?php echo $row->process_rkm; ?>,<?php echo $row->current_from_user_id; ?>,<?php echo $row->current_to_user_id; ?>)"
                                               data-toggle="modal" data-target="#transform"><i class="fa fa-list"></i>
                                            </a>
                                            <!------------------الإجراء---------->


                                        </td>


                                    </tr>

                                    <?php $x++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="7" style="text-align: center;color: red">لا توجد طلبات واردة !</td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                <?php } ?>

            </div>
        </div>
        <?php if (isset($tab_id) && (count($tab_id) > 1)){ ?>

        <?php if (!isset($panel)){ ?>
    </div>

</div>
<?php } ?>
<?php } ?>

<!-------------------------------modals--------------------------->

<div class="modal  modal-success  fade" id="transform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="transformLabel"></h4>
            </div>
            <div id="transformRequest"></div>
        </div>
    </div>
</div>


<div class="modal  modal-success  fade" id="transform_details" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">التفاصيل</h4>
            </div>
            <div class="modal-body " id="transform_details_div">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger btn-labeled" onclick="$('#transform_details').modal('hide')"><span class="btn-label"><i
                                class="glyphicon glyphicon-remove"></i></span> إغلاق
                </button>

            </div>

        </div>
    </div>
</div>


<div class="modal  modal-success  fade" id="motab3a_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">التفاصيل</h4>
            </div>
            <div class="modal-body " id="motab3a_details_div">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger btn-labeled" onclick="$('#motab3a_details').modal('hide')"><span class="btn-label"><i
                                class="glyphicon glyphicon-remove"></i></span> إغلاق
                </button>

            </div>

        </div>
    </div>
</div>


<!-- detailsModal -->


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#detailsModal').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">الطباعة</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button
                        type="button" onclick="print_()"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#detailsModal').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- detailsModal -->
<script>


    /*function print_hidden(value) {

        $('#result').html('<input  type="hidden" name="agaza_rkm" id="agaza_rkm" value="'+value+'">');

    }*/
    function print_(value) {
        var process_rkm = value;
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'finance_accounting/box/forms/transformation_accounts/Transformation_accounts/print_account_details/'?>",
            type: "POST",
            data: {process_rkm: process_rkm},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
              WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>



<script type="text/javascript">
    function transformRequest(level, process_rkm, fromUser, toUser) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/Get_load_page',
            data: {level: level, process_rkm: process_rkm, fromUser: fromUser, toUser: toUser},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#transformRequest").html(html);
            }
        });

    }

</script>


<script type="text/javascript">
    function transformDetails(value) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/Get_transformDetails',
            data: {process_rkm: value},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#transform_details_div").html(html);
            }
        });

    }

</script>


<script type="text/javascript">
    function motab3a_details(value) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/motab3a_details',
            data: {process_rkm: value},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#motab3a_details_div").html(html);
            }
        });

    }

</script>
