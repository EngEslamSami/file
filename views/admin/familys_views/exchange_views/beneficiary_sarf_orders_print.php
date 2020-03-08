
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
        .page-break	{ display: block; page-break-before: always; }
        table th,table td{
            font-size: 12px;
        }

    }
    @page {
        size: auto;  /* auto is the initial value */
        margin: 0mm; /* this affects the margin in the printer settings */
    }
    html {
        background-color: #FFFFFF;
        margin: 0px; /* this affects the margin on the HTML before sending to printer */
    }
    body {
        border: solid 1px blue;
        margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
    }
</style>


<div id = "printdiv" >
    <div class="header col-xs-12 no-padding">
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء   </p>
        </div>
        <div class="col-xs-4 text-center">
            <img src="<?php echo base_url();?>asisst/admin_asset/img/logo.png">
        </div>
        <div class="col-xs-4 text-center">
            <p>المملكة العربية السعودية</p>
            <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء    </p>
        </div>
    </div>
    <div class="col-xs-12 Title">
        <h5 class="text-center"><br><br> <strong><?=$title?> </strong></h5><br>
    </div>
    <section class="main-body">
        <div class="container-fluid">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">
                    <div class="col-xs-12 no-padding">

                        <?php if(!empty($BeneficiaryDetails)){  $arr_type =array('','نشط','غير نشط');?>
                            <table class="table table-bordered table-devices">
                                <tbody>
                                <tr>
                                    <th class="info">رقم الملف</th>
                                    <td><?php echo $BeneficiaryDetails['file_num'];?></td>
                                    <th class="info">اسم العائلة</th>
                                    <td><?php echo $BeneficiaryDetails['name'];?></td>
                                </tr>
                                <tr>
                                    <th class="info">رقم الهوية</th>
                                    <td><?php echo $BeneficiaryDetails['national_card_id'];?></td>
                                    <th class="info">عدد الأرامل</th>
                                    <td><?php echo $BeneficiaryDetails['armal'];?></td>
                                </tr>
                                <tr>
                                    <th class="info">عدد الأيتام</th>
                                    <td><?php echo $BeneficiaryDetails['yatem'];?></td>
                                    <th class="info">عدد المستفيدين</th>
                                    <td><?php echo $BeneficiaryDetails['mostafed'];?></td>
                                </tr>
                                <tr>
                                    <th class="info">عدد أفراد الاسرة</th>
                                    <td><?php echo $BeneficiaryDetails['mostafed'] + $BeneficiaryDetails['yatem'] + $BeneficiaryDetails['armal'];?></td>
                                    <th class="info">المبلغ</th>
                                    <td><?php echo $BeneficiaryDetails['value'];?></td>
                                </tr>
                                <tr>
                                    <th class="info">الحالة</th>
                                    <td><?php echo $arr_type[$BeneficiaryDetails['approved']];?></td>
                                    <th class="info">إسم صاحب الحساب البنكي</th>
                                    <td><?php echo $BeneficiaryDetails['bank_account_name'];?></td>
                                </tr>
                                <tr>
                                    <th class="info">رقم هوية صاحب الحساب البنكي</th>
                                    <td><?php   echo $BeneficiaryDetails['bank_account_card_id'];?></td>
                                    <th class="info">رقم الحساب</th>
                                    <td><?php  echo $BeneficiaryDetails['bank_account_num'];?></td>
                                </tr>
                                <tr>
                                    <th class="info">إسم البنك</th>
                                    <td><?php  if($bank_details[$BeneficiaryDetails['bank_id_fk']]){echo $bank_details[$BeneficiaryDetails['bank_id_fk']];}  ?></td>
                                </tr>
                                </tbody>
                            </table>
                        <?php } ?>


                        <?php if(!empty($records)){ ?>
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center">رقم الصرف</th>
                                    <th class="text-center">تاريخ الصرف</th>
                                    <th class="text-center">بند المساعدة</th>
                                    <th class="text-center">المبلغ المصروف</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php
                                $total=0;
                                $a=1; foreach ($records as $record ){
                                    $total +=$record->value;
                                    ?>
                                    <tr>
                                        <td><?php echo $a; ?></td>
                                        <td><?php echo $record->sarf_num_fk;?></td>
                                        <td><?php  if(!empty($record->details)){ echo date('Y-m-d',$record->details->cashing_date); } ?></td>
                                        <td><?php if(!empty($record->details)){echo $record->details->band_name; }?></td>
                                        <td> <?php echo $record->value ?></td>
                                    </tr>
                                    <?php  $a++; } ?>
                                <tr>
                                    <td colspan="4"> الإجمالي</td>
                                    <td><?php echo $total;?></td>
                                </tr>
                                </tbody>
                            </table>


                        <?php }else{ ?>


                            <div class="alert alert-danger col-sm-12">لا توجد مصروفات خاص بهذ المستفيد !!</div>

                        <?php } ?>
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
        "<html><head><title></title><style type='text/css'> @page{ margin: 10mm 0mm  ;}</style></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url('family_controllers/Exchange/Beneficiary_sarf_orders') ?>";
    }, 2000);
</script >


