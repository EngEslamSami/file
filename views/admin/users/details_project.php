 <!-- <section class="content-header">
	<div class="header-icon">
		<i class="fa fa-dashboard"></i>
	</div>
	<div class="header-title">
		<h1>الصفحة الرئيسية</h1>
		<small>محتويات الصفحة الرئيسية</small>
	</div>

</section> -->

<style type="text/css">
#cardbox1 {
	-moz-box-shadow: 0 0 5px #888;
	-webkit-box-shadow: 0 0 5px #888;
	box-shadow: 0 0 5px #888;
	color: #e4e5e7;
	cursor: pointer;
	background-color: #fff;
	height: 130px;
	margin-bottom: 25px;
	border-radius: 4px;
}
#cardbox2 {
	-moz-box-shadow: 0 0 5px #888;
	-webkit-box-shadow: 0 0 5px #888;
	box-shadow: 0 0 5px #888;
	color: #e4e5e7;
	cursor: pointer;
	background-color: #009688;
	height: 130px;
	margin-bottom: 25px;
	border-radius: 4px;
}

#cardbox1:hover,
#cardbox1:focus{
	color: #fff;
	cursor: pointer;
	background: #f5f5f5;
	box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
}

#cardbox2:hover,
#cardbox2:focus{
	color: #fff;
	cursor: pointer;
	background: #0c0b0c;
	box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
}
#cardbox2 .statistic-box i{
	color: #fff;
}
#cardbox2 .statistic-box h3{
	color: #fff;
	font-size: 14px;
	font-weight: 600;
}
#cardbox2 span.count-number{
	color: #fff;
}



span.count-number {
	color: #e4e5e7;
	font-size: 20px;
	font-weight: bold;
}
.statistic-box {
	padding: 12px;
}
.statistic-box i{
	color: #940000;
}
.statistic-box h3{
	color: #555;
	font-size: 14px;
	font-weight: 600;
}
span.count-number{
	color: #003665;
}
.statistic-box img{
	width: 50px;
	height: 50px;
}
.pd-10{
	padding-top: 10px;
}
.background-white{
	background-color: #fff;
}
.lobipanel>.panel-heading>.panel-title{
	padding-right: 2px;
}
i.fa-user {
	color: red;
}
.pd-15{
	padding: 15px;
}




/***********************************/
/*administrative structure*/
	* {margin: 0; padding: 0;}
	.administrative_structure .tree ul {
		padding-top: 20px; position: relative;

		transition: all 0.5s;
		-webkit-transition: all 0.5s;
		-moz-transition: all 0.5s;
	}
	.administrative_structure .tree li {
		float: right; 
		text-align: center;
		list-style-type: none;
		position: relative;
		padding: 20px 2px 0 2px;

		transition: all 0.5s;
		-webkit-transition: all 0.5s;
		-moz-transition: all 0.5s;
	}
	/*We will use ::before and ::after to draw the connectors*/
	.administrative_structure .tree li::before, .tree li::after{
		content: '';
		position: absolute; 
		top: 0;
		 left: 50%;
		border-top: 1px solid #ccc;
		width: 51%; 
		height: 20px;
	}
	.administrative_structure .tree li::after{
		right: 50%; 
		left: auto;
		border-right: 1px solid #ccc;
	}
/*We need to remove left-right connectors from elements without 
any siblings*/
.administrative_structure .tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.administrative_structure .tree li:only-child{ 
	padding-top: 0;
}

