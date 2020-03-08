<style>
.table-bordered.table-details tbody>tr>td {
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
                            if(isset($result)){
                                $user_img= $result->person_img ;
                            }?>


                        <img src="<?php echo base_url() ?>/asisst/admin_asset/img/logo.png">
                    </div>
                    <div class="card-inner">
                        <div class="square">
                            <div class="pic">
                                <img style="width: 100px;" id="blah" class="media-object center-block"
                                    src="<?=base_url()?>/uploads/images/<?php echo $user_img ?>"
                                    onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png'"
                                    alt="لا يوجد صورة">
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
                            <h5 style="color:#10779e !important; font-weight: bold !important;"><span
                                    class="spnline"></span><strong></strong>
                                <?php if(isset($result)){  echo $result->k_name;}?></h5>
                            <h5 style="color:#10779e !important; font-weight: bold !important;">
                                <?php if(isset($result)){ echo  $result->k_num;}?></h5>
                        </div>
                    </div>
                    <div class="footer-img">

                    </div>


                </div>
            </div>
            <div class="imgchange-2">
                <div class="person-card back-card effect-shadow">
                    <div class="back-body">
                        <h5 style=" font-size:14px!important; color:#10779e !important; font-weight: bold !important;">
                            <span class="spnline">


                                <i class="fa fa-id-card" aria-hidden="true"></i> <?php if(isset($result)){  echo $result->k_national_num;}?></span>
                        </h5>
                        <h5 style=" font-size:14px!important; color:#10779e !important; font-weight: bold !important;">
                            <span class="spnline">
                                <i class="fa fa-calendar" aria-hidden="true"></i>

                                <?php if(isset($result)){  echo $result->k_mob;}?>
                            </span>
                        </h5>
                        <h5 style=" font-size:14px!important; color:#10779e !important; font-weight: bold !important;">
                            <span class="spnline">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <?php if(isset($result)){  echo $result->social_status_name;}?>
                            </span>
                        </h5>

                        <h5 style=" font-size:14px!important; color:#10779e !important; font-weight: bold !important;">
                            <span class="spnline">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>


                            </span>
                        </h5>


                    </div>
                    <div class="barcode">
                        <img style="height: 55px !important;"
                            src="<?php echo base_url() ?>/asisst/admin_asset/img/profile/qrcode.png">
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
