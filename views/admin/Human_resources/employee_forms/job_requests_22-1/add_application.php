<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>

<style type="text/css">
    .  {
        font-size: 14px;
        font-weight: 500;

    }
    .title{
        background-color: #;
        background-color: #00713e;
        color: #fff;
        text-align: center;
        padding: 5px;
    }
    .print_forma{
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }
    .piece-body {

        width: 100%;
        float: right;
    }
    .bordered-bottom{
        border-bottom: 4px solid #9bbb59;
    }
    .piece-footer{
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
        color: #fff;
    }
    .piece-box table{
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td
    {
        padding: 2px 8px !important;
    }

    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .no-padding{
        padding: 0;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 120px;
        width: 100%
    }
    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }
    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr{
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border{
        border:0 !important;
    }

    .gray_background{
        background-color: #eee;

    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }
    .open_green{
        background-color: #e6eed5;
    }
    .closed_green{
        background-color: #cdddac;
    }
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }
    .under-line{
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }
    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3 ,
    .under-line .col-xs-4,
    .under-line .col-xs-6 ,
    .under-line .col-xs-8
    {
        border-left: 1px solid #abc572;
    }


    .nonactive{
        pointer-events: none;
        cursor: not-allowed;
    }


    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block ;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>
<?php
if(isset($result)&&!empty($result))
{
    $national_num = $result['national_num'];
    $national_num_img = $result['national_num_img'];
    $personal_photo = $result['personal_photo'];
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
    $date_start_work_m = $result['date_start_work_m'];
    $date_start_work_h = $result['date_start_work_h'];
$previous_request_date_h = $result['previous_request_date_h'];
    $previous_request_date_m = $result['previous_request_date_m'];
    $out['form']='human_resources/employee_forms/job_requests/Job_request/update_application/'.$this->uri->segment(6);
}else{
   $national_num = "";
   $national_num_img = "";
   $personal_photo = "";
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
    $date_start_work_m = "";
    $date_start_work_h = "";
   $previous_request_date_h = "";
    $previous_request_date_m = "";
   $out['form']='human_resources/employee_forms/job_requests/Job_request/add_application';
}


