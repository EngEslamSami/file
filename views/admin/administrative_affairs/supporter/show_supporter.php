<?php
/*
echo '<pre>';
print_r($employees);
echo '<pre>';
*/
?>
 
 
 <?php
/*
  echo '<pre>';    
    print_r($employees);
    echo '<pre>'; 
   
   
*/
   
   
    ?>
   
   
<div class="r-program">
<div class="container">
<div class="col-sm-12 col-xs-12">
<div class="details-resorce">
<?php if((isset($employees) && $employees != null)){ ?>
<div class="col-xs-12 r-inner-details">
  <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>


<div class="panel-body">
<div class="fade in active">
 
<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
<tr>
    <th class="text-center">م</th>
    <th class="text-center">إسم الموظف</th>
         <th class="text-center">المسمي الوظيفي</th>
    <th class="text-center">الراتب الأساسي</th>
    <th class="text-center">عدد أيام العمل </th>
   <th class="text-center">الأجر اليومي</th>






    <th class="text-center">إجمالى الراتب</th>
    
      <th class="text-center">دقائق تأخير</th>  
      <th class="text-center">قيمة التأخير</th>  
          <th class="text-center">أيام الغياب</th>
          <th class="text-center">الغياب</th>
      
      
    
    <th class="text-center">سلف</th>
  
    
     <!--  <th class="text-center">تأمينات</th>
-->
    <!--sa-->
   
    <th class="text-center">صافي الراتب</th>
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
$T_b_other =0;
$T_all_dakl = 0;
$T_absent = 0;
$T_safi = 0;
$T_k_tamen =0;
$T_num_of_lateness_hour =0;
$T_lates_value=0;
$T_absent_value=0;
$T_num_of_absent_day = 0;
  
  $x=0;
 foreach($employees as $record){ 
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

/*
$lates_value = $record->lates_value;
$absent_value = $record->absent_value;
*/
  
   if($record->discount_typesss == 1){
    
            $salary = $record->salary ;
    //    $kasm_and_penality = $record->discount[1] + $record->employees_total_penalty ;
        $absent = 0;
        $b_sakn    = $record->b_sakn;
        $b_mosalat =  $record->b_mosalat;
        $b_amal    = $record->b_amal;
        $b_maesha = $record->b_maesha;
        $b_other = $record->b_other;
        $lates_value = $record->lates_value;
$absent_value = $record->absent_value;
        
       
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
             $b_other = $record->b_other;
         //$mokafaa = $record->employees_total_rewards;
        $lates_value = $record->lates_value;
$absent_value = $record->absent_value;
        
   }elseif($record->discount_typesss == 3){
           $salary = 0;
     //  $kasm_and_penality = $record->discount[3] + $record->employees_total_penalty ;
        $absent = 0 ;
        $b_sakn    = 0;
        $b_mosalat =  0;
        $b_amal    = 0;
        $b_maesha = 0;
         $k_tamen  = $record->k_tamen;
             $b_other = $record->b_other;
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
            $b_other = $record->b_other;
     //   $mokafaa = $record->employees_total_rewards;
        $lates_value = $record->lates_value;
$absent_value = $record->absent_value;
    
   }
    
  
     $all_dakl = $salary  ;
 $safi = $all_dakl   - $lates_value -  $absent_value;
 
 
 $num_of_lateness_hour_in_minutes  = $record->num_of_lateness_hour * 60 ; 
 

 
  
    
    
    ?>
<tr>
<td><?php echo $x; ?></td>
<td><?  echo $record->employee; ?></td>
<td><?php echo $record->job_name; ?></td>
<td><? echo $salary  ?></td>



<td>30</td>
<td><?php echo round($record->salary / 30) ; ?></td>   
<td><?php echo $all_dakl; ?></td>

<td><?php  echo  $num_of_lateness_hour_in_minutes ?></td>

<td><?php  echo  $record->lates_value ?></td>

<td><?php  echo  $record->num_of_absent_day ?></td>
<td><?php  echo  $record->absent_value ?></td>



<td><?php echo $absent; ?></td>

<td><?php echo $safi; ?></td>
</tr>

<?php  

$T_salary += $salary ;
$T_b_sakn += $b_sakn ;
$T_b_mosalat += $b_mosalat ;
$T_b_amal += $b_amal ;
$T_b_maesha += $b_maesha ;
$T_b_other += $b_other;
$T_all_dakl += $all_dakl;
$T_absent += $absent;
$T_safi += $safi;
$T_k_tamen += $k_tamen;

$T_num_of_lateness_hour += $num_of_lateness_hour_in_minutes;
$T_lates_value += $record->lates_value;
$T_absent_value += $record->absent_value;
$T_num_of_absent_day += $record->num_of_absent_day;


}
?>

<tr>
<td colspan="3">الإجمالي</td>
<td><?php echo $T_salary; ?></td>

<td><?php echo '-' ?></td>
<td><?php echo '-' ?></td>
<td><?php echo $T_salary; ?></td>
<td><?php echo $T_num_of_lateness_hour; ?></td>

<td><?php echo $T_lates_value; ?></td>
<td><?php echo $T_num_of_absent_day; ?></td>


<td><?php echo $T_absent_value; ?></td>
<td><?php echo '0'; ?></td>
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

    
 
 
 
<!--
<div class="col-xs-12  " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">

            <?php if(isset($employees)&&$employees!=null){?>
                <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center">إسم الموظف</th>
                                
                                    <th class="text-center">المسمي الوظيفي</th>
                                         <th class="text-center">الراتب الأساسي</th>
                                    <th class="text-center">عدد أيام العمل </th>
                                    
                                    <th class="text-center">الأجر اليومي</th>
                                    <th class="text-center">إجمالي الراتب </th>
                                    
                                    
                                     <th class="text-center">دقائق التأخر </th>
                                     <th class="text-center">قيمة التأخر </th>
                                     <th class="text-center">أيام الغياب  </th>
                                       <th class="text-center">غياب  </th>
                                       <th class="text-center">سلف  </th>
                                         <th class="text-center">أخري  </th>
                                             <th class="text-center">صافي الراتب  </th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $x=1;
                                    foreach ($employees as $record ):?>
                                        <tr>
<td><?php echo $x++ ?></td>
<td><?php echo $record->employee; ?></td>
<td><?php echo $record->job_name; ?></td>
<td><?php echo $record->salary; ?></td>
<td>30</td>
<td><?php echo round($record->salary / 30) ; ?></td>     
<td><?php echo $record->salary; ?></td> 


<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>



<td>0</td>
    </tr>
    <?php
  
endforeach;  ?>
<?php }else{
        echo '
	<div class="alert alert-danger" role="alert">
 لا يوجد داتا 
</div>';
	
    
} ?>
</tbody>
</table>    
   
</div>
</div>
</div>      
</div>
</div>
</div>

-->