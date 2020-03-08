<?php

                                    if(isset($records)&&!empty($records)){
                                        ?>
                                <table class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center !important;">م</th>
                                        <th style="text-align: center !important;">رقم الإيصال</th>
                                        <th style="text-align: center !important;">التاريخ</th>
                                        <th style="text-align: center !important;">نوع الإيصال</th>
                                        <th style="text-align: center !important;">طريقة التوريد</th>
                                        <th style="text-align: center !important;">المبلغ </th>
                                        <th style="text-align: center !important;">الإسم </th>
                                        <th style="text-align: center !important;">البند </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(isset($records)&&!empty($records)){
                                        $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي'
                                        ,5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

                                        $x=0;
                                        foreach ($records as $row){
                                            $x++;
                                            ?>
                                            <tr>
                                             <td><?php echo $x;?></td>
                                             <td><?php echo $row->pill_num;?></td>
                                                <td><?php echo $row->pill_date;?></td>
                                                <td><?php echo $row->pill_type_name;?></td>
                                             <td><?php echo $pay_method_arr[$row->pay_method];?></td>
                                             <td><?php echo $row->value;?></td>
                                             <td><?php echo $row->person_name;?></td>
                                             <td><?php echo $row->bnd_type1_name;?></td>



                                            </tr>
                                            <?php } } ?>


                                    </tbody>
                                </table>
                            <?php  }  else { ?>
                                        <div class="alert alert-danger">عفوا !...لاتوجد نتائج</div>
                                    <?php } ?>