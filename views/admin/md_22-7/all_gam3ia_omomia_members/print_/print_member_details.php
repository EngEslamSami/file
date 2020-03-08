
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
    if ($personal_data != '' && $personal_data != null && !empty($personal_data)) {   ?>
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
                                    <th class="gray_background"  >إسم العضو</th>
                                    <td><?php  if(!empty($personal_data->name)){ echo $personal_data->name; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background"  >إسم الموظف</th>
                                    <td><?php  if(!empty($gender_data[$personal_data->gns])){
                                            echo $gender_data[$personal_data->gns]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background"  >الجنسيه</th>
                                    <td><?php   if(!empty($nationality[$personal_data->gnsia_fk])){
                                            echo $nationality[$personal_data->gnsia_fk]->title_setting; }else{ echo'غيرمحدد'; } ?></td>
                                    <th class="gray_background"  >الحاله الاجتماعيه</th>
                                    <td><?php if(!empty($social_status[$personal_data->hala_egtma3ia_fk])){
                                            echo $social_status[$personal_data->hala_egtma3ia_fk]->title_setting; }else{ echo'غيرمحدد'; } ?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >رقم الهويه </th>
                                    <td><?php  if(!empty($personal_data->card_num)){
                                            echo $personal_data->card_num; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background"  >جهه الاصدار</th>
                                    <td><?php  if(!empty($dest_card[$personal_data->geha_esdar_fk])){
                                            echo $dest_card[$personal_data->geha_esdar_fk]->title_setting;
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background">تاريخ الاصدار</th>
                                    <td><?php  if(!empty($personal_data->esdar_date_m)){
                                            echo $personal_data->esdar_date_m; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background">تاريخ الميلاد هجرى</th>
                                    <td><?php  if(!empty($personal_data->birth_date_h	)){
                                            echo $personal_data->birth_date_h	; }else{ echo'غيرمحدد';}?></td>
                                </tr>
                                <?php

                                $array_date=explode("/",$personal_data->birth_date_h);
                                if(isset($array_date[2])){
                                    $age = $current_hijry_year - $array_date[2];
                                }else{
                                    $age ="";
                                }
                                ?>
                                <tr>
                                    <th class="gray_background">العمر</th>
                                    <td><?php echo $age;?></td>
                                    <th class="gray_background">الجوال</th>
                                    <td><?php  if(!empty($personal_data->jwal)){
                                            echo $personal_data->jwal; }else{ echo'غيرمحدد';}?></td>
                                </tr>

                                <tr>
                                    <th class="gray_background"  >جوال أخر</th>
                                    <td><?php  if(!empty($personal_data->jwal_another)){
                                            echo $personal_data->jwal_another; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background"  >المدينة </th>
                                    <td><?php  if(!empty($cities[$personal_data->madina_fk])){
                                            echo $cities[$personal_data->madina_fk];
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >الحي</th>
                                    <td><?php if(!empty($ahais[$personal_data->hai_fk])){
                                            echo $ahais[$personal_data->hai_fk]; }else{ echo 'غير محدد';} ?></td>
                                    <th class="gray_background"  >اسم الشارع</th>
                                    <td><?php  if(!empty($personal_data->street_name)){
                                            echo $personal_data->street_name; }else{ echo'غيرمحدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >العنوان الوطني</th>
                                    <td><?php  if(!empty($personal_data->enwan_watni)){
                                            echo $personal_data->enwan_watni; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background" >البريد الإلكتروني</th>
                                    <td><?php  if(!empty($personal_data->email)){ echo $personal_data->email; }else{ echo'غيرمحدد';}?></td>

                                </tr>
                                <tr>
                                    <th class="gray_background" >الدرجة العلمية</th>
                                    <td><?php  if(!empty($Degree[$personal_data->daraga_3elmia_fk])){
                                            echo $Degree[$personal_data->daraga_3elmia_fk]->title_setting;
                                        }else{ echo'غيرمحدد'; }?></td>
                                    <th class="gray_background" >المؤهلات العلمية</th>
                                    <td><?php  if(!empty($science_qualification[$personal_data->moahel_3elmi_fk])){
                                            echo $science_qualification[$personal_data->moahel_3elmi_fk]->title_setting;
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                                <?php $arr =array(1=>'نعم',0=>'لا'); ?>
                                <tr>
                                    <th class="gray_background" >الحياة العملية</th>
                                    <td><?php  if(!empty($arr[$personal_data->hya_3elmia_fk])){
                                            echo $arr[$personal_data->hya_3elmia_fk]; }else{ echo'غيرمحدد';}?></td>

                                    <th class="gray_background" >المهنة</th>
                                    <td><?php  if(!empty($job_role[$personal_data->mehna_fk])){
                                            echo $job_role[$personal_data->mehna_fk];
                                        }else{ echo'غيرمحدد'; }?></td>
                                </tr>
                                <?php if($personal_data->working_life ==1){ ?>
                                    <tr>
                                        <th class="gray_background" >جهة العمل </th>
                                        <td><?php  if(!empty($employer[$personal_data->geha_amal])){
                                                echo $employer[$personal_data->geha_amal]->title_setting;
                                            }else{ echo'غيرمحدد'; }?></td>
                                        <th class="gray_background" >عنوان العمل</th>
                                        <td><?php  if(!empty($personal_data->enwan_amal)){
                                                echo $personal_data->enwan_amal; }else{ echo'غيرمحدد';}?></td>
                                    </tr>

                                    <tr>
                                        <th class="gray_background" >هاتف العمل</th>
                                        <td><?php  if(!empty($personal_data->hatf_amal)){
                                                echo $personal_data->hatf_amal; }else{ echo'غيرمحدد';}?></td>
                                        <th class="gray_background" >اللقب</th>
                                        <td><?php  if(!empty($surname_arr[$personal_data->laqb_fk])){
                                                echo $surname_arr[$personal_data->laqb_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                    </tr>
                                <?php } ?>
                                <?php if($personal_data->suspend ==1){ ?>
                                <tr>
                                    <th class="gray_background" >نوع العضوية</th>
                                    <td><?php  if(!empty($membership_arr[$personal_data->membership_type])){
                                            echo $membership_arr[$personal_data->membership_type]->title_setting;
                                        }else{ echo'غيرمحدد'; }?></td>
                                    <th class="gray_background" >رقم العضوية</th>
                                    <td><?php  if(!empty($personal_data->membership_num)){
                                            echo $personal_data->membership_num; }else{ echo'غيرمحدد';}?></td>

                                </tr>
                                <tr>
                                    <th class="gray_background" >رقم القرار</th>
                                    <td><?php  if(!empty($personal_data->qrar_num)){
                                            echo $personal_data->qrar_num; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background" >تاريخ القرار</th>
                                    <td><?php  if(!empty($personal_data->qrar_date)){
                                            echo $personal_data->qrar_date; }else{ echo'غيرمحدد';}?></td>

                                </tr>
                                <tr>
                                    <th class="gray_background" >مبلغ الإشتراك السنوي</th>
                                    <td><?php  if(!empty($personal_data->subs_year_value)){
                                            echo $personal_data->subs_year_value; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background" >تاريخ بداية الإشتراك</th>
                                    <td><?php  if(!empty($personal_data->subs_date_from)){
                                            echo $personal_data->subs_date_from; }else{ echo'غيرمحدد';}?></td>

                                </tr>
                                <?php   $pay_arr =array('','نقدي','تحويل','شيك','بنك');?>
                                <tr>
                                    <th class="gray_background" >تاريخ نهاية الإشتراك</th>
                                    <td><?php  if(!empty($personal_data->subs_date_to)){
                                            echo $personal_data->subs_date_to; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background" >تاريخ التحديث</th>
                                    <td><?php  if(!empty($personal_data->updates_date)){
                                            echo $personal_data->updates_date; }else{ echo'غيرمحدد';}?></td>

                                </tr>
                                <?php $membership_status_arr =array(0=>'غير نشط',1=>'نشط'); ?>
                                <tr>
                                    <th class="gray_background" >طريقة السداد</th>
                                    <td><?php  if(!empty($pay_arr[$personal_data->pay_method_id_fk])){
                                            echo $pay_arr[$personal_data->pay_method_id_fk]; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background" > حالة العضوية</th>
                                    <td><?php  if(!empty($membership_status_arr[$personal_data->membership_status])){
                                            echo $membership_status_arr[$personal_data->membership_status]; }else{ echo'غيرمحدد';}?></td>
                                </tr>
                                <?php if ($personal_data->pay_method_id_fk  == 2 && $personal_data->pay_method_id_fk ==4){ ?>
                                    <tr>
                                        <th class="gray_background" >إسم البنك</th>
                                        <td><?php  if(!empty($personal_data->updates_date)){ echo $personal_data->updates_date; }else{ echo'غيرمحدد';}?></td>
                                        <th class="gray_background" >رقم الحساب</th>
                                        <td><?php  if(!empty($pay_arr[$personal_data->pay_method_id_fk])){
                                                echo $pay_arr[$personal_data->pay_method_id_fk]; }else{ echo'غيرمحدد';}?></td>
                                    </tr>


                                <?php } ?>

                                <?php } ?>
                                <?php if($personal_data->working_life ==1){ ?>
                                    <tr>
                                        <th class="gray_background" >الصوره الشخصيه</th>
                                        <td><?php  if(!empty($personal_data->mem_img)){?>
                                                <img src="<?php echo base_url(); ?>uploads/images/<?php echo $personal_data->mem_img;?>"
                                                     id="my_image" width="150px"> <?php } ?></td>
                                        <th class="gray_background" >صورة الهوية</th>
                                        <td><?php  if(!empty($personal_data->card_img)){?>
                                                <img src="<?php echo base_url(); ?>uploads/images/<?php echo $personal_data->card_img;?>"
                                                     id="my_image" width="150px"> <?php } ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if($personal_data->suspend ==1){ ?>
                                <tr>
                                    <th class="gray_background" >صورة قرار المجلس</th>
                                    <td><?php  if($personal_data->qrar_magls_img !=''){?>
                                            <img src="<?php echo base_url(); ?>uploads/images/<?php echo $personal_data->qrar_magls_img;?>"
                                                 id="my_image" width="150px"> <?php } ?></td>

                                        <th class="gray_background" >صورة الحساب البنكي</th>
                                        <td><?php  if($personal_data->bank_account_img  !=''){?>
                                                <img src="<?php echo base_url(); ?>uploads/images/<?php echo $personal_data->bank_account_img;?>"
                                                     id="my_image" width="150px"> <?php } ?></td>

                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
        window.location.href ="<?php echo base_url('Directors/General_assembly/add_member_maindata') ?>";
    },100);

</script >
                