$arr_yos_no=array(1=>'نعم',2=>'لا');
?>
<div class="col-sm-12 no-padding " >

        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">إضافة طلب توظيف</h3>
            </div>

            <div class="panel-body">
                <div class="col-sm-10 no-padding" >
                <?php    echo form_open_multipart($out['form'])?>
               
               
                
                
                
                <div class="col-md-12 no-padding">
                  <!--  <h4 class="title"> البيانات الشخصية </h4> -->
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label  ">السجل المدني</label>
                        <input type="text" name="national_num" id="national_num" maxlength="10" value="<?php echo$national_num;?>" class="form-control   "
                         onkeyup="chek_lenth($(this).val());"  onkeypress="validate_number(event)"  data-validation="required"  data-validation-has-keyup-event="true">
                        <span  id="national_num_span"   class="span-validation span"></span>
                    </div>
                    
                      <div class="form-group col-md-4  col-sm-6 padding-4">
                        <label class="label  ">الإسم</label>
                        <input type="text" name="name" id="name"  class="form-control   "
                               value="<?php echo$name;?>" data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    
                            <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label  ">الجنس</label>
                        <select name="gender_id_fk" id="gender_id_fk" data-validation="required"
                          class="form-control    selectpicker"
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
                        <label class="label  ">الجنسية</label>
                        <select name="nationality_id_fk" id="nationality_id_fk" data-validation="required"
                                class="form-control    selectpicker" data-show-subtext="true" data-live-search="true"
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
                        <label class="label  ">الحالة الإجتماعية</label>
                        <select name="social_status" id="social_status"
                                data-validation="required"   class="form-control    selectpicker"
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

            
                  <!--  <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label  ">تاريخ الميلاد</label>
                        <input id="date_birth" name="date_birth" type="text" size="10" maxlength="10"
                            value="<?php echo$date_birth;?>"    class="form-control     error date_as_mask"
                               data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    -->


                        <div class="form-group col-md-3  col-sm-6 padding-4">

                            <label class="label text-center">
                                <img style="width: 18px;float: right;"
                                     src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                تاريخ الميلاد
                                <img style="width: 18px;float: left;"
                                     src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                            </label>

                            <div id="cal-2" style="width: 50%;float: right;">
                                <input id="date-Hijri" name="date_birth_h" class="form-control bottom-input "
                                       type="text" onfocus="showCal2();"
                                       style=" width: 100%;float: right"/>

                            </div>


                            <div id="cal-1" style="width: 50%;float: left;">
                                <input id="date-Miladi" name="date_birth_m" class="form-control bottom-input  "

                                       type="text" onfocus="showCal1();" style=" width: 100%;float: right"/>

                            </div>
                        </div>
                        <div class="form-group col-md-3  col-sm-6 padding-4">
                            <label class="label  ">مكان الميلاد</label>
                            <input id="place_birth" name="place_birth" type="text"
                                 value="<?php echo$place_birth;?>"   class="form-control     error"
                                   data-validation="required" data-validation-has-keyup-event="true">
                        </div>
               
                    <div class="form-group col-md-3  col-sm-6 padding-4">
                        <label class="label  ">المدينة</label>
                        <input id="city" name="city" type="text"  value="<?php echo$city;?>"
                         class="form-control     error"
                               data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-3  col-sm-6 padding-4">
                        <label class="label  ">الحي</label>
                        <input id="hai" name="hai" type="text" value="<?php echo$hai;?>"
                               class="form-control     error"
                               data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label  ">الوظيفة المتقدم إليها</label>
                        <select id="job_request_id_fk" data-validation="required" class="form-control    selectpicker"
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
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class="label  ">وظيفة أخري</label>
                            <input id="other_job" name="job_name_other" type="text"  <?php if($job_request_id_fk !=0){ ?> disabled="disabled" <?php } ?>
                                    value="<?php if($job_request_id_fk ==0){ echo$job_name_other; } ?>" class="form-control     error"
                                   data-validation="required" data-validation-has-keyup-event="true">
                        </div>


        <div class="form-group col-md-3  col-sm-6 padding-4">
                        <label class="label  ">الجوال</label>
                        <input id="mob" name="mob" type="text" maxlength="10" value="<?php echo$mob;?>"
                               onkeyup="chek_lenth_mobile($(this).val());"  onkeypress="validate_number(event)"
                               class="form-control     error"  data-validation="required"
                               data-validation-has-keyup-event="true">
                        <span  id="mob_span"   class="span-validation span"></span>
                    </div>





            
                    <div class="form-group col-md-3  col-sm-6 padding-4">
                        <label class="label  ">الإيميل</label>
                        <input id="email" name="email" type="email"  value="<?php echo$email;?>"
                               class="form-control     error"
                               data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label  ">طرق الوصول إلينا</label>
                        <select id="method_reached" data-validation="required" class="form-control    selectpicker"
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
                        <label class="label  "> طريقة أخري</label>
                        <input id="other_way" name="method_reached_other" type="text" <?php if($method_reached !=0){ ?> disabled="disabled"  <?php } ?>
                              value="<?php if($method_reached ==0){ echo$method_reached_other; } ?>" class="form-control     error"
                               data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label  ">هل سبق وأن تقدمت بطلب توظيف لدي الجمعية ؟ </label>
                        <select name="previous_request" id="previous_request"
                                data-validation="required"   class="form-control"
                                aria-required="true" onchange="getFunction($(this).val(),'date-Hijri2','date-Miladi2');">

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
                        
                        
                         <!-- <input type="text" name="previous_request_date" id="apply_date" placeholder="تاريخ التقديم"
                               <?php if($previous_request!= 1){ ?> disabled="disabled" data-validation="required"  <?php } ?>
                               <?php if($previous_request == 1){ ?>   value="<?php echo$previous_request_date; ?>" <?php } ?>
                               class="form-control    date_as_mask half" data-validation-has-keyup-event="true"> -->
                        
                        
                        
                    </div>
                  
<div class="form-group col-md-4  col-sm-6 padding-4">

<label class="label text-center">
    <img style="width: 18px;float: right;"
         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
    تاريخ التقديم
    <img style="width: 18px;float: left;"
         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
</label>

<div id="cal-6" style="width: 50%;float: right;">
    <input id="date-Hijri2" name="previous_request_date_h" class="form-control bottom-input " data-validation="required"
           type="text" onfocus="showCal6();" 
           <?php if($previous_request!= 1){ ?> disabled="disabled" data-validation="required"  <?php } ?>
           <?php if($previous_request == 1){ ?>   value="<?php echo $previous_request_date_h; ?>" <?php } ?>
           
           style=" width: 100%;float: right"/>

</div>


<div id="cal-5" style="width: 50%;float: left;">
    <input id="date-Miladi2" name="previous_request_date_m" class="form-control bottom-input  " 
    <?php if($previous_request!= 1){ ?> disabled="disabled" data-validation="required"  <?php } ?>
           <?php if($previous_request == 1){ ?>   value="<?php echo $previous_request_date_m; ?>" <?php } ?>
 
           type="text" onfocus="showCal5();" style=" width: 100%;float: right"/>

