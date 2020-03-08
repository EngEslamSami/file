<style>
    @page {
        /* size: landscape;*/
        margin: 10px;
    }

    .specific_style {

        background-color: #658e1a !important;
        color: white;
    }

    .specific_style_2 {
        width: 280px;
        background-color: white;
        color: red;
        border: 1px solid #658e1a;
    }


    /*
        .table-scroll {
            position: relative;
            max-width: 100%;
            width:100%;
            margin: auto;
            display:table;
        }
        .table-wrap {
            width: 100%;
            display:block;
            height: 500px;
            overflow: auto;
            position:relative;
            z-index:1;
        }
        .table-scroll table {
            width: 100%;
            margin: auto;
            border-collapse: separate;
            border-spacing: 0;
        }
        .table-scroll th, .table-scroll td {
            padding: 5px 10px;
            border: 1px solid #000;
            background: #fff;
            vertical-align: top;
        }
        .faux-table table {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            pointer-events: none;
        }
        .faux-table table + table {
            top: auto;
            bottom: 0;
        }
        .faux-table table tbody, .faux-table  tfoot {
            visibility: hidden;
            border-color: transparent;
        }
        .faux-table table + table thead {
            visibility: hidden;
            border-color: transparent;
        }
        .faux-table table + table  tfoot{
            visibility:visible;
            border-color:#000;
        }
        .faux-table thead th,
        .faux-table tfoot th,
        .faux-table tfoot td {
            background: #ccc;
        }
        .faux-table {
            position:absolute;
            top:0;
            right:0;
            left:0;
            bottom:0;
            overflow-y:scroll;
        }
        .faux-table thead,
        .faux-table tfoot,
        .faux-table thead th,
        .faux-table tfoot th,
        .faux-table tfoot td {
            position:relative;
            z-index:2;
        }
        */

    .compact {
        table-layout: fixed;
    }

    .compact td {
        background-color: #fff !important;

    }

    @media print {
        .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {
            border: 1px solid #000 !important;
        }

        table.dataTable thead th, table.dataTable thead td {
            font-size: 16px;
            border: 1px solid #000 !important;
            background-color: #eee;
        }
    }
</style>

<?php


