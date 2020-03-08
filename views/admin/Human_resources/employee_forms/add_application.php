<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>

<style type="text/css">
    .top-label {
        font-size: 13px;
    }
    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    .title{
        background-color: #;
        background-color: #428bca;
        color: #fff;
        text-align: center;
        padding: 5px;
    }
    .span{
        font-size: 12px !important;
        position: absolute !important;
        bottom: -17px !important;
        right: 50% !important;
    }
    .form-group .help-block.form-error {
        color: #a94442 !important;
        font-size: 12px !important;
        position: absolute !important;
        bottom: -26px !important;
        right: 2% !important;
    }
    
   .bootstrap-select.btn-group .dropdown-toggle .caret {
    right: 87% !important;
}
.bootstrap-select>.btn {

    padding-right: 10px;
}
    
</style>
<?php
if(isset($result)&&!empty($result))
{
    $national_num = $result['national_num'];
    $national_num_img = $result['national_num_img'];
    $gender_id_fk = $result['gender_id_fk'];
    $nationality_id_fk = $result['nationality_id_fk'];
    $name = $result['name'];
    $date_birth = $result['date_birth'];
    $place_birth = $result['place_birth'];
    $Social_status = $result['social_status'];
    $city = $result['city'];
    $hai = $result['hai'];
    $job_request_id_fk = $result['job_request_id_fk'];
    $job_name_other = $result['job_name_other'];
    $mob = $result['mob'];
    $email = $result['email'];
    $method_reached = $result['method_reached'];
    $method_reached_other = $result['method_reached_other'];
    $previous_request = $result['previous_request'];
    $previous_request_date = $result['previous_request_date'];
    $know_person_in_charity = $result['know_person_in_charity'];
    $persons_names = $result['persons_names'];
    $work_now = $result['work_now'];
    $date_start_work = $result['date_start_work'];
    $out['form']='human_resources/employee_forms/Job_requests/update_application/'.$this->uri->segment(5);
}else{
   $national_num = "";
   $national_num_img = "";
    $gender_id_fk ="";
    $nationality_id_fk ="";
    $name ="";
    $date_birth ="";
    $place_birth ="";
    $Social_status ="";
    $city ="";
    $hai ="";
    $job_request_id_fk ="";
    $job_name_other ="";
    $mob ="";
    $email ="";
    $method_reached ="";
    $method_reached_other ="";
    $previous_request ="";
    $previous_request_date ="";
    $know_person_in_charity ="";
    $persons_names ="";
    $work_now ="";
    $date_start_work ="";
   $out['form']='human_resources/employee_forms/Job_requests/add_application';
}


