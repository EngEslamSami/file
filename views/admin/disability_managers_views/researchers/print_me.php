
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/css/style.css">




    <style type="text/css">
        .print_forma{
            border:1px solid ;
            padding: 15px;
        }
        .print_forma table th{
            text-align: center;
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
        .background-gray{
            background-color: #b5abab;
        }
        .researcher-report{
            min-height: 800px;
        }
        .bottom_footer{ 
            position: absolute;
            bottom: 0
        }
        hr{
            margin-top: 4px !important;
            margin-bottom: 4px !important;
        }
    </style>






<div id="printdiv"   >

<div class="pull-right hidden-print">
<a class="btn btn-primary w-md m-b-5" href="<?php echo base_url() ?>disability_managers/Disability_manage/add_disabilities_persons">رجوع للصفحة السابقة</a>
</div>
<?php


if($nationality !='' && $nationality !=null){

    $arr_nationality =array();
    foreach($nationality as $record){
        $arr_nationality[$record->id] =    $record->title;
    }

}

if($scientific_qualification!='' && $scientific_qualification !=null){

    $arr_scientific_qualification =array();
    foreach($scientific_qualification as $record){
        $arr_scientific_qualification[$record->id] =    $record->title;
    }

}
if($relative_relation!='' && $relative_relation !=null) {
    $arr_relative = array();
    foreach ($relative_relation as $k => $v) {
        $arr_relative[$v->id] = $v->title;
    }
}

$arr_family_condition=array('','زواج قائم','طلاق','أرمل','غيرمرتبط');
$arr_social =array('','أرمل','أعزب','مطلق');
$arr_house_type=array('','ملك','مشترك','مستأجر','شعبي','عربي','غير ذلك');
$arr_house_condition=array('','نظيف','متوسط','غيرنظيف');
$arr_trans=array('','يوجد','لايوجد');

?>

    <section class="main-body">
        <div class="container-fluid">
            <div class="print_forma col-xs-12 no-padding">
                <div class="personality">
                    <div class="col-xs-12">
                       
                        <label class="background-gray"> أولا : معلومات عامة عن الحالة :</label>
                        <br>
                    </div>
                    <div class="col-xs-6">
                        <p><strong>إسم الطالب / الحالة رباعياَ:</strong> <?php if($person_data['p_name'] !='' && $person_data['p_name']!=null && !empty($person_data['p_name'])){ echo $person_data['p_name'];}  echo'&nbsp;';
                            if ($person_data['contact_father_name'] != '' && $person_data['contact_father_name'] != null && !empty($person_data['contact_father_name'])) {
                                echo $person_data['contact_father_name']; }?> </p>
                        <p><strong>الجنسية :</strong><?php if ($arr_nationality[$person_data['p_natonality_id_fk']] != '' && $arr_nationality[$person_data['p_natonality_id_fk']]!= null && !empty($arr_nationality[$person_data['p_natonality_id_fk']])) {
                            echo $arr_nationality[$person_data['p_natonality_id_fk']];}?></p>
                        <p><strong>رقم السجل المندنى :</strong> <?php if ($person_data['p_national_num'] != '' && $person_data['p_national_num'] != null && !empty($person_data['p_national_num'])) {
                           echo $person_data['p_national_num'];}?></p>
                    </div>
                    <div class="col-xs-6">
                        <p><strong>تاريخ الميلاد :</strong><?php if ($person_data['p_date_birth'] != '' && $person_data['p_date_birth'] != null && !empty($person_data['p_date_birth'])) {
                            echo $person_data['p_date_birth'];}?></p>
                        <p><strong>مكان الإصدار:</strong> <?php if ($person_data['p_address'] != '' && $person_data['p_address'] != null && !empty($person_data['p_address'])) {
                           echo $person_data['p_address']; }?></p>
                    </div>
                    <div class="col-xs-12">
                        <p><strong>الحالة الإجتماعية : </strong><?php if ($arr_social[$person_data['p_scoial_status_id_fk']] != '' && $arr_social[$person_data['p_scoial_status_id_fk']] != null && !empty($arr_social[$person_data['p_scoial_status_id_fk']])) {
                                echo $arr_social[$person_data['p_scoial_status_id_fk']]; }?></p>
                        <p><strong>الحالة التعليمية : </strong><?php if ($arr_scientific_qualification[$person_data['scientific_qualitication']] != '' && $arr_scientific_qualification[$person_data['scientific_qualitication']] != null && !empty($arr_scientific_qualification[$person_data['scientific_qualitication']])) {
                                echo $arr_scientific_qualification[$person_data['scientific_qualitication']]; }?></p>
                        <p><strong>سمات الإعاقة : </strong><?php if ($records['disability_features'] != '' && $records['disability_features'] != null && !empty($records['disability_features'])) {
                           echo $records['disability_features'];}?></p>
                        <p><strong>درجة الإعاقة : </strong><?php if ($person_data['disability_degree'] != '' && $person_data['disability_degree'] != null && !empty($person_data['disability_degree'])) {
                            echo $person_data['disability_degree'];}?></p>
                        <p><strong>متى بدأت الأعراض : </strong><?php if ($records['disease_start_date'] != '' && $records['disease_start_date'] != null && !empty($records['disease_start_date'])) {
                                echo $records['disease_start_date'];}?></p>
                    </div>
                    <div class="col-xs-12">
                        <br><br>
                        <label class="background-gray">مصدر الدخل للمعاق ( المعدل الشهرى ):</label>

                        <table class="table table-bordered">
                            <thead>
                            <th  class="gray_background">راتب العمل</th>
                            <th class="gray_background">الضمان الإجتماعى</th>
                            <th  class="gray_background">التأهيل الشامل</th>
                            <th  class="gray_background">التأمينات الإجتماعية</th>
                            <th  class="gray_background">المجموع الشهرى</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php if ($records['salary'] != '' && $records['salary'] != null && !empty($records['salary'])) {
                                   echo $records['salary'];}?></td>
                                <td><?php if ($records['social_security'] != '' && $records['social_security'] != null && !empty($records['social_security'])) {
                                        echo $records['social_security'];}?></td>
                                <td><?php if ($records['qualification'] != '' && $records['qualification'] != null && !empty($records['qualification'])) {
                                        echo $records['qualification'];}?></td>
                                <td><?php if ($records['insurance'] != '' && $records['insurance'] != null && !empty($records['insurance'])) {
                                        echo $records['insurance'];}?></td>
                                <td><?php echo $records['salary'] +$records['social_security']+$records['qualification']+$records['insurance']?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12"><hr></div>

                </div>
                <div class="days col-xs-12 ">
                    <div class="col-xs-12  no-padding">
                        <br>
                        <label class="background-gray"> ثانياَ : معلومات عن رب الأسرة :</label>
                        <br><br>
                    </div>

                    <p class="col-xs-6 no-padding"><strong>إسم ولى الأمر رباعياَ :  </strong><?php if ($records['parent_name'] != '' && $records['parent_name'] != null && !empty($records['parent_name'])) {
                            echo $records['parent_name'];}?></p>
                    <p class="col-xs-6 no-padding"><strong>صلة القرابة بالحالة :  </strong><?php if ($arr_relative[$records['relative_relation']] != '' && $arr_relative[$records['relative_relation']] != null && !empty($arr_relative[$records['relative_relation']])) {
                            echo $arr_relative[$records['relative_relation']];}?></p>
                    <p class="col-xs-3 no-padding"><strong>الجنسية :</strong> <?php if ($arr_nationality[$records['relative_nationality']] != '' && $arr_nationality[$records['relative_nationality']] != null && !empty($arr_nationality[$records['relative_nationality']])) {
                            echo $arr_nationality[$records['relative_nationality']];}?></p>
                    <p class="col-xs-3 no-padding"><strong>رقم الهوية :</strong><?php if ($records['id_number'] != '' && $records['id_number'] != null && !empty($records['id_number'])) {
                            echo $records['id_number'];}?></p>
                    <p class="col-xs-3 no-padding"><strong>تاريخها :</strong> <?php if ($records['id_date'] != '' && $records['id_date'] != null && !empty($records['id_date'])) {
                            echo $records['id_date'];}?></p>
                    <p class="col-xs-3 no-padding"><strong>مكان الإصدار :</strong> <?php if ($records['id_place'] != '' && $records['id_place'] != null && !empty($records['id_place'])) {
                            echo $records['id_place'];}?></p>

                    <p class="col-xs-6 no-padding"><strong>الحالة الإجتماعية :  </strong><?php if ($arr_social[$records['social_status']] != '' && $arr_social[$records['social_status']] != null && !empty($arr_social[$records['social_status']])) {
                            echo $arr_social[$records['social_status']];}?></p>
                    <p class="col-xs-6 no-padding"><strong>تاريخ الميلاد :  </strong><?php if ($records['parent_date_of_birth'] != '' && $records['parent_date_of_birth'] != null && !empty($records['parent_date_of_birth'])) {
                            echo $records['parent_date_of_birth'];}?></p>

                    <p class="col-xs-6 no-padding"><strong>الحالة التعليمية :  </strong><?php if ($arr_scientific_qualification[$records['educational_Status']] != '' && $arr_scientific_qualification[$records['educational_Status']] != null && !empty($arr_scientific_qualification[$records['educational_Status']])) {
                            echo $arr_scientific_qualification[$records['educational_Status']]; }?></p>
                    <p class="col-xs-6 no-padding"><strong>المؤهل :  </strong><?php if ($records['parent_qualification'] != '' && $records['parent_qualification'] != null && !empty($records['parent_qualification'])) {
                            echo $records['parent_qualification'];}?></p>

                    <p class="col-xs-12 no-padding"><strong>المهنة :  </strong><?php if ($records['parent_job'] != '' && $records['parent_job'] != null && !empty($records['parent_job'])) {
                            echo $records['parent_job'];}?></p>


                    <p class="col-xs-3 no-padding"><strong>مكان العمل :</strong> <?php if ($records['job_place'] != '' && $records['job_place'] != null && !empty($records['job_place'])) {
                            echo $records['job_place'];}?></p>
                    <p class="col-xs-3 no-padding"><strong>الجهه :</strong> <?php if ($records['entity'] != '' && $records['entity'] != null && !empty($records['entity'])) {
                            echo $records['entity'];}?></p>
                    <p class="col-xs-3 no-padding"><strong>المدينة  :</strong> <?php if ($records['city'] != '' && $records['city'] != null && !empty($records['city'])) {
                            echo $records['city'];}?></p>
                    <p class="col-xs-3 no-padding"><strong>هاتف العمل :</strong> <?php if ($records['work_mobile'] != '' && $records['work_mobile'] != null && !empty($records['work_mobile'])) {
                            echo $records['work_mobile'];}?></p>

                    <p class="col-xs-4 no-padding"><strong>هل الأب على قيد الحياة : (<?php if ($records['father_death'] != '' && $records['father_death'] != null && !empty($records['father_death'])) {
                                if($records['father_death'] ==1){ echo 'لا';}else{echo 'نعم'; }  }?>)  </strong></p>
                    <?php if ($records['father_death'] != '' && $records['father_death'] != null && !empty($records['father_death'])) {
                    if($records['father_death'] ==1){ ?>
                        <p class="col-xs-4 no-padding"><strong> سنة الوفاة (<?php echo $records['father_death_year']?> ) .  </strong></p>
                    <?php  } } ?>
                    <p class="col-xs-4 no-padding"><strong>هل الأم على قيد الحياة : (<?php if ($records['mother_death'] != '' && $records['mother_death'] != null && !empty($records['mother_death'])) {
                                if($records['mother_death'] ==1){ echo 'لا';}else{echo 'نعم'; }  }?>) </strong></p>

                    <?php if ($records['mother_death'] != '' && $records['mother_death'] != null && !empty($records['mother_death'])) {
                    if($records['mother_death'] ==1){ ?>
                        <p class="col-xs-4 no-padding"><strong> سنة الوفاة ( <?php echo $records['mother_death_year']?>) .  </strong></p>
                    <?php  } }?>

                    <div class="clearfix"></div>
                    <br><br>
                    <p class="col-xs-3 no-padding"><strong>مكان الإقامة :</strong> <?php if ($records['staying_place'] != '' && $records['staying_place'] != null && !empty($records['staying_place'])) {
                            echo $records['staying_place'];}?></p>
                    <p class="col-xs-3 no-padding"><strong>الحى  :</strong> <?php if ($records['district'] != '' && $records['district'] != null && !empty($records['district'])) {
                            echo $records['district'];}?></p>
                    <p class="col-xs-3 no-padding"><strong>الموقع :</strong> <?php if ($records['Location'] != '' && $records['Location'] != null && !empty($records['Location'])) {
                            echo $records['Location'];}?></p>

                    <p class="col-xs-6 no-padding"><strong>هاتف المنزل :  </strong><?php if ($records['home_mobile'] != '' && $records['home_mobile'] != null && !empty($records['home_mobile'])) {
                            echo $records['home_mobile'];}?></p>
                    <p class="col-xs-6 no-padding"><strong>إسم وهاتف شخص قريب :  </strong><?php if ($records['nearby_person'] != '' && $records['nearby_person'] != null && !empty($records['nearby_person'])) {
                            echo $records['nearby_person'];}?></p>

                    <div class="clearfix"></div>
                    <br><br>
                </div>
            </div>
        </div>
    </section>




    <section class="main-body">
        <div class="container">
            <div class="print_forma col-xs-12 no-padding">
                <div class="personality">
                    <div class="col-xs-12">
                        <br>
                        <label class="background-gray"> ثالثاَ : التكوين الأسري للحالة : (من واقع دفتر العائلة / الإقامة) والأشخاص المقيمين فى المنزل :</label>
                        <br><br>
                    </div>

                    <div class="col-xs-12">
                        <?php if ($family_relationship != '' && $family_relationship != null && !empty($family_relationship)) {?>
                        <table class="table table-bordered">
                            <thead>
                            <th  class="gray_background">م</th>
                            <th  class="gray_background">الإسم</th>
                            <th  class="gray_background">صلة القرابة</th>
                            <th  class="gray_background" >تاريخ الميلاد</th>
                            <th class="gray_background" >المهنه طالب / يعمل</th>
                            <th  class="gray_background">المستوى التعليمي</th>
                            <th  class="gray_background">الحالة الإجتماعية</th>
                            <th  class="gray_background">ملاحظات</th>
                            </thead>
                            <tbody>
                            <?php $i=1;foreach($family_relationship as $row){?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row->name;?></td>
                                    <td><?php if ($arr_relative[$row->relative_relation] != '' && $arr_relative[$row->relative_relation] != null && !empty($arr_relative[$row->relative_relation])) {
                                            echo $arr_relative[$row->relative_relation];}?></td>
                                    <td><?php echo $row->date_of_birth;?></td>
                                    <td><?php echo $row->job;?></td>
                                    <td><?php if ($arr_scientific_qualification[$row->educational_status]!= '' && $arr_scientific_qualification[$row->educational_status]!= null && !empty($arr_scientific_qualification[$row->educational_status])) {
                                            echo $arr_scientific_qualification[$row->educational_status]; }?></td>
                                    <td><?php if ($arr_social[$row->social_status] != '' && $arr_social[$row->social_status] != null && !empty($arr_social[$row->social_status])) {
                                            echo $arr_social[$row->social_status];}?></td>
                                    <td><?php echo $row->details;?></td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>



                    <div class="col-xs-12"><hr></div>

                </div>
                <div class="days col-xs-12 ">
                    <div class="col-xs-12  no-padding">
                        <br>
                        <label class="background-gray"> رابعاَ : الحالة الإقتصادية لأسرة الحالة :</label>
                        <p>المسكن :</p>

                    </div>

                    <div class="col-xs-12  no-padding">
                        <?php for($d=1;$d<sizeof($arr_house_type);$d++){?>
                            <p class="col-xs-3 "><strong> <?php echo $arr_house_type[$d];?>  :  </strong> ( <?php if($records['house_type']   == $d){echo'✔';} ?> ) </p>
                        <?php } ?>
                    </div>

                    <div class="col-xs-12  no-padding">
                        <?php for($d=1;$d<sizeof($arr_house_condition);$d++){ ?>
                            <p class="col-xs-3 "><strong><?php echo $arr_house_condition[$d];?>:  </strong> ( <?php if($records['house_condition']   == $d){echo'✔';} ?> ) </p>
                        <?php } ?>
                    </div>


                    <div class="col-xs-12  no-padding">
                        <p class="col-xs-3  no-padding"><strong>عدد الغرف:</strong>  (  <?php echo$records['room_number']; ?> )   </p>
                        <p class="col-xs-3  no-padding"><strong>عدد الحمامات:  </strong> ( <?php  echo$records['path_number']; ?> ) </p>
                    </div>

                    <div class="col-xs-12  no-padding">
                        <p class="col-xs-4"><strong>  وسيلة النقل :  </strong>  </p>
                        <?php for($d=1;$d<sizeof($arr_trans);$d++){ ?>
                            <p class="col-xs-3 "><strong><?php echo $arr_trans[$d];?>:  </strong> ( <?php if($records['transport']   == $d){echo'✔';} ?> ) </p>
                        <?php } ?>

                    </div>

                    <div class="col-xs-12"><hr></div>
                    <div class="clearfix"></div>
                    <br>

                    <div class="col-xs-12">

                        <label class="background-gray"> مصادر الدخل لرب الأسرة (المعدل الشهري) :</label>
                        <br>
                    </div>

                    <div class="col-xs-12">
                        <table class="table table-bordered">
                            <thead>
                            <th class="gray_background">راتب العمل</th>
                            <th class="gray_background">الضمان الإجتماعى</th>
                            <th class="gray_background">التأمينات الإجتماعية</th>
                            <th class="gray_background">معاش التقعد</th>
                            <th class="gray_background">غير ذلك</th>
                            <th class="gray_background">المجموع الشهرى</th>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php if ($records['parent_salary'] != '' && $records['parent_salary'] != null && !empty($records['parent_salary'])) {
                                        echo $records['parent_salary'];}?></td>
                                <td><?php if ($records['parent_social_security'] != '' && $records['parent_social_security'] != null && !empty($records['parent_social_security'])) {
                                        echo $records['parent_social_security'];}?></td>
                                <td><?php if ($records['parent_insurance'] != '' && $records['parent_insurance'] != null && !empty($records['parent_insurance'])) {
                                        echo $records['parent_insurance'];}?></td>
                                <td><?php if ($records['parent_retirement_pension'] != '' && $records['parent_retirement_pension'] != null && !empty($records['parent_retirement_pension'])) {
                                        echo $records['parent_retirement_pension'];}?></td>
                                <td><?php if ($records['parent_other'] != '' && $records['parent_other'] != null && !empty($records['parent_other'])) {
                                        echo $records['parent_other'];}?></td>
                                <td><?php echo $records['parent_salary'] +$records['parent_social_security']+$records['parent_retirement_pension']+$records['parent_insurance'] +$records['parent_other']?></td>
                            </tr>

                            </tbody>
                        </table>
                        <p>المصدر : </p>
                        <p>نصيب الفرد من الدخل داخل الأسرة : </p>
                    </div>

                    <div class="col-xs-12"><hr></div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="col-xs-12">

                        <label class="background-gray"> سادساَ : الحالة الإجتماعية لأسرة الحالة :</label>
                        <br>
                    </div>

                    <div class="col-xs-12  no-padding">
                        <p class="col-xs-4"><strong>حالة الأسرة :  </strong>  </p>
                        <?php    for ($s=1;$s<sizeof($arr_family_condition);$s++){?>
                            <p class="col-xs-2 "><strong><?php echo$arr_family_condition[$s]; ?>:  </strong> ( <?php if($records['family_condition']   == $s){echo'✔';} ?> ) </p>
                        <?php } ?>
                    </div>


                </div>
            </div>
        </div>
    </section>




    <section class="main-body">
    <div class="container">
        <div class="print_forma col-xs-12 no-padding">
            <div class="researcher-report">
                <div class="col-xs-12">
                    <br>
                    <label class="background-gray"> تقرير الباحث عن الأسرة :</label>
                    <br><br>
                    <p>"<?php if ($records['researcher_report'] != '' && $records['researcher_report'] != null && !empty($records['researcher_report'])) {
                            echo $records['researcher_report'];}?>"</p>
                    
                </div>
                <div class=" col-xs-3 col-xs-offset-9 text-center bottom_footer">
                    <p>الباحث الإجتماعى :</p>
                    <p>عبد الكريم عبد الرحمن الفايز</p>
                </div>
            </div>
        </div>
    </div>
</section>



</div>

<script>
    var divElements = document.getElementById("printdiv").innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window.print();
  //  setTimeout(function () {location.replace("<?php echo base_url('disability_managers/Disability_manage/add_disabilities_persons')?>");}, 0);
//$(location).attr('href', '<?php echo base_url('disability_managers/Disability_manage/add_disabilities_persons');  ?>')
  //  window.location.replace("<?php echo base_url('disability_managers/Disability_manage/add_disabilities_persons'); ?>");
//window.location = "<?php echo base_url('disability_managers/Disability_manage/add_disabilities_persons'); ?>";


</script>
