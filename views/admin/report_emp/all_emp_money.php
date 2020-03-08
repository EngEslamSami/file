<div class="col-sm-12 col-md-12 col-xs-12">
  <div class="col-md-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
      <div class="panel-heading">
        <div class="panel-title">
          <h4><?=$title?></h4>
        </div>
      </div>
      <div class="panel-body">
        <div class="details-resorce">
          <?php if((isset($records) && $records != null)){  ?>
          <div class="col-xs-12 r-inner-details">
            <div class="panel-body">
              <div class="fade in active">
                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="text-center">م</th>
                      <th class="text-center">إسم الموظف</th>
                      <th class="text-center">الراتب الأساسي</th>
                      <th class="text-center">بدل سكن</th>
                      <th class="text-center">بدل مواصلات</th>
                      <th class="text-center">بدل طبيعه عمل</th>
                      <th class="text-center">بدل غلاء معيشة</th>
                      <th class="text-center">إجمالى الدخل</th>
                      <th class="text-center">سلف</th>
                      <th class="text-center">الغياب</th>
                      <th class="text-center">تأمينات</th>
                      <th class="text-center">صافي</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php 
                    $x = 1;
                    foreach ($records as $value) { 
                      $salary = $value->salary;
                      $b_sakn = $value->b_sakn;
                      $b_mosalat = $value->b_mosalat;
                      $b_amal = $value->b_amal;
                      $b_maesha = $value->b_maesha;
                      $b_absence = 0;
                      if($value->discount_salary_operations != null) {
                        if($value->discount_salary_operations['maxDiscount'] == 3) {
                          $salary = 0;
                          $b_sakn = 0;
                          $b_mosalat = 0;
                          $b_amal = 0;
                          $b_maesha = 0;
                        } 
                        if($value->discount_salary_operations['maxDiscount'] == 2) {
                          $b_sakn = 0;
                          $b_mosalat = 0;
                          $b_amal = 0;
                          $b_maesha = 0;
                        } 
                        $b_absence = $value->discount_salary_operations['absence'];
                      }
                      $sum = $salary + $b_sakn + $b_mosalat + $b_amal + $b_maesha;
                      $total = $sum - $b_absence - $value->k_tamen;
                    ?>
                      <tr>
                        <td><?=($x++)?></td>
                        <td><?=$value->employee?></td>
                        <td><?=$salary?></td>
                        <td><?=$b_sakn?></td>
                        <td><?=$b_mosalat?></td>
                        <td><?=$b_amal?></td>
                        <td><?=$b_maesha?></td>
                        <td><?=$sum?></td>
                        <td>0</td>
                        <td><?=$b_absence?></td>
                        <td><?=$value->k_tamen?></td>
                        <td><?=$total?></td>
                      </tr>
                    <? } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <?php
          }
          else {
            echo '<div class="alert alert-danger">لا توجد بيانات</div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>