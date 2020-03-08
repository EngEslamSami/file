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
</style>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-9 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="pull-left">

                </div>
            </div>

            <?php if(isset($item)&&!empty($item)){


                $donor_num=$item->donor_num;
                $fe2a_type=$item->fe2a_type;
                $d_status=$item->d_status;
                $d_name=$item->d_name;
                $d_gender_fk=$item->d_gender_fk;
                $d_national_num=$item->d_national_num;
                $d_national_type=$item->d_national_type;
                $d_national_place=$item->d_national_place;
                $city3=$item->city;

                $address=$item->address;
                $job_fk=$item->job_fk;
                $job_place=$item->job_place;
                $specialized_fk=$item->specialized_fk;
                $d_nationality_fk=$item->d_nationality_fk;
                $barid_box=$item->barid_box;
                $barid_code=$item->barid_code;
                $fax=$item->fax;
                $mob=$item->mob;
                $d_email=$item->d_email;
                $d_activity_fk=$item->d_activity_fk;
                $d_message_method=$item->d_message_method;
                $d_message_mob=$item->d_message_mob;
                $pay_method=$item->pay_method;
                $bank_id_fk=$item->bank_id_fk;
                $bank_account_num=$item->bank_account_num;
                $bank_branch=$item->bank_branch;
                $action=base_url().'all_Finance_resource/donors/Donor/edit_donor/'.$item->id;
            }else{
                $donor_num='';
                $fe2a_type='';
                $d_status='';
                $d_name='';
                $d_gender_fk='';
                $d_national_num='';
                $d_national_type='';
                $d_national_place='';
                $city3='';
                $address='';
                $job_fk='';
                $job_place='';
                $specialized_fk='';
                $d_nationality_fk='';
                $barid_box='';
                $barid_code='';
                $fax='';
                $mob='';
                $d_email='';
                $d_activity_fk='';
                $d_message_method='';
                $d_message_mob='';
                $pay_method='';
                $bank_id_fk='';
                $bank_account_num='';
                $bank_branch='';
                $action=base_url().'all_Finance_resource/donors/Donor';
            }
            ?>
            <div class="panel-body">
                <?php
                $donors_types=array(1=>'فرد',2=>'مؤسسه /شركه',3=>'جهات مانحه',4=>'مؤسسات حكوميه');
                $send_pay=array(1=>'ارغب في استلام البريدعن طريق البريد الالكتروني',2=>'ارغب في استلام البريد عن طريق صندوق البريده',3=>'لا ارغب في استلام البريد');

                $yes_no=array(1=>'نعم','2'=>'لا');
                $pay_paid=array(1=>'نقدي',2=>'شيك',3=>'ايداع نقدي',4=>'ايداع شيك',5=>'شبكه',6=>'امد مستديم');
                $gender=array(1=>'ذكر','2'=>'انثي');
                $satatus=array(1=>'نشط','2'=>'غيرنشط');



                ?>
                <form action="<?php echo $action ;?>" method="post">
                    <div class="col-md-12">
                <div class=" form-group col-md-2 padding-4">
                    <label class="label top-label">فئه المتبرع </label>
                    <select name="fe2a_type" id="fe2a_type"
                            data-validation="required" onchange="get_cat($(this).val());"   class="form-control bottom-input"
                            aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        if(isset($donors_types)&&!empty($donors_types)){
                        foreach ($donors_types as $key=>$value){
                        ?>
                            <option value="<?php echo $key;?>"<?php if($key==$fe2a_type) echo'selected';?>><?php echo $value;?></option>
                        <?php } }?>

                    </select>
                </div>
                <div class="form-group col-md-2  padding-4">
                    <label class="label top-label"> رقم المتبرع</label>
                    <input type="text" name="donor_num" maxlength="" onkeyup="" <?php if($num>0){echo 'readonly';} ?> data-validation="required" id="donor_num" value="<?php if(isset($num)&&$num>0){echo $num +1 ;} else{ echo $donor_num; }?>"
                           class="form-control bottom-input"
                           data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">

                </div>
                <div class="form-group col-md-2  padding-4">
                    <label class="label top-label">حاله المتبرع</label>
                    <select name="d_status" id="d_status"
                            data-validation="required"   class="form-control bottom-input"
                            aria-required="true">

                        <option value=""> اختر</option>
                        <option value="1" <?php if($d_status==1) echo'selected';?>> نشط</option>
                        <option value="2"  <?php if($d_status==2) echo'selected';?>> غير نشط</option>

                    </select>

                </div>

                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label"> اسم المتبرع</label>
                    <input type="text" name="d_name" maxlength="" onkeyup=""  data-validation="required" id="d_name" value="<?php echo $d_name;?>"
                           class="form-control bottom-input"
                           data-validation-has-keyup-event="true"  onkeypress="">

                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label">الجنس </label>

                    <select name="d_gender_fk" id="gens"
                            data-validation="required"   class="form-control bottom-input"
                            aria-required="true" <?php if($fe2a_type==2||$fe2a_type==3||$fe2a_type==4||$fe2a_type==4) echo 'disabled' ;?>>

                        <option value=""> اختر</option>
                        <option value="1" <?php if($d_gender_fk==1) echo'selected';?>> ذكر</option>
                        <option value="2"  <?php if($d_gender_fk==2) echo'selected';?>> انثي</option>

                    </select>


                </div>
                        </div>
                    <div class="col-md-12 ">
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label">نوع الهويه </label>
                    <select name="d_national_type" id="d_national_type"
                            data-validation="required"   class="form-control bottom-input"
                            aria-required="true" <?php if($fe2a_type!=1) echo 'disabled' ;?>>

                        <option value=""> اختر</option>
                        <?php
                        if(isset($types_card)&&!empty($types_card)){
                            foreach ($types_card as $row){
                                ?>
                                <option value="<?php echo $row->id_setting;?>"  <?php if($d_national_type==$row->id_setting) echo'selected';?>><?php echo $row->title_setting;?></option>
                            <?php } }?>

                    </select>
                </div>
                <div class="form-group col-md-3  padding-4">

                    <label class="label top-label">رقم الهويه </label>
                    <input type="text" name="d_national_num" <?php if($fe2a_type!=1) echo 'disabled' ;?> maxlength="10" onkeyup="check_len_card($(this).val());"  data-validation="required" id="d_national_num" value="<?php echo $d_national_num;?>"
                           class="form-control bottom-input"
                           data-validation-has-keyup-event="true"   onkeypress="validate_number(event);">
                    <span  class="d_national_num" style="color:red; display: none;">رقم البطاقه لايزيد عن 10 ارقام</span>

                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label">مصدر الهويه </label>
                    <select name="d_national_place" <?php if($fe2a_type!=1) echo 'disabled' ;?> id="d_national_place"
                            data-validation="required"   class="form-control bottom-input"
                            aria-required="true">
                        <option value=""> اختر</option>
                        <?php
                        if(isset($source_card)&&!empty($source_card)){
                            foreach ($source_card as $row){
                                ?>
                                <option value="<?php echo $row->id_setting;?>" <?php if($d_national_place==$row->id_setting) echo'selected';?>><?php echo $row->title_setting;?></option>
                            <?php } }?>

                    </select>
                </div>

                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label">المدينه  </label>
                    <select name="city" id="city"
                            data-validation="required"   class="form-control bottom-input"
                            aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        if(isset($city)&&!empty($city)){
                            foreach ($city as $row2){
                                ?>
                                <option value="<?php echo $row2->id_setting;?>" <?php if($row2->id_setting==$city3) echo'selected';?>><?php echo $row2->title_setting;?></option>
                            <?php } }?>

                    </select>
                </div>
                        </div>
                    <div class="col-md-12">
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label"> العنوان </label>
                    <input type="text" name="address" maxlength="" onkeyup=""  data-validation="required" id="address" value="<?php echo $address;?> "
                           class="form-control bottom-input"
                           data-validation-has-keyup-event="true"  onkeypress="">

                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label">المهنه </label>
                    <select name="job_fk" id="job_fk"
                            data-validation="required"   class="form-control bottom-input"
                            aria-required="true" <?php if($fe2a_type!=1) echo 'disabled' ;?>>
                        <option value=""> اختر</option>
                        <?php
                        if(isset($functions)&&!empty($functions)){
                            foreach ($functions as $row){
                                ?>
                                <option value="<?php echo $row->id_setting;?>" <?php if($job_fk==$row->id_setting) echo'selected';?>><?php echo $row->title_setting;?></option>
                            <?php } }?>

                    </select>
                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label">جهه العمل </label>
                    <input type="text" name="job_place" <?php if($fe2a_type!=1) echo 'disabled' ;?> maxlength="" onkeyup=""  data-validation="required" id="job_place" value="<?php echo $job_place;?>"
                           class="form-control bottom-input"
                           data-validation-has-keyup-event="true"  onkeypress="">

                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label">التخصص  </label>
                    <select name="specialized_fk" id="specialized_fk"
                            data-validation="required"   class="form-control bottom-input"
                            aria-required="true">
                        <option value=""> اختر</option>
                        <?php
                        if(isset($specialize)&&!empty($specialize)){
                            foreach ($specialize as $row){
                                ?>
                                <option value="<?php echo $row->id_setting;?>" <?php if($specialized_fk==$row->id_setting) echo'selected';?>><?php echo $row->title_setting;?></option>
                            <?php } }?>

                    </select>
                </div>
                        </div>
                    <div class="col-md-12">
                    <div class="form-group col-md-3  padding-4">
                        <label class="label top-label">الجنسبه </label>
                        <input type="text" name="d_nationality_fk" maxlength="" onkeyup=""  data-validation="required" id="d_nationality_fk" value="<?php echo $d_nationality_fk;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  onkeypress="">

                    </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label">صندوق بريدي </label>
                    <input type="text" name="barid_box" maxlength="" onkeyup=""  data-validation="required" id="barid_box" value="<?php echo $barid_box;?>"
                           class="form-control bottom-input"
                           data-validation-has-keyup-event="true"  onkeypress="">

                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label"> رمز بريدي </label>
                    <input type="text" name="barid_code" maxlength="" onkeyup=""  data-validation="required" id="barid_code" value="<?php echo $barid_code;?>"
                           class="form-control bottom-input"
                           data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">

                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label"> الفاكس </label>
                    <input type="text" name="fax" maxlength="" onkeyup=""  data-validation="required" id="fax" value="<?php echo $fax;?>"
                           class="form-control bottom-input"
                           data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">

                </div>
                    </div>
                    <div class="col-md-12">
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label"> الجوال </label>
                    <input type="text" name="mob"  maxlength="10" onkeyup="check_len_mob($(this).val())"  data-validation="required" id="mob" value="<?php echo $mob;?>"
                           class="form-control bottom-input"
                           data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                    <span  class="mob" style="color:red; display: none;">رقم الجوال لايزيد عن 10 ارقام</span>

                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label"> الايميل </label>
                    <input type="text" name="d_email" maxlength="" onkeyup=""  data-validation="required" id="d_email" value="<?php echo $d_email;?>"
                           class="form-control bottom-input"
                           data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">

                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label">نشاط المؤسسه  </label>
                    <select name="d_activity_fk" id="d_activity_fk"
                            data-validation="required" <?php if($fe2a_type==1) echo 'disabled' ;?>  class="form-control bottom-input"
                            aria-required="true">
                        <?php
                        if(isset($activities)&&!empty($activities)){
                            foreach ($activities as $row){
                                ?>
                                <option value="<?php echo $row->id_setting;?>" <?php if($d_activity_fk==$row->id_setting) echo'selected';?>><?php echo $row->title_setting;?></option>
                            <?php } }?>


                    </select>
                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label">طريقه السداد   </label>
                    <select name="pay_method" id="pay_method"
                            data-validation="required"   class="form-control bottom-input"
                            aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        if(isset($pay_paid)&&!empty($pay_paid)){
                            foreach ($pay_paid as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>" <?php if($pay_method==$key) echo'selected';?>><?php echo $value;?></option>
                            <?php } }?>

                    </select>
                </div>
                        </div>
                    <div class="col-md-12">
                    <div class="form-group col-md-3  padding-4">
                        <label class="label top-label">البنك</label>
                        <select name="bank_id_fk" id="bank_id_fk"
                                data-validation="required"   class="form-control bottom-input"
                                aria-required="true">
                            <option value="">اختر</option>
                            <?php if(isset($banks)&&!empty($banks)){
                                foreach ($banks as $row){
                                ?>
                                    <option value="<?php echo $row->id;?>" <?php if($row->id==$bank_id_fk) echo'selected';?>><?php echo $row->ar_name;?></option>

                                <?php } } ?>

                        </select>
                    </div>
                    <div class="form-group col-md-3  padding-4">
                        <label class="label top-label"> رقم الحساب </label>
                        <input type="text" name="bank_account_num" maxlength="24" onkeyup="check_len($(this).val())"  data-validation="required" id="bank_account_num" value="<?php echo $bank_account_num; ?> "
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  onkeypress="">
                        <span  class="bank_account_num" style="color:red; display: none;">رقم الحساب لايزيد عن 24 احرف</span>

                    </div>
                    <div class="form-group col-md-3  padding-4">
                        <label class="label top-label"> الفرع  </label>
                        <input type="text" name="bank_branch" maxlength="" onkeyup=""  data-validation="required" id="bank_branch" value="<?php echo $bank_branch; ?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">

                    </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label top-label">الطريقه المناسبه للمراسله</label>
                    <select name="d_message_method" id="d_message_method"
                            data-validation="required"   class="form-control bottom-input"
                            aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        if(isset($send_pay)&&!empty($send_pay)){
                            foreach ($send_pay as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>" <?php if($key==$d_message_method) echo'selected';?>><?php echo $value;?></option>
                            <?php } }?>

                    </select>
                </div>
                        </div>
                    <div class="col-md-12">

                <div class="form-group col-md-4  padding-4">
                    <label class="label top-label">هل ترغب ف المراسبله عن طريق رسائل الجوال</label>
                    <select name="d_message_mob" id="d_message_mob"
                            data-validation="required"   class="form-control bottom-input"
                            aria-required="true">
                        <option value="">اختر</option>
                        <?php
                        if(isset($yes_no)&&!empty($yes_no)){
                            foreach ($yes_no as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>" <?php if($key==$d_message_mob) echo'selected';?>><?php echo $value;?></option>
                            <?php } }?>

                    </select>
                </div>
                        <div class="form-group col-md-3  padding-4">
                            <label class="label top-label">صوره المتبرع</label>
                            <input type="file" name="img" class="form-control bottom-input">
                        </div>

                <div class="form-group col-md-3" style="margin-top:20px; margin-right: 50px;">
                   <input type="submit" name="add" id="save" class="btn btn-add" value="حفظ">
                </div>
                        </div>
                </form>

                </div>

        </div>

    </div>
    <div id="">
        <?php
        if(isset($item)&&!empty($item)){
        $data['result']=$item;
        $this->load->view('admin/all_Finance_resource_views/donors/sidebar_donor_data',$data);
        }else{
            $this->load->view('admin/all_Finance_resource_views/donors/sidebar_donor_data');
        }?>
    </div>
    </div>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr class="info">
        <th class="text-center">م</th>
        <th>اسم المتبرع</th>
        <th>رقم المتبرع</th>
        <th>رقم الجول</th>
        <th>حاله المتبرع</th>
        <th> التفاصيل</th>
        <th> اضافه المرفقات</th>
        <th>الاجراء</th>



    </tr>
    </thead>
    <tbody class="text-center">
    <?php
    $a=1;
    $emp_type = array('لم تحدد' ,'نشط','موقوف');
    if(isset($records)&&!empty($records)) {
        foreach ($records as $record) {
            if($record->d_status==1){
                $status='نشط';
            }else{
                $status='غير نشط';
            }
            ?>
          <tr>
             <td><?php echo $a;?></td>
              <td><?php echo $record->d_name;?></td>
              <td><?php echo $record->donor_num;?></td>
              <td><?php echo $record->mob;?></td>
              <td><?php echo $status;?></td>
              <td> <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal_detail<?php echo$record->id; ?>">التفاصيل</button></td>
              <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo$record->id; ?>">اضافه المرفقات</button></td>

              <td> <a href="<?php echo base_url(); ?>all_Finance_resource/donors/Donor/edit_donor/<?php echo $record->id; ?>"><i
                          class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                  <a href="<?php echo base_url().'all_Finance_resource/donors/Donor/delete_record/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                      <a href="<?php echo base_url(); ?>all_Finance_resource/donors/Donor/print_donor/<?php echo $record->id; ?>"  target = "_blank"><i
                              class="fa fa-print" aria-hidden="true"></i> </a>
                      <a  href = "<?php echo base_url('all_Finance_resource/donors/Donor/print_card').'/'.$record->id ?>" target = "_blank" >
                          <i   style="background-color: #0a568c" class="fa fa-print" aria-hidden = "true" ></i > </a>



              </td>




          </tr>
            <?php
            $a++;
        }
    }
    ?>
    </tbody>
