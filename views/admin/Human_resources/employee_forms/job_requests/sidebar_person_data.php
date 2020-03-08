<style>
    .table-bordered.table-details tbody > tr > td {
        font-size: 13px !important;
        white-space: pre-line;
    }
</style>
<div class="col-md-2 no-padding emp_side">


                <div class="imagechange-3d image-hover hover">
    				<div class="imagechange-3d-inner">
    					<div class="imgchange-1">
    						<div class="person-card effect-shadow">
    							<div class="header-img">
                                
									
 <?php

$user_img="";
if(isset($personal_data)){
	$user_img=  $personal_data['personal_photo'] ;
}?>
        
    								<img src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/thumbnail-(3).png">
    							</div>
    							<div class="card-inner">
    								<div class="square">
    									<div class="pic">
    									
												 <img src="<?=base_url()?>/uploads/human_resources/job_request/<?php echo $user_img ?>"
             onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png'"  alt="لا يوجد صورة">
    									</div>
    								</div>
    
    								<div class="card-name">
    									<h5 style="font-size: 17px !important ; font-weight: bold !important;">
                                        
										<?php if(isset($personal_data)){ echo  $personal_data['name'];}?>
										</h5>
    								
    								</div>
    
									<div class="card-details">
    									<h5 style="color:#10779e !important; font-weight: bold !important;"><span class="spnline"></span><strong></strong>  <strong class="text-danger "> رقم الطلب :</strong>  <?php if(isset($personal_data)){ echo $personal_data['id'];}?></h5>
										<h5 style="color:#10779e !important; font-weight: bold !important;"><span class="spnline"></span><strong></strong>  <strong class="text-danger "> رقم الهوية :</strong>  <?php if(isset($personal_data)){ echo $personal_data['national_num'];}?></h5>
    								</div>
    								<!-- <div class="card-details">
    									<h5 style="color:#10779e !important; font-weight: bold !important;"><span class="spnline"></span><strong></strong>  <strong class="text-danger "> رقم الهوية :</strong>  <?php if(isset($personal_data)){ echo $personal_data['national_num'];}?></h5>
          
    								</div> -->
    							</div>
    							<div class="footer-img">
    
    							</div>
    
    
    						</div>
    					</div>
    					<div class="imgchange-2">
    						<div class="person-card back-card effect-shadow">
    							<div class="back-body">
    								<h5 style=" font-size:14px!important; color:#10779e !important; font-weight: bold !important;"><span class="spnline">
                                       

                                        <i class="fa fa-id-card" aria-hidden="true"></i> </span>
                                      </h5>
                                	<h5 style=" font-size:14px!important; color:#10779e !important; font-weight: bold !important;"><span class="spnline">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>


                                       </span>
                                      </h5>
                                   <h5 style=" font-size:14px!important; color:#10779e !important; font-weight: bold !important;"><span class="spnline">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>


                                       </span>
                                      </h5>
                                      
                                      <h5 style=" font-size:14px!important; color:#10779e !important; font-weight: bold !important;"><span class="spnline">
                                       <i class="fa fa-map-marker" aria-hidden="true"></i>


                                       </span>
                                      </h5>
                                
    								
    							</div>
                                <div class="barcode">
    								<img style="height: 55px !important;" src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/qrcode.png">
    							</div>
    							<div class="barcode">
    								<img src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/barcode.png">
    							</div>
    							<div class="back-footer">
    								<img src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/thumbnail.png">
    							</div>
    						</div>
    					</div>
    				</div>
			</div>


</div>
        