
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css" >
    <link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/style.css" >

    <style type="text/css">
        .cover-page {
            min-height: 480px;
        }
        .print_forma{
            border:1px solid ;
            padding: 15px;
        }
        .print_forma table th{
            text-align: right;
        }
        .print_forma table tr th{
            vertical-align: middle;
        }
        .body_forma{
            margin-top: 40px;
        }
        .no-padding{
            padding: 0;
        }
        .heading{
            font-weight: bold;
            text-decoration: underline;
        }
        .print_forma hr{
            border-top: 1px solid #000;
            margin-top: 7px;
            margin-bottom: 7px;
        }

        .myinput.large{
            height:22px;
            width: 22px;
        }

        .myinput.large[type="checkbox"]:before{
            width: 20px;
            height: 20px;
        }
        .myinput.large[type="checkbox"]:after{
            top: -20px;
            width: 16px;
            height: 16px;
        }
        .checkbox-statement span{
            margin-right: 3px;
            position: absolute;
            margin-top: 5px;
        }
        .header p{
            margin: 0;
        }
        .header img{
            height: 90px;
        }
        .no-border{
            border:0 !important;
        }
        .table-devices tr td{
            width: 30%;
            min-height: 20px
        }
        .gray_background{
            background-color: #eee;

        }
        table.th-no-border th,
        table.th-no-border td
        {
            border-top: 0 !important;
        }

        @media all {
            .page-break	{ display: none; }
        }

        @media print {
            .page-break	{ display: block; page-break-before: always; }
        }

    </style>

<div id = "printdiv" >

  <section class="main-body">
        <div class="container">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">
    <div class="col-xs-12">
        <img src="<?php echo base_url();?>asisst/admin_asset/img/11.png" alt="" style="position: absolute; width: 96%; height: 1020px; margin-top: 15px;">
    </div>
    <div class="col-xs-12" style="margin-top: 70px">
        <div class="col-xs-5">
            <h4 class="text-center">المملكة العربية السعودية </h4>
             <h4 class="text-center"> برنامج الأثير لإدارة الجمعيات </h4>
        </div>
    </div>
    <div class="col-xs-12 cover-page" style="margin-top: 250px;">
        <img style="height: 500px;" src="<?php echo base_url();?>asisst/admin_asset/img/logo.png" alt="" class="center-block">
    </div>
    <div class="col-xs-12">
        <div class="col-xs-7"></div>
        <div class="col-xs-5">
            <h4 class="text-center"> توقيع </h4>
         <p>....................</p><br>
        </div>
    </div>
