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
      /*  size: 297mm 210mm;*/


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
    
    
    .dataTables_scrollFoot tfoot tr:first-child td:nth-child(2){
        width:195px !important
    }
    .dataTables_scrollFoot tfoot tr:first-child td:nth-child(3){
         width:195px !important
    }
    .dataTables_scrollFoot tfoot tr:last-child td:nth-child(2){
         width:405px !important
    }
    .dataTables_scrollFootInner{
        padding-left: 0 !important; 
    }
    
    
    
    
    .dataTables_scrollHead thead tr th:nth-child(1){
        width:130px !important
        }
    .dataTables_scrollHead thead tr th:nth-child(3){
    width:190px !important
    }
    .dataTables_scrollHead thead tr th:nth-child(4){
    width:190px !important
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
            $array[$key]["Total_erad"] = $cantidad;
            $array[$key]["Total_masrofat"] = $cantidad;
            $cuenta = 0;
            if (isset($parent) and $parent != null) {
                $cuenta = count($parent);
            }


            for ($i = $nivel; $i < $cuenta; $i++) {
                unset($parent[$i]);
            } // for
            sum_original($original, $parent, $array[$key]["all_erad"], $array[$key]["all_masrofat"]);
            $parent[$nivel] = $array[$key]["code"];
            recorrer_niveles($array[$key]["children"], $nivel, $parent, $original);
        } // foreach
    }
}

function sum_original(&$original, $parent, $cantidad, $cantidad2)
{
    if (!is_array($parent)) return 0;

    if (isset($original) and $original != null) {
        foreach ($original as $key => $value) {
            if (isset($original[$key]["code"]) && in_array($original[$key]["code"], $parent)) {
                $original[$key]["Total_erad"] += $cantidad;
                $original[$key]["Total_masrofat"] += $cantidad2;


            } // if
            sum_original($original[$key]["children"], $parent, $cantidad, $cantidad2);
        } // foreach
    }

}
$parent = null;
recorrer_niveles($records, -1, $parent, $records);

$arr = array(strtotime($_POST['from']),strtotime($_POST['to']));
$mydate =implode("-",$arr);



function buildTreeTable($tree, $count = 1)
{
    $s = 0;
    $value = 0;
    foreach ($tree as $record) {


        if (empty($record['children'])) {
            $erad = $record['all_erad'];
            $masrofat = $record['all_masrofat'];

        } else {

            $erad = $record['Total_erad'];
            $masrofat = $record['Total_masrofat'];

        }

        if($_POST['zero'] ==='on'){


            if( $erad == 0 && $masrofat ==0){

                continue;

            }


        }
        ?>

        <?php   if (empty($record['children'])) { ?>
            <tr style="">
                <td><?= $record['code'] ?></td>
                <td><?= $record['name'] ?></td>
                <td class="countable1"  data-type="<?php if (isset($record['children'])) { echo 1;
                }else{ echo 0; }?>" data-number="<?= $erad ?>"><?php echo number_format($erad,2); ?></td>
                <td class="countable2"  data-type="<?php if (isset($record['children'])) { echo 1;
                }else{ echo 0; }?>" data-number="<?= $masrofat ?>"><?php echo number_format($masrofat,2); ?></td>
            </tr>

        <?php } ?>

        <?php
        if (isset($record['children'])) {
            $count = buildTreeTable($record['children'], $count++);
        }
        $s++;
    }
    return $count;
}
?>

<!--<button type="button" style="margin-right: 90%;" onclick="printDiv2('printMe')" class="btn btn-labeled btn-purple but">
    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
</button>-->

