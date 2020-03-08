
<?php
/*echo '<pre>';
print_r($details);
echo '<pre/>';
*/
$pay_method_arr =array(1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');
                if (isset($details) && $details != null){
                    $x= 1;
                    $total = 0;
                    foreach ($details as $row){
                        $total =$total+ $row->value;
                     
                                ?>
                                <tr >
                                    <td><?=$x++?></td>
                                    <td><?= $row->date?></td>
                                    <td><?= $row->pill_num?></td>
                                 <!--  <td><?= $row->pill_type_title?></td> -->
                                  <!--  <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
                                   -->
                                   
                                    <td><?= $row->markz?></td>

                                <td><?= $row->person_name?></td>
                                    <td><?= $pay_method_arr[$row->pay_method]?></td>
                                    
                                    <td><?= $row->erad ?></td>
                                    <td><?= $row->bnd_type1_name ?> / <?= $row->bnd_type2_name ?></td>
                                    <td><?= $row->publisher_name ?></td>
                                    <td><?= $row->value ?></td>


                                </tr>



                                <?php

                    }
                    ?>

                    <tr>
                        <th colspan="9"  style="text-align: center ">الاجمالي</th>
                        <th style="background-color: #428bca;color: #fff"><?= $total?></th>
                    </tr>



                    <?php
                }

                ?>