</table>
<?php
   if(isset($records)&&!empty($records)) {
   foreach ($records as $record) {?>
    <div class="modal fade" id="myModal<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" style="width: 50%;"  role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">اضافه مرفقات </h4>
                </div>
              <div class="modal-body">

<div class="col-md-12">
    <button  class="btn btn-success" onclick="add_row();"> <i class="fa fa-plus" style="padding-left: 7px"> </i>اضافه مرفق</button>
    <?php
    $out['form']='all_Finance_resource/donors/Donor/upload_files/'.$record->id;?>
    <?php   echo form_open_multipart($out['form'])?>
    <table class="table table-bordered">
        <thead>
        <th>م</th>
        <th>اسم المرفق</th>
        <th>رفع المرفق </th>
        <th>الاجراء </th>

        </thead>


        <tbody class="tt">
        <?php
        if(isset($record->files)&&!empty($record->files)) {
            $z=1;

        foreach ($record->files as $file) {
        ?>
            <tr>
                <td><?php echo $z;?></td>
                <td><?php echo $file->attach;?></td>

                <td><img src="<?php echo base_url();?>uploads/images/<?php echo $file->img;?>" alt="Smiley face" class="" height="100" width="200"></td>
                <td><a href="<?php echo base_url().'all_Finance_resource/donors/Donor/delete_image/'.$file->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                        <i class="fa fa-trash" aria-hidden="true"></i></td>
            </tr>
        <?php $z++;
        }  } ?>

        </tbody>



    </table>
    <input type="submit" class="btn btn-add fil"   value="حفظ" style="float: right;display: none" >

    <?php echo form_close();?>
</div>

              </div>


                <div class="modal-footer" style="display: inline-block;width:100%;">
                    <button type="button" class="btn btn-default"  style="float: left" data-dismiss="modal">إغلاق</button>

                </div>
            </div>
        </div>
    </div>



<?php }  } ?>
<!----------------------------------------------------------------------------------------->