<div id="printMe">
    <div class=" col-xs-12 no-padding visible-print">

        <h5 class="text-center">قائمه الانشطه

        </h5>
        <h6 class="text-center">
            خلال فترة  من
            <?php echo $_POST['from'] ;?>    م

            إلي
            <?php echo $_POST['to'] ;?>    م


        </h6>





    </div>


    <table id="" class=" table table-bordered scrollingtable my_table" role="table" style="width: 100%;border-collapse:separate" border="1">
        <thead >
            <tr class="greentd text-center">
                <th   class="text-left" style="width: 120px;">رقم الحساب</th>
                <th  class="text-left">إسم الحساب</th>
                <th   class="text-left" style="width: 180px;">الإيرادات والتبرعات</th>
                <th   class="text-left" style="width: 180px;">المصروفات</th>
    
            </tr>
        </thead>
        <tbody>
        <?php
        
        if (isset($records) && $records != null) {
            // buildTreeTable($records[3]);
            buildTreeTable($records);

        }
        ?>
        </tbody>
        <tfoot>
        <tr class="orangetd">
            <td colspan="2" style="color: #000;text-align: center;background-color:#fcb632; border-left: 0;font-size:20px;">الإجمالي</td>
            <td  style="text-align: center;color: green;font-size:20px;" class="result1">0</td>
            <td  style="text-align: center;color: red;font-size:20px;" class="result2">0</td>
        </tr>
        <tr class="orangetd">
            <td  colspan="2"  class="my_titles"  style="color: #000;text-align: center;background-color:#fcb632; border-left: 0;font-size:20px;"></td>
            <td  colspan="2"  style="text-align: center;color: green;font-size:20px;" class="my_titles_value"></td>

        </tr>
        </tfoot>
    </table>




</div>



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

    function GetSum(div_class) {
        var  sum=0;
        $("." +div_class).each(function(){
            if(parseInt($(this).attr('data-type')) == 0) {
                sum += parseFloat($(this).attr('data-number'));
            }
        });
        return (ConvertToDecimal(sum));
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
    $(".result1").text( formatMoney(GetSum('countable1')));
    $(".result2").text( formatMoney(GetSum('countable2')));
    $(".result3").text( formatMoney(GetSum('countable3')));
    var sum1 =GetSum('countable1');
    var sum2 =GetSum('countable2');

    var titles;
    var color;
    var symbol;
    var values;

    if(sum2 > sum1){

        titles='العجز';
        color='red';
        symbol='-';
        values = (sum2 - sum1);;

    } else if (sum1 > sum2){

        titles='الفائض';
        color='green';
        symbol='+';
        values = (sum1 - sum2);;
    }

    $(".my_titles").html(titles+'['+ symbol +']');
    //$(".my_titles_value").html(formatMoney(values)));
    $(".my_titles_value").html(ConvertToDecimal(formatMoney(values)));


    /*$(".result1").text(sum1);
    $("#total_erad").text(sum1);
    $(".result2").text(sum2);
    $("#total_masrofat").text(sum2);
    $(".result3").text(sum3);*/


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
                    $(win.document.body).append("<style>@media print{  table tr td {  vertical-align: middle !important; } } body{background-color: #fff;} @page{margin:10px 15px 35px 15px;}</style>");
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
                        
                        $(win.document.body).find('.print-h').html('قائمة الأنشطة ');
                       



                    $(win.document.body).find('.page-print-header').append(headerpage);
                    $(win.document.body).find('.header-fatra').append(headerfatra);





                    $(win.document.body).find('.my_table').wrap('<div class="tablearea">');


                    var  contentcell =$(win.document.body).find('.report-content-cell')
                    $(win.document.body).find('.tablearea').appendTo(contentcell);
                    
                    
                     /***********************/
                    $(win.document.body).find('.my_table tbody tr td:nth-child(3)').attr('class','countable1');
                    $(win.document.body).find('.my_table tbody tr td:nth-child(4)').attr('class','countable2');
                    
                    
                    $(win.document.body).find('.tablearea tbody tr:last-child')
                    .after('<tr>'+
                    '<td class="text-center" colspan="2" style="background-color: #e8e8e8 !important;">الإجمالي</td>'+
                    '<td class="result1" style="background-color: #e8e8e8 !important;">'+GetSum('countable1')+'</td>'+
                    '<td class="result2" style="background-color: #e8e8e8 !important;">'+GetSum('countable2')+'</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td class="text-center my_titles" colspan="2"  style="background-color: #e8e8e8 !important;">العجز</td>'+
                    '<td class="my_titles_value" colspan="2" style="background-color: #e8e8e8 !important;">'+ConvertToDecimal(formatMoney(values))+'</td>'+
                    
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
                    $(win.document.body).find('thead tr th:nth-child(1)').css("width", "120px");
                    $(win.document.body).find('tbody tr td:nth-child(1)').css("text-align", "right !important");
                    $(win.document.body).find('thead tr th:nth-child(2)').css("width", "400px");
                    $(win.document.body).find('tbody tr td:nth-child(2)').css("text-align", "right !important");
                    
                    $(win.document.body).find('tbody tr td:nth-child(3)').css("text-align", "center !important");
                    
                    $(win.document.body).find('tbody tr td:nth-child(4)').css("text-align", "center !important");
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