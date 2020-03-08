 <!-- <section class="content-header">
	<div class="header-icon">
		<i class="fa fa-dashboard"></i>
	</div>
	<div class="header-title">
		<h1>الصفحة الرئيسية</h1>
		<small>محتويات الصفحة الرئيسية</small>
	</div>

</section> -->


<style>
	.isDisabled {

		cursor: not-allowed;

	}
</style>

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
						<?php

						if($row->permission==0){
							$classs='isDisabled';
							$url='';
						}else{
							$classs='';
							$url='#sub_cats';
						}
						?>

						<a  data-toggle="modal"  onclick="get_sub_cats(<?=$row->page_id_fk?>);"   href="<?=$url?>" alt="" class="center-block <?=$classs?> " style="color: <?php echo  $row->sub[0]->color?>;">
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


 <!--------------------------------------------------------------------------------------------------------------------->
<style>

	.sub_cats .modal-content {
		box-shadow: none;
		background-color: rgba(0,0,0,0.7);
	}
	.sub_cats .title{
	    margin-top: 2px; 
	    position: relative;
    background-color: #f9a61a;
    border-radius: 15px;
    display: inline-block;
    padding: 9px 20px;
    color: #fff;
    text-align: center;
    min-width: 200px;
    padding-right: 50px;
    font-size: 15px;

	}
	.sub_cats .title i {
	  
        background-color: #f9a61a;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        position: absolute;
        right: 0;
        top: -7px;
        line-height: 45px;
        text-align: center;
        font-size: 23px;
	}
	#edrat-elnezam .inner-edrat{
		margin-top: 30px;
		/* display: inline-block; */
		width: 100%;
		float: right;
	}
	#edrat-elnezam .tree li  {
		color: #fff;
	}
	#edrat-elnezam .tree li a{
		color: #fff;
		font-size: 16px;

	}
	#edrat-elnezam  .tree li a:hover{
		color: #f9a61a;
	}

	#edrat-elnezam  .tree ul {
		margin-right: 10px;
		position: relative;
		margin-left: 0;
	}
	#edrat-elnezam  .tree ul li {
		padding-left: 0;
	}
	#edrat-elnezam  .tree ul ul {
		margin-left: 0;
	}
	#edrat-elnezam  .tree ul li:last-child:before{
		display: none;
	}
    .left_man img{
        width: 100%;
        height: auto;
        border: 0;
        border-radius: 0;
        margin-top: 250px;
    }

</style>

 <div class="modal fade sub_cats" id="sub_cats" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	 <div class="modal-dialog  " role="document" style="width:30%;">
		 <div class="modal-content" style="display: inline-block;width: 450px;min-height:485px;">
			 <div class="modal-body" style="padding: 2px;">






				 <!--  <input type="text" class="form-control" id="filter" name="filter" class="filter" placeholder="بحــــــــــــــــث" style="height: 50px;margin-bottom: 10px;text-align: center;font-size: 18px;"/> -->
				 <div class="rocket-links col-xs-12 no-padding ">

					 <div class="col-xs-8 col-md-8 no-padding" id ="edrat-elnezam" role="tablist" aria-multiselectable="true">




					 </div>
                     <div class="col-md-4 hidden-xs">
                        <div class="left_man">
                            <img src="<?php echo base_url()?>asisst/admin_asset/img/icons/man-arab-icon.png" />
                        </div>
                     </div>
				 </div>













			 </div>
		 </div>
	 </div>
 </div>

 <!--------------------------------------------------------------------------------------------------------------------->



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


<script>

	function get_sub_cats(val_id)
	{
		$.ajax({
			type:'post',
			url:"<?php echo base_url();?>Dash/get_sub_cats",
			data:{val_id:val_id},
			success:function(d){

           $('#edrat-elnezam').html(d);
				//alert(d);



			}

		});

	}

</script>