$arr_yos_no=array(1=>'نعم',2=>'لا');
?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-9 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>

            <div class="panel-body">

                <?php    echo form_open_multipart($out['form'])?>
               
               
                
                
                
                <div class="col-md-12 ">
                    <h4 class="title"> البيانات الشخصية </h4>
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">السجل المدني</label>
                        <input type="text" name="national_num" id="national_num" maxlength="10" value="<?php echo$national_num;?>" class="form-control bottom-input"
                         onkeyup="chek_lenth($(this).val());"  onkeypress="validate_number(event)"  data-validation="required"  data-validation-has-keyup-event="true">
                        <span  id="national_num_span"   class="span-validation span"></span>
                    </div>
                    
                      <div class="form-group col-md-3  col-sm-6 padding-4">
                        <label class="label top-label">الإسم</label>
                        <input type="text" name="name" id="name"  class="form-control bottom-input"
                               value="<?php echo$name;?>" data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    
                            <div class="form-group col-md-1 col-sm-6 padding-4">
                        <label class="label top-label">الجنس</label>
                        <select name="gender_id_fk" id="gender_id_fk" data-validation="required"
                          class="form-control bottom-input selectpicker"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($gender)&&!empty($gender)) {
                                foreach($gender as $row){
                                    $select='';
                                    if($gender_id_fk == $row->id_setting){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php echo $select;?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الجنسية</label>
                        <select name="nationality_id_fk" id="nationality_id_fk" data-validation="required"
                                class="form-control bottom-input selectpicker" data-show-subtext="true" data-live-search="true"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($nationalities)&&!empty($nationalities)) {
                                foreach($nationalities as $row){
                                    $select='';
                                    if($nationality_id_fk == $row->id_setting){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php echo $select;?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                  
                    
                         <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">الحالة الإجتماعية</label>
                        <select name="social_status" id="social_status"
                                data-validation="required"   class="form-control bottom-input selectpicker"
                                data-show-subtext="true" data-live-search="true" aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($social_status)&&!empty($social_status)) {
                                foreach($social_status as $row){
                                    $select='';
                                    if($Social_status == $row->id_setting){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php echo $select;?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    
                    
                    
                    
                    
                    
                    
         
            
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">تاريخ الميلاد</label>
                        <input id="date_birth" name="date_birth" type="text" size="10" maxlength="10"
                            value="<?php echo$date_birth;?>"    class="form-control bottom-input input-style error date_as_mask"
                               data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="form-group col-md-2  col-sm-6 padding-4">
                            <label class="label top-label">مكان الميلاد</label>
                            <input id="place_birth" name="place_birth" type="text"
                                 value="<?php echo$place_birth;?>"   class="form-control bottom-input input-style error"
                                   data-validation="required" data-validation-has-keyup-event="true">
                        </div>
               
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">المدينة</label>
                        <input id="city" name="city" type="text"  value="<?php echo$city;?>"
                         class="form-control bottom-input input-style error"
                               data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">الحي</label>
                        <input id="hai" name="hai" type="text" value="<?php echo$hai;?>"
                               class="form-control bottom-input input-style error"
                               data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الوظيفة المتقدم إليها</label>
                        <select id="job_request_id_fk" data-validation="required" class="form-control bottom-input selectpicker"
                           onchange="getOther(this.value,'other_job')"     data-show-subtext="true" data-live-search="true"
                                name="job_request_id_fk">
                            <option value="">إختر</option>
                            <?php
                            if(isset($jobs)&&!empty($jobs)) {
                                foreach($jobs as $row){
                                    $select='';
                                    if($job_request_id_fk == $row->id_setting){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php echo $select;?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                } } ?>
                            <option value="0" <?php  if($job_request_id_fk == 0){ echo 'selected'; } ?>>أخري</option>
                        </select>
                    </div>
                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label top-label">وظيفة أخري</label>
                            <input id="other_job" name="job_name_other" type="text"  <?php if($job_request_id_fk !=0){ ?> disabled="disabled" <?php } ?>
                                    value="<?php if($job_request_id_fk ==0){ echo$job_name_other; } ?>" class="form-control bottom-input input-style error"
                                   data-validation="required" data-validation-has-keyup-event="true">
                        </div>


        <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">الجوال</label>
                        <input id="mob" name="mob" type="text" maxlength="10" value="<?php echo$mob;?>"
                               onkeyup="chek_lenth_mobile($(this).val());"  onkeypress="validate_number(event)"
                               class="form-control bottom-input input-style error"  data-validation="required"
                               data-validation-has-keyup-event="true">
                        <span  id="mob_span"   class="span-validation span"></span>
                    </div>



                    </div>
                <div class="col-md-12 ">

            
                    <div class="form-group col-md-4  col-sm-6 padding-4">
                        <label class="label top-label">الإيميل</label>
                        <input id="email" name="email" type="email"  value="<?php echo$email;?>"
                               class="form-control bottom-input input-style error"
                               data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">طرق الوصول إلينا</label>
                        <select id="method_reached" data-validation="required" class="form-control bottom-input selectpicker"
                                onchange="getOther(this.value,'other_way')"     data-show-subtext="true" data-live-search="true"
                                name="method_reached">
                            <option value="">إختر</option>
                            <?php
                            if(isset($reach_us)&&!empty($reach_us)) {
                                foreach($reach_us as $row){
                                    $select='';
                                    if($method_reached == $row->id_setting){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php echo $select;?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                } } ?>
                            <option value="0" <?php  if($method_reached == 0){ echo 'selected'; } ?>>أخري</option>
                        </select>
                    </div>
                    <!-------------------------------------------------------------------------->
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label"> طريقة أخري</label>
                        <input id="other_way" name="method_reached_other" type="text" <?php if($method_reached !=0){ ?> disabled="disabled"  <?php } ?>
                              value="<?php if($method_reached ==0){ echo$method_reached_other; } ?>" class="form-control bottom-input input-style error"
                               data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">هل سبق وأن تقدمت بطلب توظيف لدي الجمعية ؟ </label>
                        <select name="previous_request" id="previous_request"
                                data-validation="required"   class="form-control bottom-input half"
                                aria-required="true" onchange="getFunction($(this).val(),'apply_date');">

                            <option value="">اختر</option>
                            <?php
                            foreach ($arr_yos_no as $key=>$value){

                                $select='';
                                if($previous_request == $key){
                                    $select='selected';
                                }?>
                                <option value="<?php echo $key;?>" <?php echo $select;?>><?php echo $value;?></option>
                            <?php } ?>
                        </select>
                        
                        
                         <input type="text" name="previous_request_date" id="apply_date" placeholder="تاريخ التقديم"
                               <?php if($previous_request!= 1){ ?> disabled="disabled" data-validation="required"  <?php } ?>
                               <?php if($previous_request == 1){ ?>   value="<?php echo$previous_request_date; ?>" <?php } ?>
                               class="form-control bottom-input date_as_mask half" data-validation-has-keyup-event="true">
                        
                        
                        
                    </div>
                   <!-- <div class="form-group col-md-1 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ التقديم</label>
                        <input type="text" name="previous_request_date" id="apply_date"
                               <?php if($previous_request!= 1){ ?> disabled="disabled" data-validation="required"  <?php } ?>
                               <?php if($previous_request == 1){ ?>   value="<?php echo$previous_request_date; ?>" <?php } ?>
                               class="form-control bottom-input date_as_mask" data-validation-has-keyup-event="true">
                    </div>
-->

                </div>
                <div class="col-md-12" >
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">هل يعمل أحد من أصدقائك أو معارفك في الجمعية ؟ </label>
                        <select name="know_person_in_charity" id="know_person_in_charity"
                                data-validation="required"   class="form-control bottom-input"
                                aria-required="true" onchange="getFunction($(this).val(),'names');">

                            <option value="">اختر</option>
                            <?php
                            foreach ($arr_yos_no as $key=>$value){
                                $select='';
                                if($know_person_in_charity == $key){
                                    $select='selected';
                                } ?>
                                <option value="<?php echo $key;?>" <?php echo $select;?>><?php echo $value;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">الاسماء </label>
                        <textarea class="form-control bottom-input"  name="persons_names" id="names"
                              style="margin: 0px 0px 0px -1px;height: 32px;"
                            <?php if($know_person_in_charity!= 1){ ?> disabled="disabled" data-validation="required"  <?php } ?>
                                  ><?php if($know_person_in_charity == 1){ echo$persons_names; } ?></textarea>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">هل تعمل حاليا </label>
                        <select name="work_now" id="work_now"
                                data-validation="required"   class="form-control bottom-input"
                                aria-required="true">
                            <option value="">اختر</option>
                            <?php
                            foreach ($arr_yos_no as $key=>$value){
                                $select='';
                                if($work_now == $key){
                                    $select='selected';
                                }?>
                                <option value="<?php echo $key;?>"  <?php echo $select;?>><?php echo $value;?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">متي تستطيع بدايه العمل</label>
                        <input id="date_start_work" name="date_start_work" type="text" size="10" maxlength="10"
                               value="<?php echo $date_start_work;?>"    class="form-control bottom-input input-style error date_as_mask"
                               data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                 </div>


<div class="col-md-12">

           <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">صورة السجل المدني</label>
                        <input type="file" name="national_num_img" id="national_num_img"

                               class="form-control bottom-input" data-validation-has-keyup-event="true"
                            <?php if(empty($national_num_img)){ ?>   data-validation="required" <?php } ?>  >
                        <?php if(!empty($national_num_img)){ ?>
                            <a data-toggle="modal" type="button" style="cursor: pointer;float: left" data-target="#modal-img">
                                <i class="fa fa-eye"></i>
                            </a>
                            <div class="modal fade" id="modal-img" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            $img_url ="uploads/images/".$national_num_img; ?>
                                            <img src="<?php echo base_url().$img_url?>" width="100%" height="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" style="float: left" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    
                    
                    
                    
                    
                        <!---------------------osama--------------------------->
    <div class="form-group col-md-3 col-sm-6 padding-4">
        <label class="label top-label" style="width: 100%">الصوره الشخصيه </label>
        <input id="person_img" onchange="readURL(this);" name="personal_photo"   style="padding: 0;" 
                   class=" form-control bottom-input" type="file">
    </div>
    <!---------------------osama--------------------------->
                    


</div>








                <div class="col-md-12"><br>
                    <div class="col-md-5"></div>
                    <div class="col-md-3">
                        <button type="submit" id="register" name="add" value="save_main_data"
                                class="btn btn-add"><span><i class="fa fa-floppy-o"></i></span> حفظ
                        </button></div>
                    <div class="col-md-4"></div>

                </div>
                
                
                
             
                 <div class="col-md-2">
                
                </div>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
        <!---------------------osama--------------------------->
    <?php  $this->load->view('admin/Human_resources/employee_forms/sidebar_application_data');?>
    <!---------------------osama--------------------------->
</div>


<!------ table -------->
<?php       if(isset($records) &&!empty($records)){ ?>
   
    <div class="col-xs-12 no-padding">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">طلبات التوظيف</h3>
            </div>
            <div class="panel-body"><br>
                <div class="col-md-12 no-padding">

<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
<thead>
<tr class="info">
    <th class="text-center">م</th>
    <th class="text-center">رقم السجل المدني</th>
    <th class="text-center">الإسم</th>
    <th class="text-center">إستكمال البيانات</th>
    <th class="text-center">تحديد ميعاد المقابله</th>
    <th class="text-center">عرض عمل</th>
    <th class="text-center">الاجراء</th>
</tr>
</thead>
<tbody class="text-center">
<?php
$a=1;
if(isset($records)&&!empty($records)) {
    foreach ($records as $record) {
        ?>
        <tr>
            <td><?php echo $a ?></td>
            <td><? echo $record->national_num; ?></td>
            <td><? echo $record->name; ?></td>
            <td>
<div class="btn-group">
    <button type="button" class="btn btn-danger">اضافه</button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/Job_requests/add_previous_work/<?php echo $record->id;?>">الأعمال السابقة </a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/Job_requests/add_science_qualification/<?php echo $record->id;?>">المؤهلات العلمية</a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/Job_requests/add_dawrat/<?php echo $record->id;?>">الدورات التدريبية</a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/Job_requests/add_skills/<?php echo $record->id;?>">الهوايات ومهارات</a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/Job_requests/add_persons/<?php echo $record->id;?>">المعرفون</a></li>
    </ul>
</div>


</td>
<td>
    <div class="col-md-6" <?php  if($record->determine_interview==0){?> style="display: none;"
    <?php } else { ?> style="display:block "  <?php }?> >
        <a href="<?php echo base_url();?>human_resources/employee_forms/Job_requests/make_application/<?php echo $record->id;?>"target="_blank"><button class="btn btn-add" >بدء المقابله</button></a>
    </div>
    <?php if($record->determine_interview==0){
        $status_f_title =  'تحديد ميعاد المقابله';
        $status_Btn_class = 'info';
        $status_Btn_class_i = 'info';
    }else{
        $status_f_title =  $record->interview_date;
        $status_Btn_class = 'primary' ;
        $status_Btn_class_i = 'primary';
    } ?>


<button style="color:black ; background-color:<?php echo $status_Btn_class; ?>  " data-toggle="modal"
        data-target="#modal-info<?php echo $record->id;?>"
        class="btn btn-sm btn-<?php echo $status_Btn_class_i;  ?>"><i
        class="fa fa-list btn-<?php echo $status_Btn_class_i;  ?>"></i> <?php echo $status_f_title; ?>
</button>

</td>
<td><div class="col-md-6" <?php  if($record->determine_interview==0){?> style="display: none;"
<?php } else { ?> style="display:block "  <?php }?> >
    <a href="<?php echo base_url();?>human_resources/employee_forms/Job_requests/offer_work/<?php echo $record->id;?>"target="_blank"><button class="btn btn-add" >عرض عمل </button></a>
</div></td>
<td>

<a href="<?php echo base_url(); ?>human_resources/employee_forms/Job_requests/update_application/<?php echo $record->id; ?>"><i
        class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
<a onclick="$('#adele').attr('href', '<?= base_url() . "human_resources/employee_forms/Job_requests/Delete_application/" . $record->id ?>');"
   data-toggle="modal" data-target="#modal-delete"
   title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>

</td>

<div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
            </div>
            <div class="modal-body">
                <p id="text">هل أنت متأكد من الحذف؟</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove" >نعم</button></a>
            </div>
        </div>
    </div>
</div>



                                    <!------------------------------------start modal           ------------------------------------------------->


<div class="modal fade" id="modal-info<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle"><div style="color:red;" > تحديد ميعاد المقابله</div></h5>
    <button  onclick="location.reload();" type="button" style="position: relative;
top: -22px;" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body row">
    <div class="col-md-12">


        <div class="col-md-6">
            <label class="label top-label">تاريخ المقابله</label>
            <input id="date" name="" type="date" onchange="put_date(<?php echo $record->id;?>,$(this).val())"
                   value="<?php echo $record->interview_date;?>"
                   class="form-control bottom-input input-style error interview<?php echo $record->id;?>"
                   data-validation="required" data-validation-has-keyup-event="true">
        </div>



    </div>



</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>


                                    <!-------------------------------------------------------end modal date----------------------------------------------->

                                </tr>
                                <?php
                                $a++;
                            }
                        } else {?>
                            <td colspan="6"><div style="color: red; font-size: large;">لا توجد طلبات للتوظيف</div></td>
                        <?php  }  ?>
                        </tbody>
                    </table>




                </div>
            </div>
        </div>
    </div>
<?php }  ?>
<!------------------------------------------------------------------>
<!------------------------------------------------------------------>



<!----- end table ------>
<script type="text/javascript">
    jQuery(function($){
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

<script>
    function put_date(id,valu)
    {


        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Job_requests/put_date",
            data:{id:id,valu:valu},
            success:function(d){

                alert("تم تحديد تاريخ المقابله بنجاج");
                $('.link'+id).show();
            }
        });
    }

</script>


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    function chek_lenth(valu)
    {
        if(valu.length < 10){
            document.getElementById("national_num_span").style.color = '#F00';
            document.getElementById("national_num_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");

            var inchek_out= inchek.substring(0,10);
            $('#national_num').val(inchek_out);
        }

        if(valu.length > 10){
            document.getElementById("national_num_span").style.color = '#F00';
            document.getElementById("national_num_span").innerHTML = 'أقصي عدد 10 ارقام';

            var inchek_out= inchek.substring(0,10);
            $('#national_num').val(inchek_out);
        }

        if(valu.length == 10){
            document.getElementById('register').removeAttribute("disabled", "disabled");

        }
    }



    function chek_lenth_mobile(valu)
    {
        if(valu.length < 10){
            document.getElementById("mob_span").style.color = '#F00';
            document.getElementById("mob_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");

            var inchek_out= inchek.substring(0,10);
            $('#mob').val(inchek_out);
        }

        if(valu.length > 10){
            document.getElementById("mob_span").style.color = '#F00';
            document.getElementById("mob_span").innerHTML = 'أقصي عدد 10 ارقام';

            var inchek_out= inchek.substring(0,10);
            $('#mob').val(inchek_out);
        }

        if(valu.length == 10){
            document.getElementById('register').removeAttribute("disabled", "disabled");

        }
    }



</script>

<script>
    function getOther(valu,div) {
        if(valu == 0){
        document.getElementById(div).setAttribute("data-validation", "required");
        document.getElementById(div).removeAttribute("disabled", "disabled");
        } else {
            document.getElementById(div).removeAttribute("data-validation", "required");
            document.getElementById(div).setAttribute("disabled", "disabled");
            document.getElementById(div).value=0;
        }
    }

    function getFunction(valu,div) {
        if(valu==1)
        {
            document.getElementById(div).removeAttribute("disabled", "disabled");
            document.getElementById(div).setAttribute("data-validation", "required");
        }else{
            document.getElementById(div).setAttribute("disabled", "disabled");
            document.getElementById(div).removeAttribute("data-validation", "required");
            document.getElementById(div).value="";
        }
    }

</script>