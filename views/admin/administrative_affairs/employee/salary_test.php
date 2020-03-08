<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>ماليات الموظفين</h4>
                </div>
            </div>

            <div class="panel-body">
                <div class="col-xs-12 r-inner-details">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">م</th>
                                <th class="text-center">اسم الموظف </th>
                                <th class="text-center"> الدرجة </th>
                                <th class="text-center">الراتب الأساسي</th>
                                <th class="text-center"> بدل نقل  </th>
                                <th class="text-center">بدل منصب اشرافي </th>
                                <th class="text-center">بدل طبيعة عمل   </th>
                                <th class="text-center">بدل اتصالات  </th>
                                <th class="text-center">خصم تأمينات  </th>
                                <th class="text-center">إجمالي الراتب  </th>
                                <th class="text-center">مكافأة  </th>
                                <th class="text-center">خصم  </th>
                                <th class="text-center">صافي الراتب  </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php  $a=1; foreach ($salaries as $record ):
                            $total_salary =$record->salary+ $record->b_naql +$record->b_eshraf;
                            $total_salary +=$record->b_amal+ $record->b_etislat +$record->b_etislat ;
                            $total_salary=$total_salary   -$record->k_tamen;
                            $finaml_salary = $total_salary +   $record->employees_total_rewards     - $record->employees_total_penalty;
                            ?>
                            <tr>
                                <td><?php echo $a ?></td>
                                <td><?php echo $record->employee;?></td>
                                <td><?php echo $record->degree_id;?></td>
                                <td><?php echo $record->salary;?></td>
                                <td><?php echo $record->b_naql;?></td>
                                <td><?php echo $record->b_eshraf;?></td>
                                <td><?php echo $record->b_amal;?></td>
                                <td><?php echo $record->b_etislat;?></td>
                                <td><?php echo $record->k_tamen; ?></td>
                                <td><?php echo $total_salary; ?></td>
                                <td><?php echo $record->employees_total_rewards; ?></td>
                                <td><?php echo $record->employees_total_penalty; ?></td>
                                <td><?php echo $finaml_salary; ?></td>
                            </tr>
                            <?php  $a++;   endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>