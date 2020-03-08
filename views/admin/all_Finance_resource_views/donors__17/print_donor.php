
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

    <?php
    $donors_types=array(1=>'فرد',2=>'مؤسسه /شركه',3=>'جهات مانحه',4=>'مؤسسات حكوميه');
    $send_pay=array(1=>'ارغب في استلام البريدعن طريق البريد الالكتروني',2=>'ارغب في استلام البريد عن طريق صندوق البريده',3=>'لا ارغب في استلام البريد');

    $yes_no=array(1=>'نعم','2'=>'لا');
    $satatus=array(1=>'نشط','2'=>'غيرنشط');
    $gender=array(1=>'ذكر ','2'=>'انثي');
    $pay_paid=array(1=>'نقدي',2=>'شيك',3=>'ايداع نقدي',4=>'ايداع شيك',5=>'شبكه',6=>'امد مستديم');



    ?>


            <div class="header col-xs-12 no-padding">
                <div class="col-xs-4 text-center">
                    <p>المملكة العربية السعودية</p>
                    <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
                </div>
                <div class="col-xs-4 text-center">
                    <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
                </div>
                <div class="col-xs-4 text-center">
                    <p>المملكة العربية السعودية</p>
                    <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
                </div>
            </div>
            <div class="col-xs-12 Title">
                <h5 class="text-center"><br><br> <strong> بيانات المتبرع</strong></h5><br>
            </div>

            <section class="main-body">
                <div class="container">
                    <div class="print_forma no-border col-xs-12 no-padding">
                        <div class="personality">
                            <div class="col-xs-12 no-padding">
                                <table class="table table-bordered table-devices">
                                    <tbody>
                                    <tr>
                                        <th class="gray_background"  >فئه المتبرع</th>
                                        <td><?php echo $donors_types[$item->fe2a_type];?></td>
                                        <th class="gray_background"  >اسم المتبرع</th>
                                        <td><?php echo $item->d_name;?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" > رقم المتبرع</th>
                                        <td><?php echo $item->donor_num;?></td>
                                        <th class="gray_background">حاله المتبرع</th>
                                        <td><?php echo $satatus[$item->d_status];?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" > نوع الهويه</th>
                                        <td><?php echo $item->card_type;?></td>
                                        <th class="gray_background">رقم الهويه</th>
                                        <td><?php echo $item->d_national_num ;?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" > مصدر الهويه</th>
                                        <td><?php echo $item->esdar_card;?></td>
                                        <th class="gray_background">المدينه</th>
                                        <td><?php echo $item->city ;?></td>
                                    </tr>

                                    <tr>
                                        <th class="gray_background" >العنوان</th>
                                        <td><?php echo $item->address;?></td>
                                        <th class="gray_background">المهنه</th>
                                        <td><?php echo $item->mehna ;?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >جهه العمل</th>
                                        <td><?php echo $item->job_place;?></td>
                                        <th class="gray_background">التخصص</th>
                                        <td><?php echo $item->specialize ;?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >الجنسيه</th>
                                        <td><?php echo $item->d_nationality_fk;?></td>
                                        <th class="gray_background">صندوق بريدي</th>
                                        <td><?php echo $item->	barid_box ;?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >رمز بريدي </th>
                                        <td><?php echo $item->barid_code;?></td>
                                        <th class="gray_background">فاكس</th>
                                        <td><?php echo $item->fax ;?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >الجوال </th>
                                        <td><?php echo $item->mob;?></td>
                                        <th class="gray_background">الايميل</th>
                                        <td><?php echo $item->d_email ;?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >نشاط المؤسسه </th>
                                        <td><?php echo $item->activity;?></td>
                                        <th class="gray_background">طريقه السداد</th>
                                        <td><?php echo $pay_paid[$item->pay_method] ;?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >البنك </th>
                                        <td><?php echo $item->bank;?></td>
                                        <th class="gray_background">رقم الحساب</th>
                                        <td><?php echo $item->bank_account_num;?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >الفرع </th>
                                        <td><?php echo $item->bank_branch;?></td>
                                        <th class="gray_background">الطريقه المناسبه للمراسله</th>
                                        <td><?php echo $send_pay[$item->d_message_method] ;?></td>
                                    </tr>
                                    <tr>
                                        <th class="gray_background" >هل ترغب ف المراسبله عن طريق رسائل الجوال </th>
                                        <td><?php echo $yes_no[ $item->d_message_mob];?></td>

                                    </tr>







                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="special col-xs-12 ">
                            <div class="col-xs-4 text-center">
                                <label> الختم </label><br><br>
                            </div>
                            <div class="col-xs-4 text-center">

                            </div>
                            <div>     <label>المدير المالى </label><br><br>
                                <p>....................</p><br>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


</div>


<script >

    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url('all_Finance_resource/donors/Donor') ?>";
    },100);

</script >


