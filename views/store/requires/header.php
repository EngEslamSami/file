<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>المتجر</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/store_asset/css/bootstrap-arabic-theme.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/store_asset/css/bootstrap-arabic.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/store_asset/css/bootstrap-select.min.css" >
	<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/store_asset/css/jquery.datetimepicker.css" >
	<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/store_asset/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/store_asset/css/owl.carousel.css" >
	<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/store_asset/css/owl.theme.css" >
	<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/store_asset/css/jquery.lightbox-0.5.css" >
	<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/store_asset/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/store_asset/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/store_asset/css/responsive.css">


	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>asisst/store_asset/img/favicon.png">

</head>

<body id="page-top" data-spy="scroll" >
	<!-- start bottom button -->
	<div class="bottom-button">
		<a id="to-top" class="btn btn-lg btn-inverse page-scroll" href="#page-top"> <span class="sr-only">Toggle to Top Navigation</span> <i class="fa fa-chevron-up"></i> </a>
	</div>

	<header>
		<div class="top-nav">
			<div class="container-fluid">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="social-icons">
						<a class=""> <i class="fa fa-whatsapp" data-toggle="modal" data-target="#exampleModalCenter"></i></a>
						<a href="#"><i class="fa fa-snapchat-ghost"></i></a>
						<a href="#"><i class="fa fa-twitter"></i> </a>
						<a href="#"><i class="fa fa-globe"></i></a>
						<a href="#" class="calc"><i class="fa fa-calculator"></i>  حاسبة الزكاة</a>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="gate">
						<a href="<?php echo base_url(); ?>">الموقع الرسمي</a>
					</div>
				</div>
			</div>
		</div>

		<div class="main-nav"  data-spy="affix" data-offset-top="50">
			<div class="container-fluid">
				<div class="col-sm-2 no-padding">
					<div class="main-logo">
						<a href="<?php echo base_url(); ?>web/new_store"><img src="<?php echo base_url(); ?>asisst/store_asset/img/rectangle-logo.png"></a>
					</div>
				</div>
				<div class="col-sm-10 no-padding">
					<nav class="navbar navbar-default">

						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand visible-xs" href="<?php echo base_url(); ?>web/new_store" >
								<img src="<?php echo base_url(); ?>asisst/store_asset/img/logo.png">
							</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="active"><a href="<?php echo base_url(); ?>web/new_store">الرئيسية <span class="sr-only">(current)</span></a></li>

								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">طريقة التبرع <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">تبرع مباشر</a></li>
										
									</ul>
								</li>
								<li><a href="<?php echo base_url(); ?>web/about_store">عن المتجر</a></li>
								<li><a href="<?php echo base_url(); ?>web/contact_store">إتصل بنا</a></li>
								<li><a href="<?php echo base_url(); ?>web/gift_store">متجر الهدايا</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">المنتجات<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">الأوقاف</a></li>
										<li><a href="#">الزكاة</a></li>
										<li><a href="#">الكفالة</a></li>
										<li><a href="#">البرامج الموسمية</a></li>
										
									</ul>
								</li>
								<li><a href="<?php echo base_url(); ?>web/direct_donation">التبرع المباشر</a></li>
							</ul>
                            
                            <ul class="nav navbar-nav navbar-right">
								<div class="shopping_cart ">
									<div id="cart" class="btn-group btn-shopping-cart show-on-hover">
										<a href="<?php echo base_url(); ?>web/cart_checkout" class="top_cart dropdown-toggle "  aria-expanded="false">
											<div class="shopcart">
												<span class="handle">
													<img src="<?php echo base_url(); ?>asisst/store_asset/img/icon/icon_minicart.png">
												</span>
												<span class="title">سلة التسوق</span>
												<p class="text-shopping-cart cart-total-full">
													<span class="items_cart"><span  id="count-cart">0</span> منتجات - <strong  class="total-cart">0</strong> جنية</span>		
												</p>
											</div>
										</a>
									</div>

								</div>
							</ul>


						</div><!-- /.navbar-collapse -->

					</nav>
				</div>
			</div><!-- /.container-fluid -->
		</div>
	</header>

	<div class="sidebar-quick-links-fixed hidden-xs">
		<a href="javascript:void(0);" class="side-btn">تسجيل الدخول</a>
		<ul>
			<li>
				<a href="#">
					<i class="fa fa-sign-in"></i>
					<span>تسجيل الدخول</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-user-plus"></i>
					<span>تسجيل جديد</span>
				</a>
			</li>
			
			
		</ul>
	</div>
	<!-- Sidebar Quick Links -->


	<div class="social-sidebar hidden-xs" dir="ltr">
		<ul>
			<li class="facebook">
				<a href="#" target="_blank">
					<i class="fa fa-facebook"></i>
					<span>تابعنا على فيسبوك</span>
				</a>
			</li>
			<li class="twitter">
				<a href="#" target="_blank">
					<i class="fa fa-twitter"></i>
					<span>تابعنا على تويتر</span>
				</a>
			</li>
			<li class="instagram">
				<a href="#" target="_blank">
					<i class="fa fa-instagram"></i>
					<span>تابعنا على انستجرام</span>
				</a>
			</li>
			<li class="youtube">
				<a href="#" target="_blank">
					<i class="fa fa-youtube-play"></i>
					<span>تابعنا على يوتيوب</span>
				</a>
			</li>
			<li class="snapchat">
				<a href="#" target="_blank">
					<i class="fa fa-snapchat-ghost"></i>
					<span>تابعنا على سناب شات</span>
				</a>
			</li>
		</ul>
	</div>