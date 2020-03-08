<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>framework</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">

	


	<style type="text/css">
		@import url(<?php echo base_url() ?>asisst/admin_asset/fonts/ht/HacenTunisia.css);
		@import url(<?php echo base_url() ?>asisst/admin_asset/fonts/hl/HacenLinerScreen.css);
		@import url(<?php echo base_url() ?>asisst/admin_asset/fonts/ge/ge.css);

		body {
			font-family: 'hl';

		}
		.main-body {

			background-image: url(<?php echo base_url() ?>asisst/admin_asset/img/pills/paper-bg.png);
			/*background-image: url(img/paper-bg.png);*/
			background-position: 100% 100%;
			background-size: 100% 100%;
			background-repeat: no-repeat;
			-webkit-print-color-adjust: exact !important;
			height: 295mm;

}
.print_forma {
	padding: 85px 0 50px 0;
	/*border:1px solid #73b300;*/

}
.piece-box {
	margin-bottom: 1px;
	border: 1px solid #000;
	display: inline-block;
	width: 100%;
}
.piece-heading {
	background-color: #eee;
	display: inline-block;
	float: right;
	width: 100%;
	padding: 3px;
	color: #000;
}
.piece-body {

	width: 100%;
	float: right;
}
.bordered-bottom{
	border-bottom: 1px solid #000;
}
.piece-footer{
	display: inline-block;
	float: right;
	width: 100%;
	border-top: 1px solid #000;
}
.piece-heading h5 {
	margin: 0px 0;
}
.piece-box table{
	margin-bottom: 0
}
.piece-box table th,
.piece-box table td
{
	padding: 2px 8px !important;
}

h6 {
	font-size: 17px;
	margin-bottom: 3px;
	margin-top: 3px;
}
.print_forma table th{
	text-align: right;
}
.print_forma table tr th{
	vertical-align: middle;	
}
.no-padding{
	padding: 0;
}
.header p{
	margin: 0;
}
.header img{
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

.print_forma hr{
	border-top: 1px solid #000;
	margin-top: 7px;
	margin-bottom: 7px;
}

.no-border{
	border:0 !important;
}

.gray_background{
	background-color: #eee;

}
.graytd th,.graytd td{
	background-color: #eee;
}
@media print{
	.footer {
		position: fixed;
		bottom: 0;
		width: 100%;
	}
}
.footer img{
	width: 100%;
	height: 120px;
}
@page {
	size: A4;
	margin: 20px 0 0;
}

.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, 
.table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, 
.table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
	border: 1px solid #000;
	font-size: 17px;
}
.under-line{
	border-top: 1px solid #000;
	padding-left: 0;
	padding-right: 0;
}
span.valu {
	padding-right: 10px;
	font-weight: 600;
	font-family: sans-serif;
}

.under-line .col-xs-3 ,
.under-line .col-xs-4,
.under-line .col-xs-5 ,
.under-line .col-xs-6 ,
.under-line .col-xs-8 
{
	border-left: 1px solid #000;
}

.green-border span {
	border: 6px double #000;
	padding: 4px 25px;
	border-radius: 10px;
	box-shadow: 2px 2px 5px 2px #000;
}
label.radio-inline{
	font-size: 17px;
}

.footer-info {
	position: absolute;
	width: 100%;
	bottom: 65px;
}


@media print {

	.table-bordered  th, .table-bordered  td {
		border: 1px solid #000 !important

	}

}


@page {
	size: 210mm 297mm  ;
	margin: 0;

}

</style>