</div>
</section>

    <div class="page-break"></div>
    
    
    
            <?php if ($tables['father'] != '' && $tables['father'] != null && !empty($tables['father'])) {  ?>

     <?php  $arr_yes_no=array('','نعم','لا');
     if ($tables != '' && $tables != null && !empty($tables)) {  ?>
    <div class="header col-xs-12 no-padding">
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>برنامج الأثير لإدارة الجمعيات </p>

        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
                 <p>برنامج الأثير لإدارة الجمعيات </p>
        </div>
    </div>
    <div class="col-xs-12 Title">
        <h5 class="text-center"><br><br> <strong>بيانات الأب</strong></h5><br>
    </div>

    <section class="main-body">
        <div class="container">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">

                    <div class="col-xs-12 no-padding">
                
                        <table class="table table-bordered table-devices">
                            <tbody>
                            <tr>
                                <th class="gray_background"  >رقم السجل المدني للأم</th>
                                <td><?php echo $tables['father']->mother_national_num_fk;?></td>
                                <th class="gray_background"  >الاسم رباعي</th>
                                <td><?php echo $tables['father']->full_name;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >رقم الهوية</th>
                                <td><?php echo $tables['father']->f_national_id;?></td>
                                <th class="gray_background"  >نوع الهوية</th>
                                <td><?php  if(!empty($national_num_type[$tables['father']->f_national_id_type])){ echo $national_num_type[$tables['father']->f_national_id_type];  }?></td>
                            </tr>
                            <tr>
                                <th class="gray_background"> مصدر الهوية</th>
                                <td><?php   if (!empty($id_source[$tables['father']->f_card_source])):
                                        echo $id_source[$tables['father']->f_card_source];endif;?></td>
                                <th class="gray_background"  >تاريخ الميلاد</th>
                                <td><?php echo $tables['father']->f_birth_date;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background"  >تاريخ الميلاد الهجري</th>
                                <td><?php echo $tables['father']->f_birth_date_hijri;?></td>
                                <th class="gray_background" >العمر</th>
                                <td><?php  if($tables['father']->f_birth_date_year >0){ echo date('Y-m-d')-$tables['father']->f_birth_date_year;}else{ echo 0;} ?></td>

                            </tr>
                            <tr>
                                <!--                                osama-->
                                <th class="gray_background" >عدد الذكور</th>
                                <td><?php  if($tables['father']->f_female_num){ echo $tables['father']->f_female_num;} ?></td>
                                <th class="gray_background" >عدد الإناث</th>
                                <td><?php  if($tables['father']->f_child_num){ echo $tables['father']->f_female_num;} ?></td>

                            </tr>
                            <tr>
                                <th class="gray_background" >الجنسية</th>
                                <td><?php  if(!empty($nationality[$tables['father']->f_nationality_id_fk])){ echo $nationality[$tables['father']->f_nationality_id_fk];  }?></td>
                                <th class="gray_background"  >اضافه جنسيه اخري</th>
                                <td> <?php echo $tables['father']->nationality_other;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >  المهنة</th>
                                <td><?php echo $tables['father']->f_job;?> </td>
                                <th class="gray_background"  >سبب الوفاة</th>
                                <td><?php echo $tables['father']->f_death_reason;?> </td>
                            </tr>
                            <tr>
                                <th class="gray_background" >السبب</th>
                                <td><?php echo $tables['father']->f_death_reason_fk;?></td>
                                <th class="gray_background"  >تاريخ الوفاة</th>
                                <td><?php echo $tables['father']->f_death_date;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >عدد الأبناء</th>
                                <td><?php echo $tables['father']->f_child_num;?></td>
                                <th class="gray_background"  >عدد الزوجات</th>
                                <td><?php echo $tables['father']->f_wive_count;?></td>
                            </tr>
                            <tr>

                                <th class="gray_background"  >عدد أفراد الاسرة</th>
                                <td><?php echo $tables['father']->family_members_number;?></td>
                            </tr>


                            </tbody>
                        </table>
                    
                    </div>
                </div>





                <div class="special col-xs-12 ">
                    <br><br>
                    <div class="col-xs-4 text-center">
                        <label> الختم </label><br><br>
                    </div>
                    <div class="col-xs-4 text-center">

                    </div>
                    <div class="col-xs-4 text-center">

                        <label>المدير المالى </label><br><br>
                     <p>....................</p><br>
                    </div>
                    <br><br>
                </div>

            </div>
        </div>
    </section>



    <div class="page-break"></div>
    <?php } ?>
    <!-------------- بيانات الزوجة ---------------->



 <?php if ($tables['mother'] != '' && $tables['mother'] != null && !empty($tables['mother'])) {  ?>
    <div class="header col-xs-12 no-padding">
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
                <p>برنامج الأثير لإدارة الجمعيات </p>
        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
              <p>برنامج الأثير لإدارة الجمعيات </p>
        </div>
    </div>
    <div class="col-xs-12 Title">
        <h5 class="text-center"><br><br> <strong>بيانات الزوجة</strong></h5><br>
    </div>

    <section class="main-body">
        <div class="container">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">

                    <div class="col-xs-12 no-padding">
                       
                        <table class="table table-bordered table-devices">
                            <tbody>
                            <tr>
                                <th class="gray_background"  >رقم السجل المدني للأم</th>
                                <td><?php echo $tables['mother']->mother_national_num_fk;?> </td>
                                <th class="gray_background"  >رقم الهوية</th>
                                <td><?php echo $tables['mother']->m_national_id;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >الاسم الرباعي</th>
                                <td><?php echo $tables['mother']->full_name;?> </td>
                                <th class="gray_background"  >تاريخ الميلاد</th>
                                <td><?php echo $tables['mother']->m_birth_date_hijri;?> </td>
                            </tr>
                            <tr>
                                <th class="gray_background" >العمر</th>
                                <td><?php  if($tables['mother']->m_birth_date_year >0){ echo date('Y-m-d')-$tables['mother']->m_birth_date_year;}else{ echo 0;} ?></td>
                                <th class="gray_background"  >صلة القرابة</th>
                                <td><?php if (!empty($relationships[$tables['mother']->m_relationship])):
                                    echo$relationships[$tables['mother']->m_relationship];
                                    endif;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background"> الحالة الإجتماعية</th>
                                <td><?php echo $tables['mother']->m_marital_status_id_fk;?> </td>
                                <th class="gray_background"  >الجنسية</th>
                                <td><?php  if(!empty($nationality[$tables['mother']->m_nationality])){ echo $nationality[$tables['mother']->m_nationality];  }?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" > جنسيه اخري</th>
                                <td><?php echo $tables['mother']->nationality_other;?> </td>
                                <th class="gray_background"  >السكن</th>
                                <td><?php echo $tables['mother']->m_living_place_id_fk;?> </td>
                            </tr>
                            <tr>
                                <th class="gray_background" > محل سكن</th>
                                <td><?php echo $tables['mother']->m_living_place;?> </td>
                                <th class="gray_background"  >نوع الهوية</th>
                                <td><?php  if(!empty($national_num_type[$tables['mother']->m_national_id_type])){ echo $national_num_type[$tables['mother']->m_national_id_type];  }?></td>
                            </tr>


                            <tr>
                                <th class="gray_background" >الحالة الصحية</th>
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
                                <th class="gray_background"  >
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
                            </tr>

                            <tr>
                                <th class="gray_background" >سبب المرض/الإعاقة</th>
                                <td><?php echo $tables['mother']->dis_reason; ?> </td>
                                <th class="gray_background"  >جهة المتابعة المرض/الإعاقة</th>
                                <td><?php
                                    if (!empty($responses[$tables['mother']->dis_response_status])):
                                        echo$responses[$tables['mother']->dis_response_status];
                                    endif;?> </td>
                            </tr>
                            <tr>
                                <th class="gray_background" >وضع الحالة المرض/الإعاقة</th>
                                <td><?php     if (!empty($diseases_status[$tables['mother']->dis_status])):
                                        echo$diseases_status[$tables['mother']->dis_status];
                                    endif; ?> </td>
                                <th class="gray_background"  >المهارة</th>
                                <td><?php echo $tables['mother']->m_skill_name;?> </td>
                            </tr>
                            <tr>
                                <th class="gray_background"  >الحياة العملية</th>
                                <td><?php
                                    $arr_work =array('','لا يعمل','يعمل');
                                    if(!empty($arr_work[$tables['mother']->m_want_work])){ echo $arr_work[$tables['mother']->m_want_work];  }?></td>
                                <th class="gray_background" > طبيعة الفرد</th>
                                <td><?php  if(!empty($person_type[$tables['mother']->person_type])){ echo $person_type[$tables['mother']->person_type];  }?></td>
                            </tr>

                            <tr>
                                <th class="gray_background" >المهنة</th>
                                <td><?php
                                    if(!empty($job_titles[$tables['mother']->m_job_id_fk])){ echo $job_titles[$tables['mother']->m_job_id_fk];  }?></td>
                               </td>
                                <th class="gray_background"  >الدخل الشهرى</th>
                                <td><?php echo $tables['mother']->m_monthly_income;?> </td>
                            </tr>
                            <tr>
                                <th class="gray_background" >المستوى التعليمى</th>
                                <td><?php echo $tables['mother']->m_education_level_id_fk;?> </td>
                                <th class="gray_background"  >التخصص</th>
                                <td><?php echo $tables['mother']->m_specialization;?> </td>
                            </tr>
                            <tr>
                                <th class="gray_background" >الحالة الدراسية</th>
                                <td><?php echo $tables['mother']->m_education_status_id_fk;?> </td>
                                <th class="gray_background" >ملتحقة بدار نسائية</th>
                                <td><?php  if(!empty($arr_yes_no[$tables['mother']->m_female_house_check])){ echo $arr_yes_no[$tables['mother']->m_female_house_check];  }?></td>
                            </tr>
                            <tr>

                                <th class="gray_background" >إسم الدار </th>
                                <td><?php if (!empty($women_houses[$tables['mother']->m_female_house_id_fk])):
                                          echo $women_houses[$tables['mother']->m_female_house_id_fk];
                                    endif;?> </td>
                                <th class="gray_background" >أداء فريضة الحج</th>
                                <td><?php  if(!empty($arr_yes_no[$tables['mother']->m_hijri])){ echo $arr_yes_no[$tables['mother']->m_hijri];  }?></td>
                            </tr>
                            <tr>

                                <th class="gray_background"  >أداء فريضة العمرة</th>
                                <td><?php  if(!empty($arr_yes_no[$tables['mother']->m_ommra])){ echo $arr_yes_no[$tables['mother']->m_ommra];  }?></td>
                                <th class="gray_background" >رقم الجوال</th>
                                <td><?php echo $tables['mother']->m_mob;?> </td>
                            </tr>
                            <tr>

                                <th class="gray_background"  >رقم جوال أخر</th>
                                <td><?php echo $tables['mother']->m_another_mob;?> </td>

                                <th class="gray_background" >البريد الإلكترونى</th>
                                <td><?php echo $tables['mother']->m_email;?> </td>
                            </tr>
                            <?php if( $tables['mother']->m_account == 1){?>

                                <tr>
                                    <th class="gray_background"  >مسئول الحساب</th>
                                    <td><?php  if(!empty($arr_yes_no[$tables['mother']->m_account])){ echo $arr_yes_no[$tables['mother']->m_account];  }?></td>
                                    <th class="gray_background" >إسم الحساب</th>
                                    <td><?php  if(!empty($banks[$tables['mother']->m_account_id])){ echo $banks[$tables['mother']->m_account_id];  }?></td>
                                </tr>

                            <?php }?>
                            
                            
                            
                            <tr>
                                <th class="gray_background" >القدرة علي العمل</th>
                                <td><?php
                                        if (!empty($arr_yes_no[$tables['mother']->ability_work])){
                                            echo $arr_yes_no[$tables['mother']->ability_work];
                                        } ?> </td>
                                <th class="gray_background"  >نوع العمل</th>
                                <td><?php
                                    if (!empty($works_type[$tables['mother']->work_type_id_fk])){
                                        echo $works_type[$tables['mother']->work_type_id_fk];
                                    } ?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >طبيعة الشخصية</th>
                                <td><?php
                                    if (isset($personal_characters[$tables['mother']->personal_character_id_fk])){
                                        echo $personal_characters[$tables['mother']->personal_character_id_fk];
                                    } ?></td>
                                <th class="gray_background"  >العلاقة بالأسرة</th>
                                <td><?php
                                    if (isset($relations_with_family[$tables['mother']->relation_with_family])){
                                        echo $relations_with_family[$tables['mother']->relation_with_family];
                                    } ?> </td>
                            </tr>


                            <tr>

                                <th class="gray_background"  >  مكفول</th>
                                <td><?php  if(!empty($arr_yes_no[$tables['mother']->guaranteed_m])){ echo $arr_yes_no[$tables['mother']->guaranteed_m];  }?></td>
                                <th class="gray_background" >هاتف العمل</th>
                                <td><?php if(!empty($tables['mother']->m_place_mob)){ echo $tables['mother']->m_place_mob; }?> </td>
                            </tr>
                            <tr>

                                <th class="gray_background"  >  طبيعة الفرد</th>
                                <td><?php  if(!empty($person_type[$tables['mother']->person_type])){ echo $person_type[$tables['mother']->person_type];  }?></td>
                                <th class="gray_background" >التصنيف</th>
                                <?php $categories=array(1=>'ارمله',2=>'يتيم',3=>'مستفيد');?>
                                <td><?php if(!empty($categories[$tables['mother']->categoriey_m])){ echo $categories[$tables['mother']->categoriey_m]; }?> </td>
                            </tr>
                            <tr>


                                <th class="gray_background"  > حاله المستفيد</th>
                                <td><?php  if(!empty($member_status[$tables['mother']->halt_elmostafid_m])){ echo $member_status[$tables['mother']->halt_elmostafid_m];  }?></td>
                                <th class="gray_background" >الجنس</th>
                                <?php $gender_arr=array('','ذكر','أنثى');?>
                                <td><?php if(!empty($gender_arr[$tables['mother']->m_gender])){ echo $gender_arr[$tables['mother']->m_gender]; }?> </td>
                            </tr>
                            
                            
                            
                            </tbody>
                        </table>
                     
                    </div>
                </div>





                <div class="special col-xs-12 ">
                    <br><br>

                    <div class="col-xs-4 text-center">
                        <label> الختم </label><br><br>
                    </div>
                    <div class="col-xs-4 text-center">

                    </div>
                    <div class="col-xs-4 text-center">

                        <label>المدير المالى </label><br><br>
                       <p>....................</p><br>
                    </div>
                    <br><br>

                </div>


            </div>
        </div>
    </section>
  <?php } ?>
    <div class="page-break"></div>
 
          <!-------------- بيانات الوكيل ---------------->



                <?php if ($tables['wakels'] != '' && $tables['wakels'] != null && !empty($tables['wakels'])) {  ?>
                    <div class="header col-xs-12 no-padding">
                        <div class="col-xs-4 text-center">
                            <p>المملكة العربية السعودية</p>
                            <p>برنامج الأثير لإدارة الجمعيات </p>
                        </div>
                        <div class="col-xs-4 text-center">
                            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
                        </div>
                        <div class="col-xs-4 text-center">
                            <p>المملكة العربية السعودية</p>
                            <p>برنامج الأثير لإدارة الجمعيات </p>
                        </div>
                    </div>
                    <div class="col-xs-12 Title">
                        <h5 class="text-center"><br><br> <strong>بيانات الوكيل</strong></h5><br>
                    </div>

                    <section class="main-body">
                        <div class="container">
                            <div class="print_forma no-border col-xs-12 no-padding">
                                <div class="personality">

                                    <div class="col-xs-12 no-padding">

                                        <table class="table table-bordered table-devices">
                                            <tbody>
                                            <tr>
                                                <th class="gray_background"  >رقم السجل المدني للاب</th>
                                                <td><?php if(!empty($tables['father']->f_national_id)){
                                                        echo $tables['father']->f_national_id; }  ?></td>
                                                <th class="gray_background"  >اسم الاب الرباعي</th>
                                                <td><?php if(!empty($tables['father']->full_name)){
                                                        echo $tables['father']->full_name; }  ?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >إسم الوكيل رباعي</th>
                                                <td><?php if(!empty($tables['wakels']->w_name)){
                                                        echo $tables['wakels']->w_name; }  ?> </td>
                                                <th class="gray_background"  >رقم الهوية</th>
                                                <td><?php if(!empty($tables['wakels']->w_national_id)){
                                                        echo $tables['wakels']->w_national_id; }  ?> </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >نوع الهوية</th>
                                                <td><?php if(!empty($national_num_type[$tables['wakels']->w_national_id_type])){ 
                                                        echo $national_num_type[$tables['wakels']->w_national_id_type]; }  ?> </td>
                                                <th class="gray_background" >مصدر الهوية</th>
                                                <td><?php if(!empty($id_source[$tables['wakels']->w_card_source])){
                                                        echo $id_source[$tables['wakels']->w_card_source]; }  ?> </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background"> تاريخ الميلاد هجرى</th>
                                                <td><?php if(!empty($tables['wakels']->w_birth_date_hijri)){
                                                        echo $tables['wakels']->w_birth_date_hijri; }  ?> </td>
                                                <th class="gray_background"  >تاريخ الميلاد</th>
                                                <td><?php if(!empty($tables['wakels']->w_birth_date)){
                                                        echo $tables['wakels']->w_birth_date; }  ?> </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >العمر</th>
                                                <td><?php
                                                    if(!empty($current_year) && !empty($tables['wakels']->w_birth_date_hijri_year)){
                                                        echo $current_year  - $tables['wakels']->w_birth_date_hijri_year;

                                                    } ?></td>
                                                <th class="gray_background"  >الصلة</th>
                                                <td><?php if(!empty($relationships[$tables['wakels']->relationship_id_fk])){
                                                        echo $relationships[$tables['wakels']->relationship_id_fk]; }  ?> </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" > الحالة الإجتماعية</th>
                                                <td><?php if(!empty($marital_status_array[$tables['wakels']->w_marital_status_id_fk])){
                                                        echo $marital_status_array[$tables['wakels']->w_marital_status_id_fk]; }  ?> </td>
                                                <th class="gray_background"  >رقم الجوال</th>
                                                <td><?php if(!empty($tables['wakels']->w_mob)){ echo $tables['wakels']->w_mob; }  ?> </td>
                                            </tr>

                                             <?php $arr_job=array(1=>'يعمل',0=>'لا يعمل'); ?>
                                            <tr>
                                                <th class="gray_background" >الحياة العملية</th>
                                                <td><?php if(!empty($arr_job[$tables['wakels']->w_want_work])){
                                                        echo $arr_job[$tables['wakels']->w_want_work]; }  ?> </td>
                                                <th class="gray_background" >المهنة</th>
                                                <td><?php if(!empty($job_titles[$tables['wakels']->w_job_id_fk])){
                                                        echo $job_titles[$tables['wakels']->w_job_id_fk]; }  ?> </td>
                                            </tr>

                                            <tr>
                                                <th class="gray_background" >إسم جهة العمل </th>
                                                <td><?php if(!empty($tables['wakels']->employer)){
                                                        echo $tables['wakels']->employer; }  ?> </td>
                                                <th class="gray_background"  >مكان العمل</th>
                                                <td><?php if(!empty($tables['wakels']->job_place)){
                                                        echo $tables['wakels']->job_place; }  ?> </td>

                                            </tr>
                                            <tr>
                                                <th class="gray_background" >هاتف العمل</th>
                                                <td><?php if(!empty($tables['wakels']->job_mob)){
                                                        echo $tables['wakels']->job_mob; }  ?> </td>
                                                <th class="gray_background"  >الدخل الشهري</th>
                                                <td><?php echo $tables['wakels']->salary;?> </td>
                                            </tr>
                                            <?php $arr_guaranted=array(1=>'نعم',0=>'لا');?>
                                            <tr>
                                                <th class="gray_background"  >هل يعول</th>
                                                <td><?php if(!empty($arr_guaranted[$tables['wakels']->guaranted])){
                                                        echo $arr_guaranted[$tables['wakels']->guaranted]; }  ?> </td>
                                                <th class="gray_background" >عدد الأفراد</th>
                                                <td><?php if(!empty($tables['wakels']->persons_num)){
                                                        echo $tables['wakels']->persons_num; }  ?> </td>
                                            </tr>
                                     <?php if (!empty($tables['wakels']->w_national_img)){?>
                                            <tr>
                                                <th class="gray_background" >صورة الهوية</th>
                                              <td>  <img src="<?php echo base_url()?>uploads/images/<?php echo $tables['wakels']->w_national_img;?>"
                                                     width="50%"></td>
                                            </tr>
                                     <?php } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>





                                <div class="special col-xs-12 ">
                                    <br><br>

                                    <div class="col-xs-4 text-center">
                                        <label> الختم </label><br><br>
                                    </div>
                                    <div class="col-xs-4 text-center">

                                    </div>
                                    <div class="col-xs-4 text-center">

                                        <label>المدير المالى </label><br><br>
                                        <p>....................</p><br>
                                    </div>
                                    <br><br>

                                </div>


                            </div>
                        </div>
                    </section>
                <?php } ?>
                <div class="page-break"></div>
                <!-------------- بيانات الوكيل ---------------->
 
 
 
 
 
 
    <!-------------- بيانات الأبناء ---------------->
    
    
       <?php if ($tables['f_members'] != '' && $tables['f_members'] != null && !empty($tables['f_members'])) {  ?>
    <div class="header col-xs-12 no-padding">
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
                <p>برنامج الأثير لإدارة الجمعيات </p>
        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>برنامج الأثير لإدارة الجمعيات </p>
        </div>
    </div>
    <div class="col-xs-12 Title">
        <h5 class="text-center"><br><br> <strong>بيانات الأبناء</strong></h5><br>
    </div>

    <section class="main-body">
        <div class="container">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">

                    <div class="col-xs-12 no-padding">
                     
                            <table class="table table-bordered ">
                                <header>
                                    <tr >
                                        <th class="gray_background" >م </th>
                                        <th class="gray_background">الإسم</th>
                                        <th class="gray_background"> إسم الام</th>
                                        <th class="gray_background">رقم الهوية</th>
                                        <th class="gray_background">الجنس </th>
                                        <th class="gray_background">العمر</th>
                                        <th class="gray_background">المهنة </th>
                                        <th class="gray_background">المرحلة </th>
                                        <th class="gray_background">الصف </th>
                                        
                                        
                              

                                    </tr>
                                </header>
                                <tbody>
                                <?php  $x=1; foreach($tables['f_members'] as $row):?>
                                    <tr>
                                        <td><?php echo $x;?></td>
                                        <td><?php echo $row->member_full_name;  ?></td>
                                        <td><?php echo $tables['mother']->full_name;?> </td>
                                        <td><?php echo $row->member_card_num; ?></td>
                                        <td><?php if($row->member_gender ==1){echo 'ذكر';}else{echo 'انثى'; } ?></td>
                                        <td>
                                            <?php $age='';
                                            if($row->member_birth_date_year !='' && $row->member_birth_date_year !=0){
                                                $age=date('Y-m-d')-$row->member_birth_date_year;
                                            }

                                            echo $age." عام";
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if(!empty($job_titles[$row->member_job])){

                                                echo $job_titles[$row->member_job];  }?>
                                        </td>
                                        <td><?php if(!empty($row->stage_name)){echo $row->stage_name;}  ?></td>
                                        <td><?php if(!empty($row->class_name)){echo $row->class_name; } ?></td>
                                    </tr>
                                <?php $x++; endforeach;?>
                                </tbody>
                            </table>
                   
                    </div>



                <div class="special col-xs-12 ">
                    <br><br>

                    <div class="col-xs-4 text-center">
                        <label> الختم </label><br><br>
                    </div>
                    <div class="col-xs-4 text-center">

                    </div>
                    <div class="col-xs-4 text-center">

                        <label>المدير المالى </label><br><br>
                         <p>....................</p><br>
                    </div>
                    <br><br>

                </div>

                
            </div>
        </div>
    </section>

    <div class="page-break"></div>
     <?php } ?>
    <!-------------- بيانات السكن ---------------->
 <?php if ($tables['houses'] != '' && $tables['houses'] != null && !empty($tables['houses'])) {  ?>

    <div class="header col-xs-12 no-padding">
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
                <p>برنامج الأثير لإدارة الجمعيات </p>
        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
                <p>برنامج الأثير لإدارة الجمعيات </p>
        </div>
    </div>
    <div class="col-xs-12 Title">
        <h5 class="text-center"><br><br> <strong>بيانات السكن</strong></h5><br>
    </div>

    <section class="main-body">
        <div class="container">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">

                    <div class="col-xs-12 no-padding">
                       
                        <table class="table table-bordered table-devices">
                            <tbody>
                            <tr>
                                <th class="gray_background"  >رقم حساب فاتورة الكهرباء</th>
                                <td><?php echo $tables['houses']->h_electricity_account;?></td>
                                <th class="gray_background"  >رقم حساب عداد المياه</th>
                                <td><?php echo $tables['houses']->h_water_account;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >المنطقة</th>
                                <td><?php  if(!empty($area[$tables['houses']->h_area_id_fk])){ echo $area[$tables['houses']->h_area_id_fk];  }?></td>
                                <th class="gray_background"  >المدينة</th>
                                <td><?php  if(!empty($city[$tables['houses']->h_city_id_fk])){ echo $city[$tables['houses']->h_city_id_fk];  }?></td>
                            </tr>
                            <tr>
                                <th class="gray_background">الحى</th>
                                <td><?php   echo $tables['houses']->hai_name;  ?></td>

                                <th class="gray_background"  >الشارع</th>
                                <td><?php   echo $tables['houses']->h_street;  ?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >أقرب مدرسة</th>
                                <td><?php   echo $tables['houses']->h_nearest_school;?></td>
                                <th class="gray_background"  >أقرب معلم</th>
                                <td><?php   echo $tables['houses']->h_nearest_teacher;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >أقرب مسجد</th>
                                <td><?php   echo $tables['houses']->h_mosque;?></td>
                                <th class="gray_background"  >نوع السكن</th>
                                <td><?php  if(!empty($arr_type_house[$tables['houses']->h_house_type_id_fk])){ echo $arr_type_house[$tables['houses']->h_house_type_id_fk];  }?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >لون المنزل</th>
                                <td><?php   echo $tables['houses']->h_house_color;?></td>
                                <th class="gray_background"  >اتجاه المنزل</th>
                                <td><?php  if(!empty($arr_direct[$tables['houses']->h_house_direction])){ echo $arr_direct[$tables['houses']->h_house_direction];  }?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >الحالة</th>
                                <td><?php  if(!empty($house_state[$tables['houses']->h_house_status_id_fk])){ echo $house_state[$tables['houses']->h_house_status_id_fk];  }?></td>
                                <th class="gray_background"  >عدد الغرف</th>
                                <td><?php   echo $tables['houses']->h_rooms_account;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >مقترض من البنك العقارى</th>
                                <td><?php   echo $arr_yes_no[$tables['houses']->h_borrow_from_bank];?></td>
                                <th class="gray_background"  >القيمة</th>
                                <td><?php   echo $tables['houses']->h_borrow_remain;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >ملكية السكن</th>
                                <td><?php  if(!empty($house_own[$tables['houses']->h_house_owner_id_fk])){ echo $house_own[$tables['houses']->h_house_owner_id_fk];  }?></td>
                                <th class="gray_background"  >مقدار الإيجار السنوى</th>
                                <td><?php   echo $tables['houses']->h_rent_amount;?></td>
                            </tr>
                            <?php if( $tables['houses']->h_house_owner_id_fk==='rent'){?>
                                <tr>
                                    <th class="gray_background" >إسم المؤجر</th>
                                    <td><?php  echo $tables['houses']->h_renter_name;  ?></td>
                                    <th class="gray_background"  >رقم الجوال</th>
                                    <td><?php   echo $tables['houses']->h_renter_mob;?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >تاريخ بداية العقد</th>
                                    <td><?php  echo $tables['houses']->contract_start_date;  ?></td>
                                    <th class="gray_background"  >تاريخ نهاية العقد</th>
                                    <td><?php   echo $tables['houses']->contract_end_date;?></td>
                                </tr>

                            <?php }?>

                            <tr>
                                <th class="gray_background" >عدد دورات المياه</th>
                                <td><?php echo $tables['houses']->h_bath_rooms_account;?></td>
                                <th class="gray_background"  >مساحة البناء</th>
                                <td><?php echo $tables['houses']->h_house_size;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background" >قرض ترميم من بنك التسليف</th>
                                <td><?php echo $arr_yes_no[$tables['houses']->h_loan_restoration];?></td>
                                <th class="gray_background"  >القيمة المتبقية</th>
                                <td><?php echo $tables['houses']->h_loan_restoration_remain;?></td>
                            </tr>
                            <tr>
                                <th class="gray_background"  >الرقم الصحى</th>
                                <td><?php echo $tables['houses']->h_health_number;?></td>
                            </tr>
                            </tbody>
                        </table>
               
                    </div>
                </div>





                <div class="special col-xs-12 ">
                    <br><br>

                    <div class="col-xs-4 text-center">
                        <label> الختم </label><br><br>
                    </div>
                    <div class="col-xs-4 text-center">

                    </div>
                    <div class="col-xs-4 text-center">

                        <label>المدير المالى </label><br><br>
                       <p>....................</p><br>
                    </div>
                    <br><br>

                </div>






            </div>
        </div>
    </section>
    <div class="page-break"></div>
       <?php } ?>

    <!-------------- بيانات الأجهزة ---------------->
  <?php if ($tables['devices'] != '' && $tables['devices'] != null && !empty($tables['devices'])) {  ?>

    <div class="header col-xs-12 no-padding">
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
               <p>برنامج الأثير لإدارة الجمعيات </p>
        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
               <p>برنامج الأثير لإدارة الجمعيات </p>
        </div>
    </div>
    <div class="col-xs-12 Title">
        <h5 class="text-center"><br><br> <strong> الأجهزة</strong></h5><br>
    </div>

    <section class="main-body">
        <div class="container">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">

                    <div class="col-xs-12 no-padding">
                      
                            <table class="table table-bordered ">
                                <thead>
                                <th class="gray_background">م</th>
                                <th class="gray_background">إسم الجهاز</th>
                                <th class="gray_background">العدد</th>
                                <th class="gray_background">حالة الجهاز</th>
                                <th class="gray_background">ملاحظات</th>
                                </thead>
                                <tbody>
                                <?php
                                $house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;
                                $a=1; foreach($tables['devices']  as $row): ?>
                                    <tr>
                                        <td><?php echo $a;?></td>
                                        <td><?php  if(!empty($all[$row->d_house_device_id_fk]->name)){ echo $all[$row->d_house_device_id_fk]->name;  }?></td>
                                        <td><?php echo $row->d_count?></td>
                                        <td><?php echo $house_device_status[$row->d_house_device_status_id_fk]?></td>
                                        <td><?php echo $row->d_note?></td>
                                    </tr>
                                    <?php $a++; endforeach ?>
                                </tbody>
                            </table>
                    
                    </div>
                </div>





                <div class="special col-xs-12 ">
                    <br><br>

                    <div class="col-xs-4 text-center">
                        <label> الختم </label><br><br>
                    </div>
                    <div class="col-xs-4 text-center">

                    </div>
                    <div class="col-xs-4 text-center">

                        <label>المدير المالى </label><br><br>
                        <p>....................</p><br>
                    </div>
                    <br><br>

                </div>






            </div>
        </div>
    </section>
    <div class="page-break"></div>
    <?php } ?>


                <!-------------- إحتياجات المنزل ---------------->

                <?php if ($tables['home_needs'] != '' && $tables['home_needs'] != null && !empty($tables['home_needs'])) {  ?>

                    <div class="header col-xs-12 no-padding">
                        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
                <p>برنامج الأثير لإدارة الجمعيات </p>
                        </div>
                        <div class="col-xs-4 text-center">
                            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
                        </div>
                        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
               <p>برنامج الأثير لإدارة الجمعيات </p>
                        </div>
                    </div>
                    <div class="col-xs-12 Title">
                        <h5 class="text-center"><br><br> <strong>  ما يحتاجه المنزل</strong></h5><br>
                    </div>

                    <section class="main-body">
                        <div class="container">
                            <div class="print_forma no-border col-xs-12 no-padding">
                                <div class="personality">

                                    <div class="col-xs-12 no-padding">

                                        <table class="table table-bordered ">
                                            <thead>
                                            <th class="gray_background">م</th>
                                            <th class="gray_background">ما يحتاجه المنزل</th>
                                            <th class="gray_background">العدد</th>
                                            <th class="gray_background">ملاحظات</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $a=1;
                                            foreach($tables['home_needs']  as $row): ?>
                                                <tr>
                                                    <td><?php echo $a;?></td>
                                                    <td><?php  if(!empty($all[$row->h_home_device_id_fk]->name)){ echo $all[$row->h_home_device_id_fk]->name;  }?></td>
                                                    <td><?php echo $row->h_count?></td>
                                                    <td><?php echo $row->h_note?></td>
                                                </tr>
                                                <?php $a++; endforeach ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>





                                <div class="special col-xs-12 ">
                                    <br><br>

                                    <div class="col-xs-4 text-center">
                                        <label> الختم </label><br><br>
                                    </div>
                                    <div class="col-xs-4 text-center">

                                    </div>
                                    <div class="col-xs-4 text-center">

                                        <label>المدير المالى </label><br><br>
                                        <p>....................</p><br>
                                    </div>
                                    <br><br>

                                </div>






                            </div>
                        </div>
                    </section>
                    <div class="page-break"></div>
                <?php } ?>



                <!-------------- إحتياجات المنزل ---------------->

    
    
    <!---------------------- بيانات كاليه ---------------->


         <?php if ($tables['family_income_duties'] != '' && $tables['family_income_duties'] != null && !empty($tables['family_income_duties'])) {  ?>


         <div class="header col-xs-12 no-padding">
             <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
                <p>برنامج الأثير لإدارة الجمعيات </p>
             </div>
             <div class="col-xs-4 text-center">
                 <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
             </div>
             <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
             <p>برنامج الأثير لإدارة الجمعيات </p>
            
             </div>
         </div>

         <div class="col-xs-12 Title">
             <h5 class="text-center"><br><br> <strong> البيانات المالية</strong></h5><br>
         </div>



         <section class="main-body">
             <div class="container">
                 <div class="print_forma no-border col-xs-12 no-padding">
                     <div class="personality">

                         <div class="col-xs-12 no-padding">
                                 <?php  if(!empty($income_sources)){?>
                             <div class="col-sm-6 col-xs-12">
                                 <h5 class="title-top"> مصادر الدخل</h5>
                                 <table class="table table-bordered ">
                                     <thead>
                                     <th class="gray_background">م</th>
                                     <th class="gray_background">الإسم</th>
                                     <th class="gray_background">القيمة</th>
                                     <th class="gray_background">الحالة</th>
                                     </thead>
                                     <tbody>
                                     <?php
                                 $affect_arr=array('لا تؤثر','تؤثر');
                                     $d=1;
                                 for($a=0; $a<sizeof($income_sources);$a++){?>
                                         <tr>
                                             <td><?php echo $d;?></td>
                                             <td><?php echo$income_sources[$a]->title_setting?></td>
                                             <td><?php
                                                 if($tables['family_income_duties'][$income_sources[$a]->id_setting] !=''){
                                                     echo $tables['family_income_duties'][$income_sources[$a]->id_setting]->value; }else{ echo 0;}
                                                 ?></td>
                                             <td><?php  if($tables['family_income_duties'][$income_sources[$a]->id_setting] !=''){

                                                     echo$affect_arr[ $tables['family_income_duties'][$income_sources[$a]->id_setting]->affect];  }?></td>
                                         </tr>
                                         <?php $d++; } ?>
                                     </tbody>
                                 </table>

                             </div>
                                 <?php }  ?>
             <?php  if(!empty($monthly_duties)){?>
                             <div class="col-sm-6 col-xs-12">
                                 <h5 class="title-top">  الالتزامات المستهدفة</h5>



                                 <table class="table table-bordered ">
                                     <thead>
                                     <th class="gray_background">م</th>
                                     <th class="gray_background">الإسم</th>
                                     <th class="gray_background">القيمة</th>
                                     <th class="gray_background">الحالة</th>
                                     </thead>
                                     <tbody>
                                     <?php
                                     $affect_arr=array('لا تؤثر','تؤثر');
                                     $d=1;
                                     for($a=0; $a<sizeof($monthly_duties);$a++){?>
                                         <tr>
                                             <td><?php echo $d;?></td>
                                             <td><?php echo$monthly_duties[$a]->title_setting?></td>
                                             <td><?php
                                                 if(!empty($tables['family_income_duties'][$monthly_duties[$a]->id_setting])){
                                                     echo $tables['family_income_duties'][$monthly_duties[$a]->id_setting]->value; }else{
                                                     echo 0;
                                                 }
                                                 ?></td>
                                             <td><?php if( $tables['family_income_duties'][$monthly_duties[$a]->id_setting] !='' ){
                                                 echo $affect_arr[ $tables['family_income_duties'][$monthly_duties[$a]->id_setting]->affect]; }else{ echo 0;} ?></td>
                                         </tr>

                                         <?php $d++; }?>
                                     </tbody>
                                 </table>
                             </div>
                             <?php }  ?>
                         
                         </div>
                     </div>
                     <div class="special col-xs-12 ">
                         <br><br>

                         <div class="col-xs-4 text-center">
                             <label> الختم </label><br><br>
                         </div>
                         <div class="col-xs-4 text-center">

                         </div>
                         <div class="col-xs-4 text-center">

                             <label>المدير المالى </label><br><br>
                            <p>....................</p><br>
                         </div>
                         <br><br>

                     </div>


                 </div>
             </div>
         </section>

<!--
         <section class="main-body">
             <div class="container">
                 <div class="print_forma no-border col-xs-12 no-padding">
                     <div class="personality">

                         <div class="col-xs-12 no-padding">
                                 <?php  if(!empty($income_sources)){?>
                             <div class="col-sm-6 col-xs-12">
                                 <h5 class="title-top"> مصادر الدخل</h5>
                                 <table class="table table-bordered ">
                                     <thead>
                                     <th class="gray_background">م</th>
                                     <th class="gray_background">الإسم</th>
                                     <th class="gray_background">القيمة</th>
                                     <th class="gray_background">الحالة</th>
                                     </thead>
                                     <tbody>
                                     <?php
                                 $affect_arr=array('لا تؤثر','تؤثر');
                                     $d=1;
                                 for($a=0; $a<sizeof($income_sources);$a++){?>
                                         <tr>
                                             <td><?php echo $d;?></td>
                                             <td><?php echo$income_sources[$a]->title_setting?></td>
                                             <td><?php
                                                 if(!empty($tables['family_income_duties'][$income_sources[$a]->id_setting])){ echo $tables['family_income_duties'][$income_sources[$a]->id_setting]->value;}
                                                 ?></td>
                                             <td><?php echo $affect_arr[ $tables['family_income_duties'][$income_sources[$a]->id_setting]->affect];?></td>
                                         </tr>
                                         <?php $d++; } ?>
                                     </tbody>
                                 </table>

                             </div>
                                 <?php }  ?>
             <?php  if(!empty($monthly_duties)){?>
                             <div class="col-sm-6 col-xs-12">
                                 <h5 class="title-top">  الالتزامات المستهدفة</h5>



                                 <table class="table table-bordered ">
                                     <thead>
                                     <th class="gray_background">م</th>
                                     <th class="gray_background">الإسم</th>
                                     <th class="gray_background">القيمة</th>
                                     <th class="gray_background">الحالة</th>
                                     </thead>
                                     <tbody>
                                     <?php
                                     $affect_arr=array('لا تؤثر','تؤثر');
                                     $d=1;
                                     for($a=0; $a<sizeof($monthly_duties);$a++){?>
                                         <tr>
                                             <td><?php echo $d;?></td>
                                             <td><?php echo$monthly_duties[$a]->title_setting?></td>
                                             <td><?php
                                                 if(!empty($tables['family_income_duties'][$monthly_duties[$a]->id_setting])){ echo $tables['family_income_duties'][$monthly_duties[$a]->id_setting]->value;}
                                                 ?></td>
                                             <td><?php echo $affect_arr[ $tables['family_income_duties'][$monthly_duties[$a]->id_setting]->affect];?></td>
                                         </tr>
                                         <?php $d++; } ?>
                                     </tbody>
                                 </table>
                             </div>
                             <?php }  ?>
                         
                         </div>
                     </div>
                     <div class="special col-xs-12 ">
                         <br><br>

                         <div class="col-xs-4 text-center">
                             <label> الختم </label><br><br>
                         </div>
                         <div class="col-xs-4 text-center">

                         </div>
                         <div class="col-xs-4 text-center">

                             <label>المدير المالى </label><br><br>
                            <p>....................</p><br>
                         </div>
                         <br><br>

                     </div>


                 </div>
             </div>
         </section>
         
         -->
         <div class="page-break"></div>
    <?php } ?>
<!-------------------------- المرفقات ------------------------------->



         <div class="header col-xs-12 no-padding">
             <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
               <p>برنامج الأثير لإدارة الجمعيات </p>
             </div>
             <div class="col-xs-4 text-center">
                 <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
             </div>
             <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
             <p>برنامج الأثير لإدارة الجمعيات </p>
             </div>
         </div>
<div class="col-xs-12 Title">
    <h5 class="text-center"><br><br> <strong> الملفات المرفقة</strong></h5><br>
</div>



<section class="main-body">
    <div class="container">
        <div class="print_forma no-border col-xs-12 no-padding">
            <div class="personality">
                <div class="col-xs-12 no-padding">
                                    <table class="table table-bordered table-devices">
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
                      
                      <!--
                        <table class="table table-bordered table-devices">
                            <tr>
                                <th>م </th>
                                <th>إسم الملف </th>
                                <th>حالة الملف </th>
                            </tr>
                            <tr >
                                <td> 1 </td>
                                <td> شهادة الوفاة </td>
                                <td>
                                    <?php if (isset($tables['family_attach_files']->death_certificate) &&  $tables['family_attach_files']->death_certificate !=0 ){
                                       echo' <button type="button" class="btn  m-b-5"><i  class="glyphicon glyphicon-ok"></i></button>';
                                    }else{
                                        echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-remove"></i></button>';

                                    } ?>
                                </td>
                            </tr>
                            <tr >
                                <td>2  </td>
                                <td> كارت العائلة  </td>
                                <td>
                                    <?php if (isset($tables['family_attach_files']->family_card) &&  $tables['family_attach_files']->family_card !=0 ){        echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-ok"></i></button>';}else{                                                  echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-remove"></i></button>'; } ?>
                                </td>
                            </tr>
                            <tr >
                                <td>3  </td>
                                <td> صك حرث الارث  </td>
                                <td>
                                    <?php if (isset($tables['family_attach_files']->plowing_inheritance) &&  $tables['family_attach_files']->plowing_inheritance !=0 ){       echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-ok"></i></button>';}else{                                                  echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-remove"></i></button>'; } ?>
                                </td>
                            </tr>
                            <tr >
                                <td> 4 </td>
                                <td> صك الولاية </td>
                                <td>

                                    <?php if (isset($tables['family_attach_files']->instrument_agency_with_orphans) &&  $tables['family_attach_files']->instrument_agency_with_orphans !=0 ){       echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-ok"></i></button>';}else{                                                  echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-remove"></i></button>'; } ?>

                                </td>
                            </tr>
                            <tr >
                                <td> 5 </td>
                                <td> شهادات الميلاد </td>
                                <td>

                                    <?php if (isset($tables['family_attach_files']->birth_certificate) &&  $tables['family_attach_files']->birth_certificate !=0 ){       echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-ok"></i></button>';}else{                                                  echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-remove"></i></button>'; } ?>
                                </td>
                            </tr>
                            <tr >
                                <td> 6 </td>
                                <td> صك ملكية السكن أو عقد الايجار  </td>

                                <td>

                                    <?php if (isset($tables['family_attach_files']->ownership_housing) &&  $tables['family_attach_files']->ownership_housing !=0 ){       echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-ok"></i></button>'; }else{                                                  echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-remove"></i></button>'; } ?>

                                </td>
                            </tr>
                            <tr >
                                <td> 7 </td>
                                <td> تعريف من المدرسة بجميع الأبناء و البنات </td>
                                <td>

                                    <?php if (isset($tables['family_attach_files']->definition_school) &&  $tables['family_attach_files']->definition_school !=0 ){      echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-ok"></i></button>';}else{                                                  echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-remove"></i></button>'; } ?>


                                </td>
                            </tr>
                            <tr >
                                <td> 8 </td>
                                <td>بطاقة الضمان  الاجتماعى  </td>
                                <td>

                                    <?php if (isset($tables['family_attach_files']->social_security_card) &&  $tables['family_attach_files']->social_security_card !=0 ){      echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-ok"></i></button>';}else{                                                  echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-remove"></i></button>'; } ?>


                                </td>
                            </tr>
                            <tr >
                                <td> 9 </td>
                                <td> الحساب البنكي ( رقم الأيبان ) </td>
                                <td>

                                    <?php if (isset($tables['family_attach_files']->bank_statement) &&  $tables['family_attach_files']->bank_statement !=0 ){       echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-ok"></i></button>';}else{                                                  echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-remove"></i></button>'; } ?>


                                </td>
                            </tr>
                            <tr >
                                <td> 10 </td>
                                <td>رفع جميع المستندات </td>
                                <td>

                                    <?php if (isset($tables['family_attach_files']->collected_files) &&  $tables['family_attach_files']->collected_files !=0 ){       echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-ok"></i></button>';}else{                                                  echo' <button type="button" class="btn  m-b-5"><i class="glyphicon glyphicon-remove"></i></button>'; } ?>


                                </td>
                            </tr>
                        </table>
                        -->
                        
                        
                    <?php //} ?>
                </div>
            </div>
            <div class="special col-xs-12 ">
                <br><br>

                <div class="col-xs-4 text-center">
                    <label> الختم </label><br><br>
                </div>
                <div class="col-xs-4 text-center">

                </div>
                <div class="col-xs-4 text-center">

                    <label>المدير المالى </label><br><br>
                   <p>....................</p><br>
                </div>
                <br><br>

            </div>


        </div>
    </div>
</section>
<div class="page-break"></div>


<!----------------------------------------------------------------------->
                <!-------------------------- بيانات الحساب البنكي   ------------------------------->

                <?php if ($family_bank != '' && $family_bank != null && !empty($family_bank)) { ?>
                    <div class="header col-xs-12 no-padding">
                        <div class="col-xs-4 text-center">
                            <p>المملكة العربية السعودية</p>
                            <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء </p>
                        </div>
                        <div class="col-xs-4 text-center">
                            <img src="<?php echo base_url(); ?>asisst/admin_asset/img/logo.png">
                        </div>
                        <div class="col-xs-4 text-center">
                            <p>المملكة العربية السعودية</p>
                            <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء </p>
                        </div>
                    </div>
                    <div class="col-xs-12 Title">
                        <h5 class="text-center"><br><br> <strong>بيانات الحساب البنكي</strong></h5><br>
                    </div>

                    <section class="main-body">
                        <div class="container">
                            <div class="print_forma no-border col-xs-12 no-padding">
                                <div class="personality">

                                    <div class="col-xs-12 no-padding">

                                        <table class="table table-bordered table-devices">
                                            <tbody>
                                            <tr>
                                                <th class="gray_background">رقم السجل المدني للأب</th>
                                                <td><?php echo $tables['father']->mother_national_num_fk; ?></td>
                                                <th class="gray_background">إسم الأب</th>
                                                <td><?php echo $tables['father']->full_name; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background">مسئول الحساب</th>
                                                <td><?php if (isset($f_members[$family_bank->person_id_fk])) {
                                                        echo $f_members[$family_bank->person_id_fk];
                                                    } ?> </td>
                                                <th class="gray_background">اسم المسئول</th>
                                                <td><?php if (isset($family_bank->person_name)) {
                                                        echo $family_bank->person_name;
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background">الصلة</th>
                                                <td><?php if (isset($relationships[$family_bank->person_relationship])) {
                                                        echo $relationships[$family_bank->person_relationship];
                                                    } ?></td>
                                                <th class="gray_background">رقم الهويه</th>
                                                <td><?php if (isset($family_bank->person_national_card)){echo $family_bank->person_national_card;}?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background"> رقم الجوال</th>
                                                <td><?php if (isset($family_bank->person_mob)) {echo $family_bank->person_mob; } ?> </td>
                                                <th class="gray_background"  >إسم البنك</th>
                                                <td><?php  if(!empty($banks[$family_bank->bank_id_fk])){ echo $banks[$family_bank->bank_id_fk];  }?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background"> رمز البنك</th>
                                                <td><?php if (isset($family_bank->bank_code)) {echo $family_bank->bank_code; } ?> </td>
                                                <th class="gray_background"  >رقم الحساب</th>
                                                <td><?php  if(!empty($banks[$family_bank->bank_account_num])){ echo $banks[$family_bank->bank_account_num];  }?></td>
                                            </tr>


                                            </tbody>
                                        </table>

                                    </div>
                                </div>





                                <div class="special col-xs-12 ">
                                    <br><br>

                                    <div class="col-xs-4 text-center">
                                        <label> الختم </label><br><br>
                                    </div>
                                    <div class="col-xs-4 text-center">

                                    </div>
                                    <div class="col-xs-4 text-center">

                                        <label>المدير المالى </label><br><br>
                                        <p>....................</p><br>
                                    </div>
                                    <br><br>

                                </div>


                            </div>
                        </div>
                    </section>
                <?php } ?>
                <div class="page-break"></div>


                <!----------------------------------------------------------------------->

 <!-------------------------- رأى الباحث  ------------------------------->
        <div class="header col-xs-12 no-padding">
            <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
               <p>برنامج الأثير لإدارة الجمعيات </p>
            </div>
            <div class="col-xs-4 text-center">
                <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
            </div>
            <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
              <p>برنامج الأثير لإدارة الجمعيات </p>
            </div>
        </div>
        <div class="col-xs-12 Title">
            <h5 class="text-center"><br><br> <strong> رأى الباحث </strong></h5><br>
        </div>
        <section class="main-body">
            <div class="container">
                <div class="print_forma no-border col-xs-12 no-padding">
                    <div class="personality">
                        <div class="col-xs-12 no-padding">
                            <?php if ( isset($research_opnion) && $research_opnion != null && !empty($research_opnion)) {  ?>
                                <?php $arr_yes_no=array("",'نعم','لا','الى حد ما');?>
                                <table class="table table-bordered table-devices">
                                    <tbody>
                                    <tr>
                                        <th class="gray_background"  >هل الام متواجدة</th>
                                        <td><?php   if (isset($arr_in[$research_opnion["is_mother_present"]])) { echo  $arr_in[$research_opnion["is_mother_present"]];}?></td>
                                        <th class="gray_background"  >إنطباع الام عن الزيارة</th>
                                        <td><?php   if (isset($arr_op[$research_opnion["mother_impression_visit"]])) { echo  $arr_op[$research_opnion["mother_impression_visit"]];}?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >الاهتمام بنظافة المنزل</th>
                                        <td><?php   if (isset($arr_yes_no[$research_opnion["home_cleaning"]])) { echo  $arr_yes_no[$research_opnion["home_cleaning"]];}?></td>
                                        <th class="gray_background"  >الاهتمام بنظافة الابناء</th>
                                        <td><?php   if (isset($arr_yes_no[$research_opnion["child_cleanliness"]])) { echo  $arr_yes_no[$research_opnion["child_cleanliness"]];}?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background"> فئة الاسرة</th>
                                        <td><?php if (isset($arr_type[$research_opnion["family_type"]])) { echo  $arr_type[$research_opnion["family_type"]];}?></td>
                                        <th class="gray_background"  >مرئيات الباحث</th>
                                        <td><?php   echo $research_opnion["videos_researcher"]?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >مرئيات رئيس قسم شؤون الاسر</th>
                                        <td><?php  echo $research_opnion["video_family_leader"]?></td>
                                        <th class="gray_background"  ></th>
                                        <td> </td>
                                    </tr>

                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="special col-xs-12 ">
                        <br><br>
                        <div class="col-xs-4 text-center">
                            <label> الختم </label><br><br>
                        </div>
                        <div class="col-xs-4 text-center">
                        </div>
                        <div class="col-xs-4 text-center">
                            <label>المدير المالى </label><br><br>
                            <p>....................</p><br>
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
        </section>
        <div class="page-break"></div>
        <!-------------------------- رأى الباحث  ------------------------------->




<!----------------------------------------------------------------------->


    <?php } ?>










</div>


    <script >
        var divElements = document . getElementById("printdiv") . innerHTML;
        var oldPage = document . body . innerHTML;
        document . body . innerHTML =
            "<html><head><title></title></head><body><div id='printdiv'>" +
            divElements + "</div></body>";
        window .print();
        setTimeout(function () {
            window.location.href ="<?php echo base_url('family_controllers/Family/Add_Register_2') ?>";
        }, 5000);
    </script >


