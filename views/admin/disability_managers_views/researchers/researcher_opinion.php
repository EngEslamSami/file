<style>
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }

    .button_style{
        background: #5a8a12;
        color: white;
        padding-left: 10px;
        border-radius: 5px;

    }
</style>
<script>
    window.addEventListener("load", function(){

        $("#tawahod").hide();
    });

</script>


<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <?php
        /*
               
                if($scientific_qualification!='' && $scientific_qualification !=null){

                    $arr_scientific_qualification =array();
                    foreach($scientific_qualification as $record){
                        if(isset($arr_scientific_qualification[$record->id])){
                        $arr_scientific_qualification[$record->id] =    $record->science_degree;
                        }
                    }

                }
                if($relative_relation!='' && $relative_relation !=null) {
                    $arr_relative = array();
                    foreach ($relative_relation as $k => $v) {
                        if(isset($arr_relative[$v->id])){
                        $arr_relative[$v->id] = $v->title;
                        }
                    }
                }
           */


        $arr_social =array('','أرمل','أعزب','مطلق');


        ?>
        <div class="panel-body">

            <?php if($table['disability_features'] ==null && $table['disease_start_date'] ==null){?>
                <?php echo form_open_multipart("disability_managers/Reasercher/Add_researcher_opinion/".$person_data['id'])?>


                <div class="col-sm-12">
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
                        <input type="text" name="" class="form-control half input-style" value="" placeholder="الجنسية" readonly="readonly" value="<?php if(!empty($arr_nationality[$person_data['p_natonality_id_fk']]) && $arr_nationality[$person_data['p_natonality_id_fk']] !=''){ echo $arr_nationality[$person_data['p_natonality_id_fk']]; }?>">
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">تاريخ الميلاد  </label>
                        <input type="text" id="" name="" placeholder="تاريخ الميلاد "  class="form-control docs-date input-style half" readonly="readonly" value="<?php if(!empty($person_data['p_date_birth']) && $person_data['p_date_birth'] !=''){ echo $person_data['p_date_birth'];} ?>">

                    </div>
                </div>
                <!------------------------------------>
                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">رقم السجل المدني </label>
                        <input type="text" name="" class="form-control half input-style" placeholder="رقم السجل المدني" readonly="readonly" value="<?php if(!empty($person_data['p_national_num']) && $person_data['p_national_num'] !=''){ echo $person_data['p_national_num']; } ?>" >
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الحالة الإجتماعية </label>
                        <input type="text" name="" class="form-control half input-style" placeholder="الحالة الإجتماعية" readonly="readonly" value="<?php if(!empty($arr_social[$person_data['p_scoial_status_id_fk']]) && $arr_social[$person_data['p_scoial_status_id_fk']] !=''){ echo $arr_social[$person_data['p_scoial_status_id_fk']]; }?>">
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <div id="optionearea1"></div>
                        <label class="label label-green  half">الحالة العلمية </label>
                        <input type="text" name="" id="" class="form-control half input-style" placeholder="الحالة العلمية"  readonly="readonly"  value="<?php  if(!empty($arr_scientific_qualification[$person_data['scientific_qualitication']]) && $arr_scientific_qualification[$person_data['scientific_qualitication']] !=''){ echo $arr_scientific_qualification[$person_data['scientific_qualitication']]; }?>">
                    </div>
                </div>
                <!------------------------------------>
                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">سمات الإعاقة </label>
                        <input type="text" name="disability_features" class="form-control half input-style" placeholder="سمات الإعاقة" data-validation="required" >
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">درجة الإعاقة </label>
                        <input type="number" name="" class="form-control half input-style" placeholder="ادرجة الإعاقة" readonly="readonly" value="<?php echo $person_data['disability_degree']; ?>">
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">متي بدأت الأعراض </label>
                        <input type="text" id="disease_start_date" name="disease_start_date" placeholder="متي بدأت الأعراض"  class="form-control docs-date input-style half" data-validation="required" >
                    </div>
                </div>
                <!------------------------------------>
                <div class="col-xs-12 ">
                    <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                </div>
                <?php  echo form_close()?>
            <?php }else{ ?>
                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">المستفيد</th>
                        <th class="text-center">التفاصيل</th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center"><?php echo $person_data['p_name']; echo'&nbsp;'; echo $person_data['contact_father_name'];?></td>
                        <td class="text-center"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal">التفاصيل</button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                        </div>

                                        <div class="modal-body">
                                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>إسم المستفيد</th><td><?php echo $person_data['p_name']; echo'&nbsp;'; echo $person_data['contact_father_name'];?></td>
                                                    <th>الجنسية</th><td><?php if(!empty($arr_nationality[$person_data['p_natonality_id_fk']]) && $arr_nationality[$person_data['p_natonality_id_fk']] !=''){ echo $arr_nationality[$person_data['p_natonality_id_fk']]; }?></td>
                                                </tr>
                                                <tr>
                                                    <th>تاريخ الميلاد</th><td><?php echo $person_data['p_date_birth']; ?></td>
                                                    <th>رقم السجل المدني </th><td><?php echo $person_data['p_national_num']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>الحالة الإجتماعية</th><td><?php if(!empty($arr_social[$person_data['p_scoial_status_id_fk']]) && $arr_social[$person_data['p_scoial_status_id_fk']] !=''){ echo $arr_social[$person_data['p_scoial_status_id_fk']]; }?></td>
                                                    <th>الحالة العلمية</th><td><?php if(!empty($arr_scientific_qualification[$person_data['scientific_qualitication']]) && $arr_scientific_qualification[$person_data['scientific_qualitication']] !=''){ echo $person_data['scientific_qualitication'];} ?></td>
                                                </tr>
                                                <tr>
                                                    <th>سمات الإعاقة</th><td><?=$table['disability_features']?></td>
                                                    <th>درجة الإعاقة</th><td><?php echo $person_data['disability_degree']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>متي بدأت الأعراض</th><td><?=$table['disease_start_date']?></td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="#" data-toggle="modal"  class="button_style" data-target="#myModaledit"><i class="fa fa-pencil " aria-hidden="true"> </i>  تعديل</a></td>
                        <div class="modal fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document" style="width: 81%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                                    </div>
                                    <?php

                                    if($nationality !='' && $nationality !=null){

                                        $arr_nationality =array();
                                        foreach($nationality as $record){
                                            $arr_nationality[$record->id] =    $record->title;
                                        }

                                    }


                                    ?>
                                    <div class="modal-body">
                                        <?php echo form_open_multipart("disability_managers/Reasercher/Add_researcher_opinion/".$person_data['id'])?>

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
                                                <input type="text" name="disability_features" class="form-control half input-style" placeholder="سمات الإعاقة" data-validation="required"  value="<?php echo $table['disability_features']?>">
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">درجة الإعاقة </label>
                                                <input type="number" name="" class="form-control half input-style" placeholder="ادرجة الإعاقة" readonly="readonly" value="<?php if(!empty($person_data['disability_degree']) && $person_data['disability_degree'] !=''){ echo $person_data['disability_degree']; }?>">
                                            </div>

                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">متي بدأت الأعراض </label>
                                                <input type="text" id="disease_start_date" name="disease_start_date" placeholder="متي بدأت الأعراض"  class="form-control docs-date input-style half" data-validation="required" value="<?php echo $table['disease_start_date']?>" >
                                            </div>
                                        </div>
                                        <!------------------------------------>
                                        <div class=" ">
                                            <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                                                <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                                        </div>
                                        <?php  echo form_close()?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"  style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    </tbody>
                </table>
            <?php  } ?>
        </div>
    </div>
