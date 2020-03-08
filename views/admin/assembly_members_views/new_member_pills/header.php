<!DOCTYPE html>
<html lang="en">
    <head> 
   <link href="<?php echo base_url()?>asisst/layout/bootstrap-arabic.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/screen.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/strap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/strap-select.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/strap-toggle.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/bootstrap-formhelpers.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/checkBo.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/layout.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/content.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>asisst/layout/style_admin.css" rel="stylesheet" type="text/css">

    <style>
        .no-padding {
            padding-right: 0px;
        }
        .r-connect {
            background-color: #fff;
            padding: 5px 0;
            border: 1px solid #555;
            border-radius: 15px;
           /*margin-bottom: 20px;*/
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
			<img src="<?=base_url().'asisst/img/logo.png'?>" alt="" width="100%" height="140px">
			<h3 class="text-center"><strong> سنتر النعماني </strong> </h3>
			<br>
		</div>
		<div class="col-xs-5">
			<ul class="list-unstyled header_ul">
				<li>سند رقم:<?=$Voucher['id']?> </li>
				<li>التاريخ : <?=date("Y/m/d",$Voucher['date'])?></li>
			</ul>
		</div>
	</div>

	<hr width="90%">