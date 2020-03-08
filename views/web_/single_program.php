





<section class="program-features">
		<div class="container">
        
                        <h5 class="text-center title"><?php if(isset($program->program_name )&&!empty($program->program_name)){ echo $program->program_name; }?></h5>
            
                        <p class="details"><?php if(isset($program->program_name )&&!empty($program->program_name)){echo $program->program_content; }?></p>
			
			
 <?php
 if(isset($rows )&&!empty($rows)){
 foreach ($rows as $row){?>
			

			<div class="col-md-3 col-sm-6 col-xs-12 text-center">
				<div class="feat">
					<img src="img/buy.png">
					<h5><?php echo $row->program_title;?></h5>
					<p><?php echo $row->program_content;?> .</p>
				</div>
			</div>
            <?php }
 }
            ?>
		</div>
	</section>


	<section class="program-details">
		<div class="container">
			
			<div class="col-sm-12">
				<h5>عن المشروع</h5>
				<div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
					
					
					

 <?php
if(isset($rows) && !empty($rows) && $rows!=null){
  foreach ($rows as $row_1){?>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingFour1">
							<h4 class="panel-title  text-center">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour1_<?php echo $row_1->id;?>" aria-expanded="false" aria-controls="collapseFour1">
									<?php echo $row_1->program_title;?>
								</a>
							</h4>
						</div>
						<div id="collapseFour1_<?php echo $row_1->id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour1">
							<div class="panel-body">
							<?php echo $row_1->program_content;?>
							</div>
						</div>
					</div>
                    
                    <?php 
                    
                    } } ?>
				</div>
			</div>
		</div>
	</section>


	<section class="program-gallery" id="thumbnails">
		<div class="container">
			<h4>مكتبة صور </h4>
			<br>

			<!--<div id="owl-demo3" class="owl-carousel owl-theme">

				
				
				<?php 
                print_r($img);
                
                if(isset($img)&&!empty($img)){?>
				<div class="col-md-3 col-sm-6 col-xs-12 item">
					<a href="" title="Turntable by Jens Kappelmann">
                    <img src="<?php echo base_url();?>uploads/images/<?php echo $img->id;?>" 
                    alt="turntable" width="100%" height="250">
                    
                    </a>
				</div>
                            <?php
                                }
                                ?>

			</div>
            -->
			<hr>
		</div>
	</section>








	