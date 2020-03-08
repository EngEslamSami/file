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


  .my_style{

      color: #222;
      font-size: 15px;
      font-weight: 500;

  } 
   
   
   
   /* .top-label {
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
    #map_canvas{

        height: 200px !important;

    }
*/

</style>
<?php
if(isset($row)&&!empty($row))
{

    $member_id_fk=$row->member_id_fk;
    $member_mob=$row->member_mob;
    $member_ship_type_fk=$row->member_ship_type_fk;
    $member_ship_num=$row->member_ship_num;
    $qrar_num=$row->qrar_num;
    $qrar_date=$row->qrar_date;
    $value2=$row->value;
    $bank_id_fk=$row->bank_id_fk;
    $bank_account_num=$row->bank_account_num;
    $from_date=$row->from_date;
    $to_date=$row->to_date;
    $alert_update=$row->alert_update;

    $member_status=$row->member_status;
    $member_status_reason_fk=$row->member_status_reason_fk;
    //==============================================
    // $gender_id_fk=$member->gender_id_fk;
    //$nationality_id_fk=$member->nationality_id_fk;
    $name =$member->name;
    $card_num=$member->card_num;
    $gender_id_fk=$member->gender_id_fk;
    $surname=$member->surname;
    $nationality_id_fk =$member->nationality_id_fk;
    $social_status_id_fk=$member->social_status_id_fk;
    $esdar_card_fk=$member->esdar_card_fk;
    $esdar_date=$member->esdar_date;
    $birth_date=$member->birth_date;
    $mob=$member->mob;
    $another_mob=$member->another_mob;
    $city_id_fk=$member->city_id_fk;
    $hai_id_fk=$member->hai_id_fk;
    $street_name=$member->street_name;
    $national_address=$member->national_address;
    $email=$member->email;
    $scientific_degree_fk=$member->scientific_degree_fk;
    $qualification_fk =$member->qualification_fk;
    $working_life=$member->working_life;
    $job_name_fk=$result->job_name_fk;
    $job_place_name=$member->job_place_name;
    $job_address=$result->job_address;
    $job_mob=$member->job_mob;



    $out['form']='all_Finance_resource/fr_member/Fr_member/edit_fr_member/'.$this->uri->segment(4);
}else{

    $member_id_fk='';
    $member_mob='';
    $member_ship_type_fk='';
    $member_ship_num='';
    $qrar_num='';
    $qrar_date='';
    $value2='';
    $bank_id_fk='';
    $bank_account_num='';
    $from_date='';
    $to_date='';
    $alert_update='';
    $member_status='';
    $member_status_reason_fk='';
    //================================================================================
    $name ='';
    $card_num='';
    $gender_id_fk='';
    $surname='';
    $nationality_id_fk ='';
    $social_status_id_fk='';
    $esdar_card_fk='';
    $esdar_date='';
    $birth_date='';
    $mob='';
    $another_mob='';
    $city_id_fk='';
    $hai_id_fk='';
    $street_name='';
    $national_address='';
    $email='';
    $scientific_degree_fk='';
    $qualification_fk ='';
    $working_life='';
    $job_name_fk='';
    $job_place_name='';
    $job_address='';
    $job_mob='';


    $out['form']='all_Finance_resource/fr_member/Fr_member';
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
                            $this->load->view('admin/directors/general_assembly/drop_down_menu', $data_load);
                        }
                    }?>
                </div>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">اسم العضو </label>
                        <select name="member_id_fk" id="" data-validation="required" class="form-control bottom-input"
                                aria-required="true" onchange="get_member_dat($(this).val());">
                            <option value="">إختر</option>
                            <?php
                            if(isset($assembley_members)&&!empty($assembley_members)) {
                                foreach($assembley_members as $row){
                                    ?>
                                    <option value="<?php echo $row->id;?>"
                                        <?php if($member_id_fk==$row->id) echo 'selected';?>> <?php echo $row->name;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <?php $arr_types=array(1=>'نشط',2=>'موقوف');?>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">حاله العضو</label>
                        <select name="member_status" id="member_status"
                                data-validation="required"    class="form-control bottom-input"
                                aria-required="true" onchange="get_halt_member($(this).val());">
                            <option value="">إختر</option>
                            <?php if(isset($arr_types)&&!empty($arr_types)){
                                foreach ($arr_types as $key=>$value){?>
                                    <option value="<?php echo $key ;?>" <?php if($member_status==$key) echo 'selected';?>><?php echo $value ;?></option>
                                <?php } }?>




                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">اسباب الوقف</label>
                        <select name="member_status_reason_fk" id="reason"
                                data-validation="required" <?php if($member_status!=2) echo 'disabled';?>    class="form-control bottom-input"
                                aria-required="true" onchange="">
                            <option value="">إختر</option>
                            <?php
                            if(isset($reasons)&&!empty($reasons)) {
                                foreach($reasons as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if($member_status_reason_fk==$row->id_setting) echo 'selected';?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الجنس </label>
                        <select name="gender_id_fk" disabled id="gender_id_fk"
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
                </div>
                <div class="col-md-12">

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الجنسيه</label>
                        <select id="nationality_id_fk" disabled data-validation="required" class="form-control bottom-input"
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
                        <select name="surname" disabled class="form-control bottom-input" id="surname" data-validation="required">
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
                        <select name="social_status_id_fk" disabled class="form-control bottom-input" id="social_status_id_fk" data-validation="required">
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


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label"> رقم الهويه  <span class="span-allow"> (10ارقام) </span></label>
                        <input type="text" disabled name="card_num" id="card_num" onkeyup="get_length($(this).val(),'hint');"
                               maxlength="10" data-validation="required" value="<?php echo $card_num;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                        <small  id="hint" class="myspan"  style="color: red;"> </small>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">جهه الاصدار </label>
                        <select id="esdar_card_fk"  disabled name="esdar_card_fk"  class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if(isset($dest_card)&&!empty($dest_card)) {
                                foreach($dest_card as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"
                                        <?php if($row->id_setting==$esdar_card_fk) echo 'selected';?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ الاصدار</label>
                        <input type="text" disabled name="esdar_date" id="esdar_date"  data-validation="required"
                               value="<?php echo $esdar_date;?> "
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true">
                    </div>
                </div>
                <div class="col-md-12">


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ الميلاد هجرى</label>
                        <input type="text"  disabled name="birth_date" data-validation="required" id="birth_date" value="<?php echo $birth_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true" onchange="getAge($(this).val());">
                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label"">  الجوال <span class="span-allow"> (10ارقام) </span></label>
                        <input type="text"  name="member_mob" maxlength="10" onkeyup="get_length($(this).val(),'tel');"
                               data-validation="required" id="phone3" value="<?php echo $member_mob;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                        <small  id="tel" class="myspan"  style="color: red;"> </small>
                    </div>



                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">المدينة</label>
                        <select id="city_id_fk" disabled name="city_id_fk" onchange="getAhai($(this).val());"  class="form-control bottom-input" data-validation="required">
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
                        <select id="hai_id_fk" disabled name="hai_id_fk"   class="form-control bottom-input">
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
                        <input type="text" disabled name="street_name"  id="street_name" data-validation="required"  value="<?php echo $street_name;?>" class="form-control bottom-input" data-validation-has-keyup-event="true">
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">العنوان الوطني</label>
                        <input type="text"  disabled name="national_address" id="national_address"  onkeypress="validate_number(event);"
                               data-validation="required" value="<?php echo $national_address;?>" class="form-control bottom-input">
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">البريد الإلكتروني</label>
                        <input type="email" disabled name="email"  id="email" data-validation="email" value="<?php echo $email;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">الدرجة العلمية </label>
                        <select id="scientific_degree_fk" disabled name="scientific_degree_fk"
                                class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if(isset($Degree)&&!empty($Degree)) {
                                foreach($Degree as $value){

                                    ?>
                                    <option value="<?php echo$value->id_setting;?>" <?php if($value->id_setting==$scientific_degree_fk) echo 'selected';?> >
                                        <?php echo $value->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">المؤهلات العلمية </label>
                        <select id="qualification_fk" disabled name="qualification_fk"
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
                </div>
                <div class="col-md-12">

                    <?php  $arr =array(1=>'نعم',0=>'لا');  ?>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">الحياة العملية</label>
                        <select id="working_life" disabled  name="working_life" onchange="GetType(this.value)"
                                class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            foreach($arr as $key=>$value) {?>
                                <option
                                    value="<?php echo $key; ?>" <?php if($key==$working_life) echo 'selected';?> > <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-6">
                        <label class="label top-label">المهنة </label>
                        <select name="job_name_fk" disabled id="job_name_fk" class="form-control bottom-input"
                                aria-required="true" >
                            <option value="">إختر</option>
                            <?php foreach($job_role as $one_job_role){

                                ?>
                                <option value="<?php echo $one_job_role->id_setting ; ?>"
                                    <?php if($one_job_role->id_setting==$job_name_fk) echo 'selected';?> ><?php echo $one_job_role->title_setting ; ?></option>';
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                        <label class="label top-label">جهة العمل </label>

                        <select name="job_place_name" id="job_place_name"  disabled   style="padding: 0;"

                                class=" form-control bottom-input" type="text">
                            <?php if(!empty($employer)){ foreach($employer as $value){



                                ?>
                                <option value="<?php echo $value->id_setting ; ?>"
                                    <?php if($value->id_setting==$job_place_name) echo 'selected';?> ><?php echo $value->title_setting ; ?></option>';
                            <?php } }?>
                        </select>

                    </div>





                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">نوع العضويه</label>
                        <select name="member_ship_type_fk" id="member_status"
                                data-validation="required"    class="form-control bottom-input"
                                aria-required="true" onchange="">
                            <option value="">إختر</option>
                            <?php if(isset($member_types)&&!empty($member_types)){
                                foreach ($member_types as $row){?>
                                    <option value="<?php echo $row->id_setting;?>"<?php if($row->id_setting==$member_ship_type_fk)echo 'selected';?>><?php echo $row->title_setting;?></option>
                                <?php } }?>




                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">رقم العضويه </label>
                        <input type="text"  name="member_ship_num" id="" data-validation="required" value="<?php echo $member_ship_num;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">بقرار رقم </label>
                        <input type=""  name="qrar_num" id="" data-validation="" value="<?php echo $qrar_num;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">التاريخ</label>
                        <input type="text"   name="qrar_date" data-validation="required" id="" value="<?php echo $qrar_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true" onchange="">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label"> مبلغ الاشتراك </label>
                        <input type=""  name="value" id="" data-validation="required" value="<?php echo $value2;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true">
                    </div>



                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">البنك </label>

                        <select name="bank_id_fk" id="" data-validation="required" class="form-control bottom-input"
                                aria-required="true" onchange="">
                            <option value="">إختر</option>
                            <?php if(isset($banks)&&!empty($banks)){
                                foreach ($banks as $row){?>
                                    <option value="<?php echo $row->id ;?>"<?php if($row->id==$bank_id_fk)echo 'selected';?>><?php echo $row->ar_name;?></option>
                                <?php } }?>




                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label"> رقم الحساب  </label>
                        <input type="" maxlength="24" name="bank_account_num" id="bank_account_num" onkeyup="length_hesab_om($(this).val());" data-validation="required" value="<?php echo $bank_account_num;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true">
                        <small style="color:red; display: none" class="bank_account_num">رقم الحساب لايقل عن 24 رقم</small>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">بدايه الاشتراك</label>
                        <input type="text"   name="from_date" data-validation="required" id="" value="<?php echo $from_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true" onchange="">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">نهايه الاشتراك</label>
                        <input type="text"   name="to_date" data-validation="required" id="" value="<?php echo $to_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true" onchange="">
                    </div>
                    <?php $peroids=array(1=>'يوم',7=>'اسبوع',14=>'اسبوعين',30=>'شهر'); ?>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ التحديث </label>
                        <select name="alert_update" id=""
                                data-validation="required"    class="form-control bottom-input"
                                aria-required="true" onchange="">
                            <option value="">اختر</option>
                            <?php
                            if(isset($peroids)&&!empty($peroids)) {
                                foreach($peroids as $key=>$value){
                                    ?>
                                    <option value="<?php echo$key;?>"
                                        <?php if($key==$alert_update) echo 'selected';?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>



                        </select>
                    </div>

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
    <div class="load2">
        <?php
        if(isset($result)&&!empty($result)) {

            $data['result'] = $result;

            $this->load->view('admin/directors/general_assembly/general_assembly_person_data', $data);
        }else{
            $this->load->view('admin/directors/general_assembly/general_assembly_person_data');

        }  ?>
        <div>
            <!------ table -------->

            <?php
            if(isset($members)&&!empty($members)) {?>
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="info">
                        <th class="text-center">م</th>
                        <th>اسم العضو</th>
                        <th>رقم جوال</th>
                        <th>نوع العضويه</th>
                        <th>رقم العضويه </th>
                        <th>باقرار رقم/ تاريخ</th>

                        <th>الاجراء</th>



                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $a=1;
                    $emp_type = array('لم تحدد' ,'نشط','موقوف');
                    if(isset($members)&&!empty($members)) {

                        foreach ($members as $record) {
                            ?>
                            <tr>
                                <td><?php echo $a;?></td>
                                <td><?php echo $record->member_name;?></td>
                                <td><?php echo $record->member_mob;?></td>
                                <td><?php echo $record->member_type;?></td>
                                <td><?php echo $record->member_ship_num;?></td>
                                <td> (<?php echo $record->qrar_num;?>)بتاريخ<?php echo $record->qrar_date;?></td>
                                    <!-- Button trigger modal -->


                                <td> <a href="<?php echo base_url(); ?>all_Finance_resource/fr_member/fr_member/edit_fr_member/<?php echo $record->id; ?>"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <a href="<?php echo base_url().'all_Finance_resource/fr_member/fr_member/delete_record/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                        <i class="fa fa-trash" aria-hidden="true"></i>


                                </td>




                            </tr>
                            <?php
                            $a++;
                        }
                    }
                    ?>
                    </tbody>
                </table>


            <?php } ?>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
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

                        $('.bank_account_num').show();
                        document.getElementById("save").setAttribute("disabled", "disabled");
                    }
                    if(len>24){

                        $('.bank_account_num').show();
                        document.getElementById("save").setAttribute("disabled", "disabled");
                    }
                    if(len==24){
                        $('.bank_account_num').hide();
                        document.getElementById("save").removeAttribute("disabled", "disabled");
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
                function get_member_dat(valu)
                {
                    $.ajax({
                        type:'post',
                        url:"<?php echo base_url();?>all_Finance_resource/fr_member/Fr_member/get_emp_data",
                        data:{valu:valu},
                        success:function(d){
                            var obj=JSON.parse(d);
                            $('#gender_id_fk').val(obj.gender_id_fk);
                            $('#nationality_id_fk').val(obj.nationality_id_fk);
                            $('#surname').val(obj.surname);
                            $('#social_status_id_fk').val(obj.social_status_id_fk);
                            $('#card_num').val(obj.card_num);
                            $('#esdar_card_fk').val(obj.esdar_card_fk);
                            $('#birth_date').val(obj.birth_date);
                            $('#city_id_fk').val(obj.city_id_fk);
                            $('#esdar_date').val(obj.esdar_date);
                            //                    email  hai_id_fk   national_address  job_place_name job_name_fk working_life  street_name  qualification_fk  scientific_degree_fk
                            $('#email').val(obj.email);
                            $('#hai_id_fk').val(obj.hai_id_fk);
                            $('#national_address').val(obj.national_address);
                            $('#job_place_name').val(obj.job_place_name);
                            $('#job_name_fk').val(obj.job_name_fk);
                            $('#working_life').val(obj.working_life);
                            $('#street_name').val(obj.street_name);
                            $('#scientific_degree_fk').val(obj.scientific_degree_fk);
                            $('#qualification_fk').val(obj.qualification_fk);
                            $('#phone3').val(obj.mob);
                        }

                    });

                    $.ajax({
                        type:'post',
                        url:"<?php echo base_url();?>all_Finance_resource/fr_member/Fr_member/get_side_bar",
                        data:{valu:valu},
                        success:function(d){
                            $('.load2').html(d);

                        }

                    });
                }

            </script>

            <script>
                function get_halt_member(valu)
                {
                    if(valu==2)
                    {
                        $('#reason').attr('disabled',false);
                    }else{
                        $('#reason').attr('disabled',true);
                        $('#reason').val('');
                    }
                }


            </script>





