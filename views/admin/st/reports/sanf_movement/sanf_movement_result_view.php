<style>
    html {

        height: 100%;
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    .bond-header {
        /*   height: 55px;*/
        margin-bottom: 15px;

    }

    .bond-header .right-img img {
        width: 100%;
        height: 90px;
    }

    .bond-header .left-img img {
        width: 100%;
        height: 90px;
    }

    .alperiod {
        margin-top: 13px;
        display: inline-block;
        width: 100%;
        background-color: #eee;
        padding: 10px 0px;
        box-shadow: 4px 3px;

    }

    table {
        page-break-after: auto
    }

    tr {
        page-break-inside: avoid;
        page-break-after: auto
    }

    td {
        page-break-inside: avoid;
        page-break-after: auto
    }


    table.report-content {
        page-break-after: always;
    }

    thead.report-header {
        display: table-header-group;
    }

    tfoot.report-footer {
        display: table-footer-group;
    }


    .mpage-header, .header-space {
        height: 222px;
    }

    .footer-info, .footer-space {
        height: 10px;
    }

    .mpage-header {
        position: fixed;
        top: 0;
        width: 100%;
    }

    .footer-info {
        position: fixed;
        bottom: 0;
        width: 100%;
    }

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


    .compact {
        table-layout: fixed;
    }

    .compact td {
        background-color: #fff !important;

    }

    @media print {
        .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {
            border: 1px solid #000 !important;
            font-size: 12px !important;
            padding: 3px 2px;
            text-align: center;
        }

        .table-bordered > thead > tr > th, .table-bordered > thead > tr > td {
            text-align: center;
            font-size: 12px !important;
            border: 1px solid #000 !important;
            background-color: #eee;
        }
    }

    @media all {
        .page-break {
            display: none;
        }
    }

    @media print {
        .page-break {
            display: block;
            page-break-before: always;
        }

        .bottom-result {
            margin-top: 220px;
        }
    }

</style>

<?php
if (isset($result) && !empty($result)) {
    ?>
    <table id="" class="table table-bordered  scrollingtable my_table">
        <thead>
        <tr class="greentd">
            <th style="text-align: center !important;">م</th>
            <th style="text-align: center !important;">كود الصنف</th>
            <th style="text-align: center !important;">تاريخ الإذن</th>
            <th style="text-align: center !important;">نوع الحركة</th>
            <th style="text-align: center !important;">نوع الإذن</th>
            <th style="text-align: center !important;">رقم الإذن</th>
            <th style="text-align: center !important;"> الأسرة/الجهة</th>
            <th style="text-align: center !important;"> الكمية الواردة</th>
            <th style="text-align: center !important;"> الكمية المنصرفة</th>
            <th style="text-align: center !important;"> الرصيد</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($result) && !empty($result)) {

            $x = 0;
            $sanf_rased=0;
            foreach ($result as $row) {
$sanf_rased=($row->import_amount - $row->export_amount)+$sanf_rased;
                ?>
                <tr>
                    <td><?= ++$x; ?></td>
                    <td><?= $row->sanf_code; ?></td>
                    <td><?= $row->ezn_date_ar; ?></td>
                    <td><?= $row->ezn_movement; ?></td>
                    <td><?= $row->ezn_type; ?></td>
                    <td><?= $row->ezn_rkm ?></td>
                    <td><?= $row->ezn_person ?></td>
                    <td><?= $row->import_amount ?></td>
                    <td><?= $row->export_amount ?></td>
                    <td><?= $sanf_rased; ?></td>


                </tr>
            <?php }
        } ?>


        </tbody>
    </table>


<?php } else { ?>
    <div class="alert alert-danger">عفوا ... لا توجد نتائج !</div>
<?php } ?>
<script>


</script>

<script>


    $('.scrollingtable').DataTable({
        "ordering": false,
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