</div>



<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> مصدر الدخل للمعاق(المعدل الشهري)</h3>
        </div>
        <div class="panel-body">
            <?php if($table['salary'] ==null && $table['social_security'] ==null && $table['qualification'] ==null && $table['insurance'] ==null){?>
                <?php echo form_open_multipart("disability_managers/Reasercher/Add_researcher_opinion/".$person_data['id'])?>
                <div class="col-sm-12">
                    <h6 class="text-center inner-heading"> مصدر الدخل للمعاق(المعدل الشهري) </h6>
                </div>
                <table id = "" class = "table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
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
                        <td class="text-center " ><input type="number" data-validation="required" name="salary" onkeyup="total();" class="myClass" value="0"></td>
                        <td class="text-center "><input type="number" data-validation="required" name="social_security" onkeyup="total();"  class="myClass" value="0"></td>
                        <td class="text-center "><input type="number" data-validation="required" name="qualification" onkeyup="total();" class="myClass" value="0"></td>
                        <td class="text-center "><input type="number" data-validation="required" name="insurance" onkeyup="total();" class="myClass" value="0"></td>
                        <td class="text-center " id="all_sum" ></td>
                    </tr>
                    </tbody>
                </table>

                <div class="col-xs-12 ">
                    <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                </div>
                <?php  echo form_close()?>
            <?php }else{ ?>
                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">التفاصيل</th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalp">التفاصيل</button>
                            <div class="modal fade" id="myModalp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>راتب العمل</th><td><?php echo $table['salary'];?></td>
                                                    <th>الضمان الإجتماعي</th><td><?php echo $table['social_security'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>التأهيل الشامل</th><td><?php echo $table['qualification']; ?></td>
                                                    <th>التأمينات الإجتماعية </th><td><?php echo $table['insurance']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>المجموع الشهري</th><td><?php echo $table['insurance']+$table['salary']+$table['social_security']+$table['qualification'];?></td>
                                                </tr>

                                                </thead>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"> <a href="#"   class="button_style" data-toggle="modal" data-target="#myModalincome"><i class="fa fa-pencil " aria-hidden="true"></i> تعديل</a></td>
                    </tr>
                    </tbody>
                </table>

                <div class="modal fade" id="myModalincome" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="width: 81%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open_multipart("disability_managers/Disability_manage/Add_researcher_opinion/".$person_data['id'])?>

                                <!------------------------------------>
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
                                        <td class="text-center " ><input type="number" data-validation="required"  name="salary" onkeyup="total();" class="myClass" value="<?php echo $table['salary'];?>"></td>
                                        <td class="text-center "><input type="number"data-validation="required" name="social_security" onkeyup="total();"  class="myClass" value="<?php echo $table['social_security'];?>"></td>
                                        <td class="text-center "><input type="number"data-validation="required" name="qualification" onkeyup="total();" class="myClass" value="<?php echo $table['qualification'];?>"></td>
                                        <td class="text-center "><input type="number"data-validation="required" name="insurance" onkeyup="total();" class="myClass" value="<?php echo $table['insurance'];?>"></td>
                                        <td class="text-center " id="all_sum" ><?php echo $table['insurance']+$table['salary']+$table['social_security']+$table['qualification'];?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="">
                                    <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                                </div>
                                <?php  echo form_close()?>
                            </div>
                            <div class="modal-footer">
                                <button type="button"  style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php  } ?>
        </div>
    </div>
</div>


<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">معلومات عن رب الاسرة وولي الأمر </h3>
        </div>
        <div class="panel-body">
            <?php if($table['parent_name'] ==null&& $table['relative_relation'] ==null&& $table['relative_nationality'] ==null&& $table['id_number'] ==null
                && $table['id_date'] ==null&& $table['id_place'] ==null&& $table['social_status'] ==null&& $table['parent_date_of_birth'] ==null
                && $table['educational_Status'] ==null
                && $table['parent_qualification'] ==null && $table['parent_job'] ==null && $table['job_place'] ==null&& $table['entity'] ==null&& $table['city'] ==null
                && $table['work_mobile'] ==null && $table['father_death'] ==null && $table['mother_death'] ==null && $table['staying_place'] ==null && $table['district'] ==null
                && $table['Location'] ==null&& $table['home_mobile'] ==null && $table['nearby_person'] ==null){?>
                <?php echo form_open_multipart("disability_managers/Reasercher/Add_researcher_opinion/".$person_data['id'])?>
                <div class="col-sm-12">
                    <h6 class="text-center inner-heading">معلومات عن رب الاسرة وولي الأمر  </h6>
                </div>
                <!------------------------------------>
                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">إسم ولي الأمر(رباعيا) </label>
                        <input type="text" name="parent_name" class="form-control half input-style" placeholder="إسم ولي الأمر(رباعيا)" data-validation="required">
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half"> صلة القرابة بالحالة</label>
                        <select name="relative_relation" class="form-control half" data-validation="required" aria-required="true">
                            <option value="">إختر</option>
                            <?php if($relative_relation !='' &&  $relative_relation !=null){  foreach ($relative_relation as $record){
                                $select= '';  if($records->relative_relation == $record->id){ $select='selected'; }
                                ?>
                                <option value="<?php echo$record->id ?>" <?php echo $select;?> ><?php echo$record->title ?></option>
                            <?php }  } ?>
                        </select>
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الجنسية  </label>
                        <select name="relative_nationality" class="form-control half" data-validation="required" aria-required="true">
                            <option value="">إختر</option>
                            <?php if($nationality !='' &&  $nationality !=null){  foreach ($nationality as $record){
                                $select= '';  if($records->relative_nationality == $record->id){ $select='selected'; }
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
                        <input type="text" name="id_number" class="form-control half input-style" placeholder="رقم الهوية"  data-validation="required" >
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">تاريخها </label>
                        <input type="text" id="id_date" name="id_date" placeholder="تاريخها"  class="form-control docs-date input-style half" data-validation="required"  >
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <div id="optionearea1"></div>
                        <label class="label label-green  half">مكان الإصدار </label>
                        <input type="text" name="id_place" id="id_place" class="form-control half input-style" placeholder="مكان الإصدار "  data-validation="required">
                    </div>
                </div>
                <!------------------------------------>
                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الحالة الإجتماعية </label>
                        <select name="social_status" class="form-control half" data-validation="required" aria-required="true">
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
                        <input type="text" name="parent_date_of_birth" class="form-control half input-style docs-date" placeholder="تاريخ الميلاد " data-validation="required">
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الحالة التعليمية  </label>
                        <select name="educational_status" class="form-control half">
                            <option value="">إختر</option>
                            <?php if($scientific_qualification !='' &&  $scientific_qualification!=null){
                                foreach ($scientific_qualification as $record){
                                    $select= '';  if($records->educational_status == $record->id){ $select='selected'; }
                                    ?>
                                    <option value="<?php echo$record->id ?>" <?php echo $select;?>><?php echo $record->title ?></option>
                                <?php }  } ?>
                        </select>
                    </div>
                </div>
                <!------------------------------------>
                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half"> المؤهل </label>
                        <input type="text" name="parent_qualification" class="form-control half input-style" placeholder="المؤهل" data-validation="required" >
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">المهنة </label>
                        <input type="text" name="parent_job" class="form-control half input-style " placeholder="المهنة " data-validation="required">
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">مكان العمل  </label>
                        <input type="text" name="job_place" class="form-control half input-style" placeholder="مكان العمل" data-validation="required" >
                    </div>
                </div>
                <!------------------------------------>
                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الجهة</label>
                        <input type="text" name="entity" class="form-control half input-style" placeholder="الجهة" data-validation="required" >
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">المدينة </label>
                        <input type="text" name="city" class="form-control half input-style " placeholder="المدينة " data-validation="required">
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">هاتف العمل  </label>
                        <input type="text" name="work_mobile" class="form-control half input-style" placeholder="هاتف العمل  " data-validation="required" >
                    </div>
                </div>
                <!------------------------------------>
                <?php $arr =array("1"=>'نعم',"2"=>'لا');?>
                <!------------------------------------>
                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">هل الأب على قيد الحياة</label>
                        <select name="father_death" id="father_death" class="form-control half" data-validation="required"  onchange="getFather($('#father_death').val());" aria-required="true">
                            <option value="">إختر</option>
                            <?php foreach ($arr as $key => $record){?>
                                <option value="<?php echo $key?>"><?php echo $record?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">هل الأم على قيد الحياة</label>
                        <select name="mother_death" id="mother_death" class="form-control half" data-validation="required"  onchange="getMother($('#mother_death').val());" aria-required="true">
                            <option value="">إختر</option>
                            <?php foreach ($arr as $key => $record){?>
                                <option value="<?php echo $key?>"><?php echo $record?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" style="display: none" id="father_death_year">
                        <label class="label label-green  half">سنة الوفاة</label>
                        <input type="text" name="father_death_year" class="form-control half input-style docs-date" placeholder="سنة الوفاة" >
                    </div>
                    <div class="form-group col-sm-4 col-xs-12" style="display: none" id="mother_death_year">
                        <label class="label label-green  half">سنة الوفاة</label>
                        <input type="text" name="mother_death_year" class="form-control half input-style docs-date" placeholder="سنة الوفاة" >
                    </div>


                </div>
                <!------------------------------------>

                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">مكان الإقامة  </label>
                        <input type="text" name="staying_place" class="form-control half input-style" placeholder="مكان الإقامة   " data-validation="required" >
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الحي</label>
                        <input type="text" name="district" class="form-control half input-style" placeholder="الحي" data-validation="required" >
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">الموقع </label>
                        <input type="text" name="Location" class="form-control half input-style " placeholder="الموقع " data-validation="required">
                    </div>
                </div>
                <!------------------------------------>
                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">هاتف المنزل  </label>
                        <input type="number" name="home_mobile" class="form-control half input-style" placeholder="هاتف المنزل  " data-validation="required" >
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">إسم وهاتف شخص قريب</label>
                        <input type="text" name="nearby_person" class="form-control half input-style" placeholder="إسم وهاتف شخص قريب" data-validation="required" >
                    </div>

                </div>

                <!------------------------------------>
                <div class="col-xs-12 ">
                    <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                </div>
                <?php  echo form_close()?>
            <?php }else{ ?>
                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">إسم ولي الأمر</th>
                        <th class="text-center">التفاصيل</th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center"><?php echo$table['parent_name'];?></td>
                        <td class="text-center"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModals">التفاصيل</button>
                            <div class="modal fade" id="myModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>إسم ولي الأمر(رباعيا)</th><td><?php echo $table['parent_name'];?></td>
                                                    <th>الجنسية </th><td><?php if(!empty($arr_nationality[$table['relative_nationality']]) && $arr_nationality[$table['relative_nationality']] !=''){ echo $arr_nationality[$table['relative_nationality']]; }?></td>
                                                </tr>
                                                <tr>
                                                    <th>صلة القرابة بالحالة</th><td>
                                                        <?php  if(!empty($arr_relative[$table['relative_relation']]) && $arr_relative[$table['relative_relation']] !=''){ echo $arr_relative[$table['relative_relation']]; }?></td>
                                                    <th>هاتف المنزل  </th><td><?=$table['home_mobile']?></td>
                                                </tr>
                                                <tr>
                                                    <th>رقم الهوية </th><td><?php echo $table['id_number']; ?></td>
                                                    <th>تاريخها</th><td><?php echo $table['id_date']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>مكان الإصدار</th><td><?=$table['id_place']?></td>
                                                    <th>الحالة الإجتماعية</th><td>
                                                        <?php if(!empty($arr_social[$table['social_status']]) && $arr_social[$table['social_status']] !=''){ echo $arr_social[$table['social_status']]; }?></td>
                                                </tr>
                                                <tr>
                                                    <th>تاريخ الميلاد</th><td><?=$table['parent_date_of_birth']?></td>
                                                    <th>الحالة التعليمية</th><td>
                                                        <?php  if(!empty($arr_scientific_qualification[$table['educational_Status']]) && $arr_scientific_qualification[$table['educational_Status']] !=''){ echo $arr_scientific_qualification[$table['educational_Status']]; }?></td>
                                                </tr>
                                                <tr>
                                                    <th>المؤهل</th><td><?=$table['parent_qualification']?></td>
                                                    <th>المهنة</th><td><?=$table['parent_job']?></td>
                                                </tr>
                                                <tr>
                                                    <th>مكان العمل</th><td><?=$table['job_place']?></td>
                                                    <th>الجهة</th><td><?=$table['entity']?></td>
                                                </tr>
                                                <tr>
                                                    <th>المدينة</th><td><?=$table['city']?></td>
                                                    <th>هاتف العمل</th><td><?=$table['work_mobile']?></td>
                                                </tr>
                                                <tr>
                                                    <th>مكان الإقامة  </th><td><?=$table['staying_place']?></td>
                                                    <th>الحي</th><td><?=$table['Location']?></td>
                                                </tr>
                                                <tr>
                                                    <th>إسم وهاتف شخص قريب</th><td><?=$table['nearby_person']?></td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">

                            <a href="#" data-toggle="modal"   class="button_style" data-target="#myModalparent_edit"><i class="fa fa-pencil " aria-hidden="true"></i> تعديل</a></td>

                        <div class="modal fade" id="myModalparent_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document" style="width: 81%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                                    </div>
                                    <div class="modal-body row">
                                        <?php echo form_open_multipart("disability_managers/Reasercher/Add_researcher_opinion/".$person_data['id'])?>

                                        <!------------------------------------>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">إسم ولي الأمر(رباعيا) </label>
                                                <input type="text" name="parent_name"  data-validation="required"  class="form-control half input-style" placeholder="إسم ولي الأمر(رباعيا)"  value="<?php echo $table['parent_name'];?>">
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half"> صلة القرابة بالحالة</label>
                                                <select name="relative_relation" class="form-control half" data-validation="required" aria-required="true">
                                                    <option value="">إختر</option>
                                                    <?php if($relative_relation !='' &&  $relative_relation !=null){  foreach ($relative_relation as $record){
                                                        $select= '';  if($table['relative_relation'] == $record->id){ $select='selected'; }
                                                        ?>
                                                        <option value="<?php echo$record->id ?>" <?php echo $select;?> ><?php echo$record->title ?></option>
                                                    <?php }  } ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">الجنسية  </label>
                                                <select name="relative_nationality" class="form-control half"  data-validation="required"   aria-required="true">
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
                                                <input type="text" name="id_number"  data-validation="required" class="form-control half input-style" placeholder="رقم الهوية"   value="<?php echo $table['id_number'];?>"  >
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">تاريخها </label>
                                                <input type="text" id="id_date" data-validation="required"  name="id_date" placeholder="تاريخها"  class="form-control docs-date input-style half"  value="<?php echo $table['id_date'];?>"   >
                                            </div>

                                            <div class="form-group col-sm-4 col-xs-12">
                                                <div id="optionearea1"></div>
                                                <label class="label label-green  half">مكان الإصدار </label>
                                                <input type="text" name="id_place" data-validation="required"  id="id_place" class="form-control half input-style" placeholder="مكان الإصدار " value="<?php echo $table['id_place'];?>"  >
                                            </div>
                                        </div>
                                        <!------------------------------------>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">الحالة الإجتماعية </label>
                                                <select name="social_status" class="form-control half" data-validation="required" aria-required="true">
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
                                                <input type="text" name="parent_date_of_birth" data-validation="required"  class="form-control half input-style docs-date" placeholder="تاريخ الميلاد "  value="<?php echo $table['parent_date_of_birth'];?>"  >
                                            </div>

                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">الحالة التعليمية  </label>
                                                <select name="educational_status" data-validation="required"  class="form-control half" aria-required="true">
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
                                                <input type="text" name="parent_qualification"  data-validation="required" class="form-control half input-style" placeholder="المؤهل" value="<?php echo $table['parent_qualification'];?>"  >
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">المهنة </label>
                                                <input type="text" name="parent_job"  data-validation="required" class="form-control half input-style " placeholder="المهنة "  value="<?php echo $table['parent_job'];?>"  >
                                            </div>

                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">مكان العمل  </label>
                                                <input type="text" name="job_place"  data-validation="required" class="form-control half input-style" placeholder="مكان العمل"  value="<?php echo $table['job_place'];?>"  >
                                            </div>
                                        </div>
                                        <!------------------------------------>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">الجهة</label>
                                                <input type="text" name="entity"  data-validation="required" class="form-control half input-style" placeholder="الجهة" value="<?php echo $table['entity'];?>" >
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">المدينة </label>
                                                <input type="text" name="city"  data-validation="required" class="form-control half input-style " placeholder="المدينة "  value="<?php echo $table['city'];?>">
                                            </div>

                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">هاتف العمل  </label>
                                                <input type="text" name="work_mobile"  data-validation="required" class="form-control half input-style" placeholder="هاتف العمل  "   value="<?php echo $table['work_mobile'];?>">
                                            </div>
                                        </div>
                                        <!------------------------------------>
                                        <?php $arr =array('إختر','نعم','لا');?>
                                        <!------------------------------------>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">هل الأب على قيد الحياة</label>
                                                <select name="father_death" id="father_death" data-validation="required"  class="form-control half"   onchange="getFather($('#father_death').val());" data-validation="required"  aria-required="true">
                                                    <option value="">إختر</option>
                                                    <?php foreach ($arr as $key => $record){ $select=''; if($table['father_death']==$key){$select='selected';}?>
                                                        <option value="<?php echo $key?>" <?php echo $select;?>><?php echo $record?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">هل الأم على قيد الحياة</label>
                                                <select name="mother_death" id="mother_death" data-validation="required"  class="form-control half"   onchange="getMother($('#mother_death').val());" aria-required="true">
                                                    <option value="">إختر</option>
                                                    <?php foreach ($arr as $key => $record){ $select=''; if($table['mother_death']==$key){$select='selected';}?>
                                                        <option value="<?php echo $key?>" <?php echo $select;?>><?php echo $record?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <?php if($table['father_death'] ==2 ){?>

                                                <div class="form-group col-sm-4 col-xs-12" id="father_death_year">
                                                    <label class="label label-green  half">سنة الوفاة</label>
                                                    <input type="text" name="father_death_year"  data-validation="required" class="form-control half input-style" placeholder="سنة الوفاة"  value="<?php echo $table['father_death_year'];?>" >
                                                </div>

                                            <?php }?>

                                            <?php if($table['mother_death'] ==2 ){?>

                                                <div class="form-group col-sm-4 col-xs-12" id="mother_death_year">
                                                    <label class="label label-green  half">سنة الوفاة</label>
                                                    <input type="text" name="mother_death_year" data-validation="required"  class="form-control half input-style" placeholder="سنة الوفاة"   value="<?php echo $table['mother_death_year'];?>" >
                                                </div>


                                            <?php }?>
                                            <div class="form-group col-sm-4 col-xs-12" style="display: none" id="father_death_year">
                                                <label class="label label-green  half">سنة الوفاة</label>
                                                <input type="text" name="father_death_year"  data-validation="required" class="form-control half input-style" placeholder="سنة الوفاة"  value="<?php echo $table['father_death_year'];?>" >
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12" style="display: none" id="mother_death_year">
                                                <label class="label label-green  half">سنة الوفاة</label>
                                                <input type="text" name="mother_death_year"  data-validation="required" class="form-control half input-style" placeholder="سنة الوفاة"   value="<?php echo $table['mother_death_year'];?>" >
                                            </div>


                                        </div>
                                        <!------------------------------------>

                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">مكان الإقامة  </label>
                                                <input type="text" name="staying_place" data-validation="required" class="form-control half input-style" placeholder="مكان الإقامة   "  value="<?php echo $table['staying_place'];?>"  >
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">الحي</label>
                                                <input type="text" name="district"  data-validation="required" class="form-control half input-style" placeholder="الحي"  value="<?php echo $table['district'];?>"  >
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">الموقع </label>
                                                <input type="text" name="Location"  data-validation="required" class="form-control half input-style " placeholder="الموقع "  value="<?php echo $table['Location'];?>">
                                            </div>
                                        </div>
                                        <!------------------------------------>
                                        <div class="col-sm-12">
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">هاتف المنزل  </label>
                                                <input type="text" name="home_mobile" data-validation="required"  class="form-control half input-style" placeholder="هاتف المنزل  "  value="<?php echo $table['home_mobile'];?>" >
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12">
                                                <label class="label label-green  half">إسم وهاتف شخص قريب</label>
                                                <input type="text" name="nearby_person"  data-validation="required" class="form-control half input-style" placeholder="إسم وهاتف شخص قريب"   value="<?php echo $table['nearby_person'];?>" >
                                            </div>

                                        </div>

                                        <!------------------------------------>
                                        <div class="col-xs-12 ">
                                            <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                                                <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                                        </div>
                                        <?php  echo form_close()?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"  style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    </tbody>
                </table>
            <?php  } ?>
        </div>
    </div>
</div>



<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">  التكوين الاسري للحالة(من واقع دفتر العائلة والإقامة)</h3>
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart("disability_managers/Reasercher/Add_researcher_opinion/".$person_data['id'])?>

            <div class="col-sm-12">
                <h6 class="text-center inner-heading">التكوين الاسري للحالة</h6>
            </div>
            <!------------------------------->
            <table class="table table-bordered" id="tab_logic" <?php if($family_relationship ==''){?>style="display: none" <?php } ?>>
                <thead>
                <th>م</th>
                <th>الإسم</th>
                <th>صلة القرابة</th>
                <th>تاريخ الميلاد</th>
                <th>المهنة/طالب/يعمل</th>
                <th>المستوى التعليمي</th>
                <th>الحالة الإجتماعية</th>
                <th>ملاحظات</th>
                <th>الإجراءات</th>
                </thead>
                <tbody>
                <?php if(isset($family_relationship) && !empty($family_relationship) && $family_relationship !=null  ){
                    $r=0;
                    foreach($family_relationship as $record): ?>
                        <tr class="">
                            <td><?php echo ++$r; ?> </td>
                            <td> <?php echo $record->name ?></td>
                            <td> <?php if( !empty($arr_relative[$record->relative_relation]) && $arr_relative[$record->relative_relation]!=null){echo $arr_relative[$record->relative_relation];}?></td>
                            <td> <?php echo $record->date_of_birth?></td>
                            <td> <?php echo $record->job?></td>
                            <td> <?php if( !empty($arr_scientific_qualification[$record->educational_status]) && $arr_scientific_qualification[$record->educational_status]!=null){ echo $arr_scientific_qualification[$record->educational_status];}?></td>
                            <td><?php if ( isset($arr_social[$record->social_status])) {
                                    echo $arr_social[$record->social_status];}?></td>
                            <td> <?php echo $record->details?></td>
                            <td>
                                <a href="#" data-toggle="modal"    data-target="#modal-update<?php echo $record->id;?>"><i class="fa fa-pencil " aria-hidden="true"></i> </a>

                                <a href="#" class="" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                            </td>
                        </tr>

                        <div class="modal " id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel"> حذف</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>هل أنت متأكد من حذف هذه العناصر؟</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                                        <a href="<?php echo base_url().'disability_managers/Reasercher/delete_family_row/'.$record->id.'/'.$person_data['id']?>"> <button type="button" class="btn btn-danger remove" id="Delete-Record">حذف</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                }?>
                </tbody>
            </table>

            <!------------------------------->
            <div class="col-xs-12 ">
                <input type="hidden" name="max" id="max">
                <input type="hidden" name="person_id_fk" id="person_id_fk" value="<?php echo$person_data['id']; ?>">

                <button type="button" onclick="get_row();" class="btn btn-warning   ">
                    <i class="fa fa-plus"></i> إضافة تكوين الاسري
                </button>


                <button type="submit" name="add" value="add_family_relationship"   class="save btn btn-purple w-md m-b-5 " ><i class="fa fa-floppy-o "></i> حفظ  </button>
            </div>
            <?php  echo form_close()?>
            <?php
            if(!empty($family_relationship)){
                $r=0;
                foreach($family_relationship as $records): ?>
                    <div class="modal " id="modal-update<?php echo $records->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                        <div class="modal-dialog modal-lg" role="document" style="width:100%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"> تعديل</h4>
                                </div>
                                <div class="modal-body">

                                    <table class="table table-bordered" id="">
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
                                        <?php echo form_open_multipart("disability_managers/Reasercher/update_family_relationship/".$records->id."/".$person_data['id'])?>

                                        <tr class="">
                                            <td>#</td>
                                            <td> <input type="text" name="name"  data-validation="required"  value="<?php echo $records->name ?>"  placeholder="الإسم " class="form-control"></td>
                                            <td>
                                                <select name="relative_relation" class="form-control"  data-validation="required"  aria-required="true">
                                                    <option value="">إختر</option>
                                                    <?php if($relative_relation !='' &&  $relative_relation !=null){  foreach ($relative_relation as $record){
                                                        $select= '';  if($records->relative_relation == $record->id){ $select='selected'; }
                                                        ?>
                                                        <option value="<?php echo$record->id ?>" <?php echo $select;?> ><?php echo$record->title ?></option>
                                                    <?php }  } ?>
                                                </select>
                                            <td> <input type="date"  data-validation="required" name="date_of_birth" value="<?php echo $records->date_of_birth?>"  placeholder="تاريخ الميلاد" class="form-control "></td>
                                            <td> <input type="text" data-validation="required"  name="job" value="<?php echo $records->job?>"  placeholder="المهنة/طالب/يعمل" class="form-control "></td>
                                            <td>
                                                <select name="educational_status" class="form-control" data-validation="required"  aria-required="true">
                                                    <option value="">إختر</option>
                                                    <?php if($scientific_qualification !='' &&  $scientific_qualification!=null){ foreach ($scientific_qualification as $record){
                                                        $select= '';  if($records->educational_status == $record->id){ $select='selected'; }
                                                        ?>
                                                        <option value="<?php echo$record->id ?>" <?php echo $select;?>><?php echo$record->title ?></option>
                                                    <?php }  } ?>
                                                </select>
                                            <td>
                                                <select name="social_status" class="form-control " data-validation="required" aria-required="true">
                                                    <option value="">إختر</option>
                                                    <?php if($arr_social !='' &&  $arr_social !=null){  for($a=1;$a<sizeof($arr_social);$a++){
                                                        $select= '';  if($records->social_status == $a){ $select='selected'; }
                                                        ?>
                                                        <option value="<?php echo$a?>" <?php echo $select;?> ><?php echo$arr_social[$a] ?></option>
                                                    <?php }  } ?>
                                                </select></td>
                                            <td> <textarea name="details"   data-validation="required"  class="form-control docs-date"><?php echo $records->details?></textarea></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">تراجع</button>
                                    <button type="submit" value="update" name="update" class="btn btn-success " >تعديل</button></a>
                                    <?php echo form_close()?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $r++; endforeach; }?>
        </div>
    </div>
</div>


<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">الحالة الإقتصادية لأسرة الحالة</h3>
        </div>
        <div class="panel-body">
            <?php if($table['house_type'] == null && $table['house_condition'] == null && $table['transport'] == null && $table['room_number'] == null && $table['path_number'] == null){?>
                <?php echo form_open_multipart("disability_managers/Reasercher/Add_researcher_opinion/".$person_data['id'])?>
                <div class="col-sm-12">
                    <h6 class="text-center inner-heading">الحالة الإقتصادية لأسرة الحالة</h6>
                </div>
                <!------------------------------------>
                <div class="col-sm-10">
                    <?php $arr_house_type=array('','ملك','مشترك','مستأجر','شعبي','عربي','غير ذلك');
                    $arr_house_condition=array('','نظيف','متوسط','غيرنظيف');
                    $arr_trans=array('','يوجد','لايوجد');
                    ?>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">نوع المسكن</label>
                    </div>
                    <div class="form-group col-sm-6 col-xs-12">
                        <?php for($d=1;$d<sizeof($arr_house_type);$d++){?>
                            <input type="radio" name="house_type" data-validation="required"   value="<?php echo $d;?>">
                            <label><?php echo $arr_house_type[$d];?> </label>&nbsp;
                        <?php } ?>
                    </div>
                </div>

                <div class="col-sm-10">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">حالة المسكن</label>
                    </div>
                    <div class="form-group col-sm-6 col-xs-12">
                        <?php for($d=1;$d<sizeof($arr_house_condition);$d++){?>
                            <input type="radio" name="house_condition" data-validation="required"   value="<?php echo $d;?>">
                            <label><?php echo $arr_house_condition[$d];?> </label>&nbsp;
                        <?php } ?>
                    </div>
                </div>

                <div class="col-sm-10">
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">وسيلة النقل</label>
                    </div>
                    <div class="form-group col-sm-6 col-xs-12">
                        <?php for($d=1;$d<sizeof($arr_trans);$d++){?>
                            <input type="radio" name="transport" data-validation="required"   value="<?php echo $d;?>">
                            <label><?php echo $arr_trans[$d];?> </label>&nbsp;
                        <?php } ?>
                    </div>
                </div>

                <div class="col-sm-10">
                    <div class="form-group col-sm-5 col-xs-12">
                        <label class="label label-green  half">عدد الغرف </label>
                        <input type="number" name="room_number" class="form-control half input-style"  data-validation=required" placeholder="عدد الغرف"     >
                    </div>
                    <div class="form-group col-sm-5 col-xs-12">
                        <label class="label label-green  half">عدد الحمامات </label>
                        <input type="number" id="" name="path_number" placeholder="عدد الحمامات"   data-validation=required" class="form-control input-style half"     >
                    </div>

                </div>

                <div class="col-xs-12 ">
                    <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                </div>
                <?php  echo form_close()?>
            <?php }else{ ?>
                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">التفاصيل</th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalhouse">التفاصيل</button>
                            <div class="modal fade" id="myModalhouse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php $arr_house_type=array('','ملك','مشترك','مستأجر','شعبي','عربي','غير ذلك');
                                            $arr_house_condition=array('','نظيف','متوسط','غيرنظيف');
                                            $arr_trans=array('','يوجد','لايوجد');
                                            ?>
                                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>نوع المسكن</th><td><?php  if($arr_house_type[$table['house_type']] ){ echo $arr_house_type[$table['house_type']];}?></td>
                                                    <th>حالة المسكن</th><td><?php  if($arr_house_type[$table['house_type']] ){  echo $arr_house_condition[$table['house_condition']]; }?></td>
                                                </tr>
                                                <tr>
                                                    <th>وسيلة النقل</th><td><?php  if($arr_house_type[$table['house_type']] ){  echo $arr_trans[$table['transport']]; }?></td>
                                                    <th>عدد الغرف</th><td><?php echo $table['room_number']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>عدد الحمامات</th><td><?php echo $table['path_number']; ?></td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">

                            <a href="#" data-toggle="modal"  class="button_style" data-target="#myModalhouse_edit"><i class="fa fa-pencil " aria-hidden="true"></i> تعديل</a></td>

                        <div class="modal fade" id="myModalhouse_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document" style="width: 81%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <?php echo form_open_multipart("disability_managers/Reasercher/Add_researcher_opinion/".$person_data['id'])?>
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
                                                        <input type="radio" name="house_type"  data-validation="required"  <?php echo $checked;?>  value="<?php echo $d;?>">
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
                                                        <input type="radio" name="house_condition"  data-validation="required"  <?php echo $checked;?>   value="<?php echo $d;?>">
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
                                                        <input type="radio" name="transport"  data-validation="required"   <?php echo $checked;?>   value="<?php echo $d;?>">
                                                        <label><?php echo $arr_trans[$d];?> </label>&nbsp;
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="col-sm-10">
                                                <div class="form-group col-sm-5 col-xs-12">
                                                    <label class="label label-green  half">عدد الغرف </label>
                                                    <input type="text" name="room_number" data-validation="required"  class="form-control half input-style" placeholder="عدد الغرف"  value="<?php echo $table['room_number'];?>"    >
                                                </div>
                                                <div class="form-group col-sm-5 col-xs-12">
                                                    <label class="label label-green  half">عدد الحمامات </label>
                                                    <input type="text" id="" data-validation="required"  name="path_number" placeholder="عدد الحمامات"  value="<?php echo $table['path_number'];?>" class="form-control input-style half"     >
                                                </div>

                                            </div>

                                            <div class="col-xs-12 ">
                                                <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                                                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                                            </div>
                                            <?php  echo form_close()?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"  style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    </tbody>
                </table>
            <?php  } ?>
        </div>
    </div>
</div>


<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">مصادر الدخل لرب الأسرة (المعدل الشهري)</h3>
        </div>
        <div class="panel-body">
            <?php if($table['parent_salary'] ==null && $table['parent_social_security'] ==null && $table['parent_retirement_pension'] ==null && $table['parent_insurance'] ==null && $table['parent_other'] ==null){?>
                <?php echo form_open_multipart("disability_managers/Reasercher/Add_researcher_opinion/".$person_data['id'])?>
                <div class="col-sm-12">
                    <h6 class="text-center inner-heading"> مصادر الدخل لرب الأسرة (المعدل الشهري) </h6>
                </div>
                <table id = "" class = "table table-striped table-bordered dt-responsive nowrap" cellspacing = "0" width = "100%" >
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
                        <td class="text-center " ><input type="number" data-validation="required" name="parent_salary" onkeyup="getAll();" class="myClass2" value="0"></td>
                        <td class="text-center "><input type="number" data-validation="required" name="parent_social_security" onkeyup="getAll();"  class="myClass2" value="0"></td>
                        <td class="text-center "><input type="number" data-validation="required" name="parent_insurance" onkeyup="getAll();" class="myClass2" value="0"></td>
                        <td class="text-center "><input type="number" data-validation="required" name="parent_retirement_pension" onkeyup="getAll();" class="myClass2" value="0"></td>
                        <td class="text-center "><input type="number" data-validation="required" name="parent_other" onkeyup="getAll();" class="myClass2" value="0"></td>
                        <td class="text-center " id="all_sum_money" ></td>
                    </tr>
                    </tbody>
                </table>

                <p>نصيب الفرد من الدخل داخل الأسرة :  </p>

                <div class="col-xs-12 ">
                    <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                </div>
                <?php  echo form_close()?>
            <?php }else{ ?>
                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">التفاصيل</th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModaln">التفاصيل</button>
                            <div class="modal fade" id="myModaln" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>راتب العمل</th><td><?php echo $table['parent_salary'];?></td>
                                                    <th>الضمان الإجتماعي</th><td><?php echo $table['parent_social_security'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>معاش التقاعد</th><td><?php echo $table['parent_retirement_pension']; ?></td>
                                                    <th>التأمينات الإجتماعية </th><td><?php echo $table['parent_insurance']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>غيرذلك</th><td><?php echo $table['parent_other']; ?></td>
                                                    <th>المجموع الشهري</th><td><?php echo $table['parent_insurance']+$table['parent_salary']+$table['parent_social_security']+$table['parent_retirement_pension']+$table['parent_other'];?></td>
                                                </tr>

                                                </thead>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center"> <a href="#"  class="button_style" data-toggle="modal" data-target="#myModalincome2"><i class="fa fa-pencil " aria-hidden="true"></i> تعديل</a></td>
                    </tr>
                    </tbody>
                </table>

                <div class="modal fade" id="myModalincome2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document" style="width: 81%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                            </div>
                            <div class="modal-body">
                                <?php echo form_open_multipart("disability_managers/Reasercher/Add_researcher_opinion/".$person_data['id'])?>

                                <!------------------------------------>
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
                                        <td class="text-center " ><input type="number" data-validation="required" name="parent_salary" onkeyup="getAll();" class="myClass2" value="<?php echo $table['parent_salary'];?>"></td>
                                        <td class="text-center "><input type="number" data-validation="required" name="parent_social_security" onkeyup="getAll();"  class="myClass2" value="<?php echo $table['parent_social_security'];?>"></td>
                                        <td class="text-center "><input type="number" data-validation="required" name="parent_insurance" onkeyup="getAll();" class="myClass2" value="<?php echo $table['parent_insurance'];?>"></td>
                                        <td class="text-center "><input type="number" data-validation="required" name="parent_retirement_pension" onkeyup="getAll();" class="myClass2" value="<?php echo $table['parent_retirement_pension'];?>"></td>
                                        <td class="text-center "><input type="number" data-validation="required" name="parent_other" onkeyup="getAll();" class="myClass2" value="<?php echo $table['parent_other'];?>"></td>
                                        <td class="text-center " id="all_sum_money" ><?php echo $table['parent_insurance']+$table['parent_salary']+$table['parent_social_security']+$table['parent_retirement_pension']+$table['parent_other'];?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <p>نصيب الفرد من الدخل داخل الأسرة :  </p>
                                <div class="">
                                    <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                                </div>
                                <?php  echo form_close()?>
                            </div>
                            <div class="modal-footer">
                                <button type="button"  style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php  } ?>
        </div>
    </div>
</div>




<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
            <?php if($table['family_condition'] ==null && $table['researcher_report'] ==null){?>
                <?php echo form_open_multipart("disability_managers/Reasercher/Add_researcher_opinion/".$person_data['id'])?>
                <div class="col-sm-12">
                    <h6 class="text-center inner-heading"> الحالة الإجتماعية لأسرة الحالة </h6>
                </div>
                <!------------------------------------>
                <div class="col-sm-10">
                    <?php
                    $arr_family_condition=array('','زواج قائم','طلاق','أرمل','غيرمرتبط');
                    ?>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half">حالة الأسرة</label>
                    </div>
                    <div class="form-group col-sm-6 col-xs-12">
                        <?php for($d=1;$d<sizeof($arr_family_condition);$d++){?>
                            <input type="radio" name="family_condition"  data-validation="required"  value="<?php echo $d;?>">
                            <label><?php echo $arr_family_condition[$d];?> </label>&nbsp;
                        <?php } ?>
                    </div>
                </div>
                <!------------------------------------>
                <div class="col-sm-12">
                    <div class="form-group col-sm-8 col-xs-12">
                        <label class="label label-green  half">تقرير الباحث عن الاسرة </label>
                        <textarea  class="form-control"  name="researcher_report"  data-validation="required" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                    </div>
                </div>
                <!------------------------------------>
                <div class="col-xs-12 ">
                    <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                </div>
                <?php  echo form_close()?>
            <?php }else{ ?>
                <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">التفاصيل</th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalss">التفاصيل</button>
                            <div class="modal fade" id="myModalss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <?php    $arr_family_condition=array('','زواج قائم','طلاق','ترمل','غيرمرتبط'); ?>
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>حالة الأسرة</th><td><?php if($arr_family_condition[$table['family_condition']]!='' && $arr_family_condition[$table['family_condition']] !=null){ echo $arr_family_condition[$table['family_condition']];}?></td>
                                                    <th>تقرير الباحث عن الاسرة </th><td><?php echo $table['researcher_report'];?></td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button"  style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">

                            <a href="#" data-toggle="modal"   class="button_style" data-target="#myModaledits"><i class="fa fa-pencil " aria-hidden="true"></i> تعديل</a></td>

                        <div class="modal fade" id="myModaledits" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document" style="width: 81%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo form_open_multipart("disability_managers/Reasercher/Add_researcher_opinion/".$person_data['id'])?>
                                        <div class="row">
                                            <!------------------------------------>
                                            <div class="col-sm-10">
                                                <?php
                                                $arr_family_condition=array('','زواج قائم','طلاق','ترمل','غيرمرتبط');
                                                ?>
                                                <div class="form-group col-sm-4 col-xs-12">
                                                    <label class="label label-green  half">حالة الأسرة</label>
                                                </div>
                                                <div class="form-group col-sm-6 col-xs-12">
                                                    <?php for($d=1;$d<sizeof($arr_family_condition);$d++){ $checked=''; if($d == $table['family_condition']){$checked='checked';}?>
                                                        <input type="radio" name="family_condition" data-validation="required"  <?php echo $checked;?> value="<?php echo $d;?>">
                                                        <label><?php echo $arr_family_condition[$d];?> </label>&nbsp;
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <!------------------------------------>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-8 col-xs-12">
                                                    <label class="label label-green  half">تقرير الباحث عن الاسرة </label>
                                                    <textarea  class="form-control"  name="researcher_report" data-validation="required"  cols="30" rows="10"><?php echo $table['researcher_report'];?></textarea>
                                                </div>
                                                <div class="form-group col-sm-4 col-xs-12">
                                                </div>
                                            </div>


                                            <!------------------------------------>
                                            <div class=" col-sm-12">
                                                <button type="submit" class="btn btn-purple w-md m-b-5" name="add" value="add">
                                                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                                            </div>
                                            <?php  echo form_close()?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button"  style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                    </tbody>
                </table>
            <?php  } ?>
        </div>
    </div>
</div>


<script>
   








    function total() {
        var cbs = document.getElementsByClassName("myClass");
        var sum=0;
        for (var i = 0; i < cbs.length; i++) {
            sum +=parseInt(cbs[i].value);
        }
        $('#all_sum').html(sum);
    }



    function getFather(num) {
        if(num == 2){
            $('#father_death_year').show();
        }
        if(num != 2){
            $('#father_death_year').hide();
        }
    }

    function getMother(num) {
        if(num == 2){
            $('#mother_death_year').show();
        }
        if(num != 2){
            $('#mother_death_year').hide();
        }
    }

</script>
<script>

    function getAll() {
        var x = document.getElementsByClassName("myClass2");

        var total=0;
        for (var i = 0; i < x.length; i++) {
            total +=parseInt(x[i].value);
        }

        $('#all_sum_money').html(total);
    }

</script>
<script>

 function get_row(){
  
        var name="name";
        var relative_relation="relative_relation";
        var date_of_birth="date_of_birth";
        var job="job";
        var educational_status="educational_status";
        var social_status="social_status";
        var details="details";
        var i=1;
        var v=0;
            $("#tab_logic").show();
           /// $("#main_tr").remove();
            $('#tab_logic').append("<tr class='addr'><td>#</td>" +
                "<td> <input class='form-control'  data-validation='required'  id='name" + i + "' type='text'   name='name" + i + "'  placeholder='الإسم' class='form-control' data-validation='required'></td> " +
                "<td><select name='relative_relation" + i + "' id='relative_relation" + i + "' class='form-control'><option value=''>إختر</option>'<?PHP  if( !empty($this->relative_relation)){ foreach ($this->relative_relation as $record){?>' <option value='<?PHP echo $record->id ?>'><?PHP echo $record->title; ?></option>'<?PHP } }  ?>'</select></td>" +
                "<td> <input type='date' data-validation='required' id='date_of_birth" + i + "' name='date_of_birth" + i + "' placeholder='تاريخ الميلاد' data-validation='required'  class='form-control docs-date'></td>" +
                "<td> <input type='text' data-validation='required' id='job" + i + "' name='job" + i + "' placeholder='المهنة/طالب/يعمل' data-validation='required'  class='form-control'></td>" +
                "<td><select name='educational_status" + i + "' id='educational_status" + i + "' class='form-control'><option value=''>إختر</option>'<?PHP  if( !empty($this->scientific_qualification)){ foreach ($this->scientific_qualification as $record){?>' <option value='<?PHP echo $record->id ?>'><?PHP echo $record->title; ?></option>'<?PHP } }  ?>'</select></td>" +
                "<td><select name='social_status" + i + "' id='social_status" + i + "' class='form-control'><option value=''>إختر</option>'<?PHP  if( !empty($arr_social)){ for($a=1;$a<sizeof($arr_social);$a++){?>' <option value='<?PHP echo $a ?>'><?PHP echo $arr_social[$a]; ?></option>'<?PHP } }  ?>'</select></td>" +
                "<td><textarea  data-validation='required' id='details" + i + "' name='details" + i + "'   class='form-control'></textarea></td>" +
                "<td><button type='button' class='btn  btn-xs ' onclick='$(this).parents(\"tr\").remove();'><i class='fa fa-trash-o'></i> </button></td>" +
                "</tr>");
            $('#name'+i).attr("name",name+i);
            $('#relative_relation'+i).attr("relative_relation",relative_relation+i);
            $('#date_of_birth'+i).attr("date_of_birth",date_of_birth+i);
            $('#job'+i).attr("job",job+i);
            $('#educational_status'+i).attr("educational_status",educational_status+i);
            $('#social_status'+i).attr("social_status",social_status+i);
            $('#details'+i).attr("details",details+i);
            i++;
            v++;
            $('#max').val(v); 
    }
   /*
       $('table').on('click','tr button.remove',function(e){
            e.preventDefault();
            $(this).parents('tr').remove();

        });*/

</script>
