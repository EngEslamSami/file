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



    .table-scroll {
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

/*echo "<pre>";
 print_r($records);
 echo "</pre>";
die;*/
?>
<button onclick="printDiv('printMe')" class="btn btn-success" style="float: left">طباعة</button>


<div id="table-scroll" class="table-scroll">
    <div id="faux-table" class="faux-table" aria="hidden"></div>
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

        <table id="main-table" class="table table-bordered examplessss result_table" role="table" style="table-layout: fixed;">
            <thead>
            <tr class="info">
                <th width="2%">#</th>
                <th class="text-left">رقم الحساب</th>
                <th class="text-left">إسم الحساب</th>
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
                            $value = ($dayen - $maden);

                        } elseif ($record['type'] == 1) {
                            $value = ($maden - $dayen);
                        }

                    } elseif ($s > 0) {

                        if ($record['type'] == 2) {
                            $value = ($dayen - $maden);
                        } elseif ($record['type'] == 1) {
                            $value = ($maden - $dayen);
                        }
                    }


                    ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $record['code'] ?></td>
                        <td><?= $record['name'] ?></td>
                        <td class="countable1"><?= $maden ?></td>
                        <td class="countable2"><?= $dayen ?></td>
                        <td class="countable3"><?= $value ?></td>
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



            <tr class="visible-print">
                <td colspan="3" style="text-align: center;color: red">الإجمالي</td>
                <td class="result1">0</td>
                <td class="result2">0</td>
                <td class="result3">0</td>
            </tr>

            </tbody>
            <tfoot class="hidden-print">
            <tr>
                <td colspan="3" style="text-align: center;color: red">الإجمالي</td>
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



    </div>
</div>





<script>


    document.addEventListener("DOMContentLoaded", function(event) {
        call();
    });


function call() {
    var fauxTable = document.getElementById("faux-table");
    var mainTable = document.getElementById("main-table");
    var clonedElement = mainTable.cloneNode(true);
    var clonedElement2 = mainTable.cloneNode(true);
    clonedElement.id = "";
    clonedElement2.id = "";
    fauxTable.appendChild(clonedElement);
    fauxTable.appendChild(clonedElement2);


}





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

    $(".result1").text(sum1);
    $(".result2").text(sum2);
    $(".result3").text(sum3);

</script>






<script>
    function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>











