<?php

$user_img = "";
if (isset($personal_data) && (!empty($personal_data))) {
    $user_img = base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $personal_data->personal_photo;
    ?>
    <span class="profile-picture">
				<img id="profile-img-tag" class="editable img-responsive" alt="<?php if (isset($personal_data)) {
                    echo $personal_data->employee;
                } ?>" src="<?php echo $user_img ?>"
                     onerror="this.src='<?php echo base_url() ?>/asisst/fav/apple-icon-120x120.png'"/>

			</span>

    <div class="space-4"></div>

    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
        <div class="inline position-relative">
            <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                <i class="ace-icon fa fa-circle light-green"></i>

                <span class="white"><?php echo $personal_data->employee; ?></span>
            </a>

            <ul class="align-right dropdown-menu dropdown-caret dropdown-lighter">
                <li class="dropdown-header"> تغيير الحالة</li>

                <li>

                    <table class="table-bordered table table-details" style="table-layout: fixed;">
                        <tbody>
                        <tr>

                            <td><strong class="text-danger "> إسم الموظف : </strong>
                                <?php echo $personal_data->employee; ?>
                            </td>
                        </tr>


                        <tr>

                            <td><strong class="text-danger ">الإدارة
                                    :</strong><?php echo $personal_data->administration_name; ?></td>
                        </tr>

                        <tr>

                            <td><strong class="text-danger ">القسم
                                    :</strong><?php echo $personal_data->departments_name; ?>
                            </td>
                        </tr>

                        <tr>


                            <td><strong class="text-danger ">المسمى الوظيفى
                                    : </strong><?php echo $personal_data->job_title; ?>
                            </td>
                        </tr>

                        <tr>


                            <td><strong class="text-danger ">المدير المباشر
                                    : </strong><?php echo $personal_data->manger_name; ?>
                            </td>
                        </tr>

                        </tbody>

                    </table>
                </li>

            </ul>
        </div>
    </div>
<?php } ?>