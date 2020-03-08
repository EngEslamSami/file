<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
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

<body onload="return printDiv('printdiv')" id="printdiv">
<!-- body -->
    <div class="r-head col-xs-12">
        <div class="container">
            <div class="col-xs-12">
                <div class="col-xs-4" style="padding-top: 30px">
                    <h3 class="text-center"><strong>  الجمعية الخيرية لرعاية الايتام </strong><br> بحائل</h3>
                </div>
                <div class="col-xs-4">
                    <img  src="<?php echo base_url()?>asisst/admin_asset/img/unnamed.png" alt="" width="100%" height="100px">
                </div>
                <div class="col-xs-4" style="padding-top: 30px">
                    <h4 class="text-center"> التاريخ ....... / ...... / ..143 هــ</h4>
                    <h4 class="text-center"> التاريخ <?php echo date('Y/m/d',$result[0]->date);?> م</h4>
                </div>
            </div>
            <div class="col-xs-12 r-content">
                <div class="col-xs-12">
                    <div class="col-xs-5"></div>
                    <div class="col-xs-2 title">
                        <h3 class="text-center" style="margin: 5px"> سـنـد قـبـض</h3>
                        <hr width=90% style="  border-color: #000; margin: 0 auto;">
                        <h4 class="text-center" style="margin: 5px"> Receipt Voucher </h4>
                    </div>
                    <div class="col-xs-5"></div>
                </div>
                <div class="col-xs-12" style="margin-top: 15px;">
                    <div class="form-group" style="display: inline-block">
                        <label class="text-center center-block"> هللة</label>
                        <input style="width: 40px; border: 1px solid #000" disabled>
                    </div>
                    <div class="form-group" style="display: inline-block">
                        <label class="text-center  center-block"> ريال</label>
                        <input style="width: 80px; border: 1px solid #000" value="<?php echo $result[0]->value?>" disabled>
                    </div>
                </div>
                <div class="col-xs-12">
                
                                  <?php
                                   $name='';
                                    if ($result[0]->donate_type_id_fk ==1){
                                      
                                        $name=$get_name[$result[0]->person_id]->user_name;
                                    }elseif($result[0]->donate_type_id_fk ==2){
                                       
                                        $name=$result[0]->name;
                                    }elseif($result[0]->donate_type_id_fk ==3){
                                       
                                        $name=$get_name[$result[0]->person_id]->user_name;
                                    }
                                    ?>
                    <h4 class="pull-left">استلمنا من المكرم <span><?php echo $name ;?> </span></h4>
                    <h4 class="pull-right"><span> <?php echo $name ;?> </span> .Received from Mr </h4>
                </div>
                <div class="col-xs-12">
                    <h4 class="pull-left"> مبلغ وقدره <span> <?php  echo $result[0]->value."&nbsp; ".$tools->convert_number($result[0]->value)." ريال فقط لا غير ";?> </span></h4>
                    <h4 class="pull-right"><span> <?php  echo $result[0]->value;?> </span> . The Sum of </h4>
                </div>
                <div class="col-xs-12">
                    <h4 class="pull-left"> وذلك عن <span> <?php  echo $result[0]->detail;?></span></h4>
                    <h4 class="pull-right"><span> <?php  echo $result[0]->detail;?> </span> .Begin </h4>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-3" style="padding: 0;">
                    
                                  <?php
                                   $paid='';
                                   $account_num= "";
                                    if ($result[0]->paid_type ==1){
                                        $paid="نقدي";
                                          $account_num= "................";
                                    }elseif($result[0]->paid_type ==2){
                                        $paid="شيك";
                                          $account_num= $result[0]->account_num;
                                    }elseif($result[0]->paid_type ==3){
                                        $paid="حوالة بنكية";
                                        $account_num= $result[0]->account_num;
                                    }elseif($result[0]->paid_type ==4){
                                       $paid="إستقطاع";
                                       $account_num= $result[0]->account_num;
                                    }elseif($result[0]->paid_type ==5){
                                       $paid="بنك";
                                       $account_num= $result[0]->account_num;
                                    }
                                    if($result[0]->paid_type ==1){
                                     $bank_name="................";
                                     $date='................';
                                    }else{
                                         $bank_name = $banks[$result[0]->bank_id_fk]->bank_name ; 
                                       $date=  date('Y/m/d',$result[0]->date) ;
                                    }
                                    ?>
                    
                    
                        <h4 class="pull-left">  <?php echo $paid;?> رقم: <span> <?php echo $account_num ;?> </span></h4>
                    </div>
                    <div class="col-xs-3">
                        <h4> علي بنك <span> <?php echo $bank_name; ?> </span></h4>
                    </div>
                    <div class="col-xs-3">
                        <h4> تاريخه <span> <?php echo  $date; ?> </span></h4>
                    </div>
                    <h4 class="pull-right"><span> <?php echo $account_num ;?></span> .Chsh / Cheque No </h4>
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

        window.location = "<?php  echo base_url('Finance_resource/add_today_donations'); ?>";

    }
</script>