</head>
<body onload="printDiv('printDiv')" id="printDiv">


	<section class="main-body">

		<div class="container-fluid">

			<div class="print_forma  col-xs-12 ">

				<div class="col-xs-12 no-padding">
					<div class="col-xs-3 text-center">

					</div>
					<div class="col-xs-5 text-center">
						<h4 class="green-border"><span> <?= $title ?></span></h4>
					</div>
					<div class="col-xs-4 text-center">

					</div>
				</div>


				<div class="piece-box"  style="margin-top: 20px">
					<div class="piece-heading">
					<div class="col-xs-4">
							<h5>البيانات الشخصية</h5>
						</div>
						<div class="col-xs-4">
							<h5>رقم الطلب /
                          
                            <?php if(isset($get_all)){ echo $get_all->id;}?>
                             </h5>
						</div>
						<div class="col-xs-4">
							<h5>رقم الهويه /<?php if(isset($get_all)){ echo $get_all->national_num;}?></h5>
						</div>
					</div>
					<div class="piece-body">
					
						<div class="col-xs-10 no-padding">
							<div class="col-xs-12 no-padding under-line">
								
								<div class="col-xs-4">
                                    <h6>الجنس/<?php if(isset($get_all)){  //$get_all->gender_id_fk;
                                    
                                    echo $gender_id_fk[0]->title_setting;}
                                    ?>
                                    </h6>
								</div>
								<div class="col-xs-3">
									<h6>الجنسية/
                                    <?php if(isset($get_all)){  
                                    
                                    echo $nationality_id_fk[0]->title_setting;}
                                    ?>
                                    </h6>
								</div>
							</div>
							<div class="col-xs-12 no-padding under-line ">
								<div class="col-xs-5">
									<h6>الأسم/<?php if(isset($get_all)){ echo $get_all->name;}?></h6>
								</div>
								<div class="col-xs-4">
									<h6>تاريخ الميلاد/<?php if(isset($get_all)){ 
									echo date("Y-m-d", strtotime($get_all->date_birth) );
									}?></h6>
								</div>
								<div class="col-xs-3">
									<h6>مكان الميلاد/<?php if(isset($get_all)){ echo $get_all->place_birth;}?></h6>
								</div>
							</div>
							<div class="col-xs-12 no-padding under-line ">
								<div class="col-xs-5">
									<h6>الحالة الإجتماعية/
                                    <?php if(isset($get_all)){  
                                    
                                    echo $social_status[0]->title_setting;}
                                    ?>
                                    </h6>
								</div>
								<div class="col-xs-4">
									<h6>المدينة/   <?php if(isset($get_all)){ echo $get_all->city;}?></h6>
								</div>
								<div class="col-xs-3">
									<h6>الحي/   <?php if(isset($get_all)){ echo $get_all->hai;}?></h6>
								</div>
							</div>
							<div class="col-xs-12 no-padding under-line ">
								<div class="col-xs-5">
									<h6>الوظيفة المتقدم إليها/<?php if(isset($get_all)){  
                                    
                                    echo $job_request_id_fk[0]->title_setting;}
                                    ?></h6>
								</div>
								<div class="col-xs-4">
									<h6>الجوال/<?php if(isset($get_all)){ echo $get_all->mob;}?>

                                    </h6>
								</div>
								<div class="col-xs-3">
									<h6>الإيميل/<?php if(isset($get_all)){ echo $get_all->email;}?> </h6>
								</div>
							</div>
						</div>
						<div class="col-xs-2">
							<img src="<?=base_url()?>/uploads/human_resource/job_request/<?php echo $get_all->personal_photo ?>"style="    height: 96px;">
						</div>

					</div>

				</div>

				<div class="piece-box">
					<div class="piece-body bordered-bottom" >
						<div class="col-xs-12">
							<div class="col-xs-3 no-padding">
								<h6>طريقة الوصول إلينا</h6>
							</div>
                            
                          
							<div class="col-xs-2">
								<h6> (<?php if(isset($get_all)){  
                                    
                                    echo $method_reached[0]->title_setting;}
                                    ?>) </h6>
							</div>
							
							
							
							
						</div>
					</div>
				</div>

				<div class="piece-box" style="margin-bottom: 0">
					<div class="piece-body bordered-bottom" >
						<div class="col-xs-12">
							<div class="col-xs-6 no-padding">
								<h6>هل سبق وأن تقدمت بطلب توظيف لدى الجمعية ؟</h6>
							</div>
							<div class="col-xs-3">
								<label class="radio-inline">
									<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="<?php echo $get_all->previous_request?>"
                                    <?php if ($get_all->previous_request == 1) echo 'checked'; ?> <?php if ($get_all->previous_request == 2) echo 'disabled'; ?>
                                    > نعم
								</label>
								<label class="radio-inline">
									<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="<?php echo $get_all->previous_request?>"
                                    <?php if ($get_all->previous_request == 2) echo 'checked'; ?> <?php if ($get_all->previous_request == 1) echo 'disabled'; ?>
                                 
                                    > لا
								</label>
							</div>
							<div class="col-xs-3">
								<h6>التاريخ :  <?php if ($get_all->previous_request == 1) {
									echo date("Y-m-d", strtotime($get_all->previous_request_date_m) );
								}else {echo '';} ?></h6>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-7 no-padding">
								<h6>هل يعمل أحد من أصدقائك أو معارفك أو أقربائك في الجمعية ؟</h6>
							</div>
							<div class="col-xs-2">
								<label class="radio-inline">
									<input type="radio" name="inlineRadioOptions1" id="inlineRadio3" value="<?php echo $get_all->know_person_in_charity?>"
                                    <?php if ($get_all->know_person_in_charity == 1) echo 'checked'; ?> <?php if ($get_all->know_person_in_charity == 2) echo 'disabled'; ?>
                                    > نعم
								</label>
								<label class="radio-inline">
									<input type="radio" name="inlineRadioOptions1" id="inlineRadio4" value="<?php echo $get_all->know_person_in_charity?>"
                                    <?php if ($get_all->know_person_in_charity == 2) echo 'checked'; ?> <?php if ($get_all->know_person_in_charity == 1) echo 'disabled'; ?>
                                  
                                    > لا
								</label>
							</div>
							<div class="col-xs-3">
								<h6>أسمائهم  :<?php if ($get_all->know_person_in_charity == 1) {echo $get_all->persons_names;}else {echo '';} ?></h6>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-4 no-padding">
								<h6>هل تعمل حاليا ؟</h6>
							</div>
							<div class="col-xs-3">
								<label class="radio-inline">
									<input type="radio" name="inlineRadioOptions2" id="inlineRadio5" value="<?php echo $get_all->work_now?>"
                                    <?php if ($get_all->work_now == 1) echo 'checked'; ?> <?php if ($get_all->work_now == 2) echo 'disabled'; ?>
                               
                                    > نعم
								</label>
								<label class="radio-inline">
									<input type="radio" name="inlineRadioOptions2" id="inlineRadio6" value="<?php echo $get_all->work_now?>"
                                    <?php if ($get_all->work_now == 2) echo 'checked'; ?> <?php if ($get_all->work_now == 1) echo 'disabled'; ?>
                               
                                    > لا
								</label>
							</div>
							
						</div>
						<div class="col-xs-12">
							<h6>متى تستطيع مباشرة العمل ؟ <?php if(isset($get_all)){ 
							echo date("Y-m-d", strtotime($get_all->date_start_work_m) );
								 }?></h6>
						</div>
					</div>
				</div>


				<div class="piece-box">
					<div class="piece-heading">
						<h5>الأعمال التي سبق العمل بها</h5>
					</div>
					<div class="piece-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>الشركة/صاحب العمل </th>
									<th> من الفتره </th>
									<th> الي الفتره </th>
									<th>المسمى الوظيفي </th>
									<th>المهام </th>
									<th>الراتب والبدلات </th>
									<th>سبب ترك العمل </th>
								</tr>
							</thead>
							<tbody>
								<tr>
				
									<td><?php if (isset($get_prv)){echo $get_prv->company_name;}?></td>
									<td><?php if (isset($get_prv)){echo $get_prv->date_from; }?></td>
										<td><?php if (isset($get_prv)){echo $get_prv->date_to; }?></td>
									<td><?php if (isset( $job_id_title_fk)){echo   $job_id_title_fk[0]->defined_title;}?></td>
									<td><?php if (isset($get_prv)){echo $get_prv->job_mission;}?></td>
									<td><?php if (isset($get_prv)){echo $get_prv->salary;}?></td>
									<td><?php if (isset($get_prv)){echo $get_prv->leave_work_reason;}?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="piece-box">
					<div class="piece-heading">
						<h5>المؤهلات العلمية</h5>
					</div>
					<div class="piece-body">
						<table class="table table-bordered">
							<thead>

								<tr class="">
									<th>الدرجة العلمية  </th>
									<th>المؤهل العلمي </th>
									<th>المدرسه/الجامعة</th>
									<th>التخصص</th>
									<th>مدة الدراسة/العام</th>
									<th>التقدير</th>
								</tr>
							</thead>
							<tbody>
								<tr class="">
									<td><?php if (isset($get_qua)){   echo $degree_id_fk[0]->title_setting;}?></td>
									<td><?php if (isset($get_qua)){echo $qualification_id_fk[0]->title_setting;}?></td>
									<td><?php if (isset($get_qua)){echo $get_qua->school;}?></td>
									<td><?php if (isset($get_qua)){echo $get_qua->specialied;}?></td>
									<td><?php if (isset($get_qua)){echo $get_qua->year;}?></td>
									<td><?php if (isset($get_qua)){echo $get_qua->taqder;}?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="piece-box">
					<div class="piece-heading">
						<h5>الدورات التدريبية</h5>
					</div>
					<div class="piece-body">
						<table class="table table-bordered">
							<thead>

								<tr class="">
									<th>الدروة  </th>
									<th>الجهة </th>
									<th>الفترة</th>
									<th>التخصص</th>
						
								</tr>
							</thead>
							<tbody>
								<tr class="">
									<td><?php if (isset($get_dwrat)){   echo $get_dwrat->dawra;}?></td>
									<td><?php if (isset($get_dwrat)){   echo $get_dwrat->place;}?></td>
									<td><?php if (isset($get_dwrat)){   echo $get_dwrat->date_from;}?>:<?php if (isset($get_dwrat)){   echo $get_dwrat->date_to;}?></td>
									<td><?php if (isset($get_dwrat)){   echo $get_dwrat->specialized;}?></td>
								
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="piece-box">
					<div class="piece-heading">
						<h5>هوايات ومهارات</h5>
					</div>
					<div class="piece-body">
						<table class="table table-bordered">
                             <thead>
                             	<tr>
                             		<th style="width: 80px;">الاسم</th>
                             		<th>تفاصيل</th>
                             		<th style="width: 100px;">الكفاءة</th>
                          
                             	</tr>
                             </thead>
							<tbody>
								
								<tr class="">
									<td><?php if (isset($get_skills)){   echo $get_skills->name;}?></td>
									<td><?php if (isset($get_skills)){   echo $get_skills->details;}?></td>
									<td><?php if (isset($get_skills)){   echo $efficiency_id_fk[0]->title_setting;}?></td>
								
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>

				<div class="piece-box no-border">
					<div class="piece-heading">
						<h5>المعرفون</h5>
					</div>
					<div class="piece-body">
						<table class="table table-bordered">
							<thead>
								<tr class="">
									<td>الاسم</td>
									<td>الوظيفة</td>
									<td>جهة العمل</td>
									<td style="width: 100px;">الجوال</td>
								</tr>
							</thead>
							<tbody>

								<tr class="">
								
									<td><?php if (isset($get_person)){   echo $get_person->job;}?></td>
									<td><?php if (isset($get_person)){   echo $get_person->job_name;}?></td>
									<td><?php if (isset($get_person)){   echo $get_person->job_place;}?></td>
									<td><?php if (isset($get_person)){   echo $get_person->mob;}?></td>
								</tr>
							</tbody>
						</table>
						<p style="margin-bottom: 2px">      أقر أنا الموقع أدناه بأن كافة المعلومات الواردة في هذا الطلب هي صحيحة وكاملة وأني مسئول عنها مسؤولية تامة. كما وأنه ليس لدي مانع من أن تقوم الجمعية بالتحقق والبحث  بصحة هذه المعلومات في حال إذا ارتأت بأن ذلك سيساعدها على اتخاذ القرار الأمثل للتوظيف . </p>
						<p style="margin-bottom: 2px">إذا اتضح عدم صحة هذه المعلومات بعد التوظيف أكون عرضة للجزاء بمقتضى اللوائح والأنظمة المعمول بها. </p>
					</div>
				</div>

				<div class="piece-box">
					<table class="table table-bordered">
						<tbody>
							<tr class="">
								<td>اسم مقدم الطلب:<?php if(isset($get_all)){ echo $get_all->name;}?></td>
								<td>التوقيع:<?php if(isset($get_all)){ echo $get_all->name;}?></td>
								<td>رقم الهويه:<?php if(isset($get_all)){ echo $get_all->national_num;}?></td>
							</tr>
						</tbody>
					</table>
				</div>


				<div class="piece-box" style="    margin-top: 26px;">

