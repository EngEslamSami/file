<?php
/*
echo '<pre>';
print_r($all_curenr_mon_penalites);
echo '<pre>';*/

?>


<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo $title; ?></h4>
                </div>
            </div>

            <div class="panel-body">
                <div class="col-xs-12 r-inner-details">
                    <table id="example_" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">م</th>
                                <th class="text-center">اسم الموظف </th>
                                 <th class="text-center"> عدد الجزاءات خلال الشهر المضافة </th>
                                <th class="text-center"> إجمالي قيم الجزاءات خلال الشهر </th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php 
                            if(isset($all_curenr_mon_penalites) and $all_curenr_mon_penalites != null){
                            
                             $a=1; foreach ($all_curenr_mon_penalites as $record ){
                                                      ?>
                            <tr>
                                <td><?php echo $a ?></td>
                                <td><?php echo $record->employee;?></td>
                                 <td><?php echo $record->num_of_penalites;?></td>
                                <td><?php echo $record->penality_current_month; ?></td>
                            </tr>
                            <?php  $a++;  } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>