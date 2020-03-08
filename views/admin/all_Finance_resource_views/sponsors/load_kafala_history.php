<?php
if (isset($get_all) && !empty($get_all)){
    $x=1;
    ?>
    <table  class="table  table-bordered table-striped table-hover">
        <thead>
        <tr class="greentd">
            <th>م</th>
            <th>رقم الملف</th>
            <th> إسم المستفيد </th>
            <th> حالة المستفيد </th>
            <th>نوع  الكفالة </th>
            <th>حالة  الكفالة </th>
            <th>بداية  الكفالة </th>
            <th>نهاية  الكفالة </th>
            <th>مدة  الكفالة </th>
            <th>قيمة  الكفالة </th>
            <th>طريقة التوريد</th>
            <th>المدة المتبقية</th>
              <th>الإجراء</th>

        </tr>
        </thead>
        <tbody>
        <?php
          foreach ($get_all as $row){
              if($row->first_status == 1){
                  $kafala_color_row  = '';
              }elseif( $row->first_status == 2){
                  $kafala_color_row  = '#fd4d4d';
              }else{
                  $kafala_color_row  = ' ';
              }
              ?>
              <tr>
                  <td><?= $x++?></td>
                  <td><?= $row->file_num?></td>
                  <td>
                      <?php if (!empty($row->person_name)){
                       echo $row->person_name;
                      } else{ echo 'غير محدد';} ?>
                  </td>
                  <td>
                      <?php echo $row->person_data['halt_elmostafid_title'];  ?>
                  </td>
                  <td  style="background-color: <?php echo $row->kafala_color;   ?>;">
                      <?php if($row->kafala_type_fk==2){?>
                         <?php echo $row->kafala_name;?>
                      <?php }else { echo  $row->kafala_name; } ?>  </td>

                  <td style="background-color:<?php echo $kafala_color_row; ?>;">

                    <?php echo $row->halet_kafel_title;?>
                      <?php
                      if($row->first_status == 1){
                          echo $first_status_name = ' منتظم ';
                      }elseif( $row->first_status == 2){
                          echo  $first_status_name = ' موقوف';
                      }else{
                          echo   $first_status_name = 'غير محدد';
                      }

                      ?></td>
                  <td style="background-color:<?php echo $kafala_color_row; ?>;"><?php
                      $arr = explode('/', $row->first_date_from_ar);
                      echo $newDate = $arr[2].'-'.$arr[0].'-'.$arr[1];


                      ?></td>
                  <td style="background-color:<?php echo $kafala_color_row; ?>;"><?php
                      $arr = explode('/', $row->first_date_to_ar);
                      echo $newDate = $arr[2].'-'.$arr[0].'-'.$arr[1];

                      ?>

                  </td>
                  <td style="background-color:<?php echo $kafala_color_row; ?>;"><?php
                      if(isset($row->kafala_period) and $row->kafala_period != null){
                          echo $row->kafala_period .'شهر ';
                      }
                      ?></td>
                  <td style="background-color:<?php echo $kafala_color_row; ?>;"><?php echo $row->first_value;?></td>
                  <td style="background-color:<?php echo $kafala_color_row; ?>;"><?php
                      $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
                      if(!empty($pay_method_arr[$row->pay_method])){
                          echo $pay_method_arr[$row->pay_method]; }?>
                  </td>
                  <td style="background-color:<?php echo $kafala_color_row; ?>;">
                      <?php
                      $startDate = strtotime("now");
                      $endDate = $row->first_date_to;
                      $seconds_left = ($endDate - $startDate);
                      $days_left = floor($seconds_left / 3600 / 24);
                      //echo $days_left;
                      if($days_left >= 0){
                          $class_days_left = 'success';
                      }elseif($days_left < 0){
                          $class_days_left = 'danger';
                          $days_left =0;
                      }

                      ?>


                      <?php
                      if($row->first_status == 1){ ?>
                          <button style="padding: 0px 10px !important;" type="button" class="btn btn-sm btn-<?php echo $class_days_left; ?> btn-rounded">
                              <i style="color: white;" class="fa fa-cog fa-spin"></i>
                              <?php echo $days_left;
                              ?> &nbsp;  أيام   </button>
                      <?php }elseif( $row->first_status == 2){
                          echo 'الكفالة موقوفة';
                          ?>
                      <?php }else{

                      }
                      ?>





                  </td>
                   <td><?= $row->event_title ?></td>

              </tr>
              <?php
          }
        ?>
        </tbody>
    </table>
<?php

} else{
    ?>
    <div class="alert-danger alert">عفوا... لايوجد بيانات !</div>
<?php
}