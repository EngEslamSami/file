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
                                        <th class="text-center">غياب</th>
                                        <?php if(isset($all_emp_deduction) && $all_emp_deduction != null){ foreach( $all_emp_deduction as $record){?>
                                            <th class="text-center"><?php echo $record->defined_title;?></th>
                                        <?php }  } ?>
                                        <th class="text-center">المكافأت</th>
                                        <th class="text-center">صافي</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $a=1;
                                    foreach ($all_employee as $record ):     $allowances =unserialize($record->emp_allowances);
                                      $deduction =unserialize($record->emp_deduction);
                                     $salary=$record->salary;
                                     $all_penalty=$record->all_penalty;
                                        $all_rewards=$record->all_rewards;?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><?echo $record->employee; ?></td>
                                            <td><?echo $record->salary; ?></td>
                                            <?php $val=0; if(isset($all_emp_allowances) && $all_emp_allowances != null){ foreach( $all_emp_allowances as $record){?>
                                            <td><?php if( !empty($allowances[$record->defined_id]) && $allowances[$record->defined_id] !='' && $allowances[$record->defined_id] !=null){ echo $allowances[$record->defined_id]; }else{ echo 0;} ?></td>
                                             <?php if( !empty($allowances[$record->defined_id]) && $allowances[$record->defined_id] !='' && $allowances[$record->defined_id] !=null){ $val +=$allowances[$record->defined_id];}
                                              }  }
                                               $income =    $val +   $salary;      ?>
                                            <td><?php echo$income;?></td>
                                            <td>--</td>
                                            <td><?php echo $all_penalty;?></td>
                                            <?php $punishment=0; if(isset($all_emp_deduction) && $all_emp_deduction != null){ foreach( $all_emp_deduction as $record){?>
                                            <td><?php if( !empty($deduction[$record->defined_id]) && $deduction[$record->defined_id] !='' && $deduction[$record->defined_id] !=null){ echo $deduction[$record->defined_id]; }else{ echo 0;} ?></td>
                                            <?php  if( !empty($deduction[$record->defined_id]) && $deduction[$record->defined_id] !='' && $deduction[$record->defined_id] !=null){ $punishment +=$deduction[$record->defined_id];
                                            }              }  } ?>
                                            <td><?php echo$all_rewards; ?></td>
                                            <td><?php echo(($income+$all_rewards) -($all_penalty+$punishment)); ?></td>
                                        </tr>
                                   <?php  $a++;endforeach;?>
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