if ($this->input->post('status') == 1) {
    if (isset($records) && !empty($records)) {
        ?>
        <!--          <button onclick="printDiv('printMe')" class="btn btn-labeled btn-purple but" style="float: left">طباعة</button>-->
        <button type="button" style="margin-right: 90%;" onclick="printDiv('printMe')"
                class="btn btn-labeled btn-purple but">
            <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
        </button>

        <div id="printMe">
            <div class=" col-xs-12 visible-print">

                <h5 class="text-center">قائمه الانشطه

                </h5>
                <h6 class="text-center">
                    خلال فترة من
                    <?php echo $_POST['from']; ?> م

                    إلي
                    <?php echo $_POST['to']; ?> م


                </h6>


            </div>
                <div class="table-wrap">
                    <table id="scrollingtable" class="table table-bordered  scrollingtable" border="1" cellpadding="3"
                           role="table" style="table-layout: fixed;">

                        <thead>
                        <tr class="greentd">
                            <th  style="width: 130px;" class="text-left">رقم الحساب</th>
                            <th  style="width: 500px;" class="text-left">إسم الحساب</th>
                            <th class="text-left">الإيرادات والتبرعات</th>
                            <th  class="text-left">المصروفات</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if (isset($records) && $records != null) {
                            $x = 1;
                            $total_erad_value = 0;
                            $total_masrofat_value = 0;
                            foreach ($records as $value) {
                                $total_erad_value += $value->total_erad;
                                $total_masrofat_value += $value->total_masrofat;
                                $tttttt = $value->total_erad + $value->total_masrofat;
                                if ($this->input->post('zero') == 'on') {
                                    if ($tttttt == 0) {
                                        continue;
                                    }

                                } else {

                                }
                                ?>
                                <tr>
                                    <td><?= $value->code ?></td>
                                    <td style="text-align: right !important;"><?= $value->name ?></td>
                                    <td><?= number_format($value->total_erad, 2); ?></td>
                                    <td><?= number_format($value->total_masrofat, 2); ?></td>

                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                        <tfoot>

                        <tr class="hidden-print">
                            <td colspan="2"  style="color: #fff;text-align: center;background-color:#09704e; border-left: 0;">الإجمالي</td>
                            <!--<td></td>-->
                            <td class="result1"><?php echo number_format($total_erad_value, 2); ?></td>
                            <td class="result2"><?php echo number_format($total_masrofat_value, 2); ?> </td>
                        </tr>
                        </tfoot>
                    </table>


                </div>

            <div class="text-center">
                <table class="table table-bordereds  " style="width: 50%; margin: auto;">
                    <tbody>
                    <tr>
                        <td class="specific_style" style="width: 280px;"> إجمالي الإيرادات والتبرعات</td>
                        <td class="specific_style_2" style="width: 280px; color: green; font-size: 16px;
                      font-weight: bold;"
                        ><?php echo number_format($total_erad_value, 2); ?></td>

                    </tr>
                    <?php $titles = '';
                    $values = 0.00;

                    if ($total_masrofat_value >= $total_erad_value) {
                        $titles = 'العجز';
                        $ccolr = 'red';
                        $symbol = '-';
                        //  $values = ($total_erad_value - $total_masrofat_value);
                        $values = ($total_masrofat_value - $total_erad_value);

                    } elseif ($total_erad_value >= $total_masrofat_value) {

                        $titles = 'الفائض';
                        $symbol = '+';
                        $ccolr = 'green';
                        // $values = ($total_masrofat_value-$total_erad_value );
                        $values = ($total_erad_value - $total_masrofat_value);

                    } else {

                    }


                    ?>
                    <tr>
                        <td class="specific_style" style="width: 280px;">إجمالي المصروفات</td>
                        <td class="specific_style_2" style="width: 280px;font-size: 16px;
                      font-weight: bold;"><?php echo number_format($total_masrofat_value, 2); ?></td>
                    </tr>
                    <tr>
                        <td class="specific_style"
                            style="width: 280px;"><?php echo $titles . '[' . $symbol . ']'; ?></td>
                        <td class="specific_style_2" style="width: 280px; font-weight: bold;
                                color:<?php echo $ccolr; ?>; "
                        ><?php echo number_format($values, 2); ?></td>
                    </tr>


                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-xs-12 visible-print" style="margin-bottom: 40px;">
            <div class="col-xs-4 text-center">
                <label>المحاسب</label></br>
            </div>
            <div class="col-xs-4 text-center">
                <label>مدير الشئون الماليه</label></br>
            </div>
            <div class="col-xs-4 text-center">
                <label>مدير عام الجمعيه</label></br>
            </div>


        </div>
        </div>
        <button onclick="printData('scrollingtable')" class="btn btn-success" style="float: left">طباعة</button>
        <?php

    } else {

        ?>
        <div class="alert alert-danger ">لا يوجد نتيجة للبحث</div>
        <?php
    }
}
?>


<script>


    $('.scrollingtable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                orientation: 'landscape',
                customize: function (win) {
                    $(win.document.body).append("<style> body{  background-color: #fff;} @page{size:landscape}</style>")
                    $(win.document.body)
                        .css('font-size', '14pt')
                        .prepend(
                            '<img src="<?php echo base_url();  ?>/asisst/admin_asset/img/pills/back2.png" style="position:absolute; top:0; left:0;    width: 500px;" />'
                        );

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('table-layout', 'fixed');
                    $(win.document.body).find('thead th:nth-child(1)').css("width", "50px");
                    $(win.document.body).find('thead th:nth-child(2)').css("width", "100px");
                    $(win.document.body).find('thead th:nth-child(6)').css("width", "200px");
                },
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                },
                autoPrint: false,

            },
            'colvis'
        ],
        scrollY: '50vh',
        scrollCollapse: true,
        paging: false,
        info: false,
        colReorder: true
    });



</script>





<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }


    function printData(divName) {
        var divToPrint = document.getElementById(divName);
        // newWin= window.open("");
        var htmlToPrint = '' +
            '<style type="text/css">' +
            'table th, table td {' +
            'border:1px solid #000;' +
            'padding;0.5em;' +
            '}' +

            'table {' +
            'direction:rtl;' +
            '}' +


            '</style>';

        htmlToPrint += divToPrint.outerHTML;
        newWin = window.open("");
        newWin.document.write(htmlToPrint);
        newWin.print();
        newWin.close();
    }


</script>


