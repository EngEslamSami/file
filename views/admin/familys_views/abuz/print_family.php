
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
            <h4 class="text-center">الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </h4>
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
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
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
                                <td><?php echo $tables['father']->f_national_id_place;?></td>
                                <th class="gray_background"  >تاريخ الميلاد</th>
                                <td><?php echo $tables['father']->f_birth_date;?></td>
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
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
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
                                <td><?php echo $tables['mother']->m_health_status_id_fk;?> </td>
                                <th class="gray_background"  >المهارة</th>
                                <td><?php echo $tables['mother']->m_skill_name;?> </td>
                            </tr>
                            <tr>
                                <th class="gray_background" >المهنة</th>
                                <td><?php echo $tables['mother']->m_job_id_fk;?> </td>
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
                                <td><?php echo $tables['mother']->m_female_house_name;?> </td>
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
                            <tr>
                                <th class="gray_background"  >ترغب فى العمل</th>
                                <td><?php  if(!empty($arr_yes_no[$tables['mother']->m_want_work])){ echo $arr_yes_no[$tables['mother']->m_want_work];  }?></td>
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
 
    <!-------------- بيانات الأبناء ---------------->
    
    
       <?php if ($tables['f_members'] != '' && $tables['f_members'] != null && !empty($tables['f_members'])) {  ?>
    <div class="header col-xs-12 no-padding">
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
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
                                            if($row->member_birth_date_year !='' && $row->member_birth_date_year !=0){$age=$cuttent_higry_year-$row->member_birth_date_year;}
                                            $age=$cuttent_higry_year-$row->member_birth_date_year;
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
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
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
                                <th class="gray_background"  >الرقم الصحى</th>
                                <td><?php echo $tables['houses']->h_health_number;?></td>
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
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
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
                                        <td><?php  if(!empty($devices[$row->d_house_device_id_fk])){ echo $devices[$row->d_house_device_id_fk];  }?></td>
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
    
    
    <!---------------------- بيانات كاليه ---------------->


         <?php if ($tables['financial'] != '' && $tables['financial'] != null && !empty($tables['financial'])) {  ?>


         <div class="header col-xs-12 no-padding">
             <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
             </div>
             <div class="col-xs-4 text-center">
                 <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
             </div>
             <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
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
                          
                                 <table class="table table-bordered table-devices">
                                     <tbody>
                                     <tr>
                                         <th class="gray_background"  >مبلغ التقاعد</th>
                                         <td><?php echo $tables['financial']->f_pension_amount;?></td>
                                         <th class="gray_background"  >مبلغ الضمان</th>
                                         <td><?php echo $tables['financial']->f_warranty_amount;?></td>
                                     </tr>
                                     <tr>
                                         <th class="gray_background">مقدار العادة السنوية</th>
                                         <td><?php   echo $tables['financial']->f_annual_amount;  ?></td>

                                         <th class="gray_background"  >مبلغ التأمينات</th>
                                         <td><?php   echo $tables['financial']->f_insurance_amount;  ?></td>
                                     </tr>
                                     <tr>
                                         <th class="gray_background" >عمالة</th>
                                         <td><?php   echo $arr_yes_no[$tables['financial']->f_workers_id_fk];?></td>
                                         <th class="gray_background"  >عدد العمال</th>
                                         <td><?php   echo $tables['financial']->f_workers_num;?></td>
                                     </tr>
                                     <tr>
                                         <th class="gray_background" >مبالغ أخرى</th>
                                         <td><?php   echo $tables['financial']->f_other_amount;?></td>
                                         <th class="gray_background"  >إسم البنك</th>
                                         <td><?php  if(!empty($banks[$tables['financial']->f_bank_id_fk])){ echo $banks[$tables['financial']->f_bank_id_fk];  }?></td>
                                     </tr>
                                     <tr>
                                         <th class="gray_background" >الإسم المعتمد للحساب</th>
                                         <td><?php   echo $tables['financial']->f_official_account_name;?></td>
                                         <th class="gray_background"  >نشاط تجارى</th>
                                         <td><?php  echo $arr_yes_no[$tables['financial']->f_commerical_activity_id_fk]?></td>
                                     </tr>
                                     <tr>
                                         <th class="gray_background" >رقم الحساب</th>
                                         <td><?php   echo $tables['financial']->f_bank_account_num;?></td>
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
<!-------------------------- المرفقات ------------------------------->



         <div class="header col-xs-12 no-padding">
             <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
             </div>
             <div class="col-xs-4 text-center">
                 <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
             </div>
             <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
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
                    <?php //if ($tables['family_attach_files'] != '' && $tables['family_attach_files'] != null && !empty($tables['family_attach_files'])) {  ?>
                        
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


 <!-------------------------- رأى الباحث  ------------------------------->
        <div class="header col-xs-12 no-padding">
            <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
            </div>
            <div class="col-xs-4 text-center">
                <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
            </div>
            <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام بمنطقة الباحة  </p>
            <p>الباحـــة</p>
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
            window.location.href ="<?php echo base_url('family_controllers/Family/Add_Register') ?>";
        }, 100);
    </script >


