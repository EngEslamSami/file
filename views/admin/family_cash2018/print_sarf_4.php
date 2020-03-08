

	<title>framework</title>
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">

	


	<style type="text/css">
	.print_forma{
		/*border:1px solid #73b300;*/
		padding: 15px;
	}
	.piece-box {
		margin-bottom: 12px;
		border: 1px solid #73b300;
		display: inline-block;
		width: 100%;
	}
	.piece-heading {
		background-color: #9bbb59;
		display: inline-block;
		float: right;
		width: 100%;
	}
	.piece-body {
		
		width: 100%;
		float: right;
	}
	.bordered-bottom{
		border-bottom: 4px solid #9bbb59 !important;
	}
	.piece-footer{
		display: inline-block;
		float: right;
		width: 100%;
		border-top: 1px solid #73b300;
	}
	.piece-heading h5 {
		margin: 4px 0;
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
		font-size: 16px;
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
		height: 70px; 
		width: 80px;
		margin: auto;
	}
	.main-title {
		/* display: table; */
		text-align: center;
		/* position: relative; */
		height: 120px;
		/* width: 40%; */
	}
	.main-title h4 {
		/* display: table-cell; */
		/* vertical-align: bottom; */
		text-align: center;
		width: 100%;
		margin: 0
	}

	.print_forma hr{
		border-top: 1px solid #73b300;
		margin-top: 7px;
		margin-bottom: 7px;
	}
	
	.no-border{
		border:0 !important;
	}
	
	.gray_background{
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
		margin: 80px 0 0;
	}
	.open_green{
		background-color: #e6eed5;
	}
	.closed_green{
		background-color: #cdddac;
	}
	.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, 
	.table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, 
	.table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
		border: 1px solid #abc572;
		text-align: center;
		vertical-align: middle;
	}
</style>


</head>
<body id = "printdiv">

	<div class="header col-xs-12 no-padding">
		<div class="col-xs-4 text-center">
			<h5>الجمعية الخيرية لرعاية الأيتام ببريدة (أبـناء)</h5>
			<p>مسجلة بوزارة العمل والتنمية الإجتماعية<br> تصريح رقم 463</p>

		</div>
		<div class="col-xs-4 text-center">
			<div class="main-title">
				<img src="<?php echo base_url()?>uploads/images/2d1820ca1e3d8939cef0023a91b0bc0a.png" >
				<h4>أمر صرف</h4>
			</div>
		</div>
		<div class="col-xs-4 ">
			<h6>الإدارة /.............</h6>
			<h6>القسم / الرعاية الإجتماعية</h6>
		</div>
	</div>
	<div class="clearfix"></div>	<br>
	<section class="main-body">
  <?php $months = array("1" => "يناير","2" => "فبراير","3" => "مارس","4" => "أبريل","5" => "مايو",
                "6" => "يونيو","7" => "يوليو","8" => "أغسطس","9" => "سبتمبر","10" => "أكتوبر",
                "11" => "نوفمبر","12" => "ديسمبر"); ?>
		<div class="container">
			<div class="col-xs-12">
				<h5>
                بناءاَ على قرار لجنة الرعاية والمساعدات رقم (<?php echo $sarf_data["presence_number"]."/".$sarf_data["presence_year"] ?>) الرجاء الموافقة على <?=$sarf_data["title"]?>
                       
                       بطاقات الأسر البنكية لشهر 
                       <?php if (isset( $months[ $sarf_data["mon_melady"]])){ echo $months[ $sarf_data["mon_melady"]];}?>
                        2017م للأسماء الموضحة بيانتها بالكشف وهى كالتالى :- 
                
                </h5>
			</div>

			<div class="print_forma  col-xs-12 no-padding">
				<div class="piece-box no-border">
					<br>
					<table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">رقم الملف</th>
            <th class="text-center">إسم العائلة  </th>
            <th class="text-center">رقم الهوية </th>
            <th class="text-center">عدد الأفراد </th>
            <th class="text-center">أرملة </th>
            <th class="text-center">يتيم </th>
            <th class="text-center">مستفيد </th>
            <th class="text-center">إجمالى </th>
        </tr>
        </thead>
        <tbody class="text-center">
        <?php  $total =0;$x=1; foreach ($sarf_details as $row){
             $total += $row->value?>
        <tr>
            <td><?=$x++;?></td>
            <td><?=$row->file_num_basic?></td>
            <td><?=$row->mother_name?></td>
            <td><?=$row->mother_national_num_fk?></td>
            <td><?=($row->mother_num_in+$row->down_child+$row->up_child)?></td>
            <td><?=$row->mother_num_in?></td>
            <td><?=$row->down_child?></td>
            <td><?=$row->up_child?></td>
            <td><?=$row->value?></td>
        </tr>
        <?php  }?>
        <tr>
          <td colspan="8"> الاجمالى</td>
          <td><?=$total?></td>
        </tr>
        </tbody>
        </table>

				</div>
				<div class="col-xs-12">
					<div class="col-xs-3">
						<h6>علماَ بأنه تم </h6>
					</div>
					<div class="col-xs-3">
						<h6><i class="fa fa-square-o" aria-hidden="true"></i> تم البحث </h6>
					</div>
					<div class="col-xs-3">
						<h6><i class="fa fa-square-o" aria-hidden="true"></i> تم مراجعة المستندات </h6>
					</div>
					<div class="col-xs-3">
						<h6><i class="fa fa-square-o" aria-hidden="true"></i> إعتماد المساعدة </h6>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-6">
						<h5>الإسم : عبد الله صالح المرزوق</h5><br>
					</div>
					<div class="col-xs-6">
						<h5 >الموافق : 20/20/2018م</h5><br>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4">
						<h6 class="text-center">مدير الرعاية الإجتماعية</h6>
						<h6 class="text-center">صالح بن إبراهيم القريعان</h6>
					</div>
					<div class="col-xs-4">
						<h6 class="text-center">المحاسب</h6>
						<h6 class="text-center">ماجد  محمد الركيان</h6>
					</div>
					<div class="col-xs-4 text-center">
						<h6 class="text-center">مدير الشؤون المالية </h6>
						<h6 class="text-center">سامي نايف الحربي</h6>
					</div>

				</div>

				<div class="col-xs-12">
					<div class="col-xs-4">
						<h5 class="text-center">مدير عام الجمعية</h5>
					<h5 class="text-center">سلطان بن محمد الجاسر</h5>
					</div>
					<div class="col-xs-4">
						<h5 class="text-center">أمين الصندوق - عضو مجلس الإدارة</h5>
					<h5 class="text-center">عبدالله بن عبد العزيز الصبيحي</h5>
					</div>
					<div class="col-xs-4 text-center">
						<h5 class="text-center">رئيس مجلس الإدارة</h5>
						<h5 class="text-center">عبد الرحمن محمد سليمان البليهي</h5>
					</div>

				</div>

				


				<div class="clearfix"></div>

			</div>
		</div>
	</section>

<!--	<div class="footer">
		<p>بريدة - المملكة العربية السعودية</p>
		<p>الهاتف : 063851919 &nbsp فاكس : 063837737 &nbsp جوال : 0553851919 </p>
		<p>س-ب 821 - بريدة 51421 &nbsp&nbsp&nbsp abnaa.bu@gmail.com</p>
	</div>
-->










	<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
	<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
	<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
<?php  $previos_path = str_replace(base_url(), "", $_SERVER['HTTP_REFERER']);?>
<script >
    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url('').$previos_path ?>";
    }, 10000);
</script >


</body>
</html>
