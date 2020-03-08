<div class="col-xs-12 fadeInUp wow" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php // echo $title?> </h3>
        </div>
        <div class="panel-body">
            <?php
            if($status == 0)
                $data['R_current_donors'] = 'active';
            else
                $data['R_ended_donors'] = 'active';
          
            ?>




                            <?php
                            /*
                            echo '<pre>';
                            print_r($donors);
                            echo '<pre>'; */
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
                                        $diff = abs($donor->date_to - $donor->date_from);
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
                                            $date = date('Y-m-d',$donor->DAT);
                                        echo '<tr>
                          <td>'.($i++).'</td>
                          <td>'.$donor->name.'</td>
                          <td>'.$donor->mobile.'</td>
                          <td>'.$donor->TOT.'</td>
                          <td>'.$period.'</td>
                          <td>'.$donor->payments_num.'</td>
                          <td>'.$donor->pay.'</td>
                          <td>'.($donor->payments_num-$donor->pay).'</td>
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