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
    .header-fatra{
        margin-top: 15px;
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
<!--    Nagwa 16-1 -->
    <input type="hidden" id="publisher_name" value="<?php
    if (isset($publisher_name) && !empty($publisher_name)){
        echo $publisher_name;
    }
    ?>">

    <div id="print">


        <table id="" class="table table-bordered header-fatra  scrollingtable my_table">
            <thead>
            <tr class="greentd">
                <th style="text-align: center !important;">م</th>
                <th style="text-align: center !important;">رقم الإيصال</th>
                <th style="text-align: center !important;">التاريخ</th>
                 <th style="text-align: center !important;">وقت التسجيل</th>
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
                $all_total_sum = 0;
                foreach ($records as $row) {
                    $x++;
                    /*********************************************/
                        if(!empty($bnod_arr)){

    if(in_array($row->bnd_type1,$bnod_arr) && ! in_array($row->bnd_type2,$bnod_arr)){
      $value =$row->value1;
      $name =$row->bnd_type1_name;

    }elseif (! in_array($row->bnd_type1,$bnod_arr) && in_array($row->bnd_type2,$bnod_arr)){

        $value =$row->value2;
        $name =$row->bnd_type2_name;

    }elseif ( in_array($row->bnd_type1,$bnod_arr) && in_array($row->bnd_type2,$bnod_arr)){

        $value =($row->value1 + $row->value2);
        $name =$row->bnd_type1_name.'/'.$row->bnd_type2_name;
    }

                        }else{


            if( $row->bnd_type1== $_POST['bnd_type1'] && $row->bnd_type2 != $_POST['bnd_type1']){
                $value =$row->value1;
                $name =$row->bnd_type1_name;

            }elseif ( $row->bnd_type1 != $_POST['bnd_type1'] && $row->bnd_type2 == $_POST['bnd_type1']){

                $value =$row->value2;
                $name =$row->bnd_type2_name;

            }elseif ( $row->bnd_type1 == $_POST['bnd_type1'] && $row->bnd_type2 == $_POST['bnd_type1']){

                $value =($row->value1 + $row->value2);
                $name =$row->bnd_type1_name.'/'.$row->bnd_type2_name;
            }elseif(!empty($row->bnd_type1)  && !empty($row->bnd_type2)){
                $value =($row->value1 + $row->value2);
                $name =$row->bnd_type1_name.'/'.$row->bnd_type2_name;
            }elseif(!empty($row->bnd_type1)  && empty($row->bnd_type2)){
                $value =$row->value1 ;
                $name =$row->bnd_type1_name;
            }elseif(empty($row->bnd_type1)  && !empty($row->bnd_type2)){
                $value = $row->value2;
                $name =$row->bnd_type2_name;
            }

                        }
                     $all_total_sum += $row->value;


                    /*********************************************/
                    ?>
                    <tr>
                        <td><?php echo $x; ?></td>
                        <td><?php echo $row->pill_num; ?></td>
                        <td><?php echo $row->pill_date; ?></td>
                         <td><?php echo date('H:i:sa',$row->date_s); ?></td>
                        <td><?php echo $row->pill_type_name; ?></td>
                        <td><?php  if(!empty($pay_method_arr[$row->pay_method])){ echo $pay_method_arr[$row->pay_method]; }else{ echo'غير محدد'; }  ?></td>
                        <td class="td1"><?php echo $value; ?></td>
                        <td><?php echo $row->person_name; ?></td>
                        <td><?php echo $row->person_mob; ?></td>
                        <?php if (empty($publisher)) { ?>
                            <td><?php echo $row->publisher_name; ?></td>
                        <?php } ?>
                        <td><?php echo $name; ?></td>


                    </tr>
                <?php }
            } ?>


            </tbody>
              <tfoot>
              <tr>
                  <td colspan="5" style="background-color: #fcb632; font-size: 18px;">الإجمالي2</td>
                  <!--<td  class="result1" style="background-color: #fcb632; font-size: 18px;"><?php echo $all_total_sum; ?></td>
                  -->
                  <td  class="" style="background-color: #fcb632; font-size: 18px;"><?php echo number_format($all_total_sum,2); ?></td>
                  <td colspan="3" class="text-center"><button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color: #000;">
تفاصيل الإجمالي
</button></td>
                  
              </tr>
              </tfoot>
        </table>

    </div>
<div  class="collapse" id="collapseExample"><br>
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
        <tr class="orangetd">
            <td style="color: #000;font-size: 18px !important;" >الإجمالي</td>
            <td class="bnod_result" style="color: #000;font-size: 18px !important;" ></td>
        </tr>
        </tfoot>
    </table>
</div>
<?php } else { ?>
    <div class="alert alert-danger">عفوا !...لاتوجد نتائج</div>
<?php } ?>

