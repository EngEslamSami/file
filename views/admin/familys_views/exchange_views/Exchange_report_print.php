
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
        .page-break	{ display: block; page-break-before: always; }
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
        <div class="container">
            <div class="print_forma no-border col-xs-12 no-padding">
                <div class="personality">
                    <div class="col-xs-12 no-padding">
                        <?php if(!empty($records)){ ?>
                            <?php $arr_type =array('غير نشط',' نشط'); ?>

                            <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                                <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                    <th class="text-center">رقم الملف </th>
                                    <th class="text-center">إسم مسئول الحساب البنكي</th>
                                    <th class="text-center">رقم الهوية  </th>
                                    <th class="text-center">إسم البنك</th>
                                    <th class="text-center">رقم الحساب </th>
                                    <th class="text-center">أرملة </th>
                                    <th class="text-center">يتيم </th>
                                    <th class="text-center">مستفيد </th>
                                    <th class="text-center">عدد الافراد </th>
                                    <th class="text-center">إجمالى المبلغ</th>
                                    <th class="text-center">الحالة</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php
                                $x=1;
                                $total_armal=0;
                                $total_yatem=0;
                                $total_mostafed=0;
                                $total_all=0;
                                $total_value=0;
                                foreach ($records as $record ){
                                $total_armal +=$record->armal;
                                $total_yatem +=$record->yatem;
                                $total_mostafed +=$record->mostafed;
                                $total_all +=$record->mostafed + $record->armal + $record->yatem;
                                $total_value += $record->value;
                                ?>
                                <tr>
                                    <td><?php echo $x++ ?></td>
                                    <td><?php echo $record->file_num; ?></td>
                                   <td><?php echo $record->bank_account_name; ?></td>
                                  <td><?php echo $record->bank_account_card_id; ?></td>
                                    <td><?php echo $record->bank_name; ?></td>
                                    <td><?php echo $record->bank_account_num; ?></td>
                                    <td><?php echo $record->armal; ?></td>
                                    <td><?php echo $record->yatem; ?></td>
                                    <td><?php echo $record->mostafed; ?></td>
                                    <td><?php echo $record->mostafed+$record->armal+$record->yatem; ?></td>
                                    <td><?php echo $record->value; ?></td>
                                    <td><?php if(!empty($arr_type[$record->approved])){ echo $arr_type[$record->approved];} ?></td>
                                    <?php } ?>
                                <tr>
                                    <td colspan="6"> الإجمالي</td>
                                    <td><?=$total_armal?></td>
                                    <td><?=$total_yatem?></td>
                                    <td><?=$total_mostafed?></td>
                                    <td><?=$total_all?></td>
                                    <td><?=$total_value?></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        <?php }  ?>
                    </div>
                </div>
                <!--<div class="special col-xs-12 ">
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
                -->
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
        window.location.href ="<?php echo base_url('family_controllers/Exchange/Exchange_report') ?>";
    }, 2000);
</script >


