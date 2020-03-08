
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
   
   /* @page{
        size: portrait;
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
      } // function

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

      } // function


      /*****************************************************************/
      $parent = null;
      recorrer_niveles($records, -1, $parent, $records);

      /*echo "<pre>";
       print_r($records);
       echo "</pre>";
     die;*/
      $arr = array(strtotime($_POST['from']),strtotime($_POST['to']));
      $mydate =implode("-",$arr);
      ?>

<button type="button" style="margin-right: 90%;" onclick="printDiv2('printMe')" class="btn btn-labeled btn-purple but">
    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
</button>
<div id="printMe">
    <div class=" col-xs-12 visible-print">

        <h5 class="text-center">قائمه الانشطه

        </h5>
        <h6 class="text-center">
            خلال فترة  من
            <?php echo $_POST['from'] ;?>    م

            إلي
            <?php echo $_POST['to'] ;?>    م


        </h6>





    </div>
  <table id="scrollingtable" class="table table-bordered  scrollingtable" border="1" cellpadding="3" role="table" style="table-layout: fixed;">
           
        <div id="faux-table" class="faux-table" aria="hidden"></div>
        <div class="table-wrap">
            <table  id="main-table" class="table table-bordered result_table" role="table">
                <thead>
                <tr class="info">
                    <th  scope="col" width="2%">#</th>
                    <th  scope="col" class="text-left">رقم الحساب</th>
                    <th scope="col" class="text-left">إسم الحساب</th>
                    <th  scope="col" class="text-left">الإيرادات والتبرعات</th>
                    <th scope="col"  class="text-left">المصروفات</th>

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
                            $erad = $record['all_erad'];
                            $masrofat = $record['all_masrofat'];

                        } else {

                            $erad = $record['Total_erad'];
                            $masrofat = $record['Total_masrofat'];

                        }
                        ?>
                        <tr>
                            <td><?= $count++ ?></td>
                            <td><?= $record['code'] ?></td>
                            <td><?= $record['name'] ?></td>
                            <td class="countable1"><?= $erad ?></td>
                            <td class="countable2"><?= $masrofat ?></td>
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
                </tr>

                </tbody>
                <tfoot>
                <tr class="hidden-print">
                    <td colspan="3" style="text-align: center;color: red">الإجمالي</td>
                    <td class="result1">0</td>
                    <td class="result2">0</td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
    <div class="text-center">
        <table class="table table-bordereds  " style="width: 50%; margin: auto;">
            <tbody>
            <tr>
                <td class="specific_style" style="width: 280px;"> إجمالي الإيرادات والتبرعات</td>
                <td class="specific_style_2" style="width: 280px; color: green; font-size: 16px;
                      font-weight: bold;"  id="total_erad"
                ></td>

            </tr>

            <tr>
                <td class="specific_style" style="width: 280px;">إجمالي المصروفات </td>
                <td class="specific_style_2"  id="total_masrofat" style="width: 280px;font-size: 16px;
                      font-weight: bold;"></td>
            </tr>
            <tr>
                <td class="specific_style" style="width: 280px;" id="symbol_title"></td>
                <td class="specific_style_2" style="width: 280px; font-weight: bold;" id="symbol_value"
                ></td>
            </tr>


            </tbody>
        </table>
    </div>

</div>



<script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
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
var titles;
var color;
var symbol;
var values;

    if(sum2 > sum1){

         titles='العجز';
         color='red';
         symbol='-';
        values = (sum2 - sum1);

    } else if (sum1 > sum2){

         titles='الفائض';
         color='green';
         symbol='+';
        values = (sum1 - sum2);
    }
    $("#symbol_title").text(titles+'['+ symbol +']');
    $("#symbol_value").text(values);


    $(".result1").text(sum1);
    $("#total_erad").text(sum1);
    $(".result2").text(sum2);
    $("#total_masrofat").text(sum2);
    $(".result3").text(sum3);

</script>



<script>
    var fauxTable = document.getElementById("faux-table");
    var mainTable = document.getElementById("main-table");
    var clonedElement = mainTable.cloneNode(true);
    var clonedElement2 = mainTable.cloneNode(true);
    clonedElement.id = "";
    clonedElement2.id = "";
    fauxTable.appendChild(clonedElement);
    fauxTable.appendChild(clonedElement2);


      $('.example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                'copy',
                'csv',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },

                {
                    extend: 'print',
                    exportOptions: { columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true
        } );



</script>









