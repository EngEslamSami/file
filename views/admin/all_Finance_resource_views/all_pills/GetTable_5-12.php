


<?php if(!empty($result)){ 
    
    $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');
    if($result->kafala_type ==1){
        $person_name = $result->MemberDetails['k_name'];
    }elseif ($result->kafala_type ==2){
        $person_name = $result->MemberDetails['d_name'];
    }elseif ($result->kafala_type ==3){
        $person_name =$result->MemberDetails['name'];
    }


    if($result->kafala_type ==1){
        $person_mob = $result->MemberDetails['k_mob'];
    }elseif ($result->kafala_type ==2){
        $person_mob = $result->MemberDetails['d_mob'];
    }elseif ($result->kafala_type ==3){
        $person_mob =$result->MemberDetails['mob'];
    }

    ?>




          <table class="table table-striped table-bordered dt-responsive nowrap">
                               <tr>
                                    <th class="gray_background"  >رقم الإيصال</th>
                                    <td><?=$result->pill_num?></td>
                                    <th class="gray_background"  >تاريخ الإيصال </th>
                                    <td><?=$result->pill_date?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background"  >نوع الإيصال</th>
                                    <td><?=$result->pill_type_title?></td>
                                    <th class="gray_background"  >مركز التحصيل</th>
                                    <td><?php  if(!empty($gathering_place[$result->place_supply])){ 
                                        echo$gathering_place[$result->place_supply]->title_setting; }else{ echo'غير محدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background"  >طريقة التوريد</th>
                                    <td><?php  if(!empty($pay_method_arr[$result->pay_method])){ 
                                        echo$pay_method_arr[$result->pay_method]; }else{ echo'غير محدد';}?></td>
                                    <th class="gray_background"  >الفئة</th>
                                    <td><?php if(!empty($result->Fe2a_title)){ 
                                        echo$result->Fe2a_title; }else{ echo'غير محدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background"  >المبلغ</th>
                                    <td><?php if(!empty($result->value)){ 
                                        echo$result->value; }else{ echo 0;}?></td>
                                    <th class="gray_background"  >اللقب</th>
                                    <td><?php  if(!empty($titles[$result->laqab])){ 
                                        echo$titles[$result->laqab]->title_setting; }else{ echo'غير محدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background"  >الإسم</th>
                                    <td><?php  if(!empty($person_name)){ 
                                        echo$person_name; }else{ echo'غير محدد';}?></td>
                                    <th class="gray_background"  >الجوال</th>
                                    <td><?php  if(!empty($person_mob)){ 
                                        echo$person_mob; }else{ echo'غير محدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background"  >التحية</th>
                                    <td><?php  if(!empty($greetings[$result->tahia])){ 
                                        echo$greetings[$result->tahia]->title_setting; }else{ echo'غير محدد';}?></td>
                                    <th class="gray_background"  >نوع التبرع</th>
                                    <td><?php  if(!empty($result->erad_title)){ 
                                        echo$result->erad_title; }else{ echo'غير محدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background"  >الفئة</th>
                                    <td><?php  if(!empty($result->fe2a_type_title)){ 
                                        echo$result->fe2a_type_title; }else{ echo'غير محدد';}?></td>
                                    <th class="gray_background"  >البند</th>
                                    <td><?php  if(!empty($result->band_title)){ 
                                        echo$result->band_title; }else{ echo'غير محدد';}?></td>
                                </tr>
                                 <?php 
                
                                 if( $result->pay_method ==2){ ?>
                                <tr>
                                    <th class="gray_background"  >رقم الشيك</th>
                                    <td><?php  if(!empty($result->cheq_num)){ 
                                        echo$result->cheq_num; }else{ echo'غير محدد';}?></td>
                                    <th class="gray_background"  >تاريخ تحرير الشيك</th>
                                    <td><?php  if(!empty($result->date)){ 
                                        echo$result->date; }else{ echo'غير محدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background"  >إسم البنك</th>
                                    <td><?php  if(!empty($result->bank_title)){ 
                                        echo$result->bank_title; }else{ echo'غير محدد';}?></td>
                                    <th class="gray_background"  >رقم حساب المتبرع</th>
                                    <td><?php  if(!empty($result->bank_account_num)){ 
                                        echo$result->bank_account_num; }else{ echo'غير محدد';}?></td>
                                </tr>

                               <?php }elseif( $result->pay_method ==3){ ?>
                                <tr>
                                    <th class="gray_background"  >رقم الجهاز</th>
                                    <td><?php  if(!empty($result->device_num)){ 
                                        echo$result->device_num; }else{ echo'غير محدد';}?></td>
                                    <th class="gray_background"  >رقم (التفويض)</th>
                                    <td><?php  if(!empty($result->tafwed_num)){ 
                                        echo$result->tafwed_num; }else{ echo'غير محدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background"  >تاريخ العملية</th>
                                    <td><?php  if(!empty($result->process_date)){ 
                                        echo$result->process_date; }else{ echo'غير محدد';}?></td>
                                    <th class="gray_background"  >إسم البنك</th>
                                    <td><?php  if(!empty($result->bank_title)){ 
                                        echo$result->bank_title; }else{ echo'غير محدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background"  >الحساب البنكي</th>
                                    <td><?php  if(!empty($result->bank_account_title)){ 
                                        echo$result->bank_account_title; }else{ echo'غير محدد';}?></td>
                                    <th class="gray_background"  >رقم الحساب البنكي</th>
                                    <td><?php  if(!empty($result->bank_account_num_title)){ 
                                        echo$result->bank_account_num_title; }else{ echo'غير محدد';}?></td>
                                </tr>

                                 <?php }elseif( $result->pay_method ==4 || $result->pay_method ==5 || $result->pay_method ==6){ ?>
                                <tr>
                                    <th class="gray_background"  >رقم المرجع</th>
                                    <td><?php  if(!empty($result->marg3_num)){ 
                                        echo$result->marg3_num; }else{ echo'غير محدد';}?></td>
                                    <th class="gray_background"  >تاريخ العملية</th>
                                    <td><?php  if(!empty($result->marg3_date)){ 
                                        echo$result->marg3_date; }else{ echo'غير محدد';}?></td>
                                </tr>
                                <tr>
                                <th class="gray_background"  >إسم البنك</th>
                                    <td><?php  if(!empty($result->bank_title)){ 
                                        echo$result->bank_title; }else{ echo'غير محدد';}?></td>
                                     <th class="gray_background"  >الحساب البنكي</th>
                                    <td><?php  if(!empty($result->bank_account_title)){ 
                                        echo$result->bank_account_title; }else{ echo'غير محدد';}?></td>
                         
                                </tr>
                                <tr>
                                <th class="gray_background"  >رقم الحساب البنكي</th>
                                    <td><?php  if(!empty($result->bank_account_num_title)){ 
                                        echo$result->bank_account_num_title; }else{ echo'غير محدد';}?></td>
                                <th class="gray_background"  >كود الحساب</th>
                                <td></td>
                                </tr>
                                 <?php }elseif( $result->pay_method ==7){ ?>   
                                  <tr>
                                <th class="gray_background"  >إسم البنك</th>
                                    <td><?php  if(!empty($result->bank_title)){ 
                                        echo$result->bank_title; }else{ echo'غير محدد';}?></td>
                                     <th class="gray_background"  >الحساب البنكي</th>
                                    <td><?php  if(!empty($result->bank_account_title)){ 
                                        echo$result->bank_account_title; }else{ echo'غير محدد';}?></td>
                         
                                </tr>
                                <tr>
                                <th class="gray_background"  >رقم الحساب البنكي</th>
                                    <td><?php  if(!empty($result->bank_account_num_title)){ 
                                        echo$result->bank_account_num_title; }else{ echo'غير محدد';}?></td>
                                <th class="gray_background"  >كود الحساب</th>
                                <td></td>
                                </tr>
                                 <?php  } ?>
                           
                                </table>


























<?php  }  ?>