<!DOCTYPE html>
<html lang="en">
    <head>  
    <link href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/admin_asset/css/screen.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/admin_asset/css/strap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/admin_asset/css/strap-select.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/admin_asset/css/strap-toggle.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-formhelpers.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/admin_asset/css/checkBo.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/admin_asset/css/layout.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/admin_asset/css/content.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/admin_asset/css/style_admin.css" rel="stylesheet" type="text/css">
    <style>
    .no-padding {
        padding-right: 0px;
    }
    .r-connect {
        background-color: #fff;
        padding: 5px 0;
        border: 1px solid #555;
        border-radius: 15px;
    }
    .header_ul {
        text-align: right;
    }
    .header_ul li {
        padding: 10px;
        border: 1px solid #eee;
    }
    .r-form-padding {
        padding: 0;
    }
    .r-connect hr {
        border-top: 2px solid #333 !important;
    }
    .r-title-form-second {
        border: 1px solid #333;
        border-radius: 25px;
        padding: 7px 28px;
        line-height: 23px;
    }
    .border_box {
        padding: 10px;
        border: 1px solid #eee;
    }
    </style>
</head>
<?php for($x = 0 ; $x < 2 ;$x++){ ?>
<body onload="return printDiv('printdiv')" id="printdiv">
    <div class="col-xs-12 r-connect no-padding">
        <br>
        <div class="col-xs-12">
            <div class="col-xs-5">
                <ul class="list-unstyled header_ul">
                    <li>سنتر النعماني  </li>
                    <li> مجمع الماس الطبي  </li>
                </ul>
            </div>
            <div class="col-xs-2 r-form-padding">
                <img src="<?=base_url().'asisst/admin_asset/img/logo.png'?>" alt="" width="100%" height="140px">
                <h3 class="text-center"><strong> سنتر النعماني </strong> </h3>
                <br>
            </div>
            <div class="col-xs-5">
                <ul class="list-unstyled header_ul">
                    <li>سند رقم:<?=$voucher['id']?> </li>
                    <li>التاريخ : <?=date("Y/m/d",$voucher['date'])?></li>
                </ul>
            </div>
        </div>

        <hr width="90%">

        <?php if($x > 0){ ?>
        <div class="split">
            ==============================================================================================================================================================================================
        </div>
        <?php } ?>
        <div class="col-xs-12">
            <div class="col-xs-4"></div>
            <div class="col-xs-4 r-title-form-second">
                <h6 class="text-center"> سند قبض مورد </h6>
                <h6 class="text-center">Receipt Voucher</h6>
            </div>
            <div class="col-xs-4"></div>
        </div>

        <div class="col-xs-12 col-xs-offset-2 col-lg-10 col-lg-offset-2">
            <div class="col-xs-4 no-padding text-center">
                <h5 class="border_box">
                    المبلغ : <?=$voucher['paid']?>
                </h5>
            </div>
            <div class="col-xs-4 no-padding text-center">
                <h5 class="border_box">
                    الضريبة : 0
                </h5>
            </div>
        </div>

        <div class="col-xs-12">
            <br>
            <h6>استلمنا من المكرم /  <?=$voucher['name']?> </h6>
        </div>

        <div class="col-xs-12">
            <div class="col-xs-6 no-padding">
                <h6>مبلغاَ وقدره /<?=$voucher['paid']?> جنية مصري فقط لاغير  </h6>
            </div>
            <div class="col-xs-6 no-padding">
                <h6> متبقى / <?=$voucher['remain']?></h6>
            </div>
        </div>

        <div class="col-xs-12">
            <h6> طريقة السداد / نقدي  </h6>
        </div>

        <div class="col-xs-12">                     
            <h6> وذلك عن  / </h6>
        </div>

        <div class="col-xs-12">
            <br>
            <div class="col-xs-4">
                <h6> المستلم / <?=$_SESSION['user_name']?> </h6>
            </div>

            <div class="col-xs-4">
                <h6> المحاسب /  <?=$_SESSION['user_name']?> </h6>
            </div>
            <div class="col-xs-4 text-center">
                <h6> التوقيع والختم /  ......</h6>
                <br>
            </div>
        </div>


        <hr width="90%">
        <div class="col-xs-12">
            <h6 class="text-center">
                حائل - 
                حي المنتزه الشرقي - 
                شارع الأمير نايف بن عبدالعزيز - 
                016-5351010 - 
                0556766698 




            </h6>
            <br>
        </div>
    </div>
</body>
</html>
<?php } ?>

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

        window.location = "<?php echo base_url('Storage/Supplier_vouchers'); ?>";

    }
</script>