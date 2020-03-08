<style>
    .gray-background {
        background-color: #e0f3f0;
    }
</style>


<div class="col-sm-12  wow  no-padding">


    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> إستمارة مقابلة شخصية</h3>
        </div>
        <div class="panel-body">

            <div class="col-sm-10 no-padding">
                <section class="main-body">

                    <div class="">

                        <div class="print_forma  col-xs-12 no-padding">
                            <div class="col-md-12">
                                <div class="piece-box">
                                    <table class="table table-bordered" style="table-layout: fixed">
                                        <thead>
                                        <tr class="info">
                                            <th colspan="4" class="bordered-bottom">بيانات المتقدم</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <th class="gray-background">رقم الطلب:</th>
                                            <td width="15%"><?php echo $this->uri->segment(6); ?></td>
                                            <th class="gray-background">تاريخ المقابلة:</th>
                                            <th width="20%"><?php echo $record->interview_date; ?></th>

                                        </tr>
                                        <tr>
                                            <th class="gray-background">الاسم:</th>
                                            <td><?php echo $record->name; ?></td>
                                            <th class="gray-background">الوظيفه السجل المدني:</th>
                                            <td><?php echo $record->national_num; ?></td>

                                        </tr>

                                        <tr>
                                            <th class="gray-background">الوظيفه المرشح لها:</th>
                                            <td><?php echo $record->job; ?></td>
                                            <th class="gray-background">الشركه الحاليه:</th>
                                            <td><?php echo $record->work_only; ?></td>

                                        </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                            <form action="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/make_application/<?php echo $this->uri->segment(6); ?>"
                                  method="post">
                                <div class="col-md-12">
                                    <table class="table table-bordered" style="table-layout: fixed">
                                        <thead>

                                        <tr class=greentd">
                                            <th>عناصر المقابلة</th>
                                            <th width="15%">الدرجه العظمي</th>
                                            <th width="15%">الدرجه</th>
                                        </tr>
                                        </thead>

                                        <!--
                    
                    <tbody>
         <?php if (isset($items) && !empty($items)) {
                                            $x = 1;
                                            foreach ($items as $row) { ?>


        <tr class="open_green  closed_green">
            <input type="hidden" name="item_id_fk[]" value="<?php echo $row->id_setting; ?>">
            <td><?php echo $x; ?>-<?php echo $row->title_setting; ?></td>
            <td><input type="number" data-validation="required"  class="form-control"  id="max_degree<?php echo $row->id_setting; ?>"width="45px;" value="<?php echo $row->max_degree; ?>" readonly="readonly"></td>
            <td><input type="number" data-validation="required" name="item_degree[]" step="any" class="degree2 form-control" onkeyup="get_total($(this).val(),<?php echo $row->id_setting; ?>);" id="degree<?php echo $row->id_setting; ?>" width="45px;" value=""></td>
        </tr>

        <?php
                                                $x++;
                                            }
                                        }
                                        ?>
<tr class="open_green  closed_green">

    <td colspan="2">المجموع</td>
    <td><input type="number" readonly="readonly" data-validation="required" name="total" id="total" class="form-control"  step="any"  value=""></td>