</div>
</div>
                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label  ">هل تعمل حاليا </label>
                            <select name="work_now" id="work_now"
                                    data-validation="required"   class="form-control   "
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


                        <!-- <div class="form-group col-md-2  col-sm-6 padding-4">
                            <label class="label  ">متي تستطيع بدايه العمل</label>
                            <input id="date_start_work" name="date_start_work" type="text" size="10" maxlength="10"
                                   value="<?php echo $date_start_work;?>"    class="form-control     error date_as_mask"
                            >
                        </div> -->
                        <div class="form-group col-md-4  col-sm-6 padding-4" >

<label class="label text-center">
    <img style="width: 18px;float: right;"
         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
    متي تستطيع بدايه العمل
    <img style="width: 18px;float: left;"
         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
</label>

<div id="cal-4" style="width: 50%;float: right;">
    <input id="date-Hijri1" name="date_start_work_h" class="form-control bottom-input " data-validation="required"
           type="text" onfocus="showCal4();" value="<?php echo $date_start_work_h;?>"
           style=" width: 100%;float: right"/>

</div>


<div id="cal-3" style="width: 50%;float: left;">
    <input id="date-Miladi1" name="date_start_work_m" class="form-control bottom-input  "  data-validation="required" value="<?php echo $date_start_work_m;?>"
           type="text" onfocus="showCal3();" style=" width: 100%;float: right"/>

</div>
</div>


                    <div class="form-group col-md-5 col-sm-6 padding-4">
                        <label class="label  ">هل يعمل أحد من أصدقائك أو معارفك في الجمعية ؟ </label>
                        <select name="know_person_in_charity" id="know_person_in_charity"
                                data-validation="required"   class="form-control   "
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
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label  ">الاسماء </label>
                        <textarea class="form-control   "  name="persons_names" id="names"

                            <?php if($know_person_in_charity!= 1){ ?> disabled="disabled" data-validation="required"  <?php } ?>
                                  ><?php if($know_person_in_charity == 1){ echo$persons_names; } ?></textarea>
                    </div>



           <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label  ">صورة السجل المدني</label>
                        <input type="file" name="national_num_img" id="national_num_img"

                               class="form-control   " data-validation-has-keyup-event="true"
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
                                            $img_url ="uploads/human_resource/job_request/".$national_num_img; ?>
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
                    
                    
                    
                    
                    

    <div class="form-group col-md-2 col-sm-6 padding-4">
        <label class="label  " style="width: 100%">الصوره الشخصيه </label>
        <input id="person_img" onchange="readURL(this);" name="personal_photo"   style="padding: 0;" 
                   class=" form-control   " type="file">
        <?php if(!empty($personal_photo)){ ?>
            <a data-toggle="modal" type="button" style="cursor: pointer;float: left" data-target="#modal-personal-img">
                <i class="fa fa-eye"></i>
            </a>
            <div class="modal fade" id="modal-personal-img" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <?php
                            $img_url ="uploads/human_resource/job_request/".$personal_photo; ?>
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

                    


</div>      <div class="col-xs-12 text-center">
                    <span style="color: red" id="span_id"></span><br>

                    <button type="submit"  class="btn btn-labeled btn-success " id="register" name="add" value="save_main_data" style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                    <button type="button" class="btn btn-labeled btn-danger ">
                        <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                    </button>

                    <button type="button" class="btn btn-labeled btn-purple ">
                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                    </button>


                    <button type="button" class="btn btn-labeled btn-inverse "  id="attach_button" data-target="#myModal_search"  data-toggle="modal" >
                        <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                    </button>


                </div>
                
             
                 <div class="col-md-2">
                
                </div>
                <?php echo form_close()?>
            </div>

<div class="col-sm-2 no-padding">


                <?php  $this->load->view('admin/Human_resources/employee_forms/job_requests/sidebar_application_data');?>
</div>
        </div>
    </div>



</div>


<!------ table -------->
<?php       if(isset($records) &&!empty($records)){ ?>
   
    <div class="col-xs-12 no-padding">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">طلبات التوظيف</h3>
            </div>
            <div class="panel-body"> 
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
            <td><?php echo $record->national_num; ?></td>
            <td><?php echo $record->name; ?></td>
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
               href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/add_previous_work/<?php echo $record->id;?>">الأعمال السابقة </a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/add_science_qualification/<?php echo $record->id;?>">المؤهلات العلمية</a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/add_dawrat/<?php echo $record->id;?>">الدورات التدريبية</a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/add_skills/<?php echo $record->id;?>">الهوايات ومهارات</a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/add_persons/<?php echo $record->id;?>">المعرفون</a></li>
    </ul>
</div>


</td>
<td>
    <div class="col-md-6" <?php  if($record->determine_interview==0){?> style="display: none;"
    <?php } else { ?> style="display:block "  <?php }?> >
        <a href="<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/make_application/<?php echo $record->id;?>"target="_blank"><button class="btn btn-add" >بدء المقابله</button></a>
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
    <a href="<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/offer_work/<?php echo $record->id;?>"target="_blank"><button class="btn btn-add" >عرض عمل </button></a>
</div></td>
<td>
<a onclick="print(<?= $record->id ?>)" title="طباعه"><i
                                            class="fa fa-print"></i></a>
<!-- 
<a href="<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/update_application/<?php echo $record->id; ?>"><i
        class="fa fa-pencil-square-o" aria-hidden="true"></i> </a> -->
        <a href="#" onclick='swal({
                    title: "هل انت متأكد من التعديل ؟",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "تعديل",
                    cancelButtonText: "إلغاء",
                    closeOnConfirm: false
                    },
                    function(){
                   // swal("تم الحذف!", "", "success");
                    window.location="<?= base_url() . "human_resources/employee_forms/job_requests/Job_request/update_application/" . $record->id ?>";
                    });'>
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
 <!-- <a onclick="$('#adele').attr('href', '<?= base_url() . "human_resources/employee_forms/job_requests/Job_request/Delete_application/" . $record->id ?>');"
   data-toggle="modal" data-target="#modal-delete"
   title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>  -->
   <a href="#" onclick='swal({
                    title: "هل انت متأكد من الحذف ؟",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "حذف",
                    cancelButtonText: "إلغاء",
                    closeOnConfirm: false
                    },
                    function(){
                    swal("تم الحذف!", "", "success");
                    window.location="<?= base_url() . "human_resources/employee_forms/job_requests/Job_request/Delete_application/" . $record->id ?>";
                    });'>
                <i class="fa fa-trash"> </i></a> 
