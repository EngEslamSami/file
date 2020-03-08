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

    .bond-header{
        /*   height: 55px;*/
        margin-bottom: 15px;

    }
    .bond-header .right-img img{
        width: 100%;
        height: 90px;
    }
    .bond-header .left-img img{
        width: 100%;
        height: 90px;
    }
    .alperiod{
        margin-top: 13px;
        display: inline-block;
        width: 100%;
        background-color: #eee;
        padding: 10px 0px;
        box-shadow: 4px 3px;

    }



    /*
    .mpage-header{
        position: fixed;
        top: 0;
        width: 100%;
    }
    */
    table { page-break-after:auto }
    tr    { page-break-inside:avoid; page-break-after:auto }
    td    { page-break-inside:avoid; page-break-after:auto }


    table.report-content {
        page-break-after:always;
    }
    thead.report-header {
        display:table-header-group;
    }
    tfoot.report-footer {
        display:table-footer-group;
    }


    .mpage-header, .header-space{
      /*  height: 222px;*/
      height: 185px;
    }
    .footer-info, .footer-space {
      /*  height: 10px;*/
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
        margin:10px;
        size: 297mm 210mm;


    }





    .compact {
        table-layout: fixed;
    }

    .my_table{
        width: 100% !important;
    }
    .my_table.table-bordered > thead > tr > th,
    .my_table.table-bordered > thead > tr > td,
    .my_table.table-bordered > tbody > tr > th,
    .my_table.table-bordered > tbody > tr > td,
    .my_table.table-bordered > tfoot > tr > th,
    .my_table.table-bordered > tfoot > tr > td {

        font-size: 14px !important;
    }
    .dataTables_scrollHead table.dataTable thead th,.dataTables_scrollHead  table.dataTable thead td {
        padding: 8px 1px 8px 1px !important;
    }

    .dataTables_scrollFoot table.dataTable tfoot th,.dataTables_scrollFoot table.dataTable tfoot td {
        padding: 10px 2px 6px 2px;

    }
    .dataTables_scrollFoot{
        margin-top: 5px;
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
        .my_table tbody td {
            background-color: #fff !important;

        }
        .my_table tbody tr:last-child td{
             background-color:#e8e8e8 !important;
        }
    }

    .dataTables_scrollBody table tfoot{
          /*  display: none;*/
    }
    .report-container{
        width: 100%;
    }
     .print-heading .print-h{
        margin: 0;
        margin-top: -20px;
    }
    .header-fatra{
            margin-top: 15px;
    }




    .dataTables_scrollFootInner{
        padding-left: 0 !important;
    }

    .dataTables_scrollHead thead tr th:nth-child(1){
        width:270px !important
        }

        .dataTables_scrollFoot tfoot tr td:nth-child(1){
        width:275px !important
        }
        .dataTables_scrollFoot tfoot tr td:nth-child(2){
        width:108px !important
        }
        .dataTables_scrollFoot tfoot tr td:nth-child(3){
        width:104px !important
        }
        .dataTables_scrollFoot tfoot tr td:nth-child(4){
        width:104px !important
        }
        .dataTables_scrollFoot tfoot tr td:nth-child(5){
        width:104px !important
        }
        .dataTables_scrollFoot tfoot tr td:nth-child(6){
        width:105px !important
        }
        .dataTables_scrollFoot tfoot tr td:nth-child(7){
        width:105px !important
        }
        .dataTables_scrollFoot tfoot tr td:nth-child(8){
        width:105px !important
        }
        .dataTables_scrollFoot tfoot tr td:nth-child(9){
        width:105px !important
        }
   /* .dataTables_scrollHead thead tr th:nth-child(3){
    width:190px !important
    }
    .dataTables_scrollHead thead tr th:nth-child(4){
    width:190px !important
    }*/


</style>
<?php

