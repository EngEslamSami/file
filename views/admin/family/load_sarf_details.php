<?php
if (isset($last_sarf)&& !empty($last_sarf)){
    ?>
    <h5 style="margin-right: 10px;"> </h5>
    <table class="table  table-bordered table-striped table-hover">
        <thead>
        <tr class="rmadytd">
            <th  style="width: 300px !important;">اخر صرف تم للأسرة علي الرواتب الشهرية </th>

            <th class="text-center">بتاريخ</th>
            <th class="text-center"> قيمة الصرف</th>
            <th class="text-center">خلال شهر </th>

        </tr>
        </thead>
        <tbody>
        <?php
          foreach ($last_sarf as $last){
              ?>
              <tr>
             
                  <td  class="text-center" style="color: white !important; background-color: #4e4e4e  !important;">
                      <?php
                      if (!empty($last->band_name->title)){
                          echo $last->band_name->title;
                      } else{
                          echo 'غير محدد' ;
                      }
                      ?>
                  </td>
                  <td  class="text-center" style="color: red !important; background-color: #dde0a6 !important;"><?php if (!empty($last->sarf->sarf_date_ar)){
                          echo $last->sarf->sarf_date_ar;
                      } else{
                          echo 'غير محدد' ;
                      }?></td>
                  <td  class="text-center" style="color: red !important; background-color: #dde0a6 !important;"><?php
                      if (!empty($last->value)){
                          echo $last->value;
                      } else{
                          echo 'غير محدد' ;
                      }?>

                  </td>
                  <td  class="text-center" style="color: red !important; background-color: #dde0a6 !important;">
                      <?php
                      $months= array('1'=>'يناير','2'=>'فبراير','3'=>'مارس','4'=>'ابريل','5'=>'مايو','6'=>'يونيو','7'=>'يوليو','8'=>'أغسطس','9'=>'سبتمبر','10'=>'أكتوبر','11'=>'نوفمبر','12'=>'ديسمبر');
                      $unix = strtotime($last->sarf->sarf_date_ar);
                      $mon= date('n',$unix);
                      $month_n = $months[$mon];
                      echo $month_n;

                      ?>
                  </td>
              </tr>
              <?php
          }
        ?>


        </tbody>
    </table>
<?php
}
?>
<?php
if (isset($all_sarf) && !empty($all_sarf)){
    ?>
    <h5 style="margin-right: 10px;">بيانات صرف الأسرة : </h5>
    <table id="example" class="  display table table-bordered table-striped table-hover">
        <thead>
        <tr class="redblacktd">
            <th class="text-center">م</th>
            <th class="text-center">رقم الصرف</th>
            <th class="text-center"> بند الصرف</th>
            <th class="text-center">بتاريخ</th>
            <th class="text-center"> قيمة الصرف</th>
            <th class="text-center"> خلال شهر </th>

        </tr>

        </thead>
        <tbody>
        <?php
        $x=1 ;
        $total = 0;
        foreach($all_sarf as $row ){
            $total += $row->value;
            ?>
            <tr>
                <td><?=$x++;?></td>
                <td><?= $row->sarf_num_fk?></td>
                <td><?php
                    if (!empty($row->band_name->title)){
                        echo $row->band_name->title;
                    } else{
                        echo 'غير محدد' ;
                    }
                    ?></td>
                <td><?php if (!empty($row->sarf->sarf_date_ar)){
                        echo $row->sarf->sarf_date_ar;
                    } else{
                        echo 'غير محدد' ;
                    }?></td>
                <td><?php
                    if (!empty($row->value)){
                        echo $row->value;
                    } else{
                        echo 'غير محدد' ;
                    }?>

                </td>
                <td>
                    <?php
                    $months= array('1'=>'يناير','2'=>'فبراير','3'=>'مارس','4'=>'ابريل','5'=>'مايو','6'=>'يونيو','7'=>'يوليو','8'=>'أغسطس','9'=>'سبتمبر','10'=>'أكتوبر','11'=>'نوفمبر','12'=>'ديسمبر');
                    $unix = strtotime($row->sarf->sarf_date_ar);
                    $mon= date('n',$unix);
                    $month_n = $months[$mon];
                    echo $month_n;

                    ?>
                </td>

            </tr>
        <?php } ?>

        </tbody>
        <tfoot>
        <th colspan="4" style="text-align: center">الاجمالي</th>
        <th colspan="2"><?= $total?></th>
        </tfoot>



    </table>


    <?php
} else{
    ?>
    <div class="alert alert-danger">عفوا... لا يوجد بيانات !</div>
    <?php
}
?>

<script>

    $('#example').DataTable( {
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

