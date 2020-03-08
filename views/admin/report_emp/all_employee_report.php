<div class="r-program">
    <div class="container">
        <div class="col-sm-12 col-xs-12">
            <div class="details-resorce">
                <?php if((isset($all_employee) && $all_employee != null)): ?>
                    <div class="col-xs-12 r-inner-details">
                        <div class="panel-body">
                            <div class="fade in active">
                                <a href="<?php echo base_url()?>All_reports/print_All_employee_report" > <button class="btn btn-success" style="float: left;margin-bottom: 10px">طباعة</button></a>
                                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم الموظف</th>
                                        <th class="text-center">الراتب الأساسي</th>
                                        <?php if(isset($all_emp_allowances) && $all_emp_allowances != null){ foreach( $all_emp_allowances as $record){?>
                                         <th class="text-center"><?php echo $record->defined_title;?></th>
                                        <?php }  } ?>
                                        <th class="text-center">إجمالى الدخل</th>
                                        <th class="text-center">سلف</th>

                                        <?php if(isset($all_emp_deduction) && $all_emp_deduction != null){ foreach( $all_emp_deduction as $record){?>
                                            <th class="text-center"><?php echo $record->defined_title;?></th>
                                        <?php }  } ?>

                                        <!--sa-->
                                        <?php if(isset($penalty_names) && $penalty_names != null){ foreach( $penalty_names as $record){?>
                                            <th class="text-center"><?php echo $record->title;?></th>
                                        <?php }  } ?>
                                        <!--sa-->
                                        <th class="text-center">المكافأت</th>
                                        <th class="text-center">صافي</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $ALL_salary= 0;
                                    $ALL_emp_rewards= 0;
                                    $ALL_safy= 0;
                                    $ALL_income= 0;

                                                $ALL_=array();
                                                foreach ($all_emp_allowances as $vv){
                                                    $ALL_[$vv->defined_id]= 0;
                                                }


                                    $ALL_emp_deduction=array();
                                    foreach ($all_emp_deduction as $cc){
                                        $ALL_emp_deduction[$cc->defined_id]= 0;
                                    }



                                                $ALL_penalty=array();
                                                foreach ($arr as $bb){
                                                    $ALL_penalty[$bb]= 0;
                                                }

                                    
                                    
                                    $a=1;
                                    foreach ($all_employee as $record ):
                           $arr_penalty =array();
                                        if (!empty($record->penalty)){

                                            if(isset($arr) && $arr != null){
                                                foreach ($arr as $k=>$v){
                                                    $arr_penalty[$v]=$record->penalty[$v];
                                                   } }
                                        }

                                        $allowances =unserialize($record->emp_allowances);
                                      $deduction =unserialize($record->emp_deduction);
                                     $salary=$record->salary;

                                        $ALL_salary +=$salary;
                                        $all_rewards=$record->all_rewards;?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><?echo $record->employee; ?></td>
                                            <td><?echo $record->salary; ?></td>
                                            <?php $val=0;  $ALL_bdl= 0; if(isset($all_emp_allowances) && $all_emp_allowances != null){ foreach( $all_emp_allowances as $record){?>
                                            <td><?php if( !empty($allowances[$record->defined_id]) && $allowances[$record->defined_id] !='' && $allowances[$record->defined_id] !=null){ echo $allowances[$record->defined_id];  $ALL_[$record->defined_id] += $allowances[$record->defined_id]; }else{ echo 0;} ?></td>
                                             <?php if( !empty($allowances[$record->defined_id]) && $allowances[$record->defined_id] !='' && $allowances[$record->defined_id] !=null){ $val +=$allowances[$record->defined_id]; }
                                              }  }
                                               $income =    $val +   $salary;        $ALL_income += $income;  ?>
                                            <td><?php echo$income; ?></td>
                                            <td>--</td>

                                            <?php $punishment=0; if(isset($all_emp_deduction) && $all_emp_deduction != null){ foreach( $all_emp_deduction as $record){?>
                                            <td><?php if( !empty($deduction[$record->defined_id]) && $deduction[$record->defined_id] !='' && $deduction[$record->defined_id] !=null){ echo $deduction[$record->defined_id];   $ALL_emp_deduction[$record->defined_id]+=$deduction[$record->defined_id]; }else{ echo 0;} ?></td>
                                            <?php  if( !empty($deduction[$record->defined_id]) && $deduction[$record->defined_id] !='' && $deduction[$record->defined_id] !=null){ $punishment +=$deduction[$record->defined_id];
                                            }              }  } ?>
                                            <!--sa-->
                                            <?php
                                            $penalty_values =0;
                                            if(isset($arr_penalty) && $arr_penalty != null){
                                                foreach ($arr_penalty as  $keys=>$value){
                                                    $penalty_values +=$value;   $ALL_penalty[$keys]  +=$value; ?>

                                                   <td><?php echo $value;?> </td>
                                           <?php     }
                                            } ?>
                                            <!--sa-->
                                            <td><?php echo$all_rewards;  $ALL_emp_rewards+=$all_rewards;?></td>
                                            <td><?php echo(($income+$all_rewards) -($penalty_values +$punishment));  $ALL_safy +=(($income+$all_rewards) -($penalty_values +$punishment));?></td>
                                        </tr>
                                   <?php  $a++;endforeach;?>

                                    <tr>
                                        <td colspan="2">الإجمالي</td>
                                        <td><?php echo $ALL_salary;?></td>
                                        <?php
                                        if(!empty($ALL_)){
                                            foreach ($ALL_ as $value){?>
                                                <td><?php echo $value;?></td>
                                         <?php   } } ?>
                                        <td><?php echo $ALL_income;?></td>
                                        <td>--</td>
                                        <?php
                                        if(!empty($ALL_emp_deduction)){
                                            foreach ($ALL_emp_deduction as $value2){?>
                                                <td><?php echo $value2;?></td>
                                            <?php   } } ?>

                                        <?php
                                        if(!empty($ALL_penalty)){
                                            foreach ($ALL_penalty as $value3){?>
                                                <td><?php echo $value3;?></td>
                                            <?php   } } ?>
                                        <td><?php echo $ALL_emp_rewards;?></td>
                                        <td><?php echo $ALL_safy;?></td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>




