<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: none !important;
        font-weight: 500 !important;
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

    .print_forma {
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

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }





    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
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

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    /***/

    .btn-close-model,
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }

    .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {
        top: 100% !important;
        bottom: auto !important;
        margin-bottom: 1px !important;
    }


</style>

<?php
if(isset($result)&&!empty($result))
{
    $name =$result->name;
    $card_num=$result->card_num;
    $gender_id_fk=$result->gender_id_fk;
    $surname=$result->surname;
    $nationality_id_fk =$result->nationality_id_fk;
    $social_status_id_fk=$result->social_status_id_fk;
    $esdar_card_fk=$result->esdar_card_fk;
    $esdar_date=$result->esdar_date;
    $birth_date=$result->birth_date;
    $mob=$result->mob;
    $another_mob=$result->another_mob;
    $city_id_fk=$result->city_id_fk;
    $hai_id_fk=$result->hai_id_fk;
    $street_name=$result->street_name;
    $national_address=$result->national_address;
    $email=$result->email;
    $scientific_degree_fk=$result->scientific_degree_fk;
    $qualification_fk =$result->qualification_fk;
    $working_life=$result->working_life;
    $job_name_fk=$result->job_name_fk;
    $job_place_name=$result->job_place_name;
    $job_address=$result->job_address;
    $job_mob=$result->job_mob;
    $map_google_lng=$result->map_google_lng;
    $map_google_lat=$result->map_google_lat;
    $member_img =$result->member_img ;
    $card_img = $result->card_img;
    $array_date=explode("/",$birth_date);
    if(isset($array_date[2])){
        $age = $current_hijry_year - $array_date[2];
    }else{
        $age ="";
    }

    $out['form']='all_Finance_resource/General_assembly/update_member_maindata/'.$this->uri->segment(4);
}else{


    $name ="";
    $surname ="";
    $card_num="";
    $gender_id_fk="";
    $nationality_id_fk ="";
    $social_status_id_fk="";
    $esdar_card_fk="";
    $esdar_date="";
    $birth_date="";
    $mob="";
    $another_mob="";
    $city_id_fk="";
    $hai_id_fk="";
    $street_name="";
    $national_address="";
    $email="";
    $scientific_degree_fk="";
    $qualification_fk ="";
    $working_life="";
    $job_name_fk="";
    $job_place_name="";
    $job_address="";
    $job_mob="";
    $map_google_lng="";
    $map_google_lat="";
    $age='';
    $member_img ='';
    $card_img ='';
    $out['form']='all_Finance_resource/General_assembly/add_member_maindata';
}
?>
<?php
?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-9 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="pull-left">
                    <?php if(isset($result) && !empty($result)){
                        if($result->suspend ==1){
                      //  $data_load["emp_code"]= $personal_data[0]->emp_code;
                        $data_load["id"]=$result->id ;
                        $this->load->view('admin/all_Finance_resource_views/general_assembly/drop_down_menu', $data_load);
                        }
                    }?>
                </div>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">إسم العضو</label>
                        <input type="text" name="name" id="name" value="<?php echo $name;?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الجنس </label>
                        <select name="gender_id_fk" id="gender_id_fk"
                                data-validation="required"   class="form-control bottom-input"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($gender_data)&&!empty($gender_data)) {
                                foreach($gender_data as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($gender_id_fk)){ if($row->id_setting==$gender_id_fk){ echo 'selected'; } } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الجنسيه</label>
                        <select id="nationality_id_fk" data-validation="required" class="form-control bottom-input"
                                name="nationality_id_fk">
                            <option value="">إختر</option>
                            <?php
                            foreach($nationality as $row){
                                ?>
                                <option value="<?php echo $row->id_setting;?>"
                                    <?php if(!empty($nationality_id_fk)){  if($row->id_setting == $nationality_id_fk){ echo 'selected'; }  }?>> <?php echo $row->title_setting;?></option >
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">اللقب</label>
                        <select name="surname" class="form-control bottom-input" id="surname" data-validation="required">
                            <option value="">اختر</option>
                            <?php
                            if(isset($surname_arr)&&!empty($surname_arr)) {
                                foreach($surname_arr as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if(!empty($social_status_id_fk)){  if($row->id_setting==$surname){ echo 'selected'; } }?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الحاله الاجتماعيه   </label>
                        <select name="social_status_id_fk" class="form-control bottom-input" id="social_status_id_fk" data-validation="required">
                            <option value="">اختر</option>
                            <?php
                            if(isset($social_status)&&!empty($social_status)) {
                                foreach($social_status as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                    <?php if(!empty($social_status_id_fk)){  if($row->id_setting==$social_status_id_fk){ echo 'selected'; } }?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label"> رقم الهويه <span class="span-allow"> (10ارقام) </span></label>
                        <input type="text" name="card_num" id="card_num" onkeyup="get_length($(this).val(),'hint');"
                               maxlength="10" data-validation="required" value="<?php echo $card_num;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                        <small  id="hint" class="myspan"  style="color: red;"> </small>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">جهه الاصدار </label>
                        <select id="esdar_card_fk" name="esdar_card_fk"  class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if(isset($dest_card)&&!empty($dest_card)) {
                                foreach($dest_card as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                    <?php if(!empty($esdar_card_fk)){ if($row->id_setting==$esdar_card_fk){ echo 'selected'; } }?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ الاصدار</label>
                        <input type="text" name="esdar_date" id="esdar_date"  data-validation="required"
                               value="<?php echo $esdar_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ الميلاد هجرى</label>
                        <input type="text" name="birth_date" data-validation="required" id="birth_date" value="<?php echo $birth_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true" onchange="getAge($(this).val());">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">العمر</label>
                        <input type="text" name="age"  id="age" value="<?php echo $age;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true" readonly>
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label"">  الجوال <span class="span-allow"> (10ارقام) </span></label>
                        <input type="text" name="mob" maxlength="10" onkeyup="get_length($(this).val(),'tel');"
                               data-validation="required" id="phone3" value="<?php echo $mob;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                        <small  id="tel" class="myspan"  style="color: red;"> </small>
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label"> جوال أخر </label>
                        <input type="text" maxlength="10" name="another_mob" onkeypress="validate_number(event)"
                               onkeyup="get_length($(this).val(),'tel_another');"   value="<?php echo $another_mob; ?>"
                               class="form-control bottom-input" data-validation-has-keyup-event="true">
                        <small  id="tel_another" class="myspan"  style="color: red;"> </small>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">المدينة</label>
                        <select id="city_id_fk" name="city_id_fk" onchange="getAhai($(this).val());"  class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if(isset($cities)&&!empty($cities)) {
                                foreach($cities as $key=>$value){
                                    ?>
                                    <option value="<?php echo$key;?>"
                                        <?php if($key==$city_id_fk){ echo 'selected'; } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4 ">
                        <label class="label top-label">الحي</label>
                        <select id="hai_id_fk" name="hai_id_fk" disabled="disabled"  class="form-control bottom-input">
                            <option value="">إختر</option>
                            <?php if(isset($hai_id_fk) && !empty($hai_id_fk)){
                                foreach ($ahais as $hay){
                                    $select ='';  if($hay->id == $hai_id_fk){$select = 'selected';}?>
                                    <option <?= $select?> value="<?=$hay->id ?>"><?=$hay->name ?></option>
                                <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">اسم الشارع</label>
                        <input type="text" name="street_name"  data-validation="required"  value="<?php echo $street_name;?>" class="form-control bottom-input" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">العنوان الوطني</label>
                        <input type="text" name="national_address" id="national_address"  onkeypress="validate_number(event);"
                               data-validation="required" value=" <?php echo $national_address;?>" class="form-control bottom-input">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">البريد الإلكتروني</label>
                        <input type="email" name="email" id="email" data-validation="email" value="<?php echo $email;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">الدرجة العلمية </label>
                        <select id="scientific_degree_fk" name="scientific_degree_fk"
                                class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if(isset($Degree)&&!empty($Degree)) {
                                foreach($Degree as $value){
                                    $select ='';  if($value->id_setting == $scientific_degree_fk){$select = 'selected';}?>
                                    ?>
                                    <option value="<?php echo$value->id_setting;?>" <?=$select?>>
                                        <?php echo $value->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">المؤهلات العلمية </label>
                        <select id="qualification_fk" name="qualification_fk"
                                class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if(isset($science_qualification)&&!empty($science_qualification)) {
                                foreach($science_qualification as $value){
                                    $select ='';  if($value->id_setting == $qualification_fk){$select = 'selected';}?>
                                    ?>
                                    <option value="<?php echo$value->id_setting;?>" <?=$select?>>
                                        <?php echo $value->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <?php  $arr =array(1=>'نعم',0=>'لا');  ?>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">الحياة العملية</label>
                        <select id="working_life" name="working_life" onchange="GetType(this.value)"
                                class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            foreach($arr as $key=>$value) {
                                $select ='';  if($working_life !=''){ if($key == $working_life){ $select = 'selected';} } ?>
                                <option
                                    value="<?php echo $key; ?>" <?=$select?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-6">
                        <label class="label top-label">المهنة </label>
                        <select name="job_name_fk" id="job_name_fk" class="form-control bottom-input" <?php if($working_life !=1){ ?>disabled="disabled" <?php } ?>
                                aria-required="true" >
                            <option value="">إختر</option>
                            <?php foreach($job_role as $one_job_role){
                                $select ='';      if(!empty($job_name_fk)){ if($one_job_role->defined_id == $job_name_fk){
                                    $select = 'selected'; }  }?>

                                ?>
                                <option value="<?php echo $one_job_role->id_setting ; ?>" <?=$select?>
                                ><?php echo $one_job_role->title_setting ; ?></option>';
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                        <label class="label top-label">جهة العمل </label>
                        
                    <input name="job_place_name" id="job_place_name"   style="padding: 0;"
                               <?php if($working_life !=1){ ?>disabled="disabled" <?php } ?> value="<?=$job_place_name?>"
                               class=" form-control bottom-input" type="text">                       
                        <!--<select name="job_place_name" id="job_place_name" class="form-control bottom-input"  aria-required="true"
                            <?php if($working_life !=1){ ?> disabled="disabled" <?php } ?>>
                            <option value="">إختر</option>
                            <?php if(!empty($employer)){ foreach($employer as $value){

                                $select ='';    if(!empty($job_place_name)){ if($value->id_setting == $job_place_name){
                                    $select = 'selected'; } }


                                ?>
                                <option value="<?php echo $value->id_setting ; ?>" <?=$select?>
                                ><?php echo $value->title_setting ; ?></option>';
                            <?php } }?>
                        </select>
                        -->
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%"> عنوان العمل</label>
                        <input id="job_address"  name="job_address"   style="padding: 0;"
                               <?php if($working_life !=1){ ?>disabled="disabled" <?php } ?> value="<?=$job_address?>"
                               class=" form-control bottom-input" type="text">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%"> هاتف العمل</label>
                        <input id="job_mob"  name="job_mob" maxlength="10"
                               onkeyup="get_length($(this).val(),'work_mobile_span');"
                            <?php if($working_life !=1){ ?>  disabled="disabled" <?php } ?> value="<?=$job_mob?>"
                               class="  form-control bottom-input" type="text"
                               onkeypress="validate_number(event)">
                        <small  id="work_mobile_span" class="myspan"  style="color: red;"> </small>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%">الصوره الشخصيه </label>
                        <input id="member_img" onchange="readURL(this);" name="member_img"    style="padding: 0;" class=" form-control bottom-input" type="file">
                        <?php if(!empty($member_img)){?>
                        <a data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                          onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/images/<?php echo $member_img;?>');">
                            <i class="fa fa-eye"></i>
                        </a>
                        <?php } ?>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%">صورة الهوية </label>
                        <input id="card_img" onchange="readURL(this);" name="card_img"    style="padding: 0;" class=" form-control bottom-input" type="file">
                        <?php if(!empty($card_img)){?>
                        <a  data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                        onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/images/<?php echo $card_img;?>');">
                            <i class="fa fa-eye"></i>
                        </a>
                        <?php  } ?>
                    </div>
                </div>

                <div class="col-md-12">

                        <label class="control-label">الموقع على الخريطة </label>
                        <input type="hidden" name="map_google_lng" id="lng" value="<?php echo $map_google_lng; ?>" />
                        <input type="hidden" name="map_google_lat" id="lat"   value="<?php echo $map_google_lat; ?>" />
                        <?php  echo $maps['html'];?>

                </div>

                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <br /><br />
                        <button type="submit" id="save" name="save" value="save"
                                class="btn btn-add">
                            <span><i class="fa fa-floppy-o"></i></span> حفظ
                        </button>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------>
    <?php  $this->load->view('admin/all_Finance_resource_views/general_assembly/general_assembly_person_data');?>
    <!------ table -------->
    <?php
    if(isset($records) &&!empty($records)){
    ?>
</div>
    <div class="col-xs-12 no-padding">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">البيانات الأساسية</h3>
            </div>
            <div class="panel-body"><br>
                <div class="col-md-12 no-padding">

                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="info">
                            <th class="text-center">م</th>
                            <th class="text-center">رقم العضوية</th>
                            <th class="text-center">إسم العضو</th>
                            <th>رقم الهوية</th>
                            <th>رقم الجول</th>
                            <th>نوع العضوية</th>
                            <th>حالة العضوية</th>
                            <th>الحالة</th>

                            <th class="text-center">الاجراءات</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $a=1;
                        $emp_type = array(1=>'نشط',0=>'غير نشط');
                        if(isset($records)&&!empty($records)) {
                        $membership_status_arr =array(0=>'غير نشط',1=>'نشط');
                            foreach ($records as $record) {
                                ?>
                                <tr>
                                    <td><?php echo $a ?></td>

                                    <?php if(!empty($record->membership_num)){ ?>
                                    <td><? echo $record->membership_num; ?></td>
                                    <?php }else{ ?>
                                    <td style="color: red">غير محدد</td>
                                    <?php } ?>
                                    <td><? echo $record->name; ?></td>
                                    <td><? echo $record->card_num; ?></td>
                                    <td><? echo $record->mob; ?></td>
                                    <?php if(!empty($record->membership_type)){ ?>
                                        <td><? echo $membership_arr[$record->membership_type]->title_setting; ?></td>
                                    <?php }else{ ?>
                                        <td style="color: red">غير محدد</td>
                                    <?php } ?>
                                    <?php if(!empty($record->membership_status)){ ?>
                                        <td><? echo $membership_status_arr[$record->membership_status]; ?></td>
                                    <?php }else{ ?>
                                        <td style="color: red">غير محدد</td>
                                    <?php } ?>

                                    <td>
                                        <?php if ($record->suspend == 1) {
                                            $class = "success";?>
                                        <a href="#">
                                      <?php  }elseif ($record->suspend == 0) {
                                            $class = "danger";?>
                                            <a href="<?php echo base_url(); ?>all_Finance_resource/General_assembly/ChangeType/<?php  echo $record->id;?>/<?php  echo $record->suspend;?>">
                                      <?php  } ?>
                                      <span   class="label label-pill label-<?= $class ?> m-r-15"
                                              style="font-size: 12px;"><?= $emp_type[$record->suspend] ?></span></a>
                                    </td>
                                    <td>
                                        <?php if ($record->suspend == 1) {?>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger">اضافه</button>
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a target="_blank"
                                                       href="<?php echo base_url(); ?>all_Finance_resource/General_assembly/add_membership_data/<?php echo $record->id; ?>">بيانات العضوية</a></li></ul>
                                        </div>
                                    <?php } ?>

                                        <a href="<?php echo base_url(); ?>all_Finance_resource/General_assembly/update_member_maindata/<?php echo $record->id; ?>"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                        <a onclick="$('#adele').attr('href', '<?= base_url() . "all_Finance_resource/General_assembly/delete_member_maindata/" . $record->id ?>');"
                                           data-toggle="modal" data-target="#modal-delete"
                                           title="حذف"> <i class="fa fa-trash"
                                                           aria-hidden="true"></i> </a>


                                        <a href = "<?php echo base_url('all_Finance_resource/General_assembly/print_member_details').'/'.$record->id ?>" target = "_blank" >
                                            <i class="fa fa-print" aria-hidden = "true" ></i > </a>

                                        <a  href = "<?php echo base_url('all_Finance_resource/General_assembly/print_card').'/'.$record->id ?>" target = "_blank" >
                                            <i   style="background-color: #0a568c" class="fa fa-print" aria-hidden = "true" ></i > </a>



                                    </td>

                                </tr>
                                <?php
                                $a++;
                            }
                        } else {?>
                            <td colspan="6"><div style="color: red; font-size: large;">لم يتم اضافه أعضاء الي الان</div></td>
                        <?php  }
                        ?>
                        </tbody>
                    </table>

            


                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!----- end table ------>

<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
            </div>
            <div class="modal-body">
                <img src="" id="my_image" width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
    jQuery(function($){

        $(".date_as_mask").mask("99/99/9999");
    });
</script>



<script>
    function getAge(birth) {
        var birth_date=birth;
        var res = birth_date.split("/");
        var year_birth=res[2];
        var current_year = '<?php echo $current_hijry_year?>';
        var ageYear = parseFloat(current_year)  -parseFloat(year_birth);
        $('#age').val(ageYear+'سنه');

    }
</script>
<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
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
    function length_hesab_om(length) {
        var len=length.length;
        if(len<24){
            alert(" رقم الحساب لابد الايقل عن 24 حرف او رقم");
        }
        if(len>24){
            alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
        }
        if(len==24){
        }
    }
</script>
<script>
    function get_length(len,span_id)
    {
        if(len.length < 10){
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if(len.length >10){
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if(len.length ==10){
            document.getElementById("save").removeAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = '';
        }
    }
</script>
<script>
    function get_banck_code(valu)
    {
        var valu=valu.split("-");
        $('#bank_code').val(valu[1]);
    }
</script>
<script>
    function chek_length(inp_id,len)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(''+inchek_id).val();
        if(inchek.length < len){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
            document.getElementById("save").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,len);
            $(inchek_id).val(inchek_out);
        }
        if(inchek.length > len){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
            document.getElementById("save").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,len);
            $(inchek_id).val(inchek_out);
        }
        if(inchek.length == len){
            document.getElementById(""+ inp_id +"_span").innerHTML ='';
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function getAhai(city_id){
        if(city_id != ''){
            var dataString='city_id='+city_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getAhai',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#hai_id_fk').addClass("selectpicker");
                    document.getElementById("hai_id_fk").removeAttribute("disabled", "disabled");
                    document.getElementById("hai_id_fk").setAttribute("data-validation", "required");
                    document.getElementById("hai_id_fk").setAttribute("data-show-subtext", "true");
                    document.getElementById("hai_id_fk").setAttribute("data-live-search", "true");
                    $('#hai_id_fk').html(html);
                    $('#hai_id_fk').selectpicker("refresh");
                }
            });
        }else if(city_id == '' ) {

            $('#hai_id_fk').removeClass("selectpicker");

            $("#hai_id_fk").val('');
            document.getElementById("hai_id_fk").removeAttribute("data-show-subtext", "true");
            document.getElementById("hai_id_fk").removeAttribute("data-live-search", "true");
            document.getElementById("hai_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("hai_id_fk").removeAttribute("data-validation", "required");
            $('#hai_id_fk').selectpicker("refresh");
        }
    }
</script>
<!---------------------------------------------------------------------------------------->


<script>
    function GetType(valu) {
        if(valu == 1){
            document.getElementById("job_name_fk").removeAttribute("disabled", "disabled");
            document.getElementById("job_place_name").removeAttribute("disabled", "disabled");
            document.getElementById("job_address").removeAttribute("disabled", "disabled");
            document.getElementById("job_mob").removeAttribute("disabled", "disabled");
            document.getElementById("job_title").setAttribute("data-validation", "required");
            document.getElementById("employer").setAttribute("data-validation", "required");
            document.getElementById("work_address").setAttribute("data-validation", "required");
            document.getElementById("job_mob").setAttribute("data-validation", "required");

        } else {
            document.getElementById("job_name_fk").value='';
            document.getElementById("job_place_name").value='';
            document.getElementById("job_address").value='';
            document.getElementById("job_mob").value='';

            document.getElementById("job_name_fk").setAttribute("disabled", "disabled");
            document.getElementById("job_place_name").setAttribute("disabled", "disabled");
            document.getElementById("job_address").setAttribute("disabled", "disabled");
            document.getElementById("job_mob").setAttribute("disabled", "disabled");
            document.getElementById("job_name_fk").removeAttribute("data-validation", "required");
            document.getElementById("job_place_name").removeAttribute("data-validation", "required");
            document.getElementById("job_address").removeAttribute("data-validation", "required");
            document.getElementById("job_mob").removeAttribute("data-validation", "required");

        }


    }

</script>


