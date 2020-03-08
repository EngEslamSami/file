<div class="charity-sidebar">
    <div class="charity-sidebar-photo">
        <?php if (isset($person_data->mem_img) && !empty($person_data->mem_img)) { ?>
            <img src="<?php echo base_url() ?>uploads/md/gam3ia_omomia_members/<?php echo $person_data->mem_img; ?> ">

        <?php } else { ?>

            <img src="<?php echo base_url() ?>asisst/admin_asset/img/avatar5.png ">
        <?php } ?>
        <!-- yara -->
       <?php // echo '<pre>'; print_r($odwia_data);?>
        <h5 class="name"><?php if (isset($person_data->name) && !empty($person_data->name)) {
                echo $person_data->laqb_title ."/". $person_data->name;
            } ?>    </h5>
        <h5 class="career"><?php if (isset($odwia_data->no3_odwia_title) && !empty($odwia_data->no3_odwia_title)) {
                echo $odwia_data->no3_odwia_title;
            } ?>    </h5>
              <h5 class="career"><?php if (isset($person_data->card_num) && !empty($person_data->card_num)) {
                echo $person_data->card_num;
            } ?>    </h5>
              
              <h5 class="career"><?php if (isset($person_data->jwal) && !empty($person_data->jwal)) {
                echo $person_data->jwal;
            } ?>    </h5>
            <h5 class="career"><?php if (isset($odwia_data->rkm_odwia_full) && !empty($odwia_data->rkm_odwia_full)) {
                echo $odwia_data->rkm_odwia_full;
            } ?>    </h5>
    </div>

    <div class="linkat">
        <div class="single-link main-data">
            <a href="#"><img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/icons/icon.png"> الملف الشخصي
                <i class="fa fa-ellipsis-h"></i></a>

            <ul class="list-unstyled contact-info">
                <?php if (isset($person_data->enwan_watni) && !empty($person_data->enwan_watni)) { ?>
                    <li><h5><i class="fa fa-map-marker"></i> <?php echo $person_data->enwan_watni; ?> </h5></li>
                <?php } ?>
                <?php if (isset($person_data->jwal) && !empty($person_data->jwal)) { ?>
                    <li><h5><i class="fa fa-phone"></i> <?php echo $person_data->jwal; ?>  </h5></li>
                <?php } ?>
                <?php if (isset($person_data->email) && !empty($person_data->email)) { ?>
                    <li><h5><i class="fa fa-envelope-o"></i> <?php echo $person_data->email; ?>  </h5></li>
                <?php } ?>
            </ul>
        </div>

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="single-link main-data">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                           aria-expanded="true" aria-controls="collapseOne">
                            <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/icons/group.png">
                            الإجتماعات <i class="fa fa-ellipsis-h"></i></a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                    <ul class="list-unstyled inner-menu">
                        <li><a onclick="show_tab('profile-tab7');get_all_da3wat();">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> إجتماعات الجمعية
                                العمومية </a></li>

                        <li role="presentation">
                            <a href="#profile-tab8" onclick="get_mahdr(<?php echo $_SESSION['memb_id_fk'] ;?>);active_li();"   aria-controls="profile-tab8" role="tab"
                                                   data-toggle="tab"><i class="fa fa-arrow-left" aria-hidden="true"></i> عرض المحضر </a></li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>