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

</style>

<?php
if(isset($result)&&!empty($result))
{
    $k_yatem_full=$result->k_yatem_full;
    $k_yatem_half=$result->k_yatem_half;
    $k_armal=$result->k_armal;
    $k_mostafed=$result->k_mostafed;
    $k_num=$result->k_num;
    $k_name=$result->k_name;
    $k_gender_fk=$result->k_gender_fk;
    $start_kfala_date=$result->start_kfala_date;
    $fe2a_type= $result->fe2a_type;
    $k_nationality_fk= $result->k_nationality_fk;
    $k_national_type= $result->k_national_type;
    $k_national_num= $result->k_national_num;
    $k_national_place= $result->k_national_place;
    $k_city= $result->k_city;
    $k_status= $result->k_status;
    $k_addres= $result->k_addres;
    $k_job_fk =$result->k_job_fk;
    $k_job_place =$result->k_job_place;
    $k_specialize_fk =$result->k_specialize_fk;
    $k_activity_fk =$result->k_activity_fk;
    $k_barid_box =$result->k_barid_box;
    $k_bardid_code =$result->k_bardid_code;
    $k_fax =$result->k_fax;
    $k_mob =$result->k_mob;
    $k_email =$result->k_email;
    $num_days =$result->num_days ;
    $alert_type   =$result->alert_type ;
    $pay_method  =$result->pay_method ;
    $bank_id_fk   =$result->bank_id_fk ;
    $bank_account_num   =$result->bank_account_num ;
    $bank_branch  =$result->bank_branch ;
    $k_notes  =$result->k_notes ;
    $k_message_method  =$result->k_message_method ;
    $k_message_mob  =$result->k_message_mob  ;
    $num  =$result->num  ;


    $out['form']='all_Finance_resource/sponsors/Sponsor/updateSponsor_maindata/'.$this->uri->segment(5);
}else{
    $k_addres='';
    $k_yatem_full    ="";
    $k_yatem_half    ="";
    $k_armal    ="";
    $k_mostafed    ="";
    $k_num="";
    $k_name="";
    $k_gender_fk="";
    $start_kfala_date="";
    $fe2a_type="";
    $k_nationality_fk="";
    $k_national_type="";
    $k_national_num="";
    $k_national_place="";
    $k_city="";
    $k_status="";
    $k_job_fk="";
    $k_job_fk ="";
    $k_job_place ="";
    $k_specialize_fk ="";
    $k_activity_fk ="";
    $k_barid_box   ="";
    $k_bardid_code   ="";
    $k_fax   ="";
    $k_mob   ="";
    $k_email   ="";
    $alert_type   ="";
    $num_days   ="";
    $pay_method   ="";
    $bank_id_fk   ="";
    $bank_account_num   ="";
    $bank_branch  ="";
    $k_notes  ="";
    $k_message_method ="";
    $k_message_mob ="";
    $num ="";




    $out['form']='all_Finance_resource/sponsors/Sponsor/addSponsor_maindata';
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
                        $data_load ='';
                        $this->load->view('admin/all_Finance_resource_views/sponsors/drop_down_menu', $data_load);
                        }?>
            </div>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">نوع الكفالة </label>
                    </div>
                    <?php
                    $k_type_arr =array('k_yatem_full'=>'كفالة شاملة','k_yatem_half'=>'نصف كفالة','k_mostafed'=>'كفالة مستفيد','k_armal'=>'كفالة أرملة');
                    if(isset($k_type_arr)&&!empty($k_type_arr)) {
                        foreach($k_type_arr as $key=>$value){
                            ?>
                            <input  type="checkbox" name="<?=$key?>" style="margin-right: 15px" value="1"

                                <?php if(!empty($$key)){
                                    if($$key ==1){?> checked <?php }} ?>>
                            <label for="square-radio-1"><?=$value?></label>
                            <?php
                        }
                    }
                    ?>
                    </div>
                <div class="col-md-12">
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">حالة الكفالة </label>
                        <select name="k_status" id="k_status" data-validation="required"   class="form-control bottom-input"
                                aria-required="true">
                            <?php
                            $fe2a_type_arr =array('إختر','مستمر','متقطع','منتظم','موقوف');
                            if(isset($fe2a_type_arr)&&!empty($fe2a_type_arr)) {
                                foreach($fe2a_type_arr as $key => $value){
                                    ?>
                                    <option value="<?php echo $key;?>"
                                        <?php if(!empty($k_gender_fk)){
                                            if($key==$k_status){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ تسجيل الكفالة</label>
                        <input type="text" name="start_kfala_date" data-validation="required"
                               id="start_kfala_date" value="<?php echo $start_kfala_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true"  onkeyup="checkYear($(this).val())"
                               onchange="checkYear($(this).val());">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">تنبيه الإنتهاء </label>
                        <select id="alert_type"  class="form-control bottom-input"data-validation="required"
                                name="alert_type"  onchange="GetDays($(this).val(),$('#num').val())">
                            <?php
                            $alert_type_arr =array('إختر','يوم','أسبوع','شهر');
                            if(isset($alert_type_arr)&&!empty($alert_type_arr)) {
                                foreach($alert_type_arr as $key=>$value){
                                    ?>
                                    <option value="<?php echo $key;?>"
                                        <?php if(!empty($alert_type)){
                                            if($key == $alert_type){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">العدد</label>
                        <input type="text" name="num" id="num" onkeyup="GetDays($('#alert_type').val(),$(this).val())"
                               value="<?=$num?>"   onkeypress="validate_number(event);"
                               class="form-control bottom-input">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">عدد الايام</label>
                        <input type="text" name="num_days" id="num_days"
                               onkeypress="validate_number(event);" readonly
                               value=" <?php echo $num_days;?>" class="form-control bottom-input">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">توريد الكفالة</label>
                        <select id="pay_method" name="pay_method"
                                class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
                            if(isset($pay_method_arr)&&!empty($pay_method_arr)) {
                                foreach($pay_method_arr as $key=>$value){
                                    ?>
                                    <option value="<?php echo$key;?>"
                                        <?php if(!empty($pay_method)){
                                            if($key == $pay_method){ echo 'selected'; }
                                        } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                  </div>




                <div class="col-md-12">

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label"> البنك</label>
                        <select name="bank_id_fk" id="bank_id_fk" class="form-control bottom-input"
                             aria-required="true">
                            <option value="">إختر</option>
                            <?php if (!empty($banks)) {
                                foreach ($banks as $bank) { ?>
                                    <option value="<?php echo $bank->id; ?>"
                                        <?php if(!empty($bank_id_fk)){
                                            if($bank->id == $bank_id_fk){ echo 'selected'; }
                                        } ?>><?php echo $bank->ar_name; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>

                    <div class="form-group col-sm-3 col-xs-12">
                        <label class="label top-label">رقم الحساب</label>
                        <input type="text" name="bank_account_num" id="bank_account_num"
                               onkeyup="length_hesab_om($(this).val());"
                               value="<?=$bank_account_num?>"
                               class="form-control bottom-input "
                               data-validation-has-keyup-event="true">

                        <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">الفرع</label>
                        <input type="text" name="bank_branch"  data-validation="required"
                               value="<?php echo $bank_branch;?>" class="form-control bottom-input" data-validation-has-keyup-event="true">
                    </div>


                </div>



                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <br /><br />
                        <button type="submit" id="save" name="add" value="add"
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
    <?php  $this->load->view('admin/all_Finance_resource_views/sponsors/sidebar_kafel_data');?>
    <!------ table -------->
    <?php  if(isset($records) &&!empty($records)){?>
   </div>
    <div class="col-xs-12 no-padding">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات الكافل</h3>
            </div>
            <div class="panel-body"><br>
                <div class="col-md-12 no-padding">

                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr class="info">
                                <th class="text-center">م</th>
                                <th>كود الكافل</th>
                                <th class="text-center">إسم الكافل</th>
                                <th>رقم الهوية</th>
                                <th>رقم الجوال</th>
                                <th>حالة الكافل</th>
                                <th>إستكمال البيانات</th>
                                <th>التفاصيل</th>
                                <th>المرفقات</th>
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
                                        <td><? echo $record->k_num; ?></td>
                                        <td><? echo $record->k_name; ?></td>
                                        <td><? echo $record->k_national_num; ?></td>
                                        <td><? echo $record->k_mob; ?></td>
                                        <td><?php if(!empty($fe2a_type_arr[$record->k_status])){
                                                echo $fe2a_type_arr[$record->k_status]; }else{ echo'غير محدد';} ?></td>
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
                                         href="<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/addSponsor_maindata">البيانات  الأساسية </a></li>
                                                </ul>
                                            </div>


                                        </td>
                                        <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" style="padding: 6px 12px;"
                                                    data-target="#myModal<?php echo $record->id; ?>">التفاصيل</button></td>
                                        <td><button type="button" class="btn btn-success btn-xs" data-toggle="modal" style="padding: 6px 12px;"
                                                    data-target="#myModal_attach<?php echo $record->id; ?>">إضافة مرفق</button></td>

                                        <td>
                                            <a href="<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/updateSponsor_maindata/<?php echo $record->id; ?>"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                            <a onclick="$('#adele').attr('href', '<?= base_url() . "all_Finance_resource/sponsors/Sponsor/delete_sponsor/" . $record->id ?>');"
                                               data-toggle="modal" data-target="#modal-delete"
                                               title="حذف"> <i class="fa fa-trash"
                                                aria-hidden="true"></i> </a>

                                     <a href = "<?php echo base_url('all_Finance_resource/sponsors/Sponsor/print_kafel_details').'/'.$record->id ?>" target = "_blank" >
                                                <i class="fa fa-print" aria-hidden = "true" ></i > </a>

                                            <a  href = "<?php echo base_url('all_Finance_resource/sponsors/Sponsor/print_card').'/'.$record->id ?>" target = "_blank" >
                                                <i   style="background-color: #0a568c" class="fa fa-print" aria-hidden = "true" ></i > </a>



                                       </td>

                                    </tr>
                                    <?php
                                    $a++;
                                }
                            } else {?>
                                <td colspan="6"><div style="color: red; font-size: large;">لم يتم اضافة كفلاء !!</div></td>
                            <?php  }
                            ?>
                            </tbody>
                        </table>




                </div>
            </div>
        </div>
    </div>


<?php
$a=1;
if(isset($records)&&!empty($records)) {
    $myArr ='';
    foreach ($records as $record) {
    foreach($k_type_arr as $key=>$value){
     if(!empty($record->$key)){

         $myArr[]=$k_type_arr[$key];
     }
    }
    }
foreach ($records as $record) { ?>
    <div class="modal fade" id="myModal<?php echo $record->id; ?>" role="dialog">
        <div class="modal-dialog" style="width: 96%">

            <div class="modal-content">
                <div class="modal-body">
                    <div class="print_forma col-xs-12 no-padding">
                        <div class="col-sm-9">
                            <div class="piece-box" style="margin-bottom: 0;">
                                <div class="piece-body">
                                    <div class="col-xs-12 no-padding" style="padding-right: 10px">
                                        <div class="col-xs-3 no-padding">
                                            <h6> نوع الكفالة</h6>
                                        </div>

                                        <?php
                                        $k_type_arr =array('k_yatem_full'=>'كفالة شاملة','k_yatem_half'=>'نصف كفالة','k_mostafed'=>'كفالة مستفيد','k_armal'=>'كفالة أرملة');
                                        if(isset($k_type_arr)&&!empty($k_type_arr)) {
                                            foreach($k_type_arr as $key=>$value){?>
                                                <div class="col-xs-2 no-padding">
                                                    <h6> <input type="radio" disabled <?php if(!empty($record->$key)){
                                                 if($record->$key ==1){?> checked <?php }} ?>> <?=$value?></h6>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                                <table class="table table-bordered" style="margin-top:35px">
                                    <tr class="closed_green">
                                        <td class="text-center" style="width: 15%"> حالة الكفالة</td>
                                        <td class="text-center" style="width: 20%"> رقم الكافل</td>
                                        <td class="text-center" style="width: 25%"> إسم الكافل</td>
                                        <td class="text-center" style="width: 15%"> الجنس</td>
                                        <td class="text-center" style="width: 20%"> تاريخ تسجيل الكفالة</td>
                                    </tr>
                                    <tr class="open_green">
                                        <td class="text-center"><?php  if(!empty($fe2a_type_arr[$record->k_status])){
                                                echo $fe2a_type_arr[$record->k_status]; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php   if(!empty($record->k_num)){
                                                echo $record->k_num; }else{ echo'غيرمحدد'; } ?></td>
                                        <td class="text-center"><?php if(!empty($record->k_name)){
                                                echo$record->k_name; }else{ echo'غيرمحدد'; } ?></td>
                                        <td class="text-center"><?php  if(!empty($gender_data[$record->k_gender_fk])){
                                                echo $gender_data[$record->k_gender_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($record->start_kfala_date)){
                                                echo $record->start_kfala_date;
                                            }else{ echo'غيرمحدد'; }?></td>
                                    </tr>
                                </table>
                                <table class="table table-bordered" style="margin-top:10px">
                                    <tr class="closed_green">
                                        <td class="text-center" style="width: 15%"> فئة الكافل</td>
                                        <td class="text-center" style="width: 20%"> الجنسية </td>
                                        <td class="text-center" style="width: 15%"> نوع الهوية</td>
                                        <td class="text-center" style="width: 25%">رقم الهوية(10اراقام)</td>
                                        <td class="text-center" style="width: 20%"> مصدر الهوية </td>
                                    </tr>
                                    <tr class="open_green">
                                        <td class="text-center"><?php  if(!empty($f2a[$record->fe2a_type])){
                                                echo$f2a[$record->fe2a_type]; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($nationality[$record->k_nationality_fk])){
                                                echo $nationality[$record->k_nationality_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"> <?php  if(!empty($type_card[$record->k_national_type])){
                                                echo $type_card[$record->k_national_type]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($record->k_national_num)){
                                                echo $record->k_national_num; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($dest_card[$record->k_national_place])){
                                                echo $dest_card[$record->k_national_place]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                </table>
                                <table class="table table-bordered" style="margin-top:10px">
                                    <tr class="closed_green">
                                        <td class="text-center" style="width: 20%"> المدينه</td>
                                        <td class="text-center" style="width: 30%"> العنوان </td>
                                        <td class="text-center" style="width: 25%"> المهنة </td>
                                        <td class="text-center" style="width: 25%"> جهة العمل </td>
                                    </tr>
                                    <tr class="open_green">
                                        <td class="text-center"><?php if(!empty($cities[$record->k_city])){
                                                echo $cities[$record->k_city]->title_setting; }else{ echo 'غير محدد';} ?></td>
                                        <td class="text-center"><?php  if(!empty($record->k_addres)){
                                                echo $record->k_addres; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"> <?php  if(!empty($job_role[$record->k_job_fk])){
                                                echo $job_role[$record->k_job_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($employer[$record->k_job_place])){
                                                echo $employer[$record->k_job_place]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                </table>
                                <table class="table table-bordered" style="margin-top:10px">
                                    <tr class="closed_green">
                                        <td class="text-center" style="width: 15%">نشاط المؤسسة</td>
                                        <td class="text-center" style="width: 15%">التخصص </td>
                                        <td class="text-center" style="width: 25%">صندوق بريد</td>
                                        <td class="text-center" style="width: 25%"> رمز بريدي</td>
                                        <td class="text-center" style="width: 20%">الفاكس</td>
                                    </tr>
                                    <tr class="open_green">
                                        <td class="text-center"><?php  if(!empty($activity[$record->k_activity_fk])){
                                                echo $activity[$record->k_activity_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($specialize[$record->k_specialize_fk])){
                                                echo $specialize[$record->k_specialize_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($record->k_barid_box)){
                                                echo $record->k_barid_box; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($record->k_bardid_code)){
                                                echo $record->k_bardid_code;
                                            }else{ echo'غيرمحدد'; }?></td>
                                        <td class="text-center"><?php  if(!empty($record->k_fax)){
                                                echo $record->k_fax; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                </table>
                                <table class="table table-bordered" style="margin-top:10px">
                                    <tr class="closed_green">
                                        <td class="text-center" style="width: 25%"> الجوال(10 أرقام)</td>
                                        <td class="text-center" style="width: 25%">البريد الالكتروني </td>
                                        <td class="text-center" style="width: 20%">تنبية الانتهاء</td>
                                        <td class="text-center" style="width: 15%">العدد </td>
                                        <td class="text-center" style="width: 15%">عدد الايام</td>
                                    </tr>
                                    <tr class="open_green">
                                        <td class="text-center"><?php  if(!empty($record->k_mob)){
                                                echo $record->k_mob;
                                            }else{ echo'غيرمحدد'; }?></td>
                                        <td class="text-center"><?php  if(!empty($record->k_email)){
                                                echo $record->k_email; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($alert_type_arr[$record->alert_type])){
                                                echo $alert_type_arr[$record->alert_type];
                                            }else{ echo'غيرمحدد'; }?></td>
                                        <td class="text-center"><?php  if(!empty($record->num)){
                                                echo $record->num; }else{ echo 0;}?></td>
                                        <td class="text-center"><?php  if(!empty($record->num_days)){
                                                echo $record->num_days; }else{ echo 0;}?></td>
                                    </tr>
                                </table>
                                <table class="table table-bordered" style="margin-top:10px">
                                    <tr class="closed_green">
                                        <td class="text-center" style="width: 20%"> توريد الكفالة</td>
                                        <td class="text-center" style="width: 30%"> البنك </td>
                                        <td class="text-center" style="width: 20%"> رقم الحساب </td>
                                        <td class="text-center" style="width: 30%"> الفرع </td>
                                    </tr>
                                    <tr class="open_green">
                                        <td class="text-center"><?php  if(!empty($pay_method_arr[$record->pay_method])){
                                                echo $pay_method_arr[$record->pay_method];
                                            }else{ echo'غيرمحدد'; }?></td>
                                        <td class="text-center"><?php  if(!empty($record->banks_settings_title)){
                                                echo $record->banks_settings_title; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($record->bank_account_num)){
                                                echo $record->bank_account_num;
                                            }else{ echo'غيرمحدد'; }?></td>
                                        <td class="text-center"><?php  if(!empty($record->bank_branch)){
                                                echo $record->bank_branch; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                </table>
                                <table class="table table-bordered" style="margin-top:10px">
                                    <tr class="closed_green">
                                        <td class="text-center" style="width: 30%">الطريقه المناسبة للمراسلة</td>
                                        <td class="text-center" style="width: 45%">هل ترغب المراسلة عن طريق رسائل الجوال</td>
                                        <td class="text-center" style="width: 25%"> ملاحظات </td>
                                    </tr>
                                    <tr class="open_green">
                                        <td class="text-center"><?php  if(!empty($k_message_method_arr[$record->k_message_method])){
                                                echo $k_message_method_arr[$record->k_message_method];
                                            }else{ echo'غيرمحدد'; }?></td>
                                        <td class="text-center"><?php  if(!empty($k_message_mob_arr[$record->k_message_mob])){
                                                echo $k_message_mob_arr[$record->k_message_mob]; }else{ echo'غيرمحدد';}?></td>
                                        <td class="text-center"><?php  if(!empty($record->k_message_method)){
                                                echo $record->k_message_method;
                                            }else{ echo'غيرمحدد'; }?></td>
                                    </tr>
                                </table>
                            </div>


                        </div>
                        <div class="col-sm-3">
                            <div class="piece-box">
                                <img src="img/logo-atheer.png" class="center-block" alt="" style="width: 116px; padding: 10px">
                                <table class="table table-bordered">
                                    <tr>
                                        <td style="width: 50%">إسم الكفيل</td>
                                        <td style="width: 50%"><?php if(!empty($record->k_name)){
                                                echo$record->k_name; }else{ echo'غيرمحدد'; } ?></td>
                                    </tr>
                                    <tr>
                                        <td>رقم الكفيل</td>
                                        <td><?php   if(!empty($record->k_num)){
                                                echo $record->k_num; }else{ echo'غيرمحدد'; } ?></td>
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









    <div class="modal fade" id="myModal_attach<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
                </div>
                <?php    echo form_open_multipart('all_Finance_resource/sponsors/Sponsor/add_attach');?>

                <div class="modal-body">
                    <button type="button" value="" id="" onclick="add_row()"
                            class="btn btn-success btn-next"/><i class="fa fa-plus"></i> إضافة </button><br><br>
                    <table class="table table-striped table-bordered"   <?php if(empty($record->Images)){ ?> style="display: none" <?php } ?> id="mytable">
                        <thead>
                        <tr class="info">
                            <th>م</th>
                            <th>إسم المرفق</th>
                            <th>الصورة</th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="resultTable">
                        <?php if(!empty($record->Images)){ $a=1;foreach ($record->Images as $one_img){ ?>
                            <tr id="<?php echo$one_img->id; ?>">
                                <td><?php echo$a; ?></td>
                                <td><?php echo$one_img->title_setting; ?></td>
                                <td><img src="<?php echo base_url(); ?>uploads/images/<?php echo$one_img->img; ?>"  style="width: 150px" alt=""></td>
                                <td><a  onclick="DeleteImage(<?php echo$one_img->id; ?>);"
                                        <i class="fa fa-trash" aria-hidden="true"></i> </a></td>
                            </tr>
                        <?php $a++;} } ?>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%">
                    <input type="hidden" name="person_id" value="<?php echo $record->id; ?>">
                    <button type="button" class="btn btn-danger"  style="float: left" data-dismiss="modal">إغلاق</button>
                    <button type="submit"   id="saves"  name="add" value="add" class="btn btn-success"
                            style="float: left;display: none;padding: 6px 12px;" >حفظ</button>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>

<?php  }}
    ?>



      <?php } ?>
    <!----- end table ------>
	    <script type="text/javascript">
        jQuery(function($){
            //	$(".date_as_mask").mask("99/99/9999");
            $(".date_as_mask").mask("99/99/9999");
        });
    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--<script>


    $(document).ready(function(){
           var d = new Date();
            var weekDays = d.getDay()
            var MonthDays = new Date(d.getFullYear(), d.getMonth()+1, 0).getDate();
             var  num_days = <?php /*echo$num_days;*/?>;
            var  alert_type = <?php /*echo$alert_type;*/?>;
          if(num_days !='' && alert_type !=''){
          if(alert_type ==1 ){
                $('#num').val(num_days);
            } else if(alert_type ==2){

                $('#num').val(num_days / weekDays);

            } else if (alert_type ==3){

                $('#num').val(num_days / MonthDays);

            }
           }
    });

</script>-->


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


<script>

    function checkYear(valu) {
        nowyear = <?php echo$current_hijry_year;?>;
        var myDate =valu.split("/");
        if(parseInt(myDate[2]) > parseInt(nowyear) ){
           alert( " السنة الهجرية الحالية "  + nowyear);
        $('#start_kfala_date').val('');
        }
    }

</script>


<script>

    function GetF2a(f2a_type) {

         if( f2a_type ==1 ){

             document.getElementById("k_national_type").removeAttribute("disabled", "disabled");
             document.getElementById("k_national_type").setAttribute("data-validation", "required");
             document.getElementById("k_national_place").removeAttribute("disabled", "disabled");
             document.getElementById("k_national_place").setAttribute("data-validation", "required");
             document.getElementById("k_national_num").removeAttribute("disabled", "disabled");
             document.getElementById("k_national_num").setAttribute("data-validation", "required");
             document.getElementById("k_job_fk").removeAttribute("disabled", "disabled");
             document.getElementById("k_job_fk").setAttribute("data-validation", "required");
             document.getElementById("k_job_place").removeAttribute("disabled", "disabled");
             document.getElementById("k_job_place").setAttribute("data-validation", "required");
             document.getElementById("k_activity_fk").setAttribute("disabled", "disabled");

         } else {

             document.getElementById("k_national_type").setAttribute("disabled", "disabled");
             document.getElementById("k_national_type").value='';
             document.getElementById("k_national_place").setAttribute("disabled", "disabled");
             document.getElementById("k_national_place").value='';
             document.getElementById("k_national_num").setAttribute("disabled", "disabled");
             document.getElementById("k_national_num").value='';
             document.getElementById("k_job_fk").setAttribute("disabled", "disabled");
             document.getElementById("k_job_fk").value='';
             document.getElementById("k_job_place").setAttribute("disabled", "disabled");
             document.getElementById("k_job_place").value='';
             document.getElementById("k_activity_fk").removeAttribute("disabled", "disabled");
             document.getElementById("k_activity_fk").setAttribute("data-validation", "required");

         }

    }

</script>


<script>
    
    function GetDays(alert_type,num_days) {
        var d = new Date();
        var weekDays = d.getDay()
        var MonthDays = new Date(d.getFullYear(), d.getMonth()+1, 0).getDate();
        if(alert_type ==1 ){

         $('#num_days').val(num_days);
        } else if(alert_type ==2){

            $('#num_days').val(num_days * weekDays);

        } else if (alert_type ==3){

            $('#num_days').val(num_days * MonthDays);

        }

    }
    
</script>

<script>
    function length_hesab_om(length) {
        var len = length.length;

        if (len < 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        if (len > 24) {
            document.getElementById("save").setAttribute("disabled", "disabled");
        }
        if (len == 24) {
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
</script>



<script>

    function add_row(){
        $("#mytable").show();
        var x = document.getElementById('resultTable');
        var len = x.rows.length+1;
        var mydiv ='<tr id="' + len +'"><td>' + len +'</td>' +
            '<td style="width: 243px;"><select  name="attach_id_fk[]" id="myselect' + len +'"  class="form-control "  ' +
            '><option value="">إختر</option></select></td>' +
            '<td><input type="file" name="img[]"></td>' +
            '<td>#</td></tr>';
         $("#resultTable").append(mydiv);
        GetOptions(len);
         $('#saves').show();
    }

</script>
<script>

    function GetOptions(len) {
        var myarr = <?php echo $attach_arr;?>;
        var html = '<option>إختر </option>';
        for (i = 0; i < myarr.length; i++) {
            html += '<option value="' + myarr[i].id_setting + '"> ' + myarr[i].title_setting + '</option>';
        }
        $("#myselect" + len).html(html);
    }
</script>


<script>
    
    function DeleteImage(valu) {
        $('#' + valu).remove();
        var x = document.getElementById('resultTable');
        var myLenth = x.rows.length;
        var dataString = 'id=' + valu ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/delete_attach/' + valu ,
            data:dataString,
            cache:false,
            success: function(json_data){
                if(myLenth == 0){
                    $("#mytable").hide();
                }
                var JSONObject = JSON.parse(json_data);
                //console.log(myLenth);
                alert(' تم حذف  المرفق بنجاح');

            }
        });
        
    }
    
</script>