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

<?php
  if($this->input->post('status') ==1) {
      if (isset($records) && !empty($records)) {
          ?>
          <table id="" class="table table-bordered examplessss" role="table" style="table-layout: fixed;">
              <thead>
              <tr class="info">
                  <th style="width: 3%;">م</th>
                  <th  style="width: 100px" class="text-left">التاريخ</th>
                   <th style="width: 120px"  class="text-left">نوع القيد</th>
                  <th style="width: 88px" class="text-left">رقم القيد</th>


                  <th  style="width: 500px"   class="text-left">البيان</th>
                   <th class="text-left">الرصيد السابق</th>
                  <th class="text-left">المدين</th>
                  <th class="text-left">الدائن</th>
                  <th class="text-left">الرصيد</th>

              </tr>
              </thead>
              <tbody>


              <?php

              $no3_qued_arr =array(1=>'قيد إفتتاحي',2=>'قيد يومية',3=>'قيد ألي'
              ,4=>'قيد تسوية',5=>'قيد سند قبض',6=>'قيد سند صرف');
              $a=1;
              for ($s=0;$s<sizeof($records);$s++) {
                  if ($s == 0) {
                      if($type == 2){
                      $Rased_sabeq =  $totla_sabeq[1] -  $totla_sabeq[0];

                          $value =($Rased_sabeq + $records[0]->dayen - $records[0]->maden);

                      }elseif ($type == 1){
                           $Rased_sabeq =  $totla_sabeq[0] -  $totla_sabeq[1];
                          $value =($Rased_sabeq + $records[0]->maden - $records[0]->dayen);
                      }

                  }elseif($s >0) {

                      if($type ==2){
                          $value = $value + ($records[$s]->dayen - $records[$s]->maden);
                      }elseif ($type ==1){
                          $value = $value + ($records[$s]->maden - $records[$s]->dayen);
                      }
                  }  ?>
                  <tr>
                      <td><?php echo $a ?></td>
                       <td><? echo date('Y-m-d', $records[$s]->date); ?></td>
                           <td><?php echo $records[$s]->no3_qued_name;?></td>
                      <td><?php echo $records[$s]->qued_rkm_fk;?></td>


                      <td><?php echo $records[$s]->byan;?></td>
                      <td><?php if($a == 1){ echo $Rased_sabeq;}else{ echo 0;} ?></td>
                      <td><? echo $records[$s]->maden; ?></td>
                      <td><? echo $records[$s]->dayen; ?></td>
                      <td><?php echo $value;?></td>
                  </tr>
                  <?php
                  $a++;
              }  ?>
              
          
              
              </tbody>
          </table>

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
            colReorder: true,
             retrieve: true
        } );




</script>










