<?php
/*
  echo '<pre>';    
    print_r($all_emp_salaries);
    echo '<pre>'; */
   
   

   
   
    ?>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   <div class="r-program">
<div class="container">
<div class="col-sm-12 col-xs-12">
<div class="details-resorce">
<?php if((isset($all_emp_salaries) && $all_emp_salaries != null)){ ?>
<div class="col-xs-12 r-inner-details">
<div class="panel-body">
<div class="fade in active">
<a href="<?php echo base_url()?>All_reports/print_All_employee_report_3" > <button class="btn btn-success" style="float: left;margin-bottom: 10px">طباعة</button></a>
 
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

    <!--sa-->
   
    <th class="text-center">صافي</th>
</tr>
</thead>
<tbody class="text-center">

</tbody>

<?php 
//if(isset($all_emp_salaries) && !empty($all_emp_salaries) &&  $all_emp_salaries!=null){
    
    
    
  $T_salary = 0;
  $T_salary = 0 ;
$T_b_sakn = 0 ;
$T_b_mosalat = 0 ;
$T_b_amal = 0 ;
$T_b_maesha = 0 ;
$T_all_dakl = 0;
$T_absent = 0;
$T_safi = 0;
$T_k_tamen =0;
  
  $x=0;
 foreach($all_emp_salaries as $record){ 
    $x++;
  //  $dataArr = is_array($record->discount_typesss) ? $record->discount_typesss : array($record->discount_typesss);
     
       /*echo '<pre>'; 
     print_r($record->discount_typesss);
       echo '<pre>'; 
       */
 /*
 if(isset($record->discount_typesss) && !empty($record->discount_typesss) &&  $record->discount_typesss!=null){
    foreach($record->discount_typesss as $row){
 // echo $row[0]->year;
  echo $row->year;
   // echo $row[0]->id.'<br/>';
    }
    }
    */
    
    /*echo '<pre>'; 
     print_r($record->discount_typesss);
       echo '<pre>'; 
    */
//echo $record->discount_typesss;    
   if($record->discount_typesss == 1){
    
            $salary = $record->salary ;
    //    $kasm_and_penality = $record->discount[1] + $record->employees_total_penalty ;
        $absent = $record->sum_first_discount;
        $b_sakn    = $record->b_sakn;
        $b_mosalat =  $record->b_mosalat;
        $b_amal    = $record->b_amal;
        $b_maesha = $record->b_maesha;
       
         $k_tamen  = $record->k_tamen;
         //$mokafaa = $record->employees_total_rewards;
         
   }elseif($record->discount_typesss == 2){
    
        $salary = $record->salary ;
     //  $kasm_and_penality = $record->discount[2] + $record->employees_total_penalty ;
        $absent = 0 ;
        $b_sakn    = 0;
        $b_mosalat =  0;
        $b_amal    = 0;
        $b_maesha = $record->b_maesha;
         $k_tamen  = $record->k_tamen;
         //$mokafaa = $record->employees_total_rewards;
        
        
   }elseif($record->discount_typesss == 3){
           $salary = 0;
     //  $kasm_and_penality = $record->discount[3] + $record->employees_total_penalty ;
        $absent = 0 ;
        $b_sakn    = 0;
        $b_mosalat =  0;
        $b_amal    = 0;
        $b_maesha = 0;
         $k_tamen  = $record->k_tamen;
       //  $mokafaa = $record->employees_total_rewards;
   }else{
       $salary = $record->salary ;
      // $kasm_and_penality = $record->employees_total_penalty ;
        $absent = 0 ;
        $b_sakn    = $record->b_sakn;
        $b_mosalat =  $record->b_mosalat;
        $b_amal    = $record->b_amal;
        $b_maesha = $record->b_maesha;
        $k_tamen  = $record->k_tamen;
     //   $mokafaa = $record->employees_total_rewards;
        
    
   }
    
  
     $all_dakl = $salary + $b_sakn + $b_mosalat + $b_amal + $b_maesha  ;
 $safi = $all_dakl  - $k_tamen - $absent;
 
 
    
    
    
    ?>
<tr>
<td><?php echo $x; ?></td>
<td><?  echo $record->employee; ?></td>
<td><? echo $salary  ?></td>

<td><?  echo $b_sakn; ?></td>         
<td><? echo $b_mosalat; ?></td> 
<td><? echo $b_amal; ?></td>
<td><? echo $b_maesha; ?></td>
<td><?php echo $all_dakl; ?></td>
<td>0</td>

<td><?php echo $absent; ?></td>

<td><?php echo $k_tamen; ?></td>
<td><?php echo $safi; ?></td>
</tr>

<?php  

$T_salary += $salary ;
$T_b_sakn += $b_sakn ;
$T_b_mosalat += $b_mosalat ;
$T_b_amal += $b_amal ;
$T_b_maesha += $b_maesha ;
$T_all_dakl += $all_dakl;
$T_absent += $absent;
$T_safi += $safi;
$T_k_tamen += $k_tamen;



}
?>

<tr>
<td colspan="2">الإجمالي</td>
<td><?php echo $T_salary; ?></td>
<td><?php echo $T_b_sakn; ?></td>
<td><?php echo $T_b_mosalat; ?></td>
<td><?php echo $T_b_amal; ?></td>
<td><?php echo $T_b_maesha; ?></td>
<td><?php echo $T_all_dakl; ?></td>
<td>0</td>
<td><?php echo $T_absent; ?></td>
<td><?php echo $T_k_tamen; ?></td>
<td><?php echo $T_safi; ?></td>

</tr>






                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            <?php } ?>

            </div>
        </div>
    </div>
</div>

    