</td>


<!-- <div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
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
</div>  -->



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
            <label class="label  ">تاريخ المقابله</label>
            <input id="date" name="" type="date" onchange="put_date(<?php echo $record->id;?>,$(this).val())"
                   value="<?php echo $record->interview_date;?>"
                   class="form-control     error interview<?php echo $record->id;?>"
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
            url:"<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/put_date",
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

    function getFunction(valu,input_h,input_m) {
        if(valu==1)
        {
            document.getElementById(input_h).removeAttribute("disabled", "disabled");
            document.getElementById(input_h).setAttribute("data-validation", "required");
            document.getElementById(input_m).removeAttribute("disabled", "disabled");
            document.getElementById(input_m).setAttribute("data-validation", "required");
        }else{
            document.getElementById(input_h).setAttribute("disabled", "disabled");
            document.getElementById(input_h).removeAttribute("data-validation", "required");
            document.getElementById(input_h).value="";
           
            document.getElementById(input_m).setAttribute("disabled", "disabled");
            document.getElementById(input_m).removeAttribute("data-validation", "required");
            document.getElementById(input_m).value="";
            
        }
    }

</script>

<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>
    var loop1 = 0;

    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    date1.setAttribute("value", cal1.getDate().getDateString());
    date2.setAttribute("value", cal2.getDate().getDateString());

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    setDateFields1();


    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal2.setTime(cal1.getTime());
        setDateFields1();
    };

    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal1.setTime(cal2.getTime());
        setDateFields1();
    };


    cal1.onHide = function () {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function () {
        cal2.show(); // prevent the widget from being closed
    };

    function setDateFields1() {
        if (loop1 === 0) {

            <?php if (isset($result['date_birth']) && !empty($result['date_birth'])) {  ?>
            loop1++;
            date1.value = '<?=$result['date_birth']?>';
            date2.value = '<?=$result['date_birth_hijri']?>';
            <?php }else{ ?>
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
            <?php } ?>
        } else {
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
        }
        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
    }

    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }

    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();
    }


</script>
<script>

var loop2=0;
var cal3 = new Calendar(),
    cal4 = new Calendar(true, 0, true, true),
    date3 = document.getElementById('date-Miladi1'),
    date4 = document.getElementById('date-Hijri1'),
    cal3Mode = cal3.isHijriMode(),
    cal4Mode = cal4.isHijriMode();


