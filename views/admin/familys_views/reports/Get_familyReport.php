//*<style type="text/css">
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
    background-color: #eee !important;
    font-size: 12px;
    padding: 10px 5px 10px 0!important;
}
table.th-no-border th,
table.th-no-border td
{
    border-top: 0 !important;
}
@media all {
    .page-break { display: none; }
}
@media print {
    .page-break { display: block; page-break-before: always; }
}
body {
    font-family: 'Cairo', sans-serif;
    overflow-x: hidden;
}
a {
    text-decoration: none !important;
}
.no-padding {
    padding: 0;
}
.r-gym-report h1 {
    font-size: 25px;
    padding: 10px 0 15px;
    color: #555;
    border-radius: 15px;
}
.r-gym-report h3 {
    font-size: 20px;
    padding: 10px 0 10px;
    color: #555;
    border-radius: 10px;
}
.r-gym-bord {
    border-left: 1px solid #ddd;
}
.r-gym-report .panel-heading,
.r-gym-report .panel {
    background-image: none;
    border: 0;
    box-shadow: none;
    border-radius: 10px;
}
.r-gym-report table {
    margin-bottom: 20px;
}
.r-gym-report table .table-color-1 {
    border: 1px solid #eee;
    padding: 5px;
    background-color: #f2dede;
    font-weight: normal;
}
.r-gym-report table .table-color-2 {
    border: 1px solid #eee;
    padding: 5px;
    background-color: #d9edf7;
    font-weight: normal;
}
.r-gym-report table td {
    border: 1px solid #eee;
    padding: 10px 5px;
}
.r-gym-report .panel-body {
    border: 0 !important;
}
.r-gym-report .table-title {
    font-size: 16px;
    font-weight: bold;
}
.r-gym-report .panel-title>a {
    font-size: 18px;
}
.r-gym-report .more-less {
    font-size: 15px;
    margin-top: 2px;
}
@media (max-width: 768px) {
    .r-gym-bord {
        border-left: 0px;
    }
}
</style>
<?php $arr_yes_no=array('','نعم','لا'); ?>
<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>ناتج البحث</h4>
            </div>
        </div>
        <div class="panel-body no-padding">
            <div class="col-xs-12 r-gym-report">
                <div class="container no-padding">
                    <h1 class="text-center bg-success no-padding"> تقرير عام </h1>
                    <div class="col-sm-6 r-gym-bord" style="padding-right: 0">
                        <h3 class="text-center bg-danger no-padding"> بيانات عامة </h3>
                        <div class="panel-group" id="" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="panel-title">
                                        <a role="button">
                                            <i class="more-less glyphicon glyphicon-minus pull-right"></i>بيانات الزوجة
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                    <?php 
                                    if(isset($motherData) && $motherData != null) {   $arr_yes_no = array('', 'نعم', 'لا'); ?>
                                        <table class="table table-bordered table-devices">
                                            <tbody>
                                            <tr>
                                                <th class="gray_background"  >رقم السجل المدني </th>
                                                <td><?php echo $motherData['mother_national_num_fk'];?> </td>
                                                <th class="gray_background"  >رقم الهوية</th>
                                                <td><?php echo $motherData['m_national_id'];?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >الاسم الرباعي</th>
                                                <td><?php echo  $motherData['full_name'];?> </td>
                                                <th class="gray_background"  >تاريخ الميلاد</th>
                                                <td><?php echo  $motherData['m_birth_date_hijri'];?> </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >العمر</th>
                                                <td><?php  if( $motherData['m_birth_date_year'] >0){ echo date('Y-m-d')- $motherData['m_birth_date_year'];}else{ echo 0;} ?></td>
                                                <th class="gray_background"  >صلة القرابة</th>
                                                <td><?php if (!empty($relationships[ $motherData['m_relationship']])):
                                                        echo$relationships[ $motherData['m_relationship']];
                                                    endif;?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background"> الحالة الإجتماعية</th>
                                                <td><?php  if(!empty($marital_status_array[ $motherData['m_marital_status_id_fk']])){
                                                        echo $marital_status_array[ $motherData['m_marital_status_id_fk']];  }?></td>
                                                <th class="gray_background"  >الجنسية</th>
                                                <td><?php  if(!empty($nationality[ $motherData['m_nationality']])){
                                                        echo $nationality[ $motherData['m_nationality']];  }?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" > جنسيه اخري</th>
                                                <td><?php echo  $motherData['nationality_other'];?> </td>
                                                <th class="gray_background"  >السكن</th>
                                                <td><?php echo  $motherData['place'];?> </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" > محل سكن</th>
                                                <td><?php echo  $motherData['m_living_place'];?> </td>
                                                <th class="gray_background"  >نوع الهوية</th>
                                                <td><?php  if(!empty($national_num_type[ $motherData['m_national_id_type']])){
                                                        echo $national_num_type[ $motherData['m_national_id_type']];  }?></td>
                                            </tr>


                                            <tr>
                                                <th class="gray_background" >الحالة الصحية</th>
                                                <td><?php

                                                    if(  $motherData['m_health_status_id_fk'] === 'disease'){
                                                        echo'مريض';
                                                    }elseif ( $motherData['m_health_status_id_fk'] === 'disability'){
                                                        echo'معاق';
                                                    }elseif ( $motherData['m_health_status_id_fk'] === 'good'){
                                                        echo'سليم';
                                                    }else{
                                                        if (!empty($health_status_array[ $motherData['m_health_status_id_fk']])):
                                                            echo$health_status_array[ $motherData['m_health_status_id_fk']];
                                                        endif;
                                                    } ?> </td>
                                                <th class="gray_background"  >
                                                    <?php if( $motherData['m_health_status_id_fk'] === 'disease'){
                                                        echo'نوع المرض';
                                                    }elseif( $motherData['m_health_status_id_fk'] === 'disability'){
                                                        echo'نوع الإعاقة';
                                                    }?>
                                                </th>
                                                <td><?php if( $motherData['m_health_status_id_fk'] === 'disease'){

                                                        if (!empty($diseases[ $motherData['disease_id_fk']])):
                                                            echo$diseases[ $motherData['disease_id_fk']];
                                                        endif;
                                                    }elseif( $motherData['m_health_status_id_fk'] === 'disability'){
                                                        if (!empty($diseases[ $motherData['disability_id_fk']])):
                                                            echo$diseases[ $motherData['disability_id_fk']];
                                                        endif;
                                                    }?> </td>
                                            </tr>

                                            <tr>
                                                <th class="gray_background" >سبب المرض/الإعاقة</th>
                                                <td><?php echo  $motherData['dis_reason']; ?> </td>
                                                <th class="gray_background"  >جهة المتابعة المرض/الإعاقة</th>
                                                <td><?php
                                                    if (!empty($responses[ $motherData['dis_response_status']])):
                                                        echo$responses[ $motherData['dis_response_status']];
                                                    endif;?> </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >وضع الحالة المرض/الإعاقة</th>
                                                <td><?php     if (!empty($diseases_status[ $motherData['dis_status']])):
                                                        echo$diseases_status[ $motherData['dis_status']];
                                                    endif; ?> </td>
                                                <th class="gray_background"  >المهارة</th>
                                                <td><?php echo  $motherData['m_skill_name'];?> </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background"  >الحياة العملية</th>
                                                <td><?php
                                                    $arr_work =array('','لا يعمل','يعمل');
                                                    if(!empty($arr_work[ $motherData['m_want_work']])){
                                                        echo $arr_work[ $motherData['m_want_work']];  }?></td>
                                                <th class="gray_background" > طبيعة الفرد</th>
                                                <td><?php  if(!empty($person_type[ $motherData['person_type']])){
                                                        echo $person_type[ $motherData['person_type']];  }?></td>
                                            </tr>

                                            <tr>
                                                <th class="gray_background" >المهنة</th>
                                                <td><?php
                                                    if(!empty($job_titles[ $motherData['m_job_id_fk']])){
                                                        echo $job_titles[ $motherData['m_job_id_fk']];  }?></td>
                                                </td>
                                                <th class="gray_background"  >الدخل الشهرى</th>
                                                <td><?php echo  $motherData['m_monthly_income'];?> </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >المستوى التعليمى</th>
                                                <td><?php echo  $motherData['m_education_level_id_fk'];?> </td>
                                                <th class="gray_background"  >التخصص</th>
                                                <td><?php echo  $motherData['m_specialization'];?> </td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >الحالة الدراسية</th>
                                                <td><?php echo  $motherData['m_education_status_id_fk'];?> </td>
                                                <th class="gray_background" >ملتحقة بدار نسائية</th>
                                                <td><?php  if(!empty($arr_yes_no[ $motherData['m_female_house_check']])){
                                                        echo $arr_yes_no[ $motherData['m_female_house_check']];  }?></td>
                                            </tr>
                                            <tr>

                                                <th class="gray_background" >إسم الدار </th>
                                                <td><?php if (!empty($women_houses[ $motherData['m_female_house_id_fk']])):
                                                        echo $women_houses[ $motherData['m_female_house_id_fk']];
                                                    endif;?> </td>
                                                <th class="gray_background" >أداء فريضة الحج</th>
                                                <td><?php  if(!empty($arr_yes_no[ $motherData['m_hijri']])){
                                                        echo $arr_yes_no[ $motherData['m_hijri']];  }?></td>
                                            </tr>
                                            <tr>

                                                <th class="gray_background"  >أداء فريضة العمرة</th>
                                                <td><?php  if(!empty($arr_yes_no[ $motherData['m_ommra']])){
                                                        echo $arr_yes_no[ $motherData['m_ommra']];  }?></td>
                                                <th class="gray_background" >رقم الجوال</th>
                                                <td><?php echo  $motherData['m_mob'];?> </td>
                                            </tr>
                                            <tr>

                                                <th class="gray_background"  >رقم جوال أخر</th>
                                                <td><?php echo  $motherData['m_another_mob'];?> </td>

                                                <th class="gray_background" >البريد الإلكترونى</th>
                                                <td><?php echo  $motherData['m_email'];?> </td>
                                            </tr>
                                            <?php if(  $motherData['m_account'] == 1){?>

                                                <tr>
                                                    <th class="gray_background"  >مسئول الحساب</th>
                                                    <td><?php  if(!empty($arr_yes_no[ $motherData['m_account']])){
                                                            echo $arr_yes_no[ $motherData['m_account']];  }?></td>
                                                    <th class="gray_background" >إسم الحساب</th>
                                                    <td><?php  if(!empty($banks[ $motherData['m_account_id']])){
                                                            echo $banks[ $motherData['m_account_id']];  }?></td>
                                                </tr>

                                            <?php }?>



                                            <tr>
                                                <th class="gray_background" >القدرة علي العمل</th>
                                                <td><?php
                                                    if (!empty($arr_yes_no[ $motherData['ability_work']])){
                                                        echo $arr_yes_no[ $motherData['ability_work']];
                                                    } ?> </td>
                                                <th class="gray_background"  >نوع العمل</th>
                                                <td><?php
                                                    if (!empty($works_type[ $motherData['work_type_id_fk']])){
                                                        echo $works_type[ $motherData['work_type_id_fk']];
                                                    } ?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >طبيعة الشخصية</th>
                                                <td><?php
                                                    if (isset($personal_characters[ $motherData['personal_character_id_fk']])){
                                                        echo $personal_characters[ $motherData['personal_character_id_fk']];
                                                    } ?></td>
                                                <th class="gray_background"  >العلاقة بالأسرة</th>
                                                <td><?php
                                                    if (isset($relations_with_family[ $motherData['relation_with_family']])){
                                                        echo $relations_with_family[ $motherData['relation_with_family']];
                                                    } ?> </td>
                                            </tr>


                                            <tr>

                                                <th class="gray_background"  >  مكفول</th>
                                                <td><?php  if(!empty($arr_yes_no[ $motherData['guaranteed_m']])){
                                                        echo $arr_yes_no[ $motherData['guaranteed_m']];  }?></td>
                                                <th class="gray_background" >هاتف العمل</th>
                                                <td><?php if(!empty( $motherData['m_place_mob'])){
                                                        echo  $motherData['m_place_mob']; }?> </td>
                                            </tr>
                                            <tr>

                                                <th class="gray_background"  >  طبيعة الفرد</th>
                                                <td><?php  if(!empty($person_type[ $motherData['person_type']])){
                                                        echo $person_type[ $motherData['person_type']];  }?></td>
                                                <th class="gray_background" >التصنيف</th>
                                                <?php $categories=array(1=>'ارمله',2=>'يتيم',3=>'مستفيد');?>
                                                <td><?php if(!empty($categories[ $motherData['categoriey_m']])){
                                                        echo $categories[ $motherData['categoriey_m']]; }?> </td>
                                            </tr>
                                            <tr>


                                                <th class="gray_background"  > حاله المستفيد</th>
                                                <td><?php  if(!empty($member_status[ $motherData['halt_elmostafid_m']])){
                                          echo $member_status[ $motherData['halt_elmostafid_m']];  }?></td>
                                                <th class="gray_background" >الجنس</th>
                                                <?php $gender_arr=array('','ذكر','أنثى');?>
                                                <td><?php if(!empty($gender_arr[ $motherData['m_gender']])){
                                              echo $gender_arr[ $motherData['m_gender']]; }?> </td>
                                            </tr>



                                            </tbody>
                                        </table>
                                        <?php 
                                        } 
                                        else{
                                            echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <h4 class="panel-title">
                                        <a role="button">
                                            <i class="more-less glyphicon glyphicon-minus pull-right"></i>بيانات الأب
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                   <?php 
                                    if(isset($fatherData) && $fatherData != null) { 
                                        ?>
                                        <table class="table table-bordered table-devices">
                                            <tbody>
                                                <tr>
                                                    <th class="gray_background"  >رقم السجل المدني للأم</th>
                                                    <td><?=$fatherData['mother_national_num_fk']?></td>
                                                    <th class="gray_background"  >الاسم رباعي</th>
                                                    <td><?=$fatherData['full_name']?></td>
                                                </tr>
                                                <tr>
                                                    <th class="gray_background" >رقم الهوية</th>
                                                    <td><?=$fatherData['f_national_id']?></td>
                                                    <th class="gray_background"  >نوع الهوية</th>
                                                    <td><?=$fatherData['idType']?></td>
                                                </tr>
                                                <tr>
                                                    <th class="gray_background"> مصدر الهوية</th>
                                                    <td><?=$fatherData['nation_place_title']?></td>
                                                    <th class="gray_background"  >تاريخ الميلاد الميلادى</th>
                                                    <td><?=$fatherData['f_birth_date']?></td>
                                                </tr>
                                                 <tr>
                                                    <th class="gray_background"  >تاريخ الميلاد الهجرى</th>
                                                    <td><?=$fatherData['f_birth_date_hijri']?></td>
                                                    <th class="gray_background" >الجنسية</th>
                                                    <td><?=$fatherData['title']?></td>
                                                </tr>
                                                <tr>
                                                   
                                                    <th class="gray_background"  > جنسيه اخري</th>
                                                    <td> <?$fatherData['nationality_other']?></td>
                                                      <th class="gray_background" >  المهنة</th>
                                                    <td><?=$fatherData['job']?> </td>
                                                </tr>
                                                <tr>
                                                  
                                                    <th class="gray_background"  >سبب الوفاة</th>
                                                    <td><?=$fatherData['death']?> </td>
                                                     <th class="gray_background" >أسباب أخرى</th>
                                                    <td><?=$fatherData['death_reason_title']?></td>
                                                </tr>
                                                <tr>
                                                   
                                                    <th class="gray_background"  >تاريخ الوفاة</th>
                                                    <td><?=$fatherData['f_death_date']?></td>
                                                      <th class="gray_background" >عدد الذكور</th>
                                                    <td><?=$fatherData['f_child_num']?></td>
                                                </tr>
                                                 <tr>
                                            
                                                    <th class="gray_background"  >عدد الاناث</th>
                                                    <td><?=$fatherData['f_female_num']?></td>
                                                     <th class="gray_background"  >عدد الزوجات</th>
                                                    <td><?=$fatherData['f_wive_count']?></td>
                                                </tr>
                                                
                                            
                                            </tbody>
                                        </table>
                                        <?php 
                                        } 
                                        else{
                                            echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <h4 class="panel-title">
                                        <a role="button">
                                            <i class="more-less glyphicon glyphicon-minus pull-right"></i>بيانات الأبناء
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <?php if(isset($childrenData) && $childrenData != null) { 
                                            $member_gender = array(1=>'ذكر', 2=>'أنثى');
                                        ?>
                                        <table class="table table-bordered ">
                                            <header>
                                                <tr >
                                                    <th class="gray_background">الإسم</th>
                                                    <th class="gray_background">رقم الهوية</th>
                                                    <th class="gray_background">تاريخ الميلاد</th>
                                                    <th class="gray_background">المهنة </th>

                                                </tr>
                                            </header>
                                            <tbody>
                                            <?php foreach ($childrenData as $value) { ?>
                                                <tr>
                                                    <td><?=$value->member_full_name  ?></td>
                                                    <td><?=$value->member_card_num?></td>
                                                    <td><?=$value->member_birth_date_hijri?></td>
                                                    <td><?=$value->job?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php 
                                        } 
                                        else{
                                            echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    <h4 class="panel-title">
                                        <a role="button">
                                            <i class="more-less glyphicon glyphicon-minus pull-right"></i>بيانات السكن
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <?php if(isset($houseData) && $houseData != null) { 
                                        ?>
                                        <table class="table table-bordered table-devices">
                                            <tbody>
                                                <tr>
                                                    <th class="gray_background"  >رقم حساب فاتورة الكهرباء</th>
                                                    <td><?=$houseData['h_electricity_account']?></td>
                                                    <th class="gray_background"  >الرقم الصحى</th>
                                                    <td><?=$houseData['h_health_number']?></td>
                                                </tr>
                                                <tr>
                                                    <th class="gray_background" >المنطقة</th>
                                                    <td><?=$houseData['area']?></td>
                                                    <th class="gray_background"  >المدينة</th>
                                                    <td><?=$houseData['city']?></td>
                                                </tr>
                                                <tr>
                                                    <th class="gray_background">الحى</th>
                                                    <td><?=$houseData['hai_name']?></td>

                                                    <th class="gray_background"  >الشارع</th>
                                                    <td><?=$houseData['h_street']?></td>
                                                </tr>
                                                <tr>
                                                    <th class="gray_background" >أقرب مدرسة</th>
                                                    <td><?=$houseData['h_nearest_school']?></td>
                                                    <th class="gray_background"  >أقرب معلم</th>
                                                    <td><?=$houseData['h_nearest_teacher']?></td>
                                                </tr>
                                                <tr>
                                                    <th class="gray_background" >أقرب مسجد</th>
                                                    <td><?=$houseData['h_mosque']?></td>
                                                    <th class="gray_background"  >نوع السكن</th>
                                                    <td><?=$houseData['houseType']?></td>
                                                </tr>
                                                <tr>
                                                    <th class="gray_background" >لون المنزل</th>
                                                    <td><?=$houseData['h_house_color']?></td>
                                                    <th class="gray_background"  >اتجاه المنزل</th>
                                                    <td><?=$houseData['houseDirect']?></td>
                                                </tr>
                                                <tr>
                                                    <th class="gray_background" >الحالة</th>
                                                    <td><?=$houseData['houseStatus']?></td>
                                                    <th class="gray_background"  >عدد الغرف</th>
                                                    <td><?=$houseData['h_rooms_account']?></td>
                                                </tr>
                                                <tr>
                                                    <th class="gray_background" >مقترض من البنك العقارى</th>
                                                    <td><?=$arr_yes_no[$houseData['h_borrow_from_bank']]?></td>
                                                    <th class="gray_background"  >القيمة</th>
                                                    <td><?=$houseData['h_borrow_remain']?></td>
                                                </tr>
                                                <tr>
                                                    <th class="gray_background" >ملكية السكن</th>
                                                    <td><?=$houseData['houseOwner']?></td>
                                                    <th class="gray_background"  >مقدار الإيجار السنوى</th>
                                                    <td><?=$houseData['h_rent_amount']?></td>
                                                </tr>
                                                <tr>
                                                    <th class="gray_background" >عدد دورات المياه</th>
                                                    <td><?=$houseData['h_bath_rooms_account']?></td>
                                                    <th class="gray_background"  >مساحة البناء</th>
                                                    <td><?=$houseData['h_house_size']?></td>
                                                </tr>
                                                <tr>
                                                    <th class="gray_background" >قرض ترميم من بنك التسليف</th>
                                                    <td><?=$arr_yes_no[$houseData['h_loan_restoration']]?></td>
                                                    <th class="gray_background"  >القيمة المتبقية</th>
                                                    <td><?=$houseData['h_loan_restoration_remain']?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php 
                                        } 
                                        else{
                                            echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                    <h4 class="panel-title">
                                        <a role="button">
                                            <i class="more-less glyphicon glyphicon-minus pull-right"></i>بيانات الأجهزة
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <?php if(isset($deviceData) && $deviceData != null) { 
                                        ?>
                                        <table class="table table-bordered">
                                            <thead>
                                            <th class="gray_background">إسم الجهاز</th>
                                            <th class="gray_background">العدد</th>
                                            <th class="gray_background">حالة الجهاز</th>
                                            <th class="gray_background">ملاحظات</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $house_device_status=array('إختر','جيد','متوسط','غير جيد','يحتاج') ;
                                            foreach ($deviceData as $value) { ?>
                                                <tr>
                                                    <td><?=$value->device?></td>
                                                    <td><?=$value->d_count?></td>
                                                    <td><?=$house_device_status[$value->d_house_device_status_id_fk]?></td>
                                                    <td><?=$value->d_note?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php 
                                        } 
                                        else{
                                            echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseSex" aria-expanded="true" aria-controls="collapseSex">
                                    <h4 class="panel-title">
                                        <a role="button">
                                            <i class="more-less glyphicon glyphicon-minus pull-right"></i>بيانات مالية
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSex" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <?php if(isset($financeData) && $financeData != null) { 
                                        ?>
                                        <table class="table table-bordered table-devices">
                                        <tbody>
                                            <tr>
                                                <th class="gray_background"  >مبلغ التقاعد</th>
                                                <td><?=$financeData['f_pension_amount']?></td>
                                                <th class="gray_background"  >مبلغ الضمان</th>
                                                <td><?=$financeData['f_warranty_amount']?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background">مقدار العادة السنوية</th>
                                                <td><?=$financeData['f_annual_amount']?></td>

                                                <th class="gray_background"  >مبلغ التأمينات</th>
                                                <td><?=$financeData['f_insurance_amount']?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >عمالة</th>
                                                <td><?=$arr_yes_no[$financeData['f_workers_id_fk']]?></td>
                                                <th class="gray_background"  >عدد العمال</th>
                                                <td><?=$financeData['f_workers_num']?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >مبالغ أخرى</th>
                                                <td><?=$financeData['f_other_amount']?></td>
                                                <th class="gray_background"  >إسم البنك</th>
                                                <td><?=$financeData['bank']?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >الإسم المعتمد للحساب</th>
                                                <td><?=$financeData['f_official_account_name']?></td>
                                                <th class="gray_background"  >نشاط تجارى</th>
                                                <td><?=$arr_yes_no[$financeData['f_commerical_activity_id_fk']]?></td>
                                            </tr>
                                            <tr>
                                                <th class="gray_background" >رقم الحساب</th>
                                                <td><?=$financeData['f_bank_account_num']?></td>
                                            </tr>
                                     </tbody>
                                 </table>
                                        <?php 
                                        } 
                                        else{
                                            echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6" style="padding-left: 0">
                        <h3 class="text-center bg-info">بيانات الخدمات </h3>
                        <div class="panel-group" id="" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div data-toggle="collapse" data-parent="#accordion1" href="#collapse-One" aria-expanded="true" aria-controls="collapse-One" class="panel-heading" role="tab" id="heading-One">
                                    <h4 class="panel-title">
                                        <a role="button">
                                            <i class="more-less glyphicon glyphicon-minus pull-right"></i>الخدمات
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse-One" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-One">
                                    <div class="panel-body">
                                        <?php if(isset($services) && $services != null) { 
                                        ?>
                                        <table class="table table-bordered">
                                            <thead>
                                            <th class="gray_background">م</th>
                                            <th class="gray_background">نوع الخدمة</th>
                                            <th class="gray_background">الحالة</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $approved=array('جاري','معتمد بالموافقة','معتمد بالرفض','تحويل للجنة') ;
                                            $x = 1;
                                            /*
                                            echo '<pre>';
                                            print_r($services);
                                            echo '<pre>';*/
                                            foreach ($services as $value) { ?>
                                                <tr>
                                                    <td><?=($x++)?></td>
                                                    <td><?php echo $categories[$value->tableName]->title ?></td>
                                                    <td><?php echo $approved[$value->approved] ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php 
                                        } 
                                        else{
                                            echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function toggleIcon(e) {
        $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>