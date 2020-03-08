
<?php if(isset($all_sader) &&!empty($all_sader) || isset($all_wared)&& !empty($all_wared)){

    ?>



    <table id="" class=" example table  table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
            <th>تاريخ التحويل</th>
            <th>الموضوع</th>
            <th>رقم المعاملة</th>
            <th>واجب الرد</th>
            <th>المتابعة</th>
            <th>بواسطة</th>
            <th>محول إلى</th>


        </tr>
        </thead>
        <tbody>
        <?php
          if (!empty($all_sader)){
              $x=1;
              foreach ($all_sader as $sader){
                  $x++;
                  ?>
                  <tr>
                      <td><?php
                          if (!empty($sader->date_ar)){
                              echo $sader->date_ar;
                          }else{
                              echo 'غير محدد';
                          }
                          ?></td>

                      <td><?php
                           if (!empty($sader->subject)){
                               echo $sader->subject;
                           }else{
                               echo 'غير محدد';
                           }
                          ?></td>
                      <td>
                          <?php
                          if (!empty($sader->data->sader_rkm)){
                              echo $sader->data->sader_rkm;
                          }else{
                              echo 'غير محدد';
                          }
                          ?>

                      </td>

                      <td>

                          <?php
                          if (!empty($sader->esthkak_date)  ){
                              ?>
                              <span class="label label-danger text-center"> واجب الرد قبل تاريخ  <?= date('d-m-Y',strtotime($sader->esthkak_date))  ?>



                              </span>
                              <?php
                          } else{
                              echo 'غير محدد';

                              ?>
                              <?php
                          }
                          ?>
                      </td>
                      <td>
                          <?php
                          if (!empty($sader->data->need_follow)&&$sader->data->need_follow==1){
                              ?>
                              <i class="fa fa-check green"></i>
                              <?php
                          } elseif (!empty($sader->data->need_follow)&&$sader->data->need_follow==2){
                              ?>
                              <i class="fa fa-times red"></i>
                              <?php
                          }else{
                              echo 'غير محدد';
                          }
                          ?>
                      </td>
                      <td>

                          <?= $sader->publisher_name?>
                      </td>
                      <td>
                          <?php
                          if (!empty($sader->to_user_n)){
                              echo $sader->to_user_n;
                          }else{
                              echo 'غير محدد';
                          }
                          ?>
                      </td>

                  </tr>
                  <?php
              }
          }
        ?>
        <?php
        if (!empty($all_wared)){
            $z=1;
            foreach ($all_wared as $wared){
                $z++;
                ?>
                <tr>
                    <td><?php
                        if (!empty($wared->date_ar)){
                            echo $wared->date_ar;
                        }else{
                            echo 'غير محدد';
                        }
                        ?></td>

                    <td><?php
                        if (!empty($wared->data->title)){
                            echo $wared->data->title;
                        }else{
                            echo 'غير محدد';
                        }
                        ?></td>
                    <td>

                        <?php
                        if (!empty($wared->data->rkm)){
                            echo $wared->data->rkm;
                        }else{
                            echo 'غير محدد';
                        }
                        ?>

                    </td>
                    <td>
                    <?php
                    if (!empty($wared->esthkak_date)  ){
                        ?>
                        <span class="label label-danger text-center"> واجب الرد قبل تاريخ  <?= date('d-m-Y',strtotime($wared->esthkak_date))  ?>

                            <?php
                    } else{
                        echo 'غير محدد';

                        ?>
                        <?php
                    }
                    ?>
                    </td>
                    <td>
                        <?php
                        if ($wared->data->need_follow==1){
                            ?>
                            <i class="fa fa-check green"></i>
                            <?php
                        } elseif ($wared->data->need_follow==2){
                            ?>
                            <i class="fa fa-times red"></i>
                            <?php
                        }else{
                            echo 'غير محدد';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if (!empty($wared->from_user_name)){
                            echo $wared->from_user_name;
                        }else{
                            echo 'غير محدد';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if (!empty($wared->to_user_name)){
                            echo $wared->to_user_name;
                        }else{
                            echo 'غير محدد';
                        }
                        ?>
                    </td>
                    <td></td>
                </tr>
                <?php
            }
        }
        ?>

        </tbody>
    </table>


<?php } else{
    ?>
    <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>

    <?php
}
?>


<script>

    $('.example').DataTable( {
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
