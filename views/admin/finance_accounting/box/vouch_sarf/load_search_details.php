
<?php
                             $pay_method_arr =array(1=>'نقدي',2=>'شيك من الصندوق ',3=>'شيك من البنك ', 4 => 'عبر الإنترنت');
                if (isset($details) && $details != null){
                    $x= 1;
                    $total = 0;
                    foreach ($details as $row){
                        $total =$total+ $row->total_value;
                     
                                ?>
                                <tr >
                                    <td><?=$x++?></td>
                                    <td><?= $row->rqm_sanad?></td>
                                    <td><?= $row->date_sanad_ar?></td>
                                    <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
                                    <td><?= $row->person_name?></td>
                                    <td><?= $row->total_value ?></td>
                                    <?php  if($_POST['array_search_id'] == 'about'){ ?>
                                     <td><?= $row->$_POST['array_search_id'] ?></td>
                                        <?php }elseif ($_POST['array_search_id'] == 'byan'){ ?>
                                  <td><?= $row->$_POST['array_search_id'] ?></td>
                                    <?php } elseif ($_POST['array_search_id'] == 'name_hesab'){ ?>
                                <td><?= $row->$_POST['array_search_id'] ?></td>
                                        <?php } elseif ($_POST['array_search_id'] == 'sheek_num'){?>
                            <td><?= $row->$_POST['array_search_id'] ?></td>
                                    <?php } ?>
                                </tr>
                                <?php

                    }
                    ?>

                    <tr>
                        <th colspan="5"   style="text-align: center ">الاجمالي</th>
                        <th style="background-color: #428bca;color: #fff"><?= $total?></th>
                    </tr>



                    <?php
                }else{

                ?>


                    <tr >
                        <th colspan="6" class="myalert"><div style="color: red;"> لا توجد نتائج للبحث !!</div></th>

                    </tr>









<?php } ?>
<script>

    $('.myalert').attr('colspan',$('.myclass').length);
</script>
