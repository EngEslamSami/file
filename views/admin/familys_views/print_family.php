
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
             <h4 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h4>
             <h4 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h4>
        </div>
    </div>
    <div class="col-xs-12 cover-page" style="margin-top: 250px;">
        <img style="height: 500px;" src="<?php echo base_url();?>uploads/images/<?= $_SESSION['main_data_info']->logo ?>" alt="" class="center-block">
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
            <h4 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h4>
            <h4 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h4>

        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>uploads/images/<?= $_SESSION['main_data_info']->logo ?>">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></p>
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
                            </tr>
                            <tr>
                                <th  >رقم الهوية</th>
                                <td><?php echo $tables['father']->f_national_id;?></td>

                                <th   >نوع الهوية</th>
                                <td><?php  if(!empty($national_num_type[$tables['father']->f_national_id_type])){ echo $national_num_type[$tables['father']->f_national_id_type];  }?></td>
                            </tr>
                            <tr>
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
                            </tr>
                            <tr>

                                <!--                                osama-->
                                <th  >عدد الذكور</th>
                                <td><?php  if($tables['father']->f_female_num){ echo $tables['father']->f_female_num;} ?></td>

                                <th  >عدد الإناث</th>
                                <td><?php  if($tables['father']->f_child_num){ echo $tables['father']->f_female_num;} ?></td>

                            </tr>
                            <tr>
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
                            </tr>
                            <tr>
                                <th  >السبب</th>
                                <td><?php echo $tables['father']->f_death_reason_fk;?></td>

                                <th   >تاريخ الوفاة</th>
                                <td><?php echo $tables['father']->f_death_date;?></td>
                            </tr>
                            <tr>
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
            <h4 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h4>
            <h4 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h4>

        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>uploads/images/<?= $_SESSION['main_data_info']->logo ?>">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></p>
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

                        <table class="table table-bordered table-devices"  style="table-layout: fixed">
                            <tbody>
                            <tr>
                                <th   >رقم السجل المدني للأم</th>
                                <td><?php echo $tables['mother']->mother_national_num_fk;?> </td>
                                <th   >رقم الهوية</th>
                                <td><?php echo $tables['mother']->m_national_id;?></td>
                            </tr>
                            <tr>
                                <th  >الاسم الرباعي</th>
                                <td><?php echo $tables['mother']->full_name;?> </td>

                                <th   >تاريخ الميلاد</th>
                                <td><?php echo $tables['mother']->m_birth_date_hijri;?> </td>
                            </tr>
                            <tr>
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
                            </tr>
                            <tr>
                                <th  > جنسيه اخري</th>
                                <td><?php echo $tables['mother']->nationality_other;?> </td>

                                <th   >السكن</th>
                                <td><?php echo $tables['mother']->m_living_place_id_fk;?> </td>
                            </tr>
                            <tr>
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

                                <th>
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

                                <th  >سبب المرض/الإعاقة</th>
                                <td><?php echo $tables['mother']->dis_reason; ?> </td>

                                <th   >جهة المتابعة المرض/الإعاقة</th>
                                <td><?php
                                    if (!empty($responses[$tables['mother']->dis_response_status])):
                                        echo$responses[$tables['mother']->dis_response_status];
                                    endif;?> </td>
                            </tr>
                            <tr>
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
                            </tr>
                            <tr>
                                <th  >المهنة</th>
                                <td><?php
                                    if(!empty($job_titles[$tables['mother']->m_job_id_fk])){ echo $job_titles[$tables['mother']->m_job_id_fk];  }?>
                                </td>

                                <th   >الدخل الشهرى</th>
                                <td><?php echo $tables['mother']->m_monthly_income;?> </td>
                            </tr>
                            <tr>
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
                            </tr>
                            <tr>
                                <th  >إسم الدار </th>
                                <td><?php if (!empty($women_houses[$tables['mother']->m_female_house_id_fk])):
                                        echo $women_houses[$tables['mother']->m_female_house_id_fk];
                                    endif;?> </td>

                                <th  >أداء فريضة الحج</th>
                                <td><?php  if(!empty($arr_yes_no[$tables['mother']->m_hijri])){ echo $arr_yes_no[$tables['mother']->m_hijri];  }?></td>
                            </tr>
                            <tr>

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
                            </tr>
                            <tr>
                                <th  >القدرة علي العمل</th>
                                <td><?php
                                    if (!empty($arr_yes_no[$tables['mother']->ability_work])){
                                        echo $arr_yes_no[$tables['mother']->ability_work];
                                    } ?> </td>

                                <th   >نوع العمل</th>
                                <td><?php
                                    if (!empty($works_type[$tables['mother']->work_type_id_fk])){
                                        echo $works_type[$tables['mother']->work_type_id_fk];
                                    } ?></td>
                            </tr>
                            <tr>
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
                            </tr>
                            <tr>

                                <th   >  طبيعة الفرد</th>
                                <td><?php  if(!empty($person_type[$tables['mother']->person_type])){ echo $person_type[$tables['mother']->person_type];  }?></td>

                                <th  >التصنيف</th>
                                <?php $categories=array(1=>'ارمله',2=>'يتيم',3=>'مستفيد');?>
                                <td><?php if(!empty($categories[$tables['mother']->categoriey_m])){ echo $categories[$tables['mother']->categoriey_m]; }?> </td>
                            </tr>
                            <tr>

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

                                    <th  >إسم الحساب</th>
                                    <td><?php  if(!empty($banks[$tables['mother']->m_account_id])){ echo $banks[$tables['mother']->m_account_id];  }?></td>
                                </tr>

                            <?php }?>


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
                            <h4 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h4>
                            <h4 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h4>

                        </div>
                        <div class="col-xs-4 text-center">
                            <img src="<?php echo base_url();?>uploads/images/<?= $_SESSION['main_data_info']->logo ?>">
                        </div>
                        <div class="col-xs-4 text-center">
                            <p>المملكة العربية السعودية</p>
                            <p class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></p>
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

                                        <table class="table table-bordered table-devices" style="table-layout: fixed">
                                            <tbody>
                                            <tr>
                                                <th   >رقم السجل المدني للاب</th>
                                                <td><?php if(!empty($tables['father']->f_national_id)){
                                                        echo $tables['father']->f_national_id; }  ?></td>
                                                <th   >اسم الاب الرباعي</th>
                                                <td><?php if(!empty($tables['father']->full_name)){
                                                        echo $tables['father']->full_name; }  ?></td>
                                            </tr>
                                            <tr>
                                                <th  >إسم الوكيل رباعي</th>
                                                <td><?php if(!empty($tables['wakels']->w_name)){
                                                        echo $tables['wakels']->w_name; }  ?> </td>
                                                <th   >رقم الهوية</th>
                                                <td><?php if(!empty($tables['wakels']->w_national_id)){
                                                        echo $tables['wakels']->w_national_id; }  ?> </td>
                                            </tr>
                                            <tr>
                                                <th  >نوع الهوية</th>
                                                <td><?php if(!empty($national_num_type[$tables['wakels']->w_national_id_type])){ 
                                                        echo $national_num_type[$tables['wakels']->w_national_id_type]; }  ?> </td>
                                                <th  >مصدر الهوية</th>
                                                <td><?php if(!empty($id_source[$tables['wakels']->w_card_source])){
                                                        echo $id_source[$tables['wakels']->w_card_source]; }  ?> </td>
                                            </tr>
                                            <tr>
                                                <th > تاريخ الميلاد هجرى</th>
                                                <td><?php if(!empty($tables['wakels']->w_birth_date_hijri)){
                                                        echo $tables['wakels']->w_birth_date_hijri; }  ?> </td>
                                                <th   >تاريخ الميلاد</th>
                                                <td><?php if(!empty($tables['wakels']->w_birth_date)){
                                                        echo $tables['wakels']->w_birth_date; }  ?> </td>
                                            </tr>
                                            <tr>
                                                <th  >العمر</th>
                                                <td><?php
                                                    if(!empty($current_year) && !empty($tables['wakels']->w_birth_date_hijri_year)){
                                                        echo $current_year  - $tables['wakels']->w_birth_date_hijri_year;

                                                    } ?></td>
                                                <th   >الصلة</th>
                                                <td><?php if(!empty($relationships[$tables['wakels']->relationship_id_fk])){
                                                        echo $relationships[$tables['wakels']->relationship_id_fk]; }  ?> </td>
                                            </tr>
                                            <tr>
                                                <th  > الحالة الإجتماعية</th>
                                                <td><?php if(!empty($marital_status_array[$tables['wakels']->w_marital_status_id_fk])){
                                                        echo $marital_status_array[$tables['wakels']->w_marital_status_id_fk]; }  ?> </td>
                                                <th   >رقم الجوال</th>
                                                <td><?php if(!empty($tables['wakels']->w_mob)){ echo $tables['wakels']->w_mob; }  ?> </td>
                                            </tr>

                                             <?php $arr_job=array(1=>'يعمل',0=>'لا يعمل'); ?>
                                            <tr>
                                                <th  >الحياة العملية</th>
                                                <td><?php if(!empty($arr_job[$tables['wakels']->w_want_work])){
                                                        echo $arr_job[$tables['wakels']->w_want_work]; }  ?> </td>
                                                <th  >المهنة</th>
                                                <td><?php if(!empty($job_titles[$tables['wakels']->w_job_id_fk])){
                                                        echo $job_titles[$tables['wakels']->w_job_id_fk]; }  ?> </td>
                                            </tr>

                                            <tr>
                                                <th  >إسم جهة العمل </th>
                                                <td><?php if(!empty($tables['wakels']->employer)){
                                                        echo $tables['wakels']->employer; }  ?> </td>
                                                <th   >مكان العمل</th>
                                                <td><?php if(!empty($tables['wakels']->job_place)){
                                                        echo $tables['wakels']->job_place; }  ?> </td>

                                            </tr>
                                            <tr>
                                                <th  >هاتف العمل</th>
                                                <td><?php if(!empty($tables['wakels']->job_mob)){
                                                        echo $tables['wakels']->job_mob; }  ?> </td>
                                                <th   >الدخل الشهري</th>
                                                <td><?php echo $tables['wakels']->salary;?> </td>
                                            </tr>
                                            <?php $arr_guaranted=array(1=>'نعم',0=>'لا');?>
                                            <tr>
                                                <th   >هل يعول</th>
                                                <td><?php if(!empty($arr_guaranted[$tables['wakels']->guaranted])){
                                                        echo $arr_guaranted[$tables['wakels']->guaranted]; }  ?> </td>
                                                <th  >عدد الأفراد</th>
                                                <td><?php if(!empty($tables['wakels']->persons_num)){
                                                        echo $tables['wakels']->persons_num; }  ?> </td>
                                            </tr>
                                     <?php if (!empty($tables['wakels']->w_national_img)){?>
                                            <tr>
                                                <th  >صورة الهوية</th>
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
            <h4 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h4>
            <h4 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h4>

        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>uploads/images/<?= $_SESSION['main_data_info']->logo ?>">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></p>
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
                                        <th  >م </th>
                                        <th >الإسم</th>
                                        <th > إسم الام</th>
                                        <th >رقم الهوية</th>
                                        <th >الجنس </th>
                                        <th >العمر</th>
                                        <th >المهنة </th>
                                        <th >المرحلة </th>
                                        <th >الصف </th>
                                        
                                        
                              

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
                                                $age=date('Y')-$row->member_birth_date_year;
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
            <h4 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h4>
            <h4 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h4>

        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>uploads/images/<?= $_SESSION['main_data_info']->logo ?>">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></p>
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
                                <th   >رقم حساب فاتورة الكهرباء</th>
                                <td><?php echo $tables['houses']->h_electricity_account;?></td>
                                <th   >رقم حساب عداد المياه</th>
                                <td><?php echo $tables['houses']->h_water_account;?></td>
                            </tr>
                            <tr>
                                <th  >المنطقة</th>
                                <td><?php  if(!empty($area[$tables['houses']->h_area_id_fk])){ echo $area[$tables['houses']->h_area_id_fk];  }?></td>
                                <th   >المدينة</th>
                                <td><?php  if(!empty($city[$tables['houses']->h_city_id_fk])){ echo $city[$tables['houses']->h_city_id_fk];  }?></td>
                            </tr>
                            <tr>
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
                            </tr>
                            <tr>
                                <th  >أقرب مسجد</th>
                                <td><?php   echo $tables['houses']->h_mosque;?></td>
                                <th   >نوع السكن</th>
                                <td><?php  if(!empty($arr_type_house[$tables['houses']->h_house_type_id_fk])){ echo $arr_type_house[$tables['houses']->h_house_type_id_fk];  }?></td>
                            </tr>
                            <tr>
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
                            </tr>
                            <tr>
                                <th  >مقترض من البنك العقارى</th>
                                <td><?php   echo $arr_yes_no[$tables['houses']->h_borrow_from_bank];?></td>
                                <th   >القيمة</th>
                                <td><?php   echo $tables['houses']->h_borrow_remain;?></td>
                            </tr>
                            <tr>
                                <th  >ملكية السكن</th>
                                <td><?php  if(!empty($house_own[$tables['houses']->h_house_owner_id_fk])){ echo $house_own[$tables['houses']->h_house_owner_id_fk];  }?></td>
                                <th   >مقدار الإيجار السنوى</th>
                                <td><?php   echo $tables['houses']->h_rent_amount;?></td>
                            </tr>
                            <?php if( $tables['houses']->h_house_owner_id_fk==='rent'){?>
                                <tr>
                                    <th  >إسم المؤجر</th>
                                    <td><?php  echo $tables['houses']->h_renter_name;  ?></td>
                                    <th   >رقم الجوال</th>
                                    <td><?php   echo $tables['houses']->h_renter_mob;?></td>
                                </tr>
                                <tr>
                                    <th  >تاريخ بداية العقد</th>
                                    <td><?php  echo $tables['houses']->contract_start_date;  ?></td>
                                    <th   >تاريخ نهاية العقد</th>
                                    <td><?php   echo $tables['houses']->contract_end_date;?></td>
                                </tr>

                            <?php }?>

                            <tr>
                                <th  >عدد دورات المياه</th>
                                <td><?php echo $tables['houses']->h_bath_rooms_account;?></td>
                                <th   >مساحة البناء</th>
                                <td><?php echo $tables['houses']->h_house_size;?></td>
                            </tr>
                            <tr>
                                <th  >قرض ترميم من بنك التسليف</th>
                                <td><?php echo $arr_yes_no[$tables['houses']->h_loan_restoration];?></td>
                                <th   >القيمة المتبقية</th>
                                <td><?php echo $tables['houses']->h_loan_restoration_remain;?></td>
                            </tr>
                            <tr>
                                <th   >الرقم الصحى</th>
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
            <h4 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h4>
            <h4 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h4>

        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>uploads/images/<?= $_SESSION['main_data_info']->logo ?>">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></p>
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
                                <th >م</th>
                                <th >إسم الجهاز</th>
                                <th >العدد</th>
                                <th >حالة الجهاز</th>
                                <th >ملاحظات</th>
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
                            <h4 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h4>
                            <h4 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h4>

                        </div>
                        <div class="col-xs-4 text-center">
                            <img src="<?php echo base_url();?>uploads/images/<?= $_SESSION['main_data_info']->logo ?>">
                        </div>
                        <div class="col-xs-4 text-center">
                            <p>المملكة العربية السعودية</p>
                            <p class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></p>
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
                                            <th >م</th>
                                            <th >ما يحتاجه المنزل</th>
                                            <th >العدد</th>
                                            <th >ملاحظات</th>
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
                 <h4 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h4>
                 <h4 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h4>

             </div>
             <div class="col-xs-4 text-center">
                 <img src="<?php echo base_url();?>uploads/images/<?= $_SESSION['main_data_info']->logo ?>">
             </div>
             <div class="col-xs-4 text-center">
                 <p>المملكة العربية السعودية</p>
                 <p class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></p>
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
                                             <td  width="40%" colspan="2"  >   الإجمالي   </td>
                                             <td><?=$total?></td>
                                             <input id="total_fa" type="hidden" value="<?=$total?>">
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
                                             <td  width="40%" colspan="2"  >   الإجمالي  </td>
                                             <td><?=$total1?></td>
                                             <input id="total_fa1" type="hidden" value="<?=$total1?>">

                                             <td></td>

                                         </tr>
                                         </tbody>
                                     </table>
                                 </div>


                                 <div class="clearfix"></div>
                                 <hr />
<!---->
<!--                                 <div class="text-center">-->
<!--                                     <table class="table table-bordereds  "  style="width: 50%; margin: auto;">-->
<!--                                         <tr>-->
<!--                                             <td class="specific_style" style="width: 280px;"> نصيب الفرد  </td>-->
<!--                                             <td class="specific_style_2" style="width: 280px;" id="naseeb" >-->
<!---->
<!--                                             </td>-->
<!---->
<!---->
<!---->
<!--                                         </tr>-->
<!--                                         <tr>-->
<!--                                             <td class="specific_style" style="width: 280px;">فئة الأسرة</td>-->
<!--                                             <td class="specific_style_2" style="width: 280px;" id="f2a">0</td>-->
<!--                                         </tr>-->
<!---->
<!---->
<!--                                     </table>-->
<!--                                 </div>-->
                             <?php } else { ?>
                                 <div class="col-lg-12 alert alert-danger">لا توجد بيانات ماليه</div>
                                 <?php
                             }
                             ?>
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
                                     <th >م</th>
                                     <th >الإسم</th>
                                     <th >القيمة</th>
                                     <th >الحالة</th>
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
                                     <th >م</th>
                                     <th >الإسم</th>
                                     <th >القيمة</th>
                                     <th >الحالة</th>
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
                 <h4 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h4>
                 <h4 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h4>

             </div>
             <div class="col-xs-4 text-center">
                 <img src="<?php echo base_url();?>uploads/images/<?= $_SESSION['main_data_info']->logo ?>">
             </div>
             <div class="col-xs-4 text-center">
                 <p>المملكة العربية السعودية</p>
                 <p class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></p>
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

                    <?php if ($attach_files != '' && $attach_files != null && !empty($attach_files)) {  ?>
                                    <table class="table table-bordered table-devices">
                                        <thead>
                                        <tr>
                                            <th>م </th>
                                            <th>إسم الملف </th>
                                            <th>حالة الملف </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php if(isset($attach_files) && !empty($attach_files)){
                                            $x=1;     foreach ($attach_files as $row){ ?>
                                                <tr>
                                                    <td ><?php echo $x++?></td>
                                                    <td><?php echo $row->title_setting;?> </td>
                                                     <td>تم الرفع</td>
                                                <tr>


                                            <?php } }else{ // end main if ?>
                                            <tr id="frist_one">
                                                <td colspan="3" style="text-align: center;color: red"> لا يوجد مرفقات  </td>
                                            </tr>
                                        <?php } // end main if ?>
                                        </tbody>
                                     </table>
                    <?php } ?>
                      
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

                <?php if ($responsible_account != '' && $responsible_account != null && !empty($responsible_account)) { ?>
                    <div class="header col-xs-12 no-padding">
                        <div class="col-xs-4 text-center">
                            <p>المملكة العربية السعودية</p>
                            <h4 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h4>
                            <h4 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h4>

                        </div>
                        <div class="col-xs-4 text-center">
                            <img src="<?php echo base_url();?>uploads/images/<?= $_SESSION['main_data_info']->logo ?>">
                        </div>
                        <div class="col-xs-4 text-center">
                            <p>المملكة العربية السعودية</p>
                            <p class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></p>
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

                                        <table  class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                                            <header>
                                                <tr class="">
                                                    <th>م</th>
                                                    <th>اسم المسئول الحساب البنكي</th>
                                                    <th>رقم الهويه</th>
                                                    <th> رقم الجوال</th>
                                                    <th>اسم البنك</th>
                                                    <th>رمز البنك</th>
                                                    <th>رقم الحساب</th>

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

                                                <td>
                                                    <span class=" btn btn-success btn-sm " >نشط</span>

                                                </td>


                                                </tr>
                                                <?php $x++; ?>


                                            <? } ?>
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
                        <h4 class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></h4>
                        <h4 class="text-center"> مسجلة برقم :  <?= $_SESSION['main_data_info']->num ?></h4>

                    </div>
                    <div class="col-xs-4 text-center">
                        <img src="<?php echo base_url();?>uploads/images/<?= $_SESSION['main_data_info']->logo ?>">
                    </div>
                    <div class="col-xs-4 text-center">
                        <p>المملكة العربية السعودية</p>
                        <p class="text-center"> جمعية <?= $_SESSION['main_data_info']->name ?></p>
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


