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
            $array[$key]["all_total_maden_sabek"] = $cantidad;
            $array[$key]["all_total_dayen_sabek"] = $cantidad;
            $cuenta =0;
            if (isset($parent) and $parent != null) {
                $cuenta = count($parent);
            }


            for ($i = $nivel; $i < $cuenta; $i++) {
                unset($parent[$i]);
            } // for

            $all_total_maden_sabek = $array[$key]["totla_sabeq"][0];
            $all_total_dayen_sabek = $array[$key]["totla_sabeq"][1];


            sum_original($original, $parent, $array[$key]["all_maden"], $array[$key]["all_dayen"], $all_total_maden_sabek, $all_total_dayen_sabek);
            $parent[$nivel] = $array[$key]["code"];
            recorrer_niveles($array[$key]["children"], $nivel, $parent, $original);
        } // foreach
    }
} // function

function sum_original(&$original, $parent, $cantidad, $cantidad2, $cantidad3, $cantidad4)
{
    if (!is_array($parent)) {
        return 0;
    }

    if (isset($original) and $original != null) {
        foreach ($original as $key => $value) {
            if (isset($original[$key]["code"]) && in_array($original[$key]["code"], $parent)) {
                $original[$key]["Total_maden"] += $cantidad;
                $original[$key]["Total_dayen"] += $cantidad2;
                $original[$key]["all_total_maden_sabek"] += $cantidad3;
                $original[$key]["all_total_dayen_sabek"] += $cantidad4;
            } // if
            sum_original($original[$key]["children"], $parent, $cantidad, $cantidad2, $cantidad3, $cantidad4);
        } // foreach
    }
} // function


/*****************************************************************/
$parent = null;
recorrer_niveles($records, -1, $parent, $records);


/*echo "<pre>";
print_r($records);
echo "</pre>";
die;*/