</tr>

                    </tbody>
 -->
                                        <tbody>
                                        <?php if (isset($items) && !empty($items)) {
                                            $x = 0;
                                            $total = 0;
                                            foreach ($items as $row) {
                                                $total = $total + $degrees[$x];
                                                ?>


                                                <tr class="open_green  closed_green">
                                                    <input type="hidden" name="item_id_fk[]"
                                                           value="<?php echo $row->id_setting; ?>">
                                                    <td><?php echo $x + 1; ?>-<?php echo $row->title_setting; ?></td>
                                                    <td><input type="number" data-validation="required"
                                                               class="form-control"
                                                               id="max_degree<?php echo $row->id_setting; ?>"
                                                               width="45px;" value="<?php echo $row->max_degree; ?>"
                                                               readonly="readonly"></td>
                                                    <td><input type="number" data-validation="required"
                                                               name="item_degree[]" step="any"
                                                               class="degree2 form-control"
                                                               onkeyup="get_total($(this).val(),<?php echo $row->id_setting; ?>);"
                                                               id="degree<?php echo $row->id_setting; ?>" width="45px;"
                                                               value="<?php if (isset($degrees[$x]) && !empty($degrees[$x])) {
                                                                   echo $degrees[$x];
                                                               } ?>"></td>
                                                </tr>

                                                <?php
                                                $x++;
                                            }
                                        }
                                        ?>
                                        <tr class="open_green  closed_green">

                                            <td colspan="2">المجموع</td>
                                            <td><input type="number" readonly="readonly" data-validation="required"
                                                       name="total" id="total" class="form-control" step="any"
                                                       value="<?php echo $total; ?>"></td>
                                        </tr>

                                        </tbody>


                                    </table>

                                </div>
                                <div class="col-md-12">

                                    <div class="col-md-6">
                                        <div class="piece-box">
                                            <table class="table table-bordered " id="table1">
                                                <thead>
                                                <tr class="greentd">
                                                    <th colspan="3">نقاط القوة لدى المرشح</th>
                                                    <!--    <button class="btn btn-add" type="button" onclick="add_point(1)">اضافه نقطه قوه</button> -->

                                                </tr>
                                                <tr>
                                                    <th>م</th>
                                                    <th>نقاط القوة (الإيجابيات)</th>

                                                    <th>الإجراء</th>
                                                </tr>
                                                </thead>

                                                <tbody id="positive">

                                                <?php if (isset($positive) && !empty($positive)) {
                                                    $x = 1;
                                                    foreach ($positive as $positive) {
                                                        ?>
                                                        <tr>

                                                            <td><?php echo $x; ?></td>
                                                            <td><input type="text" data-validation="required"
                                                                       value="<?php echo $positive->title; ?>"
                                                                       class="form-control" name="positive[]"></td>
                                                            <td>
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
                                                                        window.location="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/delete_point/<?php echo $positive->id; ?>/<?php echo $this->uri->segment(6); ?>";
                                                                        });'>
                                                                    <i class="fa fa-trash"> </i></a>
                                                                <!--  <a  href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/delete_point/<?php echo $positive->id; ?>/<?php echo $this->uri->segment(6); ?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i>
    </a> -->
                                                            </td>
                                                        </tr>

                                                        <?php
                                                        $x++;
                                                    }
                                                }
                                                ?>

                                                </tbody>
                                                <tfoot>
                                                <tr class="">
                                                    <th colspan="2"></th>
                                                    <th>
                                                        <button type="button" onclick="add_point(1)"
                                                                class="btn-success btn"><i
                                                                    class="fa fa-plus"></i>
                                                        </button>
                                                    </th>
                                                </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="piece-box">
                                            <table class="table table-bordered " id="table2">
                                                <thead>
                                                <tr class="greentd">

                                                    <th colspan="3">نقاط الضعف لدى المرشح</th>
                                                    <!-- <button type="button" class="btn btn-add" onclick="add_point(2)">اضافه نقطه ضعف</button> -->

                                                </tr>
                                                <tr>
                                                    <th>م</th>
                                                    <th>نقاط الضعف(السلبيات)</th>
                                                    <th>الإجراء</th>
                                                </tr>
                                                </thead>
                                                <tbody id="negative">

                                                <?php if (isset($negative) && !empty($negative)) {
                                                    $x = 1;
                                                    foreach ($negative as $negative) {
                                                        ?>
                                                        <tr>

                                                            <td><?php echo $x; ?></td>
                                                            <td><input type="text" data-validation="required"
                                                                       value="<?php echo $negative->title; ?> "
                                                                       class="form-control" name="negative[]"></td>
                                                            <td>
                                                                <!--   <a  href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/delete_point/<?php echo $negative->id; ?>/<?php echo $this->uri->segment(6); ?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a> -->
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
                                                                        window.location="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/delete_point/<?php echo $negative->id; ?>/<?php echo $this->uri->segment(6); ?>";
                                                                        });'>
                                                                    <i class="fa fa-trash"> </i></a>
                                                            </td>

                                                        </tr>

                                                        <?php
                                                        $x++;
                                                    }
                                                }
                                                ?>
                                                </tbody>
                                                <tfoot>
                                                <tr class="">
                                                    <th colspan="2"></th>
                                                    <th>
                                                        <button type="button" onclick="add_point(2)"
                                                                class="btn-success btn"><i
                                                                    class="fa fa-plus"></i>
                                                        </button>
                                                    </th>
                                                </tr>
                                                </tfoot>

                                            </table>


                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </section>

                <button type="submit" class="btn btn-labeled btn-success " name="add" value="save_main_data"
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

                <!--  <input type="submit" class="btn btn-add" name="add" value="حفظ"> -->
                </form>
            </div>
            <div class="col-sm-2 no-padding">
                <?php $this->load->view('admin/Human_resources/employee_forms/job_requests/sidebar_application_data'); ?>

            </div>


        </div>
    </div>


</div>


<script>
    function add_point(parameter) {

        if (parameter == 1) {
            var x = document.getElementById('table1');

            var len = x.rows.length;

            var len = len - 2;

            $('#positive').append('<tr>' +
                '<td>' + len + '</td>' +
                '<td><input type="text" data-validation="required" class="form-control" name="positive[]"> </td>' +
                '<td><a id="1" onclick=" $(this).closest(\'tr\').remove(); "><i class="fa fa-trash"></i></a> </td>' +


                '</tr>');
        } else {
            var x = document.getElementById('table2');

            var len = x.rows.length;
            var len = len - 2;
            $('#negative').append('<tr>' +
                '<td>' + len + '</td>' +
                '<td><input type="text" data-validation="required" class="form-control" name="negative[]"></td>' +
                '<td><a id="1" onclick=" $(this).closest(\'tr\').remove(); "><i class="fa fa-trash"></i></a></td>' +


                '</tr>');
        }


    }


</script>
<script>

    function get_total(valu, id) {

        var max = parseInt($('#max_degree' + id).val());
        var valu = parseInt(valu);

        if (valu > max) {
            alert("لاتتعدي القيمه عن القيمه العليا");
            $('#degree' + id).val(0);
            var count_value = 0;
            $(".degree2").each(function () {
                if ($(this).val() > 0) {
                    count_value = count_value + parseFloat($(this).val());
                }
                count_value = count_value + 0;

            })
            $('#total').val(count_value);
        } else {
            var count_value = 0;
            $(".degree2").each(function () {
                if ($(this).val() > 0) {
                    count_value = count_value + parseFloat($(this).val());
                }
                count_value = count_value + 0;

            })
            $('#total').val(count_value);

        }
    }
</script>








