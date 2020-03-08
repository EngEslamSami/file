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


























   <!-- <div class="user-profile">
        <?php

        $user_img = "";
        if (isset($personal_data)) {
            $user_img = base_url() . 'uploads/human_resources/emp_photo/thumbs/'. $personal_data[0]->personal_photo;
        } ?>
        <span class="profile-picture">
				<img id="profile-img-tag" class="editable img-responsive" alt="<?php if (isset($personal_data)) {
                    echo $personal_data[0]->employee;
                } ?>" src="<?php echo $user_img ?>"
                     onerror="this.src='<?php echo base_url() ?>/asisst/fav/apple-icon-120x120.png'"/>
				
			</span>

        <div class="space-4"></div>

        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
            <div class="inline position-relative">
                <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                    <i class="ace-icon fa fa-circle light-green"></i>
                    &nbsp;
                    <span class="white"><?php if (isset($personal_data)) {
                            echo $personal_data[0]->employee;
                        } ?></span>
                </a>

                <ul class="align-right dropdown-menu dropdown-caret dropdown-lighter">
                    <li class="dropdown-header"> بيانات الموظف</li>
    
                    <li>
    
                        <table class="table-bordered table table-details" style="table-layout: fixed;">
                            <tbody>
                            <?php if (isset($personal_data)) { ?>
                            <tr>
                                <td><strong class="text-danger "> إسم الموظف : </strong>
                                    <?php echo $personal_data[0]->employee; ?> </td>
                            </tr>
                            <?php } ?>

                              <?php if (isset($personal_data)) { ?>
                            <tr>
                                <td><strong class="text-danger ">الإدارة:</strong><?php echo $personal_data[0]->admin_name; ?></td>
                            </tr>
                            <?php } ?>

                              <?php if (isset($personal_data)) { ?>
    
                            <tr>
                                <td><strong class="text-danger ">القسم:</strong><?php echo $personal_data[0]->depart_name; ?></td>
                            </tr>
                            <?php } ?>

                              <?php if (isset($personal_data)) { ?>
    
                            <tr>
                                <td><strong class="text-danger ">المسمى الوظيفى: </strong><?php echo $personal_data[0]->degree_name; ?></td>
                            </tr>
                            <?php } ?>

                              <?php if (isset($personal_data)) { ?>
    
                            <tr>
                                <td><strong class="text-danger ">المدير المباشر: </strong><?php echo $personal_data[0]->manger_name; ?></td>
                            </tr>
                            <?php } ?>
    
                            </tbody>
    
                        </table>
                    </li>
    
                </ul>



            </div>
        </div>


       


    </div>-->


</div>
        