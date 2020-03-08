<?php


if(isset($result) && $result!=null){
    $form= form_open_multipart("family_controllers/Family/update_basic/".$result->id);
    $mother_national_num=$result->mother_national_num;
    $user_name=$result->user_name;
    $mother_mob=$result->mother_mob;
    $register_place = $result->register_place;
    $validation ='';
    $button ='تعديل ';
    $update_date = $result->file_update_date;
    $peroid_update  = $result->peroid_update;

    /***************zidan*/
    $bank_account_num=$result->bank_account_num;
    //  $file_num=$file_num+1;
    $date= $result->date_suspend;
    /***************zidan*/
    $bank_ramz = $result->bank_ramz;
    /***************ahmed*/

    $person_response=$result->person_response;
    $person_account=$result->person_account;
    $agent_name=$result->agent_name;
    $agent_card=$result->agent_card;
    $agent_mob=$result->agent_mob;
    $agent_relationship=$result->agent_relationship;
    $agent_bank_account=$result->agent_bank_account;
    $bank_account_id=$result->bank_account_id;
    $agent_card_source=$result->agent_card_source;
    $disabl = 'disabled';
    $opption_select = ' <option value="0">اختر</option>';

    /***************ahmed*/

}else{
    $form= form_open_multipart("family_controllers/Family/Add_Register_2");
    $mother_national_num="";
    $user_name='';
    /***************zidan*/
    //  $file_num="0";
    $date= '';
    /***************zidan*/
    $mother_mob='';
    $validation ='';//data-validation="required"
    $button ='حفظ';
    $disabl = '';
    /***************ahmed*/
    $bank_account_num='';

    $person_response='';
    $person_account='';
    $agent_name='';
    $agent_card='';
    $agent_mob='';
    $agent_relationship='';
    $agent_bank_account='';
    $bank_account_id='';
    $agent_card_source='';
    /***************ahmed*/
    $register_place ='';
    $bank_ramz = '';
    $update_date = '';
    $peroid_update ='';
    $opption_select ='';
}
?>
<section class="contact-us">
    <div class="container-fluid">
        <div class="xs-heading row xs-mb-60"></div>
        <div class="col-sm-12 padding-30 white_background">
            <!---------------------------------------------------------------------------------->
            <div class="container">
                <div class="col-sm-3">
                    <ul class="nav nav-pills">
                        <li class="col-sm-12 active"><a data-toggle="pill" href="#menu0">بيانات الام  </a></li>
                        <li  class="col-sm-12"><a data-toggle="pill"  href="#menu1">بيانات الاب </a></li>
                        <li class="col-sm-12"><a data-toggle="pill" href="#menu2">بيانات الابناء</a></li>
                        <li class="col-sm-12"><a data-toggle="pill" href="#menu3">بيانات السكن</a></li>
                        <li class="col-sm-12"><a data-toggle="pill" href="#menu4">أجهزة المنزل</a></li>
                        <li class="col-sm-12"><a data-toggle="pill" href="#menu5">إحتياجات المنزل</a></li>
                        <li class="col-sm-12"><a data-toggle="pill" href="#menu6">ارفاق الملفات</a></li>
                        <li class="col-sm-12"><a data-toggle="pill" href="#menu7">البيانات الماليه</a></li>
                        <li class="col-sm-12"><a data-toggle="pill" href="#menu8">رأى الباحث </a></li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="tab-content">
                        <div  id="menu0" class="tab-pane fade in active">
                            <!------------------1----------->
                      <table class="table table-striped table-bordered dt-responsive nowrap">
                          <tbody>
                            <?php
                            if($result['m_want_work']==1  ){
                                $val="نعم";
                            }else{
                                $val="لا";
                            }
                            if($result['m_hijri']==1  ){
                                $val="نعم";
                            }else{
                                $val="لا";
                            }
                            if($result['m_ommra']==1  ){
                                $val="نعم";
                            }else{
                                $val="لا";
                            }
                            $arr_yes_no=array('','نعم','لا');
                            ?>
                            <?php if( isset($result)&&!empty($result)&&$result =='' && $result ==null ){
                                ?>
                                <div class="col-lg-12 alert alert-danger" >لا توجد بيانات للام</div>

                            <?php  }else{ ?>

                                <tr>
                                    <td> الاسم الرباعي  </td>
                                    <td><?php echo $result['full_name']?></td>
                                </tr>
                                <tr>
                                    <td>طبيعة الفرد </td>
                                    <td>
                                        <?php  foreach ($person_type as $row2):
                                            $selected = '';
                                            if ($row2->id_setting == $result['person_type']) {
                                                echo $row2->title_setting;
                                            } ?>
                                        <?php endforeach;?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>نوع الهوية </td>
                                    <td>
                                        <?php
                                        foreach ($national_id_array as $row2):
                                            $selected = '';
                                            if ($row2->id_setting == $result['m_national_id_type']) {
                                                echo $row2->title_setting;
                                            } ?>
                                        <?php endforeach;?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>رقم الهوية </td>
                                    <td><?php echo $result['m_national_id']?></td>
                                </tr>

                                <tr>
                                    <td>مصدر الهوية </td>
                                    <td> <?php if(!empty($id_source) && isset($id_source)){ foreach ($id_source as $record){
                                    if($result['m_card_source']==$record->id_setting){echo $record->title_setting; }
                                            ?>
                                        <?php  } } ?></td>
                                </tr>

                                <tr>
                                    <?php
                                    $gregorian_date=explode('/',$result['m_birth_date']); 	 ?>

                                    <td>تاريخ الميلاد </td>
                                    <td>
                                        <?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; }?>
                                        <?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1]; }?>
                                        <?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2]; }?>
                                    </td>

                                </tr>
                                <tr>
                                    <?php  $hijri_date=explode('/',$result['m_birth_date_hijri']); ?>
                                    <td>تاريخ الميلاد هجرى </td>
                                    <td>
                                        <?php if(!empty($hijri_date[0])){echo $hijri_date[0];}?>
                                        <?php if(!empty($hijri_date[1])){echo $hijri_date[1];}?>
                                        <?php if(!empty($hijri_date[2])){echo $hijri_date[2];}?>
                                    </td>

                                </tr>

                                <tr>
                                    <td>العمر </td>
                                    <td><?php  if(!empty($gregorian_date[2])){
                                           echo (date('Y-m-d')-$gregorian_date[2]);

                                           }

                                           ?>


                                           </td>

                                </tr>


                                <tr>
                                    <td>الجنسية </td>
                                    <td> <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)){?>
                                            <?php  foreach ($nationality as $record):
                                                if($record->id_setting==$result['m_nationality']){echo $record->title_setting;}?>
                                            <?php  endforeach;?>
                                            <?php if($result['m_nationality']==0) echo "اخري";?>
                                        <?php }else { ?>
                                            <?php if($result['m_nationality']==0) echo "اخري";?>
                                        <?php } ?> </td>


                                </tr>
                                <tr>
                                    <td> جنسيه اخري </td>
                                    <td><?php echo $result['nationality_other']?> </td>

                                </tr>
                                <tr>
                                    <td>الحالة الإجتماعية </td>
                                    <td><?php if(!empty($marital_status_array) && isset($marital_status_array)){
                                        foreach ($marital_status_array as $row6):
                                            $selected='';if($row6->id_setting==$result['m_marital_status_id_fk']){echo $row6->title_setting;}   ?>
                                        <?php  endforeach;}?>
                                    </td>

                                </tr>

                                <tr>
                                    <td>السكن </td>
                                    <td>     <?php if(isset($living_place_array) && $living_place_array!=null &&!empty($living_place_array)) { ?>

                                            <?php
                                            foreach ($living_place_array as $row):
                                                $selectedx = '';
                                                if ($row->id_setting == $result['m_living_place_id_fk']) {
                                                    echo $row->title_setting;
                                                } ?>
                                            <?php endforeach; ?>
                                            <?php if ($result['m_living_place_id_fk'] == 0) echo "اخري"; ?>
                                            <?php
                                        }else {
                                            ?>
                                            <?php if ($result['m_living_place_id_fk'] == 0) echo "اخري"; ?>
                                            <?php
                                        }
                                        ?> </td>

                                </tr>
                                <tr>
                                    <td> محل سكن </td>
                                    <td><?php echo $result['m_living_place']?> </td>
                                </tr>
                                <tr>
                                    <td>صلة القرابة </td>
                                    <td><?php if(!empty($relationships)){ foreach ($relationships as $record){
                                            $select=''; if($result['m_relationship']==$record->id_setting){echo $record->title_setting;}
                                            ?>
                                        <?php  } } ?></td>

                                </tr>

                                <tr>
                                    <td>الحالة الدراسية  </td>
                                    <td> <?php  if(!empty($arr_ed_state) && isset($arr_ed_state)){
                                        foreach($arr_ed_state as $row5){
                                            $selected='';
                                            if($row5->id_setting==$result['m_education_status_id_fk']){ echo $row5->title_setting;}	?>

                                        <?php  }
                                    }?> </td>

                                </tr>
                                <tr>
                                    <td>المستوى التعليمى  </td>
                                    <td>   <?php  if( isset($education_level_array) && !empty($education_level_array) ){
                                        foreach ($education_level_array as $row4):
                                         if($row4->id_setting==$result['m_education_level_id_fk']){echo $row4->title_setting;}	?>
                                        <?php  endforeach;}?>  </td>
                                </tr>
                                <tr>
                                    <td>التخصص  </td>
                                    <td><?php echo $result['m_specialization']?>  </td>
                                </tr>



                                <tr>
                                    <td>ملتحقة بدار نسائية </td>
                                    <td> <?php   $arr_yes_no=array('','نعم','لا');
                                        for($r=1;$r<sizeof($arr_yes_no);$r++){
                                            $selected='';if($r==$result['m_female_house_check']){echo $arr_yes_no[$r];}
                                            ?>
                                        <?php }?> </td>
                                </tr>
                                <tr>
                                    <td>اسم الدار  </td>
                                    <td><?php  if( isset($women_houses) && !empty($women_houses) ){
                                        foreach ($women_houses as $row4):
                                           if($row4->id_setting==$result['m_female_house_id_fk']){echo $row4->title_setting;}	?>

                                        <?php  endforeach;}?> </td>
                                </tr>
                                <!--ahmed-->
                                <tr>
                                    <td>الحالة الصحية </td>
                                    <td>  <?php if($result['m_health_status_id_fk'] ==='disease'){?>مريض <?php } ?>
                                        <?php if($result['m_health_status_id_fk'] ==='disability'){?>معاق <?php } ?>
                                        <?php
                                        foreach ($health_status_array as $row3):
                                           if($row3->id_setting==$result['m_health_status_id_fk'])
                                            {echo $row3->title_setting;}	?>
                                        <?php  endforeach;?></td>
                                </tr>

                                <tr>
                                    <td>نوع المرض </td>
                                    <td>   <?php
                                        foreach ($diseases as $row3):
                                            $selected='';if($row3->id_setting==$result['disease_id_fk']){ echo $row3->title_setting;}	?>
                                        <?php  endforeach;?> </td>


                                </tr>
                                <tr>
                                    <td>نوع الإعاقة </td>
                                    <td>   <?php
                                        foreach ($diseases as $row3):
                                            $selected='';if($row3->id_setting==$result['disability_id_fk']){echo $row3->title_setting;}	?>
                                        <?php  endforeach;?> </td>


                                </tr>
                                <tr>
                                    <td>تاريخ المرض/الإعاقة  </td>
                                    <td><?php echo $result['dis_date_ar']?>  </td>
                                </tr>
                                <tr>
                                    <td>سبب المرض/الإعاقة  </td>
                                    <td><?php echo $result['dis_reason']?> </td>
                                </tr>
                                <tr>
                                    <td>جهة المتابعة المرض/الإعاقة  </td>
                                    <td>  <?php
                                        foreach ($responses as $row3):
                                            $selected='';if($row3->id_setting==$result['dis_response_status']){echo $row3->title_setting;}	?>
                                        <?php  endforeach;?> </td>
                                </tr>
                                <tr>
                                    <td>وضع الحالة المرض/الإعاقة  </td>
                                    <td>   <?php
                                        foreach ($diseases_status as $row3):
                                            $selected='';if($row3->id_setting==$result['dis_status']){  echo $row3->title_setting;}	?>
                                        <?php  endforeach;?>
                                    </td>

                                </tr>
                                <tr>
                                    <td>أداء فريضة الحج </td>
                                    <td> <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                                            $selected='';if($r==$result['m_hijri']){echo $arr_yes_no[$r];}
                                            ?>

                                        <?php }?>
                                    </td>


                                </tr>
                                <tr>
                                    <td>أداء فريضة العمرة </td>
                                    <td> <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                                            $selected='';if($r==$result['m_ommra']){echo $arr_yes_no[$r];}
                                            ?>

                                        <?php }?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>رقم الجوال  </td>
                                    <td><?php echo $result['m_mob']?> </td>

                                </tr>
                                <tr>
                                    <td>رقم جوال أخر  </td>
                                    <td><?php echo $result['m_another_mob']?></td>

                                </tr>
                                <tr>
                                    <td>البريد الإلكترونى  </td>
                                    <td><?php echo $result['m_email']?>  </td>

                                </tr>
                                <tr>
                                    <td>المهارة </td>
                                    <td><?php echo $result['m_skill_name']?> </td>
                                </tr>
                                <tr>
                                    <td>الحياة العملية  </td>
                                    <td> <?php
                                        $arr_work =array('','لا يعمل','يعمل');
                                        for($r=1;$r<sizeof($arr_work);$r++){
                                            $selected=''; if($r==$result['m_want_work']){ echo $arr_work[$r];}
                                            ?>

                                        <?php }?> </td>

                                </tr>
                                <tr>
                                    <td>المهنة </td>
                                    <td>   <?php
                                        foreach ($job_titles as $job):
                                            $selected='';if($job->id_setting==$result['m_job_id_fk']){echo $job->title_setting;}	?>
                                        <?php  endforeach;?>
                                    </td>


                                </tr>
                                <tr>
                                    <td>الدخل الشهرى </td>
                                    <td><?php echo $result['m_monthly_income'];?> </td>
                                </tr>


                                <tr>
                                    <td>مكان العمل </td>
                                    <td><?php echo $result['m_place_work'];?></td>
                                </tr>

                                <tr>
                                    <td>هاتف العمل </td>
                                    <td><?php echo $result['m_place_mob'];?></td>
                                </tr>
                            <?php } ?>
                          </tbody>
                      </table>
                            <!------------------1----------->
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <!----------------------------->
                            <?php
                            if(!empty($father) && $father!=null){
                                $full_name =$father->full_name;

                                $f_national_id=$father->f_national_id;
                                $f_national_id_type=$father->f_national_id_type;//


                                $f_birth_date=$father->f_birth_date;
                                $f_job=$father->f_job;//
                                $f_death_id_fk=$father->f_death_id_fk;//
                                $f_child_num=$father->f_child_num;

                                $f_nationality_id_fk=$father->f_nationality_id_fk;//
                                $nationality_other =$father->nationality_other;

                                $f_death_date=$father->f_death_date;
                                $f_job_place=$father->f_job_place;
                                $f_death_reason_fk=$father->f_death_reason_fk;
                                $f_wive_count=$father->f_wive_count;//

                                $f_birth_date = $father->f_birth_date;
                                $f_birth_date_hijri = $father->f_birth_date_hijri;
                                $f_birth_date_year =$father->f_birth_date_year;
                                $f_birth_date_hijri_year =$father->f_birth_date_hijri_year;
                                $family_members_number =$father->family_members_number;
                                $f_card_source =$father->f_card_source;
                            }else{
                                $fullname ="";
                                $disable="";

                                $f_national_id_type='';//
                                $f_national_id='';
                                $f_birth_date='';
                                $f_job="";//
                                $f_death_id_fk='';//
                                $f_child_num='';


                                $f_nationality_id_fk='';//
                                $nationality_other='';
                                $f_death_date='';
                                $f_job_place='';
                                $f_death_reason_fk='';
                                $f_wive_count='';//
                                /*ahmed*/
                                $f_birth_date ='';
                                $f_birth_date_hijri ='';
                                $f_birth_date_year ='';
                                $f_birth_date_hijri_year ='';
                                $family_members_number='';
                                $f_card_source='';
                                /*ahmed*/
                            }
                            ?>
                            <?php if($father =='' && $father ==null){
                                ?>
                                <div class="col-lg-12 alert alert-danger" >لا توجد بيانات للاب</div>
                            <?php }else{?>
                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <tbody>

                                <tr>
                                    <td>  الاسم رباعي </td>
                                    <td> <?php echo$full_name;?> </td>
                                </tr>
                                <tr>
                                    <td>نوع الهوية  </td>
                                    <td>  <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)){?>
                                        <?php    foreach ($national_id_array as $row2):
                                       if($row2->id_setting==$f_national_id_type){ echo $row2->title_setting;}	?>
                                       <?php  endforeach;}?>
                                    </td>
                                </tr>
                               <tr>
                                    <td> مصدر الهوية </td>
                                    <td>
                                        <?php if(!empty($id_source)){ foreach ($id_source as $record){
                                        $select=''; if($f_card_source==$record->id_setting){echo $record->title_setting; }
                                        ?>
                                        <?php  } } ?>
                                    </td>
                                </tr>
                               <tr>
                                    <td> رقم الهوية </td>
                                    <td> <?= $f_national_id;?> </td>
                                </tr>
                               <tr>
                                    <td>  تاريخ الميلاد</td>
                                    <td>
                                        <?php      if(!empty($f_birth_date_hijri)){
                                            $hijri_date=explode('/',$f_birth_date_hijri); }?>
                                        <?php if(!empty($hijri_date[0])){ echo $hijri_date[0];}?>
                                        <?php if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>
                                        <?php if(!empty($hijri_date[2])){ echo $hijri_date[2];}?>
                                    </td>
                                </tr>
                               <tr>
                                    <td> العمر </td>
                                    <td><?php
                                       if(!empty($gregorian_date[2])){
                                           echo (date('Y-m-d')-$gregorian_date[2]);


                                            }?>  </td>
                                </tr>
                               <tr>
                                    <td>  عدد الذكور</td>
                                    <td> <?php echo $family_members_number;?> </td>
                                </tr>
                               <tr>
                                    <td> عدد الإناث </td>
                                    <td> <?php echo $family_members_number;?> </td>
                                </tr>
                               <tr>
                                    <td>الجنسية  </td>
                                    <td>
                                        <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)){?>
                                            <?php if(isset($nationality) && $nationality!=null &&!empty($nationality)):
                                                foreach($nationality as $one_nationality):
                                                    if($one_nationality->id_setting == $f_nationality_id_fk){ echo $one_nationality->title_setting;} ?>
                                                <?php endforeach;endif;?>
                                            <?php if($f_nationality_id_fk==0) echo "اخري";?>
                                        <?php } else { ?>
                                            <?php if($f_nationality_id_fk==0) echo "اخري";?>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                               <tr>
                                    <td>  جنسيه اخري </td>
                                    <td> <?php echo $nationality_other ?> </td>
                                </tr>
                               <tr>
                                    <td>المهنة  </td>
                                    <td>   <?php foreach($job_titles as $row){
                                            $selected="";if($row->id_setting== $f_job){echo $row->title_setting;} ?>
                                           <?php }?>
                                    </td>
                                </tr>
                               <tr>
                                    <td> مكان العمل </td>
                                    <td> <?php echo $f_job_place ?> </td>
                                </tr>
                               <tr>
                                    <td> سبب الوفاة </td>
                                    <td>  <?php if(isset($arr_deth) &&!empty($arr_deth)) { ?>

                                        <?php foreach ($arr_deth as $row) {

                                        if ($row->id_setting == $f_death_id_fk) {
                                            echo $row->title_setting;
                                        } }?>
                                            <?php if ($f_death_id_fk == 0) echo "اخري"; ?>
                                        <?php
                                        }else{?>
                                            <?php if ($f_death_id_fk == 0) echo "اخري"; ?>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                               <tr>
                                    <td> السبب  </td>
                                    <td> <?php echo $f_death_reason_fk?> </td>
                                </tr>
                                <tr>
                                    <td> تاريخ الوفاة </td>
                                    <td> <?php echo $f_death_date ?> </td>
                                </tr>
                                <tr>
                                    <td> عدد الأبناء </td>
                                    <td> <?php echo $f_child_num ?> </td>
                                </tr>
                                <tr>
                                    <td>عدد الزوجات  </td>
                                    <td> <?php echo $f_wive_count ?> </td>
                                </tr>
                                </tbody>
                            </table>

                            <?php }?>
                            <!----------------------------->
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <!----------------------------->
                            <?php if(isset($member_data) && $member_data!=null): ?>
                                <table class="table table-bordered" style="width:100%">
                                    <header>
                                        <tr class="info">
                                            <th>م </th>
                                            <th>الإسم</th>
                                            <th> إسم الام</th>
                                            <th>رقم الهوية</th>
                                            <th>الجنس </th>
                                            <th>العمر</th>
                                            <th>المهنة </th>
                                            <th>المرحلة </th>
                                            <th>الصف </th>

                                        </tr>
                                    </header>
                                    <tbody>
                                    <?php  $x=1; foreach($member_data as $row):?>
                                        <tr>
                                            <td><?=$x++;?></td>
                                            <td><?php echo $row->member_full_name;  ?></td>
                                            <td><?php echo $mothers_data[0]->full_name;?></td>
                                            <td><?php echo $row->member_card_num; ?></td>
                                            <td><?php if($row->member_gender ==1){echo 'ذكر';}else{echo 'انثى'; } ?></td>
                                            <td>
                                                <?php $age='';
                                                if($row->member_birth_date_year !='' && $row->member_birth_date_year !=0){$age=$cuttent_higry_year-$row->member_birth_date_year;}
                                                $age=$cuttent_higry_year-$row->member_birth_date_year;
                                                //echo $age." عام";
                                                echo (date("Y") - $row->member_birth_date_year) ;

                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if(!empty($job_titles)){
                                                    $job_titles_arr =array();
                                                    foreach ($job_titles as $record){
                                                        $job_titles_arr[$record->id_setting] = $record->title_setting;
                                                    }

                                                    echo $job_titles_arr[$row->member_job];  }?>
                                            </td>
                                            <td><?php if(!empty($row->stage_name)){echo $row->stage_name;}  ?></td>
                                            <td><?php if(!empty($row->class_name)){echo $row->class_name; } ?></td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            <?php else:?>
                                <div class="col-lg-12 alert alert-danger" > لا يوجد أبناء للأسرة</div>
                            <?php endif;?>
                            <!----------------------------->
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <!----------------------------->
                            <?php if(isset($check_data) && $check_data!=null && !empty($check_data)){
                                $result=$check_data;

                            }else{
                                foreach($all_field as $keys=>$value){
                                    $result[$all_field[$keys]]='';
                                }
                                $result['h_rent_amount']=0;
                            }
                            $arr_yes_no=array('','نعم','لا');
                            ?>

                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <tbody>

                            <tr>
                                <td> رقم حساب فاتورة الكهرباء </td>
                                <td> <?php echo $result['h_electricity_account']?> </td>
                            </tr>
                              <tr>
                                                            <td> رقم حساب عداد المياه  </td>
                                                            <td> <?php echo $result['h_water_account']?> </td>
                                                        </tr>
                              <tr>
                                                            <td> الرقم الصحى </td>
                                                            <td> <?php echo $result['h_health_number']?> </td>
                                                        </tr>
                              <tr>
                                                            <td> المنطقة </td>
                                                            <td>   <?php if(isset($area) && !empty($area) && $area!=null) {
                                                                foreach($area as $record){
                                                                    if($record->id == $result['h_area_id_fk']){echo $record->title;}
                                                                }
                                                            }
                                                                ?>
                                                            </td>
                                                        </tr>
                              <tr>
                                                            <td> المحافظة </td>
                                                            <td>
                                                                <?php if(isset($city) && !empty($city) && $city!=null) {
                                                                foreach($city as $record){
                                                                    if($record->id == $result['h_city_id_fk']){echo $record->title;}
                                                                }
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>

                            <tr>
                                <td> المركز </td>
                                <td>
                                    <?php if(isset($centers) && !empty($centers) && $centers!=null) {
                                        foreach($centers as $record){
                                            if($record->id == $result['h_center_id_fk']){echo $record->title;}
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td> القرية </td>
                                <td>   <?php if(isset($village) && !empty($village) && $village!=null) {
                                        foreach($village as $record){
                                            if($record->id == $result['h_village_id_fk']){echo $record->title;}
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                              <tr>
                                                            <td>  الحى</td>
                                                            <td> <?php echo  $result['hai_name']?> </td>
                                                        </tr>
                              <tr>
                                                            <td> الشارع </td>
                                                            <td><?php echo  $result['h_street']?>  </td>
                                                        </tr>
                              <tr>
                                                            <td>أقرب مدرسة  </td>
                                                            <td> <?php echo  $result['hai_name']?> </td>
                                                        </tr>
                              <tr>
                                                            <td>  أقرب معلم  </td>
                                                            <td> <?php echo  $result['h_nearest_teacher']?> </td>
                                                        </tr>
                              <tr>
                                                            <td> أقرب مسجد </td>
                                                            <td><?php echo  $result['h_mosque']?>  </td>
                                                        </tr>
                              <tr>
                                                            <td> نوع السكن  </td>
                                                            <td>  <?php  if(isset($arr_type_house) && !empty($arr_type_house) && $arr_type_house!=null) {
                                                                foreach($arr_type_house as $x):
                                                                   if($x->id_setting==$result['h_house_type_id_fk']){echo $x->title_setting ;}?>
                                                                <?php endforeach ;
                            }?>
                                                            </td>
                                                        </tr>
                              <tr>
                                                            <td> لون المنزل </td>
                                                            <td> <?php echo $result['h_house_color']?>  </td>
                                                        </tr>
                              <tr>
                                                            <td> اتجاه المنزل </td>
                                                            <td>  <?php if(isset($arr_direct) && !empty($arr_direct) && $arr_direct!=null) {
                                                                foreach($arr_direct as $y):
                                                                  if($y->id_setting==$result['h_house_direction']){echo $y->title_setting ;}?>
                                                                <?php endforeach;}
                                                                ?> </td>
                                                        </tr>
                              <tr>
                                                            <td> الحالة </td>
                                                            <td>  <?php if(isset($house_state) && !empty($house_state) && $house_state!=null) {
                                                                foreach($house_state as $z):
                                                                 if($z->id_setting==$result['h_house_status_id_fk']){ echo $z->title_setting;}?>
                                                               <?php endforeach ;}?>
                                                            </td>
                                                        </tr>
                              <tr>
                                                            <td> عدد الغرف </td>
                                                            <td>  <?php echo $result['h_rooms_account']?></td>
                                                        </tr>
                              <tr>
                                                            <td>  مساحة البناء</td>
                                                            <td> <?php echo $result['h_house_size']?> </td>
                                                        </tr>
                            <tr>
                                <td> ملكية السكن </td>
                                <td>
                                    <?php if($result['h_house_owner_id_fk'] ==='rent' ){?> إيجار <?php }?>
                                    <?php if(isset($house_own) && !empty($house_own) && $house_own!=null) {
                                    foreach($house_own as $a):
                                       if($a->id_setting==$result['h_house_owner_id_fk']){echo $a->title_setting;}?>
                                    <?php endforeach ;}?>
                                </td>
                            </tr>
                            <tr>
                                <td> إسم المؤجر </td>
                                <td> <?php echo $result['h_renter_name']?> </td>
                            </tr>
                            <tr>
                                <td> رقم الجوال  </td>
                                <td> <?php echo $result['h_renter_mob'];?>  </td>
                            </tr>
                            <tr>
                                <td> تاريخ بداية العقد </td>
                                <td> <?php echo $result['contract_start_date'];?> </td>
                            </tr>
 <tr>
                                <td> تاريخ نهاية العقد  </td>
                                <td> <?php echo $result['contract_end_date'];?> </td>
                            </tr>
 <tr>
                                <td> مقدار الإيجار السنوى </td>
                                <td> <?php echo $result['h_rent_amount'];?> </td>
                            </tr>
 <tr>
                                <td>  عدد دورات المياه </td>
                                <td> <?php echo $result['h_bath_rooms_account'];?> </td>
                            </tr>
 <tr>
                                <td> مقترض من البنك العقارى  </td>
                                <td>  <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                                       if($r==$result['h_borrow_from_bank']){echo $arr_yes_no[$r];}
                                        ?>
                                   <?php }?>
                                </td>
                            </tr>
 <tr>
                                <td> القيمة المتبقية </td>
                                <td> <?php echo $result['h_borrow_remain']?> </td>
                            </tr>
 <tr>
                                <td> قرض ترميم من بنك التسليف  </td>
                                <td>  <?php for($r=1;$r<sizeof($arr_yes_no);$r++){
                                        if($r==$result['h_loan_restoration']){echo $arr_yes_no[$r];}
                                        ?>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr>
                                <td> القيمة المتبقية </td>
                                <td> <?php echo $result['h_loan_restoration_remain']?> </td>
                            </tr>



                                </tbody>
                            </table>
                            <!----------------------------->
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            <?php if(isset($devices) && $devices!=null):?>
                                <table class="table table-bordered" id="tab_logic">
                                    <thead>
                                    <tr class="info">
                                        <th>م</th>
                                        <th style="text-align: center">نوع الجهاز</th>
                                        <th style="text-align: center">العدد</th>
                                        <th style="text-align: center">حالة الجهاز</th>
                                        <th style="text-align: center" >ملاحظات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;
                                    $a=1; foreach($devices as $row): ?>
                                        <tr>
                                            <td><?php echo $a;?></td>
                                            <td><?php echo $row->name; ?> </td>
                                            <td><?php echo $row->d_count?></td>
                                            <td><?php echo $house_device_status[$row->d_house_device_status_id_fk]?></td>
                                            <td><?php echo $row->d_note?></td>
                                        </tr>
                                        <?php $a++; endforeach ?>
                                    </tbody>
                                </table>
                            <?php else:?>
                                <div class="col-lg-12 alert alert-danger" > لاتوجد أجهزة</div>
                            <?php endif;?>
                        </div>
                        <div id="menu5" class="tab-pane fade">
                            <?php if(isset($home_needs) && $home_needs!=null):?>
                                <table class="table table-bordered" id="tab_logic">
                                    <thead>
                                    <tr class="info">
                                        <th>م</th>
                                        <th style="text-align: center">نوع إحتياج المنزل</th>
                                        <th style="text-align: center">العدد</th>
                                        <th style="text-align: center" >ملاحظات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $a=1; foreach($home_needs as $row): ?>
                                        <tr>
                                            <td><?php echo $a;?></td>
                                            <td><?php echo $row->name; ?> </td>
                                            <td><?php echo $row->h_count?></td>
                                            <td><?php echo $row->h_note?></td>
                                        </tr>
                                        <?php $a++; endforeach ?>
                                    </tbody>
                                </table>
                            <?php else:?>
                                <div class="col-lg-12 alert alert-danger" > لاتوجد إحتياجات للمنزل</div>
                            <?php endif;?>
                        </div>
                        <div id="menu6" class="tab-pane fade">
                            <?php
                            if (isset($attach_files) && !empty($attach_files)) {
                                $death_certificate=$attach_files[0]->death_certificate;
                                $family_card=$attach_files[0]->family_card;
                                $plowing_inheritance=$attach_files[0]->plowing_inheritance;
                                $instrument_agency_with_orphans =$attach_files[0]->instrument_agency_with_orphans;
                                $birth_certificate =$attach_files[0]->birth_certificate;
                                $ownership_housing =$attach_files[0]->ownership_housing;
                                $definition_school =$attach_files[0]->definition_school;
                                $social_security_card =$attach_files[0]->social_security_card;
                                $bank_statement =$attach_files[0]->bank_statement;
                                $collected_files =$attach_files[0]->collected_files;
                            }else{

                                $death_certificate='';
                                $family_card='';
                                $plowing_inheritance='';
                                $instrument_agency_with_orphans ='';
                                $birth_certificate ='';
                                $ownership_housing ='';
                                $definition_school ='';
                                $social_security_card ='';
                                $bank_statement ='';
                                $collected_files ='';
                                $id='';

                            }?>
                            <table class="table table-bordered" >
                                <tr>
                                    <th>م </th>
                                    <th>إسم الملف </th>
                                    <th>عرض/تحميل الملف </th>
                                </tr>
                                <tr >
                                    <td> 1 </td>
                                    <td> شهادة الوفاة <strong class="astric">*</strong></td>
                                    <td>


                                        <?php if (!empty($death_certificate)){?>

                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$death_certificate ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$death_certificate ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>
                                    </td>
                                </tr>
                                <tr >
                                    <td>2  </td>
                                    <td> كارت العائلة  <strong class="astric">*</strong></td>
                                    <td>

                                        <?php if (!empty($family_card)){?>

                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$family_card ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$family_card ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>


                                    </td>
                                </tr>
                                <tr >
                                    <td>3  </td>
                                    <td> صك حرث الارث  <strong class="astric">*</strong></td>
                                    <td>

                                        <?php if (!empty($plowing_inheritance)){?>

                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$plowing_inheritance ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$plowing_inheritance ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>


                                    </td>
                                </tr>
                                <tr >
                                    <td> 4 </td>
                                    <td> صك الولاية <strong class="astric">*</strong></td>
                                    <td>

                                        <?php if (!empty($instrument_agency_with_orphans)){?>

                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$instrument_agency_with_orphans ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$instrument_agency_with_orphans ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>

                                    </td>
                                </tr>
                                <tr >
                                    <td> 5 </td>
                                    <td> شهادات الميلاد <strong class="astric">*</strong></td>
                                    <td>

                                        <?php if (!empty($birth_certificate)){?>

                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$birth_certificate ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$birth_certificate ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>
                                    </td>
                                </tr>
                                <tr >
                                    <td> 6 </td>
                                    <td> صك ملكية السكن أو عقد الايجار  <strong class="astric">*</strong></td>

                                    <td>

                                        <?php if (!empty($ownership_housing)){?>

                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$ownership_housing ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$ownership_housing ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>

                                    </td>
                                </tr>
                                <tr >
                                    <td> 7 </td>
                                    <td> تعريف من المدرسة بجميع الأبناء و البنات <strong class="astric">*</strong></td>
                                    <td>

                                        <?php if (!empty($definition_school)){?>

                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$definition_school ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$definition_school ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>


                                    </td>
                                </tr>
                                <tr >
                                    <td> 8 </td>
                                    <td>بطاقة الضمان  الاجتماعى  <strong class="astric">*</strong></td>
                                    <td>

                                        <?php if (!empty($social_security_card)){?>

                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$social_security_card ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$social_security_card ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>


                                    </td>
                                </tr>
                                <tr >
                                    <td> 9 </td>
                                    <td> الحساب البنكي ( رقم الأيبان ) <strong class="astric">*</strong></td>
                                    <td>

                                        <?php if (!empty($bank_statement)){?>

                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$bank_statement ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$bank_statement ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>


                                    </td>
                                </tr>
                                <tr >
                                    <td> 10 </td>
                                    <td>رفع جميع المستندات <strong class="astric">*</strong></td>
                                    <td>

                                        <?php if (!empty($collected_files)){?>

                                            <a href="<?php echo base_url() . 'family_controllers/Family/downloads/'.$collected_files ?>" download> <i class="fa fa-download fa-1x"></i> </a>
                                            /
                                            <a href="<?php echo base_url() . 'family_controllers/Family/read_file/'.$collected_files ?>" target="_blank"> <i class="fa fa-eye fa-1x"></i> </a>
                                        <?php }else{  echo'لايوجد ملف مرفق';} ?>


                                    </td>
                                </tr>
                            </table>

                        </div>
                        <div id="menu7" class="tab-pane fade">
                            <?php if(isset($money)&&!empty($money)){?>
                                <?php  $arr_yes_no = array('', 'نعم', 'لا');?>
                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <tbody>

                                <tr>
                                    <td colspan="2"> مصادر الدخل</td>
                                </tr>
                                <?php
                                $affect_arr=array('لا تؤثر','تؤثر');
                                if(!empty($income_sources)){   for($a=0; $a<sizeof($income_sources);$a++){?>
                                <tr>
                                    <td><?php echo$income_sources[$a]->title_setting?> </td>
                                    <td><?php
                                        if(!empty($money[$income_sources[$a]->id_setting])){ echo $money[$income_sources[$a]->id_setting]->value;}
                                        ?>
                                    <?php for ($d=0;$d<sizeof($affect_arr);$d++){
                                        $check ='';
                                        if(isset($money[$income_sources[$a]->id_setting])  && $money[$income_sources[$a]->id_setting]!=''){
                                            if(  $d == $money[$income_sources[$a]->id_setting]->affect){
                                                $check ='checked';
                                            }
                                        }
                                        ?>
                                        <input type="radio" name="affect_income<?php echo $a;?>" disabled   data-validation="required"  <?php echo $check;?> value="<?php echo $d;?>" style="margin-right: 20px;">
                                        <label for=""><?php echo $affect_arr[$d];?></label>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <?php } }?>
                                <tr>
                                    <td colspan="2">  الالتزامات المستهدفة</td>
                                </tr>
                                <?php
                                $affect_arr=array('لا تؤثر','تؤثر');
                                if(!empty($monthly_duties)){   for($s=0; $s<sizeof($monthly_duties);$s++){?>
                                    <tr>
                                        <td><?php echo $monthly_duties[$s]->title_setting?> </td>
                                        <td><?php
                                            if(!empty($money[$monthly_duties[$s]->id_setting])){ echo $money[$monthly_duties[$s]->id_setting]->value;}
                                            ?>
                                            <?php for ($d=0;$d<sizeof($affect_arr);$d++){
                                                $check ='';
                                                if(isset($money[$monthly_duties[$d]->id_setting])  && $money[$monthly_duties[$d]->id_setting]!=''){
                                                    if(  $d == $money[$monthly_duties[$d]->id_setting]->affect){
                                                        $check ='checked';
                                                    }
                                                }
                                                ?>
                                                <input type="radio"  disabled   <?php echo $check;?> value="<?php echo $d;?>" style="margin-right: 20px;">
                                                <label for=""><?php echo $affect_arr[$d];?></label>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } }?>

                                </tbody>
                            </table>
                                <?php
                            }else { ?>

                                <div class="col-lg-12 alert alert-danger" >لا توجد بيانات ماليه</div>
                                <?php
                            }
                            ?>
                        </div>

                        <div id="menu8" class="tab-pane fade">
                            <?php if(isset($result_opinion)){?>
                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <tbody>

                                <tr>
                                    <td >هل الام متواجدة</td>
                                    <td > <?php  if(isset($arr_in) && !empty($arr_in) && $arr_in!= null) {
                                            foreach ($arr_in as $x):
                                                if (isset($result_opinion)) {
                                                    if ($x->id_setting == $result_opinion['is_mother_present']) {
                                                        echo $x->title_setting;
                                                    }
                                                } ?>
                                            <?php endforeach;
                                        }?></td>
                                </tr>
                                <tr>
                                    <td >إنطباع الام عن الزيارة</td>
                                    <td > <?php  if(isset($arr_op) && !empty($arr_op) && $arr_op!= null) {
                                            foreach ($arr_op as $x):
                                                if (isset($result_opinion)) {
                                                    if ($x->id_setting == $result_opinion['mother_impression_visit']) {
                                                        echo $x->title_setting;
                                                    }
                                                } ?>
                                            <?php endforeach;
                                        }?></td>
                                </tr>
                                <tr>
                                    <td >الاهتمام بنظافة المنزل</td>
                                    <td >
                                        <?php for($x=1;$x<sizeof($arr_yes_no);$x++):
                                            $selected='';
                                            if(isset($result_opinion)){
                                                if($x==$result_opinion['home_cleaning']){echo $arr_yes_no[$x];}
                                            }?>
                                        <?php endfor; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td >الاهتمام بنظافة الابناء</td>
                                    <td >
                                        <?php for($x=1;$x<sizeof($arr_yes_no);$x++):
                                            $selected='';
                                            if(isset($result_opinion)){
                                                if($x==$result_opinion['child_cleanliness']){ echo $arr_yes_no[$x];}
                                            }?>
                                        <?php endfor; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td >فئة الاسرة</td>
                                    <td >
                                        <?php  if(isset($arr_type) && !empty($arr_type) && $arr_type!= null) {
                                            foreach ($arr_type as $z):
                                                if (isset($result_opinion)) {
                                                    if ($z->id_setting == $result_opinion['family_type']) {
                                                        echo $z->title_setting;
                                                    }
                                                } ?>
                                            <?php endforeach;
                                        } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td >مرئيات الباحث</td>
                                    <td >
                                        <?php if(isset($result_opinion['videos_researcher'])&& $result_opinion['videos_researcher']!=null)
                                        {echo $result_opinion['videos_researcher'];}?>
                                    </td>
                                </tr>
                                <tr>
                                    <td >مرئيات رئيس قسم شؤون الاسر</td>
                                    <td >
                                        <?php if(isset($result_opinion['video_family_leader'])&& $result_opinion['video_family_leader']!=null)
                                        {echo $result_opinion['video_family_leader'];}?>
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                            <?}else{
                                echo ' <div class="col-lg-12 alert alert-danger" >لم يتم إضاف راى الباحث بعد </div>';
                            }?>
                        </div>

                    </div>
                </div>
            </div>
            <!---------------------------------------------------------------------------------->
        </div>
    </div>
</section>