/*Remove left connector from first child and 
right connector from last child*/
.administrative_structure .tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.administrative_structure .tree li:last-child::before{
	border-left: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.administrative_structure .tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.administrative_structure .tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.administrative_structure .tree li a{
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #666;
	font-size: 11px;
	display: inline-block;
	
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
	background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…IgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
	background-image: -moz-linear-gradient(-45deg, rgba(0,0,0,0.25) 0%, rgba(0,0,0,0) 100%) !important;
	background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0%,rgba(0,0,0,0.25)), color-stop(100%,rgba(0,0,0,0)))!important;
	background-image: -webkit-linear-gradient(-45deg, rgba(0,0,0,0.25) 0%,rgba(0,0,0,0) 100%)!important;
	background-image: -o-linear-gradient(-45deg, rgba(0,0,0,0.25) 0%,rgba(0,0,0,0) 100%)!important;
	background-image: -ms-linear-gradient(-45deg, rgba(0,0,0,0.25) 0%,rgba(0,0,0,0) 100%)!important;
	background-image: linear-gradient(135deg, rgba(0,0,0,0.25) 0%,rgba(0,0,0,0) 100%)!important;
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#40000000', endColorstr='#00000000',GradientType=1 );
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.administrative_structure .tree li a:hover, 
.administrative_structure .tree li a:hover+ul li a {
	background: #c8e4f8 !important; 
	color: #000; 
	border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.administrative_structure .tree li a:hover+ul li::after, 
.administrative_structure .tree li a:hover+ul li::before, 
.administrative_structure .tree li a:hover+ul::before, 
.administrative_structure .tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}

.administrative_structure .tree li.parent a{
	background: #AAD4E7;
}
.administrative_structure .tree li.director a {
	background: #FDB0FD;
}
.administrative_structure .tree li.subdirector a{
	background: #FFD600;
}
.administrative_structure .tree li.child a{
	background: #f0f0f0;
}
</style>

