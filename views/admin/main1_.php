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
	<div class="row">

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


		<div class="col-xs-12 index-icons no-padding">
			<?php if(isset($main_groups) && $main_groups!=null && !empty($main_groups)){ 
				  $count_sec="0.2";$count_row=1; ?>
			<?php  foreach ($main_groups as $row): 
			     if($count_row %4 == 0){$count_row=1; }   ?>
				<div class="col-md20 col-md-3 col-sm-4  " data-wow-delay="<?php echo($count_sec)?>s">
					<div class="box">
						<?php if($row->count_level > 0){
									$link_to="Dash/mian_group/".$row->sub[0]->page_id ;
								}else{
									$link_to="Dash/sub_sub_main/".$row->sub[0]->page_id.'/'.$row->sub[0]->page_id ;
								}?>
						<a href="<?php echo  base_url().$link_to?>" alt="" class="center-block">
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








	</div> <!--row--> 
</section><!--content--> 