<button onclick="save_pro();"> حفظ</button>

	<section class="banner">
		<div class="container-fluid">
			<div id="slider-kfalat" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#slider-kfalat" data-slide-to="0" class="active"></li>
					<li data-target="#slider-kfalat" data-slide-to="1"></li>
					<li data-target="#slider-kfalat" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="<?php echo base_url(); ?>asisst/store_asset/img/slider/slide1.jpg" alt="...">
						
					</div>
					<div class="item">
						<img src="<?php echo base_url(); ?>asisst/store_asset/img/slider/slide1.jpg" alt="...">
					</div>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#slider-kfalat" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#slider-kfalat" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</section>

	<section class="announcement gray-bg">
		<img src="<?php echo base_url(); ?>asisst/store_asset/img/announcement.jpg">
	</section>

<!---- start---------------------------------------------------------------------------------------------------------->
	<?php if( isset($records) && !empty($records)){
		foreach($records as $row){
		?>
	<section class="latest-products gray-background mtop-20 pbottom-10">
		<div class="container-fluid">
			<div class="text-center">
				<h4 class="main-title "><?php echo $row->name;?></h4>
				<div class="divider-line"></div>
			</div>
			
			<div id="owl-demo1" class="owl-products owl-carousel owl-theme owl-demo1">


				<?php


				if(isset($row->programs)&&!empty($row->programs)){
					foreach ($row->programs as $record){
					?>
				<div class="item product-item">

					<div class="box-image">
						<a href="<?php echo base_url(); ?>web/single_project/<?php echo $record->id;?> ">
							<img src="<?php echo base_url(); ?>uploads/images/<?php echo $record->img;?>" class="img-responsive img-thumb1" title="" >
						</a>

						
					</div>
					<div class="product-item-details box-info">
						<h5><a href="<?php echo base_url(); ?>web/single_project/<?php echo $record->id ;?>"><?php echo $record->title ;?></a></h5>

						<div class="price">
							<span class="price-new"> <?php echo $record->sahm_price ;?> ر.س</span>
						</div>

						<div class="button-group">
							<button class="addToCart btn-button btn10" data-name="<?php echo $record->title ;?>"    data-price="<?php echo $record->sahm_price ;?>"  data-ID="<?php echo $record->id ;?>-<?php echo $record->main_cat_id_fk ;?>-<?php echo $record->sub_cat_id_fk ;?>" type="button" title="" ><span><i class="fa fa-cart-plus"></i> اضافة الي السلة </span></button>
							
						</div>

					</div>
				</div>

<?php }  } ?>
			</div>
		</div>
	</section>

	
	<section class="announcement gray-bg">
		<img src="<?php echo base_url(); ?>asisst/store_asset/img/announcement.jpg">
	</section>
	<?php } }  ?>
	<!---- end---------------------------------------------------------------------------------------------------------->



	<section class="latest-products gray-background mtop-20 pbottom-10">
		<div class="container-fluid">
			<div class="text-center">
				<h4 class="main-title ">متجر الهدايا</h4>
				<div class="divider-line"></div>
			</div>
			
			<div id="owl-demo2" class="owl-products owl-carousel owl-theme">
				<div class="item product-item">

					<div class="box-image">
						<a href="<?php echo base_url(); ?>web/store_single_product">
							<img src="<?php echo base_url(); ?>asisst/store_asset/img/program/img1.jpg" class="img-responsive img-thumb1" title="" >
						</a>

						
					</div>
					<div class="product-item-details box-info">
						<h5><a href="<?php echo base_url(); ?>web/store_single_product"> كسوة الشتاء</a></h5>

						<div class="price">
							<span class="price-new"> ٢٠٠ ر.س</span>
						</div>

						<div class="button-group">
							<button class="addToCart btn-button btn10" data-name=" كسوة الشتاء"  data-price="9.40" type="button" title="" ><span><i class="fa fa-cart-plus"></i> اضافة الي السلة </span></button>
							
						</div>

					</div>
				</div>
				<div class="item product-item">

					<div class="box-image">
						<a href="<?php echo base_url(); ?>web/store_single_product">
							<img src="<?php echo base_url(); ?>asisst/store_asset/img/program/img2.jpg" class="img-responsive img-thumb1" title="" >
						</a>


					</div>
					<div class="product-item-details box-info">
						<h5><a href="<?php echo base_url(); ?>web/store_single_product"> الحقيبة المدرسية</a></h5>

						<div class="price">
							<span class="price-new"> ٢٠٠ ر.س</span>
						</div>

						<div class="button-group">
							<button class="addToCart btn-button btn10" data-name=" الحقيبة المدرسية"  data-price="12.40" type="button" title="" ><span><i class="fa fa-cart-plus"></i> اضافة الي السلة </span></button>

						</div>

					</div>
				</div>
				<div class="item product-item">

					<div class="box-image">
						<a href="<?php echo base_url(); ?>web/store_single_product">
							<img src="<?php echo base_url(); ?>asisst/store_asset/img/program/img3.jpg" class="img-responsive img-thumb1" title="" >
						</a>

					</div>
					<div class="product-item-details box-info">
						<h5><a href="<?php echo base_url(); ?>web/store_single_product">كسوة العيد</a></h5>

						<div class="price">
							<span class="price-new"> ٢٠٠ ر.س</span>
						</div>

						<div class="button-group">
							<button class="addToCart btn-button btn10" data-name="كسوة العيد "  data-price="16" type="button" title="" ><span><i class="fa fa-cart-plus"></i> اضافة الي السلة </span></button>

							
						</div>

					</div>
				</div>
				<div class="item product-item">

					<div class="box-image">
						<a href="<?php echo base_url(); ?>web/store_single_product">
							<img src="<?php echo base_url(); ?>asisst/store_asset/img/program/img4.jpg" class="img-responsive img-thumb1" title="">
						</a>


					</div>
					<div class="product-item-details box-info">
						<h5><a href="<?php echo base_url(); ?>web/store_single_product">أضحية العيد</a></h5>

						<div class="price">
							<span class="price-new"> ٢٠٠ ر.س</span>
						</div>

						<div class="button-group">
							<button class="addToCart btn-button btn10" data-name="أضحية العيد"  data-price="253" type="button" title="" ><span><i class="fa fa-cart-plus"></i> اضافة الي السلة </span></button>

							
						</div>

					</div>
				</div>
				<div class="item product-item">

					<div class="box-image">
						<a href="<?php echo base_url(); ?>web/store_single_product">
							<img src="<?php echo base_url(); ?>asisst/store_asset/img/program/img5.jpg" class="img-responsive img-thumb1" title="">
						</a>

					</div>
					<div class="product-item-details box-info">
						<h5><a href="<?php echo base_url(); ?>web/store_single_product">أداء فريضة الحج</a></h5>

						<div class="price">
							<span class="price-new"> ٢٠٠ ر.س</span>
						</div>

						<div class="button-group"> 
							<button class="addToCart btn-button btn10" data-name="أداء فريضة الحج"  data-price="150" type="button" title="" ><span><i class="fa fa-cart-plus"></i> اضافة الي السلة </span></button>


							
						</div>

					</div>
				</div>
				<div class="item product-item">
					
					<div class="box-image">
						<a href="<?php echo base_url(); ?>web/store_single_product">
							<img src="<?php echo base_url(); ?>asisst/store_asset/img/program/img6.jpg" class="img-responsive img-thumb1" title="">
						</a>

					</div>
					<div class="product-item-details box-info">
						<h5><a href="<?php echo base_url(); ?>web/store_single_product">رحلة عمرة</a></h5>

						<div class="price">
							<span class="price-new"> ٢٠٠ ر.س</span>
						</div>

						<div class="button-group">
							<button class="addToCart btn-button btn10" data-name="رحلة عمرة"  data-price="250" type="button" title="" ><span><i class="fa fa-cart-plus"></i> اضافة الي السلة </span></button>
							

							
						</div>

					</div>
				</div>

			</div>
		</div>
	</section>




	<section class="counter-sec">
		<div class="container-fluid">
			
		</div>
	</section>

	<section class="counters_of_donors" id="counter_section">
		<div class="container">
			<div class="text-center">
				<h4 class="main-title ">الإحصائيات</h4>
				<div class="divider-line"></div>
			</div><br>

			<div class="col-md-1 col-sm-11 col-xs-12"></div>
			<div class="col-md-10 col-sm-10 col-xs-12">
				<div class="col-md-4 col-sm-4 col-xs-12 padding-4 text-center hover14">
					<div class="counter_box text-center div_bgr1">
						<h5>المنتجات</h5>
						<i class="fa fa-cart-arrow-down"></i>
						<div style=" margin-top: 18px;" class=" counter" data-count="100"></div>

					</div>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12 padding-4 text-center hover14">
					<div class="counter_box text-center div_bgr2">
						<h5>اجمالى التبرعات	</h5>
						<i class="fa fa-money"></i>
						<div style=" margin-top: 18px;" class="counter" data-count="500"></div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12 padding-4 text-center hover14">
					<div class="counter_box text-center div_bgr1">
						<h5>الهدايا	</h5>
						<i class="fa fa-gift"></i>
						<div style=" margin-top: 18px;" class=" counter" data-count="45"></div>
					</div>
				</div>
			</div>
			<div class="col-md-1 col-sm-11 col-xs-12"></div>

		</div>

	</section>


	<section class="sec5 ptop-20 pbottom-20">
		<div class="text-center">
			<h4 class="main-title ">إتصل بنا</h4>
			<div class="divider-line"></div>
		</div><br>

		<div class="container">
			<form method="POST" action="" accept-charset="UTF-8" enctype="multipart/form-data">

				<div class="form-group col-12 col-md-4">
					<label class="inputs-label">
						<i class="fa fa-user"></i>
						<input class="form-control brd-rd3 " id="name" placeholder="الاسم" name="name" type="text">

					</label>
				</div>
				<div class="form-group col-12 col-md-4">
					<label class="inputs-label">
						<i class="fa fa-envelope"></i>
						<input class="form-control brd-rd3  " id="email" placeholder="الايميل" name="email" type="email">
					</label>
				</div>
				<div class="form-group col-12 col-md-4 ">
					<label class="inputs-label">
						<i class="fa fa-address-card"></i>
						<input class="form-control brd-rd3  " id="title" placeholder="عنوان " name="address" type="text">
					</label>
				</div>
				<div class="form-group col-12">
					<textarea class="form-control brd-rd3 " id="exampleFormControlTextarea1" placeholder="الرساله" name="message" cols="50" rows="10"></textarea>
				</div>
				<div class="col-xs-12 text-center btn-full-width ">
					<button type="submit" class="btn  add-sh btn10"><span>ارسال</span></button>
				</div>
			</form>
		</div>

	</section>



	<section class="main-video ptop-30">
		<div class="container">
			<iframe width="100%" height="500" src="https://www.youtube.com/embed/Fp6rqyo2NEA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</section>


