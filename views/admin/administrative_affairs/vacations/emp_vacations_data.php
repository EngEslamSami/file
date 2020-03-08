<?php
$year = date("Y");
$query2 =$this->db->query('SELECT vacations.*,prog_main_sitting.title FROM `vacations`  LEFT JOIN `prog_main_sitting` ON (`vacations`.`vacation_id`=`prog_main_sitting`.`id`) WHERE `vacations`.`deleted`=1 AND `vacations`.`emp_id`='.$_POST['valuesx'].' and `vacations`.`approved` = 1 and `vacations`.`year` = '.$year.'' );
$arr=array();
foreach ($query2->result() as  $row2) {
  $arr[] =$row2;
}
if (sizeof($arr)>0) {   
  ?>

    <thead>
      <tr>
        <th style="text-align: center">م</th>
        <th style="text-align: center">اليوم</th>
        <th style="text-align: center">نوع الأجازة</th>
        <th style="text-align: center">المدة</th>
      </tr>
    </thead>
    <tbody>
      <?    
      $counter=0;
      $diff = 0;
      foreach ($arr as  $row):
        $counter++;
        $day_from=$row->from_date;
        $day_to= $row->to_date;
        $date1 = new DateTime($day_from);
        $date2 = new DateTime($day_to);
        $query_emp = $this->db->query('SELECT * FROM `employees` WHERE  `emp_code`='.$row->emp_id);
        $past_days = 0;
        if ($query_emp->num_rows() > 0)
        {
         $row_emp = $query_emp->row_array(); 
         $past_days=  $row_emp['past_days'] ;
         $query_setting_affairs = $this->db->query('SELECT * FROM `administrative_affairs_settings` WHERE  `id` = '. $row_emp['group_affairs_id_fk']);
         $row_setting_affairs = $query_setting_affairs->row_array(); 
         $holiday_num =  $row_setting_affairs['holiday_num'];
        }
        if($year == $row->year ){
          $diff += $date2->diff($date1)->format("%a"); 
        }elseif($year > $row->year){
          $diff = 0 ;
        }elseif($year < $row->year){
          $diff = 0 ; 
        }
        $total_holiday_remain = $holiday_num + $past_days - ($diff);
        if($total_holiday_remain >= 0){
          $msg = ' الرصيد المتبقي هو  ' . $total_holiday_remain;
        }elseif($total_holiday_remain <= 0){
          $msg = 'رصيدك المتبقي هو '  . $total_holiday_remain;
        }
        echo'<tr>
        <tr>
        <td colspan="4">'.$msg.'</td>
        </tr>
        <td>'.$counter.'</td>
        <td>'.$day_from.'</td>
        <td>'.$row->title.'</td>
        <td>'.$diff.'</td>
        </tr>';
        endforeach;  
      } 
    $idea_emp_id=  $_POST['valuesx'];
    $depart=  $_POST['depart'];
    $query2 =$this->db->query('SELECT * FROM `employees` WHERE `administration`='.$depart.' And `id` !='.$idea_emp_id);
    $arr=array();
    foreach ($query2->result() as  $row2) {
      $arr[] =$row2;
    }
    ?>
    <div class="col-xs-6">
      <h4 class="r-h4 ">  الموظف القائم بالعمل </h4>
    </div>
    <div class="col-xs-6 r-input">
      <select name="emp_assigned_id" data-validation="required" id="emp_assigned_id" class="form-control"   >
        <option value="">إختر </option>
        <?php    foreach($arr as $record): ?>
          <option value="<? echo $record->id;?>"><? echo $record->employee;?></option>
        <? endforeach;?>
      </select>
    </div>
