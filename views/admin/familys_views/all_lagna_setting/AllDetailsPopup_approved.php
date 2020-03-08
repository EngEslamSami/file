

<style>
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }

    .pop-text {
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .pop-text1 {
        background-color: #eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .pop-title-text {
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }

    .span-validation {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }

    .astric {
        color: red;
        font-size: 25px;
        position: absolute;
    }



    .dl-horizontal dt {
        text-align: right;
        border-bottom: 1px dotted;
        padding: 3px 0;
        white-space: initial;
    }

    .dl-horizontal dd {
        margin-right: 180px;
        border-bottom: 1px dotted;
    }
    th {
        background-color: #e6eed5;
        color: #333;
    }

    .title-top {
        padding: 8px;
        background-color: #1e65a2;
        color: #fff;
        border-radius: 5px;
        font-size: 18px;
    }
    .specific_style{

        background-color: #658e1a !important;
        color: white;
    }

    .specific_style_2{
        width: 280px;
        background-color: white;
        color: red;
        border: 1px solid #658e1a;
    }



    .nonactive{
        pointer-events: none;
        cursor: not-allowed;
    }
    .nav-tabs>li>a{
            font-size: 13px !important;
    }
    
    thead {
    background-color: #2d2b2b !important;color: white !important;
}
</style>



<?php


if(!empty($_POST['mother_num'])){?>
    <!-------------------------------------------start------------------------------------------->

    <ul class="nav nav-tabs">
        <li class="active"><a href="#father" data-toggle="tab">بيانات الاب</a></li>
        <li><a href="#mother" data-toggle="tab">بيانات الام </a></li>

        <li><a href="#wakeel" data-toggle="tab">بيانات الوكيل </a></li>
        <li><a href="#sons" data-toggle="tab">بيانات أفراد الأسرة </a></li>
        <li><a href="#house" data-toggle="tab">بيانات السكن</a></li>
        <li><a href="#devices" data-toggle="tab">محتويات السكن </a></li>
        <li><a href="#home_needs" data-toggle="tab">إحتياجات الأسرة</a></li>
        <li><a href="#attach_files" data-toggle="tab">رفع الوثائق</a></li>
        <li><a href="#money" data-toggle="tab">مصادر الدخل والإلتزامات</a></li>
        <!-------------------- 774 ----------------------------------->
        <li><a href="#research" data-toggle="tab">رأى الباحث </a></li>


        <li><a href="#bank_account" data-toggle="tab">بيانات الحساب البنكي</a></li>
        <!-------------------- 774 ----------------------------------->
    </ul>


    <!-------------------------------------------end------------------------------------------->

    <div class="tab-content">
        <!------------------------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------------------------>
        <div class="tab-pane fade in active" id="father">
            <div class="panel-body"><br>
                <?php  $arr_yes_no=array('','نعم','لا'); ?>
                <?php if ($tables['father'] != '' && $tables['father'] != null && !empty($tables['father'])) {  ?>
                    <div class="personality">

                        <div class="col-xs-12 no-padding">

                            <table class="table table-bordered table-devices" style="table-layout: fixed">
                                <tbody>
                                <!--                                            <tr>-->
                                <!--                                                <th colspan="6" class="title-top" style="text-align: center">بيانات الاب</th>-->
                                <!--                                            </tr>-->
                                <tr>
                                    <th   >رقم السجل المدني للأم</th>
                                    <td><?php echo $tables['father']->mother_national_num_fk;?></td>
                                    <th   >الاسم رباعي</th>
                                    <td><?php echo $tables['father']->full_name;?></td>

                                    <th  >رقم الهوية</th>
                                    <td><?php echo $tables['father']->f_national_id;?></td>
                                </tr>
                                <tr>
                                    <th   >نوع الهوية</th>
                                    <td><?php  if(!empty($national_num_type[$tables['father']->f_national_id_type])){ echo $national_num_type[$tables['father']->f_national_id_type];  }?></td>

                                    <th > مصدر الهوية</th>
                                    <td><?php   if (!empty($id_source[$tables['father']->f_card_source])):
                                            echo $id_source[$tables['father']->f_card_source];endif;?></td>
                                    <th   >تاريخ الميلاد</th>
                                    <td><?php echo $tables['father']->f_birth_date;?></td>
                                </tr>
                                <tr>
                                    <th   >تاريخ الميلاد الهجري</th>
                                    <td><?php echo $tables['father']->f_birth_date_hijri;?></td>
                                    <th  >العمر</th>
                                    <td><?php  if($tables['father']->f_birth_date_year >0){
                                            echo date('Y')-$tables['father']->f_birth_date_year;
                                        }else{ echo 0;} ?></td>


                                    <!--                                osama-->
                                    <th  >عدد الذكور</th>
                                    <td><?php  if($tables['father']->f_female_num){ echo $tables['father']->f_female_num;} ?></td>
                                </tr>
                                <tr>
                                    <th  >عدد الإناث</th>
                                    <td><?php  if($tables['father']->f_child_num){ echo $tables['father']->f_female_num;} ?></td>


                                    <th  >الجنسية</th>
                                    <td><?php  if(!empty($nationality[$tables['father']->f_nationality_id_fk])){ echo $nationality[$tables['father']->f_nationality_id_fk];  }?></td>
                                    <th   >اضافه جنسيه اخري</th>
                                    <td> <?php echo $tables['father']->nationality_other;?></td>
                                </tr>
                                <tr>
                                    <th  >  المهنة</th>
                                    <td><?php echo $tables['father']->f_job;?> </td>

                                    <th   >سبب الوفاة</th>
                                    <td><?php echo $tables['father']->f_death_reason;?> </td>

                                    <th  >السبب</th>
                                    <td><?php echo $tables['father']->f_death_reason_fk;?></td>
                                </tr>
                                <tr>
                                    <th   >تاريخ الوفاة</th>
                                    <td><?php echo $tables['father']->f_death_date;?></td>

                                    <th  >عدد الأبناء</th>
                                    <td><?php echo $tables['father']->f_child_num;?></td>
                                    <th   >عدد الزوجات</th>
                                    <td><?php echo $tables['father']->f_wive_count;?></td>

                                </tr>
                                <tr>
                                    <th   >عدد أفراد الاسرة</th>
                                    <td><?php echo $tables['father']->family_members_number;?></td>
                                </tr>


                                </tbody>
                            </table>

                        </div>
                    </div>

                <?php } else if ($tables['father'] == '' && $tables['father'] == null) { ?>
                    <div class="col-lg-12 alert alert-danger">لا توجد بيانات للاب</div>
                <?php } ?>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------------------------>
        <div class="tab-pane fade  " id="mother">
            <div class="panel-body"><br>

                <?php if ($tables['mother'] != '' && $tables['mother'] != null && !empty($tables['mother'])) {  ?>

                    <div class="personality">

                        <div class="col-xs-12 no-padding">

                            <table class="table table-bordered table-devices"  style="table-layout: fixed">
                                <tbody>
                                <tr>
                                    <th   >رقم السجل المدني للأم</th>
                                    <td><?php echo $tables['mother']->mother_national_num_fk;?> </td>
                                    <th   >رقم الهوية</th>
                                    <td><?php echo $tables['mother']->m_national_id;?></td>

                                    <th  >الاسم الرباعي</th>
                                    <td><?php echo $tables['mother']->full_name;?> </td>
                                </tr>
                                <tr>
                                    <th   >تاريخ الميلاد</th>
                                    <td><?php echo $tables['mother']->m_birth_date_hijri;?> </td>

                                    <th  >العمر</th>
                                    <td><?php  if($tables['mother']->m_birth_date_year >0){
                                            echo date('Y')-$tables['mother']->m_birth_date_year;}else{ echo 0;} ?></td>
                                    <th   >صلة القرابة</th>
                                    <td><?php if (!empty($relationships[$tables['mother']->m_relationship])):
                                            echo$relationships[$tables['mother']->m_relationship];
                                        endif;?></td>
                                </tr>
                                <tr>
                                    <th > الحالة الإجتماعية</th>
                                    <td><?php echo $tables['mother']->m_marital_status_id_fk;?> </td>
                                    <th   >الجنسية</th>
                                    <td><?php  if(!empty($nationality[$tables['mother']->m_nationality])){ echo $nationality[$tables['mother']->m_nationality];  }?></td>

                                    <th  > جنسيه اخري</th>
                                    <td><?php echo $tables['mother']->nationality_other;?> </td>
                                </tr>
                                <tr>
                                    <th   >السكن</th>
                                    <td><?php echo $tables['mother']->m_living_place_id_fk;?> </td>

                                    <th  > محل سكن</th>
                                    <td><?php echo $tables['mother']->m_living_place;?> </td>
                                    <th   >نوع الهوية</th>
                                    <td><?php  if(!empty($national_num_type[$tables['mother']->m_national_id_type])){ echo $national_num_type[$tables['mother']->m_national_id_type];  }?></td>
                                </tr>


                                <tr>
                                    <th  >الحالة الصحية</th>
                                    <td><?php

                                        if( $tables['mother']->m_health_status_id_fk === 'disease'){
                                            echo'مريض';
                                        }elseif ($tables['mother']->m_health_status_id_fk === 'disability'){
                                            echo'معاق';
                                        }else{
                                            if (!empty($health_status_array[$tables['mother']->m_health_status_id_fk])):
                                                echo$health_status_array[$tables['mother']->m_health_status_id_fk];
                                            endif;
                                        } ?> </td>
                                    <th   >
                                        <?php if($tables['mother']->m_health_status_id_fk === 'disease'){
                                            echo'نوع المرض';
                                        }elseif($tables['mother']->m_health_status_id_fk === 'disability'){
                                            echo'نوع الإعاقة';
                                        }?>
                                    </th>
                                    <td><?php if($tables['mother']->m_health_status_id_fk === 'disease'){

                                            if (!empty($diseases[$tables['mother']->disease_id_fk])):
                                                echo$diseases[$tables['mother']->disease_id_fk];
                                            endif;
                                        }elseif($tables['mother']->m_health_status_id_fk === 'disability'){
                                            if (!empty($diseases[$tables['mother']->disability_id_fk])):
                                                echo$diseases[$tables['mother']->disability_id_fk];
                                            endif;
                                        }?> </td>

                                    <th  >سبب المرض/الإعاقة</th>
                                    <td><?php echo $tables['mother']->dis_reason; ?> </td>
                                </tr>
                                <tr>
                                    <th   >جهة المتابعة المرض/الإعاقة</th>
                                    <td><?php
                                        if (!empty($responses[$tables['mother']->dis_response_status])):
                                            echo$responses[$tables['mother']->dis_response_status];
                                        endif;?> </td>

                                    <th  >وضع الحالة المرض/الإعاقة</th>
                                    <td><?php     if (!empty($diseases_status[$tables['mother']->dis_status])):
                                            echo$diseases_status[$tables['mother']->dis_status];
                                        endif; ?> </td>
                                    <th   >المهارة</th>
                                    <td><?php echo $tables['mother']->m_skill_name;?> </td>
                                </tr>
                                <tr>
                                    <th   >الحياة العملية</th>
                                    <td><?php
                                        $arr_work =array('','لا يعمل','يعمل');
                                        if(!empty($arr_work[$tables['mother']->m_want_work])){ echo $arr_work[$tables['mother']->m_want_work];  }?></td>
                                    <th  > طبيعة الفرد</th>
                                    <td><?php  if(!empty($person_type[$tables['mother']->person_type])){ echo $person_type[$tables['mother']->person_type];  }?></td>

                                    <th  >المهنة</th>
                                    <td><?php
                                        if(!empty($job_titles[$tables['mother']->m_job_id_fk])){ echo $job_titles[$tables['mother']->m_job_id_fk];  }?>
                                    </td>
                                </tr>

                                <tr>
                                    <th   >الدخل الشهرى</th>
                                    <td><?php echo $tables['mother']->m_monthly_income;?> </td>

                                    <th  >المستوى التعليمى</th>
                                    <td><?php echo $tables['mother']->m_education_level_id_fk;?> </td>
                                    <th   >التخصص</th>
                                    <td><?php echo $tables['mother']->m_specialization;?> </td>
                                </tr>
                                <tr>
                                    <th  >الحالة الدراسية</th>
                                    <td><?php echo $tables['mother']->m_education_status_id_fk;?> </td>
                                    <th  >ملتحقة بدار نسائية</th>
                                    <td><?php  if(!empty($arr_yes_no[$tables['mother']->m_female_house_check])){ echo $arr_yes_no[$tables['mother']->m_female_house_check];  }?></td>

                                    <th  >إسم الدار </th>
                                    <td><?php if (!empty($women_houses[$tables['mother']->m_female_house_id_fk])):
                                            echo $women_houses[$tables['mother']->m_female_house_id_fk];
                                        endif;?> </td>
                                </tr>
                                <tr>
                                    <th  >أداء فريضة الحج</th>
                                    <td><?php  if(!empty($arr_yes_no[$tables['mother']->m_hijri])){ echo $arr_yes_no[$tables['mother']->m_hijri];  }?></td>


                                    <th   >أداء فريضة العمرة</th>
                                    <td><?php  if(!empty($arr_yes_no[$tables['mother']->m_ommra])){ echo $arr_yes_no[$tables['mother']->m_ommra];  }?></td>
                                    <th  >رقم الجوال</th>
                                    <td><?php echo $tables['mother']->m_mob;?> </td>
                                </tr>
                                <tr>

                                    <th   >رقم جوال أخر</th>
                                    <td><?php echo $tables['mother']->m_another_mob;?> </td>

                                    <th  >البريد الإلكترونى</th>
                                    <td><?php echo $tables['mother']->m_email;?> </td>

                                    <th  >القدرة علي العمل</th>
                                    <td><?php
                                        if (!empty($arr_yes_no[$tables['mother']->ability_work])){
                                            echo $arr_yes_no[$tables['mother']->ability_work];
                                        } ?> </td>
                                </tr>
                                <tr>
                                    <th   >نوع العمل</th>
                                    <td><?php
                                        if (!empty($works_type[$tables['mother']->work_type_id_fk])){
                                            echo $works_type[$tables['mother']->work_type_id_fk];
                                        } ?></td>

                                    <th  >طبيعة الشخصية</th>
                                    <td><?php
                                        if (isset($personal_characters[$tables['mother']->personal_character_id_fk])){
                                            echo $personal_characters[$tables['mother']->personal_character_id_fk];
                                        } ?></td>
                                    <th   >العلاقة بالأسرة</th>
                                    <td><?php
                                        if (isset($relations_with_family[$tables['mother']->relation_with_family])){
                                            echo $relations_with_family[$tables['mother']->relation_with_family];
                                        } ?> </td>
                                </tr>


                                <tr>

                                    <th   >  مكفول</th>
                                    <td><?php  if(!empty($arr_yes_no[$tables['mother']->guaranteed_m])){ echo $arr_yes_no[$tables['mother']->guaranteed_m];  }?></td>
                                    <th  >هاتف العمل</th>
                                    <td><?php if(!empty($tables['mother']->m_place_mob)){ echo $tables['mother']->m_place_mob; }?> </td>


                                    <th   >  طبيعة الفرد</th>
                                    <td><?php  if(!empty($person_type[$tables['mother']->person_type])){ echo $person_type[$tables['mother']->person_type];  }?></td>
                                </tr>
                                <tr>
                                    <th  >التصنيف</th>
                                    <?php $categories=array(1=>'ارمله',2=>'يتيم',3=>'مستفيد');?>
                                    <td><?php if(!empty($categories[$tables['mother']->categoriey_m])){ echo $categories[$tables['mother']->categoriey_m]; }?> </td>


                                    <th   > حاله المستفيد</th>
                                    <td><?php  if(!empty($member_status[$tables['mother']->halt_elmostafid_m])){ echo $member_status[$tables['mother']->halt_elmostafid_m];  }?></td>
                                    <th  >الجنس</th>
                                    <?php $gender_arr=array('','ذكر','أنثى');?>
                                    <td><?php if(!empty($gender_arr[$tables['mother']->m_gender])){ echo $gender_arr[$tables['mother']->m_gender]; }?> </td>
                                </tr>

                                <?php if( $tables['mother']->m_account == 1){?>
                                    <tr>

                                        <th   >مسئول الحساب</th>
                                        <td><?php  if(!empty($arr_yes_no[$tables['mother']->m_account])){ echo $arr_yes_no[$tables['mother']->m_account];  }?></td>
                                    </tr>
                                    <tr>
                                        <th  >إسم الحساب</th>
                                        <td><?php  if(!empty($banks[$tables['mother']->m_account_id])){ echo $banks[$tables['mother']->m_account_id];  }?></td>
                                    </tr>

                                <?php }?>


                                </tbody>
                            </table>

                        </div>
                    </div>


                <?php } else{ ?>
                    <div class="col-lg-12 alert alert-danger">لا توجد بيانات للام</div>

                <?php }  ?>
            </div>
        </div>

        <!------------------ بيانات الوكيل ------------------------------------->

        <!------------------------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------------------------>
        <div class="tab-pane fade  " id="wakeel">
            <div class="panel-body"><br>
                <?php
                if(isset($wakeel) && $wakeel!=null){
                    $w_name= $wakeel[0]->w_name;
                    $relationship_id_fk=  $wakeel[0]->relationship_id_fk;
                    $w_mob=  $wakeel[0]->w_mob;
                    $w_national_id_type=  $wakeel[0]->w_national_id_type;
                    $w_card_source=  $wakeel[0]->w_card_source;
                    $w_national_id=  $wakeel[0]->w_national_id;
                    $w_birth_date=  $wakeel[0]->w_birth_date;
                    $w_birth_date_hijri=  $wakeel[0]->w_birth_date_hijri;
                    $w_birth_date_hijri_year=  $wakeel[0]->w_birth_date_hijri_year;
                    $w_birth_date_year=  $wakeel[0]->w_birth_date_year;
                    $w_want_work =  $wakeel[0]->w_want_work;
                    $w_job_id_fk =$wakeel[0]->w_job_id_fk;
                    $job_place=  $wakeel[0]->job_place;
                    $employer=$wakeel[0]->employer;
                    $job_mob=  $wakeel[0]->job_mob;
                    $salary=   $wakeel[0]->salary;
                    $guaranted=  $wakeel[0]->guaranted;
                    $persons_num=  $wakeel[0]->persons_num;
                    $w_national_img=  $wakeel[0]->w_national_img;
                    $id = $wakeel[0]->id;
                    $w_marital_status_id_fk = $wakeel[0]->w_marital_status_id_fk;
                }else{

                    $w_name="";
                    $relationship_id_fk="";
                    $w_mob="";
                    $w_national_id_type="";
                    $w_card_source="";
                    $w_national_id="";
                    $w_birth_date="";
                    $w_birth_date_hijri="";
                    $w_birth_date_hijri_year="";
                    $w_birth_date_year="";
                    $w_want_work = '';
                    $w_job_id_fk="";
                    $job_place="";
                    $employer="";
                    $job_mob="";
                    $salary="";
                    $guaranted="";
                    $persons_num="";
                    $w_national_img ='';
                    $w_marital_status_id_fk='';
                    $id = '';
                }
                ?>

                <?php if(!empty($wakeel) && $wakeel == '' && $wakeel == null){ ?>

                    <table class="table table-bordered table-devices" style="table-layout: fixed">
                        <tbody>
                        <tr>
                            <th   >رقم السجل المدني للاب</th>
                            <td><?php if(!empty($father->f_national_id)){ echo $father->f_national_id; }  ?></td>
                            <th   >اسم الاب الرباعي</th>
                            <td><?php if(!empty($father->full_name)){ echo $father->full_name; }  ?></td>

                            <th  >إسم الوكيل رباعي</th>
                            <td><?php echo $w_name;?></td>
                        </tr>
                        <tr>
                            <th   >رقم الهوية</th>
                            <td><?php echo $w_national_id;?></td>

                            <th >نوع الهوية</th>
                            <?php if(isset($national_id_array)) { echo for_each($national_id_array,$w_national_id_type); } else { echo '<td></td>';} ?>
                            <th   >مصدر الهوية</th>
                            <?php  echo for_each($id_source,$w_card_source); ?>

                        </tr>
                        <tr>
                            <th > تاريخ الميلاد هجرى</th>
                            <td><?php if(!empty($w_birth_date_hijri)){ echo $w_birth_date_hijri;} ?></td>

                            <th > تاريخ الميلاد </th>
                            <td><?php if(!empty($w_birth_date)){ echo $w_birth_date;} ?></td>


                            <th > العمر</th>
                            <td>
                                <?php
                                if(!empty($current_year) && !empty($w_birth_date_hijri_year)){
                                    echo $current_year  - $w_birth_date_hijri_year;
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th    >الصلة</th>
                            <?php  echo for_each($relationships,$relationship_id_fk); ?>


                            <th >الحالة الإجتماعية</th>
                            <?php  echo for_each($marital_status_array,$w_marital_status_id_fk); ?>
                            <th   >رقم الجوال</th>
                            <td><?php if(!empty($w_mob)){ echo $w_mob;} ?></td>
                        </tr>
                        <tr>
                            <th >الحياة العملية</th>
                            <?php $arr_job=array(1=>'يعمل',0=>'لا يعمل'); ?>
                            <?php  echo for_for($arr_job,$w_want_work); ?>
                            <th   >المهنة</th>
                            <?php  echo for_each($job_titles,$w_job_id_fk); ?>

                            <th >إسم جهة العمل</th>
                            <td><?php if(!empty($employer)){ echo $employer;} ?></td>
                        </tr>
                        <tr>
                            <th   >مكان العمل</th>
                            <td><?php if(!empty($job_place)){ echo $job_place;} ?></td>

                            <th >هاتف العمل</th>
                            <td><?php if(!empty($job_mob)){ echo $job_mob;} ?></td>
                            <th   >الدخل الشهري</th>
                            <td><?php if(!empty($salary)){ echo $salary;} ?></td>
                        </tr>
                        <tr>
                            <th >هل يعول</th>
                            <?php $arr_guaranted=array(1=>'نعم',0=>'لا'); ?>
                            <?php  echo for_for($arr_guaranted,$guaranted); ?>
                            <th   >عدد الأفراد</th>
                            <td><?php if(!empty($persons_num)){ echo $persons_num;} ?></td>

                            <th >صورة الهوية</th>

                            <td><?php if(!empty($w_national_img)){ ?>
                                    <a href="<?php echo base_url()?>uploads/images/<?php echo $w_national_img;?>" download> <i
                                                class="fa fa-download"></i> </a>
                                    <a href="#" data-toggle="modal" data-target="#myModal-view<?php echo $id;?>"> <i
                                                class="fa fa-eye"></i> </a>


                                    <div class="modal fade" id="myModal-view<?php echo $id;?>" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">صورة الهوية</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?php echo base_url()?>uploads/images/<?php echo $w_national_img;?>"
                                                         width="100%">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php   }else{ echo "لاتوجد صورة مرفقة";} ?></td>

                        </tr>
                        </tbody>
                    </table>


                <?php }else{  ?>

                    <div class="col-lg-12 alert alert-danger">لا توجد بيانات للوكيل</div>
                <?php } ?>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------------------------>

        <!------------------------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------------------------>
        <div class="tab-pane fade" id="sons">
            <div class="panel-body"><br>
                <?php if (isset($member_data) && $member_data != null) { ?>
                    <table class="table table-bordered" style="width:100%;table-layout: fixed">
                        <header>
                            <tr>
                                <th style="width: 25px;">م</th>
                                <th style="width: 17%;">الإسم</th>
                                <th>رقم الهوية</th>
                                <th>الصلة</th>
                                <th>الجنس</th>
                                <th>تاريخ الميلاد هجري</th>
                                <th>العمر</th>
                                <th>التصنيف</th>
                                <th>حالة الفرد</th>
                                <th> السبب</th>
                            </tr>
                        </header>
                        <tbody>
                        <?php
                        $x = 2;
                        foreach ($member_data as $row) { ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $row->member_full_name; ?></td>
                                <td><?php echo $row->member_card_num; ?></td>
                                <td><?php echo $row->relation_name; ?></td>
                                <!--
                            <td><?php if (isset($mothers_data[0]->full_name)) {
                                    echo $mothers_data[0]->full_name;
                                } ?></td>
                           -->
                                <td><?php if ($row->member_gender == 1) {
                                        echo 'ذكر';
                                    } else {
                                        echo 'انثى';
                                    } ?></td>
                                <td><?php echo $row->member_birth_date_hijri; ?></td>
                                <td>
                                    <?php $age = '';
                                    $hijr_uear = explode("/", $row->member_birth_date_hijri);
                                    if (isset($hijr_uear[2])) {
                                        $age = $currnt_higry_year - $hijr_uear[2];
                                    }
                                    echo $age . " عام";
                                    ?>
                                </td>
                                <td><?php //echo $row->halet_member_name;
                                    if ($row->categoriey_member == 1) {
                                        $categoriey_member = 'أرمل ';
                                    } elseif ($row->categoriey_member == 2) {
                                        $categoriey_member = 'يتيم ';
                                    } elseif ($row->categoriey_member == 3) {
                                        $categoriey_member = 'مستفيد ';
                                    } else {
                                        $categoriey_member = 'غير محدد  ';
                                    }
                                    echo $categoriey_member;
                                    ?>
                                </td>
                                <td style="background-color: <?=$row->color?>"> <?php  echo $row->halet_member_name; ?>
                                </td>
                                <td><?php
                                    echo $row->persons_process_reason;
                                    ?> </td>
                            </tr>
                            <?php $x++;
                        } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div class="col-lg-12 alert alert-danger"> لا يوجد أبناء للأسرة</div>
                <?php } ?>
            </div>
        </div>
        <div class="tab-pane fade" id="house">
            <div class="panel-body">

                <?php if ($tables['houses'] != '' && $tables['houses'] != null && !empty($tables['houses'])) {  ?>

                    <table class="table table-bordered table-devices" style="table-layout: fixed">
                        <tbody>
                        <tr>
                            <th   >رقم حساب فاتورة الكهرباء</th>
                            <td><?php echo $tables['houses']->h_electricity_account;?></td>
                            <th   >رقم حساب عداد المياه</th>
                            <td><?php echo $tables['houses']->h_water_account;?></td>

                            <th  >المنطقة</th>
                            <td><?php  if(!empty($area[$tables['houses']->h_area_id_fk])){ echo $area[$tables['houses']->h_area_id_fk];  }?></td>
                        </tr>
                        <tr>
                            <th   >المدينة</th>
                            <td><?php  if(!empty($city[$tables['houses']->h_city_id_fk])){ echo $city[$tables['houses']->h_city_id_fk];  }?></td>

                            <th >الحى</th>
                            <td><?php   echo $tables['houses']->hai_name;  ?></td>

                            <th   >الشارع</th>
                            <td><?php   echo $tables['houses']->h_street;  ?></td>
                        </tr>
                        <tr>
                            <th  >أقرب مدرسة</th>
                            <td><?php   echo $tables['houses']->h_nearest_school;?></td>
                            <th   >أقرب معلم</th>
                            <td><?php   echo $tables['houses']->h_nearest_teacher;?></td>

                            <th  >أقرب مسجد</th>
                            <td><?php   echo $tables['houses']->h_mosque;?></td>
                        </tr>
                        <tr>
                            <th   >نوع السكن</th>
                            <td><?php  if(!empty($arr_type_house[$tables['houses']->h_house_type_id_fk])){ echo $arr_type_house[$tables['houses']->h_house_type_id_fk];  }?></td>

                            <th  >لون المنزل</th>
                            <td><?php   echo $tables['houses']->h_house_color;?></td>
                            <th   >اتجاه المنزل</th>
                            <td><?php  if(!empty($arr_direct[$tables['houses']->h_house_direction])){ echo $arr_direct[$tables['houses']->h_house_direction];  }?></td>
                        </tr>
                        <tr>
                            <th  >الحالة</th>
                            <td><?php  if(!empty($house_state[$tables['houses']->h_house_status_id_fk])){ echo $house_state[$tables['houses']->h_house_status_id_fk];  }?></td>
                            <th   >عدد الغرف</th>
                            <td><?php   echo $tables['houses']->h_rooms_account;?></td>

                            <th  >مقترض من البنك العقارى</th>
                            <td><?php   echo $arr_yes_no[$tables['houses']->h_borrow_from_bank];?></td>
                        </tr>
                        <tr>
                            <th   >القيمة</th>
                            <td><?php   echo $tables['houses']->h_borrow_remain;?></td>

                            <th  >ملكية السكن</th>
                            <td><?php  if(!empty($house_own[$tables['houses']->h_house_owner_id_fk])){ echo $house_own[$tables['houses']->h_house_owner_id_fk];  }?></td>
                            <th   >مقدار الإيجار السنوى</th>
                            <td><?php   echo $tables['houses']->h_rent_amount;?></td>
                        </tr>


                        <tr>
                            <th  >عدد دورات المياه</th>
                            <td><?php echo $tables['houses']->h_bath_rooms_account;?></td>
                            <th   >مساحة البناء</th>
                            <td><?php echo $tables['houses']->h_house_size;?></td>

                            <th  >قرض ترميم من بنك التسليف</th>
                            <td><?php echo $arr_yes_no[$tables['houses']->h_loan_restoration];?></td>
                        </tr>
                        <tr>
                            <th   >القيمة المتبقية</th>
                            <td><?php echo $tables['houses']->h_loan_restoration_remain;?></td>

                            <th   >الرقم الصحى</th>
                            <td><?php echo $tables['houses']->h_health_number;?></td>

                            <?php if( $tables['houses']->h_house_owner_id_fk==='rent'){?>

                            <th  >إسم المؤجر</th>
                            <td><?php  echo $tables['houses']->h_renter_name;  ?></td>
                        </tr>
                        <tr>
                            <th   >رقم الجوال</th>
                            <td><?php   echo $tables['houses']->h_renter_mob;?></td>

                            <th  >تاريخ بداية العقد</th>
                            <td><?php  echo $tables['houses']->contract_start_date;  ?></td>
                            <th   >تاريخ نهاية العقد</th>
                            <td><?php   echo $tables['houses']->contract_end_date;?></td>
                        </tr>

                        <?php }else{ ?>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>


                <?php } else{ ?>
                    <div class="col-lg-12 alert alert-danger">لا توجد بيانات </div>

                <?php }  ?>


            </div>
        </div>
        <div class="tab-pane fade" id="devices">
            <div class="panel-body"><br>
                <?php if (isset($devices) && $devices != null): ?>
                    <table class="table table-bordered" id="tab_logic" style="table-layout: fixed">
                        <thead>
                        <tr class="info">
                            <th>م</th>
                            <th style="text-align: center">النوع</th>
                            <th style="text-align: center">الوصف</th>
                            <th style="text-align: center">العدد</th>
                            <th style="text-align: center">الحالة</th>
                            <th style="text-align: center">ملاحظات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $house_device_status = array('إختر', 'جيد', 'متوسط', 'غير جيد', 'يحتاج');
                        $a = 1;
                        foreach ($devices as $row): ?>
                            <tr>
                                <td><?php echo $a; ?></td>
                                <!-- <td><?php echo $row->title_setting; ?> </td>-->
                                <td><?php echo $row->main_name; ?> </td>
                                <td><?php echo $row->name; ?> </td>
                                <td><?php echo $row->d_count ?></td>
                                <td><?php echo $house_device_status[$row->d_house_device_status_id_fk] ?></td>
                                <td><?php echo $row->d_note ?></td>
                            </tr>
                            <?php $a++; endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="col-lg-12 alert alert-danger"> لاتوجد أجهزة</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="home_needs">
            <div class="panel-body"><br>
                <?php if (isset($home_needs) && $home_needs != null): ?>
                    <table class="table table-bordered" id="tab_logic">
                        <thead>
                        <tr class="info">
                            <th>م</th>
                            <th style="text-align: center">النوع</th>
                            <th style="text-align: center">الوصف</th>
                            <th style="text-align: center">العدد</th>
                            <th style="text-align: center">ملاحظات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $a = 1;
                        foreach ($home_needs as $row): ?>
                            <tr>
                                <td><?php echo $a; ?></td>
                                <td><?php echo $row->main_name; ?> </td>
                                <td><?php echo $row->name; ?> </td>
                                <td><?php echo $row->h_count ?></td>
                                <td><?php echo $row->h_note ?></td>
                            </tr>
                            <?php $a++; endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="col-lg-12 alert alert-danger"> لاتوجد إحتياجات للأسرة</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="attach_files">
            <div class="panel-body"><br>
                <?php if ($tables['family_attach_files'] != '' && isset($tables['family_attach_files'])){ ?>
                    <div class="col-xs-12 no-padding">
                        <table class="table table-bordered table-devices" style="table-layout: fixed">
                            <tr>
                                <th>م </th>
                                <th>إسم الملف </th>
                                <th>حالة الملف </th>
                            </tr>
                            <tr >
                                <td> 1 </td>
                                <td> شهادة الوفاة </td>
                                <td>
                                    <?php if (isset($tables['family_attach_files']->death_certificate) &&
                                        $tables['family_attach_files']->death_certificate !=0 ){
                                        echo' تم الرفع';
                                    }else{
                                        echo'لم يتم الرفع';

                                    } ?>
                                </td>
                            </tr>
                            <tr >
                                <td>2  </td>
                                <td> كارت العائلة  </td>
                                <td>
                                    <?php if (isset($tables['family_attach_files']->family_card) &&
                                        $tables['family_attach_files']->family_card !=0 ){
                                        echo' تم الرفع'; }else{
                                        echo'لم يتم الرفع'; } ?>
                                </td>
                            </tr>
                            <tr >
                                <td>3  </td>
                                <td> صك حرث الارث  </td>
                                <td>
                                    <?php if (isset($tables['family_attach_files']->plowing_inheritance) &&
                                        $tables['family_attach_files']->plowing_inheritance !=0 ){
                                        echo' تم الرفع'; }else{
                                        echo'لم يتم الرفع'; } ?>
                                </td>
                            </tr>
                            <tr >
                                <td> 4 </td>
                                <td> صك الولاية </td>
                                <td>

                                    <?php if (isset($tables['family_attach_files']->instrument_agency_with_orphans) &&
                                        $tables['family_attach_files']->instrument_agency_with_orphans !=0 ){
                                        echo' تم الرفع'; }else{
                                        echo'لم يتم الرفع'; } ?>

                                </td>
                            </tr>
                            <tr >
                                <td> 5 </td>
                                <td> شهادات الميلاد </td>
                                <td>

                                    <?php if (isset($tables['family_attach_files']->birth_certificate) &&
                                        $tables['family_attach_files']->birth_certificate !=0 ){
                                        echo' تم الرفع';  }else{
                                        echo'لم يتم الرفع';  } ?>
                                </td>
                            </tr>
                            <tr >
                                <td> 6 </td>
                                <td> صك ملكية السكن أو عقد الايجار  </td>

                                <td>

                                    <?php if (isset($tables['family_attach_files']->ownership_housing) &&
                                        $tables['family_attach_files']->ownership_housing !=0 ){
                                        echo' تم الرفع'; }else{
                                        echo'لم يتم الرفع';  } ?>

                                </td>
                            </tr>
                            <tr >
                                <td> 7 </td>
                                <td> تعريف من المدرسة بجميع الأبناء و البنات </td>
                                <td>

                                    <?php if (isset($tables['family_attach_files']->definition_school) &&
                                        $tables['family_attach_files']->definition_school !=0 ){
                                        echo' تم الرفع'; }else{
                                        echo'لم يتم الرفع';} ?>


                                </td>
                            </tr>
                            <tr >
                                <td> 8 </td>
                                <td>بطاقة الضمان  الاجتماعى  </td>
                                <td>

                                    <?php if (isset($tables['family_attach_files']->social_security_card) &&
                                        $tables['family_attach_files']->social_security_card !=0 ){
                                        echo' تم الرفع'; }else{
                                        echo'لم يتم الرفع';  } ?>


                                </td>
                            </tr>
                            <tr >
                                <td> 9 </td>
                                <td> الحساب البنكي ( رقم الأيبان ) </td>
                                <td>

                                    <?php if (isset($tables['family_attach_files']->bank_statement) &&
                                        $tables['family_attach_files']->bank_statement !=0 ){
                                        echo' تم الرفع';  }else{
                                        echo'لم يتم الرفع';  } ?>


                                </td>
                            </tr>
                            <tr >
                                <td> 10 </td>
                                <td>رفع جميع المستندات </td>
                                <td>

                                    <?php if (isset($tables['family_attach_files']->collected_files) &&
                                        $tables['family_attach_files']->collected_files !=0 ){
                                        echo' تم الرفع'; }else{
                                        echo'لم يتم الرفع';  } ?>


                                </td>
                            </tr>
                        </table>





                    </div>
                <?php } else { // end main if ?>
                    <div class="alert alert-danger">
                        <strong>لا يوجد ملفات مرفقة !</strong> .
                    </div>
                <?php } // end main if ?>
            </div>
        </div>
        <!------------- بيانات ماليه -------------->
        <div class="tab-pane fade" id="money">
            <div class="panel-body">

                <div class="col-xs-12 no-padding">
                    <?php  if(!empty($income_sources)){?>
                        <div class="col-sm-6 col-xs-12">

                            <table class="table table-bordered ">
                                <thead>
                                <tr>
                                    <td colspan="4" class="title-top">مصادر الدخل</td>
                                </tr>
                                <th >م</th>
                                <th >الإسم</th>
                                <th >القيمة</th>
                                <th >الحالة</th>
                                </thead>
                                <tbody>
                                <?php
                                $affect_arr=array('لا تؤثر','تؤثر');
                                $d=1;
                                $total = 0;
                                for($a=0; $a<sizeof($income_sources);$a++){?>
                                    <tr>
                                        <td><?php echo $d;?></td>
                                        <td><?php echo$income_sources[$a]->title_setting?></td>
                                        <td><?php
                                            if( isset($tables['family_income_duties'][$income_sources[$a]->id_setting])){
                                                echo $tables['family_income_duties'][$income_sources[$a]->id_setting]->value; }else{ echo 0;}
                                            ?></td>
                                        <td><?php  if(isset($tables['family_income_duties'][$income_sources[$a]->id_setting])){

                                                echo$affect_arr[ $tables['family_income_duties'][$income_sources[$a]->id_setting]->affect];  }else{ echo "لا تؤثر";}?></td>
                                    </tr>
                                    <?php $d++; $total += (isset($tables['family_income_duties'][$income_sources[$a]->id_setting]))? $tables['family_income_duties'][$income_sources[$a]->id_setting]->value : 0;
                                } ?>
                                <tr>
                                    <td  width="40%" colspan="2"  >  <label class="label " style="font-size:14px; font-weight: 100;" > الإجمالي  </label> </td>
                                    <td><?=$total?></td>
                                    <input id="all_income_values" type="hidden" value="<?=$total?>">
                                    <td></td>

                                </tr>
                                </tbody>
                            </table>

                        </div>

                    <?php }  ?>
                    <?php  if(!empty($monthly_duties)){ ?>
                        <div class="col-sm-6 col-xs-12">

                            <table class="table table-bordered ">
                                <thead>
                                <tr>
                                    <td colspan="4" class="title-top">الالتزامات المستهدفة</td>
                                </tr>
                                <th >م</th>
                                <th >الإسم</th>
                                <th >القيمة</th>
                                <th >الحالة</th>
                                </thead>
                                <tbody>
                                <?php
                                $affect_arr=array('لا تؤثر','تؤثر');
                                $d=1;
                                $total1 = 0;
                                for($a=0; $a<sizeof($monthly_duties);$a++){?>
                                    <tr>
                                        <td><?php echo $d;?></td>
                                        <td><?php echo$monthly_duties[$a]->title_setting?></td>
                                        <td><?php
                                            if(isset($tables['family_income_duties'][$monthly_duties[$a]->id_setting])){
                                                echo $tables['family_income_duties'][$monthly_duties[$a]->id_setting]->value; }else{
                                                echo "0";
                                            }
                                            ?></td>
                                        <td><?php if( isset($tables['family_income_duties'][$monthly_duties[$a]->id_setting])){
                                                echo $affect_arr[ $tables['family_income_duties'][$monthly_duties[$a]->id_setting]->affect]; }else{ echo "لا تؤثر";} ?></td>
                                    </tr>


                                    <?php $d++; $total1 += (isset($tables['family_income_duties'][$monthly_duties[$a]->id_setting]))? $tables['family_income_duties'][$monthly_duties[$a]->id_setting]->value : 0; }?>
                                <tr>
                                    <td  width="40%" colspan="2"  >  <label class="label " style="font-size:14px; font-weight: 100;" > الإجمالي  </label> </td>
                                    <td><?=$total1?></td>
                                    <input id="all_duty_values" type="hidden" value="<?=$total1?>">

                                    <td></td>

                                </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="clearfix"></div>
                        <hr />

                        <div class="text-center">
                            <table class="table table-bordereds  "  style="width: 50%; margin: auto;">
                                <tr>
                                    <td class="specific_style" style="width: 280px;"> نصيب الفرد  </td>
                                    <td class="specific_style_2" style="width: 280px;" id="naseeb" >

                                    </td>



                                </tr>
                                <tr>
                                    <td class="specific_style" style="width: 280px;">فئة الأسرة</td>
                                    <td class="specific_style_2" style="width: 280px;" id="f2a">0</td>
                                </tr>


                            </table>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-12 alert alert-danger">لا توجد بيانات ماليه</div>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>
        <!---------------- نهاية البيانات المالية ---------->
        <!-------------------- راي الباحث ----------------------------------->
        <div class="tab-pane fade" id="research">
            <div class="panel-body">
                <br>
                <?php
                function for_each($array,$res)
                {
                    if (isset($array) && $array != null && !empty($array)) {
                        foreach ($array as $row) {
                            if ($row->id_setting == $res) {
                                return '<td>' . $row->title_setting . '</td>';
                            }else{
                                return '<td></td>';
                            }
                        }
                    }else{
                        return '<td>لا يوجد بيانات مضافة </td>';
                    }
                }
                function for_each_cat($array,$res)
                {
                    if (isset($array) && $array != null && !empty($array)) {
                        foreach ($array as $row) {
                            if ($row->id == $res) {
                                return '<td>' . $row->title . '</td>';
                            }else{
                                return '<td></td>';
                            }
                        }
                    }else{
                        return '<td>لا يوجد بيانات مضافة </td>';
                    }
                }

                function for_for($array,$res){
                    for ($r = 1; $r < sizeof($array); $r++) {

                        if ($r == $res) {
                            return '<td>' . $array[$r] . '</td>';
                        }
                    }
                    return '<td></td>';

                }



                $arr_yes_no = array('', 'نعم', 'لا', 'الي حد ما');
                ?>
                <div class="personality">

                    <div class="col-xs-12 no-padding">

                        <table class="table table-bordered table-devices" style="table-layout: fixed">
                            <tbody>
                            <tr>
                                <th   >إسم الام</th>
                                <td><?php echo $mother_data['full_name'];?></td>
                                <th   >رقم السجل المدنى</th>
                                <td><?php echo $mother_national_num;?></td>
                            </tr>
                            <tr>
                                <th  >هل الام متواجدة</th>

                                <?php if(isset($result_opinion)){ echo for_for($arr_in,$result_opinion['is_mother_present']) ;} else { echo '<td></td>';} ?>

                                <th   >إنطباع الام عن الزيارة</th>
                                <?php if(isset($result_opinion)) { echo for_each($arr_op,$result_opinion['mother_impression_visit']);} else { echo '<td></td>';} ?>
                            </tr>
                            <tr>
                                <th > الاهتمام بنظافة المنزل</th>
                                <?php if(isset($result_opinion)) { echo for_for($arr_yes_no,$result_opinion['home_cleaning']); } else { echo '<td></td>';} ?>
                                <th   >الاهتمام بنظافة الابناء</th>
                                <?php if(isset($result_opinion)) { echo for_for($arr_yes_no,$result_opinion['child_cleanliness']); } else { echo '<td></td>';} ?>

                            </tr>
                            <tr>
                                <th > فئة الاسرة</th>
                                <?php  for_each_cat($all_cat,$family_new_cat[0]->category->id); ?>

                                <?php if (isset($all_cat) && !empty($all_cat) && $all_cat != null){
                                    $xx = 0;
                                    foreach ($all_cat as $z){
                                        if ($z->id == $family_new_cat[0]->category->id) { ?>
                                            <td><?php echo $z->title; ?></td>
                                        <?php }$xx++; }} ?>
                                <?php
                                $one_have = 0;
                                $one_have = (($family_new_cat[0]->all_mother_income - $family_new_cat[0]->all_mother_masrof) / ($family_new_cat[0]->member_num + 1));
                                ?>
                                <th   >نصيب الفرد</th>
                                <td><?php echo $one_have; ?></td>
                            </tr>
                            <tr>
                                <th rowspan="2" > مرئيات الباحث</th>
                                <td rowspan="2">
                                    <?php if (isset($result_opinion['videos_researcher']) && $result_opinion['videos_researcher'] != null) {
                                        echo $result_opinion['videos_researcher'];
                                    } ?>
                                </td>
                                <th rowspan="2"   >مرئيات رئيس قسم شؤون الاسر</th>
                                <td rowspan="2">
                                    <?php if (isset($result_opinion['video_family_leader']) && $result_opinion['video_family_leader'] != null) {
                                        echo $result_opinion['video_family_leader'];
                                    } ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>



            </div>
        </div>
        <!-------------------- 774 ----------------------------------->
        <!-------------------- بيانات الحساب البنكي ----------------------------------->

        <div class="tab-pane fade" id="bank_account">
            <div class="panel-body"><br>
                <?php if (isset($responsible_account) && $responsible_account != null) { ?>
                    <table  class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                        <header>
                            <tr class="visible-md visible-lg">
                                <th>م</th>
                                <th>اسم المسئول الحساب البنكي</th>
                                <th>رقم الهويه</th>
                                <th> رقم الجوال</th>
                                <th>اسم البنك</th>
                                <th>رمز البنك</th>
                                <th>رقم الحساب</th>
                                <th>صورة الحساب</th>
                                <th>حاله الحساب</th>

                            </tr>
                        </header>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($responsible_account as $row) { ?>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $row->person; ?></td>
                            <td><?php echo $row->person_national_card; ?></td>
                            <td><?php echo $row->person_mob; ?></td>
                            <td><?php echo $row->bank_name; ?></td>
                            <td><?php echo $row->bank_code; ?></td>
                            <td> <?php echo $row->bank_account_num; ?> </td>
                            <?php if (!empty($row->bank_image)) {
                                $img_url = "uploads/images/" . $row->bank_image;
                            } else {
                                $img_url = "asisst/web_asset/img/logo.png";
                            } ?>
                            <td><a data-toggle="modal" type="button" style="cursor: pointer"
                                   data-target="#modal-img"
                                   onclick="$('#my_image').attr('src','<?php echo base_url() . $img_url ?>');">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <button class=" btn btn-success btn-sm " value="<?php echo $row->active; ?>">نشط</button>

                            </td>


                            </tr>
                            <?php $x++; ?>
                            <div class="modal fade" id="modal-img" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <img id="my_image" src="" width="100%" height="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" style="float: left"
                                                    data-dismiss="modal">إغلاق
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                        </tbody>
                    </table>

                <?php } else { ?>
                    <div class="col-lg-12 alert alert-danger"> لا يوجد أبناء للأسرة</div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-------------------------------------------end------------------------------------------->
    <input type="hidden" name="procedure_id_fk" id="procedure_id_fk" value="<?php echo $transformation_lagna->procedure_id_fk;?>">
    <input type="hidden" name="mother_national_num" id="mother_national_num" value="<?php echo $transformation_lagna->mother_national_num;?>">
    <input type="hidden" id="session_num_fk" name="session_num_fk" value="<?=$last_lagna_desision->session_num_fk?>">

    <?php

    if($_POST['type'] ==1){ ?>
        <?php
        $id =$transformation_lagna->id;
        $aproved =$transformation_lagna->approved_lagna;
        ?>

        <hr width="100%" style="margin: 0; border-color: #000">
        <div class="modal-footer" style="display: inline-block;width: 100%">
            <div class="detail" <?php if($aproved==1||$aproved==2) {?> style="display: none;" <?php }?>>
                <!--<div class="form-group col-sm-3 col-xs-12 " style="display: ">
                    <label class="pull-left">من فضلك اذكر السبب  </label>
                    <textarea class="form-control txt"> </textarea>
                </div> -->
              
                  <div class="form-group col-sm-3 col-xs-12">
                    <label class=" pull-left">طبيعة المحور </label>
                    <select class="form-control  <?php if(!empty($last_lagna_desision->transfer_type_id_fk)){ echo'nonactive';}?>" data-validation="required"
                      aria-required="true" tabindex="-1" aria-hidden="true" name="type" id="main_type_id"
                      onchange="get_sub_typies(this.value);">
                        <option value="" >اختر </option>
                      <?php
                       $arr=array(1=>' الأسر',2=>' الأفراد');
                      foreach($arr as $key=>$value){?>
                     <option value="<?php echo $key;?>"

                     <?php if(!empty($last_lagna_desision->transfer_type_id_fk)){

                           if($last_lagna_desision->transfer_type_id_fk == $key){

                               echo 'selected';
                           }
                     }?>
                     ><?php echo $value;?></option>
                      <?php } ?>

                    </select>
                </div>


        <?php   $style='visibility: visible'; if(!empty($last_lagna_desision->transfer_type_id_fk)){ if($last_lagna_desision->transfer_type_id_fk ==2){ $style='visibility: hidden';}   } ?>
                
                     <div class="form-group col-sm-3 col-xs-12 " style="<?=$style?>">
                    <label class="pull-left">حالة الملف </label>
                    
                    <select class="form-control condition" name="">
                        <option value="0">اختر</option>
                        <?php if (isset($file_status) && $file_status != null && !empty($file_status)){
                            foreach ($file_status as $row){ ?>
                                <option
                                    value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>


                <div class="form-group col-sm-3 col-xs-12 " style="<?=$style?>">
                    <label class="pull-left">سبب الإجراء </label>
                    <select class="form-control txt2 " name="" id="option_lagna_desiton">

                        <?php if(!empty($all_procedures)){ ?>
                            <option value="">إختر </option>

                            <?php foreach ( $all_procedures  as $row){ ?>
                            <option value="<?=$row->id?>"><?=$row->title?></option>
                        <?php } }else{ ?>

                        <option value="">إختر طبيعة المحور أولا</option>
            <?php } ?>
                    </select>
                </div>

                <?php
                if(!empty($last_lagna_desision->transfer_type_id_fk)){

                    if($last_lagna_desision->transfer_type_id_fk ==2){

                        if(!empty($last_lagna_desision->lagna_members)){
                        ?>
                        <table class="table table-bordered" style="width:100%">
                            <tbody><tr>
                                <th style="text-align: center">م</th>
                                <th style="text-align: center">الإسم</th>
                                <th style="text-align: center">حالة الملف</th>
                                <th style="text-align: center">سبب الإجراء</th>
                                طبيعة التحويل
                            </tr>

                            </tbody>
                            <?php $x=1; foreach ($last_lagna_desision->lagna_members as $record){ ?>
        <tr>
            <td style="text-align: center"><?=$x;?></td>
            <td style="text-align: center"><?=$record->member_name?></td>
            <td style="text-align: center"><select class="form-control halet_file" name="halet_file[]">
                    <option value="0">اختر</option>
                    <?php if (isset($file_status) && $file_status != null && !empty($file_status)){
                        foreach ($file_status as $row){ ?>
                            <option
                                    value="<?php echo $row->id; ?>-<?=$row->title?>"><?php echo $row->title; ?></option>
                        <?php }
                    } ?>
                </select></td>
            <td style="text-align: center">
                <select class="form-control procedure " name="procedure[]" >
                    <option value="">إختر</option>
                    <?php if(!empty($all_procedures)){ 
                          foreach ( $all_procedures  as $row){ ?>
                        <option value="<?=$row->id?>-<?=$row->title?>"><?=$row->title?></option>
        <?php } } ?>
                </select></td>
        </tr>
                                <input type="hidden" class="ids" name="ids[]" value="<?=$record->person_id_fk?>">
                                <?php $x++;} ?>
                            </tbody>
                        </table>
                    <?php } } } ?>
                <div class="form-group col-sm-4 col-xs-12" style="margin-top: 25px;">
                    <button type="button" class="btn btn-success accept pull-left" value="1"  row="<?=$id?>"onclick="change_aproved($(this).val(),$(this).attr('row'));">الموافقه </button>
                    <button type="button" class="btn btn-danger notaccept pull-left" value="2"  row="<?=$id?>"  onclick="change_aproved($(this).val(),$(this).attr('row'));">الرفض</button>
                </div>
            </div>
            <?php if(($aproved==1)){?>
                <div class="accept1">
                    <div class="col-xs-9 text-center  alert-success" style="padding: 9px;"> تمت الموافقه علي الطلب</div>
                    <div class="col-xs-3 text-center  " style="padding: 4px; padding-left: 10px;">
                        <button type="button" class="btn btn-danger notaccept pull-left back2" style="padding-right: 10px;" onclick="change_accept();">
                            تراجع عن الموافقه
                        </button>
                    </div>
                </div>
            <?php } ?>
            <?php if(($aproved==2)){?>
                <div class="accept2">
                    <div class="col-xs-9 text-center  alert-danger" style="padding: 9px;">    تم رفض الطلب</div>
                    <div class="col-xs-3 text-center  " style="padding: 4px; padding-left: 10px;">
                        <button type="button" class="btn btn-danger notaccept pull-left back1" style="padding-right: 10px;" onclick="change_not_accept();">
                            تراجع عن الرفض
                        </button>
                    </div>
                </div>
            <?php } ?>

        </div>
    <?php }elseif($_POST['type'] ==2){ ?>
        <div class="modal-footer" style="display: inline-block;width: 100%">
            <button type="button" style="float:left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
        </div>
    <?php } } ?>
    
   
   
   



 