<section class="content" style="padding:10px 20px 10px;">
	<div class="row">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs background-white" role="tablist">
			<li role="presentation" class="active"><a href="#Counters_of_sum" aria-controls="Counters_of_sum" role="tab" data-toggle="tab">إجمالى عدد الكل</a></li>
			<li role="presentation"><a href="#Import_Export" aria-controls="Import_Export" role="tab" data-toggle="tab">إجمالى الإيرادات والمصروفات</a></li>
			<li role="presentation"><a href="#Members_gameita" aria-controls="Members_gameita" role="tab" data-toggle="tab">الأعضاء</a></li>
			<li role="presentation"><a href="#All_orders_from" aria-controls="All_orders_from" role="tab" data-toggle="tab">جميع الطلبات</a></li>
			<li role="presentation"><a href="#management_structure" aria-controls="management_structure" role="tab" data-toggle="tab">الهيكل الإدارى</a></li>

		</ul>

		<!-- Tab panes -->
		<div class="tab-content pd-10">
			<div role="tabpanel" class="tab-pane active" id="Counters_of_sum">
				




				<div class="clearfix"></div>

				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
					<div id="cardbox2">
						<div class="statistic-box">
							<i class="fa fa-user-plus fa-3x"></i>
							<div class="counter-number pull-right">
								<span class="count-number"><?php echo $new_family;?></span>
								<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
								</span>
							</div>
							<h3> ملفات الاسر الجديده</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
					<div id="cardbox2">
						<div class="statistic-box">
							<i class="fa fa-user-plus fa-3x"></i>
							<div class="counter-number pull-right">
								<span class="count-number"><?php echo $suspend_family;?></span>
								<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
								</span>
							</div>
							<h3> ملفات الاسر المعتمده</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
					<div id="cardbox2">
						<div class="statistic-box">
							<i class="fa fa-user-plus fa-3x"></i>
							<div class="counter-number pull-right">
								<span class="count-number"><?php echo $refuse_family;?></span>
								<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
								</span>
							</div>
							<h3>ملفات الاسر مرفوضه</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
					<div id="cardbox2">
						<div class="statistic-box">
							<i class="fa fa-user-plus fa-3x"></i>
							<div class="counter-number pull-right">
								<span class="count-number"><?php echo $accept_family;?></span>
								<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
								</span>
							</div>
							<h3>ملفات الاسر المقبوله</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
					<div id="cardbox2">
						<div class="statistic-box">
							<i class="fa fa-user-plus fa-3x"></i>
							<div class="counter-number pull-right">
								<span class="count-number"><?php echo $program_count;?></span>
								<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
								</span>
							</div>
							<h3>عدد برامج الجمعيه</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
					<div id="cardbox2">
						<div class="statistic-box">
							<i class="fa fa-user-plus fa-3x"></i>
							<div class="counter-number pull-right">
								<span class="count-number"><?php echo $sponsors_count;?></span>
								<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
								</span>
							</div>
							<h3>عدد الكفلاء</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
					<div id="cardbox2">
						<div class="statistic-box">
							<i class="fa fa-user-plus fa-3x"></i>
							<div class="counter-number pull-right">
								<span class="count-number"><?php echo $donner_count;?></span>
								<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
								</span>
							</div>
							<h3>عدد المتبرعين</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
					<div id="cardbox2">
						<div class="statistic-box">
							<i class="fa fa-user-plus fa-3x"></i>
							<div class="counter-number pull-right">
								<span class="count-number"><?php echo $magls_count;?></span>
								<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
								</span>
							</div>
							<h3>عدد اعضاء مجلس الاداره</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
					<div id="cardbox2">
						<div class="statistic-box">
							<i class="fa fa-user-plus fa-3x"></i>
							<div class="counter-number pull-right">
								<span class="count-number"><?php echo $assembly_count;?></span>
								<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
								</span>
							</div>
							<h3>عدد اعضاء الجمعيه العموميه</h3>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
					<div id="cardbox2">
						<div class="statistic-box">
							<i class="fa fa-user-plus fa-3x"></i>
							<div class="counter-number pull-right">
								<span class="count-number"><?php echo $employees_count;?></span>
								<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
								</span>
							</div>
							<h3>عدد الموظفين</h3>
						</div>
					</div>
				</div>

			</div>
			<div role="tabpanel" class="tab-pane" id="Import_Export">
				
				<div class="col-xs-12">
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
						<div id="cardbox1">
							<div class="statistic-box">
								<i class="fa fa-user-plus fa-3x"></i>
								<!--<img src="<?php echo base_url()?>asisst/admin_asset/img/balance.png">-->
								<div class="counter-number pull-right">
									<span class="count-number">11</span> 
									<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
									</span>
								</div>
								<h3>إجمالى إيرادات تبرعات الجمعية</h3>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
						<div id="cardbox2">
							<div class="statistic-box">
								<i class="fa fa-user-plus fa-3x"></i>
								<!--<img src="<?php echo base_url()?>asisst/admin_asset/img/balance.png">-->
								<div class="counter-number pull-right">
									<span class="count-number">4</span> 
									<span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
									</span>
								</div>
								<h3>إجمالى مصروفات الأيتام</h3>
							</div>
						</div>
					</div>
				</div>


				<!-- Barchart -->
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
						<div class="panel-heading">
							<div class="panel-title">
								<h6>إجمالى إيرادات تبرعات الجمعية</h6>
							</div>
						</div>
						<div class="panel-body">
							<canvas id="barChart" height="150"></canvas>
						</div>
					</div>
				</div>
				<!-- bar chart -->
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
						<div class="panel-heading">
							<div class="panel-title">
								<h6>إيرادات الأسبوع الحالى </h6>
							</div>
						</div>
						<div class="panel-body">
							<canvas id="singelBarChart" height="323"></canvas>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
						<div class="panel-heading">
							<div class="panel-title">
								<h6>مصروفات الأسبوع الحالى </h6>
							</div>
						</div>
						<div class="panel-body">
							<canvas id="singelBarChart_export" height="323"></canvas>
						</div>
					</div>
				</div>



			</div>
			<div role="tabpanel" class="tab-pane" id="Members_gameita">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
							<div class="panel-heading">
								<div class="panel-title">
									<h6>أعضاء مجلس الإدارة</h6>
								</div>
							</div>

							<div class="panel-body pd-15">
								<?php if(!empty($all_mgls_members)){  foreach ($all_mgls_members as $member ){

									if($member->expired_date < time()){
										$state='danger';
										$title='عضوية منتهية';
									}elseif($member->expired_date > time()){
										$state='success';
										$title='عضوية سارية';
									}
									?>
									<div class="Pendingwork">
										<span class="label-<?php echo $state;?> label label-default pull-right"><?php echo $title;?></span>
										<i class="fa fa-user"></i>
										<a href="#"><?php echo $member->member_name;?></a>
										<div class="upworkdate">
											<p><?php echo $member->job_title;?></p>
										</div>
									</div>

								<?php  } }else{?>
									<div class=" alert alert-danger"> لا يوجد أعضاء مجلس الإدارة</div>

								<?php  } ?>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
							<div class="panel-heading">
								<div class="panel-title">
									<h6>أعضاء الجمعية العمومية</h6>
								</div>
							</div>
							<div class="panel-body pd-15">

								<?php if(!empty($all_general_assembly_members)){  foreach ($all_general_assembly_members as $member ){
									if($member->membership_type ==1){
										$state='success';
										$title='عامل';
									}elseif($member->membership_type ==2){
										$state='warning';
										$title='منتسب';
									}
									?>

									<div class="Pendingwork">
										<span class="label-<?php echo $state;?> label label-default pull-right"><?php echo $title;?></span>
										<i class="fa fa-user"></i>
										<a href="#"><?php echo$member->name; ?></a>
										<div class="upworkdate">
											<p>عضو من <?php echo$member->date; ?></p>
										</div>
									</div>

								<?php  } }else{ ?>
									<div class=" alert alert-danger"> لا يوجد أعضاء الجمعية العمومية</div>
								<?php } ?>

							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
						<div class="panel-heading">
							<div class="panel-title">
								<h6>موظفين الجمعية</h6>
							</div>
						</div>
						<div class="panel-body pd-15">
							<div class="Workslist">
								<div class="worklistdate">
									<table class="table table-hover">
										<thead>
										<tr>
											<th>م</th>
											<th>إسم العضو</th>
											<th>رقم التلفون</th>
											<th>البريد الالكتروني</th>

										</tr>
										</thead>
										<tbody>
										<?php if(isset($employeees) || !empty($employeees)){
											$x=1;
											foreach ($employeees as $employee){ ?>
												<tr>
													<td><?= $x ?></td>
													<th scope="row"><?= $employee->employee ?></th>
													<td><?= $employee->mobile ?></td>
													<td><?= $employee->email ?></td>
													<!--                                    <td><span class="label-success label label-default pull-right">تم الموافقة</span></td>-->
												</tr>
												<?php $x++; } } else{?>
											<div class=" alert alert-danger">لايوجد موظفين الجمعيه</div>
										<?php } ?>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
						<div class="panel-heading">
							<div class="panel-title">
								<h6>طلبات أعضاء الجمعية العمومية</h6>
							</div>
						</div>
						<div class="panel-body pd-15">
							<div class="Workslist">
								<div class="worklistdate">
									<table class="table table-hover">
										<thead>
										<tr>
											<th>إسم العضو</th>
											<th>عنوان الطلب</th>
											<th>تاريخ الطلب</th>
											<th>الحالة</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<th scope="row">محمد إسماعيل النويهي</th>
											<td>يرجى معرفة عدد المتبرعين فى الجمعية </td>
											<td>Feb 25,2017</td>
											<td><span class="label-success label label-default pull-right">تم الموافقة</span></td>
										</tr>
										<tr>
											<th scope="row">محمد إسماعيل النويهي</th>
											<td>يرجى معرفة عدد المتبرعين فى الجمعية </td>
											<td>Feb 25,2017</td>
											<td><span class="label-success label label-default pull-right">تم الموافقة</span></td>
										</tr>
										<tr>
											<th scope="row">محمد إسماعيل النويهي</th>
											<td>يرجى معرفة عدد المتبرعين فى الجمعية </td>
											<td>Feb 25,2017</td>
											<td><span class="label-success label label-default pull-right">تم الموافقة</span></td>
										</tr>
										<tr>
											<th scope="row">محمد إسماعيل النويهي</th>
											<td>يرجى معرفة عدد المتبرعين فى الجمعية </td>
											<td>Feb 25,2017</td>
											<td><span class="label-warning label label-default pull-right">جارى النظر</span></td>
										</tr>
										<tr>
											<th scope="row">محمد إسماعيل النويهي</th>
											<td>يرجى معرفة عدد المتبرعين فى الجمعية </td>
											<td>Feb 25,2017</td>
											<td><span class="label-danger label label-default pull-right">مرفوض</span></td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div role="tabpanel" class="tab-pane" id="All_orders_from">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
						<div class="panel-heading">
							<div class="panel-title">
								<h6>طلبات الأسر الجديدة</h6>
							</div>
						</div>
						<div class="panel-body pd-15">
							<div class="Workslist">
								<div class="worklistdate">
									<table class="table table-hover">
										<thead>
										<tr>
											<th>إسم المستفيد</th>
											<th>رقم الهوية</th>
											<th>تاريخ تسجيل الطلب</th>
											<th>الحالة</th>
										</tr>
										</thead>
										<tbody>
										<?php if(isset($requests) || !empty($requests)){
											foreach ($requests as $request){
												switch ($request->suspend){
													case 0:
														$label = "label-default"; $str ='جاري';
														break;
													case 1:
														$label = "label-success"; $str ='تم القبول';
														break;
													case 2:
														$label = "label-danger"; $str ='تم الرفض';
														break;
													case 3:
														$label = "label-warning"; $str ='تم التحويل';
														break;
													case 4:
														$label = "label-primary"; $str ='تم الاعتماد'; //default
														break;
													case 5:
														$label = "label-info"; $str =' تم التحويل للجنة';
														break;
												}
												?>
												<tr>
													<td scope="row"><?php if(isset($request->mother->full_name)){
															echo $request->mother->full_name;
														}else { ?>
															<a class="btn btn-success" href="#">اكمل البيانات</a>
														<?php  }
														?> </td>
													<th ><?=$request->mother_national_num ?></th>

													<td><?=date('Y-m-d',$request->date) ?></td>
													<td><span class="<?= $label ?> label label-default "><?= $str ?></span></td>
												</tr>
											<?php } } ?>

										<?php  ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>




			</div>




			<div role="tabpanel" class="tab-pane" id="management_structure">


				<section class="administrative_structure">
					<div class="tree">
						<ul>
							<li class="parent">
								<a href="#">رئيس مجلس الإدارة</a>
								<ul>
									<li  class="director">
										<a href="#">مجلس الإدارة</a>
										<ul>
											<li class="subdirector">
												<a href="#">نائب</a>
											</li class="subdirector">
											<li class="subdirector">
												<a href="#">نائب</a>
											</li>
											<li  class="subdirector">
												<a href="#">أمانة الصندوق</a>
												<ul>
													<li class="child">
														<a href="#">عضو</a>
													</li>
													<li class="child">
														<a href="#">عضو</a>
													</li>
													<li class="child">
														<a href="#">عضو</a>
													</li>
													<li  class="subdirector">
														<a href="#">هيئة مستقلة</a>
														<ul>
															<li class="child">
																<a href="#">عضو</a>
															</li>
															<li class="child">
																<a href="#">عضو</a>
															</li>
															<li class="child">
																<a href="#">عضو</a>
															</li>
														</ul>
													</li>
												</ul>
											</li>


										</ul>
									</li>
									<li class="director">
										<a href="#">الجمعية العمومية</a>
										<ul>
											<li class="subdirector"><a href="#">الإدارة العليا</a></li>
											<li class="subdirector">
												<a href="#">مجلس الأمناء</a>
												<ul>
													<li class="child">
														<a href="#">عضو</a>
													</li>
													<li class="child">
														<a href="#">عضو</a>
													</li>
													<li class="child">
														<a href="#">عضو</a>
													</li>
												</ul>
											</li>
											<li class="subdirector"><a href="#">مدير مجموعة أعضاء</a></li>
										</ul>
									</li>

								</ul>
							</li>
						</ul>
					</div>
				</section>



			</div>


	</div>







</section><!--content--> 