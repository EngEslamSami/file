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
                <th class="text-left">رقم الحساب</th>
                <th class="text-left">إسم الحساب</th>
                <th class="text-left">رصيد سابق</th>
                <th class="text-left">المدين</th>
                <th class="text-left">الدائن</th>
                <th class="text-left">الرصيد</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($records) && $records != null) {
                buildTreeTable($records);
            }
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
                        <td><?php if($s == 0){ echo number_format($Rased_sabeq, 2); }else{ echo 0; } ?></td>
                        <td class="countable1"><?= number_format($maden, 2) ?></td>
                        <td class="countable2"><?= number_format($dayen, 2) ?></td>
                        <td class="countable3"><?= number_format($value, 2) ?></td>
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



            </tbody>
            <tfoot>
            <tr>
                <td  style="color: #fff;text-align: center;background-color:#09704e; border-left: 0;">الإجمالي</td>
                <td style="border-left: 0;border-right: 0;background-color:#09704e;"></td>
                <td ></td>
                <td class="result1">0</td>
                <td class="result2">0</td>
                <td class="result3">0</td>
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

    var cls1 = $(".result_table").find("td.countable1");
    var cls2 = $(".result_table").find("td.countable2");
    var cls3 = $(".result_table").find("td.countable3");


    var sum1 = 0;
    var sum2 = 0;
    var sum3 = 0;

    for (var i = 0; i < cls1.length; i++) {
        if (cls1[i].className == "countable1") {
            sum1 += isNaN(cls1[i].innerHTML) ? 0 : parseInt(cls1[i].innerHTML);
        }

    }

    for (var i = 0; i < cls2.length; i++) {
        if (cls2[i].className == "countable2") {
            sum2 += isNaN(cls2[i].innerHTML) ? 0 : parseInt(cls2[i].innerHTML);
        }
    }
    for (var i = 0; i < cls3.length; i++) {
        if (cls3[i].className == "countable3") {
            sum3 += isNaN(cls3[i].innerHTML) ? 0 : parseInt(cls3[i].innerHTML);
        }
    }

    $(".result1").text(sum1.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
    $(".result2").text(sum2.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2}));
    $(".result3").text(sum3.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2}));

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









