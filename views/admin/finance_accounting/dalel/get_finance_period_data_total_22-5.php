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

/*cho '<pre>';
print_r( $records);
echo'</pre>';
die;*/
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

    foreach ($tree as $record) {

        $rased_sabek_madeen = $record['total_sabeq'][0];
        $rased_sabek_dayen = $record['total_sabeq'][1];


        if (empty($record['children'])) {
            $dayen =$record['all_dayen'];
            $maden =$record['all_maden'];

        }else{

            $dayen =$record['Total_dayen'];
            $maden =$record['Total_maden'];

        }

        if($record['type'] ==2){

            $rased_dayen = ($dayen +$rased_sabek_dayen - $maden + $rased_sabek_madeen);
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

        if($_POST['zero_account'] ==='on'){


            if( $dayen == 0.00 && $maden == 0.00  && $rased_sabek_madeen ==  0.00 &&  $rased_sabek_dayen == 0.00){

                continue;

            }


            // }

        }


        //$total_harka_madeen +=$maden;
//total_sabeq

        ?>

            <tr class="text-center">
                <td class="requirementRight"><?=$record['code'] ?></td>
                <td><?=$record['name']?> </td>
                <td class="td1" data-type="<?php if (isset($record['children'])) { echo 1;
                }else{ echo 0; }?>" data-number="<?=$rased_sabek_madeen?>"><?php echo number_format($rased_sabek_madeen,2); ?></td>
                <td class="td2" data-type="<?php if (isset($record['children'])) { echo 1;
                }else{ echo 0; }?>" data-number="<?=$rased_sabek_dayen?>"><?php echo number_format($rased_sabek_dayen,2); ?></td>
                <td class="td3" data-type="<?php if (isset($record['children'])) { echo 1;
                }else{ echo 0; }?>" data-number="<?=$maden?>"><?php echo number_format($maden,2);?></td>
                <td class="td4" data-type="<?php if (isset($record['children'])) { echo 1;
                }else{ echo 0; }?>" data-number="<?=$dayen?>"><?php echo number_format($dayen,2);?></td>
                <td class="td5" data-type="<?php if (isset($record['children'])) { echo 1;
                }else{ echo 0; }?>" data-number="<?php echo ($rased_sabek_madeen+ $maden);?>"><?php echo ($rased_sabek_madeen+ $maden);?></td>
                <td class="td6" data-type="<?php if (isset($record['children'])) { echo 1;
                }else{ echo 0; }?>" data-number="<?php echo ($rased_sabek_dayen+ $dayen);?>"><?php echo ($rased_sabek_dayen+ $dayen);?></td>
                <td class="td7" data-type="<?php if (isset($record['children'])) { echo 1;
                }else{ echo 0; }?>" data-number="<?=$rased_madeen?>"><?php echo number_format($rased_madeen,2); ?></td>
                <td class="td8" data-type="<?php if (isset($record['children'])) { echo 1;
                }else{ echo 0; }?>" data-number="<?=$rased_dayen?>"><?php  echo number_format($rased_dayen,2);?></td>
            </tr>


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

            <h5 class="text-center"> تقرير كل الحسابات خلال فترة</h5>
            <h6 class="text-center">
                خلال فترة من
                <?php echo $this->input->post('from'); ?> م

                إلي
                <?php echo $this->input->post('to'); ?> م


            </h6>
        </div>


        <table id="" class=" table table-bordered scrollingtable my_table" role="table" style="table-layout: fixed">
            <thead>
            <tr class="greentd text-center">
                <th  style="width: 300px" colspan="2" class="text-center"> تفاصيل الحساب</th>
                <th colspan="2" class="text-center">رصيد ماقبل</th>
                <th colspan="2" class="text-center">الحركة</th>
                <th colspan="2" class="text-center">الإجمالي</th>
                <th colspan="2" class="text-center">الرصيد</th>
            </tr>
            <tr class="greentd text-center">
                <th class="text-center">رمز الحساب</th>
                <th  style="width: 230px" class="text-center">إسم الحساب</th>
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
            <tr>
                <td style="color: #fff;text-align: center;background-color:#09704e; border-left: 0;">الإجمالي</td>
                <td></td>
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

    <button onclick="printDiv('printMe')" class="btn btn-success" style="float: left">طباعة</button>


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

    function removeCommas(str) {
        while (str.search(",") >= 0) {
            str = (str + "").replace(',', '');
        }
        return str;
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

    var cls1 = $(".my_table").find("td.td1");
    var cls2 = $(".my_table").find("td.td2");
    var cls3 = $(".my_table").find("td.td3");
    var cls4 = $(".my_table").find("td.td4");
    var cls5 = $(".my_table").find("td.td5");
    var cls6 = $(".my_table").find("td.td6");


    /*for (var i = 0; i < cls5.length; i++) {
        var variable =cls1[i].innerHTML + cls3[i].innerHTML;
        cls5[i].innerHTML = (variable.toFixed(2));



    }
    for (var i = 0; i < cls6.length; i++) {
        var variable =cls2[i].innerHTML + cls4[i].innerHTML;

        cls6[i].innerHTML = (variable.toFixed(2));



    }*/

    //var sum5=0;
    //var sum6=0;
    for (var i = 0; i < cls5.length; i++) {
        if (cls5[i].className == "td5") {
            cls5[i].innerHTML = formatMoney(parseFloat(removeCommas(cls1[i].innerHTML)) + parseFloat(removeCommas(cls3[i].innerHTML)));
            // sum5 += isNaN(cls5[i].innerHTML) ? 0 : parseInt(cls5[i].innerHTML);
        }

    }
    for (var i = 0; i < cls6.length; i++) {
        if (cls6[i].className == "td6") {
            cls6[i].innerHTML = formatMoney(parseFloat(removeCommas(cls2[i].innerHTML)) + parseFloat(removeCommas(cls4[i].innerHTML)));
            // sum6 += isNaN(cls6[i].innerHTML) ? 0 : parseInt(cls6[i].innerHTML);
        }

    }


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


