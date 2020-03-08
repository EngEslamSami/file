 <!-- <section class="content-header">
	<div class="header-icon">
		<i class="fa fa-dashboard"></i>
	</div>
	<div class="header-title">
		<h1>الصفحة الرئيسية</h1>
		<small>محتويات الصفحة الرئيسية</small>
	</div>

</section> -->



<section class="content" style="padding-top: 10px;">
    <div class="col-md-1"></div>

	<div class="col-md-10 col-xs-12 no-padding">

	<?php

		$image_name ='asisst/admin_asset/img/logo-atheer.png';
		if(isset($_SESSION['main_data_info'])) {

			$image_name = 'uploads/images/' . $_SESSION['main_data_info']->logo;

			if (file_exists($image_name) == 1) {
				$image_name = "uploads/images/" . $_SESSION['main_data_info']->logo;
			} else {
				$image_name = 'asisst/admin_asset/img/logo-atheer.png';
			}
		}


		?>


		<div class="index-icons no-padding grid_system">
			<?php if(isset($main_groups) && $main_groups!=null && !empty($main_groups)){ 
				  $count_sec="0.1";$count_row=1; ?>
			<?php  foreach ($main_groups as $row): 
			     if($count_row %4 == 0){$count_row=1; }   ?>
                 <!--col-md20 col-md-3 col-sm-4-->                 
				<div class="padding-2 <?php echo  $row->sub[0]->class?> wow fadeIn" data-wow-delay="<?php echo($count_sec)?>s" >
					<div class="box" style="background-color: <?php echo  $row->sub[0]->bg_color?>;">
						<?php if($row->count_level > 0){
									$link_to="Dash/mian_group/".$row->sub[0]->page_id ;
								}else{
									$link_to="Dash/sub_sub_main/".$row->sub[0]->page_id.'/'.$row->sub[0]->page_id ;
								}?>
						<a href="<?php echo  base_url().$link_to?>" alt="" class="center-block" style="color: <?php echo  $row->sub[0]->color?>;">
						<!--	<img src="<?php  echo  base_url()."uploads/pages_images/thumbs/".$row->sub[0]->page_image?>" 
                                  alt="" class="center-block">-->
                                  <img src="<?php echo base_url().'uploads/pages_images/thumbs/'.$row->sub[0]->page_image ?>"
								 onerror="this.src='<?php echo base_url()."$image_name"?>'"
								 alt="" class="center-block" />
							<h5 class="text-center">  <?php echo  $row->sub[0]->page_title?>  </h5>
						</a>
					</div>
				</div>

			<?php  $count_sec +="0.2";$count_row +=1;  endforeach;?>
			<?php }?>

			
		</div>








	</div> 
    <div class="col-md-1"></div>
</section><!--content--> 



 <script src="https://www.gstatic.com/firebasejs/3.7.2/firebase.js"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script>
	 // Initialize Firebase
	 var config = {
		 apiKey: "AIzaSyCIxbRbrTnNrMD7Iqg9v9-IQr_DK_iCNPw",
		 authDomain: "shop-31d52.firebaseapp.com",
		 databaseURL: "https://shop-31d52.firebaseio.com",

		 storageBucket: "",
		 messagingSenderId: "204884469548",
	 };
	 firebase.initializeApp(config);

	 const messaging = firebase.messaging();

	 messaging.requestPermission()
		 .then(function() {
			 console.log('Notification permission granted.');
			 return messaging.getToken();
		 })
		 .then(function(token) {
			 //console.log(token); // Display user token
			 $.ajax({
				 type:'POST',
				 url:'<?php echo base_url();?>Notification_controller/save_token',
				 data:{token : token},
				 success:function(data){
					 // $("#msg").html(data);
					 //alert(d);
					 console.log(token);

				 }
			 });
		 })
		 .catch(function(err) { // Happen if user deney permission
			 console.log('Unable to get permission to notify.', err);
		 });

	 messaging.onMessage(function(payload){
		 // console.log('onMessage',payload);
		 notificationTitle = payload.notification.title;
		 notificationOptions = {
			 body: payload.notification.body,
			 icon: payload.notification.icon,
			 image:  payload.notification.image,
			 sound:  payload.notification.sound
		 };
		 var notification = new Notification(notificationTitle,notificationOptions);

	 })

 </script>