function buildTreeTable($tree, $count = 1)
{
    $s = 0;
    $value = 0;

    foreach ($tree as $record) {
        if (empty($record['children'])) {
            $dayen = $record['all_dayen'];
            $maden = $record['all_maden'];


            $all_total_maden_sabek = $record['totla_sabeq'][0];
            $all_total_dayen_sabek = $record['totla_sabeq'][1];
        } else {
            $all_total_maden_sabek = $record['all_total_maden_sabek'];
            $all_total_dayen_sabek = $record['all_total_dayen_sabek'];

            $dayen = $record['Total_dayen'];
            $maden = $record['Total_maden'];
        }

        $Rased_sabeq=0;
        if ($record['type'] == 2) {
            $Rased_sabeq =  $all_total_dayen_sabek - $all_total_maden_sabek;



            $value =($Rased_sabeq + $dayen - $maden);
        } elseif ($record['type'] == 1) {
            $Rased_sabeq =  $all_total_maden_sabek -  $all_total_dayen_sabek;



            $value =($Rased_sabeq + $maden - $dayen);
        }

        /* if ($s == 0) {


             if ($record['type'] == 2) {
                 if( !empty($record['totla_sabeq'][0] )  && !empty( $record['totla_sabeq'][1] ) ){

                     $Rased_sabeq =  $record['totla_sabeq'][1] -  $record['totla_sabeq'][0];

                 }else{
                     $Rased_sabeq=0;
                 }

                 $value =($Rased_sabeq + $dayen - $maden);


             } elseif ($record['type'] == 1) {


                 if( !empty($record['totla_sabeq'][0] )  && !empty( $record['totla_sabeq'][1] ) ){

                     $Rased_sabeq =  $record['totla_sabeq'][0] -  $record['totla_sabeq'][1];

                 }else{
                     $Rased_sabeq=0;
                 }


                 $value =($Rased_sabeq + $maden - $dayen);

             }

         } elseif ($s > 0) {

             if ($record['type'] == 2) {
                 $value = ($dayen - $maden);
             } elseif ($record['type'] == 1) {
                 $value = ($maden - $dayen);
             }
         }
*/


        if ($_POST['zero_account'] ==1) {
            if ($maden ==0 && $dayen==0 ||  $maden ==0.00 && $dayen==0.00) {
                continue;
            }
        } ?>
        <tr>
            <td><?= $count++ ?></td>
            <td><?= $record['code'] ?></td>
            <td><?= $record['name'] ?></td>
            <td class="countable1" data-number="<?php echo $Rased_sabeq; ?>">
                <?php  echo number_format($Rased_sabeq, 2); ?></td>
            <td class="countable2" data-type="<?php if (isset($record['children'])) {
            echo 1;
        } else {
            echo 0;
        } ?>"  data-number="<?=$maden?>"><?php
                echo number_format($maden, 2); ?></td>
            <td class="countable3"  data-type="<?php if (isset($record['children'])) {
                    echo 1;
                } else {
                    echo 0;
                } ?>" data-number="<?=$dayen?>"><?php  echo number_format($dayen, 2); ?></td>
            <td class="countable4"  data-type="<?php if (isset($record['children'])) {
                    echo 1;
                } else {
                    echo 0;
                } ?>" data-number="<?=$value?>"><?php  echo number_format($value, 2); ?></td>
        </tr>
        <?php
        if (isset($record['children'])) {
            $count = buildTreeTable($record['children'], $count++);
        }
        $s++;
    }
    return $count;
}
?>
<!--<button onclick="printDiv('printMe')" class="btn btn-success" style="float: left">طباعة</button>-->


    <div class="table-wrap" id="printMe">

        <div class=" col-xs-12 visible-print">

            <h5 class="text-center">حركة حساب
                <?php echo $hesab_name;?>
            </h5>
            <h6 class="text-center">
                خلال فترة  من
                <?php echo $this->input->post('from') ;?>    م

                إلي
                <?php echo $this->input->post('to');?>    م


            </h6>
        </div>

        <table id="scrollingtable" class="table table-bordered scrollingtable my_table result_table" role="table" style="table-layout: fixed;">
            <thead>
            <tr class="greentd">
                <th style="width: 30px">#</th>
                <th  style="width: 150px" class="text-left">رقم الحساب</th>
                <th style="width: 500px" class="text-left">إسم الحساب</th>
                <th class="text-left">رصيد سابق</th>
                <th class="text-left">المدين</th>
                <th class="text-left">الدائن</th>
                <th class="text-left">الرصيد</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $s = 0;
            //$$Rased_sabeq = 0;
            if (isset($records) && $records != null) {
                buildTreeTable($records);
            } ?>

            </tbody>
            <tfoot>
            <tr>
                <td colspan="3"  style="color: #fff;text-align: center;background-color:#fcb632; border-left: 0;
                      font-size:17px ; color:black; border-radius:5px;">الإجمالي</td>
                <!--<td style="border-left: 0;border-right: 0;background-color:#09704e;"></td>
                <td ></td> -->
                <td style="text-align: center;  background-color: #fcb632; border-radius:5px;  font-size:17px ; color:black;" class="result1">0</td>
                <td style="text-align: center;  background-color: #fcb632; border-radius:5px;  font-size:17px ; color:black;" class="result2"><?php //if($s == 0){ echo $Rased_sabeq; }else{ echo 0; }?></td>
                <td style="text-align: center;  background-color: #fcb632; border-radius:5px;  font-size:17px ; color:black;" class="result3">0</td>
                <td style="text-align: center;  background-color: #fcb632; border-radius:5px;  font-size:17px ; color:black;" class="result4">0</td>
            </tr>
            </tfoot>
        </table>
       <!-- <div class=" col-xs-12 visible-print">
            <br><br>

            <div class="col-xs-4 text-center">
                <label> المحاسب </label><br><br>
            </div>
            <div class="col-xs-4 text-center">
                <label> مدير الشئون المالية </label><br><br>
            </div>
            <div class="col-xs-4 text-center">

                <label>مدير عام الجمعية </label><br><br>
                <p></p><br>
            </div>
            <br><br>

        </div> -->


    </div>

<input type="hidden" name="type" id="type" value="<?php echo $type;?>">
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

    function ConvertToDecimal(num) {
        var n = parseFloat(num);
        if (isInt(n)) {
            return num;
        }
        else {
            num = num.toString();
            num = num.slice(0, (num.indexOf(".")) + 3);
            return(Number(num));
        }


    }

    function isInt(value){
        return (parseFloat(value) == parseInt(value)) && !isNaN(value);
    }

</script>

<script>
       var type =$('#type').val();
    var sum1 = 0;
    var sum2 = 0;
    var sum3 = 0;
    var sum4 = 0;
    $(".countable1").each(function(){
        sum1 +=parseInt($(this).attr('data-number'));
    });

    $(".countable2").each(function(){
        if(parseInt($(this).attr('data-type')) == 0) {
            sum2 += parseInt($(this).attr('data-number'));
        }

    });
    $(".countable3").each(function(){
        if(parseInt($(this).attr('data-type')) == 0){
        sum3 +=parseInt($(this).attr('data-number'));
        }
    });
    $(".countable4").each(function(){
        if(parseInt($(this).attr('data-type')) == 0){

        sum4 +=parseInt($(this).attr('data-number'));
        }
    });
       if(type == 2){
           $(".result4").text(ConvertToDecimal(formatMoney(((sum1 + sum3)-sum2 ))));
       }

       if(type == 1){

           $(".result4").text(ConvertToDecimal(formatMoney(((sum1 + sum2) -sum3))));

       }


    $(".result1").text(ConvertToDecimal(formatMoney(sum1)));
    $(".result2").text(ConvertToDecimal(formatMoney(sum2)));
    $(".result3").text(ConvertToDecimal(formatMoney(sum3)));


   // $(".result4").text(ConvertToDecimal(sum4));

