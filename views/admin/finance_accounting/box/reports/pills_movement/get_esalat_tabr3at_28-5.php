


<?php


 ?>

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

/*echo '<pre>';
print_r($total_bonod_array[0]['band_name']);
die;*/
if (isset($records) && !empty($records)) {
    ?>
    <!--  <button type="button" style="margin-right: 90%;" onclick="printDiv('print')" class="btn btn-labeled btn-purple ">
          <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
      </button> -->

    <div id="print">

        <table id="" class="table table-bordered  scrollingtable my_table">
            <thead>
            <tr class="greentd">
                <th style="text-align: center !important;">م</th>
                <th style="text-align: center !important;">رقم الإيصال</th>
                <th style="text-align: center !important;">التاريخ</th>
                <th style="text-align: center !important;">نوع الإيصال</th>
                <th style="text-align: center !important;">طريقة التوريد</th>
                <th style="text-align: center !important;">المبلغ</th>
                <th style="text-align: center !important;">إسم المتبرع</th>
                <th style="text-align: center !important;">جوال المتبرع</th>
                <?php if (empty($publisher)) { ?>
                    <th style="text-align: center !important;">المحصل</th>
                <?php } ?>
                <th style="text-align: center !important;">البند</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($records) && !empty($records)) {
                $pay_method_arr = array('إختر', 1 => 'نقدي', 2 => 'شيك', 3 => 'شبكة', 4 => 'إيداع نقدي'
                , 5 => 'إيداع شيك', 6 => 'تحويل', 7 => 'أمر مستديم');

                $x = 0;
                foreach ($records as $row) {
                    $x++;
                    ?>
                    <tr>
                        <td><?php echo $x; ?></td>
                        <td><?php echo $row->pill_num; ?></td>
                        <td><?php echo $row->pill_date; ?></td>
                        <td><?php echo $row->pill_type_name; ?></td>
                        <td><?php echo $pay_method_arr[$row->pay_method]; ?></td>
                        <td class="td1"><?php echo $row->value; ?></td>
                        <td><?php echo $row->person_name; ?></td>
                        <td><?php echo $row->person_mob; ?></td>
                        <?php if (empty($publisher)) { ?>
                            <td><?php echo $row->publisher_name; ?></td>
                        <?php } ?>
                        <td><?php echo $row->bnd_type1_name;
                        if($row->bnd_type2 !=0 && $row->bnd_type2!=''){
                      echo'/'; echo $row->bnd_type2_name;
                        }


                        ?></td>


                    </tr>
                <?php }
            } ?>


            </tbody>
              <tfoot>
              <tr>
                  <td colspan="5">الإجمالي</td>


                  <td class="result1"></td>
                  <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
                     التفاصيل
                      </button></td>
              </tr>
              </tfoot>
        </table>

    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                </div>
                <div class="modal-body">
                  <table class=" table table-bordered ">
                      <thead>
                      <tr class="info">
                          <th>البند</th>
                          <th>القيمة</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      if (!empty($total_bonod_array)) {
                          foreach ($total_bonod_array as $row) { ?>
                      <tr>
                          <td><?php echo $row['band_name']; ?></td>
                          <td class="modal_td1" data-value="<?=$row['value_band']?>"><?php echo number_format($row['value_band'], 2); ?></td>
                      </tr>

                              <?php
                          }
                      } ?>

                      </tbody>
                      <tfoot>
                      <tr>
                          <td>الإجمالي</td>
                          <td class="bnod_result"></td>
                      </tr>
                      </tfoot>
                  </table>
                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="alert alert-danger">عفوا !...لاتوجد نتائج</div>
<?php } ?>
<script>
    var total=0;
    $.each($(".td1"), function(){
        total += parseFloat($(this).text());
    });
    $(".result1").text(total);

    var bnod_total=0;
    $.each($(".modal_td1"), function(){
        bnod_total += parseFloat($(this).attr('data-value'));
    });
    $(".bnod_result").text(bnod_total);

</script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
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
                // orientation: 'landscape',
                customize: function (win) {
                    $(win.document.body).append("<style> body{background-color: #fff;} @page{size:  350mm 255mm;margin:0 10px 35 10px;}</style>");
                    $(win.document.body).find('.my_table').attr('class', 'table table-bordered my_table');

                    var bodyht = '<div class="first-part" data-spy="scroll">' +
                        '<table class="report-container">' +
                        '<thead class="report-header">' +
                        '<tr>' +
                        '<th class="report-header-cell">' +
                        '<div class="header-space">&nbsp;</div>' +
                        '</th>' +
                        '</tr>' +
                        '</thead>' +

                        '<tbody class="report-content">' +
                        '<tr>' +
                        '<td class="report-content-cell">' +

                        '</td>' +
                        '</tr>' +
                        '</tbody>' +


                        '<tfoot class="report-footer">' +
                        '<tr>' +
                        '<td class="report-footer-cell">' +
                        '<div class="footer-space">&nbsp;</div>' +

                        '</td>' +
                        '</tr>' +
                        '</tfoot>' +
                        '</table>' +
                        '</div>' +


                        '<div class="second-part">' +
                        '<div class="page-break"></div>' +
                        '</div>';


                    $(win.document.body).append(bodyht);

                    var headerpage = '<div class="header-info">' +
                        '<div class="bond-header">' +
                        '<div class="col-xs-4 pad-2">' +
                        '<div class="right-img">' +
                        '<img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol1.png">' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-xs-4 pad-2">' +

                        '</div>' +
                        '<div class="col-xs-4 pad-2">' +
                        '<div class="left-img">' +
                        '<img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol2.png">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +

                        '</div>';

                    var headerfatra = '<div class="col-xs-12" style="margin-top: -16px;"> ' +
                        '<div class=" gray-background">' +

                        '<div class="col-xs-3 no-padding"></div>' +
                        '<div class="col-xs-6 text-center">' +
                        '<h5 class="alperiod">خلال الفترة من 20/10/2018 إلى 2/9/2019</h5>' +
                        '</div>' +

                        '<div class="col-xs-3 text-center"></div>' +

                        '</div>' +

                        '</div>';


                    $(win.document.body).find('.page-print-header').append(headerpage);
                    $(win.document.body).find('.header-fatra').append(headerfatra);


                    $(win.document.body).find('.my_table').wrap('<div class="tablearea">');


                    var contentcell = $(win.document.body).find('.report-content-cell')
                    $(win.document.body).find('.tablearea').appendTo(contentcell);


                    //   var  headercell =$(win.document.body).find('.report-header-cell')
                    // $(win.document.body).find('.mpage-header').appendTo(headercell);

                    var secpart = $(win.document.body).find('.second-part')
                    $('.bottom-result').appendTo(secpart);

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('table-layout', 'fixed');
                    $(win.document.body).find('thead th:nth-child(1)').css("width", "70px");
                    $(win.document.body).find('thead th:nth-child(2)').css("width", "130px");
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
