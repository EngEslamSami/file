
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
    if ($result != '' && $result != null && !empty($result)) {   ?>
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
                                    <td><?php  if(!empty($result->name)){ echo $result->name; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background"  >إسم الموظف</th>
                                    <td><?php  if(!empty($result->name)){ echo $result->name; }else{ echo'غيرمحدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background"  >الجنسيه</th>
                                    <td><?php   if(!empty($result->gnsia_title)){
                                            echo $result->gnsia_title;  } else { echo'غيرمحدد';}?></td>
                                    <th class="gray_background"  >الحاله الاجتماعيه</th>
                                    <td><?php   if(!empty($result->hala_egtma3ia_title)){
                                            echo $result->hala_egtma3ia_title;  } else { echo'غيرمحدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >رقم الهويه </th>
                                    <td><?php   if(!empty($result->card_num)){
                                            echo $result->card_num;  } else { echo'غيرمحدد';}?></td>
                                    <th class="gray_background"  >جهه الاصدار</th>
                                    <td><?php   if(!empty($result->geha_esdar_title)){
                                            echo $result->geha_esdar_title;  } else { echo'غيرمحدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background">تاريخ الاصدار</th>
                                    <td><?php   if(!empty($result->esdar_date_m)){
                                            echo $result->esdar_date_m;  } else { echo'غيرمحدد';}?></td>
                                    <th class="gray_background">تاريخ الميلاد هجرى</th>
                                    <td><?php   if(!empty($result->esdar_date_h)){
                                            echo $result->esdar_date_h;  } else { echo'غيرمحدد';}?></td>
                                </tr>
                                <?php

                                $array_date=explode("/",$result->birth_date_h);
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
                                    <td><?php   if(!empty($result->jwal)){
                                            echo $result->jwal;  } else { echo'غيرمحدد';}?></td>
                                </tr>

                                <tr>
                                    <th class="gray_background"  >جوال أخر</th>
                                    <td><?php   if(!empty($result->jwal_another)){
                                            echo $result->jwal_another;  } else { echo'غيرمحدد';}?></td>
                                    <th class="gray_background"  >المدينة </th>
                                    <td><?php   if(!empty($result->madina_title)){
                                            echo $result->madina_title;  } else { echo'غيرمحدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >الحي</th>
                                    <td><?php   if(!empty($result->hai_title)){
                                            echo $result->hai_title;  } else { echo'غيرمحدد';}?></td>
                                    <th class="gray_background"  >اسم الشارع</th>
                                    <td><?php   if(!empty($result->street_name)){
                                            echo $result->street_name;  } else { echo'غيرمحدد';}?></td>
                                </tr>
                                <tr>
                                    <th class="gray_background" >العنوان الوطني</th>
                                    <td><?php   if(!empty($result->enwan_watni)){
                                            echo $result->enwan_watni;  } else { echo'غيرمحدد';}?></td>
                                    <th class="gray_background" >البريد الإلكتروني</th>
                                    <td><?php   if(!empty($result->email)){
                                            echo $result->email;  } else { echo'غيرمحدد';}?></td>

                                </tr>
                                <tr>
                                    <th class="gray_background" >الدرجة العلمية</th>
                                    <td><?php   if(!empty($result->daraga_3elmia_title)){
                                            echo $result->daraga_3elmia_title;  } else { echo'غيرمحدد';}?></td>


                                    <th class="gray_background" >المؤهلات العلمية</th>
                                    <td><?php   if(!empty($result->moahel_3elmi_title)){
                                            echo $result->moahel_3elmi_title;  } else { echo'غيرمحدد';}?></td>
                                </tr>
                                <?php $arr =array(1=>'نعم',0=>'لا'); ?>
                                <tr>
                                    <th class="gray_background" >الحياة العملية</th>
                                    <td><?php  if(!empty($arr[$result->hya_3elmia_fk])){
                                            echo $arr[$result->hya_3elmia_fk]; }else{ echo'غيرمحدد';}?></td>

                                    <th class="gray_background" >المهنة</th>
                                    <td><?php   if(!empty($result->mehna_title)){
                                            echo $result->mehna_title;  } else { echo'غيرمحدد';}?></td>
                                </tr>
                                <?php if($result->hya_3elmia_fk ==1){ ?>
                                    <tr>
                                        <th class="gray_background" >جهة العمل </th>
                                        <td><?php   if(!empty($result->geha_amal)){
                                                echo $result->geha_amal;  } else { echo'غيرمحدد';}?></td>
                                        <th class="gray_background" >عنوان العمل</th>
                                        <td><?php   if(!empty($result->enwan_amal)){
                                                echo $result->enwan_amal;  } else { echo'غيرمحدد';}?></td>
                                    </tr>

                                    <tr>
                                        <th class="gray_background" >هاتف العمل</th>
                                        <td><?php   if(!empty($result->hatf_amal)){
                                                echo $result->hatf_amal;  } else { echo'غيرمحدد';}?></td>
                                        <th class="gray_background" >اللقب</th>
                                        <td><?php   if(!empty($result->laqb_title)){
                                                echo $result->laqb_title;  } else { echo'غيرمحدد';}?></td>
                                    </tr>
                                <?php } ?>
                                <?php if( !empty($result->odwiat) ){ ?>
                                <tr>
                                    <th class="gray_background" >نوع العضوية</th>
                                    <td>
                                        <?php  if(!empty($result->odwiat->no3_odwia_title)){
                                            echo $result->odwiat->no3_odwia_title;
                                        }else{ echo'غيرمحدد'; }?>
                                    </td>
                                    <th class="gray_background" >رقم العضوية</th>
                                    <td> <?php  if(!empty($result->odwiat->rkm_odwia_full)){
                                            echo $result->odwiat->rkm_odwia_full;
                                        }else{ echo'غيرمحدد'; }?></td>

                                </tr>
                                <tr>
                                    <th class="gray_background" >رقم القرار</th>
                                    <td> <?php  if(!empty($result->odwiat->qrar_rkm)){
                                            echo $result->odwiat->qrar_rkm;
                                        }else{ echo'غيرمحدد'; }?></td>
                                    <th class="gray_background" >تاريخ القرار</th>
                                    <td> <?php  if(!empty($result->odwiat->qrar_date_m)){
                                            echo $result->odwiat->qrar_date_m;
                                        }else{ echo'غيرمحدد'; }?></td>

                                </tr>
                                <tr>
                                    <th class="gray_background" >مبلغ الإشتراك السنوي</th>
                                    <td> <?php  if(!empty($result->odwiat->subs_value)){
                                            echo $result->odwiat->subs_value;
                                        }else{ echo'غيرمحدد'; }?></td>
                                    <th class="gray_background" >تاريخ بداية الإشتراك</th>
                                    <td> <?php  if(!empty($result->odwiat->subs_from_date_m)){
                                            echo $result->odwiat->subs_from_date_m;
                                        }else{ echo'غيرمحدد'; }?></td>

                                </tr>

                                <tr>
                                    <th class="gray_background" >تاريخ نهاية الإشتراك</th>
                                    <td><?php  if(!empty($result->odwiat->subs_to_date_m)){
                                            echo $result->odwiat->subs_to_date_m; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background" >تاريخ التحديث</th>
                                    <td><?php  if(!empty($result->odwiat->update_date_m)){
                                            echo $result->odwiat->update_date_m; }else{ echo'غيرمحدد';}?></td>

                                </tr>

                                <tr>
                                    <th class="gray_background" >طريقة السداد</th>
                                    <td><?php  if(!empty($result->odwiat->pay_method_title)){
                                            echo $result->odwiat->pay_method_title; }else{ echo'غيرمحدد';}?></td>
                                    <th class="gray_background" > حالة العضوية</th>
                                    <td><?php  if(!empty($result->odwiat->odwia_status_title)){
                                            echo $result->odwiat->odwia_status_title; }else{ echo'غيرمحدد';}?></td>
                                </tr>
                                <?php if ($result->odwiat->pay_method_fk == 6){ ?>
                                    <tr>
                                        <th class="gray_background" >إسم البنك</th>
                                        <td><?php  if(!empty($result->odwiat->bank_title)){ echo $result->odwiat->bank_title; }else{ echo'غيرمحدد';}?></td>
                                        <th class="gray_background" >رقم الحساب</th>
                                        <td><?php  if(!empty($result->odwiat->rkm_hesab)){ echo $result->odwiat->rkm_hesab; }else{ echo'غيرمحدد';}?></td>
                                    </tr>


                                <?php } ?>

                                <?php } ?>

                                    <tr>
                                        <th class="gray_background" >الصوره الشخصيه</th>
                                        <td><?php  if(!empty($result->mem_img)){?>
                                                <img src="<?php echo base_url(); ?>uploads/images/<?php echo $result->mem_img;?>"
                                                     id="my_image" width="150px"> <?php } ?></td>
                                        <th class="gray_background" >صورة الهوية</th>
                                        <td><?php  if(!empty($result->card_img)){?>
                                                <img src="<?php echo base_url(); ?>uploads/images/<?php echo $result->card_img;?>"
                                                     id="my_image" width="150px"> <?php } ?></td>
                                    </tr>


                                <tr>
                                    <th class="gray_background" >صورة قرار المجلس</th>
                                    <td><?php  if(!empty($result->odwiat->qrar_mgls_morfq)){?>
                                            <img src="<?php echo base_url(); ?>uploads/images/<?php echo $result->odwiat->qrar_mgls_morfq;?>"
                                                 id="my_image" width="150px"> <?php } ?></td>

                                        <th class="gray_background" >صورة الحساب البنكي</th>
                                        <td><?php  if(!empty($result->odwiat->rkm_hesab_morfq)){?>
                                                <img src="<?php echo base_url(); ?>uploads/images/<?php echo $result->odwiat->rkm_hesab_morfq;?>"
                                                     id="my_image" width="150px"> <?php } ?></td>

                                </tr>
                               
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
                

