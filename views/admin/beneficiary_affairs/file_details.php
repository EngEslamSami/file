<?php $father_status = array('حي','متوفي'); ?>
<?php $card_type = array('وثيقة وطنية ','اقامة ','جواز سفر'); ?>
<?php $group = array('أرملة','مطلقة ','زوج سجين','زوج مريض','متخلى عنها ','عزباء متخلى عنها ','دخل محدود ','أخرى'); ?>
<?php $house_type = array('من سميرا'); ?>
<?php $healthy_type = array('جيد','متوسط','ضعيف'); ?>
<?php $job = array(' يعمل',' لا يعمل '); ?>
<?php $education_level= array('تعليم جامعي','الثانوية','المتوسطة','الإبتدائية','غير متعلم '); ?>
<?php $family_type=array("--قم بالإختيار--","زوجة","إبن","إبنة");?>
<?php $kids_education=array("--قم بالإختيار--","دون سن الدراسة","رياض أطفال","إبتدائي","متوسط","ثانوي","جامعي","خريج")?>

<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">بيانات الام</a></li>
                <li><a href="#tab2" data-toggle="tab">بيانات الابناء</a></li>
                <li><a href="#tab3" data-toggle="tab">رأى الباحث </a></li>
            </ul>
            <!-- Tab panels -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <div class="panel-body">
                        <?php if(isset($result) && $result!=null  && !empty($result)):?>
                            <div class="form-group col-sm-12">
                                <div class="col-sm-4">
                                    <label class="label label-green  half">رقم الملف:</label>
                                    <input type="text" value="<?=$result["id"]?>" class="r-inner-h4 half"  readonly="">
                                </div>
                                <div class="col-sm-4">
                                    <label class="label label-green  half">إسم الحالة (الام):</label>
                                    <input type="text" value="<?=$result["name"]?>" class="r-inner-h4 half" readonly="">
                                </div>
                                <div class="col-sm-4">
                                    <label class="label label-green  half">حالة الأب:</label>
                                    <select name="father_status" class="selectpicker no-padding form-control half" disabled="" data-show-subtext="true" data-live-search="true" required>
                                        <option value="">إختر حالة الأب</option>
                                        <?php for($x=0 ; $x<sizeof($father_status);$x++){
                                            $selected =""; if($result["father_status"] == $x){$selected ="selected";} ?>
                                            <option value="<?php echo $x ?>" <?=$selected?>><?php echo $father_status[$x]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="col-sm-4">
                                    <label class="label label-green  half">رقم الهوية:</label>
                                    <input type="text" value="<?=$result["card_id"]?>" class="r-inner-h4 half" readonly="">
                                </div>
                                <div class="col-sm-4">
                                    <label class="label label-green  half">نوع الهوية:</label>
                                    <select name="card_type" class="selectpicker no-padding form-control half" disabled="" data-show-subtext="true" data-live-search="true" required>
                                        <option value="">إختر نوع الهوية</option>
                                        <?php for($x=0 ; $x<sizeof($card_type);$x++){
                                            $selected =""; if($result["card_type"] == $x){$selected ="selected";}?>
                                            <option value="<?php echo $x ?>" <?=$selected?>><?php echo $card_type[$x]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label class="label label-green  half">تاريخ الميلاد:</label>
                                    <input type="text" value="<?=$result["birth_date"]?>" class="r-inner-h4 half" readonly="">
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="col-sm-4">
                                    <label class="label label-green  half">الفئة:</label>
                                    <select name="group" class="selectpicker no-padding form-control half" disabled=""  data-show-subtext="true" data-live-search="true" >
                                        <option value="">إختر الفئة</option>
                                        <?php for($xe=0 ; $xe<sizeof($group);$xe++){
                                            $selected =""; if($result["group"] == $xe){$selected ="selected";} ?>
                                            <option value="<?php echo $xe; ?>" <?=$selected?>><?php echo $group[$xe]; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="label label-green  half">هاتف المنزل:</label>
                                    <input type="text" value="<?=$result["tele"]?>" class="r-inner-h4 half" readonly="">
                                </div>

                                <div class="col-sm-4">
                                    <label class="label label-green  half">رقم الجوال:</label>
                                    <input type="text" value="<?=$result["mob"]?>" class="r-inner-h4 half" readonly="">
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="col-sm-4">
                                    <label class="label label-green  half">الجنسية:</label>
                                    <select name="nationality_id_fk" class="selectpicker no-padding form-control half"  disabled="" data-show-subtext="true" data-live-search="true" required>
                                        <option value="">إختر الجنسية</option>
                                        <?php foreach($nationality as $nationality_data){
                                            $selected =""; if($result["nationality_id_fk"] == $nationality_data->id){$selected ="selected";}?>
                                            <option value="<?php echo $nationality_data->id; ?>" <?=$selected?>><?php echo $nationality_data->title; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="label label-green  half">نوع السكن:</label>
                                    <select name="house_type" class="selectpicker no-padding form-control half"  disabled="" data-show-subtext="true" data-live-search="true" required>
                                        <option value="">إختر نوع السكن</option>
                                        <?php for($xe=0 ; $xe<sizeof($house_type);$xe++){
                                            $selected =""; if($result["house_type"] == $xe){$selected ="selected";}?>
                                            <option value="<?php echo $xe; ?>" <?=$selected?>><?php echo $house_type[$xe]; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label class="label label-green  half">مكان السكن: </label>
                                    <select name="house_palce" class="selectpicker no-padding form-control half" disabled=""  data-show-subtext="true" data-live-search="true" required>
                                        <option value="">إختر مكان السكن</option>
                                        <?php foreach($area as $area_data){
                                            $selected =""; if($result["house_palce"] == $area_data->id){$selected ="selected";}?>
                                            <option value="<?php echo $area_data->id; ?>" <?=$selected?>><?php echo $area_data->title; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="col-sm-4">
                                    <label class="label label-green  half">الحالة الصحية:</label>
                                    <select name="healthy_type" class="selectpicker no-padding form-control half"  disabled="" data-show-subtext="true" data-live-search="true" required>
                                        <option value="">إختر الحالة الصحية</option>
                                        <?php for($xe=0 ; $xe<sizeof($healthy_type);$xe++){
                                            $selected =""; if($result["healthy_type"] == $xe){$selected ="selected";}?>
                                            <option value="<?php echo $xe; ?>" <?=$selected?> ><?php echo $healthy_type[$xe]; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="label label-green  half">العمل:</label>
                                    <select name="job" class="selectpicker no-padding form-control half" disabled=""  data-show-subtext="true" data-live-search="true" required>
                                        <option value="">إختر العمل</option>
                                        <?php for($xe=0 ; $xe<sizeof($job);$xe++){
                                            $selected =""; if($result["job"] == $xe){$selected ="selected";}?>
                                            <option value="<?php echo $xe; ?>" <?=$selected?> ><?php echo $job[$xe]; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-sm-4">
                                    <label class="label label-green  half"> المستوي التعليمي: </label>
                                    <select name="education_level" class="selectpicker no-padding form-control half" disabled=""  data-show-subtext="true" data-live-search="true" required>
                                        <option value="">إختر المستوي التعليمي</option>
                                        <?php for($xe=0 ; $xe<sizeof($education_level);$xe++){
                                            $selected =""; if($result["education_level"] == $xe){$selected ="selected";}?>
                                            <option value="<?php echo $xe; ?>"  <?=$selected?> ><?php echo $education_level[$xe]; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!--   <div class="form-group col-sm-12">
                                   <div class="col-sm-4">
                                       <label class="label label-green  half">الافراد:</label>
                                       <input type="text" value="" class="r-inner-h4 half" readonly="">
                                   </div>
                                   <div class="col-sm-4">
                                       <label class="label label-green  half">ذكور: </label>
                                       <input type="text" value="" class="r-inner-h4 half" readonly="">
                                   </div>

                                   <div class="col-sm-4">
                                       <label class="label label-green  half"> إناث: </label>
                                       <input type="text" value="" class="r-inner-h4 half" readonly="">
                                   </div>
                               </div>-->
                            <div class="form-group col-sm-12">
                                <div class="col-sm-4">
                                    <label class="label label-green  half">نوع الصرف: </label>
                                    <input type="text" value="<?=$result["sarf_type"]?>" class="r-inner-h4 half" readonly="">
                                </div>
                                <div class="col-sm-8">
                                    <label class="label label-green  " style="width: 25% !important;float: right !important;">الملاحظات: </label>
                                    <textarea class="form-control half input-style"  rows="3"   ><?=$result["notes"]?> </textarea>
                                </div>
                            </div>


                        <?php endif;?>

                    </div>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <div class="panel-body">
                        
                            <table id="" class=" display table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                                    <th >الإسم اليتيم</th>
                                    <th >النوع</th>
                                    <th >المرحلة الدراسية</th>
                                    <th >تاريخ الميلاد</th>
                                    <th >العمر</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?foreach ($result_kids as $row){?>
                                <tr >
                                <td ><?=$row->name?></td>
                                <td >
                                    <?php if(isset($family_type[$row->type])){echo $family_type[$row->type];}?>
                                   <!-- <select id="" name="" class="form-control">
                                        <?php /*for($x=0 ; $x<sizeof($family_type);$x++){
                                            $selected =""; if($row->type == $x){$selected ="selected";} */?>
                                            <option value="<?php /*echo $x; */?>" <?/*=$selected*/?>><?php /*echo $family_type[$x]; */?></option>

                                        <?php /*} */?>
                                    </select>-->
                                </td>
                                <td >
                                    <?php if(isset($kids_education[$row->education_level])){echo $kids_education[$row->education_level];}?>
                                  <!--  <select id="" name="" class="form-control" required="required">
                                        <?php /*for($y=0 ; $y<sizeof($kids_education);$y++){
                                            $selected =""; if($row->education_level == $y){$selected ="selected";} */?>
                                            <option value="<?php /*echo $y; */?>" <?/*=$selected*/?>><?php /*echo $kids_education[$y]; */?></option>

                                        <?php /*} */?>
                                    </select>-->
                                </td>
                                <td ><?=$row->birth_date?></td>
                                <td ><?=$row->age?></td>
                                    <?php }?>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
                
                 <div class="tab-pane fade" id="tab3">
                 <!------------------------------------------------------>
                 <?php 

$arr_in=array("",'نعم','نعم ولم تستطع مقابلتنا','نعم ولكن رفضضت مقابلتنا','لا');
$arr_op=array("",'متعاونة','متعاونة و تتهرب من بعض الاجابات','متعاونة و غير متقبلة الزيارة','متوفى');
$arr_home=array("",'نعم','لا','الى حد ما');
$arr_child=array("",'نعم','لا','الى حد ما');
$arr_type=array("",'أ','ب','ج','د','ه');
?>
   <div class="col-sm-12">
                 <div class="col-md-6  col-sm-12 col-xs-12  inner-side r-data">
    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">هل الام متواجدة</h4>
        </div>
        <div class="col-xs-6 r-input">
            <select name="is_mother_present" class="form-control" disabled="">
                <option> اختر</option>
                <?php for($x=1;$x<sizeof($arr_in);$x++):
                    $selected='';
                    if(isset($result_researcher_opinion)){
                        if($x==$result_researcher_opinion['is_mother_present']){$selected='selected';}
                    }

                    ?>
                    <option value="<?php echo $x?>" <?php echo $selected;?>  ><?php echo $arr_in[$x];?> </option>
                <?php endfor; ?>
            </select>

        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4"> الاهتمام بنظافة المنزل </h4>
        </div>
        <div class="col-xs-6 r-input">
            <select name="home_cleaning" class="form-control"  disabled="">
                <option> اختر</option>
                <?php for($x=1;$x<sizeof($arr_home);$x++):
                    $selected='';
                    if(isset($result_researcher_opinion)){
                        if($x==$result_researcher_opinion['home_cleaning']){$selected='selected';}
                    }
                    ?>
                    <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_home[$x];?> </option>
                <?php endfor; ?>
            </select>  </div>
    </div>


    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4"> فئة الاسرة </h4>
        </div>
        <div class="col-xs-6 r-input">
            <select name="family_type" class="form-control" disabled="">
                <option> اختر</option>
                <?php for($x=1;$x<sizeof($arr_type);$x++):
                    if(isset($result_researcher_opinion)){
                        if($x==$result_researcher_opinion['family_type']){$selected='selected';}
                    }
                    ?>
                    <option value="<?php echo $x?>"  <?php echo $selected;?> ><?php echo $arr_type[$x]?></option>
                <?php endfor?>
            </select>  </div>
    </div>


    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">مرئيات  رئيس  قسم شؤون الاسر </h4>
        </div>
        <div class="col-xs-6 r-input">
              <textarea name="video_family_leader"  class="r-textarea"  disabled="">
              <?php if(isset($result_researcher_opinion['video_family_leader'])&& $result_researcher_opinion['video_family_leader']!=null){
                  echo $result_researcher_opinion['video_family_leader'];}?></textarea>
        </div>
    </div>


</div>
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4"> إنطباع الام عن الزيارة </h4>
        </div>
        <div class="col-xs-6 r-input">
            <select name="mother_impression_visit" class="form-control" disabled="">
                <option> اختر</option>
                <?php for($x=1;$x<sizeof($arr_op);$x++):
                    $selected='';
                    if(isset($result_researcher_opinion)){
                        if($x==$result_researcher_opinion['mother_impression_visit']){$selected='selected';}
                    }?>
                    <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_op[$x];?> </option>
                <?php endfor; ?>

            </select>   </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4"> الاهتمام بنظافة الابناء </h4>
        </div>
        <div class="col-xs-6 r-input">
            <select name="child_cleanliness" class="form-control" disabled="">
                <option> اختر</option>
                <?php for($x=1;$x<sizeof($arr_child);$x++):
                    $selected='';
                    if(isset($result_researcher_opinion)){
                        if($x==$result_researcher_opinion['child_cleanliness']){$selected='selected';}
                    }?>
                    <option value="<?php echo $x?>" <?php echo $selected;?> ><?php echo $arr_child[$x];?> </option>
                <?php endfor; ?>
            </select>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">مرئيات الباحث</h4>
        </div>
        <div class="col-xs-6 r-input">
              <textarea name="videos_researcher" class="r-textarea"  disabled="">
              <?php if(isset($result_researcher_opinion['videos_researcher'])&& $result_researcher_opinion['videos_researcher']!=null){echo $result_researcher_opinion['videos_researcher'];}?>

              </textarea>
        </div>
    </div>

</div>
</div>

                 <!------------------------------------------------------>
                 
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
                <?php echo form_open_multipart('BeneficiaryAffairs/OperationInFile/'.$value."/".$file_id);?>
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