function recorrer_niveles(&$array, $nivel, &$parent, &$original)
{
    $nivel++;
    if (isset($array) and $array != null) {
        foreach ($array as $key => $item) {
            //  $cantidad = $array[$key]["num"];
            $cantidad = 0;
            $array[$key]["Total_maden"] = $cantidad;
            $array[$key]["Total_dayen"] = $cantidad;
            $cuenta =0;
            if(isset($parent) and $parent != null){
                $cuenta = count($parent);
            }
            for ($i = $nivel; $i < $cuenta; $i++) {
                unset($parent[$i]);
            } // for
            sum_original($original, $parent, $array[$key]["all_maden"], $array[$key]["all_dayen"]);
            $parent[$nivel] = $array[$key]["code"];
            recorrer_niveles($array[$key]["children"], $nivel, $parent, $original);
        } // foreach
    }
} // function

function sum_original(&$original, $parent, $cantidad, $cantidad2)
{
    if (!is_array($parent)) return 0;

    if (isset($original) and $original != null) {
        foreach ($original as $key => $value) {
            if (isset($original[$key]["code"]) && in_array($original[$key]["code"], $parent)) {
                $original[$key]["Total_maden"] += $cantidad;
                $original[$key]["Total_dayen"] += $cantidad2;


            } // if
            sum_original($original[$key]["children"], $parent, $cantidad, $cantidad2);
        } // foreach
    }

} // function

$parent = null;
recorrer_niveles($records, -1, $parent, $records);



