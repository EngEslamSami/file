<?php
/*
echo '<pre>';
print_r($items);*/
if (isset($items) && !empty($items)) {
    ?>
    <div class="col-sm-12 no-padding ">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th>رقم الطلب</th>
                    <th>مقدم الطلب</th>

                    <th>نوع الاجازه</th>
                    <th>بدايه الاجازه</th>
                    <th>نهاية الاجازه</th>
                    <th>عدد الايام المطلوبه</th>

                    <th> الاجراء</th>
                    <th>حاله الطلب</th>
                    <th> الطلب الأن عند</th>

                </tr>

                </thead>
                <tbody>

                <?php
                if (isset($items) && !empty($items)) {
                    $x = 1;

                    foreach ($items as $row) {


                        if ($row->action_emp_badel == 0 and $row->action_direct_manager == 0 and
                            $row->action_moder_hr == 0 and $row->action_moder_final == 0
                        ) {
                            $talab_now = 'مقدم الطلب';
                        } elseif ($row->action_emp_badel != 0 and $row->action_direct_manager == 0 and
                            $row->action_moder_hr == 0 and $row->action_moder_final == 0) {
                            $talab_now = ' الموظف البديل';
                        } elseif ($row->action_emp_badel != 0 and $row->action_direct_manager != 0 and
                            $row->action_moder_hr == 0 and $row->action_moder_final == 0) {
                            $talab_now = '  المدير لمباشر';
                        } elseif ($row->action_emp_badel != 0 and $row->action_direct_manager != 0 and
                            $row->action_moder_hr != 0 and $row->action_moder_final == 0) {
                            $talab_now = 'مدير الشئون الإدارية';
                        } elseif ($row->action_emp_badel != 0 and $row->action_direct_manager != 0 and
                            $row->action_moder_hr != 0 and $row->action_moder_final != 0) {
                            $talab_now = 'المدير التنفيذي';
                        } else {
                            $talab_now = '';
                        }


                        if ($row->suspend == 0) {
                            $halet_eltalab = 'جاري ';
                            $halet_eltalab_class = 'warning';
                        } elseif ($row->suspend == 1) {
                            $halet_eltalab = ' تم قبول الطلب من ' . $row->current_from_user_name;
                            $halet_eltalab_class = 'success';
                        } elseif ($row->suspend == 2) {
                            $halet_eltalab = ' تم رفض الطلب من ' . $row->current_from_user_name;
                            $halet_eltalab_class = 'danger';
                        } elseif ($row->suspend == 4) {
                            $halet_eltalab = ' تم اعتماد الطلب بالموافقة من  ' . $row->current_from_user_name;
                            $halet_eltalab_class = 'success';
                        } elseif ($row->suspend == 5) {
                            $halet_eltalab = ' تم اعتماد الطلب بالرفض  من ' . $row->current_from_user_name;
                            $halet_eltalab_class = 'danger';
                        } else {
                            $halet_eltalab = ' غير محدد ';
                            $halet_eltalab_class = 'danger';
                        }

                        $row->agaza_from_date_m = explode('/', $row->agaza_from_date_m)[2] . '/' . explode('/', $row->agaza_from_date_m)[0] . '/' . explode('/', $row->agaza_from_date_m)[1];
                        $row->agaza_to_date_m = explode('/', $row->agaza_to_date_m)[2] . '/' . explode('/', $row->agaza_to_date_m)[0] . '/' . explode('/', $row->agaza_to_date_m)[1];

                        ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $row->agaza_rkm; ?></td>
                            <td><?php echo $row->employee; ?></td>
                            <td><?php echo $row->name->name; ?></td>
                            <td><?php echo $row->agaza_from_date_m; ?></td>
                            <td><?php echo $row->agaza_to_date_m; ?></td>

                            <td><?php echo $row->num_days; ?></td>
                            <td>
<!--                                <a type="button" class="btn btn-primary btn-xs" data-toggle="modal"-->
<!--                                   style="padding: 1px 6px;"-->
<!--                                   data-target="#myModal--><?php //echo $row->id; ?><!--"><i class="fa fa-list"></i>-->
<!--                                </a>-->
                                <a type="button" class="btn btn-info btn-xs" style="padding: 1px 6px;"
                                   data-toggle="modal" title="التفاصيل"
                                   onclick="get_details_agaza(<?= $row->id ?>,'<?php echo $row->employee; ?>');"
                                   data-target="#myModal"> <i class="fa fa-list"></i>
                                </a>
                                <a title="طباعة الطلب" style="padding:1px 5px;"
                                   onclick="print_(<?= $row->agaza_rkm ?>)"><i class="fa fa-print "></i>

                                </a>


                                <?php if ($_SESSION['role_id_fk'] == 1) {
                                    if ($row->last_vacation == 1) {
                                        if ($row->agaza_to_date >= strtotime(date('Y-m-d'))) { ?>
                                            <a title="تعديل الطلب - قطع الأجازة"
                                               href="<?php echo base_url(); ?>human_resources/employee_forms/all_agazat/all_orders/Vacation/edit_vacation/<?php echo $row->id . '/1'; ?>"><i
                                                        class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                        <?php }
                                    }

                                }

                                ?>

                            </td>
                            <td>
                            <span class="label label-<?php echo $halet_eltalab_class ?>" style="min-width: 140px;">
                            <?php echo $halet_eltalab; ?>
                             </span>
                            </td>

                            <td>
                             <span style="background-color: #0eacbb !important; border: 2px solid #0eacbb !important;">
                            <?php echo $row->current_to_user_name; ?>
                            </span>
                            </td>


                        </tr>
                        <?php
                        $x++;
                    }
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog " style="width: 90%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#myModal').modal('hide')" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel_h"></h4>
            </div>
            <div class="modal-body" id="details_agaza">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="float: left"
                        onclick="$('#myModal').modal('hide')">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<?php /*if (isset($items) && !empty($items)) {
    $x = 1;
    foreach ($items as $row) { ?>
        <div class="modal fade" id="myModal<?php echo $row->id; ?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog " style="width: 80%" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $row->employee; ?></h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr class="info">
                                <th colspan="4" class="bordered-bottom">تفاصيل الاجازه</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // $row->agaza_from_date_m = explode('/', $row->agaza_from_date_m)[2] . '/' . explode('/', $row->agaza_from_date_m)[0] . '/' . explode('/', $row->agaza_from_date_m)[1];
                            // $row->agaza_to_date_m = explode('/', $row->agaza_to_date_m)[2] . '/' . explode('/', $row->agaza_to_date_m)[0] . '/' . explode('/', $row->agaza_to_date_m)[1];
                            $row->mobashret_amal_date_m = explode('/', $row->mobashret_amal_date_m)[2] . '/' . explode('/', $row->mobashret_amal_date_m)[0] . '/' . explode('/', $row->mobashret_amal_date_m)[1];
                            ?>
                            <tr>
                                <th class="gray-background">نوع الاجازه:</th>
                                <td width="15%"><?php echo $row->name->name; ?></td>
                                <th class="gray-background">تاريخ بدايه الاجازه:</th>
                                <th width="20%"><?php echo $row->agaza_from_date_m; ?></th>

                            </tr>
                            <tr>
                                <th class="gray-background">تاريخ نهايه الاجازه:</th>
                                <td><?php echo $row->agaza_to_date_m; ?></td>
                                <th class="gray-background">عددايام الاجازه:</th>
                                <td><?php echo $row->num_days; ?></td>

                            </tr>

                            <tr>
                                <th class="gray-background">تاريخ مباشره العمل:</th>
                                <td><?php echo $row->mobashret_amal_date_m; ?></td>
                                <!--  <th class="gray-background">الموظف البديل:</th>
                                <td><?= ($row->badl_emp != null) ? $row->badl_emp->employee : 'لم يحدد'; ?></td>
                                -->
                            </tr>
                            <tr>
                                <th class="gray-background">العنوان اثناء الاجازه:</th>
                                <td><?php echo $row->address_since_agaza; ?></td>
                                <th class="gray-background">االجوال اثناء الاجازه:</th>
                                <td><?php echo $row->emp_jwal; ?></td>


                            </tr>
                            <?php if (!empty($row->marad_name)) { ?>
                                <tr>
                                    <th class="gray-background"> اسم المرض:</th>
                                    <td><?php echo $row->marad_name; ?></td>
                                    <th class="gray-background">اسم المستشفى:</th>
                                    <td><?php echo $row->hospital_name; ?></td>

                                </tr>
                                <tr>
                                    <th class="gray-background">بداية التقرير الطبي :</th>
                                    <td><?php echo $row->taqrer_form_date_m; ?></td>
                                    <th class="gray-background">نهاية التقرير الطبي :</th>
                                    <td><?php echo $row->taqrer_to_date_m; ?></td>
                                </tr>
                                <tr>
                                    <?php if (!empty($row->hospital_report)) {
                                        $type = pathinfo($row->hospital_report)['extension'];
                                        $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                        $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                        if (in_array($type, $arry_images)) {
                                            $type_doc = 1;
                                        } elseif (in_array(strtoupper($type), $arr_doc)) {
                                            $type_doc = 2;
                                        }
                                        ?>
                                        <th class="gray-background">تقرير المستشفى:</th>
                                        <td>
                                            <a href="<?php echo base_url() . 'human_resources/employee_forms/all_agazat/all_orders/Vacation/read_file/' . $row->hospital_report . '/' . $type_doc . '/' . $type ?>"
                                               target="_blank">
                                                <i class=" fa fa-eye"></i></a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" style="float: left" data-dismiss="modal">
                            إغلاق
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}*/ ?>

<script>
    function print_(value) {
        var agaza_rkm = value;
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/print_transformation/'?>",
            type: "POST",
            data: {agaza_rkm: agaza_rkm},
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
<script>
    function get_details_agaza(id, name) {
        $('#myModalLabel_h').text(name);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/get_details_agaza",
            data: {id: id},
            beforeSend: function () {
                $('#details_agaza').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {

                $('#details_agaza').html(d);
            }
        });
    }

</script>