date3.setAttribute("value", cal3.getDate().getDateString());
date4.setAttribute("value", cal4.getDate().getDateString());

document.getElementById('cal-3').appendChild(cal3.getElement());
document.getElementById('cal-4').appendChild(cal4.getElement());


cal3.show();
cal4.show();
setDateFields2();


cal3.callback = function () {
    if (cal3Mode !== cal1.isHijriMode()) {
        cal4.disableCallback(true);
        cal4.changeDateMode();
        cal4.disableCallback(false);
        cal3Mode = cal3.isHijriMode();
        cal4Mode = cal4.isHijriMode();
    } else

        cal4.setTime(cal3.getTime());
    setDateFields2();
};

cal4.callback = function () {
    if (cal4Mode !== cal4.isHijriMode()) {
        cal3.disableCallback(true);
        cal3.changeDateMode();
        cal3.disableCallback(false);
        cal3Mode = cal3.isHijriMode();
        cal4Mode = cal4.isHijriMode();
    } else

        cal3.setTime(cal4.getTime());
    setDateFields2();
};


cal3.onHide = function () {
    cal3.show(); // prevent the widget from being closed
};

cal4.onHide = function () {
    cal4.show(); // prevent the widget from being closed
};

function setDateFields2() {
    if (loop2 === 0) {
        <?php if (isset($date_start_work_m) && !empty($date_start_work_m)) {  ?>
        loop2++;
        date3.value = '<?=$date_start_work_m?>';
        date4.value = '<?=$date_start_work_h?>';
        <?php }else{ ?>
        date3.value = cal3.getDate().getDateString();
        date4.value = cal4.getDate().getDateString();
        <?php  } ?>
    } else {
    date3.value = cal3.getDate().getDateString();
    date4.value = cal4.getDate().getDateString();
    }
    date3.setAttribute("value", cal3.getDate().getDateString());
    date4.setAttribute("value", cal4.getDate().getDateString());
}

   

function showCal3() {
    if (cal3.isHidden())
        cal3.show();
    else
        cal3.hide();
}

function showCal4() {
    if (cal4.isHidden())
        cal4.show();
    else
        cal4.hide();
}


</script>
<script>

var loop3=0;
var cal5 = new Calendar(),
    cal6 = new Calendar(true, 0, true, true),
    date5 = document.getElementById('date-Miladi2'),
    date6 = document.getElementById('date-Hijri2'),
    cal5Mode = cal5.isHijriMode(),
    cal6Mode = cal6.isHijriMode();


date5.setAttribute("value", cal5.getDate().getDateString());
date6.setAttribute("value", cal6.getDate().getDateString());

document.getElementById('cal-5').appendChild(cal5.getElement());
document.getElementById('cal-6').appendChild(cal6.getElement());


cal5.show();
cal6.show();
setDateFields3();


cal5.callback = function () {
    if (cal5Mode !== cal5.isHijriMode()) {
        cal6.disableCallback(true);
        cal6.changeDateMode();
        cal6.disableCallback(false);
        cal5Mode = cal5.isHijriMode();
        cal6Mode = cal6.isHijriMode();
    } else

        cal6.setTime(cal5.getTime());
    setDateFields3();
};

cal6.callback = function () {
    if (cal6Mode !== cal6.isHijriMode()) {
        cal5.disableCallback(true);
        cal5.changeDateMode();
        cal5.disableCallback(false);
        cal5Mode = cal5.isHijriMode();
        cal6Mode = cal6.isHijriMode();
    } else

        cal5.setTime(cal6.getTime());
    setDateFields3();
};


cal5.onHide = function () {
    cal5.show(); // prevent the widget from being closed
};

cal6.onHide = function () {
    cal6.show(); // prevent the widget from being closed
};

function setDateFields3() {
    if (loop3 === 0) {
    
      
        loop3++;
        date5.value = '<?=$previous_request_date_m?>';
        date6.value = '<?=$previous_request_date_h?>';
      
       
    } else {
    date5.value = cal5.getDate().getDateString();
    date6.value = cal6.getDate().getDateString();
    }
   
    date5.setAttribute("value", cal5.getDate().getDateString());
    date6.setAttribute("value", cal6.getDate().getDateString());
}


function showCal5() {
    if (cal5.isHidden())
        cal5.show();
    else
        cal5.hide();
}

function showCal6() {
    if (cal6.isHidden())
        cal6.show();
    else
        cal6.hide();
}


</script>
<script>
    function print(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/job_requests/Job_request/print'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }


</script>