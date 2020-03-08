<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>طباعة </title>
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
				border-top: 2px solid #000;
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
	        window.location = "<?=base_url('Volunteers/Volunteers')?>";
	    }
	</script>

	<?php
	$dayes = array('السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة');
    $period = array('الصباح','المساء');
    $answer = array(1=>'نعم',2=>'لا');
	?>

	<body id="printdiv" onload="return printDiv('printdiv')">
		<div class="header col-xs-12 no-padding">
			<div class="col-xs-6 text-center">
				<p>المملكة العربية السعودية</p>
				<p>الجمعية الخيرية لرعاية المعاقين بحائل (هدكا)</p>
				<p>مسجلة برقم (605)</p>
				<p>تحت إشراف وزارة الشئون الإجتماعية </p>
			</div>
			<div class="col-xs-6 text-center">
				<img src="<?=base_url()?>asisst/fav/logo.png">
			</div>
		</div>
		<h5 class="text-center"> <strong>نموذج تسجيل متطوع / هـ</strong></h5><br>
		<section class="main-body">
			<div class="container">
				<p style="text-align: left">نموذج رقم : 04</p>
				<div class="print_forma col-xs-12 no-padding">
					<div class="personality">
						<h5 class="text-center heading">البيانات الشخصية </h5>
						<div class="col-xs-6">
							<p><strong>الإسم :</strong> <?=$volunteer['name']?></p>
							<p><strong>العنوان :</strong> <?=$volunteer['address']?></p>
							<p><strong>المهمه :</strong> <?=$volunteer['job']?></p>
						</div>
						<div class="col-xs-6">
							<p><strong>تاريخ الميلاد :</strong> <?=$volunteer['birth_date']?></p>
							<p><strong>الهاتف أو الجوال :</strong> <?=$volunteer['mobile']?></p>
							<p><strong>البريد الإلكترونى :</strong> <?=$volunteer['email']?></p>
						</div>
						<div class="col-xs-12"><hr></div>
					</div>
					<div class="fields col-xs-12 no-padding">
						<h5 class="text-center heading">المجالات والبرامج المطلوب التطوع بها </h5>
						<?php
	                    $allFields = unserialize($volunteer['fields']);
	                    if(isset($fields) && $fields != null) {
	                        foreach ($fields as $field) {
	                          	$checked = '';
	                          	if(in_array($field->id,$allFields)) {
	                            	$checked = 'checked';
	                          	}
                         ?>
						<div class="col-xs-3">
							<label class="checkbox-statement">
								<input type="checkbox" disabled <?=$checked?> class="myinput large"><span><?=$field->title?></span>
							</label>
						</div>
						<?php
                            }
                        }
                        ?>
						<div class="col-xs-12"><hr></div>

					</div>
					<div class="reasons col-xs-12 no-padding">
						<h5 class="text-center heading">ماهو سبب الرغبة بالتطوع لدى الجمعية</h5>
						<?php
                        $allReasons = unserialize($volunteer['reasons']);
                        if(isset($reasons) && $reasons != null) {
                            foreach ($reasons as $reason) {
                              	$checked = '';
                              	if(in_array($reason->id,$allReasons)) {
                                	$checked = 'checked';
                              	}
                        ?>
						<div class="col-xs-3">
							<label class="checkbox-statement">
								<input type="checkbox" disabled <?=$checked?> class="myinput large"><span><?=$reason->title?></span>
							</label>
						</div>
						<?php
                            }
                        }
                        ?>
						<div class="col-xs-12"><hr></div>
					</div>
					<div class="days col-xs-12 no-padding">
						<h5 class="text-center heading">الأيام والفترات التى أستطيع أن أتطوع بها</h5>
						<div class="col-xs-2">
							<label>الأيام:</label>
						</div>
						<?php
                        $allDayes = unserialize($volunteer['dayes']);
                        foreach ($dayes as $key => $day) {
                            $checked = '';
                            if(in_array($key,$allDayes)) {
                                $checked = 'checked';
                            }
                        ?>
						<div class="col-xs-1">
							<label class="checkbox-statement">
								<input type="checkbox" disabled <?=$checked?> class="myinput large"><span><?=$day?> </span>
							</label>
						</div>
						<?php } ?>
						<div class="clearfix"></div>
						<div class="col-xs-2">
							<label>الفترات:</label>
						</div>
						<?php
                        $allPeriods = unserialize($volunteer['period']);
                        foreach ($period as $key => $per) {
                            $checked = '';
                            if(in_array($key,$allPeriods)) {
                                $checked = 'checked';
                            }
                        ?>
						<div class="col-xs-1">
							<label class="checkbox-statement">
								<input type="checkbox" disabled <?=$checked?> class="myinput large"><span><?=$per?></span>
							</label>
						</div>
						<?php } ?>
						<div class="col-xs-12"><hr></div>
					</div>
					<div class="days col-xs-12 ">
						<p>هل سبق لك التطوع لدى جهه خيرية ؟ <?=$answer[$volunteer['another_charity']]?> إذا كانت الإجابة بنعم الرجاء تحديد الجهه <?=$volunteer['charity']?></p>
						<p>هل لديك إعاقة ؟ <?=$answer[$volunteer['having_disability']]?> إذا كانت الإجابة بنعم الرجاء تحديد نوع الإعاقة <?=$volunteer['disability']?></p>
						<hr>
					</div>
					<div class="special col-xs-12 ">
						<h5 class="text-center heading">خاص بالجمعية</h5>
						<div class="col-xs-6">
							<label>السادة /                   </label>
						</div>
						<div class="col-xs-6">
							<p>للإفادة إذا كانت هناك الحاجة لقبول المتطوع / هـ لديكم</p>
						</div>
						<label>المبررات :</label>
						<p>.......................................</p>
					</div>
					<div class="special col-xs-12 ">
						<div class="col-xs-6">
							<label>التوقيع /                   </label>
						</div>
						<div class="col-xs-6 text-center">
							<label>إعتماد الأمين العام</label>
							<p>وليد بن محمد البكر</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript" src="<?=base_url().'asisst/admin_asset/'?>js/jquery-1.10.1.min.js"></script>
		<script src="<?=base_url().'asisst/admin_asset/'?>js/bootstrap-arabic.min.js"></script>
		<script src="<?=base_url().'asisst/admin_asset/'?>js/custom.js"></script>
	</body>
</html>