<div class="r-program">
  <div class="container">
    <div class="col-sm-11 col-xs-12">
      <?php
      if($status == 0)
        $data['R_current_donors'] = 'active'; 
      else
        $data['R_ended_donors'] = 'active'; 
      //$this->load->view('admin/finance_resource/main_tabs',$data); 
      ?>
      <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
          <div class="panel-body">
            <div class="fade in active">
            <?php
            if(isset($donors) && $donors != null){
            ?>
              <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">م</th>
                    <th class="text-center">إسم الكفيل</th>
                    <th class="text-center">رقم الجوال</th>
                    <th class="text-center">عدد البرامج المشارك بها</th>
                    <th class="text-center">مدة الكفالة</th>
                    <th class="text-center">إجمالي عدد الدفعات</th>
                    <th class="text-center">إجمالي عدد الدفعات المسددة</th>
                    <th class="text-center">إجمالي عدد الدفعات المتبقية</th>
                    <th class="text-center">تاريخ آخر مدفوع</th>
                  </tr>  
                </thead>
                <?php
                $i = 1 ;
                foreach ($donors as $donor) {
                  $diff = abs($donor->guaranty_end - $donor->guaranty_start);
                  $years = floor($diff / (365*60*60*24));
                  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                  $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                  $period = '';
                  if($years > 0)
                    $period = $years.'سنة';
                  if($months > 0)
                    $period .= '/'.$months.'شهر';
                  if($days > 0)
                    $period = '/'.$days.'يوم';
                  if($donor->pay == 0)
                    $date = '-';
                  else
                    $date = date('Y/m/d',$donor->DAT);
                  echo '<tr>
                          <td>'.($i++).'</td>
                          <td>'.$donor->user_name.'</td>
                          <td>'.$donor->guaranty_mob.'</td>
                          <td>'.$donor->TOT.'</td>
                          <td>'.$period.'</td>
                          <td>'.$donor->num_payments.'</td>
                          <td>'.$donor->pay.'</td>
                          <td>'.($donor->num_payments-$donor->pay).'</td>
                          <td>'.$date.'</td>
                        </tr>';
                }
                ?>
              </table>
              <?php
              }
              else
                echo '<div class="alert alert-danger">عفوا لا يوجد كفلاء</div>';
              ?>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>