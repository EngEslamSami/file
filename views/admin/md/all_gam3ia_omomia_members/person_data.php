<style>
    .lobipanel-noaction {
        margin-bottom: 25px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    }

    .list-group-item {
        padding: 10px 8px;
    }

    .table-pro th {
        width: 117px;
    }
    .table-bordered.table-details td {
        padding: 2px;
        font-size: 13px !important;
    }
</style>

<div class="col-md-12 no-padding">
    <div class="user-widget list-group">
        <div class="user-profile" style="padding-bottom: 0px;">
            <?php

            $user_img = "";
            if (isset($result)) {
                $user_img = base_url() . 'uploads/md/gam3ia_omomia_members/' . $result->mem_img;
            } ?>
            <span class="profile-picture">
				<img id="profile-img-tag" class="editable img-responsive" style="width: 100%;height: 140px" alt="<?php if (isset($result)) {
                    echo $result->name;
                } ?>" src="<?php echo $user_img ?>"
                     onerror="this.src='<?php echo base_url() ?>/asisst/fav/apple-icon-120x120.png'"/>
				
			</span>


            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                        <i class="ace-icon fa fa-circle light-green"></i>
                        &nbsp;
                        <span class="white"><?php if (isset($result)) {
                                echo $result->name;
                            } else {
                                echo 'اسم العضو :';
                            } ?></span>
                    </a>


                </div>
            </div>


            <table class="table-bordered table table-details" style="table-layout: fixed;margin-bottom: 0">
                <tbody>
                <?php /*if (isset($result)) { */ ?><!--
                    <tr>
                        <td class="text-center"><strong class="text-danger "> </strong>
                            <?php /*echo $result->name; */ ?> </td>
                    </tr>
                --><?php /*} */ ?>

                <?php if (isset($result->odwiat->rkm_odwia_full)) { ?>
                    <tr>
                        <td class="text-center">
                            <strong class="text-danger ">

                            </strong><?php echo $result->odwiat->rkm_odwia_full; ?>                        </td>
                    </tr>
                <?php } ?>

                <?php if (isset($result)) { ?>

                    <tr>
                        <td class="text-center">
                            <strong class="text-danger "></strong><?php echo $result->card_num; ?>
                        </td>
                    </tr>
                <?php } ?>

                <?php if (isset($result->odwiat->subs_from_date_m) &&(!empty($result->odwiat->subs_from_date_m))) { ?>

                    <tr>
                        <td class="text-center">
                            <strong class="text-danger ">تاريخ بداية الاشتراك</strong>
                            <br>
                            <?php echo date('Y-m-d', $result->odwiat->from_date); ?></td>
                    </tr>
                <?php } ?>

                <?php if (isset($result->odwiat->subs_to_date_m) &&(!empty($result->odwiat->subs_to_date_m))) { ?>

                    <tr>
                        <td class="text-center"><strong class="text-danger ">
                                تاريخ نهاية الاشتراك
                            </strong>
                            <br>
                            <?php echo date('Y-m-d', $result->odwiat->to_date); ?>
                        </td>
                    </tr>
                <?php } ?>

                </tbody>

            </table>
        </div>
    </div>


</div>

<!--<div class="col-md-12 no-padding">
    <div class="user-widget list-group">
        <div class="list-group-item heading">
            <?php
$user_img = "";
if (isset($result)) {
    $user_img = $result->mem_img;
} ?>
            <img style="width: 100px;" id="blah" class="media-object center-block"
                 src="<?= base_url() ?>/uploads/md/gam3ia_omomia_members/<?php echo $user_img ?>"
                 onerror="this.src='<?php echo base_url() ?>/asisst/fav/apple-icon-120x120.png'" alt="لا يوجد صورة">
            <div class="clearfix"></div>
        </div>
        <table class="table-bordered table table-pro" style="table-layout: fixed;">
            <tbody>
            <tr>
                <th><strong class="text-danger "> <?php if (isset($result)) {
    echo $result->name;
} ?> </strong></th>
            </tr>
            <tr>
                <th><strong class="text-danger "><?php if (isset($result->odwiat->rkm_odwia_full)) {
    echo $result->odwiat->rkm_odwia_full;
} ?> </strong></th>
            </tr>

            <tr>
                    <th><strong class="text-danger ">رقم الجوال</strong></th>
                    <td><?php /*if(isset($result)){ echo $result->jwal;}*/ ?></td>
                    </tr>

            <tr>
                <th><strong class="text-danger "><?php if (isset($result)) {
    echo $result->card_num;
} ?></strong></th>
            </tr>

            <tr>
                <th><strong class="text-danger "><?php if (isset($result->odwiat->subs_from_date_m)) {
    echo $result->odwiat->subs_from_date_m;
} ?></strong></th>
            </tr>
            <tr>
                <th><strong class="text-danger "><?php if (isset($result->odwiat->subs_to_date_m)) {
    echo $result->odwiat->subs_to_date_m;
} ?></strong></th>
            </tr>
            </tbody>
        </table>
    </div>
</div>-->
