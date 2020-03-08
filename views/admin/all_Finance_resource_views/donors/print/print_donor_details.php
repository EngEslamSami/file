
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css" >
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/style.css" >

<style type="text/css">
    .cover-page {
        min-height: 480px;
    }
    .print_forma{
        border:1px solid ;
        padding: 15px;
    }
    .print_forma table th{
        text-align: right;
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
    .no-border{
        border:0 !important;
    }
    .table-devices tr td{
        width: 30%;
        min-height: 20px
    }
    .gray_background{
        background-color: #eee;

    }
    table.th-no-border th,
    table.th-no-border td
    {
        border-top: 0 !important;
    }

    @media all {
        .page-break	{ display: none; }
    }

    @media print {
        .page-break	{ display: block; page-break-before: always; margin-bottom: 50px; }
    }

    table th {

        font-weight: 500;
    }

</style>

<div id = "printdiv" >



    <div class="page-break"></div>

    <?php
    $d_type_arr =array('d_yatem_full'=>'كفالة شاملة','d_yatem_half'=>'نصف كفالة','d_mostafed'=>'كفالة مستفيد','d_armal'=>'كفالة أرملة');
    $fe2a_type_arr =array('إختر','مستمر','متقطع','منتظم','موقوف');
    $f2a =array(1=>'فرد',2=>'مؤسسة',3=>'جهات مانحة',4=>'مؤسسات حكومية');
    $alert_type_arr =array('إختر','يوم','أسبوع','شهر');
    $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
    $d_message_method_arr =array('إختر','ارغب في استلام البريدعن طريق البريد الالكتروني ','ارغب في استلام البريد عن طريق صندوق البريد ','لا ارغب في استلام البريد');
    $d_message_mob_arr =array('إختر','نعم','لا');

    if ($result != '' && $result != null && !empty($result)) {
        $myArr ='';

            foreach($d_type_arr as $key=>$value){
                if(!empty($result->$key)){

                    $myArr[]=$d_type_arr[$key];
                }
            }

        ?>
        <div class="header col-xs-12 no-padding">
            <div class="col-xs-4 text-center">
                <p>المملكة العربية السعودية</p>
                <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
            </div>
            <div class="col-xs-4 text-center">
                <img src="<?php echo base_url();?>uploads/images/logo.png">
            </div>
            <div class="col-xs-4 text-center">
                <p>المملكة العربية السعودية</p>
                <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
            </div>
        </div>
        <div class="col-xs-12 Title">
            <h5 class="text-center"><br><br> <strong>البيانات الأساسية</strong></h5><br>
        </div>

        <section class="main-body">
            <div class="container">
                <div class="print_forma no-border col-xs-12 no-padding">
                    <div class="personality">
                        <div class="col-xs-12 no-padding">
                            <table class="table table-bordered table-devices">
                                <tbody>
                                <tr>
                                    <th class="gray_background"  >نوع التبرع</th>
                                    <td><?php if(!empty($myArr)){ echo implode("-", $myArr);}?></td>
                                    <th class="gray_background"  >حالة التبرع </th>
                                    <td><?php  if(!empty($fe2a_type_arr[$result->d_status])){
                                            echo $fe2a_type_arr[$result->d_status]; }else{ echo'غيرمحدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background"  >رقم المتبرع</th>
                                    <td><?php   if(!empty($result->d_num)){
                                            echo $result->d_num; }else{ echo'غيرمحدد'; } ?></td>
                                    <th class="gray_background"  >إسم المتبرع</th>
                                    <td><?php if(!empty($result->d_name)){
                                            echo$result->d_name; }else{ echo'غيرمحدد'; } ?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >الجنس </th>
                                    <td><?php  if(!empty($gender_data[$result->d_gender_fk])){
                                            echo $gender_data[$result->d_gender_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background"  >تاريخ تسجيل التبرع</th>
                                    <td><?php  if(!empty($result->start_kfala_date)){
                                            echo $result->start_kfala_date;
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background">فئة المتبرع</th>
                                    <td><?php  if(!empty($f2a[$result->fe2a_type])){
                                            echo$f2a[$result->fe2a_type]; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background">تاريخ الميلاد هجرى</th>
                                    <td><?php  if(!empty($personal_data->birth_date)){
                                            echo $personal_data->birth_date; }else{ echo'غيرمحدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background">الجنسيه</th>
                                    <td><?php  if(!empty($nationality[$result->d_nationality_fk])){
                                            echo $nationality[$result->d_nationality_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background">نوع الهوية</th>
                                    <td><?php  if(!empty($type_card[$result->d_national_type])){
                                            echo $type_card[$result->d_national_type]->title_setting; }else{ echo'غيرمحدد';}?></td>

                                </tr>

                                <tr>
                                    <th class="gray_background"  >رقم الهويه</th>
                                    <td><?php  if(!empty($result->d_national_num)){
                                            echo $result->d_national_num; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background"  >مصدر الهوية  </th>
                                    <td><?php  if(!empty($dest_card[$result->d_national_place])){
                                            echo $dest_card[$result->d_national_place]->title_setting; }else{ echo'غيرمحدد';}?></td>

                                </tr>
                                <tr>
                                    <th class="gray_background" >المدينة</th>
                                    <td><?php if(!empty($cities[$result->d_city])){
                                            echo $cities[$result->d_city]->title_setting; }else{ echo 'غير محدد';} ?></td>
                                    <th class="gray_background"  >العنوان</th>
                                    <td><?php  if(!empty($result->d_addres)){
                                            echo $result->d_addres; }else{ echo'غيرمحدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >المهنة</th>
                                    <td><?php  if(!empty($job_role[$result->d_job_fk])){
                                            echo $job_role[$result->d_job_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background" >جهة العمل</th>
                                    <td><?php  if(!empty($employer[$result->d_job_place])){
                                            echo $employer[$result->d_job_place]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >نشاط المؤسسة</th>
                                    <td><?php  if(!empty($activity[$result->d_activity_fk])){
                                            echo $activity[$result->d_activity_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background" >التخصص</th>
                                    <td><?php  if(!empty($specialize[$result->d_specialize_fk])){
                                            echo $specialize[$result->d_specialize_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>

                                </tr>
                                <tr>
                                    <th class="gray_background" >صندوق بريد</th>
                                    <td><?php  if(!empty($result->d_barid_box)){
                                            echo $result->d_barid_box; }else{ echo'غيرمحدد';}?></td>

                                    <th class="gray_background" >رمز بريدي</th>
                                    <td><?php  if(!empty($result->d_bardid_code)){
                                            echo $result->d_bardid_code;
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >الفاكس</th>
                                    <td><?php  if(!empty($result->d_fax)){
                                            echo $result->d_fax; }else{ echo'غيرمحدد';}?></td>

                                    <th class="gray_background" >الجوال</th>
                                    <td><?php  if(!empty($result->d_mob)){
                                            echo $result->d_mob;
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >البريد الإلكتروني</th>
                                    <td><?php  if(!empty($result->d_email)){
                                            echo $result->d_email; }else{ echo'غيرمحدد';}?></td>

                                    <th class="gray_background" >تنبيه الإنتهاء </th>
                                    <td><?php  if(!empty($alert_type_arr[$result->alert_type])){
                                            echo $alert_type_arr[$result->alert_type];
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >عدد الايام</th>
                                    <td><?php  if(!empty($result->num_days)){
                                            echo $result->num_days; }else{ echo 0;}?></td>

                                    <th class="gray_background" >توريد التبرع </th>
                                    <td><?php  if(!empty($pay_method_arr[$result->pay_method])){
                                            echo $pay_method_arr[$result->pay_method];
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >البنك</th>
                                    <td><?php  if(!empty($result->banks_settings_title)){
                                            echo $result->banks_settings_title; }else{ echo'غيرمحدد';}?></td>

                                    <th class="gray_background" >رقم الحساب </th>
                                    <td><?php  if(!empty($result->band_account_num)){
                                            echo $result->band_account_num;
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >الفرع</th>
                                    <td><?php  if(!empty($result->band_branch)){
                                            echo $result->band_branch; }else{ echo'غيرمحدد';}?></td>

                                    <th class="gray_background" >الطريقة المناسبة للمراسلة </th>
                                    <td><?php  if(!empty($d_message_method_arr[$result->d_message_method])){
                                            echo $d_message_method_arr[$result->d_message_method];
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >هل ترغي المراسلة عن طريق رسائل الجوال</th>
                                    <td><?php  if(!empty($d_message_mob_arr[$result->d_message_mob])){
                                            echo $d_message_mob_arr[$result->d_message_mob]; }else{ echo'غيرمحدد';}?></td>

                                    <th class="gray_background" >ملاحظات </th>
                                    <td><?php  if(!empty($result->d_message_method)){
                                            echo $result->d_message_method;
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                                </tbody>
                            </table>                        </div>
                    </div>
                    <div class="special col-xs-12 ">
                        <br><br>
                        <div class="col-xs-4 text-center">
                            <label> الختم </label><br><br>
                        </div>
                        <div class="col-xs-4 text-center">

                        </div>
                        <div class="col-xs-4 text-center">
                            <label>المدير المالى </label><br><br>
                            <p>....................</p><br>
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
        </section>
        <div class="page-break"></div>
    <?php } ?>
    <!-------------- بيانات الوظيفية ---------------->




</div>
</div>
</div>

<script >

    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url('all_Finance_resource/donors/Donor/addDonor') ?>";
    },2000);

</script >
                

