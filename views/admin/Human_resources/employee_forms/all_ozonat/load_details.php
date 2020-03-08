<?php
if (isset($get_ezn) && !empty($get_ezn)) {
    ?>

    <table class="table" style="table-layout: fixed">
        <thead>
        <tr>
            <th colspan="4">تفاصيل الإذن</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>نوع الاذن: </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><input type="hidden" id="row_id" value="<?= $get_ezn->id; ?>">
                <?php
                if (!empty($get_ezn->no3_ezn)) {
                    if ($get_ezn->no3_ezn == 1) {
                        echo " استئذان شخصي";
                    } elseif ($get_ezn->no3_ezn == 2) {
                        echo " استئذان للعمل";
                    }
                }
                ?></td>
            <td style="width: 135px;"><strong> تاريخ الاذن</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $get_ezn->ezn_date_ar; ?></td>
            <td style="width: 150px;"><strong>بدايه الاذن </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $get_ezn->from_hour; ?></td>
        </tr>
        <tr>
            <td><strong>نهايه الاذن </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $get_ezn->to_hour; ?></td>
            <td><strong>المدة </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $get_ezn->total_hours; ?></td>
            <td><strong>الفترة </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $get_ezn->fatra_n; ?></td>

        </tr>
        <tr>
            <td><strong> السبب </strong></td>
            <td><strong>:</strong></td>
            <td><?= $get_ezn->reason ?></td>

        </tr>


        </tbody>
    </table>

    <?php
}
?>




<?php
if (isset($all_ozonat) && !empty($all_ozonat)) {
    $x = 0;
    $personal_ezn = 0;
    $work_ezn = 0;
    $personal_hours = 0;
    $work_hours = 0;
    foreach ($all_ozonat as $row) {
        $x++;
        if ($row->no3_ezn == 1) {
            $personal_ezn += 1;
            $personal_hours += $row->total_hours;
        } elseif ($row->no3_ezn == 2) {
            $work_ezn += 1;
            $work_hours += $row->total_hours;

        }

    }
    ?>

    <table class="table" style="table-layout: fixed">
        <thead>
        <tr>
            <input type="hidden" id="emp_id" value="<?= $all_ozonat[0]->emp_id_fk ?>">
            <th colspan="4" class="">افاده شئون الموظفين</th>
            <!-- <th colspan="4" class="" style="text-align: center;">  أذونات الموظف :   <?= $all_ozonat[0]->emp_name ?></th> -->
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>عدد الاذونات الشخصيه: </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td> <?php
                echo $personal_ezn;
                ?></td>
            <td style="width: 135px;"><strong> عدد الساعات</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $personal_hours; ?></td>
            <td style="width: 150px;"><strong>عدد أذونات العمل</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php echo $work_ezn; ?></td>
        </tr>
        <tr>
            <td><strong> عدد الساعات </strong></td>
            <td><strong>:</strong></td>
            <td><?php echo $work_hours; ?></td>


        </tr>

        </tbody>
    </table>

    <?php
}
?>

<?php
if (isset($emp_name) && !empty($emp_name)) {
    ?>
    <div class="col-md-2 no-padding" style="width:100%">
        <div class="user-profile">
        <span class="profile-picture">
            <!-- <img id="profile-img-tag" class="editable img-responsive" alt="Alex's Avatar"
                 src="<?php echo base_url() ?>/asisst/admin_asset/img/user.png"/> -->
            <?php if (isset($emp_name->personal_photo) && !empty($emp_name->personal_photo)) { ?>
                <img id="profile-img-tag"
                     src="<?php echo base_url(); ?>uploads/human_resources/emp_photo/thumbs/<?php echo $emp_name->personal_photo; ?>"
                     class="editable img-responsive" alt="Alex's Avatar" onerror="set_image_defult(this)">


            <?php } else { ?>
                <img id="profile-img-tag" class="editable img-responsive" alt="Alex's Avatar"
                     src="<?php echo base_url(); ?>asisst/admin_asset/img/user.png" >
            <?php } ?>


        </span>

            <div class="space-4"></div>

            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                <div class="inline position-relative">
                    <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                        <i class="ace-icon fa fa-circle light-green"></i>
                        &nbsp;
                        <span class="white"><?php if (isset($emp_name)) {
                                echo $emp_name->employee;
                            } ?>     </span>
                    </a>


                </div>
            </div>


        </div>


    </div>
<?php } ?>

<script>
    var loop_img=0;
    function set_image_defult(elem){
        console.log("set_image_defult : "+loop_img);
        if (loop_img == 0){
            elem.src="<?php echo base_url(); ?>asisst/admin_asset/img/user.png";
        }
        loop_img++;


    }

</script>
