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

                                    $user_img = "";
                                    if (isset($personal_data)) {
                                        $user_img = base_url() . 'uploads/human_resources/emp_photo/thumbs/'. $personal_data[0]->personal_photo;
                                    } ?>
        
    								<img src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/thumbnail-(3).png">
    							</div>
    							<div class="card-inner">
    								<div class="square">
    									<div class="pic">
    										<img alt="<?php if (isset($personal_data)) {
                                                echo $personal_data[0]->employee;
                                            } ?>" src="<?php echo $user_img ?>"
                                                 onerror="this.src='<?php echo base_url() ?>/asisst/fav/apple-icon-120x120.png'">
    									</div>
    								</div>
    
    								<div class="card-name">
    									<h5 style="font-size: 17px !important ; font-weight: bold !important;">
                                        
                                        <?php if (isset($personal_data)) {
                                                    echo $personal_data[0]->employee;
                                                } ?></h5>
    									<h5 style="color: #382424 !important;" class="career"> <?php if (isset($personal_data)) {
                                                    echo $personal_data[0]->degree_name;
                                                } ?></h5>
    								</div>
    
    
    								<div class="card-details">
    									<h5 style="color:#10779e !important; font-weight: bold !important;"><span class="spnline"></span><strong></strong>  <?php if (isset($personal_data)) {
                                                    echo $personal_data[0]->admin_name;
                                                } ?></h5>
    									<h5 style="color:#10779e !important; font-weight: bold !important;" >
                                               <?php if (isset($personal_data)) {
                                                    echo $personal_data[0]->depart_name; 
                                                } ?></h5>
    									<h5 style=" font-size:17px!important; color:#10779e !important; "><span class="spnline">
                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>

                                        المدير المباشر</span>
                                      </h5>
                                                
                                     	<h5 style=" font-size:17px!important; color:#10779e !important; ">
                                         <?php if (isset($personal_data)) {
                                                    echo $personal_data[0]->manger_name;
                                                } ?></h5>           
                                                
                                                
    								</div>
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
        