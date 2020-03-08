<style>
    .r-content {
        border: 2px solid #000;
        border-radius: 15px;
        margin-top: 26px;
        padding-bottom: 20px;
    }
    
    .title {
        border: 2px solid #000;
        border-radius: 15px;
        position: absolute;
        top: -39px;
        left: 42%;
        background-color: #fff;
    }

</style>

<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;

        window.location = "<?php  echo base_url('Programs_depart/add_Payment_of_contributions'); ?>";

    }
</script>

<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
<body onload="return printDiv('printdiv')" id="printdiv">
    <?php $pay_method = array('إختر','نقدي','شيك','حوالة بنكية','إستقطاع','بنك'); ?>
    <div class="r-head col-xs-12">
        <div class="container">
            <div class="col-xs-12">
                <div class="col-xs-4" style="padding-top: 30px">
                    <h3 class="text-center"><strong>  الجمعية الخيرية لرعاية الايتام </strong><br> بحائل</h3>
                </div>
                <div class="col-xs-4">
                    <img src="<?=base_url().'/asisst/admin_asset/img/unnamed.png'?>" alt="" width="100%" height="100px">
                </div>
                <div class="col-xs-4" style="padding-top: 30px">
                    <h4 class="text-center"> التاريخ ....... / ...... / ..143 هــ</h4>
                    <h4 class="text-center"> التاريخ <?=date("Y/m/d",$all_records[0]->date)?> م</h4>
                </div>
            </div>
            <div class="col-xs-12 r-content">
                <div class="col-xs-12">
                    <div class="col-xs-5"></div>
                    <div class="col-xs-2 title" style="float: left;">
                        <h3 class="text-center" style="margin: 5px"> سـنـد قـبـض</h3>
                        <hr width=90% style="  border-color: #000; margin: 0 auto;">
                        <h4 class="text-center" style="margin: 5px"> Receipt Voucher </h4>
                    </div>
                    <div class="col-xs-5"></div>
                </div>
                <div class="col-xs-12" style="margin-top: 15px;">
                    <div class="form-group" style="display: inline-block">
                        <label class="text-center center-block"> هللة</label>
                        <input readonly style="width: 40px; border: 1px solid #000">
                    </div>
                    <div class="form-group" style="display: inline-block">
                        <label class="text-center  center-block"> ريال</label>
                        <input class="text-center" value="<?=($all_records[0]->value+$all_records[0]->value_added) ?>" readonly style="width: 80px; border: 1px solid #000">
                    </div>
                </div>
                <div class="col-xs-12">
                    <h4 class="pull-left">استلمنا من المكرم <span> <?=$all_records[0]->user_name?> </span></h4>
                    <h4 class="pull-right"><span> ..................... </span> .Received from Mr </h4>
                </div>
                <div class="col-xs-12">
                    <h4 class="pull-left"> مبلغ وقدره <span> <?php echo $all_records[0]->value+$all_records[0]->value_added."&nbsp; ".$tools->convert_number($all_records[0]->value+$all_records[0]->value_added)." ريال فقط لا غير  "?> </span></h4>
                    <h4 class="pull-right"><span> ..................... </span> . The Sum of </h4>
                </div>
                <div class="col-xs-12">
                    <h4 class="pull-left"> وذلك عن <span> <?php  ?> </span></h4>
                    <h4 class="pull-right"><span> ..................... </span> .Begin </h4>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-3" style="padding: 0;">
                        <h4 class="pull-left"> نقدا / شيك رقم: <span> <?=$pay_method[$all_records[0]->pay_method_id_fk]?> </span></h4>
                    </div>
                    <div class="col-xs-3">
                        <h4> علي بنك <span> <?php if($all_records[0]->bank_id != 0) echo $banks[$all_records[0]->bank_id]->bank_name; else echo '.....................' ?> </span></h4>
                    </div>
                    <div class="col-xs-3">
                        <h4> تاريخه <span> ..................... </span></h4>
                    </div>
                    <h4 class="pull-right"><span> ..................... </span> .Chsh / Cheque No </h4>
                </div>
                <div class="col-xs-12">
                    <p>لذا جري التوقيع</p>
                    <div class="col-xs-4">
                        <h4 class="text-center">المستلم</h4>
                        <h4 class="text-center">Received</h4>
                        <h4 class="text-center">.......................</h4>
                    </div>
                    <div class="col-xs-4">
                        <h4 class="text-center">المحاسب</h4>
                        <h4 class="text-center">Accountant</h4>
                        <h4 class="text-center">........................</h4>
                    </div>
                    <div class="col-xs-4">
                        <h4 class="text-center">المدير</h4>
                        <h4 class="text-center">Manager</h4>
                        <h4 class="text-center">.........................</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>