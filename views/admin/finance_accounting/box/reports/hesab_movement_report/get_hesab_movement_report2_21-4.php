<style>
    @page{
        size: landscape;
    }
    .specific_style{

        background-color: #658e1a !important;
        color: white;
    }

    .specific_style_2{
        width: 280px;
        background-color: white;
        color: red;
        border: 1px solid #658e1a;
    }



   /* .table-scroll {
        position: relative;
        max-width: 1280px;
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
    }*/
    
    
    
     .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {
    border: 1px solid #ffffff !important;
    background: #e8e8e8;
    border-radius: 7px !important;
    font-size: 15px !important;
    color: black;
    border: 1px solid white !important;
}   
 .dataTables_scrollBody{
    
        position: relative !important;
    overflow: auto !important;
    max-height: 34vh !important;
    width: 100% !important;
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


/*****************************************************************/
$parent = null;
recorrer_niveles($records, -1, $parent, $records);

function buildTreeTable($tree, $count = 1)
{

    $s = 0;
    $value = 0;

    foreach ($tree as $record) {


        if (empty($record['children'])) {
            $dayen = $record['all_dayen'];
            $maden = $record['all_maden'];

        } else {

            $dayen = $record['Total_dayen'];
            $maden = $record['Total_maden'];

        }


        if ($s == 0) {

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



        if($_POST['zero_account'] ==1){

            if( $maden ==0 && $dayen==0 ||  $maden ==0.00 && $dayen==0.00){
                continue;

            }


        }

        ?>
        <tr>
            <td><?= $count++ ?></td>
            <td><?= $record['code'] ?></td>
            <td><?= $record['name'] ?></td>
            <td class="countable1" data-number="<?php if($s == 0){ echo $Rased_sabeq; }else{ echo 0; }?>"><?php if($s == 0){ echo number_format($Rased_sabeq,2); }else{ echo number_format(0,2); } ?></td>
            <td class="countable2" data-type="<?php if (isset($record['children'])) { echo 1;
            }else{ echo 0; }?>"  data-number="<?=$maden?>"><?php
                echo number_format($maden,2);?></td>
            <td class="countable3"  data-type="<?php if (isset($record['children'])) { echo 1;
            }else{ echo 0; }?>" data-number="<?=$dayen?>"><?php  echo number_format($dayen,2); ?></td>
            <td class="countable4"  data-type="<?php if (isset($record['children'])) { echo 1;
            }else{ echo 0; }?>" data-number="<?=$value?>"><?php  echo number_format($value,2); ?></td>
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
<button onclick="printDiv('printMe')" class="btn btn-success" style="float: left">طباعة</button>


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

        <table id="scrollingtable" class="table table-bordered scrollingtable result_table" role="table" style="table-layout: fixed;">
            <thead>
            <tr class="greentd">
                <th width="2%">#</th>
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
                <td style="text-align: center;  background-color: #fcb632; border-radius:5px;  font-size:17px ; color:black;" class="result2"><?php //if($s == 0){ echo $Rased_sabeq; }else{ echo 0; } ?></td>
                <td style="text-align: center;  background-color: #fcb632; border-radius:5px;  font-size:17px ; color:black;" class="result3">0</td>
                <td style="text-align: center;  background-color: #fcb632; border-radius:5px;  font-size:17px ; color:black;" class="result4">0</td>
            </tr>
            </tfoot>
        </table>
        <div class=" col-xs-12 visible-print">
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

        </div>


    </div>


<script>

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
    $(".result1").text(sum1.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
    $(".result2").text(sum2.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
    $(".result3").text(sum3.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
    $(".result4").text(sum4.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2}));

</script>


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
                customize: function ( win ) {
                    $(win.document.body).append("<style> body{  background-color: #fff;} @page{size:landscape}</style>")
                    $(win.document.body)
                        .css( 'font-size', '14pt' )
                        .prepend(
                            '<img src="<?php echo base_url();  ?>/asisst/admin_asset/img/pills/back2.png" style="position:absolute; top:0; left:0;    width: 500px;" />'
                        );

                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'table-layout', 'fixed' );
                    $(win.document.body).find('thead th:nth-child(1)').css("width","50px");
                    $(win.document.body).find('thead th:nth-child(6)').css("width","200px");
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
        scrollY:        '50vh',
        scrollCollapse: true,
        paging:         false,
        info: false,
        colReorder: true
    } );

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