<div class="col-xs-12 no-padding print-details-footer">
   <div class="col-xs-6">
	   <p class=" text-center" style="margin-bottom: 0;">
		   <small> (بواسطة: <?php echo $publisher_name; ?> )</small>
	   </p>

   </div>
   <div class="col-xs-2">
   </div>
   <div class="col-xs-4">

	   <p class=" text-center" style="margin-bottom: 0;">
		   <small>تاريخ الطباعة : <?php $date = date('Y-m-d'); echo $date;?></small>
	   </p>
   </div>


</div>

</div> 





			</div>
			
		</div>
		

		
	</section>













	<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
	<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
	<script src="<?php echo base_url() ?>asisst/admin_asset/js/custom.js"></script>
	<!-- <div class="footer-info"> -->

<!-- <div class="col-xs-12 no-padding print-details-footer">
	<div class="col-xs-6">
		<p class=" text-center" style="margin-bottom: 0;">
			<small> (بواسطة: نايف الحربي )</small>
		</p>

	</div>
	<div class="col-xs-2">
	</div>
	<div class="col-xs-4">

		<p class=" text-center" style="margin-bottom: 0;">
			<small>تاريخ الطباعة : 20/5/2019</small>
		</p>
	</div>


</div>

</div> -->
</body>
</html>
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
        window.close();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script> 