function buildTreeTable($tree, $count=1)
{

    $s =0;
    $arr =array();
    foreach ($tree as $record) {

        $rased_sabek_madeen = $record['total_sabeq'][0];
        $rased_sabek_dayen = $record['total_sabeq'][1];

        if (empty($record['children'])) {
            $dayen =$record['all_dayen'] ;
            $maden =$record['all_maden'] ;

        }else{

            $dayen =$record['Total_dayen'] ;
            $maden =$record['Total_maden'] ;

        }

        if($record['type'] ==2){

            $rased_dayen = ($dayen +$rased_sabek_dayen)  - ($maden + $rased_sabek_madeen);
            $rased_madeen =0;

        }elseif ($record['type'] ==1){

            $rased_madeen = ($maden + $rased_sabek_madeen) - ($dayen +$rased_sabek_dayen);
            $rased_dayen =0;
        }






        /*      if($_POST['status'] ==1){

                      if( $dayen == 0.00 && $maden == 0.00  && $rased_sabek_madeen ==  0.00 &&  $rased_sabek_dayen == 0.00){

                          continue;

                      }


              }else*///if ($_POST['status'] ==2){

        /*if($_POST['zero_account'] ==='on'){


            if( $dayen == 0.00 && $maden == 0.00  && $rased_sabek_madeen ==  0.00 &&  $rased_sabek_dayen == 0.00){

                continue;

            }


            // }

        }*/
        if( $dayen == 0.00 && $maden == 0.00  && $rased_sabek_madeen ==  0.00 &&  $rased_sabek_dayen == 0.00){

            $arr[] =$record['code'];

        }

        //$total_harka_madeen +=$maden;
//total_sabeq

        ?>


            <?php  if (empty($record['children'])) {

            if($_POST['zero_account'] ==='on'){
                if(in_array($record['code'],$arr)){ continue; } } ?>
                <tr class="text-center">
                    <td class="requirementRight" style="text-align: right;width: 300px;" ><span style="width: 100px;text-align: left;display: inline-block;"><?=$record['code'] ?> </span>
                     <span style="width: 200px;float: left;display: inline-block;"> - <?=$record['name']?> </span></td>
                    <td class="td1" data-type="<?php if (isset($record['children'])) { echo 1;
                    }else{ echo 0; }?>" data-number="<?=$rased_sabek_madeen?>"><?php echo number_format($rased_sabek_madeen,2); ?></td>
                    <td class="td2" data-type="<?php if (isset($record['children'])) { echo 1;
                    }else{ echo 0; }?>" data-number="<?=$rased_sabek_dayen?>"><?php echo number_format($rased_sabek_dayen,2); ?></td>
                    <td class="td3" data-type="<?php if (isset($record['children'])) { echo 1;
                    }else{ echo 0; }?>" data-number="<?=$maden?>"><?php echo number_format($maden,2);?></td>
                    <td class="td4" data-type="<?php if (isset($record['children'])) { echo 1;
                    }else{ echo 0; }?>" data-number="<?=$dayen?>"><?php echo number_format($dayen,2);?></td>
                    <td class="td5" data-type="<?php if (isset($record['children'])) { echo 1;
                    }else{ echo 0; }?>" data-number="<?php echo ($rased_sabek_madeen+ $maden);?>"><?php echo number_format($maden+$rased_sabek_madeen,2);?></td>
                    <td class="td6" data-type="<?php if (isset($record['children'])) { echo 1;
                    }else{ echo 0; }?>" data-number="<?php echo ($rased_sabek_dayen+ $dayen);?>"><?php echo number_format($dayen+$rased_sabek_dayen,2);?></td>
                    <td class="td7" data-type="<?php if (isset($record['children'])) { echo 1;
                    }else{ echo 0; }?>" data-number="<?=$rased_madeen?>"><?php echo number_format($rased_madeen,2); ?></td>
                    <td class="td8" data-type="<?php if (isset($record['children'])) { echo 1;
                    }else{ echo 0; }?>" data-number="<?=$rased_dayen?>"><?php  echo number_format($rased_dayen,2);?></td>
                </tr>
            <?php } ?>

        <?php
        if (isset($record['children'])) {
            $count = buildTreeTable($record['children'], $count++);
        }

        $s++;}
    return $count;
}
if (isset($records) && !empty($records)) {
    ?>



    <div class="table-wrap" id="printMe">

        <div class=" col-xs-12 visible-print">

            <h5 class="text-center">ميزان المراجعة </h5>
            <h6 class="text-center">
                خلال فترة من
                <?php echo $this->input->post('from'); ?> م

                إلي
                <?php echo $this->input->post('to'); ?> م


            </h6>
        </div>


        <table id="" class=" table table-bordered scrollingtable my_table" role="table" style="table-layout:fixed;width: 100%;">
            <thead>
           <!-- <tr class="greentd text-center">
                <th  style="width: 300px" colspan="2" class="text-center"> تفاصيل الحساب</th>
                <th colspan="2" class="text-center">رصيد ماقبل</th>
                <th colspan="2" class="text-center">الحركة</th>
                <th colspan="2" class="text-center">الإجمالي</th>
                <th colspan="2" class="text-center">الرصيد</th>
            </tr>-->
            <tr class="greentd text-center">
                <!--<th class="text-center">رمز الحساب</th>-->
                <th  style="width: 300px;">تفاصيل الحساب</th>
                <th style="text-align: center;" class="text-center">رصيد سابق مدين</th>
                <th style="text-align: center;" class="text-center">رصيد سابق دائن</th>
                <th style="text-align: center;" class="text-center">حركة مدين</th>
                <th style="text-align: center;" class="text-center">حركة دائن</th>
                <th style="text-align: center;" class="text-center">إجمالى مدين</th>
                <th style="text-align: center;" class="text-center">إجمالى دائن</th>
                <th style="text-align: center;" class="text-center">رصيد حالى مدين</th>
                <th style="text-align: center;" class="text-center">رصيد حالى دائن</th>
            </tr>

            </thead>
            <tbody>

            <?php

            if (isset($records) && $records!=null) {
                buildTreeTable($records);
            }


            ?>

            </tbody>
            <tfoot>
            <tr class="orangetd">
                <td  style="color: #000;text-align: center;background-color:#fcb632; border-left: 0;font-size:20px;">الإجمالي</td>

                <td style="color: #000;" class="result1" >0</td>
                <td style="color: #000;" class="result2">0</td>
                <td style="color: #000;" class="result3">0</td>
                <td style="color: #000;" class="result4">0</td>
                <td style="color: #000;" class="result5">0</td>
                <td style="color: #000;" class="result6">0</td>
                <td style="color: #000;" class="result7">0</td>
                <td style="color: #000;" class="result8">0</td>
            </tr>
            </tfoot>
        </table>



    </div>



    <?php
} else {

    ?>
    <div class="alert alert-danger ">لا يوجد نتيجة للبحث</div>
    <?php
}

