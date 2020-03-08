	<footer>
		<div class="footer-main">
			<div class="container-fluid">
				<div class="col-md-4 footer-item">
					<h2 class="footer-title"><span>من نحن</span></h2>
					<p class="mbottom-10">  جمعية خيرية متخصصة و رائدة في رعاية الأيتام و أسرهم وتنميتهم في منطقة البــاحة - نخدم عشر محافظات-  </p>
				</div>
				<div class="col-md-4 footer-item">
					<h2 class="footer-title"><span> روابط مهمة</span></h2>
					<ul class="footer-links list-unstyled">
						<li><a href="#"> طريقة التبرع من خلال متجر أكناف   </a></li>
					</ul>
				</div>
				<div class="col-md-4 footer-item">
					<h2 class="footer-title"><span>تابعنا على الشبكات الاجتماعية</span></h2>
					<ul class="social">
						<li class="social-item">
							<a href="#" target="_blank">
								<span class="fa fa-instagram"></span>
							</a>
						</li>
						<li class="social-item">
							<a href="#" target="_blank">
								<span class="fa fa-twitter"></span>
							</a>
						</li>
						<li class="social-item">
							<a href="#" target="_blank">
								<span class="fa fa-snapchat"></span>
							</a>
						</li>
						<li class="social-item">
							<a href="#" target="_blank">
								<span class="fa fa-youtube"></span>
							</a>
						</li>
					</ul>

				</div>

			</div>
		</div>
		<div class="footer-sub">
			<div class="container footer-wrapper">
				<p class="mb-4 mb-md-0">الحقوق محفوظة جمعية أكناف لرعاية الأيتام © 2019 | صنع بإتقان بواسطة <a href="#" target="_blank">شركة الأثير تك</a></p>

				<img src="https://acnaf.com/themes/default/assets/images/mada.png?v=1.0.22" alt="">



				<a href="#" target="_blank">
					<img src="https://acnaf.com/themes/default/assets/images/maroof-footer.png?v=1.0.22" alt="">
				</a>

			</div>
		</div>
	</footer>


	<form method="POST" action="" accept-charset="UTF-8">
		<div id="fast_donation" style="">
			<div id="the_form" class="">
				<a href="#" id="qw">
					<i class="fa fa-gift"></i>
				</a>
				<div id="form">
					<h2 id="fast_donation_title"> اهداء تبرع</h2>
					<input type="hidden" name="donatation" value="1">
					<div class="form-group">

						<label>قيمه التبرع</label>
						<input type="text" class="form-control" id="DonAmount" name="price">
					</div>
					<div class="form-group">
						<label>جوال المهدى اليه</label>
						<input type="text" class="form-control" id="Phone" name="phone">
					</div>
					<div class="form-group">
						<label>اسم المهدى اليه</label>
						<input type="text" class="form-control" id="Name" name="gifer_name">
						<span class="field-validation-valid text-danger" data-valmsg-for="Name" data-valmsg-replace="true"></span>
					</div>
					<div class="form-group">
						<label> اختر نموذج الاهداء</label>
						<select class="form-control" id="Relation" name="model_id" onchange="DisplayCurrentMessage()">
							<option value="0"> اختر نموذج الاهداء</option>
							<option value="4"> اهداء</option>
						</select>
					</div>
					<button class="btn btn btn-block button-fast-donation btn10" style=" " type="submit" >ارسال</button>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</form>




	<script type="text/javascript" src="<?php echo base_url(); ?>asisst/store_asset/js/jquery-1.10.1.min.js"></script>
	<script src="<?php echo base_url(); ?>asisst/store_asset/js/bootstrap-arabic.min.js"></script>
	<script src="<?php echo base_url(); ?>asisst/store_asset/js/bootstrap-select.min.js"></script>
	<script src="<?php echo base_url(); ?>asisst/store_asset/js/jquery.datetimepicker.full.js"></script>
	<script src="<?php echo base_url(); ?>asisst/store_asset/js/jquery.easing.min.js"></script>
	<script src="<?php echo base_url(); ?>asisst/store_asset/js/jquery.lightbox-0.5.min.js"></script>
	<script src="<?php echo base_url(); ?>asisst/store_asset/js/owl.carousel.min.js"></script>
	<script src="<?php echo base_url(); ?>asisst/store_asset/js/custom.js"></script>
	<script src="<?php echo base_url(); ?>asisst/store_asset/js/wow.min.js"></script>


	<script src="<?php echo base_url(); ?>asisst/store_asset/js/shoppingCart.js"></script>
    
	<script>
		$("#qw").click(function() {  
			$("#the_form").toggleClass("margin0");     
		});

	</script>
	<script>
		new WOW().init();
		$('.datepicker').datetimepicker({
			format:'Y-m-d',
			time: false
		});
	</script>

	<script type="text/javascript">
		$(function() {
			$('#thumbnails a').lightBox();
		});
	</script>

	<script type="text/javascript">
		var a = 0;
		$(window).scroll(function() {

			var oTop = $('#counter_section').offset().top - window.innerHeight;
			if (a == 0 && $(window).scrollTop() > oTop) {

				$('.counter').each(function() {
					var $this = $(this),
					countTo = $this.attr('data-count');

					$({ countNum: $this.text()}).animate({
						countNum: countTo
					},

					{

						duration: 20000,
						easing:'linear',
						step: function() {
							$this.text(Math.floor(this.countNum));
						},
						complete: function() {
							$this.text(this.countNum);
      //alert('finished');
  }

});  

				});

				a = 1;
			}

		});
	</script>

    	<script>

		$(".addToCart").click(function(event){
			event.preventDefault();
			event.preventDefault();
			var name = $(this).attr("data-name");
			//	var num_sham = Number($(this).attr("data_num_sahm"));
			if($('#num_sahm').val()){
				var num_sham=$('#num_sahm').val();
			}else{
				var num_sham=1;
			}


			var price = Number($(this).attr("data-price"));
			var pro_ID = $(this).attr("data-ID");


			shoppingCart.addItemToCart(name, price,num_sham,pro_ID);
			displayCart();

			/*****/
			var cart = $('.handle');
			var imgtodrag = $(this).parent().parent().parent().find(".box-image img").eq(0);
			if (imgtodrag) {
				var imgclone = imgtodrag.clone()
				.offset({
					top: imgtodrag.offset().top,
					left: imgtodrag.offset().left
				})
				.css({
					'opacity': '0.5',
					'position': 'absolute',
					'height': '150px',
					'width': '150px',
					'z-index': '100'
				})
				.appendTo($('body'))
				.animate({
					'top': cart.offset().top + 10,
					'left': cart.offset().left + 10,
					'width': 75,
					'height': 75
				}, 1000, 'easeInOutExpo');

				setTimeout(function () {
					cart.effect("shake", {
						times: 2
					}, 200);
				}, 1500);

				imgclone.animate({
					'width': 0,
					'height': 0
				}, function () {
					$(this).detach()
				});
			}
			/*****/

		});

		$("#clear-cart").click(function(event){
			shoppingCart.clearCart();
			displayCart();
		});

		function displayCart() {
			var cartArray = shoppingCart.listCart();

			var output = "";

			for (var i in cartArray) {
var x=parseInt(i)+1;
				output += "<tr>"
				+"<td style='width:25px;'>"+x+"</td>"
				+"<td> <a class='cart_product_name'>"+cartArray[i].name+"</a></td>"
					+"<td> <a class='cart_product_name'>"+cartArray[i].count+"</a></td>"
					+"<td> <a class='cart_product_name'>"+cartArray[i].price+"</a></td>"
					+"<td> <a class='cart_product_name'>"+cartArray[i].total+"</a></td>"


				+"</tr>";
			}

			$("#show-cart").html(output);
			$(".show-cart2_pop").html(output);
			$("#count-cart").html( x );
			$('.orders-num').html( shoppingCart.countCart() );
			$("#total-cart").html(shoppingCart.totalCart());
			$(".total-cart").html(shoppingCart.totalCart());
		}


		$(".show-cart").on("click", ".delete-item", function(event){
			var name = $(this).attr("data-name");
			shoppingCart.removeItemFromCartAll(name);
			displayCart();
		});

		$(".show-cart").on("click", ".subtract-item", function(event){
			var name = $(this).attr("data-name");
			shoppingCart.removeItemFromCart(name);
			displayCart();
		});

		$(".show-cart").on("click", ".plus-item", function(event){
			var name = $(this).attr("data-name");
			var pro_ID = $(this).attr("data-ID");
			var price = $(this).attr("cost-sahm");
			shoppingCart.addItemToCart(name, 0, 1);
			displayCart();
		});

		$(".show-cart").on("change", ".item-count", function(event){
			var name = $(this).attr("data-name");
			var count = Number($(this).val());
			shoppingCart.setCountForItem(name, count);
			displayCart();
		});


		displayCart();

		</script>