</script>











<script>
    function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }


    function printData(divName)
    {
        var divToPrint=document.getElementById(divName);
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
                 orientation: 'portrait',
                customize: function (win) {
                    $(win.document.body).append("<style>@media print{  table tr td {  vertical-align: middle !important; } } body{background-color: #fff;} @page{size:  320mm 220mm;margin:10px 15px 35px 15px;}</style>");
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

                        '<div class="col-xs-3 no-padding"></div>'+
                        '<div class="col-xs-6 text-center">'+
                        '<h5 class="alperiod"> خلال الفترة من <?php 
                        $date_from = strtotime($this->input->post('from'));
                        echo date("d-m-Y",$date_from);
                        //echo $this->input->post('from');  ?> إلي <?php  
                        $date_to = strtotime($this->input->post('to'));
                        echo date("d-m-Y",$date_to);
                        
                        
                       // echo $this->input->post('to');  ?></h5>'+
                        '</div>'+

                        '<div class="col-xs-3 text-center"></div>'+

                        '</div>'+

                        '</div>';
                        
                        $(win.document.body).find('.print-h').html('حركة حساب');
                       



                    $(win.document.body).find('.page-print-header').append(headerpage);
                    $(win.document.body).find('.header-fatra').append(headerfatra);





                    $(win.document.body).find('.my_table').wrap('<div class="tablearea">');


                    var  contentcell =$(win.document.body).find('.report-content-cell')
                    $(win.document.body).find('.tablearea').appendTo(contentcell);
                    
                    
                     /***********************/
                    $(win.document.body).find('.my_table tbody tr td:nth-child(3)').attr('class','countable1');
                    $(win.document.body).find('.my_table tbody tr td:nth-child(4)').attr('class','countable2');
                    $(win.document.body).find('.my_table tbody tr td:nth-child(4)').attr('class','countable3');
                    $(win.document.body).find('.my_table tbody tr td:nth-child(4)').attr('class','countable4');
                    
                    
                    
                    
                     var type =$('#type').val();
                     if(type == 2){
                           var adf= ConvertToDecimal(formatMoney(((sum1 + sum3)-sum2 )));
                       }
                
                       if(type == 1){
                
                            var adf= ConvertToDecimal(formatMoney(((sum1 + sum2) -sum3)));
                
                       }
       
       
       
                    $(win.document.body).find('.tablearea tbody tr:last-child')
                    .after('<tr>'+
                    '<td class="text-center" colspan="3" style="background-color: #e8e8e8 !important;">الإجمالي</td>'+
                    '<td class="result1 text-center" style="background-color: #e8e8e8 !important;"> '+ConvertToDecimal(formatMoney(sum1))+'</td>'+
                    '<td class="result2 text-center" style="background-color: #e8e8e8 !important;"> '+ConvertToDecimal(formatMoney(sum2))+'</td>'+
                    '<td class="result3 text-center" style="background-color: #e8e8e8 !important;"> '+ConvertToDecimal(formatMoney(sum3))+'</td>'+
                    '<td class="result4 text-center style="background-color: #e8e8e8 !important;"> '+adf +' </td>'+
                    '</tr>' );
                     

                   
            
                    
                    
                    
                    //   var  headercell =$(win.document.body).find('.report-header-cell')
                    // $(win.document.body).find('.mpage-header').appendTo(headercell);
                    
                 
                    
                    
                    
                    
                     $(win.document.body).find('.my_table').after('<div class=" col-xs-12">'+
                                    
                                        '<div class="col-xs-4 text-center">'+
                                            '<label> المحاسب </label><br><br>'+
                                        '</div>'+
                                        '<div class="col-xs-4 text-center">'+
                                            '<label> مدير الشئون المالية </label><br><br>'+
                                        '</div>'+
                                        '<div class="col-xs-4 text-center">'+
                            
                                            '<label>مدير عام الجمعية </label><br><br>'+
                                            '<p></p><br>'+
                                        '</div>'+
                                        '<br><br>'+
                            
                                    '</div>' ); 



                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('table-layout', 'fixed');
                        
                     //   $(win.document.body).find('thead tr:first-child th:nth-child(1)').css("width", "350px");
                    $(win.document.body).find('thead tr th:nth-child(1)').css("width", "40px");
                    
                    $(win.document.body).find('thead tr th:nth-child(2)').css("width", "100px");
                    $(win.document.body).find('thead tr th:nth-child(3)').css("width", "380px");
                    
                    /*$(win.document.body).find('thead tr th:nth-child(4)').css("width", "80px");
                    
                    $(win.document.body).find('thead tr th:nth-child(5)').css("width", "80px");
                    $(win.document.body).find('thead tr th:nth-child(6)').css("width", "380px");*/
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