?>


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

    function removeCommas(str) {
        while (str.search(",") >= 0) {
            str = (str + "").replace(',', '');
        }
        return str;
    }
</script>
<script>


    function formatMoney(n, c, d, t) {
        var c = isNaN(c = Math.abs(c)) ? 2 : c,
            d = d == undefined ? "." : d,
            t = t == undefined ? "," : t,
            s = n < 0 ? "-" : "",
            i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
            j = (j = i.length) > 3 ? j % 3 : 0;

        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    };


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
  /*  function printDiv(divName) {
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

*/
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
                    $(win.document.body).append("<style> body{background-color: #fff;} @page{size:  350mm 255mm;margin:10px 15px 40px 15px;}</style>");
                    $(win.document.body).find('.my_table').attr('class','table table-bordered my_table');

                    var bodyht =  '<div class="first-part" data-spy="scroll">'+
                        '<table class="report-container">'+
                        '<thead class="report-header">'+
                        '<tr>'+
                        '<th class="report-header-cell">'+
                        '<div class="header-space">&nbsp;</div>'+
                        '</th>'+
                        '</tr>'+
                        '</thead>'+

                        '<tbody class="report-content">'+
                        '<tr>'+
                        '<td class="report-content-cell">'+

                        '</td>'+
                        '</tr>'+
                        '</tbody>'+


                        '<tfoot class="report-footer">'+
                        '<tr>'+
                        '<td class="report-footer-cell">'+
                        '<div class="footer-space">&nbsp;</div>'+

                        '</td>'+
                        '</tr>'+
                        '</tfoot>'+
                        '</table>'+
                        '</div>';


                    $(win.document.body).append(bodyht);

                    var headerpage = '<div class="header-info">'+
                        '<div class="bond-header">'+
                        '<div class="col-xs-4 pad-2">'+
                        '<div class="right-img">'+
                        '<img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol1.png">'+
                        '</div>'+
                        '</div>'+
                        '<div class="col-xs-4 pad-2">'+

                        '</div>'+
                        '<div class="col-xs-4 pad-2">'+
                        '<div class="left-img">'+
                        '<img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol2.png">'+
                        '</div>'+
                        '</div>'+
                        '</div>'+

                        '</div>';

                    var headerfatra= '<div class="col-xs-12" style="margin-top: -16px;"> '+
                        '<div class=" gray-background">'+
                        '<div class="col-xs-5 no-padding"><h5 class="span_font" style="margin-right: 20px; padding: 2px 0;"><b>نوع التقرير:</b><span class="border-box span_font"> تفصيلي </span></h5></div> '+
                         '<div class="col-xs-3 no-padding"><h5 class="span_font" style="margin-right: 20px; padding: 2px 0;"><b>خلال الفترة</b></h5></div>'+
                        '<div class="col-xs-2 no-padding"> <h5 class="span_font" style="margin-right: 20px; padding: 2px 0;"><b>من : </b><span class="border-box span_font"><?php  $date_from = strtotime($this->input->post('from')); echo date("d-m-Y",$date_from);  ?></span></h5></div>'+
                       /* '<div class="col-xs-6 text-center">'+
                        '<h5 class="alperiod"> خلال الفترة من <?php
                        $date_from = strtotime($this->input->post('from'));
                        echo date("d-m-Y",$date_from);  ?> إلي <?php
                        $date_to = strtotime($this->input->post('to'));
                        echo date("d-m-Y",$date_to);?></h5>'+
                        '</div>'+*/

                        '<div class="col-xs-2 text-center"> <h5 class="span_font" style="margin-right: 20px; padding: 2px 0;"><b>إلى : </b><span class="border-box span_font"><?php $date_to = strtotime($this->input->post('to'));  echo date("d-m-Y",$date_to);?></span></h5></div>'+

                        '</div>'+

                        '</div>';


                      $(win.document.body).find('.print-h').html('ميزان المراجعة ');



                    $(win.document.body).find('.page-print-header').append(headerpage);
                    $(win.document.body).find('.header-fatra').append(headerfatra);





                    $(win.document.body).find('.my_table').wrap('<div class="tablearea">');


                    var  contentcell =$(win.document.body).find('.report-content-cell')
                    $(win.document.body).find('.tablearea').appendTo(contentcell);

                    /***********************/
                    $(win.document.body).find('.my_table tbody tr td:nth-child(2)').attr('class','td1');
                    $(win.document.body).find('.my_table tbody tr td:nth-child(3)').attr('class','td2');
                    $(win.document.body).find('.my_table tbody tr td:nth-child(4)').attr('class','td3');
                    $(win.document.body).find('.my_table tbody tr td:nth-child(5)').attr('class','td4');
                    $(win.document.body).find('.my_table tbody tr td:nth-child(6)').attr('class','td5');
                    $(win.document.body).find('.my_table tbody tr td:nth-child(7)').attr('class','td6');
                    $(win.document.body).find('.my_table tbody tr td:nth-child(8)').attr('class','td7');
                    $(win.document.body).find('.my_table tbody tr td:nth-child(9)').attr('class','td8');
                    /************************/




                    //   var  headercell =$(win.document.body).find('.report-header-cell')
                    // $(win.document.body).find('.mpage-header').appendTo(headercell);

                  /*  $(win.document.body).find('.tablearea thead tr')
                    .before('<tr class=" text-center">'+
                        '<th  class="text-center" colspan="2"> تفاصيل الحساب</th>'+
                        '<th colspan="2" class="text-center">رصيد ماقبل</th>'+
                        '<th colspan="2" class="text-center">الحركة</th>'+
                        '<th colspan="2" class="text-center">الإجمالي</th>'+
                          '<th colspan="2" class="text-center">الرصيد</th>'+
                    '</tr>');
                    */


                    $(win.document.body).find('.tablearea tbody tr:last-child')
                    .after('<tr style="box-shadow:2px 2px -6px #999">'+
                    '<td class="text-center" style="background-color: #e8e8e8;">الإجمالي</td>'+
                    '<td class="result1" style="background-color: #e8e8e8;"> '+GetSum('td1')+'</td>'+
                    '<td class="result2" style="background-color: #e8e8e8;">'+GetSum('td2')+'</td>'+
                    '<td class="result3" style="background-color: #e8e8e8;">'+GetSum('td3')+'</td>'+
                    '<td class="result4" style="background-color: #e8e8e8;">'+GetSum('td4')+'</td>'+
                    '<td class="result5" style="background-color: #e8e8e8;">'+GetSum('td5')+'</td>'+
                    '<td class="result6" style="background-color: #e8e8e8;">'+GetSum('td6')+'</td>'+
                    '<td class="result7" style="background-color: #e8e8e8;">'+GetSum('td7')+'</td>'+
                    '<td class="result8" style="background-color: #e8e8e8;">'+GetSum('td8')+'</td>'+
                    '</tr>');




                     $(win.document.body).find('.my_table').after('<div class=" col-xs-12">'+
                                         '<br><br>'+
                            
                                        '<div class="col-xs-4 text-center">'+
                                            '<label> المحاسب </label><br><br><p  style="font-size:22px">محمد عبدالله الربدي</p>'+
                                        '</div>'+
                                        '<div class="col-xs-4 text-center">'+
                                            '<label> مدير الشئون المالية </label><br><br><p  style="font-size:22px">تركي بن علي التركي</p>'+
                                        '</div>'+
                                        '<div class="col-xs-4 text-center">'+
                            
                                            '<label>مدير عام الجمعية </label><br><br>'+
                                            '<p style="font-size:22px">سلطان بن محمد الجاسر</p><br>'+
                                        '</div>'+
                                        '<br><br>'+
                            
                                    '</div>' ); 



                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('table-layout', 'fixed');

                       // $(win.document.body).find('thead tr:first-child th:nth-child(1)').css("width", "350px");
                    $(win.document.body).find('thead tr th:nth-child(1)').css("width", "400px");
                     $(win.document.body).find('tbody tr td:nth-child(1)').css("text-align", "right");
                  //  $(win.document.body).find('thead tr:last-child th:nth-child(2)').css("width", "250px");
                },
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                },
                autoPrint: true,

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