<!--
	<script>

		$(".add-to-cart2").click(function(event){


			event.preventDefault();
			var name = $(this).attr("data-name");
			//	var num_sham = Number($(this).attr("data_num_sahm"));
			if($('#num_sahm').val()) {
				var num_sham = Number($('#num_sahm').val());
			}else{
				var num_sham=1;
			}
			var price = Number($("#cost-sahm").val());
			var pro_ID = $(this).attr("data-ID");


			shoppingCart.addItemToCart(name, price,num_sham,pro_ID);
			displayCart();
			//   $('.add-to-cart').attr('data_num_sahm','');
		});

		$("#clear-cart").click(function(event){
			shoppingCart.clearCart();
			displayCart();

		});

		function displayCart() {
			var cartArray = shoppingCart.listCart();
			console.log(cartArray);
			var output = "";

			for (var i in cartArray) {

				output += "<tr>"
					+"<td>"+i+"</td>"
					+"<td>"+cartArray[i].name+"</td>"
					+"<td>"+" <input class='item-count' style='width:60px' type='number' data-name='"+"</td>"
					+cartArray[i].name
					+"' value='"+cartArray[i].count+"' >"
					+" x "+cartArray[i].price
					+" <button class='plus-item plus-color' data-name='"
					+cartArray[i].name+"'>+</button>"
					+" <button class='subtract-item minus-color' data-name='"
					+cartArray[i].name+"'>-</button>"+"</td>"
					+"<td>"+cartArray[i].total+"</td>"
					+"<td>"+" <button class='delete-item delete-color red_trash' data-name='"
					+cartArray[i].name+"'>X</button>"+"</td>"
					+"</tr>";
			}

			$(".show-cart").html(output);
			$("#count-cart").html( shoppingCart.countCart() );
			$('.orders-num').html( shoppingCart.countCart() );
			$("#total-cart").html( shoppingCart.totalCart() );
			$(".total-cart").html( shoppingCart.totalCart() );

			$(".item_price_send").val(parseInt(shoppingCart.totalCart()) );
			/*$("#count_cart_send").val( shoppingCart.countCart() );	*/
		}

		$(".show-cart").on("click", ".delete-item", function(event){
			var name = $(this).attr("data-name");
			shoppingCart.removeItemFromCartAll(name);
			displayCart();
		});

		$(".show-cart").on("click", ".subtract-item", function(event){
			var name = $(this).attr("data-name");
			shoppingCart.removeItemFromCart(name);
			displayCart();
		});

		$(".show-cart").on("click", ".plus-item", function(event){
			var name = $(this).attr("data-name");
			var pro_ID = $(this).attr("data-ID");
			var price = $(this).attr("cost-sahm");
			shoppingCart.addItemToCart(name, 0, 1);
			displayCart();
		});

		$(".show-cart").on("change", ".item-count", function(event){
			var name = $(this).attr("data-name");
			var count = Number($(this).val());
			shoppingCart.setCountForItem(name, count);
			displayCart();
		});


		displayCart();

	</script>
	-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
	<script>
		function save_pro() {
			var cartArray = shoppingCart.listCart();



			if (cartArray.length == 0) {
				alert("من فضلك قم باختيار منتجاتك اولا");
				return;
			}



			$.ajax({
				type: 'post',
				url: "<?php echo base_url();?>Web/save_cart",
				data: {cartArray: cartArray},
				success: function (d) {

					Swal.fire(
						'بنجاح!',
						'تم ارسال طلبك بنجاح  ',

					)
					//var audio = new Audio('https://www.computerhope.com/jargon/m/example.mp3');
					// audio.play();
					location.reload();
					shoppingCart.clearCart();
					displayCart();


				}

			});
		}

	</script>

</body>
</html>
