
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
              <tr>
                  <td><?= $record['code'] ?></td>
                  <td><?= $record['name'] ?></td>
                  <td class="countable1"  data-type="<?php if (isset($record['children'])) { echo 1;
                  }else{ echo 0; }?>" data-number="<?= $erad ?>"><?php echo number_format($erad,2); ?></td>
                  <td class="countable2"  data-type="<?php if (isset($record['children'])) { echo 1;
                  }else{ echo 0; }?>" data-number="<?= $masrofat ?>"><?php echo number_format($masrofat,2); ?></td>
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
                <thead>
                <tr class="greentd text-center">
                    <th   class="text-left">رقم الحساب</th>
                    <th  class="text-left">إسم الحساب</th>
                    <th   class="text-left">الإيرادات والتبرعات</th>
                    <th   class="text-left">المصروفات</th>

                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($records) && $records != null) {
                    buildTreeTable($records);
                }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2" style="color: #fff;text-align: center;background-color:#09704e; border-left: 0;">الإجمالي</td>
                    <td  style="text-align: center;color: green" class="result1">0</td>
                    <td  style="text-align: center;color: red" class="result2">0</td>
                </tr>
                <tr>
                    <td  colspan="2"  class="my_titles"  style="color: #fff;text-align: center;background-color:#09704e; border-left: 0;"></td>
                    <td  colspan="2"  style="text-align: center;color: green" class="my_titles_value"></td>

                </tr>
                </tfoot>
            </table>




    </div>



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
    $(".result1").text( GetSum('countable1'));
    $(".result2").text( GetSum('countable2'));
    $(".result3").text( GetSum('countable3'));
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
        values = (sum2 - sum1);

    } else if (sum1 > sum2){

        titles='الفائض';
        color='green';
        symbol='+';
        values = (sum1 - sum2);
    }

    $(".my_titles").html(titles+'['+ symbol +']');
    $(".my_titles_value").html(values);


    /*$(".result1").text(sum1);
    $("#total_erad").text(sum1);
    $(".result2").text(sum2);
    $("#total_masrofat").text(sum2);
    $(".result3").text(sum3);*/


</script>