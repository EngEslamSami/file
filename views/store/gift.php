



	<section class="latest-products gray-background mtop-20 pbottom-10">
		<div class="container-fluid padding-40">
			<div class="text-center">
				<h4 class="main-title ">متجر الهدايا</h4>
				<div class="divider-line"></div>
			</div><br>
			
			<div class="col-sm-2 col-xs-12 no-padding">
				
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					
					<?php
					if(isset($categories)&&!empty($categories)){
						foreach ($categories as $record2){
						?>
						
				
					
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading1<?php echo $record2->id;?> ">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion<?php echo $record2->id;?>" href="#collapse1<?php echo $record2->id;?>" aria-expanded="true" aria-controls="collapse1<?php echo $record2->id;?>"><i class="more-less glyphicon glyphicon-plus"></i> <?php echo $record2->name;?> </a>
							</h4>
						</div>
						<div id="collapse1<?php echo $record2->id;?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading1">
							<div class="panel-body content-acrodion no-padding">
								<ul class="list-unstyled">
									<?php if(isset($record2->sub)&& !empty($record2->sub)){
										foreach ($record2->sub as $x){
											
										?>
											<li><a href="<?php echo base_url();?>Web/cat_product/<?php echo $x->id;?>"><?php echo $x->name;?></a></li>


									<?php }  } ?>

								</ul>

							</div>
						</div>
					</div>
					<?php }  }  ?>

					
				</div>

			</div>
			<div class="col-sm-10 col-xs-12">
				<div  class="owl-products no-owl-pd">




					<?php
					if(isset($records)&& !empty($records)){
						foreach($records as $row){
						?>

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="item product-item">

							<div class="box-image">
								<a href="<?php echo base_url(); ?>web/single_project/<?php echo $row->id;?>">
									<img src="<?php echo base_url(); ?>uploads/images/<?php echo $row->img;?>" class="img-responsive img-thumb1" title="<?php echo $row->title;?>">
								</a>

							</div>
							<div class="product-item-details box-info">
								<h5><a href="<?php echo base_url(); ?>web/store_single_product"><?php echo $row->title;?></a></h5>

								<div class="price">
									<span class="price-new"> <?php echo $row->sahm_price;?> ر.س</span>
								</div>

								<div class="button-group">
									<button class="addToCart btn-button btn10" data-name="<?php echo $row->title ;?>"    data-price="<?php echo $row->sahm_price ;?>"  data-ID="<?php echo $row->id ;?>-<?php echo $row->main_cat_id_fk ;?>-<?php echo $row->sub_cat_id_fk ;?>" type="button" title="" ><span><i class="fa fa-cart-plus"></i> اضافة الي السلة </span></button>

								</div>

							</div>
						</div>
					</div>
					<?php } }  ?>

				</div>
			</div>
		</div>
	</section>







	<script type="text/javascript" src="<?php echo base_url(); ?>asisst/store_asset/js/jquery-1.10.1.min.js"></script>

	<script>
		function toggleIcon(e) {
			$(e.target)
			.prev('.panel-heading')
			.find(".more-less")
			.toggleClass('glyphicon-plus glyphicon-minus');
		}
		$('.panel-group').on('hidden.bs.collapse', toggleIcon);
		$('.panel-group').on('shown.bs.collapse', toggleIcon);
	</script>

