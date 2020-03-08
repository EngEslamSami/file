<style>
    @page{
        /* size: landscape;*/
        margin: 10px;
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

    .compact{
        table-layout: fixed;
    }

    .compact td{
        background-color: #fff !important;

    }
    @media print{
        .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td{
            border: 1px solid #000 !important;
        }
        table.dataTable thead th, table.dataTable thead td{
            font-size: 16px;
            border: 1px solid #000 !important;
            background-color: #eee;
        }
    }
</style>






<div class="col-sm-12 col-md-12 col-xs-12">

    <div class="top-line"></div>
    <div class="panel panel-bd lobidrag">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>ميزان مراجعه</h4>
            </div>
        </div>
        <div class="panel-body">
            <?php
            function buildTreeTable($tree, $count=1)
            {

                $s =0;
                $rased_dayen =0;
                $rased_madeen =0;
                foreach ($tree as $record) {


                    if (empty($record['children'])) {
                        $dayen =$record['all_dayen'];
                        $maden =$record['all_maden'];

                    }else{

                        $dayen =$record['Total_dayen'];
                        $maden =$record['Total_maden'];

                    }

                    if($record['type'] ==2){
                        // $value = $value + ($dayen - $maden);
                        $rased_dayen = ($dayen - $maden);

                    }elseif ($record['type'] ==1){
                        // $value = $value + ($maden - $dayen);
                        $rased_madeen = ($maden) - ($dayen);
                    }

                    //$total_harka_madeen +=$maden;


                    ?>
                    <tr class="text-center">
                        <td><?=$record['code']?></td>
                        <td><?=$record['name']?></td>
                        <td class="td1">0</td>
                        <td class="td2">0</td>
                        <td class="td3"><?php echo sprintf("%.2f", ($maden));?></td>
                        <td class="td4"><?php echo sprintf("%.2f", ($dayen));?></td>
                        <td class="td5">0</td>
                        <td class="td6">0</td>
                        <td class="td7"><?=$rased_madeen?></td>
                        <td class="td8"><?=$rased_dayen?></td>
                    </tr>
                    <?php
                    if (isset($record['children'])) {
                        $count = buildTreeTable($record['children'], $count++);
                    }
                    $s++;}
                return $count;
            }

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


            if (isset($records) && $records!=null) {
                ?>


                <button onclick="printDiv('printMe')" class="btn btn-success" style="float: left">طباعة</button>



            <div class="table-wrap" id="printMe">

                <table id="scrollingtable" class="table table-bordered  scrollingtable my_table" border="1" cellpadding="3" role="table" >

                    <thead>
                    <tr class="greentd text-center">
                         <th colspan="2" class="text-center"> تفاصيل الحساب</th>
                         <th colspan="2" class="text-center">رصيد ماقبل</th>
                         <th colspan="2" class="text-center">الحركة</th>
                         <th colspan="2" class="text-center">الإجمالي</th>
                         <th colspan="2" class="text-center">الرصيد</th>
                     </tr>
                    <tr class="greentd text-center">
                        <th class="text-center">رمز الحساب</th>
                        <th class="text-center">إسم الحساب</th>
                        <th class="text-center">مدين</th>
                        <th class="text-center">دائن</th>
                        <th class="text-center">مدين</th>
                        <th class="text-center">دائن</th>
                        <th class="text-center">مدين</th>
                        <th class="text-center">دائن</th>
                        <th class="text-center">مدين</th>
                        <th class="text-center">دائن</th>
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
                    <tr class="text-center">
                        <td  style="color: #fff;text-align: center;background-color:#09704e; border-left: 0;">الإجمالي</td>
                        <td style="border-left: 0;border-right: 0;background-color:#09704e;"></td>
                        <td class="result1">0</td>
                        <td class="result2">0</td>
                        <td class="result3">0</td>
                        <td class="result4">0</td>
                        <td class="result5">0</td>
                        <td class="result6">0</td>
                        <td class="result7">0</td>
                        <td class="result8">0</td>
                    </tr>
                    </tfoot>
                </table>
                <?php
          } else
                echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا توجد حسابات
</div>';

            ?>
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

<script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

    <script>

        var cls1 = $(".my_table").find("td.td1");
        var cls2 = $(".my_table").find("td.td2");
        var cls3 = $(".my_table").find("td.td3");
        var cls4 = $(".my_table").find("td.td4");
        var cls5 = $(".my_table").find("td.td5");
        var cls6 = $(".my_table").find("td.td6");
        var cls7 = $(".my_table").find("td.td7");
        var cls8 = $(".my_table").find("td.td8");



        var sum1 = 0;
        var sum2 = 0;
        var sum3 = 0;
        var sum4 = 0;
        var sum5 = 0;
        var sum6 = 0;
        var sum7 = 0;
        var sum8 = 0;

        for (var i = 0; i < cls1.length; i++) {
            if (cls1[i].className == "td1") {
                sum1 += isNaN(cls1[i].innerHTML) ? 0 : parseInt(cls1[i].innerHTML);
            }

        }

        for (var i = 0; i < cls2.length; i++) {
            if (cls2[i].className == "td2") {
                sum2 += isNaN(cls2[i].innerHTML) ? 0 : parseInt(cls2[i].innerHTML);
            }

        }
       for (var i = 0; i < cls3.length; i++) {
            if (cls3[i].className == "td3") {
                sum3 += isNaN(cls3[i].innerHTML) ? 0 : parseInt(cls3[i].innerHTML);
            }

        }

        for (var i = 0; i < cls4.length; i++) {
            if (cls4[i].className == "td4") {
                sum4 += isNaN(cls4[i].innerHTML) ? 0 : parseInt(cls4[i].innerHTML);
            }

        }
        for (var i = 0; i < cls5.length; i++) {
            if (cls5[i].className == "td5") {
                cls5[i].innerHTML = (parseInt(cls1[i].innerHTML) + parseInt(cls3[i].innerHTML));
                sum5 += isNaN(cls5[i].innerHTML) ? 0 : parseInt(cls5[i].innerHTML);
            }

        }
        for (var i = 0; i < cls6.length; i++) {
            if (cls6[i].className == "td6") {
                cls6[i].innerHTML = (parseInt(cls2[i].innerHTML) + parseInt(cls4[i].innerHTML));
                sum6 += isNaN(cls6[i].innerHTML) ? 0 : parseInt(cls6[i].innerHTML);
            }

        }
        for (var i = 0; i < cls7.length; i++) {
            if (cls7[i].className == "td7") {
                sum7 += isNaN(cls7[i].innerHTML) ? 0 : parseInt(cls7[i].innerHTML);
            }

        }
        for (var i = 0; i < cls8.length; i++) {
            if (cls8[i].className == "td8") {
                sum8 += isNaN(cls8[i].innerHTML) ? 0 : parseInt(cls8[i].innerHTML);
            }

        }

       $(".result1").text(sum1);
       $(".result2").text(sum2);
       $(".result3").text(sum3);
       $(".result4").text(sum4);
       $(".result5").text(sum5);
       $(".result6").text(sum6);
       $(".result7").text(sum7);
       $(".result8").text(sum8);


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










