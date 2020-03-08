<style>
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text{
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1{
        background-color:#eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text{
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
</style>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">البيانات الاساسية</a></li>
            <li><a href="#tab2" data-toggle="tab">رأى الباحث </a></li>
            <li><a href="#tab3" data-toggle="tab">طلبات الأجهزة </a></li>
        </ul>
        <!-- Tab panels -->
        <div class="tab-content">
            <!--------------------------- 11  -------------------------------------------------------------------->
            <div class="tab-pane fade in active" id="tab1">
                <!----------------------- start ------------------------------->
                <?php foreach ($peson_data as $record){?>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h5 class="text-center pop-title-text">بيانات الشخصية</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>رقم المستفيد:</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?=$record->p_num?></h6>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>إسم المستفيد:</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?=$record->p_name?></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>تاريخ الميلاد:</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?=$record->p_date_birth?></h6>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>العنوان :</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?=$record->p_address?></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>الهاتف :</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?=$record->p_mob?></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>السجل المدني :</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?=$record->p_national_num?></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>الجنسية  :</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?php if(!empty($nationality_settings)){
                                        foreach ($nationality_settings as $nationality){

                                            if($record->p_natonality_id_fk == $nationality->id){ ?>
                                                <?=$nationality->title?>
                                            <?php  }
                                        }
                                    }?> </h6>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>الحالة الإجتماعية :</b></h6>
                            </div>
                            <?php   $scoial_status = array('متزوج','أعزب','أرمل');?>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?php
                                    for($x=0 ; $x < sizeof($scoial_status) ;$x++){
                                        if($record->p_scoial_status_id_fk== $x){ ?>
                                            <?=$scoial_status[$x]?>
                                        <?php }
                                    }
                                    ?></h6>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5 class="text-center pop-title-text">بيانات الاعاقة</h5>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>نوع الإعاقة :</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?php if(!empty($types)):
                                        foreach ($types as $recordeee):
                                            if($recordeee->id == $record->disability_type_id_fk):
                                                ?>
                                                <?php echo $recordeee->title;?>
                                            <?php endif; endforeach; endif;?></h6>
                            </div>
                        </div>
                        <?php if($record->disability_type_id_fk == 1){ ?>

                            <div class="col-md-6">
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text"><b>إثبات حالة :</b></h6>
                                </div>
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text1"><?=$record->proof_status?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text"><b>إحالة للمستشفي:</b></h6>
                                </div>
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text1"><?=$record->referral_to_hospital?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text"><b>إحالة للمركز:</b></h6>
                                </div>
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text1"><?=$record->referral_to_center?></h6>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text"><b>تقرير طبي:</b></h6>
                                </div>
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text1"><?=$record->medical_report?><a style="position: absolute; left: 15px;" href="<?php echo base_url('disability_managers/Disability_manage/download/'.$record->medical_report) ?>"><i class="fa fa-download" aria-hidden="true"></i></a></h6>
                                </div>
                            </div>


                        <?php }else{  ?>
                            <div class="col-md-6">
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text"><b>درجة الإعاقة :</b></h6>
                                </div>
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text1"><?=$record->disability_degree?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text"><b>هل تستخدم أجهزة مساعدة:</b></h6>
                                </div>
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text1"><?
                                        if($record->use_devices == 1){
                                            echo 'نعم ';
                                        }else{
                                            echo 'لا ';
                                        }
                                        ?></h6>
                                </div>
                            </div>
                            <?php if($record->use_devices == 1){ ?>
                                <div class="col-md-6">
                                    <div class="col-md-6" style="padding: 0;">
                                        <h6 class="text-left pop-text"><b>إذا كان الجواب بنعم أذكرها:</b></h6>
                                    </div>
                                    <div class="col-md-6" style="padding: 0;">
                                        <h6 class="text-left pop-text1"><?=$record->use_devices_details?></h6>
                                    </div>
                                </div>
                            <?php  } ?>

                            <div class="col-md-6">
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text"><b>هل أنت مسجل لدي جمعية اخري:</b></h6>
                                </div>
                                <div class="col-md-6" style="padding: 0;">
                                    <h6 class="text-left pop-text1"><?
                                        if($record->be_in_another_society == 1){
                                            echo 'نعم ';
                                        }else{
                                            echo 'لا ';
                                        }
                                        ?></h6>
                                </div>
                            </div>

                            <?php  if($record->be_in_another_society == 1){ ?>
                                <div class="col-md-6">
                                    <div class="col-md-6" style="padding: 0;">
                                        <h6 class="text-left pop-text"><b>:إذا كان الجواب بنعم أذكرها</b></h6>
                                    </div>
                                    <div class="col-md-6" style="padding: 0;">
                                        <h6 class="text-left pop-text1"><?=$record->society_name?></h6>
                                    </div>
                                </div>
                            <?php  } ?>
                        <?php  } ?>

                        <div class="col-md-12">
                            <h5 class="text-center pop-title-text">بيانات الاتصال</h5>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>جوال:</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?=$record->contact_mob?></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>هاتف:</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?=$record->contact_phone?></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>جوال ولي الامر:</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?=$record->contact_father_mob?></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>إسم ولي الأمر:</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?=$record->contact_father_name?></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text"><b>بريد الكتروني:</b></h6>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <h6 class="text-left pop-text1"><?=$record->contact_email?></h6>
                            </div>
                        </div>

                        <?php if(isset($files) && !empty($files)){ ?>
                            <div class="col-md-12">
                                <h5 class="text-center pop-title-text">المرفقات </h5>
                            </div>

                            <div class="col-xs-12">
                                <table class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th style="color: #ffffff; background-color: #009688;">م</th>
                                        <th style="color: #ffffff; background-color: #009688;">المرفق</th>
                                        <th style="color: #ffffff; background-color: #009688; ">تحميل </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $a=1;
                                    foreach ($files as $row):
                                        ?>
                                        <tr>
                                            <td><?php  echo $a ;?></td>
                                            <td> <?php echo $row->file?></td>
                                            <td><a href="<?php echo base_url('disability_managers/Disability_manage/download/'.$row->file) ?>"><i class="fa fa-download" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        <?php  $a++;  endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php }?>

                    </div>
                <?php } ?>
                <!------------------------- end ----------------------------->
            </div>
            <!--------------------------- 22  -------------------------------------------------------------------->
            <div class="tab-pane fade" id="tab2">
                <!----------------------- start ------------------------------->
                   <?php   $arr_social =array('','أرمل','أعزب','مطلق');?>
           
           
            <?php if ($table['disability_features']!= '' && $table['disability_features'] != null && !empty($table['disability_features'])) {?>
                <div class="col-sm-12" style="padding-top: 20px;padding-bottom: 20px;">
                    <h6 class="text-center inner-heading"> معلومات عاملة عن الحالة </h6>
                </div>
                <!------------------------------------>
                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">إسم المستفيد </label>
                        <input type="text" name="" class="form-control half input-style" placeholder="إسم المستفيد " readonly="readonly" value="<?php echo $person_data['p_name']; echo'&nbsp;'; echo $person_data['contact_father_name'];?>">
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half"> الجنسية</label>
                        <input type="text" name="" class="form-control half input-style"  placeholder="الجنسية" readonly="readonly" value="<?php if(!empty($arr_nationality[$person_data['p_natonality_id_fk']]) && $arr_nationality[$person_data['p_natonality_id_fk']] !=''){ echo $arr_nationality[$person_data['p_natonality_id_fk']]; }?>">
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">تاريخ الميلاد  </label>
                        <input type="text" id="" name="" placeholder="تاريخ الميلاد "  class="form-control docs-date input-style half" readonly="readonly" value="<?php if(!empty($person_data['p_date_birth']) && $person_data['p_date_birth'] !=''){ echo $person_data['p_date_birth']; }?>">

                    </div>
                </div>
                <!------------------------------------>
                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">رقم السجل المدني </label>
                        <input type="text" name="" class="form-control half input-style" placeholder="رقم السجل المدني" readonly="readonly" value="<?php  if(!empty($person_data['p_national_num']) && $person_data['p_national_num'] !=''){ echo $person_data['p_national_num']; }?>" >
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الحالة الإجتماعية </label>
                        <input type="text" name="" class="form-control half input-style" readonly="readonly" value="<?php if(!empty($arr_social[$person_data['p_scoial_status_id_fk']]) && $arr_social[$person_data['p_scoial_status_id_fk']] !=''){ echo $arr_social[$person_data['p_scoial_status_id_fk']]; }?>">
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <div id="optionearea1"></div>
                        <label class="label label-green  half">الحالة العلمية </label>
                        <input type="text" name="" id="" class="form-control half input-style" placeholder="الحالة العلمية"  readonly="readonly"  value="<?php if(!empty($arr_scientific_qualification[$person_data['scientific_qualitication']]) && $arr_scientific_qualification[$person_data['scientific_qualitication']] !=''){ echo $person_data['scientific_qualitication'];} ?>">
                    </div>
                </div>
                <!------------------------------------>
                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">سمات الإعاقة </label>
                        <input type="text" name="disability_features" class="form-control half input-style" placeholder="سمات الإعاقة" readonly="readonly"  value="<?php echo $table['disability_features']?>">
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">درجة الإعاقة </label>
                        <input type="number" name="" class="form-control half input-style" placeholder="ادرجة الإعاقة" readonly="readonly" value="<?php if(!empty($person_data['disability_degree']) && $person_data['disability_degree'] !=''){ echo $person_data['disability_degree']; }?>">
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">متي بدأت الأعراض </label>
                        <input type="text" id="disease_start_date" name="disease_start_date" placeholder="متي بدأت الأعراض"  readonly="readonly"  class="form-control docs-date input-style half" value="<?php echo $table['disease_start_date']?>" >
                    </div>
                </div>
                <!------------------------------------>
            <?php } ?>
            <div class="col-sm-12" style="padding-top: 20px;padding-bottom: 20px;">
                <h6 class="text-center inner-heading">  مصدر الدخل للمعاق(المعدل الشهري) </h6>
            </div>
            <table id = "" class = "table table-striped table-bordered " cellspacing = "0" width = "100%" >
                <thead >
                <tr >
                    <th class="text-center" > راتب العمل</th>
                    <th class="text-center" > الضمان الإجتماعي</th>
                    <th class="text-center" > التأهيل الشامل</th>
                    <th class="text-center" > التأمينات الإجتماعية</th>
                    <th class="text-center" > المجموع الشهري</th>
                </tr >
                </thead >
                <tbody >
                <tr >
                    <td class="text-center " ><?php echo $table['salary'];?></td>
                    <td class="text-center "><?php echo $table['social_security'];?></td>
                    <td class="text-center "><?php echo $table['qualification'];?></td>
                    <td class="text-center "><?php echo $table['insurance'];?></td>
                    <td class="text-center " id="all_sum" ><?php echo $table['insurance']+$table['salary']+$table['social_security']+$table['qualification'];?></td>
                </tr>
                </tbody>
            </table>


            <div class="col-sm-12" style="padding-top: 20px;padding-bottom: 20px;">
                <h6 class="text-center inner-heading">معلومات عن رب الاسرة وولي الأمر </h6>
            </div>

            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم ولي الأمر(رباعيا) </label>
                    <input type="text" name="parent_name" readonly class="form-control half input-style" placeholder="إسم ولي الأمر(رباعيا)"  value="<?php echo $table['parent_name'];?>">
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> صلة القرابة بالحالة</label>
                    <select name="relative_relation" class="form-control half" disabled>
                        <option value="">إختر</option>
                        <?php if($relative_relation !='' &&  $relative_relation !=null){  foreach ($relative_relation as $record){
                            $select= '';  if($table['relative_relation'] == $record->id){ $select='selected'; }
                            ?>
                            <option value="<?php echo$record->id ?>" <?php echo $select;?>  ><?php echo$record->title ?></option>
                        <?php }  } ?>
                    </select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الجنسية  </label>
                    <select name="relative_nationality" class="form-control half"  disabled>
                        <option value="">إختر</option>
                        <?php if($nationality !='' &&  $nationality !=null){  foreach ($nationality as $record){
                            $select= '';  if($table['relative_nationality'] == $record->id){ $select='selected'; }
                            ?>
                            <option value="<?php echo$record->id ?>" <?php echo $select;?> ><?php echo$record->title ?></option>
                        <?php }  } ?>
                    </select>

                </div>
            </div>
            <!------------------------------------>
            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الهوية </label>
                    <input type="text" name="id_number" class="form-control half input-style" placeholder="رقم الهوية"   readonly value="<?php echo $table['id_number'];?>"  >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تاريخها </label>
                    <input type="text" id="id_date" name="id_date" placeholder="تاريخها"   readonly class="form-control docs-date input-style half"  value="<?php echo $table['id_date'];?>"   >
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <div id="optionearea1"></div>
                    <label class="label label-green  half">مكان الإصدار </label>
                    <input type="text" name="id_place" id="id_place" class="form-control half input-style" readonly placeholder="مكان الإصدار " value="<?php echo $table['id_place'];?>"  >
                </div>
            </div>
            <!------------------------------------>
            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الحالة الإجتماعية </label>
                    <select name="social_status" class="form-control half" disabled>
                        <option value="">إختر</option>
                        <?php if($arr_social !='' &&  $arr_social !=null){  for($a=1;$a<sizeof($arr_social);$a++){
                            $select= '';  if($table['social_status'] == $a){ $select='selected'; }
                            ?>
                            <option value="<?php echo$a?>" <?php echo $select;?> ><?php echo$arr_social[$a] ?></option>
                        <?php }  } ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">تاريخ الميلاد </label>
                    <input type="text" name="parent_date_of_birth"  readonly class="form-control half input-style docs-date" placeholder="تاريخ الميلاد "  value="<?php echo $table['parent_date_of_birth'];?>"  >
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الحالة التعليمية  </label>
                    <select name="educational_status" class="form-control half" disabled>
                        <option value="">إختر</option>
                        <?php if($scientific_qualification !='' &&  $scientific_qualification!=null){ foreach ($scientific_qualification as $record){
                            $select= '';  if($records->educational_status == $record->id){ $select='selected'; }
                            ?>
                            <option value="<?php echo$record->id ?>" <?php echo $select;?>><?php echo$record->science_degree ?></option>
                        <?php }  } ?>
                    </select>
                </div>
            </div>
            <!------------------------------------>
            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> المؤهل </label>
                    <input type="text" name="parent_qualification"  readonly class="form-control half input-style" placeholder="المؤهل" value="<?php echo $table['parent_qualification'];?>"  >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">المهنة </label>
                    <input type="text" name="parent_job" class="form-control half input-style " readonly  placeholder="المهنة "  value="<?php echo $table['parent_job'];?>"  >
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مكان العمل  </label>
                    <input type="text" name="job_place" class="form-control half input-style"  readonly placeholder="مكان العمل"  value="<?php echo $table['job_place'];?>"  >
                </div>
            </div>
            <!------------------------------------>
            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الجهة</label>
                    <input type="text" name="entity" class="form-control half input-style" readonly placeholder="الجهة" value="<?php echo $table['entity'];?>" >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">المدينة </label>
                    <input type="text" name="city" class="form-control half input-style " placeholder="المدينة " readonly value="<?php echo $table['city'];?>">
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هاتف العمل  </label>
                    <input type="text" name="work_mobile" class="form-control half input-style" placeholder="هاتف العمل  " readonly  value="<?php echo $table['work_mobile'];?>">
                </div>
            </div>
            <!------------------------------------>
            <?php $arr =array('إختر','نعم','لا');?>
            <!------------------------------------>
            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هل الأب على قيد الحياة</label>
                    <select name="father_death" id="father_death" class="form-control half"   onchange="getFather($('#father_death').val());" disabled>
                        <option value="">إختر</option>
                        <?php foreach ($arr as $key => $record){ $select=''; if($table['father_death']==$key){$select='selected';}?>
                            <option value="<?php echo $key?>" <?php echo $select;?>><?php echo $record?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هل الأم على قيد الحياة</label>
                    <select name="mother_death" id="mother_death" class="form-control half"   onchange="getMother($('#mother_death').val());" disabled>
                        <option value="">إختر</option>
                        <?php foreach ($arr as $key => $record){ $select=''; if($table['mother_death']==$key){$select='selected';}?>
                            <option value="<?php echo $key?>" <?php echo $select;?>><?php echo $record?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php if($table['father_death'] ==2 ){?>

                    <div class="form-group col-sm-4 col-xs-12" id="father_death_year">
                        <label class="label label-green  half">سنة الوفاة</label>
                        <input type="text" name="father_death_year" class="form-control half input-style" placeholder="سنة الوفاة" readonly value="<?php echo $table['father_death_year'];?>" >
                    </div>

                <?php }?>

                <?php if($table['mother_death'] ==2 ){?>

                    <div class="form-group col-sm-4 col-xs-12" id="mother_death_year">
                        <label class="label label-green  half">سنة الوفاة</label>
                        <input type="text" name="mother_death_year" class="form-control half input-style" placeholder="سنة الوفاة"  readonly value="<?php echo $table['mother_death_year'];?>" >
                    </div>


                <?php }?>
                <div class="form-group col-sm-4 col-xs-12" style="display: none" id="father_death_year">
                    <label class="label label-green  half">سنة الوفاة</label>
                    <input type="text" name="father_death_year" class="form-control half input-style" placeholder="سنة الوفاة"  value="<?php echo $table['father_death_year'];?>" >
                </div>
                <div class="form-group col-sm-4 col-xs-12" style="display: none" id="mother_death_year">
                    <label class="label label-green  half">سنة الوفاة</label>
                    <input type="text" name="mother_death_year" class="form-control half input-style" placeholder="سنة الوفاة"   value="<?php echo $table['mother_death_year'];?>" >
                </div>


            </div>
            <!------------------------------------>

            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مكان الإقامة  </label>
                    <input type="text" name="staying_place" class="form-control half input-style" placeholder="مكان الإقامة   " readonly value="<?php echo $table['staying_place'];?>"  >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الحي</label>
                    <input type="text" name="district" class="form-control half input-style" placeholder="الحي" readonly value="<?php echo $table['district'];?>"  >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الموقع </label>
                    <input type="text" name="Location" class="form-control half input-style " placeholder="الموقع " readonly value="<?php echo $table['Location'];?>">
                </div>
            </div>
            <!------------------------------------>
            <div class="col-sm-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هاتف المنزل  </label>
                    <input type="text" name="home_mobile" class="form-control half input-style" placeholder="هاتف المنزل  " readonly value="<?php echo $table['home_mobile'];?>" >
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">إسم وهاتف شخص قريب</label>
                    <input type="text" name="nearby_person" class="form-control half input-style" placeholder="إسم وهاتف شخص قريب" readonly  value="<?php echo $table['nearby_person'];?>" >
                </div>

            </div>

            <div class="col-sm-12" style="padding-top: 20px;padding-bottom: 20px;">
                <h6 class="text-center inner-heading">التكوين الاسري للحالة(من واقع دفتر العائلة والإقامة)</h6>
            </div>

            <table class="table table-bordered" id="tab_logic"  >
                <thead>
                <th>م</th>
                <th>الإسم</th>
                <th>صلة القرابة</th>
                <th>تاريخ الميلاد</th>
                <th>المهنة/طالب/يعمل</th>
                <th>المستوى التعليمي</th>
                <th>الحالة الإجتماعية</th>
                <th>ملاحظات</th>
                </thead>
                <tbody>
                <?php if(!empty($family_relationship)){
                    $r=0;
                    foreach($family_relationship as $record): ?>
                        <tr class="">
                            <td><?php echo ++$r; ?></td>
                            <td> <?php echo $record->name ?></td>
                            <td> <?php echo $record->relative_relation_title?></td>
                            <td> <?php echo $record->date_of_birth?></td>
                            <td> <?php echo $record->job?></td>
                            <td> <?php echo $record->educational_status_title?></td>
                            <td><?php if (isset($arr_social[$record->social_status])) {
                                    echo $arr_social[$record->social_status];}?></td>
                            <td> <?php echo $record->details?></td>

                        </tr>
                    <?php endforeach;
                }?>
                </tbody>
            </table>


            <div class="col-sm-12" style="padding-top: 20px;padding-bottom: 20px;">
                <h6 class="text-center inner-heading">الحالة الإقتصادية لأسرة الحالة</h6>
            </div>
            <?php $arr_house_type=array('','ملك','مشترك','مستأجر','شعبي','عربي','غير ذلك');
            $arr_house_condition=array('','نظيف','متوسط','غيرنظيف');
            $arr_trans=array('','يوجد','لايوجد'); ?>


            <div class="col-sm-10">
                <?php $arr_house_type=array('','ملك','مشترك','مستأجر','شعبي','عربي','غير ذلك');
                $arr_house_condition=array('','نظيف','متوسط','غيرنظيف');
                $arr_trans=array('','يوجد','لايوجد');
                ?>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">نوع المسكن</label>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <?php for($d=1;$d<sizeof($arr_house_type);$d++){ $checked=''; if($table['house_type'] ==$d){ $checked='checked';}?>
                        <input type="radio" name="house_type"  <?php echo $checked;?> disabled  value="<?php echo $d;?>">
                        <label><?php echo $arr_house_type[$d];?> </label>&nbsp;
                    <?php } ?>
                </div>
            </div>

            <div class="col-sm-10">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">حالة المسكن</label>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <?php for($d=1;$d<sizeof($arr_house_condition);$d++){  $checked=''; if($table['house_condition'] ==$d){ $checked='checked';}?>
                        <input type="radio" name="house_condition"  <?php echo $checked;?> disabled  value="<?php echo $d;?>">
                        <label><?php echo $arr_house_condition[$d];?> </label>&nbsp;
                    <?php } ?>
                </div>
            </div>

            <div class="col-sm-10">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">وسيلة النقل</label>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <?php for($d=1;$d<sizeof($arr_trans);$d++){ $checked=''; if($table['transport'] ==$d){ $checked='checked';}?>
                        <input type="radio" name="transport"   <?php echo $checked;?> disabled  value="<?php echo $d;?>">
                        <label><?php echo $arr_trans[$d];?> </label>&nbsp;
                    <?php } ?>
                </div>
            </div>

            <div class="col-sm-10">
                <div class="form-group col-sm-5 col-xs-12">
                    <label class="label label-green  half">عدد الغرف </label>
                    <input type="text" name="room_number" class="form-control half input-style" placeholder="عدد الغرف"    readonly value="<?php echo $table['room_number'];?>"    >
                </div>
                <div class="form-group col-sm-5 col-xs-12">
                    <label class="label label-green  half">عدد الحمامات </label>
                    <input type="text" id="" name="path_number" placeholder="عدد الحمامات"  readonly value="<?php echo $table['path_number'];?>" class="form-control input-style half"     >
                </div>

            </div>


            <div class="col-sm-12" style="padding-top: 20px;padding-bottom: 20px;">
                <h6 class="text-center inner-heading">مصادر الدخل لرب الأسرة (المعدل الشهري) </h6>
            </div>

            <table id = "" class = "table table-striped table-bordered " cellspacing = "0" width = "100%" >
                <thead >
                <tr >
                    <th class="text-center" > راتب العمل</th>
                    <th class="text-center" > الضمان الإجتماعي</th>
                    <th class="text-center" > التأمينات الإجتماعية</th>
                    <th class="text-center" > معاش التقاعد</th>
                    <th class="text-center" > غيرذلك</th>
                    <th class="text-center" > المجموع الشهري</th>
                </tr >
                </thead >
                <tbody >
                <tr >
                    <td class="text-center " ><?php echo $table['parent_salary'];?></td>
                    <td class="text-center "><?php echo $table['parent_social_security'];?></td>
                    <td class="text-center "><?php echo $table['parent_insurance'];?></td>
                    <td class="text-center "><?php echo $table['parent_retirement_pension'];?></td>
                    <td class="text-center "><?php echo $table['parent_other'];?></td>
                    <td class="text-center " id="all_sum_money" ><?php echo $table['parent_insurance']+$table['parent_salary']+$table['parent_social_security']+$table['parent_retirement_pension']+$table['parent_other'];?></td>
                </tr>
                </tbody>
            </table>

            <p>نصيب الفرد من الدخل داخل الأسرة :  </p>
            <?php  $arr_family_condition=array('','زواج قائم','طلاق','أرمل','غيرمرتبط'); ?>
            <div class="col-sm-12" style="padding-top: 20px;padding-bottom: 20px;">
                <h6 class="text-center inner-heading"> الحالة الإجتماعية لأسرة الحالة </h6>
            </div>

            <div class="col-sm-10">
                <?php
                $arr_family_condition=array('','زواج قائم','طلاق','ترمل','غيرمرتبط');
                ?>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">حالة الأسرة</label>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <?php for($d=1;$d<sizeof($arr_family_condition);$d++){ $checked=''; if($d == $table['family_condition']){$checked='checked';}?>
                        <input type="radio" name="family_condition"  <?php echo $checked;?> disabled value="<?php echo $d;?>">
                        <label><?php echo $arr_family_condition[$d];?> </label>&nbsp;
                    <?php } ?>
                </div>
            </div>
            <!------------------------------------>
            <div class="col-sm-12">
                <div class="form-group col-sm-8 col-xs-12">
                    <label class="label label-green  half">تقرير الباحث عن الاسرة </label>
                    <textarea  class="form-control"  name="researcher_report"   readonly cols="30" rows="10"><?php echo $table['researcher_report'];?></textarea>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                </div>
            </div>

            <!--------------end---------------------->     
                
                
                <!------------------------- end ------------------------------->
            </div>
            <!--------------------------- 33  -------------------------------------------------------------------->
            <div class="tab-pane fade" id="tab3">
                <!----------------------- start ------------------------------->
                <?php if(isset($order_table) && !empty($order_table) && $order_table!=null ){?>
                <table id="" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th> رقم الطلب  </th>
                        <th> تاريخ الطلب  </th>
                        <th> إسم الجهاز   </th>
                        <th> العدد    </th>
                        <th>   المؤسسات الطبيه</th>
                        <th> الحالة </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x=1;foreach ($order_table as $row){?>
                        <tr>
                            <td><?=$x++?></td>
                            <td><?=$row->order_num?></td>
                            <td><?=$row->order_date?></td>
                            <td><?=$row->title?></td>
                            <td><?=$row->amount_device?></td>
                            <td>
           
                            <?php if($row->approved_device == 0){
                                     echo  '<span class="label-custom label label-default"> لم يتم التحديد </span>';
                                 }elseif($row->approved_device == 1){
                                     echo '<span class="label-custom label label-info">متوافر لدى الجمعية </span>'; 
                                 }elseif($row->approved_device == 2){
                                     echo '<span class="label-custom label label-success">'.$row->company_name.'</span>'; 
                                 }
                                 ?>
                                  
                            </td>
                           
                            <td>
                             <?php if($row->confirm_sarf == 0){
                                     echo  '<span class="label-custom label label-default"> لم يتم الاجراء </span>';
                                 }elseif($row->confirm_sarf == 1){
                                     echo '<span class="label-custom label label-warning">  تم الاعتماد  </span>'; 
                                 }elseif($row->confirm_sarf == 2){
                                     echo '<span class="label-custom label label-danger">  تم رفض الاعتماد   </span> ';
                                 }?>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                <?php }?>
                <!------------------------- end ----------------------------->
            </div>
        </div>

        <!-- Nav tabs -->
        <?php if(isset($buttun_roles) && !empty($buttun_roles) && $buttun_roles !=null){?>
            <div class="col-sm-12">
                <?php $arr_prosess=array("1"=>" قبول الملف","2"=>" رفض الملف","3"=>" تحويل الملف","4"=>"إعتماد الملف")?>
                <?php $arr_but_color=array("1"=>"success","2"=>"danger","3"=>"warning","4"=>"purple")?>
                <?php $arr_but_icon=array("1"=>"check-square-o","2"=>"window-close","3"=>"paper-plane","4"=>"floppy-o")?>
                <div class="col-sm-2"></div>
                <?php foreach ($buttun_roles as $row=>$value){?>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-<?=$arr_but_color[$value]?> w-md m-b-5" data-toggle="modal" data-target="#modal-sm-<?=$value?>">
                            <span><i class="fa fa-<?=$arr_but_icon[$value]?>" aria-hidden="true"></i></span><?=$arr_prosess[$value]?>
                        </button>
                    </div>
                <?php }?>
                <div class="col-sm-2"></div>
            </div>
        <?php }?>
        <!--------------------------------------------------------------------------------------------------------->
        <?php if(isset($all_operation) && $all_operation!=null):?>

            <h4 class="r-head"> الاجراءات المتخذة</h4>
            <table class=" display table table-bordered table-striped table-hover">
                <tr class="info">
                    <th>م </th>
                    <th>من</th>
                    <th> الي</th>
                    <th>الحالة </th>
                    <th>التاريخ </th>
                    <th>الوقت</th>
                    <th>الاجراءات </th>
                    <th> ملاحظات </th>
                </tr>  <!-- Y-m-d H:i:s -->
                <?php $count=1; foreach($all_operation as $row):?>
                    <tr>
                        <td><?php echo $count++?></td>
                        <td><?php echo  $jobs_name[$row->family_file_from]->name?></td>
                        <td><?php echo  $jobs_name[$row->family_file_to]->name?></td>
                        <td><?php if($row->process ==1){
                                echo ' قبول الملف';
                            }elseif($row->process ==2){
                                echo 'رفض الملف';
                            }elseif($row->process ==3){
                                echo 'للإطلاع عند'.$jobs_name[$row->family_file_to]->name;
                            }elseif($row->process ==4){
                                echo 'اعتماد الملف';
                            }?>
                        </td>
                        <td> <?php echo date("Y-m-d",$row->date);?></td>
                        <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                        <td><?php if($row->process ==1){
                                echo 'قبول';
                            }elseif($row->process ==2){
                                echo 'رفض';
                            }elseif($row->process ==3){
                                echo 'تحويل';
                            }elseif($row->process ==4){
                                echo 'اعتماد';
                            }?>
                        </td>
                        <td><?php echo $row->reason ?></td>
                    </tr>
                <?php endforeach;?>
            </table>



        <?php endif?>
        <!--------------------------------------------------------------------------------------------------------->

    </div>
</div>

<?php if(isset($buttun_roles) && !empty($buttun_roles) && $buttun_roles !=null){?>
    <?php foreach ($buttun_roles as $row=>$value){?>
        <div class="modal fade" id="modal-sm-<?=$value?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-success " role="document">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span></button>-->
                        <h1 class="modal-title"><?=$arr_prosess[$value]?></h1>
                    </div>
                    <div class="modal-body row">
                        <?php echo form_open_multipart('disability_managers/DisabilityArchive/OperationInFile/'.$value."/".$file_id);?>
                        <?if($value !=4){?>
                            <div class="col-sm-12">
                                <label class="label label-green  half">  الى  </label>
                                <select class="form-control half " name="family_file_to"  >
                                    <option >اختر</option>
                                    <?php if(isset($convent) && $convent!=null):
                                        foreach($convent as $one): ?>
                                            <option value="<?php echo $one->id;?>"><?php echo $one->name; ?></option>
                                        <?php endforeach; endif;?>
                                </select>
                            </div>
                        <?}?>
                        <div class="col-sm-12">
                            <?php if($value == 3 || $value == 4){$word ="ملاحضات";}else{$word ="الأسباب";}?>
                            <label class="label label-green  half" ><?=$word?>: </label>
                            <textarea class="form-control half input-style"  rows="3" name="reason"  required="" ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        <button type="submit" name="operation"  value="operation" class="btn btn-<?=$arr_but_color[$value]?>"><?=$arr_prosess[$value]?></button>
                    </div>
                    <?php echo form_close()?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php }?>
<?php }?>