<?php
if(isset($records)&&!empty($records)) {
    foreach ($records as $item) {?>


        <div class="modal fade" id="myModal_detail<?php echo $item->id; ?>" role="dialog">
            <div class="modal-dialog" style="width: 96%">

                <div class="modal-content">
                    <div class="modal-body">
                        <div class="print_forma col-xs-12 no-padding">
                            <div class="col-sm-9">
                                <div class="piece-box" style="margin-bottom: 0;">
                                    <table class="table table-bordered">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 20%"> فئة المتبرع</td>
                                            <td class="text-center" style="width: 20%"> رقم المتبرع</td>
                                            <td class="text-center" style="width: 20%"> حالة المتبرع</td>
                                            <td class="text-center" style="width: 20%"> اسم المتبرع</td>
                                            <td class="text-center" style="width: 20%"> الجنس</td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"> <?php echo $donors_types[$item->fe2a_type];?></td>
                                            <td class="text-center"> <?php echo $item->donor_num;?></td>
                                            <td class="text-center"> <?php echo $satatus[$item->d_status];?></td>
                                            <td class="text-center"> <?php echo $item->d_name;?></td>
                                            <td class="text-center"> <?php echo $gender[$item->d_gender_fk];?></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 25%"> نوع الهوية</td>
                                            <td class="text-center" style="width: 25%"> رقم الهوية </td>
                                            <td class="text-center" style="width: 25%"> مصدر الهوية</td>
                                            <td class="text-center" style="width: 25%"> المدينة </td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"> <?php echo $item->card_type;?></td>
                                            <td class="text-center"> <?php echo $item->d_national_num ;?></td>
                                            <td class="text-center"> <?php echo $item->esdar_card;?></td>
                                            <td class="text-center"> <?php echo $item->city ;?></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 25%"> العنوان</td>
                                            <td class="text-center" style="width: 25%"> المهنة </td>
                                            <td class="text-center" style="width: 25%"> جهة العمل</td>
                                            <td class="text-center" style="width: 25%"> التخصص </td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"> <?php echo $item->address;?></td>
                                            <td class="text-center"> <?php echo $item->mehna ;?></td>
                                            <td class="text-center"> <?php echo $item->job_place;?></td>
                                            <td class="text-center"> <?php echo $item->specialize ;?></td>
                                        </tr>
                                    </table>

                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 25%"> الجنسية</td>
                                            <td class="text-center" style="width: 25%"> صندوق البريد </td>
                                            <td class="text-center" style="width: 25%"> رمز بريدي</td>
                                            <td class="text-center" style="width: 25%"> فاكس </td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"> <?php echo $item->d_nationality_fk;?></td>
                                            <td class="text-center"><?php echo $item->	barid_box ;?></td>
                                            <td class="text-center"> <?php echo $item->barid_code;?></td>
                                            <td class="text-center"> <?php echo $item->fax ;?></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 25%"> الجوال</td>
                                            <td class="text-center" style="width: 25%"> الايميل </td>
                                            <td class="text-center" style="width: 25%"> نشاط المؤسسة</td>
                                            <td class="text-center" style="width: 25%"> طريقه السداد </td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"> <?php echo $item->mob;?></td>
                                            <td class="text-center"> <?php echo $item->d_email ;?></td>
                                            <td class="text-center"> <?php echo $item->activity;?></td>
                                            <td class="text-center"> <?php echo $pay_paid[$item->pay_method] ;?></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 30%"> البنك</td>
                                            <td class="text-center" style="width: 30%"> رقم الحساب </td>
                                            <td class="text-center" style="width: 30%"> الفرع </td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"> <?php echo $item->bank;?></td>
                                            <td class="text-center"> <?php echo $item->bank_account_num;?></td>
                                            <td class="text-center"> <?php echo $item->bank_branch;?></td>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered" style="margin-top:10px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 50%"> الطريقه المناسبة للمراسلة </td>
                                            <td class="text-center" style="width: 50%"> هل ترغب بالمراسلة عن طريق رسائل الجوال</td>
                                        </tr>
                                        <tr class="open_green">
                                            <td class="text-center"> <?php echo $send_pay[$item->d_message_method] ;?></td>
                                            <td class="text-center"> <?php echo $yes_no[ $item->d_message_mob];?></td>
                                        </tr>
                                    </table>

                                </div>


                            </div>
                            <div class="col-sm-3">
                                <div class="piece-box">
                                    <img src="img/logo-atheer.png" class="center-block" alt="" style="width: 116px; padding: 10px">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td style="width: 50%">إسم المتبرع</td>
                                            <td style="width: 50%"> <?php echo $item->d_name;?></td>
                                        </tr>
                                        <tr>
                                            <td>رقم المتبرع</td>
                                            <td> <?php echo $item->donor_num;?></td>
                                        </tr>
                                        <tr>
                                            <td>رقم بطاقة المتبرع</td>
                                            <td><?php echo $item->d_national_num ;?> </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer" style="border: 0;">
                        <button type="button" class="btn btn-default btn-close-model" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>

            </div>
        </div>

    <?php }  } ?>

