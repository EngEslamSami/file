<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/bootstrap-arabic-theme.min.css" />
	<link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/bootstrap-arabic.min.css" />
	<link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/style.css">

	<style type="text/css">
	.print_forma{
		border:1px solid ;
		padding: 15px;
	}
	.print_forma table th{
		text-align: center;
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
		width: 50%;
		min-height: 20px
	}
</style>
</head>
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
        window.location = "<?=base_url('disability_managers/Disabilty_confirm/confirm/'.$type.'')?>";
    }
</script>

<body id="printdiv" onload="return printDiv('printdiv')">
	<div class="header col-xs-12 no-padding">
		<div class="col-xs-6 text-center">
			<p>المملكة العربية السعودية</p>
			<p>الجمعية الخيرية لرعاية المعاقين بحائل (هدكا)</p>
			<p>مسجلة برقم (605)</p>
			<p>تحت إشراف وزارة الشئون الإجتماعية </p>
		</div>
		<div class="col-xs-6 text-center">
			<img src="<?=base_url().'asisst/web_asset/'?>img/logo.png">
		</div>
	</div>
	<div class="col-xs-12 Title">
		<h5 class="text-center"><br><br> <strong>برنامج الأجهزة التعويضية</strong></h5><br>
	</div>

	<section class="main-body">
		<div class="container">
			<div class="print_forma no-border col-xs-12 no-padding">
				<div class="personality">
					<h5 class="text-center ">تعميد صرف </h5>
					<br>
					<div class="col-xs-6">
						<p><strong>التاريخ :</strong> <?=date("Y-m-d")?> </p>
					</div>

					<div class="col-xs-6">
						<p><strong>رقم الطلب :</strong> <?=$this->uri->segment(4)?></p>
					</div>

					<div class="col-xs-12">
						<br><br>
						<p><strong>السادة /   <?php echo $devices[0]->company_name?> المحترمين &nbsp &nbsp </strong> تحية طيبة وبعد : </p>
						<p>نأمل التكرم بصرف الأجهزة الموضحة أدناه حسب التعميد الموجه لكم وإعادة النموذج لنا مع المطالبة المالية <br><br></p>
					</div>

					<div class="col-xs-12">
						<table class="table table-bordered table-devices">
							<tbody>
								<tr>
									<td>الإسم / <?=$devices[0]->p_name?></td>
									<td>رقم المستفيد / <?=$devices[0]->p_num?></td>
								</tr>
								<tr>
									<td>تاريخ الميلاد / <?=$devices[0]->p_date_birth?></td>
									<td>رقم الجوال / <?=$devices[0]->contact_phone?></td>
								</tr>
								<tr>
									<td ><b>الأجهزة المطلوبة</b></td>
									<td ><b>عدد الأجهزة المطلوبة</b></td>
								</tr>
								<?php foreach ($devices as $value) { ?>
								<tr>
									<td><?=$value->title?></td>
									<td><?=$value->amount_device?></td>
								</tr>
								<? } ?>
							</tbody>
						</table>
						<br><br>
						<p>إسم وتوقيع المستلم / .................</p>
						<p>رقم الجوال / .................</p>
					</div>
				</div>
				<div class="special col-xs-12 ">
					<br><br>
					<div class="col-xs-4 text-center">
						<label> المدير المالى </label><br><br>
						<p>عثمان بن عمر المشعلى</p><br>
					</div>
					<div class="col-xs-4 text-center">

					</div>
					<div class="col-xs-4 text-center">

						<label> المدير التنفيذى </label><br><br>
						<p>وليد بن محمد البكر</p><br>
					</div>
					<br><br>
				</div>
			</div>
		</div>
	</section>

	<script type="text/javascript" src="<?=base_url().'asisst/admin_asset/'?>js/jquery-1.10.1.min.js"></script>
	<script src="<?=base_url().'asisst/admin_asset/'?>js/bootstrap-arabic.min.js"></script>
	<script src="<?=base_url().'asisst/admin_asset/'?>js/custom.js"></script>

</body>
</html>
