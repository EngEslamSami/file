<style type="text/css">
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: !block !important;
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
        display: inline-!block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-!block;
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
        display: inline-!block;
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


.table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {
    border: 1px solid #ffffff !important;
    background: #e8e8e8;
    border-radius: 7px !important;
    font-size: 12px !important;
    color: black;
}
    /***/

    .btn-close-model,
    .btn-close-model:hover,
    .btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -4px;
    }

    .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {
        top: 100% !important;
        bottom: auto !important;
        margin-bottom: 1px !important;
    }
    .btn-group .dropdown-menu {
        min-width: 100px;
        max-width: 110px;
    }

</style>
<?php
$this->load->view('admin/requires/header');
$this->load->view('admin/requires/tob_menu');

?>
<?php
if(isset($records2) &&!empty($records2)){

    foreach ($records as $record) { ?>
        <div class="modal fade" id="myModal<?php echo $record->id; ?>" role="dialog">
            <div class="modal-dialog" style="width: 100%">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">تفاصيل</h4>
                    </div>
                    <div class="modal-body">
                        <div class="print_forma col-xs-12 no-padding">
                            <div class="col-sm-9">
                                <div class="piece-box" style="margin-bottom: 0;">

                                    <table class="table table-bordered" style="margin-top:4px">
                                        <tr class="closed_green">

                                            <td class="text-center" style="width: 20%"> رقم الكافل</td>
                                            <td class="text-center" style="width: 25%"> إسم الكافل</td>

                                            <td class="text-center" style="width: 20%"> فئة الكافل</td>

                                        </tr>
                                        <tr class="open_green">

                                            <td class="text-center"><?php   if(!empty($record->k_num)){
                                                    echo $record->k_num; }else{ echo'غيرمحدد'; } ?></td>
                                            <td class="text-center"><?php if(!empty($record->k_name)){
                                                    echo$record->k_name; }else{ echo'غيرمحدد'; } ?></td>

                                            <td class="text-center"><?php if($record->fe2a_type==1)echo "افراد"; else{ echo "مؤسسات"; } ?></td>

                                        </tr>
                                    </table>
                                    <?php
                                    if($record->fe2a_type==1)
                                    {?>
                                        <table class="table table-bordered" style="margin-top:4px">
                                            <tr class="closed_green">

                                                <td class="text-center" style="width: 15%"> الجنس</td>
                                                <td class="text-center" style="width: 20%"> الجنسية </td>
                                                <td class="text-center" style="width: 20%"> نوع الهوية</td>

                                            </tr>
                                            <tr class="open_green">

                                                <td class="text-center"><?php  if(!empty($gender_data[$record->k_gender_fk])){
                                                        echo $gender_data[$record->k_gender_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>

                                                <td class="text-center"><?php  if(!empty($nationality[$record->k_nationality_fk])){
                                                        echo $nationality[$record->k_nationality_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                                <td class="text-center"> <?php  if(!empty($type_card[$record->k_national_type])){
                                                        echo $type_card[$record->k_national_type]->title_setting; }else{ echo'غيرمحدد';}?></td>

                                            </tr>
                                        </table>
                                        <table class="table table-bordered" style="margin-top:4px">
                                            <tr class="closed_green">

                                                <td class="text-center" style="width: 20%">رقم الهوية(10اراقام)</td>
                                                <td class="text-center" style="width: 20%"> مصدر الهوية </td>
                                                <td class="text-center" style="width: 20%"> هل يوجد وكاله </td>
                                            </tr>
                                            <tr class="open_green">
                                                <td class="text-center"><?php  if(!empty($record->k_national_num)){
                                                        echo $record->k_national_num; }else{ echo'غيرمحدد';}?></td>
                                                <td class="text-center"><?php  if(!empty($dest_card[$record->k_national_place])){
                                                        echo $dest_card[$record->k_national_place]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                                <td class="text-center"><?php if($record->wakala_type==1)echo 'نعم';else echo 'لا'; ?>
                                                </td>
                                            </tr>
                                        </table>
                                    <?php } ?>



                                    <!---------------------------------------------------->
                                    <?php if($record->wakala_type==1){?>
                                        <?php
                                        if($record->fe2a_type==1)
                                        {
                                            $title="اسم الوكيل";
                                            $desc="صفته";
                                            $num="رقم هويه الوكيل";
                                            $gawal="جوال الوكيل";

                                        }else{
                                            $title="اسم المسئول";
                                            $desc="صفته";
                                            $num="رقم هويه المسئول";
                                            $gawal="جوال المسئول";
                                        }
                                        ?>
                                        <table class="table table-bordered" style="margin-top:4px">
                                            <tr class="closed_green">
                                                <td class="text-center" style="width: 15%"><?php echo $title;?></td>
                                                <td class="text-center" style="width: 20%"> <?php echo $desc;?> </td>
                                                <td class="text-center" style="width: 15%"><?php echo $num;?></td>
                                                <td class="text-center" style="width: 25%"><?php echo $gawal;?></td>

                                            </tr>
                                            <tr class="open_green">
                                                <td class="text-center"><?php  if(!empty($record->w_name)){
                                                        echo $record->w_name; }else{ echo'غيرمحدد';}?></td>
                                                <td class="text-center"><?php  if(!empty($record->desc)){
                                                        echo $record->desc; }else{ echo'غيرمحدد';}?></td>
                                                <td class="text-center"><?php  if(!empty($record->w_national_num)){
                                                        echo $record->w_national_num; }else{ echo'غيرمحدد';}?></td>

                                                <td class="text-center"><?php  if(!empty($record->w_mob)){
                                                        echo $record->w_mob; }else{ echo'غيرمحدد';}?></td>
                                            </tr>
                                        </table>
                                    <?php } ?>



                                    <!------------------------------------------------->
                                    <table class="table table-bordered" style="margin-top:4px">
                                        <tr class="closed_green">
                                            <td class="text-center" style="width: 20%"> المدينه</td>
                                            <td class="text-center" style="width: 20%"> العنوان </td>
                                            <td class="text-center" style="width: 20%"> المهنة </td>
                                            <td class="text-center" style="width: 20%"> جهة العمل </td>
                                            <td class="text-center" style="width: 20%"> التحصص </td>

                                        </tr>

                                        <tr class="open_green">
                                            <td class="text-center"><?php if(!empty($cities[$record->k_city])){
                                                    echo $cities[$record->k_city]; }else{ echo 'غير محدد';} ?></td>
                                            <td class="text-center"><?php  if(!empty($record->k_addres)){
                                                    echo $record->k_addres; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"> <?php  if(!empty($job_role[$record->k_job_fk])){
                                                    echo $job_role[$record->k_job_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->k_job_place)){
                                                    echo $record->k_job_place; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($specialize[$record->k_specialize_fk])){
                                                    echo $specialize[$record->k_specialize_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>
                                        </tr>
                                    </table>
                                    <?php
                                    if($record->fe2a_type==2){?>
                                        <table class="table table-bordered" style="margin-top:10px">
                                            <tr class="closed_green">
                                                <td class="text-center" style="width: 15%">نشاط المؤسسة</td>

                                                <td class="text-center" style="width: 15%">رقم هاتف المؤسه </td>
                                                <td class="text-center" style="width: 15%">الجوال </td>
                                                <td class="text-center" style="width: 15%">فاكس المؤسسه </td>

                                            </tr>
                                            <tr class="open_green">
                                                <td class="text-center"><?php  if(!empty($activity[$record->k_activity_fk])){
                                                        echo $activity[$record->k_activity_fk]->title_setting; }else{ echo'غيرمحدد';}?></td>

                                                <td class="text-center"><?php  if(!empty($record->company_phone)){
                                                        echo $record->company_phone; }else{ echo'غيرمحدد';}?></td>
                                                <td class="text-center"><?php  if(!empty($record->company_gawal)){
                                                        echo $record->company_gawal; }else{ echo'غيرمحدد';}?></td>
                                                <td class="text-center"><?php  if(!empty($record->company_fax)){
                                                        echo $record->company_fax; }else{ echo'غيرمحدد';}?></td>

                                            </tr>
                                        </table>
                                    <?php } ?>
                                    <table class="table table-bordered" style="margin-top:4px">
                                        <tr class="closed_green">


                                            <td class="text-center" style="width: 25%">صندوق بريد</td>
                                            <td class="text-center" style="width: 25%"> رمز بريدي</td>
                                            <td class="text-center" style="width: 20%">الفاكس</td>
                                        </tr>
                                        <tr class="open_green">


                                            <td class="text-center"><?php  if(!empty($record->k_barid_box)){
                                                    echo $record->k_barid_box; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->k_bardid_code)){
                                                    echo $record->k_bardid_code;
                                                }else{ echo'غيرمحدد'; }?></td>
                                            <td class="text-center"><?php  if(!empty($record->k_fax)){
                                                    echo $record->k_fax; }else{ echo'غيرمحدد';}?></td>
                                        </tr>
                                    </table>


                                    <table class="table table-bordered" style="margin-top:4px">
                                        <tr class="closed_green">

                                            <td class="text-center" style="width: 20%">البريد الالكتروني </td>
                                            <td class="text-center" style="width: 20%">الوقت المناسب للتواصل </td>
                                            <td class="text-center" style="width: 20%">حاله الكافل </td>
                                            <td class="text-center" style="width: 20%">السبب</td>

                                        </tr>
                                        <tr class="open_green">

                                            <td class="text-center"><?php  if(!empty($record->k_email)){
                                                    echo $record->k_email; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->right_time_from)){
                                                    echo $record->right_time_from; }else{ echo'غيرمحدد';}?> : <?php  if(!empty($record->right_time_to)){
                                                    echo $record->right_time_to; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->halt)){
                                                    echo $record->halt; }else{ echo'غيرمحدد';}?></td>
                                            <td class="text-center"><?php  if(!empty($record->reason)){
                                                    echo $record->reason; }else{ echo'غيرمحدد';}?></td>

                                        </tr>
                                    </table>
                                    <!--
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
                                    </table>-->
                                    <table class="table table-bordered" style="margin-top:4px">
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
                                            <td class="text-center"><?php  if(!empty($record->k_notes)){
                                                    echo $record->k_notes;
                                                }else{ echo'غيرمحدد'; }?></td>
                                        </tr>
                                    </table>
                                </div>


                            </div>
                            <div class="col-sm-3">
                                <div class="piece-box">
                                    <?php if(!empty($record->person_img)){?>
                                        <img src="<?php echo base_url();?>uploads/images/<?php echo $record->person_img;?>" class="center-ييblock"  style="width: 150px; padding: 10px">
                                    <?php } ?>
                                    <table class="table table-bordered">

                                        <tr>
                                            <td>رقم الكافل</td>
                                            <td><?php   if(!empty($record->k_num)){
                                                    echo $record->k_num; }else{ echo'غيرمحدد'; } ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%">إسم الكافل</td>
                                            <td style="width: 50%"><?php if(!empty($record->k_name)){
                                                    echo$record->k_name; }else{ echo'غيرمحدد'; } ?></td>
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

                    <div id="attach_kafel">
                    </div>
                </div>
            </div>
        </div>


        <?php
    }  }





?>
<style>
.table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {
    border: 1px solid #ffffff !important;
    background: #e8e8e8;
    border-radius: 7px !important;
    font-size: 14px !important;
    color: black;
    font-weight: bold;
}
.greentd td, .greentd th {
    color: #fff;
    font-size: 13px !important;
    background-color: #09704e !important;
    border-radius: 7px !important;
}

.toggle-example .toggle.btn{
    width: 55px !important;
    margin-bottom: 0px !important;
}
</style>

<div class="col-sm-12 no-padding " >




            <table id="js_table_customer"
                   style="table-layout:fixed;width: 100% !important;"
                   class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
                <thead>
                <tr class="greentd">
                    <th style="width: 45px;">م </th>
                    <th style="width: 65px;">رقم الايصال </th>
                    <th style="width: 65px;">التاريخ  </th>
                   <!-- <th style="width: 140px;" > نوع الايصال</th>-->
                    <th style="width: 65px;" > ألية التوريد</th>
                    <th style="width: 60px;" > المبلغ</th>
                    <th style="width: 150px;"> الاسم</th>
                   <th style="width: 65px;">الجوال  </th> 
                    <th style="width: 150px;">البند </th>
                    <th style="width: 145px;">الاجراء</th>
                         <th  style="width: 65px;">نوع القيد</th>

                    <th style="width: 65px;" >رقم القيد</th>
                    <th style="width: 65px;" > الحالة</th>
                       <th style="" > القائم بالإضافة</th>
               

                </tr>
                </thead>
            </table>

</div>


<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>



<?php


echo $customer_js;
?>



<div class="modal fade" id="myModal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">بحث</h4>
            </div>
            <div class="modal-body" id="div_search">

                <div class="col_md_3">


                    <div class="col_md_3  no-padding ">
                        <h6 class="label_title_2 label-blue ">بحث ب </h6>
                    </div>
                    <div class="col-md-2 col-sm-6  no-padding">
                        <?php
                        $array_search = array(
                            'k_num'=>'رقم الكافل',
                            'k_name'=>'إسم الكافل ',
                            'k_mob'=>'جوال الكافل ',
                        );
                        ?>
                        <select  id="array_search_id" class="form-control  input_style_2 "
                                 aria-required="true" onchange="check_val($(this).val())"  >
                            <option value="">إختر</option>


                            <?php foreach ($array_search as $key=>$row_search){ ?>
                                <option value="<?=$key?>" ><?=$row_search?> </option>
                            <?php } ?>
                        </select>

                    </div>

                </div>

                <div class="col_md_6 padding-4 input_search_id" style="display:none; margin-left: 0;">


                    <div class="col-md-4 col-sm-4  no-padding">

                        <input  id="input_search_id" value="" class="form-control  input_style_2 " aria-required="true"  >


                    </div>

                </div>


                <button type="button"  onclick="searchResults()" class="btn btn-success btn-next"/><i class="fa fa-search-plus"></i> بحث </button><br><br>

                <table   class="table example table-striped table-bordered" style="display: none;">

                    <thead>
                    <tr class="info">
                        <th  class="text-center" > # </th>
                        <th class="text-center" >رقم الكافل</th>
                        <th class="text-center" > اسم الكافل</th>
                        <th class="text-center" >جوال الكافل</th>


                    </tr>
                    </thead>
                    <tbody class="result_search_modal">

                    </tbody>
                </table>


            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">

                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق</button>

            </div>
        </div>
    </div>
</div>






<?php      $this->load->view('admin/requires/footer'); ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body" id="optionearea1">

            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-img" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">صورة المرفق</h4>
            </div>
            <div class="modal-body">
                <img  id="my_image" src="#" width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade " id="send_data_whats" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-success modal-lg " role="document" style="width:70%;">
        <div class="modal-content ">
        <form action="<?php echo base_url();?>all_Finance_resource/all_pills/AllPills/send_sms_whats" method="post">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.9;">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">  ارسال عبر الواتس </h3>
            </div>
            <div class="modal-body ">

                <input type="hidden" name="pill_id_whats" id="pill_id_whats"/>
         
                <div id="">

                    <!--------------------------------------------------->

 
                    <div class="form-group">

                        <div class="radio-content">
                            <input type="radio" checked="" onchange="write_message_whats($(this).val())" id="type_sarf11" name="check_mess"  class="send_whats" value="1">
                            <label for="type_sarf11" class="radio-label">الرساله الثابته  </label>
                        </div>
                        <div class="radio-content">
                            <input type="radio" id="type_sarf12" onchange="write_message_whats($(this).val())" name="check_mess"  class="send_whats" value="2">
                            <label for="type_sarf12" class="radio-label"> رساله اخري </label>
                        </div>


                    </div>

                    <textarea style="width: 100%; display: none;" placeholder="اكتب نص الرساله هناااا" name="message_whats" id="message_whats" > </textarea>

                    <!------------------------------------------------------------------------------------------->

                </div>
            </div>
            <div class="modal-footer " style="display: inline-block; width: 100%;">
                <button type="button" style="float: left;" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                <button type="button" formtarget="_blank" style="float: right;" onclick="send_sms_whats();"  class="btn btn-success" ><li class="fa fa-envelope-o"> ارسال</li></li></button>
            </div>
</form>
        </div>

    </div>

</div>




<div class="modal fade " id="send_data" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-success modal-lg " role="document" style="width:70%;">
        <div class="modal-content ">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.9;">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"> ارسال sms </h3>
            </div>
            <div class="modal-body ">

                <input type="hidden" name="pill_id" id="pill_id"/>
                <div class="col-xs-12 no-padding">

                    <div class="col-sm-4 text-center">
                        <h3 class="r-student-h3"> اجمالي الرسائل </h3>
                        <h4 class="r-student-h4 total_sms" id="required_to_pay">  </h4>
                    </div>

                    <div class="col-sm-4 text-center">
                        <h3 class="r-student-h3"> الرسائل المرسله</h3>
                        <h4 class="r-student-h4 total_send_sms" id="paid_to_pay"></h4>
                    </div>
                    <div class="col-sm-4 text-center">
                        <h3 class="r-student-h3"> الرصيد الحالي</h3>
                        <h4 class="r-student-h4 rasied_sms" id="paid_to_pay"></h4>
                    </div>


                </div>
                <div id="option_details2">

                    <!--------------------------------------------------->


                    <div class="form-group">

                        <div class="radio-content">
                            <input type="radio" checked="" onchange="write_message($(this).val())" id="type_sarf7" name="sarf"  class="sarf_types" value="1">
                            <label for="type_sarf7" class="radio-label">الرساله الثابته  </label>
                        </div>
                        <div class="radio-content">
                            <input type="radio" id="type_sarf8" onchange="write_message($(this).val())" name="sarf"  class="sarf_types" value="2">
                            <label for="type_sarf8" class="radio-label"> رساله اخري </label>
                        </div>


                    </div>

                    <textarea style="width: 100%; display: none;" placeholder="اكتب نص الرساله هناااا" id="message" > </textarea>

                    <!------------------------------------------------------------------------------------------->

                </div>
            </div>
            <div class="modal-footer " style="display: inline-block; width: 100%;">
                <button type="button" style="float: left;" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                <button type="button" style="float: right;" onclick="send_sms();"  class="btn btn-success" ><li class="fa fa-envelope-o"> ارسال</li></li></button>
            </div>

        </div>

    </div>

</div>
<script>

    function GetTable(valu) {
        //alert(valu);

        if (valu !=0 &&   valu!='') {
            var dataString = 'id=' + valu ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/all_pills/AllPills/GetDetails',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });

        }

    }


</script>

<script>
    function delete_row(valu)
    {
        //alert(valu);
        var link='<?= base_url();?>all_Finance_resource/all_pills/AllPills/DeletePill/'+valu;
        $('#adele').attr('href',link);
    }

</script>

<script>
    function img_attach(valu)
    {
        //alert(valu);
        var link='<?= base_url();?>uploads/images/'+valu;
        $('#my_image').attr('src',link);
    }


</script>
<!--
<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js" type="text/javascript"></script>

<
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.js"
        type="text/javascript"></script> -->


<script>

    function change_status(valu, id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/all_pills/AllPills/change_status",
            data: {valu: valu, id: id},
            success: function (msg) {
                var obj = JSON.parse(msg);
                var status = obj.status;
                console.log('status  ::'+status);
                $('#status_hidden'+id).val(status);
                if (status == 1) {
                  $('.show_status'+id).show();
                }else {
                  $('.show_status'+id).hide();

                }


            }

        });
    }

</script>
 <script>
    function write_message_whats(valu)
    {
        
       
        if(valu==2)
        {
            $('#message_whats').show();
        }else{
            $('#message_whats').hide();
        }

    }


</script>

<script>

    function get_member_send_whats(valu)
    {


   $('#pill_id_whats').val(valu);
}


</script>
<script>
function send_sms_whats()
{
    
        var type_message= $(".send_whats:radio:checked").val();
         var another_message=$('#message_whats').val();
        



        var pill_id=$('#pill_id_whats').val();
        
        

       

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/all_pills/AllPills/send_sms_whats",
            data: {pill_id_whats:pill_id,type_message:type_message,another_message:another_message},
            success: function (d) {
                

               var obj=JSON.parse(d);
               
              //location.href="https://web.whatsapp.com/send?phone=obj.person_mob&text=+obj.person_mob&source&data";
              var link="https://web.whatsapp.com/send?phone="+obj.person_mob+"&text="+obj.msg+"&source&data";
             
              
             if (window.showModalDialog)
   window.showModalDialog(link,"popup","dialogWidth:600px;dialogHeight:600px");
else
   window.open(link,"name","height=600,width=600,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,modal=yes");
               
$('#send_data_whats').modal('hide');
 
            }

        });

}


</script>








<script>
    function get_member_send(pill_id)
    {


    $('#pill_id').val(pill_id);

        return;


        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/all_pills/AllPills/get_balance",
            data: {},
            success: function (d) {
                var obj=JSON.parse(d);
/*alert(obj[1]);
return;*/

                $('.total_sms').text(obj[1]);
                $('.total_send_sms').text(obj[1]-obj[0]);
                $('.rasied_sms').text(obj[0]);
                // $('#tbody2').html(d);

            }

        });
    }



</script>
<script>
    function write_message(valu)
    {
        if(valu==2)
        {
            $('#message').show();
        }else{
            $('#message').hide();
        }

    }


</script>





<script>
    function send_sms()
    {



        var type_message= $(".sarf_types:radio:checked").val();



        var pill_id=$('#pill_id').val();

        var another_message=$('#message').val();

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/all_pills/AllPills/send_sms",
            data: {pill_id:pill_id,type_message:type_message,another_message:another_message},
            success: function (d) {

                alert('تم إرسال رسالتك بنجاح');
            }

        });


    }

    </script>