<table class="table example table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th>م</th>
                        <th>   رقم الصادر</th>
                        <th>تاريخ الارسال</th>
                        <th>جهة الاختصاص</th>
                        <th>الجهة المرسل اليها</th>
                        <th>عنوان الموضوع</th>
                        <th>طريقة الارسال</th>
                      
                        <th>الاولويه</th>
                      
                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x=1;
                    foreach ($all_sader_end as $row){
                        ?>
                        <tr>
                            <td><?= $x++?></td>
                            <td><?= $row->sader_rkm?></td>
                            <td><?php if (!empty($row->ersal_date)) {
                                echo  $row->ersal_date;
                                } else{
                                echo 'غير محدد' ;
                                }
                               ?></td>
                            <td><?php if (!empty($row->geha_ekhtsas_n)) {
                                    echo  $row->geha_ekhtsas_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                                 <td><?php if (!empty($row->geha_morsel_n)) {
                                    echo  $row->geha_morsel_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <td><?php if (!empty($row->mawdo3_name)) {
                                    echo  $row->mawdo3_name;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <td><?php if (!empty($row->tarekt_ersal_n)) {
                                    echo  $row->tarekt_ersal_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                           
                          
                            <td><?php if (!empty($row->awlawia_n)) {
                                    echo  $row->awlawia_n;
                                } else{
                                    echo 'غير محدد' ;
                                }
                                ?></td>
                            <td>
                                <!-- <a  class="btn btn-xs btn-warning" style="padding:1px 5px;" href="<?= base_url().'all_secretary/archive/sader/Add_sader/add_deal/'.$row->id?>">
                                    <i class="fa fa-list "></i>
                                    استكمال البيانات
                                </a> -->

                                <button 
                                data-toggle="modal" data-target="#myModal_print"   
                                
                                onclick="get_print('<?php echo  $row->mawdo3_name?>','<?php echo  $row->date_ar?>' ,'<?php echo  $row->sader_rkm?>');" 
                                class="btn btn-success">طباعه الباركود</button>
                                <!-- <button onclick="get_print(<?php echo  $row->id?>,'<?php echo  $row->date_ar?>' ,<?php echo  $row->sader_rkm?>,<?php echo  $row->morfaq_num?>);"
                                        data-toggle="modal" data-target="#barcodeModal"   class="btn btn-success">طباعه الباركود</button> -->
                                <div class="btn-group">
                  <button type="button" class="btn btn-warning">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a  href="<?php echo base_url();?>/all_secretary/archive/sader/Add_sader/add_deal/<?php echo $row->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i>  اطلاع علي البيانات</a></li>
                   
                  </ul>
                </div> 
                                
                

                               


                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>