<script>


    function formatMoney(n, c, d, t) {
        var c = isNaN(c = Math.abs(c)) ? 2 : c,
            d = d == undefined ? "." : d,
            t = t == undefined ? "," : t,
            s = n < 0 ? "-" : "",
            i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
            j = (j = i.length) > 3 ? j % 3 : 0;

        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    }


</script>
<script>
    var total=0;
    $.each($(".td1"), function(){
        total += parseFloat($(this).text());
    });
    $(".result1").text(formatMoney(total));

    var bnod_total=0;
    $.each($(".modal_td1"), function(){
        bnod_total += parseFloat($(this).attr('data-value'));
    });
    $(".bnod_result").text(formatMoney(bnod_total));

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
<!--Nagw a-->
<script>


    // function formatMoney(n, c, d, t) {
    //     var c = isNaN(c = Math.abs(c)) ? 2 : c,
    //         d = d == undefined ? "." : d,
    //         t = t == undefined ? "," : t,
    //         s = n < 0 ? "-" : "",
    //         i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
    //         j = (j = i.length) > 3 ? j % 3 : 0;
    //
    //     return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    // };


</script>



<script>
    function GetSum(div_class) {
        var  sum=0;
        $("." +div_class).each(function(){
            if(parseInt($(this).attr('data-type')) == 0) {
                sum += parseFloat($(this).attr('data-number'));
            }
        });

        return ( ConvertToDecimal(formatMoney(sum)));
    }

</script>
<script>
    /*alert(ConvertToDecimal(123.01));*/


    function ConvertToDecimal(num) {
        var n = parseFloat(num);
        if (isInt(n)) {
            return num;
        }
        else {
            /*num = num.toString();
            num = num.slice(0, (num.indexOf(".")) + 3);
            return(Number(num));*/
            return  num.toFixed(2);


        }


    }

    function isInt(value){
        return (parseFloat(value) == parseInt(value)) && !isNaN(value);
    }


</script>

<script>
    $(".result1").text( GetSum('td1'));

    $(".result2").text( GetSum('td2'));
    $(".result3").text( GetSum('td3'));
    $(".result4").text( GetSum('td4'));
    $(".result5").text( GetSum('td5'));
    $(".result6").text( GetSum('td6'));
    $(".result7").text( GetSum('td7'));
    $(".result8").text( GetSum('td8'));





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
                        // nagwa 16-1
                    var publisher_name = $('#publisher_name').val();

                     if (publisher_name != ''){


                         var puplisher =
                           //  '<div class=" gray-background">'+

                             '<div class="col-xs-6 text-center">'+
                             '<h5 class="alperiod"> المحصل :     ' + publisher_name + '   </h5>'+
                             '</div>'+

                             '<div class="col-xs-3 text-center"></div>'

                         //    '</div>'

                           ;
                         var div_pad = '';

                     } else
                     {
                         puplisher ='';
                         div_pad =  '<div class="col-xs-3 no-padding"></div>' ;

                     }



                    // var headerfatra = '<div class="col-xs-12" style="margin-top: -16px;"> ' +
                    //     '<div class=" gray-background">' +
                    //
                    //     '<div class="col-xs-3 no-padding"></div>' +
                    //     '<div class="col-xs-6 text-center">' +
                    //     '<h5 class="alperiod">خلال الفترة من 20/10/2018 إلى 2/9/2019</h5>' +
                    //     '</div>' +
                    //
                    //     '<div class="col-xs-3 text-center"></div>' +
                    //
                    //     '</div>' +
                    //
                    //     '</div>';

                    var headerfatra= '<div class="col-xs-12" style="margin-top: -16px;"> '+
                        '<div class=" gray-background">'+
                        div_pad +

                        '<div class="col-xs-6 text-center">'+
                        '<h5 class="alperiod">   خلال الفترة من   <?php
                            $date_from = strtotime($this->input->post('from_date'));
                            echo date("d-m-Y",$date_from);  ?> إلي <?php
                            $date_to = strtotime($this->input->post('to_date'));
                            echo date("d-m-Y",$date_to);?></h5>'+
                        '</div>'+  puplisher +

                        '<div class="col-xs-3 text-center"></div>'+

                        '</div>'+

                        '</div>' ;


                    // nagwa 16-1

                    $(win.document.body).find('.page-print-header').append(headerpage);
                    $(win.document.body).find('.header-fatra').append(headerfatra);


                    $(win.document.body).find('.my_table').wrap('<div class="tablearea">');


                    var contentcell = $(win.document.body).find('.report-content-cell');
                    $(win.document.body).find('.tablearea').appendTo(contentcell);


                    //   var  headercell =$(win.document.body).find('.report-header-cell')
                    // $(win.document.body).find('.mpage-header').appendTo(headercell);

                    var secpart = $(win.document.body).find('.second-part');
                    $('.bottom-result').appendTo(secpart);

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('table-layout', 'fixed');
                    $(win.document.body).find('thead th:nth-child(1)').css("width", "70px");
                    $(win.document.body).find('thead th:nth-child(2)').css("width", "130px");


                    /***********************/






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