<script>
    function add_row()
    {
        $('.fil').show();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/donors/Donor/add_row",
            data:{},
            success:function(d) {

              $('.tt').append(d);


            }






        });
    }

</script>


<script>
    function get_cat(valu)
    {
     if(valu!=1){
         $('#d_national_num').attr('disabled',true);
         $('#d_national_type').attr('disabled',true);
         $('#d_national_place').attr('disabled',true);
         $('#job_fk').attr('disabled',true);
         $('#job_place').attr('disabled',true);
         $('#gens').attr('disabled',true);
         //===========================
         $('#d_national_num').val('');
         $('#d_national_type').val('');
         $('#d_national_place').val('');
         $('#job_fk').val('');
         $('#job_place').val('');
         $('#gens').val('');
         //================================
         $('#d_activity_fk').attr('disabled',false);

     }else{
         $('#d_national_num').attr('disabled',false);
         $('#d_national_type').attr('disabled',false);
         $('#d_national_place').attr('disabled',false);
         $('#job_fk').attr('disabled',false);
         $('#job_place').attr('disabled',false);
         $('#gens').attr('disabled',false);
         $('#d_activity_fk').attr('disabled',true);
         $('#d_activity_fk').val('');
     }
    }
</script>
<script>
    function check_len(valu)
    {
        if(valu.length<24)
        {
            $('.bank_account_num').show();
            $('#save').attr('disabled',true);

        }
        if(valu.length==24)
        {
            $('.bank_account_num').hide();

            $('#save').attr('disabled',false);
        }
    }
</script>

<script>
    function check_len_mob(valu)
    {
        if(valu.length<10)
        {
            $('.mob').show();
            $('#save').attr('disabled',true);

        }
        if(valu.length==10)
        {
            $('.mob').hide();

            $('#save').attr('disabled',false);
        }
    }
</script>
<script>
    function check_len_card(valu)
    {
        if(valu.length<10)
        {
            $('.d_national_num').show();
            $('#save').attr('disabled',true);

        }
        if(valu.length==10)
        {
            $('.d_national_num').hide();

            $('#save').attr('disabled',false);
        }
    }
</script>