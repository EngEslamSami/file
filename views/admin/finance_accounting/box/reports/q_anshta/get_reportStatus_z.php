<style>
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
</style>
<style>
    @page{
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
    }
</style>
<?php


  if($this->input->post('status') ==1) {
      if (isset($records) && !empty($records)) {
          ?>
<!--          <button onclick="printDiv('printMe')" class="btn btn-labeled btn-purple but" style="float: left">طباعة</button>-->
          <button type="button" style="margin-right: 90%;" onclick="printDiv('printMe')" class="btn btn-labeled btn-purple but">
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
<div id="table-scroll" class="table-scroll" >
    <div id="faux-table" class="faux-table" aria="hidden"></div>
    <div class="table-wrap" >
          <table id="main-table" class="table table-bordered " role="table" style="table-layout: fixed;">
              <thead>
              <tr class="info">
                  <th scope="col" width="10%">م</th>
                  <th  scope="col" class="text-left">رقم الحساب</th>
                  <th scope="col" class="text-left">إسم الحساب</th>
                  <th  scope="col" class="text-left">الإيرادات والتبرعات</th>
                  <th scope="col" class="text-left">المصروفات</th>


              </tr>
              </thead>
              <tbody>
              <?php

              if (isset($records) && $records != null) {
                  $x = 1;
                  $total_erad_value = 0;
                  $total_masrofat_value = 0;
                  foreach ($records as $value) {
                      $total_erad_value += $value->total_erad;
                      $total_masrofat_value += $value->total_masrofat;
                         $tttttt = $value->total_erad + $value->total_masrofat;
                      if($this->input->post('zero') == 'on'){
                        if($tttttt == 0){ 
                            continue;
                            } 
                        
                        }else{ 
                            
                        }  
                      ?>
                      <tr>
                          <td><?= $x++ ?></td>
                          <td><?= $value->code ?></td>
                          <td><?= $value->name ?></td>
                          <td><?= $value->total_erad ?></td>
                          <td><?= $value->total_masrofat ?></td>

                      </tr>
                      <?php
                  }
              }
              ?>
              </tbody>
          </table>




</div>
</div>
              <div class="text-center">
                  <table class="table table-bordereds  " style="width: 50%; margin: auto;">
                      <tbody>
                      <tr>
                          <td class="specific_style" style="width: 280px;"> إجمالي الإيرادات والتبرعات</td>
                          <td class="specific_style_2" style="width: 280px; color: green; font-size: 16px;
                      font-weight: bold;"
                          ><?php echo $total_erad_value; ?></td>

                      </tr>
                      <?php $titles = '';
                      $values = 0;

                      if ($total_masrofat_value > $total_erad_value) {
                          $titles = 'العجز';
                          $ccolr = 'red';
                          $symbol = '-';
                          //  $values = ($total_erad_value - $total_masrofat_value);
                          $values = ($total_masrofat_value - $total_erad_value);

                      }elseif($total_erad_value > $total_masrofat_value) {

                          $titles = 'الفائض';
                          $symbol = '+';
                          $ccolr = 'green';
                          // $values = ($total_masrofat_value-$total_erad_value );
                          $values = ($total_erad_value-$total_masrofat_value );

                      } ?>
                      <tr>
                          <td class="specific_style" style="width: 280px;">إجمالي المصروفات </td>
                          <td class="specific_style_2" style="width: 280px;font-size: 16px;
                      font-weight: bold;"><?php echo $total_masrofat_value; ?></td>
                      </tr>
                      <tr>
                          <td class="specific_style" style="width: 280px;"><?php echo $titles .'['. $symbol .']'; ?></td>
                          <td class="specific_style_2" style="width: 280px; font-weight: bold;
                                  color:<?php echo $ccolr; ?>; "
                          ><?php echo $values; ?></td>
                      </tr>


                      </tbody>
                  </table>
              </div>

</div>
              <div class="col-xs-12 visible-print" style="margin-bottom: 40px;">
                  <div class="col-xs-4 text-center">
                      <label>المحاسب</label></br>
                  </div>
                  <div class="col-xs-4 text-center">
                      <label>مدير الشئون الماليه</label></br>
                  </div>
                  <div class="col-xs-4 text-center" >
                      <label>مدير عام الجمعيه</label></br>
                  </div>


              </div>
          </div>

          <?php
      } else {

          ?>
          <div class="alert alert-danger ">لا يوجد نتيجة للبحث</div>
          <?php
      }
  }
?>







<script>



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




<script>
    function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    var fauxTable = document.getElementById("faux-table");
    var mainTable = document.getElementById("main-table");
    var clonedElement = mainTable.cloneNode(true);
    var clonedElement2 = mainTable.cloneNode(true);
    clonedElement.id = "";
    clonedElement2.id = "";
    fauxTable.appendChild(clonedElement);
    fauxTable.appendChild(clonedElement2);
</script>





